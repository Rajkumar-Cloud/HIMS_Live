<?php
namespace PHPMaker2020\HIMS;

/**
 * Page class
 */
class ivf_stimulation_chart_list extends ivf_stimulation_chart
{

	// Page ID
	public $PageID = "list";

	// Project ID
	public $ProjectID = "{EA4F6D13-AF8F-428D-9EA7-BA88D1107EC3}";

	// Table name
	public $TableName = 'ivf_stimulation_chart';

	// Page object name
	public $PageObjName = "ivf_stimulation_chart_list";

	// Grid form hidden field names
	public $FormName = "fivf_stimulation_chartlist";
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

		// Table object (ivf_stimulation_chart)
		if (!isset($GLOBALS["ivf_stimulation_chart"]) || get_class($GLOBALS["ivf_stimulation_chart"]) == PROJECT_NAMESPACE . "ivf_stimulation_chart") {
			$GLOBALS["ivf_stimulation_chart"] = &$this;
			$GLOBALS["Table"] = &$GLOBALS["ivf_stimulation_chart"];
		}

		// Initialize URLs
		$this->ExportPrintUrl = $this->pageUrl() . "export=print";
		$this->ExportExcelUrl = $this->pageUrl() . "export=excel";
		$this->ExportWordUrl = $this->pageUrl() . "export=word";
		$this->ExportPdfUrl = $this->pageUrl() . "export=pdf";
		$this->ExportHtmlUrl = $this->pageUrl() . "export=html";
		$this->ExportXmlUrl = $this->pageUrl() . "export=xml";
		$this->ExportCsvUrl = $this->pageUrl() . "export=csv";
		$this->AddUrl = "ivf_stimulation_chartadd.php";
		$this->InlineAddUrl = $this->pageUrl() . "action=add";
		$this->GridAddUrl = $this->pageUrl() . "action=gridadd";
		$this->GridEditUrl = $this->pageUrl() . "action=gridedit";
		$this->MultiDeleteUrl = "ivf_stimulation_chartdelete.php";
		$this->MultiUpdateUrl = "ivf_stimulation_chartupdate.php";

		// Table object (user_login)
		if (!isset($GLOBALS['user_login']))
			$GLOBALS['user_login'] = new user_login();

		// Table object (ivf_treatment_plan)
		if (!isset($GLOBALS['ivf_treatment_plan']))
			$GLOBALS['ivf_treatment_plan'] = new ivf_treatment_plan();

		// Page ID (for backward compatibility only)
		if (!defined(PROJECT_NAMESPACE . "PAGE_ID"))
			define(PROJECT_NAMESPACE . "PAGE_ID", 'list');

		// Table name (for backward compatibility only)
		if (!defined(PROJECT_NAMESPACE . "TABLE_NAME"))
			define(PROJECT_NAMESPACE . "TABLE_NAME", 'ivf_stimulation_chart');

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
		$this->FilterOptions->TagClassName = "ew-filter-option fivf_stimulation_chartlistsrch";

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
		global $ivf_stimulation_chart;
		if ($this->CustomExport && $this->CustomExport == $this->Export && array_key_exists($this->CustomExport, Config("EXPORT_CLASSES"))) {
				$content = ob_get_contents();
			if ($ExportFileName == "")
				$ExportFileName = $this->TableVar;
			$class = PROJECT_NAMESPACE . Config("EXPORT_CLASSES." . $this->CustomExport);
			if (class_exists($class)) {
				$doc = new $class($ivf_stimulation_chart);
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
		$this->RIDNo->setVisibility();
		$this->Name->setVisibility();
		$this->ARTCycle->setVisibility();
		$this->FemaleFactor->setVisibility();
		$this->MaleFactor->setVisibility();
		$this->Protocol->setVisibility();
		$this->SemenFrozen->setVisibility();
		$this->A4ICSICycle->setVisibility();
		$this->TotalICSICycle->setVisibility();
		$this->TypeOfInfertility->setVisibility();
		$this->Duration->setVisibility();
		$this->LMP->setVisibility();
		$this->RelevantHistory->setVisibility();
		$this->IUICycles->setVisibility();
		$this->AFC->setVisibility();
		$this->AMH->setVisibility();
		$this->FBMI->setVisibility();
		$this->MBMI->setVisibility();
		$this->OvarianVolumeRT->setVisibility();
		$this->OvarianVolumeLT->setVisibility();
		$this->DAYSOFSTIMULATION->setVisibility();
		$this->DOSEOFGONADOTROPINS->setVisibility();
		$this->INJTYPE->setVisibility();
		$this->ANTAGONISTDAYS->setVisibility();
		$this->ANTAGONISTSTARTDAY->setVisibility();
		$this->GROWTHHORMONE->setVisibility();
		$this->PRETREATMENT->setVisibility();
		$this->SerumP4->setVisibility();
		$this->FORT->setVisibility();
		$this->MedicalFactors->setVisibility();
		$this->SCDate->setVisibility();
		$this->OvarianSurgery->setVisibility();
		$this->PreProcedureOrder->setVisibility();
		$this->TRIGGERR->setVisibility();
		$this->TRIGGERDATE->setVisibility();
		$this->ATHOMEorCLINIC->setVisibility();
		$this->OPUDATE->setVisibility();
		$this->ALLFREEZEINDICATION->setVisibility();
		$this->ERA->setVisibility();
		$this->PGTA->setVisibility();
		$this->PGD->setVisibility();
		$this->DATEOFET->setVisibility();
		$this->ET->setVisibility();
		$this->ESET->setVisibility();
		$this->DOET->setVisibility();
		$this->SEMENPREPARATION->setVisibility();
		$this->REASONFORESET->setVisibility();
		$this->Expectedoocytes->setVisibility();
		$this->StChDate1->setVisibility();
		$this->StChDate2->setVisibility();
		$this->StChDate3->setVisibility();
		$this->StChDate4->setVisibility();
		$this->StChDate5->setVisibility();
		$this->StChDate6->setVisibility();
		$this->StChDate7->setVisibility();
		$this->StChDate8->setVisibility();
		$this->StChDate9->setVisibility();
		$this->StChDate10->setVisibility();
		$this->StChDate11->setVisibility();
		$this->StChDate12->setVisibility();
		$this->StChDate13->setVisibility();
		$this->CycleDay1->setVisibility();
		$this->CycleDay2->setVisibility();
		$this->CycleDay3->setVisibility();
		$this->CycleDay4->setVisibility();
		$this->CycleDay5->setVisibility();
		$this->CycleDay6->setVisibility();
		$this->CycleDay7->setVisibility();
		$this->CycleDay8->setVisibility();
		$this->CycleDay9->setVisibility();
		$this->CycleDay10->setVisibility();
		$this->CycleDay11->setVisibility();
		$this->CycleDay12->setVisibility();
		$this->CycleDay13->setVisibility();
		$this->StimulationDay1->setVisibility();
		$this->StimulationDay2->setVisibility();
		$this->StimulationDay3->setVisibility();
		$this->StimulationDay4->setVisibility();
		$this->StimulationDay5->setVisibility();
		$this->StimulationDay6->setVisibility();
		$this->StimulationDay7->setVisibility();
		$this->StimulationDay8->setVisibility();
		$this->StimulationDay9->setVisibility();
		$this->StimulationDay10->setVisibility();
		$this->StimulationDay11->setVisibility();
		$this->StimulationDay12->setVisibility();
		$this->StimulationDay13->setVisibility();
		$this->Tablet1->setVisibility();
		$this->Tablet2->setVisibility();
		$this->Tablet3->setVisibility();
		$this->Tablet4->setVisibility();
		$this->Tablet5->setVisibility();
		$this->Tablet6->setVisibility();
		$this->Tablet7->setVisibility();
		$this->Tablet8->setVisibility();
		$this->Tablet9->setVisibility();
		$this->Tablet10->setVisibility();
		$this->Tablet11->setVisibility();
		$this->Tablet12->setVisibility();
		$this->Tablet13->setVisibility();
		$this->RFSH1->setVisibility();
		$this->RFSH2->setVisibility();
		$this->RFSH3->setVisibility();
		$this->RFSH4->setVisibility();
		$this->RFSH5->setVisibility();
		$this->RFSH6->setVisibility();
		$this->RFSH7->setVisibility();
		$this->RFSH8->setVisibility();
		$this->RFSH9->setVisibility();
		$this->RFSH10->setVisibility();
		$this->RFSH11->setVisibility();
		$this->RFSH12->setVisibility();
		$this->RFSH13->setVisibility();
		$this->HMG1->setVisibility();
		$this->HMG2->setVisibility();
		$this->HMG3->setVisibility();
		$this->HMG4->setVisibility();
		$this->HMG5->setVisibility();
		$this->HMG6->setVisibility();
		$this->HMG7->setVisibility();
		$this->HMG8->setVisibility();
		$this->HMG9->setVisibility();
		$this->HMG10->setVisibility();
		$this->HMG11->setVisibility();
		$this->HMG12->setVisibility();
		$this->HMG13->setVisibility();
		$this->GnRH1->setVisibility();
		$this->GnRH2->setVisibility();
		$this->GnRH3->setVisibility();
		$this->GnRH4->setVisibility();
		$this->GnRH5->setVisibility();
		$this->GnRH6->setVisibility();
		$this->GnRH7->setVisibility();
		$this->GnRH8->setVisibility();
		$this->GnRH9->setVisibility();
		$this->GnRH10->setVisibility();
		$this->GnRH11->setVisibility();
		$this->GnRH12->setVisibility();
		$this->GnRH13->setVisibility();
		$this->E21->setVisibility();
		$this->E22->setVisibility();
		$this->E23->setVisibility();
		$this->E24->setVisibility();
		$this->E25->setVisibility();
		$this->E26->setVisibility();
		$this->E27->setVisibility();
		$this->E28->setVisibility();
		$this->E29->setVisibility();
		$this->E210->setVisibility();
		$this->E211->setVisibility();
		$this->E212->setVisibility();
		$this->E213->setVisibility();
		$this->P41->setVisibility();
		$this->P42->setVisibility();
		$this->P43->setVisibility();
		$this->P44->setVisibility();
		$this->P45->setVisibility();
		$this->P46->setVisibility();
		$this->P47->setVisibility();
		$this->P48->setVisibility();
		$this->P49->setVisibility();
		$this->P410->setVisibility();
		$this->P411->setVisibility();
		$this->P412->setVisibility();
		$this->P413->setVisibility();
		$this->USGRt1->setVisibility();
		$this->USGRt2->setVisibility();
		$this->USGRt3->setVisibility();
		$this->USGRt4->setVisibility();
		$this->USGRt5->setVisibility();
		$this->USGRt6->setVisibility();
		$this->USGRt7->setVisibility();
		$this->USGRt8->setVisibility();
		$this->USGRt9->setVisibility();
		$this->USGRt10->setVisibility();
		$this->USGRt11->setVisibility();
		$this->USGRt12->setVisibility();
		$this->USGRt13->setVisibility();
		$this->USGLt1->setVisibility();
		$this->USGLt2->setVisibility();
		$this->USGLt3->setVisibility();
		$this->USGLt4->setVisibility();
		$this->USGLt5->setVisibility();
		$this->USGLt6->setVisibility();
		$this->USGLt7->setVisibility();
		$this->USGLt8->setVisibility();
		$this->USGLt9->setVisibility();
		$this->USGLt10->setVisibility();
		$this->USGLt11->setVisibility();
		$this->USGLt12->setVisibility();
		$this->USGLt13->setVisibility();
		$this->EM1->setVisibility();
		$this->EM2->setVisibility();
		$this->EM3->setVisibility();
		$this->EM4->setVisibility();
		$this->EM5->setVisibility();
		$this->EM6->setVisibility();
		$this->EM7->setVisibility();
		$this->EM8->setVisibility();
		$this->EM9->setVisibility();
		$this->EM10->setVisibility();
		$this->EM11->setVisibility();
		$this->EM12->setVisibility();
		$this->EM13->setVisibility();
		$this->Others1->setVisibility();
		$this->Others2->setVisibility();
		$this->Others3->setVisibility();
		$this->Others4->setVisibility();
		$this->Others5->setVisibility();
		$this->Others6->setVisibility();
		$this->Others7->setVisibility();
		$this->Others8->setVisibility();
		$this->Others9->setVisibility();
		$this->Others10->setVisibility();
		$this->Others11->setVisibility();
		$this->Others12->setVisibility();
		$this->Others13->setVisibility();
		$this->DR1->setVisibility();
		$this->DR2->setVisibility();
		$this->DR3->setVisibility();
		$this->DR4->setVisibility();
		$this->DR5->setVisibility();
		$this->DR6->setVisibility();
		$this->DR7->setVisibility();
		$this->DR8->setVisibility();
		$this->DR9->setVisibility();
		$this->DR10->setVisibility();
		$this->DR11->setVisibility();
		$this->DR12->setVisibility();
		$this->DR13->setVisibility();
		$this->DOCTORRESPONSIBLE->Visible = FALSE;
		$this->TidNo->setVisibility();
		$this->Convert->setVisibility();
		$this->Consultant->setVisibility();
		$this->InseminatinTechnique->setVisibility();
		$this->IndicationForART->setVisibility();
		$this->Hysteroscopy->setVisibility();
		$this->EndometrialScratching->setVisibility();
		$this->TrialCannulation->setVisibility();
		$this->CYCLETYPE->setVisibility();
		$this->HRTCYCLE->setVisibility();
		$this->OralEstrogenDosage->setVisibility();
		$this->VaginalEstrogen->setVisibility();
		$this->GCSF->setVisibility();
		$this->ActivatedPRP->setVisibility();
		$this->UCLcm->setVisibility();
		$this->DATOFEMBRYOTRANSFER->setVisibility();
		$this->DAYOFEMBRYOTRANSFER->setVisibility();
		$this->NOOFEMBRYOSTHAWED->setVisibility();
		$this->NOOFEMBRYOSTRANSFERRED->setVisibility();
		$this->DAYOFEMBRYOS->setVisibility();
		$this->CRYOPRESERVEDEMBRYOS->setVisibility();
		$this->ViaAdmin->setVisibility();
		$this->ViaStartDateTime->setVisibility();
		$this->ViaDose->setVisibility();
		$this->AllFreeze->setVisibility();
		$this->TreatmentCancel->setVisibility();
		$this->Reason->Visible = FALSE;
		$this->ProgesteroneAdmin->setVisibility();
		$this->ProgesteroneStart->setVisibility();
		$this->ProgesteroneDose->setVisibility();
		$this->Projectron->Visible = FALSE;
		$this->StChDate14->setVisibility();
		$this->StChDate15->setVisibility();
		$this->StChDate16->setVisibility();
		$this->StChDate17->setVisibility();
		$this->StChDate18->setVisibility();
		$this->StChDate19->setVisibility();
		$this->StChDate20->setVisibility();
		$this->StChDate21->setVisibility();
		$this->StChDate22->setVisibility();
		$this->StChDate23->setVisibility();
		$this->StChDate24->setVisibility();
		$this->StChDate25->setVisibility();
		$this->CycleDay14->setVisibility();
		$this->CycleDay15->setVisibility();
		$this->CycleDay16->setVisibility();
		$this->CycleDay17->setVisibility();
		$this->CycleDay18->setVisibility();
		$this->CycleDay19->setVisibility();
		$this->CycleDay20->setVisibility();
		$this->CycleDay21->setVisibility();
		$this->CycleDay22->setVisibility();
		$this->CycleDay23->setVisibility();
		$this->CycleDay24->setVisibility();
		$this->CycleDay25->setVisibility();
		$this->StimulationDay14->setVisibility();
		$this->StimulationDay15->setVisibility();
		$this->StimulationDay16->setVisibility();
		$this->StimulationDay17->setVisibility();
		$this->StimulationDay18->setVisibility();
		$this->StimulationDay19->setVisibility();
		$this->StimulationDay20->setVisibility();
		$this->StimulationDay21->setVisibility();
		$this->StimulationDay22->setVisibility();
		$this->StimulationDay23->setVisibility();
		$this->StimulationDay24->setVisibility();
		$this->StimulationDay25->setVisibility();
		$this->Tablet14->setVisibility();
		$this->Tablet15->setVisibility();
		$this->Tablet16->setVisibility();
		$this->Tablet17->setVisibility();
		$this->Tablet18->setVisibility();
		$this->Tablet19->setVisibility();
		$this->Tablet20->setVisibility();
		$this->Tablet21->setVisibility();
		$this->Tablet22->setVisibility();
		$this->Tablet23->setVisibility();
		$this->Tablet24->setVisibility();
		$this->Tablet25->setVisibility();
		$this->RFSH14->setVisibility();
		$this->RFSH15->setVisibility();
		$this->RFSH16->setVisibility();
		$this->RFSH17->setVisibility();
		$this->RFSH18->setVisibility();
		$this->RFSH19->setVisibility();
		$this->RFSH20->setVisibility();
		$this->RFSH21->setVisibility();
		$this->RFSH22->setVisibility();
		$this->RFSH23->setVisibility();
		$this->RFSH24->setVisibility();
		$this->RFSH25->setVisibility();
		$this->HMG14->setVisibility();
		$this->HMG15->setVisibility();
		$this->HMG16->setVisibility();
		$this->HMG17->setVisibility();
		$this->HMG18->setVisibility();
		$this->HMG19->setVisibility();
		$this->HMG20->setVisibility();
		$this->HMG21->setVisibility();
		$this->HMG22->setVisibility();
		$this->HMG23->setVisibility();
		$this->HMG24->setVisibility();
		$this->HMG25->setVisibility();
		$this->GnRH14->setVisibility();
		$this->GnRH15->setVisibility();
		$this->GnRH16->setVisibility();
		$this->GnRH17->setVisibility();
		$this->GnRH18->setVisibility();
		$this->GnRH19->setVisibility();
		$this->GnRH20->setVisibility();
		$this->GnRH21->setVisibility();
		$this->GnRH22->setVisibility();
		$this->GnRH23->setVisibility();
		$this->GnRH24->setVisibility();
		$this->GnRH25->setVisibility();
		$this->P414->setVisibility();
		$this->P415->setVisibility();
		$this->P416->setVisibility();
		$this->P417->setVisibility();
		$this->P418->setVisibility();
		$this->P419->setVisibility();
		$this->P420->setVisibility();
		$this->P421->setVisibility();
		$this->P422->setVisibility();
		$this->P423->setVisibility();
		$this->P424->setVisibility();
		$this->P425->setVisibility();
		$this->USGRt14->setVisibility();
		$this->USGRt15->setVisibility();
		$this->USGRt16->setVisibility();
		$this->USGRt17->setVisibility();
		$this->USGRt18->setVisibility();
		$this->USGRt19->setVisibility();
		$this->USGRt20->setVisibility();
		$this->USGRt21->setVisibility();
		$this->USGRt22->setVisibility();
		$this->USGRt23->setVisibility();
		$this->USGRt24->setVisibility();
		$this->USGRt25->setVisibility();
		$this->USGLt14->setVisibility();
		$this->USGLt15->setVisibility();
		$this->USGLt16->setVisibility();
		$this->USGLt17->setVisibility();
		$this->USGLt18->setVisibility();
		$this->USGLt19->setVisibility();
		$this->USGLt20->setVisibility();
		$this->USGLt21->setVisibility();
		$this->USGLt22->setVisibility();
		$this->USGLt23->setVisibility();
		$this->USGLt24->setVisibility();
		$this->USGLt25->setVisibility();
		$this->EM14->setVisibility();
		$this->EM15->setVisibility();
		$this->EM16->setVisibility();
		$this->EM17->setVisibility();
		$this->EM18->setVisibility();
		$this->EM19->setVisibility();
		$this->EM20->setVisibility();
		$this->EM21->setVisibility();
		$this->EM22->setVisibility();
		$this->EM23->setVisibility();
		$this->EM24->setVisibility();
		$this->EM25->setVisibility();
		$this->Others14->setVisibility();
		$this->Others15->setVisibility();
		$this->Others16->setVisibility();
		$this->Others17->setVisibility();
		$this->Others18->setVisibility();
		$this->Others19->setVisibility();
		$this->Others20->setVisibility();
		$this->Others21->setVisibility();
		$this->Others22->setVisibility();
		$this->Others23->setVisibility();
		$this->Others24->setVisibility();
		$this->Others25->setVisibility();
		$this->DR14->setVisibility();
		$this->DR15->setVisibility();
		$this->DR16->setVisibility();
		$this->DR17->setVisibility();
		$this->DR18->setVisibility();
		$this->DR19->setVisibility();
		$this->DR20->setVisibility();
		$this->DR21->setVisibility();
		$this->DR22->setVisibility();
		$this->DR23->setVisibility();
		$this->DR24->setVisibility();
		$this->DR25->setVisibility();
		$this->E214->setVisibility();
		$this->E215->setVisibility();
		$this->E216->setVisibility();
		$this->E217->setVisibility();
		$this->E218->setVisibility();
		$this->E219->setVisibility();
		$this->E220->setVisibility();
		$this->E221->setVisibility();
		$this->E222->setVisibility();
		$this->E223->setVisibility();
		$this->E224->setVisibility();
		$this->E225->setVisibility();
		$this->EEETTTDTE->setVisibility();
		$this->bhcgdate->setVisibility();
		$this->TUBAL_PATENCY->setVisibility();
		$this->HSG->setVisibility();
		$this->DHL->setVisibility();
		$this->UTERINE_PROBLEMS->setVisibility();
		$this->W_COMORBIDS->setVisibility();
		$this->H_COMORBIDS->setVisibility();
		$this->SEXUAL_DYSFUNCTION->setVisibility();
		$this->TABLETS->setVisibility();
		$this->FOLLICLE_STATUS->setVisibility();
		$this->NUMBER_OF_IUI->setVisibility();
		$this->PROCEDURE->setVisibility();
		$this->LUTEAL_SUPPORT->setVisibility();
		$this->SPECIFIC_MATERNAL_PROBLEMS->setVisibility();
		$this->ONGOING_PREG->setVisibility();
		$this->EDD_Date->setVisibility();
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
		$this->setupLookupOptions($this->INJTYPE);
		$this->setupLookupOptions($this->TRIGGERR);
		$this->setupLookupOptions($this->Tablet1);
		$this->setupLookupOptions($this->Tablet2);
		$this->setupLookupOptions($this->Tablet3);
		$this->setupLookupOptions($this->Tablet4);
		$this->setupLookupOptions($this->Tablet5);
		$this->setupLookupOptions($this->Tablet6);
		$this->setupLookupOptions($this->Tablet7);
		$this->setupLookupOptions($this->Tablet8);
		$this->setupLookupOptions($this->Tablet9);
		$this->setupLookupOptions($this->Tablet10);
		$this->setupLookupOptions($this->Tablet11);
		$this->setupLookupOptions($this->Tablet12);
		$this->setupLookupOptions($this->Tablet13);
		$this->setupLookupOptions($this->RFSH1);
		$this->setupLookupOptions($this->RFSH2);
		$this->setupLookupOptions($this->RFSH3);
		$this->setupLookupOptions($this->RFSH4);
		$this->setupLookupOptions($this->RFSH5);
		$this->setupLookupOptions($this->RFSH6);
		$this->setupLookupOptions($this->RFSH7);
		$this->setupLookupOptions($this->RFSH8);
		$this->setupLookupOptions($this->RFSH9);
		$this->setupLookupOptions($this->RFSH10);
		$this->setupLookupOptions($this->RFSH11);
		$this->setupLookupOptions($this->RFSH12);
		$this->setupLookupOptions($this->RFSH13);
		$this->setupLookupOptions($this->HMG1);
		$this->setupLookupOptions($this->HMG2);
		$this->setupLookupOptions($this->HMG3);
		$this->setupLookupOptions($this->HMG4);
		$this->setupLookupOptions($this->HMG5);
		$this->setupLookupOptions($this->HMG6);
		$this->setupLookupOptions($this->HMG7);
		$this->setupLookupOptions($this->HMG8);
		$this->setupLookupOptions($this->HMG9);
		$this->setupLookupOptions($this->HMG10);
		$this->setupLookupOptions($this->HMG11);
		$this->setupLookupOptions($this->HMG12);
		$this->setupLookupOptions($this->HMG13);
		$this->setupLookupOptions($this->GnRH1);
		$this->setupLookupOptions($this->GnRH2);
		$this->setupLookupOptions($this->GnRH3);
		$this->setupLookupOptions($this->GnRH4);
		$this->setupLookupOptions($this->GnRH5);
		$this->setupLookupOptions($this->GnRH6);
		$this->setupLookupOptions($this->GnRH7);
		$this->setupLookupOptions($this->GnRH8);
		$this->setupLookupOptions($this->GnRH9);
		$this->setupLookupOptions($this->GnRH10);
		$this->setupLookupOptions($this->GnRH11);
		$this->setupLookupOptions($this->GnRH12);
		$this->setupLookupOptions($this->GnRH13);
		$this->setupLookupOptions($this->Tablet14);
		$this->setupLookupOptions($this->Tablet15);
		$this->setupLookupOptions($this->Tablet16);
		$this->setupLookupOptions($this->Tablet17);
		$this->setupLookupOptions($this->Tablet18);
		$this->setupLookupOptions($this->Tablet19);
		$this->setupLookupOptions($this->Tablet20);
		$this->setupLookupOptions($this->Tablet21);
		$this->setupLookupOptions($this->Tablet22);
		$this->setupLookupOptions($this->Tablet23);
		$this->setupLookupOptions($this->Tablet24);
		$this->setupLookupOptions($this->Tablet25);
		$this->setupLookupOptions($this->RFSH14);
		$this->setupLookupOptions($this->RFSH15);
		$this->setupLookupOptions($this->RFSH16);
		$this->setupLookupOptions($this->RFSH17);
		$this->setupLookupOptions($this->RFSH18);
		$this->setupLookupOptions($this->RFSH19);
		$this->setupLookupOptions($this->RFSH20);
		$this->setupLookupOptions($this->RFSH21);
		$this->setupLookupOptions($this->RFSH22);
		$this->setupLookupOptions($this->RFSH23);
		$this->setupLookupOptions($this->RFSH24);
		$this->setupLookupOptions($this->RFSH25);
		$this->setupLookupOptions($this->HMG14);
		$this->setupLookupOptions($this->HMG15);
		$this->setupLookupOptions($this->HMG16);
		$this->setupLookupOptions($this->HMG17);
		$this->setupLookupOptions($this->HMG18);
		$this->setupLookupOptions($this->HMG19);
		$this->setupLookupOptions($this->HMG20);
		$this->setupLookupOptions($this->HMG21);
		$this->setupLookupOptions($this->HMG22);
		$this->setupLookupOptions($this->HMG23);
		$this->setupLookupOptions($this->HMG24);
		$this->setupLookupOptions($this->HMG25);
		$this->setupLookupOptions($this->GnRH14);
		$this->setupLookupOptions($this->GnRH15);
		$this->setupLookupOptions($this->GnRH16);
		$this->setupLookupOptions($this->GnRH17);
		$this->setupLookupOptions($this->GnRH18);
		$this->setupLookupOptions($this->GnRH19);
		$this->setupLookupOptions($this->GnRH20);
		$this->setupLookupOptions($this->GnRH21);
		$this->setupLookupOptions($this->GnRH22);
		$this->setupLookupOptions($this->GnRH23);
		$this->setupLookupOptions($this->GnRH24);
		$this->setupLookupOptions($this->GnRH25);

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
		if ($this->CurrentMode != "add" && $this->getMasterFilter() != "" && $this->getCurrentMasterTable() == "ivf_treatment_plan") {
			global $ivf_treatment_plan;
			$rsmaster = $ivf_treatment_plan->loadRs($this->DbMasterFilter);
			$this->MasterRecordExists = ($rsmaster && !$rsmaster->EOF);
			if (!$this->MasterRecordExists) {
				$this->setFailureMessage($Language->phrase("NoRecord")); // Set no record found
				$this->terminate("ivf_treatment_planlist.php"); // Return to master page
			} else {
				$ivf_treatment_plan->loadListRowValues($rsmaster);
				$ivf_treatment_plan->RowType = ROWTYPE_MASTER; // Master row
				$ivf_treatment_plan->renderListRow();
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
			$savedFilterList = $UserProfile->getSearchFilters(CurrentUserName(), "fivf_stimulation_chartlistsrch");
		$filterList = Concat($filterList, $this->id->AdvancedSearch->toJson(), ","); // Field id
		$filterList = Concat($filterList, $this->RIDNo->AdvancedSearch->toJson(), ","); // Field RIDNo
		$filterList = Concat($filterList, $this->Name->AdvancedSearch->toJson(), ","); // Field Name
		$filterList = Concat($filterList, $this->ARTCycle->AdvancedSearch->toJson(), ","); // Field ARTCycle
		$filterList = Concat($filterList, $this->FemaleFactor->AdvancedSearch->toJson(), ","); // Field FemaleFactor
		$filterList = Concat($filterList, $this->MaleFactor->AdvancedSearch->toJson(), ","); // Field MaleFactor
		$filterList = Concat($filterList, $this->Protocol->AdvancedSearch->toJson(), ","); // Field Protocol
		$filterList = Concat($filterList, $this->SemenFrozen->AdvancedSearch->toJson(), ","); // Field SemenFrozen
		$filterList = Concat($filterList, $this->A4ICSICycle->AdvancedSearch->toJson(), ","); // Field A4ICSICycle
		$filterList = Concat($filterList, $this->TotalICSICycle->AdvancedSearch->toJson(), ","); // Field TotalICSICycle
		$filterList = Concat($filterList, $this->TypeOfInfertility->AdvancedSearch->toJson(), ","); // Field TypeOfInfertility
		$filterList = Concat($filterList, $this->Duration->AdvancedSearch->toJson(), ","); // Field Duration
		$filterList = Concat($filterList, $this->LMP->AdvancedSearch->toJson(), ","); // Field LMP
		$filterList = Concat($filterList, $this->RelevantHistory->AdvancedSearch->toJson(), ","); // Field RelevantHistory
		$filterList = Concat($filterList, $this->IUICycles->AdvancedSearch->toJson(), ","); // Field IUICycles
		$filterList = Concat($filterList, $this->AFC->AdvancedSearch->toJson(), ","); // Field AFC
		$filterList = Concat($filterList, $this->AMH->AdvancedSearch->toJson(), ","); // Field AMH
		$filterList = Concat($filterList, $this->FBMI->AdvancedSearch->toJson(), ","); // Field FBMI
		$filterList = Concat($filterList, $this->MBMI->AdvancedSearch->toJson(), ","); // Field MBMI
		$filterList = Concat($filterList, $this->OvarianVolumeRT->AdvancedSearch->toJson(), ","); // Field OvarianVolumeRT
		$filterList = Concat($filterList, $this->OvarianVolumeLT->AdvancedSearch->toJson(), ","); // Field OvarianVolumeLT
		$filterList = Concat($filterList, $this->DAYSOFSTIMULATION->AdvancedSearch->toJson(), ","); // Field DAYSOFSTIMULATION
		$filterList = Concat($filterList, $this->DOSEOFGONADOTROPINS->AdvancedSearch->toJson(), ","); // Field DOSEOFGONADOTROPINS
		$filterList = Concat($filterList, $this->INJTYPE->AdvancedSearch->toJson(), ","); // Field INJTYPE
		$filterList = Concat($filterList, $this->ANTAGONISTDAYS->AdvancedSearch->toJson(), ","); // Field ANTAGONISTDAYS
		$filterList = Concat($filterList, $this->ANTAGONISTSTARTDAY->AdvancedSearch->toJson(), ","); // Field ANTAGONISTSTARTDAY
		$filterList = Concat($filterList, $this->GROWTHHORMONE->AdvancedSearch->toJson(), ","); // Field GROWTHHORMONE
		$filterList = Concat($filterList, $this->PRETREATMENT->AdvancedSearch->toJson(), ","); // Field PRETREATMENT
		$filterList = Concat($filterList, $this->SerumP4->AdvancedSearch->toJson(), ","); // Field SerumP4
		$filterList = Concat($filterList, $this->FORT->AdvancedSearch->toJson(), ","); // Field FORT
		$filterList = Concat($filterList, $this->MedicalFactors->AdvancedSearch->toJson(), ","); // Field MedicalFactors
		$filterList = Concat($filterList, $this->SCDate->AdvancedSearch->toJson(), ","); // Field SCDate
		$filterList = Concat($filterList, $this->OvarianSurgery->AdvancedSearch->toJson(), ","); // Field OvarianSurgery
		$filterList = Concat($filterList, $this->PreProcedureOrder->AdvancedSearch->toJson(), ","); // Field PreProcedureOrder
		$filterList = Concat($filterList, $this->TRIGGERR->AdvancedSearch->toJson(), ","); // Field TRIGGERR
		$filterList = Concat($filterList, $this->TRIGGERDATE->AdvancedSearch->toJson(), ","); // Field TRIGGERDATE
		$filterList = Concat($filterList, $this->ATHOMEorCLINIC->AdvancedSearch->toJson(), ","); // Field ATHOMEorCLINIC
		$filterList = Concat($filterList, $this->OPUDATE->AdvancedSearch->toJson(), ","); // Field OPUDATE
		$filterList = Concat($filterList, $this->ALLFREEZEINDICATION->AdvancedSearch->toJson(), ","); // Field ALLFREEZEINDICATION
		$filterList = Concat($filterList, $this->ERA->AdvancedSearch->toJson(), ","); // Field ERA
		$filterList = Concat($filterList, $this->PGTA->AdvancedSearch->toJson(), ","); // Field PGTA
		$filterList = Concat($filterList, $this->PGD->AdvancedSearch->toJson(), ","); // Field PGD
		$filterList = Concat($filterList, $this->DATEOFET->AdvancedSearch->toJson(), ","); // Field DATEOFET
		$filterList = Concat($filterList, $this->ET->AdvancedSearch->toJson(), ","); // Field ET
		$filterList = Concat($filterList, $this->ESET->AdvancedSearch->toJson(), ","); // Field ESET
		$filterList = Concat($filterList, $this->DOET->AdvancedSearch->toJson(), ","); // Field DOET
		$filterList = Concat($filterList, $this->SEMENPREPARATION->AdvancedSearch->toJson(), ","); // Field SEMENPREPARATION
		$filterList = Concat($filterList, $this->REASONFORESET->AdvancedSearch->toJson(), ","); // Field REASONFORESET
		$filterList = Concat($filterList, $this->Expectedoocytes->AdvancedSearch->toJson(), ","); // Field Expectedoocytes
		$filterList = Concat($filterList, $this->StChDate1->AdvancedSearch->toJson(), ","); // Field StChDate1
		$filterList = Concat($filterList, $this->StChDate2->AdvancedSearch->toJson(), ","); // Field StChDate2
		$filterList = Concat($filterList, $this->StChDate3->AdvancedSearch->toJson(), ","); // Field StChDate3
		$filterList = Concat($filterList, $this->StChDate4->AdvancedSearch->toJson(), ","); // Field StChDate4
		$filterList = Concat($filterList, $this->StChDate5->AdvancedSearch->toJson(), ","); // Field StChDate5
		$filterList = Concat($filterList, $this->StChDate6->AdvancedSearch->toJson(), ","); // Field StChDate6
		$filterList = Concat($filterList, $this->StChDate7->AdvancedSearch->toJson(), ","); // Field StChDate7
		$filterList = Concat($filterList, $this->StChDate8->AdvancedSearch->toJson(), ","); // Field StChDate8
		$filterList = Concat($filterList, $this->StChDate9->AdvancedSearch->toJson(), ","); // Field StChDate9
		$filterList = Concat($filterList, $this->StChDate10->AdvancedSearch->toJson(), ","); // Field StChDate10
		$filterList = Concat($filterList, $this->StChDate11->AdvancedSearch->toJson(), ","); // Field StChDate11
		$filterList = Concat($filterList, $this->StChDate12->AdvancedSearch->toJson(), ","); // Field StChDate12
		$filterList = Concat($filterList, $this->StChDate13->AdvancedSearch->toJson(), ","); // Field StChDate13
		$filterList = Concat($filterList, $this->CycleDay1->AdvancedSearch->toJson(), ","); // Field CycleDay1
		$filterList = Concat($filterList, $this->CycleDay2->AdvancedSearch->toJson(), ","); // Field CycleDay2
		$filterList = Concat($filterList, $this->CycleDay3->AdvancedSearch->toJson(), ","); // Field CycleDay3
		$filterList = Concat($filterList, $this->CycleDay4->AdvancedSearch->toJson(), ","); // Field CycleDay4
		$filterList = Concat($filterList, $this->CycleDay5->AdvancedSearch->toJson(), ","); // Field CycleDay5
		$filterList = Concat($filterList, $this->CycleDay6->AdvancedSearch->toJson(), ","); // Field CycleDay6
		$filterList = Concat($filterList, $this->CycleDay7->AdvancedSearch->toJson(), ","); // Field CycleDay7
		$filterList = Concat($filterList, $this->CycleDay8->AdvancedSearch->toJson(), ","); // Field CycleDay8
		$filterList = Concat($filterList, $this->CycleDay9->AdvancedSearch->toJson(), ","); // Field CycleDay9
		$filterList = Concat($filterList, $this->CycleDay10->AdvancedSearch->toJson(), ","); // Field CycleDay10
		$filterList = Concat($filterList, $this->CycleDay11->AdvancedSearch->toJson(), ","); // Field CycleDay11
		$filterList = Concat($filterList, $this->CycleDay12->AdvancedSearch->toJson(), ","); // Field CycleDay12
		$filterList = Concat($filterList, $this->CycleDay13->AdvancedSearch->toJson(), ","); // Field CycleDay13
		$filterList = Concat($filterList, $this->StimulationDay1->AdvancedSearch->toJson(), ","); // Field StimulationDay1
		$filterList = Concat($filterList, $this->StimulationDay2->AdvancedSearch->toJson(), ","); // Field StimulationDay2
		$filterList = Concat($filterList, $this->StimulationDay3->AdvancedSearch->toJson(), ","); // Field StimulationDay3
		$filterList = Concat($filterList, $this->StimulationDay4->AdvancedSearch->toJson(), ","); // Field StimulationDay4
		$filterList = Concat($filterList, $this->StimulationDay5->AdvancedSearch->toJson(), ","); // Field StimulationDay5
		$filterList = Concat($filterList, $this->StimulationDay6->AdvancedSearch->toJson(), ","); // Field StimulationDay6
		$filterList = Concat($filterList, $this->StimulationDay7->AdvancedSearch->toJson(), ","); // Field StimulationDay7
		$filterList = Concat($filterList, $this->StimulationDay8->AdvancedSearch->toJson(), ","); // Field StimulationDay8
		$filterList = Concat($filterList, $this->StimulationDay9->AdvancedSearch->toJson(), ","); // Field StimulationDay9
		$filterList = Concat($filterList, $this->StimulationDay10->AdvancedSearch->toJson(), ","); // Field StimulationDay10
		$filterList = Concat($filterList, $this->StimulationDay11->AdvancedSearch->toJson(), ","); // Field StimulationDay11
		$filterList = Concat($filterList, $this->StimulationDay12->AdvancedSearch->toJson(), ","); // Field StimulationDay12
		$filterList = Concat($filterList, $this->StimulationDay13->AdvancedSearch->toJson(), ","); // Field StimulationDay13
		$filterList = Concat($filterList, $this->Tablet1->AdvancedSearch->toJson(), ","); // Field Tablet1
		$filterList = Concat($filterList, $this->Tablet2->AdvancedSearch->toJson(), ","); // Field Tablet2
		$filterList = Concat($filterList, $this->Tablet3->AdvancedSearch->toJson(), ","); // Field Tablet3
		$filterList = Concat($filterList, $this->Tablet4->AdvancedSearch->toJson(), ","); // Field Tablet4
		$filterList = Concat($filterList, $this->Tablet5->AdvancedSearch->toJson(), ","); // Field Tablet5
		$filterList = Concat($filterList, $this->Tablet6->AdvancedSearch->toJson(), ","); // Field Tablet6
		$filterList = Concat($filterList, $this->Tablet7->AdvancedSearch->toJson(), ","); // Field Tablet7
		$filterList = Concat($filterList, $this->Tablet8->AdvancedSearch->toJson(), ","); // Field Tablet8
		$filterList = Concat($filterList, $this->Tablet9->AdvancedSearch->toJson(), ","); // Field Tablet9
		$filterList = Concat($filterList, $this->Tablet10->AdvancedSearch->toJson(), ","); // Field Tablet10
		$filterList = Concat($filterList, $this->Tablet11->AdvancedSearch->toJson(), ","); // Field Tablet11
		$filterList = Concat($filterList, $this->Tablet12->AdvancedSearch->toJson(), ","); // Field Tablet12
		$filterList = Concat($filterList, $this->Tablet13->AdvancedSearch->toJson(), ","); // Field Tablet13
		$filterList = Concat($filterList, $this->RFSH1->AdvancedSearch->toJson(), ","); // Field RFSH1
		$filterList = Concat($filterList, $this->RFSH2->AdvancedSearch->toJson(), ","); // Field RFSH2
		$filterList = Concat($filterList, $this->RFSH3->AdvancedSearch->toJson(), ","); // Field RFSH3
		$filterList = Concat($filterList, $this->RFSH4->AdvancedSearch->toJson(), ","); // Field RFSH4
		$filterList = Concat($filterList, $this->RFSH5->AdvancedSearch->toJson(), ","); // Field RFSH5
		$filterList = Concat($filterList, $this->RFSH6->AdvancedSearch->toJson(), ","); // Field RFSH6
		$filterList = Concat($filterList, $this->RFSH7->AdvancedSearch->toJson(), ","); // Field RFSH7
		$filterList = Concat($filterList, $this->RFSH8->AdvancedSearch->toJson(), ","); // Field RFSH8
		$filterList = Concat($filterList, $this->RFSH9->AdvancedSearch->toJson(), ","); // Field RFSH9
		$filterList = Concat($filterList, $this->RFSH10->AdvancedSearch->toJson(), ","); // Field RFSH10
		$filterList = Concat($filterList, $this->RFSH11->AdvancedSearch->toJson(), ","); // Field RFSH11
		$filterList = Concat($filterList, $this->RFSH12->AdvancedSearch->toJson(), ","); // Field RFSH12
		$filterList = Concat($filterList, $this->RFSH13->AdvancedSearch->toJson(), ","); // Field RFSH13
		$filterList = Concat($filterList, $this->HMG1->AdvancedSearch->toJson(), ","); // Field HMG1
		$filterList = Concat($filterList, $this->HMG2->AdvancedSearch->toJson(), ","); // Field HMG2
		$filterList = Concat($filterList, $this->HMG3->AdvancedSearch->toJson(), ","); // Field HMG3
		$filterList = Concat($filterList, $this->HMG4->AdvancedSearch->toJson(), ","); // Field HMG4
		$filterList = Concat($filterList, $this->HMG5->AdvancedSearch->toJson(), ","); // Field HMG5
		$filterList = Concat($filterList, $this->HMG6->AdvancedSearch->toJson(), ","); // Field HMG6
		$filterList = Concat($filterList, $this->HMG7->AdvancedSearch->toJson(), ","); // Field HMG7
		$filterList = Concat($filterList, $this->HMG8->AdvancedSearch->toJson(), ","); // Field HMG8
		$filterList = Concat($filterList, $this->HMG9->AdvancedSearch->toJson(), ","); // Field HMG9
		$filterList = Concat($filterList, $this->HMG10->AdvancedSearch->toJson(), ","); // Field HMG10
		$filterList = Concat($filterList, $this->HMG11->AdvancedSearch->toJson(), ","); // Field HMG11
		$filterList = Concat($filterList, $this->HMG12->AdvancedSearch->toJson(), ","); // Field HMG12
		$filterList = Concat($filterList, $this->HMG13->AdvancedSearch->toJson(), ","); // Field HMG13
		$filterList = Concat($filterList, $this->GnRH1->AdvancedSearch->toJson(), ","); // Field GnRH1
		$filterList = Concat($filterList, $this->GnRH2->AdvancedSearch->toJson(), ","); // Field GnRH2
		$filterList = Concat($filterList, $this->GnRH3->AdvancedSearch->toJson(), ","); // Field GnRH3
		$filterList = Concat($filterList, $this->GnRH4->AdvancedSearch->toJson(), ","); // Field GnRH4
		$filterList = Concat($filterList, $this->GnRH5->AdvancedSearch->toJson(), ","); // Field GnRH5
		$filterList = Concat($filterList, $this->GnRH6->AdvancedSearch->toJson(), ","); // Field GnRH6
		$filterList = Concat($filterList, $this->GnRH7->AdvancedSearch->toJson(), ","); // Field GnRH7
		$filterList = Concat($filterList, $this->GnRH8->AdvancedSearch->toJson(), ","); // Field GnRH8
		$filterList = Concat($filterList, $this->GnRH9->AdvancedSearch->toJson(), ","); // Field GnRH9
		$filterList = Concat($filterList, $this->GnRH10->AdvancedSearch->toJson(), ","); // Field GnRH10
		$filterList = Concat($filterList, $this->GnRH11->AdvancedSearch->toJson(), ","); // Field GnRH11
		$filterList = Concat($filterList, $this->GnRH12->AdvancedSearch->toJson(), ","); // Field GnRH12
		$filterList = Concat($filterList, $this->GnRH13->AdvancedSearch->toJson(), ","); // Field GnRH13
		$filterList = Concat($filterList, $this->E21->AdvancedSearch->toJson(), ","); // Field E21
		$filterList = Concat($filterList, $this->E22->AdvancedSearch->toJson(), ","); // Field E22
		$filterList = Concat($filterList, $this->E23->AdvancedSearch->toJson(), ","); // Field E23
		$filterList = Concat($filterList, $this->E24->AdvancedSearch->toJson(), ","); // Field E24
		$filterList = Concat($filterList, $this->E25->AdvancedSearch->toJson(), ","); // Field E25
		$filterList = Concat($filterList, $this->E26->AdvancedSearch->toJson(), ","); // Field E26
		$filterList = Concat($filterList, $this->E27->AdvancedSearch->toJson(), ","); // Field E27
		$filterList = Concat($filterList, $this->E28->AdvancedSearch->toJson(), ","); // Field E28
		$filterList = Concat($filterList, $this->E29->AdvancedSearch->toJson(), ","); // Field E29
		$filterList = Concat($filterList, $this->E210->AdvancedSearch->toJson(), ","); // Field E210
		$filterList = Concat($filterList, $this->E211->AdvancedSearch->toJson(), ","); // Field E211
		$filterList = Concat($filterList, $this->E212->AdvancedSearch->toJson(), ","); // Field E212
		$filterList = Concat($filterList, $this->E213->AdvancedSearch->toJson(), ","); // Field E213
		$filterList = Concat($filterList, $this->P41->AdvancedSearch->toJson(), ","); // Field P41
		$filterList = Concat($filterList, $this->P42->AdvancedSearch->toJson(), ","); // Field P42
		$filterList = Concat($filterList, $this->P43->AdvancedSearch->toJson(), ","); // Field P43
		$filterList = Concat($filterList, $this->P44->AdvancedSearch->toJson(), ","); // Field P44
		$filterList = Concat($filterList, $this->P45->AdvancedSearch->toJson(), ","); // Field P45
		$filterList = Concat($filterList, $this->P46->AdvancedSearch->toJson(), ","); // Field P46
		$filterList = Concat($filterList, $this->P47->AdvancedSearch->toJson(), ","); // Field P47
		$filterList = Concat($filterList, $this->P48->AdvancedSearch->toJson(), ","); // Field P48
		$filterList = Concat($filterList, $this->P49->AdvancedSearch->toJson(), ","); // Field P49
		$filterList = Concat($filterList, $this->P410->AdvancedSearch->toJson(), ","); // Field P410
		$filterList = Concat($filterList, $this->P411->AdvancedSearch->toJson(), ","); // Field P411
		$filterList = Concat($filterList, $this->P412->AdvancedSearch->toJson(), ","); // Field P412
		$filterList = Concat($filterList, $this->P413->AdvancedSearch->toJson(), ","); // Field P413
		$filterList = Concat($filterList, $this->USGRt1->AdvancedSearch->toJson(), ","); // Field USGRt1
		$filterList = Concat($filterList, $this->USGRt2->AdvancedSearch->toJson(), ","); // Field USGRt2
		$filterList = Concat($filterList, $this->USGRt3->AdvancedSearch->toJson(), ","); // Field USGRt3
		$filterList = Concat($filterList, $this->USGRt4->AdvancedSearch->toJson(), ","); // Field USGRt4
		$filterList = Concat($filterList, $this->USGRt5->AdvancedSearch->toJson(), ","); // Field USGRt5
		$filterList = Concat($filterList, $this->USGRt6->AdvancedSearch->toJson(), ","); // Field USGRt6
		$filterList = Concat($filterList, $this->USGRt7->AdvancedSearch->toJson(), ","); // Field USGRt7
		$filterList = Concat($filterList, $this->USGRt8->AdvancedSearch->toJson(), ","); // Field USGRt8
		$filterList = Concat($filterList, $this->USGRt9->AdvancedSearch->toJson(), ","); // Field USGRt9
		$filterList = Concat($filterList, $this->USGRt10->AdvancedSearch->toJson(), ","); // Field USGRt10
		$filterList = Concat($filterList, $this->USGRt11->AdvancedSearch->toJson(), ","); // Field USGRt11
		$filterList = Concat($filterList, $this->USGRt12->AdvancedSearch->toJson(), ","); // Field USGRt12
		$filterList = Concat($filterList, $this->USGRt13->AdvancedSearch->toJson(), ","); // Field USGRt13
		$filterList = Concat($filterList, $this->USGLt1->AdvancedSearch->toJson(), ","); // Field USGLt1
		$filterList = Concat($filterList, $this->USGLt2->AdvancedSearch->toJson(), ","); // Field USGLt2
		$filterList = Concat($filterList, $this->USGLt3->AdvancedSearch->toJson(), ","); // Field USGLt3
		$filterList = Concat($filterList, $this->USGLt4->AdvancedSearch->toJson(), ","); // Field USGLt4
		$filterList = Concat($filterList, $this->USGLt5->AdvancedSearch->toJson(), ","); // Field USGLt5
		$filterList = Concat($filterList, $this->USGLt6->AdvancedSearch->toJson(), ","); // Field USGLt6
		$filterList = Concat($filterList, $this->USGLt7->AdvancedSearch->toJson(), ","); // Field USGLt7
		$filterList = Concat($filterList, $this->USGLt8->AdvancedSearch->toJson(), ","); // Field USGLt8
		$filterList = Concat($filterList, $this->USGLt9->AdvancedSearch->toJson(), ","); // Field USGLt9
		$filterList = Concat($filterList, $this->USGLt10->AdvancedSearch->toJson(), ","); // Field USGLt10
		$filterList = Concat($filterList, $this->USGLt11->AdvancedSearch->toJson(), ","); // Field USGLt11
		$filterList = Concat($filterList, $this->USGLt12->AdvancedSearch->toJson(), ","); // Field USGLt12
		$filterList = Concat($filterList, $this->USGLt13->AdvancedSearch->toJson(), ","); // Field USGLt13
		$filterList = Concat($filterList, $this->EM1->AdvancedSearch->toJson(), ","); // Field EM1
		$filterList = Concat($filterList, $this->EM2->AdvancedSearch->toJson(), ","); // Field EM2
		$filterList = Concat($filterList, $this->EM3->AdvancedSearch->toJson(), ","); // Field EM3
		$filterList = Concat($filterList, $this->EM4->AdvancedSearch->toJson(), ","); // Field EM4
		$filterList = Concat($filterList, $this->EM5->AdvancedSearch->toJson(), ","); // Field EM5
		$filterList = Concat($filterList, $this->EM6->AdvancedSearch->toJson(), ","); // Field EM6
		$filterList = Concat($filterList, $this->EM7->AdvancedSearch->toJson(), ","); // Field EM7
		$filterList = Concat($filterList, $this->EM8->AdvancedSearch->toJson(), ","); // Field EM8
		$filterList = Concat($filterList, $this->EM9->AdvancedSearch->toJson(), ","); // Field EM9
		$filterList = Concat($filterList, $this->EM10->AdvancedSearch->toJson(), ","); // Field EM10
		$filterList = Concat($filterList, $this->EM11->AdvancedSearch->toJson(), ","); // Field EM11
		$filterList = Concat($filterList, $this->EM12->AdvancedSearch->toJson(), ","); // Field EM12
		$filterList = Concat($filterList, $this->EM13->AdvancedSearch->toJson(), ","); // Field EM13
		$filterList = Concat($filterList, $this->Others1->AdvancedSearch->toJson(), ","); // Field Others1
		$filterList = Concat($filterList, $this->Others2->AdvancedSearch->toJson(), ","); // Field Others2
		$filterList = Concat($filterList, $this->Others3->AdvancedSearch->toJson(), ","); // Field Others3
		$filterList = Concat($filterList, $this->Others4->AdvancedSearch->toJson(), ","); // Field Others4
		$filterList = Concat($filterList, $this->Others5->AdvancedSearch->toJson(), ","); // Field Others5
		$filterList = Concat($filterList, $this->Others6->AdvancedSearch->toJson(), ","); // Field Others6
		$filterList = Concat($filterList, $this->Others7->AdvancedSearch->toJson(), ","); // Field Others7
		$filterList = Concat($filterList, $this->Others8->AdvancedSearch->toJson(), ","); // Field Others8
		$filterList = Concat($filterList, $this->Others9->AdvancedSearch->toJson(), ","); // Field Others9
		$filterList = Concat($filterList, $this->Others10->AdvancedSearch->toJson(), ","); // Field Others10
		$filterList = Concat($filterList, $this->Others11->AdvancedSearch->toJson(), ","); // Field Others11
		$filterList = Concat($filterList, $this->Others12->AdvancedSearch->toJson(), ","); // Field Others12
		$filterList = Concat($filterList, $this->Others13->AdvancedSearch->toJson(), ","); // Field Others13
		$filterList = Concat($filterList, $this->DR1->AdvancedSearch->toJson(), ","); // Field DR1
		$filterList = Concat($filterList, $this->DR2->AdvancedSearch->toJson(), ","); // Field DR2
		$filterList = Concat($filterList, $this->DR3->AdvancedSearch->toJson(), ","); // Field DR3
		$filterList = Concat($filterList, $this->DR4->AdvancedSearch->toJson(), ","); // Field DR4
		$filterList = Concat($filterList, $this->DR5->AdvancedSearch->toJson(), ","); // Field DR5
		$filterList = Concat($filterList, $this->DR6->AdvancedSearch->toJson(), ","); // Field DR6
		$filterList = Concat($filterList, $this->DR7->AdvancedSearch->toJson(), ","); // Field DR7
		$filterList = Concat($filterList, $this->DR8->AdvancedSearch->toJson(), ","); // Field DR8
		$filterList = Concat($filterList, $this->DR9->AdvancedSearch->toJson(), ","); // Field DR9
		$filterList = Concat($filterList, $this->DR10->AdvancedSearch->toJson(), ","); // Field DR10
		$filterList = Concat($filterList, $this->DR11->AdvancedSearch->toJson(), ","); // Field DR11
		$filterList = Concat($filterList, $this->DR12->AdvancedSearch->toJson(), ","); // Field DR12
		$filterList = Concat($filterList, $this->DR13->AdvancedSearch->toJson(), ","); // Field DR13
		$filterList = Concat($filterList, $this->DOCTORRESPONSIBLE->AdvancedSearch->toJson(), ","); // Field DOCTORRESPONSIBLE
		$filterList = Concat($filterList, $this->TidNo->AdvancedSearch->toJson(), ","); // Field TidNo
		$filterList = Concat($filterList, $this->Convert->AdvancedSearch->toJson(), ","); // Field Convert
		$filterList = Concat($filterList, $this->Consultant->AdvancedSearch->toJson(), ","); // Field Consultant
		$filterList = Concat($filterList, $this->InseminatinTechnique->AdvancedSearch->toJson(), ","); // Field InseminatinTechnique
		$filterList = Concat($filterList, $this->IndicationForART->AdvancedSearch->toJson(), ","); // Field IndicationForART
		$filterList = Concat($filterList, $this->Hysteroscopy->AdvancedSearch->toJson(), ","); // Field Hysteroscopy
		$filterList = Concat($filterList, $this->EndometrialScratching->AdvancedSearch->toJson(), ","); // Field EndometrialScratching
		$filterList = Concat($filterList, $this->TrialCannulation->AdvancedSearch->toJson(), ","); // Field TrialCannulation
		$filterList = Concat($filterList, $this->CYCLETYPE->AdvancedSearch->toJson(), ","); // Field CYCLETYPE
		$filterList = Concat($filterList, $this->HRTCYCLE->AdvancedSearch->toJson(), ","); // Field HRTCYCLE
		$filterList = Concat($filterList, $this->OralEstrogenDosage->AdvancedSearch->toJson(), ","); // Field OralEstrogenDosage
		$filterList = Concat($filterList, $this->VaginalEstrogen->AdvancedSearch->toJson(), ","); // Field VaginalEstrogen
		$filterList = Concat($filterList, $this->GCSF->AdvancedSearch->toJson(), ","); // Field GCSF
		$filterList = Concat($filterList, $this->ActivatedPRP->AdvancedSearch->toJson(), ","); // Field ActivatedPRP
		$filterList = Concat($filterList, $this->UCLcm->AdvancedSearch->toJson(), ","); // Field UCLcm
		$filterList = Concat($filterList, $this->DATOFEMBRYOTRANSFER->AdvancedSearch->toJson(), ","); // Field DATOFEMBRYOTRANSFER
		$filterList = Concat($filterList, $this->DAYOFEMBRYOTRANSFER->AdvancedSearch->toJson(), ","); // Field DAYOFEMBRYOTRANSFER
		$filterList = Concat($filterList, $this->NOOFEMBRYOSTHAWED->AdvancedSearch->toJson(), ","); // Field NOOFEMBRYOSTHAWED
		$filterList = Concat($filterList, $this->NOOFEMBRYOSTRANSFERRED->AdvancedSearch->toJson(), ","); // Field NOOFEMBRYOSTRANSFERRED
		$filterList = Concat($filterList, $this->DAYOFEMBRYOS->AdvancedSearch->toJson(), ","); // Field DAYOFEMBRYOS
		$filterList = Concat($filterList, $this->CRYOPRESERVEDEMBRYOS->AdvancedSearch->toJson(), ","); // Field CRYOPRESERVEDEMBRYOS
		$filterList = Concat($filterList, $this->ViaAdmin->AdvancedSearch->toJson(), ","); // Field ViaAdmin
		$filterList = Concat($filterList, $this->ViaStartDateTime->AdvancedSearch->toJson(), ","); // Field ViaStartDateTime
		$filterList = Concat($filterList, $this->ViaDose->AdvancedSearch->toJson(), ","); // Field ViaDose
		$filterList = Concat($filterList, $this->AllFreeze->AdvancedSearch->toJson(), ","); // Field AllFreeze
		$filterList = Concat($filterList, $this->TreatmentCancel->AdvancedSearch->toJson(), ","); // Field TreatmentCancel
		$filterList = Concat($filterList, $this->Reason->AdvancedSearch->toJson(), ","); // Field Reason
		$filterList = Concat($filterList, $this->ProgesteroneAdmin->AdvancedSearch->toJson(), ","); // Field ProgesteroneAdmin
		$filterList = Concat($filterList, $this->ProgesteroneStart->AdvancedSearch->toJson(), ","); // Field ProgesteroneStart
		$filterList = Concat($filterList, $this->ProgesteroneDose->AdvancedSearch->toJson(), ","); // Field ProgesteroneDose
		$filterList = Concat($filterList, $this->Projectron->AdvancedSearch->toJson(), ","); // Field Projectron
		$filterList = Concat($filterList, $this->StChDate14->AdvancedSearch->toJson(), ","); // Field StChDate14
		$filterList = Concat($filterList, $this->StChDate15->AdvancedSearch->toJson(), ","); // Field StChDate15
		$filterList = Concat($filterList, $this->StChDate16->AdvancedSearch->toJson(), ","); // Field StChDate16
		$filterList = Concat($filterList, $this->StChDate17->AdvancedSearch->toJson(), ","); // Field StChDate17
		$filterList = Concat($filterList, $this->StChDate18->AdvancedSearch->toJson(), ","); // Field StChDate18
		$filterList = Concat($filterList, $this->StChDate19->AdvancedSearch->toJson(), ","); // Field StChDate19
		$filterList = Concat($filterList, $this->StChDate20->AdvancedSearch->toJson(), ","); // Field StChDate20
		$filterList = Concat($filterList, $this->StChDate21->AdvancedSearch->toJson(), ","); // Field StChDate21
		$filterList = Concat($filterList, $this->StChDate22->AdvancedSearch->toJson(), ","); // Field StChDate22
		$filterList = Concat($filterList, $this->StChDate23->AdvancedSearch->toJson(), ","); // Field StChDate23
		$filterList = Concat($filterList, $this->StChDate24->AdvancedSearch->toJson(), ","); // Field StChDate24
		$filterList = Concat($filterList, $this->StChDate25->AdvancedSearch->toJson(), ","); // Field StChDate25
		$filterList = Concat($filterList, $this->CycleDay14->AdvancedSearch->toJson(), ","); // Field CycleDay14
		$filterList = Concat($filterList, $this->CycleDay15->AdvancedSearch->toJson(), ","); // Field CycleDay15
		$filterList = Concat($filterList, $this->CycleDay16->AdvancedSearch->toJson(), ","); // Field CycleDay16
		$filterList = Concat($filterList, $this->CycleDay17->AdvancedSearch->toJson(), ","); // Field CycleDay17
		$filterList = Concat($filterList, $this->CycleDay18->AdvancedSearch->toJson(), ","); // Field CycleDay18
		$filterList = Concat($filterList, $this->CycleDay19->AdvancedSearch->toJson(), ","); // Field CycleDay19
		$filterList = Concat($filterList, $this->CycleDay20->AdvancedSearch->toJson(), ","); // Field CycleDay20
		$filterList = Concat($filterList, $this->CycleDay21->AdvancedSearch->toJson(), ","); // Field CycleDay21
		$filterList = Concat($filterList, $this->CycleDay22->AdvancedSearch->toJson(), ","); // Field CycleDay22
		$filterList = Concat($filterList, $this->CycleDay23->AdvancedSearch->toJson(), ","); // Field CycleDay23
		$filterList = Concat($filterList, $this->CycleDay24->AdvancedSearch->toJson(), ","); // Field CycleDay24
		$filterList = Concat($filterList, $this->CycleDay25->AdvancedSearch->toJson(), ","); // Field CycleDay25
		$filterList = Concat($filterList, $this->StimulationDay14->AdvancedSearch->toJson(), ","); // Field StimulationDay14
		$filterList = Concat($filterList, $this->StimulationDay15->AdvancedSearch->toJson(), ","); // Field StimulationDay15
		$filterList = Concat($filterList, $this->StimulationDay16->AdvancedSearch->toJson(), ","); // Field StimulationDay16
		$filterList = Concat($filterList, $this->StimulationDay17->AdvancedSearch->toJson(), ","); // Field StimulationDay17
		$filterList = Concat($filterList, $this->StimulationDay18->AdvancedSearch->toJson(), ","); // Field StimulationDay18
		$filterList = Concat($filterList, $this->StimulationDay19->AdvancedSearch->toJson(), ","); // Field StimulationDay19
		$filterList = Concat($filterList, $this->StimulationDay20->AdvancedSearch->toJson(), ","); // Field StimulationDay20
		$filterList = Concat($filterList, $this->StimulationDay21->AdvancedSearch->toJson(), ","); // Field StimulationDay21
		$filterList = Concat($filterList, $this->StimulationDay22->AdvancedSearch->toJson(), ","); // Field StimulationDay22
		$filterList = Concat($filterList, $this->StimulationDay23->AdvancedSearch->toJson(), ","); // Field StimulationDay23
		$filterList = Concat($filterList, $this->StimulationDay24->AdvancedSearch->toJson(), ","); // Field StimulationDay24
		$filterList = Concat($filterList, $this->StimulationDay25->AdvancedSearch->toJson(), ","); // Field StimulationDay25
		$filterList = Concat($filterList, $this->Tablet14->AdvancedSearch->toJson(), ","); // Field Tablet14
		$filterList = Concat($filterList, $this->Tablet15->AdvancedSearch->toJson(), ","); // Field Tablet15
		$filterList = Concat($filterList, $this->Tablet16->AdvancedSearch->toJson(), ","); // Field Tablet16
		$filterList = Concat($filterList, $this->Tablet17->AdvancedSearch->toJson(), ","); // Field Tablet17
		$filterList = Concat($filterList, $this->Tablet18->AdvancedSearch->toJson(), ","); // Field Tablet18
		$filterList = Concat($filterList, $this->Tablet19->AdvancedSearch->toJson(), ","); // Field Tablet19
		$filterList = Concat($filterList, $this->Tablet20->AdvancedSearch->toJson(), ","); // Field Tablet20
		$filterList = Concat($filterList, $this->Tablet21->AdvancedSearch->toJson(), ","); // Field Tablet21
		$filterList = Concat($filterList, $this->Tablet22->AdvancedSearch->toJson(), ","); // Field Tablet22
		$filterList = Concat($filterList, $this->Tablet23->AdvancedSearch->toJson(), ","); // Field Tablet23
		$filterList = Concat($filterList, $this->Tablet24->AdvancedSearch->toJson(), ","); // Field Tablet24
		$filterList = Concat($filterList, $this->Tablet25->AdvancedSearch->toJson(), ","); // Field Tablet25
		$filterList = Concat($filterList, $this->RFSH14->AdvancedSearch->toJson(), ","); // Field RFSH14
		$filterList = Concat($filterList, $this->RFSH15->AdvancedSearch->toJson(), ","); // Field RFSH15
		$filterList = Concat($filterList, $this->RFSH16->AdvancedSearch->toJson(), ","); // Field RFSH16
		$filterList = Concat($filterList, $this->RFSH17->AdvancedSearch->toJson(), ","); // Field RFSH17
		$filterList = Concat($filterList, $this->RFSH18->AdvancedSearch->toJson(), ","); // Field RFSH18
		$filterList = Concat($filterList, $this->RFSH19->AdvancedSearch->toJson(), ","); // Field RFSH19
		$filterList = Concat($filterList, $this->RFSH20->AdvancedSearch->toJson(), ","); // Field RFSH20
		$filterList = Concat($filterList, $this->RFSH21->AdvancedSearch->toJson(), ","); // Field RFSH21
		$filterList = Concat($filterList, $this->RFSH22->AdvancedSearch->toJson(), ","); // Field RFSH22
		$filterList = Concat($filterList, $this->RFSH23->AdvancedSearch->toJson(), ","); // Field RFSH23
		$filterList = Concat($filterList, $this->RFSH24->AdvancedSearch->toJson(), ","); // Field RFSH24
		$filterList = Concat($filterList, $this->RFSH25->AdvancedSearch->toJson(), ","); // Field RFSH25
		$filterList = Concat($filterList, $this->HMG14->AdvancedSearch->toJson(), ","); // Field HMG14
		$filterList = Concat($filterList, $this->HMG15->AdvancedSearch->toJson(), ","); // Field HMG15
		$filterList = Concat($filterList, $this->HMG16->AdvancedSearch->toJson(), ","); // Field HMG16
		$filterList = Concat($filterList, $this->HMG17->AdvancedSearch->toJson(), ","); // Field HMG17
		$filterList = Concat($filterList, $this->HMG18->AdvancedSearch->toJson(), ","); // Field HMG18
		$filterList = Concat($filterList, $this->HMG19->AdvancedSearch->toJson(), ","); // Field HMG19
		$filterList = Concat($filterList, $this->HMG20->AdvancedSearch->toJson(), ","); // Field HMG20
		$filterList = Concat($filterList, $this->HMG21->AdvancedSearch->toJson(), ","); // Field HMG21
		$filterList = Concat($filterList, $this->HMG22->AdvancedSearch->toJson(), ","); // Field HMG22
		$filterList = Concat($filterList, $this->HMG23->AdvancedSearch->toJson(), ","); // Field HMG23
		$filterList = Concat($filterList, $this->HMG24->AdvancedSearch->toJson(), ","); // Field HMG24
		$filterList = Concat($filterList, $this->HMG25->AdvancedSearch->toJson(), ","); // Field HMG25
		$filterList = Concat($filterList, $this->GnRH14->AdvancedSearch->toJson(), ","); // Field GnRH14
		$filterList = Concat($filterList, $this->GnRH15->AdvancedSearch->toJson(), ","); // Field GnRH15
		$filterList = Concat($filterList, $this->GnRH16->AdvancedSearch->toJson(), ","); // Field GnRH16
		$filterList = Concat($filterList, $this->GnRH17->AdvancedSearch->toJson(), ","); // Field GnRH17
		$filterList = Concat($filterList, $this->GnRH18->AdvancedSearch->toJson(), ","); // Field GnRH18
		$filterList = Concat($filterList, $this->GnRH19->AdvancedSearch->toJson(), ","); // Field GnRH19
		$filterList = Concat($filterList, $this->GnRH20->AdvancedSearch->toJson(), ","); // Field GnRH20
		$filterList = Concat($filterList, $this->GnRH21->AdvancedSearch->toJson(), ","); // Field GnRH21
		$filterList = Concat($filterList, $this->GnRH22->AdvancedSearch->toJson(), ","); // Field GnRH22
		$filterList = Concat($filterList, $this->GnRH23->AdvancedSearch->toJson(), ","); // Field GnRH23
		$filterList = Concat($filterList, $this->GnRH24->AdvancedSearch->toJson(), ","); // Field GnRH24
		$filterList = Concat($filterList, $this->GnRH25->AdvancedSearch->toJson(), ","); // Field GnRH25
		$filterList = Concat($filterList, $this->P414->AdvancedSearch->toJson(), ","); // Field P414
		$filterList = Concat($filterList, $this->P415->AdvancedSearch->toJson(), ","); // Field P415
		$filterList = Concat($filterList, $this->P416->AdvancedSearch->toJson(), ","); // Field P416
		$filterList = Concat($filterList, $this->P417->AdvancedSearch->toJson(), ","); // Field P417
		$filterList = Concat($filterList, $this->P418->AdvancedSearch->toJson(), ","); // Field P418
		$filterList = Concat($filterList, $this->P419->AdvancedSearch->toJson(), ","); // Field P419
		$filterList = Concat($filterList, $this->P420->AdvancedSearch->toJson(), ","); // Field P420
		$filterList = Concat($filterList, $this->P421->AdvancedSearch->toJson(), ","); // Field P421
		$filterList = Concat($filterList, $this->P422->AdvancedSearch->toJson(), ","); // Field P422
		$filterList = Concat($filterList, $this->P423->AdvancedSearch->toJson(), ","); // Field P423
		$filterList = Concat($filterList, $this->P424->AdvancedSearch->toJson(), ","); // Field P424
		$filterList = Concat($filterList, $this->P425->AdvancedSearch->toJson(), ","); // Field P425
		$filterList = Concat($filterList, $this->USGRt14->AdvancedSearch->toJson(), ","); // Field USGRt14
		$filterList = Concat($filterList, $this->USGRt15->AdvancedSearch->toJson(), ","); // Field USGRt15
		$filterList = Concat($filterList, $this->USGRt16->AdvancedSearch->toJson(), ","); // Field USGRt16
		$filterList = Concat($filterList, $this->USGRt17->AdvancedSearch->toJson(), ","); // Field USGRt17
		$filterList = Concat($filterList, $this->USGRt18->AdvancedSearch->toJson(), ","); // Field USGRt18
		$filterList = Concat($filterList, $this->USGRt19->AdvancedSearch->toJson(), ","); // Field USGRt19
		$filterList = Concat($filterList, $this->USGRt20->AdvancedSearch->toJson(), ","); // Field USGRt20
		$filterList = Concat($filterList, $this->USGRt21->AdvancedSearch->toJson(), ","); // Field USGRt21
		$filterList = Concat($filterList, $this->USGRt22->AdvancedSearch->toJson(), ","); // Field USGRt22
		$filterList = Concat($filterList, $this->USGRt23->AdvancedSearch->toJson(), ","); // Field USGRt23
		$filterList = Concat($filterList, $this->USGRt24->AdvancedSearch->toJson(), ","); // Field USGRt24
		$filterList = Concat($filterList, $this->USGRt25->AdvancedSearch->toJson(), ","); // Field USGRt25
		$filterList = Concat($filterList, $this->USGLt14->AdvancedSearch->toJson(), ","); // Field USGLt14
		$filterList = Concat($filterList, $this->USGLt15->AdvancedSearch->toJson(), ","); // Field USGLt15
		$filterList = Concat($filterList, $this->USGLt16->AdvancedSearch->toJson(), ","); // Field USGLt16
		$filterList = Concat($filterList, $this->USGLt17->AdvancedSearch->toJson(), ","); // Field USGLt17
		$filterList = Concat($filterList, $this->USGLt18->AdvancedSearch->toJson(), ","); // Field USGLt18
		$filterList = Concat($filterList, $this->USGLt19->AdvancedSearch->toJson(), ","); // Field USGLt19
		$filterList = Concat($filterList, $this->USGLt20->AdvancedSearch->toJson(), ","); // Field USGLt20
		$filterList = Concat($filterList, $this->USGLt21->AdvancedSearch->toJson(), ","); // Field USGLt21
		$filterList = Concat($filterList, $this->USGLt22->AdvancedSearch->toJson(), ","); // Field USGLt22
		$filterList = Concat($filterList, $this->USGLt23->AdvancedSearch->toJson(), ","); // Field USGLt23
		$filterList = Concat($filterList, $this->USGLt24->AdvancedSearch->toJson(), ","); // Field USGLt24
		$filterList = Concat($filterList, $this->USGLt25->AdvancedSearch->toJson(), ","); // Field USGLt25
		$filterList = Concat($filterList, $this->EM14->AdvancedSearch->toJson(), ","); // Field EM14
		$filterList = Concat($filterList, $this->EM15->AdvancedSearch->toJson(), ","); // Field EM15
		$filterList = Concat($filterList, $this->EM16->AdvancedSearch->toJson(), ","); // Field EM16
		$filterList = Concat($filterList, $this->EM17->AdvancedSearch->toJson(), ","); // Field EM17
		$filterList = Concat($filterList, $this->EM18->AdvancedSearch->toJson(), ","); // Field EM18
		$filterList = Concat($filterList, $this->EM19->AdvancedSearch->toJson(), ","); // Field EM19
		$filterList = Concat($filterList, $this->EM20->AdvancedSearch->toJson(), ","); // Field EM20
		$filterList = Concat($filterList, $this->EM21->AdvancedSearch->toJson(), ","); // Field EM21
		$filterList = Concat($filterList, $this->EM22->AdvancedSearch->toJson(), ","); // Field EM22
		$filterList = Concat($filterList, $this->EM23->AdvancedSearch->toJson(), ","); // Field EM23
		$filterList = Concat($filterList, $this->EM24->AdvancedSearch->toJson(), ","); // Field EM24
		$filterList = Concat($filterList, $this->EM25->AdvancedSearch->toJson(), ","); // Field EM25
		$filterList = Concat($filterList, $this->Others14->AdvancedSearch->toJson(), ","); // Field Others14
		$filterList = Concat($filterList, $this->Others15->AdvancedSearch->toJson(), ","); // Field Others15
		$filterList = Concat($filterList, $this->Others16->AdvancedSearch->toJson(), ","); // Field Others16
		$filterList = Concat($filterList, $this->Others17->AdvancedSearch->toJson(), ","); // Field Others17
		$filterList = Concat($filterList, $this->Others18->AdvancedSearch->toJson(), ","); // Field Others18
		$filterList = Concat($filterList, $this->Others19->AdvancedSearch->toJson(), ","); // Field Others19
		$filterList = Concat($filterList, $this->Others20->AdvancedSearch->toJson(), ","); // Field Others20
		$filterList = Concat($filterList, $this->Others21->AdvancedSearch->toJson(), ","); // Field Others21
		$filterList = Concat($filterList, $this->Others22->AdvancedSearch->toJson(), ","); // Field Others22
		$filterList = Concat($filterList, $this->Others23->AdvancedSearch->toJson(), ","); // Field Others23
		$filterList = Concat($filterList, $this->Others24->AdvancedSearch->toJson(), ","); // Field Others24
		$filterList = Concat($filterList, $this->Others25->AdvancedSearch->toJson(), ","); // Field Others25
		$filterList = Concat($filterList, $this->DR14->AdvancedSearch->toJson(), ","); // Field DR14
		$filterList = Concat($filterList, $this->DR15->AdvancedSearch->toJson(), ","); // Field DR15
		$filterList = Concat($filterList, $this->DR16->AdvancedSearch->toJson(), ","); // Field DR16
		$filterList = Concat($filterList, $this->DR17->AdvancedSearch->toJson(), ","); // Field DR17
		$filterList = Concat($filterList, $this->DR18->AdvancedSearch->toJson(), ","); // Field DR18
		$filterList = Concat($filterList, $this->DR19->AdvancedSearch->toJson(), ","); // Field DR19
		$filterList = Concat($filterList, $this->DR20->AdvancedSearch->toJson(), ","); // Field DR20
		$filterList = Concat($filterList, $this->DR21->AdvancedSearch->toJson(), ","); // Field DR21
		$filterList = Concat($filterList, $this->DR22->AdvancedSearch->toJson(), ","); // Field DR22
		$filterList = Concat($filterList, $this->DR23->AdvancedSearch->toJson(), ","); // Field DR23
		$filterList = Concat($filterList, $this->DR24->AdvancedSearch->toJson(), ","); // Field DR24
		$filterList = Concat($filterList, $this->DR25->AdvancedSearch->toJson(), ","); // Field DR25
		$filterList = Concat($filterList, $this->E214->AdvancedSearch->toJson(), ","); // Field E214
		$filterList = Concat($filterList, $this->E215->AdvancedSearch->toJson(), ","); // Field E215
		$filterList = Concat($filterList, $this->E216->AdvancedSearch->toJson(), ","); // Field E216
		$filterList = Concat($filterList, $this->E217->AdvancedSearch->toJson(), ","); // Field E217
		$filterList = Concat($filterList, $this->E218->AdvancedSearch->toJson(), ","); // Field E218
		$filterList = Concat($filterList, $this->E219->AdvancedSearch->toJson(), ","); // Field E219
		$filterList = Concat($filterList, $this->E220->AdvancedSearch->toJson(), ","); // Field E220
		$filterList = Concat($filterList, $this->E221->AdvancedSearch->toJson(), ","); // Field E221
		$filterList = Concat($filterList, $this->E222->AdvancedSearch->toJson(), ","); // Field E222
		$filterList = Concat($filterList, $this->E223->AdvancedSearch->toJson(), ","); // Field E223
		$filterList = Concat($filterList, $this->E224->AdvancedSearch->toJson(), ","); // Field E224
		$filterList = Concat($filterList, $this->E225->AdvancedSearch->toJson(), ","); // Field E225
		$filterList = Concat($filterList, $this->EEETTTDTE->AdvancedSearch->toJson(), ","); // Field EEETTTDTE
		$filterList = Concat($filterList, $this->bhcgdate->AdvancedSearch->toJson(), ","); // Field bhcgdate
		$filterList = Concat($filterList, $this->TUBAL_PATENCY->AdvancedSearch->toJson(), ","); // Field TUBAL_PATENCY
		$filterList = Concat($filterList, $this->HSG->AdvancedSearch->toJson(), ","); // Field HSG
		$filterList = Concat($filterList, $this->DHL->AdvancedSearch->toJson(), ","); // Field DHL
		$filterList = Concat($filterList, $this->UTERINE_PROBLEMS->AdvancedSearch->toJson(), ","); // Field UTERINE_PROBLEMS
		$filterList = Concat($filterList, $this->W_COMORBIDS->AdvancedSearch->toJson(), ","); // Field W_COMORBIDS
		$filterList = Concat($filterList, $this->H_COMORBIDS->AdvancedSearch->toJson(), ","); // Field H_COMORBIDS
		$filterList = Concat($filterList, $this->SEXUAL_DYSFUNCTION->AdvancedSearch->toJson(), ","); // Field SEXUAL_DYSFUNCTION
		$filterList = Concat($filterList, $this->TABLETS->AdvancedSearch->toJson(), ","); // Field TABLETS
		$filterList = Concat($filterList, $this->FOLLICLE_STATUS->AdvancedSearch->toJson(), ","); // Field FOLLICLE_STATUS
		$filterList = Concat($filterList, $this->NUMBER_OF_IUI->AdvancedSearch->toJson(), ","); // Field NUMBER_OF_IUI
		$filterList = Concat($filterList, $this->PROCEDURE->AdvancedSearch->toJson(), ","); // Field PROCEDURE
		$filterList = Concat($filterList, $this->LUTEAL_SUPPORT->AdvancedSearch->toJson(), ","); // Field LUTEAL_SUPPORT
		$filterList = Concat($filterList, $this->SPECIFIC_MATERNAL_PROBLEMS->AdvancedSearch->toJson(), ","); // Field SPECIFIC_MATERNAL_PROBLEMS
		$filterList = Concat($filterList, $this->ONGOING_PREG->AdvancedSearch->toJson(), ","); // Field ONGOING_PREG
		$filterList = Concat($filterList, $this->EDD_Date->AdvancedSearch->toJson(), ","); // Field EDD_Date
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
			$UserProfile->setSearchFilters(CurrentUserName(), "fivf_stimulation_chartlistsrch", $filters);
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

		// Field RIDNo
		$this->RIDNo->AdvancedSearch->SearchValue = @$filter["x_RIDNo"];
		$this->RIDNo->AdvancedSearch->SearchOperator = @$filter["z_RIDNo"];
		$this->RIDNo->AdvancedSearch->SearchCondition = @$filter["v_RIDNo"];
		$this->RIDNo->AdvancedSearch->SearchValue2 = @$filter["y_RIDNo"];
		$this->RIDNo->AdvancedSearch->SearchOperator2 = @$filter["w_RIDNo"];
		$this->RIDNo->AdvancedSearch->save();

		// Field Name
		$this->Name->AdvancedSearch->SearchValue = @$filter["x_Name"];
		$this->Name->AdvancedSearch->SearchOperator = @$filter["z_Name"];
		$this->Name->AdvancedSearch->SearchCondition = @$filter["v_Name"];
		$this->Name->AdvancedSearch->SearchValue2 = @$filter["y_Name"];
		$this->Name->AdvancedSearch->SearchOperator2 = @$filter["w_Name"];
		$this->Name->AdvancedSearch->save();

		// Field ARTCycle
		$this->ARTCycle->AdvancedSearch->SearchValue = @$filter["x_ARTCycle"];
		$this->ARTCycle->AdvancedSearch->SearchOperator = @$filter["z_ARTCycle"];
		$this->ARTCycle->AdvancedSearch->SearchCondition = @$filter["v_ARTCycle"];
		$this->ARTCycle->AdvancedSearch->SearchValue2 = @$filter["y_ARTCycle"];
		$this->ARTCycle->AdvancedSearch->SearchOperator2 = @$filter["w_ARTCycle"];
		$this->ARTCycle->AdvancedSearch->save();

		// Field FemaleFactor
		$this->FemaleFactor->AdvancedSearch->SearchValue = @$filter["x_FemaleFactor"];
		$this->FemaleFactor->AdvancedSearch->SearchOperator = @$filter["z_FemaleFactor"];
		$this->FemaleFactor->AdvancedSearch->SearchCondition = @$filter["v_FemaleFactor"];
		$this->FemaleFactor->AdvancedSearch->SearchValue2 = @$filter["y_FemaleFactor"];
		$this->FemaleFactor->AdvancedSearch->SearchOperator2 = @$filter["w_FemaleFactor"];
		$this->FemaleFactor->AdvancedSearch->save();

		// Field MaleFactor
		$this->MaleFactor->AdvancedSearch->SearchValue = @$filter["x_MaleFactor"];
		$this->MaleFactor->AdvancedSearch->SearchOperator = @$filter["z_MaleFactor"];
		$this->MaleFactor->AdvancedSearch->SearchCondition = @$filter["v_MaleFactor"];
		$this->MaleFactor->AdvancedSearch->SearchValue2 = @$filter["y_MaleFactor"];
		$this->MaleFactor->AdvancedSearch->SearchOperator2 = @$filter["w_MaleFactor"];
		$this->MaleFactor->AdvancedSearch->save();

		// Field Protocol
		$this->Protocol->AdvancedSearch->SearchValue = @$filter["x_Protocol"];
		$this->Protocol->AdvancedSearch->SearchOperator = @$filter["z_Protocol"];
		$this->Protocol->AdvancedSearch->SearchCondition = @$filter["v_Protocol"];
		$this->Protocol->AdvancedSearch->SearchValue2 = @$filter["y_Protocol"];
		$this->Protocol->AdvancedSearch->SearchOperator2 = @$filter["w_Protocol"];
		$this->Protocol->AdvancedSearch->save();

		// Field SemenFrozen
		$this->SemenFrozen->AdvancedSearch->SearchValue = @$filter["x_SemenFrozen"];
		$this->SemenFrozen->AdvancedSearch->SearchOperator = @$filter["z_SemenFrozen"];
		$this->SemenFrozen->AdvancedSearch->SearchCondition = @$filter["v_SemenFrozen"];
		$this->SemenFrozen->AdvancedSearch->SearchValue2 = @$filter["y_SemenFrozen"];
		$this->SemenFrozen->AdvancedSearch->SearchOperator2 = @$filter["w_SemenFrozen"];
		$this->SemenFrozen->AdvancedSearch->save();

		// Field A4ICSICycle
		$this->A4ICSICycle->AdvancedSearch->SearchValue = @$filter["x_A4ICSICycle"];
		$this->A4ICSICycle->AdvancedSearch->SearchOperator = @$filter["z_A4ICSICycle"];
		$this->A4ICSICycle->AdvancedSearch->SearchCondition = @$filter["v_A4ICSICycle"];
		$this->A4ICSICycle->AdvancedSearch->SearchValue2 = @$filter["y_A4ICSICycle"];
		$this->A4ICSICycle->AdvancedSearch->SearchOperator2 = @$filter["w_A4ICSICycle"];
		$this->A4ICSICycle->AdvancedSearch->save();

		// Field TotalICSICycle
		$this->TotalICSICycle->AdvancedSearch->SearchValue = @$filter["x_TotalICSICycle"];
		$this->TotalICSICycle->AdvancedSearch->SearchOperator = @$filter["z_TotalICSICycle"];
		$this->TotalICSICycle->AdvancedSearch->SearchCondition = @$filter["v_TotalICSICycle"];
		$this->TotalICSICycle->AdvancedSearch->SearchValue2 = @$filter["y_TotalICSICycle"];
		$this->TotalICSICycle->AdvancedSearch->SearchOperator2 = @$filter["w_TotalICSICycle"];
		$this->TotalICSICycle->AdvancedSearch->save();

		// Field TypeOfInfertility
		$this->TypeOfInfertility->AdvancedSearch->SearchValue = @$filter["x_TypeOfInfertility"];
		$this->TypeOfInfertility->AdvancedSearch->SearchOperator = @$filter["z_TypeOfInfertility"];
		$this->TypeOfInfertility->AdvancedSearch->SearchCondition = @$filter["v_TypeOfInfertility"];
		$this->TypeOfInfertility->AdvancedSearch->SearchValue2 = @$filter["y_TypeOfInfertility"];
		$this->TypeOfInfertility->AdvancedSearch->SearchOperator2 = @$filter["w_TypeOfInfertility"];
		$this->TypeOfInfertility->AdvancedSearch->save();

		// Field Duration
		$this->Duration->AdvancedSearch->SearchValue = @$filter["x_Duration"];
		$this->Duration->AdvancedSearch->SearchOperator = @$filter["z_Duration"];
		$this->Duration->AdvancedSearch->SearchCondition = @$filter["v_Duration"];
		$this->Duration->AdvancedSearch->SearchValue2 = @$filter["y_Duration"];
		$this->Duration->AdvancedSearch->SearchOperator2 = @$filter["w_Duration"];
		$this->Duration->AdvancedSearch->save();

		// Field LMP
		$this->LMP->AdvancedSearch->SearchValue = @$filter["x_LMP"];
		$this->LMP->AdvancedSearch->SearchOperator = @$filter["z_LMP"];
		$this->LMP->AdvancedSearch->SearchCondition = @$filter["v_LMP"];
		$this->LMP->AdvancedSearch->SearchValue2 = @$filter["y_LMP"];
		$this->LMP->AdvancedSearch->SearchOperator2 = @$filter["w_LMP"];
		$this->LMP->AdvancedSearch->save();

		// Field RelevantHistory
		$this->RelevantHistory->AdvancedSearch->SearchValue = @$filter["x_RelevantHistory"];
		$this->RelevantHistory->AdvancedSearch->SearchOperator = @$filter["z_RelevantHistory"];
		$this->RelevantHistory->AdvancedSearch->SearchCondition = @$filter["v_RelevantHistory"];
		$this->RelevantHistory->AdvancedSearch->SearchValue2 = @$filter["y_RelevantHistory"];
		$this->RelevantHistory->AdvancedSearch->SearchOperator2 = @$filter["w_RelevantHistory"];
		$this->RelevantHistory->AdvancedSearch->save();

		// Field IUICycles
		$this->IUICycles->AdvancedSearch->SearchValue = @$filter["x_IUICycles"];
		$this->IUICycles->AdvancedSearch->SearchOperator = @$filter["z_IUICycles"];
		$this->IUICycles->AdvancedSearch->SearchCondition = @$filter["v_IUICycles"];
		$this->IUICycles->AdvancedSearch->SearchValue2 = @$filter["y_IUICycles"];
		$this->IUICycles->AdvancedSearch->SearchOperator2 = @$filter["w_IUICycles"];
		$this->IUICycles->AdvancedSearch->save();

		// Field AFC
		$this->AFC->AdvancedSearch->SearchValue = @$filter["x_AFC"];
		$this->AFC->AdvancedSearch->SearchOperator = @$filter["z_AFC"];
		$this->AFC->AdvancedSearch->SearchCondition = @$filter["v_AFC"];
		$this->AFC->AdvancedSearch->SearchValue2 = @$filter["y_AFC"];
		$this->AFC->AdvancedSearch->SearchOperator2 = @$filter["w_AFC"];
		$this->AFC->AdvancedSearch->save();

		// Field AMH
		$this->AMH->AdvancedSearch->SearchValue = @$filter["x_AMH"];
		$this->AMH->AdvancedSearch->SearchOperator = @$filter["z_AMH"];
		$this->AMH->AdvancedSearch->SearchCondition = @$filter["v_AMH"];
		$this->AMH->AdvancedSearch->SearchValue2 = @$filter["y_AMH"];
		$this->AMH->AdvancedSearch->SearchOperator2 = @$filter["w_AMH"];
		$this->AMH->AdvancedSearch->save();

		// Field FBMI
		$this->FBMI->AdvancedSearch->SearchValue = @$filter["x_FBMI"];
		$this->FBMI->AdvancedSearch->SearchOperator = @$filter["z_FBMI"];
		$this->FBMI->AdvancedSearch->SearchCondition = @$filter["v_FBMI"];
		$this->FBMI->AdvancedSearch->SearchValue2 = @$filter["y_FBMI"];
		$this->FBMI->AdvancedSearch->SearchOperator2 = @$filter["w_FBMI"];
		$this->FBMI->AdvancedSearch->save();

		// Field MBMI
		$this->MBMI->AdvancedSearch->SearchValue = @$filter["x_MBMI"];
		$this->MBMI->AdvancedSearch->SearchOperator = @$filter["z_MBMI"];
		$this->MBMI->AdvancedSearch->SearchCondition = @$filter["v_MBMI"];
		$this->MBMI->AdvancedSearch->SearchValue2 = @$filter["y_MBMI"];
		$this->MBMI->AdvancedSearch->SearchOperator2 = @$filter["w_MBMI"];
		$this->MBMI->AdvancedSearch->save();

		// Field OvarianVolumeRT
		$this->OvarianVolumeRT->AdvancedSearch->SearchValue = @$filter["x_OvarianVolumeRT"];
		$this->OvarianVolumeRT->AdvancedSearch->SearchOperator = @$filter["z_OvarianVolumeRT"];
		$this->OvarianVolumeRT->AdvancedSearch->SearchCondition = @$filter["v_OvarianVolumeRT"];
		$this->OvarianVolumeRT->AdvancedSearch->SearchValue2 = @$filter["y_OvarianVolumeRT"];
		$this->OvarianVolumeRT->AdvancedSearch->SearchOperator2 = @$filter["w_OvarianVolumeRT"];
		$this->OvarianVolumeRT->AdvancedSearch->save();

		// Field OvarianVolumeLT
		$this->OvarianVolumeLT->AdvancedSearch->SearchValue = @$filter["x_OvarianVolumeLT"];
		$this->OvarianVolumeLT->AdvancedSearch->SearchOperator = @$filter["z_OvarianVolumeLT"];
		$this->OvarianVolumeLT->AdvancedSearch->SearchCondition = @$filter["v_OvarianVolumeLT"];
		$this->OvarianVolumeLT->AdvancedSearch->SearchValue2 = @$filter["y_OvarianVolumeLT"];
		$this->OvarianVolumeLT->AdvancedSearch->SearchOperator2 = @$filter["w_OvarianVolumeLT"];
		$this->OvarianVolumeLT->AdvancedSearch->save();

		// Field DAYSOFSTIMULATION
		$this->DAYSOFSTIMULATION->AdvancedSearch->SearchValue = @$filter["x_DAYSOFSTIMULATION"];
		$this->DAYSOFSTIMULATION->AdvancedSearch->SearchOperator = @$filter["z_DAYSOFSTIMULATION"];
		$this->DAYSOFSTIMULATION->AdvancedSearch->SearchCondition = @$filter["v_DAYSOFSTIMULATION"];
		$this->DAYSOFSTIMULATION->AdvancedSearch->SearchValue2 = @$filter["y_DAYSOFSTIMULATION"];
		$this->DAYSOFSTIMULATION->AdvancedSearch->SearchOperator2 = @$filter["w_DAYSOFSTIMULATION"];
		$this->DAYSOFSTIMULATION->AdvancedSearch->save();

		// Field DOSEOFGONADOTROPINS
		$this->DOSEOFGONADOTROPINS->AdvancedSearch->SearchValue = @$filter["x_DOSEOFGONADOTROPINS"];
		$this->DOSEOFGONADOTROPINS->AdvancedSearch->SearchOperator = @$filter["z_DOSEOFGONADOTROPINS"];
		$this->DOSEOFGONADOTROPINS->AdvancedSearch->SearchCondition = @$filter["v_DOSEOFGONADOTROPINS"];
		$this->DOSEOFGONADOTROPINS->AdvancedSearch->SearchValue2 = @$filter["y_DOSEOFGONADOTROPINS"];
		$this->DOSEOFGONADOTROPINS->AdvancedSearch->SearchOperator2 = @$filter["w_DOSEOFGONADOTROPINS"];
		$this->DOSEOFGONADOTROPINS->AdvancedSearch->save();

		// Field INJTYPE
		$this->INJTYPE->AdvancedSearch->SearchValue = @$filter["x_INJTYPE"];
		$this->INJTYPE->AdvancedSearch->SearchOperator = @$filter["z_INJTYPE"];
		$this->INJTYPE->AdvancedSearch->SearchCondition = @$filter["v_INJTYPE"];
		$this->INJTYPE->AdvancedSearch->SearchValue2 = @$filter["y_INJTYPE"];
		$this->INJTYPE->AdvancedSearch->SearchOperator2 = @$filter["w_INJTYPE"];
		$this->INJTYPE->AdvancedSearch->save();

		// Field ANTAGONISTDAYS
		$this->ANTAGONISTDAYS->AdvancedSearch->SearchValue = @$filter["x_ANTAGONISTDAYS"];
		$this->ANTAGONISTDAYS->AdvancedSearch->SearchOperator = @$filter["z_ANTAGONISTDAYS"];
		$this->ANTAGONISTDAYS->AdvancedSearch->SearchCondition = @$filter["v_ANTAGONISTDAYS"];
		$this->ANTAGONISTDAYS->AdvancedSearch->SearchValue2 = @$filter["y_ANTAGONISTDAYS"];
		$this->ANTAGONISTDAYS->AdvancedSearch->SearchOperator2 = @$filter["w_ANTAGONISTDAYS"];
		$this->ANTAGONISTDAYS->AdvancedSearch->save();

		// Field ANTAGONISTSTARTDAY
		$this->ANTAGONISTSTARTDAY->AdvancedSearch->SearchValue = @$filter["x_ANTAGONISTSTARTDAY"];
		$this->ANTAGONISTSTARTDAY->AdvancedSearch->SearchOperator = @$filter["z_ANTAGONISTSTARTDAY"];
		$this->ANTAGONISTSTARTDAY->AdvancedSearch->SearchCondition = @$filter["v_ANTAGONISTSTARTDAY"];
		$this->ANTAGONISTSTARTDAY->AdvancedSearch->SearchValue2 = @$filter["y_ANTAGONISTSTARTDAY"];
		$this->ANTAGONISTSTARTDAY->AdvancedSearch->SearchOperator2 = @$filter["w_ANTAGONISTSTARTDAY"];
		$this->ANTAGONISTSTARTDAY->AdvancedSearch->save();

		// Field GROWTHHORMONE
		$this->GROWTHHORMONE->AdvancedSearch->SearchValue = @$filter["x_GROWTHHORMONE"];
		$this->GROWTHHORMONE->AdvancedSearch->SearchOperator = @$filter["z_GROWTHHORMONE"];
		$this->GROWTHHORMONE->AdvancedSearch->SearchCondition = @$filter["v_GROWTHHORMONE"];
		$this->GROWTHHORMONE->AdvancedSearch->SearchValue2 = @$filter["y_GROWTHHORMONE"];
		$this->GROWTHHORMONE->AdvancedSearch->SearchOperator2 = @$filter["w_GROWTHHORMONE"];
		$this->GROWTHHORMONE->AdvancedSearch->save();

		// Field PRETREATMENT
		$this->PRETREATMENT->AdvancedSearch->SearchValue = @$filter["x_PRETREATMENT"];
		$this->PRETREATMENT->AdvancedSearch->SearchOperator = @$filter["z_PRETREATMENT"];
		$this->PRETREATMENT->AdvancedSearch->SearchCondition = @$filter["v_PRETREATMENT"];
		$this->PRETREATMENT->AdvancedSearch->SearchValue2 = @$filter["y_PRETREATMENT"];
		$this->PRETREATMENT->AdvancedSearch->SearchOperator2 = @$filter["w_PRETREATMENT"];
		$this->PRETREATMENT->AdvancedSearch->save();

		// Field SerumP4
		$this->SerumP4->AdvancedSearch->SearchValue = @$filter["x_SerumP4"];
		$this->SerumP4->AdvancedSearch->SearchOperator = @$filter["z_SerumP4"];
		$this->SerumP4->AdvancedSearch->SearchCondition = @$filter["v_SerumP4"];
		$this->SerumP4->AdvancedSearch->SearchValue2 = @$filter["y_SerumP4"];
		$this->SerumP4->AdvancedSearch->SearchOperator2 = @$filter["w_SerumP4"];
		$this->SerumP4->AdvancedSearch->save();

		// Field FORT
		$this->FORT->AdvancedSearch->SearchValue = @$filter["x_FORT"];
		$this->FORT->AdvancedSearch->SearchOperator = @$filter["z_FORT"];
		$this->FORT->AdvancedSearch->SearchCondition = @$filter["v_FORT"];
		$this->FORT->AdvancedSearch->SearchValue2 = @$filter["y_FORT"];
		$this->FORT->AdvancedSearch->SearchOperator2 = @$filter["w_FORT"];
		$this->FORT->AdvancedSearch->save();

		// Field MedicalFactors
		$this->MedicalFactors->AdvancedSearch->SearchValue = @$filter["x_MedicalFactors"];
		$this->MedicalFactors->AdvancedSearch->SearchOperator = @$filter["z_MedicalFactors"];
		$this->MedicalFactors->AdvancedSearch->SearchCondition = @$filter["v_MedicalFactors"];
		$this->MedicalFactors->AdvancedSearch->SearchValue2 = @$filter["y_MedicalFactors"];
		$this->MedicalFactors->AdvancedSearch->SearchOperator2 = @$filter["w_MedicalFactors"];
		$this->MedicalFactors->AdvancedSearch->save();

		// Field SCDate
		$this->SCDate->AdvancedSearch->SearchValue = @$filter["x_SCDate"];
		$this->SCDate->AdvancedSearch->SearchOperator = @$filter["z_SCDate"];
		$this->SCDate->AdvancedSearch->SearchCondition = @$filter["v_SCDate"];
		$this->SCDate->AdvancedSearch->SearchValue2 = @$filter["y_SCDate"];
		$this->SCDate->AdvancedSearch->SearchOperator2 = @$filter["w_SCDate"];
		$this->SCDate->AdvancedSearch->save();

		// Field OvarianSurgery
		$this->OvarianSurgery->AdvancedSearch->SearchValue = @$filter["x_OvarianSurgery"];
		$this->OvarianSurgery->AdvancedSearch->SearchOperator = @$filter["z_OvarianSurgery"];
		$this->OvarianSurgery->AdvancedSearch->SearchCondition = @$filter["v_OvarianSurgery"];
		$this->OvarianSurgery->AdvancedSearch->SearchValue2 = @$filter["y_OvarianSurgery"];
		$this->OvarianSurgery->AdvancedSearch->SearchOperator2 = @$filter["w_OvarianSurgery"];
		$this->OvarianSurgery->AdvancedSearch->save();

		// Field PreProcedureOrder
		$this->PreProcedureOrder->AdvancedSearch->SearchValue = @$filter["x_PreProcedureOrder"];
		$this->PreProcedureOrder->AdvancedSearch->SearchOperator = @$filter["z_PreProcedureOrder"];
		$this->PreProcedureOrder->AdvancedSearch->SearchCondition = @$filter["v_PreProcedureOrder"];
		$this->PreProcedureOrder->AdvancedSearch->SearchValue2 = @$filter["y_PreProcedureOrder"];
		$this->PreProcedureOrder->AdvancedSearch->SearchOperator2 = @$filter["w_PreProcedureOrder"];
		$this->PreProcedureOrder->AdvancedSearch->save();

		// Field TRIGGERR
		$this->TRIGGERR->AdvancedSearch->SearchValue = @$filter["x_TRIGGERR"];
		$this->TRIGGERR->AdvancedSearch->SearchOperator = @$filter["z_TRIGGERR"];
		$this->TRIGGERR->AdvancedSearch->SearchCondition = @$filter["v_TRIGGERR"];
		$this->TRIGGERR->AdvancedSearch->SearchValue2 = @$filter["y_TRIGGERR"];
		$this->TRIGGERR->AdvancedSearch->SearchOperator2 = @$filter["w_TRIGGERR"];
		$this->TRIGGERR->AdvancedSearch->save();

		// Field TRIGGERDATE
		$this->TRIGGERDATE->AdvancedSearch->SearchValue = @$filter["x_TRIGGERDATE"];
		$this->TRIGGERDATE->AdvancedSearch->SearchOperator = @$filter["z_TRIGGERDATE"];
		$this->TRIGGERDATE->AdvancedSearch->SearchCondition = @$filter["v_TRIGGERDATE"];
		$this->TRIGGERDATE->AdvancedSearch->SearchValue2 = @$filter["y_TRIGGERDATE"];
		$this->TRIGGERDATE->AdvancedSearch->SearchOperator2 = @$filter["w_TRIGGERDATE"];
		$this->TRIGGERDATE->AdvancedSearch->save();

		// Field ATHOMEorCLINIC
		$this->ATHOMEorCLINIC->AdvancedSearch->SearchValue = @$filter["x_ATHOMEorCLINIC"];
		$this->ATHOMEorCLINIC->AdvancedSearch->SearchOperator = @$filter["z_ATHOMEorCLINIC"];
		$this->ATHOMEorCLINIC->AdvancedSearch->SearchCondition = @$filter["v_ATHOMEorCLINIC"];
		$this->ATHOMEorCLINIC->AdvancedSearch->SearchValue2 = @$filter["y_ATHOMEorCLINIC"];
		$this->ATHOMEorCLINIC->AdvancedSearch->SearchOperator2 = @$filter["w_ATHOMEorCLINIC"];
		$this->ATHOMEorCLINIC->AdvancedSearch->save();

		// Field OPUDATE
		$this->OPUDATE->AdvancedSearch->SearchValue = @$filter["x_OPUDATE"];
		$this->OPUDATE->AdvancedSearch->SearchOperator = @$filter["z_OPUDATE"];
		$this->OPUDATE->AdvancedSearch->SearchCondition = @$filter["v_OPUDATE"];
		$this->OPUDATE->AdvancedSearch->SearchValue2 = @$filter["y_OPUDATE"];
		$this->OPUDATE->AdvancedSearch->SearchOperator2 = @$filter["w_OPUDATE"];
		$this->OPUDATE->AdvancedSearch->save();

		// Field ALLFREEZEINDICATION
		$this->ALLFREEZEINDICATION->AdvancedSearch->SearchValue = @$filter["x_ALLFREEZEINDICATION"];
		$this->ALLFREEZEINDICATION->AdvancedSearch->SearchOperator = @$filter["z_ALLFREEZEINDICATION"];
		$this->ALLFREEZEINDICATION->AdvancedSearch->SearchCondition = @$filter["v_ALLFREEZEINDICATION"];
		$this->ALLFREEZEINDICATION->AdvancedSearch->SearchValue2 = @$filter["y_ALLFREEZEINDICATION"];
		$this->ALLFREEZEINDICATION->AdvancedSearch->SearchOperator2 = @$filter["w_ALLFREEZEINDICATION"];
		$this->ALLFREEZEINDICATION->AdvancedSearch->save();

		// Field ERA
		$this->ERA->AdvancedSearch->SearchValue = @$filter["x_ERA"];
		$this->ERA->AdvancedSearch->SearchOperator = @$filter["z_ERA"];
		$this->ERA->AdvancedSearch->SearchCondition = @$filter["v_ERA"];
		$this->ERA->AdvancedSearch->SearchValue2 = @$filter["y_ERA"];
		$this->ERA->AdvancedSearch->SearchOperator2 = @$filter["w_ERA"];
		$this->ERA->AdvancedSearch->save();

		// Field PGTA
		$this->PGTA->AdvancedSearch->SearchValue = @$filter["x_PGTA"];
		$this->PGTA->AdvancedSearch->SearchOperator = @$filter["z_PGTA"];
		$this->PGTA->AdvancedSearch->SearchCondition = @$filter["v_PGTA"];
		$this->PGTA->AdvancedSearch->SearchValue2 = @$filter["y_PGTA"];
		$this->PGTA->AdvancedSearch->SearchOperator2 = @$filter["w_PGTA"];
		$this->PGTA->AdvancedSearch->save();

		// Field PGD
		$this->PGD->AdvancedSearch->SearchValue = @$filter["x_PGD"];
		$this->PGD->AdvancedSearch->SearchOperator = @$filter["z_PGD"];
		$this->PGD->AdvancedSearch->SearchCondition = @$filter["v_PGD"];
		$this->PGD->AdvancedSearch->SearchValue2 = @$filter["y_PGD"];
		$this->PGD->AdvancedSearch->SearchOperator2 = @$filter["w_PGD"];
		$this->PGD->AdvancedSearch->save();

		// Field DATEOFET
		$this->DATEOFET->AdvancedSearch->SearchValue = @$filter["x_DATEOFET"];
		$this->DATEOFET->AdvancedSearch->SearchOperator = @$filter["z_DATEOFET"];
		$this->DATEOFET->AdvancedSearch->SearchCondition = @$filter["v_DATEOFET"];
		$this->DATEOFET->AdvancedSearch->SearchValue2 = @$filter["y_DATEOFET"];
		$this->DATEOFET->AdvancedSearch->SearchOperator2 = @$filter["w_DATEOFET"];
		$this->DATEOFET->AdvancedSearch->save();

		// Field ET
		$this->ET->AdvancedSearch->SearchValue = @$filter["x_ET"];
		$this->ET->AdvancedSearch->SearchOperator = @$filter["z_ET"];
		$this->ET->AdvancedSearch->SearchCondition = @$filter["v_ET"];
		$this->ET->AdvancedSearch->SearchValue2 = @$filter["y_ET"];
		$this->ET->AdvancedSearch->SearchOperator2 = @$filter["w_ET"];
		$this->ET->AdvancedSearch->save();

		// Field ESET
		$this->ESET->AdvancedSearch->SearchValue = @$filter["x_ESET"];
		$this->ESET->AdvancedSearch->SearchOperator = @$filter["z_ESET"];
		$this->ESET->AdvancedSearch->SearchCondition = @$filter["v_ESET"];
		$this->ESET->AdvancedSearch->SearchValue2 = @$filter["y_ESET"];
		$this->ESET->AdvancedSearch->SearchOperator2 = @$filter["w_ESET"];
		$this->ESET->AdvancedSearch->save();

		// Field DOET
		$this->DOET->AdvancedSearch->SearchValue = @$filter["x_DOET"];
		$this->DOET->AdvancedSearch->SearchOperator = @$filter["z_DOET"];
		$this->DOET->AdvancedSearch->SearchCondition = @$filter["v_DOET"];
		$this->DOET->AdvancedSearch->SearchValue2 = @$filter["y_DOET"];
		$this->DOET->AdvancedSearch->SearchOperator2 = @$filter["w_DOET"];
		$this->DOET->AdvancedSearch->save();

		// Field SEMENPREPARATION
		$this->SEMENPREPARATION->AdvancedSearch->SearchValue = @$filter["x_SEMENPREPARATION"];
		$this->SEMENPREPARATION->AdvancedSearch->SearchOperator = @$filter["z_SEMENPREPARATION"];
		$this->SEMENPREPARATION->AdvancedSearch->SearchCondition = @$filter["v_SEMENPREPARATION"];
		$this->SEMENPREPARATION->AdvancedSearch->SearchValue2 = @$filter["y_SEMENPREPARATION"];
		$this->SEMENPREPARATION->AdvancedSearch->SearchOperator2 = @$filter["w_SEMENPREPARATION"];
		$this->SEMENPREPARATION->AdvancedSearch->save();

		// Field REASONFORESET
		$this->REASONFORESET->AdvancedSearch->SearchValue = @$filter["x_REASONFORESET"];
		$this->REASONFORESET->AdvancedSearch->SearchOperator = @$filter["z_REASONFORESET"];
		$this->REASONFORESET->AdvancedSearch->SearchCondition = @$filter["v_REASONFORESET"];
		$this->REASONFORESET->AdvancedSearch->SearchValue2 = @$filter["y_REASONFORESET"];
		$this->REASONFORESET->AdvancedSearch->SearchOperator2 = @$filter["w_REASONFORESET"];
		$this->REASONFORESET->AdvancedSearch->save();

		// Field Expectedoocytes
		$this->Expectedoocytes->AdvancedSearch->SearchValue = @$filter["x_Expectedoocytes"];
		$this->Expectedoocytes->AdvancedSearch->SearchOperator = @$filter["z_Expectedoocytes"];
		$this->Expectedoocytes->AdvancedSearch->SearchCondition = @$filter["v_Expectedoocytes"];
		$this->Expectedoocytes->AdvancedSearch->SearchValue2 = @$filter["y_Expectedoocytes"];
		$this->Expectedoocytes->AdvancedSearch->SearchOperator2 = @$filter["w_Expectedoocytes"];
		$this->Expectedoocytes->AdvancedSearch->save();

		// Field StChDate1
		$this->StChDate1->AdvancedSearch->SearchValue = @$filter["x_StChDate1"];
		$this->StChDate1->AdvancedSearch->SearchOperator = @$filter["z_StChDate1"];
		$this->StChDate1->AdvancedSearch->SearchCondition = @$filter["v_StChDate1"];
		$this->StChDate1->AdvancedSearch->SearchValue2 = @$filter["y_StChDate1"];
		$this->StChDate1->AdvancedSearch->SearchOperator2 = @$filter["w_StChDate1"];
		$this->StChDate1->AdvancedSearch->save();

		// Field StChDate2
		$this->StChDate2->AdvancedSearch->SearchValue = @$filter["x_StChDate2"];
		$this->StChDate2->AdvancedSearch->SearchOperator = @$filter["z_StChDate2"];
		$this->StChDate2->AdvancedSearch->SearchCondition = @$filter["v_StChDate2"];
		$this->StChDate2->AdvancedSearch->SearchValue2 = @$filter["y_StChDate2"];
		$this->StChDate2->AdvancedSearch->SearchOperator2 = @$filter["w_StChDate2"];
		$this->StChDate2->AdvancedSearch->save();

		// Field StChDate3
		$this->StChDate3->AdvancedSearch->SearchValue = @$filter["x_StChDate3"];
		$this->StChDate3->AdvancedSearch->SearchOperator = @$filter["z_StChDate3"];
		$this->StChDate3->AdvancedSearch->SearchCondition = @$filter["v_StChDate3"];
		$this->StChDate3->AdvancedSearch->SearchValue2 = @$filter["y_StChDate3"];
		$this->StChDate3->AdvancedSearch->SearchOperator2 = @$filter["w_StChDate3"];
		$this->StChDate3->AdvancedSearch->save();

		// Field StChDate4
		$this->StChDate4->AdvancedSearch->SearchValue = @$filter["x_StChDate4"];
		$this->StChDate4->AdvancedSearch->SearchOperator = @$filter["z_StChDate4"];
		$this->StChDate4->AdvancedSearch->SearchCondition = @$filter["v_StChDate4"];
		$this->StChDate4->AdvancedSearch->SearchValue2 = @$filter["y_StChDate4"];
		$this->StChDate4->AdvancedSearch->SearchOperator2 = @$filter["w_StChDate4"];
		$this->StChDate4->AdvancedSearch->save();

		// Field StChDate5
		$this->StChDate5->AdvancedSearch->SearchValue = @$filter["x_StChDate5"];
		$this->StChDate5->AdvancedSearch->SearchOperator = @$filter["z_StChDate5"];
		$this->StChDate5->AdvancedSearch->SearchCondition = @$filter["v_StChDate5"];
		$this->StChDate5->AdvancedSearch->SearchValue2 = @$filter["y_StChDate5"];
		$this->StChDate5->AdvancedSearch->SearchOperator2 = @$filter["w_StChDate5"];
		$this->StChDate5->AdvancedSearch->save();

		// Field StChDate6
		$this->StChDate6->AdvancedSearch->SearchValue = @$filter["x_StChDate6"];
		$this->StChDate6->AdvancedSearch->SearchOperator = @$filter["z_StChDate6"];
		$this->StChDate6->AdvancedSearch->SearchCondition = @$filter["v_StChDate6"];
		$this->StChDate6->AdvancedSearch->SearchValue2 = @$filter["y_StChDate6"];
		$this->StChDate6->AdvancedSearch->SearchOperator2 = @$filter["w_StChDate6"];
		$this->StChDate6->AdvancedSearch->save();

		// Field StChDate7
		$this->StChDate7->AdvancedSearch->SearchValue = @$filter["x_StChDate7"];
		$this->StChDate7->AdvancedSearch->SearchOperator = @$filter["z_StChDate7"];
		$this->StChDate7->AdvancedSearch->SearchCondition = @$filter["v_StChDate7"];
		$this->StChDate7->AdvancedSearch->SearchValue2 = @$filter["y_StChDate7"];
		$this->StChDate7->AdvancedSearch->SearchOperator2 = @$filter["w_StChDate7"];
		$this->StChDate7->AdvancedSearch->save();

		// Field StChDate8
		$this->StChDate8->AdvancedSearch->SearchValue = @$filter["x_StChDate8"];
		$this->StChDate8->AdvancedSearch->SearchOperator = @$filter["z_StChDate8"];
		$this->StChDate8->AdvancedSearch->SearchCondition = @$filter["v_StChDate8"];
		$this->StChDate8->AdvancedSearch->SearchValue2 = @$filter["y_StChDate8"];
		$this->StChDate8->AdvancedSearch->SearchOperator2 = @$filter["w_StChDate8"];
		$this->StChDate8->AdvancedSearch->save();

		// Field StChDate9
		$this->StChDate9->AdvancedSearch->SearchValue = @$filter["x_StChDate9"];
		$this->StChDate9->AdvancedSearch->SearchOperator = @$filter["z_StChDate9"];
		$this->StChDate9->AdvancedSearch->SearchCondition = @$filter["v_StChDate9"];
		$this->StChDate9->AdvancedSearch->SearchValue2 = @$filter["y_StChDate9"];
		$this->StChDate9->AdvancedSearch->SearchOperator2 = @$filter["w_StChDate9"];
		$this->StChDate9->AdvancedSearch->save();

		// Field StChDate10
		$this->StChDate10->AdvancedSearch->SearchValue = @$filter["x_StChDate10"];
		$this->StChDate10->AdvancedSearch->SearchOperator = @$filter["z_StChDate10"];
		$this->StChDate10->AdvancedSearch->SearchCondition = @$filter["v_StChDate10"];
		$this->StChDate10->AdvancedSearch->SearchValue2 = @$filter["y_StChDate10"];
		$this->StChDate10->AdvancedSearch->SearchOperator2 = @$filter["w_StChDate10"];
		$this->StChDate10->AdvancedSearch->save();

		// Field StChDate11
		$this->StChDate11->AdvancedSearch->SearchValue = @$filter["x_StChDate11"];
		$this->StChDate11->AdvancedSearch->SearchOperator = @$filter["z_StChDate11"];
		$this->StChDate11->AdvancedSearch->SearchCondition = @$filter["v_StChDate11"];
		$this->StChDate11->AdvancedSearch->SearchValue2 = @$filter["y_StChDate11"];
		$this->StChDate11->AdvancedSearch->SearchOperator2 = @$filter["w_StChDate11"];
		$this->StChDate11->AdvancedSearch->save();

		// Field StChDate12
		$this->StChDate12->AdvancedSearch->SearchValue = @$filter["x_StChDate12"];
		$this->StChDate12->AdvancedSearch->SearchOperator = @$filter["z_StChDate12"];
		$this->StChDate12->AdvancedSearch->SearchCondition = @$filter["v_StChDate12"];
		$this->StChDate12->AdvancedSearch->SearchValue2 = @$filter["y_StChDate12"];
		$this->StChDate12->AdvancedSearch->SearchOperator2 = @$filter["w_StChDate12"];
		$this->StChDate12->AdvancedSearch->save();

		// Field StChDate13
		$this->StChDate13->AdvancedSearch->SearchValue = @$filter["x_StChDate13"];
		$this->StChDate13->AdvancedSearch->SearchOperator = @$filter["z_StChDate13"];
		$this->StChDate13->AdvancedSearch->SearchCondition = @$filter["v_StChDate13"];
		$this->StChDate13->AdvancedSearch->SearchValue2 = @$filter["y_StChDate13"];
		$this->StChDate13->AdvancedSearch->SearchOperator2 = @$filter["w_StChDate13"];
		$this->StChDate13->AdvancedSearch->save();

		// Field CycleDay1
		$this->CycleDay1->AdvancedSearch->SearchValue = @$filter["x_CycleDay1"];
		$this->CycleDay1->AdvancedSearch->SearchOperator = @$filter["z_CycleDay1"];
		$this->CycleDay1->AdvancedSearch->SearchCondition = @$filter["v_CycleDay1"];
		$this->CycleDay1->AdvancedSearch->SearchValue2 = @$filter["y_CycleDay1"];
		$this->CycleDay1->AdvancedSearch->SearchOperator2 = @$filter["w_CycleDay1"];
		$this->CycleDay1->AdvancedSearch->save();

		// Field CycleDay2
		$this->CycleDay2->AdvancedSearch->SearchValue = @$filter["x_CycleDay2"];
		$this->CycleDay2->AdvancedSearch->SearchOperator = @$filter["z_CycleDay2"];
		$this->CycleDay2->AdvancedSearch->SearchCondition = @$filter["v_CycleDay2"];
		$this->CycleDay2->AdvancedSearch->SearchValue2 = @$filter["y_CycleDay2"];
		$this->CycleDay2->AdvancedSearch->SearchOperator2 = @$filter["w_CycleDay2"];
		$this->CycleDay2->AdvancedSearch->save();

		// Field CycleDay3
		$this->CycleDay3->AdvancedSearch->SearchValue = @$filter["x_CycleDay3"];
		$this->CycleDay3->AdvancedSearch->SearchOperator = @$filter["z_CycleDay3"];
		$this->CycleDay3->AdvancedSearch->SearchCondition = @$filter["v_CycleDay3"];
		$this->CycleDay3->AdvancedSearch->SearchValue2 = @$filter["y_CycleDay3"];
		$this->CycleDay3->AdvancedSearch->SearchOperator2 = @$filter["w_CycleDay3"];
		$this->CycleDay3->AdvancedSearch->save();

		// Field CycleDay4
		$this->CycleDay4->AdvancedSearch->SearchValue = @$filter["x_CycleDay4"];
		$this->CycleDay4->AdvancedSearch->SearchOperator = @$filter["z_CycleDay4"];
		$this->CycleDay4->AdvancedSearch->SearchCondition = @$filter["v_CycleDay4"];
		$this->CycleDay4->AdvancedSearch->SearchValue2 = @$filter["y_CycleDay4"];
		$this->CycleDay4->AdvancedSearch->SearchOperator2 = @$filter["w_CycleDay4"];
		$this->CycleDay4->AdvancedSearch->save();

		// Field CycleDay5
		$this->CycleDay5->AdvancedSearch->SearchValue = @$filter["x_CycleDay5"];
		$this->CycleDay5->AdvancedSearch->SearchOperator = @$filter["z_CycleDay5"];
		$this->CycleDay5->AdvancedSearch->SearchCondition = @$filter["v_CycleDay5"];
		$this->CycleDay5->AdvancedSearch->SearchValue2 = @$filter["y_CycleDay5"];
		$this->CycleDay5->AdvancedSearch->SearchOperator2 = @$filter["w_CycleDay5"];
		$this->CycleDay5->AdvancedSearch->save();

		// Field CycleDay6
		$this->CycleDay6->AdvancedSearch->SearchValue = @$filter["x_CycleDay6"];
		$this->CycleDay6->AdvancedSearch->SearchOperator = @$filter["z_CycleDay6"];
		$this->CycleDay6->AdvancedSearch->SearchCondition = @$filter["v_CycleDay6"];
		$this->CycleDay6->AdvancedSearch->SearchValue2 = @$filter["y_CycleDay6"];
		$this->CycleDay6->AdvancedSearch->SearchOperator2 = @$filter["w_CycleDay6"];
		$this->CycleDay6->AdvancedSearch->save();

		// Field CycleDay7
		$this->CycleDay7->AdvancedSearch->SearchValue = @$filter["x_CycleDay7"];
		$this->CycleDay7->AdvancedSearch->SearchOperator = @$filter["z_CycleDay7"];
		$this->CycleDay7->AdvancedSearch->SearchCondition = @$filter["v_CycleDay7"];
		$this->CycleDay7->AdvancedSearch->SearchValue2 = @$filter["y_CycleDay7"];
		$this->CycleDay7->AdvancedSearch->SearchOperator2 = @$filter["w_CycleDay7"];
		$this->CycleDay7->AdvancedSearch->save();

		// Field CycleDay8
		$this->CycleDay8->AdvancedSearch->SearchValue = @$filter["x_CycleDay8"];
		$this->CycleDay8->AdvancedSearch->SearchOperator = @$filter["z_CycleDay8"];
		$this->CycleDay8->AdvancedSearch->SearchCondition = @$filter["v_CycleDay8"];
		$this->CycleDay8->AdvancedSearch->SearchValue2 = @$filter["y_CycleDay8"];
		$this->CycleDay8->AdvancedSearch->SearchOperator2 = @$filter["w_CycleDay8"];
		$this->CycleDay8->AdvancedSearch->save();

		// Field CycleDay9
		$this->CycleDay9->AdvancedSearch->SearchValue = @$filter["x_CycleDay9"];
		$this->CycleDay9->AdvancedSearch->SearchOperator = @$filter["z_CycleDay9"];
		$this->CycleDay9->AdvancedSearch->SearchCondition = @$filter["v_CycleDay9"];
		$this->CycleDay9->AdvancedSearch->SearchValue2 = @$filter["y_CycleDay9"];
		$this->CycleDay9->AdvancedSearch->SearchOperator2 = @$filter["w_CycleDay9"];
		$this->CycleDay9->AdvancedSearch->save();

		// Field CycleDay10
		$this->CycleDay10->AdvancedSearch->SearchValue = @$filter["x_CycleDay10"];
		$this->CycleDay10->AdvancedSearch->SearchOperator = @$filter["z_CycleDay10"];
		$this->CycleDay10->AdvancedSearch->SearchCondition = @$filter["v_CycleDay10"];
		$this->CycleDay10->AdvancedSearch->SearchValue2 = @$filter["y_CycleDay10"];
		$this->CycleDay10->AdvancedSearch->SearchOperator2 = @$filter["w_CycleDay10"];
		$this->CycleDay10->AdvancedSearch->save();

		// Field CycleDay11
		$this->CycleDay11->AdvancedSearch->SearchValue = @$filter["x_CycleDay11"];
		$this->CycleDay11->AdvancedSearch->SearchOperator = @$filter["z_CycleDay11"];
		$this->CycleDay11->AdvancedSearch->SearchCondition = @$filter["v_CycleDay11"];
		$this->CycleDay11->AdvancedSearch->SearchValue2 = @$filter["y_CycleDay11"];
		$this->CycleDay11->AdvancedSearch->SearchOperator2 = @$filter["w_CycleDay11"];
		$this->CycleDay11->AdvancedSearch->save();

		// Field CycleDay12
		$this->CycleDay12->AdvancedSearch->SearchValue = @$filter["x_CycleDay12"];
		$this->CycleDay12->AdvancedSearch->SearchOperator = @$filter["z_CycleDay12"];
		$this->CycleDay12->AdvancedSearch->SearchCondition = @$filter["v_CycleDay12"];
		$this->CycleDay12->AdvancedSearch->SearchValue2 = @$filter["y_CycleDay12"];
		$this->CycleDay12->AdvancedSearch->SearchOperator2 = @$filter["w_CycleDay12"];
		$this->CycleDay12->AdvancedSearch->save();

		// Field CycleDay13
		$this->CycleDay13->AdvancedSearch->SearchValue = @$filter["x_CycleDay13"];
		$this->CycleDay13->AdvancedSearch->SearchOperator = @$filter["z_CycleDay13"];
		$this->CycleDay13->AdvancedSearch->SearchCondition = @$filter["v_CycleDay13"];
		$this->CycleDay13->AdvancedSearch->SearchValue2 = @$filter["y_CycleDay13"];
		$this->CycleDay13->AdvancedSearch->SearchOperator2 = @$filter["w_CycleDay13"];
		$this->CycleDay13->AdvancedSearch->save();

		// Field StimulationDay1
		$this->StimulationDay1->AdvancedSearch->SearchValue = @$filter["x_StimulationDay1"];
		$this->StimulationDay1->AdvancedSearch->SearchOperator = @$filter["z_StimulationDay1"];
		$this->StimulationDay1->AdvancedSearch->SearchCondition = @$filter["v_StimulationDay1"];
		$this->StimulationDay1->AdvancedSearch->SearchValue2 = @$filter["y_StimulationDay1"];
		$this->StimulationDay1->AdvancedSearch->SearchOperator2 = @$filter["w_StimulationDay1"];
		$this->StimulationDay1->AdvancedSearch->save();

		// Field StimulationDay2
		$this->StimulationDay2->AdvancedSearch->SearchValue = @$filter["x_StimulationDay2"];
		$this->StimulationDay2->AdvancedSearch->SearchOperator = @$filter["z_StimulationDay2"];
		$this->StimulationDay2->AdvancedSearch->SearchCondition = @$filter["v_StimulationDay2"];
		$this->StimulationDay2->AdvancedSearch->SearchValue2 = @$filter["y_StimulationDay2"];
		$this->StimulationDay2->AdvancedSearch->SearchOperator2 = @$filter["w_StimulationDay2"];
		$this->StimulationDay2->AdvancedSearch->save();

		// Field StimulationDay3
		$this->StimulationDay3->AdvancedSearch->SearchValue = @$filter["x_StimulationDay3"];
		$this->StimulationDay3->AdvancedSearch->SearchOperator = @$filter["z_StimulationDay3"];
		$this->StimulationDay3->AdvancedSearch->SearchCondition = @$filter["v_StimulationDay3"];
		$this->StimulationDay3->AdvancedSearch->SearchValue2 = @$filter["y_StimulationDay3"];
		$this->StimulationDay3->AdvancedSearch->SearchOperator2 = @$filter["w_StimulationDay3"];
		$this->StimulationDay3->AdvancedSearch->save();

		// Field StimulationDay4
		$this->StimulationDay4->AdvancedSearch->SearchValue = @$filter["x_StimulationDay4"];
		$this->StimulationDay4->AdvancedSearch->SearchOperator = @$filter["z_StimulationDay4"];
		$this->StimulationDay4->AdvancedSearch->SearchCondition = @$filter["v_StimulationDay4"];
		$this->StimulationDay4->AdvancedSearch->SearchValue2 = @$filter["y_StimulationDay4"];
		$this->StimulationDay4->AdvancedSearch->SearchOperator2 = @$filter["w_StimulationDay4"];
		$this->StimulationDay4->AdvancedSearch->save();

		// Field StimulationDay5
		$this->StimulationDay5->AdvancedSearch->SearchValue = @$filter["x_StimulationDay5"];
		$this->StimulationDay5->AdvancedSearch->SearchOperator = @$filter["z_StimulationDay5"];
		$this->StimulationDay5->AdvancedSearch->SearchCondition = @$filter["v_StimulationDay5"];
		$this->StimulationDay5->AdvancedSearch->SearchValue2 = @$filter["y_StimulationDay5"];
		$this->StimulationDay5->AdvancedSearch->SearchOperator2 = @$filter["w_StimulationDay5"];
		$this->StimulationDay5->AdvancedSearch->save();

		// Field StimulationDay6
		$this->StimulationDay6->AdvancedSearch->SearchValue = @$filter["x_StimulationDay6"];
		$this->StimulationDay6->AdvancedSearch->SearchOperator = @$filter["z_StimulationDay6"];
		$this->StimulationDay6->AdvancedSearch->SearchCondition = @$filter["v_StimulationDay6"];
		$this->StimulationDay6->AdvancedSearch->SearchValue2 = @$filter["y_StimulationDay6"];
		$this->StimulationDay6->AdvancedSearch->SearchOperator2 = @$filter["w_StimulationDay6"];
		$this->StimulationDay6->AdvancedSearch->save();

		// Field StimulationDay7
		$this->StimulationDay7->AdvancedSearch->SearchValue = @$filter["x_StimulationDay7"];
		$this->StimulationDay7->AdvancedSearch->SearchOperator = @$filter["z_StimulationDay7"];
		$this->StimulationDay7->AdvancedSearch->SearchCondition = @$filter["v_StimulationDay7"];
		$this->StimulationDay7->AdvancedSearch->SearchValue2 = @$filter["y_StimulationDay7"];
		$this->StimulationDay7->AdvancedSearch->SearchOperator2 = @$filter["w_StimulationDay7"];
		$this->StimulationDay7->AdvancedSearch->save();

		// Field StimulationDay8
		$this->StimulationDay8->AdvancedSearch->SearchValue = @$filter["x_StimulationDay8"];
		$this->StimulationDay8->AdvancedSearch->SearchOperator = @$filter["z_StimulationDay8"];
		$this->StimulationDay8->AdvancedSearch->SearchCondition = @$filter["v_StimulationDay8"];
		$this->StimulationDay8->AdvancedSearch->SearchValue2 = @$filter["y_StimulationDay8"];
		$this->StimulationDay8->AdvancedSearch->SearchOperator2 = @$filter["w_StimulationDay8"];
		$this->StimulationDay8->AdvancedSearch->save();

		// Field StimulationDay9
		$this->StimulationDay9->AdvancedSearch->SearchValue = @$filter["x_StimulationDay9"];
		$this->StimulationDay9->AdvancedSearch->SearchOperator = @$filter["z_StimulationDay9"];
		$this->StimulationDay9->AdvancedSearch->SearchCondition = @$filter["v_StimulationDay9"];
		$this->StimulationDay9->AdvancedSearch->SearchValue2 = @$filter["y_StimulationDay9"];
		$this->StimulationDay9->AdvancedSearch->SearchOperator2 = @$filter["w_StimulationDay9"];
		$this->StimulationDay9->AdvancedSearch->save();

		// Field StimulationDay10
		$this->StimulationDay10->AdvancedSearch->SearchValue = @$filter["x_StimulationDay10"];
		$this->StimulationDay10->AdvancedSearch->SearchOperator = @$filter["z_StimulationDay10"];
		$this->StimulationDay10->AdvancedSearch->SearchCondition = @$filter["v_StimulationDay10"];
		$this->StimulationDay10->AdvancedSearch->SearchValue2 = @$filter["y_StimulationDay10"];
		$this->StimulationDay10->AdvancedSearch->SearchOperator2 = @$filter["w_StimulationDay10"];
		$this->StimulationDay10->AdvancedSearch->save();

		// Field StimulationDay11
		$this->StimulationDay11->AdvancedSearch->SearchValue = @$filter["x_StimulationDay11"];
		$this->StimulationDay11->AdvancedSearch->SearchOperator = @$filter["z_StimulationDay11"];
		$this->StimulationDay11->AdvancedSearch->SearchCondition = @$filter["v_StimulationDay11"];
		$this->StimulationDay11->AdvancedSearch->SearchValue2 = @$filter["y_StimulationDay11"];
		$this->StimulationDay11->AdvancedSearch->SearchOperator2 = @$filter["w_StimulationDay11"];
		$this->StimulationDay11->AdvancedSearch->save();

		// Field StimulationDay12
		$this->StimulationDay12->AdvancedSearch->SearchValue = @$filter["x_StimulationDay12"];
		$this->StimulationDay12->AdvancedSearch->SearchOperator = @$filter["z_StimulationDay12"];
		$this->StimulationDay12->AdvancedSearch->SearchCondition = @$filter["v_StimulationDay12"];
		$this->StimulationDay12->AdvancedSearch->SearchValue2 = @$filter["y_StimulationDay12"];
		$this->StimulationDay12->AdvancedSearch->SearchOperator2 = @$filter["w_StimulationDay12"];
		$this->StimulationDay12->AdvancedSearch->save();

		// Field StimulationDay13
		$this->StimulationDay13->AdvancedSearch->SearchValue = @$filter["x_StimulationDay13"];
		$this->StimulationDay13->AdvancedSearch->SearchOperator = @$filter["z_StimulationDay13"];
		$this->StimulationDay13->AdvancedSearch->SearchCondition = @$filter["v_StimulationDay13"];
		$this->StimulationDay13->AdvancedSearch->SearchValue2 = @$filter["y_StimulationDay13"];
		$this->StimulationDay13->AdvancedSearch->SearchOperator2 = @$filter["w_StimulationDay13"];
		$this->StimulationDay13->AdvancedSearch->save();

		// Field Tablet1
		$this->Tablet1->AdvancedSearch->SearchValue = @$filter["x_Tablet1"];
		$this->Tablet1->AdvancedSearch->SearchOperator = @$filter["z_Tablet1"];
		$this->Tablet1->AdvancedSearch->SearchCondition = @$filter["v_Tablet1"];
		$this->Tablet1->AdvancedSearch->SearchValue2 = @$filter["y_Tablet1"];
		$this->Tablet1->AdvancedSearch->SearchOperator2 = @$filter["w_Tablet1"];
		$this->Tablet1->AdvancedSearch->save();

		// Field Tablet2
		$this->Tablet2->AdvancedSearch->SearchValue = @$filter["x_Tablet2"];
		$this->Tablet2->AdvancedSearch->SearchOperator = @$filter["z_Tablet2"];
		$this->Tablet2->AdvancedSearch->SearchCondition = @$filter["v_Tablet2"];
		$this->Tablet2->AdvancedSearch->SearchValue2 = @$filter["y_Tablet2"];
		$this->Tablet2->AdvancedSearch->SearchOperator2 = @$filter["w_Tablet2"];
		$this->Tablet2->AdvancedSearch->save();

		// Field Tablet3
		$this->Tablet3->AdvancedSearch->SearchValue = @$filter["x_Tablet3"];
		$this->Tablet3->AdvancedSearch->SearchOperator = @$filter["z_Tablet3"];
		$this->Tablet3->AdvancedSearch->SearchCondition = @$filter["v_Tablet3"];
		$this->Tablet3->AdvancedSearch->SearchValue2 = @$filter["y_Tablet3"];
		$this->Tablet3->AdvancedSearch->SearchOperator2 = @$filter["w_Tablet3"];
		$this->Tablet3->AdvancedSearch->save();

		// Field Tablet4
		$this->Tablet4->AdvancedSearch->SearchValue = @$filter["x_Tablet4"];
		$this->Tablet4->AdvancedSearch->SearchOperator = @$filter["z_Tablet4"];
		$this->Tablet4->AdvancedSearch->SearchCondition = @$filter["v_Tablet4"];
		$this->Tablet4->AdvancedSearch->SearchValue2 = @$filter["y_Tablet4"];
		$this->Tablet4->AdvancedSearch->SearchOperator2 = @$filter["w_Tablet4"];
		$this->Tablet4->AdvancedSearch->save();

		// Field Tablet5
		$this->Tablet5->AdvancedSearch->SearchValue = @$filter["x_Tablet5"];
		$this->Tablet5->AdvancedSearch->SearchOperator = @$filter["z_Tablet5"];
		$this->Tablet5->AdvancedSearch->SearchCondition = @$filter["v_Tablet5"];
		$this->Tablet5->AdvancedSearch->SearchValue2 = @$filter["y_Tablet5"];
		$this->Tablet5->AdvancedSearch->SearchOperator2 = @$filter["w_Tablet5"];
		$this->Tablet5->AdvancedSearch->save();

		// Field Tablet6
		$this->Tablet6->AdvancedSearch->SearchValue = @$filter["x_Tablet6"];
		$this->Tablet6->AdvancedSearch->SearchOperator = @$filter["z_Tablet6"];
		$this->Tablet6->AdvancedSearch->SearchCondition = @$filter["v_Tablet6"];
		$this->Tablet6->AdvancedSearch->SearchValue2 = @$filter["y_Tablet6"];
		$this->Tablet6->AdvancedSearch->SearchOperator2 = @$filter["w_Tablet6"];
		$this->Tablet6->AdvancedSearch->save();

		// Field Tablet7
		$this->Tablet7->AdvancedSearch->SearchValue = @$filter["x_Tablet7"];
		$this->Tablet7->AdvancedSearch->SearchOperator = @$filter["z_Tablet7"];
		$this->Tablet7->AdvancedSearch->SearchCondition = @$filter["v_Tablet7"];
		$this->Tablet7->AdvancedSearch->SearchValue2 = @$filter["y_Tablet7"];
		$this->Tablet7->AdvancedSearch->SearchOperator2 = @$filter["w_Tablet7"];
		$this->Tablet7->AdvancedSearch->save();

		// Field Tablet8
		$this->Tablet8->AdvancedSearch->SearchValue = @$filter["x_Tablet8"];
		$this->Tablet8->AdvancedSearch->SearchOperator = @$filter["z_Tablet8"];
		$this->Tablet8->AdvancedSearch->SearchCondition = @$filter["v_Tablet8"];
		$this->Tablet8->AdvancedSearch->SearchValue2 = @$filter["y_Tablet8"];
		$this->Tablet8->AdvancedSearch->SearchOperator2 = @$filter["w_Tablet8"];
		$this->Tablet8->AdvancedSearch->save();

		// Field Tablet9
		$this->Tablet9->AdvancedSearch->SearchValue = @$filter["x_Tablet9"];
		$this->Tablet9->AdvancedSearch->SearchOperator = @$filter["z_Tablet9"];
		$this->Tablet9->AdvancedSearch->SearchCondition = @$filter["v_Tablet9"];
		$this->Tablet9->AdvancedSearch->SearchValue2 = @$filter["y_Tablet9"];
		$this->Tablet9->AdvancedSearch->SearchOperator2 = @$filter["w_Tablet9"];
		$this->Tablet9->AdvancedSearch->save();

		// Field Tablet10
		$this->Tablet10->AdvancedSearch->SearchValue = @$filter["x_Tablet10"];
		$this->Tablet10->AdvancedSearch->SearchOperator = @$filter["z_Tablet10"];
		$this->Tablet10->AdvancedSearch->SearchCondition = @$filter["v_Tablet10"];
		$this->Tablet10->AdvancedSearch->SearchValue2 = @$filter["y_Tablet10"];
		$this->Tablet10->AdvancedSearch->SearchOperator2 = @$filter["w_Tablet10"];
		$this->Tablet10->AdvancedSearch->save();

		// Field Tablet11
		$this->Tablet11->AdvancedSearch->SearchValue = @$filter["x_Tablet11"];
		$this->Tablet11->AdvancedSearch->SearchOperator = @$filter["z_Tablet11"];
		$this->Tablet11->AdvancedSearch->SearchCondition = @$filter["v_Tablet11"];
		$this->Tablet11->AdvancedSearch->SearchValue2 = @$filter["y_Tablet11"];
		$this->Tablet11->AdvancedSearch->SearchOperator2 = @$filter["w_Tablet11"];
		$this->Tablet11->AdvancedSearch->save();

		// Field Tablet12
		$this->Tablet12->AdvancedSearch->SearchValue = @$filter["x_Tablet12"];
		$this->Tablet12->AdvancedSearch->SearchOperator = @$filter["z_Tablet12"];
		$this->Tablet12->AdvancedSearch->SearchCondition = @$filter["v_Tablet12"];
		$this->Tablet12->AdvancedSearch->SearchValue2 = @$filter["y_Tablet12"];
		$this->Tablet12->AdvancedSearch->SearchOperator2 = @$filter["w_Tablet12"];
		$this->Tablet12->AdvancedSearch->save();

		// Field Tablet13
		$this->Tablet13->AdvancedSearch->SearchValue = @$filter["x_Tablet13"];
		$this->Tablet13->AdvancedSearch->SearchOperator = @$filter["z_Tablet13"];
		$this->Tablet13->AdvancedSearch->SearchCondition = @$filter["v_Tablet13"];
		$this->Tablet13->AdvancedSearch->SearchValue2 = @$filter["y_Tablet13"];
		$this->Tablet13->AdvancedSearch->SearchOperator2 = @$filter["w_Tablet13"];
		$this->Tablet13->AdvancedSearch->save();

		// Field RFSH1
		$this->RFSH1->AdvancedSearch->SearchValue = @$filter["x_RFSH1"];
		$this->RFSH1->AdvancedSearch->SearchOperator = @$filter["z_RFSH1"];
		$this->RFSH1->AdvancedSearch->SearchCondition = @$filter["v_RFSH1"];
		$this->RFSH1->AdvancedSearch->SearchValue2 = @$filter["y_RFSH1"];
		$this->RFSH1->AdvancedSearch->SearchOperator2 = @$filter["w_RFSH1"];
		$this->RFSH1->AdvancedSearch->save();

		// Field RFSH2
		$this->RFSH2->AdvancedSearch->SearchValue = @$filter["x_RFSH2"];
		$this->RFSH2->AdvancedSearch->SearchOperator = @$filter["z_RFSH2"];
		$this->RFSH2->AdvancedSearch->SearchCondition = @$filter["v_RFSH2"];
		$this->RFSH2->AdvancedSearch->SearchValue2 = @$filter["y_RFSH2"];
		$this->RFSH2->AdvancedSearch->SearchOperator2 = @$filter["w_RFSH2"];
		$this->RFSH2->AdvancedSearch->save();

		// Field RFSH3
		$this->RFSH3->AdvancedSearch->SearchValue = @$filter["x_RFSH3"];
		$this->RFSH3->AdvancedSearch->SearchOperator = @$filter["z_RFSH3"];
		$this->RFSH3->AdvancedSearch->SearchCondition = @$filter["v_RFSH3"];
		$this->RFSH3->AdvancedSearch->SearchValue2 = @$filter["y_RFSH3"];
		$this->RFSH3->AdvancedSearch->SearchOperator2 = @$filter["w_RFSH3"];
		$this->RFSH3->AdvancedSearch->save();

		// Field RFSH4
		$this->RFSH4->AdvancedSearch->SearchValue = @$filter["x_RFSH4"];
		$this->RFSH4->AdvancedSearch->SearchOperator = @$filter["z_RFSH4"];
		$this->RFSH4->AdvancedSearch->SearchCondition = @$filter["v_RFSH4"];
		$this->RFSH4->AdvancedSearch->SearchValue2 = @$filter["y_RFSH4"];
		$this->RFSH4->AdvancedSearch->SearchOperator2 = @$filter["w_RFSH4"];
		$this->RFSH4->AdvancedSearch->save();

		// Field RFSH5
		$this->RFSH5->AdvancedSearch->SearchValue = @$filter["x_RFSH5"];
		$this->RFSH5->AdvancedSearch->SearchOperator = @$filter["z_RFSH5"];
		$this->RFSH5->AdvancedSearch->SearchCondition = @$filter["v_RFSH5"];
		$this->RFSH5->AdvancedSearch->SearchValue2 = @$filter["y_RFSH5"];
		$this->RFSH5->AdvancedSearch->SearchOperator2 = @$filter["w_RFSH5"];
		$this->RFSH5->AdvancedSearch->save();

		// Field RFSH6
		$this->RFSH6->AdvancedSearch->SearchValue = @$filter["x_RFSH6"];
		$this->RFSH6->AdvancedSearch->SearchOperator = @$filter["z_RFSH6"];
		$this->RFSH6->AdvancedSearch->SearchCondition = @$filter["v_RFSH6"];
		$this->RFSH6->AdvancedSearch->SearchValue2 = @$filter["y_RFSH6"];
		$this->RFSH6->AdvancedSearch->SearchOperator2 = @$filter["w_RFSH6"];
		$this->RFSH6->AdvancedSearch->save();

		// Field RFSH7
		$this->RFSH7->AdvancedSearch->SearchValue = @$filter["x_RFSH7"];
		$this->RFSH7->AdvancedSearch->SearchOperator = @$filter["z_RFSH7"];
		$this->RFSH7->AdvancedSearch->SearchCondition = @$filter["v_RFSH7"];
		$this->RFSH7->AdvancedSearch->SearchValue2 = @$filter["y_RFSH7"];
		$this->RFSH7->AdvancedSearch->SearchOperator2 = @$filter["w_RFSH7"];
		$this->RFSH7->AdvancedSearch->save();

		// Field RFSH8
		$this->RFSH8->AdvancedSearch->SearchValue = @$filter["x_RFSH8"];
		$this->RFSH8->AdvancedSearch->SearchOperator = @$filter["z_RFSH8"];
		$this->RFSH8->AdvancedSearch->SearchCondition = @$filter["v_RFSH8"];
		$this->RFSH8->AdvancedSearch->SearchValue2 = @$filter["y_RFSH8"];
		$this->RFSH8->AdvancedSearch->SearchOperator2 = @$filter["w_RFSH8"];
		$this->RFSH8->AdvancedSearch->save();

		// Field RFSH9
		$this->RFSH9->AdvancedSearch->SearchValue = @$filter["x_RFSH9"];
		$this->RFSH9->AdvancedSearch->SearchOperator = @$filter["z_RFSH9"];
		$this->RFSH9->AdvancedSearch->SearchCondition = @$filter["v_RFSH9"];
		$this->RFSH9->AdvancedSearch->SearchValue2 = @$filter["y_RFSH9"];
		$this->RFSH9->AdvancedSearch->SearchOperator2 = @$filter["w_RFSH9"];
		$this->RFSH9->AdvancedSearch->save();

		// Field RFSH10
		$this->RFSH10->AdvancedSearch->SearchValue = @$filter["x_RFSH10"];
		$this->RFSH10->AdvancedSearch->SearchOperator = @$filter["z_RFSH10"];
		$this->RFSH10->AdvancedSearch->SearchCondition = @$filter["v_RFSH10"];
		$this->RFSH10->AdvancedSearch->SearchValue2 = @$filter["y_RFSH10"];
		$this->RFSH10->AdvancedSearch->SearchOperator2 = @$filter["w_RFSH10"];
		$this->RFSH10->AdvancedSearch->save();

		// Field RFSH11
		$this->RFSH11->AdvancedSearch->SearchValue = @$filter["x_RFSH11"];
		$this->RFSH11->AdvancedSearch->SearchOperator = @$filter["z_RFSH11"];
		$this->RFSH11->AdvancedSearch->SearchCondition = @$filter["v_RFSH11"];
		$this->RFSH11->AdvancedSearch->SearchValue2 = @$filter["y_RFSH11"];
		$this->RFSH11->AdvancedSearch->SearchOperator2 = @$filter["w_RFSH11"];
		$this->RFSH11->AdvancedSearch->save();

		// Field RFSH12
		$this->RFSH12->AdvancedSearch->SearchValue = @$filter["x_RFSH12"];
		$this->RFSH12->AdvancedSearch->SearchOperator = @$filter["z_RFSH12"];
		$this->RFSH12->AdvancedSearch->SearchCondition = @$filter["v_RFSH12"];
		$this->RFSH12->AdvancedSearch->SearchValue2 = @$filter["y_RFSH12"];
		$this->RFSH12->AdvancedSearch->SearchOperator2 = @$filter["w_RFSH12"];
		$this->RFSH12->AdvancedSearch->save();

		// Field RFSH13
		$this->RFSH13->AdvancedSearch->SearchValue = @$filter["x_RFSH13"];
		$this->RFSH13->AdvancedSearch->SearchOperator = @$filter["z_RFSH13"];
		$this->RFSH13->AdvancedSearch->SearchCondition = @$filter["v_RFSH13"];
		$this->RFSH13->AdvancedSearch->SearchValue2 = @$filter["y_RFSH13"];
		$this->RFSH13->AdvancedSearch->SearchOperator2 = @$filter["w_RFSH13"];
		$this->RFSH13->AdvancedSearch->save();

		// Field HMG1
		$this->HMG1->AdvancedSearch->SearchValue = @$filter["x_HMG1"];
		$this->HMG1->AdvancedSearch->SearchOperator = @$filter["z_HMG1"];
		$this->HMG1->AdvancedSearch->SearchCondition = @$filter["v_HMG1"];
		$this->HMG1->AdvancedSearch->SearchValue2 = @$filter["y_HMG1"];
		$this->HMG1->AdvancedSearch->SearchOperator2 = @$filter["w_HMG1"];
		$this->HMG1->AdvancedSearch->save();

		// Field HMG2
		$this->HMG2->AdvancedSearch->SearchValue = @$filter["x_HMG2"];
		$this->HMG2->AdvancedSearch->SearchOperator = @$filter["z_HMG2"];
		$this->HMG2->AdvancedSearch->SearchCondition = @$filter["v_HMG2"];
		$this->HMG2->AdvancedSearch->SearchValue2 = @$filter["y_HMG2"];
		$this->HMG2->AdvancedSearch->SearchOperator2 = @$filter["w_HMG2"];
		$this->HMG2->AdvancedSearch->save();

		// Field HMG3
		$this->HMG3->AdvancedSearch->SearchValue = @$filter["x_HMG3"];
		$this->HMG3->AdvancedSearch->SearchOperator = @$filter["z_HMG3"];
		$this->HMG3->AdvancedSearch->SearchCondition = @$filter["v_HMG3"];
		$this->HMG3->AdvancedSearch->SearchValue2 = @$filter["y_HMG3"];
		$this->HMG3->AdvancedSearch->SearchOperator2 = @$filter["w_HMG3"];
		$this->HMG3->AdvancedSearch->save();

		// Field HMG4
		$this->HMG4->AdvancedSearch->SearchValue = @$filter["x_HMG4"];
		$this->HMG4->AdvancedSearch->SearchOperator = @$filter["z_HMG4"];
		$this->HMG4->AdvancedSearch->SearchCondition = @$filter["v_HMG4"];
		$this->HMG4->AdvancedSearch->SearchValue2 = @$filter["y_HMG4"];
		$this->HMG4->AdvancedSearch->SearchOperator2 = @$filter["w_HMG4"];
		$this->HMG4->AdvancedSearch->save();

		// Field HMG5
		$this->HMG5->AdvancedSearch->SearchValue = @$filter["x_HMG5"];
		$this->HMG5->AdvancedSearch->SearchOperator = @$filter["z_HMG5"];
		$this->HMG5->AdvancedSearch->SearchCondition = @$filter["v_HMG5"];
		$this->HMG5->AdvancedSearch->SearchValue2 = @$filter["y_HMG5"];
		$this->HMG5->AdvancedSearch->SearchOperator2 = @$filter["w_HMG5"];
		$this->HMG5->AdvancedSearch->save();

		// Field HMG6
		$this->HMG6->AdvancedSearch->SearchValue = @$filter["x_HMG6"];
		$this->HMG6->AdvancedSearch->SearchOperator = @$filter["z_HMG6"];
		$this->HMG6->AdvancedSearch->SearchCondition = @$filter["v_HMG6"];
		$this->HMG6->AdvancedSearch->SearchValue2 = @$filter["y_HMG6"];
		$this->HMG6->AdvancedSearch->SearchOperator2 = @$filter["w_HMG6"];
		$this->HMG6->AdvancedSearch->save();

		// Field HMG7
		$this->HMG7->AdvancedSearch->SearchValue = @$filter["x_HMG7"];
		$this->HMG7->AdvancedSearch->SearchOperator = @$filter["z_HMG7"];
		$this->HMG7->AdvancedSearch->SearchCondition = @$filter["v_HMG7"];
		$this->HMG7->AdvancedSearch->SearchValue2 = @$filter["y_HMG7"];
		$this->HMG7->AdvancedSearch->SearchOperator2 = @$filter["w_HMG7"];
		$this->HMG7->AdvancedSearch->save();

		// Field HMG8
		$this->HMG8->AdvancedSearch->SearchValue = @$filter["x_HMG8"];
		$this->HMG8->AdvancedSearch->SearchOperator = @$filter["z_HMG8"];
		$this->HMG8->AdvancedSearch->SearchCondition = @$filter["v_HMG8"];
		$this->HMG8->AdvancedSearch->SearchValue2 = @$filter["y_HMG8"];
		$this->HMG8->AdvancedSearch->SearchOperator2 = @$filter["w_HMG8"];
		$this->HMG8->AdvancedSearch->save();

		// Field HMG9
		$this->HMG9->AdvancedSearch->SearchValue = @$filter["x_HMG9"];
		$this->HMG9->AdvancedSearch->SearchOperator = @$filter["z_HMG9"];
		$this->HMG9->AdvancedSearch->SearchCondition = @$filter["v_HMG9"];
		$this->HMG9->AdvancedSearch->SearchValue2 = @$filter["y_HMG9"];
		$this->HMG9->AdvancedSearch->SearchOperator2 = @$filter["w_HMG9"];
		$this->HMG9->AdvancedSearch->save();

		// Field HMG10
		$this->HMG10->AdvancedSearch->SearchValue = @$filter["x_HMG10"];
		$this->HMG10->AdvancedSearch->SearchOperator = @$filter["z_HMG10"];
		$this->HMG10->AdvancedSearch->SearchCondition = @$filter["v_HMG10"];
		$this->HMG10->AdvancedSearch->SearchValue2 = @$filter["y_HMG10"];
		$this->HMG10->AdvancedSearch->SearchOperator2 = @$filter["w_HMG10"];
		$this->HMG10->AdvancedSearch->save();

		// Field HMG11
		$this->HMG11->AdvancedSearch->SearchValue = @$filter["x_HMG11"];
		$this->HMG11->AdvancedSearch->SearchOperator = @$filter["z_HMG11"];
		$this->HMG11->AdvancedSearch->SearchCondition = @$filter["v_HMG11"];
		$this->HMG11->AdvancedSearch->SearchValue2 = @$filter["y_HMG11"];
		$this->HMG11->AdvancedSearch->SearchOperator2 = @$filter["w_HMG11"];
		$this->HMG11->AdvancedSearch->save();

		// Field HMG12
		$this->HMG12->AdvancedSearch->SearchValue = @$filter["x_HMG12"];
		$this->HMG12->AdvancedSearch->SearchOperator = @$filter["z_HMG12"];
		$this->HMG12->AdvancedSearch->SearchCondition = @$filter["v_HMG12"];
		$this->HMG12->AdvancedSearch->SearchValue2 = @$filter["y_HMG12"];
		$this->HMG12->AdvancedSearch->SearchOperator2 = @$filter["w_HMG12"];
		$this->HMG12->AdvancedSearch->save();

		// Field HMG13
		$this->HMG13->AdvancedSearch->SearchValue = @$filter["x_HMG13"];
		$this->HMG13->AdvancedSearch->SearchOperator = @$filter["z_HMG13"];
		$this->HMG13->AdvancedSearch->SearchCondition = @$filter["v_HMG13"];
		$this->HMG13->AdvancedSearch->SearchValue2 = @$filter["y_HMG13"];
		$this->HMG13->AdvancedSearch->SearchOperator2 = @$filter["w_HMG13"];
		$this->HMG13->AdvancedSearch->save();

		// Field GnRH1
		$this->GnRH1->AdvancedSearch->SearchValue = @$filter["x_GnRH1"];
		$this->GnRH1->AdvancedSearch->SearchOperator = @$filter["z_GnRH1"];
		$this->GnRH1->AdvancedSearch->SearchCondition = @$filter["v_GnRH1"];
		$this->GnRH1->AdvancedSearch->SearchValue2 = @$filter["y_GnRH1"];
		$this->GnRH1->AdvancedSearch->SearchOperator2 = @$filter["w_GnRH1"];
		$this->GnRH1->AdvancedSearch->save();

		// Field GnRH2
		$this->GnRH2->AdvancedSearch->SearchValue = @$filter["x_GnRH2"];
		$this->GnRH2->AdvancedSearch->SearchOperator = @$filter["z_GnRH2"];
		$this->GnRH2->AdvancedSearch->SearchCondition = @$filter["v_GnRH2"];
		$this->GnRH2->AdvancedSearch->SearchValue2 = @$filter["y_GnRH2"];
		$this->GnRH2->AdvancedSearch->SearchOperator2 = @$filter["w_GnRH2"];
		$this->GnRH2->AdvancedSearch->save();

		// Field GnRH3
		$this->GnRH3->AdvancedSearch->SearchValue = @$filter["x_GnRH3"];
		$this->GnRH3->AdvancedSearch->SearchOperator = @$filter["z_GnRH3"];
		$this->GnRH3->AdvancedSearch->SearchCondition = @$filter["v_GnRH3"];
		$this->GnRH3->AdvancedSearch->SearchValue2 = @$filter["y_GnRH3"];
		$this->GnRH3->AdvancedSearch->SearchOperator2 = @$filter["w_GnRH3"];
		$this->GnRH3->AdvancedSearch->save();

		// Field GnRH4
		$this->GnRH4->AdvancedSearch->SearchValue = @$filter["x_GnRH4"];
		$this->GnRH4->AdvancedSearch->SearchOperator = @$filter["z_GnRH4"];
		$this->GnRH4->AdvancedSearch->SearchCondition = @$filter["v_GnRH4"];
		$this->GnRH4->AdvancedSearch->SearchValue2 = @$filter["y_GnRH4"];
		$this->GnRH4->AdvancedSearch->SearchOperator2 = @$filter["w_GnRH4"];
		$this->GnRH4->AdvancedSearch->save();

		// Field GnRH5
		$this->GnRH5->AdvancedSearch->SearchValue = @$filter["x_GnRH5"];
		$this->GnRH5->AdvancedSearch->SearchOperator = @$filter["z_GnRH5"];
		$this->GnRH5->AdvancedSearch->SearchCondition = @$filter["v_GnRH5"];
		$this->GnRH5->AdvancedSearch->SearchValue2 = @$filter["y_GnRH5"];
		$this->GnRH5->AdvancedSearch->SearchOperator2 = @$filter["w_GnRH5"];
		$this->GnRH5->AdvancedSearch->save();

		// Field GnRH6
		$this->GnRH6->AdvancedSearch->SearchValue = @$filter["x_GnRH6"];
		$this->GnRH6->AdvancedSearch->SearchOperator = @$filter["z_GnRH6"];
		$this->GnRH6->AdvancedSearch->SearchCondition = @$filter["v_GnRH6"];
		$this->GnRH6->AdvancedSearch->SearchValue2 = @$filter["y_GnRH6"];
		$this->GnRH6->AdvancedSearch->SearchOperator2 = @$filter["w_GnRH6"];
		$this->GnRH6->AdvancedSearch->save();

		// Field GnRH7
		$this->GnRH7->AdvancedSearch->SearchValue = @$filter["x_GnRH7"];
		$this->GnRH7->AdvancedSearch->SearchOperator = @$filter["z_GnRH7"];
		$this->GnRH7->AdvancedSearch->SearchCondition = @$filter["v_GnRH7"];
		$this->GnRH7->AdvancedSearch->SearchValue2 = @$filter["y_GnRH7"];
		$this->GnRH7->AdvancedSearch->SearchOperator2 = @$filter["w_GnRH7"];
		$this->GnRH7->AdvancedSearch->save();

		// Field GnRH8
		$this->GnRH8->AdvancedSearch->SearchValue = @$filter["x_GnRH8"];
		$this->GnRH8->AdvancedSearch->SearchOperator = @$filter["z_GnRH8"];
		$this->GnRH8->AdvancedSearch->SearchCondition = @$filter["v_GnRH8"];
		$this->GnRH8->AdvancedSearch->SearchValue2 = @$filter["y_GnRH8"];
		$this->GnRH8->AdvancedSearch->SearchOperator2 = @$filter["w_GnRH8"];
		$this->GnRH8->AdvancedSearch->save();

		// Field GnRH9
		$this->GnRH9->AdvancedSearch->SearchValue = @$filter["x_GnRH9"];
		$this->GnRH9->AdvancedSearch->SearchOperator = @$filter["z_GnRH9"];
		$this->GnRH9->AdvancedSearch->SearchCondition = @$filter["v_GnRH9"];
		$this->GnRH9->AdvancedSearch->SearchValue2 = @$filter["y_GnRH9"];
		$this->GnRH9->AdvancedSearch->SearchOperator2 = @$filter["w_GnRH9"];
		$this->GnRH9->AdvancedSearch->save();

		// Field GnRH10
		$this->GnRH10->AdvancedSearch->SearchValue = @$filter["x_GnRH10"];
		$this->GnRH10->AdvancedSearch->SearchOperator = @$filter["z_GnRH10"];
		$this->GnRH10->AdvancedSearch->SearchCondition = @$filter["v_GnRH10"];
		$this->GnRH10->AdvancedSearch->SearchValue2 = @$filter["y_GnRH10"];
		$this->GnRH10->AdvancedSearch->SearchOperator2 = @$filter["w_GnRH10"];
		$this->GnRH10->AdvancedSearch->save();

		// Field GnRH11
		$this->GnRH11->AdvancedSearch->SearchValue = @$filter["x_GnRH11"];
		$this->GnRH11->AdvancedSearch->SearchOperator = @$filter["z_GnRH11"];
		$this->GnRH11->AdvancedSearch->SearchCondition = @$filter["v_GnRH11"];
		$this->GnRH11->AdvancedSearch->SearchValue2 = @$filter["y_GnRH11"];
		$this->GnRH11->AdvancedSearch->SearchOperator2 = @$filter["w_GnRH11"];
		$this->GnRH11->AdvancedSearch->save();

		// Field GnRH12
		$this->GnRH12->AdvancedSearch->SearchValue = @$filter["x_GnRH12"];
		$this->GnRH12->AdvancedSearch->SearchOperator = @$filter["z_GnRH12"];
		$this->GnRH12->AdvancedSearch->SearchCondition = @$filter["v_GnRH12"];
		$this->GnRH12->AdvancedSearch->SearchValue2 = @$filter["y_GnRH12"];
		$this->GnRH12->AdvancedSearch->SearchOperator2 = @$filter["w_GnRH12"];
		$this->GnRH12->AdvancedSearch->save();

		// Field GnRH13
		$this->GnRH13->AdvancedSearch->SearchValue = @$filter["x_GnRH13"];
		$this->GnRH13->AdvancedSearch->SearchOperator = @$filter["z_GnRH13"];
		$this->GnRH13->AdvancedSearch->SearchCondition = @$filter["v_GnRH13"];
		$this->GnRH13->AdvancedSearch->SearchValue2 = @$filter["y_GnRH13"];
		$this->GnRH13->AdvancedSearch->SearchOperator2 = @$filter["w_GnRH13"];
		$this->GnRH13->AdvancedSearch->save();

		// Field E21
		$this->E21->AdvancedSearch->SearchValue = @$filter["x_E21"];
		$this->E21->AdvancedSearch->SearchOperator = @$filter["z_E21"];
		$this->E21->AdvancedSearch->SearchCondition = @$filter["v_E21"];
		$this->E21->AdvancedSearch->SearchValue2 = @$filter["y_E21"];
		$this->E21->AdvancedSearch->SearchOperator2 = @$filter["w_E21"];
		$this->E21->AdvancedSearch->save();

		// Field E22
		$this->E22->AdvancedSearch->SearchValue = @$filter["x_E22"];
		$this->E22->AdvancedSearch->SearchOperator = @$filter["z_E22"];
		$this->E22->AdvancedSearch->SearchCondition = @$filter["v_E22"];
		$this->E22->AdvancedSearch->SearchValue2 = @$filter["y_E22"];
		$this->E22->AdvancedSearch->SearchOperator2 = @$filter["w_E22"];
		$this->E22->AdvancedSearch->save();

		// Field E23
		$this->E23->AdvancedSearch->SearchValue = @$filter["x_E23"];
		$this->E23->AdvancedSearch->SearchOperator = @$filter["z_E23"];
		$this->E23->AdvancedSearch->SearchCondition = @$filter["v_E23"];
		$this->E23->AdvancedSearch->SearchValue2 = @$filter["y_E23"];
		$this->E23->AdvancedSearch->SearchOperator2 = @$filter["w_E23"];
		$this->E23->AdvancedSearch->save();

		// Field E24
		$this->E24->AdvancedSearch->SearchValue = @$filter["x_E24"];
		$this->E24->AdvancedSearch->SearchOperator = @$filter["z_E24"];
		$this->E24->AdvancedSearch->SearchCondition = @$filter["v_E24"];
		$this->E24->AdvancedSearch->SearchValue2 = @$filter["y_E24"];
		$this->E24->AdvancedSearch->SearchOperator2 = @$filter["w_E24"];
		$this->E24->AdvancedSearch->save();

		// Field E25
		$this->E25->AdvancedSearch->SearchValue = @$filter["x_E25"];
		$this->E25->AdvancedSearch->SearchOperator = @$filter["z_E25"];
		$this->E25->AdvancedSearch->SearchCondition = @$filter["v_E25"];
		$this->E25->AdvancedSearch->SearchValue2 = @$filter["y_E25"];
		$this->E25->AdvancedSearch->SearchOperator2 = @$filter["w_E25"];
		$this->E25->AdvancedSearch->save();

		// Field E26
		$this->E26->AdvancedSearch->SearchValue = @$filter["x_E26"];
		$this->E26->AdvancedSearch->SearchOperator = @$filter["z_E26"];
		$this->E26->AdvancedSearch->SearchCondition = @$filter["v_E26"];
		$this->E26->AdvancedSearch->SearchValue2 = @$filter["y_E26"];
		$this->E26->AdvancedSearch->SearchOperator2 = @$filter["w_E26"];
		$this->E26->AdvancedSearch->save();

		// Field E27
		$this->E27->AdvancedSearch->SearchValue = @$filter["x_E27"];
		$this->E27->AdvancedSearch->SearchOperator = @$filter["z_E27"];
		$this->E27->AdvancedSearch->SearchCondition = @$filter["v_E27"];
		$this->E27->AdvancedSearch->SearchValue2 = @$filter["y_E27"];
		$this->E27->AdvancedSearch->SearchOperator2 = @$filter["w_E27"];
		$this->E27->AdvancedSearch->save();

		// Field E28
		$this->E28->AdvancedSearch->SearchValue = @$filter["x_E28"];
		$this->E28->AdvancedSearch->SearchOperator = @$filter["z_E28"];
		$this->E28->AdvancedSearch->SearchCondition = @$filter["v_E28"];
		$this->E28->AdvancedSearch->SearchValue2 = @$filter["y_E28"];
		$this->E28->AdvancedSearch->SearchOperator2 = @$filter["w_E28"];
		$this->E28->AdvancedSearch->save();

		// Field E29
		$this->E29->AdvancedSearch->SearchValue = @$filter["x_E29"];
		$this->E29->AdvancedSearch->SearchOperator = @$filter["z_E29"];
		$this->E29->AdvancedSearch->SearchCondition = @$filter["v_E29"];
		$this->E29->AdvancedSearch->SearchValue2 = @$filter["y_E29"];
		$this->E29->AdvancedSearch->SearchOperator2 = @$filter["w_E29"];
		$this->E29->AdvancedSearch->save();

		// Field E210
		$this->E210->AdvancedSearch->SearchValue = @$filter["x_E210"];
		$this->E210->AdvancedSearch->SearchOperator = @$filter["z_E210"];
		$this->E210->AdvancedSearch->SearchCondition = @$filter["v_E210"];
		$this->E210->AdvancedSearch->SearchValue2 = @$filter["y_E210"];
		$this->E210->AdvancedSearch->SearchOperator2 = @$filter["w_E210"];
		$this->E210->AdvancedSearch->save();

		// Field E211
		$this->E211->AdvancedSearch->SearchValue = @$filter["x_E211"];
		$this->E211->AdvancedSearch->SearchOperator = @$filter["z_E211"];
		$this->E211->AdvancedSearch->SearchCondition = @$filter["v_E211"];
		$this->E211->AdvancedSearch->SearchValue2 = @$filter["y_E211"];
		$this->E211->AdvancedSearch->SearchOperator2 = @$filter["w_E211"];
		$this->E211->AdvancedSearch->save();

		// Field E212
		$this->E212->AdvancedSearch->SearchValue = @$filter["x_E212"];
		$this->E212->AdvancedSearch->SearchOperator = @$filter["z_E212"];
		$this->E212->AdvancedSearch->SearchCondition = @$filter["v_E212"];
		$this->E212->AdvancedSearch->SearchValue2 = @$filter["y_E212"];
		$this->E212->AdvancedSearch->SearchOperator2 = @$filter["w_E212"];
		$this->E212->AdvancedSearch->save();

		// Field E213
		$this->E213->AdvancedSearch->SearchValue = @$filter["x_E213"];
		$this->E213->AdvancedSearch->SearchOperator = @$filter["z_E213"];
		$this->E213->AdvancedSearch->SearchCondition = @$filter["v_E213"];
		$this->E213->AdvancedSearch->SearchValue2 = @$filter["y_E213"];
		$this->E213->AdvancedSearch->SearchOperator2 = @$filter["w_E213"];
		$this->E213->AdvancedSearch->save();

		// Field P41
		$this->P41->AdvancedSearch->SearchValue = @$filter["x_P41"];
		$this->P41->AdvancedSearch->SearchOperator = @$filter["z_P41"];
		$this->P41->AdvancedSearch->SearchCondition = @$filter["v_P41"];
		$this->P41->AdvancedSearch->SearchValue2 = @$filter["y_P41"];
		$this->P41->AdvancedSearch->SearchOperator2 = @$filter["w_P41"];
		$this->P41->AdvancedSearch->save();

		// Field P42
		$this->P42->AdvancedSearch->SearchValue = @$filter["x_P42"];
		$this->P42->AdvancedSearch->SearchOperator = @$filter["z_P42"];
		$this->P42->AdvancedSearch->SearchCondition = @$filter["v_P42"];
		$this->P42->AdvancedSearch->SearchValue2 = @$filter["y_P42"];
		$this->P42->AdvancedSearch->SearchOperator2 = @$filter["w_P42"];
		$this->P42->AdvancedSearch->save();

		// Field P43
		$this->P43->AdvancedSearch->SearchValue = @$filter["x_P43"];
		$this->P43->AdvancedSearch->SearchOperator = @$filter["z_P43"];
		$this->P43->AdvancedSearch->SearchCondition = @$filter["v_P43"];
		$this->P43->AdvancedSearch->SearchValue2 = @$filter["y_P43"];
		$this->P43->AdvancedSearch->SearchOperator2 = @$filter["w_P43"];
		$this->P43->AdvancedSearch->save();

		// Field P44
		$this->P44->AdvancedSearch->SearchValue = @$filter["x_P44"];
		$this->P44->AdvancedSearch->SearchOperator = @$filter["z_P44"];
		$this->P44->AdvancedSearch->SearchCondition = @$filter["v_P44"];
		$this->P44->AdvancedSearch->SearchValue2 = @$filter["y_P44"];
		$this->P44->AdvancedSearch->SearchOperator2 = @$filter["w_P44"];
		$this->P44->AdvancedSearch->save();

		// Field P45
		$this->P45->AdvancedSearch->SearchValue = @$filter["x_P45"];
		$this->P45->AdvancedSearch->SearchOperator = @$filter["z_P45"];
		$this->P45->AdvancedSearch->SearchCondition = @$filter["v_P45"];
		$this->P45->AdvancedSearch->SearchValue2 = @$filter["y_P45"];
		$this->P45->AdvancedSearch->SearchOperator2 = @$filter["w_P45"];
		$this->P45->AdvancedSearch->save();

		// Field P46
		$this->P46->AdvancedSearch->SearchValue = @$filter["x_P46"];
		$this->P46->AdvancedSearch->SearchOperator = @$filter["z_P46"];
		$this->P46->AdvancedSearch->SearchCondition = @$filter["v_P46"];
		$this->P46->AdvancedSearch->SearchValue2 = @$filter["y_P46"];
		$this->P46->AdvancedSearch->SearchOperator2 = @$filter["w_P46"];
		$this->P46->AdvancedSearch->save();

		// Field P47
		$this->P47->AdvancedSearch->SearchValue = @$filter["x_P47"];
		$this->P47->AdvancedSearch->SearchOperator = @$filter["z_P47"];
		$this->P47->AdvancedSearch->SearchCondition = @$filter["v_P47"];
		$this->P47->AdvancedSearch->SearchValue2 = @$filter["y_P47"];
		$this->P47->AdvancedSearch->SearchOperator2 = @$filter["w_P47"];
		$this->P47->AdvancedSearch->save();

		// Field P48
		$this->P48->AdvancedSearch->SearchValue = @$filter["x_P48"];
		$this->P48->AdvancedSearch->SearchOperator = @$filter["z_P48"];
		$this->P48->AdvancedSearch->SearchCondition = @$filter["v_P48"];
		$this->P48->AdvancedSearch->SearchValue2 = @$filter["y_P48"];
		$this->P48->AdvancedSearch->SearchOperator2 = @$filter["w_P48"];
		$this->P48->AdvancedSearch->save();

		// Field P49
		$this->P49->AdvancedSearch->SearchValue = @$filter["x_P49"];
		$this->P49->AdvancedSearch->SearchOperator = @$filter["z_P49"];
		$this->P49->AdvancedSearch->SearchCondition = @$filter["v_P49"];
		$this->P49->AdvancedSearch->SearchValue2 = @$filter["y_P49"];
		$this->P49->AdvancedSearch->SearchOperator2 = @$filter["w_P49"];
		$this->P49->AdvancedSearch->save();

		// Field P410
		$this->P410->AdvancedSearch->SearchValue = @$filter["x_P410"];
		$this->P410->AdvancedSearch->SearchOperator = @$filter["z_P410"];
		$this->P410->AdvancedSearch->SearchCondition = @$filter["v_P410"];
		$this->P410->AdvancedSearch->SearchValue2 = @$filter["y_P410"];
		$this->P410->AdvancedSearch->SearchOperator2 = @$filter["w_P410"];
		$this->P410->AdvancedSearch->save();

		// Field P411
		$this->P411->AdvancedSearch->SearchValue = @$filter["x_P411"];
		$this->P411->AdvancedSearch->SearchOperator = @$filter["z_P411"];
		$this->P411->AdvancedSearch->SearchCondition = @$filter["v_P411"];
		$this->P411->AdvancedSearch->SearchValue2 = @$filter["y_P411"];
		$this->P411->AdvancedSearch->SearchOperator2 = @$filter["w_P411"];
		$this->P411->AdvancedSearch->save();

		// Field P412
		$this->P412->AdvancedSearch->SearchValue = @$filter["x_P412"];
		$this->P412->AdvancedSearch->SearchOperator = @$filter["z_P412"];
		$this->P412->AdvancedSearch->SearchCondition = @$filter["v_P412"];
		$this->P412->AdvancedSearch->SearchValue2 = @$filter["y_P412"];
		$this->P412->AdvancedSearch->SearchOperator2 = @$filter["w_P412"];
		$this->P412->AdvancedSearch->save();

		// Field P413
		$this->P413->AdvancedSearch->SearchValue = @$filter["x_P413"];
		$this->P413->AdvancedSearch->SearchOperator = @$filter["z_P413"];
		$this->P413->AdvancedSearch->SearchCondition = @$filter["v_P413"];
		$this->P413->AdvancedSearch->SearchValue2 = @$filter["y_P413"];
		$this->P413->AdvancedSearch->SearchOperator2 = @$filter["w_P413"];
		$this->P413->AdvancedSearch->save();

		// Field USGRt1
		$this->USGRt1->AdvancedSearch->SearchValue = @$filter["x_USGRt1"];
		$this->USGRt1->AdvancedSearch->SearchOperator = @$filter["z_USGRt1"];
		$this->USGRt1->AdvancedSearch->SearchCondition = @$filter["v_USGRt1"];
		$this->USGRt1->AdvancedSearch->SearchValue2 = @$filter["y_USGRt1"];
		$this->USGRt1->AdvancedSearch->SearchOperator2 = @$filter["w_USGRt1"];
		$this->USGRt1->AdvancedSearch->save();

		// Field USGRt2
		$this->USGRt2->AdvancedSearch->SearchValue = @$filter["x_USGRt2"];
		$this->USGRt2->AdvancedSearch->SearchOperator = @$filter["z_USGRt2"];
		$this->USGRt2->AdvancedSearch->SearchCondition = @$filter["v_USGRt2"];
		$this->USGRt2->AdvancedSearch->SearchValue2 = @$filter["y_USGRt2"];
		$this->USGRt2->AdvancedSearch->SearchOperator2 = @$filter["w_USGRt2"];
		$this->USGRt2->AdvancedSearch->save();

		// Field USGRt3
		$this->USGRt3->AdvancedSearch->SearchValue = @$filter["x_USGRt3"];
		$this->USGRt3->AdvancedSearch->SearchOperator = @$filter["z_USGRt3"];
		$this->USGRt3->AdvancedSearch->SearchCondition = @$filter["v_USGRt3"];
		$this->USGRt3->AdvancedSearch->SearchValue2 = @$filter["y_USGRt3"];
		$this->USGRt3->AdvancedSearch->SearchOperator2 = @$filter["w_USGRt3"];
		$this->USGRt3->AdvancedSearch->save();

		// Field USGRt4
		$this->USGRt4->AdvancedSearch->SearchValue = @$filter["x_USGRt4"];
		$this->USGRt4->AdvancedSearch->SearchOperator = @$filter["z_USGRt4"];
		$this->USGRt4->AdvancedSearch->SearchCondition = @$filter["v_USGRt4"];
		$this->USGRt4->AdvancedSearch->SearchValue2 = @$filter["y_USGRt4"];
		$this->USGRt4->AdvancedSearch->SearchOperator2 = @$filter["w_USGRt4"];
		$this->USGRt4->AdvancedSearch->save();

		// Field USGRt5
		$this->USGRt5->AdvancedSearch->SearchValue = @$filter["x_USGRt5"];
		$this->USGRt5->AdvancedSearch->SearchOperator = @$filter["z_USGRt5"];
		$this->USGRt5->AdvancedSearch->SearchCondition = @$filter["v_USGRt5"];
		$this->USGRt5->AdvancedSearch->SearchValue2 = @$filter["y_USGRt5"];
		$this->USGRt5->AdvancedSearch->SearchOperator2 = @$filter["w_USGRt5"];
		$this->USGRt5->AdvancedSearch->save();

		// Field USGRt6
		$this->USGRt6->AdvancedSearch->SearchValue = @$filter["x_USGRt6"];
		$this->USGRt6->AdvancedSearch->SearchOperator = @$filter["z_USGRt6"];
		$this->USGRt6->AdvancedSearch->SearchCondition = @$filter["v_USGRt6"];
		$this->USGRt6->AdvancedSearch->SearchValue2 = @$filter["y_USGRt6"];
		$this->USGRt6->AdvancedSearch->SearchOperator2 = @$filter["w_USGRt6"];
		$this->USGRt6->AdvancedSearch->save();

		// Field USGRt7
		$this->USGRt7->AdvancedSearch->SearchValue = @$filter["x_USGRt7"];
		$this->USGRt7->AdvancedSearch->SearchOperator = @$filter["z_USGRt7"];
		$this->USGRt7->AdvancedSearch->SearchCondition = @$filter["v_USGRt7"];
		$this->USGRt7->AdvancedSearch->SearchValue2 = @$filter["y_USGRt7"];
		$this->USGRt7->AdvancedSearch->SearchOperator2 = @$filter["w_USGRt7"];
		$this->USGRt7->AdvancedSearch->save();

		// Field USGRt8
		$this->USGRt8->AdvancedSearch->SearchValue = @$filter["x_USGRt8"];
		$this->USGRt8->AdvancedSearch->SearchOperator = @$filter["z_USGRt8"];
		$this->USGRt8->AdvancedSearch->SearchCondition = @$filter["v_USGRt8"];
		$this->USGRt8->AdvancedSearch->SearchValue2 = @$filter["y_USGRt8"];
		$this->USGRt8->AdvancedSearch->SearchOperator2 = @$filter["w_USGRt8"];
		$this->USGRt8->AdvancedSearch->save();

		// Field USGRt9
		$this->USGRt9->AdvancedSearch->SearchValue = @$filter["x_USGRt9"];
		$this->USGRt9->AdvancedSearch->SearchOperator = @$filter["z_USGRt9"];
		$this->USGRt9->AdvancedSearch->SearchCondition = @$filter["v_USGRt9"];
		$this->USGRt9->AdvancedSearch->SearchValue2 = @$filter["y_USGRt9"];
		$this->USGRt9->AdvancedSearch->SearchOperator2 = @$filter["w_USGRt9"];
		$this->USGRt9->AdvancedSearch->save();

		// Field USGRt10
		$this->USGRt10->AdvancedSearch->SearchValue = @$filter["x_USGRt10"];
		$this->USGRt10->AdvancedSearch->SearchOperator = @$filter["z_USGRt10"];
		$this->USGRt10->AdvancedSearch->SearchCondition = @$filter["v_USGRt10"];
		$this->USGRt10->AdvancedSearch->SearchValue2 = @$filter["y_USGRt10"];
		$this->USGRt10->AdvancedSearch->SearchOperator2 = @$filter["w_USGRt10"];
		$this->USGRt10->AdvancedSearch->save();

		// Field USGRt11
		$this->USGRt11->AdvancedSearch->SearchValue = @$filter["x_USGRt11"];
		$this->USGRt11->AdvancedSearch->SearchOperator = @$filter["z_USGRt11"];
		$this->USGRt11->AdvancedSearch->SearchCondition = @$filter["v_USGRt11"];
		$this->USGRt11->AdvancedSearch->SearchValue2 = @$filter["y_USGRt11"];
		$this->USGRt11->AdvancedSearch->SearchOperator2 = @$filter["w_USGRt11"];
		$this->USGRt11->AdvancedSearch->save();

		// Field USGRt12
		$this->USGRt12->AdvancedSearch->SearchValue = @$filter["x_USGRt12"];
		$this->USGRt12->AdvancedSearch->SearchOperator = @$filter["z_USGRt12"];
		$this->USGRt12->AdvancedSearch->SearchCondition = @$filter["v_USGRt12"];
		$this->USGRt12->AdvancedSearch->SearchValue2 = @$filter["y_USGRt12"];
		$this->USGRt12->AdvancedSearch->SearchOperator2 = @$filter["w_USGRt12"];
		$this->USGRt12->AdvancedSearch->save();

		// Field USGRt13
		$this->USGRt13->AdvancedSearch->SearchValue = @$filter["x_USGRt13"];
		$this->USGRt13->AdvancedSearch->SearchOperator = @$filter["z_USGRt13"];
		$this->USGRt13->AdvancedSearch->SearchCondition = @$filter["v_USGRt13"];
		$this->USGRt13->AdvancedSearch->SearchValue2 = @$filter["y_USGRt13"];
		$this->USGRt13->AdvancedSearch->SearchOperator2 = @$filter["w_USGRt13"];
		$this->USGRt13->AdvancedSearch->save();

		// Field USGLt1
		$this->USGLt1->AdvancedSearch->SearchValue = @$filter["x_USGLt1"];
		$this->USGLt1->AdvancedSearch->SearchOperator = @$filter["z_USGLt1"];
		$this->USGLt1->AdvancedSearch->SearchCondition = @$filter["v_USGLt1"];
		$this->USGLt1->AdvancedSearch->SearchValue2 = @$filter["y_USGLt1"];
		$this->USGLt1->AdvancedSearch->SearchOperator2 = @$filter["w_USGLt1"];
		$this->USGLt1->AdvancedSearch->save();

		// Field USGLt2
		$this->USGLt2->AdvancedSearch->SearchValue = @$filter["x_USGLt2"];
		$this->USGLt2->AdvancedSearch->SearchOperator = @$filter["z_USGLt2"];
		$this->USGLt2->AdvancedSearch->SearchCondition = @$filter["v_USGLt2"];
		$this->USGLt2->AdvancedSearch->SearchValue2 = @$filter["y_USGLt2"];
		$this->USGLt2->AdvancedSearch->SearchOperator2 = @$filter["w_USGLt2"];
		$this->USGLt2->AdvancedSearch->save();

		// Field USGLt3
		$this->USGLt3->AdvancedSearch->SearchValue = @$filter["x_USGLt3"];
		$this->USGLt3->AdvancedSearch->SearchOperator = @$filter["z_USGLt3"];
		$this->USGLt3->AdvancedSearch->SearchCondition = @$filter["v_USGLt3"];
		$this->USGLt3->AdvancedSearch->SearchValue2 = @$filter["y_USGLt3"];
		$this->USGLt3->AdvancedSearch->SearchOperator2 = @$filter["w_USGLt3"];
		$this->USGLt3->AdvancedSearch->save();

		// Field USGLt4
		$this->USGLt4->AdvancedSearch->SearchValue = @$filter["x_USGLt4"];
		$this->USGLt4->AdvancedSearch->SearchOperator = @$filter["z_USGLt4"];
		$this->USGLt4->AdvancedSearch->SearchCondition = @$filter["v_USGLt4"];
		$this->USGLt4->AdvancedSearch->SearchValue2 = @$filter["y_USGLt4"];
		$this->USGLt4->AdvancedSearch->SearchOperator2 = @$filter["w_USGLt4"];
		$this->USGLt4->AdvancedSearch->save();

		// Field USGLt5
		$this->USGLt5->AdvancedSearch->SearchValue = @$filter["x_USGLt5"];
		$this->USGLt5->AdvancedSearch->SearchOperator = @$filter["z_USGLt5"];
		$this->USGLt5->AdvancedSearch->SearchCondition = @$filter["v_USGLt5"];
		$this->USGLt5->AdvancedSearch->SearchValue2 = @$filter["y_USGLt5"];
		$this->USGLt5->AdvancedSearch->SearchOperator2 = @$filter["w_USGLt5"];
		$this->USGLt5->AdvancedSearch->save();

		// Field USGLt6
		$this->USGLt6->AdvancedSearch->SearchValue = @$filter["x_USGLt6"];
		$this->USGLt6->AdvancedSearch->SearchOperator = @$filter["z_USGLt6"];
		$this->USGLt6->AdvancedSearch->SearchCondition = @$filter["v_USGLt6"];
		$this->USGLt6->AdvancedSearch->SearchValue2 = @$filter["y_USGLt6"];
		$this->USGLt6->AdvancedSearch->SearchOperator2 = @$filter["w_USGLt6"];
		$this->USGLt6->AdvancedSearch->save();

		// Field USGLt7
		$this->USGLt7->AdvancedSearch->SearchValue = @$filter["x_USGLt7"];
		$this->USGLt7->AdvancedSearch->SearchOperator = @$filter["z_USGLt7"];
		$this->USGLt7->AdvancedSearch->SearchCondition = @$filter["v_USGLt7"];
		$this->USGLt7->AdvancedSearch->SearchValue2 = @$filter["y_USGLt7"];
		$this->USGLt7->AdvancedSearch->SearchOperator2 = @$filter["w_USGLt7"];
		$this->USGLt7->AdvancedSearch->save();

		// Field USGLt8
		$this->USGLt8->AdvancedSearch->SearchValue = @$filter["x_USGLt8"];
		$this->USGLt8->AdvancedSearch->SearchOperator = @$filter["z_USGLt8"];
		$this->USGLt8->AdvancedSearch->SearchCondition = @$filter["v_USGLt8"];
		$this->USGLt8->AdvancedSearch->SearchValue2 = @$filter["y_USGLt8"];
		$this->USGLt8->AdvancedSearch->SearchOperator2 = @$filter["w_USGLt8"];
		$this->USGLt8->AdvancedSearch->save();

		// Field USGLt9
		$this->USGLt9->AdvancedSearch->SearchValue = @$filter["x_USGLt9"];
		$this->USGLt9->AdvancedSearch->SearchOperator = @$filter["z_USGLt9"];
		$this->USGLt9->AdvancedSearch->SearchCondition = @$filter["v_USGLt9"];
		$this->USGLt9->AdvancedSearch->SearchValue2 = @$filter["y_USGLt9"];
		$this->USGLt9->AdvancedSearch->SearchOperator2 = @$filter["w_USGLt9"];
		$this->USGLt9->AdvancedSearch->save();

		// Field USGLt10
		$this->USGLt10->AdvancedSearch->SearchValue = @$filter["x_USGLt10"];
		$this->USGLt10->AdvancedSearch->SearchOperator = @$filter["z_USGLt10"];
		$this->USGLt10->AdvancedSearch->SearchCondition = @$filter["v_USGLt10"];
		$this->USGLt10->AdvancedSearch->SearchValue2 = @$filter["y_USGLt10"];
		$this->USGLt10->AdvancedSearch->SearchOperator2 = @$filter["w_USGLt10"];
		$this->USGLt10->AdvancedSearch->save();

		// Field USGLt11
		$this->USGLt11->AdvancedSearch->SearchValue = @$filter["x_USGLt11"];
		$this->USGLt11->AdvancedSearch->SearchOperator = @$filter["z_USGLt11"];
		$this->USGLt11->AdvancedSearch->SearchCondition = @$filter["v_USGLt11"];
		$this->USGLt11->AdvancedSearch->SearchValue2 = @$filter["y_USGLt11"];
		$this->USGLt11->AdvancedSearch->SearchOperator2 = @$filter["w_USGLt11"];
		$this->USGLt11->AdvancedSearch->save();

		// Field USGLt12
		$this->USGLt12->AdvancedSearch->SearchValue = @$filter["x_USGLt12"];
		$this->USGLt12->AdvancedSearch->SearchOperator = @$filter["z_USGLt12"];
		$this->USGLt12->AdvancedSearch->SearchCondition = @$filter["v_USGLt12"];
		$this->USGLt12->AdvancedSearch->SearchValue2 = @$filter["y_USGLt12"];
		$this->USGLt12->AdvancedSearch->SearchOperator2 = @$filter["w_USGLt12"];
		$this->USGLt12->AdvancedSearch->save();

		// Field USGLt13
		$this->USGLt13->AdvancedSearch->SearchValue = @$filter["x_USGLt13"];
		$this->USGLt13->AdvancedSearch->SearchOperator = @$filter["z_USGLt13"];
		$this->USGLt13->AdvancedSearch->SearchCondition = @$filter["v_USGLt13"];
		$this->USGLt13->AdvancedSearch->SearchValue2 = @$filter["y_USGLt13"];
		$this->USGLt13->AdvancedSearch->SearchOperator2 = @$filter["w_USGLt13"];
		$this->USGLt13->AdvancedSearch->save();

		// Field EM1
		$this->EM1->AdvancedSearch->SearchValue = @$filter["x_EM1"];
		$this->EM1->AdvancedSearch->SearchOperator = @$filter["z_EM1"];
		$this->EM1->AdvancedSearch->SearchCondition = @$filter["v_EM1"];
		$this->EM1->AdvancedSearch->SearchValue2 = @$filter["y_EM1"];
		$this->EM1->AdvancedSearch->SearchOperator2 = @$filter["w_EM1"];
		$this->EM1->AdvancedSearch->save();

		// Field EM2
		$this->EM2->AdvancedSearch->SearchValue = @$filter["x_EM2"];
		$this->EM2->AdvancedSearch->SearchOperator = @$filter["z_EM2"];
		$this->EM2->AdvancedSearch->SearchCondition = @$filter["v_EM2"];
		$this->EM2->AdvancedSearch->SearchValue2 = @$filter["y_EM2"];
		$this->EM2->AdvancedSearch->SearchOperator2 = @$filter["w_EM2"];
		$this->EM2->AdvancedSearch->save();

		// Field EM3
		$this->EM3->AdvancedSearch->SearchValue = @$filter["x_EM3"];
		$this->EM3->AdvancedSearch->SearchOperator = @$filter["z_EM3"];
		$this->EM3->AdvancedSearch->SearchCondition = @$filter["v_EM3"];
		$this->EM3->AdvancedSearch->SearchValue2 = @$filter["y_EM3"];
		$this->EM3->AdvancedSearch->SearchOperator2 = @$filter["w_EM3"];
		$this->EM3->AdvancedSearch->save();

		// Field EM4
		$this->EM4->AdvancedSearch->SearchValue = @$filter["x_EM4"];
		$this->EM4->AdvancedSearch->SearchOperator = @$filter["z_EM4"];
		$this->EM4->AdvancedSearch->SearchCondition = @$filter["v_EM4"];
		$this->EM4->AdvancedSearch->SearchValue2 = @$filter["y_EM4"];
		$this->EM4->AdvancedSearch->SearchOperator2 = @$filter["w_EM4"];
		$this->EM4->AdvancedSearch->save();

		// Field EM5
		$this->EM5->AdvancedSearch->SearchValue = @$filter["x_EM5"];
		$this->EM5->AdvancedSearch->SearchOperator = @$filter["z_EM5"];
		$this->EM5->AdvancedSearch->SearchCondition = @$filter["v_EM5"];
		$this->EM5->AdvancedSearch->SearchValue2 = @$filter["y_EM5"];
		$this->EM5->AdvancedSearch->SearchOperator2 = @$filter["w_EM5"];
		$this->EM5->AdvancedSearch->save();

		// Field EM6
		$this->EM6->AdvancedSearch->SearchValue = @$filter["x_EM6"];
		$this->EM6->AdvancedSearch->SearchOperator = @$filter["z_EM6"];
		$this->EM6->AdvancedSearch->SearchCondition = @$filter["v_EM6"];
		$this->EM6->AdvancedSearch->SearchValue2 = @$filter["y_EM6"];
		$this->EM6->AdvancedSearch->SearchOperator2 = @$filter["w_EM6"];
		$this->EM6->AdvancedSearch->save();

		// Field EM7
		$this->EM7->AdvancedSearch->SearchValue = @$filter["x_EM7"];
		$this->EM7->AdvancedSearch->SearchOperator = @$filter["z_EM7"];
		$this->EM7->AdvancedSearch->SearchCondition = @$filter["v_EM7"];
		$this->EM7->AdvancedSearch->SearchValue2 = @$filter["y_EM7"];
		$this->EM7->AdvancedSearch->SearchOperator2 = @$filter["w_EM7"];
		$this->EM7->AdvancedSearch->save();

		// Field EM8
		$this->EM8->AdvancedSearch->SearchValue = @$filter["x_EM8"];
		$this->EM8->AdvancedSearch->SearchOperator = @$filter["z_EM8"];
		$this->EM8->AdvancedSearch->SearchCondition = @$filter["v_EM8"];
		$this->EM8->AdvancedSearch->SearchValue2 = @$filter["y_EM8"];
		$this->EM8->AdvancedSearch->SearchOperator2 = @$filter["w_EM8"];
		$this->EM8->AdvancedSearch->save();

		// Field EM9
		$this->EM9->AdvancedSearch->SearchValue = @$filter["x_EM9"];
		$this->EM9->AdvancedSearch->SearchOperator = @$filter["z_EM9"];
		$this->EM9->AdvancedSearch->SearchCondition = @$filter["v_EM9"];
		$this->EM9->AdvancedSearch->SearchValue2 = @$filter["y_EM9"];
		$this->EM9->AdvancedSearch->SearchOperator2 = @$filter["w_EM9"];
		$this->EM9->AdvancedSearch->save();

		// Field EM10
		$this->EM10->AdvancedSearch->SearchValue = @$filter["x_EM10"];
		$this->EM10->AdvancedSearch->SearchOperator = @$filter["z_EM10"];
		$this->EM10->AdvancedSearch->SearchCondition = @$filter["v_EM10"];
		$this->EM10->AdvancedSearch->SearchValue2 = @$filter["y_EM10"];
		$this->EM10->AdvancedSearch->SearchOperator2 = @$filter["w_EM10"];
		$this->EM10->AdvancedSearch->save();

		// Field EM11
		$this->EM11->AdvancedSearch->SearchValue = @$filter["x_EM11"];
		$this->EM11->AdvancedSearch->SearchOperator = @$filter["z_EM11"];
		$this->EM11->AdvancedSearch->SearchCondition = @$filter["v_EM11"];
		$this->EM11->AdvancedSearch->SearchValue2 = @$filter["y_EM11"];
		$this->EM11->AdvancedSearch->SearchOperator2 = @$filter["w_EM11"];
		$this->EM11->AdvancedSearch->save();

		// Field EM12
		$this->EM12->AdvancedSearch->SearchValue = @$filter["x_EM12"];
		$this->EM12->AdvancedSearch->SearchOperator = @$filter["z_EM12"];
		$this->EM12->AdvancedSearch->SearchCondition = @$filter["v_EM12"];
		$this->EM12->AdvancedSearch->SearchValue2 = @$filter["y_EM12"];
		$this->EM12->AdvancedSearch->SearchOperator2 = @$filter["w_EM12"];
		$this->EM12->AdvancedSearch->save();

		// Field EM13
		$this->EM13->AdvancedSearch->SearchValue = @$filter["x_EM13"];
		$this->EM13->AdvancedSearch->SearchOperator = @$filter["z_EM13"];
		$this->EM13->AdvancedSearch->SearchCondition = @$filter["v_EM13"];
		$this->EM13->AdvancedSearch->SearchValue2 = @$filter["y_EM13"];
		$this->EM13->AdvancedSearch->SearchOperator2 = @$filter["w_EM13"];
		$this->EM13->AdvancedSearch->save();

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

		// Field Others3
		$this->Others3->AdvancedSearch->SearchValue = @$filter["x_Others3"];
		$this->Others3->AdvancedSearch->SearchOperator = @$filter["z_Others3"];
		$this->Others3->AdvancedSearch->SearchCondition = @$filter["v_Others3"];
		$this->Others3->AdvancedSearch->SearchValue2 = @$filter["y_Others3"];
		$this->Others3->AdvancedSearch->SearchOperator2 = @$filter["w_Others3"];
		$this->Others3->AdvancedSearch->save();

		// Field Others4
		$this->Others4->AdvancedSearch->SearchValue = @$filter["x_Others4"];
		$this->Others4->AdvancedSearch->SearchOperator = @$filter["z_Others4"];
		$this->Others4->AdvancedSearch->SearchCondition = @$filter["v_Others4"];
		$this->Others4->AdvancedSearch->SearchValue2 = @$filter["y_Others4"];
		$this->Others4->AdvancedSearch->SearchOperator2 = @$filter["w_Others4"];
		$this->Others4->AdvancedSearch->save();

		// Field Others5
		$this->Others5->AdvancedSearch->SearchValue = @$filter["x_Others5"];
		$this->Others5->AdvancedSearch->SearchOperator = @$filter["z_Others5"];
		$this->Others5->AdvancedSearch->SearchCondition = @$filter["v_Others5"];
		$this->Others5->AdvancedSearch->SearchValue2 = @$filter["y_Others5"];
		$this->Others5->AdvancedSearch->SearchOperator2 = @$filter["w_Others5"];
		$this->Others5->AdvancedSearch->save();

		// Field Others6
		$this->Others6->AdvancedSearch->SearchValue = @$filter["x_Others6"];
		$this->Others6->AdvancedSearch->SearchOperator = @$filter["z_Others6"];
		$this->Others6->AdvancedSearch->SearchCondition = @$filter["v_Others6"];
		$this->Others6->AdvancedSearch->SearchValue2 = @$filter["y_Others6"];
		$this->Others6->AdvancedSearch->SearchOperator2 = @$filter["w_Others6"];
		$this->Others6->AdvancedSearch->save();

		// Field Others7
		$this->Others7->AdvancedSearch->SearchValue = @$filter["x_Others7"];
		$this->Others7->AdvancedSearch->SearchOperator = @$filter["z_Others7"];
		$this->Others7->AdvancedSearch->SearchCondition = @$filter["v_Others7"];
		$this->Others7->AdvancedSearch->SearchValue2 = @$filter["y_Others7"];
		$this->Others7->AdvancedSearch->SearchOperator2 = @$filter["w_Others7"];
		$this->Others7->AdvancedSearch->save();

		// Field Others8
		$this->Others8->AdvancedSearch->SearchValue = @$filter["x_Others8"];
		$this->Others8->AdvancedSearch->SearchOperator = @$filter["z_Others8"];
		$this->Others8->AdvancedSearch->SearchCondition = @$filter["v_Others8"];
		$this->Others8->AdvancedSearch->SearchValue2 = @$filter["y_Others8"];
		$this->Others8->AdvancedSearch->SearchOperator2 = @$filter["w_Others8"];
		$this->Others8->AdvancedSearch->save();

		// Field Others9
		$this->Others9->AdvancedSearch->SearchValue = @$filter["x_Others9"];
		$this->Others9->AdvancedSearch->SearchOperator = @$filter["z_Others9"];
		$this->Others9->AdvancedSearch->SearchCondition = @$filter["v_Others9"];
		$this->Others9->AdvancedSearch->SearchValue2 = @$filter["y_Others9"];
		$this->Others9->AdvancedSearch->SearchOperator2 = @$filter["w_Others9"];
		$this->Others9->AdvancedSearch->save();

		// Field Others10
		$this->Others10->AdvancedSearch->SearchValue = @$filter["x_Others10"];
		$this->Others10->AdvancedSearch->SearchOperator = @$filter["z_Others10"];
		$this->Others10->AdvancedSearch->SearchCondition = @$filter["v_Others10"];
		$this->Others10->AdvancedSearch->SearchValue2 = @$filter["y_Others10"];
		$this->Others10->AdvancedSearch->SearchOperator2 = @$filter["w_Others10"];
		$this->Others10->AdvancedSearch->save();

		// Field Others11
		$this->Others11->AdvancedSearch->SearchValue = @$filter["x_Others11"];
		$this->Others11->AdvancedSearch->SearchOperator = @$filter["z_Others11"];
		$this->Others11->AdvancedSearch->SearchCondition = @$filter["v_Others11"];
		$this->Others11->AdvancedSearch->SearchValue2 = @$filter["y_Others11"];
		$this->Others11->AdvancedSearch->SearchOperator2 = @$filter["w_Others11"];
		$this->Others11->AdvancedSearch->save();

		// Field Others12
		$this->Others12->AdvancedSearch->SearchValue = @$filter["x_Others12"];
		$this->Others12->AdvancedSearch->SearchOperator = @$filter["z_Others12"];
		$this->Others12->AdvancedSearch->SearchCondition = @$filter["v_Others12"];
		$this->Others12->AdvancedSearch->SearchValue2 = @$filter["y_Others12"];
		$this->Others12->AdvancedSearch->SearchOperator2 = @$filter["w_Others12"];
		$this->Others12->AdvancedSearch->save();

		// Field Others13
		$this->Others13->AdvancedSearch->SearchValue = @$filter["x_Others13"];
		$this->Others13->AdvancedSearch->SearchOperator = @$filter["z_Others13"];
		$this->Others13->AdvancedSearch->SearchCondition = @$filter["v_Others13"];
		$this->Others13->AdvancedSearch->SearchValue2 = @$filter["y_Others13"];
		$this->Others13->AdvancedSearch->SearchOperator2 = @$filter["w_Others13"];
		$this->Others13->AdvancedSearch->save();

		// Field DR1
		$this->DR1->AdvancedSearch->SearchValue = @$filter["x_DR1"];
		$this->DR1->AdvancedSearch->SearchOperator = @$filter["z_DR1"];
		$this->DR1->AdvancedSearch->SearchCondition = @$filter["v_DR1"];
		$this->DR1->AdvancedSearch->SearchValue2 = @$filter["y_DR1"];
		$this->DR1->AdvancedSearch->SearchOperator2 = @$filter["w_DR1"];
		$this->DR1->AdvancedSearch->save();

		// Field DR2
		$this->DR2->AdvancedSearch->SearchValue = @$filter["x_DR2"];
		$this->DR2->AdvancedSearch->SearchOperator = @$filter["z_DR2"];
		$this->DR2->AdvancedSearch->SearchCondition = @$filter["v_DR2"];
		$this->DR2->AdvancedSearch->SearchValue2 = @$filter["y_DR2"];
		$this->DR2->AdvancedSearch->SearchOperator2 = @$filter["w_DR2"];
		$this->DR2->AdvancedSearch->save();

		// Field DR3
		$this->DR3->AdvancedSearch->SearchValue = @$filter["x_DR3"];
		$this->DR3->AdvancedSearch->SearchOperator = @$filter["z_DR3"];
		$this->DR3->AdvancedSearch->SearchCondition = @$filter["v_DR3"];
		$this->DR3->AdvancedSearch->SearchValue2 = @$filter["y_DR3"];
		$this->DR3->AdvancedSearch->SearchOperator2 = @$filter["w_DR3"];
		$this->DR3->AdvancedSearch->save();

		// Field DR4
		$this->DR4->AdvancedSearch->SearchValue = @$filter["x_DR4"];
		$this->DR4->AdvancedSearch->SearchOperator = @$filter["z_DR4"];
		$this->DR4->AdvancedSearch->SearchCondition = @$filter["v_DR4"];
		$this->DR4->AdvancedSearch->SearchValue2 = @$filter["y_DR4"];
		$this->DR4->AdvancedSearch->SearchOperator2 = @$filter["w_DR4"];
		$this->DR4->AdvancedSearch->save();

		// Field DR5
		$this->DR5->AdvancedSearch->SearchValue = @$filter["x_DR5"];
		$this->DR5->AdvancedSearch->SearchOperator = @$filter["z_DR5"];
		$this->DR5->AdvancedSearch->SearchCondition = @$filter["v_DR5"];
		$this->DR5->AdvancedSearch->SearchValue2 = @$filter["y_DR5"];
		$this->DR5->AdvancedSearch->SearchOperator2 = @$filter["w_DR5"];
		$this->DR5->AdvancedSearch->save();

		// Field DR6
		$this->DR6->AdvancedSearch->SearchValue = @$filter["x_DR6"];
		$this->DR6->AdvancedSearch->SearchOperator = @$filter["z_DR6"];
		$this->DR6->AdvancedSearch->SearchCondition = @$filter["v_DR6"];
		$this->DR6->AdvancedSearch->SearchValue2 = @$filter["y_DR6"];
		$this->DR6->AdvancedSearch->SearchOperator2 = @$filter["w_DR6"];
		$this->DR6->AdvancedSearch->save();

		// Field DR7
		$this->DR7->AdvancedSearch->SearchValue = @$filter["x_DR7"];
		$this->DR7->AdvancedSearch->SearchOperator = @$filter["z_DR7"];
		$this->DR7->AdvancedSearch->SearchCondition = @$filter["v_DR7"];
		$this->DR7->AdvancedSearch->SearchValue2 = @$filter["y_DR7"];
		$this->DR7->AdvancedSearch->SearchOperator2 = @$filter["w_DR7"];
		$this->DR7->AdvancedSearch->save();

		// Field DR8
		$this->DR8->AdvancedSearch->SearchValue = @$filter["x_DR8"];
		$this->DR8->AdvancedSearch->SearchOperator = @$filter["z_DR8"];
		$this->DR8->AdvancedSearch->SearchCondition = @$filter["v_DR8"];
		$this->DR8->AdvancedSearch->SearchValue2 = @$filter["y_DR8"];
		$this->DR8->AdvancedSearch->SearchOperator2 = @$filter["w_DR8"];
		$this->DR8->AdvancedSearch->save();

		// Field DR9
		$this->DR9->AdvancedSearch->SearchValue = @$filter["x_DR9"];
		$this->DR9->AdvancedSearch->SearchOperator = @$filter["z_DR9"];
		$this->DR9->AdvancedSearch->SearchCondition = @$filter["v_DR9"];
		$this->DR9->AdvancedSearch->SearchValue2 = @$filter["y_DR9"];
		$this->DR9->AdvancedSearch->SearchOperator2 = @$filter["w_DR9"];
		$this->DR9->AdvancedSearch->save();

		// Field DR10
		$this->DR10->AdvancedSearch->SearchValue = @$filter["x_DR10"];
		$this->DR10->AdvancedSearch->SearchOperator = @$filter["z_DR10"];
		$this->DR10->AdvancedSearch->SearchCondition = @$filter["v_DR10"];
		$this->DR10->AdvancedSearch->SearchValue2 = @$filter["y_DR10"];
		$this->DR10->AdvancedSearch->SearchOperator2 = @$filter["w_DR10"];
		$this->DR10->AdvancedSearch->save();

		// Field DR11
		$this->DR11->AdvancedSearch->SearchValue = @$filter["x_DR11"];
		$this->DR11->AdvancedSearch->SearchOperator = @$filter["z_DR11"];
		$this->DR11->AdvancedSearch->SearchCondition = @$filter["v_DR11"];
		$this->DR11->AdvancedSearch->SearchValue2 = @$filter["y_DR11"];
		$this->DR11->AdvancedSearch->SearchOperator2 = @$filter["w_DR11"];
		$this->DR11->AdvancedSearch->save();

		// Field DR12
		$this->DR12->AdvancedSearch->SearchValue = @$filter["x_DR12"];
		$this->DR12->AdvancedSearch->SearchOperator = @$filter["z_DR12"];
		$this->DR12->AdvancedSearch->SearchCondition = @$filter["v_DR12"];
		$this->DR12->AdvancedSearch->SearchValue2 = @$filter["y_DR12"];
		$this->DR12->AdvancedSearch->SearchOperator2 = @$filter["w_DR12"];
		$this->DR12->AdvancedSearch->save();

		// Field DR13
		$this->DR13->AdvancedSearch->SearchValue = @$filter["x_DR13"];
		$this->DR13->AdvancedSearch->SearchOperator = @$filter["z_DR13"];
		$this->DR13->AdvancedSearch->SearchCondition = @$filter["v_DR13"];
		$this->DR13->AdvancedSearch->SearchValue2 = @$filter["y_DR13"];
		$this->DR13->AdvancedSearch->SearchOperator2 = @$filter["w_DR13"];
		$this->DR13->AdvancedSearch->save();

		// Field DOCTORRESPONSIBLE
		$this->DOCTORRESPONSIBLE->AdvancedSearch->SearchValue = @$filter["x_DOCTORRESPONSIBLE"];
		$this->DOCTORRESPONSIBLE->AdvancedSearch->SearchOperator = @$filter["z_DOCTORRESPONSIBLE"];
		$this->DOCTORRESPONSIBLE->AdvancedSearch->SearchCondition = @$filter["v_DOCTORRESPONSIBLE"];
		$this->DOCTORRESPONSIBLE->AdvancedSearch->SearchValue2 = @$filter["y_DOCTORRESPONSIBLE"];
		$this->DOCTORRESPONSIBLE->AdvancedSearch->SearchOperator2 = @$filter["w_DOCTORRESPONSIBLE"];
		$this->DOCTORRESPONSIBLE->AdvancedSearch->save();

		// Field TidNo
		$this->TidNo->AdvancedSearch->SearchValue = @$filter["x_TidNo"];
		$this->TidNo->AdvancedSearch->SearchOperator = @$filter["z_TidNo"];
		$this->TidNo->AdvancedSearch->SearchCondition = @$filter["v_TidNo"];
		$this->TidNo->AdvancedSearch->SearchValue2 = @$filter["y_TidNo"];
		$this->TidNo->AdvancedSearch->SearchOperator2 = @$filter["w_TidNo"];
		$this->TidNo->AdvancedSearch->save();

		// Field Convert
		$this->Convert->AdvancedSearch->SearchValue = @$filter["x_Convert"];
		$this->Convert->AdvancedSearch->SearchOperator = @$filter["z_Convert"];
		$this->Convert->AdvancedSearch->SearchCondition = @$filter["v_Convert"];
		$this->Convert->AdvancedSearch->SearchValue2 = @$filter["y_Convert"];
		$this->Convert->AdvancedSearch->SearchOperator2 = @$filter["w_Convert"];
		$this->Convert->AdvancedSearch->save();

		// Field Consultant
		$this->Consultant->AdvancedSearch->SearchValue = @$filter["x_Consultant"];
		$this->Consultant->AdvancedSearch->SearchOperator = @$filter["z_Consultant"];
		$this->Consultant->AdvancedSearch->SearchCondition = @$filter["v_Consultant"];
		$this->Consultant->AdvancedSearch->SearchValue2 = @$filter["y_Consultant"];
		$this->Consultant->AdvancedSearch->SearchOperator2 = @$filter["w_Consultant"];
		$this->Consultant->AdvancedSearch->save();

		// Field InseminatinTechnique
		$this->InseminatinTechnique->AdvancedSearch->SearchValue = @$filter["x_InseminatinTechnique"];
		$this->InseminatinTechnique->AdvancedSearch->SearchOperator = @$filter["z_InseminatinTechnique"];
		$this->InseminatinTechnique->AdvancedSearch->SearchCondition = @$filter["v_InseminatinTechnique"];
		$this->InseminatinTechnique->AdvancedSearch->SearchValue2 = @$filter["y_InseminatinTechnique"];
		$this->InseminatinTechnique->AdvancedSearch->SearchOperator2 = @$filter["w_InseminatinTechnique"];
		$this->InseminatinTechnique->AdvancedSearch->save();

		// Field IndicationForART
		$this->IndicationForART->AdvancedSearch->SearchValue = @$filter["x_IndicationForART"];
		$this->IndicationForART->AdvancedSearch->SearchOperator = @$filter["z_IndicationForART"];
		$this->IndicationForART->AdvancedSearch->SearchCondition = @$filter["v_IndicationForART"];
		$this->IndicationForART->AdvancedSearch->SearchValue2 = @$filter["y_IndicationForART"];
		$this->IndicationForART->AdvancedSearch->SearchOperator2 = @$filter["w_IndicationForART"];
		$this->IndicationForART->AdvancedSearch->save();

		// Field Hysteroscopy
		$this->Hysteroscopy->AdvancedSearch->SearchValue = @$filter["x_Hysteroscopy"];
		$this->Hysteroscopy->AdvancedSearch->SearchOperator = @$filter["z_Hysteroscopy"];
		$this->Hysteroscopy->AdvancedSearch->SearchCondition = @$filter["v_Hysteroscopy"];
		$this->Hysteroscopy->AdvancedSearch->SearchValue2 = @$filter["y_Hysteroscopy"];
		$this->Hysteroscopy->AdvancedSearch->SearchOperator2 = @$filter["w_Hysteroscopy"];
		$this->Hysteroscopy->AdvancedSearch->save();

		// Field EndometrialScratching
		$this->EndometrialScratching->AdvancedSearch->SearchValue = @$filter["x_EndometrialScratching"];
		$this->EndometrialScratching->AdvancedSearch->SearchOperator = @$filter["z_EndometrialScratching"];
		$this->EndometrialScratching->AdvancedSearch->SearchCondition = @$filter["v_EndometrialScratching"];
		$this->EndometrialScratching->AdvancedSearch->SearchValue2 = @$filter["y_EndometrialScratching"];
		$this->EndometrialScratching->AdvancedSearch->SearchOperator2 = @$filter["w_EndometrialScratching"];
		$this->EndometrialScratching->AdvancedSearch->save();

		// Field TrialCannulation
		$this->TrialCannulation->AdvancedSearch->SearchValue = @$filter["x_TrialCannulation"];
		$this->TrialCannulation->AdvancedSearch->SearchOperator = @$filter["z_TrialCannulation"];
		$this->TrialCannulation->AdvancedSearch->SearchCondition = @$filter["v_TrialCannulation"];
		$this->TrialCannulation->AdvancedSearch->SearchValue2 = @$filter["y_TrialCannulation"];
		$this->TrialCannulation->AdvancedSearch->SearchOperator2 = @$filter["w_TrialCannulation"];
		$this->TrialCannulation->AdvancedSearch->save();

		// Field CYCLETYPE
		$this->CYCLETYPE->AdvancedSearch->SearchValue = @$filter["x_CYCLETYPE"];
		$this->CYCLETYPE->AdvancedSearch->SearchOperator = @$filter["z_CYCLETYPE"];
		$this->CYCLETYPE->AdvancedSearch->SearchCondition = @$filter["v_CYCLETYPE"];
		$this->CYCLETYPE->AdvancedSearch->SearchValue2 = @$filter["y_CYCLETYPE"];
		$this->CYCLETYPE->AdvancedSearch->SearchOperator2 = @$filter["w_CYCLETYPE"];
		$this->CYCLETYPE->AdvancedSearch->save();

		// Field HRTCYCLE
		$this->HRTCYCLE->AdvancedSearch->SearchValue = @$filter["x_HRTCYCLE"];
		$this->HRTCYCLE->AdvancedSearch->SearchOperator = @$filter["z_HRTCYCLE"];
		$this->HRTCYCLE->AdvancedSearch->SearchCondition = @$filter["v_HRTCYCLE"];
		$this->HRTCYCLE->AdvancedSearch->SearchValue2 = @$filter["y_HRTCYCLE"];
		$this->HRTCYCLE->AdvancedSearch->SearchOperator2 = @$filter["w_HRTCYCLE"];
		$this->HRTCYCLE->AdvancedSearch->save();

		// Field OralEstrogenDosage
		$this->OralEstrogenDosage->AdvancedSearch->SearchValue = @$filter["x_OralEstrogenDosage"];
		$this->OralEstrogenDosage->AdvancedSearch->SearchOperator = @$filter["z_OralEstrogenDosage"];
		$this->OralEstrogenDosage->AdvancedSearch->SearchCondition = @$filter["v_OralEstrogenDosage"];
		$this->OralEstrogenDosage->AdvancedSearch->SearchValue2 = @$filter["y_OralEstrogenDosage"];
		$this->OralEstrogenDosage->AdvancedSearch->SearchOperator2 = @$filter["w_OralEstrogenDosage"];
		$this->OralEstrogenDosage->AdvancedSearch->save();

		// Field VaginalEstrogen
		$this->VaginalEstrogen->AdvancedSearch->SearchValue = @$filter["x_VaginalEstrogen"];
		$this->VaginalEstrogen->AdvancedSearch->SearchOperator = @$filter["z_VaginalEstrogen"];
		$this->VaginalEstrogen->AdvancedSearch->SearchCondition = @$filter["v_VaginalEstrogen"];
		$this->VaginalEstrogen->AdvancedSearch->SearchValue2 = @$filter["y_VaginalEstrogen"];
		$this->VaginalEstrogen->AdvancedSearch->SearchOperator2 = @$filter["w_VaginalEstrogen"];
		$this->VaginalEstrogen->AdvancedSearch->save();

		// Field GCSF
		$this->GCSF->AdvancedSearch->SearchValue = @$filter["x_GCSF"];
		$this->GCSF->AdvancedSearch->SearchOperator = @$filter["z_GCSF"];
		$this->GCSF->AdvancedSearch->SearchCondition = @$filter["v_GCSF"];
		$this->GCSF->AdvancedSearch->SearchValue2 = @$filter["y_GCSF"];
		$this->GCSF->AdvancedSearch->SearchOperator2 = @$filter["w_GCSF"];
		$this->GCSF->AdvancedSearch->save();

		// Field ActivatedPRP
		$this->ActivatedPRP->AdvancedSearch->SearchValue = @$filter["x_ActivatedPRP"];
		$this->ActivatedPRP->AdvancedSearch->SearchOperator = @$filter["z_ActivatedPRP"];
		$this->ActivatedPRP->AdvancedSearch->SearchCondition = @$filter["v_ActivatedPRP"];
		$this->ActivatedPRP->AdvancedSearch->SearchValue2 = @$filter["y_ActivatedPRP"];
		$this->ActivatedPRP->AdvancedSearch->SearchOperator2 = @$filter["w_ActivatedPRP"];
		$this->ActivatedPRP->AdvancedSearch->save();

		// Field UCLcm
		$this->UCLcm->AdvancedSearch->SearchValue = @$filter["x_UCLcm"];
		$this->UCLcm->AdvancedSearch->SearchOperator = @$filter["z_UCLcm"];
		$this->UCLcm->AdvancedSearch->SearchCondition = @$filter["v_UCLcm"];
		$this->UCLcm->AdvancedSearch->SearchValue2 = @$filter["y_UCLcm"];
		$this->UCLcm->AdvancedSearch->SearchOperator2 = @$filter["w_UCLcm"];
		$this->UCLcm->AdvancedSearch->save();

		// Field DATOFEMBRYOTRANSFER
		$this->DATOFEMBRYOTRANSFER->AdvancedSearch->SearchValue = @$filter["x_DATOFEMBRYOTRANSFER"];
		$this->DATOFEMBRYOTRANSFER->AdvancedSearch->SearchOperator = @$filter["z_DATOFEMBRYOTRANSFER"];
		$this->DATOFEMBRYOTRANSFER->AdvancedSearch->SearchCondition = @$filter["v_DATOFEMBRYOTRANSFER"];
		$this->DATOFEMBRYOTRANSFER->AdvancedSearch->SearchValue2 = @$filter["y_DATOFEMBRYOTRANSFER"];
		$this->DATOFEMBRYOTRANSFER->AdvancedSearch->SearchOperator2 = @$filter["w_DATOFEMBRYOTRANSFER"];
		$this->DATOFEMBRYOTRANSFER->AdvancedSearch->save();

		// Field DAYOFEMBRYOTRANSFER
		$this->DAYOFEMBRYOTRANSFER->AdvancedSearch->SearchValue = @$filter["x_DAYOFEMBRYOTRANSFER"];
		$this->DAYOFEMBRYOTRANSFER->AdvancedSearch->SearchOperator = @$filter["z_DAYOFEMBRYOTRANSFER"];
		$this->DAYOFEMBRYOTRANSFER->AdvancedSearch->SearchCondition = @$filter["v_DAYOFEMBRYOTRANSFER"];
		$this->DAYOFEMBRYOTRANSFER->AdvancedSearch->SearchValue2 = @$filter["y_DAYOFEMBRYOTRANSFER"];
		$this->DAYOFEMBRYOTRANSFER->AdvancedSearch->SearchOperator2 = @$filter["w_DAYOFEMBRYOTRANSFER"];
		$this->DAYOFEMBRYOTRANSFER->AdvancedSearch->save();

		// Field NOOFEMBRYOSTHAWED
		$this->NOOFEMBRYOSTHAWED->AdvancedSearch->SearchValue = @$filter["x_NOOFEMBRYOSTHAWED"];
		$this->NOOFEMBRYOSTHAWED->AdvancedSearch->SearchOperator = @$filter["z_NOOFEMBRYOSTHAWED"];
		$this->NOOFEMBRYOSTHAWED->AdvancedSearch->SearchCondition = @$filter["v_NOOFEMBRYOSTHAWED"];
		$this->NOOFEMBRYOSTHAWED->AdvancedSearch->SearchValue2 = @$filter["y_NOOFEMBRYOSTHAWED"];
		$this->NOOFEMBRYOSTHAWED->AdvancedSearch->SearchOperator2 = @$filter["w_NOOFEMBRYOSTHAWED"];
		$this->NOOFEMBRYOSTHAWED->AdvancedSearch->save();

		// Field NOOFEMBRYOSTRANSFERRED
		$this->NOOFEMBRYOSTRANSFERRED->AdvancedSearch->SearchValue = @$filter["x_NOOFEMBRYOSTRANSFERRED"];
		$this->NOOFEMBRYOSTRANSFERRED->AdvancedSearch->SearchOperator = @$filter["z_NOOFEMBRYOSTRANSFERRED"];
		$this->NOOFEMBRYOSTRANSFERRED->AdvancedSearch->SearchCondition = @$filter["v_NOOFEMBRYOSTRANSFERRED"];
		$this->NOOFEMBRYOSTRANSFERRED->AdvancedSearch->SearchValue2 = @$filter["y_NOOFEMBRYOSTRANSFERRED"];
		$this->NOOFEMBRYOSTRANSFERRED->AdvancedSearch->SearchOperator2 = @$filter["w_NOOFEMBRYOSTRANSFERRED"];
		$this->NOOFEMBRYOSTRANSFERRED->AdvancedSearch->save();

		// Field DAYOFEMBRYOS
		$this->DAYOFEMBRYOS->AdvancedSearch->SearchValue = @$filter["x_DAYOFEMBRYOS"];
		$this->DAYOFEMBRYOS->AdvancedSearch->SearchOperator = @$filter["z_DAYOFEMBRYOS"];
		$this->DAYOFEMBRYOS->AdvancedSearch->SearchCondition = @$filter["v_DAYOFEMBRYOS"];
		$this->DAYOFEMBRYOS->AdvancedSearch->SearchValue2 = @$filter["y_DAYOFEMBRYOS"];
		$this->DAYOFEMBRYOS->AdvancedSearch->SearchOperator2 = @$filter["w_DAYOFEMBRYOS"];
		$this->DAYOFEMBRYOS->AdvancedSearch->save();

		// Field CRYOPRESERVEDEMBRYOS
		$this->CRYOPRESERVEDEMBRYOS->AdvancedSearch->SearchValue = @$filter["x_CRYOPRESERVEDEMBRYOS"];
		$this->CRYOPRESERVEDEMBRYOS->AdvancedSearch->SearchOperator = @$filter["z_CRYOPRESERVEDEMBRYOS"];
		$this->CRYOPRESERVEDEMBRYOS->AdvancedSearch->SearchCondition = @$filter["v_CRYOPRESERVEDEMBRYOS"];
		$this->CRYOPRESERVEDEMBRYOS->AdvancedSearch->SearchValue2 = @$filter["y_CRYOPRESERVEDEMBRYOS"];
		$this->CRYOPRESERVEDEMBRYOS->AdvancedSearch->SearchOperator2 = @$filter["w_CRYOPRESERVEDEMBRYOS"];
		$this->CRYOPRESERVEDEMBRYOS->AdvancedSearch->save();

		// Field ViaAdmin
		$this->ViaAdmin->AdvancedSearch->SearchValue = @$filter["x_ViaAdmin"];
		$this->ViaAdmin->AdvancedSearch->SearchOperator = @$filter["z_ViaAdmin"];
		$this->ViaAdmin->AdvancedSearch->SearchCondition = @$filter["v_ViaAdmin"];
		$this->ViaAdmin->AdvancedSearch->SearchValue2 = @$filter["y_ViaAdmin"];
		$this->ViaAdmin->AdvancedSearch->SearchOperator2 = @$filter["w_ViaAdmin"];
		$this->ViaAdmin->AdvancedSearch->save();

		// Field ViaStartDateTime
		$this->ViaStartDateTime->AdvancedSearch->SearchValue = @$filter["x_ViaStartDateTime"];
		$this->ViaStartDateTime->AdvancedSearch->SearchOperator = @$filter["z_ViaStartDateTime"];
		$this->ViaStartDateTime->AdvancedSearch->SearchCondition = @$filter["v_ViaStartDateTime"];
		$this->ViaStartDateTime->AdvancedSearch->SearchValue2 = @$filter["y_ViaStartDateTime"];
		$this->ViaStartDateTime->AdvancedSearch->SearchOperator2 = @$filter["w_ViaStartDateTime"];
		$this->ViaStartDateTime->AdvancedSearch->save();

		// Field ViaDose
		$this->ViaDose->AdvancedSearch->SearchValue = @$filter["x_ViaDose"];
		$this->ViaDose->AdvancedSearch->SearchOperator = @$filter["z_ViaDose"];
		$this->ViaDose->AdvancedSearch->SearchCondition = @$filter["v_ViaDose"];
		$this->ViaDose->AdvancedSearch->SearchValue2 = @$filter["y_ViaDose"];
		$this->ViaDose->AdvancedSearch->SearchOperator2 = @$filter["w_ViaDose"];
		$this->ViaDose->AdvancedSearch->save();

		// Field AllFreeze
		$this->AllFreeze->AdvancedSearch->SearchValue = @$filter["x_AllFreeze"];
		$this->AllFreeze->AdvancedSearch->SearchOperator = @$filter["z_AllFreeze"];
		$this->AllFreeze->AdvancedSearch->SearchCondition = @$filter["v_AllFreeze"];
		$this->AllFreeze->AdvancedSearch->SearchValue2 = @$filter["y_AllFreeze"];
		$this->AllFreeze->AdvancedSearch->SearchOperator2 = @$filter["w_AllFreeze"];
		$this->AllFreeze->AdvancedSearch->save();

		// Field TreatmentCancel
		$this->TreatmentCancel->AdvancedSearch->SearchValue = @$filter["x_TreatmentCancel"];
		$this->TreatmentCancel->AdvancedSearch->SearchOperator = @$filter["z_TreatmentCancel"];
		$this->TreatmentCancel->AdvancedSearch->SearchCondition = @$filter["v_TreatmentCancel"];
		$this->TreatmentCancel->AdvancedSearch->SearchValue2 = @$filter["y_TreatmentCancel"];
		$this->TreatmentCancel->AdvancedSearch->SearchOperator2 = @$filter["w_TreatmentCancel"];
		$this->TreatmentCancel->AdvancedSearch->save();

		// Field Reason
		$this->Reason->AdvancedSearch->SearchValue = @$filter["x_Reason"];
		$this->Reason->AdvancedSearch->SearchOperator = @$filter["z_Reason"];
		$this->Reason->AdvancedSearch->SearchCondition = @$filter["v_Reason"];
		$this->Reason->AdvancedSearch->SearchValue2 = @$filter["y_Reason"];
		$this->Reason->AdvancedSearch->SearchOperator2 = @$filter["w_Reason"];
		$this->Reason->AdvancedSearch->save();

		// Field ProgesteroneAdmin
		$this->ProgesteroneAdmin->AdvancedSearch->SearchValue = @$filter["x_ProgesteroneAdmin"];
		$this->ProgesteroneAdmin->AdvancedSearch->SearchOperator = @$filter["z_ProgesteroneAdmin"];
		$this->ProgesteroneAdmin->AdvancedSearch->SearchCondition = @$filter["v_ProgesteroneAdmin"];
		$this->ProgesteroneAdmin->AdvancedSearch->SearchValue2 = @$filter["y_ProgesteroneAdmin"];
		$this->ProgesteroneAdmin->AdvancedSearch->SearchOperator2 = @$filter["w_ProgesteroneAdmin"];
		$this->ProgesteroneAdmin->AdvancedSearch->save();

		// Field ProgesteroneStart
		$this->ProgesteroneStart->AdvancedSearch->SearchValue = @$filter["x_ProgesteroneStart"];
		$this->ProgesteroneStart->AdvancedSearch->SearchOperator = @$filter["z_ProgesteroneStart"];
		$this->ProgesteroneStart->AdvancedSearch->SearchCondition = @$filter["v_ProgesteroneStart"];
		$this->ProgesteroneStart->AdvancedSearch->SearchValue2 = @$filter["y_ProgesteroneStart"];
		$this->ProgesteroneStart->AdvancedSearch->SearchOperator2 = @$filter["w_ProgesteroneStart"];
		$this->ProgesteroneStart->AdvancedSearch->save();

		// Field ProgesteroneDose
		$this->ProgesteroneDose->AdvancedSearch->SearchValue = @$filter["x_ProgesteroneDose"];
		$this->ProgesteroneDose->AdvancedSearch->SearchOperator = @$filter["z_ProgesteroneDose"];
		$this->ProgesteroneDose->AdvancedSearch->SearchCondition = @$filter["v_ProgesteroneDose"];
		$this->ProgesteroneDose->AdvancedSearch->SearchValue2 = @$filter["y_ProgesteroneDose"];
		$this->ProgesteroneDose->AdvancedSearch->SearchOperator2 = @$filter["w_ProgesteroneDose"];
		$this->ProgesteroneDose->AdvancedSearch->save();

		// Field Projectron
		$this->Projectron->AdvancedSearch->SearchValue = @$filter["x_Projectron"];
		$this->Projectron->AdvancedSearch->SearchOperator = @$filter["z_Projectron"];
		$this->Projectron->AdvancedSearch->SearchCondition = @$filter["v_Projectron"];
		$this->Projectron->AdvancedSearch->SearchValue2 = @$filter["y_Projectron"];
		$this->Projectron->AdvancedSearch->SearchOperator2 = @$filter["w_Projectron"];
		$this->Projectron->AdvancedSearch->save();

		// Field StChDate14
		$this->StChDate14->AdvancedSearch->SearchValue = @$filter["x_StChDate14"];
		$this->StChDate14->AdvancedSearch->SearchOperator = @$filter["z_StChDate14"];
		$this->StChDate14->AdvancedSearch->SearchCondition = @$filter["v_StChDate14"];
		$this->StChDate14->AdvancedSearch->SearchValue2 = @$filter["y_StChDate14"];
		$this->StChDate14->AdvancedSearch->SearchOperator2 = @$filter["w_StChDate14"];
		$this->StChDate14->AdvancedSearch->save();

		// Field StChDate15
		$this->StChDate15->AdvancedSearch->SearchValue = @$filter["x_StChDate15"];
		$this->StChDate15->AdvancedSearch->SearchOperator = @$filter["z_StChDate15"];
		$this->StChDate15->AdvancedSearch->SearchCondition = @$filter["v_StChDate15"];
		$this->StChDate15->AdvancedSearch->SearchValue2 = @$filter["y_StChDate15"];
		$this->StChDate15->AdvancedSearch->SearchOperator2 = @$filter["w_StChDate15"];
		$this->StChDate15->AdvancedSearch->save();

		// Field StChDate16
		$this->StChDate16->AdvancedSearch->SearchValue = @$filter["x_StChDate16"];
		$this->StChDate16->AdvancedSearch->SearchOperator = @$filter["z_StChDate16"];
		$this->StChDate16->AdvancedSearch->SearchCondition = @$filter["v_StChDate16"];
		$this->StChDate16->AdvancedSearch->SearchValue2 = @$filter["y_StChDate16"];
		$this->StChDate16->AdvancedSearch->SearchOperator2 = @$filter["w_StChDate16"];
		$this->StChDate16->AdvancedSearch->save();

		// Field StChDate17
		$this->StChDate17->AdvancedSearch->SearchValue = @$filter["x_StChDate17"];
		$this->StChDate17->AdvancedSearch->SearchOperator = @$filter["z_StChDate17"];
		$this->StChDate17->AdvancedSearch->SearchCondition = @$filter["v_StChDate17"];
		$this->StChDate17->AdvancedSearch->SearchValue2 = @$filter["y_StChDate17"];
		$this->StChDate17->AdvancedSearch->SearchOperator2 = @$filter["w_StChDate17"];
		$this->StChDate17->AdvancedSearch->save();

		// Field StChDate18
		$this->StChDate18->AdvancedSearch->SearchValue = @$filter["x_StChDate18"];
		$this->StChDate18->AdvancedSearch->SearchOperator = @$filter["z_StChDate18"];
		$this->StChDate18->AdvancedSearch->SearchCondition = @$filter["v_StChDate18"];
		$this->StChDate18->AdvancedSearch->SearchValue2 = @$filter["y_StChDate18"];
		$this->StChDate18->AdvancedSearch->SearchOperator2 = @$filter["w_StChDate18"];
		$this->StChDate18->AdvancedSearch->save();

		// Field StChDate19
		$this->StChDate19->AdvancedSearch->SearchValue = @$filter["x_StChDate19"];
		$this->StChDate19->AdvancedSearch->SearchOperator = @$filter["z_StChDate19"];
		$this->StChDate19->AdvancedSearch->SearchCondition = @$filter["v_StChDate19"];
		$this->StChDate19->AdvancedSearch->SearchValue2 = @$filter["y_StChDate19"];
		$this->StChDate19->AdvancedSearch->SearchOperator2 = @$filter["w_StChDate19"];
		$this->StChDate19->AdvancedSearch->save();

		// Field StChDate20
		$this->StChDate20->AdvancedSearch->SearchValue = @$filter["x_StChDate20"];
		$this->StChDate20->AdvancedSearch->SearchOperator = @$filter["z_StChDate20"];
		$this->StChDate20->AdvancedSearch->SearchCondition = @$filter["v_StChDate20"];
		$this->StChDate20->AdvancedSearch->SearchValue2 = @$filter["y_StChDate20"];
		$this->StChDate20->AdvancedSearch->SearchOperator2 = @$filter["w_StChDate20"];
		$this->StChDate20->AdvancedSearch->save();

		// Field StChDate21
		$this->StChDate21->AdvancedSearch->SearchValue = @$filter["x_StChDate21"];
		$this->StChDate21->AdvancedSearch->SearchOperator = @$filter["z_StChDate21"];
		$this->StChDate21->AdvancedSearch->SearchCondition = @$filter["v_StChDate21"];
		$this->StChDate21->AdvancedSearch->SearchValue2 = @$filter["y_StChDate21"];
		$this->StChDate21->AdvancedSearch->SearchOperator2 = @$filter["w_StChDate21"];
		$this->StChDate21->AdvancedSearch->save();

		// Field StChDate22
		$this->StChDate22->AdvancedSearch->SearchValue = @$filter["x_StChDate22"];
		$this->StChDate22->AdvancedSearch->SearchOperator = @$filter["z_StChDate22"];
		$this->StChDate22->AdvancedSearch->SearchCondition = @$filter["v_StChDate22"];
		$this->StChDate22->AdvancedSearch->SearchValue2 = @$filter["y_StChDate22"];
		$this->StChDate22->AdvancedSearch->SearchOperator2 = @$filter["w_StChDate22"];
		$this->StChDate22->AdvancedSearch->save();

		// Field StChDate23
		$this->StChDate23->AdvancedSearch->SearchValue = @$filter["x_StChDate23"];
		$this->StChDate23->AdvancedSearch->SearchOperator = @$filter["z_StChDate23"];
		$this->StChDate23->AdvancedSearch->SearchCondition = @$filter["v_StChDate23"];
		$this->StChDate23->AdvancedSearch->SearchValue2 = @$filter["y_StChDate23"];
		$this->StChDate23->AdvancedSearch->SearchOperator2 = @$filter["w_StChDate23"];
		$this->StChDate23->AdvancedSearch->save();

		// Field StChDate24
		$this->StChDate24->AdvancedSearch->SearchValue = @$filter["x_StChDate24"];
		$this->StChDate24->AdvancedSearch->SearchOperator = @$filter["z_StChDate24"];
		$this->StChDate24->AdvancedSearch->SearchCondition = @$filter["v_StChDate24"];
		$this->StChDate24->AdvancedSearch->SearchValue2 = @$filter["y_StChDate24"];
		$this->StChDate24->AdvancedSearch->SearchOperator2 = @$filter["w_StChDate24"];
		$this->StChDate24->AdvancedSearch->save();

		// Field StChDate25
		$this->StChDate25->AdvancedSearch->SearchValue = @$filter["x_StChDate25"];
		$this->StChDate25->AdvancedSearch->SearchOperator = @$filter["z_StChDate25"];
		$this->StChDate25->AdvancedSearch->SearchCondition = @$filter["v_StChDate25"];
		$this->StChDate25->AdvancedSearch->SearchValue2 = @$filter["y_StChDate25"];
		$this->StChDate25->AdvancedSearch->SearchOperator2 = @$filter["w_StChDate25"];
		$this->StChDate25->AdvancedSearch->save();

		// Field CycleDay14
		$this->CycleDay14->AdvancedSearch->SearchValue = @$filter["x_CycleDay14"];
		$this->CycleDay14->AdvancedSearch->SearchOperator = @$filter["z_CycleDay14"];
		$this->CycleDay14->AdvancedSearch->SearchCondition = @$filter["v_CycleDay14"];
		$this->CycleDay14->AdvancedSearch->SearchValue2 = @$filter["y_CycleDay14"];
		$this->CycleDay14->AdvancedSearch->SearchOperator2 = @$filter["w_CycleDay14"];
		$this->CycleDay14->AdvancedSearch->save();

		// Field CycleDay15
		$this->CycleDay15->AdvancedSearch->SearchValue = @$filter["x_CycleDay15"];
		$this->CycleDay15->AdvancedSearch->SearchOperator = @$filter["z_CycleDay15"];
		$this->CycleDay15->AdvancedSearch->SearchCondition = @$filter["v_CycleDay15"];
		$this->CycleDay15->AdvancedSearch->SearchValue2 = @$filter["y_CycleDay15"];
		$this->CycleDay15->AdvancedSearch->SearchOperator2 = @$filter["w_CycleDay15"];
		$this->CycleDay15->AdvancedSearch->save();

		// Field CycleDay16
		$this->CycleDay16->AdvancedSearch->SearchValue = @$filter["x_CycleDay16"];
		$this->CycleDay16->AdvancedSearch->SearchOperator = @$filter["z_CycleDay16"];
		$this->CycleDay16->AdvancedSearch->SearchCondition = @$filter["v_CycleDay16"];
		$this->CycleDay16->AdvancedSearch->SearchValue2 = @$filter["y_CycleDay16"];
		$this->CycleDay16->AdvancedSearch->SearchOperator2 = @$filter["w_CycleDay16"];
		$this->CycleDay16->AdvancedSearch->save();

		// Field CycleDay17
		$this->CycleDay17->AdvancedSearch->SearchValue = @$filter["x_CycleDay17"];
		$this->CycleDay17->AdvancedSearch->SearchOperator = @$filter["z_CycleDay17"];
		$this->CycleDay17->AdvancedSearch->SearchCondition = @$filter["v_CycleDay17"];
		$this->CycleDay17->AdvancedSearch->SearchValue2 = @$filter["y_CycleDay17"];
		$this->CycleDay17->AdvancedSearch->SearchOperator2 = @$filter["w_CycleDay17"];
		$this->CycleDay17->AdvancedSearch->save();

		// Field CycleDay18
		$this->CycleDay18->AdvancedSearch->SearchValue = @$filter["x_CycleDay18"];
		$this->CycleDay18->AdvancedSearch->SearchOperator = @$filter["z_CycleDay18"];
		$this->CycleDay18->AdvancedSearch->SearchCondition = @$filter["v_CycleDay18"];
		$this->CycleDay18->AdvancedSearch->SearchValue2 = @$filter["y_CycleDay18"];
		$this->CycleDay18->AdvancedSearch->SearchOperator2 = @$filter["w_CycleDay18"];
		$this->CycleDay18->AdvancedSearch->save();

		// Field CycleDay19
		$this->CycleDay19->AdvancedSearch->SearchValue = @$filter["x_CycleDay19"];
		$this->CycleDay19->AdvancedSearch->SearchOperator = @$filter["z_CycleDay19"];
		$this->CycleDay19->AdvancedSearch->SearchCondition = @$filter["v_CycleDay19"];
		$this->CycleDay19->AdvancedSearch->SearchValue2 = @$filter["y_CycleDay19"];
		$this->CycleDay19->AdvancedSearch->SearchOperator2 = @$filter["w_CycleDay19"];
		$this->CycleDay19->AdvancedSearch->save();

		// Field CycleDay20
		$this->CycleDay20->AdvancedSearch->SearchValue = @$filter["x_CycleDay20"];
		$this->CycleDay20->AdvancedSearch->SearchOperator = @$filter["z_CycleDay20"];
		$this->CycleDay20->AdvancedSearch->SearchCondition = @$filter["v_CycleDay20"];
		$this->CycleDay20->AdvancedSearch->SearchValue2 = @$filter["y_CycleDay20"];
		$this->CycleDay20->AdvancedSearch->SearchOperator2 = @$filter["w_CycleDay20"];
		$this->CycleDay20->AdvancedSearch->save();

		// Field CycleDay21
		$this->CycleDay21->AdvancedSearch->SearchValue = @$filter["x_CycleDay21"];
		$this->CycleDay21->AdvancedSearch->SearchOperator = @$filter["z_CycleDay21"];
		$this->CycleDay21->AdvancedSearch->SearchCondition = @$filter["v_CycleDay21"];
		$this->CycleDay21->AdvancedSearch->SearchValue2 = @$filter["y_CycleDay21"];
		$this->CycleDay21->AdvancedSearch->SearchOperator2 = @$filter["w_CycleDay21"];
		$this->CycleDay21->AdvancedSearch->save();

		// Field CycleDay22
		$this->CycleDay22->AdvancedSearch->SearchValue = @$filter["x_CycleDay22"];
		$this->CycleDay22->AdvancedSearch->SearchOperator = @$filter["z_CycleDay22"];
		$this->CycleDay22->AdvancedSearch->SearchCondition = @$filter["v_CycleDay22"];
		$this->CycleDay22->AdvancedSearch->SearchValue2 = @$filter["y_CycleDay22"];
		$this->CycleDay22->AdvancedSearch->SearchOperator2 = @$filter["w_CycleDay22"];
		$this->CycleDay22->AdvancedSearch->save();

		// Field CycleDay23
		$this->CycleDay23->AdvancedSearch->SearchValue = @$filter["x_CycleDay23"];
		$this->CycleDay23->AdvancedSearch->SearchOperator = @$filter["z_CycleDay23"];
		$this->CycleDay23->AdvancedSearch->SearchCondition = @$filter["v_CycleDay23"];
		$this->CycleDay23->AdvancedSearch->SearchValue2 = @$filter["y_CycleDay23"];
		$this->CycleDay23->AdvancedSearch->SearchOperator2 = @$filter["w_CycleDay23"];
		$this->CycleDay23->AdvancedSearch->save();

		// Field CycleDay24
		$this->CycleDay24->AdvancedSearch->SearchValue = @$filter["x_CycleDay24"];
		$this->CycleDay24->AdvancedSearch->SearchOperator = @$filter["z_CycleDay24"];
		$this->CycleDay24->AdvancedSearch->SearchCondition = @$filter["v_CycleDay24"];
		$this->CycleDay24->AdvancedSearch->SearchValue2 = @$filter["y_CycleDay24"];
		$this->CycleDay24->AdvancedSearch->SearchOperator2 = @$filter["w_CycleDay24"];
		$this->CycleDay24->AdvancedSearch->save();

		// Field CycleDay25
		$this->CycleDay25->AdvancedSearch->SearchValue = @$filter["x_CycleDay25"];
		$this->CycleDay25->AdvancedSearch->SearchOperator = @$filter["z_CycleDay25"];
		$this->CycleDay25->AdvancedSearch->SearchCondition = @$filter["v_CycleDay25"];
		$this->CycleDay25->AdvancedSearch->SearchValue2 = @$filter["y_CycleDay25"];
		$this->CycleDay25->AdvancedSearch->SearchOperator2 = @$filter["w_CycleDay25"];
		$this->CycleDay25->AdvancedSearch->save();

		// Field StimulationDay14
		$this->StimulationDay14->AdvancedSearch->SearchValue = @$filter["x_StimulationDay14"];
		$this->StimulationDay14->AdvancedSearch->SearchOperator = @$filter["z_StimulationDay14"];
		$this->StimulationDay14->AdvancedSearch->SearchCondition = @$filter["v_StimulationDay14"];
		$this->StimulationDay14->AdvancedSearch->SearchValue2 = @$filter["y_StimulationDay14"];
		$this->StimulationDay14->AdvancedSearch->SearchOperator2 = @$filter["w_StimulationDay14"];
		$this->StimulationDay14->AdvancedSearch->save();

		// Field StimulationDay15
		$this->StimulationDay15->AdvancedSearch->SearchValue = @$filter["x_StimulationDay15"];
		$this->StimulationDay15->AdvancedSearch->SearchOperator = @$filter["z_StimulationDay15"];
		$this->StimulationDay15->AdvancedSearch->SearchCondition = @$filter["v_StimulationDay15"];
		$this->StimulationDay15->AdvancedSearch->SearchValue2 = @$filter["y_StimulationDay15"];
		$this->StimulationDay15->AdvancedSearch->SearchOperator2 = @$filter["w_StimulationDay15"];
		$this->StimulationDay15->AdvancedSearch->save();

		// Field StimulationDay16
		$this->StimulationDay16->AdvancedSearch->SearchValue = @$filter["x_StimulationDay16"];
		$this->StimulationDay16->AdvancedSearch->SearchOperator = @$filter["z_StimulationDay16"];
		$this->StimulationDay16->AdvancedSearch->SearchCondition = @$filter["v_StimulationDay16"];
		$this->StimulationDay16->AdvancedSearch->SearchValue2 = @$filter["y_StimulationDay16"];
		$this->StimulationDay16->AdvancedSearch->SearchOperator2 = @$filter["w_StimulationDay16"];
		$this->StimulationDay16->AdvancedSearch->save();

		// Field StimulationDay17
		$this->StimulationDay17->AdvancedSearch->SearchValue = @$filter["x_StimulationDay17"];
		$this->StimulationDay17->AdvancedSearch->SearchOperator = @$filter["z_StimulationDay17"];
		$this->StimulationDay17->AdvancedSearch->SearchCondition = @$filter["v_StimulationDay17"];
		$this->StimulationDay17->AdvancedSearch->SearchValue2 = @$filter["y_StimulationDay17"];
		$this->StimulationDay17->AdvancedSearch->SearchOperator2 = @$filter["w_StimulationDay17"];
		$this->StimulationDay17->AdvancedSearch->save();

		// Field StimulationDay18
		$this->StimulationDay18->AdvancedSearch->SearchValue = @$filter["x_StimulationDay18"];
		$this->StimulationDay18->AdvancedSearch->SearchOperator = @$filter["z_StimulationDay18"];
		$this->StimulationDay18->AdvancedSearch->SearchCondition = @$filter["v_StimulationDay18"];
		$this->StimulationDay18->AdvancedSearch->SearchValue2 = @$filter["y_StimulationDay18"];
		$this->StimulationDay18->AdvancedSearch->SearchOperator2 = @$filter["w_StimulationDay18"];
		$this->StimulationDay18->AdvancedSearch->save();

		// Field StimulationDay19
		$this->StimulationDay19->AdvancedSearch->SearchValue = @$filter["x_StimulationDay19"];
		$this->StimulationDay19->AdvancedSearch->SearchOperator = @$filter["z_StimulationDay19"];
		$this->StimulationDay19->AdvancedSearch->SearchCondition = @$filter["v_StimulationDay19"];
		$this->StimulationDay19->AdvancedSearch->SearchValue2 = @$filter["y_StimulationDay19"];
		$this->StimulationDay19->AdvancedSearch->SearchOperator2 = @$filter["w_StimulationDay19"];
		$this->StimulationDay19->AdvancedSearch->save();

		// Field StimulationDay20
		$this->StimulationDay20->AdvancedSearch->SearchValue = @$filter["x_StimulationDay20"];
		$this->StimulationDay20->AdvancedSearch->SearchOperator = @$filter["z_StimulationDay20"];
		$this->StimulationDay20->AdvancedSearch->SearchCondition = @$filter["v_StimulationDay20"];
		$this->StimulationDay20->AdvancedSearch->SearchValue2 = @$filter["y_StimulationDay20"];
		$this->StimulationDay20->AdvancedSearch->SearchOperator2 = @$filter["w_StimulationDay20"];
		$this->StimulationDay20->AdvancedSearch->save();

		// Field StimulationDay21
		$this->StimulationDay21->AdvancedSearch->SearchValue = @$filter["x_StimulationDay21"];
		$this->StimulationDay21->AdvancedSearch->SearchOperator = @$filter["z_StimulationDay21"];
		$this->StimulationDay21->AdvancedSearch->SearchCondition = @$filter["v_StimulationDay21"];
		$this->StimulationDay21->AdvancedSearch->SearchValue2 = @$filter["y_StimulationDay21"];
		$this->StimulationDay21->AdvancedSearch->SearchOperator2 = @$filter["w_StimulationDay21"];
		$this->StimulationDay21->AdvancedSearch->save();

		// Field StimulationDay22
		$this->StimulationDay22->AdvancedSearch->SearchValue = @$filter["x_StimulationDay22"];
		$this->StimulationDay22->AdvancedSearch->SearchOperator = @$filter["z_StimulationDay22"];
		$this->StimulationDay22->AdvancedSearch->SearchCondition = @$filter["v_StimulationDay22"];
		$this->StimulationDay22->AdvancedSearch->SearchValue2 = @$filter["y_StimulationDay22"];
		$this->StimulationDay22->AdvancedSearch->SearchOperator2 = @$filter["w_StimulationDay22"];
		$this->StimulationDay22->AdvancedSearch->save();

		// Field StimulationDay23
		$this->StimulationDay23->AdvancedSearch->SearchValue = @$filter["x_StimulationDay23"];
		$this->StimulationDay23->AdvancedSearch->SearchOperator = @$filter["z_StimulationDay23"];
		$this->StimulationDay23->AdvancedSearch->SearchCondition = @$filter["v_StimulationDay23"];
		$this->StimulationDay23->AdvancedSearch->SearchValue2 = @$filter["y_StimulationDay23"];
		$this->StimulationDay23->AdvancedSearch->SearchOperator2 = @$filter["w_StimulationDay23"];
		$this->StimulationDay23->AdvancedSearch->save();

		// Field StimulationDay24
		$this->StimulationDay24->AdvancedSearch->SearchValue = @$filter["x_StimulationDay24"];
		$this->StimulationDay24->AdvancedSearch->SearchOperator = @$filter["z_StimulationDay24"];
		$this->StimulationDay24->AdvancedSearch->SearchCondition = @$filter["v_StimulationDay24"];
		$this->StimulationDay24->AdvancedSearch->SearchValue2 = @$filter["y_StimulationDay24"];
		$this->StimulationDay24->AdvancedSearch->SearchOperator2 = @$filter["w_StimulationDay24"];
		$this->StimulationDay24->AdvancedSearch->save();

		// Field StimulationDay25
		$this->StimulationDay25->AdvancedSearch->SearchValue = @$filter["x_StimulationDay25"];
		$this->StimulationDay25->AdvancedSearch->SearchOperator = @$filter["z_StimulationDay25"];
		$this->StimulationDay25->AdvancedSearch->SearchCondition = @$filter["v_StimulationDay25"];
		$this->StimulationDay25->AdvancedSearch->SearchValue2 = @$filter["y_StimulationDay25"];
		$this->StimulationDay25->AdvancedSearch->SearchOperator2 = @$filter["w_StimulationDay25"];
		$this->StimulationDay25->AdvancedSearch->save();

		// Field Tablet14
		$this->Tablet14->AdvancedSearch->SearchValue = @$filter["x_Tablet14"];
		$this->Tablet14->AdvancedSearch->SearchOperator = @$filter["z_Tablet14"];
		$this->Tablet14->AdvancedSearch->SearchCondition = @$filter["v_Tablet14"];
		$this->Tablet14->AdvancedSearch->SearchValue2 = @$filter["y_Tablet14"];
		$this->Tablet14->AdvancedSearch->SearchOperator2 = @$filter["w_Tablet14"];
		$this->Tablet14->AdvancedSearch->save();

		// Field Tablet15
		$this->Tablet15->AdvancedSearch->SearchValue = @$filter["x_Tablet15"];
		$this->Tablet15->AdvancedSearch->SearchOperator = @$filter["z_Tablet15"];
		$this->Tablet15->AdvancedSearch->SearchCondition = @$filter["v_Tablet15"];
		$this->Tablet15->AdvancedSearch->SearchValue2 = @$filter["y_Tablet15"];
		$this->Tablet15->AdvancedSearch->SearchOperator2 = @$filter["w_Tablet15"];
		$this->Tablet15->AdvancedSearch->save();

		// Field Tablet16
		$this->Tablet16->AdvancedSearch->SearchValue = @$filter["x_Tablet16"];
		$this->Tablet16->AdvancedSearch->SearchOperator = @$filter["z_Tablet16"];
		$this->Tablet16->AdvancedSearch->SearchCondition = @$filter["v_Tablet16"];
		$this->Tablet16->AdvancedSearch->SearchValue2 = @$filter["y_Tablet16"];
		$this->Tablet16->AdvancedSearch->SearchOperator2 = @$filter["w_Tablet16"];
		$this->Tablet16->AdvancedSearch->save();

		// Field Tablet17
		$this->Tablet17->AdvancedSearch->SearchValue = @$filter["x_Tablet17"];
		$this->Tablet17->AdvancedSearch->SearchOperator = @$filter["z_Tablet17"];
		$this->Tablet17->AdvancedSearch->SearchCondition = @$filter["v_Tablet17"];
		$this->Tablet17->AdvancedSearch->SearchValue2 = @$filter["y_Tablet17"];
		$this->Tablet17->AdvancedSearch->SearchOperator2 = @$filter["w_Tablet17"];
		$this->Tablet17->AdvancedSearch->save();

		// Field Tablet18
		$this->Tablet18->AdvancedSearch->SearchValue = @$filter["x_Tablet18"];
		$this->Tablet18->AdvancedSearch->SearchOperator = @$filter["z_Tablet18"];
		$this->Tablet18->AdvancedSearch->SearchCondition = @$filter["v_Tablet18"];
		$this->Tablet18->AdvancedSearch->SearchValue2 = @$filter["y_Tablet18"];
		$this->Tablet18->AdvancedSearch->SearchOperator2 = @$filter["w_Tablet18"];
		$this->Tablet18->AdvancedSearch->save();

		// Field Tablet19
		$this->Tablet19->AdvancedSearch->SearchValue = @$filter["x_Tablet19"];
		$this->Tablet19->AdvancedSearch->SearchOperator = @$filter["z_Tablet19"];
		$this->Tablet19->AdvancedSearch->SearchCondition = @$filter["v_Tablet19"];
		$this->Tablet19->AdvancedSearch->SearchValue2 = @$filter["y_Tablet19"];
		$this->Tablet19->AdvancedSearch->SearchOperator2 = @$filter["w_Tablet19"];
		$this->Tablet19->AdvancedSearch->save();

		// Field Tablet20
		$this->Tablet20->AdvancedSearch->SearchValue = @$filter["x_Tablet20"];
		$this->Tablet20->AdvancedSearch->SearchOperator = @$filter["z_Tablet20"];
		$this->Tablet20->AdvancedSearch->SearchCondition = @$filter["v_Tablet20"];
		$this->Tablet20->AdvancedSearch->SearchValue2 = @$filter["y_Tablet20"];
		$this->Tablet20->AdvancedSearch->SearchOperator2 = @$filter["w_Tablet20"];
		$this->Tablet20->AdvancedSearch->save();

		// Field Tablet21
		$this->Tablet21->AdvancedSearch->SearchValue = @$filter["x_Tablet21"];
		$this->Tablet21->AdvancedSearch->SearchOperator = @$filter["z_Tablet21"];
		$this->Tablet21->AdvancedSearch->SearchCondition = @$filter["v_Tablet21"];
		$this->Tablet21->AdvancedSearch->SearchValue2 = @$filter["y_Tablet21"];
		$this->Tablet21->AdvancedSearch->SearchOperator2 = @$filter["w_Tablet21"];
		$this->Tablet21->AdvancedSearch->save();

		// Field Tablet22
		$this->Tablet22->AdvancedSearch->SearchValue = @$filter["x_Tablet22"];
		$this->Tablet22->AdvancedSearch->SearchOperator = @$filter["z_Tablet22"];
		$this->Tablet22->AdvancedSearch->SearchCondition = @$filter["v_Tablet22"];
		$this->Tablet22->AdvancedSearch->SearchValue2 = @$filter["y_Tablet22"];
		$this->Tablet22->AdvancedSearch->SearchOperator2 = @$filter["w_Tablet22"];
		$this->Tablet22->AdvancedSearch->save();

		// Field Tablet23
		$this->Tablet23->AdvancedSearch->SearchValue = @$filter["x_Tablet23"];
		$this->Tablet23->AdvancedSearch->SearchOperator = @$filter["z_Tablet23"];
		$this->Tablet23->AdvancedSearch->SearchCondition = @$filter["v_Tablet23"];
		$this->Tablet23->AdvancedSearch->SearchValue2 = @$filter["y_Tablet23"];
		$this->Tablet23->AdvancedSearch->SearchOperator2 = @$filter["w_Tablet23"];
		$this->Tablet23->AdvancedSearch->save();

		// Field Tablet24
		$this->Tablet24->AdvancedSearch->SearchValue = @$filter["x_Tablet24"];
		$this->Tablet24->AdvancedSearch->SearchOperator = @$filter["z_Tablet24"];
		$this->Tablet24->AdvancedSearch->SearchCondition = @$filter["v_Tablet24"];
		$this->Tablet24->AdvancedSearch->SearchValue2 = @$filter["y_Tablet24"];
		$this->Tablet24->AdvancedSearch->SearchOperator2 = @$filter["w_Tablet24"];
		$this->Tablet24->AdvancedSearch->save();

		// Field Tablet25
		$this->Tablet25->AdvancedSearch->SearchValue = @$filter["x_Tablet25"];
		$this->Tablet25->AdvancedSearch->SearchOperator = @$filter["z_Tablet25"];
		$this->Tablet25->AdvancedSearch->SearchCondition = @$filter["v_Tablet25"];
		$this->Tablet25->AdvancedSearch->SearchValue2 = @$filter["y_Tablet25"];
		$this->Tablet25->AdvancedSearch->SearchOperator2 = @$filter["w_Tablet25"];
		$this->Tablet25->AdvancedSearch->save();

		// Field RFSH14
		$this->RFSH14->AdvancedSearch->SearchValue = @$filter["x_RFSH14"];
		$this->RFSH14->AdvancedSearch->SearchOperator = @$filter["z_RFSH14"];
		$this->RFSH14->AdvancedSearch->SearchCondition = @$filter["v_RFSH14"];
		$this->RFSH14->AdvancedSearch->SearchValue2 = @$filter["y_RFSH14"];
		$this->RFSH14->AdvancedSearch->SearchOperator2 = @$filter["w_RFSH14"];
		$this->RFSH14->AdvancedSearch->save();

		// Field RFSH15
		$this->RFSH15->AdvancedSearch->SearchValue = @$filter["x_RFSH15"];
		$this->RFSH15->AdvancedSearch->SearchOperator = @$filter["z_RFSH15"];
		$this->RFSH15->AdvancedSearch->SearchCondition = @$filter["v_RFSH15"];
		$this->RFSH15->AdvancedSearch->SearchValue2 = @$filter["y_RFSH15"];
		$this->RFSH15->AdvancedSearch->SearchOperator2 = @$filter["w_RFSH15"];
		$this->RFSH15->AdvancedSearch->save();

		// Field RFSH16
		$this->RFSH16->AdvancedSearch->SearchValue = @$filter["x_RFSH16"];
		$this->RFSH16->AdvancedSearch->SearchOperator = @$filter["z_RFSH16"];
		$this->RFSH16->AdvancedSearch->SearchCondition = @$filter["v_RFSH16"];
		$this->RFSH16->AdvancedSearch->SearchValue2 = @$filter["y_RFSH16"];
		$this->RFSH16->AdvancedSearch->SearchOperator2 = @$filter["w_RFSH16"];
		$this->RFSH16->AdvancedSearch->save();

		// Field RFSH17
		$this->RFSH17->AdvancedSearch->SearchValue = @$filter["x_RFSH17"];
		$this->RFSH17->AdvancedSearch->SearchOperator = @$filter["z_RFSH17"];
		$this->RFSH17->AdvancedSearch->SearchCondition = @$filter["v_RFSH17"];
		$this->RFSH17->AdvancedSearch->SearchValue2 = @$filter["y_RFSH17"];
		$this->RFSH17->AdvancedSearch->SearchOperator2 = @$filter["w_RFSH17"];
		$this->RFSH17->AdvancedSearch->save();

		// Field RFSH18
		$this->RFSH18->AdvancedSearch->SearchValue = @$filter["x_RFSH18"];
		$this->RFSH18->AdvancedSearch->SearchOperator = @$filter["z_RFSH18"];
		$this->RFSH18->AdvancedSearch->SearchCondition = @$filter["v_RFSH18"];
		$this->RFSH18->AdvancedSearch->SearchValue2 = @$filter["y_RFSH18"];
		$this->RFSH18->AdvancedSearch->SearchOperator2 = @$filter["w_RFSH18"];
		$this->RFSH18->AdvancedSearch->save();

		// Field RFSH19
		$this->RFSH19->AdvancedSearch->SearchValue = @$filter["x_RFSH19"];
		$this->RFSH19->AdvancedSearch->SearchOperator = @$filter["z_RFSH19"];
		$this->RFSH19->AdvancedSearch->SearchCondition = @$filter["v_RFSH19"];
		$this->RFSH19->AdvancedSearch->SearchValue2 = @$filter["y_RFSH19"];
		$this->RFSH19->AdvancedSearch->SearchOperator2 = @$filter["w_RFSH19"];
		$this->RFSH19->AdvancedSearch->save();

		// Field RFSH20
		$this->RFSH20->AdvancedSearch->SearchValue = @$filter["x_RFSH20"];
		$this->RFSH20->AdvancedSearch->SearchOperator = @$filter["z_RFSH20"];
		$this->RFSH20->AdvancedSearch->SearchCondition = @$filter["v_RFSH20"];
		$this->RFSH20->AdvancedSearch->SearchValue2 = @$filter["y_RFSH20"];
		$this->RFSH20->AdvancedSearch->SearchOperator2 = @$filter["w_RFSH20"];
		$this->RFSH20->AdvancedSearch->save();

		// Field RFSH21
		$this->RFSH21->AdvancedSearch->SearchValue = @$filter["x_RFSH21"];
		$this->RFSH21->AdvancedSearch->SearchOperator = @$filter["z_RFSH21"];
		$this->RFSH21->AdvancedSearch->SearchCondition = @$filter["v_RFSH21"];
		$this->RFSH21->AdvancedSearch->SearchValue2 = @$filter["y_RFSH21"];
		$this->RFSH21->AdvancedSearch->SearchOperator2 = @$filter["w_RFSH21"];
		$this->RFSH21->AdvancedSearch->save();

		// Field RFSH22
		$this->RFSH22->AdvancedSearch->SearchValue = @$filter["x_RFSH22"];
		$this->RFSH22->AdvancedSearch->SearchOperator = @$filter["z_RFSH22"];
		$this->RFSH22->AdvancedSearch->SearchCondition = @$filter["v_RFSH22"];
		$this->RFSH22->AdvancedSearch->SearchValue2 = @$filter["y_RFSH22"];
		$this->RFSH22->AdvancedSearch->SearchOperator2 = @$filter["w_RFSH22"];
		$this->RFSH22->AdvancedSearch->save();

		// Field RFSH23
		$this->RFSH23->AdvancedSearch->SearchValue = @$filter["x_RFSH23"];
		$this->RFSH23->AdvancedSearch->SearchOperator = @$filter["z_RFSH23"];
		$this->RFSH23->AdvancedSearch->SearchCondition = @$filter["v_RFSH23"];
		$this->RFSH23->AdvancedSearch->SearchValue2 = @$filter["y_RFSH23"];
		$this->RFSH23->AdvancedSearch->SearchOperator2 = @$filter["w_RFSH23"];
		$this->RFSH23->AdvancedSearch->save();

		// Field RFSH24
		$this->RFSH24->AdvancedSearch->SearchValue = @$filter["x_RFSH24"];
		$this->RFSH24->AdvancedSearch->SearchOperator = @$filter["z_RFSH24"];
		$this->RFSH24->AdvancedSearch->SearchCondition = @$filter["v_RFSH24"];
		$this->RFSH24->AdvancedSearch->SearchValue2 = @$filter["y_RFSH24"];
		$this->RFSH24->AdvancedSearch->SearchOperator2 = @$filter["w_RFSH24"];
		$this->RFSH24->AdvancedSearch->save();

		// Field RFSH25
		$this->RFSH25->AdvancedSearch->SearchValue = @$filter["x_RFSH25"];
		$this->RFSH25->AdvancedSearch->SearchOperator = @$filter["z_RFSH25"];
		$this->RFSH25->AdvancedSearch->SearchCondition = @$filter["v_RFSH25"];
		$this->RFSH25->AdvancedSearch->SearchValue2 = @$filter["y_RFSH25"];
		$this->RFSH25->AdvancedSearch->SearchOperator2 = @$filter["w_RFSH25"];
		$this->RFSH25->AdvancedSearch->save();

		// Field HMG14
		$this->HMG14->AdvancedSearch->SearchValue = @$filter["x_HMG14"];
		$this->HMG14->AdvancedSearch->SearchOperator = @$filter["z_HMG14"];
		$this->HMG14->AdvancedSearch->SearchCondition = @$filter["v_HMG14"];
		$this->HMG14->AdvancedSearch->SearchValue2 = @$filter["y_HMG14"];
		$this->HMG14->AdvancedSearch->SearchOperator2 = @$filter["w_HMG14"];
		$this->HMG14->AdvancedSearch->save();

		// Field HMG15
		$this->HMG15->AdvancedSearch->SearchValue = @$filter["x_HMG15"];
		$this->HMG15->AdvancedSearch->SearchOperator = @$filter["z_HMG15"];
		$this->HMG15->AdvancedSearch->SearchCondition = @$filter["v_HMG15"];
		$this->HMG15->AdvancedSearch->SearchValue2 = @$filter["y_HMG15"];
		$this->HMG15->AdvancedSearch->SearchOperator2 = @$filter["w_HMG15"];
		$this->HMG15->AdvancedSearch->save();

		// Field HMG16
		$this->HMG16->AdvancedSearch->SearchValue = @$filter["x_HMG16"];
		$this->HMG16->AdvancedSearch->SearchOperator = @$filter["z_HMG16"];
		$this->HMG16->AdvancedSearch->SearchCondition = @$filter["v_HMG16"];
		$this->HMG16->AdvancedSearch->SearchValue2 = @$filter["y_HMG16"];
		$this->HMG16->AdvancedSearch->SearchOperator2 = @$filter["w_HMG16"];
		$this->HMG16->AdvancedSearch->save();

		// Field HMG17
		$this->HMG17->AdvancedSearch->SearchValue = @$filter["x_HMG17"];
		$this->HMG17->AdvancedSearch->SearchOperator = @$filter["z_HMG17"];
		$this->HMG17->AdvancedSearch->SearchCondition = @$filter["v_HMG17"];
		$this->HMG17->AdvancedSearch->SearchValue2 = @$filter["y_HMG17"];
		$this->HMG17->AdvancedSearch->SearchOperator2 = @$filter["w_HMG17"];
		$this->HMG17->AdvancedSearch->save();

		// Field HMG18
		$this->HMG18->AdvancedSearch->SearchValue = @$filter["x_HMG18"];
		$this->HMG18->AdvancedSearch->SearchOperator = @$filter["z_HMG18"];
		$this->HMG18->AdvancedSearch->SearchCondition = @$filter["v_HMG18"];
		$this->HMG18->AdvancedSearch->SearchValue2 = @$filter["y_HMG18"];
		$this->HMG18->AdvancedSearch->SearchOperator2 = @$filter["w_HMG18"];
		$this->HMG18->AdvancedSearch->save();

		// Field HMG19
		$this->HMG19->AdvancedSearch->SearchValue = @$filter["x_HMG19"];
		$this->HMG19->AdvancedSearch->SearchOperator = @$filter["z_HMG19"];
		$this->HMG19->AdvancedSearch->SearchCondition = @$filter["v_HMG19"];
		$this->HMG19->AdvancedSearch->SearchValue2 = @$filter["y_HMG19"];
		$this->HMG19->AdvancedSearch->SearchOperator2 = @$filter["w_HMG19"];
		$this->HMG19->AdvancedSearch->save();

		// Field HMG20
		$this->HMG20->AdvancedSearch->SearchValue = @$filter["x_HMG20"];
		$this->HMG20->AdvancedSearch->SearchOperator = @$filter["z_HMG20"];
		$this->HMG20->AdvancedSearch->SearchCondition = @$filter["v_HMG20"];
		$this->HMG20->AdvancedSearch->SearchValue2 = @$filter["y_HMG20"];
		$this->HMG20->AdvancedSearch->SearchOperator2 = @$filter["w_HMG20"];
		$this->HMG20->AdvancedSearch->save();

		// Field HMG21
		$this->HMG21->AdvancedSearch->SearchValue = @$filter["x_HMG21"];
		$this->HMG21->AdvancedSearch->SearchOperator = @$filter["z_HMG21"];
		$this->HMG21->AdvancedSearch->SearchCondition = @$filter["v_HMG21"];
		$this->HMG21->AdvancedSearch->SearchValue2 = @$filter["y_HMG21"];
		$this->HMG21->AdvancedSearch->SearchOperator2 = @$filter["w_HMG21"];
		$this->HMG21->AdvancedSearch->save();

		// Field HMG22
		$this->HMG22->AdvancedSearch->SearchValue = @$filter["x_HMG22"];
		$this->HMG22->AdvancedSearch->SearchOperator = @$filter["z_HMG22"];
		$this->HMG22->AdvancedSearch->SearchCondition = @$filter["v_HMG22"];
		$this->HMG22->AdvancedSearch->SearchValue2 = @$filter["y_HMG22"];
		$this->HMG22->AdvancedSearch->SearchOperator2 = @$filter["w_HMG22"];
		$this->HMG22->AdvancedSearch->save();

		// Field HMG23
		$this->HMG23->AdvancedSearch->SearchValue = @$filter["x_HMG23"];
		$this->HMG23->AdvancedSearch->SearchOperator = @$filter["z_HMG23"];
		$this->HMG23->AdvancedSearch->SearchCondition = @$filter["v_HMG23"];
		$this->HMG23->AdvancedSearch->SearchValue2 = @$filter["y_HMG23"];
		$this->HMG23->AdvancedSearch->SearchOperator2 = @$filter["w_HMG23"];
		$this->HMG23->AdvancedSearch->save();

		// Field HMG24
		$this->HMG24->AdvancedSearch->SearchValue = @$filter["x_HMG24"];
		$this->HMG24->AdvancedSearch->SearchOperator = @$filter["z_HMG24"];
		$this->HMG24->AdvancedSearch->SearchCondition = @$filter["v_HMG24"];
		$this->HMG24->AdvancedSearch->SearchValue2 = @$filter["y_HMG24"];
		$this->HMG24->AdvancedSearch->SearchOperator2 = @$filter["w_HMG24"];
		$this->HMG24->AdvancedSearch->save();

		// Field HMG25
		$this->HMG25->AdvancedSearch->SearchValue = @$filter["x_HMG25"];
		$this->HMG25->AdvancedSearch->SearchOperator = @$filter["z_HMG25"];
		$this->HMG25->AdvancedSearch->SearchCondition = @$filter["v_HMG25"];
		$this->HMG25->AdvancedSearch->SearchValue2 = @$filter["y_HMG25"];
		$this->HMG25->AdvancedSearch->SearchOperator2 = @$filter["w_HMG25"];
		$this->HMG25->AdvancedSearch->save();

		// Field GnRH14
		$this->GnRH14->AdvancedSearch->SearchValue = @$filter["x_GnRH14"];
		$this->GnRH14->AdvancedSearch->SearchOperator = @$filter["z_GnRH14"];
		$this->GnRH14->AdvancedSearch->SearchCondition = @$filter["v_GnRH14"];
		$this->GnRH14->AdvancedSearch->SearchValue2 = @$filter["y_GnRH14"];
		$this->GnRH14->AdvancedSearch->SearchOperator2 = @$filter["w_GnRH14"];
		$this->GnRH14->AdvancedSearch->save();

		// Field GnRH15
		$this->GnRH15->AdvancedSearch->SearchValue = @$filter["x_GnRH15"];
		$this->GnRH15->AdvancedSearch->SearchOperator = @$filter["z_GnRH15"];
		$this->GnRH15->AdvancedSearch->SearchCondition = @$filter["v_GnRH15"];
		$this->GnRH15->AdvancedSearch->SearchValue2 = @$filter["y_GnRH15"];
		$this->GnRH15->AdvancedSearch->SearchOperator2 = @$filter["w_GnRH15"];
		$this->GnRH15->AdvancedSearch->save();

		// Field GnRH16
		$this->GnRH16->AdvancedSearch->SearchValue = @$filter["x_GnRH16"];
		$this->GnRH16->AdvancedSearch->SearchOperator = @$filter["z_GnRH16"];
		$this->GnRH16->AdvancedSearch->SearchCondition = @$filter["v_GnRH16"];
		$this->GnRH16->AdvancedSearch->SearchValue2 = @$filter["y_GnRH16"];
		$this->GnRH16->AdvancedSearch->SearchOperator2 = @$filter["w_GnRH16"];
		$this->GnRH16->AdvancedSearch->save();

		// Field GnRH17
		$this->GnRH17->AdvancedSearch->SearchValue = @$filter["x_GnRH17"];
		$this->GnRH17->AdvancedSearch->SearchOperator = @$filter["z_GnRH17"];
		$this->GnRH17->AdvancedSearch->SearchCondition = @$filter["v_GnRH17"];
		$this->GnRH17->AdvancedSearch->SearchValue2 = @$filter["y_GnRH17"];
		$this->GnRH17->AdvancedSearch->SearchOperator2 = @$filter["w_GnRH17"];
		$this->GnRH17->AdvancedSearch->save();

		// Field GnRH18
		$this->GnRH18->AdvancedSearch->SearchValue = @$filter["x_GnRH18"];
		$this->GnRH18->AdvancedSearch->SearchOperator = @$filter["z_GnRH18"];
		$this->GnRH18->AdvancedSearch->SearchCondition = @$filter["v_GnRH18"];
		$this->GnRH18->AdvancedSearch->SearchValue2 = @$filter["y_GnRH18"];
		$this->GnRH18->AdvancedSearch->SearchOperator2 = @$filter["w_GnRH18"];
		$this->GnRH18->AdvancedSearch->save();

		// Field GnRH19
		$this->GnRH19->AdvancedSearch->SearchValue = @$filter["x_GnRH19"];
		$this->GnRH19->AdvancedSearch->SearchOperator = @$filter["z_GnRH19"];
		$this->GnRH19->AdvancedSearch->SearchCondition = @$filter["v_GnRH19"];
		$this->GnRH19->AdvancedSearch->SearchValue2 = @$filter["y_GnRH19"];
		$this->GnRH19->AdvancedSearch->SearchOperator2 = @$filter["w_GnRH19"];
		$this->GnRH19->AdvancedSearch->save();

		// Field GnRH20
		$this->GnRH20->AdvancedSearch->SearchValue = @$filter["x_GnRH20"];
		$this->GnRH20->AdvancedSearch->SearchOperator = @$filter["z_GnRH20"];
		$this->GnRH20->AdvancedSearch->SearchCondition = @$filter["v_GnRH20"];
		$this->GnRH20->AdvancedSearch->SearchValue2 = @$filter["y_GnRH20"];
		$this->GnRH20->AdvancedSearch->SearchOperator2 = @$filter["w_GnRH20"];
		$this->GnRH20->AdvancedSearch->save();

		// Field GnRH21
		$this->GnRH21->AdvancedSearch->SearchValue = @$filter["x_GnRH21"];
		$this->GnRH21->AdvancedSearch->SearchOperator = @$filter["z_GnRH21"];
		$this->GnRH21->AdvancedSearch->SearchCondition = @$filter["v_GnRH21"];
		$this->GnRH21->AdvancedSearch->SearchValue2 = @$filter["y_GnRH21"];
		$this->GnRH21->AdvancedSearch->SearchOperator2 = @$filter["w_GnRH21"];
		$this->GnRH21->AdvancedSearch->save();

		// Field GnRH22
		$this->GnRH22->AdvancedSearch->SearchValue = @$filter["x_GnRH22"];
		$this->GnRH22->AdvancedSearch->SearchOperator = @$filter["z_GnRH22"];
		$this->GnRH22->AdvancedSearch->SearchCondition = @$filter["v_GnRH22"];
		$this->GnRH22->AdvancedSearch->SearchValue2 = @$filter["y_GnRH22"];
		$this->GnRH22->AdvancedSearch->SearchOperator2 = @$filter["w_GnRH22"];
		$this->GnRH22->AdvancedSearch->save();

		// Field GnRH23
		$this->GnRH23->AdvancedSearch->SearchValue = @$filter["x_GnRH23"];
		$this->GnRH23->AdvancedSearch->SearchOperator = @$filter["z_GnRH23"];
		$this->GnRH23->AdvancedSearch->SearchCondition = @$filter["v_GnRH23"];
		$this->GnRH23->AdvancedSearch->SearchValue2 = @$filter["y_GnRH23"];
		$this->GnRH23->AdvancedSearch->SearchOperator2 = @$filter["w_GnRH23"];
		$this->GnRH23->AdvancedSearch->save();

		// Field GnRH24
		$this->GnRH24->AdvancedSearch->SearchValue = @$filter["x_GnRH24"];
		$this->GnRH24->AdvancedSearch->SearchOperator = @$filter["z_GnRH24"];
		$this->GnRH24->AdvancedSearch->SearchCondition = @$filter["v_GnRH24"];
		$this->GnRH24->AdvancedSearch->SearchValue2 = @$filter["y_GnRH24"];
		$this->GnRH24->AdvancedSearch->SearchOperator2 = @$filter["w_GnRH24"];
		$this->GnRH24->AdvancedSearch->save();

		// Field GnRH25
		$this->GnRH25->AdvancedSearch->SearchValue = @$filter["x_GnRH25"];
		$this->GnRH25->AdvancedSearch->SearchOperator = @$filter["z_GnRH25"];
		$this->GnRH25->AdvancedSearch->SearchCondition = @$filter["v_GnRH25"];
		$this->GnRH25->AdvancedSearch->SearchValue2 = @$filter["y_GnRH25"];
		$this->GnRH25->AdvancedSearch->SearchOperator2 = @$filter["w_GnRH25"];
		$this->GnRH25->AdvancedSearch->save();

		// Field P414
		$this->P414->AdvancedSearch->SearchValue = @$filter["x_P414"];
		$this->P414->AdvancedSearch->SearchOperator = @$filter["z_P414"];
		$this->P414->AdvancedSearch->SearchCondition = @$filter["v_P414"];
		$this->P414->AdvancedSearch->SearchValue2 = @$filter["y_P414"];
		$this->P414->AdvancedSearch->SearchOperator2 = @$filter["w_P414"];
		$this->P414->AdvancedSearch->save();

		// Field P415
		$this->P415->AdvancedSearch->SearchValue = @$filter["x_P415"];
		$this->P415->AdvancedSearch->SearchOperator = @$filter["z_P415"];
		$this->P415->AdvancedSearch->SearchCondition = @$filter["v_P415"];
		$this->P415->AdvancedSearch->SearchValue2 = @$filter["y_P415"];
		$this->P415->AdvancedSearch->SearchOperator2 = @$filter["w_P415"];
		$this->P415->AdvancedSearch->save();

		// Field P416
		$this->P416->AdvancedSearch->SearchValue = @$filter["x_P416"];
		$this->P416->AdvancedSearch->SearchOperator = @$filter["z_P416"];
		$this->P416->AdvancedSearch->SearchCondition = @$filter["v_P416"];
		$this->P416->AdvancedSearch->SearchValue2 = @$filter["y_P416"];
		$this->P416->AdvancedSearch->SearchOperator2 = @$filter["w_P416"];
		$this->P416->AdvancedSearch->save();

		// Field P417
		$this->P417->AdvancedSearch->SearchValue = @$filter["x_P417"];
		$this->P417->AdvancedSearch->SearchOperator = @$filter["z_P417"];
		$this->P417->AdvancedSearch->SearchCondition = @$filter["v_P417"];
		$this->P417->AdvancedSearch->SearchValue2 = @$filter["y_P417"];
		$this->P417->AdvancedSearch->SearchOperator2 = @$filter["w_P417"];
		$this->P417->AdvancedSearch->save();

		// Field P418
		$this->P418->AdvancedSearch->SearchValue = @$filter["x_P418"];
		$this->P418->AdvancedSearch->SearchOperator = @$filter["z_P418"];
		$this->P418->AdvancedSearch->SearchCondition = @$filter["v_P418"];
		$this->P418->AdvancedSearch->SearchValue2 = @$filter["y_P418"];
		$this->P418->AdvancedSearch->SearchOperator2 = @$filter["w_P418"];
		$this->P418->AdvancedSearch->save();

		// Field P419
		$this->P419->AdvancedSearch->SearchValue = @$filter["x_P419"];
		$this->P419->AdvancedSearch->SearchOperator = @$filter["z_P419"];
		$this->P419->AdvancedSearch->SearchCondition = @$filter["v_P419"];
		$this->P419->AdvancedSearch->SearchValue2 = @$filter["y_P419"];
		$this->P419->AdvancedSearch->SearchOperator2 = @$filter["w_P419"];
		$this->P419->AdvancedSearch->save();

		// Field P420
		$this->P420->AdvancedSearch->SearchValue = @$filter["x_P420"];
		$this->P420->AdvancedSearch->SearchOperator = @$filter["z_P420"];
		$this->P420->AdvancedSearch->SearchCondition = @$filter["v_P420"];
		$this->P420->AdvancedSearch->SearchValue2 = @$filter["y_P420"];
		$this->P420->AdvancedSearch->SearchOperator2 = @$filter["w_P420"];
		$this->P420->AdvancedSearch->save();

		// Field P421
		$this->P421->AdvancedSearch->SearchValue = @$filter["x_P421"];
		$this->P421->AdvancedSearch->SearchOperator = @$filter["z_P421"];
		$this->P421->AdvancedSearch->SearchCondition = @$filter["v_P421"];
		$this->P421->AdvancedSearch->SearchValue2 = @$filter["y_P421"];
		$this->P421->AdvancedSearch->SearchOperator2 = @$filter["w_P421"];
		$this->P421->AdvancedSearch->save();

		// Field P422
		$this->P422->AdvancedSearch->SearchValue = @$filter["x_P422"];
		$this->P422->AdvancedSearch->SearchOperator = @$filter["z_P422"];
		$this->P422->AdvancedSearch->SearchCondition = @$filter["v_P422"];
		$this->P422->AdvancedSearch->SearchValue2 = @$filter["y_P422"];
		$this->P422->AdvancedSearch->SearchOperator2 = @$filter["w_P422"];
		$this->P422->AdvancedSearch->save();

		// Field P423
		$this->P423->AdvancedSearch->SearchValue = @$filter["x_P423"];
		$this->P423->AdvancedSearch->SearchOperator = @$filter["z_P423"];
		$this->P423->AdvancedSearch->SearchCondition = @$filter["v_P423"];
		$this->P423->AdvancedSearch->SearchValue2 = @$filter["y_P423"];
		$this->P423->AdvancedSearch->SearchOperator2 = @$filter["w_P423"];
		$this->P423->AdvancedSearch->save();

		// Field P424
		$this->P424->AdvancedSearch->SearchValue = @$filter["x_P424"];
		$this->P424->AdvancedSearch->SearchOperator = @$filter["z_P424"];
		$this->P424->AdvancedSearch->SearchCondition = @$filter["v_P424"];
		$this->P424->AdvancedSearch->SearchValue2 = @$filter["y_P424"];
		$this->P424->AdvancedSearch->SearchOperator2 = @$filter["w_P424"];
		$this->P424->AdvancedSearch->save();

		// Field P425
		$this->P425->AdvancedSearch->SearchValue = @$filter["x_P425"];
		$this->P425->AdvancedSearch->SearchOperator = @$filter["z_P425"];
		$this->P425->AdvancedSearch->SearchCondition = @$filter["v_P425"];
		$this->P425->AdvancedSearch->SearchValue2 = @$filter["y_P425"];
		$this->P425->AdvancedSearch->SearchOperator2 = @$filter["w_P425"];
		$this->P425->AdvancedSearch->save();

		// Field USGRt14
		$this->USGRt14->AdvancedSearch->SearchValue = @$filter["x_USGRt14"];
		$this->USGRt14->AdvancedSearch->SearchOperator = @$filter["z_USGRt14"];
		$this->USGRt14->AdvancedSearch->SearchCondition = @$filter["v_USGRt14"];
		$this->USGRt14->AdvancedSearch->SearchValue2 = @$filter["y_USGRt14"];
		$this->USGRt14->AdvancedSearch->SearchOperator2 = @$filter["w_USGRt14"];
		$this->USGRt14->AdvancedSearch->save();

		// Field USGRt15
		$this->USGRt15->AdvancedSearch->SearchValue = @$filter["x_USGRt15"];
		$this->USGRt15->AdvancedSearch->SearchOperator = @$filter["z_USGRt15"];
		$this->USGRt15->AdvancedSearch->SearchCondition = @$filter["v_USGRt15"];
		$this->USGRt15->AdvancedSearch->SearchValue2 = @$filter["y_USGRt15"];
		$this->USGRt15->AdvancedSearch->SearchOperator2 = @$filter["w_USGRt15"];
		$this->USGRt15->AdvancedSearch->save();

		// Field USGRt16
		$this->USGRt16->AdvancedSearch->SearchValue = @$filter["x_USGRt16"];
		$this->USGRt16->AdvancedSearch->SearchOperator = @$filter["z_USGRt16"];
		$this->USGRt16->AdvancedSearch->SearchCondition = @$filter["v_USGRt16"];
		$this->USGRt16->AdvancedSearch->SearchValue2 = @$filter["y_USGRt16"];
		$this->USGRt16->AdvancedSearch->SearchOperator2 = @$filter["w_USGRt16"];
		$this->USGRt16->AdvancedSearch->save();

		// Field USGRt17
		$this->USGRt17->AdvancedSearch->SearchValue = @$filter["x_USGRt17"];
		$this->USGRt17->AdvancedSearch->SearchOperator = @$filter["z_USGRt17"];
		$this->USGRt17->AdvancedSearch->SearchCondition = @$filter["v_USGRt17"];
		$this->USGRt17->AdvancedSearch->SearchValue2 = @$filter["y_USGRt17"];
		$this->USGRt17->AdvancedSearch->SearchOperator2 = @$filter["w_USGRt17"];
		$this->USGRt17->AdvancedSearch->save();

		// Field USGRt18
		$this->USGRt18->AdvancedSearch->SearchValue = @$filter["x_USGRt18"];
		$this->USGRt18->AdvancedSearch->SearchOperator = @$filter["z_USGRt18"];
		$this->USGRt18->AdvancedSearch->SearchCondition = @$filter["v_USGRt18"];
		$this->USGRt18->AdvancedSearch->SearchValue2 = @$filter["y_USGRt18"];
		$this->USGRt18->AdvancedSearch->SearchOperator2 = @$filter["w_USGRt18"];
		$this->USGRt18->AdvancedSearch->save();

		// Field USGRt19
		$this->USGRt19->AdvancedSearch->SearchValue = @$filter["x_USGRt19"];
		$this->USGRt19->AdvancedSearch->SearchOperator = @$filter["z_USGRt19"];
		$this->USGRt19->AdvancedSearch->SearchCondition = @$filter["v_USGRt19"];
		$this->USGRt19->AdvancedSearch->SearchValue2 = @$filter["y_USGRt19"];
		$this->USGRt19->AdvancedSearch->SearchOperator2 = @$filter["w_USGRt19"];
		$this->USGRt19->AdvancedSearch->save();

		// Field USGRt20
		$this->USGRt20->AdvancedSearch->SearchValue = @$filter["x_USGRt20"];
		$this->USGRt20->AdvancedSearch->SearchOperator = @$filter["z_USGRt20"];
		$this->USGRt20->AdvancedSearch->SearchCondition = @$filter["v_USGRt20"];
		$this->USGRt20->AdvancedSearch->SearchValue2 = @$filter["y_USGRt20"];
		$this->USGRt20->AdvancedSearch->SearchOperator2 = @$filter["w_USGRt20"];
		$this->USGRt20->AdvancedSearch->save();

		// Field USGRt21
		$this->USGRt21->AdvancedSearch->SearchValue = @$filter["x_USGRt21"];
		$this->USGRt21->AdvancedSearch->SearchOperator = @$filter["z_USGRt21"];
		$this->USGRt21->AdvancedSearch->SearchCondition = @$filter["v_USGRt21"];
		$this->USGRt21->AdvancedSearch->SearchValue2 = @$filter["y_USGRt21"];
		$this->USGRt21->AdvancedSearch->SearchOperator2 = @$filter["w_USGRt21"];
		$this->USGRt21->AdvancedSearch->save();

		// Field USGRt22
		$this->USGRt22->AdvancedSearch->SearchValue = @$filter["x_USGRt22"];
		$this->USGRt22->AdvancedSearch->SearchOperator = @$filter["z_USGRt22"];
		$this->USGRt22->AdvancedSearch->SearchCondition = @$filter["v_USGRt22"];
		$this->USGRt22->AdvancedSearch->SearchValue2 = @$filter["y_USGRt22"];
		$this->USGRt22->AdvancedSearch->SearchOperator2 = @$filter["w_USGRt22"];
		$this->USGRt22->AdvancedSearch->save();

		// Field USGRt23
		$this->USGRt23->AdvancedSearch->SearchValue = @$filter["x_USGRt23"];
		$this->USGRt23->AdvancedSearch->SearchOperator = @$filter["z_USGRt23"];
		$this->USGRt23->AdvancedSearch->SearchCondition = @$filter["v_USGRt23"];
		$this->USGRt23->AdvancedSearch->SearchValue2 = @$filter["y_USGRt23"];
		$this->USGRt23->AdvancedSearch->SearchOperator2 = @$filter["w_USGRt23"];
		$this->USGRt23->AdvancedSearch->save();

		// Field USGRt24
		$this->USGRt24->AdvancedSearch->SearchValue = @$filter["x_USGRt24"];
		$this->USGRt24->AdvancedSearch->SearchOperator = @$filter["z_USGRt24"];
		$this->USGRt24->AdvancedSearch->SearchCondition = @$filter["v_USGRt24"];
		$this->USGRt24->AdvancedSearch->SearchValue2 = @$filter["y_USGRt24"];
		$this->USGRt24->AdvancedSearch->SearchOperator2 = @$filter["w_USGRt24"];
		$this->USGRt24->AdvancedSearch->save();

		// Field USGRt25
		$this->USGRt25->AdvancedSearch->SearchValue = @$filter["x_USGRt25"];
		$this->USGRt25->AdvancedSearch->SearchOperator = @$filter["z_USGRt25"];
		$this->USGRt25->AdvancedSearch->SearchCondition = @$filter["v_USGRt25"];
		$this->USGRt25->AdvancedSearch->SearchValue2 = @$filter["y_USGRt25"];
		$this->USGRt25->AdvancedSearch->SearchOperator2 = @$filter["w_USGRt25"];
		$this->USGRt25->AdvancedSearch->save();

		// Field USGLt14
		$this->USGLt14->AdvancedSearch->SearchValue = @$filter["x_USGLt14"];
		$this->USGLt14->AdvancedSearch->SearchOperator = @$filter["z_USGLt14"];
		$this->USGLt14->AdvancedSearch->SearchCondition = @$filter["v_USGLt14"];
		$this->USGLt14->AdvancedSearch->SearchValue2 = @$filter["y_USGLt14"];
		$this->USGLt14->AdvancedSearch->SearchOperator2 = @$filter["w_USGLt14"];
		$this->USGLt14->AdvancedSearch->save();

		// Field USGLt15
		$this->USGLt15->AdvancedSearch->SearchValue = @$filter["x_USGLt15"];
		$this->USGLt15->AdvancedSearch->SearchOperator = @$filter["z_USGLt15"];
		$this->USGLt15->AdvancedSearch->SearchCondition = @$filter["v_USGLt15"];
		$this->USGLt15->AdvancedSearch->SearchValue2 = @$filter["y_USGLt15"];
		$this->USGLt15->AdvancedSearch->SearchOperator2 = @$filter["w_USGLt15"];
		$this->USGLt15->AdvancedSearch->save();

		// Field USGLt16
		$this->USGLt16->AdvancedSearch->SearchValue = @$filter["x_USGLt16"];
		$this->USGLt16->AdvancedSearch->SearchOperator = @$filter["z_USGLt16"];
		$this->USGLt16->AdvancedSearch->SearchCondition = @$filter["v_USGLt16"];
		$this->USGLt16->AdvancedSearch->SearchValue2 = @$filter["y_USGLt16"];
		$this->USGLt16->AdvancedSearch->SearchOperator2 = @$filter["w_USGLt16"];
		$this->USGLt16->AdvancedSearch->save();

		// Field USGLt17
		$this->USGLt17->AdvancedSearch->SearchValue = @$filter["x_USGLt17"];
		$this->USGLt17->AdvancedSearch->SearchOperator = @$filter["z_USGLt17"];
		$this->USGLt17->AdvancedSearch->SearchCondition = @$filter["v_USGLt17"];
		$this->USGLt17->AdvancedSearch->SearchValue2 = @$filter["y_USGLt17"];
		$this->USGLt17->AdvancedSearch->SearchOperator2 = @$filter["w_USGLt17"];
		$this->USGLt17->AdvancedSearch->save();

		// Field USGLt18
		$this->USGLt18->AdvancedSearch->SearchValue = @$filter["x_USGLt18"];
		$this->USGLt18->AdvancedSearch->SearchOperator = @$filter["z_USGLt18"];
		$this->USGLt18->AdvancedSearch->SearchCondition = @$filter["v_USGLt18"];
		$this->USGLt18->AdvancedSearch->SearchValue2 = @$filter["y_USGLt18"];
		$this->USGLt18->AdvancedSearch->SearchOperator2 = @$filter["w_USGLt18"];
		$this->USGLt18->AdvancedSearch->save();

		// Field USGLt19
		$this->USGLt19->AdvancedSearch->SearchValue = @$filter["x_USGLt19"];
		$this->USGLt19->AdvancedSearch->SearchOperator = @$filter["z_USGLt19"];
		$this->USGLt19->AdvancedSearch->SearchCondition = @$filter["v_USGLt19"];
		$this->USGLt19->AdvancedSearch->SearchValue2 = @$filter["y_USGLt19"];
		$this->USGLt19->AdvancedSearch->SearchOperator2 = @$filter["w_USGLt19"];
		$this->USGLt19->AdvancedSearch->save();

		// Field USGLt20
		$this->USGLt20->AdvancedSearch->SearchValue = @$filter["x_USGLt20"];
		$this->USGLt20->AdvancedSearch->SearchOperator = @$filter["z_USGLt20"];
		$this->USGLt20->AdvancedSearch->SearchCondition = @$filter["v_USGLt20"];
		$this->USGLt20->AdvancedSearch->SearchValue2 = @$filter["y_USGLt20"];
		$this->USGLt20->AdvancedSearch->SearchOperator2 = @$filter["w_USGLt20"];
		$this->USGLt20->AdvancedSearch->save();

		// Field USGLt21
		$this->USGLt21->AdvancedSearch->SearchValue = @$filter["x_USGLt21"];
		$this->USGLt21->AdvancedSearch->SearchOperator = @$filter["z_USGLt21"];
		$this->USGLt21->AdvancedSearch->SearchCondition = @$filter["v_USGLt21"];
		$this->USGLt21->AdvancedSearch->SearchValue2 = @$filter["y_USGLt21"];
		$this->USGLt21->AdvancedSearch->SearchOperator2 = @$filter["w_USGLt21"];
		$this->USGLt21->AdvancedSearch->save();

		// Field USGLt22
		$this->USGLt22->AdvancedSearch->SearchValue = @$filter["x_USGLt22"];
		$this->USGLt22->AdvancedSearch->SearchOperator = @$filter["z_USGLt22"];
		$this->USGLt22->AdvancedSearch->SearchCondition = @$filter["v_USGLt22"];
		$this->USGLt22->AdvancedSearch->SearchValue2 = @$filter["y_USGLt22"];
		$this->USGLt22->AdvancedSearch->SearchOperator2 = @$filter["w_USGLt22"];
		$this->USGLt22->AdvancedSearch->save();

		// Field USGLt23
		$this->USGLt23->AdvancedSearch->SearchValue = @$filter["x_USGLt23"];
		$this->USGLt23->AdvancedSearch->SearchOperator = @$filter["z_USGLt23"];
		$this->USGLt23->AdvancedSearch->SearchCondition = @$filter["v_USGLt23"];
		$this->USGLt23->AdvancedSearch->SearchValue2 = @$filter["y_USGLt23"];
		$this->USGLt23->AdvancedSearch->SearchOperator2 = @$filter["w_USGLt23"];
		$this->USGLt23->AdvancedSearch->save();

		// Field USGLt24
		$this->USGLt24->AdvancedSearch->SearchValue = @$filter["x_USGLt24"];
		$this->USGLt24->AdvancedSearch->SearchOperator = @$filter["z_USGLt24"];
		$this->USGLt24->AdvancedSearch->SearchCondition = @$filter["v_USGLt24"];
		$this->USGLt24->AdvancedSearch->SearchValue2 = @$filter["y_USGLt24"];
		$this->USGLt24->AdvancedSearch->SearchOperator2 = @$filter["w_USGLt24"];
		$this->USGLt24->AdvancedSearch->save();

		// Field USGLt25
		$this->USGLt25->AdvancedSearch->SearchValue = @$filter["x_USGLt25"];
		$this->USGLt25->AdvancedSearch->SearchOperator = @$filter["z_USGLt25"];
		$this->USGLt25->AdvancedSearch->SearchCondition = @$filter["v_USGLt25"];
		$this->USGLt25->AdvancedSearch->SearchValue2 = @$filter["y_USGLt25"];
		$this->USGLt25->AdvancedSearch->SearchOperator2 = @$filter["w_USGLt25"];
		$this->USGLt25->AdvancedSearch->save();

		// Field EM14
		$this->EM14->AdvancedSearch->SearchValue = @$filter["x_EM14"];
		$this->EM14->AdvancedSearch->SearchOperator = @$filter["z_EM14"];
		$this->EM14->AdvancedSearch->SearchCondition = @$filter["v_EM14"];
		$this->EM14->AdvancedSearch->SearchValue2 = @$filter["y_EM14"];
		$this->EM14->AdvancedSearch->SearchOperator2 = @$filter["w_EM14"];
		$this->EM14->AdvancedSearch->save();

		// Field EM15
		$this->EM15->AdvancedSearch->SearchValue = @$filter["x_EM15"];
		$this->EM15->AdvancedSearch->SearchOperator = @$filter["z_EM15"];
		$this->EM15->AdvancedSearch->SearchCondition = @$filter["v_EM15"];
		$this->EM15->AdvancedSearch->SearchValue2 = @$filter["y_EM15"];
		$this->EM15->AdvancedSearch->SearchOperator2 = @$filter["w_EM15"];
		$this->EM15->AdvancedSearch->save();

		// Field EM16
		$this->EM16->AdvancedSearch->SearchValue = @$filter["x_EM16"];
		$this->EM16->AdvancedSearch->SearchOperator = @$filter["z_EM16"];
		$this->EM16->AdvancedSearch->SearchCondition = @$filter["v_EM16"];
		$this->EM16->AdvancedSearch->SearchValue2 = @$filter["y_EM16"];
		$this->EM16->AdvancedSearch->SearchOperator2 = @$filter["w_EM16"];
		$this->EM16->AdvancedSearch->save();

		// Field EM17
		$this->EM17->AdvancedSearch->SearchValue = @$filter["x_EM17"];
		$this->EM17->AdvancedSearch->SearchOperator = @$filter["z_EM17"];
		$this->EM17->AdvancedSearch->SearchCondition = @$filter["v_EM17"];
		$this->EM17->AdvancedSearch->SearchValue2 = @$filter["y_EM17"];
		$this->EM17->AdvancedSearch->SearchOperator2 = @$filter["w_EM17"];
		$this->EM17->AdvancedSearch->save();

		// Field EM18
		$this->EM18->AdvancedSearch->SearchValue = @$filter["x_EM18"];
		$this->EM18->AdvancedSearch->SearchOperator = @$filter["z_EM18"];
		$this->EM18->AdvancedSearch->SearchCondition = @$filter["v_EM18"];
		$this->EM18->AdvancedSearch->SearchValue2 = @$filter["y_EM18"];
		$this->EM18->AdvancedSearch->SearchOperator2 = @$filter["w_EM18"];
		$this->EM18->AdvancedSearch->save();

		// Field EM19
		$this->EM19->AdvancedSearch->SearchValue = @$filter["x_EM19"];
		$this->EM19->AdvancedSearch->SearchOperator = @$filter["z_EM19"];
		$this->EM19->AdvancedSearch->SearchCondition = @$filter["v_EM19"];
		$this->EM19->AdvancedSearch->SearchValue2 = @$filter["y_EM19"];
		$this->EM19->AdvancedSearch->SearchOperator2 = @$filter["w_EM19"];
		$this->EM19->AdvancedSearch->save();

		// Field EM20
		$this->EM20->AdvancedSearch->SearchValue = @$filter["x_EM20"];
		$this->EM20->AdvancedSearch->SearchOperator = @$filter["z_EM20"];
		$this->EM20->AdvancedSearch->SearchCondition = @$filter["v_EM20"];
		$this->EM20->AdvancedSearch->SearchValue2 = @$filter["y_EM20"];
		$this->EM20->AdvancedSearch->SearchOperator2 = @$filter["w_EM20"];
		$this->EM20->AdvancedSearch->save();

		// Field EM21
		$this->EM21->AdvancedSearch->SearchValue = @$filter["x_EM21"];
		$this->EM21->AdvancedSearch->SearchOperator = @$filter["z_EM21"];
		$this->EM21->AdvancedSearch->SearchCondition = @$filter["v_EM21"];
		$this->EM21->AdvancedSearch->SearchValue2 = @$filter["y_EM21"];
		$this->EM21->AdvancedSearch->SearchOperator2 = @$filter["w_EM21"];
		$this->EM21->AdvancedSearch->save();

		// Field EM22
		$this->EM22->AdvancedSearch->SearchValue = @$filter["x_EM22"];
		$this->EM22->AdvancedSearch->SearchOperator = @$filter["z_EM22"];
		$this->EM22->AdvancedSearch->SearchCondition = @$filter["v_EM22"];
		$this->EM22->AdvancedSearch->SearchValue2 = @$filter["y_EM22"];
		$this->EM22->AdvancedSearch->SearchOperator2 = @$filter["w_EM22"];
		$this->EM22->AdvancedSearch->save();

		// Field EM23
		$this->EM23->AdvancedSearch->SearchValue = @$filter["x_EM23"];
		$this->EM23->AdvancedSearch->SearchOperator = @$filter["z_EM23"];
		$this->EM23->AdvancedSearch->SearchCondition = @$filter["v_EM23"];
		$this->EM23->AdvancedSearch->SearchValue2 = @$filter["y_EM23"];
		$this->EM23->AdvancedSearch->SearchOperator2 = @$filter["w_EM23"];
		$this->EM23->AdvancedSearch->save();

		// Field EM24
		$this->EM24->AdvancedSearch->SearchValue = @$filter["x_EM24"];
		$this->EM24->AdvancedSearch->SearchOperator = @$filter["z_EM24"];
		$this->EM24->AdvancedSearch->SearchCondition = @$filter["v_EM24"];
		$this->EM24->AdvancedSearch->SearchValue2 = @$filter["y_EM24"];
		$this->EM24->AdvancedSearch->SearchOperator2 = @$filter["w_EM24"];
		$this->EM24->AdvancedSearch->save();

		// Field EM25
		$this->EM25->AdvancedSearch->SearchValue = @$filter["x_EM25"];
		$this->EM25->AdvancedSearch->SearchOperator = @$filter["z_EM25"];
		$this->EM25->AdvancedSearch->SearchCondition = @$filter["v_EM25"];
		$this->EM25->AdvancedSearch->SearchValue2 = @$filter["y_EM25"];
		$this->EM25->AdvancedSearch->SearchOperator2 = @$filter["w_EM25"];
		$this->EM25->AdvancedSearch->save();

		// Field Others14
		$this->Others14->AdvancedSearch->SearchValue = @$filter["x_Others14"];
		$this->Others14->AdvancedSearch->SearchOperator = @$filter["z_Others14"];
		$this->Others14->AdvancedSearch->SearchCondition = @$filter["v_Others14"];
		$this->Others14->AdvancedSearch->SearchValue2 = @$filter["y_Others14"];
		$this->Others14->AdvancedSearch->SearchOperator2 = @$filter["w_Others14"];
		$this->Others14->AdvancedSearch->save();

		// Field Others15
		$this->Others15->AdvancedSearch->SearchValue = @$filter["x_Others15"];
		$this->Others15->AdvancedSearch->SearchOperator = @$filter["z_Others15"];
		$this->Others15->AdvancedSearch->SearchCondition = @$filter["v_Others15"];
		$this->Others15->AdvancedSearch->SearchValue2 = @$filter["y_Others15"];
		$this->Others15->AdvancedSearch->SearchOperator2 = @$filter["w_Others15"];
		$this->Others15->AdvancedSearch->save();

		// Field Others16
		$this->Others16->AdvancedSearch->SearchValue = @$filter["x_Others16"];
		$this->Others16->AdvancedSearch->SearchOperator = @$filter["z_Others16"];
		$this->Others16->AdvancedSearch->SearchCondition = @$filter["v_Others16"];
		$this->Others16->AdvancedSearch->SearchValue2 = @$filter["y_Others16"];
		$this->Others16->AdvancedSearch->SearchOperator2 = @$filter["w_Others16"];
		$this->Others16->AdvancedSearch->save();

		// Field Others17
		$this->Others17->AdvancedSearch->SearchValue = @$filter["x_Others17"];
		$this->Others17->AdvancedSearch->SearchOperator = @$filter["z_Others17"];
		$this->Others17->AdvancedSearch->SearchCondition = @$filter["v_Others17"];
		$this->Others17->AdvancedSearch->SearchValue2 = @$filter["y_Others17"];
		$this->Others17->AdvancedSearch->SearchOperator2 = @$filter["w_Others17"];
		$this->Others17->AdvancedSearch->save();

		// Field Others18
		$this->Others18->AdvancedSearch->SearchValue = @$filter["x_Others18"];
		$this->Others18->AdvancedSearch->SearchOperator = @$filter["z_Others18"];
		$this->Others18->AdvancedSearch->SearchCondition = @$filter["v_Others18"];
		$this->Others18->AdvancedSearch->SearchValue2 = @$filter["y_Others18"];
		$this->Others18->AdvancedSearch->SearchOperator2 = @$filter["w_Others18"];
		$this->Others18->AdvancedSearch->save();

		// Field Others19
		$this->Others19->AdvancedSearch->SearchValue = @$filter["x_Others19"];
		$this->Others19->AdvancedSearch->SearchOperator = @$filter["z_Others19"];
		$this->Others19->AdvancedSearch->SearchCondition = @$filter["v_Others19"];
		$this->Others19->AdvancedSearch->SearchValue2 = @$filter["y_Others19"];
		$this->Others19->AdvancedSearch->SearchOperator2 = @$filter["w_Others19"];
		$this->Others19->AdvancedSearch->save();

		// Field Others20
		$this->Others20->AdvancedSearch->SearchValue = @$filter["x_Others20"];
		$this->Others20->AdvancedSearch->SearchOperator = @$filter["z_Others20"];
		$this->Others20->AdvancedSearch->SearchCondition = @$filter["v_Others20"];
		$this->Others20->AdvancedSearch->SearchValue2 = @$filter["y_Others20"];
		$this->Others20->AdvancedSearch->SearchOperator2 = @$filter["w_Others20"];
		$this->Others20->AdvancedSearch->save();

		// Field Others21
		$this->Others21->AdvancedSearch->SearchValue = @$filter["x_Others21"];
		$this->Others21->AdvancedSearch->SearchOperator = @$filter["z_Others21"];
		$this->Others21->AdvancedSearch->SearchCondition = @$filter["v_Others21"];
		$this->Others21->AdvancedSearch->SearchValue2 = @$filter["y_Others21"];
		$this->Others21->AdvancedSearch->SearchOperator2 = @$filter["w_Others21"];
		$this->Others21->AdvancedSearch->save();

		// Field Others22
		$this->Others22->AdvancedSearch->SearchValue = @$filter["x_Others22"];
		$this->Others22->AdvancedSearch->SearchOperator = @$filter["z_Others22"];
		$this->Others22->AdvancedSearch->SearchCondition = @$filter["v_Others22"];
		$this->Others22->AdvancedSearch->SearchValue2 = @$filter["y_Others22"];
		$this->Others22->AdvancedSearch->SearchOperator2 = @$filter["w_Others22"];
		$this->Others22->AdvancedSearch->save();

		// Field Others23
		$this->Others23->AdvancedSearch->SearchValue = @$filter["x_Others23"];
		$this->Others23->AdvancedSearch->SearchOperator = @$filter["z_Others23"];
		$this->Others23->AdvancedSearch->SearchCondition = @$filter["v_Others23"];
		$this->Others23->AdvancedSearch->SearchValue2 = @$filter["y_Others23"];
		$this->Others23->AdvancedSearch->SearchOperator2 = @$filter["w_Others23"];
		$this->Others23->AdvancedSearch->save();

		// Field Others24
		$this->Others24->AdvancedSearch->SearchValue = @$filter["x_Others24"];
		$this->Others24->AdvancedSearch->SearchOperator = @$filter["z_Others24"];
		$this->Others24->AdvancedSearch->SearchCondition = @$filter["v_Others24"];
		$this->Others24->AdvancedSearch->SearchValue2 = @$filter["y_Others24"];
		$this->Others24->AdvancedSearch->SearchOperator2 = @$filter["w_Others24"];
		$this->Others24->AdvancedSearch->save();

		// Field Others25
		$this->Others25->AdvancedSearch->SearchValue = @$filter["x_Others25"];
		$this->Others25->AdvancedSearch->SearchOperator = @$filter["z_Others25"];
		$this->Others25->AdvancedSearch->SearchCondition = @$filter["v_Others25"];
		$this->Others25->AdvancedSearch->SearchValue2 = @$filter["y_Others25"];
		$this->Others25->AdvancedSearch->SearchOperator2 = @$filter["w_Others25"];
		$this->Others25->AdvancedSearch->save();

		// Field DR14
		$this->DR14->AdvancedSearch->SearchValue = @$filter["x_DR14"];
		$this->DR14->AdvancedSearch->SearchOperator = @$filter["z_DR14"];
		$this->DR14->AdvancedSearch->SearchCondition = @$filter["v_DR14"];
		$this->DR14->AdvancedSearch->SearchValue2 = @$filter["y_DR14"];
		$this->DR14->AdvancedSearch->SearchOperator2 = @$filter["w_DR14"];
		$this->DR14->AdvancedSearch->save();

		// Field DR15
		$this->DR15->AdvancedSearch->SearchValue = @$filter["x_DR15"];
		$this->DR15->AdvancedSearch->SearchOperator = @$filter["z_DR15"];
		$this->DR15->AdvancedSearch->SearchCondition = @$filter["v_DR15"];
		$this->DR15->AdvancedSearch->SearchValue2 = @$filter["y_DR15"];
		$this->DR15->AdvancedSearch->SearchOperator2 = @$filter["w_DR15"];
		$this->DR15->AdvancedSearch->save();

		// Field DR16
		$this->DR16->AdvancedSearch->SearchValue = @$filter["x_DR16"];
		$this->DR16->AdvancedSearch->SearchOperator = @$filter["z_DR16"];
		$this->DR16->AdvancedSearch->SearchCondition = @$filter["v_DR16"];
		$this->DR16->AdvancedSearch->SearchValue2 = @$filter["y_DR16"];
		$this->DR16->AdvancedSearch->SearchOperator2 = @$filter["w_DR16"];
		$this->DR16->AdvancedSearch->save();

		// Field DR17
		$this->DR17->AdvancedSearch->SearchValue = @$filter["x_DR17"];
		$this->DR17->AdvancedSearch->SearchOperator = @$filter["z_DR17"];
		$this->DR17->AdvancedSearch->SearchCondition = @$filter["v_DR17"];
		$this->DR17->AdvancedSearch->SearchValue2 = @$filter["y_DR17"];
		$this->DR17->AdvancedSearch->SearchOperator2 = @$filter["w_DR17"];
		$this->DR17->AdvancedSearch->save();

		// Field DR18
		$this->DR18->AdvancedSearch->SearchValue = @$filter["x_DR18"];
		$this->DR18->AdvancedSearch->SearchOperator = @$filter["z_DR18"];
		$this->DR18->AdvancedSearch->SearchCondition = @$filter["v_DR18"];
		$this->DR18->AdvancedSearch->SearchValue2 = @$filter["y_DR18"];
		$this->DR18->AdvancedSearch->SearchOperator2 = @$filter["w_DR18"];
		$this->DR18->AdvancedSearch->save();

		// Field DR19
		$this->DR19->AdvancedSearch->SearchValue = @$filter["x_DR19"];
		$this->DR19->AdvancedSearch->SearchOperator = @$filter["z_DR19"];
		$this->DR19->AdvancedSearch->SearchCondition = @$filter["v_DR19"];
		$this->DR19->AdvancedSearch->SearchValue2 = @$filter["y_DR19"];
		$this->DR19->AdvancedSearch->SearchOperator2 = @$filter["w_DR19"];
		$this->DR19->AdvancedSearch->save();

		// Field DR20
		$this->DR20->AdvancedSearch->SearchValue = @$filter["x_DR20"];
		$this->DR20->AdvancedSearch->SearchOperator = @$filter["z_DR20"];
		$this->DR20->AdvancedSearch->SearchCondition = @$filter["v_DR20"];
		$this->DR20->AdvancedSearch->SearchValue2 = @$filter["y_DR20"];
		$this->DR20->AdvancedSearch->SearchOperator2 = @$filter["w_DR20"];
		$this->DR20->AdvancedSearch->save();

		// Field DR21
		$this->DR21->AdvancedSearch->SearchValue = @$filter["x_DR21"];
		$this->DR21->AdvancedSearch->SearchOperator = @$filter["z_DR21"];
		$this->DR21->AdvancedSearch->SearchCondition = @$filter["v_DR21"];
		$this->DR21->AdvancedSearch->SearchValue2 = @$filter["y_DR21"];
		$this->DR21->AdvancedSearch->SearchOperator2 = @$filter["w_DR21"];
		$this->DR21->AdvancedSearch->save();

		// Field DR22
		$this->DR22->AdvancedSearch->SearchValue = @$filter["x_DR22"];
		$this->DR22->AdvancedSearch->SearchOperator = @$filter["z_DR22"];
		$this->DR22->AdvancedSearch->SearchCondition = @$filter["v_DR22"];
		$this->DR22->AdvancedSearch->SearchValue2 = @$filter["y_DR22"];
		$this->DR22->AdvancedSearch->SearchOperator2 = @$filter["w_DR22"];
		$this->DR22->AdvancedSearch->save();

		// Field DR23
		$this->DR23->AdvancedSearch->SearchValue = @$filter["x_DR23"];
		$this->DR23->AdvancedSearch->SearchOperator = @$filter["z_DR23"];
		$this->DR23->AdvancedSearch->SearchCondition = @$filter["v_DR23"];
		$this->DR23->AdvancedSearch->SearchValue2 = @$filter["y_DR23"];
		$this->DR23->AdvancedSearch->SearchOperator2 = @$filter["w_DR23"];
		$this->DR23->AdvancedSearch->save();

		// Field DR24
		$this->DR24->AdvancedSearch->SearchValue = @$filter["x_DR24"];
		$this->DR24->AdvancedSearch->SearchOperator = @$filter["z_DR24"];
		$this->DR24->AdvancedSearch->SearchCondition = @$filter["v_DR24"];
		$this->DR24->AdvancedSearch->SearchValue2 = @$filter["y_DR24"];
		$this->DR24->AdvancedSearch->SearchOperator2 = @$filter["w_DR24"];
		$this->DR24->AdvancedSearch->save();

		// Field DR25
		$this->DR25->AdvancedSearch->SearchValue = @$filter["x_DR25"];
		$this->DR25->AdvancedSearch->SearchOperator = @$filter["z_DR25"];
		$this->DR25->AdvancedSearch->SearchCondition = @$filter["v_DR25"];
		$this->DR25->AdvancedSearch->SearchValue2 = @$filter["y_DR25"];
		$this->DR25->AdvancedSearch->SearchOperator2 = @$filter["w_DR25"];
		$this->DR25->AdvancedSearch->save();

		// Field E214
		$this->E214->AdvancedSearch->SearchValue = @$filter["x_E214"];
		$this->E214->AdvancedSearch->SearchOperator = @$filter["z_E214"];
		$this->E214->AdvancedSearch->SearchCondition = @$filter["v_E214"];
		$this->E214->AdvancedSearch->SearchValue2 = @$filter["y_E214"];
		$this->E214->AdvancedSearch->SearchOperator2 = @$filter["w_E214"];
		$this->E214->AdvancedSearch->save();

		// Field E215
		$this->E215->AdvancedSearch->SearchValue = @$filter["x_E215"];
		$this->E215->AdvancedSearch->SearchOperator = @$filter["z_E215"];
		$this->E215->AdvancedSearch->SearchCondition = @$filter["v_E215"];
		$this->E215->AdvancedSearch->SearchValue2 = @$filter["y_E215"];
		$this->E215->AdvancedSearch->SearchOperator2 = @$filter["w_E215"];
		$this->E215->AdvancedSearch->save();

		// Field E216
		$this->E216->AdvancedSearch->SearchValue = @$filter["x_E216"];
		$this->E216->AdvancedSearch->SearchOperator = @$filter["z_E216"];
		$this->E216->AdvancedSearch->SearchCondition = @$filter["v_E216"];
		$this->E216->AdvancedSearch->SearchValue2 = @$filter["y_E216"];
		$this->E216->AdvancedSearch->SearchOperator2 = @$filter["w_E216"];
		$this->E216->AdvancedSearch->save();

		// Field E217
		$this->E217->AdvancedSearch->SearchValue = @$filter["x_E217"];
		$this->E217->AdvancedSearch->SearchOperator = @$filter["z_E217"];
		$this->E217->AdvancedSearch->SearchCondition = @$filter["v_E217"];
		$this->E217->AdvancedSearch->SearchValue2 = @$filter["y_E217"];
		$this->E217->AdvancedSearch->SearchOperator2 = @$filter["w_E217"];
		$this->E217->AdvancedSearch->save();

		// Field E218
		$this->E218->AdvancedSearch->SearchValue = @$filter["x_E218"];
		$this->E218->AdvancedSearch->SearchOperator = @$filter["z_E218"];
		$this->E218->AdvancedSearch->SearchCondition = @$filter["v_E218"];
		$this->E218->AdvancedSearch->SearchValue2 = @$filter["y_E218"];
		$this->E218->AdvancedSearch->SearchOperator2 = @$filter["w_E218"];
		$this->E218->AdvancedSearch->save();

		// Field E219
		$this->E219->AdvancedSearch->SearchValue = @$filter["x_E219"];
		$this->E219->AdvancedSearch->SearchOperator = @$filter["z_E219"];
		$this->E219->AdvancedSearch->SearchCondition = @$filter["v_E219"];
		$this->E219->AdvancedSearch->SearchValue2 = @$filter["y_E219"];
		$this->E219->AdvancedSearch->SearchOperator2 = @$filter["w_E219"];
		$this->E219->AdvancedSearch->save();

		// Field E220
		$this->E220->AdvancedSearch->SearchValue = @$filter["x_E220"];
		$this->E220->AdvancedSearch->SearchOperator = @$filter["z_E220"];
		$this->E220->AdvancedSearch->SearchCondition = @$filter["v_E220"];
		$this->E220->AdvancedSearch->SearchValue2 = @$filter["y_E220"];
		$this->E220->AdvancedSearch->SearchOperator2 = @$filter["w_E220"];
		$this->E220->AdvancedSearch->save();

		// Field E221
		$this->E221->AdvancedSearch->SearchValue = @$filter["x_E221"];
		$this->E221->AdvancedSearch->SearchOperator = @$filter["z_E221"];
		$this->E221->AdvancedSearch->SearchCondition = @$filter["v_E221"];
		$this->E221->AdvancedSearch->SearchValue2 = @$filter["y_E221"];
		$this->E221->AdvancedSearch->SearchOperator2 = @$filter["w_E221"];
		$this->E221->AdvancedSearch->save();

		// Field E222
		$this->E222->AdvancedSearch->SearchValue = @$filter["x_E222"];
		$this->E222->AdvancedSearch->SearchOperator = @$filter["z_E222"];
		$this->E222->AdvancedSearch->SearchCondition = @$filter["v_E222"];
		$this->E222->AdvancedSearch->SearchValue2 = @$filter["y_E222"];
		$this->E222->AdvancedSearch->SearchOperator2 = @$filter["w_E222"];
		$this->E222->AdvancedSearch->save();

		// Field E223
		$this->E223->AdvancedSearch->SearchValue = @$filter["x_E223"];
		$this->E223->AdvancedSearch->SearchOperator = @$filter["z_E223"];
		$this->E223->AdvancedSearch->SearchCondition = @$filter["v_E223"];
		$this->E223->AdvancedSearch->SearchValue2 = @$filter["y_E223"];
		$this->E223->AdvancedSearch->SearchOperator2 = @$filter["w_E223"];
		$this->E223->AdvancedSearch->save();

		// Field E224
		$this->E224->AdvancedSearch->SearchValue = @$filter["x_E224"];
		$this->E224->AdvancedSearch->SearchOperator = @$filter["z_E224"];
		$this->E224->AdvancedSearch->SearchCondition = @$filter["v_E224"];
		$this->E224->AdvancedSearch->SearchValue2 = @$filter["y_E224"];
		$this->E224->AdvancedSearch->SearchOperator2 = @$filter["w_E224"];
		$this->E224->AdvancedSearch->save();

		// Field E225
		$this->E225->AdvancedSearch->SearchValue = @$filter["x_E225"];
		$this->E225->AdvancedSearch->SearchOperator = @$filter["z_E225"];
		$this->E225->AdvancedSearch->SearchCondition = @$filter["v_E225"];
		$this->E225->AdvancedSearch->SearchValue2 = @$filter["y_E225"];
		$this->E225->AdvancedSearch->SearchOperator2 = @$filter["w_E225"];
		$this->E225->AdvancedSearch->save();

		// Field EEETTTDTE
		$this->EEETTTDTE->AdvancedSearch->SearchValue = @$filter["x_EEETTTDTE"];
		$this->EEETTTDTE->AdvancedSearch->SearchOperator = @$filter["z_EEETTTDTE"];
		$this->EEETTTDTE->AdvancedSearch->SearchCondition = @$filter["v_EEETTTDTE"];
		$this->EEETTTDTE->AdvancedSearch->SearchValue2 = @$filter["y_EEETTTDTE"];
		$this->EEETTTDTE->AdvancedSearch->SearchOperator2 = @$filter["w_EEETTTDTE"];
		$this->EEETTTDTE->AdvancedSearch->save();

		// Field bhcgdate
		$this->bhcgdate->AdvancedSearch->SearchValue = @$filter["x_bhcgdate"];
		$this->bhcgdate->AdvancedSearch->SearchOperator = @$filter["z_bhcgdate"];
		$this->bhcgdate->AdvancedSearch->SearchCondition = @$filter["v_bhcgdate"];
		$this->bhcgdate->AdvancedSearch->SearchValue2 = @$filter["y_bhcgdate"];
		$this->bhcgdate->AdvancedSearch->SearchOperator2 = @$filter["w_bhcgdate"];
		$this->bhcgdate->AdvancedSearch->save();

		// Field TUBAL_PATENCY
		$this->TUBAL_PATENCY->AdvancedSearch->SearchValue = @$filter["x_TUBAL_PATENCY"];
		$this->TUBAL_PATENCY->AdvancedSearch->SearchOperator = @$filter["z_TUBAL_PATENCY"];
		$this->TUBAL_PATENCY->AdvancedSearch->SearchCondition = @$filter["v_TUBAL_PATENCY"];
		$this->TUBAL_PATENCY->AdvancedSearch->SearchValue2 = @$filter["y_TUBAL_PATENCY"];
		$this->TUBAL_PATENCY->AdvancedSearch->SearchOperator2 = @$filter["w_TUBAL_PATENCY"];
		$this->TUBAL_PATENCY->AdvancedSearch->save();

		// Field HSG
		$this->HSG->AdvancedSearch->SearchValue = @$filter["x_HSG"];
		$this->HSG->AdvancedSearch->SearchOperator = @$filter["z_HSG"];
		$this->HSG->AdvancedSearch->SearchCondition = @$filter["v_HSG"];
		$this->HSG->AdvancedSearch->SearchValue2 = @$filter["y_HSG"];
		$this->HSG->AdvancedSearch->SearchOperator2 = @$filter["w_HSG"];
		$this->HSG->AdvancedSearch->save();

		// Field DHL
		$this->DHL->AdvancedSearch->SearchValue = @$filter["x_DHL"];
		$this->DHL->AdvancedSearch->SearchOperator = @$filter["z_DHL"];
		$this->DHL->AdvancedSearch->SearchCondition = @$filter["v_DHL"];
		$this->DHL->AdvancedSearch->SearchValue2 = @$filter["y_DHL"];
		$this->DHL->AdvancedSearch->SearchOperator2 = @$filter["w_DHL"];
		$this->DHL->AdvancedSearch->save();

		// Field UTERINE_PROBLEMS
		$this->UTERINE_PROBLEMS->AdvancedSearch->SearchValue = @$filter["x_UTERINE_PROBLEMS"];
		$this->UTERINE_PROBLEMS->AdvancedSearch->SearchOperator = @$filter["z_UTERINE_PROBLEMS"];
		$this->UTERINE_PROBLEMS->AdvancedSearch->SearchCondition = @$filter["v_UTERINE_PROBLEMS"];
		$this->UTERINE_PROBLEMS->AdvancedSearch->SearchValue2 = @$filter["y_UTERINE_PROBLEMS"];
		$this->UTERINE_PROBLEMS->AdvancedSearch->SearchOperator2 = @$filter["w_UTERINE_PROBLEMS"];
		$this->UTERINE_PROBLEMS->AdvancedSearch->save();

		// Field W_COMORBIDS
		$this->W_COMORBIDS->AdvancedSearch->SearchValue = @$filter["x_W_COMORBIDS"];
		$this->W_COMORBIDS->AdvancedSearch->SearchOperator = @$filter["z_W_COMORBIDS"];
		$this->W_COMORBIDS->AdvancedSearch->SearchCondition = @$filter["v_W_COMORBIDS"];
		$this->W_COMORBIDS->AdvancedSearch->SearchValue2 = @$filter["y_W_COMORBIDS"];
		$this->W_COMORBIDS->AdvancedSearch->SearchOperator2 = @$filter["w_W_COMORBIDS"];
		$this->W_COMORBIDS->AdvancedSearch->save();

		// Field H_COMORBIDS
		$this->H_COMORBIDS->AdvancedSearch->SearchValue = @$filter["x_H_COMORBIDS"];
		$this->H_COMORBIDS->AdvancedSearch->SearchOperator = @$filter["z_H_COMORBIDS"];
		$this->H_COMORBIDS->AdvancedSearch->SearchCondition = @$filter["v_H_COMORBIDS"];
		$this->H_COMORBIDS->AdvancedSearch->SearchValue2 = @$filter["y_H_COMORBIDS"];
		$this->H_COMORBIDS->AdvancedSearch->SearchOperator2 = @$filter["w_H_COMORBIDS"];
		$this->H_COMORBIDS->AdvancedSearch->save();

		// Field SEXUAL_DYSFUNCTION
		$this->SEXUAL_DYSFUNCTION->AdvancedSearch->SearchValue = @$filter["x_SEXUAL_DYSFUNCTION"];
		$this->SEXUAL_DYSFUNCTION->AdvancedSearch->SearchOperator = @$filter["z_SEXUAL_DYSFUNCTION"];
		$this->SEXUAL_DYSFUNCTION->AdvancedSearch->SearchCondition = @$filter["v_SEXUAL_DYSFUNCTION"];
		$this->SEXUAL_DYSFUNCTION->AdvancedSearch->SearchValue2 = @$filter["y_SEXUAL_DYSFUNCTION"];
		$this->SEXUAL_DYSFUNCTION->AdvancedSearch->SearchOperator2 = @$filter["w_SEXUAL_DYSFUNCTION"];
		$this->SEXUAL_DYSFUNCTION->AdvancedSearch->save();

		// Field TABLETS
		$this->TABLETS->AdvancedSearch->SearchValue = @$filter["x_TABLETS"];
		$this->TABLETS->AdvancedSearch->SearchOperator = @$filter["z_TABLETS"];
		$this->TABLETS->AdvancedSearch->SearchCondition = @$filter["v_TABLETS"];
		$this->TABLETS->AdvancedSearch->SearchValue2 = @$filter["y_TABLETS"];
		$this->TABLETS->AdvancedSearch->SearchOperator2 = @$filter["w_TABLETS"];
		$this->TABLETS->AdvancedSearch->save();

		// Field FOLLICLE_STATUS
		$this->FOLLICLE_STATUS->AdvancedSearch->SearchValue = @$filter["x_FOLLICLE_STATUS"];
		$this->FOLLICLE_STATUS->AdvancedSearch->SearchOperator = @$filter["z_FOLLICLE_STATUS"];
		$this->FOLLICLE_STATUS->AdvancedSearch->SearchCondition = @$filter["v_FOLLICLE_STATUS"];
		$this->FOLLICLE_STATUS->AdvancedSearch->SearchValue2 = @$filter["y_FOLLICLE_STATUS"];
		$this->FOLLICLE_STATUS->AdvancedSearch->SearchOperator2 = @$filter["w_FOLLICLE_STATUS"];
		$this->FOLLICLE_STATUS->AdvancedSearch->save();

		// Field NUMBER_OF_IUI
		$this->NUMBER_OF_IUI->AdvancedSearch->SearchValue = @$filter["x_NUMBER_OF_IUI"];
		$this->NUMBER_OF_IUI->AdvancedSearch->SearchOperator = @$filter["z_NUMBER_OF_IUI"];
		$this->NUMBER_OF_IUI->AdvancedSearch->SearchCondition = @$filter["v_NUMBER_OF_IUI"];
		$this->NUMBER_OF_IUI->AdvancedSearch->SearchValue2 = @$filter["y_NUMBER_OF_IUI"];
		$this->NUMBER_OF_IUI->AdvancedSearch->SearchOperator2 = @$filter["w_NUMBER_OF_IUI"];
		$this->NUMBER_OF_IUI->AdvancedSearch->save();

		// Field PROCEDURE
		$this->PROCEDURE->AdvancedSearch->SearchValue = @$filter["x_PROCEDURE"];
		$this->PROCEDURE->AdvancedSearch->SearchOperator = @$filter["z_PROCEDURE"];
		$this->PROCEDURE->AdvancedSearch->SearchCondition = @$filter["v_PROCEDURE"];
		$this->PROCEDURE->AdvancedSearch->SearchValue2 = @$filter["y_PROCEDURE"];
		$this->PROCEDURE->AdvancedSearch->SearchOperator2 = @$filter["w_PROCEDURE"];
		$this->PROCEDURE->AdvancedSearch->save();

		// Field LUTEAL_SUPPORT
		$this->LUTEAL_SUPPORT->AdvancedSearch->SearchValue = @$filter["x_LUTEAL_SUPPORT"];
		$this->LUTEAL_SUPPORT->AdvancedSearch->SearchOperator = @$filter["z_LUTEAL_SUPPORT"];
		$this->LUTEAL_SUPPORT->AdvancedSearch->SearchCondition = @$filter["v_LUTEAL_SUPPORT"];
		$this->LUTEAL_SUPPORT->AdvancedSearch->SearchValue2 = @$filter["y_LUTEAL_SUPPORT"];
		$this->LUTEAL_SUPPORT->AdvancedSearch->SearchOperator2 = @$filter["w_LUTEAL_SUPPORT"];
		$this->LUTEAL_SUPPORT->AdvancedSearch->save();

		// Field SPECIFIC_MATERNAL_PROBLEMS
		$this->SPECIFIC_MATERNAL_PROBLEMS->AdvancedSearch->SearchValue = @$filter["x_SPECIFIC_MATERNAL_PROBLEMS"];
		$this->SPECIFIC_MATERNAL_PROBLEMS->AdvancedSearch->SearchOperator = @$filter["z_SPECIFIC_MATERNAL_PROBLEMS"];
		$this->SPECIFIC_MATERNAL_PROBLEMS->AdvancedSearch->SearchCondition = @$filter["v_SPECIFIC_MATERNAL_PROBLEMS"];
		$this->SPECIFIC_MATERNAL_PROBLEMS->AdvancedSearch->SearchValue2 = @$filter["y_SPECIFIC_MATERNAL_PROBLEMS"];
		$this->SPECIFIC_MATERNAL_PROBLEMS->AdvancedSearch->SearchOperator2 = @$filter["w_SPECIFIC_MATERNAL_PROBLEMS"];
		$this->SPECIFIC_MATERNAL_PROBLEMS->AdvancedSearch->save();

		// Field ONGOING_PREG
		$this->ONGOING_PREG->AdvancedSearch->SearchValue = @$filter["x_ONGOING_PREG"];
		$this->ONGOING_PREG->AdvancedSearch->SearchOperator = @$filter["z_ONGOING_PREG"];
		$this->ONGOING_PREG->AdvancedSearch->SearchCondition = @$filter["v_ONGOING_PREG"];
		$this->ONGOING_PREG->AdvancedSearch->SearchValue2 = @$filter["y_ONGOING_PREG"];
		$this->ONGOING_PREG->AdvancedSearch->SearchOperator2 = @$filter["w_ONGOING_PREG"];
		$this->ONGOING_PREG->AdvancedSearch->save();

		// Field EDD_Date
		$this->EDD_Date->AdvancedSearch->SearchValue = @$filter["x_EDD_Date"];
		$this->EDD_Date->AdvancedSearch->SearchOperator = @$filter["z_EDD_Date"];
		$this->EDD_Date->AdvancedSearch->SearchCondition = @$filter["v_EDD_Date"];
		$this->EDD_Date->AdvancedSearch->SearchValue2 = @$filter["y_EDD_Date"];
		$this->EDD_Date->AdvancedSearch->SearchOperator2 = @$filter["w_EDD_Date"];
		$this->EDD_Date->AdvancedSearch->save();
		$this->BasicSearch->setKeyword(@$filter[Config("TABLE_BASIC_SEARCH")]);
		$this->BasicSearch->setType(@$filter[Config("TABLE_BASIC_SEARCH_TYPE")]);
	}

	// Return basic search SQL
	protected function basicSearchSql($arKeywords, $type)
	{
		$where = "";
		$this->buildBasicSearchSql($where, $this->Name, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->ARTCycle, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->FemaleFactor, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->MaleFactor, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Protocol, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->A4ICSICycle, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->TotalICSICycle, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->TypeOfInfertility, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Duration, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->LMP, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->RelevantHistory, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->IUICycles, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->AFC, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->AMH, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->FBMI, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->MBMI, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->OvarianVolumeRT, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->OvarianVolumeLT, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->DAYSOFSTIMULATION, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->DOSEOFGONADOTROPINS, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->INJTYPE, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->ANTAGONISTDAYS, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->ANTAGONISTSTARTDAY, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->GROWTHHORMONE, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->PRETREATMENT, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->SerumP4, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->FORT, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->MedicalFactors, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->SCDate, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->OvarianSurgery, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->PreProcedureOrder, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->TRIGGERR, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->TRIGGERDATE, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->ATHOMEorCLINIC, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->OPUDATE, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->ALLFREEZEINDICATION, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->ERA, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->PGD, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->DATEOFET, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->ET, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->ESET, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->DOET, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->SEMENPREPARATION, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->REASONFORESET, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Expectedoocytes, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->StChDate1, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->StChDate2, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->StChDate3, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->StChDate4, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->StChDate5, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->StChDate6, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->StChDate7, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->StChDate8, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->StChDate9, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->StChDate10, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->StChDate11, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->StChDate12, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->StChDate13, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->CycleDay1, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->CycleDay2, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->CycleDay3, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->CycleDay4, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->CycleDay5, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->CycleDay6, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->CycleDay7, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->CycleDay8, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->CycleDay9, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->CycleDay10, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->CycleDay11, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->CycleDay12, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->CycleDay13, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->StimulationDay1, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->StimulationDay2, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->StimulationDay3, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->StimulationDay4, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->StimulationDay5, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->StimulationDay6, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->StimulationDay7, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->StimulationDay8, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->StimulationDay9, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->StimulationDay10, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->StimulationDay11, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->StimulationDay12, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->StimulationDay13, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Tablet1, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Tablet2, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Tablet3, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Tablet4, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Tablet5, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Tablet6, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Tablet7, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Tablet8, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Tablet9, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Tablet10, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Tablet11, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Tablet12, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Tablet13, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->RFSH1, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->RFSH2, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->RFSH3, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->RFSH4, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->RFSH5, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->RFSH6, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->RFSH7, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->RFSH8, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->RFSH9, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->RFSH10, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->RFSH11, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->RFSH12, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->RFSH13, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->HMG1, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->HMG2, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->HMG3, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->HMG4, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->HMG5, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->HMG6, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->HMG7, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->HMG8, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->HMG9, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->HMG10, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->HMG11, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->HMG12, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->HMG13, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->GnRH1, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->GnRH2, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->GnRH3, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->GnRH4, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->GnRH5, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->GnRH6, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->GnRH7, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->GnRH8, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->GnRH9, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->GnRH10, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->GnRH11, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->GnRH12, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->GnRH13, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->E21, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->E22, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->E23, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->E24, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->E25, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->E26, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->E27, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->E28, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->E29, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->E210, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->E211, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->E212, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->E213, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->P41, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->P42, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->P43, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->P44, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->P45, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->P46, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->P47, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->P48, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->P49, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->P410, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->P411, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->P412, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->P413, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->USGRt1, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->USGRt2, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->USGRt3, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->USGRt4, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->USGRt5, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->USGRt6, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->USGRt7, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->USGRt8, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->USGRt9, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->USGRt10, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->USGRt11, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->USGRt12, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->USGRt13, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->USGLt1, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->USGLt2, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->USGLt3, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->USGLt4, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->USGLt5, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->USGLt6, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->USGLt7, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->USGLt8, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->USGLt9, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->USGLt10, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->USGLt11, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->USGLt12, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->USGLt13, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->EM1, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->EM2, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->EM3, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->EM4, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->EM5, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->EM6, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->EM7, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->EM8, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->EM9, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->EM10, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->EM11, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->EM12, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->EM13, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Others1, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Others2, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Others3, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Others4, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Others5, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Others6, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Others7, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Others8, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Others9, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Others10, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Others11, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Others12, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Others13, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->DR1, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->DR2, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->DR3, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->DR4, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->DR5, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->DR6, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->DR7, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->DR8, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->DR9, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->DR10, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->DR11, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->DR12, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->DR13, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->DOCTORRESPONSIBLE, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Convert, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Consultant, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->InseminatinTechnique, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->IndicationForART, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Hysteroscopy, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->EndometrialScratching, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->TrialCannulation, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->CYCLETYPE, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->HRTCYCLE, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->OralEstrogenDosage, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->VaginalEstrogen, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->GCSF, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->ActivatedPRP, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->UCLcm, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->DATOFEMBRYOTRANSFER, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->DAYOFEMBRYOTRANSFER, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->NOOFEMBRYOSTHAWED, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->NOOFEMBRYOSTRANSFERRED, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->DAYOFEMBRYOS, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->CRYOPRESERVEDEMBRYOS, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->ViaAdmin, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->ViaDose, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->AllFreeze, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->TreatmentCancel, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Reason, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->ProgesteroneAdmin, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->ProgesteroneStart, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->ProgesteroneDose, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Projectron, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->CycleDay14, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->CycleDay15, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->CycleDay16, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->CycleDay17, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->CycleDay18, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->CycleDay19, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->CycleDay20, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->CycleDay21, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->CycleDay22, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->CycleDay23, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->CycleDay24, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->CycleDay25, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->StimulationDay14, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->StimulationDay15, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->StimulationDay16, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->StimulationDay17, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->StimulationDay18, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->StimulationDay19, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->StimulationDay20, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->StimulationDay21, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->StimulationDay22, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->StimulationDay23, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->StimulationDay24, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->StimulationDay25, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Tablet14, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Tablet15, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Tablet16, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Tablet17, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Tablet18, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Tablet19, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Tablet20, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Tablet21, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Tablet22, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Tablet23, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Tablet24, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Tablet25, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->RFSH14, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->RFSH15, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->RFSH16, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->RFSH17, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->RFSH18, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->RFSH19, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->RFSH20, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->RFSH21, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->RFSH22, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->RFSH23, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->RFSH24, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->RFSH25, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->HMG14, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->HMG15, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->HMG16, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->HMG17, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->HMG18, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->HMG19, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->HMG20, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->HMG21, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->HMG22, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->HMG23, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->HMG24, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->HMG25, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->GnRH14, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->GnRH15, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->GnRH16, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->GnRH17, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->GnRH18, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->GnRH19, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->GnRH20, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->GnRH21, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->GnRH22, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->GnRH23, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->GnRH24, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->GnRH25, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->P414, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->P415, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->P416, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->P417, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->P418, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->P419, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->P420, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->P421, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->P422, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->P423, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->P424, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->P425, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->USGRt14, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->USGRt15, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->USGRt16, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->USGRt17, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->USGRt18, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->USGRt19, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->USGRt20, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->USGRt21, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->USGRt22, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->USGRt23, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->USGRt24, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->USGRt25, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->USGLt14, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->USGLt15, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->USGLt16, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->USGLt17, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->USGLt18, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->USGLt19, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->USGLt20, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->USGLt21, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->USGLt22, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->USGLt23, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->USGLt24, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->USGLt25, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->EM14, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->EM15, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->EM16, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->EM17, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->EM18, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->EM19, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->EM20, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->EM21, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->EM22, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->EM23, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->EM24, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->EM25, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Others14, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Others15, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Others16, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Others17, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Others18, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Others19, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Others20, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Others21, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Others22, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Others23, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Others24, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Others25, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->DR14, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->DR15, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->DR16, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->DR17, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->DR18, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->DR19, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->DR20, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->DR21, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->DR22, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->DR23, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->DR24, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->DR25, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->E214, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->E215, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->E216, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->E217, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->E218, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->E219, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->E220, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->E221, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->E222, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->E223, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->E224, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->E225, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->TUBAL_PATENCY, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->HSG, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->DHL, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->UTERINE_PROBLEMS, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->W_COMORBIDS, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->H_COMORBIDS, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->SEXUAL_DYSFUNCTION, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->TABLETS, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->FOLLICLE_STATUS, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->NUMBER_OF_IUI, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->PROCEDURE, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->LUTEAL_SUPPORT, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->SPECIFIC_MATERNAL_PROBLEMS, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->ONGOING_PREG, $arKeywords, $type);
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
			$this->updateSort($this->RIDNo); // RIDNo
			$this->updateSort($this->Name); // Name
			$this->updateSort($this->ARTCycle); // ARTCycle
			$this->updateSort($this->FemaleFactor); // FemaleFactor
			$this->updateSort($this->MaleFactor); // MaleFactor
			$this->updateSort($this->Protocol); // Protocol
			$this->updateSort($this->SemenFrozen); // SemenFrozen
			$this->updateSort($this->A4ICSICycle); // A4ICSICycle
			$this->updateSort($this->TotalICSICycle); // TotalICSICycle
			$this->updateSort($this->TypeOfInfertility); // TypeOfInfertility
			$this->updateSort($this->Duration); // Duration
			$this->updateSort($this->LMP); // LMP
			$this->updateSort($this->RelevantHistory); // RelevantHistory
			$this->updateSort($this->IUICycles); // IUICycles
			$this->updateSort($this->AFC); // AFC
			$this->updateSort($this->AMH); // AMH
			$this->updateSort($this->FBMI); // FBMI
			$this->updateSort($this->MBMI); // MBMI
			$this->updateSort($this->OvarianVolumeRT); // OvarianVolumeRT
			$this->updateSort($this->OvarianVolumeLT); // OvarianVolumeLT
			$this->updateSort($this->DAYSOFSTIMULATION); // DAYSOFSTIMULATION
			$this->updateSort($this->DOSEOFGONADOTROPINS); // DOSEOFGONADOTROPINS
			$this->updateSort($this->INJTYPE); // INJTYPE
			$this->updateSort($this->ANTAGONISTDAYS); // ANTAGONISTDAYS
			$this->updateSort($this->ANTAGONISTSTARTDAY); // ANTAGONISTSTARTDAY
			$this->updateSort($this->GROWTHHORMONE); // GROWTHHORMONE
			$this->updateSort($this->PRETREATMENT); // PRETREATMENT
			$this->updateSort($this->SerumP4); // SerumP4
			$this->updateSort($this->FORT); // FORT
			$this->updateSort($this->MedicalFactors); // MedicalFactors
			$this->updateSort($this->SCDate); // SCDate
			$this->updateSort($this->OvarianSurgery); // OvarianSurgery
			$this->updateSort($this->PreProcedureOrder); // PreProcedureOrder
			$this->updateSort($this->TRIGGERR); // TRIGGERR
			$this->updateSort($this->TRIGGERDATE); // TRIGGERDATE
			$this->updateSort($this->ATHOMEorCLINIC); // ATHOMEorCLINIC
			$this->updateSort($this->OPUDATE); // OPUDATE
			$this->updateSort($this->ALLFREEZEINDICATION); // ALLFREEZEINDICATION
			$this->updateSort($this->ERA); // ERA
			$this->updateSort($this->PGTA); // PGTA
			$this->updateSort($this->PGD); // PGD
			$this->updateSort($this->DATEOFET); // DATEOFET
			$this->updateSort($this->ET); // ET
			$this->updateSort($this->ESET); // ESET
			$this->updateSort($this->DOET); // DOET
			$this->updateSort($this->SEMENPREPARATION); // SEMENPREPARATION
			$this->updateSort($this->REASONFORESET); // REASONFORESET
			$this->updateSort($this->Expectedoocytes); // Expectedoocytes
			$this->updateSort($this->StChDate1); // StChDate1
			$this->updateSort($this->StChDate2); // StChDate2
			$this->updateSort($this->StChDate3); // StChDate3
			$this->updateSort($this->StChDate4); // StChDate4
			$this->updateSort($this->StChDate5); // StChDate5
			$this->updateSort($this->StChDate6); // StChDate6
			$this->updateSort($this->StChDate7); // StChDate7
			$this->updateSort($this->StChDate8); // StChDate8
			$this->updateSort($this->StChDate9); // StChDate9
			$this->updateSort($this->StChDate10); // StChDate10
			$this->updateSort($this->StChDate11); // StChDate11
			$this->updateSort($this->StChDate12); // StChDate12
			$this->updateSort($this->StChDate13); // StChDate13
			$this->updateSort($this->CycleDay1); // CycleDay1
			$this->updateSort($this->CycleDay2); // CycleDay2
			$this->updateSort($this->CycleDay3); // CycleDay3
			$this->updateSort($this->CycleDay4); // CycleDay4
			$this->updateSort($this->CycleDay5); // CycleDay5
			$this->updateSort($this->CycleDay6); // CycleDay6
			$this->updateSort($this->CycleDay7); // CycleDay7
			$this->updateSort($this->CycleDay8); // CycleDay8
			$this->updateSort($this->CycleDay9); // CycleDay9
			$this->updateSort($this->CycleDay10); // CycleDay10
			$this->updateSort($this->CycleDay11); // CycleDay11
			$this->updateSort($this->CycleDay12); // CycleDay12
			$this->updateSort($this->CycleDay13); // CycleDay13
			$this->updateSort($this->StimulationDay1); // StimulationDay1
			$this->updateSort($this->StimulationDay2); // StimulationDay2
			$this->updateSort($this->StimulationDay3); // StimulationDay3
			$this->updateSort($this->StimulationDay4); // StimulationDay4
			$this->updateSort($this->StimulationDay5); // StimulationDay5
			$this->updateSort($this->StimulationDay6); // StimulationDay6
			$this->updateSort($this->StimulationDay7); // StimulationDay7
			$this->updateSort($this->StimulationDay8); // StimulationDay8
			$this->updateSort($this->StimulationDay9); // StimulationDay9
			$this->updateSort($this->StimulationDay10); // StimulationDay10
			$this->updateSort($this->StimulationDay11); // StimulationDay11
			$this->updateSort($this->StimulationDay12); // StimulationDay12
			$this->updateSort($this->StimulationDay13); // StimulationDay13
			$this->updateSort($this->Tablet1); // Tablet1
			$this->updateSort($this->Tablet2); // Tablet2
			$this->updateSort($this->Tablet3); // Tablet3
			$this->updateSort($this->Tablet4); // Tablet4
			$this->updateSort($this->Tablet5); // Tablet5
			$this->updateSort($this->Tablet6); // Tablet6
			$this->updateSort($this->Tablet7); // Tablet7
			$this->updateSort($this->Tablet8); // Tablet8
			$this->updateSort($this->Tablet9); // Tablet9
			$this->updateSort($this->Tablet10); // Tablet10
			$this->updateSort($this->Tablet11); // Tablet11
			$this->updateSort($this->Tablet12); // Tablet12
			$this->updateSort($this->Tablet13); // Tablet13
			$this->updateSort($this->RFSH1); // RFSH1
			$this->updateSort($this->RFSH2); // RFSH2
			$this->updateSort($this->RFSH3); // RFSH3
			$this->updateSort($this->RFSH4); // RFSH4
			$this->updateSort($this->RFSH5); // RFSH5
			$this->updateSort($this->RFSH6); // RFSH6
			$this->updateSort($this->RFSH7); // RFSH7
			$this->updateSort($this->RFSH8); // RFSH8
			$this->updateSort($this->RFSH9); // RFSH9
			$this->updateSort($this->RFSH10); // RFSH10
			$this->updateSort($this->RFSH11); // RFSH11
			$this->updateSort($this->RFSH12); // RFSH12
			$this->updateSort($this->RFSH13); // RFSH13
			$this->updateSort($this->HMG1); // HMG1
			$this->updateSort($this->HMG2); // HMG2
			$this->updateSort($this->HMG3); // HMG3
			$this->updateSort($this->HMG4); // HMG4
			$this->updateSort($this->HMG5); // HMG5
			$this->updateSort($this->HMG6); // HMG6
			$this->updateSort($this->HMG7); // HMG7
			$this->updateSort($this->HMG8); // HMG8
			$this->updateSort($this->HMG9); // HMG9
			$this->updateSort($this->HMG10); // HMG10
			$this->updateSort($this->HMG11); // HMG11
			$this->updateSort($this->HMG12); // HMG12
			$this->updateSort($this->HMG13); // HMG13
			$this->updateSort($this->GnRH1); // GnRH1
			$this->updateSort($this->GnRH2); // GnRH2
			$this->updateSort($this->GnRH3); // GnRH3
			$this->updateSort($this->GnRH4); // GnRH4
			$this->updateSort($this->GnRH5); // GnRH5
			$this->updateSort($this->GnRH6); // GnRH6
			$this->updateSort($this->GnRH7); // GnRH7
			$this->updateSort($this->GnRH8); // GnRH8
			$this->updateSort($this->GnRH9); // GnRH9
			$this->updateSort($this->GnRH10); // GnRH10
			$this->updateSort($this->GnRH11); // GnRH11
			$this->updateSort($this->GnRH12); // GnRH12
			$this->updateSort($this->GnRH13); // GnRH13
			$this->updateSort($this->E21); // E21
			$this->updateSort($this->E22); // E22
			$this->updateSort($this->E23); // E23
			$this->updateSort($this->E24); // E24
			$this->updateSort($this->E25); // E25
			$this->updateSort($this->E26); // E26
			$this->updateSort($this->E27); // E27
			$this->updateSort($this->E28); // E28
			$this->updateSort($this->E29); // E29
			$this->updateSort($this->E210); // E210
			$this->updateSort($this->E211); // E211
			$this->updateSort($this->E212); // E212
			$this->updateSort($this->E213); // E213
			$this->updateSort($this->P41); // P41
			$this->updateSort($this->P42); // P42
			$this->updateSort($this->P43); // P43
			$this->updateSort($this->P44); // P44
			$this->updateSort($this->P45); // P45
			$this->updateSort($this->P46); // P46
			$this->updateSort($this->P47); // P47
			$this->updateSort($this->P48); // P48
			$this->updateSort($this->P49); // P49
			$this->updateSort($this->P410); // P410
			$this->updateSort($this->P411); // P411
			$this->updateSort($this->P412); // P412
			$this->updateSort($this->P413); // P413
			$this->updateSort($this->USGRt1); // USGRt1
			$this->updateSort($this->USGRt2); // USGRt2
			$this->updateSort($this->USGRt3); // USGRt3
			$this->updateSort($this->USGRt4); // USGRt4
			$this->updateSort($this->USGRt5); // USGRt5
			$this->updateSort($this->USGRt6); // USGRt6
			$this->updateSort($this->USGRt7); // USGRt7
			$this->updateSort($this->USGRt8); // USGRt8
			$this->updateSort($this->USGRt9); // USGRt9
			$this->updateSort($this->USGRt10); // USGRt10
			$this->updateSort($this->USGRt11); // USGRt11
			$this->updateSort($this->USGRt12); // USGRt12
			$this->updateSort($this->USGRt13); // USGRt13
			$this->updateSort($this->USGLt1); // USGLt1
			$this->updateSort($this->USGLt2); // USGLt2
			$this->updateSort($this->USGLt3); // USGLt3
			$this->updateSort($this->USGLt4); // USGLt4
			$this->updateSort($this->USGLt5); // USGLt5
			$this->updateSort($this->USGLt6); // USGLt6
			$this->updateSort($this->USGLt7); // USGLt7
			$this->updateSort($this->USGLt8); // USGLt8
			$this->updateSort($this->USGLt9); // USGLt9
			$this->updateSort($this->USGLt10); // USGLt10
			$this->updateSort($this->USGLt11); // USGLt11
			$this->updateSort($this->USGLt12); // USGLt12
			$this->updateSort($this->USGLt13); // USGLt13
			$this->updateSort($this->EM1); // EM1
			$this->updateSort($this->EM2); // EM2
			$this->updateSort($this->EM3); // EM3
			$this->updateSort($this->EM4); // EM4
			$this->updateSort($this->EM5); // EM5
			$this->updateSort($this->EM6); // EM6
			$this->updateSort($this->EM7); // EM7
			$this->updateSort($this->EM8); // EM8
			$this->updateSort($this->EM9); // EM9
			$this->updateSort($this->EM10); // EM10
			$this->updateSort($this->EM11); // EM11
			$this->updateSort($this->EM12); // EM12
			$this->updateSort($this->EM13); // EM13
			$this->updateSort($this->Others1); // Others1
			$this->updateSort($this->Others2); // Others2
			$this->updateSort($this->Others3); // Others3
			$this->updateSort($this->Others4); // Others4
			$this->updateSort($this->Others5); // Others5
			$this->updateSort($this->Others6); // Others6
			$this->updateSort($this->Others7); // Others7
			$this->updateSort($this->Others8); // Others8
			$this->updateSort($this->Others9); // Others9
			$this->updateSort($this->Others10); // Others10
			$this->updateSort($this->Others11); // Others11
			$this->updateSort($this->Others12); // Others12
			$this->updateSort($this->Others13); // Others13
			$this->updateSort($this->DR1); // DR1
			$this->updateSort($this->DR2); // DR2
			$this->updateSort($this->DR3); // DR3
			$this->updateSort($this->DR4); // DR4
			$this->updateSort($this->DR5); // DR5
			$this->updateSort($this->DR6); // DR6
			$this->updateSort($this->DR7); // DR7
			$this->updateSort($this->DR8); // DR8
			$this->updateSort($this->DR9); // DR9
			$this->updateSort($this->DR10); // DR10
			$this->updateSort($this->DR11); // DR11
			$this->updateSort($this->DR12); // DR12
			$this->updateSort($this->DR13); // DR13
			$this->updateSort($this->TidNo); // TidNo
			$this->updateSort($this->Convert); // Convert
			$this->updateSort($this->Consultant); // Consultant
			$this->updateSort($this->InseminatinTechnique); // InseminatinTechnique
			$this->updateSort($this->IndicationForART); // IndicationForART
			$this->updateSort($this->Hysteroscopy); // Hysteroscopy
			$this->updateSort($this->EndometrialScratching); // EndometrialScratching
			$this->updateSort($this->TrialCannulation); // TrialCannulation
			$this->updateSort($this->CYCLETYPE); // CYCLETYPE
			$this->updateSort($this->HRTCYCLE); // HRTCYCLE
			$this->updateSort($this->OralEstrogenDosage); // OralEstrogenDosage
			$this->updateSort($this->VaginalEstrogen); // VaginalEstrogen
			$this->updateSort($this->GCSF); // GCSF
			$this->updateSort($this->ActivatedPRP); // ActivatedPRP
			$this->updateSort($this->UCLcm); // UCLcm
			$this->updateSort($this->DATOFEMBRYOTRANSFER); // DATOFEMBRYOTRANSFER
			$this->updateSort($this->DAYOFEMBRYOTRANSFER); // DAYOFEMBRYOTRANSFER
			$this->updateSort($this->NOOFEMBRYOSTHAWED); // NOOFEMBRYOSTHAWED
			$this->updateSort($this->NOOFEMBRYOSTRANSFERRED); // NOOFEMBRYOSTRANSFERRED
			$this->updateSort($this->DAYOFEMBRYOS); // DAYOFEMBRYOS
			$this->updateSort($this->CRYOPRESERVEDEMBRYOS); // CRYOPRESERVEDEMBRYOS
			$this->updateSort($this->ViaAdmin); // ViaAdmin
			$this->updateSort($this->ViaStartDateTime); // ViaStartDateTime
			$this->updateSort($this->ViaDose); // ViaDose
			$this->updateSort($this->AllFreeze); // AllFreeze
			$this->updateSort($this->TreatmentCancel); // TreatmentCancel
			$this->updateSort($this->ProgesteroneAdmin); // ProgesteroneAdmin
			$this->updateSort($this->ProgesteroneStart); // ProgesteroneStart
			$this->updateSort($this->ProgesteroneDose); // ProgesteroneDose
			$this->updateSort($this->StChDate14); // StChDate14
			$this->updateSort($this->StChDate15); // StChDate15
			$this->updateSort($this->StChDate16); // StChDate16
			$this->updateSort($this->StChDate17); // StChDate17
			$this->updateSort($this->StChDate18); // StChDate18
			$this->updateSort($this->StChDate19); // StChDate19
			$this->updateSort($this->StChDate20); // StChDate20
			$this->updateSort($this->StChDate21); // StChDate21
			$this->updateSort($this->StChDate22); // StChDate22
			$this->updateSort($this->StChDate23); // StChDate23
			$this->updateSort($this->StChDate24); // StChDate24
			$this->updateSort($this->StChDate25); // StChDate25
			$this->updateSort($this->CycleDay14); // CycleDay14
			$this->updateSort($this->CycleDay15); // CycleDay15
			$this->updateSort($this->CycleDay16); // CycleDay16
			$this->updateSort($this->CycleDay17); // CycleDay17
			$this->updateSort($this->CycleDay18); // CycleDay18
			$this->updateSort($this->CycleDay19); // CycleDay19
			$this->updateSort($this->CycleDay20); // CycleDay20
			$this->updateSort($this->CycleDay21); // CycleDay21
			$this->updateSort($this->CycleDay22); // CycleDay22
			$this->updateSort($this->CycleDay23); // CycleDay23
			$this->updateSort($this->CycleDay24); // CycleDay24
			$this->updateSort($this->CycleDay25); // CycleDay25
			$this->updateSort($this->StimulationDay14); // StimulationDay14
			$this->updateSort($this->StimulationDay15); // StimulationDay15
			$this->updateSort($this->StimulationDay16); // StimulationDay16
			$this->updateSort($this->StimulationDay17); // StimulationDay17
			$this->updateSort($this->StimulationDay18); // StimulationDay18
			$this->updateSort($this->StimulationDay19); // StimulationDay19
			$this->updateSort($this->StimulationDay20); // StimulationDay20
			$this->updateSort($this->StimulationDay21); // StimulationDay21
			$this->updateSort($this->StimulationDay22); // StimulationDay22
			$this->updateSort($this->StimulationDay23); // StimulationDay23
			$this->updateSort($this->StimulationDay24); // StimulationDay24
			$this->updateSort($this->StimulationDay25); // StimulationDay25
			$this->updateSort($this->Tablet14); // Tablet14
			$this->updateSort($this->Tablet15); // Tablet15
			$this->updateSort($this->Tablet16); // Tablet16
			$this->updateSort($this->Tablet17); // Tablet17
			$this->updateSort($this->Tablet18); // Tablet18
			$this->updateSort($this->Tablet19); // Tablet19
			$this->updateSort($this->Tablet20); // Tablet20
			$this->updateSort($this->Tablet21); // Tablet21
			$this->updateSort($this->Tablet22); // Tablet22
			$this->updateSort($this->Tablet23); // Tablet23
			$this->updateSort($this->Tablet24); // Tablet24
			$this->updateSort($this->Tablet25); // Tablet25
			$this->updateSort($this->RFSH14); // RFSH14
			$this->updateSort($this->RFSH15); // RFSH15
			$this->updateSort($this->RFSH16); // RFSH16
			$this->updateSort($this->RFSH17); // RFSH17
			$this->updateSort($this->RFSH18); // RFSH18
			$this->updateSort($this->RFSH19); // RFSH19
			$this->updateSort($this->RFSH20); // RFSH20
			$this->updateSort($this->RFSH21); // RFSH21
			$this->updateSort($this->RFSH22); // RFSH22
			$this->updateSort($this->RFSH23); // RFSH23
			$this->updateSort($this->RFSH24); // RFSH24
			$this->updateSort($this->RFSH25); // RFSH25
			$this->updateSort($this->HMG14); // HMG14
			$this->updateSort($this->HMG15); // HMG15
			$this->updateSort($this->HMG16); // HMG16
			$this->updateSort($this->HMG17); // HMG17
			$this->updateSort($this->HMG18); // HMG18
			$this->updateSort($this->HMG19); // HMG19
			$this->updateSort($this->HMG20); // HMG20
			$this->updateSort($this->HMG21); // HMG21
			$this->updateSort($this->HMG22); // HMG22
			$this->updateSort($this->HMG23); // HMG23
			$this->updateSort($this->HMG24); // HMG24
			$this->updateSort($this->HMG25); // HMG25
			$this->updateSort($this->GnRH14); // GnRH14
			$this->updateSort($this->GnRH15); // GnRH15
			$this->updateSort($this->GnRH16); // GnRH16
			$this->updateSort($this->GnRH17); // GnRH17
			$this->updateSort($this->GnRH18); // GnRH18
			$this->updateSort($this->GnRH19); // GnRH19
			$this->updateSort($this->GnRH20); // GnRH20
			$this->updateSort($this->GnRH21); // GnRH21
			$this->updateSort($this->GnRH22); // GnRH22
			$this->updateSort($this->GnRH23); // GnRH23
			$this->updateSort($this->GnRH24); // GnRH24
			$this->updateSort($this->GnRH25); // GnRH25
			$this->updateSort($this->P414); // P414
			$this->updateSort($this->P415); // P415
			$this->updateSort($this->P416); // P416
			$this->updateSort($this->P417); // P417
			$this->updateSort($this->P418); // P418
			$this->updateSort($this->P419); // P419
			$this->updateSort($this->P420); // P420
			$this->updateSort($this->P421); // P421
			$this->updateSort($this->P422); // P422
			$this->updateSort($this->P423); // P423
			$this->updateSort($this->P424); // P424
			$this->updateSort($this->P425); // P425
			$this->updateSort($this->USGRt14); // USGRt14
			$this->updateSort($this->USGRt15); // USGRt15
			$this->updateSort($this->USGRt16); // USGRt16
			$this->updateSort($this->USGRt17); // USGRt17
			$this->updateSort($this->USGRt18); // USGRt18
			$this->updateSort($this->USGRt19); // USGRt19
			$this->updateSort($this->USGRt20); // USGRt20
			$this->updateSort($this->USGRt21); // USGRt21
			$this->updateSort($this->USGRt22); // USGRt22
			$this->updateSort($this->USGRt23); // USGRt23
			$this->updateSort($this->USGRt24); // USGRt24
			$this->updateSort($this->USGRt25); // USGRt25
			$this->updateSort($this->USGLt14); // USGLt14
			$this->updateSort($this->USGLt15); // USGLt15
			$this->updateSort($this->USGLt16); // USGLt16
			$this->updateSort($this->USGLt17); // USGLt17
			$this->updateSort($this->USGLt18); // USGLt18
			$this->updateSort($this->USGLt19); // USGLt19
			$this->updateSort($this->USGLt20); // USGLt20
			$this->updateSort($this->USGLt21); // USGLt21
			$this->updateSort($this->USGLt22); // USGLt22
			$this->updateSort($this->USGLt23); // USGLt23
			$this->updateSort($this->USGLt24); // USGLt24
			$this->updateSort($this->USGLt25); // USGLt25
			$this->updateSort($this->EM14); // EM14
			$this->updateSort($this->EM15); // EM15
			$this->updateSort($this->EM16); // EM16
			$this->updateSort($this->EM17); // EM17
			$this->updateSort($this->EM18); // EM18
			$this->updateSort($this->EM19); // EM19
			$this->updateSort($this->EM20); // EM20
			$this->updateSort($this->EM21); // EM21
			$this->updateSort($this->EM22); // EM22
			$this->updateSort($this->EM23); // EM23
			$this->updateSort($this->EM24); // EM24
			$this->updateSort($this->EM25); // EM25
			$this->updateSort($this->Others14); // Others14
			$this->updateSort($this->Others15); // Others15
			$this->updateSort($this->Others16); // Others16
			$this->updateSort($this->Others17); // Others17
			$this->updateSort($this->Others18); // Others18
			$this->updateSort($this->Others19); // Others19
			$this->updateSort($this->Others20); // Others20
			$this->updateSort($this->Others21); // Others21
			$this->updateSort($this->Others22); // Others22
			$this->updateSort($this->Others23); // Others23
			$this->updateSort($this->Others24); // Others24
			$this->updateSort($this->Others25); // Others25
			$this->updateSort($this->DR14); // DR14
			$this->updateSort($this->DR15); // DR15
			$this->updateSort($this->DR16); // DR16
			$this->updateSort($this->DR17); // DR17
			$this->updateSort($this->DR18); // DR18
			$this->updateSort($this->DR19); // DR19
			$this->updateSort($this->DR20); // DR20
			$this->updateSort($this->DR21); // DR21
			$this->updateSort($this->DR22); // DR22
			$this->updateSort($this->DR23); // DR23
			$this->updateSort($this->DR24); // DR24
			$this->updateSort($this->DR25); // DR25
			$this->updateSort($this->E214); // E214
			$this->updateSort($this->E215); // E215
			$this->updateSort($this->E216); // E216
			$this->updateSort($this->E217); // E217
			$this->updateSort($this->E218); // E218
			$this->updateSort($this->E219); // E219
			$this->updateSort($this->E220); // E220
			$this->updateSort($this->E221); // E221
			$this->updateSort($this->E222); // E222
			$this->updateSort($this->E223); // E223
			$this->updateSort($this->E224); // E224
			$this->updateSort($this->E225); // E225
			$this->updateSort($this->EEETTTDTE); // EEETTTDTE
			$this->updateSort($this->bhcgdate); // bhcgdate
			$this->updateSort($this->TUBAL_PATENCY); // TUBAL_PATENCY
			$this->updateSort($this->HSG); // HSG
			$this->updateSort($this->DHL); // DHL
			$this->updateSort($this->UTERINE_PROBLEMS); // UTERINE_PROBLEMS
			$this->updateSort($this->W_COMORBIDS); // W_COMORBIDS
			$this->updateSort($this->H_COMORBIDS); // H_COMORBIDS
			$this->updateSort($this->SEXUAL_DYSFUNCTION); // SEXUAL_DYSFUNCTION
			$this->updateSort($this->TABLETS); // TABLETS
			$this->updateSort($this->FOLLICLE_STATUS); // FOLLICLE_STATUS
			$this->updateSort($this->NUMBER_OF_IUI); // NUMBER_OF_IUI
			$this->updateSort($this->PROCEDURE); // PROCEDURE
			$this->updateSort($this->LUTEAL_SUPPORT); // LUTEAL_SUPPORT
			$this->updateSort($this->SPECIFIC_MATERNAL_PROBLEMS); // SPECIFIC_MATERNAL_PROBLEMS
			$this->updateSort($this->ONGOING_PREG); // ONGOING_PREG
			$this->updateSort($this->EDD_Date); // EDD_Date
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
				$this->RIDNo->setSessionValue("");
				$this->Name->setSessionValue("");
				$this->TidNo->setSessionValue("");
			}

			// Reset sorting order
			if ($this->Command == "resetsort") {
				$orderBy = "";
				$this->setSessionOrderBy($orderBy);
				$this->id->setSort("");
				$this->RIDNo->setSort("");
				$this->Name->setSort("");
				$this->ARTCycle->setSort("");
				$this->FemaleFactor->setSort("");
				$this->MaleFactor->setSort("");
				$this->Protocol->setSort("");
				$this->SemenFrozen->setSort("");
				$this->A4ICSICycle->setSort("");
				$this->TotalICSICycle->setSort("");
				$this->TypeOfInfertility->setSort("");
				$this->Duration->setSort("");
				$this->LMP->setSort("");
				$this->RelevantHistory->setSort("");
				$this->IUICycles->setSort("");
				$this->AFC->setSort("");
				$this->AMH->setSort("");
				$this->FBMI->setSort("");
				$this->MBMI->setSort("");
				$this->OvarianVolumeRT->setSort("");
				$this->OvarianVolumeLT->setSort("");
				$this->DAYSOFSTIMULATION->setSort("");
				$this->DOSEOFGONADOTROPINS->setSort("");
				$this->INJTYPE->setSort("");
				$this->ANTAGONISTDAYS->setSort("");
				$this->ANTAGONISTSTARTDAY->setSort("");
				$this->GROWTHHORMONE->setSort("");
				$this->PRETREATMENT->setSort("");
				$this->SerumP4->setSort("");
				$this->FORT->setSort("");
				$this->MedicalFactors->setSort("");
				$this->SCDate->setSort("");
				$this->OvarianSurgery->setSort("");
				$this->PreProcedureOrder->setSort("");
				$this->TRIGGERR->setSort("");
				$this->TRIGGERDATE->setSort("");
				$this->ATHOMEorCLINIC->setSort("");
				$this->OPUDATE->setSort("");
				$this->ALLFREEZEINDICATION->setSort("");
				$this->ERA->setSort("");
				$this->PGTA->setSort("");
				$this->PGD->setSort("");
				$this->DATEOFET->setSort("");
				$this->ET->setSort("");
				$this->ESET->setSort("");
				$this->DOET->setSort("");
				$this->SEMENPREPARATION->setSort("");
				$this->REASONFORESET->setSort("");
				$this->Expectedoocytes->setSort("");
				$this->StChDate1->setSort("");
				$this->StChDate2->setSort("");
				$this->StChDate3->setSort("");
				$this->StChDate4->setSort("");
				$this->StChDate5->setSort("");
				$this->StChDate6->setSort("");
				$this->StChDate7->setSort("");
				$this->StChDate8->setSort("");
				$this->StChDate9->setSort("");
				$this->StChDate10->setSort("");
				$this->StChDate11->setSort("");
				$this->StChDate12->setSort("");
				$this->StChDate13->setSort("");
				$this->CycleDay1->setSort("");
				$this->CycleDay2->setSort("");
				$this->CycleDay3->setSort("");
				$this->CycleDay4->setSort("");
				$this->CycleDay5->setSort("");
				$this->CycleDay6->setSort("");
				$this->CycleDay7->setSort("");
				$this->CycleDay8->setSort("");
				$this->CycleDay9->setSort("");
				$this->CycleDay10->setSort("");
				$this->CycleDay11->setSort("");
				$this->CycleDay12->setSort("");
				$this->CycleDay13->setSort("");
				$this->StimulationDay1->setSort("");
				$this->StimulationDay2->setSort("");
				$this->StimulationDay3->setSort("");
				$this->StimulationDay4->setSort("");
				$this->StimulationDay5->setSort("");
				$this->StimulationDay6->setSort("");
				$this->StimulationDay7->setSort("");
				$this->StimulationDay8->setSort("");
				$this->StimulationDay9->setSort("");
				$this->StimulationDay10->setSort("");
				$this->StimulationDay11->setSort("");
				$this->StimulationDay12->setSort("");
				$this->StimulationDay13->setSort("");
				$this->Tablet1->setSort("");
				$this->Tablet2->setSort("");
				$this->Tablet3->setSort("");
				$this->Tablet4->setSort("");
				$this->Tablet5->setSort("");
				$this->Tablet6->setSort("");
				$this->Tablet7->setSort("");
				$this->Tablet8->setSort("");
				$this->Tablet9->setSort("");
				$this->Tablet10->setSort("");
				$this->Tablet11->setSort("");
				$this->Tablet12->setSort("");
				$this->Tablet13->setSort("");
				$this->RFSH1->setSort("");
				$this->RFSH2->setSort("");
				$this->RFSH3->setSort("");
				$this->RFSH4->setSort("");
				$this->RFSH5->setSort("");
				$this->RFSH6->setSort("");
				$this->RFSH7->setSort("");
				$this->RFSH8->setSort("");
				$this->RFSH9->setSort("");
				$this->RFSH10->setSort("");
				$this->RFSH11->setSort("");
				$this->RFSH12->setSort("");
				$this->RFSH13->setSort("");
				$this->HMG1->setSort("");
				$this->HMG2->setSort("");
				$this->HMG3->setSort("");
				$this->HMG4->setSort("");
				$this->HMG5->setSort("");
				$this->HMG6->setSort("");
				$this->HMG7->setSort("");
				$this->HMG8->setSort("");
				$this->HMG9->setSort("");
				$this->HMG10->setSort("");
				$this->HMG11->setSort("");
				$this->HMG12->setSort("");
				$this->HMG13->setSort("");
				$this->GnRH1->setSort("");
				$this->GnRH2->setSort("");
				$this->GnRH3->setSort("");
				$this->GnRH4->setSort("");
				$this->GnRH5->setSort("");
				$this->GnRH6->setSort("");
				$this->GnRH7->setSort("");
				$this->GnRH8->setSort("");
				$this->GnRH9->setSort("");
				$this->GnRH10->setSort("");
				$this->GnRH11->setSort("");
				$this->GnRH12->setSort("");
				$this->GnRH13->setSort("");
				$this->E21->setSort("");
				$this->E22->setSort("");
				$this->E23->setSort("");
				$this->E24->setSort("");
				$this->E25->setSort("");
				$this->E26->setSort("");
				$this->E27->setSort("");
				$this->E28->setSort("");
				$this->E29->setSort("");
				$this->E210->setSort("");
				$this->E211->setSort("");
				$this->E212->setSort("");
				$this->E213->setSort("");
				$this->P41->setSort("");
				$this->P42->setSort("");
				$this->P43->setSort("");
				$this->P44->setSort("");
				$this->P45->setSort("");
				$this->P46->setSort("");
				$this->P47->setSort("");
				$this->P48->setSort("");
				$this->P49->setSort("");
				$this->P410->setSort("");
				$this->P411->setSort("");
				$this->P412->setSort("");
				$this->P413->setSort("");
				$this->USGRt1->setSort("");
				$this->USGRt2->setSort("");
				$this->USGRt3->setSort("");
				$this->USGRt4->setSort("");
				$this->USGRt5->setSort("");
				$this->USGRt6->setSort("");
				$this->USGRt7->setSort("");
				$this->USGRt8->setSort("");
				$this->USGRt9->setSort("");
				$this->USGRt10->setSort("");
				$this->USGRt11->setSort("");
				$this->USGRt12->setSort("");
				$this->USGRt13->setSort("");
				$this->USGLt1->setSort("");
				$this->USGLt2->setSort("");
				$this->USGLt3->setSort("");
				$this->USGLt4->setSort("");
				$this->USGLt5->setSort("");
				$this->USGLt6->setSort("");
				$this->USGLt7->setSort("");
				$this->USGLt8->setSort("");
				$this->USGLt9->setSort("");
				$this->USGLt10->setSort("");
				$this->USGLt11->setSort("");
				$this->USGLt12->setSort("");
				$this->USGLt13->setSort("");
				$this->EM1->setSort("");
				$this->EM2->setSort("");
				$this->EM3->setSort("");
				$this->EM4->setSort("");
				$this->EM5->setSort("");
				$this->EM6->setSort("");
				$this->EM7->setSort("");
				$this->EM8->setSort("");
				$this->EM9->setSort("");
				$this->EM10->setSort("");
				$this->EM11->setSort("");
				$this->EM12->setSort("");
				$this->EM13->setSort("");
				$this->Others1->setSort("");
				$this->Others2->setSort("");
				$this->Others3->setSort("");
				$this->Others4->setSort("");
				$this->Others5->setSort("");
				$this->Others6->setSort("");
				$this->Others7->setSort("");
				$this->Others8->setSort("");
				$this->Others9->setSort("");
				$this->Others10->setSort("");
				$this->Others11->setSort("");
				$this->Others12->setSort("");
				$this->Others13->setSort("");
				$this->DR1->setSort("");
				$this->DR2->setSort("");
				$this->DR3->setSort("");
				$this->DR4->setSort("");
				$this->DR5->setSort("");
				$this->DR6->setSort("");
				$this->DR7->setSort("");
				$this->DR8->setSort("");
				$this->DR9->setSort("");
				$this->DR10->setSort("");
				$this->DR11->setSort("");
				$this->DR12->setSort("");
				$this->DR13->setSort("");
				$this->TidNo->setSort("");
				$this->Convert->setSort("");
				$this->Consultant->setSort("");
				$this->InseminatinTechnique->setSort("");
				$this->IndicationForART->setSort("");
				$this->Hysteroscopy->setSort("");
				$this->EndometrialScratching->setSort("");
				$this->TrialCannulation->setSort("");
				$this->CYCLETYPE->setSort("");
				$this->HRTCYCLE->setSort("");
				$this->OralEstrogenDosage->setSort("");
				$this->VaginalEstrogen->setSort("");
				$this->GCSF->setSort("");
				$this->ActivatedPRP->setSort("");
				$this->UCLcm->setSort("");
				$this->DATOFEMBRYOTRANSFER->setSort("");
				$this->DAYOFEMBRYOTRANSFER->setSort("");
				$this->NOOFEMBRYOSTHAWED->setSort("");
				$this->NOOFEMBRYOSTRANSFERRED->setSort("");
				$this->DAYOFEMBRYOS->setSort("");
				$this->CRYOPRESERVEDEMBRYOS->setSort("");
				$this->ViaAdmin->setSort("");
				$this->ViaStartDateTime->setSort("");
				$this->ViaDose->setSort("");
				$this->AllFreeze->setSort("");
				$this->TreatmentCancel->setSort("");
				$this->ProgesteroneAdmin->setSort("");
				$this->ProgesteroneStart->setSort("");
				$this->ProgesteroneDose->setSort("");
				$this->StChDate14->setSort("");
				$this->StChDate15->setSort("");
				$this->StChDate16->setSort("");
				$this->StChDate17->setSort("");
				$this->StChDate18->setSort("");
				$this->StChDate19->setSort("");
				$this->StChDate20->setSort("");
				$this->StChDate21->setSort("");
				$this->StChDate22->setSort("");
				$this->StChDate23->setSort("");
				$this->StChDate24->setSort("");
				$this->StChDate25->setSort("");
				$this->CycleDay14->setSort("");
				$this->CycleDay15->setSort("");
				$this->CycleDay16->setSort("");
				$this->CycleDay17->setSort("");
				$this->CycleDay18->setSort("");
				$this->CycleDay19->setSort("");
				$this->CycleDay20->setSort("");
				$this->CycleDay21->setSort("");
				$this->CycleDay22->setSort("");
				$this->CycleDay23->setSort("");
				$this->CycleDay24->setSort("");
				$this->CycleDay25->setSort("");
				$this->StimulationDay14->setSort("");
				$this->StimulationDay15->setSort("");
				$this->StimulationDay16->setSort("");
				$this->StimulationDay17->setSort("");
				$this->StimulationDay18->setSort("");
				$this->StimulationDay19->setSort("");
				$this->StimulationDay20->setSort("");
				$this->StimulationDay21->setSort("");
				$this->StimulationDay22->setSort("");
				$this->StimulationDay23->setSort("");
				$this->StimulationDay24->setSort("");
				$this->StimulationDay25->setSort("");
				$this->Tablet14->setSort("");
				$this->Tablet15->setSort("");
				$this->Tablet16->setSort("");
				$this->Tablet17->setSort("");
				$this->Tablet18->setSort("");
				$this->Tablet19->setSort("");
				$this->Tablet20->setSort("");
				$this->Tablet21->setSort("");
				$this->Tablet22->setSort("");
				$this->Tablet23->setSort("");
				$this->Tablet24->setSort("");
				$this->Tablet25->setSort("");
				$this->RFSH14->setSort("");
				$this->RFSH15->setSort("");
				$this->RFSH16->setSort("");
				$this->RFSH17->setSort("");
				$this->RFSH18->setSort("");
				$this->RFSH19->setSort("");
				$this->RFSH20->setSort("");
				$this->RFSH21->setSort("");
				$this->RFSH22->setSort("");
				$this->RFSH23->setSort("");
				$this->RFSH24->setSort("");
				$this->RFSH25->setSort("");
				$this->HMG14->setSort("");
				$this->HMG15->setSort("");
				$this->HMG16->setSort("");
				$this->HMG17->setSort("");
				$this->HMG18->setSort("");
				$this->HMG19->setSort("");
				$this->HMG20->setSort("");
				$this->HMG21->setSort("");
				$this->HMG22->setSort("");
				$this->HMG23->setSort("");
				$this->HMG24->setSort("");
				$this->HMG25->setSort("");
				$this->GnRH14->setSort("");
				$this->GnRH15->setSort("");
				$this->GnRH16->setSort("");
				$this->GnRH17->setSort("");
				$this->GnRH18->setSort("");
				$this->GnRH19->setSort("");
				$this->GnRH20->setSort("");
				$this->GnRH21->setSort("");
				$this->GnRH22->setSort("");
				$this->GnRH23->setSort("");
				$this->GnRH24->setSort("");
				$this->GnRH25->setSort("");
				$this->P414->setSort("");
				$this->P415->setSort("");
				$this->P416->setSort("");
				$this->P417->setSort("");
				$this->P418->setSort("");
				$this->P419->setSort("");
				$this->P420->setSort("");
				$this->P421->setSort("");
				$this->P422->setSort("");
				$this->P423->setSort("");
				$this->P424->setSort("");
				$this->P425->setSort("");
				$this->USGRt14->setSort("");
				$this->USGRt15->setSort("");
				$this->USGRt16->setSort("");
				$this->USGRt17->setSort("");
				$this->USGRt18->setSort("");
				$this->USGRt19->setSort("");
				$this->USGRt20->setSort("");
				$this->USGRt21->setSort("");
				$this->USGRt22->setSort("");
				$this->USGRt23->setSort("");
				$this->USGRt24->setSort("");
				$this->USGRt25->setSort("");
				$this->USGLt14->setSort("");
				$this->USGLt15->setSort("");
				$this->USGLt16->setSort("");
				$this->USGLt17->setSort("");
				$this->USGLt18->setSort("");
				$this->USGLt19->setSort("");
				$this->USGLt20->setSort("");
				$this->USGLt21->setSort("");
				$this->USGLt22->setSort("");
				$this->USGLt23->setSort("");
				$this->USGLt24->setSort("");
				$this->USGLt25->setSort("");
				$this->EM14->setSort("");
				$this->EM15->setSort("");
				$this->EM16->setSort("");
				$this->EM17->setSort("");
				$this->EM18->setSort("");
				$this->EM19->setSort("");
				$this->EM20->setSort("");
				$this->EM21->setSort("");
				$this->EM22->setSort("");
				$this->EM23->setSort("");
				$this->EM24->setSort("");
				$this->EM25->setSort("");
				$this->Others14->setSort("");
				$this->Others15->setSort("");
				$this->Others16->setSort("");
				$this->Others17->setSort("");
				$this->Others18->setSort("");
				$this->Others19->setSort("");
				$this->Others20->setSort("");
				$this->Others21->setSort("");
				$this->Others22->setSort("");
				$this->Others23->setSort("");
				$this->Others24->setSort("");
				$this->Others25->setSort("");
				$this->DR14->setSort("");
				$this->DR15->setSort("");
				$this->DR16->setSort("");
				$this->DR17->setSort("");
				$this->DR18->setSort("");
				$this->DR19->setSort("");
				$this->DR20->setSort("");
				$this->DR21->setSort("");
				$this->DR22->setSort("");
				$this->DR23->setSort("");
				$this->DR24->setSort("");
				$this->DR25->setSort("");
				$this->E214->setSort("");
				$this->E215->setSort("");
				$this->E216->setSort("");
				$this->E217->setSort("");
				$this->E218->setSort("");
				$this->E219->setSort("");
				$this->E220->setSort("");
				$this->E221->setSort("");
				$this->E222->setSort("");
				$this->E223->setSort("");
				$this->E224->setSort("");
				$this->E225->setSort("");
				$this->EEETTTDTE->setSort("");
				$this->bhcgdate->setSort("");
				$this->TUBAL_PATENCY->setSort("");
				$this->HSG->setSort("");
				$this->DHL->setSort("");
				$this->UTERINE_PROBLEMS->setSort("");
				$this->W_COMORBIDS->setSort("");
				$this->H_COMORBIDS->setSort("");
				$this->SEXUAL_DYSFUNCTION->setSort("");
				$this->TABLETS->setSort("");
				$this->FOLLICLE_STATUS->setSort("");
				$this->NUMBER_OF_IUI->setSort("");
				$this->PROCEDURE->setSort("");
				$this->LUTEAL_SUPPORT->setSort("");
				$this->SPECIFIC_MATERNAL_PROBLEMS->setSort("");
				$this->ONGOING_PREG->setSort("");
				$this->EDD_Date->setSort("");
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
		$item->Body = "<a class=\"ew-save-filter\" data-form=\"fivf_stimulation_chartlistsrch\" href=\"#\" onclick=\"return false;\">" . $Language->phrase("SaveCurrentFilter") . "</a>";
		$item->Visible = TRUE;
		$item = &$this->FilterOptions->add("deletefilter");
		$item->Body = "<a class=\"ew-delete-filter\" data-form=\"fivf_stimulation_chartlistsrch\" href=\"#\" onclick=\"return false;\">" . $Language->phrase("DeleteFilter") . "</a>";
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
					$item->Body = "<a class=\"ew-action ew-list-action\" title=\"" . HtmlEncode($caption) . "\" data-caption=\"" . HtmlEncode($caption) . "\" href=\"#\" onclick=\"return ew.submitAction(event,jQuery.extend({f:document.fivf_stimulation_chartlist}," . $listaction->toJson(TRUE) . "));\">" . $icon . "</a>";
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
		$this->RIDNo->setDbValue($row['RIDNo']);
		$this->Name->setDbValue($row['Name']);
		$this->ARTCycle->setDbValue($row['ARTCycle']);
		$this->FemaleFactor->setDbValue($row['FemaleFactor']);
		$this->MaleFactor->setDbValue($row['MaleFactor']);
		$this->Protocol->setDbValue($row['Protocol']);
		$this->SemenFrozen->setDbValue($row['SemenFrozen']);
		$this->A4ICSICycle->setDbValue($row['A4ICSICycle']);
		$this->TotalICSICycle->setDbValue($row['TotalICSICycle']);
		$this->TypeOfInfertility->setDbValue($row['TypeOfInfertility']);
		$this->Duration->setDbValue($row['Duration']);
		$this->LMP->setDbValue($row['LMP']);
		$this->RelevantHistory->setDbValue($row['RelevantHistory']);
		$this->IUICycles->setDbValue($row['IUICycles']);
		$this->AFC->setDbValue($row['AFC']);
		$this->AMH->setDbValue($row['AMH']);
		$this->FBMI->setDbValue($row['FBMI']);
		$this->MBMI->setDbValue($row['MBMI']);
		$this->OvarianVolumeRT->setDbValue($row['OvarianVolumeRT']);
		$this->OvarianVolumeLT->setDbValue($row['OvarianVolumeLT']);
		$this->DAYSOFSTIMULATION->setDbValue($row['DAYSOFSTIMULATION']);
		$this->DOSEOFGONADOTROPINS->setDbValue($row['DOSEOFGONADOTROPINS']);
		$this->INJTYPE->setDbValue($row['INJTYPE']);
		$this->ANTAGONISTDAYS->setDbValue($row['ANTAGONISTDAYS']);
		$this->ANTAGONISTSTARTDAY->setDbValue($row['ANTAGONISTSTARTDAY']);
		$this->GROWTHHORMONE->setDbValue($row['GROWTHHORMONE']);
		$this->PRETREATMENT->setDbValue($row['PRETREATMENT']);
		$this->SerumP4->setDbValue($row['SerumP4']);
		$this->FORT->setDbValue($row['FORT']);
		$this->MedicalFactors->setDbValue($row['MedicalFactors']);
		$this->SCDate->setDbValue($row['SCDate']);
		$this->OvarianSurgery->setDbValue($row['OvarianSurgery']);
		$this->PreProcedureOrder->setDbValue($row['PreProcedureOrder']);
		$this->TRIGGERR->setDbValue($row['TRIGGERR']);
		$this->TRIGGERDATE->setDbValue($row['TRIGGERDATE']);
		$this->ATHOMEorCLINIC->setDbValue($row['ATHOMEorCLINIC']);
		$this->OPUDATE->setDbValue($row['OPUDATE']);
		$this->ALLFREEZEINDICATION->setDbValue($row['ALLFREEZEINDICATION']);
		$this->ERA->setDbValue($row['ERA']);
		$this->PGTA->setDbValue($row['PGTA']);
		$this->PGD->setDbValue($row['PGD']);
		$this->DATEOFET->setDbValue($row['DATEOFET']);
		$this->ET->setDbValue($row['ET']);
		$this->ESET->setDbValue($row['ESET']);
		$this->DOET->setDbValue($row['DOET']);
		$this->SEMENPREPARATION->setDbValue($row['SEMENPREPARATION']);
		$this->REASONFORESET->setDbValue($row['REASONFORESET']);
		$this->Expectedoocytes->setDbValue($row['Expectedoocytes']);
		$this->StChDate1->setDbValue($row['StChDate1']);
		$this->StChDate2->setDbValue($row['StChDate2']);
		$this->StChDate3->setDbValue($row['StChDate3']);
		$this->StChDate4->setDbValue($row['StChDate4']);
		$this->StChDate5->setDbValue($row['StChDate5']);
		$this->StChDate6->setDbValue($row['StChDate6']);
		$this->StChDate7->setDbValue($row['StChDate7']);
		$this->StChDate8->setDbValue($row['StChDate8']);
		$this->StChDate9->setDbValue($row['StChDate9']);
		$this->StChDate10->setDbValue($row['StChDate10']);
		$this->StChDate11->setDbValue($row['StChDate11']);
		$this->StChDate12->setDbValue($row['StChDate12']);
		$this->StChDate13->setDbValue($row['StChDate13']);
		$this->CycleDay1->setDbValue($row['CycleDay1']);
		$this->CycleDay2->setDbValue($row['CycleDay2']);
		$this->CycleDay3->setDbValue($row['CycleDay3']);
		$this->CycleDay4->setDbValue($row['CycleDay4']);
		$this->CycleDay5->setDbValue($row['CycleDay5']);
		$this->CycleDay6->setDbValue($row['CycleDay6']);
		$this->CycleDay7->setDbValue($row['CycleDay7']);
		$this->CycleDay8->setDbValue($row['CycleDay8']);
		$this->CycleDay9->setDbValue($row['CycleDay9']);
		$this->CycleDay10->setDbValue($row['CycleDay10']);
		$this->CycleDay11->setDbValue($row['CycleDay11']);
		$this->CycleDay12->setDbValue($row['CycleDay12']);
		$this->CycleDay13->setDbValue($row['CycleDay13']);
		$this->StimulationDay1->setDbValue($row['StimulationDay1']);
		$this->StimulationDay2->setDbValue($row['StimulationDay2']);
		$this->StimulationDay3->setDbValue($row['StimulationDay3']);
		$this->StimulationDay4->setDbValue($row['StimulationDay4']);
		$this->StimulationDay5->setDbValue($row['StimulationDay5']);
		$this->StimulationDay6->setDbValue($row['StimulationDay6']);
		$this->StimulationDay7->setDbValue($row['StimulationDay7']);
		$this->StimulationDay8->setDbValue($row['StimulationDay8']);
		$this->StimulationDay9->setDbValue($row['StimulationDay9']);
		$this->StimulationDay10->setDbValue($row['StimulationDay10']);
		$this->StimulationDay11->setDbValue($row['StimulationDay11']);
		$this->StimulationDay12->setDbValue($row['StimulationDay12']);
		$this->StimulationDay13->setDbValue($row['StimulationDay13']);
		$this->Tablet1->setDbValue($row['Tablet1']);
		$this->Tablet2->setDbValue($row['Tablet2']);
		$this->Tablet3->setDbValue($row['Tablet3']);
		$this->Tablet4->setDbValue($row['Tablet4']);
		$this->Tablet5->setDbValue($row['Tablet5']);
		$this->Tablet6->setDbValue($row['Tablet6']);
		$this->Tablet7->setDbValue($row['Tablet7']);
		$this->Tablet8->setDbValue($row['Tablet8']);
		$this->Tablet9->setDbValue($row['Tablet9']);
		$this->Tablet10->setDbValue($row['Tablet10']);
		$this->Tablet11->setDbValue($row['Tablet11']);
		$this->Tablet12->setDbValue($row['Tablet12']);
		$this->Tablet13->setDbValue($row['Tablet13']);
		$this->RFSH1->setDbValue($row['RFSH1']);
		$this->RFSH2->setDbValue($row['RFSH2']);
		$this->RFSH3->setDbValue($row['RFSH3']);
		$this->RFSH4->setDbValue($row['RFSH4']);
		$this->RFSH5->setDbValue($row['RFSH5']);
		$this->RFSH6->setDbValue($row['RFSH6']);
		$this->RFSH7->setDbValue($row['RFSH7']);
		$this->RFSH8->setDbValue($row['RFSH8']);
		$this->RFSH9->setDbValue($row['RFSH9']);
		$this->RFSH10->setDbValue($row['RFSH10']);
		$this->RFSH11->setDbValue($row['RFSH11']);
		$this->RFSH12->setDbValue($row['RFSH12']);
		$this->RFSH13->setDbValue($row['RFSH13']);
		$this->HMG1->setDbValue($row['HMG1']);
		$this->HMG2->setDbValue($row['HMG2']);
		$this->HMG3->setDbValue($row['HMG3']);
		$this->HMG4->setDbValue($row['HMG4']);
		$this->HMG5->setDbValue($row['HMG5']);
		$this->HMG6->setDbValue($row['HMG6']);
		$this->HMG7->setDbValue($row['HMG7']);
		$this->HMG8->setDbValue($row['HMG8']);
		$this->HMG9->setDbValue($row['HMG9']);
		$this->HMG10->setDbValue($row['HMG10']);
		$this->HMG11->setDbValue($row['HMG11']);
		$this->HMG12->setDbValue($row['HMG12']);
		$this->HMG13->setDbValue($row['HMG13']);
		$this->GnRH1->setDbValue($row['GnRH1']);
		$this->GnRH2->setDbValue($row['GnRH2']);
		$this->GnRH3->setDbValue($row['GnRH3']);
		$this->GnRH4->setDbValue($row['GnRH4']);
		$this->GnRH5->setDbValue($row['GnRH5']);
		$this->GnRH6->setDbValue($row['GnRH6']);
		$this->GnRH7->setDbValue($row['GnRH7']);
		$this->GnRH8->setDbValue($row['GnRH8']);
		$this->GnRH9->setDbValue($row['GnRH9']);
		$this->GnRH10->setDbValue($row['GnRH10']);
		$this->GnRH11->setDbValue($row['GnRH11']);
		$this->GnRH12->setDbValue($row['GnRH12']);
		$this->GnRH13->setDbValue($row['GnRH13']);
		$this->E21->setDbValue($row['E21']);
		$this->E22->setDbValue($row['E22']);
		$this->E23->setDbValue($row['E23']);
		$this->E24->setDbValue($row['E24']);
		$this->E25->setDbValue($row['E25']);
		$this->E26->setDbValue($row['E26']);
		$this->E27->setDbValue($row['E27']);
		$this->E28->setDbValue($row['E28']);
		$this->E29->setDbValue($row['E29']);
		$this->E210->setDbValue($row['E210']);
		$this->E211->setDbValue($row['E211']);
		$this->E212->setDbValue($row['E212']);
		$this->E213->setDbValue($row['E213']);
		$this->P41->setDbValue($row['P41']);
		$this->P42->setDbValue($row['P42']);
		$this->P43->setDbValue($row['P43']);
		$this->P44->setDbValue($row['P44']);
		$this->P45->setDbValue($row['P45']);
		$this->P46->setDbValue($row['P46']);
		$this->P47->setDbValue($row['P47']);
		$this->P48->setDbValue($row['P48']);
		$this->P49->setDbValue($row['P49']);
		$this->P410->setDbValue($row['P410']);
		$this->P411->setDbValue($row['P411']);
		$this->P412->setDbValue($row['P412']);
		$this->P413->setDbValue($row['P413']);
		$this->USGRt1->setDbValue($row['USGRt1']);
		$this->USGRt2->setDbValue($row['USGRt2']);
		$this->USGRt3->setDbValue($row['USGRt3']);
		$this->USGRt4->setDbValue($row['USGRt4']);
		$this->USGRt5->setDbValue($row['USGRt5']);
		$this->USGRt6->setDbValue($row['USGRt6']);
		$this->USGRt7->setDbValue($row['USGRt7']);
		$this->USGRt8->setDbValue($row['USGRt8']);
		$this->USGRt9->setDbValue($row['USGRt9']);
		$this->USGRt10->setDbValue($row['USGRt10']);
		$this->USGRt11->setDbValue($row['USGRt11']);
		$this->USGRt12->setDbValue($row['USGRt12']);
		$this->USGRt13->setDbValue($row['USGRt13']);
		$this->USGLt1->setDbValue($row['USGLt1']);
		$this->USGLt2->setDbValue($row['USGLt2']);
		$this->USGLt3->setDbValue($row['USGLt3']);
		$this->USGLt4->setDbValue($row['USGLt4']);
		$this->USGLt5->setDbValue($row['USGLt5']);
		$this->USGLt6->setDbValue($row['USGLt6']);
		$this->USGLt7->setDbValue($row['USGLt7']);
		$this->USGLt8->setDbValue($row['USGLt8']);
		$this->USGLt9->setDbValue($row['USGLt9']);
		$this->USGLt10->setDbValue($row['USGLt10']);
		$this->USGLt11->setDbValue($row['USGLt11']);
		$this->USGLt12->setDbValue($row['USGLt12']);
		$this->USGLt13->setDbValue($row['USGLt13']);
		$this->EM1->setDbValue($row['EM1']);
		$this->EM2->setDbValue($row['EM2']);
		$this->EM3->setDbValue($row['EM3']);
		$this->EM4->setDbValue($row['EM4']);
		$this->EM5->setDbValue($row['EM5']);
		$this->EM6->setDbValue($row['EM6']);
		$this->EM7->setDbValue($row['EM7']);
		$this->EM8->setDbValue($row['EM8']);
		$this->EM9->setDbValue($row['EM9']);
		$this->EM10->setDbValue($row['EM10']);
		$this->EM11->setDbValue($row['EM11']);
		$this->EM12->setDbValue($row['EM12']);
		$this->EM13->setDbValue($row['EM13']);
		$this->Others1->setDbValue($row['Others1']);
		$this->Others2->setDbValue($row['Others2']);
		$this->Others3->setDbValue($row['Others3']);
		$this->Others4->setDbValue($row['Others4']);
		$this->Others5->setDbValue($row['Others5']);
		$this->Others6->setDbValue($row['Others6']);
		$this->Others7->setDbValue($row['Others7']);
		$this->Others8->setDbValue($row['Others8']);
		$this->Others9->setDbValue($row['Others9']);
		$this->Others10->setDbValue($row['Others10']);
		$this->Others11->setDbValue($row['Others11']);
		$this->Others12->setDbValue($row['Others12']);
		$this->Others13->setDbValue($row['Others13']);
		$this->DR1->setDbValue($row['DR1']);
		$this->DR2->setDbValue($row['DR2']);
		$this->DR3->setDbValue($row['DR3']);
		$this->DR4->setDbValue($row['DR4']);
		$this->DR5->setDbValue($row['DR5']);
		$this->DR6->setDbValue($row['DR6']);
		$this->DR7->setDbValue($row['DR7']);
		$this->DR8->setDbValue($row['DR8']);
		$this->DR9->setDbValue($row['DR9']);
		$this->DR10->setDbValue($row['DR10']);
		$this->DR11->setDbValue($row['DR11']);
		$this->DR12->setDbValue($row['DR12']);
		$this->DR13->setDbValue($row['DR13']);
		$this->DOCTORRESPONSIBLE->setDbValue($row['DOCTORRESPONSIBLE']);
		$this->TidNo->setDbValue($row['TidNo']);
		$this->Convert->setDbValue($row['Convert']);
		$this->Consultant->setDbValue($row['Consultant']);
		$this->InseminatinTechnique->setDbValue($row['InseminatinTechnique']);
		$this->IndicationForART->setDbValue($row['IndicationForART']);
		$this->Hysteroscopy->setDbValue($row['Hysteroscopy']);
		$this->EndometrialScratching->setDbValue($row['EndometrialScratching']);
		$this->TrialCannulation->setDbValue($row['TrialCannulation']);
		$this->CYCLETYPE->setDbValue($row['CYCLETYPE']);
		$this->HRTCYCLE->setDbValue($row['HRTCYCLE']);
		$this->OralEstrogenDosage->setDbValue($row['OralEstrogenDosage']);
		$this->VaginalEstrogen->setDbValue($row['VaginalEstrogen']);
		$this->GCSF->setDbValue($row['GCSF']);
		$this->ActivatedPRP->setDbValue($row['ActivatedPRP']);
		$this->UCLcm->setDbValue($row['UCLcm']);
		$this->DATOFEMBRYOTRANSFER->setDbValue($row['DATOFEMBRYOTRANSFER']);
		$this->DAYOFEMBRYOTRANSFER->setDbValue($row['DAYOFEMBRYOTRANSFER']);
		$this->NOOFEMBRYOSTHAWED->setDbValue($row['NOOFEMBRYOSTHAWED']);
		$this->NOOFEMBRYOSTRANSFERRED->setDbValue($row['NOOFEMBRYOSTRANSFERRED']);
		$this->DAYOFEMBRYOS->setDbValue($row['DAYOFEMBRYOS']);
		$this->CRYOPRESERVEDEMBRYOS->setDbValue($row['CRYOPRESERVEDEMBRYOS']);
		$this->ViaAdmin->setDbValue($row['ViaAdmin']);
		$this->ViaStartDateTime->setDbValue($row['ViaStartDateTime']);
		$this->ViaDose->setDbValue($row['ViaDose']);
		$this->AllFreeze->setDbValue($row['AllFreeze']);
		$this->TreatmentCancel->setDbValue($row['TreatmentCancel']);
		$this->Reason->setDbValue($row['Reason']);
		$this->ProgesteroneAdmin->setDbValue($row['ProgesteroneAdmin']);
		$this->ProgesteroneStart->setDbValue($row['ProgesteroneStart']);
		$this->ProgesteroneDose->setDbValue($row['ProgesteroneDose']);
		$this->Projectron->setDbValue($row['Projectron']);
		$this->StChDate14->setDbValue($row['StChDate14']);
		$this->StChDate15->setDbValue($row['StChDate15']);
		$this->StChDate16->setDbValue($row['StChDate16']);
		$this->StChDate17->setDbValue($row['StChDate17']);
		$this->StChDate18->setDbValue($row['StChDate18']);
		$this->StChDate19->setDbValue($row['StChDate19']);
		$this->StChDate20->setDbValue($row['StChDate20']);
		$this->StChDate21->setDbValue($row['StChDate21']);
		$this->StChDate22->setDbValue($row['StChDate22']);
		$this->StChDate23->setDbValue($row['StChDate23']);
		$this->StChDate24->setDbValue($row['StChDate24']);
		$this->StChDate25->setDbValue($row['StChDate25']);
		$this->CycleDay14->setDbValue($row['CycleDay14']);
		$this->CycleDay15->setDbValue($row['CycleDay15']);
		$this->CycleDay16->setDbValue($row['CycleDay16']);
		$this->CycleDay17->setDbValue($row['CycleDay17']);
		$this->CycleDay18->setDbValue($row['CycleDay18']);
		$this->CycleDay19->setDbValue($row['CycleDay19']);
		$this->CycleDay20->setDbValue($row['CycleDay20']);
		$this->CycleDay21->setDbValue($row['CycleDay21']);
		$this->CycleDay22->setDbValue($row['CycleDay22']);
		$this->CycleDay23->setDbValue($row['CycleDay23']);
		$this->CycleDay24->setDbValue($row['CycleDay24']);
		$this->CycleDay25->setDbValue($row['CycleDay25']);
		$this->StimulationDay14->setDbValue($row['StimulationDay14']);
		$this->StimulationDay15->setDbValue($row['StimulationDay15']);
		$this->StimulationDay16->setDbValue($row['StimulationDay16']);
		$this->StimulationDay17->setDbValue($row['StimulationDay17']);
		$this->StimulationDay18->setDbValue($row['StimulationDay18']);
		$this->StimulationDay19->setDbValue($row['StimulationDay19']);
		$this->StimulationDay20->setDbValue($row['StimulationDay20']);
		$this->StimulationDay21->setDbValue($row['StimulationDay21']);
		$this->StimulationDay22->setDbValue($row['StimulationDay22']);
		$this->StimulationDay23->setDbValue($row['StimulationDay23']);
		$this->StimulationDay24->setDbValue($row['StimulationDay24']);
		$this->StimulationDay25->setDbValue($row['StimulationDay25']);
		$this->Tablet14->setDbValue($row['Tablet14']);
		$this->Tablet15->setDbValue($row['Tablet15']);
		$this->Tablet16->setDbValue($row['Tablet16']);
		$this->Tablet17->setDbValue($row['Tablet17']);
		$this->Tablet18->setDbValue($row['Tablet18']);
		$this->Tablet19->setDbValue($row['Tablet19']);
		$this->Tablet20->setDbValue($row['Tablet20']);
		$this->Tablet21->setDbValue($row['Tablet21']);
		$this->Tablet22->setDbValue($row['Tablet22']);
		$this->Tablet23->setDbValue($row['Tablet23']);
		$this->Tablet24->setDbValue($row['Tablet24']);
		$this->Tablet25->setDbValue($row['Tablet25']);
		$this->RFSH14->setDbValue($row['RFSH14']);
		$this->RFSH15->setDbValue($row['RFSH15']);
		$this->RFSH16->setDbValue($row['RFSH16']);
		$this->RFSH17->setDbValue($row['RFSH17']);
		$this->RFSH18->setDbValue($row['RFSH18']);
		$this->RFSH19->setDbValue($row['RFSH19']);
		$this->RFSH20->setDbValue($row['RFSH20']);
		$this->RFSH21->setDbValue($row['RFSH21']);
		$this->RFSH22->setDbValue($row['RFSH22']);
		$this->RFSH23->setDbValue($row['RFSH23']);
		$this->RFSH24->setDbValue($row['RFSH24']);
		$this->RFSH25->setDbValue($row['RFSH25']);
		$this->HMG14->setDbValue($row['HMG14']);
		$this->HMG15->setDbValue($row['HMG15']);
		$this->HMG16->setDbValue($row['HMG16']);
		$this->HMG17->setDbValue($row['HMG17']);
		$this->HMG18->setDbValue($row['HMG18']);
		$this->HMG19->setDbValue($row['HMG19']);
		$this->HMG20->setDbValue($row['HMG20']);
		$this->HMG21->setDbValue($row['HMG21']);
		$this->HMG22->setDbValue($row['HMG22']);
		$this->HMG23->setDbValue($row['HMG23']);
		$this->HMG24->setDbValue($row['HMG24']);
		$this->HMG25->setDbValue($row['HMG25']);
		$this->GnRH14->setDbValue($row['GnRH14']);
		$this->GnRH15->setDbValue($row['GnRH15']);
		$this->GnRH16->setDbValue($row['GnRH16']);
		$this->GnRH17->setDbValue($row['GnRH17']);
		$this->GnRH18->setDbValue($row['GnRH18']);
		$this->GnRH19->setDbValue($row['GnRH19']);
		$this->GnRH20->setDbValue($row['GnRH20']);
		$this->GnRH21->setDbValue($row['GnRH21']);
		$this->GnRH22->setDbValue($row['GnRH22']);
		$this->GnRH23->setDbValue($row['GnRH23']);
		$this->GnRH24->setDbValue($row['GnRH24']);
		$this->GnRH25->setDbValue($row['GnRH25']);
		$this->P414->setDbValue($row['P414']);
		$this->P415->setDbValue($row['P415']);
		$this->P416->setDbValue($row['P416']);
		$this->P417->setDbValue($row['P417']);
		$this->P418->setDbValue($row['P418']);
		$this->P419->setDbValue($row['P419']);
		$this->P420->setDbValue($row['P420']);
		$this->P421->setDbValue($row['P421']);
		$this->P422->setDbValue($row['P422']);
		$this->P423->setDbValue($row['P423']);
		$this->P424->setDbValue($row['P424']);
		$this->P425->setDbValue($row['P425']);
		$this->USGRt14->setDbValue($row['USGRt14']);
		$this->USGRt15->setDbValue($row['USGRt15']);
		$this->USGRt16->setDbValue($row['USGRt16']);
		$this->USGRt17->setDbValue($row['USGRt17']);
		$this->USGRt18->setDbValue($row['USGRt18']);
		$this->USGRt19->setDbValue($row['USGRt19']);
		$this->USGRt20->setDbValue($row['USGRt20']);
		$this->USGRt21->setDbValue($row['USGRt21']);
		$this->USGRt22->setDbValue($row['USGRt22']);
		$this->USGRt23->setDbValue($row['USGRt23']);
		$this->USGRt24->setDbValue($row['USGRt24']);
		$this->USGRt25->setDbValue($row['USGRt25']);
		$this->USGLt14->setDbValue($row['USGLt14']);
		$this->USGLt15->setDbValue($row['USGLt15']);
		$this->USGLt16->setDbValue($row['USGLt16']);
		$this->USGLt17->setDbValue($row['USGLt17']);
		$this->USGLt18->setDbValue($row['USGLt18']);
		$this->USGLt19->setDbValue($row['USGLt19']);
		$this->USGLt20->setDbValue($row['USGLt20']);
		$this->USGLt21->setDbValue($row['USGLt21']);
		$this->USGLt22->setDbValue($row['USGLt22']);
		$this->USGLt23->setDbValue($row['USGLt23']);
		$this->USGLt24->setDbValue($row['USGLt24']);
		$this->USGLt25->setDbValue($row['USGLt25']);
		$this->EM14->setDbValue($row['EM14']);
		$this->EM15->setDbValue($row['EM15']);
		$this->EM16->setDbValue($row['EM16']);
		$this->EM17->setDbValue($row['EM17']);
		$this->EM18->setDbValue($row['EM18']);
		$this->EM19->setDbValue($row['EM19']);
		$this->EM20->setDbValue($row['EM20']);
		$this->EM21->setDbValue($row['EM21']);
		$this->EM22->setDbValue($row['EM22']);
		$this->EM23->setDbValue($row['EM23']);
		$this->EM24->setDbValue($row['EM24']);
		$this->EM25->setDbValue($row['EM25']);
		$this->Others14->setDbValue($row['Others14']);
		$this->Others15->setDbValue($row['Others15']);
		$this->Others16->setDbValue($row['Others16']);
		$this->Others17->setDbValue($row['Others17']);
		$this->Others18->setDbValue($row['Others18']);
		$this->Others19->setDbValue($row['Others19']);
		$this->Others20->setDbValue($row['Others20']);
		$this->Others21->setDbValue($row['Others21']);
		$this->Others22->setDbValue($row['Others22']);
		$this->Others23->setDbValue($row['Others23']);
		$this->Others24->setDbValue($row['Others24']);
		$this->Others25->setDbValue($row['Others25']);
		$this->DR14->setDbValue($row['DR14']);
		$this->DR15->setDbValue($row['DR15']);
		$this->DR16->setDbValue($row['DR16']);
		$this->DR17->setDbValue($row['DR17']);
		$this->DR18->setDbValue($row['DR18']);
		$this->DR19->setDbValue($row['DR19']);
		$this->DR20->setDbValue($row['DR20']);
		$this->DR21->setDbValue($row['DR21']);
		$this->DR22->setDbValue($row['DR22']);
		$this->DR23->setDbValue($row['DR23']);
		$this->DR24->setDbValue($row['DR24']);
		$this->DR25->setDbValue($row['DR25']);
		$this->E214->setDbValue($row['E214']);
		$this->E215->setDbValue($row['E215']);
		$this->E216->setDbValue($row['E216']);
		$this->E217->setDbValue($row['E217']);
		$this->E218->setDbValue($row['E218']);
		$this->E219->setDbValue($row['E219']);
		$this->E220->setDbValue($row['E220']);
		$this->E221->setDbValue($row['E221']);
		$this->E222->setDbValue($row['E222']);
		$this->E223->setDbValue($row['E223']);
		$this->E224->setDbValue($row['E224']);
		$this->E225->setDbValue($row['E225']);
		$this->EEETTTDTE->setDbValue($row['EEETTTDTE']);
		$this->bhcgdate->setDbValue($row['bhcgdate']);
		$this->TUBAL_PATENCY->setDbValue($row['TUBAL_PATENCY']);
		$this->HSG->setDbValue($row['HSG']);
		$this->DHL->setDbValue($row['DHL']);
		$this->UTERINE_PROBLEMS->setDbValue($row['UTERINE_PROBLEMS']);
		$this->W_COMORBIDS->setDbValue($row['W_COMORBIDS']);
		$this->H_COMORBIDS->setDbValue($row['H_COMORBIDS']);
		$this->SEXUAL_DYSFUNCTION->setDbValue($row['SEXUAL_DYSFUNCTION']);
		$this->TABLETS->setDbValue($row['TABLETS']);
		$this->FOLLICLE_STATUS->setDbValue($row['FOLLICLE_STATUS']);
		$this->NUMBER_OF_IUI->setDbValue($row['NUMBER_OF_IUI']);
		$this->PROCEDURE->setDbValue($row['PROCEDURE']);
		$this->LUTEAL_SUPPORT->setDbValue($row['LUTEAL_SUPPORT']);
		$this->SPECIFIC_MATERNAL_PROBLEMS->setDbValue($row['SPECIFIC_MATERNAL_PROBLEMS']);
		$this->ONGOING_PREG->setDbValue($row['ONGOING_PREG']);
		$this->EDD_Date->setDbValue($row['EDD_Date']);
	}

	// Return a row with default values
	protected function newRow()
	{
		$row = [];
		$row['id'] = NULL;
		$row['RIDNo'] = NULL;
		$row['Name'] = NULL;
		$row['ARTCycle'] = NULL;
		$row['FemaleFactor'] = NULL;
		$row['MaleFactor'] = NULL;
		$row['Protocol'] = NULL;
		$row['SemenFrozen'] = NULL;
		$row['A4ICSICycle'] = NULL;
		$row['TotalICSICycle'] = NULL;
		$row['TypeOfInfertility'] = NULL;
		$row['Duration'] = NULL;
		$row['LMP'] = NULL;
		$row['RelevantHistory'] = NULL;
		$row['IUICycles'] = NULL;
		$row['AFC'] = NULL;
		$row['AMH'] = NULL;
		$row['FBMI'] = NULL;
		$row['MBMI'] = NULL;
		$row['OvarianVolumeRT'] = NULL;
		$row['OvarianVolumeLT'] = NULL;
		$row['DAYSOFSTIMULATION'] = NULL;
		$row['DOSEOFGONADOTROPINS'] = NULL;
		$row['INJTYPE'] = NULL;
		$row['ANTAGONISTDAYS'] = NULL;
		$row['ANTAGONISTSTARTDAY'] = NULL;
		$row['GROWTHHORMONE'] = NULL;
		$row['PRETREATMENT'] = NULL;
		$row['SerumP4'] = NULL;
		$row['FORT'] = NULL;
		$row['MedicalFactors'] = NULL;
		$row['SCDate'] = NULL;
		$row['OvarianSurgery'] = NULL;
		$row['PreProcedureOrder'] = NULL;
		$row['TRIGGERR'] = NULL;
		$row['TRIGGERDATE'] = NULL;
		$row['ATHOMEorCLINIC'] = NULL;
		$row['OPUDATE'] = NULL;
		$row['ALLFREEZEINDICATION'] = NULL;
		$row['ERA'] = NULL;
		$row['PGTA'] = NULL;
		$row['PGD'] = NULL;
		$row['DATEOFET'] = NULL;
		$row['ET'] = NULL;
		$row['ESET'] = NULL;
		$row['DOET'] = NULL;
		$row['SEMENPREPARATION'] = NULL;
		$row['REASONFORESET'] = NULL;
		$row['Expectedoocytes'] = NULL;
		$row['StChDate1'] = NULL;
		$row['StChDate2'] = NULL;
		$row['StChDate3'] = NULL;
		$row['StChDate4'] = NULL;
		$row['StChDate5'] = NULL;
		$row['StChDate6'] = NULL;
		$row['StChDate7'] = NULL;
		$row['StChDate8'] = NULL;
		$row['StChDate9'] = NULL;
		$row['StChDate10'] = NULL;
		$row['StChDate11'] = NULL;
		$row['StChDate12'] = NULL;
		$row['StChDate13'] = NULL;
		$row['CycleDay1'] = NULL;
		$row['CycleDay2'] = NULL;
		$row['CycleDay3'] = NULL;
		$row['CycleDay4'] = NULL;
		$row['CycleDay5'] = NULL;
		$row['CycleDay6'] = NULL;
		$row['CycleDay7'] = NULL;
		$row['CycleDay8'] = NULL;
		$row['CycleDay9'] = NULL;
		$row['CycleDay10'] = NULL;
		$row['CycleDay11'] = NULL;
		$row['CycleDay12'] = NULL;
		$row['CycleDay13'] = NULL;
		$row['StimulationDay1'] = NULL;
		$row['StimulationDay2'] = NULL;
		$row['StimulationDay3'] = NULL;
		$row['StimulationDay4'] = NULL;
		$row['StimulationDay5'] = NULL;
		$row['StimulationDay6'] = NULL;
		$row['StimulationDay7'] = NULL;
		$row['StimulationDay8'] = NULL;
		$row['StimulationDay9'] = NULL;
		$row['StimulationDay10'] = NULL;
		$row['StimulationDay11'] = NULL;
		$row['StimulationDay12'] = NULL;
		$row['StimulationDay13'] = NULL;
		$row['Tablet1'] = NULL;
		$row['Tablet2'] = NULL;
		$row['Tablet3'] = NULL;
		$row['Tablet4'] = NULL;
		$row['Tablet5'] = NULL;
		$row['Tablet6'] = NULL;
		$row['Tablet7'] = NULL;
		$row['Tablet8'] = NULL;
		$row['Tablet9'] = NULL;
		$row['Tablet10'] = NULL;
		$row['Tablet11'] = NULL;
		$row['Tablet12'] = NULL;
		$row['Tablet13'] = NULL;
		$row['RFSH1'] = NULL;
		$row['RFSH2'] = NULL;
		$row['RFSH3'] = NULL;
		$row['RFSH4'] = NULL;
		$row['RFSH5'] = NULL;
		$row['RFSH6'] = NULL;
		$row['RFSH7'] = NULL;
		$row['RFSH8'] = NULL;
		$row['RFSH9'] = NULL;
		$row['RFSH10'] = NULL;
		$row['RFSH11'] = NULL;
		$row['RFSH12'] = NULL;
		$row['RFSH13'] = NULL;
		$row['HMG1'] = NULL;
		$row['HMG2'] = NULL;
		$row['HMG3'] = NULL;
		$row['HMG4'] = NULL;
		$row['HMG5'] = NULL;
		$row['HMG6'] = NULL;
		$row['HMG7'] = NULL;
		$row['HMG8'] = NULL;
		$row['HMG9'] = NULL;
		$row['HMG10'] = NULL;
		$row['HMG11'] = NULL;
		$row['HMG12'] = NULL;
		$row['HMG13'] = NULL;
		$row['GnRH1'] = NULL;
		$row['GnRH2'] = NULL;
		$row['GnRH3'] = NULL;
		$row['GnRH4'] = NULL;
		$row['GnRH5'] = NULL;
		$row['GnRH6'] = NULL;
		$row['GnRH7'] = NULL;
		$row['GnRH8'] = NULL;
		$row['GnRH9'] = NULL;
		$row['GnRH10'] = NULL;
		$row['GnRH11'] = NULL;
		$row['GnRH12'] = NULL;
		$row['GnRH13'] = NULL;
		$row['E21'] = NULL;
		$row['E22'] = NULL;
		$row['E23'] = NULL;
		$row['E24'] = NULL;
		$row['E25'] = NULL;
		$row['E26'] = NULL;
		$row['E27'] = NULL;
		$row['E28'] = NULL;
		$row['E29'] = NULL;
		$row['E210'] = NULL;
		$row['E211'] = NULL;
		$row['E212'] = NULL;
		$row['E213'] = NULL;
		$row['P41'] = NULL;
		$row['P42'] = NULL;
		$row['P43'] = NULL;
		$row['P44'] = NULL;
		$row['P45'] = NULL;
		$row['P46'] = NULL;
		$row['P47'] = NULL;
		$row['P48'] = NULL;
		$row['P49'] = NULL;
		$row['P410'] = NULL;
		$row['P411'] = NULL;
		$row['P412'] = NULL;
		$row['P413'] = NULL;
		$row['USGRt1'] = NULL;
		$row['USGRt2'] = NULL;
		$row['USGRt3'] = NULL;
		$row['USGRt4'] = NULL;
		$row['USGRt5'] = NULL;
		$row['USGRt6'] = NULL;
		$row['USGRt7'] = NULL;
		$row['USGRt8'] = NULL;
		$row['USGRt9'] = NULL;
		$row['USGRt10'] = NULL;
		$row['USGRt11'] = NULL;
		$row['USGRt12'] = NULL;
		$row['USGRt13'] = NULL;
		$row['USGLt1'] = NULL;
		$row['USGLt2'] = NULL;
		$row['USGLt3'] = NULL;
		$row['USGLt4'] = NULL;
		$row['USGLt5'] = NULL;
		$row['USGLt6'] = NULL;
		$row['USGLt7'] = NULL;
		$row['USGLt8'] = NULL;
		$row['USGLt9'] = NULL;
		$row['USGLt10'] = NULL;
		$row['USGLt11'] = NULL;
		$row['USGLt12'] = NULL;
		$row['USGLt13'] = NULL;
		$row['EM1'] = NULL;
		$row['EM2'] = NULL;
		$row['EM3'] = NULL;
		$row['EM4'] = NULL;
		$row['EM5'] = NULL;
		$row['EM6'] = NULL;
		$row['EM7'] = NULL;
		$row['EM8'] = NULL;
		$row['EM9'] = NULL;
		$row['EM10'] = NULL;
		$row['EM11'] = NULL;
		$row['EM12'] = NULL;
		$row['EM13'] = NULL;
		$row['Others1'] = NULL;
		$row['Others2'] = NULL;
		$row['Others3'] = NULL;
		$row['Others4'] = NULL;
		$row['Others5'] = NULL;
		$row['Others6'] = NULL;
		$row['Others7'] = NULL;
		$row['Others8'] = NULL;
		$row['Others9'] = NULL;
		$row['Others10'] = NULL;
		$row['Others11'] = NULL;
		$row['Others12'] = NULL;
		$row['Others13'] = NULL;
		$row['DR1'] = NULL;
		$row['DR2'] = NULL;
		$row['DR3'] = NULL;
		$row['DR4'] = NULL;
		$row['DR5'] = NULL;
		$row['DR6'] = NULL;
		$row['DR7'] = NULL;
		$row['DR8'] = NULL;
		$row['DR9'] = NULL;
		$row['DR10'] = NULL;
		$row['DR11'] = NULL;
		$row['DR12'] = NULL;
		$row['DR13'] = NULL;
		$row['DOCTORRESPONSIBLE'] = NULL;
		$row['TidNo'] = NULL;
		$row['Convert'] = NULL;
		$row['Consultant'] = NULL;
		$row['InseminatinTechnique'] = NULL;
		$row['IndicationForART'] = NULL;
		$row['Hysteroscopy'] = NULL;
		$row['EndometrialScratching'] = NULL;
		$row['TrialCannulation'] = NULL;
		$row['CYCLETYPE'] = NULL;
		$row['HRTCYCLE'] = NULL;
		$row['OralEstrogenDosage'] = NULL;
		$row['VaginalEstrogen'] = NULL;
		$row['GCSF'] = NULL;
		$row['ActivatedPRP'] = NULL;
		$row['UCLcm'] = NULL;
		$row['DATOFEMBRYOTRANSFER'] = NULL;
		$row['DAYOFEMBRYOTRANSFER'] = NULL;
		$row['NOOFEMBRYOSTHAWED'] = NULL;
		$row['NOOFEMBRYOSTRANSFERRED'] = NULL;
		$row['DAYOFEMBRYOS'] = NULL;
		$row['CRYOPRESERVEDEMBRYOS'] = NULL;
		$row['ViaAdmin'] = NULL;
		$row['ViaStartDateTime'] = NULL;
		$row['ViaDose'] = NULL;
		$row['AllFreeze'] = NULL;
		$row['TreatmentCancel'] = NULL;
		$row['Reason'] = NULL;
		$row['ProgesteroneAdmin'] = NULL;
		$row['ProgesteroneStart'] = NULL;
		$row['ProgesteroneDose'] = NULL;
		$row['Projectron'] = NULL;
		$row['StChDate14'] = NULL;
		$row['StChDate15'] = NULL;
		$row['StChDate16'] = NULL;
		$row['StChDate17'] = NULL;
		$row['StChDate18'] = NULL;
		$row['StChDate19'] = NULL;
		$row['StChDate20'] = NULL;
		$row['StChDate21'] = NULL;
		$row['StChDate22'] = NULL;
		$row['StChDate23'] = NULL;
		$row['StChDate24'] = NULL;
		$row['StChDate25'] = NULL;
		$row['CycleDay14'] = NULL;
		$row['CycleDay15'] = NULL;
		$row['CycleDay16'] = NULL;
		$row['CycleDay17'] = NULL;
		$row['CycleDay18'] = NULL;
		$row['CycleDay19'] = NULL;
		$row['CycleDay20'] = NULL;
		$row['CycleDay21'] = NULL;
		$row['CycleDay22'] = NULL;
		$row['CycleDay23'] = NULL;
		$row['CycleDay24'] = NULL;
		$row['CycleDay25'] = NULL;
		$row['StimulationDay14'] = NULL;
		$row['StimulationDay15'] = NULL;
		$row['StimulationDay16'] = NULL;
		$row['StimulationDay17'] = NULL;
		$row['StimulationDay18'] = NULL;
		$row['StimulationDay19'] = NULL;
		$row['StimulationDay20'] = NULL;
		$row['StimulationDay21'] = NULL;
		$row['StimulationDay22'] = NULL;
		$row['StimulationDay23'] = NULL;
		$row['StimulationDay24'] = NULL;
		$row['StimulationDay25'] = NULL;
		$row['Tablet14'] = NULL;
		$row['Tablet15'] = NULL;
		$row['Tablet16'] = NULL;
		$row['Tablet17'] = NULL;
		$row['Tablet18'] = NULL;
		$row['Tablet19'] = NULL;
		$row['Tablet20'] = NULL;
		$row['Tablet21'] = NULL;
		$row['Tablet22'] = NULL;
		$row['Tablet23'] = NULL;
		$row['Tablet24'] = NULL;
		$row['Tablet25'] = NULL;
		$row['RFSH14'] = NULL;
		$row['RFSH15'] = NULL;
		$row['RFSH16'] = NULL;
		$row['RFSH17'] = NULL;
		$row['RFSH18'] = NULL;
		$row['RFSH19'] = NULL;
		$row['RFSH20'] = NULL;
		$row['RFSH21'] = NULL;
		$row['RFSH22'] = NULL;
		$row['RFSH23'] = NULL;
		$row['RFSH24'] = NULL;
		$row['RFSH25'] = NULL;
		$row['HMG14'] = NULL;
		$row['HMG15'] = NULL;
		$row['HMG16'] = NULL;
		$row['HMG17'] = NULL;
		$row['HMG18'] = NULL;
		$row['HMG19'] = NULL;
		$row['HMG20'] = NULL;
		$row['HMG21'] = NULL;
		$row['HMG22'] = NULL;
		$row['HMG23'] = NULL;
		$row['HMG24'] = NULL;
		$row['HMG25'] = NULL;
		$row['GnRH14'] = NULL;
		$row['GnRH15'] = NULL;
		$row['GnRH16'] = NULL;
		$row['GnRH17'] = NULL;
		$row['GnRH18'] = NULL;
		$row['GnRH19'] = NULL;
		$row['GnRH20'] = NULL;
		$row['GnRH21'] = NULL;
		$row['GnRH22'] = NULL;
		$row['GnRH23'] = NULL;
		$row['GnRH24'] = NULL;
		$row['GnRH25'] = NULL;
		$row['P414'] = NULL;
		$row['P415'] = NULL;
		$row['P416'] = NULL;
		$row['P417'] = NULL;
		$row['P418'] = NULL;
		$row['P419'] = NULL;
		$row['P420'] = NULL;
		$row['P421'] = NULL;
		$row['P422'] = NULL;
		$row['P423'] = NULL;
		$row['P424'] = NULL;
		$row['P425'] = NULL;
		$row['USGRt14'] = NULL;
		$row['USGRt15'] = NULL;
		$row['USGRt16'] = NULL;
		$row['USGRt17'] = NULL;
		$row['USGRt18'] = NULL;
		$row['USGRt19'] = NULL;
		$row['USGRt20'] = NULL;
		$row['USGRt21'] = NULL;
		$row['USGRt22'] = NULL;
		$row['USGRt23'] = NULL;
		$row['USGRt24'] = NULL;
		$row['USGRt25'] = NULL;
		$row['USGLt14'] = NULL;
		$row['USGLt15'] = NULL;
		$row['USGLt16'] = NULL;
		$row['USGLt17'] = NULL;
		$row['USGLt18'] = NULL;
		$row['USGLt19'] = NULL;
		$row['USGLt20'] = NULL;
		$row['USGLt21'] = NULL;
		$row['USGLt22'] = NULL;
		$row['USGLt23'] = NULL;
		$row['USGLt24'] = NULL;
		$row['USGLt25'] = NULL;
		$row['EM14'] = NULL;
		$row['EM15'] = NULL;
		$row['EM16'] = NULL;
		$row['EM17'] = NULL;
		$row['EM18'] = NULL;
		$row['EM19'] = NULL;
		$row['EM20'] = NULL;
		$row['EM21'] = NULL;
		$row['EM22'] = NULL;
		$row['EM23'] = NULL;
		$row['EM24'] = NULL;
		$row['EM25'] = NULL;
		$row['Others14'] = NULL;
		$row['Others15'] = NULL;
		$row['Others16'] = NULL;
		$row['Others17'] = NULL;
		$row['Others18'] = NULL;
		$row['Others19'] = NULL;
		$row['Others20'] = NULL;
		$row['Others21'] = NULL;
		$row['Others22'] = NULL;
		$row['Others23'] = NULL;
		$row['Others24'] = NULL;
		$row['Others25'] = NULL;
		$row['DR14'] = NULL;
		$row['DR15'] = NULL;
		$row['DR16'] = NULL;
		$row['DR17'] = NULL;
		$row['DR18'] = NULL;
		$row['DR19'] = NULL;
		$row['DR20'] = NULL;
		$row['DR21'] = NULL;
		$row['DR22'] = NULL;
		$row['DR23'] = NULL;
		$row['DR24'] = NULL;
		$row['DR25'] = NULL;
		$row['E214'] = NULL;
		$row['E215'] = NULL;
		$row['E216'] = NULL;
		$row['E217'] = NULL;
		$row['E218'] = NULL;
		$row['E219'] = NULL;
		$row['E220'] = NULL;
		$row['E221'] = NULL;
		$row['E222'] = NULL;
		$row['E223'] = NULL;
		$row['E224'] = NULL;
		$row['E225'] = NULL;
		$row['EEETTTDTE'] = NULL;
		$row['bhcgdate'] = NULL;
		$row['TUBAL_PATENCY'] = NULL;
		$row['HSG'] = NULL;
		$row['DHL'] = NULL;
		$row['UTERINE_PROBLEMS'] = NULL;
		$row['W_COMORBIDS'] = NULL;
		$row['H_COMORBIDS'] = NULL;
		$row['SEXUAL_DYSFUNCTION'] = NULL;
		$row['TABLETS'] = NULL;
		$row['FOLLICLE_STATUS'] = NULL;
		$row['NUMBER_OF_IUI'] = NULL;
		$row['PROCEDURE'] = NULL;
		$row['LUTEAL_SUPPORT'] = NULL;
		$row['SPECIFIC_MATERNAL_PROBLEMS'] = NULL;
		$row['ONGOING_PREG'] = NULL;
		$row['EDD_Date'] = NULL;
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
		// RIDNo
		// Name
		// ARTCycle
		// FemaleFactor
		// MaleFactor
		// Protocol
		// SemenFrozen
		// A4ICSICycle
		// TotalICSICycle
		// TypeOfInfertility
		// Duration
		// LMP
		// RelevantHistory
		// IUICycles
		// AFC
		// AMH
		// FBMI
		// MBMI
		// OvarianVolumeRT
		// OvarianVolumeLT
		// DAYSOFSTIMULATION
		// DOSEOFGONADOTROPINS
		// INJTYPE
		// ANTAGONISTDAYS
		// ANTAGONISTSTARTDAY
		// GROWTHHORMONE
		// PRETREATMENT
		// SerumP4
		// FORT
		// MedicalFactors
		// SCDate
		// OvarianSurgery
		// PreProcedureOrder
		// TRIGGERR
		// TRIGGERDATE
		// ATHOMEorCLINIC
		// OPUDATE
		// ALLFREEZEINDICATION
		// ERA
		// PGTA
		// PGD
		// DATEOFET
		// ET
		// ESET
		// DOET
		// SEMENPREPARATION
		// REASONFORESET
		// Expectedoocytes
		// StChDate1
		// StChDate2
		// StChDate3
		// StChDate4
		// StChDate5
		// StChDate6
		// StChDate7
		// StChDate8
		// StChDate9
		// StChDate10
		// StChDate11
		// StChDate12
		// StChDate13
		// CycleDay1
		// CycleDay2
		// CycleDay3
		// CycleDay4
		// CycleDay5
		// CycleDay6
		// CycleDay7
		// CycleDay8
		// CycleDay9
		// CycleDay10
		// CycleDay11
		// CycleDay12
		// CycleDay13
		// StimulationDay1
		// StimulationDay2
		// StimulationDay3
		// StimulationDay4
		// StimulationDay5
		// StimulationDay6
		// StimulationDay7
		// StimulationDay8
		// StimulationDay9
		// StimulationDay10
		// StimulationDay11
		// StimulationDay12
		// StimulationDay13
		// Tablet1
		// Tablet2
		// Tablet3
		// Tablet4
		// Tablet5
		// Tablet6
		// Tablet7
		// Tablet8
		// Tablet9
		// Tablet10
		// Tablet11
		// Tablet12
		// Tablet13
		// RFSH1
		// RFSH2
		// RFSH3
		// RFSH4
		// RFSH5
		// RFSH6
		// RFSH7
		// RFSH8
		// RFSH9
		// RFSH10
		// RFSH11
		// RFSH12
		// RFSH13
		// HMG1
		// HMG2
		// HMG3
		// HMG4
		// HMG5
		// HMG6
		// HMG7
		// HMG8
		// HMG9
		// HMG10
		// HMG11
		// HMG12
		// HMG13
		// GnRH1
		// GnRH2
		// GnRH3
		// GnRH4
		// GnRH5
		// GnRH6
		// GnRH7
		// GnRH8
		// GnRH9
		// GnRH10
		// GnRH11
		// GnRH12
		// GnRH13
		// E21
		// E22
		// E23
		// E24
		// E25
		// E26
		// E27
		// E28
		// E29
		// E210
		// E211
		// E212
		// E213
		// P41
		// P42
		// P43
		// P44
		// P45
		// P46
		// P47
		// P48
		// P49
		// P410
		// P411
		// P412
		// P413
		// USGRt1
		// USGRt2
		// USGRt3
		// USGRt4
		// USGRt5
		// USGRt6
		// USGRt7
		// USGRt8
		// USGRt9
		// USGRt10
		// USGRt11
		// USGRt12
		// USGRt13
		// USGLt1
		// USGLt2
		// USGLt3
		// USGLt4
		// USGLt5
		// USGLt6
		// USGLt7
		// USGLt8
		// USGLt9
		// USGLt10
		// USGLt11
		// USGLt12
		// USGLt13
		// EM1
		// EM2
		// EM3
		// EM4
		// EM5
		// EM6
		// EM7
		// EM8
		// EM9
		// EM10
		// EM11
		// EM12
		// EM13
		// Others1
		// Others2
		// Others3
		// Others4
		// Others5
		// Others6
		// Others7
		// Others8
		// Others9
		// Others10
		// Others11
		// Others12
		// Others13
		// DR1
		// DR2
		// DR3
		// DR4
		// DR5
		// DR6
		// DR7
		// DR8
		// DR9
		// DR10
		// DR11
		// DR12
		// DR13
		// DOCTORRESPONSIBLE
		// TidNo
		// Convert
		// Consultant
		// InseminatinTechnique
		// IndicationForART
		// Hysteroscopy
		// EndometrialScratching
		// TrialCannulation
		// CYCLETYPE
		// HRTCYCLE
		// OralEstrogenDosage
		// VaginalEstrogen
		// GCSF
		// ActivatedPRP
		// UCLcm
		// DATOFEMBRYOTRANSFER
		// DAYOFEMBRYOTRANSFER
		// NOOFEMBRYOSTHAWED
		// NOOFEMBRYOSTRANSFERRED
		// DAYOFEMBRYOS
		// CRYOPRESERVEDEMBRYOS
		// ViaAdmin
		// ViaStartDateTime
		// ViaDose
		// AllFreeze
		// TreatmentCancel
		// Reason
		// ProgesteroneAdmin
		// ProgesteroneStart
		// ProgesteroneDose
		// Projectron
		// StChDate14
		// StChDate15
		// StChDate16
		// StChDate17
		// StChDate18
		// StChDate19
		// StChDate20
		// StChDate21
		// StChDate22
		// StChDate23
		// StChDate24
		// StChDate25
		// CycleDay14
		// CycleDay15
		// CycleDay16
		// CycleDay17
		// CycleDay18
		// CycleDay19
		// CycleDay20
		// CycleDay21
		// CycleDay22
		// CycleDay23
		// CycleDay24
		// CycleDay25
		// StimulationDay14
		// StimulationDay15
		// StimulationDay16
		// StimulationDay17
		// StimulationDay18
		// StimulationDay19
		// StimulationDay20
		// StimulationDay21
		// StimulationDay22
		// StimulationDay23
		// StimulationDay24
		// StimulationDay25
		// Tablet14
		// Tablet15
		// Tablet16
		// Tablet17
		// Tablet18
		// Tablet19
		// Tablet20
		// Tablet21
		// Tablet22
		// Tablet23
		// Tablet24
		// Tablet25
		// RFSH14
		// RFSH15
		// RFSH16
		// RFSH17
		// RFSH18
		// RFSH19
		// RFSH20
		// RFSH21
		// RFSH22
		// RFSH23
		// RFSH24
		// RFSH25
		// HMG14
		// HMG15
		// HMG16
		// HMG17
		// HMG18
		// HMG19
		// HMG20
		// HMG21
		// HMG22
		// HMG23
		// HMG24
		// HMG25
		// GnRH14
		// GnRH15
		// GnRH16
		// GnRH17
		// GnRH18
		// GnRH19
		// GnRH20
		// GnRH21
		// GnRH22
		// GnRH23
		// GnRH24
		// GnRH25
		// P414
		// P415
		// P416
		// P417
		// P418
		// P419
		// P420
		// P421
		// P422
		// P423
		// P424
		// P425
		// USGRt14
		// USGRt15
		// USGRt16
		// USGRt17
		// USGRt18
		// USGRt19
		// USGRt20
		// USGRt21
		// USGRt22
		// USGRt23
		// USGRt24
		// USGRt25
		// USGLt14
		// USGLt15
		// USGLt16
		// USGLt17
		// USGLt18
		// USGLt19
		// USGLt20
		// USGLt21
		// USGLt22
		// USGLt23
		// USGLt24
		// USGLt25
		// EM14
		// EM15
		// EM16
		// EM17
		// EM18
		// EM19
		// EM20
		// EM21
		// EM22
		// EM23
		// EM24
		// EM25
		// Others14
		// Others15
		// Others16
		// Others17
		// Others18
		// Others19
		// Others20
		// Others21
		// Others22
		// Others23
		// Others24
		// Others25
		// DR14
		// DR15
		// DR16
		// DR17
		// DR18
		// DR19
		// DR20
		// DR21
		// DR22
		// DR23
		// DR24
		// DR25
		// E214
		// E215
		// E216
		// E217
		// E218
		// E219
		// E220
		// E221
		// E222
		// E223
		// E224
		// E225
		// EEETTTDTE
		// bhcgdate
		// TUBAL_PATENCY
		// HSG
		// DHL
		// UTERINE_PROBLEMS
		// W_COMORBIDS
		// H_COMORBIDS
		// SEXUAL_DYSFUNCTION
		// TABLETS
		// FOLLICLE_STATUS
		// NUMBER_OF_IUI
		// PROCEDURE
		// LUTEAL_SUPPORT
		// SPECIFIC_MATERNAL_PROBLEMS
		// ONGOING_PREG
		// EDD_Date

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

			// ARTCycle
			if (strval($this->ARTCycle->CurrentValue) != "") {
				$this->ARTCycle->ViewValue = $this->ARTCycle->optionCaption($this->ARTCycle->CurrentValue);
			} else {
				$this->ARTCycle->ViewValue = NULL;
			}
			$this->ARTCycle->ViewCustomAttributes = "";

			// FemaleFactor
			if (strval($this->FemaleFactor->CurrentValue) != "") {
				$this->FemaleFactor->ViewValue = $this->FemaleFactor->optionCaption($this->FemaleFactor->CurrentValue);
			} else {
				$this->FemaleFactor->ViewValue = NULL;
			}
			$this->FemaleFactor->ViewCustomAttributes = "";

			// MaleFactor
			if (strval($this->MaleFactor->CurrentValue) != "") {
				$this->MaleFactor->ViewValue = $this->MaleFactor->optionCaption($this->MaleFactor->CurrentValue);
			} else {
				$this->MaleFactor->ViewValue = NULL;
			}
			$this->MaleFactor->ViewCustomAttributes = "";

			// Protocol
			if (strval($this->Protocol->CurrentValue) != "") {
				$this->Protocol->ViewValue = $this->Protocol->optionCaption($this->Protocol->CurrentValue);
			} else {
				$this->Protocol->ViewValue = NULL;
			}
			$this->Protocol->ViewCustomAttributes = "";

			// SemenFrozen
			if (strval($this->SemenFrozen->CurrentValue) != "") {
				$this->SemenFrozen->ViewValue = $this->SemenFrozen->optionCaption($this->SemenFrozen->CurrentValue);
			} else {
				$this->SemenFrozen->ViewValue = NULL;
			}
			$this->SemenFrozen->ViewCustomAttributes = "";

			// A4ICSICycle
			if (strval($this->A4ICSICycle->CurrentValue) != "") {
				$this->A4ICSICycle->ViewValue = $this->A4ICSICycle->optionCaption($this->A4ICSICycle->CurrentValue);
			} else {
				$this->A4ICSICycle->ViewValue = NULL;
			}
			$this->A4ICSICycle->ViewCustomAttributes = "";

			// TotalICSICycle
			if (strval($this->TotalICSICycle->CurrentValue) != "") {
				$this->TotalICSICycle->ViewValue = $this->TotalICSICycle->optionCaption($this->TotalICSICycle->CurrentValue);
			} else {
				$this->TotalICSICycle->ViewValue = NULL;
			}
			$this->TotalICSICycle->ViewCustomAttributes = "";

			// TypeOfInfertility
			if (strval($this->TypeOfInfertility->CurrentValue) != "") {
				$this->TypeOfInfertility->ViewValue = $this->TypeOfInfertility->optionCaption($this->TypeOfInfertility->CurrentValue);
			} else {
				$this->TypeOfInfertility->ViewValue = NULL;
			}
			$this->TypeOfInfertility->ViewCustomAttributes = "";

			// Duration
			$this->Duration->ViewValue = $this->Duration->CurrentValue;
			$this->Duration->ViewCustomAttributes = "";

			// LMP
			$this->LMP->ViewValue = $this->LMP->CurrentValue;
			$this->LMP->ViewValue = FormatDateTime($this->LMP->ViewValue, 7);
			$this->LMP->ViewCustomAttributes = "";

			// RelevantHistory
			$this->RelevantHistory->ViewValue = $this->RelevantHistory->CurrentValue;
			$this->RelevantHistory->ViewCustomAttributes = "";

			// IUICycles
			$this->IUICycles->ViewValue = $this->IUICycles->CurrentValue;
			$this->IUICycles->ViewCustomAttributes = "";

			// AFC
			$this->AFC->ViewValue = $this->AFC->CurrentValue;
			$this->AFC->ViewCustomAttributes = "";

			// AMH
			$this->AMH->ViewValue = $this->AMH->CurrentValue;
			$this->AMH->ViewCustomAttributes = "";

			// FBMI
			$this->FBMI->ViewValue = $this->FBMI->CurrentValue;
			$this->FBMI->ViewCustomAttributes = "";

			// MBMI
			$this->MBMI->ViewValue = $this->MBMI->CurrentValue;
			$this->MBMI->ViewCustomAttributes = "";

			// OvarianVolumeRT
			$this->OvarianVolumeRT->ViewValue = $this->OvarianVolumeRT->CurrentValue;
			$this->OvarianVolumeRT->ViewCustomAttributes = "";

			// OvarianVolumeLT
			$this->OvarianVolumeLT->ViewValue = $this->OvarianVolumeLT->CurrentValue;
			$this->OvarianVolumeLT->ViewCustomAttributes = "";

			// DAYSOFSTIMULATION
			$this->DAYSOFSTIMULATION->ViewValue = $this->DAYSOFSTIMULATION->CurrentValue;
			$this->DAYSOFSTIMULATION->ViewCustomAttributes = "";

			// DOSEOFGONADOTROPINS
			$this->DOSEOFGONADOTROPINS->ViewValue = $this->DOSEOFGONADOTROPINS->CurrentValue;
			$this->DOSEOFGONADOTROPINS->ViewCustomAttributes = "";

			// INJTYPE
			$curVal = strval($this->INJTYPE->CurrentValue);
			if ($curVal != "") {
				$this->INJTYPE->ViewValue = $this->INJTYPE->lookupCacheOption($curVal);
				if ($this->INJTYPE->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->INJTYPE->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->INJTYPE->ViewValue = $this->INJTYPE->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->INJTYPE->ViewValue = $this->INJTYPE->CurrentValue;
					}
				}
			} else {
				$this->INJTYPE->ViewValue = NULL;
			}
			$this->INJTYPE->ViewCustomAttributes = "";

			// ANTAGONISTDAYS
			$this->ANTAGONISTDAYS->ViewValue = $this->ANTAGONISTDAYS->CurrentValue;
			$this->ANTAGONISTDAYS->ViewCustomAttributes = "";

			// ANTAGONISTSTARTDAY
			if (strval($this->ANTAGONISTSTARTDAY->CurrentValue) != "") {
				$this->ANTAGONISTSTARTDAY->ViewValue = $this->ANTAGONISTSTARTDAY->optionCaption($this->ANTAGONISTSTARTDAY->CurrentValue);
			} else {
				$this->ANTAGONISTSTARTDAY->ViewValue = NULL;
			}
			$this->ANTAGONISTSTARTDAY->ViewCustomAttributes = "";

			// GROWTHHORMONE
			$this->GROWTHHORMONE->ViewValue = $this->GROWTHHORMONE->CurrentValue;
			$this->GROWTHHORMONE->ViewCustomAttributes = "";

			// PRETREATMENT
			if (strval($this->PRETREATMENT->CurrentValue) != "") {
				$this->PRETREATMENT->ViewValue = $this->PRETREATMENT->optionCaption($this->PRETREATMENT->CurrentValue);
			} else {
				$this->PRETREATMENT->ViewValue = NULL;
			}
			$this->PRETREATMENT->ViewCustomAttributes = "";

			// SerumP4
			$this->SerumP4->ViewValue = $this->SerumP4->CurrentValue;
			$this->SerumP4->ViewCustomAttributes = "";

			// FORT
			$this->FORT->ViewValue = $this->FORT->CurrentValue;
			$this->FORT->ViewCustomAttributes = "";

			// MedicalFactors
			if (strval($this->MedicalFactors->CurrentValue) != "") {
				$this->MedicalFactors->ViewValue = $this->MedicalFactors->optionCaption($this->MedicalFactors->CurrentValue);
			} else {
				$this->MedicalFactors->ViewValue = NULL;
			}
			$this->MedicalFactors->ViewCustomAttributes = "";

			// SCDate
			$this->SCDate->ViewValue = $this->SCDate->CurrentValue;
			$this->SCDate->ViewValue = FormatDateTime($this->SCDate->ViewValue, 7);
			$this->SCDate->ViewCustomAttributes = "";

			// OvarianSurgery
			$this->OvarianSurgery->ViewValue = $this->OvarianSurgery->CurrentValue;
			$this->OvarianSurgery->ViewCustomAttributes = "";

			// PreProcedureOrder
			$this->PreProcedureOrder->ViewValue = $this->PreProcedureOrder->CurrentValue;
			$this->PreProcedureOrder->ViewCustomAttributes = "";

			// TRIGGERR
			$curVal = strval($this->TRIGGERR->CurrentValue);
			if ($curVal != "") {
				$this->TRIGGERR->ViewValue = $this->TRIGGERR->lookupCacheOption($curVal);
				if ($this->TRIGGERR->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->TRIGGERR->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->TRIGGERR->ViewValue = $this->TRIGGERR->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->TRIGGERR->ViewValue = $this->TRIGGERR->CurrentValue;
					}
				}
			} else {
				$this->TRIGGERR->ViewValue = NULL;
			}
			$this->TRIGGERR->ViewCustomAttributes = "";

			// TRIGGERDATE
			$this->TRIGGERDATE->ViewValue = $this->TRIGGERDATE->CurrentValue;
			$this->TRIGGERDATE->ViewValue = FormatDateTime($this->TRIGGERDATE->ViewValue, 11);
			$this->TRIGGERDATE->ViewCustomAttributes = "";

			// ATHOMEorCLINIC
			$this->ATHOMEorCLINIC->ViewValue = $this->ATHOMEorCLINIC->CurrentValue;
			$this->ATHOMEorCLINIC->ViewCustomAttributes = "";

			// OPUDATE
			$this->OPUDATE->ViewValue = $this->OPUDATE->CurrentValue;
			$this->OPUDATE->ViewValue = FormatDateTime($this->OPUDATE->ViewValue, 11);
			$this->OPUDATE->ViewCustomAttributes = "";

			// ALLFREEZEINDICATION
			if (strval($this->ALLFREEZEINDICATION->CurrentValue) != "") {
				$this->ALLFREEZEINDICATION->ViewValue = $this->ALLFREEZEINDICATION->optionCaption($this->ALLFREEZEINDICATION->CurrentValue);
			} else {
				$this->ALLFREEZEINDICATION->ViewValue = NULL;
			}
			$this->ALLFREEZEINDICATION->ViewCustomAttributes = "";

			// ERA
			if (strval($this->ERA->CurrentValue) != "") {
				$this->ERA->ViewValue = $this->ERA->optionCaption($this->ERA->CurrentValue);
			} else {
				$this->ERA->ViewValue = NULL;
			}
			$this->ERA->ViewCustomAttributes = "";

			// PGTA
			$this->PGTA->ViewValue = $this->PGTA->CurrentValue;
			$this->PGTA->ViewCustomAttributes = "";

			// PGD
			$this->PGD->ViewValue = $this->PGD->CurrentValue;
			$this->PGD->ViewCustomAttributes = "";

			// DATEOFET
			$this->DATEOFET->ViewValue = $this->DATEOFET->CurrentValue;
			$this->DATEOFET->ViewValue = FormatDateTime($this->DATEOFET->ViewValue, 11);
			$this->DATEOFET->ViewCustomAttributes = "";

			// ET
			if (strval($this->ET->CurrentValue) != "") {
				$this->ET->ViewValue = $this->ET->optionCaption($this->ET->CurrentValue);
			} else {
				$this->ET->ViewValue = NULL;
			}
			$this->ET->ViewCustomAttributes = "";

			// ESET
			$this->ESET->ViewValue = $this->ESET->CurrentValue;
			$this->ESET->ViewCustomAttributes = "";

			// DOET
			$this->DOET->ViewValue = $this->DOET->CurrentValue;
			$this->DOET->ViewCustomAttributes = "";

			// SEMENPREPARATION
			if (strval($this->SEMENPREPARATION->CurrentValue) != "") {
				$this->SEMENPREPARATION->ViewValue = $this->SEMENPREPARATION->optionCaption($this->SEMENPREPARATION->CurrentValue);
			} else {
				$this->SEMENPREPARATION->ViewValue = NULL;
			}
			$this->SEMENPREPARATION->ViewCustomAttributes = "";

			// REASONFORESET
			if (strval($this->REASONFORESET->CurrentValue) != "") {
				$this->REASONFORESET->ViewValue = $this->REASONFORESET->optionCaption($this->REASONFORESET->CurrentValue);
			} else {
				$this->REASONFORESET->ViewValue = NULL;
			}
			$this->REASONFORESET->ViewCustomAttributes = "";

			// Expectedoocytes
			$this->Expectedoocytes->ViewValue = $this->Expectedoocytes->CurrentValue;
			$this->Expectedoocytes->ViewCustomAttributes = "";

			// StChDate1
			$this->StChDate1->ViewValue = $this->StChDate1->CurrentValue;
			$this->StChDate1->ViewValue = FormatDateTime($this->StChDate1->ViewValue, 7);
			$this->StChDate1->ViewCustomAttributes = "";

			// StChDate2
			$this->StChDate2->ViewValue = $this->StChDate2->CurrentValue;
			$this->StChDate2->ViewValue = FormatDateTime($this->StChDate2->ViewValue, 7);
			$this->StChDate2->ViewCustomAttributes = "";

			// StChDate3
			$this->StChDate3->ViewValue = $this->StChDate3->CurrentValue;
			$this->StChDate3->ViewValue = FormatDateTime($this->StChDate3->ViewValue, 7);
			$this->StChDate3->ViewCustomAttributes = "";

			// StChDate4
			$this->StChDate4->ViewValue = $this->StChDate4->CurrentValue;
			$this->StChDate4->ViewValue = FormatDateTime($this->StChDate4->ViewValue, 7);
			$this->StChDate4->ViewCustomAttributes = "";

			// StChDate5
			$this->StChDate5->ViewValue = $this->StChDate5->CurrentValue;
			$this->StChDate5->ViewValue = FormatDateTime($this->StChDate5->ViewValue, 7);
			$this->StChDate5->ViewCustomAttributes = "";

			// StChDate6
			$this->StChDate6->ViewValue = $this->StChDate6->CurrentValue;
			$this->StChDate6->ViewValue = FormatDateTime($this->StChDate6->ViewValue, 7);
			$this->StChDate6->ViewCustomAttributes = "";

			// StChDate7
			$this->StChDate7->ViewValue = $this->StChDate7->CurrentValue;
			$this->StChDate7->ViewValue = FormatDateTime($this->StChDate7->ViewValue, 7);
			$this->StChDate7->ViewCustomAttributes = "";

			// StChDate8
			$this->StChDate8->ViewValue = $this->StChDate8->CurrentValue;
			$this->StChDate8->ViewValue = FormatDateTime($this->StChDate8->ViewValue, 7);
			$this->StChDate8->ViewCustomAttributes = "";

			// StChDate9
			$this->StChDate9->ViewValue = $this->StChDate9->CurrentValue;
			$this->StChDate9->ViewValue = FormatDateTime($this->StChDate9->ViewValue, 7);
			$this->StChDate9->ViewCustomAttributes = "";

			// StChDate10
			$this->StChDate10->ViewValue = $this->StChDate10->CurrentValue;
			$this->StChDate10->ViewValue = FormatDateTime($this->StChDate10->ViewValue, 7);
			$this->StChDate10->ViewCustomAttributes = "";

			// StChDate11
			$this->StChDate11->ViewValue = $this->StChDate11->CurrentValue;
			$this->StChDate11->ViewValue = FormatDateTime($this->StChDate11->ViewValue, 7);
			$this->StChDate11->ViewCustomAttributes = "";

			// StChDate12
			$this->StChDate12->ViewValue = $this->StChDate12->CurrentValue;
			$this->StChDate12->ViewValue = FormatDateTime($this->StChDate12->ViewValue, 7);
			$this->StChDate12->ViewCustomAttributes = "";

			// StChDate13
			$this->StChDate13->ViewValue = $this->StChDate13->CurrentValue;
			$this->StChDate13->ViewValue = FormatDateTime($this->StChDate13->ViewValue, 7);
			$this->StChDate13->ViewCustomAttributes = "";

			// CycleDay1
			$this->CycleDay1->ViewValue = $this->CycleDay1->CurrentValue;
			$this->CycleDay1->ViewCustomAttributes = "";

			// CycleDay2
			$this->CycleDay2->ViewValue = $this->CycleDay2->CurrentValue;
			$this->CycleDay2->ViewCustomAttributes = "";

			// CycleDay3
			$this->CycleDay3->ViewValue = $this->CycleDay3->CurrentValue;
			$this->CycleDay3->ViewCustomAttributes = "";

			// CycleDay4
			$this->CycleDay4->ViewValue = $this->CycleDay4->CurrentValue;
			$this->CycleDay4->ViewCustomAttributes = "";

			// CycleDay5
			$this->CycleDay5->ViewValue = $this->CycleDay5->CurrentValue;
			$this->CycleDay5->ViewCustomAttributes = "";

			// CycleDay6
			$this->CycleDay6->ViewValue = $this->CycleDay6->CurrentValue;
			$this->CycleDay6->ViewCustomAttributes = "";

			// CycleDay7
			$this->CycleDay7->ViewValue = $this->CycleDay7->CurrentValue;
			$this->CycleDay7->ViewCustomAttributes = "";

			// CycleDay8
			$this->CycleDay8->ViewValue = $this->CycleDay8->CurrentValue;
			$this->CycleDay8->ViewCustomAttributes = "";

			// CycleDay9
			$this->CycleDay9->ViewValue = $this->CycleDay9->CurrentValue;
			$this->CycleDay9->ViewCustomAttributes = "";

			// CycleDay10
			$this->CycleDay10->ViewValue = $this->CycleDay10->CurrentValue;
			$this->CycleDay10->ViewCustomAttributes = "";

			// CycleDay11
			$this->CycleDay11->ViewValue = $this->CycleDay11->CurrentValue;
			$this->CycleDay11->ViewCustomAttributes = "";

			// CycleDay12
			$this->CycleDay12->ViewValue = $this->CycleDay12->CurrentValue;
			$this->CycleDay12->ViewCustomAttributes = "";

			// CycleDay13
			$this->CycleDay13->ViewValue = $this->CycleDay13->CurrentValue;
			$this->CycleDay13->ViewCustomAttributes = "";

			// StimulationDay1
			$this->StimulationDay1->ViewValue = $this->StimulationDay1->CurrentValue;
			$this->StimulationDay1->ViewCustomAttributes = "";

			// StimulationDay2
			$this->StimulationDay2->ViewValue = $this->StimulationDay2->CurrentValue;
			$this->StimulationDay2->ViewCustomAttributes = "";

			// StimulationDay3
			$this->StimulationDay3->ViewValue = $this->StimulationDay3->CurrentValue;
			$this->StimulationDay3->ViewCustomAttributes = "";

			// StimulationDay4
			$this->StimulationDay4->ViewValue = $this->StimulationDay4->CurrentValue;
			$this->StimulationDay4->ViewCustomAttributes = "";

			// StimulationDay5
			$this->StimulationDay5->ViewValue = $this->StimulationDay5->CurrentValue;
			$this->StimulationDay5->ViewCustomAttributes = "";

			// StimulationDay6
			$this->StimulationDay6->ViewValue = $this->StimulationDay6->CurrentValue;
			$this->StimulationDay6->ViewCustomAttributes = "";

			// StimulationDay7
			$this->StimulationDay7->ViewValue = $this->StimulationDay7->CurrentValue;
			$this->StimulationDay7->ViewCustomAttributes = "";

			// StimulationDay8
			$this->StimulationDay8->ViewValue = $this->StimulationDay8->CurrentValue;
			$this->StimulationDay8->ViewCustomAttributes = "";

			// StimulationDay9
			$this->StimulationDay9->ViewValue = $this->StimulationDay9->CurrentValue;
			$this->StimulationDay9->ViewCustomAttributes = "";

			// StimulationDay10
			$this->StimulationDay10->ViewValue = $this->StimulationDay10->CurrentValue;
			$this->StimulationDay10->ViewCustomAttributes = "";

			// StimulationDay11
			$this->StimulationDay11->ViewValue = $this->StimulationDay11->CurrentValue;
			$this->StimulationDay11->ViewCustomAttributes = "";

			// StimulationDay12
			$this->StimulationDay12->ViewValue = $this->StimulationDay12->CurrentValue;
			$this->StimulationDay12->ViewCustomAttributes = "";

			// StimulationDay13
			$this->StimulationDay13->ViewValue = $this->StimulationDay13->CurrentValue;
			$this->StimulationDay13->ViewCustomAttributes = "";

			// Tablet1
			$curVal = strval($this->Tablet1->CurrentValue);
			if ($curVal != "") {
				$this->Tablet1->ViewValue = $this->Tablet1->lookupCacheOption($curVal);
				if ($this->Tablet1->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->Tablet1->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->Tablet1->ViewValue = $this->Tablet1->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->Tablet1->ViewValue = $this->Tablet1->CurrentValue;
					}
				}
			} else {
				$this->Tablet1->ViewValue = NULL;
			}
			$this->Tablet1->ViewCustomAttributes = "";

			// Tablet2
			$curVal = strval($this->Tablet2->CurrentValue);
			if ($curVal != "") {
				$this->Tablet2->ViewValue = $this->Tablet2->lookupCacheOption($curVal);
				if ($this->Tablet2->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->Tablet2->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->Tablet2->ViewValue = $this->Tablet2->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->Tablet2->ViewValue = $this->Tablet2->CurrentValue;
					}
				}
			} else {
				$this->Tablet2->ViewValue = NULL;
			}
			$this->Tablet2->ViewCustomAttributes = "";

			// Tablet3
			$curVal = strval($this->Tablet3->CurrentValue);
			if ($curVal != "") {
				$this->Tablet3->ViewValue = $this->Tablet3->lookupCacheOption($curVal);
				if ($this->Tablet3->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->Tablet3->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->Tablet3->ViewValue = $this->Tablet3->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->Tablet3->ViewValue = $this->Tablet3->CurrentValue;
					}
				}
			} else {
				$this->Tablet3->ViewValue = NULL;
			}
			$this->Tablet3->ViewCustomAttributes = "";

			// Tablet4
			$curVal = strval($this->Tablet4->CurrentValue);
			if ($curVal != "") {
				$this->Tablet4->ViewValue = $this->Tablet4->lookupCacheOption($curVal);
				if ($this->Tablet4->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->Tablet4->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->Tablet4->ViewValue = $this->Tablet4->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->Tablet4->ViewValue = $this->Tablet4->CurrentValue;
					}
				}
			} else {
				$this->Tablet4->ViewValue = NULL;
			}
			$this->Tablet4->ViewCustomAttributes = "";

			// Tablet5
			$curVal = strval($this->Tablet5->CurrentValue);
			if ($curVal != "") {
				$this->Tablet5->ViewValue = $this->Tablet5->lookupCacheOption($curVal);
				if ($this->Tablet5->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->Tablet5->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->Tablet5->ViewValue = $this->Tablet5->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->Tablet5->ViewValue = $this->Tablet5->CurrentValue;
					}
				}
			} else {
				$this->Tablet5->ViewValue = NULL;
			}
			$this->Tablet5->ViewCustomAttributes = "";

			// Tablet6
			$curVal = strval($this->Tablet6->CurrentValue);
			if ($curVal != "") {
				$this->Tablet6->ViewValue = $this->Tablet6->lookupCacheOption($curVal);
				if ($this->Tablet6->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->Tablet6->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->Tablet6->ViewValue = $this->Tablet6->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->Tablet6->ViewValue = $this->Tablet6->CurrentValue;
					}
				}
			} else {
				$this->Tablet6->ViewValue = NULL;
			}
			$this->Tablet6->ViewCustomAttributes = "";

			// Tablet7
			$curVal = strval($this->Tablet7->CurrentValue);
			if ($curVal != "") {
				$this->Tablet7->ViewValue = $this->Tablet7->lookupCacheOption($curVal);
				if ($this->Tablet7->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->Tablet7->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->Tablet7->ViewValue = $this->Tablet7->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->Tablet7->ViewValue = $this->Tablet7->CurrentValue;
					}
				}
			} else {
				$this->Tablet7->ViewValue = NULL;
			}
			$this->Tablet7->ViewCustomAttributes = "";

			// Tablet8
			$curVal = strval($this->Tablet8->CurrentValue);
			if ($curVal != "") {
				$this->Tablet8->ViewValue = $this->Tablet8->lookupCacheOption($curVal);
				if ($this->Tablet8->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->Tablet8->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->Tablet8->ViewValue = $this->Tablet8->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->Tablet8->ViewValue = $this->Tablet8->CurrentValue;
					}
				}
			} else {
				$this->Tablet8->ViewValue = NULL;
			}
			$this->Tablet8->ViewCustomAttributes = "";

			// Tablet9
			$curVal = strval($this->Tablet9->CurrentValue);
			if ($curVal != "") {
				$this->Tablet9->ViewValue = $this->Tablet9->lookupCacheOption($curVal);
				if ($this->Tablet9->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->Tablet9->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->Tablet9->ViewValue = $this->Tablet9->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->Tablet9->ViewValue = $this->Tablet9->CurrentValue;
					}
				}
			} else {
				$this->Tablet9->ViewValue = NULL;
			}
			$this->Tablet9->ViewCustomAttributes = "";

			// Tablet10
			$curVal = strval($this->Tablet10->CurrentValue);
			if ($curVal != "") {
				$this->Tablet10->ViewValue = $this->Tablet10->lookupCacheOption($curVal);
				if ($this->Tablet10->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->Tablet10->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->Tablet10->ViewValue = $this->Tablet10->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->Tablet10->ViewValue = $this->Tablet10->CurrentValue;
					}
				}
			} else {
				$this->Tablet10->ViewValue = NULL;
			}
			$this->Tablet10->ViewCustomAttributes = "";

			// Tablet11
			$curVal = strval($this->Tablet11->CurrentValue);
			if ($curVal != "") {
				$this->Tablet11->ViewValue = $this->Tablet11->lookupCacheOption($curVal);
				if ($this->Tablet11->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->Tablet11->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->Tablet11->ViewValue = $this->Tablet11->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->Tablet11->ViewValue = $this->Tablet11->CurrentValue;
					}
				}
			} else {
				$this->Tablet11->ViewValue = NULL;
			}
			$this->Tablet11->ViewCustomAttributes = "";

			// Tablet12
			$curVal = strval($this->Tablet12->CurrentValue);
			if ($curVal != "") {
				$this->Tablet12->ViewValue = $this->Tablet12->lookupCacheOption($curVal);
				if ($this->Tablet12->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->Tablet12->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->Tablet12->ViewValue = $this->Tablet12->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->Tablet12->ViewValue = $this->Tablet12->CurrentValue;
					}
				}
			} else {
				$this->Tablet12->ViewValue = NULL;
			}
			$this->Tablet12->ViewCustomAttributes = "";

			// Tablet13
			$curVal = strval($this->Tablet13->CurrentValue);
			if ($curVal != "") {
				$this->Tablet13->ViewValue = $this->Tablet13->lookupCacheOption($curVal);
				if ($this->Tablet13->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->Tablet13->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->Tablet13->ViewValue = $this->Tablet13->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->Tablet13->ViewValue = $this->Tablet13->CurrentValue;
					}
				}
			} else {
				$this->Tablet13->ViewValue = NULL;
			}
			$this->Tablet13->ViewCustomAttributes = "";

			// RFSH1
			$curVal = strval($this->RFSH1->CurrentValue);
			if ($curVal != "") {
				$this->RFSH1->ViewValue = $this->RFSH1->lookupCacheOption($curVal);
				if ($this->RFSH1->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->RFSH1->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->RFSH1->ViewValue = $this->RFSH1->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->RFSH1->ViewValue = $this->RFSH1->CurrentValue;
					}
				}
			} else {
				$this->RFSH1->ViewValue = NULL;
			}
			$this->RFSH1->ViewCustomAttributes = "";

			// RFSH2
			$curVal = strval($this->RFSH2->CurrentValue);
			if ($curVal != "") {
				$this->RFSH2->ViewValue = $this->RFSH2->lookupCacheOption($curVal);
				if ($this->RFSH2->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->RFSH2->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->RFSH2->ViewValue = $this->RFSH2->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->RFSH2->ViewValue = $this->RFSH2->CurrentValue;
					}
				}
			} else {
				$this->RFSH2->ViewValue = NULL;
			}
			$this->RFSH2->ViewCustomAttributes = "";

			// RFSH3
			$curVal = strval($this->RFSH3->CurrentValue);
			if ($curVal != "") {
				$this->RFSH3->ViewValue = $this->RFSH3->lookupCacheOption($curVal);
				if ($this->RFSH3->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->RFSH3->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->RFSH3->ViewValue = $this->RFSH3->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->RFSH3->ViewValue = $this->RFSH3->CurrentValue;
					}
				}
			} else {
				$this->RFSH3->ViewValue = NULL;
			}
			$this->RFSH3->ViewCustomAttributes = "";

			// RFSH4
			$curVal = strval($this->RFSH4->CurrentValue);
			if ($curVal != "") {
				$this->RFSH4->ViewValue = $this->RFSH4->lookupCacheOption($curVal);
				if ($this->RFSH4->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->RFSH4->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->RFSH4->ViewValue = $this->RFSH4->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->RFSH4->ViewValue = $this->RFSH4->CurrentValue;
					}
				}
			} else {
				$this->RFSH4->ViewValue = NULL;
			}
			$this->RFSH4->ViewCustomAttributes = "";

			// RFSH5
			$curVal = strval($this->RFSH5->CurrentValue);
			if ($curVal != "") {
				$this->RFSH5->ViewValue = $this->RFSH5->lookupCacheOption($curVal);
				if ($this->RFSH5->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->RFSH5->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->RFSH5->ViewValue = $this->RFSH5->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->RFSH5->ViewValue = $this->RFSH5->CurrentValue;
					}
				}
			} else {
				$this->RFSH5->ViewValue = NULL;
			}
			$this->RFSH5->ViewCustomAttributes = "";

			// RFSH6
			$curVal = strval($this->RFSH6->CurrentValue);
			if ($curVal != "") {
				$this->RFSH6->ViewValue = $this->RFSH6->lookupCacheOption($curVal);
				if ($this->RFSH6->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->RFSH6->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->RFSH6->ViewValue = $this->RFSH6->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->RFSH6->ViewValue = $this->RFSH6->CurrentValue;
					}
				}
			} else {
				$this->RFSH6->ViewValue = NULL;
			}
			$this->RFSH6->ViewCustomAttributes = "";

			// RFSH7
			$curVal = strval($this->RFSH7->CurrentValue);
			if ($curVal != "") {
				$this->RFSH7->ViewValue = $this->RFSH7->lookupCacheOption($curVal);
				if ($this->RFSH7->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->RFSH7->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->RFSH7->ViewValue = $this->RFSH7->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->RFSH7->ViewValue = $this->RFSH7->CurrentValue;
					}
				}
			} else {
				$this->RFSH7->ViewValue = NULL;
			}
			$this->RFSH7->ViewCustomAttributes = "";

			// RFSH8
			$curVal = strval($this->RFSH8->CurrentValue);
			if ($curVal != "") {
				$this->RFSH8->ViewValue = $this->RFSH8->lookupCacheOption($curVal);
				if ($this->RFSH8->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->RFSH8->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->RFSH8->ViewValue = $this->RFSH8->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->RFSH8->ViewValue = $this->RFSH8->CurrentValue;
					}
				}
			} else {
				$this->RFSH8->ViewValue = NULL;
			}
			$this->RFSH8->ViewCustomAttributes = "";

			// RFSH9
			$curVal = strval($this->RFSH9->CurrentValue);
			if ($curVal != "") {
				$this->RFSH9->ViewValue = $this->RFSH9->lookupCacheOption($curVal);
				if ($this->RFSH9->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->RFSH9->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->RFSH9->ViewValue = $this->RFSH9->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->RFSH9->ViewValue = $this->RFSH9->CurrentValue;
					}
				}
			} else {
				$this->RFSH9->ViewValue = NULL;
			}
			$this->RFSH9->ViewCustomAttributes = "";

			// RFSH10
			$curVal = strval($this->RFSH10->CurrentValue);
			if ($curVal != "") {
				$this->RFSH10->ViewValue = $this->RFSH10->lookupCacheOption($curVal);
				if ($this->RFSH10->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->RFSH10->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->RFSH10->ViewValue = $this->RFSH10->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->RFSH10->ViewValue = $this->RFSH10->CurrentValue;
					}
				}
			} else {
				$this->RFSH10->ViewValue = NULL;
			}
			$this->RFSH10->ViewCustomAttributes = "";

			// RFSH11
			$curVal = strval($this->RFSH11->CurrentValue);
			if ($curVal != "") {
				$this->RFSH11->ViewValue = $this->RFSH11->lookupCacheOption($curVal);
				if ($this->RFSH11->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->RFSH11->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->RFSH11->ViewValue = $this->RFSH11->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->RFSH11->ViewValue = $this->RFSH11->CurrentValue;
					}
				}
			} else {
				$this->RFSH11->ViewValue = NULL;
			}
			$this->RFSH11->ViewCustomAttributes = "";

			// RFSH12
			$curVal = strval($this->RFSH12->CurrentValue);
			if ($curVal != "") {
				$this->RFSH12->ViewValue = $this->RFSH12->lookupCacheOption($curVal);
				if ($this->RFSH12->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->RFSH12->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->RFSH12->ViewValue = $this->RFSH12->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->RFSH12->ViewValue = $this->RFSH12->CurrentValue;
					}
				}
			} else {
				$this->RFSH12->ViewValue = NULL;
			}
			$this->RFSH12->ViewCustomAttributes = "";

			// RFSH13
			$curVal = strval($this->RFSH13->CurrentValue);
			if ($curVal != "") {
				$this->RFSH13->ViewValue = $this->RFSH13->lookupCacheOption($curVal);
				if ($this->RFSH13->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->RFSH13->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->RFSH13->ViewValue = $this->RFSH13->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->RFSH13->ViewValue = $this->RFSH13->CurrentValue;
					}
				}
			} else {
				$this->RFSH13->ViewValue = NULL;
			}
			$this->RFSH13->ViewCustomAttributes = "";

			// HMG1
			$curVal = strval($this->HMG1->CurrentValue);
			if ($curVal != "") {
				$this->HMG1->ViewValue = $this->HMG1->lookupCacheOption($curVal);
				if ($this->HMG1->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->HMG1->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->HMG1->ViewValue = $this->HMG1->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->HMG1->ViewValue = $this->HMG1->CurrentValue;
					}
				}
			} else {
				$this->HMG1->ViewValue = NULL;
			}
			$this->HMG1->ViewCustomAttributes = "";

			// HMG2
			$curVal = strval($this->HMG2->CurrentValue);
			if ($curVal != "") {
				$this->HMG2->ViewValue = $this->HMG2->lookupCacheOption($curVal);
				if ($this->HMG2->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->HMG2->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->HMG2->ViewValue = $this->HMG2->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->HMG2->ViewValue = $this->HMG2->CurrentValue;
					}
				}
			} else {
				$this->HMG2->ViewValue = NULL;
			}
			$this->HMG2->ViewCustomAttributes = "";

			// HMG3
			$curVal = strval($this->HMG3->CurrentValue);
			if ($curVal != "") {
				$this->HMG3->ViewValue = $this->HMG3->lookupCacheOption($curVal);
				if ($this->HMG3->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->HMG3->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->HMG3->ViewValue = $this->HMG3->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->HMG3->ViewValue = $this->HMG3->CurrentValue;
					}
				}
			} else {
				$this->HMG3->ViewValue = NULL;
			}
			$this->HMG3->ViewCustomAttributes = "";

			// HMG4
			$curVal = strval($this->HMG4->CurrentValue);
			if ($curVal != "") {
				$this->HMG4->ViewValue = $this->HMG4->lookupCacheOption($curVal);
				if ($this->HMG4->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->HMG4->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->HMG4->ViewValue = $this->HMG4->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->HMG4->ViewValue = $this->HMG4->CurrentValue;
					}
				}
			} else {
				$this->HMG4->ViewValue = NULL;
			}
			$this->HMG4->ViewCustomAttributes = "";

			// HMG5
			$curVal = strval($this->HMG5->CurrentValue);
			if ($curVal != "") {
				$this->HMG5->ViewValue = $this->HMG5->lookupCacheOption($curVal);
				if ($this->HMG5->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->HMG5->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->HMG5->ViewValue = $this->HMG5->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->HMG5->ViewValue = $this->HMG5->CurrentValue;
					}
				}
			} else {
				$this->HMG5->ViewValue = NULL;
			}
			$this->HMG5->ViewCustomAttributes = "";

			// HMG6
			$curVal = strval($this->HMG6->CurrentValue);
			if ($curVal != "") {
				$this->HMG6->ViewValue = $this->HMG6->lookupCacheOption($curVal);
				if ($this->HMG6->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->HMG6->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->HMG6->ViewValue = $this->HMG6->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->HMG6->ViewValue = $this->HMG6->CurrentValue;
					}
				}
			} else {
				$this->HMG6->ViewValue = NULL;
			}
			$this->HMG6->ViewCustomAttributes = "";

			// HMG7
			$curVal = strval($this->HMG7->CurrentValue);
			if ($curVal != "") {
				$this->HMG7->ViewValue = $this->HMG7->lookupCacheOption($curVal);
				if ($this->HMG7->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->HMG7->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->HMG7->ViewValue = $this->HMG7->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->HMG7->ViewValue = $this->HMG7->CurrentValue;
					}
				}
			} else {
				$this->HMG7->ViewValue = NULL;
			}
			$this->HMG7->ViewCustomAttributes = "";

			// HMG8
			$curVal = strval($this->HMG8->CurrentValue);
			if ($curVal != "") {
				$this->HMG8->ViewValue = $this->HMG8->lookupCacheOption($curVal);
				if ($this->HMG8->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->HMG8->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->HMG8->ViewValue = $this->HMG8->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->HMG8->ViewValue = $this->HMG8->CurrentValue;
					}
				}
			} else {
				$this->HMG8->ViewValue = NULL;
			}
			$this->HMG8->ViewCustomAttributes = "";

			// HMG9
			$curVal = strval($this->HMG9->CurrentValue);
			if ($curVal != "") {
				$this->HMG9->ViewValue = $this->HMG9->lookupCacheOption($curVal);
				if ($this->HMG9->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->HMG9->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->HMG9->ViewValue = $this->HMG9->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->HMG9->ViewValue = $this->HMG9->CurrentValue;
					}
				}
			} else {
				$this->HMG9->ViewValue = NULL;
			}
			$this->HMG9->ViewCustomAttributes = "";

			// HMG10
			$curVal = strval($this->HMG10->CurrentValue);
			if ($curVal != "") {
				$this->HMG10->ViewValue = $this->HMG10->lookupCacheOption($curVal);
				if ($this->HMG10->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->HMG10->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->HMG10->ViewValue = $this->HMG10->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->HMG10->ViewValue = $this->HMG10->CurrentValue;
					}
				}
			} else {
				$this->HMG10->ViewValue = NULL;
			}
			$this->HMG10->ViewCustomAttributes = "";

			// HMG11
			$curVal = strval($this->HMG11->CurrentValue);
			if ($curVal != "") {
				$this->HMG11->ViewValue = $this->HMG11->lookupCacheOption($curVal);
				if ($this->HMG11->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->HMG11->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->HMG11->ViewValue = $this->HMG11->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->HMG11->ViewValue = $this->HMG11->CurrentValue;
					}
				}
			} else {
				$this->HMG11->ViewValue = NULL;
			}
			$this->HMG11->ViewCustomAttributes = "";

			// HMG12
			$curVal = strval($this->HMG12->CurrentValue);
			if ($curVal != "") {
				$this->HMG12->ViewValue = $this->HMG12->lookupCacheOption($curVal);
				if ($this->HMG12->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->HMG12->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->HMG12->ViewValue = $this->HMG12->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->HMG12->ViewValue = $this->HMG12->CurrentValue;
					}
				}
			} else {
				$this->HMG12->ViewValue = NULL;
			}
			$this->HMG12->ViewCustomAttributes = "";

			// HMG13
			$curVal = strval($this->HMG13->CurrentValue);
			if ($curVal != "") {
				$this->HMG13->ViewValue = $this->HMG13->lookupCacheOption($curVal);
				if ($this->HMG13->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->HMG13->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->HMG13->ViewValue = $this->HMG13->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->HMG13->ViewValue = $this->HMG13->CurrentValue;
					}
				}
			} else {
				$this->HMG13->ViewValue = NULL;
			}
			$this->HMG13->ViewCustomAttributes = "";

			// GnRH1
			$curVal = strval($this->GnRH1->CurrentValue);
			if ($curVal != "") {
				$this->GnRH1->ViewValue = $this->GnRH1->lookupCacheOption($curVal);
				if ($this->GnRH1->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->GnRH1->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->GnRH1->ViewValue = $this->GnRH1->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->GnRH1->ViewValue = $this->GnRH1->CurrentValue;
					}
				}
			} else {
				$this->GnRH1->ViewValue = NULL;
			}
			$this->GnRH1->ViewCustomAttributes = "";

			// GnRH2
			$curVal = strval($this->GnRH2->CurrentValue);
			if ($curVal != "") {
				$this->GnRH2->ViewValue = $this->GnRH2->lookupCacheOption($curVal);
				if ($this->GnRH2->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->GnRH2->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->GnRH2->ViewValue = $this->GnRH2->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->GnRH2->ViewValue = $this->GnRH2->CurrentValue;
					}
				}
			} else {
				$this->GnRH2->ViewValue = NULL;
			}
			$this->GnRH2->ViewCustomAttributes = "";

			// GnRH3
			$curVal = strval($this->GnRH3->CurrentValue);
			if ($curVal != "") {
				$this->GnRH3->ViewValue = $this->GnRH3->lookupCacheOption($curVal);
				if ($this->GnRH3->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->GnRH3->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->GnRH3->ViewValue = $this->GnRH3->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->GnRH3->ViewValue = $this->GnRH3->CurrentValue;
					}
				}
			} else {
				$this->GnRH3->ViewValue = NULL;
			}
			$this->GnRH3->ViewCustomAttributes = "";

			// GnRH4
			$curVal = strval($this->GnRH4->CurrentValue);
			if ($curVal != "") {
				$this->GnRH4->ViewValue = $this->GnRH4->lookupCacheOption($curVal);
				if ($this->GnRH4->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->GnRH4->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->GnRH4->ViewValue = $this->GnRH4->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->GnRH4->ViewValue = $this->GnRH4->CurrentValue;
					}
				}
			} else {
				$this->GnRH4->ViewValue = NULL;
			}
			$this->GnRH4->ViewCustomAttributes = "";

			// GnRH5
			$curVal = strval($this->GnRH5->CurrentValue);
			if ($curVal != "") {
				$this->GnRH5->ViewValue = $this->GnRH5->lookupCacheOption($curVal);
				if ($this->GnRH5->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->GnRH5->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->GnRH5->ViewValue = $this->GnRH5->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->GnRH5->ViewValue = $this->GnRH5->CurrentValue;
					}
				}
			} else {
				$this->GnRH5->ViewValue = NULL;
			}
			$this->GnRH5->ViewCustomAttributes = "";

			// GnRH6
			$curVal = strval($this->GnRH6->CurrentValue);
			if ($curVal != "") {
				$this->GnRH6->ViewValue = $this->GnRH6->lookupCacheOption($curVal);
				if ($this->GnRH6->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->GnRH6->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->GnRH6->ViewValue = $this->GnRH6->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->GnRH6->ViewValue = $this->GnRH6->CurrentValue;
					}
				}
			} else {
				$this->GnRH6->ViewValue = NULL;
			}
			$this->GnRH6->ViewCustomAttributes = "";

			// GnRH7
			$curVal = strval($this->GnRH7->CurrentValue);
			if ($curVal != "") {
				$this->GnRH7->ViewValue = $this->GnRH7->lookupCacheOption($curVal);
				if ($this->GnRH7->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->GnRH7->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->GnRH7->ViewValue = $this->GnRH7->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->GnRH7->ViewValue = $this->GnRH7->CurrentValue;
					}
				}
			} else {
				$this->GnRH7->ViewValue = NULL;
			}
			$this->GnRH7->ViewCustomAttributes = "";

			// GnRH8
			$curVal = strval($this->GnRH8->CurrentValue);
			if ($curVal != "") {
				$this->GnRH8->ViewValue = $this->GnRH8->lookupCacheOption($curVal);
				if ($this->GnRH8->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->GnRH8->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->GnRH8->ViewValue = $this->GnRH8->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->GnRH8->ViewValue = $this->GnRH8->CurrentValue;
					}
				}
			} else {
				$this->GnRH8->ViewValue = NULL;
			}
			$this->GnRH8->ViewCustomAttributes = "";

			// GnRH9
			$curVal = strval($this->GnRH9->CurrentValue);
			if ($curVal != "") {
				$this->GnRH9->ViewValue = $this->GnRH9->lookupCacheOption($curVal);
				if ($this->GnRH9->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->GnRH9->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->GnRH9->ViewValue = $this->GnRH9->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->GnRH9->ViewValue = $this->GnRH9->CurrentValue;
					}
				}
			} else {
				$this->GnRH9->ViewValue = NULL;
			}
			$this->GnRH9->ViewCustomAttributes = "";

			// GnRH10
			$curVal = strval($this->GnRH10->CurrentValue);
			if ($curVal != "") {
				$this->GnRH10->ViewValue = $this->GnRH10->lookupCacheOption($curVal);
				if ($this->GnRH10->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->GnRH10->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->GnRH10->ViewValue = $this->GnRH10->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->GnRH10->ViewValue = $this->GnRH10->CurrentValue;
					}
				}
			} else {
				$this->GnRH10->ViewValue = NULL;
			}
			$this->GnRH10->ViewCustomAttributes = "";

			// GnRH11
			$curVal = strval($this->GnRH11->CurrentValue);
			if ($curVal != "") {
				$this->GnRH11->ViewValue = $this->GnRH11->lookupCacheOption($curVal);
				if ($this->GnRH11->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->GnRH11->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->GnRH11->ViewValue = $this->GnRH11->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->GnRH11->ViewValue = $this->GnRH11->CurrentValue;
					}
				}
			} else {
				$this->GnRH11->ViewValue = NULL;
			}
			$this->GnRH11->ViewCustomAttributes = "";

			// GnRH12
			$curVal = strval($this->GnRH12->CurrentValue);
			if ($curVal != "") {
				$this->GnRH12->ViewValue = $this->GnRH12->lookupCacheOption($curVal);
				if ($this->GnRH12->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->GnRH12->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->GnRH12->ViewValue = $this->GnRH12->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->GnRH12->ViewValue = $this->GnRH12->CurrentValue;
					}
				}
			} else {
				$this->GnRH12->ViewValue = NULL;
			}
			$this->GnRH12->ViewCustomAttributes = "";

			// GnRH13
			$curVal = strval($this->GnRH13->CurrentValue);
			if ($curVal != "") {
				$this->GnRH13->ViewValue = $this->GnRH13->lookupCacheOption($curVal);
				if ($this->GnRH13->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->GnRH13->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->GnRH13->ViewValue = $this->GnRH13->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->GnRH13->ViewValue = $this->GnRH13->CurrentValue;
					}
				}
			} else {
				$this->GnRH13->ViewValue = NULL;
			}
			$this->GnRH13->ViewCustomAttributes = "";

			// E21
			$this->E21->ViewValue = $this->E21->CurrentValue;
			$this->E21->ViewCustomAttributes = "";

			// E22
			$this->E22->ViewValue = $this->E22->CurrentValue;
			$this->E22->ViewCustomAttributes = "";

			// E23
			$this->E23->ViewValue = $this->E23->CurrentValue;
			$this->E23->ViewCustomAttributes = "";

			// E24
			$this->E24->ViewValue = $this->E24->CurrentValue;
			$this->E24->ViewCustomAttributes = "";

			// E25
			$this->E25->ViewValue = $this->E25->CurrentValue;
			$this->E25->ViewCustomAttributes = "";

			// E26
			$this->E26->ViewValue = $this->E26->CurrentValue;
			$this->E26->ViewCustomAttributes = "";

			// E27
			$this->E27->ViewValue = $this->E27->CurrentValue;
			$this->E27->ViewCustomAttributes = "";

			// E28
			$this->E28->ViewValue = $this->E28->CurrentValue;
			$this->E28->ViewCustomAttributes = "";

			// E29
			$this->E29->ViewValue = $this->E29->CurrentValue;
			$this->E29->ViewCustomAttributes = "";

			// E210
			$this->E210->ViewValue = $this->E210->CurrentValue;
			$this->E210->ViewCustomAttributes = "";

			// E211
			$this->E211->ViewValue = $this->E211->CurrentValue;
			$this->E211->ViewCustomAttributes = "";

			// E212
			$this->E212->ViewValue = $this->E212->CurrentValue;
			$this->E212->ViewCustomAttributes = "";

			// E213
			$this->E213->ViewValue = $this->E213->CurrentValue;
			$this->E213->ViewCustomAttributes = "";

			// P41
			$this->P41->ViewValue = $this->P41->CurrentValue;
			$this->P41->ViewCustomAttributes = "";

			// P42
			$this->P42->ViewValue = $this->P42->CurrentValue;
			$this->P42->ViewCustomAttributes = "";

			// P43
			$this->P43->ViewValue = $this->P43->CurrentValue;
			$this->P43->ViewCustomAttributes = "";

			// P44
			$this->P44->ViewValue = $this->P44->CurrentValue;
			$this->P44->ViewCustomAttributes = "";

			// P45
			$this->P45->ViewValue = $this->P45->CurrentValue;
			$this->P45->ViewCustomAttributes = "";

			// P46
			$this->P46->ViewValue = $this->P46->CurrentValue;
			$this->P46->ViewCustomAttributes = "";

			// P47
			$this->P47->ViewValue = $this->P47->CurrentValue;
			$this->P47->ViewCustomAttributes = "";

			// P48
			$this->P48->ViewValue = $this->P48->CurrentValue;
			$this->P48->ViewCustomAttributes = "";

			// P49
			$this->P49->ViewValue = $this->P49->CurrentValue;
			$this->P49->ViewCustomAttributes = "";

			// P410
			$this->P410->ViewValue = $this->P410->CurrentValue;
			$this->P410->ViewCustomAttributes = "";

			// P411
			$this->P411->ViewValue = $this->P411->CurrentValue;
			$this->P411->ViewCustomAttributes = "";

			// P412
			$this->P412->ViewValue = $this->P412->CurrentValue;
			$this->P412->ViewCustomAttributes = "";

			// P413
			$this->P413->ViewValue = $this->P413->CurrentValue;
			$this->P413->ViewCustomAttributes = "";

			// USGRt1
			$this->USGRt1->ViewValue = $this->USGRt1->CurrentValue;
			$this->USGRt1->ViewCustomAttributes = "";

			// USGRt2
			$this->USGRt2->ViewValue = $this->USGRt2->CurrentValue;
			$this->USGRt2->ViewCustomAttributes = "";

			// USGRt3
			$this->USGRt3->ViewValue = $this->USGRt3->CurrentValue;
			$this->USGRt3->ViewCustomAttributes = "";

			// USGRt4
			$this->USGRt4->ViewValue = $this->USGRt4->CurrentValue;
			$this->USGRt4->ViewCustomAttributes = "";

			// USGRt5
			$this->USGRt5->ViewValue = $this->USGRt5->CurrentValue;
			$this->USGRt5->ViewCustomAttributes = "";

			// USGRt6
			$this->USGRt6->ViewValue = $this->USGRt6->CurrentValue;
			$this->USGRt6->ViewCustomAttributes = "";

			// USGRt7
			$this->USGRt7->ViewValue = $this->USGRt7->CurrentValue;
			$this->USGRt7->ViewCustomAttributes = "";

			// USGRt8
			$this->USGRt8->ViewValue = $this->USGRt8->CurrentValue;
			$this->USGRt8->ViewCustomAttributes = "";

			// USGRt9
			$this->USGRt9->ViewValue = $this->USGRt9->CurrentValue;
			$this->USGRt9->ViewCustomAttributes = "";

			// USGRt10
			$this->USGRt10->ViewValue = $this->USGRt10->CurrentValue;
			$this->USGRt10->ViewCustomAttributes = "";

			// USGRt11
			$this->USGRt11->ViewValue = $this->USGRt11->CurrentValue;
			$this->USGRt11->ViewCustomAttributes = "";

			// USGRt12
			$this->USGRt12->ViewValue = $this->USGRt12->CurrentValue;
			$this->USGRt12->ViewCustomAttributes = "";

			// USGRt13
			$this->USGRt13->ViewValue = $this->USGRt13->CurrentValue;
			$this->USGRt13->ViewCustomAttributes = "";

			// USGLt1
			$this->USGLt1->ViewValue = $this->USGLt1->CurrentValue;
			$this->USGLt1->ViewCustomAttributes = "";

			// USGLt2
			$this->USGLt2->ViewValue = $this->USGLt2->CurrentValue;
			$this->USGLt2->ViewCustomAttributes = "";

			// USGLt3
			$this->USGLt3->ViewValue = $this->USGLt3->CurrentValue;
			$this->USGLt3->ViewCustomAttributes = "";

			// USGLt4
			$this->USGLt4->ViewValue = $this->USGLt4->CurrentValue;
			$this->USGLt4->ViewCustomAttributes = "";

			// USGLt5
			$this->USGLt5->ViewValue = $this->USGLt5->CurrentValue;
			$this->USGLt5->ViewCustomAttributes = "";

			// USGLt6
			$this->USGLt6->ViewValue = $this->USGLt6->CurrentValue;
			$this->USGLt6->ViewCustomAttributes = "";

			// USGLt7
			$this->USGLt7->ViewValue = $this->USGLt7->CurrentValue;
			$this->USGLt7->ViewCustomAttributes = "";

			// USGLt8
			$this->USGLt8->ViewValue = $this->USGLt8->CurrentValue;
			$this->USGLt8->ViewCustomAttributes = "";

			// USGLt9
			$this->USGLt9->ViewValue = $this->USGLt9->CurrentValue;
			$this->USGLt9->ViewCustomAttributes = "";

			// USGLt10
			$this->USGLt10->ViewValue = $this->USGLt10->CurrentValue;
			$this->USGLt10->ViewCustomAttributes = "";

			// USGLt11
			$this->USGLt11->ViewValue = $this->USGLt11->CurrentValue;
			$this->USGLt11->ViewCustomAttributes = "";

			// USGLt12
			$this->USGLt12->ViewValue = $this->USGLt12->CurrentValue;
			$this->USGLt12->ViewCustomAttributes = "";

			// USGLt13
			$this->USGLt13->ViewValue = $this->USGLt13->CurrentValue;
			$this->USGLt13->ViewCustomAttributes = "";

			// EM1
			$this->EM1->ViewValue = $this->EM1->CurrentValue;
			$this->EM1->ViewCustomAttributes = "";

			// EM2
			$this->EM2->ViewValue = $this->EM2->CurrentValue;
			$this->EM2->ViewCustomAttributes = "";

			// EM3
			$this->EM3->ViewValue = $this->EM3->CurrentValue;
			$this->EM3->ViewCustomAttributes = "";

			// EM4
			$this->EM4->ViewValue = $this->EM4->CurrentValue;
			$this->EM4->ViewCustomAttributes = "";

			// EM5
			$this->EM5->ViewValue = $this->EM5->CurrentValue;
			$this->EM5->ViewCustomAttributes = "";

			// EM6
			$this->EM6->ViewValue = $this->EM6->CurrentValue;
			$this->EM6->ViewCustomAttributes = "";

			// EM7
			$this->EM7->ViewValue = $this->EM7->CurrentValue;
			$this->EM7->ViewCustomAttributes = "";

			// EM8
			$this->EM8->ViewValue = $this->EM8->CurrentValue;
			$this->EM8->ViewCustomAttributes = "";

			// EM9
			$this->EM9->ViewValue = $this->EM9->CurrentValue;
			$this->EM9->ViewCustomAttributes = "";

			// EM10
			$this->EM10->ViewValue = $this->EM10->CurrentValue;
			$this->EM10->ViewCustomAttributes = "";

			// EM11
			$this->EM11->ViewValue = $this->EM11->CurrentValue;
			$this->EM11->ViewCustomAttributes = "";

			// EM12
			$this->EM12->ViewValue = $this->EM12->CurrentValue;
			$this->EM12->ViewCustomAttributes = "";

			// EM13
			$this->EM13->ViewValue = $this->EM13->CurrentValue;
			$this->EM13->ViewCustomAttributes = "";

			// Others1
			$this->Others1->ViewValue = $this->Others1->CurrentValue;
			$this->Others1->ViewCustomAttributes = "";

			// Others2
			$this->Others2->ViewValue = $this->Others2->CurrentValue;
			$this->Others2->ViewCustomAttributes = "";

			// Others3
			$this->Others3->ViewValue = $this->Others3->CurrentValue;
			$this->Others3->ViewCustomAttributes = "";

			// Others4
			$this->Others4->ViewValue = $this->Others4->CurrentValue;
			$this->Others4->ViewCustomAttributes = "";

			// Others5
			$this->Others5->ViewValue = $this->Others5->CurrentValue;
			$this->Others5->ViewCustomAttributes = "";

			// Others6
			$this->Others6->ViewValue = $this->Others6->CurrentValue;
			$this->Others6->ViewCustomAttributes = "";

			// Others7
			$this->Others7->ViewValue = $this->Others7->CurrentValue;
			$this->Others7->ViewCustomAttributes = "";

			// Others8
			$this->Others8->ViewValue = $this->Others8->CurrentValue;
			$this->Others8->ViewCustomAttributes = "";

			// Others9
			$this->Others9->ViewValue = $this->Others9->CurrentValue;
			$this->Others9->ViewCustomAttributes = "";

			// Others10
			$this->Others10->ViewValue = $this->Others10->CurrentValue;
			$this->Others10->ViewCustomAttributes = "";

			// Others11
			$this->Others11->ViewValue = $this->Others11->CurrentValue;
			$this->Others11->ViewCustomAttributes = "";

			// Others12
			$this->Others12->ViewValue = $this->Others12->CurrentValue;
			$this->Others12->ViewCustomAttributes = "";

			// Others13
			$this->Others13->ViewValue = $this->Others13->CurrentValue;
			$this->Others13->ViewCustomAttributes = "";

			// DR1
			$this->DR1->ViewValue = $this->DR1->CurrentValue;
			$this->DR1->ViewCustomAttributes = "";

			// DR2
			$this->DR2->ViewValue = $this->DR2->CurrentValue;
			$this->DR2->ViewCustomAttributes = "";

			// DR3
			$this->DR3->ViewValue = $this->DR3->CurrentValue;
			$this->DR3->ViewCustomAttributes = "";

			// DR4
			$this->DR4->ViewValue = $this->DR4->CurrentValue;
			$this->DR4->ViewCustomAttributes = "";

			// DR5
			$this->DR5->ViewValue = $this->DR5->CurrentValue;
			$this->DR5->ViewCustomAttributes = "";

			// DR6
			$this->DR6->ViewValue = $this->DR6->CurrentValue;
			$this->DR6->ViewCustomAttributes = "";

			// DR7
			$this->DR7->ViewValue = $this->DR7->CurrentValue;
			$this->DR7->ViewCustomAttributes = "";

			// DR8
			$this->DR8->ViewValue = $this->DR8->CurrentValue;
			$this->DR8->ViewCustomAttributes = "";

			// DR9
			$this->DR9->ViewValue = $this->DR9->CurrentValue;
			$this->DR9->ViewCustomAttributes = "";

			// DR10
			$this->DR10->ViewValue = $this->DR10->CurrentValue;
			$this->DR10->ViewCustomAttributes = "";

			// DR11
			$this->DR11->ViewValue = $this->DR11->CurrentValue;
			$this->DR11->ViewCustomAttributes = "";

			// DR12
			$this->DR12->ViewValue = $this->DR12->CurrentValue;
			$this->DR12->ViewCustomAttributes = "";

			// DR13
			$this->DR13->ViewValue = $this->DR13->CurrentValue;
			$this->DR13->ViewCustomAttributes = "";

			// TidNo
			$this->TidNo->ViewValue = $this->TidNo->CurrentValue;
			$this->TidNo->ViewValue = FormatNumber($this->TidNo->ViewValue, 0, -2, -2, -2);
			$this->TidNo->ViewCustomAttributes = "";

			// Convert
			if (strval($this->Convert->CurrentValue) != "") {
				$this->Convert->ViewValue = new OptionValues();
				$arwrk = explode(",", strval($this->Convert->CurrentValue));
				$cnt = count($arwrk);
				for ($ari = 0; $ari < $cnt; $ari++)
					$this->Convert->ViewValue->add($this->Convert->optionCaption(trim($arwrk[$ari])));
			} else {
				$this->Convert->ViewValue = NULL;
			}
			$this->Convert->ViewCustomAttributes = "";

			// Consultant
			$this->Consultant->ViewValue = $this->Consultant->CurrentValue;
			$this->Consultant->ViewCustomAttributes = "";

			// InseminatinTechnique
			if (strval($this->InseminatinTechnique->CurrentValue) != "") {
				$this->InseminatinTechnique->ViewValue = $this->InseminatinTechnique->optionCaption($this->InseminatinTechnique->CurrentValue);
			} else {
				$this->InseminatinTechnique->ViewValue = NULL;
			}
			$this->InseminatinTechnique->ViewCustomAttributes = "";

			// IndicationForART
			if (strval($this->IndicationForART->CurrentValue) != "") {
				$this->IndicationForART->ViewValue = $this->IndicationForART->optionCaption($this->IndicationForART->CurrentValue);
			} else {
				$this->IndicationForART->ViewValue = NULL;
			}
			$this->IndicationForART->ViewCustomAttributes = "";

			// Hysteroscopy
			if (strval($this->Hysteroscopy->CurrentValue) != "") {
				$this->Hysteroscopy->ViewValue = $this->Hysteroscopy->optionCaption($this->Hysteroscopy->CurrentValue);
			} else {
				$this->Hysteroscopy->ViewValue = NULL;
			}
			$this->Hysteroscopy->ViewCustomAttributes = "";

			// EndometrialScratching
			if (strval($this->EndometrialScratching->CurrentValue) != "") {
				$this->EndometrialScratching->ViewValue = $this->EndometrialScratching->optionCaption($this->EndometrialScratching->CurrentValue);
			} else {
				$this->EndometrialScratching->ViewValue = NULL;
			}
			$this->EndometrialScratching->ViewCustomAttributes = "";

			// TrialCannulation
			if (strval($this->TrialCannulation->CurrentValue) != "") {
				$this->TrialCannulation->ViewValue = $this->TrialCannulation->optionCaption($this->TrialCannulation->CurrentValue);
			} else {
				$this->TrialCannulation->ViewValue = NULL;
			}
			$this->TrialCannulation->ViewCustomAttributes = "";

			// CYCLETYPE
			if (strval($this->CYCLETYPE->CurrentValue) != "") {
				$this->CYCLETYPE->ViewValue = $this->CYCLETYPE->optionCaption($this->CYCLETYPE->CurrentValue);
			} else {
				$this->CYCLETYPE->ViewValue = NULL;
			}
			$this->CYCLETYPE->ViewCustomAttributes = "";

			// HRTCYCLE
			$this->HRTCYCLE->ViewValue = $this->HRTCYCLE->CurrentValue;
			$this->HRTCYCLE->ViewCustomAttributes = "";

			// OralEstrogenDosage
			if (strval($this->OralEstrogenDosage->CurrentValue) != "") {
				$this->OralEstrogenDosage->ViewValue = $this->OralEstrogenDosage->optionCaption($this->OralEstrogenDosage->CurrentValue);
			} else {
				$this->OralEstrogenDosage->ViewValue = NULL;
			}
			$this->OralEstrogenDosage->ViewCustomAttributes = "";

			// VaginalEstrogen
			$this->VaginalEstrogen->ViewValue = $this->VaginalEstrogen->CurrentValue;
			$this->VaginalEstrogen->ViewCustomAttributes = "";

			// GCSF
			if (strval($this->GCSF->CurrentValue) != "") {
				$this->GCSF->ViewValue = $this->GCSF->optionCaption($this->GCSF->CurrentValue);
			} else {
				$this->GCSF->ViewValue = NULL;
			}
			$this->GCSF->ViewCustomAttributes = "";

			// ActivatedPRP
			if (strval($this->ActivatedPRP->CurrentValue) != "") {
				$this->ActivatedPRP->ViewValue = $this->ActivatedPRP->optionCaption($this->ActivatedPRP->CurrentValue);
			} else {
				$this->ActivatedPRP->ViewValue = NULL;
			}
			$this->ActivatedPRP->ViewCustomAttributes = "";

			// UCLcm
			$this->UCLcm->ViewValue = $this->UCLcm->CurrentValue;
			$this->UCLcm->ViewCustomAttributes = "";

			// DATOFEMBRYOTRANSFER
			$this->DATOFEMBRYOTRANSFER->ViewValue = $this->DATOFEMBRYOTRANSFER->CurrentValue;
			$this->DATOFEMBRYOTRANSFER->ViewCustomAttributes = "";

			// DAYOFEMBRYOTRANSFER
			$this->DAYOFEMBRYOTRANSFER->ViewValue = $this->DAYOFEMBRYOTRANSFER->CurrentValue;
			$this->DAYOFEMBRYOTRANSFER->ViewCustomAttributes = "";

			// NOOFEMBRYOSTHAWED
			$this->NOOFEMBRYOSTHAWED->ViewValue = $this->NOOFEMBRYOSTHAWED->CurrentValue;
			$this->NOOFEMBRYOSTHAWED->ViewCustomAttributes = "";

			// NOOFEMBRYOSTRANSFERRED
			$this->NOOFEMBRYOSTRANSFERRED->ViewValue = $this->NOOFEMBRYOSTRANSFERRED->CurrentValue;
			$this->NOOFEMBRYOSTRANSFERRED->ViewCustomAttributes = "";

			// DAYOFEMBRYOS
			$this->DAYOFEMBRYOS->ViewValue = $this->DAYOFEMBRYOS->CurrentValue;
			$this->DAYOFEMBRYOS->ViewCustomAttributes = "";

			// CRYOPRESERVEDEMBRYOS
			$this->CRYOPRESERVEDEMBRYOS->ViewValue = $this->CRYOPRESERVEDEMBRYOS->CurrentValue;
			$this->CRYOPRESERVEDEMBRYOS->ViewCustomAttributes = "";

			// ViaAdmin
			$this->ViaAdmin->ViewValue = $this->ViaAdmin->CurrentValue;
			$this->ViaAdmin->ViewCustomAttributes = "";

			// ViaStartDateTime
			$this->ViaStartDateTime->ViewValue = $this->ViaStartDateTime->CurrentValue;
			$this->ViaStartDateTime->ViewValue = FormatDateTime($this->ViaStartDateTime->ViewValue, 0);
			$this->ViaStartDateTime->ViewCustomAttributes = "";

			// ViaDose
			$this->ViaDose->ViewValue = $this->ViaDose->CurrentValue;
			$this->ViaDose->ViewCustomAttributes = "";

			// AllFreeze
			if (strval($this->AllFreeze->CurrentValue) != "") {
				$this->AllFreeze->ViewValue = $this->AllFreeze->optionCaption($this->AllFreeze->CurrentValue);
			} else {
				$this->AllFreeze->ViewValue = NULL;
			}
			$this->AllFreeze->ViewCustomAttributes = "";

			// TreatmentCancel
			if (strval($this->TreatmentCancel->CurrentValue) != "") {
				$this->TreatmentCancel->ViewValue = $this->TreatmentCancel->optionCaption($this->TreatmentCancel->CurrentValue);
			} else {
				$this->TreatmentCancel->ViewValue = NULL;
			}
			$this->TreatmentCancel->ViewCustomAttributes = "";

			// ProgesteroneAdmin
			$this->ProgesteroneAdmin->ViewValue = $this->ProgesteroneAdmin->CurrentValue;
			$this->ProgesteroneAdmin->ViewCustomAttributes = "";

			// ProgesteroneStart
			$this->ProgesteroneStart->ViewValue = $this->ProgesteroneStart->CurrentValue;
			$this->ProgesteroneStart->ViewCustomAttributes = "";

			// ProgesteroneDose
			$this->ProgesteroneDose->ViewValue = $this->ProgesteroneDose->CurrentValue;
			$this->ProgesteroneDose->ViewCustomAttributes = "";

			// StChDate14
			$this->StChDate14->ViewValue = $this->StChDate14->CurrentValue;
			$this->StChDate14->ViewValue = FormatDateTime($this->StChDate14->ViewValue, 7);
			$this->StChDate14->ViewCustomAttributes = "";

			// StChDate15
			$this->StChDate15->ViewValue = $this->StChDate15->CurrentValue;
			$this->StChDate15->ViewValue = FormatDateTime($this->StChDate15->ViewValue, 7);
			$this->StChDate15->ViewCustomAttributes = "";

			// StChDate16
			$this->StChDate16->ViewValue = $this->StChDate16->CurrentValue;
			$this->StChDate16->ViewValue = FormatDateTime($this->StChDate16->ViewValue, 7);
			$this->StChDate16->ViewCustomAttributes = "";

			// StChDate17
			$this->StChDate17->ViewValue = $this->StChDate17->CurrentValue;
			$this->StChDate17->ViewValue = FormatDateTime($this->StChDate17->ViewValue, 7);
			$this->StChDate17->ViewCustomAttributes = "";

			// StChDate18
			$this->StChDate18->ViewValue = $this->StChDate18->CurrentValue;
			$this->StChDate18->ViewValue = FormatDateTime($this->StChDate18->ViewValue, 7);
			$this->StChDate18->ViewCustomAttributes = "";

			// StChDate19
			$this->StChDate19->ViewValue = $this->StChDate19->CurrentValue;
			$this->StChDate19->ViewValue = FormatDateTime($this->StChDate19->ViewValue, 7);
			$this->StChDate19->ViewCustomAttributes = "";

			// StChDate20
			$this->StChDate20->ViewValue = $this->StChDate20->CurrentValue;
			$this->StChDate20->ViewValue = FormatDateTime($this->StChDate20->ViewValue, 7);
			$this->StChDate20->ViewCustomAttributes = "";

			// StChDate21
			$this->StChDate21->ViewValue = $this->StChDate21->CurrentValue;
			$this->StChDate21->ViewValue = FormatDateTime($this->StChDate21->ViewValue, 7);
			$this->StChDate21->ViewCustomAttributes = "";

			// StChDate22
			$this->StChDate22->ViewValue = $this->StChDate22->CurrentValue;
			$this->StChDate22->ViewValue = FormatDateTime($this->StChDate22->ViewValue, 7);
			$this->StChDate22->ViewCustomAttributes = "";

			// StChDate23
			$this->StChDate23->ViewValue = $this->StChDate23->CurrentValue;
			$this->StChDate23->ViewValue = FormatDateTime($this->StChDate23->ViewValue, 7);
			$this->StChDate23->ViewCustomAttributes = "";

			// StChDate24
			$this->StChDate24->ViewValue = $this->StChDate24->CurrentValue;
			$this->StChDate24->ViewValue = FormatDateTime($this->StChDate24->ViewValue, 7);
			$this->StChDate24->ViewCustomAttributes = "";

			// StChDate25
			$this->StChDate25->ViewValue = $this->StChDate25->CurrentValue;
			$this->StChDate25->ViewValue = FormatDateTime($this->StChDate25->ViewValue, 7);
			$this->StChDate25->ViewCustomAttributes = "";

			// CycleDay14
			$this->CycleDay14->ViewValue = $this->CycleDay14->CurrentValue;
			$this->CycleDay14->ViewCustomAttributes = "";

			// CycleDay15
			$this->CycleDay15->ViewValue = $this->CycleDay15->CurrentValue;
			$this->CycleDay15->ViewCustomAttributes = "";

			// CycleDay16
			$this->CycleDay16->ViewValue = $this->CycleDay16->CurrentValue;
			$this->CycleDay16->ViewCustomAttributes = "";

			// CycleDay17
			$this->CycleDay17->ViewValue = $this->CycleDay17->CurrentValue;
			$this->CycleDay17->ViewCustomAttributes = "";

			// CycleDay18
			$this->CycleDay18->ViewValue = $this->CycleDay18->CurrentValue;
			$this->CycleDay18->ViewCustomAttributes = "";

			// CycleDay19
			$this->CycleDay19->ViewValue = $this->CycleDay19->CurrentValue;
			$this->CycleDay19->ViewCustomAttributes = "";

			// CycleDay20
			$this->CycleDay20->ViewValue = $this->CycleDay20->CurrentValue;
			$this->CycleDay20->ViewCustomAttributes = "";

			// CycleDay21
			$this->CycleDay21->ViewValue = $this->CycleDay21->CurrentValue;
			$this->CycleDay21->ViewCustomAttributes = "";

			// CycleDay22
			$this->CycleDay22->ViewValue = $this->CycleDay22->CurrentValue;
			$this->CycleDay22->ViewCustomAttributes = "";

			// CycleDay23
			$this->CycleDay23->ViewValue = $this->CycleDay23->CurrentValue;
			$this->CycleDay23->ViewCustomAttributes = "";

			// CycleDay24
			$this->CycleDay24->ViewValue = $this->CycleDay24->CurrentValue;
			$this->CycleDay24->ViewCustomAttributes = "";

			// CycleDay25
			$this->CycleDay25->ViewValue = $this->CycleDay25->CurrentValue;
			$this->CycleDay25->ViewCustomAttributes = "";

			// StimulationDay14
			$this->StimulationDay14->ViewValue = $this->StimulationDay14->CurrentValue;
			$this->StimulationDay14->ViewCustomAttributes = "";

			// StimulationDay15
			$this->StimulationDay15->ViewValue = $this->StimulationDay15->CurrentValue;
			$this->StimulationDay15->ViewCustomAttributes = "";

			// StimulationDay16
			$this->StimulationDay16->ViewValue = $this->StimulationDay16->CurrentValue;
			$this->StimulationDay16->ViewCustomAttributes = "";

			// StimulationDay17
			$this->StimulationDay17->ViewValue = $this->StimulationDay17->CurrentValue;
			$this->StimulationDay17->ViewCustomAttributes = "";

			// StimulationDay18
			$this->StimulationDay18->ViewValue = $this->StimulationDay18->CurrentValue;
			$this->StimulationDay18->ViewCustomAttributes = "";

			// StimulationDay19
			$this->StimulationDay19->ViewValue = $this->StimulationDay19->CurrentValue;
			$this->StimulationDay19->ViewCustomAttributes = "";

			// StimulationDay20
			$this->StimulationDay20->ViewValue = $this->StimulationDay20->CurrentValue;
			$this->StimulationDay20->ViewCustomAttributes = "";

			// StimulationDay21
			$this->StimulationDay21->ViewValue = $this->StimulationDay21->CurrentValue;
			$this->StimulationDay21->ViewCustomAttributes = "";

			// StimulationDay22
			$this->StimulationDay22->ViewValue = $this->StimulationDay22->CurrentValue;
			$this->StimulationDay22->ViewCustomAttributes = "";

			// StimulationDay23
			$this->StimulationDay23->ViewValue = $this->StimulationDay23->CurrentValue;
			$this->StimulationDay23->ViewCustomAttributes = "";

			// StimulationDay24
			$this->StimulationDay24->ViewValue = $this->StimulationDay24->CurrentValue;
			$this->StimulationDay24->ViewCustomAttributes = "";

			// StimulationDay25
			$this->StimulationDay25->ViewValue = $this->StimulationDay25->CurrentValue;
			$this->StimulationDay25->ViewCustomAttributes = "";

			// Tablet14
			$curVal = strval($this->Tablet14->CurrentValue);
			if ($curVal != "") {
				$this->Tablet14->ViewValue = $this->Tablet14->lookupCacheOption($curVal);
				if ($this->Tablet14->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->Tablet14->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->Tablet14->ViewValue = $this->Tablet14->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->Tablet14->ViewValue = $this->Tablet14->CurrentValue;
					}
				}
			} else {
				$this->Tablet14->ViewValue = NULL;
			}
			$this->Tablet14->ViewCustomAttributes = "";

			// Tablet15
			$curVal = strval($this->Tablet15->CurrentValue);
			if ($curVal != "") {
				$this->Tablet15->ViewValue = $this->Tablet15->lookupCacheOption($curVal);
				if ($this->Tablet15->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->Tablet15->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->Tablet15->ViewValue = $this->Tablet15->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->Tablet15->ViewValue = $this->Tablet15->CurrentValue;
					}
				}
			} else {
				$this->Tablet15->ViewValue = NULL;
			}
			$this->Tablet15->ViewCustomAttributes = "";

			// Tablet16
			$curVal = strval($this->Tablet16->CurrentValue);
			if ($curVal != "") {
				$this->Tablet16->ViewValue = $this->Tablet16->lookupCacheOption($curVal);
				if ($this->Tablet16->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->Tablet16->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->Tablet16->ViewValue = $this->Tablet16->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->Tablet16->ViewValue = $this->Tablet16->CurrentValue;
					}
				}
			} else {
				$this->Tablet16->ViewValue = NULL;
			}
			$this->Tablet16->ViewCustomAttributes = "";

			// Tablet17
			$curVal = strval($this->Tablet17->CurrentValue);
			if ($curVal != "") {
				$this->Tablet17->ViewValue = $this->Tablet17->lookupCacheOption($curVal);
				if ($this->Tablet17->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->Tablet17->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->Tablet17->ViewValue = $this->Tablet17->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->Tablet17->ViewValue = $this->Tablet17->CurrentValue;
					}
				}
			} else {
				$this->Tablet17->ViewValue = NULL;
			}
			$this->Tablet17->ViewCustomAttributes = "";

			// Tablet18
			$curVal = strval($this->Tablet18->CurrentValue);
			if ($curVal != "") {
				$this->Tablet18->ViewValue = $this->Tablet18->lookupCacheOption($curVal);
				if ($this->Tablet18->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->Tablet18->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->Tablet18->ViewValue = $this->Tablet18->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->Tablet18->ViewValue = $this->Tablet18->CurrentValue;
					}
				}
			} else {
				$this->Tablet18->ViewValue = NULL;
			}
			$this->Tablet18->ViewCustomAttributes = "";

			// Tablet19
			$curVal = strval($this->Tablet19->CurrentValue);
			if ($curVal != "") {
				$this->Tablet19->ViewValue = $this->Tablet19->lookupCacheOption($curVal);
				if ($this->Tablet19->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->Tablet19->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->Tablet19->ViewValue = $this->Tablet19->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->Tablet19->ViewValue = $this->Tablet19->CurrentValue;
					}
				}
			} else {
				$this->Tablet19->ViewValue = NULL;
			}
			$this->Tablet19->ViewCustomAttributes = "";

			// Tablet20
			$curVal = strval($this->Tablet20->CurrentValue);
			if ($curVal != "") {
				$this->Tablet20->ViewValue = $this->Tablet20->lookupCacheOption($curVal);
				if ($this->Tablet20->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->Tablet20->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->Tablet20->ViewValue = $this->Tablet20->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->Tablet20->ViewValue = $this->Tablet20->CurrentValue;
					}
				}
			} else {
				$this->Tablet20->ViewValue = NULL;
			}
			$this->Tablet20->ViewCustomAttributes = "";

			// Tablet21
			$curVal = strval($this->Tablet21->CurrentValue);
			if ($curVal != "") {
				$this->Tablet21->ViewValue = $this->Tablet21->lookupCacheOption($curVal);
				if ($this->Tablet21->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->Tablet21->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->Tablet21->ViewValue = $this->Tablet21->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->Tablet21->ViewValue = $this->Tablet21->CurrentValue;
					}
				}
			} else {
				$this->Tablet21->ViewValue = NULL;
			}
			$this->Tablet21->ViewCustomAttributes = "";

			// Tablet22
			$curVal = strval($this->Tablet22->CurrentValue);
			if ($curVal != "") {
				$this->Tablet22->ViewValue = $this->Tablet22->lookupCacheOption($curVal);
				if ($this->Tablet22->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->Tablet22->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->Tablet22->ViewValue = $this->Tablet22->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->Tablet22->ViewValue = $this->Tablet22->CurrentValue;
					}
				}
			} else {
				$this->Tablet22->ViewValue = NULL;
			}
			$this->Tablet22->ViewCustomAttributes = "";

			// Tablet23
			$curVal = strval($this->Tablet23->CurrentValue);
			if ($curVal != "") {
				$this->Tablet23->ViewValue = $this->Tablet23->lookupCacheOption($curVal);
				if ($this->Tablet23->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->Tablet23->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->Tablet23->ViewValue = $this->Tablet23->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->Tablet23->ViewValue = $this->Tablet23->CurrentValue;
					}
				}
			} else {
				$this->Tablet23->ViewValue = NULL;
			}
			$this->Tablet23->ViewCustomAttributes = "";

			// Tablet24
			$curVal = strval($this->Tablet24->CurrentValue);
			if ($curVal != "") {
				$this->Tablet24->ViewValue = $this->Tablet24->lookupCacheOption($curVal);
				if ($this->Tablet24->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->Tablet24->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->Tablet24->ViewValue = $this->Tablet24->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->Tablet24->ViewValue = $this->Tablet24->CurrentValue;
					}
				}
			} else {
				$this->Tablet24->ViewValue = NULL;
			}
			$this->Tablet24->ViewCustomAttributes = "";

			// Tablet25
			$curVal = strval($this->Tablet25->CurrentValue);
			if ($curVal != "") {
				$this->Tablet25->ViewValue = $this->Tablet25->lookupCacheOption($curVal);
				if ($this->Tablet25->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->Tablet25->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->Tablet25->ViewValue = $this->Tablet25->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->Tablet25->ViewValue = $this->Tablet25->CurrentValue;
					}
				}
			} else {
				$this->Tablet25->ViewValue = NULL;
			}
			$this->Tablet25->ViewCustomAttributes = "";

			// RFSH14
			$curVal = strval($this->RFSH14->CurrentValue);
			if ($curVal != "") {
				$this->RFSH14->ViewValue = $this->RFSH14->lookupCacheOption($curVal);
				if ($this->RFSH14->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->RFSH14->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->RFSH14->ViewValue = $this->RFSH14->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->RFSH14->ViewValue = $this->RFSH14->CurrentValue;
					}
				}
			} else {
				$this->RFSH14->ViewValue = NULL;
			}
			$this->RFSH14->ViewCustomAttributes = "";

			// RFSH15
			$curVal = strval($this->RFSH15->CurrentValue);
			if ($curVal != "") {
				$this->RFSH15->ViewValue = $this->RFSH15->lookupCacheOption($curVal);
				if ($this->RFSH15->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->RFSH15->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->RFSH15->ViewValue = $this->RFSH15->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->RFSH15->ViewValue = $this->RFSH15->CurrentValue;
					}
				}
			} else {
				$this->RFSH15->ViewValue = NULL;
			}
			$this->RFSH15->ViewCustomAttributes = "";

			// RFSH16
			$curVal = strval($this->RFSH16->CurrentValue);
			if ($curVal != "") {
				$this->RFSH16->ViewValue = $this->RFSH16->lookupCacheOption($curVal);
				if ($this->RFSH16->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->RFSH16->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->RFSH16->ViewValue = $this->RFSH16->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->RFSH16->ViewValue = $this->RFSH16->CurrentValue;
					}
				}
			} else {
				$this->RFSH16->ViewValue = NULL;
			}
			$this->RFSH16->ViewCustomAttributes = "";

			// RFSH17
			$curVal = strval($this->RFSH17->CurrentValue);
			if ($curVal != "") {
				$this->RFSH17->ViewValue = $this->RFSH17->lookupCacheOption($curVal);
				if ($this->RFSH17->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->RFSH17->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->RFSH17->ViewValue = $this->RFSH17->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->RFSH17->ViewValue = $this->RFSH17->CurrentValue;
					}
				}
			} else {
				$this->RFSH17->ViewValue = NULL;
			}
			$this->RFSH17->ViewCustomAttributes = "";

			// RFSH18
			$curVal = strval($this->RFSH18->CurrentValue);
			if ($curVal != "") {
				$this->RFSH18->ViewValue = $this->RFSH18->lookupCacheOption($curVal);
				if ($this->RFSH18->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->RFSH18->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->RFSH18->ViewValue = $this->RFSH18->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->RFSH18->ViewValue = $this->RFSH18->CurrentValue;
					}
				}
			} else {
				$this->RFSH18->ViewValue = NULL;
			}
			$this->RFSH18->ViewCustomAttributes = "";

			// RFSH19
			$curVal = strval($this->RFSH19->CurrentValue);
			if ($curVal != "") {
				$this->RFSH19->ViewValue = $this->RFSH19->lookupCacheOption($curVal);
				if ($this->RFSH19->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->RFSH19->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->RFSH19->ViewValue = $this->RFSH19->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->RFSH19->ViewValue = $this->RFSH19->CurrentValue;
					}
				}
			} else {
				$this->RFSH19->ViewValue = NULL;
			}
			$this->RFSH19->ViewCustomAttributes = "";

			// RFSH20
			$curVal = strval($this->RFSH20->CurrentValue);
			if ($curVal != "") {
				$this->RFSH20->ViewValue = $this->RFSH20->lookupCacheOption($curVal);
				if ($this->RFSH20->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->RFSH20->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->RFSH20->ViewValue = $this->RFSH20->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->RFSH20->ViewValue = $this->RFSH20->CurrentValue;
					}
				}
			} else {
				$this->RFSH20->ViewValue = NULL;
			}
			$this->RFSH20->ViewCustomAttributes = "";

			// RFSH21
			$curVal = strval($this->RFSH21->CurrentValue);
			if ($curVal != "") {
				$this->RFSH21->ViewValue = $this->RFSH21->lookupCacheOption($curVal);
				if ($this->RFSH21->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->RFSH21->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->RFSH21->ViewValue = $this->RFSH21->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->RFSH21->ViewValue = $this->RFSH21->CurrentValue;
					}
				}
			} else {
				$this->RFSH21->ViewValue = NULL;
			}
			$this->RFSH21->ViewCustomAttributes = "";

			// RFSH22
			$curVal = strval($this->RFSH22->CurrentValue);
			if ($curVal != "") {
				$this->RFSH22->ViewValue = $this->RFSH22->lookupCacheOption($curVal);
				if ($this->RFSH22->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->RFSH22->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->RFSH22->ViewValue = $this->RFSH22->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->RFSH22->ViewValue = $this->RFSH22->CurrentValue;
					}
				}
			} else {
				$this->RFSH22->ViewValue = NULL;
			}
			$this->RFSH22->ViewCustomAttributes = "";

			// RFSH23
			$curVal = strval($this->RFSH23->CurrentValue);
			if ($curVal != "") {
				$this->RFSH23->ViewValue = $this->RFSH23->lookupCacheOption($curVal);
				if ($this->RFSH23->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->RFSH23->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->RFSH23->ViewValue = $this->RFSH23->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->RFSH23->ViewValue = $this->RFSH23->CurrentValue;
					}
				}
			} else {
				$this->RFSH23->ViewValue = NULL;
			}
			$this->RFSH23->ViewCustomAttributes = "";

			// RFSH24
			$curVal = strval($this->RFSH24->CurrentValue);
			if ($curVal != "") {
				$this->RFSH24->ViewValue = $this->RFSH24->lookupCacheOption($curVal);
				if ($this->RFSH24->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->RFSH24->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->RFSH24->ViewValue = $this->RFSH24->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->RFSH24->ViewValue = $this->RFSH24->CurrentValue;
					}
				}
			} else {
				$this->RFSH24->ViewValue = NULL;
			}
			$this->RFSH24->ViewCustomAttributes = "";

			// RFSH25
			$curVal = strval($this->RFSH25->CurrentValue);
			if ($curVal != "") {
				$this->RFSH25->ViewValue = $this->RFSH25->lookupCacheOption($curVal);
				if ($this->RFSH25->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->RFSH25->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->RFSH25->ViewValue = $this->RFSH25->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->RFSH25->ViewValue = $this->RFSH25->CurrentValue;
					}
				}
			} else {
				$this->RFSH25->ViewValue = NULL;
			}
			$this->RFSH25->ViewCustomAttributes = "";

			// HMG14
			$curVal = strval($this->HMG14->CurrentValue);
			if ($curVal != "") {
				$this->HMG14->ViewValue = $this->HMG14->lookupCacheOption($curVal);
				if ($this->HMG14->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->HMG14->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->HMG14->ViewValue = $this->HMG14->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->HMG14->ViewValue = $this->HMG14->CurrentValue;
					}
				}
			} else {
				$this->HMG14->ViewValue = NULL;
			}
			$this->HMG14->ViewCustomAttributes = "";

			// HMG15
			$curVal = strval($this->HMG15->CurrentValue);
			if ($curVal != "") {
				$this->HMG15->ViewValue = $this->HMG15->lookupCacheOption($curVal);
				if ($this->HMG15->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->HMG15->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->HMG15->ViewValue = $this->HMG15->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->HMG15->ViewValue = $this->HMG15->CurrentValue;
					}
				}
			} else {
				$this->HMG15->ViewValue = NULL;
			}
			$this->HMG15->ViewCustomAttributes = "";

			// HMG16
			$curVal = strval($this->HMG16->CurrentValue);
			if ($curVal != "") {
				$this->HMG16->ViewValue = $this->HMG16->lookupCacheOption($curVal);
				if ($this->HMG16->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->HMG16->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->HMG16->ViewValue = $this->HMG16->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->HMG16->ViewValue = $this->HMG16->CurrentValue;
					}
				}
			} else {
				$this->HMG16->ViewValue = NULL;
			}
			$this->HMG16->ViewCustomAttributes = "";

			// HMG17
			$curVal = strval($this->HMG17->CurrentValue);
			if ($curVal != "") {
				$this->HMG17->ViewValue = $this->HMG17->lookupCacheOption($curVal);
				if ($this->HMG17->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->HMG17->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->HMG17->ViewValue = $this->HMG17->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->HMG17->ViewValue = $this->HMG17->CurrentValue;
					}
				}
			} else {
				$this->HMG17->ViewValue = NULL;
			}
			$this->HMG17->ViewCustomAttributes = "";

			// HMG18
			$curVal = strval($this->HMG18->CurrentValue);
			if ($curVal != "") {
				$this->HMG18->ViewValue = $this->HMG18->lookupCacheOption($curVal);
				if ($this->HMG18->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->HMG18->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->HMG18->ViewValue = $this->HMG18->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->HMG18->ViewValue = $this->HMG18->CurrentValue;
					}
				}
			} else {
				$this->HMG18->ViewValue = NULL;
			}
			$this->HMG18->ViewCustomAttributes = "";

			// HMG19
			$curVal = strval($this->HMG19->CurrentValue);
			if ($curVal != "") {
				$this->HMG19->ViewValue = $this->HMG19->lookupCacheOption($curVal);
				if ($this->HMG19->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->HMG19->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->HMG19->ViewValue = $this->HMG19->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->HMG19->ViewValue = $this->HMG19->CurrentValue;
					}
				}
			} else {
				$this->HMG19->ViewValue = NULL;
			}
			$this->HMG19->ViewCustomAttributes = "";

			// HMG20
			$curVal = strval($this->HMG20->CurrentValue);
			if ($curVal != "") {
				$this->HMG20->ViewValue = $this->HMG20->lookupCacheOption($curVal);
				if ($this->HMG20->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->HMG20->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->HMG20->ViewValue = $this->HMG20->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->HMG20->ViewValue = $this->HMG20->CurrentValue;
					}
				}
			} else {
				$this->HMG20->ViewValue = NULL;
			}
			$this->HMG20->ViewCustomAttributes = "";

			// HMG21
			$curVal = strval($this->HMG21->CurrentValue);
			if ($curVal != "") {
				$this->HMG21->ViewValue = $this->HMG21->lookupCacheOption($curVal);
				if ($this->HMG21->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->HMG21->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->HMG21->ViewValue = $this->HMG21->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->HMG21->ViewValue = $this->HMG21->CurrentValue;
					}
				}
			} else {
				$this->HMG21->ViewValue = NULL;
			}
			$this->HMG21->ViewCustomAttributes = "";

			// HMG22
			$curVal = strval($this->HMG22->CurrentValue);
			if ($curVal != "") {
				$this->HMG22->ViewValue = $this->HMG22->lookupCacheOption($curVal);
				if ($this->HMG22->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->HMG22->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->HMG22->ViewValue = $this->HMG22->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->HMG22->ViewValue = $this->HMG22->CurrentValue;
					}
				}
			} else {
				$this->HMG22->ViewValue = NULL;
			}
			$this->HMG22->ViewCustomAttributes = "";

			// HMG23
			$curVal = strval($this->HMG23->CurrentValue);
			if ($curVal != "") {
				$this->HMG23->ViewValue = $this->HMG23->lookupCacheOption($curVal);
				if ($this->HMG23->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->HMG23->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->HMG23->ViewValue = $this->HMG23->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->HMG23->ViewValue = $this->HMG23->CurrentValue;
					}
				}
			} else {
				$this->HMG23->ViewValue = NULL;
			}
			$this->HMG23->ViewCustomAttributes = "";

			// HMG24
			$curVal = strval($this->HMG24->CurrentValue);
			if ($curVal != "") {
				$this->HMG24->ViewValue = $this->HMG24->lookupCacheOption($curVal);
				if ($this->HMG24->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->HMG24->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->HMG24->ViewValue = $this->HMG24->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->HMG24->ViewValue = $this->HMG24->CurrentValue;
					}
				}
			} else {
				$this->HMG24->ViewValue = NULL;
			}
			$this->HMG24->ViewCustomAttributes = "";

			// HMG25
			$curVal = strval($this->HMG25->CurrentValue);
			if ($curVal != "") {
				$this->HMG25->ViewValue = $this->HMG25->lookupCacheOption($curVal);
				if ($this->HMG25->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->HMG25->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->HMG25->ViewValue = $this->HMG25->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->HMG25->ViewValue = $this->HMG25->CurrentValue;
					}
				}
			} else {
				$this->HMG25->ViewValue = NULL;
			}
			$this->HMG25->ViewCustomAttributes = "";

			// GnRH14
			$curVal = strval($this->GnRH14->CurrentValue);
			if ($curVal != "") {
				$this->GnRH14->ViewValue = $this->GnRH14->lookupCacheOption($curVal);
				if ($this->GnRH14->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->GnRH14->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->GnRH14->ViewValue = $this->GnRH14->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->GnRH14->ViewValue = $this->GnRH14->CurrentValue;
					}
				}
			} else {
				$this->GnRH14->ViewValue = NULL;
			}
			$this->GnRH14->ViewCustomAttributes = "";

			// GnRH15
			$curVal = strval($this->GnRH15->CurrentValue);
			if ($curVal != "") {
				$this->GnRH15->ViewValue = $this->GnRH15->lookupCacheOption($curVal);
				if ($this->GnRH15->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->GnRH15->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->GnRH15->ViewValue = $this->GnRH15->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->GnRH15->ViewValue = $this->GnRH15->CurrentValue;
					}
				}
			} else {
				$this->GnRH15->ViewValue = NULL;
			}
			$this->GnRH15->ViewCustomAttributes = "";

			// GnRH16
			$curVal = strval($this->GnRH16->CurrentValue);
			if ($curVal != "") {
				$this->GnRH16->ViewValue = $this->GnRH16->lookupCacheOption($curVal);
				if ($this->GnRH16->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->GnRH16->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->GnRH16->ViewValue = $this->GnRH16->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->GnRH16->ViewValue = $this->GnRH16->CurrentValue;
					}
				}
			} else {
				$this->GnRH16->ViewValue = NULL;
			}
			$this->GnRH16->ViewCustomAttributes = "";

			// GnRH17
			$curVal = strval($this->GnRH17->CurrentValue);
			if ($curVal != "") {
				$this->GnRH17->ViewValue = $this->GnRH17->lookupCacheOption($curVal);
				if ($this->GnRH17->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->GnRH17->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->GnRH17->ViewValue = $this->GnRH17->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->GnRH17->ViewValue = $this->GnRH17->CurrentValue;
					}
				}
			} else {
				$this->GnRH17->ViewValue = NULL;
			}
			$this->GnRH17->ViewCustomAttributes = "";

			// GnRH18
			$curVal = strval($this->GnRH18->CurrentValue);
			if ($curVal != "") {
				$this->GnRH18->ViewValue = $this->GnRH18->lookupCacheOption($curVal);
				if ($this->GnRH18->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->GnRH18->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->GnRH18->ViewValue = $this->GnRH18->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->GnRH18->ViewValue = $this->GnRH18->CurrentValue;
					}
				}
			} else {
				$this->GnRH18->ViewValue = NULL;
			}
			$this->GnRH18->ViewCustomAttributes = "";

			// GnRH19
			$curVal = strval($this->GnRH19->CurrentValue);
			if ($curVal != "") {
				$this->GnRH19->ViewValue = $this->GnRH19->lookupCacheOption($curVal);
				if ($this->GnRH19->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->GnRH19->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->GnRH19->ViewValue = $this->GnRH19->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->GnRH19->ViewValue = $this->GnRH19->CurrentValue;
					}
				}
			} else {
				$this->GnRH19->ViewValue = NULL;
			}
			$this->GnRH19->ViewCustomAttributes = "";

			// GnRH20
			$curVal = strval($this->GnRH20->CurrentValue);
			if ($curVal != "") {
				$this->GnRH20->ViewValue = $this->GnRH20->lookupCacheOption($curVal);
				if ($this->GnRH20->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->GnRH20->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->GnRH20->ViewValue = $this->GnRH20->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->GnRH20->ViewValue = $this->GnRH20->CurrentValue;
					}
				}
			} else {
				$this->GnRH20->ViewValue = NULL;
			}
			$this->GnRH20->ViewCustomAttributes = "";

			// GnRH21
			$curVal = strval($this->GnRH21->CurrentValue);
			if ($curVal != "") {
				$this->GnRH21->ViewValue = $this->GnRH21->lookupCacheOption($curVal);
				if ($this->GnRH21->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->GnRH21->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->GnRH21->ViewValue = $this->GnRH21->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->GnRH21->ViewValue = $this->GnRH21->CurrentValue;
					}
				}
			} else {
				$this->GnRH21->ViewValue = NULL;
			}
			$this->GnRH21->ViewCustomAttributes = "";

			// GnRH22
			$curVal = strval($this->GnRH22->CurrentValue);
			if ($curVal != "") {
				$this->GnRH22->ViewValue = $this->GnRH22->lookupCacheOption($curVal);
				if ($this->GnRH22->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->GnRH22->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->GnRH22->ViewValue = $this->GnRH22->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->GnRH22->ViewValue = $this->GnRH22->CurrentValue;
					}
				}
			} else {
				$this->GnRH22->ViewValue = NULL;
			}
			$this->GnRH22->ViewCustomAttributes = "";

			// GnRH23
			$curVal = strval($this->GnRH23->CurrentValue);
			if ($curVal != "") {
				$this->GnRH23->ViewValue = $this->GnRH23->lookupCacheOption($curVal);
				if ($this->GnRH23->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->GnRH23->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->GnRH23->ViewValue = $this->GnRH23->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->GnRH23->ViewValue = $this->GnRH23->CurrentValue;
					}
				}
			} else {
				$this->GnRH23->ViewValue = NULL;
			}
			$this->GnRH23->ViewCustomAttributes = "";

			// GnRH24
			$curVal = strval($this->GnRH24->CurrentValue);
			if ($curVal != "") {
				$this->GnRH24->ViewValue = $this->GnRH24->lookupCacheOption($curVal);
				if ($this->GnRH24->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->GnRH24->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->GnRH24->ViewValue = $this->GnRH24->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->GnRH24->ViewValue = $this->GnRH24->CurrentValue;
					}
				}
			} else {
				$this->GnRH24->ViewValue = NULL;
			}
			$this->GnRH24->ViewCustomAttributes = "";

			// GnRH25
			$curVal = strval($this->GnRH25->CurrentValue);
			if ($curVal != "") {
				$this->GnRH25->ViewValue = $this->GnRH25->lookupCacheOption($curVal);
				if ($this->GnRH25->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->GnRH25->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->GnRH25->ViewValue = $this->GnRH25->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->GnRH25->ViewValue = $this->GnRH25->CurrentValue;
					}
				}
			} else {
				$this->GnRH25->ViewValue = NULL;
			}
			$this->GnRH25->ViewCustomAttributes = "";

			// P414
			$this->P414->ViewValue = $this->P414->CurrentValue;
			$this->P414->ViewCustomAttributes = "";

			// P415
			$this->P415->ViewValue = $this->P415->CurrentValue;
			$this->P415->ViewCustomAttributes = "";

			// P416
			$this->P416->ViewValue = $this->P416->CurrentValue;
			$this->P416->ViewCustomAttributes = "";

			// P417
			$this->P417->ViewValue = $this->P417->CurrentValue;
			$this->P417->ViewCustomAttributes = "";

			// P418
			$this->P418->ViewValue = $this->P418->CurrentValue;
			$this->P418->ViewCustomAttributes = "";

			// P419
			$this->P419->ViewValue = $this->P419->CurrentValue;
			$this->P419->ViewCustomAttributes = "";

			// P420
			$this->P420->ViewValue = $this->P420->CurrentValue;
			$this->P420->ViewCustomAttributes = "";

			// P421
			$this->P421->ViewValue = $this->P421->CurrentValue;
			$this->P421->ViewCustomAttributes = "";

			// P422
			$this->P422->ViewValue = $this->P422->CurrentValue;
			$this->P422->ViewCustomAttributes = "";

			// P423
			$this->P423->ViewValue = $this->P423->CurrentValue;
			$this->P423->ViewCustomAttributes = "";

			// P424
			$this->P424->ViewValue = $this->P424->CurrentValue;
			$this->P424->ViewCustomAttributes = "";

			// P425
			$this->P425->ViewValue = $this->P425->CurrentValue;
			$this->P425->ViewCustomAttributes = "";

			// USGRt14
			$this->USGRt14->ViewValue = $this->USGRt14->CurrentValue;
			$this->USGRt14->ViewCustomAttributes = "";

			// USGRt15
			$this->USGRt15->ViewValue = $this->USGRt15->CurrentValue;
			$this->USGRt15->ViewCustomAttributes = "";

			// USGRt16
			$this->USGRt16->ViewValue = $this->USGRt16->CurrentValue;
			$this->USGRt16->ViewCustomAttributes = "";

			// USGRt17
			$this->USGRt17->ViewValue = $this->USGRt17->CurrentValue;
			$this->USGRt17->ViewCustomAttributes = "";

			// USGRt18
			$this->USGRt18->ViewValue = $this->USGRt18->CurrentValue;
			$this->USGRt18->ViewCustomAttributes = "";

			// USGRt19
			$this->USGRt19->ViewValue = $this->USGRt19->CurrentValue;
			$this->USGRt19->ViewCustomAttributes = "";

			// USGRt20
			$this->USGRt20->ViewValue = $this->USGRt20->CurrentValue;
			$this->USGRt20->ViewCustomAttributes = "";

			// USGRt21
			$this->USGRt21->ViewValue = $this->USGRt21->CurrentValue;
			$this->USGRt21->ViewCustomAttributes = "";

			// USGRt22
			$this->USGRt22->ViewValue = $this->USGRt22->CurrentValue;
			$this->USGRt22->ViewCustomAttributes = "";

			// USGRt23
			$this->USGRt23->ViewValue = $this->USGRt23->CurrentValue;
			$this->USGRt23->ViewCustomAttributes = "";

			// USGRt24
			$this->USGRt24->ViewValue = $this->USGRt24->CurrentValue;
			$this->USGRt24->ViewCustomAttributes = "";

			// USGRt25
			$this->USGRt25->ViewValue = $this->USGRt25->CurrentValue;
			$this->USGRt25->ViewCustomAttributes = "";

			// USGLt14
			$this->USGLt14->ViewValue = $this->USGLt14->CurrentValue;
			$this->USGLt14->ViewCustomAttributes = "";

			// USGLt15
			$this->USGLt15->ViewValue = $this->USGLt15->CurrentValue;
			$this->USGLt15->ViewCustomAttributes = "";

			// USGLt16
			$this->USGLt16->ViewValue = $this->USGLt16->CurrentValue;
			$this->USGLt16->ViewCustomAttributes = "";

			// USGLt17
			$this->USGLt17->ViewValue = $this->USGLt17->CurrentValue;
			$this->USGLt17->ViewCustomAttributes = "";

			// USGLt18
			$this->USGLt18->ViewValue = $this->USGLt18->CurrentValue;
			$this->USGLt18->ViewCustomAttributes = "";

			// USGLt19
			$this->USGLt19->ViewValue = $this->USGLt19->CurrentValue;
			$this->USGLt19->ViewCustomAttributes = "";

			// USGLt20
			$this->USGLt20->ViewValue = $this->USGLt20->CurrentValue;
			$this->USGLt20->ViewCustomAttributes = "";

			// USGLt21
			$this->USGLt21->ViewValue = $this->USGLt21->CurrentValue;
			$this->USGLt21->ViewCustomAttributes = "";

			// USGLt22
			$this->USGLt22->ViewValue = $this->USGLt22->CurrentValue;
			$this->USGLt22->ViewCustomAttributes = "";

			// USGLt23
			$this->USGLt23->ViewValue = $this->USGLt23->CurrentValue;
			$this->USGLt23->ViewCustomAttributes = "";

			// USGLt24
			$this->USGLt24->ViewValue = $this->USGLt24->CurrentValue;
			$this->USGLt24->ViewCustomAttributes = "";

			// USGLt25
			$this->USGLt25->ViewValue = $this->USGLt25->CurrentValue;
			$this->USGLt25->ViewCustomAttributes = "";

			// EM14
			$this->EM14->ViewValue = $this->EM14->CurrentValue;
			$this->EM14->ViewCustomAttributes = "";

			// EM15
			$this->EM15->ViewValue = $this->EM15->CurrentValue;
			$this->EM15->ViewCustomAttributes = "";

			// EM16
			$this->EM16->ViewValue = $this->EM16->CurrentValue;
			$this->EM16->ViewCustomAttributes = "";

			// EM17
			$this->EM17->ViewValue = $this->EM17->CurrentValue;
			$this->EM17->ViewCustomAttributes = "";

			// EM18
			$this->EM18->ViewValue = $this->EM18->CurrentValue;
			$this->EM18->ViewCustomAttributes = "";

			// EM19
			$this->EM19->ViewValue = $this->EM19->CurrentValue;
			$this->EM19->ViewCustomAttributes = "";

			// EM20
			$this->EM20->ViewValue = $this->EM20->CurrentValue;
			$this->EM20->ViewCustomAttributes = "";

			// EM21
			$this->EM21->ViewValue = $this->EM21->CurrentValue;
			$this->EM21->ViewCustomAttributes = "";

			// EM22
			$this->EM22->ViewValue = $this->EM22->CurrentValue;
			$this->EM22->ViewCustomAttributes = "";

			// EM23
			$this->EM23->ViewValue = $this->EM23->CurrentValue;
			$this->EM23->ViewCustomAttributes = "";

			// EM24
			$this->EM24->ViewValue = $this->EM24->CurrentValue;
			$this->EM24->ViewCustomAttributes = "";

			// EM25
			$this->EM25->ViewValue = $this->EM25->CurrentValue;
			$this->EM25->ViewCustomAttributes = "";

			// Others14
			$this->Others14->ViewValue = $this->Others14->CurrentValue;
			$this->Others14->ViewCustomAttributes = "";

			// Others15
			$this->Others15->ViewValue = $this->Others15->CurrentValue;
			$this->Others15->ViewCustomAttributes = "";

			// Others16
			$this->Others16->ViewValue = $this->Others16->CurrentValue;
			$this->Others16->ViewCustomAttributes = "";

			// Others17
			$this->Others17->ViewValue = $this->Others17->CurrentValue;
			$this->Others17->ViewCustomAttributes = "";

			// Others18
			$this->Others18->ViewValue = $this->Others18->CurrentValue;
			$this->Others18->ViewCustomAttributes = "";

			// Others19
			$this->Others19->ViewValue = $this->Others19->CurrentValue;
			$this->Others19->ViewCustomAttributes = "";

			// Others20
			$this->Others20->ViewValue = $this->Others20->CurrentValue;
			$this->Others20->ViewCustomAttributes = "";

			// Others21
			$this->Others21->ViewValue = $this->Others21->CurrentValue;
			$this->Others21->ViewCustomAttributes = "";

			// Others22
			$this->Others22->ViewValue = $this->Others22->CurrentValue;
			$this->Others22->ViewCustomAttributes = "";

			// Others23
			$this->Others23->ViewValue = $this->Others23->CurrentValue;
			$this->Others23->ViewCustomAttributes = "";

			// Others24
			$this->Others24->ViewValue = $this->Others24->CurrentValue;
			$this->Others24->ViewCustomAttributes = "";

			// Others25
			$this->Others25->ViewValue = $this->Others25->CurrentValue;
			$this->Others25->ViewCustomAttributes = "";

			// DR14
			$this->DR14->ViewValue = $this->DR14->CurrentValue;
			$this->DR14->ViewCustomAttributes = "";

			// DR15
			$this->DR15->ViewValue = $this->DR15->CurrentValue;
			$this->DR15->ViewCustomAttributes = "";

			// DR16
			$this->DR16->ViewValue = $this->DR16->CurrentValue;
			$this->DR16->ViewCustomAttributes = "";

			// DR17
			$this->DR17->ViewValue = $this->DR17->CurrentValue;
			$this->DR17->ViewCustomAttributes = "";

			// DR18
			$this->DR18->ViewValue = $this->DR18->CurrentValue;
			$this->DR18->ViewCustomAttributes = "";

			// DR19
			$this->DR19->ViewValue = $this->DR19->CurrentValue;
			$this->DR19->ViewCustomAttributes = "";

			// DR20
			$this->DR20->ViewValue = $this->DR20->CurrentValue;
			$this->DR20->ViewCustomAttributes = "";

			// DR21
			$this->DR21->ViewValue = $this->DR21->CurrentValue;
			$this->DR21->ViewCustomAttributes = "";

			// DR22
			$this->DR22->ViewValue = $this->DR22->CurrentValue;
			$this->DR22->ViewCustomAttributes = "";

			// DR23
			$this->DR23->ViewValue = $this->DR23->CurrentValue;
			$this->DR23->ViewCustomAttributes = "";

			// DR24
			$this->DR24->ViewValue = $this->DR24->CurrentValue;
			$this->DR24->ViewCustomAttributes = "";

			// DR25
			$this->DR25->ViewValue = $this->DR25->CurrentValue;
			$this->DR25->ViewCustomAttributes = "";

			// E214
			$this->E214->ViewValue = $this->E214->CurrentValue;
			$this->E214->ViewCustomAttributes = "";

			// E215
			$this->E215->ViewValue = $this->E215->CurrentValue;
			$this->E215->ViewCustomAttributes = "";

			// E216
			$this->E216->ViewValue = $this->E216->CurrentValue;
			$this->E216->ViewCustomAttributes = "";

			// E217
			$this->E217->ViewValue = $this->E217->CurrentValue;
			$this->E217->ViewCustomAttributes = "";

			// E218
			$this->E218->ViewValue = $this->E218->CurrentValue;
			$this->E218->ViewCustomAttributes = "";

			// E219
			$this->E219->ViewValue = $this->E219->CurrentValue;
			$this->E219->ViewCustomAttributes = "";

			// E220
			$this->E220->ViewValue = $this->E220->CurrentValue;
			$this->E220->ViewCustomAttributes = "";

			// E221
			$this->E221->ViewValue = $this->E221->CurrentValue;
			$this->E221->ViewCustomAttributes = "";

			// E222
			$this->E222->ViewValue = $this->E222->CurrentValue;
			$this->E222->ViewCustomAttributes = "";

			// E223
			$this->E223->ViewValue = $this->E223->CurrentValue;
			$this->E223->ViewCustomAttributes = "";

			// E224
			$this->E224->ViewValue = $this->E224->CurrentValue;
			$this->E224->ViewCustomAttributes = "";

			// E225
			$this->E225->ViewValue = $this->E225->CurrentValue;
			$this->E225->ViewCustomAttributes = "";

			// EEETTTDTE
			$this->EEETTTDTE->ViewValue = $this->EEETTTDTE->CurrentValue;
			$this->EEETTTDTE->ViewValue = FormatDateTime($this->EEETTTDTE->ViewValue, 7);
			$this->EEETTTDTE->ViewCustomAttributes = "";

			// bhcgdate
			$this->bhcgdate->ViewValue = $this->bhcgdate->CurrentValue;
			$this->bhcgdate->ViewValue = FormatDateTime($this->bhcgdate->ViewValue, 7);
			$this->bhcgdate->ViewCustomAttributes = "";

			// TUBAL_PATENCY
			if (strval($this->TUBAL_PATENCY->CurrentValue) != "") {
				$this->TUBAL_PATENCY->ViewValue = $this->TUBAL_PATENCY->optionCaption($this->TUBAL_PATENCY->CurrentValue);
			} else {
				$this->TUBAL_PATENCY->ViewValue = NULL;
			}
			$this->TUBAL_PATENCY->ViewCustomAttributes = "";

			// HSG
			if (strval($this->HSG->CurrentValue) != "") {
				$this->HSG->ViewValue = $this->HSG->optionCaption($this->HSG->CurrentValue);
			} else {
				$this->HSG->ViewValue = NULL;
			}
			$this->HSG->ViewCustomAttributes = "";

			// DHL
			if (strval($this->DHL->CurrentValue) != "") {
				$this->DHL->ViewValue = $this->DHL->optionCaption($this->DHL->CurrentValue);
			} else {
				$this->DHL->ViewValue = NULL;
			}
			$this->DHL->ViewCustomAttributes = "";

			// UTERINE_PROBLEMS
			if (strval($this->UTERINE_PROBLEMS->CurrentValue) != "") {
				$this->UTERINE_PROBLEMS->ViewValue = $this->UTERINE_PROBLEMS->optionCaption($this->UTERINE_PROBLEMS->CurrentValue);
			} else {
				$this->UTERINE_PROBLEMS->ViewValue = NULL;
			}
			$this->UTERINE_PROBLEMS->ViewCustomAttributes = "";

			// W_COMORBIDS
			if (strval($this->W_COMORBIDS->CurrentValue) != "") {
				$this->W_COMORBIDS->ViewValue = $this->W_COMORBIDS->optionCaption($this->W_COMORBIDS->CurrentValue);
			} else {
				$this->W_COMORBIDS->ViewValue = NULL;
			}
			$this->W_COMORBIDS->ViewCustomAttributes = "";

			// H_COMORBIDS
			if (strval($this->H_COMORBIDS->CurrentValue) != "") {
				$this->H_COMORBIDS->ViewValue = $this->H_COMORBIDS->optionCaption($this->H_COMORBIDS->CurrentValue);
			} else {
				$this->H_COMORBIDS->ViewValue = NULL;
			}
			$this->H_COMORBIDS->ViewCustomAttributes = "";

			// SEXUAL_DYSFUNCTION
			if (strval($this->SEXUAL_DYSFUNCTION->CurrentValue) != "") {
				$this->SEXUAL_DYSFUNCTION->ViewValue = $this->SEXUAL_DYSFUNCTION->optionCaption($this->SEXUAL_DYSFUNCTION->CurrentValue);
			} else {
				$this->SEXUAL_DYSFUNCTION->ViewValue = NULL;
			}
			$this->SEXUAL_DYSFUNCTION->ViewCustomAttributes = "";

			// TABLETS
			$this->TABLETS->ViewValue = $this->TABLETS->CurrentValue;
			$this->TABLETS->ViewCustomAttributes = "";

			// FOLLICLE_STATUS
			if (strval($this->FOLLICLE_STATUS->CurrentValue) != "") {
				$this->FOLLICLE_STATUS->ViewValue = $this->FOLLICLE_STATUS->optionCaption($this->FOLLICLE_STATUS->CurrentValue);
			} else {
				$this->FOLLICLE_STATUS->ViewValue = NULL;
			}
			$this->FOLLICLE_STATUS->ViewCustomAttributes = "";

			// NUMBER_OF_IUI
			if (strval($this->NUMBER_OF_IUI->CurrentValue) != "") {
				$this->NUMBER_OF_IUI->ViewValue = $this->NUMBER_OF_IUI->optionCaption($this->NUMBER_OF_IUI->CurrentValue);
			} else {
				$this->NUMBER_OF_IUI->ViewValue = NULL;
			}
			$this->NUMBER_OF_IUI->ViewCustomAttributes = "";

			// PROCEDURE
			if (strval($this->PROCEDURE->CurrentValue) != "") {
				$this->PROCEDURE->ViewValue = $this->PROCEDURE->optionCaption($this->PROCEDURE->CurrentValue);
			} else {
				$this->PROCEDURE->ViewValue = NULL;
			}
			$this->PROCEDURE->ViewCustomAttributes = "";

			// LUTEAL_SUPPORT
			if (strval($this->LUTEAL_SUPPORT->CurrentValue) != "") {
				$this->LUTEAL_SUPPORT->ViewValue = $this->LUTEAL_SUPPORT->optionCaption($this->LUTEAL_SUPPORT->CurrentValue);
			} else {
				$this->LUTEAL_SUPPORT->ViewValue = NULL;
			}
			$this->LUTEAL_SUPPORT->ViewCustomAttributes = "";

			// SPECIFIC_MATERNAL_PROBLEMS
			if (strval($this->SPECIFIC_MATERNAL_PROBLEMS->CurrentValue) != "") {
				$this->SPECIFIC_MATERNAL_PROBLEMS->ViewValue = $this->SPECIFIC_MATERNAL_PROBLEMS->optionCaption($this->SPECIFIC_MATERNAL_PROBLEMS->CurrentValue);
			} else {
				$this->SPECIFIC_MATERNAL_PROBLEMS->ViewValue = NULL;
			}
			$this->SPECIFIC_MATERNAL_PROBLEMS->ViewCustomAttributes = "";

			// ONGOING_PREG
			$this->ONGOING_PREG->ViewValue = $this->ONGOING_PREG->CurrentValue;
			$this->ONGOING_PREG->ViewCustomAttributes = "";

			// EDD_Date
			$this->EDD_Date->ViewValue = $this->EDD_Date->CurrentValue;
			$this->EDD_Date->ViewValue = FormatDateTime($this->EDD_Date->ViewValue, 0);
			$this->EDD_Date->ViewCustomAttributes = "";

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

			// ARTCycle
			$this->ARTCycle->LinkCustomAttributes = "";
			$this->ARTCycle->HrefValue = "";
			$this->ARTCycle->TooltipValue = "";

			// FemaleFactor
			$this->FemaleFactor->LinkCustomAttributes = "";
			$this->FemaleFactor->HrefValue = "";
			$this->FemaleFactor->TooltipValue = "";

			// MaleFactor
			$this->MaleFactor->LinkCustomAttributes = "";
			$this->MaleFactor->HrefValue = "";
			$this->MaleFactor->TooltipValue = "";

			// Protocol
			$this->Protocol->LinkCustomAttributes = "";
			$this->Protocol->HrefValue = "";
			$this->Protocol->TooltipValue = "";

			// SemenFrozen
			$this->SemenFrozen->LinkCustomAttributes = "";
			$this->SemenFrozen->HrefValue = "";
			$this->SemenFrozen->TooltipValue = "";

			// A4ICSICycle
			$this->A4ICSICycle->LinkCustomAttributes = "";
			$this->A4ICSICycle->HrefValue = "";
			$this->A4ICSICycle->TooltipValue = "";

			// TotalICSICycle
			$this->TotalICSICycle->LinkCustomAttributes = "";
			$this->TotalICSICycle->HrefValue = "";
			$this->TotalICSICycle->TooltipValue = "";

			// TypeOfInfertility
			$this->TypeOfInfertility->LinkCustomAttributes = "";
			$this->TypeOfInfertility->HrefValue = "";
			$this->TypeOfInfertility->TooltipValue = "";

			// Duration
			$this->Duration->LinkCustomAttributes = "";
			$this->Duration->HrefValue = "";
			$this->Duration->TooltipValue = "";

			// LMP
			$this->LMP->LinkCustomAttributes = "";
			$this->LMP->HrefValue = "";
			$this->LMP->TooltipValue = "";

			// RelevantHistory
			$this->RelevantHistory->LinkCustomAttributes = "";
			$this->RelevantHistory->HrefValue = "";
			$this->RelevantHistory->TooltipValue = "";

			// IUICycles
			$this->IUICycles->LinkCustomAttributes = "";
			$this->IUICycles->HrefValue = "";
			$this->IUICycles->TooltipValue = "";

			// AFC
			$this->AFC->LinkCustomAttributes = "";
			$this->AFC->HrefValue = "";
			$this->AFC->TooltipValue = "";

			// AMH
			$this->AMH->LinkCustomAttributes = "";
			$this->AMH->HrefValue = "";
			$this->AMH->TooltipValue = "";

			// FBMI
			$this->FBMI->LinkCustomAttributes = "";
			$this->FBMI->HrefValue = "";
			$this->FBMI->TooltipValue = "";

			// MBMI
			$this->MBMI->LinkCustomAttributes = "";
			$this->MBMI->HrefValue = "";
			$this->MBMI->TooltipValue = "";

			// OvarianVolumeRT
			$this->OvarianVolumeRT->LinkCustomAttributes = "";
			$this->OvarianVolumeRT->HrefValue = "";
			$this->OvarianVolumeRT->TooltipValue = "";

			// OvarianVolumeLT
			$this->OvarianVolumeLT->LinkCustomAttributes = "";
			$this->OvarianVolumeLT->HrefValue = "";
			$this->OvarianVolumeLT->TooltipValue = "";

			// DAYSOFSTIMULATION
			$this->DAYSOFSTIMULATION->LinkCustomAttributes = "";
			$this->DAYSOFSTIMULATION->HrefValue = "";
			$this->DAYSOFSTIMULATION->TooltipValue = "";

			// DOSEOFGONADOTROPINS
			$this->DOSEOFGONADOTROPINS->LinkCustomAttributes = "";
			$this->DOSEOFGONADOTROPINS->HrefValue = "";
			$this->DOSEOFGONADOTROPINS->TooltipValue = "";

			// INJTYPE
			$this->INJTYPE->LinkCustomAttributes = "";
			$this->INJTYPE->HrefValue = "";
			$this->INJTYPE->TooltipValue = "";

			// ANTAGONISTDAYS
			$this->ANTAGONISTDAYS->LinkCustomAttributes = "";
			$this->ANTAGONISTDAYS->HrefValue = "";
			$this->ANTAGONISTDAYS->TooltipValue = "";

			// ANTAGONISTSTARTDAY
			$this->ANTAGONISTSTARTDAY->LinkCustomAttributes = "";
			$this->ANTAGONISTSTARTDAY->HrefValue = "";
			$this->ANTAGONISTSTARTDAY->TooltipValue = "";

			// GROWTHHORMONE
			$this->GROWTHHORMONE->LinkCustomAttributes = "";
			$this->GROWTHHORMONE->HrefValue = "";
			$this->GROWTHHORMONE->TooltipValue = "";

			// PRETREATMENT
			$this->PRETREATMENT->LinkCustomAttributes = "";
			$this->PRETREATMENT->HrefValue = "";
			$this->PRETREATMENT->TooltipValue = "";

			// SerumP4
			$this->SerumP4->LinkCustomAttributes = "";
			$this->SerumP4->HrefValue = "";
			$this->SerumP4->TooltipValue = "";

			// FORT
			$this->FORT->LinkCustomAttributes = "";
			$this->FORT->HrefValue = "";
			$this->FORT->TooltipValue = "";

			// MedicalFactors
			$this->MedicalFactors->LinkCustomAttributes = "";
			$this->MedicalFactors->HrefValue = "";
			$this->MedicalFactors->TooltipValue = "";

			// SCDate
			$this->SCDate->LinkCustomAttributes = "";
			$this->SCDate->HrefValue = "";
			$this->SCDate->TooltipValue = "";

			// OvarianSurgery
			$this->OvarianSurgery->LinkCustomAttributes = "";
			$this->OvarianSurgery->HrefValue = "";
			$this->OvarianSurgery->TooltipValue = "";

			// PreProcedureOrder
			$this->PreProcedureOrder->LinkCustomAttributes = "";
			$this->PreProcedureOrder->HrefValue = "";
			$this->PreProcedureOrder->TooltipValue = "";

			// TRIGGERR
			$this->TRIGGERR->LinkCustomAttributes = "";
			$this->TRIGGERR->HrefValue = "";
			$this->TRIGGERR->TooltipValue = "";

			// TRIGGERDATE
			$this->TRIGGERDATE->LinkCustomAttributes = "";
			$this->TRIGGERDATE->HrefValue = "";
			$this->TRIGGERDATE->TooltipValue = "";

			// ATHOMEorCLINIC
			$this->ATHOMEorCLINIC->LinkCustomAttributes = "";
			$this->ATHOMEorCLINIC->HrefValue = "";
			$this->ATHOMEorCLINIC->TooltipValue = "";

			// OPUDATE
			$this->OPUDATE->LinkCustomAttributes = "";
			$this->OPUDATE->HrefValue = "";
			$this->OPUDATE->TooltipValue = "";

			// ALLFREEZEINDICATION
			$this->ALLFREEZEINDICATION->LinkCustomAttributes = "";
			$this->ALLFREEZEINDICATION->HrefValue = "";
			$this->ALLFREEZEINDICATION->TooltipValue = "";

			// ERA
			$this->ERA->LinkCustomAttributes = "";
			$this->ERA->HrefValue = "";
			$this->ERA->TooltipValue = "";

			// PGTA
			$this->PGTA->LinkCustomAttributes = "";
			$this->PGTA->HrefValue = "";
			$this->PGTA->TooltipValue = "";

			// PGD
			$this->PGD->LinkCustomAttributes = "";
			$this->PGD->HrefValue = "";
			$this->PGD->TooltipValue = "";

			// DATEOFET
			$this->DATEOFET->LinkCustomAttributes = "";
			$this->DATEOFET->HrefValue = "";
			$this->DATEOFET->TooltipValue = "";

			// ET
			$this->ET->LinkCustomAttributes = "";
			$this->ET->HrefValue = "";
			$this->ET->TooltipValue = "";

			// ESET
			$this->ESET->LinkCustomAttributes = "";
			$this->ESET->HrefValue = "";
			$this->ESET->TooltipValue = "";

			// DOET
			$this->DOET->LinkCustomAttributes = "";
			$this->DOET->HrefValue = "";
			$this->DOET->TooltipValue = "";

			// SEMENPREPARATION
			$this->SEMENPREPARATION->LinkCustomAttributes = "";
			$this->SEMENPREPARATION->HrefValue = "";
			$this->SEMENPREPARATION->TooltipValue = "";

			// REASONFORESET
			$this->REASONFORESET->LinkCustomAttributes = "";
			$this->REASONFORESET->HrefValue = "";
			$this->REASONFORESET->TooltipValue = "";

			// Expectedoocytes
			$this->Expectedoocytes->LinkCustomAttributes = "";
			$this->Expectedoocytes->HrefValue = "";
			$this->Expectedoocytes->TooltipValue = "";

			// StChDate1
			$this->StChDate1->LinkCustomAttributes = "";
			$this->StChDate1->HrefValue = "";
			$this->StChDate1->TooltipValue = "";

			// StChDate2
			$this->StChDate2->LinkCustomAttributes = "";
			$this->StChDate2->HrefValue = "";
			$this->StChDate2->TooltipValue = "";

			// StChDate3
			$this->StChDate3->LinkCustomAttributes = "";
			$this->StChDate3->HrefValue = "";
			$this->StChDate3->TooltipValue = "";

			// StChDate4
			$this->StChDate4->LinkCustomAttributes = "";
			$this->StChDate4->HrefValue = "";
			$this->StChDate4->TooltipValue = "";

			// StChDate5
			$this->StChDate5->LinkCustomAttributes = "";
			$this->StChDate5->HrefValue = "";
			$this->StChDate5->TooltipValue = "";

			// StChDate6
			$this->StChDate6->LinkCustomAttributes = "";
			$this->StChDate6->HrefValue = "";
			$this->StChDate6->TooltipValue = "";

			// StChDate7
			$this->StChDate7->LinkCustomAttributes = "";
			$this->StChDate7->HrefValue = "";
			$this->StChDate7->TooltipValue = "";

			// StChDate8
			$this->StChDate8->LinkCustomAttributes = "";
			$this->StChDate8->HrefValue = "";
			$this->StChDate8->TooltipValue = "";

			// StChDate9
			$this->StChDate9->LinkCustomAttributes = "";
			$this->StChDate9->HrefValue = "";
			$this->StChDate9->TooltipValue = "";

			// StChDate10
			$this->StChDate10->LinkCustomAttributes = "";
			$this->StChDate10->HrefValue = "";
			$this->StChDate10->TooltipValue = "";

			// StChDate11
			$this->StChDate11->LinkCustomAttributes = "";
			$this->StChDate11->HrefValue = "";
			$this->StChDate11->TooltipValue = "";

			// StChDate12
			$this->StChDate12->LinkCustomAttributes = "";
			$this->StChDate12->HrefValue = "";
			$this->StChDate12->TooltipValue = "";

			// StChDate13
			$this->StChDate13->LinkCustomAttributes = "";
			$this->StChDate13->HrefValue = "";
			$this->StChDate13->TooltipValue = "";

			// CycleDay1
			$this->CycleDay1->LinkCustomAttributes = "";
			$this->CycleDay1->HrefValue = "";
			$this->CycleDay1->TooltipValue = "";

			// CycleDay2
			$this->CycleDay2->LinkCustomAttributes = "";
			$this->CycleDay2->HrefValue = "";
			$this->CycleDay2->TooltipValue = "";

			// CycleDay3
			$this->CycleDay3->LinkCustomAttributes = "";
			$this->CycleDay3->HrefValue = "";
			$this->CycleDay3->TooltipValue = "";

			// CycleDay4
			$this->CycleDay4->LinkCustomAttributes = "";
			$this->CycleDay4->HrefValue = "";
			$this->CycleDay4->TooltipValue = "";

			// CycleDay5
			$this->CycleDay5->LinkCustomAttributes = "";
			$this->CycleDay5->HrefValue = "";
			$this->CycleDay5->TooltipValue = "";

			// CycleDay6
			$this->CycleDay6->LinkCustomAttributes = "";
			$this->CycleDay6->HrefValue = "";
			$this->CycleDay6->TooltipValue = "";

			// CycleDay7
			$this->CycleDay7->LinkCustomAttributes = "";
			$this->CycleDay7->HrefValue = "";
			$this->CycleDay7->TooltipValue = "";

			// CycleDay8
			$this->CycleDay8->LinkCustomAttributes = "";
			$this->CycleDay8->HrefValue = "";
			$this->CycleDay8->TooltipValue = "";

			// CycleDay9
			$this->CycleDay9->LinkCustomAttributes = "";
			$this->CycleDay9->HrefValue = "";
			$this->CycleDay9->TooltipValue = "";

			// CycleDay10
			$this->CycleDay10->LinkCustomAttributes = "";
			$this->CycleDay10->HrefValue = "";
			$this->CycleDay10->TooltipValue = "";

			// CycleDay11
			$this->CycleDay11->LinkCustomAttributes = "";
			$this->CycleDay11->HrefValue = "";
			$this->CycleDay11->TooltipValue = "";

			// CycleDay12
			$this->CycleDay12->LinkCustomAttributes = "";
			$this->CycleDay12->HrefValue = "";
			$this->CycleDay12->TooltipValue = "";

			// CycleDay13
			$this->CycleDay13->LinkCustomAttributes = "";
			$this->CycleDay13->HrefValue = "";
			$this->CycleDay13->TooltipValue = "";

			// StimulationDay1
			$this->StimulationDay1->LinkCustomAttributes = "";
			$this->StimulationDay1->HrefValue = "";
			$this->StimulationDay1->TooltipValue = "";

			// StimulationDay2
			$this->StimulationDay2->LinkCustomAttributes = "";
			$this->StimulationDay2->HrefValue = "";
			$this->StimulationDay2->TooltipValue = "";

			// StimulationDay3
			$this->StimulationDay3->LinkCustomAttributes = "";
			$this->StimulationDay3->HrefValue = "";
			$this->StimulationDay3->TooltipValue = "";

			// StimulationDay4
			$this->StimulationDay4->LinkCustomAttributes = "";
			$this->StimulationDay4->HrefValue = "";
			$this->StimulationDay4->TooltipValue = "";

			// StimulationDay5
			$this->StimulationDay5->LinkCustomAttributes = "";
			$this->StimulationDay5->HrefValue = "";
			$this->StimulationDay5->TooltipValue = "";

			// StimulationDay6
			$this->StimulationDay6->LinkCustomAttributes = "";
			$this->StimulationDay6->HrefValue = "";
			$this->StimulationDay6->TooltipValue = "";

			// StimulationDay7
			$this->StimulationDay7->LinkCustomAttributes = "";
			$this->StimulationDay7->HrefValue = "";
			$this->StimulationDay7->TooltipValue = "";

			// StimulationDay8
			$this->StimulationDay8->LinkCustomAttributes = "";
			$this->StimulationDay8->HrefValue = "";
			$this->StimulationDay8->TooltipValue = "";

			// StimulationDay9
			$this->StimulationDay9->LinkCustomAttributes = "";
			$this->StimulationDay9->HrefValue = "";
			$this->StimulationDay9->TooltipValue = "";

			// StimulationDay10
			$this->StimulationDay10->LinkCustomAttributes = "";
			$this->StimulationDay10->HrefValue = "";
			$this->StimulationDay10->TooltipValue = "";

			// StimulationDay11
			$this->StimulationDay11->LinkCustomAttributes = "";
			$this->StimulationDay11->HrefValue = "";
			$this->StimulationDay11->TooltipValue = "";

			// StimulationDay12
			$this->StimulationDay12->LinkCustomAttributes = "";
			$this->StimulationDay12->HrefValue = "";
			$this->StimulationDay12->TooltipValue = "";

			// StimulationDay13
			$this->StimulationDay13->LinkCustomAttributes = "";
			$this->StimulationDay13->HrefValue = "";
			$this->StimulationDay13->TooltipValue = "";

			// Tablet1
			$this->Tablet1->LinkCustomAttributes = "";
			$this->Tablet1->HrefValue = "";
			$this->Tablet1->TooltipValue = "";

			// Tablet2
			$this->Tablet2->LinkCustomAttributes = "";
			$this->Tablet2->HrefValue = "";
			$this->Tablet2->TooltipValue = "";

			// Tablet3
			$this->Tablet3->LinkCustomAttributes = "";
			$this->Tablet3->HrefValue = "";
			$this->Tablet3->TooltipValue = "";

			// Tablet4
			$this->Tablet4->LinkCustomAttributes = "";
			$this->Tablet4->HrefValue = "";
			$this->Tablet4->TooltipValue = "";

			// Tablet5
			$this->Tablet5->LinkCustomAttributes = "";
			$this->Tablet5->HrefValue = "";
			$this->Tablet5->TooltipValue = "";

			// Tablet6
			$this->Tablet6->LinkCustomAttributes = "";
			$this->Tablet6->HrefValue = "";
			$this->Tablet6->TooltipValue = "";

			// Tablet7
			$this->Tablet7->LinkCustomAttributes = "";
			$this->Tablet7->HrefValue = "";
			$this->Tablet7->TooltipValue = "";

			// Tablet8
			$this->Tablet8->LinkCustomAttributes = "";
			$this->Tablet8->HrefValue = "";
			$this->Tablet8->TooltipValue = "";

			// Tablet9
			$this->Tablet9->LinkCustomAttributes = "";
			$this->Tablet9->HrefValue = "";
			$this->Tablet9->TooltipValue = "";

			// Tablet10
			$this->Tablet10->LinkCustomAttributes = "";
			$this->Tablet10->HrefValue = "";
			$this->Tablet10->TooltipValue = "";

			// Tablet11
			$this->Tablet11->LinkCustomAttributes = "";
			$this->Tablet11->HrefValue = "";
			$this->Tablet11->TooltipValue = "";

			// Tablet12
			$this->Tablet12->LinkCustomAttributes = "";
			$this->Tablet12->HrefValue = "";
			$this->Tablet12->TooltipValue = "";

			// Tablet13
			$this->Tablet13->LinkCustomAttributes = "";
			$this->Tablet13->HrefValue = "";
			$this->Tablet13->TooltipValue = "";

			// RFSH1
			$this->RFSH1->LinkCustomAttributes = "";
			$this->RFSH1->HrefValue = "";
			$this->RFSH1->TooltipValue = "";

			// RFSH2
			$this->RFSH2->LinkCustomAttributes = "";
			$this->RFSH2->HrefValue = "";
			$this->RFSH2->TooltipValue = "";

			// RFSH3
			$this->RFSH3->LinkCustomAttributes = "";
			$this->RFSH3->HrefValue = "";
			$this->RFSH3->TooltipValue = "";

			// RFSH4
			$this->RFSH4->LinkCustomAttributes = "";
			$this->RFSH4->HrefValue = "";
			$this->RFSH4->TooltipValue = "";

			// RFSH5
			$this->RFSH5->LinkCustomAttributes = "";
			$this->RFSH5->HrefValue = "";
			$this->RFSH5->TooltipValue = "";

			// RFSH6
			$this->RFSH6->LinkCustomAttributes = "";
			$this->RFSH6->HrefValue = "";
			$this->RFSH6->TooltipValue = "";

			// RFSH7
			$this->RFSH7->LinkCustomAttributes = "";
			$this->RFSH7->HrefValue = "";
			$this->RFSH7->TooltipValue = "";

			// RFSH8
			$this->RFSH8->LinkCustomAttributes = "";
			$this->RFSH8->HrefValue = "";
			$this->RFSH8->TooltipValue = "";

			// RFSH9
			$this->RFSH9->LinkCustomAttributes = "";
			$this->RFSH9->HrefValue = "";
			$this->RFSH9->TooltipValue = "";

			// RFSH10
			$this->RFSH10->LinkCustomAttributes = "";
			$this->RFSH10->HrefValue = "";
			$this->RFSH10->TooltipValue = "";

			// RFSH11
			$this->RFSH11->LinkCustomAttributes = "";
			$this->RFSH11->HrefValue = "";
			$this->RFSH11->TooltipValue = "";

			// RFSH12
			$this->RFSH12->LinkCustomAttributes = "";
			$this->RFSH12->HrefValue = "";
			$this->RFSH12->TooltipValue = "";

			// RFSH13
			$this->RFSH13->LinkCustomAttributes = "";
			$this->RFSH13->HrefValue = "";
			$this->RFSH13->TooltipValue = "";

			// HMG1
			$this->HMG1->LinkCustomAttributes = "";
			$this->HMG1->HrefValue = "";
			$this->HMG1->TooltipValue = "";

			// HMG2
			$this->HMG2->LinkCustomAttributes = "";
			$this->HMG2->HrefValue = "";
			$this->HMG2->TooltipValue = "";

			// HMG3
			$this->HMG3->LinkCustomAttributes = "";
			$this->HMG3->HrefValue = "";
			$this->HMG3->TooltipValue = "";

			// HMG4
			$this->HMG4->LinkCustomAttributes = "";
			$this->HMG4->HrefValue = "";
			$this->HMG4->TooltipValue = "";

			// HMG5
			$this->HMG5->LinkCustomAttributes = "";
			$this->HMG5->HrefValue = "";
			$this->HMG5->TooltipValue = "";

			// HMG6
			$this->HMG6->LinkCustomAttributes = "";
			$this->HMG6->HrefValue = "";
			$this->HMG6->TooltipValue = "";

			// HMG7
			$this->HMG7->LinkCustomAttributes = "";
			$this->HMG7->HrefValue = "";
			$this->HMG7->TooltipValue = "";

			// HMG8
			$this->HMG8->LinkCustomAttributes = "";
			$this->HMG8->HrefValue = "";
			$this->HMG8->TooltipValue = "";

			// HMG9
			$this->HMG9->LinkCustomAttributes = "";
			$this->HMG9->HrefValue = "";
			$this->HMG9->TooltipValue = "";

			// HMG10
			$this->HMG10->LinkCustomAttributes = "";
			$this->HMG10->HrefValue = "";
			$this->HMG10->TooltipValue = "";

			// HMG11
			$this->HMG11->LinkCustomAttributes = "";
			$this->HMG11->HrefValue = "";
			$this->HMG11->TooltipValue = "";

			// HMG12
			$this->HMG12->LinkCustomAttributes = "";
			$this->HMG12->HrefValue = "";
			$this->HMG12->TooltipValue = "";

			// HMG13
			$this->HMG13->LinkCustomAttributes = "";
			$this->HMG13->HrefValue = "";
			$this->HMG13->TooltipValue = "";

			// GnRH1
			$this->GnRH1->LinkCustomAttributes = "";
			$this->GnRH1->HrefValue = "";
			$this->GnRH1->TooltipValue = "";

			// GnRH2
			$this->GnRH2->LinkCustomAttributes = "";
			$this->GnRH2->HrefValue = "";
			$this->GnRH2->TooltipValue = "";

			// GnRH3
			$this->GnRH3->LinkCustomAttributes = "";
			$this->GnRH3->HrefValue = "";
			$this->GnRH3->TooltipValue = "";

			// GnRH4
			$this->GnRH4->LinkCustomAttributes = "";
			$this->GnRH4->HrefValue = "";
			$this->GnRH4->TooltipValue = "";

			// GnRH5
			$this->GnRH5->LinkCustomAttributes = "";
			$this->GnRH5->HrefValue = "";
			$this->GnRH5->TooltipValue = "";

			// GnRH6
			$this->GnRH6->LinkCustomAttributes = "";
			$this->GnRH6->HrefValue = "";
			$this->GnRH6->TooltipValue = "";

			// GnRH7
			$this->GnRH7->LinkCustomAttributes = "";
			$this->GnRH7->HrefValue = "";
			$this->GnRH7->TooltipValue = "";

			// GnRH8
			$this->GnRH8->LinkCustomAttributes = "";
			$this->GnRH8->HrefValue = "";
			$this->GnRH8->TooltipValue = "";

			// GnRH9
			$this->GnRH9->LinkCustomAttributes = "";
			$this->GnRH9->HrefValue = "";
			$this->GnRH9->TooltipValue = "";

			// GnRH10
			$this->GnRH10->LinkCustomAttributes = "";
			$this->GnRH10->HrefValue = "";
			$this->GnRH10->TooltipValue = "";

			// GnRH11
			$this->GnRH11->LinkCustomAttributes = "";
			$this->GnRH11->HrefValue = "";
			$this->GnRH11->TooltipValue = "";

			// GnRH12
			$this->GnRH12->LinkCustomAttributes = "";
			$this->GnRH12->HrefValue = "";
			$this->GnRH12->TooltipValue = "";

			// GnRH13
			$this->GnRH13->LinkCustomAttributes = "";
			$this->GnRH13->HrefValue = "";
			$this->GnRH13->TooltipValue = "";

			// E21
			$this->E21->LinkCustomAttributes = "";
			$this->E21->HrefValue = "";
			$this->E21->TooltipValue = "";

			// E22
			$this->E22->LinkCustomAttributes = "";
			$this->E22->HrefValue = "";
			$this->E22->TooltipValue = "";

			// E23
			$this->E23->LinkCustomAttributes = "";
			$this->E23->HrefValue = "";
			$this->E23->TooltipValue = "";

			// E24
			$this->E24->LinkCustomAttributes = "";
			$this->E24->HrefValue = "";
			$this->E24->TooltipValue = "";

			// E25
			$this->E25->LinkCustomAttributes = "";
			$this->E25->HrefValue = "";
			$this->E25->TooltipValue = "";

			// E26
			$this->E26->LinkCustomAttributes = "";
			$this->E26->HrefValue = "";
			$this->E26->TooltipValue = "";

			// E27
			$this->E27->LinkCustomAttributes = "";
			$this->E27->HrefValue = "";
			$this->E27->TooltipValue = "";

			// E28
			$this->E28->LinkCustomAttributes = "";
			$this->E28->HrefValue = "";
			$this->E28->TooltipValue = "";

			// E29
			$this->E29->LinkCustomAttributes = "";
			$this->E29->HrefValue = "";
			$this->E29->TooltipValue = "";

			// E210
			$this->E210->LinkCustomAttributes = "";
			$this->E210->HrefValue = "";
			$this->E210->TooltipValue = "";

			// E211
			$this->E211->LinkCustomAttributes = "";
			$this->E211->HrefValue = "";
			$this->E211->TooltipValue = "";

			// E212
			$this->E212->LinkCustomAttributes = "";
			$this->E212->HrefValue = "";
			$this->E212->TooltipValue = "";

			// E213
			$this->E213->LinkCustomAttributes = "";
			$this->E213->HrefValue = "";
			$this->E213->TooltipValue = "";

			// P41
			$this->P41->LinkCustomAttributes = "";
			$this->P41->HrefValue = "";
			$this->P41->TooltipValue = "";

			// P42
			$this->P42->LinkCustomAttributes = "";
			$this->P42->HrefValue = "";
			$this->P42->TooltipValue = "";

			// P43
			$this->P43->LinkCustomAttributes = "";
			$this->P43->HrefValue = "";
			$this->P43->TooltipValue = "";

			// P44
			$this->P44->LinkCustomAttributes = "";
			$this->P44->HrefValue = "";
			$this->P44->TooltipValue = "";

			// P45
			$this->P45->LinkCustomAttributes = "";
			$this->P45->HrefValue = "";
			$this->P45->TooltipValue = "";

			// P46
			$this->P46->LinkCustomAttributes = "";
			$this->P46->HrefValue = "";
			$this->P46->TooltipValue = "";

			// P47
			$this->P47->LinkCustomAttributes = "";
			$this->P47->HrefValue = "";
			$this->P47->TooltipValue = "";

			// P48
			$this->P48->LinkCustomAttributes = "";
			$this->P48->HrefValue = "";
			$this->P48->TooltipValue = "";

			// P49
			$this->P49->LinkCustomAttributes = "";
			$this->P49->HrefValue = "";
			$this->P49->TooltipValue = "";

			// P410
			$this->P410->LinkCustomAttributes = "";
			$this->P410->HrefValue = "";
			$this->P410->TooltipValue = "";

			// P411
			$this->P411->LinkCustomAttributes = "";
			$this->P411->HrefValue = "";
			$this->P411->TooltipValue = "";

			// P412
			$this->P412->LinkCustomAttributes = "";
			$this->P412->HrefValue = "";
			$this->P412->TooltipValue = "";

			// P413
			$this->P413->LinkCustomAttributes = "";
			$this->P413->HrefValue = "";
			$this->P413->TooltipValue = "";

			// USGRt1
			$this->USGRt1->LinkCustomAttributes = "";
			$this->USGRt1->HrefValue = "";
			$this->USGRt1->TooltipValue = "";

			// USGRt2
			$this->USGRt2->LinkCustomAttributes = "";
			$this->USGRt2->HrefValue = "";
			$this->USGRt2->TooltipValue = "";

			// USGRt3
			$this->USGRt3->LinkCustomAttributes = "";
			$this->USGRt3->HrefValue = "";
			$this->USGRt3->TooltipValue = "";

			// USGRt4
			$this->USGRt4->LinkCustomAttributes = "";
			$this->USGRt4->HrefValue = "";
			$this->USGRt4->TooltipValue = "";

			// USGRt5
			$this->USGRt5->LinkCustomAttributes = "";
			$this->USGRt5->HrefValue = "";
			$this->USGRt5->TooltipValue = "";

			// USGRt6
			$this->USGRt6->LinkCustomAttributes = "";
			$this->USGRt6->HrefValue = "";
			$this->USGRt6->TooltipValue = "";

			// USGRt7
			$this->USGRt7->LinkCustomAttributes = "";
			$this->USGRt7->HrefValue = "";
			$this->USGRt7->TooltipValue = "";

			// USGRt8
			$this->USGRt8->LinkCustomAttributes = "";
			$this->USGRt8->HrefValue = "";
			$this->USGRt8->TooltipValue = "";

			// USGRt9
			$this->USGRt9->LinkCustomAttributes = "";
			$this->USGRt9->HrefValue = "";
			$this->USGRt9->TooltipValue = "";

			// USGRt10
			$this->USGRt10->LinkCustomAttributes = "";
			$this->USGRt10->HrefValue = "";
			$this->USGRt10->TooltipValue = "";

			// USGRt11
			$this->USGRt11->LinkCustomAttributes = "";
			$this->USGRt11->HrefValue = "";
			$this->USGRt11->TooltipValue = "";

			// USGRt12
			$this->USGRt12->LinkCustomAttributes = "";
			$this->USGRt12->HrefValue = "";
			$this->USGRt12->TooltipValue = "";

			// USGRt13
			$this->USGRt13->LinkCustomAttributes = "";
			$this->USGRt13->HrefValue = "";
			$this->USGRt13->TooltipValue = "";

			// USGLt1
			$this->USGLt1->LinkCustomAttributes = "";
			$this->USGLt1->HrefValue = "";
			$this->USGLt1->TooltipValue = "";

			// USGLt2
			$this->USGLt2->LinkCustomAttributes = "";
			$this->USGLt2->HrefValue = "";
			$this->USGLt2->TooltipValue = "";

			// USGLt3
			$this->USGLt3->LinkCustomAttributes = "";
			$this->USGLt3->HrefValue = "";
			$this->USGLt3->TooltipValue = "";

			// USGLt4
			$this->USGLt4->LinkCustomAttributes = "";
			$this->USGLt4->HrefValue = "";
			$this->USGLt4->TooltipValue = "";

			// USGLt5
			$this->USGLt5->LinkCustomAttributes = "";
			$this->USGLt5->HrefValue = "";
			$this->USGLt5->TooltipValue = "";

			// USGLt6
			$this->USGLt6->LinkCustomAttributes = "";
			$this->USGLt6->HrefValue = "";
			$this->USGLt6->TooltipValue = "";

			// USGLt7
			$this->USGLt7->LinkCustomAttributes = "";
			$this->USGLt7->HrefValue = "";
			$this->USGLt7->TooltipValue = "";

			// USGLt8
			$this->USGLt8->LinkCustomAttributes = "";
			$this->USGLt8->HrefValue = "";
			$this->USGLt8->TooltipValue = "";

			// USGLt9
			$this->USGLt9->LinkCustomAttributes = "";
			$this->USGLt9->HrefValue = "";
			$this->USGLt9->TooltipValue = "";

			// USGLt10
			$this->USGLt10->LinkCustomAttributes = "";
			$this->USGLt10->HrefValue = "";
			$this->USGLt10->TooltipValue = "";

			// USGLt11
			$this->USGLt11->LinkCustomAttributes = "";
			$this->USGLt11->HrefValue = "";
			$this->USGLt11->TooltipValue = "";

			// USGLt12
			$this->USGLt12->LinkCustomAttributes = "";
			$this->USGLt12->HrefValue = "";
			$this->USGLt12->TooltipValue = "";

			// USGLt13
			$this->USGLt13->LinkCustomAttributes = "";
			$this->USGLt13->HrefValue = "";
			$this->USGLt13->TooltipValue = "";

			// EM1
			$this->EM1->LinkCustomAttributes = "";
			$this->EM1->HrefValue = "";
			$this->EM1->TooltipValue = "";

			// EM2
			$this->EM2->LinkCustomAttributes = "";
			$this->EM2->HrefValue = "";
			$this->EM2->TooltipValue = "";

			// EM3
			$this->EM3->LinkCustomAttributes = "";
			$this->EM3->HrefValue = "";
			$this->EM3->TooltipValue = "";

			// EM4
			$this->EM4->LinkCustomAttributes = "";
			$this->EM4->HrefValue = "";
			$this->EM4->TooltipValue = "";

			// EM5
			$this->EM5->LinkCustomAttributes = "";
			$this->EM5->HrefValue = "";
			$this->EM5->TooltipValue = "";

			// EM6
			$this->EM6->LinkCustomAttributes = "";
			$this->EM6->HrefValue = "";
			$this->EM6->TooltipValue = "";

			// EM7
			$this->EM7->LinkCustomAttributes = "";
			$this->EM7->HrefValue = "";
			$this->EM7->TooltipValue = "";

			// EM8
			$this->EM8->LinkCustomAttributes = "";
			$this->EM8->HrefValue = "";
			$this->EM8->TooltipValue = "";

			// EM9
			$this->EM9->LinkCustomAttributes = "";
			$this->EM9->HrefValue = "";
			$this->EM9->TooltipValue = "";

			// EM10
			$this->EM10->LinkCustomAttributes = "";
			$this->EM10->HrefValue = "";
			$this->EM10->TooltipValue = "";

			// EM11
			$this->EM11->LinkCustomAttributes = "";
			$this->EM11->HrefValue = "";
			$this->EM11->TooltipValue = "";

			// EM12
			$this->EM12->LinkCustomAttributes = "";
			$this->EM12->HrefValue = "";
			$this->EM12->TooltipValue = "";

			// EM13
			$this->EM13->LinkCustomAttributes = "";
			$this->EM13->HrefValue = "";
			$this->EM13->TooltipValue = "";

			// Others1
			$this->Others1->LinkCustomAttributes = "";
			$this->Others1->HrefValue = "";
			$this->Others1->TooltipValue = "";

			// Others2
			$this->Others2->LinkCustomAttributes = "";
			$this->Others2->HrefValue = "";
			$this->Others2->TooltipValue = "";

			// Others3
			$this->Others3->LinkCustomAttributes = "";
			$this->Others3->HrefValue = "";
			$this->Others3->TooltipValue = "";

			// Others4
			$this->Others4->LinkCustomAttributes = "";
			$this->Others4->HrefValue = "";
			$this->Others4->TooltipValue = "";

			// Others5
			$this->Others5->LinkCustomAttributes = "";
			$this->Others5->HrefValue = "";
			$this->Others5->TooltipValue = "";

			// Others6
			$this->Others6->LinkCustomAttributes = "";
			$this->Others6->HrefValue = "";
			$this->Others6->TooltipValue = "";

			// Others7
			$this->Others7->LinkCustomAttributes = "";
			$this->Others7->HrefValue = "";
			$this->Others7->TooltipValue = "";

			// Others8
			$this->Others8->LinkCustomAttributes = "";
			$this->Others8->HrefValue = "";
			$this->Others8->TooltipValue = "";

			// Others9
			$this->Others9->LinkCustomAttributes = "";
			$this->Others9->HrefValue = "";
			$this->Others9->TooltipValue = "";

			// Others10
			$this->Others10->LinkCustomAttributes = "";
			$this->Others10->HrefValue = "";
			$this->Others10->TooltipValue = "";

			// Others11
			$this->Others11->LinkCustomAttributes = "";
			$this->Others11->HrefValue = "";
			$this->Others11->TooltipValue = "";

			// Others12
			$this->Others12->LinkCustomAttributes = "";
			$this->Others12->HrefValue = "";
			$this->Others12->TooltipValue = "";

			// Others13
			$this->Others13->LinkCustomAttributes = "";
			$this->Others13->HrefValue = "";
			$this->Others13->TooltipValue = "";

			// DR1
			$this->DR1->LinkCustomAttributes = "";
			$this->DR1->HrefValue = "";
			$this->DR1->TooltipValue = "";

			// DR2
			$this->DR2->LinkCustomAttributes = "";
			$this->DR2->HrefValue = "";
			$this->DR2->TooltipValue = "";

			// DR3
			$this->DR3->LinkCustomAttributes = "";
			$this->DR3->HrefValue = "";
			$this->DR3->TooltipValue = "";

			// DR4
			$this->DR4->LinkCustomAttributes = "";
			$this->DR4->HrefValue = "";
			$this->DR4->TooltipValue = "";

			// DR5
			$this->DR5->LinkCustomAttributes = "";
			$this->DR5->HrefValue = "";
			$this->DR5->TooltipValue = "";

			// DR6
			$this->DR6->LinkCustomAttributes = "";
			$this->DR6->HrefValue = "";
			$this->DR6->TooltipValue = "";

			// DR7
			$this->DR7->LinkCustomAttributes = "";
			$this->DR7->HrefValue = "";
			$this->DR7->TooltipValue = "";

			// DR8
			$this->DR8->LinkCustomAttributes = "";
			$this->DR8->HrefValue = "";
			$this->DR8->TooltipValue = "";

			// DR9
			$this->DR9->LinkCustomAttributes = "";
			$this->DR9->HrefValue = "";
			$this->DR9->TooltipValue = "";

			// DR10
			$this->DR10->LinkCustomAttributes = "";
			$this->DR10->HrefValue = "";
			$this->DR10->TooltipValue = "";

			// DR11
			$this->DR11->LinkCustomAttributes = "";
			$this->DR11->HrefValue = "";
			$this->DR11->TooltipValue = "";

			// DR12
			$this->DR12->LinkCustomAttributes = "";
			$this->DR12->HrefValue = "";
			$this->DR12->TooltipValue = "";

			// DR13
			$this->DR13->LinkCustomAttributes = "";
			$this->DR13->HrefValue = "";
			$this->DR13->TooltipValue = "";

			// TidNo
			$this->TidNo->LinkCustomAttributes = "";
			$this->TidNo->HrefValue = "";
			$this->TidNo->TooltipValue = "";

			// Convert
			$this->Convert->LinkCustomAttributes = "";
			$this->Convert->HrefValue = "";
			$this->Convert->TooltipValue = "";

			// Consultant
			$this->Consultant->LinkCustomAttributes = "";
			$this->Consultant->HrefValue = "";
			$this->Consultant->TooltipValue = "";

			// InseminatinTechnique
			$this->InseminatinTechnique->LinkCustomAttributes = "";
			$this->InseminatinTechnique->HrefValue = "";
			$this->InseminatinTechnique->TooltipValue = "";

			// IndicationForART
			$this->IndicationForART->LinkCustomAttributes = "";
			$this->IndicationForART->HrefValue = "";
			$this->IndicationForART->TooltipValue = "";

			// Hysteroscopy
			$this->Hysteroscopy->LinkCustomAttributes = "";
			$this->Hysteroscopy->HrefValue = "";
			$this->Hysteroscopy->TooltipValue = "";

			// EndometrialScratching
			$this->EndometrialScratching->LinkCustomAttributes = "";
			$this->EndometrialScratching->HrefValue = "";
			$this->EndometrialScratching->TooltipValue = "";

			// TrialCannulation
			$this->TrialCannulation->LinkCustomAttributes = "";
			$this->TrialCannulation->HrefValue = "";
			$this->TrialCannulation->TooltipValue = "";

			// CYCLETYPE
			$this->CYCLETYPE->LinkCustomAttributes = "";
			$this->CYCLETYPE->HrefValue = "";
			$this->CYCLETYPE->TooltipValue = "";

			// HRTCYCLE
			$this->HRTCYCLE->LinkCustomAttributes = "";
			$this->HRTCYCLE->HrefValue = "";
			$this->HRTCYCLE->TooltipValue = "";

			// OralEstrogenDosage
			$this->OralEstrogenDosage->LinkCustomAttributes = "";
			$this->OralEstrogenDosage->HrefValue = "";
			$this->OralEstrogenDosage->TooltipValue = "";

			// VaginalEstrogen
			$this->VaginalEstrogen->LinkCustomAttributes = "";
			$this->VaginalEstrogen->HrefValue = "";
			$this->VaginalEstrogen->TooltipValue = "";

			// GCSF
			$this->GCSF->LinkCustomAttributes = "";
			$this->GCSF->HrefValue = "";
			$this->GCSF->TooltipValue = "";

			// ActivatedPRP
			$this->ActivatedPRP->LinkCustomAttributes = "";
			$this->ActivatedPRP->HrefValue = "";
			$this->ActivatedPRP->TooltipValue = "";

			// UCLcm
			$this->UCLcm->LinkCustomAttributes = "";
			$this->UCLcm->HrefValue = "";
			$this->UCLcm->TooltipValue = "";

			// DATOFEMBRYOTRANSFER
			$this->DATOFEMBRYOTRANSFER->LinkCustomAttributes = "";
			$this->DATOFEMBRYOTRANSFER->HrefValue = "";
			$this->DATOFEMBRYOTRANSFER->TooltipValue = "";

			// DAYOFEMBRYOTRANSFER
			$this->DAYOFEMBRYOTRANSFER->LinkCustomAttributes = "";
			$this->DAYOFEMBRYOTRANSFER->HrefValue = "";
			$this->DAYOFEMBRYOTRANSFER->TooltipValue = "";

			// NOOFEMBRYOSTHAWED
			$this->NOOFEMBRYOSTHAWED->LinkCustomAttributes = "";
			$this->NOOFEMBRYOSTHAWED->HrefValue = "";
			$this->NOOFEMBRYOSTHAWED->TooltipValue = "";

			// NOOFEMBRYOSTRANSFERRED
			$this->NOOFEMBRYOSTRANSFERRED->LinkCustomAttributes = "";
			$this->NOOFEMBRYOSTRANSFERRED->HrefValue = "";
			$this->NOOFEMBRYOSTRANSFERRED->TooltipValue = "";

			// DAYOFEMBRYOS
			$this->DAYOFEMBRYOS->LinkCustomAttributes = "";
			$this->DAYOFEMBRYOS->HrefValue = "";
			$this->DAYOFEMBRYOS->TooltipValue = "";

			// CRYOPRESERVEDEMBRYOS
			$this->CRYOPRESERVEDEMBRYOS->LinkCustomAttributes = "";
			$this->CRYOPRESERVEDEMBRYOS->HrefValue = "";
			$this->CRYOPRESERVEDEMBRYOS->TooltipValue = "";

			// ViaAdmin
			$this->ViaAdmin->LinkCustomAttributes = "";
			$this->ViaAdmin->HrefValue = "";
			$this->ViaAdmin->TooltipValue = "";

			// ViaStartDateTime
			$this->ViaStartDateTime->LinkCustomAttributes = "";
			$this->ViaStartDateTime->HrefValue = "";
			$this->ViaStartDateTime->TooltipValue = "";

			// ViaDose
			$this->ViaDose->LinkCustomAttributes = "";
			$this->ViaDose->HrefValue = "";
			$this->ViaDose->TooltipValue = "";

			// AllFreeze
			$this->AllFreeze->LinkCustomAttributes = "";
			$this->AllFreeze->HrefValue = "";
			$this->AllFreeze->TooltipValue = "";

			// TreatmentCancel
			$this->TreatmentCancel->LinkCustomAttributes = "";
			$this->TreatmentCancel->HrefValue = "";
			$this->TreatmentCancel->TooltipValue = "";

			// ProgesteroneAdmin
			$this->ProgesteroneAdmin->LinkCustomAttributes = "";
			$this->ProgesteroneAdmin->HrefValue = "";
			$this->ProgesteroneAdmin->TooltipValue = "";

			// ProgesteroneStart
			$this->ProgesteroneStart->LinkCustomAttributes = "";
			$this->ProgesteroneStart->HrefValue = "";
			$this->ProgesteroneStart->TooltipValue = "";

			// ProgesteroneDose
			$this->ProgesteroneDose->LinkCustomAttributes = "";
			$this->ProgesteroneDose->HrefValue = "";
			$this->ProgesteroneDose->TooltipValue = "";

			// StChDate14
			$this->StChDate14->LinkCustomAttributes = "";
			$this->StChDate14->HrefValue = "";
			$this->StChDate14->TooltipValue = "";

			// StChDate15
			$this->StChDate15->LinkCustomAttributes = "";
			$this->StChDate15->HrefValue = "";
			$this->StChDate15->TooltipValue = "";

			// StChDate16
			$this->StChDate16->LinkCustomAttributes = "";
			$this->StChDate16->HrefValue = "";
			$this->StChDate16->TooltipValue = "";

			// StChDate17
			$this->StChDate17->LinkCustomAttributes = "";
			$this->StChDate17->HrefValue = "";
			$this->StChDate17->TooltipValue = "";

			// StChDate18
			$this->StChDate18->LinkCustomAttributes = "";
			$this->StChDate18->HrefValue = "";
			$this->StChDate18->TooltipValue = "";

			// StChDate19
			$this->StChDate19->LinkCustomAttributes = "";
			$this->StChDate19->HrefValue = "";
			$this->StChDate19->TooltipValue = "";

			// StChDate20
			$this->StChDate20->LinkCustomAttributes = "";
			$this->StChDate20->HrefValue = "";
			$this->StChDate20->TooltipValue = "";

			// StChDate21
			$this->StChDate21->LinkCustomAttributes = "";
			$this->StChDate21->HrefValue = "";
			$this->StChDate21->TooltipValue = "";

			// StChDate22
			$this->StChDate22->LinkCustomAttributes = "";
			$this->StChDate22->HrefValue = "";
			$this->StChDate22->TooltipValue = "";

			// StChDate23
			$this->StChDate23->LinkCustomAttributes = "";
			$this->StChDate23->HrefValue = "";
			$this->StChDate23->TooltipValue = "";

			// StChDate24
			$this->StChDate24->LinkCustomAttributes = "";
			$this->StChDate24->HrefValue = "";
			$this->StChDate24->TooltipValue = "";

			// StChDate25
			$this->StChDate25->LinkCustomAttributes = "";
			$this->StChDate25->HrefValue = "";
			$this->StChDate25->TooltipValue = "";

			// CycleDay14
			$this->CycleDay14->LinkCustomAttributes = "";
			$this->CycleDay14->HrefValue = "";
			$this->CycleDay14->TooltipValue = "";

			// CycleDay15
			$this->CycleDay15->LinkCustomAttributes = "";
			$this->CycleDay15->HrefValue = "";
			$this->CycleDay15->TooltipValue = "";

			// CycleDay16
			$this->CycleDay16->LinkCustomAttributes = "";
			$this->CycleDay16->HrefValue = "";
			$this->CycleDay16->TooltipValue = "";

			// CycleDay17
			$this->CycleDay17->LinkCustomAttributes = "";
			$this->CycleDay17->HrefValue = "";
			$this->CycleDay17->TooltipValue = "";

			// CycleDay18
			$this->CycleDay18->LinkCustomAttributes = "";
			$this->CycleDay18->HrefValue = "";
			$this->CycleDay18->TooltipValue = "";

			// CycleDay19
			$this->CycleDay19->LinkCustomAttributes = "";
			$this->CycleDay19->HrefValue = "";
			$this->CycleDay19->TooltipValue = "";

			// CycleDay20
			$this->CycleDay20->LinkCustomAttributes = "";
			$this->CycleDay20->HrefValue = "";
			$this->CycleDay20->TooltipValue = "";

			// CycleDay21
			$this->CycleDay21->LinkCustomAttributes = "";
			$this->CycleDay21->HrefValue = "";
			$this->CycleDay21->TooltipValue = "";

			// CycleDay22
			$this->CycleDay22->LinkCustomAttributes = "";
			$this->CycleDay22->HrefValue = "";
			$this->CycleDay22->TooltipValue = "";

			// CycleDay23
			$this->CycleDay23->LinkCustomAttributes = "";
			$this->CycleDay23->HrefValue = "";
			$this->CycleDay23->TooltipValue = "";

			// CycleDay24
			$this->CycleDay24->LinkCustomAttributes = "";
			$this->CycleDay24->HrefValue = "";
			$this->CycleDay24->TooltipValue = "";

			// CycleDay25
			$this->CycleDay25->LinkCustomAttributes = "";
			$this->CycleDay25->HrefValue = "";
			$this->CycleDay25->TooltipValue = "";

			// StimulationDay14
			$this->StimulationDay14->LinkCustomAttributes = "";
			$this->StimulationDay14->HrefValue = "";
			$this->StimulationDay14->TooltipValue = "";

			// StimulationDay15
			$this->StimulationDay15->LinkCustomAttributes = "";
			$this->StimulationDay15->HrefValue = "";
			$this->StimulationDay15->TooltipValue = "";

			// StimulationDay16
			$this->StimulationDay16->LinkCustomAttributes = "";
			$this->StimulationDay16->HrefValue = "";
			$this->StimulationDay16->TooltipValue = "";

			// StimulationDay17
			$this->StimulationDay17->LinkCustomAttributes = "";
			$this->StimulationDay17->HrefValue = "";
			$this->StimulationDay17->TooltipValue = "";

			// StimulationDay18
			$this->StimulationDay18->LinkCustomAttributes = "";
			$this->StimulationDay18->HrefValue = "";
			$this->StimulationDay18->TooltipValue = "";

			// StimulationDay19
			$this->StimulationDay19->LinkCustomAttributes = "";
			$this->StimulationDay19->HrefValue = "";
			$this->StimulationDay19->TooltipValue = "";

			// StimulationDay20
			$this->StimulationDay20->LinkCustomAttributes = "";
			$this->StimulationDay20->HrefValue = "";
			$this->StimulationDay20->TooltipValue = "";

			// StimulationDay21
			$this->StimulationDay21->LinkCustomAttributes = "";
			$this->StimulationDay21->HrefValue = "";
			$this->StimulationDay21->TooltipValue = "";

			// StimulationDay22
			$this->StimulationDay22->LinkCustomAttributes = "";
			$this->StimulationDay22->HrefValue = "";
			$this->StimulationDay22->TooltipValue = "";

			// StimulationDay23
			$this->StimulationDay23->LinkCustomAttributes = "";
			$this->StimulationDay23->HrefValue = "";
			$this->StimulationDay23->TooltipValue = "";

			// StimulationDay24
			$this->StimulationDay24->LinkCustomAttributes = "";
			$this->StimulationDay24->HrefValue = "";
			$this->StimulationDay24->TooltipValue = "";

			// StimulationDay25
			$this->StimulationDay25->LinkCustomAttributes = "";
			$this->StimulationDay25->HrefValue = "";
			$this->StimulationDay25->TooltipValue = "";

			// Tablet14
			$this->Tablet14->LinkCustomAttributes = "";
			$this->Tablet14->HrefValue = "";
			$this->Tablet14->TooltipValue = "";

			// Tablet15
			$this->Tablet15->LinkCustomAttributes = "";
			$this->Tablet15->HrefValue = "";
			$this->Tablet15->TooltipValue = "";

			// Tablet16
			$this->Tablet16->LinkCustomAttributes = "";
			$this->Tablet16->HrefValue = "";
			$this->Tablet16->TooltipValue = "";

			// Tablet17
			$this->Tablet17->LinkCustomAttributes = "";
			$this->Tablet17->HrefValue = "";
			$this->Tablet17->TooltipValue = "";

			// Tablet18
			$this->Tablet18->LinkCustomAttributes = "";
			$this->Tablet18->HrefValue = "";
			$this->Tablet18->TooltipValue = "";

			// Tablet19
			$this->Tablet19->LinkCustomAttributes = "";
			$this->Tablet19->HrefValue = "";
			$this->Tablet19->TooltipValue = "";

			// Tablet20
			$this->Tablet20->LinkCustomAttributes = "";
			$this->Tablet20->HrefValue = "";
			$this->Tablet20->TooltipValue = "";

			// Tablet21
			$this->Tablet21->LinkCustomAttributes = "";
			$this->Tablet21->HrefValue = "";
			$this->Tablet21->TooltipValue = "";

			// Tablet22
			$this->Tablet22->LinkCustomAttributes = "";
			$this->Tablet22->HrefValue = "";
			$this->Tablet22->TooltipValue = "";

			// Tablet23
			$this->Tablet23->LinkCustomAttributes = "";
			$this->Tablet23->HrefValue = "";
			$this->Tablet23->TooltipValue = "";

			// Tablet24
			$this->Tablet24->LinkCustomAttributes = "";
			$this->Tablet24->HrefValue = "";
			$this->Tablet24->TooltipValue = "";

			// Tablet25
			$this->Tablet25->LinkCustomAttributes = "";
			$this->Tablet25->HrefValue = "";
			$this->Tablet25->TooltipValue = "";

			// RFSH14
			$this->RFSH14->LinkCustomAttributes = "";
			$this->RFSH14->HrefValue = "";
			$this->RFSH14->TooltipValue = "";

			// RFSH15
			$this->RFSH15->LinkCustomAttributes = "";
			$this->RFSH15->HrefValue = "";
			$this->RFSH15->TooltipValue = "";

			// RFSH16
			$this->RFSH16->LinkCustomAttributes = "";
			$this->RFSH16->HrefValue = "";
			$this->RFSH16->TooltipValue = "";

			// RFSH17
			$this->RFSH17->LinkCustomAttributes = "";
			$this->RFSH17->HrefValue = "";
			$this->RFSH17->TooltipValue = "";

			// RFSH18
			$this->RFSH18->LinkCustomAttributes = "";
			$this->RFSH18->HrefValue = "";
			$this->RFSH18->TooltipValue = "";

			// RFSH19
			$this->RFSH19->LinkCustomAttributes = "";
			$this->RFSH19->HrefValue = "";
			$this->RFSH19->TooltipValue = "";

			// RFSH20
			$this->RFSH20->LinkCustomAttributes = "";
			$this->RFSH20->HrefValue = "";
			$this->RFSH20->TooltipValue = "";

			// RFSH21
			$this->RFSH21->LinkCustomAttributes = "";
			$this->RFSH21->HrefValue = "";
			$this->RFSH21->TooltipValue = "";

			// RFSH22
			$this->RFSH22->LinkCustomAttributes = "";
			$this->RFSH22->HrefValue = "";
			$this->RFSH22->TooltipValue = "";

			// RFSH23
			$this->RFSH23->LinkCustomAttributes = "";
			$this->RFSH23->HrefValue = "";
			$this->RFSH23->TooltipValue = "";

			// RFSH24
			$this->RFSH24->LinkCustomAttributes = "";
			$this->RFSH24->HrefValue = "";
			$this->RFSH24->TooltipValue = "";

			// RFSH25
			$this->RFSH25->LinkCustomAttributes = "";
			$this->RFSH25->HrefValue = "";
			$this->RFSH25->TooltipValue = "";

			// HMG14
			$this->HMG14->LinkCustomAttributes = "";
			$this->HMG14->HrefValue = "";
			$this->HMG14->TooltipValue = "";

			// HMG15
			$this->HMG15->LinkCustomAttributes = "";
			$this->HMG15->HrefValue = "";
			$this->HMG15->TooltipValue = "";

			// HMG16
			$this->HMG16->LinkCustomAttributes = "";
			$this->HMG16->HrefValue = "";
			$this->HMG16->TooltipValue = "";

			// HMG17
			$this->HMG17->LinkCustomAttributes = "";
			$this->HMG17->HrefValue = "";
			$this->HMG17->TooltipValue = "";

			// HMG18
			$this->HMG18->LinkCustomAttributes = "";
			$this->HMG18->HrefValue = "";
			$this->HMG18->TooltipValue = "";

			// HMG19
			$this->HMG19->LinkCustomAttributes = "";
			$this->HMG19->HrefValue = "";
			$this->HMG19->TooltipValue = "";

			// HMG20
			$this->HMG20->LinkCustomAttributes = "";
			$this->HMG20->HrefValue = "";
			$this->HMG20->TooltipValue = "";

			// HMG21
			$this->HMG21->LinkCustomAttributes = "";
			$this->HMG21->HrefValue = "";
			$this->HMG21->TooltipValue = "";

			// HMG22
			$this->HMG22->LinkCustomAttributes = "";
			$this->HMG22->HrefValue = "";
			$this->HMG22->TooltipValue = "";

			// HMG23
			$this->HMG23->LinkCustomAttributes = "";
			$this->HMG23->HrefValue = "";
			$this->HMG23->TooltipValue = "";

			// HMG24
			$this->HMG24->LinkCustomAttributes = "";
			$this->HMG24->HrefValue = "";
			$this->HMG24->TooltipValue = "";

			// HMG25
			$this->HMG25->LinkCustomAttributes = "";
			$this->HMG25->HrefValue = "";
			$this->HMG25->TooltipValue = "";

			// GnRH14
			$this->GnRH14->LinkCustomAttributes = "";
			$this->GnRH14->HrefValue = "";
			$this->GnRH14->TooltipValue = "";

			// GnRH15
			$this->GnRH15->LinkCustomAttributes = "";
			$this->GnRH15->HrefValue = "";
			$this->GnRH15->TooltipValue = "";

			// GnRH16
			$this->GnRH16->LinkCustomAttributes = "";
			$this->GnRH16->HrefValue = "";
			$this->GnRH16->TooltipValue = "";

			// GnRH17
			$this->GnRH17->LinkCustomAttributes = "";
			$this->GnRH17->HrefValue = "";
			$this->GnRH17->TooltipValue = "";

			// GnRH18
			$this->GnRH18->LinkCustomAttributes = "";
			$this->GnRH18->HrefValue = "";
			$this->GnRH18->TooltipValue = "";

			// GnRH19
			$this->GnRH19->LinkCustomAttributes = "";
			$this->GnRH19->HrefValue = "";
			$this->GnRH19->TooltipValue = "";

			// GnRH20
			$this->GnRH20->LinkCustomAttributes = "";
			$this->GnRH20->HrefValue = "";
			$this->GnRH20->TooltipValue = "";

			// GnRH21
			$this->GnRH21->LinkCustomAttributes = "";
			$this->GnRH21->HrefValue = "";
			$this->GnRH21->TooltipValue = "";

			// GnRH22
			$this->GnRH22->LinkCustomAttributes = "";
			$this->GnRH22->HrefValue = "";
			$this->GnRH22->TooltipValue = "";

			// GnRH23
			$this->GnRH23->LinkCustomAttributes = "";
			$this->GnRH23->HrefValue = "";
			$this->GnRH23->TooltipValue = "";

			// GnRH24
			$this->GnRH24->LinkCustomAttributes = "";
			$this->GnRH24->HrefValue = "";
			$this->GnRH24->TooltipValue = "";

			// GnRH25
			$this->GnRH25->LinkCustomAttributes = "";
			$this->GnRH25->HrefValue = "";
			$this->GnRH25->TooltipValue = "";

			// P414
			$this->P414->LinkCustomAttributes = "";
			$this->P414->HrefValue = "";
			$this->P414->TooltipValue = "";

			// P415
			$this->P415->LinkCustomAttributes = "";
			$this->P415->HrefValue = "";
			$this->P415->TooltipValue = "";

			// P416
			$this->P416->LinkCustomAttributes = "";
			$this->P416->HrefValue = "";
			$this->P416->TooltipValue = "";

			// P417
			$this->P417->LinkCustomAttributes = "";
			$this->P417->HrefValue = "";
			$this->P417->TooltipValue = "";

			// P418
			$this->P418->LinkCustomAttributes = "";
			$this->P418->HrefValue = "";
			$this->P418->TooltipValue = "";

			// P419
			$this->P419->LinkCustomAttributes = "";
			$this->P419->HrefValue = "";
			$this->P419->TooltipValue = "";

			// P420
			$this->P420->LinkCustomAttributes = "";
			$this->P420->HrefValue = "";
			$this->P420->TooltipValue = "";

			// P421
			$this->P421->LinkCustomAttributes = "";
			$this->P421->HrefValue = "";
			$this->P421->TooltipValue = "";

			// P422
			$this->P422->LinkCustomAttributes = "";
			$this->P422->HrefValue = "";
			$this->P422->TooltipValue = "";

			// P423
			$this->P423->LinkCustomAttributes = "";
			$this->P423->HrefValue = "";
			$this->P423->TooltipValue = "";

			// P424
			$this->P424->LinkCustomAttributes = "";
			$this->P424->HrefValue = "";
			$this->P424->TooltipValue = "";

			// P425
			$this->P425->LinkCustomAttributes = "";
			$this->P425->HrefValue = "";
			$this->P425->TooltipValue = "";

			// USGRt14
			$this->USGRt14->LinkCustomAttributes = "";
			$this->USGRt14->HrefValue = "";
			$this->USGRt14->TooltipValue = "";

			// USGRt15
			$this->USGRt15->LinkCustomAttributes = "";
			$this->USGRt15->HrefValue = "";
			$this->USGRt15->TooltipValue = "";

			// USGRt16
			$this->USGRt16->LinkCustomAttributes = "";
			$this->USGRt16->HrefValue = "";
			$this->USGRt16->TooltipValue = "";

			// USGRt17
			$this->USGRt17->LinkCustomAttributes = "";
			$this->USGRt17->HrefValue = "";
			$this->USGRt17->TooltipValue = "";

			// USGRt18
			$this->USGRt18->LinkCustomAttributes = "";
			$this->USGRt18->HrefValue = "";
			$this->USGRt18->TooltipValue = "";

			// USGRt19
			$this->USGRt19->LinkCustomAttributes = "";
			$this->USGRt19->HrefValue = "";
			$this->USGRt19->TooltipValue = "";

			// USGRt20
			$this->USGRt20->LinkCustomAttributes = "";
			$this->USGRt20->HrefValue = "";
			$this->USGRt20->TooltipValue = "";

			// USGRt21
			$this->USGRt21->LinkCustomAttributes = "";
			$this->USGRt21->HrefValue = "";
			$this->USGRt21->TooltipValue = "";

			// USGRt22
			$this->USGRt22->LinkCustomAttributes = "";
			$this->USGRt22->HrefValue = "";
			$this->USGRt22->TooltipValue = "";

			// USGRt23
			$this->USGRt23->LinkCustomAttributes = "";
			$this->USGRt23->HrefValue = "";
			$this->USGRt23->TooltipValue = "";

			// USGRt24
			$this->USGRt24->LinkCustomAttributes = "";
			$this->USGRt24->HrefValue = "";
			$this->USGRt24->TooltipValue = "";

			// USGRt25
			$this->USGRt25->LinkCustomAttributes = "";
			$this->USGRt25->HrefValue = "";
			$this->USGRt25->TooltipValue = "";

			// USGLt14
			$this->USGLt14->LinkCustomAttributes = "";
			$this->USGLt14->HrefValue = "";
			$this->USGLt14->TooltipValue = "";

			// USGLt15
			$this->USGLt15->LinkCustomAttributes = "";
			$this->USGLt15->HrefValue = "";
			$this->USGLt15->TooltipValue = "";

			// USGLt16
			$this->USGLt16->LinkCustomAttributes = "";
			$this->USGLt16->HrefValue = "";
			$this->USGLt16->TooltipValue = "";

			// USGLt17
			$this->USGLt17->LinkCustomAttributes = "";
			$this->USGLt17->HrefValue = "";
			$this->USGLt17->TooltipValue = "";

			// USGLt18
			$this->USGLt18->LinkCustomAttributes = "";
			$this->USGLt18->HrefValue = "";
			$this->USGLt18->TooltipValue = "";

			// USGLt19
			$this->USGLt19->LinkCustomAttributes = "";
			$this->USGLt19->HrefValue = "";
			$this->USGLt19->TooltipValue = "";

			// USGLt20
			$this->USGLt20->LinkCustomAttributes = "";
			$this->USGLt20->HrefValue = "";
			$this->USGLt20->TooltipValue = "";

			// USGLt21
			$this->USGLt21->LinkCustomAttributes = "";
			$this->USGLt21->HrefValue = "";
			$this->USGLt21->TooltipValue = "";

			// USGLt22
			$this->USGLt22->LinkCustomAttributes = "";
			$this->USGLt22->HrefValue = "";
			$this->USGLt22->TooltipValue = "";

			// USGLt23
			$this->USGLt23->LinkCustomAttributes = "";
			$this->USGLt23->HrefValue = "";
			$this->USGLt23->TooltipValue = "";

			// USGLt24
			$this->USGLt24->LinkCustomAttributes = "";
			$this->USGLt24->HrefValue = "";
			$this->USGLt24->TooltipValue = "";

			// USGLt25
			$this->USGLt25->LinkCustomAttributes = "";
			$this->USGLt25->HrefValue = "";
			$this->USGLt25->TooltipValue = "";

			// EM14
			$this->EM14->LinkCustomAttributes = "";
			$this->EM14->HrefValue = "";
			$this->EM14->TooltipValue = "";

			// EM15
			$this->EM15->LinkCustomAttributes = "";
			$this->EM15->HrefValue = "";
			$this->EM15->TooltipValue = "";

			// EM16
			$this->EM16->LinkCustomAttributes = "";
			$this->EM16->HrefValue = "";
			$this->EM16->TooltipValue = "";

			// EM17
			$this->EM17->LinkCustomAttributes = "";
			$this->EM17->HrefValue = "";
			$this->EM17->TooltipValue = "";

			// EM18
			$this->EM18->LinkCustomAttributes = "";
			$this->EM18->HrefValue = "";
			$this->EM18->TooltipValue = "";

			// EM19
			$this->EM19->LinkCustomAttributes = "";
			$this->EM19->HrefValue = "";
			$this->EM19->TooltipValue = "";

			// EM20
			$this->EM20->LinkCustomAttributes = "";
			$this->EM20->HrefValue = "";
			$this->EM20->TooltipValue = "";

			// EM21
			$this->EM21->LinkCustomAttributes = "";
			$this->EM21->HrefValue = "";
			$this->EM21->TooltipValue = "";

			// EM22
			$this->EM22->LinkCustomAttributes = "";
			$this->EM22->HrefValue = "";
			$this->EM22->TooltipValue = "";

			// EM23
			$this->EM23->LinkCustomAttributes = "";
			$this->EM23->HrefValue = "";
			$this->EM23->TooltipValue = "";

			// EM24
			$this->EM24->LinkCustomAttributes = "";
			$this->EM24->HrefValue = "";
			$this->EM24->TooltipValue = "";

			// EM25
			$this->EM25->LinkCustomAttributes = "";
			$this->EM25->HrefValue = "";
			$this->EM25->TooltipValue = "";

			// Others14
			$this->Others14->LinkCustomAttributes = "";
			$this->Others14->HrefValue = "";
			$this->Others14->TooltipValue = "";

			// Others15
			$this->Others15->LinkCustomAttributes = "";
			$this->Others15->HrefValue = "";
			$this->Others15->TooltipValue = "";

			// Others16
			$this->Others16->LinkCustomAttributes = "";
			$this->Others16->HrefValue = "";
			$this->Others16->TooltipValue = "";

			// Others17
			$this->Others17->LinkCustomAttributes = "";
			$this->Others17->HrefValue = "";
			$this->Others17->TooltipValue = "";

			// Others18
			$this->Others18->LinkCustomAttributes = "";
			$this->Others18->HrefValue = "";
			$this->Others18->TooltipValue = "";

			// Others19
			$this->Others19->LinkCustomAttributes = "";
			$this->Others19->HrefValue = "";
			$this->Others19->TooltipValue = "";

			// Others20
			$this->Others20->LinkCustomAttributes = "";
			$this->Others20->HrefValue = "";
			$this->Others20->TooltipValue = "";

			// Others21
			$this->Others21->LinkCustomAttributes = "";
			$this->Others21->HrefValue = "";
			$this->Others21->TooltipValue = "";

			// Others22
			$this->Others22->LinkCustomAttributes = "";
			$this->Others22->HrefValue = "";
			$this->Others22->TooltipValue = "";

			// Others23
			$this->Others23->LinkCustomAttributes = "";
			$this->Others23->HrefValue = "";
			$this->Others23->TooltipValue = "";

			// Others24
			$this->Others24->LinkCustomAttributes = "";
			$this->Others24->HrefValue = "";
			$this->Others24->TooltipValue = "";

			// Others25
			$this->Others25->LinkCustomAttributes = "";
			$this->Others25->HrefValue = "";
			$this->Others25->TooltipValue = "";

			// DR14
			$this->DR14->LinkCustomAttributes = "";
			$this->DR14->HrefValue = "";
			$this->DR14->TooltipValue = "";

			// DR15
			$this->DR15->LinkCustomAttributes = "";
			$this->DR15->HrefValue = "";
			$this->DR15->TooltipValue = "";

			// DR16
			$this->DR16->LinkCustomAttributes = "";
			$this->DR16->HrefValue = "";
			$this->DR16->TooltipValue = "";

			// DR17
			$this->DR17->LinkCustomAttributes = "";
			$this->DR17->HrefValue = "";
			$this->DR17->TooltipValue = "";

			// DR18
			$this->DR18->LinkCustomAttributes = "";
			$this->DR18->HrefValue = "";
			$this->DR18->TooltipValue = "";

			// DR19
			$this->DR19->LinkCustomAttributes = "";
			$this->DR19->HrefValue = "";
			$this->DR19->TooltipValue = "";

			// DR20
			$this->DR20->LinkCustomAttributes = "";
			$this->DR20->HrefValue = "";
			$this->DR20->TooltipValue = "";

			// DR21
			$this->DR21->LinkCustomAttributes = "";
			$this->DR21->HrefValue = "";
			$this->DR21->TooltipValue = "";

			// DR22
			$this->DR22->LinkCustomAttributes = "";
			$this->DR22->HrefValue = "";
			$this->DR22->TooltipValue = "";

			// DR23
			$this->DR23->LinkCustomAttributes = "";
			$this->DR23->HrefValue = "";
			$this->DR23->TooltipValue = "";

			// DR24
			$this->DR24->LinkCustomAttributes = "";
			$this->DR24->HrefValue = "";
			$this->DR24->TooltipValue = "";

			// DR25
			$this->DR25->LinkCustomAttributes = "";
			$this->DR25->HrefValue = "";
			$this->DR25->TooltipValue = "";

			// E214
			$this->E214->LinkCustomAttributes = "";
			$this->E214->HrefValue = "";
			$this->E214->TooltipValue = "";

			// E215
			$this->E215->LinkCustomAttributes = "";
			$this->E215->HrefValue = "";
			$this->E215->TooltipValue = "";

			// E216
			$this->E216->LinkCustomAttributes = "";
			$this->E216->HrefValue = "";
			$this->E216->TooltipValue = "";

			// E217
			$this->E217->LinkCustomAttributes = "";
			$this->E217->HrefValue = "";
			$this->E217->TooltipValue = "";

			// E218
			$this->E218->LinkCustomAttributes = "";
			$this->E218->HrefValue = "";
			$this->E218->TooltipValue = "";

			// E219
			$this->E219->LinkCustomAttributes = "";
			$this->E219->HrefValue = "";
			$this->E219->TooltipValue = "";

			// E220
			$this->E220->LinkCustomAttributes = "";
			$this->E220->HrefValue = "";
			$this->E220->TooltipValue = "";

			// E221
			$this->E221->LinkCustomAttributes = "";
			$this->E221->HrefValue = "";
			$this->E221->TooltipValue = "";

			// E222
			$this->E222->LinkCustomAttributes = "";
			$this->E222->HrefValue = "";
			$this->E222->TooltipValue = "";

			// E223
			$this->E223->LinkCustomAttributes = "";
			$this->E223->HrefValue = "";
			$this->E223->TooltipValue = "";

			// E224
			$this->E224->LinkCustomAttributes = "";
			$this->E224->HrefValue = "";
			$this->E224->TooltipValue = "";

			// E225
			$this->E225->LinkCustomAttributes = "";
			$this->E225->HrefValue = "";
			$this->E225->TooltipValue = "";

			// EEETTTDTE
			$this->EEETTTDTE->LinkCustomAttributes = "";
			$this->EEETTTDTE->HrefValue = "";
			$this->EEETTTDTE->TooltipValue = "";

			// bhcgdate
			$this->bhcgdate->LinkCustomAttributes = "";
			$this->bhcgdate->HrefValue = "";
			$this->bhcgdate->TooltipValue = "";

			// TUBAL_PATENCY
			$this->TUBAL_PATENCY->LinkCustomAttributes = "";
			$this->TUBAL_PATENCY->HrefValue = "";
			$this->TUBAL_PATENCY->TooltipValue = "";

			// HSG
			$this->HSG->LinkCustomAttributes = "";
			$this->HSG->HrefValue = "";
			$this->HSG->TooltipValue = "";

			// DHL
			$this->DHL->LinkCustomAttributes = "";
			$this->DHL->HrefValue = "";
			$this->DHL->TooltipValue = "";

			// UTERINE_PROBLEMS
			$this->UTERINE_PROBLEMS->LinkCustomAttributes = "";
			$this->UTERINE_PROBLEMS->HrefValue = "";
			$this->UTERINE_PROBLEMS->TooltipValue = "";

			// W_COMORBIDS
			$this->W_COMORBIDS->LinkCustomAttributes = "";
			$this->W_COMORBIDS->HrefValue = "";
			$this->W_COMORBIDS->TooltipValue = "";

			// H_COMORBIDS
			$this->H_COMORBIDS->LinkCustomAttributes = "";
			$this->H_COMORBIDS->HrefValue = "";
			$this->H_COMORBIDS->TooltipValue = "";

			// SEXUAL_DYSFUNCTION
			$this->SEXUAL_DYSFUNCTION->LinkCustomAttributes = "";
			$this->SEXUAL_DYSFUNCTION->HrefValue = "";
			$this->SEXUAL_DYSFUNCTION->TooltipValue = "";

			// TABLETS
			$this->TABLETS->LinkCustomAttributes = "";
			$this->TABLETS->HrefValue = "";
			$this->TABLETS->TooltipValue = "";

			// FOLLICLE_STATUS
			$this->FOLLICLE_STATUS->LinkCustomAttributes = "";
			$this->FOLLICLE_STATUS->HrefValue = "";
			$this->FOLLICLE_STATUS->TooltipValue = "";

			// NUMBER_OF_IUI
			$this->NUMBER_OF_IUI->LinkCustomAttributes = "";
			$this->NUMBER_OF_IUI->HrefValue = "";
			$this->NUMBER_OF_IUI->TooltipValue = "";

			// PROCEDURE
			$this->PROCEDURE->LinkCustomAttributes = "";
			$this->PROCEDURE->HrefValue = "";
			$this->PROCEDURE->TooltipValue = "";

			// LUTEAL_SUPPORT
			$this->LUTEAL_SUPPORT->LinkCustomAttributes = "";
			$this->LUTEAL_SUPPORT->HrefValue = "";
			$this->LUTEAL_SUPPORT->TooltipValue = "";

			// SPECIFIC_MATERNAL_PROBLEMS
			$this->SPECIFIC_MATERNAL_PROBLEMS->LinkCustomAttributes = "";
			$this->SPECIFIC_MATERNAL_PROBLEMS->HrefValue = "";
			$this->SPECIFIC_MATERNAL_PROBLEMS->TooltipValue = "";

			// ONGOING_PREG
			$this->ONGOING_PREG->LinkCustomAttributes = "";
			$this->ONGOING_PREG->HrefValue = "";
			$this->ONGOING_PREG->TooltipValue = "";

			// EDD_Date
			$this->EDD_Date->LinkCustomAttributes = "";
			$this->EDD_Date->HrefValue = "";
			$this->EDD_Date->TooltipValue = "";
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
				return "<a href=\"#\" class=\"ew-export-link ew-excel\" title=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" onclick=\"return ew.export(document.fivf_stimulation_chartlist, '" . $this->ExportExcelUrl . "', 'excel', true);\">" . $Language->phrase("ExportToExcel") . "</a>";
			else
				return "<a href=\"" . $this->ExportExcelUrl . "\" class=\"ew-export-link ew-excel\" title=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\">" . $Language->phrase("ExportToExcel") . "</a>";
		} elseif (SameText($type, "word")) {
			if ($custom)
				return "<a href=\"#\" class=\"ew-export-link ew-word\" title=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" onclick=\"return ew.export(document.fivf_stimulation_chartlist, '" . $this->ExportWordUrl . "', 'word', true);\">" . $Language->phrase("ExportToWord") . "</a>";
			else
				return "<a href=\"" . $this->ExportWordUrl . "\" class=\"ew-export-link ew-word\" title=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\">" . $Language->phrase("ExportToWord") . "</a>";
		} elseif (SameText($type, "pdf")) {
			if ($custom)
				return "<a href=\"#\" class=\"ew-export-link ew-pdf\" title=\"" . HtmlEncode($Language->phrase("ExportToPDFText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToPDFText")) . "\" onclick=\"return ew.export(document.fivf_stimulation_chartlist, '" . $this->ExportPdfUrl . "', 'pdf', true);\">" . $Language->phrase("ExportToPDF") . "</a>";
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
			return '<button id="emf_ivf_stimulation_chart" class="ew-export-link ew-email" title="' . $Language->phrase("ExportToEmailText") . '" data-caption="' . $Language->phrase("ExportToEmailText") . '" onclick="ew.emailDialogShow({lnk:\'emf_ivf_stimulation_chart\', hdr:ew.language.phrase(\'ExportToEmailText\'), f:document.fivf_stimulation_chartlist, sel:false' . $url . '});">' . $Language->phrase("ExportToEmail") . '</button>';
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
		$item->Body = "<a class=\"btn btn-default ew-search-toggle" . $searchToggleClass . "\" href=\"#\" role=\"button\" title=\"" . $Language->phrase("SearchPanel") . "\" data-caption=\"" . $Language->phrase("SearchPanel") . "\" data-toggle=\"button\" data-form=\"fivf_stimulation_chartlistsrch\" aria-pressed=\"" . ($searchToggleClass == " active" ? "true" : "false") . "\">" . $Language->phrase("SearchLink") . "</a>";
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
		if (Config("EXPORT_MASTER_RECORD") && $this->getMasterFilter() != "" && $this->getCurrentMasterTable() == "ivf_treatment_plan") {
			global $ivf_treatment_plan;
			if (!isset($ivf_treatment_plan))
				$ivf_treatment_plan = new ivf_treatment_plan();
			$rsmaster = $ivf_treatment_plan->loadRs($this->DbMasterFilter); // Load master record
			if ($rsmaster && !$rsmaster->EOF) {
				$exportStyle = $doc->Style;
				$doc->setStyle("v"); // Change to vertical
				if (!$this->isExport("csv") || Config("EXPORT_MASTER_RECORD_FOR_CSV")) {
					$doc->Table = &$ivf_treatment_plan;
					$ivf_treatment_plan->exportDocument($doc, $rsmaster);
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
			if ($masterTblVar == "ivf_treatment_plan") {
				$validMaster = TRUE;
				if (($parm = Get("fk_RIDNO", Get("RIDNo"))) !== NULL) {
					$GLOBALS["ivf_treatment_plan"]->RIDNO->setQueryStringValue($parm);
					$this->RIDNo->setQueryStringValue($GLOBALS["ivf_treatment_plan"]->RIDNO->QueryStringValue);
					$this->RIDNo->setSessionValue($this->RIDNo->QueryStringValue);
					if (!is_numeric($GLOBALS["ivf_treatment_plan"]->RIDNO->QueryStringValue))
						$validMaster = FALSE;
				} else {
					$validMaster = FALSE;
				}
				if (($parm = Get("fk_Name", Get("Name"))) !== NULL) {
					$GLOBALS["ivf_treatment_plan"]->Name->setQueryStringValue($parm);
					$this->Name->setQueryStringValue($GLOBALS["ivf_treatment_plan"]->Name->QueryStringValue);
					$this->Name->setSessionValue($this->Name->QueryStringValue);
				} else {
					$validMaster = FALSE;
				}
				if (($parm = Get("fk_id", Get("TidNo"))) !== NULL) {
					$GLOBALS["ivf_treatment_plan"]->id->setQueryStringValue($parm);
					$this->TidNo->setQueryStringValue($GLOBALS["ivf_treatment_plan"]->id->QueryStringValue);
					$this->TidNo->setSessionValue($this->TidNo->QueryStringValue);
					if (!is_numeric($GLOBALS["ivf_treatment_plan"]->id->QueryStringValue))
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
			if ($masterTblVar == "ivf_treatment_plan") {
				$validMaster = TRUE;
				if (($parm = Post("fk_RIDNO", Post("RIDNo"))) !== NULL) {
					$GLOBALS["ivf_treatment_plan"]->RIDNO->setFormValue($parm);
					$this->RIDNo->setFormValue($GLOBALS["ivf_treatment_plan"]->RIDNO->FormValue);
					$this->RIDNo->setSessionValue($this->RIDNo->FormValue);
					if (!is_numeric($GLOBALS["ivf_treatment_plan"]->RIDNO->FormValue))
						$validMaster = FALSE;
				} else {
					$validMaster = FALSE;
				}
				if (($parm = Post("fk_Name", Post("Name"))) !== NULL) {
					$GLOBALS["ivf_treatment_plan"]->Name->setFormValue($parm);
					$this->Name->setFormValue($GLOBALS["ivf_treatment_plan"]->Name->FormValue);
					$this->Name->setSessionValue($this->Name->FormValue);
				} else {
					$validMaster = FALSE;
				}
				if (($parm = Post("fk_id", Post("TidNo"))) !== NULL) {
					$GLOBALS["ivf_treatment_plan"]->id->setFormValue($parm);
					$this->TidNo->setFormValue($GLOBALS["ivf_treatment_plan"]->id->FormValue);
					$this->TidNo->setSessionValue($this->TidNo->FormValue);
					if (!is_numeric($GLOBALS["ivf_treatment_plan"]->id->FormValue))
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
			if ($masterTblVar != "ivf_treatment_plan") {
				if ($this->RIDNo->CurrentValue == "")
					$this->RIDNo->setSessionValue("");
				if ($this->Name->CurrentValue == "")
					$this->Name->setSessionValue("");
				if ($this->TidNo->CurrentValue == "")
					$this->TidNo->setSessionValue("");
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
				case "x_ARTCycle":
					break;
				case "x_FemaleFactor":
					break;
				case "x_MaleFactor":
					break;
				case "x_Protocol":
					break;
				case "x_SemenFrozen":
					break;
				case "x_A4ICSICycle":
					break;
				case "x_TotalICSICycle":
					break;
				case "x_TypeOfInfertility":
					break;
				case "x_INJTYPE":
					break;
				case "x_ANTAGONISTSTARTDAY":
					break;
				case "x_PRETREATMENT":
					break;
				case "x_MedicalFactors":
					break;
				case "x_TRIGGERR":
					break;
				case "x_ALLFREEZEINDICATION":
					break;
				case "x_ERA":
					break;
				case "x_ET":
					break;
				case "x_SEMENPREPARATION":
					break;
				case "x_REASONFORESET":
					break;
				case "x_Tablet1":
					break;
				case "x_Tablet2":
					break;
				case "x_Tablet3":
					break;
				case "x_Tablet4":
					break;
				case "x_Tablet5":
					break;
				case "x_Tablet6":
					break;
				case "x_Tablet7":
					break;
				case "x_Tablet8":
					break;
				case "x_Tablet9":
					break;
				case "x_Tablet10":
					break;
				case "x_Tablet11":
					break;
				case "x_Tablet12":
					break;
				case "x_Tablet13":
					break;
				case "x_RFSH1":
					break;
				case "x_RFSH2":
					break;
				case "x_RFSH3":
					break;
				case "x_RFSH4":
					break;
				case "x_RFSH5":
					break;
				case "x_RFSH6":
					break;
				case "x_RFSH7":
					break;
				case "x_RFSH8":
					break;
				case "x_RFSH9":
					break;
				case "x_RFSH10":
					break;
				case "x_RFSH11":
					break;
				case "x_RFSH12":
					break;
				case "x_RFSH13":
					break;
				case "x_HMG1":
					break;
				case "x_HMG2":
					break;
				case "x_HMG3":
					break;
				case "x_HMG4":
					break;
				case "x_HMG5":
					break;
				case "x_HMG6":
					break;
				case "x_HMG7":
					break;
				case "x_HMG8":
					break;
				case "x_HMG9":
					break;
				case "x_HMG10":
					break;
				case "x_HMG11":
					break;
				case "x_HMG12":
					break;
				case "x_HMG13":
					break;
				case "x_GnRH1":
					break;
				case "x_GnRH2":
					break;
				case "x_GnRH3":
					break;
				case "x_GnRH4":
					break;
				case "x_GnRH5":
					break;
				case "x_GnRH6":
					break;
				case "x_GnRH7":
					break;
				case "x_GnRH8":
					break;
				case "x_GnRH9":
					break;
				case "x_GnRH10":
					break;
				case "x_GnRH11":
					break;
				case "x_GnRH12":
					break;
				case "x_GnRH13":
					break;
				case "x_Convert":
					break;
				case "x_InseminatinTechnique":
					break;
				case "x_IndicationForART":
					break;
				case "x_Hysteroscopy":
					break;
				case "x_EndometrialScratching":
					break;
				case "x_TrialCannulation":
					break;
				case "x_CYCLETYPE":
					break;
				case "x_OralEstrogenDosage":
					break;
				case "x_GCSF":
					break;
				case "x_ActivatedPRP":
					break;
				case "x_AllFreeze":
					break;
				case "x_TreatmentCancel":
					break;
				case "x_Projectron":
					break;
				case "x_Tablet14":
					break;
				case "x_Tablet15":
					break;
				case "x_Tablet16":
					break;
				case "x_Tablet17":
					break;
				case "x_Tablet18":
					break;
				case "x_Tablet19":
					break;
				case "x_Tablet20":
					break;
				case "x_Tablet21":
					break;
				case "x_Tablet22":
					break;
				case "x_Tablet23":
					break;
				case "x_Tablet24":
					break;
				case "x_Tablet25":
					break;
				case "x_RFSH14":
					break;
				case "x_RFSH15":
					break;
				case "x_RFSH16":
					break;
				case "x_RFSH17":
					break;
				case "x_RFSH18":
					break;
				case "x_RFSH19":
					break;
				case "x_RFSH20":
					break;
				case "x_RFSH21":
					break;
				case "x_RFSH22":
					break;
				case "x_RFSH23":
					break;
				case "x_RFSH24":
					break;
				case "x_RFSH25":
					break;
				case "x_HMG14":
					break;
				case "x_HMG15":
					break;
				case "x_HMG16":
					break;
				case "x_HMG17":
					break;
				case "x_HMG18":
					break;
				case "x_HMG19":
					break;
				case "x_HMG20":
					break;
				case "x_HMG21":
					break;
				case "x_HMG22":
					break;
				case "x_HMG23":
					break;
				case "x_HMG24":
					break;
				case "x_HMG25":
					break;
				case "x_GnRH14":
					break;
				case "x_GnRH15":
					break;
				case "x_GnRH16":
					break;
				case "x_GnRH17":
					break;
				case "x_GnRH18":
					break;
				case "x_GnRH19":
					break;
				case "x_GnRH20":
					break;
				case "x_GnRH21":
					break;
				case "x_GnRH22":
					break;
				case "x_GnRH23":
					break;
				case "x_GnRH24":
					break;
				case "x_GnRH25":
					break;
				case "x_TUBAL_PATENCY":
					break;
				case "x_HSG":
					break;
				case "x_DHL":
					break;
				case "x_UTERINE_PROBLEMS":
					break;
				case "x_W_COMORBIDS":
					break;
				case "x_H_COMORBIDS":
					break;
				case "x_SEXUAL_DYSFUNCTION":
					break;
				case "x_FOLLICLE_STATUS":
					break;
				case "x_NUMBER_OF_IUI":
					break;
				case "x_PROCEDURE":
					break;
				case "x_LUTEAL_SUPPORT":
					break;
				case "x_SPECIFIC_MATERNAL_PROBLEMS":
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
						case "x_INJTYPE":
							break;
						case "x_TRIGGERR":
							break;
						case "x_Tablet1":
							break;
						case "x_Tablet2":
							break;
						case "x_Tablet3":
							break;
						case "x_Tablet4":
							break;
						case "x_Tablet5":
							break;
						case "x_Tablet6":
							break;
						case "x_Tablet7":
							break;
						case "x_Tablet8":
							break;
						case "x_Tablet9":
							break;
						case "x_Tablet10":
							break;
						case "x_Tablet11":
							break;
						case "x_Tablet12":
							break;
						case "x_Tablet13":
							break;
						case "x_RFSH1":
							break;
						case "x_RFSH2":
							break;
						case "x_RFSH3":
							break;
						case "x_RFSH4":
							break;
						case "x_RFSH5":
							break;
						case "x_RFSH6":
							break;
						case "x_RFSH7":
							break;
						case "x_RFSH8":
							break;
						case "x_RFSH9":
							break;
						case "x_RFSH10":
							break;
						case "x_RFSH11":
							break;
						case "x_RFSH12":
							break;
						case "x_RFSH13":
							break;
						case "x_HMG1":
							break;
						case "x_HMG2":
							break;
						case "x_HMG3":
							break;
						case "x_HMG4":
							break;
						case "x_HMG5":
							break;
						case "x_HMG6":
							break;
						case "x_HMG7":
							break;
						case "x_HMG8":
							break;
						case "x_HMG9":
							break;
						case "x_HMG10":
							break;
						case "x_HMG11":
							break;
						case "x_HMG12":
							break;
						case "x_HMG13":
							break;
						case "x_GnRH1":
							break;
						case "x_GnRH2":
							break;
						case "x_GnRH3":
							break;
						case "x_GnRH4":
							break;
						case "x_GnRH5":
							break;
						case "x_GnRH6":
							break;
						case "x_GnRH7":
							break;
						case "x_GnRH8":
							break;
						case "x_GnRH9":
							break;
						case "x_GnRH10":
							break;
						case "x_GnRH11":
							break;
						case "x_GnRH12":
							break;
						case "x_GnRH13":
							break;
						case "x_Tablet14":
							break;
						case "x_Tablet15":
							break;
						case "x_Tablet16":
							break;
						case "x_Tablet17":
							break;
						case "x_Tablet18":
							break;
						case "x_Tablet19":
							break;
						case "x_Tablet20":
							break;
						case "x_Tablet21":
							break;
						case "x_Tablet22":
							break;
						case "x_Tablet23":
							break;
						case "x_Tablet24":
							break;
						case "x_Tablet25":
							break;
						case "x_RFSH14":
							break;
						case "x_RFSH15":
							break;
						case "x_RFSH16":
							break;
						case "x_RFSH17":
							break;
						case "x_RFSH18":
							break;
						case "x_RFSH19":
							break;
						case "x_RFSH20":
							break;
						case "x_RFSH21":
							break;
						case "x_RFSH22":
							break;
						case "x_RFSH23":
							break;
						case "x_RFSH24":
							break;
						case "x_RFSH25":
							break;
						case "x_HMG14":
							break;
						case "x_HMG15":
							break;
						case "x_HMG16":
							break;
						case "x_HMG17":
							break;
						case "x_HMG18":
							break;
						case "x_HMG19":
							break;
						case "x_HMG20":
							break;
						case "x_HMG21":
							break;
						case "x_HMG22":
							break;
						case "x_HMG23":
							break;
						case "x_HMG24":
							break;
						case "x_HMG25":
							break;
						case "x_GnRH14":
							break;
						case "x_GnRH15":
							break;
						case "x_GnRH16":
							break;
						case "x_GnRH17":
							break;
						case "x_GnRH18":
							break;
						case "x_GnRH19":
							break;
						case "x_GnRH20":
							break;
						case "x_GnRH21":
							break;
						case "x_GnRH22":
							break;
						case "x_GnRH23":
							break;
						case "x_GnRH24":
							break;
						case "x_GnRH25":
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
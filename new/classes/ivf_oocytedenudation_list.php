<?php
namespace PHPMaker2020\HIMS;

/**
 * Page class
 */
class ivf_oocytedenudation_list extends ivf_oocytedenudation
{

	// Page ID
	public $PageID = "list";

	// Project ID
	public $ProjectID = "{EA4F6D13-AF8F-428D-9EA7-BA88D1107EC3}";

	// Table name
	public $TableName = 'ivf_oocytedenudation';

	// Page object name
	public $PageObjName = "ivf_oocytedenudation_list";

	// Grid form hidden field names
	public $FormName = "fivf_oocytedenudationlist";
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

		// Table object (ivf_oocytedenudation)
		if (!isset($GLOBALS["ivf_oocytedenudation"]) || get_class($GLOBALS["ivf_oocytedenudation"]) == PROJECT_NAMESPACE . "ivf_oocytedenudation") {
			$GLOBALS["ivf_oocytedenudation"] = &$this;
			$GLOBALS["Table"] = &$GLOBALS["ivf_oocytedenudation"];
		}

		// Initialize URLs
		$this->ExportPrintUrl = $this->pageUrl() . "export=print";
		$this->ExportExcelUrl = $this->pageUrl() . "export=excel";
		$this->ExportWordUrl = $this->pageUrl() . "export=word";
		$this->ExportPdfUrl = $this->pageUrl() . "export=pdf";
		$this->ExportHtmlUrl = $this->pageUrl() . "export=html";
		$this->ExportXmlUrl = $this->pageUrl() . "export=xml";
		$this->ExportCsvUrl = $this->pageUrl() . "export=csv";
		$this->AddUrl = "ivf_oocytedenudationadd.php?" . Config("TABLE_SHOW_DETAIL") . "=";
		$this->InlineAddUrl = $this->pageUrl() . "action=add";
		$this->GridAddUrl = $this->pageUrl() . "action=gridadd";
		$this->GridEditUrl = $this->pageUrl() . "action=gridedit";
		$this->MultiDeleteUrl = "ivf_oocytedenudationdelete.php";
		$this->MultiUpdateUrl = "ivf_oocytedenudationupdate.php";

		// Table object (user_login)
		if (!isset($GLOBALS['user_login']))
			$GLOBALS['user_login'] = new user_login();

		// Table object (view_ivf_treatment)
		if (!isset($GLOBALS['view_ivf_treatment']))
			$GLOBALS['view_ivf_treatment'] = new view_ivf_treatment();

		// Page ID (for backward compatibility only)
		if (!defined(PROJECT_NAMESPACE . "PAGE_ID"))
			define(PROJECT_NAMESPACE . "PAGE_ID", 'list');

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
		$this->FilterOptions->TagClassName = "ew-filter-option fivf_oocytedenudationlistsrch";

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
			$savedFilterList = $UserProfile->getSearchFilters(CurrentUserName(), "fivf_oocytedenudationlistsrch");
		$filterList = Concat($filterList, $this->id->AdvancedSearch->toJson(), ","); // Field id
		$filterList = Concat($filterList, $this->RIDNo->AdvancedSearch->toJson(), ","); // Field RIDNo
		$filterList = Concat($filterList, $this->Name->AdvancedSearch->toJson(), ","); // Field Name
		$filterList = Concat($filterList, $this->ResultDate->AdvancedSearch->toJson(), ","); // Field ResultDate
		$filterList = Concat($filterList, $this->Surgeon->AdvancedSearch->toJson(), ","); // Field Surgeon
		$filterList = Concat($filterList, $this->AsstSurgeon->AdvancedSearch->toJson(), ","); // Field AsstSurgeon
		$filterList = Concat($filterList, $this->Anaesthetist->AdvancedSearch->toJson(), ","); // Field Anaesthetist
		$filterList = Concat($filterList, $this->AnaestheiaType->AdvancedSearch->toJson(), ","); // Field AnaestheiaType
		$filterList = Concat($filterList, $this->PrimaryEmbryologist->AdvancedSearch->toJson(), ","); // Field PrimaryEmbryologist
		$filterList = Concat($filterList, $this->SecondaryEmbryologist->AdvancedSearch->toJson(), ","); // Field SecondaryEmbryologist
		$filterList = Concat($filterList, $this->OPUNotes->AdvancedSearch->toJson(), ","); // Field OPUNotes
		$filterList = Concat($filterList, $this->NoOfFolliclesRight->AdvancedSearch->toJson(), ","); // Field NoOfFolliclesRight
		$filterList = Concat($filterList, $this->NoOfFolliclesLeft->AdvancedSearch->toJson(), ","); // Field NoOfFolliclesLeft
		$filterList = Concat($filterList, $this->NoOfOocytes->AdvancedSearch->toJson(), ","); // Field NoOfOocytes
		$filterList = Concat($filterList, $this->RecordOocyteDenudation->AdvancedSearch->toJson(), ","); // Field RecordOocyteDenudation
		$filterList = Concat($filterList, $this->DateOfDenudation->AdvancedSearch->toJson(), ","); // Field DateOfDenudation
		$filterList = Concat($filterList, $this->DenudationDoneBy->AdvancedSearch->toJson(), ","); // Field DenudationDoneBy
		$filterList = Concat($filterList, $this->status->AdvancedSearch->toJson(), ","); // Field status
		$filterList = Concat($filterList, $this->createdby->AdvancedSearch->toJson(), ","); // Field createdby
		$filterList = Concat($filterList, $this->createddatetime->AdvancedSearch->toJson(), ","); // Field createddatetime
		$filterList = Concat($filterList, $this->modifiedby->AdvancedSearch->toJson(), ","); // Field modifiedby
		$filterList = Concat($filterList, $this->modifieddatetime->AdvancedSearch->toJson(), ","); // Field modifieddatetime
		$filterList = Concat($filterList, $this->TidNo->AdvancedSearch->toJson(), ","); // Field TidNo
		$filterList = Concat($filterList, $this->ExpFollicles->AdvancedSearch->toJson(), ","); // Field ExpFollicles
		$filterList = Concat($filterList, $this->SecondaryDenudationDoneBy->AdvancedSearch->toJson(), ","); // Field SecondaryDenudationDoneBy
		$filterList = Concat($filterList, $this->patient2->AdvancedSearch->toJson(), ","); // Field patient2
		$filterList = Concat($filterList, $this->OocytesDonate1->AdvancedSearch->toJson(), ","); // Field OocytesDonate1
		$filterList = Concat($filterList, $this->OocytesDonate2->AdvancedSearch->toJson(), ","); // Field OocytesDonate2
		$filterList = Concat($filterList, $this->ETDonate->AdvancedSearch->toJson(), ","); // Field ETDonate
		$filterList = Concat($filterList, $this->OocyteOrgin->AdvancedSearch->toJson(), ","); // Field OocyteOrgin
		$filterList = Concat($filterList, $this->patient1->AdvancedSearch->toJson(), ","); // Field patient1
		$filterList = Concat($filterList, $this->OocyteType->AdvancedSearch->toJson(), ","); // Field OocyteType
		$filterList = Concat($filterList, $this->MIOocytesDonate1->AdvancedSearch->toJson(), ","); // Field MIOocytesDonate1
		$filterList = Concat($filterList, $this->MIOocytesDonate2->AdvancedSearch->toJson(), ","); // Field MIOocytesDonate2
		$filterList = Concat($filterList, $this->SelfMI->AdvancedSearch->toJson(), ","); // Field SelfMI
		$filterList = Concat($filterList, $this->SelfMII->AdvancedSearch->toJson(), ","); // Field SelfMII
		$filterList = Concat($filterList, $this->patient3->AdvancedSearch->toJson(), ","); // Field patient3
		$filterList = Concat($filterList, $this->patient4->AdvancedSearch->toJson(), ","); // Field patient4
		$filterList = Concat($filterList, $this->OocytesDonate3->AdvancedSearch->toJson(), ","); // Field OocytesDonate3
		$filterList = Concat($filterList, $this->OocytesDonate4->AdvancedSearch->toJson(), ","); // Field OocytesDonate4
		$filterList = Concat($filterList, $this->MIOocytesDonate3->AdvancedSearch->toJson(), ","); // Field MIOocytesDonate3
		$filterList = Concat($filterList, $this->MIOocytesDonate4->AdvancedSearch->toJson(), ","); // Field MIOocytesDonate4
		$filterList = Concat($filterList, $this->SelfOocytesMI->AdvancedSearch->toJson(), ","); // Field SelfOocytesMI
		$filterList = Concat($filterList, $this->SelfOocytesMII->AdvancedSearch->toJson(), ","); // Field SelfOocytesMII
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
			$UserProfile->setSearchFilters(CurrentUserName(), "fivf_oocytedenudationlistsrch", $filters);
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

		// Field ResultDate
		$this->ResultDate->AdvancedSearch->SearchValue = @$filter["x_ResultDate"];
		$this->ResultDate->AdvancedSearch->SearchOperator = @$filter["z_ResultDate"];
		$this->ResultDate->AdvancedSearch->SearchCondition = @$filter["v_ResultDate"];
		$this->ResultDate->AdvancedSearch->SearchValue2 = @$filter["y_ResultDate"];
		$this->ResultDate->AdvancedSearch->SearchOperator2 = @$filter["w_ResultDate"];
		$this->ResultDate->AdvancedSearch->save();

		// Field Surgeon
		$this->Surgeon->AdvancedSearch->SearchValue = @$filter["x_Surgeon"];
		$this->Surgeon->AdvancedSearch->SearchOperator = @$filter["z_Surgeon"];
		$this->Surgeon->AdvancedSearch->SearchCondition = @$filter["v_Surgeon"];
		$this->Surgeon->AdvancedSearch->SearchValue2 = @$filter["y_Surgeon"];
		$this->Surgeon->AdvancedSearch->SearchOperator2 = @$filter["w_Surgeon"];
		$this->Surgeon->AdvancedSearch->save();

		// Field AsstSurgeon
		$this->AsstSurgeon->AdvancedSearch->SearchValue = @$filter["x_AsstSurgeon"];
		$this->AsstSurgeon->AdvancedSearch->SearchOperator = @$filter["z_AsstSurgeon"];
		$this->AsstSurgeon->AdvancedSearch->SearchCondition = @$filter["v_AsstSurgeon"];
		$this->AsstSurgeon->AdvancedSearch->SearchValue2 = @$filter["y_AsstSurgeon"];
		$this->AsstSurgeon->AdvancedSearch->SearchOperator2 = @$filter["w_AsstSurgeon"];
		$this->AsstSurgeon->AdvancedSearch->save();

		// Field Anaesthetist
		$this->Anaesthetist->AdvancedSearch->SearchValue = @$filter["x_Anaesthetist"];
		$this->Anaesthetist->AdvancedSearch->SearchOperator = @$filter["z_Anaesthetist"];
		$this->Anaesthetist->AdvancedSearch->SearchCondition = @$filter["v_Anaesthetist"];
		$this->Anaesthetist->AdvancedSearch->SearchValue2 = @$filter["y_Anaesthetist"];
		$this->Anaesthetist->AdvancedSearch->SearchOperator2 = @$filter["w_Anaesthetist"];
		$this->Anaesthetist->AdvancedSearch->save();

		// Field AnaestheiaType
		$this->AnaestheiaType->AdvancedSearch->SearchValue = @$filter["x_AnaestheiaType"];
		$this->AnaestheiaType->AdvancedSearch->SearchOperator = @$filter["z_AnaestheiaType"];
		$this->AnaestheiaType->AdvancedSearch->SearchCondition = @$filter["v_AnaestheiaType"];
		$this->AnaestheiaType->AdvancedSearch->SearchValue2 = @$filter["y_AnaestheiaType"];
		$this->AnaestheiaType->AdvancedSearch->SearchOperator2 = @$filter["w_AnaestheiaType"];
		$this->AnaestheiaType->AdvancedSearch->save();

		// Field PrimaryEmbryologist
		$this->PrimaryEmbryologist->AdvancedSearch->SearchValue = @$filter["x_PrimaryEmbryologist"];
		$this->PrimaryEmbryologist->AdvancedSearch->SearchOperator = @$filter["z_PrimaryEmbryologist"];
		$this->PrimaryEmbryologist->AdvancedSearch->SearchCondition = @$filter["v_PrimaryEmbryologist"];
		$this->PrimaryEmbryologist->AdvancedSearch->SearchValue2 = @$filter["y_PrimaryEmbryologist"];
		$this->PrimaryEmbryologist->AdvancedSearch->SearchOperator2 = @$filter["w_PrimaryEmbryologist"];
		$this->PrimaryEmbryologist->AdvancedSearch->save();

		// Field SecondaryEmbryologist
		$this->SecondaryEmbryologist->AdvancedSearch->SearchValue = @$filter["x_SecondaryEmbryologist"];
		$this->SecondaryEmbryologist->AdvancedSearch->SearchOperator = @$filter["z_SecondaryEmbryologist"];
		$this->SecondaryEmbryologist->AdvancedSearch->SearchCondition = @$filter["v_SecondaryEmbryologist"];
		$this->SecondaryEmbryologist->AdvancedSearch->SearchValue2 = @$filter["y_SecondaryEmbryologist"];
		$this->SecondaryEmbryologist->AdvancedSearch->SearchOperator2 = @$filter["w_SecondaryEmbryologist"];
		$this->SecondaryEmbryologist->AdvancedSearch->save();

		// Field OPUNotes
		$this->OPUNotes->AdvancedSearch->SearchValue = @$filter["x_OPUNotes"];
		$this->OPUNotes->AdvancedSearch->SearchOperator = @$filter["z_OPUNotes"];
		$this->OPUNotes->AdvancedSearch->SearchCondition = @$filter["v_OPUNotes"];
		$this->OPUNotes->AdvancedSearch->SearchValue2 = @$filter["y_OPUNotes"];
		$this->OPUNotes->AdvancedSearch->SearchOperator2 = @$filter["w_OPUNotes"];
		$this->OPUNotes->AdvancedSearch->save();

		// Field NoOfFolliclesRight
		$this->NoOfFolliclesRight->AdvancedSearch->SearchValue = @$filter["x_NoOfFolliclesRight"];
		$this->NoOfFolliclesRight->AdvancedSearch->SearchOperator = @$filter["z_NoOfFolliclesRight"];
		$this->NoOfFolliclesRight->AdvancedSearch->SearchCondition = @$filter["v_NoOfFolliclesRight"];
		$this->NoOfFolliclesRight->AdvancedSearch->SearchValue2 = @$filter["y_NoOfFolliclesRight"];
		$this->NoOfFolliclesRight->AdvancedSearch->SearchOperator2 = @$filter["w_NoOfFolliclesRight"];
		$this->NoOfFolliclesRight->AdvancedSearch->save();

		// Field NoOfFolliclesLeft
		$this->NoOfFolliclesLeft->AdvancedSearch->SearchValue = @$filter["x_NoOfFolliclesLeft"];
		$this->NoOfFolliclesLeft->AdvancedSearch->SearchOperator = @$filter["z_NoOfFolliclesLeft"];
		$this->NoOfFolliclesLeft->AdvancedSearch->SearchCondition = @$filter["v_NoOfFolliclesLeft"];
		$this->NoOfFolliclesLeft->AdvancedSearch->SearchValue2 = @$filter["y_NoOfFolliclesLeft"];
		$this->NoOfFolliclesLeft->AdvancedSearch->SearchOperator2 = @$filter["w_NoOfFolliclesLeft"];
		$this->NoOfFolliclesLeft->AdvancedSearch->save();

		// Field NoOfOocytes
		$this->NoOfOocytes->AdvancedSearch->SearchValue = @$filter["x_NoOfOocytes"];
		$this->NoOfOocytes->AdvancedSearch->SearchOperator = @$filter["z_NoOfOocytes"];
		$this->NoOfOocytes->AdvancedSearch->SearchCondition = @$filter["v_NoOfOocytes"];
		$this->NoOfOocytes->AdvancedSearch->SearchValue2 = @$filter["y_NoOfOocytes"];
		$this->NoOfOocytes->AdvancedSearch->SearchOperator2 = @$filter["w_NoOfOocytes"];
		$this->NoOfOocytes->AdvancedSearch->save();

		// Field RecordOocyteDenudation
		$this->RecordOocyteDenudation->AdvancedSearch->SearchValue = @$filter["x_RecordOocyteDenudation"];
		$this->RecordOocyteDenudation->AdvancedSearch->SearchOperator = @$filter["z_RecordOocyteDenudation"];
		$this->RecordOocyteDenudation->AdvancedSearch->SearchCondition = @$filter["v_RecordOocyteDenudation"];
		$this->RecordOocyteDenudation->AdvancedSearch->SearchValue2 = @$filter["y_RecordOocyteDenudation"];
		$this->RecordOocyteDenudation->AdvancedSearch->SearchOperator2 = @$filter["w_RecordOocyteDenudation"];
		$this->RecordOocyteDenudation->AdvancedSearch->save();

		// Field DateOfDenudation
		$this->DateOfDenudation->AdvancedSearch->SearchValue = @$filter["x_DateOfDenudation"];
		$this->DateOfDenudation->AdvancedSearch->SearchOperator = @$filter["z_DateOfDenudation"];
		$this->DateOfDenudation->AdvancedSearch->SearchCondition = @$filter["v_DateOfDenudation"];
		$this->DateOfDenudation->AdvancedSearch->SearchValue2 = @$filter["y_DateOfDenudation"];
		$this->DateOfDenudation->AdvancedSearch->SearchOperator2 = @$filter["w_DateOfDenudation"];
		$this->DateOfDenudation->AdvancedSearch->save();

		// Field DenudationDoneBy
		$this->DenudationDoneBy->AdvancedSearch->SearchValue = @$filter["x_DenudationDoneBy"];
		$this->DenudationDoneBy->AdvancedSearch->SearchOperator = @$filter["z_DenudationDoneBy"];
		$this->DenudationDoneBy->AdvancedSearch->SearchCondition = @$filter["v_DenudationDoneBy"];
		$this->DenudationDoneBy->AdvancedSearch->SearchValue2 = @$filter["y_DenudationDoneBy"];
		$this->DenudationDoneBy->AdvancedSearch->SearchOperator2 = @$filter["w_DenudationDoneBy"];
		$this->DenudationDoneBy->AdvancedSearch->save();

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

		// Field TidNo
		$this->TidNo->AdvancedSearch->SearchValue = @$filter["x_TidNo"];
		$this->TidNo->AdvancedSearch->SearchOperator = @$filter["z_TidNo"];
		$this->TidNo->AdvancedSearch->SearchCondition = @$filter["v_TidNo"];
		$this->TidNo->AdvancedSearch->SearchValue2 = @$filter["y_TidNo"];
		$this->TidNo->AdvancedSearch->SearchOperator2 = @$filter["w_TidNo"];
		$this->TidNo->AdvancedSearch->save();

		// Field ExpFollicles
		$this->ExpFollicles->AdvancedSearch->SearchValue = @$filter["x_ExpFollicles"];
		$this->ExpFollicles->AdvancedSearch->SearchOperator = @$filter["z_ExpFollicles"];
		$this->ExpFollicles->AdvancedSearch->SearchCondition = @$filter["v_ExpFollicles"];
		$this->ExpFollicles->AdvancedSearch->SearchValue2 = @$filter["y_ExpFollicles"];
		$this->ExpFollicles->AdvancedSearch->SearchOperator2 = @$filter["w_ExpFollicles"];
		$this->ExpFollicles->AdvancedSearch->save();

		// Field SecondaryDenudationDoneBy
		$this->SecondaryDenudationDoneBy->AdvancedSearch->SearchValue = @$filter["x_SecondaryDenudationDoneBy"];
		$this->SecondaryDenudationDoneBy->AdvancedSearch->SearchOperator = @$filter["z_SecondaryDenudationDoneBy"];
		$this->SecondaryDenudationDoneBy->AdvancedSearch->SearchCondition = @$filter["v_SecondaryDenudationDoneBy"];
		$this->SecondaryDenudationDoneBy->AdvancedSearch->SearchValue2 = @$filter["y_SecondaryDenudationDoneBy"];
		$this->SecondaryDenudationDoneBy->AdvancedSearch->SearchOperator2 = @$filter["w_SecondaryDenudationDoneBy"];
		$this->SecondaryDenudationDoneBy->AdvancedSearch->save();

		// Field patient2
		$this->patient2->AdvancedSearch->SearchValue = @$filter["x_patient2"];
		$this->patient2->AdvancedSearch->SearchOperator = @$filter["z_patient2"];
		$this->patient2->AdvancedSearch->SearchCondition = @$filter["v_patient2"];
		$this->patient2->AdvancedSearch->SearchValue2 = @$filter["y_patient2"];
		$this->patient2->AdvancedSearch->SearchOperator2 = @$filter["w_patient2"];
		$this->patient2->AdvancedSearch->save();

		// Field OocytesDonate1
		$this->OocytesDonate1->AdvancedSearch->SearchValue = @$filter["x_OocytesDonate1"];
		$this->OocytesDonate1->AdvancedSearch->SearchOperator = @$filter["z_OocytesDonate1"];
		$this->OocytesDonate1->AdvancedSearch->SearchCondition = @$filter["v_OocytesDonate1"];
		$this->OocytesDonate1->AdvancedSearch->SearchValue2 = @$filter["y_OocytesDonate1"];
		$this->OocytesDonate1->AdvancedSearch->SearchOperator2 = @$filter["w_OocytesDonate1"];
		$this->OocytesDonate1->AdvancedSearch->save();

		// Field OocytesDonate2
		$this->OocytesDonate2->AdvancedSearch->SearchValue = @$filter["x_OocytesDonate2"];
		$this->OocytesDonate2->AdvancedSearch->SearchOperator = @$filter["z_OocytesDonate2"];
		$this->OocytesDonate2->AdvancedSearch->SearchCondition = @$filter["v_OocytesDonate2"];
		$this->OocytesDonate2->AdvancedSearch->SearchValue2 = @$filter["y_OocytesDonate2"];
		$this->OocytesDonate2->AdvancedSearch->SearchOperator2 = @$filter["w_OocytesDonate2"];
		$this->OocytesDonate2->AdvancedSearch->save();

		// Field ETDonate
		$this->ETDonate->AdvancedSearch->SearchValue = @$filter["x_ETDonate"];
		$this->ETDonate->AdvancedSearch->SearchOperator = @$filter["z_ETDonate"];
		$this->ETDonate->AdvancedSearch->SearchCondition = @$filter["v_ETDonate"];
		$this->ETDonate->AdvancedSearch->SearchValue2 = @$filter["y_ETDonate"];
		$this->ETDonate->AdvancedSearch->SearchOperator2 = @$filter["w_ETDonate"];
		$this->ETDonate->AdvancedSearch->save();

		// Field OocyteOrgin
		$this->OocyteOrgin->AdvancedSearch->SearchValue = @$filter["x_OocyteOrgin"];
		$this->OocyteOrgin->AdvancedSearch->SearchOperator = @$filter["z_OocyteOrgin"];
		$this->OocyteOrgin->AdvancedSearch->SearchCondition = @$filter["v_OocyteOrgin"];
		$this->OocyteOrgin->AdvancedSearch->SearchValue2 = @$filter["y_OocyteOrgin"];
		$this->OocyteOrgin->AdvancedSearch->SearchOperator2 = @$filter["w_OocyteOrgin"];
		$this->OocyteOrgin->AdvancedSearch->save();

		// Field patient1
		$this->patient1->AdvancedSearch->SearchValue = @$filter["x_patient1"];
		$this->patient1->AdvancedSearch->SearchOperator = @$filter["z_patient1"];
		$this->patient1->AdvancedSearch->SearchCondition = @$filter["v_patient1"];
		$this->patient1->AdvancedSearch->SearchValue2 = @$filter["y_patient1"];
		$this->patient1->AdvancedSearch->SearchOperator2 = @$filter["w_patient1"];
		$this->patient1->AdvancedSearch->save();

		// Field OocyteType
		$this->OocyteType->AdvancedSearch->SearchValue = @$filter["x_OocyteType"];
		$this->OocyteType->AdvancedSearch->SearchOperator = @$filter["z_OocyteType"];
		$this->OocyteType->AdvancedSearch->SearchCondition = @$filter["v_OocyteType"];
		$this->OocyteType->AdvancedSearch->SearchValue2 = @$filter["y_OocyteType"];
		$this->OocyteType->AdvancedSearch->SearchOperator2 = @$filter["w_OocyteType"];
		$this->OocyteType->AdvancedSearch->save();

		// Field MIOocytesDonate1
		$this->MIOocytesDonate1->AdvancedSearch->SearchValue = @$filter["x_MIOocytesDonate1"];
		$this->MIOocytesDonate1->AdvancedSearch->SearchOperator = @$filter["z_MIOocytesDonate1"];
		$this->MIOocytesDonate1->AdvancedSearch->SearchCondition = @$filter["v_MIOocytesDonate1"];
		$this->MIOocytesDonate1->AdvancedSearch->SearchValue2 = @$filter["y_MIOocytesDonate1"];
		$this->MIOocytesDonate1->AdvancedSearch->SearchOperator2 = @$filter["w_MIOocytesDonate1"];
		$this->MIOocytesDonate1->AdvancedSearch->save();

		// Field MIOocytesDonate2
		$this->MIOocytesDonate2->AdvancedSearch->SearchValue = @$filter["x_MIOocytesDonate2"];
		$this->MIOocytesDonate2->AdvancedSearch->SearchOperator = @$filter["z_MIOocytesDonate2"];
		$this->MIOocytesDonate2->AdvancedSearch->SearchCondition = @$filter["v_MIOocytesDonate2"];
		$this->MIOocytesDonate2->AdvancedSearch->SearchValue2 = @$filter["y_MIOocytesDonate2"];
		$this->MIOocytesDonate2->AdvancedSearch->SearchOperator2 = @$filter["w_MIOocytesDonate2"];
		$this->MIOocytesDonate2->AdvancedSearch->save();

		// Field SelfMI
		$this->SelfMI->AdvancedSearch->SearchValue = @$filter["x_SelfMI"];
		$this->SelfMI->AdvancedSearch->SearchOperator = @$filter["z_SelfMI"];
		$this->SelfMI->AdvancedSearch->SearchCondition = @$filter["v_SelfMI"];
		$this->SelfMI->AdvancedSearch->SearchValue2 = @$filter["y_SelfMI"];
		$this->SelfMI->AdvancedSearch->SearchOperator2 = @$filter["w_SelfMI"];
		$this->SelfMI->AdvancedSearch->save();

		// Field SelfMII
		$this->SelfMII->AdvancedSearch->SearchValue = @$filter["x_SelfMII"];
		$this->SelfMII->AdvancedSearch->SearchOperator = @$filter["z_SelfMII"];
		$this->SelfMII->AdvancedSearch->SearchCondition = @$filter["v_SelfMII"];
		$this->SelfMII->AdvancedSearch->SearchValue2 = @$filter["y_SelfMII"];
		$this->SelfMII->AdvancedSearch->SearchOperator2 = @$filter["w_SelfMII"];
		$this->SelfMII->AdvancedSearch->save();

		// Field patient3
		$this->patient3->AdvancedSearch->SearchValue = @$filter["x_patient3"];
		$this->patient3->AdvancedSearch->SearchOperator = @$filter["z_patient3"];
		$this->patient3->AdvancedSearch->SearchCondition = @$filter["v_patient3"];
		$this->patient3->AdvancedSearch->SearchValue2 = @$filter["y_patient3"];
		$this->patient3->AdvancedSearch->SearchOperator2 = @$filter["w_patient3"];
		$this->patient3->AdvancedSearch->save();

		// Field patient4
		$this->patient4->AdvancedSearch->SearchValue = @$filter["x_patient4"];
		$this->patient4->AdvancedSearch->SearchOperator = @$filter["z_patient4"];
		$this->patient4->AdvancedSearch->SearchCondition = @$filter["v_patient4"];
		$this->patient4->AdvancedSearch->SearchValue2 = @$filter["y_patient4"];
		$this->patient4->AdvancedSearch->SearchOperator2 = @$filter["w_patient4"];
		$this->patient4->AdvancedSearch->save();

		// Field OocytesDonate3
		$this->OocytesDonate3->AdvancedSearch->SearchValue = @$filter["x_OocytesDonate3"];
		$this->OocytesDonate3->AdvancedSearch->SearchOperator = @$filter["z_OocytesDonate3"];
		$this->OocytesDonate3->AdvancedSearch->SearchCondition = @$filter["v_OocytesDonate3"];
		$this->OocytesDonate3->AdvancedSearch->SearchValue2 = @$filter["y_OocytesDonate3"];
		$this->OocytesDonate3->AdvancedSearch->SearchOperator2 = @$filter["w_OocytesDonate3"];
		$this->OocytesDonate3->AdvancedSearch->save();

		// Field OocytesDonate4
		$this->OocytesDonate4->AdvancedSearch->SearchValue = @$filter["x_OocytesDonate4"];
		$this->OocytesDonate4->AdvancedSearch->SearchOperator = @$filter["z_OocytesDonate4"];
		$this->OocytesDonate4->AdvancedSearch->SearchCondition = @$filter["v_OocytesDonate4"];
		$this->OocytesDonate4->AdvancedSearch->SearchValue2 = @$filter["y_OocytesDonate4"];
		$this->OocytesDonate4->AdvancedSearch->SearchOperator2 = @$filter["w_OocytesDonate4"];
		$this->OocytesDonate4->AdvancedSearch->save();

		// Field MIOocytesDonate3
		$this->MIOocytesDonate3->AdvancedSearch->SearchValue = @$filter["x_MIOocytesDonate3"];
		$this->MIOocytesDonate3->AdvancedSearch->SearchOperator = @$filter["z_MIOocytesDonate3"];
		$this->MIOocytesDonate3->AdvancedSearch->SearchCondition = @$filter["v_MIOocytesDonate3"];
		$this->MIOocytesDonate3->AdvancedSearch->SearchValue2 = @$filter["y_MIOocytesDonate3"];
		$this->MIOocytesDonate3->AdvancedSearch->SearchOperator2 = @$filter["w_MIOocytesDonate3"];
		$this->MIOocytesDonate3->AdvancedSearch->save();

		// Field MIOocytesDonate4
		$this->MIOocytesDonate4->AdvancedSearch->SearchValue = @$filter["x_MIOocytesDonate4"];
		$this->MIOocytesDonate4->AdvancedSearch->SearchOperator = @$filter["z_MIOocytesDonate4"];
		$this->MIOocytesDonate4->AdvancedSearch->SearchCondition = @$filter["v_MIOocytesDonate4"];
		$this->MIOocytesDonate4->AdvancedSearch->SearchValue2 = @$filter["y_MIOocytesDonate4"];
		$this->MIOocytesDonate4->AdvancedSearch->SearchOperator2 = @$filter["w_MIOocytesDonate4"];
		$this->MIOocytesDonate4->AdvancedSearch->save();

		// Field SelfOocytesMI
		$this->SelfOocytesMI->AdvancedSearch->SearchValue = @$filter["x_SelfOocytesMI"];
		$this->SelfOocytesMI->AdvancedSearch->SearchOperator = @$filter["z_SelfOocytesMI"];
		$this->SelfOocytesMI->AdvancedSearch->SearchCondition = @$filter["v_SelfOocytesMI"];
		$this->SelfOocytesMI->AdvancedSearch->SearchValue2 = @$filter["y_SelfOocytesMI"];
		$this->SelfOocytesMI->AdvancedSearch->SearchOperator2 = @$filter["w_SelfOocytesMI"];
		$this->SelfOocytesMI->AdvancedSearch->save();

		// Field SelfOocytesMII
		$this->SelfOocytesMII->AdvancedSearch->SearchValue = @$filter["x_SelfOocytesMII"];
		$this->SelfOocytesMII->AdvancedSearch->SearchOperator = @$filter["z_SelfOocytesMII"];
		$this->SelfOocytesMII->AdvancedSearch->SearchCondition = @$filter["v_SelfOocytesMII"];
		$this->SelfOocytesMII->AdvancedSearch->SearchValue2 = @$filter["y_SelfOocytesMII"];
		$this->SelfOocytesMII->AdvancedSearch->SearchOperator2 = @$filter["w_SelfOocytesMII"];
		$this->SelfOocytesMII->AdvancedSearch->save();
		$this->BasicSearch->setKeyword(@$filter[Config("TABLE_BASIC_SEARCH")]);
		$this->BasicSearch->setType(@$filter[Config("TABLE_BASIC_SEARCH_TYPE")]);
	}

	// Return basic search SQL
	protected function basicSearchSql($arKeywords, $type)
	{
		$where = "";
		$this->buildBasicSearchSql($where, $this->Name, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Surgeon, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->AsstSurgeon, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Anaesthetist, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->AnaestheiaType, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->PrimaryEmbryologist, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->SecondaryEmbryologist, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->OPUNotes, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->NoOfFolliclesRight, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->NoOfFolliclesLeft, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->NoOfOocytes, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->RecordOocyteDenudation, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->DenudationDoneBy, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->ExpFollicles, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->SecondaryDenudationDoneBy, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->patient2, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->OocytesDonate1, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->OocytesDonate2, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->ETDonate, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->OocyteOrgin, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->patient1, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->OocyteType, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->MIOocytesDonate1, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->MIOocytesDonate2, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->SelfMI, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->SelfMII, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->patient3, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->patient4, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->OocytesDonate3, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->OocytesDonate4, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->MIOocytesDonate3, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->MIOocytesDonate4, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->SelfOocytesMI, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->SelfOocytesMII, $arKeywords, $type);
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
			$this->updateSort($this->ResultDate); // ResultDate
			$this->updateSort($this->Surgeon); // Surgeon
			$this->updateSort($this->AsstSurgeon); // AsstSurgeon
			$this->updateSort($this->Anaesthetist); // Anaesthetist
			$this->updateSort($this->AnaestheiaType); // AnaestheiaType
			$this->updateSort($this->PrimaryEmbryologist); // PrimaryEmbryologist
			$this->updateSort($this->SecondaryEmbryologist); // SecondaryEmbryologist
			$this->updateSort($this->NoOfFolliclesRight); // NoOfFolliclesRight
			$this->updateSort($this->NoOfFolliclesLeft); // NoOfFolliclesLeft
			$this->updateSort($this->NoOfOocytes); // NoOfOocytes
			$this->updateSort($this->RecordOocyteDenudation); // RecordOocyteDenudation
			$this->updateSort($this->DateOfDenudation); // DateOfDenudation
			$this->updateSort($this->DenudationDoneBy); // DenudationDoneBy
			$this->updateSort($this->status); // status
			$this->updateSort($this->createdby); // createdby
			$this->updateSort($this->createddatetime); // createddatetime
			$this->updateSort($this->modifiedby); // modifiedby
			$this->updateSort($this->modifieddatetime); // modifieddatetime
			$this->updateSort($this->TidNo); // TidNo
			$this->updateSort($this->ExpFollicles); // ExpFollicles
			$this->updateSort($this->SecondaryDenudationDoneBy); // SecondaryDenudationDoneBy
			$this->updateSort($this->OocyteOrgin); // OocyteOrgin
			$this->updateSort($this->patient1); // patient1
			$this->updateSort($this->OocyteType); // OocyteType
			$this->updateSort($this->MIOocytesDonate1); // MIOocytesDonate1
			$this->updateSort($this->MIOocytesDonate2); // MIOocytesDonate2
			$this->updateSort($this->SelfMI); // SelfMI
			$this->updateSort($this->SelfMII); // SelfMII
			$this->updateSort($this->patient3); // patient3
			$this->updateSort($this->patient4); // patient4
			$this->updateSort($this->OocytesDonate3); // OocytesDonate3
			$this->updateSort($this->OocytesDonate4); // OocytesDonate4
			$this->updateSort($this->MIOocytesDonate3); // MIOocytesDonate3
			$this->updateSort($this->MIOocytesDonate4); // MIOocytesDonate4
			$this->updateSort($this->SelfOocytesMI); // SelfOocytesMI
			$this->updateSort($this->SelfOocytesMII); // SelfOocytesMII
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
				$this->TidNo->setSessionValue("");
				$this->RIDNo->setSessionValue("");
				$this->Name->setSessionValue("");
			}

			// Reset sorting order
			if ($this->Command == "resetsort") {
				$orderBy = "";
				$this->setSessionOrderBy($orderBy);
				$this->id->setSort("");
				$this->RIDNo->setSort("");
				$this->Name->setSort("");
				$this->ResultDate->setSort("");
				$this->Surgeon->setSort("");
				$this->AsstSurgeon->setSort("");
				$this->Anaesthetist->setSort("");
				$this->AnaestheiaType->setSort("");
				$this->PrimaryEmbryologist->setSort("");
				$this->SecondaryEmbryologist->setSort("");
				$this->NoOfFolliclesRight->setSort("");
				$this->NoOfFolliclesLeft->setSort("");
				$this->NoOfOocytes->setSort("");
				$this->RecordOocyteDenudation->setSort("");
				$this->DateOfDenudation->setSort("");
				$this->DenudationDoneBy->setSort("");
				$this->status->setSort("");
				$this->createdby->setSort("");
				$this->createddatetime->setSort("");
				$this->modifiedby->setSort("");
				$this->modifieddatetime->setSort("");
				$this->TidNo->setSort("");
				$this->ExpFollicles->setSort("");
				$this->SecondaryDenudationDoneBy->setSort("");
				$this->OocyteOrgin->setSort("");
				$this->patient1->setSort("");
				$this->OocyteType->setSort("");
				$this->MIOocytesDonate1->setSort("");
				$this->MIOocytesDonate2->setSort("");
				$this->SelfMI->setSort("");
				$this->SelfMII->setSort("");
				$this->patient3->setSort("");
				$this->patient4->setSort("");
				$this->OocytesDonate3->setSort("");
				$this->OocytesDonate4->setSort("");
				$this->MIOocytesDonate3->setSort("");
				$this->MIOocytesDonate4->setSort("");
				$this->SelfOocytesMI->setSort("");
				$this->SelfOocytesMII->setSort("");
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

		// "detail_ivf_embryology_chart"
		$item = &$this->ListOptions->add("detail_ivf_embryology_chart");
		$item->CssClass = "text-nowrap";
		$item->Visible = $Security->allowList(CurrentProjectID() . 'ivf_embryology_chart') && !$this->ShowMultipleDetails;
		$item->OnLeft = TRUE;
		$item->ShowInButtonGroup = FALSE;
		if (!isset($GLOBALS["ivf_embryology_chart_grid"]))
			$GLOBALS["ivf_embryology_chart_grid"] = new ivf_embryology_chart_grid();

		// Multiple details
		if ($this->ShowMultipleDetails) {
			$item = &$this->ListOptions->add("details");
			$item->CssClass = "text-nowrap";
			$item->Visible = $this->ShowMultipleDetails;
			$item->OnLeft = TRUE;
			$item->ShowInButtonGroup = FALSE;
		}

		// Set up detail pages
		$pages = new SubPages();
		$pages->add("ivf_embryology_chart");
		$this->DetailPages = $pages;

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
		$detailViewTblVar = "";
		$detailCopyTblVar = "";
		$detailEditTblVar = "";

		// "detail_ivf_embryology_chart"
		$opt = $this->ListOptions["detail_ivf_embryology_chart"];
		if ($Security->allowList(CurrentProjectID() . 'ivf_embryology_chart')) {
			$body = $Language->phrase("DetailLink") . $Language->TablePhrase("ivf_embryology_chart", "TblCaption");
			$body = "<a class=\"btn btn-default ew-row-link ew-detail\" data-action=\"list\" href=\"" . HtmlEncode("ivf_embryology_chartlist.php?" . Config("TABLE_SHOW_MASTER") . "=ivf_oocytedenudation&fk_id=" . urlencode(strval($this->id->CurrentValue)) . "") . "\">" . $body . "</a>";
			$links = "";
			if ($GLOBALS["ivf_embryology_chart_grid"]->DetailView && $Security->canView() && $Security->allowView(CurrentProjectID() . 'ivf_oocytedenudation')) {
				$caption = $Language->phrase("MasterDetailViewLink");
				$url = $this->getViewUrl(Config("TABLE_SHOW_DETAIL") . "=ivf_embryology_chart");
				$links .= "<li><a class=\"dropdown-item ew-row-link ew-detail-view\" data-action=\"view\" data-caption=\"" . HtmlTitle($caption) . "\" href=\"" . HtmlEncode($url) . "\">" . HtmlImageAndText($caption) . "</a></li>";
				if ($detailViewTblVar != "")
					$detailViewTblVar .= ",";
				$detailViewTblVar .= "ivf_embryology_chart";
			}
			if ($GLOBALS["ivf_embryology_chart_grid"]->DetailEdit && $Security->canEdit() && $Security->allowEdit(CurrentProjectID() . 'ivf_oocytedenudation')) {
				$caption = $Language->phrase("MasterDetailEditLink");
				$url = $this->getEditUrl(Config("TABLE_SHOW_DETAIL") . "=ivf_embryology_chart");
				$links .= "<li><a class=\"dropdown-item ew-row-link ew-detail-edit\" data-action=\"edit\" data-caption=\"" . HtmlTitle($caption) . "\" href=\"" . HtmlEncode($url) . "\">" . HtmlImageAndText($caption) . "</a></li>";
				if ($detailEditTblVar != "")
					$detailEditTblVar .= ",";
				$detailEditTblVar .= "ivf_embryology_chart";
			}
			if ($GLOBALS["ivf_embryology_chart_grid"]->DetailAdd && $Security->canAdd() && $Security->allowAdd(CurrentProjectID() . 'ivf_oocytedenudation')) {
				$caption = $Language->phrase("MasterDetailCopyLink");
				$url = $this->getCopyUrl(Config("TABLE_SHOW_DETAIL") . "=ivf_embryology_chart");
				$links .= "<li><a class=\"dropdown-item ew-row-link ew-detail-copy\" data-action=\"add\" data-caption=\"" . HtmlTitle($caption) . "\" href=\"" . HtmlEncode($url) . "\">" . HtmlImageAndText($caption) . "</a></li>";
				if ($detailCopyTblVar != "")
					$detailCopyTblVar .= ",";
				$detailCopyTblVar .= "ivf_embryology_chart";
			}
			if ($links != "") {
				$body .= "<button class=\"dropdown-toggle btn btn-default ew-detail\" data-toggle=\"dropdown\"></button>";
				$body .= "<ul class=\"dropdown-menu\">". $links . "</ul>";
			}
			$body = "<div class=\"btn-group btn-group-sm ew-btn-group\">" . $body . "</div>";
			$opt->Body = $body;
			if ($this->ShowMultipleDetails)
				$opt->Visible = FALSE;
		}
		if ($this->ShowMultipleDetails) {
			$body = "<div class=\"btn-group btn-group-sm ew-btn-group\">";
			$links = "";
			if ($detailViewTblVar != "") {
				$links .= "<li><a class=\"dropdown-item ew-row-link ew-detail-view\" data-action=\"view\" data-caption=\"" . HtmlTitle($Language->phrase("MasterDetailViewLink")) . "\" href=\"" . HtmlEncode($this->getViewUrl(Config("TABLE_SHOW_DETAIL") . "=" . $detailViewTblVar)) . "\">" . HtmlImageAndText($Language->phrase("MasterDetailViewLink")) . "</a></li>";
			}
			if ($detailEditTblVar != "") {
				$links .= "<li><a class=\"dropdown-item ew-row-link ew-detail-edit\" data-action=\"edit\" data-caption=\"" . HtmlTitle($Language->phrase("MasterDetailEditLink")) . "\" href=\"" . HtmlEncode($this->getEditUrl(Config("TABLE_SHOW_DETAIL") . "=" . $detailEditTblVar)) . "\">" . HtmlImageAndText($Language->phrase("MasterDetailEditLink")) . "</a></li>";
			}
			if ($detailCopyTblVar != "") {
				$links .= "<li><a class=\"dropdown-item ew-row-link ew-detail-copy\" data-action=\"add\" data-caption=\"" . HtmlTitle($Language->phrase("MasterDetailCopyLink")) . "\" href=\"" . HtmlEncode($this->GetCopyUrl(Config("TABLE_SHOW_DETAIL") . "=" . $detailCopyTblVar)) . "\">" . HtmlImageAndText($Language->phrase("MasterDetailCopyLink")) . "</a></li>";
			}
			if ($links != "") {
				$body .= "<button class=\"dropdown-toggle btn btn-default ew-master-detail\" title=\"" . HtmlTitle($Language->phrase("MultipleMasterDetails")) . "\" data-toggle=\"dropdown\">" . $Language->phrase("MultipleMasterDetails") . "</button>";
				$body .= "<ul class=\"dropdown-menu ew-menu\">". $links . "</ul>";
			}
			$body .= "</div>";

			// Multiple details
			$opt = $this->ListOptions["details"];
			$opt->Body = $body;
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
		$option = $options["detail"];
		$detailTableLink = "";
		$item = &$option->add("detailadd_ivf_embryology_chart");
		$url = $this->getAddUrl(Config("TABLE_SHOW_DETAIL") . "=ivf_embryology_chart");
		if (!isset($GLOBALS["ivf_embryology_chart"]))
			$GLOBALS["ivf_embryology_chart"] = new ivf_embryology_chart();
		$caption = $Language->phrase("Add") . "&nbsp;" . $this->tableCaption() . "/" . $GLOBALS["ivf_embryology_chart"]->tableCaption();
		$item->Body = "<a class=\"ew-detail-add-group ew-detail-add\" title=\"" . HtmlTitle($caption) . "\" data-caption=\"" . HtmlTitle($caption) . "\" href=\"" . HtmlEncode($url) . "\">" . $caption . "</a>";
		$item->Visible = ($GLOBALS["ivf_embryology_chart"]->DetailAdd && $Security->allowAdd(CurrentProjectID() . 'ivf_oocytedenudation') && $Security->canAdd());
		if ($item->Visible) {
			if ($detailTableLink != "")
				$detailTableLink .= ",";
			$detailTableLink .= "ivf_embryology_chart";
		}

		// Add multiple details
		if ($this->ShowMultipleDetails) {
			$item = &$option->add("detailsadd");
			$url = $this->getAddUrl(Config("TABLE_SHOW_DETAIL") . "=" . $detailTableLink);
			$caption = $Language->phrase("AddMasterDetailLink");
			$item->Body = "<a class=\"ew-detail-add-group ew-detail-add\" title=\"" . HtmlTitle($caption) . "\" data-caption=\"" . HtmlTitle($caption) . "\" href=\"" . HtmlEncode($url) . "\">" . $caption . "</a>";
			$item->Visible = $detailTableLink != "" && $Security->canAdd();

			// Hide single master/detail items
			$ar = explode(",", $detailTableLink);
			$cnt = count($ar);
			for ($i = 0; $i < $cnt; $i++) {
				if ($item = $option["detailadd_" . $ar[$i]])
					$item->Visible = FALSE;
			}
		}
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
		$item->Body = "<a class=\"ew-save-filter\" data-form=\"fivf_oocytedenudationlistsrch\" href=\"#\" onclick=\"return false;\">" . $Language->phrase("SaveCurrentFilter") . "</a>";
		$item->Visible = TRUE;
		$item = &$this->FilterOptions->add("deletefilter");
		$item->Body = "<a class=\"ew-delete-filter\" data-form=\"fivf_oocytedenudationlistsrch\" href=\"#\" onclick=\"return false;\">" . $Language->phrase("DeleteFilter") . "</a>";
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
					$item->Body = "<a class=\"ew-action ew-list-action\" title=\"" . HtmlEncode($caption) . "\" data-caption=\"" . HtmlEncode($caption) . "\" href=\"#\" onclick=\"return ew.submitAction(event,jQuery.extend({f:document.fivf_oocytedenudationlist}," . $listaction->toJson(TRUE) . "));\">" . $icon . "</a>";
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
		$row = [];
		$row['id'] = NULL;
		$row['RIDNo'] = NULL;
		$row['Name'] = NULL;
		$row['ResultDate'] = NULL;
		$row['Surgeon'] = NULL;
		$row['AsstSurgeon'] = NULL;
		$row['Anaesthetist'] = NULL;
		$row['AnaestheiaType'] = NULL;
		$row['PrimaryEmbryologist'] = NULL;
		$row['SecondaryEmbryologist'] = NULL;
		$row['OPUNotes'] = NULL;
		$row['NoOfFolliclesRight'] = NULL;
		$row['NoOfFolliclesLeft'] = NULL;
		$row['NoOfOocytes'] = NULL;
		$row['RecordOocyteDenudation'] = NULL;
		$row['DateOfDenudation'] = NULL;
		$row['DenudationDoneBy'] = NULL;
		$row['status'] = NULL;
		$row['createdby'] = NULL;
		$row['createddatetime'] = NULL;
		$row['modifiedby'] = NULL;
		$row['modifieddatetime'] = NULL;
		$row['TidNo'] = NULL;
		$row['ExpFollicles'] = NULL;
		$row['SecondaryDenudationDoneBy'] = NULL;
		$row['patient2'] = NULL;
		$row['OocytesDonate1'] = NULL;
		$row['OocytesDonate2'] = NULL;
		$row['ETDonate'] = NULL;
		$row['OocyteOrgin'] = NULL;
		$row['patient1'] = NULL;
		$row['OocyteType'] = NULL;
		$row['MIOocytesDonate1'] = NULL;
		$row['MIOocytesDonate2'] = NULL;
		$row['SelfMI'] = NULL;
		$row['SelfMII'] = NULL;
		$row['patient3'] = NULL;
		$row['patient4'] = NULL;
		$row['OocytesDonate3'] = NULL;
		$row['OocytesDonate4'] = NULL;
		$row['MIOocytesDonate3'] = NULL;
		$row['MIOocytesDonate4'] = NULL;
		$row['SelfOocytesMI'] = NULL;
		$row['SelfOocytesMII'] = NULL;
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
				return "<a href=\"#\" class=\"ew-export-link ew-excel\" title=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" onclick=\"return ew.export(document.fivf_oocytedenudationlist, '" . $this->ExportExcelUrl . "', 'excel', true);\">" . $Language->phrase("ExportToExcel") . "</a>";
			else
				return "<a href=\"" . $this->ExportExcelUrl . "\" class=\"ew-export-link ew-excel\" title=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\">" . $Language->phrase("ExportToExcel") . "</a>";
		} elseif (SameText($type, "word")) {
			if ($custom)
				return "<a href=\"#\" class=\"ew-export-link ew-word\" title=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" onclick=\"return ew.export(document.fivf_oocytedenudationlist, '" . $this->ExportWordUrl . "', 'word', true);\">" . $Language->phrase("ExportToWord") . "</a>";
			else
				return "<a href=\"" . $this->ExportWordUrl . "\" class=\"ew-export-link ew-word\" title=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\">" . $Language->phrase("ExportToWord") . "</a>";
		} elseif (SameText($type, "pdf")) {
			if ($custom)
				return "<a href=\"#\" class=\"ew-export-link ew-pdf\" title=\"" . HtmlEncode($Language->phrase("ExportToPDFText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToPDFText")) . "\" onclick=\"return ew.export(document.fivf_oocytedenudationlist, '" . $this->ExportPdfUrl . "', 'pdf', true);\">" . $Language->phrase("ExportToPDF") . "</a>";
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
			return '<button id="emf_ivf_oocytedenudation" class="ew-export-link ew-email" title="' . $Language->phrase("ExportToEmailText") . '" data-caption="' . $Language->phrase("ExportToEmailText") . '" onclick="ew.emailDialogShow({lnk:\'emf_ivf_oocytedenudation\', hdr:ew.language.phrase(\'ExportToEmailText\'), f:document.fivf_oocytedenudationlist, sel:false' . $url . '});">' . $Language->phrase("ExportToEmail") . '</button>';
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
		$item->Body = "<a class=\"btn btn-default ew-search-toggle" . $searchToggleClass . "\" href=\"#\" role=\"button\" title=\"" . $Language->phrase("SearchPanel") . "\" data-caption=\"" . $Language->phrase("SearchPanel") . "\" data-toggle=\"button\" data-form=\"fivf_oocytedenudationlistsrch\" aria-pressed=\"" . ($searchToggleClass == " active" ? "true" : "false") . "\">" . $Language->phrase("SearchLink") . "</a>";
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
		if (Config("EXPORT_MASTER_RECORD") && $this->getMasterFilter() != "" && $this->getCurrentMasterTable() == "view_ivf_treatment") {
			global $view_ivf_treatment;
			if (!isset($view_ivf_treatment))
				$view_ivf_treatment = new view_ivf_treatment();
			$rsmaster = $view_ivf_treatment->loadRs($this->DbMasterFilter); // Load master record
			if ($rsmaster && !$rsmaster->EOF) {
				$exportStyle = $doc->Style;
				$doc->setStyle("v"); // Change to vertical
				if (!$this->isExport("csv") || Config("EXPORT_MASTER_RECORD_FOR_CSV")) {
					$doc->Table = &$view_ivf_treatment;
					$view_ivf_treatment->exportDocument($doc, $rsmaster);
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
			if ($masterTblVar == "view_ivf_treatment") {
				$validMaster = TRUE;
				if (($parm = Get("fk_id", Get("TidNo"))) !== NULL) {
					$GLOBALS["view_ivf_treatment"]->id->setQueryStringValue($parm);
					$this->TidNo->setQueryStringValue($GLOBALS["view_ivf_treatment"]->id->QueryStringValue);
					$this->TidNo->setSessionValue($this->TidNo->QueryStringValue);
					if (!is_numeric($GLOBALS["view_ivf_treatment"]->id->QueryStringValue))
						$validMaster = FALSE;
				} else {
					$validMaster = FALSE;
				}
				if (($parm = Get("fk_RIDNO", Get("RIDNo"))) !== NULL) {
					$GLOBALS["view_ivf_treatment"]->RIDNO->setQueryStringValue($parm);
					$this->RIDNo->setQueryStringValue($GLOBALS["view_ivf_treatment"]->RIDNO->QueryStringValue);
					$this->RIDNo->setSessionValue($this->RIDNo->QueryStringValue);
					if (!is_numeric($GLOBALS["view_ivf_treatment"]->RIDNO->QueryStringValue))
						$validMaster = FALSE;
				} else {
					$validMaster = FALSE;
				}
				if (($parm = Get("fk_Name", Get("Name"))) !== NULL) {
					$GLOBALS["view_ivf_treatment"]->Name->setQueryStringValue($parm);
					$this->Name->setQueryStringValue($GLOBALS["view_ivf_treatment"]->Name->QueryStringValue);
					$this->Name->setSessionValue($this->Name->QueryStringValue);
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
			if ($masterTblVar == "view_ivf_treatment") {
				$validMaster = TRUE;
				if (($parm = Post("fk_id", Post("TidNo"))) !== NULL) {
					$GLOBALS["view_ivf_treatment"]->id->setFormValue($parm);
					$this->TidNo->setFormValue($GLOBALS["view_ivf_treatment"]->id->FormValue);
					$this->TidNo->setSessionValue($this->TidNo->FormValue);
					if (!is_numeric($GLOBALS["view_ivf_treatment"]->id->FormValue))
						$validMaster = FALSE;
				} else {
					$validMaster = FALSE;
				}
				if (($parm = Post("fk_RIDNO", Post("RIDNo"))) !== NULL) {
					$GLOBALS["view_ivf_treatment"]->RIDNO->setFormValue($parm);
					$this->RIDNo->setFormValue($GLOBALS["view_ivf_treatment"]->RIDNO->FormValue);
					$this->RIDNo->setSessionValue($this->RIDNo->FormValue);
					if (!is_numeric($GLOBALS["view_ivf_treatment"]->RIDNO->FormValue))
						$validMaster = FALSE;
				} else {
					$validMaster = FALSE;
				}
				if (($parm = Post("fk_Name", Post("Name"))) !== NULL) {
					$GLOBALS["view_ivf_treatment"]->Name->setFormValue($parm);
					$this->Name->setFormValue($GLOBALS["view_ivf_treatment"]->Name->FormValue);
					$this->Name->setSessionValue($this->Name->FormValue);
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
			if ($masterTblVar != "view_ivf_treatment") {
				if ($this->TidNo->CurrentValue == "")
					$this->TidNo->setSessionValue("");
				if ($this->RIDNo->CurrentValue == "")
					$this->RIDNo->setSessionValue("");
				if ($this->Name->CurrentValue == "")
					$this->Name->setSessionValue("");
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
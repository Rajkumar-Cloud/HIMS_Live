<?php
namespace PHPMaker2020\HIMS;

/**
 * Page class
 */
class patient_list extends patient
{

	// Page ID
	public $PageID = "list";

	// Project ID
	public $ProjectID = "{EA4F6D13-AF8F-428D-9EA7-BA88D1107EC3}";

	// Table name
	public $TableName = 'patient';

	// Page object name
	public $PageObjName = "patient_list";

	// Grid form hidden field names
	public $FormName = "fpatientlist";
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

		// Table object (patient)
		if (!isset($GLOBALS["patient"]) || get_class($GLOBALS["patient"]) == PROJECT_NAMESPACE . "patient") {
			$GLOBALS["patient"] = &$this;
			$GLOBALS["Table"] = &$GLOBALS["patient"];
		}

		// Initialize URLs
		$this->ExportPrintUrl = $this->pageUrl() . "export=print";
		$this->ExportExcelUrl = $this->pageUrl() . "export=excel";
		$this->ExportWordUrl = $this->pageUrl() . "export=word";
		$this->ExportPdfUrl = $this->pageUrl() . "export=pdf";
		$this->ExportHtmlUrl = $this->pageUrl() . "export=html";
		$this->ExportXmlUrl = $this->pageUrl() . "export=xml";
		$this->ExportCsvUrl = $this->pageUrl() . "export=csv";
		$this->AddUrl = "patientadd.php?" . Config("TABLE_SHOW_DETAIL") . "=";
		$this->InlineAddUrl = $this->pageUrl() . "action=add";
		$this->GridAddUrl = $this->pageUrl() . "action=gridadd";
		$this->GridEditUrl = $this->pageUrl() . "action=gridedit";
		$this->MultiDeleteUrl = "patientdelete.php";
		$this->MultiUpdateUrl = "patientupdate.php";

		// Table object (user_login)
		if (!isset($GLOBALS['user_login']))
			$GLOBALS['user_login'] = new user_login();

		// Page ID (for backward compatibility only)
		if (!defined(PROJECT_NAMESPACE . "PAGE_ID"))
			define(PROJECT_NAMESPACE . "PAGE_ID", 'list');

		// Table name (for backward compatibility only)
		if (!defined(PROJECT_NAMESPACE . "TABLE_NAME"))
			define(PROJECT_NAMESPACE . "TABLE_NAME", 'patient');

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
		$this->FilterOptions->TagClassName = "ew-filter-option fpatientlistsrch";

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
		global $patient;
		if ($this->CustomExport && $this->CustomExport == $this->Export && array_key_exists($this->CustomExport, Config("EXPORT_CLASSES"))) {
				$content = ob_get_contents();
			if ($ExportFileName == "")
				$ExportFileName = $this->TableVar;
			$class = PROJECT_NAMESPACE . Config("EXPORT_CLASSES." . $this->CustomExport);
			if (class_exists($class)) {
				$doc = new $class($patient);
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
			$key .= @$ar['id'] . Config("COMPOSITE_KEY_SEPARATOR");
			$key .= @$ar['PatientID'];
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
		$this->PatientID->setVisibility();
		$this->title->setVisibility();
		$this->first_name->setVisibility();
		$this->middle_name->Visible = FALSE;
		$this->last_name->Visible = FALSE;
		$this->gender->setVisibility();
		$this->dob->setVisibility();
		$this->Age->setVisibility();
		$this->blood_group->setVisibility();
		$this->mobile_no->setVisibility();
		$this->description->Visible = FALSE;
		$this->status->setVisibility();
		$this->createdby->Visible = FALSE;
		$this->createddatetime->setVisibility();
		$this->modifiedby->Visible = FALSE;
		$this->modifieddatetime->Visible = FALSE;
		$this->profilePic->setVisibility();
		$this->IdentificationMark->setVisibility();
		$this->Religion->setVisibility();
		$this->Nationality->setVisibility();
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
		$this->AppointmentSearch->Visible = FALSE;
		$this->FacebookID->setVisibility();
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
		$this->setupLookupOptions($this->title);
		$this->setupLookupOptions($this->gender);
		$this->setupLookupOptions($this->blood_group);
		$this->setupLookupOptions($this->status);
		$this->setupLookupOptions($this->ReferedByDr);
		$this->setupLookupOptions($this->ReferA4TreatingConsultant);
		$this->setupLookupOptions($this->spouse_title);
		$this->setupLookupOptions($this->spouse_gender);
		$this->setupLookupOptions($this->spouse_blood_group);
		$this->setupLookupOptions($this->Maritalstatus);
		$this->setupLookupOptions($this->Business);
		$this->setupLookupOptions($this->Patient_Language);
		$this->setupLookupOptions($this->WhereDidYouHear);
		$this->setupLookupOptions($this->HospID);
		$this->setupLookupOptions($this->AppointmentSearch);

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
		$this->Pager = new PrevNextPager($this->StartRecord, $this->getRecordsPerPage(), $this->TotalRecords, $this->PageSizes, $this->RecordRange, $this->AutoHidePager, $this->AutoHidePageSizeSelector);
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
		if (count($arKeyFlds) >= 2) {
			$this->id->setOldValue($arKeyFlds[0]);
			if (!is_numeric($this->id->OldValue))
				return FALSE;
			$this->PatientID->setOldValue($arKeyFlds[1]);
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
			$savedFilterList = $UserProfile->getSearchFilters(CurrentUserName(), "fpatientlistsrch");
		$filterList = Concat($filterList, $this->id->AdvancedSearch->toJson(), ","); // Field id
		$filterList = Concat($filterList, $this->PatientID->AdvancedSearch->toJson(), ","); // Field PatientID
		$filterList = Concat($filterList, $this->title->AdvancedSearch->toJson(), ","); // Field title
		$filterList = Concat($filterList, $this->first_name->AdvancedSearch->toJson(), ","); // Field first_name
		$filterList = Concat($filterList, $this->middle_name->AdvancedSearch->toJson(), ","); // Field middle_name
		$filterList = Concat($filterList, $this->last_name->AdvancedSearch->toJson(), ","); // Field last_name
		$filterList = Concat($filterList, $this->gender->AdvancedSearch->toJson(), ","); // Field gender
		$filterList = Concat($filterList, $this->dob->AdvancedSearch->toJson(), ","); // Field dob
		$filterList = Concat($filterList, $this->Age->AdvancedSearch->toJson(), ","); // Field Age
		$filterList = Concat($filterList, $this->blood_group->AdvancedSearch->toJson(), ","); // Field blood_group
		$filterList = Concat($filterList, $this->mobile_no->AdvancedSearch->toJson(), ","); // Field mobile_no
		$filterList = Concat($filterList, $this->description->AdvancedSearch->toJson(), ","); // Field description
		$filterList = Concat($filterList, $this->status->AdvancedSearch->toJson(), ","); // Field status
		$filterList = Concat($filterList, $this->createdby->AdvancedSearch->toJson(), ","); // Field createdby
		$filterList = Concat($filterList, $this->createddatetime->AdvancedSearch->toJson(), ","); // Field createddatetime
		$filterList = Concat($filterList, $this->modifiedby->AdvancedSearch->toJson(), ","); // Field modifiedby
		$filterList = Concat($filterList, $this->modifieddatetime->AdvancedSearch->toJson(), ","); // Field modifieddatetime
		$filterList = Concat($filterList, $this->profilePic->AdvancedSearch->toJson(), ","); // Field profilePic
		$filterList = Concat($filterList, $this->IdentificationMark->AdvancedSearch->toJson(), ","); // Field IdentificationMark
		$filterList = Concat($filterList, $this->Religion->AdvancedSearch->toJson(), ","); // Field Religion
		$filterList = Concat($filterList, $this->Nationality->AdvancedSearch->toJson(), ","); // Field Nationality
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
		$filterList = Concat($filterList, $this->AppointmentSearch->AdvancedSearch->toJson(), ","); // Field AppointmentSearch
		$filterList = Concat($filterList, $this->FacebookID->AdvancedSearch->toJson(), ","); // Field FacebookID
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
			$UserProfile->setSearchFilters(CurrentUserName(), "fpatientlistsrch", $filters);
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

		// Field PatientID
		$this->PatientID->AdvancedSearch->SearchValue = @$filter["x_PatientID"];
		$this->PatientID->AdvancedSearch->SearchOperator = @$filter["z_PatientID"];
		$this->PatientID->AdvancedSearch->SearchCondition = @$filter["v_PatientID"];
		$this->PatientID->AdvancedSearch->SearchValue2 = @$filter["y_PatientID"];
		$this->PatientID->AdvancedSearch->SearchOperator2 = @$filter["w_PatientID"];
		$this->PatientID->AdvancedSearch->save();

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

		// Field Age
		$this->Age->AdvancedSearch->SearchValue = @$filter["x_Age"];
		$this->Age->AdvancedSearch->SearchOperator = @$filter["z_Age"];
		$this->Age->AdvancedSearch->SearchCondition = @$filter["v_Age"];
		$this->Age->AdvancedSearch->SearchValue2 = @$filter["y_Age"];
		$this->Age->AdvancedSearch->SearchOperator2 = @$filter["w_Age"];
		$this->Age->AdvancedSearch->save();

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

		// Field profilePic
		$this->profilePic->AdvancedSearch->SearchValue = @$filter["x_profilePic"];
		$this->profilePic->AdvancedSearch->SearchOperator = @$filter["z_profilePic"];
		$this->profilePic->AdvancedSearch->SearchCondition = @$filter["v_profilePic"];
		$this->profilePic->AdvancedSearch->SearchValue2 = @$filter["y_profilePic"];
		$this->profilePic->AdvancedSearch->SearchOperator2 = @$filter["w_profilePic"];
		$this->profilePic->AdvancedSearch->save();

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

		// Field AppointmentSearch
		$this->AppointmentSearch->AdvancedSearch->SearchValue = @$filter["x_AppointmentSearch"];
		$this->AppointmentSearch->AdvancedSearch->SearchOperator = @$filter["z_AppointmentSearch"];
		$this->AppointmentSearch->AdvancedSearch->SearchCondition = @$filter["v_AppointmentSearch"];
		$this->AppointmentSearch->AdvancedSearch->SearchValue2 = @$filter["y_AppointmentSearch"];
		$this->AppointmentSearch->AdvancedSearch->SearchOperator2 = @$filter["w_AppointmentSearch"];
		$this->AppointmentSearch->AdvancedSearch->save();

		// Field FacebookID
		$this->FacebookID->AdvancedSearch->SearchValue = @$filter["x_FacebookID"];
		$this->FacebookID->AdvancedSearch->SearchOperator = @$filter["z_FacebookID"];
		$this->FacebookID->AdvancedSearch->SearchCondition = @$filter["v_FacebookID"];
		$this->FacebookID->AdvancedSearch->SearchValue2 = @$filter["y_FacebookID"];
		$this->FacebookID->AdvancedSearch->SearchOperator2 = @$filter["w_FacebookID"];
		$this->FacebookID->AdvancedSearch->save();
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
		$this->buildSearchSql($where, $this->PatientID, $default, FALSE); // PatientID
		$this->buildSearchSql($where, $this->title, $default, FALSE); // title
		$this->buildSearchSql($where, $this->first_name, $default, FALSE); // first_name
		$this->buildSearchSql($where, $this->middle_name, $default, FALSE); // middle_name
		$this->buildSearchSql($where, $this->last_name, $default, FALSE); // last_name
		$this->buildSearchSql($where, $this->gender, $default, FALSE); // gender
		$this->buildSearchSql($where, $this->dob, $default, FALSE); // dob
		$this->buildSearchSql($where, $this->Age, $default, FALSE); // Age
		$this->buildSearchSql($where, $this->blood_group, $default, FALSE); // blood_group
		$this->buildSearchSql($where, $this->mobile_no, $default, FALSE); // mobile_no
		$this->buildSearchSql($where, $this->description, $default, FALSE); // description
		$this->buildSearchSql($where, $this->status, $default, FALSE); // status
		$this->buildSearchSql($where, $this->createdby, $default, FALSE); // createdby
		$this->buildSearchSql($where, $this->createddatetime, $default, FALSE); // createddatetime
		$this->buildSearchSql($where, $this->modifiedby, $default, FALSE); // modifiedby
		$this->buildSearchSql($where, $this->modifieddatetime, $default, FALSE); // modifieddatetime
		$this->buildSearchSql($where, $this->profilePic, $default, FALSE); // profilePic
		$this->buildSearchSql($where, $this->IdentificationMark, $default, FALSE); // IdentificationMark
		$this->buildSearchSql($where, $this->Religion, $default, FALSE); // Religion
		$this->buildSearchSql($where, $this->Nationality, $default, FALSE); // Nationality
		$this->buildSearchSql($where, $this->ReferedByDr, $default, FALSE); // ReferedByDr
		$this->buildSearchSql($where, $this->ReferClinicname, $default, FALSE); // ReferClinicname
		$this->buildSearchSql($where, $this->ReferCity, $default, FALSE); // ReferCity
		$this->buildSearchSql($where, $this->ReferMobileNo, $default, FALSE); // ReferMobileNo
		$this->buildSearchSql($where, $this->ReferA4TreatingConsultant, $default, FALSE); // ReferA4TreatingConsultant
		$this->buildSearchSql($where, $this->PurposreReferredfor, $default, FALSE); // PurposreReferredfor
		$this->buildSearchSql($where, $this->spouse_title, $default, FALSE); // spouse_title
		$this->buildSearchSql($where, $this->spouse_first_name, $default, FALSE); // spouse_first_name
		$this->buildSearchSql($where, $this->spouse_middle_name, $default, FALSE); // spouse_middle_name
		$this->buildSearchSql($where, $this->spouse_last_name, $default, FALSE); // spouse_last_name
		$this->buildSearchSql($where, $this->spouse_gender, $default, FALSE); // spouse_gender
		$this->buildSearchSql($where, $this->spouse_dob, $default, FALSE); // spouse_dob
		$this->buildSearchSql($where, $this->spouse_Age, $default, FALSE); // spouse_Age
		$this->buildSearchSql($where, $this->spouse_blood_group, $default, FALSE); // spouse_blood_group
		$this->buildSearchSql($where, $this->spouse_mobile_no, $default, FALSE); // spouse_mobile_no
		$this->buildSearchSql($where, $this->Maritalstatus, $default, FALSE); // Maritalstatus
		$this->buildSearchSql($where, $this->Business, $default, FALSE); // Business
		$this->buildSearchSql($where, $this->Patient_Language, $default, FALSE); // Patient_Language
		$this->buildSearchSql($where, $this->Passport, $default, FALSE); // Passport
		$this->buildSearchSql($where, $this->VisaNo, $default, FALSE); // VisaNo
		$this->buildSearchSql($where, $this->ValidityOfVisa, $default, FALSE); // ValidityOfVisa
		$this->buildSearchSql($where, $this->WhereDidYouHear, $default, TRUE); // WhereDidYouHear
		$this->buildSearchSql($where, $this->HospID, $default, FALSE); // HospID
		$this->buildSearchSql($where, $this->street, $default, FALSE); // street
		$this->buildSearchSql($where, $this->town, $default, FALSE); // town
		$this->buildSearchSql($where, $this->province, $default, FALSE); // province
		$this->buildSearchSql($where, $this->country, $default, FALSE); // country
		$this->buildSearchSql($where, $this->postal_code, $default, FALSE); // postal_code
		$this->buildSearchSql($where, $this->PEmail, $default, FALSE); // PEmail
		$this->buildSearchSql($where, $this->PEmergencyContact, $default, FALSE); // PEmergencyContact
		$this->buildSearchSql($where, $this->occupation, $default, FALSE); // occupation
		$this->buildSearchSql($where, $this->spouse_occupation, $default, FALSE); // spouse_occupation
		$this->buildSearchSql($where, $this->WhatsApp, $default, FALSE); // WhatsApp
		$this->buildSearchSql($where, $this->CouppleID, $default, FALSE); // CouppleID
		$this->buildSearchSql($where, $this->MaleID, $default, FALSE); // MaleID
		$this->buildSearchSql($where, $this->FemaleID, $default, FALSE); // FemaleID
		$this->buildSearchSql($where, $this->GroupID, $default, FALSE); // GroupID
		$this->buildSearchSql($where, $this->Relationship, $default, FALSE); // Relationship
		$this->buildSearchSql($where, $this->AppointmentSearch, $default, FALSE); // AppointmentSearch
		$this->buildSearchSql($where, $this->FacebookID, $default, FALSE); // FacebookID

		// Set up search parm
		if (!$default && $where != "" && in_array($this->Command, ["", "reset", "resetall"])) {
			$this->Command = "search";
		}
		if (!$default && $this->Command == "search") {
			$this->id->AdvancedSearch->save(); // id
			$this->PatientID->AdvancedSearch->save(); // PatientID
			$this->title->AdvancedSearch->save(); // title
			$this->first_name->AdvancedSearch->save(); // first_name
			$this->middle_name->AdvancedSearch->save(); // middle_name
			$this->last_name->AdvancedSearch->save(); // last_name
			$this->gender->AdvancedSearch->save(); // gender
			$this->dob->AdvancedSearch->save(); // dob
			$this->Age->AdvancedSearch->save(); // Age
			$this->blood_group->AdvancedSearch->save(); // blood_group
			$this->mobile_no->AdvancedSearch->save(); // mobile_no
			$this->description->AdvancedSearch->save(); // description
			$this->status->AdvancedSearch->save(); // status
			$this->createdby->AdvancedSearch->save(); // createdby
			$this->createddatetime->AdvancedSearch->save(); // createddatetime
			$this->modifiedby->AdvancedSearch->save(); // modifiedby
			$this->modifieddatetime->AdvancedSearch->save(); // modifieddatetime
			$this->profilePic->AdvancedSearch->save(); // profilePic
			$this->IdentificationMark->AdvancedSearch->save(); // IdentificationMark
			$this->Religion->AdvancedSearch->save(); // Religion
			$this->Nationality->AdvancedSearch->save(); // Nationality
			$this->ReferedByDr->AdvancedSearch->save(); // ReferedByDr
			$this->ReferClinicname->AdvancedSearch->save(); // ReferClinicname
			$this->ReferCity->AdvancedSearch->save(); // ReferCity
			$this->ReferMobileNo->AdvancedSearch->save(); // ReferMobileNo
			$this->ReferA4TreatingConsultant->AdvancedSearch->save(); // ReferA4TreatingConsultant
			$this->PurposreReferredfor->AdvancedSearch->save(); // PurposreReferredfor
			$this->spouse_title->AdvancedSearch->save(); // spouse_title
			$this->spouse_first_name->AdvancedSearch->save(); // spouse_first_name
			$this->spouse_middle_name->AdvancedSearch->save(); // spouse_middle_name
			$this->spouse_last_name->AdvancedSearch->save(); // spouse_last_name
			$this->spouse_gender->AdvancedSearch->save(); // spouse_gender
			$this->spouse_dob->AdvancedSearch->save(); // spouse_dob
			$this->spouse_Age->AdvancedSearch->save(); // spouse_Age
			$this->spouse_blood_group->AdvancedSearch->save(); // spouse_blood_group
			$this->spouse_mobile_no->AdvancedSearch->save(); // spouse_mobile_no
			$this->Maritalstatus->AdvancedSearch->save(); // Maritalstatus
			$this->Business->AdvancedSearch->save(); // Business
			$this->Patient_Language->AdvancedSearch->save(); // Patient_Language
			$this->Passport->AdvancedSearch->save(); // Passport
			$this->VisaNo->AdvancedSearch->save(); // VisaNo
			$this->ValidityOfVisa->AdvancedSearch->save(); // ValidityOfVisa
			$this->WhereDidYouHear->AdvancedSearch->save(); // WhereDidYouHear
			$this->HospID->AdvancedSearch->save(); // HospID
			$this->street->AdvancedSearch->save(); // street
			$this->town->AdvancedSearch->save(); // town
			$this->province->AdvancedSearch->save(); // province
			$this->country->AdvancedSearch->save(); // country
			$this->postal_code->AdvancedSearch->save(); // postal_code
			$this->PEmail->AdvancedSearch->save(); // PEmail
			$this->PEmergencyContact->AdvancedSearch->save(); // PEmergencyContact
			$this->occupation->AdvancedSearch->save(); // occupation
			$this->spouse_occupation->AdvancedSearch->save(); // spouse_occupation
			$this->WhatsApp->AdvancedSearch->save(); // WhatsApp
			$this->CouppleID->AdvancedSearch->save(); // CouppleID
			$this->MaleID->AdvancedSearch->save(); // MaleID
			$this->FemaleID->AdvancedSearch->save(); // FemaleID
			$this->GroupID->AdvancedSearch->save(); // GroupID
			$this->Relationship->AdvancedSearch->save(); // Relationship
			$this->AppointmentSearch->AdvancedSearch->save(); // AppointmentSearch
			$this->FacebookID->AdvancedSearch->save(); // FacebookID
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
		$this->buildBasicSearchSql($where, $this->PatientID, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->title, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->first_name, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->middle_name, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->last_name, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->gender, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Age, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->mobile_no, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->description, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->profilePic, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->IdentificationMark, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Religion, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Nationality, $arKeywords, $type);
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
		$this->buildBasicSearchSql($where, $this->spouse_dob, $arKeywords, $type);
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
		$this->buildBasicSearchSql($where, $this->CouppleID, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->MaleID, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->FemaleID, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->GroupID, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Relationship, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->AppointmentSearch, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->FacebookID, $arKeywords, $type);
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
		if ($this->PatientID->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->title->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->first_name->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->middle_name->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->last_name->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->gender->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->dob->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->Age->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->blood_group->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->mobile_no->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->description->AdvancedSearch->issetSession())
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
		if ($this->profilePic->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->IdentificationMark->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->Religion->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->Nationality->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->ReferedByDr->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->ReferClinicname->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->ReferCity->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->ReferMobileNo->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->ReferA4TreatingConsultant->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->PurposreReferredfor->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->spouse_title->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->spouse_first_name->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->spouse_middle_name->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->spouse_last_name->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->spouse_gender->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->spouse_dob->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->spouse_Age->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->spouse_blood_group->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->spouse_mobile_no->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->Maritalstatus->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->Business->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->Patient_Language->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->Passport->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->VisaNo->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->ValidityOfVisa->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->WhereDidYouHear->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->HospID->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->street->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->town->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->province->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->country->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->postal_code->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->PEmail->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->PEmergencyContact->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->occupation->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->spouse_occupation->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->WhatsApp->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->CouppleID->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->MaleID->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->FemaleID->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->GroupID->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->Relationship->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->AppointmentSearch->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->FacebookID->AdvancedSearch->issetSession())
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
		$this->PatientID->AdvancedSearch->unsetSession();
		$this->title->AdvancedSearch->unsetSession();
		$this->first_name->AdvancedSearch->unsetSession();
		$this->middle_name->AdvancedSearch->unsetSession();
		$this->last_name->AdvancedSearch->unsetSession();
		$this->gender->AdvancedSearch->unsetSession();
		$this->dob->AdvancedSearch->unsetSession();
		$this->Age->AdvancedSearch->unsetSession();
		$this->blood_group->AdvancedSearch->unsetSession();
		$this->mobile_no->AdvancedSearch->unsetSession();
		$this->description->AdvancedSearch->unsetSession();
		$this->status->AdvancedSearch->unsetSession();
		$this->createdby->AdvancedSearch->unsetSession();
		$this->createddatetime->AdvancedSearch->unsetSession();
		$this->modifiedby->AdvancedSearch->unsetSession();
		$this->modifieddatetime->AdvancedSearch->unsetSession();
		$this->profilePic->AdvancedSearch->unsetSession();
		$this->IdentificationMark->AdvancedSearch->unsetSession();
		$this->Religion->AdvancedSearch->unsetSession();
		$this->Nationality->AdvancedSearch->unsetSession();
		$this->ReferedByDr->AdvancedSearch->unsetSession();
		$this->ReferClinicname->AdvancedSearch->unsetSession();
		$this->ReferCity->AdvancedSearch->unsetSession();
		$this->ReferMobileNo->AdvancedSearch->unsetSession();
		$this->ReferA4TreatingConsultant->AdvancedSearch->unsetSession();
		$this->PurposreReferredfor->AdvancedSearch->unsetSession();
		$this->spouse_title->AdvancedSearch->unsetSession();
		$this->spouse_first_name->AdvancedSearch->unsetSession();
		$this->spouse_middle_name->AdvancedSearch->unsetSession();
		$this->spouse_last_name->AdvancedSearch->unsetSession();
		$this->spouse_gender->AdvancedSearch->unsetSession();
		$this->spouse_dob->AdvancedSearch->unsetSession();
		$this->spouse_Age->AdvancedSearch->unsetSession();
		$this->spouse_blood_group->AdvancedSearch->unsetSession();
		$this->spouse_mobile_no->AdvancedSearch->unsetSession();
		$this->Maritalstatus->AdvancedSearch->unsetSession();
		$this->Business->AdvancedSearch->unsetSession();
		$this->Patient_Language->AdvancedSearch->unsetSession();
		$this->Passport->AdvancedSearch->unsetSession();
		$this->VisaNo->AdvancedSearch->unsetSession();
		$this->ValidityOfVisa->AdvancedSearch->unsetSession();
		$this->WhereDidYouHear->AdvancedSearch->unsetSession();
		$this->HospID->AdvancedSearch->unsetSession();
		$this->street->AdvancedSearch->unsetSession();
		$this->town->AdvancedSearch->unsetSession();
		$this->province->AdvancedSearch->unsetSession();
		$this->country->AdvancedSearch->unsetSession();
		$this->postal_code->AdvancedSearch->unsetSession();
		$this->PEmail->AdvancedSearch->unsetSession();
		$this->PEmergencyContact->AdvancedSearch->unsetSession();
		$this->occupation->AdvancedSearch->unsetSession();
		$this->spouse_occupation->AdvancedSearch->unsetSession();
		$this->WhatsApp->AdvancedSearch->unsetSession();
		$this->CouppleID->AdvancedSearch->unsetSession();
		$this->MaleID->AdvancedSearch->unsetSession();
		$this->FemaleID->AdvancedSearch->unsetSession();
		$this->GroupID->AdvancedSearch->unsetSession();
		$this->Relationship->AdvancedSearch->unsetSession();
		$this->AppointmentSearch->AdvancedSearch->unsetSession();
		$this->FacebookID->AdvancedSearch->unsetSession();
	}

	// Restore all search parameters
	protected function restoreSearchParms()
	{
		$this->RestoreSearch = TRUE;

		// Restore basic search values
		$this->BasicSearch->load();

		// Restore advanced search values
		$this->id->AdvancedSearch->load();
		$this->PatientID->AdvancedSearch->load();
		$this->title->AdvancedSearch->load();
		$this->first_name->AdvancedSearch->load();
		$this->middle_name->AdvancedSearch->load();
		$this->last_name->AdvancedSearch->load();
		$this->gender->AdvancedSearch->load();
		$this->dob->AdvancedSearch->load();
		$this->Age->AdvancedSearch->load();
		$this->blood_group->AdvancedSearch->load();
		$this->mobile_no->AdvancedSearch->load();
		$this->description->AdvancedSearch->load();
		$this->status->AdvancedSearch->load();
		$this->createdby->AdvancedSearch->load();
		$this->createddatetime->AdvancedSearch->load();
		$this->modifiedby->AdvancedSearch->load();
		$this->modifieddatetime->AdvancedSearch->load();
		$this->profilePic->AdvancedSearch->load();
		$this->IdentificationMark->AdvancedSearch->load();
		$this->Religion->AdvancedSearch->load();
		$this->Nationality->AdvancedSearch->load();
		$this->ReferedByDr->AdvancedSearch->load();
		$this->ReferClinicname->AdvancedSearch->load();
		$this->ReferCity->AdvancedSearch->load();
		$this->ReferMobileNo->AdvancedSearch->load();
		$this->ReferA4TreatingConsultant->AdvancedSearch->load();
		$this->PurposreReferredfor->AdvancedSearch->load();
		$this->spouse_title->AdvancedSearch->load();
		$this->spouse_first_name->AdvancedSearch->load();
		$this->spouse_middle_name->AdvancedSearch->load();
		$this->spouse_last_name->AdvancedSearch->load();
		$this->spouse_gender->AdvancedSearch->load();
		$this->spouse_dob->AdvancedSearch->load();
		$this->spouse_Age->AdvancedSearch->load();
		$this->spouse_blood_group->AdvancedSearch->load();
		$this->spouse_mobile_no->AdvancedSearch->load();
		$this->Maritalstatus->AdvancedSearch->load();
		$this->Business->AdvancedSearch->load();
		$this->Patient_Language->AdvancedSearch->load();
		$this->Passport->AdvancedSearch->load();
		$this->VisaNo->AdvancedSearch->load();
		$this->ValidityOfVisa->AdvancedSearch->load();
		$this->WhereDidYouHear->AdvancedSearch->load();
		$this->HospID->AdvancedSearch->load();
		$this->street->AdvancedSearch->load();
		$this->town->AdvancedSearch->load();
		$this->province->AdvancedSearch->load();
		$this->country->AdvancedSearch->load();
		$this->postal_code->AdvancedSearch->load();
		$this->PEmail->AdvancedSearch->load();
		$this->PEmergencyContact->AdvancedSearch->load();
		$this->occupation->AdvancedSearch->load();
		$this->spouse_occupation->AdvancedSearch->load();
		$this->WhatsApp->AdvancedSearch->load();
		$this->CouppleID->AdvancedSearch->load();
		$this->MaleID->AdvancedSearch->load();
		$this->FemaleID->AdvancedSearch->load();
		$this->GroupID->AdvancedSearch->load();
		$this->Relationship->AdvancedSearch->load();
		$this->AppointmentSearch->AdvancedSearch->load();
		$this->FacebookID->AdvancedSearch->load();
	}

	// Set up sort parameters
	protected function setupSortOrder()
	{

		// Check for "order" parameter
		if (Get("order") !== NULL) {
			$this->CurrentOrder = Get("order");
			$this->CurrentOrderType = Get("ordertype", "");
			$this->updateSort($this->id); // id
			$this->updateSort($this->PatientID); // PatientID
			$this->updateSort($this->title); // title
			$this->updateSort($this->first_name); // first_name
			$this->updateSort($this->gender); // gender
			$this->updateSort($this->dob); // dob
			$this->updateSort($this->Age); // Age
			$this->updateSort($this->blood_group); // blood_group
			$this->updateSort($this->mobile_no); // mobile_no
			$this->updateSort($this->status); // status
			$this->updateSort($this->createddatetime); // createddatetime
			$this->updateSort($this->profilePic); // profilePic
			$this->updateSort($this->IdentificationMark); // IdentificationMark
			$this->updateSort($this->Religion); // Religion
			$this->updateSort($this->Nationality); // Nationality
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

			// Reset sorting order
			if ($this->Command == "resetsort") {
				$orderBy = "";
				$this->setSessionOrderBy($orderBy);
				$this->setSessionOrderByList($orderBy);
				$this->id->setSort("");
				$this->PatientID->setSort("");
				$this->title->setSort("");
				$this->first_name->setSort("");
				$this->gender->setSort("");
				$this->dob->setSort("");
				$this->Age->setSort("");
				$this->blood_group->setSort("");
				$this->mobile_no->setSort("");
				$this->status->setSort("");
				$this->createddatetime->setSort("");
				$this->profilePic->setSort("");
				$this->IdentificationMark->setSort("");
				$this->Religion->setSort("");
				$this->Nationality->setSort("");
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

		// "detail_patient_address"
		$item = &$this->ListOptions->add("detail_patient_address");
		$item->CssClass = "text-nowrap";
		$item->Visible = $Security->allowList(CurrentProjectID() . 'patient_address') && !$this->ShowMultipleDetails;
		$item->OnLeft = TRUE;
		$item->ShowInButtonGroup = FALSE;
		if (!isset($GLOBALS["patient_address_grid"]))
			$GLOBALS["patient_address_grid"] = new patient_address_grid();

		// "detail_patient_email"
		$item = &$this->ListOptions->add("detail_patient_email");
		$item->CssClass = "text-nowrap";
		$item->Visible = $Security->allowList(CurrentProjectID() . 'patient_email') && !$this->ShowMultipleDetails;
		$item->OnLeft = TRUE;
		$item->ShowInButtonGroup = FALSE;
		if (!isset($GLOBALS["patient_email_grid"]))
			$GLOBALS["patient_email_grid"] = new patient_email_grid();

		// "detail_patient_telephone"
		$item = &$this->ListOptions->add("detail_patient_telephone");
		$item->CssClass = "text-nowrap";
		$item->Visible = $Security->allowList(CurrentProjectID() . 'patient_telephone') && !$this->ShowMultipleDetails;
		$item->OnLeft = TRUE;
		$item->ShowInButtonGroup = FALSE;
		if (!isset($GLOBALS["patient_telephone_grid"]))
			$GLOBALS["patient_telephone_grid"] = new patient_telephone_grid();

		// "detail_patient_emergency_contact"
		$item = &$this->ListOptions->add("detail_patient_emergency_contact");
		$item->CssClass = "text-nowrap";
		$item->Visible = $Security->allowList(CurrentProjectID() . 'patient_emergency_contact') && !$this->ShowMultipleDetails;
		$item->OnLeft = TRUE;
		$item->ShowInButtonGroup = FALSE;
		if (!isset($GLOBALS["patient_emergency_contact_grid"]))
			$GLOBALS["patient_emergency_contact_grid"] = new patient_emergency_contact_grid();

		// "detail_patient_document"
		$item = &$this->ListOptions->add("detail_patient_document");
		$item->CssClass = "text-nowrap";
		$item->Visible = $Security->allowList(CurrentProjectID() . 'patient_document') && !$this->ShowMultipleDetails;
		$item->OnLeft = TRUE;
		$item->ShowInButtonGroup = FALSE;
		if (!isset($GLOBALS["patient_document_grid"]))
			$GLOBALS["patient_document_grid"] = new patient_document_grid();

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
		$pages->add("patient_address");
		$pages->add("patient_email");
		$pages->add("patient_telephone");
		$pages->add("patient_emergency_contact");
		$pages->add("patient_document");
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
		$this->ListOptions->UseDropDownButton = TRUE;
		$this->ListOptions->DropDownButtonPhrase = $Language->phrase("ButtonListOptions");
		$this->ListOptions->UseButtonGroup = FALSE;
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

		// "detail_patient_address"
		$opt = $this->ListOptions["detail_patient_address"];
		if ($Security->allowList(CurrentProjectID() . 'patient_address')) {
			$body = $Language->phrase("DetailLink") . $Language->TablePhrase("patient_address", "TblCaption");
			$body = "<a class=\"btn btn-default ew-row-link ew-detail\" data-action=\"list\" href=\"" . HtmlEncode("patient_addresslist.php?" . Config("TABLE_SHOW_MASTER") . "=patient&fk_id=" . urlencode(strval($this->id->CurrentValue)) . "") . "\">" . $body . "</a>";
			$links = "";
			if ($GLOBALS["patient_address_grid"]->DetailView && $Security->canView() && $Security->allowView(CurrentProjectID() . 'patient')) {
				$caption = $Language->phrase("MasterDetailViewLink");
				$url = $this->getViewUrl(Config("TABLE_SHOW_DETAIL") . "=patient_address");
				$links .= "<li><a class=\"dropdown-item ew-row-link ew-detail-view\" data-action=\"view\" data-caption=\"" . HtmlTitle($caption) . "\" href=\"" . HtmlEncode($url) . "\">" . HtmlImageAndText($caption) . "</a></li>";
				if ($detailViewTblVar != "")
					$detailViewTblVar .= ",";
				$detailViewTblVar .= "patient_address";
			}
			if ($GLOBALS["patient_address_grid"]->DetailEdit && $Security->canEdit() && $Security->allowEdit(CurrentProjectID() . 'patient')) {
				$caption = $Language->phrase("MasterDetailEditLink");
				$url = $this->getEditUrl(Config("TABLE_SHOW_DETAIL") . "=patient_address");
				$links .= "<li><a class=\"dropdown-item ew-row-link ew-detail-edit\" data-action=\"edit\" data-caption=\"" . HtmlTitle($caption) . "\" href=\"" . HtmlEncode($url) . "\">" . HtmlImageAndText($caption) . "</a></li>";
				if ($detailEditTblVar != "")
					$detailEditTblVar .= ",";
				$detailEditTblVar .= "patient_address";
			}
			if ($GLOBALS["patient_address_grid"]->DetailAdd && $Security->canAdd() && $Security->allowAdd(CurrentProjectID() . 'patient')) {
				$caption = $Language->phrase("MasterDetailCopyLink");
				$url = $this->getCopyUrl(Config("TABLE_SHOW_DETAIL") . "=patient_address");
				$links .= "<li><a class=\"dropdown-item ew-row-link ew-detail-copy\" data-action=\"add\" data-caption=\"" . HtmlTitle($caption) . "\" href=\"" . HtmlEncode($url) . "\">" . HtmlImageAndText($caption) . "</a></li>";
				if ($detailCopyTblVar != "")
					$detailCopyTblVar .= ",";
				$detailCopyTblVar .= "patient_address";
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

		// "detail_patient_email"
		$opt = $this->ListOptions["detail_patient_email"];
		if ($Security->allowList(CurrentProjectID() . 'patient_email')) {
			$body = $Language->phrase("DetailLink") . $Language->TablePhrase("patient_email", "TblCaption");
			$body = "<a class=\"btn btn-default ew-row-link ew-detail\" data-action=\"list\" href=\"" . HtmlEncode("patient_emaillist.php?" . Config("TABLE_SHOW_MASTER") . "=patient&fk_id=" . urlencode(strval($this->id->CurrentValue)) . "") . "\">" . $body . "</a>";
			$links = "";
			if ($GLOBALS["patient_email_grid"]->DetailView && $Security->canView() && $Security->allowView(CurrentProjectID() . 'patient')) {
				$caption = $Language->phrase("MasterDetailViewLink");
				$url = $this->getViewUrl(Config("TABLE_SHOW_DETAIL") . "=patient_email");
				$links .= "<li><a class=\"dropdown-item ew-row-link ew-detail-view\" data-action=\"view\" data-caption=\"" . HtmlTitle($caption) . "\" href=\"" . HtmlEncode($url) . "\">" . HtmlImageAndText($caption) . "</a></li>";
				if ($detailViewTblVar != "")
					$detailViewTblVar .= ",";
				$detailViewTblVar .= "patient_email";
			}
			if ($GLOBALS["patient_email_grid"]->DetailEdit && $Security->canEdit() && $Security->allowEdit(CurrentProjectID() . 'patient')) {
				$caption = $Language->phrase("MasterDetailEditLink");
				$url = $this->getEditUrl(Config("TABLE_SHOW_DETAIL") . "=patient_email");
				$links .= "<li><a class=\"dropdown-item ew-row-link ew-detail-edit\" data-action=\"edit\" data-caption=\"" . HtmlTitle($caption) . "\" href=\"" . HtmlEncode($url) . "\">" . HtmlImageAndText($caption) . "</a></li>";
				if ($detailEditTblVar != "")
					$detailEditTblVar .= ",";
				$detailEditTblVar .= "patient_email";
			}
			if ($GLOBALS["patient_email_grid"]->DetailAdd && $Security->canAdd() && $Security->allowAdd(CurrentProjectID() . 'patient')) {
				$caption = $Language->phrase("MasterDetailCopyLink");
				$url = $this->getCopyUrl(Config("TABLE_SHOW_DETAIL") . "=patient_email");
				$links .= "<li><a class=\"dropdown-item ew-row-link ew-detail-copy\" data-action=\"add\" data-caption=\"" . HtmlTitle($caption) . "\" href=\"" . HtmlEncode($url) . "\">" . HtmlImageAndText($caption) . "</a></li>";
				if ($detailCopyTblVar != "")
					$detailCopyTblVar .= ",";
				$detailCopyTblVar .= "patient_email";
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

		// "detail_patient_telephone"
		$opt = $this->ListOptions["detail_patient_telephone"];
		if ($Security->allowList(CurrentProjectID() . 'patient_telephone')) {
			$body = $Language->phrase("DetailLink") . $Language->TablePhrase("patient_telephone", "TblCaption");
			$body = "<a class=\"btn btn-default ew-row-link ew-detail\" data-action=\"list\" href=\"" . HtmlEncode("patient_telephonelist.php?" . Config("TABLE_SHOW_MASTER") . "=patient&fk_id=" . urlencode(strval($this->id->CurrentValue)) . "") . "\">" . $body . "</a>";
			$links = "";
			if ($GLOBALS["patient_telephone_grid"]->DetailView && $Security->canView() && $Security->allowView(CurrentProjectID() . 'patient')) {
				$caption = $Language->phrase("MasterDetailViewLink");
				$url = $this->getViewUrl(Config("TABLE_SHOW_DETAIL") . "=patient_telephone");
				$links .= "<li><a class=\"dropdown-item ew-row-link ew-detail-view\" data-action=\"view\" data-caption=\"" . HtmlTitle($caption) . "\" href=\"" . HtmlEncode($url) . "\">" . HtmlImageAndText($caption) . "</a></li>";
				if ($detailViewTblVar != "")
					$detailViewTblVar .= ",";
				$detailViewTblVar .= "patient_telephone";
			}
			if ($GLOBALS["patient_telephone_grid"]->DetailEdit && $Security->canEdit() && $Security->allowEdit(CurrentProjectID() . 'patient')) {
				$caption = $Language->phrase("MasterDetailEditLink");
				$url = $this->getEditUrl(Config("TABLE_SHOW_DETAIL") . "=patient_telephone");
				$links .= "<li><a class=\"dropdown-item ew-row-link ew-detail-edit\" data-action=\"edit\" data-caption=\"" . HtmlTitle($caption) . "\" href=\"" . HtmlEncode($url) . "\">" . HtmlImageAndText($caption) . "</a></li>";
				if ($detailEditTblVar != "")
					$detailEditTblVar .= ",";
				$detailEditTblVar .= "patient_telephone";
			}
			if ($GLOBALS["patient_telephone_grid"]->DetailAdd && $Security->canAdd() && $Security->allowAdd(CurrentProjectID() . 'patient')) {
				$caption = $Language->phrase("MasterDetailCopyLink");
				$url = $this->getCopyUrl(Config("TABLE_SHOW_DETAIL") . "=patient_telephone");
				$links .= "<li><a class=\"dropdown-item ew-row-link ew-detail-copy\" data-action=\"add\" data-caption=\"" . HtmlTitle($caption) . "\" href=\"" . HtmlEncode($url) . "\">" . HtmlImageAndText($caption) . "</a></li>";
				if ($detailCopyTblVar != "")
					$detailCopyTblVar .= ",";
				$detailCopyTblVar .= "patient_telephone";
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

		// "detail_patient_emergency_contact"
		$opt = $this->ListOptions["detail_patient_emergency_contact"];
		if ($Security->allowList(CurrentProjectID() . 'patient_emergency_contact')) {
			$body = $Language->phrase("DetailLink") . $Language->TablePhrase("patient_emergency_contact", "TblCaption");
			$body = "<a class=\"btn btn-default ew-row-link ew-detail\" data-action=\"list\" href=\"" . HtmlEncode("patient_emergency_contactlist.php?" . Config("TABLE_SHOW_MASTER") . "=patient&fk_id=" . urlencode(strval($this->id->CurrentValue)) . "") . "\">" . $body . "</a>";
			$links = "";
			if ($GLOBALS["patient_emergency_contact_grid"]->DetailView && $Security->canView() && $Security->allowView(CurrentProjectID() . 'patient')) {
				$caption = $Language->phrase("MasterDetailViewLink");
				$url = $this->getViewUrl(Config("TABLE_SHOW_DETAIL") . "=patient_emergency_contact");
				$links .= "<li><a class=\"dropdown-item ew-row-link ew-detail-view\" data-action=\"view\" data-caption=\"" . HtmlTitle($caption) . "\" href=\"" . HtmlEncode($url) . "\">" . HtmlImageAndText($caption) . "</a></li>";
				if ($detailViewTblVar != "")
					$detailViewTblVar .= ",";
				$detailViewTblVar .= "patient_emergency_contact";
			}
			if ($GLOBALS["patient_emergency_contact_grid"]->DetailEdit && $Security->canEdit() && $Security->allowEdit(CurrentProjectID() . 'patient')) {
				$caption = $Language->phrase("MasterDetailEditLink");
				$url = $this->getEditUrl(Config("TABLE_SHOW_DETAIL") . "=patient_emergency_contact");
				$links .= "<li><a class=\"dropdown-item ew-row-link ew-detail-edit\" data-action=\"edit\" data-caption=\"" . HtmlTitle($caption) . "\" href=\"" . HtmlEncode($url) . "\">" . HtmlImageAndText($caption) . "</a></li>";
				if ($detailEditTblVar != "")
					$detailEditTblVar .= ",";
				$detailEditTblVar .= "patient_emergency_contact";
			}
			if ($GLOBALS["patient_emergency_contact_grid"]->DetailAdd && $Security->canAdd() && $Security->allowAdd(CurrentProjectID() . 'patient')) {
				$caption = $Language->phrase("MasterDetailCopyLink");
				$url = $this->getCopyUrl(Config("TABLE_SHOW_DETAIL") . "=patient_emergency_contact");
				$links .= "<li><a class=\"dropdown-item ew-row-link ew-detail-copy\" data-action=\"add\" data-caption=\"" . HtmlTitle($caption) . "\" href=\"" . HtmlEncode($url) . "\">" . HtmlImageAndText($caption) . "</a></li>";
				if ($detailCopyTblVar != "")
					$detailCopyTblVar .= ",";
				$detailCopyTblVar .= "patient_emergency_contact";
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

		// "detail_patient_document"
		$opt = $this->ListOptions["detail_patient_document"];
		if ($Security->allowList(CurrentProjectID() . 'patient_document')) {
			$body = $Language->phrase("DetailLink") . $Language->TablePhrase("patient_document", "TblCaption");
			$body = "<a class=\"btn btn-default ew-row-link ew-detail\" data-action=\"list\" href=\"" . HtmlEncode("patient_documentlist.php?" . Config("TABLE_SHOW_MASTER") . "=patient&fk_id=" . urlencode(strval($this->id->CurrentValue)) . "") . "\">" . $body . "</a>";
			$links = "";
			if ($GLOBALS["patient_document_grid"]->DetailView && $Security->canView() && $Security->allowView(CurrentProjectID() . 'patient')) {
				$caption = $Language->phrase("MasterDetailViewLink");
				$url = $this->getViewUrl(Config("TABLE_SHOW_DETAIL") . "=patient_document");
				$links .= "<li><a class=\"dropdown-item ew-row-link ew-detail-view\" data-action=\"view\" data-caption=\"" . HtmlTitle($caption) . "\" href=\"" . HtmlEncode($url) . "\">" . HtmlImageAndText($caption) . "</a></li>";
				if ($detailViewTblVar != "")
					$detailViewTblVar .= ",";
				$detailViewTblVar .= "patient_document";
			}
			if ($GLOBALS["patient_document_grid"]->DetailEdit && $Security->canEdit() && $Security->allowEdit(CurrentProjectID() . 'patient')) {
				$caption = $Language->phrase("MasterDetailEditLink");
				$url = $this->getEditUrl(Config("TABLE_SHOW_DETAIL") . "=patient_document");
				$links .= "<li><a class=\"dropdown-item ew-row-link ew-detail-edit\" data-action=\"edit\" data-caption=\"" . HtmlTitle($caption) . "\" href=\"" . HtmlEncode($url) . "\">" . HtmlImageAndText($caption) . "</a></li>";
				if ($detailEditTblVar != "")
					$detailEditTblVar .= ",";
				$detailEditTblVar .= "patient_document";
			}
			if ($GLOBALS["patient_document_grid"]->DetailAdd && $Security->canAdd() && $Security->allowAdd(CurrentProjectID() . 'patient')) {
				$caption = $Language->phrase("MasterDetailCopyLink");
				$url = $this->getCopyUrl(Config("TABLE_SHOW_DETAIL") . "=patient_document");
				$links .= "<li><a class=\"dropdown-item ew-row-link ew-detail-copy\" data-action=\"add\" data-caption=\"" . HtmlTitle($caption) . "\" href=\"" . HtmlEncode($url) . "\">" . HtmlImageAndText($caption) . "</a></li>";
				if ($detailCopyTblVar != "")
					$detailCopyTblVar .= ",";
				$detailCopyTblVar .= "patient_document";
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
		$opt->Body = "<div class=\"custom-control custom-checkbox d-inline-block\"><input type=\"checkbox\" id=\"key_m_" . $this->RowCount . "\" name=\"key_m[]\" class=\"custom-control-input ew-multi-select\" value=\"" . HtmlEncode($this->id->CurrentValue . Config("COMPOSITE_KEY_SEPARATOR") . $this->PatientID->CurrentValue) . "\" onclick=\"ew.clickMultiCheckbox(event);\"><label class=\"custom-control-label\" for=\"key_m_" . $this->RowCount . "\"></label></div>";
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
		$item = &$option->add("detailadd_patient_address");
		$url = $this->getAddUrl(Config("TABLE_SHOW_DETAIL") . "=patient_address");
		if (!isset($GLOBALS["patient_address"]))
			$GLOBALS["patient_address"] = new patient_address();
		$caption = $Language->phrase("Add") . "&nbsp;" . $this->tableCaption() . "/" . $GLOBALS["patient_address"]->tableCaption();
		$item->Body = "<a class=\"ew-detail-add-group ew-detail-add\" title=\"" . HtmlTitle($caption) . "\" data-caption=\"" . HtmlTitle($caption) . "\" href=\"" . HtmlEncode($url) . "\">" . $caption . "</a>";
		$item->Visible = ($GLOBALS["patient_address"]->DetailAdd && $Security->allowAdd(CurrentProjectID() . 'patient') && $Security->canAdd());
		if ($item->Visible) {
			if ($detailTableLink != "")
				$detailTableLink .= ",";
			$detailTableLink .= "patient_address";
		}
		$item = &$option->add("detailadd_patient_email");
		$url = $this->getAddUrl(Config("TABLE_SHOW_DETAIL") . "=patient_email");
		if (!isset($GLOBALS["patient_email"]))
			$GLOBALS["patient_email"] = new patient_email();
		$caption = $Language->phrase("Add") . "&nbsp;" . $this->tableCaption() . "/" . $GLOBALS["patient_email"]->tableCaption();
		$item->Body = "<a class=\"ew-detail-add-group ew-detail-add\" title=\"" . HtmlTitle($caption) . "\" data-caption=\"" . HtmlTitle($caption) . "\" href=\"" . HtmlEncode($url) . "\">" . $caption . "</a>";
		$item->Visible = ($GLOBALS["patient_email"]->DetailAdd && $Security->allowAdd(CurrentProjectID() . 'patient') && $Security->canAdd());
		if ($item->Visible) {
			if ($detailTableLink != "")
				$detailTableLink .= ",";
			$detailTableLink .= "patient_email";
		}
		$item = &$option->add("detailadd_patient_telephone");
		$url = $this->getAddUrl(Config("TABLE_SHOW_DETAIL") . "=patient_telephone");
		if (!isset($GLOBALS["patient_telephone"]))
			$GLOBALS["patient_telephone"] = new patient_telephone();
		$caption = $Language->phrase("Add") . "&nbsp;" . $this->tableCaption() . "/" . $GLOBALS["patient_telephone"]->tableCaption();
		$item->Body = "<a class=\"ew-detail-add-group ew-detail-add\" title=\"" . HtmlTitle($caption) . "\" data-caption=\"" . HtmlTitle($caption) . "\" href=\"" . HtmlEncode($url) . "\">" . $caption . "</a>";
		$item->Visible = ($GLOBALS["patient_telephone"]->DetailAdd && $Security->allowAdd(CurrentProjectID() . 'patient') && $Security->canAdd());
		if ($item->Visible) {
			if ($detailTableLink != "")
				$detailTableLink .= ",";
			$detailTableLink .= "patient_telephone";
		}
		$item = &$option->add("detailadd_patient_emergency_contact");
		$url = $this->getAddUrl(Config("TABLE_SHOW_DETAIL") . "=patient_emergency_contact");
		if (!isset($GLOBALS["patient_emergency_contact"]))
			$GLOBALS["patient_emergency_contact"] = new patient_emergency_contact();
		$caption = $Language->phrase("Add") . "&nbsp;" . $this->tableCaption() . "/" . $GLOBALS["patient_emergency_contact"]->tableCaption();
		$item->Body = "<a class=\"ew-detail-add-group ew-detail-add\" title=\"" . HtmlTitle($caption) . "\" data-caption=\"" . HtmlTitle($caption) . "\" href=\"" . HtmlEncode($url) . "\">" . $caption . "</a>";
		$item->Visible = ($GLOBALS["patient_emergency_contact"]->DetailAdd && $Security->allowAdd(CurrentProjectID() . 'patient') && $Security->canAdd());
		if ($item->Visible) {
			if ($detailTableLink != "")
				$detailTableLink .= ",";
			$detailTableLink .= "patient_emergency_contact";
		}
		$item = &$option->add("detailadd_patient_document");
		$url = $this->getAddUrl(Config("TABLE_SHOW_DETAIL") . "=patient_document");
		if (!isset($GLOBALS["patient_document"]))
			$GLOBALS["patient_document"] = new patient_document();
		$caption = $Language->phrase("Add") . "&nbsp;" . $this->tableCaption() . "/" . $GLOBALS["patient_document"]->tableCaption();
		$item->Body = "<a class=\"ew-detail-add-group ew-detail-add\" title=\"" . HtmlTitle($caption) . "\" data-caption=\"" . HtmlTitle($caption) . "\" href=\"" . HtmlEncode($url) . "\">" . $caption . "</a>";
		$item->Visible = ($GLOBALS["patient_document"]->DetailAdd && $Security->allowAdd(CurrentProjectID() . 'patient') && $Security->canAdd());
		if ($item->Visible) {
			if ($detailTableLink != "")
				$detailTableLink .= ",";
			$detailTableLink .= "patient_document";
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
		$item->Body = "<a class=\"ew-save-filter\" data-form=\"fpatientlistsrch\" href=\"#\" onclick=\"return false;\">" . $Language->phrase("SaveCurrentFilter") . "</a>";
		$item->Visible = TRUE;
		$item = &$this->FilterOptions->add("deletefilter");
		$item->Body = "<a class=\"ew-delete-filter\" data-form=\"fpatientlistsrch\" href=\"#\" onclick=\"return false;\">" . $Language->phrase("DeleteFilter") . "</a>";
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
					$item->Body = "<a class=\"ew-action ew-list-action\" title=\"" . HtmlEncode($caption) . "\" data-caption=\"" . HtmlEncode($caption) . "\" href=\"#\" onclick=\"return ew.submitAction(event,jQuery.extend({f:document.fpatientlist}," . $listaction->toJson(TRUE) . "));\">" . $icon . "</a>";
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
		$sqlwrk = "`patient_id`=" . AdjustSql($this->id->CurrentValue, $this->Dbid) . "";

		// Column "detail_patient_address"
		if ($this->DetailPages && $this->DetailPages["patient_address"] && $this->DetailPages["patient_address"]->Visible) {
			$link = "";
			$option = $this->ListOptions["detail_patient_address"];
			$url = "patient_addresspreview.php?t=patient&f=" . Encrypt($sqlwrk);
			$btngrp = "<div data-table=\"patient_address\" data-url=\"" . $url . "\">";
			if ($Security->allowList(CurrentProjectID() . 'patient')) {
				$label = $Language->TablePhrase("patient_address", "TblCaption");
				$link = "<li class=\"nav-item\"><a href=\"#\" class=\"nav-link\" data-toggle=\"tab\" data-table=\"patient_address\" data-url=\"" . $url . "\">" . $label . "</a></li>";
				$links .= $link;
				$detaillnk = JsEncodeAttribute("patient_addresslist.php?" . Config("TABLE_SHOW_MASTER") . "=patient&fk_id=" . urlencode(strval($this->id->CurrentValue)) . "");
				$btngrp .= "<a href=\"#\" class=\"mr-2\" title=\"" . $Language->TablePhrase("patient_address", "TblCaption") . "\" onclick=\"window.location='" . $detaillnk . "';return false;\">" . $Language->phrase("MasterDetailListLink") . "</a>";
			}
			if (!isset($GLOBALS["patient_address_grid"]))
				$GLOBALS["patient_address_grid"] = new patient_address_grid();
			if ($GLOBALS["patient_address_grid"]->DetailView && $Security->canView() && $Security->allowView(CurrentProjectID() . 'patient')) {
				$caption = $Language->phrase("MasterDetailViewLink");
				$url = $this->getViewUrl(Config("TABLE_SHOW_DETAIL") . "=patient_address");
				$btngrp .= "<a href=\"#\" class=\"mr-2\" title=\"" . HtmlTitle($caption) . "\" onclick=\"window.location='" . HtmlEncode($url) . "';return false;\">" . $caption . "</a>";
			}
			if ($GLOBALS["patient_address_grid"]->DetailEdit && $Security->canEdit() && $Security->allowEdit(CurrentProjectID() . 'patient')) {
				$caption = $Language->phrase("MasterDetailEditLink");
				$url = $this->getEditUrl(Config("TABLE_SHOW_DETAIL") . "=patient_address");
				$btngrp .= "<a href=\"#\" class=\"mr-2\" title=\"" . HtmlTitle($caption) . "\" onclick=\"window.location='" . HtmlEncode($url) . "';return false;\">" . $caption . "</a>";
			}
			if ($GLOBALS["patient_address_grid"]->DetailAdd && $Security->canAdd() && $Security->allowAdd(CurrentProjectID() . 'patient')) {
				$caption = $Language->phrase("MasterDetailCopyLink");
				$url = $this->getCopyUrl(Config("TABLE_SHOW_DETAIL") . "=patient_address");
				$btngrp .= "<a href=\"#\" class=\"mr-2\" title=\"" . HtmlTitle($caption) . "\" onclick=\"window.location='" . HtmlEncode($url) . "';return false;\">" . $caption . "</a>";
			}
			$btngrp .= "</div>";
			if ($link != "") {
				$btngrps .= $btngrp;
				$option->Body .= "<div class=\"d-none ew-preview\">" . $link . $btngrp . "</div>";
			}
		}
		$sqlwrk = "`patient_id`=" . AdjustSql($this->id->CurrentValue, $this->Dbid) . "";

		// Column "detail_patient_email"
		if ($this->DetailPages && $this->DetailPages["patient_email"] && $this->DetailPages["patient_email"]->Visible) {
			$link = "";
			$option = $this->ListOptions["detail_patient_email"];
			$url = "patient_emailpreview.php?t=patient&f=" . Encrypt($sqlwrk);
			$btngrp = "<div data-table=\"patient_email\" data-url=\"" . $url . "\">";
			if ($Security->allowList(CurrentProjectID() . 'patient')) {
				$label = $Language->TablePhrase("patient_email", "TblCaption");
				$link = "<li class=\"nav-item\"><a href=\"#\" class=\"nav-link\" data-toggle=\"tab\" data-table=\"patient_email\" data-url=\"" . $url . "\">" . $label . "</a></li>";
				$links .= $link;
				$detaillnk = JsEncodeAttribute("patient_emaillist.php?" . Config("TABLE_SHOW_MASTER") . "=patient&fk_id=" . urlencode(strval($this->id->CurrentValue)) . "");
				$btngrp .= "<a href=\"#\" class=\"mr-2\" title=\"" . $Language->TablePhrase("patient_email", "TblCaption") . "\" onclick=\"window.location='" . $detaillnk . "';return false;\">" . $Language->phrase("MasterDetailListLink") . "</a>";
			}
			if (!isset($GLOBALS["patient_email_grid"]))
				$GLOBALS["patient_email_grid"] = new patient_email_grid();
			if ($GLOBALS["patient_email_grid"]->DetailView && $Security->canView() && $Security->allowView(CurrentProjectID() . 'patient')) {
				$caption = $Language->phrase("MasterDetailViewLink");
				$url = $this->getViewUrl(Config("TABLE_SHOW_DETAIL") . "=patient_email");
				$btngrp .= "<a href=\"#\" class=\"mr-2\" title=\"" . HtmlTitle($caption) . "\" onclick=\"window.location='" . HtmlEncode($url) . "';return false;\">" . $caption . "</a>";
			}
			if ($GLOBALS["patient_email_grid"]->DetailEdit && $Security->canEdit() && $Security->allowEdit(CurrentProjectID() . 'patient')) {
				$caption = $Language->phrase("MasterDetailEditLink");
				$url = $this->getEditUrl(Config("TABLE_SHOW_DETAIL") . "=patient_email");
				$btngrp .= "<a href=\"#\" class=\"mr-2\" title=\"" . HtmlTitle($caption) . "\" onclick=\"window.location='" . HtmlEncode($url) . "';return false;\">" . $caption . "</a>";
			}
			if ($GLOBALS["patient_email_grid"]->DetailAdd && $Security->canAdd() && $Security->allowAdd(CurrentProjectID() . 'patient')) {
				$caption = $Language->phrase("MasterDetailCopyLink");
				$url = $this->getCopyUrl(Config("TABLE_SHOW_DETAIL") . "=patient_email");
				$btngrp .= "<a href=\"#\" class=\"mr-2\" title=\"" . HtmlTitle($caption) . "\" onclick=\"window.location='" . HtmlEncode($url) . "';return false;\">" . $caption . "</a>";
			}
			$btngrp .= "</div>";
			if ($link != "") {
				$btngrps .= $btngrp;
				$option->Body .= "<div class=\"d-none ew-preview\">" . $link . $btngrp . "</div>";
			}
		}
		$sqlwrk = "`patient_id`=" . AdjustSql($this->id->CurrentValue, $this->Dbid) . "";

		// Column "detail_patient_telephone"
		if ($this->DetailPages && $this->DetailPages["patient_telephone"] && $this->DetailPages["patient_telephone"]->Visible) {
			$link = "";
			$option = $this->ListOptions["detail_patient_telephone"];
			$url = "patient_telephonepreview.php?t=patient&f=" . Encrypt($sqlwrk);
			$btngrp = "<div data-table=\"patient_telephone\" data-url=\"" . $url . "\">";
			if ($Security->allowList(CurrentProjectID() . 'patient')) {
				$label = $Language->TablePhrase("patient_telephone", "TblCaption");
				$link = "<li class=\"nav-item\"><a href=\"#\" class=\"nav-link\" data-toggle=\"tab\" data-table=\"patient_telephone\" data-url=\"" . $url . "\">" . $label . "</a></li>";
				$links .= $link;
				$detaillnk = JsEncodeAttribute("patient_telephonelist.php?" . Config("TABLE_SHOW_MASTER") . "=patient&fk_id=" . urlencode(strval($this->id->CurrentValue)) . "");
				$btngrp .= "<a href=\"#\" class=\"mr-2\" title=\"" . $Language->TablePhrase("patient_telephone", "TblCaption") . "\" onclick=\"window.location='" . $detaillnk . "';return false;\">" . $Language->phrase("MasterDetailListLink") . "</a>";
			}
			if (!isset($GLOBALS["patient_telephone_grid"]))
				$GLOBALS["patient_telephone_grid"] = new patient_telephone_grid();
			if ($GLOBALS["patient_telephone_grid"]->DetailView && $Security->canView() && $Security->allowView(CurrentProjectID() . 'patient')) {
				$caption = $Language->phrase("MasterDetailViewLink");
				$url = $this->getViewUrl(Config("TABLE_SHOW_DETAIL") . "=patient_telephone");
				$btngrp .= "<a href=\"#\" class=\"mr-2\" title=\"" . HtmlTitle($caption) . "\" onclick=\"window.location='" . HtmlEncode($url) . "';return false;\">" . $caption . "</a>";
			}
			if ($GLOBALS["patient_telephone_grid"]->DetailEdit && $Security->canEdit() && $Security->allowEdit(CurrentProjectID() . 'patient')) {
				$caption = $Language->phrase("MasterDetailEditLink");
				$url = $this->getEditUrl(Config("TABLE_SHOW_DETAIL") . "=patient_telephone");
				$btngrp .= "<a href=\"#\" class=\"mr-2\" title=\"" . HtmlTitle($caption) . "\" onclick=\"window.location='" . HtmlEncode($url) . "';return false;\">" . $caption . "</a>";
			}
			if ($GLOBALS["patient_telephone_grid"]->DetailAdd && $Security->canAdd() && $Security->allowAdd(CurrentProjectID() . 'patient')) {
				$caption = $Language->phrase("MasterDetailCopyLink");
				$url = $this->getCopyUrl(Config("TABLE_SHOW_DETAIL") . "=patient_telephone");
				$btngrp .= "<a href=\"#\" class=\"mr-2\" title=\"" . HtmlTitle($caption) . "\" onclick=\"window.location='" . HtmlEncode($url) . "';return false;\">" . $caption . "</a>";
			}
			$btngrp .= "</div>";
			if ($link != "") {
				$btngrps .= $btngrp;
				$option->Body .= "<div class=\"d-none ew-preview\">" . $link . $btngrp . "</div>";
			}
		}
		$sqlwrk = "`patient_id`=" . AdjustSql($this->id->CurrentValue, $this->Dbid) . "";

		// Column "detail_patient_emergency_contact"
		if ($this->DetailPages && $this->DetailPages["patient_emergency_contact"] && $this->DetailPages["patient_emergency_contact"]->Visible) {
			$link = "";
			$option = $this->ListOptions["detail_patient_emergency_contact"];
			$url = "patient_emergency_contactpreview.php?t=patient&f=" . Encrypt($sqlwrk);
			$btngrp = "<div data-table=\"patient_emergency_contact\" data-url=\"" . $url . "\">";
			if ($Security->allowList(CurrentProjectID() . 'patient')) {
				$label = $Language->TablePhrase("patient_emergency_contact", "TblCaption");
				$link = "<li class=\"nav-item\"><a href=\"#\" class=\"nav-link\" data-toggle=\"tab\" data-table=\"patient_emergency_contact\" data-url=\"" . $url . "\">" . $label . "</a></li>";
				$links .= $link;
				$detaillnk = JsEncodeAttribute("patient_emergency_contactlist.php?" . Config("TABLE_SHOW_MASTER") . "=patient&fk_id=" . urlencode(strval($this->id->CurrentValue)) . "");
				$btngrp .= "<a href=\"#\" class=\"mr-2\" title=\"" . $Language->TablePhrase("patient_emergency_contact", "TblCaption") . "\" onclick=\"window.location='" . $detaillnk . "';return false;\">" . $Language->phrase("MasterDetailListLink") . "</a>";
			}
			if (!isset($GLOBALS["patient_emergency_contact_grid"]))
				$GLOBALS["patient_emergency_contact_grid"] = new patient_emergency_contact_grid();
			if ($GLOBALS["patient_emergency_contact_grid"]->DetailView && $Security->canView() && $Security->allowView(CurrentProjectID() . 'patient')) {
				$caption = $Language->phrase("MasterDetailViewLink");
				$url = $this->getViewUrl(Config("TABLE_SHOW_DETAIL") . "=patient_emergency_contact");
				$btngrp .= "<a href=\"#\" class=\"mr-2\" title=\"" . HtmlTitle($caption) . "\" onclick=\"window.location='" . HtmlEncode($url) . "';return false;\">" . $caption . "</a>";
			}
			if ($GLOBALS["patient_emergency_contact_grid"]->DetailEdit && $Security->canEdit() && $Security->allowEdit(CurrentProjectID() . 'patient')) {
				$caption = $Language->phrase("MasterDetailEditLink");
				$url = $this->getEditUrl(Config("TABLE_SHOW_DETAIL") . "=patient_emergency_contact");
				$btngrp .= "<a href=\"#\" class=\"mr-2\" title=\"" . HtmlTitle($caption) . "\" onclick=\"window.location='" . HtmlEncode($url) . "';return false;\">" . $caption . "</a>";
			}
			if ($GLOBALS["patient_emergency_contact_grid"]->DetailAdd && $Security->canAdd() && $Security->allowAdd(CurrentProjectID() . 'patient')) {
				$caption = $Language->phrase("MasterDetailCopyLink");
				$url = $this->getCopyUrl(Config("TABLE_SHOW_DETAIL") . "=patient_emergency_contact");
				$btngrp .= "<a href=\"#\" class=\"mr-2\" title=\"" . HtmlTitle($caption) . "\" onclick=\"window.location='" . HtmlEncode($url) . "';return false;\">" . $caption . "</a>";
			}
			$btngrp .= "</div>";
			if ($link != "") {
				$btngrps .= $btngrp;
				$option->Body .= "<div class=\"d-none ew-preview\">" . $link . $btngrp . "</div>";
			}
		}
		$sqlwrk = "`patient_id`=" . AdjustSql($this->id->CurrentValue, $this->Dbid) . "";

		// Column "detail_patient_document"
		if ($this->DetailPages && $this->DetailPages["patient_document"] && $this->DetailPages["patient_document"]->Visible) {
			$link = "";
			$option = $this->ListOptions["detail_patient_document"];
			$url = "patient_documentpreview.php?t=patient&f=" . Encrypt($sqlwrk);
			$btngrp = "<div data-table=\"patient_document\" data-url=\"" . $url . "\">";
			if ($Security->allowList(CurrentProjectID() . 'patient')) {
				$label = $Language->TablePhrase("patient_document", "TblCaption");
				$link = "<li class=\"nav-item\"><a href=\"#\" class=\"nav-link\" data-toggle=\"tab\" data-table=\"patient_document\" data-url=\"" . $url . "\">" . $label . "</a></li>";
				$links .= $link;
				$detaillnk = JsEncodeAttribute("patient_documentlist.php?" . Config("TABLE_SHOW_MASTER") . "=patient&fk_id=" . urlencode(strval($this->id->CurrentValue)) . "");
				$btngrp .= "<a href=\"#\" class=\"mr-2\" title=\"" . $Language->TablePhrase("patient_document", "TblCaption") . "\" onclick=\"window.location='" . $detaillnk . "';return false;\">" . $Language->phrase("MasterDetailListLink") . "</a>";
			}
			if (!isset($GLOBALS["patient_document_grid"]))
				$GLOBALS["patient_document_grid"] = new patient_document_grid();
			if ($GLOBALS["patient_document_grid"]->DetailView && $Security->canView() && $Security->allowView(CurrentProjectID() . 'patient')) {
				$caption = $Language->phrase("MasterDetailViewLink");
				$url = $this->getViewUrl(Config("TABLE_SHOW_DETAIL") . "=patient_document");
				$btngrp .= "<a href=\"#\" class=\"mr-2\" title=\"" . HtmlTitle($caption) . "\" onclick=\"window.location='" . HtmlEncode($url) . "';return false;\">" . $caption . "</a>";
			}
			if ($GLOBALS["patient_document_grid"]->DetailEdit && $Security->canEdit() && $Security->allowEdit(CurrentProjectID() . 'patient')) {
				$caption = $Language->phrase("MasterDetailEditLink");
				$url = $this->getEditUrl(Config("TABLE_SHOW_DETAIL") . "=patient_document");
				$btngrp .= "<a href=\"#\" class=\"mr-2\" title=\"" . HtmlTitle($caption) . "\" onclick=\"window.location='" . HtmlEncode($url) . "';return false;\">" . $caption . "</a>";
			}
			if ($GLOBALS["patient_document_grid"]->DetailAdd && $Security->canAdd() && $Security->allowAdd(CurrentProjectID() . 'patient')) {
				$caption = $Language->phrase("MasterDetailCopyLink");
				$url = $this->getCopyUrl(Config("TABLE_SHOW_DETAIL") . "=patient_document");
				$btngrp .= "<a href=\"#\" class=\"mr-2\" title=\"" . HtmlTitle($caption) . "\" onclick=\"window.location='" . HtmlEncode($url) . "';return false;\">" . $caption . "</a>";
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

		// PatientID
		if (!$this->isAddOrEdit() && $this->PatientID->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->PatientID->AdvancedSearch->SearchValue != "" || $this->PatientID->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// title
		if (!$this->isAddOrEdit() && $this->title->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->title->AdvancedSearch->SearchValue != "" || $this->title->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// first_name
		if (!$this->isAddOrEdit() && $this->first_name->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->first_name->AdvancedSearch->SearchValue != "" || $this->first_name->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// middle_name
		if (!$this->isAddOrEdit() && $this->middle_name->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->middle_name->AdvancedSearch->SearchValue != "" || $this->middle_name->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// last_name
		if (!$this->isAddOrEdit() && $this->last_name->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->last_name->AdvancedSearch->SearchValue != "" || $this->last_name->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// gender
		if (!$this->isAddOrEdit() && $this->gender->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->gender->AdvancedSearch->SearchValue != "" || $this->gender->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// dob
		if (!$this->isAddOrEdit() && $this->dob->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->dob->AdvancedSearch->SearchValue != "" || $this->dob->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// Age
		if (!$this->isAddOrEdit() && $this->Age->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->Age->AdvancedSearch->SearchValue != "" || $this->Age->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// blood_group
		if (!$this->isAddOrEdit() && $this->blood_group->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->blood_group->AdvancedSearch->SearchValue != "" || $this->blood_group->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// mobile_no
		if (!$this->isAddOrEdit() && $this->mobile_no->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->mobile_no->AdvancedSearch->SearchValue != "" || $this->mobile_no->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// description
		if (!$this->isAddOrEdit() && $this->description->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->description->AdvancedSearch->SearchValue != "" || $this->description->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

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

		// profilePic
		if (!$this->isAddOrEdit() && $this->profilePic->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->profilePic->AdvancedSearch->SearchValue != "" || $this->profilePic->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// IdentificationMark
		if (!$this->isAddOrEdit() && $this->IdentificationMark->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->IdentificationMark->AdvancedSearch->SearchValue != "" || $this->IdentificationMark->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// Religion
		if (!$this->isAddOrEdit() && $this->Religion->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->Religion->AdvancedSearch->SearchValue != "" || $this->Religion->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// Nationality
		if (!$this->isAddOrEdit() && $this->Nationality->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->Nationality->AdvancedSearch->SearchValue != "" || $this->Nationality->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// ReferedByDr
		if (!$this->isAddOrEdit() && $this->ReferedByDr->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->ReferedByDr->AdvancedSearch->SearchValue != "" || $this->ReferedByDr->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// ReferClinicname
		if (!$this->isAddOrEdit() && $this->ReferClinicname->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->ReferClinicname->AdvancedSearch->SearchValue != "" || $this->ReferClinicname->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// ReferCity
		if (!$this->isAddOrEdit() && $this->ReferCity->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->ReferCity->AdvancedSearch->SearchValue != "" || $this->ReferCity->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// ReferMobileNo
		if (!$this->isAddOrEdit() && $this->ReferMobileNo->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->ReferMobileNo->AdvancedSearch->SearchValue != "" || $this->ReferMobileNo->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// ReferA4TreatingConsultant
		if (!$this->isAddOrEdit() && $this->ReferA4TreatingConsultant->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->ReferA4TreatingConsultant->AdvancedSearch->SearchValue != "" || $this->ReferA4TreatingConsultant->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// PurposreReferredfor
		if (!$this->isAddOrEdit() && $this->PurposreReferredfor->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->PurposreReferredfor->AdvancedSearch->SearchValue != "" || $this->PurposreReferredfor->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// spouse_title
		if (!$this->isAddOrEdit() && $this->spouse_title->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->spouse_title->AdvancedSearch->SearchValue != "" || $this->spouse_title->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// spouse_first_name
		if (!$this->isAddOrEdit() && $this->spouse_first_name->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->spouse_first_name->AdvancedSearch->SearchValue != "" || $this->spouse_first_name->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// spouse_middle_name
		if (!$this->isAddOrEdit() && $this->spouse_middle_name->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->spouse_middle_name->AdvancedSearch->SearchValue != "" || $this->spouse_middle_name->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// spouse_last_name
		if (!$this->isAddOrEdit() && $this->spouse_last_name->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->spouse_last_name->AdvancedSearch->SearchValue != "" || $this->spouse_last_name->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// spouse_gender
		if (!$this->isAddOrEdit() && $this->spouse_gender->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->spouse_gender->AdvancedSearch->SearchValue != "" || $this->spouse_gender->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// spouse_dob
		if (!$this->isAddOrEdit() && $this->spouse_dob->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->spouse_dob->AdvancedSearch->SearchValue != "" || $this->spouse_dob->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// spouse_Age
		if (!$this->isAddOrEdit() && $this->spouse_Age->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->spouse_Age->AdvancedSearch->SearchValue != "" || $this->spouse_Age->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// spouse_blood_group
		if (!$this->isAddOrEdit() && $this->spouse_blood_group->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->spouse_blood_group->AdvancedSearch->SearchValue != "" || $this->spouse_blood_group->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// spouse_mobile_no
		if (!$this->isAddOrEdit() && $this->spouse_mobile_no->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->spouse_mobile_no->AdvancedSearch->SearchValue != "" || $this->spouse_mobile_no->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// Maritalstatus
		if (!$this->isAddOrEdit() && $this->Maritalstatus->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->Maritalstatus->AdvancedSearch->SearchValue != "" || $this->Maritalstatus->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// Business
		if (!$this->isAddOrEdit() && $this->Business->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->Business->AdvancedSearch->SearchValue != "" || $this->Business->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// Patient_Language
		if (!$this->isAddOrEdit() && $this->Patient_Language->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->Patient_Language->AdvancedSearch->SearchValue != "" || $this->Patient_Language->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// Passport
		if (!$this->isAddOrEdit() && $this->Passport->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->Passport->AdvancedSearch->SearchValue != "" || $this->Passport->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// VisaNo
		if (!$this->isAddOrEdit() && $this->VisaNo->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->VisaNo->AdvancedSearch->SearchValue != "" || $this->VisaNo->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// ValidityOfVisa
		if (!$this->isAddOrEdit() && $this->ValidityOfVisa->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->ValidityOfVisa->AdvancedSearch->SearchValue != "" || $this->ValidityOfVisa->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// WhereDidYouHear
		if (!$this->isAddOrEdit() && $this->WhereDidYouHear->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->WhereDidYouHear->AdvancedSearch->SearchValue != "" || $this->WhereDidYouHear->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}
		if (is_array($this->WhereDidYouHear->AdvancedSearch->SearchValue))
			$this->WhereDidYouHear->AdvancedSearch->SearchValue = implode(Config("MULTIPLE_OPTION_SEPARATOR"), $this->WhereDidYouHear->AdvancedSearch->SearchValue);
		if (is_array($this->WhereDidYouHear->AdvancedSearch->SearchValue2))
			$this->WhereDidYouHear->AdvancedSearch->SearchValue2 = implode(Config("MULTIPLE_OPTION_SEPARATOR"), $this->WhereDidYouHear->AdvancedSearch->SearchValue2);

		// HospID
		if (!$this->isAddOrEdit() && $this->HospID->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->HospID->AdvancedSearch->SearchValue != "" || $this->HospID->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// street
		if (!$this->isAddOrEdit() && $this->street->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->street->AdvancedSearch->SearchValue != "" || $this->street->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// town
		if (!$this->isAddOrEdit() && $this->town->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->town->AdvancedSearch->SearchValue != "" || $this->town->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// province
		if (!$this->isAddOrEdit() && $this->province->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->province->AdvancedSearch->SearchValue != "" || $this->province->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// country
		if (!$this->isAddOrEdit() && $this->country->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->country->AdvancedSearch->SearchValue != "" || $this->country->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// postal_code
		if (!$this->isAddOrEdit() && $this->postal_code->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->postal_code->AdvancedSearch->SearchValue != "" || $this->postal_code->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// PEmail
		if (!$this->isAddOrEdit() && $this->PEmail->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->PEmail->AdvancedSearch->SearchValue != "" || $this->PEmail->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// PEmergencyContact
		if (!$this->isAddOrEdit() && $this->PEmergencyContact->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->PEmergencyContact->AdvancedSearch->SearchValue != "" || $this->PEmergencyContact->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// occupation
		if (!$this->isAddOrEdit() && $this->occupation->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->occupation->AdvancedSearch->SearchValue != "" || $this->occupation->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// spouse_occupation
		if (!$this->isAddOrEdit() && $this->spouse_occupation->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->spouse_occupation->AdvancedSearch->SearchValue != "" || $this->spouse_occupation->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// WhatsApp
		if (!$this->isAddOrEdit() && $this->WhatsApp->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->WhatsApp->AdvancedSearch->SearchValue != "" || $this->WhatsApp->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// CouppleID
		if (!$this->isAddOrEdit() && $this->CouppleID->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->CouppleID->AdvancedSearch->SearchValue != "" || $this->CouppleID->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// MaleID
		if (!$this->isAddOrEdit() && $this->MaleID->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->MaleID->AdvancedSearch->SearchValue != "" || $this->MaleID->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// FemaleID
		if (!$this->isAddOrEdit() && $this->FemaleID->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->FemaleID->AdvancedSearch->SearchValue != "" || $this->FemaleID->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// GroupID
		if (!$this->isAddOrEdit() && $this->GroupID->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->GroupID->AdvancedSearch->SearchValue != "" || $this->GroupID->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// Relationship
		if (!$this->isAddOrEdit() && $this->Relationship->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->Relationship->AdvancedSearch->SearchValue != "" || $this->Relationship->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// AppointmentSearch
		if (!$this->isAddOrEdit() && $this->AppointmentSearch->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->AppointmentSearch->AdvancedSearch->SearchValue != "" || $this->AppointmentSearch->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// FacebookID
		if (!$this->isAddOrEdit() && $this->FacebookID->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->FacebookID->AdvancedSearch->SearchValue != "" || $this->FacebookID->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
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
		$this->PatientID->setDbValue($row['PatientID']);
		$this->title->setDbValue($row['title']);
		$this->first_name->setDbValue($row['first_name']);
		$this->middle_name->setDbValue($row['middle_name']);
		$this->last_name->setDbValue($row['last_name']);
		$this->gender->setDbValue($row['gender']);
		$this->dob->setDbValue($row['dob']);
		$this->Age->setDbValue($row['Age']);
		$this->blood_group->setDbValue($row['blood_group']);
		$this->mobile_no->setDbValue($row['mobile_no']);
		$this->description->setDbValue($row['description']);
		$this->status->setDbValue($row['status']);
		$this->createdby->setDbValue($row['createdby']);
		$this->createddatetime->setDbValue($row['createddatetime']);
		$this->modifiedby->setDbValue($row['modifiedby']);
		$this->modifieddatetime->setDbValue($row['modifieddatetime']);
		$this->profilePic->Upload->DbValue = $row['profilePic'];
		$this->profilePic->setDbValue($this->profilePic->Upload->DbValue);
		$this->IdentificationMark->setDbValue($row['IdentificationMark']);
		$this->Religion->setDbValue($row['Religion']);
		$this->Nationality->setDbValue($row['Nationality']);
		$this->ReferedByDr->setDbValue($row['ReferedByDr']);
		if (array_key_exists('EV__ReferedByDr', $rs->fields)) {
			$this->ReferedByDr->VirtualValue = $rs->fields('EV__ReferedByDr'); // Set up virtual field value
		} else {
			$this->ReferedByDr->VirtualValue = ""; // Clear value
		}
		$this->ReferClinicname->setDbValue($row['ReferClinicname']);
		$this->ReferCity->setDbValue($row['ReferCity']);
		$this->ReferMobileNo->setDbValue($row['ReferMobileNo']);
		$this->ReferA4TreatingConsultant->setDbValue($row['ReferA4TreatingConsultant']);
		if (array_key_exists('EV__ReferA4TreatingConsultant', $rs->fields)) {
			$this->ReferA4TreatingConsultant->VirtualValue = $rs->fields('EV__ReferA4TreatingConsultant'); // Set up virtual field value
		} else {
			$this->ReferA4TreatingConsultant->VirtualValue = ""; // Clear value
		}
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
		$this->AppointmentSearch->setDbValue($row['AppointmentSearch']);
		$this->FacebookID->setDbValue($row['FacebookID']);
	}

	// Return a row with default values
	protected function newRow()
	{
		$row = [];
		$row['id'] = NULL;
		$row['PatientID'] = NULL;
		$row['title'] = NULL;
		$row['first_name'] = NULL;
		$row['middle_name'] = NULL;
		$row['last_name'] = NULL;
		$row['gender'] = NULL;
		$row['dob'] = NULL;
		$row['Age'] = NULL;
		$row['blood_group'] = NULL;
		$row['mobile_no'] = NULL;
		$row['description'] = NULL;
		$row['status'] = NULL;
		$row['createdby'] = NULL;
		$row['createddatetime'] = NULL;
		$row['modifiedby'] = NULL;
		$row['modifieddatetime'] = NULL;
		$row['profilePic'] = NULL;
		$row['IdentificationMark'] = NULL;
		$row['Religion'] = NULL;
		$row['Nationality'] = NULL;
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
		$row['AppointmentSearch'] = NULL;
		$row['FacebookID'] = NULL;
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
		if (strval($this->getKey("PatientID")) != "")
			$this->PatientID->OldValue = $this->getKey("PatientID"); // PatientID
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
		// PatientID
		// title
		// first_name
		// middle_name
		// last_name
		// gender
		// dob
		// Age
		// blood_group
		// mobile_no
		// description
		// status
		// createdby
		// createddatetime
		// modifiedby
		// modifieddatetime
		// profilePic
		// IdentificationMark
		// Religion
		// Nationality
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
		// AppointmentSearch
		// FacebookID

		if ($this->RowType == ROWTYPE_VIEW) { // View row

			// id
			$this->id->ViewValue = $this->id->CurrentValue;
			$this->id->ViewCustomAttributes = "";

			// PatientID
			$this->PatientID->ViewValue = $this->PatientID->CurrentValue;
			$this->PatientID->ViewCustomAttributes = "";

			// title
			$curVal = strval($this->title->CurrentValue);
			if ($curVal != "") {
				$this->title->ViewValue = $this->title->lookupCacheOption($curVal);
				if ($this->title->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
					$sqlWrk = $this->title->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->title->ViewValue = $this->title->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->title->ViewValue = $this->title->CurrentValue;
					}
				}
			} else {
				$this->title->ViewValue = NULL;
			}
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
			$curVal = strval($this->gender->CurrentValue);
			if ($curVal != "") {
				$this->gender->ViewValue = $this->gender->lookupCacheOption($curVal);
				if ($this->gender->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->gender->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->gender->ViewValue = $this->gender->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->gender->ViewValue = $this->gender->CurrentValue;
					}
				}
			} else {
				$this->gender->ViewValue = NULL;
			}
			$this->gender->ViewCustomAttributes = "";

			// dob
			$this->dob->ViewValue = $this->dob->CurrentValue;
			$this->dob->ViewValue = FormatDateTime($this->dob->ViewValue, 7);
			$this->dob->ViewCustomAttributes = "";

			// Age
			$this->Age->ViewValue = $this->Age->CurrentValue;
			$this->Age->ViewCustomAttributes = "";

			// blood_group
			$curVal = strval($this->blood_group->CurrentValue);
			if ($curVal != "") {
				$this->blood_group->ViewValue = $this->blood_group->lookupCacheOption($curVal);
				if ($this->blood_group->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`BloodGroup`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->blood_group->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->blood_group->ViewValue = $this->blood_group->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->blood_group->ViewValue = $this->blood_group->CurrentValue;
					}
				}
			} else {
				$this->blood_group->ViewValue = NULL;
			}
			$this->blood_group->ViewCustomAttributes = "";

			// mobile_no
			$this->mobile_no->ViewValue = $this->mobile_no->CurrentValue;
			$this->mobile_no->ViewCustomAttributes = "";

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

			// createddatetime
			$this->createddatetime->ViewValue = $this->createddatetime->CurrentValue;
			$this->createddatetime->ViewValue = FormatDateTime($this->createddatetime->ViewValue, 0);
			$this->createddatetime->ViewCustomAttributes = "";

			// profilePic
			if (!EmptyValue($this->profilePic->Upload->DbValue)) {
				$this->profilePic->ImageWidth = 80;
				$this->profilePic->ImageHeight = 80;
				$this->profilePic->ImageAlt = $this->profilePic->alt();
				$this->profilePic->ViewValue = $this->profilePic->Upload->DbValue;
			} else {
				$this->profilePic->ViewValue = "";
			}
			$this->profilePic->ViewCustomAttributes = "";

			// IdentificationMark
			$this->IdentificationMark->ViewValue = $this->IdentificationMark->CurrentValue;
			$this->IdentificationMark->ViewCustomAttributes = "";

			// Religion
			$this->Religion->ViewValue = $this->Religion->CurrentValue;
			$this->Religion->ViewCustomAttributes = "";

			// Nationality
			$this->Nationality->ViewValue = $this->Nationality->CurrentValue;
			$this->Nationality->ViewCustomAttributes = "";

			// ReferedByDr
			if ($this->ReferedByDr->VirtualValue != "") {
				$this->ReferedByDr->ViewValue = $this->ReferedByDr->VirtualValue;
			} else {
				$curVal = strval($this->ReferedByDr->CurrentValue);
				if ($curVal != "") {
					$this->ReferedByDr->ViewValue = $this->ReferedByDr->lookupCacheOption($curVal);
					if ($this->ReferedByDr->ViewValue === NULL) { // Lookup from database
						$filterWrk = "`reference`" . SearchString("=", $curVal, DATATYPE_STRING, "");
						$sqlWrk = $this->ReferedByDr->Lookup->getSql(FALSE, $filterWrk, '', $this);
						$rswrk = Conn()->execute($sqlWrk);
						if ($rswrk && !$rswrk->EOF) { // Lookup values found
							$arwrk = [];
							$arwrk[1] = $rswrk->fields('df');
							$this->ReferedByDr->ViewValue = $this->ReferedByDr->displayValue($arwrk);
							$rswrk->Close();
						} else {
							$this->ReferedByDr->ViewValue = $this->ReferedByDr->CurrentValue;
						}
					}
				} else {
					$this->ReferedByDr->ViewValue = NULL;
				}
			}
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
			if ($this->ReferA4TreatingConsultant->VirtualValue != "") {
				$this->ReferA4TreatingConsultant->ViewValue = $this->ReferA4TreatingConsultant->VirtualValue;
			} else {
				$curVal = strval($this->ReferA4TreatingConsultant->CurrentValue);
				if ($curVal != "") {
					$this->ReferA4TreatingConsultant->ViewValue = $this->ReferA4TreatingConsultant->lookupCacheOption($curVal);
					if ($this->ReferA4TreatingConsultant->ViewValue === NULL) { // Lookup from database
						$filterWrk = "`NAME`" . SearchString("=", $curVal, DATATYPE_STRING, "");
						$lookupFilter = function() {
							return "`HospID`='".HospitalID()."'";
						};
						$lookupFilter = $lookupFilter->bindTo($this);
						$sqlWrk = $this->ReferA4TreatingConsultant->Lookup->getSql(FALSE, $filterWrk, $lookupFilter, $this);
						$rswrk = Conn()->execute($sqlWrk);
						if ($rswrk && !$rswrk->EOF) { // Lookup values found
							$arwrk = [];
							$arwrk[1] = $rswrk->fields('df');
							$this->ReferA4TreatingConsultant->ViewValue = $this->ReferA4TreatingConsultant->displayValue($arwrk);
							$rswrk->Close();
						} else {
							$this->ReferA4TreatingConsultant->ViewValue = $this->ReferA4TreatingConsultant->CurrentValue;
						}
					}
				} else {
					$this->ReferA4TreatingConsultant->ViewValue = NULL;
				}
			}
			$this->ReferA4TreatingConsultant->ViewCustomAttributes = "";

			// PurposreReferredfor
			$this->PurposreReferredfor->ViewValue = $this->PurposreReferredfor->CurrentValue;
			$this->PurposreReferredfor->ViewCustomAttributes = "";

			// spouse_title
			$curVal = strval($this->spouse_title->CurrentValue);
			if ($curVal != "") {
				$this->spouse_title->ViewValue = $this->spouse_title->lookupCacheOption($curVal);
				if ($this->spouse_title->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->spouse_title->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->spouse_title->ViewValue = $this->spouse_title->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->spouse_title->ViewValue = $this->spouse_title->CurrentValue;
					}
				}
			} else {
				$this->spouse_title->ViewValue = NULL;
			}
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
			$curVal = strval($this->spouse_gender->CurrentValue);
			if ($curVal != "") {
				$this->spouse_gender->ViewValue = $this->spouse_gender->lookupCacheOption($curVal);
				if ($this->spouse_gender->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->spouse_gender->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->spouse_gender->ViewValue = $this->spouse_gender->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->spouse_gender->ViewValue = $this->spouse_gender->CurrentValue;
					}
				}
			} else {
				$this->spouse_gender->ViewValue = NULL;
			}
			$this->spouse_gender->ViewCustomAttributes = "";

			// spouse_dob
			$this->spouse_dob->ViewValue = $this->spouse_dob->CurrentValue;
			$this->spouse_dob->ViewValue = FormatDateTime($this->spouse_dob->ViewValue, 7);
			$this->spouse_dob->ViewCustomAttributes = "";

			// spouse_Age
			$this->spouse_Age->ViewValue = $this->spouse_Age->CurrentValue;
			$this->spouse_Age->ViewCustomAttributes = "";

			// spouse_blood_group
			$curVal = strval($this->spouse_blood_group->CurrentValue);
			if ($curVal != "") {
				$this->spouse_blood_group->ViewValue = $this->spouse_blood_group->lookupCacheOption($curVal);
				if ($this->spouse_blood_group->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`BloodGroup`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->spouse_blood_group->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->spouse_blood_group->ViewValue = $this->spouse_blood_group->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->spouse_blood_group->ViewValue = $this->spouse_blood_group->CurrentValue;
					}
				}
			} else {
				$this->spouse_blood_group->ViewValue = NULL;
			}
			$this->spouse_blood_group->ViewCustomAttributes = "";

			// spouse_mobile_no
			$this->spouse_mobile_no->ViewValue = $this->spouse_mobile_no->CurrentValue;
			$this->spouse_mobile_no->ViewCustomAttributes = "";

			// Maritalstatus
			$curVal = strval($this->Maritalstatus->CurrentValue);
			if ($curVal != "") {
				$this->Maritalstatus->ViewValue = $this->Maritalstatus->lookupCacheOption($curVal);
				if ($this->Maritalstatus->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`MaritalStatus`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->Maritalstatus->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->Maritalstatus->ViewValue = $this->Maritalstatus->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->Maritalstatus->ViewValue = $this->Maritalstatus->CurrentValue;
					}
				}
			} else {
				$this->Maritalstatus->ViewValue = NULL;
			}
			$this->Maritalstatus->ViewCustomAttributes = "";

			// Business
			$this->Business->ViewValue = $this->Business->CurrentValue;
			$curVal = strval($this->Business->CurrentValue);
			if ($curVal != "") {
				$this->Business->ViewValue = $this->Business->lookupCacheOption($curVal);
				if ($this->Business->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Job`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->Business->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->Business->ViewValue = $this->Business->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->Business->ViewValue = $this->Business->CurrentValue;
					}
				}
			} else {
				$this->Business->ViewValue = NULL;
			}
			$this->Business->ViewCustomAttributes = "";

			// Patient_Language
			$curVal = strval($this->Patient_Language->CurrentValue);
			if ($curVal != "") {
				$this->Patient_Language->ViewValue = $this->Patient_Language->lookupCacheOption($curVal);
				if ($this->Patient_Language->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Language`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->Patient_Language->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->Patient_Language->ViewValue = $this->Patient_Language->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->Patient_Language->ViewValue = $this->Patient_Language->CurrentValue;
					}
				}
			} else {
				$this->Patient_Language->ViewValue = NULL;
			}
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
			$curVal = strval($this->WhereDidYouHear->CurrentValue);
			if ($curVal != "") {
				$this->WhereDidYouHear->ViewValue = $this->WhereDidYouHear->lookupCacheOption($curVal);
				if ($this->WhereDidYouHear->ViewValue === NULL) { // Lookup from database
					$arwrk = explode(",", $curVal);
					$filterWrk = "";
					foreach ($arwrk as $wrk) {
						if ($filterWrk != "")
							$filterWrk .= " OR ";
						$filterWrk .= "`Job`" . SearchString("=", trim($wrk), DATATYPE_STRING, "");
					}
					$sqlWrk = $this->WhereDidYouHear->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$this->WhereDidYouHear->ViewValue = new OptionValues();
						$ari = 0;
						while (!$rswrk->EOF) {
							$arwrk = [];
							$arwrk[1] = $rswrk->fields('df');
							$this->WhereDidYouHear->ViewValue->add($this->WhereDidYouHear->displayValue($arwrk));
							$rswrk->MoveNext();
							$ari++;
						}
						$rswrk->Close();
					} else {
						$this->WhereDidYouHear->ViewValue = $this->WhereDidYouHear->CurrentValue;
					}
				}
			} else {
				$this->WhereDidYouHear->ViewValue = NULL;
			}
			$this->WhereDidYouHear->ViewCustomAttributes = "";

			// HospID
			$curVal = strval($this->HospID->CurrentValue);
			if ($curVal != "") {
				$this->HospID->ViewValue = $this->HospID->lookupCacheOption($curVal);
				if ($this->HospID->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
					$sqlWrk = $this->HospID->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->HospID->ViewValue = $this->HospID->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->HospID->ViewValue = $this->HospID->CurrentValue;
					}
				}
			} else {
				$this->HospID->ViewValue = NULL;
			}
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
			$this->id->LinkCustomAttributes = "";
			$this->id->HrefValue = "";
			$this->id->TooltipValue = "";
			if (!$this->isExport())
				$this->id->ViewValue = $this->highlightValue($this->id);

			// PatientID
			$this->PatientID->LinkCustomAttributes = "";
			$this->PatientID->HrefValue = "";
			$this->PatientID->TooltipValue = "";
			if (!$this->isExport())
				$this->PatientID->ViewValue = $this->highlightValue($this->PatientID);

			// title
			$this->title->LinkCustomAttributes = "";
			$this->title->HrefValue = "";
			$this->title->TooltipValue = "";

			// first_name
			$this->first_name->LinkCustomAttributes = "";
			$this->first_name->HrefValue = "";
			$this->first_name->TooltipValue = "";
			if (!$this->isExport())
				$this->first_name->ViewValue = $this->highlightValue($this->first_name);

			// gender
			$this->gender->LinkCustomAttributes = "";
			$this->gender->HrefValue = "";
			$this->gender->TooltipValue = "";

			// dob
			$this->dob->LinkCustomAttributes = "";
			$this->dob->HrefValue = "";
			$this->dob->TooltipValue = "";

			// Age
			$this->Age->LinkCustomAttributes = "";
			$this->Age->HrefValue = "";
			$this->Age->TooltipValue = "";
			if (!$this->isExport())
				$this->Age->ViewValue = $this->highlightValue($this->Age);

			// blood_group
			$this->blood_group->LinkCustomAttributes = "";
			$this->blood_group->HrefValue = "";
			$this->blood_group->TooltipValue = "";

			// mobile_no
			$this->mobile_no->LinkCustomAttributes = "";
			$this->mobile_no->HrefValue = "";
			$this->mobile_no->TooltipValue = "";
			if (!$this->isExport())
				$this->mobile_no->ViewValue = $this->highlightValue($this->mobile_no);

			// status
			$this->status->LinkCustomAttributes = "";
			$this->status->HrefValue = "";
			$this->status->TooltipValue = "";

			// createddatetime
			$this->createddatetime->LinkCustomAttributes = "";
			$this->createddatetime->HrefValue = "";
			$this->createddatetime->TooltipValue = "";

			// profilePic
			$this->profilePic->LinkCustomAttributes = "";
			if (!EmptyValue($this->profilePic->Upload->DbValue)) {
				$this->profilePic->HrefValue = GetFileUploadUrl($this->profilePic, $this->profilePic->htmlDecode($this->profilePic->Upload->DbValue)); // Add prefix/suffix
				$this->profilePic->LinkAttrs["target"] = ""; // Add target
				if ($this->isExport())
					$this->profilePic->HrefValue = FullUrl($this->profilePic->HrefValue, "href");
			} else {
				$this->profilePic->HrefValue = "";
			}
			$this->profilePic->ExportHrefValue = $this->profilePic->UploadPath . $this->profilePic->Upload->DbValue;
			$this->profilePic->TooltipValue = "";
			if ($this->profilePic->UseColorbox) {
				if (EmptyValue($this->profilePic->TooltipValue))
					$this->profilePic->LinkAttrs["title"] = $Language->phrase("ViewImageGallery");
				$this->profilePic->LinkAttrs["data-rel"] = "patient_x" . $this->RowCount . "_profilePic";
				$this->profilePic->LinkAttrs->appendClass("ew-lightbox");
			}

			// IdentificationMark
			$this->IdentificationMark->LinkCustomAttributes = "";
			$this->IdentificationMark->HrefValue = "";
			$this->IdentificationMark->TooltipValue = "";
			if (!$this->isExport())
				$this->IdentificationMark->ViewValue = $this->highlightValue($this->IdentificationMark);

			// Religion
			$this->Religion->LinkCustomAttributes = "";
			$this->Religion->HrefValue = "";
			$this->Religion->TooltipValue = "";
			if (!$this->isExport())
				$this->Religion->ViewValue = $this->highlightValue($this->Religion);

			// Nationality
			$this->Nationality->LinkCustomAttributes = "";
			$this->Nationality->HrefValue = "";
			$this->Nationality->TooltipValue = "";
			if (!$this->isExport())
				$this->Nationality->ViewValue = $this->highlightValue($this->Nationality);

			// ReferedByDr
			$this->ReferedByDr->LinkCustomAttributes = "";
			$this->ReferedByDr->HrefValue = "";
			$this->ReferedByDr->TooltipValue = "";
			if (!$this->isExport())
				$this->ReferedByDr->ViewValue = $this->highlightValue($this->ReferedByDr);

			// ReferClinicname
			$this->ReferClinicname->LinkCustomAttributes = "";
			$this->ReferClinicname->HrefValue = "";
			$this->ReferClinicname->TooltipValue = "";
			if (!$this->isExport())
				$this->ReferClinicname->ViewValue = $this->highlightValue($this->ReferClinicname);

			// ReferCity
			$this->ReferCity->LinkCustomAttributes = "";
			$this->ReferCity->HrefValue = "";
			$this->ReferCity->TooltipValue = "";
			if (!$this->isExport())
				$this->ReferCity->ViewValue = $this->highlightValue($this->ReferCity);

			// ReferMobileNo
			$this->ReferMobileNo->LinkCustomAttributes = "";
			$this->ReferMobileNo->HrefValue = "";
			$this->ReferMobileNo->TooltipValue = "";
			if (!$this->isExport())
				$this->ReferMobileNo->ViewValue = $this->highlightValue($this->ReferMobileNo);

			// ReferA4TreatingConsultant
			$this->ReferA4TreatingConsultant->LinkCustomAttributes = "";
			$this->ReferA4TreatingConsultant->HrefValue = "";
			$this->ReferA4TreatingConsultant->TooltipValue = "";
			if (!$this->isExport())
				$this->ReferA4TreatingConsultant->ViewValue = $this->highlightValue($this->ReferA4TreatingConsultant);

			// PurposreReferredfor
			$this->PurposreReferredfor->LinkCustomAttributes = "";
			$this->PurposreReferredfor->HrefValue = "";
			$this->PurposreReferredfor->TooltipValue = "";
			if (!$this->isExport())
				$this->PurposreReferredfor->ViewValue = $this->highlightValue($this->PurposreReferredfor);

			// spouse_title
			$this->spouse_title->LinkCustomAttributes = "";
			$this->spouse_title->HrefValue = "";
			$this->spouse_title->TooltipValue = "";

			// spouse_first_name
			$this->spouse_first_name->LinkCustomAttributes = "";
			$this->spouse_first_name->HrefValue = "";
			$this->spouse_first_name->TooltipValue = "";
			if (!$this->isExport())
				$this->spouse_first_name->ViewValue = $this->highlightValue($this->spouse_first_name);

			// spouse_middle_name
			$this->spouse_middle_name->LinkCustomAttributes = "";
			$this->spouse_middle_name->HrefValue = "";
			$this->spouse_middle_name->TooltipValue = "";
			if (!$this->isExport())
				$this->spouse_middle_name->ViewValue = $this->highlightValue($this->spouse_middle_name);

			// spouse_last_name
			$this->spouse_last_name->LinkCustomAttributes = "";
			$this->spouse_last_name->HrefValue = "";
			$this->spouse_last_name->TooltipValue = "";
			if (!$this->isExport())
				$this->spouse_last_name->ViewValue = $this->highlightValue($this->spouse_last_name);

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
			if (!$this->isExport())
				$this->spouse_Age->ViewValue = $this->highlightValue($this->spouse_Age);

			// spouse_blood_group
			$this->spouse_blood_group->LinkCustomAttributes = "";
			$this->spouse_blood_group->HrefValue = "";
			$this->spouse_blood_group->TooltipValue = "";

			// spouse_mobile_no
			$this->spouse_mobile_no->LinkCustomAttributes = "";
			$this->spouse_mobile_no->HrefValue = "";
			$this->spouse_mobile_no->TooltipValue = "";
			if (!$this->isExport())
				$this->spouse_mobile_no->ViewValue = $this->highlightValue($this->spouse_mobile_no);

			// Maritalstatus
			$this->Maritalstatus->LinkCustomAttributes = "";
			$this->Maritalstatus->HrefValue = "";
			$this->Maritalstatus->TooltipValue = "";

			// Business
			$this->Business->LinkCustomAttributes = "";
			$this->Business->HrefValue = "";
			$this->Business->TooltipValue = "";
			if (!$this->isExport())
				$this->Business->ViewValue = $this->highlightValue($this->Business);

			// Patient_Language
			$this->Patient_Language->LinkCustomAttributes = "";
			$this->Patient_Language->HrefValue = "";
			$this->Patient_Language->TooltipValue = "";

			// Passport
			$this->Passport->LinkCustomAttributes = "";
			$this->Passport->HrefValue = "";
			$this->Passport->TooltipValue = "";
			if (!$this->isExport())
				$this->Passport->ViewValue = $this->highlightValue($this->Passport);

			// VisaNo
			$this->VisaNo->LinkCustomAttributes = "";
			$this->VisaNo->HrefValue = "";
			$this->VisaNo->TooltipValue = "";
			if (!$this->isExport())
				$this->VisaNo->ViewValue = $this->highlightValue($this->VisaNo);

			// ValidityOfVisa
			$this->ValidityOfVisa->LinkCustomAttributes = "";
			$this->ValidityOfVisa->HrefValue = "";
			$this->ValidityOfVisa->TooltipValue = "";
			if (!$this->isExport())
				$this->ValidityOfVisa->ViewValue = $this->highlightValue($this->ValidityOfVisa);

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
			if (!$this->isExport())
				$this->street->ViewValue = $this->highlightValue($this->street);

			// town
			$this->town->LinkCustomAttributes = "";
			$this->town->HrefValue = "";
			$this->town->TooltipValue = "";
			if (!$this->isExport())
				$this->town->ViewValue = $this->highlightValue($this->town);

			// province
			$this->province->LinkCustomAttributes = "";
			$this->province->HrefValue = "";
			$this->province->TooltipValue = "";
			if (!$this->isExport())
				$this->province->ViewValue = $this->highlightValue($this->province);

			// country
			$this->country->LinkCustomAttributes = "";
			$this->country->HrefValue = "";
			$this->country->TooltipValue = "";
			if (!$this->isExport())
				$this->country->ViewValue = $this->highlightValue($this->country);

			// postal_code
			$this->postal_code->LinkCustomAttributes = "";
			$this->postal_code->HrefValue = "";
			$this->postal_code->TooltipValue = "";
			if (!$this->isExport())
				$this->postal_code->ViewValue = $this->highlightValue($this->postal_code);

			// PEmail
			$this->PEmail->LinkCustomAttributes = "";
			$this->PEmail->HrefValue = "";
			$this->PEmail->TooltipValue = "";
			if (!$this->isExport())
				$this->PEmail->ViewValue = $this->highlightValue($this->PEmail);

			// PEmergencyContact
			$this->PEmergencyContact->LinkCustomAttributes = "";
			$this->PEmergencyContact->HrefValue = "";
			$this->PEmergencyContact->TooltipValue = "";
			if (!$this->isExport())
				$this->PEmergencyContact->ViewValue = $this->highlightValue($this->PEmergencyContact);

			// occupation
			$this->occupation->LinkCustomAttributes = "";
			$this->occupation->HrefValue = "";
			$this->occupation->TooltipValue = "";
			if (!$this->isExport())
				$this->occupation->ViewValue = $this->highlightValue($this->occupation);

			// spouse_occupation
			$this->spouse_occupation->LinkCustomAttributes = "";
			$this->spouse_occupation->HrefValue = "";
			$this->spouse_occupation->TooltipValue = "";
			if (!$this->isExport())
				$this->spouse_occupation->ViewValue = $this->highlightValue($this->spouse_occupation);

			// WhatsApp
			$this->WhatsApp->LinkCustomAttributes = "";
			$this->WhatsApp->HrefValue = "";
			$this->WhatsApp->TooltipValue = "";
			if (!$this->isExport())
				$this->WhatsApp->ViewValue = $this->highlightValue($this->WhatsApp);

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
			if (!$this->isExport())
				$this->Relationship->ViewValue = $this->highlightValue($this->Relationship);

			// FacebookID
			$this->FacebookID->LinkCustomAttributes = "";
			$this->FacebookID->HrefValue = "";
			$this->FacebookID->TooltipValue = "";
			if (!$this->isExport())
				$this->FacebookID->ViewValue = $this->highlightValue($this->FacebookID);
		} elseif ($this->RowType == ROWTYPE_SEARCH) { // Search row

			// id
			$this->id->EditAttrs["class"] = "form-control";
			$this->id->EditCustomAttributes = "";
			$this->id->EditValue = HtmlEncode($this->id->AdvancedSearch->SearchValue);
			$this->id->PlaceHolder = RemoveHtml($this->id->caption());

			// PatientID
			$this->PatientID->EditAttrs["class"] = "form-control";
			$this->PatientID->EditCustomAttributes = "";
			if (!$this->PatientID->Raw)
				$this->PatientID->AdvancedSearch->SearchValue = HtmlDecode($this->PatientID->AdvancedSearch->SearchValue);
			$this->PatientID->EditValue = HtmlEncode($this->PatientID->AdvancedSearch->SearchValue);
			$this->PatientID->PlaceHolder = RemoveHtml($this->PatientID->caption());

			// title
			$this->title->EditAttrs["class"] = "form-control";
			$this->title->EditCustomAttributes = "";

			// first_name
			$this->first_name->EditAttrs["class"] = "form-control";
			$this->first_name->EditCustomAttributes = "";
			if (!$this->first_name->Raw)
				$this->first_name->AdvancedSearch->SearchValue = HtmlDecode($this->first_name->AdvancedSearch->SearchValue);
			$this->first_name->EditValue = HtmlEncode($this->first_name->AdvancedSearch->SearchValue);
			$this->first_name->PlaceHolder = RemoveHtml($this->first_name->caption());

			// gender
			$this->gender->EditAttrs["class"] = "form-control";
			$this->gender->EditCustomAttributes = "";

			// dob
			$this->dob->EditAttrs["class"] = "form-control";
			$this->dob->EditCustomAttributes = "";
			$this->dob->EditValue = HtmlEncode(FormatDateTime(UnFormatDateTime($this->dob->AdvancedSearch->SearchValue, 7), 7));
			$this->dob->PlaceHolder = RemoveHtml($this->dob->caption());

			// Age
			$this->Age->EditAttrs["class"] = "form-control";
			$this->Age->EditCustomAttributes = "";
			if (!$this->Age->Raw)
				$this->Age->AdvancedSearch->SearchValue = HtmlDecode($this->Age->AdvancedSearch->SearchValue);
			$this->Age->EditValue = HtmlEncode($this->Age->AdvancedSearch->SearchValue);
			$this->Age->PlaceHolder = RemoveHtml($this->Age->caption());

			// blood_group
			$this->blood_group->EditAttrs["class"] = "form-control";
			$this->blood_group->EditCustomAttributes = "";

			// mobile_no
			$this->mobile_no->EditAttrs["class"] = "form-control";
			$this->mobile_no->EditCustomAttributes = "";
			if (!$this->mobile_no->Raw)
				$this->mobile_no->AdvancedSearch->SearchValue = HtmlDecode($this->mobile_no->AdvancedSearch->SearchValue);
			$this->mobile_no->EditValue = HtmlEncode($this->mobile_no->AdvancedSearch->SearchValue);
			$this->mobile_no->PlaceHolder = RemoveHtml($this->mobile_no->caption());

			// status
			$this->status->EditAttrs["class"] = "form-control";
			$this->status->EditCustomAttributes = "";

			// createddatetime
			$this->createddatetime->EditAttrs["class"] = "form-control";
			$this->createddatetime->EditCustomAttributes = "";
			$this->createddatetime->EditValue = HtmlEncode(FormatDateTime(UnFormatDateTime($this->createddatetime->AdvancedSearch->SearchValue, 0), 8));
			$this->createddatetime->PlaceHolder = RemoveHtml($this->createddatetime->caption());
			$this->createddatetime->EditAttrs["class"] = "form-control";
			$this->createddatetime->EditCustomAttributes = "";
			$this->createddatetime->EditValue2 = HtmlEncode(FormatDateTime(UnFormatDateTime($this->createddatetime->AdvancedSearch->SearchValue2, 0), 8));
			$this->createddatetime->PlaceHolder = RemoveHtml($this->createddatetime->caption());

			// profilePic
			$this->profilePic->EditAttrs["class"] = "form-control";
			$this->profilePic->EditCustomAttributes = "";
			if (!$this->profilePic->Raw)
				$this->profilePic->AdvancedSearch->SearchValue = HtmlDecode($this->profilePic->AdvancedSearch->SearchValue);
			$this->profilePic->EditValue = HtmlEncode($this->profilePic->AdvancedSearch->SearchValue);
			$this->profilePic->PlaceHolder = RemoveHtml($this->profilePic->caption());

			// IdentificationMark
			$this->IdentificationMark->EditAttrs["class"] = "form-control";
			$this->IdentificationMark->EditCustomAttributes = "";
			if (!$this->IdentificationMark->Raw)
				$this->IdentificationMark->AdvancedSearch->SearchValue = HtmlDecode($this->IdentificationMark->AdvancedSearch->SearchValue);
			$this->IdentificationMark->EditValue = HtmlEncode($this->IdentificationMark->AdvancedSearch->SearchValue);
			$this->IdentificationMark->PlaceHolder = RemoveHtml($this->IdentificationMark->caption());

			// Religion
			$this->Religion->EditAttrs["class"] = "form-control";
			$this->Religion->EditCustomAttributes = "";
			if (!$this->Religion->Raw)
				$this->Religion->AdvancedSearch->SearchValue = HtmlDecode($this->Religion->AdvancedSearch->SearchValue);
			$this->Religion->EditValue = HtmlEncode($this->Religion->AdvancedSearch->SearchValue);
			$this->Religion->PlaceHolder = RemoveHtml($this->Religion->caption());

			// Nationality
			$this->Nationality->EditAttrs["class"] = "form-control";
			$this->Nationality->EditCustomAttributes = "";
			if (!$this->Nationality->Raw)
				$this->Nationality->AdvancedSearch->SearchValue = HtmlDecode($this->Nationality->AdvancedSearch->SearchValue);
			$this->Nationality->EditValue = HtmlEncode($this->Nationality->AdvancedSearch->SearchValue);
			$this->Nationality->PlaceHolder = RemoveHtml($this->Nationality->caption());

			// ReferedByDr
			$this->ReferedByDr->EditAttrs["class"] = "form-control";
			$this->ReferedByDr->EditCustomAttributes = "";
			if (!$this->ReferedByDr->Raw)
				$this->ReferedByDr->AdvancedSearch->SearchValue = HtmlDecode($this->ReferedByDr->AdvancedSearch->SearchValue);
			$this->ReferedByDr->EditValue = HtmlEncode($this->ReferedByDr->AdvancedSearch->SearchValue);
			$this->ReferedByDr->PlaceHolder = RemoveHtml($this->ReferedByDr->caption());

			// ReferClinicname
			$this->ReferClinicname->EditAttrs["class"] = "form-control";
			$this->ReferClinicname->EditCustomAttributes = "";
			if (!$this->ReferClinicname->Raw)
				$this->ReferClinicname->AdvancedSearch->SearchValue = HtmlDecode($this->ReferClinicname->AdvancedSearch->SearchValue);
			$this->ReferClinicname->EditValue = HtmlEncode($this->ReferClinicname->AdvancedSearch->SearchValue);
			$this->ReferClinicname->PlaceHolder = RemoveHtml($this->ReferClinicname->caption());

			// ReferCity
			$this->ReferCity->EditAttrs["class"] = "form-control";
			$this->ReferCity->EditCustomAttributes = "";
			if (!$this->ReferCity->Raw)
				$this->ReferCity->AdvancedSearch->SearchValue = HtmlDecode($this->ReferCity->AdvancedSearch->SearchValue);
			$this->ReferCity->EditValue = HtmlEncode($this->ReferCity->AdvancedSearch->SearchValue);
			$this->ReferCity->PlaceHolder = RemoveHtml($this->ReferCity->caption());

			// ReferMobileNo
			$this->ReferMobileNo->EditAttrs["class"] = "form-control";
			$this->ReferMobileNo->EditCustomAttributes = "";
			if (!$this->ReferMobileNo->Raw)
				$this->ReferMobileNo->AdvancedSearch->SearchValue = HtmlDecode($this->ReferMobileNo->AdvancedSearch->SearchValue);
			$this->ReferMobileNo->EditValue = HtmlEncode($this->ReferMobileNo->AdvancedSearch->SearchValue);
			$this->ReferMobileNo->PlaceHolder = RemoveHtml($this->ReferMobileNo->caption());

			// ReferA4TreatingConsultant
			$this->ReferA4TreatingConsultant->EditAttrs["class"] = "form-control";
			$this->ReferA4TreatingConsultant->EditCustomAttributes = "";
			if (!$this->ReferA4TreatingConsultant->Raw)
				$this->ReferA4TreatingConsultant->AdvancedSearch->SearchValue = HtmlDecode($this->ReferA4TreatingConsultant->AdvancedSearch->SearchValue);
			$this->ReferA4TreatingConsultant->EditValue = HtmlEncode($this->ReferA4TreatingConsultant->AdvancedSearch->SearchValue);
			$this->ReferA4TreatingConsultant->PlaceHolder = RemoveHtml($this->ReferA4TreatingConsultant->caption());

			// PurposreReferredfor
			$this->PurposreReferredfor->EditAttrs["class"] = "form-control";
			$this->PurposreReferredfor->EditCustomAttributes = "";
			if (!$this->PurposreReferredfor->Raw)
				$this->PurposreReferredfor->AdvancedSearch->SearchValue = HtmlDecode($this->PurposreReferredfor->AdvancedSearch->SearchValue);
			$this->PurposreReferredfor->EditValue = HtmlEncode($this->PurposreReferredfor->AdvancedSearch->SearchValue);
			$this->PurposreReferredfor->PlaceHolder = RemoveHtml($this->PurposreReferredfor->caption());

			// spouse_title
			$this->spouse_title->EditAttrs["class"] = "form-control";
			$this->spouse_title->EditCustomAttributes = "";

			// spouse_first_name
			$this->spouse_first_name->EditAttrs["class"] = "form-control";
			$this->spouse_first_name->EditCustomAttributes = "";
			if (!$this->spouse_first_name->Raw)
				$this->spouse_first_name->AdvancedSearch->SearchValue = HtmlDecode($this->spouse_first_name->AdvancedSearch->SearchValue);
			$this->spouse_first_name->EditValue = HtmlEncode($this->spouse_first_name->AdvancedSearch->SearchValue);
			$this->spouse_first_name->PlaceHolder = RemoveHtml($this->spouse_first_name->caption());

			// spouse_middle_name
			$this->spouse_middle_name->EditAttrs["class"] = "form-control";
			$this->spouse_middle_name->EditCustomAttributes = "";
			if (!$this->spouse_middle_name->Raw)
				$this->spouse_middle_name->AdvancedSearch->SearchValue = HtmlDecode($this->spouse_middle_name->AdvancedSearch->SearchValue);
			$this->spouse_middle_name->EditValue = HtmlEncode($this->spouse_middle_name->AdvancedSearch->SearchValue);
			$this->spouse_middle_name->PlaceHolder = RemoveHtml($this->spouse_middle_name->caption());

			// spouse_last_name
			$this->spouse_last_name->EditAttrs["class"] = "form-control";
			$this->spouse_last_name->EditCustomAttributes = "";
			if (!$this->spouse_last_name->Raw)
				$this->spouse_last_name->AdvancedSearch->SearchValue = HtmlDecode($this->spouse_last_name->AdvancedSearch->SearchValue);
			$this->spouse_last_name->EditValue = HtmlEncode($this->spouse_last_name->AdvancedSearch->SearchValue);
			$this->spouse_last_name->PlaceHolder = RemoveHtml($this->spouse_last_name->caption());

			// spouse_gender
			$this->spouse_gender->EditAttrs["class"] = "form-control";
			$this->spouse_gender->EditCustomAttributes = "";

			// spouse_dob
			$this->spouse_dob->EditAttrs["class"] = "form-control";
			$this->spouse_dob->EditCustomAttributes = "";
			$this->spouse_dob->EditValue = HtmlEncode(FormatDateTime(UnFormatDateTime($this->spouse_dob->AdvancedSearch->SearchValue, 7), 7));
			$this->spouse_dob->PlaceHolder = RemoveHtml($this->spouse_dob->caption());

			// spouse_Age
			$this->spouse_Age->EditAttrs["class"] = "form-control";
			$this->spouse_Age->EditCustomAttributes = "";
			if (!$this->spouse_Age->Raw)
				$this->spouse_Age->AdvancedSearch->SearchValue = HtmlDecode($this->spouse_Age->AdvancedSearch->SearchValue);
			$this->spouse_Age->EditValue = HtmlEncode($this->spouse_Age->AdvancedSearch->SearchValue);
			$this->spouse_Age->PlaceHolder = RemoveHtml($this->spouse_Age->caption());

			// spouse_blood_group
			$this->spouse_blood_group->EditAttrs["class"] = "form-control";
			$this->spouse_blood_group->EditCustomAttributes = "";

			// spouse_mobile_no
			$this->spouse_mobile_no->EditAttrs["class"] = "form-control";
			$this->spouse_mobile_no->EditCustomAttributes = "";
			if (!$this->spouse_mobile_no->Raw)
				$this->spouse_mobile_no->AdvancedSearch->SearchValue = HtmlDecode($this->spouse_mobile_no->AdvancedSearch->SearchValue);
			$this->spouse_mobile_no->EditValue = HtmlEncode($this->spouse_mobile_no->AdvancedSearch->SearchValue);
			$this->spouse_mobile_no->PlaceHolder = RemoveHtml($this->spouse_mobile_no->caption());

			// Maritalstatus
			$this->Maritalstatus->EditAttrs["class"] = "form-control";
			$this->Maritalstatus->EditCustomAttributes = "";

			// Business
			$this->Business->EditAttrs["class"] = "form-control";
			$this->Business->EditCustomAttributes = "";
			if (!$this->Business->Raw)
				$this->Business->AdvancedSearch->SearchValue = HtmlDecode($this->Business->AdvancedSearch->SearchValue);
			$this->Business->EditValue = HtmlEncode($this->Business->AdvancedSearch->SearchValue);
			$this->Business->PlaceHolder = RemoveHtml($this->Business->caption());

			// Patient_Language
			$this->Patient_Language->EditAttrs["class"] = "form-control";
			$this->Patient_Language->EditCustomAttributes = "";

			// Passport
			$this->Passport->EditAttrs["class"] = "form-control";
			$this->Passport->EditCustomAttributes = "";
			if (!$this->Passport->Raw)
				$this->Passport->AdvancedSearch->SearchValue = HtmlDecode($this->Passport->AdvancedSearch->SearchValue);
			$this->Passport->EditValue = HtmlEncode($this->Passport->AdvancedSearch->SearchValue);
			$this->Passport->PlaceHolder = RemoveHtml($this->Passport->caption());

			// VisaNo
			$this->VisaNo->EditAttrs["class"] = "form-control";
			$this->VisaNo->EditCustomAttributes = "";
			if (!$this->VisaNo->Raw)
				$this->VisaNo->AdvancedSearch->SearchValue = HtmlDecode($this->VisaNo->AdvancedSearch->SearchValue);
			$this->VisaNo->EditValue = HtmlEncode($this->VisaNo->AdvancedSearch->SearchValue);
			$this->VisaNo->PlaceHolder = RemoveHtml($this->VisaNo->caption());

			// ValidityOfVisa
			$this->ValidityOfVisa->EditAttrs["class"] = "form-control";
			$this->ValidityOfVisa->EditCustomAttributes = "";
			if (!$this->ValidityOfVisa->Raw)
				$this->ValidityOfVisa->AdvancedSearch->SearchValue = HtmlDecode($this->ValidityOfVisa->AdvancedSearch->SearchValue);
			$this->ValidityOfVisa->EditValue = HtmlEncode($this->ValidityOfVisa->AdvancedSearch->SearchValue);
			$this->ValidityOfVisa->PlaceHolder = RemoveHtml($this->ValidityOfVisa->caption());

			// WhereDidYouHear
			$this->WhereDidYouHear->EditCustomAttributes = "";

			// HospID
			$this->HospID->EditAttrs["class"] = "form-control";
			$this->HospID->EditCustomAttributes = "";

			// street
			$this->street->EditAttrs["class"] = "form-control";
			$this->street->EditCustomAttributes = "";
			if (!$this->street->Raw)
				$this->street->AdvancedSearch->SearchValue = HtmlDecode($this->street->AdvancedSearch->SearchValue);
			$this->street->EditValue = HtmlEncode($this->street->AdvancedSearch->SearchValue);
			$this->street->PlaceHolder = RemoveHtml($this->street->caption());

			// town
			$this->town->EditAttrs["class"] = "form-control";
			$this->town->EditCustomAttributes = "";
			if (!$this->town->Raw)
				$this->town->AdvancedSearch->SearchValue = HtmlDecode($this->town->AdvancedSearch->SearchValue);
			$this->town->EditValue = HtmlEncode($this->town->AdvancedSearch->SearchValue);
			$this->town->PlaceHolder = RemoveHtml($this->town->caption());

			// province
			$this->province->EditAttrs["class"] = "form-control";
			$this->province->EditCustomAttributes = "";
			if (!$this->province->Raw)
				$this->province->AdvancedSearch->SearchValue = HtmlDecode($this->province->AdvancedSearch->SearchValue);
			$this->province->EditValue = HtmlEncode($this->province->AdvancedSearch->SearchValue);
			$this->province->PlaceHolder = RemoveHtml($this->province->caption());

			// country
			$this->country->EditAttrs["class"] = "form-control";
			$this->country->EditCustomAttributes = "";
			if (!$this->country->Raw)
				$this->country->AdvancedSearch->SearchValue = HtmlDecode($this->country->AdvancedSearch->SearchValue);
			$this->country->EditValue = HtmlEncode($this->country->AdvancedSearch->SearchValue);
			$this->country->PlaceHolder = RemoveHtml($this->country->caption());

			// postal_code
			$this->postal_code->EditAttrs["class"] = "form-control";
			$this->postal_code->EditCustomAttributes = "";
			if (!$this->postal_code->Raw)
				$this->postal_code->AdvancedSearch->SearchValue = HtmlDecode($this->postal_code->AdvancedSearch->SearchValue);
			$this->postal_code->EditValue = HtmlEncode($this->postal_code->AdvancedSearch->SearchValue);
			$this->postal_code->PlaceHolder = RemoveHtml($this->postal_code->caption());

			// PEmail
			$this->PEmail->EditAttrs["class"] = "form-control";
			$this->PEmail->EditCustomAttributes = "";
			if (!$this->PEmail->Raw)
				$this->PEmail->AdvancedSearch->SearchValue = HtmlDecode($this->PEmail->AdvancedSearch->SearchValue);
			$this->PEmail->EditValue = HtmlEncode($this->PEmail->AdvancedSearch->SearchValue);
			$this->PEmail->PlaceHolder = RemoveHtml($this->PEmail->caption());

			// PEmergencyContact
			$this->PEmergencyContact->EditAttrs["class"] = "form-control";
			$this->PEmergencyContact->EditCustomAttributes = "";
			if (!$this->PEmergencyContact->Raw)
				$this->PEmergencyContact->AdvancedSearch->SearchValue = HtmlDecode($this->PEmergencyContact->AdvancedSearch->SearchValue);
			$this->PEmergencyContact->EditValue = HtmlEncode($this->PEmergencyContact->AdvancedSearch->SearchValue);
			$this->PEmergencyContact->PlaceHolder = RemoveHtml($this->PEmergencyContact->caption());

			// occupation
			$this->occupation->EditAttrs["class"] = "form-control";
			$this->occupation->EditCustomAttributes = "";
			if (!$this->occupation->Raw)
				$this->occupation->AdvancedSearch->SearchValue = HtmlDecode($this->occupation->AdvancedSearch->SearchValue);
			$this->occupation->EditValue = HtmlEncode($this->occupation->AdvancedSearch->SearchValue);
			$this->occupation->PlaceHolder = RemoveHtml($this->occupation->caption());

			// spouse_occupation
			$this->spouse_occupation->EditAttrs["class"] = "form-control";
			$this->spouse_occupation->EditCustomAttributes = "";
			if (!$this->spouse_occupation->Raw)
				$this->spouse_occupation->AdvancedSearch->SearchValue = HtmlDecode($this->spouse_occupation->AdvancedSearch->SearchValue);
			$this->spouse_occupation->EditValue = HtmlEncode($this->spouse_occupation->AdvancedSearch->SearchValue);
			$this->spouse_occupation->PlaceHolder = RemoveHtml($this->spouse_occupation->caption());

			// WhatsApp
			$this->WhatsApp->EditAttrs["class"] = "form-control";
			$this->WhatsApp->EditCustomAttributes = "";
			if (!$this->WhatsApp->Raw)
				$this->WhatsApp->AdvancedSearch->SearchValue = HtmlDecode($this->WhatsApp->AdvancedSearch->SearchValue);
			$this->WhatsApp->EditValue = HtmlEncode($this->WhatsApp->AdvancedSearch->SearchValue);
			$this->WhatsApp->PlaceHolder = RemoveHtml($this->WhatsApp->caption());

			// CouppleID
			$this->CouppleID->EditAttrs["class"] = "form-control";
			$this->CouppleID->EditCustomAttributes = "";
			$this->CouppleID->EditValue = HtmlEncode($this->CouppleID->AdvancedSearch->SearchValue);
			$this->CouppleID->PlaceHolder = RemoveHtml($this->CouppleID->caption());

			// MaleID
			$this->MaleID->EditAttrs["class"] = "form-control";
			$this->MaleID->EditCustomAttributes = "";
			$this->MaleID->EditValue = HtmlEncode($this->MaleID->AdvancedSearch->SearchValue);
			$this->MaleID->PlaceHolder = RemoveHtml($this->MaleID->caption());

			// FemaleID
			$this->FemaleID->EditAttrs["class"] = "form-control";
			$this->FemaleID->EditCustomAttributes = "";
			$this->FemaleID->EditValue = HtmlEncode($this->FemaleID->AdvancedSearch->SearchValue);
			$this->FemaleID->PlaceHolder = RemoveHtml($this->FemaleID->caption());

			// GroupID
			$this->GroupID->EditAttrs["class"] = "form-control";
			$this->GroupID->EditCustomAttributes = "";
			$this->GroupID->EditValue = HtmlEncode($this->GroupID->AdvancedSearch->SearchValue);
			$this->GroupID->PlaceHolder = RemoveHtml($this->GroupID->caption());

			// Relationship
			$this->Relationship->EditAttrs["class"] = "form-control";
			$this->Relationship->EditCustomAttributes = "";
			if (!$this->Relationship->Raw)
				$this->Relationship->AdvancedSearch->SearchValue = HtmlDecode($this->Relationship->AdvancedSearch->SearchValue);
			$this->Relationship->EditValue = HtmlEncode($this->Relationship->AdvancedSearch->SearchValue);
			$this->Relationship->PlaceHolder = RemoveHtml($this->Relationship->caption());

			// FacebookID
			$this->FacebookID->EditAttrs["class"] = "form-control";
			$this->FacebookID->EditCustomAttributes = "";
			if (!$this->FacebookID->Raw)
				$this->FacebookID->AdvancedSearch->SearchValue = HtmlDecode($this->FacebookID->AdvancedSearch->SearchValue);
			$this->FacebookID->EditValue = HtmlEncode($this->FacebookID->AdvancedSearch->SearchValue);
			$this->FacebookID->PlaceHolder = RemoveHtml($this->FacebookID->caption());
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
		if (!CheckDate($this->createddatetime->AdvancedSearch->SearchValue)) {
			AddMessage($SearchError, $this->createddatetime->errorMessage());
		}
		if (!CheckDate($this->createddatetime->AdvancedSearch->SearchValue2)) {
			AddMessage($SearchError, $this->createddatetime->errorMessage());
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
		$this->id->AdvancedSearch->load();
		$this->PatientID->AdvancedSearch->load();
		$this->title->AdvancedSearch->load();
		$this->first_name->AdvancedSearch->load();
		$this->middle_name->AdvancedSearch->load();
		$this->last_name->AdvancedSearch->load();
		$this->gender->AdvancedSearch->load();
		$this->dob->AdvancedSearch->load();
		$this->Age->AdvancedSearch->load();
		$this->blood_group->AdvancedSearch->load();
		$this->mobile_no->AdvancedSearch->load();
		$this->description->AdvancedSearch->load();
		$this->status->AdvancedSearch->load();
		$this->createdby->AdvancedSearch->load();
		$this->createddatetime->AdvancedSearch->load();
		$this->modifiedby->AdvancedSearch->load();
		$this->modifieddatetime->AdvancedSearch->load();
		$this->profilePic->AdvancedSearch->load();
		$this->IdentificationMark->AdvancedSearch->load();
		$this->Religion->AdvancedSearch->load();
		$this->Nationality->AdvancedSearch->load();
		$this->ReferedByDr->AdvancedSearch->load();
		$this->ReferClinicname->AdvancedSearch->load();
		$this->ReferCity->AdvancedSearch->load();
		$this->ReferMobileNo->AdvancedSearch->load();
		$this->ReferA4TreatingConsultant->AdvancedSearch->load();
		$this->PurposreReferredfor->AdvancedSearch->load();
		$this->spouse_title->AdvancedSearch->load();
		$this->spouse_first_name->AdvancedSearch->load();
		$this->spouse_middle_name->AdvancedSearch->load();
		$this->spouse_last_name->AdvancedSearch->load();
		$this->spouse_gender->AdvancedSearch->load();
		$this->spouse_dob->AdvancedSearch->load();
		$this->spouse_Age->AdvancedSearch->load();
		$this->spouse_blood_group->AdvancedSearch->load();
		$this->spouse_mobile_no->AdvancedSearch->load();
		$this->Maritalstatus->AdvancedSearch->load();
		$this->Business->AdvancedSearch->load();
		$this->Patient_Language->AdvancedSearch->load();
		$this->Passport->AdvancedSearch->load();
		$this->VisaNo->AdvancedSearch->load();
		$this->ValidityOfVisa->AdvancedSearch->load();
		$this->WhereDidYouHear->AdvancedSearch->load();
		$this->HospID->AdvancedSearch->load();
		$this->street->AdvancedSearch->load();
		$this->town->AdvancedSearch->load();
		$this->province->AdvancedSearch->load();
		$this->country->AdvancedSearch->load();
		$this->postal_code->AdvancedSearch->load();
		$this->PEmail->AdvancedSearch->load();
		$this->PEmergencyContact->AdvancedSearch->load();
		$this->occupation->AdvancedSearch->load();
		$this->spouse_occupation->AdvancedSearch->load();
		$this->WhatsApp->AdvancedSearch->load();
		$this->CouppleID->AdvancedSearch->load();
		$this->MaleID->AdvancedSearch->load();
		$this->FemaleID->AdvancedSearch->load();
		$this->GroupID->AdvancedSearch->load();
		$this->Relationship->AdvancedSearch->load();
		$this->AppointmentSearch->AdvancedSearch->load();
		$this->FacebookID->AdvancedSearch->load();
	}

	// Get export HTML tag
	protected function getExportTag($type, $custom = FALSE)
	{
		global $Language;
		if (SameText($type, "excel")) {
			if ($custom)
				return "<a href=\"#\" class=\"ew-export-link ew-excel\" title=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" onclick=\"return ew.export(document.fpatientlist, '" . $this->ExportExcelUrl . "', 'excel', true);\">" . $Language->phrase("ExportToExcel") . "</a>";
			else
				return "<a href=\"" . $this->ExportExcelUrl . "\" class=\"ew-export-link ew-excel\" title=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\">" . $Language->phrase("ExportToExcel") . "</a>";
		} elseif (SameText($type, "word")) {
			if ($custom)
				return "<a href=\"#\" class=\"ew-export-link ew-word\" title=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" onclick=\"return ew.export(document.fpatientlist, '" . $this->ExportWordUrl . "', 'word', true);\">" . $Language->phrase("ExportToWord") . "</a>";
			else
				return "<a href=\"" . $this->ExportWordUrl . "\" class=\"ew-export-link ew-word\" title=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\">" . $Language->phrase("ExportToWord") . "</a>";
		} elseif (SameText($type, "pdf")) {
			if ($custom)
				return "<a href=\"#\" class=\"ew-export-link ew-pdf\" title=\"" . HtmlEncode($Language->phrase("ExportToPDFText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToPDFText")) . "\" onclick=\"return ew.export(document.fpatientlist, '" . $this->ExportPdfUrl . "', 'pdf', true);\">" . $Language->phrase("ExportToPDF") . "</a>";
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
			return '<button id="emf_patient" class="ew-export-link ew-email" title="' . $Language->phrase("ExportToEmailText") . '" data-caption="' . $Language->phrase("ExportToEmailText") . '" onclick="ew.emailDialogShow({lnk:\'emf_patient\', hdr:ew.language.phrase(\'ExportToEmailText\'), f:document.fpatientlist, sel:false' . $url . '});">' . $Language->phrase("ExportToEmail") . '</button>';
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
		$item->Body = "<a class=\"btn btn-default ew-search-toggle" . $searchToggleClass . "\" href=\"#\" role=\"button\" title=\"" . $Language->phrase("SearchPanel") . "\" data-caption=\"" . $Language->phrase("SearchPanel") . "\" data-toggle=\"button\" data-form=\"fpatientlistsrch\" aria-pressed=\"" . ($searchToggleClass == " active" ? "true" : "false") . "\">" . $Language->phrase("SearchLink") . "</a>";
		$item->Visible = TRUE;

		// Show all button
		$item = &$this->SearchOptions->add("showall");
		$item->Body = "<a class=\"btn btn-default ew-show-all\" title=\"" . $Language->phrase("ShowAll") . "\" data-caption=\"" . $Language->phrase("ShowAll") . "\" href=\"" . $this->pageUrl() . "cmd=reset\">" . $Language->phrase("ShowAllBtn") . "</a>";
		$item->Visible = ($this->SearchWhere != $this->DefaultSearchWhere && $this->SearchWhere != "0=101");

		// Advanced search button
		$item = &$this->SearchOptions->add("advancedsearch");
		if (IsMobile())
			$item->Body = "<a class=\"btn btn-default ew-advanced-search\" title=\"" . $Language->phrase("AdvancedSearch") . "\" data-caption=\"" . $Language->phrase("AdvancedSearch") . "\" href=\"patientsrch.php\">" . $Language->phrase("AdvancedSearchBtn") . "</a>";
		else
			$item->Body = "<a class=\"btn btn-default ew-advanced-search\" title=\"" . $Language->phrase("AdvancedSearch") . "\" data-table=\"patient\" data-caption=\"" . $Language->phrase("AdvancedSearch") . "\" href=\"#\" onclick=\"return ew.modalDialogShow({lnk:this,btn:'SearchBtn',url:'patientsrch.php'});\">" . $Language->phrase("AdvancedSearchBtn") . "</a>";
		$item->Visible = TRUE;

		// Search highlight button
		$item = &$this->SearchOptions->add("searchhighlight");
		$item->Body = "<a class=\"btn btn-default ew-highlight active\" href=\"#\" role=\"button\" title=\"" . $Language->phrase("Highlight") . "\" data-caption=\"" . $Language->phrase("Highlight") . "\" data-toggle=\"button\" data-form=\"fpatientlistsrch\" data-name=\"" . $this->highlightName() . "\">" . $Language->phrase("HighlightBtn") . "</a>";
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
				case "x_title":
					break;
				case "x_gender":
					break;
				case "x_blood_group":
					break;
				case "x_status":
					break;
				case "x_ReferedByDr":
					break;
				case "x_ReferA4TreatingConsultant":
					$lookupFilter = function() {
						return "`HospID`='".HospitalID()."'";
					};
					$lookupFilter = $lookupFilter->bindTo($this);
					break;
				case "x_spouse_title":
					break;
				case "x_spouse_gender":
					break;
				case "x_spouse_blood_group":
					break;
				case "x_Maritalstatus":
					break;
				case "x_Business":
					break;
				case "x_Patient_Language":
					break;
				case "x_WhereDidYouHear":
					break;
				case "x_HospID":
					break;
				case "x_AppointmentSearch":
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
						case "x_title":
							break;
						case "x_gender":
							break;
						case "x_blood_group":
							break;
						case "x_status":
							break;
						case "x_ReferedByDr":
							break;
						case "x_ReferA4TreatingConsultant":
							break;
						case "x_spouse_title":
							break;
						case "x_spouse_gender":
							break;
						case "x_spouse_blood_group":
							break;
						case "x_Maritalstatus":
							break;
						case "x_Business":
							break;
						case "x_Patient_Language":
							break;
						case "x_WhereDidYouHear":
							break;
						case "x_HospID":
							break;
						case "x_AppointmentSearch":
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
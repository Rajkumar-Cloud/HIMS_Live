<?php
namespace PHPMaker2020\HIMS;

/**
 * Page class
 */
class patient_services_list extends patient_services
{

	// Page ID
	public $PageID = "list";

	// Project ID
	public $ProjectID = "{EA4F6D13-AF8F-428D-9EA7-BA88D1107EC3}";

	// Table name
	public $TableName = 'patient_services';

	// Page object name
	public $PageObjName = "patient_services_list";

	// Grid form hidden field names
	public $FormName = "fpatient_serviceslist";
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

		// Table object (patient_services)
		if (!isset($GLOBALS["patient_services"]) || get_class($GLOBALS["patient_services"]) == PROJECT_NAMESPACE . "patient_services") {
			$GLOBALS["patient_services"] = &$this;
			$GLOBALS["Table"] = &$GLOBALS["patient_services"];
		}

		// Initialize URLs
		$this->ExportPrintUrl = $this->pageUrl() . "export=print";
		$this->ExportExcelUrl = $this->pageUrl() . "export=excel";
		$this->ExportWordUrl = $this->pageUrl() . "export=word";
		$this->ExportPdfUrl = $this->pageUrl() . "export=pdf";
		$this->ExportHtmlUrl = $this->pageUrl() . "export=html";
		$this->ExportXmlUrl = $this->pageUrl() . "export=xml";
		$this->ExportCsvUrl = $this->pageUrl() . "export=csv";
		$this->AddUrl = "patient_servicesadd.php";
		$this->InlineAddUrl = $this->pageUrl() . "action=add";
		$this->GridAddUrl = $this->pageUrl() . "action=gridadd";
		$this->GridEditUrl = $this->pageUrl() . "action=gridedit";
		$this->MultiDeleteUrl = "patient_servicesdelete.php";
		$this->MultiUpdateUrl = "patient_servicesupdate.php";

		// Table object (user_login)
		if (!isset($GLOBALS['user_login']))
			$GLOBALS['user_login'] = new user_login();

		// Table object (ip_admission)
		if (!isset($GLOBALS['ip_admission']))
			$GLOBALS['ip_admission'] = new ip_admission();

		// Table object (billing_voucher)
		if (!isset($GLOBALS['billing_voucher']))
			$GLOBALS['billing_voucher'] = new billing_voucher();

		// Page ID (for backward compatibility only)
		if (!defined(PROJECT_NAMESPACE . "PAGE_ID"))
			define(PROJECT_NAMESPACE . "PAGE_ID", 'list');

		// Table name (for backward compatibility only)
		if (!defined(PROJECT_NAMESPACE . "TABLE_NAME"))
			define(PROJECT_NAMESPACE . "TABLE_NAME", 'patient_services');

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
		$this->FilterOptions->TagClassName = "ew-filter-option fpatient_serviceslistsrch";

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
		global $patient_services;
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
				$doc = new $class($patient_services);
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
		$this->id->setVisibility();
		$this->Reception->setVisibility();
		$this->Services->setVisibility();
		$this->amount->setVisibility();
		$this->description->setVisibility();
		$this->patient_type->setVisibility();
		$this->charged_date->setVisibility();
		$this->status->setVisibility();
		$this->createdby->Visible = FALSE;
		$this->createddatetime->Visible = FALSE;
		$this->modifiedby->Visible = FALSE;
		$this->modifieddatetime->Visible = FALSE;
		$this->mrnno->setVisibility();
		$this->PatientName->setVisibility();
		$this->Age->setVisibility();
		$this->Gender->setVisibility();
		$this->profilePic->Visible = FALSE;
		$this->Unit->setVisibility();
		$this->Quantity->setVisibility();
		$this->Discount->setVisibility();
		$this->SubTotal->setVisibility();
		$this->ServiceSelect->setVisibility();
		$this->Aid->setVisibility();
		$this->Vid->setVisibility();
		$this->DrID->setVisibility();
		$this->DrCODE->setVisibility();
		$this->DrName->setVisibility();
		$this->Department->setVisibility();
		$this->DrSharePres->setVisibility();
		$this->HospSharePres->setVisibility();
		$this->DrShareAmount->setVisibility();
		$this->HospShareAmount->setVisibility();
		$this->DrShareSettiledAmount->setVisibility();
		$this->DrShareSettledId->setVisibility();
		$this->DrShareSettiledStatus->setVisibility();
		$this->invoiceId->setVisibility();
		$this->invoiceAmount->setVisibility();
		$this->invoiceStatus->setVisibility();
		$this->modeOfPayment->setVisibility();
		$this->HospID->setVisibility();
		$this->RIDNO->setVisibility();
		$this->TidNo->setVisibility();
		$this->DiscountCategory->setVisibility();
		$this->sid->setVisibility();
		$this->ItemCode->setVisibility();
		$this->TestSubCd->setVisibility();
		$this->DEptCd->setVisibility();
		$this->ProfCd->setVisibility();
		$this->LabReport->Visible = FALSE;
		$this->Comments->setVisibility();
		$this->Method->setVisibility();
		$this->Specimen->setVisibility();
		$this->Abnormal->setVisibility();
		$this->RefValue->Visible = FALSE;
		$this->TestUnit->setVisibility();
		$this->LOWHIGH->setVisibility();
		$this->Branch->setVisibility();
		$this->Dispatch->setVisibility();
		$this->Pic1->setVisibility();
		$this->Pic2->setVisibility();
		$this->GraphPath->setVisibility();
		$this->MachineCD->setVisibility();
		$this->TestCancel->setVisibility();
		$this->OutSource->setVisibility();
		$this->Printed->setVisibility();
		$this->PrintBy->setVisibility();
		$this->PrintDate->setVisibility();
		$this->BillingDate->setVisibility();
		$this->BilledBy->setVisibility();
		$this->Resulted->setVisibility();
		$this->ResultDate->setVisibility();
		$this->ResultedBy->setVisibility();
		$this->SampleDate->setVisibility();
		$this->SampleUser->setVisibility();
		$this->Sampled->setVisibility();
		$this->ReceivedDate->setVisibility();
		$this->ReceivedUser->setVisibility();
		$this->Recevied->setVisibility();
		$this->DeptRecvDate->setVisibility();
		$this->DeptRecvUser->setVisibility();
		$this->DeptRecived->setVisibility();
		$this->SAuthDate->setVisibility();
		$this->SAuthBy->setVisibility();
		$this->SAuthendicate->setVisibility();
		$this->AuthDate->setVisibility();
		$this->AuthBy->setVisibility();
		$this->Authencate->setVisibility();
		$this->EditDate->setVisibility();
		$this->EditBy->setVisibility();
		$this->Editted->setVisibility();
		$this->PatID->setVisibility();
		$this->PatientId->setVisibility();
		$this->Mobile->setVisibility();
		$this->CId->setVisibility();
		$this->Order->setVisibility();
		$this->Form->Visible = FALSE;
		$this->ResType->setVisibility();
		$this->Sample->setVisibility();
		$this->NoD->setVisibility();
		$this->BillOrder->setVisibility();
		$this->Formula->Visible = FALSE;
		$this->Inactive->setVisibility();
		$this->CollSample->setVisibility();
		$this->TestType->setVisibility();
		$this->Repeated->setVisibility();
		$this->RepeatedBy->setVisibility();
		$this->RepeatedDate->setVisibility();
		$this->serviceID->setVisibility();
		$this->Service_Type->setVisibility();
		$this->Service_Department->setVisibility();
		$this->RequestNo->setVisibility();
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
		$this->setupLookupOptions($this->Services);
		$this->setupLookupOptions($this->status);
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

			// Check QueryString parameters
			if (Get("action") !== NULL) {
				$this->CurrentAction = Get("action");

				// Clear inline mode
				if ($this->isCancel())
					$this->clearInlineMode();

				// Switch to grid edit mode
				if ($this->isGridEdit())
					$this->gridEditMode();

				// Switch to grid add mode
				if ($this->isGridAdd())
					$this->gridAddMode();
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

		// Restore master/detail filter
		$this->DbMasterFilter = $this->getMasterFilter(); // Restore master filter
		$this->DbDetailFilter = $this->getDetailFilter(); // Restore detail filter
		AddFilter($filter, $this->DbDetailFilter);
		AddFilter($filter, $this->SearchWhere);

		// Load master record
		if ($this->CurrentMode != "add" && $this->getMasterFilter() != "" && $this->getCurrentMasterTable() == "billing_voucher") {
			global $billing_voucher;
			$rsmaster = $billing_voucher->loadRs($this->DbMasterFilter);
			$this->MasterRecordExists = ($rsmaster && !$rsmaster->EOF);
			if (!$this->MasterRecordExists) {
				$this->setFailureMessage($Language->phrase("NoRecord")); // Set no record found
				$this->terminate("billing_voucherlist.php"); // Return to master page
			} else {
				$billing_voucher->loadListRowValues($rsmaster);
				$billing_voucher->RowType = ROWTYPE_MASTER; // Master row
				$billing_voucher->renderListRow();
				$rsmaster->close();
			}
		}

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

	// Exit inline mode
	protected function clearInlineMode()
	{
		$this->amount->FormValue = ""; // Clear form value
		$this->Discount->FormValue = ""; // Clear form value
		$this->SubTotal->FormValue = ""; // Clear form value
		$this->DrSharePres->FormValue = ""; // Clear form value
		$this->HospSharePres->FormValue = ""; // Clear form value
		$this->DrShareAmount->FormValue = ""; // Clear form value
		$this->HospShareAmount->FormValue = ""; // Clear form value
		$this->DrShareSettiledAmount->FormValue = ""; // Clear form value
		$this->invoiceAmount->FormValue = ""; // Clear form value
		$this->Order->FormValue = ""; // Clear form value
		$this->NoD->FormValue = ""; // Clear form value
		$this->BillOrder->FormValue = ""; // Clear form value
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
		if ($CurrentForm->hasValue("x_Reception") && $CurrentForm->hasValue("o_Reception") && $this->Reception->CurrentValue != $this->Reception->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_Services") && $CurrentForm->hasValue("o_Services") && $this->Services->CurrentValue != $this->Services->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_amount") && $CurrentForm->hasValue("o_amount") && $this->amount->CurrentValue != $this->amount->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_description") && $CurrentForm->hasValue("o_description") && $this->description->CurrentValue != $this->description->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_patient_type") && $CurrentForm->hasValue("o_patient_type") && $this->patient_type->CurrentValue != $this->patient_type->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_status") && $CurrentForm->hasValue("o_status") && $this->status->CurrentValue != $this->status->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_mrnno") && $CurrentForm->hasValue("o_mrnno") && $this->mrnno->CurrentValue != $this->mrnno->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_PatientName") && $CurrentForm->hasValue("o_PatientName") && $this->PatientName->CurrentValue != $this->PatientName->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_Age") && $CurrentForm->hasValue("o_Age") && $this->Age->CurrentValue != $this->Age->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_Gender") && $CurrentForm->hasValue("o_Gender") && $this->Gender->CurrentValue != $this->Gender->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_Unit") && $CurrentForm->hasValue("o_Unit") && $this->Unit->CurrentValue != $this->Unit->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_Quantity") && $CurrentForm->hasValue("o_Quantity") && $this->Quantity->CurrentValue != $this->Quantity->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_Discount") && $CurrentForm->hasValue("o_Discount") && $this->Discount->CurrentValue != $this->Discount->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_SubTotal") && $CurrentForm->hasValue("o_SubTotal") && $this->SubTotal->CurrentValue != $this->SubTotal->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_ServiceSelect") && $CurrentForm->hasValue("o_ServiceSelect") && $this->ServiceSelect->CurrentValue != $this->ServiceSelect->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_Aid") && $CurrentForm->hasValue("o_Aid") && $this->Aid->CurrentValue != $this->Aid->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_Vid") && $CurrentForm->hasValue("o_Vid") && $this->Vid->CurrentValue != $this->Vid->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_DrID") && $CurrentForm->hasValue("o_DrID") && $this->DrID->CurrentValue != $this->DrID->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_DrCODE") && $CurrentForm->hasValue("o_DrCODE") && $this->DrCODE->CurrentValue != $this->DrCODE->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_DrName") && $CurrentForm->hasValue("o_DrName") && $this->DrName->CurrentValue != $this->DrName->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_Department") && $CurrentForm->hasValue("o_Department") && $this->Department->CurrentValue != $this->Department->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_DrSharePres") && $CurrentForm->hasValue("o_DrSharePres") && $this->DrSharePres->CurrentValue != $this->DrSharePres->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_HospSharePres") && $CurrentForm->hasValue("o_HospSharePres") && $this->HospSharePres->CurrentValue != $this->HospSharePres->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_DrShareAmount") && $CurrentForm->hasValue("o_DrShareAmount") && $this->DrShareAmount->CurrentValue != $this->DrShareAmount->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_HospShareAmount") && $CurrentForm->hasValue("o_HospShareAmount") && $this->HospShareAmount->CurrentValue != $this->HospShareAmount->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_DrShareSettiledAmount") && $CurrentForm->hasValue("o_DrShareSettiledAmount") && $this->DrShareSettiledAmount->CurrentValue != $this->DrShareSettiledAmount->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_DrShareSettledId") && $CurrentForm->hasValue("o_DrShareSettledId") && $this->DrShareSettledId->CurrentValue != $this->DrShareSettledId->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_DrShareSettiledStatus") && $CurrentForm->hasValue("o_DrShareSettiledStatus") && $this->DrShareSettiledStatus->CurrentValue != $this->DrShareSettiledStatus->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_invoiceId") && $CurrentForm->hasValue("o_invoiceId") && $this->invoiceId->CurrentValue != $this->invoiceId->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_invoiceAmount") && $CurrentForm->hasValue("o_invoiceAmount") && $this->invoiceAmount->CurrentValue != $this->invoiceAmount->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_invoiceStatus") && $CurrentForm->hasValue("o_invoiceStatus") && $this->invoiceStatus->CurrentValue != $this->invoiceStatus->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_modeOfPayment") && $CurrentForm->hasValue("o_modeOfPayment") && $this->modeOfPayment->CurrentValue != $this->modeOfPayment->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_RIDNO") && $CurrentForm->hasValue("o_RIDNO") && $this->RIDNO->CurrentValue != $this->RIDNO->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_TidNo") && $CurrentForm->hasValue("o_TidNo") && $this->TidNo->CurrentValue != $this->TidNo->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_DiscountCategory") && $CurrentForm->hasValue("o_DiscountCategory") && $this->DiscountCategory->CurrentValue != $this->DiscountCategory->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_sid") && $CurrentForm->hasValue("o_sid") && $this->sid->CurrentValue != $this->sid->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_ItemCode") && $CurrentForm->hasValue("o_ItemCode") && $this->ItemCode->CurrentValue != $this->ItemCode->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_TestSubCd") && $CurrentForm->hasValue("o_TestSubCd") && $this->TestSubCd->CurrentValue != $this->TestSubCd->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_DEptCd") && $CurrentForm->hasValue("o_DEptCd") && $this->DEptCd->CurrentValue != $this->DEptCd->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_ProfCd") && $CurrentForm->hasValue("o_ProfCd") && $this->ProfCd->CurrentValue != $this->ProfCd->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_Comments") && $CurrentForm->hasValue("o_Comments") && $this->Comments->CurrentValue != $this->Comments->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_Method") && $CurrentForm->hasValue("o_Method") && $this->Method->CurrentValue != $this->Method->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_Specimen") && $CurrentForm->hasValue("o_Specimen") && $this->Specimen->CurrentValue != $this->Specimen->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_Abnormal") && $CurrentForm->hasValue("o_Abnormal") && $this->Abnormal->CurrentValue != $this->Abnormal->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_TestUnit") && $CurrentForm->hasValue("o_TestUnit") && $this->TestUnit->CurrentValue != $this->TestUnit->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_LOWHIGH") && $CurrentForm->hasValue("o_LOWHIGH") && $this->LOWHIGH->CurrentValue != $this->LOWHIGH->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_Branch") && $CurrentForm->hasValue("o_Branch") && $this->Branch->CurrentValue != $this->Branch->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_Dispatch") && $CurrentForm->hasValue("o_Dispatch") && $this->Dispatch->CurrentValue != $this->Dispatch->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_Pic1") && $CurrentForm->hasValue("o_Pic1") && $this->Pic1->CurrentValue != $this->Pic1->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_Pic2") && $CurrentForm->hasValue("o_Pic2") && $this->Pic2->CurrentValue != $this->Pic2->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_GraphPath") && $CurrentForm->hasValue("o_GraphPath") && $this->GraphPath->CurrentValue != $this->GraphPath->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_MachineCD") && $CurrentForm->hasValue("o_MachineCD") && $this->MachineCD->CurrentValue != $this->MachineCD->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_TestCancel") && $CurrentForm->hasValue("o_TestCancel") && $this->TestCancel->CurrentValue != $this->TestCancel->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_OutSource") && $CurrentForm->hasValue("o_OutSource") && $this->OutSource->CurrentValue != $this->OutSource->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_Printed") && $CurrentForm->hasValue("o_Printed") && $this->Printed->CurrentValue != $this->Printed->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_PrintBy") && $CurrentForm->hasValue("o_PrintBy") && $this->PrintBy->CurrentValue != $this->PrintBy->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_PrintDate") && $CurrentForm->hasValue("o_PrintDate") && $this->PrintDate->CurrentValue != $this->PrintDate->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_BillingDate") && $CurrentForm->hasValue("o_BillingDate") && $this->BillingDate->CurrentValue != $this->BillingDate->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_BilledBy") && $CurrentForm->hasValue("o_BilledBy") && $this->BilledBy->CurrentValue != $this->BilledBy->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_Resulted") && $CurrentForm->hasValue("o_Resulted") && $this->Resulted->CurrentValue != $this->Resulted->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_ResultDate") && $CurrentForm->hasValue("o_ResultDate") && $this->ResultDate->CurrentValue != $this->ResultDate->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_ResultedBy") && $CurrentForm->hasValue("o_ResultedBy") && $this->ResultedBy->CurrentValue != $this->ResultedBy->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_SampleDate") && $CurrentForm->hasValue("o_SampleDate") && $this->SampleDate->CurrentValue != $this->SampleDate->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_SampleUser") && $CurrentForm->hasValue("o_SampleUser") && $this->SampleUser->CurrentValue != $this->SampleUser->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_Sampled") && $CurrentForm->hasValue("o_Sampled") && $this->Sampled->CurrentValue != $this->Sampled->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_ReceivedDate") && $CurrentForm->hasValue("o_ReceivedDate") && $this->ReceivedDate->CurrentValue != $this->ReceivedDate->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_ReceivedUser") && $CurrentForm->hasValue("o_ReceivedUser") && $this->ReceivedUser->CurrentValue != $this->ReceivedUser->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_Recevied") && $CurrentForm->hasValue("o_Recevied") && $this->Recevied->CurrentValue != $this->Recevied->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_DeptRecvDate") && $CurrentForm->hasValue("o_DeptRecvDate") && $this->DeptRecvDate->CurrentValue != $this->DeptRecvDate->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_DeptRecvUser") && $CurrentForm->hasValue("o_DeptRecvUser") && $this->DeptRecvUser->CurrentValue != $this->DeptRecvUser->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_DeptRecived") && $CurrentForm->hasValue("o_DeptRecived") && $this->DeptRecived->CurrentValue != $this->DeptRecived->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_SAuthDate") && $CurrentForm->hasValue("o_SAuthDate") && $this->SAuthDate->CurrentValue != $this->SAuthDate->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_SAuthBy") && $CurrentForm->hasValue("o_SAuthBy") && $this->SAuthBy->CurrentValue != $this->SAuthBy->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_SAuthendicate") && $CurrentForm->hasValue("o_SAuthendicate") && $this->SAuthendicate->CurrentValue != $this->SAuthendicate->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_AuthDate") && $CurrentForm->hasValue("o_AuthDate") && $this->AuthDate->CurrentValue != $this->AuthDate->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_AuthBy") && $CurrentForm->hasValue("o_AuthBy") && $this->AuthBy->CurrentValue != $this->AuthBy->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_Authencate") && $CurrentForm->hasValue("o_Authencate") && $this->Authencate->CurrentValue != $this->Authencate->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_EditDate") && $CurrentForm->hasValue("o_EditDate") && $this->EditDate->CurrentValue != $this->EditDate->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_EditBy") && $CurrentForm->hasValue("o_EditBy") && $this->EditBy->CurrentValue != $this->EditBy->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_Editted") && $CurrentForm->hasValue("o_Editted") && $this->Editted->CurrentValue != $this->Editted->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_PatID") && $CurrentForm->hasValue("o_PatID") && $this->PatID->CurrentValue != $this->PatID->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_PatientId") && $CurrentForm->hasValue("o_PatientId") && $this->PatientId->CurrentValue != $this->PatientId->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_Mobile") && $CurrentForm->hasValue("o_Mobile") && $this->Mobile->CurrentValue != $this->Mobile->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_CId") && $CurrentForm->hasValue("o_CId") && $this->CId->CurrentValue != $this->CId->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_Order") && $CurrentForm->hasValue("o_Order") && $this->Order->CurrentValue != $this->Order->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_ResType") && $CurrentForm->hasValue("o_ResType") && $this->ResType->CurrentValue != $this->ResType->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_Sample") && $CurrentForm->hasValue("o_Sample") && $this->Sample->CurrentValue != $this->Sample->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_NoD") && $CurrentForm->hasValue("o_NoD") && $this->NoD->CurrentValue != $this->NoD->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_BillOrder") && $CurrentForm->hasValue("o_BillOrder") && $this->BillOrder->CurrentValue != $this->BillOrder->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_Inactive") && $CurrentForm->hasValue("o_Inactive") && $this->Inactive->CurrentValue != $this->Inactive->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_CollSample") && $CurrentForm->hasValue("o_CollSample") && $this->CollSample->CurrentValue != $this->CollSample->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_TestType") && $CurrentForm->hasValue("o_TestType") && $this->TestType->CurrentValue != $this->TestType->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_Repeated") && $CurrentForm->hasValue("o_Repeated") && $this->Repeated->CurrentValue != $this->Repeated->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_RepeatedBy") && $CurrentForm->hasValue("o_RepeatedBy") && $this->RepeatedBy->CurrentValue != $this->RepeatedBy->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_RepeatedDate") && $CurrentForm->hasValue("o_RepeatedDate") && $this->RepeatedDate->CurrentValue != $this->RepeatedDate->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_serviceID") && $CurrentForm->hasValue("o_serviceID") && $this->serviceID->CurrentValue != $this->serviceID->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_Service_Type") && $CurrentForm->hasValue("o_Service_Type") && $this->Service_Type->CurrentValue != $this->Service_Type->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_Service_Department") && $CurrentForm->hasValue("o_Service_Department") && $this->Service_Department->CurrentValue != $this->Service_Department->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_RequestNo") && $CurrentForm->hasValue("o_RequestNo") && $this->RequestNo->CurrentValue != $this->RequestNo->OldValue)
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
			$savedFilterList = $UserProfile->getSearchFilters(CurrentUserName(), "fpatient_serviceslistsrch");
		$filterList = Concat($filterList, $this->id->AdvancedSearch->toJson(), ","); // Field id
		$filterList = Concat($filterList, $this->Reception->AdvancedSearch->toJson(), ","); // Field Reception
		$filterList = Concat($filterList, $this->Services->AdvancedSearch->toJson(), ","); // Field Services
		$filterList = Concat($filterList, $this->amount->AdvancedSearch->toJson(), ","); // Field amount
		$filterList = Concat($filterList, $this->description->AdvancedSearch->toJson(), ","); // Field description
		$filterList = Concat($filterList, $this->patient_type->AdvancedSearch->toJson(), ","); // Field patient_type
		$filterList = Concat($filterList, $this->charged_date->AdvancedSearch->toJson(), ","); // Field charged_date
		$filterList = Concat($filterList, $this->status->AdvancedSearch->toJson(), ","); // Field status
		$filterList = Concat($filterList, $this->createdby->AdvancedSearch->toJson(), ","); // Field createdby
		$filterList = Concat($filterList, $this->createddatetime->AdvancedSearch->toJson(), ","); // Field createddatetime
		$filterList = Concat($filterList, $this->modifiedby->AdvancedSearch->toJson(), ","); // Field modifiedby
		$filterList = Concat($filterList, $this->modifieddatetime->AdvancedSearch->toJson(), ","); // Field modifieddatetime
		$filterList = Concat($filterList, $this->mrnno->AdvancedSearch->toJson(), ","); // Field mrnno
		$filterList = Concat($filterList, $this->PatientName->AdvancedSearch->toJson(), ","); // Field PatientName
		$filterList = Concat($filterList, $this->Age->AdvancedSearch->toJson(), ","); // Field Age
		$filterList = Concat($filterList, $this->Gender->AdvancedSearch->toJson(), ","); // Field Gender
		$filterList = Concat($filterList, $this->profilePic->AdvancedSearch->toJson(), ","); // Field profilePic
		$filterList = Concat($filterList, $this->Unit->AdvancedSearch->toJson(), ","); // Field Unit
		$filterList = Concat($filterList, $this->Quantity->AdvancedSearch->toJson(), ","); // Field Quantity
		$filterList = Concat($filterList, $this->Discount->AdvancedSearch->toJson(), ","); // Field Discount
		$filterList = Concat($filterList, $this->SubTotal->AdvancedSearch->toJson(), ","); // Field SubTotal
		$filterList = Concat($filterList, $this->ServiceSelect->AdvancedSearch->toJson(), ","); // Field ServiceSelect
		$filterList = Concat($filterList, $this->Aid->AdvancedSearch->toJson(), ","); // Field Aid
		$filterList = Concat($filterList, $this->Vid->AdvancedSearch->toJson(), ","); // Field Vid
		$filterList = Concat($filterList, $this->DrID->AdvancedSearch->toJson(), ","); // Field DrID
		$filterList = Concat($filterList, $this->DrCODE->AdvancedSearch->toJson(), ","); // Field DrCODE
		$filterList = Concat($filterList, $this->DrName->AdvancedSearch->toJson(), ","); // Field DrName
		$filterList = Concat($filterList, $this->Department->AdvancedSearch->toJson(), ","); // Field Department
		$filterList = Concat($filterList, $this->DrSharePres->AdvancedSearch->toJson(), ","); // Field DrSharePres
		$filterList = Concat($filterList, $this->HospSharePres->AdvancedSearch->toJson(), ","); // Field HospSharePres
		$filterList = Concat($filterList, $this->DrShareAmount->AdvancedSearch->toJson(), ","); // Field DrShareAmount
		$filterList = Concat($filterList, $this->HospShareAmount->AdvancedSearch->toJson(), ","); // Field HospShareAmount
		$filterList = Concat($filterList, $this->DrShareSettiledAmount->AdvancedSearch->toJson(), ","); // Field DrShareSettiledAmount
		$filterList = Concat($filterList, $this->DrShareSettledId->AdvancedSearch->toJson(), ","); // Field DrShareSettledId
		$filterList = Concat($filterList, $this->DrShareSettiledStatus->AdvancedSearch->toJson(), ","); // Field DrShareSettiledStatus
		$filterList = Concat($filterList, $this->invoiceId->AdvancedSearch->toJson(), ","); // Field invoiceId
		$filterList = Concat($filterList, $this->invoiceAmount->AdvancedSearch->toJson(), ","); // Field invoiceAmount
		$filterList = Concat($filterList, $this->invoiceStatus->AdvancedSearch->toJson(), ","); // Field invoiceStatus
		$filterList = Concat($filterList, $this->modeOfPayment->AdvancedSearch->toJson(), ","); // Field modeOfPayment
		$filterList = Concat($filterList, $this->HospID->AdvancedSearch->toJson(), ","); // Field HospID
		$filterList = Concat($filterList, $this->RIDNO->AdvancedSearch->toJson(), ","); // Field RIDNO
		$filterList = Concat($filterList, $this->TidNo->AdvancedSearch->toJson(), ","); // Field TidNo
		$filterList = Concat($filterList, $this->DiscountCategory->AdvancedSearch->toJson(), ","); // Field DiscountCategory
		$filterList = Concat($filterList, $this->sid->AdvancedSearch->toJson(), ","); // Field sid
		$filterList = Concat($filterList, $this->ItemCode->AdvancedSearch->toJson(), ","); // Field ItemCode
		$filterList = Concat($filterList, $this->TestSubCd->AdvancedSearch->toJson(), ","); // Field TestSubCd
		$filterList = Concat($filterList, $this->DEptCd->AdvancedSearch->toJson(), ","); // Field DEptCd
		$filterList = Concat($filterList, $this->ProfCd->AdvancedSearch->toJson(), ","); // Field ProfCd
		$filterList = Concat($filterList, $this->LabReport->AdvancedSearch->toJson(), ","); // Field LabReport
		$filterList = Concat($filterList, $this->Comments->AdvancedSearch->toJson(), ","); // Field Comments
		$filterList = Concat($filterList, $this->Method->AdvancedSearch->toJson(), ","); // Field Method
		$filterList = Concat($filterList, $this->Specimen->AdvancedSearch->toJson(), ","); // Field Specimen
		$filterList = Concat($filterList, $this->Abnormal->AdvancedSearch->toJson(), ","); // Field Abnormal
		$filterList = Concat($filterList, $this->RefValue->AdvancedSearch->toJson(), ","); // Field RefValue
		$filterList = Concat($filterList, $this->TestUnit->AdvancedSearch->toJson(), ","); // Field TestUnit
		$filterList = Concat($filterList, $this->LOWHIGH->AdvancedSearch->toJson(), ","); // Field LOWHIGH
		$filterList = Concat($filterList, $this->Branch->AdvancedSearch->toJson(), ","); // Field Branch
		$filterList = Concat($filterList, $this->Dispatch->AdvancedSearch->toJson(), ","); // Field Dispatch
		$filterList = Concat($filterList, $this->Pic1->AdvancedSearch->toJson(), ","); // Field Pic1
		$filterList = Concat($filterList, $this->Pic2->AdvancedSearch->toJson(), ","); // Field Pic2
		$filterList = Concat($filterList, $this->GraphPath->AdvancedSearch->toJson(), ","); // Field GraphPath
		$filterList = Concat($filterList, $this->MachineCD->AdvancedSearch->toJson(), ","); // Field MachineCD
		$filterList = Concat($filterList, $this->TestCancel->AdvancedSearch->toJson(), ","); // Field TestCancel
		$filterList = Concat($filterList, $this->OutSource->AdvancedSearch->toJson(), ","); // Field OutSource
		$filterList = Concat($filterList, $this->Printed->AdvancedSearch->toJson(), ","); // Field Printed
		$filterList = Concat($filterList, $this->PrintBy->AdvancedSearch->toJson(), ","); // Field PrintBy
		$filterList = Concat($filterList, $this->PrintDate->AdvancedSearch->toJson(), ","); // Field PrintDate
		$filterList = Concat($filterList, $this->BillingDate->AdvancedSearch->toJson(), ","); // Field BillingDate
		$filterList = Concat($filterList, $this->BilledBy->AdvancedSearch->toJson(), ","); // Field BilledBy
		$filterList = Concat($filterList, $this->Resulted->AdvancedSearch->toJson(), ","); // Field Resulted
		$filterList = Concat($filterList, $this->ResultDate->AdvancedSearch->toJson(), ","); // Field ResultDate
		$filterList = Concat($filterList, $this->ResultedBy->AdvancedSearch->toJson(), ","); // Field ResultedBy
		$filterList = Concat($filterList, $this->SampleDate->AdvancedSearch->toJson(), ","); // Field SampleDate
		$filterList = Concat($filterList, $this->SampleUser->AdvancedSearch->toJson(), ","); // Field SampleUser
		$filterList = Concat($filterList, $this->Sampled->AdvancedSearch->toJson(), ","); // Field Sampled
		$filterList = Concat($filterList, $this->ReceivedDate->AdvancedSearch->toJson(), ","); // Field ReceivedDate
		$filterList = Concat($filterList, $this->ReceivedUser->AdvancedSearch->toJson(), ","); // Field ReceivedUser
		$filterList = Concat($filterList, $this->Recevied->AdvancedSearch->toJson(), ","); // Field Recevied
		$filterList = Concat($filterList, $this->DeptRecvDate->AdvancedSearch->toJson(), ","); // Field DeptRecvDate
		$filterList = Concat($filterList, $this->DeptRecvUser->AdvancedSearch->toJson(), ","); // Field DeptRecvUser
		$filterList = Concat($filterList, $this->DeptRecived->AdvancedSearch->toJson(), ","); // Field DeptRecived
		$filterList = Concat($filterList, $this->SAuthDate->AdvancedSearch->toJson(), ","); // Field SAuthDate
		$filterList = Concat($filterList, $this->SAuthBy->AdvancedSearch->toJson(), ","); // Field SAuthBy
		$filterList = Concat($filterList, $this->SAuthendicate->AdvancedSearch->toJson(), ","); // Field SAuthendicate
		$filterList = Concat($filterList, $this->AuthDate->AdvancedSearch->toJson(), ","); // Field AuthDate
		$filterList = Concat($filterList, $this->AuthBy->AdvancedSearch->toJson(), ","); // Field AuthBy
		$filterList = Concat($filterList, $this->Authencate->AdvancedSearch->toJson(), ","); // Field Authencate
		$filterList = Concat($filterList, $this->EditDate->AdvancedSearch->toJson(), ","); // Field EditDate
		$filterList = Concat($filterList, $this->EditBy->AdvancedSearch->toJson(), ","); // Field EditBy
		$filterList = Concat($filterList, $this->Editted->AdvancedSearch->toJson(), ","); // Field Editted
		$filterList = Concat($filterList, $this->PatID->AdvancedSearch->toJson(), ","); // Field PatID
		$filterList = Concat($filterList, $this->PatientId->AdvancedSearch->toJson(), ","); // Field PatientId
		$filterList = Concat($filterList, $this->Mobile->AdvancedSearch->toJson(), ","); // Field Mobile
		$filterList = Concat($filterList, $this->CId->AdvancedSearch->toJson(), ","); // Field CId
		$filterList = Concat($filterList, $this->Order->AdvancedSearch->toJson(), ","); // Field Order
		$filterList = Concat($filterList, $this->Form->AdvancedSearch->toJson(), ","); // Field Form
		$filterList = Concat($filterList, $this->ResType->AdvancedSearch->toJson(), ","); // Field ResType
		$filterList = Concat($filterList, $this->Sample->AdvancedSearch->toJson(), ","); // Field Sample
		$filterList = Concat($filterList, $this->NoD->AdvancedSearch->toJson(), ","); // Field NoD
		$filterList = Concat($filterList, $this->BillOrder->AdvancedSearch->toJson(), ","); // Field BillOrder
		$filterList = Concat($filterList, $this->Formula->AdvancedSearch->toJson(), ","); // Field Formula
		$filterList = Concat($filterList, $this->Inactive->AdvancedSearch->toJson(), ","); // Field Inactive
		$filterList = Concat($filterList, $this->CollSample->AdvancedSearch->toJson(), ","); // Field CollSample
		$filterList = Concat($filterList, $this->TestType->AdvancedSearch->toJson(), ","); // Field TestType
		$filterList = Concat($filterList, $this->Repeated->AdvancedSearch->toJson(), ","); // Field Repeated
		$filterList = Concat($filterList, $this->RepeatedBy->AdvancedSearch->toJson(), ","); // Field RepeatedBy
		$filterList = Concat($filterList, $this->RepeatedDate->AdvancedSearch->toJson(), ","); // Field RepeatedDate
		$filterList = Concat($filterList, $this->serviceID->AdvancedSearch->toJson(), ","); // Field serviceID
		$filterList = Concat($filterList, $this->Service_Type->AdvancedSearch->toJson(), ","); // Field Service_Type
		$filterList = Concat($filterList, $this->Service_Department->AdvancedSearch->toJson(), ","); // Field Service_Department
		$filterList = Concat($filterList, $this->RequestNo->AdvancedSearch->toJson(), ","); // Field RequestNo
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
			$UserProfile->setSearchFilters(CurrentUserName(), "fpatient_serviceslistsrch", $filters);
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

		// Field Reception
		$this->Reception->AdvancedSearch->SearchValue = @$filter["x_Reception"];
		$this->Reception->AdvancedSearch->SearchOperator = @$filter["z_Reception"];
		$this->Reception->AdvancedSearch->SearchCondition = @$filter["v_Reception"];
		$this->Reception->AdvancedSearch->SearchValue2 = @$filter["y_Reception"];
		$this->Reception->AdvancedSearch->SearchOperator2 = @$filter["w_Reception"];
		$this->Reception->AdvancedSearch->save();

		// Field Services
		$this->Services->AdvancedSearch->SearchValue = @$filter["x_Services"];
		$this->Services->AdvancedSearch->SearchOperator = @$filter["z_Services"];
		$this->Services->AdvancedSearch->SearchCondition = @$filter["v_Services"];
		$this->Services->AdvancedSearch->SearchValue2 = @$filter["y_Services"];
		$this->Services->AdvancedSearch->SearchOperator2 = @$filter["w_Services"];
		$this->Services->AdvancedSearch->save();

		// Field amount
		$this->amount->AdvancedSearch->SearchValue = @$filter["x_amount"];
		$this->amount->AdvancedSearch->SearchOperator = @$filter["z_amount"];
		$this->amount->AdvancedSearch->SearchCondition = @$filter["v_amount"];
		$this->amount->AdvancedSearch->SearchValue2 = @$filter["y_amount"];
		$this->amount->AdvancedSearch->SearchOperator2 = @$filter["w_amount"];
		$this->amount->AdvancedSearch->save();

		// Field description
		$this->description->AdvancedSearch->SearchValue = @$filter["x_description"];
		$this->description->AdvancedSearch->SearchOperator = @$filter["z_description"];
		$this->description->AdvancedSearch->SearchCondition = @$filter["v_description"];
		$this->description->AdvancedSearch->SearchValue2 = @$filter["y_description"];
		$this->description->AdvancedSearch->SearchOperator2 = @$filter["w_description"];
		$this->description->AdvancedSearch->save();

		// Field patient_type
		$this->patient_type->AdvancedSearch->SearchValue = @$filter["x_patient_type"];
		$this->patient_type->AdvancedSearch->SearchOperator = @$filter["z_patient_type"];
		$this->patient_type->AdvancedSearch->SearchCondition = @$filter["v_patient_type"];
		$this->patient_type->AdvancedSearch->SearchValue2 = @$filter["y_patient_type"];
		$this->patient_type->AdvancedSearch->SearchOperator2 = @$filter["w_patient_type"];
		$this->patient_type->AdvancedSearch->save();

		// Field charged_date
		$this->charged_date->AdvancedSearch->SearchValue = @$filter["x_charged_date"];
		$this->charged_date->AdvancedSearch->SearchOperator = @$filter["z_charged_date"];
		$this->charged_date->AdvancedSearch->SearchCondition = @$filter["v_charged_date"];
		$this->charged_date->AdvancedSearch->SearchValue2 = @$filter["y_charged_date"];
		$this->charged_date->AdvancedSearch->SearchOperator2 = @$filter["w_charged_date"];
		$this->charged_date->AdvancedSearch->save();

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

		// Field profilePic
		$this->profilePic->AdvancedSearch->SearchValue = @$filter["x_profilePic"];
		$this->profilePic->AdvancedSearch->SearchOperator = @$filter["z_profilePic"];
		$this->profilePic->AdvancedSearch->SearchCondition = @$filter["v_profilePic"];
		$this->profilePic->AdvancedSearch->SearchValue2 = @$filter["y_profilePic"];
		$this->profilePic->AdvancedSearch->SearchOperator2 = @$filter["w_profilePic"];
		$this->profilePic->AdvancedSearch->save();

		// Field Unit
		$this->Unit->AdvancedSearch->SearchValue = @$filter["x_Unit"];
		$this->Unit->AdvancedSearch->SearchOperator = @$filter["z_Unit"];
		$this->Unit->AdvancedSearch->SearchCondition = @$filter["v_Unit"];
		$this->Unit->AdvancedSearch->SearchValue2 = @$filter["y_Unit"];
		$this->Unit->AdvancedSearch->SearchOperator2 = @$filter["w_Unit"];
		$this->Unit->AdvancedSearch->save();

		// Field Quantity
		$this->Quantity->AdvancedSearch->SearchValue = @$filter["x_Quantity"];
		$this->Quantity->AdvancedSearch->SearchOperator = @$filter["z_Quantity"];
		$this->Quantity->AdvancedSearch->SearchCondition = @$filter["v_Quantity"];
		$this->Quantity->AdvancedSearch->SearchValue2 = @$filter["y_Quantity"];
		$this->Quantity->AdvancedSearch->SearchOperator2 = @$filter["w_Quantity"];
		$this->Quantity->AdvancedSearch->save();

		// Field Discount
		$this->Discount->AdvancedSearch->SearchValue = @$filter["x_Discount"];
		$this->Discount->AdvancedSearch->SearchOperator = @$filter["z_Discount"];
		$this->Discount->AdvancedSearch->SearchCondition = @$filter["v_Discount"];
		$this->Discount->AdvancedSearch->SearchValue2 = @$filter["y_Discount"];
		$this->Discount->AdvancedSearch->SearchOperator2 = @$filter["w_Discount"];
		$this->Discount->AdvancedSearch->save();

		// Field SubTotal
		$this->SubTotal->AdvancedSearch->SearchValue = @$filter["x_SubTotal"];
		$this->SubTotal->AdvancedSearch->SearchOperator = @$filter["z_SubTotal"];
		$this->SubTotal->AdvancedSearch->SearchCondition = @$filter["v_SubTotal"];
		$this->SubTotal->AdvancedSearch->SearchValue2 = @$filter["y_SubTotal"];
		$this->SubTotal->AdvancedSearch->SearchOperator2 = @$filter["w_SubTotal"];
		$this->SubTotal->AdvancedSearch->save();

		// Field ServiceSelect
		$this->ServiceSelect->AdvancedSearch->SearchValue = @$filter["x_ServiceSelect"];
		$this->ServiceSelect->AdvancedSearch->SearchOperator = @$filter["z_ServiceSelect"];
		$this->ServiceSelect->AdvancedSearch->SearchCondition = @$filter["v_ServiceSelect"];
		$this->ServiceSelect->AdvancedSearch->SearchValue2 = @$filter["y_ServiceSelect"];
		$this->ServiceSelect->AdvancedSearch->SearchOperator2 = @$filter["w_ServiceSelect"];
		$this->ServiceSelect->AdvancedSearch->save();

		// Field Aid
		$this->Aid->AdvancedSearch->SearchValue = @$filter["x_Aid"];
		$this->Aid->AdvancedSearch->SearchOperator = @$filter["z_Aid"];
		$this->Aid->AdvancedSearch->SearchCondition = @$filter["v_Aid"];
		$this->Aid->AdvancedSearch->SearchValue2 = @$filter["y_Aid"];
		$this->Aid->AdvancedSearch->SearchOperator2 = @$filter["w_Aid"];
		$this->Aid->AdvancedSearch->save();

		// Field Vid
		$this->Vid->AdvancedSearch->SearchValue = @$filter["x_Vid"];
		$this->Vid->AdvancedSearch->SearchOperator = @$filter["z_Vid"];
		$this->Vid->AdvancedSearch->SearchCondition = @$filter["v_Vid"];
		$this->Vid->AdvancedSearch->SearchValue2 = @$filter["y_Vid"];
		$this->Vid->AdvancedSearch->SearchOperator2 = @$filter["w_Vid"];
		$this->Vid->AdvancedSearch->save();

		// Field DrID
		$this->DrID->AdvancedSearch->SearchValue = @$filter["x_DrID"];
		$this->DrID->AdvancedSearch->SearchOperator = @$filter["z_DrID"];
		$this->DrID->AdvancedSearch->SearchCondition = @$filter["v_DrID"];
		$this->DrID->AdvancedSearch->SearchValue2 = @$filter["y_DrID"];
		$this->DrID->AdvancedSearch->SearchOperator2 = @$filter["w_DrID"];
		$this->DrID->AdvancedSearch->save();

		// Field DrCODE
		$this->DrCODE->AdvancedSearch->SearchValue = @$filter["x_DrCODE"];
		$this->DrCODE->AdvancedSearch->SearchOperator = @$filter["z_DrCODE"];
		$this->DrCODE->AdvancedSearch->SearchCondition = @$filter["v_DrCODE"];
		$this->DrCODE->AdvancedSearch->SearchValue2 = @$filter["y_DrCODE"];
		$this->DrCODE->AdvancedSearch->SearchOperator2 = @$filter["w_DrCODE"];
		$this->DrCODE->AdvancedSearch->save();

		// Field DrName
		$this->DrName->AdvancedSearch->SearchValue = @$filter["x_DrName"];
		$this->DrName->AdvancedSearch->SearchOperator = @$filter["z_DrName"];
		$this->DrName->AdvancedSearch->SearchCondition = @$filter["v_DrName"];
		$this->DrName->AdvancedSearch->SearchValue2 = @$filter["y_DrName"];
		$this->DrName->AdvancedSearch->SearchOperator2 = @$filter["w_DrName"];
		$this->DrName->AdvancedSearch->save();

		// Field Department
		$this->Department->AdvancedSearch->SearchValue = @$filter["x_Department"];
		$this->Department->AdvancedSearch->SearchOperator = @$filter["z_Department"];
		$this->Department->AdvancedSearch->SearchCondition = @$filter["v_Department"];
		$this->Department->AdvancedSearch->SearchValue2 = @$filter["y_Department"];
		$this->Department->AdvancedSearch->SearchOperator2 = @$filter["w_Department"];
		$this->Department->AdvancedSearch->save();

		// Field DrSharePres
		$this->DrSharePres->AdvancedSearch->SearchValue = @$filter["x_DrSharePres"];
		$this->DrSharePres->AdvancedSearch->SearchOperator = @$filter["z_DrSharePres"];
		$this->DrSharePres->AdvancedSearch->SearchCondition = @$filter["v_DrSharePres"];
		$this->DrSharePres->AdvancedSearch->SearchValue2 = @$filter["y_DrSharePres"];
		$this->DrSharePres->AdvancedSearch->SearchOperator2 = @$filter["w_DrSharePres"];
		$this->DrSharePres->AdvancedSearch->save();

		// Field HospSharePres
		$this->HospSharePres->AdvancedSearch->SearchValue = @$filter["x_HospSharePres"];
		$this->HospSharePres->AdvancedSearch->SearchOperator = @$filter["z_HospSharePres"];
		$this->HospSharePres->AdvancedSearch->SearchCondition = @$filter["v_HospSharePres"];
		$this->HospSharePres->AdvancedSearch->SearchValue2 = @$filter["y_HospSharePres"];
		$this->HospSharePres->AdvancedSearch->SearchOperator2 = @$filter["w_HospSharePres"];
		$this->HospSharePres->AdvancedSearch->save();

		// Field DrShareAmount
		$this->DrShareAmount->AdvancedSearch->SearchValue = @$filter["x_DrShareAmount"];
		$this->DrShareAmount->AdvancedSearch->SearchOperator = @$filter["z_DrShareAmount"];
		$this->DrShareAmount->AdvancedSearch->SearchCondition = @$filter["v_DrShareAmount"];
		$this->DrShareAmount->AdvancedSearch->SearchValue2 = @$filter["y_DrShareAmount"];
		$this->DrShareAmount->AdvancedSearch->SearchOperator2 = @$filter["w_DrShareAmount"];
		$this->DrShareAmount->AdvancedSearch->save();

		// Field HospShareAmount
		$this->HospShareAmount->AdvancedSearch->SearchValue = @$filter["x_HospShareAmount"];
		$this->HospShareAmount->AdvancedSearch->SearchOperator = @$filter["z_HospShareAmount"];
		$this->HospShareAmount->AdvancedSearch->SearchCondition = @$filter["v_HospShareAmount"];
		$this->HospShareAmount->AdvancedSearch->SearchValue2 = @$filter["y_HospShareAmount"];
		$this->HospShareAmount->AdvancedSearch->SearchOperator2 = @$filter["w_HospShareAmount"];
		$this->HospShareAmount->AdvancedSearch->save();

		// Field DrShareSettiledAmount
		$this->DrShareSettiledAmount->AdvancedSearch->SearchValue = @$filter["x_DrShareSettiledAmount"];
		$this->DrShareSettiledAmount->AdvancedSearch->SearchOperator = @$filter["z_DrShareSettiledAmount"];
		$this->DrShareSettiledAmount->AdvancedSearch->SearchCondition = @$filter["v_DrShareSettiledAmount"];
		$this->DrShareSettiledAmount->AdvancedSearch->SearchValue2 = @$filter["y_DrShareSettiledAmount"];
		$this->DrShareSettiledAmount->AdvancedSearch->SearchOperator2 = @$filter["w_DrShareSettiledAmount"];
		$this->DrShareSettiledAmount->AdvancedSearch->save();

		// Field DrShareSettledId
		$this->DrShareSettledId->AdvancedSearch->SearchValue = @$filter["x_DrShareSettledId"];
		$this->DrShareSettledId->AdvancedSearch->SearchOperator = @$filter["z_DrShareSettledId"];
		$this->DrShareSettledId->AdvancedSearch->SearchCondition = @$filter["v_DrShareSettledId"];
		$this->DrShareSettledId->AdvancedSearch->SearchValue2 = @$filter["y_DrShareSettledId"];
		$this->DrShareSettledId->AdvancedSearch->SearchOperator2 = @$filter["w_DrShareSettledId"];
		$this->DrShareSettledId->AdvancedSearch->save();

		// Field DrShareSettiledStatus
		$this->DrShareSettiledStatus->AdvancedSearch->SearchValue = @$filter["x_DrShareSettiledStatus"];
		$this->DrShareSettiledStatus->AdvancedSearch->SearchOperator = @$filter["z_DrShareSettiledStatus"];
		$this->DrShareSettiledStatus->AdvancedSearch->SearchCondition = @$filter["v_DrShareSettiledStatus"];
		$this->DrShareSettiledStatus->AdvancedSearch->SearchValue2 = @$filter["y_DrShareSettiledStatus"];
		$this->DrShareSettiledStatus->AdvancedSearch->SearchOperator2 = @$filter["w_DrShareSettiledStatus"];
		$this->DrShareSettiledStatus->AdvancedSearch->save();

		// Field invoiceId
		$this->invoiceId->AdvancedSearch->SearchValue = @$filter["x_invoiceId"];
		$this->invoiceId->AdvancedSearch->SearchOperator = @$filter["z_invoiceId"];
		$this->invoiceId->AdvancedSearch->SearchCondition = @$filter["v_invoiceId"];
		$this->invoiceId->AdvancedSearch->SearchValue2 = @$filter["y_invoiceId"];
		$this->invoiceId->AdvancedSearch->SearchOperator2 = @$filter["w_invoiceId"];
		$this->invoiceId->AdvancedSearch->save();

		// Field invoiceAmount
		$this->invoiceAmount->AdvancedSearch->SearchValue = @$filter["x_invoiceAmount"];
		$this->invoiceAmount->AdvancedSearch->SearchOperator = @$filter["z_invoiceAmount"];
		$this->invoiceAmount->AdvancedSearch->SearchCondition = @$filter["v_invoiceAmount"];
		$this->invoiceAmount->AdvancedSearch->SearchValue2 = @$filter["y_invoiceAmount"];
		$this->invoiceAmount->AdvancedSearch->SearchOperator2 = @$filter["w_invoiceAmount"];
		$this->invoiceAmount->AdvancedSearch->save();

		// Field invoiceStatus
		$this->invoiceStatus->AdvancedSearch->SearchValue = @$filter["x_invoiceStatus"];
		$this->invoiceStatus->AdvancedSearch->SearchOperator = @$filter["z_invoiceStatus"];
		$this->invoiceStatus->AdvancedSearch->SearchCondition = @$filter["v_invoiceStatus"];
		$this->invoiceStatus->AdvancedSearch->SearchValue2 = @$filter["y_invoiceStatus"];
		$this->invoiceStatus->AdvancedSearch->SearchOperator2 = @$filter["w_invoiceStatus"];
		$this->invoiceStatus->AdvancedSearch->save();

		// Field modeOfPayment
		$this->modeOfPayment->AdvancedSearch->SearchValue = @$filter["x_modeOfPayment"];
		$this->modeOfPayment->AdvancedSearch->SearchOperator = @$filter["z_modeOfPayment"];
		$this->modeOfPayment->AdvancedSearch->SearchCondition = @$filter["v_modeOfPayment"];
		$this->modeOfPayment->AdvancedSearch->SearchValue2 = @$filter["y_modeOfPayment"];
		$this->modeOfPayment->AdvancedSearch->SearchOperator2 = @$filter["w_modeOfPayment"];
		$this->modeOfPayment->AdvancedSearch->save();

		// Field HospID
		$this->HospID->AdvancedSearch->SearchValue = @$filter["x_HospID"];
		$this->HospID->AdvancedSearch->SearchOperator = @$filter["z_HospID"];
		$this->HospID->AdvancedSearch->SearchCondition = @$filter["v_HospID"];
		$this->HospID->AdvancedSearch->SearchValue2 = @$filter["y_HospID"];
		$this->HospID->AdvancedSearch->SearchOperator2 = @$filter["w_HospID"];
		$this->HospID->AdvancedSearch->save();

		// Field RIDNO
		$this->RIDNO->AdvancedSearch->SearchValue = @$filter["x_RIDNO"];
		$this->RIDNO->AdvancedSearch->SearchOperator = @$filter["z_RIDNO"];
		$this->RIDNO->AdvancedSearch->SearchCondition = @$filter["v_RIDNO"];
		$this->RIDNO->AdvancedSearch->SearchValue2 = @$filter["y_RIDNO"];
		$this->RIDNO->AdvancedSearch->SearchOperator2 = @$filter["w_RIDNO"];
		$this->RIDNO->AdvancedSearch->save();

		// Field TidNo
		$this->TidNo->AdvancedSearch->SearchValue = @$filter["x_TidNo"];
		$this->TidNo->AdvancedSearch->SearchOperator = @$filter["z_TidNo"];
		$this->TidNo->AdvancedSearch->SearchCondition = @$filter["v_TidNo"];
		$this->TidNo->AdvancedSearch->SearchValue2 = @$filter["y_TidNo"];
		$this->TidNo->AdvancedSearch->SearchOperator2 = @$filter["w_TidNo"];
		$this->TidNo->AdvancedSearch->save();

		// Field DiscountCategory
		$this->DiscountCategory->AdvancedSearch->SearchValue = @$filter["x_DiscountCategory"];
		$this->DiscountCategory->AdvancedSearch->SearchOperator = @$filter["z_DiscountCategory"];
		$this->DiscountCategory->AdvancedSearch->SearchCondition = @$filter["v_DiscountCategory"];
		$this->DiscountCategory->AdvancedSearch->SearchValue2 = @$filter["y_DiscountCategory"];
		$this->DiscountCategory->AdvancedSearch->SearchOperator2 = @$filter["w_DiscountCategory"];
		$this->DiscountCategory->AdvancedSearch->save();

		// Field sid
		$this->sid->AdvancedSearch->SearchValue = @$filter["x_sid"];
		$this->sid->AdvancedSearch->SearchOperator = @$filter["z_sid"];
		$this->sid->AdvancedSearch->SearchCondition = @$filter["v_sid"];
		$this->sid->AdvancedSearch->SearchValue2 = @$filter["y_sid"];
		$this->sid->AdvancedSearch->SearchOperator2 = @$filter["w_sid"];
		$this->sid->AdvancedSearch->save();

		// Field ItemCode
		$this->ItemCode->AdvancedSearch->SearchValue = @$filter["x_ItemCode"];
		$this->ItemCode->AdvancedSearch->SearchOperator = @$filter["z_ItemCode"];
		$this->ItemCode->AdvancedSearch->SearchCondition = @$filter["v_ItemCode"];
		$this->ItemCode->AdvancedSearch->SearchValue2 = @$filter["y_ItemCode"];
		$this->ItemCode->AdvancedSearch->SearchOperator2 = @$filter["w_ItemCode"];
		$this->ItemCode->AdvancedSearch->save();

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

		// Field Abnormal
		$this->Abnormal->AdvancedSearch->SearchValue = @$filter["x_Abnormal"];
		$this->Abnormal->AdvancedSearch->SearchOperator = @$filter["z_Abnormal"];
		$this->Abnormal->AdvancedSearch->SearchCondition = @$filter["v_Abnormal"];
		$this->Abnormal->AdvancedSearch->SearchValue2 = @$filter["y_Abnormal"];
		$this->Abnormal->AdvancedSearch->SearchOperator2 = @$filter["w_Abnormal"];
		$this->Abnormal->AdvancedSearch->save();

		// Field RefValue
		$this->RefValue->AdvancedSearch->SearchValue = @$filter["x_RefValue"];
		$this->RefValue->AdvancedSearch->SearchOperator = @$filter["z_RefValue"];
		$this->RefValue->AdvancedSearch->SearchCondition = @$filter["v_RefValue"];
		$this->RefValue->AdvancedSearch->SearchValue2 = @$filter["y_RefValue"];
		$this->RefValue->AdvancedSearch->SearchOperator2 = @$filter["w_RefValue"];
		$this->RefValue->AdvancedSearch->save();

		// Field TestUnit
		$this->TestUnit->AdvancedSearch->SearchValue = @$filter["x_TestUnit"];
		$this->TestUnit->AdvancedSearch->SearchOperator = @$filter["z_TestUnit"];
		$this->TestUnit->AdvancedSearch->SearchCondition = @$filter["v_TestUnit"];
		$this->TestUnit->AdvancedSearch->SearchValue2 = @$filter["y_TestUnit"];
		$this->TestUnit->AdvancedSearch->SearchOperator2 = @$filter["w_TestUnit"];
		$this->TestUnit->AdvancedSearch->save();

		// Field LOWHIGH
		$this->LOWHIGH->AdvancedSearch->SearchValue = @$filter["x_LOWHIGH"];
		$this->LOWHIGH->AdvancedSearch->SearchOperator = @$filter["z_LOWHIGH"];
		$this->LOWHIGH->AdvancedSearch->SearchCondition = @$filter["v_LOWHIGH"];
		$this->LOWHIGH->AdvancedSearch->SearchValue2 = @$filter["y_LOWHIGH"];
		$this->LOWHIGH->AdvancedSearch->SearchOperator2 = @$filter["w_LOWHIGH"];
		$this->LOWHIGH->AdvancedSearch->save();

		// Field Branch
		$this->Branch->AdvancedSearch->SearchValue = @$filter["x_Branch"];
		$this->Branch->AdvancedSearch->SearchOperator = @$filter["z_Branch"];
		$this->Branch->AdvancedSearch->SearchCondition = @$filter["v_Branch"];
		$this->Branch->AdvancedSearch->SearchValue2 = @$filter["y_Branch"];
		$this->Branch->AdvancedSearch->SearchOperator2 = @$filter["w_Branch"];
		$this->Branch->AdvancedSearch->save();

		// Field Dispatch
		$this->Dispatch->AdvancedSearch->SearchValue = @$filter["x_Dispatch"];
		$this->Dispatch->AdvancedSearch->SearchOperator = @$filter["z_Dispatch"];
		$this->Dispatch->AdvancedSearch->SearchCondition = @$filter["v_Dispatch"];
		$this->Dispatch->AdvancedSearch->SearchValue2 = @$filter["y_Dispatch"];
		$this->Dispatch->AdvancedSearch->SearchOperator2 = @$filter["w_Dispatch"];
		$this->Dispatch->AdvancedSearch->save();

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

		// Field Printed
		$this->Printed->AdvancedSearch->SearchValue = @$filter["x_Printed"];
		$this->Printed->AdvancedSearch->SearchOperator = @$filter["z_Printed"];
		$this->Printed->AdvancedSearch->SearchCondition = @$filter["v_Printed"];
		$this->Printed->AdvancedSearch->SearchValue2 = @$filter["y_Printed"];
		$this->Printed->AdvancedSearch->SearchOperator2 = @$filter["w_Printed"];
		$this->Printed->AdvancedSearch->save();

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

		// Field BillingDate
		$this->BillingDate->AdvancedSearch->SearchValue = @$filter["x_BillingDate"];
		$this->BillingDate->AdvancedSearch->SearchOperator = @$filter["z_BillingDate"];
		$this->BillingDate->AdvancedSearch->SearchCondition = @$filter["v_BillingDate"];
		$this->BillingDate->AdvancedSearch->SearchValue2 = @$filter["y_BillingDate"];
		$this->BillingDate->AdvancedSearch->SearchOperator2 = @$filter["w_BillingDate"];
		$this->BillingDate->AdvancedSearch->save();

		// Field BilledBy
		$this->BilledBy->AdvancedSearch->SearchValue = @$filter["x_BilledBy"];
		$this->BilledBy->AdvancedSearch->SearchOperator = @$filter["z_BilledBy"];
		$this->BilledBy->AdvancedSearch->SearchCondition = @$filter["v_BilledBy"];
		$this->BilledBy->AdvancedSearch->SearchValue2 = @$filter["y_BilledBy"];
		$this->BilledBy->AdvancedSearch->SearchOperator2 = @$filter["w_BilledBy"];
		$this->BilledBy->AdvancedSearch->save();

		// Field Resulted
		$this->Resulted->AdvancedSearch->SearchValue = @$filter["x_Resulted"];
		$this->Resulted->AdvancedSearch->SearchOperator = @$filter["z_Resulted"];
		$this->Resulted->AdvancedSearch->SearchCondition = @$filter["v_Resulted"];
		$this->Resulted->AdvancedSearch->SearchValue2 = @$filter["y_Resulted"];
		$this->Resulted->AdvancedSearch->SearchOperator2 = @$filter["w_Resulted"];
		$this->Resulted->AdvancedSearch->save();

		// Field ResultDate
		$this->ResultDate->AdvancedSearch->SearchValue = @$filter["x_ResultDate"];
		$this->ResultDate->AdvancedSearch->SearchOperator = @$filter["z_ResultDate"];
		$this->ResultDate->AdvancedSearch->SearchCondition = @$filter["v_ResultDate"];
		$this->ResultDate->AdvancedSearch->SearchValue2 = @$filter["y_ResultDate"];
		$this->ResultDate->AdvancedSearch->SearchOperator2 = @$filter["w_ResultDate"];
		$this->ResultDate->AdvancedSearch->save();

		// Field ResultedBy
		$this->ResultedBy->AdvancedSearch->SearchValue = @$filter["x_ResultedBy"];
		$this->ResultedBy->AdvancedSearch->SearchOperator = @$filter["z_ResultedBy"];
		$this->ResultedBy->AdvancedSearch->SearchCondition = @$filter["v_ResultedBy"];
		$this->ResultedBy->AdvancedSearch->SearchValue2 = @$filter["y_ResultedBy"];
		$this->ResultedBy->AdvancedSearch->SearchOperator2 = @$filter["w_ResultedBy"];
		$this->ResultedBy->AdvancedSearch->save();

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

		// Field Sampled
		$this->Sampled->AdvancedSearch->SearchValue = @$filter["x_Sampled"];
		$this->Sampled->AdvancedSearch->SearchOperator = @$filter["z_Sampled"];
		$this->Sampled->AdvancedSearch->SearchCondition = @$filter["v_Sampled"];
		$this->Sampled->AdvancedSearch->SearchValue2 = @$filter["y_Sampled"];
		$this->Sampled->AdvancedSearch->SearchOperator2 = @$filter["w_Sampled"];
		$this->Sampled->AdvancedSearch->save();

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

		// Field Recevied
		$this->Recevied->AdvancedSearch->SearchValue = @$filter["x_Recevied"];
		$this->Recevied->AdvancedSearch->SearchOperator = @$filter["z_Recevied"];
		$this->Recevied->AdvancedSearch->SearchCondition = @$filter["v_Recevied"];
		$this->Recevied->AdvancedSearch->SearchValue2 = @$filter["y_Recevied"];
		$this->Recevied->AdvancedSearch->SearchOperator2 = @$filter["w_Recevied"];
		$this->Recevied->AdvancedSearch->save();

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

		// Field DeptRecived
		$this->DeptRecived->AdvancedSearch->SearchValue = @$filter["x_DeptRecived"];
		$this->DeptRecived->AdvancedSearch->SearchOperator = @$filter["z_DeptRecived"];
		$this->DeptRecived->AdvancedSearch->SearchCondition = @$filter["v_DeptRecived"];
		$this->DeptRecived->AdvancedSearch->SearchValue2 = @$filter["y_DeptRecived"];
		$this->DeptRecived->AdvancedSearch->SearchOperator2 = @$filter["w_DeptRecived"];
		$this->DeptRecived->AdvancedSearch->save();

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

		// Field SAuthendicate
		$this->SAuthendicate->AdvancedSearch->SearchValue = @$filter["x_SAuthendicate"];
		$this->SAuthendicate->AdvancedSearch->SearchOperator = @$filter["z_SAuthendicate"];
		$this->SAuthendicate->AdvancedSearch->SearchCondition = @$filter["v_SAuthendicate"];
		$this->SAuthendicate->AdvancedSearch->SearchValue2 = @$filter["y_SAuthendicate"];
		$this->SAuthendicate->AdvancedSearch->SearchOperator2 = @$filter["w_SAuthendicate"];
		$this->SAuthendicate->AdvancedSearch->save();

		// Field AuthDate
		$this->AuthDate->AdvancedSearch->SearchValue = @$filter["x_AuthDate"];
		$this->AuthDate->AdvancedSearch->SearchOperator = @$filter["z_AuthDate"];
		$this->AuthDate->AdvancedSearch->SearchCondition = @$filter["v_AuthDate"];
		$this->AuthDate->AdvancedSearch->SearchValue2 = @$filter["y_AuthDate"];
		$this->AuthDate->AdvancedSearch->SearchOperator2 = @$filter["w_AuthDate"];
		$this->AuthDate->AdvancedSearch->save();

		// Field AuthBy
		$this->AuthBy->AdvancedSearch->SearchValue = @$filter["x_AuthBy"];
		$this->AuthBy->AdvancedSearch->SearchOperator = @$filter["z_AuthBy"];
		$this->AuthBy->AdvancedSearch->SearchCondition = @$filter["v_AuthBy"];
		$this->AuthBy->AdvancedSearch->SearchValue2 = @$filter["y_AuthBy"];
		$this->AuthBy->AdvancedSearch->SearchOperator2 = @$filter["w_AuthBy"];
		$this->AuthBy->AdvancedSearch->save();

		// Field Authencate
		$this->Authencate->AdvancedSearch->SearchValue = @$filter["x_Authencate"];
		$this->Authencate->AdvancedSearch->SearchOperator = @$filter["z_Authencate"];
		$this->Authencate->AdvancedSearch->SearchCondition = @$filter["v_Authencate"];
		$this->Authencate->AdvancedSearch->SearchValue2 = @$filter["y_Authencate"];
		$this->Authencate->AdvancedSearch->SearchOperator2 = @$filter["w_Authencate"];
		$this->Authencate->AdvancedSearch->save();

		// Field EditDate
		$this->EditDate->AdvancedSearch->SearchValue = @$filter["x_EditDate"];
		$this->EditDate->AdvancedSearch->SearchOperator = @$filter["z_EditDate"];
		$this->EditDate->AdvancedSearch->SearchCondition = @$filter["v_EditDate"];
		$this->EditDate->AdvancedSearch->SearchValue2 = @$filter["y_EditDate"];
		$this->EditDate->AdvancedSearch->SearchOperator2 = @$filter["w_EditDate"];
		$this->EditDate->AdvancedSearch->save();

		// Field EditBy
		$this->EditBy->AdvancedSearch->SearchValue = @$filter["x_EditBy"];
		$this->EditBy->AdvancedSearch->SearchOperator = @$filter["z_EditBy"];
		$this->EditBy->AdvancedSearch->SearchCondition = @$filter["v_EditBy"];
		$this->EditBy->AdvancedSearch->SearchValue2 = @$filter["y_EditBy"];
		$this->EditBy->AdvancedSearch->SearchOperator2 = @$filter["w_EditBy"];
		$this->EditBy->AdvancedSearch->save();

		// Field Editted
		$this->Editted->AdvancedSearch->SearchValue = @$filter["x_Editted"];
		$this->Editted->AdvancedSearch->SearchOperator = @$filter["z_Editted"];
		$this->Editted->AdvancedSearch->SearchCondition = @$filter["v_Editted"];
		$this->Editted->AdvancedSearch->SearchValue2 = @$filter["y_Editted"];
		$this->Editted->AdvancedSearch->SearchOperator2 = @$filter["w_Editted"];
		$this->Editted->AdvancedSearch->save();

		// Field PatID
		$this->PatID->AdvancedSearch->SearchValue = @$filter["x_PatID"];
		$this->PatID->AdvancedSearch->SearchOperator = @$filter["z_PatID"];
		$this->PatID->AdvancedSearch->SearchCondition = @$filter["v_PatID"];
		$this->PatID->AdvancedSearch->SearchValue2 = @$filter["y_PatID"];
		$this->PatID->AdvancedSearch->SearchOperator2 = @$filter["w_PatID"];
		$this->PatID->AdvancedSearch->save();

		// Field PatientId
		$this->PatientId->AdvancedSearch->SearchValue = @$filter["x_PatientId"];
		$this->PatientId->AdvancedSearch->SearchOperator = @$filter["z_PatientId"];
		$this->PatientId->AdvancedSearch->SearchCondition = @$filter["v_PatientId"];
		$this->PatientId->AdvancedSearch->SearchValue2 = @$filter["y_PatientId"];
		$this->PatientId->AdvancedSearch->SearchOperator2 = @$filter["w_PatientId"];
		$this->PatientId->AdvancedSearch->save();

		// Field Mobile
		$this->Mobile->AdvancedSearch->SearchValue = @$filter["x_Mobile"];
		$this->Mobile->AdvancedSearch->SearchOperator = @$filter["z_Mobile"];
		$this->Mobile->AdvancedSearch->SearchCondition = @$filter["v_Mobile"];
		$this->Mobile->AdvancedSearch->SearchValue2 = @$filter["y_Mobile"];
		$this->Mobile->AdvancedSearch->SearchOperator2 = @$filter["w_Mobile"];
		$this->Mobile->AdvancedSearch->save();

		// Field CId
		$this->CId->AdvancedSearch->SearchValue = @$filter["x_CId"];
		$this->CId->AdvancedSearch->SearchOperator = @$filter["z_CId"];
		$this->CId->AdvancedSearch->SearchCondition = @$filter["v_CId"];
		$this->CId->AdvancedSearch->SearchValue2 = @$filter["y_CId"];
		$this->CId->AdvancedSearch->SearchOperator2 = @$filter["w_CId"];
		$this->CId->AdvancedSearch->save();

		// Field Order
		$this->Order->AdvancedSearch->SearchValue = @$filter["x_Order"];
		$this->Order->AdvancedSearch->SearchOperator = @$filter["z_Order"];
		$this->Order->AdvancedSearch->SearchCondition = @$filter["v_Order"];
		$this->Order->AdvancedSearch->SearchValue2 = @$filter["y_Order"];
		$this->Order->AdvancedSearch->SearchOperator2 = @$filter["w_Order"];
		$this->Order->AdvancedSearch->save();

		// Field Form
		$this->Form->AdvancedSearch->SearchValue = @$filter["x_Form"];
		$this->Form->AdvancedSearch->SearchOperator = @$filter["z_Form"];
		$this->Form->AdvancedSearch->SearchCondition = @$filter["v_Form"];
		$this->Form->AdvancedSearch->SearchValue2 = @$filter["y_Form"];
		$this->Form->AdvancedSearch->SearchOperator2 = @$filter["w_Form"];
		$this->Form->AdvancedSearch->save();

		// Field ResType
		$this->ResType->AdvancedSearch->SearchValue = @$filter["x_ResType"];
		$this->ResType->AdvancedSearch->SearchOperator = @$filter["z_ResType"];
		$this->ResType->AdvancedSearch->SearchCondition = @$filter["v_ResType"];
		$this->ResType->AdvancedSearch->SearchValue2 = @$filter["y_ResType"];
		$this->ResType->AdvancedSearch->SearchOperator2 = @$filter["w_ResType"];
		$this->ResType->AdvancedSearch->save();

		// Field Sample
		$this->Sample->AdvancedSearch->SearchValue = @$filter["x_Sample"];
		$this->Sample->AdvancedSearch->SearchOperator = @$filter["z_Sample"];
		$this->Sample->AdvancedSearch->SearchCondition = @$filter["v_Sample"];
		$this->Sample->AdvancedSearch->SearchValue2 = @$filter["y_Sample"];
		$this->Sample->AdvancedSearch->SearchOperator2 = @$filter["w_Sample"];
		$this->Sample->AdvancedSearch->save();

		// Field NoD
		$this->NoD->AdvancedSearch->SearchValue = @$filter["x_NoD"];
		$this->NoD->AdvancedSearch->SearchOperator = @$filter["z_NoD"];
		$this->NoD->AdvancedSearch->SearchCondition = @$filter["v_NoD"];
		$this->NoD->AdvancedSearch->SearchValue2 = @$filter["y_NoD"];
		$this->NoD->AdvancedSearch->SearchOperator2 = @$filter["w_NoD"];
		$this->NoD->AdvancedSearch->save();

		// Field BillOrder
		$this->BillOrder->AdvancedSearch->SearchValue = @$filter["x_BillOrder"];
		$this->BillOrder->AdvancedSearch->SearchOperator = @$filter["z_BillOrder"];
		$this->BillOrder->AdvancedSearch->SearchCondition = @$filter["v_BillOrder"];
		$this->BillOrder->AdvancedSearch->SearchValue2 = @$filter["y_BillOrder"];
		$this->BillOrder->AdvancedSearch->SearchOperator2 = @$filter["w_BillOrder"];
		$this->BillOrder->AdvancedSearch->save();

		// Field Formula
		$this->Formula->AdvancedSearch->SearchValue = @$filter["x_Formula"];
		$this->Formula->AdvancedSearch->SearchOperator = @$filter["z_Formula"];
		$this->Formula->AdvancedSearch->SearchCondition = @$filter["v_Formula"];
		$this->Formula->AdvancedSearch->SearchValue2 = @$filter["y_Formula"];
		$this->Formula->AdvancedSearch->SearchOperator2 = @$filter["w_Formula"];
		$this->Formula->AdvancedSearch->save();

		// Field Inactive
		$this->Inactive->AdvancedSearch->SearchValue = @$filter["x_Inactive"];
		$this->Inactive->AdvancedSearch->SearchOperator = @$filter["z_Inactive"];
		$this->Inactive->AdvancedSearch->SearchCondition = @$filter["v_Inactive"];
		$this->Inactive->AdvancedSearch->SearchValue2 = @$filter["y_Inactive"];
		$this->Inactive->AdvancedSearch->SearchOperator2 = @$filter["w_Inactive"];
		$this->Inactive->AdvancedSearch->save();

		// Field CollSample
		$this->CollSample->AdvancedSearch->SearchValue = @$filter["x_CollSample"];
		$this->CollSample->AdvancedSearch->SearchOperator = @$filter["z_CollSample"];
		$this->CollSample->AdvancedSearch->SearchCondition = @$filter["v_CollSample"];
		$this->CollSample->AdvancedSearch->SearchValue2 = @$filter["y_CollSample"];
		$this->CollSample->AdvancedSearch->SearchOperator2 = @$filter["w_CollSample"];
		$this->CollSample->AdvancedSearch->save();

		// Field TestType
		$this->TestType->AdvancedSearch->SearchValue = @$filter["x_TestType"];
		$this->TestType->AdvancedSearch->SearchOperator = @$filter["z_TestType"];
		$this->TestType->AdvancedSearch->SearchCondition = @$filter["v_TestType"];
		$this->TestType->AdvancedSearch->SearchValue2 = @$filter["y_TestType"];
		$this->TestType->AdvancedSearch->SearchOperator2 = @$filter["w_TestType"];
		$this->TestType->AdvancedSearch->save();

		// Field Repeated
		$this->Repeated->AdvancedSearch->SearchValue = @$filter["x_Repeated"];
		$this->Repeated->AdvancedSearch->SearchOperator = @$filter["z_Repeated"];
		$this->Repeated->AdvancedSearch->SearchCondition = @$filter["v_Repeated"];
		$this->Repeated->AdvancedSearch->SearchValue2 = @$filter["y_Repeated"];
		$this->Repeated->AdvancedSearch->SearchOperator2 = @$filter["w_Repeated"];
		$this->Repeated->AdvancedSearch->save();

		// Field RepeatedBy
		$this->RepeatedBy->AdvancedSearch->SearchValue = @$filter["x_RepeatedBy"];
		$this->RepeatedBy->AdvancedSearch->SearchOperator = @$filter["z_RepeatedBy"];
		$this->RepeatedBy->AdvancedSearch->SearchCondition = @$filter["v_RepeatedBy"];
		$this->RepeatedBy->AdvancedSearch->SearchValue2 = @$filter["y_RepeatedBy"];
		$this->RepeatedBy->AdvancedSearch->SearchOperator2 = @$filter["w_RepeatedBy"];
		$this->RepeatedBy->AdvancedSearch->save();

		// Field RepeatedDate
		$this->RepeatedDate->AdvancedSearch->SearchValue = @$filter["x_RepeatedDate"];
		$this->RepeatedDate->AdvancedSearch->SearchOperator = @$filter["z_RepeatedDate"];
		$this->RepeatedDate->AdvancedSearch->SearchCondition = @$filter["v_RepeatedDate"];
		$this->RepeatedDate->AdvancedSearch->SearchValue2 = @$filter["y_RepeatedDate"];
		$this->RepeatedDate->AdvancedSearch->SearchOperator2 = @$filter["w_RepeatedDate"];
		$this->RepeatedDate->AdvancedSearch->save();

		// Field serviceID
		$this->serviceID->AdvancedSearch->SearchValue = @$filter["x_serviceID"];
		$this->serviceID->AdvancedSearch->SearchOperator = @$filter["z_serviceID"];
		$this->serviceID->AdvancedSearch->SearchCondition = @$filter["v_serviceID"];
		$this->serviceID->AdvancedSearch->SearchValue2 = @$filter["y_serviceID"];
		$this->serviceID->AdvancedSearch->SearchOperator2 = @$filter["w_serviceID"];
		$this->serviceID->AdvancedSearch->save();

		// Field Service_Type
		$this->Service_Type->AdvancedSearch->SearchValue = @$filter["x_Service_Type"];
		$this->Service_Type->AdvancedSearch->SearchOperator = @$filter["z_Service_Type"];
		$this->Service_Type->AdvancedSearch->SearchCondition = @$filter["v_Service_Type"];
		$this->Service_Type->AdvancedSearch->SearchValue2 = @$filter["y_Service_Type"];
		$this->Service_Type->AdvancedSearch->SearchOperator2 = @$filter["w_Service_Type"];
		$this->Service_Type->AdvancedSearch->save();

		// Field Service_Department
		$this->Service_Department->AdvancedSearch->SearchValue = @$filter["x_Service_Department"];
		$this->Service_Department->AdvancedSearch->SearchOperator = @$filter["z_Service_Department"];
		$this->Service_Department->AdvancedSearch->SearchCondition = @$filter["v_Service_Department"];
		$this->Service_Department->AdvancedSearch->SearchValue2 = @$filter["y_Service_Department"];
		$this->Service_Department->AdvancedSearch->SearchOperator2 = @$filter["w_Service_Department"];
		$this->Service_Department->AdvancedSearch->save();

		// Field RequestNo
		$this->RequestNo->AdvancedSearch->SearchValue = @$filter["x_RequestNo"];
		$this->RequestNo->AdvancedSearch->SearchOperator = @$filter["z_RequestNo"];
		$this->RequestNo->AdvancedSearch->SearchCondition = @$filter["v_RequestNo"];
		$this->RequestNo->AdvancedSearch->SearchValue2 = @$filter["y_RequestNo"];
		$this->RequestNo->AdvancedSearch->SearchOperator2 = @$filter["w_RequestNo"];
		$this->RequestNo->AdvancedSearch->save();
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
		$this->buildSearchSql($where, $this->Reception, $default, FALSE); // Reception
		$this->buildSearchSql($where, $this->Services, $default, FALSE); // Services
		$this->buildSearchSql($where, $this->amount, $default, FALSE); // amount
		$this->buildSearchSql($where, $this->description, $default, FALSE); // description
		$this->buildSearchSql($where, $this->patient_type, $default, FALSE); // patient_type
		$this->buildSearchSql($where, $this->charged_date, $default, FALSE); // charged_date
		$this->buildSearchSql($where, $this->status, $default, FALSE); // status
		$this->buildSearchSql($where, $this->createdby, $default, FALSE); // createdby
		$this->buildSearchSql($where, $this->createddatetime, $default, FALSE); // createddatetime
		$this->buildSearchSql($where, $this->modifiedby, $default, FALSE); // modifiedby
		$this->buildSearchSql($where, $this->modifieddatetime, $default, FALSE); // modifieddatetime
		$this->buildSearchSql($where, $this->mrnno, $default, FALSE); // mrnno
		$this->buildSearchSql($where, $this->PatientName, $default, FALSE); // PatientName
		$this->buildSearchSql($where, $this->Age, $default, FALSE); // Age
		$this->buildSearchSql($where, $this->Gender, $default, FALSE); // Gender
		$this->buildSearchSql($where, $this->profilePic, $default, FALSE); // profilePic
		$this->buildSearchSql($where, $this->Unit, $default, FALSE); // Unit
		$this->buildSearchSql($where, $this->Quantity, $default, FALSE); // Quantity
		$this->buildSearchSql($where, $this->Discount, $default, FALSE); // Discount
		$this->buildSearchSql($where, $this->SubTotal, $default, FALSE); // SubTotal
		$this->buildSearchSql($where, $this->ServiceSelect, $default, TRUE); // ServiceSelect
		$this->buildSearchSql($where, $this->Aid, $default, FALSE); // Aid
		$this->buildSearchSql($where, $this->Vid, $default, FALSE); // Vid
		$this->buildSearchSql($where, $this->DrID, $default, FALSE); // DrID
		$this->buildSearchSql($where, $this->DrCODE, $default, FALSE); // DrCODE
		$this->buildSearchSql($where, $this->DrName, $default, FALSE); // DrName
		$this->buildSearchSql($where, $this->Department, $default, FALSE); // Department
		$this->buildSearchSql($where, $this->DrSharePres, $default, FALSE); // DrSharePres
		$this->buildSearchSql($where, $this->HospSharePres, $default, FALSE); // HospSharePres
		$this->buildSearchSql($where, $this->DrShareAmount, $default, FALSE); // DrShareAmount
		$this->buildSearchSql($where, $this->HospShareAmount, $default, FALSE); // HospShareAmount
		$this->buildSearchSql($where, $this->DrShareSettiledAmount, $default, FALSE); // DrShareSettiledAmount
		$this->buildSearchSql($where, $this->DrShareSettledId, $default, FALSE); // DrShareSettledId
		$this->buildSearchSql($where, $this->DrShareSettiledStatus, $default, FALSE); // DrShareSettiledStatus
		$this->buildSearchSql($where, $this->invoiceId, $default, FALSE); // invoiceId
		$this->buildSearchSql($where, $this->invoiceAmount, $default, FALSE); // invoiceAmount
		$this->buildSearchSql($where, $this->invoiceStatus, $default, FALSE); // invoiceStatus
		$this->buildSearchSql($where, $this->modeOfPayment, $default, FALSE); // modeOfPayment
		$this->buildSearchSql($where, $this->HospID, $default, FALSE); // HospID
		$this->buildSearchSql($where, $this->RIDNO, $default, FALSE); // RIDNO
		$this->buildSearchSql($where, $this->TidNo, $default, FALSE); // TidNo
		$this->buildSearchSql($where, $this->DiscountCategory, $default, FALSE); // DiscountCategory
		$this->buildSearchSql($where, $this->sid, $default, FALSE); // sid
		$this->buildSearchSql($where, $this->ItemCode, $default, FALSE); // ItemCode
		$this->buildSearchSql($where, $this->TestSubCd, $default, FALSE); // TestSubCd
		$this->buildSearchSql($where, $this->DEptCd, $default, FALSE); // DEptCd
		$this->buildSearchSql($where, $this->ProfCd, $default, FALSE); // ProfCd
		$this->buildSearchSql($where, $this->LabReport, $default, FALSE); // LabReport
		$this->buildSearchSql($where, $this->Comments, $default, FALSE); // Comments
		$this->buildSearchSql($where, $this->Method, $default, FALSE); // Method
		$this->buildSearchSql($where, $this->Specimen, $default, FALSE); // Specimen
		$this->buildSearchSql($where, $this->Abnormal, $default, FALSE); // Abnormal
		$this->buildSearchSql($where, $this->RefValue, $default, FALSE); // RefValue
		$this->buildSearchSql($where, $this->TestUnit, $default, FALSE); // TestUnit
		$this->buildSearchSql($where, $this->LOWHIGH, $default, FALSE); // LOWHIGH
		$this->buildSearchSql($where, $this->Branch, $default, FALSE); // Branch
		$this->buildSearchSql($where, $this->Dispatch, $default, FALSE); // Dispatch
		$this->buildSearchSql($where, $this->Pic1, $default, FALSE); // Pic1
		$this->buildSearchSql($where, $this->Pic2, $default, FALSE); // Pic2
		$this->buildSearchSql($where, $this->GraphPath, $default, FALSE); // GraphPath
		$this->buildSearchSql($where, $this->MachineCD, $default, FALSE); // MachineCD
		$this->buildSearchSql($where, $this->TestCancel, $default, FALSE); // TestCancel
		$this->buildSearchSql($where, $this->OutSource, $default, FALSE); // OutSource
		$this->buildSearchSql($where, $this->Printed, $default, FALSE); // Printed
		$this->buildSearchSql($where, $this->PrintBy, $default, FALSE); // PrintBy
		$this->buildSearchSql($where, $this->PrintDate, $default, FALSE); // PrintDate
		$this->buildSearchSql($where, $this->BillingDate, $default, FALSE); // BillingDate
		$this->buildSearchSql($where, $this->BilledBy, $default, FALSE); // BilledBy
		$this->buildSearchSql($where, $this->Resulted, $default, FALSE); // Resulted
		$this->buildSearchSql($where, $this->ResultDate, $default, FALSE); // ResultDate
		$this->buildSearchSql($where, $this->ResultedBy, $default, FALSE); // ResultedBy
		$this->buildSearchSql($where, $this->SampleDate, $default, FALSE); // SampleDate
		$this->buildSearchSql($where, $this->SampleUser, $default, FALSE); // SampleUser
		$this->buildSearchSql($where, $this->Sampled, $default, FALSE); // Sampled
		$this->buildSearchSql($where, $this->ReceivedDate, $default, FALSE); // ReceivedDate
		$this->buildSearchSql($where, $this->ReceivedUser, $default, FALSE); // ReceivedUser
		$this->buildSearchSql($where, $this->Recevied, $default, FALSE); // Recevied
		$this->buildSearchSql($where, $this->DeptRecvDate, $default, FALSE); // DeptRecvDate
		$this->buildSearchSql($where, $this->DeptRecvUser, $default, FALSE); // DeptRecvUser
		$this->buildSearchSql($where, $this->DeptRecived, $default, FALSE); // DeptRecived
		$this->buildSearchSql($where, $this->SAuthDate, $default, FALSE); // SAuthDate
		$this->buildSearchSql($where, $this->SAuthBy, $default, FALSE); // SAuthBy
		$this->buildSearchSql($where, $this->SAuthendicate, $default, FALSE); // SAuthendicate
		$this->buildSearchSql($where, $this->AuthDate, $default, FALSE); // AuthDate
		$this->buildSearchSql($where, $this->AuthBy, $default, FALSE); // AuthBy
		$this->buildSearchSql($where, $this->Authencate, $default, FALSE); // Authencate
		$this->buildSearchSql($where, $this->EditDate, $default, FALSE); // EditDate
		$this->buildSearchSql($where, $this->EditBy, $default, FALSE); // EditBy
		$this->buildSearchSql($where, $this->Editted, $default, FALSE); // Editted
		$this->buildSearchSql($where, $this->PatID, $default, FALSE); // PatID
		$this->buildSearchSql($where, $this->PatientId, $default, FALSE); // PatientId
		$this->buildSearchSql($where, $this->Mobile, $default, FALSE); // Mobile
		$this->buildSearchSql($where, $this->CId, $default, FALSE); // CId
		$this->buildSearchSql($where, $this->Order, $default, FALSE); // Order
		$this->buildSearchSql($where, $this->Form, $default, FALSE); // Form
		$this->buildSearchSql($where, $this->ResType, $default, FALSE); // ResType
		$this->buildSearchSql($where, $this->Sample, $default, FALSE); // Sample
		$this->buildSearchSql($where, $this->NoD, $default, FALSE); // NoD
		$this->buildSearchSql($where, $this->BillOrder, $default, FALSE); // BillOrder
		$this->buildSearchSql($where, $this->Formula, $default, FALSE); // Formula
		$this->buildSearchSql($where, $this->Inactive, $default, FALSE); // Inactive
		$this->buildSearchSql($where, $this->CollSample, $default, FALSE); // CollSample
		$this->buildSearchSql($where, $this->TestType, $default, FALSE); // TestType
		$this->buildSearchSql($where, $this->Repeated, $default, FALSE); // Repeated
		$this->buildSearchSql($where, $this->RepeatedBy, $default, FALSE); // RepeatedBy
		$this->buildSearchSql($where, $this->RepeatedDate, $default, FALSE); // RepeatedDate
		$this->buildSearchSql($where, $this->serviceID, $default, FALSE); // serviceID
		$this->buildSearchSql($where, $this->Service_Type, $default, FALSE); // Service_Type
		$this->buildSearchSql($where, $this->Service_Department, $default, FALSE); // Service_Department
		$this->buildSearchSql($where, $this->RequestNo, $default, FALSE); // RequestNo

		// Set up search parm
		if (!$default && $where != "" && in_array($this->Command, ["", "reset", "resetall"])) {
			$this->Command = "search";
		}
		if (!$default && $this->Command == "search") {
			$this->id->AdvancedSearch->save(); // id
			$this->Reception->AdvancedSearch->save(); // Reception
			$this->Services->AdvancedSearch->save(); // Services
			$this->amount->AdvancedSearch->save(); // amount
			$this->description->AdvancedSearch->save(); // description
			$this->patient_type->AdvancedSearch->save(); // patient_type
			$this->charged_date->AdvancedSearch->save(); // charged_date
			$this->status->AdvancedSearch->save(); // status
			$this->createdby->AdvancedSearch->save(); // createdby
			$this->createddatetime->AdvancedSearch->save(); // createddatetime
			$this->modifiedby->AdvancedSearch->save(); // modifiedby
			$this->modifieddatetime->AdvancedSearch->save(); // modifieddatetime
			$this->mrnno->AdvancedSearch->save(); // mrnno
			$this->PatientName->AdvancedSearch->save(); // PatientName
			$this->Age->AdvancedSearch->save(); // Age
			$this->Gender->AdvancedSearch->save(); // Gender
			$this->profilePic->AdvancedSearch->save(); // profilePic
			$this->Unit->AdvancedSearch->save(); // Unit
			$this->Quantity->AdvancedSearch->save(); // Quantity
			$this->Discount->AdvancedSearch->save(); // Discount
			$this->SubTotal->AdvancedSearch->save(); // SubTotal
			$this->ServiceSelect->AdvancedSearch->save(); // ServiceSelect
			$this->Aid->AdvancedSearch->save(); // Aid
			$this->Vid->AdvancedSearch->save(); // Vid
			$this->DrID->AdvancedSearch->save(); // DrID
			$this->DrCODE->AdvancedSearch->save(); // DrCODE
			$this->DrName->AdvancedSearch->save(); // DrName
			$this->Department->AdvancedSearch->save(); // Department
			$this->DrSharePres->AdvancedSearch->save(); // DrSharePres
			$this->HospSharePres->AdvancedSearch->save(); // HospSharePres
			$this->DrShareAmount->AdvancedSearch->save(); // DrShareAmount
			$this->HospShareAmount->AdvancedSearch->save(); // HospShareAmount
			$this->DrShareSettiledAmount->AdvancedSearch->save(); // DrShareSettiledAmount
			$this->DrShareSettledId->AdvancedSearch->save(); // DrShareSettledId
			$this->DrShareSettiledStatus->AdvancedSearch->save(); // DrShareSettiledStatus
			$this->invoiceId->AdvancedSearch->save(); // invoiceId
			$this->invoiceAmount->AdvancedSearch->save(); // invoiceAmount
			$this->invoiceStatus->AdvancedSearch->save(); // invoiceStatus
			$this->modeOfPayment->AdvancedSearch->save(); // modeOfPayment
			$this->HospID->AdvancedSearch->save(); // HospID
			$this->RIDNO->AdvancedSearch->save(); // RIDNO
			$this->TidNo->AdvancedSearch->save(); // TidNo
			$this->DiscountCategory->AdvancedSearch->save(); // DiscountCategory
			$this->sid->AdvancedSearch->save(); // sid
			$this->ItemCode->AdvancedSearch->save(); // ItemCode
			$this->TestSubCd->AdvancedSearch->save(); // TestSubCd
			$this->DEptCd->AdvancedSearch->save(); // DEptCd
			$this->ProfCd->AdvancedSearch->save(); // ProfCd
			$this->LabReport->AdvancedSearch->save(); // LabReport
			$this->Comments->AdvancedSearch->save(); // Comments
			$this->Method->AdvancedSearch->save(); // Method
			$this->Specimen->AdvancedSearch->save(); // Specimen
			$this->Abnormal->AdvancedSearch->save(); // Abnormal
			$this->RefValue->AdvancedSearch->save(); // RefValue
			$this->TestUnit->AdvancedSearch->save(); // TestUnit
			$this->LOWHIGH->AdvancedSearch->save(); // LOWHIGH
			$this->Branch->AdvancedSearch->save(); // Branch
			$this->Dispatch->AdvancedSearch->save(); // Dispatch
			$this->Pic1->AdvancedSearch->save(); // Pic1
			$this->Pic2->AdvancedSearch->save(); // Pic2
			$this->GraphPath->AdvancedSearch->save(); // GraphPath
			$this->MachineCD->AdvancedSearch->save(); // MachineCD
			$this->TestCancel->AdvancedSearch->save(); // TestCancel
			$this->OutSource->AdvancedSearch->save(); // OutSource
			$this->Printed->AdvancedSearch->save(); // Printed
			$this->PrintBy->AdvancedSearch->save(); // PrintBy
			$this->PrintDate->AdvancedSearch->save(); // PrintDate
			$this->BillingDate->AdvancedSearch->save(); // BillingDate
			$this->BilledBy->AdvancedSearch->save(); // BilledBy
			$this->Resulted->AdvancedSearch->save(); // Resulted
			$this->ResultDate->AdvancedSearch->save(); // ResultDate
			$this->ResultedBy->AdvancedSearch->save(); // ResultedBy
			$this->SampleDate->AdvancedSearch->save(); // SampleDate
			$this->SampleUser->AdvancedSearch->save(); // SampleUser
			$this->Sampled->AdvancedSearch->save(); // Sampled
			$this->ReceivedDate->AdvancedSearch->save(); // ReceivedDate
			$this->ReceivedUser->AdvancedSearch->save(); // ReceivedUser
			$this->Recevied->AdvancedSearch->save(); // Recevied
			$this->DeptRecvDate->AdvancedSearch->save(); // DeptRecvDate
			$this->DeptRecvUser->AdvancedSearch->save(); // DeptRecvUser
			$this->DeptRecived->AdvancedSearch->save(); // DeptRecived
			$this->SAuthDate->AdvancedSearch->save(); // SAuthDate
			$this->SAuthBy->AdvancedSearch->save(); // SAuthBy
			$this->SAuthendicate->AdvancedSearch->save(); // SAuthendicate
			$this->AuthDate->AdvancedSearch->save(); // AuthDate
			$this->AuthBy->AdvancedSearch->save(); // AuthBy
			$this->Authencate->AdvancedSearch->save(); // Authencate
			$this->EditDate->AdvancedSearch->save(); // EditDate
			$this->EditBy->AdvancedSearch->save(); // EditBy
			$this->Editted->AdvancedSearch->save(); // Editted
			$this->PatID->AdvancedSearch->save(); // PatID
			$this->PatientId->AdvancedSearch->save(); // PatientId
			$this->Mobile->AdvancedSearch->save(); // Mobile
			$this->CId->AdvancedSearch->save(); // CId
			$this->Order->AdvancedSearch->save(); // Order
			$this->Form->AdvancedSearch->save(); // Form
			$this->ResType->AdvancedSearch->save(); // ResType
			$this->Sample->AdvancedSearch->save(); // Sample
			$this->NoD->AdvancedSearch->save(); // NoD
			$this->BillOrder->AdvancedSearch->save(); // BillOrder
			$this->Formula->AdvancedSearch->save(); // Formula
			$this->Inactive->AdvancedSearch->save(); // Inactive
			$this->CollSample->AdvancedSearch->save(); // CollSample
			$this->TestType->AdvancedSearch->save(); // TestType
			$this->Repeated->AdvancedSearch->save(); // Repeated
			$this->RepeatedBy->AdvancedSearch->save(); // RepeatedBy
			$this->RepeatedDate->AdvancedSearch->save(); // RepeatedDate
			$this->serviceID->AdvancedSearch->save(); // serviceID
			$this->Service_Type->AdvancedSearch->save(); // Service_Type
			$this->Service_Department->AdvancedSearch->save(); // Service_Department
			$this->RequestNo->AdvancedSearch->save(); // RequestNo
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
		$this->buildBasicSearchSql($where, $this->Services, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->description, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->mrnno, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->PatientName, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Age, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Gender, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->profilePic, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->ServiceSelect, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->DrCODE, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->DrName, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Department, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->invoiceStatus, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->modeOfPayment, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->DiscountCategory, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->ItemCode, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->TestSubCd, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->DEptCd, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->ProfCd, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->LabReport, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Comments, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Method, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Specimen, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Abnormal, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->RefValue, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->TestUnit, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->LOWHIGH, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Branch, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Dispatch, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Pic1, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Pic2, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->GraphPath, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->MachineCD, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->TestCancel, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->OutSource, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Printed, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->PrintBy, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->BilledBy, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Resulted, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->ResultedBy, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->SampleUser, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Sampled, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->ReceivedUser, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Recevied, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->DeptRecvUser, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->DeptRecived, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->SAuthBy, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->SAuthendicate, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->AuthBy, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Authencate, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->EditBy, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Editted, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->PatientId, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Mobile, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Form, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->ResType, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Sample, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Formula, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Inactive, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->CollSample, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->TestType, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Repeated, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->RepeatedBy, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Service_Type, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Service_Department, $arKeywords, $type);
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
		if ($this->Reception->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->Services->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->amount->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->description->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->patient_type->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->charged_date->AdvancedSearch->issetSession())
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
		if ($this->mrnno->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->PatientName->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->Age->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->Gender->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->profilePic->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->Unit->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->Quantity->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->Discount->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->SubTotal->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->ServiceSelect->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->Aid->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->Vid->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->DrID->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->DrCODE->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->DrName->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->Department->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->DrSharePres->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->HospSharePres->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->DrShareAmount->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->HospShareAmount->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->DrShareSettiledAmount->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->DrShareSettledId->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->DrShareSettiledStatus->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->invoiceId->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->invoiceAmount->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->invoiceStatus->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->modeOfPayment->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->HospID->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->RIDNO->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->TidNo->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->DiscountCategory->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->sid->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->ItemCode->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->TestSubCd->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->DEptCd->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->ProfCd->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->LabReport->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->Comments->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->Method->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->Specimen->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->Abnormal->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->RefValue->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->TestUnit->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->LOWHIGH->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->Branch->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->Dispatch->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->Pic1->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->Pic2->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->GraphPath->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->MachineCD->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->TestCancel->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->OutSource->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->Printed->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->PrintBy->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->PrintDate->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->BillingDate->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->BilledBy->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->Resulted->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->ResultDate->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->ResultedBy->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->SampleDate->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->SampleUser->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->Sampled->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->ReceivedDate->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->ReceivedUser->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->Recevied->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->DeptRecvDate->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->DeptRecvUser->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->DeptRecived->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->SAuthDate->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->SAuthBy->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->SAuthendicate->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->AuthDate->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->AuthBy->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->Authencate->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->EditDate->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->EditBy->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->Editted->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->PatID->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->PatientId->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->Mobile->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->CId->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->Order->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->Form->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->ResType->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->Sample->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->NoD->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->BillOrder->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->Formula->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->Inactive->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->CollSample->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->TestType->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->Repeated->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->RepeatedBy->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->RepeatedDate->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->serviceID->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->Service_Type->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->Service_Department->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->RequestNo->AdvancedSearch->issetSession())
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
		$this->Reception->AdvancedSearch->unsetSession();
		$this->Services->AdvancedSearch->unsetSession();
		$this->amount->AdvancedSearch->unsetSession();
		$this->description->AdvancedSearch->unsetSession();
		$this->patient_type->AdvancedSearch->unsetSession();
		$this->charged_date->AdvancedSearch->unsetSession();
		$this->status->AdvancedSearch->unsetSession();
		$this->createdby->AdvancedSearch->unsetSession();
		$this->createddatetime->AdvancedSearch->unsetSession();
		$this->modifiedby->AdvancedSearch->unsetSession();
		$this->modifieddatetime->AdvancedSearch->unsetSession();
		$this->mrnno->AdvancedSearch->unsetSession();
		$this->PatientName->AdvancedSearch->unsetSession();
		$this->Age->AdvancedSearch->unsetSession();
		$this->Gender->AdvancedSearch->unsetSession();
		$this->profilePic->AdvancedSearch->unsetSession();
		$this->Unit->AdvancedSearch->unsetSession();
		$this->Quantity->AdvancedSearch->unsetSession();
		$this->Discount->AdvancedSearch->unsetSession();
		$this->SubTotal->AdvancedSearch->unsetSession();
		$this->ServiceSelect->AdvancedSearch->unsetSession();
		$this->Aid->AdvancedSearch->unsetSession();
		$this->Vid->AdvancedSearch->unsetSession();
		$this->DrID->AdvancedSearch->unsetSession();
		$this->DrCODE->AdvancedSearch->unsetSession();
		$this->DrName->AdvancedSearch->unsetSession();
		$this->Department->AdvancedSearch->unsetSession();
		$this->DrSharePres->AdvancedSearch->unsetSession();
		$this->HospSharePres->AdvancedSearch->unsetSession();
		$this->DrShareAmount->AdvancedSearch->unsetSession();
		$this->HospShareAmount->AdvancedSearch->unsetSession();
		$this->DrShareSettiledAmount->AdvancedSearch->unsetSession();
		$this->DrShareSettledId->AdvancedSearch->unsetSession();
		$this->DrShareSettiledStatus->AdvancedSearch->unsetSession();
		$this->invoiceId->AdvancedSearch->unsetSession();
		$this->invoiceAmount->AdvancedSearch->unsetSession();
		$this->invoiceStatus->AdvancedSearch->unsetSession();
		$this->modeOfPayment->AdvancedSearch->unsetSession();
		$this->HospID->AdvancedSearch->unsetSession();
		$this->RIDNO->AdvancedSearch->unsetSession();
		$this->TidNo->AdvancedSearch->unsetSession();
		$this->DiscountCategory->AdvancedSearch->unsetSession();
		$this->sid->AdvancedSearch->unsetSession();
		$this->ItemCode->AdvancedSearch->unsetSession();
		$this->TestSubCd->AdvancedSearch->unsetSession();
		$this->DEptCd->AdvancedSearch->unsetSession();
		$this->ProfCd->AdvancedSearch->unsetSession();
		$this->LabReport->AdvancedSearch->unsetSession();
		$this->Comments->AdvancedSearch->unsetSession();
		$this->Method->AdvancedSearch->unsetSession();
		$this->Specimen->AdvancedSearch->unsetSession();
		$this->Abnormal->AdvancedSearch->unsetSession();
		$this->RefValue->AdvancedSearch->unsetSession();
		$this->TestUnit->AdvancedSearch->unsetSession();
		$this->LOWHIGH->AdvancedSearch->unsetSession();
		$this->Branch->AdvancedSearch->unsetSession();
		$this->Dispatch->AdvancedSearch->unsetSession();
		$this->Pic1->AdvancedSearch->unsetSession();
		$this->Pic2->AdvancedSearch->unsetSession();
		$this->GraphPath->AdvancedSearch->unsetSession();
		$this->MachineCD->AdvancedSearch->unsetSession();
		$this->TestCancel->AdvancedSearch->unsetSession();
		$this->OutSource->AdvancedSearch->unsetSession();
		$this->Printed->AdvancedSearch->unsetSession();
		$this->PrintBy->AdvancedSearch->unsetSession();
		$this->PrintDate->AdvancedSearch->unsetSession();
		$this->BillingDate->AdvancedSearch->unsetSession();
		$this->BilledBy->AdvancedSearch->unsetSession();
		$this->Resulted->AdvancedSearch->unsetSession();
		$this->ResultDate->AdvancedSearch->unsetSession();
		$this->ResultedBy->AdvancedSearch->unsetSession();
		$this->SampleDate->AdvancedSearch->unsetSession();
		$this->SampleUser->AdvancedSearch->unsetSession();
		$this->Sampled->AdvancedSearch->unsetSession();
		$this->ReceivedDate->AdvancedSearch->unsetSession();
		$this->ReceivedUser->AdvancedSearch->unsetSession();
		$this->Recevied->AdvancedSearch->unsetSession();
		$this->DeptRecvDate->AdvancedSearch->unsetSession();
		$this->DeptRecvUser->AdvancedSearch->unsetSession();
		$this->DeptRecived->AdvancedSearch->unsetSession();
		$this->SAuthDate->AdvancedSearch->unsetSession();
		$this->SAuthBy->AdvancedSearch->unsetSession();
		$this->SAuthendicate->AdvancedSearch->unsetSession();
		$this->AuthDate->AdvancedSearch->unsetSession();
		$this->AuthBy->AdvancedSearch->unsetSession();
		$this->Authencate->AdvancedSearch->unsetSession();
		$this->EditDate->AdvancedSearch->unsetSession();
		$this->EditBy->AdvancedSearch->unsetSession();
		$this->Editted->AdvancedSearch->unsetSession();
		$this->PatID->AdvancedSearch->unsetSession();
		$this->PatientId->AdvancedSearch->unsetSession();
		$this->Mobile->AdvancedSearch->unsetSession();
		$this->CId->AdvancedSearch->unsetSession();
		$this->Order->AdvancedSearch->unsetSession();
		$this->Form->AdvancedSearch->unsetSession();
		$this->ResType->AdvancedSearch->unsetSession();
		$this->Sample->AdvancedSearch->unsetSession();
		$this->NoD->AdvancedSearch->unsetSession();
		$this->BillOrder->AdvancedSearch->unsetSession();
		$this->Formula->AdvancedSearch->unsetSession();
		$this->Inactive->AdvancedSearch->unsetSession();
		$this->CollSample->AdvancedSearch->unsetSession();
		$this->TestType->AdvancedSearch->unsetSession();
		$this->Repeated->AdvancedSearch->unsetSession();
		$this->RepeatedBy->AdvancedSearch->unsetSession();
		$this->RepeatedDate->AdvancedSearch->unsetSession();
		$this->serviceID->AdvancedSearch->unsetSession();
		$this->Service_Type->AdvancedSearch->unsetSession();
		$this->Service_Department->AdvancedSearch->unsetSession();
		$this->RequestNo->AdvancedSearch->unsetSession();
	}

	// Restore all search parameters
	protected function restoreSearchParms()
	{
		$this->RestoreSearch = TRUE;

		// Restore basic search values
		$this->BasicSearch->load();

		// Restore advanced search values
		$this->id->AdvancedSearch->load();
		$this->Reception->AdvancedSearch->load();
		$this->Services->AdvancedSearch->load();
		$this->amount->AdvancedSearch->load();
		$this->description->AdvancedSearch->load();
		$this->patient_type->AdvancedSearch->load();
		$this->charged_date->AdvancedSearch->load();
		$this->status->AdvancedSearch->load();
		$this->createdby->AdvancedSearch->load();
		$this->createddatetime->AdvancedSearch->load();
		$this->modifiedby->AdvancedSearch->load();
		$this->modifieddatetime->AdvancedSearch->load();
		$this->mrnno->AdvancedSearch->load();
		$this->PatientName->AdvancedSearch->load();
		$this->Age->AdvancedSearch->load();
		$this->Gender->AdvancedSearch->load();
		$this->profilePic->AdvancedSearch->load();
		$this->Unit->AdvancedSearch->load();
		$this->Quantity->AdvancedSearch->load();
		$this->Discount->AdvancedSearch->load();
		$this->SubTotal->AdvancedSearch->load();
		$this->ServiceSelect->AdvancedSearch->load();
		$this->Aid->AdvancedSearch->load();
		$this->Vid->AdvancedSearch->load();
		$this->DrID->AdvancedSearch->load();
		$this->DrCODE->AdvancedSearch->load();
		$this->DrName->AdvancedSearch->load();
		$this->Department->AdvancedSearch->load();
		$this->DrSharePres->AdvancedSearch->load();
		$this->HospSharePres->AdvancedSearch->load();
		$this->DrShareAmount->AdvancedSearch->load();
		$this->HospShareAmount->AdvancedSearch->load();
		$this->DrShareSettiledAmount->AdvancedSearch->load();
		$this->DrShareSettledId->AdvancedSearch->load();
		$this->DrShareSettiledStatus->AdvancedSearch->load();
		$this->invoiceId->AdvancedSearch->load();
		$this->invoiceAmount->AdvancedSearch->load();
		$this->invoiceStatus->AdvancedSearch->load();
		$this->modeOfPayment->AdvancedSearch->load();
		$this->HospID->AdvancedSearch->load();
		$this->RIDNO->AdvancedSearch->load();
		$this->TidNo->AdvancedSearch->load();
		$this->DiscountCategory->AdvancedSearch->load();
		$this->sid->AdvancedSearch->load();
		$this->ItemCode->AdvancedSearch->load();
		$this->TestSubCd->AdvancedSearch->load();
		$this->DEptCd->AdvancedSearch->load();
		$this->ProfCd->AdvancedSearch->load();
		$this->LabReport->AdvancedSearch->load();
		$this->Comments->AdvancedSearch->load();
		$this->Method->AdvancedSearch->load();
		$this->Specimen->AdvancedSearch->load();
		$this->Abnormal->AdvancedSearch->load();
		$this->RefValue->AdvancedSearch->load();
		$this->TestUnit->AdvancedSearch->load();
		$this->LOWHIGH->AdvancedSearch->load();
		$this->Branch->AdvancedSearch->load();
		$this->Dispatch->AdvancedSearch->load();
		$this->Pic1->AdvancedSearch->load();
		$this->Pic2->AdvancedSearch->load();
		$this->GraphPath->AdvancedSearch->load();
		$this->MachineCD->AdvancedSearch->load();
		$this->TestCancel->AdvancedSearch->load();
		$this->OutSource->AdvancedSearch->load();
		$this->Printed->AdvancedSearch->load();
		$this->PrintBy->AdvancedSearch->load();
		$this->PrintDate->AdvancedSearch->load();
		$this->BillingDate->AdvancedSearch->load();
		$this->BilledBy->AdvancedSearch->load();
		$this->Resulted->AdvancedSearch->load();
		$this->ResultDate->AdvancedSearch->load();
		$this->ResultedBy->AdvancedSearch->load();
		$this->SampleDate->AdvancedSearch->load();
		$this->SampleUser->AdvancedSearch->load();
		$this->Sampled->AdvancedSearch->load();
		$this->ReceivedDate->AdvancedSearch->load();
		$this->ReceivedUser->AdvancedSearch->load();
		$this->Recevied->AdvancedSearch->load();
		$this->DeptRecvDate->AdvancedSearch->load();
		$this->DeptRecvUser->AdvancedSearch->load();
		$this->DeptRecived->AdvancedSearch->load();
		$this->SAuthDate->AdvancedSearch->load();
		$this->SAuthBy->AdvancedSearch->load();
		$this->SAuthendicate->AdvancedSearch->load();
		$this->AuthDate->AdvancedSearch->load();
		$this->AuthBy->AdvancedSearch->load();
		$this->Authencate->AdvancedSearch->load();
		$this->EditDate->AdvancedSearch->load();
		$this->EditBy->AdvancedSearch->load();
		$this->Editted->AdvancedSearch->load();
		$this->PatID->AdvancedSearch->load();
		$this->PatientId->AdvancedSearch->load();
		$this->Mobile->AdvancedSearch->load();
		$this->CId->AdvancedSearch->load();
		$this->Order->AdvancedSearch->load();
		$this->Form->AdvancedSearch->load();
		$this->ResType->AdvancedSearch->load();
		$this->Sample->AdvancedSearch->load();
		$this->NoD->AdvancedSearch->load();
		$this->BillOrder->AdvancedSearch->load();
		$this->Formula->AdvancedSearch->load();
		$this->Inactive->AdvancedSearch->load();
		$this->CollSample->AdvancedSearch->load();
		$this->TestType->AdvancedSearch->load();
		$this->Repeated->AdvancedSearch->load();
		$this->RepeatedBy->AdvancedSearch->load();
		$this->RepeatedDate->AdvancedSearch->load();
		$this->serviceID->AdvancedSearch->load();
		$this->Service_Type->AdvancedSearch->load();
		$this->Service_Department->AdvancedSearch->load();
		$this->RequestNo->AdvancedSearch->load();
	}

	// Set up sort parameters
	protected function setupSortOrder()
	{

		// Check for "order" parameter
		if (Get("order") !== NULL) {
			$this->CurrentOrder = Get("order");
			$this->CurrentOrderType = Get("ordertype", "");
			$this->updateSort($this->id); // id
			$this->updateSort($this->Reception); // Reception
			$this->updateSort($this->Services); // Services
			$this->updateSort($this->amount); // amount
			$this->updateSort($this->description); // description
			$this->updateSort($this->patient_type); // patient_type
			$this->updateSort($this->charged_date); // charged_date
			$this->updateSort($this->status); // status
			$this->updateSort($this->mrnno); // mrnno
			$this->updateSort($this->PatientName); // PatientName
			$this->updateSort($this->Age); // Age
			$this->updateSort($this->Gender); // Gender
			$this->updateSort($this->Unit); // Unit
			$this->updateSort($this->Quantity); // Quantity
			$this->updateSort($this->Discount); // Discount
			$this->updateSort($this->SubTotal); // SubTotal
			$this->updateSort($this->ServiceSelect); // ServiceSelect
			$this->updateSort($this->Aid); // Aid
			$this->updateSort($this->Vid); // Vid
			$this->updateSort($this->DrID); // DrID
			$this->updateSort($this->DrCODE); // DrCODE
			$this->updateSort($this->DrName); // DrName
			$this->updateSort($this->Department); // Department
			$this->updateSort($this->DrSharePres); // DrSharePres
			$this->updateSort($this->HospSharePres); // HospSharePres
			$this->updateSort($this->DrShareAmount); // DrShareAmount
			$this->updateSort($this->HospShareAmount); // HospShareAmount
			$this->updateSort($this->DrShareSettiledAmount); // DrShareSettiledAmount
			$this->updateSort($this->DrShareSettledId); // DrShareSettledId
			$this->updateSort($this->DrShareSettiledStatus); // DrShareSettiledStatus
			$this->updateSort($this->invoiceId); // invoiceId
			$this->updateSort($this->invoiceAmount); // invoiceAmount
			$this->updateSort($this->invoiceStatus); // invoiceStatus
			$this->updateSort($this->modeOfPayment); // modeOfPayment
			$this->updateSort($this->HospID); // HospID
			$this->updateSort($this->RIDNO); // RIDNO
			$this->updateSort($this->TidNo); // TidNo
			$this->updateSort($this->DiscountCategory); // DiscountCategory
			$this->updateSort($this->sid); // sid
			$this->updateSort($this->ItemCode); // ItemCode
			$this->updateSort($this->TestSubCd); // TestSubCd
			$this->updateSort($this->DEptCd); // DEptCd
			$this->updateSort($this->ProfCd); // ProfCd
			$this->updateSort($this->Comments); // Comments
			$this->updateSort($this->Method); // Method
			$this->updateSort($this->Specimen); // Specimen
			$this->updateSort($this->Abnormal); // Abnormal
			$this->updateSort($this->TestUnit); // TestUnit
			$this->updateSort($this->LOWHIGH); // LOWHIGH
			$this->updateSort($this->Branch); // Branch
			$this->updateSort($this->Dispatch); // Dispatch
			$this->updateSort($this->Pic1); // Pic1
			$this->updateSort($this->Pic2); // Pic2
			$this->updateSort($this->GraphPath); // GraphPath
			$this->updateSort($this->MachineCD); // MachineCD
			$this->updateSort($this->TestCancel); // TestCancel
			$this->updateSort($this->OutSource); // OutSource
			$this->updateSort($this->Printed); // Printed
			$this->updateSort($this->PrintBy); // PrintBy
			$this->updateSort($this->PrintDate); // PrintDate
			$this->updateSort($this->BillingDate); // BillingDate
			$this->updateSort($this->BilledBy); // BilledBy
			$this->updateSort($this->Resulted); // Resulted
			$this->updateSort($this->ResultDate); // ResultDate
			$this->updateSort($this->ResultedBy); // ResultedBy
			$this->updateSort($this->SampleDate); // SampleDate
			$this->updateSort($this->SampleUser); // SampleUser
			$this->updateSort($this->Sampled); // Sampled
			$this->updateSort($this->ReceivedDate); // ReceivedDate
			$this->updateSort($this->ReceivedUser); // ReceivedUser
			$this->updateSort($this->Recevied); // Recevied
			$this->updateSort($this->DeptRecvDate); // DeptRecvDate
			$this->updateSort($this->DeptRecvUser); // DeptRecvUser
			$this->updateSort($this->DeptRecived); // DeptRecived
			$this->updateSort($this->SAuthDate); // SAuthDate
			$this->updateSort($this->SAuthBy); // SAuthBy
			$this->updateSort($this->SAuthendicate); // SAuthendicate
			$this->updateSort($this->AuthDate); // AuthDate
			$this->updateSort($this->AuthBy); // AuthBy
			$this->updateSort($this->Authencate); // Authencate
			$this->updateSort($this->EditDate); // EditDate
			$this->updateSort($this->EditBy); // EditBy
			$this->updateSort($this->Editted); // Editted
			$this->updateSort($this->PatID); // PatID
			$this->updateSort($this->PatientId); // PatientId
			$this->updateSort($this->Mobile); // Mobile
			$this->updateSort($this->CId); // CId
			$this->updateSort($this->Order); // Order
			$this->updateSort($this->ResType); // ResType
			$this->updateSort($this->Sample); // Sample
			$this->updateSort($this->NoD); // NoD
			$this->updateSort($this->BillOrder); // BillOrder
			$this->updateSort($this->Inactive); // Inactive
			$this->updateSort($this->CollSample); // CollSample
			$this->updateSort($this->TestType); // TestType
			$this->updateSort($this->Repeated); // Repeated
			$this->updateSort($this->RepeatedBy); // RepeatedBy
			$this->updateSort($this->RepeatedDate); // RepeatedDate
			$this->updateSort($this->serviceID); // serviceID
			$this->updateSort($this->Service_Type); // Service_Type
			$this->updateSort($this->Service_Department); // Service_Department
			$this->updateSort($this->RequestNo); // RequestNo
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
				$this->Vid->setSessionValue("");
				$this->Reception->setSessionValue("");
				$this->mrnno->setSessionValue("");
				$this->PatID->setSessionValue("");
			}

			// Reset sorting order
			if ($this->Command == "resetsort") {
				$orderBy = "";
				$this->setSessionOrderBy($orderBy);
				$this->setSessionOrderByList($orderBy);
				$this->id->setSort("");
				$this->Reception->setSort("");
				$this->Services->setSort("");
				$this->amount->setSort("");
				$this->description->setSort("");
				$this->patient_type->setSort("");
				$this->charged_date->setSort("");
				$this->status->setSort("");
				$this->mrnno->setSort("");
				$this->PatientName->setSort("");
				$this->Age->setSort("");
				$this->Gender->setSort("");
				$this->Unit->setSort("");
				$this->Quantity->setSort("");
				$this->Discount->setSort("");
				$this->SubTotal->setSort("");
				$this->ServiceSelect->setSort("");
				$this->Aid->setSort("");
				$this->Vid->setSort("");
				$this->DrID->setSort("");
				$this->DrCODE->setSort("");
				$this->DrName->setSort("");
				$this->Department->setSort("");
				$this->DrSharePres->setSort("");
				$this->HospSharePres->setSort("");
				$this->DrShareAmount->setSort("");
				$this->HospShareAmount->setSort("");
				$this->DrShareSettiledAmount->setSort("");
				$this->DrShareSettledId->setSort("");
				$this->DrShareSettiledStatus->setSort("");
				$this->invoiceId->setSort("");
				$this->invoiceAmount->setSort("");
				$this->invoiceStatus->setSort("");
				$this->modeOfPayment->setSort("");
				$this->HospID->setSort("");
				$this->RIDNO->setSort("");
				$this->TidNo->setSort("");
				$this->DiscountCategory->setSort("");
				$this->sid->setSort("");
				$this->ItemCode->setSort("");
				$this->TestSubCd->setSort("");
				$this->DEptCd->setSort("");
				$this->ProfCd->setSort("");
				$this->Comments->setSort("");
				$this->Method->setSort("");
				$this->Specimen->setSort("");
				$this->Abnormal->setSort("");
				$this->TestUnit->setSort("");
				$this->LOWHIGH->setSort("");
				$this->Branch->setSort("");
				$this->Dispatch->setSort("");
				$this->Pic1->setSort("");
				$this->Pic2->setSort("");
				$this->GraphPath->setSort("");
				$this->MachineCD->setSort("");
				$this->TestCancel->setSort("");
				$this->OutSource->setSort("");
				$this->Printed->setSort("");
				$this->PrintBy->setSort("");
				$this->PrintDate->setSort("");
				$this->BillingDate->setSort("");
				$this->BilledBy->setSort("");
				$this->Resulted->setSort("");
				$this->ResultDate->setSort("");
				$this->ResultedBy->setSort("");
				$this->SampleDate->setSort("");
				$this->SampleUser->setSort("");
				$this->Sampled->setSort("");
				$this->ReceivedDate->setSort("");
				$this->ReceivedUser->setSort("");
				$this->Recevied->setSort("");
				$this->DeptRecvDate->setSort("");
				$this->DeptRecvUser->setSort("");
				$this->DeptRecived->setSort("");
				$this->SAuthDate->setSort("");
				$this->SAuthBy->setSort("");
				$this->SAuthendicate->setSort("");
				$this->AuthDate->setSort("");
				$this->AuthBy->setSort("");
				$this->Authencate->setSort("");
				$this->EditDate->setSort("");
				$this->EditBy->setSort("");
				$this->Editted->setSort("");
				$this->PatID->setSort("");
				$this->PatientId->setSort("");
				$this->Mobile->setSort("");
				$this->CId->setSort("");
				$this->Order->setSort("");
				$this->ResType->setSort("");
				$this->Sample->setSort("");
				$this->NoD->setSort("");
				$this->BillOrder->setSort("");
				$this->Inactive->setSort("");
				$this->CollSample->setSort("");
				$this->TestType->setSort("");
				$this->Repeated->setSort("");
				$this->RepeatedBy->setSort("");
				$this->RepeatedDate->setSort("");
				$this->serviceID->setSort("");
				$this->Service_Type->setSort("");
				$this->Service_Department->setSort("");
				$this->RequestNo->setSort("");
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
				if (!$Security->canDelete() && is_numeric($this->RowIndex) && ($this->RowAction == "" || $this->RowAction == "edit")) { // Do not allow delete existing record
					$opt->Body = "&nbsp;";
				} else {
					$opt->Body = "<a class=\"ew-grid-link ew-grid-delete\" title=\"" . HtmlTitle($Language->phrase("DeleteLink")) . "\" data-caption=\"" . HtmlTitle($Language->phrase("DeleteLink")) . "\" onclick=\"return ew.deleteGridRow(this, " . $this->RowIndex . ");\">" . $Language->phrase("DeleteLink") . "</a>";
				}
			}
		}

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
		$option = $options["addedit"];

		// Add
		$item = &$option->add("add");
		$addcaption = HtmlTitle($Language->phrase("AddLink"));
		$item->Body = "<a class=\"ew-add-edit ew-add\" title=\"" . $addcaption . "\" data-caption=\"" . $addcaption . "\" href=\"" . HtmlEncode($this->AddUrl) . "\">" . $Language->phrase("AddLink") . "</a>";
		$item->Visible = $this->AddUrl != "" && $Security->canAdd();
		$item = &$option->add("gridadd");
		$item->Body = "<a class=\"ew-add-edit ew-grid-add\" title=\"" . HtmlTitle($Language->phrase("GridAddLink")) . "\" data-caption=\"" . HtmlTitle($Language->phrase("GridAddLink")) . "\" href=\"" . HtmlEncode($this->GridAddUrl) . "\">" . $Language->phrase("GridAddLink") . "</a>";
		$item->Visible = $this->GridAddUrl != "" && $Security->canAdd();

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
		$item->Body = "<a class=\"ew-save-filter\" data-form=\"fpatient_serviceslistsrch\" href=\"#\" onclick=\"return false;\">" . $Language->phrase("SaveCurrentFilter") . "</a>";
		$item->Visible = TRUE;
		$item = &$this->FilterOptions->add("deletefilter");
		$item->Body = "<a class=\"ew-delete-filter\" data-form=\"fpatient_serviceslistsrch\" href=\"#\" onclick=\"return false;\">" . $Language->phrase("DeleteFilter") . "</a>";
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
					$item->Body = "<a class=\"ew-action ew-list-action\" title=\"" . HtmlEncode($caption) . "\" data-caption=\"" . HtmlEncode($caption) . "\" href=\"#\" onclick=\"return ew.submitAction(event,jQuery.extend({f:document.fpatient_serviceslist}," . $listaction->toJson(TRUE) . "));\">" . $icon . "</a>";
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

			// Grid-Edit
			if ($this->isGridEdit()) {
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
		$this->Reception->CurrentValue = NULL;
		$this->Reception->OldValue = $this->Reception->CurrentValue;
		$this->Services->CurrentValue = NULL;
		$this->Services->OldValue = $this->Services->CurrentValue;
		$this->amount->CurrentValue = NULL;
		$this->amount->OldValue = $this->amount->CurrentValue;
		$this->description->CurrentValue = NULL;
		$this->description->OldValue = $this->description->CurrentValue;
		$this->patient_type->CurrentValue = NULL;
		$this->patient_type->OldValue = $this->patient_type->CurrentValue;
		$this->charged_date->CurrentValue = NULL;
		$this->charged_date->OldValue = $this->charged_date->CurrentValue;
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
		$this->mrnno->CurrentValue = NULL;
		$this->mrnno->OldValue = $this->mrnno->CurrentValue;
		$this->PatientName->CurrentValue = NULL;
		$this->PatientName->OldValue = $this->PatientName->CurrentValue;
		$this->Age->CurrentValue = NULL;
		$this->Age->OldValue = $this->Age->CurrentValue;
		$this->Gender->CurrentValue = NULL;
		$this->Gender->OldValue = $this->Gender->CurrentValue;
		$this->profilePic->CurrentValue = NULL;
		$this->profilePic->OldValue = $this->profilePic->CurrentValue;
		$this->Unit->CurrentValue = NULL;
		$this->Unit->OldValue = $this->Unit->CurrentValue;
		$this->Quantity->CurrentValue = NULL;
		$this->Quantity->OldValue = $this->Quantity->CurrentValue;
		$this->Discount->CurrentValue = NULL;
		$this->Discount->OldValue = $this->Discount->CurrentValue;
		$this->SubTotal->CurrentValue = NULL;
		$this->SubTotal->OldValue = $this->SubTotal->CurrentValue;
		$this->ServiceSelect->CurrentValue = NULL;
		$this->ServiceSelect->OldValue = $this->ServiceSelect->CurrentValue;
		$this->Aid->CurrentValue = NULL;
		$this->Aid->OldValue = $this->Aid->CurrentValue;
		$this->Vid->CurrentValue = NULL;
		$this->Vid->OldValue = $this->Vid->CurrentValue;
		$this->DrID->CurrentValue = NULL;
		$this->DrID->OldValue = $this->DrID->CurrentValue;
		$this->DrCODE->CurrentValue = NULL;
		$this->DrCODE->OldValue = $this->DrCODE->CurrentValue;
		$this->DrName->CurrentValue = NULL;
		$this->DrName->OldValue = $this->DrName->CurrentValue;
		$this->Department->CurrentValue = NULL;
		$this->Department->OldValue = $this->Department->CurrentValue;
		$this->DrSharePres->CurrentValue = NULL;
		$this->DrSharePres->OldValue = $this->DrSharePres->CurrentValue;
		$this->HospSharePres->CurrentValue = NULL;
		$this->HospSharePres->OldValue = $this->HospSharePres->CurrentValue;
		$this->DrShareAmount->CurrentValue = NULL;
		$this->DrShareAmount->OldValue = $this->DrShareAmount->CurrentValue;
		$this->HospShareAmount->CurrentValue = NULL;
		$this->HospShareAmount->OldValue = $this->HospShareAmount->CurrentValue;
		$this->DrShareSettiledAmount->CurrentValue = NULL;
		$this->DrShareSettiledAmount->OldValue = $this->DrShareSettiledAmount->CurrentValue;
		$this->DrShareSettledId->CurrentValue = NULL;
		$this->DrShareSettledId->OldValue = $this->DrShareSettledId->CurrentValue;
		$this->DrShareSettiledStatus->CurrentValue = NULL;
		$this->DrShareSettiledStatus->OldValue = $this->DrShareSettiledStatus->CurrentValue;
		$this->invoiceId->CurrentValue = NULL;
		$this->invoiceId->OldValue = $this->invoiceId->CurrentValue;
		$this->invoiceAmount->CurrentValue = NULL;
		$this->invoiceAmount->OldValue = $this->invoiceAmount->CurrentValue;
		$this->invoiceStatus->CurrentValue = NULL;
		$this->invoiceStatus->OldValue = $this->invoiceStatus->CurrentValue;
		$this->modeOfPayment->CurrentValue = NULL;
		$this->modeOfPayment->OldValue = $this->modeOfPayment->CurrentValue;
		$this->HospID->CurrentValue = NULL;
		$this->HospID->OldValue = $this->HospID->CurrentValue;
		$this->RIDNO->CurrentValue = NULL;
		$this->RIDNO->OldValue = $this->RIDNO->CurrentValue;
		$this->TidNo->CurrentValue = NULL;
		$this->TidNo->OldValue = $this->TidNo->CurrentValue;
		$this->DiscountCategory->CurrentValue = NULL;
		$this->DiscountCategory->OldValue = $this->DiscountCategory->CurrentValue;
		$this->sid->CurrentValue = NULL;
		$this->sid->OldValue = $this->sid->CurrentValue;
		$this->ItemCode->CurrentValue = NULL;
		$this->ItemCode->OldValue = $this->ItemCode->CurrentValue;
		$this->TestSubCd->CurrentValue = NULL;
		$this->TestSubCd->OldValue = $this->TestSubCd->CurrentValue;
		$this->DEptCd->CurrentValue = NULL;
		$this->DEptCd->OldValue = $this->DEptCd->CurrentValue;
		$this->ProfCd->CurrentValue = NULL;
		$this->ProfCd->OldValue = $this->ProfCd->CurrentValue;
		$this->LabReport->CurrentValue = NULL;
		$this->LabReport->OldValue = $this->LabReport->CurrentValue;
		$this->Comments->CurrentValue = NULL;
		$this->Comments->OldValue = $this->Comments->CurrentValue;
		$this->Method->CurrentValue = NULL;
		$this->Method->OldValue = $this->Method->CurrentValue;
		$this->Specimen->CurrentValue = NULL;
		$this->Specimen->OldValue = $this->Specimen->CurrentValue;
		$this->Abnormal->CurrentValue = NULL;
		$this->Abnormal->OldValue = $this->Abnormal->CurrentValue;
		$this->RefValue->CurrentValue = NULL;
		$this->RefValue->OldValue = $this->RefValue->CurrentValue;
		$this->TestUnit->CurrentValue = NULL;
		$this->TestUnit->OldValue = $this->TestUnit->CurrentValue;
		$this->LOWHIGH->CurrentValue = NULL;
		$this->LOWHIGH->OldValue = $this->LOWHIGH->CurrentValue;
		$this->Branch->CurrentValue = NULL;
		$this->Branch->OldValue = $this->Branch->CurrentValue;
		$this->Dispatch->CurrentValue = NULL;
		$this->Dispatch->OldValue = $this->Dispatch->CurrentValue;
		$this->Pic1->CurrentValue = NULL;
		$this->Pic1->OldValue = $this->Pic1->CurrentValue;
		$this->Pic2->CurrentValue = NULL;
		$this->Pic2->OldValue = $this->Pic2->CurrentValue;
		$this->GraphPath->CurrentValue = NULL;
		$this->GraphPath->OldValue = $this->GraphPath->CurrentValue;
		$this->MachineCD->CurrentValue = NULL;
		$this->MachineCD->OldValue = $this->MachineCD->CurrentValue;
		$this->TestCancel->CurrentValue = NULL;
		$this->TestCancel->OldValue = $this->TestCancel->CurrentValue;
		$this->OutSource->CurrentValue = NULL;
		$this->OutSource->OldValue = $this->OutSource->CurrentValue;
		$this->Printed->CurrentValue = NULL;
		$this->Printed->OldValue = $this->Printed->CurrentValue;
		$this->PrintBy->CurrentValue = NULL;
		$this->PrintBy->OldValue = $this->PrintBy->CurrentValue;
		$this->PrintDate->CurrentValue = NULL;
		$this->PrintDate->OldValue = $this->PrintDate->CurrentValue;
		$this->BillingDate->CurrentValue = NULL;
		$this->BillingDate->OldValue = $this->BillingDate->CurrentValue;
		$this->BilledBy->CurrentValue = NULL;
		$this->BilledBy->OldValue = $this->BilledBy->CurrentValue;
		$this->Resulted->CurrentValue = NULL;
		$this->Resulted->OldValue = $this->Resulted->CurrentValue;
		$this->ResultDate->CurrentValue = NULL;
		$this->ResultDate->OldValue = $this->ResultDate->CurrentValue;
		$this->ResultedBy->CurrentValue = NULL;
		$this->ResultedBy->OldValue = $this->ResultedBy->CurrentValue;
		$this->SampleDate->CurrentValue = NULL;
		$this->SampleDate->OldValue = $this->SampleDate->CurrentValue;
		$this->SampleUser->CurrentValue = NULL;
		$this->SampleUser->OldValue = $this->SampleUser->CurrentValue;
		$this->Sampled->CurrentValue = NULL;
		$this->Sampled->OldValue = $this->Sampled->CurrentValue;
		$this->ReceivedDate->CurrentValue = NULL;
		$this->ReceivedDate->OldValue = $this->ReceivedDate->CurrentValue;
		$this->ReceivedUser->CurrentValue = NULL;
		$this->ReceivedUser->OldValue = $this->ReceivedUser->CurrentValue;
		$this->Recevied->CurrentValue = NULL;
		$this->Recevied->OldValue = $this->Recevied->CurrentValue;
		$this->DeptRecvDate->CurrentValue = NULL;
		$this->DeptRecvDate->OldValue = $this->DeptRecvDate->CurrentValue;
		$this->DeptRecvUser->CurrentValue = NULL;
		$this->DeptRecvUser->OldValue = $this->DeptRecvUser->CurrentValue;
		$this->DeptRecived->CurrentValue = NULL;
		$this->DeptRecived->OldValue = $this->DeptRecived->CurrentValue;
		$this->SAuthDate->CurrentValue = NULL;
		$this->SAuthDate->OldValue = $this->SAuthDate->CurrentValue;
		$this->SAuthBy->CurrentValue = NULL;
		$this->SAuthBy->OldValue = $this->SAuthBy->CurrentValue;
		$this->SAuthendicate->CurrentValue = NULL;
		$this->SAuthendicate->OldValue = $this->SAuthendicate->CurrentValue;
		$this->AuthDate->CurrentValue = NULL;
		$this->AuthDate->OldValue = $this->AuthDate->CurrentValue;
		$this->AuthBy->CurrentValue = NULL;
		$this->AuthBy->OldValue = $this->AuthBy->CurrentValue;
		$this->Authencate->CurrentValue = NULL;
		$this->Authencate->OldValue = $this->Authencate->CurrentValue;
		$this->EditDate->CurrentValue = NULL;
		$this->EditDate->OldValue = $this->EditDate->CurrentValue;
		$this->EditBy->CurrentValue = NULL;
		$this->EditBy->OldValue = $this->EditBy->CurrentValue;
		$this->Editted->CurrentValue = NULL;
		$this->Editted->OldValue = $this->Editted->CurrentValue;
		$this->PatID->CurrentValue = NULL;
		$this->PatID->OldValue = $this->PatID->CurrentValue;
		$this->PatientId->CurrentValue = NULL;
		$this->PatientId->OldValue = $this->PatientId->CurrentValue;
		$this->Mobile->CurrentValue = NULL;
		$this->Mobile->OldValue = $this->Mobile->CurrentValue;
		$this->CId->CurrentValue = NULL;
		$this->CId->OldValue = $this->CId->CurrentValue;
		$this->Order->CurrentValue = NULL;
		$this->Order->OldValue = $this->Order->CurrentValue;
		$this->Form->CurrentValue = NULL;
		$this->Form->OldValue = $this->Form->CurrentValue;
		$this->ResType->CurrentValue = NULL;
		$this->ResType->OldValue = $this->ResType->CurrentValue;
		$this->Sample->CurrentValue = NULL;
		$this->Sample->OldValue = $this->Sample->CurrentValue;
		$this->NoD->CurrentValue = NULL;
		$this->NoD->OldValue = $this->NoD->CurrentValue;
		$this->BillOrder->CurrentValue = NULL;
		$this->BillOrder->OldValue = $this->BillOrder->CurrentValue;
		$this->Formula->CurrentValue = NULL;
		$this->Formula->OldValue = $this->Formula->CurrentValue;
		$this->Inactive->CurrentValue = NULL;
		$this->Inactive->OldValue = $this->Inactive->CurrentValue;
		$this->CollSample->CurrentValue = NULL;
		$this->CollSample->OldValue = $this->CollSample->CurrentValue;
		$this->TestType->CurrentValue = NULL;
		$this->TestType->OldValue = $this->TestType->CurrentValue;
		$this->Repeated->CurrentValue = NULL;
		$this->Repeated->OldValue = $this->Repeated->CurrentValue;
		$this->RepeatedBy->CurrentValue = NULL;
		$this->RepeatedBy->OldValue = $this->RepeatedBy->CurrentValue;
		$this->RepeatedDate->CurrentValue = NULL;
		$this->RepeatedDate->OldValue = $this->RepeatedDate->CurrentValue;
		$this->serviceID->CurrentValue = NULL;
		$this->serviceID->OldValue = $this->serviceID->CurrentValue;
		$this->Service_Type->CurrentValue = NULL;
		$this->Service_Type->OldValue = $this->Service_Type->CurrentValue;
		$this->Service_Department->CurrentValue = NULL;
		$this->Service_Department->OldValue = $this->Service_Department->CurrentValue;
		$this->RequestNo->CurrentValue = 0;
		$this->RequestNo->OldValue = $this->RequestNo->CurrentValue;
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

		// Reception
		if (!$this->isAddOrEdit() && $this->Reception->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->Reception->AdvancedSearch->SearchValue != "" || $this->Reception->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// Services
		if (!$this->isAddOrEdit() && $this->Services->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->Services->AdvancedSearch->SearchValue != "" || $this->Services->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// amount
		if (!$this->isAddOrEdit() && $this->amount->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->amount->AdvancedSearch->SearchValue != "" || $this->amount->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// description
		if (!$this->isAddOrEdit() && $this->description->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->description->AdvancedSearch->SearchValue != "" || $this->description->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// patient_type
		if (!$this->isAddOrEdit() && $this->patient_type->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->patient_type->AdvancedSearch->SearchValue != "" || $this->patient_type->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// charged_date
		if (!$this->isAddOrEdit() && $this->charged_date->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->charged_date->AdvancedSearch->SearchValue != "" || $this->charged_date->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
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

		// profilePic
		if (!$this->isAddOrEdit() && $this->profilePic->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->profilePic->AdvancedSearch->SearchValue != "" || $this->profilePic->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// Unit
		if (!$this->isAddOrEdit() && $this->Unit->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->Unit->AdvancedSearch->SearchValue != "" || $this->Unit->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// Quantity
		if (!$this->isAddOrEdit() && $this->Quantity->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->Quantity->AdvancedSearch->SearchValue != "" || $this->Quantity->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// Discount
		if (!$this->isAddOrEdit() && $this->Discount->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->Discount->AdvancedSearch->SearchValue != "" || $this->Discount->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// SubTotal
		if (!$this->isAddOrEdit() && $this->SubTotal->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->SubTotal->AdvancedSearch->SearchValue != "" || $this->SubTotal->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// ServiceSelect
		if (!$this->isAddOrEdit() && $this->ServiceSelect->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->ServiceSelect->AdvancedSearch->SearchValue != "" || $this->ServiceSelect->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}
		if (is_array($this->ServiceSelect->AdvancedSearch->SearchValue))
			$this->ServiceSelect->AdvancedSearch->SearchValue = implode(Config("MULTIPLE_OPTION_SEPARATOR"), $this->ServiceSelect->AdvancedSearch->SearchValue);
		if (is_array($this->ServiceSelect->AdvancedSearch->SearchValue2))
			$this->ServiceSelect->AdvancedSearch->SearchValue2 = implode(Config("MULTIPLE_OPTION_SEPARATOR"), $this->ServiceSelect->AdvancedSearch->SearchValue2);

		// Aid
		if (!$this->isAddOrEdit() && $this->Aid->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->Aid->AdvancedSearch->SearchValue != "" || $this->Aid->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// Vid
		if (!$this->isAddOrEdit() && $this->Vid->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->Vid->AdvancedSearch->SearchValue != "" || $this->Vid->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// DrID
		if (!$this->isAddOrEdit() && $this->DrID->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->DrID->AdvancedSearch->SearchValue != "" || $this->DrID->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// DrCODE
		if (!$this->isAddOrEdit() && $this->DrCODE->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->DrCODE->AdvancedSearch->SearchValue != "" || $this->DrCODE->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// DrName
		if (!$this->isAddOrEdit() && $this->DrName->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->DrName->AdvancedSearch->SearchValue != "" || $this->DrName->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// Department
		if (!$this->isAddOrEdit() && $this->Department->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->Department->AdvancedSearch->SearchValue != "" || $this->Department->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// DrSharePres
		if (!$this->isAddOrEdit() && $this->DrSharePres->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->DrSharePres->AdvancedSearch->SearchValue != "" || $this->DrSharePres->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// HospSharePres
		if (!$this->isAddOrEdit() && $this->HospSharePres->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->HospSharePres->AdvancedSearch->SearchValue != "" || $this->HospSharePres->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// DrShareAmount
		if (!$this->isAddOrEdit() && $this->DrShareAmount->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->DrShareAmount->AdvancedSearch->SearchValue != "" || $this->DrShareAmount->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// HospShareAmount
		if (!$this->isAddOrEdit() && $this->HospShareAmount->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->HospShareAmount->AdvancedSearch->SearchValue != "" || $this->HospShareAmount->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// DrShareSettiledAmount
		if (!$this->isAddOrEdit() && $this->DrShareSettiledAmount->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->DrShareSettiledAmount->AdvancedSearch->SearchValue != "" || $this->DrShareSettiledAmount->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// DrShareSettledId
		if (!$this->isAddOrEdit() && $this->DrShareSettledId->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->DrShareSettledId->AdvancedSearch->SearchValue != "" || $this->DrShareSettledId->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// DrShareSettiledStatus
		if (!$this->isAddOrEdit() && $this->DrShareSettiledStatus->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->DrShareSettiledStatus->AdvancedSearch->SearchValue != "" || $this->DrShareSettiledStatus->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// invoiceId
		if (!$this->isAddOrEdit() && $this->invoiceId->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->invoiceId->AdvancedSearch->SearchValue != "" || $this->invoiceId->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// invoiceAmount
		if (!$this->isAddOrEdit() && $this->invoiceAmount->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->invoiceAmount->AdvancedSearch->SearchValue != "" || $this->invoiceAmount->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// invoiceStatus
		if (!$this->isAddOrEdit() && $this->invoiceStatus->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->invoiceStatus->AdvancedSearch->SearchValue != "" || $this->invoiceStatus->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// modeOfPayment
		if (!$this->isAddOrEdit() && $this->modeOfPayment->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->modeOfPayment->AdvancedSearch->SearchValue != "" || $this->modeOfPayment->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// HospID
		if (!$this->isAddOrEdit() && $this->HospID->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->HospID->AdvancedSearch->SearchValue != "" || $this->HospID->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// RIDNO
		if (!$this->isAddOrEdit() && $this->RIDNO->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->RIDNO->AdvancedSearch->SearchValue != "" || $this->RIDNO->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// TidNo
		if (!$this->isAddOrEdit() && $this->TidNo->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->TidNo->AdvancedSearch->SearchValue != "" || $this->TidNo->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// DiscountCategory
		if (!$this->isAddOrEdit() && $this->DiscountCategory->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->DiscountCategory->AdvancedSearch->SearchValue != "" || $this->DiscountCategory->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// sid
		if (!$this->isAddOrEdit() && $this->sid->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->sid->AdvancedSearch->SearchValue != "" || $this->sid->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// ItemCode
		if (!$this->isAddOrEdit() && $this->ItemCode->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->ItemCode->AdvancedSearch->SearchValue != "" || $this->ItemCode->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
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

		// Abnormal
		if (!$this->isAddOrEdit() && $this->Abnormal->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->Abnormal->AdvancedSearch->SearchValue != "" || $this->Abnormal->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// RefValue
		if (!$this->isAddOrEdit() && $this->RefValue->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->RefValue->AdvancedSearch->SearchValue != "" || $this->RefValue->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// TestUnit
		if (!$this->isAddOrEdit() && $this->TestUnit->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->TestUnit->AdvancedSearch->SearchValue != "" || $this->TestUnit->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// LOWHIGH
		if (!$this->isAddOrEdit() && $this->LOWHIGH->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->LOWHIGH->AdvancedSearch->SearchValue != "" || $this->LOWHIGH->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// Branch
		if (!$this->isAddOrEdit() && $this->Branch->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->Branch->AdvancedSearch->SearchValue != "" || $this->Branch->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// Dispatch
		if (!$this->isAddOrEdit() && $this->Dispatch->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->Dispatch->AdvancedSearch->SearchValue != "" || $this->Dispatch->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
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

		// Printed
		if (!$this->isAddOrEdit() && $this->Printed->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->Printed->AdvancedSearch->SearchValue != "" || $this->Printed->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
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

		// BillingDate
		if (!$this->isAddOrEdit() && $this->BillingDate->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->BillingDate->AdvancedSearch->SearchValue != "" || $this->BillingDate->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// BilledBy
		if (!$this->isAddOrEdit() && $this->BilledBy->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->BilledBy->AdvancedSearch->SearchValue != "" || $this->BilledBy->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// Resulted
		if (!$this->isAddOrEdit() && $this->Resulted->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->Resulted->AdvancedSearch->SearchValue != "" || $this->Resulted->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// ResultDate
		if (!$this->isAddOrEdit() && $this->ResultDate->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->ResultDate->AdvancedSearch->SearchValue != "" || $this->ResultDate->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// ResultedBy
		if (!$this->isAddOrEdit() && $this->ResultedBy->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->ResultedBy->AdvancedSearch->SearchValue != "" || $this->ResultedBy->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
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

		// Sampled
		if (!$this->isAddOrEdit() && $this->Sampled->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->Sampled->AdvancedSearch->SearchValue != "" || $this->Sampled->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
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

		// Recevied
		if (!$this->isAddOrEdit() && $this->Recevied->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->Recevied->AdvancedSearch->SearchValue != "" || $this->Recevied->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
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

		// DeptRecived
		if (!$this->isAddOrEdit() && $this->DeptRecived->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->DeptRecived->AdvancedSearch->SearchValue != "" || $this->DeptRecived->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
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

		// SAuthendicate
		if (!$this->isAddOrEdit() && $this->SAuthendicate->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->SAuthendicate->AdvancedSearch->SearchValue != "" || $this->SAuthendicate->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// AuthDate
		if (!$this->isAddOrEdit() && $this->AuthDate->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->AuthDate->AdvancedSearch->SearchValue != "" || $this->AuthDate->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// AuthBy
		if (!$this->isAddOrEdit() && $this->AuthBy->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->AuthBy->AdvancedSearch->SearchValue != "" || $this->AuthBy->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// Authencate
		if (!$this->isAddOrEdit() && $this->Authencate->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->Authencate->AdvancedSearch->SearchValue != "" || $this->Authencate->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// EditDate
		if (!$this->isAddOrEdit() && $this->EditDate->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->EditDate->AdvancedSearch->SearchValue != "" || $this->EditDate->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// EditBy
		if (!$this->isAddOrEdit() && $this->EditBy->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->EditBy->AdvancedSearch->SearchValue != "" || $this->EditBy->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// Editted
		if (!$this->isAddOrEdit() && $this->Editted->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->Editted->AdvancedSearch->SearchValue != "" || $this->Editted->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// PatID
		if (!$this->isAddOrEdit() && $this->PatID->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->PatID->AdvancedSearch->SearchValue != "" || $this->PatID->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// PatientId
		if (!$this->isAddOrEdit() && $this->PatientId->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->PatientId->AdvancedSearch->SearchValue != "" || $this->PatientId->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// Mobile
		if (!$this->isAddOrEdit() && $this->Mobile->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->Mobile->AdvancedSearch->SearchValue != "" || $this->Mobile->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// CId
		if (!$this->isAddOrEdit() && $this->CId->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->CId->AdvancedSearch->SearchValue != "" || $this->CId->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// Order
		if (!$this->isAddOrEdit() && $this->Order->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->Order->AdvancedSearch->SearchValue != "" || $this->Order->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// Form
		if (!$this->isAddOrEdit() && $this->Form->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->Form->AdvancedSearch->SearchValue != "" || $this->Form->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// ResType
		if (!$this->isAddOrEdit() && $this->ResType->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->ResType->AdvancedSearch->SearchValue != "" || $this->ResType->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// Sample
		if (!$this->isAddOrEdit() && $this->Sample->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->Sample->AdvancedSearch->SearchValue != "" || $this->Sample->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// NoD
		if (!$this->isAddOrEdit() && $this->NoD->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->NoD->AdvancedSearch->SearchValue != "" || $this->NoD->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// BillOrder
		if (!$this->isAddOrEdit() && $this->BillOrder->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->BillOrder->AdvancedSearch->SearchValue != "" || $this->BillOrder->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// Formula
		if (!$this->isAddOrEdit() && $this->Formula->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->Formula->AdvancedSearch->SearchValue != "" || $this->Formula->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// Inactive
		if (!$this->isAddOrEdit() && $this->Inactive->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->Inactive->AdvancedSearch->SearchValue != "" || $this->Inactive->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// CollSample
		if (!$this->isAddOrEdit() && $this->CollSample->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->CollSample->AdvancedSearch->SearchValue != "" || $this->CollSample->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// TestType
		if (!$this->isAddOrEdit() && $this->TestType->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->TestType->AdvancedSearch->SearchValue != "" || $this->TestType->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// Repeated
		if (!$this->isAddOrEdit() && $this->Repeated->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->Repeated->AdvancedSearch->SearchValue != "" || $this->Repeated->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// RepeatedBy
		if (!$this->isAddOrEdit() && $this->RepeatedBy->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->RepeatedBy->AdvancedSearch->SearchValue != "" || $this->RepeatedBy->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// RepeatedDate
		if (!$this->isAddOrEdit() && $this->RepeatedDate->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->RepeatedDate->AdvancedSearch->SearchValue != "" || $this->RepeatedDate->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// serviceID
		if (!$this->isAddOrEdit() && $this->serviceID->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->serviceID->AdvancedSearch->SearchValue != "" || $this->serviceID->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// Service_Type
		if (!$this->isAddOrEdit() && $this->Service_Type->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->Service_Type->AdvancedSearch->SearchValue != "" || $this->Service_Type->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// Service_Department
		if (!$this->isAddOrEdit() && $this->Service_Department->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->Service_Department->AdvancedSearch->SearchValue != "" || $this->Service_Department->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// RequestNo
		if (!$this->isAddOrEdit() && $this->RequestNo->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->RequestNo->AdvancedSearch->SearchValue != "" || $this->RequestNo->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
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

		// Check field name 'Reception' first before field var 'x_Reception'
		$val = $CurrentForm->hasValue("Reception") ? $CurrentForm->getValue("Reception") : $CurrentForm->getValue("x_Reception");
		if (!$this->Reception->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Reception->Visible = FALSE; // Disable update for API request
			else
				$this->Reception->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_Reception"))
			$this->Reception->setOldValue($CurrentForm->getValue("o_Reception"));

		// Check field name 'Services' first before field var 'x_Services'
		$val = $CurrentForm->hasValue("Services") ? $CurrentForm->getValue("Services") : $CurrentForm->getValue("x_Services");
		if (!$this->Services->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Services->Visible = FALSE; // Disable update for API request
			else
				$this->Services->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_Services"))
			$this->Services->setOldValue($CurrentForm->getValue("o_Services"));

		// Check field name 'amount' first before field var 'x_amount'
		$val = $CurrentForm->hasValue("amount") ? $CurrentForm->getValue("amount") : $CurrentForm->getValue("x_amount");
		if (!$this->amount->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->amount->Visible = FALSE; // Disable update for API request
			else
				$this->amount->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_amount"))
			$this->amount->setOldValue($CurrentForm->getValue("o_amount"));

		// Check field name 'description' first before field var 'x_description'
		$val = $CurrentForm->hasValue("description") ? $CurrentForm->getValue("description") : $CurrentForm->getValue("x_description");
		if (!$this->description->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->description->Visible = FALSE; // Disable update for API request
			else
				$this->description->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_description"))
			$this->description->setOldValue($CurrentForm->getValue("o_description"));

		// Check field name 'patient_type' first before field var 'x_patient_type'
		$val = $CurrentForm->hasValue("patient_type") ? $CurrentForm->getValue("patient_type") : $CurrentForm->getValue("x_patient_type");
		if (!$this->patient_type->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->patient_type->Visible = FALSE; // Disable update for API request
			else
				$this->patient_type->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_patient_type"))
			$this->patient_type->setOldValue($CurrentForm->getValue("o_patient_type"));

		// Check field name 'charged_date' first before field var 'x_charged_date'
		$val = $CurrentForm->hasValue("charged_date") ? $CurrentForm->getValue("charged_date") : $CurrentForm->getValue("x_charged_date");
		if (!$this->charged_date->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->charged_date->Visible = FALSE; // Disable update for API request
			else
				$this->charged_date->setFormValue($val);
			$this->charged_date->CurrentValue = UnFormatDateTime($this->charged_date->CurrentValue, 0);
		}
		if ($CurrentForm->hasValue("o_charged_date"))
			$this->charged_date->setOldValue($CurrentForm->getValue("o_charged_date"));

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

		// Check field name 'mrnno' first before field var 'x_mrnno'
		$val = $CurrentForm->hasValue("mrnno") ? $CurrentForm->getValue("mrnno") : $CurrentForm->getValue("x_mrnno");
		if (!$this->mrnno->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->mrnno->Visible = FALSE; // Disable update for API request
			else
				$this->mrnno->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_mrnno"))
			$this->mrnno->setOldValue($CurrentForm->getValue("o_mrnno"));

		// Check field name 'PatientName' first before field var 'x_PatientName'
		$val = $CurrentForm->hasValue("PatientName") ? $CurrentForm->getValue("PatientName") : $CurrentForm->getValue("x_PatientName");
		if (!$this->PatientName->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->PatientName->Visible = FALSE; // Disable update for API request
			else
				$this->PatientName->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_PatientName"))
			$this->PatientName->setOldValue($CurrentForm->getValue("o_PatientName"));

		// Check field name 'Age' first before field var 'x_Age'
		$val = $CurrentForm->hasValue("Age") ? $CurrentForm->getValue("Age") : $CurrentForm->getValue("x_Age");
		if (!$this->Age->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Age->Visible = FALSE; // Disable update for API request
			else
				$this->Age->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_Age"))
			$this->Age->setOldValue($CurrentForm->getValue("o_Age"));

		// Check field name 'Gender' first before field var 'x_Gender'
		$val = $CurrentForm->hasValue("Gender") ? $CurrentForm->getValue("Gender") : $CurrentForm->getValue("x_Gender");
		if (!$this->Gender->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Gender->Visible = FALSE; // Disable update for API request
			else
				$this->Gender->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_Gender"))
			$this->Gender->setOldValue($CurrentForm->getValue("o_Gender"));

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

		// Check field name 'Quantity' first before field var 'x_Quantity'
		$val = $CurrentForm->hasValue("Quantity") ? $CurrentForm->getValue("Quantity") : $CurrentForm->getValue("x_Quantity");
		if (!$this->Quantity->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Quantity->Visible = FALSE; // Disable update for API request
			else
				$this->Quantity->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_Quantity"))
			$this->Quantity->setOldValue($CurrentForm->getValue("o_Quantity"));

		// Check field name 'Discount' first before field var 'x_Discount'
		$val = $CurrentForm->hasValue("Discount") ? $CurrentForm->getValue("Discount") : $CurrentForm->getValue("x_Discount");
		if (!$this->Discount->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Discount->Visible = FALSE; // Disable update for API request
			else
				$this->Discount->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_Discount"))
			$this->Discount->setOldValue($CurrentForm->getValue("o_Discount"));

		// Check field name 'SubTotal' first before field var 'x_SubTotal'
		$val = $CurrentForm->hasValue("SubTotal") ? $CurrentForm->getValue("SubTotal") : $CurrentForm->getValue("x_SubTotal");
		if (!$this->SubTotal->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->SubTotal->Visible = FALSE; // Disable update for API request
			else
				$this->SubTotal->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_SubTotal"))
			$this->SubTotal->setOldValue($CurrentForm->getValue("o_SubTotal"));

		// Check field name 'ServiceSelect' first before field var 'x_ServiceSelect'
		$val = $CurrentForm->hasValue("ServiceSelect") ? $CurrentForm->getValue("ServiceSelect") : $CurrentForm->getValue("x_ServiceSelect");
		if (!$this->ServiceSelect->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->ServiceSelect->Visible = FALSE; // Disable update for API request
			else
				$this->ServiceSelect->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_ServiceSelect"))
			$this->ServiceSelect->setOldValue($CurrentForm->getValue("o_ServiceSelect"));

		// Check field name 'Aid' first before field var 'x_Aid'
		$val = $CurrentForm->hasValue("Aid") ? $CurrentForm->getValue("Aid") : $CurrentForm->getValue("x_Aid");
		if (!$this->Aid->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Aid->Visible = FALSE; // Disable update for API request
			else
				$this->Aid->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_Aid"))
			$this->Aid->setOldValue($CurrentForm->getValue("o_Aid"));

		// Check field name 'Vid' first before field var 'x_Vid'
		$val = $CurrentForm->hasValue("Vid") ? $CurrentForm->getValue("Vid") : $CurrentForm->getValue("x_Vid");
		if (!$this->Vid->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Vid->Visible = FALSE; // Disable update for API request
			else
				$this->Vid->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_Vid"))
			$this->Vid->setOldValue($CurrentForm->getValue("o_Vid"));

		// Check field name 'DrID' first before field var 'x_DrID'
		$val = $CurrentForm->hasValue("DrID") ? $CurrentForm->getValue("DrID") : $CurrentForm->getValue("x_DrID");
		if (!$this->DrID->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->DrID->Visible = FALSE; // Disable update for API request
			else
				$this->DrID->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_DrID"))
			$this->DrID->setOldValue($CurrentForm->getValue("o_DrID"));

		// Check field name 'DrCODE' first before field var 'x_DrCODE'
		$val = $CurrentForm->hasValue("DrCODE") ? $CurrentForm->getValue("DrCODE") : $CurrentForm->getValue("x_DrCODE");
		if (!$this->DrCODE->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->DrCODE->Visible = FALSE; // Disable update for API request
			else
				$this->DrCODE->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_DrCODE"))
			$this->DrCODE->setOldValue($CurrentForm->getValue("o_DrCODE"));

		// Check field name 'DrName' first before field var 'x_DrName'
		$val = $CurrentForm->hasValue("DrName") ? $CurrentForm->getValue("DrName") : $CurrentForm->getValue("x_DrName");
		if (!$this->DrName->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->DrName->Visible = FALSE; // Disable update for API request
			else
				$this->DrName->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_DrName"))
			$this->DrName->setOldValue($CurrentForm->getValue("o_DrName"));

		// Check field name 'Department' first before field var 'x_Department'
		$val = $CurrentForm->hasValue("Department") ? $CurrentForm->getValue("Department") : $CurrentForm->getValue("x_Department");
		if (!$this->Department->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Department->Visible = FALSE; // Disable update for API request
			else
				$this->Department->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_Department"))
			$this->Department->setOldValue($CurrentForm->getValue("o_Department"));

		// Check field name 'DrSharePres' first before field var 'x_DrSharePres'
		$val = $CurrentForm->hasValue("DrSharePres") ? $CurrentForm->getValue("DrSharePres") : $CurrentForm->getValue("x_DrSharePres");
		if (!$this->DrSharePres->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->DrSharePres->Visible = FALSE; // Disable update for API request
			else
				$this->DrSharePres->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_DrSharePres"))
			$this->DrSharePres->setOldValue($CurrentForm->getValue("o_DrSharePres"));

		// Check field name 'HospSharePres' first before field var 'x_HospSharePres'
		$val = $CurrentForm->hasValue("HospSharePres") ? $CurrentForm->getValue("HospSharePres") : $CurrentForm->getValue("x_HospSharePres");
		if (!$this->HospSharePres->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->HospSharePres->Visible = FALSE; // Disable update for API request
			else
				$this->HospSharePres->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_HospSharePres"))
			$this->HospSharePres->setOldValue($CurrentForm->getValue("o_HospSharePres"));

		// Check field name 'DrShareAmount' first before field var 'x_DrShareAmount'
		$val = $CurrentForm->hasValue("DrShareAmount") ? $CurrentForm->getValue("DrShareAmount") : $CurrentForm->getValue("x_DrShareAmount");
		if (!$this->DrShareAmount->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->DrShareAmount->Visible = FALSE; // Disable update for API request
			else
				$this->DrShareAmount->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_DrShareAmount"))
			$this->DrShareAmount->setOldValue($CurrentForm->getValue("o_DrShareAmount"));

		// Check field name 'HospShareAmount' first before field var 'x_HospShareAmount'
		$val = $CurrentForm->hasValue("HospShareAmount") ? $CurrentForm->getValue("HospShareAmount") : $CurrentForm->getValue("x_HospShareAmount");
		if (!$this->HospShareAmount->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->HospShareAmount->Visible = FALSE; // Disable update for API request
			else
				$this->HospShareAmount->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_HospShareAmount"))
			$this->HospShareAmount->setOldValue($CurrentForm->getValue("o_HospShareAmount"));

		// Check field name 'DrShareSettiledAmount' first before field var 'x_DrShareSettiledAmount'
		$val = $CurrentForm->hasValue("DrShareSettiledAmount") ? $CurrentForm->getValue("DrShareSettiledAmount") : $CurrentForm->getValue("x_DrShareSettiledAmount");
		if (!$this->DrShareSettiledAmount->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->DrShareSettiledAmount->Visible = FALSE; // Disable update for API request
			else
				$this->DrShareSettiledAmount->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_DrShareSettiledAmount"))
			$this->DrShareSettiledAmount->setOldValue($CurrentForm->getValue("o_DrShareSettiledAmount"));

		// Check field name 'DrShareSettledId' first before field var 'x_DrShareSettledId'
		$val = $CurrentForm->hasValue("DrShareSettledId") ? $CurrentForm->getValue("DrShareSettledId") : $CurrentForm->getValue("x_DrShareSettledId");
		if (!$this->DrShareSettledId->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->DrShareSettledId->Visible = FALSE; // Disable update for API request
			else
				$this->DrShareSettledId->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_DrShareSettledId"))
			$this->DrShareSettledId->setOldValue($CurrentForm->getValue("o_DrShareSettledId"));

		// Check field name 'DrShareSettiledStatus' first before field var 'x_DrShareSettiledStatus'
		$val = $CurrentForm->hasValue("DrShareSettiledStatus") ? $CurrentForm->getValue("DrShareSettiledStatus") : $CurrentForm->getValue("x_DrShareSettiledStatus");
		if (!$this->DrShareSettiledStatus->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->DrShareSettiledStatus->Visible = FALSE; // Disable update for API request
			else
				$this->DrShareSettiledStatus->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_DrShareSettiledStatus"))
			$this->DrShareSettiledStatus->setOldValue($CurrentForm->getValue("o_DrShareSettiledStatus"));

		// Check field name 'invoiceId' first before field var 'x_invoiceId'
		$val = $CurrentForm->hasValue("invoiceId") ? $CurrentForm->getValue("invoiceId") : $CurrentForm->getValue("x_invoiceId");
		if (!$this->invoiceId->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->invoiceId->Visible = FALSE; // Disable update for API request
			else
				$this->invoiceId->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_invoiceId"))
			$this->invoiceId->setOldValue($CurrentForm->getValue("o_invoiceId"));

		// Check field name 'invoiceAmount' first before field var 'x_invoiceAmount'
		$val = $CurrentForm->hasValue("invoiceAmount") ? $CurrentForm->getValue("invoiceAmount") : $CurrentForm->getValue("x_invoiceAmount");
		if (!$this->invoiceAmount->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->invoiceAmount->Visible = FALSE; // Disable update for API request
			else
				$this->invoiceAmount->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_invoiceAmount"))
			$this->invoiceAmount->setOldValue($CurrentForm->getValue("o_invoiceAmount"));

		// Check field name 'invoiceStatus' first before field var 'x_invoiceStatus'
		$val = $CurrentForm->hasValue("invoiceStatus") ? $CurrentForm->getValue("invoiceStatus") : $CurrentForm->getValue("x_invoiceStatus");
		if (!$this->invoiceStatus->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->invoiceStatus->Visible = FALSE; // Disable update for API request
			else
				$this->invoiceStatus->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_invoiceStatus"))
			$this->invoiceStatus->setOldValue($CurrentForm->getValue("o_invoiceStatus"));

		// Check field name 'modeOfPayment' first before field var 'x_modeOfPayment'
		$val = $CurrentForm->hasValue("modeOfPayment") ? $CurrentForm->getValue("modeOfPayment") : $CurrentForm->getValue("x_modeOfPayment");
		if (!$this->modeOfPayment->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->modeOfPayment->Visible = FALSE; // Disable update for API request
			else
				$this->modeOfPayment->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_modeOfPayment"))
			$this->modeOfPayment->setOldValue($CurrentForm->getValue("o_modeOfPayment"));

		// Check field name 'HospID' first before field var 'x_HospID'
		$val = $CurrentForm->hasValue("HospID") ? $CurrentForm->getValue("HospID") : $CurrentForm->getValue("x_HospID");
		if (!$this->HospID->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->HospID->Visible = FALSE; // Disable update for API request
			else
				$this->HospID->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_HospID"))
			$this->HospID->setOldValue($CurrentForm->getValue("o_HospID"));

		// Check field name 'RIDNO' first before field var 'x_RIDNO'
		$val = $CurrentForm->hasValue("RIDNO") ? $CurrentForm->getValue("RIDNO") : $CurrentForm->getValue("x_RIDNO");
		if (!$this->RIDNO->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->RIDNO->Visible = FALSE; // Disable update for API request
			else
				$this->RIDNO->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_RIDNO"))
			$this->RIDNO->setOldValue($CurrentForm->getValue("o_RIDNO"));

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

		// Check field name 'DiscountCategory' first before field var 'x_DiscountCategory'
		$val = $CurrentForm->hasValue("DiscountCategory") ? $CurrentForm->getValue("DiscountCategory") : $CurrentForm->getValue("x_DiscountCategory");
		if (!$this->DiscountCategory->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->DiscountCategory->Visible = FALSE; // Disable update for API request
			else
				$this->DiscountCategory->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_DiscountCategory"))
			$this->DiscountCategory->setOldValue($CurrentForm->getValue("o_DiscountCategory"));

		// Check field name 'sid' first before field var 'x_sid'
		$val = $CurrentForm->hasValue("sid") ? $CurrentForm->getValue("sid") : $CurrentForm->getValue("x_sid");
		if (!$this->sid->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->sid->Visible = FALSE; // Disable update for API request
			else
				$this->sid->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_sid"))
			$this->sid->setOldValue($CurrentForm->getValue("o_sid"));

		// Check field name 'ItemCode' first before field var 'x_ItemCode'
		$val = $CurrentForm->hasValue("ItemCode") ? $CurrentForm->getValue("ItemCode") : $CurrentForm->getValue("x_ItemCode");
		if (!$this->ItemCode->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->ItemCode->Visible = FALSE; // Disable update for API request
			else
				$this->ItemCode->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_ItemCode"))
			$this->ItemCode->setOldValue($CurrentForm->getValue("o_ItemCode"));

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

		// Check field name 'Comments' first before field var 'x_Comments'
		$val = $CurrentForm->hasValue("Comments") ? $CurrentForm->getValue("Comments") : $CurrentForm->getValue("x_Comments");
		if (!$this->Comments->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Comments->Visible = FALSE; // Disable update for API request
			else
				$this->Comments->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_Comments"))
			$this->Comments->setOldValue($CurrentForm->getValue("o_Comments"));

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

		// Check field name 'TestUnit' first before field var 'x_TestUnit'
		$val = $CurrentForm->hasValue("TestUnit") ? $CurrentForm->getValue("TestUnit") : $CurrentForm->getValue("x_TestUnit");
		if (!$this->TestUnit->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->TestUnit->Visible = FALSE; // Disable update for API request
			else
				$this->TestUnit->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_TestUnit"))
			$this->TestUnit->setOldValue($CurrentForm->getValue("o_TestUnit"));

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

		// Check field name 'BillingDate' first before field var 'x_BillingDate'
		$val = $CurrentForm->hasValue("BillingDate") ? $CurrentForm->getValue("BillingDate") : $CurrentForm->getValue("x_BillingDate");
		if (!$this->BillingDate->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->BillingDate->Visible = FALSE; // Disable update for API request
			else
				$this->BillingDate->setFormValue($val);
			$this->BillingDate->CurrentValue = UnFormatDateTime($this->BillingDate->CurrentValue, 0);
		}
		if ($CurrentForm->hasValue("o_BillingDate"))
			$this->BillingDate->setOldValue($CurrentForm->getValue("o_BillingDate"));

		// Check field name 'BilledBy' first before field var 'x_BilledBy'
		$val = $CurrentForm->hasValue("BilledBy") ? $CurrentForm->getValue("BilledBy") : $CurrentForm->getValue("x_BilledBy");
		if (!$this->BilledBy->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->BilledBy->Visible = FALSE; // Disable update for API request
			else
				$this->BilledBy->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_BilledBy"))
			$this->BilledBy->setOldValue($CurrentForm->getValue("o_BilledBy"));

		// Check field name 'Resulted' first before field var 'x_Resulted'
		$val = $CurrentForm->hasValue("Resulted") ? $CurrentForm->getValue("Resulted") : $CurrentForm->getValue("x_Resulted");
		if (!$this->Resulted->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Resulted->Visible = FALSE; // Disable update for API request
			else
				$this->Resulted->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_Resulted"))
			$this->Resulted->setOldValue($CurrentForm->getValue("o_Resulted"));

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

		// Check field name 'ResultedBy' first before field var 'x_ResultedBy'
		$val = $CurrentForm->hasValue("ResultedBy") ? $CurrentForm->getValue("ResultedBy") : $CurrentForm->getValue("x_ResultedBy");
		if (!$this->ResultedBy->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->ResultedBy->Visible = FALSE; // Disable update for API request
			else
				$this->ResultedBy->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_ResultedBy"))
			$this->ResultedBy->setOldValue($CurrentForm->getValue("o_ResultedBy"));

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

		// Check field name 'Sampled' first before field var 'x_Sampled'
		$val = $CurrentForm->hasValue("Sampled") ? $CurrentForm->getValue("Sampled") : $CurrentForm->getValue("x_Sampled");
		if (!$this->Sampled->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Sampled->Visible = FALSE; // Disable update for API request
			else
				$this->Sampled->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_Sampled"))
			$this->Sampled->setOldValue($CurrentForm->getValue("o_Sampled"));

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

		// Check field name 'Recevied' first before field var 'x_Recevied'
		$val = $CurrentForm->hasValue("Recevied") ? $CurrentForm->getValue("Recevied") : $CurrentForm->getValue("x_Recevied");
		if (!$this->Recevied->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Recevied->Visible = FALSE; // Disable update for API request
			else
				$this->Recevied->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_Recevied"))
			$this->Recevied->setOldValue($CurrentForm->getValue("o_Recevied"));

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

		// Check field name 'DeptRecived' first before field var 'x_DeptRecived'
		$val = $CurrentForm->hasValue("DeptRecived") ? $CurrentForm->getValue("DeptRecived") : $CurrentForm->getValue("x_DeptRecived");
		if (!$this->DeptRecived->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->DeptRecived->Visible = FALSE; // Disable update for API request
			else
				$this->DeptRecived->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_DeptRecived"))
			$this->DeptRecived->setOldValue($CurrentForm->getValue("o_DeptRecived"));

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

		// Check field name 'SAuthendicate' first before field var 'x_SAuthendicate'
		$val = $CurrentForm->hasValue("SAuthendicate") ? $CurrentForm->getValue("SAuthendicate") : $CurrentForm->getValue("x_SAuthendicate");
		if (!$this->SAuthendicate->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->SAuthendicate->Visible = FALSE; // Disable update for API request
			else
				$this->SAuthendicate->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_SAuthendicate"))
			$this->SAuthendicate->setOldValue($CurrentForm->getValue("o_SAuthendicate"));

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

		// Check field name 'Authencate' first before field var 'x_Authencate'
		$val = $CurrentForm->hasValue("Authencate") ? $CurrentForm->getValue("Authencate") : $CurrentForm->getValue("x_Authencate");
		if (!$this->Authencate->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Authencate->Visible = FALSE; // Disable update for API request
			else
				$this->Authencate->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_Authencate"))
			$this->Authencate->setOldValue($CurrentForm->getValue("o_Authencate"));

		// Check field name 'EditDate' first before field var 'x_EditDate'
		$val = $CurrentForm->hasValue("EditDate") ? $CurrentForm->getValue("EditDate") : $CurrentForm->getValue("x_EditDate");
		if (!$this->EditDate->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->EditDate->Visible = FALSE; // Disable update for API request
			else
				$this->EditDate->setFormValue($val);
			$this->EditDate->CurrentValue = UnFormatDateTime($this->EditDate->CurrentValue, 0);
		}
		if ($CurrentForm->hasValue("o_EditDate"))
			$this->EditDate->setOldValue($CurrentForm->getValue("o_EditDate"));

		// Check field name 'EditBy' first before field var 'x_EditBy'
		$val = $CurrentForm->hasValue("EditBy") ? $CurrentForm->getValue("EditBy") : $CurrentForm->getValue("x_EditBy");
		if (!$this->EditBy->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->EditBy->Visible = FALSE; // Disable update for API request
			else
				$this->EditBy->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_EditBy"))
			$this->EditBy->setOldValue($CurrentForm->getValue("o_EditBy"));

		// Check field name 'Editted' first before field var 'x_Editted'
		$val = $CurrentForm->hasValue("Editted") ? $CurrentForm->getValue("Editted") : $CurrentForm->getValue("x_Editted");
		if (!$this->Editted->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Editted->Visible = FALSE; // Disable update for API request
			else
				$this->Editted->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_Editted"))
			$this->Editted->setOldValue($CurrentForm->getValue("o_Editted"));

		// Check field name 'PatID' first before field var 'x_PatID'
		$val = $CurrentForm->hasValue("PatID") ? $CurrentForm->getValue("PatID") : $CurrentForm->getValue("x_PatID");
		if (!$this->PatID->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->PatID->Visible = FALSE; // Disable update for API request
			else
				$this->PatID->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_PatID"))
			$this->PatID->setOldValue($CurrentForm->getValue("o_PatID"));

		// Check field name 'PatientId' first before field var 'x_PatientId'
		$val = $CurrentForm->hasValue("PatientId") ? $CurrentForm->getValue("PatientId") : $CurrentForm->getValue("x_PatientId");
		if (!$this->PatientId->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->PatientId->Visible = FALSE; // Disable update for API request
			else
				$this->PatientId->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_PatientId"))
			$this->PatientId->setOldValue($CurrentForm->getValue("o_PatientId"));

		// Check field name 'Mobile' first before field var 'x_Mobile'
		$val = $CurrentForm->hasValue("Mobile") ? $CurrentForm->getValue("Mobile") : $CurrentForm->getValue("x_Mobile");
		if (!$this->Mobile->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Mobile->Visible = FALSE; // Disable update for API request
			else
				$this->Mobile->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_Mobile"))
			$this->Mobile->setOldValue($CurrentForm->getValue("o_Mobile"));

		// Check field name 'CId' first before field var 'x_CId'
		$val = $CurrentForm->hasValue("CId") ? $CurrentForm->getValue("CId") : $CurrentForm->getValue("x_CId");
		if (!$this->CId->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->CId->Visible = FALSE; // Disable update for API request
			else
				$this->CId->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_CId"))
			$this->CId->setOldValue($CurrentForm->getValue("o_CId"));

		// Check field name 'Order' first before field var 'x_Order'
		$val = $CurrentForm->hasValue("Order") ? $CurrentForm->getValue("Order") : $CurrentForm->getValue("x_Order");
		if (!$this->Order->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Order->Visible = FALSE; // Disable update for API request
			else
				$this->Order->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_Order"))
			$this->Order->setOldValue($CurrentForm->getValue("o_Order"));

		// Check field name 'ResType' first before field var 'x_ResType'
		$val = $CurrentForm->hasValue("ResType") ? $CurrentForm->getValue("ResType") : $CurrentForm->getValue("x_ResType");
		if (!$this->ResType->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->ResType->Visible = FALSE; // Disable update for API request
			else
				$this->ResType->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_ResType"))
			$this->ResType->setOldValue($CurrentForm->getValue("o_ResType"));

		// Check field name 'Sample' first before field var 'x_Sample'
		$val = $CurrentForm->hasValue("Sample") ? $CurrentForm->getValue("Sample") : $CurrentForm->getValue("x_Sample");
		if (!$this->Sample->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Sample->Visible = FALSE; // Disable update for API request
			else
				$this->Sample->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_Sample"))
			$this->Sample->setOldValue($CurrentForm->getValue("o_Sample"));

		// Check field name 'NoD' first before field var 'x_NoD'
		$val = $CurrentForm->hasValue("NoD") ? $CurrentForm->getValue("NoD") : $CurrentForm->getValue("x_NoD");
		if (!$this->NoD->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->NoD->Visible = FALSE; // Disable update for API request
			else
				$this->NoD->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_NoD"))
			$this->NoD->setOldValue($CurrentForm->getValue("o_NoD"));

		// Check field name 'BillOrder' first before field var 'x_BillOrder'
		$val = $CurrentForm->hasValue("BillOrder") ? $CurrentForm->getValue("BillOrder") : $CurrentForm->getValue("x_BillOrder");
		if (!$this->BillOrder->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->BillOrder->Visible = FALSE; // Disable update for API request
			else
				$this->BillOrder->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_BillOrder"))
			$this->BillOrder->setOldValue($CurrentForm->getValue("o_BillOrder"));

		// Check field name 'Inactive' first before field var 'x_Inactive'
		$val = $CurrentForm->hasValue("Inactive") ? $CurrentForm->getValue("Inactive") : $CurrentForm->getValue("x_Inactive");
		if (!$this->Inactive->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Inactive->Visible = FALSE; // Disable update for API request
			else
				$this->Inactive->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_Inactive"))
			$this->Inactive->setOldValue($CurrentForm->getValue("o_Inactive"));

		// Check field name 'CollSample' first before field var 'x_CollSample'
		$val = $CurrentForm->hasValue("CollSample") ? $CurrentForm->getValue("CollSample") : $CurrentForm->getValue("x_CollSample");
		if (!$this->CollSample->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->CollSample->Visible = FALSE; // Disable update for API request
			else
				$this->CollSample->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_CollSample"))
			$this->CollSample->setOldValue($CurrentForm->getValue("o_CollSample"));

		// Check field name 'TestType' first before field var 'x_TestType'
		$val = $CurrentForm->hasValue("TestType") ? $CurrentForm->getValue("TestType") : $CurrentForm->getValue("x_TestType");
		if (!$this->TestType->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->TestType->Visible = FALSE; // Disable update for API request
			else
				$this->TestType->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_TestType"))
			$this->TestType->setOldValue($CurrentForm->getValue("o_TestType"));

		// Check field name 'Repeated' first before field var 'x_Repeated'
		$val = $CurrentForm->hasValue("Repeated") ? $CurrentForm->getValue("Repeated") : $CurrentForm->getValue("x_Repeated");
		if (!$this->Repeated->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Repeated->Visible = FALSE; // Disable update for API request
			else
				$this->Repeated->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_Repeated"))
			$this->Repeated->setOldValue($CurrentForm->getValue("o_Repeated"));

		// Check field name 'RepeatedBy' first before field var 'x_RepeatedBy'
		$val = $CurrentForm->hasValue("RepeatedBy") ? $CurrentForm->getValue("RepeatedBy") : $CurrentForm->getValue("x_RepeatedBy");
		if (!$this->RepeatedBy->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->RepeatedBy->Visible = FALSE; // Disable update for API request
			else
				$this->RepeatedBy->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_RepeatedBy"))
			$this->RepeatedBy->setOldValue($CurrentForm->getValue("o_RepeatedBy"));

		// Check field name 'RepeatedDate' first before field var 'x_RepeatedDate'
		$val = $CurrentForm->hasValue("RepeatedDate") ? $CurrentForm->getValue("RepeatedDate") : $CurrentForm->getValue("x_RepeatedDate");
		if (!$this->RepeatedDate->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->RepeatedDate->Visible = FALSE; // Disable update for API request
			else
				$this->RepeatedDate->setFormValue($val);
			$this->RepeatedDate->CurrentValue = UnFormatDateTime($this->RepeatedDate->CurrentValue, 0);
		}
		if ($CurrentForm->hasValue("o_RepeatedDate"))
			$this->RepeatedDate->setOldValue($CurrentForm->getValue("o_RepeatedDate"));

		// Check field name 'serviceID' first before field var 'x_serviceID'
		$val = $CurrentForm->hasValue("serviceID") ? $CurrentForm->getValue("serviceID") : $CurrentForm->getValue("x_serviceID");
		if (!$this->serviceID->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->serviceID->Visible = FALSE; // Disable update for API request
			else
				$this->serviceID->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_serviceID"))
			$this->serviceID->setOldValue($CurrentForm->getValue("o_serviceID"));

		// Check field name 'Service_Type' first before field var 'x_Service_Type'
		$val = $CurrentForm->hasValue("Service_Type") ? $CurrentForm->getValue("Service_Type") : $CurrentForm->getValue("x_Service_Type");
		if (!$this->Service_Type->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Service_Type->Visible = FALSE; // Disable update for API request
			else
				$this->Service_Type->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_Service_Type"))
			$this->Service_Type->setOldValue($CurrentForm->getValue("o_Service_Type"));

		// Check field name 'Service_Department' first before field var 'x_Service_Department'
		$val = $CurrentForm->hasValue("Service_Department") ? $CurrentForm->getValue("Service_Department") : $CurrentForm->getValue("x_Service_Department");
		if (!$this->Service_Department->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Service_Department->Visible = FALSE; // Disable update for API request
			else
				$this->Service_Department->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_Service_Department"))
			$this->Service_Department->setOldValue($CurrentForm->getValue("o_Service_Department"));

		// Check field name 'RequestNo' first before field var 'x_RequestNo'
		$val = $CurrentForm->hasValue("RequestNo") ? $CurrentForm->getValue("RequestNo") : $CurrentForm->getValue("x_RequestNo");
		if (!$this->RequestNo->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->RequestNo->Visible = FALSE; // Disable update for API request
			else
				$this->RequestNo->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_RequestNo"))
			$this->RequestNo->setOldValue($CurrentForm->getValue("o_RequestNo"));
	}

	// Restore form values
	public function restoreFormValues()
	{
		global $CurrentForm;
		if (!$this->isGridAdd() && !$this->isAdd())
			$this->id->CurrentValue = $this->id->FormValue;
		$this->Reception->CurrentValue = $this->Reception->FormValue;
		$this->Services->CurrentValue = $this->Services->FormValue;
		$this->amount->CurrentValue = $this->amount->FormValue;
		$this->description->CurrentValue = $this->description->FormValue;
		$this->patient_type->CurrentValue = $this->patient_type->FormValue;
		$this->charged_date->CurrentValue = $this->charged_date->FormValue;
		$this->charged_date->CurrentValue = UnFormatDateTime($this->charged_date->CurrentValue, 0);
		$this->status->CurrentValue = $this->status->FormValue;
		$this->mrnno->CurrentValue = $this->mrnno->FormValue;
		$this->PatientName->CurrentValue = $this->PatientName->FormValue;
		$this->Age->CurrentValue = $this->Age->FormValue;
		$this->Gender->CurrentValue = $this->Gender->FormValue;
		$this->Unit->CurrentValue = $this->Unit->FormValue;
		$this->Quantity->CurrentValue = $this->Quantity->FormValue;
		$this->Discount->CurrentValue = $this->Discount->FormValue;
		$this->SubTotal->CurrentValue = $this->SubTotal->FormValue;
		$this->ServiceSelect->CurrentValue = $this->ServiceSelect->FormValue;
		$this->Aid->CurrentValue = $this->Aid->FormValue;
		$this->Vid->CurrentValue = $this->Vid->FormValue;
		$this->DrID->CurrentValue = $this->DrID->FormValue;
		$this->DrCODE->CurrentValue = $this->DrCODE->FormValue;
		$this->DrName->CurrentValue = $this->DrName->FormValue;
		$this->Department->CurrentValue = $this->Department->FormValue;
		$this->DrSharePres->CurrentValue = $this->DrSharePres->FormValue;
		$this->HospSharePres->CurrentValue = $this->HospSharePres->FormValue;
		$this->DrShareAmount->CurrentValue = $this->DrShareAmount->FormValue;
		$this->HospShareAmount->CurrentValue = $this->HospShareAmount->FormValue;
		$this->DrShareSettiledAmount->CurrentValue = $this->DrShareSettiledAmount->FormValue;
		$this->DrShareSettledId->CurrentValue = $this->DrShareSettledId->FormValue;
		$this->DrShareSettiledStatus->CurrentValue = $this->DrShareSettiledStatus->FormValue;
		$this->invoiceId->CurrentValue = $this->invoiceId->FormValue;
		$this->invoiceAmount->CurrentValue = $this->invoiceAmount->FormValue;
		$this->invoiceStatus->CurrentValue = $this->invoiceStatus->FormValue;
		$this->modeOfPayment->CurrentValue = $this->modeOfPayment->FormValue;
		$this->HospID->CurrentValue = $this->HospID->FormValue;
		$this->RIDNO->CurrentValue = $this->RIDNO->FormValue;
		$this->TidNo->CurrentValue = $this->TidNo->FormValue;
		$this->DiscountCategory->CurrentValue = $this->DiscountCategory->FormValue;
		$this->sid->CurrentValue = $this->sid->FormValue;
		$this->ItemCode->CurrentValue = $this->ItemCode->FormValue;
		$this->TestSubCd->CurrentValue = $this->TestSubCd->FormValue;
		$this->DEptCd->CurrentValue = $this->DEptCd->FormValue;
		$this->ProfCd->CurrentValue = $this->ProfCd->FormValue;
		$this->Comments->CurrentValue = $this->Comments->FormValue;
		$this->Method->CurrentValue = $this->Method->FormValue;
		$this->Specimen->CurrentValue = $this->Specimen->FormValue;
		$this->Abnormal->CurrentValue = $this->Abnormal->FormValue;
		$this->TestUnit->CurrentValue = $this->TestUnit->FormValue;
		$this->LOWHIGH->CurrentValue = $this->LOWHIGH->FormValue;
		$this->Branch->CurrentValue = $this->Branch->FormValue;
		$this->Dispatch->CurrentValue = $this->Dispatch->FormValue;
		$this->Pic1->CurrentValue = $this->Pic1->FormValue;
		$this->Pic2->CurrentValue = $this->Pic2->FormValue;
		$this->GraphPath->CurrentValue = $this->GraphPath->FormValue;
		$this->MachineCD->CurrentValue = $this->MachineCD->FormValue;
		$this->TestCancel->CurrentValue = $this->TestCancel->FormValue;
		$this->OutSource->CurrentValue = $this->OutSource->FormValue;
		$this->Printed->CurrentValue = $this->Printed->FormValue;
		$this->PrintBy->CurrentValue = $this->PrintBy->FormValue;
		$this->PrintDate->CurrentValue = $this->PrintDate->FormValue;
		$this->PrintDate->CurrentValue = UnFormatDateTime($this->PrintDate->CurrentValue, 0);
		$this->BillingDate->CurrentValue = $this->BillingDate->FormValue;
		$this->BillingDate->CurrentValue = UnFormatDateTime($this->BillingDate->CurrentValue, 0);
		$this->BilledBy->CurrentValue = $this->BilledBy->FormValue;
		$this->Resulted->CurrentValue = $this->Resulted->FormValue;
		$this->ResultDate->CurrentValue = $this->ResultDate->FormValue;
		$this->ResultDate->CurrentValue = UnFormatDateTime($this->ResultDate->CurrentValue, 0);
		$this->ResultedBy->CurrentValue = $this->ResultedBy->FormValue;
		$this->SampleDate->CurrentValue = $this->SampleDate->FormValue;
		$this->SampleDate->CurrentValue = UnFormatDateTime($this->SampleDate->CurrentValue, 0);
		$this->SampleUser->CurrentValue = $this->SampleUser->FormValue;
		$this->Sampled->CurrentValue = $this->Sampled->FormValue;
		$this->ReceivedDate->CurrentValue = $this->ReceivedDate->FormValue;
		$this->ReceivedDate->CurrentValue = UnFormatDateTime($this->ReceivedDate->CurrentValue, 0);
		$this->ReceivedUser->CurrentValue = $this->ReceivedUser->FormValue;
		$this->Recevied->CurrentValue = $this->Recevied->FormValue;
		$this->DeptRecvDate->CurrentValue = $this->DeptRecvDate->FormValue;
		$this->DeptRecvDate->CurrentValue = UnFormatDateTime($this->DeptRecvDate->CurrentValue, 0);
		$this->DeptRecvUser->CurrentValue = $this->DeptRecvUser->FormValue;
		$this->DeptRecived->CurrentValue = $this->DeptRecived->FormValue;
		$this->SAuthDate->CurrentValue = $this->SAuthDate->FormValue;
		$this->SAuthDate->CurrentValue = UnFormatDateTime($this->SAuthDate->CurrentValue, 0);
		$this->SAuthBy->CurrentValue = $this->SAuthBy->FormValue;
		$this->SAuthendicate->CurrentValue = $this->SAuthendicate->FormValue;
		$this->AuthDate->CurrentValue = $this->AuthDate->FormValue;
		$this->AuthDate->CurrentValue = UnFormatDateTime($this->AuthDate->CurrentValue, 0);
		$this->AuthBy->CurrentValue = $this->AuthBy->FormValue;
		$this->Authencate->CurrentValue = $this->Authencate->FormValue;
		$this->EditDate->CurrentValue = $this->EditDate->FormValue;
		$this->EditDate->CurrentValue = UnFormatDateTime($this->EditDate->CurrentValue, 0);
		$this->EditBy->CurrentValue = $this->EditBy->FormValue;
		$this->Editted->CurrentValue = $this->Editted->FormValue;
		$this->PatID->CurrentValue = $this->PatID->FormValue;
		$this->PatientId->CurrentValue = $this->PatientId->FormValue;
		$this->Mobile->CurrentValue = $this->Mobile->FormValue;
		$this->CId->CurrentValue = $this->CId->FormValue;
		$this->Order->CurrentValue = $this->Order->FormValue;
		$this->ResType->CurrentValue = $this->ResType->FormValue;
		$this->Sample->CurrentValue = $this->Sample->FormValue;
		$this->NoD->CurrentValue = $this->NoD->FormValue;
		$this->BillOrder->CurrentValue = $this->BillOrder->FormValue;
		$this->Inactive->CurrentValue = $this->Inactive->FormValue;
		$this->CollSample->CurrentValue = $this->CollSample->FormValue;
		$this->TestType->CurrentValue = $this->TestType->FormValue;
		$this->Repeated->CurrentValue = $this->Repeated->FormValue;
		$this->RepeatedBy->CurrentValue = $this->RepeatedBy->FormValue;
		$this->RepeatedDate->CurrentValue = $this->RepeatedDate->FormValue;
		$this->RepeatedDate->CurrentValue = UnFormatDateTime($this->RepeatedDate->CurrentValue, 0);
		$this->serviceID->CurrentValue = $this->serviceID->FormValue;
		$this->Service_Type->CurrentValue = $this->Service_Type->FormValue;
		$this->Service_Department->CurrentValue = $this->Service_Department->FormValue;
		$this->RequestNo->CurrentValue = $this->RequestNo->FormValue;
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
		$this->Reception->setDbValue($row['Reception']);
		$this->Services->setDbValue($row['Services']);
		if (array_key_exists('EV__Services', $rs->fields)) {
			$this->Services->VirtualValue = $rs->fields('EV__Services'); // Set up virtual field value
		} else {
			$this->Services->VirtualValue = ""; // Clear value
		}
		$this->amount->setDbValue($row['amount']);
		$this->description->setDbValue($row['description']);
		$this->patient_type->setDbValue($row['patient_type']);
		$this->charged_date->setDbValue($row['charged_date']);
		$this->status->setDbValue($row['status']);
		$this->createdby->setDbValue($row['createdby']);
		$this->createddatetime->setDbValue($row['createddatetime']);
		$this->modifiedby->setDbValue($row['modifiedby']);
		$this->modifieddatetime->setDbValue($row['modifieddatetime']);
		$this->mrnno->setDbValue($row['mrnno']);
		$this->PatientName->setDbValue($row['PatientName']);
		$this->Age->setDbValue($row['Age']);
		$this->Gender->setDbValue($row['Gender']);
		$this->profilePic->setDbValue($row['profilePic']);
		$this->Unit->setDbValue($row['Unit']);
		$this->Quantity->setDbValue($row['Quantity']);
		$this->Discount->setDbValue($row['Discount']);
		$this->SubTotal->setDbValue($row['SubTotal']);
		$this->ServiceSelect->setDbValue($row['ServiceSelect']);
		$this->Aid->setDbValue($row['Aid']);
		$this->Vid->setDbValue($row['Vid']);
		$this->DrID->setDbValue($row['DrID']);
		$this->DrCODE->setDbValue($row['DrCODE']);
		$this->DrName->setDbValue($row['DrName']);
		$this->Department->setDbValue($row['Department']);
		$this->DrSharePres->setDbValue($row['DrSharePres']);
		$this->HospSharePres->setDbValue($row['HospSharePres']);
		$this->DrShareAmount->setDbValue($row['DrShareAmount']);
		$this->HospShareAmount->setDbValue($row['HospShareAmount']);
		$this->DrShareSettiledAmount->setDbValue($row['DrShareSettiledAmount']);
		$this->DrShareSettledId->setDbValue($row['DrShareSettledId']);
		$this->DrShareSettiledStatus->setDbValue($row['DrShareSettiledStatus']);
		$this->invoiceId->setDbValue($row['invoiceId']);
		$this->invoiceAmount->setDbValue($row['invoiceAmount']);
		$this->invoiceStatus->setDbValue($row['invoiceStatus']);
		$this->modeOfPayment->setDbValue($row['modeOfPayment']);
		$this->HospID->setDbValue($row['HospID']);
		$this->RIDNO->setDbValue($row['RIDNO']);
		$this->TidNo->setDbValue($row['TidNo']);
		$this->DiscountCategory->setDbValue($row['DiscountCategory']);
		$this->sid->setDbValue($row['sid']);
		$this->ItemCode->setDbValue($row['ItemCode']);
		$this->TestSubCd->setDbValue($row['TestSubCd']);
		$this->DEptCd->setDbValue($row['DEptCd']);
		$this->ProfCd->setDbValue($row['ProfCd']);
		$this->LabReport->setDbValue($row['LabReport']);
		$this->Comments->setDbValue($row['Comments']);
		$this->Method->setDbValue($row['Method']);
		$this->Specimen->setDbValue($row['Specimen']);
		$this->Abnormal->setDbValue($row['Abnormal']);
		$this->RefValue->setDbValue($row['RefValue']);
		$this->TestUnit->setDbValue($row['TestUnit']);
		$this->LOWHIGH->setDbValue($row['LOWHIGH']);
		$this->Branch->setDbValue($row['Branch']);
		$this->Dispatch->setDbValue($row['Dispatch']);
		$this->Pic1->setDbValue($row['Pic1']);
		$this->Pic2->setDbValue($row['Pic2']);
		$this->GraphPath->setDbValue($row['GraphPath']);
		$this->MachineCD->setDbValue($row['MachineCD']);
		$this->TestCancel->setDbValue($row['TestCancel']);
		$this->OutSource->setDbValue($row['OutSource']);
		$this->Printed->setDbValue($row['Printed']);
		$this->PrintBy->setDbValue($row['PrintBy']);
		$this->PrintDate->setDbValue($row['PrintDate']);
		$this->BillingDate->setDbValue($row['BillingDate']);
		$this->BilledBy->setDbValue($row['BilledBy']);
		$this->Resulted->setDbValue($row['Resulted']);
		$this->ResultDate->setDbValue($row['ResultDate']);
		$this->ResultedBy->setDbValue($row['ResultedBy']);
		$this->SampleDate->setDbValue($row['SampleDate']);
		$this->SampleUser->setDbValue($row['SampleUser']);
		$this->Sampled->setDbValue($row['Sampled']);
		$this->ReceivedDate->setDbValue($row['ReceivedDate']);
		$this->ReceivedUser->setDbValue($row['ReceivedUser']);
		$this->Recevied->setDbValue($row['Recevied']);
		$this->DeptRecvDate->setDbValue($row['DeptRecvDate']);
		$this->DeptRecvUser->setDbValue($row['DeptRecvUser']);
		$this->DeptRecived->setDbValue($row['DeptRecived']);
		$this->SAuthDate->setDbValue($row['SAuthDate']);
		$this->SAuthBy->setDbValue($row['SAuthBy']);
		$this->SAuthendicate->setDbValue($row['SAuthendicate']);
		$this->AuthDate->setDbValue($row['AuthDate']);
		$this->AuthBy->setDbValue($row['AuthBy']);
		$this->Authencate->setDbValue($row['Authencate']);
		$this->EditDate->setDbValue($row['EditDate']);
		$this->EditBy->setDbValue($row['EditBy']);
		$this->Editted->setDbValue($row['Editted']);
		$this->PatID->setDbValue($row['PatID']);
		$this->PatientId->setDbValue($row['PatientId']);
		$this->Mobile->setDbValue($row['Mobile']);
		$this->CId->setDbValue($row['CId']);
		$this->Order->setDbValue($row['Order']);
		$this->Form->setDbValue($row['Form']);
		$this->ResType->setDbValue($row['ResType']);
		$this->Sample->setDbValue($row['Sample']);
		$this->NoD->setDbValue($row['NoD']);
		$this->BillOrder->setDbValue($row['BillOrder']);
		$this->Formula->setDbValue($row['Formula']);
		$this->Inactive->setDbValue($row['Inactive']);
		$this->CollSample->setDbValue($row['CollSample']);
		$this->TestType->setDbValue($row['TestType']);
		$this->Repeated->setDbValue($row['Repeated']);
		$this->RepeatedBy->setDbValue($row['RepeatedBy']);
		$this->RepeatedDate->setDbValue($row['RepeatedDate']);
		$this->serviceID->setDbValue($row['serviceID']);
		$this->Service_Type->setDbValue($row['Service_Type']);
		$this->Service_Department->setDbValue($row['Service_Department']);
		$this->RequestNo->setDbValue($row['RequestNo']);
	}

	// Return a row with default values
	protected function newRow()
	{
		$this->loadDefaultValues();
		$row = [];
		$row['id'] = $this->id->CurrentValue;
		$row['Reception'] = $this->Reception->CurrentValue;
		$row['Services'] = $this->Services->CurrentValue;
		$row['amount'] = $this->amount->CurrentValue;
		$row['description'] = $this->description->CurrentValue;
		$row['patient_type'] = $this->patient_type->CurrentValue;
		$row['charged_date'] = $this->charged_date->CurrentValue;
		$row['status'] = $this->status->CurrentValue;
		$row['createdby'] = $this->createdby->CurrentValue;
		$row['createddatetime'] = $this->createddatetime->CurrentValue;
		$row['modifiedby'] = $this->modifiedby->CurrentValue;
		$row['modifieddatetime'] = $this->modifieddatetime->CurrentValue;
		$row['mrnno'] = $this->mrnno->CurrentValue;
		$row['PatientName'] = $this->PatientName->CurrentValue;
		$row['Age'] = $this->Age->CurrentValue;
		$row['Gender'] = $this->Gender->CurrentValue;
		$row['profilePic'] = $this->profilePic->CurrentValue;
		$row['Unit'] = $this->Unit->CurrentValue;
		$row['Quantity'] = $this->Quantity->CurrentValue;
		$row['Discount'] = $this->Discount->CurrentValue;
		$row['SubTotal'] = $this->SubTotal->CurrentValue;
		$row['ServiceSelect'] = $this->ServiceSelect->CurrentValue;
		$row['Aid'] = $this->Aid->CurrentValue;
		$row['Vid'] = $this->Vid->CurrentValue;
		$row['DrID'] = $this->DrID->CurrentValue;
		$row['DrCODE'] = $this->DrCODE->CurrentValue;
		$row['DrName'] = $this->DrName->CurrentValue;
		$row['Department'] = $this->Department->CurrentValue;
		$row['DrSharePres'] = $this->DrSharePres->CurrentValue;
		$row['HospSharePres'] = $this->HospSharePres->CurrentValue;
		$row['DrShareAmount'] = $this->DrShareAmount->CurrentValue;
		$row['HospShareAmount'] = $this->HospShareAmount->CurrentValue;
		$row['DrShareSettiledAmount'] = $this->DrShareSettiledAmount->CurrentValue;
		$row['DrShareSettledId'] = $this->DrShareSettledId->CurrentValue;
		$row['DrShareSettiledStatus'] = $this->DrShareSettiledStatus->CurrentValue;
		$row['invoiceId'] = $this->invoiceId->CurrentValue;
		$row['invoiceAmount'] = $this->invoiceAmount->CurrentValue;
		$row['invoiceStatus'] = $this->invoiceStatus->CurrentValue;
		$row['modeOfPayment'] = $this->modeOfPayment->CurrentValue;
		$row['HospID'] = $this->HospID->CurrentValue;
		$row['RIDNO'] = $this->RIDNO->CurrentValue;
		$row['TidNo'] = $this->TidNo->CurrentValue;
		$row['DiscountCategory'] = $this->DiscountCategory->CurrentValue;
		$row['sid'] = $this->sid->CurrentValue;
		$row['ItemCode'] = $this->ItemCode->CurrentValue;
		$row['TestSubCd'] = $this->TestSubCd->CurrentValue;
		$row['DEptCd'] = $this->DEptCd->CurrentValue;
		$row['ProfCd'] = $this->ProfCd->CurrentValue;
		$row['LabReport'] = $this->LabReport->CurrentValue;
		$row['Comments'] = $this->Comments->CurrentValue;
		$row['Method'] = $this->Method->CurrentValue;
		$row['Specimen'] = $this->Specimen->CurrentValue;
		$row['Abnormal'] = $this->Abnormal->CurrentValue;
		$row['RefValue'] = $this->RefValue->CurrentValue;
		$row['TestUnit'] = $this->TestUnit->CurrentValue;
		$row['LOWHIGH'] = $this->LOWHIGH->CurrentValue;
		$row['Branch'] = $this->Branch->CurrentValue;
		$row['Dispatch'] = $this->Dispatch->CurrentValue;
		$row['Pic1'] = $this->Pic1->CurrentValue;
		$row['Pic2'] = $this->Pic2->CurrentValue;
		$row['GraphPath'] = $this->GraphPath->CurrentValue;
		$row['MachineCD'] = $this->MachineCD->CurrentValue;
		$row['TestCancel'] = $this->TestCancel->CurrentValue;
		$row['OutSource'] = $this->OutSource->CurrentValue;
		$row['Printed'] = $this->Printed->CurrentValue;
		$row['PrintBy'] = $this->PrintBy->CurrentValue;
		$row['PrintDate'] = $this->PrintDate->CurrentValue;
		$row['BillingDate'] = $this->BillingDate->CurrentValue;
		$row['BilledBy'] = $this->BilledBy->CurrentValue;
		$row['Resulted'] = $this->Resulted->CurrentValue;
		$row['ResultDate'] = $this->ResultDate->CurrentValue;
		$row['ResultedBy'] = $this->ResultedBy->CurrentValue;
		$row['SampleDate'] = $this->SampleDate->CurrentValue;
		$row['SampleUser'] = $this->SampleUser->CurrentValue;
		$row['Sampled'] = $this->Sampled->CurrentValue;
		$row['ReceivedDate'] = $this->ReceivedDate->CurrentValue;
		$row['ReceivedUser'] = $this->ReceivedUser->CurrentValue;
		$row['Recevied'] = $this->Recevied->CurrentValue;
		$row['DeptRecvDate'] = $this->DeptRecvDate->CurrentValue;
		$row['DeptRecvUser'] = $this->DeptRecvUser->CurrentValue;
		$row['DeptRecived'] = $this->DeptRecived->CurrentValue;
		$row['SAuthDate'] = $this->SAuthDate->CurrentValue;
		$row['SAuthBy'] = $this->SAuthBy->CurrentValue;
		$row['SAuthendicate'] = $this->SAuthendicate->CurrentValue;
		$row['AuthDate'] = $this->AuthDate->CurrentValue;
		$row['AuthBy'] = $this->AuthBy->CurrentValue;
		$row['Authencate'] = $this->Authencate->CurrentValue;
		$row['EditDate'] = $this->EditDate->CurrentValue;
		$row['EditBy'] = $this->EditBy->CurrentValue;
		$row['Editted'] = $this->Editted->CurrentValue;
		$row['PatID'] = $this->PatID->CurrentValue;
		$row['PatientId'] = $this->PatientId->CurrentValue;
		$row['Mobile'] = $this->Mobile->CurrentValue;
		$row['CId'] = $this->CId->CurrentValue;
		$row['Order'] = $this->Order->CurrentValue;
		$row['Form'] = $this->Form->CurrentValue;
		$row['ResType'] = $this->ResType->CurrentValue;
		$row['Sample'] = $this->Sample->CurrentValue;
		$row['NoD'] = $this->NoD->CurrentValue;
		$row['BillOrder'] = $this->BillOrder->CurrentValue;
		$row['Formula'] = $this->Formula->CurrentValue;
		$row['Inactive'] = $this->Inactive->CurrentValue;
		$row['CollSample'] = $this->CollSample->CurrentValue;
		$row['TestType'] = $this->TestType->CurrentValue;
		$row['Repeated'] = $this->Repeated->CurrentValue;
		$row['RepeatedBy'] = $this->RepeatedBy->CurrentValue;
		$row['RepeatedDate'] = $this->RepeatedDate->CurrentValue;
		$row['serviceID'] = $this->serviceID->CurrentValue;
		$row['Service_Type'] = $this->Service_Type->CurrentValue;
		$row['Service_Department'] = $this->Service_Department->CurrentValue;
		$row['RequestNo'] = $this->RequestNo->CurrentValue;
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

		// Convert decimal values if posted back
		if ($this->amount->FormValue == $this->amount->CurrentValue && is_numeric(ConvertToFloatString($this->amount->CurrentValue)))
			$this->amount->CurrentValue = ConvertToFloatString($this->amount->CurrentValue);

		// Convert decimal values if posted back
		if ($this->Discount->FormValue == $this->Discount->CurrentValue && is_numeric(ConvertToFloatString($this->Discount->CurrentValue)))
			$this->Discount->CurrentValue = ConvertToFloatString($this->Discount->CurrentValue);

		// Convert decimal values if posted back
		if ($this->SubTotal->FormValue == $this->SubTotal->CurrentValue && is_numeric(ConvertToFloatString($this->SubTotal->CurrentValue)))
			$this->SubTotal->CurrentValue = ConvertToFloatString($this->SubTotal->CurrentValue);

		// Convert decimal values if posted back
		if ($this->DrSharePres->FormValue == $this->DrSharePres->CurrentValue && is_numeric(ConvertToFloatString($this->DrSharePres->CurrentValue)))
			$this->DrSharePres->CurrentValue = ConvertToFloatString($this->DrSharePres->CurrentValue);

		// Convert decimal values if posted back
		if ($this->HospSharePres->FormValue == $this->HospSharePres->CurrentValue && is_numeric(ConvertToFloatString($this->HospSharePres->CurrentValue)))
			$this->HospSharePres->CurrentValue = ConvertToFloatString($this->HospSharePres->CurrentValue);

		// Convert decimal values if posted back
		if ($this->DrShareAmount->FormValue == $this->DrShareAmount->CurrentValue && is_numeric(ConvertToFloatString($this->DrShareAmount->CurrentValue)))
			$this->DrShareAmount->CurrentValue = ConvertToFloatString($this->DrShareAmount->CurrentValue);

		// Convert decimal values if posted back
		if ($this->HospShareAmount->FormValue == $this->HospShareAmount->CurrentValue && is_numeric(ConvertToFloatString($this->HospShareAmount->CurrentValue)))
			$this->HospShareAmount->CurrentValue = ConvertToFloatString($this->HospShareAmount->CurrentValue);

		// Convert decimal values if posted back
		if ($this->DrShareSettiledAmount->FormValue == $this->DrShareSettiledAmount->CurrentValue && is_numeric(ConvertToFloatString($this->DrShareSettiledAmount->CurrentValue)))
			$this->DrShareSettiledAmount->CurrentValue = ConvertToFloatString($this->DrShareSettiledAmount->CurrentValue);

		// Convert decimal values if posted back
		if ($this->invoiceAmount->FormValue == $this->invoiceAmount->CurrentValue && is_numeric(ConvertToFloatString($this->invoiceAmount->CurrentValue)))
			$this->invoiceAmount->CurrentValue = ConvertToFloatString($this->invoiceAmount->CurrentValue);

		// Convert decimal values if posted back
		if ($this->Order->FormValue == $this->Order->CurrentValue && is_numeric(ConvertToFloatString($this->Order->CurrentValue)))
			$this->Order->CurrentValue = ConvertToFloatString($this->Order->CurrentValue);

		// Convert decimal values if posted back
		if ($this->NoD->FormValue == $this->NoD->CurrentValue && is_numeric(ConvertToFloatString($this->NoD->CurrentValue)))
			$this->NoD->CurrentValue = ConvertToFloatString($this->NoD->CurrentValue);

		// Convert decimal values if posted back
		if ($this->BillOrder->FormValue == $this->BillOrder->CurrentValue && is_numeric(ConvertToFloatString($this->BillOrder->CurrentValue)))
			$this->BillOrder->CurrentValue = ConvertToFloatString($this->BillOrder->CurrentValue);

		// Call Row_Rendering event
		$this->Row_Rendering();

		// Common render codes for all row types
		// id
		// Reception
		// Services
		// amount
		// description
		// patient_type
		// charged_date
		// status
		// createdby
		// createddatetime
		// modifiedby
		// modifieddatetime
		// mrnno
		// PatientName
		// Age
		// Gender
		// profilePic
		// Unit
		// Quantity
		// Discount
		// SubTotal
		// ServiceSelect
		// Aid
		// Vid
		// DrID
		// DrCODE
		// DrName
		// Department
		// DrSharePres
		// HospSharePres
		// DrShareAmount
		// HospShareAmount
		// DrShareSettiledAmount
		// DrShareSettledId
		// DrShareSettiledStatus
		// invoiceId
		// invoiceAmount
		// invoiceStatus
		// modeOfPayment
		// HospID
		// RIDNO
		// TidNo
		// DiscountCategory
		// sid
		// ItemCode
		// TestSubCd
		// DEptCd
		// ProfCd
		// LabReport
		// Comments
		// Method
		// Specimen
		// Abnormal
		// RefValue
		// TestUnit
		// LOWHIGH
		// Branch
		// Dispatch
		// Pic1
		// Pic2
		// GraphPath
		// MachineCD
		// TestCancel
		// OutSource
		// Printed
		// PrintBy
		// PrintDate
		// BillingDate
		// BilledBy
		// Resulted
		// ResultDate
		// ResultedBy
		// SampleDate
		// SampleUser
		// Sampled
		// ReceivedDate
		// ReceivedUser
		// Recevied
		// DeptRecvDate
		// DeptRecvUser
		// DeptRecived
		// SAuthDate
		// SAuthBy
		// SAuthendicate
		// AuthDate
		// AuthBy
		// Authencate
		// EditDate
		// EditBy
		// Editted
		// PatID
		// PatientId
		// Mobile
		// CId
		// Order
		// Form
		// ResType
		// Sample
		// NoD
		// BillOrder
		// Formula
		// Inactive
		// CollSample
		// TestType
		// Repeated
		// RepeatedBy
		// RepeatedDate
		// serviceID
		// Service_Type
		// Service_Department
		// RequestNo
		// Accumulate aggregate value

		if ($this->RowType != ROWTYPE_AGGREGATEINIT && $this->RowType != ROWTYPE_AGGREGATE) {
			if (is_numeric($this->SubTotal->CurrentValue))
				$this->SubTotal->Total += $this->SubTotal->CurrentValue; // Accumulate total
		}
		if ($this->RowType == ROWTYPE_VIEW) { // View row

			// id
			$this->id->ViewValue = $this->id->CurrentValue;
			$this->id->ViewCustomAttributes = "";

			// Reception
			$this->Reception->ViewValue = $this->Reception->CurrentValue;
			$this->Reception->ViewValue = FormatNumber($this->Reception->ViewValue, 0, -2, -2, -2);
			$this->Reception->ViewCustomAttributes = "";

			// Services
			if ($this->Services->VirtualValue != "") {
				$this->Services->ViewValue = $this->Services->VirtualValue;
			} else {
				$this->Services->ViewValue = $this->Services->CurrentValue;
				$curVal = strval($this->Services->CurrentValue);
				if ($curVal != "") {
					$this->Services->ViewValue = $this->Services->lookupCacheOption($curVal);
					if ($this->Services->ViewValue === NULL) { // Lookup from database
						$filterWrk = "`SERVICE`" . SearchString("=", $curVal, DATATYPE_STRING, "");
						$lookupFilter = function() {
							return "`Inactive` != 'Y'";
						};
						$lookupFilter = $lookupFilter->bindTo($this);
						$sqlWrk = $this->Services->Lookup->getSql(FALSE, $filterWrk, $lookupFilter, $this);
						$rswrk = Conn()->execute($sqlWrk);
						if ($rswrk && !$rswrk->EOF) { // Lookup values found
							$arwrk = [];
							$arwrk[1] = $rswrk->fields('df');
							$this->Services->ViewValue = $this->Services->displayValue($arwrk);
							$rswrk->Close();
						} else {
							$this->Services->ViewValue = $this->Services->CurrentValue;
						}
					}
				} else {
					$this->Services->ViewValue = NULL;
				}
			}
			$this->Services->ViewCustomAttributes = "";

			// amount
			$this->amount->ViewValue = $this->amount->CurrentValue;
			$this->amount->ViewValue = FormatNumber($this->amount->ViewValue, 2, -2, -2, -2);
			$this->amount->ViewCustomAttributes = "";

			// description
			$this->description->ViewValue = $this->description->CurrentValue;
			$this->description->ViewCustomAttributes = "";

			// patient_type
			$this->patient_type->ViewValue = $this->patient_type->CurrentValue;
			$this->patient_type->ViewValue = FormatNumber($this->patient_type->ViewValue, 0, -2, -2, -2);
			$this->patient_type->ViewCustomAttributes = "";

			// charged_date
			$this->charged_date->ViewValue = $this->charged_date->CurrentValue;
			$this->charged_date->ViewValue = FormatDateTime($this->charged_date->ViewValue, 0);
			$this->charged_date->ViewCustomAttributes = "";

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

			// mrnno
			$this->mrnno->ViewValue = $this->mrnno->CurrentValue;
			$this->mrnno->ViewCustomAttributes = "";

			// PatientName
			$this->PatientName->ViewValue = $this->PatientName->CurrentValue;
			$this->PatientName->ViewCustomAttributes = "";

			// Age
			$this->Age->ViewValue = $this->Age->CurrentValue;
			$this->Age->ViewCustomAttributes = "";

			// Gender
			$this->Gender->ViewValue = $this->Gender->CurrentValue;
			$this->Gender->ViewCustomAttributes = "";

			// Unit
			$this->Unit->ViewValue = $this->Unit->CurrentValue;
			$this->Unit->ViewValue = FormatNumber($this->Unit->ViewValue, 0, -2, -2, -2);
			$this->Unit->ViewCustomAttributes = "";

			// Quantity
			$this->Quantity->ViewValue = $this->Quantity->CurrentValue;
			$this->Quantity->ViewValue = FormatNumber($this->Quantity->ViewValue, 0, -2, -2, -2);
			$this->Quantity->ViewCustomAttributes = "";

			// Discount
			$this->Discount->ViewValue = $this->Discount->CurrentValue;
			$this->Discount->ViewValue = FormatNumber($this->Discount->ViewValue, 2, -2, -2, -2);
			$this->Discount->ViewCustomAttributes = "";

			// SubTotal
			$this->SubTotal->ViewValue = $this->SubTotal->CurrentValue;
			$this->SubTotal->ViewValue = FormatNumber($this->SubTotal->ViewValue, 2, -2, -2, -2);
			$this->SubTotal->ViewCustomAttributes = "";

			// ServiceSelect
			if (strval($this->ServiceSelect->CurrentValue) != "") {
				$this->ServiceSelect->ViewValue = new OptionValues();
				$arwrk = explode(",", strval($this->ServiceSelect->CurrentValue));
				$cnt = count($arwrk);
				for ($ari = 0; $ari < $cnt; $ari++)
					$this->ServiceSelect->ViewValue->add($this->ServiceSelect->optionCaption(trim($arwrk[$ari])));
			} else {
				$this->ServiceSelect->ViewValue = NULL;
			}
			$this->ServiceSelect->ViewCustomAttributes = "";

			// Aid
			$this->Aid->ViewValue = $this->Aid->CurrentValue;
			$this->Aid->ViewValue = FormatNumber($this->Aid->ViewValue, 0, -2, -2, -2);
			$this->Aid->ViewCustomAttributes = "";

			// Vid
			$this->Vid->ViewValue = $this->Vid->CurrentValue;
			$this->Vid->ViewValue = FormatNumber($this->Vid->ViewValue, 0, -2, -2, -2);
			$this->Vid->ViewCustomAttributes = "";

			// DrID
			$this->DrID->ViewValue = $this->DrID->CurrentValue;
			$this->DrID->ViewValue = FormatNumber($this->DrID->ViewValue, 0, -2, -2, -2);
			$this->DrID->ViewCustomAttributes = "";

			// DrCODE
			$this->DrCODE->ViewValue = $this->DrCODE->CurrentValue;
			$this->DrCODE->ViewCustomAttributes = "";

			// DrName
			$this->DrName->ViewValue = $this->DrName->CurrentValue;
			$this->DrName->ViewCustomAttributes = "";

			// Department
			$this->Department->ViewValue = $this->Department->CurrentValue;
			$this->Department->ViewCustomAttributes = "";

			// DrSharePres
			$this->DrSharePres->ViewValue = $this->DrSharePres->CurrentValue;
			$this->DrSharePres->ViewValue = FormatNumber($this->DrSharePres->ViewValue, 2, -2, -2, -2);
			$this->DrSharePres->ViewCustomAttributes = "";

			// HospSharePres
			$this->HospSharePres->ViewValue = $this->HospSharePres->CurrentValue;
			$this->HospSharePres->ViewValue = FormatNumber($this->HospSharePres->ViewValue, 2, -2, -2, -2);
			$this->HospSharePres->ViewCustomAttributes = "";

			// DrShareAmount
			$this->DrShareAmount->ViewValue = $this->DrShareAmount->CurrentValue;
			$this->DrShareAmount->ViewValue = FormatNumber($this->DrShareAmount->ViewValue, 2, -2, -2, -2);
			$this->DrShareAmount->ViewCustomAttributes = "";

			// HospShareAmount
			$this->HospShareAmount->ViewValue = $this->HospShareAmount->CurrentValue;
			$this->HospShareAmount->ViewValue = FormatNumber($this->HospShareAmount->ViewValue, 2, -2, -2, -2);
			$this->HospShareAmount->ViewCustomAttributes = "";

			// DrShareSettiledAmount
			$this->DrShareSettiledAmount->ViewValue = $this->DrShareSettiledAmount->CurrentValue;
			$this->DrShareSettiledAmount->ViewValue = FormatNumber($this->DrShareSettiledAmount->ViewValue, 2, -2, -2, -2);
			$this->DrShareSettiledAmount->ViewCustomAttributes = "";

			// DrShareSettledId
			$this->DrShareSettledId->ViewValue = $this->DrShareSettledId->CurrentValue;
			$this->DrShareSettledId->ViewValue = FormatNumber($this->DrShareSettledId->ViewValue, 0, -2, -2, -2);
			$this->DrShareSettledId->ViewCustomAttributes = "";

			// DrShareSettiledStatus
			$this->DrShareSettiledStatus->ViewValue = $this->DrShareSettiledStatus->CurrentValue;
			$this->DrShareSettiledStatus->ViewValue = FormatNumber($this->DrShareSettiledStatus->ViewValue, 0, -2, -2, -2);
			$this->DrShareSettiledStatus->ViewCustomAttributes = "";

			// invoiceId
			$this->invoiceId->ViewValue = $this->invoiceId->CurrentValue;
			$this->invoiceId->ViewValue = FormatNumber($this->invoiceId->ViewValue, 0, -2, -2, -2);
			$this->invoiceId->ViewCustomAttributes = "";

			// invoiceAmount
			$this->invoiceAmount->ViewValue = $this->invoiceAmount->CurrentValue;
			$this->invoiceAmount->ViewValue = FormatNumber($this->invoiceAmount->ViewValue, 2, -2, -2, -2);
			$this->invoiceAmount->ViewCustomAttributes = "";

			// invoiceStatus
			$this->invoiceStatus->ViewValue = $this->invoiceStatus->CurrentValue;
			$this->invoiceStatus->ViewCustomAttributes = "";

			// modeOfPayment
			$this->modeOfPayment->ViewValue = $this->modeOfPayment->CurrentValue;
			$this->modeOfPayment->ViewCustomAttributes = "";

			// HospID
			$this->HospID->ViewValue = $this->HospID->CurrentValue;
			$this->HospID->ViewValue = FormatNumber($this->HospID->ViewValue, 0, -2, -2, -2);
			$this->HospID->ViewCustomAttributes = "";

			// RIDNO
			$this->RIDNO->ViewValue = $this->RIDNO->CurrentValue;
			$this->RIDNO->ViewValue = FormatNumber($this->RIDNO->ViewValue, 0, -2, -2, -2);
			$this->RIDNO->ViewCustomAttributes = "";

			// TidNo
			$this->TidNo->ViewValue = $this->TidNo->CurrentValue;
			$this->TidNo->ViewValue = FormatNumber($this->TidNo->ViewValue, 0, -2, -2, -2);
			$this->TidNo->ViewCustomAttributes = "";

			// DiscountCategory
			$this->DiscountCategory->ViewValue = $this->DiscountCategory->CurrentValue;
			$this->DiscountCategory->ViewCustomAttributes = "";

			// sid
			$this->sid->ViewValue = $this->sid->CurrentValue;
			$this->sid->ViewValue = FormatNumber($this->sid->ViewValue, 0, -2, -2, -2);
			$this->sid->ViewCustomAttributes = "";

			// ItemCode
			$this->ItemCode->ViewValue = $this->ItemCode->CurrentValue;
			$this->ItemCode->ViewCustomAttributes = "";

			// TestSubCd
			$this->TestSubCd->ViewValue = $this->TestSubCd->CurrentValue;
			$this->TestSubCd->ViewCustomAttributes = "";

			// DEptCd
			$this->DEptCd->ViewValue = $this->DEptCd->CurrentValue;
			$this->DEptCd->ViewCustomAttributes = "";

			// ProfCd
			$this->ProfCd->ViewValue = $this->ProfCd->CurrentValue;
			$this->ProfCd->ViewCustomAttributes = "";

			// Comments
			$this->Comments->ViewValue = $this->Comments->CurrentValue;
			$this->Comments->ViewCustomAttributes = "";

			// Method
			$this->Method->ViewValue = $this->Method->CurrentValue;
			$this->Method->ViewCustomAttributes = "";

			// Specimen
			$this->Specimen->ViewValue = $this->Specimen->CurrentValue;
			$this->Specimen->ViewCustomAttributes = "";

			// Abnormal
			$this->Abnormal->ViewValue = $this->Abnormal->CurrentValue;
			$this->Abnormal->ViewCustomAttributes = "";

			// TestUnit
			$this->TestUnit->ViewValue = $this->TestUnit->CurrentValue;
			$this->TestUnit->ViewCustomAttributes = "";

			// LOWHIGH
			$this->LOWHIGH->ViewValue = $this->LOWHIGH->CurrentValue;
			$this->LOWHIGH->ViewCustomAttributes = "";

			// Branch
			$this->Branch->ViewValue = $this->Branch->CurrentValue;
			$this->Branch->ViewCustomAttributes = "";

			// Dispatch
			$this->Dispatch->ViewValue = $this->Dispatch->CurrentValue;
			$this->Dispatch->ViewCustomAttributes = "";

			// Pic1
			$this->Pic1->ViewValue = $this->Pic1->CurrentValue;
			$this->Pic1->ViewCustomAttributes = "";

			// Pic2
			$this->Pic2->ViewValue = $this->Pic2->CurrentValue;
			$this->Pic2->ViewCustomAttributes = "";

			// GraphPath
			$this->GraphPath->ViewValue = $this->GraphPath->CurrentValue;
			$this->GraphPath->ViewCustomAttributes = "";

			// MachineCD
			$this->MachineCD->ViewValue = $this->MachineCD->CurrentValue;
			$this->MachineCD->ViewCustomAttributes = "";

			// TestCancel
			$this->TestCancel->ViewValue = $this->TestCancel->CurrentValue;
			$this->TestCancel->ViewCustomAttributes = "";

			// OutSource
			$this->OutSource->ViewValue = $this->OutSource->CurrentValue;
			$this->OutSource->ViewCustomAttributes = "";

			// Printed
			$this->Printed->ViewValue = $this->Printed->CurrentValue;
			$this->Printed->ViewCustomAttributes = "";

			// PrintBy
			$this->PrintBy->ViewValue = $this->PrintBy->CurrentValue;
			$this->PrintBy->ViewCustomAttributes = "";

			// PrintDate
			$this->PrintDate->ViewValue = $this->PrintDate->CurrentValue;
			$this->PrintDate->ViewValue = FormatDateTime($this->PrintDate->ViewValue, 0);
			$this->PrintDate->ViewCustomAttributes = "";

			// BillingDate
			$this->BillingDate->ViewValue = $this->BillingDate->CurrentValue;
			$this->BillingDate->ViewValue = FormatDateTime($this->BillingDate->ViewValue, 0);
			$this->BillingDate->ViewCustomAttributes = "";

			// BilledBy
			$this->BilledBy->ViewValue = $this->BilledBy->CurrentValue;
			$this->BilledBy->ViewCustomAttributes = "";

			// Resulted
			$this->Resulted->ViewValue = $this->Resulted->CurrentValue;
			$this->Resulted->ViewCustomAttributes = "";

			// ResultDate
			$this->ResultDate->ViewValue = $this->ResultDate->CurrentValue;
			$this->ResultDate->ViewValue = FormatDateTime($this->ResultDate->ViewValue, 0);
			$this->ResultDate->ViewCustomAttributes = "";

			// ResultedBy
			$this->ResultedBy->ViewValue = $this->ResultedBy->CurrentValue;
			$this->ResultedBy->ViewCustomAttributes = "";

			// SampleDate
			$this->SampleDate->ViewValue = $this->SampleDate->CurrentValue;
			$this->SampleDate->ViewValue = FormatDateTime($this->SampleDate->ViewValue, 0);
			$this->SampleDate->ViewCustomAttributes = "";

			// SampleUser
			$this->SampleUser->ViewValue = $this->SampleUser->CurrentValue;
			$this->SampleUser->ViewCustomAttributes = "";

			// Sampled
			$this->Sampled->ViewValue = $this->Sampled->CurrentValue;
			$this->Sampled->ViewCustomAttributes = "";

			// ReceivedDate
			$this->ReceivedDate->ViewValue = $this->ReceivedDate->CurrentValue;
			$this->ReceivedDate->ViewValue = FormatDateTime($this->ReceivedDate->ViewValue, 0);
			$this->ReceivedDate->ViewCustomAttributes = "";

			// ReceivedUser
			$this->ReceivedUser->ViewValue = $this->ReceivedUser->CurrentValue;
			$this->ReceivedUser->ViewCustomAttributes = "";

			// Recevied
			$this->Recevied->ViewValue = $this->Recevied->CurrentValue;
			$this->Recevied->ViewCustomAttributes = "";

			// DeptRecvDate
			$this->DeptRecvDate->ViewValue = $this->DeptRecvDate->CurrentValue;
			$this->DeptRecvDate->ViewValue = FormatDateTime($this->DeptRecvDate->ViewValue, 0);
			$this->DeptRecvDate->ViewCustomAttributes = "";

			// DeptRecvUser
			$this->DeptRecvUser->ViewValue = $this->DeptRecvUser->CurrentValue;
			$this->DeptRecvUser->ViewCustomAttributes = "";

			// DeptRecived
			$this->DeptRecived->ViewValue = $this->DeptRecived->CurrentValue;
			$this->DeptRecived->ViewCustomAttributes = "";

			// SAuthDate
			$this->SAuthDate->ViewValue = $this->SAuthDate->CurrentValue;
			$this->SAuthDate->ViewValue = FormatDateTime($this->SAuthDate->ViewValue, 0);
			$this->SAuthDate->ViewCustomAttributes = "";

			// SAuthBy
			$this->SAuthBy->ViewValue = $this->SAuthBy->CurrentValue;
			$this->SAuthBy->ViewCustomAttributes = "";

			// SAuthendicate
			$this->SAuthendicate->ViewValue = $this->SAuthendicate->CurrentValue;
			$this->SAuthendicate->ViewCustomAttributes = "";

			// AuthDate
			$this->AuthDate->ViewValue = $this->AuthDate->CurrentValue;
			$this->AuthDate->ViewValue = FormatDateTime($this->AuthDate->ViewValue, 0);
			$this->AuthDate->ViewCustomAttributes = "";

			// AuthBy
			$this->AuthBy->ViewValue = $this->AuthBy->CurrentValue;
			$this->AuthBy->ViewCustomAttributes = "";

			// Authencate
			$this->Authencate->ViewValue = $this->Authencate->CurrentValue;
			$this->Authencate->ViewCustomAttributes = "";

			// EditDate
			$this->EditDate->ViewValue = $this->EditDate->CurrentValue;
			$this->EditDate->ViewValue = FormatDateTime($this->EditDate->ViewValue, 0);
			$this->EditDate->ViewCustomAttributes = "";

			// EditBy
			$this->EditBy->ViewValue = $this->EditBy->CurrentValue;
			$this->EditBy->ViewCustomAttributes = "";

			// Editted
			$this->Editted->ViewValue = $this->Editted->CurrentValue;
			$this->Editted->ViewCustomAttributes = "";

			// PatID
			$this->PatID->ViewValue = $this->PatID->CurrentValue;
			$this->PatID->ViewValue = FormatNumber($this->PatID->ViewValue, 0, -2, -2, -2);
			$this->PatID->ViewCustomAttributes = "";

			// PatientId
			$this->PatientId->ViewValue = $this->PatientId->CurrentValue;
			$this->PatientId->ViewCustomAttributes = "";

			// Mobile
			$this->Mobile->ViewValue = $this->Mobile->CurrentValue;
			$this->Mobile->ViewCustomAttributes = "";

			// CId
			$this->CId->ViewValue = $this->CId->CurrentValue;
			$this->CId->ViewValue = FormatNumber($this->CId->ViewValue, 0, -2, -2, -2);
			$this->CId->ViewCustomAttributes = "";

			// Order
			$this->Order->ViewValue = $this->Order->CurrentValue;
			$this->Order->ViewValue = FormatNumber($this->Order->ViewValue, 2, -2, -2, -2);
			$this->Order->ViewCustomAttributes = "";

			// ResType
			$this->ResType->ViewValue = $this->ResType->CurrentValue;
			$this->ResType->ViewCustomAttributes = "";

			// Sample
			$this->Sample->ViewValue = $this->Sample->CurrentValue;
			$this->Sample->ViewCustomAttributes = "";

			// NoD
			$this->NoD->ViewValue = $this->NoD->CurrentValue;
			$this->NoD->ViewValue = FormatNumber($this->NoD->ViewValue, 2, -2, -2, -2);
			$this->NoD->ViewCustomAttributes = "";

			// BillOrder
			$this->BillOrder->ViewValue = $this->BillOrder->CurrentValue;
			$this->BillOrder->ViewValue = FormatNumber($this->BillOrder->ViewValue, 2, -2, -2, -2);
			$this->BillOrder->ViewCustomAttributes = "";

			// Inactive
			$this->Inactive->ViewValue = $this->Inactive->CurrentValue;
			$this->Inactive->ViewCustomAttributes = "";

			// CollSample
			$this->CollSample->ViewValue = $this->CollSample->CurrentValue;
			$this->CollSample->ViewCustomAttributes = "";

			// TestType
			$this->TestType->ViewValue = $this->TestType->CurrentValue;
			$this->TestType->ViewCustomAttributes = "";

			// Repeated
			$this->Repeated->ViewValue = $this->Repeated->CurrentValue;
			$this->Repeated->ViewCustomAttributes = "";

			// RepeatedBy
			$this->RepeatedBy->ViewValue = $this->RepeatedBy->CurrentValue;
			$this->RepeatedBy->ViewCustomAttributes = "";

			// RepeatedDate
			$this->RepeatedDate->ViewValue = $this->RepeatedDate->CurrentValue;
			$this->RepeatedDate->ViewValue = FormatDateTime($this->RepeatedDate->ViewValue, 0);
			$this->RepeatedDate->ViewCustomAttributes = "";

			// serviceID
			$this->serviceID->ViewValue = $this->serviceID->CurrentValue;
			$this->serviceID->ViewValue = FormatNumber($this->serviceID->ViewValue, 0, -2, -2, -2);
			$this->serviceID->ViewCustomAttributes = "";

			// Service_Type
			$this->Service_Type->ViewValue = $this->Service_Type->CurrentValue;
			$this->Service_Type->ViewCustomAttributes = "";

			// Service_Department
			$this->Service_Department->ViewValue = $this->Service_Department->CurrentValue;
			$this->Service_Department->ViewCustomAttributes = "";

			// RequestNo
			$this->RequestNo->ViewValue = $this->RequestNo->CurrentValue;
			$this->RequestNo->ViewValue = FormatNumber($this->RequestNo->ViewValue, 0, -2, -2, -2);
			$this->RequestNo->ViewCustomAttributes = "";

			// id
			$this->id->LinkCustomAttributes = "";
			$this->id->HrefValue = "";
			$this->id->TooltipValue = "";

			// Reception
			$this->Reception->LinkCustomAttributes = "";
			$this->Reception->HrefValue = "";
			$this->Reception->TooltipValue = "";

			// Services
			$this->Services->LinkCustomAttributes = "";
			$this->Services->HrefValue = "";
			$this->Services->TooltipValue = "";

			// amount
			$this->amount->LinkCustomAttributes = "";
			$this->amount->HrefValue = "";
			$this->amount->TooltipValue = "";

			// description
			$this->description->LinkCustomAttributes = "";
			$this->description->HrefValue = "";
			$this->description->TooltipValue = "";

			// patient_type
			$this->patient_type->LinkCustomAttributes = "";
			$this->patient_type->HrefValue = "";
			$this->patient_type->TooltipValue = "";

			// charged_date
			$this->charged_date->LinkCustomAttributes = "";
			$this->charged_date->HrefValue = "";
			$this->charged_date->TooltipValue = "";

			// status
			$this->status->LinkCustomAttributes = "";
			$this->status->HrefValue = "";
			$this->status->TooltipValue = "";

			// mrnno
			$this->mrnno->LinkCustomAttributes = "";
			$this->mrnno->HrefValue = "";
			$this->mrnno->TooltipValue = "";

			// PatientName
			$this->PatientName->LinkCustomAttributes = "";
			$this->PatientName->HrefValue = "";
			$this->PatientName->TooltipValue = "";

			// Age
			$this->Age->LinkCustomAttributes = "";
			$this->Age->HrefValue = "";
			$this->Age->TooltipValue = "";

			// Gender
			$this->Gender->LinkCustomAttributes = "";
			$this->Gender->HrefValue = "";
			$this->Gender->TooltipValue = "";

			// Unit
			$this->Unit->LinkCustomAttributes = "";
			$this->Unit->HrefValue = "";
			$this->Unit->TooltipValue = "";

			// Quantity
			$this->Quantity->LinkCustomAttributes = "";
			$this->Quantity->HrefValue = "";
			$this->Quantity->TooltipValue = "";

			// Discount
			$this->Discount->LinkCustomAttributes = "";
			$this->Discount->HrefValue = "";
			$this->Discount->TooltipValue = "";

			// SubTotal
			$this->SubTotal->LinkCustomAttributes = "";
			$this->SubTotal->HrefValue = "";
			$this->SubTotal->TooltipValue = "";

			// ServiceSelect
			$this->ServiceSelect->LinkCustomAttributes = "";
			$this->ServiceSelect->HrefValue = "";
			$this->ServiceSelect->TooltipValue = "";

			// Aid
			$this->Aid->LinkCustomAttributes = "";
			$this->Aid->HrefValue = "";
			$this->Aid->TooltipValue = "";

			// Vid
			$this->Vid->LinkCustomAttributes = "";
			$this->Vid->HrefValue = "";
			$this->Vid->TooltipValue = "";

			// DrID
			$this->DrID->LinkCustomAttributes = "";
			$this->DrID->HrefValue = "";
			$this->DrID->TooltipValue = "";

			// DrCODE
			$this->DrCODE->LinkCustomAttributes = "";
			$this->DrCODE->HrefValue = "";
			$this->DrCODE->TooltipValue = "";

			// DrName
			$this->DrName->LinkCustomAttributes = "";
			$this->DrName->HrefValue = "";
			$this->DrName->TooltipValue = "";

			// Department
			$this->Department->LinkCustomAttributes = "";
			$this->Department->HrefValue = "";
			$this->Department->TooltipValue = "";

			// DrSharePres
			$this->DrSharePres->LinkCustomAttributes = "";
			$this->DrSharePres->HrefValue = "";
			$this->DrSharePres->TooltipValue = "";

			// HospSharePres
			$this->HospSharePres->LinkCustomAttributes = "";
			$this->HospSharePres->HrefValue = "";
			$this->HospSharePres->TooltipValue = "";

			// DrShareAmount
			$this->DrShareAmount->LinkCustomAttributes = "";
			$this->DrShareAmount->HrefValue = "";
			$this->DrShareAmount->TooltipValue = "";

			// HospShareAmount
			$this->HospShareAmount->LinkCustomAttributes = "";
			$this->HospShareAmount->HrefValue = "";
			$this->HospShareAmount->TooltipValue = "";

			// DrShareSettiledAmount
			$this->DrShareSettiledAmount->LinkCustomAttributes = "";
			$this->DrShareSettiledAmount->HrefValue = "";
			$this->DrShareSettiledAmount->TooltipValue = "";

			// DrShareSettledId
			$this->DrShareSettledId->LinkCustomAttributes = "";
			$this->DrShareSettledId->HrefValue = "";
			$this->DrShareSettledId->TooltipValue = "";

			// DrShareSettiledStatus
			$this->DrShareSettiledStatus->LinkCustomAttributes = "";
			$this->DrShareSettiledStatus->HrefValue = "";
			$this->DrShareSettiledStatus->TooltipValue = "";

			// invoiceId
			$this->invoiceId->LinkCustomAttributes = "";
			$this->invoiceId->HrefValue = "";
			$this->invoiceId->TooltipValue = "";

			// invoiceAmount
			$this->invoiceAmount->LinkCustomAttributes = "";
			$this->invoiceAmount->HrefValue = "";
			$this->invoiceAmount->TooltipValue = "";

			// invoiceStatus
			$this->invoiceStatus->LinkCustomAttributes = "";
			$this->invoiceStatus->HrefValue = "";
			$this->invoiceStatus->TooltipValue = "";

			// modeOfPayment
			$this->modeOfPayment->LinkCustomAttributes = "";
			$this->modeOfPayment->HrefValue = "";
			$this->modeOfPayment->TooltipValue = "";

			// HospID
			$this->HospID->LinkCustomAttributes = "";
			$this->HospID->HrefValue = "";
			$this->HospID->TooltipValue = "";

			// RIDNO
			$this->RIDNO->LinkCustomAttributes = "";
			$this->RIDNO->HrefValue = "";
			$this->RIDNO->TooltipValue = "";

			// TidNo
			$this->TidNo->LinkCustomAttributes = "";
			$this->TidNo->HrefValue = "";
			$this->TidNo->TooltipValue = "";

			// DiscountCategory
			$this->DiscountCategory->LinkCustomAttributes = "";
			$this->DiscountCategory->HrefValue = "";
			$this->DiscountCategory->TooltipValue = "";

			// sid
			$this->sid->LinkCustomAttributes = "";
			$this->sid->HrefValue = "";
			$this->sid->TooltipValue = "";

			// ItemCode
			$this->ItemCode->LinkCustomAttributes = "";
			$this->ItemCode->HrefValue = "";
			$this->ItemCode->TooltipValue = "";

			// TestSubCd
			$this->TestSubCd->LinkCustomAttributes = "";
			$this->TestSubCd->HrefValue = "";
			$this->TestSubCd->TooltipValue = "";

			// DEptCd
			$this->DEptCd->LinkCustomAttributes = "";
			$this->DEptCd->HrefValue = "";
			$this->DEptCd->TooltipValue = "";

			// ProfCd
			$this->ProfCd->LinkCustomAttributes = "";
			$this->ProfCd->HrefValue = "";
			$this->ProfCd->TooltipValue = "";

			// Comments
			$this->Comments->LinkCustomAttributes = "";
			$this->Comments->HrefValue = "";
			$this->Comments->TooltipValue = "";

			// Method
			$this->Method->LinkCustomAttributes = "";
			$this->Method->HrefValue = "";
			$this->Method->TooltipValue = "";

			// Specimen
			$this->Specimen->LinkCustomAttributes = "";
			$this->Specimen->HrefValue = "";
			$this->Specimen->TooltipValue = "";

			// Abnormal
			$this->Abnormal->LinkCustomAttributes = "";
			$this->Abnormal->HrefValue = "";
			$this->Abnormal->TooltipValue = "";

			// TestUnit
			$this->TestUnit->LinkCustomAttributes = "";
			$this->TestUnit->HrefValue = "";
			$this->TestUnit->TooltipValue = "";

			// LOWHIGH
			$this->LOWHIGH->LinkCustomAttributes = "";
			$this->LOWHIGH->HrefValue = "";
			$this->LOWHIGH->TooltipValue = "";

			// Branch
			$this->Branch->LinkCustomAttributes = "";
			$this->Branch->HrefValue = "";
			$this->Branch->TooltipValue = "";

			// Dispatch
			$this->Dispatch->LinkCustomAttributes = "";
			$this->Dispatch->HrefValue = "";
			$this->Dispatch->TooltipValue = "";

			// Pic1
			$this->Pic1->LinkCustomAttributes = "";
			$this->Pic1->HrefValue = "";
			$this->Pic1->TooltipValue = "";

			// Pic2
			$this->Pic2->LinkCustomAttributes = "";
			$this->Pic2->HrefValue = "";
			$this->Pic2->TooltipValue = "";

			// GraphPath
			$this->GraphPath->LinkCustomAttributes = "";
			$this->GraphPath->HrefValue = "";
			$this->GraphPath->TooltipValue = "";

			// MachineCD
			$this->MachineCD->LinkCustomAttributes = "";
			$this->MachineCD->HrefValue = "";
			$this->MachineCD->TooltipValue = "";

			// TestCancel
			$this->TestCancel->LinkCustomAttributes = "";
			$this->TestCancel->HrefValue = "";
			$this->TestCancel->TooltipValue = "";

			// OutSource
			$this->OutSource->LinkCustomAttributes = "";
			$this->OutSource->HrefValue = "";
			$this->OutSource->TooltipValue = "";

			// Printed
			$this->Printed->LinkCustomAttributes = "";
			$this->Printed->HrefValue = "";
			$this->Printed->TooltipValue = "";

			// PrintBy
			$this->PrintBy->LinkCustomAttributes = "";
			$this->PrintBy->HrefValue = "";
			$this->PrintBy->TooltipValue = "";

			// PrintDate
			$this->PrintDate->LinkCustomAttributes = "";
			$this->PrintDate->HrefValue = "";
			$this->PrintDate->TooltipValue = "";

			// BillingDate
			$this->BillingDate->LinkCustomAttributes = "";
			$this->BillingDate->HrefValue = "";
			$this->BillingDate->TooltipValue = "";

			// BilledBy
			$this->BilledBy->LinkCustomAttributes = "";
			$this->BilledBy->HrefValue = "";
			$this->BilledBy->TooltipValue = "";

			// Resulted
			$this->Resulted->LinkCustomAttributes = "";
			$this->Resulted->HrefValue = "";
			$this->Resulted->TooltipValue = "";

			// ResultDate
			$this->ResultDate->LinkCustomAttributes = "";
			$this->ResultDate->HrefValue = "";
			$this->ResultDate->TooltipValue = "";

			// ResultedBy
			$this->ResultedBy->LinkCustomAttributes = "";
			$this->ResultedBy->HrefValue = "";
			$this->ResultedBy->TooltipValue = "";

			// SampleDate
			$this->SampleDate->LinkCustomAttributes = "";
			$this->SampleDate->HrefValue = "";
			$this->SampleDate->TooltipValue = "";

			// SampleUser
			$this->SampleUser->LinkCustomAttributes = "";
			$this->SampleUser->HrefValue = "";
			$this->SampleUser->TooltipValue = "";

			// Sampled
			$this->Sampled->LinkCustomAttributes = "";
			$this->Sampled->HrefValue = "";
			$this->Sampled->TooltipValue = "";

			// ReceivedDate
			$this->ReceivedDate->LinkCustomAttributes = "";
			$this->ReceivedDate->HrefValue = "";
			$this->ReceivedDate->TooltipValue = "";

			// ReceivedUser
			$this->ReceivedUser->LinkCustomAttributes = "";
			$this->ReceivedUser->HrefValue = "";
			$this->ReceivedUser->TooltipValue = "";

			// Recevied
			$this->Recevied->LinkCustomAttributes = "";
			$this->Recevied->HrefValue = "";
			$this->Recevied->TooltipValue = "";

			// DeptRecvDate
			$this->DeptRecvDate->LinkCustomAttributes = "";
			$this->DeptRecvDate->HrefValue = "";
			$this->DeptRecvDate->TooltipValue = "";

			// DeptRecvUser
			$this->DeptRecvUser->LinkCustomAttributes = "";
			$this->DeptRecvUser->HrefValue = "";
			$this->DeptRecvUser->TooltipValue = "";

			// DeptRecived
			$this->DeptRecived->LinkCustomAttributes = "";
			$this->DeptRecived->HrefValue = "";
			$this->DeptRecived->TooltipValue = "";

			// SAuthDate
			$this->SAuthDate->LinkCustomAttributes = "";
			$this->SAuthDate->HrefValue = "";
			$this->SAuthDate->TooltipValue = "";

			// SAuthBy
			$this->SAuthBy->LinkCustomAttributes = "";
			$this->SAuthBy->HrefValue = "";
			$this->SAuthBy->TooltipValue = "";

			// SAuthendicate
			$this->SAuthendicate->LinkCustomAttributes = "";
			$this->SAuthendicate->HrefValue = "";
			$this->SAuthendicate->TooltipValue = "";

			// AuthDate
			$this->AuthDate->LinkCustomAttributes = "";
			$this->AuthDate->HrefValue = "";
			$this->AuthDate->TooltipValue = "";

			// AuthBy
			$this->AuthBy->LinkCustomAttributes = "";
			$this->AuthBy->HrefValue = "";
			$this->AuthBy->TooltipValue = "";

			// Authencate
			$this->Authencate->LinkCustomAttributes = "";
			$this->Authencate->HrefValue = "";
			$this->Authencate->TooltipValue = "";

			// EditDate
			$this->EditDate->LinkCustomAttributes = "";
			$this->EditDate->HrefValue = "";
			$this->EditDate->TooltipValue = "";

			// EditBy
			$this->EditBy->LinkCustomAttributes = "";
			$this->EditBy->HrefValue = "";
			$this->EditBy->TooltipValue = "";

			// Editted
			$this->Editted->LinkCustomAttributes = "";
			$this->Editted->HrefValue = "";
			$this->Editted->TooltipValue = "";

			// PatID
			$this->PatID->LinkCustomAttributes = "";
			$this->PatID->HrefValue = "";
			$this->PatID->TooltipValue = "";

			// PatientId
			$this->PatientId->LinkCustomAttributes = "";
			$this->PatientId->HrefValue = "";
			$this->PatientId->TooltipValue = "";

			// Mobile
			$this->Mobile->LinkCustomAttributes = "";
			$this->Mobile->HrefValue = "";
			$this->Mobile->TooltipValue = "";

			// CId
			$this->CId->LinkCustomAttributes = "";
			$this->CId->HrefValue = "";
			$this->CId->TooltipValue = "";

			// Order
			$this->Order->LinkCustomAttributes = "";
			$this->Order->HrefValue = "";
			$this->Order->TooltipValue = "";

			// ResType
			$this->ResType->LinkCustomAttributes = "";
			$this->ResType->HrefValue = "";
			$this->ResType->TooltipValue = "";

			// Sample
			$this->Sample->LinkCustomAttributes = "";
			$this->Sample->HrefValue = "";
			$this->Sample->TooltipValue = "";

			// NoD
			$this->NoD->LinkCustomAttributes = "";
			$this->NoD->HrefValue = "";
			$this->NoD->TooltipValue = "";

			// BillOrder
			$this->BillOrder->LinkCustomAttributes = "";
			$this->BillOrder->HrefValue = "";
			$this->BillOrder->TooltipValue = "";

			// Inactive
			$this->Inactive->LinkCustomAttributes = "";
			$this->Inactive->HrefValue = "";
			$this->Inactive->TooltipValue = "";

			// CollSample
			$this->CollSample->LinkCustomAttributes = "";
			$this->CollSample->HrefValue = "";
			$this->CollSample->TooltipValue = "";

			// TestType
			$this->TestType->LinkCustomAttributes = "";
			$this->TestType->HrefValue = "";
			$this->TestType->TooltipValue = "";

			// Repeated
			$this->Repeated->LinkCustomAttributes = "";
			$this->Repeated->HrefValue = "";
			$this->Repeated->TooltipValue = "";

			// RepeatedBy
			$this->RepeatedBy->LinkCustomAttributes = "";
			$this->RepeatedBy->HrefValue = "";
			$this->RepeatedBy->TooltipValue = "";

			// RepeatedDate
			$this->RepeatedDate->LinkCustomAttributes = "";
			$this->RepeatedDate->HrefValue = "";
			$this->RepeatedDate->TooltipValue = "";

			// serviceID
			$this->serviceID->LinkCustomAttributes = "";
			$this->serviceID->HrefValue = "";
			$this->serviceID->TooltipValue = "";

			// Service_Type
			$this->Service_Type->LinkCustomAttributes = "";
			$this->Service_Type->HrefValue = "";
			$this->Service_Type->TooltipValue = "";

			// Service_Department
			$this->Service_Department->LinkCustomAttributes = "";
			$this->Service_Department->HrefValue = "";
			$this->Service_Department->TooltipValue = "";

			// RequestNo
			$this->RequestNo->LinkCustomAttributes = "";
			$this->RequestNo->HrefValue = "";
			$this->RequestNo->TooltipValue = "";
		} elseif ($this->RowType == ROWTYPE_ADD) { // Add row

			// id
			// Reception

			$this->Reception->EditAttrs["class"] = "form-control";
			$this->Reception->EditCustomAttributes = "";
			if ($this->Reception->getSessionValue() != "") {
				$this->Reception->CurrentValue = $this->Reception->getSessionValue();
				$this->Reception->OldValue = $this->Reception->CurrentValue;
				$this->Reception->ViewValue = $this->Reception->CurrentValue;
				$this->Reception->ViewValue = FormatNumber($this->Reception->ViewValue, 0, -2, -2, -2);
				$this->Reception->ViewCustomAttributes = "";
			} else {
				$this->Reception->EditValue = HtmlEncode($this->Reception->CurrentValue);
				$this->Reception->PlaceHolder = RemoveHtml($this->Reception->caption());
			}

			// Services
			$this->Services->EditAttrs["class"] = "form-control";
			$this->Services->EditCustomAttributes = "";
			if (!$this->Services->Raw)
				$this->Services->CurrentValue = HtmlDecode($this->Services->CurrentValue);
			$this->Services->EditValue = HtmlEncode($this->Services->CurrentValue);
			$curVal = strval($this->Services->CurrentValue);
			if ($curVal != "") {
				$this->Services->EditValue = $this->Services->lookupCacheOption($curVal);
				if ($this->Services->EditValue === NULL) { // Lookup from database
					$filterWrk = "`SERVICE`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$lookupFilter = function() {
						return "`Inactive` != 'Y'";
					};
					$lookupFilter = $lookupFilter->bindTo($this);
					$sqlWrk = $this->Services->Lookup->getSql(FALSE, $filterWrk, $lookupFilter, $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = HtmlEncode($rswrk->fields('df'));
						$this->Services->EditValue = $this->Services->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->Services->EditValue = HtmlEncode($this->Services->CurrentValue);
					}
				}
			} else {
				$this->Services->EditValue = NULL;
			}
			$this->Services->PlaceHolder = RemoveHtml($this->Services->caption());

			// amount
			$this->amount->EditAttrs["class"] = "form-control";
			$this->amount->EditCustomAttributes = "";
			$this->amount->EditValue = HtmlEncode($this->amount->CurrentValue);
			$this->amount->PlaceHolder = RemoveHtml($this->amount->caption());
			if (strval($this->amount->EditValue) != "" && is_numeric($this->amount->EditValue)) {
				$this->amount->EditValue = FormatNumber($this->amount->EditValue, -2, -2, -2, -2);
				$this->amount->OldValue = $this->amount->EditValue;
			}
			

			// description
			$this->description->EditAttrs["class"] = "form-control";
			$this->description->EditCustomAttributes = "";
			if (!$this->description->Raw)
				$this->description->CurrentValue = HtmlDecode($this->description->CurrentValue);
			$this->description->EditValue = HtmlEncode($this->description->CurrentValue);
			$this->description->PlaceHolder = RemoveHtml($this->description->caption());

			// patient_type
			$this->patient_type->EditAttrs["class"] = "form-control";
			$this->patient_type->EditCustomAttributes = "";
			$this->patient_type->EditValue = HtmlEncode($this->patient_type->CurrentValue);
			$this->patient_type->PlaceHolder = RemoveHtml($this->patient_type->caption());

			// charged_date
			// status

			$this->status->EditAttrs["class"] = "form-control";
			$this->status->EditCustomAttributes = "";
			$curVal = trim(strval($this->status->CurrentValue));
			if ($curVal != "")
				$this->status->ViewValue = $this->status->lookupCacheOption($curVal);
			else
				$this->status->ViewValue = $this->status->Lookup !== NULL && is_array($this->status->Lookup->Options) ? $curVal : NULL;
			if ($this->status->ViewValue !== NULL) { // Load from cache
				$this->status->EditValue = array_values($this->status->Lookup->Options);
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`id`" . SearchString("=", $this->status->CurrentValue, DATATYPE_NUMBER, "");
				}
				$sqlWrk = $this->status->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				$arwrk = $rswrk ? $rswrk->getRows() : [];
				if ($rswrk)
					$rswrk->close();
				$this->status->EditValue = $arwrk;
			}

			// mrnno
			$this->mrnno->EditAttrs["class"] = "form-control";
			$this->mrnno->EditCustomAttributes = "";
			if ($this->mrnno->getSessionValue() != "") {
				$this->mrnno->CurrentValue = $this->mrnno->getSessionValue();
				$this->mrnno->OldValue = $this->mrnno->CurrentValue;
				$this->mrnno->ViewValue = $this->mrnno->CurrentValue;
				$this->mrnno->ViewCustomAttributes = "";
			} else {
				if (!$this->mrnno->Raw)
					$this->mrnno->CurrentValue = HtmlDecode($this->mrnno->CurrentValue);
				$this->mrnno->EditValue = HtmlEncode($this->mrnno->CurrentValue);
				$this->mrnno->PlaceHolder = RemoveHtml($this->mrnno->caption());
			}

			// PatientName
			$this->PatientName->EditAttrs["class"] = "form-control";
			$this->PatientName->EditCustomAttributes = "";
			if (!$this->PatientName->Raw)
				$this->PatientName->CurrentValue = HtmlDecode($this->PatientName->CurrentValue);
			$this->PatientName->EditValue = HtmlEncode($this->PatientName->CurrentValue);
			$this->PatientName->PlaceHolder = RemoveHtml($this->PatientName->caption());

			// Age
			$this->Age->EditAttrs["class"] = "form-control";
			$this->Age->EditCustomAttributes = "";
			if (!$this->Age->Raw)
				$this->Age->CurrentValue = HtmlDecode($this->Age->CurrentValue);
			$this->Age->EditValue = HtmlEncode($this->Age->CurrentValue);
			$this->Age->PlaceHolder = RemoveHtml($this->Age->caption());

			// Gender
			$this->Gender->EditAttrs["class"] = "form-control";
			$this->Gender->EditCustomAttributes = "";
			if (!$this->Gender->Raw)
				$this->Gender->CurrentValue = HtmlDecode($this->Gender->CurrentValue);
			$this->Gender->EditValue = HtmlEncode($this->Gender->CurrentValue);
			$this->Gender->PlaceHolder = RemoveHtml($this->Gender->caption());

			// Unit
			$this->Unit->EditAttrs["class"] = "form-control";
			$this->Unit->EditCustomAttributes = "";
			$this->Unit->EditValue = HtmlEncode($this->Unit->CurrentValue);
			$this->Unit->PlaceHolder = RemoveHtml($this->Unit->caption());

			// Quantity
			$this->Quantity->EditAttrs["class"] = "form-control";
			$this->Quantity->EditCustomAttributes = "";
			$this->Quantity->EditValue = HtmlEncode($this->Quantity->CurrentValue);
			$this->Quantity->PlaceHolder = RemoveHtml($this->Quantity->caption());

			// Discount
			$this->Discount->EditAttrs["class"] = "form-control";
			$this->Discount->EditCustomAttributes = "";
			$this->Discount->EditValue = HtmlEncode($this->Discount->CurrentValue);
			$this->Discount->PlaceHolder = RemoveHtml($this->Discount->caption());
			if (strval($this->Discount->EditValue) != "" && is_numeric($this->Discount->EditValue)) {
				$this->Discount->EditValue = FormatNumber($this->Discount->EditValue, -2, -2, -2, -2);
				$this->Discount->OldValue = $this->Discount->EditValue;
			}
			

			// SubTotal
			$this->SubTotal->EditAttrs["class"] = "form-control";
			$this->SubTotal->EditCustomAttributes = "";
			$this->SubTotal->EditValue = HtmlEncode($this->SubTotal->CurrentValue);
			$this->SubTotal->PlaceHolder = RemoveHtml($this->SubTotal->caption());
			if (strval($this->SubTotal->EditValue) != "" && is_numeric($this->SubTotal->EditValue)) {
				$this->SubTotal->EditValue = FormatNumber($this->SubTotal->EditValue, -2, -2, -2, -2);
				$this->SubTotal->OldValue = $this->SubTotal->EditValue;
			}
			

			// ServiceSelect
			$this->ServiceSelect->EditCustomAttributes = "";
			$this->ServiceSelect->EditValue = $this->ServiceSelect->options(FALSE);

			// Aid
			$this->Aid->EditAttrs["class"] = "form-control";
			$this->Aid->EditCustomAttributes = "";
			$this->Aid->EditValue = HtmlEncode($this->Aid->CurrentValue);
			$this->Aid->PlaceHolder = RemoveHtml($this->Aid->caption());

			// Vid
			$this->Vid->EditAttrs["class"] = "form-control";
			$this->Vid->EditCustomAttributes = "";
			if ($this->Vid->getSessionValue() != "") {
				$this->Vid->CurrentValue = $this->Vid->getSessionValue();
				$this->Vid->OldValue = $this->Vid->CurrentValue;
				$this->Vid->ViewValue = $this->Vid->CurrentValue;
				$this->Vid->ViewValue = FormatNumber($this->Vid->ViewValue, 0, -2, -2, -2);
				$this->Vid->ViewCustomAttributes = "";
			} else {
				$this->Vid->EditValue = HtmlEncode($this->Vid->CurrentValue);
				$this->Vid->PlaceHolder = RemoveHtml($this->Vid->caption());
			}

			// DrID
			$this->DrID->EditAttrs["class"] = "form-control";
			$this->DrID->EditCustomAttributes = "";
			$this->DrID->EditValue = HtmlEncode($this->DrID->CurrentValue);
			$this->DrID->PlaceHolder = RemoveHtml($this->DrID->caption());

			// DrCODE
			$this->DrCODE->EditAttrs["class"] = "form-control";
			$this->DrCODE->EditCustomAttributes = "";
			if (!$this->DrCODE->Raw)
				$this->DrCODE->CurrentValue = HtmlDecode($this->DrCODE->CurrentValue);
			$this->DrCODE->EditValue = HtmlEncode($this->DrCODE->CurrentValue);
			$this->DrCODE->PlaceHolder = RemoveHtml($this->DrCODE->caption());

			// DrName
			$this->DrName->EditAttrs["class"] = "form-control";
			$this->DrName->EditCustomAttributes = "";
			if (!$this->DrName->Raw)
				$this->DrName->CurrentValue = HtmlDecode($this->DrName->CurrentValue);
			$this->DrName->EditValue = HtmlEncode($this->DrName->CurrentValue);
			$this->DrName->PlaceHolder = RemoveHtml($this->DrName->caption());

			// Department
			$this->Department->EditAttrs["class"] = "form-control";
			$this->Department->EditCustomAttributes = "";
			if (!$this->Department->Raw)
				$this->Department->CurrentValue = HtmlDecode($this->Department->CurrentValue);
			$this->Department->EditValue = HtmlEncode($this->Department->CurrentValue);
			$this->Department->PlaceHolder = RemoveHtml($this->Department->caption());

			// DrSharePres
			$this->DrSharePres->EditAttrs["class"] = "form-control";
			$this->DrSharePres->EditCustomAttributes = "";
			$this->DrSharePres->EditValue = HtmlEncode($this->DrSharePres->CurrentValue);
			$this->DrSharePres->PlaceHolder = RemoveHtml($this->DrSharePres->caption());
			if (strval($this->DrSharePres->EditValue) != "" && is_numeric($this->DrSharePres->EditValue)) {
				$this->DrSharePres->EditValue = FormatNumber($this->DrSharePres->EditValue, -2, -2, -2, -2);
				$this->DrSharePres->OldValue = $this->DrSharePres->EditValue;
			}
			

			// HospSharePres
			$this->HospSharePres->EditAttrs["class"] = "form-control";
			$this->HospSharePres->EditCustomAttributes = "";
			$this->HospSharePres->EditValue = HtmlEncode($this->HospSharePres->CurrentValue);
			$this->HospSharePres->PlaceHolder = RemoveHtml($this->HospSharePres->caption());
			if (strval($this->HospSharePres->EditValue) != "" && is_numeric($this->HospSharePres->EditValue)) {
				$this->HospSharePres->EditValue = FormatNumber($this->HospSharePres->EditValue, -2, -2, -2, -2);
				$this->HospSharePres->OldValue = $this->HospSharePres->EditValue;
			}
			

			// DrShareAmount
			$this->DrShareAmount->EditAttrs["class"] = "form-control";
			$this->DrShareAmount->EditCustomAttributes = "";
			$this->DrShareAmount->EditValue = HtmlEncode($this->DrShareAmount->CurrentValue);
			$this->DrShareAmount->PlaceHolder = RemoveHtml($this->DrShareAmount->caption());
			if (strval($this->DrShareAmount->EditValue) != "" && is_numeric($this->DrShareAmount->EditValue)) {
				$this->DrShareAmount->EditValue = FormatNumber($this->DrShareAmount->EditValue, -2, -2, -2, -2);
				$this->DrShareAmount->OldValue = $this->DrShareAmount->EditValue;
			}
			

			// HospShareAmount
			$this->HospShareAmount->EditAttrs["class"] = "form-control";
			$this->HospShareAmount->EditCustomAttributes = "";
			$this->HospShareAmount->EditValue = HtmlEncode($this->HospShareAmount->CurrentValue);
			$this->HospShareAmount->PlaceHolder = RemoveHtml($this->HospShareAmount->caption());
			if (strval($this->HospShareAmount->EditValue) != "" && is_numeric($this->HospShareAmount->EditValue)) {
				$this->HospShareAmount->EditValue = FormatNumber($this->HospShareAmount->EditValue, -2, -2, -2, -2);
				$this->HospShareAmount->OldValue = $this->HospShareAmount->EditValue;
			}
			

			// DrShareSettiledAmount
			$this->DrShareSettiledAmount->EditAttrs["class"] = "form-control";
			$this->DrShareSettiledAmount->EditCustomAttributes = "";
			$this->DrShareSettiledAmount->EditValue = HtmlEncode($this->DrShareSettiledAmount->CurrentValue);
			$this->DrShareSettiledAmount->PlaceHolder = RemoveHtml($this->DrShareSettiledAmount->caption());
			if (strval($this->DrShareSettiledAmount->EditValue) != "" && is_numeric($this->DrShareSettiledAmount->EditValue)) {
				$this->DrShareSettiledAmount->EditValue = FormatNumber($this->DrShareSettiledAmount->EditValue, -2, -2, -2, -2);
				$this->DrShareSettiledAmount->OldValue = $this->DrShareSettiledAmount->EditValue;
			}
			

			// DrShareSettledId
			$this->DrShareSettledId->EditAttrs["class"] = "form-control";
			$this->DrShareSettledId->EditCustomAttributes = "";
			$this->DrShareSettledId->EditValue = HtmlEncode($this->DrShareSettledId->CurrentValue);
			$this->DrShareSettledId->PlaceHolder = RemoveHtml($this->DrShareSettledId->caption());

			// DrShareSettiledStatus
			$this->DrShareSettiledStatus->EditAttrs["class"] = "form-control";
			$this->DrShareSettiledStatus->EditCustomAttributes = "";
			$this->DrShareSettiledStatus->EditValue = HtmlEncode($this->DrShareSettiledStatus->CurrentValue);
			$this->DrShareSettiledStatus->PlaceHolder = RemoveHtml($this->DrShareSettiledStatus->caption());

			// invoiceId
			$this->invoiceId->EditAttrs["class"] = "form-control";
			$this->invoiceId->EditCustomAttributes = "";
			$this->invoiceId->EditValue = HtmlEncode($this->invoiceId->CurrentValue);
			$this->invoiceId->PlaceHolder = RemoveHtml($this->invoiceId->caption());

			// invoiceAmount
			$this->invoiceAmount->EditAttrs["class"] = "form-control";
			$this->invoiceAmount->EditCustomAttributes = "";
			$this->invoiceAmount->EditValue = HtmlEncode($this->invoiceAmount->CurrentValue);
			$this->invoiceAmount->PlaceHolder = RemoveHtml($this->invoiceAmount->caption());
			if (strval($this->invoiceAmount->EditValue) != "" && is_numeric($this->invoiceAmount->EditValue)) {
				$this->invoiceAmount->EditValue = FormatNumber($this->invoiceAmount->EditValue, -2, -2, -2, -2);
				$this->invoiceAmount->OldValue = $this->invoiceAmount->EditValue;
			}
			

			// invoiceStatus
			$this->invoiceStatus->EditAttrs["class"] = "form-control";
			$this->invoiceStatus->EditCustomAttributes = "";
			if (!$this->invoiceStatus->Raw)
				$this->invoiceStatus->CurrentValue = HtmlDecode($this->invoiceStatus->CurrentValue);
			$this->invoiceStatus->EditValue = HtmlEncode($this->invoiceStatus->CurrentValue);
			$this->invoiceStatus->PlaceHolder = RemoveHtml($this->invoiceStatus->caption());

			// modeOfPayment
			$this->modeOfPayment->EditAttrs["class"] = "form-control";
			$this->modeOfPayment->EditCustomAttributes = "";
			if (!$this->modeOfPayment->Raw)
				$this->modeOfPayment->CurrentValue = HtmlDecode($this->modeOfPayment->CurrentValue);
			$this->modeOfPayment->EditValue = HtmlEncode($this->modeOfPayment->CurrentValue);
			$this->modeOfPayment->PlaceHolder = RemoveHtml($this->modeOfPayment->caption());

			// HospID
			// RIDNO

			$this->RIDNO->EditAttrs["class"] = "form-control";
			$this->RIDNO->EditCustomAttributes = "";
			$this->RIDNO->EditValue = HtmlEncode($this->RIDNO->CurrentValue);
			$this->RIDNO->PlaceHolder = RemoveHtml($this->RIDNO->caption());

			// TidNo
			$this->TidNo->EditAttrs["class"] = "form-control";
			$this->TidNo->EditCustomAttributes = "";
			$this->TidNo->EditValue = HtmlEncode($this->TidNo->CurrentValue);
			$this->TidNo->PlaceHolder = RemoveHtml($this->TidNo->caption());

			// DiscountCategory
			$this->DiscountCategory->EditAttrs["class"] = "form-control";
			$this->DiscountCategory->EditCustomAttributes = "";
			if (!$this->DiscountCategory->Raw)
				$this->DiscountCategory->CurrentValue = HtmlDecode($this->DiscountCategory->CurrentValue);
			$this->DiscountCategory->EditValue = HtmlEncode($this->DiscountCategory->CurrentValue);
			$this->DiscountCategory->PlaceHolder = RemoveHtml($this->DiscountCategory->caption());

			// sid
			$this->sid->EditAttrs["class"] = "form-control";
			$this->sid->EditCustomAttributes = "";
			$this->sid->EditValue = HtmlEncode($this->sid->CurrentValue);
			$this->sid->PlaceHolder = RemoveHtml($this->sid->caption());

			// ItemCode
			$this->ItemCode->EditAttrs["class"] = "form-control";
			$this->ItemCode->EditCustomAttributes = "";
			if (!$this->ItemCode->Raw)
				$this->ItemCode->CurrentValue = HtmlDecode($this->ItemCode->CurrentValue);
			$this->ItemCode->EditValue = HtmlEncode($this->ItemCode->CurrentValue);
			$this->ItemCode->PlaceHolder = RemoveHtml($this->ItemCode->caption());

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

			// Comments
			$this->Comments->EditAttrs["class"] = "form-control";
			$this->Comments->EditCustomAttributes = "";
			if (!$this->Comments->Raw)
				$this->Comments->CurrentValue = HtmlDecode($this->Comments->CurrentValue);
			$this->Comments->EditValue = HtmlEncode($this->Comments->CurrentValue);
			$this->Comments->PlaceHolder = RemoveHtml($this->Comments->caption());

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

			// Abnormal
			$this->Abnormal->EditAttrs["class"] = "form-control";
			$this->Abnormal->EditCustomAttributes = "";
			if (!$this->Abnormal->Raw)
				$this->Abnormal->CurrentValue = HtmlDecode($this->Abnormal->CurrentValue);
			$this->Abnormal->EditValue = HtmlEncode($this->Abnormal->CurrentValue);
			$this->Abnormal->PlaceHolder = RemoveHtml($this->Abnormal->caption());

			// TestUnit
			$this->TestUnit->EditAttrs["class"] = "form-control";
			$this->TestUnit->EditCustomAttributes = "";
			if (!$this->TestUnit->Raw)
				$this->TestUnit->CurrentValue = HtmlDecode($this->TestUnit->CurrentValue);
			$this->TestUnit->EditValue = HtmlEncode($this->TestUnit->CurrentValue);
			$this->TestUnit->PlaceHolder = RemoveHtml($this->TestUnit->caption());

			// LOWHIGH
			$this->LOWHIGH->EditAttrs["class"] = "form-control";
			$this->LOWHIGH->EditCustomAttributes = "";
			if (!$this->LOWHIGH->Raw)
				$this->LOWHIGH->CurrentValue = HtmlDecode($this->LOWHIGH->CurrentValue);
			$this->LOWHIGH->EditValue = HtmlEncode($this->LOWHIGH->CurrentValue);
			$this->LOWHIGH->PlaceHolder = RemoveHtml($this->LOWHIGH->caption());

			// Branch
			$this->Branch->EditAttrs["class"] = "form-control";
			$this->Branch->EditCustomAttributes = "";
			if (!$this->Branch->Raw)
				$this->Branch->CurrentValue = HtmlDecode($this->Branch->CurrentValue);
			$this->Branch->EditValue = HtmlEncode($this->Branch->CurrentValue);
			$this->Branch->PlaceHolder = RemoveHtml($this->Branch->caption());

			// Dispatch
			$this->Dispatch->EditAttrs["class"] = "form-control";
			$this->Dispatch->EditCustomAttributes = "";
			if (!$this->Dispatch->Raw)
				$this->Dispatch->CurrentValue = HtmlDecode($this->Dispatch->CurrentValue);
			$this->Dispatch->EditValue = HtmlEncode($this->Dispatch->CurrentValue);
			$this->Dispatch->PlaceHolder = RemoveHtml($this->Dispatch->caption());

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

			// Printed
			$this->Printed->EditAttrs["class"] = "form-control";
			$this->Printed->EditCustomAttributes = "";
			if (!$this->Printed->Raw)
				$this->Printed->CurrentValue = HtmlDecode($this->Printed->CurrentValue);
			$this->Printed->EditValue = HtmlEncode($this->Printed->CurrentValue);
			$this->Printed->PlaceHolder = RemoveHtml($this->Printed->caption());

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

			// BillingDate
			$this->BillingDate->EditAttrs["class"] = "form-control";
			$this->BillingDate->EditCustomAttributes = "";
			$this->BillingDate->EditValue = HtmlEncode(FormatDateTime($this->BillingDate->CurrentValue, 8));
			$this->BillingDate->PlaceHolder = RemoveHtml($this->BillingDate->caption());

			// BilledBy
			$this->BilledBy->EditAttrs["class"] = "form-control";
			$this->BilledBy->EditCustomAttributes = "";
			if (!$this->BilledBy->Raw)
				$this->BilledBy->CurrentValue = HtmlDecode($this->BilledBy->CurrentValue);
			$this->BilledBy->EditValue = HtmlEncode($this->BilledBy->CurrentValue);
			$this->BilledBy->PlaceHolder = RemoveHtml($this->BilledBy->caption());

			// Resulted
			$this->Resulted->EditAttrs["class"] = "form-control";
			$this->Resulted->EditCustomAttributes = "";
			if (!$this->Resulted->Raw)
				$this->Resulted->CurrentValue = HtmlDecode($this->Resulted->CurrentValue);
			$this->Resulted->EditValue = HtmlEncode($this->Resulted->CurrentValue);
			$this->Resulted->PlaceHolder = RemoveHtml($this->Resulted->caption());

			// ResultDate
			$this->ResultDate->EditAttrs["class"] = "form-control";
			$this->ResultDate->EditCustomAttributes = "";
			$this->ResultDate->EditValue = HtmlEncode(FormatDateTime($this->ResultDate->CurrentValue, 8));
			$this->ResultDate->PlaceHolder = RemoveHtml($this->ResultDate->caption());

			// ResultedBy
			$this->ResultedBy->EditAttrs["class"] = "form-control";
			$this->ResultedBy->EditCustomAttributes = "";
			if (!$this->ResultedBy->Raw)
				$this->ResultedBy->CurrentValue = HtmlDecode($this->ResultedBy->CurrentValue);
			$this->ResultedBy->EditValue = HtmlEncode($this->ResultedBy->CurrentValue);
			$this->ResultedBy->PlaceHolder = RemoveHtml($this->ResultedBy->caption());

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

			// Sampled
			$this->Sampled->EditAttrs["class"] = "form-control";
			$this->Sampled->EditCustomAttributes = "";
			if (!$this->Sampled->Raw)
				$this->Sampled->CurrentValue = HtmlDecode($this->Sampled->CurrentValue);
			$this->Sampled->EditValue = HtmlEncode($this->Sampled->CurrentValue);
			$this->Sampled->PlaceHolder = RemoveHtml($this->Sampled->caption());

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

			// Recevied
			$this->Recevied->EditAttrs["class"] = "form-control";
			$this->Recevied->EditCustomAttributes = "";
			if (!$this->Recevied->Raw)
				$this->Recevied->CurrentValue = HtmlDecode($this->Recevied->CurrentValue);
			$this->Recevied->EditValue = HtmlEncode($this->Recevied->CurrentValue);
			$this->Recevied->PlaceHolder = RemoveHtml($this->Recevied->caption());

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

			// DeptRecived
			$this->DeptRecived->EditAttrs["class"] = "form-control";
			$this->DeptRecived->EditCustomAttributes = "";
			if (!$this->DeptRecived->Raw)
				$this->DeptRecived->CurrentValue = HtmlDecode($this->DeptRecived->CurrentValue);
			$this->DeptRecived->EditValue = HtmlEncode($this->DeptRecived->CurrentValue);
			$this->DeptRecived->PlaceHolder = RemoveHtml($this->DeptRecived->caption());

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

			// SAuthendicate
			$this->SAuthendicate->EditAttrs["class"] = "form-control";
			$this->SAuthendicate->EditCustomAttributes = "";
			if (!$this->SAuthendicate->Raw)
				$this->SAuthendicate->CurrentValue = HtmlDecode($this->SAuthendicate->CurrentValue);
			$this->SAuthendicate->EditValue = HtmlEncode($this->SAuthendicate->CurrentValue);
			$this->SAuthendicate->PlaceHolder = RemoveHtml($this->SAuthendicate->caption());

			// AuthDate
			$this->AuthDate->EditAttrs["class"] = "form-control";
			$this->AuthDate->EditCustomAttributes = "";
			$this->AuthDate->EditValue = HtmlEncode(FormatDateTime($this->AuthDate->CurrentValue, 8));
			$this->AuthDate->PlaceHolder = RemoveHtml($this->AuthDate->caption());

			// AuthBy
			$this->AuthBy->EditAttrs["class"] = "form-control";
			$this->AuthBy->EditCustomAttributes = "";
			if (!$this->AuthBy->Raw)
				$this->AuthBy->CurrentValue = HtmlDecode($this->AuthBy->CurrentValue);
			$this->AuthBy->EditValue = HtmlEncode($this->AuthBy->CurrentValue);
			$this->AuthBy->PlaceHolder = RemoveHtml($this->AuthBy->caption());

			// Authencate
			$this->Authencate->EditAttrs["class"] = "form-control";
			$this->Authencate->EditCustomAttributes = "";
			if (!$this->Authencate->Raw)
				$this->Authencate->CurrentValue = HtmlDecode($this->Authencate->CurrentValue);
			$this->Authencate->EditValue = HtmlEncode($this->Authencate->CurrentValue);
			$this->Authencate->PlaceHolder = RemoveHtml($this->Authencate->caption());

			// EditDate
			$this->EditDate->EditAttrs["class"] = "form-control";
			$this->EditDate->EditCustomAttributes = "";
			$this->EditDate->EditValue = HtmlEncode(FormatDateTime($this->EditDate->CurrentValue, 8));
			$this->EditDate->PlaceHolder = RemoveHtml($this->EditDate->caption());

			// EditBy
			$this->EditBy->EditAttrs["class"] = "form-control";
			$this->EditBy->EditCustomAttributes = "";
			if (!$this->EditBy->Raw)
				$this->EditBy->CurrentValue = HtmlDecode($this->EditBy->CurrentValue);
			$this->EditBy->EditValue = HtmlEncode($this->EditBy->CurrentValue);
			$this->EditBy->PlaceHolder = RemoveHtml($this->EditBy->caption());

			// Editted
			$this->Editted->EditAttrs["class"] = "form-control";
			$this->Editted->EditCustomAttributes = "";
			if (!$this->Editted->Raw)
				$this->Editted->CurrentValue = HtmlDecode($this->Editted->CurrentValue);
			$this->Editted->EditValue = HtmlEncode($this->Editted->CurrentValue);
			$this->Editted->PlaceHolder = RemoveHtml($this->Editted->caption());

			// PatID
			$this->PatID->EditAttrs["class"] = "form-control";
			$this->PatID->EditCustomAttributes = "";
			if ($this->PatID->getSessionValue() != "") {
				$this->PatID->CurrentValue = $this->PatID->getSessionValue();
				$this->PatID->OldValue = $this->PatID->CurrentValue;
				$this->PatID->ViewValue = $this->PatID->CurrentValue;
				$this->PatID->ViewValue = FormatNumber($this->PatID->ViewValue, 0, -2, -2, -2);
				$this->PatID->ViewCustomAttributes = "";
			} else {
				$this->PatID->EditValue = HtmlEncode($this->PatID->CurrentValue);
				$this->PatID->PlaceHolder = RemoveHtml($this->PatID->caption());
			}

			// PatientId
			$this->PatientId->EditAttrs["class"] = "form-control";
			$this->PatientId->EditCustomAttributes = "";
			if (!$this->PatientId->Raw)
				$this->PatientId->CurrentValue = HtmlDecode($this->PatientId->CurrentValue);
			$this->PatientId->EditValue = HtmlEncode($this->PatientId->CurrentValue);
			$this->PatientId->PlaceHolder = RemoveHtml($this->PatientId->caption());

			// Mobile
			$this->Mobile->EditAttrs["class"] = "form-control";
			$this->Mobile->EditCustomAttributes = "";
			if (!$this->Mobile->Raw)
				$this->Mobile->CurrentValue = HtmlDecode($this->Mobile->CurrentValue);
			$this->Mobile->EditValue = HtmlEncode($this->Mobile->CurrentValue);
			$this->Mobile->PlaceHolder = RemoveHtml($this->Mobile->caption());

			// CId
			$this->CId->EditAttrs["class"] = "form-control";
			$this->CId->EditCustomAttributes = "";
			$this->CId->EditValue = HtmlEncode($this->CId->CurrentValue);
			$this->CId->PlaceHolder = RemoveHtml($this->CId->caption());

			// Order
			$this->Order->EditAttrs["class"] = "form-control";
			$this->Order->EditCustomAttributes = "";
			$this->Order->EditValue = HtmlEncode($this->Order->CurrentValue);
			$this->Order->PlaceHolder = RemoveHtml($this->Order->caption());
			if (strval($this->Order->EditValue) != "" && is_numeric($this->Order->EditValue)) {
				$this->Order->EditValue = FormatNumber($this->Order->EditValue, -2, -2, -2, -2);
				$this->Order->OldValue = $this->Order->EditValue;
			}
			

			// ResType
			$this->ResType->EditAttrs["class"] = "form-control";
			$this->ResType->EditCustomAttributes = "";
			if (!$this->ResType->Raw)
				$this->ResType->CurrentValue = HtmlDecode($this->ResType->CurrentValue);
			$this->ResType->EditValue = HtmlEncode($this->ResType->CurrentValue);
			$this->ResType->PlaceHolder = RemoveHtml($this->ResType->caption());

			// Sample
			$this->Sample->EditAttrs["class"] = "form-control";
			$this->Sample->EditCustomAttributes = "";
			if (!$this->Sample->Raw)
				$this->Sample->CurrentValue = HtmlDecode($this->Sample->CurrentValue);
			$this->Sample->EditValue = HtmlEncode($this->Sample->CurrentValue);
			$this->Sample->PlaceHolder = RemoveHtml($this->Sample->caption());

			// NoD
			$this->NoD->EditAttrs["class"] = "form-control";
			$this->NoD->EditCustomAttributes = "";
			$this->NoD->EditValue = HtmlEncode($this->NoD->CurrentValue);
			$this->NoD->PlaceHolder = RemoveHtml($this->NoD->caption());
			if (strval($this->NoD->EditValue) != "" && is_numeric($this->NoD->EditValue)) {
				$this->NoD->EditValue = FormatNumber($this->NoD->EditValue, -2, -2, -2, -2);
				$this->NoD->OldValue = $this->NoD->EditValue;
			}
			

			// BillOrder
			$this->BillOrder->EditAttrs["class"] = "form-control";
			$this->BillOrder->EditCustomAttributes = "";
			$this->BillOrder->EditValue = HtmlEncode($this->BillOrder->CurrentValue);
			$this->BillOrder->PlaceHolder = RemoveHtml($this->BillOrder->caption());
			if (strval($this->BillOrder->EditValue) != "" && is_numeric($this->BillOrder->EditValue)) {
				$this->BillOrder->EditValue = FormatNumber($this->BillOrder->EditValue, -2, -2, -2, -2);
				$this->BillOrder->OldValue = $this->BillOrder->EditValue;
			}
			

			// Inactive
			$this->Inactive->EditAttrs["class"] = "form-control";
			$this->Inactive->EditCustomAttributes = "";
			if (!$this->Inactive->Raw)
				$this->Inactive->CurrentValue = HtmlDecode($this->Inactive->CurrentValue);
			$this->Inactive->EditValue = HtmlEncode($this->Inactive->CurrentValue);
			$this->Inactive->PlaceHolder = RemoveHtml($this->Inactive->caption());

			// CollSample
			$this->CollSample->EditAttrs["class"] = "form-control";
			$this->CollSample->EditCustomAttributes = "";
			if (!$this->CollSample->Raw)
				$this->CollSample->CurrentValue = HtmlDecode($this->CollSample->CurrentValue);
			$this->CollSample->EditValue = HtmlEncode($this->CollSample->CurrentValue);
			$this->CollSample->PlaceHolder = RemoveHtml($this->CollSample->caption());

			// TestType
			$this->TestType->EditAttrs["class"] = "form-control";
			$this->TestType->EditCustomAttributes = "";
			if (!$this->TestType->Raw)
				$this->TestType->CurrentValue = HtmlDecode($this->TestType->CurrentValue);
			$this->TestType->EditValue = HtmlEncode($this->TestType->CurrentValue);
			$this->TestType->PlaceHolder = RemoveHtml($this->TestType->caption());

			// Repeated
			$this->Repeated->EditAttrs["class"] = "form-control";
			$this->Repeated->EditCustomAttributes = "";
			if (!$this->Repeated->Raw)
				$this->Repeated->CurrentValue = HtmlDecode($this->Repeated->CurrentValue);
			$this->Repeated->EditValue = HtmlEncode($this->Repeated->CurrentValue);
			$this->Repeated->PlaceHolder = RemoveHtml($this->Repeated->caption());

			// RepeatedBy
			$this->RepeatedBy->EditAttrs["class"] = "form-control";
			$this->RepeatedBy->EditCustomAttributes = "";
			if (!$this->RepeatedBy->Raw)
				$this->RepeatedBy->CurrentValue = HtmlDecode($this->RepeatedBy->CurrentValue);
			$this->RepeatedBy->EditValue = HtmlEncode($this->RepeatedBy->CurrentValue);
			$this->RepeatedBy->PlaceHolder = RemoveHtml($this->RepeatedBy->caption());

			// RepeatedDate
			$this->RepeatedDate->EditAttrs["class"] = "form-control";
			$this->RepeatedDate->EditCustomAttributes = "";
			$this->RepeatedDate->EditValue = HtmlEncode(FormatDateTime($this->RepeatedDate->CurrentValue, 8));
			$this->RepeatedDate->PlaceHolder = RemoveHtml($this->RepeatedDate->caption());

			// serviceID
			$this->serviceID->EditAttrs["class"] = "form-control";
			$this->serviceID->EditCustomAttributes = "";
			$this->serviceID->EditValue = HtmlEncode($this->serviceID->CurrentValue);
			$this->serviceID->PlaceHolder = RemoveHtml($this->serviceID->caption());

			// Service_Type
			$this->Service_Type->EditAttrs["class"] = "form-control";
			$this->Service_Type->EditCustomAttributes = "";
			if (!$this->Service_Type->Raw)
				$this->Service_Type->CurrentValue = HtmlDecode($this->Service_Type->CurrentValue);
			$this->Service_Type->EditValue = HtmlEncode($this->Service_Type->CurrentValue);
			$this->Service_Type->PlaceHolder = RemoveHtml($this->Service_Type->caption());

			// Service_Department
			$this->Service_Department->EditAttrs["class"] = "form-control";
			$this->Service_Department->EditCustomAttributes = "";
			if (!$this->Service_Department->Raw)
				$this->Service_Department->CurrentValue = HtmlDecode($this->Service_Department->CurrentValue);
			$this->Service_Department->EditValue = HtmlEncode($this->Service_Department->CurrentValue);
			$this->Service_Department->PlaceHolder = RemoveHtml($this->Service_Department->caption());

			// RequestNo
			$this->RequestNo->EditAttrs["class"] = "form-control";
			$this->RequestNo->EditCustomAttributes = "";
			$this->RequestNo->EditValue = HtmlEncode($this->RequestNo->CurrentValue);
			$this->RequestNo->PlaceHolder = RemoveHtml($this->RequestNo->caption());

			// Add refer script
			// id

			$this->id->LinkCustomAttributes = "";
			$this->id->HrefValue = "";

			// Reception
			$this->Reception->LinkCustomAttributes = "";
			$this->Reception->HrefValue = "";

			// Services
			$this->Services->LinkCustomAttributes = "";
			$this->Services->HrefValue = "";

			// amount
			$this->amount->LinkCustomAttributes = "";
			$this->amount->HrefValue = "";

			// description
			$this->description->LinkCustomAttributes = "";
			$this->description->HrefValue = "";

			// patient_type
			$this->patient_type->LinkCustomAttributes = "";
			$this->patient_type->HrefValue = "";

			// charged_date
			$this->charged_date->LinkCustomAttributes = "";
			$this->charged_date->HrefValue = "";

			// status
			$this->status->LinkCustomAttributes = "";
			$this->status->HrefValue = "";

			// mrnno
			$this->mrnno->LinkCustomAttributes = "";
			$this->mrnno->HrefValue = "";

			// PatientName
			$this->PatientName->LinkCustomAttributes = "";
			$this->PatientName->HrefValue = "";

			// Age
			$this->Age->LinkCustomAttributes = "";
			$this->Age->HrefValue = "";

			// Gender
			$this->Gender->LinkCustomAttributes = "";
			$this->Gender->HrefValue = "";

			// Unit
			$this->Unit->LinkCustomAttributes = "";
			$this->Unit->HrefValue = "";

			// Quantity
			$this->Quantity->LinkCustomAttributes = "";
			$this->Quantity->HrefValue = "";

			// Discount
			$this->Discount->LinkCustomAttributes = "";
			$this->Discount->HrefValue = "";

			// SubTotal
			$this->SubTotal->LinkCustomAttributes = "";
			$this->SubTotal->HrefValue = "";

			// ServiceSelect
			$this->ServiceSelect->LinkCustomAttributes = "";
			$this->ServiceSelect->HrefValue = "";

			// Aid
			$this->Aid->LinkCustomAttributes = "";
			$this->Aid->HrefValue = "";

			// Vid
			$this->Vid->LinkCustomAttributes = "";
			$this->Vid->HrefValue = "";

			// DrID
			$this->DrID->LinkCustomAttributes = "";
			$this->DrID->HrefValue = "";

			// DrCODE
			$this->DrCODE->LinkCustomAttributes = "";
			$this->DrCODE->HrefValue = "";

			// DrName
			$this->DrName->LinkCustomAttributes = "";
			$this->DrName->HrefValue = "";

			// Department
			$this->Department->LinkCustomAttributes = "";
			$this->Department->HrefValue = "";

			// DrSharePres
			$this->DrSharePres->LinkCustomAttributes = "";
			$this->DrSharePres->HrefValue = "";

			// HospSharePres
			$this->HospSharePres->LinkCustomAttributes = "";
			$this->HospSharePres->HrefValue = "";

			// DrShareAmount
			$this->DrShareAmount->LinkCustomAttributes = "";
			$this->DrShareAmount->HrefValue = "";

			// HospShareAmount
			$this->HospShareAmount->LinkCustomAttributes = "";
			$this->HospShareAmount->HrefValue = "";

			// DrShareSettiledAmount
			$this->DrShareSettiledAmount->LinkCustomAttributes = "";
			$this->DrShareSettiledAmount->HrefValue = "";

			// DrShareSettledId
			$this->DrShareSettledId->LinkCustomAttributes = "";
			$this->DrShareSettledId->HrefValue = "";

			// DrShareSettiledStatus
			$this->DrShareSettiledStatus->LinkCustomAttributes = "";
			$this->DrShareSettiledStatus->HrefValue = "";

			// invoiceId
			$this->invoiceId->LinkCustomAttributes = "";
			$this->invoiceId->HrefValue = "";

			// invoiceAmount
			$this->invoiceAmount->LinkCustomAttributes = "";
			$this->invoiceAmount->HrefValue = "";

			// invoiceStatus
			$this->invoiceStatus->LinkCustomAttributes = "";
			$this->invoiceStatus->HrefValue = "";

			// modeOfPayment
			$this->modeOfPayment->LinkCustomAttributes = "";
			$this->modeOfPayment->HrefValue = "";

			// HospID
			$this->HospID->LinkCustomAttributes = "";
			$this->HospID->HrefValue = "";

			// RIDNO
			$this->RIDNO->LinkCustomAttributes = "";
			$this->RIDNO->HrefValue = "";

			// TidNo
			$this->TidNo->LinkCustomAttributes = "";
			$this->TidNo->HrefValue = "";

			// DiscountCategory
			$this->DiscountCategory->LinkCustomAttributes = "";
			$this->DiscountCategory->HrefValue = "";

			// sid
			$this->sid->LinkCustomAttributes = "";
			$this->sid->HrefValue = "";

			// ItemCode
			$this->ItemCode->LinkCustomAttributes = "";
			$this->ItemCode->HrefValue = "";

			// TestSubCd
			$this->TestSubCd->LinkCustomAttributes = "";
			$this->TestSubCd->HrefValue = "";

			// DEptCd
			$this->DEptCd->LinkCustomAttributes = "";
			$this->DEptCd->HrefValue = "";

			// ProfCd
			$this->ProfCd->LinkCustomAttributes = "";
			$this->ProfCd->HrefValue = "";

			// Comments
			$this->Comments->LinkCustomAttributes = "";
			$this->Comments->HrefValue = "";

			// Method
			$this->Method->LinkCustomAttributes = "";
			$this->Method->HrefValue = "";

			// Specimen
			$this->Specimen->LinkCustomAttributes = "";
			$this->Specimen->HrefValue = "";

			// Abnormal
			$this->Abnormal->LinkCustomAttributes = "";
			$this->Abnormal->HrefValue = "";

			// TestUnit
			$this->TestUnit->LinkCustomAttributes = "";
			$this->TestUnit->HrefValue = "";

			// LOWHIGH
			$this->LOWHIGH->LinkCustomAttributes = "";
			$this->LOWHIGH->HrefValue = "";

			// Branch
			$this->Branch->LinkCustomAttributes = "";
			$this->Branch->HrefValue = "";

			// Dispatch
			$this->Dispatch->LinkCustomAttributes = "";
			$this->Dispatch->HrefValue = "";

			// Pic1
			$this->Pic1->LinkCustomAttributes = "";
			$this->Pic1->HrefValue = "";

			// Pic2
			$this->Pic2->LinkCustomAttributes = "";
			$this->Pic2->HrefValue = "";

			// GraphPath
			$this->GraphPath->LinkCustomAttributes = "";
			$this->GraphPath->HrefValue = "";

			// MachineCD
			$this->MachineCD->LinkCustomAttributes = "";
			$this->MachineCD->HrefValue = "";

			// TestCancel
			$this->TestCancel->LinkCustomAttributes = "";
			$this->TestCancel->HrefValue = "";

			// OutSource
			$this->OutSource->LinkCustomAttributes = "";
			$this->OutSource->HrefValue = "";

			// Printed
			$this->Printed->LinkCustomAttributes = "";
			$this->Printed->HrefValue = "";

			// PrintBy
			$this->PrintBy->LinkCustomAttributes = "";
			$this->PrintBy->HrefValue = "";

			// PrintDate
			$this->PrintDate->LinkCustomAttributes = "";
			$this->PrintDate->HrefValue = "";

			// BillingDate
			$this->BillingDate->LinkCustomAttributes = "";
			$this->BillingDate->HrefValue = "";

			// BilledBy
			$this->BilledBy->LinkCustomAttributes = "";
			$this->BilledBy->HrefValue = "";

			// Resulted
			$this->Resulted->LinkCustomAttributes = "";
			$this->Resulted->HrefValue = "";

			// ResultDate
			$this->ResultDate->LinkCustomAttributes = "";
			$this->ResultDate->HrefValue = "";

			// ResultedBy
			$this->ResultedBy->LinkCustomAttributes = "";
			$this->ResultedBy->HrefValue = "";

			// SampleDate
			$this->SampleDate->LinkCustomAttributes = "";
			$this->SampleDate->HrefValue = "";

			// SampleUser
			$this->SampleUser->LinkCustomAttributes = "";
			$this->SampleUser->HrefValue = "";

			// Sampled
			$this->Sampled->LinkCustomAttributes = "";
			$this->Sampled->HrefValue = "";

			// ReceivedDate
			$this->ReceivedDate->LinkCustomAttributes = "";
			$this->ReceivedDate->HrefValue = "";

			// ReceivedUser
			$this->ReceivedUser->LinkCustomAttributes = "";
			$this->ReceivedUser->HrefValue = "";

			// Recevied
			$this->Recevied->LinkCustomAttributes = "";
			$this->Recevied->HrefValue = "";

			// DeptRecvDate
			$this->DeptRecvDate->LinkCustomAttributes = "";
			$this->DeptRecvDate->HrefValue = "";

			// DeptRecvUser
			$this->DeptRecvUser->LinkCustomAttributes = "";
			$this->DeptRecvUser->HrefValue = "";

			// DeptRecived
			$this->DeptRecived->LinkCustomAttributes = "";
			$this->DeptRecived->HrefValue = "";

			// SAuthDate
			$this->SAuthDate->LinkCustomAttributes = "";
			$this->SAuthDate->HrefValue = "";

			// SAuthBy
			$this->SAuthBy->LinkCustomAttributes = "";
			$this->SAuthBy->HrefValue = "";

			// SAuthendicate
			$this->SAuthendicate->LinkCustomAttributes = "";
			$this->SAuthendicate->HrefValue = "";

			// AuthDate
			$this->AuthDate->LinkCustomAttributes = "";
			$this->AuthDate->HrefValue = "";

			// AuthBy
			$this->AuthBy->LinkCustomAttributes = "";
			$this->AuthBy->HrefValue = "";

			// Authencate
			$this->Authencate->LinkCustomAttributes = "";
			$this->Authencate->HrefValue = "";

			// EditDate
			$this->EditDate->LinkCustomAttributes = "";
			$this->EditDate->HrefValue = "";

			// EditBy
			$this->EditBy->LinkCustomAttributes = "";
			$this->EditBy->HrefValue = "";

			// Editted
			$this->Editted->LinkCustomAttributes = "";
			$this->Editted->HrefValue = "";

			// PatID
			$this->PatID->LinkCustomAttributes = "";
			$this->PatID->HrefValue = "";

			// PatientId
			$this->PatientId->LinkCustomAttributes = "";
			$this->PatientId->HrefValue = "";

			// Mobile
			$this->Mobile->LinkCustomAttributes = "";
			$this->Mobile->HrefValue = "";

			// CId
			$this->CId->LinkCustomAttributes = "";
			$this->CId->HrefValue = "";

			// Order
			$this->Order->LinkCustomAttributes = "";
			$this->Order->HrefValue = "";

			// ResType
			$this->ResType->LinkCustomAttributes = "";
			$this->ResType->HrefValue = "";

			// Sample
			$this->Sample->LinkCustomAttributes = "";
			$this->Sample->HrefValue = "";

			// NoD
			$this->NoD->LinkCustomAttributes = "";
			$this->NoD->HrefValue = "";

			// BillOrder
			$this->BillOrder->LinkCustomAttributes = "";
			$this->BillOrder->HrefValue = "";

			// Inactive
			$this->Inactive->LinkCustomAttributes = "";
			$this->Inactive->HrefValue = "";

			// CollSample
			$this->CollSample->LinkCustomAttributes = "";
			$this->CollSample->HrefValue = "";

			// TestType
			$this->TestType->LinkCustomAttributes = "";
			$this->TestType->HrefValue = "";

			// Repeated
			$this->Repeated->LinkCustomAttributes = "";
			$this->Repeated->HrefValue = "";

			// RepeatedBy
			$this->RepeatedBy->LinkCustomAttributes = "";
			$this->RepeatedBy->HrefValue = "";

			// RepeatedDate
			$this->RepeatedDate->LinkCustomAttributes = "";
			$this->RepeatedDate->HrefValue = "";

			// serviceID
			$this->serviceID->LinkCustomAttributes = "";
			$this->serviceID->HrefValue = "";

			// Service_Type
			$this->Service_Type->LinkCustomAttributes = "";
			$this->Service_Type->HrefValue = "";

			// Service_Department
			$this->Service_Department->LinkCustomAttributes = "";
			$this->Service_Department->HrefValue = "";

			// RequestNo
			$this->RequestNo->LinkCustomAttributes = "";
			$this->RequestNo->HrefValue = "";
		} elseif ($this->RowType == ROWTYPE_EDIT) { // Edit row

			// id
			$this->id->EditAttrs["class"] = "form-control";
			$this->id->EditCustomAttributes = "";
			$this->id->EditValue = $this->id->CurrentValue;
			$this->id->ViewCustomAttributes = "";

			// Reception
			$this->Reception->EditAttrs["class"] = "form-control";
			$this->Reception->EditCustomAttributes = "";
			$this->Reception->EditValue = $this->Reception->CurrentValue;
			$this->Reception->EditValue = FormatNumber($this->Reception->EditValue, 0, -2, -2, -2);
			$this->Reception->ViewCustomAttributes = "";

			// Services
			$this->Services->EditAttrs["class"] = "form-control";
			$this->Services->EditCustomAttributes = "";
			if (!$this->Services->Raw)
				$this->Services->CurrentValue = HtmlDecode($this->Services->CurrentValue);
			$this->Services->EditValue = HtmlEncode($this->Services->CurrentValue);
			$curVal = strval($this->Services->CurrentValue);
			if ($curVal != "") {
				$this->Services->EditValue = $this->Services->lookupCacheOption($curVal);
				if ($this->Services->EditValue === NULL) { // Lookup from database
					$filterWrk = "`SERVICE`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$lookupFilter = function() {
						return "`Inactive` != 'Y'";
					};
					$lookupFilter = $lookupFilter->bindTo($this);
					$sqlWrk = $this->Services->Lookup->getSql(FALSE, $filterWrk, $lookupFilter, $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = HtmlEncode($rswrk->fields('df'));
						$this->Services->EditValue = $this->Services->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->Services->EditValue = HtmlEncode($this->Services->CurrentValue);
					}
				}
			} else {
				$this->Services->EditValue = NULL;
			}
			$this->Services->PlaceHolder = RemoveHtml($this->Services->caption());

			// amount
			$this->amount->EditAttrs["class"] = "form-control";
			$this->amount->EditCustomAttributes = "";
			$this->amount->EditValue = HtmlEncode($this->amount->CurrentValue);
			$this->amount->PlaceHolder = RemoveHtml($this->amount->caption());
			if (strval($this->amount->EditValue) != "" && is_numeric($this->amount->EditValue)) {
				$this->amount->EditValue = FormatNumber($this->amount->EditValue, -2, -2, -2, -2);
				$this->amount->OldValue = $this->amount->EditValue;
			}
			

			// description
			$this->description->EditAttrs["class"] = "form-control";
			$this->description->EditCustomAttributes = "";
			if (!$this->description->Raw)
				$this->description->CurrentValue = HtmlDecode($this->description->CurrentValue);
			$this->description->EditValue = HtmlEncode($this->description->CurrentValue);
			$this->description->PlaceHolder = RemoveHtml($this->description->caption());

			// patient_type
			$this->patient_type->EditAttrs["class"] = "form-control";
			$this->patient_type->EditCustomAttributes = "";
			$this->patient_type->EditValue = HtmlEncode($this->patient_type->CurrentValue);
			$this->patient_type->PlaceHolder = RemoveHtml($this->patient_type->caption());

			// charged_date
			// status

			$this->status->EditAttrs["class"] = "form-control";
			$this->status->EditCustomAttributes = "";
			$curVal = trim(strval($this->status->CurrentValue));
			if ($curVal != "")
				$this->status->ViewValue = $this->status->lookupCacheOption($curVal);
			else
				$this->status->ViewValue = $this->status->Lookup !== NULL && is_array($this->status->Lookup->Options) ? $curVal : NULL;
			if ($this->status->ViewValue !== NULL) { // Load from cache
				$this->status->EditValue = array_values($this->status->Lookup->Options);
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`id`" . SearchString("=", $this->status->CurrentValue, DATATYPE_NUMBER, "");
				}
				$sqlWrk = $this->status->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				$arwrk = $rswrk ? $rswrk->getRows() : [];
				if ($rswrk)
					$rswrk->close();
				$this->status->EditValue = $arwrk;
			}

			// mrnno
			$this->mrnno->EditAttrs["class"] = "form-control";
			$this->mrnno->EditCustomAttributes = "";
			$this->mrnno->EditValue = $this->mrnno->CurrentValue;
			$this->mrnno->ViewCustomAttributes = "";

			// PatientName
			$this->PatientName->EditAttrs["class"] = "form-control";
			$this->PatientName->EditCustomAttributes = "";
			if (!$this->PatientName->Raw)
				$this->PatientName->CurrentValue = HtmlDecode($this->PatientName->CurrentValue);
			$this->PatientName->EditValue = HtmlEncode($this->PatientName->CurrentValue);
			$this->PatientName->PlaceHolder = RemoveHtml($this->PatientName->caption());

			// Age
			$this->Age->EditAttrs["class"] = "form-control";
			$this->Age->EditCustomAttributes = "";
			if (!$this->Age->Raw)
				$this->Age->CurrentValue = HtmlDecode($this->Age->CurrentValue);
			$this->Age->EditValue = HtmlEncode($this->Age->CurrentValue);
			$this->Age->PlaceHolder = RemoveHtml($this->Age->caption());

			// Gender
			$this->Gender->EditAttrs["class"] = "form-control";
			$this->Gender->EditCustomAttributes = "";
			if (!$this->Gender->Raw)
				$this->Gender->CurrentValue = HtmlDecode($this->Gender->CurrentValue);
			$this->Gender->EditValue = HtmlEncode($this->Gender->CurrentValue);
			$this->Gender->PlaceHolder = RemoveHtml($this->Gender->caption());

			// Unit
			$this->Unit->EditAttrs["class"] = "form-control";
			$this->Unit->EditCustomAttributes = "";
			$this->Unit->EditValue = HtmlEncode($this->Unit->CurrentValue);
			$this->Unit->PlaceHolder = RemoveHtml($this->Unit->caption());

			// Quantity
			$this->Quantity->EditAttrs["class"] = "form-control";
			$this->Quantity->EditCustomAttributes = "";
			$this->Quantity->EditValue = HtmlEncode($this->Quantity->CurrentValue);
			$this->Quantity->PlaceHolder = RemoveHtml($this->Quantity->caption());

			// Discount
			$this->Discount->EditAttrs["class"] = "form-control";
			$this->Discount->EditCustomAttributes = "";
			$this->Discount->EditValue = HtmlEncode($this->Discount->CurrentValue);
			$this->Discount->PlaceHolder = RemoveHtml($this->Discount->caption());
			if (strval($this->Discount->EditValue) != "" && is_numeric($this->Discount->EditValue)) {
				$this->Discount->EditValue = FormatNumber($this->Discount->EditValue, -2, -2, -2, -2);
				$this->Discount->OldValue = $this->Discount->EditValue;
			}
			

			// SubTotal
			$this->SubTotal->EditAttrs["class"] = "form-control";
			$this->SubTotal->EditCustomAttributes = "";
			$this->SubTotal->EditValue = HtmlEncode($this->SubTotal->CurrentValue);
			$this->SubTotal->PlaceHolder = RemoveHtml($this->SubTotal->caption());
			if (strval($this->SubTotal->EditValue) != "" && is_numeric($this->SubTotal->EditValue)) {
				$this->SubTotal->EditValue = FormatNumber($this->SubTotal->EditValue, -2, -2, -2, -2);
				$this->SubTotal->OldValue = $this->SubTotal->EditValue;
			}
			

			// ServiceSelect
			$this->ServiceSelect->EditCustomAttributes = "";
			$this->ServiceSelect->EditValue = $this->ServiceSelect->options(FALSE);

			// Aid
			$this->Aid->EditAttrs["class"] = "form-control";
			$this->Aid->EditCustomAttributes = "";
			$this->Aid->EditValue = HtmlEncode($this->Aid->CurrentValue);
			$this->Aid->PlaceHolder = RemoveHtml($this->Aid->caption());

			// Vid
			$this->Vid->EditAttrs["class"] = "form-control";
			$this->Vid->EditCustomAttributes = "";
			if ($this->Vid->getSessionValue() != "") {
				$this->Vid->CurrentValue = $this->Vid->getSessionValue();
				$this->Vid->OldValue = $this->Vid->CurrentValue;
				$this->Vid->ViewValue = $this->Vid->CurrentValue;
				$this->Vid->ViewValue = FormatNumber($this->Vid->ViewValue, 0, -2, -2, -2);
				$this->Vid->ViewCustomAttributes = "";
			} else {
				$this->Vid->EditValue = HtmlEncode($this->Vid->CurrentValue);
				$this->Vid->PlaceHolder = RemoveHtml($this->Vid->caption());
			}

			// DrID
			$this->DrID->EditAttrs["class"] = "form-control";
			$this->DrID->EditCustomAttributes = "";
			$this->DrID->EditValue = HtmlEncode($this->DrID->CurrentValue);
			$this->DrID->PlaceHolder = RemoveHtml($this->DrID->caption());

			// DrCODE
			$this->DrCODE->EditAttrs["class"] = "form-control";
			$this->DrCODE->EditCustomAttributes = "";
			if (!$this->DrCODE->Raw)
				$this->DrCODE->CurrentValue = HtmlDecode($this->DrCODE->CurrentValue);
			$this->DrCODE->EditValue = HtmlEncode($this->DrCODE->CurrentValue);
			$this->DrCODE->PlaceHolder = RemoveHtml($this->DrCODE->caption());

			// DrName
			$this->DrName->EditAttrs["class"] = "form-control";
			$this->DrName->EditCustomAttributes = "";
			if (!$this->DrName->Raw)
				$this->DrName->CurrentValue = HtmlDecode($this->DrName->CurrentValue);
			$this->DrName->EditValue = HtmlEncode($this->DrName->CurrentValue);
			$this->DrName->PlaceHolder = RemoveHtml($this->DrName->caption());

			// Department
			$this->Department->EditAttrs["class"] = "form-control";
			$this->Department->EditCustomAttributes = "";
			if (!$this->Department->Raw)
				$this->Department->CurrentValue = HtmlDecode($this->Department->CurrentValue);
			$this->Department->EditValue = HtmlEncode($this->Department->CurrentValue);
			$this->Department->PlaceHolder = RemoveHtml($this->Department->caption());

			// DrSharePres
			$this->DrSharePres->EditAttrs["class"] = "form-control";
			$this->DrSharePres->EditCustomAttributes = "";
			$this->DrSharePres->EditValue = HtmlEncode($this->DrSharePres->CurrentValue);
			$this->DrSharePres->PlaceHolder = RemoveHtml($this->DrSharePres->caption());
			if (strval($this->DrSharePres->EditValue) != "" && is_numeric($this->DrSharePres->EditValue)) {
				$this->DrSharePres->EditValue = FormatNumber($this->DrSharePres->EditValue, -2, -2, -2, -2);
				$this->DrSharePres->OldValue = $this->DrSharePres->EditValue;
			}
			

			// HospSharePres
			$this->HospSharePres->EditAttrs["class"] = "form-control";
			$this->HospSharePres->EditCustomAttributes = "";
			$this->HospSharePres->EditValue = HtmlEncode($this->HospSharePres->CurrentValue);
			$this->HospSharePres->PlaceHolder = RemoveHtml($this->HospSharePres->caption());
			if (strval($this->HospSharePres->EditValue) != "" && is_numeric($this->HospSharePres->EditValue)) {
				$this->HospSharePres->EditValue = FormatNumber($this->HospSharePres->EditValue, -2, -2, -2, -2);
				$this->HospSharePres->OldValue = $this->HospSharePres->EditValue;
			}
			

			// DrShareAmount
			$this->DrShareAmount->EditAttrs["class"] = "form-control";
			$this->DrShareAmount->EditCustomAttributes = "";
			$this->DrShareAmount->EditValue = HtmlEncode($this->DrShareAmount->CurrentValue);
			$this->DrShareAmount->PlaceHolder = RemoveHtml($this->DrShareAmount->caption());
			if (strval($this->DrShareAmount->EditValue) != "" && is_numeric($this->DrShareAmount->EditValue)) {
				$this->DrShareAmount->EditValue = FormatNumber($this->DrShareAmount->EditValue, -2, -2, -2, -2);
				$this->DrShareAmount->OldValue = $this->DrShareAmount->EditValue;
			}
			

			// HospShareAmount
			$this->HospShareAmount->EditAttrs["class"] = "form-control";
			$this->HospShareAmount->EditCustomAttributes = "";
			$this->HospShareAmount->EditValue = HtmlEncode($this->HospShareAmount->CurrentValue);
			$this->HospShareAmount->PlaceHolder = RemoveHtml($this->HospShareAmount->caption());
			if (strval($this->HospShareAmount->EditValue) != "" && is_numeric($this->HospShareAmount->EditValue)) {
				$this->HospShareAmount->EditValue = FormatNumber($this->HospShareAmount->EditValue, -2, -2, -2, -2);
				$this->HospShareAmount->OldValue = $this->HospShareAmount->EditValue;
			}
			

			// DrShareSettiledAmount
			$this->DrShareSettiledAmount->EditAttrs["class"] = "form-control";
			$this->DrShareSettiledAmount->EditCustomAttributes = "";
			$this->DrShareSettiledAmount->EditValue = HtmlEncode($this->DrShareSettiledAmount->CurrentValue);
			$this->DrShareSettiledAmount->PlaceHolder = RemoveHtml($this->DrShareSettiledAmount->caption());
			if (strval($this->DrShareSettiledAmount->EditValue) != "" && is_numeric($this->DrShareSettiledAmount->EditValue)) {
				$this->DrShareSettiledAmount->EditValue = FormatNumber($this->DrShareSettiledAmount->EditValue, -2, -2, -2, -2);
				$this->DrShareSettiledAmount->OldValue = $this->DrShareSettiledAmount->EditValue;
			}
			

			// DrShareSettledId
			$this->DrShareSettledId->EditAttrs["class"] = "form-control";
			$this->DrShareSettledId->EditCustomAttributes = "";
			$this->DrShareSettledId->EditValue = HtmlEncode($this->DrShareSettledId->CurrentValue);
			$this->DrShareSettledId->PlaceHolder = RemoveHtml($this->DrShareSettledId->caption());

			// DrShareSettiledStatus
			$this->DrShareSettiledStatus->EditAttrs["class"] = "form-control";
			$this->DrShareSettiledStatus->EditCustomAttributes = "";
			$this->DrShareSettiledStatus->EditValue = HtmlEncode($this->DrShareSettiledStatus->CurrentValue);
			$this->DrShareSettiledStatus->PlaceHolder = RemoveHtml($this->DrShareSettiledStatus->caption());

			// invoiceId
			$this->invoiceId->EditAttrs["class"] = "form-control";
			$this->invoiceId->EditCustomAttributes = "";
			$this->invoiceId->EditValue = HtmlEncode($this->invoiceId->CurrentValue);
			$this->invoiceId->PlaceHolder = RemoveHtml($this->invoiceId->caption());

			// invoiceAmount
			$this->invoiceAmount->EditAttrs["class"] = "form-control";
			$this->invoiceAmount->EditCustomAttributes = "";
			$this->invoiceAmount->EditValue = HtmlEncode($this->invoiceAmount->CurrentValue);
			$this->invoiceAmount->PlaceHolder = RemoveHtml($this->invoiceAmount->caption());
			if (strval($this->invoiceAmount->EditValue) != "" && is_numeric($this->invoiceAmount->EditValue)) {
				$this->invoiceAmount->EditValue = FormatNumber($this->invoiceAmount->EditValue, -2, -2, -2, -2);
				$this->invoiceAmount->OldValue = $this->invoiceAmount->EditValue;
			}
			

			// invoiceStatus
			$this->invoiceStatus->EditAttrs["class"] = "form-control";
			$this->invoiceStatus->EditCustomAttributes = "";
			if (!$this->invoiceStatus->Raw)
				$this->invoiceStatus->CurrentValue = HtmlDecode($this->invoiceStatus->CurrentValue);
			$this->invoiceStatus->EditValue = HtmlEncode($this->invoiceStatus->CurrentValue);
			$this->invoiceStatus->PlaceHolder = RemoveHtml($this->invoiceStatus->caption());

			// modeOfPayment
			$this->modeOfPayment->EditAttrs["class"] = "form-control";
			$this->modeOfPayment->EditCustomAttributes = "";
			if (!$this->modeOfPayment->Raw)
				$this->modeOfPayment->CurrentValue = HtmlDecode($this->modeOfPayment->CurrentValue);
			$this->modeOfPayment->EditValue = HtmlEncode($this->modeOfPayment->CurrentValue);
			$this->modeOfPayment->PlaceHolder = RemoveHtml($this->modeOfPayment->caption());

			// HospID
			// RIDNO

			$this->RIDNO->EditAttrs["class"] = "form-control";
			$this->RIDNO->EditCustomAttributes = "";
			$this->RIDNO->EditValue = $this->RIDNO->CurrentValue;
			$this->RIDNO->EditValue = FormatNumber($this->RIDNO->EditValue, 0, -2, -2, -2);
			$this->RIDNO->ViewCustomAttributes = "";

			// TidNo
			$this->TidNo->EditAttrs["class"] = "form-control";
			$this->TidNo->EditCustomAttributes = "";
			$this->TidNo->EditValue = $this->TidNo->CurrentValue;
			$this->TidNo->EditValue = FormatNumber($this->TidNo->EditValue, 0, -2, -2, -2);
			$this->TidNo->ViewCustomAttributes = "";

			// DiscountCategory
			$this->DiscountCategory->EditAttrs["class"] = "form-control";
			$this->DiscountCategory->EditCustomAttributes = "";
			if (!$this->DiscountCategory->Raw)
				$this->DiscountCategory->CurrentValue = HtmlDecode($this->DiscountCategory->CurrentValue);
			$this->DiscountCategory->EditValue = HtmlEncode($this->DiscountCategory->CurrentValue);
			$this->DiscountCategory->PlaceHolder = RemoveHtml($this->DiscountCategory->caption());

			// sid
			$this->sid->EditAttrs["class"] = "form-control";
			$this->sid->EditCustomAttributes = "";
			$this->sid->EditValue = HtmlEncode($this->sid->CurrentValue);
			$this->sid->PlaceHolder = RemoveHtml($this->sid->caption());

			// ItemCode
			$this->ItemCode->EditAttrs["class"] = "form-control";
			$this->ItemCode->EditCustomAttributes = "";
			if (!$this->ItemCode->Raw)
				$this->ItemCode->CurrentValue = HtmlDecode($this->ItemCode->CurrentValue);
			$this->ItemCode->EditValue = HtmlEncode($this->ItemCode->CurrentValue);
			$this->ItemCode->PlaceHolder = RemoveHtml($this->ItemCode->caption());

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

			// Comments
			$this->Comments->EditAttrs["class"] = "form-control";
			$this->Comments->EditCustomAttributes = "";
			if (!$this->Comments->Raw)
				$this->Comments->CurrentValue = HtmlDecode($this->Comments->CurrentValue);
			$this->Comments->EditValue = HtmlEncode($this->Comments->CurrentValue);
			$this->Comments->PlaceHolder = RemoveHtml($this->Comments->caption());

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

			// Abnormal
			$this->Abnormal->EditAttrs["class"] = "form-control";
			$this->Abnormal->EditCustomAttributes = "";
			if (!$this->Abnormal->Raw)
				$this->Abnormal->CurrentValue = HtmlDecode($this->Abnormal->CurrentValue);
			$this->Abnormal->EditValue = HtmlEncode($this->Abnormal->CurrentValue);
			$this->Abnormal->PlaceHolder = RemoveHtml($this->Abnormal->caption());

			// TestUnit
			$this->TestUnit->EditAttrs["class"] = "form-control";
			$this->TestUnit->EditCustomAttributes = "";
			if (!$this->TestUnit->Raw)
				$this->TestUnit->CurrentValue = HtmlDecode($this->TestUnit->CurrentValue);
			$this->TestUnit->EditValue = HtmlEncode($this->TestUnit->CurrentValue);
			$this->TestUnit->PlaceHolder = RemoveHtml($this->TestUnit->caption());

			// LOWHIGH
			$this->LOWHIGH->EditAttrs["class"] = "form-control";
			$this->LOWHIGH->EditCustomAttributes = "";
			if (!$this->LOWHIGH->Raw)
				$this->LOWHIGH->CurrentValue = HtmlDecode($this->LOWHIGH->CurrentValue);
			$this->LOWHIGH->EditValue = HtmlEncode($this->LOWHIGH->CurrentValue);
			$this->LOWHIGH->PlaceHolder = RemoveHtml($this->LOWHIGH->caption());

			// Branch
			$this->Branch->EditAttrs["class"] = "form-control";
			$this->Branch->EditCustomAttributes = "";
			if (!$this->Branch->Raw)
				$this->Branch->CurrentValue = HtmlDecode($this->Branch->CurrentValue);
			$this->Branch->EditValue = HtmlEncode($this->Branch->CurrentValue);
			$this->Branch->PlaceHolder = RemoveHtml($this->Branch->caption());

			// Dispatch
			$this->Dispatch->EditAttrs["class"] = "form-control";
			$this->Dispatch->EditCustomAttributes = "";
			if (!$this->Dispatch->Raw)
				$this->Dispatch->CurrentValue = HtmlDecode($this->Dispatch->CurrentValue);
			$this->Dispatch->EditValue = HtmlEncode($this->Dispatch->CurrentValue);
			$this->Dispatch->PlaceHolder = RemoveHtml($this->Dispatch->caption());

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

			// Printed
			$this->Printed->EditAttrs["class"] = "form-control";
			$this->Printed->EditCustomAttributes = "";
			if (!$this->Printed->Raw)
				$this->Printed->CurrentValue = HtmlDecode($this->Printed->CurrentValue);
			$this->Printed->EditValue = HtmlEncode($this->Printed->CurrentValue);
			$this->Printed->PlaceHolder = RemoveHtml($this->Printed->caption());

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

			// BillingDate
			$this->BillingDate->EditAttrs["class"] = "form-control";
			$this->BillingDate->EditCustomAttributes = "";
			$this->BillingDate->EditValue = HtmlEncode(FormatDateTime($this->BillingDate->CurrentValue, 8));
			$this->BillingDate->PlaceHolder = RemoveHtml($this->BillingDate->caption());

			// BilledBy
			$this->BilledBy->EditAttrs["class"] = "form-control";
			$this->BilledBy->EditCustomAttributes = "";
			if (!$this->BilledBy->Raw)
				$this->BilledBy->CurrentValue = HtmlDecode($this->BilledBy->CurrentValue);
			$this->BilledBy->EditValue = HtmlEncode($this->BilledBy->CurrentValue);
			$this->BilledBy->PlaceHolder = RemoveHtml($this->BilledBy->caption());

			// Resulted
			$this->Resulted->EditAttrs["class"] = "form-control";
			$this->Resulted->EditCustomAttributes = "";
			if (!$this->Resulted->Raw)
				$this->Resulted->CurrentValue = HtmlDecode($this->Resulted->CurrentValue);
			$this->Resulted->EditValue = HtmlEncode($this->Resulted->CurrentValue);
			$this->Resulted->PlaceHolder = RemoveHtml($this->Resulted->caption());

			// ResultDate
			$this->ResultDate->EditAttrs["class"] = "form-control";
			$this->ResultDate->EditCustomAttributes = "";
			$this->ResultDate->EditValue = HtmlEncode(FormatDateTime($this->ResultDate->CurrentValue, 8));
			$this->ResultDate->PlaceHolder = RemoveHtml($this->ResultDate->caption());

			// ResultedBy
			$this->ResultedBy->EditAttrs["class"] = "form-control";
			$this->ResultedBy->EditCustomAttributes = "";
			if (!$this->ResultedBy->Raw)
				$this->ResultedBy->CurrentValue = HtmlDecode($this->ResultedBy->CurrentValue);
			$this->ResultedBy->EditValue = HtmlEncode($this->ResultedBy->CurrentValue);
			$this->ResultedBy->PlaceHolder = RemoveHtml($this->ResultedBy->caption());

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

			// Sampled
			$this->Sampled->EditAttrs["class"] = "form-control";
			$this->Sampled->EditCustomAttributes = "";
			if (!$this->Sampled->Raw)
				$this->Sampled->CurrentValue = HtmlDecode($this->Sampled->CurrentValue);
			$this->Sampled->EditValue = HtmlEncode($this->Sampled->CurrentValue);
			$this->Sampled->PlaceHolder = RemoveHtml($this->Sampled->caption());

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

			// Recevied
			$this->Recevied->EditAttrs["class"] = "form-control";
			$this->Recevied->EditCustomAttributes = "";
			if (!$this->Recevied->Raw)
				$this->Recevied->CurrentValue = HtmlDecode($this->Recevied->CurrentValue);
			$this->Recevied->EditValue = HtmlEncode($this->Recevied->CurrentValue);
			$this->Recevied->PlaceHolder = RemoveHtml($this->Recevied->caption());

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

			// DeptRecived
			$this->DeptRecived->EditAttrs["class"] = "form-control";
			$this->DeptRecived->EditCustomAttributes = "";
			if (!$this->DeptRecived->Raw)
				$this->DeptRecived->CurrentValue = HtmlDecode($this->DeptRecived->CurrentValue);
			$this->DeptRecived->EditValue = HtmlEncode($this->DeptRecived->CurrentValue);
			$this->DeptRecived->PlaceHolder = RemoveHtml($this->DeptRecived->caption());

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

			// SAuthendicate
			$this->SAuthendicate->EditAttrs["class"] = "form-control";
			$this->SAuthendicate->EditCustomAttributes = "";
			if (!$this->SAuthendicate->Raw)
				$this->SAuthendicate->CurrentValue = HtmlDecode($this->SAuthendicate->CurrentValue);
			$this->SAuthendicate->EditValue = HtmlEncode($this->SAuthendicate->CurrentValue);
			$this->SAuthendicate->PlaceHolder = RemoveHtml($this->SAuthendicate->caption());

			// AuthDate
			$this->AuthDate->EditAttrs["class"] = "form-control";
			$this->AuthDate->EditCustomAttributes = "";
			$this->AuthDate->EditValue = HtmlEncode(FormatDateTime($this->AuthDate->CurrentValue, 8));
			$this->AuthDate->PlaceHolder = RemoveHtml($this->AuthDate->caption());

			// AuthBy
			$this->AuthBy->EditAttrs["class"] = "form-control";
			$this->AuthBy->EditCustomAttributes = "";
			if (!$this->AuthBy->Raw)
				$this->AuthBy->CurrentValue = HtmlDecode($this->AuthBy->CurrentValue);
			$this->AuthBy->EditValue = HtmlEncode($this->AuthBy->CurrentValue);
			$this->AuthBy->PlaceHolder = RemoveHtml($this->AuthBy->caption());

			// Authencate
			$this->Authencate->EditAttrs["class"] = "form-control";
			$this->Authencate->EditCustomAttributes = "";
			if (!$this->Authencate->Raw)
				$this->Authencate->CurrentValue = HtmlDecode($this->Authencate->CurrentValue);
			$this->Authencate->EditValue = HtmlEncode($this->Authencate->CurrentValue);
			$this->Authencate->PlaceHolder = RemoveHtml($this->Authencate->caption());

			// EditDate
			$this->EditDate->EditAttrs["class"] = "form-control";
			$this->EditDate->EditCustomAttributes = "";
			$this->EditDate->EditValue = HtmlEncode(FormatDateTime($this->EditDate->CurrentValue, 8));
			$this->EditDate->PlaceHolder = RemoveHtml($this->EditDate->caption());

			// EditBy
			$this->EditBy->EditAttrs["class"] = "form-control";
			$this->EditBy->EditCustomAttributes = "";
			if (!$this->EditBy->Raw)
				$this->EditBy->CurrentValue = HtmlDecode($this->EditBy->CurrentValue);
			$this->EditBy->EditValue = HtmlEncode($this->EditBy->CurrentValue);
			$this->EditBy->PlaceHolder = RemoveHtml($this->EditBy->caption());

			// Editted
			$this->Editted->EditAttrs["class"] = "form-control";
			$this->Editted->EditCustomAttributes = "";
			if (!$this->Editted->Raw)
				$this->Editted->CurrentValue = HtmlDecode($this->Editted->CurrentValue);
			$this->Editted->EditValue = HtmlEncode($this->Editted->CurrentValue);
			$this->Editted->PlaceHolder = RemoveHtml($this->Editted->caption());

			// PatID
			$this->PatID->EditAttrs["class"] = "form-control";
			$this->PatID->EditCustomAttributes = "";
			if ($this->PatID->getSessionValue() != "") {
				$this->PatID->CurrentValue = $this->PatID->getSessionValue();
				$this->PatID->OldValue = $this->PatID->CurrentValue;
				$this->PatID->ViewValue = $this->PatID->CurrentValue;
				$this->PatID->ViewValue = FormatNumber($this->PatID->ViewValue, 0, -2, -2, -2);
				$this->PatID->ViewCustomAttributes = "";
			} else {
				$this->PatID->EditValue = HtmlEncode($this->PatID->CurrentValue);
				$this->PatID->PlaceHolder = RemoveHtml($this->PatID->caption());
			}

			// PatientId
			$this->PatientId->EditAttrs["class"] = "form-control";
			$this->PatientId->EditCustomAttributes = "";
			if (!$this->PatientId->Raw)
				$this->PatientId->CurrentValue = HtmlDecode($this->PatientId->CurrentValue);
			$this->PatientId->EditValue = HtmlEncode($this->PatientId->CurrentValue);
			$this->PatientId->PlaceHolder = RemoveHtml($this->PatientId->caption());

			// Mobile
			$this->Mobile->EditAttrs["class"] = "form-control";
			$this->Mobile->EditCustomAttributes = "";
			if (!$this->Mobile->Raw)
				$this->Mobile->CurrentValue = HtmlDecode($this->Mobile->CurrentValue);
			$this->Mobile->EditValue = HtmlEncode($this->Mobile->CurrentValue);
			$this->Mobile->PlaceHolder = RemoveHtml($this->Mobile->caption());

			// CId
			$this->CId->EditAttrs["class"] = "form-control";
			$this->CId->EditCustomAttributes = "";
			$this->CId->EditValue = HtmlEncode($this->CId->CurrentValue);
			$this->CId->PlaceHolder = RemoveHtml($this->CId->caption());

			// Order
			$this->Order->EditAttrs["class"] = "form-control";
			$this->Order->EditCustomAttributes = "";
			$this->Order->EditValue = HtmlEncode($this->Order->CurrentValue);
			$this->Order->PlaceHolder = RemoveHtml($this->Order->caption());
			if (strval($this->Order->EditValue) != "" && is_numeric($this->Order->EditValue)) {
				$this->Order->EditValue = FormatNumber($this->Order->EditValue, -2, -2, -2, -2);
				$this->Order->OldValue = $this->Order->EditValue;
			}
			

			// ResType
			$this->ResType->EditAttrs["class"] = "form-control";
			$this->ResType->EditCustomAttributes = "";
			if (!$this->ResType->Raw)
				$this->ResType->CurrentValue = HtmlDecode($this->ResType->CurrentValue);
			$this->ResType->EditValue = HtmlEncode($this->ResType->CurrentValue);
			$this->ResType->PlaceHolder = RemoveHtml($this->ResType->caption());

			// Sample
			$this->Sample->EditAttrs["class"] = "form-control";
			$this->Sample->EditCustomAttributes = "";
			if (!$this->Sample->Raw)
				$this->Sample->CurrentValue = HtmlDecode($this->Sample->CurrentValue);
			$this->Sample->EditValue = HtmlEncode($this->Sample->CurrentValue);
			$this->Sample->PlaceHolder = RemoveHtml($this->Sample->caption());

			// NoD
			$this->NoD->EditAttrs["class"] = "form-control";
			$this->NoD->EditCustomAttributes = "";
			$this->NoD->EditValue = HtmlEncode($this->NoD->CurrentValue);
			$this->NoD->PlaceHolder = RemoveHtml($this->NoD->caption());
			if (strval($this->NoD->EditValue) != "" && is_numeric($this->NoD->EditValue)) {
				$this->NoD->EditValue = FormatNumber($this->NoD->EditValue, -2, -2, -2, -2);
				$this->NoD->OldValue = $this->NoD->EditValue;
			}
			

			// BillOrder
			$this->BillOrder->EditAttrs["class"] = "form-control";
			$this->BillOrder->EditCustomAttributes = "";
			$this->BillOrder->EditValue = HtmlEncode($this->BillOrder->CurrentValue);
			$this->BillOrder->PlaceHolder = RemoveHtml($this->BillOrder->caption());
			if (strval($this->BillOrder->EditValue) != "" && is_numeric($this->BillOrder->EditValue)) {
				$this->BillOrder->EditValue = FormatNumber($this->BillOrder->EditValue, -2, -2, -2, -2);
				$this->BillOrder->OldValue = $this->BillOrder->EditValue;
			}
			

			// Inactive
			$this->Inactive->EditAttrs["class"] = "form-control";
			$this->Inactive->EditCustomAttributes = "";
			if (!$this->Inactive->Raw)
				$this->Inactive->CurrentValue = HtmlDecode($this->Inactive->CurrentValue);
			$this->Inactive->EditValue = HtmlEncode($this->Inactive->CurrentValue);
			$this->Inactive->PlaceHolder = RemoveHtml($this->Inactive->caption());

			// CollSample
			$this->CollSample->EditAttrs["class"] = "form-control";
			$this->CollSample->EditCustomAttributes = "";
			if (!$this->CollSample->Raw)
				$this->CollSample->CurrentValue = HtmlDecode($this->CollSample->CurrentValue);
			$this->CollSample->EditValue = HtmlEncode($this->CollSample->CurrentValue);
			$this->CollSample->PlaceHolder = RemoveHtml($this->CollSample->caption());

			// TestType
			$this->TestType->EditAttrs["class"] = "form-control";
			$this->TestType->EditCustomAttributes = "";
			if (!$this->TestType->Raw)
				$this->TestType->CurrentValue = HtmlDecode($this->TestType->CurrentValue);
			$this->TestType->EditValue = HtmlEncode($this->TestType->CurrentValue);
			$this->TestType->PlaceHolder = RemoveHtml($this->TestType->caption());

			// Repeated
			$this->Repeated->EditAttrs["class"] = "form-control";
			$this->Repeated->EditCustomAttributes = "";
			if (!$this->Repeated->Raw)
				$this->Repeated->CurrentValue = HtmlDecode($this->Repeated->CurrentValue);
			$this->Repeated->EditValue = HtmlEncode($this->Repeated->CurrentValue);
			$this->Repeated->PlaceHolder = RemoveHtml($this->Repeated->caption());

			// RepeatedBy
			$this->RepeatedBy->EditAttrs["class"] = "form-control";
			$this->RepeatedBy->EditCustomAttributes = "";
			if (!$this->RepeatedBy->Raw)
				$this->RepeatedBy->CurrentValue = HtmlDecode($this->RepeatedBy->CurrentValue);
			$this->RepeatedBy->EditValue = HtmlEncode($this->RepeatedBy->CurrentValue);
			$this->RepeatedBy->PlaceHolder = RemoveHtml($this->RepeatedBy->caption());

			// RepeatedDate
			$this->RepeatedDate->EditAttrs["class"] = "form-control";
			$this->RepeatedDate->EditCustomAttributes = "";
			$this->RepeatedDate->EditValue = HtmlEncode(FormatDateTime($this->RepeatedDate->CurrentValue, 8));
			$this->RepeatedDate->PlaceHolder = RemoveHtml($this->RepeatedDate->caption());

			// serviceID
			$this->serviceID->EditAttrs["class"] = "form-control";
			$this->serviceID->EditCustomAttributes = "";
			$this->serviceID->EditValue = HtmlEncode($this->serviceID->CurrentValue);
			$this->serviceID->PlaceHolder = RemoveHtml($this->serviceID->caption());

			// Service_Type
			$this->Service_Type->EditAttrs["class"] = "form-control";
			$this->Service_Type->EditCustomAttributes = "";
			if (!$this->Service_Type->Raw)
				$this->Service_Type->CurrentValue = HtmlDecode($this->Service_Type->CurrentValue);
			$this->Service_Type->EditValue = HtmlEncode($this->Service_Type->CurrentValue);
			$this->Service_Type->PlaceHolder = RemoveHtml($this->Service_Type->caption());

			// Service_Department
			$this->Service_Department->EditAttrs["class"] = "form-control";
			$this->Service_Department->EditCustomAttributes = "";
			if (!$this->Service_Department->Raw)
				$this->Service_Department->CurrentValue = HtmlDecode($this->Service_Department->CurrentValue);
			$this->Service_Department->EditValue = HtmlEncode($this->Service_Department->CurrentValue);
			$this->Service_Department->PlaceHolder = RemoveHtml($this->Service_Department->caption());

			// RequestNo
			$this->RequestNo->EditAttrs["class"] = "form-control";
			$this->RequestNo->EditCustomAttributes = "";
			$this->RequestNo->EditValue = HtmlEncode($this->RequestNo->CurrentValue);
			$this->RequestNo->PlaceHolder = RemoveHtml($this->RequestNo->caption());

			// Edit refer script
			// id

			$this->id->LinkCustomAttributes = "";
			$this->id->HrefValue = "";

			// Reception
			$this->Reception->LinkCustomAttributes = "";
			$this->Reception->HrefValue = "";
			$this->Reception->TooltipValue = "";

			// Services
			$this->Services->LinkCustomAttributes = "";
			$this->Services->HrefValue = "";

			// amount
			$this->amount->LinkCustomAttributes = "";
			$this->amount->HrefValue = "";

			// description
			$this->description->LinkCustomAttributes = "";
			$this->description->HrefValue = "";

			// patient_type
			$this->patient_type->LinkCustomAttributes = "";
			$this->patient_type->HrefValue = "";

			// charged_date
			$this->charged_date->LinkCustomAttributes = "";
			$this->charged_date->HrefValue = "";

			// status
			$this->status->LinkCustomAttributes = "";
			$this->status->HrefValue = "";

			// mrnno
			$this->mrnno->LinkCustomAttributes = "";
			$this->mrnno->HrefValue = "";
			$this->mrnno->TooltipValue = "";

			// PatientName
			$this->PatientName->LinkCustomAttributes = "";
			$this->PatientName->HrefValue = "";

			// Age
			$this->Age->LinkCustomAttributes = "";
			$this->Age->HrefValue = "";

			// Gender
			$this->Gender->LinkCustomAttributes = "";
			$this->Gender->HrefValue = "";

			// Unit
			$this->Unit->LinkCustomAttributes = "";
			$this->Unit->HrefValue = "";

			// Quantity
			$this->Quantity->LinkCustomAttributes = "";
			$this->Quantity->HrefValue = "";

			// Discount
			$this->Discount->LinkCustomAttributes = "";
			$this->Discount->HrefValue = "";

			// SubTotal
			$this->SubTotal->LinkCustomAttributes = "";
			$this->SubTotal->HrefValue = "";

			// ServiceSelect
			$this->ServiceSelect->LinkCustomAttributes = "";
			$this->ServiceSelect->HrefValue = "";

			// Aid
			$this->Aid->LinkCustomAttributes = "";
			$this->Aid->HrefValue = "";

			// Vid
			$this->Vid->LinkCustomAttributes = "";
			$this->Vid->HrefValue = "";

			// DrID
			$this->DrID->LinkCustomAttributes = "";
			$this->DrID->HrefValue = "";

			// DrCODE
			$this->DrCODE->LinkCustomAttributes = "";
			$this->DrCODE->HrefValue = "";

			// DrName
			$this->DrName->LinkCustomAttributes = "";
			$this->DrName->HrefValue = "";

			// Department
			$this->Department->LinkCustomAttributes = "";
			$this->Department->HrefValue = "";

			// DrSharePres
			$this->DrSharePres->LinkCustomAttributes = "";
			$this->DrSharePres->HrefValue = "";

			// HospSharePres
			$this->HospSharePres->LinkCustomAttributes = "";
			$this->HospSharePres->HrefValue = "";

			// DrShareAmount
			$this->DrShareAmount->LinkCustomAttributes = "";
			$this->DrShareAmount->HrefValue = "";

			// HospShareAmount
			$this->HospShareAmount->LinkCustomAttributes = "";
			$this->HospShareAmount->HrefValue = "";

			// DrShareSettiledAmount
			$this->DrShareSettiledAmount->LinkCustomAttributes = "";
			$this->DrShareSettiledAmount->HrefValue = "";

			// DrShareSettledId
			$this->DrShareSettledId->LinkCustomAttributes = "";
			$this->DrShareSettledId->HrefValue = "";

			// DrShareSettiledStatus
			$this->DrShareSettiledStatus->LinkCustomAttributes = "";
			$this->DrShareSettiledStatus->HrefValue = "";

			// invoiceId
			$this->invoiceId->LinkCustomAttributes = "";
			$this->invoiceId->HrefValue = "";

			// invoiceAmount
			$this->invoiceAmount->LinkCustomAttributes = "";
			$this->invoiceAmount->HrefValue = "";

			// invoiceStatus
			$this->invoiceStatus->LinkCustomAttributes = "";
			$this->invoiceStatus->HrefValue = "";

			// modeOfPayment
			$this->modeOfPayment->LinkCustomAttributes = "";
			$this->modeOfPayment->HrefValue = "";

			// HospID
			$this->HospID->LinkCustomAttributes = "";
			$this->HospID->HrefValue = "";
			$this->HospID->TooltipValue = "";

			// RIDNO
			$this->RIDNO->LinkCustomAttributes = "";
			$this->RIDNO->HrefValue = "";
			$this->RIDNO->TooltipValue = "";

			// TidNo
			$this->TidNo->LinkCustomAttributes = "";
			$this->TidNo->HrefValue = "";
			$this->TidNo->TooltipValue = "";

			// DiscountCategory
			$this->DiscountCategory->LinkCustomAttributes = "";
			$this->DiscountCategory->HrefValue = "";

			// sid
			$this->sid->LinkCustomAttributes = "";
			$this->sid->HrefValue = "";

			// ItemCode
			$this->ItemCode->LinkCustomAttributes = "";
			$this->ItemCode->HrefValue = "";

			// TestSubCd
			$this->TestSubCd->LinkCustomAttributes = "";
			$this->TestSubCd->HrefValue = "";

			// DEptCd
			$this->DEptCd->LinkCustomAttributes = "";
			$this->DEptCd->HrefValue = "";

			// ProfCd
			$this->ProfCd->LinkCustomAttributes = "";
			$this->ProfCd->HrefValue = "";

			// Comments
			$this->Comments->LinkCustomAttributes = "";
			$this->Comments->HrefValue = "";

			// Method
			$this->Method->LinkCustomAttributes = "";
			$this->Method->HrefValue = "";

			// Specimen
			$this->Specimen->LinkCustomAttributes = "";
			$this->Specimen->HrefValue = "";

			// Abnormal
			$this->Abnormal->LinkCustomAttributes = "";
			$this->Abnormal->HrefValue = "";

			// TestUnit
			$this->TestUnit->LinkCustomAttributes = "";
			$this->TestUnit->HrefValue = "";

			// LOWHIGH
			$this->LOWHIGH->LinkCustomAttributes = "";
			$this->LOWHIGH->HrefValue = "";

			// Branch
			$this->Branch->LinkCustomAttributes = "";
			$this->Branch->HrefValue = "";

			// Dispatch
			$this->Dispatch->LinkCustomAttributes = "";
			$this->Dispatch->HrefValue = "";

			// Pic1
			$this->Pic1->LinkCustomAttributes = "";
			$this->Pic1->HrefValue = "";

			// Pic2
			$this->Pic2->LinkCustomAttributes = "";
			$this->Pic2->HrefValue = "";

			// GraphPath
			$this->GraphPath->LinkCustomAttributes = "";
			$this->GraphPath->HrefValue = "";

			// MachineCD
			$this->MachineCD->LinkCustomAttributes = "";
			$this->MachineCD->HrefValue = "";

			// TestCancel
			$this->TestCancel->LinkCustomAttributes = "";
			$this->TestCancel->HrefValue = "";

			// OutSource
			$this->OutSource->LinkCustomAttributes = "";
			$this->OutSource->HrefValue = "";

			// Printed
			$this->Printed->LinkCustomAttributes = "";
			$this->Printed->HrefValue = "";

			// PrintBy
			$this->PrintBy->LinkCustomAttributes = "";
			$this->PrintBy->HrefValue = "";

			// PrintDate
			$this->PrintDate->LinkCustomAttributes = "";
			$this->PrintDate->HrefValue = "";

			// BillingDate
			$this->BillingDate->LinkCustomAttributes = "";
			$this->BillingDate->HrefValue = "";

			// BilledBy
			$this->BilledBy->LinkCustomAttributes = "";
			$this->BilledBy->HrefValue = "";

			// Resulted
			$this->Resulted->LinkCustomAttributes = "";
			$this->Resulted->HrefValue = "";

			// ResultDate
			$this->ResultDate->LinkCustomAttributes = "";
			$this->ResultDate->HrefValue = "";

			// ResultedBy
			$this->ResultedBy->LinkCustomAttributes = "";
			$this->ResultedBy->HrefValue = "";

			// SampleDate
			$this->SampleDate->LinkCustomAttributes = "";
			$this->SampleDate->HrefValue = "";

			// SampleUser
			$this->SampleUser->LinkCustomAttributes = "";
			$this->SampleUser->HrefValue = "";

			// Sampled
			$this->Sampled->LinkCustomAttributes = "";
			$this->Sampled->HrefValue = "";

			// ReceivedDate
			$this->ReceivedDate->LinkCustomAttributes = "";
			$this->ReceivedDate->HrefValue = "";

			// ReceivedUser
			$this->ReceivedUser->LinkCustomAttributes = "";
			$this->ReceivedUser->HrefValue = "";

			// Recevied
			$this->Recevied->LinkCustomAttributes = "";
			$this->Recevied->HrefValue = "";

			// DeptRecvDate
			$this->DeptRecvDate->LinkCustomAttributes = "";
			$this->DeptRecvDate->HrefValue = "";

			// DeptRecvUser
			$this->DeptRecvUser->LinkCustomAttributes = "";
			$this->DeptRecvUser->HrefValue = "";

			// DeptRecived
			$this->DeptRecived->LinkCustomAttributes = "";
			$this->DeptRecived->HrefValue = "";

			// SAuthDate
			$this->SAuthDate->LinkCustomAttributes = "";
			$this->SAuthDate->HrefValue = "";

			// SAuthBy
			$this->SAuthBy->LinkCustomAttributes = "";
			$this->SAuthBy->HrefValue = "";

			// SAuthendicate
			$this->SAuthendicate->LinkCustomAttributes = "";
			$this->SAuthendicate->HrefValue = "";

			// AuthDate
			$this->AuthDate->LinkCustomAttributes = "";
			$this->AuthDate->HrefValue = "";

			// AuthBy
			$this->AuthBy->LinkCustomAttributes = "";
			$this->AuthBy->HrefValue = "";

			// Authencate
			$this->Authencate->LinkCustomAttributes = "";
			$this->Authencate->HrefValue = "";

			// EditDate
			$this->EditDate->LinkCustomAttributes = "";
			$this->EditDate->HrefValue = "";

			// EditBy
			$this->EditBy->LinkCustomAttributes = "";
			$this->EditBy->HrefValue = "";

			// Editted
			$this->Editted->LinkCustomAttributes = "";
			$this->Editted->HrefValue = "";

			// PatID
			$this->PatID->LinkCustomAttributes = "";
			$this->PatID->HrefValue = "";

			// PatientId
			$this->PatientId->LinkCustomAttributes = "";
			$this->PatientId->HrefValue = "";

			// Mobile
			$this->Mobile->LinkCustomAttributes = "";
			$this->Mobile->HrefValue = "";

			// CId
			$this->CId->LinkCustomAttributes = "";
			$this->CId->HrefValue = "";

			// Order
			$this->Order->LinkCustomAttributes = "";
			$this->Order->HrefValue = "";

			// ResType
			$this->ResType->LinkCustomAttributes = "";
			$this->ResType->HrefValue = "";

			// Sample
			$this->Sample->LinkCustomAttributes = "";
			$this->Sample->HrefValue = "";

			// NoD
			$this->NoD->LinkCustomAttributes = "";
			$this->NoD->HrefValue = "";

			// BillOrder
			$this->BillOrder->LinkCustomAttributes = "";
			$this->BillOrder->HrefValue = "";

			// Inactive
			$this->Inactive->LinkCustomAttributes = "";
			$this->Inactive->HrefValue = "";

			// CollSample
			$this->CollSample->LinkCustomAttributes = "";
			$this->CollSample->HrefValue = "";

			// TestType
			$this->TestType->LinkCustomAttributes = "";
			$this->TestType->HrefValue = "";

			// Repeated
			$this->Repeated->LinkCustomAttributes = "";
			$this->Repeated->HrefValue = "";

			// RepeatedBy
			$this->RepeatedBy->LinkCustomAttributes = "";
			$this->RepeatedBy->HrefValue = "";

			// RepeatedDate
			$this->RepeatedDate->LinkCustomAttributes = "";
			$this->RepeatedDate->HrefValue = "";

			// serviceID
			$this->serviceID->LinkCustomAttributes = "";
			$this->serviceID->HrefValue = "";

			// Service_Type
			$this->Service_Type->LinkCustomAttributes = "";
			$this->Service_Type->HrefValue = "";

			// Service_Department
			$this->Service_Department->LinkCustomAttributes = "";
			$this->Service_Department->HrefValue = "";

			// RequestNo
			$this->RequestNo->LinkCustomAttributes = "";
			$this->RequestNo->HrefValue = "";
		} elseif ($this->RowType == ROWTYPE_AGGREGATEINIT) { // Initialize aggregate row
			$this->SubTotal->Total = 0; // Initialize total
		} elseif ($this->RowType == ROWTYPE_AGGREGATE) { // Aggregate row
			$this->SubTotal->CurrentValue = $this->SubTotal->Total;
			$this->SubTotal->ViewValue = $this->SubTotal->CurrentValue;
			$this->SubTotal->ViewValue = FormatNumber($this->SubTotal->ViewValue, 2, -2, -2, -2);
			$this->SubTotal->ViewCustomAttributes = "";
			$this->SubTotal->HrefValue = ""; // Clear href value
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
		if ($this->Reception->Required) {
			if (!$this->Reception->IsDetailKey && $this->Reception->FormValue != NULL && $this->Reception->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Reception->caption(), $this->Reception->RequiredErrorMessage));
			}
		}
		if ($this->Services->Required) {
			if (!$this->Services->IsDetailKey && $this->Services->FormValue != NULL && $this->Services->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Services->caption(), $this->Services->RequiredErrorMessage));
			}
		}
		if ($this->amount->Required) {
			if (!$this->amount->IsDetailKey && $this->amount->FormValue != NULL && $this->amount->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->amount->caption(), $this->amount->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->amount->FormValue)) {
			AddMessage($FormError, $this->amount->errorMessage());
		}
		if ($this->description->Required) {
			if (!$this->description->IsDetailKey && $this->description->FormValue != NULL && $this->description->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->description->caption(), $this->description->RequiredErrorMessage));
			}
		}
		if ($this->patient_type->Required) {
			if (!$this->patient_type->IsDetailKey && $this->patient_type->FormValue != NULL && $this->patient_type->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->patient_type->caption(), $this->patient_type->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->patient_type->FormValue)) {
			AddMessage($FormError, $this->patient_type->errorMessage());
		}
		if ($this->charged_date->Required) {
			if (!$this->charged_date->IsDetailKey && $this->charged_date->FormValue != NULL && $this->charged_date->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->charged_date->caption(), $this->charged_date->RequiredErrorMessage));
			}
		}
		if ($this->status->Required) {
			if (!$this->status->IsDetailKey && $this->status->FormValue != NULL && $this->status->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->status->caption(), $this->status->RequiredErrorMessage));
			}
		}
		if ($this->mrnno->Required) {
			if (!$this->mrnno->IsDetailKey && $this->mrnno->FormValue != NULL && $this->mrnno->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->mrnno->caption(), $this->mrnno->RequiredErrorMessage));
			}
		}
		if ($this->PatientName->Required) {
			if (!$this->PatientName->IsDetailKey && $this->PatientName->FormValue != NULL && $this->PatientName->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PatientName->caption(), $this->PatientName->RequiredErrorMessage));
			}
		}
		if ($this->Age->Required) {
			if (!$this->Age->IsDetailKey && $this->Age->FormValue != NULL && $this->Age->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Age->caption(), $this->Age->RequiredErrorMessage));
			}
		}
		if ($this->Gender->Required) {
			if (!$this->Gender->IsDetailKey && $this->Gender->FormValue != NULL && $this->Gender->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Gender->caption(), $this->Gender->RequiredErrorMessage));
			}
		}
		if ($this->Unit->Required) {
			if (!$this->Unit->IsDetailKey && $this->Unit->FormValue != NULL && $this->Unit->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Unit->caption(), $this->Unit->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->Unit->FormValue)) {
			AddMessage($FormError, $this->Unit->errorMessage());
		}
		if ($this->Quantity->Required) {
			if (!$this->Quantity->IsDetailKey && $this->Quantity->FormValue != NULL && $this->Quantity->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Quantity->caption(), $this->Quantity->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->Quantity->FormValue)) {
			AddMessage($FormError, $this->Quantity->errorMessage());
		}
		if ($this->Discount->Required) {
			if (!$this->Discount->IsDetailKey && $this->Discount->FormValue != NULL && $this->Discount->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Discount->caption(), $this->Discount->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->Discount->FormValue)) {
			AddMessage($FormError, $this->Discount->errorMessage());
		}
		if ($this->SubTotal->Required) {
			if (!$this->SubTotal->IsDetailKey && $this->SubTotal->FormValue != NULL && $this->SubTotal->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->SubTotal->caption(), $this->SubTotal->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->SubTotal->FormValue)) {
			AddMessage($FormError, $this->SubTotal->errorMessage());
		}
		if ($this->ServiceSelect->Required) {
			if ($this->ServiceSelect->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->ServiceSelect->caption(), $this->ServiceSelect->RequiredErrorMessage));
			}
		}
		if ($this->Aid->Required) {
			if (!$this->Aid->IsDetailKey && $this->Aid->FormValue != NULL && $this->Aid->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Aid->caption(), $this->Aid->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->Aid->FormValue)) {
			AddMessage($FormError, $this->Aid->errorMessage());
		}
		if ($this->Vid->Required) {
			if (!$this->Vid->IsDetailKey && $this->Vid->FormValue != NULL && $this->Vid->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Vid->caption(), $this->Vid->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->Vid->FormValue)) {
			AddMessage($FormError, $this->Vid->errorMessage());
		}
		if ($this->DrID->Required) {
			if (!$this->DrID->IsDetailKey && $this->DrID->FormValue != NULL && $this->DrID->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->DrID->caption(), $this->DrID->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->DrID->FormValue)) {
			AddMessage($FormError, $this->DrID->errorMessage());
		}
		if ($this->DrCODE->Required) {
			if (!$this->DrCODE->IsDetailKey && $this->DrCODE->FormValue != NULL && $this->DrCODE->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->DrCODE->caption(), $this->DrCODE->RequiredErrorMessage));
			}
		}
		if ($this->DrName->Required) {
			if (!$this->DrName->IsDetailKey && $this->DrName->FormValue != NULL && $this->DrName->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->DrName->caption(), $this->DrName->RequiredErrorMessage));
			}
		}
		if ($this->Department->Required) {
			if (!$this->Department->IsDetailKey && $this->Department->FormValue != NULL && $this->Department->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Department->caption(), $this->Department->RequiredErrorMessage));
			}
		}
		if ($this->DrSharePres->Required) {
			if (!$this->DrSharePres->IsDetailKey && $this->DrSharePres->FormValue != NULL && $this->DrSharePres->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->DrSharePres->caption(), $this->DrSharePres->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->DrSharePres->FormValue)) {
			AddMessage($FormError, $this->DrSharePres->errorMessage());
		}
		if ($this->HospSharePres->Required) {
			if (!$this->HospSharePres->IsDetailKey && $this->HospSharePres->FormValue != NULL && $this->HospSharePres->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->HospSharePres->caption(), $this->HospSharePres->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->HospSharePres->FormValue)) {
			AddMessage($FormError, $this->HospSharePres->errorMessage());
		}
		if ($this->DrShareAmount->Required) {
			if (!$this->DrShareAmount->IsDetailKey && $this->DrShareAmount->FormValue != NULL && $this->DrShareAmount->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->DrShareAmount->caption(), $this->DrShareAmount->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->DrShareAmount->FormValue)) {
			AddMessage($FormError, $this->DrShareAmount->errorMessage());
		}
		if ($this->HospShareAmount->Required) {
			if (!$this->HospShareAmount->IsDetailKey && $this->HospShareAmount->FormValue != NULL && $this->HospShareAmount->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->HospShareAmount->caption(), $this->HospShareAmount->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->HospShareAmount->FormValue)) {
			AddMessage($FormError, $this->HospShareAmount->errorMessage());
		}
		if ($this->DrShareSettiledAmount->Required) {
			if (!$this->DrShareSettiledAmount->IsDetailKey && $this->DrShareSettiledAmount->FormValue != NULL && $this->DrShareSettiledAmount->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->DrShareSettiledAmount->caption(), $this->DrShareSettiledAmount->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->DrShareSettiledAmount->FormValue)) {
			AddMessage($FormError, $this->DrShareSettiledAmount->errorMessage());
		}
		if ($this->DrShareSettledId->Required) {
			if (!$this->DrShareSettledId->IsDetailKey && $this->DrShareSettledId->FormValue != NULL && $this->DrShareSettledId->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->DrShareSettledId->caption(), $this->DrShareSettledId->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->DrShareSettledId->FormValue)) {
			AddMessage($FormError, $this->DrShareSettledId->errorMessage());
		}
		if ($this->DrShareSettiledStatus->Required) {
			if (!$this->DrShareSettiledStatus->IsDetailKey && $this->DrShareSettiledStatus->FormValue != NULL && $this->DrShareSettiledStatus->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->DrShareSettiledStatus->caption(), $this->DrShareSettiledStatus->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->DrShareSettiledStatus->FormValue)) {
			AddMessage($FormError, $this->DrShareSettiledStatus->errorMessage());
		}
		if ($this->invoiceId->Required) {
			if (!$this->invoiceId->IsDetailKey && $this->invoiceId->FormValue != NULL && $this->invoiceId->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->invoiceId->caption(), $this->invoiceId->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->invoiceId->FormValue)) {
			AddMessage($FormError, $this->invoiceId->errorMessage());
		}
		if ($this->invoiceAmount->Required) {
			if (!$this->invoiceAmount->IsDetailKey && $this->invoiceAmount->FormValue != NULL && $this->invoiceAmount->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->invoiceAmount->caption(), $this->invoiceAmount->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->invoiceAmount->FormValue)) {
			AddMessage($FormError, $this->invoiceAmount->errorMessage());
		}
		if ($this->invoiceStatus->Required) {
			if (!$this->invoiceStatus->IsDetailKey && $this->invoiceStatus->FormValue != NULL && $this->invoiceStatus->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->invoiceStatus->caption(), $this->invoiceStatus->RequiredErrorMessage));
			}
		}
		if ($this->modeOfPayment->Required) {
			if (!$this->modeOfPayment->IsDetailKey && $this->modeOfPayment->FormValue != NULL && $this->modeOfPayment->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->modeOfPayment->caption(), $this->modeOfPayment->RequiredErrorMessage));
			}
		}
		if ($this->HospID->Required) {
			if (!$this->HospID->IsDetailKey && $this->HospID->FormValue != NULL && $this->HospID->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->HospID->caption(), $this->HospID->RequiredErrorMessage));
			}
		}
		if ($this->RIDNO->Required) {
			if (!$this->RIDNO->IsDetailKey && $this->RIDNO->FormValue != NULL && $this->RIDNO->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->RIDNO->caption(), $this->RIDNO->RequiredErrorMessage));
			}
		}
		if ($this->TidNo->Required) {
			if (!$this->TidNo->IsDetailKey && $this->TidNo->FormValue != NULL && $this->TidNo->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->TidNo->caption(), $this->TidNo->RequiredErrorMessage));
			}
		}
		if ($this->DiscountCategory->Required) {
			if (!$this->DiscountCategory->IsDetailKey && $this->DiscountCategory->FormValue != NULL && $this->DiscountCategory->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->DiscountCategory->caption(), $this->DiscountCategory->RequiredErrorMessage));
			}
		}
		if ($this->sid->Required) {
			if (!$this->sid->IsDetailKey && $this->sid->FormValue != NULL && $this->sid->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->sid->caption(), $this->sid->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->sid->FormValue)) {
			AddMessage($FormError, $this->sid->errorMessage());
		}
		if ($this->ItemCode->Required) {
			if (!$this->ItemCode->IsDetailKey && $this->ItemCode->FormValue != NULL && $this->ItemCode->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->ItemCode->caption(), $this->ItemCode->RequiredErrorMessage));
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
		if ($this->Comments->Required) {
			if (!$this->Comments->IsDetailKey && $this->Comments->FormValue != NULL && $this->Comments->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Comments->caption(), $this->Comments->RequiredErrorMessage));
			}
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
		if ($this->Abnormal->Required) {
			if (!$this->Abnormal->IsDetailKey && $this->Abnormal->FormValue != NULL && $this->Abnormal->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Abnormal->caption(), $this->Abnormal->RequiredErrorMessage));
			}
		}
		if ($this->TestUnit->Required) {
			if (!$this->TestUnit->IsDetailKey && $this->TestUnit->FormValue != NULL && $this->TestUnit->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->TestUnit->caption(), $this->TestUnit->RequiredErrorMessage));
			}
		}
		if ($this->LOWHIGH->Required) {
			if (!$this->LOWHIGH->IsDetailKey && $this->LOWHIGH->FormValue != NULL && $this->LOWHIGH->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->LOWHIGH->caption(), $this->LOWHIGH->RequiredErrorMessage));
			}
		}
		if ($this->Branch->Required) {
			if (!$this->Branch->IsDetailKey && $this->Branch->FormValue != NULL && $this->Branch->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Branch->caption(), $this->Branch->RequiredErrorMessage));
			}
		}
		if ($this->Dispatch->Required) {
			if (!$this->Dispatch->IsDetailKey && $this->Dispatch->FormValue != NULL && $this->Dispatch->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Dispatch->caption(), $this->Dispatch->RequiredErrorMessage));
			}
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
		if ($this->Printed->Required) {
			if (!$this->Printed->IsDetailKey && $this->Printed->FormValue != NULL && $this->Printed->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Printed->caption(), $this->Printed->RequiredErrorMessage));
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
		if ($this->BillingDate->Required) {
			if (!$this->BillingDate->IsDetailKey && $this->BillingDate->FormValue != NULL && $this->BillingDate->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->BillingDate->caption(), $this->BillingDate->RequiredErrorMessage));
			}
		}
		if (!CheckDate($this->BillingDate->FormValue)) {
			AddMessage($FormError, $this->BillingDate->errorMessage());
		}
		if ($this->BilledBy->Required) {
			if (!$this->BilledBy->IsDetailKey && $this->BilledBy->FormValue != NULL && $this->BilledBy->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->BilledBy->caption(), $this->BilledBy->RequiredErrorMessage));
			}
		}
		if ($this->Resulted->Required) {
			if (!$this->Resulted->IsDetailKey && $this->Resulted->FormValue != NULL && $this->Resulted->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Resulted->caption(), $this->Resulted->RequiredErrorMessage));
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
		if ($this->ResultedBy->Required) {
			if (!$this->ResultedBy->IsDetailKey && $this->ResultedBy->FormValue != NULL && $this->ResultedBy->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->ResultedBy->caption(), $this->ResultedBy->RequiredErrorMessage));
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
		if ($this->Sampled->Required) {
			if (!$this->Sampled->IsDetailKey && $this->Sampled->FormValue != NULL && $this->Sampled->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Sampled->caption(), $this->Sampled->RequiredErrorMessage));
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
		if ($this->Recevied->Required) {
			if (!$this->Recevied->IsDetailKey && $this->Recevied->FormValue != NULL && $this->Recevied->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Recevied->caption(), $this->Recevied->RequiredErrorMessage));
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
		if ($this->DeptRecived->Required) {
			if (!$this->DeptRecived->IsDetailKey && $this->DeptRecived->FormValue != NULL && $this->DeptRecived->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->DeptRecived->caption(), $this->DeptRecived->RequiredErrorMessage));
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
		if ($this->SAuthendicate->Required) {
			if (!$this->SAuthendicate->IsDetailKey && $this->SAuthendicate->FormValue != NULL && $this->SAuthendicate->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->SAuthendicate->caption(), $this->SAuthendicate->RequiredErrorMessage));
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
		if ($this->AuthBy->Required) {
			if (!$this->AuthBy->IsDetailKey && $this->AuthBy->FormValue != NULL && $this->AuthBy->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->AuthBy->caption(), $this->AuthBy->RequiredErrorMessage));
			}
		}
		if ($this->Authencate->Required) {
			if (!$this->Authencate->IsDetailKey && $this->Authencate->FormValue != NULL && $this->Authencate->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Authencate->caption(), $this->Authencate->RequiredErrorMessage));
			}
		}
		if ($this->EditDate->Required) {
			if (!$this->EditDate->IsDetailKey && $this->EditDate->FormValue != NULL && $this->EditDate->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->EditDate->caption(), $this->EditDate->RequiredErrorMessage));
			}
		}
		if (!CheckDate($this->EditDate->FormValue)) {
			AddMessage($FormError, $this->EditDate->errorMessage());
		}
		if ($this->EditBy->Required) {
			if (!$this->EditBy->IsDetailKey && $this->EditBy->FormValue != NULL && $this->EditBy->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->EditBy->caption(), $this->EditBy->RequiredErrorMessage));
			}
		}
		if ($this->Editted->Required) {
			if (!$this->Editted->IsDetailKey && $this->Editted->FormValue != NULL && $this->Editted->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Editted->caption(), $this->Editted->RequiredErrorMessage));
			}
		}
		if ($this->PatID->Required) {
			if (!$this->PatID->IsDetailKey && $this->PatID->FormValue != NULL && $this->PatID->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PatID->caption(), $this->PatID->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->PatID->FormValue)) {
			AddMessage($FormError, $this->PatID->errorMessage());
		}
		if ($this->PatientId->Required) {
			if (!$this->PatientId->IsDetailKey && $this->PatientId->FormValue != NULL && $this->PatientId->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PatientId->caption(), $this->PatientId->RequiredErrorMessage));
			}
		}
		if ($this->Mobile->Required) {
			if (!$this->Mobile->IsDetailKey && $this->Mobile->FormValue != NULL && $this->Mobile->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Mobile->caption(), $this->Mobile->RequiredErrorMessage));
			}
		}
		if ($this->CId->Required) {
			if (!$this->CId->IsDetailKey && $this->CId->FormValue != NULL && $this->CId->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->CId->caption(), $this->CId->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->CId->FormValue)) {
			AddMessage($FormError, $this->CId->errorMessage());
		}
		if ($this->Order->Required) {
			if (!$this->Order->IsDetailKey && $this->Order->FormValue != NULL && $this->Order->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Order->caption(), $this->Order->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->Order->FormValue)) {
			AddMessage($FormError, $this->Order->errorMessage());
		}
		if ($this->ResType->Required) {
			if (!$this->ResType->IsDetailKey && $this->ResType->FormValue != NULL && $this->ResType->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->ResType->caption(), $this->ResType->RequiredErrorMessage));
			}
		}
		if ($this->Sample->Required) {
			if (!$this->Sample->IsDetailKey && $this->Sample->FormValue != NULL && $this->Sample->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Sample->caption(), $this->Sample->RequiredErrorMessage));
			}
		}
		if ($this->NoD->Required) {
			if (!$this->NoD->IsDetailKey && $this->NoD->FormValue != NULL && $this->NoD->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->NoD->caption(), $this->NoD->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->NoD->FormValue)) {
			AddMessage($FormError, $this->NoD->errorMessage());
		}
		if ($this->BillOrder->Required) {
			if (!$this->BillOrder->IsDetailKey && $this->BillOrder->FormValue != NULL && $this->BillOrder->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->BillOrder->caption(), $this->BillOrder->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->BillOrder->FormValue)) {
			AddMessage($FormError, $this->BillOrder->errorMessage());
		}
		if ($this->Inactive->Required) {
			if (!$this->Inactive->IsDetailKey && $this->Inactive->FormValue != NULL && $this->Inactive->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Inactive->caption(), $this->Inactive->RequiredErrorMessage));
			}
		}
		if ($this->CollSample->Required) {
			if (!$this->CollSample->IsDetailKey && $this->CollSample->FormValue != NULL && $this->CollSample->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->CollSample->caption(), $this->CollSample->RequiredErrorMessage));
			}
		}
		if ($this->TestType->Required) {
			if (!$this->TestType->IsDetailKey && $this->TestType->FormValue != NULL && $this->TestType->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->TestType->caption(), $this->TestType->RequiredErrorMessage));
			}
		}
		if ($this->Repeated->Required) {
			if (!$this->Repeated->IsDetailKey && $this->Repeated->FormValue != NULL && $this->Repeated->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Repeated->caption(), $this->Repeated->RequiredErrorMessage));
			}
		}
		if ($this->RepeatedBy->Required) {
			if (!$this->RepeatedBy->IsDetailKey && $this->RepeatedBy->FormValue != NULL && $this->RepeatedBy->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->RepeatedBy->caption(), $this->RepeatedBy->RequiredErrorMessage));
			}
		}
		if ($this->RepeatedDate->Required) {
			if (!$this->RepeatedDate->IsDetailKey && $this->RepeatedDate->FormValue != NULL && $this->RepeatedDate->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->RepeatedDate->caption(), $this->RepeatedDate->RequiredErrorMessage));
			}
		}
		if (!CheckDate($this->RepeatedDate->FormValue)) {
			AddMessage($FormError, $this->RepeatedDate->errorMessage());
		}
		if ($this->serviceID->Required) {
			if (!$this->serviceID->IsDetailKey && $this->serviceID->FormValue != NULL && $this->serviceID->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->serviceID->caption(), $this->serviceID->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->serviceID->FormValue)) {
			AddMessage($FormError, $this->serviceID->errorMessage());
		}
		if ($this->Service_Type->Required) {
			if (!$this->Service_Type->IsDetailKey && $this->Service_Type->FormValue != NULL && $this->Service_Type->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Service_Type->caption(), $this->Service_Type->RequiredErrorMessage));
			}
		}
		if ($this->Service_Department->Required) {
			if (!$this->Service_Department->IsDetailKey && $this->Service_Department->FormValue != NULL && $this->Service_Department->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Service_Department->caption(), $this->Service_Department->RequiredErrorMessage));
			}
		}
		if ($this->RequestNo->Required) {
			if (!$this->RequestNo->IsDetailKey && $this->RequestNo->FormValue != NULL && $this->RequestNo->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->RequestNo->caption(), $this->RequestNo->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->RequestNo->FormValue)) {
			AddMessage($FormError, $this->RequestNo->errorMessage());
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

			// Services
			$this->Services->setDbValueDef($rsnew, $this->Services->CurrentValue, "", $this->Services->ReadOnly);

			// amount
			$this->amount->setDbValueDef($rsnew, $this->amount->CurrentValue, 0, $this->amount->ReadOnly);

			// description
			$this->description->setDbValueDef($rsnew, $this->description->CurrentValue, NULL, $this->description->ReadOnly);

			// patient_type
			$this->patient_type->setDbValueDef($rsnew, $this->patient_type->CurrentValue, NULL, $this->patient_type->ReadOnly);

			// charged_date
			$this->charged_date->CurrentValue = CurrentDate();
			$this->charged_date->setDbValueDef($rsnew, $this->charged_date->CurrentValue, NULL);

			// status
			$this->status->setDbValueDef($rsnew, $this->status->CurrentValue, NULL, $this->status->ReadOnly);

			// PatientName
			$this->PatientName->setDbValueDef($rsnew, $this->PatientName->CurrentValue, NULL, $this->PatientName->ReadOnly);

			// Age
			$this->Age->setDbValueDef($rsnew, $this->Age->CurrentValue, NULL, $this->Age->ReadOnly);

			// Gender
			$this->Gender->setDbValueDef($rsnew, $this->Gender->CurrentValue, NULL, $this->Gender->ReadOnly);

			// Unit
			$this->Unit->setDbValueDef($rsnew, $this->Unit->CurrentValue, NULL, $this->Unit->ReadOnly);

			// Quantity
			$this->Quantity->setDbValueDef($rsnew, $this->Quantity->CurrentValue, NULL, $this->Quantity->ReadOnly);

			// Discount
			$this->Discount->setDbValueDef($rsnew, $this->Discount->CurrentValue, NULL, $this->Discount->ReadOnly);

			// SubTotal
			$this->SubTotal->setDbValueDef($rsnew, $this->SubTotal->CurrentValue, NULL, $this->SubTotal->ReadOnly);

			// ServiceSelect
			$this->ServiceSelect->setDbValueDef($rsnew, $this->ServiceSelect->CurrentValue, "", $this->ServiceSelect->ReadOnly);

			// Aid
			$this->Aid->setDbValueDef($rsnew, $this->Aid->CurrentValue, NULL, $this->Aid->ReadOnly);

			// Vid
			$this->Vid->setDbValueDef($rsnew, $this->Vid->CurrentValue, NULL, $this->Vid->ReadOnly);

			// DrID
			$this->DrID->setDbValueDef($rsnew, $this->DrID->CurrentValue, NULL, $this->DrID->ReadOnly);

			// DrCODE
			$this->DrCODE->setDbValueDef($rsnew, $this->DrCODE->CurrentValue, NULL, $this->DrCODE->ReadOnly);

			// DrName
			$this->DrName->setDbValueDef($rsnew, $this->DrName->CurrentValue, NULL, $this->DrName->ReadOnly);

			// Department
			$this->Department->setDbValueDef($rsnew, $this->Department->CurrentValue, NULL, $this->Department->ReadOnly);

			// DrSharePres
			$this->DrSharePres->setDbValueDef($rsnew, $this->DrSharePres->CurrentValue, NULL, $this->DrSharePres->ReadOnly);

			// HospSharePres
			$this->HospSharePres->setDbValueDef($rsnew, $this->HospSharePres->CurrentValue, NULL, $this->HospSharePres->ReadOnly);

			// DrShareAmount
			$this->DrShareAmount->setDbValueDef($rsnew, $this->DrShareAmount->CurrentValue, NULL, $this->DrShareAmount->ReadOnly);

			// HospShareAmount
			$this->HospShareAmount->setDbValueDef($rsnew, $this->HospShareAmount->CurrentValue, NULL, $this->HospShareAmount->ReadOnly);

			// DrShareSettiledAmount
			$this->DrShareSettiledAmount->setDbValueDef($rsnew, $this->DrShareSettiledAmount->CurrentValue, NULL, $this->DrShareSettiledAmount->ReadOnly);

			// DrShareSettledId
			$this->DrShareSettledId->setDbValueDef($rsnew, $this->DrShareSettledId->CurrentValue, NULL, $this->DrShareSettledId->ReadOnly);

			// DrShareSettiledStatus
			$this->DrShareSettiledStatus->setDbValueDef($rsnew, $this->DrShareSettiledStatus->CurrentValue, NULL, $this->DrShareSettiledStatus->ReadOnly);

			// invoiceId
			$this->invoiceId->setDbValueDef($rsnew, $this->invoiceId->CurrentValue, NULL, $this->invoiceId->ReadOnly);

			// invoiceAmount
			$this->invoiceAmount->setDbValueDef($rsnew, $this->invoiceAmount->CurrentValue, NULL, $this->invoiceAmount->ReadOnly);

			// invoiceStatus
			$this->invoiceStatus->setDbValueDef($rsnew, $this->invoiceStatus->CurrentValue, NULL, $this->invoiceStatus->ReadOnly);

			// modeOfPayment
			$this->modeOfPayment->setDbValueDef($rsnew, $this->modeOfPayment->CurrentValue, NULL, $this->modeOfPayment->ReadOnly);

			// DiscountCategory
			$this->DiscountCategory->setDbValueDef($rsnew, $this->DiscountCategory->CurrentValue, NULL, $this->DiscountCategory->ReadOnly);

			// sid
			$this->sid->setDbValueDef($rsnew, $this->sid->CurrentValue, NULL, $this->sid->ReadOnly);

			// ItemCode
			$this->ItemCode->setDbValueDef($rsnew, $this->ItemCode->CurrentValue, NULL, $this->ItemCode->ReadOnly);

			// TestSubCd
			$this->TestSubCd->setDbValueDef($rsnew, $this->TestSubCd->CurrentValue, NULL, $this->TestSubCd->ReadOnly);

			// DEptCd
			$this->DEptCd->setDbValueDef($rsnew, $this->DEptCd->CurrentValue, NULL, $this->DEptCd->ReadOnly);

			// ProfCd
			$this->ProfCd->setDbValueDef($rsnew, $this->ProfCd->CurrentValue, NULL, $this->ProfCd->ReadOnly);

			// Comments
			$this->Comments->setDbValueDef($rsnew, $this->Comments->CurrentValue, NULL, $this->Comments->ReadOnly);

			// Method
			$this->Method->setDbValueDef($rsnew, $this->Method->CurrentValue, NULL, $this->Method->ReadOnly);

			// Specimen
			$this->Specimen->setDbValueDef($rsnew, $this->Specimen->CurrentValue, NULL, $this->Specimen->ReadOnly);

			// Abnormal
			$this->Abnormal->setDbValueDef($rsnew, $this->Abnormal->CurrentValue, NULL, $this->Abnormal->ReadOnly);

			// TestUnit
			$this->TestUnit->setDbValueDef($rsnew, $this->TestUnit->CurrentValue, NULL, $this->TestUnit->ReadOnly);

			// LOWHIGH
			$this->LOWHIGH->setDbValueDef($rsnew, $this->LOWHIGH->CurrentValue, NULL, $this->LOWHIGH->ReadOnly);

			// Branch
			$this->Branch->setDbValueDef($rsnew, $this->Branch->CurrentValue, NULL, $this->Branch->ReadOnly);

			// Dispatch
			$this->Dispatch->setDbValueDef($rsnew, $this->Dispatch->CurrentValue, NULL, $this->Dispatch->ReadOnly);

			// Pic1
			$this->Pic1->setDbValueDef($rsnew, $this->Pic1->CurrentValue, NULL, $this->Pic1->ReadOnly);

			// Pic2
			$this->Pic2->setDbValueDef($rsnew, $this->Pic2->CurrentValue, NULL, $this->Pic2->ReadOnly);

			// GraphPath
			$this->GraphPath->setDbValueDef($rsnew, $this->GraphPath->CurrentValue, NULL, $this->GraphPath->ReadOnly);

			// MachineCD
			$this->MachineCD->setDbValueDef($rsnew, $this->MachineCD->CurrentValue, NULL, $this->MachineCD->ReadOnly);

			// TestCancel
			$this->TestCancel->setDbValueDef($rsnew, $this->TestCancel->CurrentValue, NULL, $this->TestCancel->ReadOnly);

			// OutSource
			$this->OutSource->setDbValueDef($rsnew, $this->OutSource->CurrentValue, NULL, $this->OutSource->ReadOnly);

			// Printed
			$this->Printed->setDbValueDef($rsnew, $this->Printed->CurrentValue, NULL, $this->Printed->ReadOnly);

			// PrintBy
			$this->PrintBy->setDbValueDef($rsnew, $this->PrintBy->CurrentValue, NULL, $this->PrintBy->ReadOnly);

			// PrintDate
			$this->PrintDate->setDbValueDef($rsnew, UnFormatDateTime($this->PrintDate->CurrentValue, 0), NULL, $this->PrintDate->ReadOnly);

			// BillingDate
			$this->BillingDate->setDbValueDef($rsnew, UnFormatDateTime($this->BillingDate->CurrentValue, 0), NULL, $this->BillingDate->ReadOnly);

			// BilledBy
			$this->BilledBy->setDbValueDef($rsnew, $this->BilledBy->CurrentValue, NULL, $this->BilledBy->ReadOnly);

			// Resulted
			$this->Resulted->setDbValueDef($rsnew, $this->Resulted->CurrentValue, NULL, $this->Resulted->ReadOnly);

			// ResultDate
			$this->ResultDate->setDbValueDef($rsnew, UnFormatDateTime($this->ResultDate->CurrentValue, 0), NULL, $this->ResultDate->ReadOnly);

			// ResultedBy
			$this->ResultedBy->setDbValueDef($rsnew, $this->ResultedBy->CurrentValue, NULL, $this->ResultedBy->ReadOnly);

			// SampleDate
			$this->SampleDate->setDbValueDef($rsnew, UnFormatDateTime($this->SampleDate->CurrentValue, 0), NULL, $this->SampleDate->ReadOnly);

			// SampleUser
			$this->SampleUser->setDbValueDef($rsnew, $this->SampleUser->CurrentValue, NULL, $this->SampleUser->ReadOnly);

			// Sampled
			$this->Sampled->setDbValueDef($rsnew, $this->Sampled->CurrentValue, NULL, $this->Sampled->ReadOnly);

			// ReceivedDate
			$this->ReceivedDate->setDbValueDef($rsnew, UnFormatDateTime($this->ReceivedDate->CurrentValue, 0), NULL, $this->ReceivedDate->ReadOnly);

			// ReceivedUser
			$this->ReceivedUser->setDbValueDef($rsnew, $this->ReceivedUser->CurrentValue, NULL, $this->ReceivedUser->ReadOnly);

			// Recevied
			$this->Recevied->setDbValueDef($rsnew, $this->Recevied->CurrentValue, NULL, $this->Recevied->ReadOnly);

			// DeptRecvDate
			$this->DeptRecvDate->setDbValueDef($rsnew, UnFormatDateTime($this->DeptRecvDate->CurrentValue, 0), NULL, $this->DeptRecvDate->ReadOnly);

			// DeptRecvUser
			$this->DeptRecvUser->setDbValueDef($rsnew, $this->DeptRecvUser->CurrentValue, NULL, $this->DeptRecvUser->ReadOnly);

			// DeptRecived
			$this->DeptRecived->setDbValueDef($rsnew, $this->DeptRecived->CurrentValue, NULL, $this->DeptRecived->ReadOnly);

			// SAuthDate
			$this->SAuthDate->setDbValueDef($rsnew, UnFormatDateTime($this->SAuthDate->CurrentValue, 0), NULL, $this->SAuthDate->ReadOnly);

			// SAuthBy
			$this->SAuthBy->setDbValueDef($rsnew, $this->SAuthBy->CurrentValue, NULL, $this->SAuthBy->ReadOnly);

			// SAuthendicate
			$this->SAuthendicate->setDbValueDef($rsnew, $this->SAuthendicate->CurrentValue, NULL, $this->SAuthendicate->ReadOnly);

			// AuthDate
			$this->AuthDate->setDbValueDef($rsnew, UnFormatDateTime($this->AuthDate->CurrentValue, 0), NULL, $this->AuthDate->ReadOnly);

			// AuthBy
			$this->AuthBy->setDbValueDef($rsnew, $this->AuthBy->CurrentValue, NULL, $this->AuthBy->ReadOnly);

			// Authencate
			$this->Authencate->setDbValueDef($rsnew, $this->Authencate->CurrentValue, NULL, $this->Authencate->ReadOnly);

			// EditDate
			$this->EditDate->setDbValueDef($rsnew, UnFormatDateTime($this->EditDate->CurrentValue, 0), NULL, $this->EditDate->ReadOnly);

			// EditBy
			$this->EditBy->setDbValueDef($rsnew, $this->EditBy->CurrentValue, NULL, $this->EditBy->ReadOnly);

			// Editted
			$this->Editted->setDbValueDef($rsnew, $this->Editted->CurrentValue, NULL, $this->Editted->ReadOnly);

			// PatID
			$this->PatID->setDbValueDef($rsnew, $this->PatID->CurrentValue, NULL, $this->PatID->ReadOnly);

			// PatientId
			$this->PatientId->setDbValueDef($rsnew, $this->PatientId->CurrentValue, NULL, $this->PatientId->ReadOnly);

			// Mobile
			$this->Mobile->setDbValueDef($rsnew, $this->Mobile->CurrentValue, NULL, $this->Mobile->ReadOnly);

			// CId
			$this->CId->setDbValueDef($rsnew, $this->CId->CurrentValue, NULL, $this->CId->ReadOnly);

			// Order
			$this->Order->setDbValueDef($rsnew, $this->Order->CurrentValue, NULL, $this->Order->ReadOnly);

			// ResType
			$this->ResType->setDbValueDef($rsnew, $this->ResType->CurrentValue, NULL, $this->ResType->ReadOnly);

			// Sample
			$this->Sample->setDbValueDef($rsnew, $this->Sample->CurrentValue, NULL, $this->Sample->ReadOnly);

			// NoD
			$this->NoD->setDbValueDef($rsnew, $this->NoD->CurrentValue, NULL, $this->NoD->ReadOnly);

			// BillOrder
			$this->BillOrder->setDbValueDef($rsnew, $this->BillOrder->CurrentValue, NULL, $this->BillOrder->ReadOnly);

			// Inactive
			$this->Inactive->setDbValueDef($rsnew, $this->Inactive->CurrentValue, NULL, $this->Inactive->ReadOnly);

			// CollSample
			$this->CollSample->setDbValueDef($rsnew, $this->CollSample->CurrentValue, NULL, $this->CollSample->ReadOnly);

			// TestType
			$this->TestType->setDbValueDef($rsnew, $this->TestType->CurrentValue, NULL, $this->TestType->ReadOnly);

			// Repeated
			$this->Repeated->setDbValueDef($rsnew, $this->Repeated->CurrentValue, NULL, $this->Repeated->ReadOnly);

			// RepeatedBy
			$this->RepeatedBy->setDbValueDef($rsnew, $this->RepeatedBy->CurrentValue, NULL, $this->RepeatedBy->ReadOnly);

			// RepeatedDate
			$this->RepeatedDate->setDbValueDef($rsnew, UnFormatDateTime($this->RepeatedDate->CurrentValue, 0), NULL, $this->RepeatedDate->ReadOnly);

			// serviceID
			$this->serviceID->setDbValueDef($rsnew, $this->serviceID->CurrentValue, NULL, $this->serviceID->ReadOnly);

			// Service_Type
			$this->Service_Type->setDbValueDef($rsnew, $this->Service_Type->CurrentValue, NULL, $this->Service_Type->ReadOnly);

			// Service_Department
			$this->Service_Department->setDbValueDef($rsnew, $this->Service_Department->CurrentValue, NULL, $this->Service_Department->ReadOnly);

			// RequestNo
			$this->RequestNo->setDbValueDef($rsnew, $this->RequestNo->CurrentValue, NULL, $this->RequestNo->ReadOnly);

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
		$hash .= GetFieldHash($rs->fields('Services')); // Services
		$hash .= GetFieldHash($rs->fields('amount')); // amount
		$hash .= GetFieldHash($rs->fields('description')); // description
		$hash .= GetFieldHash($rs->fields('patient_type')); // patient_type
		$hash .= GetFieldHash($rs->fields('charged_date')); // charged_date
		$hash .= GetFieldHash($rs->fields('status')); // status
		$hash .= GetFieldHash($rs->fields('PatientName')); // PatientName
		$hash .= GetFieldHash($rs->fields('Age')); // Age
		$hash .= GetFieldHash($rs->fields('Gender')); // Gender
		$hash .= GetFieldHash($rs->fields('Unit')); // Unit
		$hash .= GetFieldHash($rs->fields('Quantity')); // Quantity
		$hash .= GetFieldHash($rs->fields('Discount')); // Discount
		$hash .= GetFieldHash($rs->fields('SubTotal')); // SubTotal
		$hash .= GetFieldHash($rs->fields('ServiceSelect')); // ServiceSelect
		$hash .= GetFieldHash($rs->fields('Aid')); // Aid
		$hash .= GetFieldHash($rs->fields('Vid')); // Vid
		$hash .= GetFieldHash($rs->fields('DrID')); // DrID
		$hash .= GetFieldHash($rs->fields('DrCODE')); // DrCODE
		$hash .= GetFieldHash($rs->fields('DrName')); // DrName
		$hash .= GetFieldHash($rs->fields('Department')); // Department
		$hash .= GetFieldHash($rs->fields('DrSharePres')); // DrSharePres
		$hash .= GetFieldHash($rs->fields('HospSharePres')); // HospSharePres
		$hash .= GetFieldHash($rs->fields('DrShareAmount')); // DrShareAmount
		$hash .= GetFieldHash($rs->fields('HospShareAmount')); // HospShareAmount
		$hash .= GetFieldHash($rs->fields('DrShareSettiledAmount')); // DrShareSettiledAmount
		$hash .= GetFieldHash($rs->fields('DrShareSettledId')); // DrShareSettledId
		$hash .= GetFieldHash($rs->fields('DrShareSettiledStatus')); // DrShareSettiledStatus
		$hash .= GetFieldHash($rs->fields('invoiceId')); // invoiceId
		$hash .= GetFieldHash($rs->fields('invoiceAmount')); // invoiceAmount
		$hash .= GetFieldHash($rs->fields('invoiceStatus')); // invoiceStatus
		$hash .= GetFieldHash($rs->fields('modeOfPayment')); // modeOfPayment
		$hash .= GetFieldHash($rs->fields('DiscountCategory')); // DiscountCategory
		$hash .= GetFieldHash($rs->fields('sid')); // sid
		$hash .= GetFieldHash($rs->fields('ItemCode')); // ItemCode
		$hash .= GetFieldHash($rs->fields('TestSubCd')); // TestSubCd
		$hash .= GetFieldHash($rs->fields('DEptCd')); // DEptCd
		$hash .= GetFieldHash($rs->fields('ProfCd')); // ProfCd
		$hash .= GetFieldHash($rs->fields('Comments')); // Comments
		$hash .= GetFieldHash($rs->fields('Method')); // Method
		$hash .= GetFieldHash($rs->fields('Specimen')); // Specimen
		$hash .= GetFieldHash($rs->fields('Abnormal')); // Abnormal
		$hash .= GetFieldHash($rs->fields('TestUnit')); // TestUnit
		$hash .= GetFieldHash($rs->fields('LOWHIGH')); // LOWHIGH
		$hash .= GetFieldHash($rs->fields('Branch')); // Branch
		$hash .= GetFieldHash($rs->fields('Dispatch')); // Dispatch
		$hash .= GetFieldHash($rs->fields('Pic1')); // Pic1
		$hash .= GetFieldHash($rs->fields('Pic2')); // Pic2
		$hash .= GetFieldHash($rs->fields('GraphPath')); // GraphPath
		$hash .= GetFieldHash($rs->fields('MachineCD')); // MachineCD
		$hash .= GetFieldHash($rs->fields('TestCancel')); // TestCancel
		$hash .= GetFieldHash($rs->fields('OutSource')); // OutSource
		$hash .= GetFieldHash($rs->fields('Printed')); // Printed
		$hash .= GetFieldHash($rs->fields('PrintBy')); // PrintBy
		$hash .= GetFieldHash($rs->fields('PrintDate')); // PrintDate
		$hash .= GetFieldHash($rs->fields('BillingDate')); // BillingDate
		$hash .= GetFieldHash($rs->fields('BilledBy')); // BilledBy
		$hash .= GetFieldHash($rs->fields('Resulted')); // Resulted
		$hash .= GetFieldHash($rs->fields('ResultDate')); // ResultDate
		$hash .= GetFieldHash($rs->fields('ResultedBy')); // ResultedBy
		$hash .= GetFieldHash($rs->fields('SampleDate')); // SampleDate
		$hash .= GetFieldHash($rs->fields('SampleUser')); // SampleUser
		$hash .= GetFieldHash($rs->fields('Sampled')); // Sampled
		$hash .= GetFieldHash($rs->fields('ReceivedDate')); // ReceivedDate
		$hash .= GetFieldHash($rs->fields('ReceivedUser')); // ReceivedUser
		$hash .= GetFieldHash($rs->fields('Recevied')); // Recevied
		$hash .= GetFieldHash($rs->fields('DeptRecvDate')); // DeptRecvDate
		$hash .= GetFieldHash($rs->fields('DeptRecvUser')); // DeptRecvUser
		$hash .= GetFieldHash($rs->fields('DeptRecived')); // DeptRecived
		$hash .= GetFieldHash($rs->fields('SAuthDate')); // SAuthDate
		$hash .= GetFieldHash($rs->fields('SAuthBy')); // SAuthBy
		$hash .= GetFieldHash($rs->fields('SAuthendicate')); // SAuthendicate
		$hash .= GetFieldHash($rs->fields('AuthDate')); // AuthDate
		$hash .= GetFieldHash($rs->fields('AuthBy')); // AuthBy
		$hash .= GetFieldHash($rs->fields('Authencate')); // Authencate
		$hash .= GetFieldHash($rs->fields('EditDate')); // EditDate
		$hash .= GetFieldHash($rs->fields('EditBy')); // EditBy
		$hash .= GetFieldHash($rs->fields('Editted')); // Editted
		$hash .= GetFieldHash($rs->fields('PatID')); // PatID
		$hash .= GetFieldHash($rs->fields('PatientId')); // PatientId
		$hash .= GetFieldHash($rs->fields('Mobile')); // Mobile
		$hash .= GetFieldHash($rs->fields('CId')); // CId
		$hash .= GetFieldHash($rs->fields('Order')); // Order
		$hash .= GetFieldHash($rs->fields('ResType')); // ResType
		$hash .= GetFieldHash($rs->fields('Sample')); // Sample
		$hash .= GetFieldHash($rs->fields('NoD')); // NoD
		$hash .= GetFieldHash($rs->fields('BillOrder')); // BillOrder
		$hash .= GetFieldHash($rs->fields('Inactive')); // Inactive
		$hash .= GetFieldHash($rs->fields('CollSample')); // CollSample
		$hash .= GetFieldHash($rs->fields('TestType')); // TestType
		$hash .= GetFieldHash($rs->fields('Repeated')); // Repeated
		$hash .= GetFieldHash($rs->fields('RepeatedBy')); // RepeatedBy
		$hash .= GetFieldHash($rs->fields('RepeatedDate')); // RepeatedDate
		$hash .= GetFieldHash($rs->fields('serviceID')); // serviceID
		$hash .= GetFieldHash($rs->fields('Service_Type')); // Service_Type
		$hash .= GetFieldHash($rs->fields('Service_Department')); // Service_Department
		$hash .= GetFieldHash($rs->fields('RequestNo')); // RequestNo
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

		// Reception
		$this->Reception->setDbValueDef($rsnew, $this->Reception->CurrentValue, NULL, FALSE);

		// Services
		$this->Services->setDbValueDef($rsnew, $this->Services->CurrentValue, "", FALSE);

		// amount
		$this->amount->setDbValueDef($rsnew, $this->amount->CurrentValue, 0, FALSE);

		// description
		$this->description->setDbValueDef($rsnew, $this->description->CurrentValue, NULL, FALSE);

		// patient_type
		$this->patient_type->setDbValueDef($rsnew, $this->patient_type->CurrentValue, NULL, FALSE);

		// charged_date
		$this->charged_date->CurrentValue = CurrentDate();
		$this->charged_date->setDbValueDef($rsnew, $this->charged_date->CurrentValue, NULL);

		// status
		$this->status->setDbValueDef($rsnew, $this->status->CurrentValue, NULL, FALSE);

		// mrnno
		$this->mrnno->setDbValueDef($rsnew, $this->mrnno->CurrentValue, NULL, FALSE);

		// PatientName
		$this->PatientName->setDbValueDef($rsnew, $this->PatientName->CurrentValue, NULL, FALSE);

		// Age
		$this->Age->setDbValueDef($rsnew, $this->Age->CurrentValue, NULL, FALSE);

		// Gender
		$this->Gender->setDbValueDef($rsnew, $this->Gender->CurrentValue, NULL, FALSE);

		// Unit
		$this->Unit->setDbValueDef($rsnew, $this->Unit->CurrentValue, NULL, FALSE);

		// Quantity
		$this->Quantity->setDbValueDef($rsnew, $this->Quantity->CurrentValue, NULL, FALSE);

		// Discount
		$this->Discount->setDbValueDef($rsnew, $this->Discount->CurrentValue, NULL, FALSE);

		// SubTotal
		$this->SubTotal->setDbValueDef($rsnew, $this->SubTotal->CurrentValue, NULL, FALSE);

		// ServiceSelect
		$this->ServiceSelect->setDbValueDef($rsnew, $this->ServiceSelect->CurrentValue, "", FALSE);

		// Aid
		$this->Aid->setDbValueDef($rsnew, $this->Aid->CurrentValue, NULL, FALSE);

		// Vid
		$this->Vid->setDbValueDef($rsnew, $this->Vid->CurrentValue, NULL, FALSE);

		// DrID
		$this->DrID->setDbValueDef($rsnew, $this->DrID->CurrentValue, NULL, FALSE);

		// DrCODE
		$this->DrCODE->setDbValueDef($rsnew, $this->DrCODE->CurrentValue, NULL, FALSE);

		// DrName
		$this->DrName->setDbValueDef($rsnew, $this->DrName->CurrentValue, NULL, FALSE);

		// Department
		$this->Department->setDbValueDef($rsnew, $this->Department->CurrentValue, NULL, FALSE);

		// DrSharePres
		$this->DrSharePres->setDbValueDef($rsnew, $this->DrSharePres->CurrentValue, NULL, FALSE);

		// HospSharePres
		$this->HospSharePres->setDbValueDef($rsnew, $this->HospSharePres->CurrentValue, NULL, FALSE);

		// DrShareAmount
		$this->DrShareAmount->setDbValueDef($rsnew, $this->DrShareAmount->CurrentValue, NULL, FALSE);

		// HospShareAmount
		$this->HospShareAmount->setDbValueDef($rsnew, $this->HospShareAmount->CurrentValue, NULL, FALSE);

		// DrShareSettiledAmount
		$this->DrShareSettiledAmount->setDbValueDef($rsnew, $this->DrShareSettiledAmount->CurrentValue, NULL, FALSE);

		// DrShareSettledId
		$this->DrShareSettledId->setDbValueDef($rsnew, $this->DrShareSettledId->CurrentValue, NULL, FALSE);

		// DrShareSettiledStatus
		$this->DrShareSettiledStatus->setDbValueDef($rsnew, $this->DrShareSettiledStatus->CurrentValue, NULL, FALSE);

		// invoiceId
		$this->invoiceId->setDbValueDef($rsnew, $this->invoiceId->CurrentValue, NULL, FALSE);

		// invoiceAmount
		$this->invoiceAmount->setDbValueDef($rsnew, $this->invoiceAmount->CurrentValue, NULL, FALSE);

		// invoiceStatus
		$this->invoiceStatus->setDbValueDef($rsnew, $this->invoiceStatus->CurrentValue, NULL, FALSE);

		// modeOfPayment
		$this->modeOfPayment->setDbValueDef($rsnew, $this->modeOfPayment->CurrentValue, NULL, FALSE);

		// HospID
		$this->HospID->CurrentValue = HospitalID();
		$this->HospID->setDbValueDef($rsnew, $this->HospID->CurrentValue, NULL);

		// RIDNO
		$this->RIDNO->setDbValueDef($rsnew, $this->RIDNO->CurrentValue, NULL, FALSE);

		// TidNo
		$this->TidNo->setDbValueDef($rsnew, $this->TidNo->CurrentValue, NULL, FALSE);

		// DiscountCategory
		$this->DiscountCategory->setDbValueDef($rsnew, $this->DiscountCategory->CurrentValue, NULL, FALSE);

		// sid
		$this->sid->setDbValueDef($rsnew, $this->sid->CurrentValue, NULL, FALSE);

		// ItemCode
		$this->ItemCode->setDbValueDef($rsnew, $this->ItemCode->CurrentValue, NULL, FALSE);

		// TestSubCd
		$this->TestSubCd->setDbValueDef($rsnew, $this->TestSubCd->CurrentValue, NULL, FALSE);

		// DEptCd
		$this->DEptCd->setDbValueDef($rsnew, $this->DEptCd->CurrentValue, NULL, FALSE);

		// ProfCd
		$this->ProfCd->setDbValueDef($rsnew, $this->ProfCd->CurrentValue, NULL, FALSE);

		// Comments
		$this->Comments->setDbValueDef($rsnew, $this->Comments->CurrentValue, NULL, FALSE);

		// Method
		$this->Method->setDbValueDef($rsnew, $this->Method->CurrentValue, NULL, FALSE);

		// Specimen
		$this->Specimen->setDbValueDef($rsnew, $this->Specimen->CurrentValue, NULL, FALSE);

		// Abnormal
		$this->Abnormal->setDbValueDef($rsnew, $this->Abnormal->CurrentValue, NULL, FALSE);

		// TestUnit
		$this->TestUnit->setDbValueDef($rsnew, $this->TestUnit->CurrentValue, NULL, FALSE);

		// LOWHIGH
		$this->LOWHIGH->setDbValueDef($rsnew, $this->LOWHIGH->CurrentValue, NULL, FALSE);

		// Branch
		$this->Branch->setDbValueDef($rsnew, $this->Branch->CurrentValue, NULL, FALSE);

		// Dispatch
		$this->Dispatch->setDbValueDef($rsnew, $this->Dispatch->CurrentValue, NULL, FALSE);

		// Pic1
		$this->Pic1->setDbValueDef($rsnew, $this->Pic1->CurrentValue, NULL, FALSE);

		// Pic2
		$this->Pic2->setDbValueDef($rsnew, $this->Pic2->CurrentValue, NULL, FALSE);

		// GraphPath
		$this->GraphPath->setDbValueDef($rsnew, $this->GraphPath->CurrentValue, NULL, FALSE);

		// MachineCD
		$this->MachineCD->setDbValueDef($rsnew, $this->MachineCD->CurrentValue, NULL, FALSE);

		// TestCancel
		$this->TestCancel->setDbValueDef($rsnew, $this->TestCancel->CurrentValue, NULL, FALSE);

		// OutSource
		$this->OutSource->setDbValueDef($rsnew, $this->OutSource->CurrentValue, NULL, FALSE);

		// Printed
		$this->Printed->setDbValueDef($rsnew, $this->Printed->CurrentValue, NULL, FALSE);

		// PrintBy
		$this->PrintBy->setDbValueDef($rsnew, $this->PrintBy->CurrentValue, NULL, FALSE);

		// PrintDate
		$this->PrintDate->setDbValueDef($rsnew, UnFormatDateTime($this->PrintDate->CurrentValue, 0), NULL, FALSE);

		// BillingDate
		$this->BillingDate->setDbValueDef($rsnew, UnFormatDateTime($this->BillingDate->CurrentValue, 0), NULL, FALSE);

		// BilledBy
		$this->BilledBy->setDbValueDef($rsnew, $this->BilledBy->CurrentValue, NULL, FALSE);

		// Resulted
		$this->Resulted->setDbValueDef($rsnew, $this->Resulted->CurrentValue, NULL, FALSE);

		// ResultDate
		$this->ResultDate->setDbValueDef($rsnew, UnFormatDateTime($this->ResultDate->CurrentValue, 0), NULL, FALSE);

		// ResultedBy
		$this->ResultedBy->setDbValueDef($rsnew, $this->ResultedBy->CurrentValue, NULL, FALSE);

		// SampleDate
		$this->SampleDate->setDbValueDef($rsnew, UnFormatDateTime($this->SampleDate->CurrentValue, 0), NULL, FALSE);

		// SampleUser
		$this->SampleUser->setDbValueDef($rsnew, $this->SampleUser->CurrentValue, NULL, FALSE);

		// Sampled
		$this->Sampled->setDbValueDef($rsnew, $this->Sampled->CurrentValue, NULL, FALSE);

		// ReceivedDate
		$this->ReceivedDate->setDbValueDef($rsnew, UnFormatDateTime($this->ReceivedDate->CurrentValue, 0), NULL, FALSE);

		// ReceivedUser
		$this->ReceivedUser->setDbValueDef($rsnew, $this->ReceivedUser->CurrentValue, NULL, FALSE);

		// Recevied
		$this->Recevied->setDbValueDef($rsnew, $this->Recevied->CurrentValue, NULL, FALSE);

		// DeptRecvDate
		$this->DeptRecvDate->setDbValueDef($rsnew, UnFormatDateTime($this->DeptRecvDate->CurrentValue, 0), NULL, FALSE);

		// DeptRecvUser
		$this->DeptRecvUser->setDbValueDef($rsnew, $this->DeptRecvUser->CurrentValue, NULL, FALSE);

		// DeptRecived
		$this->DeptRecived->setDbValueDef($rsnew, $this->DeptRecived->CurrentValue, NULL, FALSE);

		// SAuthDate
		$this->SAuthDate->setDbValueDef($rsnew, UnFormatDateTime($this->SAuthDate->CurrentValue, 0), NULL, FALSE);

		// SAuthBy
		$this->SAuthBy->setDbValueDef($rsnew, $this->SAuthBy->CurrentValue, NULL, FALSE);

		// SAuthendicate
		$this->SAuthendicate->setDbValueDef($rsnew, $this->SAuthendicate->CurrentValue, NULL, FALSE);

		// AuthDate
		$this->AuthDate->setDbValueDef($rsnew, UnFormatDateTime($this->AuthDate->CurrentValue, 0), NULL, FALSE);

		// AuthBy
		$this->AuthBy->setDbValueDef($rsnew, $this->AuthBy->CurrentValue, NULL, FALSE);

		// Authencate
		$this->Authencate->setDbValueDef($rsnew, $this->Authencate->CurrentValue, NULL, FALSE);

		// EditDate
		$this->EditDate->setDbValueDef($rsnew, UnFormatDateTime($this->EditDate->CurrentValue, 0), NULL, FALSE);

		// EditBy
		$this->EditBy->setDbValueDef($rsnew, $this->EditBy->CurrentValue, NULL, FALSE);

		// Editted
		$this->Editted->setDbValueDef($rsnew, $this->Editted->CurrentValue, NULL, FALSE);

		// PatID
		$this->PatID->setDbValueDef($rsnew, $this->PatID->CurrentValue, NULL, FALSE);

		// PatientId
		$this->PatientId->setDbValueDef($rsnew, $this->PatientId->CurrentValue, NULL, FALSE);

		// Mobile
		$this->Mobile->setDbValueDef($rsnew, $this->Mobile->CurrentValue, NULL, FALSE);

		// CId
		$this->CId->setDbValueDef($rsnew, $this->CId->CurrentValue, NULL, FALSE);

		// Order
		$this->Order->setDbValueDef($rsnew, $this->Order->CurrentValue, NULL, FALSE);

		// ResType
		$this->ResType->setDbValueDef($rsnew, $this->ResType->CurrentValue, NULL, FALSE);

		// Sample
		$this->Sample->setDbValueDef($rsnew, $this->Sample->CurrentValue, NULL, FALSE);

		// NoD
		$this->NoD->setDbValueDef($rsnew, $this->NoD->CurrentValue, NULL, FALSE);

		// BillOrder
		$this->BillOrder->setDbValueDef($rsnew, $this->BillOrder->CurrentValue, NULL, FALSE);

		// Inactive
		$this->Inactive->setDbValueDef($rsnew, $this->Inactive->CurrentValue, NULL, FALSE);

		// CollSample
		$this->CollSample->setDbValueDef($rsnew, $this->CollSample->CurrentValue, NULL, FALSE);

		// TestType
		$this->TestType->setDbValueDef($rsnew, $this->TestType->CurrentValue, NULL, strval($this->TestType->CurrentValue) == "");

		// Repeated
		$this->Repeated->setDbValueDef($rsnew, $this->Repeated->CurrentValue, NULL, FALSE);

		// RepeatedBy
		$this->RepeatedBy->setDbValueDef($rsnew, $this->RepeatedBy->CurrentValue, NULL, FALSE);

		// RepeatedDate
		$this->RepeatedDate->setDbValueDef($rsnew, UnFormatDateTime($this->RepeatedDate->CurrentValue, 0), NULL, FALSE);

		// serviceID
		$this->serviceID->setDbValueDef($rsnew, $this->serviceID->CurrentValue, NULL, FALSE);

		// Service_Type
		$this->Service_Type->setDbValueDef($rsnew, $this->Service_Type->CurrentValue, NULL, FALSE);

		// Service_Department
		$this->Service_Department->setDbValueDef($rsnew, $this->Service_Department->CurrentValue, NULL, FALSE);

		// RequestNo
		$this->RequestNo->setDbValueDef($rsnew, $this->RequestNo->CurrentValue, NULL, strval($this->RequestNo->CurrentValue) == "");

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
		$this->Reception->AdvancedSearch->load();
		$this->Services->AdvancedSearch->load();
		$this->amount->AdvancedSearch->load();
		$this->description->AdvancedSearch->load();
		$this->patient_type->AdvancedSearch->load();
		$this->charged_date->AdvancedSearch->load();
		$this->status->AdvancedSearch->load();
		$this->createdby->AdvancedSearch->load();
		$this->createddatetime->AdvancedSearch->load();
		$this->modifiedby->AdvancedSearch->load();
		$this->modifieddatetime->AdvancedSearch->load();
		$this->mrnno->AdvancedSearch->load();
		$this->PatientName->AdvancedSearch->load();
		$this->Age->AdvancedSearch->load();
		$this->Gender->AdvancedSearch->load();
		$this->profilePic->AdvancedSearch->load();
		$this->Unit->AdvancedSearch->load();
		$this->Quantity->AdvancedSearch->load();
		$this->Discount->AdvancedSearch->load();
		$this->SubTotal->AdvancedSearch->load();
		$this->ServiceSelect->AdvancedSearch->load();
		$this->Aid->AdvancedSearch->load();
		$this->Vid->AdvancedSearch->load();
		$this->DrID->AdvancedSearch->load();
		$this->DrCODE->AdvancedSearch->load();
		$this->DrName->AdvancedSearch->load();
		$this->Department->AdvancedSearch->load();
		$this->DrSharePres->AdvancedSearch->load();
		$this->HospSharePres->AdvancedSearch->load();
		$this->DrShareAmount->AdvancedSearch->load();
		$this->HospShareAmount->AdvancedSearch->load();
		$this->DrShareSettiledAmount->AdvancedSearch->load();
		$this->DrShareSettledId->AdvancedSearch->load();
		$this->DrShareSettiledStatus->AdvancedSearch->load();
		$this->invoiceId->AdvancedSearch->load();
		$this->invoiceAmount->AdvancedSearch->load();
		$this->invoiceStatus->AdvancedSearch->load();
		$this->modeOfPayment->AdvancedSearch->load();
		$this->HospID->AdvancedSearch->load();
		$this->RIDNO->AdvancedSearch->load();
		$this->TidNo->AdvancedSearch->load();
		$this->DiscountCategory->AdvancedSearch->load();
		$this->sid->AdvancedSearch->load();
		$this->ItemCode->AdvancedSearch->load();
		$this->TestSubCd->AdvancedSearch->load();
		$this->DEptCd->AdvancedSearch->load();
		$this->ProfCd->AdvancedSearch->load();
		$this->LabReport->AdvancedSearch->load();
		$this->Comments->AdvancedSearch->load();
		$this->Method->AdvancedSearch->load();
		$this->Specimen->AdvancedSearch->load();
		$this->Abnormal->AdvancedSearch->load();
		$this->RefValue->AdvancedSearch->load();
		$this->TestUnit->AdvancedSearch->load();
		$this->LOWHIGH->AdvancedSearch->load();
		$this->Branch->AdvancedSearch->load();
		$this->Dispatch->AdvancedSearch->load();
		$this->Pic1->AdvancedSearch->load();
		$this->Pic2->AdvancedSearch->load();
		$this->GraphPath->AdvancedSearch->load();
		$this->MachineCD->AdvancedSearch->load();
		$this->TestCancel->AdvancedSearch->load();
		$this->OutSource->AdvancedSearch->load();
		$this->Printed->AdvancedSearch->load();
		$this->PrintBy->AdvancedSearch->load();
		$this->PrintDate->AdvancedSearch->load();
		$this->BillingDate->AdvancedSearch->load();
		$this->BilledBy->AdvancedSearch->load();
		$this->Resulted->AdvancedSearch->load();
		$this->ResultDate->AdvancedSearch->load();
		$this->ResultedBy->AdvancedSearch->load();
		$this->SampleDate->AdvancedSearch->load();
		$this->SampleUser->AdvancedSearch->load();
		$this->Sampled->AdvancedSearch->load();
		$this->ReceivedDate->AdvancedSearch->load();
		$this->ReceivedUser->AdvancedSearch->load();
		$this->Recevied->AdvancedSearch->load();
		$this->DeptRecvDate->AdvancedSearch->load();
		$this->DeptRecvUser->AdvancedSearch->load();
		$this->DeptRecived->AdvancedSearch->load();
		$this->SAuthDate->AdvancedSearch->load();
		$this->SAuthBy->AdvancedSearch->load();
		$this->SAuthendicate->AdvancedSearch->load();
		$this->AuthDate->AdvancedSearch->load();
		$this->AuthBy->AdvancedSearch->load();
		$this->Authencate->AdvancedSearch->load();
		$this->EditDate->AdvancedSearch->load();
		$this->EditBy->AdvancedSearch->load();
		$this->Editted->AdvancedSearch->load();
		$this->PatID->AdvancedSearch->load();
		$this->PatientId->AdvancedSearch->load();
		$this->Mobile->AdvancedSearch->load();
		$this->CId->AdvancedSearch->load();
		$this->Order->AdvancedSearch->load();
		$this->Form->AdvancedSearch->load();
		$this->ResType->AdvancedSearch->load();
		$this->Sample->AdvancedSearch->load();
		$this->NoD->AdvancedSearch->load();
		$this->BillOrder->AdvancedSearch->load();
		$this->Formula->AdvancedSearch->load();
		$this->Inactive->AdvancedSearch->load();
		$this->CollSample->AdvancedSearch->load();
		$this->TestType->AdvancedSearch->load();
		$this->Repeated->AdvancedSearch->load();
		$this->RepeatedBy->AdvancedSearch->load();
		$this->RepeatedDate->AdvancedSearch->load();
		$this->serviceID->AdvancedSearch->load();
		$this->Service_Type->AdvancedSearch->load();
		$this->Service_Department->AdvancedSearch->load();
		$this->RequestNo->AdvancedSearch->load();
	}

	// Get export HTML tag
	protected function getExportTag($type, $custom = FALSE)
	{
		global $Language;
		if (SameText($type, "excel")) {
			if ($custom)
				return "<a href=\"#\" class=\"ew-export-link ew-excel\" title=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" onclick=\"return ew.export(document.fpatient_serviceslist, '" . $this->ExportExcelUrl . "', 'excel', true);\">" . $Language->phrase("ExportToExcel") . "</a>";
			else
				return "<a href=\"" . $this->ExportExcelUrl . "\" class=\"ew-export-link ew-excel\" title=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\">" . $Language->phrase("ExportToExcel") . "</a>";
		} elseif (SameText($type, "word")) {
			if ($custom)
				return "<a href=\"#\" class=\"ew-export-link ew-word\" title=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" onclick=\"return ew.export(document.fpatient_serviceslist, '" . $this->ExportWordUrl . "', 'word', true);\">" . $Language->phrase("ExportToWord") . "</a>";
			else
				return "<a href=\"" . $this->ExportWordUrl . "\" class=\"ew-export-link ew-word\" title=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\">" . $Language->phrase("ExportToWord") . "</a>";
		} elseif (SameText($type, "pdf")) {
			if ($custom)
				return "<a href=\"#\" class=\"ew-export-link ew-pdf\" title=\"" . HtmlEncode($Language->phrase("ExportToPDFText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToPDFText")) . "\" onclick=\"return ew.export(document.fpatient_serviceslist, '" . $this->ExportPdfUrl . "', 'pdf', true);\">" . $Language->phrase("ExportToPDF") . "</a>";
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
			return '<button id="emf_patient_services" class="ew-export-link ew-email" title="' . $Language->phrase("ExportToEmailText") . '" data-caption="' . $Language->phrase("ExportToEmailText") . '" onclick="ew.emailDialogShow({lnk:\'emf_patient_services\', hdr:ew.language.phrase(\'ExportToEmailText\'), f:document.fpatient_serviceslist, sel:false' . $url . '});">' . $Language->phrase("ExportToEmail") . '</button>';
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
		$item->Visible = TRUE;

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
		$item->Body = "<a class=\"btn btn-default ew-search-toggle" . $searchToggleClass . "\" href=\"#\" role=\"button\" title=\"" . $Language->phrase("SearchPanel") . "\" data-caption=\"" . $Language->phrase("SearchPanel") . "\" data-toggle=\"button\" data-form=\"fpatient_serviceslistsrch\" aria-pressed=\"" . ($searchToggleClass == " active" ? "true" : "false") . "\">" . $Language->phrase("SearchLink") . "</a>";
		$item->Visible = TRUE;

		// Show all button
		$item = &$this->SearchOptions->add("showall");
		$item->Body = "<a class=\"btn btn-default ew-show-all\" title=\"" . $Language->phrase("ShowAll") . "\" data-caption=\"" . $Language->phrase("ShowAll") . "\" href=\"" . $this->pageUrl() . "cmd=reset\">" . $Language->phrase("ShowAllBtn") . "</a>";
		$item->Visible = ($this->SearchWhere != $this->DefaultSearchWhere && $this->SearchWhere != "0=101");

		// Advanced search button
		$item = &$this->SearchOptions->add("advancedsearch");
		$item->Body = "<a class=\"btn btn-default ew-advanced-search\" title=\"" . $Language->phrase("AdvancedSearch") . "\" data-caption=\"" . $Language->phrase("AdvancedSearch") . "\" href=\"patient_servicessrch.php\">" . $Language->phrase("AdvancedSearchBtn") . "</a>";
		$item->Visible = TRUE;

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
		if (Config("EXPORT_MASTER_RECORD") && $this->getMasterFilter() != "" && $this->getCurrentMasterTable() == "billing_voucher") {
			global $billing_voucher;
			if (!isset($billing_voucher))
				$billing_voucher = new billing_voucher();
			$rsmaster = $billing_voucher->loadRs($this->DbMasterFilter); // Load master record
			if ($rsmaster && !$rsmaster->EOF) {
				$exportStyle = $doc->Style;
				$doc->setStyle("v"); // Change to vertical
				if (!$this->isExport("csv") || Config("EXPORT_MASTER_RECORD_FOR_CSV")) {
					$doc->Table = &$billing_voucher;
					$billing_voucher->exportDocument($doc, $rsmaster);
					$doc->exportEmptyRow();
					$doc->Table = &$this;
				}
				$doc->setStyle($exportStyle); // Restore
				$rsmaster->close();
			}
		}

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
			if ($masterTblVar == "billing_voucher") {
				$validMaster = TRUE;
				if (($parm = Get("fk_id", Get("Vid"))) !== NULL) {
					$GLOBALS["billing_voucher"]->id->setQueryStringValue($parm);
					$this->Vid->setQueryStringValue($GLOBALS["billing_voucher"]->id->QueryStringValue);
					$this->Vid->setSessionValue($this->Vid->QueryStringValue);
					if (!is_numeric($GLOBALS["billing_voucher"]->id->QueryStringValue))
						$validMaster = FALSE;
				} else {
					$validMaster = FALSE;
				}
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
				if (($parm = Get("fk_mrnNo", Get("mrnno"))) !== NULL) {
					$GLOBALS["ip_admission"]->mrnNo->setQueryStringValue($parm);
					$this->mrnno->setQueryStringValue($GLOBALS["ip_admission"]->mrnNo->QueryStringValue);
					$this->mrnno->setSessionValue($this->mrnno->QueryStringValue);
				} else {
					$validMaster = FALSE;
				}
				if (($parm = Get("fk_patient_id", Get("PatID"))) !== NULL) {
					$GLOBALS["ip_admission"]->patient_id->setQueryStringValue($parm);
					$this->PatID->setQueryStringValue($GLOBALS["ip_admission"]->patient_id->QueryStringValue);
					$this->PatID->setSessionValue($this->PatID->QueryStringValue);
					if (!is_numeric($GLOBALS["ip_admission"]->patient_id->QueryStringValue))
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
			if ($masterTblVar == "billing_voucher") {
				$validMaster = TRUE;
				if (($parm = Post("fk_id", Post("Vid"))) !== NULL) {
					$GLOBALS["billing_voucher"]->id->setFormValue($parm);
					$this->Vid->setFormValue($GLOBALS["billing_voucher"]->id->FormValue);
					$this->Vid->setSessionValue($this->Vid->FormValue);
					if (!is_numeric($GLOBALS["billing_voucher"]->id->FormValue))
						$validMaster = FALSE;
				} else {
					$validMaster = FALSE;
				}
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
				if (($parm = Post("fk_mrnNo", Post("mrnno"))) !== NULL) {
					$GLOBALS["ip_admission"]->mrnNo->setFormValue($parm);
					$this->mrnno->setFormValue($GLOBALS["ip_admission"]->mrnNo->FormValue);
					$this->mrnno->setSessionValue($this->mrnno->FormValue);
				} else {
					$validMaster = FALSE;
				}
				if (($parm = Post("fk_patient_id", Post("PatID"))) !== NULL) {
					$GLOBALS["ip_admission"]->patient_id->setFormValue($parm);
					$this->PatID->setFormValue($GLOBALS["ip_admission"]->patient_id->FormValue);
					$this->PatID->setSessionValue($this->PatID->FormValue);
					if (!is_numeric($GLOBALS["ip_admission"]->patient_id->FormValue))
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
			if ($masterTblVar != "billing_voucher") {
				if ($this->Vid->CurrentValue == "")
					$this->Vid->setSessionValue("");
			}
			if ($masterTblVar != "ip_admission") {
				if ($this->Reception->CurrentValue == "")
					$this->Reception->setSessionValue("");
				if ($this->mrnno->CurrentValue == "")
					$this->mrnno->setSessionValue("");
				if ($this->PatID->CurrentValue == "")
					$this->PatID->setSessionValue("");
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
				case "x_Services":
					$lookupFilter = function() {
						return "`Inactive` != 'Y'";
					};
					$lookupFilter = $lookupFilter->bindTo($this);
					break;
				case "x_status":
					break;
				case "x_ServiceSelect":
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
						case "x_Services":
							break;
						case "x_status":
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
		$curPage = $_GET['showmaster'];
		if( $curPage == 'view_appointment_scheduler')
		{

		//	$this->GridAddRowCount = 40;
		}
		else{

		//	$this->GridAddRowCount = 40;
		}
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
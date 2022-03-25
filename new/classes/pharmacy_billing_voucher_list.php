<?php
namespace PHPMaker2020\HIMS;

/**
 * Page class
 */
class pharmacy_billing_voucher_list extends pharmacy_billing_voucher
{

	// Page ID
	public $PageID = "list";

	// Project ID
	public $ProjectID = "{EA4F6D13-AF8F-428D-9EA7-BA88D1107EC3}";

	// Table name
	public $TableName = 'pharmacy_billing_voucher';

	// Page object name
	public $PageObjName = "pharmacy_billing_voucher_list";

	// Grid form hidden field names
	public $FormName = "fpharmacy_billing_voucherlist";
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

		// Table object (pharmacy_billing_voucher)
		if (!isset($GLOBALS["pharmacy_billing_voucher"]) || get_class($GLOBALS["pharmacy_billing_voucher"]) == PROJECT_NAMESPACE . "pharmacy_billing_voucher") {
			$GLOBALS["pharmacy_billing_voucher"] = &$this;
			$GLOBALS["Table"] = &$GLOBALS["pharmacy_billing_voucher"];
		}

		// Initialize URLs
		$this->ExportPrintUrl = $this->pageUrl() . "export=print";
		$this->ExportExcelUrl = $this->pageUrl() . "export=excel";
		$this->ExportWordUrl = $this->pageUrl() . "export=word";
		$this->ExportPdfUrl = $this->pageUrl() . "export=pdf";
		$this->ExportHtmlUrl = $this->pageUrl() . "export=html";
		$this->ExportXmlUrl = $this->pageUrl() . "export=xml";
		$this->ExportCsvUrl = $this->pageUrl() . "export=csv";
		$this->AddUrl = "pharmacy_billing_voucheradd.php?" . Config("TABLE_SHOW_DETAIL") . "=";
		$this->InlineAddUrl = $this->pageUrl() . "action=add";
		$this->GridAddUrl = $this->pageUrl() . "action=gridadd";
		$this->GridEditUrl = $this->pageUrl() . "action=gridedit";
		$this->MultiDeleteUrl = "pharmacy_billing_voucherdelete.php";
		$this->MultiUpdateUrl = "pharmacy_billing_voucherupdate.php";

		// Table object (user_login)
		if (!isset($GLOBALS['user_login']))
			$GLOBALS['user_login'] = new user_login();

		// Page ID (for backward compatibility only)
		if (!defined(PROJECT_NAMESPACE . "PAGE_ID"))
			define(PROJECT_NAMESPACE . "PAGE_ID", 'list');

		// Table name (for backward compatibility only)
		if (!defined(PROJECT_NAMESPACE . "TABLE_NAME"))
			define(PROJECT_NAMESPACE . "TABLE_NAME", 'pharmacy_billing_voucher');

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
		$this->FilterOptions->TagClassName = "ew-filter-option fpharmacy_billing_voucherlistsrch";

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
		global $pharmacy_billing_voucher;
		if ($this->CustomExport && $this->CustomExport == $this->Export && array_key_exists($this->CustomExport, Config("EXPORT_CLASSES"))) {
				$content = ob_get_contents();
			if ($ExportFileName == "")
				$ExportFileName = $this->TableVar;
			$class = PROJECT_NAMESPACE . Config("EXPORT_CLASSES." . $this->CustomExport);
			if (class_exists($class)) {
				$doc = new $class($pharmacy_billing_voucher);
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
		if ($this->isAddOrEdit())
			$this->UserName->Visible = FALSE;
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
		$this->BillNumber->setVisibility();
		$this->voucher_type->Visible = FALSE;
		$this->Reception->Visible = FALSE;
		$this->PatientId->setVisibility();
		$this->PatientName->setVisibility();
		$this->Mobile->setVisibility();
		$this->Age->Visible = FALSE;
		$this->mrnno->setVisibility();
		$this->IP_OP->setVisibility();
		$this->Doctor->setVisibility();
		$this->Gender->Visible = FALSE;
		$this->Details->Visible = FALSE;
		$this->ModeofPayment->setVisibility();
		$this->Amount->setVisibility();
		$this->AnyDues->setVisibility();
		$this->createdby->setVisibility();
		$this->createddatetime->setVisibility();
		$this->modifiedby->setVisibility();
		$this->modifieddatetime->setVisibility();
		$this->RealizationAmount->setVisibility();
		$this->RealizationStatus->Visible = FALSE;
		$this->RealizationRemarks->Visible = FALSE;
		$this->RealizationBatchNo->Visible = FALSE;
		$this->RealizationDate->Visible = FALSE;
		$this->HospID->Visible = FALSE;
		$this->RIDNO->Visible = FALSE;
		$this->TidNo->Visible = FALSE;
		$this->CId->setVisibility();
		$this->PartnerName->setVisibility();
		$this->PayerType->Visible = FALSE;
		$this->profilePic->Visible = FALSE;
		$this->Dob->Visible = FALSE;
		$this->Currency->Visible = FALSE;
		$this->DiscountRemarks->Visible = FALSE;
		$this->Remarks->Visible = FALSE;
		$this->PatId->Visible = FALSE;
		$this->DrDepartment->Visible = FALSE;
		$this->RefferedBy->Visible = FALSE;
		$this->CardNumber->setVisibility();
		$this->BankName->Visible = FALSE;
		$this->DrID->Visible = FALSE;
		$this->BillStatus->setVisibility();
		$this->ReportHeader->setVisibility();
		$this->PharID->setVisibility();
		$this->UserName->setVisibility();
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
		$this->setupLookupOptions($this->Reception);
		$this->setupLookupOptions($this->ModeofPayment);
		$this->setupLookupOptions($this->RIDNO);
		$this->setupLookupOptions($this->CId);
		$this->setupLookupOptions($this->PatId);
		$this->setupLookupOptions($this->RefferedBy);
		$this->setupLookupOptions($this->DrID);

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

	// Exit inline mode
	protected function clearInlineMode()
	{
		$this->Amount->FormValue = ""; // Clear form value
		$this->RealizationAmount->FormValue = ""; // Clear form value
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
		if ($CurrentForm->hasValue("x_BillNumber") && $CurrentForm->hasValue("o_BillNumber") && $this->BillNumber->CurrentValue != $this->BillNumber->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_PatientId") && $CurrentForm->hasValue("o_PatientId") && $this->PatientId->CurrentValue != $this->PatientId->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_PatientName") && $CurrentForm->hasValue("o_PatientName") && $this->PatientName->CurrentValue != $this->PatientName->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_Mobile") && $CurrentForm->hasValue("o_Mobile") && $this->Mobile->CurrentValue != $this->Mobile->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_mrnno") && $CurrentForm->hasValue("o_mrnno") && $this->mrnno->CurrentValue != $this->mrnno->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_IP_OP") && $CurrentForm->hasValue("o_IP_OP") && $this->IP_OP->CurrentValue != $this->IP_OP->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_Doctor") && $CurrentForm->hasValue("o_Doctor") && $this->Doctor->CurrentValue != $this->Doctor->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_ModeofPayment") && $CurrentForm->hasValue("o_ModeofPayment") && $this->ModeofPayment->CurrentValue != $this->ModeofPayment->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_Amount") && $CurrentForm->hasValue("o_Amount") && $this->Amount->CurrentValue != $this->Amount->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_AnyDues") && $CurrentForm->hasValue("o_AnyDues") && $this->AnyDues->CurrentValue != $this->AnyDues->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_RealizationAmount") && $CurrentForm->hasValue("o_RealizationAmount") && $this->RealizationAmount->CurrentValue != $this->RealizationAmount->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_CId") && $CurrentForm->hasValue("o_CId") && $this->CId->CurrentValue != $this->CId->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_PartnerName") && $CurrentForm->hasValue("o_PartnerName") && $this->PartnerName->CurrentValue != $this->PartnerName->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_CardNumber") && $CurrentForm->hasValue("o_CardNumber") && $this->CardNumber->CurrentValue != $this->CardNumber->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_BillStatus") && $CurrentForm->hasValue("o_BillStatus") && $this->BillStatus->CurrentValue != $this->BillStatus->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_ReportHeader") && $CurrentForm->hasValue("o_ReportHeader") && $this->ReportHeader->CurrentValue != $this->ReportHeader->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_PharID") && $CurrentForm->hasValue("o_PharID") && $this->PharID->CurrentValue != $this->PharID->OldValue)
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
			$savedFilterList = $UserProfile->getSearchFilters(CurrentUserName(), "fpharmacy_billing_voucherlistsrch");
		$filterList = Concat($filterList, $this->id->AdvancedSearch->toJson(), ","); // Field id
		$filterList = Concat($filterList, $this->BillNumber->AdvancedSearch->toJson(), ","); // Field BillNumber
		$filterList = Concat($filterList, $this->voucher_type->AdvancedSearch->toJson(), ","); // Field voucher_type
		$filterList = Concat($filterList, $this->Reception->AdvancedSearch->toJson(), ","); // Field Reception
		$filterList = Concat($filterList, $this->PatientId->AdvancedSearch->toJson(), ","); // Field PatientId
		$filterList = Concat($filterList, $this->PatientName->AdvancedSearch->toJson(), ","); // Field PatientName
		$filterList = Concat($filterList, $this->Mobile->AdvancedSearch->toJson(), ","); // Field Mobile
		$filterList = Concat($filterList, $this->Age->AdvancedSearch->toJson(), ","); // Field Age
		$filterList = Concat($filterList, $this->mrnno->AdvancedSearch->toJson(), ","); // Field mrnno
		$filterList = Concat($filterList, $this->IP_OP->AdvancedSearch->toJson(), ","); // Field IP_OP
		$filterList = Concat($filterList, $this->Doctor->AdvancedSearch->toJson(), ","); // Field Doctor
		$filterList = Concat($filterList, $this->Gender->AdvancedSearch->toJson(), ","); // Field Gender
		$filterList = Concat($filterList, $this->Details->AdvancedSearch->toJson(), ","); // Field Details
		$filterList = Concat($filterList, $this->ModeofPayment->AdvancedSearch->toJson(), ","); // Field ModeofPayment
		$filterList = Concat($filterList, $this->Amount->AdvancedSearch->toJson(), ","); // Field Amount
		$filterList = Concat($filterList, $this->AnyDues->AdvancedSearch->toJson(), ","); // Field AnyDues
		$filterList = Concat($filterList, $this->createdby->AdvancedSearch->toJson(), ","); // Field createdby
		$filterList = Concat($filterList, $this->createddatetime->AdvancedSearch->toJson(), ","); // Field createddatetime
		$filterList = Concat($filterList, $this->modifiedby->AdvancedSearch->toJson(), ","); // Field modifiedby
		$filterList = Concat($filterList, $this->modifieddatetime->AdvancedSearch->toJson(), ","); // Field modifieddatetime
		$filterList = Concat($filterList, $this->RealizationAmount->AdvancedSearch->toJson(), ","); // Field RealizationAmount
		$filterList = Concat($filterList, $this->RealizationStatus->AdvancedSearch->toJson(), ","); // Field RealizationStatus
		$filterList = Concat($filterList, $this->RealizationRemarks->AdvancedSearch->toJson(), ","); // Field RealizationRemarks
		$filterList = Concat($filterList, $this->RealizationBatchNo->AdvancedSearch->toJson(), ","); // Field RealizationBatchNo
		$filterList = Concat($filterList, $this->RealizationDate->AdvancedSearch->toJson(), ","); // Field RealizationDate
		$filterList = Concat($filterList, $this->HospID->AdvancedSearch->toJson(), ","); // Field HospID
		$filterList = Concat($filterList, $this->RIDNO->AdvancedSearch->toJson(), ","); // Field RIDNO
		$filterList = Concat($filterList, $this->TidNo->AdvancedSearch->toJson(), ","); // Field TidNo
		$filterList = Concat($filterList, $this->CId->AdvancedSearch->toJson(), ","); // Field CId
		$filterList = Concat($filterList, $this->PartnerName->AdvancedSearch->toJson(), ","); // Field PartnerName
		$filterList = Concat($filterList, $this->PayerType->AdvancedSearch->toJson(), ","); // Field PayerType
		$filterList = Concat($filterList, $this->profilePic->AdvancedSearch->toJson(), ","); // Field profilePic
		$filterList = Concat($filterList, $this->Dob->AdvancedSearch->toJson(), ","); // Field Dob
		$filterList = Concat($filterList, $this->Currency->AdvancedSearch->toJson(), ","); // Field Currency
		$filterList = Concat($filterList, $this->DiscountRemarks->AdvancedSearch->toJson(), ","); // Field DiscountRemarks
		$filterList = Concat($filterList, $this->Remarks->AdvancedSearch->toJson(), ","); // Field Remarks
		$filterList = Concat($filterList, $this->PatId->AdvancedSearch->toJson(), ","); // Field PatId
		$filterList = Concat($filterList, $this->DrDepartment->AdvancedSearch->toJson(), ","); // Field DrDepartment
		$filterList = Concat($filterList, $this->RefferedBy->AdvancedSearch->toJson(), ","); // Field RefferedBy
		$filterList = Concat($filterList, $this->CardNumber->AdvancedSearch->toJson(), ","); // Field CardNumber
		$filterList = Concat($filterList, $this->BankName->AdvancedSearch->toJson(), ","); // Field BankName
		$filterList = Concat($filterList, $this->DrID->AdvancedSearch->toJson(), ","); // Field DrID
		$filterList = Concat($filterList, $this->BillStatus->AdvancedSearch->toJson(), ","); // Field BillStatus
		$filterList = Concat($filterList, $this->ReportHeader->AdvancedSearch->toJson(), ","); // Field ReportHeader
		$filterList = Concat($filterList, $this->PharID->AdvancedSearch->toJson(), ","); // Field PharID
		$filterList = Concat($filterList, $this->UserName->AdvancedSearch->toJson(), ","); // Field UserName
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
			$UserProfile->setSearchFilters(CurrentUserName(), "fpharmacy_billing_voucherlistsrch", $filters);
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

		// Field BillNumber
		$this->BillNumber->AdvancedSearch->SearchValue = @$filter["x_BillNumber"];
		$this->BillNumber->AdvancedSearch->SearchOperator = @$filter["z_BillNumber"];
		$this->BillNumber->AdvancedSearch->SearchCondition = @$filter["v_BillNumber"];
		$this->BillNumber->AdvancedSearch->SearchValue2 = @$filter["y_BillNumber"];
		$this->BillNumber->AdvancedSearch->SearchOperator2 = @$filter["w_BillNumber"];
		$this->BillNumber->AdvancedSearch->save();

		// Field voucher_type
		$this->voucher_type->AdvancedSearch->SearchValue = @$filter["x_voucher_type"];
		$this->voucher_type->AdvancedSearch->SearchOperator = @$filter["z_voucher_type"];
		$this->voucher_type->AdvancedSearch->SearchCondition = @$filter["v_voucher_type"];
		$this->voucher_type->AdvancedSearch->SearchValue2 = @$filter["y_voucher_type"];
		$this->voucher_type->AdvancedSearch->SearchOperator2 = @$filter["w_voucher_type"];
		$this->voucher_type->AdvancedSearch->save();

		// Field Reception
		$this->Reception->AdvancedSearch->SearchValue = @$filter["x_Reception"];
		$this->Reception->AdvancedSearch->SearchOperator = @$filter["z_Reception"];
		$this->Reception->AdvancedSearch->SearchCondition = @$filter["v_Reception"];
		$this->Reception->AdvancedSearch->SearchValue2 = @$filter["y_Reception"];
		$this->Reception->AdvancedSearch->SearchOperator2 = @$filter["w_Reception"];
		$this->Reception->AdvancedSearch->save();

		// Field PatientId
		$this->PatientId->AdvancedSearch->SearchValue = @$filter["x_PatientId"];
		$this->PatientId->AdvancedSearch->SearchOperator = @$filter["z_PatientId"];
		$this->PatientId->AdvancedSearch->SearchCondition = @$filter["v_PatientId"];
		$this->PatientId->AdvancedSearch->SearchValue2 = @$filter["y_PatientId"];
		$this->PatientId->AdvancedSearch->SearchOperator2 = @$filter["w_PatientId"];
		$this->PatientId->AdvancedSearch->save();

		// Field PatientName
		$this->PatientName->AdvancedSearch->SearchValue = @$filter["x_PatientName"];
		$this->PatientName->AdvancedSearch->SearchOperator = @$filter["z_PatientName"];
		$this->PatientName->AdvancedSearch->SearchCondition = @$filter["v_PatientName"];
		$this->PatientName->AdvancedSearch->SearchValue2 = @$filter["y_PatientName"];
		$this->PatientName->AdvancedSearch->SearchOperator2 = @$filter["w_PatientName"];
		$this->PatientName->AdvancedSearch->save();

		// Field Mobile
		$this->Mobile->AdvancedSearch->SearchValue = @$filter["x_Mobile"];
		$this->Mobile->AdvancedSearch->SearchOperator = @$filter["z_Mobile"];
		$this->Mobile->AdvancedSearch->SearchCondition = @$filter["v_Mobile"];
		$this->Mobile->AdvancedSearch->SearchValue2 = @$filter["y_Mobile"];
		$this->Mobile->AdvancedSearch->SearchOperator2 = @$filter["w_Mobile"];
		$this->Mobile->AdvancedSearch->save();

		// Field Age
		$this->Age->AdvancedSearch->SearchValue = @$filter["x_Age"];
		$this->Age->AdvancedSearch->SearchOperator = @$filter["z_Age"];
		$this->Age->AdvancedSearch->SearchCondition = @$filter["v_Age"];
		$this->Age->AdvancedSearch->SearchValue2 = @$filter["y_Age"];
		$this->Age->AdvancedSearch->SearchOperator2 = @$filter["w_Age"];
		$this->Age->AdvancedSearch->save();

		// Field mrnno
		$this->mrnno->AdvancedSearch->SearchValue = @$filter["x_mrnno"];
		$this->mrnno->AdvancedSearch->SearchOperator = @$filter["z_mrnno"];
		$this->mrnno->AdvancedSearch->SearchCondition = @$filter["v_mrnno"];
		$this->mrnno->AdvancedSearch->SearchValue2 = @$filter["y_mrnno"];
		$this->mrnno->AdvancedSearch->SearchOperator2 = @$filter["w_mrnno"];
		$this->mrnno->AdvancedSearch->save();

		// Field IP_OP
		$this->IP_OP->AdvancedSearch->SearchValue = @$filter["x_IP_OP"];
		$this->IP_OP->AdvancedSearch->SearchOperator = @$filter["z_IP_OP"];
		$this->IP_OP->AdvancedSearch->SearchCondition = @$filter["v_IP_OP"];
		$this->IP_OP->AdvancedSearch->SearchValue2 = @$filter["y_IP_OP"];
		$this->IP_OP->AdvancedSearch->SearchOperator2 = @$filter["w_IP_OP"];
		$this->IP_OP->AdvancedSearch->save();

		// Field Doctor
		$this->Doctor->AdvancedSearch->SearchValue = @$filter["x_Doctor"];
		$this->Doctor->AdvancedSearch->SearchOperator = @$filter["z_Doctor"];
		$this->Doctor->AdvancedSearch->SearchCondition = @$filter["v_Doctor"];
		$this->Doctor->AdvancedSearch->SearchValue2 = @$filter["y_Doctor"];
		$this->Doctor->AdvancedSearch->SearchOperator2 = @$filter["w_Doctor"];
		$this->Doctor->AdvancedSearch->save();

		// Field Gender
		$this->Gender->AdvancedSearch->SearchValue = @$filter["x_Gender"];
		$this->Gender->AdvancedSearch->SearchOperator = @$filter["z_Gender"];
		$this->Gender->AdvancedSearch->SearchCondition = @$filter["v_Gender"];
		$this->Gender->AdvancedSearch->SearchValue2 = @$filter["y_Gender"];
		$this->Gender->AdvancedSearch->SearchOperator2 = @$filter["w_Gender"];
		$this->Gender->AdvancedSearch->save();

		// Field Details
		$this->Details->AdvancedSearch->SearchValue = @$filter["x_Details"];
		$this->Details->AdvancedSearch->SearchOperator = @$filter["z_Details"];
		$this->Details->AdvancedSearch->SearchCondition = @$filter["v_Details"];
		$this->Details->AdvancedSearch->SearchValue2 = @$filter["y_Details"];
		$this->Details->AdvancedSearch->SearchOperator2 = @$filter["w_Details"];
		$this->Details->AdvancedSearch->save();

		// Field ModeofPayment
		$this->ModeofPayment->AdvancedSearch->SearchValue = @$filter["x_ModeofPayment"];
		$this->ModeofPayment->AdvancedSearch->SearchOperator = @$filter["z_ModeofPayment"];
		$this->ModeofPayment->AdvancedSearch->SearchCondition = @$filter["v_ModeofPayment"];
		$this->ModeofPayment->AdvancedSearch->SearchValue2 = @$filter["y_ModeofPayment"];
		$this->ModeofPayment->AdvancedSearch->SearchOperator2 = @$filter["w_ModeofPayment"];
		$this->ModeofPayment->AdvancedSearch->save();

		// Field Amount
		$this->Amount->AdvancedSearch->SearchValue = @$filter["x_Amount"];
		$this->Amount->AdvancedSearch->SearchOperator = @$filter["z_Amount"];
		$this->Amount->AdvancedSearch->SearchCondition = @$filter["v_Amount"];
		$this->Amount->AdvancedSearch->SearchValue2 = @$filter["y_Amount"];
		$this->Amount->AdvancedSearch->SearchOperator2 = @$filter["w_Amount"];
		$this->Amount->AdvancedSearch->save();

		// Field AnyDues
		$this->AnyDues->AdvancedSearch->SearchValue = @$filter["x_AnyDues"];
		$this->AnyDues->AdvancedSearch->SearchOperator = @$filter["z_AnyDues"];
		$this->AnyDues->AdvancedSearch->SearchCondition = @$filter["v_AnyDues"];
		$this->AnyDues->AdvancedSearch->SearchValue2 = @$filter["y_AnyDues"];
		$this->AnyDues->AdvancedSearch->SearchOperator2 = @$filter["w_AnyDues"];
		$this->AnyDues->AdvancedSearch->save();

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

		// Field RealizationAmount
		$this->RealizationAmount->AdvancedSearch->SearchValue = @$filter["x_RealizationAmount"];
		$this->RealizationAmount->AdvancedSearch->SearchOperator = @$filter["z_RealizationAmount"];
		$this->RealizationAmount->AdvancedSearch->SearchCondition = @$filter["v_RealizationAmount"];
		$this->RealizationAmount->AdvancedSearch->SearchValue2 = @$filter["y_RealizationAmount"];
		$this->RealizationAmount->AdvancedSearch->SearchOperator2 = @$filter["w_RealizationAmount"];
		$this->RealizationAmount->AdvancedSearch->save();

		// Field RealizationStatus
		$this->RealizationStatus->AdvancedSearch->SearchValue = @$filter["x_RealizationStatus"];
		$this->RealizationStatus->AdvancedSearch->SearchOperator = @$filter["z_RealizationStatus"];
		$this->RealizationStatus->AdvancedSearch->SearchCondition = @$filter["v_RealizationStatus"];
		$this->RealizationStatus->AdvancedSearch->SearchValue2 = @$filter["y_RealizationStatus"];
		$this->RealizationStatus->AdvancedSearch->SearchOperator2 = @$filter["w_RealizationStatus"];
		$this->RealizationStatus->AdvancedSearch->save();

		// Field RealizationRemarks
		$this->RealizationRemarks->AdvancedSearch->SearchValue = @$filter["x_RealizationRemarks"];
		$this->RealizationRemarks->AdvancedSearch->SearchOperator = @$filter["z_RealizationRemarks"];
		$this->RealizationRemarks->AdvancedSearch->SearchCondition = @$filter["v_RealizationRemarks"];
		$this->RealizationRemarks->AdvancedSearch->SearchValue2 = @$filter["y_RealizationRemarks"];
		$this->RealizationRemarks->AdvancedSearch->SearchOperator2 = @$filter["w_RealizationRemarks"];
		$this->RealizationRemarks->AdvancedSearch->save();

		// Field RealizationBatchNo
		$this->RealizationBatchNo->AdvancedSearch->SearchValue = @$filter["x_RealizationBatchNo"];
		$this->RealizationBatchNo->AdvancedSearch->SearchOperator = @$filter["z_RealizationBatchNo"];
		$this->RealizationBatchNo->AdvancedSearch->SearchCondition = @$filter["v_RealizationBatchNo"];
		$this->RealizationBatchNo->AdvancedSearch->SearchValue2 = @$filter["y_RealizationBatchNo"];
		$this->RealizationBatchNo->AdvancedSearch->SearchOperator2 = @$filter["w_RealizationBatchNo"];
		$this->RealizationBatchNo->AdvancedSearch->save();

		// Field RealizationDate
		$this->RealizationDate->AdvancedSearch->SearchValue = @$filter["x_RealizationDate"];
		$this->RealizationDate->AdvancedSearch->SearchOperator = @$filter["z_RealizationDate"];
		$this->RealizationDate->AdvancedSearch->SearchCondition = @$filter["v_RealizationDate"];
		$this->RealizationDate->AdvancedSearch->SearchValue2 = @$filter["y_RealizationDate"];
		$this->RealizationDate->AdvancedSearch->SearchOperator2 = @$filter["w_RealizationDate"];
		$this->RealizationDate->AdvancedSearch->save();

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

		// Field CId
		$this->CId->AdvancedSearch->SearchValue = @$filter["x_CId"];
		$this->CId->AdvancedSearch->SearchOperator = @$filter["z_CId"];
		$this->CId->AdvancedSearch->SearchCondition = @$filter["v_CId"];
		$this->CId->AdvancedSearch->SearchValue2 = @$filter["y_CId"];
		$this->CId->AdvancedSearch->SearchOperator2 = @$filter["w_CId"];
		$this->CId->AdvancedSearch->save();

		// Field PartnerName
		$this->PartnerName->AdvancedSearch->SearchValue = @$filter["x_PartnerName"];
		$this->PartnerName->AdvancedSearch->SearchOperator = @$filter["z_PartnerName"];
		$this->PartnerName->AdvancedSearch->SearchCondition = @$filter["v_PartnerName"];
		$this->PartnerName->AdvancedSearch->SearchValue2 = @$filter["y_PartnerName"];
		$this->PartnerName->AdvancedSearch->SearchOperator2 = @$filter["w_PartnerName"];
		$this->PartnerName->AdvancedSearch->save();

		// Field PayerType
		$this->PayerType->AdvancedSearch->SearchValue = @$filter["x_PayerType"];
		$this->PayerType->AdvancedSearch->SearchOperator = @$filter["z_PayerType"];
		$this->PayerType->AdvancedSearch->SearchCondition = @$filter["v_PayerType"];
		$this->PayerType->AdvancedSearch->SearchValue2 = @$filter["y_PayerType"];
		$this->PayerType->AdvancedSearch->SearchOperator2 = @$filter["w_PayerType"];
		$this->PayerType->AdvancedSearch->save();

		// Field profilePic
		$this->profilePic->AdvancedSearch->SearchValue = @$filter["x_profilePic"];
		$this->profilePic->AdvancedSearch->SearchOperator = @$filter["z_profilePic"];
		$this->profilePic->AdvancedSearch->SearchCondition = @$filter["v_profilePic"];
		$this->profilePic->AdvancedSearch->SearchValue2 = @$filter["y_profilePic"];
		$this->profilePic->AdvancedSearch->SearchOperator2 = @$filter["w_profilePic"];
		$this->profilePic->AdvancedSearch->save();

		// Field Dob
		$this->Dob->AdvancedSearch->SearchValue = @$filter["x_Dob"];
		$this->Dob->AdvancedSearch->SearchOperator = @$filter["z_Dob"];
		$this->Dob->AdvancedSearch->SearchCondition = @$filter["v_Dob"];
		$this->Dob->AdvancedSearch->SearchValue2 = @$filter["y_Dob"];
		$this->Dob->AdvancedSearch->SearchOperator2 = @$filter["w_Dob"];
		$this->Dob->AdvancedSearch->save();

		// Field Currency
		$this->Currency->AdvancedSearch->SearchValue = @$filter["x_Currency"];
		$this->Currency->AdvancedSearch->SearchOperator = @$filter["z_Currency"];
		$this->Currency->AdvancedSearch->SearchCondition = @$filter["v_Currency"];
		$this->Currency->AdvancedSearch->SearchValue2 = @$filter["y_Currency"];
		$this->Currency->AdvancedSearch->SearchOperator2 = @$filter["w_Currency"];
		$this->Currency->AdvancedSearch->save();

		// Field DiscountRemarks
		$this->DiscountRemarks->AdvancedSearch->SearchValue = @$filter["x_DiscountRemarks"];
		$this->DiscountRemarks->AdvancedSearch->SearchOperator = @$filter["z_DiscountRemarks"];
		$this->DiscountRemarks->AdvancedSearch->SearchCondition = @$filter["v_DiscountRemarks"];
		$this->DiscountRemarks->AdvancedSearch->SearchValue2 = @$filter["y_DiscountRemarks"];
		$this->DiscountRemarks->AdvancedSearch->SearchOperator2 = @$filter["w_DiscountRemarks"];
		$this->DiscountRemarks->AdvancedSearch->save();

		// Field Remarks
		$this->Remarks->AdvancedSearch->SearchValue = @$filter["x_Remarks"];
		$this->Remarks->AdvancedSearch->SearchOperator = @$filter["z_Remarks"];
		$this->Remarks->AdvancedSearch->SearchCondition = @$filter["v_Remarks"];
		$this->Remarks->AdvancedSearch->SearchValue2 = @$filter["y_Remarks"];
		$this->Remarks->AdvancedSearch->SearchOperator2 = @$filter["w_Remarks"];
		$this->Remarks->AdvancedSearch->save();

		// Field PatId
		$this->PatId->AdvancedSearch->SearchValue = @$filter["x_PatId"];
		$this->PatId->AdvancedSearch->SearchOperator = @$filter["z_PatId"];
		$this->PatId->AdvancedSearch->SearchCondition = @$filter["v_PatId"];
		$this->PatId->AdvancedSearch->SearchValue2 = @$filter["y_PatId"];
		$this->PatId->AdvancedSearch->SearchOperator2 = @$filter["w_PatId"];
		$this->PatId->AdvancedSearch->save();

		// Field DrDepartment
		$this->DrDepartment->AdvancedSearch->SearchValue = @$filter["x_DrDepartment"];
		$this->DrDepartment->AdvancedSearch->SearchOperator = @$filter["z_DrDepartment"];
		$this->DrDepartment->AdvancedSearch->SearchCondition = @$filter["v_DrDepartment"];
		$this->DrDepartment->AdvancedSearch->SearchValue2 = @$filter["y_DrDepartment"];
		$this->DrDepartment->AdvancedSearch->SearchOperator2 = @$filter["w_DrDepartment"];
		$this->DrDepartment->AdvancedSearch->save();

		// Field RefferedBy
		$this->RefferedBy->AdvancedSearch->SearchValue = @$filter["x_RefferedBy"];
		$this->RefferedBy->AdvancedSearch->SearchOperator = @$filter["z_RefferedBy"];
		$this->RefferedBy->AdvancedSearch->SearchCondition = @$filter["v_RefferedBy"];
		$this->RefferedBy->AdvancedSearch->SearchValue2 = @$filter["y_RefferedBy"];
		$this->RefferedBy->AdvancedSearch->SearchOperator2 = @$filter["w_RefferedBy"];
		$this->RefferedBy->AdvancedSearch->save();

		// Field CardNumber
		$this->CardNumber->AdvancedSearch->SearchValue = @$filter["x_CardNumber"];
		$this->CardNumber->AdvancedSearch->SearchOperator = @$filter["z_CardNumber"];
		$this->CardNumber->AdvancedSearch->SearchCondition = @$filter["v_CardNumber"];
		$this->CardNumber->AdvancedSearch->SearchValue2 = @$filter["y_CardNumber"];
		$this->CardNumber->AdvancedSearch->SearchOperator2 = @$filter["w_CardNumber"];
		$this->CardNumber->AdvancedSearch->save();

		// Field BankName
		$this->BankName->AdvancedSearch->SearchValue = @$filter["x_BankName"];
		$this->BankName->AdvancedSearch->SearchOperator = @$filter["z_BankName"];
		$this->BankName->AdvancedSearch->SearchCondition = @$filter["v_BankName"];
		$this->BankName->AdvancedSearch->SearchValue2 = @$filter["y_BankName"];
		$this->BankName->AdvancedSearch->SearchOperator2 = @$filter["w_BankName"];
		$this->BankName->AdvancedSearch->save();

		// Field DrID
		$this->DrID->AdvancedSearch->SearchValue = @$filter["x_DrID"];
		$this->DrID->AdvancedSearch->SearchOperator = @$filter["z_DrID"];
		$this->DrID->AdvancedSearch->SearchCondition = @$filter["v_DrID"];
		$this->DrID->AdvancedSearch->SearchValue2 = @$filter["y_DrID"];
		$this->DrID->AdvancedSearch->SearchOperator2 = @$filter["w_DrID"];
		$this->DrID->AdvancedSearch->save();

		// Field BillStatus
		$this->BillStatus->AdvancedSearch->SearchValue = @$filter["x_BillStatus"];
		$this->BillStatus->AdvancedSearch->SearchOperator = @$filter["z_BillStatus"];
		$this->BillStatus->AdvancedSearch->SearchCondition = @$filter["v_BillStatus"];
		$this->BillStatus->AdvancedSearch->SearchValue2 = @$filter["y_BillStatus"];
		$this->BillStatus->AdvancedSearch->SearchOperator2 = @$filter["w_BillStatus"];
		$this->BillStatus->AdvancedSearch->save();

		// Field ReportHeader
		$this->ReportHeader->AdvancedSearch->SearchValue = @$filter["x_ReportHeader"];
		$this->ReportHeader->AdvancedSearch->SearchOperator = @$filter["z_ReportHeader"];
		$this->ReportHeader->AdvancedSearch->SearchCondition = @$filter["v_ReportHeader"];
		$this->ReportHeader->AdvancedSearch->SearchValue2 = @$filter["y_ReportHeader"];
		$this->ReportHeader->AdvancedSearch->SearchOperator2 = @$filter["w_ReportHeader"];
		$this->ReportHeader->AdvancedSearch->save();

		// Field PharID
		$this->PharID->AdvancedSearch->SearchValue = @$filter["x_PharID"];
		$this->PharID->AdvancedSearch->SearchOperator = @$filter["z_PharID"];
		$this->PharID->AdvancedSearch->SearchCondition = @$filter["v_PharID"];
		$this->PharID->AdvancedSearch->SearchValue2 = @$filter["y_PharID"];
		$this->PharID->AdvancedSearch->SearchOperator2 = @$filter["w_PharID"];
		$this->PharID->AdvancedSearch->save();

		// Field UserName
		$this->UserName->AdvancedSearch->SearchValue = @$filter["x_UserName"];
		$this->UserName->AdvancedSearch->SearchOperator = @$filter["z_UserName"];
		$this->UserName->AdvancedSearch->SearchCondition = @$filter["v_UserName"];
		$this->UserName->AdvancedSearch->SearchValue2 = @$filter["y_UserName"];
		$this->UserName->AdvancedSearch->SearchOperator2 = @$filter["w_UserName"];
		$this->UserName->AdvancedSearch->save();
		$this->BasicSearch->setKeyword(@$filter[Config("TABLE_BASIC_SEARCH")]);
		$this->BasicSearch->setType(@$filter[Config("TABLE_BASIC_SEARCH_TYPE")]);
	}

	// Return basic search SQL
	protected function basicSearchSql($arKeywords, $type)
	{
		$where = "";
		$this->buildBasicSearchSql($where, $this->BillNumber, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->voucher_type, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->PatientId, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->PatientName, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Mobile, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Age, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->mrnno, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->IP_OP, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Doctor, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Gender, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Details, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->ModeofPayment, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->AnyDues, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->createdby, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->modifiedby, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->RealizationStatus, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->RealizationRemarks, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->RealizationBatchNo, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->RealizationDate, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->PartnerName, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->PayerType, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->profilePic, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Dob, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Currency, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->DiscountRemarks, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Remarks, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->DrDepartment, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->RefferedBy, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->CardNumber, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->BankName, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->ReportHeader, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->UserName, $arKeywords, $type);
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
			$this->updateSort($this->BillNumber); // BillNumber
			$this->updateSort($this->PatientId); // PatientId
			$this->updateSort($this->PatientName); // PatientName
			$this->updateSort($this->Mobile); // Mobile
			$this->updateSort($this->mrnno); // mrnno
			$this->updateSort($this->IP_OP); // IP_OP
			$this->updateSort($this->Doctor); // Doctor
			$this->updateSort($this->ModeofPayment); // ModeofPayment
			$this->updateSort($this->Amount); // Amount
			$this->updateSort($this->AnyDues); // AnyDues
			$this->updateSort($this->createdby); // createdby
			$this->updateSort($this->createddatetime); // createddatetime
			$this->updateSort($this->modifiedby); // modifiedby
			$this->updateSort($this->modifieddatetime); // modifieddatetime
			$this->updateSort($this->RealizationAmount); // RealizationAmount
			$this->updateSort($this->CId); // CId
			$this->updateSort($this->PartnerName); // PartnerName
			$this->updateSort($this->CardNumber); // CardNumber
			$this->updateSort($this->BillStatus); // BillStatus
			$this->updateSort($this->ReportHeader); // ReportHeader
			$this->updateSort($this->PharID); // PharID
			$this->updateSort($this->UserName); // UserName
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
				$this->id->setSort("");
				$this->BillNumber->setSort("");
				$this->PatientId->setSort("");
				$this->PatientName->setSort("");
				$this->Mobile->setSort("");
				$this->mrnno->setSort("");
				$this->IP_OP->setSort("");
				$this->Doctor->setSort("");
				$this->ModeofPayment->setSort("");
				$this->Amount->setSort("");
				$this->AnyDues->setSort("");
				$this->createdby->setSort("");
				$this->createddatetime->setSort("");
				$this->modifiedby->setSort("");
				$this->modifieddatetime->setSort("");
				$this->RealizationAmount->setSort("");
				$this->CId->setSort("");
				$this->PartnerName->setSort("");
				$this->CardNumber->setSort("");
				$this->BillStatus->setSort("");
				$this->ReportHeader->setSort("");
				$this->PharID->setSort("");
				$this->UserName->setSort("");
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

		// "detail_pharmacy_pharled"
		$item = &$this->ListOptions->add("detail_pharmacy_pharled");
		$item->CssClass = "text-nowrap";
		$item->Visible = $Security->allowList(CurrentProjectID() . 'pharmacy_pharled') && !$this->ShowMultipleDetails;
		$item->OnLeft = TRUE;
		$item->ShowInButtonGroup = FALSE;
		if (!isset($GLOBALS["pharmacy_pharled_grid"]))
			$GLOBALS["pharmacy_pharled_grid"] = new pharmacy_pharled_grid();

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
		$pages->add("pharmacy_pharled");
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
		$detailViewTblVar = "";
		$detailCopyTblVar = "";
		$detailEditTblVar = "";

		// "detail_pharmacy_pharled"
		$opt = $this->ListOptions["detail_pharmacy_pharled"];
		if ($Security->allowList(CurrentProjectID() . 'pharmacy_pharled')) {
			$body = $Language->phrase("DetailLink") . $Language->TablePhrase("pharmacy_pharled", "TblCaption");
			$body = "<a class=\"btn btn-default ew-row-link ew-detail\" data-action=\"list\" href=\"" . HtmlEncode("pharmacy_pharledlist.php?" . Config("TABLE_SHOW_MASTER") . "=pharmacy_billing_voucher&fk_id=" . urlencode(strval($this->id->CurrentValue)) . "") . "\">" . $body . "</a>";
			$links = "";
			if ($GLOBALS["pharmacy_pharled_grid"]->DetailView && $Security->canView() && $Security->allowView(CurrentProjectID() . 'pharmacy_billing_voucher')) {
				$caption = $Language->phrase("MasterDetailViewLink");
				$url = $this->getViewUrl(Config("TABLE_SHOW_DETAIL") . "=pharmacy_pharled");
				$links .= "<li><a class=\"dropdown-item ew-row-link ew-detail-view\" data-action=\"view\" data-caption=\"" . HtmlTitle($caption) . "\" href=\"" . HtmlEncode($url) . "\">" . HtmlImageAndText($caption) . "</a></li>";
				if ($detailViewTblVar != "")
					$detailViewTblVar .= ",";
				$detailViewTblVar .= "pharmacy_pharled";
			}
			if ($GLOBALS["pharmacy_pharled_grid"]->DetailEdit && $Security->canEdit() && $Security->allowEdit(CurrentProjectID() . 'pharmacy_billing_voucher')) {
				$caption = $Language->phrase("MasterDetailEditLink");
				$url = $this->getEditUrl(Config("TABLE_SHOW_DETAIL") . "=pharmacy_pharled");
				$links .= "<li><a class=\"dropdown-item ew-row-link ew-detail-edit\" data-action=\"edit\" data-caption=\"" . HtmlTitle($caption) . "\" href=\"" . HtmlEncode($url) . "\">" . HtmlImageAndText($caption) . "</a></li>";
				if ($detailEditTblVar != "")
					$detailEditTblVar .= ",";
				$detailEditTblVar .= "pharmacy_pharled";
			}
			if ($GLOBALS["pharmacy_pharled_grid"]->DetailAdd && $Security->canAdd() && $Security->allowAdd(CurrentProjectID() . 'pharmacy_billing_voucher')) {
				$caption = $Language->phrase("MasterDetailCopyLink");
				$url = $this->getCopyUrl(Config("TABLE_SHOW_DETAIL") . "=pharmacy_pharled");
				$links .= "<li><a class=\"dropdown-item ew-row-link ew-detail-copy\" data-action=\"add\" data-caption=\"" . HtmlTitle($caption) . "\" href=\"" . HtmlEncode($url) . "\">" . HtmlImageAndText($caption) . "</a></li>";
				if ($detailCopyTblVar != "")
					$detailCopyTblVar .= ",";
				$detailCopyTblVar .= "pharmacy_pharled";
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
		$option = $options["detail"];
		$detailTableLink = "";
		$item = &$option->add("detailadd_pharmacy_pharled");
		$url = $this->getAddUrl(Config("TABLE_SHOW_DETAIL") . "=pharmacy_pharled");
		if (!isset($GLOBALS["pharmacy_pharled"]))
			$GLOBALS["pharmacy_pharled"] = new pharmacy_pharled();
		$caption = $Language->phrase("Add") . "&nbsp;" . $this->tableCaption() . "/" . $GLOBALS["pharmacy_pharled"]->tableCaption();
		$item->Body = "<a class=\"ew-detail-add-group ew-detail-add\" title=\"" . HtmlTitle($caption) . "\" data-caption=\"" . HtmlTitle($caption) . "\" href=\"" . HtmlEncode($url) . "\">" . $caption . "</a>";
		$item->Visible = ($GLOBALS["pharmacy_pharled"]->DetailAdd && $Security->allowAdd(CurrentProjectID() . 'pharmacy_billing_voucher') && $Security->canAdd());
		if ($item->Visible) {
			if ($detailTableLink != "")
				$detailTableLink .= ",";
			$detailTableLink .= "pharmacy_pharled";
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
		$item->Body = "<a class=\"ew-save-filter\" data-form=\"fpharmacy_billing_voucherlistsrch\" href=\"#\" onclick=\"return false;\">" . $Language->phrase("SaveCurrentFilter") . "</a>";
		$item->Visible = TRUE;
		$item = &$this->FilterOptions->add("deletefilter");
		$item->Body = "<a class=\"ew-delete-filter\" data-form=\"fpharmacy_billing_voucherlistsrch\" href=\"#\" onclick=\"return false;\">" . $Language->phrase("DeleteFilter") . "</a>";
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
					$item->Body = "<a class=\"ew-action ew-list-action\" title=\"" . HtmlEncode($caption) . "\" data-caption=\"" . HtmlEncode($caption) . "\" href=\"#\" onclick=\"return ew.submitAction(event,jQuery.extend({f:document.fpharmacy_billing_voucherlist}," . $listaction->toJson(TRUE) . "));\">" . $icon . "</a>";
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
		$links = "";
		$btngrps = "";
		$sqlwrk = "`pbv`=" . AdjustSql($this->id->CurrentValue, $this->Dbid) . "";

		// Column "detail_pharmacy_pharled"
		if ($this->DetailPages && $this->DetailPages["pharmacy_pharled"] && $this->DetailPages["pharmacy_pharled"]->Visible) {
			$link = "";
			$option = $this->ListOptions["detail_pharmacy_pharled"];
			$url = "pharmacy_pharledpreview.php?t=pharmacy_billing_voucher&f=" . Encrypt($sqlwrk);
			$btngrp = "<div data-table=\"pharmacy_pharled\" data-url=\"" . $url . "\" class=\"btn-group btn-group-sm\">";
			if ($Security->allowList(CurrentProjectID() . 'pharmacy_billing_voucher')) {
				$label = $Language->TablePhrase("pharmacy_pharled", "TblCaption");
				$link = "<li class=\"nav-item\"><a href=\"#\" class=\"nav-link\" data-toggle=\"tab\" data-table=\"pharmacy_pharled\" data-url=\"" . $url . "\">" . $label . "</a></li>";
				$links .= $link;
				$detaillnk = JsEncodeAttribute("pharmacy_pharledlist.php?" . Config("TABLE_SHOW_MASTER") . "=pharmacy_billing_voucher&fk_id=" . urlencode(strval($this->id->CurrentValue)) . "");
				$btngrp .= "<button type=\"button\" class=\"btn btn-default\" title=\"" . $Language->TablePhrase("pharmacy_pharled", "TblCaption") . "\" onclick=\"window.location='" . $detaillnk . "';return false;\">" . $Language->phrase("MasterDetailListLink") . "</button>";
			}
			if (!isset($GLOBALS["pharmacy_pharled_grid"]))
				$GLOBALS["pharmacy_pharled_grid"] = new pharmacy_pharled_grid();
			if ($GLOBALS["pharmacy_pharled_grid"]->DetailView && $Security->canView() && $Security->allowView(CurrentProjectID() . 'pharmacy_billing_voucher')) {
				$caption = $Language->phrase("MasterDetailViewLink");
				$url = $this->getViewUrl(Config("TABLE_SHOW_DETAIL") . "=pharmacy_pharled");
				$btngrp .= "<button type=\"button\" class=\"btn btn-default\" title=\"" . HtmlTitle($caption) . "\" onclick=\"window.location='" . HtmlEncode($url) . "';return false;\">" . $caption . "</button>";
			}
			if ($GLOBALS["pharmacy_pharled_grid"]->DetailEdit && $Security->canEdit() && $Security->allowEdit(CurrentProjectID() . 'pharmacy_billing_voucher')) {
				$caption = $Language->phrase("MasterDetailEditLink");
				$url = $this->getEditUrl(Config("TABLE_SHOW_DETAIL") . "=pharmacy_pharled");
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

	// Load default values
	protected function loadDefaultValues()
	{
		$this->id->CurrentValue = NULL;
		$this->id->OldValue = $this->id->CurrentValue;
		$this->BillNumber->CurrentValue = NULL;
		$this->BillNumber->OldValue = $this->BillNumber->CurrentValue;
		$this->voucher_type->CurrentValue = NULL;
		$this->voucher_type->OldValue = $this->voucher_type->CurrentValue;
		$this->Reception->CurrentValue = NULL;
		$this->Reception->OldValue = $this->Reception->CurrentValue;
		$this->PatientId->CurrentValue = NULL;
		$this->PatientId->OldValue = $this->PatientId->CurrentValue;
		$this->PatientName->CurrentValue = NULL;
		$this->PatientName->OldValue = $this->PatientName->CurrentValue;
		$this->Mobile->CurrentValue = NULL;
		$this->Mobile->OldValue = $this->Mobile->CurrentValue;
		$this->Age->CurrentValue = NULL;
		$this->Age->OldValue = $this->Age->CurrentValue;
		$this->mrnno->CurrentValue = NULL;
		$this->mrnno->OldValue = $this->mrnno->CurrentValue;
		$this->IP_OP->CurrentValue = NULL;
		$this->IP_OP->OldValue = $this->IP_OP->CurrentValue;
		$this->Doctor->CurrentValue = NULL;
		$this->Doctor->OldValue = $this->Doctor->CurrentValue;
		$this->Gender->CurrentValue = NULL;
		$this->Gender->OldValue = $this->Gender->CurrentValue;
		$this->Details->CurrentValue = NULL;
		$this->Details->OldValue = $this->Details->CurrentValue;
		$this->ModeofPayment->CurrentValue = NULL;
		$this->ModeofPayment->OldValue = $this->ModeofPayment->CurrentValue;
		$this->Amount->CurrentValue = NULL;
		$this->Amount->OldValue = $this->Amount->CurrentValue;
		$this->AnyDues->CurrentValue = NULL;
		$this->AnyDues->OldValue = $this->AnyDues->CurrentValue;
		$this->createdby->CurrentValue = NULL;
		$this->createdby->OldValue = $this->createdby->CurrentValue;
		$this->createddatetime->CurrentValue = NULL;
		$this->createddatetime->OldValue = $this->createddatetime->CurrentValue;
		$this->modifiedby->CurrentValue = NULL;
		$this->modifiedby->OldValue = $this->modifiedby->CurrentValue;
		$this->modifieddatetime->CurrentValue = NULL;
		$this->modifieddatetime->OldValue = $this->modifieddatetime->CurrentValue;
		$this->RealizationAmount->CurrentValue = NULL;
		$this->RealizationAmount->OldValue = $this->RealizationAmount->CurrentValue;
		$this->RealizationStatus->CurrentValue = NULL;
		$this->RealizationStatus->OldValue = $this->RealizationStatus->CurrentValue;
		$this->RealizationRemarks->CurrentValue = NULL;
		$this->RealizationRemarks->OldValue = $this->RealizationRemarks->CurrentValue;
		$this->RealizationBatchNo->CurrentValue = NULL;
		$this->RealizationBatchNo->OldValue = $this->RealizationBatchNo->CurrentValue;
		$this->RealizationDate->CurrentValue = NULL;
		$this->RealizationDate->OldValue = $this->RealizationDate->CurrentValue;
		$this->HospID->CurrentValue = NULL;
		$this->HospID->OldValue = $this->HospID->CurrentValue;
		$this->RIDNO->CurrentValue = NULL;
		$this->RIDNO->OldValue = $this->RIDNO->CurrentValue;
		$this->TidNo->CurrentValue = NULL;
		$this->TidNo->OldValue = $this->TidNo->CurrentValue;
		$this->CId->CurrentValue = NULL;
		$this->CId->OldValue = $this->CId->CurrentValue;
		$this->PartnerName->CurrentValue = NULL;
		$this->PartnerName->OldValue = $this->PartnerName->CurrentValue;
		$this->PayerType->CurrentValue = NULL;
		$this->PayerType->OldValue = $this->PayerType->CurrentValue;
		$this->profilePic->CurrentValue = NULL;
		$this->profilePic->OldValue = $this->profilePic->CurrentValue;
		$this->Dob->CurrentValue = NULL;
		$this->Dob->OldValue = $this->Dob->CurrentValue;
		$this->Currency->CurrentValue = NULL;
		$this->Currency->OldValue = $this->Currency->CurrentValue;
		$this->DiscountRemarks->CurrentValue = NULL;
		$this->DiscountRemarks->OldValue = $this->DiscountRemarks->CurrentValue;
		$this->Remarks->CurrentValue = NULL;
		$this->Remarks->OldValue = $this->Remarks->CurrentValue;
		$this->PatId->CurrentValue = NULL;
		$this->PatId->OldValue = $this->PatId->CurrentValue;
		$this->DrDepartment->CurrentValue = NULL;
		$this->DrDepartment->OldValue = $this->DrDepartment->CurrentValue;
		$this->RefferedBy->CurrentValue = NULL;
		$this->RefferedBy->OldValue = $this->RefferedBy->CurrentValue;
		$this->CardNumber->CurrentValue = NULL;
		$this->CardNumber->OldValue = $this->CardNumber->CurrentValue;
		$this->BankName->CurrentValue = NULL;
		$this->BankName->OldValue = $this->BankName->CurrentValue;
		$this->DrID->CurrentValue = NULL;
		$this->DrID->OldValue = $this->DrID->CurrentValue;
		$this->BillStatus->CurrentValue = 0;
		$this->BillStatus->OldValue = $this->BillStatus->CurrentValue;
		$this->ReportHeader->CurrentValue = NULL;
		$this->ReportHeader->OldValue = $this->ReportHeader->CurrentValue;
		$this->PharID->CurrentValue = NULL;
		$this->PharID->OldValue = $this->PharID->CurrentValue;
		$this->UserName->CurrentValue = NULL;
		$this->UserName->OldValue = $this->UserName->CurrentValue;
	}

	// Load basic search values
	protected function loadBasicSearchValues()
	{
		$this->BasicSearch->setKeyword(Get(Config("TABLE_BASIC_SEARCH"), ""), FALSE);
		if ($this->BasicSearch->Keyword != "" && $this->Command == "")
			$this->Command = "search";
		$this->BasicSearch->setType(Get(Config("TABLE_BASIC_SEARCH_TYPE"), ""), FALSE);
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

		// Check field name 'BillNumber' first before field var 'x_BillNumber'
		$val = $CurrentForm->hasValue("BillNumber") ? $CurrentForm->getValue("BillNumber") : $CurrentForm->getValue("x_BillNumber");
		if (!$this->BillNumber->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->BillNumber->Visible = FALSE; // Disable update for API request
			else
				$this->BillNumber->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_BillNumber"))
			$this->BillNumber->setOldValue($CurrentForm->getValue("o_BillNumber"));

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

		// Check field name 'IP_OP' first before field var 'x_IP_OP'
		$val = $CurrentForm->hasValue("IP_OP") ? $CurrentForm->getValue("IP_OP") : $CurrentForm->getValue("x_IP_OP");
		if (!$this->IP_OP->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->IP_OP->Visible = FALSE; // Disable update for API request
			else
				$this->IP_OP->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_IP_OP"))
			$this->IP_OP->setOldValue($CurrentForm->getValue("o_IP_OP"));

		// Check field name 'Doctor' first before field var 'x_Doctor'
		$val = $CurrentForm->hasValue("Doctor") ? $CurrentForm->getValue("Doctor") : $CurrentForm->getValue("x_Doctor");
		if (!$this->Doctor->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Doctor->Visible = FALSE; // Disable update for API request
			else
				$this->Doctor->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_Doctor"))
			$this->Doctor->setOldValue($CurrentForm->getValue("o_Doctor"));

		// Check field name 'ModeofPayment' first before field var 'x_ModeofPayment'
		$val = $CurrentForm->hasValue("ModeofPayment") ? $CurrentForm->getValue("ModeofPayment") : $CurrentForm->getValue("x_ModeofPayment");
		if (!$this->ModeofPayment->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->ModeofPayment->Visible = FALSE; // Disable update for API request
			else
				$this->ModeofPayment->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_ModeofPayment"))
			$this->ModeofPayment->setOldValue($CurrentForm->getValue("o_ModeofPayment"));

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

		// Check field name 'AnyDues' first before field var 'x_AnyDues'
		$val = $CurrentForm->hasValue("AnyDues") ? $CurrentForm->getValue("AnyDues") : $CurrentForm->getValue("x_AnyDues");
		if (!$this->AnyDues->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->AnyDues->Visible = FALSE; // Disable update for API request
			else
				$this->AnyDues->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_AnyDues"))
			$this->AnyDues->setOldValue($CurrentForm->getValue("o_AnyDues"));

		// Check field name 'createdby' first before field var 'x_createdby'
		$val = $CurrentForm->hasValue("createdby") ? $CurrentForm->getValue("createdby") : $CurrentForm->getValue("x_createdby");
		if (!$this->createdby->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->createdby->Visible = FALSE; // Disable update for API request
			else
				$this->createdby->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_createdby"))
			$this->createdby->setOldValue($CurrentForm->getValue("o_createdby"));

		// Check field name 'createddatetime' first before field var 'x_createddatetime'
		$val = $CurrentForm->hasValue("createddatetime") ? $CurrentForm->getValue("createddatetime") : $CurrentForm->getValue("x_createddatetime");
		if (!$this->createddatetime->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->createddatetime->Visible = FALSE; // Disable update for API request
			else
				$this->createddatetime->setFormValue($val);
			$this->createddatetime->CurrentValue = UnFormatDateTime($this->createddatetime->CurrentValue, 0);
		}
		if ($CurrentForm->hasValue("o_createddatetime"))
			$this->createddatetime->setOldValue($CurrentForm->getValue("o_createddatetime"));

		// Check field name 'modifiedby' first before field var 'x_modifiedby'
		$val = $CurrentForm->hasValue("modifiedby") ? $CurrentForm->getValue("modifiedby") : $CurrentForm->getValue("x_modifiedby");
		if (!$this->modifiedby->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->modifiedby->Visible = FALSE; // Disable update for API request
			else
				$this->modifiedby->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_modifiedby"))
			$this->modifiedby->setOldValue($CurrentForm->getValue("o_modifiedby"));

		// Check field name 'modifieddatetime' first before field var 'x_modifieddatetime'
		$val = $CurrentForm->hasValue("modifieddatetime") ? $CurrentForm->getValue("modifieddatetime") : $CurrentForm->getValue("x_modifieddatetime");
		if (!$this->modifieddatetime->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->modifieddatetime->Visible = FALSE; // Disable update for API request
			else
				$this->modifieddatetime->setFormValue($val);
			$this->modifieddatetime->CurrentValue = UnFormatDateTime($this->modifieddatetime->CurrentValue, 0);
		}
		if ($CurrentForm->hasValue("o_modifieddatetime"))
			$this->modifieddatetime->setOldValue($CurrentForm->getValue("o_modifieddatetime"));

		// Check field name 'RealizationAmount' first before field var 'x_RealizationAmount'
		$val = $CurrentForm->hasValue("RealizationAmount") ? $CurrentForm->getValue("RealizationAmount") : $CurrentForm->getValue("x_RealizationAmount");
		if (!$this->RealizationAmount->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->RealizationAmount->Visible = FALSE; // Disable update for API request
			else
				$this->RealizationAmount->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_RealizationAmount"))
			$this->RealizationAmount->setOldValue($CurrentForm->getValue("o_RealizationAmount"));

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

		// Check field name 'PartnerName' first before field var 'x_PartnerName'
		$val = $CurrentForm->hasValue("PartnerName") ? $CurrentForm->getValue("PartnerName") : $CurrentForm->getValue("x_PartnerName");
		if (!$this->PartnerName->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->PartnerName->Visible = FALSE; // Disable update for API request
			else
				$this->PartnerName->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_PartnerName"))
			$this->PartnerName->setOldValue($CurrentForm->getValue("o_PartnerName"));

		// Check field name 'CardNumber' first before field var 'x_CardNumber'
		$val = $CurrentForm->hasValue("CardNumber") ? $CurrentForm->getValue("CardNumber") : $CurrentForm->getValue("x_CardNumber");
		if (!$this->CardNumber->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->CardNumber->Visible = FALSE; // Disable update for API request
			else
				$this->CardNumber->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_CardNumber"))
			$this->CardNumber->setOldValue($CurrentForm->getValue("o_CardNumber"));

		// Check field name 'BillStatus' first before field var 'x_BillStatus'
		$val = $CurrentForm->hasValue("BillStatus") ? $CurrentForm->getValue("BillStatus") : $CurrentForm->getValue("x_BillStatus");
		if (!$this->BillStatus->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->BillStatus->Visible = FALSE; // Disable update for API request
			else
				$this->BillStatus->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_BillStatus"))
			$this->BillStatus->setOldValue($CurrentForm->getValue("o_BillStatus"));

		// Check field name 'ReportHeader' first before field var 'x_ReportHeader'
		$val = $CurrentForm->hasValue("ReportHeader") ? $CurrentForm->getValue("ReportHeader") : $CurrentForm->getValue("x_ReportHeader");
		if (!$this->ReportHeader->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->ReportHeader->Visible = FALSE; // Disable update for API request
			else
				$this->ReportHeader->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_ReportHeader"))
			$this->ReportHeader->setOldValue($CurrentForm->getValue("o_ReportHeader"));

		// Check field name 'PharID' first before field var 'x_PharID'
		$val = $CurrentForm->hasValue("PharID") ? $CurrentForm->getValue("PharID") : $CurrentForm->getValue("x_PharID");
		if (!$this->PharID->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->PharID->Visible = FALSE; // Disable update for API request
			else
				$this->PharID->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_PharID"))
			$this->PharID->setOldValue($CurrentForm->getValue("o_PharID"));

		// Check field name 'UserName' first before field var 'x_UserName'
		$val = $CurrentForm->hasValue("UserName") ? $CurrentForm->getValue("UserName") : $CurrentForm->getValue("x_UserName");
		if (!$this->UserName->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->UserName->Visible = FALSE; // Disable update for API request
			else
				$this->UserName->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_UserName"))
			$this->UserName->setOldValue($CurrentForm->getValue("o_UserName"));
	}

	// Restore form values
	public function restoreFormValues()
	{
		global $CurrentForm;
		if (!$this->isGridAdd() && !$this->isAdd())
			$this->id->CurrentValue = $this->id->FormValue;
		$this->BillNumber->CurrentValue = $this->BillNumber->FormValue;
		$this->PatientId->CurrentValue = $this->PatientId->FormValue;
		$this->PatientName->CurrentValue = $this->PatientName->FormValue;
		$this->Mobile->CurrentValue = $this->Mobile->FormValue;
		$this->mrnno->CurrentValue = $this->mrnno->FormValue;
		$this->IP_OP->CurrentValue = $this->IP_OP->FormValue;
		$this->Doctor->CurrentValue = $this->Doctor->FormValue;
		$this->ModeofPayment->CurrentValue = $this->ModeofPayment->FormValue;
		$this->Amount->CurrentValue = $this->Amount->FormValue;
		$this->AnyDues->CurrentValue = $this->AnyDues->FormValue;
		$this->createdby->CurrentValue = $this->createdby->FormValue;
		$this->createddatetime->CurrentValue = $this->createddatetime->FormValue;
		$this->createddatetime->CurrentValue = UnFormatDateTime($this->createddatetime->CurrentValue, 0);
		$this->modifiedby->CurrentValue = $this->modifiedby->FormValue;
		$this->modifieddatetime->CurrentValue = $this->modifieddatetime->FormValue;
		$this->modifieddatetime->CurrentValue = UnFormatDateTime($this->modifieddatetime->CurrentValue, 0);
		$this->RealizationAmount->CurrentValue = $this->RealizationAmount->FormValue;
		$this->CId->CurrentValue = $this->CId->FormValue;
		$this->PartnerName->CurrentValue = $this->PartnerName->FormValue;
		$this->CardNumber->CurrentValue = $this->CardNumber->FormValue;
		$this->BillStatus->CurrentValue = $this->BillStatus->FormValue;
		$this->ReportHeader->CurrentValue = $this->ReportHeader->FormValue;
		$this->PharID->CurrentValue = $this->PharID->FormValue;
		$this->UserName->CurrentValue = $this->UserName->FormValue;
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
		$this->BillNumber->setDbValue($row['BillNumber']);
		$this->voucher_type->setDbValue($row['voucher_type']);
		$this->Reception->setDbValue($row['Reception']);
		$this->PatientId->setDbValue($row['PatientId']);
		$this->PatientName->setDbValue($row['PatientName']);
		$this->Mobile->setDbValue($row['Mobile']);
		$this->Age->setDbValue($row['Age']);
		$this->mrnno->setDbValue($row['mrnno']);
		$this->IP_OP->setDbValue($row['IP_OP']);
		$this->Doctor->setDbValue($row['Doctor']);
		$this->Gender->setDbValue($row['Gender']);
		$this->Details->setDbValue($row['Details']);
		$this->ModeofPayment->setDbValue($row['ModeofPayment']);
		$this->Amount->setDbValue($row['Amount']);
		$this->AnyDues->setDbValue($row['AnyDues']);
		$this->createdby->setDbValue($row['createdby']);
		$this->createddatetime->setDbValue($row['createddatetime']);
		$this->modifiedby->setDbValue($row['modifiedby']);
		$this->modifieddatetime->setDbValue($row['modifieddatetime']);
		$this->RealizationAmount->setDbValue($row['RealizationAmount']);
		$this->RealizationStatus->setDbValue($row['RealizationStatus']);
		$this->RealizationRemarks->setDbValue($row['RealizationRemarks']);
		$this->RealizationBatchNo->setDbValue($row['RealizationBatchNo']);
		$this->RealizationDate->setDbValue($row['RealizationDate']);
		$this->HospID->setDbValue($row['HospID']);
		$this->RIDNO->setDbValue($row['RIDNO']);
		$this->TidNo->setDbValue($row['TidNo']);
		$this->CId->setDbValue($row['CId']);
		$this->PartnerName->setDbValue($row['PartnerName']);
		$this->PayerType->setDbValue($row['PayerType']);
		$this->profilePic->setDbValue($row['profilePic']);
		$this->Dob->setDbValue($row['Dob']);
		$this->Currency->setDbValue($row['Currency']);
		$this->DiscountRemarks->setDbValue($row['DiscountRemarks']);
		$this->Remarks->setDbValue($row['Remarks']);
		$this->PatId->setDbValue($row['PatId']);
		$this->DrDepartment->setDbValue($row['DrDepartment']);
		$this->RefferedBy->setDbValue($row['RefferedBy']);
		$this->CardNumber->setDbValue($row['CardNumber']);
		$this->BankName->setDbValue($row['BankName']);
		$this->DrID->setDbValue($row['DrID']);
		$this->BillStatus->setDbValue($row['BillStatus']);
		$this->ReportHeader->setDbValue($row['ReportHeader']);
		$this->PharID->setDbValue($row['PharID']);
		$this->UserName->setDbValue($row['UserName']);
	}

	// Return a row with default values
	protected function newRow()
	{
		$this->loadDefaultValues();
		$row = [];
		$row['id'] = $this->id->CurrentValue;
		$row['BillNumber'] = $this->BillNumber->CurrentValue;
		$row['voucher_type'] = $this->voucher_type->CurrentValue;
		$row['Reception'] = $this->Reception->CurrentValue;
		$row['PatientId'] = $this->PatientId->CurrentValue;
		$row['PatientName'] = $this->PatientName->CurrentValue;
		$row['Mobile'] = $this->Mobile->CurrentValue;
		$row['Age'] = $this->Age->CurrentValue;
		$row['mrnno'] = $this->mrnno->CurrentValue;
		$row['IP_OP'] = $this->IP_OP->CurrentValue;
		$row['Doctor'] = $this->Doctor->CurrentValue;
		$row['Gender'] = $this->Gender->CurrentValue;
		$row['Details'] = $this->Details->CurrentValue;
		$row['ModeofPayment'] = $this->ModeofPayment->CurrentValue;
		$row['Amount'] = $this->Amount->CurrentValue;
		$row['AnyDues'] = $this->AnyDues->CurrentValue;
		$row['createdby'] = $this->createdby->CurrentValue;
		$row['createddatetime'] = $this->createddatetime->CurrentValue;
		$row['modifiedby'] = $this->modifiedby->CurrentValue;
		$row['modifieddatetime'] = $this->modifieddatetime->CurrentValue;
		$row['RealizationAmount'] = $this->RealizationAmount->CurrentValue;
		$row['RealizationStatus'] = $this->RealizationStatus->CurrentValue;
		$row['RealizationRemarks'] = $this->RealizationRemarks->CurrentValue;
		$row['RealizationBatchNo'] = $this->RealizationBatchNo->CurrentValue;
		$row['RealizationDate'] = $this->RealizationDate->CurrentValue;
		$row['HospID'] = $this->HospID->CurrentValue;
		$row['RIDNO'] = $this->RIDNO->CurrentValue;
		$row['TidNo'] = $this->TidNo->CurrentValue;
		$row['CId'] = $this->CId->CurrentValue;
		$row['PartnerName'] = $this->PartnerName->CurrentValue;
		$row['PayerType'] = $this->PayerType->CurrentValue;
		$row['profilePic'] = $this->profilePic->CurrentValue;
		$row['Dob'] = $this->Dob->CurrentValue;
		$row['Currency'] = $this->Currency->CurrentValue;
		$row['DiscountRemarks'] = $this->DiscountRemarks->CurrentValue;
		$row['Remarks'] = $this->Remarks->CurrentValue;
		$row['PatId'] = $this->PatId->CurrentValue;
		$row['DrDepartment'] = $this->DrDepartment->CurrentValue;
		$row['RefferedBy'] = $this->RefferedBy->CurrentValue;
		$row['CardNumber'] = $this->CardNumber->CurrentValue;
		$row['BankName'] = $this->BankName->CurrentValue;
		$row['DrID'] = $this->DrID->CurrentValue;
		$row['BillStatus'] = $this->BillStatus->CurrentValue;
		$row['ReportHeader'] = $this->ReportHeader->CurrentValue;
		$row['PharID'] = $this->PharID->CurrentValue;
		$row['UserName'] = $this->UserName->CurrentValue;
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
		if ($this->Amount->FormValue == $this->Amount->CurrentValue && is_numeric(ConvertToFloatString($this->Amount->CurrentValue)))
			$this->Amount->CurrentValue = ConvertToFloatString($this->Amount->CurrentValue);

		// Convert decimal values if posted back
		if ($this->RealizationAmount->FormValue == $this->RealizationAmount->CurrentValue && is_numeric(ConvertToFloatString($this->RealizationAmount->CurrentValue)))
			$this->RealizationAmount->CurrentValue = ConvertToFloatString($this->RealizationAmount->CurrentValue);

		// Call Row_Rendering event
		$this->Row_Rendering();

		// Common render codes for all row types
		// id
		// BillNumber
		// voucher_type
		// Reception

		$this->Reception->CellCssStyle = "white-space: nowrap;";

		// PatientId
		// PatientName
		// Mobile
		// Age

		$this->Age->CellCssStyle = "white-space: nowrap;";

		// mrnno
		// IP_OP
		// Doctor
		// Gender
		// Details
		// ModeofPayment
		// Amount
		// AnyDues
		// createdby
		// createddatetime
		// modifiedby
		// modifieddatetime
		// RealizationAmount
		// RealizationStatus
		// RealizationRemarks
		// RealizationBatchNo
		// RealizationDate
		// HospID
		// RIDNO
		// TidNo
		// CId
		// PartnerName
		// PayerType
		// profilePic
		// Dob
		// Currency
		// DiscountRemarks
		// Remarks
		// PatId
		// DrDepartment
		// RefferedBy
		// CardNumber
		// BankName
		// DrID
		// BillStatus
		// ReportHeader
		// PharID
		// UserName

		if ($this->RowType == ROWTYPE_VIEW) { // View row

			// id
			$this->id->ViewValue = $this->id->CurrentValue;
			$this->id->ViewCustomAttributes = "";

			// BillNumber
			$this->BillNumber->ViewValue = $this->BillNumber->CurrentValue;
			$this->BillNumber->ViewCustomAttributes = "";

			// Reception
			$curVal = strval($this->Reception->CurrentValue);
			if ($curVal != "") {
				$this->Reception->ViewValue = $this->Reception->lookupCacheOption($curVal);
				if ($this->Reception->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
					$sqlWrk = $this->Reception->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = FormatNumber($rswrk->fields('df'), 0, -2, -2, -2);
						$arwrk[2] = $rswrk->fields('df2');
						$arwrk[3] = $rswrk->fields('df3');
						$this->Reception->ViewValue = $this->Reception->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->Reception->ViewValue = $this->Reception->CurrentValue;
					}
				}
			} else {
				$this->Reception->ViewValue = NULL;
			}
			$this->Reception->ViewCustomAttributes = "";

			// PatientId
			$this->PatientId->ViewValue = $this->PatientId->CurrentValue;
			$this->PatientId->ViewCustomAttributes = "";

			// PatientName
			$this->PatientName->ViewValue = $this->PatientName->CurrentValue;
			$this->PatientName->ViewCustomAttributes = "";

			// Mobile
			$this->Mobile->ViewValue = $this->Mobile->CurrentValue;
			$this->Mobile->ViewCustomAttributes = "";

			// Age
			$this->Age->ViewValue = $this->Age->CurrentValue;
			$this->Age->ViewCustomAttributes = "";

			// mrnno
			$this->mrnno->ViewValue = $this->mrnno->CurrentValue;
			$this->mrnno->ViewCustomAttributes = "";

			// IP_OP
			$this->IP_OP->ViewValue = $this->IP_OP->CurrentValue;
			$this->IP_OP->ViewCustomAttributes = "";

			// Doctor
			$this->Doctor->ViewValue = $this->Doctor->CurrentValue;
			$this->Doctor->ViewCustomAttributes = "";

			// Gender
			$this->Gender->ViewValue = $this->Gender->CurrentValue;
			$this->Gender->ViewCustomAttributes = "";

			// Details
			$this->Details->ViewValue = $this->Details->CurrentValue;
			$this->Details->ViewCustomAttributes = "";

			// ModeofPayment
			$curVal = strval($this->ModeofPayment->CurrentValue);
			if ($curVal != "") {
				$this->ModeofPayment->ViewValue = $this->ModeofPayment->lookupCacheOption($curVal);
				if ($this->ModeofPayment->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Mode`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->ModeofPayment->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->ModeofPayment->ViewValue = $this->ModeofPayment->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->ModeofPayment->ViewValue = $this->ModeofPayment->CurrentValue;
					}
				}
			} else {
				$this->ModeofPayment->ViewValue = NULL;
			}
			$this->ModeofPayment->ViewCustomAttributes = "";

			// Amount
			$this->Amount->ViewValue = $this->Amount->CurrentValue;
			$this->Amount->ViewValue = FormatNumber($this->Amount->ViewValue, 2, -2, -2, -2);
			$this->Amount->ViewCustomAttributes = "";

			// AnyDues
			$this->AnyDues->ViewValue = $this->AnyDues->CurrentValue;
			$this->AnyDues->ViewCustomAttributes = "";

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

			// RealizationAmount
			$this->RealizationAmount->ViewValue = $this->RealizationAmount->CurrentValue;
			$this->RealizationAmount->ViewValue = FormatNumber($this->RealizationAmount->ViewValue, 2, -2, -2, -2);
			$this->RealizationAmount->ViewCustomAttributes = "";

			// RealizationStatus
			$this->RealizationStatus->ViewValue = $this->RealizationStatus->CurrentValue;
			$this->RealizationStatus->ViewCustomAttributes = "";

			// RealizationRemarks
			$this->RealizationRemarks->ViewValue = $this->RealizationRemarks->CurrentValue;
			$this->RealizationRemarks->ViewCustomAttributes = "";

			// RealizationBatchNo
			$this->RealizationBatchNo->ViewValue = $this->RealizationBatchNo->CurrentValue;
			$this->RealizationBatchNo->ViewCustomAttributes = "";

			// RealizationDate
			$this->RealizationDate->ViewValue = $this->RealizationDate->CurrentValue;
			$this->RealizationDate->ViewCustomAttributes = "";

			// HospID
			$this->HospID->ViewValue = $this->HospID->CurrentValue;
			$this->HospID->ViewValue = FormatNumber($this->HospID->ViewValue, 0, -2, -2, -2);
			$this->HospID->ViewCustomAttributes = "";

			// RIDNO
			$curVal = strval($this->RIDNO->CurrentValue);
			if ($curVal != "") {
				$this->RIDNO->ViewValue = $this->RIDNO->lookupCacheOption($curVal);
				if ($this->RIDNO->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
					$sqlWrk = $this->RIDNO->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$arwrk[2] = $rswrk->fields('df2');
						$arwrk[3] = $rswrk->fields('df3');
						$arwrk[4] = $rswrk->fields('df4');
						$this->RIDNO->ViewValue = $this->RIDNO->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->RIDNO->ViewValue = $this->RIDNO->CurrentValue;
					}
				}
			} else {
				$this->RIDNO->ViewValue = NULL;
			}
			$this->RIDNO->ViewCustomAttributes = "";

			// TidNo
			$this->TidNo->ViewValue = $this->TidNo->CurrentValue;
			$this->TidNo->ViewValue = FormatNumber($this->TidNo->ViewValue, 0, -2, -2, -2);
			$this->TidNo->ViewCustomAttributes = "";

			// CId
			$curVal = strval($this->CId->CurrentValue);
			if ($curVal != "") {
				$this->CId->ViewValue = $this->CId->lookupCacheOption($curVal);
				if ($this->CId->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
					$sqlWrk = $this->CId->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$arwrk[2] = $rswrk->fields('df2');
						$arwrk[3] = $rswrk->fields('df3');
						$arwrk[4] = $rswrk->fields('df4');
						$this->CId->ViewValue = $this->CId->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->CId->ViewValue = $this->CId->CurrentValue;
					}
				}
			} else {
				$this->CId->ViewValue = NULL;
			}
			$this->CId->ViewCustomAttributes = "";

			// PartnerName
			$this->PartnerName->ViewValue = $this->PartnerName->CurrentValue;
			$this->PartnerName->ViewCustomAttributes = "";

			// PayerType
			$this->PayerType->ViewValue = $this->PayerType->CurrentValue;
			$this->PayerType->ViewCustomAttributes = "";

			// Dob
			$this->Dob->ViewValue = $this->Dob->CurrentValue;
			$this->Dob->ViewCustomAttributes = "";

			// Currency
			$this->Currency->ViewValue = $this->Currency->CurrentValue;
			$this->Currency->ViewCustomAttributes = "";

			// DiscountRemarks
			$this->DiscountRemarks->ViewValue = $this->DiscountRemarks->CurrentValue;
			$this->DiscountRemarks->ViewCustomAttributes = "";

			// Remarks
			$this->Remarks->ViewValue = $this->Remarks->CurrentValue;
			$this->Remarks->ViewCustomAttributes = "";

			// PatId
			$curVal = strval($this->PatId->CurrentValue);
			if ($curVal != "") {
				$this->PatId->ViewValue = $this->PatId->lookupCacheOption($curVal);
				if ($this->PatId->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
					$sqlWrk = $this->PatId->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$arwrk[2] = $rswrk->fields('df2');
						$arwrk[3] = $rswrk->fields('df3');
						$this->PatId->ViewValue = $this->PatId->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->PatId->ViewValue = $this->PatId->CurrentValue;
					}
				}
			} else {
				$this->PatId->ViewValue = NULL;
			}
			$this->PatId->ViewCustomAttributes = "";

			// DrDepartment
			$this->DrDepartment->ViewValue = $this->DrDepartment->CurrentValue;
			$this->DrDepartment->ViewCustomAttributes = "";

			// RefferedBy
			$curVal = strval($this->RefferedBy->CurrentValue);
			if ($curVal != "") {
				$this->RefferedBy->ViewValue = $this->RefferedBy->lookupCacheOption($curVal);
				if ($this->RefferedBy->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`reference`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->RefferedBy->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$arwrk[2] = $rswrk->fields('df2');
						$arwrk[3] = $rswrk->fields('df3');
						$arwrk[4] = $rswrk->fields('df4');
						$this->RefferedBy->ViewValue = $this->RefferedBy->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->RefferedBy->ViewValue = $this->RefferedBy->CurrentValue;
					}
				}
			} else {
				$this->RefferedBy->ViewValue = NULL;
			}
			$this->RefferedBy->ViewCustomAttributes = "";

			// CardNumber
			$this->CardNumber->ViewValue = $this->CardNumber->CurrentValue;
			$this->CardNumber->ViewCustomAttributes = "";

			// BankName
			$this->BankName->ViewValue = $this->BankName->CurrentValue;
			$this->BankName->ViewCustomAttributes = "";

			// DrID
			$curVal = strval($this->DrID->CurrentValue);
			if ($curVal != "") {
				$this->DrID->ViewValue = $this->DrID->lookupCacheOption($curVal);
				if ($this->DrID->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
					$sqlWrk = $this->DrID->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$arwrk[2] = $rswrk->fields('df2');
						$arwrk[3] = $rswrk->fields('df3');
						$this->DrID->ViewValue = $this->DrID->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->DrID->ViewValue = $this->DrID->CurrentValue;
					}
				}
			} else {
				$this->DrID->ViewValue = NULL;
			}
			$this->DrID->ViewCustomAttributes = "";

			// BillStatus
			$this->BillStatus->ViewValue = $this->BillStatus->CurrentValue;
			$this->BillStatus->ViewValue = FormatNumber($this->BillStatus->ViewValue, 0, -2, -2, -2);
			$this->BillStatus->ViewCustomAttributes = "";

			// ReportHeader
			if (strval($this->ReportHeader->CurrentValue) != "") {
				$this->ReportHeader->ViewValue = new OptionValues();
				$arwrk = explode(",", strval($this->ReportHeader->CurrentValue));
				$cnt = count($arwrk);
				for ($ari = 0; $ari < $cnt; $ari++)
					$this->ReportHeader->ViewValue->add($this->ReportHeader->optionCaption(trim($arwrk[$ari])));
			} else {
				$this->ReportHeader->ViewValue = NULL;
			}
			$this->ReportHeader->ViewCustomAttributes = "";

			// PharID
			$this->PharID->ViewValue = $this->PharID->CurrentValue;
			$this->PharID->ViewValue = FormatNumber($this->PharID->ViewValue, 0, -2, -2, -2);
			$this->PharID->ViewCustomAttributes = "";

			// UserName
			$this->UserName->ViewValue = $this->UserName->CurrentValue;
			$this->UserName->ViewCustomAttributes = "";

			// id
			$this->id->LinkCustomAttributes = "";
			$this->id->HrefValue = "";
			$this->id->TooltipValue = "";

			// BillNumber
			$this->BillNumber->LinkCustomAttributes = "";
			$this->BillNumber->HrefValue = "";
			$this->BillNumber->TooltipValue = "";

			// PatientId
			$this->PatientId->LinkCustomAttributes = "";
			$this->PatientId->HrefValue = "";
			$this->PatientId->TooltipValue = "";

			// PatientName
			$this->PatientName->LinkCustomAttributes = "";
			$this->PatientName->HrefValue = "";
			$this->PatientName->TooltipValue = "";

			// Mobile
			$this->Mobile->LinkCustomAttributes = "";
			$this->Mobile->HrefValue = "";
			$this->Mobile->TooltipValue = "";

			// mrnno
			$this->mrnno->LinkCustomAttributes = "";
			$this->mrnno->HrefValue = "";
			$this->mrnno->TooltipValue = "";

			// IP_OP
			$this->IP_OP->LinkCustomAttributes = "";
			$this->IP_OP->HrefValue = "";
			$this->IP_OP->TooltipValue = "";

			// Doctor
			$this->Doctor->LinkCustomAttributes = "";
			$this->Doctor->HrefValue = "";
			$this->Doctor->TooltipValue = "";

			// ModeofPayment
			$this->ModeofPayment->LinkCustomAttributes = "";
			$this->ModeofPayment->HrefValue = "";
			$this->ModeofPayment->TooltipValue = "";

			// Amount
			$this->Amount->LinkCustomAttributes = "";
			$this->Amount->HrefValue = "";
			$this->Amount->TooltipValue = "";

			// AnyDues
			$this->AnyDues->LinkCustomAttributes = "";
			$this->AnyDues->HrefValue = "";
			$this->AnyDues->TooltipValue = "";

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

			// RealizationAmount
			$this->RealizationAmount->LinkCustomAttributes = "";
			$this->RealizationAmount->HrefValue = "";
			$this->RealizationAmount->TooltipValue = "";

			// CId
			$this->CId->LinkCustomAttributes = "";
			$this->CId->HrefValue = "";
			$this->CId->TooltipValue = "";

			// PartnerName
			$this->PartnerName->LinkCustomAttributes = "";
			$this->PartnerName->HrefValue = "";
			$this->PartnerName->TooltipValue = "";

			// CardNumber
			$this->CardNumber->LinkCustomAttributes = "";
			$this->CardNumber->HrefValue = "";
			$this->CardNumber->TooltipValue = "";

			// BillStatus
			$this->BillStatus->LinkCustomAttributes = "";
			$this->BillStatus->HrefValue = "";
			$this->BillStatus->TooltipValue = "";

			// ReportHeader
			$this->ReportHeader->LinkCustomAttributes = "";
			$this->ReportHeader->HrefValue = "";
			$this->ReportHeader->TooltipValue = "";

			// PharID
			$this->PharID->LinkCustomAttributes = "";
			$this->PharID->HrefValue = "";
			$this->PharID->TooltipValue = "";

			// UserName
			$this->UserName->LinkCustomAttributes = "";
			$this->UserName->HrefValue = "";
			$this->UserName->TooltipValue = "";
		} elseif ($this->RowType == ROWTYPE_ADD) { // Add row

			// id
			// BillNumber

			$this->BillNumber->EditAttrs["class"] = "form-control";
			$this->BillNumber->EditCustomAttributes = "";
			if (!$this->BillNumber->Raw)
				$this->BillNumber->CurrentValue = HtmlDecode($this->BillNumber->CurrentValue);
			$this->BillNumber->EditValue = HtmlEncode($this->BillNumber->CurrentValue);
			$this->BillNumber->PlaceHolder = RemoveHtml($this->BillNumber->caption());

			// PatientId
			$this->PatientId->EditAttrs["class"] = "form-control";
			$this->PatientId->EditCustomAttributes = "";
			if (!$this->PatientId->Raw)
				$this->PatientId->CurrentValue = HtmlDecode($this->PatientId->CurrentValue);
			$this->PatientId->EditValue = HtmlEncode($this->PatientId->CurrentValue);
			$this->PatientId->PlaceHolder = RemoveHtml($this->PatientId->caption());

			// PatientName
			$this->PatientName->EditAttrs["class"] = "form-control";
			$this->PatientName->EditCustomAttributes = "";
			if (!$this->PatientName->Raw)
				$this->PatientName->CurrentValue = HtmlDecode($this->PatientName->CurrentValue);
			$this->PatientName->EditValue = HtmlEncode($this->PatientName->CurrentValue);
			$this->PatientName->PlaceHolder = RemoveHtml($this->PatientName->caption());

			// Mobile
			$this->Mobile->EditAttrs["class"] = "form-control";
			$this->Mobile->EditCustomAttributes = "";
			if (!$this->Mobile->Raw)
				$this->Mobile->CurrentValue = HtmlDecode($this->Mobile->CurrentValue);
			$this->Mobile->EditValue = HtmlEncode($this->Mobile->CurrentValue);
			$this->Mobile->PlaceHolder = RemoveHtml($this->Mobile->caption());

			// mrnno
			$this->mrnno->EditAttrs["class"] = "form-control";
			$this->mrnno->EditCustomAttributes = "";
			if (!$this->mrnno->Raw)
				$this->mrnno->CurrentValue = HtmlDecode($this->mrnno->CurrentValue);
			$this->mrnno->EditValue = HtmlEncode($this->mrnno->CurrentValue);
			$this->mrnno->PlaceHolder = RemoveHtml($this->mrnno->caption());

			// IP_OP
			$this->IP_OP->EditAttrs["class"] = "form-control";
			$this->IP_OP->EditCustomAttributes = "";
			if (!$this->IP_OP->Raw)
				$this->IP_OP->CurrentValue = HtmlDecode($this->IP_OP->CurrentValue);
			$this->IP_OP->EditValue = HtmlEncode($this->IP_OP->CurrentValue);
			$this->IP_OP->PlaceHolder = RemoveHtml($this->IP_OP->caption());

			// Doctor
			$this->Doctor->EditAttrs["class"] = "form-control";
			$this->Doctor->EditCustomAttributes = "";
			if (!$this->Doctor->Raw)
				$this->Doctor->CurrentValue = HtmlDecode($this->Doctor->CurrentValue);
			$this->Doctor->EditValue = HtmlEncode($this->Doctor->CurrentValue);
			$this->Doctor->PlaceHolder = RemoveHtml($this->Doctor->caption());

			// ModeofPayment
			$this->ModeofPayment->EditAttrs["class"] = "form-control";
			$this->ModeofPayment->EditCustomAttributes = "";
			$curVal = trim(strval($this->ModeofPayment->CurrentValue));
			if ($curVal != "")
				$this->ModeofPayment->ViewValue = $this->ModeofPayment->lookupCacheOption($curVal);
			else
				$this->ModeofPayment->ViewValue = $this->ModeofPayment->Lookup !== NULL && is_array($this->ModeofPayment->Lookup->Options) ? $curVal : NULL;
			if ($this->ModeofPayment->ViewValue !== NULL) { // Load from cache
				$this->ModeofPayment->EditValue = array_values($this->ModeofPayment->Lookup->Options);
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`Mode`" . SearchString("=", $this->ModeofPayment->CurrentValue, DATATYPE_STRING, "");
				}
				$sqlWrk = $this->ModeofPayment->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				$arwrk = $rswrk ? $rswrk->getRows() : [];
				if ($rswrk)
					$rswrk->close();
				$this->ModeofPayment->EditValue = $arwrk;
			}

			// Amount
			$this->Amount->EditAttrs["class"] = "form-control";
			$this->Amount->EditCustomAttributes = "";
			$this->Amount->EditValue = HtmlEncode($this->Amount->CurrentValue);
			$this->Amount->PlaceHolder = RemoveHtml($this->Amount->caption());
			if (strval($this->Amount->EditValue) != "" && is_numeric($this->Amount->EditValue)) {
				$this->Amount->EditValue = FormatNumber($this->Amount->EditValue, -2, -2, -2, -2);
				$this->Amount->OldValue = $this->Amount->EditValue;
			}
			

			// AnyDues
			$this->AnyDues->EditAttrs["class"] = "form-control";
			$this->AnyDues->EditCustomAttributes = "";
			if (!$this->AnyDues->Raw)
				$this->AnyDues->CurrentValue = HtmlDecode($this->AnyDues->CurrentValue);
			$this->AnyDues->EditValue = HtmlEncode($this->AnyDues->CurrentValue);
			$this->AnyDues->PlaceHolder = RemoveHtml($this->AnyDues->caption());

			// createdby
			// createddatetime
			// modifiedby
			// modifieddatetime
			// RealizationAmount

			$this->RealizationAmount->EditAttrs["class"] = "form-control";
			$this->RealizationAmount->EditCustomAttributes = "";
			$this->RealizationAmount->EditValue = HtmlEncode($this->RealizationAmount->CurrentValue);
			$this->RealizationAmount->PlaceHolder = RemoveHtml($this->RealizationAmount->caption());
			if (strval($this->RealizationAmount->EditValue) != "" && is_numeric($this->RealizationAmount->EditValue)) {
				$this->RealizationAmount->EditValue = FormatNumber($this->RealizationAmount->EditValue, -2, -2, -2, -2);
				$this->RealizationAmount->OldValue = $this->RealizationAmount->EditValue;
			}
			

			// CId
			$this->CId->EditCustomAttributes = "";
			$curVal = trim(strval($this->CId->CurrentValue));
			if ($curVal != "")
				$this->CId->ViewValue = $this->CId->lookupCacheOption($curVal);
			else
				$this->CId->ViewValue = $this->CId->Lookup !== NULL && is_array($this->CId->Lookup->Options) ? $curVal : NULL;
			if ($this->CId->ViewValue !== NULL) { // Load from cache
				$this->CId->EditValue = array_values($this->CId->Lookup->Options);
				if ($this->CId->ViewValue == "")
					$this->CId->ViewValue = $Language->phrase("PleaseSelect");
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`id`" . SearchString("=", $this->CId->CurrentValue, DATATYPE_NUMBER, "");
				}
				$sqlWrk = $this->CId->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = [];
					$arwrk[1] = HtmlEncode($rswrk->fields('df'));
					$arwrk[2] = HtmlEncode($rswrk->fields('df2'));
					$arwrk[3] = HtmlEncode($rswrk->fields('df3'));
					$arwrk[4] = HtmlEncode($rswrk->fields('df4'));
					$this->CId->ViewValue = $this->CId->displayValue($arwrk);
				} else {
					$this->CId->ViewValue = $Language->phrase("PleaseSelect");
				}
				$arwrk = $rswrk ? $rswrk->getRows() : [];
				if ($rswrk)
					$rswrk->close();
				$this->CId->EditValue = $arwrk;
			}

			// PartnerName
			$this->PartnerName->EditAttrs["class"] = "form-control";
			$this->PartnerName->EditCustomAttributes = "";
			if (!$this->PartnerName->Raw)
				$this->PartnerName->CurrentValue = HtmlDecode($this->PartnerName->CurrentValue);
			$this->PartnerName->EditValue = HtmlEncode($this->PartnerName->CurrentValue);
			$this->PartnerName->PlaceHolder = RemoveHtml($this->PartnerName->caption());

			// CardNumber
			$this->CardNumber->EditAttrs["class"] = "form-control";
			$this->CardNumber->EditCustomAttributes = "";
			if (!$this->CardNumber->Raw)
				$this->CardNumber->CurrentValue = HtmlDecode($this->CardNumber->CurrentValue);
			$this->CardNumber->EditValue = HtmlEncode($this->CardNumber->CurrentValue);
			$this->CardNumber->PlaceHolder = RemoveHtml($this->CardNumber->caption());

			// BillStatus
			$this->BillStatus->EditAttrs["class"] = "form-control";
			$this->BillStatus->EditCustomAttributes = "";
			$this->BillStatus->EditValue = HtmlEncode($this->BillStatus->CurrentValue);
			$this->BillStatus->PlaceHolder = RemoveHtml($this->BillStatus->caption());

			// ReportHeader
			$this->ReportHeader->EditCustomAttributes = "";
			$this->ReportHeader->EditValue = $this->ReportHeader->options(FALSE);

			// PharID
			$this->PharID->EditAttrs["class"] = "form-control";
			$this->PharID->EditCustomAttributes = "";
			$this->PharID->EditValue = HtmlEncode($this->PharID->CurrentValue);
			$this->PharID->PlaceHolder = RemoveHtml($this->PharID->caption());

			// UserName
			// Add refer script
			// id

			$this->id->LinkCustomAttributes = "";
			$this->id->HrefValue = "";

			// BillNumber
			$this->BillNumber->LinkCustomAttributes = "";
			$this->BillNumber->HrefValue = "";

			// PatientId
			$this->PatientId->LinkCustomAttributes = "";
			$this->PatientId->HrefValue = "";

			// PatientName
			$this->PatientName->LinkCustomAttributes = "";
			$this->PatientName->HrefValue = "";

			// Mobile
			$this->Mobile->LinkCustomAttributes = "";
			$this->Mobile->HrefValue = "";

			// mrnno
			$this->mrnno->LinkCustomAttributes = "";
			$this->mrnno->HrefValue = "";

			// IP_OP
			$this->IP_OP->LinkCustomAttributes = "";
			$this->IP_OP->HrefValue = "";

			// Doctor
			$this->Doctor->LinkCustomAttributes = "";
			$this->Doctor->HrefValue = "";

			// ModeofPayment
			$this->ModeofPayment->LinkCustomAttributes = "";
			$this->ModeofPayment->HrefValue = "";

			// Amount
			$this->Amount->LinkCustomAttributes = "";
			$this->Amount->HrefValue = "";

			// AnyDues
			$this->AnyDues->LinkCustomAttributes = "";
			$this->AnyDues->HrefValue = "";

			// createdby
			$this->createdby->LinkCustomAttributes = "";
			$this->createdby->HrefValue = "";

			// createddatetime
			$this->createddatetime->LinkCustomAttributes = "";
			$this->createddatetime->HrefValue = "";

			// modifiedby
			$this->modifiedby->LinkCustomAttributes = "";
			$this->modifiedby->HrefValue = "";

			// modifieddatetime
			$this->modifieddatetime->LinkCustomAttributes = "";
			$this->modifieddatetime->HrefValue = "";

			// RealizationAmount
			$this->RealizationAmount->LinkCustomAttributes = "";
			$this->RealizationAmount->HrefValue = "";

			// CId
			$this->CId->LinkCustomAttributes = "";
			$this->CId->HrefValue = "";

			// PartnerName
			$this->PartnerName->LinkCustomAttributes = "";
			$this->PartnerName->HrefValue = "";

			// CardNumber
			$this->CardNumber->LinkCustomAttributes = "";
			$this->CardNumber->HrefValue = "";

			// BillStatus
			$this->BillStatus->LinkCustomAttributes = "";
			$this->BillStatus->HrefValue = "";

			// ReportHeader
			$this->ReportHeader->LinkCustomAttributes = "";
			$this->ReportHeader->HrefValue = "";

			// PharID
			$this->PharID->LinkCustomAttributes = "";
			$this->PharID->HrefValue = "";

			// UserName
			$this->UserName->LinkCustomAttributes = "";
			$this->UserName->HrefValue = "";
		} elseif ($this->RowType == ROWTYPE_EDIT) { // Edit row

			// id
			$this->id->EditAttrs["class"] = "form-control";
			$this->id->EditCustomAttributes = "";
			$this->id->EditValue = $this->id->CurrentValue;
			$this->id->ViewCustomAttributes = "";

			// BillNumber
			$this->BillNumber->EditAttrs["class"] = "form-control";
			$this->BillNumber->EditCustomAttributes = "";
			if (!$this->BillNumber->Raw)
				$this->BillNumber->CurrentValue = HtmlDecode($this->BillNumber->CurrentValue);
			$this->BillNumber->EditValue = HtmlEncode($this->BillNumber->CurrentValue);
			$this->BillNumber->PlaceHolder = RemoveHtml($this->BillNumber->caption());

			// PatientId
			$this->PatientId->EditAttrs["class"] = "form-control";
			$this->PatientId->EditCustomAttributes = "";
			if (!$this->PatientId->Raw)
				$this->PatientId->CurrentValue = HtmlDecode($this->PatientId->CurrentValue);
			$this->PatientId->EditValue = HtmlEncode($this->PatientId->CurrentValue);
			$this->PatientId->PlaceHolder = RemoveHtml($this->PatientId->caption());

			// PatientName
			$this->PatientName->EditAttrs["class"] = "form-control";
			$this->PatientName->EditCustomAttributes = "";
			if (!$this->PatientName->Raw)
				$this->PatientName->CurrentValue = HtmlDecode($this->PatientName->CurrentValue);
			$this->PatientName->EditValue = HtmlEncode($this->PatientName->CurrentValue);
			$this->PatientName->PlaceHolder = RemoveHtml($this->PatientName->caption());

			// Mobile
			$this->Mobile->EditAttrs["class"] = "form-control";
			$this->Mobile->EditCustomAttributes = "";
			if (!$this->Mobile->Raw)
				$this->Mobile->CurrentValue = HtmlDecode($this->Mobile->CurrentValue);
			$this->Mobile->EditValue = HtmlEncode($this->Mobile->CurrentValue);
			$this->Mobile->PlaceHolder = RemoveHtml($this->Mobile->caption());

			// mrnno
			$this->mrnno->EditAttrs["class"] = "form-control";
			$this->mrnno->EditCustomAttributes = "";
			if (!$this->mrnno->Raw)
				$this->mrnno->CurrentValue = HtmlDecode($this->mrnno->CurrentValue);
			$this->mrnno->EditValue = HtmlEncode($this->mrnno->CurrentValue);
			$this->mrnno->PlaceHolder = RemoveHtml($this->mrnno->caption());

			// IP_OP
			$this->IP_OP->EditAttrs["class"] = "form-control";
			$this->IP_OP->EditCustomAttributes = "";
			if (!$this->IP_OP->Raw)
				$this->IP_OP->CurrentValue = HtmlDecode($this->IP_OP->CurrentValue);
			$this->IP_OP->EditValue = HtmlEncode($this->IP_OP->CurrentValue);
			$this->IP_OP->PlaceHolder = RemoveHtml($this->IP_OP->caption());

			// Doctor
			$this->Doctor->EditAttrs["class"] = "form-control";
			$this->Doctor->EditCustomAttributes = "";
			if (!$this->Doctor->Raw)
				$this->Doctor->CurrentValue = HtmlDecode($this->Doctor->CurrentValue);
			$this->Doctor->EditValue = HtmlEncode($this->Doctor->CurrentValue);
			$this->Doctor->PlaceHolder = RemoveHtml($this->Doctor->caption());

			// ModeofPayment
			$this->ModeofPayment->EditAttrs["class"] = "form-control";
			$this->ModeofPayment->EditCustomAttributes = "";
			$curVal = trim(strval($this->ModeofPayment->CurrentValue));
			if ($curVal != "")
				$this->ModeofPayment->ViewValue = $this->ModeofPayment->lookupCacheOption($curVal);
			else
				$this->ModeofPayment->ViewValue = $this->ModeofPayment->Lookup !== NULL && is_array($this->ModeofPayment->Lookup->Options) ? $curVal : NULL;
			if ($this->ModeofPayment->ViewValue !== NULL) { // Load from cache
				$this->ModeofPayment->EditValue = array_values($this->ModeofPayment->Lookup->Options);
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`Mode`" . SearchString("=", $this->ModeofPayment->CurrentValue, DATATYPE_STRING, "");
				}
				$sqlWrk = $this->ModeofPayment->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				$arwrk = $rswrk ? $rswrk->getRows() : [];
				if ($rswrk)
					$rswrk->close();
				$this->ModeofPayment->EditValue = $arwrk;
			}

			// Amount
			$this->Amount->EditAttrs["class"] = "form-control";
			$this->Amount->EditCustomAttributes = "";
			$this->Amount->EditValue = HtmlEncode($this->Amount->CurrentValue);
			$this->Amount->PlaceHolder = RemoveHtml($this->Amount->caption());
			if (strval($this->Amount->EditValue) != "" && is_numeric($this->Amount->EditValue)) {
				$this->Amount->EditValue = FormatNumber($this->Amount->EditValue, -2, -2, -2, -2);
				$this->Amount->OldValue = $this->Amount->EditValue;
			}
			

			// AnyDues
			$this->AnyDues->EditAttrs["class"] = "form-control";
			$this->AnyDues->EditCustomAttributes = "";
			if (!$this->AnyDues->Raw)
				$this->AnyDues->CurrentValue = HtmlDecode($this->AnyDues->CurrentValue);
			$this->AnyDues->EditValue = HtmlEncode($this->AnyDues->CurrentValue);
			$this->AnyDues->PlaceHolder = RemoveHtml($this->AnyDues->caption());

			// createdby
			// createddatetime
			// modifiedby
			// modifieddatetime
			// RealizationAmount

			$this->RealizationAmount->EditAttrs["class"] = "form-control";
			$this->RealizationAmount->EditCustomAttributes = "";
			$this->RealizationAmount->EditValue = HtmlEncode($this->RealizationAmount->CurrentValue);
			$this->RealizationAmount->PlaceHolder = RemoveHtml($this->RealizationAmount->caption());
			if (strval($this->RealizationAmount->EditValue) != "" && is_numeric($this->RealizationAmount->EditValue)) {
				$this->RealizationAmount->EditValue = FormatNumber($this->RealizationAmount->EditValue, -2, -2, -2, -2);
				$this->RealizationAmount->OldValue = $this->RealizationAmount->EditValue;
			}
			

			// CId
			$this->CId->EditCustomAttributes = "";
			$curVal = trim(strval($this->CId->CurrentValue));
			if ($curVal != "")
				$this->CId->ViewValue = $this->CId->lookupCacheOption($curVal);
			else
				$this->CId->ViewValue = $this->CId->Lookup !== NULL && is_array($this->CId->Lookup->Options) ? $curVal : NULL;
			if ($this->CId->ViewValue !== NULL) { // Load from cache
				$this->CId->EditValue = array_values($this->CId->Lookup->Options);
				if ($this->CId->ViewValue == "")
					$this->CId->ViewValue = $Language->phrase("PleaseSelect");
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`id`" . SearchString("=", $this->CId->CurrentValue, DATATYPE_NUMBER, "");
				}
				$sqlWrk = $this->CId->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = [];
					$arwrk[1] = HtmlEncode($rswrk->fields('df'));
					$arwrk[2] = HtmlEncode($rswrk->fields('df2'));
					$arwrk[3] = HtmlEncode($rswrk->fields('df3'));
					$arwrk[4] = HtmlEncode($rswrk->fields('df4'));
					$this->CId->ViewValue = $this->CId->displayValue($arwrk);
				} else {
					$this->CId->ViewValue = $Language->phrase("PleaseSelect");
				}
				$arwrk = $rswrk ? $rswrk->getRows() : [];
				if ($rswrk)
					$rswrk->close();
				$this->CId->EditValue = $arwrk;
			}

			// PartnerName
			$this->PartnerName->EditAttrs["class"] = "form-control";
			$this->PartnerName->EditCustomAttributes = "";
			if (!$this->PartnerName->Raw)
				$this->PartnerName->CurrentValue = HtmlDecode($this->PartnerName->CurrentValue);
			$this->PartnerName->EditValue = HtmlEncode($this->PartnerName->CurrentValue);
			$this->PartnerName->PlaceHolder = RemoveHtml($this->PartnerName->caption());

			// CardNumber
			$this->CardNumber->EditAttrs["class"] = "form-control";
			$this->CardNumber->EditCustomAttributes = "";
			if (!$this->CardNumber->Raw)
				$this->CardNumber->CurrentValue = HtmlDecode($this->CardNumber->CurrentValue);
			$this->CardNumber->EditValue = HtmlEncode($this->CardNumber->CurrentValue);
			$this->CardNumber->PlaceHolder = RemoveHtml($this->CardNumber->caption());

			// BillStatus
			$this->BillStatus->EditAttrs["class"] = "form-control";
			$this->BillStatus->EditCustomAttributes = "";
			$this->BillStatus->EditValue = HtmlEncode($this->BillStatus->CurrentValue);
			$this->BillStatus->PlaceHolder = RemoveHtml($this->BillStatus->caption());

			// ReportHeader
			$this->ReportHeader->EditCustomAttributes = "";
			$this->ReportHeader->EditValue = $this->ReportHeader->options(FALSE);

			// PharID
			$this->PharID->EditAttrs["class"] = "form-control";
			$this->PharID->EditCustomAttributes = "";
			$this->PharID->EditValue = HtmlEncode($this->PharID->CurrentValue);
			$this->PharID->PlaceHolder = RemoveHtml($this->PharID->caption());

			// UserName
			// Edit refer script
			// id

			$this->id->LinkCustomAttributes = "";
			$this->id->HrefValue = "";

			// BillNumber
			$this->BillNumber->LinkCustomAttributes = "";
			$this->BillNumber->HrefValue = "";

			// PatientId
			$this->PatientId->LinkCustomAttributes = "";
			$this->PatientId->HrefValue = "";

			// PatientName
			$this->PatientName->LinkCustomAttributes = "";
			$this->PatientName->HrefValue = "";

			// Mobile
			$this->Mobile->LinkCustomAttributes = "";
			$this->Mobile->HrefValue = "";

			// mrnno
			$this->mrnno->LinkCustomAttributes = "";
			$this->mrnno->HrefValue = "";

			// IP_OP
			$this->IP_OP->LinkCustomAttributes = "";
			$this->IP_OP->HrefValue = "";

			// Doctor
			$this->Doctor->LinkCustomAttributes = "";
			$this->Doctor->HrefValue = "";

			// ModeofPayment
			$this->ModeofPayment->LinkCustomAttributes = "";
			$this->ModeofPayment->HrefValue = "";

			// Amount
			$this->Amount->LinkCustomAttributes = "";
			$this->Amount->HrefValue = "";

			// AnyDues
			$this->AnyDues->LinkCustomAttributes = "";
			$this->AnyDues->HrefValue = "";

			// createdby
			$this->createdby->LinkCustomAttributes = "";
			$this->createdby->HrefValue = "";

			// createddatetime
			$this->createddatetime->LinkCustomAttributes = "";
			$this->createddatetime->HrefValue = "";

			// modifiedby
			$this->modifiedby->LinkCustomAttributes = "";
			$this->modifiedby->HrefValue = "";

			// modifieddatetime
			$this->modifieddatetime->LinkCustomAttributes = "";
			$this->modifieddatetime->HrefValue = "";

			// RealizationAmount
			$this->RealizationAmount->LinkCustomAttributes = "";
			$this->RealizationAmount->HrefValue = "";

			// CId
			$this->CId->LinkCustomAttributes = "";
			$this->CId->HrefValue = "";

			// PartnerName
			$this->PartnerName->LinkCustomAttributes = "";
			$this->PartnerName->HrefValue = "";

			// CardNumber
			$this->CardNumber->LinkCustomAttributes = "";
			$this->CardNumber->HrefValue = "";

			// BillStatus
			$this->BillStatus->LinkCustomAttributes = "";
			$this->BillStatus->HrefValue = "";

			// ReportHeader
			$this->ReportHeader->LinkCustomAttributes = "";
			$this->ReportHeader->HrefValue = "";

			// PharID
			$this->PharID->LinkCustomAttributes = "";
			$this->PharID->HrefValue = "";

			// UserName
			$this->UserName->LinkCustomAttributes = "";
			$this->UserName->HrefValue = "";
		}
		if ($this->RowType == ROWTYPE_ADD || $this->RowType == ROWTYPE_EDIT || $this->RowType == ROWTYPE_SEARCH) // Add/Edit/Search row
			$this->setupFieldTitles();

		// Call Row Rendered event
		if ($this->RowType != ROWTYPE_AGGREGATEINIT)
			$this->Row_Rendered();
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
		if ($this->BillNumber->Required) {
			if (!$this->BillNumber->IsDetailKey && $this->BillNumber->FormValue != NULL && $this->BillNumber->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->BillNumber->caption(), $this->BillNumber->RequiredErrorMessage));
			}
		}
		if ($this->PatientId->Required) {
			if (!$this->PatientId->IsDetailKey && $this->PatientId->FormValue != NULL && $this->PatientId->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PatientId->caption(), $this->PatientId->RequiredErrorMessage));
			}
		}
		if ($this->PatientName->Required) {
			if (!$this->PatientName->IsDetailKey && $this->PatientName->FormValue != NULL && $this->PatientName->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PatientName->caption(), $this->PatientName->RequiredErrorMessage));
			}
		}
		if ($this->Mobile->Required) {
			if (!$this->Mobile->IsDetailKey && $this->Mobile->FormValue != NULL && $this->Mobile->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Mobile->caption(), $this->Mobile->RequiredErrorMessage));
			}
		}
		if ($this->mrnno->Required) {
			if (!$this->mrnno->IsDetailKey && $this->mrnno->FormValue != NULL && $this->mrnno->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->mrnno->caption(), $this->mrnno->RequiredErrorMessage));
			}
		}
		if ($this->IP_OP->Required) {
			if (!$this->IP_OP->IsDetailKey && $this->IP_OP->FormValue != NULL && $this->IP_OP->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->IP_OP->caption(), $this->IP_OP->RequiredErrorMessage));
			}
		}
		if ($this->Doctor->Required) {
			if (!$this->Doctor->IsDetailKey && $this->Doctor->FormValue != NULL && $this->Doctor->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Doctor->caption(), $this->Doctor->RequiredErrorMessage));
			}
		}
		if ($this->ModeofPayment->Required) {
			if (!$this->ModeofPayment->IsDetailKey && $this->ModeofPayment->FormValue != NULL && $this->ModeofPayment->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->ModeofPayment->caption(), $this->ModeofPayment->RequiredErrorMessage));
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
		if ($this->AnyDues->Required) {
			if (!$this->AnyDues->IsDetailKey && $this->AnyDues->FormValue != NULL && $this->AnyDues->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->AnyDues->caption(), $this->AnyDues->RequiredErrorMessage));
			}
		}
		if ($this->createdby->Required) {
			if (!$this->createdby->IsDetailKey && $this->createdby->FormValue != NULL && $this->createdby->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->createdby->caption(), $this->createdby->RequiredErrorMessage));
			}
		}
		if ($this->createddatetime->Required) {
			if (!$this->createddatetime->IsDetailKey && $this->createddatetime->FormValue != NULL && $this->createddatetime->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->createddatetime->caption(), $this->createddatetime->RequiredErrorMessage));
			}
		}
		if ($this->modifiedby->Required) {
			if (!$this->modifiedby->IsDetailKey && $this->modifiedby->FormValue != NULL && $this->modifiedby->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->modifiedby->caption(), $this->modifiedby->RequiredErrorMessage));
			}
		}
		if ($this->modifieddatetime->Required) {
			if (!$this->modifieddatetime->IsDetailKey && $this->modifieddatetime->FormValue != NULL && $this->modifieddatetime->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->modifieddatetime->caption(), $this->modifieddatetime->RequiredErrorMessage));
			}
		}
		if ($this->RealizationAmount->Required) {
			if (!$this->RealizationAmount->IsDetailKey && $this->RealizationAmount->FormValue != NULL && $this->RealizationAmount->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->RealizationAmount->caption(), $this->RealizationAmount->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->RealizationAmount->FormValue)) {
			AddMessage($FormError, $this->RealizationAmount->errorMessage());
		}
		if ($this->CId->Required) {
			if (!$this->CId->IsDetailKey && $this->CId->FormValue != NULL && $this->CId->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->CId->caption(), $this->CId->RequiredErrorMessage));
			}
		}
		if ($this->PartnerName->Required) {
			if (!$this->PartnerName->IsDetailKey && $this->PartnerName->FormValue != NULL && $this->PartnerName->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PartnerName->caption(), $this->PartnerName->RequiredErrorMessage));
			}
		}
		if ($this->CardNumber->Required) {
			if (!$this->CardNumber->IsDetailKey && $this->CardNumber->FormValue != NULL && $this->CardNumber->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->CardNumber->caption(), $this->CardNumber->RequiredErrorMessage));
			}
		}
		if ($this->BillStatus->Required) {
			if (!$this->BillStatus->IsDetailKey && $this->BillStatus->FormValue != NULL && $this->BillStatus->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->BillStatus->caption(), $this->BillStatus->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->BillStatus->FormValue)) {
			AddMessage($FormError, $this->BillStatus->errorMessage());
		}
		if ($this->ReportHeader->Required) {
			if ($this->ReportHeader->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->ReportHeader->caption(), $this->ReportHeader->RequiredErrorMessage));
			}
		}
		if ($this->PharID->Required) {
			if (!$this->PharID->IsDetailKey && $this->PharID->FormValue != NULL && $this->PharID->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PharID->caption(), $this->PharID->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->PharID->FormValue)) {
			AddMessage($FormError, $this->PharID->errorMessage());
		}
		if ($this->UserName->Required) {
			if (!$this->UserName->IsDetailKey && $this->UserName->FormValue != NULL && $this->UserName->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->UserName->caption(), $this->UserName->RequiredErrorMessage));
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

			// BillNumber
			$this->BillNumber->setDbValueDef($rsnew, $this->BillNumber->CurrentValue, NULL, $this->BillNumber->ReadOnly);

			// PatientId
			$this->PatientId->setDbValueDef($rsnew, $this->PatientId->CurrentValue, NULL, $this->PatientId->ReadOnly);

			// PatientName
			$this->PatientName->setDbValueDef($rsnew, $this->PatientName->CurrentValue, NULL, $this->PatientName->ReadOnly);

			// Mobile
			$this->Mobile->setDbValueDef($rsnew, $this->Mobile->CurrentValue, NULL, $this->Mobile->ReadOnly);

			// mrnno
			$this->mrnno->setDbValueDef($rsnew, $this->mrnno->CurrentValue, NULL, $this->mrnno->ReadOnly);

			// IP_OP
			$this->IP_OP->setDbValueDef($rsnew, $this->IP_OP->CurrentValue, NULL, $this->IP_OP->ReadOnly);

			// Doctor
			$this->Doctor->setDbValueDef($rsnew, $this->Doctor->CurrentValue, NULL, $this->Doctor->ReadOnly);

			// ModeofPayment
			$this->ModeofPayment->setDbValueDef($rsnew, $this->ModeofPayment->CurrentValue, NULL, $this->ModeofPayment->ReadOnly);

			// Amount
			$this->Amount->setDbValueDef($rsnew, $this->Amount->CurrentValue, NULL, $this->Amount->ReadOnly);

			// AnyDues
			$this->AnyDues->setDbValueDef($rsnew, $this->AnyDues->CurrentValue, NULL, $this->AnyDues->ReadOnly);

			// createdby
			$this->createdby->CurrentValue = CurrentUserName();
			$this->createdby->setDbValueDef($rsnew, $this->createdby->CurrentValue, NULL);

			// createddatetime
			$this->createddatetime->CurrentValue = CurrentDateTime();
			$this->createddatetime->setDbValueDef($rsnew, $this->createddatetime->CurrentValue, NULL);

			// modifiedby
			$this->modifiedby->CurrentValue = CurrentUserName();
			$this->modifiedby->setDbValueDef($rsnew, $this->modifiedby->CurrentValue, NULL);

			// modifieddatetime
			$this->modifieddatetime->CurrentValue = CurrentDateTime();
			$this->modifieddatetime->setDbValueDef($rsnew, $this->modifieddatetime->CurrentValue, NULL);

			// RealizationAmount
			$this->RealizationAmount->setDbValueDef($rsnew, $this->RealizationAmount->CurrentValue, NULL, $this->RealizationAmount->ReadOnly);

			// CId
			$this->CId->setDbValueDef($rsnew, $this->CId->CurrentValue, NULL, $this->CId->ReadOnly);

			// PartnerName
			$this->PartnerName->setDbValueDef($rsnew, $this->PartnerName->CurrentValue, NULL, $this->PartnerName->ReadOnly);

			// CardNumber
			$this->CardNumber->setDbValueDef($rsnew, $this->CardNumber->CurrentValue, NULL, $this->CardNumber->ReadOnly);

			// BillStatus
			$this->BillStatus->setDbValueDef($rsnew, $this->BillStatus->CurrentValue, NULL, $this->BillStatus->ReadOnly);

			// ReportHeader
			$this->ReportHeader->setDbValueDef($rsnew, $this->ReportHeader->CurrentValue, NULL, $this->ReportHeader->ReadOnly);

			// PharID
			$this->PharID->setDbValueDef($rsnew, $this->PharID->CurrentValue, NULL, $this->PharID->ReadOnly);

			// UserName
			$this->UserName->CurrentValue = GetUserName();
			$this->UserName->setDbValueDef($rsnew, $this->UserName->CurrentValue, NULL);

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
		$hash .= GetFieldHash($rs->fields('BillNumber')); // BillNumber
		$hash .= GetFieldHash($rs->fields('PatientId')); // PatientId
		$hash .= GetFieldHash($rs->fields('PatientName')); // PatientName
		$hash .= GetFieldHash($rs->fields('Mobile')); // Mobile
		$hash .= GetFieldHash($rs->fields('mrnno')); // mrnno
		$hash .= GetFieldHash($rs->fields('IP_OP')); // IP_OP
		$hash .= GetFieldHash($rs->fields('Doctor')); // Doctor
		$hash .= GetFieldHash($rs->fields('ModeofPayment')); // ModeofPayment
		$hash .= GetFieldHash($rs->fields('Amount')); // Amount
		$hash .= GetFieldHash($rs->fields('AnyDues')); // AnyDues
		$hash .= GetFieldHash($rs->fields('createdby')); // createdby
		$hash .= GetFieldHash($rs->fields('createddatetime')); // createddatetime
		$hash .= GetFieldHash($rs->fields('modifiedby')); // modifiedby
		$hash .= GetFieldHash($rs->fields('modifieddatetime')); // modifieddatetime
		$hash .= GetFieldHash($rs->fields('RealizationAmount')); // RealizationAmount
		$hash .= GetFieldHash($rs->fields('CId')); // CId
		$hash .= GetFieldHash($rs->fields('PartnerName')); // PartnerName
		$hash .= GetFieldHash($rs->fields('CardNumber')); // CardNumber
		$hash .= GetFieldHash($rs->fields('BillStatus')); // BillStatus
		$hash .= GetFieldHash($rs->fields('ReportHeader')); // ReportHeader
		$hash .= GetFieldHash($rs->fields('PharID')); // PharID
		$hash .= GetFieldHash($rs->fields('UserName')); // UserName
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

		// BillNumber
		$this->BillNumber->setDbValueDef($rsnew, $this->BillNumber->CurrentValue, NULL, FALSE);

		// PatientId
		$this->PatientId->setDbValueDef($rsnew, $this->PatientId->CurrentValue, NULL, FALSE);

		// PatientName
		$this->PatientName->setDbValueDef($rsnew, $this->PatientName->CurrentValue, NULL, FALSE);

		// Mobile
		$this->Mobile->setDbValueDef($rsnew, $this->Mobile->CurrentValue, NULL, FALSE);

		// mrnno
		$this->mrnno->setDbValueDef($rsnew, $this->mrnno->CurrentValue, NULL, FALSE);

		// IP_OP
		$this->IP_OP->setDbValueDef($rsnew, $this->IP_OP->CurrentValue, NULL, FALSE);

		// Doctor
		$this->Doctor->setDbValueDef($rsnew, $this->Doctor->CurrentValue, NULL, FALSE);

		// ModeofPayment
		$this->ModeofPayment->setDbValueDef($rsnew, $this->ModeofPayment->CurrentValue, NULL, FALSE);

		// Amount
		$this->Amount->setDbValueDef($rsnew, $this->Amount->CurrentValue, NULL, FALSE);

		// AnyDues
		$this->AnyDues->setDbValueDef($rsnew, $this->AnyDues->CurrentValue, NULL, FALSE);

		// createdby
		$this->createdby->CurrentValue = CurrentUserName();
		$this->createdby->setDbValueDef($rsnew, $this->createdby->CurrentValue, NULL);

		// createddatetime
		$this->createddatetime->CurrentValue = CurrentDateTime();
		$this->createddatetime->setDbValueDef($rsnew, $this->createddatetime->CurrentValue, NULL);

		// modifiedby
		$this->modifiedby->CurrentValue = CurrentUserName();
		$this->modifiedby->setDbValueDef($rsnew, $this->modifiedby->CurrentValue, NULL);

		// modifieddatetime
		$this->modifieddatetime->CurrentValue = CurrentDateTime();
		$this->modifieddatetime->setDbValueDef($rsnew, $this->modifieddatetime->CurrentValue, NULL);

		// RealizationAmount
		$this->RealizationAmount->setDbValueDef($rsnew, $this->RealizationAmount->CurrentValue, NULL, FALSE);

		// CId
		$this->CId->setDbValueDef($rsnew, $this->CId->CurrentValue, NULL, FALSE);

		// PartnerName
		$this->PartnerName->setDbValueDef($rsnew, $this->PartnerName->CurrentValue, NULL, FALSE);

		// CardNumber
		$this->CardNumber->setDbValueDef($rsnew, $this->CardNumber->CurrentValue, NULL, FALSE);

		// BillStatus
		$this->BillStatus->setDbValueDef($rsnew, $this->BillStatus->CurrentValue, NULL, strval($this->BillStatus->CurrentValue) == "");

		// ReportHeader
		$this->ReportHeader->setDbValueDef($rsnew, $this->ReportHeader->CurrentValue, NULL, FALSE);

		// PharID
		$this->PharID->setDbValueDef($rsnew, $this->PharID->CurrentValue, NULL, FALSE);

		// UserName
		$this->UserName->CurrentValue = GetUserName();
		$this->UserName->setDbValueDef($rsnew, $this->UserName->CurrentValue, NULL);

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

	// Get export HTML tag
	protected function getExportTag($type, $custom = FALSE)
	{
		global $Language;
		if (SameText($type, "excel")) {
			if ($custom)
				return "<a href=\"#\" class=\"ew-export-link ew-excel\" title=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" onclick=\"return ew.export(document.fpharmacy_billing_voucherlist, '" . $this->ExportExcelUrl . "', 'excel', true);\">" . $Language->phrase("ExportToExcel") . "</a>";
			else
				return "<a href=\"" . $this->ExportExcelUrl . "\" class=\"ew-export-link ew-excel\" title=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\">" . $Language->phrase("ExportToExcel") . "</a>";
		} elseif (SameText($type, "word")) {
			if ($custom)
				return "<a href=\"#\" class=\"ew-export-link ew-word\" title=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" onclick=\"return ew.export(document.fpharmacy_billing_voucherlist, '" . $this->ExportWordUrl . "', 'word', true);\">" . $Language->phrase("ExportToWord") . "</a>";
			else
				return "<a href=\"" . $this->ExportWordUrl . "\" class=\"ew-export-link ew-word\" title=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\">" . $Language->phrase("ExportToWord") . "</a>";
		} elseif (SameText($type, "pdf")) {
			if ($custom)
				return "<a href=\"#\" class=\"ew-export-link ew-pdf\" title=\"" . HtmlEncode($Language->phrase("ExportToPDFText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToPDFText")) . "\" onclick=\"return ew.export(document.fpharmacy_billing_voucherlist, '" . $this->ExportPdfUrl . "', 'pdf', true);\">" . $Language->phrase("ExportToPDF") . "</a>";
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
			return '<button id="emf_pharmacy_billing_voucher" class="ew-export-link ew-email" title="' . $Language->phrase("ExportToEmailText") . '" data-caption="' . $Language->phrase("ExportToEmailText") . '" onclick="ew.emailDialogShow({lnk:\'emf_pharmacy_billing_voucher\', hdr:ew.language.phrase(\'ExportToEmailText\'), f:document.fpharmacy_billing_voucherlist, sel:false' . $url . '});">' . $Language->phrase("ExportToEmail") . '</button>';
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
		$item->Body = "<a class=\"btn btn-default ew-search-toggle" . $searchToggleClass . "\" href=\"#\" role=\"button\" title=\"" . $Language->phrase("SearchPanel") . "\" data-caption=\"" . $Language->phrase("SearchPanel") . "\" data-toggle=\"button\" data-form=\"fpharmacy_billing_voucherlistsrch\" aria-pressed=\"" . ($searchToggleClass == " active" ? "true" : "false") . "\">" . $Language->phrase("SearchLink") . "</a>";
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
				case "x_Reception":
					break;
				case "x_ModeofPayment":
					break;
				case "x_RIDNO":
					break;
				case "x_CId":
					break;
				case "x_PatId":
					break;
				case "x_RefferedBy":
					break;
				case "x_DrID":
					break;
				case "x_ReportHeader":
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
						case "x_Reception":
							$row[1] = FormatNumber($row[1], 0, -2, -2, -2);
							$row['df'] = $row[1];
							break;
						case "x_ModeofPayment":
							break;
						case "x_RIDNO":
							break;
						case "x_CId":
							break;
						case "x_PatId":
							break;
						case "x_RefferedBy":
							break;
						case "x_DrID":
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
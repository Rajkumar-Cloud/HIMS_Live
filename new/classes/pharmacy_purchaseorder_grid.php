<?php
namespace PHPMaker2020\HIMS;

/**
 * Page class
 */
class pharmacy_purchaseorder_grid extends pharmacy_purchaseorder
{

	// Page ID
	public $PageID = "grid";

	// Project ID
	public $ProjectID = "{EA4F6D13-AF8F-428D-9EA7-BA88D1107EC3}";

	// Table name
	public $TableName = 'pharmacy_purchaseorder';

	// Page object name
	public $PageObjName = "pharmacy_purchaseorder_grid";

	// Grid form hidden field names
	public $FormName = "fpharmacy_purchaseordergrid";
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
		$this->FormActionName .= "_" . $this->FormName;
		$this->FormKeyName .= "_" . $this->FormName;
		$this->FormOldKeyName .= "_" . $this->FormName;
		$this->FormBlankRowName .= "_" . $this->FormName;
		$this->FormKeyCountName .= "_" . $this->FormName;
		$GLOBALS["Grid"] = &$this;
		$this->TokenTimeout = SessionTimeoutTime();

		// Language object
		if (!isset($Language))
			$Language = new Language();

		// Parent constuctor
		parent::__construct();

		// Table object (pharmacy_purchaseorder)
		if (!isset($GLOBALS["pharmacy_purchaseorder"]) || get_class($GLOBALS["pharmacy_purchaseorder"]) == PROJECT_NAMESPACE . "pharmacy_purchaseorder") {
			$GLOBALS["pharmacy_purchaseorder"] = &$this;

			// $GLOBALS["MasterTable"] = &$GLOBALS["Table"];
			// if (!isset($GLOBALS["Table"]))
			// 	$GLOBALS["Table"] = &$GLOBALS["pharmacy_purchaseorder"];

		}
		$this->AddUrl = "pharmacy_purchaseorderadd.php";

		// Table object (user_login)
		if (!isset($GLOBALS['user_login']))
			$GLOBALS['user_login'] = new user_login();

		// Page ID (for backward compatibility only)
		if (!defined(PROJECT_NAMESPACE . "PAGE_ID"))
			define(PROJECT_NAMESPACE . "PAGE_ID", 'grid');

		// Table name (for backward compatibility only)
		if (!defined(PROJECT_NAMESPACE . "TABLE_NAME"))
			define(PROJECT_NAMESPACE . "TABLE_NAME", 'pharmacy_purchaseorder');

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

		// Other options
		if (!$this->OtherOptions)
			$this->OtherOptions = new ListOptionsArray();
		$this->OtherOptions["addedit"] = new ListOptions("div");
		$this->OtherOptions["addedit"]->TagClassName = "ew-add-edit-option";
	}

	// Terminate page
	public function terminate($url = "")
	{
		global $ExportFileName, $TempImages, $DashboardReport;

		// Export
		global $pharmacy_purchaseorder;
		if ($this->CustomExport && $this->CustomExport == $this->Export && array_key_exists($this->CustomExport, Config("EXPORT_CLASSES"))) {
				$content = ob_get_contents();
			if ($ExportFileName == "")
				$ExportFileName = $this->TableVar;
			$class = PROJECT_NAMESPACE . Config("EXPORT_CLASSES." . $this->CustomExport);
			if (class_exists($class)) {
				$doc = new $class($pharmacy_purchaseorder);
				$doc->Text = @$content;
				if ($this->isExport("email"))
					echo $this->exportEmail($doc->Text);
				else
					$doc->export();
				DeleteTempImages(); // Delete temp images
				exit();
			}
		}

//		$GLOBALS["Table"] = &$GLOBALS["MasterTable"];
		unset($GLOBALS["Grid"]);
		if ($url === "")
			return;
		if (!IsApi())
			$this->Page_Redirecting($url);

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
			$this->HospID->Visible = FALSE;
		if ($this->isAddOrEdit())
			$this->CreatedBy->Visible = FALSE;
		if ($this->isAddOrEdit())
			$this->CreatedDateTime->Visible = FALSE;
		if ($this->isAddOrEdit())
			$this->ModifiedBy->Visible = FALSE;
		if ($this->isAddOrEdit())
			$this->ModifiedDateTime->Visible = FALSE;
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
	public $ShowOtherOptions = FALSE;
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

		// Get grid add count
		$gridaddcnt = Get(Config("TABLE_GRID_ADD_ROW_COUNT"), "");
		if (is_numeric($gridaddcnt) && $gridaddcnt > 0)
			$this->GridAddRowCount = $gridaddcnt;

		// Set up list options
		$this->setupListOptions();
		$this->ORDNO->Visible = FALSE;
		$this->PRC->setVisibility();
		$this->QTY->setVisibility();
		$this->DT->Visible = FALSE;
		$this->PC->Visible = FALSE;
		$this->YM->Visible = FALSE;
		$this->MFRCODE->Visible = FALSE;
		$this->Stock->setVisibility();
		$this->LastMonthSale->setVisibility();
		$this->Printcheck->Visible = FALSE;
		$this->id->Visible = FALSE;
		$this->poid->Visible = FALSE;
		$this->grnid->Visible = FALSE;
		$this->BatchNo->Visible = FALSE;
		$this->ExpDate->Visible = FALSE;
		$this->PrName->Visible = FALSE;
		$this->Quantity->Visible = FALSE;
		$this->FreeQty->Visible = FALSE;
		$this->ItemValue->Visible = FALSE;
		$this->Disc->Visible = FALSE;
		$this->PTax->Visible = FALSE;
		$this->MRP->Visible = FALSE;
		$this->SalTax->Visible = FALSE;
		$this->PurValue->Visible = FALSE;
		$this->PurRate->Visible = FALSE;
		$this->SalRate->Visible = FALSE;
		$this->Discount->Visible = FALSE;
		$this->PSGST->Visible = FALSE;
		$this->PCGST->Visible = FALSE;
		$this->SSGST->Visible = FALSE;
		$this->SCGST->Visible = FALSE;
		$this->BRCODE->Visible = FALSE;
		$this->HSN->Visible = FALSE;
		$this->Pack->Visible = FALSE;
		$this->PUnit->Visible = FALSE;
		$this->SUnit->Visible = FALSE;
		$this->GrnQuantity->Visible = FALSE;
		$this->GrnMRP->Visible = FALSE;
		$this->trid->Visible = FALSE;
		$this->HospID->setVisibility();
		$this->CreatedBy->setVisibility();
		$this->CreatedDateTime->setVisibility();
		$this->ModifiedBy->setVisibility();
		$this->ModifiedDateTime->setVisibility();
		$this->grncreatedby->Visible = FALSE;
		$this->grncreatedDateTime->Visible = FALSE;
		$this->grnModifiedby->Visible = FALSE;
		$this->grnModifiedDateTime->Visible = FALSE;
		$this->Received->Visible = FALSE;
		$this->BillDate->setVisibility();
		$this->CurStock->setVisibility();
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

		// Set up lookup cache
		$this->setupLookupOptions($this->PRC);
		$this->setupLookupOptions($this->PC);

		// Search filters
		$srchAdvanced = ""; // Advanced search filter
		$srchBasic = ""; // Basic search filter
		$filter = "";

		// Get command
		$this->Command = strtolower(Get("cmd"));
		if ($this->isPageRequest()) { // Validate request

			// Set up records per page
			$this->setupDisplayRecords();

			// Handle reset command
			$this->resetCmd();

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

			// Show grid delete link for grid add / grid edit
			if ($this->AllowAddDeleteRow) {
				if ($this->isGridAdd() || $this->isGridEdit()) {
					$item = $this->ListOptions["griddelete"];
					if ($item)
						$item->Visible = TRUE;
				}
			}

			// Set up sorting order
			$this->setupSortOrder();
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
		if ($this->CurrentMode != "add" && $this->getMasterFilter() != "" && $this->getCurrentMasterTable() == "pharmacy_po") {
			global $pharmacy_po;
			$rsmaster = $pharmacy_po->loadRs($this->DbMasterFilter);
			$this->MasterRecordExists = ($rsmaster && !$rsmaster->EOF);
			if (!$this->MasterRecordExists) {
				$this->setFailureMessage($Language->phrase("NoRecord")); // Set no record found
				$this->terminate("pharmacy_polist.php"); // Return to master page
			} else {
				$pharmacy_po->loadListRowValues($rsmaster);
				$pharmacy_po->RowType = ROWTYPE_MASTER; // Master row
				$pharmacy_po->renderListRow();
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
		if ($this->isGridAdd()) {
			if ($this->CurrentMode == "copy") {
				$selectLimit = $this->UseSelectLimit;
				if ($selectLimit) {
					$this->TotalRecords = $this->listRecordCount();
					$this->Recordset = $this->loadRecordset($this->StartRecord - 1, $this->DisplayRecords);
				} else {
					if ($this->Recordset = $this->loadRecordset())
						$this->TotalRecords = $this->Recordset->RecordCount();
				}
				$this->StartRecord = 1;
				$this->DisplayRecords = $this->TotalRecords;
			} else {
				$this->CurrentFilter = "0=1";
				$this->StartRecord = 1;
				$this->DisplayRecords = $this->GridAddRowCount;
			}
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
			$this->DisplayRecords = $this->TotalRecords; // Display all records
			if ($selectLimit)
				$this->Recordset = $this->loadRecordset($this->StartRecord - 1, $this->DisplayRecords);
		}

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

			// Get new recordset
			if ($rs = $conn->execute($sql)) {
				$rsnew = $rs->getRows();
				$rs->close();
			}

			// Call Grid_Updated event
			$this->Grid_Updated($rsold, $rsnew);
			$this->clearInlineMode(); // Clear inline edit mode
		} else {
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
			if ($rowaction == "insert") {
				$this->RowOldKey = strval($CurrentForm->getValue($this->FormOldKeyName));
				$this->loadOldRecord(); // Load old record
			}
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
			$this->clearInlineMode(); // Clear grid add mode and return
			return TRUE;
		}
		if ($gridInsert) {

			// Get new recordset
			$this->CurrentFilter = $wrkfilter;
			$sql = $this->getCurrentSql();
			if ($rs = $conn->execute($sql)) {
				$rsnew = $rs->getRows();
				$rs->close();
			}

			// Call Grid_Inserted event
			$this->Grid_Inserted($rsnew);
			$this->clearInlineMode(); // Clear grid add mode
		} else {
			if ($this->getFailureMessage() == "")
				$this->setFailureMessage($Language->phrase("InsertFailed")); // Set insert failed message
		}
		return $gridInsert;
	}

	// Check if empty row
	public function emptyRow()
	{
		global $CurrentForm;
		if ($CurrentForm->hasValue("x_PRC") && $CurrentForm->hasValue("o_PRC") && $this->PRC->CurrentValue != $this->PRC->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_QTY") && $CurrentForm->hasValue("o_QTY") && $this->QTY->CurrentValue != $this->QTY->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_Stock") && $CurrentForm->hasValue("o_Stock") && $this->Stock->CurrentValue != $this->Stock->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_LastMonthSale") && $CurrentForm->hasValue("o_LastMonthSale") && $this->LastMonthSale->CurrentValue != $this->LastMonthSale->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_BillDate") && $CurrentForm->hasValue("o_BillDate") && $this->BillDate->CurrentValue != $this->BillDate->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_CurStock") && $CurrentForm->hasValue("o_CurStock") && $this->CurStock->CurrentValue != $this->CurStock->OldValue)
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

	// Set up sort parameters
	protected function setupSortOrder()
	{

		// Check for "order" parameter
		if (Get("order") !== NULL) {
			$this->CurrentOrder = Get("order");
			$this->CurrentOrderType = Get("ordertype", "");
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

			// Reset master/detail keys
			if ($this->Command == "resetall") {
				$this->setCurrentMasterTable(""); // Clear master table
				$this->DbMasterFilter = "";
				$this->DbDetailFilter = "";
				$this->poid->setSessionValue("");
			}

			// Reset sorting order
			if ($this->Command == "resetsort") {
				$orderBy = "";
				$this->setSessionOrderBy($orderBy);
				$this->setSessionOrderByList($orderBy);
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

		// Drop down button for ListOptions
		$this->ListOptions->UseDropDownButton = FALSE;
		$this->ListOptions->DropDownButtonPhrase = $Language->phrase("ButtonListOptions");
		$this->ListOptions->UseButtonGroup = FALSE;
		if ($this->ListOptions->UseButtonGroup && IsMobile())
			$this->ListOptions->UseDropDownButton = TRUE;

		//$this->ListOptions->ButtonClass = ""; // Class for button group
		// Call ListOptions_Load event

		$this->ListOptions_Load();
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
			if ($CurrentForm->hasValue($this->FormOldKeyName))
				$this->RowOldKey = strval($CurrentForm->getValue($this->FormOldKeyName));
			if ($this->RowOldKey != "")
				$this->MultiSelectKey .= "<input type=\"hidden\" name=\"" . $oldKeyName . "\" id=\"" . $oldKeyName . "\" value=\"" . HtmlEncode($this->RowOldKey) . "\">";
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
			if ($this->CurrentMode == "add" || $this->CurrentMode == "copy" || $this->CurrentMode == "edit") {
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
		if ($this->CurrentMode == "view") { // View mode

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
		} // End View mode
		if ($this->CurrentMode == "edit" && is_numeric($this->RowIndex) && $this->RowAction != "delete") {
			$this->MultiSelectKey .= "<input type=\"hidden\" name=\"" . $keyName . "\" id=\"" . $keyName . "\" value=\"" . $this->id->CurrentValue . "\">";
		}
		$this->renderListOptionsExt();

		// Call ListOptions_Rendered event
		$this->ListOptions_Rendered();
	}

	// Set record key
	public function setRecordKey(&$key, $rs)
	{
		$key = "";
		if ($key != "")
			$key .= Config("COMPOSITE_KEY_SEPARATOR");
		$key .= $rs->fields('id');
	}

	// Set up other options
	protected function setupOtherOptions()
	{
		global $Language, $Security;
		$option = $this->OtherOptions["addedit"];
		$option->UseDropDownButton = FALSE;
		$option->DropDownButtonPhrase = $Language->phrase("ButtonAddEdit");
		$option->UseButtonGroup = TRUE;

		//$option->ButtonClass = ""; // Class for button group
		$item = &$option->add($option->GroupOptionName);
		$item->Body = "";
		$item->Visible = FALSE;

		// Add
		if ($this->CurrentMode == "view") { // Check view mode
			$item = &$option->add("add");
			$addcaption = HtmlTitle($Language->phrase("AddLink"));
			$this->AddUrl = $this->getAddUrl();
			$item->Body = "<a class=\"ew-add-edit ew-add\" title=\"" . $addcaption . "\" data-caption=\"" . $addcaption . "\" href=\"" . HtmlEncode($this->AddUrl) . "\">" . $Language->phrase("AddLink") . "</a>";
			$item->Visible = $this->AddUrl != "" && $Security->canAdd();
		}
	}

	// Render other options
	public function renderOtherOptions()
	{
		global $Language, $Security;
		$options = &$this->OtherOptions;
		if (($this->CurrentMode == "add" || $this->CurrentMode == "copy" || $this->CurrentMode == "edit") && !$this->isConfirm()) { // Check add/copy/edit mode
			if ($this->AllowAddDeleteRow) {
				$option = $options["addedit"];
				$option->UseDropDownButton = FALSE;
				$item = &$option->add("addblankrow");
				$item->Body = "<a class=\"ew-add-edit ew-add-blank-row\" title=\"" . HtmlTitle($Language->phrase("AddBlankRow")) . "\" data-caption=\"" . HtmlTitle($Language->phrase("AddBlankRow")) . "\" href=\"#\" onclick=\"return ew.addGridRow(this);\">" . $Language->phrase("AddBlankRow") . "</a>";
				$item->Visible = $Security->canAdd();
				$this->ShowOtherOptions = $item->Visible;
			}
		}
		if ($this->CurrentMode == "view") { // Check view mode
			$option = $options["addedit"];
			$item = $option["add"];
			$this->ShowOtherOptions = $item && $item->Visible;
		}
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

	// Get upload files
	protected function getUploadFiles()
	{
		global $CurrentForm, $Language;
	}

	// Load default values
	protected function loadDefaultValues()
	{
		$this->ORDNO->CurrentValue = NULL;
		$this->ORDNO->OldValue = $this->ORDNO->CurrentValue;
		$this->PRC->CurrentValue = NULL;
		$this->PRC->OldValue = $this->PRC->CurrentValue;
		$this->QTY->CurrentValue = NULL;
		$this->QTY->OldValue = $this->QTY->CurrentValue;
		$this->DT->CurrentValue = NULL;
		$this->DT->OldValue = $this->DT->CurrentValue;
		$this->PC->CurrentValue = NULL;
		$this->PC->OldValue = $this->PC->CurrentValue;
		$this->YM->CurrentValue = NULL;
		$this->YM->OldValue = $this->YM->CurrentValue;
		$this->MFRCODE->CurrentValue = NULL;
		$this->MFRCODE->OldValue = $this->MFRCODE->CurrentValue;
		$this->Stock->CurrentValue = NULL;
		$this->Stock->OldValue = $this->Stock->CurrentValue;
		$this->LastMonthSale->CurrentValue = NULL;
		$this->LastMonthSale->OldValue = $this->LastMonthSale->CurrentValue;
		$this->Printcheck->CurrentValue = NULL;
		$this->Printcheck->OldValue = $this->Printcheck->CurrentValue;
		$this->id->CurrentValue = NULL;
		$this->id->OldValue = $this->id->CurrentValue;
		$this->poid->CurrentValue = NULL;
		$this->poid->OldValue = $this->poid->CurrentValue;
		$this->grnid->CurrentValue = NULL;
		$this->grnid->OldValue = $this->grnid->CurrentValue;
		$this->BatchNo->CurrentValue = NULL;
		$this->BatchNo->OldValue = $this->BatchNo->CurrentValue;
		$this->ExpDate->CurrentValue = NULL;
		$this->ExpDate->OldValue = $this->ExpDate->CurrentValue;
		$this->PrName->CurrentValue = NULL;
		$this->PrName->OldValue = $this->PrName->CurrentValue;
		$this->Quantity->CurrentValue = NULL;
		$this->Quantity->OldValue = $this->Quantity->CurrentValue;
		$this->FreeQty->CurrentValue = NULL;
		$this->FreeQty->OldValue = $this->FreeQty->CurrentValue;
		$this->ItemValue->CurrentValue = NULL;
		$this->ItemValue->OldValue = $this->ItemValue->CurrentValue;
		$this->Disc->CurrentValue = NULL;
		$this->Disc->OldValue = $this->Disc->CurrentValue;
		$this->PTax->CurrentValue = NULL;
		$this->PTax->OldValue = $this->PTax->CurrentValue;
		$this->MRP->CurrentValue = NULL;
		$this->MRP->OldValue = $this->MRP->CurrentValue;
		$this->SalTax->CurrentValue = NULL;
		$this->SalTax->OldValue = $this->SalTax->CurrentValue;
		$this->PurValue->CurrentValue = NULL;
		$this->PurValue->OldValue = $this->PurValue->CurrentValue;
		$this->PurRate->CurrentValue = NULL;
		$this->PurRate->OldValue = $this->PurRate->CurrentValue;
		$this->SalRate->CurrentValue = NULL;
		$this->SalRate->OldValue = $this->SalRate->CurrentValue;
		$this->Discount->CurrentValue = NULL;
		$this->Discount->OldValue = $this->Discount->CurrentValue;
		$this->PSGST->CurrentValue = NULL;
		$this->PSGST->OldValue = $this->PSGST->CurrentValue;
		$this->PCGST->CurrentValue = NULL;
		$this->PCGST->OldValue = $this->PCGST->CurrentValue;
		$this->SSGST->CurrentValue = NULL;
		$this->SSGST->OldValue = $this->SSGST->CurrentValue;
		$this->SCGST->CurrentValue = NULL;
		$this->SCGST->OldValue = $this->SCGST->CurrentValue;
		$this->BRCODE->CurrentValue = NULL;
		$this->BRCODE->OldValue = $this->BRCODE->CurrentValue;
		$this->HSN->CurrentValue = NULL;
		$this->HSN->OldValue = $this->HSN->CurrentValue;
		$this->Pack->CurrentValue = NULL;
		$this->Pack->OldValue = $this->Pack->CurrentValue;
		$this->PUnit->CurrentValue = NULL;
		$this->PUnit->OldValue = $this->PUnit->CurrentValue;
		$this->SUnit->CurrentValue = NULL;
		$this->SUnit->OldValue = $this->SUnit->CurrentValue;
		$this->GrnQuantity->CurrentValue = NULL;
		$this->GrnQuantity->OldValue = $this->GrnQuantity->CurrentValue;
		$this->GrnMRP->CurrentValue = NULL;
		$this->GrnMRP->OldValue = $this->GrnMRP->CurrentValue;
		$this->trid->CurrentValue = NULL;
		$this->trid->OldValue = $this->trid->CurrentValue;
		$this->HospID->CurrentValue = NULL;
		$this->HospID->OldValue = $this->HospID->CurrentValue;
		$this->CreatedBy->CurrentValue = NULL;
		$this->CreatedBy->OldValue = $this->CreatedBy->CurrentValue;
		$this->CreatedDateTime->CurrentValue = NULL;
		$this->CreatedDateTime->OldValue = $this->CreatedDateTime->CurrentValue;
		$this->ModifiedBy->CurrentValue = NULL;
		$this->ModifiedBy->OldValue = $this->ModifiedBy->CurrentValue;
		$this->ModifiedDateTime->CurrentValue = NULL;
		$this->ModifiedDateTime->OldValue = $this->ModifiedDateTime->CurrentValue;
		$this->grncreatedby->CurrentValue = NULL;
		$this->grncreatedby->OldValue = $this->grncreatedby->CurrentValue;
		$this->grncreatedDateTime->CurrentValue = NULL;
		$this->grncreatedDateTime->OldValue = $this->grncreatedDateTime->CurrentValue;
		$this->grnModifiedby->CurrentValue = NULL;
		$this->grnModifiedby->OldValue = $this->grnModifiedby->CurrentValue;
		$this->grnModifiedDateTime->CurrentValue = NULL;
		$this->grnModifiedDateTime->OldValue = $this->grnModifiedDateTime->CurrentValue;
		$this->Received->CurrentValue = NULL;
		$this->Received->OldValue = $this->Received->CurrentValue;
		$this->BillDate->CurrentValue = NULL;
		$this->BillDate->OldValue = $this->BillDate->CurrentValue;
		$this->CurStock->CurrentValue = NULL;
		$this->CurStock->OldValue = $this->CurStock->CurrentValue;
	}

	// Load form values
	protected function loadFormValues()
	{

		// Load from form
		global $CurrentForm;
		$CurrentForm->FormName = $this->FormName;

		// Check field name 'PRC' first before field var 'x_PRC'
		$val = $CurrentForm->hasValue("PRC") ? $CurrentForm->getValue("PRC") : $CurrentForm->getValue("x_PRC");
		if (!$this->PRC->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->PRC->Visible = FALSE; // Disable update for API request
			else
				$this->PRC->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_PRC"))
			$this->PRC->setOldValue($CurrentForm->getValue("o_PRC"));

		// Check field name 'QTY' first before field var 'x_QTY'
		$val = $CurrentForm->hasValue("QTY") ? $CurrentForm->getValue("QTY") : $CurrentForm->getValue("x_QTY");
		if (!$this->QTY->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->QTY->Visible = FALSE; // Disable update for API request
			else
				$this->QTY->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_QTY"))
			$this->QTY->setOldValue($CurrentForm->getValue("o_QTY"));

		// Check field name 'Stock' first before field var 'x_Stock'
		$val = $CurrentForm->hasValue("Stock") ? $CurrentForm->getValue("Stock") : $CurrentForm->getValue("x_Stock");
		if (!$this->Stock->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->Stock->Visible = FALSE; // Disable update for API request
			else
				$this->Stock->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_Stock"))
			$this->Stock->setOldValue($CurrentForm->getValue("o_Stock"));

		// Check field name 'LastMonthSale' first before field var 'x_LastMonthSale'
		$val = $CurrentForm->hasValue("LastMonthSale") ? $CurrentForm->getValue("LastMonthSale") : $CurrentForm->getValue("x_LastMonthSale");
		if (!$this->LastMonthSale->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->LastMonthSale->Visible = FALSE; // Disable update for API request
			else
				$this->LastMonthSale->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_LastMonthSale"))
			$this->LastMonthSale->setOldValue($CurrentForm->getValue("o_LastMonthSale"));

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

		// Check field name 'CreatedBy' first before field var 'x_CreatedBy'
		$val = $CurrentForm->hasValue("CreatedBy") ? $CurrentForm->getValue("CreatedBy") : $CurrentForm->getValue("x_CreatedBy");
		if (!$this->CreatedBy->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->CreatedBy->Visible = FALSE; // Disable update for API request
			else
				$this->CreatedBy->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_CreatedBy"))
			$this->CreatedBy->setOldValue($CurrentForm->getValue("o_CreatedBy"));

		// Check field name 'CreatedDateTime' first before field var 'x_CreatedDateTime'
		$val = $CurrentForm->hasValue("CreatedDateTime") ? $CurrentForm->getValue("CreatedDateTime") : $CurrentForm->getValue("x_CreatedDateTime");
		if (!$this->CreatedDateTime->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->CreatedDateTime->Visible = FALSE; // Disable update for API request
			else
				$this->CreatedDateTime->setFormValue($val);
			$this->CreatedDateTime->CurrentValue = UnFormatDateTime($this->CreatedDateTime->CurrentValue, 0);
		}
		if ($CurrentForm->hasValue("o_CreatedDateTime"))
			$this->CreatedDateTime->setOldValue($CurrentForm->getValue("o_CreatedDateTime"));

		// Check field name 'ModifiedBy' first before field var 'x_ModifiedBy'
		$val = $CurrentForm->hasValue("ModifiedBy") ? $CurrentForm->getValue("ModifiedBy") : $CurrentForm->getValue("x_ModifiedBy");
		if (!$this->ModifiedBy->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->ModifiedBy->Visible = FALSE; // Disable update for API request
			else
				$this->ModifiedBy->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_ModifiedBy"))
			$this->ModifiedBy->setOldValue($CurrentForm->getValue("o_ModifiedBy"));

		// Check field name 'ModifiedDateTime' first before field var 'x_ModifiedDateTime'
		$val = $CurrentForm->hasValue("ModifiedDateTime") ? $CurrentForm->getValue("ModifiedDateTime") : $CurrentForm->getValue("x_ModifiedDateTime");
		if (!$this->ModifiedDateTime->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->ModifiedDateTime->Visible = FALSE; // Disable update for API request
			else
				$this->ModifiedDateTime->setFormValue($val);
			$this->ModifiedDateTime->CurrentValue = UnFormatDateTime($this->ModifiedDateTime->CurrentValue, 0);
		}
		if ($CurrentForm->hasValue("o_ModifiedDateTime"))
			$this->ModifiedDateTime->setOldValue($CurrentForm->getValue("o_ModifiedDateTime"));

		// Check field name 'BillDate' first before field var 'x_BillDate'
		$val = $CurrentForm->hasValue("BillDate") ? $CurrentForm->getValue("BillDate") : $CurrentForm->getValue("x_BillDate");
		if (!$this->BillDate->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->BillDate->Visible = FALSE; // Disable update for API request
			else
				$this->BillDate->setFormValue($val);
			$this->BillDate->CurrentValue = UnFormatDateTime($this->BillDate->CurrentValue, 0);
		}
		if ($CurrentForm->hasValue("o_BillDate"))
			$this->BillDate->setOldValue($CurrentForm->getValue("o_BillDate"));

		// Check field name 'CurStock' first before field var 'x_CurStock'
		$val = $CurrentForm->hasValue("CurStock") ? $CurrentForm->getValue("CurStock") : $CurrentForm->getValue("x_CurStock");
		if (!$this->CurStock->IsDetailKey) {
			if (IsApi() && $val === NULL)
				$this->CurStock->Visible = FALSE; // Disable update for API request
			else
				$this->CurStock->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_CurStock"))
			$this->CurStock->setOldValue($CurrentForm->getValue("o_CurStock"));

		// Check field name 'id' first before field var 'x_id'
		$val = $CurrentForm->hasValue("id") ? $CurrentForm->getValue("id") : $CurrentForm->getValue("x_id");
		if (!$this->id->IsDetailKey && !$this->isGridAdd() && !$this->isAdd())
			$this->id->setFormValue($val);
	}

	// Restore form values
	public function restoreFormValues()
	{
		global $CurrentForm;
		if (!$this->isGridAdd() && !$this->isAdd())
			$this->id->CurrentValue = $this->id->FormValue;
		$this->PRC->CurrentValue = $this->PRC->FormValue;
		$this->QTY->CurrentValue = $this->QTY->FormValue;
		$this->Stock->CurrentValue = $this->Stock->FormValue;
		$this->LastMonthSale->CurrentValue = $this->LastMonthSale->FormValue;
		$this->HospID->CurrentValue = $this->HospID->FormValue;
		$this->CreatedBy->CurrentValue = $this->CreatedBy->FormValue;
		$this->CreatedDateTime->CurrentValue = $this->CreatedDateTime->FormValue;
		$this->CreatedDateTime->CurrentValue = UnFormatDateTime($this->CreatedDateTime->CurrentValue, 0);
		$this->ModifiedBy->CurrentValue = $this->ModifiedBy->FormValue;
		$this->ModifiedDateTime->CurrentValue = $this->ModifiedDateTime->FormValue;
		$this->ModifiedDateTime->CurrentValue = UnFormatDateTime($this->ModifiedDateTime->CurrentValue, 0);
		$this->BillDate->CurrentValue = $this->BillDate->FormValue;
		$this->BillDate->CurrentValue = UnFormatDateTime($this->BillDate->CurrentValue, 0);
		$this->CurStock->CurrentValue = $this->CurStock->FormValue;
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
		$this->ORDNO->setDbValue($row['ORDNO']);
		$this->PRC->setDbValue($row['PRC']);
		if (array_key_exists('EV__PRC', $rs->fields)) {
			$this->PRC->VirtualValue = $rs->fields('EV__PRC'); // Set up virtual field value
		} else {
			$this->PRC->VirtualValue = ""; // Clear value
		}
		$this->QTY->setDbValue($row['QTY']);
		$this->DT->setDbValue($row['DT']);
		$this->PC->setDbValue($row['PC']);
		$this->YM->setDbValue($row['YM']);
		$this->MFRCODE->setDbValue($row['MFRCODE']);
		$this->Stock->setDbValue($row['Stock']);
		$this->LastMonthSale->setDbValue($row['LastMonthSale']);
		$this->Printcheck->setDbValue($row['Printcheck']);
		$this->id->setDbValue($row['id']);
		$this->poid->setDbValue($row['poid']);
		$this->grnid->setDbValue($row['grnid']);
		$this->BatchNo->setDbValue($row['BatchNo']);
		$this->ExpDate->setDbValue($row['ExpDate']);
		$this->PrName->setDbValue($row['PrName']);
		$this->Quantity->setDbValue($row['Quantity']);
		$this->FreeQty->setDbValue($row['FreeQty']);
		$this->ItemValue->setDbValue($row['ItemValue']);
		$this->Disc->setDbValue($row['Disc']);
		$this->PTax->setDbValue($row['PTax']);
		$this->MRP->setDbValue($row['MRP']);
		$this->SalTax->setDbValue($row['SalTax']);
		$this->PurValue->setDbValue($row['PurValue']);
		$this->PurRate->setDbValue($row['PurRate']);
		$this->SalRate->setDbValue($row['SalRate']);
		$this->Discount->setDbValue($row['Discount']);
		$this->PSGST->setDbValue($row['PSGST']);
		$this->PCGST->setDbValue($row['PCGST']);
		$this->SSGST->setDbValue($row['SSGST']);
		$this->SCGST->setDbValue($row['SCGST']);
		$this->BRCODE->setDbValue($row['BRCODE']);
		$this->HSN->setDbValue($row['HSN']);
		$this->Pack->setDbValue($row['Pack']);
		$this->PUnit->setDbValue($row['PUnit']);
		$this->SUnit->setDbValue($row['SUnit']);
		$this->GrnQuantity->setDbValue($row['GrnQuantity']);
		$this->GrnMRP->setDbValue($row['GrnMRP']);
		$this->trid->setDbValue($row['trid']);
		$this->HospID->setDbValue($row['HospID']);
		$this->CreatedBy->setDbValue($row['CreatedBy']);
		$this->CreatedDateTime->setDbValue($row['CreatedDateTime']);
		$this->ModifiedBy->setDbValue($row['ModifiedBy']);
		$this->ModifiedDateTime->setDbValue($row['ModifiedDateTime']);
		$this->grncreatedby->setDbValue($row['grncreatedby']);
		$this->grncreatedDateTime->setDbValue($row['grncreatedDateTime']);
		$this->grnModifiedby->setDbValue($row['grnModifiedby']);
		$this->grnModifiedDateTime->setDbValue($row['grnModifiedDateTime']);
		$this->Received->setDbValue($row['Received']);
		$this->BillDate->setDbValue($row['BillDate']);
		$this->CurStock->setDbValue($row['CurStock']);
	}

	// Return a row with default values
	protected function newRow()
	{
		$this->loadDefaultValues();
		$row = [];
		$row['ORDNO'] = $this->ORDNO->CurrentValue;
		$row['PRC'] = $this->PRC->CurrentValue;
		$row['QTY'] = $this->QTY->CurrentValue;
		$row['DT'] = $this->DT->CurrentValue;
		$row['PC'] = $this->PC->CurrentValue;
		$row['YM'] = $this->YM->CurrentValue;
		$row['MFRCODE'] = $this->MFRCODE->CurrentValue;
		$row['Stock'] = $this->Stock->CurrentValue;
		$row['LastMonthSale'] = $this->LastMonthSale->CurrentValue;
		$row['Printcheck'] = $this->Printcheck->CurrentValue;
		$row['id'] = $this->id->CurrentValue;
		$row['poid'] = $this->poid->CurrentValue;
		$row['grnid'] = $this->grnid->CurrentValue;
		$row['BatchNo'] = $this->BatchNo->CurrentValue;
		$row['ExpDate'] = $this->ExpDate->CurrentValue;
		$row['PrName'] = $this->PrName->CurrentValue;
		$row['Quantity'] = $this->Quantity->CurrentValue;
		$row['FreeQty'] = $this->FreeQty->CurrentValue;
		$row['ItemValue'] = $this->ItemValue->CurrentValue;
		$row['Disc'] = $this->Disc->CurrentValue;
		$row['PTax'] = $this->PTax->CurrentValue;
		$row['MRP'] = $this->MRP->CurrentValue;
		$row['SalTax'] = $this->SalTax->CurrentValue;
		$row['PurValue'] = $this->PurValue->CurrentValue;
		$row['PurRate'] = $this->PurRate->CurrentValue;
		$row['SalRate'] = $this->SalRate->CurrentValue;
		$row['Discount'] = $this->Discount->CurrentValue;
		$row['PSGST'] = $this->PSGST->CurrentValue;
		$row['PCGST'] = $this->PCGST->CurrentValue;
		$row['SSGST'] = $this->SSGST->CurrentValue;
		$row['SCGST'] = $this->SCGST->CurrentValue;
		$row['BRCODE'] = $this->BRCODE->CurrentValue;
		$row['HSN'] = $this->HSN->CurrentValue;
		$row['Pack'] = $this->Pack->CurrentValue;
		$row['PUnit'] = $this->PUnit->CurrentValue;
		$row['SUnit'] = $this->SUnit->CurrentValue;
		$row['GrnQuantity'] = $this->GrnQuantity->CurrentValue;
		$row['GrnMRP'] = $this->GrnMRP->CurrentValue;
		$row['trid'] = $this->trid->CurrentValue;
		$row['HospID'] = $this->HospID->CurrentValue;
		$row['CreatedBy'] = $this->CreatedBy->CurrentValue;
		$row['CreatedDateTime'] = $this->CreatedDateTime->CurrentValue;
		$row['ModifiedBy'] = $this->ModifiedBy->CurrentValue;
		$row['ModifiedDateTime'] = $this->ModifiedDateTime->CurrentValue;
		$row['grncreatedby'] = $this->grncreatedby->CurrentValue;
		$row['grncreatedDateTime'] = $this->grncreatedDateTime->CurrentValue;
		$row['grnModifiedby'] = $this->grnModifiedby->CurrentValue;
		$row['grnModifiedDateTime'] = $this->grnModifiedDateTime->CurrentValue;
		$row['Received'] = $this->Received->CurrentValue;
		$row['BillDate'] = $this->BillDate->CurrentValue;
		$row['CurStock'] = $this->CurStock->CurrentValue;
		return $row;
	}

	// Load old record
	protected function loadOldRecord()
	{

		// Load key values from Session
		$validKey = TRUE;
		$keys = [$this->RowOldKey];
		$cnt = count($keys);
		if ($cnt >= 1) {
			if (strval($keys[0]) != "")
				$this->id->OldValue = strval($keys[0]); // id
			else
				$validKey = FALSE;
		} else {
			$validKey = FALSE;
		}

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
		$this->CopyUrl = $this->getCopyUrl();
		$this->DeleteUrl = $this->getDeleteUrl();

		// Call Row_Rendering event
		$this->Row_Rendering();

		// Common render codes for all row types
		// ORDNO
		// PRC
		// QTY
		// DT
		// PC
		// YM
		// MFRCODE
		// Stock
		// LastMonthSale
		// Printcheck
		// id
		// poid
		// grnid
		// BatchNo
		// ExpDate
		// PrName
		// Quantity
		// FreeQty
		// ItemValue
		// Disc
		// PTax
		// MRP
		// SalTax
		// PurValue
		// PurRate
		// SalRate
		// Discount
		// PSGST
		// PCGST
		// SSGST
		// SCGST
		// BRCODE
		// HSN
		// Pack
		// PUnit
		// SUnit
		// GrnQuantity
		// GrnMRP
		// trid
		// HospID
		// CreatedBy
		// CreatedDateTime
		// ModifiedBy
		// ModifiedDateTime
		// grncreatedby
		// grncreatedDateTime
		// grnModifiedby
		// grnModifiedDateTime
		// Received
		// BillDate
		// CurStock

		if ($this->RowType == ROWTYPE_VIEW) { // View row

			// ORDNO
			$this->ORDNO->ViewValue = $this->ORDNO->CurrentValue;
			$this->ORDNO->ViewCustomAttributes = "";

			// PRC
			if ($this->PRC->VirtualValue != "") {
				$this->PRC->ViewValue = $this->PRC->VirtualValue;
			} else {
				$this->PRC->ViewValue = $this->PRC->CurrentValue;
				$curVal = strval($this->PRC->CurrentValue);
				if ($curVal != "") {
					$this->PRC->ViewValue = $this->PRC->lookupCacheOption($curVal);
					if ($this->PRC->ViewValue === NULL) { // Lookup from database
						$filterWrk = "`PRC`" . SearchString("=", $curVal, DATATYPE_STRING, "");
						$sqlWrk = $this->PRC->Lookup->getSql(FALSE, $filterWrk, '', $this);
						$rswrk = Conn()->execute($sqlWrk);
						if ($rswrk && !$rswrk->EOF) { // Lookup values found
							$arwrk = [];
							$arwrk[1] = $rswrk->fields('df');
							$this->PRC->ViewValue = $this->PRC->displayValue($arwrk);
							$rswrk->Close();
						} else {
							$this->PRC->ViewValue = $this->PRC->CurrentValue;
						}
					}
				} else {
					$this->PRC->ViewValue = NULL;
				}
			}
			$this->PRC->ViewCustomAttributes = "";

			// QTY
			$this->QTY->ViewValue = $this->QTY->CurrentValue;
			$this->QTY->ViewValue = FormatNumber($this->QTY->ViewValue, 2, -2, -2, -2);
			$this->QTY->ViewCustomAttributes = "";

			// DT
			$this->DT->ViewValue = $this->DT->CurrentValue;
			$this->DT->ViewValue = FormatDateTime($this->DT->ViewValue, 0);
			$this->DT->ViewCustomAttributes = "";

			// PC
			$curVal = strval($this->PC->CurrentValue);
			if ($curVal != "") {
				$this->PC->ViewValue = $this->PC->lookupCacheOption($curVal);
				if ($this->PC->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
					$sqlWrk = $this->PC->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = FormatNumber($rswrk->fields('df'), 0, -2, -2, -2);
						$arwrk[2] = $rswrk->fields('df2');
						$this->PC->ViewValue = $this->PC->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->PC->ViewValue = $this->PC->CurrentValue;
					}
				}
			} else {
				$this->PC->ViewValue = NULL;
			}
			$this->PC->ViewCustomAttributes = "";

			// YM
			$this->YM->ViewValue = $this->YM->CurrentValue;
			$this->YM->ViewCustomAttributes = "";

			// MFRCODE
			$this->MFRCODE->ViewValue = $this->MFRCODE->CurrentValue;
			$this->MFRCODE->ViewCustomAttributes = "";

			// Stock
			$this->Stock->ViewValue = $this->Stock->CurrentValue;
			$this->Stock->ViewValue = FormatNumber($this->Stock->ViewValue, 2, -2, -2, -2);
			$this->Stock->ViewCustomAttributes = "";

			// LastMonthSale
			$this->LastMonthSale->ViewValue = $this->LastMonthSale->CurrentValue;
			$this->LastMonthSale->ViewValue = FormatNumber($this->LastMonthSale->ViewValue, 2, -2, -2, -2);
			$this->LastMonthSale->ViewCustomAttributes = "";

			// Printcheck
			$this->Printcheck->ViewValue = $this->Printcheck->CurrentValue;
			$this->Printcheck->ViewCustomAttributes = "";

			// id
			$this->id->ViewValue = $this->id->CurrentValue;
			$this->id->ViewCustomAttributes = "";

			// poid
			$this->poid->ViewValue = $this->poid->CurrentValue;
			$this->poid->ViewValue = FormatNumber($this->poid->ViewValue, 0, -2, -2, -2);
			$this->poid->ViewCustomAttributes = "";

			// grnid
			$this->grnid->ViewValue = $this->grnid->CurrentValue;
			$this->grnid->ViewValue = FormatNumber($this->grnid->ViewValue, 0, -2, -2, -2);
			$this->grnid->ViewCustomAttributes = "";

			// BatchNo
			$this->BatchNo->ViewValue = $this->BatchNo->CurrentValue;
			$this->BatchNo->ViewCustomAttributes = "";

			// ExpDate
			$this->ExpDate->ViewValue = $this->ExpDate->CurrentValue;
			$this->ExpDate->ViewValue = FormatDateTime($this->ExpDate->ViewValue, 0);
			$this->ExpDate->ViewCustomAttributes = "";

			// PrName
			$this->PrName->ViewValue = $this->PrName->CurrentValue;
			$this->PrName->ViewCustomAttributes = "";

			// Quantity
			$this->Quantity->ViewValue = $this->Quantity->CurrentValue;
			$this->Quantity->ViewValue = FormatNumber($this->Quantity->ViewValue, 0, -2, -2, -2);
			$this->Quantity->ViewCustomAttributes = "";

			// FreeQty
			$this->FreeQty->ViewValue = $this->FreeQty->CurrentValue;
			$this->FreeQty->ViewValue = FormatNumber($this->FreeQty->ViewValue, 0, -2, -2, -2);
			$this->FreeQty->ViewCustomAttributes = "";

			// ItemValue
			$this->ItemValue->ViewValue = $this->ItemValue->CurrentValue;
			$this->ItemValue->ViewValue = FormatNumber($this->ItemValue->ViewValue, 2, -2, -2, -2);
			$this->ItemValue->ViewCustomAttributes = "";

			// Disc
			$this->Disc->ViewValue = $this->Disc->CurrentValue;
			$this->Disc->ViewValue = FormatNumber($this->Disc->ViewValue, 2, -2, -2, -2);
			$this->Disc->ViewCustomAttributes = "";

			// PTax
			$this->PTax->ViewValue = $this->PTax->CurrentValue;
			$this->PTax->ViewValue = FormatNumber($this->PTax->ViewValue, 2, -2, -2, -2);
			$this->PTax->ViewCustomAttributes = "";

			// MRP
			$this->MRP->ViewValue = $this->MRP->CurrentValue;
			$this->MRP->ViewValue = FormatNumber($this->MRP->ViewValue, 2, -2, -2, -2);
			$this->MRP->ViewCustomAttributes = "";

			// SalTax
			$this->SalTax->ViewValue = $this->SalTax->CurrentValue;
			$this->SalTax->ViewValue = FormatNumber($this->SalTax->ViewValue, 2, -2, -2, -2);
			$this->SalTax->ViewCustomAttributes = "";

			// PurValue
			$this->PurValue->ViewValue = $this->PurValue->CurrentValue;
			$this->PurValue->ViewValue = FormatNumber($this->PurValue->ViewValue, 2, -2, -2, -2);
			$this->PurValue->ViewCustomAttributes = "";

			// PurRate
			$this->PurRate->ViewValue = $this->PurRate->CurrentValue;
			$this->PurRate->ViewValue = FormatNumber($this->PurRate->ViewValue, 2, -2, -2, -2);
			$this->PurRate->ViewCustomAttributes = "";

			// SalRate
			$this->SalRate->ViewValue = $this->SalRate->CurrentValue;
			$this->SalRate->ViewValue = FormatNumber($this->SalRate->ViewValue, 2, -2, -2, -2);
			$this->SalRate->ViewCustomAttributes = "";

			// Discount
			$this->Discount->ViewValue = $this->Discount->CurrentValue;
			$this->Discount->ViewValue = FormatNumber($this->Discount->ViewValue, 2, -2, -2, -2);
			$this->Discount->ViewCustomAttributes = "";

			// PSGST
			$this->PSGST->ViewValue = $this->PSGST->CurrentValue;
			$this->PSGST->ViewValue = FormatNumber($this->PSGST->ViewValue, Config("DEFAULT_DECIMAL_PRECISION"));
			$this->PSGST->ViewCustomAttributes = "";

			// PCGST
			$this->PCGST->ViewValue = $this->PCGST->CurrentValue;
			$this->PCGST->ViewValue = FormatNumber($this->PCGST->ViewValue, Config("DEFAULT_DECIMAL_PRECISION"));
			$this->PCGST->ViewCustomAttributes = "";

			// SSGST
			$this->SSGST->ViewValue = $this->SSGST->CurrentValue;
			$this->SSGST->ViewValue = FormatNumber($this->SSGST->ViewValue, Config("DEFAULT_DECIMAL_PRECISION"));
			$this->SSGST->ViewCustomAttributes = "";

			// SCGST
			$this->SCGST->ViewValue = $this->SCGST->CurrentValue;
			$this->SCGST->ViewValue = FormatNumber($this->SCGST->ViewValue, Config("DEFAULT_DECIMAL_PRECISION"));
			$this->SCGST->ViewCustomAttributes = "";

			// BRCODE
			$this->BRCODE->ViewValue = $this->BRCODE->CurrentValue;
			$this->BRCODE->ViewValue = FormatNumber($this->BRCODE->ViewValue, 0, -2, -2, -2);
			$this->BRCODE->ViewCustomAttributes = "";

			// HSN
			$this->HSN->ViewValue = $this->HSN->CurrentValue;
			$this->HSN->ViewCustomAttributes = "";

			// Pack
			$this->Pack->ViewValue = $this->Pack->CurrentValue;
			$this->Pack->ViewCustomAttributes = "";

			// PUnit
			$this->PUnit->ViewValue = $this->PUnit->CurrentValue;
			$this->PUnit->ViewValue = FormatNumber($this->PUnit->ViewValue, 0, -2, -2, -2);
			$this->PUnit->ViewCustomAttributes = "";

			// SUnit
			$this->SUnit->ViewValue = $this->SUnit->CurrentValue;
			$this->SUnit->ViewValue = FormatNumber($this->SUnit->ViewValue, 0, -2, -2, -2);
			$this->SUnit->ViewCustomAttributes = "";

			// GrnQuantity
			$this->GrnQuantity->ViewValue = $this->GrnQuantity->CurrentValue;
			$this->GrnQuantity->ViewValue = FormatNumber($this->GrnQuantity->ViewValue, 0, -2, -2, -2);
			$this->GrnQuantity->ViewCustomAttributes = "";

			// GrnMRP
			$this->GrnMRP->ViewValue = $this->GrnMRP->CurrentValue;
			$this->GrnMRP->ViewValue = FormatNumber($this->GrnMRP->ViewValue, 2, -2, -2, -2);
			$this->GrnMRP->ViewCustomAttributes = "";

			// trid
			$this->trid->ViewValue = $this->trid->CurrentValue;
			$this->trid->ViewValue = FormatNumber($this->trid->ViewValue, 0, -2, -2, -2);
			$this->trid->ViewCustomAttributes = "";

			// HospID
			$this->HospID->ViewValue = $this->HospID->CurrentValue;
			$this->HospID->ViewValue = FormatNumber($this->HospID->ViewValue, 0, -2, -2, -2);
			$this->HospID->ViewCustomAttributes = "";

			// CreatedBy
			$this->CreatedBy->ViewValue = $this->CreatedBy->CurrentValue;
			$this->CreatedBy->ViewValue = FormatNumber($this->CreatedBy->ViewValue, 0, -2, -2, -2);
			$this->CreatedBy->ViewCustomAttributes = "";

			// CreatedDateTime
			$this->CreatedDateTime->ViewValue = $this->CreatedDateTime->CurrentValue;
			$this->CreatedDateTime->ViewValue = FormatDateTime($this->CreatedDateTime->ViewValue, 0);
			$this->CreatedDateTime->ViewCustomAttributes = "";

			// ModifiedBy
			$this->ModifiedBy->ViewValue = $this->ModifiedBy->CurrentValue;
			$this->ModifiedBy->ViewValue = FormatNumber($this->ModifiedBy->ViewValue, 0, -2, -2, -2);
			$this->ModifiedBy->ViewCustomAttributes = "";

			// ModifiedDateTime
			$this->ModifiedDateTime->ViewValue = $this->ModifiedDateTime->CurrentValue;
			$this->ModifiedDateTime->ViewValue = FormatDateTime($this->ModifiedDateTime->ViewValue, 0);
			$this->ModifiedDateTime->ViewCustomAttributes = "";

			// grncreatedby
			$this->grncreatedby->ViewValue = $this->grncreatedby->CurrentValue;
			$this->grncreatedby->ViewValue = FormatNumber($this->grncreatedby->ViewValue, 0, -2, -2, -2);
			$this->grncreatedby->ViewCustomAttributes = "";

			// grncreatedDateTime
			$this->grncreatedDateTime->ViewValue = $this->grncreatedDateTime->CurrentValue;
			$this->grncreatedDateTime->ViewValue = FormatDateTime($this->grncreatedDateTime->ViewValue, 0);
			$this->grncreatedDateTime->ViewCustomAttributes = "";

			// grnModifiedby
			$this->grnModifiedby->ViewValue = $this->grnModifiedby->CurrentValue;
			$this->grnModifiedby->ViewValue = FormatNumber($this->grnModifiedby->ViewValue, 0, -2, -2, -2);
			$this->grnModifiedby->ViewCustomAttributes = "";

			// grnModifiedDateTime
			$this->grnModifiedDateTime->ViewValue = $this->grnModifiedDateTime->CurrentValue;
			$this->grnModifiedDateTime->ViewValue = FormatDateTime($this->grnModifiedDateTime->ViewValue, 0);
			$this->grnModifiedDateTime->ViewCustomAttributes = "";

			// Received
			if (strval($this->Received->CurrentValue) != "") {
				$this->Received->ViewValue = new OptionValues();
				$arwrk = explode(",", strval($this->Received->CurrentValue));
				$cnt = count($arwrk);
				for ($ari = 0; $ari < $cnt; $ari++)
					$this->Received->ViewValue->add($this->Received->optionCaption(trim($arwrk[$ari])));
			} else {
				$this->Received->ViewValue = NULL;
			}
			$this->Received->ViewCustomAttributes = "";

			// BillDate
			$this->BillDate->ViewValue = $this->BillDate->CurrentValue;
			$this->BillDate->ViewValue = FormatDateTime($this->BillDate->ViewValue, 0);
			$this->BillDate->ViewCustomAttributes = "";

			// CurStock
			$this->CurStock->ViewValue = $this->CurStock->CurrentValue;
			$this->CurStock->ViewValue = FormatNumber($this->CurStock->ViewValue, 0, -2, -2, -2);
			$this->CurStock->ViewCustomAttributes = "";

			// PRC
			$this->PRC->LinkCustomAttributes = "";
			$this->PRC->HrefValue = "";
			$this->PRC->TooltipValue = "";

			// QTY
			$this->QTY->LinkCustomAttributes = "";
			$this->QTY->HrefValue = "";
			$this->QTY->TooltipValue = "";

			// Stock
			$this->Stock->LinkCustomAttributes = "";
			$this->Stock->HrefValue = "";
			$this->Stock->TooltipValue = "";

			// LastMonthSale
			$this->LastMonthSale->LinkCustomAttributes = "";
			$this->LastMonthSale->HrefValue = "";
			$this->LastMonthSale->TooltipValue = "";

			// HospID
			$this->HospID->LinkCustomAttributes = "";
			$this->HospID->HrefValue = "";
			$this->HospID->TooltipValue = "";

			// CreatedBy
			$this->CreatedBy->LinkCustomAttributes = "";
			$this->CreatedBy->HrefValue = "";
			$this->CreatedBy->TooltipValue = "";

			// CreatedDateTime
			$this->CreatedDateTime->LinkCustomAttributes = "";
			$this->CreatedDateTime->HrefValue = "";
			$this->CreatedDateTime->TooltipValue = "";

			// ModifiedBy
			$this->ModifiedBy->LinkCustomAttributes = "";
			$this->ModifiedBy->HrefValue = "";
			$this->ModifiedBy->TooltipValue = "";

			// ModifiedDateTime
			$this->ModifiedDateTime->LinkCustomAttributes = "";
			$this->ModifiedDateTime->HrefValue = "";
			$this->ModifiedDateTime->TooltipValue = "";

			// BillDate
			$this->BillDate->LinkCustomAttributes = "";
			$this->BillDate->HrefValue = "";
			$this->BillDate->TooltipValue = "";

			// CurStock
			$this->CurStock->LinkCustomAttributes = "";
			$this->CurStock->HrefValue = "";
			$this->CurStock->TooltipValue = "";
		} elseif ($this->RowType == ROWTYPE_ADD) { // Add row

			// PRC
			$this->PRC->EditAttrs["class"] = "form-control";
			$this->PRC->EditCustomAttributes = "";
			if (!$this->PRC->Raw)
				$this->PRC->CurrentValue = HtmlDecode($this->PRC->CurrentValue);
			$this->PRC->EditValue = HtmlEncode($this->PRC->CurrentValue);
			$curVal = strval($this->PRC->CurrentValue);
			if ($curVal != "") {
				$this->PRC->EditValue = $this->PRC->lookupCacheOption($curVal);
				if ($this->PRC->EditValue === NULL) { // Lookup from database
					$filterWrk = "`PRC`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->PRC->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = HtmlEncode($rswrk->fields('df'));
						$this->PRC->EditValue = $this->PRC->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->PRC->EditValue = HtmlEncode($this->PRC->CurrentValue);
					}
				}
			} else {
				$this->PRC->EditValue = NULL;
			}
			$this->PRC->PlaceHolder = RemoveHtml($this->PRC->caption());

			// QTY
			$this->QTY->EditAttrs["class"] = "form-control";
			$this->QTY->EditCustomAttributes = "";
			$this->QTY->EditValue = HtmlEncode($this->QTY->CurrentValue);
			$this->QTY->PlaceHolder = RemoveHtml($this->QTY->caption());

			// Stock
			$this->Stock->EditAttrs["class"] = "form-control";
			$this->Stock->EditCustomAttributes = "";
			$this->Stock->EditValue = HtmlEncode($this->Stock->CurrentValue);
			$this->Stock->PlaceHolder = RemoveHtml($this->Stock->caption());

			// LastMonthSale
			$this->LastMonthSale->EditAttrs["class"] = "form-control";
			$this->LastMonthSale->EditCustomAttributes = "";
			$this->LastMonthSale->EditValue = HtmlEncode($this->LastMonthSale->CurrentValue);
			$this->LastMonthSale->PlaceHolder = RemoveHtml($this->LastMonthSale->caption());

			// HospID
			// CreatedBy
			// CreatedDateTime
			// ModifiedBy
			// ModifiedDateTime
			// BillDate

			$this->BillDate->EditAttrs["class"] = "form-control";
			$this->BillDate->EditCustomAttributes = "";
			$this->BillDate->EditValue = HtmlEncode(FormatDateTime($this->BillDate->CurrentValue, 8));
			$this->BillDate->PlaceHolder = RemoveHtml($this->BillDate->caption());

			// CurStock
			$this->CurStock->EditAttrs["class"] = "form-control";
			$this->CurStock->EditCustomAttributes = "";
			$this->CurStock->EditValue = HtmlEncode($this->CurStock->CurrentValue);
			$this->CurStock->PlaceHolder = RemoveHtml($this->CurStock->caption());

			// Add refer script
			// PRC

			$this->PRC->LinkCustomAttributes = "";
			$this->PRC->HrefValue = "";

			// QTY
			$this->QTY->LinkCustomAttributes = "";
			$this->QTY->HrefValue = "";

			// Stock
			$this->Stock->LinkCustomAttributes = "";
			$this->Stock->HrefValue = "";

			// LastMonthSale
			$this->LastMonthSale->LinkCustomAttributes = "";
			$this->LastMonthSale->HrefValue = "";

			// HospID
			$this->HospID->LinkCustomAttributes = "";
			$this->HospID->HrefValue = "";

			// CreatedBy
			$this->CreatedBy->LinkCustomAttributes = "";
			$this->CreatedBy->HrefValue = "";

			// CreatedDateTime
			$this->CreatedDateTime->LinkCustomAttributes = "";
			$this->CreatedDateTime->HrefValue = "";

			// ModifiedBy
			$this->ModifiedBy->LinkCustomAttributes = "";
			$this->ModifiedBy->HrefValue = "";

			// ModifiedDateTime
			$this->ModifiedDateTime->LinkCustomAttributes = "";
			$this->ModifiedDateTime->HrefValue = "";

			// BillDate
			$this->BillDate->LinkCustomAttributes = "";
			$this->BillDate->HrefValue = "";

			// CurStock
			$this->CurStock->LinkCustomAttributes = "";
			$this->CurStock->HrefValue = "";
		} elseif ($this->RowType == ROWTYPE_EDIT) { // Edit row

			// PRC
			$this->PRC->EditAttrs["class"] = "form-control";
			$this->PRC->EditCustomAttributes = "";
			if (!$this->PRC->Raw)
				$this->PRC->CurrentValue = HtmlDecode($this->PRC->CurrentValue);
			$this->PRC->EditValue = HtmlEncode($this->PRC->CurrentValue);
			$curVal = strval($this->PRC->CurrentValue);
			if ($curVal != "") {
				$this->PRC->EditValue = $this->PRC->lookupCacheOption($curVal);
				if ($this->PRC->EditValue === NULL) { // Lookup from database
					$filterWrk = "`PRC`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->PRC->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = HtmlEncode($rswrk->fields('df'));
						$this->PRC->EditValue = $this->PRC->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->PRC->EditValue = HtmlEncode($this->PRC->CurrentValue);
					}
				}
			} else {
				$this->PRC->EditValue = NULL;
			}
			$this->PRC->PlaceHolder = RemoveHtml($this->PRC->caption());

			// QTY
			$this->QTY->EditAttrs["class"] = "form-control";
			$this->QTY->EditCustomAttributes = "";
			$this->QTY->EditValue = HtmlEncode($this->QTY->CurrentValue);
			$this->QTY->PlaceHolder = RemoveHtml($this->QTY->caption());

			// Stock
			$this->Stock->EditAttrs["class"] = "form-control";
			$this->Stock->EditCustomAttributes = "";
			$this->Stock->EditValue = HtmlEncode($this->Stock->CurrentValue);
			$this->Stock->PlaceHolder = RemoveHtml($this->Stock->caption());

			// LastMonthSale
			$this->LastMonthSale->EditAttrs["class"] = "form-control";
			$this->LastMonthSale->EditCustomAttributes = "";
			$this->LastMonthSale->EditValue = HtmlEncode($this->LastMonthSale->CurrentValue);
			$this->LastMonthSale->PlaceHolder = RemoveHtml($this->LastMonthSale->caption());

			// HospID
			// CreatedBy
			// CreatedDateTime
			// ModifiedBy
			// ModifiedDateTime
			// BillDate

			$this->BillDate->EditAttrs["class"] = "form-control";
			$this->BillDate->EditCustomAttributes = "";
			$this->BillDate->EditValue = HtmlEncode(FormatDateTime($this->BillDate->CurrentValue, 8));
			$this->BillDate->PlaceHolder = RemoveHtml($this->BillDate->caption());

			// CurStock
			$this->CurStock->EditAttrs["class"] = "form-control";
			$this->CurStock->EditCustomAttributes = "";
			$this->CurStock->EditValue = HtmlEncode($this->CurStock->CurrentValue);
			$this->CurStock->PlaceHolder = RemoveHtml($this->CurStock->caption());

			// Edit refer script
			// PRC

			$this->PRC->LinkCustomAttributes = "";
			$this->PRC->HrefValue = "";

			// QTY
			$this->QTY->LinkCustomAttributes = "";
			$this->QTY->HrefValue = "";

			// Stock
			$this->Stock->LinkCustomAttributes = "";
			$this->Stock->HrefValue = "";

			// LastMonthSale
			$this->LastMonthSale->LinkCustomAttributes = "";
			$this->LastMonthSale->HrefValue = "";

			// HospID
			$this->HospID->LinkCustomAttributes = "";
			$this->HospID->HrefValue = "";

			// CreatedBy
			$this->CreatedBy->LinkCustomAttributes = "";
			$this->CreatedBy->HrefValue = "";

			// CreatedDateTime
			$this->CreatedDateTime->LinkCustomAttributes = "";
			$this->CreatedDateTime->HrefValue = "";

			// ModifiedBy
			$this->ModifiedBy->LinkCustomAttributes = "";
			$this->ModifiedBy->HrefValue = "";

			// ModifiedDateTime
			$this->ModifiedDateTime->LinkCustomAttributes = "";
			$this->ModifiedDateTime->HrefValue = "";

			// BillDate
			$this->BillDate->LinkCustomAttributes = "";
			$this->BillDate->HrefValue = "";

			// CurStock
			$this->CurStock->LinkCustomAttributes = "";
			$this->CurStock->HrefValue = "";
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

		// Check if validation required
		if (!Config("SERVER_VALIDATE"))
			return ($FormError == "");
		if ($this->PRC->Required) {
			if (!$this->PRC->IsDetailKey && $this->PRC->FormValue != NULL && $this->PRC->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PRC->caption(), $this->PRC->RequiredErrorMessage));
			}
		}
		if ($this->QTY->Required) {
			if (!$this->QTY->IsDetailKey && $this->QTY->FormValue != NULL && $this->QTY->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->QTY->caption(), $this->QTY->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->QTY->FormValue)) {
			AddMessage($FormError, $this->QTY->errorMessage());
		}
		if ($this->Stock->Required) {
			if (!$this->Stock->IsDetailKey && $this->Stock->FormValue != NULL && $this->Stock->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Stock->caption(), $this->Stock->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->Stock->FormValue)) {
			AddMessage($FormError, $this->Stock->errorMessage());
		}
		if ($this->LastMonthSale->Required) {
			if (!$this->LastMonthSale->IsDetailKey && $this->LastMonthSale->FormValue != NULL && $this->LastMonthSale->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->LastMonthSale->caption(), $this->LastMonthSale->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->LastMonthSale->FormValue)) {
			AddMessage($FormError, $this->LastMonthSale->errorMessage());
		}
		if ($this->HospID->Required) {
			if (!$this->HospID->IsDetailKey && $this->HospID->FormValue != NULL && $this->HospID->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->HospID->caption(), $this->HospID->RequiredErrorMessage));
			}
		}
		if ($this->CreatedBy->Required) {
			if (!$this->CreatedBy->IsDetailKey && $this->CreatedBy->FormValue != NULL && $this->CreatedBy->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->CreatedBy->caption(), $this->CreatedBy->RequiredErrorMessage));
			}
		}
		if ($this->CreatedDateTime->Required) {
			if (!$this->CreatedDateTime->IsDetailKey && $this->CreatedDateTime->FormValue != NULL && $this->CreatedDateTime->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->CreatedDateTime->caption(), $this->CreatedDateTime->RequiredErrorMessage));
			}
		}
		if ($this->ModifiedBy->Required) {
			if (!$this->ModifiedBy->IsDetailKey && $this->ModifiedBy->FormValue != NULL && $this->ModifiedBy->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->ModifiedBy->caption(), $this->ModifiedBy->RequiredErrorMessage));
			}
		}
		if ($this->ModifiedDateTime->Required) {
			if (!$this->ModifiedDateTime->IsDetailKey && $this->ModifiedDateTime->FormValue != NULL && $this->ModifiedDateTime->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->ModifiedDateTime->caption(), $this->ModifiedDateTime->RequiredErrorMessage));
			}
		}
		if ($this->BillDate->Required) {
			if (!$this->BillDate->IsDetailKey && $this->BillDate->FormValue != NULL && $this->BillDate->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->BillDate->caption(), $this->BillDate->RequiredErrorMessage));
			}
		}
		if (!CheckDate($this->BillDate->FormValue)) {
			AddMessage($FormError, $this->BillDate->errorMessage());
		}
		if ($this->CurStock->Required) {
			if (!$this->CurStock->IsDetailKey && $this->CurStock->FormValue != NULL && $this->CurStock->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->CurStock->caption(), $this->CurStock->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->CurStock->FormValue)) {
			AddMessage($FormError, $this->CurStock->errorMessage());
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

			// PRC
			$this->PRC->setDbValueDef($rsnew, $this->PRC->CurrentValue, NULL, $this->PRC->ReadOnly);

			// QTY
			$this->QTY->setDbValueDef($rsnew, $this->QTY->CurrentValue, NULL, $this->QTY->ReadOnly);

			// Stock
			$this->Stock->setDbValueDef($rsnew, $this->Stock->CurrentValue, NULL, $this->Stock->ReadOnly);

			// LastMonthSale
			$this->LastMonthSale->setDbValueDef($rsnew, $this->LastMonthSale->CurrentValue, NULL, $this->LastMonthSale->ReadOnly);

			// HospID
			$this->HospID->CurrentValue = HospitalID();
			$this->HospID->setDbValueDef($rsnew, $this->HospID->CurrentValue, NULL);

			// CreatedBy
			$this->CreatedBy->CurrentValue = CurrentUserID();
			$this->CreatedBy->setDbValueDef($rsnew, $this->CreatedBy->CurrentValue, NULL);

			// CreatedDateTime
			$this->CreatedDateTime->CurrentValue = CurrentDateTime();
			$this->CreatedDateTime->setDbValueDef($rsnew, $this->CreatedDateTime->CurrentValue, NULL);

			// ModifiedBy
			$this->ModifiedBy->CurrentValue = CurrentUserID();
			$this->ModifiedBy->setDbValueDef($rsnew, $this->ModifiedBy->CurrentValue, NULL);

			// ModifiedDateTime
			$this->ModifiedDateTime->CurrentValue = CurrentDateTime();
			$this->ModifiedDateTime->setDbValueDef($rsnew, $this->ModifiedDateTime->CurrentValue, NULL);

			// BillDate
			$this->BillDate->setDbValueDef($rsnew, UnFormatDateTime($this->BillDate->CurrentValue, 0), NULL, $this->BillDate->ReadOnly);

			// CurStock
			$this->CurStock->setDbValueDef($rsnew, $this->CurStock->CurrentValue, NULL, $this->CurStock->ReadOnly);

			// Check referential integrity for master table 'pharmacy_po'
			$validMasterRecord = TRUE;
			$masterFilter = $this->sqlMasterFilter_pharmacy_po();
			$keyValue = isset($rsnew['poid']) ? $rsnew['poid'] : $rsold['poid'];
			if (strval($keyValue) != "") {
				$masterFilter = str_replace("@id@", AdjustSql($keyValue), $masterFilter);
			} else {
				$validMasterRecord = FALSE;
			}
			if ($validMasterRecord) {
				if (!isset($GLOBALS["pharmacy_po"]))
					$GLOBALS["pharmacy_po"] = new pharmacy_po();
				$rsmaster = $GLOBALS["pharmacy_po"]->loadRs($masterFilter);
				$validMasterRecord = ($rsmaster && !$rsmaster->EOF);
				$rsmaster->close();
			}
			if (!$validMasterRecord) {
				$relatedRecordMsg = str_replace("%t", "pharmacy_po", $Language->phrase("RelatedRecordRequired"));
				$this->setFailureMessage($relatedRecordMsg);
				$rs->close();
				return FALSE;
			}

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

	// Add record
	protected function addRow($rsold = NULL)
	{
		global $Language, $Security;

		// Set up foreign key field value from Session
			if ($this->getCurrentMasterTable() == "pharmacy_po") {
				$this->poid->CurrentValue = $this->poid->getSessionValue();
			}

		// Check referential integrity for master table 'pharmacy_purchaseorder'
		$validMasterRecord = TRUE;
		$masterFilter = $this->sqlMasterFilter_pharmacy_po();
		if ($this->poid->getSessionValue() != "") {
			$masterFilter = str_replace("@id@", AdjustSql($this->poid->getSessionValue(), "DB"), $masterFilter);
		} else {
			$validMasterRecord = FALSE;
		}
		if ($validMasterRecord) {
			if (!isset($GLOBALS["pharmacy_po"]))
				$GLOBALS["pharmacy_po"] = new pharmacy_po();
			$rsmaster = $GLOBALS["pharmacy_po"]->loadRs($masterFilter);
			$validMasterRecord = ($rsmaster && !$rsmaster->EOF);
			$rsmaster->close();
		}
		if (!$validMasterRecord) {
			$relatedRecordMsg = str_replace("%t", "pharmacy_po", $Language->phrase("RelatedRecordRequired"));
			$this->setFailureMessage($relatedRecordMsg);
			return FALSE;
		}
		$conn = $this->getConnection();

		// Load db values from rsold
		$this->loadDbValues($rsold);
		if ($rsold) {
		}
		$rsnew = [];

		// PRC
		$this->PRC->setDbValueDef($rsnew, $this->PRC->CurrentValue, NULL, FALSE);

		// QTY
		$this->QTY->setDbValueDef($rsnew, $this->QTY->CurrentValue, NULL, FALSE);

		// Stock
		$this->Stock->setDbValueDef($rsnew, $this->Stock->CurrentValue, NULL, FALSE);

		// LastMonthSale
		$this->LastMonthSale->setDbValueDef($rsnew, $this->LastMonthSale->CurrentValue, NULL, FALSE);

		// HospID
		$this->HospID->CurrentValue = HospitalID();
		$this->HospID->setDbValueDef($rsnew, $this->HospID->CurrentValue, NULL);

		// CreatedBy
		$this->CreatedBy->CurrentValue = CurrentUserID();
		$this->CreatedBy->setDbValueDef($rsnew, $this->CreatedBy->CurrentValue, NULL);

		// CreatedDateTime
		$this->CreatedDateTime->CurrentValue = CurrentDateTime();
		$this->CreatedDateTime->setDbValueDef($rsnew, $this->CreatedDateTime->CurrentValue, NULL);

		// ModifiedBy
		$this->ModifiedBy->CurrentValue = CurrentUserID();
		$this->ModifiedBy->setDbValueDef($rsnew, $this->ModifiedBy->CurrentValue, NULL);

		// ModifiedDateTime
		$this->ModifiedDateTime->CurrentValue = CurrentDateTime();
		$this->ModifiedDateTime->setDbValueDef($rsnew, $this->ModifiedDateTime->CurrentValue, NULL);

		// BillDate
		$this->BillDate->setDbValueDef($rsnew, UnFormatDateTime($this->BillDate->CurrentValue, 0), NULL, FALSE);

		// CurStock
		$this->CurStock->setDbValueDef($rsnew, $this->CurStock->CurrentValue, NULL, FALSE);

		// poid
		if ($this->poid->getSessionValue() != "") {
			$rsnew['poid'] = $this->poid->getSessionValue();
		}

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

	// Set up master/detail based on QueryString
	protected function setupMasterParms()
	{

		// Hide foreign keys
		$masterTblVar = $this->getCurrentMasterTable();
		if ($masterTblVar == "pharmacy_po") {
			$this->poid->Visible = FALSE;
			if ($GLOBALS["pharmacy_po"]->EventCancelled)
				$this->EventCancelled = TRUE;
		}
		$this->DbMasterFilter = $this->getMasterFilter(); // Get master filter
		$this->DbDetailFilter = $this->getDetailFilter(); // Get detail filter
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
				case "x_PRC":
					break;
				case "x_PC":
					break;
				case "x_Received":
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
						case "x_PRC":
							break;
						case "x_PC":
							$row[1] = FormatNumber($row[1], 0, -2, -2, -2);
							$row['df'] = $row[1];
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
} // End class
?>
<?php
namespace PHPMaker2019\HIMS;

/**
 * Page class
 */
class view_pharmacy_movement_item_grid extends view_pharmacy_movement_item
{

	// Page ID
	public $PageID = "grid";

	// Project ID
	public $ProjectID = "{EA4F6D13-AF8F-428D-9EA7-BA88D1107EC3}";

	// Table name
	public $TableName = 'view_pharmacy_movement_item';

	// Page object name
	public $PageObjName = "view_pharmacy_movement_item_grid";

	// Grid form hidden field names
	public $FormName = "fview_pharmacy_movement_itemgrid";
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
	public $CancelUrl;

	// Page headings
	public $Heading = "";
	public $Subheading = "";
	public $PageHeader;
	public $PageFooter;

	// Token
	public $Token = "";
	public $TokenTimeout = 0;
	public $CheckToken = CHECK_TOKEN;

	// Messages
	private $_message = "";
	private $_failureMessage = "";
	private $_successMessage = "";
	private $_warningMessage = "";

	// Page URL
	private $_pageUrl = "";

	// Page heading
	public function pageHeading()
	{
		global $Language;
		if ($this->Heading <> "")
			return $this->Heading;
		if (method_exists($this, "tableCaption"))
			return $this->tableCaption();
		return "";
	}

	// Page subheading
	public function pageSubheading()
	{
		global $Language;
		if ($this->Subheading <> "")
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
		if ($this->_pageUrl == "") {
			$this->_pageUrl = CurrentPageName() . "?";
			if ($this->UseTokenInUrl)
				$this->_pageUrl .= "t=" . $this->TableVar . "&"; // Add page token
		}
		return $this->_pageUrl;
	}

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
		if ($message <> "") { // Message in Session, display
			if (!$hidden)
				$message = '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' . $message;
			$html .= '<div class="alert alert-info alert-dismissible ew-info"><i class="icon fa fa-info"></i>' . $message . '</div>';
			$_SESSION[SESSION_MESSAGE] = ""; // Clear message in Session
		}

		// Warning message
		$warningMessage = $this->getWarningMessage();
		if (method_exists($this, "Message_Showing"))
			$this->Message_Showing($warningMessage, "warning");
		if ($warningMessage <> "") { // Message in Session, display
			if (!$hidden)
				$warningMessage = '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' . $warningMessage;
			$html .= '<div class="alert alert-warning alert-dismissible ew-warning"><i class="icon fa fa-warning"></i>' . $warningMessage . '</div>';
			$_SESSION[SESSION_WARNING_MESSAGE] = ""; // Clear message in Session
		}

		// Success message
		$successMessage = $this->getSuccessMessage();
		if (method_exists($this, "Message_Showing"))
			$this->Message_Showing($successMessage, "success");
		if ($successMessage <> "") { // Message in Session, display
			if (!$hidden)
				$successMessage = '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' . $successMessage;
			$html .= '<div class="alert alert-success alert-dismissible ew-success"><i class="icon fa fa-check"></i>' . $successMessage . '</div>';
			$_SESSION[SESSION_SUCCESS_MESSAGE] = ""; // Clear message in Session
		}

		// Failure message
		$errorMessage = $this->getFailureMessage();
		if (method_exists($this, "Message_Showing"))
			$this->Message_Showing($errorMessage, "failure");
		if ($errorMessage <> "") { // Message in Session, display
			if (!$hidden)
				$errorMessage = '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' . $errorMessage;
			$html .= '<div class="alert alert-danger alert-dismissible ew-error"><i class="icon fa fa-ban"></i>' . $errorMessage . '</div>';
			$_SESSION[SESSION_FAILURE_MESSAGE] = ""; // Clear message in Session
		}
		echo '<div class="ew-message-dialog' . (($hidden) ? ' d-none' : "") . '">' . $html . '</div>';
	}

	// Get message as array
	public function getMessages()
	{
		$ar = array();

		// Message
		$message = $this->getMessage();

		//if (method_exists($this, "Message_Showing"))
		//	$this->Message_Showing($message, "");

		if ($message <> "") { // Message in Session, display
			$ar["message"] = $message;
			$_SESSION[SESSION_MESSAGE] = ""; // Clear message in Session
		}

		// Warning message
		$warningMessage = $this->getWarningMessage();

		//if (method_exists($this, "Message_Showing"))
		//	$this->Message_Showing($warningMessage, "warning");

		if ($warningMessage <> "") { // Message in Session, display
			$ar["warningMessage"] = $warningMessage;
			$_SESSION[SESSION_WARNING_MESSAGE] = ""; // Clear message in Session
		}

		// Success message
		$successMessage = $this->getSuccessMessage();

		//if (method_exists($this, "Message_Showing"))
		//	$this->Message_Showing($successMessage, "success");

		if ($successMessage <> "") { // Message in Session, display
			$ar["successMessage"] = $successMessage;
			$_SESSION[SESSION_SUCCESS_MESSAGE] = ""; // Clear message in Session
		}

		// Failure message
		$failureMessage = $this->getFailureMessage();

		//if (method_exists($this, "Message_Showing"))
		//	$this->Message_Showing($failureMessage, "failure");

		if ($failureMessage <> "") { // Message in Session, display
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
		if ($header <> "") { // Header exists, display
			echo '<p id="ew-page-header">' . $header . '</p>';
		}
	}

	// Show Page Footer
	public function showPageFooter()
	{
		$footer = $this->PageFooter;
		$this->Page_DataRendered($footer);
		if ($footer <> "") { // Footer exists, display
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
		if (Post(TOKEN_NAME) === NULL)
			return FALSE;
		$fn = PROJECT_NAMESPACE . CHECK_TOKEN_FUNC;
		if (is_callable($fn))
			return $fn(Post(TOKEN_NAME), $this->TokenTimeout);
		return FALSE;
	}

	// Create Token
	public function createToken()
	{
		global $CurrentToken;
		$fn = PROJECT_NAMESPACE . CREATE_TOKEN_FUNC; // Always create token, required by API file/lookup request
		if ($this->Token == "" && is_callable($fn)) // Create token
			$this->Token = $fn();
		$CurrentToken = $this->Token; // Save to global variable
	}

	// Constructor
	public function __construct()
	{
		global $Language, $COMPOSITE_KEY_SEPARATOR;
		global $UserTable, $UserTableConn;

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

		// Table object (view_pharmacy_movement_item)
		if (!isset($GLOBALS["view_pharmacy_movement_item"]) || get_class($GLOBALS["view_pharmacy_movement_item"]) == PROJECT_NAMESPACE . "view_pharmacy_movement_item") {
			$GLOBALS["view_pharmacy_movement_item"] = &$this;

			// $GLOBALS["MasterTable"] = &$GLOBALS["Table"];
			// if (!isset($GLOBALS["Table"]))
			// 	$GLOBALS["Table"] = &$GLOBALS["view_pharmacy_movement_item"];

		}
		$this->AddUrl = "view_pharmacy_movement_itemadd.php";
		$this->CancelUrl = $this->pageUrl() . "action=cancel";

		// Table object (user_login)
		if (!isset($GLOBALS['user_login']))
			$GLOBALS['user_login'] = new user_login();

		// Page ID
		if (!defined(PROJECT_NAMESPACE . "PAGE_ID"))
			define(PROJECT_NAMESPACE . "PAGE_ID", 'grid');

		// Table name (for backward compatibility)
		if (!defined(PROJECT_NAMESPACE . "TABLE_NAME"))
			define(PROJECT_NAMESPACE . "TABLE_NAME", 'view_pharmacy_movement_item');

		// Start timer
		if (!isset($GLOBALS["DebugTimer"]))
			$GLOBALS["DebugTimer"] = new Timer();

		// Debug message
		LoadDebugMessage();

		// Open connection
		if (!isset($GLOBALS["Conn"]))
			$GLOBALS["Conn"] = &$this->getConnection();

		// User table object (user_login)
		if (!isset($UserTable)) {
			$UserTable = new user_login();
			$UserTableConn = Conn($UserTable->Dbid);
		}

		// List options
		$this->ListOptions = new ListOptions();
		$this->ListOptions->TableVar = $this->TableVar;

		// Other options
		if (!$this->OtherOptions)
			$this->OtherOptions = new ListOptionsArray();
		$this->OtherOptions["addedit"] = new ListOptions();
		$this->OtherOptions["addedit"]->Tag = "div";
		$this->OtherOptions["addedit"]->TagClassName = "ew-add-edit-option";
	}

	// Terminate page
	public function terminate($url = "")
	{
		global $ExportFileName, $TempImages;

		// Export
		global $EXPORT, $view_pharmacy_movement_item;
		if ($this->CustomExport && $this->CustomExport == $this->Export && array_key_exists($this->CustomExport, $EXPORT)) {
				$content = ob_get_contents();
			if ($ExportFileName == "")
				$ExportFileName = $this->TableVar;
			$class = PROJECT_NAMESPACE . $EXPORT[$this->CustomExport];
			if (class_exists($class)) {
				$doc = new $class($view_pharmacy_movement_item);
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
		if ($url <> "") {
			if (!DEBUG_ENABLED && ob_get_length())
				ob_end_clean();
			SaveDebugMessage();
			AddHeader("Location", $url);
		}
		exit();
	}

	// Get records from recordset
	protected function getRecordsFromRecordset($rs, $current = FALSE)
	{
		$rows = array();
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
		$row = array();
		if (is_array($ar)) {
			foreach ($ar as $fldname => $val) {
				if (array_key_exists($fldname, $this->fields) && ($this->fields[$fldname]->Visible || $this->fields[$fldname]->IsPrimaryKey)) { // Primary key or Visible
					$fld = &$this->fields[$fldname];
					if ($fld->HtmlTag == "FILE") { // Upload field
						if (EmptyValue($val)) {
							$row[$fldname] = NULL;
						} else {
							if ($fld->DataType == DATATYPE_BLOB) {

								//$url = FullUrl($fld->TableVar . "/" . API_FILE_ACTION . "/" . $fld->Param . "/" . rawurlencode($this->getRecordKeyValue($ar))); // URL rewrite format
								$url = FullUrl(GetPageName(API_URL) . "?" . API_OBJECT_NAME . "=" . $fld->TableVar . "&" . API_ACTION_NAME . "=" . API_FILE_ACTION . "&" . API_FIELD_NAME . "=" . $fld->Param . "&" . API_KEY_NAME . "=" . rawurlencode($this->getRecordKeyValue($ar))); // Query string format
								$row[$fldname] = ["mimeType" => ContentType($val), "url" => $url];
							} elseif (!$fld->UploadMultiple || !ContainsString($val, MULTIPLE_UPLOAD_SEPARATOR)) { // Single file
								$row[$fldname] = ["mimeType" => MimeContentType($val), "url" => FullUrl($fld->hrefPath() . $val)];
							} else { // Multiple files
								$files = explode(MULTIPLE_UPLOAD_SEPARATOR, $val);
								$ar = [];
								foreach ($files as $file) {
									if (!EmptyValue($file))
										$ar[] = ["type" => MimeContentType($file), "url" => FullUrl($fld->hrefPath() . $file)];
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
		global $COMPOSITE_KEY_SEPARATOR;
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
		if ($this->isAddOrEdit())
			$this->HospID->Visible = FALSE;
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
	public $DisplayRecs = 20;
	public $StartRec;
	public $StopRec;
	public $TotalRecs = 0;
	public $RecRange = 10;
	public $Pager;
	public $AutoHidePager = AUTO_HIDE_PAGER;
	public $AutoHidePageSizeSelector = AUTO_HIDE_PAGE_SIZE_SELECTOR;
	public $DefaultSearchWhere = ""; // Default search WHERE clause
	public $SearchWhere = ""; // Search WHERE clause
	public $RecCnt = 0; // Record count
	public $EditRowCnt;
	public $StartRowCnt = 1;
	public $RowCnt = 0;
	public $Attrs = array(); // Row attributes and cell attributes
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
		global $ExportType, $CustomExportType, $ExportFileName, $UserProfile, $Language, $Security, $RequestSecurity, $CurrentForm,
			$FormError, $SearchError, $EXPORT;

		// Init Session data for API request if token found
		if (IsApi() && session_status() !== PHP_SESSION_ACTIVE) {
			$func = PROJECT_NAMESPACE . CHECK_TOKEN_FUNC;
			if (is_callable($func) && Param(TOKEN_NAME) !== NULL && $func(Param(TOKEN_NAME), SessionTimeoutTime()))
				session_start();
		}

		// User profile
		$UserProfile = new UserProfile();

		// Security
		$Security = new AdvancedSecurity();
		$validRequest = FALSE;

		// Check security for API request
		If (IsApi()) {

			// Check token first
			$func = PROJECT_NAMESPACE . CHECK_TOKEN_FUNC;
			if (is_callable($func) && Post(TOKEN_NAME) !== NULL)
				$validRequest = $func(Post(TOKEN_NAME), SessionTimeoutTime());
			elseif (is_array($RequestSecurity) && @$RequestSecurity["username"] <> "") // Login user for API request
				$Security->loginUser(@$RequestSecurity["username"], @$RequestSecurity["userid"], @$RequestSecurity["parentuserid"], @$RequestSecurity["userlevelid"]);
		}
		if (!$validRequest) {
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
		$gridaddcnt = Get(TABLE_GRID_ADD_ROW_COUNT, "");
		if (is_numeric($gridaddcnt) && $gridaddcnt > 0)
			$this->GridAddRowCount = $gridaddcnt;

		// Set up list options
		$this->setupListOptions();
		$this->ProductFrom->setVisibility();
		$this->Quantity->setVisibility();
		$this->FreeQty->setVisibility();
		$this->IQ->setVisibility();
		$this->MRQ->setVisibility();
		$this->BRCODE->setVisibility();
		$this->OPNO->setVisibility();
		$this->IPNO->setVisibility();
		$this->PatientBILLNO->setVisibility();
		$this->BILLDT->setVisibility();
		$this->GRNNO->setVisibility();
		$this->DT->setVisibility();
		$this->Customername->setVisibility();
		$this->createdby->setVisibility();
		$this->createddatetime->setVisibility();
		$this->modifiedby->setVisibility();
		$this->modifieddatetime->setVisibility();
		$this->BILLNO->setVisibility();
		$this->prc->setVisibility();
		$this->PrName->setVisibility();
		$this->BatchNo->setVisibility();
		$this->ExpDate->setVisibility();
		$this->MFRCODE->setVisibility();
		$this->hsn->setVisibility();
		$this->HospID->setVisibility();
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
		$this->setupLookupOptions($this->ProductFrom);
		$this->setupLookupOptions($this->BRCODE);

		// Search filters
		$srchAdvanced = ""; // Advanced search filter
		$srchBasic = ""; // Basic search filter
		$filter = "";

		// Get command
		$this->Command = strtolower(Get("cmd"));
		if ($this->isPageRequest()) { // Validate request

			// Set up records per page
			$this->setupDisplayRecs();

			// Handle reset command
			$this->resetCmd();

			// Hide list options
			if ($this->isExport()) {
				$this->ListOptions->hideAllOptions(array("sequence"));
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
					$item = &$this->ListOptions->getItem("griddelete");
					if ($item)
						$item->Visible = TRUE;
				}
			}

			// Set up sorting order
			$this->setupSortOrder();
		}

		// Restore display records
		if ($this->Command <> "json" && $this->getRecordsPerPage() <> "") {
			$this->DisplayRecs = $this->getRecordsPerPage(); // Restore from Session
		} else {
			$this->DisplayRecs = 20; // Load default
		}

		// Load Sorting Order
		if ($this->Command <> "json")
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
		if ($this->CurrentMode <> "add" && $this->getMasterFilter() <> "" && $this->getCurrentMasterTable() == "view_pharmacy_movement") {
			global $view_pharmacy_movement;
			$rsmaster = $view_pharmacy_movement->loadRs($this->DbMasterFilter);
			$this->MasterRecordExists = ($rsmaster && !$rsmaster->EOF);
			if (!$this->MasterRecordExists) {
				$this->setFailureMessage($Language->phrase("NoRecord")); // Set no record found
				$this->terminate("view_pharmacy_movementlist.php"); // Return to master page
			} else {
				$view_pharmacy_movement->loadListRowValues($rsmaster);
				$view_pharmacy_movement->RowType = ROWTYPE_MASTER; // Master row
				$view_pharmacy_movement->renderListRow();
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
					$this->TotalRecs = $this->listRecordCount();
					$this->Recordset = $this->loadRecordset($this->StartRec - 1, $this->DisplayRecs);
				} else {
					if ($this->Recordset = $this->loadRecordset())
						$this->TotalRecs = $this->Recordset->RecordCount();
				}
				$this->StartRec = 1;
				$this->DisplayRecs = $this->TotalRecs;
			} else {
				$this->CurrentFilter = "0=1";
				$this->StartRec = 1;
				$this->DisplayRecs = $this->GridAddRowCount;
			}
			$this->TotalRecs = $this->DisplayRecs;
			$this->StopRec = $this->DisplayRecs;
		} else {
			$selectLimit = $this->UseSelectLimit;
			if ($selectLimit) {
				$this->TotalRecs = $this->listRecordCount();
			} else {
				if ($this->Recordset = $this->loadRecordset())
					$this->TotalRecs = $this->Recordset->RecordCount();
			}
			$this->StartRec = 1;
			$this->DisplayRecs = $this->TotalRecs; // Display all records
			if ($selectLimit)
				$this->Recordset = $this->loadRecordset($this->StartRec - 1, $this->DisplayRecs);

			// Set no record found message
			if (!$this->CurrentAction && $this->TotalRecs == 0) {
				if (!$Security->canList())
					$this->setWarningMessage(DeniedMessage());
				if ($this->SearchWhere == "0=101")
					$this->setWarningMessage($Language->phrase("EnterSearchCriteria"));
				else
					$this->setWarningMessage($Language->phrase("NoRecord"));
			}
		}

		// Normal return
		if (IsApi()) {
			$rows = $this->getRecordsFromRecordset($this->Recordset);
			$this->Recordset->close();
			WriteJson(["success" => TRUE, $this->TableVar => $rows, "totalRecordCount" => $this->TotalRecs]);
			$this->terminate(TRUE);
		}
	}

	// Set up number of records displayed per page
	protected function setupDisplayRecs()
	{
		$wrk = Get(TABLE_REC_PER_PAGE, "");
		if ($wrk <> "") {
			if (is_numeric($wrk)) {
				$this->DisplayRecs = (int)$wrk;
			} else {
				if (SameText($wrk, "all")) { // Display all records
					$this->DisplayRecs = -1;
				} else {
					$this->DisplayRecs = 20; // Non-numeric, load default
				}
			}
			$this->setRecordsPerPage($this->DisplayRecs); // Save to Session

			// Reset start position
			$this->StartRec = 1;
			$this->setStartRecordNumber($this->StartRec);
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
		$conn = &$this->getConnection();
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
			if ($rowaction <> "insertdelete") { // Skip insert then deleted rows
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
							if ($rowkey <> "") {
								$this->SendEmail = FALSE; // Do not send email on update success
								$gridUpdate = $this->editRow(); // Update this row
							}
						} // End update
					}
				}
				if ($gridUpdate) {
					if ($key <> "")
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
		while ($thisKey <> "") {
			if ($this->setupKeyValues($thisKey)) {
				$filter = $this->getRecordFilter();
				if ($wrkFilter <> "")
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
		$arKeyFlds = explode($GLOBALS["COMPOSITE_KEY_SEPARATOR"], $key);
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
		$conn = &$this->getConnection();

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
			if ($rowaction <> "" && $rowaction <> "insert")
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

					// Add filter for this record
					$filter = $this->getRecordFilter();
					if ($wrkfilter <> "")
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
		if ($CurrentForm->hasValue("x_ProductFrom") && $CurrentForm->hasValue("o_ProductFrom") && $this->ProductFrom->CurrentValue <> $this->ProductFrom->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_Quantity") && $CurrentForm->hasValue("o_Quantity") && $this->Quantity->CurrentValue <> $this->Quantity->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_FreeQty") && $CurrentForm->hasValue("o_FreeQty") && $this->FreeQty->CurrentValue <> $this->FreeQty->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_IQ") && $CurrentForm->hasValue("o_IQ") && $this->IQ->CurrentValue <> $this->IQ->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_MRQ") && $CurrentForm->hasValue("o_MRQ") && $this->MRQ->CurrentValue <> $this->MRQ->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_BRCODE") && $CurrentForm->hasValue("o_BRCODE") && $this->BRCODE->CurrentValue <> $this->BRCODE->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_OPNO") && $CurrentForm->hasValue("o_OPNO") && $this->OPNO->CurrentValue <> $this->OPNO->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_IPNO") && $CurrentForm->hasValue("o_IPNO") && $this->IPNO->CurrentValue <> $this->IPNO->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_PatientBILLNO") && $CurrentForm->hasValue("o_PatientBILLNO") && $this->PatientBILLNO->CurrentValue <> $this->PatientBILLNO->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_BILLDT") && $CurrentForm->hasValue("o_BILLDT") && $this->BILLDT->CurrentValue <> $this->BILLDT->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_GRNNO") && $CurrentForm->hasValue("o_GRNNO") && $this->GRNNO->CurrentValue <> $this->GRNNO->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_DT") && $CurrentForm->hasValue("o_DT") && $this->DT->CurrentValue <> $this->DT->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_Customername") && $CurrentForm->hasValue("o_Customername") && $this->Customername->CurrentValue <> $this->Customername->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_createdby") && $CurrentForm->hasValue("o_createdby") && $this->createdby->CurrentValue <> $this->createdby->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_createddatetime") && $CurrentForm->hasValue("o_createddatetime") && $this->createddatetime->CurrentValue <> $this->createddatetime->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_modifiedby") && $CurrentForm->hasValue("o_modifiedby") && $this->modifiedby->CurrentValue <> $this->modifiedby->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_modifieddatetime") && $CurrentForm->hasValue("o_modifieddatetime") && $this->modifieddatetime->CurrentValue <> $this->modifieddatetime->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_BILLNO") && $CurrentForm->hasValue("o_BILLNO") && $this->BILLNO->CurrentValue <> $this->BILLNO->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_prc") && $CurrentForm->hasValue("o_prc") && $this->prc->CurrentValue <> $this->prc->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_PrName") && $CurrentForm->hasValue("o_PrName") && $this->PrName->CurrentValue <> $this->PrName->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_BatchNo") && $CurrentForm->hasValue("o_BatchNo") && $this->BatchNo->CurrentValue <> $this->BatchNo->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_ExpDate") && $CurrentForm->hasValue("o_ExpDate") && $this->ExpDate->CurrentValue <> $this->ExpDate->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_MFRCODE") && $CurrentForm->hasValue("o_MFRCODE") && $this->MFRCODE->CurrentValue <> $this->MFRCODE->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_hsn") && $CurrentForm->hasValue("o_hsn") && $this->hsn->CurrentValue <> $this->hsn->OldValue)
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
			if ($rowaction <> "delete" && $rowaction <> "insertdelete") {
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
		$rows = array();

		// Loop through all records
		for ($rowindex = 1; $rowindex <= $rowcnt; $rowindex++) {

			// Load current row values
			$CurrentForm->Index = $rowindex;
			$rowaction = strval($CurrentForm->getValue($this->FormActionName));
			if ($rowaction <> "delete" && $rowaction <> "insertdelete") {
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
			if ($this->getSqlOrderBy() <> "") {
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
		if (substr($this->Command,0,5) == "reset") {

			// Reset master/detail keys
			if ($this->Command == "resetall") {
				$this->setCurrentMasterTable(""); // Clear master table
				$this->DbMasterFilter = "";
				$this->DbDetailFilter = "";
				$this->prc->setSessionValue("");
				$this->BatchNo->setSessionValue("");
			}

			// Reset sorting order
			if ($this->Command == "resetsort") {
				$orderBy = "";
				$this->setSessionOrderBy($orderBy);
			}

			// Reset start position
			$this->StartRec = 1;
			$this->setStartRecordNumber($this->StartRec);
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

		// Drop down button for ListOptions
		$this->ListOptions->UseDropDownButton = FALSE;
		$this->ListOptions->DropDownButtonPhrase = $Language->phrase("ButtonListOptions");
		$this->ListOptions->UseButtonGroup = FALSE;
		if ($this->ListOptions->UseButtonGroup && IsMobile())
			$this->ListOptions->UseDropDownButton = TRUE;

		//$this->ListOptions->ButtonClass = ""; // Class for button group
		// Call ListOptions_Load event

		$this->ListOptions_Load();
		$item = &$this->ListOptions->getItem($this->ListOptions->GroupOptionName);
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
		if (is_numeric($this->RowIndex) && $this->CurrentMode <> "view") {
			$CurrentForm->Index = $this->RowIndex;
			$actionName = str_replace("k_", "k" . $this->RowIndex . "_", $this->FormActionName);
			$oldKeyName = str_replace("k_", "k" . $this->RowIndex . "_", $this->FormOldKeyName);
			$keyName = str_replace("k_", "k" . $this->RowIndex . "_", $this->FormKeyName);
			$blankRowName = str_replace("k_", "k" . $this->RowIndex . "_", $this->FormBlankRowName);
			if ($this->RowAction <> "")
				$this->MultiSelectKey .= "<input type=\"hidden\" name=\"" . $actionName . "\" id=\"" . $actionName . "\" value=\"" . $this->RowAction . "\">";
			if ($CurrentForm->hasValue($this->FormOldKeyName))
				$this->RowOldKey = strval($CurrentForm->getValue($this->FormOldKeyName));
			if ($this->RowOldKey <> "")
				$this->MultiSelectKey .= "<input type=\"hidden\" name=\"" . $oldKeyName . "\" id=\"" . $oldKeyName . "\" value=\"" . HtmlEncode($this->RowOldKey) . "\">";
			if ($this->RowAction == "delete") {
				$rowkey = $CurrentForm->getValue($this->FormKeyName);
				$this->setupKeyValues($rowkey);
			}
			if ($this->RowAction == "insert" && $this->isConfirm() && $this->emptyRow())
				$this->MultiSelectKey .= "<input type=\"hidden\" name=\"" . $blankRowName . "\" id=\"" . $blankRowName . "\" value=\"1\">";
		}

		// "delete"
		if ($this->AllowAddDeleteRow) {
			if ($this->CurrentMode == "add" || $this->CurrentMode == "copy" || $this->CurrentMode == "edit") {
				$options = &$this->ListOptions;
				$options->UseButtonGroup = TRUE; // Use button group for grid delete button
				$opt = &$options->Items["griddelete"];
				if (is_numeric($this->RowIndex) && ($this->RowAction == "" || $this->RowAction == "edit")) { // Do not allow delete existing record
					$opt->Body = "&nbsp;";
				} else {
					$opt->Body = "<a class=\"ew-grid-link ew-grid-delete\" title=\"" . HtmlTitle($Language->phrase("DeleteLink")) . "\" data-caption=\"" . HtmlTitle($Language->phrase("DeleteLink")) . "\" onclick=\"return ew.deleteGridRow(this, " . $this->RowIndex . ");\">" . $Language->phrase("DeleteLink") . "</a>";
				}
			}
		}
		if ($this->CurrentMode == "view") { // View mode
		} // End View mode
		if ($this->CurrentMode == "edit" && is_numeric($this->RowIndex)) {
		}
		$this->renderListOptionsExt();

		// Call ListOptions_Rendered event
		$this->ListOptions_Rendered();
	}

	// Set record key
	public function setRecordKey(&$key, $rs)
	{
		$key = "";
	}

	// Set up other options
	protected function setupOtherOptions()
	{
		global $Language, $Security;
		$option = &$this->OtherOptions["addedit"];
		$option->UseDropDownButton = FALSE;
		$option->DropDownButtonPhrase = $Language->phrase("ButtonAddEdit");
		$option->UseButtonGroup = TRUE;

		//$option->ButtonClass = ""; // Class for button group
		$item = &$option->add($option->GroupOptionName);
		$item->Body = "";
		$item->Visible = FALSE;
	}

	// Render other options
	public function renderOtherOptions()
	{
		global $Language, $Security;
		$options = &$this->OtherOptions;
		if (($this->CurrentMode == "add" || $this->CurrentMode == "copy" || $this->CurrentMode == "edit") && !$this->isConfirm()) { // Check add/copy/edit mode
			if ($this->AllowAddDeleteRow) {
				$option = &$options["addedit"];
				$option->UseDropDownButton = FALSE;
				$item = &$option->add("addblankrow");
				$item->Body = "<a class=\"ew-add-edit ew-add-blank-row\" title=\"" . HtmlTitle($Language->phrase("AddBlankRow")) . "\" data-caption=\"" . HtmlTitle($Language->phrase("AddBlankRow")) . "\" href=\"javascript:void(0);\" onclick=\"ew.addGridRow(this);\">" . $Language->phrase("AddBlankRow") . "</a>";
				$item->Visible = FALSE;
				$this->ShowOtherOptions = $item->Visible;
			}
		}
		if ($this->CurrentMode == "view") { // Check view mode
			$option = &$options["addedit"];
			$item = &$option->getItem("add");
			$this->ShowOtherOptions = $item && $item->Visible;
		}
	}
	protected function renderListOptionsExt()
	{
		global $Security, $Language;
	}

	// Set up starting record parameters
	public function setupStartRec()
	{
		if ($this->DisplayRecs == 0)
			return;
		if ($this->isPageRequest()) { // Validate request
			if (Get(TABLE_START_REC) !== NULL) { // Check for "start" parameter
				$this->StartRec = Get(TABLE_START_REC);
				$this->setStartRecordNumber($this->StartRec);
			} elseif (Get(TABLE_PAGE_NO) !== NULL) {
				$pageNo = Get(TABLE_PAGE_NO);
				if (is_numeric($pageNo)) {
					$this->StartRec = ($pageNo - 1) * $this->DisplayRecs + 1;
					if ($this->StartRec <= 0) {
						$this->StartRec = 1;
					} elseif ($this->StartRec >= (int)(($this->TotalRecs - 1)/$this->DisplayRecs) * $this->DisplayRecs + 1) {
						$this->StartRec = (int)(($this->TotalRecs - 1)/$this->DisplayRecs) * $this->DisplayRecs + 1;
					}
					$this->setStartRecordNumber($this->StartRec);
				}
			}
		}
		$this->StartRec = $this->getStartRecordNumber();

		// Check if correct start record counter
		if (!is_numeric($this->StartRec) || $this->StartRec == "") { // Avoid invalid start record counter
			$this->StartRec = 1; // Reset start record counter
			$this->setStartRecordNumber($this->StartRec);
		} elseif ($this->StartRec > $this->TotalRecs) { // Avoid starting record > total records
			$this->StartRec = (int)(($this->TotalRecs - 1)/$this->DisplayRecs) * $this->DisplayRecs + 1; // Point to last page first record
			$this->setStartRecordNumber($this->StartRec);
		} elseif (($this->StartRec - 1) % $this->DisplayRecs <> 0) {
			$this->StartRec = (int)(($this->StartRec - 1)/$this->DisplayRecs) * $this->DisplayRecs + 1; // Point to page boundary
			$this->setStartRecordNumber($this->StartRec);
		}
	}

	// Get upload files
	protected function getUploadFiles()
	{
		global $CurrentForm, $Language;
	}

	// Load default values
	protected function loadDefaultValues()
	{
		$this->ProductFrom->CurrentValue = NULL;
		$this->ProductFrom->OldValue = $this->ProductFrom->CurrentValue;
		$this->Quantity->CurrentValue = NULL;
		$this->Quantity->OldValue = $this->Quantity->CurrentValue;
		$this->FreeQty->CurrentValue = NULL;
		$this->FreeQty->OldValue = $this->FreeQty->CurrentValue;
		$this->IQ->CurrentValue = NULL;
		$this->IQ->OldValue = $this->IQ->CurrentValue;
		$this->MRQ->CurrentValue = NULL;
		$this->MRQ->OldValue = $this->MRQ->CurrentValue;
		$this->BRCODE->CurrentValue = NULL;
		$this->BRCODE->OldValue = $this->BRCODE->CurrentValue;
		$this->OPNO->CurrentValue = NULL;
		$this->OPNO->OldValue = $this->OPNO->CurrentValue;
		$this->IPNO->CurrentValue = NULL;
		$this->IPNO->OldValue = $this->IPNO->CurrentValue;
		$this->PatientBILLNO->CurrentValue = NULL;
		$this->PatientBILLNO->OldValue = $this->PatientBILLNO->CurrentValue;
		$this->BILLDT->CurrentValue = NULL;
		$this->BILLDT->OldValue = $this->BILLDT->CurrentValue;
		$this->GRNNO->CurrentValue = NULL;
		$this->GRNNO->OldValue = $this->GRNNO->CurrentValue;
		$this->DT->CurrentValue = NULL;
		$this->DT->OldValue = $this->DT->CurrentValue;
		$this->Customername->CurrentValue = NULL;
		$this->Customername->OldValue = $this->Customername->CurrentValue;
		$this->createdby->CurrentValue = NULL;
		$this->createdby->OldValue = $this->createdby->CurrentValue;
		$this->createddatetime->CurrentValue = NULL;
		$this->createddatetime->OldValue = $this->createddatetime->CurrentValue;
		$this->modifiedby->CurrentValue = NULL;
		$this->modifiedby->OldValue = $this->modifiedby->CurrentValue;
		$this->modifieddatetime->CurrentValue = NULL;
		$this->modifieddatetime->OldValue = $this->modifieddatetime->CurrentValue;
		$this->BILLNO->CurrentValue = NULL;
		$this->BILLNO->OldValue = $this->BILLNO->CurrentValue;
		$this->prc->CurrentValue = NULL;
		$this->prc->OldValue = $this->prc->CurrentValue;
		$this->PrName->CurrentValue = NULL;
		$this->PrName->OldValue = $this->PrName->CurrentValue;
		$this->BatchNo->CurrentValue = NULL;
		$this->BatchNo->OldValue = $this->BatchNo->CurrentValue;
		$this->ExpDate->CurrentValue = NULL;
		$this->ExpDate->OldValue = $this->ExpDate->CurrentValue;
		$this->MFRCODE->CurrentValue = NULL;
		$this->MFRCODE->OldValue = $this->MFRCODE->CurrentValue;
		$this->hsn->CurrentValue = NULL;
		$this->hsn->OldValue = $this->hsn->CurrentValue;
		$this->HospID->CurrentValue = NULL;
		$this->HospID->OldValue = $this->HospID->CurrentValue;
	}

	// Load form values
	protected function loadFormValues()
	{

		// Load from form
		global $CurrentForm;
		$CurrentForm->FormName = $this->FormName;

		// Check field name 'ProductFrom' first before field var 'x_ProductFrom'
		$val = $CurrentForm->hasValue("ProductFrom") ? $CurrentForm->getValue("ProductFrom") : $CurrentForm->getValue("x_ProductFrom");
		if (!$this->ProductFrom->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->ProductFrom->Visible = FALSE; // Disable update for API request
			else
				$this->ProductFrom->setFormValue($val);
		}
		$this->ProductFrom->setOldValue($CurrentForm->getValue("o_ProductFrom"));

		// Check field name 'Quantity' first before field var 'x_Quantity'
		$val = $CurrentForm->hasValue("Quantity") ? $CurrentForm->getValue("Quantity") : $CurrentForm->getValue("x_Quantity");
		if (!$this->Quantity->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Quantity->Visible = FALSE; // Disable update for API request
			else
				$this->Quantity->setFormValue($val);
		}
		$this->Quantity->setOldValue($CurrentForm->getValue("o_Quantity"));

		// Check field name 'FreeQty' first before field var 'x_FreeQty'
		$val = $CurrentForm->hasValue("FreeQty") ? $CurrentForm->getValue("FreeQty") : $CurrentForm->getValue("x_FreeQty");
		if (!$this->FreeQty->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->FreeQty->Visible = FALSE; // Disable update for API request
			else
				$this->FreeQty->setFormValue($val);
		}
		$this->FreeQty->setOldValue($CurrentForm->getValue("o_FreeQty"));

		// Check field name 'IQ' first before field var 'x_IQ'
		$val = $CurrentForm->hasValue("IQ") ? $CurrentForm->getValue("IQ") : $CurrentForm->getValue("x_IQ");
		if (!$this->IQ->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->IQ->Visible = FALSE; // Disable update for API request
			else
				$this->IQ->setFormValue($val);
		}
		$this->IQ->setOldValue($CurrentForm->getValue("o_IQ"));

		// Check field name 'MRQ' first before field var 'x_MRQ'
		$val = $CurrentForm->hasValue("MRQ") ? $CurrentForm->getValue("MRQ") : $CurrentForm->getValue("x_MRQ");
		if (!$this->MRQ->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->MRQ->Visible = FALSE; // Disable update for API request
			else
				$this->MRQ->setFormValue($val);
		}
		$this->MRQ->setOldValue($CurrentForm->getValue("o_MRQ"));

		// Check field name 'BRCODE' first before field var 'x_BRCODE'
		$val = $CurrentForm->hasValue("BRCODE") ? $CurrentForm->getValue("BRCODE") : $CurrentForm->getValue("x_BRCODE");
		if (!$this->BRCODE->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->BRCODE->Visible = FALSE; // Disable update for API request
			else
				$this->BRCODE->setFormValue($val);
		}
		$this->BRCODE->setOldValue($CurrentForm->getValue("o_BRCODE"));

		// Check field name 'OPNO' first before field var 'x_OPNO'
		$val = $CurrentForm->hasValue("OPNO") ? $CurrentForm->getValue("OPNO") : $CurrentForm->getValue("x_OPNO");
		if (!$this->OPNO->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->OPNO->Visible = FALSE; // Disable update for API request
			else
				$this->OPNO->setFormValue($val);
		}
		$this->OPNO->setOldValue($CurrentForm->getValue("o_OPNO"));

		// Check field name 'IPNO' first before field var 'x_IPNO'
		$val = $CurrentForm->hasValue("IPNO") ? $CurrentForm->getValue("IPNO") : $CurrentForm->getValue("x_IPNO");
		if (!$this->IPNO->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->IPNO->Visible = FALSE; // Disable update for API request
			else
				$this->IPNO->setFormValue($val);
		}
		$this->IPNO->setOldValue($CurrentForm->getValue("o_IPNO"));

		// Check field name 'PatientBILLNO' first before field var 'x_PatientBILLNO'
		$val = $CurrentForm->hasValue("PatientBILLNO") ? $CurrentForm->getValue("PatientBILLNO") : $CurrentForm->getValue("x_PatientBILLNO");
		if (!$this->PatientBILLNO->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->PatientBILLNO->Visible = FALSE; // Disable update for API request
			else
				$this->PatientBILLNO->setFormValue($val);
		}
		$this->PatientBILLNO->setOldValue($CurrentForm->getValue("o_PatientBILLNO"));

		// Check field name 'BILLDT' first before field var 'x_BILLDT'
		$val = $CurrentForm->hasValue("BILLDT") ? $CurrentForm->getValue("BILLDT") : $CurrentForm->getValue("x_BILLDT");
		if (!$this->BILLDT->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->BILLDT->Visible = FALSE; // Disable update for API request
			else
				$this->BILLDT->setFormValue($val);
		}
		$this->BILLDT->setOldValue($CurrentForm->getValue("o_BILLDT"));

		// Check field name 'GRNNO' first before field var 'x_GRNNO'
		$val = $CurrentForm->hasValue("GRNNO") ? $CurrentForm->getValue("GRNNO") : $CurrentForm->getValue("x_GRNNO");
		if (!$this->GRNNO->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->GRNNO->Visible = FALSE; // Disable update for API request
			else
				$this->GRNNO->setFormValue($val);
		}
		$this->GRNNO->setOldValue($CurrentForm->getValue("o_GRNNO"));

		// Check field name 'DT' first before field var 'x_DT'
		$val = $CurrentForm->hasValue("DT") ? $CurrentForm->getValue("DT") : $CurrentForm->getValue("x_DT");
		if (!$this->DT->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->DT->Visible = FALSE; // Disable update for API request
			else
				$this->DT->setFormValue($val);
		}
		$this->DT->setOldValue($CurrentForm->getValue("o_DT"));

		// Check field name 'Customername' first before field var 'x_Customername'
		$val = $CurrentForm->hasValue("Customername") ? $CurrentForm->getValue("Customername") : $CurrentForm->getValue("x_Customername");
		if (!$this->Customername->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Customername->Visible = FALSE; // Disable update for API request
			else
				$this->Customername->setFormValue($val);
		}
		$this->Customername->setOldValue($CurrentForm->getValue("o_Customername"));

		// Check field name 'createdby' first before field var 'x_createdby'
		$val = $CurrentForm->hasValue("createdby") ? $CurrentForm->getValue("createdby") : $CurrentForm->getValue("x_createdby");
		if (!$this->createdby->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->createdby->Visible = FALSE; // Disable update for API request
			else
				$this->createdby->setFormValue($val);
		}
		$this->createdby->setOldValue($CurrentForm->getValue("o_createdby"));

		// Check field name 'createddatetime' first before field var 'x_createddatetime'
		$val = $CurrentForm->hasValue("createddatetime") ? $CurrentForm->getValue("createddatetime") : $CurrentForm->getValue("x_createddatetime");
		if (!$this->createddatetime->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->createddatetime->Visible = FALSE; // Disable update for API request
			else
				$this->createddatetime->setFormValue($val);
			$this->createddatetime->CurrentValue = UnFormatDateTime($this->createddatetime->CurrentValue, 11);
		}
		$this->createddatetime->setOldValue($CurrentForm->getValue("o_createddatetime"));

		// Check field name 'modifiedby' first before field var 'x_modifiedby'
		$val = $CurrentForm->hasValue("modifiedby") ? $CurrentForm->getValue("modifiedby") : $CurrentForm->getValue("x_modifiedby");
		if (!$this->modifiedby->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->modifiedby->Visible = FALSE; // Disable update for API request
			else
				$this->modifiedby->setFormValue($val);
		}
		$this->modifiedby->setOldValue($CurrentForm->getValue("o_modifiedby"));

		// Check field name 'modifieddatetime' first before field var 'x_modifieddatetime'
		$val = $CurrentForm->hasValue("modifieddatetime") ? $CurrentForm->getValue("modifieddatetime") : $CurrentForm->getValue("x_modifieddatetime");
		if (!$this->modifieddatetime->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->modifieddatetime->Visible = FALSE; // Disable update for API request
			else
				$this->modifieddatetime->setFormValue($val);
			$this->modifieddatetime->CurrentValue = UnFormatDateTime($this->modifieddatetime->CurrentValue, 11);
		}
		$this->modifieddatetime->setOldValue($CurrentForm->getValue("o_modifieddatetime"));

		// Check field name 'BILLNO' first before field var 'x_BILLNO'
		$val = $CurrentForm->hasValue("BILLNO") ? $CurrentForm->getValue("BILLNO") : $CurrentForm->getValue("x_BILLNO");
		if (!$this->BILLNO->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->BILLNO->Visible = FALSE; // Disable update for API request
			else
				$this->BILLNO->setFormValue($val);
		}
		$this->BILLNO->setOldValue($CurrentForm->getValue("o_BILLNO"));

		// Check field name 'prc' first before field var 'x_prc'
		$val = $CurrentForm->hasValue("prc") ? $CurrentForm->getValue("prc") : $CurrentForm->getValue("x_prc");
		if (!$this->prc->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->prc->Visible = FALSE; // Disable update for API request
			else
				$this->prc->setFormValue($val);
		}
		$this->prc->setOldValue($CurrentForm->getValue("o_prc"));

		// Check field name 'PrName' first before field var 'x_PrName'
		$val = $CurrentForm->hasValue("PrName") ? $CurrentForm->getValue("PrName") : $CurrentForm->getValue("x_PrName");
		if (!$this->PrName->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->PrName->Visible = FALSE; // Disable update for API request
			else
				$this->PrName->setFormValue($val);
		}
		$this->PrName->setOldValue($CurrentForm->getValue("o_PrName"));

		// Check field name 'BatchNo' first before field var 'x_BatchNo'
		$val = $CurrentForm->hasValue("BatchNo") ? $CurrentForm->getValue("BatchNo") : $CurrentForm->getValue("x_BatchNo");
		if (!$this->BatchNo->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->BatchNo->Visible = FALSE; // Disable update for API request
			else
				$this->BatchNo->setFormValue($val);
		}
		$this->BatchNo->setOldValue($CurrentForm->getValue("o_BatchNo"));

		// Check field name 'ExpDate' first before field var 'x_ExpDate'
		$val = $CurrentForm->hasValue("ExpDate") ? $CurrentForm->getValue("ExpDate") : $CurrentForm->getValue("x_ExpDate");
		if (!$this->ExpDate->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->ExpDate->Visible = FALSE; // Disable update for API request
			else
				$this->ExpDate->setFormValue($val);
			$this->ExpDate->CurrentValue = UnFormatDateTime($this->ExpDate->CurrentValue, 7);
		}
		$this->ExpDate->setOldValue($CurrentForm->getValue("o_ExpDate"));

		// Check field name 'MFRCODE' first before field var 'x_MFRCODE'
		$val = $CurrentForm->hasValue("MFRCODE") ? $CurrentForm->getValue("MFRCODE") : $CurrentForm->getValue("x_MFRCODE");
		if (!$this->MFRCODE->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->MFRCODE->Visible = FALSE; // Disable update for API request
			else
				$this->MFRCODE->setFormValue($val);
		}
		$this->MFRCODE->setOldValue($CurrentForm->getValue("o_MFRCODE"));

		// Check field name 'hsn' first before field var 'x_hsn'
		$val = $CurrentForm->hasValue("hsn") ? $CurrentForm->getValue("hsn") : $CurrentForm->getValue("x_hsn");
		if (!$this->hsn->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->hsn->Visible = FALSE; // Disable update for API request
			else
				$this->hsn->setFormValue($val);
		}
		$this->hsn->setOldValue($CurrentForm->getValue("o_hsn"));

		// Check field name 'HospID' first before field var 'x_HospID'
		$val = $CurrentForm->hasValue("HospID") ? $CurrentForm->getValue("HospID") : $CurrentForm->getValue("x_HospID");
		if (!$this->HospID->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->HospID->Visible = FALSE; // Disable update for API request
			else
				$this->HospID->setFormValue($val);
		}
		$this->HospID->setOldValue($CurrentForm->getValue("o_HospID"));
	}

	// Restore form values
	public function restoreFormValues()
	{
		global $CurrentForm;
		$this->ProductFrom->CurrentValue = $this->ProductFrom->FormValue;
		$this->Quantity->CurrentValue = $this->Quantity->FormValue;
		$this->FreeQty->CurrentValue = $this->FreeQty->FormValue;
		$this->IQ->CurrentValue = $this->IQ->FormValue;
		$this->MRQ->CurrentValue = $this->MRQ->FormValue;
		$this->BRCODE->CurrentValue = $this->BRCODE->FormValue;
		$this->OPNO->CurrentValue = $this->OPNO->FormValue;
		$this->IPNO->CurrentValue = $this->IPNO->FormValue;
		$this->PatientBILLNO->CurrentValue = $this->PatientBILLNO->FormValue;
		$this->BILLDT->CurrentValue = $this->BILLDT->FormValue;
		$this->GRNNO->CurrentValue = $this->GRNNO->FormValue;
		$this->DT->CurrentValue = $this->DT->FormValue;
		$this->Customername->CurrentValue = $this->Customername->FormValue;
		$this->createdby->CurrentValue = $this->createdby->FormValue;
		$this->createddatetime->CurrentValue = $this->createddatetime->FormValue;
		$this->createddatetime->CurrentValue = UnFormatDateTime($this->createddatetime->CurrentValue, 11);
		$this->modifiedby->CurrentValue = $this->modifiedby->FormValue;
		$this->modifieddatetime->CurrentValue = $this->modifieddatetime->FormValue;
		$this->modifieddatetime->CurrentValue = UnFormatDateTime($this->modifieddatetime->CurrentValue, 11);
		$this->BILLNO->CurrentValue = $this->BILLNO->FormValue;
		$this->prc->CurrentValue = $this->prc->FormValue;
		$this->PrName->CurrentValue = $this->PrName->FormValue;
		$this->BatchNo->CurrentValue = $this->BatchNo->FormValue;
		$this->ExpDate->CurrentValue = $this->ExpDate->FormValue;
		$this->ExpDate->CurrentValue = UnFormatDateTime($this->ExpDate->CurrentValue, 7);
		$this->MFRCODE->CurrentValue = $this->MFRCODE->FormValue;
		$this->hsn->CurrentValue = $this->hsn->FormValue;
		$this->HospID->CurrentValue = $this->HospID->FormValue;
	}

	// Load recordset
	public function loadRecordset($offset = -1, $rowcnt = -1)
	{

		// Load List page SQL
		$sql = $this->getListSql();
		$conn = &$this->getConnection();

		// Load recordset
		$dbtype = GetConnectionType($this->Dbid);
		if ($this->UseSelectLimit) {
			$conn->raiseErrorFn = $GLOBALS["ERROR_FUNC"];
			if ($dbtype == "MSSQL") {
				$rs = $conn->selectLimit($sql, $rowcnt, $offset, ["_hasOrderBy" => trim($this->getOrderBy()) || trim($this->getSessionOrderBy())]);
			} else {
				$rs = $conn->selectLimit($sql, $rowcnt, $offset);
			}
			$conn->raiseErrorFn = '';
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
		$conn = &$this->getConnection();
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
		$this->ProductFrom->setDbValue($row['ProductFrom']);
		$this->Quantity->setDbValue($row['Quantity']);
		$this->FreeQty->setDbValue($row['FreeQty']);
		$this->IQ->setDbValue($row['IQ']);
		$this->MRQ->setDbValue($row['MRQ']);
		$this->BRCODE->setDbValue($row['BRCODE']);
		$this->OPNO->setDbValue($row['OPNO']);
		$this->IPNO->setDbValue($row['IPNO']);
		$this->PatientBILLNO->setDbValue($row['PatientBILLNO']);
		$this->BILLDT->setDbValue($row['BILLDT']);
		$this->GRNNO->setDbValue($row['GRNNO']);
		$this->DT->setDbValue($row['DT']);
		$this->Customername->setDbValue($row['Customername']);
		$this->createdby->setDbValue($row['createdby']);
		$this->createddatetime->setDbValue($row['createddatetime']);
		$this->modifiedby->setDbValue($row['modifiedby']);
		$this->modifieddatetime->setDbValue($row['modifieddatetime']);
		$this->BILLNO->setDbValue($row['BILLNO']);
		$this->prc->setDbValue($row['prc']);
		$this->PrName->setDbValue($row['PrName']);
		$this->BatchNo->setDbValue($row['BatchNo']);
		$this->ExpDate->setDbValue($row['ExpDate']);
		$this->MFRCODE->setDbValue($row['MFRCODE']);
		$this->hsn->setDbValue($row['hsn']);
		$this->HospID->setDbValue($row['HospID']);
	}

	// Return a row with default values
	protected function newRow()
	{
		$this->loadDefaultValues();
		$row = [];
		$row['ProductFrom'] = $this->ProductFrom->CurrentValue;
		$row['Quantity'] = $this->Quantity->CurrentValue;
		$row['FreeQty'] = $this->FreeQty->CurrentValue;
		$row['IQ'] = $this->IQ->CurrentValue;
		$row['MRQ'] = $this->MRQ->CurrentValue;
		$row['BRCODE'] = $this->BRCODE->CurrentValue;
		$row['OPNO'] = $this->OPNO->CurrentValue;
		$row['IPNO'] = $this->IPNO->CurrentValue;
		$row['PatientBILLNO'] = $this->PatientBILLNO->CurrentValue;
		$row['BILLDT'] = $this->BILLDT->CurrentValue;
		$row['GRNNO'] = $this->GRNNO->CurrentValue;
		$row['DT'] = $this->DT->CurrentValue;
		$row['Customername'] = $this->Customername->CurrentValue;
		$row['createdby'] = $this->createdby->CurrentValue;
		$row['createddatetime'] = $this->createddatetime->CurrentValue;
		$row['modifiedby'] = $this->modifiedby->CurrentValue;
		$row['modifieddatetime'] = $this->modifieddatetime->CurrentValue;
		$row['BILLNO'] = $this->BILLNO->CurrentValue;
		$row['prc'] = $this->prc->CurrentValue;
		$row['PrName'] = $this->PrName->CurrentValue;
		$row['BatchNo'] = $this->BatchNo->CurrentValue;
		$row['ExpDate'] = $this->ExpDate->CurrentValue;
		$row['MFRCODE'] = $this->MFRCODE->CurrentValue;
		$row['hsn'] = $this->hsn->CurrentValue;
		$row['HospID'] = $this->HospID->CurrentValue;
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
		$this->CopyUrl = $this->getCopyUrl();
		$this->DeleteUrl = $this->getDeleteUrl();

		// Call Row_Rendering event
		$this->Row_Rendering();

		// Common render codes for all row types
		// ProductFrom
		// Quantity
		// FreeQty
		// IQ
		// MRQ
		// BRCODE
		// OPNO
		// IPNO
		// PatientBILLNO
		// BILLDT
		// GRNNO
		// DT
		// Customername
		// createdby
		// createddatetime
		// modifiedby
		// modifieddatetime
		// BILLNO
		// prc
		// PrName
		// BatchNo
		// ExpDate
		// MFRCODE
		// hsn
		// HospID

		if ($this->RowType == ROWTYPE_VIEW) { // View row

			// ProductFrom
			$this->ProductFrom->ViewValue = $this->ProductFrom->CurrentValue;
			$curVal = strval($this->ProductFrom->CurrentValue);
			if ($curVal <> "") {
				$this->ProductFrom->ViewValue = $this->ProductFrom->lookupCacheOption($curVal);
				if ($this->ProductFrom->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
					$sqlWrk = $this->ProductFrom->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = $rswrk->fields('df');
						$this->ProductFrom->ViewValue = $this->ProductFrom->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->ProductFrom->ViewValue = $this->ProductFrom->CurrentValue;
					}
				}
			} else {
				$this->ProductFrom->ViewValue = NULL;
			}
			$this->ProductFrom->ViewCustomAttributes = "";

			// Quantity
			$this->Quantity->ViewValue = $this->Quantity->CurrentValue;
			$this->Quantity->ViewCustomAttributes = "";

			// FreeQty
			$this->FreeQty->ViewValue = $this->FreeQty->CurrentValue;
			$this->FreeQty->ViewCustomAttributes = "";

			// IQ
			$this->IQ->ViewValue = $this->IQ->CurrentValue;
			$this->IQ->ViewCustomAttributes = "";

			// MRQ
			$this->MRQ->ViewValue = $this->MRQ->CurrentValue;
			$this->MRQ->ViewCustomAttributes = "";

			// BRCODE
			$this->BRCODE->ViewValue = $this->BRCODE->CurrentValue;
			$curVal = strval($this->BRCODE->CurrentValue);
			if ($curVal <> "") {
				$this->BRCODE->ViewValue = $this->BRCODE->lookupCacheOption($curVal);
				if ($this->BRCODE->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
					$sqlWrk = $this->BRCODE->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = $rswrk->fields('df');
						$this->BRCODE->ViewValue = $this->BRCODE->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->BRCODE->ViewValue = $this->BRCODE->CurrentValue;
					}
				}
			} else {
				$this->BRCODE->ViewValue = NULL;
			}
			$this->BRCODE->ViewCustomAttributes = "";

			// OPNO
			$this->OPNO->ViewValue = $this->OPNO->CurrentValue;
			$this->OPNO->ViewCustomAttributes = "";

			// IPNO
			$this->IPNO->ViewValue = $this->IPNO->CurrentValue;
			$this->IPNO->ViewCustomAttributes = "";

			// PatientBILLNO
			$this->PatientBILLNO->ViewValue = $this->PatientBILLNO->CurrentValue;
			$this->PatientBILLNO->ViewCustomAttributes = "";

			// BILLDT
			$this->BILLDT->ViewValue = $this->BILLDT->CurrentValue;
			$this->BILLDT->ViewCustomAttributes = "";

			// GRNNO
			$this->GRNNO->ViewValue = $this->GRNNO->CurrentValue;
			$this->GRNNO->ViewCustomAttributes = "";

			// DT
			$this->DT->ViewValue = $this->DT->CurrentValue;
			$this->DT->ViewCustomAttributes = "";

			// Customername
			$this->Customername->ViewValue = $this->Customername->CurrentValue;
			$this->Customername->ViewCustomAttributes = "";

			// createdby
			$this->createdby->ViewValue = $this->createdby->CurrentValue;
			$this->createdby->ViewCustomAttributes = "";

			// createddatetime
			$this->createddatetime->ViewValue = $this->createddatetime->CurrentValue;
			$this->createddatetime->ViewValue = FormatDateTime($this->createddatetime->ViewValue, 11);
			$this->createddatetime->ViewCustomAttributes = "";

			// modifiedby
			$this->modifiedby->ViewValue = $this->modifiedby->CurrentValue;
			$this->modifiedby->ViewCustomAttributes = "";

			// modifieddatetime
			$this->modifieddatetime->ViewValue = $this->modifieddatetime->CurrentValue;
			$this->modifieddatetime->ViewValue = FormatDateTime($this->modifieddatetime->ViewValue, 11);
			$this->modifieddatetime->ViewCustomAttributes = "";

			// BILLNO
			$this->BILLNO->ViewValue = $this->BILLNO->CurrentValue;
			$this->BILLNO->ViewCustomAttributes = "";

			// prc
			$this->prc->ViewValue = $this->prc->CurrentValue;
			$this->prc->ViewCustomAttributes = "";

			// PrName
			$this->PrName->ViewValue = $this->PrName->CurrentValue;
			$this->PrName->ViewCustomAttributes = "";

			// BatchNo
			$this->BatchNo->ViewValue = $this->BatchNo->CurrentValue;
			$this->BatchNo->ViewCustomAttributes = "";

			// ExpDate
			$this->ExpDate->ViewValue = $this->ExpDate->CurrentValue;
			$this->ExpDate->ViewValue = FormatDateTime($this->ExpDate->ViewValue, 7);
			$this->ExpDate->ViewCustomAttributes = "";

			// MFRCODE
			$this->MFRCODE->ViewValue = $this->MFRCODE->CurrentValue;
			$this->MFRCODE->ViewCustomAttributes = "";

			// hsn
			$this->hsn->ViewValue = $this->hsn->CurrentValue;
			$this->hsn->ViewCustomAttributes = "";

			// HospID
			$this->HospID->ViewValue = $this->HospID->CurrentValue;
			$this->HospID->ViewValue = FormatNumber($this->HospID->ViewValue, 0, -2, -2, -2);
			$this->HospID->ViewCustomAttributes = "";

			// ProductFrom
			$this->ProductFrom->LinkCustomAttributes = "";
			$this->ProductFrom->HrefValue = "";
			$this->ProductFrom->TooltipValue = "";
			if (!$this->isExport())
				$this->ProductFrom->ViewValue = $this->highlightValue($this->ProductFrom);

			// Quantity
			$this->Quantity->LinkCustomAttributes = "";
			$this->Quantity->HrefValue = "";
			$this->Quantity->TooltipValue = "";
			if (!$this->isExport())
				$this->Quantity->ViewValue = $this->highlightValue($this->Quantity);

			// FreeQty
			$this->FreeQty->LinkCustomAttributes = "";
			$this->FreeQty->HrefValue = "";
			$this->FreeQty->TooltipValue = "";
			if (!$this->isExport())
				$this->FreeQty->ViewValue = $this->highlightValue($this->FreeQty);

			// IQ
			$this->IQ->LinkCustomAttributes = "";
			$this->IQ->HrefValue = "";
			$this->IQ->TooltipValue = "";
			if (!$this->isExport())
				$this->IQ->ViewValue = $this->highlightValue($this->IQ);

			// MRQ
			$this->MRQ->LinkCustomAttributes = "";
			$this->MRQ->HrefValue = "";
			$this->MRQ->TooltipValue = "";
			if (!$this->isExport())
				$this->MRQ->ViewValue = $this->highlightValue($this->MRQ);

			// BRCODE
			$this->BRCODE->LinkCustomAttributes = "";
			$this->BRCODE->HrefValue = "";
			$this->BRCODE->TooltipValue = "";
			if (!$this->isExport())
				$this->BRCODE->ViewValue = $this->highlightValue($this->BRCODE);

			// OPNO
			$this->OPNO->LinkCustomAttributes = "";
			$this->OPNO->HrefValue = "";
			$this->OPNO->TooltipValue = "";
			if (!$this->isExport())
				$this->OPNO->ViewValue = $this->highlightValue($this->OPNO);

			// IPNO
			$this->IPNO->LinkCustomAttributes = "";
			$this->IPNO->HrefValue = "";
			$this->IPNO->TooltipValue = "";
			if (!$this->isExport())
				$this->IPNO->ViewValue = $this->highlightValue($this->IPNO);

			// PatientBILLNO
			$this->PatientBILLNO->LinkCustomAttributes = "";
			$this->PatientBILLNO->HrefValue = "";
			$this->PatientBILLNO->TooltipValue = "";
			if (!$this->isExport())
				$this->PatientBILLNO->ViewValue = $this->highlightValue($this->PatientBILLNO);

			// BILLDT
			$this->BILLDT->LinkCustomAttributes = "";
			$this->BILLDT->HrefValue = "";
			$this->BILLDT->TooltipValue = "";
			if (!$this->isExport())
				$this->BILLDT->ViewValue = $this->highlightValue($this->BILLDT);

			// GRNNO
			$this->GRNNO->LinkCustomAttributes = "";
			$this->GRNNO->HrefValue = "";
			$this->GRNNO->TooltipValue = "";
			if (!$this->isExport())
				$this->GRNNO->ViewValue = $this->highlightValue($this->GRNNO);

			// DT
			$this->DT->LinkCustomAttributes = "";
			$this->DT->HrefValue = "";
			$this->DT->TooltipValue = "";
			if (!$this->isExport())
				$this->DT->ViewValue = $this->highlightValue($this->DT);

			// Customername
			$this->Customername->LinkCustomAttributes = "";
			$this->Customername->HrefValue = "";
			$this->Customername->TooltipValue = "";
			if (!$this->isExport())
				$this->Customername->ViewValue = $this->highlightValue($this->Customername);

			// createdby
			$this->createdby->LinkCustomAttributes = "";
			$this->createdby->HrefValue = "";
			$this->createdby->TooltipValue = "";
			if (!$this->isExport())
				$this->createdby->ViewValue = $this->highlightValue($this->createdby);

			// createddatetime
			$this->createddatetime->LinkCustomAttributes = "";
			$this->createddatetime->HrefValue = "";
			$this->createddatetime->TooltipValue = "";

			// modifiedby
			$this->modifiedby->LinkCustomAttributes = "";
			$this->modifiedby->HrefValue = "";
			$this->modifiedby->TooltipValue = "";
			if (!$this->isExport())
				$this->modifiedby->ViewValue = $this->highlightValue($this->modifiedby);

			// modifieddatetime
			$this->modifieddatetime->LinkCustomAttributes = "";
			$this->modifieddatetime->HrefValue = "";
			$this->modifieddatetime->TooltipValue = "";

			// BILLNO
			$this->BILLNO->LinkCustomAttributes = "";
			$this->BILLNO->HrefValue = "";
			$this->BILLNO->TooltipValue = "";
			if (!$this->isExport())
				$this->BILLNO->ViewValue = $this->highlightValue($this->BILLNO);

			// prc
			$this->prc->LinkCustomAttributes = "";
			$this->prc->HrefValue = "";
			$this->prc->TooltipValue = "";
			if (!$this->isExport())
				$this->prc->ViewValue = $this->highlightValue($this->prc);

			// PrName
			$this->PrName->LinkCustomAttributes = "";
			$this->PrName->HrefValue = "";
			$this->PrName->TooltipValue = "";
			if (!$this->isExport())
				$this->PrName->ViewValue = $this->highlightValue($this->PrName);

			// BatchNo
			$this->BatchNo->LinkCustomAttributes = "";
			$this->BatchNo->HrefValue = "";
			$this->BatchNo->TooltipValue = "";
			if (!$this->isExport())
				$this->BatchNo->ViewValue = $this->highlightValue($this->BatchNo);

			// ExpDate
			$this->ExpDate->LinkCustomAttributes = "";
			$this->ExpDate->HrefValue = "";
			$this->ExpDate->TooltipValue = "";

			// MFRCODE
			$this->MFRCODE->LinkCustomAttributes = "";
			$this->MFRCODE->HrefValue = "";
			$this->MFRCODE->TooltipValue = "";
			if (!$this->isExport())
				$this->MFRCODE->ViewValue = $this->highlightValue($this->MFRCODE);

			// hsn
			$this->hsn->LinkCustomAttributes = "";
			$this->hsn->HrefValue = "";
			$this->hsn->TooltipValue = "";
			if (!$this->isExport())
				$this->hsn->ViewValue = $this->highlightValue($this->hsn);

			// HospID
			$this->HospID->LinkCustomAttributes = "";
			$this->HospID->HrefValue = "";
			$this->HospID->TooltipValue = "";
		} elseif ($this->RowType == ROWTYPE_ADD) { // Add row

			// ProductFrom
			$this->ProductFrom->EditAttrs["class"] = "form-control";
			$this->ProductFrom->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->ProductFrom->CurrentValue = HtmlDecode($this->ProductFrom->CurrentValue);
			$this->ProductFrom->EditValue = HtmlEncode($this->ProductFrom->CurrentValue);
			$curVal = strval($this->ProductFrom->CurrentValue);
			if ($curVal <> "") {
				$this->ProductFrom->EditValue = $this->ProductFrom->lookupCacheOption($curVal);
				if ($this->ProductFrom->EditValue === NULL) { // Lookup from database
					$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
					$sqlWrk = $this->ProductFrom->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = HtmlEncode($rswrk->fields('df'));
						$this->ProductFrom->EditValue = $this->ProductFrom->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->ProductFrom->EditValue = HtmlEncode($this->ProductFrom->CurrentValue);
					}
				}
			} else {
				$this->ProductFrom->EditValue = NULL;
			}
			$this->ProductFrom->PlaceHolder = RemoveHtml($this->ProductFrom->caption());

			// Quantity
			$this->Quantity->EditAttrs["class"] = "form-control";
			$this->Quantity->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Quantity->CurrentValue = HtmlDecode($this->Quantity->CurrentValue);
			$this->Quantity->EditValue = HtmlEncode($this->Quantity->CurrentValue);
			$this->Quantity->PlaceHolder = RemoveHtml($this->Quantity->caption());

			// FreeQty
			$this->FreeQty->EditAttrs["class"] = "form-control";
			$this->FreeQty->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->FreeQty->CurrentValue = HtmlDecode($this->FreeQty->CurrentValue);
			$this->FreeQty->EditValue = HtmlEncode($this->FreeQty->CurrentValue);
			$this->FreeQty->PlaceHolder = RemoveHtml($this->FreeQty->caption());

			// IQ
			$this->IQ->EditAttrs["class"] = "form-control";
			$this->IQ->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->IQ->CurrentValue = HtmlDecode($this->IQ->CurrentValue);
			$this->IQ->EditValue = HtmlEncode($this->IQ->CurrentValue);
			$this->IQ->PlaceHolder = RemoveHtml($this->IQ->caption());

			// MRQ
			$this->MRQ->EditAttrs["class"] = "form-control";
			$this->MRQ->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->MRQ->CurrentValue = HtmlDecode($this->MRQ->CurrentValue);
			$this->MRQ->EditValue = HtmlEncode($this->MRQ->CurrentValue);
			$this->MRQ->PlaceHolder = RemoveHtml($this->MRQ->caption());

			// BRCODE
			$this->BRCODE->EditAttrs["class"] = "form-control";
			$this->BRCODE->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->BRCODE->CurrentValue = HtmlDecode($this->BRCODE->CurrentValue);
			$this->BRCODE->EditValue = HtmlEncode($this->BRCODE->CurrentValue);
			$curVal = strval($this->BRCODE->CurrentValue);
			if ($curVal <> "") {
				$this->BRCODE->EditValue = $this->BRCODE->lookupCacheOption($curVal);
				if ($this->BRCODE->EditValue === NULL) { // Lookup from database
					$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
					$sqlWrk = $this->BRCODE->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = HtmlEncode($rswrk->fields('df'));
						$this->BRCODE->EditValue = $this->BRCODE->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->BRCODE->EditValue = HtmlEncode($this->BRCODE->CurrentValue);
					}
				}
			} else {
				$this->BRCODE->EditValue = NULL;
			}
			$this->BRCODE->PlaceHolder = RemoveHtml($this->BRCODE->caption());

			// OPNO
			$this->OPNO->EditAttrs["class"] = "form-control";
			$this->OPNO->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->OPNO->CurrentValue = HtmlDecode($this->OPNO->CurrentValue);
			$this->OPNO->EditValue = HtmlEncode($this->OPNO->CurrentValue);
			$this->OPNO->PlaceHolder = RemoveHtml($this->OPNO->caption());

			// IPNO
			$this->IPNO->EditAttrs["class"] = "form-control";
			$this->IPNO->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->IPNO->CurrentValue = HtmlDecode($this->IPNO->CurrentValue);
			$this->IPNO->EditValue = HtmlEncode($this->IPNO->CurrentValue);
			$this->IPNO->PlaceHolder = RemoveHtml($this->IPNO->caption());

			// PatientBILLNO
			$this->PatientBILLNO->EditAttrs["class"] = "form-control";
			$this->PatientBILLNO->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->PatientBILLNO->CurrentValue = HtmlDecode($this->PatientBILLNO->CurrentValue);
			$this->PatientBILLNO->EditValue = HtmlEncode($this->PatientBILLNO->CurrentValue);
			$this->PatientBILLNO->PlaceHolder = RemoveHtml($this->PatientBILLNO->caption());

			// BILLDT
			$this->BILLDT->EditAttrs["class"] = "form-control";
			$this->BILLDT->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->BILLDT->CurrentValue = HtmlDecode($this->BILLDT->CurrentValue);
			$this->BILLDT->EditValue = HtmlEncode($this->BILLDT->CurrentValue);
			$this->BILLDT->PlaceHolder = RemoveHtml($this->BILLDT->caption());

			// GRNNO
			$this->GRNNO->EditAttrs["class"] = "form-control";
			$this->GRNNO->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->GRNNO->CurrentValue = HtmlDecode($this->GRNNO->CurrentValue);
			$this->GRNNO->EditValue = HtmlEncode($this->GRNNO->CurrentValue);
			$this->GRNNO->PlaceHolder = RemoveHtml($this->GRNNO->caption());

			// DT
			$this->DT->EditAttrs["class"] = "form-control";
			$this->DT->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->DT->CurrentValue = HtmlDecode($this->DT->CurrentValue);
			$this->DT->EditValue = HtmlEncode($this->DT->CurrentValue);
			$this->DT->PlaceHolder = RemoveHtml($this->DT->caption());

			// Customername
			$this->Customername->EditAttrs["class"] = "form-control";
			$this->Customername->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Customername->CurrentValue = HtmlDecode($this->Customername->CurrentValue);
			$this->Customername->EditValue = HtmlEncode($this->Customername->CurrentValue);
			$this->Customername->PlaceHolder = RemoveHtml($this->Customername->caption());

			// createdby
			$this->createdby->EditAttrs["class"] = "form-control";
			$this->createdby->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->createdby->CurrentValue = HtmlDecode($this->createdby->CurrentValue);
			$this->createdby->EditValue = HtmlEncode($this->createdby->CurrentValue);
			$this->createdby->PlaceHolder = RemoveHtml($this->createdby->caption());

			// createddatetime
			$this->createddatetime->EditAttrs["class"] = "form-control";
			$this->createddatetime->EditCustomAttributes = "";
			$this->createddatetime->EditValue = HtmlEncode(FormatDateTime($this->createddatetime->CurrentValue, 11));
			$this->createddatetime->PlaceHolder = RemoveHtml($this->createddatetime->caption());

			// modifiedby
			$this->modifiedby->EditAttrs["class"] = "form-control";
			$this->modifiedby->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->modifiedby->CurrentValue = HtmlDecode($this->modifiedby->CurrentValue);
			$this->modifiedby->EditValue = HtmlEncode($this->modifiedby->CurrentValue);
			$this->modifiedby->PlaceHolder = RemoveHtml($this->modifiedby->caption());

			// modifieddatetime
			$this->modifieddatetime->EditAttrs["class"] = "form-control";
			$this->modifieddatetime->EditCustomAttributes = "";
			$this->modifieddatetime->EditValue = HtmlEncode(FormatDateTime($this->modifieddatetime->CurrentValue, 11));
			$this->modifieddatetime->PlaceHolder = RemoveHtml($this->modifieddatetime->caption());

			// BILLNO
			$this->BILLNO->EditAttrs["class"] = "form-control";
			$this->BILLNO->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->BILLNO->CurrentValue = HtmlDecode($this->BILLNO->CurrentValue);
			$this->BILLNO->EditValue = HtmlEncode($this->BILLNO->CurrentValue);
			$this->BILLNO->PlaceHolder = RemoveHtml($this->BILLNO->caption());

			// prc
			$this->prc->EditAttrs["class"] = "form-control";
			$this->prc->EditCustomAttributes = "";
			if ($this->prc->getSessionValue() <> "") {
				$this->prc->CurrentValue = $this->prc->getSessionValue();
				$this->prc->OldValue = $this->prc->CurrentValue;
			$this->prc->ViewValue = $this->prc->CurrentValue;
			$this->prc->ViewCustomAttributes = "";
			} else {
			if (REMOVE_XSS)
				$this->prc->CurrentValue = HtmlDecode($this->prc->CurrentValue);
			$this->prc->EditValue = HtmlEncode($this->prc->CurrentValue);
			$this->prc->PlaceHolder = RemoveHtml($this->prc->caption());
			}

			// PrName
			$this->PrName->EditAttrs["class"] = "form-control";
			$this->PrName->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->PrName->CurrentValue = HtmlDecode($this->PrName->CurrentValue);
			$this->PrName->EditValue = HtmlEncode($this->PrName->CurrentValue);
			$this->PrName->PlaceHolder = RemoveHtml($this->PrName->caption());

			// BatchNo
			$this->BatchNo->EditAttrs["class"] = "form-control";
			$this->BatchNo->EditCustomAttributes = "";
			if ($this->BatchNo->getSessionValue() <> "") {
				$this->BatchNo->CurrentValue = $this->BatchNo->getSessionValue();
				$this->BatchNo->OldValue = $this->BatchNo->CurrentValue;
			$this->BatchNo->ViewValue = $this->BatchNo->CurrentValue;
			$this->BatchNo->ViewCustomAttributes = "";
			} else {
			if (REMOVE_XSS)
				$this->BatchNo->CurrentValue = HtmlDecode($this->BatchNo->CurrentValue);
			$this->BatchNo->EditValue = HtmlEncode($this->BatchNo->CurrentValue);
			$this->BatchNo->PlaceHolder = RemoveHtml($this->BatchNo->caption());
			}

			// ExpDate
			$this->ExpDate->EditAttrs["class"] = "form-control";
			$this->ExpDate->EditCustomAttributes = "";
			$this->ExpDate->EditValue = HtmlEncode(FormatDateTime($this->ExpDate->CurrentValue, 7));
			$this->ExpDate->PlaceHolder = RemoveHtml($this->ExpDate->caption());

			// MFRCODE
			$this->MFRCODE->EditAttrs["class"] = "form-control";
			$this->MFRCODE->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->MFRCODE->CurrentValue = HtmlDecode($this->MFRCODE->CurrentValue);
			$this->MFRCODE->EditValue = HtmlEncode($this->MFRCODE->CurrentValue);
			$this->MFRCODE->PlaceHolder = RemoveHtml($this->MFRCODE->caption());

			// hsn
			$this->hsn->EditAttrs["class"] = "form-control";
			$this->hsn->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->hsn->CurrentValue = HtmlDecode($this->hsn->CurrentValue);
			$this->hsn->EditValue = HtmlEncode($this->hsn->CurrentValue);
			$this->hsn->PlaceHolder = RemoveHtml($this->hsn->caption());

			// HospID
			// Add refer script
			// ProductFrom

			$this->ProductFrom->LinkCustomAttributes = "";
			$this->ProductFrom->HrefValue = "";

			// Quantity
			$this->Quantity->LinkCustomAttributes = "";
			$this->Quantity->HrefValue = "";

			// FreeQty
			$this->FreeQty->LinkCustomAttributes = "";
			$this->FreeQty->HrefValue = "";

			// IQ
			$this->IQ->LinkCustomAttributes = "";
			$this->IQ->HrefValue = "";

			// MRQ
			$this->MRQ->LinkCustomAttributes = "";
			$this->MRQ->HrefValue = "";

			// BRCODE
			$this->BRCODE->LinkCustomAttributes = "";
			$this->BRCODE->HrefValue = "";

			// OPNO
			$this->OPNO->LinkCustomAttributes = "";
			$this->OPNO->HrefValue = "";

			// IPNO
			$this->IPNO->LinkCustomAttributes = "";
			$this->IPNO->HrefValue = "";

			// PatientBILLNO
			$this->PatientBILLNO->LinkCustomAttributes = "";
			$this->PatientBILLNO->HrefValue = "";

			// BILLDT
			$this->BILLDT->LinkCustomAttributes = "";
			$this->BILLDT->HrefValue = "";

			// GRNNO
			$this->GRNNO->LinkCustomAttributes = "";
			$this->GRNNO->HrefValue = "";

			// DT
			$this->DT->LinkCustomAttributes = "";
			$this->DT->HrefValue = "";

			// Customername
			$this->Customername->LinkCustomAttributes = "";
			$this->Customername->HrefValue = "";

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

			// BILLNO
			$this->BILLNO->LinkCustomAttributes = "";
			$this->BILLNO->HrefValue = "";

			// prc
			$this->prc->LinkCustomAttributes = "";
			$this->prc->HrefValue = "";

			// PrName
			$this->PrName->LinkCustomAttributes = "";
			$this->PrName->HrefValue = "";

			// BatchNo
			$this->BatchNo->LinkCustomAttributes = "";
			$this->BatchNo->HrefValue = "";

			// ExpDate
			$this->ExpDate->LinkCustomAttributes = "";
			$this->ExpDate->HrefValue = "";

			// MFRCODE
			$this->MFRCODE->LinkCustomAttributes = "";
			$this->MFRCODE->HrefValue = "";

			// hsn
			$this->hsn->LinkCustomAttributes = "";
			$this->hsn->HrefValue = "";

			// HospID
			$this->HospID->LinkCustomAttributes = "";
			$this->HospID->HrefValue = "";
		} elseif ($this->RowType == ROWTYPE_EDIT) { // Edit row

			// ProductFrom
			$this->ProductFrom->EditAttrs["class"] = "form-control";
			$this->ProductFrom->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->ProductFrom->CurrentValue = HtmlDecode($this->ProductFrom->CurrentValue);
			$this->ProductFrom->EditValue = HtmlEncode($this->ProductFrom->CurrentValue);
			$curVal = strval($this->ProductFrom->CurrentValue);
			if ($curVal <> "") {
				$this->ProductFrom->EditValue = $this->ProductFrom->lookupCacheOption($curVal);
				if ($this->ProductFrom->EditValue === NULL) { // Lookup from database
					$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
					$sqlWrk = $this->ProductFrom->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = HtmlEncode($rswrk->fields('df'));
						$this->ProductFrom->EditValue = $this->ProductFrom->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->ProductFrom->EditValue = HtmlEncode($this->ProductFrom->CurrentValue);
					}
				}
			} else {
				$this->ProductFrom->EditValue = NULL;
			}
			$this->ProductFrom->PlaceHolder = RemoveHtml($this->ProductFrom->caption());

			// Quantity
			$this->Quantity->EditAttrs["class"] = "form-control";
			$this->Quantity->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Quantity->CurrentValue = HtmlDecode($this->Quantity->CurrentValue);
			$this->Quantity->EditValue = HtmlEncode($this->Quantity->CurrentValue);
			$this->Quantity->PlaceHolder = RemoveHtml($this->Quantity->caption());

			// FreeQty
			$this->FreeQty->EditAttrs["class"] = "form-control";
			$this->FreeQty->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->FreeQty->CurrentValue = HtmlDecode($this->FreeQty->CurrentValue);
			$this->FreeQty->EditValue = HtmlEncode($this->FreeQty->CurrentValue);
			$this->FreeQty->PlaceHolder = RemoveHtml($this->FreeQty->caption());

			// IQ
			$this->IQ->EditAttrs["class"] = "form-control";
			$this->IQ->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->IQ->CurrentValue = HtmlDecode($this->IQ->CurrentValue);
			$this->IQ->EditValue = HtmlEncode($this->IQ->CurrentValue);
			$this->IQ->PlaceHolder = RemoveHtml($this->IQ->caption());

			// MRQ
			$this->MRQ->EditAttrs["class"] = "form-control";
			$this->MRQ->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->MRQ->CurrentValue = HtmlDecode($this->MRQ->CurrentValue);
			$this->MRQ->EditValue = HtmlEncode($this->MRQ->CurrentValue);
			$this->MRQ->PlaceHolder = RemoveHtml($this->MRQ->caption());

			// BRCODE
			$this->BRCODE->EditAttrs["class"] = "form-control";
			$this->BRCODE->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->BRCODE->CurrentValue = HtmlDecode($this->BRCODE->CurrentValue);
			$this->BRCODE->EditValue = HtmlEncode($this->BRCODE->CurrentValue);
			$curVal = strval($this->BRCODE->CurrentValue);
			if ($curVal <> "") {
				$this->BRCODE->EditValue = $this->BRCODE->lookupCacheOption($curVal);
				if ($this->BRCODE->EditValue === NULL) { // Lookup from database
					$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
					$sqlWrk = $this->BRCODE->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = HtmlEncode($rswrk->fields('df'));
						$this->BRCODE->EditValue = $this->BRCODE->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->BRCODE->EditValue = HtmlEncode($this->BRCODE->CurrentValue);
					}
				}
			} else {
				$this->BRCODE->EditValue = NULL;
			}
			$this->BRCODE->PlaceHolder = RemoveHtml($this->BRCODE->caption());

			// OPNO
			$this->OPNO->EditAttrs["class"] = "form-control";
			$this->OPNO->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->OPNO->CurrentValue = HtmlDecode($this->OPNO->CurrentValue);
			$this->OPNO->EditValue = HtmlEncode($this->OPNO->CurrentValue);
			$this->OPNO->PlaceHolder = RemoveHtml($this->OPNO->caption());

			// IPNO
			$this->IPNO->EditAttrs["class"] = "form-control";
			$this->IPNO->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->IPNO->CurrentValue = HtmlDecode($this->IPNO->CurrentValue);
			$this->IPNO->EditValue = HtmlEncode($this->IPNO->CurrentValue);
			$this->IPNO->PlaceHolder = RemoveHtml($this->IPNO->caption());

			// PatientBILLNO
			$this->PatientBILLNO->EditAttrs["class"] = "form-control";
			$this->PatientBILLNO->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->PatientBILLNO->CurrentValue = HtmlDecode($this->PatientBILLNO->CurrentValue);
			$this->PatientBILLNO->EditValue = HtmlEncode($this->PatientBILLNO->CurrentValue);
			$this->PatientBILLNO->PlaceHolder = RemoveHtml($this->PatientBILLNO->caption());

			// BILLDT
			$this->BILLDT->EditAttrs["class"] = "form-control";
			$this->BILLDT->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->BILLDT->CurrentValue = HtmlDecode($this->BILLDT->CurrentValue);
			$this->BILLDT->EditValue = HtmlEncode($this->BILLDT->CurrentValue);
			$this->BILLDT->PlaceHolder = RemoveHtml($this->BILLDT->caption());

			// GRNNO
			$this->GRNNO->EditAttrs["class"] = "form-control";
			$this->GRNNO->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->GRNNO->CurrentValue = HtmlDecode($this->GRNNO->CurrentValue);
			$this->GRNNO->EditValue = HtmlEncode($this->GRNNO->CurrentValue);
			$this->GRNNO->PlaceHolder = RemoveHtml($this->GRNNO->caption());

			// DT
			$this->DT->EditAttrs["class"] = "form-control";
			$this->DT->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->DT->CurrentValue = HtmlDecode($this->DT->CurrentValue);
			$this->DT->EditValue = HtmlEncode($this->DT->CurrentValue);
			$this->DT->PlaceHolder = RemoveHtml($this->DT->caption());

			// Customername
			$this->Customername->EditAttrs["class"] = "form-control";
			$this->Customername->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Customername->CurrentValue = HtmlDecode($this->Customername->CurrentValue);
			$this->Customername->EditValue = HtmlEncode($this->Customername->CurrentValue);
			$this->Customername->PlaceHolder = RemoveHtml($this->Customername->caption());

			// createdby
			$this->createdby->EditAttrs["class"] = "form-control";
			$this->createdby->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->createdby->CurrentValue = HtmlDecode($this->createdby->CurrentValue);
			$this->createdby->EditValue = HtmlEncode($this->createdby->CurrentValue);
			$this->createdby->PlaceHolder = RemoveHtml($this->createdby->caption());

			// createddatetime
			$this->createddatetime->EditAttrs["class"] = "form-control";
			$this->createddatetime->EditCustomAttributes = "";
			$this->createddatetime->EditValue = HtmlEncode(FormatDateTime($this->createddatetime->CurrentValue, 11));
			$this->createddatetime->PlaceHolder = RemoveHtml($this->createddatetime->caption());

			// modifiedby
			$this->modifiedby->EditAttrs["class"] = "form-control";
			$this->modifiedby->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->modifiedby->CurrentValue = HtmlDecode($this->modifiedby->CurrentValue);
			$this->modifiedby->EditValue = HtmlEncode($this->modifiedby->CurrentValue);
			$this->modifiedby->PlaceHolder = RemoveHtml($this->modifiedby->caption());

			// modifieddatetime
			$this->modifieddatetime->EditAttrs["class"] = "form-control";
			$this->modifieddatetime->EditCustomAttributes = "";
			$this->modifieddatetime->EditValue = HtmlEncode(FormatDateTime($this->modifieddatetime->CurrentValue, 11));
			$this->modifieddatetime->PlaceHolder = RemoveHtml($this->modifieddatetime->caption());

			// BILLNO
			$this->BILLNO->EditAttrs["class"] = "form-control";
			$this->BILLNO->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->BILLNO->CurrentValue = HtmlDecode($this->BILLNO->CurrentValue);
			$this->BILLNO->EditValue = HtmlEncode($this->BILLNO->CurrentValue);
			$this->BILLNO->PlaceHolder = RemoveHtml($this->BILLNO->caption());

			// prc
			$this->prc->EditAttrs["class"] = "form-control";
			$this->prc->EditCustomAttributes = "";
			if ($this->prc->getSessionValue() <> "") {
				$this->prc->CurrentValue = $this->prc->getSessionValue();
				$this->prc->OldValue = $this->prc->CurrentValue;
			$this->prc->ViewValue = $this->prc->CurrentValue;
			$this->prc->ViewCustomAttributes = "";
			} else {
			if (REMOVE_XSS)
				$this->prc->CurrentValue = HtmlDecode($this->prc->CurrentValue);
			$this->prc->EditValue = HtmlEncode($this->prc->CurrentValue);
			$this->prc->PlaceHolder = RemoveHtml($this->prc->caption());
			}

			// PrName
			$this->PrName->EditAttrs["class"] = "form-control";
			$this->PrName->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->PrName->CurrentValue = HtmlDecode($this->PrName->CurrentValue);
			$this->PrName->EditValue = HtmlEncode($this->PrName->CurrentValue);
			$this->PrName->PlaceHolder = RemoveHtml($this->PrName->caption());

			// BatchNo
			$this->BatchNo->EditAttrs["class"] = "form-control";
			$this->BatchNo->EditCustomAttributes = "";
			if ($this->BatchNo->getSessionValue() <> "") {
				$this->BatchNo->CurrentValue = $this->BatchNo->getSessionValue();
				$this->BatchNo->OldValue = $this->BatchNo->CurrentValue;
			$this->BatchNo->ViewValue = $this->BatchNo->CurrentValue;
			$this->BatchNo->ViewCustomAttributes = "";
			} else {
			if (REMOVE_XSS)
				$this->BatchNo->CurrentValue = HtmlDecode($this->BatchNo->CurrentValue);
			$this->BatchNo->EditValue = HtmlEncode($this->BatchNo->CurrentValue);
			$this->BatchNo->PlaceHolder = RemoveHtml($this->BatchNo->caption());
			}

			// ExpDate
			$this->ExpDate->EditAttrs["class"] = "form-control";
			$this->ExpDate->EditCustomAttributes = "";
			$this->ExpDate->EditValue = HtmlEncode(FormatDateTime($this->ExpDate->CurrentValue, 7));
			$this->ExpDate->PlaceHolder = RemoveHtml($this->ExpDate->caption());

			// MFRCODE
			$this->MFRCODE->EditAttrs["class"] = "form-control";
			$this->MFRCODE->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->MFRCODE->CurrentValue = HtmlDecode($this->MFRCODE->CurrentValue);
			$this->MFRCODE->EditValue = HtmlEncode($this->MFRCODE->CurrentValue);
			$this->MFRCODE->PlaceHolder = RemoveHtml($this->MFRCODE->caption());

			// hsn
			$this->hsn->EditAttrs["class"] = "form-control";
			$this->hsn->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->hsn->CurrentValue = HtmlDecode($this->hsn->CurrentValue);
			$this->hsn->EditValue = HtmlEncode($this->hsn->CurrentValue);
			$this->hsn->PlaceHolder = RemoveHtml($this->hsn->caption());

			// HospID
			// Edit refer script
			// ProductFrom

			$this->ProductFrom->LinkCustomAttributes = "";
			$this->ProductFrom->HrefValue = "";

			// Quantity
			$this->Quantity->LinkCustomAttributes = "";
			$this->Quantity->HrefValue = "";

			// FreeQty
			$this->FreeQty->LinkCustomAttributes = "";
			$this->FreeQty->HrefValue = "";

			// IQ
			$this->IQ->LinkCustomAttributes = "";
			$this->IQ->HrefValue = "";

			// MRQ
			$this->MRQ->LinkCustomAttributes = "";
			$this->MRQ->HrefValue = "";

			// BRCODE
			$this->BRCODE->LinkCustomAttributes = "";
			$this->BRCODE->HrefValue = "";

			// OPNO
			$this->OPNO->LinkCustomAttributes = "";
			$this->OPNO->HrefValue = "";

			// IPNO
			$this->IPNO->LinkCustomAttributes = "";
			$this->IPNO->HrefValue = "";

			// PatientBILLNO
			$this->PatientBILLNO->LinkCustomAttributes = "";
			$this->PatientBILLNO->HrefValue = "";

			// BILLDT
			$this->BILLDT->LinkCustomAttributes = "";
			$this->BILLDT->HrefValue = "";

			// GRNNO
			$this->GRNNO->LinkCustomAttributes = "";
			$this->GRNNO->HrefValue = "";

			// DT
			$this->DT->LinkCustomAttributes = "";
			$this->DT->HrefValue = "";

			// Customername
			$this->Customername->LinkCustomAttributes = "";
			$this->Customername->HrefValue = "";

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

			// BILLNO
			$this->BILLNO->LinkCustomAttributes = "";
			$this->BILLNO->HrefValue = "";

			// prc
			$this->prc->LinkCustomAttributes = "";
			$this->prc->HrefValue = "";

			// PrName
			$this->PrName->LinkCustomAttributes = "";
			$this->PrName->HrefValue = "";

			// BatchNo
			$this->BatchNo->LinkCustomAttributes = "";
			$this->BatchNo->HrefValue = "";

			// ExpDate
			$this->ExpDate->LinkCustomAttributes = "";
			$this->ExpDate->HrefValue = "";

			// MFRCODE
			$this->MFRCODE->LinkCustomAttributes = "";
			$this->MFRCODE->HrefValue = "";

			// hsn
			$this->hsn->LinkCustomAttributes = "";
			$this->hsn->HrefValue = "";

			// HospID
			$this->HospID->LinkCustomAttributes = "";
			$this->HospID->HrefValue = "";
		}
		if ($this->RowType == ROWTYPE_ADD || $this->RowType == ROWTYPE_EDIT || $this->RowType == ROWTYPE_SEARCH) // Add/Edit/Search row
			$this->setupFieldTitles();

		// Call Row Rendered event
		if ($this->RowType <> ROWTYPE_AGGREGATEINIT)
			$this->Row_Rendered();
	}

	// Validate form
	protected function validateForm()
	{
		global $Language, $FormError;

		// Check if validation required
		if (!SERVER_VALIDATE)
			return ($FormError == "");
		if ($this->ProductFrom->Required) {
			if (!$this->ProductFrom->IsDetailKey && $this->ProductFrom->FormValue != NULL && $this->ProductFrom->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->ProductFrom->caption(), $this->ProductFrom->RequiredErrorMessage));
			}
		}
		if ($this->Quantity->Required) {
			if (!$this->Quantity->IsDetailKey && $this->Quantity->FormValue != NULL && $this->Quantity->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Quantity->caption(), $this->Quantity->RequiredErrorMessage));
			}
		}
		if ($this->FreeQty->Required) {
			if (!$this->FreeQty->IsDetailKey && $this->FreeQty->FormValue != NULL && $this->FreeQty->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->FreeQty->caption(), $this->FreeQty->RequiredErrorMessage));
			}
		}
		if ($this->IQ->Required) {
			if (!$this->IQ->IsDetailKey && $this->IQ->FormValue != NULL && $this->IQ->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->IQ->caption(), $this->IQ->RequiredErrorMessage));
			}
		}
		if ($this->MRQ->Required) {
			if (!$this->MRQ->IsDetailKey && $this->MRQ->FormValue != NULL && $this->MRQ->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->MRQ->caption(), $this->MRQ->RequiredErrorMessage));
			}
		}
		if ($this->BRCODE->Required) {
			if (!$this->BRCODE->IsDetailKey && $this->BRCODE->FormValue != NULL && $this->BRCODE->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->BRCODE->caption(), $this->BRCODE->RequiredErrorMessage));
			}
		}
		if ($this->OPNO->Required) {
			if (!$this->OPNO->IsDetailKey && $this->OPNO->FormValue != NULL && $this->OPNO->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->OPNO->caption(), $this->OPNO->RequiredErrorMessage));
			}
		}
		if ($this->IPNO->Required) {
			if (!$this->IPNO->IsDetailKey && $this->IPNO->FormValue != NULL && $this->IPNO->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->IPNO->caption(), $this->IPNO->RequiredErrorMessage));
			}
		}
		if ($this->PatientBILLNO->Required) {
			if (!$this->PatientBILLNO->IsDetailKey && $this->PatientBILLNO->FormValue != NULL && $this->PatientBILLNO->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PatientBILLNO->caption(), $this->PatientBILLNO->RequiredErrorMessage));
			}
		}
		if ($this->BILLDT->Required) {
			if (!$this->BILLDT->IsDetailKey && $this->BILLDT->FormValue != NULL && $this->BILLDT->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->BILLDT->caption(), $this->BILLDT->RequiredErrorMessage));
			}
		}
		if ($this->GRNNO->Required) {
			if (!$this->GRNNO->IsDetailKey && $this->GRNNO->FormValue != NULL && $this->GRNNO->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->GRNNO->caption(), $this->GRNNO->RequiredErrorMessage));
			}
		}
		if ($this->DT->Required) {
			if (!$this->DT->IsDetailKey && $this->DT->FormValue != NULL && $this->DT->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->DT->caption(), $this->DT->RequiredErrorMessage));
			}
		}
		if ($this->Customername->Required) {
			if (!$this->Customername->IsDetailKey && $this->Customername->FormValue != NULL && $this->Customername->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Customername->caption(), $this->Customername->RequiredErrorMessage));
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
		if (!CheckEuroDate($this->createddatetime->FormValue)) {
			AddMessage($FormError, $this->createddatetime->errorMessage());
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
		if (!CheckEuroDate($this->modifieddatetime->FormValue)) {
			AddMessage($FormError, $this->modifieddatetime->errorMessage());
		}
		if ($this->BILLNO->Required) {
			if (!$this->BILLNO->IsDetailKey && $this->BILLNO->FormValue != NULL && $this->BILLNO->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->BILLNO->caption(), $this->BILLNO->RequiredErrorMessage));
			}
		}
		if ($this->prc->Required) {
			if (!$this->prc->IsDetailKey && $this->prc->FormValue != NULL && $this->prc->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->prc->caption(), $this->prc->RequiredErrorMessage));
			}
		}
		if ($this->PrName->Required) {
			if (!$this->PrName->IsDetailKey && $this->PrName->FormValue != NULL && $this->PrName->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PrName->caption(), $this->PrName->RequiredErrorMessage));
			}
		}
		if ($this->BatchNo->Required) {
			if (!$this->BatchNo->IsDetailKey && $this->BatchNo->FormValue != NULL && $this->BatchNo->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->BatchNo->caption(), $this->BatchNo->RequiredErrorMessage));
			}
		}
		if ($this->ExpDate->Required) {
			if (!$this->ExpDate->IsDetailKey && $this->ExpDate->FormValue != NULL && $this->ExpDate->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->ExpDate->caption(), $this->ExpDate->RequiredErrorMessage));
			}
		}
		if (!CheckEuroDate($this->ExpDate->FormValue)) {
			AddMessage($FormError, $this->ExpDate->errorMessage());
		}
		if ($this->MFRCODE->Required) {
			if (!$this->MFRCODE->IsDetailKey && $this->MFRCODE->FormValue != NULL && $this->MFRCODE->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->MFRCODE->caption(), $this->MFRCODE->RequiredErrorMessage));
			}
		}
		if ($this->hsn->Required) {
			if (!$this->hsn->IsDetailKey && $this->hsn->FormValue != NULL && $this->hsn->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->hsn->caption(), $this->hsn->RequiredErrorMessage));
			}
		}
		if ($this->HospID->Required) {
			if (!$this->HospID->IsDetailKey && $this->HospID->FormValue != NULL && $this->HospID->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->HospID->caption(), $this->HospID->RequiredErrorMessage));
			}
		}

		// Return validate result
		$validateForm = ($FormError == "");

		// Call Form_CustomValidate event
		$formCustomError = "";
		$validateForm = $validateForm && $this->Form_CustomValidate($formCustomError);
		if ($formCustomError <> "") {
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
		$conn = &$this->getConnection();
		$conn->raiseErrorFn = $GLOBALS["ERROR_FUNC"];
		$rs = $conn->execute($sql);
		$conn->raiseErrorFn = '';
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
				if (DELETE_UPLOADED_FILES) // Delete old files
					$this->deleteUploadedFiles($row);
				$conn->raiseErrorFn = $GLOBALS["ERROR_FUNC"];
				$deleteRows = $this->delete($row); // Delete
				$conn->raiseErrorFn = '';
				if ($deleteRows === FALSE)
					break;
				if ($key <> "")
					$key .= ", ";
				$key .= $thisKey;
			}
		}
		if (!$deleteRows) {

			// Set up error message
			if ($this->getSuccessMessage() <> "" || $this->getFailureMessage() <> "") {

				// Use the message, do nothing
			} elseif ($this->CancelMessage <> "") {
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
		$filter = $this->getRecordFilter();
		$filter = $this->applyUserIDFilters($filter);
		$conn = &$this->getConnection();
		$this->CurrentFilter = $filter;
		$sql = $this->getCurrentSql();
		$conn->raiseErrorFn = $GLOBALS["ERROR_FUNC"];
		$rs = $conn->execute($sql);
		$conn->raiseErrorFn = '';
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

			// ProductFrom
			$this->ProductFrom->setDbValueDef($rsnew, $this->ProductFrom->CurrentValue, NULL, $this->ProductFrom->ReadOnly);

			// Quantity
			$this->Quantity->setDbValueDef($rsnew, $this->Quantity->CurrentValue, NULL, $this->Quantity->ReadOnly);

			// FreeQty
			$this->FreeQty->setDbValueDef($rsnew, $this->FreeQty->CurrentValue, NULL, $this->FreeQty->ReadOnly);

			// IQ
			$this->IQ->setDbValueDef($rsnew, $this->IQ->CurrentValue, NULL, $this->IQ->ReadOnly);

			// MRQ
			$this->MRQ->setDbValueDef($rsnew, $this->MRQ->CurrentValue, NULL, $this->MRQ->ReadOnly);

			// BRCODE
			$this->BRCODE->setDbValueDef($rsnew, $this->BRCODE->CurrentValue, NULL, $this->BRCODE->ReadOnly);

			// OPNO
			$this->OPNO->setDbValueDef($rsnew, $this->OPNO->CurrentValue, NULL, $this->OPNO->ReadOnly);

			// IPNO
			$this->IPNO->setDbValueDef($rsnew, $this->IPNO->CurrentValue, NULL, $this->IPNO->ReadOnly);

			// PatientBILLNO
			$this->PatientBILLNO->setDbValueDef($rsnew, $this->PatientBILLNO->CurrentValue, NULL, $this->PatientBILLNO->ReadOnly);

			// BILLDT
			$this->BILLDT->setDbValueDef($rsnew, $this->BILLDT->CurrentValue, NULL, $this->BILLDT->ReadOnly);

			// GRNNO
			$this->GRNNO->setDbValueDef($rsnew, $this->GRNNO->CurrentValue, NULL, $this->GRNNO->ReadOnly);

			// DT
			$this->DT->setDbValueDef($rsnew, $this->DT->CurrentValue, NULL, $this->DT->ReadOnly);

			// Customername
			$this->Customername->setDbValueDef($rsnew, $this->Customername->CurrentValue, NULL, $this->Customername->ReadOnly);

			// createdby
			$this->createdby->setDbValueDef($rsnew, $this->createdby->CurrentValue, NULL, $this->createdby->ReadOnly);

			// createddatetime
			$this->createddatetime->setDbValueDef($rsnew, UnFormatDateTime($this->createddatetime->CurrentValue, 11), NULL, $this->createddatetime->ReadOnly);

			// modifiedby
			$this->modifiedby->setDbValueDef($rsnew, $this->modifiedby->CurrentValue, NULL, $this->modifiedby->ReadOnly);

			// modifieddatetime
			$this->modifieddatetime->setDbValueDef($rsnew, UnFormatDateTime($this->modifieddatetime->CurrentValue, 11), NULL, $this->modifieddatetime->ReadOnly);

			// BILLNO
			$this->BILLNO->setDbValueDef($rsnew, $this->BILLNO->CurrentValue, NULL, $this->BILLNO->ReadOnly);

			// prc
			$this->prc->setDbValueDef($rsnew, $this->prc->CurrentValue, NULL, $this->prc->ReadOnly);

			// PrName
			$this->PrName->setDbValueDef($rsnew, $this->PrName->CurrentValue, NULL, $this->PrName->ReadOnly);

			// BatchNo
			$this->BatchNo->setDbValueDef($rsnew, $this->BatchNo->CurrentValue, NULL, $this->BatchNo->ReadOnly);

			// ExpDate
			$this->ExpDate->setDbValueDef($rsnew, UnFormatDateTime($this->ExpDate->CurrentValue, 7), NULL, $this->ExpDate->ReadOnly);

			// MFRCODE
			$this->MFRCODE->setDbValueDef($rsnew, $this->MFRCODE->CurrentValue, NULL, $this->MFRCODE->ReadOnly);

			// hsn
			$this->hsn->setDbValueDef($rsnew, $this->hsn->CurrentValue, NULL, $this->hsn->ReadOnly);

			// HospID
			$this->HospID->setDbValueDef($rsnew, HospitalID(), NULL);
			$rsnew['HospID'] = &$this->HospID->DbValue;

			// Call Row Updating event
			$updateRow = $this->Row_Updating($rsold, $rsnew);
			if ($updateRow) {
				$conn->raiseErrorFn = $GLOBALS["ERROR_FUNC"];
				if (count($rsnew) > 0)
					$editRow = $this->update($rsnew, "", $rsold);
				else
					$editRow = TRUE; // No field to update
				$conn->raiseErrorFn = '';
				if ($editRow) {
				}
			} else {
				if ($this->getSuccessMessage() <> "" || $this->getFailureMessage() <> "") {

					// Use the message, do nothing
				} elseif ($this->CancelMessage <> "") {
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
			if ($this->getCurrentMasterTable() == "view_pharmacy_movement") {
				$this->prc->CurrentValue = $this->prc->getSessionValue();
				$this->BatchNo->CurrentValue = $this->BatchNo->getSessionValue();
			}
		$conn = &$this->getConnection();

		// Load db values from rsold
		$this->loadDbValues($rsold);
		if ($rsold) {
		}
		$rsnew = [];

		// ProductFrom
		$this->ProductFrom->setDbValueDef($rsnew, $this->ProductFrom->CurrentValue, NULL, FALSE);

		// Quantity
		$this->Quantity->setDbValueDef($rsnew, $this->Quantity->CurrentValue, NULL, FALSE);

		// FreeQty
		$this->FreeQty->setDbValueDef($rsnew, $this->FreeQty->CurrentValue, NULL, FALSE);

		// IQ
		$this->IQ->setDbValueDef($rsnew, $this->IQ->CurrentValue, NULL, FALSE);

		// MRQ
		$this->MRQ->setDbValueDef($rsnew, $this->MRQ->CurrentValue, NULL, FALSE);

		// BRCODE
		$this->BRCODE->setDbValueDef($rsnew, $this->BRCODE->CurrentValue, NULL, FALSE);

		// OPNO
		$this->OPNO->setDbValueDef($rsnew, $this->OPNO->CurrentValue, NULL, FALSE);

		// IPNO
		$this->IPNO->setDbValueDef($rsnew, $this->IPNO->CurrentValue, NULL, FALSE);

		// PatientBILLNO
		$this->PatientBILLNO->setDbValueDef($rsnew, $this->PatientBILLNO->CurrentValue, NULL, FALSE);

		// BILLDT
		$this->BILLDT->setDbValueDef($rsnew, $this->BILLDT->CurrentValue, NULL, FALSE);

		// GRNNO
		$this->GRNNO->setDbValueDef($rsnew, $this->GRNNO->CurrentValue, NULL, FALSE);

		// DT
		$this->DT->setDbValueDef($rsnew, $this->DT->CurrentValue, NULL, FALSE);

		// Customername
		$this->Customername->setDbValueDef($rsnew, $this->Customername->CurrentValue, NULL, FALSE);

		// createdby
		$this->createdby->setDbValueDef($rsnew, $this->createdby->CurrentValue, NULL, FALSE);

		// createddatetime
		$this->createddatetime->setDbValueDef($rsnew, UnFormatDateTime($this->createddatetime->CurrentValue, 11), NULL, FALSE);

		// modifiedby
		$this->modifiedby->setDbValueDef($rsnew, $this->modifiedby->CurrentValue, NULL, FALSE);

		// modifieddatetime
		$this->modifieddatetime->setDbValueDef($rsnew, UnFormatDateTime($this->modifieddatetime->CurrentValue, 11), NULL, FALSE);

		// BILLNO
		$this->BILLNO->setDbValueDef($rsnew, $this->BILLNO->CurrentValue, NULL, FALSE);

		// prc
		$this->prc->setDbValueDef($rsnew, $this->prc->CurrentValue, NULL, FALSE);

		// PrName
		$this->PrName->setDbValueDef($rsnew, $this->PrName->CurrentValue, NULL, FALSE);

		// BatchNo
		$this->BatchNo->setDbValueDef($rsnew, $this->BatchNo->CurrentValue, NULL, FALSE);

		// ExpDate
		$this->ExpDate->setDbValueDef($rsnew, UnFormatDateTime($this->ExpDate->CurrentValue, 7), NULL, FALSE);

		// MFRCODE
		$this->MFRCODE->setDbValueDef($rsnew, $this->MFRCODE->CurrentValue, NULL, FALSE);

		// hsn
		$this->hsn->setDbValueDef($rsnew, $this->hsn->CurrentValue, NULL, FALSE);

		// HospID
		$this->HospID->setDbValueDef($rsnew, HospitalID(), NULL);
		$rsnew['HospID'] = &$this->HospID->DbValue;

		// Call Row Inserting event
		$rs = ($rsold) ? $rsold->fields : NULL;
		$insertRow = $this->Row_Inserting($rs, $rsnew);
		if ($insertRow) {
			$conn->raiseErrorFn = $GLOBALS["ERROR_FUNC"];
			$addRow = $this->insert($rsnew);
			$conn->raiseErrorFn = '';
			if ($addRow) {
			}
		} else {
			if ($this->getSuccessMessage() <> "" || $this->getFailureMessage() <> "") {

				// Use the message, do nothing
			} elseif ($this->CancelMessage <> "") {
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
		if ($masterTblVar == "view_pharmacy_movement") {
			$this->prc->Visible = FALSE;
			if ($GLOBALS["view_pharmacy_movement"]->EventCancelled)
				$this->EventCancelled = TRUE;
			$this->BatchNo->Visible = FALSE;
			if ($GLOBALS["view_pharmacy_movement"]->EventCancelled)
				$this->EventCancelled = TRUE;
		}
		$this->DbMasterFilter = $this->getMasterFilter(); // Get master filter
		$this->DbDetailFilter = $this->getDetailFilter(); // Get detail filter
	}

	// Setup lookup options
	public function setupLookupOptions($fld)
	{
		if ($fld->Lookup !== NULL && $fld->Lookup->Options === NULL) {

			// No need to check any more
			$fld->Lookup->Options = [];

			// Set up lookup SQL
			switch ($fld->FieldVar) {
				default:
					$lookupFilter = "";
					break;
			}

			// Always call to Lookup->getSql so that user can setup Lookup->Options in Lookup_Selecting server event
			$sql = $fld->Lookup->getSql(FALSE, "", $lookupFilter, $this);

			// Set up lookup cache
			if ($fld->UseLookupCache && $sql <> "" && count($fld->Lookup->ParentFields) == 0 && count($fld->Lookup->Options) == 0) {
				$conn = &$this->getConnection();
				$totalCnt = $this->getRecordCount($sql);
				if ($totalCnt > $fld->LookupCacheCount) // Total count > cache count, do not cache
					return;
				$rs = $conn->execute($sql);
				$ar = [];
				while ($rs && !$rs->EOF) {
					$row = &$rs->fields;

					// Format the field values
					switch ($fld->FieldVar) {
						case "x_ProductFrom":
							break;
						case "x_BRCODE":
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
		//$this->ListOptions->Items["new"]->Body = "xxx";

	}
}
?>
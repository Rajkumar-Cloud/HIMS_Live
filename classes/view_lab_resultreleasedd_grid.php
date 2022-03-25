<?php
namespace PHPMaker2019\HIMS;

/**
 * Page class
 */
class view_lab_resultreleasedd_grid extends view_lab_resultreleasedd
{

	// Page ID
	public $PageID = "grid";

	// Project ID
	public $ProjectID = "{EA4F6D13-AF8F-428D-9EA7-BA88D1107EC3}";

	// Table name
	public $TableName = 'view_lab_resultreleasedd';

	// Page object name
	public $PageObjName = "view_lab_resultreleasedd_grid";

	// Grid form hidden field names
	public $FormName = "fview_lab_resultreleaseddgrid";
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

		// Table object (view_lab_resultreleasedd)
		if (!isset($GLOBALS["view_lab_resultreleasedd"]) || get_class($GLOBALS["view_lab_resultreleasedd"]) == PROJECT_NAMESPACE . "view_lab_resultreleasedd") {
			$GLOBALS["view_lab_resultreleasedd"] = &$this;

			// $GLOBALS["MasterTable"] = &$GLOBALS["Table"];
			// if (!isset($GLOBALS["Table"]))
			// 	$GLOBALS["Table"] = &$GLOBALS["view_lab_resultreleasedd"];

		}
		$this->AddUrl = "view_lab_resultreleaseddadd.php";
		$this->CancelUrl = $this->pageUrl() . "action=cancel";

		// Table object (user_login)
		if (!isset($GLOBALS['user_login']))
			$GLOBALS['user_login'] = new user_login();

		// Page ID
		if (!defined(PROJECT_NAMESPACE . "PAGE_ID"))
			define(PROJECT_NAMESPACE . "PAGE_ID", 'grid');

		// Table name (for backward compatibility)
		if (!defined(PROJECT_NAMESPACE . "TABLE_NAME"))
			define(PROJECT_NAMESPACE . "TABLE_NAME", 'view_lab_resultreleasedd');

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
		global $EXPORT, $view_lab_resultreleasedd;
		if ($this->CustomExport && $this->CustomExport == $this->Export && array_key_exists($this->CustomExport, $EXPORT)) {
				$content = ob_get_contents();
			if ($ExportFileName == "")
				$ExportFileName = $this->TableVar;
			$class = PROJECT_NAMESPACE . $EXPORT[$this->CustomExport];
			if (class_exists($class)) {
				$doc = new $class($view_lab_resultreleasedd);
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
			$this->ResultDate->Visible = FALSE;
		if ($this->isAddOrEdit())
			$this->ResultedBy->Visible = FALSE;
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
	public $DisplayRecs = 2000;
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
		$this->id->setVisibility();
		$this->PatID->setVisibility();
		$this->PatientName->setVisibility();
		$this->Age->setVisibility();
		$this->Gender->setVisibility();
		$this->sid->setVisibility();
		$this->ItemCode->setVisibility();
		$this->DEptCd->setVisibility();
		$this->Resulted->setVisibility();
		$this->Services->setVisibility();
		$this->LabReport->setVisibility();
		$this->Pic1->setVisibility();
		$this->Pic2->setVisibility();
		$this->TestUnit->setVisibility();
		$this->RefValue->setVisibility();
		$this->Order->setVisibility();
		$this->Repeated->setVisibility();
		$this->Vid->setVisibility();
		$this->invoiceId->setVisibility();
		$this->DrID->setVisibility();
		$this->DrCODE->setVisibility();
		$this->DrName->setVisibility();
		$this->Department->setVisibility();
		$this->createddatetime->setVisibility();
		$this->status->setVisibility();
		$this->TestType->setVisibility();
		$this->ResultDate->setVisibility();
		$this->ResultedBy->setVisibility();
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
		$this->setupLookupOptions($this->TestUnit);

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
			$this->DisplayRecs = 2000; // Load default
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
		if ($this->CurrentMode <> "add" && $this->getMasterFilter() <> "" && $this->getCurrentMasterTable() == "view_lab_servicess") {
			global $view_lab_servicess;
			$rsmaster = $view_lab_servicess->loadRs($this->DbMasterFilter);
			$this->MasterRecordExists = ($rsmaster && !$rsmaster->EOF);
			if (!$this->MasterRecordExists) {
				$this->setFailureMessage($Language->phrase("NoRecord")); // Set no record found
				$this->terminate("view_lab_servicesslist.php"); // Return to master page
			} else {
				$view_lab_servicess->loadListRowValues($rsmaster);
				$view_lab_servicess->RowType = ROWTYPE_MASTER; // Master row
				$view_lab_servicess->renderListRow();
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
					$this->DisplayRecs = 2000; // Non-numeric, load default
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
		$this->Order->FormValue = ""; // Clear form value
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
		if (count($arKeyFlds) >= 1) {
			$this->id->setFormValue($arKeyFlds[0]);
			if (!is_numeric($this->id->FormValue))
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
					if ($key <> "")
						$key .= $GLOBALS["COMPOSITE_KEY_SEPARATOR"];
					$key .= $this->id->CurrentValue;

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
		if ($CurrentForm->hasValue("x_PatID") && $CurrentForm->hasValue("o_PatID") && $this->PatID->CurrentValue <> $this->PatID->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_PatientName") && $CurrentForm->hasValue("o_PatientName") && $this->PatientName->CurrentValue <> $this->PatientName->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_Age") && $CurrentForm->hasValue("o_Age") && $this->Age->CurrentValue <> $this->Age->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_Gender") && $CurrentForm->hasValue("o_Gender") && $this->Gender->CurrentValue <> $this->Gender->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_sid") && $CurrentForm->hasValue("o_sid") && $this->sid->CurrentValue <> $this->sid->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_ItemCode") && $CurrentForm->hasValue("o_ItemCode") && $this->ItemCode->CurrentValue <> $this->ItemCode->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_DEptCd") && $CurrentForm->hasValue("o_DEptCd") && $this->DEptCd->CurrentValue <> $this->DEptCd->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_Resulted") && $CurrentForm->hasValue("o_Resulted") && $this->Resulted->CurrentValue <> $this->Resulted->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_Services") && $CurrentForm->hasValue("o_Services") && $this->Services->CurrentValue <> $this->Services->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_LabReport") && $CurrentForm->hasValue("o_LabReport") && $this->LabReport->CurrentValue <> $this->LabReport->OldValue)
			return FALSE;
		if (!EmptyValue($this->Pic1->Upload->Value))
			return FALSE;
		if (!EmptyValue($this->Pic2->Upload->Value))
			return FALSE;
		if ($CurrentForm->hasValue("x_TestUnit") && $CurrentForm->hasValue("o_TestUnit") && $this->TestUnit->CurrentValue <> $this->TestUnit->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_RefValue") && $CurrentForm->hasValue("o_RefValue") && $this->RefValue->CurrentValue <> $this->RefValue->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_Order") && $CurrentForm->hasValue("o_Order") && $this->Order->CurrentValue <> $this->Order->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_Repeated") && $CurrentForm->hasValue("o_Repeated") && $this->Repeated->CurrentValue <> $this->Repeated->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_Vid") && $CurrentForm->hasValue("o_Vid") && $this->Vid->CurrentValue <> $this->Vid->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_invoiceId") && $CurrentForm->hasValue("o_invoiceId") && $this->invoiceId->CurrentValue <> $this->invoiceId->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_DrID") && $CurrentForm->hasValue("o_DrID") && $this->DrID->CurrentValue <> $this->DrID->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_DrCODE") && $CurrentForm->hasValue("o_DrCODE") && $this->DrCODE->CurrentValue <> $this->DrCODE->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_DrName") && $CurrentForm->hasValue("o_DrName") && $this->DrName->CurrentValue <> $this->DrName->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_Department") && $CurrentForm->hasValue("o_Department") && $this->Department->CurrentValue <> $this->Department->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_createddatetime") && $CurrentForm->hasValue("o_createddatetime") && $this->createddatetime->CurrentValue <> $this->createddatetime->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_status") && $CurrentForm->hasValue("o_status") && $this->status->CurrentValue <> $this->status->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_TestType") && $CurrentForm->hasValue("o_TestType") && $this->TestType->CurrentValue <> $this->TestType->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_HospID") && $CurrentForm->hasValue("o_HospID") && $this->HospID->CurrentValue <> $this->HospID->OldValue)
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
				$this->Vid->setSessionValue("");
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
		if ($key <> "")
			$key .= $GLOBALS["COMPOSITE_KEY_SEPARATOR"];
		$key .= $rs->fields('id');
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
		$this->Pic1->Upload->Index = $CurrentForm->Index;
		$this->Pic1->Upload->uploadFile();
		$this->Pic1->CurrentValue = $this->Pic1->Upload->FileName;
		$this->Pic2->Upload->Index = $CurrentForm->Index;
		$this->Pic2->Upload->uploadFile();
		$this->Pic2->CurrentValue = $this->Pic2->Upload->FileName;
	}

	// Load default values
	protected function loadDefaultValues()
	{
		$this->id->CurrentValue = NULL;
		$this->id->OldValue = $this->id->CurrentValue;
		$this->PatID->CurrentValue = NULL;
		$this->PatID->OldValue = $this->PatID->CurrentValue;
		$this->PatientName->CurrentValue = NULL;
		$this->PatientName->OldValue = $this->PatientName->CurrentValue;
		$this->Age->CurrentValue = NULL;
		$this->Age->OldValue = $this->Age->CurrentValue;
		$this->Gender->CurrentValue = NULL;
		$this->Gender->OldValue = $this->Gender->CurrentValue;
		$this->sid->CurrentValue = NULL;
		$this->sid->OldValue = $this->sid->CurrentValue;
		$this->ItemCode->CurrentValue = NULL;
		$this->ItemCode->OldValue = $this->ItemCode->CurrentValue;
		$this->DEptCd->CurrentValue = NULL;
		$this->DEptCd->OldValue = $this->DEptCd->CurrentValue;
		$this->Resulted->CurrentValue = NULL;
		$this->Resulted->OldValue = $this->Resulted->CurrentValue;
		$this->Services->CurrentValue = NULL;
		$this->Services->OldValue = $this->Services->CurrentValue;
		$this->LabReport->CurrentValue = NULL;
		$this->LabReport->OldValue = $this->LabReport->CurrentValue;
		$this->Pic1->Upload->DbValue = NULL;
		$this->Pic1->OldValue = $this->Pic1->Upload->DbValue;
		$this->Pic1->Upload->Index = $this->RowIndex;
		$this->Pic2->Upload->DbValue = NULL;
		$this->Pic2->OldValue = $this->Pic2->Upload->DbValue;
		$this->Pic2->Upload->Index = $this->RowIndex;
		$this->TestUnit->CurrentValue = NULL;
		$this->TestUnit->OldValue = $this->TestUnit->CurrentValue;
		$this->RefValue->CurrentValue = NULL;
		$this->RefValue->OldValue = $this->RefValue->CurrentValue;
		$this->Order->CurrentValue = NULL;
		$this->Order->OldValue = $this->Order->CurrentValue;
		$this->Repeated->CurrentValue = NULL;
		$this->Repeated->OldValue = $this->Repeated->CurrentValue;
		$this->Vid->CurrentValue = NULL;
		$this->Vid->OldValue = $this->Vid->CurrentValue;
		$this->invoiceId->CurrentValue = NULL;
		$this->invoiceId->OldValue = $this->invoiceId->CurrentValue;
		$this->DrID->CurrentValue = NULL;
		$this->DrID->OldValue = $this->DrID->CurrentValue;
		$this->DrCODE->CurrentValue = NULL;
		$this->DrCODE->OldValue = $this->DrCODE->CurrentValue;
		$this->DrName->CurrentValue = NULL;
		$this->DrName->OldValue = $this->DrName->CurrentValue;
		$this->Department->CurrentValue = NULL;
		$this->Department->OldValue = $this->Department->CurrentValue;
		$this->createddatetime->CurrentValue = NULL;
		$this->createddatetime->OldValue = $this->createddatetime->CurrentValue;
		$this->status->CurrentValue = NULL;
		$this->status->OldValue = $this->status->CurrentValue;
		$this->TestType->CurrentValue = NULL;
		$this->TestType->OldValue = $this->TestType->CurrentValue;
		$this->ResultDate->CurrentValue = NULL;
		$this->ResultDate->OldValue = $this->ResultDate->CurrentValue;
		$this->ResultedBy->CurrentValue = NULL;
		$this->ResultedBy->OldValue = $this->ResultedBy->CurrentValue;
		$this->HospID->CurrentValue = NULL;
		$this->HospID->OldValue = $this->HospID->CurrentValue;
	}

	// Load form values
	protected function loadFormValues()
	{

		// Load from form
		global $CurrentForm;
		$CurrentForm->FormName = $this->FormName;
		$this->getUploadFiles(); // Get upload files

		// Check field name 'id' first before field var 'x_id'
		$val = $CurrentForm->hasValue("id") ? $CurrentForm->getValue("id") : $CurrentForm->getValue("x_id");
		if (!$this->id->IsDetailKey && !$this->isGridAdd() && !$this->isAdd())
			$this->id->setFormValue($val);

		// Check field name 'PatID' first before field var 'x_PatID'
		$val = $CurrentForm->hasValue("PatID") ? $CurrentForm->getValue("PatID") : $CurrentForm->getValue("x_PatID");
		if (!$this->PatID->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->PatID->Visible = FALSE; // Disable update for API request
			else
				$this->PatID->setFormValue($val);
		}
		$this->PatID->setOldValue($CurrentForm->getValue("o_PatID"));

		// Check field name 'PatientName' first before field var 'x_PatientName'
		$val = $CurrentForm->hasValue("PatientName") ? $CurrentForm->getValue("PatientName") : $CurrentForm->getValue("x_PatientName");
		if (!$this->PatientName->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->PatientName->Visible = FALSE; // Disable update for API request
			else
				$this->PatientName->setFormValue($val);
		}
		$this->PatientName->setOldValue($CurrentForm->getValue("o_PatientName"));

		// Check field name 'Age' first before field var 'x_Age'
		$val = $CurrentForm->hasValue("Age") ? $CurrentForm->getValue("Age") : $CurrentForm->getValue("x_Age");
		if (!$this->Age->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Age->Visible = FALSE; // Disable update for API request
			else
				$this->Age->setFormValue($val);
		}
		$this->Age->setOldValue($CurrentForm->getValue("o_Age"));

		// Check field name 'Gender' first before field var 'x_Gender'
		$val = $CurrentForm->hasValue("Gender") ? $CurrentForm->getValue("Gender") : $CurrentForm->getValue("x_Gender");
		if (!$this->Gender->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Gender->Visible = FALSE; // Disable update for API request
			else
				$this->Gender->setFormValue($val);
		}
		$this->Gender->setOldValue($CurrentForm->getValue("o_Gender"));

		// Check field name 'sid' first before field var 'x_sid'
		$val = $CurrentForm->hasValue("sid") ? $CurrentForm->getValue("sid") : $CurrentForm->getValue("x_sid");
		if (!$this->sid->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->sid->Visible = FALSE; // Disable update for API request
			else
				$this->sid->setFormValue($val);
		}
		$this->sid->setOldValue($CurrentForm->getValue("o_sid"));

		// Check field name 'ItemCode' first before field var 'x_ItemCode'
		$val = $CurrentForm->hasValue("ItemCode") ? $CurrentForm->getValue("ItemCode") : $CurrentForm->getValue("x_ItemCode");
		if (!$this->ItemCode->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->ItemCode->Visible = FALSE; // Disable update for API request
			else
				$this->ItemCode->setFormValue($val);
		}
		$this->ItemCode->setOldValue($CurrentForm->getValue("o_ItemCode"));

		// Check field name 'DEptCd' first before field var 'x_DEptCd'
		$val = $CurrentForm->hasValue("DEptCd") ? $CurrentForm->getValue("DEptCd") : $CurrentForm->getValue("x_DEptCd");
		if (!$this->DEptCd->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->DEptCd->Visible = FALSE; // Disable update for API request
			else
				$this->DEptCd->setFormValue($val);
		}
		$this->DEptCd->setOldValue($CurrentForm->getValue("o_DEptCd"));

		// Check field name 'Resulted' first before field var 'x_Resulted'
		$val = $CurrentForm->hasValue("Resulted") ? $CurrentForm->getValue("Resulted") : $CurrentForm->getValue("x_Resulted");
		if (!$this->Resulted->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Resulted->Visible = FALSE; // Disable update for API request
			else
				$this->Resulted->setFormValue($val);
		}
		$this->Resulted->setOldValue($CurrentForm->getValue("o_Resulted"));

		// Check field name 'Services' first before field var 'x_Services'
		$val = $CurrentForm->hasValue("Services") ? $CurrentForm->getValue("Services") : $CurrentForm->getValue("x_Services");
		if (!$this->Services->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Services->Visible = FALSE; // Disable update for API request
			else
				$this->Services->setFormValue($val);
		}
		$this->Services->setOldValue($CurrentForm->getValue("o_Services"));

		// Check field name 'LabReport' first before field var 'x_LabReport'
		$val = $CurrentForm->hasValue("LabReport") ? $CurrentForm->getValue("LabReport") : $CurrentForm->getValue("x_LabReport");
		if (!$this->LabReport->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->LabReport->Visible = FALSE; // Disable update for API request
			else
				$this->LabReport->setFormValue($val);
		}
		$this->LabReport->setOldValue($CurrentForm->getValue("o_LabReport"));

		// Check field name 'TestUnit' first before field var 'x_TestUnit'
		$val = $CurrentForm->hasValue("TestUnit") ? $CurrentForm->getValue("TestUnit") : $CurrentForm->getValue("x_TestUnit");
		if (!$this->TestUnit->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->TestUnit->Visible = FALSE; // Disable update for API request
			else
				$this->TestUnit->setFormValue($val);
		}
		$this->TestUnit->setOldValue($CurrentForm->getValue("o_TestUnit"));

		// Check field name 'RefValue' first before field var 'x_RefValue'
		$val = $CurrentForm->hasValue("RefValue") ? $CurrentForm->getValue("RefValue") : $CurrentForm->getValue("x_RefValue");
		if (!$this->RefValue->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->RefValue->Visible = FALSE; // Disable update for API request
			else
				$this->RefValue->setFormValue($val);
		}
		$this->RefValue->setOldValue($CurrentForm->getValue("o_RefValue"));

		// Check field name 'Order' first before field var 'x_Order'
		$val = $CurrentForm->hasValue("Order") ? $CurrentForm->getValue("Order") : $CurrentForm->getValue("x_Order");
		if (!$this->Order->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Order->Visible = FALSE; // Disable update for API request
			else
				$this->Order->setFormValue($val);
		}
		$this->Order->setOldValue($CurrentForm->getValue("o_Order"));

		// Check field name 'Repeated' first before field var 'x_Repeated'
		$val = $CurrentForm->hasValue("Repeated") ? $CurrentForm->getValue("Repeated") : $CurrentForm->getValue("x_Repeated");
		if (!$this->Repeated->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Repeated->Visible = FALSE; // Disable update for API request
			else
				$this->Repeated->setFormValue($val);
		}
		$this->Repeated->setOldValue($CurrentForm->getValue("o_Repeated"));

		// Check field name 'Vid' first before field var 'x_Vid'
		$val = $CurrentForm->hasValue("Vid") ? $CurrentForm->getValue("Vid") : $CurrentForm->getValue("x_Vid");
		if (!$this->Vid->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Vid->Visible = FALSE; // Disable update for API request
			else
				$this->Vid->setFormValue($val);
		}
		$this->Vid->setOldValue($CurrentForm->getValue("o_Vid"));

		// Check field name 'invoiceId' first before field var 'x_invoiceId'
		$val = $CurrentForm->hasValue("invoiceId") ? $CurrentForm->getValue("invoiceId") : $CurrentForm->getValue("x_invoiceId");
		if (!$this->invoiceId->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->invoiceId->Visible = FALSE; // Disable update for API request
			else
				$this->invoiceId->setFormValue($val);
		}
		$this->invoiceId->setOldValue($CurrentForm->getValue("o_invoiceId"));

		// Check field name 'DrID' first before field var 'x_DrID'
		$val = $CurrentForm->hasValue("DrID") ? $CurrentForm->getValue("DrID") : $CurrentForm->getValue("x_DrID");
		if (!$this->DrID->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->DrID->Visible = FALSE; // Disable update for API request
			else
				$this->DrID->setFormValue($val);
		}
		$this->DrID->setOldValue($CurrentForm->getValue("o_DrID"));

		// Check field name 'DrCODE' first before field var 'x_DrCODE'
		$val = $CurrentForm->hasValue("DrCODE") ? $CurrentForm->getValue("DrCODE") : $CurrentForm->getValue("x_DrCODE");
		if (!$this->DrCODE->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->DrCODE->Visible = FALSE; // Disable update for API request
			else
				$this->DrCODE->setFormValue($val);
		}
		$this->DrCODE->setOldValue($CurrentForm->getValue("o_DrCODE"));

		// Check field name 'DrName' first before field var 'x_DrName'
		$val = $CurrentForm->hasValue("DrName") ? $CurrentForm->getValue("DrName") : $CurrentForm->getValue("x_DrName");
		if (!$this->DrName->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->DrName->Visible = FALSE; // Disable update for API request
			else
				$this->DrName->setFormValue($val);
		}
		$this->DrName->setOldValue($CurrentForm->getValue("o_DrName"));

		// Check field name 'Department' first before field var 'x_Department'
		$val = $CurrentForm->hasValue("Department") ? $CurrentForm->getValue("Department") : $CurrentForm->getValue("x_Department");
		if (!$this->Department->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Department->Visible = FALSE; // Disable update for API request
			else
				$this->Department->setFormValue($val);
		}
		$this->Department->setOldValue($CurrentForm->getValue("o_Department"));

		// Check field name 'createddatetime' first before field var 'x_createddatetime'
		$val = $CurrentForm->hasValue("createddatetime") ? $CurrentForm->getValue("createddatetime") : $CurrentForm->getValue("x_createddatetime");
		if (!$this->createddatetime->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->createddatetime->Visible = FALSE; // Disable update for API request
			else
				$this->createddatetime->setFormValue($val);
			$this->createddatetime->CurrentValue = UnFormatDateTime($this->createddatetime->CurrentValue, 0);
		}
		$this->createddatetime->setOldValue($CurrentForm->getValue("o_createddatetime"));

		// Check field name 'status' first before field var 'x_status'
		$val = $CurrentForm->hasValue("status") ? $CurrentForm->getValue("status") : $CurrentForm->getValue("x_status");
		if (!$this->status->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->status->Visible = FALSE; // Disable update for API request
			else
				$this->status->setFormValue($val);
		}
		$this->status->setOldValue($CurrentForm->getValue("o_status"));

		// Check field name 'TestType' first before field var 'x_TestType'
		$val = $CurrentForm->hasValue("TestType") ? $CurrentForm->getValue("TestType") : $CurrentForm->getValue("x_TestType");
		if (!$this->TestType->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->TestType->Visible = FALSE; // Disable update for API request
			else
				$this->TestType->setFormValue($val);
		}
		$this->TestType->setOldValue($CurrentForm->getValue("o_TestType"));

		// Check field name 'ResultDate' first before field var 'x_ResultDate'
		$val = $CurrentForm->hasValue("ResultDate") ? $CurrentForm->getValue("ResultDate") : $CurrentForm->getValue("x_ResultDate");
		if (!$this->ResultDate->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->ResultDate->Visible = FALSE; // Disable update for API request
			else
				$this->ResultDate->setFormValue($val);
			$this->ResultDate->CurrentValue = UnFormatDateTime($this->ResultDate->CurrentValue, 0);
		}
		$this->ResultDate->setOldValue($CurrentForm->getValue("o_ResultDate"));

		// Check field name 'ResultedBy' first before field var 'x_ResultedBy'
		$val = $CurrentForm->hasValue("ResultedBy") ? $CurrentForm->getValue("ResultedBy") : $CurrentForm->getValue("x_ResultedBy");
		if (!$this->ResultedBy->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->ResultedBy->Visible = FALSE; // Disable update for API request
			else
				$this->ResultedBy->setFormValue($val);
		}
		$this->ResultedBy->setOldValue($CurrentForm->getValue("o_ResultedBy"));

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
		if (!$this->isGridAdd() && !$this->isAdd())
			$this->id->CurrentValue = $this->id->FormValue;
		$this->PatID->CurrentValue = $this->PatID->FormValue;
		$this->PatientName->CurrentValue = $this->PatientName->FormValue;
		$this->Age->CurrentValue = $this->Age->FormValue;
		$this->Gender->CurrentValue = $this->Gender->FormValue;
		$this->sid->CurrentValue = $this->sid->FormValue;
		$this->ItemCode->CurrentValue = $this->ItemCode->FormValue;
		$this->DEptCd->CurrentValue = $this->DEptCd->FormValue;
		$this->Resulted->CurrentValue = $this->Resulted->FormValue;
		$this->Services->CurrentValue = $this->Services->FormValue;
		$this->LabReport->CurrentValue = $this->LabReport->FormValue;
		$this->TestUnit->CurrentValue = $this->TestUnit->FormValue;
		$this->RefValue->CurrentValue = $this->RefValue->FormValue;
		$this->Order->CurrentValue = $this->Order->FormValue;
		$this->Repeated->CurrentValue = $this->Repeated->FormValue;
		$this->Vid->CurrentValue = $this->Vid->FormValue;
		$this->invoiceId->CurrentValue = $this->invoiceId->FormValue;
		$this->DrID->CurrentValue = $this->DrID->FormValue;
		$this->DrCODE->CurrentValue = $this->DrCODE->FormValue;
		$this->DrName->CurrentValue = $this->DrName->FormValue;
		$this->Department->CurrentValue = $this->Department->FormValue;
		$this->createddatetime->CurrentValue = $this->createddatetime->FormValue;
		$this->createddatetime->CurrentValue = UnFormatDateTime($this->createddatetime->CurrentValue, 0);
		$this->status->CurrentValue = $this->status->FormValue;
		$this->TestType->CurrentValue = $this->TestType->FormValue;
		$this->ResultDate->CurrentValue = $this->ResultDate->FormValue;
		$this->ResultDate->CurrentValue = UnFormatDateTime($this->ResultDate->CurrentValue, 0);
		$this->ResultedBy->CurrentValue = $this->ResultedBy->FormValue;
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
		$this->id->setDbValue($row['id']);
		$this->PatID->setDbValue($row['PatID']);
		$this->PatientName->setDbValue($row['PatientName']);
		$this->Age->setDbValue($row['Age']);
		$this->Gender->setDbValue($row['Gender']);
		$this->sid->setDbValue($row['sid']);
		$this->ItemCode->setDbValue($row['ItemCode']);
		$this->DEptCd->setDbValue($row['DEptCd']);
		$this->Resulted->setDbValue($row['Resulted']);
		$this->Services->setDbValue($row['Services']);
		$this->LabReport->setDbValue($row['LabReport']);
		$this->Pic1->Upload->DbValue = $row['Pic1'];
		$this->Pic1->setDbValue($this->Pic1->Upload->DbValue);
		$this->Pic1->Upload->Index = $this->RowIndex;
		$this->Pic2->Upload->DbValue = $row['Pic2'];
		$this->Pic2->setDbValue($this->Pic2->Upload->DbValue);
		$this->Pic2->Upload->Index = $this->RowIndex;
		$this->TestUnit->setDbValue($row['TestUnit']);
		$this->RefValue->setDbValue($row['RefValue']);
		$this->Order->setDbValue($row['Order']);
		$this->Repeated->setDbValue($row['Repeated']);
		$this->Vid->setDbValue($row['Vid']);
		$this->invoiceId->setDbValue($row['invoiceId']);
		$this->DrID->setDbValue($row['DrID']);
		$this->DrCODE->setDbValue($row['DrCODE']);
		$this->DrName->setDbValue($row['DrName']);
		$this->Department->setDbValue($row['Department']);
		$this->createddatetime->setDbValue($row['createddatetime']);
		$this->status->setDbValue($row['status']);
		$this->TestType->setDbValue($row['TestType']);
		$this->ResultDate->setDbValue($row['ResultDate']);
		$this->ResultedBy->setDbValue($row['ResultedBy']);
		$this->HospID->setDbValue($row['HospID']);
	}

	// Return a row with default values
	protected function newRow()
	{
		$this->loadDefaultValues();
		$row = [];
		$row['id'] = $this->id->CurrentValue;
		$row['PatID'] = $this->PatID->CurrentValue;
		$row['PatientName'] = $this->PatientName->CurrentValue;
		$row['Age'] = $this->Age->CurrentValue;
		$row['Gender'] = $this->Gender->CurrentValue;
		$row['sid'] = $this->sid->CurrentValue;
		$row['ItemCode'] = $this->ItemCode->CurrentValue;
		$row['DEptCd'] = $this->DEptCd->CurrentValue;
		$row['Resulted'] = $this->Resulted->CurrentValue;
		$row['Services'] = $this->Services->CurrentValue;
		$row['LabReport'] = $this->LabReport->CurrentValue;
		$row['Pic1'] = $this->Pic1->Upload->DbValue;
		$row['Pic2'] = $this->Pic2->Upload->DbValue;
		$row['TestUnit'] = $this->TestUnit->CurrentValue;
		$row['RefValue'] = $this->RefValue->CurrentValue;
		$row['Order'] = $this->Order->CurrentValue;
		$row['Repeated'] = $this->Repeated->CurrentValue;
		$row['Vid'] = $this->Vid->CurrentValue;
		$row['invoiceId'] = $this->invoiceId->CurrentValue;
		$row['DrID'] = $this->DrID->CurrentValue;
		$row['DrCODE'] = $this->DrCODE->CurrentValue;
		$row['DrName'] = $this->DrName->CurrentValue;
		$row['Department'] = $this->Department->CurrentValue;
		$row['createddatetime'] = $this->createddatetime->CurrentValue;
		$row['status'] = $this->status->CurrentValue;
		$row['TestType'] = $this->TestType->CurrentValue;
		$row['ResultDate'] = $this->ResultDate->CurrentValue;
		$row['ResultedBy'] = $this->ResultedBy->CurrentValue;
		$row['HospID'] = $this->HospID->CurrentValue;
		return $row;
	}

	// Load old record
	protected function loadOldRecord()
	{

		// Load key values from Session
		$validKey = TRUE;
		$arKeys[] = $this->RowOldKey;
		$cnt = count($arKeys);
		if ($cnt >= 1) {
			if (strval($arKeys[0]) <> "")
				$this->id->CurrentValue = strval($arKeys[0]); // id
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
			$conn = &$this->getConnection();
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

		// Convert decimal values if posted back
		if ($this->Order->FormValue == $this->Order->CurrentValue && is_numeric(ConvertToFloatString($this->Order->CurrentValue)))
			$this->Order->CurrentValue = ConvertToFloatString($this->Order->CurrentValue);

		// Call Row_Rendering event
		$this->Row_Rendering();

		// Common render codes for all row types
		// id
		// PatID
		// PatientName
		// Age
		// Gender
		// sid
		// ItemCode
		// DEptCd
		// Resulted
		// Services
		// LabReport
		// Pic1
		// Pic2
		// TestUnit
		// RefValue
		// Order
		// Repeated
		// Vid
		// invoiceId
		// DrID
		// DrCODE
		// DrName
		// Department
		// createddatetime
		// status
		// TestType
		// ResultDate
		// ResultedBy
		// HospID

		if ($this->RowType == ROWTYPE_VIEW) { // View row

			// id
			$this->id->ViewValue = $this->id->CurrentValue;
			$this->id->ViewCustomAttributes = "";

			// PatID
			$this->PatID->ViewValue = $this->PatID->CurrentValue;
			$this->PatID->ViewValue = FormatNumber($this->PatID->ViewValue, 0, -2, -2, -2);
			$this->PatID->ViewCustomAttributes = "";

			// PatientName
			$this->PatientName->ViewValue = $this->PatientName->CurrentValue;
			$this->PatientName->ViewCustomAttributes = "";

			// Age
			$this->Age->ViewValue = $this->Age->CurrentValue;
			$this->Age->ViewCustomAttributes = "";

			// Gender
			$this->Gender->ViewValue = $this->Gender->CurrentValue;
			$this->Gender->ViewCustomAttributes = "";

			// sid
			$this->sid->ViewValue = $this->sid->CurrentValue;
			$this->sid->ViewValue = FormatNumber($this->sid->ViewValue, 0, -2, -2, -2);
			$this->sid->ViewCustomAttributes = "";

			// ItemCode
			$this->ItemCode->ViewValue = $this->ItemCode->CurrentValue;
			$this->ItemCode->ViewCustomAttributes = "";

			// DEptCd
			$this->DEptCd->ViewValue = $this->DEptCd->CurrentValue;
			$this->DEptCd->ViewCustomAttributes = "";

			// Resulted
			if (strval($this->Resulted->CurrentValue) <> "") {
				$this->Resulted->ViewValue = new OptionValues();
				$arwrk = explode(",", strval($this->Resulted->CurrentValue));
				$cnt = count($arwrk);
				for ($ari = 0; $ari < $cnt; $ari++)
					$this->Resulted->ViewValue->add($this->Resulted->optionCaption(trim($arwrk[$ari])));
			} else {
				$this->Resulted->ViewValue = NULL;
			}
			$this->Resulted->ViewCustomAttributes = "";

			// Services
			$this->Services->ViewValue = $this->Services->CurrentValue;
			$this->Services->ViewCustomAttributes = "";

			// LabReport
			$this->LabReport->ViewValue = $this->LabReport->CurrentValue;
			$this->LabReport->ViewCustomAttributes = "";

			// Pic1
			if (!EmptyValue($this->Pic1->Upload->DbValue)) {
				$this->Pic1->ViewValue = $this->Pic1->Upload->DbValue;
			} else {
				$this->Pic1->ViewValue = "";
			}
			$this->Pic1->ViewCustomAttributes = "";

			// Pic2
			if (!EmptyValue($this->Pic2->Upload->DbValue)) {
				$this->Pic2->ViewValue = $this->Pic2->Upload->DbValue;
			} else {
				$this->Pic2->ViewValue = "";
			}
			$this->Pic2->ViewCustomAttributes = "";

			// TestUnit
			$this->TestUnit->ViewValue = $this->TestUnit->CurrentValue;
			$curVal = strval($this->TestUnit->CurrentValue);
			if ($curVal <> "") {
				$this->TestUnit->ViewValue = $this->TestUnit->lookupCacheOption($curVal);
				if ($this->TestUnit->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Code`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->TestUnit->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = $rswrk->fields('df');
						$this->TestUnit->ViewValue = $this->TestUnit->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->TestUnit->ViewValue = $this->TestUnit->CurrentValue;
					}
				}
			} else {
				$this->TestUnit->ViewValue = NULL;
			}
			$this->TestUnit->ViewCustomAttributes = "";

			// RefValue
			$this->RefValue->ViewValue = $this->RefValue->CurrentValue;
			$this->RefValue->ViewCustomAttributes = "";

			// Order
			$this->Order->ViewValue = $this->Order->CurrentValue;
			$this->Order->ViewValue = FormatNumber($this->Order->ViewValue, 2, -2, -2, -2);
			$this->Order->ViewCustomAttributes = "";

			// Repeated
			if (strval($this->Repeated->CurrentValue) <> "") {
				$this->Repeated->ViewValue = new OptionValues();
				$arwrk = explode(",", strval($this->Repeated->CurrentValue));
				$cnt = count($arwrk);
				for ($ari = 0; $ari < $cnt; $ari++)
					$this->Repeated->ViewValue->add($this->Repeated->optionCaption(trim($arwrk[$ari])));
			} else {
				$this->Repeated->ViewValue = NULL;
			}
			$this->Repeated->ViewCustomAttributes = "";

			// Vid
			$this->Vid->ViewValue = $this->Vid->CurrentValue;
			$this->Vid->ViewValue = FormatNumber($this->Vid->ViewValue, 0, -2, -2, -2);
			$this->Vid->ViewCustomAttributes = "";

			// invoiceId
			$this->invoiceId->ViewValue = $this->invoiceId->CurrentValue;
			$this->invoiceId->ViewValue = FormatNumber($this->invoiceId->ViewValue, 0, -2, -2, -2);
			$this->invoiceId->ViewCustomAttributes = "";

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

			// createddatetime
			$this->createddatetime->ViewValue = $this->createddatetime->CurrentValue;
			$this->createddatetime->ViewValue = FormatDateTime($this->createddatetime->ViewValue, 0);
			$this->createddatetime->ViewCustomAttributes = "";

			// status
			$this->status->ViewValue = $this->status->CurrentValue;
			$this->status->ViewValue = FormatNumber($this->status->ViewValue, 0, -2, -2, -2);
			$this->status->ViewCustomAttributes = "";

			// TestType
			$this->TestType->ViewValue = $this->TestType->CurrentValue;
			$this->TestType->ViewCustomAttributes = "";

			// ResultDate
			$this->ResultDate->ViewValue = $this->ResultDate->CurrentValue;
			$this->ResultDate->ViewValue = FormatDateTime($this->ResultDate->ViewValue, 0);
			$this->ResultDate->ViewCustomAttributes = "";

			// ResultedBy
			$this->ResultedBy->ViewValue = $this->ResultedBy->CurrentValue;
			$this->ResultedBy->ViewCustomAttributes = "";

			// HospID
			$this->HospID->ViewValue = $this->HospID->CurrentValue;
			$this->HospID->ViewValue = FormatNumber($this->HospID->ViewValue, 0, -2, -2, -2);
			$this->HospID->ViewCustomAttributes = "";

			// id
			$this->id->LinkCustomAttributes = "";
			$this->id->HrefValue = "";
			$this->id->TooltipValue = "";

			// PatID
			$this->PatID->LinkCustomAttributes = "";
			$this->PatID->HrefValue = "";
			$this->PatID->TooltipValue = "";

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

			// sid
			$this->sid->LinkCustomAttributes = "";
			$this->sid->HrefValue = "";
			$this->sid->TooltipValue = "";

			// ItemCode
			$this->ItemCode->LinkCustomAttributes = "";
			$this->ItemCode->HrefValue = "";
			$this->ItemCode->TooltipValue = "";

			// DEptCd
			$this->DEptCd->LinkCustomAttributes = "";
			$this->DEptCd->HrefValue = "";
			$this->DEptCd->TooltipValue = "";

			// Resulted
			$this->Resulted->LinkCustomAttributes = "";
			$this->Resulted->HrefValue = "";
			$this->Resulted->TooltipValue = "";

			// Services
			$this->Services->LinkCustomAttributes = "";
			$this->Services->HrefValue = "";
			$this->Services->TooltipValue = "";

			// LabReport
			$this->LabReport->LinkCustomAttributes = "";
			$this->LabReport->HrefValue = "";
			$this->LabReport->TooltipValue = "";

			// Pic1
			$this->Pic1->LinkCustomAttributes = "";
			$this->Pic1->HrefValue = "";
			$this->Pic1->ExportHrefValue = $this->Pic1->UploadPath . $this->Pic1->Upload->DbValue;
			$this->Pic1->TooltipValue = "";

			// Pic2
			$this->Pic2->LinkCustomAttributes = "";
			$this->Pic2->HrefValue = "";
			$this->Pic2->ExportHrefValue = $this->Pic2->UploadPath . $this->Pic2->Upload->DbValue;
			$this->Pic2->TooltipValue = "";

			// TestUnit
			$this->TestUnit->LinkCustomAttributes = "";
			$this->TestUnit->HrefValue = "";
			$this->TestUnit->TooltipValue = "";

			// RefValue
			$this->RefValue->LinkCustomAttributes = "";
			$this->RefValue->HrefValue = "";
			$this->RefValue->TooltipValue = "";

			// Order
			$this->Order->LinkCustomAttributes = "";
			$this->Order->HrefValue = "";
			$this->Order->TooltipValue = "";

			// Repeated
			$this->Repeated->LinkCustomAttributes = "";
			$this->Repeated->HrefValue = "";
			$this->Repeated->TooltipValue = "";

			// Vid
			$this->Vid->LinkCustomAttributes = "";
			$this->Vid->HrefValue = "";
			$this->Vid->TooltipValue = "";

			// invoiceId
			$this->invoiceId->LinkCustomAttributes = "";
			$this->invoiceId->HrefValue = "";
			$this->invoiceId->TooltipValue = "";

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

			// createddatetime
			$this->createddatetime->LinkCustomAttributes = "";
			$this->createddatetime->HrefValue = "";
			$this->createddatetime->TooltipValue = "";

			// status
			$this->status->LinkCustomAttributes = "";
			$this->status->HrefValue = "";
			$this->status->TooltipValue = "";

			// TestType
			$this->TestType->LinkCustomAttributes = "";
			$this->TestType->HrefValue = "";
			$this->TestType->TooltipValue = "";

			// ResultDate
			$this->ResultDate->LinkCustomAttributes = "";
			$this->ResultDate->HrefValue = "";
			$this->ResultDate->TooltipValue = "";

			// ResultedBy
			$this->ResultedBy->LinkCustomAttributes = "";
			$this->ResultedBy->HrefValue = "";
			$this->ResultedBy->TooltipValue = "";

			// HospID
			$this->HospID->LinkCustomAttributes = "";
			$this->HospID->HrefValue = "";
			$this->HospID->TooltipValue = "";
		} elseif ($this->RowType == ROWTYPE_ADD) { // Add row

			// id
			// PatID

			$this->PatID->EditAttrs["class"] = "form-control";
			$this->PatID->EditCustomAttributes = "";
			$this->PatID->EditValue = HtmlEncode($this->PatID->CurrentValue);
			$this->PatID->PlaceHolder = RemoveHtml($this->PatID->caption());

			// PatientName
			$this->PatientName->EditAttrs["class"] = "form-control";
			$this->PatientName->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->PatientName->CurrentValue = HtmlDecode($this->PatientName->CurrentValue);
			$this->PatientName->EditValue = HtmlEncode($this->PatientName->CurrentValue);
			$this->PatientName->PlaceHolder = RemoveHtml($this->PatientName->caption());

			// Age
			$this->Age->EditAttrs["class"] = "form-control";
			$this->Age->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Age->CurrentValue = HtmlDecode($this->Age->CurrentValue);
			$this->Age->EditValue = HtmlEncode($this->Age->CurrentValue);
			$this->Age->PlaceHolder = RemoveHtml($this->Age->caption());

			// Gender
			$this->Gender->EditAttrs["class"] = "form-control";
			$this->Gender->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Gender->CurrentValue = HtmlDecode($this->Gender->CurrentValue);
			$this->Gender->EditValue = HtmlEncode($this->Gender->CurrentValue);
			$this->Gender->PlaceHolder = RemoveHtml($this->Gender->caption());

			// sid
			$this->sid->EditAttrs["class"] = "form-control";
			$this->sid->EditCustomAttributes = "";
			$this->sid->EditValue = HtmlEncode($this->sid->CurrentValue);
			$this->sid->PlaceHolder = RemoveHtml($this->sid->caption());

			// ItemCode
			$this->ItemCode->EditAttrs["class"] = "form-control";
			$this->ItemCode->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->ItemCode->CurrentValue = HtmlDecode($this->ItemCode->CurrentValue);
			$this->ItemCode->EditValue = HtmlEncode($this->ItemCode->CurrentValue);
			$this->ItemCode->PlaceHolder = RemoveHtml($this->ItemCode->caption());

			// DEptCd
			$this->DEptCd->EditAttrs["class"] = "form-control";
			$this->DEptCd->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->DEptCd->CurrentValue = HtmlDecode($this->DEptCd->CurrentValue);
			$this->DEptCd->EditValue = HtmlEncode($this->DEptCd->CurrentValue);
			$this->DEptCd->PlaceHolder = RemoveHtml($this->DEptCd->caption());

			// Resulted
			$this->Resulted->EditCustomAttributes = "";
			$this->Resulted->EditValue = $this->Resulted->options(FALSE);

			// Services
			$this->Services->EditAttrs["class"] = "form-control";
			$this->Services->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Services->CurrentValue = HtmlDecode($this->Services->CurrentValue);
			$this->Services->EditValue = HtmlEncode($this->Services->CurrentValue);
			$this->Services->PlaceHolder = RemoveHtml($this->Services->caption());

			// LabReport
			$this->LabReport->EditAttrs["class"] = "form-control";
			$this->LabReport->EditCustomAttributes = "";
			$this->LabReport->EditValue = HtmlEncode($this->LabReport->CurrentValue);
			$this->LabReport->PlaceHolder = RemoveHtml($this->LabReport->caption());

			// Pic1
			$this->Pic1->EditAttrs["class"] = "form-control";
			$this->Pic1->EditCustomAttributes = "";
			if (!EmptyValue($this->Pic1->Upload->DbValue)) {
				$this->Pic1->EditValue = $this->Pic1->Upload->DbValue;
			} else {
				$this->Pic1->EditValue = "";
			}
			if (!EmptyValue($this->Pic1->CurrentValue))
					$this->Pic1->Upload->FileName = $this->Pic1->CurrentValue;
			if (is_numeric($this->RowIndex) && !$this->EventCancelled)
				RenderUploadField($this->Pic1, $this->RowIndex);

			// Pic2
			$this->Pic2->EditAttrs["class"] = "form-control";
			$this->Pic2->EditCustomAttributes = "";
			if (!EmptyValue($this->Pic2->Upload->DbValue)) {
				$this->Pic2->EditValue = $this->Pic2->Upload->DbValue;
			} else {
				$this->Pic2->EditValue = "";
			}
			if (!EmptyValue($this->Pic2->CurrentValue))
					$this->Pic2->Upload->FileName = $this->Pic2->CurrentValue;
			if (is_numeric($this->RowIndex) && !$this->EventCancelled)
				RenderUploadField($this->Pic2, $this->RowIndex);

			// TestUnit
			$this->TestUnit->EditAttrs["class"] = "form-control";
			$this->TestUnit->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->TestUnit->CurrentValue = HtmlDecode($this->TestUnit->CurrentValue);
			$this->TestUnit->EditValue = HtmlEncode($this->TestUnit->CurrentValue);
			$curVal = strval($this->TestUnit->CurrentValue);
			if ($curVal <> "") {
				$this->TestUnit->EditValue = $this->TestUnit->lookupCacheOption($curVal);
				if ($this->TestUnit->EditValue === NULL) { // Lookup from database
					$filterWrk = "`Code`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->TestUnit->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = HtmlEncode($rswrk->fields('df'));
						$this->TestUnit->EditValue = $this->TestUnit->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->TestUnit->EditValue = HtmlEncode($this->TestUnit->CurrentValue);
					}
				}
			} else {
				$this->TestUnit->EditValue = NULL;
			}
			$this->TestUnit->PlaceHolder = RemoveHtml($this->TestUnit->caption());

			// RefValue
			$this->RefValue->EditAttrs["class"] = "form-control";
			$this->RefValue->EditCustomAttributes = "";
			$this->RefValue->EditValue = HtmlEncode($this->RefValue->CurrentValue);
			$this->RefValue->PlaceHolder = RemoveHtml($this->RefValue->caption());

			// Order
			$this->Order->EditAttrs["class"] = "form-control";
			$this->Order->EditCustomAttributes = "";
			$this->Order->EditValue = HtmlEncode($this->Order->CurrentValue);
			$this->Order->PlaceHolder = RemoveHtml($this->Order->caption());
			if (strval($this->Order->EditValue) <> "" && is_numeric($this->Order->EditValue)) {
				$this->Order->EditValue = FormatNumber($this->Order->EditValue, -2, -2, -2, -2);
				$this->Order->OldValue = $this->Order->EditValue;
			}

			// Repeated
			$this->Repeated->EditCustomAttributes = "";
			$this->Repeated->EditValue = $this->Repeated->options(FALSE);

			// Vid
			$this->Vid->EditAttrs["class"] = "form-control";
			$this->Vid->EditCustomAttributes = "";
			if ($this->Vid->getSessionValue() <> "") {
				$this->Vid->CurrentValue = $this->Vid->getSessionValue();
				$this->Vid->OldValue = $this->Vid->CurrentValue;
			$this->Vid->ViewValue = $this->Vid->CurrentValue;
			$this->Vid->ViewValue = FormatNumber($this->Vid->ViewValue, 0, -2, -2, -2);
			$this->Vid->ViewCustomAttributes = "";
			} else {
			$this->Vid->EditValue = HtmlEncode($this->Vid->CurrentValue);
			$this->Vid->PlaceHolder = RemoveHtml($this->Vid->caption());
			}

			// invoiceId
			$this->invoiceId->EditAttrs["class"] = "form-control";
			$this->invoiceId->EditCustomAttributes = "";
			$this->invoiceId->EditValue = HtmlEncode($this->invoiceId->CurrentValue);
			$this->invoiceId->PlaceHolder = RemoveHtml($this->invoiceId->caption());

			// DrID
			$this->DrID->EditAttrs["class"] = "form-control";
			$this->DrID->EditCustomAttributes = "";
			$this->DrID->EditValue = HtmlEncode($this->DrID->CurrentValue);
			$this->DrID->PlaceHolder = RemoveHtml($this->DrID->caption());

			// DrCODE
			$this->DrCODE->EditAttrs["class"] = "form-control";
			$this->DrCODE->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->DrCODE->CurrentValue = HtmlDecode($this->DrCODE->CurrentValue);
			$this->DrCODE->EditValue = HtmlEncode($this->DrCODE->CurrentValue);
			$this->DrCODE->PlaceHolder = RemoveHtml($this->DrCODE->caption());

			// DrName
			$this->DrName->EditAttrs["class"] = "form-control";
			$this->DrName->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->DrName->CurrentValue = HtmlDecode($this->DrName->CurrentValue);
			$this->DrName->EditValue = HtmlEncode($this->DrName->CurrentValue);
			$this->DrName->PlaceHolder = RemoveHtml($this->DrName->caption());

			// Department
			$this->Department->EditAttrs["class"] = "form-control";
			$this->Department->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Department->CurrentValue = HtmlDecode($this->Department->CurrentValue);
			$this->Department->EditValue = HtmlEncode($this->Department->CurrentValue);
			$this->Department->PlaceHolder = RemoveHtml($this->Department->caption());

			// createddatetime
			$this->createddatetime->EditAttrs["class"] = "form-control";
			$this->createddatetime->EditCustomAttributes = "";
			$this->createddatetime->EditValue = HtmlEncode(FormatDateTime($this->createddatetime->CurrentValue, 8));
			$this->createddatetime->PlaceHolder = RemoveHtml($this->createddatetime->caption());

			// status
			$this->status->EditAttrs["class"] = "form-control";
			$this->status->EditCustomAttributes = "";
			$this->status->EditValue = HtmlEncode($this->status->CurrentValue);
			$this->status->PlaceHolder = RemoveHtml($this->status->caption());

			// TestType
			$this->TestType->EditAttrs["class"] = "form-control";
			$this->TestType->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->TestType->CurrentValue = HtmlDecode($this->TestType->CurrentValue);
			$this->TestType->EditValue = HtmlEncode($this->TestType->CurrentValue);
			$this->TestType->PlaceHolder = RemoveHtml($this->TestType->caption());

			// ResultDate
			// ResultedBy
			// HospID

			$this->HospID->EditAttrs["class"] = "form-control";
			$this->HospID->EditCustomAttributes = "";
			$this->HospID->EditValue = HtmlEncode($this->HospID->CurrentValue);
			$this->HospID->PlaceHolder = RemoveHtml($this->HospID->caption());

			// Add refer script
			// id

			$this->id->LinkCustomAttributes = "";
			$this->id->HrefValue = "";

			// PatID
			$this->PatID->LinkCustomAttributes = "";
			$this->PatID->HrefValue = "";

			// PatientName
			$this->PatientName->LinkCustomAttributes = "";
			$this->PatientName->HrefValue = "";

			// Age
			$this->Age->LinkCustomAttributes = "";
			$this->Age->HrefValue = "";

			// Gender
			$this->Gender->LinkCustomAttributes = "";
			$this->Gender->HrefValue = "";

			// sid
			$this->sid->LinkCustomAttributes = "";
			$this->sid->HrefValue = "";

			// ItemCode
			$this->ItemCode->LinkCustomAttributes = "";
			$this->ItemCode->HrefValue = "";

			// DEptCd
			$this->DEptCd->LinkCustomAttributes = "";
			$this->DEptCd->HrefValue = "";

			// Resulted
			$this->Resulted->LinkCustomAttributes = "";
			$this->Resulted->HrefValue = "";

			// Services
			$this->Services->LinkCustomAttributes = "";
			$this->Services->HrefValue = "";

			// LabReport
			$this->LabReport->LinkCustomAttributes = "";
			$this->LabReport->HrefValue = "";

			// Pic1
			$this->Pic1->LinkCustomAttributes = "";
			$this->Pic1->HrefValue = "";
			$this->Pic1->ExportHrefValue = $this->Pic1->UploadPath . $this->Pic1->Upload->DbValue;

			// Pic2
			$this->Pic2->LinkCustomAttributes = "";
			$this->Pic2->HrefValue = "";
			$this->Pic2->ExportHrefValue = $this->Pic2->UploadPath . $this->Pic2->Upload->DbValue;

			// TestUnit
			$this->TestUnit->LinkCustomAttributes = "";
			$this->TestUnit->HrefValue = "";

			// RefValue
			$this->RefValue->LinkCustomAttributes = "";
			$this->RefValue->HrefValue = "";

			// Order
			$this->Order->LinkCustomAttributes = "";
			$this->Order->HrefValue = "";

			// Repeated
			$this->Repeated->LinkCustomAttributes = "";
			$this->Repeated->HrefValue = "";

			// Vid
			$this->Vid->LinkCustomAttributes = "";
			$this->Vid->HrefValue = "";

			// invoiceId
			$this->invoiceId->LinkCustomAttributes = "";
			$this->invoiceId->HrefValue = "";

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

			// createddatetime
			$this->createddatetime->LinkCustomAttributes = "";
			$this->createddatetime->HrefValue = "";

			// status
			$this->status->LinkCustomAttributes = "";
			$this->status->HrefValue = "";

			// TestType
			$this->TestType->LinkCustomAttributes = "";
			$this->TestType->HrefValue = "";

			// ResultDate
			$this->ResultDate->LinkCustomAttributes = "";
			$this->ResultDate->HrefValue = "";

			// ResultedBy
			$this->ResultedBy->LinkCustomAttributes = "";
			$this->ResultedBy->HrefValue = "";

			// HospID
			$this->HospID->LinkCustomAttributes = "";
			$this->HospID->HrefValue = "";
		} elseif ($this->RowType == ROWTYPE_EDIT) { // Edit row

			// id
			$this->id->EditAttrs["class"] = "form-control";
			$this->id->EditCustomAttributes = "";
			$this->id->EditValue = $this->id->CurrentValue;
			$this->id->ViewCustomAttributes = "";

			// PatID
			$this->PatID->EditAttrs["class"] = "form-control";
			$this->PatID->EditCustomAttributes = "";
			$this->PatID->EditValue = HtmlEncode($this->PatID->CurrentValue);
			$this->PatID->PlaceHolder = RemoveHtml($this->PatID->caption());

			// PatientName
			$this->PatientName->EditAttrs["class"] = "form-control";
			$this->PatientName->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->PatientName->CurrentValue = HtmlDecode($this->PatientName->CurrentValue);
			$this->PatientName->EditValue = HtmlEncode($this->PatientName->CurrentValue);
			$this->PatientName->PlaceHolder = RemoveHtml($this->PatientName->caption());

			// Age
			$this->Age->EditAttrs["class"] = "form-control";
			$this->Age->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Age->CurrentValue = HtmlDecode($this->Age->CurrentValue);
			$this->Age->EditValue = HtmlEncode($this->Age->CurrentValue);
			$this->Age->PlaceHolder = RemoveHtml($this->Age->caption());

			// Gender
			$this->Gender->EditAttrs["class"] = "form-control";
			$this->Gender->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Gender->CurrentValue = HtmlDecode($this->Gender->CurrentValue);
			$this->Gender->EditValue = HtmlEncode($this->Gender->CurrentValue);
			$this->Gender->PlaceHolder = RemoveHtml($this->Gender->caption());

			// sid
			$this->sid->EditAttrs["class"] = "form-control";
			$this->sid->EditCustomAttributes = "";
			$this->sid->EditValue = HtmlEncode($this->sid->CurrentValue);
			$this->sid->PlaceHolder = RemoveHtml($this->sid->caption());

			// ItemCode
			$this->ItemCode->EditAttrs["class"] = "form-control";
			$this->ItemCode->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->ItemCode->CurrentValue = HtmlDecode($this->ItemCode->CurrentValue);
			$this->ItemCode->EditValue = HtmlEncode($this->ItemCode->CurrentValue);
			$this->ItemCode->PlaceHolder = RemoveHtml($this->ItemCode->caption());

			// DEptCd
			$this->DEptCd->EditAttrs["class"] = "form-control";
			$this->DEptCd->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->DEptCd->CurrentValue = HtmlDecode($this->DEptCd->CurrentValue);
			$this->DEptCd->EditValue = HtmlEncode($this->DEptCd->CurrentValue);
			$this->DEptCd->PlaceHolder = RemoveHtml($this->DEptCd->caption());

			// Resulted
			$this->Resulted->EditCustomAttributes = "";
			$this->Resulted->EditValue = $this->Resulted->options(FALSE);

			// Services
			$this->Services->EditAttrs["class"] = "form-control";
			$this->Services->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Services->CurrentValue = HtmlDecode($this->Services->CurrentValue);
			$this->Services->EditValue = HtmlEncode($this->Services->CurrentValue);
			$this->Services->PlaceHolder = RemoveHtml($this->Services->caption());

			// LabReport
			$this->LabReport->EditAttrs["class"] = "form-control";
			$this->LabReport->EditCustomAttributes = "";
			$this->LabReport->EditValue = HtmlEncode($this->LabReport->CurrentValue);
			$this->LabReport->PlaceHolder = RemoveHtml($this->LabReport->caption());

			// Pic1
			$this->Pic1->EditAttrs["class"] = "form-control";
			$this->Pic1->EditCustomAttributes = "";
			if (!EmptyValue($this->Pic1->Upload->DbValue)) {
				$this->Pic1->EditValue = $this->Pic1->Upload->DbValue;
			} else {
				$this->Pic1->EditValue = "";
			}
			if (!EmptyValue($this->Pic1->CurrentValue))
					$this->Pic1->Upload->FileName = $this->Pic1->CurrentValue;
			if (is_numeric($this->RowIndex) && !$this->EventCancelled)
				RenderUploadField($this->Pic1, $this->RowIndex);

			// Pic2
			$this->Pic2->EditAttrs["class"] = "form-control";
			$this->Pic2->EditCustomAttributes = "";
			if (!EmptyValue($this->Pic2->Upload->DbValue)) {
				$this->Pic2->EditValue = $this->Pic2->Upload->DbValue;
			} else {
				$this->Pic2->EditValue = "";
			}
			if (!EmptyValue($this->Pic2->CurrentValue))
					$this->Pic2->Upload->FileName = $this->Pic2->CurrentValue;
			if (is_numeric($this->RowIndex) && !$this->EventCancelled)
				RenderUploadField($this->Pic2, $this->RowIndex);

			// TestUnit
			$this->TestUnit->EditAttrs["class"] = "form-control";
			$this->TestUnit->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->TestUnit->CurrentValue = HtmlDecode($this->TestUnit->CurrentValue);
			$this->TestUnit->EditValue = HtmlEncode($this->TestUnit->CurrentValue);
			$curVal = strval($this->TestUnit->CurrentValue);
			if ($curVal <> "") {
				$this->TestUnit->EditValue = $this->TestUnit->lookupCacheOption($curVal);
				if ($this->TestUnit->EditValue === NULL) { // Lookup from database
					$filterWrk = "`Code`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->TestUnit->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = HtmlEncode($rswrk->fields('df'));
						$this->TestUnit->EditValue = $this->TestUnit->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->TestUnit->EditValue = HtmlEncode($this->TestUnit->CurrentValue);
					}
				}
			} else {
				$this->TestUnit->EditValue = NULL;
			}
			$this->TestUnit->PlaceHolder = RemoveHtml($this->TestUnit->caption());

			// RefValue
			$this->RefValue->EditAttrs["class"] = "form-control";
			$this->RefValue->EditCustomAttributes = "";
			$this->RefValue->EditValue = HtmlEncode($this->RefValue->CurrentValue);
			$this->RefValue->PlaceHolder = RemoveHtml($this->RefValue->caption());

			// Order
			$this->Order->EditAttrs["class"] = "form-control";
			$this->Order->EditCustomAttributes = "";
			$this->Order->EditValue = HtmlEncode($this->Order->CurrentValue);
			$this->Order->PlaceHolder = RemoveHtml($this->Order->caption());
			if (strval($this->Order->EditValue) <> "" && is_numeric($this->Order->EditValue)) {
				$this->Order->EditValue = FormatNumber($this->Order->EditValue, -2, -2, -2, -2);
				$this->Order->OldValue = $this->Order->EditValue;
			}

			// Repeated
			$this->Repeated->EditCustomAttributes = "";
			$this->Repeated->EditValue = $this->Repeated->options(FALSE);

			// Vid
			$this->Vid->EditAttrs["class"] = "form-control";
			$this->Vid->EditCustomAttributes = "";
			if ($this->Vid->getSessionValue() <> "") {
				$this->Vid->CurrentValue = $this->Vid->getSessionValue();
				$this->Vid->OldValue = $this->Vid->CurrentValue;
			$this->Vid->ViewValue = $this->Vid->CurrentValue;
			$this->Vid->ViewValue = FormatNumber($this->Vid->ViewValue, 0, -2, -2, -2);
			$this->Vid->ViewCustomAttributes = "";
			} else {
			$this->Vid->EditValue = HtmlEncode($this->Vid->CurrentValue);
			$this->Vid->PlaceHolder = RemoveHtml($this->Vid->caption());
			}

			// invoiceId
			$this->invoiceId->EditAttrs["class"] = "form-control";
			$this->invoiceId->EditCustomAttributes = "";
			$this->invoiceId->EditValue = HtmlEncode($this->invoiceId->CurrentValue);
			$this->invoiceId->PlaceHolder = RemoveHtml($this->invoiceId->caption());

			// DrID
			$this->DrID->EditAttrs["class"] = "form-control";
			$this->DrID->EditCustomAttributes = "";
			$this->DrID->EditValue = HtmlEncode($this->DrID->CurrentValue);
			$this->DrID->PlaceHolder = RemoveHtml($this->DrID->caption());

			// DrCODE
			$this->DrCODE->EditAttrs["class"] = "form-control";
			$this->DrCODE->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->DrCODE->CurrentValue = HtmlDecode($this->DrCODE->CurrentValue);
			$this->DrCODE->EditValue = HtmlEncode($this->DrCODE->CurrentValue);
			$this->DrCODE->PlaceHolder = RemoveHtml($this->DrCODE->caption());

			// DrName
			$this->DrName->EditAttrs["class"] = "form-control";
			$this->DrName->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->DrName->CurrentValue = HtmlDecode($this->DrName->CurrentValue);
			$this->DrName->EditValue = HtmlEncode($this->DrName->CurrentValue);
			$this->DrName->PlaceHolder = RemoveHtml($this->DrName->caption());

			// Department
			$this->Department->EditAttrs["class"] = "form-control";
			$this->Department->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Department->CurrentValue = HtmlDecode($this->Department->CurrentValue);
			$this->Department->EditValue = HtmlEncode($this->Department->CurrentValue);
			$this->Department->PlaceHolder = RemoveHtml($this->Department->caption());

			// createddatetime
			$this->createddatetime->EditAttrs["class"] = "form-control";
			$this->createddatetime->EditCustomAttributes = "";
			$this->createddatetime->EditValue = HtmlEncode(FormatDateTime($this->createddatetime->CurrentValue, 8));
			$this->createddatetime->PlaceHolder = RemoveHtml($this->createddatetime->caption());

			// status
			$this->status->EditAttrs["class"] = "form-control";
			$this->status->EditCustomAttributes = "";
			$this->status->EditValue = HtmlEncode($this->status->CurrentValue);
			$this->status->PlaceHolder = RemoveHtml($this->status->caption());

			// TestType
			$this->TestType->EditAttrs["class"] = "form-control";
			$this->TestType->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->TestType->CurrentValue = HtmlDecode($this->TestType->CurrentValue);
			$this->TestType->EditValue = HtmlEncode($this->TestType->CurrentValue);
			$this->TestType->PlaceHolder = RemoveHtml($this->TestType->caption());

			// ResultDate
			// ResultedBy
			// HospID

			$this->HospID->EditAttrs["class"] = "form-control";
			$this->HospID->EditCustomAttributes = "";
			$this->HospID->EditValue = HtmlEncode($this->HospID->CurrentValue);
			$this->HospID->PlaceHolder = RemoveHtml($this->HospID->caption());

			// Edit refer script
			// id

			$this->id->LinkCustomAttributes = "";
			$this->id->HrefValue = "";

			// PatID
			$this->PatID->LinkCustomAttributes = "";
			$this->PatID->HrefValue = "";

			// PatientName
			$this->PatientName->LinkCustomAttributes = "";
			$this->PatientName->HrefValue = "";

			// Age
			$this->Age->LinkCustomAttributes = "";
			$this->Age->HrefValue = "";

			// Gender
			$this->Gender->LinkCustomAttributes = "";
			$this->Gender->HrefValue = "";

			// sid
			$this->sid->LinkCustomAttributes = "";
			$this->sid->HrefValue = "";

			// ItemCode
			$this->ItemCode->LinkCustomAttributes = "";
			$this->ItemCode->HrefValue = "";

			// DEptCd
			$this->DEptCd->LinkCustomAttributes = "";
			$this->DEptCd->HrefValue = "";

			// Resulted
			$this->Resulted->LinkCustomAttributes = "";
			$this->Resulted->HrefValue = "";

			// Services
			$this->Services->LinkCustomAttributes = "";
			$this->Services->HrefValue = "";

			// LabReport
			$this->LabReport->LinkCustomAttributes = "";
			$this->LabReport->HrefValue = "";

			// Pic1
			$this->Pic1->LinkCustomAttributes = "";
			$this->Pic1->HrefValue = "";
			$this->Pic1->ExportHrefValue = $this->Pic1->UploadPath . $this->Pic1->Upload->DbValue;

			// Pic2
			$this->Pic2->LinkCustomAttributes = "";
			$this->Pic2->HrefValue = "";
			$this->Pic2->ExportHrefValue = $this->Pic2->UploadPath . $this->Pic2->Upload->DbValue;

			// TestUnit
			$this->TestUnit->LinkCustomAttributes = "";
			$this->TestUnit->HrefValue = "";

			// RefValue
			$this->RefValue->LinkCustomAttributes = "";
			$this->RefValue->HrefValue = "";

			// Order
			$this->Order->LinkCustomAttributes = "";
			$this->Order->HrefValue = "";

			// Repeated
			$this->Repeated->LinkCustomAttributes = "";
			$this->Repeated->HrefValue = "";

			// Vid
			$this->Vid->LinkCustomAttributes = "";
			$this->Vid->HrefValue = "";

			// invoiceId
			$this->invoiceId->LinkCustomAttributes = "";
			$this->invoiceId->HrefValue = "";

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

			// createddatetime
			$this->createddatetime->LinkCustomAttributes = "";
			$this->createddatetime->HrefValue = "";

			// status
			$this->status->LinkCustomAttributes = "";
			$this->status->HrefValue = "";

			// TestType
			$this->TestType->LinkCustomAttributes = "";
			$this->TestType->HrefValue = "";

			// ResultDate
			$this->ResultDate->LinkCustomAttributes = "";
			$this->ResultDate->HrefValue = "";

			// ResultedBy
			$this->ResultedBy->LinkCustomAttributes = "";
			$this->ResultedBy->HrefValue = "";

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
		if ($this->id->Required) {
			if (!$this->id->IsDetailKey && $this->id->FormValue != NULL && $this->id->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->id->caption(), $this->id->RequiredErrorMessage));
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
		if ($this->DEptCd->Required) {
			if (!$this->DEptCd->IsDetailKey && $this->DEptCd->FormValue != NULL && $this->DEptCd->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->DEptCd->caption(), $this->DEptCd->RequiredErrorMessage));
			}
		}
		if ($this->Resulted->Required) {
			if ($this->Resulted->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Resulted->caption(), $this->Resulted->RequiredErrorMessage));
			}
		}
		if ($this->Services->Required) {
			if (!$this->Services->IsDetailKey && $this->Services->FormValue != NULL && $this->Services->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Services->caption(), $this->Services->RequiredErrorMessage));
			}
		}
		if ($this->LabReport->Required) {
			if (!$this->LabReport->IsDetailKey && $this->LabReport->FormValue != NULL && $this->LabReport->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->LabReport->caption(), $this->LabReport->RequiredErrorMessage));
			}
		}
		if ($this->Pic1->Required) {
			if ($this->Pic1->Upload->FileName == "" && !$this->Pic1->Upload->KeepFile) {
				AddMessage($FormError, str_replace("%s", $this->Pic1->caption(), $this->Pic1->RequiredErrorMessage));
			}
		}
		if ($this->Pic2->Required) {
			if ($this->Pic2->Upload->FileName == "" && !$this->Pic2->Upload->KeepFile) {
				AddMessage($FormError, str_replace("%s", $this->Pic2->caption(), $this->Pic2->RequiredErrorMessage));
			}
		}
		if ($this->TestUnit->Required) {
			if (!$this->TestUnit->IsDetailKey && $this->TestUnit->FormValue != NULL && $this->TestUnit->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->TestUnit->caption(), $this->TestUnit->RequiredErrorMessage));
			}
		}
		if ($this->RefValue->Required) {
			if (!$this->RefValue->IsDetailKey && $this->RefValue->FormValue != NULL && $this->RefValue->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->RefValue->caption(), $this->RefValue->RequiredErrorMessage));
			}
		}
		if ($this->Order->Required) {
			if (!$this->Order->IsDetailKey && $this->Order->FormValue != NULL && $this->Order->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Order->caption(), $this->Order->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->Order->FormValue)) {
			AddMessage($FormError, $this->Order->errorMessage());
		}
		if ($this->Repeated->Required) {
			if ($this->Repeated->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Repeated->caption(), $this->Repeated->RequiredErrorMessage));
			}
		}
		if ($this->Vid->Required) {
			if (!$this->Vid->IsDetailKey && $this->Vid->FormValue != NULL && $this->Vid->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Vid->caption(), $this->Vid->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->Vid->FormValue)) {
			AddMessage($FormError, $this->Vid->errorMessage());
		}
		if ($this->invoiceId->Required) {
			if (!$this->invoiceId->IsDetailKey && $this->invoiceId->FormValue != NULL && $this->invoiceId->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->invoiceId->caption(), $this->invoiceId->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->invoiceId->FormValue)) {
			AddMessage($FormError, $this->invoiceId->errorMessage());
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
		if ($this->createddatetime->Required) {
			if (!$this->createddatetime->IsDetailKey && $this->createddatetime->FormValue != NULL && $this->createddatetime->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->createddatetime->caption(), $this->createddatetime->RequiredErrorMessage));
			}
		}
		if (!CheckDate($this->createddatetime->FormValue)) {
			AddMessage($FormError, $this->createddatetime->errorMessage());
		}
		if ($this->status->Required) {
			if (!$this->status->IsDetailKey && $this->status->FormValue != NULL && $this->status->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->status->caption(), $this->status->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->status->FormValue)) {
			AddMessage($FormError, $this->status->errorMessage());
		}
		if ($this->TestType->Required) {
			if (!$this->TestType->IsDetailKey && $this->TestType->FormValue != NULL && $this->TestType->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->TestType->caption(), $this->TestType->RequiredErrorMessage));
			}
		}
		if ($this->ResultDate->Required) {
			if (!$this->ResultDate->IsDetailKey && $this->ResultDate->FormValue != NULL && $this->ResultDate->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->ResultDate->caption(), $this->ResultDate->RequiredErrorMessage));
			}
		}
		if ($this->ResultedBy->Required) {
			if (!$this->ResultedBy->IsDetailKey && $this->ResultedBy->FormValue != NULL && $this->ResultedBy->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->ResultedBy->caption(), $this->ResultedBy->RequiredErrorMessage));
			}
		}
		if ($this->HospID->Required) {
			if (!$this->HospID->IsDetailKey && $this->HospID->FormValue != NULL && $this->HospID->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->HospID->caption(), $this->HospID->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->HospID->FormValue)) {
			AddMessage($FormError, $this->HospID->errorMessage());
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
				if ($thisKey <> "")
					$thisKey .= $GLOBALS["COMPOSITE_KEY_SEPARATOR"];
				$thisKey .= $row['id'];
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

			// PatID
			$this->PatID->setDbValueDef($rsnew, $this->PatID->CurrentValue, NULL, $this->PatID->ReadOnly);

			// PatientName
			$this->PatientName->setDbValueDef($rsnew, $this->PatientName->CurrentValue, NULL, $this->PatientName->ReadOnly);

			// Age
			$this->Age->setDbValueDef($rsnew, $this->Age->CurrentValue, NULL, $this->Age->ReadOnly);

			// Gender
			$this->Gender->setDbValueDef($rsnew, $this->Gender->CurrentValue, NULL, $this->Gender->ReadOnly);

			// sid
			$this->sid->setDbValueDef($rsnew, $this->sid->CurrentValue, NULL, $this->sid->ReadOnly);

			// ItemCode
			$this->ItemCode->setDbValueDef($rsnew, $this->ItemCode->CurrentValue, NULL, $this->ItemCode->ReadOnly);

			// DEptCd
			$this->DEptCd->setDbValueDef($rsnew, $this->DEptCd->CurrentValue, NULL, $this->DEptCd->ReadOnly);

			// Resulted
			$this->Resulted->setDbValueDef($rsnew, $this->Resulted->CurrentValue, NULL, $this->Resulted->ReadOnly);

			// Services
			$this->Services->setDbValueDef($rsnew, $this->Services->CurrentValue, "", $this->Services->ReadOnly);

			// LabReport
			$this->LabReport->setDbValueDef($rsnew, $this->LabReport->CurrentValue, NULL, $this->LabReport->ReadOnly);

			// Pic1
			if ($this->Pic1->Visible && !$this->Pic1->ReadOnly && !$this->Pic1->Upload->KeepFile) {
				$this->Pic1->Upload->DbValue = $rsold['Pic1']; // Get original value
				if ($this->Pic1->Upload->FileName == "") {
					$rsnew['Pic1'] = NULL;
				} else {
					$rsnew['Pic1'] = $this->Pic1->Upload->FileName;
				}
			}

			// Pic2
			if ($this->Pic2->Visible && !$this->Pic2->ReadOnly && !$this->Pic2->Upload->KeepFile) {
				$this->Pic2->Upload->DbValue = $rsold['Pic2']; // Get original value
				if ($this->Pic2->Upload->FileName == "") {
					$rsnew['Pic2'] = NULL;
				} else {
					$rsnew['Pic2'] = $this->Pic2->Upload->FileName;
				}
			}

			// TestUnit
			$this->TestUnit->setDbValueDef($rsnew, $this->TestUnit->CurrentValue, NULL, $this->TestUnit->ReadOnly);

			// RefValue
			$this->RefValue->setDbValueDef($rsnew, $this->RefValue->CurrentValue, NULL, $this->RefValue->ReadOnly);

			// Order
			$this->Order->setDbValueDef($rsnew, $this->Order->CurrentValue, NULL, $this->Order->ReadOnly);

			// Repeated
			$this->Repeated->setDbValueDef($rsnew, $this->Repeated->CurrentValue, NULL, $this->Repeated->ReadOnly);

			// Vid
			$this->Vid->setDbValueDef($rsnew, $this->Vid->CurrentValue, NULL, $this->Vid->ReadOnly);

			// invoiceId
			$this->invoiceId->setDbValueDef($rsnew, $this->invoiceId->CurrentValue, NULL, $this->invoiceId->ReadOnly);

			// DrID
			$this->DrID->setDbValueDef($rsnew, $this->DrID->CurrentValue, NULL, $this->DrID->ReadOnly);

			// DrCODE
			$this->DrCODE->setDbValueDef($rsnew, $this->DrCODE->CurrentValue, NULL, $this->DrCODE->ReadOnly);

			// DrName
			$this->DrName->setDbValueDef($rsnew, $this->DrName->CurrentValue, NULL, $this->DrName->ReadOnly);

			// Department
			$this->Department->setDbValueDef($rsnew, $this->Department->CurrentValue, NULL, $this->Department->ReadOnly);

			// createddatetime
			$this->createddatetime->setDbValueDef($rsnew, UnFormatDateTime($this->createddatetime->CurrentValue, 0), NULL, $this->createddatetime->ReadOnly);

			// status
			$this->status->setDbValueDef($rsnew, $this->status->CurrentValue, NULL, $this->status->ReadOnly);

			// TestType
			$this->TestType->setDbValueDef($rsnew, $this->TestType->CurrentValue, NULL, $this->TestType->ReadOnly);

			// ResultDate
			$this->ResultDate->setDbValueDef($rsnew, CurrentDateTime(), NULL);
			$rsnew['ResultDate'] = &$this->ResultDate->DbValue;

			// ResultedBy
			$this->ResultedBy->setDbValueDef($rsnew, CurrentUserName(), NULL);
			$rsnew['ResultedBy'] = &$this->ResultedBy->DbValue;

			// HospID
			$this->HospID->setDbValueDef($rsnew, $this->HospID->CurrentValue, NULL, $this->HospID->ReadOnly);
			if ($this->Pic1->Visible && !$this->Pic1->Upload->KeepFile) {
				$oldFiles = EmptyValue($this->Pic1->Upload->DbValue) ? array() : array($this->Pic1->Upload->DbValue);
				if (!EmptyValue($this->Pic1->Upload->FileName)) {
					$newFiles = array($this->Pic1->Upload->FileName);
					$NewFileCount = count($newFiles);
					for ($i = 0; $i < $NewFileCount; $i++) {
						if ($newFiles[$i] <> "") {
							$file = $newFiles[$i];
							if (file_exists(UploadTempPath($this->Pic1, $this->Pic1->Upload->Index) . $file)) {
								if (DELETE_UPLOADED_FILES) {
									$oldFileFound = FALSE;
									$oldFileCount = count($oldFiles);
									for ($j = 0; $j < $oldFileCount; $j++) {
										$oldFile = $oldFiles[$j];
										if ($oldFile == $file) { // Old file found, no need to delete anymore
											unset($oldFiles[$j]);
											$oldFileFound = TRUE;
											break;
										}
									}
									if ($oldFileFound) // No need to check if file exists further
										continue;
								}
								$file1 = UniqueFilename($this->Pic1->physicalUploadPath(), $file); // Get new file name
								if ($file1 <> $file) { // Rename temp file
									while (file_exists(UploadTempPath($this->Pic1, $this->Pic1->Upload->Index) . $file1) || file_exists($this->Pic1->physicalUploadPath() . $file1)) // Make sure no file name clash
										$file1 = UniqueFilename($this->Pic1->physicalUploadPath(), $file1, TRUE); // Use indexed name
									rename(UploadTempPath($this->Pic1, $this->Pic1->Upload->Index) . $file, UploadTempPath($this->Pic1, $this->Pic1->Upload->Index) . $file1);
									$newFiles[$i] = $file1;
								}
							}
						}
					}
					$this->Pic1->Upload->DbValue = empty($oldFiles) ? "" : implode(MULTIPLE_UPLOAD_SEPARATOR, $oldFiles);
					$this->Pic1->Upload->FileName = implode(MULTIPLE_UPLOAD_SEPARATOR, $newFiles);
					$this->Pic1->setDbValueDef($rsnew, $this->Pic1->Upload->FileName, NULL, $this->Pic1->ReadOnly);
				}
			}
			if ($this->Pic2->Visible && !$this->Pic2->Upload->KeepFile) {
				$oldFiles = EmptyValue($this->Pic2->Upload->DbValue) ? array() : array($this->Pic2->Upload->DbValue);
				if (!EmptyValue($this->Pic2->Upload->FileName)) {
					$newFiles = array($this->Pic2->Upload->FileName);
					$NewFileCount = count($newFiles);
					for ($i = 0; $i < $NewFileCount; $i++) {
						if ($newFiles[$i] <> "") {
							$file = $newFiles[$i];
							if (file_exists(UploadTempPath($this->Pic2, $this->Pic2->Upload->Index) . $file)) {
								if (DELETE_UPLOADED_FILES) {
									$oldFileFound = FALSE;
									$oldFileCount = count($oldFiles);
									for ($j = 0; $j < $oldFileCount; $j++) {
										$oldFile = $oldFiles[$j];
										if ($oldFile == $file) { // Old file found, no need to delete anymore
											unset($oldFiles[$j]);
											$oldFileFound = TRUE;
											break;
										}
									}
									if ($oldFileFound) // No need to check if file exists further
										continue;
								}
								$file1 = UniqueFilename($this->Pic2->physicalUploadPath(), $file); // Get new file name
								if ($file1 <> $file) { // Rename temp file
									while (file_exists(UploadTempPath($this->Pic2, $this->Pic2->Upload->Index) . $file1) || file_exists($this->Pic2->physicalUploadPath() . $file1)) // Make sure no file name clash
										$file1 = UniqueFilename($this->Pic2->physicalUploadPath(), $file1, TRUE); // Use indexed name
									rename(UploadTempPath($this->Pic2, $this->Pic2->Upload->Index) . $file, UploadTempPath($this->Pic2, $this->Pic2->Upload->Index) . $file1);
									$newFiles[$i] = $file1;
								}
							}
						}
					}
					$this->Pic2->Upload->DbValue = empty($oldFiles) ? "" : implode(MULTIPLE_UPLOAD_SEPARATOR, $oldFiles);
					$this->Pic2->Upload->FileName = implode(MULTIPLE_UPLOAD_SEPARATOR, $newFiles);
					$this->Pic2->setDbValueDef($rsnew, $this->Pic2->Upload->FileName, NULL, $this->Pic2->ReadOnly);
				}
			}

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
					if ($this->Pic1->Visible && !$this->Pic1->Upload->KeepFile) {
						$oldFiles = EmptyValue($this->Pic1->Upload->DbValue) ? array() : array($this->Pic1->Upload->DbValue);
						if (!EmptyValue($this->Pic1->Upload->FileName)) {
							$newFiles = array($this->Pic1->Upload->FileName);
							$newFiles2 = array($rsnew['Pic1']);
							$newFileCount = count($newFiles);
							for ($i = 0; $i < $newFileCount; $i++) {
								if ($newFiles[$i] <> "") {
									$file = UploadTempPath($this->Pic1, $this->Pic1->Upload->Index) . $newFiles[$i];
									if (file_exists($file)) {
										if (@$newFiles2[$i] <> "") // Use correct file name
											$newFiles[$i] = $newFiles2[$i];
										if (!$this->Pic1->Upload->saveToFile($newFiles[$i], TRUE, $i)) { // Just replace
											$this->setFailureMessage($Language->phrase("UploadErrMsg7"));
											return FALSE;
										}
									}
								}
							}
						} else {
							$newFiles = array();
						}
						if (DELETE_UPLOADED_FILES) {
							foreach ($oldFiles as $oldFile) {
								if ($oldFile <> "" && !in_array($oldFile, $newFiles))
									@unlink($this->Pic1->oldPhysicalUploadPath() . $oldFile);
							}
						}
					}
					if ($this->Pic2->Visible && !$this->Pic2->Upload->KeepFile) {
						$oldFiles = EmptyValue($this->Pic2->Upload->DbValue) ? array() : array($this->Pic2->Upload->DbValue);
						if (!EmptyValue($this->Pic2->Upload->FileName)) {
							$newFiles = array($this->Pic2->Upload->FileName);
							$newFiles2 = array($rsnew['Pic2']);
							$newFileCount = count($newFiles);
							for ($i = 0; $i < $newFileCount; $i++) {
								if ($newFiles[$i] <> "") {
									$file = UploadTempPath($this->Pic2, $this->Pic2->Upload->Index) . $newFiles[$i];
									if (file_exists($file)) {
										if (@$newFiles2[$i] <> "") // Use correct file name
											$newFiles[$i] = $newFiles2[$i];
										if (!$this->Pic2->Upload->saveToFile($newFiles[$i], TRUE, $i)) { // Just replace
											$this->setFailureMessage($Language->phrase("UploadErrMsg7"));
											return FALSE;
										}
									}
								}
							}
						} else {
							$newFiles = array();
						}
						if (DELETE_UPLOADED_FILES) {
							foreach ($oldFiles as $oldFile) {
								if ($oldFile <> "" && !in_array($oldFile, $newFiles))
									@unlink($this->Pic2->oldPhysicalUploadPath() . $oldFile);
							}
						}
					}
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

		// Pic1
		if ($this->Pic1->Upload->FileToken <> "")
			CleanUploadTempPath($this->Pic1->Upload->FileToken, $this->Pic1->Upload->Index);
		else
			CleanUploadTempPath($this->Pic1, $this->Pic1->Upload->Index);

		// Pic2
		if ($this->Pic2->Upload->FileToken <> "")
			CleanUploadTempPath($this->Pic2->Upload->FileToken, $this->Pic2->Upload->Index);
		else
			CleanUploadTempPath($this->Pic2, $this->Pic2->Upload->Index);

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
			if ($this->getCurrentMasterTable() == "view_lab_servicess") {
				$this->Vid->CurrentValue = $this->Vid->getSessionValue();
			}
		$conn = &$this->getConnection();

		// Load db values from rsold
		$this->loadDbValues($rsold);
		if ($rsold) {
		}
		$rsnew = [];

		// PatID
		$this->PatID->setDbValueDef($rsnew, $this->PatID->CurrentValue, NULL, FALSE);

		// PatientName
		$this->PatientName->setDbValueDef($rsnew, $this->PatientName->CurrentValue, NULL, FALSE);

		// Age
		$this->Age->setDbValueDef($rsnew, $this->Age->CurrentValue, NULL, FALSE);

		// Gender
		$this->Gender->setDbValueDef($rsnew, $this->Gender->CurrentValue, NULL, FALSE);

		// sid
		$this->sid->setDbValueDef($rsnew, $this->sid->CurrentValue, NULL, FALSE);

		// ItemCode
		$this->ItemCode->setDbValueDef($rsnew, $this->ItemCode->CurrentValue, NULL, FALSE);

		// DEptCd
		$this->DEptCd->setDbValueDef($rsnew, $this->DEptCd->CurrentValue, NULL, FALSE);

		// Resulted
		$this->Resulted->setDbValueDef($rsnew, $this->Resulted->CurrentValue, NULL, FALSE);

		// Services
		$this->Services->setDbValueDef($rsnew, $this->Services->CurrentValue, "", FALSE);

		// LabReport
		$this->LabReport->setDbValueDef($rsnew, $this->LabReport->CurrentValue, NULL, FALSE);

		// Pic1
		if ($this->Pic1->Visible && !$this->Pic1->Upload->KeepFile) {
			$this->Pic1->Upload->DbValue = ""; // No need to delete old file
			if ($this->Pic1->Upload->FileName == "") {
				$rsnew['Pic1'] = NULL;
			} else {
				$rsnew['Pic1'] = $this->Pic1->Upload->FileName;
			}
		}

		// Pic2
		if ($this->Pic2->Visible && !$this->Pic2->Upload->KeepFile) {
			$this->Pic2->Upload->DbValue = ""; // No need to delete old file
			if ($this->Pic2->Upload->FileName == "") {
				$rsnew['Pic2'] = NULL;
			} else {
				$rsnew['Pic2'] = $this->Pic2->Upload->FileName;
			}
		}

		// TestUnit
		$this->TestUnit->setDbValueDef($rsnew, $this->TestUnit->CurrentValue, NULL, FALSE);

		// RefValue
		$this->RefValue->setDbValueDef($rsnew, $this->RefValue->CurrentValue, NULL, FALSE);

		// Order
		$this->Order->setDbValueDef($rsnew, $this->Order->CurrentValue, NULL, FALSE);

		// Repeated
		$this->Repeated->setDbValueDef($rsnew, $this->Repeated->CurrentValue, NULL, FALSE);

		// Vid
		$this->Vid->setDbValueDef($rsnew, $this->Vid->CurrentValue, NULL, FALSE);

		// invoiceId
		$this->invoiceId->setDbValueDef($rsnew, $this->invoiceId->CurrentValue, NULL, FALSE);

		// DrID
		$this->DrID->setDbValueDef($rsnew, $this->DrID->CurrentValue, NULL, FALSE);

		// DrCODE
		$this->DrCODE->setDbValueDef($rsnew, $this->DrCODE->CurrentValue, NULL, FALSE);

		// DrName
		$this->DrName->setDbValueDef($rsnew, $this->DrName->CurrentValue, NULL, FALSE);

		// Department
		$this->Department->setDbValueDef($rsnew, $this->Department->CurrentValue, NULL, FALSE);

		// createddatetime
		$this->createddatetime->setDbValueDef($rsnew, UnFormatDateTime($this->createddatetime->CurrentValue, 0), NULL, FALSE);

		// status
		$this->status->setDbValueDef($rsnew, $this->status->CurrentValue, NULL, FALSE);

		// TestType
		$this->TestType->setDbValueDef($rsnew, $this->TestType->CurrentValue, NULL, strval($this->TestType->CurrentValue) == "");

		// ResultDate
		$this->ResultDate->setDbValueDef($rsnew, CurrentDateTime(), NULL);
		$rsnew['ResultDate'] = &$this->ResultDate->DbValue;

		// ResultedBy
		$this->ResultedBy->setDbValueDef($rsnew, CurrentUserName(), NULL);
		$rsnew['ResultedBy'] = &$this->ResultedBy->DbValue;

		// HospID
		$this->HospID->setDbValueDef($rsnew, $this->HospID->CurrentValue, NULL, FALSE);
		if ($this->Pic1->Visible && !$this->Pic1->Upload->KeepFile) {
			$oldFiles = EmptyValue($this->Pic1->Upload->DbValue) ? array() : array($this->Pic1->Upload->DbValue);
			if (!EmptyValue($this->Pic1->Upload->FileName)) {
				$newFiles = array($this->Pic1->Upload->FileName);
				$NewFileCount = count($newFiles);
				for ($i = 0; $i < $NewFileCount; $i++) {
					if ($newFiles[$i] <> "") {
						$file = $newFiles[$i];
						if (file_exists(UploadTempPath($this->Pic1, $this->Pic1->Upload->Index) . $file)) {
							if (DELETE_UPLOADED_FILES) {
								$oldFileFound = FALSE;
								$oldFileCount = count($oldFiles);
								for ($j = 0; $j < $oldFileCount; $j++) {
									$oldFile = $oldFiles[$j];
									if ($oldFile == $file) { // Old file found, no need to delete anymore
										unset($oldFiles[$j]);
										$oldFileFound = TRUE;
										break;
									}
								}
								if ($oldFileFound) // No need to check if file exists further
									continue;
							}
							$file1 = UniqueFilename($this->Pic1->physicalUploadPath(), $file); // Get new file name
							if ($file1 <> $file) { // Rename temp file
								while (file_exists(UploadTempPath($this->Pic1, $this->Pic1->Upload->Index) . $file1) || file_exists($this->Pic1->physicalUploadPath() . $file1)) // Make sure no file name clash
									$file1 = UniqueFilename($this->Pic1->physicalUploadPath(), $file1, TRUE); // Use indexed name
								rename(UploadTempPath($this->Pic1, $this->Pic1->Upload->Index) . $file, UploadTempPath($this->Pic1, $this->Pic1->Upload->Index) . $file1);
								$newFiles[$i] = $file1;
							}
						}
					}
				}
				$this->Pic1->Upload->DbValue = empty($oldFiles) ? "" : implode(MULTIPLE_UPLOAD_SEPARATOR, $oldFiles);
				$this->Pic1->Upload->FileName = implode(MULTIPLE_UPLOAD_SEPARATOR, $newFiles);
				$this->Pic1->setDbValueDef($rsnew, $this->Pic1->Upload->FileName, NULL, FALSE);
			}
		}
		if ($this->Pic2->Visible && !$this->Pic2->Upload->KeepFile) {
			$oldFiles = EmptyValue($this->Pic2->Upload->DbValue) ? array() : array($this->Pic2->Upload->DbValue);
			if (!EmptyValue($this->Pic2->Upload->FileName)) {
				$newFiles = array($this->Pic2->Upload->FileName);
				$NewFileCount = count($newFiles);
				for ($i = 0; $i < $NewFileCount; $i++) {
					if ($newFiles[$i] <> "") {
						$file = $newFiles[$i];
						if (file_exists(UploadTempPath($this->Pic2, $this->Pic2->Upload->Index) . $file)) {
							if (DELETE_UPLOADED_FILES) {
								$oldFileFound = FALSE;
								$oldFileCount = count($oldFiles);
								for ($j = 0; $j < $oldFileCount; $j++) {
									$oldFile = $oldFiles[$j];
									if ($oldFile == $file) { // Old file found, no need to delete anymore
										unset($oldFiles[$j]);
										$oldFileFound = TRUE;
										break;
									}
								}
								if ($oldFileFound) // No need to check if file exists further
									continue;
							}
							$file1 = UniqueFilename($this->Pic2->physicalUploadPath(), $file); // Get new file name
							if ($file1 <> $file) { // Rename temp file
								while (file_exists(UploadTempPath($this->Pic2, $this->Pic2->Upload->Index) . $file1) || file_exists($this->Pic2->physicalUploadPath() . $file1)) // Make sure no file name clash
									$file1 = UniqueFilename($this->Pic2->physicalUploadPath(), $file1, TRUE); // Use indexed name
								rename(UploadTempPath($this->Pic2, $this->Pic2->Upload->Index) . $file, UploadTempPath($this->Pic2, $this->Pic2->Upload->Index) . $file1);
								$newFiles[$i] = $file1;
							}
						}
					}
				}
				$this->Pic2->Upload->DbValue = empty($oldFiles) ? "" : implode(MULTIPLE_UPLOAD_SEPARATOR, $oldFiles);
				$this->Pic2->Upload->FileName = implode(MULTIPLE_UPLOAD_SEPARATOR, $newFiles);
				$this->Pic2->setDbValueDef($rsnew, $this->Pic2->Upload->FileName, NULL, FALSE);
			}
		}

		// Call Row Inserting event
		$rs = ($rsold) ? $rsold->fields : NULL;
		$insertRow = $this->Row_Inserting($rs, $rsnew);
		if ($insertRow) {
			$conn->raiseErrorFn = $GLOBALS["ERROR_FUNC"];
			$addRow = $this->insert($rsnew);
			$conn->raiseErrorFn = '';
			if ($addRow) {
				if ($this->Pic1->Visible && !$this->Pic1->Upload->KeepFile) {
					$oldFiles = EmptyValue($this->Pic1->Upload->DbValue) ? array() : array($this->Pic1->Upload->DbValue);
					if (!EmptyValue($this->Pic1->Upload->FileName)) {
						$newFiles = array($this->Pic1->Upload->FileName);
						$newFiles2 = array($rsnew['Pic1']);
						$newFileCount = count($newFiles);
						for ($i = 0; $i < $newFileCount; $i++) {
							if ($newFiles[$i] <> "") {
								$file = UploadTempPath($this->Pic1, $this->Pic1->Upload->Index) . $newFiles[$i];
								if (file_exists($file)) {
									if (@$newFiles2[$i] <> "") // Use correct file name
										$newFiles[$i] = $newFiles2[$i];
									if (!$this->Pic1->Upload->saveToFile($newFiles[$i], TRUE, $i)) { // Just replace
										$this->setFailureMessage($Language->phrase("UploadErrMsg7"));
										return FALSE;
									}
								}
							}
						}
					} else {
						$newFiles = array();
					}
					if (DELETE_UPLOADED_FILES) {
						foreach ($oldFiles as $oldFile) {
							if ($oldFile <> "" && !in_array($oldFile, $newFiles))
								@unlink($this->Pic1->oldPhysicalUploadPath() . $oldFile);
						}
					}
				}
				if ($this->Pic2->Visible && !$this->Pic2->Upload->KeepFile) {
					$oldFiles = EmptyValue($this->Pic2->Upload->DbValue) ? array() : array($this->Pic2->Upload->DbValue);
					if (!EmptyValue($this->Pic2->Upload->FileName)) {
						$newFiles = array($this->Pic2->Upload->FileName);
						$newFiles2 = array($rsnew['Pic2']);
						$newFileCount = count($newFiles);
						for ($i = 0; $i < $newFileCount; $i++) {
							if ($newFiles[$i] <> "") {
								$file = UploadTempPath($this->Pic2, $this->Pic2->Upload->Index) . $newFiles[$i];
								if (file_exists($file)) {
									if (@$newFiles2[$i] <> "") // Use correct file name
										$newFiles[$i] = $newFiles2[$i];
									if (!$this->Pic2->Upload->saveToFile($newFiles[$i], TRUE, $i)) { // Just replace
										$this->setFailureMessage($Language->phrase("UploadErrMsg7"));
										return FALSE;
									}
								}
							}
						}
					} else {
						$newFiles = array();
					}
					if (DELETE_UPLOADED_FILES) {
						foreach ($oldFiles as $oldFile) {
							if ($oldFile <> "" && !in_array($oldFile, $newFiles))
								@unlink($this->Pic2->oldPhysicalUploadPath() . $oldFile);
						}
					}
				}
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

		// Pic1
		if ($this->Pic1->Upload->FileToken <> "")
			CleanUploadTempPath($this->Pic1->Upload->FileToken, $this->Pic1->Upload->Index);
		else
			CleanUploadTempPath($this->Pic1, $this->Pic1->Upload->Index);

		// Pic2
		if ($this->Pic2->Upload->FileToken <> "")
			CleanUploadTempPath($this->Pic2->Upload->FileToken, $this->Pic2->Upload->Index);
		else
			CleanUploadTempPath($this->Pic2, $this->Pic2->Upload->Index);

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
		if ($masterTblVar == "view_lab_servicess") {
			$this->Vid->Visible = FALSE;
			if ($GLOBALS["view_lab_servicess"]->EventCancelled)
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
						case "x_TestUnit":
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
	$this->id->Visible = FALSE;
	$this->PatID->Visible = FALSE;
	$this->PatientName->Visible = FALSE;
	$this->Age->Visible = FALSE;
	$this->sid->Visible = FALSE;
	$this->ItemCode->Visible = FALSE;
	$this->DEptCd->Visible = FALSE;
	$this->Gender->Visible = FALSE;
	$this->Vid->Visible = FALSE;
	$this->invoiceId->Visible = FALSE;
	$this->DrID->Visible = FALSE;
	$this->DrCODE->Visible = FALSE;
	$this->DrName->Visible = FALSE;
	$this->Department->Visible = FALSE;
	$this->createddatetime->Visible = FALSE;
	$this->status->Visible = FALSE;
	$this->TestType->Visible = FALSE;
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
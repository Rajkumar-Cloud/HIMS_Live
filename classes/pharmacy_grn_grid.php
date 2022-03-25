<?php
namespace PHPMaker2019\HIMS;

/**
 * Page class
 */
class pharmacy_grn_grid extends pharmacy_grn
{

	// Page ID
	public $PageID = "grid";

	// Project ID
	public $ProjectID = "{EA4F6D13-AF8F-428D-9EA7-BA88D1107EC3}";

	// Table name
	public $TableName = 'pharmacy_grn';

	// Page object name
	public $PageObjName = "pharmacy_grn_grid";

	// Grid form hidden field names
	public $FormName = "fpharmacy_grngrid";
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

		// Table object (pharmacy_grn)
		if (!isset($GLOBALS["pharmacy_grn"]) || get_class($GLOBALS["pharmacy_grn"]) == PROJECT_NAMESPACE . "pharmacy_grn") {
			$GLOBALS["pharmacy_grn"] = &$this;

			// $GLOBALS["MasterTable"] = &$GLOBALS["Table"];
			// if (!isset($GLOBALS["Table"]))
			// 	$GLOBALS["Table"] = &$GLOBALS["pharmacy_grn"];

		}
		$this->AddUrl = "pharmacy_grnadd.php";
		$this->CancelUrl = $this->pageUrl() . "action=cancel";

		// Table object (user_login)
		if (!isset($GLOBALS['user_login']))
			$GLOBALS['user_login'] = new user_login();

		// Page ID
		if (!defined(PROJECT_NAMESPACE . "PAGE_ID"))
			define(PROJECT_NAMESPACE . "PAGE_ID", 'grid');

		// Table name (for backward compatibility)
		if (!defined(PROJECT_NAMESPACE . "TABLE_NAME"))
			define(PROJECT_NAMESPACE . "TABLE_NAME", 'pharmacy_grn');

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
		global $EXPORT, $pharmacy_grn;
		if ($this->CustomExport && $this->CustomExport == $this->Export && array_key_exists($this->CustomExport, $EXPORT)) {
				$content = ob_get_contents();
			if ($ExportFileName == "")
				$ExportFileName = $this->TableVar;
			$class = PROJECT_NAMESPACE . $EXPORT[$this->CustomExport];
			if (class_exists($class)) {
				$doc = new $class($pharmacy_grn);
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
			$this->HospID->Visible = FALSE;
		if ($this->isAddOrEdit())
			$this->createdby->Visible = FALSE;
		if ($this->isAddOrEdit())
			$this->createddatetime->Visible = FALSE;
		if ($this->isAddOrEdit())
			$this->modifiedby->Visible = FALSE;
		if ($this->isAddOrEdit())
			$this->modifieddatetime->Visible = FALSE;
		if ($this->isAddOrEdit())
			$this->PharmacyID->Visible = FALSE;
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
	public $DisplayRecs = 8;
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
		$this->GRNNO->setVisibility();
		$this->DT->setVisibility();
		$this->YM->Visible = FALSE;
		$this->PC->Visible = FALSE;
		$this->Customercode->Visible = FALSE;
		$this->Customername->setVisibility();
		$this->pharmacy_pocol->Visible = FALSE;
		$this->Address1->Visible = FALSE;
		$this->Address2->Visible = FALSE;
		$this->Address3->Visible = FALSE;
		$this->State->setVisibility();
		$this->Pincode->setVisibility();
		$this->Phone->setVisibility();
		$this->Fax->Visible = FALSE;
		$this->EEmail->Visible = FALSE;
		$this->HospID->Visible = FALSE;
		$this->createdby->Visible = FALSE;
		$this->createddatetime->Visible = FALSE;
		$this->modifiedby->Visible = FALSE;
		$this->modifieddatetime->Visible = FALSE;
		$this->BILLNO->setVisibility();
		$this->BILLDT->setVisibility();
		$this->BRCODE->Visible = FALSE;
		$this->PharmacyID->Visible = FALSE;
		$this->BillTotalValue->setVisibility();
		$this->GRNTotalValue->setVisibility();
		$this->BillDiscount->setVisibility();
		$this->BillUpload->Visible = FALSE;
		$this->TransPort->Visible = FALSE;
		$this->AnyOther->Visible = FALSE;
		$this->Remarks->Visible = FALSE;
		$this->GrnValue->setVisibility();
		$this->Pid->setVisibility();
		$this->PaymentNo->setVisibility();
		$this->PaymentStatus->setVisibility();
		$this->PaidAmount->setVisibility();
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
		$this->setupLookupOptions($this->PC);
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
			$this->DisplayRecs = 8; // Load default
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
		if ($this->CurrentMode <> "add" && $this->getMasterFilter() <> "" && $this->getCurrentMasterTable() == "pharmacy_payment") {
			global $pharmacy_payment;
			$rsmaster = $pharmacy_payment->loadRs($this->DbMasterFilter);
			$this->MasterRecordExists = ($rsmaster && !$rsmaster->EOF);
			if (!$this->MasterRecordExists) {
				$this->setFailureMessage($Language->phrase("NoRecord")); // Set no record found
				$this->terminate("pharmacy_paymentlist.php"); // Return to master page
			} else {
				$pharmacy_payment->loadListRowValues($rsmaster);
				$pharmacy_payment->RowType = ROWTYPE_MASTER; // Master row
				$pharmacy_payment->renderListRow();
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
					$this->DisplayRecs = 8; // Non-numeric, load default
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
		$this->BillTotalValue->FormValue = ""; // Clear form value
		$this->GRNTotalValue->FormValue = ""; // Clear form value
		$this->BillDiscount->FormValue = ""; // Clear form value
		$this->GrnValue->FormValue = ""; // Clear form value
		$this->PaidAmount->FormValue = ""; // Clear form value
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
		if ($CurrentForm->hasValue("x_GRNNO") && $CurrentForm->hasValue("o_GRNNO") && $this->GRNNO->CurrentValue <> $this->GRNNO->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_DT") && $CurrentForm->hasValue("o_DT") && $this->DT->CurrentValue <> $this->DT->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_Customername") && $CurrentForm->hasValue("o_Customername") && $this->Customername->CurrentValue <> $this->Customername->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_State") && $CurrentForm->hasValue("o_State") && $this->State->CurrentValue <> $this->State->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_Pincode") && $CurrentForm->hasValue("o_Pincode") && $this->Pincode->CurrentValue <> $this->Pincode->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_Phone") && $CurrentForm->hasValue("o_Phone") && $this->Phone->CurrentValue <> $this->Phone->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_BILLNO") && $CurrentForm->hasValue("o_BILLNO") && $this->BILLNO->CurrentValue <> $this->BILLNO->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_BILLDT") && $CurrentForm->hasValue("o_BILLDT") && $this->BILLDT->CurrentValue <> $this->BILLDT->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_BillTotalValue") && $CurrentForm->hasValue("o_BillTotalValue") && $this->BillTotalValue->CurrentValue <> $this->BillTotalValue->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_GRNTotalValue") && $CurrentForm->hasValue("o_GRNTotalValue") && $this->GRNTotalValue->CurrentValue <> $this->GRNTotalValue->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_BillDiscount") && $CurrentForm->hasValue("o_BillDiscount") && $this->BillDiscount->CurrentValue <> $this->BillDiscount->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_GrnValue") && $CurrentForm->hasValue("o_GrnValue") && $this->GrnValue->CurrentValue <> $this->GrnValue->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_Pid") && $CurrentForm->hasValue("o_Pid") && $this->Pid->CurrentValue <> $this->Pid->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_PaymentNo") && $CurrentForm->hasValue("o_PaymentNo") && $this->PaymentNo->CurrentValue <> $this->PaymentNo->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_PaymentStatus") && $CurrentForm->hasValue("o_PaymentStatus") && $this->PaymentStatus->CurrentValue <> $this->PaymentStatus->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_PaidAmount") && $CurrentForm->hasValue("o_PaidAmount") && $this->PaidAmount->CurrentValue <> $this->PaidAmount->OldValue)
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
		if (substr($this->Command,0,5) == "reset") {

			// Reset master/detail keys
			if ($this->Command == "resetall") {
				$this->setCurrentMasterTable(""); // Clear master table
				$this->DbMasterFilter = "";
				$this->DbDetailFilter = "";
				$this->Pid->setSessionValue("");
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
				if (!$Security->canDelete() && is_numeric($this->RowIndex) && ($this->RowAction == "" || $this->RowAction == "edit")) { // Do not allow delete existing record
					$opt->Body = "&nbsp;";
				} else {
					$opt->Body = "<a class=\"ew-grid-link ew-grid-delete\" title=\"" . HtmlTitle($Language->phrase("DeleteLink")) . "\" data-caption=\"" . HtmlTitle($Language->phrase("DeleteLink")) . "\" onclick=\"return ew.deleteGridRow(this, " . $this->RowIndex . ");\">" . $Language->phrase("DeleteLink") . "</a>";
				}
			}
		}
		if ($this->CurrentMode == "view") { // View mode

		// "view"
		$opt = &$this->ListOptions->Items["view"];
		$viewcaption = HtmlTitle($Language->phrase("ViewLink"));
		if ($Security->canView()) {
			$opt->Body = "<a class=\"ew-row-link ew-view\" title=\"" . $viewcaption . "\" data-caption=\"" . $viewcaption . "\" href=\"" . HtmlEncode($this->ViewUrl) . "\">" . $Language->phrase("ViewLink") . "</a>";
		} else {
			$opt->Body = "";
		}

		// "edit"
		$opt = &$this->ListOptions->Items["edit"];
		$editcaption = HtmlTitle($Language->phrase("EditLink"));
		if ($Security->canEdit()) {
			$opt->Body = "<a class=\"ew-row-link ew-edit\" title=\"" . HtmlTitle($Language->phrase("EditLink")) . "\" data-caption=\"" . HtmlTitle($Language->phrase("EditLink")) . "\" href=\"" . HtmlEncode($this->EditUrl) . "\">" . $Language->phrase("EditLink") . "</a>";
		} else {
			$opt->Body = "";
		}

		// "copy"
		$opt = &$this->ListOptions->Items["copy"];
		$copycaption = HtmlTitle($Language->phrase("CopyLink"));
		if ($Security->canAdd()) {
			$opt->Body = "<a class=\"ew-row-link ew-copy\" title=\"" . $copycaption . "\" data-caption=\"" . $copycaption . "\" href=\"" . HtmlEncode($this->CopyUrl) . "\">" . $Language->phrase("CopyLink") . "</a>";
		} else {
			$opt->Body = "";
		}

		// "delete"
		$opt = &$this->ListOptions->Items["delete"];
		if ($Security->canDelete())
			$opt->Body = "<a class=\"ew-row-link ew-delete\"" . "" . " title=\"" . HtmlTitle($Language->phrase("DeleteLink")) . "\" data-caption=\"" . HtmlTitle($Language->phrase("DeleteLink")) . "\" href=\"" . HtmlEncode($this->DeleteUrl) . "\">" . $Language->phrase("DeleteLink") . "</a>";
		else
			$opt->Body = "";
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

		// Add
		if ($this->CurrentMode == "view") { // Check view mode
			$item = &$option->add("add");
			$addcaption = HtmlTitle($Language->phrase("AddLink"));
			$this->AddUrl = $this->getAddUrl();
			$item->Body = "<a class=\"ew-add-edit ew-add\" title=\"" . $addcaption . "\" data-caption=\"" . $addcaption . "\" href=\"" . HtmlEncode($this->AddUrl) . "\">" . $Language->phrase("AddLink") . "</a>";
			$item->Visible = ($this->AddUrl <> "" && $Security->canAdd());
		}
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
				$item->Visible = $Security->canAdd();
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
		$this->id->CurrentValue = NULL;
		$this->id->OldValue = $this->id->CurrentValue;
		$this->GRNNO->CurrentValue = NULL;
		$this->GRNNO->OldValue = $this->GRNNO->CurrentValue;
		$this->DT->CurrentValue = NULL;
		$this->DT->OldValue = $this->DT->CurrentValue;
		$this->YM->CurrentValue = NULL;
		$this->YM->OldValue = $this->YM->CurrentValue;
		$this->PC->CurrentValue = NULL;
		$this->PC->OldValue = $this->PC->CurrentValue;
		$this->Customercode->CurrentValue = NULL;
		$this->Customercode->OldValue = $this->Customercode->CurrentValue;
		$this->Customername->CurrentValue = NULL;
		$this->Customername->OldValue = $this->Customername->CurrentValue;
		$this->pharmacy_pocol->CurrentValue = NULL;
		$this->pharmacy_pocol->OldValue = $this->pharmacy_pocol->CurrentValue;
		$this->Address1->CurrentValue = NULL;
		$this->Address1->OldValue = $this->Address1->CurrentValue;
		$this->Address2->CurrentValue = NULL;
		$this->Address2->OldValue = $this->Address2->CurrentValue;
		$this->Address3->CurrentValue = NULL;
		$this->Address3->OldValue = $this->Address3->CurrentValue;
		$this->State->CurrentValue = NULL;
		$this->State->OldValue = $this->State->CurrentValue;
		$this->Pincode->CurrentValue = NULL;
		$this->Pincode->OldValue = $this->Pincode->CurrentValue;
		$this->Phone->CurrentValue = NULL;
		$this->Phone->OldValue = $this->Phone->CurrentValue;
		$this->Fax->CurrentValue = NULL;
		$this->Fax->OldValue = $this->Fax->CurrentValue;
		$this->EEmail->CurrentValue = NULL;
		$this->EEmail->OldValue = $this->EEmail->CurrentValue;
		$this->HospID->CurrentValue = NULL;
		$this->HospID->OldValue = $this->HospID->CurrentValue;
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
		$this->BILLDT->CurrentValue = NULL;
		$this->BILLDT->OldValue = $this->BILLDT->CurrentValue;
		$this->BRCODE->CurrentValue = NULL;
		$this->BRCODE->OldValue = $this->BRCODE->CurrentValue;
		$this->PharmacyID->CurrentValue = NULL;
		$this->PharmacyID->OldValue = $this->PharmacyID->CurrentValue;
		$this->BillTotalValue->CurrentValue = 0.00;
		$this->BillTotalValue->OldValue = $this->BillTotalValue->CurrentValue;
		$this->GRNTotalValue->CurrentValue = 0.00;
		$this->GRNTotalValue->OldValue = $this->GRNTotalValue->CurrentValue;
		$this->BillDiscount->CurrentValue = 0.00;
		$this->BillDiscount->OldValue = $this->BillDiscount->CurrentValue;
		$this->BillUpload->Upload->DbValue = NULL;
		$this->BillUpload->OldValue = $this->BillUpload->Upload->DbValue;
		$this->BillUpload->Upload->Index = $this->RowIndex;
		$this->TransPort->CurrentValue = 0.00;
		$this->TransPort->OldValue = $this->TransPort->CurrentValue;
		$this->AnyOther->CurrentValue = 0.00;
		$this->AnyOther->OldValue = $this->AnyOther->CurrentValue;
		$this->Remarks->CurrentValue = NULL;
		$this->Remarks->OldValue = $this->Remarks->CurrentValue;
		$this->GrnValue->CurrentValue = NULL;
		$this->GrnValue->OldValue = $this->GrnValue->CurrentValue;
		$this->Pid->CurrentValue = NULL;
		$this->Pid->OldValue = $this->Pid->CurrentValue;
		$this->PaymentNo->CurrentValue = NULL;
		$this->PaymentNo->OldValue = $this->PaymentNo->CurrentValue;
		$this->PaymentStatus->CurrentValue = NULL;
		$this->PaymentStatus->OldValue = $this->PaymentStatus->CurrentValue;
		$this->PaidAmount->CurrentValue = NULL;
		$this->PaidAmount->OldValue = $this->PaidAmount->CurrentValue;
	}

	// Load form values
	protected function loadFormValues()
	{

		// Load from form
		global $CurrentForm;
		$CurrentForm->FormName = $this->FormName;

		// Check field name 'id' first before field var 'x_id'
		$val = $CurrentForm->hasValue("id") ? $CurrentForm->getValue("id") : $CurrentForm->getValue("x_id");
		if (!$this->id->IsDetailKey && !$this->isGridAdd() && !$this->isAdd())
			$this->id->setFormValue($val);

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
			$this->DT->CurrentValue = UnFormatDateTime($this->DT->CurrentValue, 7);
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

		// Check field name 'State' first before field var 'x_State'
		$val = $CurrentForm->hasValue("State") ? $CurrentForm->getValue("State") : $CurrentForm->getValue("x_State");
		if (!$this->State->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->State->Visible = FALSE; // Disable update for API request
			else
				$this->State->setFormValue($val);
		}
		$this->State->setOldValue($CurrentForm->getValue("o_State"));

		// Check field name 'Pincode' first before field var 'x_Pincode'
		$val = $CurrentForm->hasValue("Pincode") ? $CurrentForm->getValue("Pincode") : $CurrentForm->getValue("x_Pincode");
		if (!$this->Pincode->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Pincode->Visible = FALSE; // Disable update for API request
			else
				$this->Pincode->setFormValue($val);
		}
		$this->Pincode->setOldValue($CurrentForm->getValue("o_Pincode"));

		// Check field name 'Phone' first before field var 'x_Phone'
		$val = $CurrentForm->hasValue("Phone") ? $CurrentForm->getValue("Phone") : $CurrentForm->getValue("x_Phone");
		if (!$this->Phone->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Phone->Visible = FALSE; // Disable update for API request
			else
				$this->Phone->setFormValue($val);
		}
		$this->Phone->setOldValue($CurrentForm->getValue("o_Phone"));

		// Check field name 'BILLNO' first before field var 'x_BILLNO'
		$val = $CurrentForm->hasValue("BILLNO") ? $CurrentForm->getValue("BILLNO") : $CurrentForm->getValue("x_BILLNO");
		if (!$this->BILLNO->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->BILLNO->Visible = FALSE; // Disable update for API request
			else
				$this->BILLNO->setFormValue($val);
		}
		$this->BILLNO->setOldValue($CurrentForm->getValue("o_BILLNO"));

		// Check field name 'BILLDT' first before field var 'x_BILLDT'
		$val = $CurrentForm->hasValue("BILLDT") ? $CurrentForm->getValue("BILLDT") : $CurrentForm->getValue("x_BILLDT");
		if (!$this->BILLDT->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->BILLDT->Visible = FALSE; // Disable update for API request
			else
				$this->BILLDT->setFormValue($val);
			$this->BILLDT->CurrentValue = UnFormatDateTime($this->BILLDT->CurrentValue, 0);
		}
		$this->BILLDT->setOldValue($CurrentForm->getValue("o_BILLDT"));

		// Check field name 'BillTotalValue' first before field var 'x_BillTotalValue'
		$val = $CurrentForm->hasValue("BillTotalValue") ? $CurrentForm->getValue("BillTotalValue") : $CurrentForm->getValue("x_BillTotalValue");
		if (!$this->BillTotalValue->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->BillTotalValue->Visible = FALSE; // Disable update for API request
			else
				$this->BillTotalValue->setFormValue($val);
		}
		$this->BillTotalValue->setOldValue($CurrentForm->getValue("o_BillTotalValue"));

		// Check field name 'GRNTotalValue' first before field var 'x_GRNTotalValue'
		$val = $CurrentForm->hasValue("GRNTotalValue") ? $CurrentForm->getValue("GRNTotalValue") : $CurrentForm->getValue("x_GRNTotalValue");
		if (!$this->GRNTotalValue->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->GRNTotalValue->Visible = FALSE; // Disable update for API request
			else
				$this->GRNTotalValue->setFormValue($val);
		}
		$this->GRNTotalValue->setOldValue($CurrentForm->getValue("o_GRNTotalValue"));

		// Check field name 'BillDiscount' first before field var 'x_BillDiscount'
		$val = $CurrentForm->hasValue("BillDiscount") ? $CurrentForm->getValue("BillDiscount") : $CurrentForm->getValue("x_BillDiscount");
		if (!$this->BillDiscount->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->BillDiscount->Visible = FALSE; // Disable update for API request
			else
				$this->BillDiscount->setFormValue($val);
		}
		$this->BillDiscount->setOldValue($CurrentForm->getValue("o_BillDiscount"));

		// Check field name 'GrnValue' first before field var 'x_GrnValue'
		$val = $CurrentForm->hasValue("GrnValue") ? $CurrentForm->getValue("GrnValue") : $CurrentForm->getValue("x_GrnValue");
		if (!$this->GrnValue->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->GrnValue->Visible = FALSE; // Disable update for API request
			else
				$this->GrnValue->setFormValue($val);
		}
		$this->GrnValue->setOldValue($CurrentForm->getValue("o_GrnValue"));

		// Check field name 'Pid' first before field var 'x_Pid'
		$val = $CurrentForm->hasValue("Pid") ? $CurrentForm->getValue("Pid") : $CurrentForm->getValue("x_Pid");
		if (!$this->Pid->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Pid->Visible = FALSE; // Disable update for API request
			else
				$this->Pid->setFormValue($val);
		}
		$this->Pid->setOldValue($CurrentForm->getValue("o_Pid"));

		// Check field name 'PaymentNo' first before field var 'x_PaymentNo'
		$val = $CurrentForm->hasValue("PaymentNo") ? $CurrentForm->getValue("PaymentNo") : $CurrentForm->getValue("x_PaymentNo");
		if (!$this->PaymentNo->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->PaymentNo->Visible = FALSE; // Disable update for API request
			else
				$this->PaymentNo->setFormValue($val);
		}
		$this->PaymentNo->setOldValue($CurrentForm->getValue("o_PaymentNo"));

		// Check field name 'PaymentStatus' first before field var 'x_PaymentStatus'
		$val = $CurrentForm->hasValue("PaymentStatus") ? $CurrentForm->getValue("PaymentStatus") : $CurrentForm->getValue("x_PaymentStatus");
		if (!$this->PaymentStatus->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->PaymentStatus->Visible = FALSE; // Disable update for API request
			else
				$this->PaymentStatus->setFormValue($val);
		}
		$this->PaymentStatus->setOldValue($CurrentForm->getValue("o_PaymentStatus"));

		// Check field name 'PaidAmount' first before field var 'x_PaidAmount'
		$val = $CurrentForm->hasValue("PaidAmount") ? $CurrentForm->getValue("PaidAmount") : $CurrentForm->getValue("x_PaidAmount");
		if (!$this->PaidAmount->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->PaidAmount->Visible = FALSE; // Disable update for API request
			else
				$this->PaidAmount->setFormValue($val);
		}
		$this->PaidAmount->setOldValue($CurrentForm->getValue("o_PaidAmount"));
	}

	// Restore form values
	public function restoreFormValues()
	{
		global $CurrentForm;
		if (!$this->isGridAdd() && !$this->isAdd())
			$this->id->CurrentValue = $this->id->FormValue;
		$this->GRNNO->CurrentValue = $this->GRNNO->FormValue;
		$this->DT->CurrentValue = $this->DT->FormValue;
		$this->DT->CurrentValue = UnFormatDateTime($this->DT->CurrentValue, 7);
		$this->Customername->CurrentValue = $this->Customername->FormValue;
		$this->State->CurrentValue = $this->State->FormValue;
		$this->Pincode->CurrentValue = $this->Pincode->FormValue;
		$this->Phone->CurrentValue = $this->Phone->FormValue;
		$this->BILLNO->CurrentValue = $this->BILLNO->FormValue;
		$this->BILLDT->CurrentValue = $this->BILLDT->FormValue;
		$this->BILLDT->CurrentValue = UnFormatDateTime($this->BILLDT->CurrentValue, 0);
		$this->BillTotalValue->CurrentValue = $this->BillTotalValue->FormValue;
		$this->GRNTotalValue->CurrentValue = $this->GRNTotalValue->FormValue;
		$this->BillDiscount->CurrentValue = $this->BillDiscount->FormValue;
		$this->GrnValue->CurrentValue = $this->GrnValue->FormValue;
		$this->Pid->CurrentValue = $this->Pid->FormValue;
		$this->PaymentNo->CurrentValue = $this->PaymentNo->FormValue;
		$this->PaymentStatus->CurrentValue = $this->PaymentStatus->FormValue;
		$this->PaidAmount->CurrentValue = $this->PaidAmount->FormValue;
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
		$this->GRNNO->setDbValue($row['GRNNO']);
		$this->DT->setDbValue($row['DT']);
		$this->YM->setDbValue($row['YM']);
		$this->PC->setDbValue($row['PC']);
		$this->Customercode->setDbValue($row['Customercode']);
		$this->Customername->setDbValue($row['Customername']);
		$this->pharmacy_pocol->setDbValue($row['pharmacy_pocol']);
		$this->Address1->setDbValue($row['Address1']);
		$this->Address2->setDbValue($row['Address2']);
		$this->Address3->setDbValue($row['Address3']);
		$this->State->setDbValue($row['State']);
		$this->Pincode->setDbValue($row['Pincode']);
		$this->Phone->setDbValue($row['Phone']);
		$this->Fax->setDbValue($row['Fax']);
		$this->EEmail->setDbValue($row['EEmail']);
		$this->HospID->setDbValue($row['HospID']);
		$this->createdby->setDbValue($row['createdby']);
		$this->createddatetime->setDbValue($row['createddatetime']);
		$this->modifiedby->setDbValue($row['modifiedby']);
		$this->modifieddatetime->setDbValue($row['modifieddatetime']);
		$this->BILLNO->setDbValue($row['BILLNO']);
		$this->BILLDT->setDbValue($row['BILLDT']);
		$this->BRCODE->setDbValue($row['BRCODE']);
		$this->PharmacyID->setDbValue($row['PharmacyID']);
		$this->BillTotalValue->setDbValue($row['BillTotalValue']);
		$this->GRNTotalValue->setDbValue($row['GRNTotalValue']);
		$this->BillDiscount->setDbValue($row['BillDiscount']);
		$this->BillUpload->Upload->DbValue = $row['BillUpload'];
		$this->BillUpload->setDbValue($this->BillUpload->Upload->DbValue);
		$this->BillUpload->Upload->Index = $this->RowIndex;
		$this->TransPort->setDbValue($row['TransPort']);
		$this->AnyOther->setDbValue($row['AnyOther']);
		$this->Remarks->setDbValue($row['Remarks']);
		$this->GrnValue->setDbValue($row['GrnValue']);
		$this->Pid->setDbValue($row['Pid']);
		$this->PaymentNo->setDbValue($row['PaymentNo']);
		$this->PaymentStatus->setDbValue($row['PaymentStatus']);
		$this->PaidAmount->setDbValue($row['PaidAmount']);
	}

	// Return a row with default values
	protected function newRow()
	{
		$this->loadDefaultValues();
		$row = [];
		$row['id'] = $this->id->CurrentValue;
		$row['GRNNO'] = $this->GRNNO->CurrentValue;
		$row['DT'] = $this->DT->CurrentValue;
		$row['YM'] = $this->YM->CurrentValue;
		$row['PC'] = $this->PC->CurrentValue;
		$row['Customercode'] = $this->Customercode->CurrentValue;
		$row['Customername'] = $this->Customername->CurrentValue;
		$row['pharmacy_pocol'] = $this->pharmacy_pocol->CurrentValue;
		$row['Address1'] = $this->Address1->CurrentValue;
		$row['Address2'] = $this->Address2->CurrentValue;
		$row['Address3'] = $this->Address3->CurrentValue;
		$row['State'] = $this->State->CurrentValue;
		$row['Pincode'] = $this->Pincode->CurrentValue;
		$row['Phone'] = $this->Phone->CurrentValue;
		$row['Fax'] = $this->Fax->CurrentValue;
		$row['EEmail'] = $this->EEmail->CurrentValue;
		$row['HospID'] = $this->HospID->CurrentValue;
		$row['createdby'] = $this->createdby->CurrentValue;
		$row['createddatetime'] = $this->createddatetime->CurrentValue;
		$row['modifiedby'] = $this->modifiedby->CurrentValue;
		$row['modifieddatetime'] = $this->modifieddatetime->CurrentValue;
		$row['BILLNO'] = $this->BILLNO->CurrentValue;
		$row['BILLDT'] = $this->BILLDT->CurrentValue;
		$row['BRCODE'] = $this->BRCODE->CurrentValue;
		$row['PharmacyID'] = $this->PharmacyID->CurrentValue;
		$row['BillTotalValue'] = $this->BillTotalValue->CurrentValue;
		$row['GRNTotalValue'] = $this->GRNTotalValue->CurrentValue;
		$row['BillDiscount'] = $this->BillDiscount->CurrentValue;
		$row['BillUpload'] = $this->BillUpload->Upload->DbValue;
		$row['TransPort'] = $this->TransPort->CurrentValue;
		$row['AnyOther'] = $this->AnyOther->CurrentValue;
		$row['Remarks'] = $this->Remarks->CurrentValue;
		$row['GrnValue'] = $this->GrnValue->CurrentValue;
		$row['Pid'] = $this->Pid->CurrentValue;
		$row['PaymentNo'] = $this->PaymentNo->CurrentValue;
		$row['PaymentStatus'] = $this->PaymentStatus->CurrentValue;
		$row['PaidAmount'] = $this->PaidAmount->CurrentValue;
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
		if ($this->BillTotalValue->FormValue == $this->BillTotalValue->CurrentValue && is_numeric(ConvertToFloatString($this->BillTotalValue->CurrentValue)))
			$this->BillTotalValue->CurrentValue = ConvertToFloatString($this->BillTotalValue->CurrentValue);

		// Convert decimal values if posted back
		if ($this->GRNTotalValue->FormValue == $this->GRNTotalValue->CurrentValue && is_numeric(ConvertToFloatString($this->GRNTotalValue->CurrentValue)))
			$this->GRNTotalValue->CurrentValue = ConvertToFloatString($this->GRNTotalValue->CurrentValue);

		// Convert decimal values if posted back
		if ($this->BillDiscount->FormValue == $this->BillDiscount->CurrentValue && is_numeric(ConvertToFloatString($this->BillDiscount->CurrentValue)))
			$this->BillDiscount->CurrentValue = ConvertToFloatString($this->BillDiscount->CurrentValue);

		// Convert decimal values if posted back
		if ($this->GrnValue->FormValue == $this->GrnValue->CurrentValue && is_numeric(ConvertToFloatString($this->GrnValue->CurrentValue)))
			$this->GrnValue->CurrentValue = ConvertToFloatString($this->GrnValue->CurrentValue);

		// Convert decimal values if posted back
		if ($this->PaidAmount->FormValue == $this->PaidAmount->CurrentValue && is_numeric(ConvertToFloatString($this->PaidAmount->CurrentValue)))
			$this->PaidAmount->CurrentValue = ConvertToFloatString($this->PaidAmount->CurrentValue);

		// Call Row_Rendering event
		$this->Row_Rendering();

		// Common render codes for all row types
		// id
		// GRNNO
		// DT
		// YM
		// PC
		// Customercode
		// Customername
		// pharmacy_pocol
		// Address1
		// Address2
		// Address3
		// State
		// Pincode
		// Phone
		// Fax
		// EEmail
		// HospID
		// createdby
		// createddatetime
		// modifiedby
		// modifieddatetime
		// BILLNO
		// BILLDT
		// BRCODE
		// PharmacyID
		// BillTotalValue
		// GRNTotalValue
		// BillDiscount
		// BillUpload
		// TransPort
		// AnyOther
		// Remarks
		// GrnValue
		// Pid
		// PaymentNo
		// PaymentStatus
		// PaidAmount
		// Accumulate aggregate value

		if ($this->RowType <> ROWTYPE_AGGREGATEINIT && $this->RowType <> ROWTYPE_AGGREGATE) {
			if (is_numeric($this->BillTotalValue->CurrentValue))
				$this->BillTotalValue->Total += $this->BillTotalValue->CurrentValue; // Accumulate total
			if (is_numeric($this->GRNTotalValue->CurrentValue))
				$this->GRNTotalValue->Total += $this->GRNTotalValue->CurrentValue; // Accumulate total
			if (is_numeric($this->BillDiscount->CurrentValue))
				$this->BillDiscount->Total += $this->BillDiscount->CurrentValue; // Accumulate total
		}
		if ($this->RowType == ROWTYPE_VIEW) { // View row

			// id
			$this->id->ViewValue = $this->id->CurrentValue;
			$this->id->ViewCustomAttributes = "";

			// GRNNO
			$this->GRNNO->ViewValue = $this->GRNNO->CurrentValue;
			$this->GRNNO->ViewCustomAttributes = "";

			// DT
			$this->DT->ViewValue = $this->DT->CurrentValue;
			$this->DT->ViewValue = FormatDateTime($this->DT->ViewValue, 7);
			$this->DT->ViewCustomAttributes = "";

			// YM
			$this->YM->ViewValue = $this->YM->CurrentValue;
			$this->YM->ViewCustomAttributes = "";

			// PC
			$curVal = strval($this->PC->CurrentValue);
			if ($curVal <> "") {
				$this->PC->ViewValue = $this->PC->lookupCacheOption($curVal);
				if ($this->PC->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
					$sqlWrk = $this->PC->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = $rswrk->fields('df');
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

			// Customercode
			$this->Customercode->ViewValue = $this->Customercode->CurrentValue;
			$this->Customercode->ViewCustomAttributes = "";

			// Customername
			$this->Customername->ViewValue = $this->Customername->CurrentValue;
			$this->Customername->ViewCustomAttributes = "";

			// pharmacy_pocol
			$this->pharmacy_pocol->ViewValue = $this->pharmacy_pocol->CurrentValue;
			$this->pharmacy_pocol->ViewCustomAttributes = "";

			// State
			$this->State->ViewValue = $this->State->CurrentValue;
			$this->State->ViewCustomAttributes = "";

			// Pincode
			$this->Pincode->ViewValue = $this->Pincode->CurrentValue;
			$this->Pincode->ViewCustomAttributes = "";

			// Phone
			$this->Phone->ViewValue = $this->Phone->CurrentValue;
			$this->Phone->ViewCustomAttributes = "";

			// Fax
			$this->Fax->ViewValue = $this->Fax->CurrentValue;
			$this->Fax->ViewCustomAttributes = "";

			// EEmail
			$this->EEmail->ViewValue = $this->EEmail->CurrentValue;
			$this->EEmail->ViewCustomAttributes = "";

			// HospID
			$this->HospID->ViewValue = $this->HospID->CurrentValue;
			$this->HospID->ViewValue = FormatNumber($this->HospID->ViewValue, 0, -2, -2, -2);
			$this->HospID->ViewCustomAttributes = "";

			// createdby
			$this->createdby->ViewValue = $this->createdby->CurrentValue;
			$this->createdby->ViewCustomAttributes = "";

			// createddatetime
			$this->createddatetime->ViewValue = $this->createddatetime->CurrentValue;
			$this->createddatetime->ViewValue = FormatDateTime($this->createddatetime->ViewValue, 7);
			$this->createddatetime->ViewCustomAttributes = "";

			// modifiedby
			$this->modifiedby->ViewValue = $this->modifiedby->CurrentValue;
			$this->modifiedby->ViewCustomAttributes = "";

			// modifieddatetime
			$this->modifieddatetime->ViewValue = $this->modifieddatetime->CurrentValue;
			$this->modifieddatetime->ViewValue = FormatDateTime($this->modifieddatetime->ViewValue, 0);
			$this->modifieddatetime->ViewCustomAttributes = "";

			// BILLNO
			$this->BILLNO->ViewValue = $this->BILLNO->CurrentValue;
			$this->BILLNO->ViewCustomAttributes = "";

			// BILLDT
			$this->BILLDT->ViewValue = $this->BILLDT->CurrentValue;
			$this->BILLDT->ViewValue = FormatDateTime($this->BILLDT->ViewValue, 0);
			$this->BILLDT->ViewCustomAttributes = "";

			// BRCODE
			$curVal = strval($this->BRCODE->CurrentValue);
			if ($curVal <> "") {
				$this->BRCODE->ViewValue = $this->BRCODE->lookupCacheOption($curVal);
				if ($this->BRCODE->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
					$lookupFilter = function() {
						return "`id`='".PharmacyID()."'";
					};
					$lookupFilter = $lookupFilter->bindTo($this);
					$sqlWrk = $this->BRCODE->Lookup->getSql(FALSE, $filterWrk, $lookupFilter, $this);
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

			// PharmacyID
			$this->PharmacyID->ViewValue = $this->PharmacyID->CurrentValue;
			$this->PharmacyID->ViewValue = FormatNumber($this->PharmacyID->ViewValue, 0, -2, -2, -2);
			$this->PharmacyID->ViewCustomAttributes = "";

			// BillTotalValue
			$this->BillTotalValue->ViewValue = $this->BillTotalValue->CurrentValue;
			$this->BillTotalValue->ViewValue = FormatNumber($this->BillTotalValue->ViewValue, 2, -2, -2, -2);
			$this->BillTotalValue->ViewCustomAttributes = "";

			// GRNTotalValue
			$this->GRNTotalValue->ViewValue = $this->GRNTotalValue->CurrentValue;
			$this->GRNTotalValue->ViewValue = FormatNumber($this->GRNTotalValue->ViewValue, 2, -2, -2, -2);
			$this->GRNTotalValue->ViewCustomAttributes = "";

			// BillDiscount
			$this->BillDiscount->ViewValue = $this->BillDiscount->CurrentValue;
			$this->BillDiscount->ViewValue = FormatNumber($this->BillDiscount->ViewValue, 2, -2, -2, -2);
			$this->BillDiscount->ViewCustomAttributes = "";

			// TransPort
			$this->TransPort->ViewValue = $this->TransPort->CurrentValue;
			$this->TransPort->ViewValue = FormatNumber($this->TransPort->ViewValue, 2, -2, -2, -2);
			$this->TransPort->ViewCustomAttributes = "";

			// AnyOther
			$this->AnyOther->ViewValue = $this->AnyOther->CurrentValue;
			$this->AnyOther->ViewValue = FormatNumber($this->AnyOther->ViewValue, 2, -2, -2, -2);
			$this->AnyOther->ViewCustomAttributes = "";

			// Remarks
			$this->Remarks->ViewValue = $this->Remarks->CurrentValue;
			$this->Remarks->ViewCustomAttributes = "";

			// GrnValue
			$this->GrnValue->ViewValue = $this->GrnValue->CurrentValue;
			$this->GrnValue->ViewValue = FormatNumber($this->GrnValue->ViewValue, 2, -2, -2, -2);
			$this->GrnValue->ViewCustomAttributes = "";

			// Pid
			$this->Pid->ViewValue = $this->Pid->CurrentValue;
			$this->Pid->ViewValue = FormatNumber($this->Pid->ViewValue, 0, -2, -2, -2);
			$this->Pid->ViewCustomAttributes = "";

			// PaymentNo
			$this->PaymentNo->ViewValue = $this->PaymentNo->CurrentValue;
			$this->PaymentNo->ViewCustomAttributes = "";

			// PaymentStatus
			$this->PaymentStatus->ViewValue = $this->PaymentStatus->CurrentValue;
			$this->PaymentStatus->ViewCustomAttributes = "";

			// PaidAmount
			$this->PaidAmount->ViewValue = $this->PaidAmount->CurrentValue;
			$this->PaidAmount->ViewValue = FormatNumber($this->PaidAmount->ViewValue, 2, -2, -2, -2);
			$this->PaidAmount->ViewCustomAttributes = "";

			// id
			$this->id->LinkCustomAttributes = "";
			$this->id->HrefValue = "";
			$this->id->TooltipValue = "";

			// GRNNO
			$this->GRNNO->LinkCustomAttributes = "";
			$this->GRNNO->HrefValue = "";
			$this->GRNNO->TooltipValue = "";

			// DT
			$this->DT->LinkCustomAttributes = "";
			$this->DT->HrefValue = "";
			$this->DT->TooltipValue = "";

			// Customername
			$this->Customername->LinkCustomAttributes = "";
			$this->Customername->HrefValue = "";
			$this->Customername->TooltipValue = "";

			// State
			$this->State->LinkCustomAttributes = "";
			$this->State->HrefValue = "";
			$this->State->TooltipValue = "";

			// Pincode
			$this->Pincode->LinkCustomAttributes = "";
			$this->Pincode->HrefValue = "";
			$this->Pincode->TooltipValue = "";

			// Phone
			$this->Phone->LinkCustomAttributes = "";
			$this->Phone->HrefValue = "";
			$this->Phone->TooltipValue = "";

			// BILLNO
			$this->BILLNO->LinkCustomAttributes = "";
			$this->BILLNO->HrefValue = "";
			$this->BILLNO->TooltipValue = "";

			// BILLDT
			$this->BILLDT->LinkCustomAttributes = "";
			$this->BILLDT->HrefValue = "";
			$this->BILLDT->TooltipValue = "";

			// BillTotalValue
			$this->BillTotalValue->LinkCustomAttributes = "";
			$this->BillTotalValue->HrefValue = "";
			$this->BillTotalValue->TooltipValue = "";

			// GRNTotalValue
			$this->GRNTotalValue->LinkCustomAttributes = "";
			$this->GRNTotalValue->HrefValue = "";
			$this->GRNTotalValue->TooltipValue = "";

			// BillDiscount
			$this->BillDiscount->LinkCustomAttributes = "";
			$this->BillDiscount->HrefValue = "";
			$this->BillDiscount->TooltipValue = "";

			// GrnValue
			$this->GrnValue->LinkCustomAttributes = "";
			$this->GrnValue->HrefValue = "";
			$this->GrnValue->TooltipValue = "";

			// Pid
			$this->Pid->LinkCustomAttributes = "";
			$this->Pid->HrefValue = "";
			$this->Pid->TooltipValue = "";

			// PaymentNo
			$this->PaymentNo->LinkCustomAttributes = "";
			$this->PaymentNo->HrefValue = "";
			$this->PaymentNo->TooltipValue = "";

			// PaymentStatus
			$this->PaymentStatus->LinkCustomAttributes = "";
			$this->PaymentStatus->HrefValue = "";
			$this->PaymentStatus->TooltipValue = "";

			// PaidAmount
			$this->PaidAmount->LinkCustomAttributes = "";
			$this->PaidAmount->HrefValue = "";
			$this->PaidAmount->TooltipValue = "";
		} elseif ($this->RowType == ROWTYPE_ADD) { // Add row

			// id
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
			$this->DT->EditValue = HtmlEncode(FormatDateTime($this->DT->CurrentValue, 7));
			$this->DT->PlaceHolder = RemoveHtml($this->DT->caption());

			// Customername
			$this->Customername->EditAttrs["class"] = "form-control";
			$this->Customername->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Customername->CurrentValue = HtmlDecode($this->Customername->CurrentValue);
			$this->Customername->EditValue = HtmlEncode($this->Customername->CurrentValue);
			$this->Customername->PlaceHolder = RemoveHtml($this->Customername->caption());

			// State
			$this->State->EditAttrs["class"] = "form-control";
			$this->State->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->State->CurrentValue = HtmlDecode($this->State->CurrentValue);
			$this->State->EditValue = HtmlEncode($this->State->CurrentValue);
			$this->State->PlaceHolder = RemoveHtml($this->State->caption());

			// Pincode
			$this->Pincode->EditAttrs["class"] = "form-control";
			$this->Pincode->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Pincode->CurrentValue = HtmlDecode($this->Pincode->CurrentValue);
			$this->Pincode->EditValue = HtmlEncode($this->Pincode->CurrentValue);
			$this->Pincode->PlaceHolder = RemoveHtml($this->Pincode->caption());

			// Phone
			$this->Phone->EditAttrs["class"] = "form-control";
			$this->Phone->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Phone->CurrentValue = HtmlDecode($this->Phone->CurrentValue);
			$this->Phone->EditValue = HtmlEncode($this->Phone->CurrentValue);
			$this->Phone->PlaceHolder = RemoveHtml($this->Phone->caption());

			// BILLNO
			$this->BILLNO->EditAttrs["class"] = "form-control";
			$this->BILLNO->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->BILLNO->CurrentValue = HtmlDecode($this->BILLNO->CurrentValue);
			$this->BILLNO->EditValue = HtmlEncode($this->BILLNO->CurrentValue);
			$this->BILLNO->PlaceHolder = RemoveHtml($this->BILLNO->caption());

			// BILLDT
			$this->BILLDT->EditAttrs["class"] = "form-control";
			$this->BILLDT->EditCustomAttributes = "";
			$this->BILLDT->EditValue = HtmlEncode(FormatDateTime($this->BILLDT->CurrentValue, 8));
			$this->BILLDT->PlaceHolder = RemoveHtml($this->BILLDT->caption());

			// BillTotalValue
			$this->BillTotalValue->EditAttrs["class"] = "form-control";
			$this->BillTotalValue->EditCustomAttributes = "";
			$this->BillTotalValue->EditValue = HtmlEncode($this->BillTotalValue->CurrentValue);
			$this->BillTotalValue->PlaceHolder = RemoveHtml($this->BillTotalValue->caption());
			if (strval($this->BillTotalValue->EditValue) <> "" && is_numeric($this->BillTotalValue->EditValue)) {
				$this->BillTotalValue->EditValue = FormatNumber($this->BillTotalValue->EditValue, -2, -2, -2, -2);
				$this->BillTotalValue->OldValue = $this->BillTotalValue->EditValue;
			}

			// GRNTotalValue
			$this->GRNTotalValue->EditAttrs["class"] = "form-control";
			$this->GRNTotalValue->EditCustomAttributes = "";
			$this->GRNTotalValue->EditValue = HtmlEncode($this->GRNTotalValue->CurrentValue);
			$this->GRNTotalValue->PlaceHolder = RemoveHtml($this->GRNTotalValue->caption());
			if (strval($this->GRNTotalValue->EditValue) <> "" && is_numeric($this->GRNTotalValue->EditValue)) {
				$this->GRNTotalValue->EditValue = FormatNumber($this->GRNTotalValue->EditValue, -2, -2, -2, -2);
				$this->GRNTotalValue->OldValue = $this->GRNTotalValue->EditValue;
			}

			// BillDiscount
			$this->BillDiscount->EditAttrs["class"] = "form-control";
			$this->BillDiscount->EditCustomAttributes = "";
			$this->BillDiscount->EditValue = HtmlEncode($this->BillDiscount->CurrentValue);
			$this->BillDiscount->PlaceHolder = RemoveHtml($this->BillDiscount->caption());
			if (strval($this->BillDiscount->EditValue) <> "" && is_numeric($this->BillDiscount->EditValue)) {
				$this->BillDiscount->EditValue = FormatNumber($this->BillDiscount->EditValue, -2, -2, -2, -2);
				$this->BillDiscount->OldValue = $this->BillDiscount->EditValue;
			}

			// GrnValue
			$this->GrnValue->EditAttrs["class"] = "form-control";
			$this->GrnValue->EditCustomAttributes = "";
			$this->GrnValue->EditValue = HtmlEncode($this->GrnValue->CurrentValue);
			$this->GrnValue->PlaceHolder = RemoveHtml($this->GrnValue->caption());
			if (strval($this->GrnValue->EditValue) <> "" && is_numeric($this->GrnValue->EditValue)) {
				$this->GrnValue->EditValue = FormatNumber($this->GrnValue->EditValue, -2, -2, -2, -2);
				$this->GrnValue->OldValue = $this->GrnValue->EditValue;
			}

			// Pid
			$this->Pid->EditAttrs["class"] = "form-control";
			$this->Pid->EditCustomAttributes = "";
			if ($this->Pid->getSessionValue() <> "") {
				$this->Pid->CurrentValue = $this->Pid->getSessionValue();
				$this->Pid->OldValue = $this->Pid->CurrentValue;
			$this->Pid->ViewValue = $this->Pid->CurrentValue;
			$this->Pid->ViewValue = FormatNumber($this->Pid->ViewValue, 0, -2, -2, -2);
			$this->Pid->ViewCustomAttributes = "";
			} else {
			$this->Pid->EditValue = HtmlEncode($this->Pid->CurrentValue);
			$this->Pid->PlaceHolder = RemoveHtml($this->Pid->caption());
			}

			// PaymentNo
			$this->PaymentNo->EditAttrs["class"] = "form-control";
			$this->PaymentNo->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->PaymentNo->CurrentValue = HtmlDecode($this->PaymentNo->CurrentValue);
			$this->PaymentNo->EditValue = HtmlEncode($this->PaymentNo->CurrentValue);
			$this->PaymentNo->PlaceHolder = RemoveHtml($this->PaymentNo->caption());

			// PaymentStatus
			$this->PaymentStatus->EditAttrs["class"] = "form-control";
			$this->PaymentStatus->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->PaymentStatus->CurrentValue = HtmlDecode($this->PaymentStatus->CurrentValue);
			$this->PaymentStatus->EditValue = HtmlEncode($this->PaymentStatus->CurrentValue);
			$this->PaymentStatus->PlaceHolder = RemoveHtml($this->PaymentStatus->caption());

			// PaidAmount
			$this->PaidAmount->EditAttrs["class"] = "form-control";
			$this->PaidAmount->EditCustomAttributes = "";
			$this->PaidAmount->EditValue = HtmlEncode($this->PaidAmount->CurrentValue);
			$this->PaidAmount->PlaceHolder = RemoveHtml($this->PaidAmount->caption());
			if (strval($this->PaidAmount->EditValue) <> "" && is_numeric($this->PaidAmount->EditValue)) {
				$this->PaidAmount->EditValue = FormatNumber($this->PaidAmount->EditValue, -2, -2, -2, -2);
				$this->PaidAmount->OldValue = $this->PaidAmount->EditValue;
			}

			// Add refer script
			// id

			$this->id->LinkCustomAttributes = "";
			$this->id->HrefValue = "";

			// GRNNO
			$this->GRNNO->LinkCustomAttributes = "";
			$this->GRNNO->HrefValue = "";

			// DT
			$this->DT->LinkCustomAttributes = "";
			$this->DT->HrefValue = "";

			// Customername
			$this->Customername->LinkCustomAttributes = "";
			$this->Customername->HrefValue = "";

			// State
			$this->State->LinkCustomAttributes = "";
			$this->State->HrefValue = "";

			// Pincode
			$this->Pincode->LinkCustomAttributes = "";
			$this->Pincode->HrefValue = "";

			// Phone
			$this->Phone->LinkCustomAttributes = "";
			$this->Phone->HrefValue = "";

			// BILLNO
			$this->BILLNO->LinkCustomAttributes = "";
			$this->BILLNO->HrefValue = "";

			// BILLDT
			$this->BILLDT->LinkCustomAttributes = "";
			$this->BILLDT->HrefValue = "";

			// BillTotalValue
			$this->BillTotalValue->LinkCustomAttributes = "";
			$this->BillTotalValue->HrefValue = "";

			// GRNTotalValue
			$this->GRNTotalValue->LinkCustomAttributes = "";
			$this->GRNTotalValue->HrefValue = "";

			// BillDiscount
			$this->BillDiscount->LinkCustomAttributes = "";
			$this->BillDiscount->HrefValue = "";

			// GrnValue
			$this->GrnValue->LinkCustomAttributes = "";
			$this->GrnValue->HrefValue = "";

			// Pid
			$this->Pid->LinkCustomAttributes = "";
			$this->Pid->HrefValue = "";

			// PaymentNo
			$this->PaymentNo->LinkCustomAttributes = "";
			$this->PaymentNo->HrefValue = "";

			// PaymentStatus
			$this->PaymentStatus->LinkCustomAttributes = "";
			$this->PaymentStatus->HrefValue = "";

			// PaidAmount
			$this->PaidAmount->LinkCustomAttributes = "";
			$this->PaidAmount->HrefValue = "";
		} elseif ($this->RowType == ROWTYPE_EDIT) { // Edit row

			// id
			$this->id->EditAttrs["class"] = "form-control";
			$this->id->EditCustomAttributes = "";
			$this->id->EditValue = $this->id->CurrentValue;
			$this->id->ViewCustomAttributes = "";

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
			$this->DT->EditValue = HtmlEncode(FormatDateTime($this->DT->CurrentValue, 7));
			$this->DT->PlaceHolder = RemoveHtml($this->DT->caption());

			// Customername
			$this->Customername->EditAttrs["class"] = "form-control";
			$this->Customername->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Customername->CurrentValue = HtmlDecode($this->Customername->CurrentValue);
			$this->Customername->EditValue = HtmlEncode($this->Customername->CurrentValue);
			$this->Customername->PlaceHolder = RemoveHtml($this->Customername->caption());

			// State
			$this->State->EditAttrs["class"] = "form-control";
			$this->State->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->State->CurrentValue = HtmlDecode($this->State->CurrentValue);
			$this->State->EditValue = HtmlEncode($this->State->CurrentValue);
			$this->State->PlaceHolder = RemoveHtml($this->State->caption());

			// Pincode
			$this->Pincode->EditAttrs["class"] = "form-control";
			$this->Pincode->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Pincode->CurrentValue = HtmlDecode($this->Pincode->CurrentValue);
			$this->Pincode->EditValue = HtmlEncode($this->Pincode->CurrentValue);
			$this->Pincode->PlaceHolder = RemoveHtml($this->Pincode->caption());

			// Phone
			$this->Phone->EditAttrs["class"] = "form-control";
			$this->Phone->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Phone->CurrentValue = HtmlDecode($this->Phone->CurrentValue);
			$this->Phone->EditValue = HtmlEncode($this->Phone->CurrentValue);
			$this->Phone->PlaceHolder = RemoveHtml($this->Phone->caption());

			// BILLNO
			$this->BILLNO->EditAttrs["class"] = "form-control";
			$this->BILLNO->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->BILLNO->CurrentValue = HtmlDecode($this->BILLNO->CurrentValue);
			$this->BILLNO->EditValue = HtmlEncode($this->BILLNO->CurrentValue);
			$this->BILLNO->PlaceHolder = RemoveHtml($this->BILLNO->caption());

			// BILLDT
			$this->BILLDT->EditAttrs["class"] = "form-control";
			$this->BILLDT->EditCustomAttributes = "";
			$this->BILLDT->EditValue = HtmlEncode(FormatDateTime($this->BILLDT->CurrentValue, 8));
			$this->BILLDT->PlaceHolder = RemoveHtml($this->BILLDT->caption());

			// BillTotalValue
			$this->BillTotalValue->EditAttrs["class"] = "form-control";
			$this->BillTotalValue->EditCustomAttributes = "";
			$this->BillTotalValue->EditValue = HtmlEncode($this->BillTotalValue->CurrentValue);
			$this->BillTotalValue->PlaceHolder = RemoveHtml($this->BillTotalValue->caption());
			if (strval($this->BillTotalValue->EditValue) <> "" && is_numeric($this->BillTotalValue->EditValue)) {
				$this->BillTotalValue->EditValue = FormatNumber($this->BillTotalValue->EditValue, -2, -2, -2, -2);
				$this->BillTotalValue->OldValue = $this->BillTotalValue->EditValue;
			}

			// GRNTotalValue
			$this->GRNTotalValue->EditAttrs["class"] = "form-control";
			$this->GRNTotalValue->EditCustomAttributes = "";
			$this->GRNTotalValue->EditValue = HtmlEncode($this->GRNTotalValue->CurrentValue);
			$this->GRNTotalValue->PlaceHolder = RemoveHtml($this->GRNTotalValue->caption());
			if (strval($this->GRNTotalValue->EditValue) <> "" && is_numeric($this->GRNTotalValue->EditValue)) {
				$this->GRNTotalValue->EditValue = FormatNumber($this->GRNTotalValue->EditValue, -2, -2, -2, -2);
				$this->GRNTotalValue->OldValue = $this->GRNTotalValue->EditValue;
			}

			// BillDiscount
			$this->BillDiscount->EditAttrs["class"] = "form-control";
			$this->BillDiscount->EditCustomAttributes = "";
			$this->BillDiscount->EditValue = HtmlEncode($this->BillDiscount->CurrentValue);
			$this->BillDiscount->PlaceHolder = RemoveHtml($this->BillDiscount->caption());
			if (strval($this->BillDiscount->EditValue) <> "" && is_numeric($this->BillDiscount->EditValue)) {
				$this->BillDiscount->EditValue = FormatNumber($this->BillDiscount->EditValue, -2, -2, -2, -2);
				$this->BillDiscount->OldValue = $this->BillDiscount->EditValue;
			}

			// GrnValue
			$this->GrnValue->EditAttrs["class"] = "form-control";
			$this->GrnValue->EditCustomAttributes = "";
			$this->GrnValue->EditValue = HtmlEncode($this->GrnValue->CurrentValue);
			$this->GrnValue->PlaceHolder = RemoveHtml($this->GrnValue->caption());
			if (strval($this->GrnValue->EditValue) <> "" && is_numeric($this->GrnValue->EditValue)) {
				$this->GrnValue->EditValue = FormatNumber($this->GrnValue->EditValue, -2, -2, -2, -2);
				$this->GrnValue->OldValue = $this->GrnValue->EditValue;
			}

			// Pid
			$this->Pid->EditAttrs["class"] = "form-control";
			$this->Pid->EditCustomAttributes = "";
			if ($this->Pid->getSessionValue() <> "") {
				$this->Pid->CurrentValue = $this->Pid->getSessionValue();
				$this->Pid->OldValue = $this->Pid->CurrentValue;
			$this->Pid->ViewValue = $this->Pid->CurrentValue;
			$this->Pid->ViewValue = FormatNumber($this->Pid->ViewValue, 0, -2, -2, -2);
			$this->Pid->ViewCustomAttributes = "";
			} else {
			$this->Pid->EditValue = HtmlEncode($this->Pid->CurrentValue);
			$this->Pid->PlaceHolder = RemoveHtml($this->Pid->caption());
			}

			// PaymentNo
			$this->PaymentNo->EditAttrs["class"] = "form-control";
			$this->PaymentNo->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->PaymentNo->CurrentValue = HtmlDecode($this->PaymentNo->CurrentValue);
			$this->PaymentNo->EditValue = HtmlEncode($this->PaymentNo->CurrentValue);
			$this->PaymentNo->PlaceHolder = RemoveHtml($this->PaymentNo->caption());

			// PaymentStatus
			$this->PaymentStatus->EditAttrs["class"] = "form-control";
			$this->PaymentStatus->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->PaymentStatus->CurrentValue = HtmlDecode($this->PaymentStatus->CurrentValue);
			$this->PaymentStatus->EditValue = HtmlEncode($this->PaymentStatus->CurrentValue);
			$this->PaymentStatus->PlaceHolder = RemoveHtml($this->PaymentStatus->caption());

			// PaidAmount
			$this->PaidAmount->EditAttrs["class"] = "form-control";
			$this->PaidAmount->EditCustomAttributes = "";
			$this->PaidAmount->EditValue = HtmlEncode($this->PaidAmount->CurrentValue);
			$this->PaidAmount->PlaceHolder = RemoveHtml($this->PaidAmount->caption());
			if (strval($this->PaidAmount->EditValue) <> "" && is_numeric($this->PaidAmount->EditValue)) {
				$this->PaidAmount->EditValue = FormatNumber($this->PaidAmount->EditValue, -2, -2, -2, -2);
				$this->PaidAmount->OldValue = $this->PaidAmount->EditValue;
			}

			// Edit refer script
			// id

			$this->id->LinkCustomAttributes = "";
			$this->id->HrefValue = "";

			// GRNNO
			$this->GRNNO->LinkCustomAttributes = "";
			$this->GRNNO->HrefValue = "";

			// DT
			$this->DT->LinkCustomAttributes = "";
			$this->DT->HrefValue = "";

			// Customername
			$this->Customername->LinkCustomAttributes = "";
			$this->Customername->HrefValue = "";

			// State
			$this->State->LinkCustomAttributes = "";
			$this->State->HrefValue = "";

			// Pincode
			$this->Pincode->LinkCustomAttributes = "";
			$this->Pincode->HrefValue = "";

			// Phone
			$this->Phone->LinkCustomAttributes = "";
			$this->Phone->HrefValue = "";

			// BILLNO
			$this->BILLNO->LinkCustomAttributes = "";
			$this->BILLNO->HrefValue = "";

			// BILLDT
			$this->BILLDT->LinkCustomAttributes = "";
			$this->BILLDT->HrefValue = "";

			// BillTotalValue
			$this->BillTotalValue->LinkCustomAttributes = "";
			$this->BillTotalValue->HrefValue = "";

			// GRNTotalValue
			$this->GRNTotalValue->LinkCustomAttributes = "";
			$this->GRNTotalValue->HrefValue = "";

			// BillDiscount
			$this->BillDiscount->LinkCustomAttributes = "";
			$this->BillDiscount->HrefValue = "";

			// GrnValue
			$this->GrnValue->LinkCustomAttributes = "";
			$this->GrnValue->HrefValue = "";

			// Pid
			$this->Pid->LinkCustomAttributes = "";
			$this->Pid->HrefValue = "";

			// PaymentNo
			$this->PaymentNo->LinkCustomAttributes = "";
			$this->PaymentNo->HrefValue = "";

			// PaymentStatus
			$this->PaymentStatus->LinkCustomAttributes = "";
			$this->PaymentStatus->HrefValue = "";

			// PaidAmount
			$this->PaidAmount->LinkCustomAttributes = "";
			$this->PaidAmount->HrefValue = "";
		} elseif ($this->RowType == ROWTYPE_AGGREGATEINIT) { // Initialize aggregate row
			$this->BillTotalValue->Total = 0; // Initialize total
			$this->GRNTotalValue->Total = 0; // Initialize total
			$this->BillDiscount->Total = 0; // Initialize total
		} elseif ($this->RowType == ROWTYPE_AGGREGATE) { // Aggregate row
			$this->BillTotalValue->CurrentValue = $this->BillTotalValue->Total;
			$this->BillTotalValue->ViewValue = $this->BillTotalValue->CurrentValue;
			$this->BillTotalValue->ViewValue = FormatNumber($this->BillTotalValue->ViewValue, 2, -2, -2, -2);
			$this->BillTotalValue->ViewCustomAttributes = "";
			$this->BillTotalValue->HrefValue = ""; // Clear href value
			$this->GRNTotalValue->CurrentValue = $this->GRNTotalValue->Total;
			$this->GRNTotalValue->ViewValue = $this->GRNTotalValue->CurrentValue;
			$this->GRNTotalValue->ViewValue = FormatNumber($this->GRNTotalValue->ViewValue, 2, -2, -2, -2);
			$this->GRNTotalValue->ViewCustomAttributes = "";
			$this->GRNTotalValue->HrefValue = ""; // Clear href value
			$this->BillDiscount->CurrentValue = $this->BillDiscount->Total;
			$this->BillDiscount->ViewValue = $this->BillDiscount->CurrentValue;
			$this->BillDiscount->ViewValue = FormatNumber($this->BillDiscount->ViewValue, 2, -2, -2, -2);
			$this->BillDiscount->ViewCustomAttributes = "";
			$this->BillDiscount->HrefValue = ""; // Clear href value
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
		if (!CheckEuroDate($this->DT->FormValue)) {
			AddMessage($FormError, $this->DT->errorMessage());
		}
		if ($this->YM->Required) {
			if (!$this->YM->IsDetailKey && $this->YM->FormValue != NULL && $this->YM->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->YM->caption(), $this->YM->RequiredErrorMessage));
			}
		}
		if ($this->PC->Required) {
			if (!$this->PC->IsDetailKey && $this->PC->FormValue != NULL && $this->PC->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PC->caption(), $this->PC->RequiredErrorMessage));
			}
		}
		if ($this->Customercode->Required) {
			if (!$this->Customercode->IsDetailKey && $this->Customercode->FormValue != NULL && $this->Customercode->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Customercode->caption(), $this->Customercode->RequiredErrorMessage));
			}
		}
		if ($this->Customername->Required) {
			if (!$this->Customername->IsDetailKey && $this->Customername->FormValue != NULL && $this->Customername->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Customername->caption(), $this->Customername->RequiredErrorMessage));
			}
		}
		if ($this->pharmacy_pocol->Required) {
			if (!$this->pharmacy_pocol->IsDetailKey && $this->pharmacy_pocol->FormValue != NULL && $this->pharmacy_pocol->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->pharmacy_pocol->caption(), $this->pharmacy_pocol->RequiredErrorMessage));
			}
		}
		if ($this->Address1->Required) {
			if (!$this->Address1->IsDetailKey && $this->Address1->FormValue != NULL && $this->Address1->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Address1->caption(), $this->Address1->RequiredErrorMessage));
			}
		}
		if ($this->Address2->Required) {
			if (!$this->Address2->IsDetailKey && $this->Address2->FormValue != NULL && $this->Address2->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Address2->caption(), $this->Address2->RequiredErrorMessage));
			}
		}
		if ($this->Address3->Required) {
			if (!$this->Address3->IsDetailKey && $this->Address3->FormValue != NULL && $this->Address3->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Address3->caption(), $this->Address3->RequiredErrorMessage));
			}
		}
		if ($this->State->Required) {
			if (!$this->State->IsDetailKey && $this->State->FormValue != NULL && $this->State->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->State->caption(), $this->State->RequiredErrorMessage));
			}
		}
		if ($this->Pincode->Required) {
			if (!$this->Pincode->IsDetailKey && $this->Pincode->FormValue != NULL && $this->Pincode->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Pincode->caption(), $this->Pincode->RequiredErrorMessage));
			}
		}
		if ($this->Phone->Required) {
			if (!$this->Phone->IsDetailKey && $this->Phone->FormValue != NULL && $this->Phone->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Phone->caption(), $this->Phone->RequiredErrorMessage));
			}
		}
		if ($this->Fax->Required) {
			if (!$this->Fax->IsDetailKey && $this->Fax->FormValue != NULL && $this->Fax->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Fax->caption(), $this->Fax->RequiredErrorMessage));
			}
		}
		if ($this->EEmail->Required) {
			if (!$this->EEmail->IsDetailKey && $this->EEmail->FormValue != NULL && $this->EEmail->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->EEmail->caption(), $this->EEmail->RequiredErrorMessage));
			}
		}
		if ($this->HospID->Required) {
			if (!$this->HospID->IsDetailKey && $this->HospID->FormValue != NULL && $this->HospID->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->HospID->caption(), $this->HospID->RequiredErrorMessage));
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
		if ($this->BILLNO->Required) {
			if (!$this->BILLNO->IsDetailKey && $this->BILLNO->FormValue != NULL && $this->BILLNO->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->BILLNO->caption(), $this->BILLNO->RequiredErrorMessage));
			}
		}
		if ($this->BILLDT->Required) {
			if (!$this->BILLDT->IsDetailKey && $this->BILLDT->FormValue != NULL && $this->BILLDT->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->BILLDT->caption(), $this->BILLDT->RequiredErrorMessage));
			}
		}
		if (!CheckDate($this->BILLDT->FormValue)) {
			AddMessage($FormError, $this->BILLDT->errorMessage());
		}
		if ($this->BRCODE->Required) {
			if (!$this->BRCODE->IsDetailKey && $this->BRCODE->FormValue != NULL && $this->BRCODE->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->BRCODE->caption(), $this->BRCODE->RequiredErrorMessage));
			}
		}
		if ($this->PharmacyID->Required) {
			if (!$this->PharmacyID->IsDetailKey && $this->PharmacyID->FormValue != NULL && $this->PharmacyID->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PharmacyID->caption(), $this->PharmacyID->RequiredErrorMessage));
			}
		}
		if ($this->BillTotalValue->Required) {
			if (!$this->BillTotalValue->IsDetailKey && $this->BillTotalValue->FormValue != NULL && $this->BillTotalValue->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->BillTotalValue->caption(), $this->BillTotalValue->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->BillTotalValue->FormValue)) {
			AddMessage($FormError, $this->BillTotalValue->errorMessage());
		}
		if ($this->GRNTotalValue->Required) {
			if (!$this->GRNTotalValue->IsDetailKey && $this->GRNTotalValue->FormValue != NULL && $this->GRNTotalValue->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->GRNTotalValue->caption(), $this->GRNTotalValue->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->GRNTotalValue->FormValue)) {
			AddMessage($FormError, $this->GRNTotalValue->errorMessage());
		}
		if ($this->BillDiscount->Required) {
			if (!$this->BillDiscount->IsDetailKey && $this->BillDiscount->FormValue != NULL && $this->BillDiscount->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->BillDiscount->caption(), $this->BillDiscount->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->BillDiscount->FormValue)) {
			AddMessage($FormError, $this->BillDiscount->errorMessage());
		}
		if ($this->BillUpload->Required) {
			if ($this->BillUpload->Upload->FileName == "" && !$this->BillUpload->Upload->KeepFile) {
				AddMessage($FormError, str_replace("%s", $this->BillUpload->caption(), $this->BillUpload->RequiredErrorMessage));
			}
		}
		if ($this->TransPort->Required) {
			if (!$this->TransPort->IsDetailKey && $this->TransPort->FormValue != NULL && $this->TransPort->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->TransPort->caption(), $this->TransPort->RequiredErrorMessage));
			}
		}
		if ($this->AnyOther->Required) {
			if (!$this->AnyOther->IsDetailKey && $this->AnyOther->FormValue != NULL && $this->AnyOther->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->AnyOther->caption(), $this->AnyOther->RequiredErrorMessage));
			}
		}
		if ($this->Remarks->Required) {
			if (!$this->Remarks->IsDetailKey && $this->Remarks->FormValue != NULL && $this->Remarks->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Remarks->caption(), $this->Remarks->RequiredErrorMessage));
			}
		}
		if ($this->GrnValue->Required) {
			if (!$this->GrnValue->IsDetailKey && $this->GrnValue->FormValue != NULL && $this->GrnValue->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->GrnValue->caption(), $this->GrnValue->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->GrnValue->FormValue)) {
			AddMessage($FormError, $this->GrnValue->errorMessage());
		}
		if ($this->Pid->Required) {
			if (!$this->Pid->IsDetailKey && $this->Pid->FormValue != NULL && $this->Pid->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Pid->caption(), $this->Pid->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->Pid->FormValue)) {
			AddMessage($FormError, $this->Pid->errorMessage());
		}
		if ($this->PaymentNo->Required) {
			if (!$this->PaymentNo->IsDetailKey && $this->PaymentNo->FormValue != NULL && $this->PaymentNo->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PaymentNo->caption(), $this->PaymentNo->RequiredErrorMessage));
			}
		}
		if ($this->PaymentStatus->Required) {
			if (!$this->PaymentStatus->IsDetailKey && $this->PaymentStatus->FormValue != NULL && $this->PaymentStatus->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PaymentStatus->caption(), $this->PaymentStatus->RequiredErrorMessage));
			}
		}
		if ($this->PaidAmount->Required) {
			if (!$this->PaidAmount->IsDetailKey && $this->PaidAmount->FormValue != NULL && $this->PaidAmount->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PaidAmount->caption(), $this->PaidAmount->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->PaidAmount->FormValue)) {
			AddMessage($FormError, $this->PaidAmount->errorMessage());
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
		if ($this->BILLNO->CurrentValue <> "") { // Check field with unique index
			$filterChk = "(`BILLNO` = '" . AdjustSql($this->BILLNO->CurrentValue, $this->Dbid) . "')";
			$filterChk .= " AND NOT (" . $filter . ")";
			$this->CurrentFilter = $filterChk;
			$sqlChk = $this->getCurrentSql();
			$conn->raiseErrorFn = $GLOBALS["ERROR_FUNC"];
			$rsChk = $conn->Execute($sqlChk);
			$conn->raiseErrorFn = '';
			if ($rsChk === FALSE) {
				return FALSE;
			} elseif (!$rsChk->EOF) {
				$idxErrMsg = str_replace("%f", $this->BILLNO->caption(), $Language->phrase("DupIndex"));
				$idxErrMsg = str_replace("%v", $this->BILLNO->CurrentValue, $idxErrMsg);
				$this->setFailureMessage($idxErrMsg);
				$rsChk->close();
				return FALSE;
			}
			$rsChk->close();
		}
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

			// GRNNO
			$this->GRNNO->setDbValueDef($rsnew, $this->GRNNO->CurrentValue, NULL, $this->GRNNO->ReadOnly);

			// DT
			$this->DT->setDbValueDef($rsnew, UnFormatDateTime($this->DT->CurrentValue, 7), NULL, $this->DT->ReadOnly);

			// Customername
			$this->Customername->setDbValueDef($rsnew, $this->Customername->CurrentValue, NULL, $this->Customername->ReadOnly);

			// State
			$this->State->setDbValueDef($rsnew, $this->State->CurrentValue, NULL, $this->State->ReadOnly);

			// Pincode
			$this->Pincode->setDbValueDef($rsnew, $this->Pincode->CurrentValue, NULL, $this->Pincode->ReadOnly);

			// Phone
			$this->Phone->setDbValueDef($rsnew, $this->Phone->CurrentValue, NULL, $this->Phone->ReadOnly);

			// BILLNO
			$this->BILLNO->setDbValueDef($rsnew, $this->BILLNO->CurrentValue, NULL, $this->BILLNO->ReadOnly);

			// BILLDT
			$this->BILLDT->setDbValueDef($rsnew, UnFormatDateTime($this->BILLDT->CurrentValue, 0), NULL, $this->BILLDT->ReadOnly);

			// BillTotalValue
			$this->BillTotalValue->setDbValueDef($rsnew, $this->BillTotalValue->CurrentValue, NULL, $this->BillTotalValue->ReadOnly);

			// GRNTotalValue
			$this->GRNTotalValue->setDbValueDef($rsnew, $this->GRNTotalValue->CurrentValue, NULL, $this->GRNTotalValue->ReadOnly);

			// BillDiscount
			$this->BillDiscount->setDbValueDef($rsnew, $this->BillDiscount->CurrentValue, NULL, $this->BillDiscount->ReadOnly);

			// GrnValue
			$this->GrnValue->setDbValueDef($rsnew, $this->GrnValue->CurrentValue, NULL, $this->GrnValue->ReadOnly);

			// Pid
			$this->Pid->setDbValueDef($rsnew, $this->Pid->CurrentValue, NULL, $this->Pid->ReadOnly);

			// PaymentNo
			$this->PaymentNo->setDbValueDef($rsnew, $this->PaymentNo->CurrentValue, NULL, $this->PaymentNo->ReadOnly);

			// PaymentStatus
			$this->PaymentStatus->setDbValueDef($rsnew, $this->PaymentStatus->CurrentValue, NULL, $this->PaymentStatus->ReadOnly);

			// PaidAmount
			$this->PaidAmount->setDbValueDef($rsnew, $this->PaidAmount->CurrentValue, NULL, $this->PaidAmount->ReadOnly);

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
			if ($this->getCurrentMasterTable() == "pharmacy_payment") {
				$this->Pid->CurrentValue = $this->Pid->getSessionValue();
			}
		if ($this->BILLNO->CurrentValue <> "") { // Check field with unique index
			$filter = "(BILLNO = '" . AdjustSql($this->BILLNO->CurrentValue, $this->Dbid) . "')";
			$rsChk = $this->loadRs($filter);
			if ($rsChk && !$rsChk->EOF) {
				$idxErrMsg = str_replace("%f", $this->BILLNO->caption(), $Language->phrase("DupIndex"));
				$idxErrMsg = str_replace("%v", $this->BILLNO->CurrentValue, $idxErrMsg);
				$this->setFailureMessage($idxErrMsg);
				$rsChk->close();
				return FALSE;
			}
		}
		$conn = &$this->getConnection();

		// Load db values from rsold
		$this->loadDbValues($rsold);
		if ($rsold) {
		}
		$rsnew = [];

		// GRNNO
		$this->GRNNO->setDbValueDef($rsnew, $this->GRNNO->CurrentValue, NULL, FALSE);

		// DT
		$this->DT->setDbValueDef($rsnew, UnFormatDateTime($this->DT->CurrentValue, 7), NULL, FALSE);

		// Customername
		$this->Customername->setDbValueDef($rsnew, $this->Customername->CurrentValue, NULL, FALSE);

		// State
		$this->State->setDbValueDef($rsnew, $this->State->CurrentValue, NULL, FALSE);

		// Pincode
		$this->Pincode->setDbValueDef($rsnew, $this->Pincode->CurrentValue, NULL, FALSE);

		// Phone
		$this->Phone->setDbValueDef($rsnew, $this->Phone->CurrentValue, NULL, FALSE);

		// BILLNO
		$this->BILLNO->setDbValueDef($rsnew, $this->BILLNO->CurrentValue, NULL, FALSE);

		// BILLDT
		$this->BILLDT->setDbValueDef($rsnew, UnFormatDateTime($this->BILLDT->CurrentValue, 0), NULL, FALSE);

		// BillTotalValue
		$this->BillTotalValue->setDbValueDef($rsnew, $this->BillTotalValue->CurrentValue, NULL, FALSE);

		// GRNTotalValue
		$this->GRNTotalValue->setDbValueDef($rsnew, $this->GRNTotalValue->CurrentValue, NULL, FALSE);

		// BillDiscount
		$this->BillDiscount->setDbValueDef($rsnew, $this->BillDiscount->CurrentValue, NULL, FALSE);

		// GrnValue
		$this->GrnValue->setDbValueDef($rsnew, $this->GrnValue->CurrentValue, NULL, FALSE);

		// Pid
		$this->Pid->setDbValueDef($rsnew, $this->Pid->CurrentValue, NULL, FALSE);

		// PaymentNo
		$this->PaymentNo->setDbValueDef($rsnew, $this->PaymentNo->CurrentValue, NULL, FALSE);

		// PaymentStatus
		$this->PaymentStatus->setDbValueDef($rsnew, $this->PaymentStatus->CurrentValue, NULL, FALSE);

		// PaidAmount
		$this->PaidAmount->setDbValueDef($rsnew, $this->PaidAmount->CurrentValue, NULL, FALSE);

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
		if ($masterTblVar == "pharmacy_payment") {
			$this->Pid->Visible = FALSE;
			if ($GLOBALS["pharmacy_payment"]->EventCancelled)
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
				case "x_BRCODE":
					$lookupFilter = function() {
						return "`id`='".PharmacyID()."'";
					};
					$lookupFilter = $lookupFilter->bindTo($this);
					break;
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
						case "x_PC":
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
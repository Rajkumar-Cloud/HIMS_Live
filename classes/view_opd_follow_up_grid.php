<?php
namespace PHPMaker2019\HIMS;

/**
 * Page class
 */
class view_opd_follow_up_grid extends view_opd_follow_up
{

	// Page ID
	public $PageID = "grid";

	// Project ID
	public $ProjectID = "{EA4F6D13-AF8F-428D-9EA7-BA88D1107EC3}";

	// Table name
	public $TableName = 'view_opd_follow_up';

	// Page object name
	public $PageObjName = "view_opd_follow_up_grid";

	// Grid form hidden field names
	public $FormName = "fview_opd_follow_upgrid";
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

		// Table object (view_opd_follow_up)
		if (!isset($GLOBALS["view_opd_follow_up"]) || get_class($GLOBALS["view_opd_follow_up"]) == PROJECT_NAMESPACE . "view_opd_follow_up") {
			$GLOBALS["view_opd_follow_up"] = &$this;

			// $GLOBALS["MasterTable"] = &$GLOBALS["Table"];
			// if (!isset($GLOBALS["Table"]))
			// 	$GLOBALS["Table"] = &$GLOBALS["view_opd_follow_up"];

		}
		$this->AddUrl = "view_opd_follow_upadd.php";
		$this->CancelUrl = $this->pageUrl() . "action=cancel";

		// Table object (user_login)
		if (!isset($GLOBALS['user_login']))
			$GLOBALS['user_login'] = new user_login();

		// Page ID
		if (!defined(PROJECT_NAMESPACE . "PAGE_ID"))
			define(PROJECT_NAMESPACE . "PAGE_ID", 'grid');

		// Table name (for backward compatibility)
		if (!defined(PROJECT_NAMESPACE . "TABLE_NAME"))
			define(PROJECT_NAMESPACE . "TABLE_NAME", 'view_opd_follow_up');

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
		global $EXPORT, $view_opd_follow_up;
		if ($this->CustomExport && $this->CustomExport == $this->Export && array_key_exists($this->CustomExport, $EXPORT)) {
				$content = ob_get_contents();
			if ($ExportFileName == "")
				$ExportFileName = $this->TableVar;
			$class = PROJECT_NAMESPACE . $EXPORT[$this->CustomExport];
			if (class_exists($class)) {
				$doc = new $class($view_opd_follow_up);
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
			$this->createdby->Visible = FALSE;
		if ($this->isAddOrEdit())
			$this->createddatetime->Visible = FALSE;
		if ($this->isAddOrEdit())
			$this->modifiedby->Visible = FALSE;
		if ($this->isAddOrEdit())
			$this->modifieddatetime->Visible = FALSE;
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
		$this->id->setVisibility();
		$this->Reception->setVisibility();
		$this->PatientId->setVisibility();
		$this->mrnno->setVisibility();
		$this->PatientName->setVisibility();
		$this->Telephone->setVisibility();
		$this->Age->setVisibility();
		$this->Gender->setVisibility();
		$this->profilePic->Visible = FALSE;
		$this->procedurenotes->Visible = FALSE;
		$this->NextReviewDate->setVisibility();
		$this->ICSIAdvised->setVisibility();
		$this->DeliveryRegistered->setVisibility();
		$this->EDD->setVisibility();
		$this->SerologyPositive->setVisibility();
		$this->Allergy->setVisibility();
		$this->status->setVisibility();
		$this->createdby->setVisibility();
		$this->createddatetime->setVisibility();
		$this->modifiedby->setVisibility();
		$this->modifieddatetime->setVisibility();
		$this->LMP->setVisibility();
		$this->Procedure->Visible = FALSE;
		$this->ProcedureDateTime->setVisibility();
		$this->ICSIDate->setVisibility();
		$this->RIDNo->Visible = FALSE;
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
		$this->setupLookupOptions($this->Allergy);

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
		if ($this->CurrentMode <> "add" && $this->getMasterFilter() <> "" && $this->getCurrentMasterTable() == "ivf_treatment_plan") {
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
		if ($CurrentForm->hasValue("x_Reception") && $CurrentForm->hasValue("o_Reception") && $this->Reception->CurrentValue <> $this->Reception->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_PatientId") && $CurrentForm->hasValue("o_PatientId") && $this->PatientId->CurrentValue <> $this->PatientId->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_mrnno") && $CurrentForm->hasValue("o_mrnno") && $this->mrnno->CurrentValue <> $this->mrnno->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_PatientName") && $CurrentForm->hasValue("o_PatientName") && $this->PatientName->CurrentValue <> $this->PatientName->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_Telephone") && $CurrentForm->hasValue("o_Telephone") && $this->Telephone->CurrentValue <> $this->Telephone->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_Age") && $CurrentForm->hasValue("o_Age") && $this->Age->CurrentValue <> $this->Age->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_Gender") && $CurrentForm->hasValue("o_Gender") && $this->Gender->CurrentValue <> $this->Gender->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_NextReviewDate") && $CurrentForm->hasValue("o_NextReviewDate") && $this->NextReviewDate->CurrentValue <> $this->NextReviewDate->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_ICSIAdvised") && $CurrentForm->hasValue("o_ICSIAdvised") && $this->ICSIAdvised->CurrentValue <> $this->ICSIAdvised->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_DeliveryRegistered") && $CurrentForm->hasValue("o_DeliveryRegistered") && $this->DeliveryRegistered->CurrentValue <> $this->DeliveryRegistered->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_EDD") && $CurrentForm->hasValue("o_EDD") && $this->EDD->CurrentValue <> $this->EDD->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_SerologyPositive") && $CurrentForm->hasValue("o_SerologyPositive") && $this->SerologyPositive->CurrentValue <> $this->SerologyPositive->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_Allergy") && $CurrentForm->hasValue("o_Allergy") && $this->Allergy->CurrentValue <> $this->Allergy->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_status") && $CurrentForm->hasValue("o_status") && $this->status->CurrentValue <> $this->status->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_LMP") && $CurrentForm->hasValue("o_LMP") && $this->LMP->CurrentValue <> $this->LMP->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_ProcedureDateTime") && $CurrentForm->hasValue("o_ProcedureDateTime") && $this->ProcedureDateTime->CurrentValue <> $this->ProcedureDateTime->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_ICSIDate") && $CurrentForm->hasValue("o_ICSIDate") && $this->ICSIDate->CurrentValue <> $this->ICSIDate->OldValue)
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
				$this->PatientId->setSessionValue("");
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
		$this->Reception->CurrentValue = NULL;
		$this->Reception->OldValue = $this->Reception->CurrentValue;
		$this->PatientId->CurrentValue = NULL;
		$this->PatientId->OldValue = $this->PatientId->CurrentValue;
		$this->mrnno->CurrentValue = NULL;
		$this->mrnno->OldValue = $this->mrnno->CurrentValue;
		$this->PatientName->CurrentValue = NULL;
		$this->PatientName->OldValue = $this->PatientName->CurrentValue;
		$this->Telephone->CurrentValue = NULL;
		$this->Telephone->OldValue = $this->Telephone->CurrentValue;
		$this->Age->CurrentValue = NULL;
		$this->Age->OldValue = $this->Age->CurrentValue;
		$this->Gender->CurrentValue = NULL;
		$this->Gender->OldValue = $this->Gender->CurrentValue;
		$this->profilePic->CurrentValue = NULL;
		$this->profilePic->OldValue = $this->profilePic->CurrentValue;
		$this->procedurenotes->CurrentValue = NULL;
		$this->procedurenotes->OldValue = $this->procedurenotes->CurrentValue;
		$this->NextReviewDate->CurrentValue = NULL;
		$this->NextReviewDate->OldValue = $this->NextReviewDate->CurrentValue;
		$this->ICSIAdvised->CurrentValue = NULL;
		$this->ICSIAdvised->OldValue = $this->ICSIAdvised->CurrentValue;
		$this->DeliveryRegistered->CurrentValue = NULL;
		$this->DeliveryRegistered->OldValue = $this->DeliveryRegistered->CurrentValue;
		$this->EDD->CurrentValue = NULL;
		$this->EDD->OldValue = $this->EDD->CurrentValue;
		$this->SerologyPositive->CurrentValue = NULL;
		$this->SerologyPositive->OldValue = $this->SerologyPositive->CurrentValue;
		$this->Allergy->CurrentValue = NULL;
		$this->Allergy->OldValue = $this->Allergy->CurrentValue;
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
		$this->LMP->CurrentValue = NULL;
		$this->LMP->OldValue = $this->LMP->CurrentValue;
		$this->Procedure->CurrentValue = NULL;
		$this->Procedure->OldValue = $this->Procedure->CurrentValue;
		$this->ProcedureDateTime->CurrentValue = NULL;
		$this->ProcedureDateTime->OldValue = $this->ProcedureDateTime->CurrentValue;
		$this->ICSIDate->CurrentValue = NULL;
		$this->ICSIDate->OldValue = $this->ICSIDate->CurrentValue;
		$this->RIDNo->CurrentValue = NULL;
		$this->RIDNo->OldValue = $this->RIDNo->CurrentValue;
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

		// Check field name 'Reception' first before field var 'x_Reception'
		$val = $CurrentForm->hasValue("Reception") ? $CurrentForm->getValue("Reception") : $CurrentForm->getValue("x_Reception");
		if (!$this->Reception->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Reception->Visible = FALSE; // Disable update for API request
			else
				$this->Reception->setFormValue($val);
		}
		$this->Reception->setOldValue($CurrentForm->getValue("o_Reception"));

		// Check field name 'PatientId' first before field var 'x_PatientId'
		$val = $CurrentForm->hasValue("PatientId") ? $CurrentForm->getValue("PatientId") : $CurrentForm->getValue("x_PatientId");
		if (!$this->PatientId->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->PatientId->Visible = FALSE; // Disable update for API request
			else
				$this->PatientId->setFormValue($val);
		}
		$this->PatientId->setOldValue($CurrentForm->getValue("o_PatientId"));

		// Check field name 'mrnno' first before field var 'x_mrnno'
		$val = $CurrentForm->hasValue("mrnno") ? $CurrentForm->getValue("mrnno") : $CurrentForm->getValue("x_mrnno");
		if (!$this->mrnno->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->mrnno->Visible = FALSE; // Disable update for API request
			else
				$this->mrnno->setFormValue($val);
		}
		$this->mrnno->setOldValue($CurrentForm->getValue("o_mrnno"));

		// Check field name 'PatientName' first before field var 'x_PatientName'
		$val = $CurrentForm->hasValue("PatientName") ? $CurrentForm->getValue("PatientName") : $CurrentForm->getValue("x_PatientName");
		if (!$this->PatientName->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->PatientName->Visible = FALSE; // Disable update for API request
			else
				$this->PatientName->setFormValue($val);
		}
		$this->PatientName->setOldValue($CurrentForm->getValue("o_PatientName"));

		// Check field name 'Telephone' first before field var 'x_Telephone'
		$val = $CurrentForm->hasValue("Telephone") ? $CurrentForm->getValue("Telephone") : $CurrentForm->getValue("x_Telephone");
		if (!$this->Telephone->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Telephone->Visible = FALSE; // Disable update for API request
			else
				$this->Telephone->setFormValue($val);
		}
		$this->Telephone->setOldValue($CurrentForm->getValue("o_Telephone"));

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

		// Check field name 'NextReviewDate' first before field var 'x_NextReviewDate'
		$val = $CurrentForm->hasValue("NextReviewDate") ? $CurrentForm->getValue("NextReviewDate") : $CurrentForm->getValue("x_NextReviewDate");
		if (!$this->NextReviewDate->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->NextReviewDate->Visible = FALSE; // Disable update for API request
			else
				$this->NextReviewDate->setFormValue($val);
			$this->NextReviewDate->CurrentValue = UnFormatDateTime($this->NextReviewDate->CurrentValue, 0);
		}
		$this->NextReviewDate->setOldValue($CurrentForm->getValue("o_NextReviewDate"));

		// Check field name 'ICSIAdvised' first before field var 'x_ICSIAdvised'
		$val = $CurrentForm->hasValue("ICSIAdvised") ? $CurrentForm->getValue("ICSIAdvised") : $CurrentForm->getValue("x_ICSIAdvised");
		if (!$this->ICSIAdvised->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->ICSIAdvised->Visible = FALSE; // Disable update for API request
			else
				$this->ICSIAdvised->setFormValue($val);
		}
		$this->ICSIAdvised->setOldValue($CurrentForm->getValue("o_ICSIAdvised"));

		// Check field name 'DeliveryRegistered' first before field var 'x_DeliveryRegistered'
		$val = $CurrentForm->hasValue("DeliveryRegistered") ? $CurrentForm->getValue("DeliveryRegistered") : $CurrentForm->getValue("x_DeliveryRegistered");
		if (!$this->DeliveryRegistered->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->DeliveryRegistered->Visible = FALSE; // Disable update for API request
			else
				$this->DeliveryRegistered->setFormValue($val);
		}
		$this->DeliveryRegistered->setOldValue($CurrentForm->getValue("o_DeliveryRegistered"));

		// Check field name 'EDD' first before field var 'x_EDD'
		$val = $CurrentForm->hasValue("EDD") ? $CurrentForm->getValue("EDD") : $CurrentForm->getValue("x_EDD");
		if (!$this->EDD->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->EDD->Visible = FALSE; // Disable update for API request
			else
				$this->EDD->setFormValue($val);
			$this->EDD->CurrentValue = UnFormatDateTime($this->EDD->CurrentValue, 0);
		}
		$this->EDD->setOldValue($CurrentForm->getValue("o_EDD"));

		// Check field name 'SerologyPositive' first before field var 'x_SerologyPositive'
		$val = $CurrentForm->hasValue("SerologyPositive") ? $CurrentForm->getValue("SerologyPositive") : $CurrentForm->getValue("x_SerologyPositive");
		if (!$this->SerologyPositive->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->SerologyPositive->Visible = FALSE; // Disable update for API request
			else
				$this->SerologyPositive->setFormValue($val);
		}
		$this->SerologyPositive->setOldValue($CurrentForm->getValue("o_SerologyPositive"));

		// Check field name 'Allergy' first before field var 'x_Allergy'
		$val = $CurrentForm->hasValue("Allergy") ? $CurrentForm->getValue("Allergy") : $CurrentForm->getValue("x_Allergy");
		if (!$this->Allergy->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Allergy->Visible = FALSE; // Disable update for API request
			else
				$this->Allergy->setFormValue($val);
		}
		$this->Allergy->setOldValue($CurrentForm->getValue("o_Allergy"));

		// Check field name 'status' first before field var 'x_status'
		$val = $CurrentForm->hasValue("status") ? $CurrentForm->getValue("status") : $CurrentForm->getValue("x_status");
		if (!$this->status->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->status->Visible = FALSE; // Disable update for API request
			else
				$this->status->setFormValue($val);
		}
		$this->status->setOldValue($CurrentForm->getValue("o_status"));

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
			$this->createddatetime->CurrentValue = UnFormatDateTime($this->createddatetime->CurrentValue, 0);
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
			$this->modifieddatetime->CurrentValue = UnFormatDateTime($this->modifieddatetime->CurrentValue, 0);
		}
		$this->modifieddatetime->setOldValue($CurrentForm->getValue("o_modifieddatetime"));

		// Check field name 'LMP' first before field var 'x_LMP'
		$val = $CurrentForm->hasValue("LMP") ? $CurrentForm->getValue("LMP") : $CurrentForm->getValue("x_LMP");
		if (!$this->LMP->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->LMP->Visible = FALSE; // Disable update for API request
			else
				$this->LMP->setFormValue($val);
			$this->LMP->CurrentValue = UnFormatDateTime($this->LMP->CurrentValue, 0);
		}
		$this->LMP->setOldValue($CurrentForm->getValue("o_LMP"));

		// Check field name 'ProcedureDateTime' first before field var 'x_ProcedureDateTime'
		$val = $CurrentForm->hasValue("ProcedureDateTime") ? $CurrentForm->getValue("ProcedureDateTime") : $CurrentForm->getValue("x_ProcedureDateTime");
		if (!$this->ProcedureDateTime->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->ProcedureDateTime->Visible = FALSE; // Disable update for API request
			else
				$this->ProcedureDateTime->setFormValue($val);
			$this->ProcedureDateTime->CurrentValue = UnFormatDateTime($this->ProcedureDateTime->CurrentValue, 0);
		}
		$this->ProcedureDateTime->setOldValue($CurrentForm->getValue("o_ProcedureDateTime"));

		// Check field name 'ICSIDate' first before field var 'x_ICSIDate'
		$val = $CurrentForm->hasValue("ICSIDate") ? $CurrentForm->getValue("ICSIDate") : $CurrentForm->getValue("x_ICSIDate");
		if (!$this->ICSIDate->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->ICSIDate->Visible = FALSE; // Disable update for API request
			else
				$this->ICSIDate->setFormValue($val);
			$this->ICSIDate->CurrentValue = UnFormatDateTime($this->ICSIDate->CurrentValue, 0);
		}
		$this->ICSIDate->setOldValue($CurrentForm->getValue("o_ICSIDate"));
	}

	// Restore form values
	public function restoreFormValues()
	{
		global $CurrentForm;
		if (!$this->isGridAdd() && !$this->isAdd())
			$this->id->CurrentValue = $this->id->FormValue;
		$this->Reception->CurrentValue = $this->Reception->FormValue;
		$this->PatientId->CurrentValue = $this->PatientId->FormValue;
		$this->mrnno->CurrentValue = $this->mrnno->FormValue;
		$this->PatientName->CurrentValue = $this->PatientName->FormValue;
		$this->Telephone->CurrentValue = $this->Telephone->FormValue;
		$this->Age->CurrentValue = $this->Age->FormValue;
		$this->Gender->CurrentValue = $this->Gender->FormValue;
		$this->NextReviewDate->CurrentValue = $this->NextReviewDate->FormValue;
		$this->NextReviewDate->CurrentValue = UnFormatDateTime($this->NextReviewDate->CurrentValue, 0);
		$this->ICSIAdvised->CurrentValue = $this->ICSIAdvised->FormValue;
		$this->DeliveryRegistered->CurrentValue = $this->DeliveryRegistered->FormValue;
		$this->EDD->CurrentValue = $this->EDD->FormValue;
		$this->EDD->CurrentValue = UnFormatDateTime($this->EDD->CurrentValue, 0);
		$this->SerologyPositive->CurrentValue = $this->SerologyPositive->FormValue;
		$this->Allergy->CurrentValue = $this->Allergy->FormValue;
		$this->status->CurrentValue = $this->status->FormValue;
		$this->createdby->CurrentValue = $this->createdby->FormValue;
		$this->createddatetime->CurrentValue = $this->createddatetime->FormValue;
		$this->createddatetime->CurrentValue = UnFormatDateTime($this->createddatetime->CurrentValue, 0);
		$this->modifiedby->CurrentValue = $this->modifiedby->FormValue;
		$this->modifieddatetime->CurrentValue = $this->modifieddatetime->FormValue;
		$this->modifieddatetime->CurrentValue = UnFormatDateTime($this->modifieddatetime->CurrentValue, 0);
		$this->LMP->CurrentValue = $this->LMP->FormValue;
		$this->LMP->CurrentValue = UnFormatDateTime($this->LMP->CurrentValue, 0);
		$this->ProcedureDateTime->CurrentValue = $this->ProcedureDateTime->FormValue;
		$this->ProcedureDateTime->CurrentValue = UnFormatDateTime($this->ProcedureDateTime->CurrentValue, 0);
		$this->ICSIDate->CurrentValue = $this->ICSIDate->FormValue;
		$this->ICSIDate->CurrentValue = UnFormatDateTime($this->ICSIDate->CurrentValue, 0);
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
		$this->Reception->setDbValue($row['Reception']);
		$this->PatientId->setDbValue($row['PatientId']);
		$this->mrnno->setDbValue($row['mrnno']);
		$this->PatientName->setDbValue($row['PatientName']);
		$this->Telephone->setDbValue($row['Telephone']);
		$this->Age->setDbValue($row['Age']);
		$this->Gender->setDbValue($row['Gender']);
		$this->profilePic->setDbValue($row['profilePic']);
		$this->procedurenotes->setDbValue($row['procedurenotes']);
		$this->NextReviewDate->setDbValue($row['NextReviewDate']);
		$this->ICSIAdvised->setDbValue($row['ICSIAdvised']);
		$this->DeliveryRegistered->setDbValue($row['DeliveryRegistered']);
		$this->EDD->setDbValue($row['EDD']);
		$this->SerologyPositive->setDbValue($row['SerologyPositive']);
		$this->Allergy->setDbValue($row['Allergy']);
		$this->status->setDbValue($row['status']);
		$this->createdby->setDbValue($row['createdby']);
		$this->createddatetime->setDbValue($row['createddatetime']);
		$this->modifiedby->setDbValue($row['modifiedby']);
		$this->modifieddatetime->setDbValue($row['modifieddatetime']);
		$this->LMP->setDbValue($row['LMP']);
		$this->Procedure->setDbValue($row['Procedure']);
		$this->ProcedureDateTime->setDbValue($row['ProcedureDateTime']);
		$this->ICSIDate->setDbValue($row['ICSIDate']);
		$this->RIDNo->setDbValue($row['RIDNo']);
	}

	// Return a row with default values
	protected function newRow()
	{
		$this->loadDefaultValues();
		$row = [];
		$row['id'] = $this->id->CurrentValue;
		$row['Reception'] = $this->Reception->CurrentValue;
		$row['PatientId'] = $this->PatientId->CurrentValue;
		$row['mrnno'] = $this->mrnno->CurrentValue;
		$row['PatientName'] = $this->PatientName->CurrentValue;
		$row['Telephone'] = $this->Telephone->CurrentValue;
		$row['Age'] = $this->Age->CurrentValue;
		$row['Gender'] = $this->Gender->CurrentValue;
		$row['profilePic'] = $this->profilePic->CurrentValue;
		$row['procedurenotes'] = $this->procedurenotes->CurrentValue;
		$row['NextReviewDate'] = $this->NextReviewDate->CurrentValue;
		$row['ICSIAdvised'] = $this->ICSIAdvised->CurrentValue;
		$row['DeliveryRegistered'] = $this->DeliveryRegistered->CurrentValue;
		$row['EDD'] = $this->EDD->CurrentValue;
		$row['SerologyPositive'] = $this->SerologyPositive->CurrentValue;
		$row['Allergy'] = $this->Allergy->CurrentValue;
		$row['status'] = $this->status->CurrentValue;
		$row['createdby'] = $this->createdby->CurrentValue;
		$row['createddatetime'] = $this->createddatetime->CurrentValue;
		$row['modifiedby'] = $this->modifiedby->CurrentValue;
		$row['modifieddatetime'] = $this->modifieddatetime->CurrentValue;
		$row['LMP'] = $this->LMP->CurrentValue;
		$row['Procedure'] = $this->Procedure->CurrentValue;
		$row['ProcedureDateTime'] = $this->ProcedureDateTime->CurrentValue;
		$row['ICSIDate'] = $this->ICSIDate->CurrentValue;
		$row['RIDNo'] = $this->RIDNo->CurrentValue;
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

		// Call Row_Rendering event
		$this->Row_Rendering();

		// Common render codes for all row types
		// id
		// Reception
		// PatientId
		// mrnno
		// PatientName
		// Telephone
		// Age
		// Gender
		// profilePic
		// procedurenotes
		// NextReviewDate
		// ICSIAdvised
		// DeliveryRegistered
		// EDD
		// SerologyPositive
		// Allergy
		// status
		// createdby
		// createddatetime
		// modifiedby
		// modifieddatetime
		// LMP
		// Procedure
		// ProcedureDateTime
		// ICSIDate
		// RIDNo

		if ($this->RowType == ROWTYPE_VIEW) { // View row

			// id
			$this->id->ViewValue = $this->id->CurrentValue;
			$this->id->ViewCustomAttributes = "";

			// Reception
			$this->Reception->ViewValue = $this->Reception->CurrentValue;
			$this->Reception->ViewCustomAttributes = "";

			// PatientId
			$this->PatientId->ViewValue = $this->PatientId->CurrentValue;
			$this->PatientId->ViewCustomAttributes = "";

			// mrnno
			$this->mrnno->ViewValue = $this->mrnno->CurrentValue;
			$this->mrnno->ViewCustomAttributes = "";

			// PatientName
			$this->PatientName->ViewValue = $this->PatientName->CurrentValue;
			$this->PatientName->ViewCustomAttributes = "";

			// Telephone
			$this->Telephone->ViewValue = $this->Telephone->CurrentValue;
			$this->Telephone->ViewCustomAttributes = "";

			// Age
			$this->Age->ViewValue = $this->Age->CurrentValue;
			$this->Age->ViewCustomAttributes = "";

			// Gender
			$this->Gender->ViewValue = $this->Gender->CurrentValue;
			$this->Gender->ViewCustomAttributes = "";

			// NextReviewDate
			$this->NextReviewDate->ViewValue = $this->NextReviewDate->CurrentValue;
			$this->NextReviewDate->ViewValue = FormatDateTime($this->NextReviewDate->ViewValue, 0);
			$this->NextReviewDate->ViewCustomAttributes = "";

			// ICSIAdvised
			if (strval($this->ICSIAdvised->CurrentValue) <> "") {
				$this->ICSIAdvised->ViewValue = new OptionValues();
				$arwrk = explode(",", strval($this->ICSIAdvised->CurrentValue));
				$cnt = count($arwrk);
				for ($ari = 0; $ari < $cnt; $ari++)
					$this->ICSIAdvised->ViewValue->add($this->ICSIAdvised->optionCaption(trim($arwrk[$ari])));
			} else {
				$this->ICSIAdvised->ViewValue = NULL;
			}
			$this->ICSIAdvised->ViewCustomAttributes = "";

			// DeliveryRegistered
			if (strval($this->DeliveryRegistered->CurrentValue) <> "") {
				$this->DeliveryRegistered->ViewValue = new OptionValues();
				$arwrk = explode(",", strval($this->DeliveryRegistered->CurrentValue));
				$cnt = count($arwrk);
				for ($ari = 0; $ari < $cnt; $ari++)
					$this->DeliveryRegistered->ViewValue->add($this->DeliveryRegistered->optionCaption(trim($arwrk[$ari])));
			} else {
				$this->DeliveryRegistered->ViewValue = NULL;
			}
			$this->DeliveryRegistered->ViewCustomAttributes = "";

			// EDD
			$this->EDD->ViewValue = $this->EDD->CurrentValue;
			$this->EDD->ViewValue = FormatDateTime($this->EDD->ViewValue, 0);
			$this->EDD->ViewCustomAttributes = "";

			// SerologyPositive
			if (strval($this->SerologyPositive->CurrentValue) <> "") {
				$this->SerologyPositive->ViewValue = new OptionValues();
				$arwrk = explode(",", strval($this->SerologyPositive->CurrentValue));
				$cnt = count($arwrk);
				for ($ari = 0; $ari < $cnt; $ari++)
					$this->SerologyPositive->ViewValue->add($this->SerologyPositive->optionCaption(trim($arwrk[$ari])));
			} else {
				$this->SerologyPositive->ViewValue = NULL;
			}
			$this->SerologyPositive->ViewCustomAttributes = "";

			// Allergy
			$curVal = strval($this->Allergy->CurrentValue);
			if ($curVal <> "") {
				$this->Allergy->ViewValue = $this->Allergy->lookupCacheOption($curVal);
				if ($this->Allergy->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Generic`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->Allergy->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = $rswrk->fields('df');
						$this->Allergy->ViewValue = $this->Allergy->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->Allergy->ViewValue = $this->Allergy->CurrentValue;
					}
				}
			} else {
				$this->Allergy->ViewValue = NULL;
			}
			$this->Allergy->ViewCustomAttributes = "";

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

			// LMP
			$this->LMP->ViewValue = $this->LMP->CurrentValue;
			$this->LMP->ViewValue = FormatDateTime($this->LMP->ViewValue, 0);
			$this->LMP->ViewCustomAttributes = "";

			// ProcedureDateTime
			$this->ProcedureDateTime->ViewValue = $this->ProcedureDateTime->CurrentValue;
			$this->ProcedureDateTime->ViewValue = FormatDateTime($this->ProcedureDateTime->ViewValue, 0);
			$this->ProcedureDateTime->ViewCustomAttributes = "";

			// ICSIDate
			$this->ICSIDate->ViewValue = $this->ICSIDate->CurrentValue;
			$this->ICSIDate->ViewValue = FormatDateTime($this->ICSIDate->ViewValue, 0);
			$this->ICSIDate->ViewCustomAttributes = "";

			// id
			$this->id->LinkCustomAttributes = "";
			$this->id->HrefValue = "";
			$this->id->TooltipValue = "";

			// Reception
			$this->Reception->LinkCustomAttributes = "";
			$this->Reception->HrefValue = "";
			$this->Reception->TooltipValue = "";

			// PatientId
			$this->PatientId->LinkCustomAttributes = "";
			$this->PatientId->HrefValue = "";
			$this->PatientId->TooltipValue = "";

			// mrnno
			$this->mrnno->LinkCustomAttributes = "";
			$this->mrnno->HrefValue = "";
			$this->mrnno->TooltipValue = "";

			// PatientName
			$this->PatientName->LinkCustomAttributes = "";
			$this->PatientName->HrefValue = "";
			$this->PatientName->TooltipValue = "";

			// Telephone
			$this->Telephone->LinkCustomAttributes = "";
			$this->Telephone->HrefValue = "";
			$this->Telephone->TooltipValue = "";

			// Age
			$this->Age->LinkCustomAttributes = "";
			$this->Age->HrefValue = "";
			$this->Age->TooltipValue = "";

			// Gender
			$this->Gender->LinkCustomAttributes = "";
			$this->Gender->HrefValue = "";
			$this->Gender->TooltipValue = "";

			// NextReviewDate
			$this->NextReviewDate->LinkCustomAttributes = "";
			$this->NextReviewDate->HrefValue = "";
			$this->NextReviewDate->TooltipValue = "";

			// ICSIAdvised
			$this->ICSIAdvised->LinkCustomAttributes = "";
			$this->ICSIAdvised->HrefValue = "";
			$this->ICSIAdvised->TooltipValue = "";

			// DeliveryRegistered
			$this->DeliveryRegistered->LinkCustomAttributes = "";
			$this->DeliveryRegistered->HrefValue = "";
			$this->DeliveryRegistered->TooltipValue = "";

			// EDD
			$this->EDD->LinkCustomAttributes = "";
			$this->EDD->HrefValue = "";
			$this->EDD->TooltipValue = "";

			// SerologyPositive
			$this->SerologyPositive->LinkCustomAttributes = "";
			$this->SerologyPositive->HrefValue = "";
			$this->SerologyPositive->TooltipValue = "";

			// Allergy
			$this->Allergy->LinkCustomAttributes = "";
			$this->Allergy->HrefValue = "";
			$this->Allergy->TooltipValue = "";

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

			// LMP
			$this->LMP->LinkCustomAttributes = "";
			$this->LMP->HrefValue = "";
			$this->LMP->TooltipValue = "";

			// ProcedureDateTime
			$this->ProcedureDateTime->LinkCustomAttributes = "";
			$this->ProcedureDateTime->HrefValue = "";
			$this->ProcedureDateTime->TooltipValue = "";

			// ICSIDate
			$this->ICSIDate->LinkCustomAttributes = "";
			$this->ICSIDate->HrefValue = "";
			$this->ICSIDate->TooltipValue = "";
		} elseif ($this->RowType == ROWTYPE_ADD) { // Add row

			// id
			// Reception

			$this->Reception->EditAttrs["class"] = "form-control";
			$this->Reception->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Reception->CurrentValue = HtmlDecode($this->Reception->CurrentValue);
			$this->Reception->EditValue = HtmlEncode($this->Reception->CurrentValue);
			$this->Reception->PlaceHolder = RemoveHtml($this->Reception->caption());

			// PatientId
			$this->PatientId->EditAttrs["class"] = "form-control";
			$this->PatientId->EditCustomAttributes = "";
			if ($this->PatientId->getSessionValue() <> "") {
				$this->PatientId->CurrentValue = $this->PatientId->getSessionValue();
				$this->PatientId->OldValue = $this->PatientId->CurrentValue;
			$this->PatientId->ViewValue = $this->PatientId->CurrentValue;
			$this->PatientId->ViewCustomAttributes = "";
			} else {
			if (REMOVE_XSS)
				$this->PatientId->CurrentValue = HtmlDecode($this->PatientId->CurrentValue);
			$this->PatientId->EditValue = HtmlEncode($this->PatientId->CurrentValue);
			$this->PatientId->PlaceHolder = RemoveHtml($this->PatientId->caption());
			}

			// mrnno
			$this->mrnno->EditAttrs["class"] = "form-control";
			$this->mrnno->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->mrnno->CurrentValue = HtmlDecode($this->mrnno->CurrentValue);
			$this->mrnno->EditValue = HtmlEncode($this->mrnno->CurrentValue);
			$this->mrnno->PlaceHolder = RemoveHtml($this->mrnno->caption());

			// PatientName
			$this->PatientName->EditAttrs["class"] = "form-control";
			$this->PatientName->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->PatientName->CurrentValue = HtmlDecode($this->PatientName->CurrentValue);
			$this->PatientName->EditValue = HtmlEncode($this->PatientName->CurrentValue);
			$this->PatientName->PlaceHolder = RemoveHtml($this->PatientName->caption());

			// Telephone
			$this->Telephone->EditAttrs["class"] = "form-control";
			$this->Telephone->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Telephone->CurrentValue = HtmlDecode($this->Telephone->CurrentValue);
			$this->Telephone->EditValue = HtmlEncode($this->Telephone->CurrentValue);
			$this->Telephone->PlaceHolder = RemoveHtml($this->Telephone->caption());

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

			// NextReviewDate
			$this->NextReviewDate->EditAttrs["class"] = "form-control";
			$this->NextReviewDate->EditCustomAttributes = "";
			$this->NextReviewDate->EditValue = HtmlEncode(FormatDateTime($this->NextReviewDate->CurrentValue, 8));
			$this->NextReviewDate->PlaceHolder = RemoveHtml($this->NextReviewDate->caption());

			// ICSIAdvised
			$this->ICSIAdvised->EditCustomAttributes = "";
			$this->ICSIAdvised->EditValue = $this->ICSIAdvised->options(FALSE);

			// DeliveryRegistered
			$this->DeliveryRegistered->EditCustomAttributes = "";
			$this->DeliveryRegistered->EditValue = $this->DeliveryRegistered->options(FALSE);

			// EDD
			$this->EDD->EditAttrs["class"] = "form-control";
			$this->EDD->EditCustomAttributes = "";
			$this->EDD->EditValue = HtmlEncode(FormatDateTime($this->EDD->CurrentValue, 8));
			$this->EDD->PlaceHolder = RemoveHtml($this->EDD->caption());

			// SerologyPositive
			$this->SerologyPositive->EditCustomAttributes = "";
			$this->SerologyPositive->EditValue = $this->SerologyPositive->options(FALSE);

			// Allergy
			$this->Allergy->EditCustomAttributes = "";
			$curVal = trim(strval($this->Allergy->CurrentValue));
			if ($curVal <> "")
				$this->Allergy->ViewValue = $this->Allergy->lookupCacheOption($curVal);
			else
				$this->Allergy->ViewValue = $this->Allergy->Lookup !== NULL && is_array($this->Allergy->Lookup->Options) ? $curVal : NULL;
			if ($this->Allergy->ViewValue !== NULL) { // Load from cache
				$this->Allergy->EditValue = array_values($this->Allergy->Lookup->Options);
				if ($this->Allergy->ViewValue == "")
					$this->Allergy->ViewValue = $Language->phrase("PleaseSelect");
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`Generic`" . SearchString("=", $this->Allergy->CurrentValue, DATATYPE_STRING, "");
				}
				$sqlWrk = $this->Allergy->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = array();
					$arwrk[1] = HtmlEncode($rswrk->fields('df'));
					$this->Allergy->ViewValue = $this->Allergy->displayValue($arwrk);
				} else {
					$this->Allergy->ViewValue = $Language->phrase("PleaseSelect");
				}
				$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
				if ($rswrk) $rswrk->Close();
				$this->Allergy->EditValue = $arwrk;
			}

			// status
			$this->status->EditAttrs["class"] = "form-control";
			$this->status->EditCustomAttributes = "";
			$this->status->EditValue = HtmlEncode($this->status->CurrentValue);
			$this->status->PlaceHolder = RemoveHtml($this->status->caption());

			// createdby
			// createddatetime
			// modifiedby
			// modifieddatetime
			// LMP

			$this->LMP->EditAttrs["class"] = "form-control";
			$this->LMP->EditCustomAttributes = "";
			$this->LMP->EditValue = HtmlEncode(FormatDateTime($this->LMP->CurrentValue, 8));
			$this->LMP->PlaceHolder = RemoveHtml($this->LMP->caption());

			// ProcedureDateTime
			$this->ProcedureDateTime->EditAttrs["class"] = "form-control";
			$this->ProcedureDateTime->EditCustomAttributes = "";
			$this->ProcedureDateTime->EditValue = HtmlEncode(FormatDateTime($this->ProcedureDateTime->CurrentValue, 8));
			$this->ProcedureDateTime->PlaceHolder = RemoveHtml($this->ProcedureDateTime->caption());

			// ICSIDate
			$this->ICSIDate->EditAttrs["class"] = "form-control";
			$this->ICSIDate->EditCustomAttributes = "";
			$this->ICSIDate->EditValue = HtmlEncode(FormatDateTime($this->ICSIDate->CurrentValue, 8));
			$this->ICSIDate->PlaceHolder = RemoveHtml($this->ICSIDate->caption());

			// Add refer script
			// id

			$this->id->LinkCustomAttributes = "";
			$this->id->HrefValue = "";

			// Reception
			$this->Reception->LinkCustomAttributes = "";
			$this->Reception->HrefValue = "";

			// PatientId
			$this->PatientId->LinkCustomAttributes = "";
			$this->PatientId->HrefValue = "";

			// mrnno
			$this->mrnno->LinkCustomAttributes = "";
			$this->mrnno->HrefValue = "";

			// PatientName
			$this->PatientName->LinkCustomAttributes = "";
			$this->PatientName->HrefValue = "";

			// Telephone
			$this->Telephone->LinkCustomAttributes = "";
			$this->Telephone->HrefValue = "";

			// Age
			$this->Age->LinkCustomAttributes = "";
			$this->Age->HrefValue = "";

			// Gender
			$this->Gender->LinkCustomAttributes = "";
			$this->Gender->HrefValue = "";

			// NextReviewDate
			$this->NextReviewDate->LinkCustomAttributes = "";
			$this->NextReviewDate->HrefValue = "";

			// ICSIAdvised
			$this->ICSIAdvised->LinkCustomAttributes = "";
			$this->ICSIAdvised->HrefValue = "";

			// DeliveryRegistered
			$this->DeliveryRegistered->LinkCustomAttributes = "";
			$this->DeliveryRegistered->HrefValue = "";

			// EDD
			$this->EDD->LinkCustomAttributes = "";
			$this->EDD->HrefValue = "";

			// SerologyPositive
			$this->SerologyPositive->LinkCustomAttributes = "";
			$this->SerologyPositive->HrefValue = "";

			// Allergy
			$this->Allergy->LinkCustomAttributes = "";
			$this->Allergy->HrefValue = "";

			// status
			$this->status->LinkCustomAttributes = "";
			$this->status->HrefValue = "";

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

			// LMP
			$this->LMP->LinkCustomAttributes = "";
			$this->LMP->HrefValue = "";

			// ProcedureDateTime
			$this->ProcedureDateTime->LinkCustomAttributes = "";
			$this->ProcedureDateTime->HrefValue = "";

			// ICSIDate
			$this->ICSIDate->LinkCustomAttributes = "";
			$this->ICSIDate->HrefValue = "";
		} elseif ($this->RowType == ROWTYPE_EDIT) { // Edit row

			// id
			$this->id->EditAttrs["class"] = "form-control";
			$this->id->EditCustomAttributes = "";
			$this->id->EditValue = $this->id->CurrentValue;
			$this->id->ViewCustomAttributes = "";

			// Reception
			$this->Reception->EditAttrs["class"] = "form-control";
			$this->Reception->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Reception->CurrentValue = HtmlDecode($this->Reception->CurrentValue);
			$this->Reception->EditValue = HtmlEncode($this->Reception->CurrentValue);
			$this->Reception->PlaceHolder = RemoveHtml($this->Reception->caption());

			// PatientId
			$this->PatientId->EditAttrs["class"] = "form-control";
			$this->PatientId->EditCustomAttributes = "";
			if ($this->PatientId->getSessionValue() <> "") {
				$this->PatientId->CurrentValue = $this->PatientId->getSessionValue();
				$this->PatientId->OldValue = $this->PatientId->CurrentValue;
			$this->PatientId->ViewValue = $this->PatientId->CurrentValue;
			$this->PatientId->ViewCustomAttributes = "";
			} else {
			if (REMOVE_XSS)
				$this->PatientId->CurrentValue = HtmlDecode($this->PatientId->CurrentValue);
			$this->PatientId->EditValue = HtmlEncode($this->PatientId->CurrentValue);
			$this->PatientId->PlaceHolder = RemoveHtml($this->PatientId->caption());
			}

			// mrnno
			$this->mrnno->EditAttrs["class"] = "form-control";
			$this->mrnno->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->mrnno->CurrentValue = HtmlDecode($this->mrnno->CurrentValue);
			$this->mrnno->EditValue = HtmlEncode($this->mrnno->CurrentValue);
			$this->mrnno->PlaceHolder = RemoveHtml($this->mrnno->caption());

			// PatientName
			$this->PatientName->EditAttrs["class"] = "form-control";
			$this->PatientName->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->PatientName->CurrentValue = HtmlDecode($this->PatientName->CurrentValue);
			$this->PatientName->EditValue = HtmlEncode($this->PatientName->CurrentValue);
			$this->PatientName->PlaceHolder = RemoveHtml($this->PatientName->caption());

			// Telephone
			$this->Telephone->EditAttrs["class"] = "form-control";
			$this->Telephone->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Telephone->CurrentValue = HtmlDecode($this->Telephone->CurrentValue);
			$this->Telephone->EditValue = HtmlEncode($this->Telephone->CurrentValue);
			$this->Telephone->PlaceHolder = RemoveHtml($this->Telephone->caption());

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

			// NextReviewDate
			$this->NextReviewDate->EditAttrs["class"] = "form-control";
			$this->NextReviewDate->EditCustomAttributes = "";
			$this->NextReviewDate->EditValue = HtmlEncode(FormatDateTime($this->NextReviewDate->CurrentValue, 8));
			$this->NextReviewDate->PlaceHolder = RemoveHtml($this->NextReviewDate->caption());

			// ICSIAdvised
			$this->ICSIAdvised->EditCustomAttributes = "";
			$this->ICSIAdvised->EditValue = $this->ICSIAdvised->options(FALSE);

			// DeliveryRegistered
			$this->DeliveryRegistered->EditCustomAttributes = "";
			$this->DeliveryRegistered->EditValue = $this->DeliveryRegistered->options(FALSE);

			// EDD
			$this->EDD->EditAttrs["class"] = "form-control";
			$this->EDD->EditCustomAttributes = "";
			$this->EDD->EditValue = HtmlEncode(FormatDateTime($this->EDD->CurrentValue, 8));
			$this->EDD->PlaceHolder = RemoveHtml($this->EDD->caption());

			// SerologyPositive
			$this->SerologyPositive->EditCustomAttributes = "";
			$this->SerologyPositive->EditValue = $this->SerologyPositive->options(FALSE);

			// Allergy
			$this->Allergy->EditCustomAttributes = "";
			$curVal = trim(strval($this->Allergy->CurrentValue));
			if ($curVal <> "")
				$this->Allergy->ViewValue = $this->Allergy->lookupCacheOption($curVal);
			else
				$this->Allergy->ViewValue = $this->Allergy->Lookup !== NULL && is_array($this->Allergy->Lookup->Options) ? $curVal : NULL;
			if ($this->Allergy->ViewValue !== NULL) { // Load from cache
				$this->Allergy->EditValue = array_values($this->Allergy->Lookup->Options);
				if ($this->Allergy->ViewValue == "")
					$this->Allergy->ViewValue = $Language->phrase("PleaseSelect");
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`Generic`" . SearchString("=", $this->Allergy->CurrentValue, DATATYPE_STRING, "");
				}
				$sqlWrk = $this->Allergy->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = array();
					$arwrk[1] = HtmlEncode($rswrk->fields('df'));
					$this->Allergy->ViewValue = $this->Allergy->displayValue($arwrk);
				} else {
					$this->Allergy->ViewValue = $Language->phrase("PleaseSelect");
				}
				$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
				if ($rswrk) $rswrk->Close();
				$this->Allergy->EditValue = $arwrk;
			}

			// status
			$this->status->EditAttrs["class"] = "form-control";
			$this->status->EditCustomAttributes = "";
			$this->status->EditValue = HtmlEncode($this->status->CurrentValue);
			$this->status->PlaceHolder = RemoveHtml($this->status->caption());

			// createdby
			// createddatetime
			// modifiedby
			// modifieddatetime
			// LMP

			$this->LMP->EditAttrs["class"] = "form-control";
			$this->LMP->EditCustomAttributes = "";
			$this->LMP->EditValue = HtmlEncode(FormatDateTime($this->LMP->CurrentValue, 8));
			$this->LMP->PlaceHolder = RemoveHtml($this->LMP->caption());

			// ProcedureDateTime
			$this->ProcedureDateTime->EditAttrs["class"] = "form-control";
			$this->ProcedureDateTime->EditCustomAttributes = "";
			$this->ProcedureDateTime->EditValue = HtmlEncode(FormatDateTime($this->ProcedureDateTime->CurrentValue, 8));
			$this->ProcedureDateTime->PlaceHolder = RemoveHtml($this->ProcedureDateTime->caption());

			// ICSIDate
			$this->ICSIDate->EditAttrs["class"] = "form-control";
			$this->ICSIDate->EditCustomAttributes = "";
			$this->ICSIDate->EditValue = HtmlEncode(FormatDateTime($this->ICSIDate->CurrentValue, 8));
			$this->ICSIDate->PlaceHolder = RemoveHtml($this->ICSIDate->caption());

			// Edit refer script
			// id

			$this->id->LinkCustomAttributes = "";
			$this->id->HrefValue = "";

			// Reception
			$this->Reception->LinkCustomAttributes = "";
			$this->Reception->HrefValue = "";

			// PatientId
			$this->PatientId->LinkCustomAttributes = "";
			$this->PatientId->HrefValue = "";

			// mrnno
			$this->mrnno->LinkCustomAttributes = "";
			$this->mrnno->HrefValue = "";

			// PatientName
			$this->PatientName->LinkCustomAttributes = "";
			$this->PatientName->HrefValue = "";

			// Telephone
			$this->Telephone->LinkCustomAttributes = "";
			$this->Telephone->HrefValue = "";

			// Age
			$this->Age->LinkCustomAttributes = "";
			$this->Age->HrefValue = "";

			// Gender
			$this->Gender->LinkCustomAttributes = "";
			$this->Gender->HrefValue = "";

			// NextReviewDate
			$this->NextReviewDate->LinkCustomAttributes = "";
			$this->NextReviewDate->HrefValue = "";

			// ICSIAdvised
			$this->ICSIAdvised->LinkCustomAttributes = "";
			$this->ICSIAdvised->HrefValue = "";

			// DeliveryRegistered
			$this->DeliveryRegistered->LinkCustomAttributes = "";
			$this->DeliveryRegistered->HrefValue = "";

			// EDD
			$this->EDD->LinkCustomAttributes = "";
			$this->EDD->HrefValue = "";

			// SerologyPositive
			$this->SerologyPositive->LinkCustomAttributes = "";
			$this->SerologyPositive->HrefValue = "";

			// Allergy
			$this->Allergy->LinkCustomAttributes = "";
			$this->Allergy->HrefValue = "";

			// status
			$this->status->LinkCustomAttributes = "";
			$this->status->HrefValue = "";

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

			// LMP
			$this->LMP->LinkCustomAttributes = "";
			$this->LMP->HrefValue = "";

			// ProcedureDateTime
			$this->ProcedureDateTime->LinkCustomAttributes = "";
			$this->ProcedureDateTime->HrefValue = "";

			// ICSIDate
			$this->ICSIDate->LinkCustomAttributes = "";
			$this->ICSIDate->HrefValue = "";
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
		if ($this->Reception->Required) {
			if (!$this->Reception->IsDetailKey && $this->Reception->FormValue != NULL && $this->Reception->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Reception->caption(), $this->Reception->RequiredErrorMessage));
			}
		}
		if ($this->PatientId->Required) {
			if (!$this->PatientId->IsDetailKey && $this->PatientId->FormValue != NULL && $this->PatientId->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PatientId->caption(), $this->PatientId->RequiredErrorMessage));
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
		if ($this->Telephone->Required) {
			if (!$this->Telephone->IsDetailKey && $this->Telephone->FormValue != NULL && $this->Telephone->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Telephone->caption(), $this->Telephone->RequiredErrorMessage));
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
		if ($this->profilePic->Required) {
			if (!$this->profilePic->IsDetailKey && $this->profilePic->FormValue != NULL && $this->profilePic->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->profilePic->caption(), $this->profilePic->RequiredErrorMessage));
			}
		}
		if ($this->procedurenotes->Required) {
			if (!$this->procedurenotes->IsDetailKey && $this->procedurenotes->FormValue != NULL && $this->procedurenotes->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->procedurenotes->caption(), $this->procedurenotes->RequiredErrorMessage));
			}
		}
		if ($this->NextReviewDate->Required) {
			if (!$this->NextReviewDate->IsDetailKey && $this->NextReviewDate->FormValue != NULL && $this->NextReviewDate->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->NextReviewDate->caption(), $this->NextReviewDate->RequiredErrorMessage));
			}
		}
		if (!CheckDate($this->NextReviewDate->FormValue)) {
			AddMessage($FormError, $this->NextReviewDate->errorMessage());
		}
		if ($this->ICSIAdvised->Required) {
			if ($this->ICSIAdvised->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->ICSIAdvised->caption(), $this->ICSIAdvised->RequiredErrorMessage));
			}
		}
		if ($this->DeliveryRegistered->Required) {
			if ($this->DeliveryRegistered->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->DeliveryRegistered->caption(), $this->DeliveryRegistered->RequiredErrorMessage));
			}
		}
		if ($this->EDD->Required) {
			if (!$this->EDD->IsDetailKey && $this->EDD->FormValue != NULL && $this->EDD->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->EDD->caption(), $this->EDD->RequiredErrorMessage));
			}
		}
		if (!CheckDate($this->EDD->FormValue)) {
			AddMessage($FormError, $this->EDD->errorMessage());
		}
		if ($this->SerologyPositive->Required) {
			if ($this->SerologyPositive->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->SerologyPositive->caption(), $this->SerologyPositive->RequiredErrorMessage));
			}
		}
		if ($this->Allergy->Required) {
			if (!$this->Allergy->IsDetailKey && $this->Allergy->FormValue != NULL && $this->Allergy->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Allergy->caption(), $this->Allergy->RequiredErrorMessage));
			}
		}
		if ($this->status->Required) {
			if (!$this->status->IsDetailKey && $this->status->FormValue != NULL && $this->status->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->status->caption(), $this->status->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->status->FormValue)) {
			AddMessage($FormError, $this->status->errorMessage());
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
		if ($this->LMP->Required) {
			if (!$this->LMP->IsDetailKey && $this->LMP->FormValue != NULL && $this->LMP->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->LMP->caption(), $this->LMP->RequiredErrorMessage));
			}
		}
		if (!CheckDate($this->LMP->FormValue)) {
			AddMessage($FormError, $this->LMP->errorMessage());
		}
		if ($this->Procedure->Required) {
			if (!$this->Procedure->IsDetailKey && $this->Procedure->FormValue != NULL && $this->Procedure->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Procedure->caption(), $this->Procedure->RequiredErrorMessage));
			}
		}
		if ($this->ProcedureDateTime->Required) {
			if (!$this->ProcedureDateTime->IsDetailKey && $this->ProcedureDateTime->FormValue != NULL && $this->ProcedureDateTime->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->ProcedureDateTime->caption(), $this->ProcedureDateTime->RequiredErrorMessage));
			}
		}
		if (!CheckDate($this->ProcedureDateTime->FormValue)) {
			AddMessage($FormError, $this->ProcedureDateTime->errorMessage());
		}
		if ($this->ICSIDate->Required) {
			if (!$this->ICSIDate->IsDetailKey && $this->ICSIDate->FormValue != NULL && $this->ICSIDate->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->ICSIDate->caption(), $this->ICSIDate->RequiredErrorMessage));
			}
		}
		if (!CheckDate($this->ICSIDate->FormValue)) {
			AddMessage($FormError, $this->ICSIDate->errorMessage());
		}
		if ($this->RIDNo->Required) {
			if (!$this->RIDNo->IsDetailKey && $this->RIDNo->FormValue != NULL && $this->RIDNo->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->RIDNo->caption(), $this->RIDNo->RequiredErrorMessage));
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

			// Reception
			$this->Reception->setDbValueDef($rsnew, $this->Reception->CurrentValue, NULL, $this->Reception->ReadOnly);

			// PatientId
			$this->PatientId->setDbValueDef($rsnew, $this->PatientId->CurrentValue, NULL, $this->PatientId->ReadOnly);

			// mrnno
			$this->mrnno->setDbValueDef($rsnew, $this->mrnno->CurrentValue, NULL, $this->mrnno->ReadOnly);

			// PatientName
			$this->PatientName->setDbValueDef($rsnew, $this->PatientName->CurrentValue, NULL, $this->PatientName->ReadOnly);

			// Telephone
			$this->Telephone->setDbValueDef($rsnew, $this->Telephone->CurrentValue, NULL, $this->Telephone->ReadOnly);

			// Age
			$this->Age->setDbValueDef($rsnew, $this->Age->CurrentValue, NULL, $this->Age->ReadOnly);

			// Gender
			$this->Gender->setDbValueDef($rsnew, $this->Gender->CurrentValue, NULL, $this->Gender->ReadOnly);

			// NextReviewDate
			$this->NextReviewDate->setDbValueDef($rsnew, UnFormatDateTime($this->NextReviewDate->CurrentValue, 0), NULL, $this->NextReviewDate->ReadOnly);

			// ICSIAdvised
			$this->ICSIAdvised->setDbValueDef($rsnew, $this->ICSIAdvised->CurrentValue, NULL, $this->ICSIAdvised->ReadOnly);

			// DeliveryRegistered
			$this->DeliveryRegistered->setDbValueDef($rsnew, $this->DeliveryRegistered->CurrentValue, NULL, $this->DeliveryRegistered->ReadOnly);

			// EDD
			$this->EDD->setDbValueDef($rsnew, UnFormatDateTime($this->EDD->CurrentValue, 0), NULL, $this->EDD->ReadOnly);

			// SerologyPositive
			$this->SerologyPositive->setDbValueDef($rsnew, $this->SerologyPositive->CurrentValue, NULL, $this->SerologyPositive->ReadOnly);

			// Allergy
			$this->Allergy->setDbValueDef($rsnew, $this->Allergy->CurrentValue, NULL, $this->Allergy->ReadOnly);

			// status
			$this->status->setDbValueDef($rsnew, $this->status->CurrentValue, 0, $this->status->ReadOnly);

			// createdby
			$this->createdby->setDbValueDef($rsnew, CurrentUserName(), NULL);
			$rsnew['createdby'] = &$this->createdby->DbValue;

			// createddatetime
			$this->createddatetime->setDbValueDef($rsnew, CurrentDateTime(), NULL);
			$rsnew['createddatetime'] = &$this->createddatetime->DbValue;

			// modifiedby
			$this->modifiedby->setDbValueDef($rsnew, CurrentUserName(), NULL);
			$rsnew['modifiedby'] = &$this->modifiedby->DbValue;

			// modifieddatetime
			$this->modifieddatetime->setDbValueDef($rsnew, CurrentDateTime(), NULL);
			$rsnew['modifieddatetime'] = &$this->modifieddatetime->DbValue;

			// LMP
			$this->LMP->setDbValueDef($rsnew, UnFormatDateTime($this->LMP->CurrentValue, 0), NULL, $this->LMP->ReadOnly);

			// ProcedureDateTime
			$this->ProcedureDateTime->setDbValueDef($rsnew, UnFormatDateTime($this->ProcedureDateTime->CurrentValue, 0), NULL, $this->ProcedureDateTime->ReadOnly);

			// ICSIDate
			$this->ICSIDate->setDbValueDef($rsnew, UnFormatDateTime($this->ICSIDate->CurrentValue, 0), NULL, $this->ICSIDate->ReadOnly);

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
			if ($this->getCurrentMasterTable() == "ivf_treatment_plan") {
				$this->PatientId->CurrentValue = $this->PatientId->getSessionValue();
			}
		$conn = &$this->getConnection();

		// Load db values from rsold
		$this->loadDbValues($rsold);
		if ($rsold) {
		}
		$rsnew = [];

		// Reception
		$this->Reception->setDbValueDef($rsnew, $this->Reception->CurrentValue, NULL, FALSE);

		// PatientId
		$this->PatientId->setDbValueDef($rsnew, $this->PatientId->CurrentValue, NULL, FALSE);

		// mrnno
		$this->mrnno->setDbValueDef($rsnew, $this->mrnno->CurrentValue, NULL, FALSE);

		// PatientName
		$this->PatientName->setDbValueDef($rsnew, $this->PatientName->CurrentValue, NULL, FALSE);

		// Telephone
		$this->Telephone->setDbValueDef($rsnew, $this->Telephone->CurrentValue, NULL, FALSE);

		// Age
		$this->Age->setDbValueDef($rsnew, $this->Age->CurrentValue, NULL, FALSE);

		// Gender
		$this->Gender->setDbValueDef($rsnew, $this->Gender->CurrentValue, NULL, FALSE);

		// NextReviewDate
		$this->NextReviewDate->setDbValueDef($rsnew, UnFormatDateTime($this->NextReviewDate->CurrentValue, 0), NULL, FALSE);

		// ICSIAdvised
		$this->ICSIAdvised->setDbValueDef($rsnew, $this->ICSIAdvised->CurrentValue, NULL, FALSE);

		// DeliveryRegistered
		$this->DeliveryRegistered->setDbValueDef($rsnew, $this->DeliveryRegistered->CurrentValue, NULL, FALSE);

		// EDD
		$this->EDD->setDbValueDef($rsnew, UnFormatDateTime($this->EDD->CurrentValue, 0), NULL, FALSE);

		// SerologyPositive
		$this->SerologyPositive->setDbValueDef($rsnew, $this->SerologyPositive->CurrentValue, NULL, FALSE);

		// Allergy
		$this->Allergy->setDbValueDef($rsnew, $this->Allergy->CurrentValue, NULL, FALSE);

		// status
		$this->status->setDbValueDef($rsnew, $this->status->CurrentValue, 0, FALSE);

		// createdby
		$this->createdby->setDbValueDef($rsnew, CurrentUserName(), NULL);
		$rsnew['createdby'] = &$this->createdby->DbValue;

		// createddatetime
		$this->createddatetime->setDbValueDef($rsnew, CurrentDateTime(), NULL);
		$rsnew['createddatetime'] = &$this->createddatetime->DbValue;

		// modifiedby
		$this->modifiedby->setDbValueDef($rsnew, CurrentUserName(), NULL);
		$rsnew['modifiedby'] = &$this->modifiedby->DbValue;

		// modifieddatetime
		$this->modifieddatetime->setDbValueDef($rsnew, CurrentDateTime(), NULL);
		$rsnew['modifieddatetime'] = &$this->modifieddatetime->DbValue;

		// LMP
		$this->LMP->setDbValueDef($rsnew, UnFormatDateTime($this->LMP->CurrentValue, 0), NULL, FALSE);

		// ProcedureDateTime
		$this->ProcedureDateTime->setDbValueDef($rsnew, UnFormatDateTime($this->ProcedureDateTime->CurrentValue, 0), NULL, FALSE);

		// ICSIDate
		$this->ICSIDate->setDbValueDef($rsnew, UnFormatDateTime($this->ICSIDate->CurrentValue, 0), NULL, FALSE);

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
		if ($masterTblVar == "ivf_treatment_plan") {
			$this->PatientId->Visible = FALSE;
			if ($GLOBALS["ivf_treatment_plan"]->EventCancelled)
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
						case "x_Allergy":
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
<?php
namespace PHPMaker2019\HIMS;

/**
 * Page class
 */
class lab_profile_master_delete extends lab_profile_master
{

	// Page ID
	public $PageID = "delete";

	// Project ID
	public $ProjectID = "{EA4F6D13-AF8F-428D-9EA7-BA88D1107EC3}";

	// Table name
	public $TableName = 'lab_profile_master';

	// Page object name
	public $PageObjName = "lab_profile_master_delete";

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
		$GLOBALS["Page"] = &$this;
		$this->TokenTimeout = SessionTimeoutTime();

		// Language object
		if (!isset($Language))
			$Language = new Language();

		// Parent constuctor
		parent::__construct();

		// Table object (lab_profile_master)
		if (!isset($GLOBALS["lab_profile_master"]) || get_class($GLOBALS["lab_profile_master"]) == PROJECT_NAMESPACE . "lab_profile_master") {
			$GLOBALS["lab_profile_master"] = &$this;
			$GLOBALS["Table"] = &$GLOBALS["lab_profile_master"];
		}
		$this->CancelUrl = $this->pageUrl() . "action=cancel";

		// Table object (user_login)
		if (!isset($GLOBALS['user_login']))
			$GLOBALS['user_login'] = new user_login();

		// Page ID
		if (!defined(PROJECT_NAMESPACE . "PAGE_ID"))
			define(PROJECT_NAMESPACE . "PAGE_ID", 'delete');

		// Table name (for backward compatibility)
		if (!defined(PROJECT_NAMESPACE . "TABLE_NAME"))
			define(PROJECT_NAMESPACE . "TABLE_NAME", 'lab_profile_master');

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
	}

	// Terminate page
	public function terminate($url = "")
	{
		global $ExportFileName, $TempImages;

		// Page Unload event
		$this->Page_Unload();

		// Global Page Unloaded event (in userfn*.php)
		Page_Unloaded();

		// Export
		global $EXPORT, $lab_profile_master;
		if ($this->CustomExport && $this->CustomExport == $this->Export && array_key_exists($this->CustomExport, $EXPORT)) {
				$content = ob_get_contents();
			if ($ExportFileName == "")
				$ExportFileName = $this->TableVar;
			$class = PROJECT_NAMESPACE . $EXPORT[$this->CustomExport];
			if (class_exists($class)) {
				$doc = new $class($lab_profile_master);
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
	}
	public $DbMasterFilter = "";
	public $DbDetailFilter = "";
	public $StartRec;
	public $TotalRecs = 0;
	public $RecCnt;
	public $RecKeys = array();
	public $StartRowCnt = 1;
	public $RowCnt = 0;

	//
	// Page run
	//

	public function run()
	{
		global $ExportType, $CustomExportType, $ExportFileName, $UserProfile, $Language, $Security, $RequestSecurity, $CurrentForm;

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
			if (!$Security->canDelete()) {
				$Security->saveLastUrl();
				$this->setFailureMessage(DeniedMessage()); // Set no permission
				if ($Security->canList())
					$this->terminate(GetUrl("lab_profile_masterlist.php"));
				else
					$this->terminate(GetUrl("login.php"));
				return;
			}
		}
		$this->CurrentAction = Param("action"); // Set up current action
		$this->id->setVisibility();
		$this->ProfileCode->setVisibility();
		$this->ProfileName->setVisibility();
		$this->ProfileAmount->setVisibility();
		$this->ProfileSpecialAmount->setVisibility();
		$this->ProfileMasterInactive->setVisibility();
		$this->ReagentAmt->setVisibility();
		$this->LabAmt->setVisibility();
		$this->RefAmt->setVisibility();
		$this->MainDeptCD->setVisibility();
		$this->Individual->setVisibility();
		$this->ShortName->setVisibility();
		$this->Note->Visible = FALSE;
		$this->PrevAmt->setVisibility();
		$this->BillName->setVisibility();
		$this->ActualAmt->setVisibility();
		$this->NoHeading->setVisibility();
		$this->EditDate->setVisibility();
		$this->EditUser->setVisibility();
		$this->HISCD->setVisibility();
		$this->PriceList->setVisibility();
		$this->IPAmt->setVisibility();
		$this->IInsAmt->setVisibility();
		$this->ManualCD->setVisibility();
		$this->Free->setVisibility();
		$this->IIpAmt->setVisibility();
		$this->InsAmt->setVisibility();
		$this->OutSource->setVisibility();
		$this->hideFieldsForAddEdit();

		// Do not use lookup cache
		$this->setUseLookupCache(FALSE);

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

		// Set up lookup cache
		// Set up Breadcrumb

		$this->setupBreadcrumb();

		// Load key parameters
		$this->RecKeys = $this->getRecordKeys(); // Load record keys
		$filter = $this->getFilterFromRecordKeys();
		if ($filter == "") {
			$this->terminate("lab_profile_masterlist.php"); // Prevent SQL injection, return to list
			return;
		}

		// Set up filter (WHERE Clause)
		$this->CurrentFilter = $filter;

		// Get action
		if (IsApi()) {
			$this->CurrentAction = "delete"; // Delete record directly
		} elseif (Post("action") !== NULL) {
			$this->CurrentAction = Post("action");
		} elseif (Get("action") == "1") {
			$this->CurrentAction = "delete"; // Delete record directly
		} else {
			$this->CurrentAction = "show"; // Display record
		}
		if ($this->isDelete()) {
			$this->SendEmail = TRUE; // Send email on delete success
			if ($this->deleteRows()) { // Delete rows
				if ($this->getSuccessMessage() == "")
					$this->setSuccessMessage($Language->phrase("DeleteSuccess")); // Set up success message
				if (IsApi()) {
					$this->terminate(TRUE);
					return;
				} else {
					$this->terminate($this->getReturnUrl()); // Return to caller
				}
			} else { // Delete failed
				if (IsApi()) {
					$this->terminate();
					return;
				}
				$this->CurrentAction = "show"; // Display record
			}
		}
		if ($this->isShow()) { // Load records for display
			if ($this->Recordset = $this->loadRecordset())
				$this->TotalRecs = $this->Recordset->RecordCount(); // Get record count
			if ($this->TotalRecs <= 0) { // No record found, exit
				if ($this->Recordset)
					$this->Recordset->close();
				$this->terminate("lab_profile_masterlist.php"); // Return to list
			}
		}
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
		$this->ProfileCode->setDbValue($row['ProfileCode']);
		$this->ProfileName->setDbValue($row['ProfileName']);
		$this->ProfileAmount->setDbValue($row['ProfileAmount']);
		$this->ProfileSpecialAmount->setDbValue($row['ProfileSpecialAmount']);
		$this->ProfileMasterInactive->setDbValue($row['ProfileMasterInactive']);
		$this->ReagentAmt->setDbValue($row['ReagentAmt']);
		$this->LabAmt->setDbValue($row['LabAmt']);
		$this->RefAmt->setDbValue($row['RefAmt']);
		$this->MainDeptCD->setDbValue($row['MainDeptCD']);
		$this->Individual->setDbValue($row['Individual']);
		$this->ShortName->setDbValue($row['ShortName']);
		$this->Note->setDbValue($row['Note']);
		$this->PrevAmt->setDbValue($row['PrevAmt']);
		$this->BillName->setDbValue($row['BillName']);
		$this->ActualAmt->setDbValue($row['ActualAmt']);
		$this->NoHeading->setDbValue($row['NoHeading']);
		$this->EditDate->setDbValue($row['EditDate']);
		$this->EditUser->setDbValue($row['EditUser']);
		$this->HISCD->setDbValue($row['HISCD']);
		$this->PriceList->setDbValue($row['PriceList']);
		$this->IPAmt->setDbValue($row['IPAmt']);
		$this->IInsAmt->setDbValue($row['IInsAmt']);
		$this->ManualCD->setDbValue($row['ManualCD']);
		$this->Free->setDbValue($row['Free']);
		$this->IIpAmt->setDbValue($row['IIpAmt']);
		$this->InsAmt->setDbValue($row['InsAmt']);
		$this->OutSource->setDbValue($row['OutSource']);
	}

	// Return a row with default values
	protected function newRow()
	{
		$row = [];
		$row['id'] = NULL;
		$row['ProfileCode'] = NULL;
		$row['ProfileName'] = NULL;
		$row['ProfileAmount'] = NULL;
		$row['ProfileSpecialAmount'] = NULL;
		$row['ProfileMasterInactive'] = NULL;
		$row['ReagentAmt'] = NULL;
		$row['LabAmt'] = NULL;
		$row['RefAmt'] = NULL;
		$row['MainDeptCD'] = NULL;
		$row['Individual'] = NULL;
		$row['ShortName'] = NULL;
		$row['Note'] = NULL;
		$row['PrevAmt'] = NULL;
		$row['BillName'] = NULL;
		$row['ActualAmt'] = NULL;
		$row['NoHeading'] = NULL;
		$row['EditDate'] = NULL;
		$row['EditUser'] = NULL;
		$row['HISCD'] = NULL;
		$row['PriceList'] = NULL;
		$row['IPAmt'] = NULL;
		$row['IInsAmt'] = NULL;
		$row['ManualCD'] = NULL;
		$row['Free'] = NULL;
		$row['IIpAmt'] = NULL;
		$row['InsAmt'] = NULL;
		$row['OutSource'] = NULL;
		return $row;
	}

	// Render row values based on field settings
	public function renderRow()
	{
		global $Security, $Language, $CurrentLanguage;

		// Initialize URLs
		// Convert decimal values if posted back

		if ($this->ProfileAmount->FormValue == $this->ProfileAmount->CurrentValue && is_numeric(ConvertToFloatString($this->ProfileAmount->CurrentValue)))
			$this->ProfileAmount->CurrentValue = ConvertToFloatString($this->ProfileAmount->CurrentValue);

		// Convert decimal values if posted back
		if ($this->ProfileSpecialAmount->FormValue == $this->ProfileSpecialAmount->CurrentValue && is_numeric(ConvertToFloatString($this->ProfileSpecialAmount->CurrentValue)))
			$this->ProfileSpecialAmount->CurrentValue = ConvertToFloatString($this->ProfileSpecialAmount->CurrentValue);

		// Convert decimal values if posted back
		if ($this->ReagentAmt->FormValue == $this->ReagentAmt->CurrentValue && is_numeric(ConvertToFloatString($this->ReagentAmt->CurrentValue)))
			$this->ReagentAmt->CurrentValue = ConvertToFloatString($this->ReagentAmt->CurrentValue);

		// Convert decimal values if posted back
		if ($this->LabAmt->FormValue == $this->LabAmt->CurrentValue && is_numeric(ConvertToFloatString($this->LabAmt->CurrentValue)))
			$this->LabAmt->CurrentValue = ConvertToFloatString($this->LabAmt->CurrentValue);

		// Convert decimal values if posted back
		if ($this->RefAmt->FormValue == $this->RefAmt->CurrentValue && is_numeric(ConvertToFloatString($this->RefAmt->CurrentValue)))
			$this->RefAmt->CurrentValue = ConvertToFloatString($this->RefAmt->CurrentValue);

		// Convert decimal values if posted back
		if ($this->PrevAmt->FormValue == $this->PrevAmt->CurrentValue && is_numeric(ConvertToFloatString($this->PrevAmt->CurrentValue)))
			$this->PrevAmt->CurrentValue = ConvertToFloatString($this->PrevAmt->CurrentValue);

		// Convert decimal values if posted back
		if ($this->ActualAmt->FormValue == $this->ActualAmt->CurrentValue && is_numeric(ConvertToFloatString($this->ActualAmt->CurrentValue)))
			$this->ActualAmt->CurrentValue = ConvertToFloatString($this->ActualAmt->CurrentValue);

		// Convert decimal values if posted back
		if ($this->IPAmt->FormValue == $this->IPAmt->CurrentValue && is_numeric(ConvertToFloatString($this->IPAmt->CurrentValue)))
			$this->IPAmt->CurrentValue = ConvertToFloatString($this->IPAmt->CurrentValue);

		// Convert decimal values if posted back
		if ($this->IInsAmt->FormValue == $this->IInsAmt->CurrentValue && is_numeric(ConvertToFloatString($this->IInsAmt->CurrentValue)))
			$this->IInsAmt->CurrentValue = ConvertToFloatString($this->IInsAmt->CurrentValue);

		// Convert decimal values if posted back
		if ($this->IIpAmt->FormValue == $this->IIpAmt->CurrentValue && is_numeric(ConvertToFloatString($this->IIpAmt->CurrentValue)))
			$this->IIpAmt->CurrentValue = ConvertToFloatString($this->IIpAmt->CurrentValue);

		// Convert decimal values if posted back
		if ($this->InsAmt->FormValue == $this->InsAmt->CurrentValue && is_numeric(ConvertToFloatString($this->InsAmt->CurrentValue)))
			$this->InsAmt->CurrentValue = ConvertToFloatString($this->InsAmt->CurrentValue);

		// Call Row_Rendering event
		$this->Row_Rendering();

		// Common render codes for all row types
		// id
		// ProfileCode
		// ProfileName
		// ProfileAmount
		// ProfileSpecialAmount
		// ProfileMasterInactive
		// ReagentAmt
		// LabAmt
		// RefAmt
		// MainDeptCD
		// Individual
		// ShortName
		// Note
		// PrevAmt
		// BillName
		// ActualAmt
		// NoHeading
		// EditDate
		// EditUser
		// HISCD
		// PriceList
		// IPAmt
		// IInsAmt
		// ManualCD
		// Free
		// IIpAmt
		// InsAmt
		// OutSource

		if ($this->RowType == ROWTYPE_VIEW) { // View row

			// id
			$this->id->ViewValue = $this->id->CurrentValue;
			$this->id->ViewCustomAttributes = "";

			// ProfileCode
			$this->ProfileCode->ViewValue = $this->ProfileCode->CurrentValue;
			$this->ProfileCode->ViewCustomAttributes = "";

			// ProfileName
			$this->ProfileName->ViewValue = $this->ProfileName->CurrentValue;
			$this->ProfileName->ViewCustomAttributes = "";

			// ProfileAmount
			$this->ProfileAmount->ViewValue = $this->ProfileAmount->CurrentValue;
			$this->ProfileAmount->ViewValue = FormatNumber($this->ProfileAmount->ViewValue, 2, -2, -2, -2);
			$this->ProfileAmount->ViewCustomAttributes = "";

			// ProfileSpecialAmount
			$this->ProfileSpecialAmount->ViewValue = $this->ProfileSpecialAmount->CurrentValue;
			$this->ProfileSpecialAmount->ViewValue = FormatNumber($this->ProfileSpecialAmount->ViewValue, 2, -2, -2, -2);
			$this->ProfileSpecialAmount->ViewCustomAttributes = "";

			// ProfileMasterInactive
			$this->ProfileMasterInactive->ViewValue = $this->ProfileMasterInactive->CurrentValue;
			$this->ProfileMasterInactive->ViewCustomAttributes = "";

			// ReagentAmt
			$this->ReagentAmt->ViewValue = $this->ReagentAmt->CurrentValue;
			$this->ReagentAmt->ViewValue = FormatNumber($this->ReagentAmt->ViewValue, 2, -2, -2, -2);
			$this->ReagentAmt->ViewCustomAttributes = "";

			// LabAmt
			$this->LabAmt->ViewValue = $this->LabAmt->CurrentValue;
			$this->LabAmt->ViewValue = FormatNumber($this->LabAmt->ViewValue, 2, -2, -2, -2);
			$this->LabAmt->ViewCustomAttributes = "";

			// RefAmt
			$this->RefAmt->ViewValue = $this->RefAmt->CurrentValue;
			$this->RefAmt->ViewValue = FormatNumber($this->RefAmt->ViewValue, 2, -2, -2, -2);
			$this->RefAmt->ViewCustomAttributes = "";

			// MainDeptCD
			$this->MainDeptCD->ViewValue = $this->MainDeptCD->CurrentValue;
			$this->MainDeptCD->ViewCustomAttributes = "";

			// Individual
			$this->Individual->ViewValue = $this->Individual->CurrentValue;
			$this->Individual->ViewCustomAttributes = "";

			// ShortName
			$this->ShortName->ViewValue = $this->ShortName->CurrentValue;
			$this->ShortName->ViewCustomAttributes = "";

			// PrevAmt
			$this->PrevAmt->ViewValue = $this->PrevAmt->CurrentValue;
			$this->PrevAmt->ViewValue = FormatNumber($this->PrevAmt->ViewValue, 2, -2, -2, -2);
			$this->PrevAmt->ViewCustomAttributes = "";

			// BillName
			$this->BillName->ViewValue = $this->BillName->CurrentValue;
			$this->BillName->ViewCustomAttributes = "";

			// ActualAmt
			$this->ActualAmt->ViewValue = $this->ActualAmt->CurrentValue;
			$this->ActualAmt->ViewValue = FormatNumber($this->ActualAmt->ViewValue, 2, -2, -2, -2);
			$this->ActualAmt->ViewCustomAttributes = "";

			// NoHeading
			$this->NoHeading->ViewValue = $this->NoHeading->CurrentValue;
			$this->NoHeading->ViewCustomAttributes = "";

			// EditDate
			$this->EditDate->ViewValue = $this->EditDate->CurrentValue;
			$this->EditDate->ViewValue = FormatDateTime($this->EditDate->ViewValue, 0);
			$this->EditDate->ViewCustomAttributes = "";

			// EditUser
			$this->EditUser->ViewValue = $this->EditUser->CurrentValue;
			$this->EditUser->ViewCustomAttributes = "";

			// HISCD
			$this->HISCD->ViewValue = $this->HISCD->CurrentValue;
			$this->HISCD->ViewCustomAttributes = "";

			// PriceList
			$this->PriceList->ViewValue = $this->PriceList->CurrentValue;
			$this->PriceList->ViewCustomAttributes = "";

			// IPAmt
			$this->IPAmt->ViewValue = $this->IPAmt->CurrentValue;
			$this->IPAmt->ViewValue = FormatNumber($this->IPAmt->ViewValue, 2, -2, -2, -2);
			$this->IPAmt->ViewCustomAttributes = "";

			// IInsAmt
			$this->IInsAmt->ViewValue = $this->IInsAmt->CurrentValue;
			$this->IInsAmt->ViewValue = FormatNumber($this->IInsAmt->ViewValue, 2, -2, -2, -2);
			$this->IInsAmt->ViewCustomAttributes = "";

			// ManualCD
			$this->ManualCD->ViewValue = $this->ManualCD->CurrentValue;
			$this->ManualCD->ViewCustomAttributes = "";

			// Free
			$this->Free->ViewValue = $this->Free->CurrentValue;
			$this->Free->ViewCustomAttributes = "";

			// IIpAmt
			$this->IIpAmt->ViewValue = $this->IIpAmt->CurrentValue;
			$this->IIpAmt->ViewValue = FormatNumber($this->IIpAmt->ViewValue, 2, -2, -2, -2);
			$this->IIpAmt->ViewCustomAttributes = "";

			// InsAmt
			$this->InsAmt->ViewValue = $this->InsAmt->CurrentValue;
			$this->InsAmt->ViewValue = FormatNumber($this->InsAmt->ViewValue, 2, -2, -2, -2);
			$this->InsAmt->ViewCustomAttributes = "";

			// OutSource
			$this->OutSource->ViewValue = $this->OutSource->CurrentValue;
			$this->OutSource->ViewCustomAttributes = "";

			// id
			$this->id->LinkCustomAttributes = "";
			$this->id->HrefValue = "";
			$this->id->TooltipValue = "";

			// ProfileCode
			$this->ProfileCode->LinkCustomAttributes = "";
			$this->ProfileCode->HrefValue = "";
			$this->ProfileCode->TooltipValue = "";

			// ProfileName
			$this->ProfileName->LinkCustomAttributes = "";
			$this->ProfileName->HrefValue = "";
			$this->ProfileName->TooltipValue = "";

			// ProfileAmount
			$this->ProfileAmount->LinkCustomAttributes = "";
			$this->ProfileAmount->HrefValue = "";
			$this->ProfileAmount->TooltipValue = "";

			// ProfileSpecialAmount
			$this->ProfileSpecialAmount->LinkCustomAttributes = "";
			$this->ProfileSpecialAmount->HrefValue = "";
			$this->ProfileSpecialAmount->TooltipValue = "";

			// ProfileMasterInactive
			$this->ProfileMasterInactive->LinkCustomAttributes = "";
			$this->ProfileMasterInactive->HrefValue = "";
			$this->ProfileMasterInactive->TooltipValue = "";

			// ReagentAmt
			$this->ReagentAmt->LinkCustomAttributes = "";
			$this->ReagentAmt->HrefValue = "";
			$this->ReagentAmt->TooltipValue = "";

			// LabAmt
			$this->LabAmt->LinkCustomAttributes = "";
			$this->LabAmt->HrefValue = "";
			$this->LabAmt->TooltipValue = "";

			// RefAmt
			$this->RefAmt->LinkCustomAttributes = "";
			$this->RefAmt->HrefValue = "";
			$this->RefAmt->TooltipValue = "";

			// MainDeptCD
			$this->MainDeptCD->LinkCustomAttributes = "";
			$this->MainDeptCD->HrefValue = "";
			$this->MainDeptCD->TooltipValue = "";

			// Individual
			$this->Individual->LinkCustomAttributes = "";
			$this->Individual->HrefValue = "";
			$this->Individual->TooltipValue = "";

			// ShortName
			$this->ShortName->LinkCustomAttributes = "";
			$this->ShortName->HrefValue = "";
			$this->ShortName->TooltipValue = "";

			// PrevAmt
			$this->PrevAmt->LinkCustomAttributes = "";
			$this->PrevAmt->HrefValue = "";
			$this->PrevAmt->TooltipValue = "";

			// BillName
			$this->BillName->LinkCustomAttributes = "";
			$this->BillName->HrefValue = "";
			$this->BillName->TooltipValue = "";

			// ActualAmt
			$this->ActualAmt->LinkCustomAttributes = "";
			$this->ActualAmt->HrefValue = "";
			$this->ActualAmt->TooltipValue = "";

			// NoHeading
			$this->NoHeading->LinkCustomAttributes = "";
			$this->NoHeading->HrefValue = "";
			$this->NoHeading->TooltipValue = "";

			// EditDate
			$this->EditDate->LinkCustomAttributes = "";
			$this->EditDate->HrefValue = "";
			$this->EditDate->TooltipValue = "";

			// EditUser
			$this->EditUser->LinkCustomAttributes = "";
			$this->EditUser->HrefValue = "";
			$this->EditUser->TooltipValue = "";

			// HISCD
			$this->HISCD->LinkCustomAttributes = "";
			$this->HISCD->HrefValue = "";
			$this->HISCD->TooltipValue = "";

			// PriceList
			$this->PriceList->LinkCustomAttributes = "";
			$this->PriceList->HrefValue = "";
			$this->PriceList->TooltipValue = "";

			// IPAmt
			$this->IPAmt->LinkCustomAttributes = "";
			$this->IPAmt->HrefValue = "";
			$this->IPAmt->TooltipValue = "";

			// IInsAmt
			$this->IInsAmt->LinkCustomAttributes = "";
			$this->IInsAmt->HrefValue = "";
			$this->IInsAmt->TooltipValue = "";

			// ManualCD
			$this->ManualCD->LinkCustomAttributes = "";
			$this->ManualCD->HrefValue = "";
			$this->ManualCD->TooltipValue = "";

			// Free
			$this->Free->LinkCustomAttributes = "";
			$this->Free->HrefValue = "";
			$this->Free->TooltipValue = "";

			// IIpAmt
			$this->IIpAmt->LinkCustomAttributes = "";
			$this->IIpAmt->HrefValue = "";
			$this->IIpAmt->TooltipValue = "";

			// InsAmt
			$this->InsAmt->LinkCustomAttributes = "";
			$this->InsAmt->HrefValue = "";
			$this->InsAmt->TooltipValue = "";

			// OutSource
			$this->OutSource->LinkCustomAttributes = "";
			$this->OutSource->HrefValue = "";
			$this->OutSource->TooltipValue = "";
		}

		// Call Row Rendered event
		if ($this->RowType <> ROWTYPE_AGGREGATEINIT)
			$this->Row_Rendered();
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
		$conn->beginTrans();

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
		if ($deleteRows) {
			$conn->commitTrans(); // Commit the changes
		} else {
			$conn->rollbackTrans(); // Rollback changes
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

	// Set up Breadcrumb
	protected function setupBreadcrumb()
	{
		global $Breadcrumb, $Language;
		$Breadcrumb = new Breadcrumb();
		$url = substr(CurrentUrl(), strrpos(CurrentUrl(), "/")+1);
		$Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("lab_profile_masterlist.php"), "", $this->TableVar, TRUE);
		$pageId = "delete";
		$Breadcrumb->add("delete", $pageId, $url);
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
}
?>
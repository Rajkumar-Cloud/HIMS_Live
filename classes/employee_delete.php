<?php
namespace PHPMaker2019\HIMS;

/**
 * Page class
 */
class employee_delete extends employee
{

	// Page ID
	public $PageID = "delete";

	// Project ID
	public $ProjectID = "{EA4F6D13-AF8F-428D-9EA7-BA88D1107EC3}";

	// Table name
	public $TableName = 'employee';

	// Page object name
	public $PageObjName = "employee_delete";

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

		// Table object (employee)
		if (!isset($GLOBALS["employee"]) || get_class($GLOBALS["employee"]) == PROJECT_NAMESPACE . "employee") {
			$GLOBALS["employee"] = &$this;
			$GLOBALS["Table"] = &$GLOBALS["employee"];
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
			define(PROJECT_NAMESPACE . "TABLE_NAME", 'employee');

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
		global $EXPORT, $employee;
		if ($this->CustomExport && $this->CustomExport == $this->Export && array_key_exists($this->CustomExport, $EXPORT)) {
				$content = ob_get_contents();
			if ($ExportFileName == "")
				$ExportFileName = $this->TableVar;
			$class = PROJECT_NAMESPACE . $EXPORT[$this->CustomExport];
			if (class_exists($class)) {
				$doc = new $class($employee);
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
					$this->terminate(GetUrl("employeelist.php"));
				else
					$this->terminate(GetUrl("login.php"));
				return;
			}
		}
		$this->CurrentAction = Param("action"); // Set up current action
		$this->id->setVisibility();
		$this->employee_id->setVisibility();
		$this->first_name->setVisibility();
		$this->middle_name->setVisibility();
		$this->last_name->setVisibility();
		$this->gender->setVisibility();
		$this->nationality->setVisibility();
		$this->birthday->setVisibility();
		$this->marital_status->setVisibility();
		$this->ssn_num->setVisibility();
		$this->nic_num->setVisibility();
		$this->other_id->setVisibility();
		$this->driving_license->setVisibility();
		$this->driving_license_exp_date->setVisibility();
		$this->employment_status->setVisibility();
		$this->job_title->setVisibility();
		$this->pay_grade->setVisibility();
		$this->work_station_id->setVisibility();
		$this->address1->setVisibility();
		$this->address2->setVisibility();
		$this->city->setVisibility();
		$this->country->setVisibility();
		$this->province->setVisibility();
		$this->postal_code->setVisibility();
		$this->home_phone->setVisibility();
		$this->mobile_phone->setVisibility();
		$this->work_phone->setVisibility();
		$this->work_email->setVisibility();
		$this->private_email->setVisibility();
		$this->joined_date->setVisibility();
		$this->confirmation_date->setVisibility();
		$this->supervisor->setVisibility();
		$this->indirect_supervisors->setVisibility();
		$this->department->setVisibility();
		$this->custom1->setVisibility();
		$this->custom2->setVisibility();
		$this->custom3->setVisibility();
		$this->custom4->setVisibility();
		$this->custom5->setVisibility();
		$this->custom6->setVisibility();
		$this->custom7->setVisibility();
		$this->custom8->setVisibility();
		$this->custom9->setVisibility();
		$this->custom10->setVisibility();
		$this->termination_date->setVisibility();
		$this->notes->Visible = FALSE;
		$this->ethnicity->setVisibility();
		$this->immigration_status->setVisibility();
		$this->approver1->setVisibility();
		$this->approver2->setVisibility();
		$this->approver3->setVisibility();
		$this->status->setVisibility();
		$this->HospID->setVisibility();
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
		$this->setupLookupOptions($this->gender);
		$this->setupLookupOptions($this->nationality);
		$this->setupLookupOptions($this->approver1);
		$this->setupLookupOptions($this->approver2);
		$this->setupLookupOptions($this->approver3);
		$this->setupLookupOptions($this->status);

		// Set up Breadcrumb
		$this->setupBreadcrumb();

		// Load key parameters
		$this->RecKeys = $this->getRecordKeys(); // Load record keys
		$filter = $this->getFilterFromRecordKeys();
		if ($filter == "") {
			$this->terminate("employeelist.php"); // Prevent SQL injection, return to list
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
				$this->terminate("employeelist.php"); // Return to list
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
		$this->employee_id->setDbValue($row['employee_id']);
		$this->first_name->setDbValue($row['first_name']);
		$this->middle_name->setDbValue($row['middle_name']);
		$this->last_name->setDbValue($row['last_name']);
		$this->gender->setDbValue($row['gender']);
		$this->nationality->setDbValue($row['nationality']);
		$this->birthday->setDbValue($row['birthday']);
		$this->marital_status->setDbValue($row['marital_status']);
		$this->ssn_num->setDbValue($row['ssn_num']);
		$this->nic_num->setDbValue($row['nic_num']);
		$this->other_id->setDbValue($row['other_id']);
		$this->driving_license->setDbValue($row['driving_license']);
		$this->driving_license_exp_date->setDbValue($row['driving_license_exp_date']);
		$this->employment_status->setDbValue($row['employment_status']);
		$this->job_title->setDbValue($row['job_title']);
		$this->pay_grade->setDbValue($row['pay_grade']);
		$this->work_station_id->setDbValue($row['work_station_id']);
		$this->address1->setDbValue($row['address1']);
		$this->address2->setDbValue($row['address2']);
		$this->city->setDbValue($row['city']);
		$this->country->setDbValue($row['country']);
		$this->province->setDbValue($row['province']);
		$this->postal_code->setDbValue($row['postal_code']);
		$this->home_phone->setDbValue($row['home_phone']);
		$this->mobile_phone->setDbValue($row['mobile_phone']);
		$this->work_phone->setDbValue($row['work_phone']);
		$this->work_email->setDbValue($row['work_email']);
		$this->private_email->setDbValue($row['private_email']);
		$this->joined_date->setDbValue($row['joined_date']);
		$this->confirmation_date->setDbValue($row['confirmation_date']);
		$this->supervisor->setDbValue($row['supervisor']);
		$this->indirect_supervisors->setDbValue($row['indirect_supervisors']);
		$this->department->setDbValue($row['department']);
		$this->custom1->setDbValue($row['custom1']);
		$this->custom2->setDbValue($row['custom2']);
		$this->custom3->setDbValue($row['custom3']);
		$this->custom4->setDbValue($row['custom4']);
		$this->custom5->setDbValue($row['custom5']);
		$this->custom6->setDbValue($row['custom6']);
		$this->custom7->setDbValue($row['custom7']);
		$this->custom8->setDbValue($row['custom8']);
		$this->custom9->setDbValue($row['custom9']);
		$this->custom10->setDbValue($row['custom10']);
		$this->termination_date->setDbValue($row['termination_date']);
		$this->notes->setDbValue($row['notes']);
		$this->ethnicity->setDbValue($row['ethnicity']);
		$this->immigration_status->setDbValue($row['immigration_status']);
		$this->approver1->setDbValue($row['approver1']);
		$this->approver2->setDbValue($row['approver2']);
		$this->approver3->setDbValue($row['approver3']);
		$this->status->setDbValue($row['status']);
		$this->HospID->setDbValue($row['HospID']);
	}

	// Return a row with default values
	protected function newRow()
	{
		$row = [];
		$row['id'] = NULL;
		$row['employee_id'] = NULL;
		$row['first_name'] = NULL;
		$row['middle_name'] = NULL;
		$row['last_name'] = NULL;
		$row['gender'] = NULL;
		$row['nationality'] = NULL;
		$row['birthday'] = NULL;
		$row['marital_status'] = NULL;
		$row['ssn_num'] = NULL;
		$row['nic_num'] = NULL;
		$row['other_id'] = NULL;
		$row['driving_license'] = NULL;
		$row['driving_license_exp_date'] = NULL;
		$row['employment_status'] = NULL;
		$row['job_title'] = NULL;
		$row['pay_grade'] = NULL;
		$row['work_station_id'] = NULL;
		$row['address1'] = NULL;
		$row['address2'] = NULL;
		$row['city'] = NULL;
		$row['country'] = NULL;
		$row['province'] = NULL;
		$row['postal_code'] = NULL;
		$row['home_phone'] = NULL;
		$row['mobile_phone'] = NULL;
		$row['work_phone'] = NULL;
		$row['work_email'] = NULL;
		$row['private_email'] = NULL;
		$row['joined_date'] = NULL;
		$row['confirmation_date'] = NULL;
		$row['supervisor'] = NULL;
		$row['indirect_supervisors'] = NULL;
		$row['department'] = NULL;
		$row['custom1'] = NULL;
		$row['custom2'] = NULL;
		$row['custom3'] = NULL;
		$row['custom4'] = NULL;
		$row['custom5'] = NULL;
		$row['custom6'] = NULL;
		$row['custom7'] = NULL;
		$row['custom8'] = NULL;
		$row['custom9'] = NULL;
		$row['custom10'] = NULL;
		$row['termination_date'] = NULL;
		$row['notes'] = NULL;
		$row['ethnicity'] = NULL;
		$row['immigration_status'] = NULL;
		$row['approver1'] = NULL;
		$row['approver2'] = NULL;
		$row['approver3'] = NULL;
		$row['status'] = NULL;
		$row['HospID'] = NULL;
		return $row;
	}

	// Render row values based on field settings
	public function renderRow()
	{
		global $Security, $Language, $CurrentLanguage;

		// Initialize URLs
		// Call Row_Rendering event

		$this->Row_Rendering();

		// Common render codes for all row types
		// id
		// employee_id
		// first_name
		// middle_name
		// last_name
		// gender
		// nationality
		// birthday
		// marital_status
		// ssn_num
		// nic_num
		// other_id
		// driving_license
		// driving_license_exp_date
		// employment_status
		// job_title
		// pay_grade
		// work_station_id
		// address1
		// address2
		// city
		// country
		// province
		// postal_code
		// home_phone
		// mobile_phone
		// work_phone
		// work_email
		// private_email
		// joined_date
		// confirmation_date
		// supervisor
		// indirect_supervisors
		// department
		// custom1
		// custom2
		// custom3
		// custom4
		// custom5
		// custom6
		// custom7
		// custom8
		// custom9
		// custom10
		// termination_date
		// notes
		// ethnicity
		// immigration_status
		// approver1
		// approver2
		// approver3
		// status
		// HospID

		if ($this->RowType == ROWTYPE_VIEW) { // View row

			// id
			$this->id->ViewValue = $this->id->CurrentValue;
			$this->id->ViewCustomAttributes = "";

			// employee_id
			$this->employee_id->ViewValue = $this->employee_id->CurrentValue;
			$this->employee_id->ViewCustomAttributes = "";

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
			if ($curVal <> "") {
				$this->gender->ViewValue = $this->gender->lookupCacheOption($curVal);
				if ($this->gender->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->gender->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
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

			// nationality
			$curVal = strval($this->nationality->CurrentValue);
			if ($curVal <> "") {
				$this->nationality->ViewValue = $this->nationality->lookupCacheOption($curVal);
				if ($this->nationality->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
					$sqlWrk = $this->nationality->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = $rswrk->fields('df');
						$this->nationality->ViewValue = $this->nationality->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->nationality->ViewValue = $this->nationality->CurrentValue;
					}
				}
			} else {
				$this->nationality->ViewValue = NULL;
			}
			$this->nationality->ViewCustomAttributes = "";

			// birthday
			$this->birthday->ViewValue = $this->birthday->CurrentValue;
			$this->birthday->ViewValue = FormatDateTime($this->birthday->ViewValue, 0);
			$this->birthday->ViewCustomAttributes = "";

			// marital_status
			if (strval($this->marital_status->CurrentValue) <> "") {
				$this->marital_status->ViewValue = $this->marital_status->optionCaption($this->marital_status->CurrentValue);
			} else {
				$this->marital_status->ViewValue = NULL;
			}
			$this->marital_status->ViewCustomAttributes = "";

			// ssn_num
			$this->ssn_num->ViewValue = $this->ssn_num->CurrentValue;
			$this->ssn_num->ViewCustomAttributes = "";

			// nic_num
			$this->nic_num->ViewValue = $this->nic_num->CurrentValue;
			$this->nic_num->ViewCustomAttributes = "";

			// other_id
			$this->other_id->ViewValue = $this->other_id->CurrentValue;
			$this->other_id->ViewCustomAttributes = "";

			// driving_license
			$this->driving_license->ViewValue = $this->driving_license->CurrentValue;
			$this->driving_license->ViewCustomAttributes = "";

			// driving_license_exp_date
			$this->driving_license_exp_date->ViewValue = $this->driving_license_exp_date->CurrentValue;
			$this->driving_license_exp_date->ViewValue = FormatDateTime($this->driving_license_exp_date->ViewValue, 0);
			$this->driving_license_exp_date->ViewCustomAttributes = "";

			// employment_status
			$this->employment_status->ViewValue = $this->employment_status->CurrentValue;
			$this->employment_status->ViewValue = FormatNumber($this->employment_status->ViewValue, 0, -2, -2, -2);
			$this->employment_status->ViewCustomAttributes = "";

			// job_title
			$this->job_title->ViewValue = $this->job_title->CurrentValue;
			$this->job_title->ViewValue = FormatNumber($this->job_title->ViewValue, 0, -2, -2, -2);
			$this->job_title->ViewCustomAttributes = "";

			// pay_grade
			$this->pay_grade->ViewValue = $this->pay_grade->CurrentValue;
			$this->pay_grade->ViewValue = FormatNumber($this->pay_grade->ViewValue, 0, -2, -2, -2);
			$this->pay_grade->ViewCustomAttributes = "";

			// work_station_id
			$this->work_station_id->ViewValue = $this->work_station_id->CurrentValue;
			$this->work_station_id->ViewCustomAttributes = "";

			// address1
			$this->address1->ViewValue = $this->address1->CurrentValue;
			$this->address1->ViewCustomAttributes = "";

			// address2
			$this->address2->ViewValue = $this->address2->CurrentValue;
			$this->address2->ViewCustomAttributes = "";

			// city
			$this->city->ViewValue = $this->city->CurrentValue;
			$this->city->ViewCustomAttributes = "";

			// country
			$this->country->ViewValue = $this->country->CurrentValue;
			$this->country->ViewCustomAttributes = "";

			// province
			$this->province->ViewValue = $this->province->CurrentValue;
			$this->province->ViewValue = FormatNumber($this->province->ViewValue, 0, -2, -2, -2);
			$this->province->ViewCustomAttributes = "";

			// postal_code
			$this->postal_code->ViewValue = $this->postal_code->CurrentValue;
			$this->postal_code->ViewCustomAttributes = "";

			// home_phone
			$this->home_phone->ViewValue = $this->home_phone->CurrentValue;
			$this->home_phone->ViewCustomAttributes = "";

			// mobile_phone
			$this->mobile_phone->ViewValue = $this->mobile_phone->CurrentValue;
			$this->mobile_phone->ViewCustomAttributes = "";

			// work_phone
			$this->work_phone->ViewValue = $this->work_phone->CurrentValue;
			$this->work_phone->ViewCustomAttributes = "";

			// work_email
			$this->work_email->ViewValue = $this->work_email->CurrentValue;
			$this->work_email->ViewCustomAttributes = "";

			// private_email
			$this->private_email->ViewValue = $this->private_email->CurrentValue;
			$this->private_email->ViewCustomAttributes = "";

			// joined_date
			$this->joined_date->ViewValue = $this->joined_date->CurrentValue;
			$this->joined_date->ViewValue = FormatDateTime($this->joined_date->ViewValue, 0);
			$this->joined_date->ViewCustomAttributes = "";

			// confirmation_date
			$this->confirmation_date->ViewValue = $this->confirmation_date->CurrentValue;
			$this->confirmation_date->ViewValue = FormatDateTime($this->confirmation_date->ViewValue, 0);
			$this->confirmation_date->ViewCustomAttributes = "";

			// supervisor
			$this->supervisor->ViewValue = $this->supervisor->CurrentValue;
			$this->supervisor->ViewValue = FormatNumber($this->supervisor->ViewValue, 0, -2, -2, -2);
			$this->supervisor->ViewCustomAttributes = "";

			// indirect_supervisors
			$this->indirect_supervisors->ViewValue = $this->indirect_supervisors->CurrentValue;
			$this->indirect_supervisors->ViewCustomAttributes = "";

			// department
			$this->department->ViewValue = $this->department->CurrentValue;
			$this->department->ViewValue = FormatNumber($this->department->ViewValue, 0, -2, -2, -2);
			$this->department->ViewCustomAttributes = "";

			// custom1
			$this->custom1->ViewValue = $this->custom1->CurrentValue;
			$this->custom1->ViewCustomAttributes = "";

			// custom2
			$this->custom2->ViewValue = $this->custom2->CurrentValue;
			$this->custom2->ViewCustomAttributes = "";

			// custom3
			$this->custom3->ViewValue = $this->custom3->CurrentValue;
			$this->custom3->ViewCustomAttributes = "";

			// custom4
			$this->custom4->ViewValue = $this->custom4->CurrentValue;
			$this->custom4->ViewCustomAttributes = "";

			// custom5
			$this->custom5->ViewValue = $this->custom5->CurrentValue;
			$this->custom5->ViewCustomAttributes = "";

			// custom6
			$this->custom6->ViewValue = $this->custom6->CurrentValue;
			$this->custom6->ViewCustomAttributes = "";

			// custom7
			$this->custom7->ViewValue = $this->custom7->CurrentValue;
			$this->custom7->ViewCustomAttributes = "";

			// custom8
			$this->custom8->ViewValue = $this->custom8->CurrentValue;
			$this->custom8->ViewCustomAttributes = "";

			// custom9
			$this->custom9->ViewValue = $this->custom9->CurrentValue;
			$this->custom9->ViewCustomAttributes = "";

			// custom10
			$this->custom10->ViewValue = $this->custom10->CurrentValue;
			$this->custom10->ViewCustomAttributes = "";

			// termination_date
			$this->termination_date->ViewValue = $this->termination_date->CurrentValue;
			$this->termination_date->ViewValue = FormatDateTime($this->termination_date->ViewValue, 0);
			$this->termination_date->ViewCustomAttributes = "";

			// ethnicity
			$this->ethnicity->ViewValue = $this->ethnicity->CurrentValue;
			$this->ethnicity->ViewValue = FormatNumber($this->ethnicity->ViewValue, 0, -2, -2, -2);
			$this->ethnicity->ViewCustomAttributes = "";

			// immigration_status
			$this->immigration_status->ViewValue = $this->immigration_status->CurrentValue;
			$this->immigration_status->ViewValue = FormatNumber($this->immigration_status->ViewValue, 0, -2, -2, -2);
			$this->immigration_status->ViewCustomAttributes = "";

			// approver1
			$curVal = strval($this->approver1->CurrentValue);
			if ($curVal <> "") {
				$this->approver1->ViewValue = $this->approver1->lookupCacheOption($curVal);
				if ($this->approver1->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
					$sqlWrk = $this->approver1->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = $rswrk->fields('df');
						$this->approver1->ViewValue = $this->approver1->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->approver1->ViewValue = $this->approver1->CurrentValue;
					}
				}
			} else {
				$this->approver1->ViewValue = NULL;
			}
			$this->approver1->ViewCustomAttributes = "";

			// approver2
			$curVal = strval($this->approver2->CurrentValue);
			if ($curVal <> "") {
				$this->approver2->ViewValue = $this->approver2->lookupCacheOption($curVal);
				if ($this->approver2->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
					$sqlWrk = $this->approver2->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = $rswrk->fields('df');
						$this->approver2->ViewValue = $this->approver2->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->approver2->ViewValue = $this->approver2->CurrentValue;
					}
				}
			} else {
				$this->approver2->ViewValue = NULL;
			}
			$this->approver2->ViewCustomAttributes = "";

			// approver3
			$curVal = strval($this->approver3->CurrentValue);
			if ($curVal <> "") {
				$this->approver3->ViewValue = $this->approver3->lookupCacheOption($curVal);
				if ($this->approver3->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
					$sqlWrk = $this->approver3->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = $rswrk->fields('df');
						$this->approver3->ViewValue = $this->approver3->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->approver3->ViewValue = $this->approver3->CurrentValue;
					}
				}
			} else {
				$this->approver3->ViewValue = NULL;
			}
			$this->approver3->ViewCustomAttributes = "";

			// status
			$curVal = strval($this->status->CurrentValue);
			if ($curVal <> "") {
				$this->status->ViewValue = $this->status->lookupCacheOption($curVal);
				if ($this->status->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
					$sqlWrk = $this->status->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
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

			// HospID
			$this->HospID->ViewValue = $this->HospID->CurrentValue;
			$this->HospID->ViewValue = FormatNumber($this->HospID->ViewValue, 0, -2, -2, -2);
			$this->HospID->ViewCustomAttributes = "";

			// id
			$this->id->LinkCustomAttributes = "";
			$this->id->HrefValue = "";
			$this->id->TooltipValue = "";

			// employee_id
			$this->employee_id->LinkCustomAttributes = "";
			$this->employee_id->HrefValue = "";
			$this->employee_id->TooltipValue = "";

			// first_name
			$this->first_name->LinkCustomAttributes = "";
			$this->first_name->HrefValue = "";
			$this->first_name->TooltipValue = "";

			// middle_name
			$this->middle_name->LinkCustomAttributes = "";
			$this->middle_name->HrefValue = "";
			$this->middle_name->TooltipValue = "";

			// last_name
			$this->last_name->LinkCustomAttributes = "";
			$this->last_name->HrefValue = "";
			$this->last_name->TooltipValue = "";

			// gender
			$this->gender->LinkCustomAttributes = "";
			$this->gender->HrefValue = "";
			$this->gender->TooltipValue = "";

			// nationality
			$this->nationality->LinkCustomAttributes = "";
			$this->nationality->HrefValue = "";
			$this->nationality->TooltipValue = "";

			// birthday
			$this->birthday->LinkCustomAttributes = "";
			$this->birthday->HrefValue = "";
			$this->birthday->TooltipValue = "";

			// marital_status
			$this->marital_status->LinkCustomAttributes = "";
			$this->marital_status->HrefValue = "";
			$this->marital_status->TooltipValue = "";

			// ssn_num
			$this->ssn_num->LinkCustomAttributes = "";
			$this->ssn_num->HrefValue = "";
			$this->ssn_num->TooltipValue = "";

			// nic_num
			$this->nic_num->LinkCustomAttributes = "";
			$this->nic_num->HrefValue = "";
			$this->nic_num->TooltipValue = "";

			// other_id
			$this->other_id->LinkCustomAttributes = "";
			$this->other_id->HrefValue = "";
			$this->other_id->TooltipValue = "";

			// driving_license
			$this->driving_license->LinkCustomAttributes = "";
			$this->driving_license->HrefValue = "";
			$this->driving_license->TooltipValue = "";

			// driving_license_exp_date
			$this->driving_license_exp_date->LinkCustomAttributes = "";
			$this->driving_license_exp_date->HrefValue = "";
			$this->driving_license_exp_date->TooltipValue = "";

			// employment_status
			$this->employment_status->LinkCustomAttributes = "";
			$this->employment_status->HrefValue = "";
			$this->employment_status->TooltipValue = "";

			// job_title
			$this->job_title->LinkCustomAttributes = "";
			$this->job_title->HrefValue = "";
			$this->job_title->TooltipValue = "";

			// pay_grade
			$this->pay_grade->LinkCustomAttributes = "";
			$this->pay_grade->HrefValue = "";
			$this->pay_grade->TooltipValue = "";

			// work_station_id
			$this->work_station_id->LinkCustomAttributes = "";
			$this->work_station_id->HrefValue = "";
			$this->work_station_id->TooltipValue = "";

			// address1
			$this->address1->LinkCustomAttributes = "";
			$this->address1->HrefValue = "";
			$this->address1->TooltipValue = "";

			// address2
			$this->address2->LinkCustomAttributes = "";
			$this->address2->HrefValue = "";
			$this->address2->TooltipValue = "";

			// city
			$this->city->LinkCustomAttributes = "";
			$this->city->HrefValue = "";
			$this->city->TooltipValue = "";

			// country
			$this->country->LinkCustomAttributes = "";
			$this->country->HrefValue = "";
			$this->country->TooltipValue = "";

			// province
			$this->province->LinkCustomAttributes = "";
			$this->province->HrefValue = "";
			$this->province->TooltipValue = "";

			// postal_code
			$this->postal_code->LinkCustomAttributes = "";
			$this->postal_code->HrefValue = "";
			$this->postal_code->TooltipValue = "";

			// home_phone
			$this->home_phone->LinkCustomAttributes = "";
			$this->home_phone->HrefValue = "";
			$this->home_phone->TooltipValue = "";

			// mobile_phone
			$this->mobile_phone->LinkCustomAttributes = "";
			$this->mobile_phone->HrefValue = "";
			$this->mobile_phone->TooltipValue = "";

			// work_phone
			$this->work_phone->LinkCustomAttributes = "";
			$this->work_phone->HrefValue = "";
			$this->work_phone->TooltipValue = "";

			// work_email
			$this->work_email->LinkCustomAttributes = "";
			$this->work_email->HrefValue = "";
			$this->work_email->TooltipValue = "";

			// private_email
			$this->private_email->LinkCustomAttributes = "";
			$this->private_email->HrefValue = "";
			$this->private_email->TooltipValue = "";

			// joined_date
			$this->joined_date->LinkCustomAttributes = "";
			$this->joined_date->HrefValue = "";
			$this->joined_date->TooltipValue = "";

			// confirmation_date
			$this->confirmation_date->LinkCustomAttributes = "";
			$this->confirmation_date->HrefValue = "";
			$this->confirmation_date->TooltipValue = "";

			// supervisor
			$this->supervisor->LinkCustomAttributes = "";
			$this->supervisor->HrefValue = "";
			$this->supervisor->TooltipValue = "";

			// indirect_supervisors
			$this->indirect_supervisors->LinkCustomAttributes = "";
			$this->indirect_supervisors->HrefValue = "";
			$this->indirect_supervisors->TooltipValue = "";

			// department
			$this->department->LinkCustomAttributes = "";
			$this->department->HrefValue = "";
			$this->department->TooltipValue = "";

			// custom1
			$this->custom1->LinkCustomAttributes = "";
			$this->custom1->HrefValue = "";
			$this->custom1->TooltipValue = "";

			// custom2
			$this->custom2->LinkCustomAttributes = "";
			$this->custom2->HrefValue = "";
			$this->custom2->TooltipValue = "";

			// custom3
			$this->custom3->LinkCustomAttributes = "";
			$this->custom3->HrefValue = "";
			$this->custom3->TooltipValue = "";

			// custom4
			$this->custom4->LinkCustomAttributes = "";
			$this->custom4->HrefValue = "";
			$this->custom4->TooltipValue = "";

			// custom5
			$this->custom5->LinkCustomAttributes = "";
			$this->custom5->HrefValue = "";
			$this->custom5->TooltipValue = "";

			// custom6
			$this->custom6->LinkCustomAttributes = "";
			$this->custom6->HrefValue = "";
			$this->custom6->TooltipValue = "";

			// custom7
			$this->custom7->LinkCustomAttributes = "";
			$this->custom7->HrefValue = "";
			$this->custom7->TooltipValue = "";

			// custom8
			$this->custom8->LinkCustomAttributes = "";
			$this->custom8->HrefValue = "";
			$this->custom8->TooltipValue = "";

			// custom9
			$this->custom9->LinkCustomAttributes = "";
			$this->custom9->HrefValue = "";
			$this->custom9->TooltipValue = "";

			// custom10
			$this->custom10->LinkCustomAttributes = "";
			$this->custom10->HrefValue = "";
			$this->custom10->TooltipValue = "";

			// termination_date
			$this->termination_date->LinkCustomAttributes = "";
			$this->termination_date->HrefValue = "";
			$this->termination_date->TooltipValue = "";

			// ethnicity
			$this->ethnicity->LinkCustomAttributes = "";
			$this->ethnicity->HrefValue = "";
			$this->ethnicity->TooltipValue = "";

			// immigration_status
			$this->immigration_status->LinkCustomAttributes = "";
			$this->immigration_status->HrefValue = "";
			$this->immigration_status->TooltipValue = "";

			// approver1
			$this->approver1->LinkCustomAttributes = "";
			$this->approver1->HrefValue = "";
			$this->approver1->TooltipValue = "";

			// approver2
			$this->approver2->LinkCustomAttributes = "";
			$this->approver2->HrefValue = "";
			$this->approver2->TooltipValue = "";

			// approver3
			$this->approver3->LinkCustomAttributes = "";
			$this->approver3->HrefValue = "";
			$this->approver3->TooltipValue = "";

			// status
			$this->status->LinkCustomAttributes = "";
			$this->status->HrefValue = "";
			$this->status->TooltipValue = "";

			// HospID
			$this->HospID->LinkCustomAttributes = "";
			$this->HospID->HrefValue = "";
			$this->HospID->TooltipValue = "";
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
		$Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("employeelist.php"), "", $this->TableVar, TRUE);
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
						case "x_gender":
							break;
						case "x_nationality":
							break;
						case "x_approver1":
							break;
						case "x_approver2":
							break;
						case "x_approver3":
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
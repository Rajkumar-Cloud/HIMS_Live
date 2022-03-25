<?php
namespace PHPMaker2019\HIMS;

/**
 * Page class
 */
class _appointment_scheduler_delete extends _appointment_scheduler
{

	// Page ID
	public $PageID = "delete";

	// Project ID
	public $ProjectID = "{EA4F6D13-AF8F-428D-9EA7-BA88D1107EC3}";

	// Table name
	public $TableName = 'appointment_scheduler';

	// Page object name
	public $PageObjName = "_appointment_scheduler_delete";

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

		// Table object (_appointment_scheduler)
		if (!isset($GLOBALS["_appointment_scheduler"]) || get_class($GLOBALS["_appointment_scheduler"]) == PROJECT_NAMESPACE . "_appointment_scheduler") {
			$GLOBALS["_appointment_scheduler"] = &$this;
			$GLOBALS["Table"] = &$GLOBALS["_appointment_scheduler"];
		}
		$this->CancelUrl = $this->pageUrl() . "action=cancel";

		// Table object (user_login)
		if (!isset($GLOBALS['user_login']))
			$GLOBALS['user_login'] = new user_login();

		// Table object (doctors)
		if (!isset($GLOBALS['doctors']))
			$GLOBALS['doctors'] = new doctors();

		// Page ID
		if (!defined(PROJECT_NAMESPACE . "PAGE_ID"))
			define(PROJECT_NAMESPACE . "PAGE_ID", 'delete');

		// Table name (for backward compatibility)
		if (!defined(PROJECT_NAMESPACE . "TABLE_NAME"))
			define(PROJECT_NAMESPACE . "TABLE_NAME", 'appointment_scheduler');

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
		global $OldSkipHeaderFooter, $SkipHeaderFooter;
		$SkipHeaderFooter = $OldSkipHeaderFooter;

		// Page Unload event
		$this->Page_Unload();

		// Global Page Unloaded event (in userfn*.php)
		Page_Unloaded();

		// Export
		global $EXPORT, $_appointment_scheduler;
		if ($this->CustomExport && $this->CustomExport == $this->Export && array_key_exists($this->CustomExport, $EXPORT)) {
				$content = ob_get_contents();
			if ($ExportFileName == "")
				$ExportFileName = $this->TableVar;
			$class = PROJECT_NAMESPACE . $EXPORT[$this->CustomExport];
			if (class_exists($class)) {
				$doc = new $class($_appointment_scheduler);
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
					$this->terminate(GetUrl("_appointment_schedulerlist.php"));
				else
					$this->terminate(GetUrl("login.php"));
				return;
			}
		}
		$this->CurrentAction = Param("action"); // Set up current action
		global $OldSkipHeaderFooter, $SkipHeaderFooter;
		$OldSkipHeaderFooter = $SkipHeaderFooter;
		$SkipHeaderFooter = TRUE;
		$this->id->setVisibility();
		$this->start_date->setVisibility();
		$this->end_date->setVisibility();
		$this->patientID->setVisibility();
		$this->patientName->setVisibility();
		$this->DoctorID->setVisibility();
		$this->DoctorName->setVisibility();
		$this->AppointmentStatus->setVisibility();
		$this->status->setVisibility();
		$this->DoctorCode->setVisibility();
		$this->Department->setVisibility();
		$this->scheduler_id->setVisibility();
		$this->text->setVisibility();
		$this->appointment_status->setVisibility();
		$this->PId->setVisibility();
		$this->MobileNumber->setVisibility();
		$this->SchEmail->setVisibility();
		$this->appointment_type->setVisibility();
		$this->Notified->setVisibility();
		$this->Purpose->setVisibility();
		$this->Notes->setVisibility();
		$this->PatientType->setVisibility();
		$this->Referal->setVisibility();
		$this->paymentType->setVisibility();
		$this->tittle->Visible = FALSE;
		$this->gendar->Visible = FALSE;
		$this->Dob->Visible = FALSE;
		$this->Age->Visible = FALSE;
		$this->WhereDidYouHear->setVisibility();
		$this->HospID->setVisibility();
		$this->createdBy->setVisibility();
		$this->createdDateTime->setVisibility();
		$this->PatientTypee->setVisibility();
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
		$this->setupLookupOptions($this->patientID);
		$this->setupLookupOptions($this->DoctorName);
		$this->setupLookupOptions($this->Referal);
		$this->setupLookupOptions($this->tittle);
		$this->setupLookupOptions($this->gendar);
		$this->setupLookupOptions($this->WhereDidYouHear);
		$this->setupLookupOptions($this->PatientTypee);

		// Set up master/detail parameters
		$this->setupMasterParms();

		// Set up Breadcrumb
		$this->setupBreadcrumb();

		// Load key parameters
		$this->RecKeys = $this->getRecordKeys(); // Load record keys
		$filter = $this->getFilterFromRecordKeys();
		if ($filter == "") {
			$this->terminate("_appointment_schedulerlist.php"); // Prevent SQL injection, return to list
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
				$this->terminate("_appointment_schedulerlist.php"); // Return to list
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
				$rs = $conn->selectLimit($sql, $rowcnt, $offset, ["_hasOrderBy" => trim($this->getOrderBy()) || trim($this->getSessionOrderByList())]);
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
		$this->start_date->setDbValue($row['start_date']);
		$this->end_date->setDbValue($row['end_date']);
		$this->patientID->setDbValue($row['patientID']);
		if (array_key_exists('EV__patientID', $rs->fields)) {
			$this->patientID->VirtualValue = $rs->fields('EV__patientID'); // Set up virtual field value
		} else {
			$this->patientID->VirtualValue = ""; // Clear value
		}
		$this->patientName->setDbValue($row['patientName']);
		$this->DoctorID->setDbValue($row['DoctorID']);
		$this->DoctorName->setDbValue($row['DoctorName']);
		$this->AppointmentStatus->setDbValue($row['AppointmentStatus']);
		$this->status->setDbValue($row['status']);
		$this->DoctorCode->setDbValue($row['DoctorCode']);
		$this->Department->setDbValue($row['Department']);
		$this->scheduler_id->setDbValue($row['scheduler_id']);
		$this->text->setDbValue($row['text']);
		$this->appointment_status->setDbValue($row['appointment_status']);
		$this->PId->setDbValue($row['PId']);
		$this->MobileNumber->setDbValue($row['MobileNumber']);
		$this->SchEmail->setDbValue($row['SchEmail']);
		$this->appointment_type->setDbValue($row['appointment_type']);
		$this->Notified->setDbValue($row['Notified']);
		$this->Purpose->setDbValue($row['Purpose']);
		$this->Notes->setDbValue($row['Notes']);
		$this->PatientType->setDbValue($row['PatientType']);
		$this->Referal->setDbValue($row['Referal']);
		if (array_key_exists('EV__Referal', $rs->fields)) {
			$this->Referal->VirtualValue = $rs->fields('EV__Referal'); // Set up virtual field value
		} else {
			$this->Referal->VirtualValue = ""; // Clear value
		}
		$this->paymentType->setDbValue($row['paymentType']);
		$this->tittle->setDbValue($row['tittle']);
		$this->gendar->setDbValue($row['gendar']);
		$this->Dob->setDbValue($row['Dob']);
		$this->Age->setDbValue($row['Age']);
		$this->WhereDidYouHear->setDbValue($row['WhereDidYouHear']);
		$this->HospID->setDbValue($row['HospID']);
		$this->createdBy->setDbValue($row['createdBy']);
		$this->createdDateTime->setDbValue($row['createdDateTime']);
		$this->PatientTypee->setDbValue($row['PatientTypee']);
	}

	// Return a row with default values
	protected function newRow()
	{
		$row = [];
		$row['id'] = NULL;
		$row['start_date'] = NULL;
		$row['end_date'] = NULL;
		$row['patientID'] = NULL;
		$row['patientName'] = NULL;
		$row['DoctorID'] = NULL;
		$row['DoctorName'] = NULL;
		$row['AppointmentStatus'] = NULL;
		$row['status'] = NULL;
		$row['DoctorCode'] = NULL;
		$row['Department'] = NULL;
		$row['scheduler_id'] = NULL;
		$row['text'] = NULL;
		$row['appointment_status'] = NULL;
		$row['PId'] = NULL;
		$row['MobileNumber'] = NULL;
		$row['SchEmail'] = NULL;
		$row['appointment_type'] = NULL;
		$row['Notified'] = NULL;
		$row['Purpose'] = NULL;
		$row['Notes'] = NULL;
		$row['PatientType'] = NULL;
		$row['Referal'] = NULL;
		$row['paymentType'] = NULL;
		$row['tittle'] = NULL;
		$row['gendar'] = NULL;
		$row['Dob'] = NULL;
		$row['Age'] = NULL;
		$row['WhereDidYouHear'] = NULL;
		$row['HospID'] = NULL;
		$row['createdBy'] = NULL;
		$row['createdDateTime'] = NULL;
		$row['PatientTypee'] = NULL;
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
		// start_date
		// end_date
		// patientID
		// patientName
		// DoctorID
		// DoctorName
		// AppointmentStatus
		// status
		// DoctorCode
		// Department
		// scheduler_id
		// text
		// appointment_status
		// PId
		// MobileNumber
		// SchEmail
		// appointment_type
		// Notified
		// Purpose
		// Notes
		// PatientType
		// Referal
		// paymentType
		// tittle
		// gendar
		// Dob
		// Age
		// WhereDidYouHear
		// HospID
		// createdBy
		// createdDateTime
		// PatientTypee

		if ($this->RowType == ROWTYPE_VIEW) { // View row

			// id
			$this->id->ViewValue = $this->id->CurrentValue;
			$this->id->ViewCustomAttributes = "";

			// start_date
			$this->start_date->ViewValue = $this->start_date->CurrentValue;
			$this->start_date->ViewValue = FormatDateTime($this->start_date->ViewValue, 11);
			$this->start_date->ViewCustomAttributes = "";

			// end_date
			$this->end_date->ViewValue = $this->end_date->CurrentValue;
			$this->end_date->ViewValue = FormatDateTime($this->end_date->ViewValue, 11);
			$this->end_date->ViewCustomAttributes = "";

			// patientID
			if ($this->patientID->VirtualValue <> "") {
				$this->patientID->ViewValue = $this->patientID->VirtualValue;
			} else {
			$curVal = strval($this->patientID->CurrentValue);
			if ($curVal <> "") {
				$this->patientID->ViewValue = $this->patientID->lookupCacheOption($curVal);
				if ($this->patientID->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`PatientID`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->patientID->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = $rswrk->fields('df');
						$arwrk[2] = $rswrk->fields('df2');
						$arwrk[3] = $rswrk->fields('df3');
						$arwrk[4] = $rswrk->fields('df4');
						$this->patientID->ViewValue = $this->patientID->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->patientID->ViewValue = $this->patientID->CurrentValue;
					}
				}
			} else {
				$this->patientID->ViewValue = NULL;
			}
			}
			$this->patientID->ViewCustomAttributes = "";

			// patientName
			$this->patientName->ViewValue = $this->patientName->CurrentValue;
			$this->patientName->ViewCustomAttributes = "";

			// DoctorID
			$this->DoctorID->ViewValue = $this->DoctorID->CurrentValue;
			$this->DoctorID->ViewCustomAttributes = "";

			// DoctorName
			$curVal = strval($this->DoctorName->CurrentValue);
			if ($curVal <> "") {
				$this->DoctorName->ViewValue = $this->DoctorName->lookupCacheOption($curVal);
				if ($this->DoctorName->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`NAME`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->DoctorName->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = $rswrk->fields('df');
						$this->DoctorName->ViewValue = $this->DoctorName->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->DoctorName->ViewValue = $this->DoctorName->CurrentValue;
					}
				}
			} else {
				$this->DoctorName->ViewValue = NULL;
			}
			$this->DoctorName->ViewCustomAttributes = "";

			// AppointmentStatus
			$this->AppointmentStatus->ViewValue = $this->AppointmentStatus->CurrentValue;
			$this->AppointmentStatus->ViewCustomAttributes = "";

			// status
			if (strval($this->status->CurrentValue) <> "") {
				$this->status->ViewValue = new OptionValues();
				$arwrk = explode(",", strval($this->status->CurrentValue));
				$cnt = count($arwrk);
				for ($ari = 0; $ari < $cnt; $ari++)
					$this->status->ViewValue->add($this->status->optionCaption(trim($arwrk[$ari])));
			} else {
				$this->status->ViewValue = NULL;
			}
			$this->status->ViewCustomAttributes = "";

			// DoctorCode
			$this->DoctorCode->ViewValue = $this->DoctorCode->CurrentValue;
			$this->DoctorCode->ViewCustomAttributes = "";

			// Department
			$this->Department->ViewValue = $this->Department->CurrentValue;
			$this->Department->ViewCustomAttributes = "";

			// scheduler_id
			$this->scheduler_id->ViewValue = $this->scheduler_id->CurrentValue;
			$this->scheduler_id->ViewCustomAttributes = "";

			// text
			$this->text->ViewValue = $this->text->CurrentValue;
			$this->text->ViewCustomAttributes = "";

			// appointment_status
			$this->appointment_status->ViewValue = $this->appointment_status->CurrentValue;
			$this->appointment_status->ViewCustomAttributes = "";

			// PId
			$this->PId->ViewValue = $this->PId->CurrentValue;
			$this->PId->ViewValue = FormatNumber($this->PId->ViewValue, 0, -2, -2, -2);
			$this->PId->ViewCustomAttributes = "";

			// MobileNumber
			$this->MobileNumber->ViewValue = $this->MobileNumber->CurrentValue;
			$this->MobileNumber->ViewCustomAttributes = "";

			// SchEmail
			$this->SchEmail->ViewValue = $this->SchEmail->CurrentValue;
			$this->SchEmail->ViewCustomAttributes = "";

			// appointment_type
			if (strval($this->appointment_type->CurrentValue) <> "") {
				$this->appointment_type->ViewValue = $this->appointment_type->optionCaption($this->appointment_type->CurrentValue);
			} else {
				$this->appointment_type->ViewValue = NULL;
			}
			$this->appointment_type->ViewCustomAttributes = "";

			// Notified
			if (strval($this->Notified->CurrentValue) <> "") {
				$this->Notified->ViewValue = new OptionValues();
				$arwrk = explode(",", strval($this->Notified->CurrentValue));
				$cnt = count($arwrk);
				for ($ari = 0; $ari < $cnt; $ari++)
					$this->Notified->ViewValue->add($this->Notified->optionCaption(trim($arwrk[$ari])));
			} else {
				$this->Notified->ViewValue = NULL;
			}
			$this->Notified->ViewCustomAttributes = "";

			// Purpose
			$this->Purpose->ViewValue = $this->Purpose->CurrentValue;
			$this->Purpose->ViewCustomAttributes = "";

			// Notes
			$this->Notes->ViewValue = $this->Notes->CurrentValue;
			$this->Notes->ViewCustomAttributes = "";

			// PatientType
			if (strval($this->PatientType->CurrentValue) <> "") {
				$this->PatientType->ViewValue = $this->PatientType->optionCaption($this->PatientType->CurrentValue);
			} else {
				$this->PatientType->ViewValue = NULL;
			}
			$this->PatientType->ViewCustomAttributes = "";

			// Referal
			if ($this->Referal->VirtualValue <> "") {
				$this->Referal->ViewValue = $this->Referal->VirtualValue;
			} else {
			$curVal = strval($this->Referal->CurrentValue);
			if ($curVal <> "") {
				$this->Referal->ViewValue = $this->Referal->lookupCacheOption($curVal);
				if ($this->Referal->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`reference`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->Referal->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = $rswrk->fields('df');
						$this->Referal->ViewValue = $this->Referal->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->Referal->ViewValue = $this->Referal->CurrentValue;
					}
				}
			} else {
				$this->Referal->ViewValue = NULL;
			}
			}
			$this->Referal->ViewCustomAttributes = "";

			// paymentType
			$this->paymentType->ViewValue = $this->paymentType->CurrentValue;
			$this->paymentType->ViewCustomAttributes = "";

			// WhereDidYouHear
			$curVal = strval($this->WhereDidYouHear->CurrentValue);
			if ($curVal <> "") {
				$this->WhereDidYouHear->ViewValue = $this->WhereDidYouHear->lookupCacheOption($curVal);
				if ($this->WhereDidYouHear->ViewValue === NULL) { // Lookup from database
					$arwrk = explode(",", $curVal);
					$filterWrk = "";
					foreach ($arwrk as $wrk) {
						if ($filterWrk <> "")
							$filterWrk .= " OR ";
						$filterWrk .= "`Job`" . SearchString("=", trim($wrk), DATATYPE_STRING, "");
					}
					$sqlWrk = $this->WhereDidYouHear->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$this->WhereDidYouHear->ViewValue = new OptionValues();
						$ari = 0;
						while (!$rswrk->EOF) {
							$arwrk = array();
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
			$this->HospID->ViewValue = $this->HospID->CurrentValue;
			$this->HospID->ViewValue = FormatNumber($this->HospID->ViewValue, 0, -2, -2, -2);
			$this->HospID->ViewCustomAttributes = "";

			// createdBy
			$this->createdBy->ViewValue = $this->createdBy->CurrentValue;
			$this->createdBy->ViewCustomAttributes = "";

			// createdDateTime
			$this->createdDateTime->ViewValue = $this->createdDateTime->CurrentValue;
			$this->createdDateTime->ViewValue = FormatDateTime($this->createdDateTime->ViewValue, 0);
			$this->createdDateTime->ViewCustomAttributes = "";

			// PatientTypee
			$curVal = strval($this->PatientTypee->CurrentValue);
			if ($curVal <> "") {
				$this->PatientTypee->ViewValue = $this->PatientTypee->lookupCacheOption($curVal);
				if ($this->PatientTypee->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->PatientTypee->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = $rswrk->fields('df');
						$this->PatientTypee->ViewValue = $this->PatientTypee->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->PatientTypee->ViewValue = $this->PatientTypee->CurrentValue;
					}
				}
			} else {
				$this->PatientTypee->ViewValue = NULL;
			}
			$this->PatientTypee->ViewCustomAttributes = "";

			// id
			$this->id->LinkCustomAttributes = "";
			$this->id->HrefValue = "";
			$this->id->TooltipValue = "";

			// start_date
			$this->start_date->LinkCustomAttributes = "";
			$this->start_date->HrefValue = "";
			$this->start_date->TooltipValue = "";

			// end_date
			$this->end_date->LinkCustomAttributes = "";
			$this->end_date->HrefValue = "";
			$this->end_date->TooltipValue = "";

			// patientID
			$this->patientID->LinkCustomAttributes = "";
			$this->patientID->HrefValue = "";
			$this->patientID->TooltipValue = "";

			// patientName
			$this->patientName->LinkCustomAttributes = "";
			$this->patientName->HrefValue = "";
			$this->patientName->TooltipValue = "";

			// DoctorID
			$this->DoctorID->LinkCustomAttributes = "";
			$this->DoctorID->HrefValue = "";
			$this->DoctorID->TooltipValue = "";

			// DoctorName
			$this->DoctorName->LinkCustomAttributes = "";
			$this->DoctorName->HrefValue = "";
			$this->DoctorName->TooltipValue = "";

			// AppointmentStatus
			$this->AppointmentStatus->LinkCustomAttributes = "";
			$this->AppointmentStatus->HrefValue = "";
			$this->AppointmentStatus->TooltipValue = "";

			// status
			$this->status->LinkCustomAttributes = "";
			$this->status->HrefValue = "";
			$this->status->TooltipValue = "";

			// DoctorCode
			$this->DoctorCode->LinkCustomAttributes = "";
			$this->DoctorCode->HrefValue = "";
			$this->DoctorCode->TooltipValue = "";

			// Department
			$this->Department->LinkCustomAttributes = "";
			$this->Department->HrefValue = "";
			$this->Department->TooltipValue = "";

			// scheduler_id
			$this->scheduler_id->LinkCustomAttributes = "";
			$this->scheduler_id->HrefValue = "";
			$this->scheduler_id->TooltipValue = "";

			// text
			$this->text->LinkCustomAttributes = "";
			$this->text->HrefValue = "";
			$this->text->TooltipValue = "";

			// appointment_status
			$this->appointment_status->LinkCustomAttributes = "";
			$this->appointment_status->HrefValue = "";
			$this->appointment_status->TooltipValue = "";

			// PId
			$this->PId->LinkCustomAttributes = "";
			$this->PId->HrefValue = "";
			$this->PId->TooltipValue = "";

			// MobileNumber
			$this->MobileNumber->LinkCustomAttributes = "";
			$this->MobileNumber->HrefValue = "";
			$this->MobileNumber->TooltipValue = "";

			// SchEmail
			$this->SchEmail->LinkCustomAttributes = "";
			$this->SchEmail->HrefValue = "";
			$this->SchEmail->TooltipValue = "";

			// appointment_type
			$this->appointment_type->LinkCustomAttributes = "";
			$this->appointment_type->HrefValue = "";
			$this->appointment_type->TooltipValue = "";

			// Notified
			$this->Notified->LinkCustomAttributes = "";
			$this->Notified->HrefValue = "";
			$this->Notified->TooltipValue = "";

			// Purpose
			$this->Purpose->LinkCustomAttributes = "";
			$this->Purpose->HrefValue = "";
			$this->Purpose->TooltipValue = "";

			// Notes
			$this->Notes->LinkCustomAttributes = "";
			$this->Notes->HrefValue = "";
			$this->Notes->TooltipValue = "";

			// PatientType
			$this->PatientType->LinkCustomAttributes = "";
			$this->PatientType->HrefValue = "";
			$this->PatientType->TooltipValue = "";

			// Referal
			$this->Referal->LinkCustomAttributes = "";
			$this->Referal->HrefValue = "";
			$this->Referal->TooltipValue = "";

			// paymentType
			$this->paymentType->LinkCustomAttributes = "";
			$this->paymentType->HrefValue = "";
			$this->paymentType->TooltipValue = "";

			// WhereDidYouHear
			$this->WhereDidYouHear->LinkCustomAttributes = "";
			$this->WhereDidYouHear->HrefValue = "";
			$this->WhereDidYouHear->TooltipValue = "";

			// HospID
			$this->HospID->LinkCustomAttributes = "";
			$this->HospID->HrefValue = "";
			$this->HospID->TooltipValue = "";

			// createdBy
			$this->createdBy->LinkCustomAttributes = "";
			$this->createdBy->HrefValue = "";
			$this->createdBy->TooltipValue = "";

			// createdDateTime
			$this->createdDateTime->LinkCustomAttributes = "";
			$this->createdDateTime->HrefValue = "";
			$this->createdDateTime->TooltipValue = "";

			// PatientTypee
			$this->PatientTypee->LinkCustomAttributes = "";
			$this->PatientTypee->HrefValue = "";
			$this->PatientTypee->TooltipValue = "";
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

	// Set up master/detail based on QueryString
	protected function setupMasterParms()
	{
		$validMaster = FALSE;

		// Get the keys for master table
		if (Get(TABLE_SHOW_MASTER) !== NULL) {
			$masterTblVar = Get(TABLE_SHOW_MASTER);
			if ($masterTblVar == "") {
				$validMaster = TRUE;
				$this->DbMasterFilter = "";
				$this->DbDetailFilter = "";
			}
			if ($masterTblVar == "doctors") {
				$validMaster = TRUE;
				if (Get("fk_id") !== NULL) {
					$this->DoctorID->setQueryStringValue(Get("fk_id"));
					$this->DoctorID->setSessionValue($this->DoctorID->QueryStringValue);
					if (!is_numeric($this->DoctorID->QueryStringValue))
						$validMaster = FALSE;
				} else {
					$validMaster = FALSE;
				}
			}
		} elseif (Post(TABLE_SHOW_MASTER) !== NULL) {
			$masterTblVar = Post(TABLE_SHOW_MASTER);
			if ($masterTblVar == "") {
				$validMaster = TRUE;
				$this->DbMasterFilter = "";
				$this->DbDetailFilter = "";
			}
			if ($masterTblVar == "doctors") {
				$validMaster = TRUE;
				if (Post("fk_id") !== NULL) {
					$this->DoctorID->setFormValue(Post("fk_id"));
					$this->DoctorID->setSessionValue($this->DoctorID->FormValue);
					if (!is_numeric($this->DoctorID->FormValue))
						$validMaster = FALSE;
				} else {
					$validMaster = FALSE;
				}
			}
		}
		if ($validMaster) {

			// Save current master table
			$this->setCurrentMasterTable($masterTblVar);

			// Reset start record counter (new master key)
			if (!$this->isAddOrEdit()) {
				$this->StartRec = 1;
				$this->setStartRecordNumber($this->StartRec);
			}

			// Clear previous master key from Session
			if ($masterTblVar <> "doctors") {
				if ($this->DoctorID->CurrentValue == "")
					$this->DoctorID->setSessionValue("");
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
		$Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("_appointment_schedulerlist.php"), "", $this->TableVar, TRUE);
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
						case "x_patientID":
							break;
						case "x_DoctorName":
							break;
						case "x_Referal":
							break;
						case "x_tittle":
							break;
						case "x_gendar":
							break;
						case "x_WhereDidYouHear":
							break;
						case "x_PatientTypee":
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
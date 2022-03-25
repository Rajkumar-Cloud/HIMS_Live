<?php
namespace PHPMaker2019\HIMS;

/**
 * Page class
 */
class ivf_delete extends ivf
{

	// Page ID
	public $PageID = "delete";

	// Project ID
	public $ProjectID = "{EA4F6D13-AF8F-428D-9EA7-BA88D1107EC3}";

	// Table name
	public $TableName = 'ivf';

	// Page object name
	public $PageObjName = "ivf_delete";

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

		// Table object (ivf)
		if (!isset($GLOBALS["ivf"]) || get_class($GLOBALS["ivf"]) == PROJECT_NAMESPACE . "ivf") {
			$GLOBALS["ivf"] = &$this;
			$GLOBALS["Table"] = &$GLOBALS["ivf"];
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
			define(PROJECT_NAMESPACE . "TABLE_NAME", 'ivf');

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
		global $EXPORT, $ivf;
		if ($this->CustomExport && $this->CustomExport == $this->Export && array_key_exists($this->CustomExport, $EXPORT)) {
				$content = ob_get_contents();
			if ($ExportFileName == "")
				$ExportFileName = $this->TableVar;
			$class = PROJECT_NAMESPACE . $EXPORT[$this->CustomExport];
			if (class_exists($class)) {
				$doc = new $class($ivf);
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
					$this->terminate(GetUrl("ivflist.php"));
				else
					$this->terminate(GetUrl("login.php"));
				return;
			}
		}
		$this->CurrentAction = Param("action"); // Set up current action
		$this->id->setVisibility();
		$this->Male->setVisibility();
		$this->Female->setVisibility();
		$this->status->setVisibility();
		$this->createdby->Visible = FALSE;
		$this->createddatetime->Visible = FALSE;
		$this->modifiedby->Visible = FALSE;
		$this->modifieddatetime->Visible = FALSE;
		$this->malepropic->setVisibility();
		$this->femalepropic->setVisibility();
		$this->HusbandEducation->setVisibility();
		$this->WifeEducation->setVisibility();
		$this->HusbandWorkHours->setVisibility();
		$this->WifeWorkHours->setVisibility();
		$this->PatientLanguage->setVisibility();
		$this->ReferedBy->setVisibility();
		$this->ReferPhNo->setVisibility();
		$this->WifeCell->setVisibility();
		$this->HusbandCell->setVisibility();
		$this->WifeEmail->setVisibility();
		$this->HusbandEmail->setVisibility();
		$this->ARTCYCLE->setVisibility();
		$this->RESULT->setVisibility();
		$this->malepic->Visible = FALSE;
		$this->femalepic->Visible = FALSE;
		$this->Mgendar->Visible = FALSE;
		$this->Fgendar->Visible = FALSE;
		$this->CoupleID->setVisibility();
		$this->HospID->setVisibility();
		$this->PatientName->setVisibility();
		$this->PatientID->setVisibility();
		$this->PartnerName->setVisibility();
		$this->PartnerID->setVisibility();
		$this->DrID->setVisibility();
		$this->DrDepartment->setVisibility();
		$this->Doctor->setVisibility();
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
		$this->setupLookupOptions($this->Male);
		$this->setupLookupOptions($this->Female);
		$this->setupLookupOptions($this->status);
		$this->setupLookupOptions($this->ReferedBy);
		$this->setupLookupOptions($this->DrID);

		// Set up Breadcrumb
		$this->setupBreadcrumb();

		// Load key parameters
		$this->RecKeys = $this->getRecordKeys(); // Load record keys
		$filter = $this->getFilterFromRecordKeys();
		if ($filter == "") {
			$this->terminate("ivflist.php"); // Prevent SQL injection, return to list
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
				$this->terminate("ivflist.php"); // Return to list
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
		$this->Male->setDbValue($row['Male']);
		if (array_key_exists('EV__Male', $rs->fields)) {
			$this->Male->VirtualValue = $rs->fields('EV__Male'); // Set up virtual field value
		} else {
			$this->Male->VirtualValue = ""; // Clear value
		}
		$this->Female->setDbValue($row['Female']);
		if (array_key_exists('EV__Female', $rs->fields)) {
			$this->Female->VirtualValue = $rs->fields('EV__Female'); // Set up virtual field value
		} else {
			$this->Female->VirtualValue = ""; // Clear value
		}
		$this->status->setDbValue($row['status']);
		$this->createdby->setDbValue($row['createdby']);
		$this->createddatetime->setDbValue($row['createddatetime']);
		$this->modifiedby->setDbValue($row['modifiedby']);
		$this->modifieddatetime->setDbValue($row['modifieddatetime']);
		$this->malepropic->Upload->DbValue = $row['malepropic'];
		$this->malepropic->setDbValue($this->malepropic->Upload->DbValue);
		$this->femalepropic->Upload->DbValue = $row['femalepropic'];
		$this->femalepropic->setDbValue($this->femalepropic->Upload->DbValue);
		$this->HusbandEducation->setDbValue($row['HusbandEducation']);
		$this->WifeEducation->setDbValue($row['WifeEducation']);
		$this->HusbandWorkHours->setDbValue($row['HusbandWorkHours']);
		$this->WifeWorkHours->setDbValue($row['WifeWorkHours']);
		$this->PatientLanguage->setDbValue($row['PatientLanguage']);
		$this->ReferedBy->setDbValue($row['ReferedBy']);
		if (array_key_exists('EV__ReferedBy', $rs->fields)) {
			$this->ReferedBy->VirtualValue = $rs->fields('EV__ReferedBy'); // Set up virtual field value
		} else {
			$this->ReferedBy->VirtualValue = ""; // Clear value
		}
		$this->ReferPhNo->setDbValue($row['ReferPhNo']);
		$this->WifeCell->setDbValue($row['WifeCell']);
		$this->HusbandCell->setDbValue($row['HusbandCell']);
		$this->WifeEmail->setDbValue($row['WifeEmail']);
		$this->HusbandEmail->setDbValue($row['HusbandEmail']);
		$this->ARTCYCLE->setDbValue($row['ARTCYCLE']);
		$this->RESULT->setDbValue($row['RESULT']);
		$this->malepic->setDbValue($row['malepic']);
		$this->femalepic->setDbValue($row['femalepic']);
		$this->Mgendar->setDbValue($row['Mgendar']);
		$this->Fgendar->setDbValue($row['Fgendar']);
		$this->CoupleID->setDbValue($row['CoupleID']);
		$this->HospID->setDbValue($row['HospID']);
		$this->PatientName->setDbValue($row['PatientName']);
		$this->PatientID->setDbValue($row['PatientID']);
		$this->PartnerName->setDbValue($row['PartnerName']);
		$this->PartnerID->setDbValue($row['PartnerID']);
		$this->DrID->setDbValue($row['DrID']);
		$this->DrDepartment->setDbValue($row['DrDepartment']);
		$this->Doctor->setDbValue($row['Doctor']);
	}

	// Return a row with default values
	protected function newRow()
	{
		$row = [];
		$row['id'] = NULL;
		$row['Male'] = NULL;
		$row['Female'] = NULL;
		$row['status'] = NULL;
		$row['createdby'] = NULL;
		$row['createddatetime'] = NULL;
		$row['modifiedby'] = NULL;
		$row['modifieddatetime'] = NULL;
		$row['malepropic'] = NULL;
		$row['femalepropic'] = NULL;
		$row['HusbandEducation'] = NULL;
		$row['WifeEducation'] = NULL;
		$row['HusbandWorkHours'] = NULL;
		$row['WifeWorkHours'] = NULL;
		$row['PatientLanguage'] = NULL;
		$row['ReferedBy'] = NULL;
		$row['ReferPhNo'] = NULL;
		$row['WifeCell'] = NULL;
		$row['HusbandCell'] = NULL;
		$row['WifeEmail'] = NULL;
		$row['HusbandEmail'] = NULL;
		$row['ARTCYCLE'] = NULL;
		$row['RESULT'] = NULL;
		$row['malepic'] = NULL;
		$row['femalepic'] = NULL;
		$row['Mgendar'] = NULL;
		$row['Fgendar'] = NULL;
		$row['CoupleID'] = NULL;
		$row['HospID'] = NULL;
		$row['PatientName'] = NULL;
		$row['PatientID'] = NULL;
		$row['PartnerName'] = NULL;
		$row['PartnerID'] = NULL;
		$row['DrID'] = NULL;
		$row['DrDepartment'] = NULL;
		$row['Doctor'] = NULL;
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
		// Male
		// Female
		// status
		// createdby
		// createddatetime
		// modifiedby
		// modifieddatetime
		// malepropic
		// femalepropic
		// HusbandEducation
		// WifeEducation
		// HusbandWorkHours
		// WifeWorkHours
		// PatientLanguage
		// ReferedBy
		// ReferPhNo
		// WifeCell
		// HusbandCell
		// WifeEmail
		// HusbandEmail
		// ARTCYCLE
		// RESULT
		// malepic
		// femalepic
		// Mgendar
		// Fgendar
		// CoupleID
		// HospID
		// PatientName
		// PatientID
		// PartnerName
		// PartnerID
		// DrID
		// DrDepartment
		// Doctor

		if ($this->RowType == ROWTYPE_VIEW) { // View row

			// id
			$this->id->ViewValue = $this->id->CurrentValue;
			$this->id->ViewCustomAttributes = "";

			// Male
			if ($this->Male->VirtualValue <> "") {
				$this->Male->ViewValue = $this->Male->VirtualValue;
			} else {
			$curVal = strval($this->Male->CurrentValue);
			if ($curVal <> "") {
				$this->Male->ViewValue = $this->Male->lookupCacheOption($curVal);
				if ($this->Male->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
					$sqlWrk = $this->Male->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = $rswrk->fields('df');
						$arwrk[2] = $rswrk->fields('df2');
						$arwrk[3] = $rswrk->fields('df3');
						$this->Male->ViewValue = $this->Male->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->Male->ViewValue = $this->Male->CurrentValue;
					}
				}
			} else {
				$this->Male->ViewValue = NULL;
			}
			}
			$this->Male->ViewCustomAttributes = "";

			// Female
			if ($this->Female->VirtualValue <> "") {
				$this->Female->ViewValue = $this->Female->VirtualValue;
			} else {
			$curVal = strval($this->Female->CurrentValue);
			if ($curVal <> "") {
				$this->Female->ViewValue = $this->Female->lookupCacheOption($curVal);
				if ($this->Female->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
					$sqlWrk = $this->Female->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = $rswrk->fields('df');
						$arwrk[2] = $rswrk->fields('df2');
						$arwrk[3] = $rswrk->fields('df3');
						$this->Female->ViewValue = $this->Female->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->Female->ViewValue = $this->Female->CurrentValue;
					}
				}
			} else {
				$this->Female->ViewValue = NULL;
			}
			}
			$this->Female->ViewCustomAttributes = "";

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

			// malepropic
			if (!EmptyValue($this->malepropic->Upload->DbValue)) {
				$this->malepropic->ImageWidth = 80;
				$this->malepropic->ImageHeight = 80;
				$this->malepropic->ImageAlt = $this->malepropic->alt();
				$this->malepropic->ViewValue = $this->malepropic->Upload->DbValue;
			} else {
				$this->malepropic->ViewValue = "";
			}
			$this->malepropic->ViewCustomAttributes = "";

			// femalepropic
			if (!EmptyValue($this->femalepropic->Upload->DbValue)) {
				$this->femalepropic->ImageWidth = 80;
				$this->femalepropic->ImageHeight = 80;
				$this->femalepropic->ImageAlt = $this->femalepropic->alt();
				$this->femalepropic->ViewValue = $this->femalepropic->Upload->DbValue;
			} else {
				$this->femalepropic->ViewValue = "";
			}
			$this->femalepropic->ViewCustomAttributes = "";

			// HusbandEducation
			$this->HusbandEducation->ViewValue = $this->HusbandEducation->CurrentValue;
			$this->HusbandEducation->ViewCustomAttributes = "";

			// WifeEducation
			$this->WifeEducation->ViewValue = $this->WifeEducation->CurrentValue;
			$this->WifeEducation->ViewCustomAttributes = "";

			// HusbandWorkHours
			$this->HusbandWorkHours->ViewValue = $this->HusbandWorkHours->CurrentValue;
			$this->HusbandWorkHours->ViewCustomAttributes = "";

			// WifeWorkHours
			$this->WifeWorkHours->ViewValue = $this->WifeWorkHours->CurrentValue;
			$this->WifeWorkHours->ViewCustomAttributes = "";

			// PatientLanguage
			$this->PatientLanguage->ViewValue = $this->PatientLanguage->CurrentValue;
			$this->PatientLanguage->ViewCustomAttributes = "";

			// ReferedBy
			if ($this->ReferedBy->VirtualValue <> "") {
				$this->ReferedBy->ViewValue = $this->ReferedBy->VirtualValue;
			} else {
			$curVal = strval($this->ReferedBy->CurrentValue);
			if ($curVal <> "") {
				$this->ReferedBy->ViewValue = $this->ReferedBy->lookupCacheOption($curVal);
				if ($this->ReferedBy->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`reference`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->ReferedBy->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = $rswrk->fields('df');
						$this->ReferedBy->ViewValue = $this->ReferedBy->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->ReferedBy->ViewValue = $this->ReferedBy->CurrentValue;
					}
				}
			} else {
				$this->ReferedBy->ViewValue = NULL;
			}
			}
			$this->ReferedBy->ViewCustomAttributes = "";

			// ReferPhNo
			$this->ReferPhNo->ViewValue = $this->ReferPhNo->CurrentValue;
			$this->ReferPhNo->ViewCustomAttributes = "";

			// WifeCell
			$this->WifeCell->ViewValue = $this->WifeCell->CurrentValue;
			$this->WifeCell->ViewCustomAttributes = "";

			// HusbandCell
			$this->HusbandCell->ViewValue = $this->HusbandCell->CurrentValue;
			$this->HusbandCell->ViewCustomAttributes = "";

			// WifeEmail
			$this->WifeEmail->ViewValue = $this->WifeEmail->CurrentValue;
			$this->WifeEmail->ViewCustomAttributes = "";

			// HusbandEmail
			$this->HusbandEmail->ViewValue = $this->HusbandEmail->CurrentValue;
			$this->HusbandEmail->ViewCustomAttributes = "";

			// ARTCYCLE
			if (strval($this->ARTCYCLE->CurrentValue) <> "") {
				$this->ARTCYCLE->ViewValue = $this->ARTCYCLE->optionCaption($this->ARTCYCLE->CurrentValue);
			} else {
				$this->ARTCYCLE->ViewValue = NULL;
			}
			$this->ARTCYCLE->ViewCustomAttributes = "";

			// RESULT
			if (strval($this->RESULT->CurrentValue) <> "") {
				$this->RESULT->ViewValue = $this->RESULT->optionCaption($this->RESULT->CurrentValue);
			} else {
				$this->RESULT->ViewValue = NULL;
			}
			$this->RESULT->ViewCustomAttributes = "";

			// CoupleID
			$this->CoupleID->ViewValue = $this->CoupleID->CurrentValue;
			$this->CoupleID->ViewCustomAttributes = "";

			// HospID
			$this->HospID->ViewValue = $this->HospID->CurrentValue;
			$this->HospID->ViewValue = FormatNumber($this->HospID->ViewValue, 0, -2, -2, -2);
			$this->HospID->ViewCustomAttributes = "";

			// PatientName
			$this->PatientName->ViewValue = $this->PatientName->CurrentValue;
			$this->PatientName->ViewCustomAttributes = "";

			// PatientID
			$this->PatientID->ViewValue = $this->PatientID->CurrentValue;
			$this->PatientID->ViewCustomAttributes = "";

			// PartnerName
			$this->PartnerName->ViewValue = $this->PartnerName->CurrentValue;
			$this->PartnerName->ViewCustomAttributes = "";

			// PartnerID
			$this->PartnerID->ViewValue = $this->PartnerID->CurrentValue;
			$this->PartnerID->ViewCustomAttributes = "";

			// DrID
			$curVal = strval($this->DrID->CurrentValue);
			if ($curVal <> "") {
				$this->DrID->ViewValue = $this->DrID->lookupCacheOption($curVal);
				if ($this->DrID->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
					$sqlWrk = $this->DrID->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = $rswrk->fields('df');
						$arwrk[2] = $rswrk->fields('df2');
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

			// DrDepartment
			$this->DrDepartment->ViewValue = $this->DrDepartment->CurrentValue;
			$this->DrDepartment->ViewCustomAttributes = "";

			// Doctor
			$this->Doctor->ViewValue = $this->Doctor->CurrentValue;
			$this->Doctor->ViewCustomAttributes = "";

			// id
			$this->id->LinkCustomAttributes = "";
			$this->id->HrefValue = "";
			$this->id->TooltipValue = "";

			// Male
			$this->Male->LinkCustomAttributes = "";
			$this->Male->HrefValue = "";
			$this->Male->TooltipValue = "";

			// Female
			$this->Female->LinkCustomAttributes = "";
			$this->Female->HrefValue = "";
			$this->Female->TooltipValue = "";

			// status
			$this->status->LinkCustomAttributes = "";
			$this->status->HrefValue = "";
			$this->status->TooltipValue = "";

			// malepropic
			$this->malepropic->LinkCustomAttributes = "";
			if (!EmptyValue($this->malepropic->Upload->DbValue)) {
				$this->malepropic->HrefValue = GetFileUploadUrl($this->malepropic, $this->malepropic->Upload->DbValue); // Add prefix/suffix
				$this->malepropic->LinkAttrs["target"] = ""; // Add target
				if ($this->isExport()) $this->malepropic->HrefValue = FullUrl($this->malepropic->HrefValue, "href");
			} else {
				$this->malepropic->HrefValue = "";
			}
			$this->malepropic->ExportHrefValue = $this->malepropic->UploadPath . $this->malepropic->Upload->DbValue;
			$this->malepropic->TooltipValue = "";
			if ($this->malepropic->UseColorbox) {
				if (EmptyValue($this->malepropic->TooltipValue))
					$this->malepropic->LinkAttrs["title"] = $Language->phrase("ViewImageGallery");
				$this->malepropic->LinkAttrs["data-rel"] = "ivf_x_malepropic";
				AppendClass($this->malepropic->LinkAttrs["class"], "ew-lightbox");
			}

			// femalepropic
			$this->femalepropic->LinkCustomAttributes = "";
			if (!EmptyValue($this->femalepropic->Upload->DbValue)) {
				$this->femalepropic->HrefValue = GetFileUploadUrl($this->femalepropic, $this->femalepropic->Upload->DbValue); // Add prefix/suffix
				$this->femalepropic->LinkAttrs["target"] = ""; // Add target
				if ($this->isExport()) $this->femalepropic->HrefValue = FullUrl($this->femalepropic->HrefValue, "href");
			} else {
				$this->femalepropic->HrefValue = "";
			}
			$this->femalepropic->ExportHrefValue = $this->femalepropic->UploadPath . $this->femalepropic->Upload->DbValue;
			$this->femalepropic->TooltipValue = "";
			if ($this->femalepropic->UseColorbox) {
				if (EmptyValue($this->femalepropic->TooltipValue))
					$this->femalepropic->LinkAttrs["title"] = $Language->phrase("ViewImageGallery");
				$this->femalepropic->LinkAttrs["data-rel"] = "ivf_x_femalepropic";
				AppendClass($this->femalepropic->LinkAttrs["class"], "ew-lightbox");
			}

			// HusbandEducation
			$this->HusbandEducation->LinkCustomAttributes = "";
			$this->HusbandEducation->HrefValue = "";
			$this->HusbandEducation->TooltipValue = "";

			// WifeEducation
			$this->WifeEducation->LinkCustomAttributes = "";
			$this->WifeEducation->HrefValue = "";
			$this->WifeEducation->TooltipValue = "";

			// HusbandWorkHours
			$this->HusbandWorkHours->LinkCustomAttributes = "";
			$this->HusbandWorkHours->HrefValue = "";
			$this->HusbandWorkHours->TooltipValue = "";

			// WifeWorkHours
			$this->WifeWorkHours->LinkCustomAttributes = "";
			$this->WifeWorkHours->HrefValue = "";
			$this->WifeWorkHours->TooltipValue = "";

			// PatientLanguage
			$this->PatientLanguage->LinkCustomAttributes = "";
			$this->PatientLanguage->HrefValue = "";
			$this->PatientLanguage->TooltipValue = "";

			// ReferedBy
			$this->ReferedBy->LinkCustomAttributes = "";
			$this->ReferedBy->HrefValue = "";
			$this->ReferedBy->TooltipValue = "";

			// ReferPhNo
			$this->ReferPhNo->LinkCustomAttributes = "";
			$this->ReferPhNo->HrefValue = "";
			$this->ReferPhNo->TooltipValue = "";

			// WifeCell
			$this->WifeCell->LinkCustomAttributes = "";
			$this->WifeCell->HrefValue = "";
			$this->WifeCell->TooltipValue = "";

			// HusbandCell
			$this->HusbandCell->LinkCustomAttributes = "";
			$this->HusbandCell->HrefValue = "";
			$this->HusbandCell->TooltipValue = "";

			// WifeEmail
			$this->WifeEmail->LinkCustomAttributes = "";
			$this->WifeEmail->HrefValue = "";
			$this->WifeEmail->TooltipValue = "";

			// HusbandEmail
			$this->HusbandEmail->LinkCustomAttributes = "";
			$this->HusbandEmail->HrefValue = "";
			$this->HusbandEmail->TooltipValue = "";

			// ARTCYCLE
			$this->ARTCYCLE->LinkCustomAttributes = "";
			$this->ARTCYCLE->HrefValue = "";
			$this->ARTCYCLE->TooltipValue = "";

			// RESULT
			$this->RESULT->LinkCustomAttributes = "";
			$this->RESULT->HrefValue = "";
			$this->RESULT->TooltipValue = "";

			// CoupleID
			$this->CoupleID->LinkCustomAttributes = "";
			$this->CoupleID->HrefValue = "";
			$this->CoupleID->TooltipValue = "";

			// HospID
			$this->HospID->LinkCustomAttributes = "";
			$this->HospID->HrefValue = "";
			$this->HospID->TooltipValue = "";

			// PatientName
			$this->PatientName->LinkCustomAttributes = "";
			$this->PatientName->HrefValue = "";
			$this->PatientName->TooltipValue = "";

			// PatientID
			$this->PatientID->LinkCustomAttributes = "";
			$this->PatientID->HrefValue = "";
			$this->PatientID->TooltipValue = "";

			// PartnerName
			$this->PartnerName->LinkCustomAttributes = "";
			$this->PartnerName->HrefValue = "";
			$this->PartnerName->TooltipValue = "";

			// PartnerID
			$this->PartnerID->LinkCustomAttributes = "";
			$this->PartnerID->HrefValue = "";
			$this->PartnerID->TooltipValue = "";

			// DrID
			$this->DrID->LinkCustomAttributes = "";
			$this->DrID->HrefValue = "";
			$this->DrID->TooltipValue = "";

			// DrDepartment
			$this->DrDepartment->LinkCustomAttributes = "";
			$this->DrDepartment->HrefValue = "";
			$this->DrDepartment->TooltipValue = "";

			// Doctor
			$this->Doctor->LinkCustomAttributes = "";
			$this->Doctor->HrefValue = "";
			$this->Doctor->TooltipValue = "";
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
		$Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("ivflist.php"), "", $this->TableVar, TRUE);
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
						case "x_Male":
							break;
						case "x_Female":
							break;
						case "x_status":
							break;
						case "x_ReferedBy":
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
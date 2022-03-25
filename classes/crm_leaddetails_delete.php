<?php
namespace PHPMaker2019\HIMS;

/**
 * Page class
 */
class crm_leaddetails_delete extends crm_leaddetails
{

	// Page ID
	public $PageID = "delete";

	// Project ID
	public $ProjectID = "{EA4F6D13-AF8F-428D-9EA7-BA88D1107EC3}";

	// Table name
	public $TableName = 'crm_leaddetails';

	// Page object name
	public $PageObjName = "crm_leaddetails_delete";

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

		// Table object (crm_leaddetails)
		if (!isset($GLOBALS["crm_leaddetails"]) || get_class($GLOBALS["crm_leaddetails"]) == PROJECT_NAMESPACE . "crm_leaddetails") {
			$GLOBALS["crm_leaddetails"] = &$this;
			$GLOBALS["Table"] = &$GLOBALS["crm_leaddetails"];
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
			define(PROJECT_NAMESPACE . "TABLE_NAME", 'crm_leaddetails');

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
		global $EXPORT, $crm_leaddetails;
		if ($this->CustomExport && $this->CustomExport == $this->Export && array_key_exists($this->CustomExport, $EXPORT)) {
				$content = ob_get_contents();
			if ($ExportFileName == "")
				$ExportFileName = $this->TableVar;
			$class = PROJECT_NAMESPACE . $EXPORT[$this->CustomExport];
			if (class_exists($class)) {
				$doc = new $class($crm_leaddetails);
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
			$key .= @$ar['leadid'];
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
					$this->terminate(GetUrl("crm_leaddetailslist.php"));
				else
					$this->terminate(GetUrl("login.php"));
				return;
			}
		}
		$this->CurrentAction = Param("action"); // Set up current action
		$this->leadid->setVisibility();
		$this->lead_no->setVisibility();
		$this->_email->setVisibility();
		$this->interest->setVisibility();
		$this->firstname->setVisibility();
		$this->salutation->setVisibility();
		$this->lastname->setVisibility();
		$this->company->setVisibility();
		$this->annualrevenue->setVisibility();
		$this->industry->setVisibility();
		$this->campaign->setVisibility();
		$this->leadstatus->setVisibility();
		$this->leadsource->setVisibility();
		$this->converted->setVisibility();
		$this->licencekeystatus->setVisibility();
		$this->space->setVisibility();
		$this->comments->Visible = FALSE;
		$this->priority->setVisibility();
		$this->demorequest->setVisibility();
		$this->partnercontact->setVisibility();
		$this->productversion->setVisibility();
		$this->product->setVisibility();
		$this->maildate->setVisibility();
		$this->nextstepdate->setVisibility();
		$this->fundingsituation->setVisibility();
		$this->purpose->setVisibility();
		$this->evaluationstatus->setVisibility();
		$this->transferdate->setVisibility();
		$this->revenuetype->setVisibility();
		$this->noofemployees->setVisibility();
		$this->secondaryemail->setVisibility();
		$this->noapprovalcalls->setVisibility();
		$this->noapprovalemails->setVisibility();
		$this->vat_id->setVisibility();
		$this->registration_number_1->setVisibility();
		$this->registration_number_2->setVisibility();
		$this->verification->Visible = FALSE;
		$this->subindustry->setVisibility();
		$this->atenttion->Visible = FALSE;
		$this->leads_relation->setVisibility();
		$this->legal_form->setVisibility();
		$this->sum_time->setVisibility();
		$this->active->setVisibility();
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
			$this->terminate("crm_leaddetailslist.php"); // Prevent SQL injection, return to list
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
				$this->terminate("crm_leaddetailslist.php"); // Return to list
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
		$this->leadid->setDbValue($row['leadid']);
		$this->lead_no->setDbValue($row['lead_no']);
		$this->_email->setDbValue($row['email']);
		$this->interest->setDbValue($row['interest']);
		$this->firstname->setDbValue($row['firstname']);
		$this->salutation->setDbValue($row['salutation']);
		$this->lastname->setDbValue($row['lastname']);
		$this->company->setDbValue($row['company']);
		$this->annualrevenue->setDbValue($row['annualrevenue']);
		$this->industry->setDbValue($row['industry']);
		$this->campaign->setDbValue($row['campaign']);
		$this->leadstatus->setDbValue($row['leadstatus']);
		$this->leadsource->setDbValue($row['leadsource']);
		$this->converted->setDbValue($row['converted']);
		$this->licencekeystatus->setDbValue($row['licencekeystatus']);
		$this->space->setDbValue($row['space']);
		$this->comments->setDbValue($row['comments']);
		$this->priority->setDbValue($row['priority']);
		$this->demorequest->setDbValue($row['demorequest']);
		$this->partnercontact->setDbValue($row['partnercontact']);
		$this->productversion->setDbValue($row['productversion']);
		$this->product->setDbValue($row['product']);
		$this->maildate->setDbValue($row['maildate']);
		$this->nextstepdate->setDbValue($row['nextstepdate']);
		$this->fundingsituation->setDbValue($row['fundingsituation']);
		$this->purpose->setDbValue($row['purpose']);
		$this->evaluationstatus->setDbValue($row['evaluationstatus']);
		$this->transferdate->setDbValue($row['transferdate']);
		$this->revenuetype->setDbValue($row['revenuetype']);
		$this->noofemployees->setDbValue($row['noofemployees']);
		$this->secondaryemail->setDbValue($row['secondaryemail']);
		$this->noapprovalcalls->setDbValue($row['noapprovalcalls']);
		$this->noapprovalemails->setDbValue($row['noapprovalemails']);
		$this->vat_id->setDbValue($row['vat_id']);
		$this->registration_number_1->setDbValue($row['registration_number_1']);
		$this->registration_number_2->setDbValue($row['registration_number_2']);
		$this->verification->setDbValue($row['verification']);
		$this->subindustry->setDbValue($row['subindustry']);
		$this->atenttion->setDbValue($row['atenttion']);
		$this->leads_relation->setDbValue($row['leads_relation']);
		$this->legal_form->setDbValue($row['legal_form']);
		$this->sum_time->setDbValue($row['sum_time']);
		$this->active->setDbValue($row['active']);
	}

	// Return a row with default values
	protected function newRow()
	{
		$row = [];
		$row['leadid'] = NULL;
		$row['lead_no'] = NULL;
		$row['email'] = NULL;
		$row['interest'] = NULL;
		$row['firstname'] = NULL;
		$row['salutation'] = NULL;
		$row['lastname'] = NULL;
		$row['company'] = NULL;
		$row['annualrevenue'] = NULL;
		$row['industry'] = NULL;
		$row['campaign'] = NULL;
		$row['leadstatus'] = NULL;
		$row['leadsource'] = NULL;
		$row['converted'] = NULL;
		$row['licencekeystatus'] = NULL;
		$row['space'] = NULL;
		$row['comments'] = NULL;
		$row['priority'] = NULL;
		$row['demorequest'] = NULL;
		$row['partnercontact'] = NULL;
		$row['productversion'] = NULL;
		$row['product'] = NULL;
		$row['maildate'] = NULL;
		$row['nextstepdate'] = NULL;
		$row['fundingsituation'] = NULL;
		$row['purpose'] = NULL;
		$row['evaluationstatus'] = NULL;
		$row['transferdate'] = NULL;
		$row['revenuetype'] = NULL;
		$row['noofemployees'] = NULL;
		$row['secondaryemail'] = NULL;
		$row['noapprovalcalls'] = NULL;
		$row['noapprovalemails'] = NULL;
		$row['vat_id'] = NULL;
		$row['registration_number_1'] = NULL;
		$row['registration_number_2'] = NULL;
		$row['verification'] = NULL;
		$row['subindustry'] = NULL;
		$row['atenttion'] = NULL;
		$row['leads_relation'] = NULL;
		$row['legal_form'] = NULL;
		$row['sum_time'] = NULL;
		$row['active'] = NULL;
		return $row;
	}

	// Render row values based on field settings
	public function renderRow()
	{
		global $Security, $Language, $CurrentLanguage;

		// Initialize URLs
		// Convert decimal values if posted back

		if ($this->annualrevenue->FormValue == $this->annualrevenue->CurrentValue && is_numeric(ConvertToFloatString($this->annualrevenue->CurrentValue)))
			$this->annualrevenue->CurrentValue = ConvertToFloatString($this->annualrevenue->CurrentValue);

		// Convert decimal values if posted back
		if ($this->sum_time->FormValue == $this->sum_time->CurrentValue && is_numeric(ConvertToFloatString($this->sum_time->CurrentValue)))
			$this->sum_time->CurrentValue = ConvertToFloatString($this->sum_time->CurrentValue);

		// Call Row_Rendering event
		$this->Row_Rendering();

		// Common render codes for all row types
		// leadid
		// lead_no
		// email
		// interest
		// firstname
		// salutation
		// lastname
		// company
		// annualrevenue
		// industry
		// campaign
		// leadstatus
		// leadsource
		// converted
		// licencekeystatus
		// space
		// comments
		// priority
		// demorequest
		// partnercontact
		// productversion
		// product
		// maildate
		// nextstepdate
		// fundingsituation
		// purpose
		// evaluationstatus
		// transferdate
		// revenuetype
		// noofemployees
		// secondaryemail
		// noapprovalcalls
		// noapprovalemails
		// vat_id
		// registration_number_1
		// registration_number_2
		// verification
		// subindustry
		// atenttion
		// leads_relation
		// legal_form
		// sum_time
		// active

		if ($this->RowType == ROWTYPE_VIEW) { // View row

			// leadid
			$this->leadid->ViewValue = $this->leadid->CurrentValue;
			$this->leadid->ViewValue = FormatNumber($this->leadid->ViewValue, 0, -2, -2, -2);
			$this->leadid->ViewCustomAttributes = "";

			// lead_no
			$this->lead_no->ViewValue = $this->lead_no->CurrentValue;
			$this->lead_no->ViewCustomAttributes = "";

			// email
			$this->_email->ViewValue = $this->_email->CurrentValue;
			$this->_email->ViewCustomAttributes = "";

			// interest
			$this->interest->ViewValue = $this->interest->CurrentValue;
			$this->interest->ViewCustomAttributes = "";

			// firstname
			$this->firstname->ViewValue = $this->firstname->CurrentValue;
			$this->firstname->ViewCustomAttributes = "";

			// salutation
			$this->salutation->ViewValue = $this->salutation->CurrentValue;
			$this->salutation->ViewCustomAttributes = "";

			// lastname
			$this->lastname->ViewValue = $this->lastname->CurrentValue;
			$this->lastname->ViewCustomAttributes = "";

			// company
			$this->company->ViewValue = $this->company->CurrentValue;
			$this->company->ViewCustomAttributes = "";

			// annualrevenue
			$this->annualrevenue->ViewValue = $this->annualrevenue->CurrentValue;
			$this->annualrevenue->ViewValue = FormatNumber($this->annualrevenue->ViewValue, 2, -2, -2, -2);
			$this->annualrevenue->ViewCustomAttributes = "";

			// industry
			$this->industry->ViewValue = $this->industry->CurrentValue;
			$this->industry->ViewCustomAttributes = "";

			// campaign
			$this->campaign->ViewValue = $this->campaign->CurrentValue;
			$this->campaign->ViewCustomAttributes = "";

			// leadstatus
			$this->leadstatus->ViewValue = $this->leadstatus->CurrentValue;
			$this->leadstatus->ViewCustomAttributes = "";

			// leadsource
			$this->leadsource->ViewValue = $this->leadsource->CurrentValue;
			$this->leadsource->ViewCustomAttributes = "";

			// converted
			$this->converted->ViewValue = $this->converted->CurrentValue;
			$this->converted->ViewValue = FormatNumber($this->converted->ViewValue, 0, -2, -2, -2);
			$this->converted->ViewCustomAttributes = "";

			// licencekeystatus
			$this->licencekeystatus->ViewValue = $this->licencekeystatus->CurrentValue;
			$this->licencekeystatus->ViewCustomAttributes = "";

			// space
			$this->space->ViewValue = $this->space->CurrentValue;
			$this->space->ViewCustomAttributes = "";

			// priority
			$this->priority->ViewValue = $this->priority->CurrentValue;
			$this->priority->ViewCustomAttributes = "";

			// demorequest
			$this->demorequest->ViewValue = $this->demorequest->CurrentValue;
			$this->demorequest->ViewCustomAttributes = "";

			// partnercontact
			$this->partnercontact->ViewValue = $this->partnercontact->CurrentValue;
			$this->partnercontact->ViewCustomAttributes = "";

			// productversion
			$this->productversion->ViewValue = $this->productversion->CurrentValue;
			$this->productversion->ViewCustomAttributes = "";

			// product
			$this->product->ViewValue = $this->product->CurrentValue;
			$this->product->ViewCustomAttributes = "";

			// maildate
			$this->maildate->ViewValue = $this->maildate->CurrentValue;
			$this->maildate->ViewValue = FormatDateTime($this->maildate->ViewValue, 0);
			$this->maildate->ViewCustomAttributes = "";

			// nextstepdate
			$this->nextstepdate->ViewValue = $this->nextstepdate->CurrentValue;
			$this->nextstepdate->ViewValue = FormatDateTime($this->nextstepdate->ViewValue, 0);
			$this->nextstepdate->ViewCustomAttributes = "";

			// fundingsituation
			$this->fundingsituation->ViewValue = $this->fundingsituation->CurrentValue;
			$this->fundingsituation->ViewCustomAttributes = "";

			// purpose
			$this->purpose->ViewValue = $this->purpose->CurrentValue;
			$this->purpose->ViewCustomAttributes = "";

			// evaluationstatus
			$this->evaluationstatus->ViewValue = $this->evaluationstatus->CurrentValue;
			$this->evaluationstatus->ViewCustomAttributes = "";

			// transferdate
			$this->transferdate->ViewValue = $this->transferdate->CurrentValue;
			$this->transferdate->ViewValue = FormatDateTime($this->transferdate->ViewValue, 0);
			$this->transferdate->ViewCustomAttributes = "";

			// revenuetype
			$this->revenuetype->ViewValue = $this->revenuetype->CurrentValue;
			$this->revenuetype->ViewCustomAttributes = "";

			// noofemployees
			$this->noofemployees->ViewValue = $this->noofemployees->CurrentValue;
			$this->noofemployees->ViewValue = FormatNumber($this->noofemployees->ViewValue, 0, -2, -2, -2);
			$this->noofemployees->ViewCustomAttributes = "";

			// secondaryemail
			$this->secondaryemail->ViewValue = $this->secondaryemail->CurrentValue;
			$this->secondaryemail->ViewCustomAttributes = "";

			// noapprovalcalls
			$this->noapprovalcalls->ViewValue = $this->noapprovalcalls->CurrentValue;
			$this->noapprovalcalls->ViewValue = FormatNumber($this->noapprovalcalls->ViewValue, 0, -2, -2, -2);
			$this->noapprovalcalls->ViewCustomAttributes = "";

			// noapprovalemails
			$this->noapprovalemails->ViewValue = $this->noapprovalemails->CurrentValue;
			$this->noapprovalemails->ViewValue = FormatNumber($this->noapprovalemails->ViewValue, 0, -2, -2, -2);
			$this->noapprovalemails->ViewCustomAttributes = "";

			// vat_id
			$this->vat_id->ViewValue = $this->vat_id->CurrentValue;
			$this->vat_id->ViewCustomAttributes = "";

			// registration_number_1
			$this->registration_number_1->ViewValue = $this->registration_number_1->CurrentValue;
			$this->registration_number_1->ViewCustomAttributes = "";

			// registration_number_2
			$this->registration_number_2->ViewValue = $this->registration_number_2->CurrentValue;
			$this->registration_number_2->ViewCustomAttributes = "";

			// subindustry
			$this->subindustry->ViewValue = $this->subindustry->CurrentValue;
			$this->subindustry->ViewCustomAttributes = "";

			// leads_relation
			$this->leads_relation->ViewValue = $this->leads_relation->CurrentValue;
			$this->leads_relation->ViewCustomAttributes = "";

			// legal_form
			$this->legal_form->ViewValue = $this->legal_form->CurrentValue;
			$this->legal_form->ViewCustomAttributes = "";

			// sum_time
			$this->sum_time->ViewValue = $this->sum_time->CurrentValue;
			$this->sum_time->ViewValue = FormatNumber($this->sum_time->ViewValue, 2, -2, -2, -2);
			$this->sum_time->ViewCustomAttributes = "";

			// active
			$this->active->ViewValue = $this->active->CurrentValue;
			$this->active->ViewValue = FormatNumber($this->active->ViewValue, 0, -2, -2, -2);
			$this->active->ViewCustomAttributes = "";

			// leadid
			$this->leadid->LinkCustomAttributes = "";
			$this->leadid->HrefValue = "";
			$this->leadid->TooltipValue = "";

			// lead_no
			$this->lead_no->LinkCustomAttributes = "";
			$this->lead_no->HrefValue = "";
			$this->lead_no->TooltipValue = "";

			// email
			$this->_email->LinkCustomAttributes = "";
			$this->_email->HrefValue = "";
			$this->_email->TooltipValue = "";

			// interest
			$this->interest->LinkCustomAttributes = "";
			$this->interest->HrefValue = "";
			$this->interest->TooltipValue = "";

			// firstname
			$this->firstname->LinkCustomAttributes = "";
			$this->firstname->HrefValue = "";
			$this->firstname->TooltipValue = "";

			// salutation
			$this->salutation->LinkCustomAttributes = "";
			$this->salutation->HrefValue = "";
			$this->salutation->TooltipValue = "";

			// lastname
			$this->lastname->LinkCustomAttributes = "";
			$this->lastname->HrefValue = "";
			$this->lastname->TooltipValue = "";

			// company
			$this->company->LinkCustomAttributes = "";
			$this->company->HrefValue = "";
			$this->company->TooltipValue = "";

			// annualrevenue
			$this->annualrevenue->LinkCustomAttributes = "";
			$this->annualrevenue->HrefValue = "";
			$this->annualrevenue->TooltipValue = "";

			// industry
			$this->industry->LinkCustomAttributes = "";
			$this->industry->HrefValue = "";
			$this->industry->TooltipValue = "";

			// campaign
			$this->campaign->LinkCustomAttributes = "";
			$this->campaign->HrefValue = "";
			$this->campaign->TooltipValue = "";

			// leadstatus
			$this->leadstatus->LinkCustomAttributes = "";
			$this->leadstatus->HrefValue = "";
			$this->leadstatus->TooltipValue = "";

			// leadsource
			$this->leadsource->LinkCustomAttributes = "";
			$this->leadsource->HrefValue = "";
			$this->leadsource->TooltipValue = "";

			// converted
			$this->converted->LinkCustomAttributes = "";
			$this->converted->HrefValue = "";
			$this->converted->TooltipValue = "";

			// licencekeystatus
			$this->licencekeystatus->LinkCustomAttributes = "";
			$this->licencekeystatus->HrefValue = "";
			$this->licencekeystatus->TooltipValue = "";

			// space
			$this->space->LinkCustomAttributes = "";
			$this->space->HrefValue = "";
			$this->space->TooltipValue = "";

			// priority
			$this->priority->LinkCustomAttributes = "";
			$this->priority->HrefValue = "";
			$this->priority->TooltipValue = "";

			// demorequest
			$this->demorequest->LinkCustomAttributes = "";
			$this->demorequest->HrefValue = "";
			$this->demorequest->TooltipValue = "";

			// partnercontact
			$this->partnercontact->LinkCustomAttributes = "";
			$this->partnercontact->HrefValue = "";
			$this->partnercontact->TooltipValue = "";

			// productversion
			$this->productversion->LinkCustomAttributes = "";
			$this->productversion->HrefValue = "";
			$this->productversion->TooltipValue = "";

			// product
			$this->product->LinkCustomAttributes = "";
			$this->product->HrefValue = "";
			$this->product->TooltipValue = "";

			// maildate
			$this->maildate->LinkCustomAttributes = "";
			$this->maildate->HrefValue = "";
			$this->maildate->TooltipValue = "";

			// nextstepdate
			$this->nextstepdate->LinkCustomAttributes = "";
			$this->nextstepdate->HrefValue = "";
			$this->nextstepdate->TooltipValue = "";

			// fundingsituation
			$this->fundingsituation->LinkCustomAttributes = "";
			$this->fundingsituation->HrefValue = "";
			$this->fundingsituation->TooltipValue = "";

			// purpose
			$this->purpose->LinkCustomAttributes = "";
			$this->purpose->HrefValue = "";
			$this->purpose->TooltipValue = "";

			// evaluationstatus
			$this->evaluationstatus->LinkCustomAttributes = "";
			$this->evaluationstatus->HrefValue = "";
			$this->evaluationstatus->TooltipValue = "";

			// transferdate
			$this->transferdate->LinkCustomAttributes = "";
			$this->transferdate->HrefValue = "";
			$this->transferdate->TooltipValue = "";

			// revenuetype
			$this->revenuetype->LinkCustomAttributes = "";
			$this->revenuetype->HrefValue = "";
			$this->revenuetype->TooltipValue = "";

			// noofemployees
			$this->noofemployees->LinkCustomAttributes = "";
			$this->noofemployees->HrefValue = "";
			$this->noofemployees->TooltipValue = "";

			// secondaryemail
			$this->secondaryemail->LinkCustomAttributes = "";
			$this->secondaryemail->HrefValue = "";
			$this->secondaryemail->TooltipValue = "";

			// noapprovalcalls
			$this->noapprovalcalls->LinkCustomAttributes = "";
			$this->noapprovalcalls->HrefValue = "";
			$this->noapprovalcalls->TooltipValue = "";

			// noapprovalemails
			$this->noapprovalemails->LinkCustomAttributes = "";
			$this->noapprovalemails->HrefValue = "";
			$this->noapprovalemails->TooltipValue = "";

			// vat_id
			$this->vat_id->LinkCustomAttributes = "";
			$this->vat_id->HrefValue = "";
			$this->vat_id->TooltipValue = "";

			// registration_number_1
			$this->registration_number_1->LinkCustomAttributes = "";
			$this->registration_number_1->HrefValue = "";
			$this->registration_number_1->TooltipValue = "";

			// registration_number_2
			$this->registration_number_2->LinkCustomAttributes = "";
			$this->registration_number_2->HrefValue = "";
			$this->registration_number_2->TooltipValue = "";

			// subindustry
			$this->subindustry->LinkCustomAttributes = "";
			$this->subindustry->HrefValue = "";
			$this->subindustry->TooltipValue = "";

			// leads_relation
			$this->leads_relation->LinkCustomAttributes = "";
			$this->leads_relation->HrefValue = "";
			$this->leads_relation->TooltipValue = "";

			// legal_form
			$this->legal_form->LinkCustomAttributes = "";
			$this->legal_form->HrefValue = "";
			$this->legal_form->TooltipValue = "";

			// sum_time
			$this->sum_time->LinkCustomAttributes = "";
			$this->sum_time->HrefValue = "";
			$this->sum_time->TooltipValue = "";

			// active
			$this->active->LinkCustomAttributes = "";
			$this->active->HrefValue = "";
			$this->active->TooltipValue = "";
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
				$thisKey .= $row['leadid'];
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
		$Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("crm_leaddetailslist.php"), "", $this->TableVar, TRUE);
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
<?php
namespace PHPMaker2019\HIMS;

/**
 * Page class
 */
class recruitment_candidates_delete extends recruitment_candidates
{

	// Page ID
	public $PageID = "delete";

	// Project ID
	public $ProjectID = "{EA4F6D13-AF8F-428D-9EA7-BA88D1107EC3}";

	// Table name
	public $TableName = 'recruitment_candidates';

	// Page object name
	public $PageObjName = "recruitment_candidates_delete";

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

		// Table object (recruitment_candidates)
		if (!isset($GLOBALS["recruitment_candidates"]) || get_class($GLOBALS["recruitment_candidates"]) == PROJECT_NAMESPACE . "recruitment_candidates") {
			$GLOBALS["recruitment_candidates"] = &$this;
			$GLOBALS["Table"] = &$GLOBALS["recruitment_candidates"];
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
			define(PROJECT_NAMESPACE . "TABLE_NAME", 'recruitment_candidates');

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
		global $EXPORT, $recruitment_candidates;
		if ($this->CustomExport && $this->CustomExport == $this->Export && array_key_exists($this->CustomExport, $EXPORT)) {
				$content = ob_get_contents();
			if ($ExportFileName == "")
				$ExportFileName = $this->TableVar;
			$class = PROJECT_NAMESPACE . $EXPORT[$this->CustomExport];
			if (class_exists($class)) {
				$doc = new $class($recruitment_candidates);
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
					$this->terminate(GetUrl("recruitment_candidateslist.php"));
				else
					$this->terminate(GetUrl("login.php"));
				return;
			}
		}
		$this->CurrentAction = Param("action"); // Set up current action
		$this->id->setVisibility();
		$this->first_name->setVisibility();
		$this->last_name->setVisibility();
		$this->nationality->setVisibility();
		$this->birthday->setVisibility();
		$this->gender->setVisibility();
		$this->marital_status->setVisibility();
		$this->address1->setVisibility();
		$this->address2->setVisibility();
		$this->city->setVisibility();
		$this->country->setVisibility();
		$this->province->setVisibility();
		$this->postal_code->setVisibility();
		$this->_email->setVisibility();
		$this->home_phone->setVisibility();
		$this->mobile_phone->setVisibility();
		$this->cv_title->setVisibility();
		$this->cv->setVisibility();
		$this->cvtext->Visible = FALSE;
		$this->industry->Visible = FALSE;
		$this->profileImage->setVisibility();
		$this->head_line->Visible = FALSE;
		$this->objective->Visible = FALSE;
		$this->work_history->Visible = FALSE;
		$this->education->Visible = FALSE;
		$this->skills->Visible = FALSE;
		$this->referees->Visible = FALSE;
		$this->linkedInUrl->Visible = FALSE;
		$this->linkedInData->Visible = FALSE;
		$this->totalYearsOfExperience->setVisibility();
		$this->totalMonthsOfExperience->setVisibility();
		$this->htmlCVData->Visible = FALSE;
		$this->generatedCVFile->setVisibility();
		$this->created->setVisibility();
		$this->updated->setVisibility();
		$this->expectedSalary->setVisibility();
		$this->preferedPositions->Visible = FALSE;
		$this->preferedJobtype->setVisibility();
		$this->preferedCountries->Visible = FALSE;
		$this->tags->Visible = FALSE;
		$this->notes->Visible = FALSE;
		$this->calls->Visible = FALSE;
		$this->age->setVisibility();
		$this->hash->setVisibility();
		$this->linkedInProfileLink->setVisibility();
		$this->linkedInProfileId->setVisibility();
		$this->facebookProfileLink->setVisibility();
		$this->facebookProfileId->setVisibility();
		$this->twitterProfileLink->setVisibility();
		$this->twitterProfileId->setVisibility();
		$this->googleProfileLink->setVisibility();
		$this->googleProfileId->setVisibility();
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
			$this->terminate("recruitment_candidateslist.php"); // Prevent SQL injection, return to list
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
				$this->terminate("recruitment_candidateslist.php"); // Return to list
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
		$this->first_name->setDbValue($row['first_name']);
		$this->last_name->setDbValue($row['last_name']);
		$this->nationality->setDbValue($row['nationality']);
		$this->birthday->setDbValue($row['birthday']);
		$this->gender->setDbValue($row['gender']);
		$this->marital_status->setDbValue($row['marital_status']);
		$this->address1->setDbValue($row['address1']);
		$this->address2->setDbValue($row['address2']);
		$this->city->setDbValue($row['city']);
		$this->country->setDbValue($row['country']);
		$this->province->setDbValue($row['province']);
		$this->postal_code->setDbValue($row['postal_code']);
		$this->_email->setDbValue($row['email']);
		$this->home_phone->setDbValue($row['home_phone']);
		$this->mobile_phone->setDbValue($row['mobile_phone']);
		$this->cv_title->setDbValue($row['cv_title']);
		$this->cv->setDbValue($row['cv']);
		$this->cvtext->setDbValue($row['cvtext']);
		$this->industry->setDbValue($row['industry']);
		$this->profileImage->setDbValue($row['profileImage']);
		$this->head_line->setDbValue($row['head_line']);
		$this->objective->setDbValue($row['objective']);
		$this->work_history->setDbValue($row['work_history']);
		$this->education->setDbValue($row['education']);
		$this->skills->setDbValue($row['skills']);
		$this->referees->setDbValue($row['referees']);
		$this->linkedInUrl->setDbValue($row['linkedInUrl']);
		$this->linkedInData->setDbValue($row['linkedInData']);
		$this->totalYearsOfExperience->setDbValue($row['totalYearsOfExperience']);
		$this->totalMonthsOfExperience->setDbValue($row['totalMonthsOfExperience']);
		$this->htmlCVData->setDbValue($row['htmlCVData']);
		$this->generatedCVFile->setDbValue($row['generatedCVFile']);
		$this->created->setDbValue($row['created']);
		$this->updated->setDbValue($row['updated']);
		$this->expectedSalary->setDbValue($row['expectedSalary']);
		$this->preferedPositions->setDbValue($row['preferedPositions']);
		$this->preferedJobtype->setDbValue($row['preferedJobtype']);
		$this->preferedCountries->setDbValue($row['preferedCountries']);
		$this->tags->setDbValue($row['tags']);
		$this->notes->setDbValue($row['notes']);
		$this->calls->setDbValue($row['calls']);
		$this->age->setDbValue($row['age']);
		$this->hash->setDbValue($row['hash']);
		$this->linkedInProfileLink->setDbValue($row['linkedInProfileLink']);
		$this->linkedInProfileId->setDbValue($row['linkedInProfileId']);
		$this->facebookProfileLink->setDbValue($row['facebookProfileLink']);
		$this->facebookProfileId->setDbValue($row['facebookProfileId']);
		$this->twitterProfileLink->setDbValue($row['twitterProfileLink']);
		$this->twitterProfileId->setDbValue($row['twitterProfileId']);
		$this->googleProfileLink->setDbValue($row['googleProfileLink']);
		$this->googleProfileId->setDbValue($row['googleProfileId']);
	}

	// Return a row with default values
	protected function newRow()
	{
		$row = [];
		$row['id'] = NULL;
		$row['first_name'] = NULL;
		$row['last_name'] = NULL;
		$row['nationality'] = NULL;
		$row['birthday'] = NULL;
		$row['gender'] = NULL;
		$row['marital_status'] = NULL;
		$row['address1'] = NULL;
		$row['address2'] = NULL;
		$row['city'] = NULL;
		$row['country'] = NULL;
		$row['province'] = NULL;
		$row['postal_code'] = NULL;
		$row['email'] = NULL;
		$row['home_phone'] = NULL;
		$row['mobile_phone'] = NULL;
		$row['cv_title'] = NULL;
		$row['cv'] = NULL;
		$row['cvtext'] = NULL;
		$row['industry'] = NULL;
		$row['profileImage'] = NULL;
		$row['head_line'] = NULL;
		$row['objective'] = NULL;
		$row['work_history'] = NULL;
		$row['education'] = NULL;
		$row['skills'] = NULL;
		$row['referees'] = NULL;
		$row['linkedInUrl'] = NULL;
		$row['linkedInData'] = NULL;
		$row['totalYearsOfExperience'] = NULL;
		$row['totalMonthsOfExperience'] = NULL;
		$row['htmlCVData'] = NULL;
		$row['generatedCVFile'] = NULL;
		$row['created'] = NULL;
		$row['updated'] = NULL;
		$row['expectedSalary'] = NULL;
		$row['preferedPositions'] = NULL;
		$row['preferedJobtype'] = NULL;
		$row['preferedCountries'] = NULL;
		$row['tags'] = NULL;
		$row['notes'] = NULL;
		$row['calls'] = NULL;
		$row['age'] = NULL;
		$row['hash'] = NULL;
		$row['linkedInProfileLink'] = NULL;
		$row['linkedInProfileId'] = NULL;
		$row['facebookProfileLink'] = NULL;
		$row['facebookProfileId'] = NULL;
		$row['twitterProfileLink'] = NULL;
		$row['twitterProfileId'] = NULL;
		$row['googleProfileLink'] = NULL;
		$row['googleProfileId'] = NULL;
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
		// first_name
		// last_name
		// nationality
		// birthday
		// gender
		// marital_status
		// address1
		// address2
		// city
		// country
		// province
		// postal_code
		// email
		// home_phone
		// mobile_phone
		// cv_title
		// cv
		// cvtext
		// industry
		// profileImage
		// head_line
		// objective
		// work_history
		// education
		// skills
		// referees
		// linkedInUrl
		// linkedInData
		// totalYearsOfExperience
		// totalMonthsOfExperience
		// htmlCVData
		// generatedCVFile
		// created
		// updated
		// expectedSalary
		// preferedPositions
		// preferedJobtype
		// preferedCountries
		// tags
		// notes
		// calls
		// age
		// hash
		// linkedInProfileLink
		// linkedInProfileId
		// facebookProfileLink
		// facebookProfileId
		// twitterProfileLink
		// twitterProfileId
		// googleProfileLink
		// googleProfileId

		if ($this->RowType == ROWTYPE_VIEW) { // View row

			// id
			$this->id->ViewValue = $this->id->CurrentValue;
			$this->id->ViewCustomAttributes = "";

			// first_name
			$this->first_name->ViewValue = $this->first_name->CurrentValue;
			$this->first_name->ViewCustomAttributes = "";

			// last_name
			$this->last_name->ViewValue = $this->last_name->CurrentValue;
			$this->last_name->ViewCustomAttributes = "";

			// nationality
			$this->nationality->ViewValue = $this->nationality->CurrentValue;
			$this->nationality->ViewValue = FormatNumber($this->nationality->ViewValue, 0, -2, -2, -2);
			$this->nationality->ViewCustomAttributes = "";

			// birthday
			$this->birthday->ViewValue = $this->birthday->CurrentValue;
			$this->birthday->ViewValue = FormatDateTime($this->birthday->ViewValue, 0);
			$this->birthday->ViewCustomAttributes = "";

			// gender
			if (strval($this->gender->CurrentValue) <> "") {
				$this->gender->ViewValue = $this->gender->optionCaption($this->gender->CurrentValue);
			} else {
				$this->gender->ViewValue = NULL;
			}
			$this->gender->ViewCustomAttributes = "";

			// marital_status
			if (strval($this->marital_status->CurrentValue) <> "") {
				$this->marital_status->ViewValue = $this->marital_status->optionCaption($this->marital_status->CurrentValue);
			} else {
				$this->marital_status->ViewValue = NULL;
			}
			$this->marital_status->ViewCustomAttributes = "";

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

			// email
			$this->_email->ViewValue = $this->_email->CurrentValue;
			$this->_email->ViewCustomAttributes = "";

			// home_phone
			$this->home_phone->ViewValue = $this->home_phone->CurrentValue;
			$this->home_phone->ViewCustomAttributes = "";

			// mobile_phone
			$this->mobile_phone->ViewValue = $this->mobile_phone->CurrentValue;
			$this->mobile_phone->ViewCustomAttributes = "";

			// cv_title
			$this->cv_title->ViewValue = $this->cv_title->CurrentValue;
			$this->cv_title->ViewCustomAttributes = "";

			// cv
			$this->cv->ViewValue = $this->cv->CurrentValue;
			$this->cv->ViewCustomAttributes = "";

			// profileImage
			$this->profileImage->ViewValue = $this->profileImage->CurrentValue;
			$this->profileImage->ViewCustomAttributes = "";

			// totalYearsOfExperience
			$this->totalYearsOfExperience->ViewValue = $this->totalYearsOfExperience->CurrentValue;
			$this->totalYearsOfExperience->ViewValue = FormatNumber($this->totalYearsOfExperience->ViewValue, 0, -2, -2, -2);
			$this->totalYearsOfExperience->ViewCustomAttributes = "";

			// totalMonthsOfExperience
			$this->totalMonthsOfExperience->ViewValue = $this->totalMonthsOfExperience->CurrentValue;
			$this->totalMonthsOfExperience->ViewValue = FormatNumber($this->totalMonthsOfExperience->ViewValue, 0, -2, -2, -2);
			$this->totalMonthsOfExperience->ViewCustomAttributes = "";

			// generatedCVFile
			$this->generatedCVFile->ViewValue = $this->generatedCVFile->CurrentValue;
			$this->generatedCVFile->ViewCustomAttributes = "";

			// created
			$this->created->ViewValue = $this->created->CurrentValue;
			$this->created->ViewValue = FormatDateTime($this->created->ViewValue, 0);
			$this->created->ViewCustomAttributes = "";

			// updated
			$this->updated->ViewValue = $this->updated->CurrentValue;
			$this->updated->ViewValue = FormatDateTime($this->updated->ViewValue, 0);
			$this->updated->ViewCustomAttributes = "";

			// expectedSalary
			$this->expectedSalary->ViewValue = $this->expectedSalary->CurrentValue;
			$this->expectedSalary->ViewValue = FormatNumber($this->expectedSalary->ViewValue, 0, -2, -2, -2);
			$this->expectedSalary->ViewCustomAttributes = "";

			// preferedJobtype
			$this->preferedJobtype->ViewValue = $this->preferedJobtype->CurrentValue;
			$this->preferedJobtype->ViewCustomAttributes = "";

			// age
			$this->age->ViewValue = $this->age->CurrentValue;
			$this->age->ViewValue = FormatNumber($this->age->ViewValue, 0, -2, -2, -2);
			$this->age->ViewCustomAttributes = "";

			// hash
			$this->hash->ViewValue = $this->hash->CurrentValue;
			$this->hash->ViewCustomAttributes = "";

			// linkedInProfileLink
			$this->linkedInProfileLink->ViewValue = $this->linkedInProfileLink->CurrentValue;
			$this->linkedInProfileLink->ViewCustomAttributes = "";

			// linkedInProfileId
			$this->linkedInProfileId->ViewValue = $this->linkedInProfileId->CurrentValue;
			$this->linkedInProfileId->ViewCustomAttributes = "";

			// facebookProfileLink
			$this->facebookProfileLink->ViewValue = $this->facebookProfileLink->CurrentValue;
			$this->facebookProfileLink->ViewCustomAttributes = "";

			// facebookProfileId
			$this->facebookProfileId->ViewValue = $this->facebookProfileId->CurrentValue;
			$this->facebookProfileId->ViewCustomAttributes = "";

			// twitterProfileLink
			$this->twitterProfileLink->ViewValue = $this->twitterProfileLink->CurrentValue;
			$this->twitterProfileLink->ViewCustomAttributes = "";

			// twitterProfileId
			$this->twitterProfileId->ViewValue = $this->twitterProfileId->CurrentValue;
			$this->twitterProfileId->ViewCustomAttributes = "";

			// googleProfileLink
			$this->googleProfileLink->ViewValue = $this->googleProfileLink->CurrentValue;
			$this->googleProfileLink->ViewCustomAttributes = "";

			// googleProfileId
			$this->googleProfileId->ViewValue = $this->googleProfileId->CurrentValue;
			$this->googleProfileId->ViewCustomAttributes = "";

			// id
			$this->id->LinkCustomAttributes = "";
			$this->id->HrefValue = "";
			$this->id->TooltipValue = "";

			// first_name
			$this->first_name->LinkCustomAttributes = "";
			$this->first_name->HrefValue = "";
			$this->first_name->TooltipValue = "";

			// last_name
			$this->last_name->LinkCustomAttributes = "";
			$this->last_name->HrefValue = "";
			$this->last_name->TooltipValue = "";

			// nationality
			$this->nationality->LinkCustomAttributes = "";
			$this->nationality->HrefValue = "";
			$this->nationality->TooltipValue = "";

			// birthday
			$this->birthday->LinkCustomAttributes = "";
			$this->birthday->HrefValue = "";
			$this->birthday->TooltipValue = "";

			// gender
			$this->gender->LinkCustomAttributes = "";
			$this->gender->HrefValue = "";
			$this->gender->TooltipValue = "";

			// marital_status
			$this->marital_status->LinkCustomAttributes = "";
			$this->marital_status->HrefValue = "";
			$this->marital_status->TooltipValue = "";

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

			// email
			$this->_email->LinkCustomAttributes = "";
			$this->_email->HrefValue = "";
			$this->_email->TooltipValue = "";

			// home_phone
			$this->home_phone->LinkCustomAttributes = "";
			$this->home_phone->HrefValue = "";
			$this->home_phone->TooltipValue = "";

			// mobile_phone
			$this->mobile_phone->LinkCustomAttributes = "";
			$this->mobile_phone->HrefValue = "";
			$this->mobile_phone->TooltipValue = "";

			// cv_title
			$this->cv_title->LinkCustomAttributes = "";
			$this->cv_title->HrefValue = "";
			$this->cv_title->TooltipValue = "";

			// cv
			$this->cv->LinkCustomAttributes = "";
			$this->cv->HrefValue = "";
			$this->cv->TooltipValue = "";

			// profileImage
			$this->profileImage->LinkCustomAttributes = "";
			$this->profileImage->HrefValue = "";
			$this->profileImage->TooltipValue = "";

			// totalYearsOfExperience
			$this->totalYearsOfExperience->LinkCustomAttributes = "";
			$this->totalYearsOfExperience->HrefValue = "";
			$this->totalYearsOfExperience->TooltipValue = "";

			// totalMonthsOfExperience
			$this->totalMonthsOfExperience->LinkCustomAttributes = "";
			$this->totalMonthsOfExperience->HrefValue = "";
			$this->totalMonthsOfExperience->TooltipValue = "";

			// generatedCVFile
			$this->generatedCVFile->LinkCustomAttributes = "";
			$this->generatedCVFile->HrefValue = "";
			$this->generatedCVFile->TooltipValue = "";

			// created
			$this->created->LinkCustomAttributes = "";
			$this->created->HrefValue = "";
			$this->created->TooltipValue = "";

			// updated
			$this->updated->LinkCustomAttributes = "";
			$this->updated->HrefValue = "";
			$this->updated->TooltipValue = "";

			// expectedSalary
			$this->expectedSalary->LinkCustomAttributes = "";
			$this->expectedSalary->HrefValue = "";
			$this->expectedSalary->TooltipValue = "";

			// preferedJobtype
			$this->preferedJobtype->LinkCustomAttributes = "";
			$this->preferedJobtype->HrefValue = "";
			$this->preferedJobtype->TooltipValue = "";

			// age
			$this->age->LinkCustomAttributes = "";
			$this->age->HrefValue = "";
			$this->age->TooltipValue = "";

			// hash
			$this->hash->LinkCustomAttributes = "";
			$this->hash->HrefValue = "";
			$this->hash->TooltipValue = "";

			// linkedInProfileLink
			$this->linkedInProfileLink->LinkCustomAttributes = "";
			$this->linkedInProfileLink->HrefValue = "";
			$this->linkedInProfileLink->TooltipValue = "";

			// linkedInProfileId
			$this->linkedInProfileId->LinkCustomAttributes = "";
			$this->linkedInProfileId->HrefValue = "";
			$this->linkedInProfileId->TooltipValue = "";

			// facebookProfileLink
			$this->facebookProfileLink->LinkCustomAttributes = "";
			$this->facebookProfileLink->HrefValue = "";
			$this->facebookProfileLink->TooltipValue = "";

			// facebookProfileId
			$this->facebookProfileId->LinkCustomAttributes = "";
			$this->facebookProfileId->HrefValue = "";
			$this->facebookProfileId->TooltipValue = "";

			// twitterProfileLink
			$this->twitterProfileLink->LinkCustomAttributes = "";
			$this->twitterProfileLink->HrefValue = "";
			$this->twitterProfileLink->TooltipValue = "";

			// twitterProfileId
			$this->twitterProfileId->LinkCustomAttributes = "";
			$this->twitterProfileId->HrefValue = "";
			$this->twitterProfileId->TooltipValue = "";

			// googleProfileLink
			$this->googleProfileLink->LinkCustomAttributes = "";
			$this->googleProfileLink->HrefValue = "";
			$this->googleProfileLink->TooltipValue = "";

			// googleProfileId
			$this->googleProfileId->LinkCustomAttributes = "";
			$this->googleProfileId->HrefValue = "";
			$this->googleProfileId->TooltipValue = "";
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
		$Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("recruitment_candidateslist.php"), "", $this->TableVar, TRUE);
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
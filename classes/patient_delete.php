<?php
namespace PHPMaker2019\HIMS;

/**
 * Page class
 */
class patient_delete extends patient
{

	// Page ID
	public $PageID = "delete";

	// Project ID
	public $ProjectID = "{EA4F6D13-AF8F-428D-9EA7-BA88D1107EC3}";

	// Table name
	public $TableName = 'patient';

	// Page object name
	public $PageObjName = "patient_delete";

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

		// Table object (patient)
		if (!isset($GLOBALS["patient"]) || get_class($GLOBALS["patient"]) == PROJECT_NAMESPACE . "patient") {
			$GLOBALS["patient"] = &$this;
			$GLOBALS["Table"] = &$GLOBALS["patient"];
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
			define(PROJECT_NAMESPACE . "TABLE_NAME", 'patient');

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
		global $EXPORT, $patient;
		if ($this->CustomExport && $this->CustomExport == $this->Export && array_key_exists($this->CustomExport, $EXPORT)) {
				$content = ob_get_contents();
			if ($ExportFileName == "")
				$ExportFileName = $this->TableVar;
			$class = PROJECT_NAMESPACE . $EXPORT[$this->CustomExport];
			if (class_exists($class)) {
				$doc = new $class($patient);
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
					$this->terminate(GetUrl("patientlist.php"));
				else
					$this->terminate(GetUrl("login.php"));
				return;
			}
		}
		$this->CurrentAction = Param("action"); // Set up current action
		$this->id->setVisibility();
		$this->PatientID->setVisibility();
		$this->title->setVisibility();
		$this->first_name->setVisibility();
		$this->middle_name->Visible = FALSE;
		$this->last_name->Visible = FALSE;
		$this->gender->setVisibility();
		$this->dob->setVisibility();
		$this->Age->setVisibility();
		$this->blood_group->setVisibility();
		$this->mobile_no->setVisibility();
		$this->description->Visible = FALSE;
		$this->status->setVisibility();
		$this->createdby->Visible = FALSE;
		$this->createddatetime->setVisibility();
		$this->modifiedby->Visible = FALSE;
		$this->modifieddatetime->Visible = FALSE;
		$this->profilePic->setVisibility();
		$this->IdentificationMark->setVisibility();
		$this->Religion->setVisibility();
		$this->Nationality->setVisibility();
		$this->ReferedByDr->setVisibility();
		$this->ReferClinicname->setVisibility();
		$this->ReferCity->setVisibility();
		$this->ReferMobileNo->setVisibility();
		$this->ReferA4TreatingConsultant->setVisibility();
		$this->PurposreReferredfor->setVisibility();
		$this->spouse_title->setVisibility();
		$this->spouse_first_name->setVisibility();
		$this->spouse_middle_name->setVisibility();
		$this->spouse_last_name->setVisibility();
		$this->spouse_gender->setVisibility();
		$this->spouse_dob->setVisibility();
		$this->spouse_Age->setVisibility();
		$this->spouse_blood_group->setVisibility();
		$this->spouse_mobile_no->setVisibility();
		$this->Maritalstatus->setVisibility();
		$this->Business->setVisibility();
		$this->Patient_Language->setVisibility();
		$this->Passport->setVisibility();
		$this->VisaNo->setVisibility();
		$this->ValidityOfVisa->setVisibility();
		$this->WhereDidYouHear->setVisibility();
		$this->HospID->setVisibility();
		$this->street->setVisibility();
		$this->town->setVisibility();
		$this->province->setVisibility();
		$this->country->setVisibility();
		$this->postal_code->setVisibility();
		$this->PEmail->setVisibility();
		$this->PEmergencyContact->setVisibility();
		$this->occupation->setVisibility();
		$this->spouse_occupation->setVisibility();
		$this->WhatsApp->setVisibility();
		$this->CouppleID->setVisibility();
		$this->MaleID->setVisibility();
		$this->FemaleID->setVisibility();
		$this->GroupID->setVisibility();
		$this->Relationship->setVisibility();
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
		$this->setupLookupOptions($this->title);
		$this->setupLookupOptions($this->gender);
		$this->setupLookupOptions($this->blood_group);
		$this->setupLookupOptions($this->status);
		$this->setupLookupOptions($this->ReferedByDr);
		$this->setupLookupOptions($this->ReferA4TreatingConsultant);
		$this->setupLookupOptions($this->spouse_title);
		$this->setupLookupOptions($this->spouse_gender);
		$this->setupLookupOptions($this->spouse_blood_group);
		$this->setupLookupOptions($this->Maritalstatus);
		$this->setupLookupOptions($this->Business);
		$this->setupLookupOptions($this->Patient_Language);
		$this->setupLookupOptions($this->WhereDidYouHear);
		$this->setupLookupOptions($this->HospID);

		// Set up Breadcrumb
		$this->setupBreadcrumb();

		// Load key parameters
		$this->RecKeys = $this->getRecordKeys(); // Load record keys
		$filter = $this->getFilterFromRecordKeys();
		if ($filter == "") {
			$this->terminate("patientlist.php"); // Prevent SQL injection, return to list
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
				$this->terminate("patientlist.php"); // Return to list
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
		$this->PatientID->setDbValue($row['PatientID']);
		$this->title->setDbValue($row['title']);
		$this->first_name->setDbValue($row['first_name']);
		$this->middle_name->setDbValue($row['middle_name']);
		$this->last_name->setDbValue($row['last_name']);
		$this->gender->setDbValue($row['gender']);
		$this->dob->setDbValue($row['dob']);
		$this->Age->setDbValue($row['Age']);
		$this->blood_group->setDbValue($row['blood_group']);
		$this->mobile_no->setDbValue($row['mobile_no']);
		$this->description->setDbValue($row['description']);
		$this->status->setDbValue($row['status']);
		$this->createdby->setDbValue($row['createdby']);
		$this->createddatetime->setDbValue($row['createddatetime']);
		$this->modifiedby->setDbValue($row['modifiedby']);
		$this->modifieddatetime->setDbValue($row['modifieddatetime']);
		$this->profilePic->Upload->DbValue = $row['profilePic'];
		$this->profilePic->setDbValue($this->profilePic->Upload->DbValue);
		$this->IdentificationMark->setDbValue($row['IdentificationMark']);
		$this->Religion->setDbValue($row['Religion']);
		$this->Nationality->setDbValue($row['Nationality']);
		$this->ReferedByDr->setDbValue($row['ReferedByDr']);
		if (array_key_exists('EV__ReferedByDr', $rs->fields)) {
			$this->ReferedByDr->VirtualValue = $rs->fields('EV__ReferedByDr'); // Set up virtual field value
		} else {
			$this->ReferedByDr->VirtualValue = ""; // Clear value
		}
		$this->ReferClinicname->setDbValue($row['ReferClinicname']);
		$this->ReferCity->setDbValue($row['ReferCity']);
		$this->ReferMobileNo->setDbValue($row['ReferMobileNo']);
		$this->ReferA4TreatingConsultant->setDbValue($row['ReferA4TreatingConsultant']);
		if (array_key_exists('EV__ReferA4TreatingConsultant', $rs->fields)) {
			$this->ReferA4TreatingConsultant->VirtualValue = $rs->fields('EV__ReferA4TreatingConsultant'); // Set up virtual field value
		} else {
			$this->ReferA4TreatingConsultant->VirtualValue = ""; // Clear value
		}
		$this->PurposreReferredfor->setDbValue($row['PurposreReferredfor']);
		$this->spouse_title->setDbValue($row['spouse_title']);
		$this->spouse_first_name->setDbValue($row['spouse_first_name']);
		$this->spouse_middle_name->setDbValue($row['spouse_middle_name']);
		$this->spouse_last_name->setDbValue($row['spouse_last_name']);
		$this->spouse_gender->setDbValue($row['spouse_gender']);
		$this->spouse_dob->setDbValue($row['spouse_dob']);
		$this->spouse_Age->setDbValue($row['spouse_Age']);
		$this->spouse_blood_group->setDbValue($row['spouse_blood_group']);
		$this->spouse_mobile_no->setDbValue($row['spouse_mobile_no']);
		$this->Maritalstatus->setDbValue($row['Maritalstatus']);
		$this->Business->setDbValue($row['Business']);
		$this->Patient_Language->setDbValue($row['Patient_Language']);
		$this->Passport->setDbValue($row['Passport']);
		$this->VisaNo->setDbValue($row['VisaNo']);
		$this->ValidityOfVisa->setDbValue($row['ValidityOfVisa']);
		$this->WhereDidYouHear->setDbValue($row['WhereDidYouHear']);
		$this->HospID->setDbValue($row['HospID']);
		$this->street->setDbValue($row['street']);
		$this->town->setDbValue($row['town']);
		$this->province->setDbValue($row['province']);
		$this->country->setDbValue($row['country']);
		$this->postal_code->setDbValue($row['postal_code']);
		$this->PEmail->setDbValue($row['PEmail']);
		$this->PEmergencyContact->setDbValue($row['PEmergencyContact']);
		$this->occupation->setDbValue($row['occupation']);
		$this->spouse_occupation->setDbValue($row['spouse_occupation']);
		$this->WhatsApp->setDbValue($row['WhatsApp']);
		$this->CouppleID->setDbValue($row['CouppleID']);
		$this->MaleID->setDbValue($row['MaleID']);
		$this->FemaleID->setDbValue($row['FemaleID']);
		$this->GroupID->setDbValue($row['GroupID']);
		$this->Relationship->setDbValue($row['Relationship']);
	}

	// Return a row with default values
	protected function newRow()
	{
		$row = [];
		$row['id'] = NULL;
		$row['PatientID'] = NULL;
		$row['title'] = NULL;
		$row['first_name'] = NULL;
		$row['middle_name'] = NULL;
		$row['last_name'] = NULL;
		$row['gender'] = NULL;
		$row['dob'] = NULL;
		$row['Age'] = NULL;
		$row['blood_group'] = NULL;
		$row['mobile_no'] = NULL;
		$row['description'] = NULL;
		$row['status'] = NULL;
		$row['createdby'] = NULL;
		$row['createddatetime'] = NULL;
		$row['modifiedby'] = NULL;
		$row['modifieddatetime'] = NULL;
		$row['profilePic'] = NULL;
		$row['IdentificationMark'] = NULL;
		$row['Religion'] = NULL;
		$row['Nationality'] = NULL;
		$row['ReferedByDr'] = NULL;
		$row['ReferClinicname'] = NULL;
		$row['ReferCity'] = NULL;
		$row['ReferMobileNo'] = NULL;
		$row['ReferA4TreatingConsultant'] = NULL;
		$row['PurposreReferredfor'] = NULL;
		$row['spouse_title'] = NULL;
		$row['spouse_first_name'] = NULL;
		$row['spouse_middle_name'] = NULL;
		$row['spouse_last_name'] = NULL;
		$row['spouse_gender'] = NULL;
		$row['spouse_dob'] = NULL;
		$row['spouse_Age'] = NULL;
		$row['spouse_blood_group'] = NULL;
		$row['spouse_mobile_no'] = NULL;
		$row['Maritalstatus'] = NULL;
		$row['Business'] = NULL;
		$row['Patient_Language'] = NULL;
		$row['Passport'] = NULL;
		$row['VisaNo'] = NULL;
		$row['ValidityOfVisa'] = NULL;
		$row['WhereDidYouHear'] = NULL;
		$row['HospID'] = NULL;
		$row['street'] = NULL;
		$row['town'] = NULL;
		$row['province'] = NULL;
		$row['country'] = NULL;
		$row['postal_code'] = NULL;
		$row['PEmail'] = NULL;
		$row['PEmergencyContact'] = NULL;
		$row['occupation'] = NULL;
		$row['spouse_occupation'] = NULL;
		$row['WhatsApp'] = NULL;
		$row['CouppleID'] = NULL;
		$row['MaleID'] = NULL;
		$row['FemaleID'] = NULL;
		$row['GroupID'] = NULL;
		$row['Relationship'] = NULL;
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
		// PatientID
		// title
		// first_name
		// middle_name
		// last_name
		// gender
		// dob
		// Age
		// blood_group
		// mobile_no
		// description
		// status
		// createdby
		// createddatetime
		// modifiedby
		// modifieddatetime
		// profilePic
		// IdentificationMark
		// Religion
		// Nationality
		// ReferedByDr
		// ReferClinicname
		// ReferCity
		// ReferMobileNo
		// ReferA4TreatingConsultant
		// PurposreReferredfor
		// spouse_title
		// spouse_first_name
		// spouse_middle_name
		// spouse_last_name
		// spouse_gender
		// spouse_dob
		// spouse_Age
		// spouse_blood_group
		// spouse_mobile_no
		// Maritalstatus
		// Business
		// Patient_Language
		// Passport
		// VisaNo
		// ValidityOfVisa
		// WhereDidYouHear
		// HospID
		// street
		// town
		// province
		// country
		// postal_code
		// PEmail
		// PEmergencyContact
		// occupation
		// spouse_occupation
		// WhatsApp
		// CouppleID
		// MaleID
		// FemaleID
		// GroupID
		// Relationship

		if ($this->RowType == ROWTYPE_VIEW) { // View row

			// id
			$this->id->ViewValue = $this->id->CurrentValue;
			$this->id->ViewCustomAttributes = "";

			// PatientID
			$this->PatientID->ViewValue = $this->PatientID->CurrentValue;
			$this->PatientID->ViewCustomAttributes = "";

			// title
			$curVal = strval($this->title->CurrentValue);
			if ($curVal <> "") {
				$this->title->ViewValue = $this->title->lookupCacheOption($curVal);
				if ($this->title->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
					$sqlWrk = $this->title->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = $rswrk->fields('df');
						$this->title->ViewValue = $this->title->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->title->ViewValue = $this->title->CurrentValue;
					}
				}
			} else {
				$this->title->ViewValue = NULL;
			}
			$this->title->ViewCustomAttributes = "";

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

			// dob
			$this->dob->ViewValue = $this->dob->CurrentValue;
			$this->dob->ViewValue = FormatDateTime($this->dob->ViewValue, 7);
			$this->dob->ViewCustomAttributes = "";

			// Age
			$this->Age->ViewValue = $this->Age->CurrentValue;
			$this->Age->ViewCustomAttributes = "";

			// blood_group
			$curVal = strval($this->blood_group->CurrentValue);
			if ($curVal <> "") {
				$this->blood_group->ViewValue = $this->blood_group->lookupCacheOption($curVal);
				if ($this->blood_group->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`BloodGroup`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->blood_group->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = $rswrk->fields('df');
						$this->blood_group->ViewValue = $this->blood_group->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->blood_group->ViewValue = $this->blood_group->CurrentValue;
					}
				}
			} else {
				$this->blood_group->ViewValue = NULL;
			}
			$this->blood_group->ViewCustomAttributes = "";

			// mobile_no
			$this->mobile_no->ViewValue = $this->mobile_no->CurrentValue;
			$this->mobile_no->ViewCustomAttributes = "";

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

			// createddatetime
			$this->createddatetime->ViewValue = $this->createddatetime->CurrentValue;
			$this->createddatetime->ViewValue = FormatDateTime($this->createddatetime->ViewValue, 0);
			$this->createddatetime->ViewCustomAttributes = "";

			// profilePic
			if (!EmptyValue($this->profilePic->Upload->DbValue)) {
				$this->profilePic->ImageWidth = 80;
				$this->profilePic->ImageHeight = 80;
				$this->profilePic->ImageAlt = $this->profilePic->alt();
				$this->profilePic->ViewValue = $this->profilePic->Upload->DbValue;
			} else {
				$this->profilePic->ViewValue = "";
			}
			$this->profilePic->ViewCustomAttributes = "";

			// IdentificationMark
			$this->IdentificationMark->ViewValue = $this->IdentificationMark->CurrentValue;
			$this->IdentificationMark->ViewCustomAttributes = "";

			// Religion
			$this->Religion->ViewValue = $this->Religion->CurrentValue;
			$this->Religion->ViewCustomAttributes = "";

			// Nationality
			$this->Nationality->ViewValue = $this->Nationality->CurrentValue;
			$this->Nationality->ViewCustomAttributes = "";

			// ReferedByDr
			if ($this->ReferedByDr->VirtualValue <> "") {
				$this->ReferedByDr->ViewValue = $this->ReferedByDr->VirtualValue;
			} else {
			$curVal = strval($this->ReferedByDr->CurrentValue);
			if ($curVal <> "") {
				$this->ReferedByDr->ViewValue = $this->ReferedByDr->lookupCacheOption($curVal);
				if ($this->ReferedByDr->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`reference`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->ReferedByDr->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = $rswrk->fields('df');
						$this->ReferedByDr->ViewValue = $this->ReferedByDr->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->ReferedByDr->ViewValue = $this->ReferedByDr->CurrentValue;
					}
				}
			} else {
				$this->ReferedByDr->ViewValue = NULL;
			}
			}
			$this->ReferedByDr->ViewCustomAttributes = "";

			// ReferClinicname
			$this->ReferClinicname->ViewValue = $this->ReferClinicname->CurrentValue;
			$this->ReferClinicname->ViewCustomAttributes = "";

			// ReferCity
			$this->ReferCity->ViewValue = $this->ReferCity->CurrentValue;
			$this->ReferCity->ViewCustomAttributes = "";

			// ReferMobileNo
			$this->ReferMobileNo->ViewValue = $this->ReferMobileNo->CurrentValue;
			$this->ReferMobileNo->ViewCustomAttributes = "";

			// ReferA4TreatingConsultant
			if ($this->ReferA4TreatingConsultant->VirtualValue <> "") {
				$this->ReferA4TreatingConsultant->ViewValue = $this->ReferA4TreatingConsultant->VirtualValue;
			} else {
			$curVal = strval($this->ReferA4TreatingConsultant->CurrentValue);
			if ($curVal <> "") {
				$this->ReferA4TreatingConsultant->ViewValue = $this->ReferA4TreatingConsultant->lookupCacheOption($curVal);
				if ($this->ReferA4TreatingConsultant->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`NAME`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->ReferA4TreatingConsultant->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = $rswrk->fields('df');
						$this->ReferA4TreatingConsultant->ViewValue = $this->ReferA4TreatingConsultant->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->ReferA4TreatingConsultant->ViewValue = $this->ReferA4TreatingConsultant->CurrentValue;
					}
				}
			} else {
				$this->ReferA4TreatingConsultant->ViewValue = NULL;
			}
			}
			$this->ReferA4TreatingConsultant->ViewCustomAttributes = "";

			// PurposreReferredfor
			$this->PurposreReferredfor->ViewValue = $this->PurposreReferredfor->CurrentValue;
			$this->PurposreReferredfor->ViewCustomAttributes = "";

			// spouse_title
			$curVal = strval($this->spouse_title->CurrentValue);
			if ($curVal <> "") {
				$this->spouse_title->ViewValue = $this->spouse_title->lookupCacheOption($curVal);
				if ($this->spouse_title->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->spouse_title->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = $rswrk->fields('df');
						$this->spouse_title->ViewValue = $this->spouse_title->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->spouse_title->ViewValue = $this->spouse_title->CurrentValue;
					}
				}
			} else {
				$this->spouse_title->ViewValue = NULL;
			}
			$this->spouse_title->ViewCustomAttributes = "";

			// spouse_first_name
			$this->spouse_first_name->ViewValue = $this->spouse_first_name->CurrentValue;
			$this->spouse_first_name->ViewCustomAttributes = "";

			// spouse_middle_name
			$this->spouse_middle_name->ViewValue = $this->spouse_middle_name->CurrentValue;
			$this->spouse_middle_name->ViewCustomAttributes = "";

			// spouse_last_name
			$this->spouse_last_name->ViewValue = $this->spouse_last_name->CurrentValue;
			$this->spouse_last_name->ViewCustomAttributes = "";

			// spouse_gender
			$curVal = strval($this->spouse_gender->CurrentValue);
			if ($curVal <> "") {
				$this->spouse_gender->ViewValue = $this->spouse_gender->lookupCacheOption($curVal);
				if ($this->spouse_gender->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->spouse_gender->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = $rswrk->fields('df');
						$this->spouse_gender->ViewValue = $this->spouse_gender->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->spouse_gender->ViewValue = $this->spouse_gender->CurrentValue;
					}
				}
			} else {
				$this->spouse_gender->ViewValue = NULL;
			}
			$this->spouse_gender->ViewCustomAttributes = "";

			// spouse_dob
			$this->spouse_dob->ViewValue = $this->spouse_dob->CurrentValue;
			$this->spouse_dob->ViewValue = FormatDateTime($this->spouse_dob->ViewValue, 7);
			$this->spouse_dob->ViewCustomAttributes = "";

			// spouse_Age
			$this->spouse_Age->ViewValue = $this->spouse_Age->CurrentValue;
			$this->spouse_Age->ViewCustomAttributes = "";

			// spouse_blood_group
			$curVal = strval($this->spouse_blood_group->CurrentValue);
			if ($curVal <> "") {
				$this->spouse_blood_group->ViewValue = $this->spouse_blood_group->lookupCacheOption($curVal);
				if ($this->spouse_blood_group->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`BloodGroup`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->spouse_blood_group->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = $rswrk->fields('df');
						$this->spouse_blood_group->ViewValue = $this->spouse_blood_group->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->spouse_blood_group->ViewValue = $this->spouse_blood_group->CurrentValue;
					}
				}
			} else {
				$this->spouse_blood_group->ViewValue = NULL;
			}
			$this->spouse_blood_group->ViewCustomAttributes = "";

			// spouse_mobile_no
			$this->spouse_mobile_no->ViewValue = $this->spouse_mobile_no->CurrentValue;
			$this->spouse_mobile_no->ViewCustomAttributes = "";

			// Maritalstatus
			$curVal = strval($this->Maritalstatus->CurrentValue);
			if ($curVal <> "") {
				$this->Maritalstatus->ViewValue = $this->Maritalstatus->lookupCacheOption($curVal);
				if ($this->Maritalstatus->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`MaritalStatus`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->Maritalstatus->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = $rswrk->fields('df');
						$this->Maritalstatus->ViewValue = $this->Maritalstatus->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->Maritalstatus->ViewValue = $this->Maritalstatus->CurrentValue;
					}
				}
			} else {
				$this->Maritalstatus->ViewValue = NULL;
			}
			$this->Maritalstatus->ViewCustomAttributes = "";

			// Business
			$this->Business->ViewValue = $this->Business->CurrentValue;
			$curVal = strval($this->Business->CurrentValue);
			if ($curVal <> "") {
				$this->Business->ViewValue = $this->Business->lookupCacheOption($curVal);
				if ($this->Business->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Job`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->Business->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = $rswrk->fields('df');
						$this->Business->ViewValue = $this->Business->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->Business->ViewValue = $this->Business->CurrentValue;
					}
				}
			} else {
				$this->Business->ViewValue = NULL;
			}
			$this->Business->ViewCustomAttributes = "";

			// Patient_Language
			$curVal = strval($this->Patient_Language->CurrentValue);
			if ($curVal <> "") {
				$this->Patient_Language->ViewValue = $this->Patient_Language->lookupCacheOption($curVal);
				if ($this->Patient_Language->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Language`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->Patient_Language->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = $rswrk->fields('df');
						$this->Patient_Language->ViewValue = $this->Patient_Language->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->Patient_Language->ViewValue = $this->Patient_Language->CurrentValue;
					}
				}
			} else {
				$this->Patient_Language->ViewValue = NULL;
			}
			$this->Patient_Language->ViewCustomAttributes = "";

			// Passport
			$this->Passport->ViewValue = $this->Passport->CurrentValue;
			$this->Passport->ViewCustomAttributes = "";

			// VisaNo
			$this->VisaNo->ViewValue = $this->VisaNo->CurrentValue;
			$this->VisaNo->ViewCustomAttributes = "";

			// ValidityOfVisa
			$this->ValidityOfVisa->ViewValue = $this->ValidityOfVisa->CurrentValue;
			$this->ValidityOfVisa->ViewCustomAttributes = "";

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
			$curVal = strval($this->HospID->CurrentValue);
			if ($curVal <> "") {
				$this->HospID->ViewValue = $this->HospID->lookupCacheOption($curVal);
				if ($this->HospID->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
					$sqlWrk = $this->HospID->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = $rswrk->fields('df');
						$this->HospID->ViewValue = $this->HospID->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->HospID->ViewValue = $this->HospID->CurrentValue;
					}
				}
			} else {
				$this->HospID->ViewValue = NULL;
			}
			$this->HospID->ViewCustomAttributes = "";

			// street
			$this->street->ViewValue = $this->street->CurrentValue;
			$this->street->ViewCustomAttributes = "";

			// town
			$this->town->ViewValue = $this->town->CurrentValue;
			$this->town->ViewCustomAttributes = "";

			// province
			$this->province->ViewValue = $this->province->CurrentValue;
			$this->province->ViewCustomAttributes = "";

			// country
			$this->country->ViewValue = $this->country->CurrentValue;
			$this->country->ViewCustomAttributes = "";

			// postal_code
			$this->postal_code->ViewValue = $this->postal_code->CurrentValue;
			$this->postal_code->ViewCustomAttributes = "";

			// PEmail
			$this->PEmail->ViewValue = $this->PEmail->CurrentValue;
			$this->PEmail->ViewCustomAttributes = "";

			// PEmergencyContact
			$this->PEmergencyContact->ViewValue = $this->PEmergencyContact->CurrentValue;
			$this->PEmergencyContact->ViewCustomAttributes = "";

			// occupation
			$this->occupation->ViewValue = $this->occupation->CurrentValue;
			$this->occupation->ViewCustomAttributes = "";

			// spouse_occupation
			$this->spouse_occupation->ViewValue = $this->spouse_occupation->CurrentValue;
			$this->spouse_occupation->ViewCustomAttributes = "";

			// WhatsApp
			$this->WhatsApp->ViewValue = $this->WhatsApp->CurrentValue;
			$this->WhatsApp->ViewCustomAttributes = "";

			// CouppleID
			$this->CouppleID->ViewValue = $this->CouppleID->CurrentValue;
			$this->CouppleID->ViewValue = FormatNumber($this->CouppleID->ViewValue, 0, -2, -2, -2);
			$this->CouppleID->ViewCustomAttributes = "";

			// MaleID
			$this->MaleID->ViewValue = $this->MaleID->CurrentValue;
			$this->MaleID->ViewValue = FormatNumber($this->MaleID->ViewValue, 0, -2, -2, -2);
			$this->MaleID->ViewCustomAttributes = "";

			// FemaleID
			$this->FemaleID->ViewValue = $this->FemaleID->CurrentValue;
			$this->FemaleID->ViewValue = FormatNumber($this->FemaleID->ViewValue, 0, -2, -2, -2);
			$this->FemaleID->ViewCustomAttributes = "";

			// GroupID
			$this->GroupID->ViewValue = $this->GroupID->CurrentValue;
			$this->GroupID->ViewValue = FormatNumber($this->GroupID->ViewValue, 0, -2, -2, -2);
			$this->GroupID->ViewCustomAttributes = "";

			// Relationship
			$this->Relationship->ViewValue = $this->Relationship->CurrentValue;
			$this->Relationship->ViewCustomAttributes = "";

			// id
			$this->id->LinkCustomAttributes = "";
			$this->id->HrefValue = "";
			$this->id->TooltipValue = "";

			// PatientID
			$this->PatientID->LinkCustomAttributes = "";
			$this->PatientID->HrefValue = "";
			$this->PatientID->TooltipValue = "";

			// title
			$this->title->LinkCustomAttributes = "";
			$this->title->HrefValue = "";
			$this->title->TooltipValue = "";

			// first_name
			$this->first_name->LinkCustomAttributes = "";
			$this->first_name->HrefValue = "";
			$this->first_name->TooltipValue = "";

			// gender
			$this->gender->LinkCustomAttributes = "";
			$this->gender->HrefValue = "";
			$this->gender->TooltipValue = "";

			// dob
			$this->dob->LinkCustomAttributes = "";
			$this->dob->HrefValue = "";
			$this->dob->TooltipValue = "";

			// Age
			$this->Age->LinkCustomAttributes = "";
			$this->Age->HrefValue = "";
			$this->Age->TooltipValue = "";

			// blood_group
			$this->blood_group->LinkCustomAttributes = "";
			$this->blood_group->HrefValue = "";
			$this->blood_group->TooltipValue = "";

			// mobile_no
			$this->mobile_no->LinkCustomAttributes = "";
			$this->mobile_no->HrefValue = "";
			$this->mobile_no->TooltipValue = "";

			// status
			$this->status->LinkCustomAttributes = "";
			$this->status->HrefValue = "";
			$this->status->TooltipValue = "";

			// createddatetime
			$this->createddatetime->LinkCustomAttributes = "";
			$this->createddatetime->HrefValue = "";
			$this->createddatetime->TooltipValue = "";

			// profilePic
			$this->profilePic->LinkCustomAttributes = "";
			if (!EmptyValue($this->profilePic->Upload->DbValue)) {
				$this->profilePic->HrefValue = GetFileUploadUrl($this->profilePic, $this->profilePic->Upload->DbValue); // Add prefix/suffix
				$this->profilePic->LinkAttrs["target"] = ""; // Add target
				if ($this->isExport()) $this->profilePic->HrefValue = FullUrl($this->profilePic->HrefValue, "href");
			} else {
				$this->profilePic->HrefValue = "";
			}
			$this->profilePic->ExportHrefValue = $this->profilePic->UploadPath . $this->profilePic->Upload->DbValue;
			$this->profilePic->TooltipValue = "";
			if ($this->profilePic->UseColorbox) {
				if (EmptyValue($this->profilePic->TooltipValue))
					$this->profilePic->LinkAttrs["title"] = $Language->phrase("ViewImageGallery");
				$this->profilePic->LinkAttrs["data-rel"] = "patient_x_profilePic";
				AppendClass($this->profilePic->LinkAttrs["class"], "ew-lightbox");
			}

			// IdentificationMark
			$this->IdentificationMark->LinkCustomAttributes = "";
			$this->IdentificationMark->HrefValue = "";
			$this->IdentificationMark->TooltipValue = "";

			// Religion
			$this->Religion->LinkCustomAttributes = "";
			$this->Religion->HrefValue = "";
			$this->Religion->TooltipValue = "";

			// Nationality
			$this->Nationality->LinkCustomAttributes = "";
			$this->Nationality->HrefValue = "";
			$this->Nationality->TooltipValue = "";

			// ReferedByDr
			$this->ReferedByDr->LinkCustomAttributes = "";
			$this->ReferedByDr->HrefValue = "";
			$this->ReferedByDr->TooltipValue = "";

			// ReferClinicname
			$this->ReferClinicname->LinkCustomAttributes = "";
			$this->ReferClinicname->HrefValue = "";
			$this->ReferClinicname->TooltipValue = "";

			// ReferCity
			$this->ReferCity->LinkCustomAttributes = "";
			$this->ReferCity->HrefValue = "";
			$this->ReferCity->TooltipValue = "";

			// ReferMobileNo
			$this->ReferMobileNo->LinkCustomAttributes = "";
			$this->ReferMobileNo->HrefValue = "";
			$this->ReferMobileNo->TooltipValue = "";

			// ReferA4TreatingConsultant
			$this->ReferA4TreatingConsultant->LinkCustomAttributes = "";
			$this->ReferA4TreatingConsultant->HrefValue = "";
			$this->ReferA4TreatingConsultant->TooltipValue = "";

			// PurposreReferredfor
			$this->PurposreReferredfor->LinkCustomAttributes = "";
			$this->PurposreReferredfor->HrefValue = "";
			$this->PurposreReferredfor->TooltipValue = "";

			// spouse_title
			$this->spouse_title->LinkCustomAttributes = "";
			$this->spouse_title->HrefValue = "";
			$this->spouse_title->TooltipValue = "";

			// spouse_first_name
			$this->spouse_first_name->LinkCustomAttributes = "";
			$this->spouse_first_name->HrefValue = "";
			$this->spouse_first_name->TooltipValue = "";

			// spouse_middle_name
			$this->spouse_middle_name->LinkCustomAttributes = "";
			$this->spouse_middle_name->HrefValue = "";
			$this->spouse_middle_name->TooltipValue = "";

			// spouse_last_name
			$this->spouse_last_name->LinkCustomAttributes = "";
			$this->spouse_last_name->HrefValue = "";
			$this->spouse_last_name->TooltipValue = "";

			// spouse_gender
			$this->spouse_gender->LinkCustomAttributes = "";
			$this->spouse_gender->HrefValue = "";
			$this->spouse_gender->TooltipValue = "";

			// spouse_dob
			$this->spouse_dob->LinkCustomAttributes = "";
			$this->spouse_dob->HrefValue = "";
			$this->spouse_dob->TooltipValue = "";

			// spouse_Age
			$this->spouse_Age->LinkCustomAttributes = "";
			$this->spouse_Age->HrefValue = "";
			$this->spouse_Age->TooltipValue = "";

			// spouse_blood_group
			$this->spouse_blood_group->LinkCustomAttributes = "";
			$this->spouse_blood_group->HrefValue = "";
			$this->spouse_blood_group->TooltipValue = "";

			// spouse_mobile_no
			$this->spouse_mobile_no->LinkCustomAttributes = "";
			$this->spouse_mobile_no->HrefValue = "";
			$this->spouse_mobile_no->TooltipValue = "";

			// Maritalstatus
			$this->Maritalstatus->LinkCustomAttributes = "";
			$this->Maritalstatus->HrefValue = "";
			$this->Maritalstatus->TooltipValue = "";

			// Business
			$this->Business->LinkCustomAttributes = "";
			$this->Business->HrefValue = "";
			$this->Business->TooltipValue = "";

			// Patient_Language
			$this->Patient_Language->LinkCustomAttributes = "";
			$this->Patient_Language->HrefValue = "";
			$this->Patient_Language->TooltipValue = "";

			// Passport
			$this->Passport->LinkCustomAttributes = "";
			$this->Passport->HrefValue = "";
			$this->Passport->TooltipValue = "";

			// VisaNo
			$this->VisaNo->LinkCustomAttributes = "";
			$this->VisaNo->HrefValue = "";
			$this->VisaNo->TooltipValue = "";

			// ValidityOfVisa
			$this->ValidityOfVisa->LinkCustomAttributes = "";
			$this->ValidityOfVisa->HrefValue = "";
			$this->ValidityOfVisa->TooltipValue = "";

			// WhereDidYouHear
			$this->WhereDidYouHear->LinkCustomAttributes = "";
			$this->WhereDidYouHear->HrefValue = "";
			$this->WhereDidYouHear->TooltipValue = "";

			// HospID
			$this->HospID->LinkCustomAttributes = "";
			$this->HospID->HrefValue = "";
			$this->HospID->TooltipValue = "";

			// street
			$this->street->LinkCustomAttributes = "";
			$this->street->HrefValue = "";
			$this->street->TooltipValue = "";

			// town
			$this->town->LinkCustomAttributes = "";
			$this->town->HrefValue = "";
			$this->town->TooltipValue = "";

			// province
			$this->province->LinkCustomAttributes = "";
			$this->province->HrefValue = "";
			$this->province->TooltipValue = "";

			// country
			$this->country->LinkCustomAttributes = "";
			$this->country->HrefValue = "";
			$this->country->TooltipValue = "";

			// postal_code
			$this->postal_code->LinkCustomAttributes = "";
			$this->postal_code->HrefValue = "";
			$this->postal_code->TooltipValue = "";

			// PEmail
			$this->PEmail->LinkCustomAttributes = "";
			$this->PEmail->HrefValue = "";
			$this->PEmail->TooltipValue = "";

			// PEmergencyContact
			$this->PEmergencyContact->LinkCustomAttributes = "";
			$this->PEmergencyContact->HrefValue = "";
			$this->PEmergencyContact->TooltipValue = "";

			// occupation
			$this->occupation->LinkCustomAttributes = "";
			$this->occupation->HrefValue = "";
			$this->occupation->TooltipValue = "";

			// spouse_occupation
			$this->spouse_occupation->LinkCustomAttributes = "";
			$this->spouse_occupation->HrefValue = "";
			$this->spouse_occupation->TooltipValue = "";

			// WhatsApp
			$this->WhatsApp->LinkCustomAttributes = "";
			$this->WhatsApp->HrefValue = "";
			$this->WhatsApp->TooltipValue = "";

			// CouppleID
			$this->CouppleID->LinkCustomAttributes = "";
			$this->CouppleID->HrefValue = "";
			$this->CouppleID->TooltipValue = "";

			// MaleID
			$this->MaleID->LinkCustomAttributes = "";
			$this->MaleID->HrefValue = "";
			$this->MaleID->TooltipValue = "";

			// FemaleID
			$this->FemaleID->LinkCustomAttributes = "";
			$this->FemaleID->HrefValue = "";
			$this->FemaleID->TooltipValue = "";

			// GroupID
			$this->GroupID->LinkCustomAttributes = "";
			$this->GroupID->HrefValue = "";
			$this->GroupID->TooltipValue = "";

			// Relationship
			$this->Relationship->LinkCustomAttributes = "";
			$this->Relationship->HrefValue = "";
			$this->Relationship->TooltipValue = "";
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
		$Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("patientlist.php"), "", $this->TableVar, TRUE);
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
						case "x_title":
							break;
						case "x_gender":
							break;
						case "x_blood_group":
							break;
						case "x_status":
							break;
						case "x_ReferedByDr":
							break;
						case "x_ReferA4TreatingConsultant":
							break;
						case "x_spouse_title":
							break;
						case "x_spouse_gender":
							break;
						case "x_spouse_blood_group":
							break;
						case "x_Maritalstatus":
							break;
						case "x_Business":
							break;
						case "x_Patient_Language":
							break;
						case "x_WhereDidYouHear":
							break;
						case "x_HospID":
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
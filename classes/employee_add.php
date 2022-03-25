<?php
namespace PHPMaker2019\HIMS;

/**
 * Page class
 */
class employee_add extends employee
{

	// Page ID
	public $PageID = "add";

	// Project ID
	public $ProjectID = "{EA4F6D13-AF8F-428D-9EA7-BA88D1107EC3}";

	// Table name
	public $TableName = 'employee';

	// Page object name
	public $PageObjName = "employee_add";

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
			define(PROJECT_NAMESPACE . "PAGE_ID", 'add');

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

			// Handle modal response
			if ($this->IsModal) { // Show as modal
				$row = array("url" => $url, "modal" => "1");
				$pageName = GetPageName($url);
				if ($pageName != $this->getListUrl()) { // Not List page
					$row["caption"] = $this->getModalCaption($pageName);
					if ($pageName == "employeeview.php")
						$row["view"] = "1";
				} else { // List page should not be shown as modal => error
					$row["error"] = $this->getFailureMessage();
					$this->clearFailureMessage();
				}
				WriteJson($row);
			} else {
				SaveDebugMessage();
				AddHeader("Location", $url);
			}
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
	public $FormClassName = "ew-horizontal ew-form ew-add-form";
	public $IsModal = FALSE;
	public $IsMobileOrModal = FALSE;
	public $DbMasterFilter = "";
	public $DbDetailFilter = "";
	public $StartRec;
	public $Priv = 0;
	public $OldRecordset;
	public $CopyRecord;
	public $MultiPages; // Multi pages object

	//
	// Page run
	//

	public function run()
	{
		global $ExportType, $CustomExportType, $ExportFileName, $UserProfile, $Language, $Security, $RequestSecurity, $CurrentForm,
			$FormError, $SkipHeaderFooter;

		// Init Session data for API request if token found
		if (IsApi() && session_status() !== PHP_SESSION_ACTIVE) {
			$func = PROJECT_NAMESPACE . CHECK_TOKEN_FUNC;
			if (is_callable($func) && Param(TOKEN_NAME) !== NULL && $func(Param(TOKEN_NAME), SessionTimeoutTime()))
				session_start();
		}

		// Is modal
		$this->IsModal = (Param("modal") == "1");

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
			if (!$Security->canAdd()) {
				$Security->saveLastUrl();
				$this->setFailureMessage(DeniedMessage()); // Set no permission
				if ($Security->canList())
					$this->terminate(GetUrl("employeelist.php"));
				else
					$this->terminate(GetUrl("login.php"));
				return;
			}
		}

		// Create form object
		$CurrentForm = new HttpForm();
		$this->CurrentAction = Param("action"); // Set up current action
		$this->id->Visible = FALSE;
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
		$this->notes->setVisibility();
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

		// Set up multi page object
		$this->setupMultiPages();

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

		// Check modal
		if ($this->IsModal)
			$SkipHeaderFooter = TRUE;
		$this->IsMobileOrModal = IsMobile() || $this->IsModal;
		$this->FormClassName = "ew-form ew-add-form ew-horizontal";
		$postBack = FALSE;

		// Set up current action
		if (IsApi()) {
			$this->CurrentAction = "insert"; // Add record directly
			$postBack = TRUE;
		} elseif (Post("action") !== NULL) {
			$this->CurrentAction = Post("action"); // Get form action
			$postBack = TRUE;
		} else { // Not post back

			// Load key values from QueryString
			$this->CopyRecord = TRUE;
			if (Get("id") !== NULL) {
				$this->id->setQueryStringValue(Get("id"));
				$this->setKey("id", $this->id->CurrentValue); // Set up key
			} else {
				$this->setKey("id", ""); // Clear key
				$this->CopyRecord = FALSE;
			}
			if ($this->CopyRecord) {
				$this->CurrentAction = "copy"; // Copy record
			} else {
				$this->CurrentAction = "show"; // Display blank record
			}
		}

		// Load old record / default values
		$loaded = $this->loadOldRecord();

		// Load form values
		if ($postBack) {
			$this->loadFormValues(); // Load form values
		}

		// Set up detail parameters
		$this->setupDetailParms();

		// Validate form if post back
		if ($postBack) {
			if (!$this->validateForm()) {
				$this->EventCancelled = TRUE; // Event cancelled
				$this->restoreFormValues(); // Restore form values
				$this->setFailureMessage($FormError);
				if (IsApi()) {
					$this->terminate();
					return;
				} else {
					$this->CurrentAction = "show"; // Form error, reset action
				}
			}
		}

		// Perform current action
		switch ($this->CurrentAction) {
			case "copy": // Copy an existing record
				if (!$loaded) { // Record not loaded
					if ($this->getFailureMessage() == "")
						$this->setFailureMessage($Language->phrase("NoRecord")); // No record found
					$this->terminate("employeelist.php"); // No matching record, return to list
				}

				// Set up detail parameters
				$this->setupDetailParms();
				break;
			case "insert": // Add new record
				$this->SendEmail = TRUE; // Send email on add success
				if ($this->addRow($this->OldRecordset)) { // Add successful
					if ($this->getSuccessMessage() == "")
						$this->setSuccessMessage($Language->phrase("AddSuccess")); // Set up success message
					if ($this->getCurrentDetailTable() <> "") // Master/detail add
						$returnUrl = $this->getDetailUrl();
					else
						$returnUrl = $this->getReturnUrl();
					if (GetPageName($returnUrl) == "employeelist.php")
						$returnUrl = $this->addMasterUrl($returnUrl); // List page, return to List page with correct master key if necessary
					elseif (GetPageName($returnUrl) == "employeeview.php")
						$returnUrl = $this->getViewUrl(); // View page, return to View page with keyurl directly
					if (IsApi()) { // Return to caller
						$this->terminate(TRUE);
						return;
					} else {
						$this->terminate($returnUrl);
					}
				} elseif (IsApi()) { // API request, return
					$this->terminate();
					return;
				} else {
					$this->EventCancelled = TRUE; // Event cancelled
					$this->restoreFormValues(); // Add failed, restore form values

					// Set up detail parameters
					$this->setupDetailParms();
				}
		}

		// Set up Breadcrumb
		$this->setupBreadcrumb();

		// Render row based on row type
		$this->RowType = ROWTYPE_ADD; // Render add type

		// Render row
		$this->resetAttributes();
		$this->renderRow();
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
		$this->employee_id->CurrentValue = NULL;
		$this->employee_id->OldValue = $this->employee_id->CurrentValue;
		$this->first_name->CurrentValue = NULL;
		$this->first_name->OldValue = $this->first_name->CurrentValue;
		$this->middle_name->CurrentValue = NULL;
		$this->middle_name->OldValue = $this->middle_name->CurrentValue;
		$this->last_name->CurrentValue = NULL;
		$this->last_name->OldValue = $this->last_name->CurrentValue;
		$this->gender->CurrentValue = NULL;
		$this->gender->OldValue = $this->gender->CurrentValue;
		$this->nationality->CurrentValue = NULL;
		$this->nationality->OldValue = $this->nationality->CurrentValue;
		$this->birthday->CurrentValue = NULL;
		$this->birthday->OldValue = $this->birthday->CurrentValue;
		$this->marital_status->CurrentValue = NULL;
		$this->marital_status->OldValue = $this->marital_status->CurrentValue;
		$this->ssn_num->CurrentValue = NULL;
		$this->ssn_num->OldValue = $this->ssn_num->CurrentValue;
		$this->nic_num->CurrentValue = NULL;
		$this->nic_num->OldValue = $this->nic_num->CurrentValue;
		$this->other_id->CurrentValue = NULL;
		$this->other_id->OldValue = $this->other_id->CurrentValue;
		$this->driving_license->CurrentValue = NULL;
		$this->driving_license->OldValue = $this->driving_license->CurrentValue;
		$this->driving_license_exp_date->CurrentValue = NULL;
		$this->driving_license_exp_date->OldValue = $this->driving_license_exp_date->CurrentValue;
		$this->employment_status->CurrentValue = NULL;
		$this->employment_status->OldValue = $this->employment_status->CurrentValue;
		$this->job_title->CurrentValue = NULL;
		$this->job_title->OldValue = $this->job_title->CurrentValue;
		$this->pay_grade->CurrentValue = NULL;
		$this->pay_grade->OldValue = $this->pay_grade->CurrentValue;
		$this->work_station_id->CurrentValue = NULL;
		$this->work_station_id->OldValue = $this->work_station_id->CurrentValue;
		$this->address1->CurrentValue = NULL;
		$this->address1->OldValue = $this->address1->CurrentValue;
		$this->address2->CurrentValue = NULL;
		$this->address2->OldValue = $this->address2->CurrentValue;
		$this->city->CurrentValue = NULL;
		$this->city->OldValue = $this->city->CurrentValue;
		$this->country->CurrentValue = NULL;
		$this->country->OldValue = $this->country->CurrentValue;
		$this->province->CurrentValue = NULL;
		$this->province->OldValue = $this->province->CurrentValue;
		$this->postal_code->CurrentValue = NULL;
		$this->postal_code->OldValue = $this->postal_code->CurrentValue;
		$this->home_phone->CurrentValue = NULL;
		$this->home_phone->OldValue = $this->home_phone->CurrentValue;
		$this->mobile_phone->CurrentValue = NULL;
		$this->mobile_phone->OldValue = $this->mobile_phone->CurrentValue;
		$this->work_phone->CurrentValue = NULL;
		$this->work_phone->OldValue = $this->work_phone->CurrentValue;
		$this->work_email->CurrentValue = NULL;
		$this->work_email->OldValue = $this->work_email->CurrentValue;
		$this->private_email->CurrentValue = NULL;
		$this->private_email->OldValue = $this->private_email->CurrentValue;
		$this->joined_date->CurrentValue = NULL;
		$this->joined_date->OldValue = $this->joined_date->CurrentValue;
		$this->confirmation_date->CurrentValue = NULL;
		$this->confirmation_date->OldValue = $this->confirmation_date->CurrentValue;
		$this->supervisor->CurrentValue = NULL;
		$this->supervisor->OldValue = $this->supervisor->CurrentValue;
		$this->indirect_supervisors->CurrentValue = NULL;
		$this->indirect_supervisors->OldValue = $this->indirect_supervisors->CurrentValue;
		$this->department->CurrentValue = NULL;
		$this->department->OldValue = $this->department->CurrentValue;
		$this->custom1->CurrentValue = NULL;
		$this->custom1->OldValue = $this->custom1->CurrentValue;
		$this->custom2->CurrentValue = NULL;
		$this->custom2->OldValue = $this->custom2->CurrentValue;
		$this->custom3->CurrentValue = NULL;
		$this->custom3->OldValue = $this->custom3->CurrentValue;
		$this->custom4->CurrentValue = NULL;
		$this->custom4->OldValue = $this->custom4->CurrentValue;
		$this->custom5->CurrentValue = NULL;
		$this->custom5->OldValue = $this->custom5->CurrentValue;
		$this->custom6->CurrentValue = NULL;
		$this->custom6->OldValue = $this->custom6->CurrentValue;
		$this->custom7->CurrentValue = NULL;
		$this->custom7->OldValue = $this->custom7->CurrentValue;
		$this->custom8->CurrentValue = NULL;
		$this->custom8->OldValue = $this->custom8->CurrentValue;
		$this->custom9->CurrentValue = NULL;
		$this->custom9->OldValue = $this->custom9->CurrentValue;
		$this->custom10->CurrentValue = NULL;
		$this->custom10->OldValue = $this->custom10->CurrentValue;
		$this->termination_date->CurrentValue = NULL;
		$this->termination_date->OldValue = $this->termination_date->CurrentValue;
		$this->notes->CurrentValue = NULL;
		$this->notes->OldValue = $this->notes->CurrentValue;
		$this->ethnicity->CurrentValue = NULL;
		$this->ethnicity->OldValue = $this->ethnicity->CurrentValue;
		$this->immigration_status->CurrentValue = NULL;
		$this->immigration_status->OldValue = $this->immigration_status->CurrentValue;
		$this->approver1->CurrentValue = NULL;
		$this->approver1->OldValue = $this->approver1->CurrentValue;
		$this->approver2->CurrentValue = NULL;
		$this->approver2->OldValue = $this->approver2->CurrentValue;
		$this->approver3->CurrentValue = NULL;
		$this->approver3->OldValue = $this->approver3->CurrentValue;
		$this->status->CurrentValue = NULL;
		$this->status->OldValue = $this->status->CurrentValue;
		$this->HospID->CurrentValue = NULL;
		$this->HospID->OldValue = $this->HospID->CurrentValue;
	}

	// Load form values
	protected function loadFormValues()
	{

		// Load from form
		global $CurrentForm;

		// Check field name 'employee_id' first before field var 'x_employee_id'
		$val = $CurrentForm->hasValue("employee_id") ? $CurrentForm->getValue("employee_id") : $CurrentForm->getValue("x_employee_id");
		if (!$this->employee_id->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->employee_id->Visible = FALSE; // Disable update for API request
			else
				$this->employee_id->setFormValue($val);
		}

		// Check field name 'first_name' first before field var 'x_first_name'
		$val = $CurrentForm->hasValue("first_name") ? $CurrentForm->getValue("first_name") : $CurrentForm->getValue("x_first_name");
		if (!$this->first_name->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->first_name->Visible = FALSE; // Disable update for API request
			else
				$this->first_name->setFormValue($val);
		}

		// Check field name 'middle_name' first before field var 'x_middle_name'
		$val = $CurrentForm->hasValue("middle_name") ? $CurrentForm->getValue("middle_name") : $CurrentForm->getValue("x_middle_name");
		if (!$this->middle_name->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->middle_name->Visible = FALSE; // Disable update for API request
			else
				$this->middle_name->setFormValue($val);
		}

		// Check field name 'last_name' first before field var 'x_last_name'
		$val = $CurrentForm->hasValue("last_name") ? $CurrentForm->getValue("last_name") : $CurrentForm->getValue("x_last_name");
		if (!$this->last_name->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->last_name->Visible = FALSE; // Disable update for API request
			else
				$this->last_name->setFormValue($val);
		}

		// Check field name 'gender' first before field var 'x_gender'
		$val = $CurrentForm->hasValue("gender") ? $CurrentForm->getValue("gender") : $CurrentForm->getValue("x_gender");
		if (!$this->gender->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->gender->Visible = FALSE; // Disable update for API request
			else
				$this->gender->setFormValue($val);
		}

		// Check field name 'nationality' first before field var 'x_nationality'
		$val = $CurrentForm->hasValue("nationality") ? $CurrentForm->getValue("nationality") : $CurrentForm->getValue("x_nationality");
		if (!$this->nationality->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->nationality->Visible = FALSE; // Disable update for API request
			else
				$this->nationality->setFormValue($val);
		}

		// Check field name 'birthday' first before field var 'x_birthday'
		$val = $CurrentForm->hasValue("birthday") ? $CurrentForm->getValue("birthday") : $CurrentForm->getValue("x_birthday");
		if (!$this->birthday->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->birthday->Visible = FALSE; // Disable update for API request
			else
				$this->birthday->setFormValue($val);
			$this->birthday->CurrentValue = UnFormatDateTime($this->birthday->CurrentValue, 0);
		}

		// Check field name 'marital_status' first before field var 'x_marital_status'
		$val = $CurrentForm->hasValue("marital_status") ? $CurrentForm->getValue("marital_status") : $CurrentForm->getValue("x_marital_status");
		if (!$this->marital_status->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->marital_status->Visible = FALSE; // Disable update for API request
			else
				$this->marital_status->setFormValue($val);
		}

		// Check field name 'ssn_num' first before field var 'x_ssn_num'
		$val = $CurrentForm->hasValue("ssn_num") ? $CurrentForm->getValue("ssn_num") : $CurrentForm->getValue("x_ssn_num");
		if (!$this->ssn_num->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->ssn_num->Visible = FALSE; // Disable update for API request
			else
				$this->ssn_num->setFormValue($val);
		}

		// Check field name 'nic_num' first before field var 'x_nic_num'
		$val = $CurrentForm->hasValue("nic_num") ? $CurrentForm->getValue("nic_num") : $CurrentForm->getValue("x_nic_num");
		if (!$this->nic_num->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->nic_num->Visible = FALSE; // Disable update for API request
			else
				$this->nic_num->setFormValue($val);
		}

		// Check field name 'other_id' first before field var 'x_other_id'
		$val = $CurrentForm->hasValue("other_id") ? $CurrentForm->getValue("other_id") : $CurrentForm->getValue("x_other_id");
		if (!$this->other_id->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->other_id->Visible = FALSE; // Disable update for API request
			else
				$this->other_id->setFormValue($val);
		}

		// Check field name 'driving_license' first before field var 'x_driving_license'
		$val = $CurrentForm->hasValue("driving_license") ? $CurrentForm->getValue("driving_license") : $CurrentForm->getValue("x_driving_license");
		if (!$this->driving_license->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->driving_license->Visible = FALSE; // Disable update for API request
			else
				$this->driving_license->setFormValue($val);
		}

		// Check field name 'driving_license_exp_date' first before field var 'x_driving_license_exp_date'
		$val = $CurrentForm->hasValue("driving_license_exp_date") ? $CurrentForm->getValue("driving_license_exp_date") : $CurrentForm->getValue("x_driving_license_exp_date");
		if (!$this->driving_license_exp_date->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->driving_license_exp_date->Visible = FALSE; // Disable update for API request
			else
				$this->driving_license_exp_date->setFormValue($val);
			$this->driving_license_exp_date->CurrentValue = UnFormatDateTime($this->driving_license_exp_date->CurrentValue, 0);
		}

		// Check field name 'employment_status' first before field var 'x_employment_status'
		$val = $CurrentForm->hasValue("employment_status") ? $CurrentForm->getValue("employment_status") : $CurrentForm->getValue("x_employment_status");
		if (!$this->employment_status->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->employment_status->Visible = FALSE; // Disable update for API request
			else
				$this->employment_status->setFormValue($val);
		}

		// Check field name 'job_title' first before field var 'x_job_title'
		$val = $CurrentForm->hasValue("job_title") ? $CurrentForm->getValue("job_title") : $CurrentForm->getValue("x_job_title");
		if (!$this->job_title->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->job_title->Visible = FALSE; // Disable update for API request
			else
				$this->job_title->setFormValue($val);
		}

		// Check field name 'pay_grade' first before field var 'x_pay_grade'
		$val = $CurrentForm->hasValue("pay_grade") ? $CurrentForm->getValue("pay_grade") : $CurrentForm->getValue("x_pay_grade");
		if (!$this->pay_grade->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->pay_grade->Visible = FALSE; // Disable update for API request
			else
				$this->pay_grade->setFormValue($val);
		}

		// Check field name 'work_station_id' first before field var 'x_work_station_id'
		$val = $CurrentForm->hasValue("work_station_id") ? $CurrentForm->getValue("work_station_id") : $CurrentForm->getValue("x_work_station_id");
		if (!$this->work_station_id->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->work_station_id->Visible = FALSE; // Disable update for API request
			else
				$this->work_station_id->setFormValue($val);
		}

		// Check field name 'address1' first before field var 'x_address1'
		$val = $CurrentForm->hasValue("address1") ? $CurrentForm->getValue("address1") : $CurrentForm->getValue("x_address1");
		if (!$this->address1->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->address1->Visible = FALSE; // Disable update for API request
			else
				$this->address1->setFormValue($val);
		}

		// Check field name 'address2' first before field var 'x_address2'
		$val = $CurrentForm->hasValue("address2") ? $CurrentForm->getValue("address2") : $CurrentForm->getValue("x_address2");
		if (!$this->address2->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->address2->Visible = FALSE; // Disable update for API request
			else
				$this->address2->setFormValue($val);
		}

		// Check field name 'city' first before field var 'x_city'
		$val = $CurrentForm->hasValue("city") ? $CurrentForm->getValue("city") : $CurrentForm->getValue("x_city");
		if (!$this->city->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->city->Visible = FALSE; // Disable update for API request
			else
				$this->city->setFormValue($val);
		}

		// Check field name 'country' first before field var 'x_country'
		$val = $CurrentForm->hasValue("country") ? $CurrentForm->getValue("country") : $CurrentForm->getValue("x_country");
		if (!$this->country->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->country->Visible = FALSE; // Disable update for API request
			else
				$this->country->setFormValue($val);
		}

		// Check field name 'province' first before field var 'x_province'
		$val = $CurrentForm->hasValue("province") ? $CurrentForm->getValue("province") : $CurrentForm->getValue("x_province");
		if (!$this->province->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->province->Visible = FALSE; // Disable update for API request
			else
				$this->province->setFormValue($val);
		}

		// Check field name 'postal_code' first before field var 'x_postal_code'
		$val = $CurrentForm->hasValue("postal_code") ? $CurrentForm->getValue("postal_code") : $CurrentForm->getValue("x_postal_code");
		if (!$this->postal_code->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->postal_code->Visible = FALSE; // Disable update for API request
			else
				$this->postal_code->setFormValue($val);
		}

		// Check field name 'home_phone' first before field var 'x_home_phone'
		$val = $CurrentForm->hasValue("home_phone") ? $CurrentForm->getValue("home_phone") : $CurrentForm->getValue("x_home_phone");
		if (!$this->home_phone->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->home_phone->Visible = FALSE; // Disable update for API request
			else
				$this->home_phone->setFormValue($val);
		}

		// Check field name 'mobile_phone' first before field var 'x_mobile_phone'
		$val = $CurrentForm->hasValue("mobile_phone") ? $CurrentForm->getValue("mobile_phone") : $CurrentForm->getValue("x_mobile_phone");
		if (!$this->mobile_phone->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->mobile_phone->Visible = FALSE; // Disable update for API request
			else
				$this->mobile_phone->setFormValue($val);
		}

		// Check field name 'work_phone' first before field var 'x_work_phone'
		$val = $CurrentForm->hasValue("work_phone") ? $CurrentForm->getValue("work_phone") : $CurrentForm->getValue("x_work_phone");
		if (!$this->work_phone->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->work_phone->Visible = FALSE; // Disable update for API request
			else
				$this->work_phone->setFormValue($val);
		}

		// Check field name 'work_email' first before field var 'x_work_email'
		$val = $CurrentForm->hasValue("work_email") ? $CurrentForm->getValue("work_email") : $CurrentForm->getValue("x_work_email");
		if (!$this->work_email->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->work_email->Visible = FALSE; // Disable update for API request
			else
				$this->work_email->setFormValue($val);
		}

		// Check field name 'private_email' first before field var 'x_private_email'
		$val = $CurrentForm->hasValue("private_email") ? $CurrentForm->getValue("private_email") : $CurrentForm->getValue("x_private_email");
		if (!$this->private_email->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->private_email->Visible = FALSE; // Disable update for API request
			else
				$this->private_email->setFormValue($val);
		}

		// Check field name 'joined_date' first before field var 'x_joined_date'
		$val = $CurrentForm->hasValue("joined_date") ? $CurrentForm->getValue("joined_date") : $CurrentForm->getValue("x_joined_date");
		if (!$this->joined_date->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->joined_date->Visible = FALSE; // Disable update for API request
			else
				$this->joined_date->setFormValue($val);
			$this->joined_date->CurrentValue = UnFormatDateTime($this->joined_date->CurrentValue, 0);
		}

		// Check field name 'confirmation_date' first before field var 'x_confirmation_date'
		$val = $CurrentForm->hasValue("confirmation_date") ? $CurrentForm->getValue("confirmation_date") : $CurrentForm->getValue("x_confirmation_date");
		if (!$this->confirmation_date->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->confirmation_date->Visible = FALSE; // Disable update for API request
			else
				$this->confirmation_date->setFormValue($val);
			$this->confirmation_date->CurrentValue = UnFormatDateTime($this->confirmation_date->CurrentValue, 0);
		}

		// Check field name 'supervisor' first before field var 'x_supervisor'
		$val = $CurrentForm->hasValue("supervisor") ? $CurrentForm->getValue("supervisor") : $CurrentForm->getValue("x_supervisor");
		if (!$this->supervisor->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->supervisor->Visible = FALSE; // Disable update for API request
			else
				$this->supervisor->setFormValue($val);
		}

		// Check field name 'indirect_supervisors' first before field var 'x_indirect_supervisors'
		$val = $CurrentForm->hasValue("indirect_supervisors") ? $CurrentForm->getValue("indirect_supervisors") : $CurrentForm->getValue("x_indirect_supervisors");
		if (!$this->indirect_supervisors->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->indirect_supervisors->Visible = FALSE; // Disable update for API request
			else
				$this->indirect_supervisors->setFormValue($val);
		}

		// Check field name 'department' first before field var 'x_department'
		$val = $CurrentForm->hasValue("department") ? $CurrentForm->getValue("department") : $CurrentForm->getValue("x_department");
		if (!$this->department->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->department->Visible = FALSE; // Disable update for API request
			else
				$this->department->setFormValue($val);
		}

		// Check field name 'custom1' first before field var 'x_custom1'
		$val = $CurrentForm->hasValue("custom1") ? $CurrentForm->getValue("custom1") : $CurrentForm->getValue("x_custom1");
		if (!$this->custom1->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->custom1->Visible = FALSE; // Disable update for API request
			else
				$this->custom1->setFormValue($val);
		}

		// Check field name 'custom2' first before field var 'x_custom2'
		$val = $CurrentForm->hasValue("custom2") ? $CurrentForm->getValue("custom2") : $CurrentForm->getValue("x_custom2");
		if (!$this->custom2->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->custom2->Visible = FALSE; // Disable update for API request
			else
				$this->custom2->setFormValue($val);
		}

		// Check field name 'custom3' first before field var 'x_custom3'
		$val = $CurrentForm->hasValue("custom3") ? $CurrentForm->getValue("custom3") : $CurrentForm->getValue("x_custom3");
		if (!$this->custom3->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->custom3->Visible = FALSE; // Disable update for API request
			else
				$this->custom3->setFormValue($val);
		}

		// Check field name 'custom4' first before field var 'x_custom4'
		$val = $CurrentForm->hasValue("custom4") ? $CurrentForm->getValue("custom4") : $CurrentForm->getValue("x_custom4");
		if (!$this->custom4->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->custom4->Visible = FALSE; // Disable update for API request
			else
				$this->custom4->setFormValue($val);
		}

		// Check field name 'custom5' first before field var 'x_custom5'
		$val = $CurrentForm->hasValue("custom5") ? $CurrentForm->getValue("custom5") : $CurrentForm->getValue("x_custom5");
		if (!$this->custom5->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->custom5->Visible = FALSE; // Disable update for API request
			else
				$this->custom5->setFormValue($val);
		}

		// Check field name 'custom6' first before field var 'x_custom6'
		$val = $CurrentForm->hasValue("custom6") ? $CurrentForm->getValue("custom6") : $CurrentForm->getValue("x_custom6");
		if (!$this->custom6->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->custom6->Visible = FALSE; // Disable update for API request
			else
				$this->custom6->setFormValue($val);
		}

		// Check field name 'custom7' first before field var 'x_custom7'
		$val = $CurrentForm->hasValue("custom7") ? $CurrentForm->getValue("custom7") : $CurrentForm->getValue("x_custom7");
		if (!$this->custom7->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->custom7->Visible = FALSE; // Disable update for API request
			else
				$this->custom7->setFormValue($val);
		}

		// Check field name 'custom8' first before field var 'x_custom8'
		$val = $CurrentForm->hasValue("custom8") ? $CurrentForm->getValue("custom8") : $CurrentForm->getValue("x_custom8");
		if (!$this->custom8->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->custom8->Visible = FALSE; // Disable update for API request
			else
				$this->custom8->setFormValue($val);
		}

		// Check field name 'custom9' first before field var 'x_custom9'
		$val = $CurrentForm->hasValue("custom9") ? $CurrentForm->getValue("custom9") : $CurrentForm->getValue("x_custom9");
		if (!$this->custom9->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->custom9->Visible = FALSE; // Disable update for API request
			else
				$this->custom9->setFormValue($val);
		}

		// Check field name 'custom10' first before field var 'x_custom10'
		$val = $CurrentForm->hasValue("custom10") ? $CurrentForm->getValue("custom10") : $CurrentForm->getValue("x_custom10");
		if (!$this->custom10->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->custom10->Visible = FALSE; // Disable update for API request
			else
				$this->custom10->setFormValue($val);
		}

		// Check field name 'termination_date' first before field var 'x_termination_date'
		$val = $CurrentForm->hasValue("termination_date") ? $CurrentForm->getValue("termination_date") : $CurrentForm->getValue("x_termination_date");
		if (!$this->termination_date->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->termination_date->Visible = FALSE; // Disable update for API request
			else
				$this->termination_date->setFormValue($val);
			$this->termination_date->CurrentValue = UnFormatDateTime($this->termination_date->CurrentValue, 0);
		}

		// Check field name 'notes' first before field var 'x_notes'
		$val = $CurrentForm->hasValue("notes") ? $CurrentForm->getValue("notes") : $CurrentForm->getValue("x_notes");
		if (!$this->notes->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->notes->Visible = FALSE; // Disable update for API request
			else
				$this->notes->setFormValue($val);
		}

		// Check field name 'ethnicity' first before field var 'x_ethnicity'
		$val = $CurrentForm->hasValue("ethnicity") ? $CurrentForm->getValue("ethnicity") : $CurrentForm->getValue("x_ethnicity");
		if (!$this->ethnicity->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->ethnicity->Visible = FALSE; // Disable update for API request
			else
				$this->ethnicity->setFormValue($val);
		}

		// Check field name 'immigration_status' first before field var 'x_immigration_status'
		$val = $CurrentForm->hasValue("immigration_status") ? $CurrentForm->getValue("immigration_status") : $CurrentForm->getValue("x_immigration_status");
		if (!$this->immigration_status->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->immigration_status->Visible = FALSE; // Disable update for API request
			else
				$this->immigration_status->setFormValue($val);
		}

		// Check field name 'approver1' first before field var 'x_approver1'
		$val = $CurrentForm->hasValue("approver1") ? $CurrentForm->getValue("approver1") : $CurrentForm->getValue("x_approver1");
		if (!$this->approver1->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->approver1->Visible = FALSE; // Disable update for API request
			else
				$this->approver1->setFormValue($val);
		}

		// Check field name 'approver2' first before field var 'x_approver2'
		$val = $CurrentForm->hasValue("approver2") ? $CurrentForm->getValue("approver2") : $CurrentForm->getValue("x_approver2");
		if (!$this->approver2->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->approver2->Visible = FALSE; // Disable update for API request
			else
				$this->approver2->setFormValue($val);
		}

		// Check field name 'approver3' first before field var 'x_approver3'
		$val = $CurrentForm->hasValue("approver3") ? $CurrentForm->getValue("approver3") : $CurrentForm->getValue("x_approver3");
		if (!$this->approver3->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->approver3->Visible = FALSE; // Disable update for API request
			else
				$this->approver3->setFormValue($val);
		}

		// Check field name 'status' first before field var 'x_status'
		$val = $CurrentForm->hasValue("status") ? $CurrentForm->getValue("status") : $CurrentForm->getValue("x_status");
		if (!$this->status->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->status->Visible = FALSE; // Disable update for API request
			else
				$this->status->setFormValue($val);
		}

		// Check field name 'HospID' first before field var 'x_HospID'
		$val = $CurrentForm->hasValue("HospID") ? $CurrentForm->getValue("HospID") : $CurrentForm->getValue("x_HospID");
		if (!$this->HospID->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->HospID->Visible = FALSE; // Disable update for API request
			else
				$this->HospID->setFormValue($val);
		}

		// Check field name 'id' first before field var 'x_id'
		$val = $CurrentForm->hasValue("id") ? $CurrentForm->getValue("id") : $CurrentForm->getValue("x_id");
	}

	// Restore form values
	public function restoreFormValues()
	{
		global $CurrentForm;
		$this->employee_id->CurrentValue = $this->employee_id->FormValue;
		$this->first_name->CurrentValue = $this->first_name->FormValue;
		$this->middle_name->CurrentValue = $this->middle_name->FormValue;
		$this->last_name->CurrentValue = $this->last_name->FormValue;
		$this->gender->CurrentValue = $this->gender->FormValue;
		$this->nationality->CurrentValue = $this->nationality->FormValue;
		$this->birthday->CurrentValue = $this->birthday->FormValue;
		$this->birthday->CurrentValue = UnFormatDateTime($this->birthday->CurrentValue, 0);
		$this->marital_status->CurrentValue = $this->marital_status->FormValue;
		$this->ssn_num->CurrentValue = $this->ssn_num->FormValue;
		$this->nic_num->CurrentValue = $this->nic_num->FormValue;
		$this->other_id->CurrentValue = $this->other_id->FormValue;
		$this->driving_license->CurrentValue = $this->driving_license->FormValue;
		$this->driving_license_exp_date->CurrentValue = $this->driving_license_exp_date->FormValue;
		$this->driving_license_exp_date->CurrentValue = UnFormatDateTime($this->driving_license_exp_date->CurrentValue, 0);
		$this->employment_status->CurrentValue = $this->employment_status->FormValue;
		$this->job_title->CurrentValue = $this->job_title->FormValue;
		$this->pay_grade->CurrentValue = $this->pay_grade->FormValue;
		$this->work_station_id->CurrentValue = $this->work_station_id->FormValue;
		$this->address1->CurrentValue = $this->address1->FormValue;
		$this->address2->CurrentValue = $this->address2->FormValue;
		$this->city->CurrentValue = $this->city->FormValue;
		$this->country->CurrentValue = $this->country->FormValue;
		$this->province->CurrentValue = $this->province->FormValue;
		$this->postal_code->CurrentValue = $this->postal_code->FormValue;
		$this->home_phone->CurrentValue = $this->home_phone->FormValue;
		$this->mobile_phone->CurrentValue = $this->mobile_phone->FormValue;
		$this->work_phone->CurrentValue = $this->work_phone->FormValue;
		$this->work_email->CurrentValue = $this->work_email->FormValue;
		$this->private_email->CurrentValue = $this->private_email->FormValue;
		$this->joined_date->CurrentValue = $this->joined_date->FormValue;
		$this->joined_date->CurrentValue = UnFormatDateTime($this->joined_date->CurrentValue, 0);
		$this->confirmation_date->CurrentValue = $this->confirmation_date->FormValue;
		$this->confirmation_date->CurrentValue = UnFormatDateTime($this->confirmation_date->CurrentValue, 0);
		$this->supervisor->CurrentValue = $this->supervisor->FormValue;
		$this->indirect_supervisors->CurrentValue = $this->indirect_supervisors->FormValue;
		$this->department->CurrentValue = $this->department->FormValue;
		$this->custom1->CurrentValue = $this->custom1->FormValue;
		$this->custom2->CurrentValue = $this->custom2->FormValue;
		$this->custom3->CurrentValue = $this->custom3->FormValue;
		$this->custom4->CurrentValue = $this->custom4->FormValue;
		$this->custom5->CurrentValue = $this->custom5->FormValue;
		$this->custom6->CurrentValue = $this->custom6->FormValue;
		$this->custom7->CurrentValue = $this->custom7->FormValue;
		$this->custom8->CurrentValue = $this->custom8->FormValue;
		$this->custom9->CurrentValue = $this->custom9->FormValue;
		$this->custom10->CurrentValue = $this->custom10->FormValue;
		$this->termination_date->CurrentValue = $this->termination_date->FormValue;
		$this->termination_date->CurrentValue = UnFormatDateTime($this->termination_date->CurrentValue, 0);
		$this->notes->CurrentValue = $this->notes->FormValue;
		$this->ethnicity->CurrentValue = $this->ethnicity->FormValue;
		$this->immigration_status->CurrentValue = $this->immigration_status->FormValue;
		$this->approver1->CurrentValue = $this->approver1->FormValue;
		$this->approver2->CurrentValue = $this->approver2->FormValue;
		$this->approver3->CurrentValue = $this->approver3->FormValue;
		$this->status->CurrentValue = $this->status->FormValue;
		$this->HospID->CurrentValue = $this->HospID->FormValue;
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
		$this->loadDefaultValues();
		$row = [];
		$row['id'] = $this->id->CurrentValue;
		$row['employee_id'] = $this->employee_id->CurrentValue;
		$row['first_name'] = $this->first_name->CurrentValue;
		$row['middle_name'] = $this->middle_name->CurrentValue;
		$row['last_name'] = $this->last_name->CurrentValue;
		$row['gender'] = $this->gender->CurrentValue;
		$row['nationality'] = $this->nationality->CurrentValue;
		$row['birthday'] = $this->birthday->CurrentValue;
		$row['marital_status'] = $this->marital_status->CurrentValue;
		$row['ssn_num'] = $this->ssn_num->CurrentValue;
		$row['nic_num'] = $this->nic_num->CurrentValue;
		$row['other_id'] = $this->other_id->CurrentValue;
		$row['driving_license'] = $this->driving_license->CurrentValue;
		$row['driving_license_exp_date'] = $this->driving_license_exp_date->CurrentValue;
		$row['employment_status'] = $this->employment_status->CurrentValue;
		$row['job_title'] = $this->job_title->CurrentValue;
		$row['pay_grade'] = $this->pay_grade->CurrentValue;
		$row['work_station_id'] = $this->work_station_id->CurrentValue;
		$row['address1'] = $this->address1->CurrentValue;
		$row['address2'] = $this->address2->CurrentValue;
		$row['city'] = $this->city->CurrentValue;
		$row['country'] = $this->country->CurrentValue;
		$row['province'] = $this->province->CurrentValue;
		$row['postal_code'] = $this->postal_code->CurrentValue;
		$row['home_phone'] = $this->home_phone->CurrentValue;
		$row['mobile_phone'] = $this->mobile_phone->CurrentValue;
		$row['work_phone'] = $this->work_phone->CurrentValue;
		$row['work_email'] = $this->work_email->CurrentValue;
		$row['private_email'] = $this->private_email->CurrentValue;
		$row['joined_date'] = $this->joined_date->CurrentValue;
		$row['confirmation_date'] = $this->confirmation_date->CurrentValue;
		$row['supervisor'] = $this->supervisor->CurrentValue;
		$row['indirect_supervisors'] = $this->indirect_supervisors->CurrentValue;
		$row['department'] = $this->department->CurrentValue;
		$row['custom1'] = $this->custom1->CurrentValue;
		$row['custom2'] = $this->custom2->CurrentValue;
		$row['custom3'] = $this->custom3->CurrentValue;
		$row['custom4'] = $this->custom4->CurrentValue;
		$row['custom5'] = $this->custom5->CurrentValue;
		$row['custom6'] = $this->custom6->CurrentValue;
		$row['custom7'] = $this->custom7->CurrentValue;
		$row['custom8'] = $this->custom8->CurrentValue;
		$row['custom9'] = $this->custom9->CurrentValue;
		$row['custom10'] = $this->custom10->CurrentValue;
		$row['termination_date'] = $this->termination_date->CurrentValue;
		$row['notes'] = $this->notes->CurrentValue;
		$row['ethnicity'] = $this->ethnicity->CurrentValue;
		$row['immigration_status'] = $this->immigration_status->CurrentValue;
		$row['approver1'] = $this->approver1->CurrentValue;
		$row['approver2'] = $this->approver2->CurrentValue;
		$row['approver3'] = $this->approver3->CurrentValue;
		$row['status'] = $this->status->CurrentValue;
		$row['HospID'] = $this->HospID->CurrentValue;
		return $row;
	}

	// Load old record
	protected function loadOldRecord()
	{

		// Load key values from Session
		$validKey = TRUE;
		if (strval($this->getKey("id")) <> "")
			$this->id->CurrentValue = $this->getKey("id"); // id
		else
			$validKey = FALSE;

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

			// notes
			$this->notes->ViewValue = $this->notes->CurrentValue;
			$this->notes->ViewCustomAttributes = "";

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

			// notes
			$this->notes->LinkCustomAttributes = "";
			$this->notes->HrefValue = "";
			$this->notes->TooltipValue = "";

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
		} elseif ($this->RowType == ROWTYPE_ADD) { // Add row

			// employee_id
			$this->employee_id->EditAttrs["class"] = "form-control";
			$this->employee_id->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->employee_id->CurrentValue = HtmlDecode($this->employee_id->CurrentValue);
			$this->employee_id->EditValue = HtmlEncode($this->employee_id->CurrentValue);
			$this->employee_id->PlaceHolder = RemoveHtml($this->employee_id->caption());

			// first_name
			$this->first_name->EditAttrs["class"] = "form-control";
			$this->first_name->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->first_name->CurrentValue = HtmlDecode($this->first_name->CurrentValue);
			$this->first_name->EditValue = HtmlEncode($this->first_name->CurrentValue);
			$this->first_name->PlaceHolder = RemoveHtml($this->first_name->caption());

			// middle_name
			$this->middle_name->EditAttrs["class"] = "form-control";
			$this->middle_name->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->middle_name->CurrentValue = HtmlDecode($this->middle_name->CurrentValue);
			$this->middle_name->EditValue = HtmlEncode($this->middle_name->CurrentValue);
			$this->middle_name->PlaceHolder = RemoveHtml($this->middle_name->caption());

			// last_name
			$this->last_name->EditAttrs["class"] = "form-control";
			$this->last_name->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->last_name->CurrentValue = HtmlDecode($this->last_name->CurrentValue);
			$this->last_name->EditValue = HtmlEncode($this->last_name->CurrentValue);
			$this->last_name->PlaceHolder = RemoveHtml($this->last_name->caption());

			// gender
			$this->gender->EditAttrs["class"] = "form-control";
			$this->gender->EditCustomAttributes = "";
			$curVal = trim(strval($this->gender->CurrentValue));
			if ($curVal <> "")
				$this->gender->ViewValue = $this->gender->lookupCacheOption($curVal);
			else
				$this->gender->ViewValue = $this->gender->Lookup !== NULL && is_array($this->gender->Lookup->Options) ? $curVal : NULL;
			if ($this->gender->ViewValue !== NULL) { // Load from cache
				$this->gender->EditValue = array_values($this->gender->Lookup->Options);
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`Name`" . SearchString("=", $this->gender->CurrentValue, DATATYPE_STRING, "");
				}
				$sqlWrk = $this->gender->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
				if ($rswrk) $rswrk->Close();
				$this->gender->EditValue = $arwrk;
			}

			// nationality
			$this->nationality->EditCustomAttributes = "";
			$curVal = trim(strval($this->nationality->CurrentValue));
			if ($curVal <> "")
				$this->nationality->ViewValue = $this->nationality->lookupCacheOption($curVal);
			else
				$this->nationality->ViewValue = $this->nationality->Lookup !== NULL && is_array($this->nationality->Lookup->Options) ? $curVal : NULL;
			if ($this->nationality->ViewValue !== NULL) { // Load from cache
				$this->nationality->EditValue = array_values($this->nationality->Lookup->Options);
				if ($this->nationality->ViewValue == "")
					$this->nationality->ViewValue = $Language->phrase("PleaseSelect");
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`id`" . SearchString("=", $this->nationality->CurrentValue, DATATYPE_NUMBER, "");
				}
				$sqlWrk = $this->nationality->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = array();
					$arwrk[1] = HtmlEncode($rswrk->fields('df'));
					$this->nationality->ViewValue = $this->nationality->displayValue($arwrk);
				} else {
					$this->nationality->ViewValue = $Language->phrase("PleaseSelect");
				}
				$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
				if ($rswrk) $rswrk->Close();
				$this->nationality->EditValue = $arwrk;
			}

			// birthday
			$this->birthday->EditAttrs["class"] = "form-control";
			$this->birthday->EditCustomAttributes = "";
			$this->birthday->EditValue = HtmlEncode(FormatDateTime($this->birthday->CurrentValue, 8));
			$this->birthday->PlaceHolder = RemoveHtml($this->birthday->caption());

			// marital_status
			$this->marital_status->EditCustomAttributes = "";
			$this->marital_status->EditValue = $this->marital_status->options(FALSE);

			// ssn_num
			$this->ssn_num->EditAttrs["class"] = "form-control";
			$this->ssn_num->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->ssn_num->CurrentValue = HtmlDecode($this->ssn_num->CurrentValue);
			$this->ssn_num->EditValue = HtmlEncode($this->ssn_num->CurrentValue);
			$this->ssn_num->PlaceHolder = RemoveHtml($this->ssn_num->caption());

			// nic_num
			$this->nic_num->EditAttrs["class"] = "form-control";
			$this->nic_num->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->nic_num->CurrentValue = HtmlDecode($this->nic_num->CurrentValue);
			$this->nic_num->EditValue = HtmlEncode($this->nic_num->CurrentValue);
			$this->nic_num->PlaceHolder = RemoveHtml($this->nic_num->caption());

			// other_id
			$this->other_id->EditAttrs["class"] = "form-control";
			$this->other_id->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->other_id->CurrentValue = HtmlDecode($this->other_id->CurrentValue);
			$this->other_id->EditValue = HtmlEncode($this->other_id->CurrentValue);
			$this->other_id->PlaceHolder = RemoveHtml($this->other_id->caption());

			// driving_license
			$this->driving_license->EditAttrs["class"] = "form-control";
			$this->driving_license->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->driving_license->CurrentValue = HtmlDecode($this->driving_license->CurrentValue);
			$this->driving_license->EditValue = HtmlEncode($this->driving_license->CurrentValue);
			$this->driving_license->PlaceHolder = RemoveHtml($this->driving_license->caption());

			// driving_license_exp_date
			$this->driving_license_exp_date->EditAttrs["class"] = "form-control";
			$this->driving_license_exp_date->EditCustomAttributes = "";
			$this->driving_license_exp_date->EditValue = HtmlEncode(FormatDateTime($this->driving_license_exp_date->CurrentValue, 8));
			$this->driving_license_exp_date->PlaceHolder = RemoveHtml($this->driving_license_exp_date->caption());

			// employment_status
			$this->employment_status->EditAttrs["class"] = "form-control";
			$this->employment_status->EditCustomAttributes = "";
			$this->employment_status->EditValue = HtmlEncode($this->employment_status->CurrentValue);
			$this->employment_status->PlaceHolder = RemoveHtml($this->employment_status->caption());

			// job_title
			$this->job_title->EditAttrs["class"] = "form-control";
			$this->job_title->EditCustomAttributes = "";
			$this->job_title->EditValue = HtmlEncode($this->job_title->CurrentValue);
			$this->job_title->PlaceHolder = RemoveHtml($this->job_title->caption());

			// pay_grade
			$this->pay_grade->EditAttrs["class"] = "form-control";
			$this->pay_grade->EditCustomAttributes = "";
			$this->pay_grade->EditValue = HtmlEncode($this->pay_grade->CurrentValue);
			$this->pay_grade->PlaceHolder = RemoveHtml($this->pay_grade->caption());

			// work_station_id
			$this->work_station_id->EditAttrs["class"] = "form-control";
			$this->work_station_id->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->work_station_id->CurrentValue = HtmlDecode($this->work_station_id->CurrentValue);
			$this->work_station_id->EditValue = HtmlEncode($this->work_station_id->CurrentValue);
			$this->work_station_id->PlaceHolder = RemoveHtml($this->work_station_id->caption());

			// address1
			$this->address1->EditAttrs["class"] = "form-control";
			$this->address1->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->address1->CurrentValue = HtmlDecode($this->address1->CurrentValue);
			$this->address1->EditValue = HtmlEncode($this->address1->CurrentValue);
			$this->address1->PlaceHolder = RemoveHtml($this->address1->caption());

			// address2
			$this->address2->EditAttrs["class"] = "form-control";
			$this->address2->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->address2->CurrentValue = HtmlDecode($this->address2->CurrentValue);
			$this->address2->EditValue = HtmlEncode($this->address2->CurrentValue);
			$this->address2->PlaceHolder = RemoveHtml($this->address2->caption());

			// city
			$this->city->EditAttrs["class"] = "form-control";
			$this->city->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->city->CurrentValue = HtmlDecode($this->city->CurrentValue);
			$this->city->EditValue = HtmlEncode($this->city->CurrentValue);
			$this->city->PlaceHolder = RemoveHtml($this->city->caption());

			// country
			$this->country->EditAttrs["class"] = "form-control";
			$this->country->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->country->CurrentValue = HtmlDecode($this->country->CurrentValue);
			$this->country->EditValue = HtmlEncode($this->country->CurrentValue);
			$this->country->PlaceHolder = RemoveHtml($this->country->caption());

			// province
			$this->province->EditAttrs["class"] = "form-control";
			$this->province->EditCustomAttributes = "";
			$this->province->EditValue = HtmlEncode($this->province->CurrentValue);
			$this->province->PlaceHolder = RemoveHtml($this->province->caption());

			// postal_code
			$this->postal_code->EditAttrs["class"] = "form-control";
			$this->postal_code->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->postal_code->CurrentValue = HtmlDecode($this->postal_code->CurrentValue);
			$this->postal_code->EditValue = HtmlEncode($this->postal_code->CurrentValue);
			$this->postal_code->PlaceHolder = RemoveHtml($this->postal_code->caption());

			// home_phone
			$this->home_phone->EditAttrs["class"] = "form-control";
			$this->home_phone->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->home_phone->CurrentValue = HtmlDecode($this->home_phone->CurrentValue);
			$this->home_phone->EditValue = HtmlEncode($this->home_phone->CurrentValue);
			$this->home_phone->PlaceHolder = RemoveHtml($this->home_phone->caption());

			// mobile_phone
			$this->mobile_phone->EditAttrs["class"] = "form-control";
			$this->mobile_phone->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->mobile_phone->CurrentValue = HtmlDecode($this->mobile_phone->CurrentValue);
			$this->mobile_phone->EditValue = HtmlEncode($this->mobile_phone->CurrentValue);
			$this->mobile_phone->PlaceHolder = RemoveHtml($this->mobile_phone->caption());

			// work_phone
			$this->work_phone->EditAttrs["class"] = "form-control";
			$this->work_phone->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->work_phone->CurrentValue = HtmlDecode($this->work_phone->CurrentValue);
			$this->work_phone->EditValue = HtmlEncode($this->work_phone->CurrentValue);
			$this->work_phone->PlaceHolder = RemoveHtml($this->work_phone->caption());

			// work_email
			$this->work_email->EditAttrs["class"] = "form-control";
			$this->work_email->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->work_email->CurrentValue = HtmlDecode($this->work_email->CurrentValue);
			$this->work_email->EditValue = HtmlEncode($this->work_email->CurrentValue);
			$this->work_email->PlaceHolder = RemoveHtml($this->work_email->caption());

			// private_email
			$this->private_email->EditAttrs["class"] = "form-control";
			$this->private_email->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->private_email->CurrentValue = HtmlDecode($this->private_email->CurrentValue);
			$this->private_email->EditValue = HtmlEncode($this->private_email->CurrentValue);
			$this->private_email->PlaceHolder = RemoveHtml($this->private_email->caption());

			// joined_date
			$this->joined_date->EditAttrs["class"] = "form-control";
			$this->joined_date->EditCustomAttributes = "";
			$this->joined_date->EditValue = HtmlEncode(FormatDateTime($this->joined_date->CurrentValue, 8));
			$this->joined_date->PlaceHolder = RemoveHtml($this->joined_date->caption());

			// confirmation_date
			$this->confirmation_date->EditAttrs["class"] = "form-control";
			$this->confirmation_date->EditCustomAttributes = "";
			$this->confirmation_date->EditValue = HtmlEncode(FormatDateTime($this->confirmation_date->CurrentValue, 8));
			$this->confirmation_date->PlaceHolder = RemoveHtml($this->confirmation_date->caption());

			// supervisor
			$this->supervisor->EditAttrs["class"] = "form-control";
			$this->supervisor->EditCustomAttributes = "";
			$this->supervisor->EditValue = HtmlEncode($this->supervisor->CurrentValue);
			$this->supervisor->PlaceHolder = RemoveHtml($this->supervisor->caption());

			// indirect_supervisors
			$this->indirect_supervisors->EditAttrs["class"] = "form-control";
			$this->indirect_supervisors->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->indirect_supervisors->CurrentValue = HtmlDecode($this->indirect_supervisors->CurrentValue);
			$this->indirect_supervisors->EditValue = HtmlEncode($this->indirect_supervisors->CurrentValue);
			$this->indirect_supervisors->PlaceHolder = RemoveHtml($this->indirect_supervisors->caption());

			// department
			$this->department->EditAttrs["class"] = "form-control";
			$this->department->EditCustomAttributes = "";
			$this->department->EditValue = HtmlEncode($this->department->CurrentValue);
			$this->department->PlaceHolder = RemoveHtml($this->department->caption());

			// custom1
			$this->custom1->EditAttrs["class"] = "form-control";
			$this->custom1->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->custom1->CurrentValue = HtmlDecode($this->custom1->CurrentValue);
			$this->custom1->EditValue = HtmlEncode($this->custom1->CurrentValue);
			$this->custom1->PlaceHolder = RemoveHtml($this->custom1->caption());

			// custom2
			$this->custom2->EditAttrs["class"] = "form-control";
			$this->custom2->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->custom2->CurrentValue = HtmlDecode($this->custom2->CurrentValue);
			$this->custom2->EditValue = HtmlEncode($this->custom2->CurrentValue);
			$this->custom2->PlaceHolder = RemoveHtml($this->custom2->caption());

			// custom3
			$this->custom3->EditAttrs["class"] = "form-control";
			$this->custom3->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->custom3->CurrentValue = HtmlDecode($this->custom3->CurrentValue);
			$this->custom3->EditValue = HtmlEncode($this->custom3->CurrentValue);
			$this->custom3->PlaceHolder = RemoveHtml($this->custom3->caption());

			// custom4
			$this->custom4->EditAttrs["class"] = "form-control";
			$this->custom4->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->custom4->CurrentValue = HtmlDecode($this->custom4->CurrentValue);
			$this->custom4->EditValue = HtmlEncode($this->custom4->CurrentValue);
			$this->custom4->PlaceHolder = RemoveHtml($this->custom4->caption());

			// custom5
			$this->custom5->EditAttrs["class"] = "form-control";
			$this->custom5->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->custom5->CurrentValue = HtmlDecode($this->custom5->CurrentValue);
			$this->custom5->EditValue = HtmlEncode($this->custom5->CurrentValue);
			$this->custom5->PlaceHolder = RemoveHtml($this->custom5->caption());

			// custom6
			$this->custom6->EditAttrs["class"] = "form-control";
			$this->custom6->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->custom6->CurrentValue = HtmlDecode($this->custom6->CurrentValue);
			$this->custom6->EditValue = HtmlEncode($this->custom6->CurrentValue);
			$this->custom6->PlaceHolder = RemoveHtml($this->custom6->caption());

			// custom7
			$this->custom7->EditAttrs["class"] = "form-control";
			$this->custom7->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->custom7->CurrentValue = HtmlDecode($this->custom7->CurrentValue);
			$this->custom7->EditValue = HtmlEncode($this->custom7->CurrentValue);
			$this->custom7->PlaceHolder = RemoveHtml($this->custom7->caption());

			// custom8
			$this->custom8->EditAttrs["class"] = "form-control";
			$this->custom8->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->custom8->CurrentValue = HtmlDecode($this->custom8->CurrentValue);
			$this->custom8->EditValue = HtmlEncode($this->custom8->CurrentValue);
			$this->custom8->PlaceHolder = RemoveHtml($this->custom8->caption());

			// custom9
			$this->custom9->EditAttrs["class"] = "form-control";
			$this->custom9->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->custom9->CurrentValue = HtmlDecode($this->custom9->CurrentValue);
			$this->custom9->EditValue = HtmlEncode($this->custom9->CurrentValue);
			$this->custom9->PlaceHolder = RemoveHtml($this->custom9->caption());

			// custom10
			$this->custom10->EditAttrs["class"] = "form-control";
			$this->custom10->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->custom10->CurrentValue = HtmlDecode($this->custom10->CurrentValue);
			$this->custom10->EditValue = HtmlEncode($this->custom10->CurrentValue);
			$this->custom10->PlaceHolder = RemoveHtml($this->custom10->caption());

			// termination_date
			$this->termination_date->EditAttrs["class"] = "form-control";
			$this->termination_date->EditCustomAttributes = "";
			$this->termination_date->EditValue = HtmlEncode(FormatDateTime($this->termination_date->CurrentValue, 8));
			$this->termination_date->PlaceHolder = RemoveHtml($this->termination_date->caption());

			// notes
			$this->notes->EditAttrs["class"] = "form-control";
			$this->notes->EditCustomAttributes = "";
			$this->notes->EditValue = HtmlEncode($this->notes->CurrentValue);
			$this->notes->PlaceHolder = RemoveHtml($this->notes->caption());

			// ethnicity
			$this->ethnicity->EditAttrs["class"] = "form-control";
			$this->ethnicity->EditCustomAttributes = "";
			$this->ethnicity->EditValue = HtmlEncode($this->ethnicity->CurrentValue);
			$this->ethnicity->PlaceHolder = RemoveHtml($this->ethnicity->caption());

			// immigration_status
			$this->immigration_status->EditAttrs["class"] = "form-control";
			$this->immigration_status->EditCustomAttributes = "";
			$this->immigration_status->EditValue = HtmlEncode($this->immigration_status->CurrentValue);
			$this->immigration_status->PlaceHolder = RemoveHtml($this->immigration_status->caption());

			// approver1
			$this->approver1->EditCustomAttributes = "";
			$curVal = trim(strval($this->approver1->CurrentValue));
			if ($curVal <> "")
				$this->approver1->ViewValue = $this->approver1->lookupCacheOption($curVal);
			else
				$this->approver1->ViewValue = $this->approver1->Lookup !== NULL && is_array($this->approver1->Lookup->Options) ? $curVal : NULL;
			if ($this->approver1->ViewValue !== NULL) { // Load from cache
				$this->approver1->EditValue = array_values($this->approver1->Lookup->Options);
				if ($this->approver1->ViewValue == "")
					$this->approver1->ViewValue = $Language->phrase("PleaseSelect");
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`id`" . SearchString("=", $this->approver1->CurrentValue, DATATYPE_NUMBER, "");
				}
				$sqlWrk = $this->approver1->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = array();
					$arwrk[1] = HtmlEncode($rswrk->fields('df'));
					$this->approver1->ViewValue = $this->approver1->displayValue($arwrk);
				} else {
					$this->approver1->ViewValue = $Language->phrase("PleaseSelect");
				}
				$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
				if ($rswrk) $rswrk->Close();
				$this->approver1->EditValue = $arwrk;
			}

			// approver2
			$this->approver2->EditCustomAttributes = "";
			$curVal = trim(strval($this->approver2->CurrentValue));
			if ($curVal <> "")
				$this->approver2->ViewValue = $this->approver2->lookupCacheOption($curVal);
			else
				$this->approver2->ViewValue = $this->approver2->Lookup !== NULL && is_array($this->approver2->Lookup->Options) ? $curVal : NULL;
			if ($this->approver2->ViewValue !== NULL) { // Load from cache
				$this->approver2->EditValue = array_values($this->approver2->Lookup->Options);
				if ($this->approver2->ViewValue == "")
					$this->approver2->ViewValue = $Language->phrase("PleaseSelect");
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`id`" . SearchString("=", $this->approver2->CurrentValue, DATATYPE_NUMBER, "");
				}
				$sqlWrk = $this->approver2->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = array();
					$arwrk[1] = HtmlEncode($rswrk->fields('df'));
					$this->approver2->ViewValue = $this->approver2->displayValue($arwrk);
				} else {
					$this->approver2->ViewValue = $Language->phrase("PleaseSelect");
				}
				$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
				if ($rswrk) $rswrk->Close();
				$this->approver2->EditValue = $arwrk;
			}

			// approver3
			$this->approver3->EditCustomAttributes = "";
			$curVal = trim(strval($this->approver3->CurrentValue));
			if ($curVal <> "")
				$this->approver3->ViewValue = $this->approver3->lookupCacheOption($curVal);
			else
				$this->approver3->ViewValue = $this->approver3->Lookup !== NULL && is_array($this->approver3->Lookup->Options) ? $curVal : NULL;
			if ($this->approver3->ViewValue !== NULL) { // Load from cache
				$this->approver3->EditValue = array_values($this->approver3->Lookup->Options);
				if ($this->approver3->ViewValue == "")
					$this->approver3->ViewValue = $Language->phrase("PleaseSelect");
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`id`" . SearchString("=", $this->approver3->CurrentValue, DATATYPE_NUMBER, "");
				}
				$sqlWrk = $this->approver3->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = array();
					$arwrk[1] = HtmlEncode($rswrk->fields('df'));
					$this->approver3->ViewValue = $this->approver3->displayValue($arwrk);
				} else {
					$this->approver3->ViewValue = $Language->phrase("PleaseSelect");
				}
				$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
				if ($rswrk) $rswrk->Close();
				$this->approver3->EditValue = $arwrk;
			}

			// status
			// HospID
			// Add refer script
			// employee_id

			$this->employee_id->LinkCustomAttributes = "";
			$this->employee_id->HrefValue = "";

			// first_name
			$this->first_name->LinkCustomAttributes = "";
			$this->first_name->HrefValue = "";

			// middle_name
			$this->middle_name->LinkCustomAttributes = "";
			$this->middle_name->HrefValue = "";

			// last_name
			$this->last_name->LinkCustomAttributes = "";
			$this->last_name->HrefValue = "";

			// gender
			$this->gender->LinkCustomAttributes = "";
			$this->gender->HrefValue = "";

			// nationality
			$this->nationality->LinkCustomAttributes = "";
			$this->nationality->HrefValue = "";

			// birthday
			$this->birthday->LinkCustomAttributes = "";
			$this->birthday->HrefValue = "";

			// marital_status
			$this->marital_status->LinkCustomAttributes = "";
			$this->marital_status->HrefValue = "";

			// ssn_num
			$this->ssn_num->LinkCustomAttributes = "";
			$this->ssn_num->HrefValue = "";

			// nic_num
			$this->nic_num->LinkCustomAttributes = "";
			$this->nic_num->HrefValue = "";

			// other_id
			$this->other_id->LinkCustomAttributes = "";
			$this->other_id->HrefValue = "";

			// driving_license
			$this->driving_license->LinkCustomAttributes = "";
			$this->driving_license->HrefValue = "";

			// driving_license_exp_date
			$this->driving_license_exp_date->LinkCustomAttributes = "";
			$this->driving_license_exp_date->HrefValue = "";

			// employment_status
			$this->employment_status->LinkCustomAttributes = "";
			$this->employment_status->HrefValue = "";

			// job_title
			$this->job_title->LinkCustomAttributes = "";
			$this->job_title->HrefValue = "";

			// pay_grade
			$this->pay_grade->LinkCustomAttributes = "";
			$this->pay_grade->HrefValue = "";

			// work_station_id
			$this->work_station_id->LinkCustomAttributes = "";
			$this->work_station_id->HrefValue = "";

			// address1
			$this->address1->LinkCustomAttributes = "";
			$this->address1->HrefValue = "";

			// address2
			$this->address2->LinkCustomAttributes = "";
			$this->address2->HrefValue = "";

			// city
			$this->city->LinkCustomAttributes = "";
			$this->city->HrefValue = "";

			// country
			$this->country->LinkCustomAttributes = "";
			$this->country->HrefValue = "";

			// province
			$this->province->LinkCustomAttributes = "";
			$this->province->HrefValue = "";

			// postal_code
			$this->postal_code->LinkCustomAttributes = "";
			$this->postal_code->HrefValue = "";

			// home_phone
			$this->home_phone->LinkCustomAttributes = "";
			$this->home_phone->HrefValue = "";

			// mobile_phone
			$this->mobile_phone->LinkCustomAttributes = "";
			$this->mobile_phone->HrefValue = "";

			// work_phone
			$this->work_phone->LinkCustomAttributes = "";
			$this->work_phone->HrefValue = "";

			// work_email
			$this->work_email->LinkCustomAttributes = "";
			$this->work_email->HrefValue = "";

			// private_email
			$this->private_email->LinkCustomAttributes = "";
			$this->private_email->HrefValue = "";

			// joined_date
			$this->joined_date->LinkCustomAttributes = "";
			$this->joined_date->HrefValue = "";

			// confirmation_date
			$this->confirmation_date->LinkCustomAttributes = "";
			$this->confirmation_date->HrefValue = "";

			// supervisor
			$this->supervisor->LinkCustomAttributes = "";
			$this->supervisor->HrefValue = "";

			// indirect_supervisors
			$this->indirect_supervisors->LinkCustomAttributes = "";
			$this->indirect_supervisors->HrefValue = "";

			// department
			$this->department->LinkCustomAttributes = "";
			$this->department->HrefValue = "";

			// custom1
			$this->custom1->LinkCustomAttributes = "";
			$this->custom1->HrefValue = "";

			// custom2
			$this->custom2->LinkCustomAttributes = "";
			$this->custom2->HrefValue = "";

			// custom3
			$this->custom3->LinkCustomAttributes = "";
			$this->custom3->HrefValue = "";

			// custom4
			$this->custom4->LinkCustomAttributes = "";
			$this->custom4->HrefValue = "";

			// custom5
			$this->custom5->LinkCustomAttributes = "";
			$this->custom5->HrefValue = "";

			// custom6
			$this->custom6->LinkCustomAttributes = "";
			$this->custom6->HrefValue = "";

			// custom7
			$this->custom7->LinkCustomAttributes = "";
			$this->custom7->HrefValue = "";

			// custom8
			$this->custom8->LinkCustomAttributes = "";
			$this->custom8->HrefValue = "";

			// custom9
			$this->custom9->LinkCustomAttributes = "";
			$this->custom9->HrefValue = "";

			// custom10
			$this->custom10->LinkCustomAttributes = "";
			$this->custom10->HrefValue = "";

			// termination_date
			$this->termination_date->LinkCustomAttributes = "";
			$this->termination_date->HrefValue = "";

			// notes
			$this->notes->LinkCustomAttributes = "";
			$this->notes->HrefValue = "";

			// ethnicity
			$this->ethnicity->LinkCustomAttributes = "";
			$this->ethnicity->HrefValue = "";

			// immigration_status
			$this->immigration_status->LinkCustomAttributes = "";
			$this->immigration_status->HrefValue = "";

			// approver1
			$this->approver1->LinkCustomAttributes = "";
			$this->approver1->HrefValue = "";

			// approver2
			$this->approver2->LinkCustomAttributes = "";
			$this->approver2->HrefValue = "";

			// approver3
			$this->approver3->LinkCustomAttributes = "";
			$this->approver3->HrefValue = "";

			// status
			$this->status->LinkCustomAttributes = "";
			$this->status->HrefValue = "";

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

		// Initialize form error message
		$FormError = "";

		// Check if validation required
		if (!SERVER_VALIDATE)
			return ($FormError == "");
		if ($this->id->Required) {
			if (!$this->id->IsDetailKey && $this->id->FormValue != NULL && $this->id->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->id->caption(), $this->id->RequiredErrorMessage));
			}
		}
		if ($this->employee_id->Required) {
			if (!$this->employee_id->IsDetailKey && $this->employee_id->FormValue != NULL && $this->employee_id->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->employee_id->caption(), $this->employee_id->RequiredErrorMessage));
			}
		}
		if ($this->first_name->Required) {
			if (!$this->first_name->IsDetailKey && $this->first_name->FormValue != NULL && $this->first_name->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->first_name->caption(), $this->first_name->RequiredErrorMessage));
			}
		}
		if ($this->middle_name->Required) {
			if (!$this->middle_name->IsDetailKey && $this->middle_name->FormValue != NULL && $this->middle_name->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->middle_name->caption(), $this->middle_name->RequiredErrorMessage));
			}
		}
		if ($this->last_name->Required) {
			if (!$this->last_name->IsDetailKey && $this->last_name->FormValue != NULL && $this->last_name->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->last_name->caption(), $this->last_name->RequiredErrorMessage));
			}
		}
		if ($this->gender->Required) {
			if (!$this->gender->IsDetailKey && $this->gender->FormValue != NULL && $this->gender->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->gender->caption(), $this->gender->RequiredErrorMessage));
			}
		}
		if ($this->nationality->Required) {
			if (!$this->nationality->IsDetailKey && $this->nationality->FormValue != NULL && $this->nationality->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->nationality->caption(), $this->nationality->RequiredErrorMessage));
			}
		}
		if ($this->birthday->Required) {
			if (!$this->birthday->IsDetailKey && $this->birthday->FormValue != NULL && $this->birthday->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->birthday->caption(), $this->birthday->RequiredErrorMessage));
			}
		}
		if (!CheckDate($this->birthday->FormValue)) {
			AddMessage($FormError, $this->birthday->errorMessage());
		}
		if ($this->marital_status->Required) {
			if ($this->marital_status->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->marital_status->caption(), $this->marital_status->RequiredErrorMessage));
			}
		}
		if ($this->ssn_num->Required) {
			if (!$this->ssn_num->IsDetailKey && $this->ssn_num->FormValue != NULL && $this->ssn_num->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->ssn_num->caption(), $this->ssn_num->RequiredErrorMessage));
			}
		}
		if ($this->nic_num->Required) {
			if (!$this->nic_num->IsDetailKey && $this->nic_num->FormValue != NULL && $this->nic_num->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->nic_num->caption(), $this->nic_num->RequiredErrorMessage));
			}
		}
		if ($this->other_id->Required) {
			if (!$this->other_id->IsDetailKey && $this->other_id->FormValue != NULL && $this->other_id->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->other_id->caption(), $this->other_id->RequiredErrorMessage));
			}
		}
		if ($this->driving_license->Required) {
			if (!$this->driving_license->IsDetailKey && $this->driving_license->FormValue != NULL && $this->driving_license->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->driving_license->caption(), $this->driving_license->RequiredErrorMessage));
			}
		}
		if ($this->driving_license_exp_date->Required) {
			if (!$this->driving_license_exp_date->IsDetailKey && $this->driving_license_exp_date->FormValue != NULL && $this->driving_license_exp_date->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->driving_license_exp_date->caption(), $this->driving_license_exp_date->RequiredErrorMessage));
			}
		}
		if (!CheckDate($this->driving_license_exp_date->FormValue)) {
			AddMessage($FormError, $this->driving_license_exp_date->errorMessage());
		}
		if ($this->employment_status->Required) {
			if (!$this->employment_status->IsDetailKey && $this->employment_status->FormValue != NULL && $this->employment_status->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->employment_status->caption(), $this->employment_status->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->employment_status->FormValue)) {
			AddMessage($FormError, $this->employment_status->errorMessage());
		}
		if ($this->job_title->Required) {
			if (!$this->job_title->IsDetailKey && $this->job_title->FormValue != NULL && $this->job_title->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->job_title->caption(), $this->job_title->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->job_title->FormValue)) {
			AddMessage($FormError, $this->job_title->errorMessage());
		}
		if ($this->pay_grade->Required) {
			if (!$this->pay_grade->IsDetailKey && $this->pay_grade->FormValue != NULL && $this->pay_grade->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->pay_grade->caption(), $this->pay_grade->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->pay_grade->FormValue)) {
			AddMessage($FormError, $this->pay_grade->errorMessage());
		}
		if ($this->work_station_id->Required) {
			if (!$this->work_station_id->IsDetailKey && $this->work_station_id->FormValue != NULL && $this->work_station_id->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->work_station_id->caption(), $this->work_station_id->RequiredErrorMessage));
			}
		}
		if ($this->address1->Required) {
			if (!$this->address1->IsDetailKey && $this->address1->FormValue != NULL && $this->address1->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->address1->caption(), $this->address1->RequiredErrorMessage));
			}
		}
		if ($this->address2->Required) {
			if (!$this->address2->IsDetailKey && $this->address2->FormValue != NULL && $this->address2->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->address2->caption(), $this->address2->RequiredErrorMessage));
			}
		}
		if ($this->city->Required) {
			if (!$this->city->IsDetailKey && $this->city->FormValue != NULL && $this->city->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->city->caption(), $this->city->RequiredErrorMessage));
			}
		}
		if ($this->country->Required) {
			if (!$this->country->IsDetailKey && $this->country->FormValue != NULL && $this->country->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->country->caption(), $this->country->RequiredErrorMessage));
			}
		}
		if ($this->province->Required) {
			if (!$this->province->IsDetailKey && $this->province->FormValue != NULL && $this->province->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->province->caption(), $this->province->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->province->FormValue)) {
			AddMessage($FormError, $this->province->errorMessage());
		}
		if ($this->postal_code->Required) {
			if (!$this->postal_code->IsDetailKey && $this->postal_code->FormValue != NULL && $this->postal_code->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->postal_code->caption(), $this->postal_code->RequiredErrorMessage));
			}
		}
		if ($this->home_phone->Required) {
			if (!$this->home_phone->IsDetailKey && $this->home_phone->FormValue != NULL && $this->home_phone->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->home_phone->caption(), $this->home_phone->RequiredErrorMessage));
			}
		}
		if ($this->mobile_phone->Required) {
			if (!$this->mobile_phone->IsDetailKey && $this->mobile_phone->FormValue != NULL && $this->mobile_phone->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->mobile_phone->caption(), $this->mobile_phone->RequiredErrorMessage));
			}
		}
		if ($this->work_phone->Required) {
			if (!$this->work_phone->IsDetailKey && $this->work_phone->FormValue != NULL && $this->work_phone->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->work_phone->caption(), $this->work_phone->RequiredErrorMessage));
			}
		}
		if ($this->work_email->Required) {
			if (!$this->work_email->IsDetailKey && $this->work_email->FormValue != NULL && $this->work_email->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->work_email->caption(), $this->work_email->RequiredErrorMessage));
			}
		}
		if ($this->private_email->Required) {
			if (!$this->private_email->IsDetailKey && $this->private_email->FormValue != NULL && $this->private_email->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->private_email->caption(), $this->private_email->RequiredErrorMessage));
			}
		}
		if ($this->joined_date->Required) {
			if (!$this->joined_date->IsDetailKey && $this->joined_date->FormValue != NULL && $this->joined_date->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->joined_date->caption(), $this->joined_date->RequiredErrorMessage));
			}
		}
		if (!CheckDate($this->joined_date->FormValue)) {
			AddMessage($FormError, $this->joined_date->errorMessage());
		}
		if ($this->confirmation_date->Required) {
			if (!$this->confirmation_date->IsDetailKey && $this->confirmation_date->FormValue != NULL && $this->confirmation_date->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->confirmation_date->caption(), $this->confirmation_date->RequiredErrorMessage));
			}
		}
		if (!CheckDate($this->confirmation_date->FormValue)) {
			AddMessage($FormError, $this->confirmation_date->errorMessage());
		}
		if ($this->supervisor->Required) {
			if (!$this->supervisor->IsDetailKey && $this->supervisor->FormValue != NULL && $this->supervisor->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->supervisor->caption(), $this->supervisor->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->supervisor->FormValue)) {
			AddMessage($FormError, $this->supervisor->errorMessage());
		}
		if ($this->indirect_supervisors->Required) {
			if (!$this->indirect_supervisors->IsDetailKey && $this->indirect_supervisors->FormValue != NULL && $this->indirect_supervisors->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->indirect_supervisors->caption(), $this->indirect_supervisors->RequiredErrorMessage));
			}
		}
		if ($this->department->Required) {
			if (!$this->department->IsDetailKey && $this->department->FormValue != NULL && $this->department->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->department->caption(), $this->department->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->department->FormValue)) {
			AddMessage($FormError, $this->department->errorMessage());
		}
		if ($this->custom1->Required) {
			if (!$this->custom1->IsDetailKey && $this->custom1->FormValue != NULL && $this->custom1->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->custom1->caption(), $this->custom1->RequiredErrorMessage));
			}
		}
		if ($this->custom2->Required) {
			if (!$this->custom2->IsDetailKey && $this->custom2->FormValue != NULL && $this->custom2->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->custom2->caption(), $this->custom2->RequiredErrorMessage));
			}
		}
		if ($this->custom3->Required) {
			if (!$this->custom3->IsDetailKey && $this->custom3->FormValue != NULL && $this->custom3->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->custom3->caption(), $this->custom3->RequiredErrorMessage));
			}
		}
		if ($this->custom4->Required) {
			if (!$this->custom4->IsDetailKey && $this->custom4->FormValue != NULL && $this->custom4->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->custom4->caption(), $this->custom4->RequiredErrorMessage));
			}
		}
		if ($this->custom5->Required) {
			if (!$this->custom5->IsDetailKey && $this->custom5->FormValue != NULL && $this->custom5->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->custom5->caption(), $this->custom5->RequiredErrorMessage));
			}
		}
		if ($this->custom6->Required) {
			if (!$this->custom6->IsDetailKey && $this->custom6->FormValue != NULL && $this->custom6->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->custom6->caption(), $this->custom6->RequiredErrorMessage));
			}
		}
		if ($this->custom7->Required) {
			if (!$this->custom7->IsDetailKey && $this->custom7->FormValue != NULL && $this->custom7->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->custom7->caption(), $this->custom7->RequiredErrorMessage));
			}
		}
		if ($this->custom8->Required) {
			if (!$this->custom8->IsDetailKey && $this->custom8->FormValue != NULL && $this->custom8->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->custom8->caption(), $this->custom8->RequiredErrorMessage));
			}
		}
		if ($this->custom9->Required) {
			if (!$this->custom9->IsDetailKey && $this->custom9->FormValue != NULL && $this->custom9->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->custom9->caption(), $this->custom9->RequiredErrorMessage));
			}
		}
		if ($this->custom10->Required) {
			if (!$this->custom10->IsDetailKey && $this->custom10->FormValue != NULL && $this->custom10->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->custom10->caption(), $this->custom10->RequiredErrorMessage));
			}
		}
		if ($this->termination_date->Required) {
			if (!$this->termination_date->IsDetailKey && $this->termination_date->FormValue != NULL && $this->termination_date->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->termination_date->caption(), $this->termination_date->RequiredErrorMessage));
			}
		}
		if (!CheckDate($this->termination_date->FormValue)) {
			AddMessage($FormError, $this->termination_date->errorMessage());
		}
		if ($this->notes->Required) {
			if (!$this->notes->IsDetailKey && $this->notes->FormValue != NULL && $this->notes->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->notes->caption(), $this->notes->RequiredErrorMessage));
			}
		}
		if ($this->ethnicity->Required) {
			if (!$this->ethnicity->IsDetailKey && $this->ethnicity->FormValue != NULL && $this->ethnicity->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->ethnicity->caption(), $this->ethnicity->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->ethnicity->FormValue)) {
			AddMessage($FormError, $this->ethnicity->errorMessage());
		}
		if ($this->immigration_status->Required) {
			if (!$this->immigration_status->IsDetailKey && $this->immigration_status->FormValue != NULL && $this->immigration_status->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->immigration_status->caption(), $this->immigration_status->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->immigration_status->FormValue)) {
			AddMessage($FormError, $this->immigration_status->errorMessage());
		}
		if ($this->approver1->Required) {
			if (!$this->approver1->IsDetailKey && $this->approver1->FormValue != NULL && $this->approver1->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->approver1->caption(), $this->approver1->RequiredErrorMessage));
			}
		}
		if ($this->approver2->Required) {
			if (!$this->approver2->IsDetailKey && $this->approver2->FormValue != NULL && $this->approver2->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->approver2->caption(), $this->approver2->RequiredErrorMessage));
			}
		}
		if ($this->approver3->Required) {
			if (!$this->approver3->IsDetailKey && $this->approver3->FormValue != NULL && $this->approver3->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->approver3->caption(), $this->approver3->RequiredErrorMessage));
			}
		}
		if ($this->status->Required) {
			if (!$this->status->IsDetailKey && $this->status->FormValue != NULL && $this->status->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->status->caption(), $this->status->RequiredErrorMessage));
			}
		}
		if ($this->HospID->Required) {
			if (!$this->HospID->IsDetailKey && $this->HospID->FormValue != NULL && $this->HospID->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->HospID->caption(), $this->HospID->RequiredErrorMessage));
			}
		}

		// Validate detail grid
		$detailTblVar = explode(",", $this->getCurrentDetailTable());
		if (in_array("employee_address", $detailTblVar) && $GLOBALS["employee_address"]->DetailAdd) {
			if (!isset($GLOBALS["employee_address_grid"]))
				$GLOBALS["employee_address_grid"] = new employee_address_grid(); // Get detail page object
			$GLOBALS["employee_address_grid"]->validateGridForm();
		}
		if (in_array("employee_telephone", $detailTblVar) && $GLOBALS["employee_telephone"]->DetailAdd) {
			if (!isset($GLOBALS["employee_telephone_grid"]))
				$GLOBALS["employee_telephone_grid"] = new employee_telephone_grid(); // Get detail page object
			$GLOBALS["employee_telephone_grid"]->validateGridForm();
		}
		if (in_array("employee_email", $detailTblVar) && $GLOBALS["employee_email"]->DetailAdd) {
			if (!isset($GLOBALS["employee_email_grid"]))
				$GLOBALS["employee_email_grid"] = new employee_email_grid(); // Get detail page object
			$GLOBALS["employee_email_grid"]->validateGridForm();
		}
		if (in_array("employee_has_degree", $detailTblVar) && $GLOBALS["employee_has_degree"]->DetailAdd) {
			if (!isset($GLOBALS["employee_has_degree_grid"]))
				$GLOBALS["employee_has_degree_grid"] = new employee_has_degree_grid(); // Get detail page object
			$GLOBALS["employee_has_degree_grid"]->validateGridForm();
		}
		if (in_array("employee_has_experience", $detailTblVar) && $GLOBALS["employee_has_experience"]->DetailAdd) {
			if (!isset($GLOBALS["employee_has_experience_grid"]))
				$GLOBALS["employee_has_experience_grid"] = new employee_has_experience_grid(); // Get detail page object
			$GLOBALS["employee_has_experience_grid"]->validateGridForm();
		}
		if (in_array("employee_document", $detailTblVar) && $GLOBALS["employee_document"]->DetailAdd) {
			if (!isset($GLOBALS["employee_document_grid"]))
				$GLOBALS["employee_document_grid"] = new employee_document_grid(); // Get detail page object
			$GLOBALS["employee_document_grid"]->validateGridForm();
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

	// Add record
	protected function addRow($rsold = NULL)
	{
		global $Language, $Security;
		if ($this->employee_id->CurrentValue <> "") { // Check field with unique index
			$filter = "(employee_id = '" . AdjustSql($this->employee_id->CurrentValue, $this->Dbid) . "')";
			$rsChk = $this->loadRs($filter);
			if ($rsChk && !$rsChk->EOF) {
				$idxErrMsg = str_replace("%f", $this->employee_id->caption(), $Language->phrase("DupIndex"));
				$idxErrMsg = str_replace("%v", $this->employee_id->CurrentValue, $idxErrMsg);
				$this->setFailureMessage($idxErrMsg);
				$rsChk->close();
				return FALSE;
			}
		}
		$conn = &$this->getConnection();

		// Begin transaction
		if ($this->getCurrentDetailTable() <> "")
			$conn->beginTrans();

		// Load db values from rsold
		$this->loadDbValues($rsold);
		if ($rsold) {
		}
		$rsnew = [];

		// employee_id
		$this->employee_id->setDbValueDef($rsnew, $this->employee_id->CurrentValue, NULL, FALSE);

		// first_name
		$this->first_name->setDbValueDef($rsnew, $this->first_name->CurrentValue, "", FALSE);

		// middle_name
		$this->middle_name->setDbValueDef($rsnew, $this->middle_name->CurrentValue, NULL, FALSE);

		// last_name
		$this->last_name->setDbValueDef($rsnew, $this->last_name->CurrentValue, NULL, FALSE);

		// gender
		$this->gender->setDbValueDef($rsnew, $this->gender->CurrentValue, NULL, FALSE);

		// nationality
		$this->nationality->setDbValueDef($rsnew, $this->nationality->CurrentValue, NULL, FALSE);

		// birthday
		$this->birthday->setDbValueDef($rsnew, UnFormatDateTime($this->birthday->CurrentValue, 0), NULL, FALSE);

		// marital_status
		$this->marital_status->setDbValueDef($rsnew, $this->marital_status->CurrentValue, NULL, FALSE);

		// ssn_num
		$this->ssn_num->setDbValueDef($rsnew, $this->ssn_num->CurrentValue, NULL, FALSE);

		// nic_num
		$this->nic_num->setDbValueDef($rsnew, $this->nic_num->CurrentValue, NULL, FALSE);

		// other_id
		$this->other_id->setDbValueDef($rsnew, $this->other_id->CurrentValue, NULL, FALSE);

		// driving_license
		$this->driving_license->setDbValueDef($rsnew, $this->driving_license->CurrentValue, NULL, FALSE);

		// driving_license_exp_date
		$this->driving_license_exp_date->setDbValueDef($rsnew, UnFormatDateTime($this->driving_license_exp_date->CurrentValue, 0), NULL, FALSE);

		// employment_status
		$this->employment_status->setDbValueDef($rsnew, $this->employment_status->CurrentValue, NULL, FALSE);

		// job_title
		$this->job_title->setDbValueDef($rsnew, $this->job_title->CurrentValue, NULL, FALSE);

		// pay_grade
		$this->pay_grade->setDbValueDef($rsnew, $this->pay_grade->CurrentValue, NULL, FALSE);

		// work_station_id
		$this->work_station_id->setDbValueDef($rsnew, $this->work_station_id->CurrentValue, NULL, FALSE);

		// address1
		$this->address1->setDbValueDef($rsnew, $this->address1->CurrentValue, NULL, FALSE);

		// address2
		$this->address2->setDbValueDef($rsnew, $this->address2->CurrentValue, NULL, FALSE);

		// city
		$this->city->setDbValueDef($rsnew, $this->city->CurrentValue, NULL, FALSE);

		// country
		$this->country->setDbValueDef($rsnew, $this->country->CurrentValue, NULL, FALSE);

		// province
		$this->province->setDbValueDef($rsnew, $this->province->CurrentValue, NULL, FALSE);

		// postal_code
		$this->postal_code->setDbValueDef($rsnew, $this->postal_code->CurrentValue, NULL, FALSE);

		// home_phone
		$this->home_phone->setDbValueDef($rsnew, $this->home_phone->CurrentValue, NULL, FALSE);

		// mobile_phone
		$this->mobile_phone->setDbValueDef($rsnew, $this->mobile_phone->CurrentValue, NULL, FALSE);

		// work_phone
		$this->work_phone->setDbValueDef($rsnew, $this->work_phone->CurrentValue, NULL, FALSE);

		// work_email
		$this->work_email->setDbValueDef($rsnew, $this->work_email->CurrentValue, NULL, FALSE);

		// private_email
		$this->private_email->setDbValueDef($rsnew, $this->private_email->CurrentValue, NULL, FALSE);

		// joined_date
		$this->joined_date->setDbValueDef($rsnew, UnFormatDateTime($this->joined_date->CurrentValue, 0), NULL, FALSE);

		// confirmation_date
		$this->confirmation_date->setDbValueDef($rsnew, UnFormatDateTime($this->confirmation_date->CurrentValue, 0), NULL, FALSE);

		// supervisor
		$this->supervisor->setDbValueDef($rsnew, $this->supervisor->CurrentValue, NULL, FALSE);

		// indirect_supervisors
		$this->indirect_supervisors->setDbValueDef($rsnew, $this->indirect_supervisors->CurrentValue, NULL, FALSE);

		// department
		$this->department->setDbValueDef($rsnew, $this->department->CurrentValue, NULL, FALSE);

		// custom1
		$this->custom1->setDbValueDef($rsnew, $this->custom1->CurrentValue, NULL, FALSE);

		// custom2
		$this->custom2->setDbValueDef($rsnew, $this->custom2->CurrentValue, NULL, FALSE);

		// custom3
		$this->custom3->setDbValueDef($rsnew, $this->custom3->CurrentValue, NULL, FALSE);

		// custom4
		$this->custom4->setDbValueDef($rsnew, $this->custom4->CurrentValue, NULL, FALSE);

		// custom5
		$this->custom5->setDbValueDef($rsnew, $this->custom5->CurrentValue, NULL, FALSE);

		// custom6
		$this->custom6->setDbValueDef($rsnew, $this->custom6->CurrentValue, NULL, FALSE);

		// custom7
		$this->custom7->setDbValueDef($rsnew, $this->custom7->CurrentValue, NULL, FALSE);

		// custom8
		$this->custom8->setDbValueDef($rsnew, $this->custom8->CurrentValue, NULL, FALSE);

		// custom9
		$this->custom9->setDbValueDef($rsnew, $this->custom9->CurrentValue, NULL, FALSE);

		// custom10
		$this->custom10->setDbValueDef($rsnew, $this->custom10->CurrentValue, NULL, FALSE);

		// termination_date
		$this->termination_date->setDbValueDef($rsnew, UnFormatDateTime($this->termination_date->CurrentValue, 0), NULL, FALSE);

		// notes
		$this->notes->setDbValueDef($rsnew, $this->notes->CurrentValue, NULL, FALSE);

		// ethnicity
		$this->ethnicity->setDbValueDef($rsnew, $this->ethnicity->CurrentValue, NULL, FALSE);

		// immigration_status
		$this->immigration_status->setDbValueDef($rsnew, $this->immigration_status->CurrentValue, NULL, FALSE);

		// approver1
		$this->approver1->setDbValueDef($rsnew, $this->approver1->CurrentValue, NULL, FALSE);

		// approver2
		$this->approver2->setDbValueDef($rsnew, $this->approver2->CurrentValue, NULL, FALSE);

		// approver3
		$this->approver3->setDbValueDef($rsnew, $this->approver3->CurrentValue, NULL, FALSE);

		// status
		$this->status->setDbValueDef($rsnew, ActiveStatusbit(), NULL);
		$rsnew['status'] = &$this->status->DbValue;

		// HospID
		$this->HospID->setDbValueDef($rsnew, HospitalID(), NULL);
		$rsnew['HospID'] = &$this->HospID->DbValue;

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

		// Add detail records
		if ($addRow) {
			$detailTblVar = explode(",", $this->getCurrentDetailTable());
			if (in_array("employee_address", $detailTblVar) && $GLOBALS["employee_address"]->DetailAdd) {
				$GLOBALS["employee_address"]->employee_id->setSessionValue($this->id->CurrentValue); // Set master key
				if (!isset($GLOBALS["employee_address_grid"]))
					$GLOBALS["employee_address_grid"] = new employee_address_grid(); // Get detail page object
				$Security->loadCurrentUserLevel($this->ProjectID . "employee_address"); // Load user level of detail table
				$addRow = $GLOBALS["employee_address_grid"]->gridInsert();
				$Security->loadCurrentUserLevel($this->ProjectID . $this->TableName); // Restore user level of master table
				if (!$addRow)
					$GLOBALS["employee_address"]->employee_id->setSessionValue(""); // Clear master key if insert failed
			}
			if (in_array("employee_telephone", $detailTblVar) && $GLOBALS["employee_telephone"]->DetailAdd) {
				$GLOBALS["employee_telephone"]->employee_id->setSessionValue($this->id->CurrentValue); // Set master key
				if (!isset($GLOBALS["employee_telephone_grid"]))
					$GLOBALS["employee_telephone_grid"] = new employee_telephone_grid(); // Get detail page object
				$Security->loadCurrentUserLevel($this->ProjectID . "employee_telephone"); // Load user level of detail table
				$addRow = $GLOBALS["employee_telephone_grid"]->gridInsert();
				$Security->loadCurrentUserLevel($this->ProjectID . $this->TableName); // Restore user level of master table
				if (!$addRow)
					$GLOBALS["employee_telephone"]->employee_id->setSessionValue(""); // Clear master key if insert failed
			}
			if (in_array("employee_email", $detailTblVar) && $GLOBALS["employee_email"]->DetailAdd) {
				$GLOBALS["employee_email"]->employee_id->setSessionValue($this->id->CurrentValue); // Set master key
				if (!isset($GLOBALS["employee_email_grid"]))
					$GLOBALS["employee_email_grid"] = new employee_email_grid(); // Get detail page object
				$Security->loadCurrentUserLevel($this->ProjectID . "employee_email"); // Load user level of detail table
				$addRow = $GLOBALS["employee_email_grid"]->gridInsert();
				$Security->loadCurrentUserLevel($this->ProjectID . $this->TableName); // Restore user level of master table
				if (!$addRow)
					$GLOBALS["employee_email"]->employee_id->setSessionValue(""); // Clear master key if insert failed
			}
			if (in_array("employee_has_degree", $detailTblVar) && $GLOBALS["employee_has_degree"]->DetailAdd) {
				$GLOBALS["employee_has_degree"]->employee_id->setSessionValue($this->id->CurrentValue); // Set master key
				if (!isset($GLOBALS["employee_has_degree_grid"]))
					$GLOBALS["employee_has_degree_grid"] = new employee_has_degree_grid(); // Get detail page object
				$Security->loadCurrentUserLevel($this->ProjectID . "employee_has_degree"); // Load user level of detail table
				$addRow = $GLOBALS["employee_has_degree_grid"]->gridInsert();
				$Security->loadCurrentUserLevel($this->ProjectID . $this->TableName); // Restore user level of master table
				if (!$addRow)
					$GLOBALS["employee_has_degree"]->employee_id->setSessionValue(""); // Clear master key if insert failed
			}
			if (in_array("employee_has_experience", $detailTblVar) && $GLOBALS["employee_has_experience"]->DetailAdd) {
				$GLOBALS["employee_has_experience"]->employee_id->setSessionValue($this->id->CurrentValue); // Set master key
				if (!isset($GLOBALS["employee_has_experience_grid"]))
					$GLOBALS["employee_has_experience_grid"] = new employee_has_experience_grid(); // Get detail page object
				$Security->loadCurrentUserLevel($this->ProjectID . "employee_has_experience"); // Load user level of detail table
				$addRow = $GLOBALS["employee_has_experience_grid"]->gridInsert();
				$Security->loadCurrentUserLevel($this->ProjectID . $this->TableName); // Restore user level of master table
				if (!$addRow)
					$GLOBALS["employee_has_experience"]->employee_id->setSessionValue(""); // Clear master key if insert failed
			}
			if (in_array("employee_document", $detailTblVar) && $GLOBALS["employee_document"]->DetailAdd) {
				$GLOBALS["employee_document"]->employee_id->setSessionValue($this->id->CurrentValue); // Set master key
				if (!isset($GLOBALS["employee_document_grid"]))
					$GLOBALS["employee_document_grid"] = new employee_document_grid(); // Get detail page object
				$Security->loadCurrentUserLevel($this->ProjectID . "employee_document"); // Load user level of detail table
				$addRow = $GLOBALS["employee_document_grid"]->gridInsert();
				$Security->loadCurrentUserLevel($this->ProjectID . $this->TableName); // Restore user level of master table
				if (!$addRow)
					$GLOBALS["employee_document"]->employee_id->setSessionValue(""); // Clear master key if insert failed
			}
		}

		// Commit/Rollback transaction
		if ($this->getCurrentDetailTable() <> "") {
			if ($addRow) {
				$conn->commitTrans(); // Commit transaction
			} else {
				$conn->rollbackTrans(); // Rollback transaction
			}
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

	// Set up detail parms based on QueryString
	protected function setupDetailParms()
	{

		// Get the keys for master table
		if (Get(TABLE_SHOW_DETAIL) !== NULL) {
			$detailTblVar = Get(TABLE_SHOW_DETAIL);
			$this->setCurrentDetailTable($detailTblVar);
		} else {
			$detailTblVar = $this->getCurrentDetailTable();
		}
		if ($detailTblVar <> "") {
			$detailTblVar = explode(",", $detailTblVar);
			if (in_array("employee_address", $detailTblVar)) {
				if (!isset($GLOBALS["employee_address_grid"]))
					$GLOBALS["employee_address_grid"] = new employee_address_grid();
				if ($GLOBALS["employee_address_grid"]->DetailAdd) {
					if ($this->CopyRecord)
						$GLOBALS["employee_address_grid"]->CurrentMode = "copy";
					else
						$GLOBALS["employee_address_grid"]->CurrentMode = "add";
					$GLOBALS["employee_address_grid"]->CurrentAction = "gridadd";

					// Save current master table to detail table
					$GLOBALS["employee_address_grid"]->setCurrentMasterTable($this->TableVar);
					$GLOBALS["employee_address_grid"]->setStartRecordNumber(1);
					$GLOBALS["employee_address_grid"]->employee_id->IsDetailKey = TRUE;
					$GLOBALS["employee_address_grid"]->employee_id->CurrentValue = $this->id->CurrentValue;
					$GLOBALS["employee_address_grid"]->employee_id->setSessionValue($GLOBALS["employee_address_grid"]->employee_id->CurrentValue);
				}
			}
			if (in_array("employee_telephone", $detailTblVar)) {
				if (!isset($GLOBALS["employee_telephone_grid"]))
					$GLOBALS["employee_telephone_grid"] = new employee_telephone_grid();
				if ($GLOBALS["employee_telephone_grid"]->DetailAdd) {
					if ($this->CopyRecord)
						$GLOBALS["employee_telephone_grid"]->CurrentMode = "copy";
					else
						$GLOBALS["employee_telephone_grid"]->CurrentMode = "add";
					$GLOBALS["employee_telephone_grid"]->CurrentAction = "gridadd";

					// Save current master table to detail table
					$GLOBALS["employee_telephone_grid"]->setCurrentMasterTable($this->TableVar);
					$GLOBALS["employee_telephone_grid"]->setStartRecordNumber(1);
					$GLOBALS["employee_telephone_grid"]->employee_id->IsDetailKey = TRUE;
					$GLOBALS["employee_telephone_grid"]->employee_id->CurrentValue = $this->id->CurrentValue;
					$GLOBALS["employee_telephone_grid"]->employee_id->setSessionValue($GLOBALS["employee_telephone_grid"]->employee_id->CurrentValue);
				}
			}
			if (in_array("employee_email", $detailTblVar)) {
				if (!isset($GLOBALS["employee_email_grid"]))
					$GLOBALS["employee_email_grid"] = new employee_email_grid();
				if ($GLOBALS["employee_email_grid"]->DetailAdd) {
					if ($this->CopyRecord)
						$GLOBALS["employee_email_grid"]->CurrentMode = "copy";
					else
						$GLOBALS["employee_email_grid"]->CurrentMode = "add";
					$GLOBALS["employee_email_grid"]->CurrentAction = "gridadd";

					// Save current master table to detail table
					$GLOBALS["employee_email_grid"]->setCurrentMasterTable($this->TableVar);
					$GLOBALS["employee_email_grid"]->setStartRecordNumber(1);
					$GLOBALS["employee_email_grid"]->employee_id->IsDetailKey = TRUE;
					$GLOBALS["employee_email_grid"]->employee_id->CurrentValue = $this->id->CurrentValue;
					$GLOBALS["employee_email_grid"]->employee_id->setSessionValue($GLOBALS["employee_email_grid"]->employee_id->CurrentValue);
				}
			}
			if (in_array("employee_has_degree", $detailTblVar)) {
				if (!isset($GLOBALS["employee_has_degree_grid"]))
					$GLOBALS["employee_has_degree_grid"] = new employee_has_degree_grid();
				if ($GLOBALS["employee_has_degree_grid"]->DetailAdd) {
					if ($this->CopyRecord)
						$GLOBALS["employee_has_degree_grid"]->CurrentMode = "copy";
					else
						$GLOBALS["employee_has_degree_grid"]->CurrentMode = "add";
					$GLOBALS["employee_has_degree_grid"]->CurrentAction = "gridadd";

					// Save current master table to detail table
					$GLOBALS["employee_has_degree_grid"]->setCurrentMasterTable($this->TableVar);
					$GLOBALS["employee_has_degree_grid"]->setStartRecordNumber(1);
					$GLOBALS["employee_has_degree_grid"]->employee_id->IsDetailKey = TRUE;
					$GLOBALS["employee_has_degree_grid"]->employee_id->CurrentValue = $this->id->CurrentValue;
					$GLOBALS["employee_has_degree_grid"]->employee_id->setSessionValue($GLOBALS["employee_has_degree_grid"]->employee_id->CurrentValue);
				}
			}
			if (in_array("employee_has_experience", $detailTblVar)) {
				if (!isset($GLOBALS["employee_has_experience_grid"]))
					$GLOBALS["employee_has_experience_grid"] = new employee_has_experience_grid();
				if ($GLOBALS["employee_has_experience_grid"]->DetailAdd) {
					if ($this->CopyRecord)
						$GLOBALS["employee_has_experience_grid"]->CurrentMode = "copy";
					else
						$GLOBALS["employee_has_experience_grid"]->CurrentMode = "add";
					$GLOBALS["employee_has_experience_grid"]->CurrentAction = "gridadd";

					// Save current master table to detail table
					$GLOBALS["employee_has_experience_grid"]->setCurrentMasterTable($this->TableVar);
					$GLOBALS["employee_has_experience_grid"]->setStartRecordNumber(1);
					$GLOBALS["employee_has_experience_grid"]->employee_id->IsDetailKey = TRUE;
					$GLOBALS["employee_has_experience_grid"]->employee_id->CurrentValue = $this->id->CurrentValue;
					$GLOBALS["employee_has_experience_grid"]->employee_id->setSessionValue($GLOBALS["employee_has_experience_grid"]->employee_id->CurrentValue);
				}
			}
			if (in_array("employee_document", $detailTblVar)) {
				if (!isset($GLOBALS["employee_document_grid"]))
					$GLOBALS["employee_document_grid"] = new employee_document_grid();
				if ($GLOBALS["employee_document_grid"]->DetailAdd) {
					if ($this->CopyRecord)
						$GLOBALS["employee_document_grid"]->CurrentMode = "copy";
					else
						$GLOBALS["employee_document_grid"]->CurrentMode = "add";
					$GLOBALS["employee_document_grid"]->CurrentAction = "gridadd";

					// Save current master table to detail table
					$GLOBALS["employee_document_grid"]->setCurrentMasterTable($this->TableVar);
					$GLOBALS["employee_document_grid"]->setStartRecordNumber(1);
					$GLOBALS["employee_document_grid"]->employee_id->IsDetailKey = TRUE;
					$GLOBALS["employee_document_grid"]->employee_id->CurrentValue = $this->id->CurrentValue;
					$GLOBALS["employee_document_grid"]->employee_id->setSessionValue($GLOBALS["employee_document_grid"]->employee_id->CurrentValue);
				}
			}
		}
	}

	// Set up Breadcrumb
	protected function setupBreadcrumb()
	{
		global $Breadcrumb, $Language;
		$Breadcrumb = new Breadcrumb();
		$url = substr(CurrentUrl(), strrpos(CurrentUrl(), "/")+1);
		$Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("employeelist.php"), "", $this->TableVar, TRUE);
		$pageId = ($this->isCopy()) ? "Copy" : "Add";
		$Breadcrumb->add("add", $pageId, $url);
	}

	// Set up multi pages
	protected function setupMultiPages()
	{
		$pages = new SubPages();
		$pages->Style = "tabs";
		$pages->add(0);
		$pages->add(1);
		$pages->add(2);
		$pages->add(3);
		$pages->add(4);
		$pages->add(5);
		$pages->add(6);
		$this->MultiPages = $pages;
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

	// Form Custom Validate event
	function Form_CustomValidate(&$customError) {

		// Return error message in CustomError
		return TRUE;
	}
}
?>
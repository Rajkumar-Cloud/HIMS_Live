<?php
namespace PHPMaker2019\HIMS;

/**
 * Page class
 */
class hr_leavetypes_add extends hr_leavetypes
{

	// Page ID
	public $PageID = "add";

	// Project ID
	public $ProjectID = "{EA4F6D13-AF8F-428D-9EA7-BA88D1107EC3}";

	// Table name
	public $TableName = 'hr_leavetypes';

	// Page object name
	public $PageObjName = "hr_leavetypes_add";

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

		// Table object (hr_leavetypes)
		if (!isset($GLOBALS["hr_leavetypes"]) || get_class($GLOBALS["hr_leavetypes"]) == PROJECT_NAMESPACE . "hr_leavetypes") {
			$GLOBALS["hr_leavetypes"] = &$this;
			$GLOBALS["Table"] = &$GLOBALS["hr_leavetypes"];
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
			define(PROJECT_NAMESPACE . "TABLE_NAME", 'hr_leavetypes');

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
		global $EXPORT, $hr_leavetypes;
		if ($this->CustomExport && $this->CustomExport == $this->Export && array_key_exists($this->CustomExport, $EXPORT)) {
				$content = ob_get_contents();
			if ($ExportFileName == "")
				$ExportFileName = $this->TableVar;
			$class = PROJECT_NAMESPACE . $EXPORT[$this->CustomExport];
			if (class_exists($class)) {
				$doc = new $class($hr_leavetypes);
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
					if ($pageName == "hr_leavetypesview.php")
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
					$this->terminate(GetUrl("hr_leavetypeslist.php"));
				else
					$this->terminate(GetUrl("login.php"));
				return;
			}
		}

		// Create form object
		$CurrentForm = new HttpForm();
		$this->CurrentAction = Param("action"); // Set up current action
		$this->id->Visible = FALSE;
		$this->name->setVisibility();
		$this->supervisor_leave_assign->setVisibility();
		$this->employee_can_apply->setVisibility();
		$this->apply_beyond_current->setVisibility();
		$this->leave_accrue->setVisibility();
		$this->carried_forward->setVisibility();
		$this->default_per_year->setVisibility();
		$this->carried_forward_percentage->setVisibility();
		$this->carried_forward_leave_availability->setVisibility();
		$this->propotionate_on_joined_date->setVisibility();
		$this->send_notification_emails->setVisibility();
		$this->leave_group->setVisibility();
		$this->leave_color->setVisibility();
		$this->max_carried_forward_amount->setVisibility();
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
					$this->terminate("hr_leavetypeslist.php"); // No matching record, return to list
				}
				break;
			case "insert": // Add new record
				$this->SendEmail = TRUE; // Send email on add success
				if ($this->addRow($this->OldRecordset)) { // Add successful
					if ($this->getSuccessMessage() == "")
						$this->setSuccessMessage($Language->phrase("AddSuccess")); // Set up success message
					$returnUrl = $this->getReturnUrl();
					if (GetPageName($returnUrl) == "hr_leavetypeslist.php")
						$returnUrl = $this->addMasterUrl($returnUrl); // List page, return to List page with correct master key if necessary
					elseif (GetPageName($returnUrl) == "hr_leavetypesview.php")
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
		$this->name->CurrentValue = NULL;
		$this->name->OldValue = $this->name->CurrentValue;
		$this->supervisor_leave_assign->CurrentValue = "Yes";
		$this->employee_can_apply->CurrentValue = "Yes";
		$this->apply_beyond_current->CurrentValue = "Yes";
		$this->leave_accrue->CurrentValue = "No";
		$this->carried_forward->CurrentValue = "No";
		$this->default_per_year->CurrentValue = NULL;
		$this->default_per_year->OldValue = $this->default_per_year->CurrentValue;
		$this->carried_forward_percentage->CurrentValue = 0;
		$this->carried_forward_leave_availability->CurrentValue = 365;
		$this->propotionate_on_joined_date->CurrentValue = "No";
		$this->send_notification_emails->CurrentValue = "Yes";
		$this->leave_group->CurrentValue = NULL;
		$this->leave_group->OldValue = $this->leave_group->CurrentValue;
		$this->leave_color->CurrentValue = NULL;
		$this->leave_color->OldValue = $this->leave_color->CurrentValue;
		$this->max_carried_forward_amount->CurrentValue = 0;
		$this->HospID->CurrentValue = NULL;
		$this->HospID->OldValue = $this->HospID->CurrentValue;
	}

	// Load form values
	protected function loadFormValues()
	{

		// Load from form
		global $CurrentForm;

		// Check field name 'name' first before field var 'x_name'
		$val = $CurrentForm->hasValue("name") ? $CurrentForm->getValue("name") : $CurrentForm->getValue("x_name");
		if (!$this->name->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->name->Visible = FALSE; // Disable update for API request
			else
				$this->name->setFormValue($val);
		}

		// Check field name 'supervisor_leave_assign' first before field var 'x_supervisor_leave_assign'
		$val = $CurrentForm->hasValue("supervisor_leave_assign") ? $CurrentForm->getValue("supervisor_leave_assign") : $CurrentForm->getValue("x_supervisor_leave_assign");
		if (!$this->supervisor_leave_assign->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->supervisor_leave_assign->Visible = FALSE; // Disable update for API request
			else
				$this->supervisor_leave_assign->setFormValue($val);
		}

		// Check field name 'employee_can_apply' first before field var 'x_employee_can_apply'
		$val = $CurrentForm->hasValue("employee_can_apply") ? $CurrentForm->getValue("employee_can_apply") : $CurrentForm->getValue("x_employee_can_apply");
		if (!$this->employee_can_apply->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->employee_can_apply->Visible = FALSE; // Disable update for API request
			else
				$this->employee_can_apply->setFormValue($val);
		}

		// Check field name 'apply_beyond_current' first before field var 'x_apply_beyond_current'
		$val = $CurrentForm->hasValue("apply_beyond_current") ? $CurrentForm->getValue("apply_beyond_current") : $CurrentForm->getValue("x_apply_beyond_current");
		if (!$this->apply_beyond_current->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->apply_beyond_current->Visible = FALSE; // Disable update for API request
			else
				$this->apply_beyond_current->setFormValue($val);
		}

		// Check field name 'leave_accrue' first before field var 'x_leave_accrue'
		$val = $CurrentForm->hasValue("leave_accrue") ? $CurrentForm->getValue("leave_accrue") : $CurrentForm->getValue("x_leave_accrue");
		if (!$this->leave_accrue->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->leave_accrue->Visible = FALSE; // Disable update for API request
			else
				$this->leave_accrue->setFormValue($val);
		}

		// Check field name 'carried_forward' first before field var 'x_carried_forward'
		$val = $CurrentForm->hasValue("carried_forward") ? $CurrentForm->getValue("carried_forward") : $CurrentForm->getValue("x_carried_forward");
		if (!$this->carried_forward->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->carried_forward->Visible = FALSE; // Disable update for API request
			else
				$this->carried_forward->setFormValue($val);
		}

		// Check field name 'default_per_year' first before field var 'x_default_per_year'
		$val = $CurrentForm->hasValue("default_per_year") ? $CurrentForm->getValue("default_per_year") : $CurrentForm->getValue("x_default_per_year");
		if (!$this->default_per_year->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->default_per_year->Visible = FALSE; // Disable update for API request
			else
				$this->default_per_year->setFormValue($val);
		}

		// Check field name 'carried_forward_percentage' first before field var 'x_carried_forward_percentage'
		$val = $CurrentForm->hasValue("carried_forward_percentage") ? $CurrentForm->getValue("carried_forward_percentage") : $CurrentForm->getValue("x_carried_forward_percentage");
		if (!$this->carried_forward_percentage->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->carried_forward_percentage->Visible = FALSE; // Disable update for API request
			else
				$this->carried_forward_percentage->setFormValue($val);
		}

		// Check field name 'carried_forward_leave_availability' first before field var 'x_carried_forward_leave_availability'
		$val = $CurrentForm->hasValue("carried_forward_leave_availability") ? $CurrentForm->getValue("carried_forward_leave_availability") : $CurrentForm->getValue("x_carried_forward_leave_availability");
		if (!$this->carried_forward_leave_availability->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->carried_forward_leave_availability->Visible = FALSE; // Disable update for API request
			else
				$this->carried_forward_leave_availability->setFormValue($val);
		}

		// Check field name 'propotionate_on_joined_date' first before field var 'x_propotionate_on_joined_date'
		$val = $CurrentForm->hasValue("propotionate_on_joined_date") ? $CurrentForm->getValue("propotionate_on_joined_date") : $CurrentForm->getValue("x_propotionate_on_joined_date");
		if (!$this->propotionate_on_joined_date->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->propotionate_on_joined_date->Visible = FALSE; // Disable update for API request
			else
				$this->propotionate_on_joined_date->setFormValue($val);
		}

		// Check field name 'send_notification_emails' first before field var 'x_send_notification_emails'
		$val = $CurrentForm->hasValue("send_notification_emails") ? $CurrentForm->getValue("send_notification_emails") : $CurrentForm->getValue("x_send_notification_emails");
		if (!$this->send_notification_emails->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->send_notification_emails->Visible = FALSE; // Disable update for API request
			else
				$this->send_notification_emails->setFormValue($val);
		}

		// Check field name 'leave_group' first before field var 'x_leave_group'
		$val = $CurrentForm->hasValue("leave_group") ? $CurrentForm->getValue("leave_group") : $CurrentForm->getValue("x_leave_group");
		if (!$this->leave_group->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->leave_group->Visible = FALSE; // Disable update for API request
			else
				$this->leave_group->setFormValue($val);
		}

		// Check field name 'leave_color' first before field var 'x_leave_color'
		$val = $CurrentForm->hasValue("leave_color") ? $CurrentForm->getValue("leave_color") : $CurrentForm->getValue("x_leave_color");
		if (!$this->leave_color->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->leave_color->Visible = FALSE; // Disable update for API request
			else
				$this->leave_color->setFormValue($val);
		}

		// Check field name 'max_carried_forward_amount' first before field var 'x_max_carried_forward_amount'
		$val = $CurrentForm->hasValue("max_carried_forward_amount") ? $CurrentForm->getValue("max_carried_forward_amount") : $CurrentForm->getValue("x_max_carried_forward_amount");
		if (!$this->max_carried_forward_amount->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->max_carried_forward_amount->Visible = FALSE; // Disable update for API request
			else
				$this->max_carried_forward_amount->setFormValue($val);
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
		$this->name->CurrentValue = $this->name->FormValue;
		$this->supervisor_leave_assign->CurrentValue = $this->supervisor_leave_assign->FormValue;
		$this->employee_can_apply->CurrentValue = $this->employee_can_apply->FormValue;
		$this->apply_beyond_current->CurrentValue = $this->apply_beyond_current->FormValue;
		$this->leave_accrue->CurrentValue = $this->leave_accrue->FormValue;
		$this->carried_forward->CurrentValue = $this->carried_forward->FormValue;
		$this->default_per_year->CurrentValue = $this->default_per_year->FormValue;
		$this->carried_forward_percentage->CurrentValue = $this->carried_forward_percentage->FormValue;
		$this->carried_forward_leave_availability->CurrentValue = $this->carried_forward_leave_availability->FormValue;
		$this->propotionate_on_joined_date->CurrentValue = $this->propotionate_on_joined_date->FormValue;
		$this->send_notification_emails->CurrentValue = $this->send_notification_emails->FormValue;
		$this->leave_group->CurrentValue = $this->leave_group->FormValue;
		$this->leave_color->CurrentValue = $this->leave_color->FormValue;
		$this->max_carried_forward_amount->CurrentValue = $this->max_carried_forward_amount->FormValue;
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
		$this->name->setDbValue($row['name']);
		$this->supervisor_leave_assign->setDbValue($row['supervisor_leave_assign']);
		$this->employee_can_apply->setDbValue($row['employee_can_apply']);
		$this->apply_beyond_current->setDbValue($row['apply_beyond_current']);
		$this->leave_accrue->setDbValue($row['leave_accrue']);
		$this->carried_forward->setDbValue($row['carried_forward']);
		$this->default_per_year->setDbValue($row['default_per_year']);
		$this->carried_forward_percentage->setDbValue($row['carried_forward_percentage']);
		$this->carried_forward_leave_availability->setDbValue($row['carried_forward_leave_availability']);
		$this->propotionate_on_joined_date->setDbValue($row['propotionate_on_joined_date']);
		$this->send_notification_emails->setDbValue($row['send_notification_emails']);
		$this->leave_group->setDbValue($row['leave_group']);
		$this->leave_color->setDbValue($row['leave_color']);
		$this->max_carried_forward_amount->setDbValue($row['max_carried_forward_amount']);
		$this->HospID->setDbValue($row['HospID']);
	}

	// Return a row with default values
	protected function newRow()
	{
		$this->loadDefaultValues();
		$row = [];
		$row['id'] = $this->id->CurrentValue;
		$row['name'] = $this->name->CurrentValue;
		$row['supervisor_leave_assign'] = $this->supervisor_leave_assign->CurrentValue;
		$row['employee_can_apply'] = $this->employee_can_apply->CurrentValue;
		$row['apply_beyond_current'] = $this->apply_beyond_current->CurrentValue;
		$row['leave_accrue'] = $this->leave_accrue->CurrentValue;
		$row['carried_forward'] = $this->carried_forward->CurrentValue;
		$row['default_per_year'] = $this->default_per_year->CurrentValue;
		$row['carried_forward_percentage'] = $this->carried_forward_percentage->CurrentValue;
		$row['carried_forward_leave_availability'] = $this->carried_forward_leave_availability->CurrentValue;
		$row['propotionate_on_joined_date'] = $this->propotionate_on_joined_date->CurrentValue;
		$row['send_notification_emails'] = $this->send_notification_emails->CurrentValue;
		$row['leave_group'] = $this->leave_group->CurrentValue;
		$row['leave_color'] = $this->leave_color->CurrentValue;
		$row['max_carried_forward_amount'] = $this->max_carried_forward_amount->CurrentValue;
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
		// Convert decimal values if posted back

		if ($this->default_per_year->FormValue == $this->default_per_year->CurrentValue && is_numeric(ConvertToFloatString($this->default_per_year->CurrentValue)))
			$this->default_per_year->CurrentValue = ConvertToFloatString($this->default_per_year->CurrentValue);

		// Call Row_Rendering event
		$this->Row_Rendering();

		// Common render codes for all row types
		// id
		// name
		// supervisor_leave_assign
		// employee_can_apply
		// apply_beyond_current
		// leave_accrue
		// carried_forward
		// default_per_year
		// carried_forward_percentage
		// carried_forward_leave_availability
		// propotionate_on_joined_date
		// send_notification_emails
		// leave_group
		// leave_color
		// max_carried_forward_amount
		// HospID

		if ($this->RowType == ROWTYPE_VIEW) { // View row

			// id
			$this->id->ViewValue = $this->id->CurrentValue;
			$this->id->ViewCustomAttributes = "";

			// name
			$this->name->ViewValue = $this->name->CurrentValue;
			$this->name->ViewCustomAttributes = "";

			// supervisor_leave_assign
			if (strval($this->supervisor_leave_assign->CurrentValue) <> "") {
				$this->supervisor_leave_assign->ViewValue = $this->supervisor_leave_assign->optionCaption($this->supervisor_leave_assign->CurrentValue);
			} else {
				$this->supervisor_leave_assign->ViewValue = NULL;
			}
			$this->supervisor_leave_assign->ViewCustomAttributes = "";

			// employee_can_apply
			if (strval($this->employee_can_apply->CurrentValue) <> "") {
				$this->employee_can_apply->ViewValue = $this->employee_can_apply->optionCaption($this->employee_can_apply->CurrentValue);
			} else {
				$this->employee_can_apply->ViewValue = NULL;
			}
			$this->employee_can_apply->ViewCustomAttributes = "";

			// apply_beyond_current
			if (strval($this->apply_beyond_current->CurrentValue) <> "") {
				$this->apply_beyond_current->ViewValue = $this->apply_beyond_current->optionCaption($this->apply_beyond_current->CurrentValue);
			} else {
				$this->apply_beyond_current->ViewValue = NULL;
			}
			$this->apply_beyond_current->ViewCustomAttributes = "";

			// leave_accrue
			if (strval($this->leave_accrue->CurrentValue) <> "") {
				$this->leave_accrue->ViewValue = $this->leave_accrue->optionCaption($this->leave_accrue->CurrentValue);
			} else {
				$this->leave_accrue->ViewValue = NULL;
			}
			$this->leave_accrue->ViewCustomAttributes = "";

			// carried_forward
			if (strval($this->carried_forward->CurrentValue) <> "") {
				$this->carried_forward->ViewValue = $this->carried_forward->optionCaption($this->carried_forward->CurrentValue);
			} else {
				$this->carried_forward->ViewValue = NULL;
			}
			$this->carried_forward->ViewCustomAttributes = "";

			// default_per_year
			$this->default_per_year->ViewValue = $this->default_per_year->CurrentValue;
			$this->default_per_year->ViewValue = FormatNumber($this->default_per_year->ViewValue, 2, -2, -2, -2);
			$this->default_per_year->ViewCustomAttributes = "";

			// carried_forward_percentage
			$this->carried_forward_percentage->ViewValue = $this->carried_forward_percentage->CurrentValue;
			$this->carried_forward_percentage->ViewValue = FormatNumber($this->carried_forward_percentage->ViewValue, 0, -2, -2, -2);
			$this->carried_forward_percentage->ViewCustomAttributes = "";

			// carried_forward_leave_availability
			$this->carried_forward_leave_availability->ViewValue = $this->carried_forward_leave_availability->CurrentValue;
			$this->carried_forward_leave_availability->ViewValue = FormatNumber($this->carried_forward_leave_availability->ViewValue, 0, -2, -2, -2);
			$this->carried_forward_leave_availability->ViewCustomAttributes = "";

			// propotionate_on_joined_date
			if (strval($this->propotionate_on_joined_date->CurrentValue) <> "") {
				$this->propotionate_on_joined_date->ViewValue = $this->propotionate_on_joined_date->optionCaption($this->propotionate_on_joined_date->CurrentValue);
			} else {
				$this->propotionate_on_joined_date->ViewValue = NULL;
			}
			$this->propotionate_on_joined_date->ViewCustomAttributes = "";

			// send_notification_emails
			if (strval($this->send_notification_emails->CurrentValue) <> "") {
				$this->send_notification_emails->ViewValue = $this->send_notification_emails->optionCaption($this->send_notification_emails->CurrentValue);
			} else {
				$this->send_notification_emails->ViewValue = NULL;
			}
			$this->send_notification_emails->ViewCustomAttributes = "";

			// leave_group
			$this->leave_group->ViewValue = $this->leave_group->CurrentValue;
			$this->leave_group->ViewValue = FormatNumber($this->leave_group->ViewValue, 0, -2, -2, -2);
			$this->leave_group->ViewCustomAttributes = "";

			// leave_color
			$this->leave_color->ViewValue = $this->leave_color->CurrentValue;
			$this->leave_color->ViewCustomAttributes = "";

			// max_carried_forward_amount
			$this->max_carried_forward_amount->ViewValue = $this->max_carried_forward_amount->CurrentValue;
			$this->max_carried_forward_amount->ViewValue = FormatNumber($this->max_carried_forward_amount->ViewValue, 0, -2, -2, -2);
			$this->max_carried_forward_amount->ViewCustomAttributes = "";

			// HospID
			$this->HospID->ViewValue = $this->HospID->CurrentValue;
			$this->HospID->ViewValue = FormatNumber($this->HospID->ViewValue, 0, -2, -2, -2);
			$this->HospID->ViewCustomAttributes = "";

			// name
			$this->name->LinkCustomAttributes = "";
			$this->name->HrefValue = "";
			$this->name->TooltipValue = "";

			// supervisor_leave_assign
			$this->supervisor_leave_assign->LinkCustomAttributes = "";
			$this->supervisor_leave_assign->HrefValue = "";
			$this->supervisor_leave_assign->TooltipValue = "";

			// employee_can_apply
			$this->employee_can_apply->LinkCustomAttributes = "";
			$this->employee_can_apply->HrefValue = "";
			$this->employee_can_apply->TooltipValue = "";

			// apply_beyond_current
			$this->apply_beyond_current->LinkCustomAttributes = "";
			$this->apply_beyond_current->HrefValue = "";
			$this->apply_beyond_current->TooltipValue = "";

			// leave_accrue
			$this->leave_accrue->LinkCustomAttributes = "";
			$this->leave_accrue->HrefValue = "";
			$this->leave_accrue->TooltipValue = "";

			// carried_forward
			$this->carried_forward->LinkCustomAttributes = "";
			$this->carried_forward->HrefValue = "";
			$this->carried_forward->TooltipValue = "";

			// default_per_year
			$this->default_per_year->LinkCustomAttributes = "";
			$this->default_per_year->HrefValue = "";
			$this->default_per_year->TooltipValue = "";

			// carried_forward_percentage
			$this->carried_forward_percentage->LinkCustomAttributes = "";
			$this->carried_forward_percentage->HrefValue = "";
			$this->carried_forward_percentage->TooltipValue = "";

			// carried_forward_leave_availability
			$this->carried_forward_leave_availability->LinkCustomAttributes = "";
			$this->carried_forward_leave_availability->HrefValue = "";
			$this->carried_forward_leave_availability->TooltipValue = "";

			// propotionate_on_joined_date
			$this->propotionate_on_joined_date->LinkCustomAttributes = "";
			$this->propotionate_on_joined_date->HrefValue = "";
			$this->propotionate_on_joined_date->TooltipValue = "";

			// send_notification_emails
			$this->send_notification_emails->LinkCustomAttributes = "";
			$this->send_notification_emails->HrefValue = "";
			$this->send_notification_emails->TooltipValue = "";

			// leave_group
			$this->leave_group->LinkCustomAttributes = "";
			$this->leave_group->HrefValue = "";
			$this->leave_group->TooltipValue = "";

			// leave_color
			$this->leave_color->LinkCustomAttributes = "";
			$this->leave_color->HrefValue = "";
			$this->leave_color->TooltipValue = "";

			// max_carried_forward_amount
			$this->max_carried_forward_amount->LinkCustomAttributes = "";
			$this->max_carried_forward_amount->HrefValue = "";
			$this->max_carried_forward_amount->TooltipValue = "";

			// HospID
			$this->HospID->LinkCustomAttributes = "";
			$this->HospID->HrefValue = "";
			$this->HospID->TooltipValue = "";
		} elseif ($this->RowType == ROWTYPE_ADD) { // Add row

			// name
			$this->name->EditAttrs["class"] = "form-control";
			$this->name->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->name->CurrentValue = HtmlDecode($this->name->CurrentValue);
			$this->name->EditValue = HtmlEncode($this->name->CurrentValue);
			$this->name->PlaceHolder = RemoveHtml($this->name->caption());

			// supervisor_leave_assign
			$this->supervisor_leave_assign->EditCustomAttributes = "";
			$this->supervisor_leave_assign->EditValue = $this->supervisor_leave_assign->options(FALSE);

			// employee_can_apply
			$this->employee_can_apply->EditCustomAttributes = "";
			$this->employee_can_apply->EditValue = $this->employee_can_apply->options(FALSE);

			// apply_beyond_current
			$this->apply_beyond_current->EditCustomAttributes = "";
			$this->apply_beyond_current->EditValue = $this->apply_beyond_current->options(FALSE);

			// leave_accrue
			$this->leave_accrue->EditCustomAttributes = "";
			$this->leave_accrue->EditValue = $this->leave_accrue->options(FALSE);

			// carried_forward
			$this->carried_forward->EditCustomAttributes = "";
			$this->carried_forward->EditValue = $this->carried_forward->options(FALSE);

			// default_per_year
			$this->default_per_year->EditAttrs["class"] = "form-control";
			$this->default_per_year->EditCustomAttributes = "";
			$this->default_per_year->EditValue = HtmlEncode($this->default_per_year->CurrentValue);
			$this->default_per_year->PlaceHolder = RemoveHtml($this->default_per_year->caption());
			if (strval($this->default_per_year->EditValue) <> "" && is_numeric($this->default_per_year->EditValue))
				$this->default_per_year->EditValue = FormatNumber($this->default_per_year->EditValue, -2, -2, -2, -2);

			// carried_forward_percentage
			$this->carried_forward_percentage->EditAttrs["class"] = "form-control";
			$this->carried_forward_percentage->EditCustomAttributes = "";
			$this->carried_forward_percentage->EditValue = HtmlEncode($this->carried_forward_percentage->CurrentValue);
			$this->carried_forward_percentage->PlaceHolder = RemoveHtml($this->carried_forward_percentage->caption());

			// carried_forward_leave_availability
			$this->carried_forward_leave_availability->EditAttrs["class"] = "form-control";
			$this->carried_forward_leave_availability->EditCustomAttributes = "";
			$this->carried_forward_leave_availability->EditValue = HtmlEncode($this->carried_forward_leave_availability->CurrentValue);
			$this->carried_forward_leave_availability->PlaceHolder = RemoveHtml($this->carried_forward_leave_availability->caption());

			// propotionate_on_joined_date
			$this->propotionate_on_joined_date->EditCustomAttributes = "";
			$this->propotionate_on_joined_date->EditValue = $this->propotionate_on_joined_date->options(FALSE);

			// send_notification_emails
			$this->send_notification_emails->EditCustomAttributes = "";
			$this->send_notification_emails->EditValue = $this->send_notification_emails->options(FALSE);

			// leave_group
			$this->leave_group->EditAttrs["class"] = "form-control";
			$this->leave_group->EditCustomAttributes = "";
			$this->leave_group->EditValue = HtmlEncode($this->leave_group->CurrentValue);
			$this->leave_group->PlaceHolder = RemoveHtml($this->leave_group->caption());

			// leave_color
			$this->leave_color->EditAttrs["class"] = "form-control";
			$this->leave_color->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->leave_color->CurrentValue = HtmlDecode($this->leave_color->CurrentValue);
			$this->leave_color->EditValue = HtmlEncode($this->leave_color->CurrentValue);
			$this->leave_color->PlaceHolder = RemoveHtml($this->leave_color->caption());

			// max_carried_forward_amount
			$this->max_carried_forward_amount->EditAttrs["class"] = "form-control";
			$this->max_carried_forward_amount->EditCustomAttributes = "";
			$this->max_carried_forward_amount->EditValue = HtmlEncode($this->max_carried_forward_amount->CurrentValue);
			$this->max_carried_forward_amount->PlaceHolder = RemoveHtml($this->max_carried_forward_amount->caption());

			// HospID
			// Add refer script
			// name

			$this->name->LinkCustomAttributes = "";
			$this->name->HrefValue = "";

			// supervisor_leave_assign
			$this->supervisor_leave_assign->LinkCustomAttributes = "";
			$this->supervisor_leave_assign->HrefValue = "";

			// employee_can_apply
			$this->employee_can_apply->LinkCustomAttributes = "";
			$this->employee_can_apply->HrefValue = "";

			// apply_beyond_current
			$this->apply_beyond_current->LinkCustomAttributes = "";
			$this->apply_beyond_current->HrefValue = "";

			// leave_accrue
			$this->leave_accrue->LinkCustomAttributes = "";
			$this->leave_accrue->HrefValue = "";

			// carried_forward
			$this->carried_forward->LinkCustomAttributes = "";
			$this->carried_forward->HrefValue = "";

			// default_per_year
			$this->default_per_year->LinkCustomAttributes = "";
			$this->default_per_year->HrefValue = "";

			// carried_forward_percentage
			$this->carried_forward_percentage->LinkCustomAttributes = "";
			$this->carried_forward_percentage->HrefValue = "";

			// carried_forward_leave_availability
			$this->carried_forward_leave_availability->LinkCustomAttributes = "";
			$this->carried_forward_leave_availability->HrefValue = "";

			// propotionate_on_joined_date
			$this->propotionate_on_joined_date->LinkCustomAttributes = "";
			$this->propotionate_on_joined_date->HrefValue = "";

			// send_notification_emails
			$this->send_notification_emails->LinkCustomAttributes = "";
			$this->send_notification_emails->HrefValue = "";

			// leave_group
			$this->leave_group->LinkCustomAttributes = "";
			$this->leave_group->HrefValue = "";

			// leave_color
			$this->leave_color->LinkCustomAttributes = "";
			$this->leave_color->HrefValue = "";

			// max_carried_forward_amount
			$this->max_carried_forward_amount->LinkCustomAttributes = "";
			$this->max_carried_forward_amount->HrefValue = "";

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
		if ($this->name->Required) {
			if (!$this->name->IsDetailKey && $this->name->FormValue != NULL && $this->name->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->name->caption(), $this->name->RequiredErrorMessage));
			}
		}
		if ($this->supervisor_leave_assign->Required) {
			if ($this->supervisor_leave_assign->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->supervisor_leave_assign->caption(), $this->supervisor_leave_assign->RequiredErrorMessage));
			}
		}
		if ($this->employee_can_apply->Required) {
			if ($this->employee_can_apply->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->employee_can_apply->caption(), $this->employee_can_apply->RequiredErrorMessage));
			}
		}
		if ($this->apply_beyond_current->Required) {
			if ($this->apply_beyond_current->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->apply_beyond_current->caption(), $this->apply_beyond_current->RequiredErrorMessage));
			}
		}
		if ($this->leave_accrue->Required) {
			if ($this->leave_accrue->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->leave_accrue->caption(), $this->leave_accrue->RequiredErrorMessage));
			}
		}
		if ($this->carried_forward->Required) {
			if ($this->carried_forward->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->carried_forward->caption(), $this->carried_forward->RequiredErrorMessage));
			}
		}
		if ($this->default_per_year->Required) {
			if (!$this->default_per_year->IsDetailKey && $this->default_per_year->FormValue != NULL && $this->default_per_year->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->default_per_year->caption(), $this->default_per_year->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->default_per_year->FormValue)) {
			AddMessage($FormError, $this->default_per_year->errorMessage());
		}
		if ($this->carried_forward_percentage->Required) {
			if (!$this->carried_forward_percentage->IsDetailKey && $this->carried_forward_percentage->FormValue != NULL && $this->carried_forward_percentage->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->carried_forward_percentage->caption(), $this->carried_forward_percentage->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->carried_forward_percentage->FormValue)) {
			AddMessage($FormError, $this->carried_forward_percentage->errorMessage());
		}
		if ($this->carried_forward_leave_availability->Required) {
			if (!$this->carried_forward_leave_availability->IsDetailKey && $this->carried_forward_leave_availability->FormValue != NULL && $this->carried_forward_leave_availability->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->carried_forward_leave_availability->caption(), $this->carried_forward_leave_availability->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->carried_forward_leave_availability->FormValue)) {
			AddMessage($FormError, $this->carried_forward_leave_availability->errorMessage());
		}
		if ($this->propotionate_on_joined_date->Required) {
			if ($this->propotionate_on_joined_date->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->propotionate_on_joined_date->caption(), $this->propotionate_on_joined_date->RequiredErrorMessage));
			}
		}
		if ($this->send_notification_emails->Required) {
			if ($this->send_notification_emails->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->send_notification_emails->caption(), $this->send_notification_emails->RequiredErrorMessage));
			}
		}
		if ($this->leave_group->Required) {
			if (!$this->leave_group->IsDetailKey && $this->leave_group->FormValue != NULL && $this->leave_group->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->leave_group->caption(), $this->leave_group->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->leave_group->FormValue)) {
			AddMessage($FormError, $this->leave_group->errorMessage());
		}
		if ($this->leave_color->Required) {
			if (!$this->leave_color->IsDetailKey && $this->leave_color->FormValue != NULL && $this->leave_color->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->leave_color->caption(), $this->leave_color->RequiredErrorMessage));
			}
		}
		if ($this->max_carried_forward_amount->Required) {
			if (!$this->max_carried_forward_amount->IsDetailKey && $this->max_carried_forward_amount->FormValue != NULL && $this->max_carried_forward_amount->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->max_carried_forward_amount->caption(), $this->max_carried_forward_amount->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->max_carried_forward_amount->FormValue)) {
			AddMessage($FormError, $this->max_carried_forward_amount->errorMessage());
		}
		if ($this->HospID->Required) {
			if (!$this->HospID->IsDetailKey && $this->HospID->FormValue != NULL && $this->HospID->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->HospID->caption(), $this->HospID->RequiredErrorMessage));
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

	// Add record
	protected function addRow($rsold = NULL)
	{
		global $Language, $Security;
		if ($this->name->CurrentValue <> "") { // Check field with unique index
			$filter = "(name = '" . AdjustSql($this->name->CurrentValue, $this->Dbid) . "')";
			$rsChk = $this->loadRs($filter);
			if ($rsChk && !$rsChk->EOF) {
				$idxErrMsg = str_replace("%f", $this->name->caption(), $Language->phrase("DupIndex"));
				$idxErrMsg = str_replace("%v", $this->name->CurrentValue, $idxErrMsg);
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

		// name
		$this->name->setDbValueDef($rsnew, $this->name->CurrentValue, "", FALSE);

		// supervisor_leave_assign
		$this->supervisor_leave_assign->setDbValueDef($rsnew, $this->supervisor_leave_assign->CurrentValue, NULL, strval($this->supervisor_leave_assign->CurrentValue) == "");

		// employee_can_apply
		$this->employee_can_apply->setDbValueDef($rsnew, $this->employee_can_apply->CurrentValue, NULL, strval($this->employee_can_apply->CurrentValue) == "");

		// apply_beyond_current
		$this->apply_beyond_current->setDbValueDef($rsnew, $this->apply_beyond_current->CurrentValue, NULL, strval($this->apply_beyond_current->CurrentValue) == "");

		// leave_accrue
		$this->leave_accrue->setDbValueDef($rsnew, $this->leave_accrue->CurrentValue, NULL, strval($this->leave_accrue->CurrentValue) == "");

		// carried_forward
		$this->carried_forward->setDbValueDef($rsnew, $this->carried_forward->CurrentValue, NULL, strval($this->carried_forward->CurrentValue) == "");

		// default_per_year
		$this->default_per_year->setDbValueDef($rsnew, $this->default_per_year->CurrentValue, 0, FALSE);

		// carried_forward_percentage
		$this->carried_forward_percentage->setDbValueDef($rsnew, $this->carried_forward_percentage->CurrentValue, NULL, strval($this->carried_forward_percentage->CurrentValue) == "");

		// carried_forward_leave_availability
		$this->carried_forward_leave_availability->setDbValueDef($rsnew, $this->carried_forward_leave_availability->CurrentValue, NULL, strval($this->carried_forward_leave_availability->CurrentValue) == "");

		// propotionate_on_joined_date
		$this->propotionate_on_joined_date->setDbValueDef($rsnew, $this->propotionate_on_joined_date->CurrentValue, NULL, strval($this->propotionate_on_joined_date->CurrentValue) == "");

		// send_notification_emails
		$this->send_notification_emails->setDbValueDef($rsnew, $this->send_notification_emails->CurrentValue, NULL, strval($this->send_notification_emails->CurrentValue) == "");

		// leave_group
		$this->leave_group->setDbValueDef($rsnew, $this->leave_group->CurrentValue, NULL, FALSE);

		// leave_color
		$this->leave_color->setDbValueDef($rsnew, $this->leave_color->CurrentValue, NULL, FALSE);

		// max_carried_forward_amount
		$this->max_carried_forward_amount->setDbValueDef($rsnew, $this->max_carried_forward_amount->CurrentValue, NULL, strval($this->max_carried_forward_amount->CurrentValue) == "");

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

	// Set up Breadcrumb
	protected function setupBreadcrumb()
	{
		global $Breadcrumb, $Language;
		$Breadcrumb = new Breadcrumb();
		$url = substr(CurrentUrl(), strrpos(CurrentUrl(), "/")+1);
		$Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("hr_leavetypeslist.php"), "", $this->TableVar, TRUE);
		$pageId = ($this->isCopy()) ? "Copy" : "Add";
		$Breadcrumb->add("add", $pageId, $url);
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

	// Form Custom Validate event
	function Form_CustomValidate(&$customError) {

		// Return error message in CustomError
		return TRUE;
	}
}
?>
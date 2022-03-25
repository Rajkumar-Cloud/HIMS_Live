<?php
namespace PHPMaker2019\HIMS;

/**
 * Page class
 */
class employee_travel_records_add extends employee_travel_records
{

	// Page ID
	public $PageID = "add";

	// Project ID
	public $ProjectID = "{EA4F6D13-AF8F-428D-9EA7-BA88D1107EC3}";

	// Table name
	public $TableName = 'employee_travel_records';

	// Page object name
	public $PageObjName = "employee_travel_records_add";

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

		// Table object (employee_travel_records)
		if (!isset($GLOBALS["employee_travel_records"]) || get_class($GLOBALS["employee_travel_records"]) == PROJECT_NAMESPACE . "employee_travel_records") {
			$GLOBALS["employee_travel_records"] = &$this;
			$GLOBALS["Table"] = &$GLOBALS["employee_travel_records"];
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
			define(PROJECT_NAMESPACE . "TABLE_NAME", 'employee_travel_records');

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
		global $EXPORT, $employee_travel_records;
		if ($this->CustomExport && $this->CustomExport == $this->Export && array_key_exists($this->CustomExport, $EXPORT)) {
				$content = ob_get_contents();
			if ($ExportFileName == "")
				$ExportFileName = $this->TableVar;
			$class = PROJECT_NAMESPACE . $EXPORT[$this->CustomExport];
			if (class_exists($class)) {
				$doc = new $class($employee_travel_records);
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
					if ($pageName == "employee_travel_recordsview.php")
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
					$this->terminate(GetUrl("employee_travel_recordslist.php"));
				else
					$this->terminate(GetUrl("login.php"));
				return;
			}
		}

		// Create form object
		$CurrentForm = new HttpForm();
		$this->CurrentAction = Param("action"); // Set up current action
		$this->id->Visible = FALSE;
		$this->employee->setVisibility();
		$this->type->setVisibility();
		$this->purpose->setVisibility();
		$this->travel_from->setVisibility();
		$this->travel_to->setVisibility();
		$this->travel_date->setVisibility();
		$this->return_date->setVisibility();
		$this->details->setVisibility();
		$this->funding->setVisibility();
		$this->currency->setVisibility();
		$this->attachment1->setVisibility();
		$this->attachment2->setVisibility();
		$this->attachment3->setVisibility();
		$this->created->setVisibility();
		$this->updated->setVisibility();
		$this->status->setVisibility();
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
					$this->terminate("employee_travel_recordslist.php"); // No matching record, return to list
				}
				break;
			case "insert": // Add new record
				$this->SendEmail = TRUE; // Send email on add success
				if ($this->addRow($this->OldRecordset)) { // Add successful
					if ($this->getSuccessMessage() == "")
						$this->setSuccessMessage($Language->phrase("AddSuccess")); // Set up success message
					$returnUrl = $this->getReturnUrl();
					if (GetPageName($returnUrl) == "employee_travel_recordslist.php")
						$returnUrl = $this->addMasterUrl($returnUrl); // List page, return to List page with correct master key if necessary
					elseif (GetPageName($returnUrl) == "employee_travel_recordsview.php")
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
		$this->employee->CurrentValue = NULL;
		$this->employee->OldValue = $this->employee->CurrentValue;
		$this->type->CurrentValue = "Local";
		$this->purpose->CurrentValue = NULL;
		$this->purpose->OldValue = $this->purpose->CurrentValue;
		$this->travel_from->CurrentValue = NULL;
		$this->travel_from->OldValue = $this->travel_from->CurrentValue;
		$this->travel_to->CurrentValue = NULL;
		$this->travel_to->OldValue = $this->travel_to->CurrentValue;
		$this->travel_date->CurrentValue = NULL;
		$this->travel_date->OldValue = $this->travel_date->CurrentValue;
		$this->return_date->CurrentValue = NULL;
		$this->return_date->OldValue = $this->return_date->CurrentValue;
		$this->details->CurrentValue = NULL;
		$this->details->OldValue = $this->details->CurrentValue;
		$this->funding->CurrentValue = NULL;
		$this->funding->OldValue = $this->funding->CurrentValue;
		$this->currency->CurrentValue = NULL;
		$this->currency->OldValue = $this->currency->CurrentValue;
		$this->attachment1->CurrentValue = NULL;
		$this->attachment1->OldValue = $this->attachment1->CurrentValue;
		$this->attachment2->CurrentValue = NULL;
		$this->attachment2->OldValue = $this->attachment2->CurrentValue;
		$this->attachment3->CurrentValue = NULL;
		$this->attachment3->OldValue = $this->attachment3->CurrentValue;
		$this->created->CurrentValue = NULL;
		$this->created->OldValue = $this->created->CurrentValue;
		$this->updated->CurrentValue = NULL;
		$this->updated->OldValue = $this->updated->CurrentValue;
		$this->status->CurrentValue = "Pending";
	}

	// Load form values
	protected function loadFormValues()
	{

		// Load from form
		global $CurrentForm;

		// Check field name 'employee' first before field var 'x_employee'
		$val = $CurrentForm->hasValue("employee") ? $CurrentForm->getValue("employee") : $CurrentForm->getValue("x_employee");
		if (!$this->employee->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->employee->Visible = FALSE; // Disable update for API request
			else
				$this->employee->setFormValue($val);
		}

		// Check field name 'type' first before field var 'x_type'
		$val = $CurrentForm->hasValue("type") ? $CurrentForm->getValue("type") : $CurrentForm->getValue("x_type");
		if (!$this->type->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->type->Visible = FALSE; // Disable update for API request
			else
				$this->type->setFormValue($val);
		}

		// Check field name 'purpose' first before field var 'x_purpose'
		$val = $CurrentForm->hasValue("purpose") ? $CurrentForm->getValue("purpose") : $CurrentForm->getValue("x_purpose");
		if (!$this->purpose->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->purpose->Visible = FALSE; // Disable update for API request
			else
				$this->purpose->setFormValue($val);
		}

		// Check field name 'travel_from' first before field var 'x_travel_from'
		$val = $CurrentForm->hasValue("travel_from") ? $CurrentForm->getValue("travel_from") : $CurrentForm->getValue("x_travel_from");
		if (!$this->travel_from->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->travel_from->Visible = FALSE; // Disable update for API request
			else
				$this->travel_from->setFormValue($val);
		}

		// Check field name 'travel_to' first before field var 'x_travel_to'
		$val = $CurrentForm->hasValue("travel_to") ? $CurrentForm->getValue("travel_to") : $CurrentForm->getValue("x_travel_to");
		if (!$this->travel_to->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->travel_to->Visible = FALSE; // Disable update for API request
			else
				$this->travel_to->setFormValue($val);
		}

		// Check field name 'travel_date' first before field var 'x_travel_date'
		$val = $CurrentForm->hasValue("travel_date") ? $CurrentForm->getValue("travel_date") : $CurrentForm->getValue("x_travel_date");
		if (!$this->travel_date->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->travel_date->Visible = FALSE; // Disable update for API request
			else
				$this->travel_date->setFormValue($val);
			$this->travel_date->CurrentValue = UnFormatDateTime($this->travel_date->CurrentValue, 0);
		}

		// Check field name 'return_date' first before field var 'x_return_date'
		$val = $CurrentForm->hasValue("return_date") ? $CurrentForm->getValue("return_date") : $CurrentForm->getValue("x_return_date");
		if (!$this->return_date->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->return_date->Visible = FALSE; // Disable update for API request
			else
				$this->return_date->setFormValue($val);
			$this->return_date->CurrentValue = UnFormatDateTime($this->return_date->CurrentValue, 0);
		}

		// Check field name 'details' first before field var 'x_details'
		$val = $CurrentForm->hasValue("details") ? $CurrentForm->getValue("details") : $CurrentForm->getValue("x_details");
		if (!$this->details->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->details->Visible = FALSE; // Disable update for API request
			else
				$this->details->setFormValue($val);
		}

		// Check field name 'funding' first before field var 'x_funding'
		$val = $CurrentForm->hasValue("funding") ? $CurrentForm->getValue("funding") : $CurrentForm->getValue("x_funding");
		if (!$this->funding->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->funding->Visible = FALSE; // Disable update for API request
			else
				$this->funding->setFormValue($val);
		}

		// Check field name 'currency' first before field var 'x_currency'
		$val = $CurrentForm->hasValue("currency") ? $CurrentForm->getValue("currency") : $CurrentForm->getValue("x_currency");
		if (!$this->currency->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->currency->Visible = FALSE; // Disable update for API request
			else
				$this->currency->setFormValue($val);
		}

		// Check field name 'attachment1' first before field var 'x_attachment1'
		$val = $CurrentForm->hasValue("attachment1") ? $CurrentForm->getValue("attachment1") : $CurrentForm->getValue("x_attachment1");
		if (!$this->attachment1->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->attachment1->Visible = FALSE; // Disable update for API request
			else
				$this->attachment1->setFormValue($val);
		}

		// Check field name 'attachment2' first before field var 'x_attachment2'
		$val = $CurrentForm->hasValue("attachment2") ? $CurrentForm->getValue("attachment2") : $CurrentForm->getValue("x_attachment2");
		if (!$this->attachment2->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->attachment2->Visible = FALSE; // Disable update for API request
			else
				$this->attachment2->setFormValue($val);
		}

		// Check field name 'attachment3' first before field var 'x_attachment3'
		$val = $CurrentForm->hasValue("attachment3") ? $CurrentForm->getValue("attachment3") : $CurrentForm->getValue("x_attachment3");
		if (!$this->attachment3->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->attachment3->Visible = FALSE; // Disable update for API request
			else
				$this->attachment3->setFormValue($val);
		}

		// Check field name 'created' first before field var 'x_created'
		$val = $CurrentForm->hasValue("created") ? $CurrentForm->getValue("created") : $CurrentForm->getValue("x_created");
		if (!$this->created->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->created->Visible = FALSE; // Disable update for API request
			else
				$this->created->setFormValue($val);
			$this->created->CurrentValue = UnFormatDateTime($this->created->CurrentValue, 0);
		}

		// Check field name 'updated' first before field var 'x_updated'
		$val = $CurrentForm->hasValue("updated") ? $CurrentForm->getValue("updated") : $CurrentForm->getValue("x_updated");
		if (!$this->updated->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->updated->Visible = FALSE; // Disable update for API request
			else
				$this->updated->setFormValue($val);
			$this->updated->CurrentValue = UnFormatDateTime($this->updated->CurrentValue, 0);
		}

		// Check field name 'status' first before field var 'x_status'
		$val = $CurrentForm->hasValue("status") ? $CurrentForm->getValue("status") : $CurrentForm->getValue("x_status");
		if (!$this->status->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->status->Visible = FALSE; // Disable update for API request
			else
				$this->status->setFormValue($val);
		}

		// Check field name 'id' first before field var 'x_id'
		$val = $CurrentForm->hasValue("id") ? $CurrentForm->getValue("id") : $CurrentForm->getValue("x_id");
	}

	// Restore form values
	public function restoreFormValues()
	{
		global $CurrentForm;
		$this->employee->CurrentValue = $this->employee->FormValue;
		$this->type->CurrentValue = $this->type->FormValue;
		$this->purpose->CurrentValue = $this->purpose->FormValue;
		$this->travel_from->CurrentValue = $this->travel_from->FormValue;
		$this->travel_to->CurrentValue = $this->travel_to->FormValue;
		$this->travel_date->CurrentValue = $this->travel_date->FormValue;
		$this->travel_date->CurrentValue = UnFormatDateTime($this->travel_date->CurrentValue, 0);
		$this->return_date->CurrentValue = $this->return_date->FormValue;
		$this->return_date->CurrentValue = UnFormatDateTime($this->return_date->CurrentValue, 0);
		$this->details->CurrentValue = $this->details->FormValue;
		$this->funding->CurrentValue = $this->funding->FormValue;
		$this->currency->CurrentValue = $this->currency->FormValue;
		$this->attachment1->CurrentValue = $this->attachment1->FormValue;
		$this->attachment2->CurrentValue = $this->attachment2->FormValue;
		$this->attachment3->CurrentValue = $this->attachment3->FormValue;
		$this->created->CurrentValue = $this->created->FormValue;
		$this->created->CurrentValue = UnFormatDateTime($this->created->CurrentValue, 0);
		$this->updated->CurrentValue = $this->updated->FormValue;
		$this->updated->CurrentValue = UnFormatDateTime($this->updated->CurrentValue, 0);
		$this->status->CurrentValue = $this->status->FormValue;
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
		$this->employee->setDbValue($row['employee']);
		$this->type->setDbValue($row['type']);
		$this->purpose->setDbValue($row['purpose']);
		$this->travel_from->setDbValue($row['travel_from']);
		$this->travel_to->setDbValue($row['travel_to']);
		$this->travel_date->setDbValue($row['travel_date']);
		$this->return_date->setDbValue($row['return_date']);
		$this->details->setDbValue($row['details']);
		$this->funding->setDbValue($row['funding']);
		$this->currency->setDbValue($row['currency']);
		$this->attachment1->setDbValue($row['attachment1']);
		$this->attachment2->setDbValue($row['attachment2']);
		$this->attachment3->setDbValue($row['attachment3']);
		$this->created->setDbValue($row['created']);
		$this->updated->setDbValue($row['updated']);
		$this->status->setDbValue($row['status']);
	}

	// Return a row with default values
	protected function newRow()
	{
		$this->loadDefaultValues();
		$row = [];
		$row['id'] = $this->id->CurrentValue;
		$row['employee'] = $this->employee->CurrentValue;
		$row['type'] = $this->type->CurrentValue;
		$row['purpose'] = $this->purpose->CurrentValue;
		$row['travel_from'] = $this->travel_from->CurrentValue;
		$row['travel_to'] = $this->travel_to->CurrentValue;
		$row['travel_date'] = $this->travel_date->CurrentValue;
		$row['return_date'] = $this->return_date->CurrentValue;
		$row['details'] = $this->details->CurrentValue;
		$row['funding'] = $this->funding->CurrentValue;
		$row['currency'] = $this->currency->CurrentValue;
		$row['attachment1'] = $this->attachment1->CurrentValue;
		$row['attachment2'] = $this->attachment2->CurrentValue;
		$row['attachment3'] = $this->attachment3->CurrentValue;
		$row['created'] = $this->created->CurrentValue;
		$row['updated'] = $this->updated->CurrentValue;
		$row['status'] = $this->status->CurrentValue;
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

		if ($this->funding->FormValue == $this->funding->CurrentValue && is_numeric(ConvertToFloatString($this->funding->CurrentValue)))
			$this->funding->CurrentValue = ConvertToFloatString($this->funding->CurrentValue);

		// Call Row_Rendering event
		$this->Row_Rendering();

		// Common render codes for all row types
		// id
		// employee
		// type
		// purpose
		// travel_from
		// travel_to
		// travel_date
		// return_date
		// details
		// funding
		// currency
		// attachment1
		// attachment2
		// attachment3
		// created
		// updated
		// status

		if ($this->RowType == ROWTYPE_VIEW) { // View row

			// id
			$this->id->ViewValue = $this->id->CurrentValue;
			$this->id->ViewCustomAttributes = "";

			// employee
			$this->employee->ViewValue = $this->employee->CurrentValue;
			$this->employee->ViewValue = FormatNumber($this->employee->ViewValue, 0, -2, -2, -2);
			$this->employee->ViewCustomAttributes = "";

			// type
			if (strval($this->type->CurrentValue) <> "") {
				$this->type->ViewValue = $this->type->optionCaption($this->type->CurrentValue);
			} else {
				$this->type->ViewValue = NULL;
			}
			$this->type->ViewCustomAttributes = "";

			// purpose
			$this->purpose->ViewValue = $this->purpose->CurrentValue;
			$this->purpose->ViewCustomAttributes = "";

			// travel_from
			$this->travel_from->ViewValue = $this->travel_from->CurrentValue;
			$this->travel_from->ViewCustomAttributes = "";

			// travel_to
			$this->travel_to->ViewValue = $this->travel_to->CurrentValue;
			$this->travel_to->ViewCustomAttributes = "";

			// travel_date
			$this->travel_date->ViewValue = $this->travel_date->CurrentValue;
			$this->travel_date->ViewValue = FormatDateTime($this->travel_date->ViewValue, 0);
			$this->travel_date->ViewCustomAttributes = "";

			// return_date
			$this->return_date->ViewValue = $this->return_date->CurrentValue;
			$this->return_date->ViewValue = FormatDateTime($this->return_date->ViewValue, 0);
			$this->return_date->ViewCustomAttributes = "";

			// details
			$this->details->ViewValue = $this->details->CurrentValue;
			$this->details->ViewCustomAttributes = "";

			// funding
			$this->funding->ViewValue = $this->funding->CurrentValue;
			$this->funding->ViewValue = FormatNumber($this->funding->ViewValue, 2, -2, -2, -2);
			$this->funding->ViewCustomAttributes = "";

			// currency
			$this->currency->ViewValue = $this->currency->CurrentValue;
			$this->currency->ViewValue = FormatNumber($this->currency->ViewValue, 0, -2, -2, -2);
			$this->currency->ViewCustomAttributes = "";

			// attachment1
			$this->attachment1->ViewValue = $this->attachment1->CurrentValue;
			$this->attachment1->ViewCustomAttributes = "";

			// attachment2
			$this->attachment2->ViewValue = $this->attachment2->CurrentValue;
			$this->attachment2->ViewCustomAttributes = "";

			// attachment3
			$this->attachment3->ViewValue = $this->attachment3->CurrentValue;
			$this->attachment3->ViewCustomAttributes = "";

			// created
			$this->created->ViewValue = $this->created->CurrentValue;
			$this->created->ViewValue = FormatDateTime($this->created->ViewValue, 0);
			$this->created->ViewCustomAttributes = "";

			// updated
			$this->updated->ViewValue = $this->updated->CurrentValue;
			$this->updated->ViewValue = FormatDateTime($this->updated->ViewValue, 0);
			$this->updated->ViewCustomAttributes = "";

			// status
			if (strval($this->status->CurrentValue) <> "") {
				$this->status->ViewValue = $this->status->optionCaption($this->status->CurrentValue);
			} else {
				$this->status->ViewValue = NULL;
			}
			$this->status->ViewCustomAttributes = "";

			// employee
			$this->employee->LinkCustomAttributes = "";
			$this->employee->HrefValue = "";
			$this->employee->TooltipValue = "";

			// type
			$this->type->LinkCustomAttributes = "";
			$this->type->HrefValue = "";
			$this->type->TooltipValue = "";

			// purpose
			$this->purpose->LinkCustomAttributes = "";
			$this->purpose->HrefValue = "";
			$this->purpose->TooltipValue = "";

			// travel_from
			$this->travel_from->LinkCustomAttributes = "";
			$this->travel_from->HrefValue = "";
			$this->travel_from->TooltipValue = "";

			// travel_to
			$this->travel_to->LinkCustomAttributes = "";
			$this->travel_to->HrefValue = "";
			$this->travel_to->TooltipValue = "";

			// travel_date
			$this->travel_date->LinkCustomAttributes = "";
			$this->travel_date->HrefValue = "";
			$this->travel_date->TooltipValue = "";

			// return_date
			$this->return_date->LinkCustomAttributes = "";
			$this->return_date->HrefValue = "";
			$this->return_date->TooltipValue = "";

			// details
			$this->details->LinkCustomAttributes = "";
			$this->details->HrefValue = "";
			$this->details->TooltipValue = "";

			// funding
			$this->funding->LinkCustomAttributes = "";
			$this->funding->HrefValue = "";
			$this->funding->TooltipValue = "";

			// currency
			$this->currency->LinkCustomAttributes = "";
			$this->currency->HrefValue = "";
			$this->currency->TooltipValue = "";

			// attachment1
			$this->attachment1->LinkCustomAttributes = "";
			$this->attachment1->HrefValue = "";
			$this->attachment1->TooltipValue = "";

			// attachment2
			$this->attachment2->LinkCustomAttributes = "";
			$this->attachment2->HrefValue = "";
			$this->attachment2->TooltipValue = "";

			// attachment3
			$this->attachment3->LinkCustomAttributes = "";
			$this->attachment3->HrefValue = "";
			$this->attachment3->TooltipValue = "";

			// created
			$this->created->LinkCustomAttributes = "";
			$this->created->HrefValue = "";
			$this->created->TooltipValue = "";

			// updated
			$this->updated->LinkCustomAttributes = "";
			$this->updated->HrefValue = "";
			$this->updated->TooltipValue = "";

			// status
			$this->status->LinkCustomAttributes = "";
			$this->status->HrefValue = "";
			$this->status->TooltipValue = "";
		} elseif ($this->RowType == ROWTYPE_ADD) { // Add row

			// employee
			$this->employee->EditAttrs["class"] = "form-control";
			$this->employee->EditCustomAttributes = "";
			$this->employee->EditValue = HtmlEncode($this->employee->CurrentValue);
			$this->employee->PlaceHolder = RemoveHtml($this->employee->caption());

			// type
			$this->type->EditCustomAttributes = "";
			$this->type->EditValue = $this->type->options(FALSE);

			// purpose
			$this->purpose->EditAttrs["class"] = "form-control";
			$this->purpose->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->purpose->CurrentValue = HtmlDecode($this->purpose->CurrentValue);
			$this->purpose->EditValue = HtmlEncode($this->purpose->CurrentValue);
			$this->purpose->PlaceHolder = RemoveHtml($this->purpose->caption());

			// travel_from
			$this->travel_from->EditAttrs["class"] = "form-control";
			$this->travel_from->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->travel_from->CurrentValue = HtmlDecode($this->travel_from->CurrentValue);
			$this->travel_from->EditValue = HtmlEncode($this->travel_from->CurrentValue);
			$this->travel_from->PlaceHolder = RemoveHtml($this->travel_from->caption());

			// travel_to
			$this->travel_to->EditAttrs["class"] = "form-control";
			$this->travel_to->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->travel_to->CurrentValue = HtmlDecode($this->travel_to->CurrentValue);
			$this->travel_to->EditValue = HtmlEncode($this->travel_to->CurrentValue);
			$this->travel_to->PlaceHolder = RemoveHtml($this->travel_to->caption());

			// travel_date
			$this->travel_date->EditAttrs["class"] = "form-control";
			$this->travel_date->EditCustomAttributes = "";
			$this->travel_date->EditValue = HtmlEncode(FormatDateTime($this->travel_date->CurrentValue, 8));
			$this->travel_date->PlaceHolder = RemoveHtml($this->travel_date->caption());

			// return_date
			$this->return_date->EditAttrs["class"] = "form-control";
			$this->return_date->EditCustomAttributes = "";
			$this->return_date->EditValue = HtmlEncode(FormatDateTime($this->return_date->CurrentValue, 8));
			$this->return_date->PlaceHolder = RemoveHtml($this->return_date->caption());

			// details
			$this->details->EditAttrs["class"] = "form-control";
			$this->details->EditCustomAttributes = "";
			$this->details->EditValue = HtmlEncode($this->details->CurrentValue);
			$this->details->PlaceHolder = RemoveHtml($this->details->caption());

			// funding
			$this->funding->EditAttrs["class"] = "form-control";
			$this->funding->EditCustomAttributes = "";
			$this->funding->EditValue = HtmlEncode($this->funding->CurrentValue);
			$this->funding->PlaceHolder = RemoveHtml($this->funding->caption());
			if (strval($this->funding->EditValue) <> "" && is_numeric($this->funding->EditValue))
				$this->funding->EditValue = FormatNumber($this->funding->EditValue, -2, -2, -2, -2);

			// currency
			$this->currency->EditAttrs["class"] = "form-control";
			$this->currency->EditCustomAttributes = "";
			$this->currency->EditValue = HtmlEncode($this->currency->CurrentValue);
			$this->currency->PlaceHolder = RemoveHtml($this->currency->caption());

			// attachment1
			$this->attachment1->EditAttrs["class"] = "form-control";
			$this->attachment1->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->attachment1->CurrentValue = HtmlDecode($this->attachment1->CurrentValue);
			$this->attachment1->EditValue = HtmlEncode($this->attachment1->CurrentValue);
			$this->attachment1->PlaceHolder = RemoveHtml($this->attachment1->caption());

			// attachment2
			$this->attachment2->EditAttrs["class"] = "form-control";
			$this->attachment2->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->attachment2->CurrentValue = HtmlDecode($this->attachment2->CurrentValue);
			$this->attachment2->EditValue = HtmlEncode($this->attachment2->CurrentValue);
			$this->attachment2->PlaceHolder = RemoveHtml($this->attachment2->caption());

			// attachment3
			$this->attachment3->EditAttrs["class"] = "form-control";
			$this->attachment3->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->attachment3->CurrentValue = HtmlDecode($this->attachment3->CurrentValue);
			$this->attachment3->EditValue = HtmlEncode($this->attachment3->CurrentValue);
			$this->attachment3->PlaceHolder = RemoveHtml($this->attachment3->caption());

			// created
			$this->created->EditAttrs["class"] = "form-control";
			$this->created->EditCustomAttributes = "";
			$this->created->EditValue = HtmlEncode(FormatDateTime($this->created->CurrentValue, 8));
			$this->created->PlaceHolder = RemoveHtml($this->created->caption());

			// updated
			$this->updated->EditAttrs["class"] = "form-control";
			$this->updated->EditCustomAttributes = "";
			$this->updated->EditValue = HtmlEncode(FormatDateTime($this->updated->CurrentValue, 8));
			$this->updated->PlaceHolder = RemoveHtml($this->updated->caption());

			// status
			$this->status->EditCustomAttributes = "";
			$this->status->EditValue = $this->status->options(FALSE);

			// Add refer script
			// employee

			$this->employee->LinkCustomAttributes = "";
			$this->employee->HrefValue = "";

			// type
			$this->type->LinkCustomAttributes = "";
			$this->type->HrefValue = "";

			// purpose
			$this->purpose->LinkCustomAttributes = "";
			$this->purpose->HrefValue = "";

			// travel_from
			$this->travel_from->LinkCustomAttributes = "";
			$this->travel_from->HrefValue = "";

			// travel_to
			$this->travel_to->LinkCustomAttributes = "";
			$this->travel_to->HrefValue = "";

			// travel_date
			$this->travel_date->LinkCustomAttributes = "";
			$this->travel_date->HrefValue = "";

			// return_date
			$this->return_date->LinkCustomAttributes = "";
			$this->return_date->HrefValue = "";

			// details
			$this->details->LinkCustomAttributes = "";
			$this->details->HrefValue = "";

			// funding
			$this->funding->LinkCustomAttributes = "";
			$this->funding->HrefValue = "";

			// currency
			$this->currency->LinkCustomAttributes = "";
			$this->currency->HrefValue = "";

			// attachment1
			$this->attachment1->LinkCustomAttributes = "";
			$this->attachment1->HrefValue = "";

			// attachment2
			$this->attachment2->LinkCustomAttributes = "";
			$this->attachment2->HrefValue = "";

			// attachment3
			$this->attachment3->LinkCustomAttributes = "";
			$this->attachment3->HrefValue = "";

			// created
			$this->created->LinkCustomAttributes = "";
			$this->created->HrefValue = "";

			// updated
			$this->updated->LinkCustomAttributes = "";
			$this->updated->HrefValue = "";

			// status
			$this->status->LinkCustomAttributes = "";
			$this->status->HrefValue = "";
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
		if ($this->employee->Required) {
			if (!$this->employee->IsDetailKey && $this->employee->FormValue != NULL && $this->employee->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->employee->caption(), $this->employee->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->employee->FormValue)) {
			AddMessage($FormError, $this->employee->errorMessage());
		}
		if ($this->type->Required) {
			if ($this->type->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->type->caption(), $this->type->RequiredErrorMessage));
			}
		}
		if ($this->purpose->Required) {
			if (!$this->purpose->IsDetailKey && $this->purpose->FormValue != NULL && $this->purpose->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->purpose->caption(), $this->purpose->RequiredErrorMessage));
			}
		}
		if ($this->travel_from->Required) {
			if (!$this->travel_from->IsDetailKey && $this->travel_from->FormValue != NULL && $this->travel_from->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->travel_from->caption(), $this->travel_from->RequiredErrorMessage));
			}
		}
		if ($this->travel_to->Required) {
			if (!$this->travel_to->IsDetailKey && $this->travel_to->FormValue != NULL && $this->travel_to->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->travel_to->caption(), $this->travel_to->RequiredErrorMessage));
			}
		}
		if ($this->travel_date->Required) {
			if (!$this->travel_date->IsDetailKey && $this->travel_date->FormValue != NULL && $this->travel_date->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->travel_date->caption(), $this->travel_date->RequiredErrorMessage));
			}
		}
		if (!CheckDate($this->travel_date->FormValue)) {
			AddMessage($FormError, $this->travel_date->errorMessage());
		}
		if ($this->return_date->Required) {
			if (!$this->return_date->IsDetailKey && $this->return_date->FormValue != NULL && $this->return_date->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->return_date->caption(), $this->return_date->RequiredErrorMessage));
			}
		}
		if (!CheckDate($this->return_date->FormValue)) {
			AddMessage($FormError, $this->return_date->errorMessage());
		}
		if ($this->details->Required) {
			if (!$this->details->IsDetailKey && $this->details->FormValue != NULL && $this->details->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->details->caption(), $this->details->RequiredErrorMessage));
			}
		}
		if ($this->funding->Required) {
			if (!$this->funding->IsDetailKey && $this->funding->FormValue != NULL && $this->funding->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->funding->caption(), $this->funding->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->funding->FormValue)) {
			AddMessage($FormError, $this->funding->errorMessage());
		}
		if ($this->currency->Required) {
			if (!$this->currency->IsDetailKey && $this->currency->FormValue != NULL && $this->currency->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->currency->caption(), $this->currency->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->currency->FormValue)) {
			AddMessage($FormError, $this->currency->errorMessage());
		}
		if ($this->attachment1->Required) {
			if (!$this->attachment1->IsDetailKey && $this->attachment1->FormValue != NULL && $this->attachment1->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->attachment1->caption(), $this->attachment1->RequiredErrorMessage));
			}
		}
		if ($this->attachment2->Required) {
			if (!$this->attachment2->IsDetailKey && $this->attachment2->FormValue != NULL && $this->attachment2->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->attachment2->caption(), $this->attachment2->RequiredErrorMessage));
			}
		}
		if ($this->attachment3->Required) {
			if (!$this->attachment3->IsDetailKey && $this->attachment3->FormValue != NULL && $this->attachment3->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->attachment3->caption(), $this->attachment3->RequiredErrorMessage));
			}
		}
		if ($this->created->Required) {
			if (!$this->created->IsDetailKey && $this->created->FormValue != NULL && $this->created->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->created->caption(), $this->created->RequiredErrorMessage));
			}
		}
		if (!CheckDate($this->created->FormValue)) {
			AddMessage($FormError, $this->created->errorMessage());
		}
		if ($this->updated->Required) {
			if (!$this->updated->IsDetailKey && $this->updated->FormValue != NULL && $this->updated->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->updated->caption(), $this->updated->RequiredErrorMessage));
			}
		}
		if (!CheckDate($this->updated->FormValue)) {
			AddMessage($FormError, $this->updated->errorMessage());
		}
		if ($this->status->Required) {
			if ($this->status->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->status->caption(), $this->status->RequiredErrorMessage));
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
		$conn = &$this->getConnection();

		// Load db values from rsold
		$this->loadDbValues($rsold);
		if ($rsold) {
		}
		$rsnew = [];

		// employee
		$this->employee->setDbValueDef($rsnew, $this->employee->CurrentValue, 0, FALSE);

		// type
		$this->type->setDbValueDef($rsnew, $this->type->CurrentValue, NULL, strval($this->type->CurrentValue) == "");

		// purpose
		$this->purpose->setDbValueDef($rsnew, $this->purpose->CurrentValue, "", FALSE);

		// travel_from
		$this->travel_from->setDbValueDef($rsnew, $this->travel_from->CurrentValue, "", FALSE);

		// travel_to
		$this->travel_to->setDbValueDef($rsnew, $this->travel_to->CurrentValue, "", FALSE);

		// travel_date
		$this->travel_date->setDbValueDef($rsnew, UnFormatDateTime($this->travel_date->CurrentValue, 0), NULL, FALSE);

		// return_date
		$this->return_date->setDbValueDef($rsnew, UnFormatDateTime($this->return_date->CurrentValue, 0), NULL, FALSE);

		// details
		$this->details->setDbValueDef($rsnew, $this->details->CurrentValue, NULL, FALSE);

		// funding
		$this->funding->setDbValueDef($rsnew, $this->funding->CurrentValue, NULL, FALSE);

		// currency
		$this->currency->setDbValueDef($rsnew, $this->currency->CurrentValue, NULL, FALSE);

		// attachment1
		$this->attachment1->setDbValueDef($rsnew, $this->attachment1->CurrentValue, NULL, FALSE);

		// attachment2
		$this->attachment2->setDbValueDef($rsnew, $this->attachment2->CurrentValue, NULL, FALSE);

		// attachment3
		$this->attachment3->setDbValueDef($rsnew, $this->attachment3->CurrentValue, NULL, FALSE);

		// created
		$this->created->setDbValueDef($rsnew, UnFormatDateTime($this->created->CurrentValue, 0), NULL, FALSE);

		// updated
		$this->updated->setDbValueDef($rsnew, UnFormatDateTime($this->updated->CurrentValue, 0), NULL, FALSE);

		// status
		$this->status->setDbValueDef($rsnew, $this->status->CurrentValue, NULL, strval($this->status->CurrentValue) == "");

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
		$Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("employee_travel_recordslist.php"), "", $this->TableVar, TRUE);
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
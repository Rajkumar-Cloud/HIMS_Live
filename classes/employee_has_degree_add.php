<?php
namespace PHPMaker2019\HIMS;

/**
 * Page class
 */
class employee_has_degree_add extends employee_has_degree
{

	// Page ID
	public $PageID = "add";

	// Project ID
	public $ProjectID = "{EA4F6D13-AF8F-428D-9EA7-BA88D1107EC3}";

	// Table name
	public $TableName = 'employee_has_degree';

	// Page object name
	public $PageObjName = "employee_has_degree_add";

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

		// Table object (employee_has_degree)
		if (!isset($GLOBALS["employee_has_degree"]) || get_class($GLOBALS["employee_has_degree"]) == PROJECT_NAMESPACE . "employee_has_degree") {
			$GLOBALS["employee_has_degree"] = &$this;
			$GLOBALS["Table"] = &$GLOBALS["employee_has_degree"];
		}
		$this->CancelUrl = $this->pageUrl() . "action=cancel";

		// Table object (employee)
		if (!isset($GLOBALS['employee']))
			$GLOBALS['employee'] = new employee();

		// Table object (user_login)
		if (!isset($GLOBALS['user_login']))
			$GLOBALS['user_login'] = new user_login();

		// Page ID
		if (!defined(PROJECT_NAMESPACE . "PAGE_ID"))
			define(PROJECT_NAMESPACE . "PAGE_ID", 'add');

		// Table name (for backward compatibility)
		if (!defined(PROJECT_NAMESPACE . "TABLE_NAME"))
			define(PROJECT_NAMESPACE . "TABLE_NAME", 'employee_has_degree');

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
		global $EXPORT, $employee_has_degree;
		if ($this->CustomExport && $this->CustomExport == $this->Export && array_key_exists($this->CustomExport, $EXPORT)) {
				$content = ob_get_contents();
			if ($ExportFileName == "")
				$ExportFileName = $this->TableVar;
			$class = PROJECT_NAMESPACE . $EXPORT[$this->CustomExport];
			if (class_exists($class)) {
				$doc = new $class($employee_has_degree);
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
					if ($pageName == "employee_has_degreeview.php")
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
					$this->terminate(GetUrl("employee_has_degreelist.php"));
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
		$this->degree_id->setVisibility();
		$this->college_or_school->setVisibility();
		$this->university_or_board->setVisibility();
		$this->year_of_passing->setVisibility();
		$this->scoring_marks->setVisibility();
		$this->certificates->setVisibility();
		$this->others->setVisibility();
		$this->status->setVisibility();
		$this->createdby->setVisibility();
		$this->createddatetime->setVisibility();
		$this->modifiedby->Visible = FALSE;
		$this->modifieddatetime->Visible = FALSE;
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
		$this->setupLookupOptions($this->degree_id);
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

		// Set up master/detail parameters
		// NOTE: must be after loadOldRecord to prevent master key values overwritten

		$this->setupMasterParms();

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
					$this->terminate("employee_has_degreelist.php"); // No matching record, return to list
				}
				break;
			case "insert": // Add new record
				$this->SendEmail = TRUE; // Send email on add success
				if ($this->addRow($this->OldRecordset)) { // Add successful
					if ($this->getSuccessMessage() == "")
						$this->setSuccessMessage($Language->phrase("AddSuccess")); // Set up success message
					$returnUrl = $this->getReturnUrl();
					if (GetPageName($returnUrl) == "employee_has_degreelist.php")
						$returnUrl = $this->addMasterUrl($returnUrl); // List page, return to List page with correct master key if necessary
					elseif (GetPageName($returnUrl) == "employee_has_degreeview.php")
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
		$this->certificates->Upload->Index = $CurrentForm->Index;
		$this->certificates->Upload->uploadFile();
		$this->certificates->CurrentValue = $this->certificates->Upload->FileName;
		$this->others->Upload->Index = $CurrentForm->Index;
		$this->others->Upload->uploadFile();
		$this->others->CurrentValue = $this->others->Upload->FileName;
	}

	// Load default values
	protected function loadDefaultValues()
	{
		$this->id->CurrentValue = NULL;
		$this->id->OldValue = $this->id->CurrentValue;
		$this->employee_id->CurrentValue = NULL;
		$this->employee_id->OldValue = $this->employee_id->CurrentValue;
		$this->degree_id->CurrentValue = NULL;
		$this->degree_id->OldValue = $this->degree_id->CurrentValue;
		$this->college_or_school->CurrentValue = NULL;
		$this->college_or_school->OldValue = $this->college_or_school->CurrentValue;
		$this->university_or_board->CurrentValue = NULL;
		$this->university_or_board->OldValue = $this->university_or_board->CurrentValue;
		$this->year_of_passing->CurrentValue = NULL;
		$this->year_of_passing->OldValue = $this->year_of_passing->CurrentValue;
		$this->scoring_marks->CurrentValue = NULL;
		$this->scoring_marks->OldValue = $this->scoring_marks->CurrentValue;
		$this->certificates->Upload->DbValue = NULL;
		$this->certificates->OldValue = $this->certificates->Upload->DbValue;
		$this->certificates->CurrentValue = NULL; // Clear file related field
		$this->others->Upload->DbValue = NULL;
		$this->others->OldValue = $this->others->Upload->DbValue;
		$this->others->CurrentValue = NULL; // Clear file related field
		$this->status->CurrentValue = NULL;
		$this->status->OldValue = $this->status->CurrentValue;
		$this->createdby->CurrentValue = NULL;
		$this->createdby->OldValue = $this->createdby->CurrentValue;
		$this->createddatetime->CurrentValue = NULL;
		$this->createddatetime->OldValue = $this->createddatetime->CurrentValue;
		$this->modifiedby->CurrentValue = NULL;
		$this->modifiedby->OldValue = $this->modifiedby->CurrentValue;
		$this->modifieddatetime->CurrentValue = NULL;
		$this->modifieddatetime->OldValue = $this->modifieddatetime->CurrentValue;
		$this->HospID->CurrentValue = NULL;
		$this->HospID->OldValue = $this->HospID->CurrentValue;
	}

	// Load form values
	protected function loadFormValues()
	{

		// Load from form
		global $CurrentForm;
		$this->getUploadFiles(); // Get upload files

		// Check field name 'employee_id' first before field var 'x_employee_id'
		$val = $CurrentForm->hasValue("employee_id") ? $CurrentForm->getValue("employee_id") : $CurrentForm->getValue("x_employee_id");
		if (!$this->employee_id->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->employee_id->Visible = FALSE; // Disable update for API request
			else
				$this->employee_id->setFormValue($val);
		}

		// Check field name 'degree_id' first before field var 'x_degree_id'
		$val = $CurrentForm->hasValue("degree_id") ? $CurrentForm->getValue("degree_id") : $CurrentForm->getValue("x_degree_id");
		if (!$this->degree_id->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->degree_id->Visible = FALSE; // Disable update for API request
			else
				$this->degree_id->setFormValue($val);
		}

		// Check field name 'college_or_school' first before field var 'x_college_or_school'
		$val = $CurrentForm->hasValue("college_or_school") ? $CurrentForm->getValue("college_or_school") : $CurrentForm->getValue("x_college_or_school");
		if (!$this->college_or_school->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->college_or_school->Visible = FALSE; // Disable update for API request
			else
				$this->college_or_school->setFormValue($val);
		}

		// Check field name 'university_or_board' first before field var 'x_university_or_board'
		$val = $CurrentForm->hasValue("university_or_board") ? $CurrentForm->getValue("university_or_board") : $CurrentForm->getValue("x_university_or_board");
		if (!$this->university_or_board->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->university_or_board->Visible = FALSE; // Disable update for API request
			else
				$this->university_or_board->setFormValue($val);
		}

		// Check field name 'year_of_passing' first before field var 'x_year_of_passing'
		$val = $CurrentForm->hasValue("year_of_passing") ? $CurrentForm->getValue("year_of_passing") : $CurrentForm->getValue("x_year_of_passing");
		if (!$this->year_of_passing->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->year_of_passing->Visible = FALSE; // Disable update for API request
			else
				$this->year_of_passing->setFormValue($val);
		}

		// Check field name 'scoring_marks' first before field var 'x_scoring_marks'
		$val = $CurrentForm->hasValue("scoring_marks") ? $CurrentForm->getValue("scoring_marks") : $CurrentForm->getValue("x_scoring_marks");
		if (!$this->scoring_marks->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->scoring_marks->Visible = FALSE; // Disable update for API request
			else
				$this->scoring_marks->setFormValue($val);
		}

		// Check field name 'status' first before field var 'x_status'
		$val = $CurrentForm->hasValue("status") ? $CurrentForm->getValue("status") : $CurrentForm->getValue("x_status");
		if (!$this->status->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->status->Visible = FALSE; // Disable update for API request
			else
				$this->status->setFormValue($val);
		}

		// Check field name 'createdby' first before field var 'x_createdby'
		$val = $CurrentForm->hasValue("createdby") ? $CurrentForm->getValue("createdby") : $CurrentForm->getValue("x_createdby");
		if (!$this->createdby->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->createdby->Visible = FALSE; // Disable update for API request
			else
				$this->createdby->setFormValue($val);
		}

		// Check field name 'createddatetime' first before field var 'x_createddatetime'
		$val = $CurrentForm->hasValue("createddatetime") ? $CurrentForm->getValue("createddatetime") : $CurrentForm->getValue("x_createddatetime");
		if (!$this->createddatetime->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->createddatetime->Visible = FALSE; // Disable update for API request
			else
				$this->createddatetime->setFormValue($val);
			$this->createddatetime->CurrentValue = UnFormatDateTime($this->createddatetime->CurrentValue, 0);
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
		$this->degree_id->CurrentValue = $this->degree_id->FormValue;
		$this->college_or_school->CurrentValue = $this->college_or_school->FormValue;
		$this->university_or_board->CurrentValue = $this->university_or_board->FormValue;
		$this->year_of_passing->CurrentValue = $this->year_of_passing->FormValue;
		$this->scoring_marks->CurrentValue = $this->scoring_marks->FormValue;
		$this->status->CurrentValue = $this->status->FormValue;
		$this->createdby->CurrentValue = $this->createdby->FormValue;
		$this->createddatetime->CurrentValue = $this->createddatetime->FormValue;
		$this->createddatetime->CurrentValue = UnFormatDateTime($this->createddatetime->CurrentValue, 0);
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
		$this->degree_id->setDbValue($row['degree_id']);
		$this->college_or_school->setDbValue($row['college_or_school']);
		$this->university_or_board->setDbValue($row['university_or_board']);
		$this->year_of_passing->setDbValue($row['year_of_passing']);
		$this->scoring_marks->setDbValue($row['scoring_marks']);
		$this->certificates->Upload->DbValue = $row['certificates'];
		$this->certificates->setDbValue($this->certificates->Upload->DbValue);
		$this->others->Upload->DbValue = $row['others'];
		$this->others->setDbValue($this->others->Upload->DbValue);
		$this->status->setDbValue($row['status']);
		$this->createdby->setDbValue($row['createdby']);
		$this->createddatetime->setDbValue($row['createddatetime']);
		$this->modifiedby->setDbValue($row['modifiedby']);
		$this->modifieddatetime->setDbValue($row['modifieddatetime']);
		$this->HospID->setDbValue($row['HospID']);
	}

	// Return a row with default values
	protected function newRow()
	{
		$this->loadDefaultValues();
		$row = [];
		$row['id'] = $this->id->CurrentValue;
		$row['employee_id'] = $this->employee_id->CurrentValue;
		$row['degree_id'] = $this->degree_id->CurrentValue;
		$row['college_or_school'] = $this->college_or_school->CurrentValue;
		$row['university_or_board'] = $this->university_or_board->CurrentValue;
		$row['year_of_passing'] = $this->year_of_passing->CurrentValue;
		$row['scoring_marks'] = $this->scoring_marks->CurrentValue;
		$row['certificates'] = $this->certificates->Upload->DbValue;
		$row['others'] = $this->others->Upload->DbValue;
		$row['status'] = $this->status->CurrentValue;
		$row['createdby'] = $this->createdby->CurrentValue;
		$row['createddatetime'] = $this->createddatetime->CurrentValue;
		$row['modifiedby'] = $this->modifiedby->CurrentValue;
		$row['modifieddatetime'] = $this->modifieddatetime->CurrentValue;
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
		// degree_id
		// college_or_school
		// university_or_board
		// year_of_passing
		// scoring_marks
		// certificates
		// others
		// status
		// createdby
		// createddatetime
		// modifiedby
		// modifieddatetime
		// HospID

		if ($this->RowType == ROWTYPE_VIEW) { // View row

			// id
			$this->id->ViewValue = $this->id->CurrentValue;
			$this->id->ViewCustomAttributes = "";

			// employee_id
			$this->employee_id->ViewValue = $this->employee_id->CurrentValue;
			$this->employee_id->ViewValue = FormatNumber($this->employee_id->ViewValue, 0, -2, -2, -2);
			$this->employee_id->ViewCustomAttributes = "";

			// degree_id
			$curVal = strval($this->degree_id->CurrentValue);
			if ($curVal <> "") {
				$this->degree_id->ViewValue = $this->degree_id->lookupCacheOption($curVal);
				if ($this->degree_id->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
					$sqlWrk = $this->degree_id->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = $rswrk->fields('df');
						$this->degree_id->ViewValue = $this->degree_id->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->degree_id->ViewValue = $this->degree_id->CurrentValue;
					}
				}
			} else {
				$this->degree_id->ViewValue = NULL;
			}
			$this->degree_id->ViewCustomAttributes = "";

			// college_or_school
			$this->college_or_school->ViewValue = $this->college_or_school->CurrentValue;
			$this->college_or_school->ViewCustomAttributes = "";

			// university_or_board
			$this->university_or_board->ViewValue = $this->university_or_board->CurrentValue;
			$this->university_or_board->ViewCustomAttributes = "";

			// year_of_passing
			$this->year_of_passing->ViewValue = $this->year_of_passing->CurrentValue;
			$this->year_of_passing->ViewCustomAttributes = "";

			// scoring_marks
			$this->scoring_marks->ViewValue = $this->scoring_marks->CurrentValue;
			$this->scoring_marks->ViewCustomAttributes = "";

			// certificates
			if (!EmptyValue($this->certificates->Upload->DbValue)) {
				$this->certificates->ImageWidth = 100;
				$this->certificates->ImageHeight = 100;
				$this->certificates->ImageAlt = $this->certificates->alt();
				$this->certificates->ViewValue = $this->certificates->Upload->DbValue;
			} else {
				$this->certificates->ViewValue = "";
			}
			$this->certificates->ViewCustomAttributes = "";

			// others
			if (!EmptyValue($this->others->Upload->DbValue)) {
				$this->others->ViewValue = $this->others->Upload->DbValue;
			} else {
				$this->others->ViewValue = "";
			}
			$this->others->ViewCustomAttributes = "";

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

			// createdby
			$this->createdby->ViewValue = $this->createdby->CurrentValue;
			$this->createdby->ViewValue = FormatNumber($this->createdby->ViewValue, 0, -2, -2, -2);
			$this->createdby->ViewCustomAttributes = "";

			// createddatetime
			$this->createddatetime->ViewValue = $this->createddatetime->CurrentValue;
			$this->createddatetime->ViewValue = FormatDateTime($this->createddatetime->ViewValue, 0);
			$this->createddatetime->ViewCustomAttributes = "";

			// HospID
			$this->HospID->ViewValue = $this->HospID->CurrentValue;
			$this->HospID->ViewValue = FormatNumber($this->HospID->ViewValue, 0, -2, -2, -2);
			$this->HospID->ViewCustomAttributes = "";

			// employee_id
			$this->employee_id->LinkCustomAttributes = "";
			$this->employee_id->HrefValue = "";
			$this->employee_id->TooltipValue = "";

			// degree_id
			$this->degree_id->LinkCustomAttributes = "";
			$this->degree_id->HrefValue = "";
			$this->degree_id->TooltipValue = "";

			// college_or_school
			$this->college_or_school->LinkCustomAttributes = "";
			$this->college_or_school->HrefValue = "";
			$this->college_or_school->TooltipValue = "";

			// university_or_board
			$this->university_or_board->LinkCustomAttributes = "";
			$this->university_or_board->HrefValue = "";
			$this->university_or_board->TooltipValue = "";

			// year_of_passing
			$this->year_of_passing->LinkCustomAttributes = "";
			$this->year_of_passing->HrefValue = "";
			$this->year_of_passing->TooltipValue = "";

			// scoring_marks
			$this->scoring_marks->LinkCustomAttributes = "";
			$this->scoring_marks->HrefValue = "";
			$this->scoring_marks->TooltipValue = "";

			// certificates
			$this->certificates->LinkCustomAttributes = "";
			if (!EmptyValue($this->certificates->Upload->DbValue)) {
				$this->certificates->HrefValue = "%u"; // Add prefix/suffix
				$this->certificates->LinkAttrs["target"] = ""; // Add target
				if ($this->isExport()) $this->certificates->HrefValue = FullUrl($this->certificates->HrefValue, "href");
			} else {
				$this->certificates->HrefValue = "";
			}
			$this->certificates->ExportHrefValue = $this->certificates->UploadPath . $this->certificates->Upload->DbValue;
			$this->certificates->TooltipValue = "";
			if ($this->certificates->UseColorbox) {
				if (EmptyValue($this->certificates->TooltipValue))
					$this->certificates->LinkAttrs["title"] = $Language->phrase("ViewImageGallery");
				$this->certificates->LinkAttrs["data-rel"] = "employee_has_degree_x_certificates";
				AppendClass($this->certificates->LinkAttrs["class"], "ew-lightbox");
			}

			// others
			$this->others->LinkCustomAttributes = "";
			$this->others->HrefValue = "";
			$this->others->ExportHrefValue = $this->others->UploadPath . $this->others->Upload->DbValue;
			$this->others->TooltipValue = "";

			// status
			$this->status->LinkCustomAttributes = "";
			$this->status->HrefValue = "";
			$this->status->TooltipValue = "";

			// createdby
			$this->createdby->LinkCustomAttributes = "";
			$this->createdby->HrefValue = "";
			$this->createdby->TooltipValue = "";

			// createddatetime
			$this->createddatetime->LinkCustomAttributes = "";
			$this->createddatetime->HrefValue = "";
			$this->createddatetime->TooltipValue = "";

			// HospID
			$this->HospID->LinkCustomAttributes = "";
			$this->HospID->HrefValue = "";
			$this->HospID->TooltipValue = "";
		} elseif ($this->RowType == ROWTYPE_ADD) { // Add row

			// employee_id
			$this->employee_id->EditAttrs["class"] = "form-control";
			$this->employee_id->EditCustomAttributes = "";
			if ($this->employee_id->getSessionValue() <> "") {
				$this->employee_id->CurrentValue = $this->employee_id->getSessionValue();
			$this->employee_id->ViewValue = $this->employee_id->CurrentValue;
			$this->employee_id->ViewValue = FormatNumber($this->employee_id->ViewValue, 0, -2, -2, -2);
			$this->employee_id->ViewCustomAttributes = "";
			} else {
			$this->employee_id->EditValue = HtmlEncode($this->employee_id->CurrentValue);
			$this->employee_id->PlaceHolder = RemoveHtml($this->employee_id->caption());
			}

			// degree_id
			$this->degree_id->EditAttrs["class"] = "form-control";
			$this->degree_id->EditCustomAttributes = "";
			$curVal = trim(strval($this->degree_id->CurrentValue));
			if ($curVal <> "")
				$this->degree_id->ViewValue = $this->degree_id->lookupCacheOption($curVal);
			else
				$this->degree_id->ViewValue = $this->degree_id->Lookup !== NULL && is_array($this->degree_id->Lookup->Options) ? $curVal : NULL;
			if ($this->degree_id->ViewValue !== NULL) { // Load from cache
				$this->degree_id->EditValue = array_values($this->degree_id->Lookup->Options);
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`id`" . SearchString("=", $this->degree_id->CurrentValue, DATATYPE_NUMBER, "");
				}
				$sqlWrk = $this->degree_id->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
				if ($rswrk) $rswrk->Close();
				$this->degree_id->EditValue = $arwrk;
			}

			// college_or_school
			$this->college_or_school->EditAttrs["class"] = "form-control";
			$this->college_or_school->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->college_or_school->CurrentValue = HtmlDecode($this->college_or_school->CurrentValue);
			$this->college_or_school->EditValue = HtmlEncode($this->college_or_school->CurrentValue);
			$this->college_or_school->PlaceHolder = RemoveHtml($this->college_or_school->caption());

			// university_or_board
			$this->university_or_board->EditAttrs["class"] = "form-control";
			$this->university_or_board->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->university_or_board->CurrentValue = HtmlDecode($this->university_or_board->CurrentValue);
			$this->university_or_board->EditValue = HtmlEncode($this->university_or_board->CurrentValue);
			$this->university_or_board->PlaceHolder = RemoveHtml($this->university_or_board->caption());

			// year_of_passing
			$this->year_of_passing->EditAttrs["class"] = "form-control";
			$this->year_of_passing->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->year_of_passing->CurrentValue = HtmlDecode($this->year_of_passing->CurrentValue);
			$this->year_of_passing->EditValue = HtmlEncode($this->year_of_passing->CurrentValue);
			$this->year_of_passing->PlaceHolder = RemoveHtml($this->year_of_passing->caption());

			// scoring_marks
			$this->scoring_marks->EditAttrs["class"] = "form-control";
			$this->scoring_marks->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->scoring_marks->CurrentValue = HtmlDecode($this->scoring_marks->CurrentValue);
			$this->scoring_marks->EditValue = HtmlEncode($this->scoring_marks->CurrentValue);
			$this->scoring_marks->PlaceHolder = RemoveHtml($this->scoring_marks->caption());

			// certificates
			$this->certificates->EditAttrs["class"] = "form-control";
			$this->certificates->EditCustomAttributes = "";
			if (!EmptyValue($this->certificates->Upload->DbValue)) {
				$this->certificates->ImageWidth = 100;
				$this->certificates->ImageHeight = 100;
				$this->certificates->ImageAlt = $this->certificates->alt();
				$this->certificates->EditValue = $this->certificates->Upload->DbValue;
			} else {
				$this->certificates->EditValue = "";
			}
			if (!EmptyValue($this->certificates->CurrentValue))
					$this->certificates->Upload->FileName = $this->certificates->CurrentValue;
			if (($this->isShow() || $this->isCopy()) && !$this->EventCancelled)
				RenderUploadField($this->certificates);

			// others
			$this->others->EditAttrs["class"] = "form-control";
			$this->others->EditCustomAttributes = "";
			if (!EmptyValue($this->others->Upload->DbValue)) {
				$this->others->EditValue = $this->others->Upload->DbValue;
			} else {
				$this->others->EditValue = "";
			}
			if (!EmptyValue($this->others->CurrentValue))
					$this->others->Upload->FileName = $this->others->CurrentValue;
			if (($this->isShow() || $this->isCopy()) && !$this->EventCancelled)
				RenderUploadField($this->others);

			// status
			$this->status->EditAttrs["class"] = "form-control";
			$this->status->EditCustomAttributes = "";
			$curVal = trim(strval($this->status->CurrentValue));
			if ($curVal <> "")
				$this->status->ViewValue = $this->status->lookupCacheOption($curVal);
			else
				$this->status->ViewValue = $this->status->Lookup !== NULL && is_array($this->status->Lookup->Options) ? $curVal : NULL;
			if ($this->status->ViewValue !== NULL) { // Load from cache
				$this->status->EditValue = array_values($this->status->Lookup->Options);
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`id`" . SearchString("=", $this->status->CurrentValue, DATATYPE_NUMBER, "");
				}
				$sqlWrk = $this->status->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
				if ($rswrk) $rswrk->Close();
				$this->status->EditValue = $arwrk;
			}

			// createdby
			// createddatetime
			// HospID

			$this->HospID->EditAttrs["class"] = "form-control";
			$this->HospID->EditCustomAttributes = "";
			$this->HospID->EditValue = HtmlEncode($this->HospID->CurrentValue);
			$this->HospID->PlaceHolder = RemoveHtml($this->HospID->caption());

			// Add refer script
			// employee_id

			$this->employee_id->LinkCustomAttributes = "";
			$this->employee_id->HrefValue = "";

			// degree_id
			$this->degree_id->LinkCustomAttributes = "";
			$this->degree_id->HrefValue = "";

			// college_or_school
			$this->college_or_school->LinkCustomAttributes = "";
			$this->college_or_school->HrefValue = "";

			// university_or_board
			$this->university_or_board->LinkCustomAttributes = "";
			$this->university_or_board->HrefValue = "";

			// year_of_passing
			$this->year_of_passing->LinkCustomAttributes = "";
			$this->year_of_passing->HrefValue = "";

			// scoring_marks
			$this->scoring_marks->LinkCustomAttributes = "";
			$this->scoring_marks->HrefValue = "";

			// certificates
			$this->certificates->LinkCustomAttributes = "";
			if (!EmptyValue($this->certificates->Upload->DbValue)) {
				$this->certificates->HrefValue = "%u"; // Add prefix/suffix
				$this->certificates->LinkAttrs["target"] = ""; // Add target
				if ($this->isExport()) $this->certificates->HrefValue = FullUrl($this->certificates->HrefValue, "href");
			} else {
				$this->certificates->HrefValue = "";
			}
			$this->certificates->ExportHrefValue = $this->certificates->UploadPath . $this->certificates->Upload->DbValue;

			// others
			$this->others->LinkCustomAttributes = "";
			$this->others->HrefValue = "";
			$this->others->ExportHrefValue = $this->others->UploadPath . $this->others->Upload->DbValue;

			// status
			$this->status->LinkCustomAttributes = "";
			$this->status->HrefValue = "";

			// createdby
			$this->createdby->LinkCustomAttributes = "";
			$this->createdby->HrefValue = "";

			// createddatetime
			$this->createddatetime->LinkCustomAttributes = "";
			$this->createddatetime->HrefValue = "";

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
		if (!CheckInteger($this->employee_id->FormValue)) {
			AddMessage($FormError, $this->employee_id->errorMessage());
		}
		if ($this->degree_id->Required) {
			if (!$this->degree_id->IsDetailKey && $this->degree_id->FormValue != NULL && $this->degree_id->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->degree_id->caption(), $this->degree_id->RequiredErrorMessage));
			}
		}
		if ($this->college_or_school->Required) {
			if (!$this->college_or_school->IsDetailKey && $this->college_or_school->FormValue != NULL && $this->college_or_school->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->college_or_school->caption(), $this->college_or_school->RequiredErrorMessage));
			}
		}
		if ($this->university_or_board->Required) {
			if (!$this->university_or_board->IsDetailKey && $this->university_or_board->FormValue != NULL && $this->university_or_board->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->university_or_board->caption(), $this->university_or_board->RequiredErrorMessage));
			}
		}
		if ($this->year_of_passing->Required) {
			if (!$this->year_of_passing->IsDetailKey && $this->year_of_passing->FormValue != NULL && $this->year_of_passing->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->year_of_passing->caption(), $this->year_of_passing->RequiredErrorMessage));
			}
		}
		if ($this->scoring_marks->Required) {
			if (!$this->scoring_marks->IsDetailKey && $this->scoring_marks->FormValue != NULL && $this->scoring_marks->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->scoring_marks->caption(), $this->scoring_marks->RequiredErrorMessage));
			}
		}
		if ($this->certificates->Required) {
			if ($this->certificates->Upload->FileName == "" && !$this->certificates->Upload->KeepFile) {
				AddMessage($FormError, str_replace("%s", $this->certificates->caption(), $this->certificates->RequiredErrorMessage));
			}
		}
		if ($this->others->Required) {
			if ($this->others->Upload->FileName == "" && !$this->others->Upload->KeepFile) {
				AddMessage($FormError, str_replace("%s", $this->others->caption(), $this->others->RequiredErrorMessage));
			}
		}
		if ($this->status->Required) {
			if (!$this->status->IsDetailKey && $this->status->FormValue != NULL && $this->status->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->status->caption(), $this->status->RequiredErrorMessage));
			}
		}
		if ($this->createdby->Required) {
			if (!$this->createdby->IsDetailKey && $this->createdby->FormValue != NULL && $this->createdby->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->createdby->caption(), $this->createdby->RequiredErrorMessage));
			}
		}
		if ($this->createddatetime->Required) {
			if (!$this->createddatetime->IsDetailKey && $this->createddatetime->FormValue != NULL && $this->createddatetime->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->createddatetime->caption(), $this->createddatetime->RequiredErrorMessage));
			}
		}
		if ($this->modifiedby->Required) {
			if (!$this->modifiedby->IsDetailKey && $this->modifiedby->FormValue != NULL && $this->modifiedby->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->modifiedby->caption(), $this->modifiedby->RequiredErrorMessage));
			}
		}
		if ($this->modifieddatetime->Required) {
			if (!$this->modifieddatetime->IsDetailKey && $this->modifieddatetime->FormValue != NULL && $this->modifieddatetime->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->modifieddatetime->caption(), $this->modifieddatetime->RequiredErrorMessage));
			}
		}
		if ($this->HospID->Required) {
			if (!$this->HospID->IsDetailKey && $this->HospID->FormValue != NULL && $this->HospID->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->HospID->caption(), $this->HospID->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->HospID->FormValue)) {
			AddMessage($FormError, $this->HospID->errorMessage());
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

		// Check referential integrity for master table 'employee'
		$validMasterRecord = TRUE;
		$masterFilter = $this->sqlMasterFilter_employee();
		if (strval($this->employee_id->CurrentValue) <> "") {
			$masterFilter = str_replace("@id@", AdjustSql($this->employee_id->CurrentValue, "DB"), $masterFilter);
		} else {
			$validMasterRecord = FALSE;
		}
		if ($validMasterRecord) {
			if (!isset($GLOBALS["employee"]))
				$GLOBALS["employee"] = new employee();
			$rsmaster = $GLOBALS["employee"]->loadRs($masterFilter);
			$validMasterRecord = ($rsmaster && !$rsmaster->EOF);
			$rsmaster->close();
		}
		if (!$validMasterRecord) {
			$relatedRecordMsg = str_replace("%t", "employee", $Language->phrase("RelatedRecordRequired"));
			$this->setFailureMessage($relatedRecordMsg);
			return FALSE;
		}
		$conn = &$this->getConnection();

		// Load db values from rsold
		$this->loadDbValues($rsold);
		if ($rsold) {
		}
		$rsnew = [];

		// employee_id
		$this->employee_id->setDbValueDef($rsnew, $this->employee_id->CurrentValue, 0, FALSE);

		// degree_id
		$this->degree_id->setDbValueDef($rsnew, $this->degree_id->CurrentValue, 0, FALSE);

		// college_or_school
		$this->college_or_school->setDbValueDef($rsnew, $this->college_or_school->CurrentValue, "", FALSE);

		// university_or_board
		$this->university_or_board->setDbValueDef($rsnew, $this->university_or_board->CurrentValue, "", FALSE);

		// year_of_passing
		$this->year_of_passing->setDbValueDef($rsnew, $this->year_of_passing->CurrentValue, "", FALSE);

		// scoring_marks
		$this->scoring_marks->setDbValueDef($rsnew, $this->scoring_marks->CurrentValue, "", FALSE);

		// certificates
		if ($this->certificates->Visible && !$this->certificates->Upload->KeepFile) {
			$this->certificates->Upload->DbValue = ""; // No need to delete old file
			if ($this->certificates->Upload->FileName == "") {
				$rsnew['certificates'] = NULL;
			} else {
				$rsnew['certificates'] = $this->certificates->Upload->FileName;
			}
		}

		// others
		if ($this->others->Visible && !$this->others->Upload->KeepFile) {
			$this->others->Upload->DbValue = ""; // No need to delete old file
			if ($this->others->Upload->FileName == "") {
				$rsnew['others'] = NULL;
			} else {
				$rsnew['others'] = $this->others->Upload->FileName;
			}
		}

		// status
		$this->status->setDbValueDef($rsnew, $this->status->CurrentValue, 0, FALSE);

		// createdby
		$this->createdby->setDbValueDef($rsnew, CurrentUserID(), NULL);
		$rsnew['createdby'] = &$this->createdby->DbValue;

		// createddatetime
		$this->createddatetime->setDbValueDef($rsnew, CurrentDateTime(), NULL);
		$rsnew['createddatetime'] = &$this->createddatetime->DbValue;

		// HospID
		$this->HospID->setDbValueDef($rsnew, $this->HospID->CurrentValue, NULL, FALSE);
		if ($this->certificates->Visible && !$this->certificates->Upload->KeepFile) {
			$oldFiles = EmptyValue($this->certificates->Upload->DbValue) ? array() : explode(MULTIPLE_UPLOAD_SEPARATOR, strval($this->certificates->Upload->DbValue));
			if (!EmptyValue($this->certificates->Upload->FileName)) {
				$newFiles = explode(MULTIPLE_UPLOAD_SEPARATOR, strval($this->certificates->Upload->FileName));
				$NewFileCount = count($newFiles);
				for ($i = 0; $i < $NewFileCount; $i++) {
					if ($newFiles[$i] <> "") {
						$file = $newFiles[$i];
						if (file_exists(UploadTempPath($this->certificates, $this->certificates->Upload->Index) . $file)) {
							if (DELETE_UPLOADED_FILES) {
								$oldFileFound = FALSE;
								$oldFileCount = count($oldFiles);
								for ($j = 0; $j < $oldFileCount; $j++) {
									$oldFile = $oldFiles[$j];
									if ($oldFile == $file) { // Old file found, no need to delete anymore
										unset($oldFiles[$j]);
										$oldFileFound = TRUE;
										break;
									}
								}
								if ($oldFileFound) // No need to check if file exists further
									continue;
							}
							$file1 = UniqueFilename($this->certificates->physicalUploadPath(), $file); // Get new file name
							if ($file1 <> $file) { // Rename temp file
								while (file_exists(UploadTempPath($this->certificates, $this->certificates->Upload->Index) . $file1) || file_exists($this->certificates->physicalUploadPath() . $file1)) // Make sure no file name clash
									$file1 = UniqueFilename($this->certificates->physicalUploadPath(), $file1, TRUE); // Use indexed name
								rename(UploadTempPath($this->certificates, $this->certificates->Upload->Index) . $file, UploadTempPath($this->certificates, $this->certificates->Upload->Index) . $file1);
								$newFiles[$i] = $file1;
							}
						}
					}
				}
				$this->certificates->Upload->DbValue = empty($oldFiles) ? "" : implode(MULTIPLE_UPLOAD_SEPARATOR, $oldFiles);
				$this->certificates->Upload->FileName = implode(MULTIPLE_UPLOAD_SEPARATOR, $newFiles);
				$this->certificates->setDbValueDef($rsnew, $this->certificates->Upload->FileName, "", FALSE);
			}
		}
		if ($this->others->Visible && !$this->others->Upload->KeepFile) {
			$oldFiles = EmptyValue($this->others->Upload->DbValue) ? array() : explode(MULTIPLE_UPLOAD_SEPARATOR, strval($this->others->Upload->DbValue));
			if (!EmptyValue($this->others->Upload->FileName)) {
				$newFiles = explode(MULTIPLE_UPLOAD_SEPARATOR, strval($this->others->Upload->FileName));
				$NewFileCount = count($newFiles);
				for ($i = 0; $i < $NewFileCount; $i++) {
					if ($newFiles[$i] <> "") {
						$file = $newFiles[$i];
						if (file_exists(UploadTempPath($this->others, $this->others->Upload->Index) . $file)) {
							if (DELETE_UPLOADED_FILES) {
								$oldFileFound = FALSE;
								$oldFileCount = count($oldFiles);
								for ($j = 0; $j < $oldFileCount; $j++) {
									$oldFile = $oldFiles[$j];
									if ($oldFile == $file) { // Old file found, no need to delete anymore
										unset($oldFiles[$j]);
										$oldFileFound = TRUE;
										break;
									}
								}
								if ($oldFileFound) // No need to check if file exists further
									continue;
							}
							$file1 = UniqueFilename($this->others->physicalUploadPath(), $file); // Get new file name
							if ($file1 <> $file) { // Rename temp file
								while (file_exists(UploadTempPath($this->others, $this->others->Upload->Index) . $file1) || file_exists($this->others->physicalUploadPath() . $file1)) // Make sure no file name clash
									$file1 = UniqueFilename($this->others->physicalUploadPath(), $file1, TRUE); // Use indexed name
								rename(UploadTempPath($this->others, $this->others->Upload->Index) . $file, UploadTempPath($this->others, $this->others->Upload->Index) . $file1);
								$newFiles[$i] = $file1;
							}
						}
					}
				}
				$this->others->Upload->DbValue = empty($oldFiles) ? "" : implode(MULTIPLE_UPLOAD_SEPARATOR, $oldFiles);
				$this->others->Upload->FileName = implode(MULTIPLE_UPLOAD_SEPARATOR, $newFiles);
				$this->others->setDbValueDef($rsnew, $this->others->Upload->FileName, "", FALSE);
			}
		}

		// Call Row Inserting event
		$rs = ($rsold) ? $rsold->fields : NULL;
		$insertRow = $this->Row_Inserting($rs, $rsnew);
		if ($insertRow) {
			$conn->raiseErrorFn = $GLOBALS["ERROR_FUNC"];
			$addRow = $this->insert($rsnew);
			$conn->raiseErrorFn = '';
			if ($addRow) {
				if ($this->certificates->Visible && !$this->certificates->Upload->KeepFile) {
					$oldFiles = EmptyValue($this->certificates->Upload->DbValue) ? array() : explode(MULTIPLE_UPLOAD_SEPARATOR, strval($this->certificates->Upload->DbValue));
					if (!EmptyValue($this->certificates->Upload->FileName)) {
						$newFiles = explode(MULTIPLE_UPLOAD_SEPARATOR, $this->certificates->Upload->FileName);
						$newFiles2 = explode(MULTIPLE_UPLOAD_SEPARATOR, $rsnew['certificates']);
						$newFileCount = count($newFiles);
						for ($i = 0; $i < $newFileCount; $i++) {
							if ($newFiles[$i] <> "") {
								$file = UploadTempPath($this->certificates, $this->certificates->Upload->Index) . $newFiles[$i];
								if (file_exists($file)) {
									if (@$newFiles2[$i] <> "") // Use correct file name
										$newFiles[$i] = $newFiles2[$i];
									if (!$this->certificates->Upload->saveToFile($newFiles[$i], TRUE, $i)) { // Just replace
										$this->setFailureMessage($Language->phrase("UploadErrMsg7"));
										return FALSE;
									}
								}
							}
						}
					} else {
						$newFiles = array();
					}
					if (DELETE_UPLOADED_FILES) {
						foreach ($oldFiles as $oldFile) {
							if ($oldFile <> "" && !in_array($oldFile, $newFiles))
								@unlink($this->certificates->oldPhysicalUploadPath() . $oldFile);
						}
					}
				}
				if ($this->others->Visible && !$this->others->Upload->KeepFile) {
					$oldFiles = EmptyValue($this->others->Upload->DbValue) ? array() : explode(MULTIPLE_UPLOAD_SEPARATOR, strval($this->others->Upload->DbValue));
					if (!EmptyValue($this->others->Upload->FileName)) {
						$newFiles = explode(MULTIPLE_UPLOAD_SEPARATOR, $this->others->Upload->FileName);
						$newFiles2 = explode(MULTIPLE_UPLOAD_SEPARATOR, $rsnew['others']);
						$newFileCount = count($newFiles);
						for ($i = 0; $i < $newFileCount; $i++) {
							if ($newFiles[$i] <> "") {
								$file = UploadTempPath($this->others, $this->others->Upload->Index) . $newFiles[$i];
								if (file_exists($file)) {
									if (@$newFiles2[$i] <> "") // Use correct file name
										$newFiles[$i] = $newFiles2[$i];
									if (!$this->others->Upload->saveToFile($newFiles[$i], TRUE, $i)) { // Just replace
										$this->setFailureMessage($Language->phrase("UploadErrMsg7"));
										return FALSE;
									}
								}
							}
						}
					} else {
						$newFiles = array();
					}
					if (DELETE_UPLOADED_FILES) {
						foreach ($oldFiles as $oldFile) {
							if ($oldFile <> "" && !in_array($oldFile, $newFiles))
								@unlink($this->others->oldPhysicalUploadPath() . $oldFile);
						}
					}
				}
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

		// certificates
		if ($this->certificates->Upload->FileToken <> "")
			CleanUploadTempPath($this->certificates->Upload->FileToken, $this->certificates->Upload->Index);
		else
			CleanUploadTempPath($this->certificates, $this->certificates->Upload->Index);

		// others
		if ($this->others->Upload->FileToken <> "")
			CleanUploadTempPath($this->others->Upload->FileToken, $this->others->Upload->Index);
		else
			CleanUploadTempPath($this->others, $this->others->Upload->Index);

		// Write JSON for API request
		if (IsApi() && $addRow) {
			$row = $this->getRecordsFromRecordset([$rsnew], TRUE);
			WriteJson(["success" => TRUE, $this->TableVar => $row]);
		}
		return $addRow;
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
			if ($masterTblVar == "employee") {
				$validMaster = TRUE;
				if (Get("fk_id") !== NULL) {
					$this->employee_id->setQueryStringValue(Get("fk_id"));
					$this->employee_id->setSessionValue($this->employee_id->QueryStringValue);
					if (!is_numeric($this->employee_id->QueryStringValue))
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
			if ($masterTblVar == "employee") {
				$validMaster = TRUE;
				if (Post("fk_id") !== NULL) {
					$this->employee_id->setFormValue(Post("fk_id"));
					$this->employee_id->setSessionValue($this->employee_id->FormValue);
					if (!is_numeric($this->employee_id->FormValue))
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
			if ($masterTblVar <> "employee") {
				if ($this->employee_id->CurrentValue == "")
					$this->employee_id->setSessionValue("");
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
		$Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("employee_has_degreelist.php"), "", $this->TableVar, TRUE);
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
						case "x_degree_id":
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
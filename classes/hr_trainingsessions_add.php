<?php
namespace PHPMaker2019\HIMS;

/**
 * Page class
 */
class hr_trainingsessions_add extends hr_trainingsessions
{

	// Page ID
	public $PageID = "add";

	// Project ID
	public $ProjectID = "{EA4F6D13-AF8F-428D-9EA7-BA88D1107EC3}";

	// Table name
	public $TableName = 'hr_trainingsessions';

	// Page object name
	public $PageObjName = "hr_trainingsessions_add";

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

		// Table object (hr_trainingsessions)
		if (!isset($GLOBALS["hr_trainingsessions"]) || get_class($GLOBALS["hr_trainingsessions"]) == PROJECT_NAMESPACE . "hr_trainingsessions") {
			$GLOBALS["hr_trainingsessions"] = &$this;
			$GLOBALS["Table"] = &$GLOBALS["hr_trainingsessions"];
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
			define(PROJECT_NAMESPACE . "TABLE_NAME", 'hr_trainingsessions');

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
		global $EXPORT, $hr_trainingsessions;
		if ($this->CustomExport && $this->CustomExport == $this->Export && array_key_exists($this->CustomExport, $EXPORT)) {
				$content = ob_get_contents();
			if ($ExportFileName == "")
				$ExportFileName = $this->TableVar;
			$class = PROJECT_NAMESPACE . $EXPORT[$this->CustomExport];
			if (class_exists($class)) {
				$doc = new $class($hr_trainingsessions);
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
					if ($pageName == "hr_trainingsessionsview.php")
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
					$this->terminate(GetUrl("hr_trainingsessionslist.php"));
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
		$this->course->setVisibility();
		$this->description->setVisibility();
		$this->scheduled->setVisibility();
		$this->dueDate->setVisibility();
		$this->deliveryMethod->setVisibility();
		$this->deliveryLocation->setVisibility();
		$this->status->setVisibility();
		$this->attendanceType->setVisibility();
		$this->attachment->setVisibility();
		$this->created->setVisibility();
		$this->updated->setVisibility();
		$this->requireProof->setVisibility();
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
					$this->terminate("hr_trainingsessionslist.php"); // No matching record, return to list
				}
				break;
			case "insert": // Add new record
				$this->SendEmail = TRUE; // Send email on add success
				if ($this->addRow($this->OldRecordset)) { // Add successful
					if ($this->getSuccessMessage() == "")
						$this->setSuccessMessage($Language->phrase("AddSuccess")); // Set up success message
					$returnUrl = $this->getReturnUrl();
					if (GetPageName($returnUrl) == "hr_trainingsessionslist.php")
						$returnUrl = $this->addMasterUrl($returnUrl); // List page, return to List page with correct master key if necessary
					elseif (GetPageName($returnUrl) == "hr_trainingsessionsview.php")
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
		$this->course->CurrentValue = NULL;
		$this->course->OldValue = $this->course->CurrentValue;
		$this->description->CurrentValue = NULL;
		$this->description->OldValue = $this->description->CurrentValue;
		$this->scheduled->CurrentValue = NULL;
		$this->scheduled->OldValue = $this->scheduled->CurrentValue;
		$this->dueDate->CurrentValue = NULL;
		$this->dueDate->OldValue = $this->dueDate->CurrentValue;
		$this->deliveryMethod->CurrentValue = "Classroom";
		$this->deliveryLocation->CurrentValue = NULL;
		$this->deliveryLocation->OldValue = $this->deliveryLocation->CurrentValue;
		$this->status->CurrentValue = "Pending";
		$this->attendanceType->CurrentValue = "Sign Up";
		$this->attachment->CurrentValue = NULL;
		$this->attachment->OldValue = $this->attachment->CurrentValue;
		$this->created->CurrentValue = NULL;
		$this->created->OldValue = $this->created->CurrentValue;
		$this->updated->CurrentValue = NULL;
		$this->updated->OldValue = $this->updated->CurrentValue;
		$this->requireProof->CurrentValue = "Yes";
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

		// Check field name 'course' first before field var 'x_course'
		$val = $CurrentForm->hasValue("course") ? $CurrentForm->getValue("course") : $CurrentForm->getValue("x_course");
		if (!$this->course->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->course->Visible = FALSE; // Disable update for API request
			else
				$this->course->setFormValue($val);
		}

		// Check field name 'description' first before field var 'x_description'
		$val = $CurrentForm->hasValue("description") ? $CurrentForm->getValue("description") : $CurrentForm->getValue("x_description");
		if (!$this->description->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->description->Visible = FALSE; // Disable update for API request
			else
				$this->description->setFormValue($val);
		}

		// Check field name 'scheduled' first before field var 'x_scheduled'
		$val = $CurrentForm->hasValue("scheduled") ? $CurrentForm->getValue("scheduled") : $CurrentForm->getValue("x_scheduled");
		if (!$this->scheduled->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->scheduled->Visible = FALSE; // Disable update for API request
			else
				$this->scheduled->setFormValue($val);
			$this->scheduled->CurrentValue = UnFormatDateTime($this->scheduled->CurrentValue, 0);
		}

		// Check field name 'dueDate' first before field var 'x_dueDate'
		$val = $CurrentForm->hasValue("dueDate") ? $CurrentForm->getValue("dueDate") : $CurrentForm->getValue("x_dueDate");
		if (!$this->dueDate->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->dueDate->Visible = FALSE; // Disable update for API request
			else
				$this->dueDate->setFormValue($val);
			$this->dueDate->CurrentValue = UnFormatDateTime($this->dueDate->CurrentValue, 0);
		}

		// Check field name 'deliveryMethod' first before field var 'x_deliveryMethod'
		$val = $CurrentForm->hasValue("deliveryMethod") ? $CurrentForm->getValue("deliveryMethod") : $CurrentForm->getValue("x_deliveryMethod");
		if (!$this->deliveryMethod->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->deliveryMethod->Visible = FALSE; // Disable update for API request
			else
				$this->deliveryMethod->setFormValue($val);
		}

		// Check field name 'deliveryLocation' first before field var 'x_deliveryLocation'
		$val = $CurrentForm->hasValue("deliveryLocation") ? $CurrentForm->getValue("deliveryLocation") : $CurrentForm->getValue("x_deliveryLocation");
		if (!$this->deliveryLocation->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->deliveryLocation->Visible = FALSE; // Disable update for API request
			else
				$this->deliveryLocation->setFormValue($val);
		}

		// Check field name 'status' first before field var 'x_status'
		$val = $CurrentForm->hasValue("status") ? $CurrentForm->getValue("status") : $CurrentForm->getValue("x_status");
		if (!$this->status->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->status->Visible = FALSE; // Disable update for API request
			else
				$this->status->setFormValue($val);
		}

		// Check field name 'attendanceType' first before field var 'x_attendanceType'
		$val = $CurrentForm->hasValue("attendanceType") ? $CurrentForm->getValue("attendanceType") : $CurrentForm->getValue("x_attendanceType");
		if (!$this->attendanceType->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->attendanceType->Visible = FALSE; // Disable update for API request
			else
				$this->attendanceType->setFormValue($val);
		}

		// Check field name 'attachment' first before field var 'x_attachment'
		$val = $CurrentForm->hasValue("attachment") ? $CurrentForm->getValue("attachment") : $CurrentForm->getValue("x_attachment");
		if (!$this->attachment->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->attachment->Visible = FALSE; // Disable update for API request
			else
				$this->attachment->setFormValue($val);
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

		// Check field name 'requireProof' first before field var 'x_requireProof'
		$val = $CurrentForm->hasValue("requireProof") ? $CurrentForm->getValue("requireProof") : $CurrentForm->getValue("x_requireProof");
		if (!$this->requireProof->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->requireProof->Visible = FALSE; // Disable update for API request
			else
				$this->requireProof->setFormValue($val);
		}

		// Check field name 'id' first before field var 'x_id'
		$val = $CurrentForm->hasValue("id") ? $CurrentForm->getValue("id") : $CurrentForm->getValue("x_id");
	}

	// Restore form values
	public function restoreFormValues()
	{
		global $CurrentForm;
		$this->name->CurrentValue = $this->name->FormValue;
		$this->course->CurrentValue = $this->course->FormValue;
		$this->description->CurrentValue = $this->description->FormValue;
		$this->scheduled->CurrentValue = $this->scheduled->FormValue;
		$this->scheduled->CurrentValue = UnFormatDateTime($this->scheduled->CurrentValue, 0);
		$this->dueDate->CurrentValue = $this->dueDate->FormValue;
		$this->dueDate->CurrentValue = UnFormatDateTime($this->dueDate->CurrentValue, 0);
		$this->deliveryMethod->CurrentValue = $this->deliveryMethod->FormValue;
		$this->deliveryLocation->CurrentValue = $this->deliveryLocation->FormValue;
		$this->status->CurrentValue = $this->status->FormValue;
		$this->attendanceType->CurrentValue = $this->attendanceType->FormValue;
		$this->attachment->CurrentValue = $this->attachment->FormValue;
		$this->created->CurrentValue = $this->created->FormValue;
		$this->created->CurrentValue = UnFormatDateTime($this->created->CurrentValue, 0);
		$this->updated->CurrentValue = $this->updated->FormValue;
		$this->updated->CurrentValue = UnFormatDateTime($this->updated->CurrentValue, 0);
		$this->requireProof->CurrentValue = $this->requireProof->FormValue;
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
		$this->course->setDbValue($row['course']);
		$this->description->setDbValue($row['description']);
		$this->scheduled->setDbValue($row['scheduled']);
		$this->dueDate->setDbValue($row['dueDate']);
		$this->deliveryMethod->setDbValue($row['deliveryMethod']);
		$this->deliveryLocation->setDbValue($row['deliveryLocation']);
		$this->status->setDbValue($row['status']);
		$this->attendanceType->setDbValue($row['attendanceType']);
		$this->attachment->setDbValue($row['attachment']);
		$this->created->setDbValue($row['created']);
		$this->updated->setDbValue($row['updated']);
		$this->requireProof->setDbValue($row['requireProof']);
	}

	// Return a row with default values
	protected function newRow()
	{
		$this->loadDefaultValues();
		$row = [];
		$row['id'] = $this->id->CurrentValue;
		$row['name'] = $this->name->CurrentValue;
		$row['course'] = $this->course->CurrentValue;
		$row['description'] = $this->description->CurrentValue;
		$row['scheduled'] = $this->scheduled->CurrentValue;
		$row['dueDate'] = $this->dueDate->CurrentValue;
		$row['deliveryMethod'] = $this->deliveryMethod->CurrentValue;
		$row['deliveryLocation'] = $this->deliveryLocation->CurrentValue;
		$row['status'] = $this->status->CurrentValue;
		$row['attendanceType'] = $this->attendanceType->CurrentValue;
		$row['attachment'] = $this->attachment->CurrentValue;
		$row['created'] = $this->created->CurrentValue;
		$row['updated'] = $this->updated->CurrentValue;
		$row['requireProof'] = $this->requireProof->CurrentValue;
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
		// name
		// course
		// description
		// scheduled
		// dueDate
		// deliveryMethod
		// deliveryLocation
		// status
		// attendanceType
		// attachment
		// created
		// updated
		// requireProof

		if ($this->RowType == ROWTYPE_VIEW) { // View row

			// id
			$this->id->ViewValue = $this->id->CurrentValue;
			$this->id->ViewCustomAttributes = "";

			// name
			$this->name->ViewValue = $this->name->CurrentValue;
			$this->name->ViewCustomAttributes = "";

			// course
			$this->course->ViewValue = $this->course->CurrentValue;
			$this->course->ViewValue = FormatNumber($this->course->ViewValue, 0, -2, -2, -2);
			$this->course->ViewCustomAttributes = "";

			// description
			$this->description->ViewValue = $this->description->CurrentValue;
			$this->description->ViewCustomAttributes = "";

			// scheduled
			$this->scheduled->ViewValue = $this->scheduled->CurrentValue;
			$this->scheduled->ViewValue = FormatDateTime($this->scheduled->ViewValue, 0);
			$this->scheduled->ViewCustomAttributes = "";

			// dueDate
			$this->dueDate->ViewValue = $this->dueDate->CurrentValue;
			$this->dueDate->ViewValue = FormatDateTime($this->dueDate->ViewValue, 0);
			$this->dueDate->ViewCustomAttributes = "";

			// deliveryMethod
			if (strval($this->deliveryMethod->CurrentValue) <> "") {
				$this->deliveryMethod->ViewValue = $this->deliveryMethod->optionCaption($this->deliveryMethod->CurrentValue);
			} else {
				$this->deliveryMethod->ViewValue = NULL;
			}
			$this->deliveryMethod->ViewCustomAttributes = "";

			// deliveryLocation
			$this->deliveryLocation->ViewValue = $this->deliveryLocation->CurrentValue;
			$this->deliveryLocation->ViewCustomAttributes = "";

			// status
			if (strval($this->status->CurrentValue) <> "") {
				$this->status->ViewValue = $this->status->optionCaption($this->status->CurrentValue);
			} else {
				$this->status->ViewValue = NULL;
			}
			$this->status->ViewCustomAttributes = "";

			// attendanceType
			if (strval($this->attendanceType->CurrentValue) <> "") {
				$this->attendanceType->ViewValue = $this->attendanceType->optionCaption($this->attendanceType->CurrentValue);
			} else {
				$this->attendanceType->ViewValue = NULL;
			}
			$this->attendanceType->ViewCustomAttributes = "";

			// attachment
			$this->attachment->ViewValue = $this->attachment->CurrentValue;
			$this->attachment->ViewCustomAttributes = "";

			// created
			$this->created->ViewValue = $this->created->CurrentValue;
			$this->created->ViewValue = FormatDateTime($this->created->ViewValue, 0);
			$this->created->ViewCustomAttributes = "";

			// updated
			$this->updated->ViewValue = $this->updated->CurrentValue;
			$this->updated->ViewValue = FormatDateTime($this->updated->ViewValue, 0);
			$this->updated->ViewCustomAttributes = "";

			// requireProof
			if (strval($this->requireProof->CurrentValue) <> "") {
				$this->requireProof->ViewValue = $this->requireProof->optionCaption($this->requireProof->CurrentValue);
			} else {
				$this->requireProof->ViewValue = NULL;
			}
			$this->requireProof->ViewCustomAttributes = "";

			// name
			$this->name->LinkCustomAttributes = "";
			$this->name->HrefValue = "";
			$this->name->TooltipValue = "";

			// course
			$this->course->LinkCustomAttributes = "";
			$this->course->HrefValue = "";
			$this->course->TooltipValue = "";

			// description
			$this->description->LinkCustomAttributes = "";
			$this->description->HrefValue = "";
			$this->description->TooltipValue = "";

			// scheduled
			$this->scheduled->LinkCustomAttributes = "";
			$this->scheduled->HrefValue = "";
			$this->scheduled->TooltipValue = "";

			// dueDate
			$this->dueDate->LinkCustomAttributes = "";
			$this->dueDate->HrefValue = "";
			$this->dueDate->TooltipValue = "";

			// deliveryMethod
			$this->deliveryMethod->LinkCustomAttributes = "";
			$this->deliveryMethod->HrefValue = "";
			$this->deliveryMethod->TooltipValue = "";

			// deliveryLocation
			$this->deliveryLocation->LinkCustomAttributes = "";
			$this->deliveryLocation->HrefValue = "";
			$this->deliveryLocation->TooltipValue = "";

			// status
			$this->status->LinkCustomAttributes = "";
			$this->status->HrefValue = "";
			$this->status->TooltipValue = "";

			// attendanceType
			$this->attendanceType->LinkCustomAttributes = "";
			$this->attendanceType->HrefValue = "";
			$this->attendanceType->TooltipValue = "";

			// attachment
			$this->attachment->LinkCustomAttributes = "";
			$this->attachment->HrefValue = "";
			$this->attachment->TooltipValue = "";

			// created
			$this->created->LinkCustomAttributes = "";
			$this->created->HrefValue = "";
			$this->created->TooltipValue = "";

			// updated
			$this->updated->LinkCustomAttributes = "";
			$this->updated->HrefValue = "";
			$this->updated->TooltipValue = "";

			// requireProof
			$this->requireProof->LinkCustomAttributes = "";
			$this->requireProof->HrefValue = "";
			$this->requireProof->TooltipValue = "";
		} elseif ($this->RowType == ROWTYPE_ADD) { // Add row

			// name
			$this->name->EditAttrs["class"] = "form-control";
			$this->name->EditCustomAttributes = "";
			$this->name->EditValue = HtmlEncode($this->name->CurrentValue);
			$this->name->PlaceHolder = RemoveHtml($this->name->caption());

			// course
			$this->course->EditAttrs["class"] = "form-control";
			$this->course->EditCustomAttributes = "";
			$this->course->EditValue = HtmlEncode($this->course->CurrentValue);
			$this->course->PlaceHolder = RemoveHtml($this->course->caption());

			// description
			$this->description->EditAttrs["class"] = "form-control";
			$this->description->EditCustomAttributes = "";
			$this->description->EditValue = HtmlEncode($this->description->CurrentValue);
			$this->description->PlaceHolder = RemoveHtml($this->description->caption());

			// scheduled
			$this->scheduled->EditAttrs["class"] = "form-control";
			$this->scheduled->EditCustomAttributes = "";
			$this->scheduled->EditValue = HtmlEncode(FormatDateTime($this->scheduled->CurrentValue, 8));
			$this->scheduled->PlaceHolder = RemoveHtml($this->scheduled->caption());

			// dueDate
			$this->dueDate->EditAttrs["class"] = "form-control";
			$this->dueDate->EditCustomAttributes = "";
			$this->dueDate->EditValue = HtmlEncode(FormatDateTime($this->dueDate->CurrentValue, 8));
			$this->dueDate->PlaceHolder = RemoveHtml($this->dueDate->caption());

			// deliveryMethod
			$this->deliveryMethod->EditCustomAttributes = "";
			$this->deliveryMethod->EditValue = $this->deliveryMethod->options(FALSE);

			// deliveryLocation
			$this->deliveryLocation->EditAttrs["class"] = "form-control";
			$this->deliveryLocation->EditCustomAttributes = "";
			$this->deliveryLocation->EditValue = HtmlEncode($this->deliveryLocation->CurrentValue);
			$this->deliveryLocation->PlaceHolder = RemoveHtml($this->deliveryLocation->caption());

			// status
			$this->status->EditCustomAttributes = "";
			$this->status->EditValue = $this->status->options(FALSE);

			// attendanceType
			$this->attendanceType->EditCustomAttributes = "";
			$this->attendanceType->EditValue = $this->attendanceType->options(FALSE);

			// attachment
			$this->attachment->EditAttrs["class"] = "form-control";
			$this->attachment->EditCustomAttributes = "";
			$this->attachment->EditValue = HtmlEncode($this->attachment->CurrentValue);
			$this->attachment->PlaceHolder = RemoveHtml($this->attachment->caption());

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

			// requireProof
			$this->requireProof->EditCustomAttributes = "";
			$this->requireProof->EditValue = $this->requireProof->options(FALSE);

			// Add refer script
			// name

			$this->name->LinkCustomAttributes = "";
			$this->name->HrefValue = "";

			// course
			$this->course->LinkCustomAttributes = "";
			$this->course->HrefValue = "";

			// description
			$this->description->LinkCustomAttributes = "";
			$this->description->HrefValue = "";

			// scheduled
			$this->scheduled->LinkCustomAttributes = "";
			$this->scheduled->HrefValue = "";

			// dueDate
			$this->dueDate->LinkCustomAttributes = "";
			$this->dueDate->HrefValue = "";

			// deliveryMethod
			$this->deliveryMethod->LinkCustomAttributes = "";
			$this->deliveryMethod->HrefValue = "";

			// deliveryLocation
			$this->deliveryLocation->LinkCustomAttributes = "";
			$this->deliveryLocation->HrefValue = "";

			// status
			$this->status->LinkCustomAttributes = "";
			$this->status->HrefValue = "";

			// attendanceType
			$this->attendanceType->LinkCustomAttributes = "";
			$this->attendanceType->HrefValue = "";

			// attachment
			$this->attachment->LinkCustomAttributes = "";
			$this->attachment->HrefValue = "";

			// created
			$this->created->LinkCustomAttributes = "";
			$this->created->HrefValue = "";

			// updated
			$this->updated->LinkCustomAttributes = "";
			$this->updated->HrefValue = "";

			// requireProof
			$this->requireProof->LinkCustomAttributes = "";
			$this->requireProof->HrefValue = "";
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
		if ($this->course->Required) {
			if (!$this->course->IsDetailKey && $this->course->FormValue != NULL && $this->course->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->course->caption(), $this->course->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->course->FormValue)) {
			AddMessage($FormError, $this->course->errorMessage());
		}
		if ($this->description->Required) {
			if (!$this->description->IsDetailKey && $this->description->FormValue != NULL && $this->description->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->description->caption(), $this->description->RequiredErrorMessage));
			}
		}
		if ($this->scheduled->Required) {
			if (!$this->scheduled->IsDetailKey && $this->scheduled->FormValue != NULL && $this->scheduled->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->scheduled->caption(), $this->scheduled->RequiredErrorMessage));
			}
		}
		if (!CheckDate($this->scheduled->FormValue)) {
			AddMessage($FormError, $this->scheduled->errorMessage());
		}
		if ($this->dueDate->Required) {
			if (!$this->dueDate->IsDetailKey && $this->dueDate->FormValue != NULL && $this->dueDate->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->dueDate->caption(), $this->dueDate->RequiredErrorMessage));
			}
		}
		if (!CheckDate($this->dueDate->FormValue)) {
			AddMessage($FormError, $this->dueDate->errorMessage());
		}
		if ($this->deliveryMethod->Required) {
			if ($this->deliveryMethod->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->deliveryMethod->caption(), $this->deliveryMethod->RequiredErrorMessage));
			}
		}
		if ($this->deliveryLocation->Required) {
			if (!$this->deliveryLocation->IsDetailKey && $this->deliveryLocation->FormValue != NULL && $this->deliveryLocation->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->deliveryLocation->caption(), $this->deliveryLocation->RequiredErrorMessage));
			}
		}
		if ($this->status->Required) {
			if ($this->status->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->status->caption(), $this->status->RequiredErrorMessage));
			}
		}
		if ($this->attendanceType->Required) {
			if ($this->attendanceType->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->attendanceType->caption(), $this->attendanceType->RequiredErrorMessage));
			}
		}
		if ($this->attachment->Required) {
			if (!$this->attachment->IsDetailKey && $this->attachment->FormValue != NULL && $this->attachment->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->attachment->caption(), $this->attachment->RequiredErrorMessage));
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
		if ($this->requireProof->Required) {
			if ($this->requireProof->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->requireProof->caption(), $this->requireProof->RequiredErrorMessage));
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

		// name
		$this->name->setDbValueDef($rsnew, $this->name->CurrentValue, "", FALSE);

		// course
		$this->course->setDbValueDef($rsnew, $this->course->CurrentValue, 0, FALSE);

		// description
		$this->description->setDbValueDef($rsnew, $this->description->CurrentValue, NULL, FALSE);

		// scheduled
		$this->scheduled->setDbValueDef($rsnew, UnFormatDateTime($this->scheduled->CurrentValue, 0), NULL, FALSE);

		// dueDate
		$this->dueDate->setDbValueDef($rsnew, UnFormatDateTime($this->dueDate->CurrentValue, 0), NULL, FALSE);

		// deliveryMethod
		$this->deliveryMethod->setDbValueDef($rsnew, $this->deliveryMethod->CurrentValue, NULL, strval($this->deliveryMethod->CurrentValue) == "");

		// deliveryLocation
		$this->deliveryLocation->setDbValueDef($rsnew, $this->deliveryLocation->CurrentValue, NULL, FALSE);

		// status
		$this->status->setDbValueDef($rsnew, $this->status->CurrentValue, NULL, strval($this->status->CurrentValue) == "");

		// attendanceType
		$this->attendanceType->setDbValueDef($rsnew, $this->attendanceType->CurrentValue, NULL, strval($this->attendanceType->CurrentValue) == "");

		// attachment
		$this->attachment->setDbValueDef($rsnew, $this->attachment->CurrentValue, NULL, FALSE);

		// created
		$this->created->setDbValueDef($rsnew, UnFormatDateTime($this->created->CurrentValue, 0), NULL, FALSE);

		// updated
		$this->updated->setDbValueDef($rsnew, UnFormatDateTime($this->updated->CurrentValue, 0), NULL, FALSE);

		// requireProof
		$this->requireProof->setDbValueDef($rsnew, $this->requireProof->CurrentValue, NULL, strval($this->requireProof->CurrentValue) == "");

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
		$Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("hr_trainingsessionslist.php"), "", $this->TableVar, TRUE);
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
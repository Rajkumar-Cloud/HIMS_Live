<?php
namespace PHPMaker2019\HIMS;

/**
 * Page class
 */
class recruitment_job_add extends recruitment_job
{

	// Page ID
	public $PageID = "add";

	// Project ID
	public $ProjectID = "{EA4F6D13-AF8F-428D-9EA7-BA88D1107EC3}";

	// Table name
	public $TableName = 'recruitment_job';

	// Page object name
	public $PageObjName = "recruitment_job_add";

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

		// Table object (recruitment_job)
		if (!isset($GLOBALS["recruitment_job"]) || get_class($GLOBALS["recruitment_job"]) == PROJECT_NAMESPACE . "recruitment_job") {
			$GLOBALS["recruitment_job"] = &$this;
			$GLOBALS["Table"] = &$GLOBALS["recruitment_job"];
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
			define(PROJECT_NAMESPACE . "TABLE_NAME", 'recruitment_job');

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
		global $EXPORT, $recruitment_job;
		if ($this->CustomExport && $this->CustomExport == $this->Export && array_key_exists($this->CustomExport, $EXPORT)) {
				$content = ob_get_contents();
			if ($ExportFileName == "")
				$ExportFileName = $this->TableVar;
			$class = PROJECT_NAMESPACE . $EXPORT[$this->CustomExport];
			if (class_exists($class)) {
				$doc = new $class($recruitment_job);
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
					if ($pageName == "recruitment_jobview.php")
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
					$this->terminate(GetUrl("recruitment_joblist.php"));
				else
					$this->terminate(GetUrl("login.php"));
				return;
			}
		}

		// Create form object
		$CurrentForm = new HttpForm();
		$this->CurrentAction = Param("action"); // Set up current action
		$this->id->Visible = FALSE;
		$this->title->setVisibility();
		$this->shortDescription->setVisibility();
		$this->description->setVisibility();
		$this->requirements->setVisibility();
		$this->benefits->setVisibility();
		$this->country->setVisibility();
		$this->company->setVisibility();
		$this->department->setVisibility();
		$this->code->setVisibility();
		$this->employementType->setVisibility();
		$this->industry->setVisibility();
		$this->experienceLevel->setVisibility();
		$this->jobFunction->setVisibility();
		$this->educationLevel->setVisibility();
		$this->currency->setVisibility();
		$this->showSalary->setVisibility();
		$this->salaryMin->setVisibility();
		$this->salaryMax->setVisibility();
		$this->keywords->setVisibility();
		$this->status->setVisibility();
		$this->closingDate->setVisibility();
		$this->attachment->setVisibility();
		$this->display->setVisibility();
		$this->postedBy->setVisibility();
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
					$this->terminate("recruitment_joblist.php"); // No matching record, return to list
				}
				break;
			case "insert": // Add new record
				$this->SendEmail = TRUE; // Send email on add success
				if ($this->addRow($this->OldRecordset)) { // Add successful
					if ($this->getSuccessMessage() == "")
						$this->setSuccessMessage($Language->phrase("AddSuccess")); // Set up success message
					$returnUrl = $this->getReturnUrl();
					if (GetPageName($returnUrl) == "recruitment_joblist.php")
						$returnUrl = $this->addMasterUrl($returnUrl); // List page, return to List page with correct master key if necessary
					elseif (GetPageName($returnUrl) == "recruitment_jobview.php")
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
		$this->title->CurrentValue = NULL;
		$this->title->OldValue = $this->title->CurrentValue;
		$this->shortDescription->CurrentValue = NULL;
		$this->shortDescription->OldValue = $this->shortDescription->CurrentValue;
		$this->description->CurrentValue = NULL;
		$this->description->OldValue = $this->description->CurrentValue;
		$this->requirements->CurrentValue = NULL;
		$this->requirements->OldValue = $this->requirements->CurrentValue;
		$this->benefits->CurrentValue = NULL;
		$this->benefits->OldValue = $this->benefits->CurrentValue;
		$this->country->CurrentValue = NULL;
		$this->country->OldValue = $this->country->CurrentValue;
		$this->company->CurrentValue = NULL;
		$this->company->OldValue = $this->company->CurrentValue;
		$this->department->CurrentValue = NULL;
		$this->department->OldValue = $this->department->CurrentValue;
		$this->code->CurrentValue = NULL;
		$this->code->OldValue = $this->code->CurrentValue;
		$this->employementType->CurrentValue = NULL;
		$this->employementType->OldValue = $this->employementType->CurrentValue;
		$this->industry->CurrentValue = NULL;
		$this->industry->OldValue = $this->industry->CurrentValue;
		$this->experienceLevel->CurrentValue = NULL;
		$this->experienceLevel->OldValue = $this->experienceLevel->CurrentValue;
		$this->jobFunction->CurrentValue = NULL;
		$this->jobFunction->OldValue = $this->jobFunction->CurrentValue;
		$this->educationLevel->CurrentValue = NULL;
		$this->educationLevel->OldValue = $this->educationLevel->CurrentValue;
		$this->currency->CurrentValue = NULL;
		$this->currency->OldValue = $this->currency->CurrentValue;
		$this->showSalary->CurrentValue = NULL;
		$this->showSalary->OldValue = $this->showSalary->CurrentValue;
		$this->salaryMin->CurrentValue = NULL;
		$this->salaryMin->OldValue = $this->salaryMin->CurrentValue;
		$this->salaryMax->CurrentValue = NULL;
		$this->salaryMax->OldValue = $this->salaryMax->CurrentValue;
		$this->keywords->CurrentValue = NULL;
		$this->keywords->OldValue = $this->keywords->CurrentValue;
		$this->status->CurrentValue = NULL;
		$this->status->OldValue = $this->status->CurrentValue;
		$this->closingDate->CurrentValue = NULL;
		$this->closingDate->OldValue = $this->closingDate->CurrentValue;
		$this->attachment->CurrentValue = NULL;
		$this->attachment->OldValue = $this->attachment->CurrentValue;
		$this->display->CurrentValue = NULL;
		$this->display->OldValue = $this->display->CurrentValue;
		$this->postedBy->CurrentValue = NULL;
		$this->postedBy->OldValue = $this->postedBy->CurrentValue;
	}

	// Load form values
	protected function loadFormValues()
	{

		// Load from form
		global $CurrentForm;

		// Check field name 'title' first before field var 'x_title'
		$val = $CurrentForm->hasValue("title") ? $CurrentForm->getValue("title") : $CurrentForm->getValue("x_title");
		if (!$this->title->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->title->Visible = FALSE; // Disable update for API request
			else
				$this->title->setFormValue($val);
		}

		// Check field name 'shortDescription' first before field var 'x_shortDescription'
		$val = $CurrentForm->hasValue("shortDescription") ? $CurrentForm->getValue("shortDescription") : $CurrentForm->getValue("x_shortDescription");
		if (!$this->shortDescription->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->shortDescription->Visible = FALSE; // Disable update for API request
			else
				$this->shortDescription->setFormValue($val);
		}

		// Check field name 'description' first before field var 'x_description'
		$val = $CurrentForm->hasValue("description") ? $CurrentForm->getValue("description") : $CurrentForm->getValue("x_description");
		if (!$this->description->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->description->Visible = FALSE; // Disable update for API request
			else
				$this->description->setFormValue($val);
		}

		// Check field name 'requirements' first before field var 'x_requirements'
		$val = $CurrentForm->hasValue("requirements") ? $CurrentForm->getValue("requirements") : $CurrentForm->getValue("x_requirements");
		if (!$this->requirements->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->requirements->Visible = FALSE; // Disable update for API request
			else
				$this->requirements->setFormValue($val);
		}

		// Check field name 'benefits' first before field var 'x_benefits'
		$val = $CurrentForm->hasValue("benefits") ? $CurrentForm->getValue("benefits") : $CurrentForm->getValue("x_benefits");
		if (!$this->benefits->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->benefits->Visible = FALSE; // Disable update for API request
			else
				$this->benefits->setFormValue($val);
		}

		// Check field name 'country' first before field var 'x_country'
		$val = $CurrentForm->hasValue("country") ? $CurrentForm->getValue("country") : $CurrentForm->getValue("x_country");
		if (!$this->country->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->country->Visible = FALSE; // Disable update for API request
			else
				$this->country->setFormValue($val);
		}

		// Check field name 'company' first before field var 'x_company'
		$val = $CurrentForm->hasValue("company") ? $CurrentForm->getValue("company") : $CurrentForm->getValue("x_company");
		if (!$this->company->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->company->Visible = FALSE; // Disable update for API request
			else
				$this->company->setFormValue($val);
		}

		// Check field name 'department' first before field var 'x_department'
		$val = $CurrentForm->hasValue("department") ? $CurrentForm->getValue("department") : $CurrentForm->getValue("x_department");
		if (!$this->department->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->department->Visible = FALSE; // Disable update for API request
			else
				$this->department->setFormValue($val);
		}

		// Check field name 'code' first before field var 'x_code'
		$val = $CurrentForm->hasValue("code") ? $CurrentForm->getValue("code") : $CurrentForm->getValue("x_code");
		if (!$this->code->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->code->Visible = FALSE; // Disable update for API request
			else
				$this->code->setFormValue($val);
		}

		// Check field name 'employementType' first before field var 'x_employementType'
		$val = $CurrentForm->hasValue("employementType") ? $CurrentForm->getValue("employementType") : $CurrentForm->getValue("x_employementType");
		if (!$this->employementType->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->employementType->Visible = FALSE; // Disable update for API request
			else
				$this->employementType->setFormValue($val);
		}

		// Check field name 'industry' first before field var 'x_industry'
		$val = $CurrentForm->hasValue("industry") ? $CurrentForm->getValue("industry") : $CurrentForm->getValue("x_industry");
		if (!$this->industry->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->industry->Visible = FALSE; // Disable update for API request
			else
				$this->industry->setFormValue($val);
		}

		// Check field name 'experienceLevel' first before field var 'x_experienceLevel'
		$val = $CurrentForm->hasValue("experienceLevel") ? $CurrentForm->getValue("experienceLevel") : $CurrentForm->getValue("x_experienceLevel");
		if (!$this->experienceLevel->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->experienceLevel->Visible = FALSE; // Disable update for API request
			else
				$this->experienceLevel->setFormValue($val);
		}

		// Check field name 'jobFunction' first before field var 'x_jobFunction'
		$val = $CurrentForm->hasValue("jobFunction") ? $CurrentForm->getValue("jobFunction") : $CurrentForm->getValue("x_jobFunction");
		if (!$this->jobFunction->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->jobFunction->Visible = FALSE; // Disable update for API request
			else
				$this->jobFunction->setFormValue($val);
		}

		// Check field name 'educationLevel' first before field var 'x_educationLevel'
		$val = $CurrentForm->hasValue("educationLevel") ? $CurrentForm->getValue("educationLevel") : $CurrentForm->getValue("x_educationLevel");
		if (!$this->educationLevel->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->educationLevel->Visible = FALSE; // Disable update for API request
			else
				$this->educationLevel->setFormValue($val);
		}

		// Check field name 'currency' first before field var 'x_currency'
		$val = $CurrentForm->hasValue("currency") ? $CurrentForm->getValue("currency") : $CurrentForm->getValue("x_currency");
		if (!$this->currency->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->currency->Visible = FALSE; // Disable update for API request
			else
				$this->currency->setFormValue($val);
		}

		// Check field name 'showSalary' first before field var 'x_showSalary'
		$val = $CurrentForm->hasValue("showSalary") ? $CurrentForm->getValue("showSalary") : $CurrentForm->getValue("x_showSalary");
		if (!$this->showSalary->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->showSalary->Visible = FALSE; // Disable update for API request
			else
				$this->showSalary->setFormValue($val);
		}

		// Check field name 'salaryMin' first before field var 'x_salaryMin'
		$val = $CurrentForm->hasValue("salaryMin") ? $CurrentForm->getValue("salaryMin") : $CurrentForm->getValue("x_salaryMin");
		if (!$this->salaryMin->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->salaryMin->Visible = FALSE; // Disable update for API request
			else
				$this->salaryMin->setFormValue($val);
		}

		// Check field name 'salaryMax' first before field var 'x_salaryMax'
		$val = $CurrentForm->hasValue("salaryMax") ? $CurrentForm->getValue("salaryMax") : $CurrentForm->getValue("x_salaryMax");
		if (!$this->salaryMax->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->salaryMax->Visible = FALSE; // Disable update for API request
			else
				$this->salaryMax->setFormValue($val);
		}

		// Check field name 'keywords' first before field var 'x_keywords'
		$val = $CurrentForm->hasValue("keywords") ? $CurrentForm->getValue("keywords") : $CurrentForm->getValue("x_keywords");
		if (!$this->keywords->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->keywords->Visible = FALSE; // Disable update for API request
			else
				$this->keywords->setFormValue($val);
		}

		// Check field name 'status' first before field var 'x_status'
		$val = $CurrentForm->hasValue("status") ? $CurrentForm->getValue("status") : $CurrentForm->getValue("x_status");
		if (!$this->status->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->status->Visible = FALSE; // Disable update for API request
			else
				$this->status->setFormValue($val);
		}

		// Check field name 'closingDate' first before field var 'x_closingDate'
		$val = $CurrentForm->hasValue("closingDate") ? $CurrentForm->getValue("closingDate") : $CurrentForm->getValue("x_closingDate");
		if (!$this->closingDate->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->closingDate->Visible = FALSE; // Disable update for API request
			else
				$this->closingDate->setFormValue($val);
			$this->closingDate->CurrentValue = UnFormatDateTime($this->closingDate->CurrentValue, 0);
		}

		// Check field name 'attachment' first before field var 'x_attachment'
		$val = $CurrentForm->hasValue("attachment") ? $CurrentForm->getValue("attachment") : $CurrentForm->getValue("x_attachment");
		if (!$this->attachment->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->attachment->Visible = FALSE; // Disable update for API request
			else
				$this->attachment->setFormValue($val);
		}

		// Check field name 'display' first before field var 'x_display'
		$val = $CurrentForm->hasValue("display") ? $CurrentForm->getValue("display") : $CurrentForm->getValue("x_display");
		if (!$this->display->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->display->Visible = FALSE; // Disable update for API request
			else
				$this->display->setFormValue($val);
		}

		// Check field name 'postedBy' first before field var 'x_postedBy'
		$val = $CurrentForm->hasValue("postedBy") ? $CurrentForm->getValue("postedBy") : $CurrentForm->getValue("x_postedBy");
		if (!$this->postedBy->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->postedBy->Visible = FALSE; // Disable update for API request
			else
				$this->postedBy->setFormValue($val);
		}

		// Check field name 'id' first before field var 'x_id'
		$val = $CurrentForm->hasValue("id") ? $CurrentForm->getValue("id") : $CurrentForm->getValue("x_id");
	}

	// Restore form values
	public function restoreFormValues()
	{
		global $CurrentForm;
		$this->title->CurrentValue = $this->title->FormValue;
		$this->shortDescription->CurrentValue = $this->shortDescription->FormValue;
		$this->description->CurrentValue = $this->description->FormValue;
		$this->requirements->CurrentValue = $this->requirements->FormValue;
		$this->benefits->CurrentValue = $this->benefits->FormValue;
		$this->country->CurrentValue = $this->country->FormValue;
		$this->company->CurrentValue = $this->company->FormValue;
		$this->department->CurrentValue = $this->department->FormValue;
		$this->code->CurrentValue = $this->code->FormValue;
		$this->employementType->CurrentValue = $this->employementType->FormValue;
		$this->industry->CurrentValue = $this->industry->FormValue;
		$this->experienceLevel->CurrentValue = $this->experienceLevel->FormValue;
		$this->jobFunction->CurrentValue = $this->jobFunction->FormValue;
		$this->educationLevel->CurrentValue = $this->educationLevel->FormValue;
		$this->currency->CurrentValue = $this->currency->FormValue;
		$this->showSalary->CurrentValue = $this->showSalary->FormValue;
		$this->salaryMin->CurrentValue = $this->salaryMin->FormValue;
		$this->salaryMax->CurrentValue = $this->salaryMax->FormValue;
		$this->keywords->CurrentValue = $this->keywords->FormValue;
		$this->status->CurrentValue = $this->status->FormValue;
		$this->closingDate->CurrentValue = $this->closingDate->FormValue;
		$this->closingDate->CurrentValue = UnFormatDateTime($this->closingDate->CurrentValue, 0);
		$this->attachment->CurrentValue = $this->attachment->FormValue;
		$this->display->CurrentValue = $this->display->FormValue;
		$this->postedBy->CurrentValue = $this->postedBy->FormValue;
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
		$this->title->setDbValue($row['title']);
		$this->shortDescription->setDbValue($row['shortDescription']);
		$this->description->setDbValue($row['description']);
		$this->requirements->setDbValue($row['requirements']);
		$this->benefits->setDbValue($row['benefits']);
		$this->country->setDbValue($row['country']);
		$this->company->setDbValue($row['company']);
		$this->department->setDbValue($row['department']);
		$this->code->setDbValue($row['code']);
		$this->employementType->setDbValue($row['employementType']);
		$this->industry->setDbValue($row['industry']);
		$this->experienceLevel->setDbValue($row['experienceLevel']);
		$this->jobFunction->setDbValue($row['jobFunction']);
		$this->educationLevel->setDbValue($row['educationLevel']);
		$this->currency->setDbValue($row['currency']);
		$this->showSalary->setDbValue($row['showSalary']);
		$this->salaryMin->setDbValue($row['salaryMin']);
		$this->salaryMax->setDbValue($row['salaryMax']);
		$this->keywords->setDbValue($row['keywords']);
		$this->status->setDbValue($row['status']);
		$this->closingDate->setDbValue($row['closingDate']);
		$this->attachment->setDbValue($row['attachment']);
		$this->display->setDbValue($row['display']);
		$this->postedBy->setDbValue($row['postedBy']);
	}

	// Return a row with default values
	protected function newRow()
	{
		$this->loadDefaultValues();
		$row = [];
		$row['id'] = $this->id->CurrentValue;
		$row['title'] = $this->title->CurrentValue;
		$row['shortDescription'] = $this->shortDescription->CurrentValue;
		$row['description'] = $this->description->CurrentValue;
		$row['requirements'] = $this->requirements->CurrentValue;
		$row['benefits'] = $this->benefits->CurrentValue;
		$row['country'] = $this->country->CurrentValue;
		$row['company'] = $this->company->CurrentValue;
		$row['department'] = $this->department->CurrentValue;
		$row['code'] = $this->code->CurrentValue;
		$row['employementType'] = $this->employementType->CurrentValue;
		$row['industry'] = $this->industry->CurrentValue;
		$row['experienceLevel'] = $this->experienceLevel->CurrentValue;
		$row['jobFunction'] = $this->jobFunction->CurrentValue;
		$row['educationLevel'] = $this->educationLevel->CurrentValue;
		$row['currency'] = $this->currency->CurrentValue;
		$row['showSalary'] = $this->showSalary->CurrentValue;
		$row['salaryMin'] = $this->salaryMin->CurrentValue;
		$row['salaryMax'] = $this->salaryMax->CurrentValue;
		$row['keywords'] = $this->keywords->CurrentValue;
		$row['status'] = $this->status->CurrentValue;
		$row['closingDate'] = $this->closingDate->CurrentValue;
		$row['attachment'] = $this->attachment->CurrentValue;
		$row['display'] = $this->display->CurrentValue;
		$row['postedBy'] = $this->postedBy->CurrentValue;
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
		// title
		// shortDescription
		// description
		// requirements
		// benefits
		// country
		// company
		// department
		// code
		// employementType
		// industry
		// experienceLevel
		// jobFunction
		// educationLevel
		// currency
		// showSalary
		// salaryMin
		// salaryMax
		// keywords
		// status
		// closingDate
		// attachment
		// display
		// postedBy

		if ($this->RowType == ROWTYPE_VIEW) { // View row

			// id
			$this->id->ViewValue = $this->id->CurrentValue;
			$this->id->ViewCustomAttributes = "";

			// title
			$this->title->ViewValue = $this->title->CurrentValue;
			$this->title->ViewCustomAttributes = "";

			// shortDescription
			$this->shortDescription->ViewValue = $this->shortDescription->CurrentValue;
			$this->shortDescription->ViewCustomAttributes = "";

			// description
			$this->description->ViewValue = $this->description->CurrentValue;
			$this->description->ViewCustomAttributes = "";

			// requirements
			$this->requirements->ViewValue = $this->requirements->CurrentValue;
			$this->requirements->ViewCustomAttributes = "";

			// benefits
			$this->benefits->ViewValue = $this->benefits->CurrentValue;
			$this->benefits->ViewCustomAttributes = "";

			// country
			$this->country->ViewValue = $this->country->CurrentValue;
			$this->country->ViewValue = FormatNumber($this->country->ViewValue, 0, -2, -2, -2);
			$this->country->ViewCustomAttributes = "";

			// company
			$this->company->ViewValue = $this->company->CurrentValue;
			$this->company->ViewValue = FormatNumber($this->company->ViewValue, 0, -2, -2, -2);
			$this->company->ViewCustomAttributes = "";

			// department
			$this->department->ViewValue = $this->department->CurrentValue;
			$this->department->ViewCustomAttributes = "";

			// code
			$this->code->ViewValue = $this->code->CurrentValue;
			$this->code->ViewCustomAttributes = "";

			// employementType
			$this->employementType->ViewValue = $this->employementType->CurrentValue;
			$this->employementType->ViewValue = FormatNumber($this->employementType->ViewValue, 0, -2, -2, -2);
			$this->employementType->ViewCustomAttributes = "";

			// industry
			$this->industry->ViewValue = $this->industry->CurrentValue;
			$this->industry->ViewValue = FormatNumber($this->industry->ViewValue, 0, -2, -2, -2);
			$this->industry->ViewCustomAttributes = "";

			// experienceLevel
			$this->experienceLevel->ViewValue = $this->experienceLevel->CurrentValue;
			$this->experienceLevel->ViewValue = FormatNumber($this->experienceLevel->ViewValue, 0, -2, -2, -2);
			$this->experienceLevel->ViewCustomAttributes = "";

			// jobFunction
			$this->jobFunction->ViewValue = $this->jobFunction->CurrentValue;
			$this->jobFunction->ViewValue = FormatNumber($this->jobFunction->ViewValue, 0, -2, -2, -2);
			$this->jobFunction->ViewCustomAttributes = "";

			// educationLevel
			$this->educationLevel->ViewValue = $this->educationLevel->CurrentValue;
			$this->educationLevel->ViewValue = FormatNumber($this->educationLevel->ViewValue, 0, -2, -2, -2);
			$this->educationLevel->ViewCustomAttributes = "";

			// currency
			$this->currency->ViewValue = $this->currency->CurrentValue;
			$this->currency->ViewValue = FormatNumber($this->currency->ViewValue, 0, -2, -2, -2);
			$this->currency->ViewCustomAttributes = "";

			// showSalary
			if (strval($this->showSalary->CurrentValue) <> "") {
				$this->showSalary->ViewValue = $this->showSalary->optionCaption($this->showSalary->CurrentValue);
			} else {
				$this->showSalary->ViewValue = NULL;
			}
			$this->showSalary->ViewCustomAttributes = "";

			// salaryMin
			$this->salaryMin->ViewValue = $this->salaryMin->CurrentValue;
			$this->salaryMin->ViewValue = FormatNumber($this->salaryMin->ViewValue, 0, -2, -2, -2);
			$this->salaryMin->ViewCustomAttributes = "";

			// salaryMax
			$this->salaryMax->ViewValue = $this->salaryMax->CurrentValue;
			$this->salaryMax->ViewValue = FormatNumber($this->salaryMax->ViewValue, 0, -2, -2, -2);
			$this->salaryMax->ViewCustomAttributes = "";

			// keywords
			$this->keywords->ViewValue = $this->keywords->CurrentValue;
			$this->keywords->ViewCustomAttributes = "";

			// status
			if (strval($this->status->CurrentValue) <> "") {
				$this->status->ViewValue = $this->status->optionCaption($this->status->CurrentValue);
			} else {
				$this->status->ViewValue = NULL;
			}
			$this->status->ViewCustomAttributes = "";

			// closingDate
			$this->closingDate->ViewValue = $this->closingDate->CurrentValue;
			$this->closingDate->ViewValue = FormatDateTime($this->closingDate->ViewValue, 0);
			$this->closingDate->ViewCustomAttributes = "";

			// attachment
			$this->attachment->ViewValue = $this->attachment->CurrentValue;
			$this->attachment->ViewCustomAttributes = "";

			// display
			$this->display->ViewValue = $this->display->CurrentValue;
			$this->display->ViewCustomAttributes = "";

			// postedBy
			$this->postedBy->ViewValue = $this->postedBy->CurrentValue;
			$this->postedBy->ViewValue = FormatNumber($this->postedBy->ViewValue, 0, -2, -2, -2);
			$this->postedBy->ViewCustomAttributes = "";

			// title
			$this->title->LinkCustomAttributes = "";
			$this->title->HrefValue = "";
			$this->title->TooltipValue = "";

			// shortDescription
			$this->shortDescription->LinkCustomAttributes = "";
			$this->shortDescription->HrefValue = "";
			$this->shortDescription->TooltipValue = "";

			// description
			$this->description->LinkCustomAttributes = "";
			$this->description->HrefValue = "";
			$this->description->TooltipValue = "";

			// requirements
			$this->requirements->LinkCustomAttributes = "";
			$this->requirements->HrefValue = "";
			$this->requirements->TooltipValue = "";

			// benefits
			$this->benefits->LinkCustomAttributes = "";
			$this->benefits->HrefValue = "";
			$this->benefits->TooltipValue = "";

			// country
			$this->country->LinkCustomAttributes = "";
			$this->country->HrefValue = "";
			$this->country->TooltipValue = "";

			// company
			$this->company->LinkCustomAttributes = "";
			$this->company->HrefValue = "";
			$this->company->TooltipValue = "";

			// department
			$this->department->LinkCustomAttributes = "";
			$this->department->HrefValue = "";
			$this->department->TooltipValue = "";

			// code
			$this->code->LinkCustomAttributes = "";
			$this->code->HrefValue = "";
			$this->code->TooltipValue = "";

			// employementType
			$this->employementType->LinkCustomAttributes = "";
			$this->employementType->HrefValue = "";
			$this->employementType->TooltipValue = "";

			// industry
			$this->industry->LinkCustomAttributes = "";
			$this->industry->HrefValue = "";
			$this->industry->TooltipValue = "";

			// experienceLevel
			$this->experienceLevel->LinkCustomAttributes = "";
			$this->experienceLevel->HrefValue = "";
			$this->experienceLevel->TooltipValue = "";

			// jobFunction
			$this->jobFunction->LinkCustomAttributes = "";
			$this->jobFunction->HrefValue = "";
			$this->jobFunction->TooltipValue = "";

			// educationLevel
			$this->educationLevel->LinkCustomAttributes = "";
			$this->educationLevel->HrefValue = "";
			$this->educationLevel->TooltipValue = "";

			// currency
			$this->currency->LinkCustomAttributes = "";
			$this->currency->HrefValue = "";
			$this->currency->TooltipValue = "";

			// showSalary
			$this->showSalary->LinkCustomAttributes = "";
			$this->showSalary->HrefValue = "";
			$this->showSalary->TooltipValue = "";

			// salaryMin
			$this->salaryMin->LinkCustomAttributes = "";
			$this->salaryMin->HrefValue = "";
			$this->salaryMin->TooltipValue = "";

			// salaryMax
			$this->salaryMax->LinkCustomAttributes = "";
			$this->salaryMax->HrefValue = "";
			$this->salaryMax->TooltipValue = "";

			// keywords
			$this->keywords->LinkCustomAttributes = "";
			$this->keywords->HrefValue = "";
			$this->keywords->TooltipValue = "";

			// status
			$this->status->LinkCustomAttributes = "";
			$this->status->HrefValue = "";
			$this->status->TooltipValue = "";

			// closingDate
			$this->closingDate->LinkCustomAttributes = "";
			$this->closingDate->HrefValue = "";
			$this->closingDate->TooltipValue = "";

			// attachment
			$this->attachment->LinkCustomAttributes = "";
			$this->attachment->HrefValue = "";
			$this->attachment->TooltipValue = "";

			// display
			$this->display->LinkCustomAttributes = "";
			$this->display->HrefValue = "";
			$this->display->TooltipValue = "";

			// postedBy
			$this->postedBy->LinkCustomAttributes = "";
			$this->postedBy->HrefValue = "";
			$this->postedBy->TooltipValue = "";
		} elseif ($this->RowType == ROWTYPE_ADD) { // Add row

			// title
			$this->title->EditAttrs["class"] = "form-control";
			$this->title->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->title->CurrentValue = HtmlDecode($this->title->CurrentValue);
			$this->title->EditValue = HtmlEncode($this->title->CurrentValue);
			$this->title->PlaceHolder = RemoveHtml($this->title->caption());

			// shortDescription
			$this->shortDescription->EditAttrs["class"] = "form-control";
			$this->shortDescription->EditCustomAttributes = "";
			$this->shortDescription->EditValue = HtmlEncode($this->shortDescription->CurrentValue);
			$this->shortDescription->PlaceHolder = RemoveHtml($this->shortDescription->caption());

			// description
			$this->description->EditAttrs["class"] = "form-control";
			$this->description->EditCustomAttributes = "";
			$this->description->EditValue = HtmlEncode($this->description->CurrentValue);
			$this->description->PlaceHolder = RemoveHtml($this->description->caption());

			// requirements
			$this->requirements->EditAttrs["class"] = "form-control";
			$this->requirements->EditCustomAttributes = "";
			$this->requirements->EditValue = HtmlEncode($this->requirements->CurrentValue);
			$this->requirements->PlaceHolder = RemoveHtml($this->requirements->caption());

			// benefits
			$this->benefits->EditAttrs["class"] = "form-control";
			$this->benefits->EditCustomAttributes = "";
			$this->benefits->EditValue = HtmlEncode($this->benefits->CurrentValue);
			$this->benefits->PlaceHolder = RemoveHtml($this->benefits->caption());

			// country
			$this->country->EditAttrs["class"] = "form-control";
			$this->country->EditCustomAttributes = "";
			$this->country->EditValue = HtmlEncode($this->country->CurrentValue);
			$this->country->PlaceHolder = RemoveHtml($this->country->caption());

			// company
			$this->company->EditAttrs["class"] = "form-control";
			$this->company->EditCustomAttributes = "";
			$this->company->EditValue = HtmlEncode($this->company->CurrentValue);
			$this->company->PlaceHolder = RemoveHtml($this->company->caption());

			// department
			$this->department->EditAttrs["class"] = "form-control";
			$this->department->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->department->CurrentValue = HtmlDecode($this->department->CurrentValue);
			$this->department->EditValue = HtmlEncode($this->department->CurrentValue);
			$this->department->PlaceHolder = RemoveHtml($this->department->caption());

			// code
			$this->code->EditAttrs["class"] = "form-control";
			$this->code->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->code->CurrentValue = HtmlDecode($this->code->CurrentValue);
			$this->code->EditValue = HtmlEncode($this->code->CurrentValue);
			$this->code->PlaceHolder = RemoveHtml($this->code->caption());

			// employementType
			$this->employementType->EditAttrs["class"] = "form-control";
			$this->employementType->EditCustomAttributes = "";
			$this->employementType->EditValue = HtmlEncode($this->employementType->CurrentValue);
			$this->employementType->PlaceHolder = RemoveHtml($this->employementType->caption());

			// industry
			$this->industry->EditAttrs["class"] = "form-control";
			$this->industry->EditCustomAttributes = "";
			$this->industry->EditValue = HtmlEncode($this->industry->CurrentValue);
			$this->industry->PlaceHolder = RemoveHtml($this->industry->caption());

			// experienceLevel
			$this->experienceLevel->EditAttrs["class"] = "form-control";
			$this->experienceLevel->EditCustomAttributes = "";
			$this->experienceLevel->EditValue = HtmlEncode($this->experienceLevel->CurrentValue);
			$this->experienceLevel->PlaceHolder = RemoveHtml($this->experienceLevel->caption());

			// jobFunction
			$this->jobFunction->EditAttrs["class"] = "form-control";
			$this->jobFunction->EditCustomAttributes = "";
			$this->jobFunction->EditValue = HtmlEncode($this->jobFunction->CurrentValue);
			$this->jobFunction->PlaceHolder = RemoveHtml($this->jobFunction->caption());

			// educationLevel
			$this->educationLevel->EditAttrs["class"] = "form-control";
			$this->educationLevel->EditCustomAttributes = "";
			$this->educationLevel->EditValue = HtmlEncode($this->educationLevel->CurrentValue);
			$this->educationLevel->PlaceHolder = RemoveHtml($this->educationLevel->caption());

			// currency
			$this->currency->EditAttrs["class"] = "form-control";
			$this->currency->EditCustomAttributes = "";
			$this->currency->EditValue = HtmlEncode($this->currency->CurrentValue);
			$this->currency->PlaceHolder = RemoveHtml($this->currency->caption());

			// showSalary
			$this->showSalary->EditCustomAttributes = "";
			$this->showSalary->EditValue = $this->showSalary->options(FALSE);

			// salaryMin
			$this->salaryMin->EditAttrs["class"] = "form-control";
			$this->salaryMin->EditCustomAttributes = "";
			$this->salaryMin->EditValue = HtmlEncode($this->salaryMin->CurrentValue);
			$this->salaryMin->PlaceHolder = RemoveHtml($this->salaryMin->caption());

			// salaryMax
			$this->salaryMax->EditAttrs["class"] = "form-control";
			$this->salaryMax->EditCustomAttributes = "";
			$this->salaryMax->EditValue = HtmlEncode($this->salaryMax->CurrentValue);
			$this->salaryMax->PlaceHolder = RemoveHtml($this->salaryMax->caption());

			// keywords
			$this->keywords->EditAttrs["class"] = "form-control";
			$this->keywords->EditCustomAttributes = "";
			$this->keywords->EditValue = HtmlEncode($this->keywords->CurrentValue);
			$this->keywords->PlaceHolder = RemoveHtml($this->keywords->caption());

			// status
			$this->status->EditCustomAttributes = "";
			$this->status->EditValue = $this->status->options(FALSE);

			// closingDate
			$this->closingDate->EditAttrs["class"] = "form-control";
			$this->closingDate->EditCustomAttributes = "";
			$this->closingDate->EditValue = HtmlEncode(FormatDateTime($this->closingDate->CurrentValue, 8));
			$this->closingDate->PlaceHolder = RemoveHtml($this->closingDate->caption());

			// attachment
			$this->attachment->EditAttrs["class"] = "form-control";
			$this->attachment->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->attachment->CurrentValue = HtmlDecode($this->attachment->CurrentValue);
			$this->attachment->EditValue = HtmlEncode($this->attachment->CurrentValue);
			$this->attachment->PlaceHolder = RemoveHtml($this->attachment->caption());

			// display
			$this->display->EditAttrs["class"] = "form-control";
			$this->display->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->display->CurrentValue = HtmlDecode($this->display->CurrentValue);
			$this->display->EditValue = HtmlEncode($this->display->CurrentValue);
			$this->display->PlaceHolder = RemoveHtml($this->display->caption());

			// postedBy
			$this->postedBy->EditAttrs["class"] = "form-control";
			$this->postedBy->EditCustomAttributes = "";
			$this->postedBy->EditValue = HtmlEncode($this->postedBy->CurrentValue);
			$this->postedBy->PlaceHolder = RemoveHtml($this->postedBy->caption());

			// Add refer script
			// title

			$this->title->LinkCustomAttributes = "";
			$this->title->HrefValue = "";

			// shortDescription
			$this->shortDescription->LinkCustomAttributes = "";
			$this->shortDescription->HrefValue = "";

			// description
			$this->description->LinkCustomAttributes = "";
			$this->description->HrefValue = "";

			// requirements
			$this->requirements->LinkCustomAttributes = "";
			$this->requirements->HrefValue = "";

			// benefits
			$this->benefits->LinkCustomAttributes = "";
			$this->benefits->HrefValue = "";

			// country
			$this->country->LinkCustomAttributes = "";
			$this->country->HrefValue = "";

			// company
			$this->company->LinkCustomAttributes = "";
			$this->company->HrefValue = "";

			// department
			$this->department->LinkCustomAttributes = "";
			$this->department->HrefValue = "";

			// code
			$this->code->LinkCustomAttributes = "";
			$this->code->HrefValue = "";

			// employementType
			$this->employementType->LinkCustomAttributes = "";
			$this->employementType->HrefValue = "";

			// industry
			$this->industry->LinkCustomAttributes = "";
			$this->industry->HrefValue = "";

			// experienceLevel
			$this->experienceLevel->LinkCustomAttributes = "";
			$this->experienceLevel->HrefValue = "";

			// jobFunction
			$this->jobFunction->LinkCustomAttributes = "";
			$this->jobFunction->HrefValue = "";

			// educationLevel
			$this->educationLevel->LinkCustomAttributes = "";
			$this->educationLevel->HrefValue = "";

			// currency
			$this->currency->LinkCustomAttributes = "";
			$this->currency->HrefValue = "";

			// showSalary
			$this->showSalary->LinkCustomAttributes = "";
			$this->showSalary->HrefValue = "";

			// salaryMin
			$this->salaryMin->LinkCustomAttributes = "";
			$this->salaryMin->HrefValue = "";

			// salaryMax
			$this->salaryMax->LinkCustomAttributes = "";
			$this->salaryMax->HrefValue = "";

			// keywords
			$this->keywords->LinkCustomAttributes = "";
			$this->keywords->HrefValue = "";

			// status
			$this->status->LinkCustomAttributes = "";
			$this->status->HrefValue = "";

			// closingDate
			$this->closingDate->LinkCustomAttributes = "";
			$this->closingDate->HrefValue = "";

			// attachment
			$this->attachment->LinkCustomAttributes = "";
			$this->attachment->HrefValue = "";

			// display
			$this->display->LinkCustomAttributes = "";
			$this->display->HrefValue = "";

			// postedBy
			$this->postedBy->LinkCustomAttributes = "";
			$this->postedBy->HrefValue = "";
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
		if ($this->title->Required) {
			if (!$this->title->IsDetailKey && $this->title->FormValue != NULL && $this->title->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->title->caption(), $this->title->RequiredErrorMessage));
			}
		}
		if ($this->shortDescription->Required) {
			if (!$this->shortDescription->IsDetailKey && $this->shortDescription->FormValue != NULL && $this->shortDescription->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->shortDescription->caption(), $this->shortDescription->RequiredErrorMessage));
			}
		}
		if ($this->description->Required) {
			if (!$this->description->IsDetailKey && $this->description->FormValue != NULL && $this->description->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->description->caption(), $this->description->RequiredErrorMessage));
			}
		}
		if ($this->requirements->Required) {
			if (!$this->requirements->IsDetailKey && $this->requirements->FormValue != NULL && $this->requirements->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->requirements->caption(), $this->requirements->RequiredErrorMessage));
			}
		}
		if ($this->benefits->Required) {
			if (!$this->benefits->IsDetailKey && $this->benefits->FormValue != NULL && $this->benefits->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->benefits->caption(), $this->benefits->RequiredErrorMessage));
			}
		}
		if ($this->country->Required) {
			if (!$this->country->IsDetailKey && $this->country->FormValue != NULL && $this->country->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->country->caption(), $this->country->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->country->FormValue)) {
			AddMessage($FormError, $this->country->errorMessage());
		}
		if ($this->company->Required) {
			if (!$this->company->IsDetailKey && $this->company->FormValue != NULL && $this->company->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->company->caption(), $this->company->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->company->FormValue)) {
			AddMessage($FormError, $this->company->errorMessage());
		}
		if ($this->department->Required) {
			if (!$this->department->IsDetailKey && $this->department->FormValue != NULL && $this->department->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->department->caption(), $this->department->RequiredErrorMessage));
			}
		}
		if ($this->code->Required) {
			if (!$this->code->IsDetailKey && $this->code->FormValue != NULL && $this->code->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->code->caption(), $this->code->RequiredErrorMessage));
			}
		}
		if ($this->employementType->Required) {
			if (!$this->employementType->IsDetailKey && $this->employementType->FormValue != NULL && $this->employementType->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->employementType->caption(), $this->employementType->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->employementType->FormValue)) {
			AddMessage($FormError, $this->employementType->errorMessage());
		}
		if ($this->industry->Required) {
			if (!$this->industry->IsDetailKey && $this->industry->FormValue != NULL && $this->industry->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->industry->caption(), $this->industry->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->industry->FormValue)) {
			AddMessage($FormError, $this->industry->errorMessage());
		}
		if ($this->experienceLevel->Required) {
			if (!$this->experienceLevel->IsDetailKey && $this->experienceLevel->FormValue != NULL && $this->experienceLevel->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->experienceLevel->caption(), $this->experienceLevel->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->experienceLevel->FormValue)) {
			AddMessage($FormError, $this->experienceLevel->errorMessage());
		}
		if ($this->jobFunction->Required) {
			if (!$this->jobFunction->IsDetailKey && $this->jobFunction->FormValue != NULL && $this->jobFunction->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->jobFunction->caption(), $this->jobFunction->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->jobFunction->FormValue)) {
			AddMessage($FormError, $this->jobFunction->errorMessage());
		}
		if ($this->educationLevel->Required) {
			if (!$this->educationLevel->IsDetailKey && $this->educationLevel->FormValue != NULL && $this->educationLevel->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->educationLevel->caption(), $this->educationLevel->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->educationLevel->FormValue)) {
			AddMessage($FormError, $this->educationLevel->errorMessage());
		}
		if ($this->currency->Required) {
			if (!$this->currency->IsDetailKey && $this->currency->FormValue != NULL && $this->currency->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->currency->caption(), $this->currency->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->currency->FormValue)) {
			AddMessage($FormError, $this->currency->errorMessage());
		}
		if ($this->showSalary->Required) {
			if ($this->showSalary->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->showSalary->caption(), $this->showSalary->RequiredErrorMessage));
			}
		}
		if ($this->salaryMin->Required) {
			if (!$this->salaryMin->IsDetailKey && $this->salaryMin->FormValue != NULL && $this->salaryMin->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->salaryMin->caption(), $this->salaryMin->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->salaryMin->FormValue)) {
			AddMessage($FormError, $this->salaryMin->errorMessage());
		}
		if ($this->salaryMax->Required) {
			if (!$this->salaryMax->IsDetailKey && $this->salaryMax->FormValue != NULL && $this->salaryMax->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->salaryMax->caption(), $this->salaryMax->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->salaryMax->FormValue)) {
			AddMessage($FormError, $this->salaryMax->errorMessage());
		}
		if ($this->keywords->Required) {
			if (!$this->keywords->IsDetailKey && $this->keywords->FormValue != NULL && $this->keywords->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->keywords->caption(), $this->keywords->RequiredErrorMessage));
			}
		}
		if ($this->status->Required) {
			if ($this->status->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->status->caption(), $this->status->RequiredErrorMessage));
			}
		}
		if ($this->closingDate->Required) {
			if (!$this->closingDate->IsDetailKey && $this->closingDate->FormValue != NULL && $this->closingDate->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->closingDate->caption(), $this->closingDate->RequiredErrorMessage));
			}
		}
		if (!CheckDate($this->closingDate->FormValue)) {
			AddMessage($FormError, $this->closingDate->errorMessage());
		}
		if ($this->attachment->Required) {
			if (!$this->attachment->IsDetailKey && $this->attachment->FormValue != NULL && $this->attachment->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->attachment->caption(), $this->attachment->RequiredErrorMessage));
			}
		}
		if ($this->display->Required) {
			if (!$this->display->IsDetailKey && $this->display->FormValue != NULL && $this->display->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->display->caption(), $this->display->RequiredErrorMessage));
			}
		}
		if ($this->postedBy->Required) {
			if (!$this->postedBy->IsDetailKey && $this->postedBy->FormValue != NULL && $this->postedBy->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->postedBy->caption(), $this->postedBy->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->postedBy->FormValue)) {
			AddMessage($FormError, $this->postedBy->errorMessage());
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

		// title
		$this->title->setDbValueDef($rsnew, $this->title->CurrentValue, "", FALSE);

		// shortDescription
		$this->shortDescription->setDbValueDef($rsnew, $this->shortDescription->CurrentValue, NULL, FALSE);

		// description
		$this->description->setDbValueDef($rsnew, $this->description->CurrentValue, NULL, FALSE);

		// requirements
		$this->requirements->setDbValueDef($rsnew, $this->requirements->CurrentValue, NULL, FALSE);

		// benefits
		$this->benefits->setDbValueDef($rsnew, $this->benefits->CurrentValue, NULL, FALSE);

		// country
		$this->country->setDbValueDef($rsnew, $this->country->CurrentValue, NULL, FALSE);

		// company
		$this->company->setDbValueDef($rsnew, $this->company->CurrentValue, NULL, FALSE);

		// department
		$this->department->setDbValueDef($rsnew, $this->department->CurrentValue, NULL, FALSE);

		// code
		$this->code->setDbValueDef($rsnew, $this->code->CurrentValue, NULL, FALSE);

		// employementType
		$this->employementType->setDbValueDef($rsnew, $this->employementType->CurrentValue, NULL, FALSE);

		// industry
		$this->industry->setDbValueDef($rsnew, $this->industry->CurrentValue, NULL, FALSE);

		// experienceLevel
		$this->experienceLevel->setDbValueDef($rsnew, $this->experienceLevel->CurrentValue, NULL, FALSE);

		// jobFunction
		$this->jobFunction->setDbValueDef($rsnew, $this->jobFunction->CurrentValue, NULL, FALSE);

		// educationLevel
		$this->educationLevel->setDbValueDef($rsnew, $this->educationLevel->CurrentValue, NULL, FALSE);

		// currency
		$this->currency->setDbValueDef($rsnew, $this->currency->CurrentValue, NULL, FALSE);

		// showSalary
		$this->showSalary->setDbValueDef($rsnew, $this->showSalary->CurrentValue, NULL, FALSE);

		// salaryMin
		$this->salaryMin->setDbValueDef($rsnew, $this->salaryMin->CurrentValue, NULL, FALSE);

		// salaryMax
		$this->salaryMax->setDbValueDef($rsnew, $this->salaryMax->CurrentValue, NULL, FALSE);

		// keywords
		$this->keywords->setDbValueDef($rsnew, $this->keywords->CurrentValue, NULL, FALSE);

		// status
		$this->status->setDbValueDef($rsnew, $this->status->CurrentValue, NULL, FALSE);

		// closingDate
		$this->closingDate->setDbValueDef($rsnew, UnFormatDateTime($this->closingDate->CurrentValue, 0), NULL, FALSE);

		// attachment
		$this->attachment->setDbValueDef($rsnew, $this->attachment->CurrentValue, NULL, FALSE);

		// display
		$this->display->setDbValueDef($rsnew, $this->display->CurrentValue, "", FALSE);

		// postedBy
		$this->postedBy->setDbValueDef($rsnew, $this->postedBy->CurrentValue, NULL, FALSE);

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
		$Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("recruitment_joblist.php"), "", $this->TableVar, TRUE);
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
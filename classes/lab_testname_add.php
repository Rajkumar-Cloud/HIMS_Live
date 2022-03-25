<?php
namespace PHPMaker2019\HIMS;

/**
 * Page class
 */
class lab_testname_add extends lab_testname
{

	// Page ID
	public $PageID = "add";

	// Project ID
	public $ProjectID = "{EA4F6D13-AF8F-428D-9EA7-BA88D1107EC3}";

	// Table name
	public $TableName = 'lab_testname';

	// Page object name
	public $PageObjName = "lab_testname_add";

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

		// Table object (lab_testname)
		if (!isset($GLOBALS["lab_testname"]) || get_class($GLOBALS["lab_testname"]) == PROJECT_NAMESPACE . "lab_testname") {
			$GLOBALS["lab_testname"] = &$this;
			$GLOBALS["Table"] = &$GLOBALS["lab_testname"];
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
			define(PROJECT_NAMESPACE . "TABLE_NAME", 'lab_testname');

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
		global $EXPORT, $lab_testname;
		if ($this->CustomExport && $this->CustomExport == $this->Export && array_key_exists($this->CustomExport, $EXPORT)) {
				$content = ob_get_contents();
			if ($ExportFileName == "")
				$ExportFileName = $this->TableVar;
			$class = PROJECT_NAMESPACE . $EXPORT[$this->CustomExport];
			if (class_exists($class)) {
				$doc = new $class($lab_testname);
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
					if ($pageName == "lab_testnameview.php")
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
					$this->terminate(GetUrl("lab_testnamelist.php"));
				else
					$this->terminate(GetUrl("login.php"));
				return;
			}
		}

		// Create form object
		$CurrentForm = new HttpForm();
		$this->CurrentAction = Param("action"); // Set up current action
		$this->id->Visible = FALSE;
		$this->TestCode->setVisibility();
		$this->Name->setVisibility();
		$this->SampleType->setVisibility();
		$this->Department->setVisibility();
		$this->schedule->setVisibility();
		$this->Created->setVisibility();
		$this->CreatedBy->setVisibility();
		$this->Modified->Visible = FALSE;
		$this->ModifiedBy->Visible = FALSE;
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
		$this->setupLookupOptions($this->SampleType);
		$this->setupLookupOptions($this->Department);

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
					$this->terminate("lab_testnamelist.php"); // No matching record, return to list
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
					if (GetPageName($returnUrl) == "lab_testnamelist.php")
						$returnUrl = $this->addMasterUrl($returnUrl); // List page, return to List page with correct master key if necessary
					elseif (GetPageName($returnUrl) == "lab_testnameview.php")
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
		$this->TestCode->CurrentValue = NULL;
		$this->TestCode->OldValue = $this->TestCode->CurrentValue;
		$this->Name->CurrentValue = NULL;
		$this->Name->OldValue = $this->Name->CurrentValue;
		$this->SampleType->CurrentValue = NULL;
		$this->SampleType->OldValue = $this->SampleType->CurrentValue;
		$this->Department->CurrentValue = NULL;
		$this->Department->OldValue = $this->Department->CurrentValue;
		$this->schedule->CurrentValue = NULL;
		$this->schedule->OldValue = $this->schedule->CurrentValue;
		$this->Created->CurrentValue = NULL;
		$this->Created->OldValue = $this->Created->CurrentValue;
		$this->CreatedBy->CurrentValue = NULL;
		$this->CreatedBy->OldValue = $this->CreatedBy->CurrentValue;
		$this->Modified->CurrentValue = NULL;
		$this->Modified->OldValue = $this->Modified->CurrentValue;
		$this->ModifiedBy->CurrentValue = NULL;
		$this->ModifiedBy->OldValue = $this->ModifiedBy->CurrentValue;
	}

	// Load form values
	protected function loadFormValues()
	{

		// Load from form
		global $CurrentForm;

		// Check field name 'TestCode' first before field var 'x_TestCode'
		$val = $CurrentForm->hasValue("TestCode") ? $CurrentForm->getValue("TestCode") : $CurrentForm->getValue("x_TestCode");
		if (!$this->TestCode->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->TestCode->Visible = FALSE; // Disable update for API request
			else
				$this->TestCode->setFormValue($val);
		}

		// Check field name 'Name' first before field var 'x_Name'
		$val = $CurrentForm->hasValue("Name") ? $CurrentForm->getValue("Name") : $CurrentForm->getValue("x_Name");
		if (!$this->Name->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Name->Visible = FALSE; // Disable update for API request
			else
				$this->Name->setFormValue($val);
		}

		// Check field name 'SampleType' first before field var 'x_SampleType'
		$val = $CurrentForm->hasValue("SampleType") ? $CurrentForm->getValue("SampleType") : $CurrentForm->getValue("x_SampleType");
		if (!$this->SampleType->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->SampleType->Visible = FALSE; // Disable update for API request
			else
				$this->SampleType->setFormValue($val);
		}

		// Check field name 'Department' first before field var 'x_Department'
		$val = $CurrentForm->hasValue("Department") ? $CurrentForm->getValue("Department") : $CurrentForm->getValue("x_Department");
		if (!$this->Department->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Department->Visible = FALSE; // Disable update for API request
			else
				$this->Department->setFormValue($val);
		}

		// Check field name 'schedule' first before field var 'x_schedule'
		$val = $CurrentForm->hasValue("schedule") ? $CurrentForm->getValue("schedule") : $CurrentForm->getValue("x_schedule");
		if (!$this->schedule->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->schedule->Visible = FALSE; // Disable update for API request
			else
				$this->schedule->setFormValue($val);
		}

		// Check field name 'Created' first before field var 'x_Created'
		$val = $CurrentForm->hasValue("Created") ? $CurrentForm->getValue("Created") : $CurrentForm->getValue("x_Created");
		if (!$this->Created->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Created->Visible = FALSE; // Disable update for API request
			else
				$this->Created->setFormValue($val);
			$this->Created->CurrentValue = UnFormatDateTime($this->Created->CurrentValue, 0);
		}

		// Check field name 'CreatedBy' first before field var 'x_CreatedBy'
		$val = $CurrentForm->hasValue("CreatedBy") ? $CurrentForm->getValue("CreatedBy") : $CurrentForm->getValue("x_CreatedBy");
		if (!$this->CreatedBy->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->CreatedBy->Visible = FALSE; // Disable update for API request
			else
				$this->CreatedBy->setFormValue($val);
		}

		// Check field name 'id' first before field var 'x_id'
		$val = $CurrentForm->hasValue("id") ? $CurrentForm->getValue("id") : $CurrentForm->getValue("x_id");
	}

	// Restore form values
	public function restoreFormValues()
	{
		global $CurrentForm;
		$this->TestCode->CurrentValue = $this->TestCode->FormValue;
		$this->Name->CurrentValue = $this->Name->FormValue;
		$this->SampleType->CurrentValue = $this->SampleType->FormValue;
		$this->Department->CurrentValue = $this->Department->FormValue;
		$this->schedule->CurrentValue = $this->schedule->FormValue;
		$this->Created->CurrentValue = $this->Created->FormValue;
		$this->Created->CurrentValue = UnFormatDateTime($this->Created->CurrentValue, 0);
		$this->CreatedBy->CurrentValue = $this->CreatedBy->FormValue;
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
		$this->TestCode->setDbValue($row['TestCode']);
		$this->Name->setDbValue($row['Name']);
		$this->SampleType->setDbValue($row['SampleType']);
		$this->Department->setDbValue($row['Department']);
		$this->schedule->setDbValue($row['schedule']);
		$this->Created->setDbValue($row['Created']);
		$this->CreatedBy->setDbValue($row['CreatedBy']);
		$this->Modified->setDbValue($row['Modified']);
		$this->ModifiedBy->setDbValue($row['ModifiedBy']);
	}

	// Return a row with default values
	protected function newRow()
	{
		$this->loadDefaultValues();
		$row = [];
		$row['id'] = $this->id->CurrentValue;
		$row['TestCode'] = $this->TestCode->CurrentValue;
		$row['Name'] = $this->Name->CurrentValue;
		$row['SampleType'] = $this->SampleType->CurrentValue;
		$row['Department'] = $this->Department->CurrentValue;
		$row['schedule'] = $this->schedule->CurrentValue;
		$row['Created'] = $this->Created->CurrentValue;
		$row['CreatedBy'] = $this->CreatedBy->CurrentValue;
		$row['Modified'] = $this->Modified->CurrentValue;
		$row['ModifiedBy'] = $this->ModifiedBy->CurrentValue;
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
		// TestCode
		// Name
		// SampleType
		// Department
		// schedule
		// Created
		// CreatedBy
		// Modified
		// ModifiedBy

		if ($this->RowType == ROWTYPE_VIEW) { // View row

			// id
			$this->id->ViewValue = $this->id->CurrentValue;
			$this->id->ViewCustomAttributes = "";

			// TestCode
			$this->TestCode->ViewValue = $this->TestCode->CurrentValue;
			$this->TestCode->ViewCustomAttributes = "";

			// Name
			$this->Name->ViewValue = $this->Name->CurrentValue;
			$this->Name->ViewCustomAttributes = "";

			// SampleType
			$curVal = strval($this->SampleType->CurrentValue);
			if ($curVal <> "") {
				$this->SampleType->ViewValue = $this->SampleType->lookupCacheOption($curVal);
				if ($this->SampleType->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`CATEGORY`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->SampleType->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = $rswrk->fields('df');
						$this->SampleType->ViewValue = $this->SampleType->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->SampleType->ViewValue = $this->SampleType->CurrentValue;
					}
				}
			} else {
				$this->SampleType->ViewValue = NULL;
			}
			$this->SampleType->ViewCustomAttributes = "";

			// Department
			$curVal = strval($this->Department->CurrentValue);
			if ($curVal <> "") {
				$this->Department->ViewValue = $this->Department->lookupCacheOption($curVal);
				if ($this->Department->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Department`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->Department->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = $rswrk->fields('df');
						$this->Department->ViewValue = $this->Department->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->Department->ViewValue = $this->Department->CurrentValue;
					}
				}
			} else {
				$this->Department->ViewValue = NULL;
			}
			$this->Department->ViewCustomAttributes = "";

			// schedule
			$this->schedule->ViewValue = $this->schedule->CurrentValue;
			$this->schedule->ViewCustomAttributes = "";

			// Created
			$this->Created->ViewValue = $this->Created->CurrentValue;
			$this->Created->ViewValue = FormatDateTime($this->Created->ViewValue, 0);
			$this->Created->ViewCustomAttributes = "";

			// CreatedBy
			$this->CreatedBy->ViewValue = $this->CreatedBy->CurrentValue;
			$this->CreatedBy->ViewCustomAttributes = "";

			// Modified
			$this->Modified->ViewValue = $this->Modified->CurrentValue;
			$this->Modified->ViewValue = FormatDateTime($this->Modified->ViewValue, 0);
			$this->Modified->ViewCustomAttributes = "";

			// ModifiedBy
			$this->ModifiedBy->ViewValue = $this->ModifiedBy->CurrentValue;
			$this->ModifiedBy->ViewCustomAttributes = "";

			// TestCode
			$this->TestCode->LinkCustomAttributes = "";
			$this->TestCode->HrefValue = "";
			$this->TestCode->TooltipValue = "";

			// Name
			$this->Name->LinkCustomAttributes = "";
			$this->Name->HrefValue = "";
			$this->Name->TooltipValue = "";

			// SampleType
			$this->SampleType->LinkCustomAttributes = "";
			$this->SampleType->HrefValue = "";
			$this->SampleType->TooltipValue = "";

			// Department
			$this->Department->LinkCustomAttributes = "";
			$this->Department->HrefValue = "";
			$this->Department->TooltipValue = "";

			// schedule
			$this->schedule->LinkCustomAttributes = "";
			$this->schedule->HrefValue = "";
			$this->schedule->TooltipValue = "";

			// Created
			$this->Created->LinkCustomAttributes = "";
			$this->Created->HrefValue = "";
			$this->Created->TooltipValue = "";

			// CreatedBy
			$this->CreatedBy->LinkCustomAttributes = "";
			$this->CreatedBy->HrefValue = "";
			$this->CreatedBy->TooltipValue = "";
		} elseif ($this->RowType == ROWTYPE_ADD) { // Add row

			// TestCode
			$this->TestCode->EditAttrs["class"] = "form-control";
			$this->TestCode->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->TestCode->CurrentValue = HtmlDecode($this->TestCode->CurrentValue);
			$this->TestCode->EditValue = HtmlEncode($this->TestCode->CurrentValue);
			$this->TestCode->PlaceHolder = RemoveHtml($this->TestCode->caption());

			// Name
			$this->Name->EditAttrs["class"] = "form-control";
			$this->Name->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Name->CurrentValue = HtmlDecode($this->Name->CurrentValue);
			$this->Name->EditValue = HtmlEncode($this->Name->CurrentValue);
			$this->Name->PlaceHolder = RemoveHtml($this->Name->caption());

			// SampleType
			$this->SampleType->EditAttrs["class"] = "form-control";
			$this->SampleType->EditCustomAttributes = "";
			$curVal = trim(strval($this->SampleType->CurrentValue));
			if ($curVal <> "")
				$this->SampleType->ViewValue = $this->SampleType->lookupCacheOption($curVal);
			else
				$this->SampleType->ViewValue = $this->SampleType->Lookup !== NULL && is_array($this->SampleType->Lookup->Options) ? $curVal : NULL;
			if ($this->SampleType->ViewValue !== NULL) { // Load from cache
				$this->SampleType->EditValue = array_values($this->SampleType->Lookup->Options);
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`CATEGORY`" . SearchString("=", $this->SampleType->CurrentValue, DATATYPE_STRING, "");
				}
				$sqlWrk = $this->SampleType->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
				if ($rswrk) $rswrk->Close();
				$this->SampleType->EditValue = $arwrk;
			}

			// Department
			$this->Department->EditAttrs["class"] = "form-control";
			$this->Department->EditCustomAttributes = "";
			$curVal = trim(strval($this->Department->CurrentValue));
			if ($curVal <> "")
				$this->Department->ViewValue = $this->Department->lookupCacheOption($curVal);
			else
				$this->Department->ViewValue = $this->Department->Lookup !== NULL && is_array($this->Department->Lookup->Options) ? $curVal : NULL;
			if ($this->Department->ViewValue !== NULL) { // Load from cache
				$this->Department->EditValue = array_values($this->Department->Lookup->Options);
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`Department`" . SearchString("=", $this->Department->CurrentValue, DATATYPE_STRING, "");
				}
				$sqlWrk = $this->Department->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
				if ($rswrk) $rswrk->Close();
				$this->Department->EditValue = $arwrk;
			}

			// schedule
			$this->schedule->EditAttrs["class"] = "form-control";
			$this->schedule->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->schedule->CurrentValue = HtmlDecode($this->schedule->CurrentValue);
			$this->schedule->EditValue = HtmlEncode($this->schedule->CurrentValue);
			$this->schedule->PlaceHolder = RemoveHtml($this->schedule->caption());

			// Created
			// CreatedBy
			// Add refer script
			// TestCode

			$this->TestCode->LinkCustomAttributes = "";
			$this->TestCode->HrefValue = "";

			// Name
			$this->Name->LinkCustomAttributes = "";
			$this->Name->HrefValue = "";

			// SampleType
			$this->SampleType->LinkCustomAttributes = "";
			$this->SampleType->HrefValue = "";

			// Department
			$this->Department->LinkCustomAttributes = "";
			$this->Department->HrefValue = "";

			// schedule
			$this->schedule->LinkCustomAttributes = "";
			$this->schedule->HrefValue = "";

			// Created
			$this->Created->LinkCustomAttributes = "";
			$this->Created->HrefValue = "";

			// CreatedBy
			$this->CreatedBy->LinkCustomAttributes = "";
			$this->CreatedBy->HrefValue = "";
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
		if ($this->TestCode->Required) {
			if (!$this->TestCode->IsDetailKey && $this->TestCode->FormValue != NULL && $this->TestCode->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->TestCode->caption(), $this->TestCode->RequiredErrorMessage));
			}
		}
		if ($this->Name->Required) {
			if (!$this->Name->IsDetailKey && $this->Name->FormValue != NULL && $this->Name->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Name->caption(), $this->Name->RequiredErrorMessage));
			}
		}
		if ($this->SampleType->Required) {
			if (!$this->SampleType->IsDetailKey && $this->SampleType->FormValue != NULL && $this->SampleType->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->SampleType->caption(), $this->SampleType->RequiredErrorMessage));
			}
		}
		if ($this->Department->Required) {
			if (!$this->Department->IsDetailKey && $this->Department->FormValue != NULL && $this->Department->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Department->caption(), $this->Department->RequiredErrorMessage));
			}
		}
		if ($this->schedule->Required) {
			if (!$this->schedule->IsDetailKey && $this->schedule->FormValue != NULL && $this->schedule->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->schedule->caption(), $this->schedule->RequiredErrorMessage));
			}
		}
		if ($this->Created->Required) {
			if (!$this->Created->IsDetailKey && $this->Created->FormValue != NULL && $this->Created->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Created->caption(), $this->Created->RequiredErrorMessage));
			}
		}
		if ($this->CreatedBy->Required) {
			if (!$this->CreatedBy->IsDetailKey && $this->CreatedBy->FormValue != NULL && $this->CreatedBy->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->CreatedBy->caption(), $this->CreatedBy->RequiredErrorMessage));
			}
		}
		if ($this->Modified->Required) {
			if (!$this->Modified->IsDetailKey && $this->Modified->FormValue != NULL && $this->Modified->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Modified->caption(), $this->Modified->RequiredErrorMessage));
			}
		}
		if ($this->ModifiedBy->Required) {
			if (!$this->ModifiedBy->IsDetailKey && $this->ModifiedBy->FormValue != NULL && $this->ModifiedBy->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->ModifiedBy->caption(), $this->ModifiedBy->RequiredErrorMessage));
			}
		}

		// Validate detail grid
		$detailTblVar = explode(",", $this->getCurrentDetailTable());
		if (in_array("lab_agerange", $detailTblVar) && $GLOBALS["lab_agerange"]->DetailAdd) {
			if (!isset($GLOBALS["lab_agerange_grid"]))
				$GLOBALS["lab_agerange_grid"] = new lab_agerange_grid(); // Get detail page object
			$GLOBALS["lab_agerange_grid"]->validateGridForm();
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

		// Begin transaction
		if ($this->getCurrentDetailTable() <> "")
			$conn->beginTrans();

		// Load db values from rsold
		$this->loadDbValues($rsold);
		if ($rsold) {
		}
		$rsnew = [];

		// TestCode
		$this->TestCode->setDbValueDef($rsnew, $this->TestCode->CurrentValue, NULL, FALSE);

		// Name
		$this->Name->setDbValueDef($rsnew, $this->Name->CurrentValue, "", FALSE);

		// SampleType
		$this->SampleType->setDbValueDef($rsnew, $this->SampleType->CurrentValue, NULL, FALSE);

		// Department
		$this->Department->setDbValueDef($rsnew, $this->Department->CurrentValue, NULL, FALSE);

		// schedule
		$this->schedule->setDbValueDef($rsnew, $this->schedule->CurrentValue, NULL, FALSE);

		// Created
		$this->Created->setDbValueDef($rsnew, CurrentDateTime(), NULL);
		$rsnew['Created'] = &$this->Created->DbValue;

		// CreatedBy
		$this->CreatedBy->setDbValueDef($rsnew, CurrentUserName(), NULL);
		$rsnew['CreatedBy'] = &$this->CreatedBy->DbValue;

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
			if (in_array("lab_agerange", $detailTblVar) && $GLOBALS["lab_agerange"]->DetailAdd) {
				$GLOBALS["lab_agerange"]->testid->setSessionValue($this->id->CurrentValue); // Set master key
				$GLOBALS["lab_agerange"]->TestName->setSessionValue($this->Name->CurrentValue); // Set master key
				if (!isset($GLOBALS["lab_agerange_grid"]))
					$GLOBALS["lab_agerange_grid"] = new lab_agerange_grid(); // Get detail page object
				$Security->loadCurrentUserLevel($this->ProjectID . "lab_agerange"); // Load user level of detail table
				$addRow = $GLOBALS["lab_agerange_grid"]->gridInsert();
				$Security->loadCurrentUserLevel($this->ProjectID . $this->TableName); // Restore user level of master table
				if (!$addRow)
					$GLOBALS["lab_agerange"]->TestName->setSessionValue(""); // Clear master key if insert failed
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
			if (in_array("lab_agerange", $detailTblVar)) {
				if (!isset($GLOBALS["lab_agerange_grid"]))
					$GLOBALS["lab_agerange_grid"] = new lab_agerange_grid();
				if ($GLOBALS["lab_agerange_grid"]->DetailAdd) {
					if ($this->CopyRecord)
						$GLOBALS["lab_agerange_grid"]->CurrentMode = "copy";
					else
						$GLOBALS["lab_agerange_grid"]->CurrentMode = "add";
					$GLOBALS["lab_agerange_grid"]->CurrentAction = "gridadd";

					// Save current master table to detail table
					$GLOBALS["lab_agerange_grid"]->setCurrentMasterTable($this->TableVar);
					$GLOBALS["lab_agerange_grid"]->setStartRecordNumber(1);
					$GLOBALS["lab_agerange_grid"]->testid->IsDetailKey = TRUE;
					$GLOBALS["lab_agerange_grid"]->testid->CurrentValue = $this->id->CurrentValue;
					$GLOBALS["lab_agerange_grid"]->testid->setSessionValue($GLOBALS["lab_agerange_grid"]->testid->CurrentValue);
					$GLOBALS["lab_agerange_grid"]->TestName->IsDetailKey = TRUE;
					$GLOBALS["lab_agerange_grid"]->TestName->CurrentValue = $this->Name->CurrentValue;
					$GLOBALS["lab_agerange_grid"]->TestName->setSessionValue($GLOBALS["lab_agerange_grid"]->TestName->CurrentValue);
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
		$Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("lab_testnamelist.php"), "", $this->TableVar, TRUE);
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
						case "x_SampleType":
							break;
						case "x_Department":
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
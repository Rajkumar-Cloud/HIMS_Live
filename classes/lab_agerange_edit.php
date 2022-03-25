<?php
namespace PHPMaker2019\HIMS;

/**
 * Page class
 */
class lab_agerange_edit extends lab_agerange
{

	// Page ID
	public $PageID = "edit";

	// Project ID
	public $ProjectID = "{EA4F6D13-AF8F-428D-9EA7-BA88D1107EC3}";

	// Table name
	public $TableName = 'lab_agerange';

	// Page object name
	public $PageObjName = "lab_agerange_edit";

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

		// Table object (lab_agerange)
		if (!isset($GLOBALS["lab_agerange"]) || get_class($GLOBALS["lab_agerange"]) == PROJECT_NAMESPACE . "lab_agerange") {
			$GLOBALS["lab_agerange"] = &$this;
			$GLOBALS["Table"] = &$GLOBALS["lab_agerange"];
		}
		$this->CancelUrl = $this->pageUrl() . "action=cancel";

		// Table object (user_login)
		if (!isset($GLOBALS['user_login']))
			$GLOBALS['user_login'] = new user_login();

		// Table object (lab_testname)
		if (!isset($GLOBALS['lab_testname']))
			$GLOBALS['lab_testname'] = new lab_testname();

		// Page ID
		if (!defined(PROJECT_NAMESPACE . "PAGE_ID"))
			define(PROJECT_NAMESPACE . "PAGE_ID", 'edit');

		// Table name (for backward compatibility)
		if (!defined(PROJECT_NAMESPACE . "TABLE_NAME"))
			define(PROJECT_NAMESPACE . "TABLE_NAME", 'lab_agerange');

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
		global $EXPORT, $lab_agerange;
		if ($this->CustomExport && $this->CustomExport == $this->Export && array_key_exists($this->CustomExport, $EXPORT)) {
				$content = ob_get_contents();
			if ($ExportFileName == "")
				$ExportFileName = $this->TableVar;
			$class = PROJECT_NAMESPACE . $EXPORT[$this->CustomExport];
			if (class_exists($class)) {
				$doc = new $class($lab_agerange);
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
					if ($pageName == "lab_agerangeview.php")
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
	public $FormClassName = "ew-horizontal ew-form ew-edit-form";
	public $IsModal = FALSE;
	public $IsMobileOrModal = FALSE;
	public $DbMasterFilter;
	public $DbDetailFilter;

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
			if (!$Security->canEdit()) {
				$Security->saveLastUrl();
				$this->setFailureMessage(DeniedMessage()); // Set no permission
				if ($Security->canList())
					$this->terminate(GetUrl("lab_agerangelist.php"));
				else
					$this->terminate(GetUrl("login.php"));
				return;
			}
		}

		// Create form object
		$CurrentForm = new HttpForm();
		$this->CurrentAction = Param("action"); // Set up current action
		$this->id->setVisibility();
		$this->testid->setVisibility();
		$this->TestName->setVisibility();
		$this->Gender->setVisibility();
		$this->MinAge->setVisibility();
		$this->MinAgeType->setVisibility();
		$this->MaxAge->setVisibility();
		$this->MaxAgeType->setVisibility();
		$this->Value->setVisibility();
		$this->Created->Visible = FALSE;
		$this->CreatedBy->Visible = FALSE;
		$this->Modied->setVisibility();
		$this->ModifiedBy->setVisibility();
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
		$this->setupLookupOptions($this->Gender);

		// Check modal
		if ($this->IsModal)
			$SkipHeaderFooter = TRUE;
		$this->IsMobileOrModal = IsMobile() || $this->IsModal;
		$this->FormClassName = "ew-form ew-edit-form ew-horizontal";
		$loaded = FALSE;
		$postBack = FALSE;

		// Set up current action and primary key
		if (IsApi()) {
			$this->CurrentAction = "update"; // Update record directly
			$postBack = TRUE;
		} elseif (Post("action") !== NULL) {
			$this->CurrentAction = Post("action"); // Get action code
			if (!$this->isShow()) // Not reload record, handle as postback
				$postBack = TRUE;

			// Load key from Form
			if ($CurrentForm->hasValue("x_id")) {
				$this->id->setFormValue($CurrentForm->getValue("x_id"));
			}
		} else {
			$this->CurrentAction = "show"; // Default action is display

			// Load key from QueryString
			$loadByQuery = FALSE;
			if (Get("id") !== NULL) {
				$this->id->setQueryStringValue(Get("id"));
				$loadByQuery = TRUE;
			} else {
				$this->id->CurrentValue = NULL;
			}
		}

		// Set up master detail parameters
		$this->setupMasterParms();

		// Load current record
		$loaded = $this->loadRow();

		// Process form if post back
		if ($postBack) {
			$this->loadFormValues(); // Get form values
		}

		// Validate form if post back
		if ($postBack) {
			if (!$this->validateForm()) {
				$this->setFailureMessage($FormError);
				$this->EventCancelled = TRUE; // Event cancelled
				$this->restoreFormValues();
				if (IsApi()) {
					$this->terminate();
					return;
				} else {
					$this->CurrentAction = ""; // Form error, reset action
				}
			}
		}

		// Perform current action
		switch ($this->CurrentAction) {
			case "show": // Get a record to display
				if (!$loaded) { // Load record based on key
					if ($this->getFailureMessage() == "")
						$this->setFailureMessage($Language->phrase("NoRecord")); // No record found
					$this->terminate("lab_agerangelist.php"); // No matching record, return to list
				}
				break;
			case "update": // Update
				$returnUrl = $this->getReturnUrl();
				if (GetPageName($returnUrl) == "lab_agerangelist.php")
					$returnUrl = $this->addMasterUrl($returnUrl); // List page, return to List page with correct master key if necessary
				$this->SendEmail = TRUE; // Send email on update success
				if ($this->editRow()) { // Update record based on key
					if ($this->getSuccessMessage() == "")
						$this->setSuccessMessage($Language->phrase("UpdateSuccess")); // Update success
					if (IsApi()) {
						$this->terminate(TRUE);
						return;
					} else {
						$this->terminate($returnUrl); // Return to caller
					}
				} elseif (IsApi()) { // API request, return
					$this->terminate();
					return;
				} elseif ($this->getFailureMessage() == $Language->phrase("NoRecord")) {
					$this->terminate($returnUrl); // Return to caller
				} else {
					$this->EventCancelled = TRUE; // Event cancelled
					$this->restoreFormValues(); // Restore form values if update failed
				}
		}

		// Set up Breadcrumb
		$this->setupBreadcrumb();

		// Render the record
		$this->RowType = ROWTYPE_EDIT; // Render as Edit
		$this->resetAttributes();
		$this->renderRow();
	}

	// Set up starting record parameters
	public function setupStartRec()
	{
		if ($this->DisplayRecs == 0)
			return;
		if ($this->isPageRequest()) { // Validate request
			if (Get(TABLE_START_REC) !== NULL) { // Check for "start" parameter
				$this->StartRec = Get(TABLE_START_REC);
				$this->setStartRecordNumber($this->StartRec);
			} elseif (Get(TABLE_PAGE_NO) !== NULL) {
				$pageNo = Get(TABLE_PAGE_NO);
				if (is_numeric($pageNo)) {
					$this->StartRec = ($pageNo - 1) * $this->DisplayRecs + 1;
					if ($this->StartRec <= 0) {
						$this->StartRec = 1;
					} elseif ($this->StartRec >= (int)(($this->TotalRecs - 1)/$this->DisplayRecs) * $this->DisplayRecs + 1) {
						$this->StartRec = (int)(($this->TotalRecs - 1)/$this->DisplayRecs) * $this->DisplayRecs + 1;
					}
					$this->setStartRecordNumber($this->StartRec);
				}
			}
		}
		$this->StartRec = $this->getStartRecordNumber();

		// Check if correct start record counter
		if (!is_numeric($this->StartRec) || $this->StartRec == "") { // Avoid invalid start record counter
			$this->StartRec = 1; // Reset start record counter
			$this->setStartRecordNumber($this->StartRec);
		} elseif ($this->StartRec > $this->TotalRecs) { // Avoid starting record > total records
			$this->StartRec = (int)(($this->TotalRecs - 1)/$this->DisplayRecs) * $this->DisplayRecs + 1; // Point to last page first record
			$this->setStartRecordNumber($this->StartRec);
		} elseif (($this->StartRec - 1) % $this->DisplayRecs <> 0) {
			$this->StartRec = (int)(($this->StartRec - 1)/$this->DisplayRecs) * $this->DisplayRecs + 1; // Point to page boundary
			$this->setStartRecordNumber($this->StartRec);
		}
	}

	// Get upload files
	protected function getUploadFiles()
	{
		global $CurrentForm, $Language;
	}

	// Load form values
	protected function loadFormValues()
	{

		// Load from form
		global $CurrentForm;

		// Check field name 'id' first before field var 'x_id'
		$val = $CurrentForm->hasValue("id") ? $CurrentForm->getValue("id") : $CurrentForm->getValue("x_id");
		if (!$this->id->IsDetailKey)
			$this->id->setFormValue($val);

		// Check field name 'testid' first before field var 'x_testid'
		$val = $CurrentForm->hasValue("testid") ? $CurrentForm->getValue("testid") : $CurrentForm->getValue("x_testid");
		if (!$this->testid->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->testid->Visible = FALSE; // Disable update for API request
			else
				$this->testid->setFormValue($val);
		}

		// Check field name 'TestName' first before field var 'x_TestName'
		$val = $CurrentForm->hasValue("TestName") ? $CurrentForm->getValue("TestName") : $CurrentForm->getValue("x_TestName");
		if (!$this->TestName->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->TestName->Visible = FALSE; // Disable update for API request
			else
				$this->TestName->setFormValue($val);
		}

		// Check field name 'Gender' first before field var 'x_Gender'
		$val = $CurrentForm->hasValue("Gender") ? $CurrentForm->getValue("Gender") : $CurrentForm->getValue("x_Gender");
		if (!$this->Gender->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Gender->Visible = FALSE; // Disable update for API request
			else
				$this->Gender->setFormValue($val);
		}

		// Check field name 'MinAge' first before field var 'x_MinAge'
		$val = $CurrentForm->hasValue("MinAge") ? $CurrentForm->getValue("MinAge") : $CurrentForm->getValue("x_MinAge");
		if (!$this->MinAge->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->MinAge->Visible = FALSE; // Disable update for API request
			else
				$this->MinAge->setFormValue($val);
		}

		// Check field name 'MinAgeType' first before field var 'x_MinAgeType'
		$val = $CurrentForm->hasValue("MinAgeType") ? $CurrentForm->getValue("MinAgeType") : $CurrentForm->getValue("x_MinAgeType");
		if (!$this->MinAgeType->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->MinAgeType->Visible = FALSE; // Disable update for API request
			else
				$this->MinAgeType->setFormValue($val);
		}

		// Check field name 'MaxAge' first before field var 'x_MaxAge'
		$val = $CurrentForm->hasValue("MaxAge") ? $CurrentForm->getValue("MaxAge") : $CurrentForm->getValue("x_MaxAge");
		if (!$this->MaxAge->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->MaxAge->Visible = FALSE; // Disable update for API request
			else
				$this->MaxAge->setFormValue($val);
		}

		// Check field name 'MaxAgeType' first before field var 'x_MaxAgeType'
		$val = $CurrentForm->hasValue("MaxAgeType") ? $CurrentForm->getValue("MaxAgeType") : $CurrentForm->getValue("x_MaxAgeType");
		if (!$this->MaxAgeType->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->MaxAgeType->Visible = FALSE; // Disable update for API request
			else
				$this->MaxAgeType->setFormValue($val);
		}

		// Check field name 'Value' first before field var 'x_Value'
		$val = $CurrentForm->hasValue("Value") ? $CurrentForm->getValue("Value") : $CurrentForm->getValue("x_Value");
		if (!$this->Value->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Value->Visible = FALSE; // Disable update for API request
			else
				$this->Value->setFormValue($val);
		}

		// Check field name 'Modied' first before field var 'x_Modied'
		$val = $CurrentForm->hasValue("Modied") ? $CurrentForm->getValue("Modied") : $CurrentForm->getValue("x_Modied");
		if (!$this->Modied->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Modied->Visible = FALSE; // Disable update for API request
			else
				$this->Modied->setFormValue($val);
			$this->Modied->CurrentValue = UnFormatDateTime($this->Modied->CurrentValue, 0);
		}

		// Check field name 'ModifiedBy' first before field var 'x_ModifiedBy'
		$val = $CurrentForm->hasValue("ModifiedBy") ? $CurrentForm->getValue("ModifiedBy") : $CurrentForm->getValue("x_ModifiedBy");
		if (!$this->ModifiedBy->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->ModifiedBy->Visible = FALSE; // Disable update for API request
			else
				$this->ModifiedBy->setFormValue($val);
		}
	}

	// Restore form values
	public function restoreFormValues()
	{
		global $CurrentForm;
		$this->id->CurrentValue = $this->id->FormValue;
		$this->testid->CurrentValue = $this->testid->FormValue;
		$this->TestName->CurrentValue = $this->TestName->FormValue;
		$this->Gender->CurrentValue = $this->Gender->FormValue;
		$this->MinAge->CurrentValue = $this->MinAge->FormValue;
		$this->MinAgeType->CurrentValue = $this->MinAgeType->FormValue;
		$this->MaxAge->CurrentValue = $this->MaxAge->FormValue;
		$this->MaxAgeType->CurrentValue = $this->MaxAgeType->FormValue;
		$this->Value->CurrentValue = $this->Value->FormValue;
		$this->Modied->CurrentValue = $this->Modied->FormValue;
		$this->Modied->CurrentValue = UnFormatDateTime($this->Modied->CurrentValue, 0);
		$this->ModifiedBy->CurrentValue = $this->ModifiedBy->FormValue;
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
		$this->testid->setDbValue($row['testid']);
		$this->TestName->setDbValue($row['TestName']);
		$this->Gender->setDbValue($row['Gender']);
		$this->MinAge->setDbValue($row['MinAge']);
		$this->MinAgeType->setDbValue($row['MinAgeType']);
		$this->MaxAge->setDbValue($row['MaxAge']);
		$this->MaxAgeType->setDbValue($row['MaxAgeType']);
		$this->Value->setDbValue($row['Value']);
		$this->Created->setDbValue($row['Created']);
		$this->CreatedBy->setDbValue($row['CreatedBy']);
		$this->Modied->setDbValue($row['Modied']);
		$this->ModifiedBy->setDbValue($row['ModifiedBy']);
	}

	// Return a row with default values
	protected function newRow()
	{
		$row = [];
		$row['id'] = NULL;
		$row['testid'] = NULL;
		$row['TestName'] = NULL;
		$row['Gender'] = NULL;
		$row['MinAge'] = NULL;
		$row['MinAgeType'] = NULL;
		$row['MaxAge'] = NULL;
		$row['MaxAgeType'] = NULL;
		$row['Value'] = NULL;
		$row['Created'] = NULL;
		$row['CreatedBy'] = NULL;
		$row['Modied'] = NULL;
		$row['ModifiedBy'] = NULL;
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
		// testid
		// TestName
		// Gender
		// MinAge
		// MinAgeType
		// MaxAge
		// MaxAgeType
		// Value
		// Created
		// CreatedBy
		// Modied
		// ModifiedBy

		if ($this->RowType == ROWTYPE_VIEW) { // View row

			// id
			$this->id->ViewValue = $this->id->CurrentValue;
			$this->id->ViewCustomAttributes = "";

			// testid
			$this->testid->ViewValue = $this->testid->CurrentValue;
			$this->testid->ViewValue = FormatNumber($this->testid->ViewValue, 0, -2, -2, -2);
			$this->testid->ViewCustomAttributes = "";

			// TestName
			$this->TestName->ViewValue = $this->TestName->CurrentValue;
			$this->TestName->ViewCustomAttributes = "";

			// Gender
			$curVal = strval($this->Gender->CurrentValue);
			if ($curVal <> "") {
				$this->Gender->ViewValue = $this->Gender->lookupCacheOption($curVal);
				if ($this->Gender->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->Gender->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = $rswrk->fields('df');
						$this->Gender->ViewValue = $this->Gender->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->Gender->ViewValue = $this->Gender->CurrentValue;
					}
				}
			} else {
				$this->Gender->ViewValue = NULL;
			}
			$this->Gender->ViewCustomAttributes = "";

			// MinAge
			$this->MinAge->ViewValue = $this->MinAge->CurrentValue;
			$this->MinAge->ViewValue = FormatNumber($this->MinAge->ViewValue, 0, -2, -2, -2);
			$this->MinAge->ViewCustomAttributes = "";

			// MinAgeType
			if (strval($this->MinAgeType->CurrentValue) <> "") {
				$this->MinAgeType->ViewValue = $this->MinAgeType->optionCaption($this->MinAgeType->CurrentValue);
			} else {
				$this->MinAgeType->ViewValue = NULL;
			}
			$this->MinAgeType->ViewCustomAttributes = "";

			// MaxAge
			$this->MaxAge->ViewValue = $this->MaxAge->CurrentValue;
			$this->MaxAge->ViewValue = FormatNumber($this->MaxAge->ViewValue, 0, -2, -2, -2);
			$this->MaxAge->ViewCustomAttributes = "";

			// MaxAgeType
			if (strval($this->MaxAgeType->CurrentValue) <> "") {
				$this->MaxAgeType->ViewValue = $this->MaxAgeType->optionCaption($this->MaxAgeType->CurrentValue);
			} else {
				$this->MaxAgeType->ViewValue = NULL;
			}
			$this->MaxAgeType->ViewCustomAttributes = "";

			// Value
			$this->Value->ViewValue = $this->Value->CurrentValue;
			$this->Value->ViewCustomAttributes = "";

			// Modied
			$this->Modied->ViewValue = $this->Modied->CurrentValue;
			$this->Modied->ViewValue = FormatDateTime($this->Modied->ViewValue, 0);
			$this->Modied->ViewCustomAttributes = "";

			// ModifiedBy
			$this->ModifiedBy->ViewValue = $this->ModifiedBy->CurrentValue;
			$this->ModifiedBy->ViewCustomAttributes = "";

			// id
			$this->id->LinkCustomAttributes = "";
			$this->id->HrefValue = "";
			$this->id->TooltipValue = "";

			// testid
			$this->testid->LinkCustomAttributes = "";
			$this->testid->HrefValue = "";
			$this->testid->TooltipValue = "";

			// TestName
			$this->TestName->LinkCustomAttributes = "";
			$this->TestName->HrefValue = "";
			$this->TestName->TooltipValue = "";

			// Gender
			$this->Gender->LinkCustomAttributes = "";
			$this->Gender->HrefValue = "";
			$this->Gender->TooltipValue = "";

			// MinAge
			$this->MinAge->LinkCustomAttributes = "";
			$this->MinAge->HrefValue = "";
			$this->MinAge->TooltipValue = "";

			// MinAgeType
			$this->MinAgeType->LinkCustomAttributes = "";
			$this->MinAgeType->HrefValue = "";
			$this->MinAgeType->TooltipValue = "";

			// MaxAge
			$this->MaxAge->LinkCustomAttributes = "";
			$this->MaxAge->HrefValue = "";
			$this->MaxAge->TooltipValue = "";

			// MaxAgeType
			$this->MaxAgeType->LinkCustomAttributes = "";
			$this->MaxAgeType->HrefValue = "";
			$this->MaxAgeType->TooltipValue = "";

			// Value
			$this->Value->LinkCustomAttributes = "";
			$this->Value->HrefValue = "";
			$this->Value->TooltipValue = "";

			// Modied
			$this->Modied->LinkCustomAttributes = "";
			$this->Modied->HrefValue = "";
			$this->Modied->TooltipValue = "";

			// ModifiedBy
			$this->ModifiedBy->LinkCustomAttributes = "";
			$this->ModifiedBy->HrefValue = "";
			$this->ModifiedBy->TooltipValue = "";
		} elseif ($this->RowType == ROWTYPE_EDIT) { // Edit row

			// id
			$this->id->EditAttrs["class"] = "form-control";
			$this->id->EditCustomAttributes = "";
			$this->id->EditValue = $this->id->CurrentValue;
			$this->id->ViewCustomAttributes = "";

			// testid
			$this->testid->EditAttrs["class"] = "form-control";
			$this->testid->EditCustomAttributes = "";
			if ($this->testid->getSessionValue() <> "") {
				$this->testid->CurrentValue = $this->testid->getSessionValue();
			$this->testid->ViewValue = $this->testid->CurrentValue;
			$this->testid->ViewValue = FormatNumber($this->testid->ViewValue, 0, -2, -2, -2);
			$this->testid->ViewCustomAttributes = "";
			} else {
			$this->testid->EditValue = HtmlEncode($this->testid->CurrentValue);
			$this->testid->PlaceHolder = RemoveHtml($this->testid->caption());
			}

			// TestName
			$this->TestName->EditAttrs["class"] = "form-control";
			$this->TestName->EditCustomAttributes = "";
			if ($this->TestName->getSessionValue() <> "") {
				$this->TestName->CurrentValue = $this->TestName->getSessionValue();
			$this->TestName->ViewValue = $this->TestName->CurrentValue;
			$this->TestName->ViewCustomAttributes = "";
			} else {
			if (REMOVE_XSS)
				$this->TestName->CurrentValue = HtmlDecode($this->TestName->CurrentValue);
			$this->TestName->EditValue = HtmlEncode($this->TestName->CurrentValue);
			$this->TestName->PlaceHolder = RemoveHtml($this->TestName->caption());
			}

			// Gender
			$this->Gender->EditAttrs["class"] = "form-control";
			$this->Gender->EditCustomAttributes = "";
			$curVal = trim(strval($this->Gender->CurrentValue));
			if ($curVal <> "")
				$this->Gender->ViewValue = $this->Gender->lookupCacheOption($curVal);
			else
				$this->Gender->ViewValue = $this->Gender->Lookup !== NULL && is_array($this->Gender->Lookup->Options) ? $curVal : NULL;
			if ($this->Gender->ViewValue !== NULL) { // Load from cache
				$this->Gender->EditValue = array_values($this->Gender->Lookup->Options);
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`Name`" . SearchString("=", $this->Gender->CurrentValue, DATATYPE_STRING, "");
				}
				$sqlWrk = $this->Gender->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
				if ($rswrk) $rswrk->Close();
				$this->Gender->EditValue = $arwrk;
			}

			// MinAge
			$this->MinAge->EditAttrs["class"] = "form-control";
			$this->MinAge->EditCustomAttributes = "";
			$this->MinAge->EditValue = HtmlEncode($this->MinAge->CurrentValue);
			$this->MinAge->PlaceHolder = RemoveHtml($this->MinAge->caption());

			// MinAgeType
			$this->MinAgeType->EditAttrs["class"] = "form-control";
			$this->MinAgeType->EditCustomAttributes = "";
			$this->MinAgeType->EditValue = $this->MinAgeType->options(TRUE);

			// MaxAge
			$this->MaxAge->EditAttrs["class"] = "form-control";
			$this->MaxAge->EditCustomAttributes = "";
			$this->MaxAge->EditValue = HtmlEncode($this->MaxAge->CurrentValue);
			$this->MaxAge->PlaceHolder = RemoveHtml($this->MaxAge->caption());

			// MaxAgeType
			$this->MaxAgeType->EditAttrs["class"] = "form-control";
			$this->MaxAgeType->EditCustomAttributes = "";
			$this->MaxAgeType->EditValue = $this->MaxAgeType->options(TRUE);

			// Value
			$this->Value->EditAttrs["class"] = "form-control";
			$this->Value->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Value->CurrentValue = HtmlDecode($this->Value->CurrentValue);
			$this->Value->EditValue = HtmlEncode($this->Value->CurrentValue);
			$this->Value->PlaceHolder = RemoveHtml($this->Value->caption());

			// Modied
			// ModifiedBy
			// Edit refer script
			// id

			$this->id->LinkCustomAttributes = "";
			$this->id->HrefValue = "";

			// testid
			$this->testid->LinkCustomAttributes = "";
			$this->testid->HrefValue = "";

			// TestName
			$this->TestName->LinkCustomAttributes = "";
			$this->TestName->HrefValue = "";

			// Gender
			$this->Gender->LinkCustomAttributes = "";
			$this->Gender->HrefValue = "";

			// MinAge
			$this->MinAge->LinkCustomAttributes = "";
			$this->MinAge->HrefValue = "";

			// MinAgeType
			$this->MinAgeType->LinkCustomAttributes = "";
			$this->MinAgeType->HrefValue = "";

			// MaxAge
			$this->MaxAge->LinkCustomAttributes = "";
			$this->MaxAge->HrefValue = "";

			// MaxAgeType
			$this->MaxAgeType->LinkCustomAttributes = "";
			$this->MaxAgeType->HrefValue = "";

			// Value
			$this->Value->LinkCustomAttributes = "";
			$this->Value->HrefValue = "";

			// Modied
			$this->Modied->LinkCustomAttributes = "";
			$this->Modied->HrefValue = "";

			// ModifiedBy
			$this->ModifiedBy->LinkCustomAttributes = "";
			$this->ModifiedBy->HrefValue = "";
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
		if ($this->testid->Required) {
			if (!$this->testid->IsDetailKey && $this->testid->FormValue != NULL && $this->testid->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->testid->caption(), $this->testid->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->testid->FormValue)) {
			AddMessage($FormError, $this->testid->errorMessage());
		}
		if ($this->TestName->Required) {
			if (!$this->TestName->IsDetailKey && $this->TestName->FormValue != NULL && $this->TestName->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->TestName->caption(), $this->TestName->RequiredErrorMessage));
			}
		}
		if ($this->Gender->Required) {
			if (!$this->Gender->IsDetailKey && $this->Gender->FormValue != NULL && $this->Gender->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Gender->caption(), $this->Gender->RequiredErrorMessage));
			}
		}
		if ($this->MinAge->Required) {
			if (!$this->MinAge->IsDetailKey && $this->MinAge->FormValue != NULL && $this->MinAge->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->MinAge->caption(), $this->MinAge->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->MinAge->FormValue)) {
			AddMessage($FormError, $this->MinAge->errorMessage());
		}
		if ($this->MinAgeType->Required) {
			if (!$this->MinAgeType->IsDetailKey && $this->MinAgeType->FormValue != NULL && $this->MinAgeType->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->MinAgeType->caption(), $this->MinAgeType->RequiredErrorMessage));
			}
		}
		if ($this->MaxAge->Required) {
			if (!$this->MaxAge->IsDetailKey && $this->MaxAge->FormValue != NULL && $this->MaxAge->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->MaxAge->caption(), $this->MaxAge->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->MaxAge->FormValue)) {
			AddMessage($FormError, $this->MaxAge->errorMessage());
		}
		if ($this->MaxAgeType->Required) {
			if (!$this->MaxAgeType->IsDetailKey && $this->MaxAgeType->FormValue != NULL && $this->MaxAgeType->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->MaxAgeType->caption(), $this->MaxAgeType->RequiredErrorMessage));
			}
		}
		if ($this->Value->Required) {
			if (!$this->Value->IsDetailKey && $this->Value->FormValue != NULL && $this->Value->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Value->caption(), $this->Value->RequiredErrorMessage));
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
		if ($this->Modied->Required) {
			if (!$this->Modied->IsDetailKey && $this->Modied->FormValue != NULL && $this->Modied->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Modied->caption(), $this->Modied->RequiredErrorMessage));
			}
		}
		if ($this->ModifiedBy->Required) {
			if (!$this->ModifiedBy->IsDetailKey && $this->ModifiedBy->FormValue != NULL && $this->ModifiedBy->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->ModifiedBy->caption(), $this->ModifiedBy->RequiredErrorMessage));
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

	// Update record based on key values
	protected function editRow()
	{
		global $Security, $Language;
		$filter = $this->getRecordFilter();
		$filter = $this->applyUserIDFilters($filter);
		$conn = &$this->getConnection();
		$this->CurrentFilter = $filter;
		$sql = $this->getCurrentSql();
		$conn->raiseErrorFn = $GLOBALS["ERROR_FUNC"];
		$rs = $conn->execute($sql);
		$conn->raiseErrorFn = '';
		if ($rs === FALSE)
			return FALSE;
		if ($rs->EOF) {
			$this->setFailureMessage($Language->phrase("NoRecord")); // Set no record message
			$editRow = FALSE; // Update Failed
		} else {

			// Save old values
			$rsold = &$rs->fields;
			$this->loadDbValues($rsold);
			$rsnew = [];

			// testid
			$this->testid->setDbValueDef($rsnew, $this->testid->CurrentValue, 0, $this->testid->ReadOnly);

			// TestName
			$this->TestName->setDbValueDef($rsnew, $this->TestName->CurrentValue, "", $this->TestName->ReadOnly);

			// Gender
			$this->Gender->setDbValueDef($rsnew, $this->Gender->CurrentValue, "", $this->Gender->ReadOnly);

			// MinAge
			$this->MinAge->setDbValueDef($rsnew, $this->MinAge->CurrentValue, 0, $this->MinAge->ReadOnly);

			// MinAgeType
			$this->MinAgeType->setDbValueDef($rsnew, $this->MinAgeType->CurrentValue, NULL, $this->MinAgeType->ReadOnly);

			// MaxAge
			$this->MaxAge->setDbValueDef($rsnew, $this->MaxAge->CurrentValue, 0, $this->MaxAge->ReadOnly);

			// MaxAgeType
			$this->MaxAgeType->setDbValueDef($rsnew, $this->MaxAgeType->CurrentValue, NULL, $this->MaxAgeType->ReadOnly);

			// Value
			$this->Value->setDbValueDef($rsnew, $this->Value->CurrentValue, "", $this->Value->ReadOnly);

			// Modied
			$this->Modied->setDbValueDef($rsnew, CurrentDateTime(), NULL);
			$rsnew['Modied'] = &$this->Modied->DbValue;

			// ModifiedBy
			$this->ModifiedBy->setDbValueDef($rsnew, CurrentUserName(), NULL);
			$rsnew['ModifiedBy'] = &$this->ModifiedBy->DbValue;

			// Check referential integrity for master table 'lab_testname'
			$validMasterRecord = TRUE;
			$masterFilter = $this->sqlMasterFilter_lab_testname();
			$keyValue = isset($rsnew['testid']) ? $rsnew['testid'] : $rsold['testid'];
			if (strval($keyValue) <> "") {
				$masterFilter = str_replace("@id@", AdjustSql($keyValue), $masterFilter);
			} else {
				$validMasterRecord = FALSE;
			}
			$keyValue = isset($rsnew['TestName']) ? $rsnew['TestName'] : $rsold['TestName'];
			if (strval($keyValue) <> "") {
				$masterFilter = str_replace("@Name@", AdjustSql($keyValue), $masterFilter);
			} else {
				$validMasterRecord = FALSE;
			}
			if ($validMasterRecord) {
				if (!isset($GLOBALS["lab_testname"]))
					$GLOBALS["lab_testname"] = new lab_testname();
				$rsmaster = $GLOBALS["lab_testname"]->loadRs($masterFilter);
				$validMasterRecord = ($rsmaster && !$rsmaster->EOF);
				$rsmaster->close();
			}
			if (!$validMasterRecord) {
				$relatedRecordMsg = str_replace("%t", "lab_testname", $Language->phrase("RelatedRecordRequired"));
				$this->setFailureMessage($relatedRecordMsg);
				$rs->close();
				return FALSE;
			}

			// Call Row Updating event
			$updateRow = $this->Row_Updating($rsold, $rsnew);
			if ($updateRow) {
				$conn->raiseErrorFn = $GLOBALS["ERROR_FUNC"];
				if (count($rsnew) > 0)
					$editRow = $this->update($rsnew, "", $rsold);
				else
					$editRow = TRUE; // No field to update
				$conn->raiseErrorFn = '';
				if ($editRow) {
				}
			} else {
				if ($this->getSuccessMessage() <> "" || $this->getFailureMessage() <> "") {

					// Use the message, do nothing
				} elseif ($this->CancelMessage <> "") {
					$this->setFailureMessage($this->CancelMessage);
					$this->CancelMessage = "";
				} else {
					$this->setFailureMessage($Language->phrase("UpdateCancelled"));
				}
				$editRow = FALSE;
			}
		}

		// Call Row_Updated event
		if ($editRow)
			$this->Row_Updated($rsold, $rsnew);
		$rs->close();

		// Write JSON for API request
		if (IsApi() && $editRow) {
			$row = $this->getRecordsFromRecordset([$rsnew], TRUE);
			WriteJson(["success" => TRUE, $this->TableVar => $row]);
		}
		return $editRow;
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
			if ($masterTblVar == "lab_testname") {
				$validMaster = TRUE;
				if (Get("fk_id") !== NULL) {
					$this->testid->setQueryStringValue(Get("fk_id"));
					$this->testid->setSessionValue($this->testid->QueryStringValue);
					if (!is_numeric($this->testid->QueryStringValue))
						$validMaster = FALSE;
				} else {
					$validMaster = FALSE;
				}
				if (Get("fk_Name") !== NULL) {
					$this->TestName->setQueryStringValue(Get("fk_Name"));
					$this->TestName->setSessionValue($this->TestName->QueryStringValue);
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
			if ($masterTblVar == "lab_testname") {
				$validMaster = TRUE;
				if (Post("fk_id") !== NULL) {
					$this->testid->setFormValue(Post("fk_id"));
					$this->testid->setSessionValue($this->testid->FormValue);
					if (!is_numeric($this->testid->FormValue))
						$validMaster = FALSE;
				} else {
					$validMaster = FALSE;
				}
				if (Post("fk_Name") !== NULL) {
					$this->TestName->setFormValue(Post("fk_Name"));
					$this->TestName->setSessionValue($this->TestName->FormValue);
				} else {
					$validMaster = FALSE;
				}
			}
		}
		if ($validMaster) {

			// Save current master table
			$this->setCurrentMasterTable($masterTblVar);
			$this->setSessionWhere($this->getDetailFilter());

			// Reset start record counter (new master key)
			if (!$this->isAddOrEdit()) {
				$this->StartRec = 1;
				$this->setStartRecordNumber($this->StartRec);
			}

			// Clear previous master key from Session
			if ($masterTblVar <> "lab_testname") {
				if ($this->testid->CurrentValue == "")
					$this->testid->setSessionValue("");
				if ($this->TestName->CurrentValue == "")
					$this->TestName->setSessionValue("");
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
		$Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("lab_agerangelist.php"), "", $this->TableVar, TRUE);
		$pageId = "edit";
		$Breadcrumb->add("edit", $pageId, $url);
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
						case "x_Gender":
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
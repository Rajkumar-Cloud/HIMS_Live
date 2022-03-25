<?php
namespace PHPMaker2019\HIMS;

/**
 * Page class
 */
class lab_sub_test_master_edit extends lab_sub_test_master
{

	// Page ID
	public $PageID = "edit";

	// Project ID
	public $ProjectID = "{EA4F6D13-AF8F-428D-9EA7-BA88D1107EC3}";

	// Table name
	public $TableName = 'lab_sub_test_master';

	// Page object name
	public $PageObjName = "lab_sub_test_master_edit";

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

		// Table object (lab_sub_test_master)
		if (!isset($GLOBALS["lab_sub_test_master"]) || get_class($GLOBALS["lab_sub_test_master"]) == PROJECT_NAMESPACE . "lab_sub_test_master") {
			$GLOBALS["lab_sub_test_master"] = &$this;
			$GLOBALS["Table"] = &$GLOBALS["lab_sub_test_master"];
		}
		$this->CancelUrl = $this->pageUrl() . "action=cancel";

		// Table object (user_login)
		if (!isset($GLOBALS['user_login']))
			$GLOBALS['user_login'] = new user_login();

		// Table object (lab_test_master)
		if (!isset($GLOBALS['lab_test_master']))
			$GLOBALS['lab_test_master'] = new lab_test_master();

		// Page ID
		if (!defined(PROJECT_NAMESPACE . "PAGE_ID"))
			define(PROJECT_NAMESPACE . "PAGE_ID", 'edit');

		// Table name (for backward compatibility)
		if (!defined(PROJECT_NAMESPACE . "TABLE_NAME"))
			define(PROJECT_NAMESPACE . "TABLE_NAME", 'lab_sub_test_master');

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
		global $EXPORT, $lab_sub_test_master;
		if ($this->CustomExport && $this->CustomExport == $this->Export && array_key_exists($this->CustomExport, $EXPORT)) {
				$content = ob_get_contents();
			if ($ExportFileName == "")
				$ExportFileName = $this->TableVar;
			$class = PROJECT_NAMESPACE . $EXPORT[$this->CustomExport];
			if (class_exists($class)) {
				$doc = new $class($lab_sub_test_master);
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
					if ($pageName == "lab_sub_test_masterview.php")
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
					$this->terminate(GetUrl("lab_sub_test_masterlist.php"));
				else
					$this->terminate(GetUrl("login.php"));
				return;
			}
		}

		// Create form object
		$CurrentForm = new HttpForm();
		$this->CurrentAction = Param("action"); // Set up current action
		$this->id->setVisibility();
		$this->TestMasterID->setVisibility();
		$this->SubTestName->setVisibility();
		$this->TestOrder->setVisibility();
		$this->NormalRange->setVisibility();
		$this->Created->Visible = FALSE;
		$this->CreatedBy->Visible = FALSE;
		$this->Modified->setVisibility();
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
		$this->setupLookupOptions($this->SubTestName);

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
					$this->terminate("lab_sub_test_masterlist.php"); // No matching record, return to list
				}
				break;
			case "update": // Update
				$returnUrl = $this->getReturnUrl();
				if (GetPageName($returnUrl) == "lab_sub_test_masterlist.php")
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

		// Check field name 'TestMasterID' first before field var 'x_TestMasterID'
		$val = $CurrentForm->hasValue("TestMasterID") ? $CurrentForm->getValue("TestMasterID") : $CurrentForm->getValue("x_TestMasterID");
		if (!$this->TestMasterID->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->TestMasterID->Visible = FALSE; // Disable update for API request
			else
				$this->TestMasterID->setFormValue($val);
		}

		// Check field name 'SubTestName' first before field var 'x_SubTestName'
		$val = $CurrentForm->hasValue("SubTestName") ? $CurrentForm->getValue("SubTestName") : $CurrentForm->getValue("x_SubTestName");
		if (!$this->SubTestName->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->SubTestName->Visible = FALSE; // Disable update for API request
			else
				$this->SubTestName->setFormValue($val);
		}

		// Check field name 'TestOrder' first before field var 'x_TestOrder'
		$val = $CurrentForm->hasValue("TestOrder") ? $CurrentForm->getValue("TestOrder") : $CurrentForm->getValue("x_TestOrder");
		if (!$this->TestOrder->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->TestOrder->Visible = FALSE; // Disable update for API request
			else
				$this->TestOrder->setFormValue($val);
		}

		// Check field name 'NormalRange' first before field var 'x_NormalRange'
		$val = $CurrentForm->hasValue("NormalRange") ? $CurrentForm->getValue("NormalRange") : $CurrentForm->getValue("x_NormalRange");
		if (!$this->NormalRange->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->NormalRange->Visible = FALSE; // Disable update for API request
			else
				$this->NormalRange->setFormValue($val);
		}

		// Check field name 'Modified' first before field var 'x_Modified'
		$val = $CurrentForm->hasValue("Modified") ? $CurrentForm->getValue("Modified") : $CurrentForm->getValue("x_Modified");
		if (!$this->Modified->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Modified->Visible = FALSE; // Disable update for API request
			else
				$this->Modified->setFormValue($val);
			$this->Modified->CurrentValue = UnFormatDateTime($this->Modified->CurrentValue, 0);
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
		$this->TestMasterID->CurrentValue = $this->TestMasterID->FormValue;
		$this->SubTestName->CurrentValue = $this->SubTestName->FormValue;
		$this->TestOrder->CurrentValue = $this->TestOrder->FormValue;
		$this->NormalRange->CurrentValue = $this->NormalRange->FormValue;
		$this->Modified->CurrentValue = $this->Modified->FormValue;
		$this->Modified->CurrentValue = UnFormatDateTime($this->Modified->CurrentValue, 0);
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
		$this->TestMasterID->setDbValue($row['TestMasterID']);
		$this->SubTestName->setDbValue($row['SubTestName']);
		$this->TestOrder->setDbValue($row['TestOrder']);
		$this->NormalRange->setDbValue($row['NormalRange']);
		$this->Created->setDbValue($row['Created']);
		$this->CreatedBy->setDbValue($row['CreatedBy']);
		$this->Modified->setDbValue($row['Modified']);
		$this->ModifiedBy->setDbValue($row['ModifiedBy']);
	}

	// Return a row with default values
	protected function newRow()
	{
		$row = [];
		$row['id'] = NULL;
		$row['TestMasterID'] = NULL;
		$row['SubTestName'] = NULL;
		$row['TestOrder'] = NULL;
		$row['NormalRange'] = NULL;
		$row['Created'] = NULL;
		$row['CreatedBy'] = NULL;
		$row['Modified'] = NULL;
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
		// TestMasterID
		// SubTestName
		// TestOrder
		// NormalRange
		// Created
		// CreatedBy
		// Modified
		// ModifiedBy

		if ($this->RowType == ROWTYPE_VIEW) { // View row

			// id
			$this->id->ViewValue = $this->id->CurrentValue;
			$this->id->ViewCustomAttributes = "";

			// TestMasterID
			$this->TestMasterID->ViewValue = $this->TestMasterID->CurrentValue;
			$this->TestMasterID->ViewValue = FormatNumber($this->TestMasterID->ViewValue, 0, -2, -2, -2);
			$this->TestMasterID->ViewCustomAttributes = "";

			// SubTestName
			$curVal = strval($this->SubTestName->CurrentValue);
			if ($curVal <> "") {
				$this->SubTestName->ViewValue = $this->SubTestName->lookupCacheOption($curVal);
				if ($this->SubTestName->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->SubTestName->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = $rswrk->fields('df');
						$this->SubTestName->ViewValue = $this->SubTestName->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->SubTestName->ViewValue = $this->SubTestName->CurrentValue;
					}
				}
			} else {
				$this->SubTestName->ViewValue = NULL;
			}
			$this->SubTestName->ViewCustomAttributes = "";

			// TestOrder
			$this->TestOrder->ViewValue = $this->TestOrder->CurrentValue;
			$this->TestOrder->ViewValue = FormatNumber($this->TestOrder->ViewValue, 0, -2, -2, -2);
			$this->TestOrder->ViewCustomAttributes = "";

			// NormalRange
			$this->NormalRange->ViewValue = $this->NormalRange->CurrentValue;
			$this->NormalRange->ViewCustomAttributes = "";

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

			// id
			$this->id->LinkCustomAttributes = "";
			$this->id->HrefValue = "";
			$this->id->TooltipValue = "";

			// TestMasterID
			$this->TestMasterID->LinkCustomAttributes = "";
			$this->TestMasterID->HrefValue = "";
			$this->TestMasterID->TooltipValue = "";

			// SubTestName
			$this->SubTestName->LinkCustomAttributes = "";
			$this->SubTestName->HrefValue = "";
			$this->SubTestName->TooltipValue = "";

			// TestOrder
			$this->TestOrder->LinkCustomAttributes = "";
			$this->TestOrder->HrefValue = "";
			$this->TestOrder->TooltipValue = "";

			// NormalRange
			$this->NormalRange->LinkCustomAttributes = "";
			$this->NormalRange->HrefValue = "";
			$this->NormalRange->TooltipValue = "";

			// Modified
			$this->Modified->LinkCustomAttributes = "";
			$this->Modified->HrefValue = "";
			$this->Modified->TooltipValue = "";

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

			// TestMasterID
			$this->TestMasterID->EditAttrs["class"] = "form-control";
			$this->TestMasterID->EditCustomAttributes = "";
			if ($this->TestMasterID->getSessionValue() <> "") {
				$this->TestMasterID->CurrentValue = $this->TestMasterID->getSessionValue();
			$this->TestMasterID->ViewValue = $this->TestMasterID->CurrentValue;
			$this->TestMasterID->ViewValue = FormatNumber($this->TestMasterID->ViewValue, 0, -2, -2, -2);
			$this->TestMasterID->ViewCustomAttributes = "";
			} else {
			$this->TestMasterID->EditValue = HtmlEncode($this->TestMasterID->CurrentValue);
			$this->TestMasterID->PlaceHolder = RemoveHtml($this->TestMasterID->caption());
			}

			// SubTestName
			$this->SubTestName->EditAttrs["class"] = "form-control";
			$this->SubTestName->EditCustomAttributes = "";
			$curVal = trim(strval($this->SubTestName->CurrentValue));
			if ($curVal <> "")
				$this->SubTestName->ViewValue = $this->SubTestName->lookupCacheOption($curVal);
			else
				$this->SubTestName->ViewValue = $this->SubTestName->Lookup !== NULL && is_array($this->SubTestName->Lookup->Options) ? $curVal : NULL;
			if ($this->SubTestName->ViewValue !== NULL) { // Load from cache
				$this->SubTestName->EditValue = array_values($this->SubTestName->Lookup->Options);
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`Name`" . SearchString("=", $this->SubTestName->CurrentValue, DATATYPE_STRING, "");
				}
				$sqlWrk = $this->SubTestName->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
				if ($rswrk) $rswrk->Close();
				$this->SubTestName->EditValue = $arwrk;
			}

			// TestOrder
			$this->TestOrder->EditAttrs["class"] = "form-control";
			$this->TestOrder->EditCustomAttributes = "";
			$this->TestOrder->EditValue = HtmlEncode($this->TestOrder->CurrentValue);
			$this->TestOrder->PlaceHolder = RemoveHtml($this->TestOrder->caption());

			// NormalRange
			$this->NormalRange->EditAttrs["class"] = "form-control";
			$this->NormalRange->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->NormalRange->CurrentValue = HtmlDecode($this->NormalRange->CurrentValue);
			$this->NormalRange->EditValue = HtmlEncode($this->NormalRange->CurrentValue);
			$this->NormalRange->PlaceHolder = RemoveHtml($this->NormalRange->caption());

			// Modified
			// ModifiedBy
			// Edit refer script
			// id

			$this->id->LinkCustomAttributes = "";
			$this->id->HrefValue = "";

			// TestMasterID
			$this->TestMasterID->LinkCustomAttributes = "";
			$this->TestMasterID->HrefValue = "";

			// SubTestName
			$this->SubTestName->LinkCustomAttributes = "";
			$this->SubTestName->HrefValue = "";

			// TestOrder
			$this->TestOrder->LinkCustomAttributes = "";
			$this->TestOrder->HrefValue = "";

			// NormalRange
			$this->NormalRange->LinkCustomAttributes = "";
			$this->NormalRange->HrefValue = "";

			// Modified
			$this->Modified->LinkCustomAttributes = "";
			$this->Modified->HrefValue = "";

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
		if ($this->TestMasterID->Required) {
			if (!$this->TestMasterID->IsDetailKey && $this->TestMasterID->FormValue != NULL && $this->TestMasterID->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->TestMasterID->caption(), $this->TestMasterID->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->TestMasterID->FormValue)) {
			AddMessage($FormError, $this->TestMasterID->errorMessage());
		}
		if ($this->SubTestName->Required) {
			if (!$this->SubTestName->IsDetailKey && $this->SubTestName->FormValue != NULL && $this->SubTestName->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->SubTestName->caption(), $this->SubTestName->RequiredErrorMessage));
			}
		}
		if ($this->TestOrder->Required) {
			if (!$this->TestOrder->IsDetailKey && $this->TestOrder->FormValue != NULL && $this->TestOrder->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->TestOrder->caption(), $this->TestOrder->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->TestOrder->FormValue)) {
			AddMessage($FormError, $this->TestOrder->errorMessage());
		}
		if ($this->NormalRange->Required) {
			if (!$this->NormalRange->IsDetailKey && $this->NormalRange->FormValue != NULL && $this->NormalRange->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->NormalRange->caption(), $this->NormalRange->RequiredErrorMessage));
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

			// TestMasterID
			$this->TestMasterID->setDbValueDef($rsnew, $this->TestMasterID->CurrentValue, 0, $this->TestMasterID->ReadOnly);

			// SubTestName
			$this->SubTestName->setDbValueDef($rsnew, $this->SubTestName->CurrentValue, "", $this->SubTestName->ReadOnly);

			// TestOrder
			$this->TestOrder->setDbValueDef($rsnew, $this->TestOrder->CurrentValue, NULL, $this->TestOrder->ReadOnly);

			// NormalRange
			$this->NormalRange->setDbValueDef($rsnew, $this->NormalRange->CurrentValue, "", $this->NormalRange->ReadOnly);

			// Modified
			$this->Modified->setDbValueDef($rsnew, CurrentDateTime(), NULL);
			$rsnew['Modified'] = &$this->Modified->DbValue;

			// ModifiedBy
			$this->ModifiedBy->setDbValueDef($rsnew, CurrentUserName(), NULL);
			$rsnew['ModifiedBy'] = &$this->ModifiedBy->DbValue;

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
			if ($masterTblVar == "lab_test_master") {
				$validMaster = TRUE;
				if (Get("fk_id") !== NULL) {
					$this->TestMasterID->setQueryStringValue(Get("fk_id"));
					$this->TestMasterID->setSessionValue($this->TestMasterID->QueryStringValue);
					if (!is_numeric($this->TestMasterID->QueryStringValue))
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
			if ($masterTblVar == "lab_test_master") {
				$validMaster = TRUE;
				if (Post("fk_id") !== NULL) {
					$this->TestMasterID->setFormValue(Post("fk_id"));
					$this->TestMasterID->setSessionValue($this->TestMasterID->FormValue);
					if (!is_numeric($this->TestMasterID->FormValue))
						$validMaster = FALSE;
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
			if ($masterTblVar <> "lab_test_master") {
				if ($this->TestMasterID->CurrentValue == "")
					$this->TestMasterID->setSessionValue("");
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
		$Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("lab_sub_test_masterlist.php"), "", $this->TableVar, TRUE);
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
						case "x_SubTestName":
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
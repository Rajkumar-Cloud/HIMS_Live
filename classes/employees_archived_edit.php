<?php
namespace PHPMaker2019\HIMS;

/**
 * Page class
 */
class employees_archived_edit extends employees_archived
{

	// Page ID
	public $PageID = "edit";

	// Project ID
	public $ProjectID = "{EA4F6D13-AF8F-428D-9EA7-BA88D1107EC3}";

	// Table name
	public $TableName = 'employees_archived';

	// Page object name
	public $PageObjName = "employees_archived_edit";

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

		// Table object (employees_archived)
		if (!isset($GLOBALS["employees_archived"]) || get_class($GLOBALS["employees_archived"]) == PROJECT_NAMESPACE . "employees_archived") {
			$GLOBALS["employees_archived"] = &$this;
			$GLOBALS["Table"] = &$GLOBALS["employees_archived"];
		}
		$this->CancelUrl = $this->pageUrl() . "action=cancel";

		// Table object (user_login)
		if (!isset($GLOBALS['user_login']))
			$GLOBALS['user_login'] = new user_login();

		// Page ID
		if (!defined(PROJECT_NAMESPACE . "PAGE_ID"))
			define(PROJECT_NAMESPACE . "PAGE_ID", 'edit');

		// Table name (for backward compatibility)
		if (!defined(PROJECT_NAMESPACE . "TABLE_NAME"))
			define(PROJECT_NAMESPACE . "TABLE_NAME", 'employees_archived');

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
		global $EXPORT, $employees_archived;
		if ($this->CustomExport && $this->CustomExport == $this->Export && array_key_exists($this->CustomExport, $EXPORT)) {
				$content = ob_get_contents();
			if ($ExportFileName == "")
				$ExportFileName = $this->TableVar;
			$class = PROJECT_NAMESPACE . $EXPORT[$this->CustomExport];
			if (class_exists($class)) {
				$doc = new $class($employees_archived);
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
					if ($pageName == "employees_archivedview.php")
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
					$this->terminate(GetUrl("employees_archivedlist.php"));
				else
					$this->terminate(GetUrl("login.php"));
				return;
			}
		}

		// Create form object
		$CurrentForm = new HttpForm();
		$this->CurrentAction = Param("action"); // Set up current action
		$this->id->setVisibility();
		$this->ref_id->setVisibility();
		$this->employee_id->setVisibility();
		$this->first_name->setVisibility();
		$this->last_name->setVisibility();
		$this->gender->setVisibility();
		$this->ssn_num->setVisibility();
		$this->nic_num->setVisibility();
		$this->other_id->setVisibility();
		$this->work_email->setVisibility();
		$this->joined_date->setVisibility();
		$this->confirmation_date->setVisibility();
		$this->supervisor->setVisibility();
		$this->department->setVisibility();
		$this->termination_date->setVisibility();
		$this->notes->setVisibility();
		$this->data->setVisibility();
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
					$this->terminate("employees_archivedlist.php"); // No matching record, return to list
				}
				break;
			case "update": // Update
				$returnUrl = $this->getReturnUrl();
				if (GetPageName($returnUrl) == "employees_archivedlist.php")
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

		// Check field name 'ref_id' first before field var 'x_ref_id'
		$val = $CurrentForm->hasValue("ref_id") ? $CurrentForm->getValue("ref_id") : $CurrentForm->getValue("x_ref_id");
		if (!$this->ref_id->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->ref_id->Visible = FALSE; // Disable update for API request
			else
				$this->ref_id->setFormValue($val);
		}

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

		// Check field name 'work_email' first before field var 'x_work_email'
		$val = $CurrentForm->hasValue("work_email") ? $CurrentForm->getValue("work_email") : $CurrentForm->getValue("x_work_email");
		if (!$this->work_email->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->work_email->Visible = FALSE; // Disable update for API request
			else
				$this->work_email->setFormValue($val);
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

		// Check field name 'department' first before field var 'x_department'
		$val = $CurrentForm->hasValue("department") ? $CurrentForm->getValue("department") : $CurrentForm->getValue("x_department");
		if (!$this->department->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->department->Visible = FALSE; // Disable update for API request
			else
				$this->department->setFormValue($val);
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

		// Check field name 'data' first before field var 'x_data'
		$val = $CurrentForm->hasValue("data") ? $CurrentForm->getValue("data") : $CurrentForm->getValue("x_data");
		if (!$this->data->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->data->Visible = FALSE; // Disable update for API request
			else
				$this->data->setFormValue($val);
		}
	}

	// Restore form values
	public function restoreFormValues()
	{
		global $CurrentForm;
		$this->id->CurrentValue = $this->id->FormValue;
		$this->ref_id->CurrentValue = $this->ref_id->FormValue;
		$this->employee_id->CurrentValue = $this->employee_id->FormValue;
		$this->first_name->CurrentValue = $this->first_name->FormValue;
		$this->last_name->CurrentValue = $this->last_name->FormValue;
		$this->gender->CurrentValue = $this->gender->FormValue;
		$this->ssn_num->CurrentValue = $this->ssn_num->FormValue;
		$this->nic_num->CurrentValue = $this->nic_num->FormValue;
		$this->other_id->CurrentValue = $this->other_id->FormValue;
		$this->work_email->CurrentValue = $this->work_email->FormValue;
		$this->joined_date->CurrentValue = $this->joined_date->FormValue;
		$this->joined_date->CurrentValue = UnFormatDateTime($this->joined_date->CurrentValue, 0);
		$this->confirmation_date->CurrentValue = $this->confirmation_date->FormValue;
		$this->confirmation_date->CurrentValue = UnFormatDateTime($this->confirmation_date->CurrentValue, 0);
		$this->supervisor->CurrentValue = $this->supervisor->FormValue;
		$this->department->CurrentValue = $this->department->FormValue;
		$this->termination_date->CurrentValue = $this->termination_date->FormValue;
		$this->termination_date->CurrentValue = UnFormatDateTime($this->termination_date->CurrentValue, 0);
		$this->notes->CurrentValue = $this->notes->FormValue;
		$this->data->CurrentValue = $this->data->FormValue;
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
		$this->ref_id->setDbValue($row['ref_id']);
		$this->employee_id->setDbValue($row['employee_id']);
		$this->first_name->setDbValue($row['first_name']);
		$this->last_name->setDbValue($row['last_name']);
		$this->gender->setDbValue($row['gender']);
		$this->ssn_num->setDbValue($row['ssn_num']);
		$this->nic_num->setDbValue($row['nic_num']);
		$this->other_id->setDbValue($row['other_id']);
		$this->work_email->setDbValue($row['work_email']);
		$this->joined_date->setDbValue($row['joined_date']);
		$this->confirmation_date->setDbValue($row['confirmation_date']);
		$this->supervisor->setDbValue($row['supervisor']);
		$this->department->setDbValue($row['department']);
		$this->termination_date->setDbValue($row['termination_date']);
		$this->notes->setDbValue($row['notes']);
		$this->data->setDbValue($row['data']);
	}

	// Return a row with default values
	protected function newRow()
	{
		$row = [];
		$row['id'] = NULL;
		$row['ref_id'] = NULL;
		$row['employee_id'] = NULL;
		$row['first_name'] = NULL;
		$row['last_name'] = NULL;
		$row['gender'] = NULL;
		$row['ssn_num'] = NULL;
		$row['nic_num'] = NULL;
		$row['other_id'] = NULL;
		$row['work_email'] = NULL;
		$row['joined_date'] = NULL;
		$row['confirmation_date'] = NULL;
		$row['supervisor'] = NULL;
		$row['department'] = NULL;
		$row['termination_date'] = NULL;
		$row['notes'] = NULL;
		$row['data'] = NULL;
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
		// ref_id
		// employee_id
		// first_name
		// last_name
		// gender
		// ssn_num
		// nic_num
		// other_id
		// work_email
		// joined_date
		// confirmation_date
		// supervisor
		// department
		// termination_date
		// notes
		// data

		if ($this->RowType == ROWTYPE_VIEW) { // View row

			// id
			$this->id->ViewValue = $this->id->CurrentValue;
			$this->id->ViewCustomAttributes = "";

			// ref_id
			$this->ref_id->ViewValue = $this->ref_id->CurrentValue;
			$this->ref_id->ViewValue = FormatNumber($this->ref_id->ViewValue, 0, -2, -2, -2);
			$this->ref_id->ViewCustomAttributes = "";

			// employee_id
			$this->employee_id->ViewValue = $this->employee_id->CurrentValue;
			$this->employee_id->ViewCustomAttributes = "";

			// first_name
			$this->first_name->ViewValue = $this->first_name->CurrentValue;
			$this->first_name->ViewCustomAttributes = "";

			// last_name
			$this->last_name->ViewValue = $this->last_name->CurrentValue;
			$this->last_name->ViewCustomAttributes = "";

			// gender
			if (strval($this->gender->CurrentValue) <> "") {
				$this->gender->ViewValue = $this->gender->optionCaption($this->gender->CurrentValue);
			} else {
				$this->gender->ViewValue = NULL;
			}
			$this->gender->ViewCustomAttributes = "";

			// ssn_num
			$this->ssn_num->ViewValue = $this->ssn_num->CurrentValue;
			$this->ssn_num->ViewCustomAttributes = "";

			// nic_num
			$this->nic_num->ViewValue = $this->nic_num->CurrentValue;
			$this->nic_num->ViewCustomAttributes = "";

			// other_id
			$this->other_id->ViewValue = $this->other_id->CurrentValue;
			$this->other_id->ViewCustomAttributes = "";

			// work_email
			$this->work_email->ViewValue = $this->work_email->CurrentValue;
			$this->work_email->ViewCustomAttributes = "";

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

			// department
			$this->department->ViewValue = $this->department->CurrentValue;
			$this->department->ViewValue = FormatNumber($this->department->ViewValue, 0, -2, -2, -2);
			$this->department->ViewCustomAttributes = "";

			// termination_date
			$this->termination_date->ViewValue = $this->termination_date->CurrentValue;
			$this->termination_date->ViewValue = FormatDateTime($this->termination_date->ViewValue, 0);
			$this->termination_date->ViewCustomAttributes = "";

			// notes
			$this->notes->ViewValue = $this->notes->CurrentValue;
			$this->notes->ViewCustomAttributes = "";

			// data
			$this->data->ViewValue = $this->data->CurrentValue;
			$this->data->ViewCustomAttributes = "";

			// id
			$this->id->LinkCustomAttributes = "";
			$this->id->HrefValue = "";
			$this->id->TooltipValue = "";

			// ref_id
			$this->ref_id->LinkCustomAttributes = "";
			$this->ref_id->HrefValue = "";
			$this->ref_id->TooltipValue = "";

			// employee_id
			$this->employee_id->LinkCustomAttributes = "";
			$this->employee_id->HrefValue = "";
			$this->employee_id->TooltipValue = "";

			// first_name
			$this->first_name->LinkCustomAttributes = "";
			$this->first_name->HrefValue = "";
			$this->first_name->TooltipValue = "";

			// last_name
			$this->last_name->LinkCustomAttributes = "";
			$this->last_name->HrefValue = "";
			$this->last_name->TooltipValue = "";

			// gender
			$this->gender->LinkCustomAttributes = "";
			$this->gender->HrefValue = "";
			$this->gender->TooltipValue = "";

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

			// work_email
			$this->work_email->LinkCustomAttributes = "";
			$this->work_email->HrefValue = "";
			$this->work_email->TooltipValue = "";

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

			// department
			$this->department->LinkCustomAttributes = "";
			$this->department->HrefValue = "";
			$this->department->TooltipValue = "";

			// termination_date
			$this->termination_date->LinkCustomAttributes = "";
			$this->termination_date->HrefValue = "";
			$this->termination_date->TooltipValue = "";

			// notes
			$this->notes->LinkCustomAttributes = "";
			$this->notes->HrefValue = "";
			$this->notes->TooltipValue = "";

			// data
			$this->data->LinkCustomAttributes = "";
			$this->data->HrefValue = "";
			$this->data->TooltipValue = "";
		} elseif ($this->RowType == ROWTYPE_EDIT) { // Edit row

			// id
			$this->id->EditAttrs["class"] = "form-control";
			$this->id->EditCustomAttributes = "";
			$this->id->EditValue = $this->id->CurrentValue;
			$this->id->ViewCustomAttributes = "";

			// ref_id
			$this->ref_id->EditAttrs["class"] = "form-control";
			$this->ref_id->EditCustomAttributes = "";
			$this->ref_id->EditValue = HtmlEncode($this->ref_id->CurrentValue);
			$this->ref_id->PlaceHolder = RemoveHtml($this->ref_id->caption());

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

			// last_name
			$this->last_name->EditAttrs["class"] = "form-control";
			$this->last_name->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->last_name->CurrentValue = HtmlDecode($this->last_name->CurrentValue);
			$this->last_name->EditValue = HtmlEncode($this->last_name->CurrentValue);
			$this->last_name->PlaceHolder = RemoveHtml($this->last_name->caption());

			// gender
			$this->gender->EditCustomAttributes = "";
			$this->gender->EditValue = $this->gender->options(FALSE);

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

			// work_email
			$this->work_email->EditAttrs["class"] = "form-control";
			$this->work_email->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->work_email->CurrentValue = HtmlDecode($this->work_email->CurrentValue);
			$this->work_email->EditValue = HtmlEncode($this->work_email->CurrentValue);
			$this->work_email->PlaceHolder = RemoveHtml($this->work_email->caption());

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

			// department
			$this->department->EditAttrs["class"] = "form-control";
			$this->department->EditCustomAttributes = "";
			$this->department->EditValue = HtmlEncode($this->department->CurrentValue);
			$this->department->PlaceHolder = RemoveHtml($this->department->caption());

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

			// data
			$this->data->EditAttrs["class"] = "form-control";
			$this->data->EditCustomAttributes = "";
			$this->data->EditValue = HtmlEncode($this->data->CurrentValue);
			$this->data->PlaceHolder = RemoveHtml($this->data->caption());

			// Edit refer script
			// id

			$this->id->LinkCustomAttributes = "";
			$this->id->HrefValue = "";

			// ref_id
			$this->ref_id->LinkCustomAttributes = "";
			$this->ref_id->HrefValue = "";

			// employee_id
			$this->employee_id->LinkCustomAttributes = "";
			$this->employee_id->HrefValue = "";

			// first_name
			$this->first_name->LinkCustomAttributes = "";
			$this->first_name->HrefValue = "";

			// last_name
			$this->last_name->LinkCustomAttributes = "";
			$this->last_name->HrefValue = "";

			// gender
			$this->gender->LinkCustomAttributes = "";
			$this->gender->HrefValue = "";

			// ssn_num
			$this->ssn_num->LinkCustomAttributes = "";
			$this->ssn_num->HrefValue = "";

			// nic_num
			$this->nic_num->LinkCustomAttributes = "";
			$this->nic_num->HrefValue = "";

			// other_id
			$this->other_id->LinkCustomAttributes = "";
			$this->other_id->HrefValue = "";

			// work_email
			$this->work_email->LinkCustomAttributes = "";
			$this->work_email->HrefValue = "";

			// joined_date
			$this->joined_date->LinkCustomAttributes = "";
			$this->joined_date->HrefValue = "";

			// confirmation_date
			$this->confirmation_date->LinkCustomAttributes = "";
			$this->confirmation_date->HrefValue = "";

			// supervisor
			$this->supervisor->LinkCustomAttributes = "";
			$this->supervisor->HrefValue = "";

			// department
			$this->department->LinkCustomAttributes = "";
			$this->department->HrefValue = "";

			// termination_date
			$this->termination_date->LinkCustomAttributes = "";
			$this->termination_date->HrefValue = "";

			// notes
			$this->notes->LinkCustomAttributes = "";
			$this->notes->HrefValue = "";

			// data
			$this->data->LinkCustomAttributes = "";
			$this->data->HrefValue = "";
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
		if ($this->ref_id->Required) {
			if (!$this->ref_id->IsDetailKey && $this->ref_id->FormValue != NULL && $this->ref_id->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->ref_id->caption(), $this->ref_id->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->ref_id->FormValue)) {
			AddMessage($FormError, $this->ref_id->errorMessage());
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
		if ($this->last_name->Required) {
			if (!$this->last_name->IsDetailKey && $this->last_name->FormValue != NULL && $this->last_name->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->last_name->caption(), $this->last_name->RequiredErrorMessage));
			}
		}
		if ($this->gender->Required) {
			if ($this->gender->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->gender->caption(), $this->gender->RequiredErrorMessage));
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
		if ($this->work_email->Required) {
			if (!$this->work_email->IsDetailKey && $this->work_email->FormValue != NULL && $this->work_email->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->work_email->caption(), $this->work_email->RequiredErrorMessage));
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
		if ($this->department->Required) {
			if (!$this->department->IsDetailKey && $this->department->FormValue != NULL && $this->department->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->department->caption(), $this->department->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->department->FormValue)) {
			AddMessage($FormError, $this->department->errorMessage());
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
		if ($this->data->Required) {
			if (!$this->data->IsDetailKey && $this->data->FormValue != NULL && $this->data->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->data->caption(), $this->data->RequiredErrorMessage));
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

			// ref_id
			$this->ref_id->setDbValueDef($rsnew, $this->ref_id->CurrentValue, 0, $this->ref_id->ReadOnly);

			// employee_id
			$this->employee_id->setDbValueDef($rsnew, $this->employee_id->CurrentValue, NULL, $this->employee_id->ReadOnly);

			// first_name
			$this->first_name->setDbValueDef($rsnew, $this->first_name->CurrentValue, "", $this->first_name->ReadOnly);

			// last_name
			$this->last_name->setDbValueDef($rsnew, $this->last_name->CurrentValue, "", $this->last_name->ReadOnly);

			// gender
			$this->gender->setDbValueDef($rsnew, $this->gender->CurrentValue, NULL, $this->gender->ReadOnly);

			// ssn_num
			$this->ssn_num->setDbValueDef($rsnew, $this->ssn_num->CurrentValue, NULL, $this->ssn_num->ReadOnly);

			// nic_num
			$this->nic_num->setDbValueDef($rsnew, $this->nic_num->CurrentValue, NULL, $this->nic_num->ReadOnly);

			// other_id
			$this->other_id->setDbValueDef($rsnew, $this->other_id->CurrentValue, NULL, $this->other_id->ReadOnly);

			// work_email
			$this->work_email->setDbValueDef($rsnew, $this->work_email->CurrentValue, NULL, $this->work_email->ReadOnly);

			// joined_date
			$this->joined_date->setDbValueDef($rsnew, UnFormatDateTime($this->joined_date->CurrentValue, 0), NULL, $this->joined_date->ReadOnly);

			// confirmation_date
			$this->confirmation_date->setDbValueDef($rsnew, UnFormatDateTime($this->confirmation_date->CurrentValue, 0), NULL, $this->confirmation_date->ReadOnly);

			// supervisor
			$this->supervisor->setDbValueDef($rsnew, $this->supervisor->CurrentValue, NULL, $this->supervisor->ReadOnly);

			// department
			$this->department->setDbValueDef($rsnew, $this->department->CurrentValue, NULL, $this->department->ReadOnly);

			// termination_date
			$this->termination_date->setDbValueDef($rsnew, UnFormatDateTime($this->termination_date->CurrentValue, 0), NULL, $this->termination_date->ReadOnly);

			// notes
			$this->notes->setDbValueDef($rsnew, $this->notes->CurrentValue, NULL, $this->notes->ReadOnly);

			// data
			$this->data->setDbValueDef($rsnew, $this->data->CurrentValue, NULL, $this->data->ReadOnly);

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

	// Set up Breadcrumb
	protected function setupBreadcrumb()
	{
		global $Breadcrumb, $Language;
		$Breadcrumb = new Breadcrumb();
		$url = substr(CurrentUrl(), strrpos(CurrentUrl(), "/")+1);
		$Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("employees_archivedlist.php"), "", $this->TableVar, TRUE);
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
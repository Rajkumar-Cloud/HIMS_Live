<?php
namespace PHPMaker2019\HIMS;

/**
 * Page class
 */
class employee_immigrations_edit extends employee_immigrations
{

	// Page ID
	public $PageID = "edit";

	// Project ID
	public $ProjectID = "{EA4F6D13-AF8F-428D-9EA7-BA88D1107EC3}";

	// Table name
	public $TableName = 'employee_immigrations';

	// Page object name
	public $PageObjName = "employee_immigrations_edit";

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

		// Table object (employee_immigrations)
		if (!isset($GLOBALS["employee_immigrations"]) || get_class($GLOBALS["employee_immigrations"]) == PROJECT_NAMESPACE . "employee_immigrations") {
			$GLOBALS["employee_immigrations"] = &$this;
			$GLOBALS["Table"] = &$GLOBALS["employee_immigrations"];
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
			define(PROJECT_NAMESPACE . "TABLE_NAME", 'employee_immigrations');

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
		global $EXPORT, $employee_immigrations;
		if ($this->CustomExport && $this->CustomExport == $this->Export && array_key_exists($this->CustomExport, $EXPORT)) {
				$content = ob_get_contents();
			if ($ExportFileName == "")
				$ExportFileName = $this->TableVar;
			$class = PROJECT_NAMESPACE . $EXPORT[$this->CustomExport];
			if (class_exists($class)) {
				$doc = new $class($employee_immigrations);
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
					if ($pageName == "employee_immigrationsview.php")
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
					$this->terminate(GetUrl("employee_immigrationslist.php"));
				else
					$this->terminate(GetUrl("login.php"));
				return;
			}
		}

		// Create form object
		$CurrentForm = new HttpForm();
		$this->CurrentAction = Param("action"); // Set up current action
		$this->id->setVisibility();
		$this->employee->setVisibility();
		$this->document->setVisibility();
		$this->documentname->setVisibility();
		$this->valid_until->setVisibility();
		$this->status->setVisibility();
		$this->details->setVisibility();
		$this->attachment1->setVisibility();
		$this->attachment2->setVisibility();
		$this->attachment3->setVisibility();
		$this->created->setVisibility();
		$this->updated->setVisibility();
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
					$this->terminate("employee_immigrationslist.php"); // No matching record, return to list
				}
				break;
			case "update": // Update
				$returnUrl = $this->getReturnUrl();
				if (GetPageName($returnUrl) == "employee_immigrationslist.php")
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

		// Check field name 'employee' first before field var 'x_employee'
		$val = $CurrentForm->hasValue("employee") ? $CurrentForm->getValue("employee") : $CurrentForm->getValue("x_employee");
		if (!$this->employee->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->employee->Visible = FALSE; // Disable update for API request
			else
				$this->employee->setFormValue($val);
		}

		// Check field name 'document' first before field var 'x_document'
		$val = $CurrentForm->hasValue("document") ? $CurrentForm->getValue("document") : $CurrentForm->getValue("x_document");
		if (!$this->document->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->document->Visible = FALSE; // Disable update for API request
			else
				$this->document->setFormValue($val);
		}

		// Check field name 'documentname' first before field var 'x_documentname'
		$val = $CurrentForm->hasValue("documentname") ? $CurrentForm->getValue("documentname") : $CurrentForm->getValue("x_documentname");
		if (!$this->documentname->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->documentname->Visible = FALSE; // Disable update for API request
			else
				$this->documentname->setFormValue($val);
		}

		// Check field name 'valid_until' first before field var 'x_valid_until'
		$val = $CurrentForm->hasValue("valid_until") ? $CurrentForm->getValue("valid_until") : $CurrentForm->getValue("x_valid_until");
		if (!$this->valid_until->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->valid_until->Visible = FALSE; // Disable update for API request
			else
				$this->valid_until->setFormValue($val);
			$this->valid_until->CurrentValue = UnFormatDateTime($this->valid_until->CurrentValue, 0);
		}

		// Check field name 'status' first before field var 'x_status'
		$val = $CurrentForm->hasValue("status") ? $CurrentForm->getValue("status") : $CurrentForm->getValue("x_status");
		if (!$this->status->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->status->Visible = FALSE; // Disable update for API request
			else
				$this->status->setFormValue($val);
		}

		// Check field name 'details' first before field var 'x_details'
		$val = $CurrentForm->hasValue("details") ? $CurrentForm->getValue("details") : $CurrentForm->getValue("x_details");
		if (!$this->details->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->details->Visible = FALSE; // Disable update for API request
			else
				$this->details->setFormValue($val);
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
	}

	// Restore form values
	public function restoreFormValues()
	{
		global $CurrentForm;
		$this->id->CurrentValue = $this->id->FormValue;
		$this->employee->CurrentValue = $this->employee->FormValue;
		$this->document->CurrentValue = $this->document->FormValue;
		$this->documentname->CurrentValue = $this->documentname->FormValue;
		$this->valid_until->CurrentValue = $this->valid_until->FormValue;
		$this->valid_until->CurrentValue = UnFormatDateTime($this->valid_until->CurrentValue, 0);
		$this->status->CurrentValue = $this->status->FormValue;
		$this->details->CurrentValue = $this->details->FormValue;
		$this->attachment1->CurrentValue = $this->attachment1->FormValue;
		$this->attachment2->CurrentValue = $this->attachment2->FormValue;
		$this->attachment3->CurrentValue = $this->attachment3->FormValue;
		$this->created->CurrentValue = $this->created->FormValue;
		$this->created->CurrentValue = UnFormatDateTime($this->created->CurrentValue, 0);
		$this->updated->CurrentValue = $this->updated->FormValue;
		$this->updated->CurrentValue = UnFormatDateTime($this->updated->CurrentValue, 0);
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
		$this->document->setDbValue($row['document']);
		$this->documentname->setDbValue($row['documentname']);
		$this->valid_until->setDbValue($row['valid_until']);
		$this->status->setDbValue($row['status']);
		$this->details->setDbValue($row['details']);
		$this->attachment1->setDbValue($row['attachment1']);
		$this->attachment2->setDbValue($row['attachment2']);
		$this->attachment3->setDbValue($row['attachment3']);
		$this->created->setDbValue($row['created']);
		$this->updated->setDbValue($row['updated']);
	}

	// Return a row with default values
	protected function newRow()
	{
		$row = [];
		$row['id'] = NULL;
		$row['employee'] = NULL;
		$row['document'] = NULL;
		$row['documentname'] = NULL;
		$row['valid_until'] = NULL;
		$row['status'] = NULL;
		$row['details'] = NULL;
		$row['attachment1'] = NULL;
		$row['attachment2'] = NULL;
		$row['attachment3'] = NULL;
		$row['created'] = NULL;
		$row['updated'] = NULL;
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
		// employee
		// document
		// documentname
		// valid_until
		// status
		// details
		// attachment1
		// attachment2
		// attachment3
		// created
		// updated

		if ($this->RowType == ROWTYPE_VIEW) { // View row

			// id
			$this->id->ViewValue = $this->id->CurrentValue;
			$this->id->ViewCustomAttributes = "";

			// employee
			$this->employee->ViewValue = $this->employee->CurrentValue;
			$this->employee->ViewValue = FormatNumber($this->employee->ViewValue, 0, -2, -2, -2);
			$this->employee->ViewCustomAttributes = "";

			// document
			$this->document->ViewValue = $this->document->CurrentValue;
			$this->document->ViewValue = FormatNumber($this->document->ViewValue, 0, -2, -2, -2);
			$this->document->ViewCustomAttributes = "";

			// documentname
			$this->documentname->ViewValue = $this->documentname->CurrentValue;
			$this->documentname->ViewCustomAttributes = "";

			// valid_until
			$this->valid_until->ViewValue = $this->valid_until->CurrentValue;
			$this->valid_until->ViewValue = FormatDateTime($this->valid_until->ViewValue, 0);
			$this->valid_until->ViewCustomAttributes = "";

			// status
			if (strval($this->status->CurrentValue) <> "") {
				$this->status->ViewValue = $this->status->optionCaption($this->status->CurrentValue);
			} else {
				$this->status->ViewValue = NULL;
			}
			$this->status->ViewCustomAttributes = "";

			// details
			$this->details->ViewValue = $this->details->CurrentValue;
			$this->details->ViewCustomAttributes = "";

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

			// id
			$this->id->LinkCustomAttributes = "";
			$this->id->HrefValue = "";
			$this->id->TooltipValue = "";

			// employee
			$this->employee->LinkCustomAttributes = "";
			$this->employee->HrefValue = "";
			$this->employee->TooltipValue = "";

			// document
			$this->document->LinkCustomAttributes = "";
			$this->document->HrefValue = "";
			$this->document->TooltipValue = "";

			// documentname
			$this->documentname->LinkCustomAttributes = "";
			$this->documentname->HrefValue = "";
			$this->documentname->TooltipValue = "";

			// valid_until
			$this->valid_until->LinkCustomAttributes = "";
			$this->valid_until->HrefValue = "";
			$this->valid_until->TooltipValue = "";

			// status
			$this->status->LinkCustomAttributes = "";
			$this->status->HrefValue = "";
			$this->status->TooltipValue = "";

			// details
			$this->details->LinkCustomAttributes = "";
			$this->details->HrefValue = "";
			$this->details->TooltipValue = "";

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
		} elseif ($this->RowType == ROWTYPE_EDIT) { // Edit row

			// id
			$this->id->EditAttrs["class"] = "form-control";
			$this->id->EditCustomAttributes = "";
			$this->id->EditValue = $this->id->CurrentValue;
			$this->id->ViewCustomAttributes = "";

			// employee
			$this->employee->EditAttrs["class"] = "form-control";
			$this->employee->EditCustomAttributes = "";
			$this->employee->EditValue = HtmlEncode($this->employee->CurrentValue);
			$this->employee->PlaceHolder = RemoveHtml($this->employee->caption());

			// document
			$this->document->EditAttrs["class"] = "form-control";
			$this->document->EditCustomAttributes = "";
			$this->document->EditValue = HtmlEncode($this->document->CurrentValue);
			$this->document->PlaceHolder = RemoveHtml($this->document->caption());

			// documentname
			$this->documentname->EditAttrs["class"] = "form-control";
			$this->documentname->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->documentname->CurrentValue = HtmlDecode($this->documentname->CurrentValue);
			$this->documentname->EditValue = HtmlEncode($this->documentname->CurrentValue);
			$this->documentname->PlaceHolder = RemoveHtml($this->documentname->caption());

			// valid_until
			$this->valid_until->EditAttrs["class"] = "form-control";
			$this->valid_until->EditCustomAttributes = "";
			$this->valid_until->EditValue = HtmlEncode(FormatDateTime($this->valid_until->CurrentValue, 8));
			$this->valid_until->PlaceHolder = RemoveHtml($this->valid_until->caption());

			// status
			$this->status->EditCustomAttributes = "";
			$this->status->EditValue = $this->status->options(FALSE);

			// details
			$this->details->EditAttrs["class"] = "form-control";
			$this->details->EditCustomAttributes = "";
			$this->details->EditValue = HtmlEncode($this->details->CurrentValue);
			$this->details->PlaceHolder = RemoveHtml($this->details->caption());

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

			// Edit refer script
			// id

			$this->id->LinkCustomAttributes = "";
			$this->id->HrefValue = "";

			// employee
			$this->employee->LinkCustomAttributes = "";
			$this->employee->HrefValue = "";

			// document
			$this->document->LinkCustomAttributes = "";
			$this->document->HrefValue = "";

			// documentname
			$this->documentname->LinkCustomAttributes = "";
			$this->documentname->HrefValue = "";

			// valid_until
			$this->valid_until->LinkCustomAttributes = "";
			$this->valid_until->HrefValue = "";

			// status
			$this->status->LinkCustomAttributes = "";
			$this->status->HrefValue = "";

			// details
			$this->details->LinkCustomAttributes = "";
			$this->details->HrefValue = "";

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
		if ($this->document->Required) {
			if (!$this->document->IsDetailKey && $this->document->FormValue != NULL && $this->document->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->document->caption(), $this->document->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->document->FormValue)) {
			AddMessage($FormError, $this->document->errorMessage());
		}
		if ($this->documentname->Required) {
			if (!$this->documentname->IsDetailKey && $this->documentname->FormValue != NULL && $this->documentname->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->documentname->caption(), $this->documentname->RequiredErrorMessage));
			}
		}
		if ($this->valid_until->Required) {
			if (!$this->valid_until->IsDetailKey && $this->valid_until->FormValue != NULL && $this->valid_until->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->valid_until->caption(), $this->valid_until->RequiredErrorMessage));
			}
		}
		if (!CheckDate($this->valid_until->FormValue)) {
			AddMessage($FormError, $this->valid_until->errorMessage());
		}
		if ($this->status->Required) {
			if ($this->status->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->status->caption(), $this->status->RequiredErrorMessage));
			}
		}
		if ($this->details->Required) {
			if (!$this->details->IsDetailKey && $this->details->FormValue != NULL && $this->details->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->details->caption(), $this->details->RequiredErrorMessage));
			}
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

			// employee
			$this->employee->setDbValueDef($rsnew, $this->employee->CurrentValue, 0, $this->employee->ReadOnly);

			// document
			$this->document->setDbValueDef($rsnew, $this->document->CurrentValue, NULL, $this->document->ReadOnly);

			// documentname
			$this->documentname->setDbValueDef($rsnew, $this->documentname->CurrentValue, "", $this->documentname->ReadOnly);

			// valid_until
			$this->valid_until->setDbValueDef($rsnew, UnFormatDateTime($this->valid_until->CurrentValue, 0), CurrentDate(), $this->valid_until->ReadOnly);

			// status
			$this->status->setDbValueDef($rsnew, $this->status->CurrentValue, NULL, $this->status->ReadOnly);

			// details
			$this->details->setDbValueDef($rsnew, $this->details->CurrentValue, NULL, $this->details->ReadOnly);

			// attachment1
			$this->attachment1->setDbValueDef($rsnew, $this->attachment1->CurrentValue, NULL, $this->attachment1->ReadOnly);

			// attachment2
			$this->attachment2->setDbValueDef($rsnew, $this->attachment2->CurrentValue, NULL, $this->attachment2->ReadOnly);

			// attachment3
			$this->attachment3->setDbValueDef($rsnew, $this->attachment3->CurrentValue, NULL, $this->attachment3->ReadOnly);

			// created
			$this->created->setDbValueDef($rsnew, UnFormatDateTime($this->created->CurrentValue, 0), NULL, $this->created->ReadOnly);

			// updated
			$this->updated->setDbValueDef($rsnew, UnFormatDateTime($this->updated->CurrentValue, 0), NULL, $this->updated->ReadOnly);

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
		$Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("employee_immigrationslist.php"), "", $this->TableVar, TRUE);
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
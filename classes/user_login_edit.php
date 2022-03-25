<?php
namespace PHPMaker2019\HIMS;

/**
 * Page class
 */
class user_login_edit extends user_login
{

	// Page ID
	public $PageID = "edit";

	// Project ID
	public $ProjectID = "{EA4F6D13-AF8F-428D-9EA7-BA88D1107EC3}";

	// Table name
	public $TableName = 'user_login';

	// Page object name
	public $PageObjName = "user_login_edit";

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

		// Table object (user_login)
		if (!isset($GLOBALS["user_login"]) || get_class($GLOBALS["user_login"]) == PROJECT_NAMESPACE . "user_login") {
			$GLOBALS["user_login"] = &$this;
			$GLOBALS["Table"] = &$GLOBALS["user_login"];
		}
		$this->CancelUrl = $this->pageUrl() . "action=cancel";

		// Page ID
		if (!defined(PROJECT_NAMESPACE . "PAGE_ID"))
			define(PROJECT_NAMESPACE . "PAGE_ID", 'edit');

		// Table name (for backward compatibility)
		if (!defined(PROJECT_NAMESPACE . "TABLE_NAME"))
			define(PROJECT_NAMESPACE . "TABLE_NAME", 'user_login');

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
		global $EXPORT, $user_login;
		if ($this->CustomExport && $this->CustomExport == $this->Export && array_key_exists($this->CustomExport, $EXPORT)) {
				$content = ob_get_contents();
			if ($ExportFileName == "")
				$ExportFileName = $this->TableVar;
			$class = PROJECT_NAMESPACE . $EXPORT[$this->CustomExport];
			if (class_exists($class)) {
				$doc = new $class($user_login);
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
					if ($pageName == "user_loginview.php")
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
					$this->terminate(GetUrl("user_loginlist.php"));
				else
					$this->terminate(GetUrl("login.php"));
				return;
			}
		}

		// Create form object
		$CurrentForm = new HttpForm();
		$this->CurrentAction = Param("action"); // Set up current action
		$this->id->setVisibility();
		$this->User_Name->setVisibility();
		$this->mail_id->setVisibility();
		$this->mobile_no->setVisibility();
		$this->password->setVisibility();
		$this->email_verified->setVisibility();
		$this->ReportTo->setVisibility();
		$this->UserLevel->setVisibility();
		$this->CreatedDateTime->setVisibility();
		$this->profilefield->setVisibility();
		$this->_UserID->setVisibility();
		$this->GroupID->setVisibility();
		$this->HospID->setVisibility();
		$this->PharID->setVisibility();
		$this->StoreID->setVisibility();
		$this->OTP->setVisibility();
		$this->LoginType->setVisibility();
		$this->BranchId->setVisibility();
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
		$this->setupLookupOptions($this->User_Name);
		$this->setupLookupOptions($this->UserLevel);
		$this->setupLookupOptions($this->HospID);
		$this->setupLookupOptions($this->PharID);
		$this->setupLookupOptions($this->StoreID);

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
					$this->terminate("user_loginlist.php"); // No matching record, return to list
				}
				break;
			case "update": // Update
				$returnUrl = $this->getReturnUrl();
				if (GetPageName($returnUrl) == "user_loginlist.php")
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

		// Check field name 'User_Name' first before field var 'x_User_Name'
		$val = $CurrentForm->hasValue("User_Name") ? $CurrentForm->getValue("User_Name") : $CurrentForm->getValue("x_User_Name");
		if (!$this->User_Name->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->User_Name->Visible = FALSE; // Disable update for API request
			else
				$this->User_Name->setFormValue($val);
		}

		// Check field name 'mail_id' first before field var 'x_mail_id'
		$val = $CurrentForm->hasValue("mail_id") ? $CurrentForm->getValue("mail_id") : $CurrentForm->getValue("x_mail_id");
		if (!$this->mail_id->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->mail_id->Visible = FALSE; // Disable update for API request
			else
				$this->mail_id->setFormValue($val);
		}

		// Check field name 'mobile_no' first before field var 'x_mobile_no'
		$val = $CurrentForm->hasValue("mobile_no") ? $CurrentForm->getValue("mobile_no") : $CurrentForm->getValue("x_mobile_no");
		if (!$this->mobile_no->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->mobile_no->Visible = FALSE; // Disable update for API request
			else
				$this->mobile_no->setFormValue($val);
		}

		// Check field name 'password' first before field var 'x_password'
		$val = $CurrentForm->hasValue("password") ? $CurrentForm->getValue("password") : $CurrentForm->getValue("x_password");
		if (!$this->password->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->password->Visible = FALSE; // Disable update for API request
			else
				$this->password->setFormValue($val);
		}

		// Check field name 'email_verified' first before field var 'x_email_verified'
		$val = $CurrentForm->hasValue("email_verified") ? $CurrentForm->getValue("email_verified") : $CurrentForm->getValue("x_email_verified");
		if (!$this->email_verified->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->email_verified->Visible = FALSE; // Disable update for API request
			else
				$this->email_verified->setFormValue($val);
		}

		// Check field name 'ReportTo' first before field var 'x_ReportTo'
		$val = $CurrentForm->hasValue("ReportTo") ? $CurrentForm->getValue("ReportTo") : $CurrentForm->getValue("x_ReportTo");
		if (!$this->ReportTo->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->ReportTo->Visible = FALSE; // Disable update for API request
			else
				$this->ReportTo->setFormValue($val);
		}

		// Check field name 'UserLevel' first before field var 'x_UserLevel'
		$val = $CurrentForm->hasValue("UserLevel") ? $CurrentForm->getValue("UserLevel") : $CurrentForm->getValue("x_UserLevel");
		if (!$this->UserLevel->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->UserLevel->Visible = FALSE; // Disable update for API request
			else
				$this->UserLevel->setFormValue($val);
		}

		// Check field name 'CreatedDateTime' first before field var 'x_CreatedDateTime'
		$val = $CurrentForm->hasValue("CreatedDateTime") ? $CurrentForm->getValue("CreatedDateTime") : $CurrentForm->getValue("x_CreatedDateTime");
		if (!$this->CreatedDateTime->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->CreatedDateTime->Visible = FALSE; // Disable update for API request
			else
				$this->CreatedDateTime->setFormValue($val);
			$this->CreatedDateTime->CurrentValue = UnFormatDateTime($this->CreatedDateTime->CurrentValue, 0);
		}

		// Check field name 'profilefield' first before field var 'x_profilefield'
		$val = $CurrentForm->hasValue("profilefield") ? $CurrentForm->getValue("profilefield") : $CurrentForm->getValue("x_profilefield");
		if (!$this->profilefield->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->profilefield->Visible = FALSE; // Disable update for API request
			else
				$this->profilefield->setFormValue($val);
		}

		// Check field name 'UserID' first before field var 'x__UserID'
		$val = $CurrentForm->hasValue("UserID") ? $CurrentForm->getValue("UserID") : $CurrentForm->getValue("x__UserID");
		if (!$this->_UserID->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->_UserID->Visible = FALSE; // Disable update for API request
			else
				$this->_UserID->setFormValue($val);
		}

		// Check field name 'GroupID' first before field var 'x_GroupID'
		$val = $CurrentForm->hasValue("GroupID") ? $CurrentForm->getValue("GroupID") : $CurrentForm->getValue("x_GroupID");
		if (!$this->GroupID->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->GroupID->Visible = FALSE; // Disable update for API request
			else
				$this->GroupID->setFormValue($val);
		}

		// Check field name 'HospID' first before field var 'x_HospID'
		$val = $CurrentForm->hasValue("HospID") ? $CurrentForm->getValue("HospID") : $CurrentForm->getValue("x_HospID");
		if (!$this->HospID->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->HospID->Visible = FALSE; // Disable update for API request
			else
				$this->HospID->setFormValue($val);
		}

		// Check field name 'PharID' first before field var 'x_PharID'
		$val = $CurrentForm->hasValue("PharID") ? $CurrentForm->getValue("PharID") : $CurrentForm->getValue("x_PharID");
		if (!$this->PharID->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->PharID->Visible = FALSE; // Disable update for API request
			else
				$this->PharID->setFormValue($val);
		}

		// Check field name 'StoreID' first before field var 'x_StoreID'
		$val = $CurrentForm->hasValue("StoreID") ? $CurrentForm->getValue("StoreID") : $CurrentForm->getValue("x_StoreID");
		if (!$this->StoreID->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->StoreID->Visible = FALSE; // Disable update for API request
			else
				$this->StoreID->setFormValue($val);
		}

		// Check field name 'OTP' first before field var 'x_OTP'
		$val = $CurrentForm->hasValue("OTP") ? $CurrentForm->getValue("OTP") : $CurrentForm->getValue("x_OTP");
		if (!$this->OTP->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->OTP->Visible = FALSE; // Disable update for API request
			else
				$this->OTP->setFormValue($val);
		}

		// Check field name 'LoginType' first before field var 'x_LoginType'
		$val = $CurrentForm->hasValue("LoginType") ? $CurrentForm->getValue("LoginType") : $CurrentForm->getValue("x_LoginType");
		if (!$this->LoginType->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->LoginType->Visible = FALSE; // Disable update for API request
			else
				$this->LoginType->setFormValue($val);
		}

		// Check field name 'BranchId' first before field var 'x_BranchId'
		$val = $CurrentForm->hasValue("BranchId") ? $CurrentForm->getValue("BranchId") : $CurrentForm->getValue("x_BranchId");
		if (!$this->BranchId->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->BranchId->Visible = FALSE; // Disable update for API request
			else
				$this->BranchId->setFormValue($val);
		}
	}

	// Restore form values
	public function restoreFormValues()
	{
		global $CurrentForm;
		$this->id->CurrentValue = $this->id->FormValue;
		$this->User_Name->CurrentValue = $this->User_Name->FormValue;
		$this->mail_id->CurrentValue = $this->mail_id->FormValue;
		$this->mobile_no->CurrentValue = $this->mobile_no->FormValue;
		$this->password->CurrentValue = $this->password->FormValue;
		$this->email_verified->CurrentValue = $this->email_verified->FormValue;
		$this->ReportTo->CurrentValue = $this->ReportTo->FormValue;
		$this->UserLevel->CurrentValue = $this->UserLevel->FormValue;
		$this->CreatedDateTime->CurrentValue = $this->CreatedDateTime->FormValue;
		$this->CreatedDateTime->CurrentValue = UnFormatDateTime($this->CreatedDateTime->CurrentValue, 0);
		$this->profilefield->CurrentValue = $this->profilefield->FormValue;
		$this->_UserID->CurrentValue = $this->_UserID->FormValue;
		$this->GroupID->CurrentValue = $this->GroupID->FormValue;
		$this->HospID->CurrentValue = $this->HospID->FormValue;
		$this->PharID->CurrentValue = $this->PharID->FormValue;
		$this->StoreID->CurrentValue = $this->StoreID->FormValue;
		$this->OTP->CurrentValue = $this->OTP->FormValue;
		$this->LoginType->CurrentValue = $this->LoginType->FormValue;
		$this->BranchId->CurrentValue = $this->BranchId->FormValue;
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
		$this->User_Name->setDbValue($row['User_Name']);
		$this->mail_id->setDbValue($row['mail_id']);
		$this->mobile_no->setDbValue($row['mobile_no']);
		$this->password->setDbValue($row['password']);
		$this->email_verified->setDbValue($row['email_verified']);
		$this->ReportTo->setDbValue($row['ReportTo']);
		$this->UserLevel->setDbValue($row['UserLevel']);
		$this->CreatedDateTime->setDbValue($row['CreatedDateTime']);
		$this->profilefield->setDbValue($row['profilefield']);
		$this->_UserID->setDbValue($row['UserID']);
		$this->GroupID->setDbValue($row['GroupID']);
		$this->HospID->setDbValue($row['HospID']);
		$this->PharID->setDbValue($row['PharID']);
		$this->StoreID->setDbValue($row['StoreID']);
		$this->OTP->setDbValue($row['OTP']);
		$this->LoginType->setDbValue($row['LoginType']);
		$this->BranchId->setDbValue($row['BranchId']);
	}

	// Return a row with default values
	protected function newRow()
	{
		$row = [];
		$row['id'] = NULL;
		$row['User_Name'] = NULL;
		$row['mail_id'] = NULL;
		$row['mobile_no'] = NULL;
		$row['password'] = NULL;
		$row['email_verified'] = NULL;
		$row['ReportTo'] = NULL;
		$row['UserLevel'] = NULL;
		$row['CreatedDateTime'] = NULL;
		$row['profilefield'] = NULL;
		$row['UserID'] = NULL;
		$row['GroupID'] = NULL;
		$row['HospID'] = NULL;
		$row['PharID'] = NULL;
		$row['StoreID'] = NULL;
		$row['OTP'] = NULL;
		$row['LoginType'] = NULL;
		$row['BranchId'] = NULL;
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
		// User_Name
		// mail_id
		// mobile_no
		// password
		// email_verified
		// ReportTo
		// UserLevel
		// CreatedDateTime
		// profilefield
		// UserID
		// GroupID
		// HospID
		// PharID
		// StoreID
		// OTP
		// LoginType
		// BranchId

		if ($this->RowType == ROWTYPE_VIEW) { // View row

			// id
			$this->id->ViewValue = $this->id->CurrentValue;
			$this->id->ViewCustomAttributes = "";

			// User_Name
			$this->User_Name->ViewValue = $this->User_Name->CurrentValue;
			$curVal = strval($this->User_Name->CurrentValue);
			if ($curVal <> "") {
				$this->User_Name->ViewValue = $this->User_Name->lookupCacheOption($curVal);
				if ($this->User_Name->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`first_name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->User_Name->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = $rswrk->fields('df');
						$this->User_Name->ViewValue = $this->User_Name->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->User_Name->ViewValue = $this->User_Name->CurrentValue;
					}
				}
			} else {
				$this->User_Name->ViewValue = NULL;
			}
			$this->User_Name->ViewCustomAttributes = "";

			// mail_id
			$this->mail_id->ViewValue = $this->mail_id->CurrentValue;
			$this->mail_id->ViewCustomAttributes = "";

			// mobile_no
			$this->mobile_no->ViewValue = $this->mobile_no->CurrentValue;
			$this->mobile_no->ViewCustomAttributes = "";

			// password
			$this->password->ViewValue = $Language->phrase("PasswordMask");
			$this->password->ViewCustomAttributes = "";

			// email_verified
			if (strval($this->email_verified->CurrentValue) <> "") {
				$this->email_verified->ViewValue = $this->email_verified->optionCaption($this->email_verified->CurrentValue);
			} else {
				$this->email_verified->ViewValue = NULL;
			}
			$this->email_verified->ViewCustomAttributes = "";

			// ReportTo
			$this->ReportTo->ViewValue = $this->ReportTo->CurrentValue;
			$this->ReportTo->ViewValue = FormatNumber($this->ReportTo->ViewValue, 0, -2, -2, -2);
			$this->ReportTo->ViewCustomAttributes = "";

			// UserLevel
			if ($Security->canAdmin()) { // System admin
			$curVal = strval($this->UserLevel->CurrentValue);
			if ($curVal <> "") {
				$this->UserLevel->ViewValue = $this->UserLevel->lookupCacheOption($curVal);
				if ($this->UserLevel->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
					$sqlWrk = $this->UserLevel->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = $rswrk->fields('df');
						$this->UserLevel->ViewValue = $this->UserLevel->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->UserLevel->ViewValue = $this->UserLevel->CurrentValue;
					}
				}
			} else {
				$this->UserLevel->ViewValue = NULL;
			}
			} else {
				$this->UserLevel->ViewValue = $Language->phrase("PasswordMask");
			}
			$this->UserLevel->ViewCustomAttributes = "";

			// CreatedDateTime
			$this->CreatedDateTime->ViewValue = $this->CreatedDateTime->CurrentValue;
			$this->CreatedDateTime->ViewValue = FormatDateTime($this->CreatedDateTime->ViewValue, 0);
			$this->CreatedDateTime->ViewCustomAttributes = "";

			// profilefield
			$this->profilefield->ViewValue = $this->profilefield->CurrentValue;
			$this->profilefield->ViewCustomAttributes = "";

			// UserID
			$this->_UserID->ViewValue = $this->_UserID->CurrentValue;
			$this->_UserID->ViewValue = FormatNumber($this->_UserID->ViewValue, 0, -2, -2, -2);
			$this->_UserID->ViewCustomAttributes = "";

			// GroupID
			$this->GroupID->ViewValue = $this->GroupID->CurrentValue;
			$this->GroupID->ViewValue = FormatNumber($this->GroupID->ViewValue, 0, -2, -2, -2);
			$this->GroupID->ViewCustomAttributes = "";

			// HospID
			$curVal = strval($this->HospID->CurrentValue);
			if ($curVal <> "") {
				$this->HospID->ViewValue = $this->HospID->lookupCacheOption($curVal);
				if ($this->HospID->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
					$sqlWrk = $this->HospID->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = $rswrk->fields('df');
						$this->HospID->ViewValue = $this->HospID->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->HospID->ViewValue = $this->HospID->CurrentValue;
					}
				}
			} else {
				$this->HospID->ViewValue = NULL;
			}
			$this->HospID->ViewCustomAttributes = "";

			// PharID
			$curVal = strval($this->PharID->CurrentValue);
			if ($curVal <> "") {
				$this->PharID->ViewValue = $this->PharID->lookupCacheOption($curVal);
				if ($this->PharID->ViewValue === NULL) { // Lookup from database
					$arwrk = explode(",", $curVal);
					$filterWrk = "";
					foreach ($arwrk as $wrk) {
						if ($filterWrk <> "")
							$filterWrk .= " OR ";
						$filterWrk .= "`id`" . SearchString("=", trim($wrk), DATATYPE_NUMBER, "");
					}
					$sqlWrk = $this->PharID->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$this->PharID->ViewValue = new OptionValues();
						$ari = 0;
						while (!$rswrk->EOF) {
							$arwrk = array();
							$arwrk[1] = $rswrk->fields('df');
							$this->PharID->ViewValue->add($this->PharID->displayValue($arwrk));
							$rswrk->MoveNext();
							$ari++;
						}
						$rswrk->Close();
					} else {
						$this->PharID->ViewValue = $this->PharID->CurrentValue;
					}
				}
			} else {
				$this->PharID->ViewValue = NULL;
			}
			$this->PharID->ViewCustomAttributes = "";

			// StoreID
			$curVal = strval($this->StoreID->CurrentValue);
			if ($curVal <> "") {
				$this->StoreID->ViewValue = $this->StoreID->lookupCacheOption($curVal);
				if ($this->StoreID->ViewValue === NULL) { // Lookup from database
					$arwrk = explode(",", $curVal);
					$filterWrk = "";
					foreach ($arwrk as $wrk) {
						if ($filterWrk <> "")
							$filterWrk .= " OR ";
						$filterWrk .= "`id`" . SearchString("=", trim($wrk), DATATYPE_NUMBER, "");
					}
					$sqlWrk = $this->StoreID->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$this->StoreID->ViewValue = new OptionValues();
						$ari = 0;
						while (!$rswrk->EOF) {
							$arwrk = array();
							$arwrk[1] = $rswrk->fields('df');
							$this->StoreID->ViewValue->add($this->StoreID->displayValue($arwrk));
							$rswrk->MoveNext();
							$ari++;
						}
						$rswrk->Close();
					} else {
						$this->StoreID->ViewValue = $this->StoreID->CurrentValue;
					}
				}
			} else {
				$this->StoreID->ViewValue = NULL;
			}
			$this->StoreID->ViewCustomAttributes = "";

			// OTP
			$this->OTP->ViewValue = $this->OTP->CurrentValue;
			$this->OTP->ViewCustomAttributes = "";

			// LoginType
			$this->LoginType->ViewValue = $this->LoginType->CurrentValue;
			$this->LoginType->ViewValue = FormatNumber($this->LoginType->ViewValue, 0, -2, -2, -2);
			$this->LoginType->ViewCustomAttributes = "";

			// BranchId
			$this->BranchId->ViewValue = $this->BranchId->CurrentValue;
			$this->BranchId->ViewValue = FormatNumber($this->BranchId->ViewValue, 0, -2, -2, -2);
			$this->BranchId->ViewCustomAttributes = "";

			// id
			$this->id->LinkCustomAttributes = "";
			$this->id->HrefValue = "";
			$this->id->TooltipValue = "";

			// User_Name
			$this->User_Name->LinkCustomAttributes = "";
			$this->User_Name->HrefValue = "";
			$this->User_Name->TooltipValue = "";

			// mail_id
			$this->mail_id->LinkCustomAttributes = "";
			$this->mail_id->HrefValue = "";
			$this->mail_id->TooltipValue = "";

			// mobile_no
			$this->mobile_no->LinkCustomAttributes = "";
			$this->mobile_no->HrefValue = "";
			$this->mobile_no->TooltipValue = "";

			// password
			$this->password->LinkCustomAttributes = "";
			$this->password->HrefValue = "";
			$this->password->TooltipValue = "";

			// email_verified
			$this->email_verified->LinkCustomAttributes = "";
			$this->email_verified->HrefValue = "";
			$this->email_verified->TooltipValue = "";

			// ReportTo
			$this->ReportTo->LinkCustomAttributes = "";
			$this->ReportTo->HrefValue = "";
			$this->ReportTo->TooltipValue = "";

			// UserLevel
			$this->UserLevel->LinkCustomAttributes = "";
			$this->UserLevel->HrefValue = "";
			$this->UserLevel->TooltipValue = "";

			// CreatedDateTime
			$this->CreatedDateTime->LinkCustomAttributes = "";
			$this->CreatedDateTime->HrefValue = "";
			$this->CreatedDateTime->TooltipValue = "";

			// profilefield
			$this->profilefield->LinkCustomAttributes = "";
			$this->profilefield->HrefValue = "";
			$this->profilefield->TooltipValue = "";

			// UserID
			$this->_UserID->LinkCustomAttributes = "";
			$this->_UserID->HrefValue = "";
			$this->_UserID->TooltipValue = "";

			// GroupID
			$this->GroupID->LinkCustomAttributes = "";
			$this->GroupID->HrefValue = "";
			$this->GroupID->TooltipValue = "";

			// HospID
			$this->HospID->LinkCustomAttributes = "";
			$this->HospID->HrefValue = "";
			$this->HospID->TooltipValue = "";

			// PharID
			$this->PharID->LinkCustomAttributes = "";
			$this->PharID->HrefValue = "";
			$this->PharID->TooltipValue = "";

			// StoreID
			$this->StoreID->LinkCustomAttributes = "";
			$this->StoreID->HrefValue = "";
			$this->StoreID->TooltipValue = "";

			// OTP
			$this->OTP->LinkCustomAttributes = "";
			$this->OTP->HrefValue = "";
			$this->OTP->TooltipValue = "";

			// LoginType
			$this->LoginType->LinkCustomAttributes = "";
			$this->LoginType->HrefValue = "";
			$this->LoginType->TooltipValue = "";

			// BranchId
			$this->BranchId->LinkCustomAttributes = "";
			$this->BranchId->HrefValue = "";
			$this->BranchId->TooltipValue = "";
		} elseif ($this->RowType == ROWTYPE_EDIT) { // Edit row

			// id
			$this->id->EditAttrs["class"] = "form-control";
			$this->id->EditCustomAttributes = "";
			$this->id->EditValue = $this->id->CurrentValue;
			$this->id->ViewCustomAttributes = "";

			// User_Name
			$this->User_Name->EditAttrs["class"] = "form-control";
			$this->User_Name->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->User_Name->CurrentValue = HtmlDecode($this->User_Name->CurrentValue);
			$this->User_Name->EditValue = HtmlEncode($this->User_Name->CurrentValue);
			$curVal = strval($this->User_Name->CurrentValue);
			if ($curVal <> "") {
				$this->User_Name->EditValue = $this->User_Name->lookupCacheOption($curVal);
				if ($this->User_Name->EditValue === NULL) { // Lookup from database
					$filterWrk = "`first_name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->User_Name->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = HtmlEncode($rswrk->fields('df'));
						$this->User_Name->EditValue = $this->User_Name->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->User_Name->EditValue = HtmlEncode($this->User_Name->CurrentValue);
					}
				}
			} else {
				$this->User_Name->EditValue = NULL;
			}
			$this->User_Name->PlaceHolder = RemoveHtml($this->User_Name->caption());

			// mail_id
			$this->mail_id->EditAttrs["class"] = "form-control";
			$this->mail_id->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->mail_id->CurrentValue = HtmlDecode($this->mail_id->CurrentValue);
			$this->mail_id->EditValue = HtmlEncode($this->mail_id->CurrentValue);
			$this->mail_id->PlaceHolder = RemoveHtml($this->mail_id->caption());

			// mobile_no
			$this->mobile_no->EditAttrs["class"] = "form-control";
			$this->mobile_no->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->mobile_no->CurrentValue = HtmlDecode($this->mobile_no->CurrentValue);
			$this->mobile_no->EditValue = HtmlEncode($this->mobile_no->CurrentValue);
			$this->mobile_no->PlaceHolder = RemoveHtml($this->mobile_no->caption());

			// password
			$this->password->EditAttrs["class"] = "form-control";
			$this->password->EditCustomAttributes = "";
			$this->password->EditValue = HtmlEncode($this->password->CurrentValue);
			$this->password->PlaceHolder = RemoveHtml($this->password->caption());

			// email_verified
			$this->email_verified->EditAttrs["class"] = "form-control";
			$this->email_verified->EditCustomAttributes = "";
			$this->email_verified->EditValue = $this->email_verified->options(TRUE);

			// ReportTo
			// UserLevel

			$this->UserLevel->EditAttrs["class"] = "form-control";
			$this->UserLevel->EditCustomAttributes = "";
			if (!$Security->canAdmin()) { // System admin
				$this->UserLevel->EditValue = $Language->phrase("PasswordMask");
			} else {
			$curVal = trim(strval($this->UserLevel->CurrentValue));
			if ($curVal <> "")
				$this->UserLevel->ViewValue = $this->UserLevel->lookupCacheOption($curVal);
			else
				$this->UserLevel->ViewValue = $this->UserLevel->Lookup !== NULL && is_array($this->UserLevel->Lookup->Options) ? $curVal : NULL;
			if ($this->UserLevel->ViewValue !== NULL) { // Load from cache
				$this->UserLevel->EditValue = array_values($this->UserLevel->Lookup->Options);
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`id`" . SearchString("=", $this->UserLevel->CurrentValue, DATATYPE_NUMBER, "");
				}
				$sqlWrk = $this->UserLevel->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
				if ($rswrk) $rswrk->Close();
				$this->UserLevel->EditValue = $arwrk;
			}
			}

			// CreatedDateTime
			// profilefield
			// UserID

			$this->_UserID->EditAttrs["class"] = "form-control";
			$this->_UserID->EditCustomAttributes = "";
			$this->_UserID->EditValue = HtmlEncode($this->_UserID->CurrentValue);
			$this->_UserID->PlaceHolder = RemoveHtml($this->_UserID->caption());

			// GroupID
			// HospID

			$this->HospID->EditAttrs["class"] = "form-control";
			$this->HospID->EditCustomAttributes = "";
			$curVal = trim(strval($this->HospID->CurrentValue));
			if ($curVal <> "")
				$this->HospID->ViewValue = $this->HospID->lookupCacheOption($curVal);
			else
				$this->HospID->ViewValue = $this->HospID->Lookup !== NULL && is_array($this->HospID->Lookup->Options) ? $curVal : NULL;
			if ($this->HospID->ViewValue !== NULL) { // Load from cache
				$this->HospID->EditValue = array_values($this->HospID->Lookup->Options);
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`id`" . SearchString("=", $this->HospID->CurrentValue, DATATYPE_NUMBER, "");
				}
				$sqlWrk = $this->HospID->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
				if ($rswrk) $rswrk->Close();
				$this->HospID->EditValue = $arwrk;
			}

			// PharID
			$this->PharID->EditCustomAttributes = "";
			$curVal = trim(strval($this->PharID->CurrentValue));
			if ($curVal <> "")
				$this->PharID->ViewValue = $this->PharID->lookupCacheOption($curVal);
			else
				$this->PharID->ViewValue = $this->PharID->Lookup !== NULL && is_array($this->PharID->Lookup->Options) ? $curVal : NULL;
			if ($this->PharID->ViewValue !== NULL) { // Load from cache
				$this->PharID->EditValue = array_values($this->PharID->Lookup->Options);
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$arwrk = explode(",", $curVal);
					$filterWrk = "";
					foreach ($arwrk as $wrk) {
						if ($filterWrk <> "") $filterWrk .= " OR ";
						$filterWrk .= "`id`" . SearchString("=", trim($wrk), DATATYPE_NUMBER, "");
					}
				}
				$sqlWrk = $this->PharID->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
				if ($rswrk) $rswrk->Close();
				$this->PharID->EditValue = $arwrk;
			}

			// StoreID
			$this->StoreID->EditCustomAttributes = "";
			$curVal = trim(strval($this->StoreID->CurrentValue));
			if ($curVal <> "")
				$this->StoreID->ViewValue = $this->StoreID->lookupCacheOption($curVal);
			else
				$this->StoreID->ViewValue = $this->StoreID->Lookup !== NULL && is_array($this->StoreID->Lookup->Options) ? $curVal : NULL;
			if ($this->StoreID->ViewValue !== NULL) { // Load from cache
				$this->StoreID->EditValue = array_values($this->StoreID->Lookup->Options);
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$arwrk = explode(",", $curVal);
					$filterWrk = "";
					foreach ($arwrk as $wrk) {
						if ($filterWrk <> "") $filterWrk .= " OR ";
						$filterWrk .= "`id`" . SearchString("=", trim($wrk), DATATYPE_NUMBER, "");
					}
				}
				$sqlWrk = $this->StoreID->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
				if ($rswrk) $rswrk->Close();
				$this->StoreID->EditValue = $arwrk;
			}

			// OTP
			$this->OTP->EditAttrs["class"] = "form-control";
			$this->OTP->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->OTP->CurrentValue = HtmlDecode($this->OTP->CurrentValue);
			$this->OTP->EditValue = HtmlEncode($this->OTP->CurrentValue);
			$this->OTP->PlaceHolder = RemoveHtml($this->OTP->caption());

			// LoginType
			$this->LoginType->EditAttrs["class"] = "form-control";
			$this->LoginType->EditCustomAttributes = "";
			$this->LoginType->EditValue = HtmlEncode($this->LoginType->CurrentValue);
			$this->LoginType->PlaceHolder = RemoveHtml($this->LoginType->caption());

			// BranchId
			$this->BranchId->EditAttrs["class"] = "form-control";
			$this->BranchId->EditCustomAttributes = "";
			$this->BranchId->EditValue = HtmlEncode($this->BranchId->CurrentValue);
			$this->BranchId->PlaceHolder = RemoveHtml($this->BranchId->caption());

			// Edit refer script
			// id

			$this->id->LinkCustomAttributes = "";
			$this->id->HrefValue = "";

			// User_Name
			$this->User_Name->LinkCustomAttributes = "";
			$this->User_Name->HrefValue = "";

			// mail_id
			$this->mail_id->LinkCustomAttributes = "";
			$this->mail_id->HrefValue = "";

			// mobile_no
			$this->mobile_no->LinkCustomAttributes = "";
			$this->mobile_no->HrefValue = "";

			// password
			$this->password->LinkCustomAttributes = "";
			$this->password->HrefValue = "";

			// email_verified
			$this->email_verified->LinkCustomAttributes = "";
			$this->email_verified->HrefValue = "";

			// ReportTo
			$this->ReportTo->LinkCustomAttributes = "";
			$this->ReportTo->HrefValue = "";

			// UserLevel
			$this->UserLevel->LinkCustomAttributes = "";
			$this->UserLevel->HrefValue = "";

			// CreatedDateTime
			$this->CreatedDateTime->LinkCustomAttributes = "";
			$this->CreatedDateTime->HrefValue = "";

			// profilefield
			$this->profilefield->LinkCustomAttributes = "";
			$this->profilefield->HrefValue = "";

			// UserID
			$this->_UserID->LinkCustomAttributes = "";
			$this->_UserID->HrefValue = "";

			// GroupID
			$this->GroupID->LinkCustomAttributes = "";
			$this->GroupID->HrefValue = "";

			// HospID
			$this->HospID->LinkCustomAttributes = "";
			$this->HospID->HrefValue = "";

			// PharID
			$this->PharID->LinkCustomAttributes = "";
			$this->PharID->HrefValue = "";

			// StoreID
			$this->StoreID->LinkCustomAttributes = "";
			$this->StoreID->HrefValue = "";

			// OTP
			$this->OTP->LinkCustomAttributes = "";
			$this->OTP->HrefValue = "";

			// LoginType
			$this->LoginType->LinkCustomAttributes = "";
			$this->LoginType->HrefValue = "";

			// BranchId
			$this->BranchId->LinkCustomAttributes = "";
			$this->BranchId->HrefValue = "";
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
		if ($this->User_Name->Required) {
			if (!$this->User_Name->IsDetailKey && $this->User_Name->FormValue != NULL && $this->User_Name->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->User_Name->caption(), $this->User_Name->RequiredErrorMessage));
			}
		}
		if ($this->mail_id->Required) {
			if (!$this->mail_id->IsDetailKey && $this->mail_id->FormValue != NULL && $this->mail_id->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->mail_id->caption(), $this->mail_id->RequiredErrorMessage));
			}
		}
		if ($this->mobile_no->Required) {
			if (!$this->mobile_no->IsDetailKey && $this->mobile_no->FormValue != NULL && $this->mobile_no->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->mobile_no->caption(), $this->mobile_no->RequiredErrorMessage));
			}
		}
		if ($this->password->Required) {
			if (!$this->password->IsDetailKey && $this->password->FormValue != NULL && $this->password->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->password->caption(), $this->password->RequiredErrorMessage));
			}
		}
		if ($this->email_verified->Required) {
			if (!$this->email_verified->IsDetailKey && $this->email_verified->FormValue != NULL && $this->email_verified->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->email_verified->caption(), $this->email_verified->RequiredErrorMessage));
			}
		}
		if ($this->ReportTo->Required) {
			if (!$this->ReportTo->IsDetailKey && $this->ReportTo->FormValue != NULL && $this->ReportTo->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->ReportTo->caption(), $this->ReportTo->RequiredErrorMessage));
			}
		}
		if ($this->UserLevel->Required) {
			if (!$this->UserLevel->IsDetailKey && $this->UserLevel->FormValue != NULL && $this->UserLevel->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->UserLevel->caption(), $this->UserLevel->RequiredErrorMessage));
			}
		}
		if ($this->CreatedDateTime->Required) {
			if (!$this->CreatedDateTime->IsDetailKey && $this->CreatedDateTime->FormValue != NULL && $this->CreatedDateTime->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->CreatedDateTime->caption(), $this->CreatedDateTime->RequiredErrorMessage));
			}
		}
		if ($this->profilefield->Required) {
			if (!$this->profilefield->IsDetailKey && $this->profilefield->FormValue != NULL && $this->profilefield->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->profilefield->caption(), $this->profilefield->RequiredErrorMessage));
			}
		}
		if ($this->_UserID->Required) {
			if (!$this->_UserID->IsDetailKey && $this->_UserID->FormValue != NULL && $this->_UserID->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->_UserID->caption(), $this->_UserID->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->_UserID->FormValue)) {
			AddMessage($FormError, $this->_UserID->errorMessage());
		}
		if ($this->GroupID->Required) {
			if (!$this->GroupID->IsDetailKey && $this->GroupID->FormValue != NULL && $this->GroupID->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->GroupID->caption(), $this->GroupID->RequiredErrorMessage));
			}
		}
		if ($this->HospID->Required) {
			if (!$this->HospID->IsDetailKey && $this->HospID->FormValue != NULL && $this->HospID->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->HospID->caption(), $this->HospID->RequiredErrorMessage));
			}
		}
		if ($this->PharID->Required) {
			if ($this->PharID->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PharID->caption(), $this->PharID->RequiredErrorMessage));
			}
		}
		if ($this->StoreID->Required) {
			if ($this->StoreID->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->StoreID->caption(), $this->StoreID->RequiredErrorMessage));
			}
		}
		if ($this->OTP->Required) {
			if (!$this->OTP->IsDetailKey && $this->OTP->FormValue != NULL && $this->OTP->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->OTP->caption(), $this->OTP->RequiredErrorMessage));
			}
		}
		if ($this->LoginType->Required) {
			if (!$this->LoginType->IsDetailKey && $this->LoginType->FormValue != NULL && $this->LoginType->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->LoginType->caption(), $this->LoginType->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->LoginType->FormValue)) {
			AddMessage($FormError, $this->LoginType->errorMessage());
		}
		if ($this->BranchId->Required) {
			if (!$this->BranchId->IsDetailKey && $this->BranchId->FormValue != NULL && $this->BranchId->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->BranchId->caption(), $this->BranchId->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->BranchId->FormValue)) {
			AddMessage($FormError, $this->BranchId->errorMessage());
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
		if ($this->mail_id->CurrentValue <> "") { // Check field with unique index
			$filterChk = "(`mail_id` = '" . AdjustSql($this->mail_id->CurrentValue, $this->Dbid) . "')";
			$filterChk .= " AND NOT (" . $filter . ")";
			$this->CurrentFilter = $filterChk;
			$sqlChk = $this->getCurrentSql();
			$conn->raiseErrorFn = $GLOBALS["ERROR_FUNC"];
			$rsChk = $conn->Execute($sqlChk);
			$conn->raiseErrorFn = '';
			if ($rsChk === FALSE) {
				return FALSE;
			} elseif (!$rsChk->EOF) {
				$idxErrMsg = str_replace("%f", $this->mail_id->caption(), $Language->phrase("DupIndex"));
				$idxErrMsg = str_replace("%v", $this->mail_id->CurrentValue, $idxErrMsg);
				$this->setFailureMessage($idxErrMsg);
				$rsChk->close();
				return FALSE;
			}
			$rsChk->close();
		}
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

			// User_Name
			$this->User_Name->setDbValueDef($rsnew, $this->User_Name->CurrentValue, "", $this->User_Name->ReadOnly);

			// mail_id
			$this->mail_id->setDbValueDef($rsnew, $this->mail_id->CurrentValue, "", $this->mail_id->ReadOnly);

			// mobile_no
			$this->mobile_no->setDbValueDef($rsnew, $this->mobile_no->CurrentValue, "", $this->mobile_no->ReadOnly);

			// password
			$this->password->setDbValueDef($rsnew, $this->password->CurrentValue, "", $this->password->ReadOnly || ENCRYPTED_PASSWORD && $rs->fields('password') == $this->password->CurrentValue);

			// email_verified
			$this->email_verified->setDbValueDef($rsnew, $this->email_verified->CurrentValue, NULL, $this->email_verified->ReadOnly);

			// ReportTo
			$this->ReportTo->setDbValueDef($rsnew, CurrentUserLevel(), NULL);
			$rsnew['ReportTo'] = &$this->ReportTo->DbValue;

			// UserLevel
			if ($Security->canAdmin()) { // System admin
				$this->UserLevel->setDbValueDef($rsnew, $this->UserLevel->CurrentValue, NULL, $this->UserLevel->ReadOnly);
			}

			// CreatedDateTime
			$this->CreatedDateTime->setDbValueDef($rsnew, CurrentDateTime(), NULL);
			$rsnew['CreatedDateTime'] = &$this->CreatedDateTime->DbValue;

			// profilefield
			$this->profilefield->setDbValueDef($rsnew, CurrentUserLevel(), NULL);
			$rsnew['profilefield'] = &$this->profilefield->DbValue;

			// UserID
			$this->_UserID->setDbValueDef($rsnew, $this->_UserID->CurrentValue, NULL, $this->_UserID->ReadOnly);

			// GroupID
			$this->GroupID->setDbValueDef($rsnew, CurrentUserLevel(), NULL);
			$rsnew['GroupID'] = &$this->GroupID->DbValue;

			// HospID
			$this->HospID->setDbValueDef($rsnew, $this->HospID->CurrentValue, NULL, $this->HospID->ReadOnly);

			// PharID
			$this->PharID->setDbValueDef($rsnew, $this->PharID->CurrentValue, NULL, $this->PharID->ReadOnly);

			// StoreID
			$this->StoreID->setDbValueDef($rsnew, $this->StoreID->CurrentValue, NULL, $this->StoreID->ReadOnly);

			// OTP
			$this->OTP->setDbValueDef($rsnew, $this->OTP->CurrentValue, NULL, $this->OTP->ReadOnly);

			// LoginType
			$this->LoginType->setDbValueDef($rsnew, $this->LoginType->CurrentValue, NULL, $this->LoginType->ReadOnly);

			// BranchId
			$this->BranchId->setDbValueDef($rsnew, $this->BranchId->CurrentValue, NULL, $this->BranchId->ReadOnly);

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
		$Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("user_loginlist.php"), "", $this->TableVar, TRUE);
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
						case "x_User_Name":
							break;
						case "x_UserLevel":
							break;
						case "x_HospID":
							break;
						case "x_PharID":
							break;
						case "x_StoreID":
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
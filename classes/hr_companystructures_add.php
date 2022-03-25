<?php
namespace PHPMaker2019\HIMS;

/**
 * Page class
 */
class hr_companystructures_add extends hr_companystructures
{

	// Page ID
	public $PageID = "add";

	// Project ID
	public $ProjectID = "{EA4F6D13-AF8F-428D-9EA7-BA88D1107EC3}";

	// Table name
	public $TableName = 'hr_companystructures';

	// Page object name
	public $PageObjName = "hr_companystructures_add";

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

		// Table object (hr_companystructures)
		if (!isset($GLOBALS["hr_companystructures"]) || get_class($GLOBALS["hr_companystructures"]) == PROJECT_NAMESPACE . "hr_companystructures") {
			$GLOBALS["hr_companystructures"] = &$this;
			$GLOBALS["Table"] = &$GLOBALS["hr_companystructures"];
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
			define(PROJECT_NAMESPACE . "TABLE_NAME", 'hr_companystructures');

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
		global $EXPORT, $hr_companystructures;
		if ($this->CustomExport && $this->CustomExport == $this->Export && array_key_exists($this->CustomExport, $EXPORT)) {
				$content = ob_get_contents();
			if ($ExportFileName == "")
				$ExportFileName = $this->TableVar;
			$class = PROJECT_NAMESPACE . $EXPORT[$this->CustomExport];
			if (class_exists($class)) {
				$doc = new $class($hr_companystructures);
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
					if ($pageName == "hr_companystructuresview.php")
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
					$this->terminate(GetUrl("hr_companystructureslist.php"));
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
		$this->description->setVisibility();
		$this->address->setVisibility();
		$this->type->setVisibility();
		$this->country->setVisibility();
		$this->parent->setVisibility();
		$this->timezone->setVisibility();
		$this->heads->setVisibility();
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
					$this->terminate("hr_companystructureslist.php"); // No matching record, return to list
				}
				break;
			case "insert": // Add new record
				$this->SendEmail = TRUE; // Send email on add success
				if ($this->addRow($this->OldRecordset)) { // Add successful
					if ($this->getSuccessMessage() == "")
						$this->setSuccessMessage($Language->phrase("AddSuccess")); // Set up success message
					$returnUrl = $this->getReturnUrl();
					if (GetPageName($returnUrl) == "hr_companystructureslist.php")
						$returnUrl = $this->addMasterUrl($returnUrl); // List page, return to List page with correct master key if necessary
					elseif (GetPageName($returnUrl) == "hr_companystructuresview.php")
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
		$this->description->CurrentValue = NULL;
		$this->description->OldValue = $this->description->CurrentValue;
		$this->address->CurrentValue = NULL;
		$this->address->OldValue = $this->address->CurrentValue;
		$this->type->CurrentValue = NULL;
		$this->type->OldValue = $this->type->CurrentValue;
		$this->country->CurrentValue = "0";
		$this->parent->CurrentValue = NULL;
		$this->parent->OldValue = $this->parent->CurrentValue;
		$this->timezone->CurrentValue = "Europe/London";
		$this->heads->CurrentValue = NULL;
		$this->heads->OldValue = $this->heads->CurrentValue;
		$this->HospID->CurrentValue = NULL;
		$this->HospID->OldValue = $this->HospID->CurrentValue;
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

		// Check field name 'description' first before field var 'x_description'
		$val = $CurrentForm->hasValue("description") ? $CurrentForm->getValue("description") : $CurrentForm->getValue("x_description");
		if (!$this->description->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->description->Visible = FALSE; // Disable update for API request
			else
				$this->description->setFormValue($val);
		}

		// Check field name 'address' first before field var 'x_address'
		$val = $CurrentForm->hasValue("address") ? $CurrentForm->getValue("address") : $CurrentForm->getValue("x_address");
		if (!$this->address->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->address->Visible = FALSE; // Disable update for API request
			else
				$this->address->setFormValue($val);
		}

		// Check field name 'type' first before field var 'x_type'
		$val = $CurrentForm->hasValue("type") ? $CurrentForm->getValue("type") : $CurrentForm->getValue("x_type");
		if (!$this->type->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->type->Visible = FALSE; // Disable update for API request
			else
				$this->type->setFormValue($val);
		}

		// Check field name 'country' first before field var 'x_country'
		$val = $CurrentForm->hasValue("country") ? $CurrentForm->getValue("country") : $CurrentForm->getValue("x_country");
		if (!$this->country->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->country->Visible = FALSE; // Disable update for API request
			else
				$this->country->setFormValue($val);
		}

		// Check field name 'parent' first before field var 'x_parent'
		$val = $CurrentForm->hasValue("parent") ? $CurrentForm->getValue("parent") : $CurrentForm->getValue("x_parent");
		if (!$this->parent->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->parent->Visible = FALSE; // Disable update for API request
			else
				$this->parent->setFormValue($val);
		}

		// Check field name 'timezone' first before field var 'x_timezone'
		$val = $CurrentForm->hasValue("timezone") ? $CurrentForm->getValue("timezone") : $CurrentForm->getValue("x_timezone");
		if (!$this->timezone->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->timezone->Visible = FALSE; // Disable update for API request
			else
				$this->timezone->setFormValue($val);
		}

		// Check field name 'heads' first before field var 'x_heads'
		$val = $CurrentForm->hasValue("heads") ? $CurrentForm->getValue("heads") : $CurrentForm->getValue("x_heads");
		if (!$this->heads->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->heads->Visible = FALSE; // Disable update for API request
			else
				$this->heads->setFormValue($val);
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
		$this->title->CurrentValue = $this->title->FormValue;
		$this->description->CurrentValue = $this->description->FormValue;
		$this->address->CurrentValue = $this->address->FormValue;
		$this->type->CurrentValue = $this->type->FormValue;
		$this->country->CurrentValue = $this->country->FormValue;
		$this->parent->CurrentValue = $this->parent->FormValue;
		$this->timezone->CurrentValue = $this->timezone->FormValue;
		$this->heads->CurrentValue = $this->heads->FormValue;
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
		$this->title->setDbValue($row['title']);
		$this->description->setDbValue($row['description']);
		$this->address->setDbValue($row['address']);
		$this->type->setDbValue($row['type']);
		$this->country->setDbValue($row['country']);
		$this->parent->setDbValue($row['parent']);
		$this->timezone->setDbValue($row['timezone']);
		$this->heads->setDbValue($row['heads']);
		$this->HospID->setDbValue($row['HospID']);
	}

	// Return a row with default values
	protected function newRow()
	{
		$this->loadDefaultValues();
		$row = [];
		$row['id'] = $this->id->CurrentValue;
		$row['title'] = $this->title->CurrentValue;
		$row['description'] = $this->description->CurrentValue;
		$row['address'] = $this->address->CurrentValue;
		$row['type'] = $this->type->CurrentValue;
		$row['country'] = $this->country->CurrentValue;
		$row['parent'] = $this->parent->CurrentValue;
		$row['timezone'] = $this->timezone->CurrentValue;
		$row['heads'] = $this->heads->CurrentValue;
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
		// title
		// description
		// address
		// type
		// country
		// parent
		// timezone
		// heads
		// HospID

		if ($this->RowType == ROWTYPE_VIEW) { // View row

			// id
			$this->id->ViewValue = $this->id->CurrentValue;
			$this->id->ViewCustomAttributes = "";

			// title
			$this->title->ViewValue = $this->title->CurrentValue;
			$this->title->ViewCustomAttributes = "";

			// description
			$this->description->ViewValue = $this->description->CurrentValue;
			$this->description->ViewCustomAttributes = "";

			// address
			$this->address->ViewValue = $this->address->CurrentValue;
			$this->address->ViewCustomAttributes = "";

			// type
			if (strval($this->type->CurrentValue) <> "") {
				$this->type->ViewValue = $this->type->optionCaption($this->type->CurrentValue);
			} else {
				$this->type->ViewValue = NULL;
			}
			$this->type->ViewCustomAttributes = "";

			// country
			$this->country->ViewValue = $this->country->CurrentValue;
			$this->country->ViewCustomAttributes = "";

			// parent
			$this->parent->ViewValue = $this->parent->CurrentValue;
			$this->parent->ViewValue = FormatNumber($this->parent->ViewValue, 0, -2, -2, -2);
			$this->parent->ViewCustomAttributes = "";

			// timezone
			$this->timezone->ViewValue = $this->timezone->CurrentValue;
			$this->timezone->ViewCustomAttributes = "";

			// heads
			$this->heads->ViewValue = $this->heads->CurrentValue;
			$this->heads->ViewCustomAttributes = "";

			// HospID
			$this->HospID->ViewValue = $this->HospID->CurrentValue;
			$this->HospID->ViewValue = FormatNumber($this->HospID->ViewValue, 0, -2, -2, -2);
			$this->HospID->ViewCustomAttributes = "";

			// title
			$this->title->LinkCustomAttributes = "";
			$this->title->HrefValue = "";
			$this->title->TooltipValue = "";

			// description
			$this->description->LinkCustomAttributes = "";
			$this->description->HrefValue = "";
			$this->description->TooltipValue = "";

			// address
			$this->address->LinkCustomAttributes = "";
			$this->address->HrefValue = "";
			$this->address->TooltipValue = "";

			// type
			$this->type->LinkCustomAttributes = "";
			$this->type->HrefValue = "";
			$this->type->TooltipValue = "";

			// country
			$this->country->LinkCustomAttributes = "";
			$this->country->HrefValue = "";
			$this->country->TooltipValue = "";

			// parent
			$this->parent->LinkCustomAttributes = "";
			$this->parent->HrefValue = "";
			$this->parent->TooltipValue = "";

			// timezone
			$this->timezone->LinkCustomAttributes = "";
			$this->timezone->HrefValue = "";
			$this->timezone->TooltipValue = "";

			// heads
			$this->heads->LinkCustomAttributes = "";
			$this->heads->HrefValue = "";
			$this->heads->TooltipValue = "";

			// HospID
			$this->HospID->LinkCustomAttributes = "";
			$this->HospID->HrefValue = "";
			$this->HospID->TooltipValue = "";
		} elseif ($this->RowType == ROWTYPE_ADD) { // Add row

			// title
			$this->title->EditAttrs["class"] = "form-control";
			$this->title->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->title->CurrentValue = HtmlDecode($this->title->CurrentValue);
			$this->title->EditValue = HtmlEncode($this->title->CurrentValue);
			$this->title->PlaceHolder = RemoveHtml($this->title->caption());

			// description
			$this->description->EditAttrs["class"] = "form-control";
			$this->description->EditCustomAttributes = "";
			$this->description->EditValue = HtmlEncode($this->description->CurrentValue);
			$this->description->PlaceHolder = RemoveHtml($this->description->caption());

			// address
			$this->address->EditAttrs["class"] = "form-control";
			$this->address->EditCustomAttributes = "";
			$this->address->EditValue = HtmlEncode($this->address->CurrentValue);
			$this->address->PlaceHolder = RemoveHtml($this->address->caption());

			// type
			$this->type->EditCustomAttributes = "";
			$this->type->EditValue = $this->type->options(FALSE);

			// country
			$this->country->EditAttrs["class"] = "form-control";
			$this->country->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->country->CurrentValue = HtmlDecode($this->country->CurrentValue);
			$this->country->EditValue = HtmlEncode($this->country->CurrentValue);
			$this->country->PlaceHolder = RemoveHtml($this->country->caption());

			// parent
			$this->parent->EditAttrs["class"] = "form-control";
			$this->parent->EditCustomAttributes = "";
			$this->parent->EditValue = HtmlEncode($this->parent->CurrentValue);
			$this->parent->PlaceHolder = RemoveHtml($this->parent->caption());

			// timezone
			$this->timezone->EditAttrs["class"] = "form-control";
			$this->timezone->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->timezone->CurrentValue = HtmlDecode($this->timezone->CurrentValue);
			$this->timezone->EditValue = HtmlEncode($this->timezone->CurrentValue);
			$this->timezone->PlaceHolder = RemoveHtml($this->timezone->caption());

			// heads
			$this->heads->EditAttrs["class"] = "form-control";
			$this->heads->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->heads->CurrentValue = HtmlDecode($this->heads->CurrentValue);
			$this->heads->EditValue = HtmlEncode($this->heads->CurrentValue);
			$this->heads->PlaceHolder = RemoveHtml($this->heads->caption());

			// HospID
			// Add refer script
			// title

			$this->title->LinkCustomAttributes = "";
			$this->title->HrefValue = "";

			// description
			$this->description->LinkCustomAttributes = "";
			$this->description->HrefValue = "";

			// address
			$this->address->LinkCustomAttributes = "";
			$this->address->HrefValue = "";

			// type
			$this->type->LinkCustomAttributes = "";
			$this->type->HrefValue = "";

			// country
			$this->country->LinkCustomAttributes = "";
			$this->country->HrefValue = "";

			// parent
			$this->parent->LinkCustomAttributes = "";
			$this->parent->HrefValue = "";

			// timezone
			$this->timezone->LinkCustomAttributes = "";
			$this->timezone->HrefValue = "";

			// heads
			$this->heads->LinkCustomAttributes = "";
			$this->heads->HrefValue = "";

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
		if ($this->title->Required) {
			if (!$this->title->IsDetailKey && $this->title->FormValue != NULL && $this->title->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->title->caption(), $this->title->RequiredErrorMessage));
			}
		}
		if ($this->description->Required) {
			if (!$this->description->IsDetailKey && $this->description->FormValue != NULL && $this->description->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->description->caption(), $this->description->RequiredErrorMessage));
			}
		}
		if ($this->address->Required) {
			if (!$this->address->IsDetailKey && $this->address->FormValue != NULL && $this->address->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->address->caption(), $this->address->RequiredErrorMessage));
			}
		}
		if ($this->type->Required) {
			if ($this->type->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->type->caption(), $this->type->RequiredErrorMessage));
			}
		}
		if ($this->country->Required) {
			if (!$this->country->IsDetailKey && $this->country->FormValue != NULL && $this->country->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->country->caption(), $this->country->RequiredErrorMessage));
			}
		}
		if ($this->parent->Required) {
			if (!$this->parent->IsDetailKey && $this->parent->FormValue != NULL && $this->parent->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->parent->caption(), $this->parent->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->parent->FormValue)) {
			AddMessage($FormError, $this->parent->errorMessage());
		}
		if ($this->timezone->Required) {
			if (!$this->timezone->IsDetailKey && $this->timezone->FormValue != NULL && $this->timezone->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->timezone->caption(), $this->timezone->RequiredErrorMessage));
			}
		}
		if ($this->heads->Required) {
			if (!$this->heads->IsDetailKey && $this->heads->FormValue != NULL && $this->heads->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->heads->caption(), $this->heads->RequiredErrorMessage));
			}
		}
		if ($this->HospID->Required) {
			if (!$this->HospID->IsDetailKey && $this->HospID->FormValue != NULL && $this->HospID->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->HospID->caption(), $this->HospID->RequiredErrorMessage));
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

		// title
		$this->title->setDbValueDef($rsnew, $this->title->CurrentValue, "", FALSE);

		// description
		$this->description->setDbValueDef($rsnew, $this->description->CurrentValue, "", FALSE);

		// address
		$this->address->setDbValueDef($rsnew, $this->address->CurrentValue, NULL, FALSE);

		// type
		$this->type->setDbValueDef($rsnew, $this->type->CurrentValue, NULL, FALSE);

		// country
		$this->country->setDbValueDef($rsnew, $this->country->CurrentValue, "", strval($this->country->CurrentValue) == "");

		// parent
		$this->parent->setDbValueDef($rsnew, $this->parent->CurrentValue, NULL, FALSE);

		// timezone
		$this->timezone->setDbValueDef($rsnew, $this->timezone->CurrentValue, "", strval($this->timezone->CurrentValue) == "");

		// heads
		$this->heads->setDbValueDef($rsnew, $this->heads->CurrentValue, NULL, FALSE);

		// HospID
		$this->HospID->setDbValueDef($rsnew, HospitalID(), NULL);
		$rsnew['HospID'] = &$this->HospID->DbValue;

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
		$Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("hr_companystructureslist.php"), "", $this->TableVar, TRUE);
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
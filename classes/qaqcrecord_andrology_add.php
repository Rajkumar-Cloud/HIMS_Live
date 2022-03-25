<?php
namespace PHPMaker2019\HIMS;

/**
 * Page class
 */
class qaqcrecord_andrology_add extends qaqcrecord_andrology
{

	// Page ID
	public $PageID = "add";

	// Project ID
	public $ProjectID = "{EA4F6D13-AF8F-428D-9EA7-BA88D1107EC3}";

	// Table name
	public $TableName = 'qaqcrecord_andrology';

	// Page object name
	public $PageObjName = "qaqcrecord_andrology_add";

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

		// Table object (qaqcrecord_andrology)
		if (!isset($GLOBALS["qaqcrecord_andrology"]) || get_class($GLOBALS["qaqcrecord_andrology"]) == PROJECT_NAMESPACE . "qaqcrecord_andrology") {
			$GLOBALS["qaqcrecord_andrology"] = &$this;
			$GLOBALS["Table"] = &$GLOBALS["qaqcrecord_andrology"];
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
			define(PROJECT_NAMESPACE . "TABLE_NAME", 'qaqcrecord_andrology');

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
		global $EXPORT, $qaqcrecord_andrology;
		if ($this->CustomExport && $this->CustomExport == $this->Export && array_key_exists($this->CustomExport, $EXPORT)) {
				$content = ob_get_contents();
			if ($ExportFileName == "")
				$ExportFileName = $this->TableVar;
			$class = PROJECT_NAMESPACE . $EXPORT[$this->CustomExport];
			if (class_exists($class)) {
				$doc = new $class($qaqcrecord_andrology);
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
					if ($pageName == "qaqcrecord_andrologyview.php")
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
					$this->terminate(GetUrl("qaqcrecord_andrologylist.php"));
				else
					$this->terminate(GetUrl("login.php"));
				return;
			}
		}

		// Create form object
		$CurrentForm = new HttpForm();
		$this->CurrentAction = Param("action"); // Set up current action
		$this->id->Visible = FALSE;
		$this->Date->setVisibility();
		$this->LN2_Level->setVisibility();
		$this->LN2_Checked->setVisibility();
		$this->Incubator_Temp->setVisibility();
		$this->Incubator_Cleaned->setVisibility();
		$this->LAF_MG->setVisibility();
		$this->LAF_Cleaned->setVisibility();
		$this->REF_Temp->setVisibility();
		$this->REF_Cleaned->setVisibility();
		$this->Heating_Temp->setVisibility();
		$this->Heating_Cleaned->setVisibility();
		$this->Createdby->setVisibility();
		$this->CreatedDate->setVisibility();
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
					$this->terminate("qaqcrecord_andrologylist.php"); // No matching record, return to list
				}
				break;
			case "insert": // Add new record
				$this->SendEmail = TRUE; // Send email on add success
				if ($this->addRow($this->OldRecordset)) { // Add successful
					if ($this->getSuccessMessage() == "")
						$this->setSuccessMessage($Language->phrase("AddSuccess")); // Set up success message
					$returnUrl = $this->getReturnUrl();
					if (GetPageName($returnUrl) == "qaqcrecord_andrologylist.php")
						$returnUrl = $this->addMasterUrl($returnUrl); // List page, return to List page with correct master key if necessary
					elseif (GetPageName($returnUrl) == "qaqcrecord_andrologyview.php")
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
		$this->Date->CurrentValue = NULL;
		$this->Date->OldValue = $this->Date->CurrentValue;
		$this->LN2_Level->CurrentValue = NULL;
		$this->LN2_Level->OldValue = $this->LN2_Level->CurrentValue;
		$this->LN2_Checked->CurrentValue = NULL;
		$this->LN2_Checked->OldValue = $this->LN2_Checked->CurrentValue;
		$this->Incubator_Temp->CurrentValue = NULL;
		$this->Incubator_Temp->OldValue = $this->Incubator_Temp->CurrentValue;
		$this->Incubator_Cleaned->CurrentValue = NULL;
		$this->Incubator_Cleaned->OldValue = $this->Incubator_Cleaned->CurrentValue;
		$this->LAF_MG->CurrentValue = NULL;
		$this->LAF_MG->OldValue = $this->LAF_MG->CurrentValue;
		$this->LAF_Cleaned->CurrentValue = NULL;
		$this->LAF_Cleaned->OldValue = $this->LAF_Cleaned->CurrentValue;
		$this->REF_Temp->CurrentValue = NULL;
		$this->REF_Temp->OldValue = $this->REF_Temp->CurrentValue;
		$this->REF_Cleaned->CurrentValue = NULL;
		$this->REF_Cleaned->OldValue = $this->REF_Cleaned->CurrentValue;
		$this->Heating_Temp->CurrentValue = NULL;
		$this->Heating_Temp->OldValue = $this->Heating_Temp->CurrentValue;
		$this->Heating_Cleaned->CurrentValue = NULL;
		$this->Heating_Cleaned->OldValue = $this->Heating_Cleaned->CurrentValue;
		$this->Createdby->CurrentValue = NULL;
		$this->Createdby->OldValue = $this->Createdby->CurrentValue;
		$this->CreatedDate->CurrentValue = NULL;
		$this->CreatedDate->OldValue = $this->CreatedDate->CurrentValue;
	}

	// Load form values
	protected function loadFormValues()
	{

		// Load from form
		global $CurrentForm;

		// Check field name 'Date' first before field var 'x_Date'
		$val = $CurrentForm->hasValue("Date") ? $CurrentForm->getValue("Date") : $CurrentForm->getValue("x_Date");
		if (!$this->Date->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Date->Visible = FALSE; // Disable update for API request
			else
				$this->Date->setFormValue($val);
			$this->Date->CurrentValue = UnFormatDateTime($this->Date->CurrentValue, 0);
		}

		// Check field name 'LN2_Level' first before field var 'x_LN2_Level'
		$val = $CurrentForm->hasValue("LN2_Level") ? $CurrentForm->getValue("LN2_Level") : $CurrentForm->getValue("x_LN2_Level");
		if (!$this->LN2_Level->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->LN2_Level->Visible = FALSE; // Disable update for API request
			else
				$this->LN2_Level->setFormValue($val);
		}

		// Check field name 'LN2_Checked' first before field var 'x_LN2_Checked'
		$val = $CurrentForm->hasValue("LN2_Checked") ? $CurrentForm->getValue("LN2_Checked") : $CurrentForm->getValue("x_LN2_Checked");
		if (!$this->LN2_Checked->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->LN2_Checked->Visible = FALSE; // Disable update for API request
			else
				$this->LN2_Checked->setFormValue($val);
		}

		// Check field name 'Incubator_Temp' first before field var 'x_Incubator_Temp'
		$val = $CurrentForm->hasValue("Incubator_Temp") ? $CurrentForm->getValue("Incubator_Temp") : $CurrentForm->getValue("x_Incubator_Temp");
		if (!$this->Incubator_Temp->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Incubator_Temp->Visible = FALSE; // Disable update for API request
			else
				$this->Incubator_Temp->setFormValue($val);
		}

		// Check field name 'Incubator_Cleaned' first before field var 'x_Incubator_Cleaned'
		$val = $CurrentForm->hasValue("Incubator_Cleaned") ? $CurrentForm->getValue("Incubator_Cleaned") : $CurrentForm->getValue("x_Incubator_Cleaned");
		if (!$this->Incubator_Cleaned->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Incubator_Cleaned->Visible = FALSE; // Disable update for API request
			else
				$this->Incubator_Cleaned->setFormValue($val);
		}

		// Check field name 'LAF_MG' first before field var 'x_LAF_MG'
		$val = $CurrentForm->hasValue("LAF_MG") ? $CurrentForm->getValue("LAF_MG") : $CurrentForm->getValue("x_LAF_MG");
		if (!$this->LAF_MG->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->LAF_MG->Visible = FALSE; // Disable update for API request
			else
				$this->LAF_MG->setFormValue($val);
		}

		// Check field name 'LAF_Cleaned' first before field var 'x_LAF_Cleaned'
		$val = $CurrentForm->hasValue("LAF_Cleaned") ? $CurrentForm->getValue("LAF_Cleaned") : $CurrentForm->getValue("x_LAF_Cleaned");
		if (!$this->LAF_Cleaned->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->LAF_Cleaned->Visible = FALSE; // Disable update for API request
			else
				$this->LAF_Cleaned->setFormValue($val);
		}

		// Check field name 'REF_Temp' first before field var 'x_REF_Temp'
		$val = $CurrentForm->hasValue("REF_Temp") ? $CurrentForm->getValue("REF_Temp") : $CurrentForm->getValue("x_REF_Temp");
		if (!$this->REF_Temp->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->REF_Temp->Visible = FALSE; // Disable update for API request
			else
				$this->REF_Temp->setFormValue($val);
		}

		// Check field name 'REF_Cleaned' first before field var 'x_REF_Cleaned'
		$val = $CurrentForm->hasValue("REF_Cleaned") ? $CurrentForm->getValue("REF_Cleaned") : $CurrentForm->getValue("x_REF_Cleaned");
		if (!$this->REF_Cleaned->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->REF_Cleaned->Visible = FALSE; // Disable update for API request
			else
				$this->REF_Cleaned->setFormValue($val);
		}

		// Check field name 'Heating_Temp' first before field var 'x_Heating_Temp'
		$val = $CurrentForm->hasValue("Heating_Temp") ? $CurrentForm->getValue("Heating_Temp") : $CurrentForm->getValue("x_Heating_Temp");
		if (!$this->Heating_Temp->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Heating_Temp->Visible = FALSE; // Disable update for API request
			else
				$this->Heating_Temp->setFormValue($val);
		}

		// Check field name 'Heating_Cleaned' first before field var 'x_Heating_Cleaned'
		$val = $CurrentForm->hasValue("Heating_Cleaned") ? $CurrentForm->getValue("Heating_Cleaned") : $CurrentForm->getValue("x_Heating_Cleaned");
		if (!$this->Heating_Cleaned->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Heating_Cleaned->Visible = FALSE; // Disable update for API request
			else
				$this->Heating_Cleaned->setFormValue($val);
		}

		// Check field name 'Createdby' first before field var 'x_Createdby'
		$val = $CurrentForm->hasValue("Createdby") ? $CurrentForm->getValue("Createdby") : $CurrentForm->getValue("x_Createdby");
		if (!$this->Createdby->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Createdby->Visible = FALSE; // Disable update for API request
			else
				$this->Createdby->setFormValue($val);
		}

		// Check field name 'CreatedDate' first before field var 'x_CreatedDate'
		$val = $CurrentForm->hasValue("CreatedDate") ? $CurrentForm->getValue("CreatedDate") : $CurrentForm->getValue("x_CreatedDate");
		if (!$this->CreatedDate->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->CreatedDate->Visible = FALSE; // Disable update for API request
			else
				$this->CreatedDate->setFormValue($val);
			$this->CreatedDate->CurrentValue = UnFormatDateTime($this->CreatedDate->CurrentValue, 0);
		}

		// Check field name 'id' first before field var 'x_id'
		$val = $CurrentForm->hasValue("id") ? $CurrentForm->getValue("id") : $CurrentForm->getValue("x_id");
	}

	// Restore form values
	public function restoreFormValues()
	{
		global $CurrentForm;
		$this->Date->CurrentValue = $this->Date->FormValue;
		$this->Date->CurrentValue = UnFormatDateTime($this->Date->CurrentValue, 0);
		$this->LN2_Level->CurrentValue = $this->LN2_Level->FormValue;
		$this->LN2_Checked->CurrentValue = $this->LN2_Checked->FormValue;
		$this->Incubator_Temp->CurrentValue = $this->Incubator_Temp->FormValue;
		$this->Incubator_Cleaned->CurrentValue = $this->Incubator_Cleaned->FormValue;
		$this->LAF_MG->CurrentValue = $this->LAF_MG->FormValue;
		$this->LAF_Cleaned->CurrentValue = $this->LAF_Cleaned->FormValue;
		$this->REF_Temp->CurrentValue = $this->REF_Temp->FormValue;
		$this->REF_Cleaned->CurrentValue = $this->REF_Cleaned->FormValue;
		$this->Heating_Temp->CurrentValue = $this->Heating_Temp->FormValue;
		$this->Heating_Cleaned->CurrentValue = $this->Heating_Cleaned->FormValue;
		$this->Createdby->CurrentValue = $this->Createdby->FormValue;
		$this->CreatedDate->CurrentValue = $this->CreatedDate->FormValue;
		$this->CreatedDate->CurrentValue = UnFormatDateTime($this->CreatedDate->CurrentValue, 0);
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
		$this->Date->setDbValue($row['Date']);
		$this->LN2_Level->setDbValue($row['LN2_Level']);
		$this->LN2_Checked->setDbValue($row['LN2_Checked']);
		$this->Incubator_Temp->setDbValue($row['Incubator_Temp']);
		$this->Incubator_Cleaned->setDbValue($row['Incubator_Cleaned']);
		$this->LAF_MG->setDbValue($row['LAF_MG']);
		$this->LAF_Cleaned->setDbValue($row['LAF_Cleaned']);
		$this->REF_Temp->setDbValue($row['REF_Temp']);
		$this->REF_Cleaned->setDbValue($row['REF_Cleaned']);
		$this->Heating_Temp->setDbValue($row['Heating_Temp']);
		$this->Heating_Cleaned->setDbValue($row['Heating_Cleaned']);
		$this->Createdby->setDbValue($row['Createdby']);
		$this->CreatedDate->setDbValue($row['CreatedDate']);
	}

	// Return a row with default values
	protected function newRow()
	{
		$this->loadDefaultValues();
		$row = [];
		$row['id'] = $this->id->CurrentValue;
		$row['Date'] = $this->Date->CurrentValue;
		$row['LN2_Level'] = $this->LN2_Level->CurrentValue;
		$row['LN2_Checked'] = $this->LN2_Checked->CurrentValue;
		$row['Incubator_Temp'] = $this->Incubator_Temp->CurrentValue;
		$row['Incubator_Cleaned'] = $this->Incubator_Cleaned->CurrentValue;
		$row['LAF_MG'] = $this->LAF_MG->CurrentValue;
		$row['LAF_Cleaned'] = $this->LAF_Cleaned->CurrentValue;
		$row['REF_Temp'] = $this->REF_Temp->CurrentValue;
		$row['REF_Cleaned'] = $this->REF_Cleaned->CurrentValue;
		$row['Heating_Temp'] = $this->Heating_Temp->CurrentValue;
		$row['Heating_Cleaned'] = $this->Heating_Cleaned->CurrentValue;
		$row['Createdby'] = $this->Createdby->CurrentValue;
		$row['CreatedDate'] = $this->CreatedDate->CurrentValue;
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
		// Convert decimal values if posted back

		if ($this->LN2_Level->FormValue == $this->LN2_Level->CurrentValue && is_numeric(ConvertToFloatString($this->LN2_Level->CurrentValue)))
			$this->LN2_Level->CurrentValue = ConvertToFloatString($this->LN2_Level->CurrentValue);

		// Convert decimal values if posted back
		if ($this->Incubator_Temp->FormValue == $this->Incubator_Temp->CurrentValue && is_numeric(ConvertToFloatString($this->Incubator_Temp->CurrentValue)))
			$this->Incubator_Temp->CurrentValue = ConvertToFloatString($this->Incubator_Temp->CurrentValue);

		// Convert decimal values if posted back
		if ($this->LAF_MG->FormValue == $this->LAF_MG->CurrentValue && is_numeric(ConvertToFloatString($this->LAF_MG->CurrentValue)))
			$this->LAF_MG->CurrentValue = ConvertToFloatString($this->LAF_MG->CurrentValue);

		// Convert decimal values if posted back
		if ($this->REF_Temp->FormValue == $this->REF_Temp->CurrentValue && is_numeric(ConvertToFloatString($this->REF_Temp->CurrentValue)))
			$this->REF_Temp->CurrentValue = ConvertToFloatString($this->REF_Temp->CurrentValue);

		// Convert decimal values if posted back
		if ($this->Heating_Temp->FormValue == $this->Heating_Temp->CurrentValue && is_numeric(ConvertToFloatString($this->Heating_Temp->CurrentValue)))
			$this->Heating_Temp->CurrentValue = ConvertToFloatString($this->Heating_Temp->CurrentValue);

		// Call Row_Rendering event
		$this->Row_Rendering();

		// Common render codes for all row types
		// id
		// Date
		// LN2_Level
		// LN2_Checked
		// Incubator_Temp
		// Incubator_Cleaned
		// LAF_MG
		// LAF_Cleaned
		// REF_Temp
		// REF_Cleaned
		// Heating_Temp
		// Heating_Cleaned
		// Createdby
		// CreatedDate

		if ($this->RowType == ROWTYPE_VIEW) { // View row

			// id
			$this->id->ViewValue = $this->id->CurrentValue;
			$this->id->ViewCustomAttributes = "";

			// Date
			$this->Date->ViewValue = $this->Date->CurrentValue;
			$this->Date->ViewValue = FormatDateTime($this->Date->ViewValue, 0);
			$this->Date->ViewCustomAttributes = "";

			// LN2_Level
			$this->LN2_Level->ViewValue = $this->LN2_Level->CurrentValue;
			$this->LN2_Level->ViewValue = FormatNumber($this->LN2_Level->ViewValue, 2, -2, -2, -2);
			$this->LN2_Level->ViewCustomAttributes = "";

			// LN2_Checked
			if (strval($this->LN2_Checked->CurrentValue) <> "") {
				$this->LN2_Checked->ViewValue = new OptionValues();
				$arwrk = explode(",", strval($this->LN2_Checked->CurrentValue));
				$cnt = count($arwrk);
				for ($ari = 0; $ari < $cnt; $ari++)
					$this->LN2_Checked->ViewValue->add($this->LN2_Checked->optionCaption(trim($arwrk[$ari])));
			} else {
				$this->LN2_Checked->ViewValue = NULL;
			}
			$this->LN2_Checked->ViewCustomAttributes = "";

			// Incubator_Temp
			$this->Incubator_Temp->ViewValue = $this->Incubator_Temp->CurrentValue;
			$this->Incubator_Temp->ViewValue = FormatNumber($this->Incubator_Temp->ViewValue, 2, -2, -2, -2);
			$this->Incubator_Temp->ViewCustomAttributes = "";

			// Incubator_Cleaned
			if (strval($this->Incubator_Cleaned->CurrentValue) <> "") {
				$this->Incubator_Cleaned->ViewValue = new OptionValues();
				$arwrk = explode(",", strval($this->Incubator_Cleaned->CurrentValue));
				$cnt = count($arwrk);
				for ($ari = 0; $ari < $cnt; $ari++)
					$this->Incubator_Cleaned->ViewValue->add($this->Incubator_Cleaned->optionCaption(trim($arwrk[$ari])));
			} else {
				$this->Incubator_Cleaned->ViewValue = NULL;
			}
			$this->Incubator_Cleaned->ViewCustomAttributes = "";

			// LAF_MG
			$this->LAF_MG->ViewValue = $this->LAF_MG->CurrentValue;
			$this->LAF_MG->ViewValue = FormatNumber($this->LAF_MG->ViewValue, 2, -2, -2, -2);
			$this->LAF_MG->ViewCustomAttributes = "";

			// LAF_Cleaned
			if (strval($this->LAF_Cleaned->CurrentValue) <> "") {
				$this->LAF_Cleaned->ViewValue = new OptionValues();
				$arwrk = explode(",", strval($this->LAF_Cleaned->CurrentValue));
				$cnt = count($arwrk);
				for ($ari = 0; $ari < $cnt; $ari++)
					$this->LAF_Cleaned->ViewValue->add($this->LAF_Cleaned->optionCaption(trim($arwrk[$ari])));
			} else {
				$this->LAF_Cleaned->ViewValue = NULL;
			}
			$this->LAF_Cleaned->ViewCustomAttributes = "";

			// REF_Temp
			$this->REF_Temp->ViewValue = $this->REF_Temp->CurrentValue;
			$this->REF_Temp->ViewValue = FormatNumber($this->REF_Temp->ViewValue, 2, -2, -2, -2);
			$this->REF_Temp->ViewCustomAttributes = "";

			// REF_Cleaned
			if (strval($this->REF_Cleaned->CurrentValue) <> "") {
				$this->REF_Cleaned->ViewValue = new OptionValues();
				$arwrk = explode(",", strval($this->REF_Cleaned->CurrentValue));
				$cnt = count($arwrk);
				for ($ari = 0; $ari < $cnt; $ari++)
					$this->REF_Cleaned->ViewValue->add($this->REF_Cleaned->optionCaption(trim($arwrk[$ari])));
			} else {
				$this->REF_Cleaned->ViewValue = NULL;
			}
			$this->REF_Cleaned->ViewCustomAttributes = "";

			// Heating_Temp
			$this->Heating_Temp->ViewValue = $this->Heating_Temp->CurrentValue;
			$this->Heating_Temp->ViewValue = FormatNumber($this->Heating_Temp->ViewValue, 2, -2, -2, -2);
			$this->Heating_Temp->ViewCustomAttributes = "";

			// Heating_Cleaned
			if (strval($this->Heating_Cleaned->CurrentValue) <> "") {
				$this->Heating_Cleaned->ViewValue = new OptionValues();
				$arwrk = explode(",", strval($this->Heating_Cleaned->CurrentValue));
				$cnt = count($arwrk);
				for ($ari = 0; $ari < $cnt; $ari++)
					$this->Heating_Cleaned->ViewValue->add($this->Heating_Cleaned->optionCaption(trim($arwrk[$ari])));
			} else {
				$this->Heating_Cleaned->ViewValue = NULL;
			}
			$this->Heating_Cleaned->ViewCustomAttributes = "";

			// Createdby
			$this->Createdby->ViewValue = $this->Createdby->CurrentValue;
			$this->Createdby->ViewCustomAttributes = "";

			// CreatedDate
			$this->CreatedDate->ViewValue = $this->CreatedDate->CurrentValue;
			$this->CreatedDate->ViewValue = FormatDateTime($this->CreatedDate->ViewValue, 0);
			$this->CreatedDate->ViewCustomAttributes = "";

			// Date
			$this->Date->LinkCustomAttributes = "";
			$this->Date->HrefValue = "";
			$this->Date->TooltipValue = "";

			// LN2_Level
			$this->LN2_Level->LinkCustomAttributes = "";
			$this->LN2_Level->HrefValue = "";
			$this->LN2_Level->TooltipValue = "";

			// LN2_Checked
			$this->LN2_Checked->LinkCustomAttributes = "";
			$this->LN2_Checked->HrefValue = "";
			$this->LN2_Checked->TooltipValue = "";

			// Incubator_Temp
			$this->Incubator_Temp->LinkCustomAttributes = "";
			$this->Incubator_Temp->HrefValue = "";
			$this->Incubator_Temp->TooltipValue = "";

			// Incubator_Cleaned
			$this->Incubator_Cleaned->LinkCustomAttributes = "";
			$this->Incubator_Cleaned->HrefValue = "";
			$this->Incubator_Cleaned->TooltipValue = "";

			// LAF_MG
			$this->LAF_MG->LinkCustomAttributes = "";
			$this->LAF_MG->HrefValue = "";
			$this->LAF_MG->TooltipValue = "";

			// LAF_Cleaned
			$this->LAF_Cleaned->LinkCustomAttributes = "";
			$this->LAF_Cleaned->HrefValue = "";
			$this->LAF_Cleaned->TooltipValue = "";

			// REF_Temp
			$this->REF_Temp->LinkCustomAttributes = "";
			$this->REF_Temp->HrefValue = "";
			$this->REF_Temp->TooltipValue = "";

			// REF_Cleaned
			$this->REF_Cleaned->LinkCustomAttributes = "";
			$this->REF_Cleaned->HrefValue = "";
			$this->REF_Cleaned->TooltipValue = "";

			// Heating_Temp
			$this->Heating_Temp->LinkCustomAttributes = "";
			$this->Heating_Temp->HrefValue = "";
			$this->Heating_Temp->TooltipValue = "";

			// Heating_Cleaned
			$this->Heating_Cleaned->LinkCustomAttributes = "";
			$this->Heating_Cleaned->HrefValue = "";
			$this->Heating_Cleaned->TooltipValue = "";

			// Createdby
			$this->Createdby->LinkCustomAttributes = "";
			$this->Createdby->HrefValue = "";
			$this->Createdby->TooltipValue = "";

			// CreatedDate
			$this->CreatedDate->LinkCustomAttributes = "";
			$this->CreatedDate->HrefValue = "";
			$this->CreatedDate->TooltipValue = "";
		} elseif ($this->RowType == ROWTYPE_ADD) { // Add row

			// Date
			$this->Date->EditAttrs["class"] = "form-control";
			$this->Date->EditCustomAttributes = "";
			$this->Date->EditValue = HtmlEncode(FormatDateTime($this->Date->CurrentValue, 8));
			$this->Date->PlaceHolder = RemoveHtml($this->Date->caption());

			// LN2_Level
			$this->LN2_Level->EditAttrs["class"] = "form-control";
			$this->LN2_Level->EditCustomAttributes = "";
			$this->LN2_Level->EditValue = HtmlEncode($this->LN2_Level->CurrentValue);
			$this->LN2_Level->PlaceHolder = RemoveHtml($this->LN2_Level->caption());
			if (strval($this->LN2_Level->EditValue) <> "" && is_numeric($this->LN2_Level->EditValue))
				$this->LN2_Level->EditValue = FormatNumber($this->LN2_Level->EditValue, -2, -2, -2, -2);

			// LN2_Checked
			$this->LN2_Checked->EditCustomAttributes = "";
			$this->LN2_Checked->EditValue = $this->LN2_Checked->options(FALSE);

			// Incubator_Temp
			$this->Incubator_Temp->EditAttrs["class"] = "form-control";
			$this->Incubator_Temp->EditCustomAttributes = "";
			$this->Incubator_Temp->EditValue = HtmlEncode($this->Incubator_Temp->CurrentValue);
			$this->Incubator_Temp->PlaceHolder = RemoveHtml($this->Incubator_Temp->caption());
			if (strval($this->Incubator_Temp->EditValue) <> "" && is_numeric($this->Incubator_Temp->EditValue))
				$this->Incubator_Temp->EditValue = FormatNumber($this->Incubator_Temp->EditValue, -2, -2, -2, -2);

			// Incubator_Cleaned
			$this->Incubator_Cleaned->EditCustomAttributes = "";
			$this->Incubator_Cleaned->EditValue = $this->Incubator_Cleaned->options(FALSE);

			// LAF_MG
			$this->LAF_MG->EditAttrs["class"] = "form-control";
			$this->LAF_MG->EditCustomAttributes = "";
			$this->LAF_MG->EditValue = HtmlEncode($this->LAF_MG->CurrentValue);
			$this->LAF_MG->PlaceHolder = RemoveHtml($this->LAF_MG->caption());
			if (strval($this->LAF_MG->EditValue) <> "" && is_numeric($this->LAF_MG->EditValue))
				$this->LAF_MG->EditValue = FormatNumber($this->LAF_MG->EditValue, -2, -2, -2, -2);

			// LAF_Cleaned
			$this->LAF_Cleaned->EditCustomAttributes = "";
			$this->LAF_Cleaned->EditValue = $this->LAF_Cleaned->options(FALSE);

			// REF_Temp
			$this->REF_Temp->EditAttrs["class"] = "form-control";
			$this->REF_Temp->EditCustomAttributes = "";
			$this->REF_Temp->EditValue = HtmlEncode($this->REF_Temp->CurrentValue);
			$this->REF_Temp->PlaceHolder = RemoveHtml($this->REF_Temp->caption());
			if (strval($this->REF_Temp->EditValue) <> "" && is_numeric($this->REF_Temp->EditValue))
				$this->REF_Temp->EditValue = FormatNumber($this->REF_Temp->EditValue, -2, -2, -2, -2);

			// REF_Cleaned
			$this->REF_Cleaned->EditCustomAttributes = "";
			$this->REF_Cleaned->EditValue = $this->REF_Cleaned->options(FALSE);

			// Heating_Temp
			$this->Heating_Temp->EditAttrs["class"] = "form-control";
			$this->Heating_Temp->EditCustomAttributes = "";
			$this->Heating_Temp->EditValue = HtmlEncode($this->Heating_Temp->CurrentValue);
			$this->Heating_Temp->PlaceHolder = RemoveHtml($this->Heating_Temp->caption());
			if (strval($this->Heating_Temp->EditValue) <> "" && is_numeric($this->Heating_Temp->EditValue))
				$this->Heating_Temp->EditValue = FormatNumber($this->Heating_Temp->EditValue, -2, -2, -2, -2);

			// Heating_Cleaned
			$this->Heating_Cleaned->EditCustomAttributes = "";
			$this->Heating_Cleaned->EditValue = $this->Heating_Cleaned->options(FALSE);

			// Createdby
			// CreatedDate
			// Add refer script
			// Date

			$this->Date->LinkCustomAttributes = "";
			$this->Date->HrefValue = "";

			// LN2_Level
			$this->LN2_Level->LinkCustomAttributes = "";
			$this->LN2_Level->HrefValue = "";

			// LN2_Checked
			$this->LN2_Checked->LinkCustomAttributes = "";
			$this->LN2_Checked->HrefValue = "";

			// Incubator_Temp
			$this->Incubator_Temp->LinkCustomAttributes = "";
			$this->Incubator_Temp->HrefValue = "";

			// Incubator_Cleaned
			$this->Incubator_Cleaned->LinkCustomAttributes = "";
			$this->Incubator_Cleaned->HrefValue = "";

			// LAF_MG
			$this->LAF_MG->LinkCustomAttributes = "";
			$this->LAF_MG->HrefValue = "";

			// LAF_Cleaned
			$this->LAF_Cleaned->LinkCustomAttributes = "";
			$this->LAF_Cleaned->HrefValue = "";

			// REF_Temp
			$this->REF_Temp->LinkCustomAttributes = "";
			$this->REF_Temp->HrefValue = "";

			// REF_Cleaned
			$this->REF_Cleaned->LinkCustomAttributes = "";
			$this->REF_Cleaned->HrefValue = "";

			// Heating_Temp
			$this->Heating_Temp->LinkCustomAttributes = "";
			$this->Heating_Temp->HrefValue = "";

			// Heating_Cleaned
			$this->Heating_Cleaned->LinkCustomAttributes = "";
			$this->Heating_Cleaned->HrefValue = "";

			// Createdby
			$this->Createdby->LinkCustomAttributes = "";
			$this->Createdby->HrefValue = "";

			// CreatedDate
			$this->CreatedDate->LinkCustomAttributes = "";
			$this->CreatedDate->HrefValue = "";
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
		if ($this->Date->Required) {
			if (!$this->Date->IsDetailKey && $this->Date->FormValue != NULL && $this->Date->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Date->caption(), $this->Date->RequiredErrorMessage));
			}
		}
		if (!CheckDate($this->Date->FormValue)) {
			AddMessage($FormError, $this->Date->errorMessage());
		}
		if ($this->LN2_Level->Required) {
			if (!$this->LN2_Level->IsDetailKey && $this->LN2_Level->FormValue != NULL && $this->LN2_Level->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->LN2_Level->caption(), $this->LN2_Level->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->LN2_Level->FormValue)) {
			AddMessage($FormError, $this->LN2_Level->errorMessage());
		}
		if ($this->LN2_Checked->Required) {
			if ($this->LN2_Checked->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->LN2_Checked->caption(), $this->LN2_Checked->RequiredErrorMessage));
			}
		}
		if ($this->Incubator_Temp->Required) {
			if (!$this->Incubator_Temp->IsDetailKey && $this->Incubator_Temp->FormValue != NULL && $this->Incubator_Temp->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Incubator_Temp->caption(), $this->Incubator_Temp->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->Incubator_Temp->FormValue)) {
			AddMessage($FormError, $this->Incubator_Temp->errorMessage());
		}
		if ($this->Incubator_Cleaned->Required) {
			if ($this->Incubator_Cleaned->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Incubator_Cleaned->caption(), $this->Incubator_Cleaned->RequiredErrorMessage));
			}
		}
		if ($this->LAF_MG->Required) {
			if (!$this->LAF_MG->IsDetailKey && $this->LAF_MG->FormValue != NULL && $this->LAF_MG->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->LAF_MG->caption(), $this->LAF_MG->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->LAF_MG->FormValue)) {
			AddMessage($FormError, $this->LAF_MG->errorMessage());
		}
		if ($this->LAF_Cleaned->Required) {
			if ($this->LAF_Cleaned->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->LAF_Cleaned->caption(), $this->LAF_Cleaned->RequiredErrorMessage));
			}
		}
		if ($this->REF_Temp->Required) {
			if (!$this->REF_Temp->IsDetailKey && $this->REF_Temp->FormValue != NULL && $this->REF_Temp->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->REF_Temp->caption(), $this->REF_Temp->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->REF_Temp->FormValue)) {
			AddMessage($FormError, $this->REF_Temp->errorMessage());
		}
		if ($this->REF_Cleaned->Required) {
			if ($this->REF_Cleaned->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->REF_Cleaned->caption(), $this->REF_Cleaned->RequiredErrorMessage));
			}
		}
		if ($this->Heating_Temp->Required) {
			if (!$this->Heating_Temp->IsDetailKey && $this->Heating_Temp->FormValue != NULL && $this->Heating_Temp->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Heating_Temp->caption(), $this->Heating_Temp->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->Heating_Temp->FormValue)) {
			AddMessage($FormError, $this->Heating_Temp->errorMessage());
		}
		if ($this->Heating_Cleaned->Required) {
			if ($this->Heating_Cleaned->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Heating_Cleaned->caption(), $this->Heating_Cleaned->RequiredErrorMessage));
			}
		}
		if ($this->Createdby->Required) {
			if (!$this->Createdby->IsDetailKey && $this->Createdby->FormValue != NULL && $this->Createdby->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Createdby->caption(), $this->Createdby->RequiredErrorMessage));
			}
		}
		if ($this->CreatedDate->Required) {
			if (!$this->CreatedDate->IsDetailKey && $this->CreatedDate->FormValue != NULL && $this->CreatedDate->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->CreatedDate->caption(), $this->CreatedDate->RequiredErrorMessage));
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

		// Date
		$this->Date->setDbValueDef($rsnew, UnFormatDateTime($this->Date->CurrentValue, 0), CurrentDate(), FALSE);

		// LN2_Level
		$this->LN2_Level->setDbValueDef($rsnew, $this->LN2_Level->CurrentValue, NULL, FALSE);

		// LN2_Checked
		$this->LN2_Checked->setDbValueDef($rsnew, $this->LN2_Checked->CurrentValue, NULL, FALSE);

		// Incubator_Temp
		$this->Incubator_Temp->setDbValueDef($rsnew, $this->Incubator_Temp->CurrentValue, NULL, FALSE);

		// Incubator_Cleaned
		$this->Incubator_Cleaned->setDbValueDef($rsnew, $this->Incubator_Cleaned->CurrentValue, NULL, FALSE);

		// LAF_MG
		$this->LAF_MG->setDbValueDef($rsnew, $this->LAF_MG->CurrentValue, NULL, FALSE);

		// LAF_Cleaned
		$this->LAF_Cleaned->setDbValueDef($rsnew, $this->LAF_Cleaned->CurrentValue, NULL, FALSE);

		// REF_Temp
		$this->REF_Temp->setDbValueDef($rsnew, $this->REF_Temp->CurrentValue, NULL, FALSE);

		// REF_Cleaned
		$this->REF_Cleaned->setDbValueDef($rsnew, $this->REF_Cleaned->CurrentValue, NULL, FALSE);

		// Heating_Temp
		$this->Heating_Temp->setDbValueDef($rsnew, $this->Heating_Temp->CurrentValue, 0, FALSE);

		// Heating_Cleaned
		$this->Heating_Cleaned->setDbValueDef($rsnew, $this->Heating_Cleaned->CurrentValue, NULL, FALSE);

		// Createdby
		$this->Createdby->setDbValueDef($rsnew, CurrentUserName(), NULL);
		$rsnew['Createdby'] = &$this->Createdby->DbValue;

		// CreatedDate
		$this->CreatedDate->setDbValueDef($rsnew, CurrentDateTime(), NULL);
		$rsnew['CreatedDate'] = &$this->CreatedDate->DbValue;

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
		$Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("qaqcrecord_andrologylist.php"), "", $this->TableVar, TRUE);
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
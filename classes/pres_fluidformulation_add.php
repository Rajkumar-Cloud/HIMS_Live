<?php
namespace PHPMaker2019\HIMS;

/**
 * Page class
 */
class pres_fluidformulation_add extends pres_fluidformulation
{

	// Page ID
	public $PageID = "add";

	// Project ID
	public $ProjectID = "{EA4F6D13-AF8F-428D-9EA7-BA88D1107EC3}";

	// Table name
	public $TableName = 'pres_fluidformulation';

	// Page object name
	public $PageObjName = "pres_fluidformulation_add";

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

		// Table object (pres_fluidformulation)
		if (!isset($GLOBALS["pres_fluidformulation"]) || get_class($GLOBALS["pres_fluidformulation"]) == PROJECT_NAMESPACE . "pres_fluidformulation") {
			$GLOBALS["pres_fluidformulation"] = &$this;
			$GLOBALS["Table"] = &$GLOBALS["pres_fluidformulation"];
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
			define(PROJECT_NAMESPACE . "TABLE_NAME", 'pres_fluidformulation');

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
		global $EXPORT, $pres_fluidformulation;
		if ($this->CustomExport && $this->CustomExport == $this->Export && array_key_exists($this->CustomExport, $EXPORT)) {
				$content = ob_get_contents();
			if ($ExportFileName == "")
				$ExportFileName = $this->TableVar;
			$class = PROJECT_NAMESPACE . $EXPORT[$this->CustomExport];
			if (class_exists($class)) {
				$doc = new $class($pres_fluidformulation);
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
					if ($pageName == "pres_fluidformulationview.php")
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
					$this->terminate(GetUrl("pres_fluidformulationlist.php"));
				else
					$this->terminate(GetUrl("login.php"));
				return;
			}
		}

		// Create form object
		$CurrentForm = new HttpForm();
		$this->CurrentAction = Param("action"); // Set up current action
		$this->id->Visible = FALSE;
		$this->Tradename->setVisibility();
		$this->Itemcode->setVisibility();
		$this->Genericname->setVisibility();
		$this->Volume->setVisibility();
		$this->VolumeUnit->setVisibility();
		$this->Strength->setVisibility();
		$this->StrengthUnit->setVisibility();
		$this->_Route->setVisibility();
		$this->Forms->setVisibility();
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
					$this->terminate("pres_fluidformulationlist.php"); // No matching record, return to list
				}
				break;
			case "insert": // Add new record
				$this->SendEmail = TRUE; // Send email on add success
				if ($this->addRow($this->OldRecordset)) { // Add successful
					if ($this->getSuccessMessage() == "")
						$this->setSuccessMessage($Language->phrase("AddSuccess")); // Set up success message
					$returnUrl = $this->getReturnUrl();
					if (GetPageName($returnUrl) == "pres_fluidformulationlist.php")
						$returnUrl = $this->addMasterUrl($returnUrl); // List page, return to List page with correct master key if necessary
					elseif (GetPageName($returnUrl) == "pres_fluidformulationview.php")
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
		$this->Tradename->CurrentValue = NULL;
		$this->Tradename->OldValue = $this->Tradename->CurrentValue;
		$this->Itemcode->CurrentValue = NULL;
		$this->Itemcode->OldValue = $this->Itemcode->CurrentValue;
		$this->Genericname->CurrentValue = NULL;
		$this->Genericname->OldValue = $this->Genericname->CurrentValue;
		$this->Volume->CurrentValue = NULL;
		$this->Volume->OldValue = $this->Volume->CurrentValue;
		$this->VolumeUnit->CurrentValue = NULL;
		$this->VolumeUnit->OldValue = $this->VolumeUnit->CurrentValue;
		$this->Strength->CurrentValue = NULL;
		$this->Strength->OldValue = $this->Strength->CurrentValue;
		$this->StrengthUnit->CurrentValue = NULL;
		$this->StrengthUnit->OldValue = $this->StrengthUnit->CurrentValue;
		$this->_Route->CurrentValue = NULL;
		$this->_Route->OldValue = $this->_Route->CurrentValue;
		$this->Forms->CurrentValue = NULL;
		$this->Forms->OldValue = $this->Forms->CurrentValue;
	}

	// Load form values
	protected function loadFormValues()
	{

		// Load from form
		global $CurrentForm;

		// Check field name 'Tradename' first before field var 'x_Tradename'
		$val = $CurrentForm->hasValue("Tradename") ? $CurrentForm->getValue("Tradename") : $CurrentForm->getValue("x_Tradename");
		if (!$this->Tradename->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Tradename->Visible = FALSE; // Disable update for API request
			else
				$this->Tradename->setFormValue($val);
		}

		// Check field name 'Itemcode' first before field var 'x_Itemcode'
		$val = $CurrentForm->hasValue("Itemcode") ? $CurrentForm->getValue("Itemcode") : $CurrentForm->getValue("x_Itemcode");
		if (!$this->Itemcode->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Itemcode->Visible = FALSE; // Disable update for API request
			else
				$this->Itemcode->setFormValue($val);
		}

		// Check field name 'Genericname' first before field var 'x_Genericname'
		$val = $CurrentForm->hasValue("Genericname") ? $CurrentForm->getValue("Genericname") : $CurrentForm->getValue("x_Genericname");
		if (!$this->Genericname->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Genericname->Visible = FALSE; // Disable update for API request
			else
				$this->Genericname->setFormValue($val);
		}

		// Check field name 'Volume' first before field var 'x_Volume'
		$val = $CurrentForm->hasValue("Volume") ? $CurrentForm->getValue("Volume") : $CurrentForm->getValue("x_Volume");
		if (!$this->Volume->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Volume->Visible = FALSE; // Disable update for API request
			else
				$this->Volume->setFormValue($val);
		}

		// Check field name 'VolumeUnit' first before field var 'x_VolumeUnit'
		$val = $CurrentForm->hasValue("VolumeUnit") ? $CurrentForm->getValue("VolumeUnit") : $CurrentForm->getValue("x_VolumeUnit");
		if (!$this->VolumeUnit->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->VolumeUnit->Visible = FALSE; // Disable update for API request
			else
				$this->VolumeUnit->setFormValue($val);
		}

		// Check field name 'Strength' first before field var 'x_Strength'
		$val = $CurrentForm->hasValue("Strength") ? $CurrentForm->getValue("Strength") : $CurrentForm->getValue("x_Strength");
		if (!$this->Strength->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Strength->Visible = FALSE; // Disable update for API request
			else
				$this->Strength->setFormValue($val);
		}

		// Check field name 'StrengthUnit' first before field var 'x_StrengthUnit'
		$val = $CurrentForm->hasValue("StrengthUnit") ? $CurrentForm->getValue("StrengthUnit") : $CurrentForm->getValue("x_StrengthUnit");
		if (!$this->StrengthUnit->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->StrengthUnit->Visible = FALSE; // Disable update for API request
			else
				$this->StrengthUnit->setFormValue($val);
		}

		// Check field name 'Route' first before field var 'x__Route'
		$val = $CurrentForm->hasValue("Route") ? $CurrentForm->getValue("Route") : $CurrentForm->getValue("x__Route");
		if (!$this->_Route->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->_Route->Visible = FALSE; // Disable update for API request
			else
				$this->_Route->setFormValue($val);
		}

		// Check field name 'Forms' first before field var 'x_Forms'
		$val = $CurrentForm->hasValue("Forms") ? $CurrentForm->getValue("Forms") : $CurrentForm->getValue("x_Forms");
		if (!$this->Forms->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Forms->Visible = FALSE; // Disable update for API request
			else
				$this->Forms->setFormValue($val);
		}

		// Check field name 'id' first before field var 'x_id'
		$val = $CurrentForm->hasValue("id") ? $CurrentForm->getValue("id") : $CurrentForm->getValue("x_id");
	}

	// Restore form values
	public function restoreFormValues()
	{
		global $CurrentForm;
		$this->Tradename->CurrentValue = $this->Tradename->FormValue;
		$this->Itemcode->CurrentValue = $this->Itemcode->FormValue;
		$this->Genericname->CurrentValue = $this->Genericname->FormValue;
		$this->Volume->CurrentValue = $this->Volume->FormValue;
		$this->VolumeUnit->CurrentValue = $this->VolumeUnit->FormValue;
		$this->Strength->CurrentValue = $this->Strength->FormValue;
		$this->StrengthUnit->CurrentValue = $this->StrengthUnit->FormValue;
		$this->_Route->CurrentValue = $this->_Route->FormValue;
		$this->Forms->CurrentValue = $this->Forms->FormValue;
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
		$this->Tradename->setDbValue($row['Tradename']);
		$this->Itemcode->setDbValue($row['Itemcode']);
		$this->Genericname->setDbValue($row['Genericname']);
		$this->Volume->setDbValue($row['Volume']);
		$this->VolumeUnit->setDbValue($row['VolumeUnit']);
		$this->Strength->setDbValue($row['Strength']);
		$this->StrengthUnit->setDbValue($row['StrengthUnit']);
		$this->_Route->setDbValue($row['Route']);
		$this->Forms->setDbValue($row['Forms']);
	}

	// Return a row with default values
	protected function newRow()
	{
		$this->loadDefaultValues();
		$row = [];
		$row['id'] = $this->id->CurrentValue;
		$row['Tradename'] = $this->Tradename->CurrentValue;
		$row['Itemcode'] = $this->Itemcode->CurrentValue;
		$row['Genericname'] = $this->Genericname->CurrentValue;
		$row['Volume'] = $this->Volume->CurrentValue;
		$row['VolumeUnit'] = $this->VolumeUnit->CurrentValue;
		$row['Strength'] = $this->Strength->CurrentValue;
		$row['StrengthUnit'] = $this->StrengthUnit->CurrentValue;
		$row['Route'] = $this->_Route->CurrentValue;
		$row['Forms'] = $this->Forms->CurrentValue;
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

		if ($this->Volume->FormValue == $this->Volume->CurrentValue && is_numeric(ConvertToFloatString($this->Volume->CurrentValue)))
			$this->Volume->CurrentValue = ConvertToFloatString($this->Volume->CurrentValue);

		// Convert decimal values if posted back
		if ($this->Strength->FormValue == $this->Strength->CurrentValue && is_numeric(ConvertToFloatString($this->Strength->CurrentValue)))
			$this->Strength->CurrentValue = ConvertToFloatString($this->Strength->CurrentValue);

		// Call Row_Rendering event
		$this->Row_Rendering();

		// Common render codes for all row types
		// id
		// Tradename
		// Itemcode
		// Genericname
		// Volume
		// VolumeUnit
		// Strength
		// StrengthUnit
		// Route
		// Forms

		if ($this->RowType == ROWTYPE_VIEW) { // View row

			// id
			$this->id->ViewValue = $this->id->CurrentValue;
			$this->id->ViewCustomAttributes = "";

			// Tradename
			$this->Tradename->ViewValue = $this->Tradename->CurrentValue;
			$this->Tradename->ViewCustomAttributes = "";

			// Itemcode
			$this->Itemcode->ViewValue = $this->Itemcode->CurrentValue;
			$this->Itemcode->ViewCustomAttributes = "";

			// Genericname
			$this->Genericname->ViewValue = $this->Genericname->CurrentValue;
			$this->Genericname->ViewCustomAttributes = "";

			// Volume
			$this->Volume->ViewValue = $this->Volume->CurrentValue;
			$this->Volume->ViewValue = FormatNumber($this->Volume->ViewValue, 2, -2, -2, -2);
			$this->Volume->ViewCustomAttributes = "";

			// VolumeUnit
			$this->VolumeUnit->ViewValue = $this->VolumeUnit->CurrentValue;
			$this->VolumeUnit->ViewCustomAttributes = "";

			// Strength
			$this->Strength->ViewValue = $this->Strength->CurrentValue;
			$this->Strength->ViewValue = FormatNumber($this->Strength->ViewValue, 2, -2, -2, -2);
			$this->Strength->ViewCustomAttributes = "";

			// StrengthUnit
			$this->StrengthUnit->ViewValue = $this->StrengthUnit->CurrentValue;
			$this->StrengthUnit->ViewCustomAttributes = "";

			// Route
			$this->_Route->ViewValue = $this->_Route->CurrentValue;
			$this->_Route->ViewCustomAttributes = "";

			// Forms
			$this->Forms->ViewValue = $this->Forms->CurrentValue;
			$this->Forms->ViewCustomAttributes = "";

			// Tradename
			$this->Tradename->LinkCustomAttributes = "";
			$this->Tradename->HrefValue = "";
			$this->Tradename->TooltipValue = "";

			// Itemcode
			$this->Itemcode->LinkCustomAttributes = "";
			$this->Itemcode->HrefValue = "";
			$this->Itemcode->TooltipValue = "";

			// Genericname
			$this->Genericname->LinkCustomAttributes = "";
			$this->Genericname->HrefValue = "";
			$this->Genericname->TooltipValue = "";

			// Volume
			$this->Volume->LinkCustomAttributes = "";
			$this->Volume->HrefValue = "";
			$this->Volume->TooltipValue = "";

			// VolumeUnit
			$this->VolumeUnit->LinkCustomAttributes = "";
			$this->VolumeUnit->HrefValue = "";
			$this->VolumeUnit->TooltipValue = "";

			// Strength
			$this->Strength->LinkCustomAttributes = "";
			$this->Strength->HrefValue = "";
			$this->Strength->TooltipValue = "";

			// StrengthUnit
			$this->StrengthUnit->LinkCustomAttributes = "";
			$this->StrengthUnit->HrefValue = "";
			$this->StrengthUnit->TooltipValue = "";

			// Route
			$this->_Route->LinkCustomAttributes = "";
			$this->_Route->HrefValue = "";
			$this->_Route->TooltipValue = "";

			// Forms
			$this->Forms->LinkCustomAttributes = "";
			$this->Forms->HrefValue = "";
			$this->Forms->TooltipValue = "";
		} elseif ($this->RowType == ROWTYPE_ADD) { // Add row

			// Tradename
			$this->Tradename->EditAttrs["class"] = "form-control";
			$this->Tradename->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Tradename->CurrentValue = HtmlDecode($this->Tradename->CurrentValue);
			$this->Tradename->EditValue = HtmlEncode($this->Tradename->CurrentValue);
			$this->Tradename->PlaceHolder = RemoveHtml($this->Tradename->caption());

			// Itemcode
			$this->Itemcode->EditAttrs["class"] = "form-control";
			$this->Itemcode->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Itemcode->CurrentValue = HtmlDecode($this->Itemcode->CurrentValue);
			$this->Itemcode->EditValue = HtmlEncode($this->Itemcode->CurrentValue);
			$this->Itemcode->PlaceHolder = RemoveHtml($this->Itemcode->caption());

			// Genericname
			$this->Genericname->EditAttrs["class"] = "form-control";
			$this->Genericname->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Genericname->CurrentValue = HtmlDecode($this->Genericname->CurrentValue);
			$this->Genericname->EditValue = HtmlEncode($this->Genericname->CurrentValue);
			$this->Genericname->PlaceHolder = RemoveHtml($this->Genericname->caption());

			// Volume
			$this->Volume->EditAttrs["class"] = "form-control";
			$this->Volume->EditCustomAttributes = "";
			$this->Volume->EditValue = HtmlEncode($this->Volume->CurrentValue);
			$this->Volume->PlaceHolder = RemoveHtml($this->Volume->caption());
			if (strval($this->Volume->EditValue) <> "" && is_numeric($this->Volume->EditValue))
				$this->Volume->EditValue = FormatNumber($this->Volume->EditValue, -2, -2, -2, -2);

			// VolumeUnit
			$this->VolumeUnit->EditAttrs["class"] = "form-control";
			$this->VolumeUnit->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->VolumeUnit->CurrentValue = HtmlDecode($this->VolumeUnit->CurrentValue);
			$this->VolumeUnit->EditValue = HtmlEncode($this->VolumeUnit->CurrentValue);
			$this->VolumeUnit->PlaceHolder = RemoveHtml($this->VolumeUnit->caption());

			// Strength
			$this->Strength->EditAttrs["class"] = "form-control";
			$this->Strength->EditCustomAttributes = "";
			$this->Strength->EditValue = HtmlEncode($this->Strength->CurrentValue);
			$this->Strength->PlaceHolder = RemoveHtml($this->Strength->caption());
			if (strval($this->Strength->EditValue) <> "" && is_numeric($this->Strength->EditValue))
				$this->Strength->EditValue = FormatNumber($this->Strength->EditValue, -2, -2, -2, -2);

			// StrengthUnit
			$this->StrengthUnit->EditAttrs["class"] = "form-control";
			$this->StrengthUnit->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->StrengthUnit->CurrentValue = HtmlDecode($this->StrengthUnit->CurrentValue);
			$this->StrengthUnit->EditValue = HtmlEncode($this->StrengthUnit->CurrentValue);
			$this->StrengthUnit->PlaceHolder = RemoveHtml($this->StrengthUnit->caption());

			// Route
			$this->_Route->EditAttrs["class"] = "form-control";
			$this->_Route->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->_Route->CurrentValue = HtmlDecode($this->_Route->CurrentValue);
			$this->_Route->EditValue = HtmlEncode($this->_Route->CurrentValue);
			$this->_Route->PlaceHolder = RemoveHtml($this->_Route->caption());

			// Forms
			$this->Forms->EditAttrs["class"] = "form-control";
			$this->Forms->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Forms->CurrentValue = HtmlDecode($this->Forms->CurrentValue);
			$this->Forms->EditValue = HtmlEncode($this->Forms->CurrentValue);
			$this->Forms->PlaceHolder = RemoveHtml($this->Forms->caption());

			// Add refer script
			// Tradename

			$this->Tradename->LinkCustomAttributes = "";
			$this->Tradename->HrefValue = "";

			// Itemcode
			$this->Itemcode->LinkCustomAttributes = "";
			$this->Itemcode->HrefValue = "";

			// Genericname
			$this->Genericname->LinkCustomAttributes = "";
			$this->Genericname->HrefValue = "";

			// Volume
			$this->Volume->LinkCustomAttributes = "";
			$this->Volume->HrefValue = "";

			// VolumeUnit
			$this->VolumeUnit->LinkCustomAttributes = "";
			$this->VolumeUnit->HrefValue = "";

			// Strength
			$this->Strength->LinkCustomAttributes = "";
			$this->Strength->HrefValue = "";

			// StrengthUnit
			$this->StrengthUnit->LinkCustomAttributes = "";
			$this->StrengthUnit->HrefValue = "";

			// Route
			$this->_Route->LinkCustomAttributes = "";
			$this->_Route->HrefValue = "";

			// Forms
			$this->Forms->LinkCustomAttributes = "";
			$this->Forms->HrefValue = "";
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
		if ($this->Tradename->Required) {
			if (!$this->Tradename->IsDetailKey && $this->Tradename->FormValue != NULL && $this->Tradename->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Tradename->caption(), $this->Tradename->RequiredErrorMessage));
			}
		}
		if ($this->Itemcode->Required) {
			if (!$this->Itemcode->IsDetailKey && $this->Itemcode->FormValue != NULL && $this->Itemcode->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Itemcode->caption(), $this->Itemcode->RequiredErrorMessage));
			}
		}
		if ($this->Genericname->Required) {
			if (!$this->Genericname->IsDetailKey && $this->Genericname->FormValue != NULL && $this->Genericname->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Genericname->caption(), $this->Genericname->RequiredErrorMessage));
			}
		}
		if ($this->Volume->Required) {
			if (!$this->Volume->IsDetailKey && $this->Volume->FormValue != NULL && $this->Volume->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Volume->caption(), $this->Volume->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->Volume->FormValue)) {
			AddMessage($FormError, $this->Volume->errorMessage());
		}
		if ($this->VolumeUnit->Required) {
			if (!$this->VolumeUnit->IsDetailKey && $this->VolumeUnit->FormValue != NULL && $this->VolumeUnit->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->VolumeUnit->caption(), $this->VolumeUnit->RequiredErrorMessage));
			}
		}
		if ($this->Strength->Required) {
			if (!$this->Strength->IsDetailKey && $this->Strength->FormValue != NULL && $this->Strength->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Strength->caption(), $this->Strength->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->Strength->FormValue)) {
			AddMessage($FormError, $this->Strength->errorMessage());
		}
		if ($this->StrengthUnit->Required) {
			if (!$this->StrengthUnit->IsDetailKey && $this->StrengthUnit->FormValue != NULL && $this->StrengthUnit->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->StrengthUnit->caption(), $this->StrengthUnit->RequiredErrorMessage));
			}
		}
		if ($this->_Route->Required) {
			if (!$this->_Route->IsDetailKey && $this->_Route->FormValue != NULL && $this->_Route->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->_Route->caption(), $this->_Route->RequiredErrorMessage));
			}
		}
		if ($this->Forms->Required) {
			if (!$this->Forms->IsDetailKey && $this->Forms->FormValue != NULL && $this->Forms->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Forms->caption(), $this->Forms->RequiredErrorMessage));
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

		// Tradename
		$this->Tradename->setDbValueDef($rsnew, $this->Tradename->CurrentValue, NULL, FALSE);

		// Itemcode
		$this->Itemcode->setDbValueDef($rsnew, $this->Itemcode->CurrentValue, NULL, FALSE);

		// Genericname
		$this->Genericname->setDbValueDef($rsnew, $this->Genericname->CurrentValue, NULL, FALSE);

		// Volume
		$this->Volume->setDbValueDef($rsnew, $this->Volume->CurrentValue, NULL, FALSE);

		// VolumeUnit
		$this->VolumeUnit->setDbValueDef($rsnew, $this->VolumeUnit->CurrentValue, NULL, FALSE);

		// Strength
		$this->Strength->setDbValueDef($rsnew, $this->Strength->CurrentValue, NULL, FALSE);

		// StrengthUnit
		$this->StrengthUnit->setDbValueDef($rsnew, $this->StrengthUnit->CurrentValue, NULL, FALSE);

		// Route
		$this->_Route->setDbValueDef($rsnew, $this->_Route->CurrentValue, NULL, FALSE);

		// Forms
		$this->Forms->setDbValueDef($rsnew, $this->Forms->CurrentValue, NULL, FALSE);

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
		$Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("pres_fluidformulationlist.php"), "", $this->TableVar, TRUE);
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
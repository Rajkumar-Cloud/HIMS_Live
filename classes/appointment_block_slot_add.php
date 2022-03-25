<?php
namespace PHPMaker2019\HIMS;

/**
 * Page class
 */
class appointment_block_slot_add extends appointment_block_slot
{

	// Page ID
	public $PageID = "add";

	// Project ID
	public $ProjectID = "{EA4F6D13-AF8F-428D-9EA7-BA88D1107EC3}";

	// Table name
	public $TableName = 'appointment_block_slot';

	// Page object name
	public $PageObjName = "appointment_block_slot_add";

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

		// Table object (appointment_block_slot)
		if (!isset($GLOBALS["appointment_block_slot"]) || get_class($GLOBALS["appointment_block_slot"]) == PROJECT_NAMESPACE . "appointment_block_slot") {
			$GLOBALS["appointment_block_slot"] = &$this;
			$GLOBALS["Table"] = &$GLOBALS["appointment_block_slot"];
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
			define(PROJECT_NAMESPACE . "TABLE_NAME", 'appointment_block_slot');

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
		if (Post("customexport") === NULL) {

		// Page Unload event
		$this->Page_Unload();

		// Global Page Unloaded event (in userfn*.php)
		Page_Unloaded();
		}

		// Export
		global $EXPORT, $appointment_block_slot;
		if ($this->CustomExport && $this->CustomExport == $this->Export && array_key_exists($this->CustomExport, $EXPORT)) {
			if (is_array(@$_SESSION[SESSION_TEMP_IMAGES])) // Restore temp images
				$TempImages = @$_SESSION[SESSION_TEMP_IMAGES];
			if (Post("data") !== NULL)
				$content = Post("data");
			$ExportFileName = Post("filename", "");
			if ($ExportFileName == "")
				$ExportFileName = $this->TableVar;
			$class = PROJECT_NAMESPACE . $EXPORT[$this->CustomExport];
			if (class_exists($class)) {
				$doc = new $class($appointment_block_slot);
				$doc->Text = @$content;
				if ($this->isExport("email"))
					echo $this->exportEmail($doc->Text);
				else
					$doc->export();
				DeleteTempImages(); // Delete temp images
				exit();
			}
		}
	if ($this->CustomExport) { // Save temp images array for custom export
		if (is_array($TempImages))
			$_SESSION[SESSION_TEMP_IMAGES] = $TempImages;
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
					if ($pageName == "appointment_block_slotview.php")
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
					$this->terminate(GetUrl("appointment_block_slotlist.php"));
				else
					$this->terminate(GetUrl("login.php"));
				return;
			}
		}

		// Create form object
		$CurrentForm = new HttpForm();
		$this->CurrentAction = Param("action"); // Set up current action
		$this->id->Visible = FALSE;
		$this->Drid->setVisibility();
		$this->DrName->setVisibility();
		$this->Details->setVisibility();
		$this->BlockType->setVisibility();
		$this->FromDate->setVisibility();
		$this->ToDate->setVisibility();
		$this->FromTime->setVisibility();
		$this->ToTime->setVisibility();
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
					$this->terminate("appointment_block_slotlist.php"); // No matching record, return to list
				}
				break;
			case "insert": // Add new record
				$this->SendEmail = TRUE; // Send email on add success
				if ($this->addRow($this->OldRecordset)) { // Add successful
					if ($this->getSuccessMessage() == "")
						$this->setSuccessMessage($Language->phrase("AddSuccess")); // Set up success message
					$returnUrl = $this->getReturnUrl();
					if (GetPageName($returnUrl) == "appointment_block_slotlist.php")
						$returnUrl = $this->addMasterUrl($returnUrl); // List page, return to List page with correct master key if necessary
					elseif (GetPageName($returnUrl) == "appointment_block_slotview.php")
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
		$this->Drid->CurrentValue = NULL;
		$this->Drid->OldValue = $this->Drid->CurrentValue;
		$this->DrName->CurrentValue = NULL;
		$this->DrName->OldValue = $this->DrName->CurrentValue;
		$this->Details->CurrentValue = NULL;
		$this->Details->OldValue = $this->Details->CurrentValue;
		$this->BlockType->CurrentValue = NULL;
		$this->BlockType->OldValue = $this->BlockType->CurrentValue;
		$this->FromDate->CurrentValue = NULL;
		$this->FromDate->OldValue = $this->FromDate->CurrentValue;
		$this->ToDate->CurrentValue = NULL;
		$this->ToDate->OldValue = $this->ToDate->CurrentValue;
		$this->FromTime->CurrentValue = NULL;
		$this->FromTime->OldValue = $this->FromTime->CurrentValue;
		$this->ToTime->CurrentValue = NULL;
		$this->ToTime->OldValue = $this->ToTime->CurrentValue;
	}

	// Load form values
	protected function loadFormValues()
	{

		// Load from form
		global $CurrentForm;

		// Check field name 'Drid' first before field var 'x_Drid'
		$val = $CurrentForm->hasValue("Drid") ? $CurrentForm->getValue("Drid") : $CurrentForm->getValue("x_Drid");
		if (!$this->Drid->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Drid->Visible = FALSE; // Disable update for API request
			else
				$this->Drid->setFormValue($val);
		}

		// Check field name 'DrName' first before field var 'x_DrName'
		$val = $CurrentForm->hasValue("DrName") ? $CurrentForm->getValue("DrName") : $CurrentForm->getValue("x_DrName");
		if (!$this->DrName->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->DrName->Visible = FALSE; // Disable update for API request
			else
				$this->DrName->setFormValue($val);
		}

		// Check field name 'Details' first before field var 'x_Details'
		$val = $CurrentForm->hasValue("Details") ? $CurrentForm->getValue("Details") : $CurrentForm->getValue("x_Details");
		if (!$this->Details->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Details->Visible = FALSE; // Disable update for API request
			else
				$this->Details->setFormValue($val);
		}

		// Check field name 'BlockType' first before field var 'x_BlockType'
		$val = $CurrentForm->hasValue("BlockType") ? $CurrentForm->getValue("BlockType") : $CurrentForm->getValue("x_BlockType");
		if (!$this->BlockType->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->BlockType->Visible = FALSE; // Disable update for API request
			else
				$this->BlockType->setFormValue($val);
		}

		// Check field name 'FromDate' first before field var 'x_FromDate'
		$val = $CurrentForm->hasValue("FromDate") ? $CurrentForm->getValue("FromDate") : $CurrentForm->getValue("x_FromDate");
		if (!$this->FromDate->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->FromDate->Visible = FALSE; // Disable update for API request
			else
				$this->FromDate->setFormValue($val);
			$this->FromDate->CurrentValue = UnFormatDateTime($this->FromDate->CurrentValue, 0);
		}

		// Check field name 'ToDate' first before field var 'x_ToDate'
		$val = $CurrentForm->hasValue("ToDate") ? $CurrentForm->getValue("ToDate") : $CurrentForm->getValue("x_ToDate");
		if (!$this->ToDate->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->ToDate->Visible = FALSE; // Disable update for API request
			else
				$this->ToDate->setFormValue($val);
			$this->ToDate->CurrentValue = UnFormatDateTime($this->ToDate->CurrentValue, 0);
		}

		// Check field name 'FromTime' first before field var 'x_FromTime'
		$val = $CurrentForm->hasValue("FromTime") ? $CurrentForm->getValue("FromTime") : $CurrentForm->getValue("x_FromTime");
		if (!$this->FromTime->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->FromTime->Visible = FALSE; // Disable update for API request
			else
				$this->FromTime->setFormValue($val);
			$this->FromTime->CurrentValue = UnFormatDateTime($this->FromTime->CurrentValue, 0);
		}

		// Check field name 'ToTime' first before field var 'x_ToTime'
		$val = $CurrentForm->hasValue("ToTime") ? $CurrentForm->getValue("ToTime") : $CurrentForm->getValue("x_ToTime");
		if (!$this->ToTime->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->ToTime->Visible = FALSE; // Disable update for API request
			else
				$this->ToTime->setFormValue($val);
			$this->ToTime->CurrentValue = UnFormatDateTime($this->ToTime->CurrentValue, 0);
		}

		// Check field name 'id' first before field var 'x_id'
		$val = $CurrentForm->hasValue("id") ? $CurrentForm->getValue("id") : $CurrentForm->getValue("x_id");
	}

	// Restore form values
	public function restoreFormValues()
	{
		global $CurrentForm;
		$this->Drid->CurrentValue = $this->Drid->FormValue;
		$this->DrName->CurrentValue = $this->DrName->FormValue;
		$this->Details->CurrentValue = $this->Details->FormValue;
		$this->BlockType->CurrentValue = $this->BlockType->FormValue;
		$this->FromDate->CurrentValue = $this->FromDate->FormValue;
		$this->FromDate->CurrentValue = UnFormatDateTime($this->FromDate->CurrentValue, 0);
		$this->ToDate->CurrentValue = $this->ToDate->FormValue;
		$this->ToDate->CurrentValue = UnFormatDateTime($this->ToDate->CurrentValue, 0);
		$this->FromTime->CurrentValue = $this->FromTime->FormValue;
		$this->FromTime->CurrentValue = UnFormatDateTime($this->FromTime->CurrentValue, 0);
		$this->ToTime->CurrentValue = $this->ToTime->FormValue;
		$this->ToTime->CurrentValue = UnFormatDateTime($this->ToTime->CurrentValue, 0);
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
		$this->Drid->setDbValue($row['Drid']);
		$this->DrName->setDbValue($row['DrName']);
		$this->Details->setDbValue($row['Details']);
		$this->BlockType->setDbValue($row['BlockType']);
		$this->FromDate->setDbValue($row['FromDate']);
		$this->ToDate->setDbValue($row['ToDate']);
		$this->FromTime->setDbValue($row['FromTime']);
		$this->ToTime->setDbValue($row['ToTime']);
	}

	// Return a row with default values
	protected function newRow()
	{
		$this->loadDefaultValues();
		$row = [];
		$row['id'] = $this->id->CurrentValue;
		$row['Drid'] = $this->Drid->CurrentValue;
		$row['DrName'] = $this->DrName->CurrentValue;
		$row['Details'] = $this->Details->CurrentValue;
		$row['BlockType'] = $this->BlockType->CurrentValue;
		$row['FromDate'] = $this->FromDate->CurrentValue;
		$row['ToDate'] = $this->ToDate->CurrentValue;
		$row['FromTime'] = $this->FromTime->CurrentValue;
		$row['ToTime'] = $this->ToTime->CurrentValue;
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
		// Drid
		// DrName
		// Details
		// BlockType
		// FromDate
		// ToDate
		// FromTime
		// ToTime

		if ($this->RowType == ROWTYPE_VIEW) { // View row

			// id
			$this->id->ViewValue = $this->id->CurrentValue;
			$this->id->ViewCustomAttributes = "";

			// Drid
			$this->Drid->ViewValue = $this->Drid->CurrentValue;
			$this->Drid->ViewValue = FormatNumber($this->Drid->ViewValue, 0, -2, -2, -2);
			$this->Drid->ViewCustomAttributes = "";

			// DrName
			$this->DrName->ViewValue = $this->DrName->CurrentValue;
			$this->DrName->ViewCustomAttributes = "";

			// Details
			$this->Details->ViewValue = $this->Details->CurrentValue;
			$this->Details->ViewCustomAttributes = "";

			// BlockType
			$this->BlockType->ViewValue = $this->BlockType->CurrentValue;
			$this->BlockType->ViewCustomAttributes = "";

			// FromDate
			$this->FromDate->ViewValue = $this->FromDate->CurrentValue;
			$this->FromDate->ViewValue = FormatDateTime($this->FromDate->ViewValue, 0);
			$this->FromDate->ViewCustomAttributes = "";

			// ToDate
			$this->ToDate->ViewValue = $this->ToDate->CurrentValue;
			$this->ToDate->ViewValue = FormatDateTime($this->ToDate->ViewValue, 0);
			$this->ToDate->ViewCustomAttributes = "";

			// FromTime
			$this->FromTime->ViewValue = $this->FromTime->CurrentValue;
			$this->FromTime->ViewValue = FormatDateTime($this->FromTime->ViewValue, 0);
			$this->FromTime->ViewCustomAttributes = "";

			// ToTime
			$this->ToTime->ViewValue = $this->ToTime->CurrentValue;
			$this->ToTime->ViewValue = FormatDateTime($this->ToTime->ViewValue, 0);
			$this->ToTime->ViewCustomAttributes = "";

			// Drid
			$this->Drid->LinkCustomAttributes = "";
			$this->Drid->HrefValue = "";
			$this->Drid->TooltipValue = "";

			// DrName
			$this->DrName->LinkCustomAttributes = "";
			$this->DrName->HrefValue = "";
			$this->DrName->TooltipValue = "";

			// Details
			$this->Details->LinkCustomAttributes = "";
			$this->Details->HrefValue = "";
			$this->Details->TooltipValue = "";

			// BlockType
			$this->BlockType->LinkCustomAttributes = "";
			$this->BlockType->HrefValue = "";
			$this->BlockType->TooltipValue = "";

			// FromDate
			$this->FromDate->LinkCustomAttributes = "";
			$this->FromDate->HrefValue = "";
			$this->FromDate->TooltipValue = "";

			// ToDate
			$this->ToDate->LinkCustomAttributes = "";
			$this->ToDate->HrefValue = "";
			$this->ToDate->TooltipValue = "";

			// FromTime
			$this->FromTime->LinkCustomAttributes = "";
			$this->FromTime->HrefValue = "";
			$this->FromTime->TooltipValue = "";

			// ToTime
			$this->ToTime->LinkCustomAttributes = "";
			$this->ToTime->HrefValue = "";
			$this->ToTime->TooltipValue = "";
		} elseif ($this->RowType == ROWTYPE_ADD) { // Add row

			// Drid
			$this->Drid->EditAttrs["class"] = "form-control";
			$this->Drid->EditCustomAttributes = "";
			$this->Drid->EditValue = HtmlEncode($this->Drid->CurrentValue);
			$this->Drid->PlaceHolder = RemoveHtml($this->Drid->caption());

			// DrName
			$this->DrName->EditAttrs["class"] = "form-control";
			$this->DrName->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->DrName->CurrentValue = HtmlDecode($this->DrName->CurrentValue);
			$this->DrName->EditValue = HtmlEncode($this->DrName->CurrentValue);
			$this->DrName->PlaceHolder = RemoveHtml($this->DrName->caption());

			// Details
			$this->Details->EditAttrs["class"] = "form-control";
			$this->Details->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Details->CurrentValue = HtmlDecode($this->Details->CurrentValue);
			$this->Details->EditValue = HtmlEncode($this->Details->CurrentValue);
			$this->Details->PlaceHolder = RemoveHtml($this->Details->caption());

			// BlockType
			$this->BlockType->EditAttrs["class"] = "form-control";
			$this->BlockType->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->BlockType->CurrentValue = HtmlDecode($this->BlockType->CurrentValue);
			$this->BlockType->EditValue = HtmlEncode($this->BlockType->CurrentValue);
			$this->BlockType->PlaceHolder = RemoveHtml($this->BlockType->caption());

			// FromDate
			$this->FromDate->EditAttrs["class"] = "form-control";
			$this->FromDate->EditCustomAttributes = "";
			$this->FromDate->EditValue = HtmlEncode(FormatDateTime($this->FromDate->CurrentValue, 8));
			$this->FromDate->PlaceHolder = RemoveHtml($this->FromDate->caption());

			// ToDate
			$this->ToDate->EditAttrs["class"] = "form-control";
			$this->ToDate->EditCustomAttributes = "";
			$this->ToDate->EditValue = HtmlEncode(FormatDateTime($this->ToDate->CurrentValue, 8));
			$this->ToDate->PlaceHolder = RemoveHtml($this->ToDate->caption());

			// FromTime
			$this->FromTime->EditAttrs["class"] = "form-control";
			$this->FromTime->EditCustomAttributes = "";
			$this->FromTime->EditValue = HtmlEncode(FormatDateTime($this->FromTime->CurrentValue, 8));
			$this->FromTime->PlaceHolder = RemoveHtml($this->FromTime->caption());

			// ToTime
			$this->ToTime->EditAttrs["class"] = "form-control";
			$this->ToTime->EditCustomAttributes = "";
			$this->ToTime->EditValue = HtmlEncode(FormatDateTime($this->ToTime->CurrentValue, 8));
			$this->ToTime->PlaceHolder = RemoveHtml($this->ToTime->caption());

			// Add refer script
			// Drid

			$this->Drid->LinkCustomAttributes = "";
			$this->Drid->HrefValue = "";

			// DrName
			$this->DrName->LinkCustomAttributes = "";
			$this->DrName->HrefValue = "";

			// Details
			$this->Details->LinkCustomAttributes = "";
			$this->Details->HrefValue = "";

			// BlockType
			$this->BlockType->LinkCustomAttributes = "";
			$this->BlockType->HrefValue = "";

			// FromDate
			$this->FromDate->LinkCustomAttributes = "";
			$this->FromDate->HrefValue = "";

			// ToDate
			$this->ToDate->LinkCustomAttributes = "";
			$this->ToDate->HrefValue = "";

			// FromTime
			$this->FromTime->LinkCustomAttributes = "";
			$this->FromTime->HrefValue = "";

			// ToTime
			$this->ToTime->LinkCustomAttributes = "";
			$this->ToTime->HrefValue = "";
		}
		if ($this->RowType == ROWTYPE_ADD || $this->RowType == ROWTYPE_EDIT || $this->RowType == ROWTYPE_SEARCH) // Add/Edit/Search row
			$this->setupFieldTitles();

		// Call Row Rendered event
		if ($this->RowType <> ROWTYPE_AGGREGATEINIT)
			$this->Row_Rendered();

		// Save data for Custom Template
		if ($this->RowType == ROWTYPE_VIEW || $this->RowType == ROWTYPE_EDIT || $this->RowType == ROWTYPE_ADD)
			$this->Rows[] = $this->customTemplateFieldValues();
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
		if ($this->Drid->Required) {
			if (!$this->Drid->IsDetailKey && $this->Drid->FormValue != NULL && $this->Drid->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Drid->caption(), $this->Drid->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->Drid->FormValue)) {
			AddMessage($FormError, $this->Drid->errorMessage());
		}
		if ($this->DrName->Required) {
			if (!$this->DrName->IsDetailKey && $this->DrName->FormValue != NULL && $this->DrName->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->DrName->caption(), $this->DrName->RequiredErrorMessage));
			}
		}
		if ($this->Details->Required) {
			if (!$this->Details->IsDetailKey && $this->Details->FormValue != NULL && $this->Details->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Details->caption(), $this->Details->RequiredErrorMessage));
			}
		}
		if ($this->BlockType->Required) {
			if (!$this->BlockType->IsDetailKey && $this->BlockType->FormValue != NULL && $this->BlockType->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->BlockType->caption(), $this->BlockType->RequiredErrorMessage));
			}
		}
		if ($this->FromDate->Required) {
			if (!$this->FromDate->IsDetailKey && $this->FromDate->FormValue != NULL && $this->FromDate->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->FromDate->caption(), $this->FromDate->RequiredErrorMessage));
			}
		}
		if (!CheckDate($this->FromDate->FormValue)) {
			AddMessage($FormError, $this->FromDate->errorMessage());
		}
		if ($this->ToDate->Required) {
			if (!$this->ToDate->IsDetailKey && $this->ToDate->FormValue != NULL && $this->ToDate->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->ToDate->caption(), $this->ToDate->RequiredErrorMessage));
			}
		}
		if (!CheckDate($this->ToDate->FormValue)) {
			AddMessage($FormError, $this->ToDate->errorMessage());
		}
		if ($this->FromTime->Required) {
			if (!$this->FromTime->IsDetailKey && $this->FromTime->FormValue != NULL && $this->FromTime->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->FromTime->caption(), $this->FromTime->RequiredErrorMessage));
			}
		}
		if (!CheckDate($this->FromTime->FormValue)) {
			AddMessage($FormError, $this->FromTime->errorMessage());
		}
		if ($this->ToTime->Required) {
			if (!$this->ToTime->IsDetailKey && $this->ToTime->FormValue != NULL && $this->ToTime->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->ToTime->caption(), $this->ToTime->RequiredErrorMessage));
			}
		}
		if (!CheckDate($this->ToTime->FormValue)) {
			AddMessage($FormError, $this->ToTime->errorMessage());
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

		// Drid
		$this->Drid->setDbValueDef($rsnew, $this->Drid->CurrentValue, NULL, FALSE);

		// DrName
		$this->DrName->setDbValueDef($rsnew, $this->DrName->CurrentValue, NULL, FALSE);

		// Details
		$this->Details->setDbValueDef($rsnew, $this->Details->CurrentValue, NULL, FALSE);

		// BlockType
		$this->BlockType->setDbValueDef($rsnew, $this->BlockType->CurrentValue, NULL, FALSE);

		// FromDate
		$this->FromDate->setDbValueDef($rsnew, UnFormatDateTime($this->FromDate->CurrentValue, 0), NULL, FALSE);

		// ToDate
		$this->ToDate->setDbValueDef($rsnew, UnFormatDateTime($this->ToDate->CurrentValue, 0), NULL, FALSE);

		// FromTime
		$this->FromTime->setDbValueDef($rsnew, UnFormatDateTime($this->FromTime->CurrentValue, 0), NULL, FALSE);

		// ToTime
		$this->ToTime->setDbValueDef($rsnew, UnFormatDateTime($this->ToTime->CurrentValue, 0), NULL, FALSE);

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
		$Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("appointment_block_slotlist.php"), "", $this->TableVar, TRUE);
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
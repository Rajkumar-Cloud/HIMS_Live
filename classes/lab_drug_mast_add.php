<?php
namespace PHPMaker2019\HIMS;

/**
 * Page class
 */
class lab_drug_mast_add extends lab_drug_mast
{

	// Page ID
	public $PageID = "add";

	// Project ID
	public $ProjectID = "{EA4F6D13-AF8F-428D-9EA7-BA88D1107EC3}";

	// Table name
	public $TableName = 'lab_drug_mast';

	// Page object name
	public $PageObjName = "lab_drug_mast_add";

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

		// Table object (lab_drug_mast)
		if (!isset($GLOBALS["lab_drug_mast"]) || get_class($GLOBALS["lab_drug_mast"]) == PROJECT_NAMESPACE . "lab_drug_mast") {
			$GLOBALS["lab_drug_mast"] = &$this;
			$GLOBALS["Table"] = &$GLOBALS["lab_drug_mast"];
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
			define(PROJECT_NAMESPACE . "TABLE_NAME", 'lab_drug_mast');

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
		global $EXPORT, $lab_drug_mast;
		if ($this->CustomExport && $this->CustomExport == $this->Export && array_key_exists($this->CustomExport, $EXPORT)) {
				$content = ob_get_contents();
			if ($ExportFileName == "")
				$ExportFileName = $this->TableVar;
			$class = PROJECT_NAMESPACE . $EXPORT[$this->CustomExport];
			if (class_exists($class)) {
				$doc = new $class($lab_drug_mast);
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
					if ($pageName == "lab_drug_mastview.php")
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
					$this->terminate(GetUrl("lab_drug_mastlist.php"));
				else
					$this->terminate(GetUrl("login.php"));
				return;
			}
		}

		// Create form object
		$CurrentForm = new HttpForm();
		$this->CurrentAction = Param("action"); // Set up current action
		$this->DrugName->setVisibility();
		$this->Positive->setVisibility();
		$this->Negative->setVisibility();
		$this->ShortName->setVisibility();
		$this->GroupCD->setVisibility();
		$this->Content->setVisibility();
		$this->Order->setVisibility();
		$this->DrugCD->setVisibility();
		$this->id->Visible = FALSE;
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
					$this->terminate("lab_drug_mastlist.php"); // No matching record, return to list
				}
				break;
			case "insert": // Add new record
				$this->SendEmail = TRUE; // Send email on add success
				if ($this->addRow($this->OldRecordset)) { // Add successful
					if ($this->getSuccessMessage() == "")
						$this->setSuccessMessage($Language->phrase("AddSuccess")); // Set up success message
					$returnUrl = $this->getReturnUrl();
					if (GetPageName($returnUrl) == "lab_drug_mastlist.php")
						$returnUrl = $this->addMasterUrl($returnUrl); // List page, return to List page with correct master key if necessary
					elseif (GetPageName($returnUrl) == "lab_drug_mastview.php")
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
		$this->DrugName->CurrentValue = NULL;
		$this->DrugName->OldValue = $this->DrugName->CurrentValue;
		$this->Positive->CurrentValue = NULL;
		$this->Positive->OldValue = $this->Positive->CurrentValue;
		$this->Negative->CurrentValue = NULL;
		$this->Negative->OldValue = $this->Negative->CurrentValue;
		$this->ShortName->CurrentValue = NULL;
		$this->ShortName->OldValue = $this->ShortName->CurrentValue;
		$this->GroupCD->CurrentValue = NULL;
		$this->GroupCD->OldValue = $this->GroupCD->CurrentValue;
		$this->Content->CurrentValue = NULL;
		$this->Content->OldValue = $this->Content->CurrentValue;
		$this->Order->CurrentValue = NULL;
		$this->Order->OldValue = $this->Order->CurrentValue;
		$this->DrugCD->CurrentValue = NULL;
		$this->DrugCD->OldValue = $this->DrugCD->CurrentValue;
		$this->id->CurrentValue = NULL;
		$this->id->OldValue = $this->id->CurrentValue;
	}

	// Load form values
	protected function loadFormValues()
	{

		// Load from form
		global $CurrentForm;

		// Check field name 'DrugName' first before field var 'x_DrugName'
		$val = $CurrentForm->hasValue("DrugName") ? $CurrentForm->getValue("DrugName") : $CurrentForm->getValue("x_DrugName");
		if (!$this->DrugName->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->DrugName->Visible = FALSE; // Disable update for API request
			else
				$this->DrugName->setFormValue($val);
		}

		// Check field name 'Positive' first before field var 'x_Positive'
		$val = $CurrentForm->hasValue("Positive") ? $CurrentForm->getValue("Positive") : $CurrentForm->getValue("x_Positive");
		if (!$this->Positive->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Positive->Visible = FALSE; // Disable update for API request
			else
				$this->Positive->setFormValue($val);
		}

		// Check field name 'Negative' first before field var 'x_Negative'
		$val = $CurrentForm->hasValue("Negative") ? $CurrentForm->getValue("Negative") : $CurrentForm->getValue("x_Negative");
		if (!$this->Negative->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Negative->Visible = FALSE; // Disable update for API request
			else
				$this->Negative->setFormValue($val);
		}

		// Check field name 'ShortName' first before field var 'x_ShortName'
		$val = $CurrentForm->hasValue("ShortName") ? $CurrentForm->getValue("ShortName") : $CurrentForm->getValue("x_ShortName");
		if (!$this->ShortName->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->ShortName->Visible = FALSE; // Disable update for API request
			else
				$this->ShortName->setFormValue($val);
		}

		// Check field name 'GroupCD' first before field var 'x_GroupCD'
		$val = $CurrentForm->hasValue("GroupCD") ? $CurrentForm->getValue("GroupCD") : $CurrentForm->getValue("x_GroupCD");
		if (!$this->GroupCD->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->GroupCD->Visible = FALSE; // Disable update for API request
			else
				$this->GroupCD->setFormValue($val);
		}

		// Check field name 'Content' first before field var 'x_Content'
		$val = $CurrentForm->hasValue("Content") ? $CurrentForm->getValue("Content") : $CurrentForm->getValue("x_Content");
		if (!$this->Content->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Content->Visible = FALSE; // Disable update for API request
			else
				$this->Content->setFormValue($val);
		}

		// Check field name 'Order' first before field var 'x_Order'
		$val = $CurrentForm->hasValue("Order") ? $CurrentForm->getValue("Order") : $CurrentForm->getValue("x_Order");
		if (!$this->Order->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Order->Visible = FALSE; // Disable update for API request
			else
				$this->Order->setFormValue($val);
		}

		// Check field name 'DrugCD' first before field var 'x_DrugCD'
		$val = $CurrentForm->hasValue("DrugCD") ? $CurrentForm->getValue("DrugCD") : $CurrentForm->getValue("x_DrugCD");
		if (!$this->DrugCD->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->DrugCD->Visible = FALSE; // Disable update for API request
			else
				$this->DrugCD->setFormValue($val);
		}

		// Check field name 'id' first before field var 'x_id'
		$val = $CurrentForm->hasValue("id") ? $CurrentForm->getValue("id") : $CurrentForm->getValue("x_id");
	}

	// Restore form values
	public function restoreFormValues()
	{
		global $CurrentForm;
		$this->DrugName->CurrentValue = $this->DrugName->FormValue;
		$this->Positive->CurrentValue = $this->Positive->FormValue;
		$this->Negative->CurrentValue = $this->Negative->FormValue;
		$this->ShortName->CurrentValue = $this->ShortName->FormValue;
		$this->GroupCD->CurrentValue = $this->GroupCD->FormValue;
		$this->Content->CurrentValue = $this->Content->FormValue;
		$this->Order->CurrentValue = $this->Order->FormValue;
		$this->DrugCD->CurrentValue = $this->DrugCD->FormValue;
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
		$this->DrugName->setDbValue($row['DrugName']);
		$this->Positive->setDbValue($row['Positive']);
		$this->Negative->setDbValue($row['Negative']);
		$this->ShortName->setDbValue($row['ShortName']);
		$this->GroupCD->setDbValue($row['GroupCD']);
		$this->Content->setDbValue($row['Content']);
		$this->Order->setDbValue($row['Order']);
		$this->DrugCD->setDbValue($row['DrugCD']);
		$this->id->setDbValue($row['id']);
	}

	// Return a row with default values
	protected function newRow()
	{
		$this->loadDefaultValues();
		$row = [];
		$row['DrugName'] = $this->DrugName->CurrentValue;
		$row['Positive'] = $this->Positive->CurrentValue;
		$row['Negative'] = $this->Negative->CurrentValue;
		$row['ShortName'] = $this->ShortName->CurrentValue;
		$row['GroupCD'] = $this->GroupCD->CurrentValue;
		$row['Content'] = $this->Content->CurrentValue;
		$row['Order'] = $this->Order->CurrentValue;
		$row['DrugCD'] = $this->DrugCD->CurrentValue;
		$row['id'] = $this->id->CurrentValue;
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

		if ($this->Order->FormValue == $this->Order->CurrentValue && is_numeric(ConvertToFloatString($this->Order->CurrentValue)))
			$this->Order->CurrentValue = ConvertToFloatString($this->Order->CurrentValue);

		// Call Row_Rendering event
		$this->Row_Rendering();

		// Common render codes for all row types
		// DrugName
		// Positive
		// Negative
		// ShortName
		// GroupCD
		// Content
		// Order
		// DrugCD
		// id

		if ($this->RowType == ROWTYPE_VIEW) { // View row

			// DrugName
			$this->DrugName->ViewValue = $this->DrugName->CurrentValue;
			$this->DrugName->ViewCustomAttributes = "";

			// Positive
			$this->Positive->ViewValue = $this->Positive->CurrentValue;
			$this->Positive->ViewCustomAttributes = "";

			// Negative
			$this->Negative->ViewValue = $this->Negative->CurrentValue;
			$this->Negative->ViewCustomAttributes = "";

			// ShortName
			$this->ShortName->ViewValue = $this->ShortName->CurrentValue;
			$this->ShortName->ViewCustomAttributes = "";

			// GroupCD
			$this->GroupCD->ViewValue = $this->GroupCD->CurrentValue;
			$this->GroupCD->ViewCustomAttributes = "";

			// Content
			$this->Content->ViewValue = $this->Content->CurrentValue;
			$this->Content->ViewCustomAttributes = "";

			// Order
			$this->Order->ViewValue = $this->Order->CurrentValue;
			$this->Order->ViewValue = FormatNumber($this->Order->ViewValue, 2, -2, -2, -2);
			$this->Order->ViewCustomAttributes = "";

			// DrugCD
			$this->DrugCD->ViewValue = $this->DrugCD->CurrentValue;
			$this->DrugCD->ViewCustomAttributes = "";

			// id
			$this->id->ViewValue = $this->id->CurrentValue;
			$this->id->ViewCustomAttributes = "";

			// DrugName
			$this->DrugName->LinkCustomAttributes = "";
			$this->DrugName->HrefValue = "";
			$this->DrugName->TooltipValue = "";

			// Positive
			$this->Positive->LinkCustomAttributes = "";
			$this->Positive->HrefValue = "";
			$this->Positive->TooltipValue = "";

			// Negative
			$this->Negative->LinkCustomAttributes = "";
			$this->Negative->HrefValue = "";
			$this->Negative->TooltipValue = "";

			// ShortName
			$this->ShortName->LinkCustomAttributes = "";
			$this->ShortName->HrefValue = "";
			$this->ShortName->TooltipValue = "";

			// GroupCD
			$this->GroupCD->LinkCustomAttributes = "";
			$this->GroupCD->HrefValue = "";
			$this->GroupCD->TooltipValue = "";

			// Content
			$this->Content->LinkCustomAttributes = "";
			$this->Content->HrefValue = "";
			$this->Content->TooltipValue = "";

			// Order
			$this->Order->LinkCustomAttributes = "";
			$this->Order->HrefValue = "";
			$this->Order->TooltipValue = "";

			// DrugCD
			$this->DrugCD->LinkCustomAttributes = "";
			$this->DrugCD->HrefValue = "";
			$this->DrugCD->TooltipValue = "";
		} elseif ($this->RowType == ROWTYPE_ADD) { // Add row

			// DrugName
			$this->DrugName->EditAttrs["class"] = "form-control";
			$this->DrugName->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->DrugName->CurrentValue = HtmlDecode($this->DrugName->CurrentValue);
			$this->DrugName->EditValue = HtmlEncode($this->DrugName->CurrentValue);
			$this->DrugName->PlaceHolder = RemoveHtml($this->DrugName->caption());

			// Positive
			$this->Positive->EditAttrs["class"] = "form-control";
			$this->Positive->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Positive->CurrentValue = HtmlDecode($this->Positive->CurrentValue);
			$this->Positive->EditValue = HtmlEncode($this->Positive->CurrentValue);
			$this->Positive->PlaceHolder = RemoveHtml($this->Positive->caption());

			// Negative
			$this->Negative->EditAttrs["class"] = "form-control";
			$this->Negative->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Negative->CurrentValue = HtmlDecode($this->Negative->CurrentValue);
			$this->Negative->EditValue = HtmlEncode($this->Negative->CurrentValue);
			$this->Negative->PlaceHolder = RemoveHtml($this->Negative->caption());

			// ShortName
			$this->ShortName->EditAttrs["class"] = "form-control";
			$this->ShortName->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->ShortName->CurrentValue = HtmlDecode($this->ShortName->CurrentValue);
			$this->ShortName->EditValue = HtmlEncode($this->ShortName->CurrentValue);
			$this->ShortName->PlaceHolder = RemoveHtml($this->ShortName->caption());

			// GroupCD
			$this->GroupCD->EditAttrs["class"] = "form-control";
			$this->GroupCD->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->GroupCD->CurrentValue = HtmlDecode($this->GroupCD->CurrentValue);
			$this->GroupCD->EditValue = HtmlEncode($this->GroupCD->CurrentValue);
			$this->GroupCD->PlaceHolder = RemoveHtml($this->GroupCD->caption());

			// Content
			$this->Content->EditAttrs["class"] = "form-control";
			$this->Content->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Content->CurrentValue = HtmlDecode($this->Content->CurrentValue);
			$this->Content->EditValue = HtmlEncode($this->Content->CurrentValue);
			$this->Content->PlaceHolder = RemoveHtml($this->Content->caption());

			// Order
			$this->Order->EditAttrs["class"] = "form-control";
			$this->Order->EditCustomAttributes = "";
			$this->Order->EditValue = HtmlEncode($this->Order->CurrentValue);
			$this->Order->PlaceHolder = RemoveHtml($this->Order->caption());
			if (strval($this->Order->EditValue) <> "" && is_numeric($this->Order->EditValue))
				$this->Order->EditValue = FormatNumber($this->Order->EditValue, -2, -2, -2, -2);

			// DrugCD
			$this->DrugCD->EditAttrs["class"] = "form-control";
			$this->DrugCD->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->DrugCD->CurrentValue = HtmlDecode($this->DrugCD->CurrentValue);
			$this->DrugCD->EditValue = HtmlEncode($this->DrugCD->CurrentValue);
			$this->DrugCD->PlaceHolder = RemoveHtml($this->DrugCD->caption());

			// Add refer script
			// DrugName

			$this->DrugName->LinkCustomAttributes = "";
			$this->DrugName->HrefValue = "";

			// Positive
			$this->Positive->LinkCustomAttributes = "";
			$this->Positive->HrefValue = "";

			// Negative
			$this->Negative->LinkCustomAttributes = "";
			$this->Negative->HrefValue = "";

			// ShortName
			$this->ShortName->LinkCustomAttributes = "";
			$this->ShortName->HrefValue = "";

			// GroupCD
			$this->GroupCD->LinkCustomAttributes = "";
			$this->GroupCD->HrefValue = "";

			// Content
			$this->Content->LinkCustomAttributes = "";
			$this->Content->HrefValue = "";

			// Order
			$this->Order->LinkCustomAttributes = "";
			$this->Order->HrefValue = "";

			// DrugCD
			$this->DrugCD->LinkCustomAttributes = "";
			$this->DrugCD->HrefValue = "";
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
		if ($this->DrugName->Required) {
			if (!$this->DrugName->IsDetailKey && $this->DrugName->FormValue != NULL && $this->DrugName->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->DrugName->caption(), $this->DrugName->RequiredErrorMessage));
			}
		}
		if ($this->Positive->Required) {
			if (!$this->Positive->IsDetailKey && $this->Positive->FormValue != NULL && $this->Positive->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Positive->caption(), $this->Positive->RequiredErrorMessage));
			}
		}
		if ($this->Negative->Required) {
			if (!$this->Negative->IsDetailKey && $this->Negative->FormValue != NULL && $this->Negative->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Negative->caption(), $this->Negative->RequiredErrorMessage));
			}
		}
		if ($this->ShortName->Required) {
			if (!$this->ShortName->IsDetailKey && $this->ShortName->FormValue != NULL && $this->ShortName->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->ShortName->caption(), $this->ShortName->RequiredErrorMessage));
			}
		}
		if ($this->GroupCD->Required) {
			if (!$this->GroupCD->IsDetailKey && $this->GroupCD->FormValue != NULL && $this->GroupCD->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->GroupCD->caption(), $this->GroupCD->RequiredErrorMessage));
			}
		}
		if ($this->Content->Required) {
			if (!$this->Content->IsDetailKey && $this->Content->FormValue != NULL && $this->Content->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Content->caption(), $this->Content->RequiredErrorMessage));
			}
		}
		if ($this->Order->Required) {
			if (!$this->Order->IsDetailKey && $this->Order->FormValue != NULL && $this->Order->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Order->caption(), $this->Order->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->Order->FormValue)) {
			AddMessage($FormError, $this->Order->errorMessage());
		}
		if ($this->DrugCD->Required) {
			if (!$this->DrugCD->IsDetailKey && $this->DrugCD->FormValue != NULL && $this->DrugCD->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->DrugCD->caption(), $this->DrugCD->RequiredErrorMessage));
			}
		}
		if ($this->id->Required) {
			if (!$this->id->IsDetailKey && $this->id->FormValue != NULL && $this->id->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->id->caption(), $this->id->RequiredErrorMessage));
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

		// DrugName
		$this->DrugName->setDbValueDef($rsnew, $this->DrugName->CurrentValue, "", FALSE);

		// Positive
		$this->Positive->setDbValueDef($rsnew, $this->Positive->CurrentValue, "", FALSE);

		// Negative
		$this->Negative->setDbValueDef($rsnew, $this->Negative->CurrentValue, "", FALSE);

		// ShortName
		$this->ShortName->setDbValueDef($rsnew, $this->ShortName->CurrentValue, "", FALSE);

		// GroupCD
		$this->GroupCD->setDbValueDef($rsnew, $this->GroupCD->CurrentValue, "", FALSE);

		// Content
		$this->Content->setDbValueDef($rsnew, $this->Content->CurrentValue, "", FALSE);

		// Order
		$this->Order->setDbValueDef($rsnew, $this->Order->CurrentValue, 0, FALSE);

		// DrugCD
		$this->DrugCD->setDbValueDef($rsnew, $this->DrugCD->CurrentValue, "", FALSE);

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
		$Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("lab_drug_mastlist.php"), "", $this->TableVar, TRUE);
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
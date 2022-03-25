<?php
namespace PHPMaker2019\HIMS;

/**
 * Page class
 */
class lab_dept_mast_edit extends lab_dept_mast
{

	// Page ID
	public $PageID = "edit";

	// Project ID
	public $ProjectID = "{EA4F6D13-AF8F-428D-9EA7-BA88D1107EC3}";

	// Table name
	public $TableName = 'lab_dept_mast';

	// Page object name
	public $PageObjName = "lab_dept_mast_edit";

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

		// Table object (lab_dept_mast)
		if (!isset($GLOBALS["lab_dept_mast"]) || get_class($GLOBALS["lab_dept_mast"]) == PROJECT_NAMESPACE . "lab_dept_mast") {
			$GLOBALS["lab_dept_mast"] = &$this;
			$GLOBALS["Table"] = &$GLOBALS["lab_dept_mast"];
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
			define(PROJECT_NAMESPACE . "TABLE_NAME", 'lab_dept_mast');

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
		global $EXPORT, $lab_dept_mast;
		if ($this->CustomExport && $this->CustomExport == $this->Export && array_key_exists($this->CustomExport, $EXPORT)) {
				$content = ob_get_contents();
			if ($ExportFileName == "")
				$ExportFileName = $this->TableVar;
			$class = PROJECT_NAMESPACE . $EXPORT[$this->CustomExport];
			if (class_exists($class)) {
				$doc = new $class($lab_dept_mast);
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
					if ($pageName == "lab_dept_mastview.php")
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
					$this->terminate(GetUrl("lab_dept_mastlist.php"));
				else
					$this->terminate(GetUrl("login.php"));
				return;
			}
		}

		// Create form object
		$CurrentForm = new HttpForm();
		$this->CurrentAction = Param("action"); // Set up current action
		$this->MainCD->setVisibility();
		$this->Code->setVisibility();
		$this->Name->setVisibility();
		$this->Order->setVisibility();
		$this->SignCD->setVisibility();
		$this->Collection->setVisibility();
		$this->EditDate->setVisibility();
		$this->SMS->setVisibility();
		$this->Note->setVisibility();
		$this->WorkList->setVisibility();
		$this->_Page->setVisibility();
		$this->Incharge->setVisibility();
		$this->AutoNum->setVisibility();
		$this->id->setVisibility();
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
					$this->terminate("lab_dept_mastlist.php"); // No matching record, return to list
				}
				break;
			case "update": // Update
				$returnUrl = $this->getReturnUrl();
				if (GetPageName($returnUrl) == "lab_dept_mastlist.php")
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

		// Check field name 'MainCD' first before field var 'x_MainCD'
		$val = $CurrentForm->hasValue("MainCD") ? $CurrentForm->getValue("MainCD") : $CurrentForm->getValue("x_MainCD");
		if (!$this->MainCD->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->MainCD->Visible = FALSE; // Disable update for API request
			else
				$this->MainCD->setFormValue($val);
		}

		// Check field name 'Code' first before field var 'x_Code'
		$val = $CurrentForm->hasValue("Code") ? $CurrentForm->getValue("Code") : $CurrentForm->getValue("x_Code");
		if (!$this->Code->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Code->Visible = FALSE; // Disable update for API request
			else
				$this->Code->setFormValue($val);
		}

		// Check field name 'Name' first before field var 'x_Name'
		$val = $CurrentForm->hasValue("Name") ? $CurrentForm->getValue("Name") : $CurrentForm->getValue("x_Name");
		if (!$this->Name->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Name->Visible = FALSE; // Disable update for API request
			else
				$this->Name->setFormValue($val);
		}

		// Check field name 'Order' first before field var 'x_Order'
		$val = $CurrentForm->hasValue("Order") ? $CurrentForm->getValue("Order") : $CurrentForm->getValue("x_Order");
		if (!$this->Order->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Order->Visible = FALSE; // Disable update for API request
			else
				$this->Order->setFormValue($val);
		}

		// Check field name 'SignCD' first before field var 'x_SignCD'
		$val = $CurrentForm->hasValue("SignCD") ? $CurrentForm->getValue("SignCD") : $CurrentForm->getValue("x_SignCD");
		if (!$this->SignCD->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->SignCD->Visible = FALSE; // Disable update for API request
			else
				$this->SignCD->setFormValue($val);
		}

		// Check field name 'Collection' first before field var 'x_Collection'
		$val = $CurrentForm->hasValue("Collection") ? $CurrentForm->getValue("Collection") : $CurrentForm->getValue("x_Collection");
		if (!$this->Collection->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Collection->Visible = FALSE; // Disable update for API request
			else
				$this->Collection->setFormValue($val);
		}

		// Check field name 'EditDate' first before field var 'x_EditDate'
		$val = $CurrentForm->hasValue("EditDate") ? $CurrentForm->getValue("EditDate") : $CurrentForm->getValue("x_EditDate");
		if (!$this->EditDate->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->EditDate->Visible = FALSE; // Disable update for API request
			else
				$this->EditDate->setFormValue($val);
			$this->EditDate->CurrentValue = UnFormatDateTime($this->EditDate->CurrentValue, 0);
		}

		// Check field name 'SMS' first before field var 'x_SMS'
		$val = $CurrentForm->hasValue("SMS") ? $CurrentForm->getValue("SMS") : $CurrentForm->getValue("x_SMS");
		if (!$this->SMS->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->SMS->Visible = FALSE; // Disable update for API request
			else
				$this->SMS->setFormValue($val);
		}

		// Check field name 'Note' first before field var 'x_Note'
		$val = $CurrentForm->hasValue("Note") ? $CurrentForm->getValue("Note") : $CurrentForm->getValue("x_Note");
		if (!$this->Note->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Note->Visible = FALSE; // Disable update for API request
			else
				$this->Note->setFormValue($val);
		}

		// Check field name 'WorkList' first before field var 'x_WorkList'
		$val = $CurrentForm->hasValue("WorkList") ? $CurrentForm->getValue("WorkList") : $CurrentForm->getValue("x_WorkList");
		if (!$this->WorkList->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->WorkList->Visible = FALSE; // Disable update for API request
			else
				$this->WorkList->setFormValue($val);
		}

		// Check field name 'Page' first before field var 'x__Page'
		$val = $CurrentForm->hasValue("Page") ? $CurrentForm->getValue("Page") : $CurrentForm->getValue("x__Page");
		if (!$this->_Page->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->_Page->Visible = FALSE; // Disable update for API request
			else
				$this->_Page->setFormValue($val);
		}

		// Check field name 'Incharge' first before field var 'x_Incharge'
		$val = $CurrentForm->hasValue("Incharge") ? $CurrentForm->getValue("Incharge") : $CurrentForm->getValue("x_Incharge");
		if (!$this->Incharge->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Incharge->Visible = FALSE; // Disable update for API request
			else
				$this->Incharge->setFormValue($val);
		}

		// Check field name 'AutoNum' first before field var 'x_AutoNum'
		$val = $CurrentForm->hasValue("AutoNum") ? $CurrentForm->getValue("AutoNum") : $CurrentForm->getValue("x_AutoNum");
		if (!$this->AutoNum->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->AutoNum->Visible = FALSE; // Disable update for API request
			else
				$this->AutoNum->setFormValue($val);
		}

		// Check field name 'id' first before field var 'x_id'
		$val = $CurrentForm->hasValue("id") ? $CurrentForm->getValue("id") : $CurrentForm->getValue("x_id");
		if (!$this->id->IsDetailKey)
			$this->id->setFormValue($val);
	}

	// Restore form values
	public function restoreFormValues()
	{
		global $CurrentForm;
		$this->MainCD->CurrentValue = $this->MainCD->FormValue;
		$this->Code->CurrentValue = $this->Code->FormValue;
		$this->Name->CurrentValue = $this->Name->FormValue;
		$this->Order->CurrentValue = $this->Order->FormValue;
		$this->SignCD->CurrentValue = $this->SignCD->FormValue;
		$this->Collection->CurrentValue = $this->Collection->FormValue;
		$this->EditDate->CurrentValue = $this->EditDate->FormValue;
		$this->EditDate->CurrentValue = UnFormatDateTime($this->EditDate->CurrentValue, 0);
		$this->SMS->CurrentValue = $this->SMS->FormValue;
		$this->Note->CurrentValue = $this->Note->FormValue;
		$this->WorkList->CurrentValue = $this->WorkList->FormValue;
		$this->_Page->CurrentValue = $this->_Page->FormValue;
		$this->Incharge->CurrentValue = $this->Incharge->FormValue;
		$this->AutoNum->CurrentValue = $this->AutoNum->FormValue;
		$this->id->CurrentValue = $this->id->FormValue;
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
		$this->MainCD->setDbValue($row['MainCD']);
		$this->Code->setDbValue($row['Code']);
		$this->Name->setDbValue($row['Name']);
		$this->Order->setDbValue($row['Order']);
		$this->SignCD->setDbValue($row['SignCD']);
		$this->Collection->setDbValue($row['Collection']);
		$this->EditDate->setDbValue($row['EditDate']);
		$this->SMS->setDbValue($row['SMS']);
		$this->Note->setDbValue($row['Note']);
		$this->WorkList->setDbValue($row['WorkList']);
		$this->_Page->setDbValue($row['Page']);
		$this->Incharge->setDbValue($row['Incharge']);
		$this->AutoNum->setDbValue($row['AutoNum']);
		$this->id->setDbValue($row['id']);
	}

	// Return a row with default values
	protected function newRow()
	{
		$row = [];
		$row['MainCD'] = NULL;
		$row['Code'] = NULL;
		$row['Name'] = NULL;
		$row['Order'] = NULL;
		$row['SignCD'] = NULL;
		$row['Collection'] = NULL;
		$row['EditDate'] = NULL;
		$row['SMS'] = NULL;
		$row['Note'] = NULL;
		$row['WorkList'] = NULL;
		$row['Page'] = NULL;
		$row['Incharge'] = NULL;
		$row['AutoNum'] = NULL;
		$row['id'] = NULL;
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

		// Convert decimal values if posted back
		if ($this->_Page->FormValue == $this->_Page->CurrentValue && is_numeric(ConvertToFloatString($this->_Page->CurrentValue)))
			$this->_Page->CurrentValue = ConvertToFloatString($this->_Page->CurrentValue);

		// Call Row_Rendering event
		$this->Row_Rendering();

		// Common render codes for all row types
		// MainCD
		// Code
		// Name
		// Order
		// SignCD
		// Collection
		// EditDate
		// SMS
		// Note
		// WorkList
		// Page
		// Incharge
		// AutoNum
		// id

		if ($this->RowType == ROWTYPE_VIEW) { // View row

			// MainCD
			$this->MainCD->ViewValue = $this->MainCD->CurrentValue;
			$this->MainCD->ViewCustomAttributes = "";

			// Code
			$this->Code->ViewValue = $this->Code->CurrentValue;
			$this->Code->ViewCustomAttributes = "";

			// Name
			$this->Name->ViewValue = $this->Name->CurrentValue;
			$this->Name->ViewCustomAttributes = "";

			// Order
			$this->Order->ViewValue = $this->Order->CurrentValue;
			$this->Order->ViewValue = FormatNumber($this->Order->ViewValue, 2, -2, -2, -2);
			$this->Order->ViewCustomAttributes = "";

			// SignCD
			$this->SignCD->ViewValue = $this->SignCD->CurrentValue;
			$this->SignCD->ViewCustomAttributes = "";

			// Collection
			$this->Collection->ViewValue = $this->Collection->CurrentValue;
			$this->Collection->ViewCustomAttributes = "";

			// EditDate
			$this->EditDate->ViewValue = $this->EditDate->CurrentValue;
			$this->EditDate->ViewValue = FormatDateTime($this->EditDate->ViewValue, 0);
			$this->EditDate->ViewCustomAttributes = "";

			// SMS
			$this->SMS->ViewValue = $this->SMS->CurrentValue;
			$this->SMS->ViewCustomAttributes = "";

			// Note
			$this->Note->ViewValue = $this->Note->CurrentValue;
			$this->Note->ViewCustomAttributes = "";

			// WorkList
			$this->WorkList->ViewValue = $this->WorkList->CurrentValue;
			$this->WorkList->ViewCustomAttributes = "";

			// Page
			$this->_Page->ViewValue = $this->_Page->CurrentValue;
			$this->_Page->ViewValue = FormatNumber($this->_Page->ViewValue, 2, -2, -2, -2);
			$this->_Page->ViewCustomAttributes = "";

			// Incharge
			$this->Incharge->ViewValue = $this->Incharge->CurrentValue;
			$this->Incharge->ViewCustomAttributes = "";

			// AutoNum
			$this->AutoNum->ViewValue = $this->AutoNum->CurrentValue;
			$this->AutoNum->ViewCustomAttributes = "";

			// id
			$this->id->ViewValue = $this->id->CurrentValue;
			$this->id->ViewCustomAttributes = "";

			// MainCD
			$this->MainCD->LinkCustomAttributes = "";
			$this->MainCD->HrefValue = "";
			$this->MainCD->TooltipValue = "";

			// Code
			$this->Code->LinkCustomAttributes = "";
			$this->Code->HrefValue = "";
			$this->Code->TooltipValue = "";

			// Name
			$this->Name->LinkCustomAttributes = "";
			$this->Name->HrefValue = "";
			$this->Name->TooltipValue = "";

			// Order
			$this->Order->LinkCustomAttributes = "";
			$this->Order->HrefValue = "";
			$this->Order->TooltipValue = "";

			// SignCD
			$this->SignCD->LinkCustomAttributes = "";
			$this->SignCD->HrefValue = "";
			$this->SignCD->TooltipValue = "";

			// Collection
			$this->Collection->LinkCustomAttributes = "";
			$this->Collection->HrefValue = "";
			$this->Collection->TooltipValue = "";

			// EditDate
			$this->EditDate->LinkCustomAttributes = "";
			$this->EditDate->HrefValue = "";
			$this->EditDate->TooltipValue = "";

			// SMS
			$this->SMS->LinkCustomAttributes = "";
			$this->SMS->HrefValue = "";
			$this->SMS->TooltipValue = "";

			// Note
			$this->Note->LinkCustomAttributes = "";
			$this->Note->HrefValue = "";
			$this->Note->TooltipValue = "";

			// WorkList
			$this->WorkList->LinkCustomAttributes = "";
			$this->WorkList->HrefValue = "";
			$this->WorkList->TooltipValue = "";

			// Page
			$this->_Page->LinkCustomAttributes = "";
			$this->_Page->HrefValue = "";
			$this->_Page->TooltipValue = "";

			// Incharge
			$this->Incharge->LinkCustomAttributes = "";
			$this->Incharge->HrefValue = "";
			$this->Incharge->TooltipValue = "";

			// AutoNum
			$this->AutoNum->LinkCustomAttributes = "";
			$this->AutoNum->HrefValue = "";
			$this->AutoNum->TooltipValue = "";

			// id
			$this->id->LinkCustomAttributes = "";
			$this->id->HrefValue = "";
			$this->id->TooltipValue = "";
		} elseif ($this->RowType == ROWTYPE_EDIT) { // Edit row

			// MainCD
			$this->MainCD->EditAttrs["class"] = "form-control";
			$this->MainCD->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->MainCD->CurrentValue = HtmlDecode($this->MainCD->CurrentValue);
			$this->MainCD->EditValue = HtmlEncode($this->MainCD->CurrentValue);
			$this->MainCD->PlaceHolder = RemoveHtml($this->MainCD->caption());

			// Code
			$this->Code->EditAttrs["class"] = "form-control";
			$this->Code->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Code->CurrentValue = HtmlDecode($this->Code->CurrentValue);
			$this->Code->EditValue = HtmlEncode($this->Code->CurrentValue);
			$this->Code->PlaceHolder = RemoveHtml($this->Code->caption());

			// Name
			$this->Name->EditAttrs["class"] = "form-control";
			$this->Name->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Name->CurrentValue = HtmlDecode($this->Name->CurrentValue);
			$this->Name->EditValue = HtmlEncode($this->Name->CurrentValue);
			$this->Name->PlaceHolder = RemoveHtml($this->Name->caption());

			// Order
			$this->Order->EditAttrs["class"] = "form-control";
			$this->Order->EditCustomAttributes = "";
			$this->Order->EditValue = HtmlEncode($this->Order->CurrentValue);
			$this->Order->PlaceHolder = RemoveHtml($this->Order->caption());
			if (strval($this->Order->EditValue) <> "" && is_numeric($this->Order->EditValue))
				$this->Order->EditValue = FormatNumber($this->Order->EditValue, -2, -2, -2, -2);

			// SignCD
			$this->SignCD->EditAttrs["class"] = "form-control";
			$this->SignCD->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->SignCD->CurrentValue = HtmlDecode($this->SignCD->CurrentValue);
			$this->SignCD->EditValue = HtmlEncode($this->SignCD->CurrentValue);
			$this->SignCD->PlaceHolder = RemoveHtml($this->SignCD->caption());

			// Collection
			$this->Collection->EditAttrs["class"] = "form-control";
			$this->Collection->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Collection->CurrentValue = HtmlDecode($this->Collection->CurrentValue);
			$this->Collection->EditValue = HtmlEncode($this->Collection->CurrentValue);
			$this->Collection->PlaceHolder = RemoveHtml($this->Collection->caption());

			// EditDate
			$this->EditDate->EditAttrs["class"] = "form-control";
			$this->EditDate->EditCustomAttributes = "";
			$this->EditDate->EditValue = HtmlEncode(FormatDateTime($this->EditDate->CurrentValue, 8));
			$this->EditDate->PlaceHolder = RemoveHtml($this->EditDate->caption());

			// SMS
			$this->SMS->EditAttrs["class"] = "form-control";
			$this->SMS->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->SMS->CurrentValue = HtmlDecode($this->SMS->CurrentValue);
			$this->SMS->EditValue = HtmlEncode($this->SMS->CurrentValue);
			$this->SMS->PlaceHolder = RemoveHtml($this->SMS->caption());

			// Note
			$this->Note->EditAttrs["class"] = "form-control";
			$this->Note->EditCustomAttributes = "";
			$this->Note->EditValue = HtmlEncode($this->Note->CurrentValue);
			$this->Note->PlaceHolder = RemoveHtml($this->Note->caption());

			// WorkList
			$this->WorkList->EditAttrs["class"] = "form-control";
			$this->WorkList->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->WorkList->CurrentValue = HtmlDecode($this->WorkList->CurrentValue);
			$this->WorkList->EditValue = HtmlEncode($this->WorkList->CurrentValue);
			$this->WorkList->PlaceHolder = RemoveHtml($this->WorkList->caption());

			// Page
			$this->_Page->EditAttrs["class"] = "form-control";
			$this->_Page->EditCustomAttributes = "";
			$this->_Page->EditValue = HtmlEncode($this->_Page->CurrentValue);
			$this->_Page->PlaceHolder = RemoveHtml($this->_Page->caption());
			if (strval($this->_Page->EditValue) <> "" && is_numeric($this->_Page->EditValue))
				$this->_Page->EditValue = FormatNumber($this->_Page->EditValue, -2, -2, -2, -2);

			// Incharge
			$this->Incharge->EditAttrs["class"] = "form-control";
			$this->Incharge->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Incharge->CurrentValue = HtmlDecode($this->Incharge->CurrentValue);
			$this->Incharge->EditValue = HtmlEncode($this->Incharge->CurrentValue);
			$this->Incharge->PlaceHolder = RemoveHtml($this->Incharge->caption());

			// AutoNum
			$this->AutoNum->EditAttrs["class"] = "form-control";
			$this->AutoNum->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->AutoNum->CurrentValue = HtmlDecode($this->AutoNum->CurrentValue);
			$this->AutoNum->EditValue = HtmlEncode($this->AutoNum->CurrentValue);
			$this->AutoNum->PlaceHolder = RemoveHtml($this->AutoNum->caption());

			// id
			$this->id->EditAttrs["class"] = "form-control";
			$this->id->EditCustomAttributes = "";
			$this->id->EditValue = $this->id->CurrentValue;
			$this->id->ViewCustomAttributes = "";

			// Edit refer script
			// MainCD

			$this->MainCD->LinkCustomAttributes = "";
			$this->MainCD->HrefValue = "";

			// Code
			$this->Code->LinkCustomAttributes = "";
			$this->Code->HrefValue = "";

			// Name
			$this->Name->LinkCustomAttributes = "";
			$this->Name->HrefValue = "";

			// Order
			$this->Order->LinkCustomAttributes = "";
			$this->Order->HrefValue = "";

			// SignCD
			$this->SignCD->LinkCustomAttributes = "";
			$this->SignCD->HrefValue = "";

			// Collection
			$this->Collection->LinkCustomAttributes = "";
			$this->Collection->HrefValue = "";

			// EditDate
			$this->EditDate->LinkCustomAttributes = "";
			$this->EditDate->HrefValue = "";

			// SMS
			$this->SMS->LinkCustomAttributes = "";
			$this->SMS->HrefValue = "";

			// Note
			$this->Note->LinkCustomAttributes = "";
			$this->Note->HrefValue = "";

			// WorkList
			$this->WorkList->LinkCustomAttributes = "";
			$this->WorkList->HrefValue = "";

			// Page
			$this->_Page->LinkCustomAttributes = "";
			$this->_Page->HrefValue = "";

			// Incharge
			$this->Incharge->LinkCustomAttributes = "";
			$this->Incharge->HrefValue = "";

			// AutoNum
			$this->AutoNum->LinkCustomAttributes = "";
			$this->AutoNum->HrefValue = "";

			// id
			$this->id->LinkCustomAttributes = "";
			$this->id->HrefValue = "";
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
		if ($this->MainCD->Required) {
			if (!$this->MainCD->IsDetailKey && $this->MainCD->FormValue != NULL && $this->MainCD->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->MainCD->caption(), $this->MainCD->RequiredErrorMessage));
			}
		}
		if ($this->Code->Required) {
			if (!$this->Code->IsDetailKey && $this->Code->FormValue != NULL && $this->Code->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Code->caption(), $this->Code->RequiredErrorMessage));
			}
		}
		if ($this->Name->Required) {
			if (!$this->Name->IsDetailKey && $this->Name->FormValue != NULL && $this->Name->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Name->caption(), $this->Name->RequiredErrorMessage));
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
		if ($this->SignCD->Required) {
			if (!$this->SignCD->IsDetailKey && $this->SignCD->FormValue != NULL && $this->SignCD->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->SignCD->caption(), $this->SignCD->RequiredErrorMessage));
			}
		}
		if ($this->Collection->Required) {
			if (!$this->Collection->IsDetailKey && $this->Collection->FormValue != NULL && $this->Collection->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Collection->caption(), $this->Collection->RequiredErrorMessage));
			}
		}
		if ($this->EditDate->Required) {
			if (!$this->EditDate->IsDetailKey && $this->EditDate->FormValue != NULL && $this->EditDate->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->EditDate->caption(), $this->EditDate->RequiredErrorMessage));
			}
		}
		if (!CheckDate($this->EditDate->FormValue)) {
			AddMessage($FormError, $this->EditDate->errorMessage());
		}
		if ($this->SMS->Required) {
			if (!$this->SMS->IsDetailKey && $this->SMS->FormValue != NULL && $this->SMS->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->SMS->caption(), $this->SMS->RequiredErrorMessage));
			}
		}
		if ($this->Note->Required) {
			if (!$this->Note->IsDetailKey && $this->Note->FormValue != NULL && $this->Note->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Note->caption(), $this->Note->RequiredErrorMessage));
			}
		}
		if ($this->WorkList->Required) {
			if (!$this->WorkList->IsDetailKey && $this->WorkList->FormValue != NULL && $this->WorkList->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->WorkList->caption(), $this->WorkList->RequiredErrorMessage));
			}
		}
		if ($this->_Page->Required) {
			if (!$this->_Page->IsDetailKey && $this->_Page->FormValue != NULL && $this->_Page->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->_Page->caption(), $this->_Page->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->_Page->FormValue)) {
			AddMessage($FormError, $this->_Page->errorMessage());
		}
		if ($this->Incharge->Required) {
			if (!$this->Incharge->IsDetailKey && $this->Incharge->FormValue != NULL && $this->Incharge->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Incharge->caption(), $this->Incharge->RequiredErrorMessage));
			}
		}
		if ($this->AutoNum->Required) {
			if (!$this->AutoNum->IsDetailKey && $this->AutoNum->FormValue != NULL && $this->AutoNum->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->AutoNum->caption(), $this->AutoNum->RequiredErrorMessage));
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

			// MainCD
			$this->MainCD->setDbValueDef($rsnew, $this->MainCD->CurrentValue, "", $this->MainCD->ReadOnly);

			// Code
			$this->Code->setDbValueDef($rsnew, $this->Code->CurrentValue, "", $this->Code->ReadOnly);

			// Name
			$this->Name->setDbValueDef($rsnew, $this->Name->CurrentValue, "", $this->Name->ReadOnly);

			// Order
			$this->Order->setDbValueDef($rsnew, $this->Order->CurrentValue, 0, $this->Order->ReadOnly);

			// SignCD
			$this->SignCD->setDbValueDef($rsnew, $this->SignCD->CurrentValue, "", $this->SignCD->ReadOnly);

			// Collection
			$this->Collection->setDbValueDef($rsnew, $this->Collection->CurrentValue, "", $this->Collection->ReadOnly);

			// EditDate
			$this->EditDate->setDbValueDef($rsnew, UnFormatDateTime($this->EditDate->CurrentValue, 0), NULL, $this->EditDate->ReadOnly);

			// SMS
			$this->SMS->setDbValueDef($rsnew, $this->SMS->CurrentValue, "", $this->SMS->ReadOnly);

			// Note
			$this->Note->setDbValueDef($rsnew, $this->Note->CurrentValue, "", $this->Note->ReadOnly);

			// WorkList
			$this->WorkList->setDbValueDef($rsnew, $this->WorkList->CurrentValue, "", $this->WorkList->ReadOnly);

			// Page
			$this->_Page->setDbValueDef($rsnew, $this->_Page->CurrentValue, 0, $this->_Page->ReadOnly);

			// Incharge
			$this->Incharge->setDbValueDef($rsnew, $this->Incharge->CurrentValue, "", $this->Incharge->ReadOnly);

			// AutoNum
			$this->AutoNum->setDbValueDef($rsnew, $this->AutoNum->CurrentValue, "", $this->AutoNum->ReadOnly);

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
		$Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("lab_dept_mastlist.php"), "", $this->TableVar, TRUE);
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
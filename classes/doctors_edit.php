<?php
namespace PHPMaker2019\HIMS;

/**
 * Page class
 */
class doctors_edit extends doctors
{

	// Page ID
	public $PageID = "edit";

	// Project ID
	public $ProjectID = "{EA4F6D13-AF8F-428D-9EA7-BA88D1107EC3}";

	// Table name
	public $TableName = 'doctors';

	// Page object name
	public $PageObjName = "doctors_edit";

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

		// Table object (doctors)
		if (!isset($GLOBALS["doctors"]) || get_class($GLOBALS["doctors"]) == PROJECT_NAMESPACE . "doctors") {
			$GLOBALS["doctors"] = &$this;
			$GLOBALS["Table"] = &$GLOBALS["doctors"];
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
			define(PROJECT_NAMESPACE . "TABLE_NAME", 'doctors');

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
		global $EXPORT, $doctors;
		if ($this->CustomExport && $this->CustomExport == $this->Export && array_key_exists($this->CustomExport, $EXPORT)) {
				$content = ob_get_contents();
			if ($ExportFileName == "")
				$ExportFileName = $this->TableVar;
			$class = PROJECT_NAMESPACE . $EXPORT[$this->CustomExport];
			if (class_exists($class)) {
				$doc = new $class($doctors);
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
					if ($pageName == "doctorsview.php")
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
					$this->terminate(GetUrl("doctorslist.php"));
				else
					$this->terminate(GetUrl("login.php"));
				return;
			}
		}

		// Create form object
		$CurrentForm = new HttpForm();
		$this->CurrentAction = Param("action"); // Set up current action
		$this->id->setVisibility();
		$this->CODE->setVisibility();
		$this->NAME->setVisibility();
		$this->DEPARTMENT->setVisibility();
		$this->start_time->setVisibility();
		$this->end_time->setVisibility();
		$this->start_time1->setVisibility();
		$this->end_time1->setVisibility();
		$this->start_time2->setVisibility();
		$this->end_time2->setVisibility();
		$this->slot_time->setVisibility();
		$this->Fees->setVisibility();
		$this->ProfilePic->setVisibility();
		$this->slot_days->setVisibility();
		$this->Status->setVisibility();
		$this->scheduler_id->setVisibility();
		$this->HospID->setVisibility();
		$this->Designation->setVisibility();
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
		$this->setupLookupOptions($this->slot_days);
		$this->setupLookupOptions($this->Status);

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

			// Set up detail parameters
			$this->setupDetailParms();
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
					$this->terminate("doctorslist.php"); // No matching record, return to list
				}

				// Set up detail parameters
				$this->setupDetailParms();
				break;
			case "update": // Update
				if ($this->getCurrentDetailTable() <> "") // Master/detail edit
					$returnUrl = $this->getViewUrl(TABLE_SHOW_DETAIL . "=" . $this->getCurrentDetailTable()); // Master/Detail view page
				else
					$returnUrl = $this->getReturnUrl();
				if (GetPageName($returnUrl) == "doctorslist.php")
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

					// Set up detail parameters
					$this->setupDetailParms();
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
		$this->ProfilePic->Upload->Index = $CurrentForm->Index;
		$this->ProfilePic->Upload->uploadFile();
		$this->ProfilePic->CurrentValue = $this->ProfilePic->Upload->FileName;
	}

	// Load form values
	protected function loadFormValues()
	{

		// Load from form
		global $CurrentForm;
		$this->getUploadFiles(); // Get upload files

		// Check field name 'id' first before field var 'x_id'
		$val = $CurrentForm->hasValue("id") ? $CurrentForm->getValue("id") : $CurrentForm->getValue("x_id");
		if (!$this->id->IsDetailKey)
			$this->id->setFormValue($val);

		// Check field name 'CODE' first before field var 'x_CODE'
		$val = $CurrentForm->hasValue("CODE") ? $CurrentForm->getValue("CODE") : $CurrentForm->getValue("x_CODE");
		if (!$this->CODE->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->CODE->Visible = FALSE; // Disable update for API request
			else
				$this->CODE->setFormValue($val);
		}

		// Check field name 'NAME' first before field var 'x_NAME'
		$val = $CurrentForm->hasValue("NAME") ? $CurrentForm->getValue("NAME") : $CurrentForm->getValue("x_NAME");
		if (!$this->NAME->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->NAME->Visible = FALSE; // Disable update for API request
			else
				$this->NAME->setFormValue($val);
		}

		// Check field name 'DEPARTMENT' first before field var 'x_DEPARTMENT'
		$val = $CurrentForm->hasValue("DEPARTMENT") ? $CurrentForm->getValue("DEPARTMENT") : $CurrentForm->getValue("x_DEPARTMENT");
		if (!$this->DEPARTMENT->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->DEPARTMENT->Visible = FALSE; // Disable update for API request
			else
				$this->DEPARTMENT->setFormValue($val);
		}

		// Check field name 'start_time' first before field var 'x_start_time'
		$val = $CurrentForm->hasValue("start_time") ? $CurrentForm->getValue("start_time") : $CurrentForm->getValue("x_start_time");
		if (!$this->start_time->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->start_time->Visible = FALSE; // Disable update for API request
			else
				$this->start_time->setFormValue($val);
		}

		// Check field name 'end_time' first before field var 'x_end_time'
		$val = $CurrentForm->hasValue("end_time") ? $CurrentForm->getValue("end_time") : $CurrentForm->getValue("x_end_time");
		if (!$this->end_time->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->end_time->Visible = FALSE; // Disable update for API request
			else
				$this->end_time->setFormValue($val);
		}

		// Check field name 'start_time1' first before field var 'x_start_time1'
		$val = $CurrentForm->hasValue("start_time1") ? $CurrentForm->getValue("start_time1") : $CurrentForm->getValue("x_start_time1");
		if (!$this->start_time1->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->start_time1->Visible = FALSE; // Disable update for API request
			else
				$this->start_time1->setFormValue($val);
		}

		// Check field name 'end_time1' first before field var 'x_end_time1'
		$val = $CurrentForm->hasValue("end_time1") ? $CurrentForm->getValue("end_time1") : $CurrentForm->getValue("x_end_time1");
		if (!$this->end_time1->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->end_time1->Visible = FALSE; // Disable update for API request
			else
				$this->end_time1->setFormValue($val);
		}

		// Check field name 'start_time2' first before field var 'x_start_time2'
		$val = $CurrentForm->hasValue("start_time2") ? $CurrentForm->getValue("start_time2") : $CurrentForm->getValue("x_start_time2");
		if (!$this->start_time2->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->start_time2->Visible = FALSE; // Disable update for API request
			else
				$this->start_time2->setFormValue($val);
		}

		// Check field name 'end_time2' first before field var 'x_end_time2'
		$val = $CurrentForm->hasValue("end_time2") ? $CurrentForm->getValue("end_time2") : $CurrentForm->getValue("x_end_time2");
		if (!$this->end_time2->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->end_time2->Visible = FALSE; // Disable update for API request
			else
				$this->end_time2->setFormValue($val);
		}

		// Check field name 'slot_time' first before field var 'x_slot_time'
		$val = $CurrentForm->hasValue("slot_time") ? $CurrentForm->getValue("slot_time") : $CurrentForm->getValue("x_slot_time");
		if (!$this->slot_time->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->slot_time->Visible = FALSE; // Disable update for API request
			else
				$this->slot_time->setFormValue($val);
		}

		// Check field name 'Fees' first before field var 'x_Fees'
		$val = $CurrentForm->hasValue("Fees") ? $CurrentForm->getValue("Fees") : $CurrentForm->getValue("x_Fees");
		if (!$this->Fees->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Fees->Visible = FALSE; // Disable update for API request
			else
				$this->Fees->setFormValue($val);
		}

		// Check field name 'slot_days' first before field var 'x_slot_days'
		$val = $CurrentForm->hasValue("slot_days") ? $CurrentForm->getValue("slot_days") : $CurrentForm->getValue("x_slot_days");
		if (!$this->slot_days->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->slot_days->Visible = FALSE; // Disable update for API request
			else
				$this->slot_days->setFormValue($val);
		}

		// Check field name 'Status' first before field var 'x_Status'
		$val = $CurrentForm->hasValue("Status") ? $CurrentForm->getValue("Status") : $CurrentForm->getValue("x_Status");
		if (!$this->Status->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Status->Visible = FALSE; // Disable update for API request
			else
				$this->Status->setFormValue($val);
		}

		// Check field name 'scheduler_id' first before field var 'x_scheduler_id'
		$val = $CurrentForm->hasValue("scheduler_id") ? $CurrentForm->getValue("scheduler_id") : $CurrentForm->getValue("x_scheduler_id");
		if (!$this->scheduler_id->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->scheduler_id->Visible = FALSE; // Disable update for API request
			else
				$this->scheduler_id->setFormValue($val);
		}

		// Check field name 'HospID' first before field var 'x_HospID'
		$val = $CurrentForm->hasValue("HospID") ? $CurrentForm->getValue("HospID") : $CurrentForm->getValue("x_HospID");
		if (!$this->HospID->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->HospID->Visible = FALSE; // Disable update for API request
			else
				$this->HospID->setFormValue($val);
		}

		// Check field name 'Designation' first before field var 'x_Designation'
		$val = $CurrentForm->hasValue("Designation") ? $CurrentForm->getValue("Designation") : $CurrentForm->getValue("x_Designation");
		if (!$this->Designation->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Designation->Visible = FALSE; // Disable update for API request
			else
				$this->Designation->setFormValue($val);
		}
	}

	// Restore form values
	public function restoreFormValues()
	{
		global $CurrentForm;
		$this->id->CurrentValue = $this->id->FormValue;
		$this->CODE->CurrentValue = $this->CODE->FormValue;
		$this->NAME->CurrentValue = $this->NAME->FormValue;
		$this->DEPARTMENT->CurrentValue = $this->DEPARTMENT->FormValue;
		$this->start_time->CurrentValue = $this->start_time->FormValue;
		$this->end_time->CurrentValue = $this->end_time->FormValue;
		$this->start_time1->CurrentValue = $this->start_time1->FormValue;
		$this->end_time1->CurrentValue = $this->end_time1->FormValue;
		$this->start_time2->CurrentValue = $this->start_time2->FormValue;
		$this->end_time2->CurrentValue = $this->end_time2->FormValue;
		$this->slot_time->CurrentValue = $this->slot_time->FormValue;
		$this->Fees->CurrentValue = $this->Fees->FormValue;
		$this->slot_days->CurrentValue = $this->slot_days->FormValue;
		$this->Status->CurrentValue = $this->Status->FormValue;
		$this->scheduler_id->CurrentValue = $this->scheduler_id->FormValue;
		$this->HospID->CurrentValue = $this->HospID->FormValue;
		$this->Designation->CurrentValue = $this->Designation->FormValue;
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
		$this->CODE->setDbValue($row['CODE']);
		$this->NAME->setDbValue($row['NAME']);
		$this->DEPARTMENT->setDbValue($row['DEPARTMENT']);
		$this->start_time->setDbValue($row['start_time']);
		$this->end_time->setDbValue($row['end_time']);
		$this->start_time1->setDbValue($row['start_time1']);
		$this->end_time1->setDbValue($row['end_time1']);
		$this->start_time2->setDbValue($row['start_time2']);
		$this->end_time2->setDbValue($row['end_time2']);
		$this->slot_time->setDbValue($row['slot_time']);
		$this->Fees->setDbValue($row['Fees']);
		$this->ProfilePic->Upload->DbValue = $row['ProfilePic'];
		$this->ProfilePic->setDbValue($this->ProfilePic->Upload->DbValue);
		$this->slot_days->setDbValue($row['slot_days']);
		$this->Status->setDbValue($row['Status']);
		$this->scheduler_id->setDbValue($row['scheduler_id']);
		$this->HospID->setDbValue($row['HospID']);
		$this->Designation->setDbValue($row['Designation']);
	}

	// Return a row with default values
	protected function newRow()
	{
		$row = [];
		$row['id'] = NULL;
		$row['CODE'] = NULL;
		$row['NAME'] = NULL;
		$row['DEPARTMENT'] = NULL;
		$row['start_time'] = NULL;
		$row['end_time'] = NULL;
		$row['start_time1'] = NULL;
		$row['end_time1'] = NULL;
		$row['start_time2'] = NULL;
		$row['end_time2'] = NULL;
		$row['slot_time'] = NULL;
		$row['Fees'] = NULL;
		$row['ProfilePic'] = NULL;
		$row['slot_days'] = NULL;
		$row['Status'] = NULL;
		$row['scheduler_id'] = NULL;
		$row['HospID'] = NULL;
		$row['Designation'] = NULL;
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

		if ($this->Fees->FormValue == $this->Fees->CurrentValue && is_numeric(ConvertToFloatString($this->Fees->CurrentValue)))
			$this->Fees->CurrentValue = ConvertToFloatString($this->Fees->CurrentValue);

		// Call Row_Rendering event
		$this->Row_Rendering();

		// Common render codes for all row types
		// id
		// CODE
		// NAME
		// DEPARTMENT
		// start_time
		// end_time
		// start_time1
		// end_time1
		// start_time2
		// end_time2
		// slot_time
		// Fees
		// ProfilePic
		// slot_days
		// Status
		// scheduler_id
		// HospID
		// Designation

		if ($this->RowType == ROWTYPE_VIEW) { // View row

			// id
			$this->id->ViewValue = $this->id->CurrentValue;
			$this->id->ViewCustomAttributes = "";

			// CODE
			$this->CODE->ViewValue = $this->CODE->CurrentValue;
			$this->CODE->ViewCustomAttributes = "";

			// NAME
			$this->NAME->ViewValue = $this->NAME->CurrentValue;
			$this->NAME->ViewCustomAttributes = "";

			// DEPARTMENT
			$this->DEPARTMENT->ViewValue = $this->DEPARTMENT->CurrentValue;
			$this->DEPARTMENT->ViewCustomAttributes = "";

			// start_time
			$this->start_time->ViewValue = $this->start_time->CurrentValue;
			$this->start_time->ViewCustomAttributes = "";

			// end_time
			$this->end_time->ViewValue = $this->end_time->CurrentValue;
			$this->end_time->ViewCustomAttributes = "";

			// start_time1
			$this->start_time1->ViewValue = $this->start_time1->CurrentValue;
			$this->start_time1->ViewCustomAttributes = "";

			// end_time1
			$this->end_time1->ViewValue = $this->end_time1->CurrentValue;
			$this->end_time1->ViewCustomAttributes = "";

			// start_time2
			$this->start_time2->ViewValue = $this->start_time2->CurrentValue;
			$this->start_time2->ViewCustomAttributes = "";

			// end_time2
			$this->end_time2->ViewValue = $this->end_time2->CurrentValue;
			$this->end_time2->ViewCustomAttributes = "";

			// slot_time
			$this->slot_time->ViewValue = $this->slot_time->CurrentValue;
			$this->slot_time->ViewCustomAttributes = "";

			// Fees
			$this->Fees->ViewValue = $this->Fees->CurrentValue;
			$this->Fees->ViewValue = FormatNumber($this->Fees->ViewValue, 2, -2, -2, -2);
			$this->Fees->ViewCustomAttributes = "";

			// ProfilePic
			if (!EmptyValue($this->ProfilePic->Upload->DbValue)) {
				$this->ProfilePic->ImageWidth = 80;
				$this->ProfilePic->ImageHeight = 80;
				$this->ProfilePic->ImageAlt = $this->ProfilePic->alt();
				$this->ProfilePic->ViewValue = $this->ProfilePic->Upload->DbValue;
			} else {
				$this->ProfilePic->ViewValue = "";
			}
			$this->ProfilePic->ViewCustomAttributes = "";

			// slot_days
			$curVal = strval($this->slot_days->CurrentValue);
			if ($curVal <> "") {
				$this->slot_days->ViewValue = $this->slot_days->lookupCacheOption($curVal);
				if ($this->slot_days->ViewValue === NULL) { // Lookup from database
					$arwrk = explode(",", $curVal);
					$filterWrk = "";
					foreach ($arwrk as $wrk) {
						if ($filterWrk <> "")
							$filterWrk .= " OR ";
						$filterWrk .= "`id`" . SearchString("=", trim($wrk), DATATYPE_NUMBER, "");
					}
					$sqlWrk = $this->slot_days->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$this->slot_days->ViewValue = new OptionValues();
						$ari = 0;
						while (!$rswrk->EOF) {
							$arwrk = array();
							$arwrk[1] = $rswrk->fields('df');
							$this->slot_days->ViewValue->add($this->slot_days->displayValue($arwrk));
							$rswrk->MoveNext();
							$ari++;
						}
						$rswrk->Close();
					} else {
						$this->slot_days->ViewValue = $this->slot_days->CurrentValue;
					}
				}
			} else {
				$this->slot_days->ViewValue = NULL;
			}
			$this->slot_days->ViewCustomAttributes = "";

			// Status
			$curVal = strval($this->Status->CurrentValue);
			if ($curVal <> "") {
				$this->Status->ViewValue = $this->Status->lookupCacheOption($curVal);
				if ($this->Status->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
					$sqlWrk = $this->Status->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = $rswrk->fields('df');
						$this->Status->ViewValue = $this->Status->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->Status->ViewValue = $this->Status->CurrentValue;
					}
				}
			} else {
				$this->Status->ViewValue = NULL;
			}
			$this->Status->ViewCustomAttributes = "";

			// scheduler_id
			$this->scheduler_id->ViewValue = $this->scheduler_id->CurrentValue;
			$this->scheduler_id->ViewCustomAttributes = "";

			// HospID
			$this->HospID->ViewValue = $this->HospID->CurrentValue;
			$this->HospID->ViewValue = FormatNumber($this->HospID->ViewValue, 0, -2, -2, -2);
			$this->HospID->ViewCustomAttributes = "";

			// Designation
			$this->Designation->ViewValue = $this->Designation->CurrentValue;
			$this->Designation->ViewCustomAttributes = "";

			// id
			$this->id->LinkCustomAttributes = "";
			$this->id->HrefValue = "";
			$this->id->TooltipValue = "";

			// CODE
			$this->CODE->LinkCustomAttributes = "";
			$this->CODE->HrefValue = "";
			$this->CODE->TooltipValue = "";

			// NAME
			$this->NAME->LinkCustomAttributes = "";
			$this->NAME->HrefValue = "";
			$this->NAME->TooltipValue = "";

			// DEPARTMENT
			$this->DEPARTMENT->LinkCustomAttributes = "";
			$this->DEPARTMENT->HrefValue = "";
			$this->DEPARTMENT->TooltipValue = "";

			// start_time
			$this->start_time->LinkCustomAttributes = "";
			$this->start_time->HrefValue = "";
			$this->start_time->TooltipValue = "";

			// end_time
			$this->end_time->LinkCustomAttributes = "";
			$this->end_time->HrefValue = "";
			$this->end_time->TooltipValue = "";

			// start_time1
			$this->start_time1->LinkCustomAttributes = "";
			$this->start_time1->HrefValue = "";
			$this->start_time1->TooltipValue = "";

			// end_time1
			$this->end_time1->LinkCustomAttributes = "";
			$this->end_time1->HrefValue = "";
			$this->end_time1->TooltipValue = "";

			// start_time2
			$this->start_time2->LinkCustomAttributes = "";
			$this->start_time2->HrefValue = "";
			$this->start_time2->TooltipValue = "";

			// end_time2
			$this->end_time2->LinkCustomAttributes = "";
			$this->end_time2->HrefValue = "";
			$this->end_time2->TooltipValue = "";

			// slot_time
			$this->slot_time->LinkCustomAttributes = "";
			$this->slot_time->HrefValue = "";
			$this->slot_time->TooltipValue = "";

			// Fees
			$this->Fees->LinkCustomAttributes = "";
			$this->Fees->HrefValue = "";
			$this->Fees->TooltipValue = "";

			// ProfilePic
			$this->ProfilePic->LinkCustomAttributes = "";
			if (!EmptyValue($this->ProfilePic->Upload->DbValue)) {
				$this->ProfilePic->HrefValue = GetFileUploadUrl($this->ProfilePic, $this->ProfilePic->Upload->DbValue); // Add prefix/suffix
				$this->ProfilePic->LinkAttrs["target"] = ""; // Add target
				if ($this->isExport()) $this->ProfilePic->HrefValue = FullUrl($this->ProfilePic->HrefValue, "href");
			} else {
				$this->ProfilePic->HrefValue = "";
			}
			$this->ProfilePic->ExportHrefValue = $this->ProfilePic->UploadPath . $this->ProfilePic->Upload->DbValue;
			$this->ProfilePic->TooltipValue = "";
			if ($this->ProfilePic->UseColorbox) {
				if (EmptyValue($this->ProfilePic->TooltipValue))
					$this->ProfilePic->LinkAttrs["title"] = $Language->phrase("ViewImageGallery");
				$this->ProfilePic->LinkAttrs["data-rel"] = "doctors_x_ProfilePic";
				AppendClass($this->ProfilePic->LinkAttrs["class"], "ew-lightbox");
			}

			// slot_days
			$this->slot_days->LinkCustomAttributes = "";
			$this->slot_days->HrefValue = "";
			$this->slot_days->TooltipValue = "";

			// Status
			$this->Status->LinkCustomAttributes = "";
			$this->Status->HrefValue = "";
			$this->Status->TooltipValue = "";

			// scheduler_id
			$this->scheduler_id->LinkCustomAttributes = "";
			$this->scheduler_id->HrefValue = "";
			$this->scheduler_id->TooltipValue = "";

			// HospID
			$this->HospID->LinkCustomAttributes = "";
			$this->HospID->HrefValue = "";
			$this->HospID->TooltipValue = "";

			// Designation
			$this->Designation->LinkCustomAttributes = "";
			$this->Designation->HrefValue = "";
			$this->Designation->TooltipValue = "";
		} elseif ($this->RowType == ROWTYPE_EDIT) { // Edit row

			// id
			$this->id->EditAttrs["class"] = "form-control";
			$this->id->EditCustomAttributes = "";
			$this->id->EditValue = $this->id->CurrentValue;
			$this->id->ViewCustomAttributes = "";

			// CODE
			$this->CODE->EditAttrs["class"] = "form-control";
			$this->CODE->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->CODE->CurrentValue = HtmlDecode($this->CODE->CurrentValue);
			$this->CODE->EditValue = HtmlEncode($this->CODE->CurrentValue);
			$this->CODE->PlaceHolder = RemoveHtml($this->CODE->caption());

			// NAME
			$this->NAME->EditAttrs["class"] = "form-control";
			$this->NAME->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->NAME->CurrentValue = HtmlDecode($this->NAME->CurrentValue);
			$this->NAME->EditValue = HtmlEncode($this->NAME->CurrentValue);
			$this->NAME->PlaceHolder = RemoveHtml($this->NAME->caption());

			// DEPARTMENT
			$this->DEPARTMENT->EditAttrs["class"] = "form-control";
			$this->DEPARTMENT->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->DEPARTMENT->CurrentValue = HtmlDecode($this->DEPARTMENT->CurrentValue);
			$this->DEPARTMENT->EditValue = HtmlEncode($this->DEPARTMENT->CurrentValue);
			$this->DEPARTMENT->PlaceHolder = RemoveHtml($this->DEPARTMENT->caption());

			// start_time
			$this->start_time->EditAttrs["class"] = "form-control";
			$this->start_time->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->start_time->CurrentValue = HtmlDecode($this->start_time->CurrentValue);
			$this->start_time->EditValue = HtmlEncode($this->start_time->CurrentValue);
			$this->start_time->PlaceHolder = RemoveHtml($this->start_time->caption());

			// end_time
			$this->end_time->EditAttrs["class"] = "form-control";
			$this->end_time->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->end_time->CurrentValue = HtmlDecode($this->end_time->CurrentValue);
			$this->end_time->EditValue = HtmlEncode($this->end_time->CurrentValue);
			$this->end_time->PlaceHolder = RemoveHtml($this->end_time->caption());

			// start_time1
			$this->start_time1->EditAttrs["class"] = "form-control";
			$this->start_time1->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->start_time1->CurrentValue = HtmlDecode($this->start_time1->CurrentValue);
			$this->start_time1->EditValue = HtmlEncode($this->start_time1->CurrentValue);
			$this->start_time1->PlaceHolder = RemoveHtml($this->start_time1->caption());

			// end_time1
			$this->end_time1->EditAttrs["class"] = "form-control";
			$this->end_time1->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->end_time1->CurrentValue = HtmlDecode($this->end_time1->CurrentValue);
			$this->end_time1->EditValue = HtmlEncode($this->end_time1->CurrentValue);
			$this->end_time1->PlaceHolder = RemoveHtml($this->end_time1->caption());

			// start_time2
			$this->start_time2->EditAttrs["class"] = "form-control";
			$this->start_time2->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->start_time2->CurrentValue = HtmlDecode($this->start_time2->CurrentValue);
			$this->start_time2->EditValue = HtmlEncode($this->start_time2->CurrentValue);
			$this->start_time2->PlaceHolder = RemoveHtml($this->start_time2->caption());

			// end_time2
			$this->end_time2->EditAttrs["class"] = "form-control";
			$this->end_time2->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->end_time2->CurrentValue = HtmlDecode($this->end_time2->CurrentValue);
			$this->end_time2->EditValue = HtmlEncode($this->end_time2->CurrentValue);
			$this->end_time2->PlaceHolder = RemoveHtml($this->end_time2->caption());

			// slot_time
			$this->slot_time->EditAttrs["class"] = "form-control";
			$this->slot_time->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->slot_time->CurrentValue = HtmlDecode($this->slot_time->CurrentValue);
			$this->slot_time->EditValue = HtmlEncode($this->slot_time->CurrentValue);
			$this->slot_time->PlaceHolder = RemoveHtml($this->slot_time->caption());

			// Fees
			$this->Fees->EditAttrs["class"] = "form-control";
			$this->Fees->EditCustomAttributes = "";
			$this->Fees->EditValue = HtmlEncode($this->Fees->CurrentValue);
			$this->Fees->PlaceHolder = RemoveHtml($this->Fees->caption());
			if (strval($this->Fees->EditValue) <> "" && is_numeric($this->Fees->EditValue))
				$this->Fees->EditValue = FormatNumber($this->Fees->EditValue, -2, -2, -2, -2);

			// ProfilePic
			$this->ProfilePic->EditAttrs["class"] = "form-control";
			$this->ProfilePic->EditCustomAttributes = "";
			if (!EmptyValue($this->ProfilePic->Upload->DbValue)) {
				$this->ProfilePic->ImageWidth = 80;
				$this->ProfilePic->ImageHeight = 80;
				$this->ProfilePic->ImageAlt = $this->ProfilePic->alt();
				$this->ProfilePic->EditValue = $this->ProfilePic->Upload->DbValue;
			} else {
				$this->ProfilePic->EditValue = "";
			}
			if (!EmptyValue($this->ProfilePic->CurrentValue))
					$this->ProfilePic->Upload->FileName = $this->ProfilePic->CurrentValue;
			if ($this->isShow() && !$this->EventCancelled)
				RenderUploadField($this->ProfilePic);

			// slot_days
			$this->slot_days->EditCustomAttributes = "";
			$curVal = trim(strval($this->slot_days->CurrentValue));
			if ($curVal <> "")
				$this->slot_days->ViewValue = $this->slot_days->lookupCacheOption($curVal);
			else
				$this->slot_days->ViewValue = $this->slot_days->Lookup !== NULL && is_array($this->slot_days->Lookup->Options) ? $curVal : NULL;
			if ($this->slot_days->ViewValue !== NULL) { // Load from cache
				$this->slot_days->EditValue = array_values($this->slot_days->Lookup->Options);
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
				$sqlWrk = $this->slot_days->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
				if ($rswrk) $rswrk->Close();
				$this->slot_days->EditValue = $arwrk;
			}

			// Status
			$this->Status->EditAttrs["class"] = "form-control";
			$this->Status->EditCustomAttributes = "";
			$curVal = trim(strval($this->Status->CurrentValue));
			if ($curVal <> "")
				$this->Status->ViewValue = $this->Status->lookupCacheOption($curVal);
			else
				$this->Status->ViewValue = $this->Status->Lookup !== NULL && is_array($this->Status->Lookup->Options) ? $curVal : NULL;
			if ($this->Status->ViewValue !== NULL) { // Load from cache
				$this->Status->EditValue = array_values($this->Status->Lookup->Options);
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`id`" . SearchString("=", $this->Status->CurrentValue, DATATYPE_NUMBER, "");
				}
				$sqlWrk = $this->Status->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
				if ($rswrk) $rswrk->Close();
				$this->Status->EditValue = $arwrk;
			}

			// scheduler_id
			$this->scheduler_id->EditAttrs["class"] = "form-control";
			$this->scheduler_id->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->scheduler_id->CurrentValue = HtmlDecode($this->scheduler_id->CurrentValue);
			$this->scheduler_id->EditValue = HtmlEncode($this->scheduler_id->CurrentValue);
			$this->scheduler_id->PlaceHolder = RemoveHtml($this->scheduler_id->caption());

			// HospID
			// Designation

			$this->Designation->EditAttrs["class"] = "form-control";
			$this->Designation->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Designation->CurrentValue = HtmlDecode($this->Designation->CurrentValue);
			$this->Designation->EditValue = HtmlEncode($this->Designation->CurrentValue);
			$this->Designation->PlaceHolder = RemoveHtml($this->Designation->caption());

			// Edit refer script
			// id

			$this->id->LinkCustomAttributes = "";
			$this->id->HrefValue = "";

			// CODE
			$this->CODE->LinkCustomAttributes = "";
			$this->CODE->HrefValue = "";

			// NAME
			$this->NAME->LinkCustomAttributes = "";
			$this->NAME->HrefValue = "";

			// DEPARTMENT
			$this->DEPARTMENT->LinkCustomAttributes = "";
			$this->DEPARTMENT->HrefValue = "";

			// start_time
			$this->start_time->LinkCustomAttributes = "";
			$this->start_time->HrefValue = "";

			// end_time
			$this->end_time->LinkCustomAttributes = "";
			$this->end_time->HrefValue = "";

			// start_time1
			$this->start_time1->LinkCustomAttributes = "";
			$this->start_time1->HrefValue = "";

			// end_time1
			$this->end_time1->LinkCustomAttributes = "";
			$this->end_time1->HrefValue = "";

			// start_time2
			$this->start_time2->LinkCustomAttributes = "";
			$this->start_time2->HrefValue = "";

			// end_time2
			$this->end_time2->LinkCustomAttributes = "";
			$this->end_time2->HrefValue = "";

			// slot_time
			$this->slot_time->LinkCustomAttributes = "";
			$this->slot_time->HrefValue = "";

			// Fees
			$this->Fees->LinkCustomAttributes = "";
			$this->Fees->HrefValue = "";

			// ProfilePic
			$this->ProfilePic->LinkCustomAttributes = "";
			if (!EmptyValue($this->ProfilePic->Upload->DbValue)) {
				$this->ProfilePic->HrefValue = GetFileUploadUrl($this->ProfilePic, $this->ProfilePic->Upload->DbValue); // Add prefix/suffix
				$this->ProfilePic->LinkAttrs["target"] = ""; // Add target
				if ($this->isExport()) $this->ProfilePic->HrefValue = FullUrl($this->ProfilePic->HrefValue, "href");
			} else {
				$this->ProfilePic->HrefValue = "";
			}
			$this->ProfilePic->ExportHrefValue = $this->ProfilePic->UploadPath . $this->ProfilePic->Upload->DbValue;

			// slot_days
			$this->slot_days->LinkCustomAttributes = "";
			$this->slot_days->HrefValue = "";

			// Status
			$this->Status->LinkCustomAttributes = "";
			$this->Status->HrefValue = "";

			// scheduler_id
			$this->scheduler_id->LinkCustomAttributes = "";
			$this->scheduler_id->HrefValue = "";

			// HospID
			$this->HospID->LinkCustomAttributes = "";
			$this->HospID->HrefValue = "";

			// Designation
			$this->Designation->LinkCustomAttributes = "";
			$this->Designation->HrefValue = "";
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
		if ($this->CODE->Required) {
			if (!$this->CODE->IsDetailKey && $this->CODE->FormValue != NULL && $this->CODE->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->CODE->caption(), $this->CODE->RequiredErrorMessage));
			}
		}
		if ($this->NAME->Required) {
			if (!$this->NAME->IsDetailKey && $this->NAME->FormValue != NULL && $this->NAME->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->NAME->caption(), $this->NAME->RequiredErrorMessage));
			}
		}
		if ($this->DEPARTMENT->Required) {
			if (!$this->DEPARTMENT->IsDetailKey && $this->DEPARTMENT->FormValue != NULL && $this->DEPARTMENT->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->DEPARTMENT->caption(), $this->DEPARTMENT->RequiredErrorMessage));
			}
		}
		if ($this->start_time->Required) {
			if (!$this->start_time->IsDetailKey && $this->start_time->FormValue != NULL && $this->start_time->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->start_time->caption(), $this->start_time->RequiredErrorMessage));
			}
		}
		if ($this->end_time->Required) {
			if (!$this->end_time->IsDetailKey && $this->end_time->FormValue != NULL && $this->end_time->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->end_time->caption(), $this->end_time->RequiredErrorMessage));
			}
		}
		if ($this->start_time1->Required) {
			if (!$this->start_time1->IsDetailKey && $this->start_time1->FormValue != NULL && $this->start_time1->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->start_time1->caption(), $this->start_time1->RequiredErrorMessage));
			}
		}
		if ($this->end_time1->Required) {
			if (!$this->end_time1->IsDetailKey && $this->end_time1->FormValue != NULL && $this->end_time1->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->end_time1->caption(), $this->end_time1->RequiredErrorMessage));
			}
		}
		if ($this->start_time2->Required) {
			if (!$this->start_time2->IsDetailKey && $this->start_time2->FormValue != NULL && $this->start_time2->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->start_time2->caption(), $this->start_time2->RequiredErrorMessage));
			}
		}
		if ($this->end_time2->Required) {
			if (!$this->end_time2->IsDetailKey && $this->end_time2->FormValue != NULL && $this->end_time2->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->end_time2->caption(), $this->end_time2->RequiredErrorMessage));
			}
		}
		if ($this->slot_time->Required) {
			if (!$this->slot_time->IsDetailKey && $this->slot_time->FormValue != NULL && $this->slot_time->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->slot_time->caption(), $this->slot_time->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->slot_time->FormValue)) {
			AddMessage($FormError, $this->slot_time->errorMessage());
		}
		if ($this->Fees->Required) {
			if (!$this->Fees->IsDetailKey && $this->Fees->FormValue != NULL && $this->Fees->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Fees->caption(), $this->Fees->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->Fees->FormValue)) {
			AddMessage($FormError, $this->Fees->errorMessage());
		}
		if ($this->ProfilePic->Required) {
			if ($this->ProfilePic->Upload->FileName == "" && !$this->ProfilePic->Upload->KeepFile) {
				AddMessage($FormError, str_replace("%s", $this->ProfilePic->caption(), $this->ProfilePic->RequiredErrorMessage));
			}
		}
		if ($this->slot_days->Required) {
			if ($this->slot_days->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->slot_days->caption(), $this->slot_days->RequiredErrorMessage));
			}
		}
		if ($this->Status->Required) {
			if (!$this->Status->IsDetailKey && $this->Status->FormValue != NULL && $this->Status->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Status->caption(), $this->Status->RequiredErrorMessage));
			}
		}
		if ($this->scheduler_id->Required) {
			if (!$this->scheduler_id->IsDetailKey && $this->scheduler_id->FormValue != NULL && $this->scheduler_id->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->scheduler_id->caption(), $this->scheduler_id->RequiredErrorMessage));
			}
		}
		if ($this->HospID->Required) {
			if (!$this->HospID->IsDetailKey && $this->HospID->FormValue != NULL && $this->HospID->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->HospID->caption(), $this->HospID->RequiredErrorMessage));
			}
		}
		if ($this->Designation->Required) {
			if (!$this->Designation->IsDetailKey && $this->Designation->FormValue != NULL && $this->Designation->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Designation->caption(), $this->Designation->RequiredErrorMessage));
			}
		}

		// Validate detail grid
		$detailTblVar = explode(",", $this->getCurrentDetailTable());
		if (in_array("_appointment_scheduler", $detailTblVar) && $GLOBALS["_appointment_scheduler"]->DetailEdit) {
			if (!isset($GLOBALS["_appointment_scheduler_grid"]))
				$GLOBALS["_appointment_scheduler_grid"] = new _appointment_scheduler_grid(); // Get detail page object
			$GLOBALS["_appointment_scheduler_grid"]->validateGridForm();
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

			// Begin transaction
			if ($this->getCurrentDetailTable() <> "")
				$conn->beginTrans();

			// Save old values
			$rsold = &$rs->fields;
			$this->loadDbValues($rsold);
			$rsnew = [];

			// CODE
			$this->CODE->setDbValueDef($rsnew, $this->CODE->CurrentValue, NULL, $this->CODE->ReadOnly);

			// NAME
			$this->NAME->setDbValueDef($rsnew, $this->NAME->CurrentValue, NULL, $this->NAME->ReadOnly);

			// DEPARTMENT
			$this->DEPARTMENT->setDbValueDef($rsnew, $this->DEPARTMENT->CurrentValue, NULL, $this->DEPARTMENT->ReadOnly);

			// start_time
			$this->start_time->setDbValueDef($rsnew, $this->start_time->CurrentValue, NULL, $this->start_time->ReadOnly);

			// end_time
			$this->end_time->setDbValueDef($rsnew, $this->end_time->CurrentValue, NULL, $this->end_time->ReadOnly);

			// start_time1
			$this->start_time1->setDbValueDef($rsnew, $this->start_time1->CurrentValue, NULL, $this->start_time1->ReadOnly);

			// end_time1
			$this->end_time1->setDbValueDef($rsnew, $this->end_time1->CurrentValue, NULL, $this->end_time1->ReadOnly);

			// start_time2
			$this->start_time2->setDbValueDef($rsnew, $this->start_time2->CurrentValue, NULL, $this->start_time2->ReadOnly);

			// end_time2
			$this->end_time2->setDbValueDef($rsnew, $this->end_time2->CurrentValue, NULL, $this->end_time2->ReadOnly);

			// slot_time
			$this->slot_time->setDbValueDef($rsnew, $this->slot_time->CurrentValue, NULL, $this->slot_time->ReadOnly);

			// Fees
			$this->Fees->setDbValueDef($rsnew, $this->Fees->CurrentValue, NULL, $this->Fees->ReadOnly);

			// ProfilePic
			if ($this->ProfilePic->Visible && !$this->ProfilePic->ReadOnly && !$this->ProfilePic->Upload->KeepFile) {
				$this->ProfilePic->Upload->DbValue = $rsold['ProfilePic']; // Get original value
				if ($this->ProfilePic->Upload->FileName == "") {
					$rsnew['ProfilePic'] = NULL;
				} else {
					$rsnew['ProfilePic'] = $this->ProfilePic->Upload->FileName;
				}
			}

			// slot_days
			$this->slot_days->setDbValueDef($rsnew, $this->slot_days->CurrentValue, NULL, $this->slot_days->ReadOnly);

			// Status
			$this->Status->setDbValueDef($rsnew, $this->Status->CurrentValue, NULL, $this->Status->ReadOnly);

			// scheduler_id
			$this->scheduler_id->setDbValueDef($rsnew, $this->scheduler_id->CurrentValue, NULL, $this->scheduler_id->ReadOnly);

			// HospID
			$this->HospID->setDbValueDef($rsnew, HospitalID(), NULL);
			$rsnew['HospID'] = &$this->HospID->DbValue;

			// Designation
			$this->Designation->setDbValueDef($rsnew, $this->Designation->CurrentValue, NULL, $this->Designation->ReadOnly);
			if ($this->ProfilePic->Visible && !$this->ProfilePic->Upload->KeepFile) {
				$oldFiles = EmptyValue($this->ProfilePic->Upload->DbValue) ? array() : array($this->ProfilePic->Upload->DbValue);
				if (!EmptyValue($this->ProfilePic->Upload->FileName)) {
					$newFiles = array($this->ProfilePic->Upload->FileName);
					$NewFileCount = count($newFiles);
					for ($i = 0; $i < $NewFileCount; $i++) {
						if ($newFiles[$i] <> "") {
							$file = $newFiles[$i];
							if (file_exists(UploadTempPath($this->ProfilePic, $this->ProfilePic->Upload->Index) . $file)) {
								if (DELETE_UPLOADED_FILES) {
									$oldFileFound = FALSE;
									$oldFileCount = count($oldFiles);
									for ($j = 0; $j < $oldFileCount; $j++) {
										$oldFile = $oldFiles[$j];
										if ($oldFile == $file) { // Old file found, no need to delete anymore
											unset($oldFiles[$j]);
											$oldFileFound = TRUE;
											break;
										}
									}
									if ($oldFileFound) // No need to check if file exists further
										continue;
								}
								$file1 = UniqueFilename($this->ProfilePic->physicalUploadPath(), $file); // Get new file name
								if ($file1 <> $file) { // Rename temp file
									while (file_exists(UploadTempPath($this->ProfilePic, $this->ProfilePic->Upload->Index) . $file1) || file_exists($this->ProfilePic->physicalUploadPath() . $file1)) // Make sure no file name clash
										$file1 = UniqueFilename($this->ProfilePic->physicalUploadPath(), $file1, TRUE); // Use indexed name
									rename(UploadTempPath($this->ProfilePic, $this->ProfilePic->Upload->Index) . $file, UploadTempPath($this->ProfilePic, $this->ProfilePic->Upload->Index) . $file1);
									$newFiles[$i] = $file1;
								}
							}
						}
					}
					$this->ProfilePic->Upload->DbValue = empty($oldFiles) ? "" : implode(MULTIPLE_UPLOAD_SEPARATOR, $oldFiles);
					$this->ProfilePic->Upload->FileName = implode(MULTIPLE_UPLOAD_SEPARATOR, $newFiles);
					$this->ProfilePic->setDbValueDef($rsnew, $this->ProfilePic->Upload->FileName, NULL, $this->ProfilePic->ReadOnly);
				}
			}

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
					if ($this->ProfilePic->Visible && !$this->ProfilePic->Upload->KeepFile) {
						$oldFiles = EmptyValue($this->ProfilePic->Upload->DbValue) ? array() : array($this->ProfilePic->Upload->DbValue);
						if (!EmptyValue($this->ProfilePic->Upload->FileName)) {
							$newFiles = array($this->ProfilePic->Upload->FileName);
							$newFiles2 = array($rsnew['ProfilePic']);
							$newFileCount = count($newFiles);
							for ($i = 0; $i < $newFileCount; $i++) {
								if ($newFiles[$i] <> "") {
									$file = UploadTempPath($this->ProfilePic, $this->ProfilePic->Upload->Index) . $newFiles[$i];
									if (file_exists($file)) {
										if (@$newFiles2[$i] <> "") // Use correct file name
											$newFiles[$i] = $newFiles2[$i];
										if (!$this->ProfilePic->Upload->saveToFile($newFiles[$i], TRUE, $i)) { // Just replace
											$this->setFailureMessage($Language->phrase("UploadErrMsg7"));
											return FALSE;
										}
									}
								}
							}
						} else {
							$newFiles = array();
						}
						if (DELETE_UPLOADED_FILES) {
							foreach ($oldFiles as $oldFile) {
								if ($oldFile <> "" && !in_array($oldFile, $newFiles))
									@unlink($this->ProfilePic->oldPhysicalUploadPath() . $oldFile);
							}
						}
					}
				}

				// Update detail records
				$detailTblVar = explode(",", $this->getCurrentDetailTable());
				if ($editRow) {
					if (in_array("_appointment_scheduler", $detailTblVar) && $GLOBALS["_appointment_scheduler"]->DetailEdit) {
						if (!isset($GLOBALS["_appointment_scheduler_grid"]))
							$GLOBALS["_appointment_scheduler_grid"] = new _appointment_scheduler_grid(); // Get detail page object
						$Security->loadCurrentUserLevel($this->ProjectID . "appointment_scheduler"); // Load user level of detail table
						$editRow = $GLOBALS["_appointment_scheduler_grid"]->gridUpdate();
						$Security->loadCurrentUserLevel($this->ProjectID . $this->TableName); // Restore user level of master table
					}
				}

				// Commit/Rollback transaction
				if ($this->getCurrentDetailTable() <> "") {
					if ($editRow) {
						$conn->commitTrans(); // Commit transaction
					} else {
						$conn->rollbackTrans(); // Rollback transaction
					}
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

		// ProfilePic
		if ($this->ProfilePic->Upload->FileToken <> "")
			CleanUploadTempPath($this->ProfilePic->Upload->FileToken, $this->ProfilePic->Upload->Index);
		else
			CleanUploadTempPath($this->ProfilePic, $this->ProfilePic->Upload->Index);

		// Write JSON for API request
		if (IsApi() && $editRow) {
			$row = $this->getRecordsFromRecordset([$rsnew], TRUE);
			WriteJson(["success" => TRUE, $this->TableVar => $row]);
		}
		return $editRow;
	}

	// Set up detail parms based on QueryString
	protected function setupDetailParms()
	{

		// Get the keys for master table
		if (Get(TABLE_SHOW_DETAIL) !== NULL) {
			$detailTblVar = Get(TABLE_SHOW_DETAIL);
			$this->setCurrentDetailTable($detailTblVar);
		} else {
			$detailTblVar = $this->getCurrentDetailTable();
		}
		if ($detailTblVar <> "") {
			$detailTblVar = explode(",", $detailTblVar);
			if (in_array("_appointment_scheduler", $detailTblVar)) {
				if (!isset($GLOBALS["_appointment_scheduler_grid"]))
					$GLOBALS["_appointment_scheduler_grid"] = new _appointment_scheduler_grid();
				if ($GLOBALS["_appointment_scheduler_grid"]->DetailEdit) {
					$GLOBALS["_appointment_scheduler_grid"]->CurrentMode = "edit";
					$GLOBALS["_appointment_scheduler_grid"]->CurrentAction = "gridedit";

					// Save current master table to detail table
					$GLOBALS["_appointment_scheduler_grid"]->setCurrentMasterTable($this->TableVar);
					$GLOBALS["_appointment_scheduler_grid"]->setStartRecordNumber(1);
					$GLOBALS["_appointment_scheduler_grid"]->DoctorID->IsDetailKey = TRUE;
					$GLOBALS["_appointment_scheduler_grid"]->DoctorID->CurrentValue = $this->id->CurrentValue;
					$GLOBALS["_appointment_scheduler_grid"]->DoctorID->setSessionValue($GLOBALS["_appointment_scheduler_grid"]->DoctorID->CurrentValue);
				}
			}
		}
	}

	// Set up Breadcrumb
	protected function setupBreadcrumb()
	{
		global $Breadcrumb, $Language;
		$Breadcrumb = new Breadcrumb();
		$url = substr(CurrentUrl(), strrpos(CurrentUrl(), "/")+1);
		$Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("doctorslist.php"), "", $this->TableVar, TRUE);
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
						case "x_slot_days":
							break;
						case "x_Status":
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
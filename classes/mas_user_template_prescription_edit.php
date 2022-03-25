<?php
namespace PHPMaker2019\HIMS;

/**
 * Page class
 */
class mas_user_template_prescription_edit extends mas_user_template_prescription
{

	// Page ID
	public $PageID = "edit";

	// Project ID
	public $ProjectID = "{EA4F6D13-AF8F-428D-9EA7-BA88D1107EC3}";

	// Table name
	public $TableName = 'mas_user_template_prescription';

	// Page object name
	public $PageObjName = "mas_user_template_prescription_edit";

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

		// Table object (mas_user_template_prescription)
		if (!isset($GLOBALS["mas_user_template_prescription"]) || get_class($GLOBALS["mas_user_template_prescription"]) == PROJECT_NAMESPACE . "mas_user_template_prescription") {
			$GLOBALS["mas_user_template_prescription"] = &$this;
			$GLOBALS["Table"] = &$GLOBALS["mas_user_template_prescription"];
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
			define(PROJECT_NAMESPACE . "TABLE_NAME", 'mas_user_template_prescription');

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
		global $EXPORT, $mas_user_template_prescription;
		if ($this->CustomExport && $this->CustomExport == $this->Export && array_key_exists($this->CustomExport, $EXPORT)) {
				$content = ob_get_contents();
			if ($ExportFileName == "")
				$ExportFileName = $this->TableVar;
			$class = PROJECT_NAMESPACE . $EXPORT[$this->CustomExport];
			if (class_exists($class)) {
				$doc = new $class($mas_user_template_prescription);
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
					if ($pageName == "mas_user_template_prescriptionview.php")
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
					$this->terminate(GetUrl("mas_user_template_prescriptionlist.php"));
				else
					$this->terminate(GetUrl("login.php"));
				return;
			}
		}

		// Create form object
		$CurrentForm = new HttpForm();
		$this->CurrentAction = Param("action"); // Set up current action
		$this->id->setVisibility();
		$this->TemplateName->setVisibility();
		$this->Medicine->setVisibility();
		$this->M->setVisibility();
		$this->A->setVisibility();
		$this->N->setVisibility();
		$this->NoOfDays->setVisibility();
		$this->PreRoute->setVisibility();
		$this->TimeOfTaking->setVisibility();
		$this->Type->Visible = FALSE;
		$this->Status->setVisibility();
		$this->CreatedBy->setVisibility();
		$this->CreateDateTime->setVisibility();
		$this->ModifiedBy->setVisibility();
		$this->ModifiedDateTime->setVisibility();
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
		$this->setupLookupOptions($this->TemplateName);
		$this->setupLookupOptions($this->Medicine);
		$this->setupLookupOptions($this->PreRoute);
		$this->setupLookupOptions($this->TimeOfTaking);

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
					$this->terminate("mas_user_template_prescriptionlist.php"); // No matching record, return to list
				}
				break;
			case "update": // Update
				$returnUrl = $this->getReturnUrl();
				if (GetPageName($returnUrl) == "mas_user_template_prescriptionlist.php")
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

		// Check field name 'TemplateName' first before field var 'x_TemplateName'
		$val = $CurrentForm->hasValue("TemplateName") ? $CurrentForm->getValue("TemplateName") : $CurrentForm->getValue("x_TemplateName");
		if (!$this->TemplateName->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->TemplateName->Visible = FALSE; // Disable update for API request
			else
				$this->TemplateName->setFormValue($val);
		}

		// Check field name 'Medicine' first before field var 'x_Medicine'
		$val = $CurrentForm->hasValue("Medicine") ? $CurrentForm->getValue("Medicine") : $CurrentForm->getValue("x_Medicine");
		if (!$this->Medicine->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Medicine->Visible = FALSE; // Disable update for API request
			else
				$this->Medicine->setFormValue($val);
		}

		// Check field name 'M' first before field var 'x_M'
		$val = $CurrentForm->hasValue("M") ? $CurrentForm->getValue("M") : $CurrentForm->getValue("x_M");
		if (!$this->M->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->M->Visible = FALSE; // Disable update for API request
			else
				$this->M->setFormValue($val);
		}

		// Check field name 'A' first before field var 'x_A'
		$val = $CurrentForm->hasValue("A") ? $CurrentForm->getValue("A") : $CurrentForm->getValue("x_A");
		if (!$this->A->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->A->Visible = FALSE; // Disable update for API request
			else
				$this->A->setFormValue($val);
		}

		// Check field name 'N' first before field var 'x_N'
		$val = $CurrentForm->hasValue("N") ? $CurrentForm->getValue("N") : $CurrentForm->getValue("x_N");
		if (!$this->N->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->N->Visible = FALSE; // Disable update for API request
			else
				$this->N->setFormValue($val);
		}

		// Check field name 'NoOfDays' first before field var 'x_NoOfDays'
		$val = $CurrentForm->hasValue("NoOfDays") ? $CurrentForm->getValue("NoOfDays") : $CurrentForm->getValue("x_NoOfDays");
		if (!$this->NoOfDays->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->NoOfDays->Visible = FALSE; // Disable update for API request
			else
				$this->NoOfDays->setFormValue($val);
		}

		// Check field name 'PreRoute' first before field var 'x_PreRoute'
		$val = $CurrentForm->hasValue("PreRoute") ? $CurrentForm->getValue("PreRoute") : $CurrentForm->getValue("x_PreRoute");
		if (!$this->PreRoute->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->PreRoute->Visible = FALSE; // Disable update for API request
			else
				$this->PreRoute->setFormValue($val);
		}

		// Check field name 'TimeOfTaking' first before field var 'x_TimeOfTaking'
		$val = $CurrentForm->hasValue("TimeOfTaking") ? $CurrentForm->getValue("TimeOfTaking") : $CurrentForm->getValue("x_TimeOfTaking");
		if (!$this->TimeOfTaking->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->TimeOfTaking->Visible = FALSE; // Disable update for API request
			else
				$this->TimeOfTaking->setFormValue($val);
		}

		// Check field name 'Status' first before field var 'x_Status'
		$val = $CurrentForm->hasValue("Status") ? $CurrentForm->getValue("Status") : $CurrentForm->getValue("x_Status");
		if (!$this->Status->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Status->Visible = FALSE; // Disable update for API request
			else
				$this->Status->setFormValue($val);
		}

		// Check field name 'CreatedBy' first before field var 'x_CreatedBy'
		$val = $CurrentForm->hasValue("CreatedBy") ? $CurrentForm->getValue("CreatedBy") : $CurrentForm->getValue("x_CreatedBy");
		if (!$this->CreatedBy->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->CreatedBy->Visible = FALSE; // Disable update for API request
			else
				$this->CreatedBy->setFormValue($val);
		}

		// Check field name 'CreateDateTime' first before field var 'x_CreateDateTime'
		$val = $CurrentForm->hasValue("CreateDateTime") ? $CurrentForm->getValue("CreateDateTime") : $CurrentForm->getValue("x_CreateDateTime");
		if (!$this->CreateDateTime->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->CreateDateTime->Visible = FALSE; // Disable update for API request
			else
				$this->CreateDateTime->setFormValue($val);
		}

		// Check field name 'ModifiedBy' first before field var 'x_ModifiedBy'
		$val = $CurrentForm->hasValue("ModifiedBy") ? $CurrentForm->getValue("ModifiedBy") : $CurrentForm->getValue("x_ModifiedBy");
		if (!$this->ModifiedBy->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->ModifiedBy->Visible = FALSE; // Disable update for API request
			else
				$this->ModifiedBy->setFormValue($val);
		}

		// Check field name 'ModifiedDateTime' first before field var 'x_ModifiedDateTime'
		$val = $CurrentForm->hasValue("ModifiedDateTime") ? $CurrentForm->getValue("ModifiedDateTime") : $CurrentForm->getValue("x_ModifiedDateTime");
		if (!$this->ModifiedDateTime->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->ModifiedDateTime->Visible = FALSE; // Disable update for API request
			else
				$this->ModifiedDateTime->setFormValue($val);
		}
	}

	// Restore form values
	public function restoreFormValues()
	{
		global $CurrentForm;
		$this->id->CurrentValue = $this->id->FormValue;
		$this->TemplateName->CurrentValue = $this->TemplateName->FormValue;
		$this->Medicine->CurrentValue = $this->Medicine->FormValue;
		$this->M->CurrentValue = $this->M->FormValue;
		$this->A->CurrentValue = $this->A->FormValue;
		$this->N->CurrentValue = $this->N->FormValue;
		$this->NoOfDays->CurrentValue = $this->NoOfDays->FormValue;
		$this->PreRoute->CurrentValue = $this->PreRoute->FormValue;
		$this->TimeOfTaking->CurrentValue = $this->TimeOfTaking->FormValue;
		$this->Status->CurrentValue = $this->Status->FormValue;
		$this->CreatedBy->CurrentValue = $this->CreatedBy->FormValue;
		$this->CreateDateTime->CurrentValue = $this->CreateDateTime->FormValue;
		$this->ModifiedBy->CurrentValue = $this->ModifiedBy->FormValue;
		$this->ModifiedDateTime->CurrentValue = $this->ModifiedDateTime->FormValue;
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
		$this->TemplateName->setDbValue($row['TemplateName']);
		$this->Medicine->setDbValue($row['Medicine']);
		$this->M->setDbValue($row['M']);
		$this->A->setDbValue($row['A']);
		$this->N->setDbValue($row['N']);
		$this->NoOfDays->setDbValue($row['NoOfDays']);
		$this->PreRoute->setDbValue($row['PreRoute']);
		if (array_key_exists('EV__PreRoute', $rs->fields)) {
			$this->PreRoute->VirtualValue = $rs->fields('EV__PreRoute'); // Set up virtual field value
		} else {
			$this->PreRoute->VirtualValue = ""; // Clear value
		}
		$this->TimeOfTaking->setDbValue($row['TimeOfTaking']);
		if (array_key_exists('EV__TimeOfTaking', $rs->fields)) {
			$this->TimeOfTaking->VirtualValue = $rs->fields('EV__TimeOfTaking'); // Set up virtual field value
		} else {
			$this->TimeOfTaking->VirtualValue = ""; // Clear value
		}
		$this->Type->setDbValue($row['Type']);
		$this->Status->setDbValue($row['Status']);
		$this->CreatedBy->setDbValue($row['CreatedBy']);
		$this->CreateDateTime->setDbValue($row['CreateDateTime']);
		$this->ModifiedBy->setDbValue($row['ModifiedBy']);
		$this->ModifiedDateTime->setDbValue($row['ModifiedDateTime']);
	}

	// Return a row with default values
	protected function newRow()
	{
		$row = [];
		$row['id'] = NULL;
		$row['TemplateName'] = NULL;
		$row['Medicine'] = NULL;
		$row['M'] = NULL;
		$row['A'] = NULL;
		$row['N'] = NULL;
		$row['NoOfDays'] = NULL;
		$row['PreRoute'] = NULL;
		$row['TimeOfTaking'] = NULL;
		$row['Type'] = NULL;
		$row['Status'] = NULL;
		$row['CreatedBy'] = NULL;
		$row['CreateDateTime'] = NULL;
		$row['ModifiedBy'] = NULL;
		$row['ModifiedDateTime'] = NULL;
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
		// TemplateName
		// Medicine
		// M
		// A
		// N
		// NoOfDays
		// PreRoute
		// TimeOfTaking
		// Type
		// Status
		// CreatedBy
		// CreateDateTime
		// ModifiedBy
		// ModifiedDateTime

		if ($this->RowType == ROWTYPE_VIEW) { // View row

			// id
			$this->id->ViewValue = $this->id->CurrentValue;
			$this->id->ViewCustomAttributes = "";

			// TemplateName
			$curVal = strval($this->TemplateName->CurrentValue);
			if ($curVal <> "") {
				$this->TemplateName->ViewValue = $this->TemplateName->lookupCacheOption($curVal);
				if ($this->TemplateName->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`TemplateName`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->TemplateName->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = $rswrk->fields('df');
						$this->TemplateName->ViewValue = $this->TemplateName->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->TemplateName->ViewValue = $this->TemplateName->CurrentValue;
					}
				}
			} else {
				$this->TemplateName->ViewValue = NULL;
			}
			$this->TemplateName->ViewCustomAttributes = "";

			// Medicine
			$this->Medicine->ViewValue = $this->Medicine->CurrentValue;
			$curVal = strval($this->Medicine->CurrentValue);
			if ($curVal <> "") {
				$this->Medicine->ViewValue = $this->Medicine->lookupCacheOption($curVal);
				if ($this->Medicine->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Trade_Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->Medicine->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = $rswrk->fields('df');
						$this->Medicine->ViewValue = $this->Medicine->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->Medicine->ViewValue = $this->Medicine->CurrentValue;
					}
				}
			} else {
				$this->Medicine->ViewValue = NULL;
			}
			$this->Medicine->ViewCustomAttributes = "";

			// M
			$this->M->ViewValue = $this->M->CurrentValue;
			$this->M->ViewCustomAttributes = "";

			// A
			$this->A->ViewValue = $this->A->CurrentValue;
			$this->A->ViewCustomAttributes = "";

			// N
			$this->N->ViewValue = $this->N->CurrentValue;
			$this->N->ViewCustomAttributes = "";

			// NoOfDays
			$this->NoOfDays->ViewValue = $this->NoOfDays->CurrentValue;
			$this->NoOfDays->ViewCustomAttributes = "";

			// PreRoute
			if ($this->PreRoute->VirtualValue <> "") {
				$this->PreRoute->ViewValue = $this->PreRoute->VirtualValue;
			} else {
				$this->PreRoute->ViewValue = $this->PreRoute->CurrentValue;
			$curVal = strval($this->PreRoute->CurrentValue);
			if ($curVal <> "") {
				$this->PreRoute->ViewValue = $this->PreRoute->lookupCacheOption($curVal);
				if ($this->PreRoute->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Route`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->PreRoute->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = $rswrk->fields('df');
						$this->PreRoute->ViewValue = $this->PreRoute->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->PreRoute->ViewValue = $this->PreRoute->CurrentValue;
					}
				}
			} else {
				$this->PreRoute->ViewValue = NULL;
			}
			}
			$this->PreRoute->ViewCustomAttributes = "";

			// TimeOfTaking
			if ($this->TimeOfTaking->VirtualValue <> "") {
				$this->TimeOfTaking->ViewValue = $this->TimeOfTaking->VirtualValue;
			} else {
				$this->TimeOfTaking->ViewValue = $this->TimeOfTaking->CurrentValue;
			$curVal = strval($this->TimeOfTaking->CurrentValue);
			if ($curVal <> "") {
				$this->TimeOfTaking->ViewValue = $this->TimeOfTaking->lookupCacheOption($curVal);
				if ($this->TimeOfTaking->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Time Of Taking`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->TimeOfTaking->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = $rswrk->fields('df');
						$this->TimeOfTaking->ViewValue = $this->TimeOfTaking->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->TimeOfTaking->ViewValue = $this->TimeOfTaking->CurrentValue;
					}
				}
			} else {
				$this->TimeOfTaking->ViewValue = NULL;
			}
			}
			$this->TimeOfTaking->ViewCustomAttributes = "";

			// Status
			$this->Status->ViewCustomAttributes = "";

			// CreatedBy
			$this->CreatedBy->ViewValue = $this->CreatedBy->CurrentValue;
			$this->CreatedBy->ViewCustomAttributes = "";

			// CreateDateTime
			$this->CreateDateTime->ViewValue = $this->CreateDateTime->CurrentValue;
			$this->CreateDateTime->ViewCustomAttributes = "";

			// ModifiedBy
			$this->ModifiedBy->ViewValue = $this->ModifiedBy->CurrentValue;
			$this->ModifiedBy->ViewCustomAttributes = "";

			// ModifiedDateTime
			$this->ModifiedDateTime->ViewValue = $this->ModifiedDateTime->CurrentValue;
			$this->ModifiedDateTime->ViewCustomAttributes = "";

			// id
			$this->id->LinkCustomAttributes = "";
			$this->id->HrefValue = "";
			$this->id->TooltipValue = "";

			// TemplateName
			$this->TemplateName->LinkCustomAttributes = "";
			$this->TemplateName->HrefValue = "";
			$this->TemplateName->TooltipValue = "";

			// Medicine
			$this->Medicine->LinkCustomAttributes = "";
			$this->Medicine->HrefValue = "";
			$this->Medicine->TooltipValue = "";

			// M
			$this->M->LinkCustomAttributes = "";
			$this->M->HrefValue = "";
			$this->M->TooltipValue = "";

			// A
			$this->A->LinkCustomAttributes = "";
			$this->A->HrefValue = "";
			$this->A->TooltipValue = "";

			// N
			$this->N->LinkCustomAttributes = "";
			$this->N->HrefValue = "";
			$this->N->TooltipValue = "";

			// NoOfDays
			$this->NoOfDays->LinkCustomAttributes = "";
			$this->NoOfDays->HrefValue = "";
			$this->NoOfDays->TooltipValue = "";

			// PreRoute
			$this->PreRoute->LinkCustomAttributes = "";
			$this->PreRoute->HrefValue = "";
			$this->PreRoute->TooltipValue = "";

			// TimeOfTaking
			$this->TimeOfTaking->LinkCustomAttributes = "";
			$this->TimeOfTaking->HrefValue = "";
			$this->TimeOfTaking->TooltipValue = "";

			// Status
			$this->Status->LinkCustomAttributes = "";
			$this->Status->HrefValue = "";
			$this->Status->TooltipValue = "";

			// CreatedBy
			$this->CreatedBy->LinkCustomAttributes = "";
			$this->CreatedBy->HrefValue = "";
			$this->CreatedBy->TooltipValue = "";

			// CreateDateTime
			$this->CreateDateTime->LinkCustomAttributes = "";
			$this->CreateDateTime->HrefValue = "";
			$this->CreateDateTime->TooltipValue = "";

			// ModifiedBy
			$this->ModifiedBy->LinkCustomAttributes = "";
			$this->ModifiedBy->HrefValue = "";
			$this->ModifiedBy->TooltipValue = "";

			// ModifiedDateTime
			$this->ModifiedDateTime->LinkCustomAttributes = "";
			$this->ModifiedDateTime->HrefValue = "";
			$this->ModifiedDateTime->TooltipValue = "";
		} elseif ($this->RowType == ROWTYPE_EDIT) { // Edit row

			// id
			$this->id->EditAttrs["class"] = "form-control";
			$this->id->EditCustomAttributes = "";
			$this->id->EditValue = $this->id->CurrentValue;
			$this->id->ViewCustomAttributes = "";

			// TemplateName
			$this->TemplateName->EditAttrs["class"] = "form-control";
			$this->TemplateName->EditCustomAttributes = "";
			$curVal = trim(strval($this->TemplateName->CurrentValue));
			if ($curVal <> "")
				$this->TemplateName->ViewValue = $this->TemplateName->lookupCacheOption($curVal);
			else
				$this->TemplateName->ViewValue = $this->TemplateName->Lookup !== NULL && is_array($this->TemplateName->Lookup->Options) ? $curVal : NULL;
			if ($this->TemplateName->ViewValue !== NULL) { // Load from cache
				$this->TemplateName->EditValue = array_values($this->TemplateName->Lookup->Options);
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`TemplateName`" . SearchString("=", $this->TemplateName->CurrentValue, DATATYPE_STRING, "");
				}
				$sqlWrk = $this->TemplateName->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
				if ($rswrk) $rswrk->Close();
				$this->TemplateName->EditValue = $arwrk;
			}

			// Medicine
			$this->Medicine->EditAttrs["class"] = "form-control";
			$this->Medicine->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Medicine->CurrentValue = HtmlDecode($this->Medicine->CurrentValue);
			$this->Medicine->EditValue = HtmlEncode($this->Medicine->CurrentValue);
			$curVal = strval($this->Medicine->CurrentValue);
			if ($curVal <> "") {
				$this->Medicine->EditValue = $this->Medicine->lookupCacheOption($curVal);
				if ($this->Medicine->EditValue === NULL) { // Lookup from database
					$filterWrk = "`Trade_Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->Medicine->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = HtmlEncode($rswrk->fields('df'));
						$this->Medicine->EditValue = $this->Medicine->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->Medicine->EditValue = HtmlEncode($this->Medicine->CurrentValue);
					}
				}
			} else {
				$this->Medicine->EditValue = NULL;
			}
			$this->Medicine->PlaceHolder = RemoveHtml($this->Medicine->caption());

			// M
			$this->M->EditAttrs["class"] = "form-control";
			$this->M->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->M->CurrentValue = HtmlDecode($this->M->CurrentValue);
			$this->M->EditValue = HtmlEncode($this->M->CurrentValue);
			$this->M->PlaceHolder = RemoveHtml($this->M->caption());

			// A
			$this->A->EditAttrs["class"] = "form-control";
			$this->A->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->A->CurrentValue = HtmlDecode($this->A->CurrentValue);
			$this->A->EditValue = HtmlEncode($this->A->CurrentValue);
			$this->A->PlaceHolder = RemoveHtml($this->A->caption());

			// N
			$this->N->EditAttrs["class"] = "form-control";
			$this->N->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->N->CurrentValue = HtmlDecode($this->N->CurrentValue);
			$this->N->EditValue = HtmlEncode($this->N->CurrentValue);
			$this->N->PlaceHolder = RemoveHtml($this->N->caption());

			// NoOfDays
			$this->NoOfDays->EditAttrs["class"] = "form-control";
			$this->NoOfDays->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->NoOfDays->CurrentValue = HtmlDecode($this->NoOfDays->CurrentValue);
			$this->NoOfDays->EditValue = HtmlEncode($this->NoOfDays->CurrentValue);
			$this->NoOfDays->PlaceHolder = RemoveHtml($this->NoOfDays->caption());

			// PreRoute
			$this->PreRoute->EditAttrs["class"] = "form-control";
			$this->PreRoute->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->PreRoute->CurrentValue = HtmlDecode($this->PreRoute->CurrentValue);
			$this->PreRoute->EditValue = HtmlEncode($this->PreRoute->CurrentValue);
			$this->PreRoute->PlaceHolder = RemoveHtml($this->PreRoute->caption());

			// TimeOfTaking
			$this->TimeOfTaking->EditAttrs["class"] = "form-control";
			$this->TimeOfTaking->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->TimeOfTaking->CurrentValue = HtmlDecode($this->TimeOfTaking->CurrentValue);
			$this->TimeOfTaking->EditValue = HtmlEncode($this->TimeOfTaking->CurrentValue);
			$this->TimeOfTaking->PlaceHolder = RemoveHtml($this->TimeOfTaking->caption());

			// Status
			$this->Status->EditAttrs["class"] = "form-control";
			$this->Status->EditCustomAttributes = "";

			// CreatedBy
			// CreateDateTime
			// ModifiedBy
			// ModifiedDateTime
			// Edit refer script
			// id

			$this->id->LinkCustomAttributes = "";
			$this->id->HrefValue = "";

			// TemplateName
			$this->TemplateName->LinkCustomAttributes = "";
			$this->TemplateName->HrefValue = "";

			// Medicine
			$this->Medicine->LinkCustomAttributes = "";
			$this->Medicine->HrefValue = "";

			// M
			$this->M->LinkCustomAttributes = "";
			$this->M->HrefValue = "";

			// A
			$this->A->LinkCustomAttributes = "";
			$this->A->HrefValue = "";

			// N
			$this->N->LinkCustomAttributes = "";
			$this->N->HrefValue = "";

			// NoOfDays
			$this->NoOfDays->LinkCustomAttributes = "";
			$this->NoOfDays->HrefValue = "";

			// PreRoute
			$this->PreRoute->LinkCustomAttributes = "";
			$this->PreRoute->HrefValue = "";

			// TimeOfTaking
			$this->TimeOfTaking->LinkCustomAttributes = "";
			$this->TimeOfTaking->HrefValue = "";

			// Status
			$this->Status->LinkCustomAttributes = "";
			$this->Status->HrefValue = "";

			// CreatedBy
			$this->CreatedBy->LinkCustomAttributes = "";
			$this->CreatedBy->HrefValue = "";

			// CreateDateTime
			$this->CreateDateTime->LinkCustomAttributes = "";
			$this->CreateDateTime->HrefValue = "";

			// ModifiedBy
			$this->ModifiedBy->LinkCustomAttributes = "";
			$this->ModifiedBy->HrefValue = "";

			// ModifiedDateTime
			$this->ModifiedDateTime->LinkCustomAttributes = "";
			$this->ModifiedDateTime->HrefValue = "";
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
		if ($this->TemplateName->Required) {
			if (!$this->TemplateName->IsDetailKey && $this->TemplateName->FormValue != NULL && $this->TemplateName->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->TemplateName->caption(), $this->TemplateName->RequiredErrorMessage));
			}
		}
		if ($this->Medicine->Required) {
			if (!$this->Medicine->IsDetailKey && $this->Medicine->FormValue != NULL && $this->Medicine->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Medicine->caption(), $this->Medicine->RequiredErrorMessage));
			}
		}
		if ($this->M->Required) {
			if (!$this->M->IsDetailKey && $this->M->FormValue != NULL && $this->M->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->M->caption(), $this->M->RequiredErrorMessage));
			}
		}
		if ($this->A->Required) {
			if (!$this->A->IsDetailKey && $this->A->FormValue != NULL && $this->A->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->A->caption(), $this->A->RequiredErrorMessage));
			}
		}
		if ($this->N->Required) {
			if (!$this->N->IsDetailKey && $this->N->FormValue != NULL && $this->N->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->N->caption(), $this->N->RequiredErrorMessage));
			}
		}
		if ($this->NoOfDays->Required) {
			if (!$this->NoOfDays->IsDetailKey && $this->NoOfDays->FormValue != NULL && $this->NoOfDays->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->NoOfDays->caption(), $this->NoOfDays->RequiredErrorMessage));
			}
		}
		if ($this->PreRoute->Required) {
			if (!$this->PreRoute->IsDetailKey && $this->PreRoute->FormValue != NULL && $this->PreRoute->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PreRoute->caption(), $this->PreRoute->RequiredErrorMessage));
			}
		}
		if ($this->TimeOfTaking->Required) {
			if (!$this->TimeOfTaking->IsDetailKey && $this->TimeOfTaking->FormValue != NULL && $this->TimeOfTaking->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->TimeOfTaking->caption(), $this->TimeOfTaking->RequiredErrorMessage));
			}
		}
		if ($this->Type->Required) {
			if (!$this->Type->IsDetailKey && $this->Type->FormValue != NULL && $this->Type->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Type->caption(), $this->Type->RequiredErrorMessage));
			}
		}
		if ($this->Status->Required) {
			if (!$this->Status->IsDetailKey && $this->Status->FormValue != NULL && $this->Status->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Status->caption(), $this->Status->RequiredErrorMessage));
			}
		}
		if ($this->CreatedBy->Required) {
			if (!$this->CreatedBy->IsDetailKey && $this->CreatedBy->FormValue != NULL && $this->CreatedBy->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->CreatedBy->caption(), $this->CreatedBy->RequiredErrorMessage));
			}
		}
		if ($this->CreateDateTime->Required) {
			if (!$this->CreateDateTime->IsDetailKey && $this->CreateDateTime->FormValue != NULL && $this->CreateDateTime->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->CreateDateTime->caption(), $this->CreateDateTime->RequiredErrorMessage));
			}
		}
		if ($this->ModifiedBy->Required) {
			if (!$this->ModifiedBy->IsDetailKey && $this->ModifiedBy->FormValue != NULL && $this->ModifiedBy->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->ModifiedBy->caption(), $this->ModifiedBy->RequiredErrorMessage));
			}
		}
		if ($this->ModifiedDateTime->Required) {
			if (!$this->ModifiedDateTime->IsDetailKey && $this->ModifiedDateTime->FormValue != NULL && $this->ModifiedDateTime->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->ModifiedDateTime->caption(), $this->ModifiedDateTime->RequiredErrorMessage));
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

			// TemplateName
			$this->TemplateName->setDbValueDef($rsnew, $this->TemplateName->CurrentValue, "", $this->TemplateName->ReadOnly);

			// Medicine
			$this->Medicine->setDbValueDef($rsnew, $this->Medicine->CurrentValue, "", $this->Medicine->ReadOnly);

			// M
			$this->M->setDbValueDef($rsnew, $this->M->CurrentValue, "", $this->M->ReadOnly);

			// A
			$this->A->setDbValueDef($rsnew, $this->A->CurrentValue, "", $this->A->ReadOnly);

			// N
			$this->N->setDbValueDef($rsnew, $this->N->CurrentValue, "", $this->N->ReadOnly);

			// NoOfDays
			$this->NoOfDays->setDbValueDef($rsnew, $this->NoOfDays->CurrentValue, "", $this->NoOfDays->ReadOnly);

			// PreRoute
			$this->PreRoute->setDbValueDef($rsnew, $this->PreRoute->CurrentValue, "", $this->PreRoute->ReadOnly);

			// TimeOfTaking
			$this->TimeOfTaking->setDbValueDef($rsnew, $this->TimeOfTaking->CurrentValue, "", $this->TimeOfTaking->ReadOnly);

			// Status
			$this->Status->setDbValueDef($rsnew, $this->Status->CurrentValue, "", $this->Status->ReadOnly);

			// CreatedBy
			$this->CreatedBy->setDbValueDef($rsnew, CurrentUserName(), NULL);
			$rsnew['CreatedBy'] = &$this->CreatedBy->DbValue;

			// CreateDateTime
			$this->CreateDateTime->setDbValueDef($rsnew, CurrentDateTime(), NULL);
			$rsnew['CreateDateTime'] = &$this->CreateDateTime->DbValue;

			// ModifiedBy
			$this->ModifiedBy->setDbValueDef($rsnew, CurrentUserName(), NULL);
			$rsnew['ModifiedBy'] = &$this->ModifiedBy->DbValue;

			// ModifiedDateTime
			$this->ModifiedDateTime->setDbValueDef($rsnew, CurrentDateTime(), NULL);
			$rsnew['ModifiedDateTime'] = &$this->ModifiedDateTime->DbValue;

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
		$Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("mas_user_template_prescriptionlist.php"), "", $this->TableVar, TRUE);
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
						case "x_TemplateName":
							break;
						case "x_Medicine":
							break;
						case "x_PreRoute":
							break;
						case "x_TimeOfTaking":
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
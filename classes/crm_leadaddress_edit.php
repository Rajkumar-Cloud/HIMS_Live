<?php
namespace PHPMaker2019\HIMS;

/**
 * Page class
 */
class crm_leadaddress_edit extends crm_leadaddress
{

	// Page ID
	public $PageID = "edit";

	// Project ID
	public $ProjectID = "{EA4F6D13-AF8F-428D-9EA7-BA88D1107EC3}";

	// Table name
	public $TableName = 'crm_leadaddress';

	// Page object name
	public $PageObjName = "crm_leadaddress_edit";

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

		// Table object (crm_leadaddress)
		if (!isset($GLOBALS["crm_leadaddress"]) || get_class($GLOBALS["crm_leadaddress"]) == PROJECT_NAMESPACE . "crm_leadaddress") {
			$GLOBALS["crm_leadaddress"] = &$this;
			$GLOBALS["Table"] = &$GLOBALS["crm_leadaddress"];
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
			define(PROJECT_NAMESPACE . "TABLE_NAME", 'crm_leadaddress');

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
		global $EXPORT, $crm_leadaddress;
		if ($this->CustomExport && $this->CustomExport == $this->Export && array_key_exists($this->CustomExport, $EXPORT)) {
				$content = ob_get_contents();
			if ($ExportFileName == "")
				$ExportFileName = $this->TableVar;
			$class = PROJECT_NAMESPACE . $EXPORT[$this->CustomExport];
			if (class_exists($class)) {
				$doc = new $class($crm_leadaddress);
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
					if ($pageName == "crm_leadaddressview.php")
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
			$key .= @$ar['leadaddressid'];
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
					$this->terminate(GetUrl("crm_leadaddresslist.php"));
				else
					$this->terminate(GetUrl("login.php"));
				return;
			}
		}

		// Create form object
		$CurrentForm = new HttpForm();
		$this->CurrentAction = Param("action"); // Set up current action
		$this->leadaddressid->setVisibility();
		$this->phone->setVisibility();
		$this->mobile->setVisibility();
		$this->fax->setVisibility();
		$this->addresslevel1a->setVisibility();
		$this->addresslevel2a->setVisibility();
		$this->addresslevel3a->setVisibility();
		$this->addresslevel4a->setVisibility();
		$this->addresslevel5a->setVisibility();
		$this->addresslevel6a->setVisibility();
		$this->addresslevel7a->setVisibility();
		$this->addresslevel8a->setVisibility();
		$this->buildingnumbera->setVisibility();
		$this->localnumbera->setVisibility();
		$this->poboxa->setVisibility();
		$this->phone_extra->setVisibility();
		$this->mobile_extra->setVisibility();
		$this->fax_extra->setVisibility();
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
			if ($CurrentForm->hasValue("x_leadaddressid")) {
				$this->leadaddressid->setFormValue($CurrentForm->getValue("x_leadaddressid"));
			}
		} else {
			$this->CurrentAction = "show"; // Default action is display

			// Load key from QueryString
			$loadByQuery = FALSE;
			if (Get("leadaddressid") !== NULL) {
				$this->leadaddressid->setQueryStringValue(Get("leadaddressid"));
				$loadByQuery = TRUE;
			} else {
				$this->leadaddressid->CurrentValue = NULL;
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
					$this->terminate("crm_leadaddresslist.php"); // No matching record, return to list
				}
				break;
			case "update": // Update
				$returnUrl = $this->getReturnUrl();
				if (GetPageName($returnUrl) == "crm_leadaddresslist.php")
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

		// Check field name 'leadaddressid' first before field var 'x_leadaddressid'
		$val = $CurrentForm->hasValue("leadaddressid") ? $CurrentForm->getValue("leadaddressid") : $CurrentForm->getValue("x_leadaddressid");
		if (!$this->leadaddressid->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->leadaddressid->Visible = FALSE; // Disable update for API request
			else
				$this->leadaddressid->setFormValue($val);
		}

		// Check field name 'phone' first before field var 'x_phone'
		$val = $CurrentForm->hasValue("phone") ? $CurrentForm->getValue("phone") : $CurrentForm->getValue("x_phone");
		if (!$this->phone->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->phone->Visible = FALSE; // Disable update for API request
			else
				$this->phone->setFormValue($val);
		}

		// Check field name 'mobile' first before field var 'x_mobile'
		$val = $CurrentForm->hasValue("mobile") ? $CurrentForm->getValue("mobile") : $CurrentForm->getValue("x_mobile");
		if (!$this->mobile->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->mobile->Visible = FALSE; // Disable update for API request
			else
				$this->mobile->setFormValue($val);
		}

		// Check field name 'fax' first before field var 'x_fax'
		$val = $CurrentForm->hasValue("fax") ? $CurrentForm->getValue("fax") : $CurrentForm->getValue("x_fax");
		if (!$this->fax->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->fax->Visible = FALSE; // Disable update for API request
			else
				$this->fax->setFormValue($val);
		}

		// Check field name 'addresslevel1a' first before field var 'x_addresslevel1a'
		$val = $CurrentForm->hasValue("addresslevel1a") ? $CurrentForm->getValue("addresslevel1a") : $CurrentForm->getValue("x_addresslevel1a");
		if (!$this->addresslevel1a->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->addresslevel1a->Visible = FALSE; // Disable update for API request
			else
				$this->addresslevel1a->setFormValue($val);
		}

		// Check field name 'addresslevel2a' first before field var 'x_addresslevel2a'
		$val = $CurrentForm->hasValue("addresslevel2a") ? $CurrentForm->getValue("addresslevel2a") : $CurrentForm->getValue("x_addresslevel2a");
		if (!$this->addresslevel2a->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->addresslevel2a->Visible = FALSE; // Disable update for API request
			else
				$this->addresslevel2a->setFormValue($val);
		}

		// Check field name 'addresslevel3a' first before field var 'x_addresslevel3a'
		$val = $CurrentForm->hasValue("addresslevel3a") ? $CurrentForm->getValue("addresslevel3a") : $CurrentForm->getValue("x_addresslevel3a");
		if (!$this->addresslevel3a->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->addresslevel3a->Visible = FALSE; // Disable update for API request
			else
				$this->addresslevel3a->setFormValue($val);
		}

		// Check field name 'addresslevel4a' first before field var 'x_addresslevel4a'
		$val = $CurrentForm->hasValue("addresslevel4a") ? $CurrentForm->getValue("addresslevel4a") : $CurrentForm->getValue("x_addresslevel4a");
		if (!$this->addresslevel4a->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->addresslevel4a->Visible = FALSE; // Disable update for API request
			else
				$this->addresslevel4a->setFormValue($val);
		}

		// Check field name 'addresslevel5a' first before field var 'x_addresslevel5a'
		$val = $CurrentForm->hasValue("addresslevel5a") ? $CurrentForm->getValue("addresslevel5a") : $CurrentForm->getValue("x_addresslevel5a");
		if (!$this->addresslevel5a->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->addresslevel5a->Visible = FALSE; // Disable update for API request
			else
				$this->addresslevel5a->setFormValue($val);
		}

		// Check field name 'addresslevel6a' first before field var 'x_addresslevel6a'
		$val = $CurrentForm->hasValue("addresslevel6a") ? $CurrentForm->getValue("addresslevel6a") : $CurrentForm->getValue("x_addresslevel6a");
		if (!$this->addresslevel6a->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->addresslevel6a->Visible = FALSE; // Disable update for API request
			else
				$this->addresslevel6a->setFormValue($val);
		}

		// Check field name 'addresslevel7a' first before field var 'x_addresslevel7a'
		$val = $CurrentForm->hasValue("addresslevel7a") ? $CurrentForm->getValue("addresslevel7a") : $CurrentForm->getValue("x_addresslevel7a");
		if (!$this->addresslevel7a->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->addresslevel7a->Visible = FALSE; // Disable update for API request
			else
				$this->addresslevel7a->setFormValue($val);
		}

		// Check field name 'addresslevel8a' first before field var 'x_addresslevel8a'
		$val = $CurrentForm->hasValue("addresslevel8a") ? $CurrentForm->getValue("addresslevel8a") : $CurrentForm->getValue("x_addresslevel8a");
		if (!$this->addresslevel8a->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->addresslevel8a->Visible = FALSE; // Disable update for API request
			else
				$this->addresslevel8a->setFormValue($val);
		}

		// Check field name 'buildingnumbera' first before field var 'x_buildingnumbera'
		$val = $CurrentForm->hasValue("buildingnumbera") ? $CurrentForm->getValue("buildingnumbera") : $CurrentForm->getValue("x_buildingnumbera");
		if (!$this->buildingnumbera->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->buildingnumbera->Visible = FALSE; // Disable update for API request
			else
				$this->buildingnumbera->setFormValue($val);
		}

		// Check field name 'localnumbera' first before field var 'x_localnumbera'
		$val = $CurrentForm->hasValue("localnumbera") ? $CurrentForm->getValue("localnumbera") : $CurrentForm->getValue("x_localnumbera");
		if (!$this->localnumbera->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->localnumbera->Visible = FALSE; // Disable update for API request
			else
				$this->localnumbera->setFormValue($val);
		}

		// Check field name 'poboxa' first before field var 'x_poboxa'
		$val = $CurrentForm->hasValue("poboxa") ? $CurrentForm->getValue("poboxa") : $CurrentForm->getValue("x_poboxa");
		if (!$this->poboxa->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->poboxa->Visible = FALSE; // Disable update for API request
			else
				$this->poboxa->setFormValue($val);
		}

		// Check field name 'phone_extra' first before field var 'x_phone_extra'
		$val = $CurrentForm->hasValue("phone_extra") ? $CurrentForm->getValue("phone_extra") : $CurrentForm->getValue("x_phone_extra");
		if (!$this->phone_extra->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->phone_extra->Visible = FALSE; // Disable update for API request
			else
				$this->phone_extra->setFormValue($val);
		}

		// Check field name 'mobile_extra' first before field var 'x_mobile_extra'
		$val = $CurrentForm->hasValue("mobile_extra") ? $CurrentForm->getValue("mobile_extra") : $CurrentForm->getValue("x_mobile_extra");
		if (!$this->mobile_extra->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->mobile_extra->Visible = FALSE; // Disable update for API request
			else
				$this->mobile_extra->setFormValue($val);
		}

		// Check field name 'fax_extra' first before field var 'x_fax_extra'
		$val = $CurrentForm->hasValue("fax_extra") ? $CurrentForm->getValue("fax_extra") : $CurrentForm->getValue("x_fax_extra");
		if (!$this->fax_extra->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->fax_extra->Visible = FALSE; // Disable update for API request
			else
				$this->fax_extra->setFormValue($val);
		}
	}

	// Restore form values
	public function restoreFormValues()
	{
		global $CurrentForm;
		$this->leadaddressid->CurrentValue = $this->leadaddressid->FormValue;
		$this->phone->CurrentValue = $this->phone->FormValue;
		$this->mobile->CurrentValue = $this->mobile->FormValue;
		$this->fax->CurrentValue = $this->fax->FormValue;
		$this->addresslevel1a->CurrentValue = $this->addresslevel1a->FormValue;
		$this->addresslevel2a->CurrentValue = $this->addresslevel2a->FormValue;
		$this->addresslevel3a->CurrentValue = $this->addresslevel3a->FormValue;
		$this->addresslevel4a->CurrentValue = $this->addresslevel4a->FormValue;
		$this->addresslevel5a->CurrentValue = $this->addresslevel5a->FormValue;
		$this->addresslevel6a->CurrentValue = $this->addresslevel6a->FormValue;
		$this->addresslevel7a->CurrentValue = $this->addresslevel7a->FormValue;
		$this->addresslevel8a->CurrentValue = $this->addresslevel8a->FormValue;
		$this->buildingnumbera->CurrentValue = $this->buildingnumbera->FormValue;
		$this->localnumbera->CurrentValue = $this->localnumbera->FormValue;
		$this->poboxa->CurrentValue = $this->poboxa->FormValue;
		$this->phone_extra->CurrentValue = $this->phone_extra->FormValue;
		$this->mobile_extra->CurrentValue = $this->mobile_extra->FormValue;
		$this->fax_extra->CurrentValue = $this->fax_extra->FormValue;
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
		$this->leadaddressid->setDbValue($row['leadaddressid']);
		$this->phone->setDbValue($row['phone']);
		$this->mobile->setDbValue($row['mobile']);
		$this->fax->setDbValue($row['fax']);
		$this->addresslevel1a->setDbValue($row['addresslevel1a']);
		$this->addresslevel2a->setDbValue($row['addresslevel2a']);
		$this->addresslevel3a->setDbValue($row['addresslevel3a']);
		$this->addresslevel4a->setDbValue($row['addresslevel4a']);
		$this->addresslevel5a->setDbValue($row['addresslevel5a']);
		$this->addresslevel6a->setDbValue($row['addresslevel6a']);
		$this->addresslevel7a->setDbValue($row['addresslevel7a']);
		$this->addresslevel8a->setDbValue($row['addresslevel8a']);
		$this->buildingnumbera->setDbValue($row['buildingnumbera']);
		$this->localnumbera->setDbValue($row['localnumbera']);
		$this->poboxa->setDbValue($row['poboxa']);
		$this->phone_extra->setDbValue($row['phone_extra']);
		$this->mobile_extra->setDbValue($row['mobile_extra']);
		$this->fax_extra->setDbValue($row['fax_extra']);
	}

	// Return a row with default values
	protected function newRow()
	{
		$row = [];
		$row['leadaddressid'] = NULL;
		$row['phone'] = NULL;
		$row['mobile'] = NULL;
		$row['fax'] = NULL;
		$row['addresslevel1a'] = NULL;
		$row['addresslevel2a'] = NULL;
		$row['addresslevel3a'] = NULL;
		$row['addresslevel4a'] = NULL;
		$row['addresslevel5a'] = NULL;
		$row['addresslevel6a'] = NULL;
		$row['addresslevel7a'] = NULL;
		$row['addresslevel8a'] = NULL;
		$row['buildingnumbera'] = NULL;
		$row['localnumbera'] = NULL;
		$row['poboxa'] = NULL;
		$row['phone_extra'] = NULL;
		$row['mobile_extra'] = NULL;
		$row['fax_extra'] = NULL;
		return $row;
	}

	// Load old record
	protected function loadOldRecord()
	{

		// Load key values from Session
		$validKey = TRUE;
		if (strval($this->getKey("leadaddressid")) <> "")
			$this->leadaddressid->CurrentValue = $this->getKey("leadaddressid"); // leadaddressid
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
		// leadaddressid
		// phone
		// mobile
		// fax
		// addresslevel1a
		// addresslevel2a
		// addresslevel3a
		// addresslevel4a
		// addresslevel5a
		// addresslevel6a
		// addresslevel7a
		// addresslevel8a
		// buildingnumbera
		// localnumbera
		// poboxa
		// phone_extra
		// mobile_extra
		// fax_extra

		if ($this->RowType == ROWTYPE_VIEW) { // View row

			// leadaddressid
			$this->leadaddressid->ViewValue = $this->leadaddressid->CurrentValue;
			$this->leadaddressid->ViewValue = FormatNumber($this->leadaddressid->ViewValue, 0, -2, -2, -2);
			$this->leadaddressid->ViewCustomAttributes = "";

			// phone
			$this->phone->ViewValue = $this->phone->CurrentValue;
			$this->phone->ViewCustomAttributes = "";

			// mobile
			$this->mobile->ViewValue = $this->mobile->CurrentValue;
			$this->mobile->ViewCustomAttributes = "";

			// fax
			$this->fax->ViewValue = $this->fax->CurrentValue;
			$this->fax->ViewCustomAttributes = "";

			// addresslevel1a
			$this->addresslevel1a->ViewValue = $this->addresslevel1a->CurrentValue;
			$this->addresslevel1a->ViewCustomAttributes = "";

			// addresslevel2a
			$this->addresslevel2a->ViewValue = $this->addresslevel2a->CurrentValue;
			$this->addresslevel2a->ViewCustomAttributes = "";

			// addresslevel3a
			$this->addresslevel3a->ViewValue = $this->addresslevel3a->CurrentValue;
			$this->addresslevel3a->ViewCustomAttributes = "";

			// addresslevel4a
			$this->addresslevel4a->ViewValue = $this->addresslevel4a->CurrentValue;
			$this->addresslevel4a->ViewCustomAttributes = "";

			// addresslevel5a
			$this->addresslevel5a->ViewValue = $this->addresslevel5a->CurrentValue;
			$this->addresslevel5a->ViewCustomAttributes = "";

			// addresslevel6a
			$this->addresslevel6a->ViewValue = $this->addresslevel6a->CurrentValue;
			$this->addresslevel6a->ViewCustomAttributes = "";

			// addresslevel7a
			$this->addresslevel7a->ViewValue = $this->addresslevel7a->CurrentValue;
			$this->addresslevel7a->ViewCustomAttributes = "";

			// addresslevel8a
			$this->addresslevel8a->ViewValue = $this->addresslevel8a->CurrentValue;
			$this->addresslevel8a->ViewCustomAttributes = "";

			// buildingnumbera
			$this->buildingnumbera->ViewValue = $this->buildingnumbera->CurrentValue;
			$this->buildingnumbera->ViewCustomAttributes = "";

			// localnumbera
			$this->localnumbera->ViewValue = $this->localnumbera->CurrentValue;
			$this->localnumbera->ViewCustomAttributes = "";

			// poboxa
			$this->poboxa->ViewValue = $this->poboxa->CurrentValue;
			$this->poboxa->ViewCustomAttributes = "";

			// phone_extra
			$this->phone_extra->ViewValue = $this->phone_extra->CurrentValue;
			$this->phone_extra->ViewCustomAttributes = "";

			// mobile_extra
			$this->mobile_extra->ViewValue = $this->mobile_extra->CurrentValue;
			$this->mobile_extra->ViewCustomAttributes = "";

			// fax_extra
			$this->fax_extra->ViewValue = $this->fax_extra->CurrentValue;
			$this->fax_extra->ViewCustomAttributes = "";

			// leadaddressid
			$this->leadaddressid->LinkCustomAttributes = "";
			$this->leadaddressid->HrefValue = "";
			$this->leadaddressid->TooltipValue = "";

			// phone
			$this->phone->LinkCustomAttributes = "";
			$this->phone->HrefValue = "";
			$this->phone->TooltipValue = "";

			// mobile
			$this->mobile->LinkCustomAttributes = "";
			$this->mobile->HrefValue = "";
			$this->mobile->TooltipValue = "";

			// fax
			$this->fax->LinkCustomAttributes = "";
			$this->fax->HrefValue = "";
			$this->fax->TooltipValue = "";

			// addresslevel1a
			$this->addresslevel1a->LinkCustomAttributes = "";
			$this->addresslevel1a->HrefValue = "";
			$this->addresslevel1a->TooltipValue = "";

			// addresslevel2a
			$this->addresslevel2a->LinkCustomAttributes = "";
			$this->addresslevel2a->HrefValue = "";
			$this->addresslevel2a->TooltipValue = "";

			// addresslevel3a
			$this->addresslevel3a->LinkCustomAttributes = "";
			$this->addresslevel3a->HrefValue = "";
			$this->addresslevel3a->TooltipValue = "";

			// addresslevel4a
			$this->addresslevel4a->LinkCustomAttributes = "";
			$this->addresslevel4a->HrefValue = "";
			$this->addresslevel4a->TooltipValue = "";

			// addresslevel5a
			$this->addresslevel5a->LinkCustomAttributes = "";
			$this->addresslevel5a->HrefValue = "";
			$this->addresslevel5a->TooltipValue = "";

			// addresslevel6a
			$this->addresslevel6a->LinkCustomAttributes = "";
			$this->addresslevel6a->HrefValue = "";
			$this->addresslevel6a->TooltipValue = "";

			// addresslevel7a
			$this->addresslevel7a->LinkCustomAttributes = "";
			$this->addresslevel7a->HrefValue = "";
			$this->addresslevel7a->TooltipValue = "";

			// addresslevel8a
			$this->addresslevel8a->LinkCustomAttributes = "";
			$this->addresslevel8a->HrefValue = "";
			$this->addresslevel8a->TooltipValue = "";

			// buildingnumbera
			$this->buildingnumbera->LinkCustomAttributes = "";
			$this->buildingnumbera->HrefValue = "";
			$this->buildingnumbera->TooltipValue = "";

			// localnumbera
			$this->localnumbera->LinkCustomAttributes = "";
			$this->localnumbera->HrefValue = "";
			$this->localnumbera->TooltipValue = "";

			// poboxa
			$this->poboxa->LinkCustomAttributes = "";
			$this->poboxa->HrefValue = "";
			$this->poboxa->TooltipValue = "";

			// phone_extra
			$this->phone_extra->LinkCustomAttributes = "";
			$this->phone_extra->HrefValue = "";
			$this->phone_extra->TooltipValue = "";

			// mobile_extra
			$this->mobile_extra->LinkCustomAttributes = "";
			$this->mobile_extra->HrefValue = "";
			$this->mobile_extra->TooltipValue = "";

			// fax_extra
			$this->fax_extra->LinkCustomAttributes = "";
			$this->fax_extra->HrefValue = "";
			$this->fax_extra->TooltipValue = "";
		} elseif ($this->RowType == ROWTYPE_EDIT) { // Edit row

			// leadaddressid
			$this->leadaddressid->EditAttrs["class"] = "form-control";
			$this->leadaddressid->EditCustomAttributes = "";
			$this->leadaddressid->EditValue = $this->leadaddressid->CurrentValue;
			$this->leadaddressid->EditValue = FormatNumber($this->leadaddressid->EditValue, 0, -2, -2, -2);
			$this->leadaddressid->ViewCustomAttributes = "";

			// phone
			$this->phone->EditAttrs["class"] = "form-control";
			$this->phone->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->phone->CurrentValue = HtmlDecode($this->phone->CurrentValue);
			$this->phone->EditValue = HtmlEncode($this->phone->CurrentValue);
			$this->phone->PlaceHolder = RemoveHtml($this->phone->caption());

			// mobile
			$this->mobile->EditAttrs["class"] = "form-control";
			$this->mobile->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->mobile->CurrentValue = HtmlDecode($this->mobile->CurrentValue);
			$this->mobile->EditValue = HtmlEncode($this->mobile->CurrentValue);
			$this->mobile->PlaceHolder = RemoveHtml($this->mobile->caption());

			// fax
			$this->fax->EditAttrs["class"] = "form-control";
			$this->fax->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->fax->CurrentValue = HtmlDecode($this->fax->CurrentValue);
			$this->fax->EditValue = HtmlEncode($this->fax->CurrentValue);
			$this->fax->PlaceHolder = RemoveHtml($this->fax->caption());

			// addresslevel1a
			$this->addresslevel1a->EditAttrs["class"] = "form-control";
			$this->addresslevel1a->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->addresslevel1a->CurrentValue = HtmlDecode($this->addresslevel1a->CurrentValue);
			$this->addresslevel1a->EditValue = HtmlEncode($this->addresslevel1a->CurrentValue);
			$this->addresslevel1a->PlaceHolder = RemoveHtml($this->addresslevel1a->caption());

			// addresslevel2a
			$this->addresslevel2a->EditAttrs["class"] = "form-control";
			$this->addresslevel2a->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->addresslevel2a->CurrentValue = HtmlDecode($this->addresslevel2a->CurrentValue);
			$this->addresslevel2a->EditValue = HtmlEncode($this->addresslevel2a->CurrentValue);
			$this->addresslevel2a->PlaceHolder = RemoveHtml($this->addresslevel2a->caption());

			// addresslevel3a
			$this->addresslevel3a->EditAttrs["class"] = "form-control";
			$this->addresslevel3a->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->addresslevel3a->CurrentValue = HtmlDecode($this->addresslevel3a->CurrentValue);
			$this->addresslevel3a->EditValue = HtmlEncode($this->addresslevel3a->CurrentValue);
			$this->addresslevel3a->PlaceHolder = RemoveHtml($this->addresslevel3a->caption());

			// addresslevel4a
			$this->addresslevel4a->EditAttrs["class"] = "form-control";
			$this->addresslevel4a->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->addresslevel4a->CurrentValue = HtmlDecode($this->addresslevel4a->CurrentValue);
			$this->addresslevel4a->EditValue = HtmlEncode($this->addresslevel4a->CurrentValue);
			$this->addresslevel4a->PlaceHolder = RemoveHtml($this->addresslevel4a->caption());

			// addresslevel5a
			$this->addresslevel5a->EditAttrs["class"] = "form-control";
			$this->addresslevel5a->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->addresslevel5a->CurrentValue = HtmlDecode($this->addresslevel5a->CurrentValue);
			$this->addresslevel5a->EditValue = HtmlEncode($this->addresslevel5a->CurrentValue);
			$this->addresslevel5a->PlaceHolder = RemoveHtml($this->addresslevel5a->caption());

			// addresslevel6a
			$this->addresslevel6a->EditAttrs["class"] = "form-control";
			$this->addresslevel6a->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->addresslevel6a->CurrentValue = HtmlDecode($this->addresslevel6a->CurrentValue);
			$this->addresslevel6a->EditValue = HtmlEncode($this->addresslevel6a->CurrentValue);
			$this->addresslevel6a->PlaceHolder = RemoveHtml($this->addresslevel6a->caption());

			// addresslevel7a
			$this->addresslevel7a->EditAttrs["class"] = "form-control";
			$this->addresslevel7a->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->addresslevel7a->CurrentValue = HtmlDecode($this->addresslevel7a->CurrentValue);
			$this->addresslevel7a->EditValue = HtmlEncode($this->addresslevel7a->CurrentValue);
			$this->addresslevel7a->PlaceHolder = RemoveHtml($this->addresslevel7a->caption());

			// addresslevel8a
			$this->addresslevel8a->EditAttrs["class"] = "form-control";
			$this->addresslevel8a->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->addresslevel8a->CurrentValue = HtmlDecode($this->addresslevel8a->CurrentValue);
			$this->addresslevel8a->EditValue = HtmlEncode($this->addresslevel8a->CurrentValue);
			$this->addresslevel8a->PlaceHolder = RemoveHtml($this->addresslevel8a->caption());

			// buildingnumbera
			$this->buildingnumbera->EditAttrs["class"] = "form-control";
			$this->buildingnumbera->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->buildingnumbera->CurrentValue = HtmlDecode($this->buildingnumbera->CurrentValue);
			$this->buildingnumbera->EditValue = HtmlEncode($this->buildingnumbera->CurrentValue);
			$this->buildingnumbera->PlaceHolder = RemoveHtml($this->buildingnumbera->caption());

			// localnumbera
			$this->localnumbera->EditAttrs["class"] = "form-control";
			$this->localnumbera->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->localnumbera->CurrentValue = HtmlDecode($this->localnumbera->CurrentValue);
			$this->localnumbera->EditValue = HtmlEncode($this->localnumbera->CurrentValue);
			$this->localnumbera->PlaceHolder = RemoveHtml($this->localnumbera->caption());

			// poboxa
			$this->poboxa->EditAttrs["class"] = "form-control";
			$this->poboxa->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->poboxa->CurrentValue = HtmlDecode($this->poboxa->CurrentValue);
			$this->poboxa->EditValue = HtmlEncode($this->poboxa->CurrentValue);
			$this->poboxa->PlaceHolder = RemoveHtml($this->poboxa->caption());

			// phone_extra
			$this->phone_extra->EditAttrs["class"] = "form-control";
			$this->phone_extra->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->phone_extra->CurrentValue = HtmlDecode($this->phone_extra->CurrentValue);
			$this->phone_extra->EditValue = HtmlEncode($this->phone_extra->CurrentValue);
			$this->phone_extra->PlaceHolder = RemoveHtml($this->phone_extra->caption());

			// mobile_extra
			$this->mobile_extra->EditAttrs["class"] = "form-control";
			$this->mobile_extra->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->mobile_extra->CurrentValue = HtmlDecode($this->mobile_extra->CurrentValue);
			$this->mobile_extra->EditValue = HtmlEncode($this->mobile_extra->CurrentValue);
			$this->mobile_extra->PlaceHolder = RemoveHtml($this->mobile_extra->caption());

			// fax_extra
			$this->fax_extra->EditAttrs["class"] = "form-control";
			$this->fax_extra->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->fax_extra->CurrentValue = HtmlDecode($this->fax_extra->CurrentValue);
			$this->fax_extra->EditValue = HtmlEncode($this->fax_extra->CurrentValue);
			$this->fax_extra->PlaceHolder = RemoveHtml($this->fax_extra->caption());

			// Edit refer script
			// leadaddressid

			$this->leadaddressid->LinkCustomAttributes = "";
			$this->leadaddressid->HrefValue = "";

			// phone
			$this->phone->LinkCustomAttributes = "";
			$this->phone->HrefValue = "";

			// mobile
			$this->mobile->LinkCustomAttributes = "";
			$this->mobile->HrefValue = "";

			// fax
			$this->fax->LinkCustomAttributes = "";
			$this->fax->HrefValue = "";

			// addresslevel1a
			$this->addresslevel1a->LinkCustomAttributes = "";
			$this->addresslevel1a->HrefValue = "";

			// addresslevel2a
			$this->addresslevel2a->LinkCustomAttributes = "";
			$this->addresslevel2a->HrefValue = "";

			// addresslevel3a
			$this->addresslevel3a->LinkCustomAttributes = "";
			$this->addresslevel3a->HrefValue = "";

			// addresslevel4a
			$this->addresslevel4a->LinkCustomAttributes = "";
			$this->addresslevel4a->HrefValue = "";

			// addresslevel5a
			$this->addresslevel5a->LinkCustomAttributes = "";
			$this->addresslevel5a->HrefValue = "";

			// addresslevel6a
			$this->addresslevel6a->LinkCustomAttributes = "";
			$this->addresslevel6a->HrefValue = "";

			// addresslevel7a
			$this->addresslevel7a->LinkCustomAttributes = "";
			$this->addresslevel7a->HrefValue = "";

			// addresslevel8a
			$this->addresslevel8a->LinkCustomAttributes = "";
			$this->addresslevel8a->HrefValue = "";

			// buildingnumbera
			$this->buildingnumbera->LinkCustomAttributes = "";
			$this->buildingnumbera->HrefValue = "";

			// localnumbera
			$this->localnumbera->LinkCustomAttributes = "";
			$this->localnumbera->HrefValue = "";

			// poboxa
			$this->poboxa->LinkCustomAttributes = "";
			$this->poboxa->HrefValue = "";

			// phone_extra
			$this->phone_extra->LinkCustomAttributes = "";
			$this->phone_extra->HrefValue = "";

			// mobile_extra
			$this->mobile_extra->LinkCustomAttributes = "";
			$this->mobile_extra->HrefValue = "";

			// fax_extra
			$this->fax_extra->LinkCustomAttributes = "";
			$this->fax_extra->HrefValue = "";
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
		if ($this->leadaddressid->Required) {
			if (!$this->leadaddressid->IsDetailKey && $this->leadaddressid->FormValue != NULL && $this->leadaddressid->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->leadaddressid->caption(), $this->leadaddressid->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->leadaddressid->FormValue)) {
			AddMessage($FormError, $this->leadaddressid->errorMessage());
		}
		if ($this->phone->Required) {
			if (!$this->phone->IsDetailKey && $this->phone->FormValue != NULL && $this->phone->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->phone->caption(), $this->phone->RequiredErrorMessage));
			}
		}
		if ($this->mobile->Required) {
			if (!$this->mobile->IsDetailKey && $this->mobile->FormValue != NULL && $this->mobile->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->mobile->caption(), $this->mobile->RequiredErrorMessage));
			}
		}
		if ($this->fax->Required) {
			if (!$this->fax->IsDetailKey && $this->fax->FormValue != NULL && $this->fax->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->fax->caption(), $this->fax->RequiredErrorMessage));
			}
		}
		if ($this->addresslevel1a->Required) {
			if (!$this->addresslevel1a->IsDetailKey && $this->addresslevel1a->FormValue != NULL && $this->addresslevel1a->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->addresslevel1a->caption(), $this->addresslevel1a->RequiredErrorMessage));
			}
		}
		if ($this->addresslevel2a->Required) {
			if (!$this->addresslevel2a->IsDetailKey && $this->addresslevel2a->FormValue != NULL && $this->addresslevel2a->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->addresslevel2a->caption(), $this->addresslevel2a->RequiredErrorMessage));
			}
		}
		if ($this->addresslevel3a->Required) {
			if (!$this->addresslevel3a->IsDetailKey && $this->addresslevel3a->FormValue != NULL && $this->addresslevel3a->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->addresslevel3a->caption(), $this->addresslevel3a->RequiredErrorMessage));
			}
		}
		if ($this->addresslevel4a->Required) {
			if (!$this->addresslevel4a->IsDetailKey && $this->addresslevel4a->FormValue != NULL && $this->addresslevel4a->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->addresslevel4a->caption(), $this->addresslevel4a->RequiredErrorMessage));
			}
		}
		if ($this->addresslevel5a->Required) {
			if (!$this->addresslevel5a->IsDetailKey && $this->addresslevel5a->FormValue != NULL && $this->addresslevel5a->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->addresslevel5a->caption(), $this->addresslevel5a->RequiredErrorMessage));
			}
		}
		if ($this->addresslevel6a->Required) {
			if (!$this->addresslevel6a->IsDetailKey && $this->addresslevel6a->FormValue != NULL && $this->addresslevel6a->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->addresslevel6a->caption(), $this->addresslevel6a->RequiredErrorMessage));
			}
		}
		if ($this->addresslevel7a->Required) {
			if (!$this->addresslevel7a->IsDetailKey && $this->addresslevel7a->FormValue != NULL && $this->addresslevel7a->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->addresslevel7a->caption(), $this->addresslevel7a->RequiredErrorMessage));
			}
		}
		if ($this->addresslevel8a->Required) {
			if (!$this->addresslevel8a->IsDetailKey && $this->addresslevel8a->FormValue != NULL && $this->addresslevel8a->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->addresslevel8a->caption(), $this->addresslevel8a->RequiredErrorMessage));
			}
		}
		if ($this->buildingnumbera->Required) {
			if (!$this->buildingnumbera->IsDetailKey && $this->buildingnumbera->FormValue != NULL && $this->buildingnumbera->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->buildingnumbera->caption(), $this->buildingnumbera->RequiredErrorMessage));
			}
		}
		if ($this->localnumbera->Required) {
			if (!$this->localnumbera->IsDetailKey && $this->localnumbera->FormValue != NULL && $this->localnumbera->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->localnumbera->caption(), $this->localnumbera->RequiredErrorMessage));
			}
		}
		if ($this->poboxa->Required) {
			if (!$this->poboxa->IsDetailKey && $this->poboxa->FormValue != NULL && $this->poboxa->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->poboxa->caption(), $this->poboxa->RequiredErrorMessage));
			}
		}
		if ($this->phone_extra->Required) {
			if (!$this->phone_extra->IsDetailKey && $this->phone_extra->FormValue != NULL && $this->phone_extra->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->phone_extra->caption(), $this->phone_extra->RequiredErrorMessage));
			}
		}
		if ($this->mobile_extra->Required) {
			if (!$this->mobile_extra->IsDetailKey && $this->mobile_extra->FormValue != NULL && $this->mobile_extra->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->mobile_extra->caption(), $this->mobile_extra->RequiredErrorMessage));
			}
		}
		if ($this->fax_extra->Required) {
			if (!$this->fax_extra->IsDetailKey && $this->fax_extra->FormValue != NULL && $this->fax_extra->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->fax_extra->caption(), $this->fax_extra->RequiredErrorMessage));
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

			// leadaddressid
			// phone

			$this->phone->setDbValueDef($rsnew, $this->phone->CurrentValue, NULL, $this->phone->ReadOnly);

			// mobile
			$this->mobile->setDbValueDef($rsnew, $this->mobile->CurrentValue, NULL, $this->mobile->ReadOnly);

			// fax
			$this->fax->setDbValueDef($rsnew, $this->fax->CurrentValue, NULL, $this->fax->ReadOnly);

			// addresslevel1a
			$this->addresslevel1a->setDbValueDef($rsnew, $this->addresslevel1a->CurrentValue, NULL, $this->addresslevel1a->ReadOnly);

			// addresslevel2a
			$this->addresslevel2a->setDbValueDef($rsnew, $this->addresslevel2a->CurrentValue, NULL, $this->addresslevel2a->ReadOnly);

			// addresslevel3a
			$this->addresslevel3a->setDbValueDef($rsnew, $this->addresslevel3a->CurrentValue, NULL, $this->addresslevel3a->ReadOnly);

			// addresslevel4a
			$this->addresslevel4a->setDbValueDef($rsnew, $this->addresslevel4a->CurrentValue, NULL, $this->addresslevel4a->ReadOnly);

			// addresslevel5a
			$this->addresslevel5a->setDbValueDef($rsnew, $this->addresslevel5a->CurrentValue, NULL, $this->addresslevel5a->ReadOnly);

			// addresslevel6a
			$this->addresslevel6a->setDbValueDef($rsnew, $this->addresslevel6a->CurrentValue, NULL, $this->addresslevel6a->ReadOnly);

			// addresslevel7a
			$this->addresslevel7a->setDbValueDef($rsnew, $this->addresslevel7a->CurrentValue, NULL, $this->addresslevel7a->ReadOnly);

			// addresslevel8a
			$this->addresslevel8a->setDbValueDef($rsnew, $this->addresslevel8a->CurrentValue, NULL, $this->addresslevel8a->ReadOnly);

			// buildingnumbera
			$this->buildingnumbera->setDbValueDef($rsnew, $this->buildingnumbera->CurrentValue, NULL, $this->buildingnumbera->ReadOnly);

			// localnumbera
			$this->localnumbera->setDbValueDef($rsnew, $this->localnumbera->CurrentValue, NULL, $this->localnumbera->ReadOnly);

			// poboxa
			$this->poboxa->setDbValueDef($rsnew, $this->poboxa->CurrentValue, NULL, $this->poboxa->ReadOnly);

			// phone_extra
			$this->phone_extra->setDbValueDef($rsnew, $this->phone_extra->CurrentValue, NULL, $this->phone_extra->ReadOnly);

			// mobile_extra
			$this->mobile_extra->setDbValueDef($rsnew, $this->mobile_extra->CurrentValue, NULL, $this->mobile_extra->ReadOnly);

			// fax_extra
			$this->fax_extra->setDbValueDef($rsnew, $this->fax_extra->CurrentValue, NULL, $this->fax_extra->ReadOnly);

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
		$Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("crm_leadaddresslist.php"), "", $this->TableVar, TRUE);
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
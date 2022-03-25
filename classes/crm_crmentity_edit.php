<?php
namespace PHPMaker2019\HIMS;

/**
 * Page class
 */
class crm_crmentity_edit extends crm_crmentity
{

	// Page ID
	public $PageID = "edit";

	// Project ID
	public $ProjectID = "{EA4F6D13-AF8F-428D-9EA7-BA88D1107EC3}";

	// Table name
	public $TableName = 'crm_crmentity';

	// Page object name
	public $PageObjName = "crm_crmentity_edit";

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

		// Table object (crm_crmentity)
		if (!isset($GLOBALS["crm_crmentity"]) || get_class($GLOBALS["crm_crmentity"]) == PROJECT_NAMESPACE . "crm_crmentity") {
			$GLOBALS["crm_crmentity"] = &$this;
			$GLOBALS["Table"] = &$GLOBALS["crm_crmentity"];
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
			define(PROJECT_NAMESPACE . "TABLE_NAME", 'crm_crmentity');

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
		global $EXPORT, $crm_crmentity;
		if ($this->CustomExport && $this->CustomExport == $this->Export && array_key_exists($this->CustomExport, $EXPORT)) {
				$content = ob_get_contents();
			if ($ExportFileName == "")
				$ExportFileName = $this->TableVar;
			$class = PROJECT_NAMESPACE . $EXPORT[$this->CustomExport];
			if (class_exists($class)) {
				$doc = new $class($crm_crmentity);
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
					if ($pageName == "crm_crmentityview.php")
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
			$key .= @$ar['crmid'];
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
			$this->crmid->Visible = FALSE;
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
					$this->terminate(GetUrl("crm_crmentitylist.php"));
				else
					$this->terminate(GetUrl("login.php"));
				return;
			}
		}

		// Create form object
		$CurrentForm = new HttpForm();
		$this->CurrentAction = Param("action"); // Set up current action
		$this->crmid->setVisibility();
		$this->smcreatorid->setVisibility();
		$this->smownerid->setVisibility();
		$this->shownerid->setVisibility();
		$this->modifiedby->setVisibility();
		$this->setype->setVisibility();
		$this->description->setVisibility();
		$this->attention->setVisibility();
		$this->createdtime->setVisibility();
		$this->modifiedtime->setVisibility();
		$this->viewedtime->setVisibility();
		$this->status->setVisibility();
		$this->version->setVisibility();
		$this->presence->setVisibility();
		$this->deleted->setVisibility();
		$this->was_read->setVisibility();
		$this->_private->setVisibility();
		$this->users->setVisibility();
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
			if ($CurrentForm->hasValue("x_crmid")) {
				$this->crmid->setFormValue($CurrentForm->getValue("x_crmid"));
			}
		} else {
			$this->CurrentAction = "show"; // Default action is display

			// Load key from QueryString
			$loadByQuery = FALSE;
			if (Get("crmid") !== NULL) {
				$this->crmid->setQueryStringValue(Get("crmid"));
				$loadByQuery = TRUE;
			} else {
				$this->crmid->CurrentValue = NULL;
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
					$this->terminate("crm_crmentitylist.php"); // No matching record, return to list
				}
				break;
			case "update": // Update
				$returnUrl = $this->getReturnUrl();
				if (GetPageName($returnUrl) == "crm_crmentitylist.php")
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

		// Check field name 'crmid' first before field var 'x_crmid'
		$val = $CurrentForm->hasValue("crmid") ? $CurrentForm->getValue("crmid") : $CurrentForm->getValue("x_crmid");
		if (!$this->crmid->IsDetailKey)
			$this->crmid->setFormValue($val);

		// Check field name 'smcreatorid' first before field var 'x_smcreatorid'
		$val = $CurrentForm->hasValue("smcreatorid") ? $CurrentForm->getValue("smcreatorid") : $CurrentForm->getValue("x_smcreatorid");
		if (!$this->smcreatorid->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->smcreatorid->Visible = FALSE; // Disable update for API request
			else
				$this->smcreatorid->setFormValue($val);
		}

		// Check field name 'smownerid' first before field var 'x_smownerid'
		$val = $CurrentForm->hasValue("smownerid") ? $CurrentForm->getValue("smownerid") : $CurrentForm->getValue("x_smownerid");
		if (!$this->smownerid->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->smownerid->Visible = FALSE; // Disable update for API request
			else
				$this->smownerid->setFormValue($val);
		}

		// Check field name 'shownerid' first before field var 'x_shownerid'
		$val = $CurrentForm->hasValue("shownerid") ? $CurrentForm->getValue("shownerid") : $CurrentForm->getValue("x_shownerid");
		if (!$this->shownerid->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->shownerid->Visible = FALSE; // Disable update for API request
			else
				$this->shownerid->setFormValue($val);
		}

		// Check field name 'modifiedby' first before field var 'x_modifiedby'
		$val = $CurrentForm->hasValue("modifiedby") ? $CurrentForm->getValue("modifiedby") : $CurrentForm->getValue("x_modifiedby");
		if (!$this->modifiedby->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->modifiedby->Visible = FALSE; // Disable update for API request
			else
				$this->modifiedby->setFormValue($val);
		}

		// Check field name 'setype' first before field var 'x_setype'
		$val = $CurrentForm->hasValue("setype") ? $CurrentForm->getValue("setype") : $CurrentForm->getValue("x_setype");
		if (!$this->setype->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->setype->Visible = FALSE; // Disable update for API request
			else
				$this->setype->setFormValue($val);
		}

		// Check field name 'description' first before field var 'x_description'
		$val = $CurrentForm->hasValue("description") ? $CurrentForm->getValue("description") : $CurrentForm->getValue("x_description");
		if (!$this->description->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->description->Visible = FALSE; // Disable update for API request
			else
				$this->description->setFormValue($val);
		}

		// Check field name 'attention' first before field var 'x_attention'
		$val = $CurrentForm->hasValue("attention") ? $CurrentForm->getValue("attention") : $CurrentForm->getValue("x_attention");
		if (!$this->attention->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->attention->Visible = FALSE; // Disable update for API request
			else
				$this->attention->setFormValue($val);
		}

		// Check field name 'createdtime' first before field var 'x_createdtime'
		$val = $CurrentForm->hasValue("createdtime") ? $CurrentForm->getValue("createdtime") : $CurrentForm->getValue("x_createdtime");
		if (!$this->createdtime->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->createdtime->Visible = FALSE; // Disable update for API request
			else
				$this->createdtime->setFormValue($val);
			$this->createdtime->CurrentValue = UnFormatDateTime($this->createdtime->CurrentValue, 0);
		}

		// Check field name 'modifiedtime' first before field var 'x_modifiedtime'
		$val = $CurrentForm->hasValue("modifiedtime") ? $CurrentForm->getValue("modifiedtime") : $CurrentForm->getValue("x_modifiedtime");
		if (!$this->modifiedtime->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->modifiedtime->Visible = FALSE; // Disable update for API request
			else
				$this->modifiedtime->setFormValue($val);
			$this->modifiedtime->CurrentValue = UnFormatDateTime($this->modifiedtime->CurrentValue, 0);
		}

		// Check field name 'viewedtime' first before field var 'x_viewedtime'
		$val = $CurrentForm->hasValue("viewedtime") ? $CurrentForm->getValue("viewedtime") : $CurrentForm->getValue("x_viewedtime");
		if (!$this->viewedtime->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->viewedtime->Visible = FALSE; // Disable update for API request
			else
				$this->viewedtime->setFormValue($val);
			$this->viewedtime->CurrentValue = UnFormatDateTime($this->viewedtime->CurrentValue, 0);
		}

		// Check field name 'status' first before field var 'x_status'
		$val = $CurrentForm->hasValue("status") ? $CurrentForm->getValue("status") : $CurrentForm->getValue("x_status");
		if (!$this->status->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->status->Visible = FALSE; // Disable update for API request
			else
				$this->status->setFormValue($val);
		}

		// Check field name 'version' first before field var 'x_version'
		$val = $CurrentForm->hasValue("version") ? $CurrentForm->getValue("version") : $CurrentForm->getValue("x_version");
		if (!$this->version->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->version->Visible = FALSE; // Disable update for API request
			else
				$this->version->setFormValue($val);
		}

		// Check field name 'presence' first before field var 'x_presence'
		$val = $CurrentForm->hasValue("presence") ? $CurrentForm->getValue("presence") : $CurrentForm->getValue("x_presence");
		if (!$this->presence->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->presence->Visible = FALSE; // Disable update for API request
			else
				$this->presence->setFormValue($val);
		}

		// Check field name 'deleted' first before field var 'x_deleted'
		$val = $CurrentForm->hasValue("deleted") ? $CurrentForm->getValue("deleted") : $CurrentForm->getValue("x_deleted");
		if (!$this->deleted->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->deleted->Visible = FALSE; // Disable update for API request
			else
				$this->deleted->setFormValue($val);
		}

		// Check field name 'was_read' first before field var 'x_was_read'
		$val = $CurrentForm->hasValue("was_read") ? $CurrentForm->getValue("was_read") : $CurrentForm->getValue("x_was_read");
		if (!$this->was_read->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->was_read->Visible = FALSE; // Disable update for API request
			else
				$this->was_read->setFormValue($val);
		}

		// Check field name 'private' first before field var 'x__private'
		$val = $CurrentForm->hasValue("private") ? $CurrentForm->getValue("private") : $CurrentForm->getValue("x__private");
		if (!$this->_private->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->_private->Visible = FALSE; // Disable update for API request
			else
				$this->_private->setFormValue($val);
		}

		// Check field name 'users' first before field var 'x_users'
		$val = $CurrentForm->hasValue("users") ? $CurrentForm->getValue("users") : $CurrentForm->getValue("x_users");
		if (!$this->users->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->users->Visible = FALSE; // Disable update for API request
			else
				$this->users->setFormValue($val);
		}
	}

	// Restore form values
	public function restoreFormValues()
	{
		global $CurrentForm;
		$this->crmid->CurrentValue = $this->crmid->FormValue;
		$this->smcreatorid->CurrentValue = $this->smcreatorid->FormValue;
		$this->smownerid->CurrentValue = $this->smownerid->FormValue;
		$this->shownerid->CurrentValue = $this->shownerid->FormValue;
		$this->modifiedby->CurrentValue = $this->modifiedby->FormValue;
		$this->setype->CurrentValue = $this->setype->FormValue;
		$this->description->CurrentValue = $this->description->FormValue;
		$this->attention->CurrentValue = $this->attention->FormValue;
		$this->createdtime->CurrentValue = $this->createdtime->FormValue;
		$this->createdtime->CurrentValue = UnFormatDateTime($this->createdtime->CurrentValue, 0);
		$this->modifiedtime->CurrentValue = $this->modifiedtime->FormValue;
		$this->modifiedtime->CurrentValue = UnFormatDateTime($this->modifiedtime->CurrentValue, 0);
		$this->viewedtime->CurrentValue = $this->viewedtime->FormValue;
		$this->viewedtime->CurrentValue = UnFormatDateTime($this->viewedtime->CurrentValue, 0);
		$this->status->CurrentValue = $this->status->FormValue;
		$this->version->CurrentValue = $this->version->FormValue;
		$this->presence->CurrentValue = $this->presence->FormValue;
		$this->deleted->CurrentValue = $this->deleted->FormValue;
		$this->was_read->CurrentValue = $this->was_read->FormValue;
		$this->_private->CurrentValue = $this->_private->FormValue;
		$this->users->CurrentValue = $this->users->FormValue;
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
		$this->crmid->setDbValue($row['crmid']);
		$this->smcreatorid->setDbValue($row['smcreatorid']);
		$this->smownerid->setDbValue($row['smownerid']);
		$this->shownerid->setDbValue($row['shownerid']);
		$this->modifiedby->setDbValue($row['modifiedby']);
		$this->setype->setDbValue($row['setype']);
		$this->description->setDbValue($row['description']);
		$this->attention->setDbValue($row['attention']);
		$this->createdtime->setDbValue($row['createdtime']);
		$this->modifiedtime->setDbValue($row['modifiedtime']);
		$this->viewedtime->setDbValue($row['viewedtime']);
		$this->status->setDbValue($row['status']);
		$this->version->setDbValue($row['version']);
		$this->presence->setDbValue($row['presence']);
		$this->deleted->setDbValue($row['deleted']);
		$this->was_read->setDbValue($row['was_read']);
		$this->_private->setDbValue($row['private']);
		$this->users->setDbValue($row['users']);
	}

	// Return a row with default values
	protected function newRow()
	{
		$row = [];
		$row['crmid'] = NULL;
		$row['smcreatorid'] = NULL;
		$row['smownerid'] = NULL;
		$row['shownerid'] = NULL;
		$row['modifiedby'] = NULL;
		$row['setype'] = NULL;
		$row['description'] = NULL;
		$row['attention'] = NULL;
		$row['createdtime'] = NULL;
		$row['modifiedtime'] = NULL;
		$row['viewedtime'] = NULL;
		$row['status'] = NULL;
		$row['version'] = NULL;
		$row['presence'] = NULL;
		$row['deleted'] = NULL;
		$row['was_read'] = NULL;
		$row['private'] = NULL;
		$row['users'] = NULL;
		return $row;
	}

	// Load old record
	protected function loadOldRecord()
	{

		// Load key values from Session
		$validKey = TRUE;
		if (strval($this->getKey("crmid")) <> "")
			$this->crmid->CurrentValue = $this->getKey("crmid"); // crmid
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
		// crmid
		// smcreatorid
		// smownerid
		// shownerid
		// modifiedby
		// setype
		// description
		// attention
		// createdtime
		// modifiedtime
		// viewedtime
		// status
		// version
		// presence
		// deleted
		// was_read
		// private
		// users

		if ($this->RowType == ROWTYPE_VIEW) { // View row

			// crmid
			$this->crmid->ViewValue = $this->crmid->CurrentValue;
			$this->crmid->ViewCustomAttributes = "";

			// smcreatorid
			$this->smcreatorid->ViewValue = $this->smcreatorid->CurrentValue;
			$this->smcreatorid->ViewValue = FormatNumber($this->smcreatorid->ViewValue, 0, -2, -2, -2);
			$this->smcreatorid->ViewCustomAttributes = "";

			// smownerid
			$this->smownerid->ViewValue = $this->smownerid->CurrentValue;
			$this->smownerid->ViewValue = FormatNumber($this->smownerid->ViewValue, 0, -2, -2, -2);
			$this->smownerid->ViewCustomAttributes = "";

			// shownerid
			$this->shownerid->ViewValue = $this->shownerid->CurrentValue;
			$this->shownerid->ViewValue = FormatNumber($this->shownerid->ViewValue, 0, -2, -2, -2);
			$this->shownerid->ViewCustomAttributes = "";

			// modifiedby
			$this->modifiedby->ViewValue = $this->modifiedby->CurrentValue;
			$this->modifiedby->ViewValue = FormatNumber($this->modifiedby->ViewValue, 0, -2, -2, -2);
			$this->modifiedby->ViewCustomAttributes = "";

			// setype
			$this->setype->ViewValue = $this->setype->CurrentValue;
			$this->setype->ViewCustomAttributes = "";

			// description
			$this->description->ViewValue = $this->description->CurrentValue;
			$this->description->ViewCustomAttributes = "";

			// attention
			$this->attention->ViewValue = $this->attention->CurrentValue;
			$this->attention->ViewCustomAttributes = "";

			// createdtime
			$this->createdtime->ViewValue = $this->createdtime->CurrentValue;
			$this->createdtime->ViewValue = FormatDateTime($this->createdtime->ViewValue, 0);
			$this->createdtime->ViewCustomAttributes = "";

			// modifiedtime
			$this->modifiedtime->ViewValue = $this->modifiedtime->CurrentValue;
			$this->modifiedtime->ViewValue = FormatDateTime($this->modifiedtime->ViewValue, 0);
			$this->modifiedtime->ViewCustomAttributes = "";

			// viewedtime
			$this->viewedtime->ViewValue = $this->viewedtime->CurrentValue;
			$this->viewedtime->ViewValue = FormatDateTime($this->viewedtime->ViewValue, 0);
			$this->viewedtime->ViewCustomAttributes = "";

			// status
			$this->status->ViewValue = $this->status->CurrentValue;
			$this->status->ViewCustomAttributes = "";

			// version
			$this->version->ViewValue = $this->version->CurrentValue;
			$this->version->ViewValue = FormatNumber($this->version->ViewValue, 0, -2, -2, -2);
			$this->version->ViewCustomAttributes = "";

			// presence
			$this->presence->ViewValue = $this->presence->CurrentValue;
			$this->presence->ViewValue = FormatNumber($this->presence->ViewValue, 0, -2, -2, -2);
			$this->presence->ViewCustomAttributes = "";

			// deleted
			$this->deleted->ViewValue = $this->deleted->CurrentValue;
			$this->deleted->ViewValue = FormatNumber($this->deleted->ViewValue, 0, -2, -2, -2);
			$this->deleted->ViewCustomAttributes = "";

			// was_read
			$this->was_read->ViewValue = $this->was_read->CurrentValue;
			$this->was_read->ViewValue = FormatNumber($this->was_read->ViewValue, 0, -2, -2, -2);
			$this->was_read->ViewCustomAttributes = "";

			// private
			$this->_private->ViewValue = $this->_private->CurrentValue;
			$this->_private->ViewValue = FormatNumber($this->_private->ViewValue, 0, -2, -2, -2);
			$this->_private->ViewCustomAttributes = "";

			// users
			$this->users->ViewValue = $this->users->CurrentValue;
			$this->users->ViewCustomAttributes = "";

			// crmid
			$this->crmid->LinkCustomAttributes = "";
			$this->crmid->HrefValue = "";
			$this->crmid->TooltipValue = "";

			// smcreatorid
			$this->smcreatorid->LinkCustomAttributes = "";
			$this->smcreatorid->HrefValue = "";
			$this->smcreatorid->TooltipValue = "";

			// smownerid
			$this->smownerid->LinkCustomAttributes = "";
			$this->smownerid->HrefValue = "";
			$this->smownerid->TooltipValue = "";

			// shownerid
			$this->shownerid->LinkCustomAttributes = "";
			$this->shownerid->HrefValue = "";
			$this->shownerid->TooltipValue = "";

			// modifiedby
			$this->modifiedby->LinkCustomAttributes = "";
			$this->modifiedby->HrefValue = "";
			$this->modifiedby->TooltipValue = "";

			// setype
			$this->setype->LinkCustomAttributes = "";
			$this->setype->HrefValue = "";
			$this->setype->TooltipValue = "";

			// description
			$this->description->LinkCustomAttributes = "";
			$this->description->HrefValue = "";
			$this->description->TooltipValue = "";

			// attention
			$this->attention->LinkCustomAttributes = "";
			$this->attention->HrefValue = "";
			$this->attention->TooltipValue = "";

			// createdtime
			$this->createdtime->LinkCustomAttributes = "";
			$this->createdtime->HrefValue = "";
			$this->createdtime->TooltipValue = "";

			// modifiedtime
			$this->modifiedtime->LinkCustomAttributes = "";
			$this->modifiedtime->HrefValue = "";
			$this->modifiedtime->TooltipValue = "";

			// viewedtime
			$this->viewedtime->LinkCustomAttributes = "";
			$this->viewedtime->HrefValue = "";
			$this->viewedtime->TooltipValue = "";

			// status
			$this->status->LinkCustomAttributes = "";
			$this->status->HrefValue = "";
			$this->status->TooltipValue = "";

			// version
			$this->version->LinkCustomAttributes = "";
			$this->version->HrefValue = "";
			$this->version->TooltipValue = "";

			// presence
			$this->presence->LinkCustomAttributes = "";
			$this->presence->HrefValue = "";
			$this->presence->TooltipValue = "";

			// deleted
			$this->deleted->LinkCustomAttributes = "";
			$this->deleted->HrefValue = "";
			$this->deleted->TooltipValue = "";

			// was_read
			$this->was_read->LinkCustomAttributes = "";
			$this->was_read->HrefValue = "";
			$this->was_read->TooltipValue = "";

			// private
			$this->_private->LinkCustomAttributes = "";
			$this->_private->HrefValue = "";
			$this->_private->TooltipValue = "";

			// users
			$this->users->LinkCustomAttributes = "";
			$this->users->HrefValue = "";
			$this->users->TooltipValue = "";
		} elseif ($this->RowType == ROWTYPE_EDIT) { // Edit row

			// crmid
			$this->crmid->EditAttrs["class"] = "form-control";
			$this->crmid->EditCustomAttributes = "";
			$this->crmid->EditValue = $this->crmid->CurrentValue;
			$this->crmid->ViewCustomAttributes = "";

			// smcreatorid
			$this->smcreatorid->EditAttrs["class"] = "form-control";
			$this->smcreatorid->EditCustomAttributes = "";
			$this->smcreatorid->EditValue = HtmlEncode($this->smcreatorid->CurrentValue);
			$this->smcreatorid->PlaceHolder = RemoveHtml($this->smcreatorid->caption());

			// smownerid
			$this->smownerid->EditAttrs["class"] = "form-control";
			$this->smownerid->EditCustomAttributes = "";
			$this->smownerid->EditValue = HtmlEncode($this->smownerid->CurrentValue);
			$this->smownerid->PlaceHolder = RemoveHtml($this->smownerid->caption());

			// shownerid
			$this->shownerid->EditAttrs["class"] = "form-control";
			$this->shownerid->EditCustomAttributes = "";
			$this->shownerid->EditValue = HtmlEncode($this->shownerid->CurrentValue);
			$this->shownerid->PlaceHolder = RemoveHtml($this->shownerid->caption());

			// modifiedby
			$this->modifiedby->EditAttrs["class"] = "form-control";
			$this->modifiedby->EditCustomAttributes = "";
			$this->modifiedby->EditValue = HtmlEncode($this->modifiedby->CurrentValue);
			$this->modifiedby->PlaceHolder = RemoveHtml($this->modifiedby->caption());

			// setype
			$this->setype->EditAttrs["class"] = "form-control";
			$this->setype->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->setype->CurrentValue = HtmlDecode($this->setype->CurrentValue);
			$this->setype->EditValue = HtmlEncode($this->setype->CurrentValue);
			$this->setype->PlaceHolder = RemoveHtml($this->setype->caption());

			// description
			$this->description->EditAttrs["class"] = "form-control";
			$this->description->EditCustomAttributes = "";
			$this->description->EditValue = HtmlEncode($this->description->CurrentValue);
			$this->description->PlaceHolder = RemoveHtml($this->description->caption());

			// attention
			$this->attention->EditAttrs["class"] = "form-control";
			$this->attention->EditCustomAttributes = "";
			$this->attention->EditValue = HtmlEncode($this->attention->CurrentValue);
			$this->attention->PlaceHolder = RemoveHtml($this->attention->caption());

			// createdtime
			$this->createdtime->EditAttrs["class"] = "form-control";
			$this->createdtime->EditCustomAttributes = "";
			$this->createdtime->EditValue = HtmlEncode(FormatDateTime($this->createdtime->CurrentValue, 8));
			$this->createdtime->PlaceHolder = RemoveHtml($this->createdtime->caption());

			// modifiedtime
			$this->modifiedtime->EditAttrs["class"] = "form-control";
			$this->modifiedtime->EditCustomAttributes = "";
			$this->modifiedtime->EditValue = HtmlEncode(FormatDateTime($this->modifiedtime->CurrentValue, 8));
			$this->modifiedtime->PlaceHolder = RemoveHtml($this->modifiedtime->caption());

			// viewedtime
			$this->viewedtime->EditAttrs["class"] = "form-control";
			$this->viewedtime->EditCustomAttributes = "";
			$this->viewedtime->EditValue = HtmlEncode(FormatDateTime($this->viewedtime->CurrentValue, 8));
			$this->viewedtime->PlaceHolder = RemoveHtml($this->viewedtime->caption());

			// status
			$this->status->EditAttrs["class"] = "form-control";
			$this->status->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->status->CurrentValue = HtmlDecode($this->status->CurrentValue);
			$this->status->EditValue = HtmlEncode($this->status->CurrentValue);
			$this->status->PlaceHolder = RemoveHtml($this->status->caption());

			// version
			$this->version->EditAttrs["class"] = "form-control";
			$this->version->EditCustomAttributes = "";
			$this->version->EditValue = HtmlEncode($this->version->CurrentValue);
			$this->version->PlaceHolder = RemoveHtml($this->version->caption());

			// presence
			$this->presence->EditAttrs["class"] = "form-control";
			$this->presence->EditCustomAttributes = "";
			$this->presence->EditValue = HtmlEncode($this->presence->CurrentValue);
			$this->presence->PlaceHolder = RemoveHtml($this->presence->caption());

			// deleted
			$this->deleted->EditAttrs["class"] = "form-control";
			$this->deleted->EditCustomAttributes = "";
			$this->deleted->EditValue = HtmlEncode($this->deleted->CurrentValue);
			$this->deleted->PlaceHolder = RemoveHtml($this->deleted->caption());

			// was_read
			$this->was_read->EditAttrs["class"] = "form-control";
			$this->was_read->EditCustomAttributes = "";
			$this->was_read->EditValue = HtmlEncode($this->was_read->CurrentValue);
			$this->was_read->PlaceHolder = RemoveHtml($this->was_read->caption());

			// private
			$this->_private->EditAttrs["class"] = "form-control";
			$this->_private->EditCustomAttributes = "";
			$this->_private->EditValue = HtmlEncode($this->_private->CurrentValue);
			$this->_private->PlaceHolder = RemoveHtml($this->_private->caption());

			// users
			$this->users->EditAttrs["class"] = "form-control";
			$this->users->EditCustomAttributes = "";
			$this->users->EditValue = HtmlEncode($this->users->CurrentValue);
			$this->users->PlaceHolder = RemoveHtml($this->users->caption());

			// Edit refer script
			// crmid

			$this->crmid->LinkCustomAttributes = "";
			$this->crmid->HrefValue = "";

			// smcreatorid
			$this->smcreatorid->LinkCustomAttributes = "";
			$this->smcreatorid->HrefValue = "";

			// smownerid
			$this->smownerid->LinkCustomAttributes = "";
			$this->smownerid->HrefValue = "";

			// shownerid
			$this->shownerid->LinkCustomAttributes = "";
			$this->shownerid->HrefValue = "";

			// modifiedby
			$this->modifiedby->LinkCustomAttributes = "";
			$this->modifiedby->HrefValue = "";

			// setype
			$this->setype->LinkCustomAttributes = "";
			$this->setype->HrefValue = "";

			// description
			$this->description->LinkCustomAttributes = "";
			$this->description->HrefValue = "";

			// attention
			$this->attention->LinkCustomAttributes = "";
			$this->attention->HrefValue = "";

			// createdtime
			$this->createdtime->LinkCustomAttributes = "";
			$this->createdtime->HrefValue = "";

			// modifiedtime
			$this->modifiedtime->LinkCustomAttributes = "";
			$this->modifiedtime->HrefValue = "";

			// viewedtime
			$this->viewedtime->LinkCustomAttributes = "";
			$this->viewedtime->HrefValue = "";

			// status
			$this->status->LinkCustomAttributes = "";
			$this->status->HrefValue = "";

			// version
			$this->version->LinkCustomAttributes = "";
			$this->version->HrefValue = "";

			// presence
			$this->presence->LinkCustomAttributes = "";
			$this->presence->HrefValue = "";

			// deleted
			$this->deleted->LinkCustomAttributes = "";
			$this->deleted->HrefValue = "";

			// was_read
			$this->was_read->LinkCustomAttributes = "";
			$this->was_read->HrefValue = "";

			// private
			$this->_private->LinkCustomAttributes = "";
			$this->_private->HrefValue = "";

			// users
			$this->users->LinkCustomAttributes = "";
			$this->users->HrefValue = "";
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
		if ($this->crmid->Required) {
			if (!$this->crmid->IsDetailKey && $this->crmid->FormValue != NULL && $this->crmid->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->crmid->caption(), $this->crmid->RequiredErrorMessage));
			}
		}
		if ($this->smcreatorid->Required) {
			if (!$this->smcreatorid->IsDetailKey && $this->smcreatorid->FormValue != NULL && $this->smcreatorid->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->smcreatorid->caption(), $this->smcreatorid->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->smcreatorid->FormValue)) {
			AddMessage($FormError, $this->smcreatorid->errorMessage());
		}
		if ($this->smownerid->Required) {
			if (!$this->smownerid->IsDetailKey && $this->smownerid->FormValue != NULL && $this->smownerid->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->smownerid->caption(), $this->smownerid->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->smownerid->FormValue)) {
			AddMessage($FormError, $this->smownerid->errorMessage());
		}
		if ($this->shownerid->Required) {
			if (!$this->shownerid->IsDetailKey && $this->shownerid->FormValue != NULL && $this->shownerid->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->shownerid->caption(), $this->shownerid->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->shownerid->FormValue)) {
			AddMessage($FormError, $this->shownerid->errorMessage());
		}
		if ($this->modifiedby->Required) {
			if (!$this->modifiedby->IsDetailKey && $this->modifiedby->FormValue != NULL && $this->modifiedby->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->modifiedby->caption(), $this->modifiedby->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->modifiedby->FormValue)) {
			AddMessage($FormError, $this->modifiedby->errorMessage());
		}
		if ($this->setype->Required) {
			if (!$this->setype->IsDetailKey && $this->setype->FormValue != NULL && $this->setype->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->setype->caption(), $this->setype->RequiredErrorMessage));
			}
		}
		if ($this->description->Required) {
			if (!$this->description->IsDetailKey && $this->description->FormValue != NULL && $this->description->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->description->caption(), $this->description->RequiredErrorMessage));
			}
		}
		if ($this->attention->Required) {
			if (!$this->attention->IsDetailKey && $this->attention->FormValue != NULL && $this->attention->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->attention->caption(), $this->attention->RequiredErrorMessage));
			}
		}
		if ($this->createdtime->Required) {
			if (!$this->createdtime->IsDetailKey && $this->createdtime->FormValue != NULL && $this->createdtime->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->createdtime->caption(), $this->createdtime->RequiredErrorMessage));
			}
		}
		if (!CheckDate($this->createdtime->FormValue)) {
			AddMessage($FormError, $this->createdtime->errorMessage());
		}
		if ($this->modifiedtime->Required) {
			if (!$this->modifiedtime->IsDetailKey && $this->modifiedtime->FormValue != NULL && $this->modifiedtime->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->modifiedtime->caption(), $this->modifiedtime->RequiredErrorMessage));
			}
		}
		if (!CheckDate($this->modifiedtime->FormValue)) {
			AddMessage($FormError, $this->modifiedtime->errorMessage());
		}
		if ($this->viewedtime->Required) {
			if (!$this->viewedtime->IsDetailKey && $this->viewedtime->FormValue != NULL && $this->viewedtime->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->viewedtime->caption(), $this->viewedtime->RequiredErrorMessage));
			}
		}
		if (!CheckDate($this->viewedtime->FormValue)) {
			AddMessage($FormError, $this->viewedtime->errorMessage());
		}
		if ($this->status->Required) {
			if (!$this->status->IsDetailKey && $this->status->FormValue != NULL && $this->status->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->status->caption(), $this->status->RequiredErrorMessage));
			}
		}
		if ($this->version->Required) {
			if (!$this->version->IsDetailKey && $this->version->FormValue != NULL && $this->version->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->version->caption(), $this->version->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->version->FormValue)) {
			AddMessage($FormError, $this->version->errorMessage());
		}
		if ($this->presence->Required) {
			if (!$this->presence->IsDetailKey && $this->presence->FormValue != NULL && $this->presence->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->presence->caption(), $this->presence->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->presence->FormValue)) {
			AddMessage($FormError, $this->presence->errorMessage());
		}
		if ($this->deleted->Required) {
			if (!$this->deleted->IsDetailKey && $this->deleted->FormValue != NULL && $this->deleted->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->deleted->caption(), $this->deleted->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->deleted->FormValue)) {
			AddMessage($FormError, $this->deleted->errorMessage());
		}
		if ($this->was_read->Required) {
			if (!$this->was_read->IsDetailKey && $this->was_read->FormValue != NULL && $this->was_read->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->was_read->caption(), $this->was_read->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->was_read->FormValue)) {
			AddMessage($FormError, $this->was_read->errorMessage());
		}
		if ($this->_private->Required) {
			if (!$this->_private->IsDetailKey && $this->_private->FormValue != NULL && $this->_private->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->_private->caption(), $this->_private->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->_private->FormValue)) {
			AddMessage($FormError, $this->_private->errorMessage());
		}
		if ($this->users->Required) {
			if (!$this->users->IsDetailKey && $this->users->FormValue != NULL && $this->users->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->users->caption(), $this->users->RequiredErrorMessage));
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

			// smcreatorid
			$this->smcreatorid->setDbValueDef($rsnew, $this->smcreatorid->CurrentValue, 0, $this->smcreatorid->ReadOnly);

			// smownerid
			$this->smownerid->setDbValueDef($rsnew, $this->smownerid->CurrentValue, 0, $this->smownerid->ReadOnly);

			// shownerid
			$this->shownerid->setDbValueDef($rsnew, $this->shownerid->CurrentValue, NULL, $this->shownerid->ReadOnly);

			// modifiedby
			$this->modifiedby->setDbValueDef($rsnew, $this->modifiedby->CurrentValue, 0, $this->modifiedby->ReadOnly);

			// setype
			$this->setype->setDbValueDef($rsnew, $this->setype->CurrentValue, "", $this->setype->ReadOnly);

			// description
			$this->description->setDbValueDef($rsnew, $this->description->CurrentValue, NULL, $this->description->ReadOnly);

			// attention
			$this->attention->setDbValueDef($rsnew, $this->attention->CurrentValue, NULL, $this->attention->ReadOnly);

			// createdtime
			$this->createdtime->setDbValueDef($rsnew, UnFormatDateTime($this->createdtime->CurrentValue, 0), CurrentDate(), $this->createdtime->ReadOnly);

			// modifiedtime
			$this->modifiedtime->setDbValueDef($rsnew, UnFormatDateTime($this->modifiedtime->CurrentValue, 0), CurrentDate(), $this->modifiedtime->ReadOnly);

			// viewedtime
			$this->viewedtime->setDbValueDef($rsnew, UnFormatDateTime($this->viewedtime->CurrentValue, 0), NULL, $this->viewedtime->ReadOnly);

			// status
			$this->status->setDbValueDef($rsnew, $this->status->CurrentValue, NULL, $this->status->ReadOnly);

			// version
			$this->version->setDbValueDef($rsnew, $this->version->CurrentValue, 0, $this->version->ReadOnly);

			// presence
			$this->presence->setDbValueDef($rsnew, $this->presence->CurrentValue, 0, $this->presence->ReadOnly);

			// deleted
			$this->deleted->setDbValueDef($rsnew, $this->deleted->CurrentValue, 0, $this->deleted->ReadOnly);

			// was_read
			$this->was_read->setDbValueDef($rsnew, $this->was_read->CurrentValue, NULL, $this->was_read->ReadOnly);

			// private
			$this->_private->setDbValueDef($rsnew, $this->_private->CurrentValue, NULL, $this->_private->ReadOnly);

			// users
			$this->users->setDbValueDef($rsnew, $this->users->CurrentValue, NULL, $this->users->ReadOnly);

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
		$Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("crm_crmentitylist.php"), "", $this->TableVar, TRUE);
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
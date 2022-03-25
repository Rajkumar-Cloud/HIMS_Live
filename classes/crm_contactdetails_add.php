<?php
namespace PHPMaker2019\HIMS;

/**
 * Page class
 */
class crm_contactdetails_add extends crm_contactdetails
{

	// Page ID
	public $PageID = "add";

	// Project ID
	public $ProjectID = "{EA4F6D13-AF8F-428D-9EA7-BA88D1107EC3}";

	// Table name
	public $TableName = 'crm_contactdetails';

	// Page object name
	public $PageObjName = "crm_contactdetails_add";

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

		// Table object (crm_contactdetails)
		if (!isset($GLOBALS["crm_contactdetails"]) || get_class($GLOBALS["crm_contactdetails"]) == PROJECT_NAMESPACE . "crm_contactdetails") {
			$GLOBALS["crm_contactdetails"] = &$this;
			$GLOBALS["Table"] = &$GLOBALS["crm_contactdetails"];
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
			define(PROJECT_NAMESPACE . "TABLE_NAME", 'crm_contactdetails');

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
		global $EXPORT, $crm_contactdetails;
		if ($this->CustomExport && $this->CustomExport == $this->Export && array_key_exists($this->CustomExport, $EXPORT)) {
				$content = ob_get_contents();
			if ($ExportFileName == "")
				$ExportFileName = $this->TableVar;
			$class = PROJECT_NAMESPACE . $EXPORT[$this->CustomExport];
			if (class_exists($class)) {
				$doc = new $class($crm_contactdetails);
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
					if ($pageName == "crm_contactdetailsview.php")
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
			$key .= @$ar['contactid'];
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
					$this->terminate(GetUrl("crm_contactdetailslist.php"));
				else
					$this->terminate(GetUrl("login.php"));
				return;
			}
		}

		// Create form object
		$CurrentForm = new HttpForm();
		$this->CurrentAction = Param("action"); // Set up current action
		$this->contactid->setVisibility();
		$this->contact_no->setVisibility();
		$this->parentid->setVisibility();
		$this->salutation->setVisibility();
		$this->firstname->setVisibility();
		$this->lastname->setVisibility();
		$this->_email->setVisibility();
		$this->phone->setVisibility();
		$this->mobile->setVisibility();
		$this->reportsto->setVisibility();
		$this->training->setVisibility();
		$this->usertype->setVisibility();
		$this->contacttype->setVisibility();
		$this->otheremail->setVisibility();
		$this->donotcall->setVisibility();
		$this->emailoptout->setVisibility();
		$this->imagename->setVisibility();
		$this->isconvertedfromlead->setVisibility();
		$this->verification->setVisibility();
		$this->secondary_email->setVisibility();
		$this->notifilanguage->setVisibility();
		$this->contactstatus->setVisibility();
		$this->dav_status->setVisibility();
		$this->jobtitle->setVisibility();
		$this->decision_maker->setVisibility();
		$this->sum_time->setVisibility();
		$this->phone_extra->setVisibility();
		$this->mobile_extra->setVisibility();
		$this->approvals->setVisibility();
		$this->gender->setVisibility();
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
			if (Get("contactid") !== NULL) {
				$this->contactid->setQueryStringValue(Get("contactid"));
				$this->setKey("contactid", $this->contactid->CurrentValue); // Set up key
			} else {
				$this->setKey("contactid", ""); // Clear key
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
					$this->terminate("crm_contactdetailslist.php"); // No matching record, return to list
				}
				break;
			case "insert": // Add new record
				$this->SendEmail = TRUE; // Send email on add success
				if ($this->addRow($this->OldRecordset)) { // Add successful
					if ($this->getSuccessMessage() == "")
						$this->setSuccessMessage($Language->phrase("AddSuccess")); // Set up success message
					$returnUrl = $this->getReturnUrl();
					if (GetPageName($returnUrl) == "crm_contactdetailslist.php")
						$returnUrl = $this->addMasterUrl($returnUrl); // List page, return to List page with correct master key if necessary
					elseif (GetPageName($returnUrl) == "crm_contactdetailsview.php")
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
		$this->contactid->CurrentValue = 0;
		$this->contact_no->CurrentValue = NULL;
		$this->contact_no->OldValue = $this->contact_no->CurrentValue;
		$this->parentid->CurrentValue = NULL;
		$this->parentid->OldValue = $this->parentid->CurrentValue;
		$this->salutation->CurrentValue = NULL;
		$this->salutation->OldValue = $this->salutation->CurrentValue;
		$this->firstname->CurrentValue = NULL;
		$this->firstname->OldValue = $this->firstname->CurrentValue;
		$this->lastname->CurrentValue = NULL;
		$this->lastname->OldValue = $this->lastname->CurrentValue;
		$this->_email->CurrentValue = NULL;
		$this->_email->OldValue = $this->_email->CurrentValue;
		$this->phone->CurrentValue = NULL;
		$this->phone->OldValue = $this->phone->CurrentValue;
		$this->mobile->CurrentValue = NULL;
		$this->mobile->OldValue = $this->mobile->CurrentValue;
		$this->reportsto->CurrentValue = NULL;
		$this->reportsto->OldValue = $this->reportsto->CurrentValue;
		$this->training->CurrentValue = NULL;
		$this->training->OldValue = $this->training->CurrentValue;
		$this->usertype->CurrentValue = NULL;
		$this->usertype->OldValue = $this->usertype->CurrentValue;
		$this->contacttype->CurrentValue = NULL;
		$this->contacttype->OldValue = $this->contacttype->CurrentValue;
		$this->otheremail->CurrentValue = NULL;
		$this->otheremail->OldValue = $this->otheremail->CurrentValue;
		$this->donotcall->CurrentValue = NULL;
		$this->donotcall->OldValue = $this->donotcall->CurrentValue;
		$this->emailoptout->CurrentValue = 0;
		$this->imagename->CurrentValue = NULL;
		$this->imagename->OldValue = $this->imagename->CurrentValue;
		$this->isconvertedfromlead->CurrentValue = 0;
		$this->verification->CurrentValue = NULL;
		$this->verification->OldValue = $this->verification->CurrentValue;
		$this->secondary_email->CurrentValue = NULL;
		$this->secondary_email->OldValue = $this->secondary_email->CurrentValue;
		$this->notifilanguage->CurrentValue = NULL;
		$this->notifilanguage->OldValue = $this->notifilanguage->CurrentValue;
		$this->contactstatus->CurrentValue = NULL;
		$this->contactstatus->OldValue = $this->contactstatus->CurrentValue;
		$this->dav_status->CurrentValue = 1;
		$this->jobtitle->CurrentValue = NULL;
		$this->jobtitle->OldValue = $this->jobtitle->CurrentValue;
		$this->decision_maker->CurrentValue = 0;
		$this->sum_time->CurrentValue = 0.00;
		$this->phone_extra->CurrentValue = NULL;
		$this->phone_extra->OldValue = $this->phone_extra->CurrentValue;
		$this->mobile_extra->CurrentValue = NULL;
		$this->mobile_extra->OldValue = $this->mobile_extra->CurrentValue;
		$this->approvals->CurrentValue = NULL;
		$this->approvals->OldValue = $this->approvals->CurrentValue;
		$this->gender->CurrentValue = NULL;
		$this->gender->OldValue = $this->gender->CurrentValue;
	}

	// Load form values
	protected function loadFormValues()
	{

		// Load from form
		global $CurrentForm;

		// Check field name 'contactid' first before field var 'x_contactid'
		$val = $CurrentForm->hasValue("contactid") ? $CurrentForm->getValue("contactid") : $CurrentForm->getValue("x_contactid");
		if (!$this->contactid->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->contactid->Visible = FALSE; // Disable update for API request
			else
				$this->contactid->setFormValue($val);
		}

		// Check field name 'contact_no' first before field var 'x_contact_no'
		$val = $CurrentForm->hasValue("contact_no") ? $CurrentForm->getValue("contact_no") : $CurrentForm->getValue("x_contact_no");
		if (!$this->contact_no->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->contact_no->Visible = FALSE; // Disable update for API request
			else
				$this->contact_no->setFormValue($val);
		}

		// Check field name 'parentid' first before field var 'x_parentid'
		$val = $CurrentForm->hasValue("parentid") ? $CurrentForm->getValue("parentid") : $CurrentForm->getValue("x_parentid");
		if (!$this->parentid->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->parentid->Visible = FALSE; // Disable update for API request
			else
				$this->parentid->setFormValue($val);
		}

		// Check field name 'salutation' first before field var 'x_salutation'
		$val = $CurrentForm->hasValue("salutation") ? $CurrentForm->getValue("salutation") : $CurrentForm->getValue("x_salutation");
		if (!$this->salutation->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->salutation->Visible = FALSE; // Disable update for API request
			else
				$this->salutation->setFormValue($val);
		}

		// Check field name 'firstname' first before field var 'x_firstname'
		$val = $CurrentForm->hasValue("firstname") ? $CurrentForm->getValue("firstname") : $CurrentForm->getValue("x_firstname");
		if (!$this->firstname->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->firstname->Visible = FALSE; // Disable update for API request
			else
				$this->firstname->setFormValue($val);
		}

		// Check field name 'lastname' first before field var 'x_lastname'
		$val = $CurrentForm->hasValue("lastname") ? $CurrentForm->getValue("lastname") : $CurrentForm->getValue("x_lastname");
		if (!$this->lastname->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->lastname->Visible = FALSE; // Disable update for API request
			else
				$this->lastname->setFormValue($val);
		}

		// Check field name 'email' first before field var 'x__email'
		$val = $CurrentForm->hasValue("email") ? $CurrentForm->getValue("email") : $CurrentForm->getValue("x__email");
		if (!$this->_email->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->_email->Visible = FALSE; // Disable update for API request
			else
				$this->_email->setFormValue($val);
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

		// Check field name 'reportsto' first before field var 'x_reportsto'
		$val = $CurrentForm->hasValue("reportsto") ? $CurrentForm->getValue("reportsto") : $CurrentForm->getValue("x_reportsto");
		if (!$this->reportsto->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->reportsto->Visible = FALSE; // Disable update for API request
			else
				$this->reportsto->setFormValue($val);
		}

		// Check field name 'training' first before field var 'x_training'
		$val = $CurrentForm->hasValue("training") ? $CurrentForm->getValue("training") : $CurrentForm->getValue("x_training");
		if (!$this->training->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->training->Visible = FALSE; // Disable update for API request
			else
				$this->training->setFormValue($val);
		}

		// Check field name 'usertype' first before field var 'x_usertype'
		$val = $CurrentForm->hasValue("usertype") ? $CurrentForm->getValue("usertype") : $CurrentForm->getValue("x_usertype");
		if (!$this->usertype->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->usertype->Visible = FALSE; // Disable update for API request
			else
				$this->usertype->setFormValue($val);
		}

		// Check field name 'contacttype' first before field var 'x_contacttype'
		$val = $CurrentForm->hasValue("contacttype") ? $CurrentForm->getValue("contacttype") : $CurrentForm->getValue("x_contacttype");
		if (!$this->contacttype->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->contacttype->Visible = FALSE; // Disable update for API request
			else
				$this->contacttype->setFormValue($val);
		}

		// Check field name 'otheremail' first before field var 'x_otheremail'
		$val = $CurrentForm->hasValue("otheremail") ? $CurrentForm->getValue("otheremail") : $CurrentForm->getValue("x_otheremail");
		if (!$this->otheremail->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->otheremail->Visible = FALSE; // Disable update for API request
			else
				$this->otheremail->setFormValue($val);
		}

		// Check field name 'donotcall' first before field var 'x_donotcall'
		$val = $CurrentForm->hasValue("donotcall") ? $CurrentForm->getValue("donotcall") : $CurrentForm->getValue("x_donotcall");
		if (!$this->donotcall->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->donotcall->Visible = FALSE; // Disable update for API request
			else
				$this->donotcall->setFormValue($val);
		}

		// Check field name 'emailoptout' first before field var 'x_emailoptout'
		$val = $CurrentForm->hasValue("emailoptout") ? $CurrentForm->getValue("emailoptout") : $CurrentForm->getValue("x_emailoptout");
		if (!$this->emailoptout->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->emailoptout->Visible = FALSE; // Disable update for API request
			else
				$this->emailoptout->setFormValue($val);
		}

		// Check field name 'imagename' first before field var 'x_imagename'
		$val = $CurrentForm->hasValue("imagename") ? $CurrentForm->getValue("imagename") : $CurrentForm->getValue("x_imagename");
		if (!$this->imagename->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->imagename->Visible = FALSE; // Disable update for API request
			else
				$this->imagename->setFormValue($val);
		}

		// Check field name 'isconvertedfromlead' first before field var 'x_isconvertedfromlead'
		$val = $CurrentForm->hasValue("isconvertedfromlead") ? $CurrentForm->getValue("isconvertedfromlead") : $CurrentForm->getValue("x_isconvertedfromlead");
		if (!$this->isconvertedfromlead->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->isconvertedfromlead->Visible = FALSE; // Disable update for API request
			else
				$this->isconvertedfromlead->setFormValue($val);
		}

		// Check field name 'verification' first before field var 'x_verification'
		$val = $CurrentForm->hasValue("verification") ? $CurrentForm->getValue("verification") : $CurrentForm->getValue("x_verification");
		if (!$this->verification->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->verification->Visible = FALSE; // Disable update for API request
			else
				$this->verification->setFormValue($val);
		}

		// Check field name 'secondary_email' first before field var 'x_secondary_email'
		$val = $CurrentForm->hasValue("secondary_email") ? $CurrentForm->getValue("secondary_email") : $CurrentForm->getValue("x_secondary_email");
		if (!$this->secondary_email->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->secondary_email->Visible = FALSE; // Disable update for API request
			else
				$this->secondary_email->setFormValue($val);
		}

		// Check field name 'notifilanguage' first before field var 'x_notifilanguage'
		$val = $CurrentForm->hasValue("notifilanguage") ? $CurrentForm->getValue("notifilanguage") : $CurrentForm->getValue("x_notifilanguage");
		if (!$this->notifilanguage->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->notifilanguage->Visible = FALSE; // Disable update for API request
			else
				$this->notifilanguage->setFormValue($val);
		}

		// Check field name 'contactstatus' first before field var 'x_contactstatus'
		$val = $CurrentForm->hasValue("contactstatus") ? $CurrentForm->getValue("contactstatus") : $CurrentForm->getValue("x_contactstatus");
		if (!$this->contactstatus->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->contactstatus->Visible = FALSE; // Disable update for API request
			else
				$this->contactstatus->setFormValue($val);
		}

		// Check field name 'dav_status' first before field var 'x_dav_status'
		$val = $CurrentForm->hasValue("dav_status") ? $CurrentForm->getValue("dav_status") : $CurrentForm->getValue("x_dav_status");
		if (!$this->dav_status->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->dav_status->Visible = FALSE; // Disable update for API request
			else
				$this->dav_status->setFormValue($val);
		}

		// Check field name 'jobtitle' first before field var 'x_jobtitle'
		$val = $CurrentForm->hasValue("jobtitle") ? $CurrentForm->getValue("jobtitle") : $CurrentForm->getValue("x_jobtitle");
		if (!$this->jobtitle->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->jobtitle->Visible = FALSE; // Disable update for API request
			else
				$this->jobtitle->setFormValue($val);
		}

		// Check field name 'decision_maker' first before field var 'x_decision_maker'
		$val = $CurrentForm->hasValue("decision_maker") ? $CurrentForm->getValue("decision_maker") : $CurrentForm->getValue("x_decision_maker");
		if (!$this->decision_maker->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->decision_maker->Visible = FALSE; // Disable update for API request
			else
				$this->decision_maker->setFormValue($val);
		}

		// Check field name 'sum_time' first before field var 'x_sum_time'
		$val = $CurrentForm->hasValue("sum_time") ? $CurrentForm->getValue("sum_time") : $CurrentForm->getValue("x_sum_time");
		if (!$this->sum_time->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->sum_time->Visible = FALSE; // Disable update for API request
			else
				$this->sum_time->setFormValue($val);
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

		// Check field name 'approvals' first before field var 'x_approvals'
		$val = $CurrentForm->hasValue("approvals") ? $CurrentForm->getValue("approvals") : $CurrentForm->getValue("x_approvals");
		if (!$this->approvals->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->approvals->Visible = FALSE; // Disable update for API request
			else
				$this->approvals->setFormValue($val);
		}

		// Check field name 'gender' first before field var 'x_gender'
		$val = $CurrentForm->hasValue("gender") ? $CurrentForm->getValue("gender") : $CurrentForm->getValue("x_gender");
		if (!$this->gender->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->gender->Visible = FALSE; // Disable update for API request
			else
				$this->gender->setFormValue($val);
		}
	}

	// Restore form values
	public function restoreFormValues()
	{
		global $CurrentForm;
		$this->contactid->CurrentValue = $this->contactid->FormValue;
		$this->contact_no->CurrentValue = $this->contact_no->FormValue;
		$this->parentid->CurrentValue = $this->parentid->FormValue;
		$this->salutation->CurrentValue = $this->salutation->FormValue;
		$this->firstname->CurrentValue = $this->firstname->FormValue;
		$this->lastname->CurrentValue = $this->lastname->FormValue;
		$this->_email->CurrentValue = $this->_email->FormValue;
		$this->phone->CurrentValue = $this->phone->FormValue;
		$this->mobile->CurrentValue = $this->mobile->FormValue;
		$this->reportsto->CurrentValue = $this->reportsto->FormValue;
		$this->training->CurrentValue = $this->training->FormValue;
		$this->usertype->CurrentValue = $this->usertype->FormValue;
		$this->contacttype->CurrentValue = $this->contacttype->FormValue;
		$this->otheremail->CurrentValue = $this->otheremail->FormValue;
		$this->donotcall->CurrentValue = $this->donotcall->FormValue;
		$this->emailoptout->CurrentValue = $this->emailoptout->FormValue;
		$this->imagename->CurrentValue = $this->imagename->FormValue;
		$this->isconvertedfromlead->CurrentValue = $this->isconvertedfromlead->FormValue;
		$this->verification->CurrentValue = $this->verification->FormValue;
		$this->secondary_email->CurrentValue = $this->secondary_email->FormValue;
		$this->notifilanguage->CurrentValue = $this->notifilanguage->FormValue;
		$this->contactstatus->CurrentValue = $this->contactstatus->FormValue;
		$this->dav_status->CurrentValue = $this->dav_status->FormValue;
		$this->jobtitle->CurrentValue = $this->jobtitle->FormValue;
		$this->decision_maker->CurrentValue = $this->decision_maker->FormValue;
		$this->sum_time->CurrentValue = $this->sum_time->FormValue;
		$this->phone_extra->CurrentValue = $this->phone_extra->FormValue;
		$this->mobile_extra->CurrentValue = $this->mobile_extra->FormValue;
		$this->approvals->CurrentValue = $this->approvals->FormValue;
		$this->gender->CurrentValue = $this->gender->FormValue;
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
		$this->contactid->setDbValue($row['contactid']);
		$this->contact_no->setDbValue($row['contact_no']);
		$this->parentid->setDbValue($row['parentid']);
		$this->salutation->setDbValue($row['salutation']);
		$this->firstname->setDbValue($row['firstname']);
		$this->lastname->setDbValue($row['lastname']);
		$this->_email->setDbValue($row['email']);
		$this->phone->setDbValue($row['phone']);
		$this->mobile->setDbValue($row['mobile']);
		$this->reportsto->setDbValue($row['reportsto']);
		$this->training->setDbValue($row['training']);
		$this->usertype->setDbValue($row['usertype']);
		$this->contacttype->setDbValue($row['contacttype']);
		$this->otheremail->setDbValue($row['otheremail']);
		$this->donotcall->setDbValue($row['donotcall']);
		$this->emailoptout->setDbValue($row['emailoptout']);
		$this->imagename->setDbValue($row['imagename']);
		$this->isconvertedfromlead->setDbValue($row['isconvertedfromlead']);
		$this->verification->setDbValue($row['verification']);
		$this->secondary_email->setDbValue($row['secondary_email']);
		$this->notifilanguage->setDbValue($row['notifilanguage']);
		$this->contactstatus->setDbValue($row['contactstatus']);
		$this->dav_status->setDbValue($row['dav_status']);
		$this->jobtitle->setDbValue($row['jobtitle']);
		$this->decision_maker->setDbValue($row['decision_maker']);
		$this->sum_time->setDbValue($row['sum_time']);
		$this->phone_extra->setDbValue($row['phone_extra']);
		$this->mobile_extra->setDbValue($row['mobile_extra']);
		$this->approvals->setDbValue($row['approvals']);
		$this->gender->setDbValue($row['gender']);
	}

	// Return a row with default values
	protected function newRow()
	{
		$this->loadDefaultValues();
		$row = [];
		$row['contactid'] = $this->contactid->CurrentValue;
		$row['contact_no'] = $this->contact_no->CurrentValue;
		$row['parentid'] = $this->parentid->CurrentValue;
		$row['salutation'] = $this->salutation->CurrentValue;
		$row['firstname'] = $this->firstname->CurrentValue;
		$row['lastname'] = $this->lastname->CurrentValue;
		$row['email'] = $this->_email->CurrentValue;
		$row['phone'] = $this->phone->CurrentValue;
		$row['mobile'] = $this->mobile->CurrentValue;
		$row['reportsto'] = $this->reportsto->CurrentValue;
		$row['training'] = $this->training->CurrentValue;
		$row['usertype'] = $this->usertype->CurrentValue;
		$row['contacttype'] = $this->contacttype->CurrentValue;
		$row['otheremail'] = $this->otheremail->CurrentValue;
		$row['donotcall'] = $this->donotcall->CurrentValue;
		$row['emailoptout'] = $this->emailoptout->CurrentValue;
		$row['imagename'] = $this->imagename->CurrentValue;
		$row['isconvertedfromlead'] = $this->isconvertedfromlead->CurrentValue;
		$row['verification'] = $this->verification->CurrentValue;
		$row['secondary_email'] = $this->secondary_email->CurrentValue;
		$row['notifilanguage'] = $this->notifilanguage->CurrentValue;
		$row['contactstatus'] = $this->contactstatus->CurrentValue;
		$row['dav_status'] = $this->dav_status->CurrentValue;
		$row['jobtitle'] = $this->jobtitle->CurrentValue;
		$row['decision_maker'] = $this->decision_maker->CurrentValue;
		$row['sum_time'] = $this->sum_time->CurrentValue;
		$row['phone_extra'] = $this->phone_extra->CurrentValue;
		$row['mobile_extra'] = $this->mobile_extra->CurrentValue;
		$row['approvals'] = $this->approvals->CurrentValue;
		$row['gender'] = $this->gender->CurrentValue;
		return $row;
	}

	// Load old record
	protected function loadOldRecord()
	{

		// Load key values from Session
		$validKey = TRUE;
		if (strval($this->getKey("contactid")) <> "")
			$this->contactid->CurrentValue = $this->getKey("contactid"); // contactid
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

		if ($this->sum_time->FormValue == $this->sum_time->CurrentValue && is_numeric(ConvertToFloatString($this->sum_time->CurrentValue)))
			$this->sum_time->CurrentValue = ConvertToFloatString($this->sum_time->CurrentValue);

		// Call Row_Rendering event
		$this->Row_Rendering();

		// Common render codes for all row types
		// contactid
		// contact_no
		// parentid
		// salutation
		// firstname
		// lastname
		// email
		// phone
		// mobile
		// reportsto
		// training
		// usertype
		// contacttype
		// otheremail
		// donotcall
		// emailoptout
		// imagename
		// isconvertedfromlead
		// verification
		// secondary_email
		// notifilanguage
		// contactstatus
		// dav_status
		// jobtitle
		// decision_maker
		// sum_time
		// phone_extra
		// mobile_extra
		// approvals
		// gender

		if ($this->RowType == ROWTYPE_VIEW) { // View row

			// contactid
			$this->contactid->ViewValue = $this->contactid->CurrentValue;
			$this->contactid->ViewValue = FormatNumber($this->contactid->ViewValue, 0, -2, -2, -2);
			$this->contactid->ViewCustomAttributes = "";

			// contact_no
			$this->contact_no->ViewValue = $this->contact_no->CurrentValue;
			$this->contact_no->ViewCustomAttributes = "";

			// parentid
			$this->parentid->ViewValue = $this->parentid->CurrentValue;
			$this->parentid->ViewValue = FormatNumber($this->parentid->ViewValue, 0, -2, -2, -2);
			$this->parentid->ViewCustomAttributes = "";

			// salutation
			$this->salutation->ViewValue = $this->salutation->CurrentValue;
			$this->salutation->ViewCustomAttributes = "";

			// firstname
			$this->firstname->ViewValue = $this->firstname->CurrentValue;
			$this->firstname->ViewCustomAttributes = "";

			// lastname
			$this->lastname->ViewValue = $this->lastname->CurrentValue;
			$this->lastname->ViewCustomAttributes = "";

			// email
			$this->_email->ViewValue = $this->_email->CurrentValue;
			$this->_email->ViewCustomAttributes = "";

			// phone
			$this->phone->ViewValue = $this->phone->CurrentValue;
			$this->phone->ViewCustomAttributes = "";

			// mobile
			$this->mobile->ViewValue = $this->mobile->CurrentValue;
			$this->mobile->ViewCustomAttributes = "";

			// reportsto
			$this->reportsto->ViewValue = $this->reportsto->CurrentValue;
			$this->reportsto->ViewValue = FormatNumber($this->reportsto->ViewValue, 0, -2, -2, -2);
			$this->reportsto->ViewCustomAttributes = "";

			// training
			$this->training->ViewValue = $this->training->CurrentValue;
			$this->training->ViewCustomAttributes = "";

			// usertype
			$this->usertype->ViewValue = $this->usertype->CurrentValue;
			$this->usertype->ViewCustomAttributes = "";

			// contacttype
			$this->contacttype->ViewValue = $this->contacttype->CurrentValue;
			$this->contacttype->ViewCustomAttributes = "";

			// otheremail
			$this->otheremail->ViewValue = $this->otheremail->CurrentValue;
			$this->otheremail->ViewCustomAttributes = "";

			// donotcall
			$this->donotcall->ViewValue = $this->donotcall->CurrentValue;
			$this->donotcall->ViewValue = FormatNumber($this->donotcall->ViewValue, 0, -2, -2, -2);
			$this->donotcall->ViewCustomAttributes = "";

			// emailoptout
			$this->emailoptout->ViewValue = $this->emailoptout->CurrentValue;
			$this->emailoptout->ViewValue = FormatNumber($this->emailoptout->ViewValue, 0, -2, -2, -2);
			$this->emailoptout->ViewCustomAttributes = "";

			// imagename
			$this->imagename->ViewValue = $this->imagename->CurrentValue;
			$this->imagename->ViewCustomAttributes = "";

			// isconvertedfromlead
			$this->isconvertedfromlead->ViewValue = $this->isconvertedfromlead->CurrentValue;
			$this->isconvertedfromlead->ViewValue = FormatNumber($this->isconvertedfromlead->ViewValue, 0, -2, -2, -2);
			$this->isconvertedfromlead->ViewCustomAttributes = "";

			// verification
			$this->verification->ViewValue = $this->verification->CurrentValue;
			$this->verification->ViewCustomAttributes = "";

			// secondary_email
			$this->secondary_email->ViewValue = $this->secondary_email->CurrentValue;
			$this->secondary_email->ViewCustomAttributes = "";

			// notifilanguage
			$this->notifilanguage->ViewValue = $this->notifilanguage->CurrentValue;
			$this->notifilanguage->ViewCustomAttributes = "";

			// contactstatus
			$this->contactstatus->ViewValue = $this->contactstatus->CurrentValue;
			$this->contactstatus->ViewCustomAttributes = "";

			// dav_status
			$this->dav_status->ViewValue = $this->dav_status->CurrentValue;
			$this->dav_status->ViewValue = FormatNumber($this->dav_status->ViewValue, 0, -2, -2, -2);
			$this->dav_status->ViewCustomAttributes = "";

			// jobtitle
			$this->jobtitle->ViewValue = $this->jobtitle->CurrentValue;
			$this->jobtitle->ViewCustomAttributes = "";

			// decision_maker
			$this->decision_maker->ViewValue = $this->decision_maker->CurrentValue;
			$this->decision_maker->ViewValue = FormatNumber($this->decision_maker->ViewValue, 0, -2, -2, -2);
			$this->decision_maker->ViewCustomAttributes = "";

			// sum_time
			$this->sum_time->ViewValue = $this->sum_time->CurrentValue;
			$this->sum_time->ViewValue = FormatNumber($this->sum_time->ViewValue, 2, -2, -2, -2);
			$this->sum_time->ViewCustomAttributes = "";

			// phone_extra
			$this->phone_extra->ViewValue = $this->phone_extra->CurrentValue;
			$this->phone_extra->ViewCustomAttributes = "";

			// mobile_extra
			$this->mobile_extra->ViewValue = $this->mobile_extra->CurrentValue;
			$this->mobile_extra->ViewCustomAttributes = "";

			// approvals
			$this->approvals->ViewValue = $this->approvals->CurrentValue;
			$this->approvals->ViewCustomAttributes = "";

			// gender
			$this->gender->ViewValue = $this->gender->CurrentValue;
			$this->gender->ViewCustomAttributes = "";

			// contactid
			$this->contactid->LinkCustomAttributes = "";
			$this->contactid->HrefValue = "";
			$this->contactid->TooltipValue = "";

			// contact_no
			$this->contact_no->LinkCustomAttributes = "";
			$this->contact_no->HrefValue = "";
			$this->contact_no->TooltipValue = "";

			// parentid
			$this->parentid->LinkCustomAttributes = "";
			$this->parentid->HrefValue = "";
			$this->parentid->TooltipValue = "";

			// salutation
			$this->salutation->LinkCustomAttributes = "";
			$this->salutation->HrefValue = "";
			$this->salutation->TooltipValue = "";

			// firstname
			$this->firstname->LinkCustomAttributes = "";
			$this->firstname->HrefValue = "";
			$this->firstname->TooltipValue = "";

			// lastname
			$this->lastname->LinkCustomAttributes = "";
			$this->lastname->HrefValue = "";
			$this->lastname->TooltipValue = "";

			// email
			$this->_email->LinkCustomAttributes = "";
			$this->_email->HrefValue = "";
			$this->_email->TooltipValue = "";

			// phone
			$this->phone->LinkCustomAttributes = "";
			$this->phone->HrefValue = "";
			$this->phone->TooltipValue = "";

			// mobile
			$this->mobile->LinkCustomAttributes = "";
			$this->mobile->HrefValue = "";
			$this->mobile->TooltipValue = "";

			// reportsto
			$this->reportsto->LinkCustomAttributes = "";
			$this->reportsto->HrefValue = "";
			$this->reportsto->TooltipValue = "";

			// training
			$this->training->LinkCustomAttributes = "";
			$this->training->HrefValue = "";
			$this->training->TooltipValue = "";

			// usertype
			$this->usertype->LinkCustomAttributes = "";
			$this->usertype->HrefValue = "";
			$this->usertype->TooltipValue = "";

			// contacttype
			$this->contacttype->LinkCustomAttributes = "";
			$this->contacttype->HrefValue = "";
			$this->contacttype->TooltipValue = "";

			// otheremail
			$this->otheremail->LinkCustomAttributes = "";
			$this->otheremail->HrefValue = "";
			$this->otheremail->TooltipValue = "";

			// donotcall
			$this->donotcall->LinkCustomAttributes = "";
			$this->donotcall->HrefValue = "";
			$this->donotcall->TooltipValue = "";

			// emailoptout
			$this->emailoptout->LinkCustomAttributes = "";
			$this->emailoptout->HrefValue = "";
			$this->emailoptout->TooltipValue = "";

			// imagename
			$this->imagename->LinkCustomAttributes = "";
			$this->imagename->HrefValue = "";
			$this->imagename->TooltipValue = "";

			// isconvertedfromlead
			$this->isconvertedfromlead->LinkCustomAttributes = "";
			$this->isconvertedfromlead->HrefValue = "";
			$this->isconvertedfromlead->TooltipValue = "";

			// verification
			$this->verification->LinkCustomAttributes = "";
			$this->verification->HrefValue = "";
			$this->verification->TooltipValue = "";

			// secondary_email
			$this->secondary_email->LinkCustomAttributes = "";
			$this->secondary_email->HrefValue = "";
			$this->secondary_email->TooltipValue = "";

			// notifilanguage
			$this->notifilanguage->LinkCustomAttributes = "";
			$this->notifilanguage->HrefValue = "";
			$this->notifilanguage->TooltipValue = "";

			// contactstatus
			$this->contactstatus->LinkCustomAttributes = "";
			$this->contactstatus->HrefValue = "";
			$this->contactstatus->TooltipValue = "";

			// dav_status
			$this->dav_status->LinkCustomAttributes = "";
			$this->dav_status->HrefValue = "";
			$this->dav_status->TooltipValue = "";

			// jobtitle
			$this->jobtitle->LinkCustomAttributes = "";
			$this->jobtitle->HrefValue = "";
			$this->jobtitle->TooltipValue = "";

			// decision_maker
			$this->decision_maker->LinkCustomAttributes = "";
			$this->decision_maker->HrefValue = "";
			$this->decision_maker->TooltipValue = "";

			// sum_time
			$this->sum_time->LinkCustomAttributes = "";
			$this->sum_time->HrefValue = "";
			$this->sum_time->TooltipValue = "";

			// phone_extra
			$this->phone_extra->LinkCustomAttributes = "";
			$this->phone_extra->HrefValue = "";
			$this->phone_extra->TooltipValue = "";

			// mobile_extra
			$this->mobile_extra->LinkCustomAttributes = "";
			$this->mobile_extra->HrefValue = "";
			$this->mobile_extra->TooltipValue = "";

			// approvals
			$this->approvals->LinkCustomAttributes = "";
			$this->approvals->HrefValue = "";
			$this->approvals->TooltipValue = "";

			// gender
			$this->gender->LinkCustomAttributes = "";
			$this->gender->HrefValue = "";
			$this->gender->TooltipValue = "";
		} elseif ($this->RowType == ROWTYPE_ADD) { // Add row

			// contactid
			$this->contactid->EditAttrs["class"] = "form-control";
			$this->contactid->EditCustomAttributes = "";
			$this->contactid->EditValue = HtmlEncode($this->contactid->CurrentValue);
			$this->contactid->PlaceHolder = RemoveHtml($this->contactid->caption());

			// contact_no
			$this->contact_no->EditAttrs["class"] = "form-control";
			$this->contact_no->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->contact_no->CurrentValue = HtmlDecode($this->contact_no->CurrentValue);
			$this->contact_no->EditValue = HtmlEncode($this->contact_no->CurrentValue);
			$this->contact_no->PlaceHolder = RemoveHtml($this->contact_no->caption());

			// parentid
			$this->parentid->EditAttrs["class"] = "form-control";
			$this->parentid->EditCustomAttributes = "";
			$this->parentid->EditValue = HtmlEncode($this->parentid->CurrentValue);
			$this->parentid->PlaceHolder = RemoveHtml($this->parentid->caption());

			// salutation
			$this->salutation->EditAttrs["class"] = "form-control";
			$this->salutation->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->salutation->CurrentValue = HtmlDecode($this->salutation->CurrentValue);
			$this->salutation->EditValue = HtmlEncode($this->salutation->CurrentValue);
			$this->salutation->PlaceHolder = RemoveHtml($this->salutation->caption());

			// firstname
			$this->firstname->EditAttrs["class"] = "form-control";
			$this->firstname->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->firstname->CurrentValue = HtmlDecode($this->firstname->CurrentValue);
			$this->firstname->EditValue = HtmlEncode($this->firstname->CurrentValue);
			$this->firstname->PlaceHolder = RemoveHtml($this->firstname->caption());

			// lastname
			$this->lastname->EditAttrs["class"] = "form-control";
			$this->lastname->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->lastname->CurrentValue = HtmlDecode($this->lastname->CurrentValue);
			$this->lastname->EditValue = HtmlEncode($this->lastname->CurrentValue);
			$this->lastname->PlaceHolder = RemoveHtml($this->lastname->caption());

			// email
			$this->_email->EditAttrs["class"] = "form-control";
			$this->_email->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->_email->CurrentValue = HtmlDecode($this->_email->CurrentValue);
			$this->_email->EditValue = HtmlEncode($this->_email->CurrentValue);
			$this->_email->PlaceHolder = RemoveHtml($this->_email->caption());

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

			// reportsto
			$this->reportsto->EditAttrs["class"] = "form-control";
			$this->reportsto->EditCustomAttributes = "";
			$this->reportsto->EditValue = HtmlEncode($this->reportsto->CurrentValue);
			$this->reportsto->PlaceHolder = RemoveHtml($this->reportsto->caption());

			// training
			$this->training->EditAttrs["class"] = "form-control";
			$this->training->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->training->CurrentValue = HtmlDecode($this->training->CurrentValue);
			$this->training->EditValue = HtmlEncode($this->training->CurrentValue);
			$this->training->PlaceHolder = RemoveHtml($this->training->caption());

			// usertype
			$this->usertype->EditAttrs["class"] = "form-control";
			$this->usertype->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->usertype->CurrentValue = HtmlDecode($this->usertype->CurrentValue);
			$this->usertype->EditValue = HtmlEncode($this->usertype->CurrentValue);
			$this->usertype->PlaceHolder = RemoveHtml($this->usertype->caption());

			// contacttype
			$this->contacttype->EditAttrs["class"] = "form-control";
			$this->contacttype->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->contacttype->CurrentValue = HtmlDecode($this->contacttype->CurrentValue);
			$this->contacttype->EditValue = HtmlEncode($this->contacttype->CurrentValue);
			$this->contacttype->PlaceHolder = RemoveHtml($this->contacttype->caption());

			// otheremail
			$this->otheremail->EditAttrs["class"] = "form-control";
			$this->otheremail->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->otheremail->CurrentValue = HtmlDecode($this->otheremail->CurrentValue);
			$this->otheremail->EditValue = HtmlEncode($this->otheremail->CurrentValue);
			$this->otheremail->PlaceHolder = RemoveHtml($this->otheremail->caption());

			// donotcall
			$this->donotcall->EditAttrs["class"] = "form-control";
			$this->donotcall->EditCustomAttributes = "";
			$this->donotcall->EditValue = HtmlEncode($this->donotcall->CurrentValue);
			$this->donotcall->PlaceHolder = RemoveHtml($this->donotcall->caption());

			// emailoptout
			$this->emailoptout->EditAttrs["class"] = "form-control";
			$this->emailoptout->EditCustomAttributes = "";
			$this->emailoptout->EditValue = HtmlEncode($this->emailoptout->CurrentValue);
			$this->emailoptout->PlaceHolder = RemoveHtml($this->emailoptout->caption());

			// imagename
			$this->imagename->EditAttrs["class"] = "form-control";
			$this->imagename->EditCustomAttributes = "";
			$this->imagename->EditValue = HtmlEncode($this->imagename->CurrentValue);
			$this->imagename->PlaceHolder = RemoveHtml($this->imagename->caption());

			// isconvertedfromlead
			$this->isconvertedfromlead->EditAttrs["class"] = "form-control";
			$this->isconvertedfromlead->EditCustomAttributes = "";
			$this->isconvertedfromlead->EditValue = HtmlEncode($this->isconvertedfromlead->CurrentValue);
			$this->isconvertedfromlead->PlaceHolder = RemoveHtml($this->isconvertedfromlead->caption());

			// verification
			$this->verification->EditAttrs["class"] = "form-control";
			$this->verification->EditCustomAttributes = "";
			$this->verification->EditValue = HtmlEncode($this->verification->CurrentValue);
			$this->verification->PlaceHolder = RemoveHtml($this->verification->caption());

			// secondary_email
			$this->secondary_email->EditAttrs["class"] = "form-control";
			$this->secondary_email->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->secondary_email->CurrentValue = HtmlDecode($this->secondary_email->CurrentValue);
			$this->secondary_email->EditValue = HtmlEncode($this->secondary_email->CurrentValue);
			$this->secondary_email->PlaceHolder = RemoveHtml($this->secondary_email->caption());

			// notifilanguage
			$this->notifilanguage->EditAttrs["class"] = "form-control";
			$this->notifilanguage->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->notifilanguage->CurrentValue = HtmlDecode($this->notifilanguage->CurrentValue);
			$this->notifilanguage->EditValue = HtmlEncode($this->notifilanguage->CurrentValue);
			$this->notifilanguage->PlaceHolder = RemoveHtml($this->notifilanguage->caption());

			// contactstatus
			$this->contactstatus->EditAttrs["class"] = "form-control";
			$this->contactstatus->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->contactstatus->CurrentValue = HtmlDecode($this->contactstatus->CurrentValue);
			$this->contactstatus->EditValue = HtmlEncode($this->contactstatus->CurrentValue);
			$this->contactstatus->PlaceHolder = RemoveHtml($this->contactstatus->caption());

			// dav_status
			$this->dav_status->EditAttrs["class"] = "form-control";
			$this->dav_status->EditCustomAttributes = "";
			$this->dav_status->EditValue = HtmlEncode($this->dav_status->CurrentValue);
			$this->dav_status->PlaceHolder = RemoveHtml($this->dav_status->caption());

			// jobtitle
			$this->jobtitle->EditAttrs["class"] = "form-control";
			$this->jobtitle->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->jobtitle->CurrentValue = HtmlDecode($this->jobtitle->CurrentValue);
			$this->jobtitle->EditValue = HtmlEncode($this->jobtitle->CurrentValue);
			$this->jobtitle->PlaceHolder = RemoveHtml($this->jobtitle->caption());

			// decision_maker
			$this->decision_maker->EditAttrs["class"] = "form-control";
			$this->decision_maker->EditCustomAttributes = "";
			$this->decision_maker->EditValue = HtmlEncode($this->decision_maker->CurrentValue);
			$this->decision_maker->PlaceHolder = RemoveHtml($this->decision_maker->caption());

			// sum_time
			$this->sum_time->EditAttrs["class"] = "form-control";
			$this->sum_time->EditCustomAttributes = "";
			$this->sum_time->EditValue = HtmlEncode($this->sum_time->CurrentValue);
			$this->sum_time->PlaceHolder = RemoveHtml($this->sum_time->caption());
			if (strval($this->sum_time->EditValue) <> "" && is_numeric($this->sum_time->EditValue))
				$this->sum_time->EditValue = FormatNumber($this->sum_time->EditValue, -2, -2, -2, -2);

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

			// approvals
			$this->approvals->EditAttrs["class"] = "form-control";
			$this->approvals->EditCustomAttributes = "";
			$this->approvals->EditValue = HtmlEncode($this->approvals->CurrentValue);
			$this->approvals->PlaceHolder = RemoveHtml($this->approvals->caption());

			// gender
			$this->gender->EditAttrs["class"] = "form-control";
			$this->gender->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->gender->CurrentValue = HtmlDecode($this->gender->CurrentValue);
			$this->gender->EditValue = HtmlEncode($this->gender->CurrentValue);
			$this->gender->PlaceHolder = RemoveHtml($this->gender->caption());

			// Add refer script
			// contactid

			$this->contactid->LinkCustomAttributes = "";
			$this->contactid->HrefValue = "";

			// contact_no
			$this->contact_no->LinkCustomAttributes = "";
			$this->contact_no->HrefValue = "";

			// parentid
			$this->parentid->LinkCustomAttributes = "";
			$this->parentid->HrefValue = "";

			// salutation
			$this->salutation->LinkCustomAttributes = "";
			$this->salutation->HrefValue = "";

			// firstname
			$this->firstname->LinkCustomAttributes = "";
			$this->firstname->HrefValue = "";

			// lastname
			$this->lastname->LinkCustomAttributes = "";
			$this->lastname->HrefValue = "";

			// email
			$this->_email->LinkCustomAttributes = "";
			$this->_email->HrefValue = "";

			// phone
			$this->phone->LinkCustomAttributes = "";
			$this->phone->HrefValue = "";

			// mobile
			$this->mobile->LinkCustomAttributes = "";
			$this->mobile->HrefValue = "";

			// reportsto
			$this->reportsto->LinkCustomAttributes = "";
			$this->reportsto->HrefValue = "";

			// training
			$this->training->LinkCustomAttributes = "";
			$this->training->HrefValue = "";

			// usertype
			$this->usertype->LinkCustomAttributes = "";
			$this->usertype->HrefValue = "";

			// contacttype
			$this->contacttype->LinkCustomAttributes = "";
			$this->contacttype->HrefValue = "";

			// otheremail
			$this->otheremail->LinkCustomAttributes = "";
			$this->otheremail->HrefValue = "";

			// donotcall
			$this->donotcall->LinkCustomAttributes = "";
			$this->donotcall->HrefValue = "";

			// emailoptout
			$this->emailoptout->LinkCustomAttributes = "";
			$this->emailoptout->HrefValue = "";

			// imagename
			$this->imagename->LinkCustomAttributes = "";
			$this->imagename->HrefValue = "";

			// isconvertedfromlead
			$this->isconvertedfromlead->LinkCustomAttributes = "";
			$this->isconvertedfromlead->HrefValue = "";

			// verification
			$this->verification->LinkCustomAttributes = "";
			$this->verification->HrefValue = "";

			// secondary_email
			$this->secondary_email->LinkCustomAttributes = "";
			$this->secondary_email->HrefValue = "";

			// notifilanguage
			$this->notifilanguage->LinkCustomAttributes = "";
			$this->notifilanguage->HrefValue = "";

			// contactstatus
			$this->contactstatus->LinkCustomAttributes = "";
			$this->contactstatus->HrefValue = "";

			// dav_status
			$this->dav_status->LinkCustomAttributes = "";
			$this->dav_status->HrefValue = "";

			// jobtitle
			$this->jobtitle->LinkCustomAttributes = "";
			$this->jobtitle->HrefValue = "";

			// decision_maker
			$this->decision_maker->LinkCustomAttributes = "";
			$this->decision_maker->HrefValue = "";

			// sum_time
			$this->sum_time->LinkCustomAttributes = "";
			$this->sum_time->HrefValue = "";

			// phone_extra
			$this->phone_extra->LinkCustomAttributes = "";
			$this->phone_extra->HrefValue = "";

			// mobile_extra
			$this->mobile_extra->LinkCustomAttributes = "";
			$this->mobile_extra->HrefValue = "";

			// approvals
			$this->approvals->LinkCustomAttributes = "";
			$this->approvals->HrefValue = "";

			// gender
			$this->gender->LinkCustomAttributes = "";
			$this->gender->HrefValue = "";
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
		if ($this->contactid->Required) {
			if (!$this->contactid->IsDetailKey && $this->contactid->FormValue != NULL && $this->contactid->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->contactid->caption(), $this->contactid->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->contactid->FormValue)) {
			AddMessage($FormError, $this->contactid->errorMessage());
		}
		if ($this->contact_no->Required) {
			if (!$this->contact_no->IsDetailKey && $this->contact_no->FormValue != NULL && $this->contact_no->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->contact_no->caption(), $this->contact_no->RequiredErrorMessage));
			}
		}
		if ($this->parentid->Required) {
			if (!$this->parentid->IsDetailKey && $this->parentid->FormValue != NULL && $this->parentid->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->parentid->caption(), $this->parentid->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->parentid->FormValue)) {
			AddMessage($FormError, $this->parentid->errorMessage());
		}
		if ($this->salutation->Required) {
			if (!$this->salutation->IsDetailKey && $this->salutation->FormValue != NULL && $this->salutation->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->salutation->caption(), $this->salutation->RequiredErrorMessage));
			}
		}
		if ($this->firstname->Required) {
			if (!$this->firstname->IsDetailKey && $this->firstname->FormValue != NULL && $this->firstname->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->firstname->caption(), $this->firstname->RequiredErrorMessage));
			}
		}
		if ($this->lastname->Required) {
			if (!$this->lastname->IsDetailKey && $this->lastname->FormValue != NULL && $this->lastname->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->lastname->caption(), $this->lastname->RequiredErrorMessage));
			}
		}
		if ($this->_email->Required) {
			if (!$this->_email->IsDetailKey && $this->_email->FormValue != NULL && $this->_email->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->_email->caption(), $this->_email->RequiredErrorMessage));
			}
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
		if ($this->reportsto->Required) {
			if (!$this->reportsto->IsDetailKey && $this->reportsto->FormValue != NULL && $this->reportsto->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->reportsto->caption(), $this->reportsto->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->reportsto->FormValue)) {
			AddMessage($FormError, $this->reportsto->errorMessage());
		}
		if ($this->training->Required) {
			if (!$this->training->IsDetailKey && $this->training->FormValue != NULL && $this->training->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->training->caption(), $this->training->RequiredErrorMessage));
			}
		}
		if ($this->usertype->Required) {
			if (!$this->usertype->IsDetailKey && $this->usertype->FormValue != NULL && $this->usertype->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->usertype->caption(), $this->usertype->RequiredErrorMessage));
			}
		}
		if ($this->contacttype->Required) {
			if (!$this->contacttype->IsDetailKey && $this->contacttype->FormValue != NULL && $this->contacttype->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->contacttype->caption(), $this->contacttype->RequiredErrorMessage));
			}
		}
		if ($this->otheremail->Required) {
			if (!$this->otheremail->IsDetailKey && $this->otheremail->FormValue != NULL && $this->otheremail->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->otheremail->caption(), $this->otheremail->RequiredErrorMessage));
			}
		}
		if ($this->donotcall->Required) {
			if (!$this->donotcall->IsDetailKey && $this->donotcall->FormValue != NULL && $this->donotcall->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->donotcall->caption(), $this->donotcall->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->donotcall->FormValue)) {
			AddMessage($FormError, $this->donotcall->errorMessage());
		}
		if ($this->emailoptout->Required) {
			if (!$this->emailoptout->IsDetailKey && $this->emailoptout->FormValue != NULL && $this->emailoptout->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->emailoptout->caption(), $this->emailoptout->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->emailoptout->FormValue)) {
			AddMessage($FormError, $this->emailoptout->errorMessage());
		}
		if ($this->imagename->Required) {
			if (!$this->imagename->IsDetailKey && $this->imagename->FormValue != NULL && $this->imagename->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->imagename->caption(), $this->imagename->RequiredErrorMessage));
			}
		}
		if ($this->isconvertedfromlead->Required) {
			if (!$this->isconvertedfromlead->IsDetailKey && $this->isconvertedfromlead->FormValue != NULL && $this->isconvertedfromlead->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->isconvertedfromlead->caption(), $this->isconvertedfromlead->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->isconvertedfromlead->FormValue)) {
			AddMessage($FormError, $this->isconvertedfromlead->errorMessage());
		}
		if ($this->verification->Required) {
			if (!$this->verification->IsDetailKey && $this->verification->FormValue != NULL && $this->verification->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->verification->caption(), $this->verification->RequiredErrorMessage));
			}
		}
		if ($this->secondary_email->Required) {
			if (!$this->secondary_email->IsDetailKey && $this->secondary_email->FormValue != NULL && $this->secondary_email->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->secondary_email->caption(), $this->secondary_email->RequiredErrorMessage));
			}
		}
		if ($this->notifilanguage->Required) {
			if (!$this->notifilanguage->IsDetailKey && $this->notifilanguage->FormValue != NULL && $this->notifilanguage->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->notifilanguage->caption(), $this->notifilanguage->RequiredErrorMessage));
			}
		}
		if ($this->contactstatus->Required) {
			if (!$this->contactstatus->IsDetailKey && $this->contactstatus->FormValue != NULL && $this->contactstatus->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->contactstatus->caption(), $this->contactstatus->RequiredErrorMessage));
			}
		}
		if ($this->dav_status->Required) {
			if (!$this->dav_status->IsDetailKey && $this->dav_status->FormValue != NULL && $this->dav_status->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->dav_status->caption(), $this->dav_status->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->dav_status->FormValue)) {
			AddMessage($FormError, $this->dav_status->errorMessage());
		}
		if ($this->jobtitle->Required) {
			if (!$this->jobtitle->IsDetailKey && $this->jobtitle->FormValue != NULL && $this->jobtitle->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->jobtitle->caption(), $this->jobtitle->RequiredErrorMessage));
			}
		}
		if ($this->decision_maker->Required) {
			if (!$this->decision_maker->IsDetailKey && $this->decision_maker->FormValue != NULL && $this->decision_maker->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->decision_maker->caption(), $this->decision_maker->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->decision_maker->FormValue)) {
			AddMessage($FormError, $this->decision_maker->errorMessage());
		}
		if ($this->sum_time->Required) {
			if (!$this->sum_time->IsDetailKey && $this->sum_time->FormValue != NULL && $this->sum_time->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->sum_time->caption(), $this->sum_time->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->sum_time->FormValue)) {
			AddMessage($FormError, $this->sum_time->errorMessage());
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
		if ($this->approvals->Required) {
			if (!$this->approvals->IsDetailKey && $this->approvals->FormValue != NULL && $this->approvals->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->approvals->caption(), $this->approvals->RequiredErrorMessage));
			}
		}
		if ($this->gender->Required) {
			if (!$this->gender->IsDetailKey && $this->gender->FormValue != NULL && $this->gender->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->gender->caption(), $this->gender->RequiredErrorMessage));
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

		// contactid
		$this->contactid->setDbValueDef($rsnew, $this->contactid->CurrentValue, 0, strval($this->contactid->CurrentValue) == "");

		// contact_no
		$this->contact_no->setDbValueDef($rsnew, $this->contact_no->CurrentValue, "", FALSE);

		// parentid
		$this->parentid->setDbValueDef($rsnew, $this->parentid->CurrentValue, NULL, FALSE);

		// salutation
		$this->salutation->setDbValueDef($rsnew, $this->salutation->CurrentValue, NULL, FALSE);

		// firstname
		$this->firstname->setDbValueDef($rsnew, $this->firstname->CurrentValue, NULL, FALSE);

		// lastname
		$this->lastname->setDbValueDef($rsnew, $this->lastname->CurrentValue, "", FALSE);

		// email
		$this->_email->setDbValueDef($rsnew, $this->_email->CurrentValue, NULL, FALSE);

		// phone
		$this->phone->setDbValueDef($rsnew, $this->phone->CurrentValue, NULL, FALSE);

		// mobile
		$this->mobile->setDbValueDef($rsnew, $this->mobile->CurrentValue, NULL, FALSE);

		// reportsto
		$this->reportsto->setDbValueDef($rsnew, $this->reportsto->CurrentValue, NULL, FALSE);

		// training
		$this->training->setDbValueDef($rsnew, $this->training->CurrentValue, NULL, FALSE);

		// usertype
		$this->usertype->setDbValueDef($rsnew, $this->usertype->CurrentValue, NULL, FALSE);

		// contacttype
		$this->contacttype->setDbValueDef($rsnew, $this->contacttype->CurrentValue, NULL, FALSE);

		// otheremail
		$this->otheremail->setDbValueDef($rsnew, $this->otheremail->CurrentValue, NULL, FALSE);

		// donotcall
		$this->donotcall->setDbValueDef($rsnew, $this->donotcall->CurrentValue, NULL, FALSE);

		// emailoptout
		$this->emailoptout->setDbValueDef($rsnew, $this->emailoptout->CurrentValue, NULL, strval($this->emailoptout->CurrentValue) == "");

		// imagename
		$this->imagename->setDbValueDef($rsnew, $this->imagename->CurrentValue, NULL, FALSE);

		// isconvertedfromlead
		$this->isconvertedfromlead->setDbValueDef($rsnew, $this->isconvertedfromlead->CurrentValue, NULL, strval($this->isconvertedfromlead->CurrentValue) == "");

		// verification
		$this->verification->setDbValueDef($rsnew, $this->verification->CurrentValue, NULL, FALSE);

		// secondary_email
		$this->secondary_email->setDbValueDef($rsnew, $this->secondary_email->CurrentValue, NULL, FALSE);

		// notifilanguage
		$this->notifilanguage->setDbValueDef($rsnew, $this->notifilanguage->CurrentValue, NULL, FALSE);

		// contactstatus
		$this->contactstatus->setDbValueDef($rsnew, $this->contactstatus->CurrentValue, NULL, FALSE);

		// dav_status
		$this->dav_status->setDbValueDef($rsnew, $this->dav_status->CurrentValue, NULL, strval($this->dav_status->CurrentValue) == "");

		// jobtitle
		$this->jobtitle->setDbValueDef($rsnew, $this->jobtitle->CurrentValue, NULL, FALSE);

		// decision_maker
		$this->decision_maker->setDbValueDef($rsnew, $this->decision_maker->CurrentValue, NULL, strval($this->decision_maker->CurrentValue) == "");

		// sum_time
		$this->sum_time->setDbValueDef($rsnew, $this->sum_time->CurrentValue, NULL, strval($this->sum_time->CurrentValue) == "");

		// phone_extra
		$this->phone_extra->setDbValueDef($rsnew, $this->phone_extra->CurrentValue, NULL, FALSE);

		// mobile_extra
		$this->mobile_extra->setDbValueDef($rsnew, $this->mobile_extra->CurrentValue, NULL, FALSE);

		// approvals
		$this->approvals->setDbValueDef($rsnew, $this->approvals->CurrentValue, NULL, FALSE);

		// gender
		$this->gender->setDbValueDef($rsnew, $this->gender->CurrentValue, NULL, FALSE);

		// Call Row Inserting event
		$rs = ($rsold) ? $rsold->fields : NULL;
		$insertRow = $this->Row_Inserting($rs, $rsnew);

		// Check if key value entered
		if ($insertRow && $this->ValidateKey && strval($rsnew['contactid']) == "") {
			$this->setFailureMessage($Language->phrase("InvalidKeyValue"));
			$insertRow = FALSE;
		}

		// Check for duplicate key
		if ($insertRow && $this->ValidateKey) {
			$filter = $this->getRecordFilter();
			$rsChk = $this->loadRs($filter);
			if ($rsChk && !$rsChk->EOF) {
				$keyErrMsg = str_replace("%f", $filter, $Language->phrase("DupKey"));
				$this->setFailureMessage($keyErrMsg);
				$rsChk->close();
				$insertRow = FALSE;
			}
		}
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
		$Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("crm_contactdetailslist.php"), "", $this->TableVar, TRUE);
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
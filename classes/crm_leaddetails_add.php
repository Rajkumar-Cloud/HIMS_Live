<?php
namespace PHPMaker2019\HIMS;

/**
 * Page class
 */
class crm_leaddetails_add extends crm_leaddetails
{

	// Page ID
	public $PageID = "add";

	// Project ID
	public $ProjectID = "{EA4F6D13-AF8F-428D-9EA7-BA88D1107EC3}";

	// Table name
	public $TableName = 'crm_leaddetails';

	// Page object name
	public $PageObjName = "crm_leaddetails_add";

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

		// Table object (crm_leaddetails)
		if (!isset($GLOBALS["crm_leaddetails"]) || get_class($GLOBALS["crm_leaddetails"]) == PROJECT_NAMESPACE . "crm_leaddetails") {
			$GLOBALS["crm_leaddetails"] = &$this;
			$GLOBALS["Table"] = &$GLOBALS["crm_leaddetails"];
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
			define(PROJECT_NAMESPACE . "TABLE_NAME", 'crm_leaddetails');

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
		global $EXPORT, $crm_leaddetails;
		if ($this->CustomExport && $this->CustomExport == $this->Export && array_key_exists($this->CustomExport, $EXPORT)) {
				$content = ob_get_contents();
			if ($ExportFileName == "")
				$ExportFileName = $this->TableVar;
			$class = PROJECT_NAMESPACE . $EXPORT[$this->CustomExport];
			if (class_exists($class)) {
				$doc = new $class($crm_leaddetails);
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
					if ($pageName == "crm_leaddetailsview.php")
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
			$key .= @$ar['leadid'];
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
					$this->terminate(GetUrl("crm_leaddetailslist.php"));
				else
					$this->terminate(GetUrl("login.php"));
				return;
			}
		}

		// Create form object
		$CurrentForm = new HttpForm();
		$this->CurrentAction = Param("action"); // Set up current action
		$this->leadid->setVisibility();
		$this->lead_no->setVisibility();
		$this->_email->setVisibility();
		$this->interest->setVisibility();
		$this->firstname->setVisibility();
		$this->salutation->setVisibility();
		$this->lastname->setVisibility();
		$this->company->setVisibility();
		$this->annualrevenue->setVisibility();
		$this->industry->setVisibility();
		$this->campaign->setVisibility();
		$this->leadstatus->setVisibility();
		$this->leadsource->setVisibility();
		$this->converted->setVisibility();
		$this->licencekeystatus->setVisibility();
		$this->space->setVisibility();
		$this->comments->setVisibility();
		$this->priority->setVisibility();
		$this->demorequest->setVisibility();
		$this->partnercontact->setVisibility();
		$this->productversion->setVisibility();
		$this->product->setVisibility();
		$this->maildate->setVisibility();
		$this->nextstepdate->setVisibility();
		$this->fundingsituation->setVisibility();
		$this->purpose->setVisibility();
		$this->evaluationstatus->setVisibility();
		$this->transferdate->setVisibility();
		$this->revenuetype->setVisibility();
		$this->noofemployees->setVisibility();
		$this->secondaryemail->setVisibility();
		$this->noapprovalcalls->setVisibility();
		$this->noapprovalemails->setVisibility();
		$this->vat_id->setVisibility();
		$this->registration_number_1->setVisibility();
		$this->registration_number_2->setVisibility();
		$this->verification->setVisibility();
		$this->subindustry->setVisibility();
		$this->atenttion->setVisibility();
		$this->leads_relation->setVisibility();
		$this->legal_form->setVisibility();
		$this->sum_time->setVisibility();
		$this->active->setVisibility();
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
			if (Get("leadid") !== NULL) {
				$this->leadid->setQueryStringValue(Get("leadid"));
				$this->setKey("leadid", $this->leadid->CurrentValue); // Set up key
			} else {
				$this->setKey("leadid", ""); // Clear key
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
					$this->terminate("crm_leaddetailslist.php"); // No matching record, return to list
				}
				break;
			case "insert": // Add new record
				$this->SendEmail = TRUE; // Send email on add success
				if ($this->addRow($this->OldRecordset)) { // Add successful
					if ($this->getSuccessMessage() == "")
						$this->setSuccessMessage($Language->phrase("AddSuccess")); // Set up success message
					$returnUrl = $this->getReturnUrl();
					if (GetPageName($returnUrl) == "crm_leaddetailslist.php")
						$returnUrl = $this->addMasterUrl($returnUrl); // List page, return to List page with correct master key if necessary
					elseif (GetPageName($returnUrl) == "crm_leaddetailsview.php")
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
		$this->leadid->CurrentValue = NULL;
		$this->leadid->OldValue = $this->leadid->CurrentValue;
		$this->lead_no->CurrentValue = NULL;
		$this->lead_no->OldValue = $this->lead_no->CurrentValue;
		$this->_email->CurrentValue = NULL;
		$this->_email->OldValue = $this->_email->CurrentValue;
		$this->interest->CurrentValue = NULL;
		$this->interest->OldValue = $this->interest->CurrentValue;
		$this->firstname->CurrentValue = NULL;
		$this->firstname->OldValue = $this->firstname->CurrentValue;
		$this->salutation->CurrentValue = NULL;
		$this->salutation->OldValue = $this->salutation->CurrentValue;
		$this->lastname->CurrentValue = NULL;
		$this->lastname->OldValue = $this->lastname->CurrentValue;
		$this->company->CurrentValue = NULL;
		$this->company->OldValue = $this->company->CurrentValue;
		$this->annualrevenue->CurrentValue = NULL;
		$this->annualrevenue->OldValue = $this->annualrevenue->CurrentValue;
		$this->industry->CurrentValue = NULL;
		$this->industry->OldValue = $this->industry->CurrentValue;
		$this->campaign->CurrentValue = NULL;
		$this->campaign->OldValue = $this->campaign->CurrentValue;
		$this->leadstatus->CurrentValue = NULL;
		$this->leadstatus->OldValue = $this->leadstatus->CurrentValue;
		$this->leadsource->CurrentValue = NULL;
		$this->leadsource->OldValue = $this->leadsource->CurrentValue;
		$this->converted->CurrentValue = 0;
		$this->licencekeystatus->CurrentValue = NULL;
		$this->licencekeystatus->OldValue = $this->licencekeystatus->CurrentValue;
		$this->space->CurrentValue = NULL;
		$this->space->OldValue = $this->space->CurrentValue;
		$this->comments->CurrentValue = NULL;
		$this->comments->OldValue = $this->comments->CurrentValue;
		$this->priority->CurrentValue = NULL;
		$this->priority->OldValue = $this->priority->CurrentValue;
		$this->demorequest->CurrentValue = NULL;
		$this->demorequest->OldValue = $this->demorequest->CurrentValue;
		$this->partnercontact->CurrentValue = NULL;
		$this->partnercontact->OldValue = $this->partnercontact->CurrentValue;
		$this->productversion->CurrentValue = NULL;
		$this->productversion->OldValue = $this->productversion->CurrentValue;
		$this->product->CurrentValue = NULL;
		$this->product->OldValue = $this->product->CurrentValue;
		$this->maildate->CurrentValue = NULL;
		$this->maildate->OldValue = $this->maildate->CurrentValue;
		$this->nextstepdate->CurrentValue = NULL;
		$this->nextstepdate->OldValue = $this->nextstepdate->CurrentValue;
		$this->fundingsituation->CurrentValue = NULL;
		$this->fundingsituation->OldValue = $this->fundingsituation->CurrentValue;
		$this->purpose->CurrentValue = NULL;
		$this->purpose->OldValue = $this->purpose->CurrentValue;
		$this->evaluationstatus->CurrentValue = NULL;
		$this->evaluationstatus->OldValue = $this->evaluationstatus->CurrentValue;
		$this->transferdate->CurrentValue = NULL;
		$this->transferdate->OldValue = $this->transferdate->CurrentValue;
		$this->revenuetype->CurrentValue = NULL;
		$this->revenuetype->OldValue = $this->revenuetype->CurrentValue;
		$this->noofemployees->CurrentValue = NULL;
		$this->noofemployees->OldValue = $this->noofemployees->CurrentValue;
		$this->secondaryemail->CurrentValue = NULL;
		$this->secondaryemail->OldValue = $this->secondaryemail->CurrentValue;
		$this->noapprovalcalls->CurrentValue = NULL;
		$this->noapprovalcalls->OldValue = $this->noapprovalcalls->CurrentValue;
		$this->noapprovalemails->CurrentValue = NULL;
		$this->noapprovalemails->OldValue = $this->noapprovalemails->CurrentValue;
		$this->vat_id->CurrentValue = NULL;
		$this->vat_id->OldValue = $this->vat_id->CurrentValue;
		$this->registration_number_1->CurrentValue = NULL;
		$this->registration_number_1->OldValue = $this->registration_number_1->CurrentValue;
		$this->registration_number_2->CurrentValue = NULL;
		$this->registration_number_2->OldValue = $this->registration_number_2->CurrentValue;
		$this->verification->CurrentValue = NULL;
		$this->verification->OldValue = $this->verification->CurrentValue;
		$this->subindustry->CurrentValue = NULL;
		$this->subindustry->OldValue = $this->subindustry->CurrentValue;
		$this->atenttion->CurrentValue = NULL;
		$this->atenttion->OldValue = $this->atenttion->CurrentValue;
		$this->leads_relation->CurrentValue = NULL;
		$this->leads_relation->OldValue = $this->leads_relation->CurrentValue;
		$this->legal_form->CurrentValue = NULL;
		$this->legal_form->OldValue = $this->legal_form->CurrentValue;
		$this->sum_time->CurrentValue = 0.00;
		$this->active->CurrentValue = 0;
	}

	// Load form values
	protected function loadFormValues()
	{

		// Load from form
		global $CurrentForm;

		// Check field name 'leadid' first before field var 'x_leadid'
		$val = $CurrentForm->hasValue("leadid") ? $CurrentForm->getValue("leadid") : $CurrentForm->getValue("x_leadid");
		if (!$this->leadid->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->leadid->Visible = FALSE; // Disable update for API request
			else
				$this->leadid->setFormValue($val);
		}

		// Check field name 'lead_no' first before field var 'x_lead_no'
		$val = $CurrentForm->hasValue("lead_no") ? $CurrentForm->getValue("lead_no") : $CurrentForm->getValue("x_lead_no");
		if (!$this->lead_no->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->lead_no->Visible = FALSE; // Disable update for API request
			else
				$this->lead_no->setFormValue($val);
		}

		// Check field name 'email' first before field var 'x__email'
		$val = $CurrentForm->hasValue("email") ? $CurrentForm->getValue("email") : $CurrentForm->getValue("x__email");
		if (!$this->_email->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->_email->Visible = FALSE; // Disable update for API request
			else
				$this->_email->setFormValue($val);
		}

		// Check field name 'interest' first before field var 'x_interest'
		$val = $CurrentForm->hasValue("interest") ? $CurrentForm->getValue("interest") : $CurrentForm->getValue("x_interest");
		if (!$this->interest->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->interest->Visible = FALSE; // Disable update for API request
			else
				$this->interest->setFormValue($val);
		}

		// Check field name 'firstname' first before field var 'x_firstname'
		$val = $CurrentForm->hasValue("firstname") ? $CurrentForm->getValue("firstname") : $CurrentForm->getValue("x_firstname");
		if (!$this->firstname->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->firstname->Visible = FALSE; // Disable update for API request
			else
				$this->firstname->setFormValue($val);
		}

		// Check field name 'salutation' first before field var 'x_salutation'
		$val = $CurrentForm->hasValue("salutation") ? $CurrentForm->getValue("salutation") : $CurrentForm->getValue("x_salutation");
		if (!$this->salutation->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->salutation->Visible = FALSE; // Disable update for API request
			else
				$this->salutation->setFormValue($val);
		}

		// Check field name 'lastname' first before field var 'x_lastname'
		$val = $CurrentForm->hasValue("lastname") ? $CurrentForm->getValue("lastname") : $CurrentForm->getValue("x_lastname");
		if (!$this->lastname->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->lastname->Visible = FALSE; // Disable update for API request
			else
				$this->lastname->setFormValue($val);
		}

		// Check field name 'company' first before field var 'x_company'
		$val = $CurrentForm->hasValue("company") ? $CurrentForm->getValue("company") : $CurrentForm->getValue("x_company");
		if (!$this->company->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->company->Visible = FALSE; // Disable update for API request
			else
				$this->company->setFormValue($val);
		}

		// Check field name 'annualrevenue' first before field var 'x_annualrevenue'
		$val = $CurrentForm->hasValue("annualrevenue") ? $CurrentForm->getValue("annualrevenue") : $CurrentForm->getValue("x_annualrevenue");
		if (!$this->annualrevenue->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->annualrevenue->Visible = FALSE; // Disable update for API request
			else
				$this->annualrevenue->setFormValue($val);
		}

		// Check field name 'industry' first before field var 'x_industry'
		$val = $CurrentForm->hasValue("industry") ? $CurrentForm->getValue("industry") : $CurrentForm->getValue("x_industry");
		if (!$this->industry->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->industry->Visible = FALSE; // Disable update for API request
			else
				$this->industry->setFormValue($val);
		}

		// Check field name 'campaign' first before field var 'x_campaign'
		$val = $CurrentForm->hasValue("campaign") ? $CurrentForm->getValue("campaign") : $CurrentForm->getValue("x_campaign");
		if (!$this->campaign->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->campaign->Visible = FALSE; // Disable update for API request
			else
				$this->campaign->setFormValue($val);
		}

		// Check field name 'leadstatus' first before field var 'x_leadstatus'
		$val = $CurrentForm->hasValue("leadstatus") ? $CurrentForm->getValue("leadstatus") : $CurrentForm->getValue("x_leadstatus");
		if (!$this->leadstatus->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->leadstatus->Visible = FALSE; // Disable update for API request
			else
				$this->leadstatus->setFormValue($val);
		}

		// Check field name 'leadsource' first before field var 'x_leadsource'
		$val = $CurrentForm->hasValue("leadsource") ? $CurrentForm->getValue("leadsource") : $CurrentForm->getValue("x_leadsource");
		if (!$this->leadsource->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->leadsource->Visible = FALSE; // Disable update for API request
			else
				$this->leadsource->setFormValue($val);
		}

		// Check field name 'converted' first before field var 'x_converted'
		$val = $CurrentForm->hasValue("converted") ? $CurrentForm->getValue("converted") : $CurrentForm->getValue("x_converted");
		if (!$this->converted->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->converted->Visible = FALSE; // Disable update for API request
			else
				$this->converted->setFormValue($val);
		}

		// Check field name 'licencekeystatus' first before field var 'x_licencekeystatus'
		$val = $CurrentForm->hasValue("licencekeystatus") ? $CurrentForm->getValue("licencekeystatus") : $CurrentForm->getValue("x_licencekeystatus");
		if (!$this->licencekeystatus->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->licencekeystatus->Visible = FALSE; // Disable update for API request
			else
				$this->licencekeystatus->setFormValue($val);
		}

		// Check field name 'space' first before field var 'x_space'
		$val = $CurrentForm->hasValue("space") ? $CurrentForm->getValue("space") : $CurrentForm->getValue("x_space");
		if (!$this->space->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->space->Visible = FALSE; // Disable update for API request
			else
				$this->space->setFormValue($val);
		}

		// Check field name 'comments' first before field var 'x_comments'
		$val = $CurrentForm->hasValue("comments") ? $CurrentForm->getValue("comments") : $CurrentForm->getValue("x_comments");
		if (!$this->comments->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->comments->Visible = FALSE; // Disable update for API request
			else
				$this->comments->setFormValue($val);
		}

		// Check field name 'priority' first before field var 'x_priority'
		$val = $CurrentForm->hasValue("priority") ? $CurrentForm->getValue("priority") : $CurrentForm->getValue("x_priority");
		if (!$this->priority->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->priority->Visible = FALSE; // Disable update for API request
			else
				$this->priority->setFormValue($val);
		}

		// Check field name 'demorequest' first before field var 'x_demorequest'
		$val = $CurrentForm->hasValue("demorequest") ? $CurrentForm->getValue("demorequest") : $CurrentForm->getValue("x_demorequest");
		if (!$this->demorequest->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->demorequest->Visible = FALSE; // Disable update for API request
			else
				$this->demorequest->setFormValue($val);
		}

		// Check field name 'partnercontact' first before field var 'x_partnercontact'
		$val = $CurrentForm->hasValue("partnercontact") ? $CurrentForm->getValue("partnercontact") : $CurrentForm->getValue("x_partnercontact");
		if (!$this->partnercontact->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->partnercontact->Visible = FALSE; // Disable update for API request
			else
				$this->partnercontact->setFormValue($val);
		}

		// Check field name 'productversion' first before field var 'x_productversion'
		$val = $CurrentForm->hasValue("productversion") ? $CurrentForm->getValue("productversion") : $CurrentForm->getValue("x_productversion");
		if (!$this->productversion->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->productversion->Visible = FALSE; // Disable update for API request
			else
				$this->productversion->setFormValue($val);
		}

		// Check field name 'product' first before field var 'x_product'
		$val = $CurrentForm->hasValue("product") ? $CurrentForm->getValue("product") : $CurrentForm->getValue("x_product");
		if (!$this->product->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->product->Visible = FALSE; // Disable update for API request
			else
				$this->product->setFormValue($val);
		}

		// Check field name 'maildate' first before field var 'x_maildate'
		$val = $CurrentForm->hasValue("maildate") ? $CurrentForm->getValue("maildate") : $CurrentForm->getValue("x_maildate");
		if (!$this->maildate->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->maildate->Visible = FALSE; // Disable update for API request
			else
				$this->maildate->setFormValue($val);
			$this->maildate->CurrentValue = UnFormatDateTime($this->maildate->CurrentValue, 0);
		}

		// Check field name 'nextstepdate' first before field var 'x_nextstepdate'
		$val = $CurrentForm->hasValue("nextstepdate") ? $CurrentForm->getValue("nextstepdate") : $CurrentForm->getValue("x_nextstepdate");
		if (!$this->nextstepdate->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->nextstepdate->Visible = FALSE; // Disable update for API request
			else
				$this->nextstepdate->setFormValue($val);
			$this->nextstepdate->CurrentValue = UnFormatDateTime($this->nextstepdate->CurrentValue, 0);
		}

		// Check field name 'fundingsituation' first before field var 'x_fundingsituation'
		$val = $CurrentForm->hasValue("fundingsituation") ? $CurrentForm->getValue("fundingsituation") : $CurrentForm->getValue("x_fundingsituation");
		if (!$this->fundingsituation->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->fundingsituation->Visible = FALSE; // Disable update for API request
			else
				$this->fundingsituation->setFormValue($val);
		}

		// Check field name 'purpose' first before field var 'x_purpose'
		$val = $CurrentForm->hasValue("purpose") ? $CurrentForm->getValue("purpose") : $CurrentForm->getValue("x_purpose");
		if (!$this->purpose->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->purpose->Visible = FALSE; // Disable update for API request
			else
				$this->purpose->setFormValue($val);
		}

		// Check field name 'evaluationstatus' first before field var 'x_evaluationstatus'
		$val = $CurrentForm->hasValue("evaluationstatus") ? $CurrentForm->getValue("evaluationstatus") : $CurrentForm->getValue("x_evaluationstatus");
		if (!$this->evaluationstatus->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->evaluationstatus->Visible = FALSE; // Disable update for API request
			else
				$this->evaluationstatus->setFormValue($val);
		}

		// Check field name 'transferdate' first before field var 'x_transferdate'
		$val = $CurrentForm->hasValue("transferdate") ? $CurrentForm->getValue("transferdate") : $CurrentForm->getValue("x_transferdate");
		if (!$this->transferdate->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->transferdate->Visible = FALSE; // Disable update for API request
			else
				$this->transferdate->setFormValue($val);
			$this->transferdate->CurrentValue = UnFormatDateTime($this->transferdate->CurrentValue, 0);
		}

		// Check field name 'revenuetype' first before field var 'x_revenuetype'
		$val = $CurrentForm->hasValue("revenuetype") ? $CurrentForm->getValue("revenuetype") : $CurrentForm->getValue("x_revenuetype");
		if (!$this->revenuetype->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->revenuetype->Visible = FALSE; // Disable update for API request
			else
				$this->revenuetype->setFormValue($val);
		}

		// Check field name 'noofemployees' first before field var 'x_noofemployees'
		$val = $CurrentForm->hasValue("noofemployees") ? $CurrentForm->getValue("noofemployees") : $CurrentForm->getValue("x_noofemployees");
		if (!$this->noofemployees->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->noofemployees->Visible = FALSE; // Disable update for API request
			else
				$this->noofemployees->setFormValue($val);
		}

		// Check field name 'secondaryemail' first before field var 'x_secondaryemail'
		$val = $CurrentForm->hasValue("secondaryemail") ? $CurrentForm->getValue("secondaryemail") : $CurrentForm->getValue("x_secondaryemail");
		if (!$this->secondaryemail->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->secondaryemail->Visible = FALSE; // Disable update for API request
			else
				$this->secondaryemail->setFormValue($val);
		}

		// Check field name 'noapprovalcalls' first before field var 'x_noapprovalcalls'
		$val = $CurrentForm->hasValue("noapprovalcalls") ? $CurrentForm->getValue("noapprovalcalls") : $CurrentForm->getValue("x_noapprovalcalls");
		if (!$this->noapprovalcalls->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->noapprovalcalls->Visible = FALSE; // Disable update for API request
			else
				$this->noapprovalcalls->setFormValue($val);
		}

		// Check field name 'noapprovalemails' first before field var 'x_noapprovalemails'
		$val = $CurrentForm->hasValue("noapprovalemails") ? $CurrentForm->getValue("noapprovalemails") : $CurrentForm->getValue("x_noapprovalemails");
		if (!$this->noapprovalemails->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->noapprovalemails->Visible = FALSE; // Disable update for API request
			else
				$this->noapprovalemails->setFormValue($val);
		}

		// Check field name 'vat_id' first before field var 'x_vat_id'
		$val = $CurrentForm->hasValue("vat_id") ? $CurrentForm->getValue("vat_id") : $CurrentForm->getValue("x_vat_id");
		if (!$this->vat_id->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->vat_id->Visible = FALSE; // Disable update for API request
			else
				$this->vat_id->setFormValue($val);
		}

		// Check field name 'registration_number_1' first before field var 'x_registration_number_1'
		$val = $CurrentForm->hasValue("registration_number_1") ? $CurrentForm->getValue("registration_number_1") : $CurrentForm->getValue("x_registration_number_1");
		if (!$this->registration_number_1->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->registration_number_1->Visible = FALSE; // Disable update for API request
			else
				$this->registration_number_1->setFormValue($val);
		}

		// Check field name 'registration_number_2' first before field var 'x_registration_number_2'
		$val = $CurrentForm->hasValue("registration_number_2") ? $CurrentForm->getValue("registration_number_2") : $CurrentForm->getValue("x_registration_number_2");
		if (!$this->registration_number_2->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->registration_number_2->Visible = FALSE; // Disable update for API request
			else
				$this->registration_number_2->setFormValue($val);
		}

		// Check field name 'verification' first before field var 'x_verification'
		$val = $CurrentForm->hasValue("verification") ? $CurrentForm->getValue("verification") : $CurrentForm->getValue("x_verification");
		if (!$this->verification->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->verification->Visible = FALSE; // Disable update for API request
			else
				$this->verification->setFormValue($val);
		}

		// Check field name 'subindustry' first before field var 'x_subindustry'
		$val = $CurrentForm->hasValue("subindustry") ? $CurrentForm->getValue("subindustry") : $CurrentForm->getValue("x_subindustry");
		if (!$this->subindustry->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->subindustry->Visible = FALSE; // Disable update for API request
			else
				$this->subindustry->setFormValue($val);
		}

		// Check field name 'atenttion' first before field var 'x_atenttion'
		$val = $CurrentForm->hasValue("atenttion") ? $CurrentForm->getValue("atenttion") : $CurrentForm->getValue("x_atenttion");
		if (!$this->atenttion->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->atenttion->Visible = FALSE; // Disable update for API request
			else
				$this->atenttion->setFormValue($val);
		}

		// Check field name 'leads_relation' first before field var 'x_leads_relation'
		$val = $CurrentForm->hasValue("leads_relation") ? $CurrentForm->getValue("leads_relation") : $CurrentForm->getValue("x_leads_relation");
		if (!$this->leads_relation->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->leads_relation->Visible = FALSE; // Disable update for API request
			else
				$this->leads_relation->setFormValue($val);
		}

		// Check field name 'legal_form' first before field var 'x_legal_form'
		$val = $CurrentForm->hasValue("legal_form") ? $CurrentForm->getValue("legal_form") : $CurrentForm->getValue("x_legal_form");
		if (!$this->legal_form->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->legal_form->Visible = FALSE; // Disable update for API request
			else
				$this->legal_form->setFormValue($val);
		}

		// Check field name 'sum_time' first before field var 'x_sum_time'
		$val = $CurrentForm->hasValue("sum_time") ? $CurrentForm->getValue("sum_time") : $CurrentForm->getValue("x_sum_time");
		if (!$this->sum_time->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->sum_time->Visible = FALSE; // Disable update for API request
			else
				$this->sum_time->setFormValue($val);
		}

		// Check field name 'active' first before field var 'x_active'
		$val = $CurrentForm->hasValue("active") ? $CurrentForm->getValue("active") : $CurrentForm->getValue("x_active");
		if (!$this->active->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->active->Visible = FALSE; // Disable update for API request
			else
				$this->active->setFormValue($val);
		}
	}

	// Restore form values
	public function restoreFormValues()
	{
		global $CurrentForm;
		$this->leadid->CurrentValue = $this->leadid->FormValue;
		$this->lead_no->CurrentValue = $this->lead_no->FormValue;
		$this->_email->CurrentValue = $this->_email->FormValue;
		$this->interest->CurrentValue = $this->interest->FormValue;
		$this->firstname->CurrentValue = $this->firstname->FormValue;
		$this->salutation->CurrentValue = $this->salutation->FormValue;
		$this->lastname->CurrentValue = $this->lastname->FormValue;
		$this->company->CurrentValue = $this->company->FormValue;
		$this->annualrevenue->CurrentValue = $this->annualrevenue->FormValue;
		$this->industry->CurrentValue = $this->industry->FormValue;
		$this->campaign->CurrentValue = $this->campaign->FormValue;
		$this->leadstatus->CurrentValue = $this->leadstatus->FormValue;
		$this->leadsource->CurrentValue = $this->leadsource->FormValue;
		$this->converted->CurrentValue = $this->converted->FormValue;
		$this->licencekeystatus->CurrentValue = $this->licencekeystatus->FormValue;
		$this->space->CurrentValue = $this->space->FormValue;
		$this->comments->CurrentValue = $this->comments->FormValue;
		$this->priority->CurrentValue = $this->priority->FormValue;
		$this->demorequest->CurrentValue = $this->demorequest->FormValue;
		$this->partnercontact->CurrentValue = $this->partnercontact->FormValue;
		$this->productversion->CurrentValue = $this->productversion->FormValue;
		$this->product->CurrentValue = $this->product->FormValue;
		$this->maildate->CurrentValue = $this->maildate->FormValue;
		$this->maildate->CurrentValue = UnFormatDateTime($this->maildate->CurrentValue, 0);
		$this->nextstepdate->CurrentValue = $this->nextstepdate->FormValue;
		$this->nextstepdate->CurrentValue = UnFormatDateTime($this->nextstepdate->CurrentValue, 0);
		$this->fundingsituation->CurrentValue = $this->fundingsituation->FormValue;
		$this->purpose->CurrentValue = $this->purpose->FormValue;
		$this->evaluationstatus->CurrentValue = $this->evaluationstatus->FormValue;
		$this->transferdate->CurrentValue = $this->transferdate->FormValue;
		$this->transferdate->CurrentValue = UnFormatDateTime($this->transferdate->CurrentValue, 0);
		$this->revenuetype->CurrentValue = $this->revenuetype->FormValue;
		$this->noofemployees->CurrentValue = $this->noofemployees->FormValue;
		$this->secondaryemail->CurrentValue = $this->secondaryemail->FormValue;
		$this->noapprovalcalls->CurrentValue = $this->noapprovalcalls->FormValue;
		$this->noapprovalemails->CurrentValue = $this->noapprovalemails->FormValue;
		$this->vat_id->CurrentValue = $this->vat_id->FormValue;
		$this->registration_number_1->CurrentValue = $this->registration_number_1->FormValue;
		$this->registration_number_2->CurrentValue = $this->registration_number_2->FormValue;
		$this->verification->CurrentValue = $this->verification->FormValue;
		$this->subindustry->CurrentValue = $this->subindustry->FormValue;
		$this->atenttion->CurrentValue = $this->atenttion->FormValue;
		$this->leads_relation->CurrentValue = $this->leads_relation->FormValue;
		$this->legal_form->CurrentValue = $this->legal_form->FormValue;
		$this->sum_time->CurrentValue = $this->sum_time->FormValue;
		$this->active->CurrentValue = $this->active->FormValue;
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
		$this->leadid->setDbValue($row['leadid']);
		$this->lead_no->setDbValue($row['lead_no']);
		$this->_email->setDbValue($row['email']);
		$this->interest->setDbValue($row['interest']);
		$this->firstname->setDbValue($row['firstname']);
		$this->salutation->setDbValue($row['salutation']);
		$this->lastname->setDbValue($row['lastname']);
		$this->company->setDbValue($row['company']);
		$this->annualrevenue->setDbValue($row['annualrevenue']);
		$this->industry->setDbValue($row['industry']);
		$this->campaign->setDbValue($row['campaign']);
		$this->leadstatus->setDbValue($row['leadstatus']);
		$this->leadsource->setDbValue($row['leadsource']);
		$this->converted->setDbValue($row['converted']);
		$this->licencekeystatus->setDbValue($row['licencekeystatus']);
		$this->space->setDbValue($row['space']);
		$this->comments->setDbValue($row['comments']);
		$this->priority->setDbValue($row['priority']);
		$this->demorequest->setDbValue($row['demorequest']);
		$this->partnercontact->setDbValue($row['partnercontact']);
		$this->productversion->setDbValue($row['productversion']);
		$this->product->setDbValue($row['product']);
		$this->maildate->setDbValue($row['maildate']);
		$this->nextstepdate->setDbValue($row['nextstepdate']);
		$this->fundingsituation->setDbValue($row['fundingsituation']);
		$this->purpose->setDbValue($row['purpose']);
		$this->evaluationstatus->setDbValue($row['evaluationstatus']);
		$this->transferdate->setDbValue($row['transferdate']);
		$this->revenuetype->setDbValue($row['revenuetype']);
		$this->noofemployees->setDbValue($row['noofemployees']);
		$this->secondaryemail->setDbValue($row['secondaryemail']);
		$this->noapprovalcalls->setDbValue($row['noapprovalcalls']);
		$this->noapprovalemails->setDbValue($row['noapprovalemails']);
		$this->vat_id->setDbValue($row['vat_id']);
		$this->registration_number_1->setDbValue($row['registration_number_1']);
		$this->registration_number_2->setDbValue($row['registration_number_2']);
		$this->verification->setDbValue($row['verification']);
		$this->subindustry->setDbValue($row['subindustry']);
		$this->atenttion->setDbValue($row['atenttion']);
		$this->leads_relation->setDbValue($row['leads_relation']);
		$this->legal_form->setDbValue($row['legal_form']);
		$this->sum_time->setDbValue($row['sum_time']);
		$this->active->setDbValue($row['active']);
	}

	// Return a row with default values
	protected function newRow()
	{
		$this->loadDefaultValues();
		$row = [];
		$row['leadid'] = $this->leadid->CurrentValue;
		$row['lead_no'] = $this->lead_no->CurrentValue;
		$row['email'] = $this->_email->CurrentValue;
		$row['interest'] = $this->interest->CurrentValue;
		$row['firstname'] = $this->firstname->CurrentValue;
		$row['salutation'] = $this->salutation->CurrentValue;
		$row['lastname'] = $this->lastname->CurrentValue;
		$row['company'] = $this->company->CurrentValue;
		$row['annualrevenue'] = $this->annualrevenue->CurrentValue;
		$row['industry'] = $this->industry->CurrentValue;
		$row['campaign'] = $this->campaign->CurrentValue;
		$row['leadstatus'] = $this->leadstatus->CurrentValue;
		$row['leadsource'] = $this->leadsource->CurrentValue;
		$row['converted'] = $this->converted->CurrentValue;
		$row['licencekeystatus'] = $this->licencekeystatus->CurrentValue;
		$row['space'] = $this->space->CurrentValue;
		$row['comments'] = $this->comments->CurrentValue;
		$row['priority'] = $this->priority->CurrentValue;
		$row['demorequest'] = $this->demorequest->CurrentValue;
		$row['partnercontact'] = $this->partnercontact->CurrentValue;
		$row['productversion'] = $this->productversion->CurrentValue;
		$row['product'] = $this->product->CurrentValue;
		$row['maildate'] = $this->maildate->CurrentValue;
		$row['nextstepdate'] = $this->nextstepdate->CurrentValue;
		$row['fundingsituation'] = $this->fundingsituation->CurrentValue;
		$row['purpose'] = $this->purpose->CurrentValue;
		$row['evaluationstatus'] = $this->evaluationstatus->CurrentValue;
		$row['transferdate'] = $this->transferdate->CurrentValue;
		$row['revenuetype'] = $this->revenuetype->CurrentValue;
		$row['noofemployees'] = $this->noofemployees->CurrentValue;
		$row['secondaryemail'] = $this->secondaryemail->CurrentValue;
		$row['noapprovalcalls'] = $this->noapprovalcalls->CurrentValue;
		$row['noapprovalemails'] = $this->noapprovalemails->CurrentValue;
		$row['vat_id'] = $this->vat_id->CurrentValue;
		$row['registration_number_1'] = $this->registration_number_1->CurrentValue;
		$row['registration_number_2'] = $this->registration_number_2->CurrentValue;
		$row['verification'] = $this->verification->CurrentValue;
		$row['subindustry'] = $this->subindustry->CurrentValue;
		$row['atenttion'] = $this->atenttion->CurrentValue;
		$row['leads_relation'] = $this->leads_relation->CurrentValue;
		$row['legal_form'] = $this->legal_form->CurrentValue;
		$row['sum_time'] = $this->sum_time->CurrentValue;
		$row['active'] = $this->active->CurrentValue;
		return $row;
	}

	// Load old record
	protected function loadOldRecord()
	{

		// Load key values from Session
		$validKey = TRUE;
		if (strval($this->getKey("leadid")) <> "")
			$this->leadid->CurrentValue = $this->getKey("leadid"); // leadid
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

		if ($this->annualrevenue->FormValue == $this->annualrevenue->CurrentValue && is_numeric(ConvertToFloatString($this->annualrevenue->CurrentValue)))
			$this->annualrevenue->CurrentValue = ConvertToFloatString($this->annualrevenue->CurrentValue);

		// Convert decimal values if posted back
		if ($this->sum_time->FormValue == $this->sum_time->CurrentValue && is_numeric(ConvertToFloatString($this->sum_time->CurrentValue)))
			$this->sum_time->CurrentValue = ConvertToFloatString($this->sum_time->CurrentValue);

		// Call Row_Rendering event
		$this->Row_Rendering();

		// Common render codes for all row types
		// leadid
		// lead_no
		// email
		// interest
		// firstname
		// salutation
		// lastname
		// company
		// annualrevenue
		// industry
		// campaign
		// leadstatus
		// leadsource
		// converted
		// licencekeystatus
		// space
		// comments
		// priority
		// demorequest
		// partnercontact
		// productversion
		// product
		// maildate
		// nextstepdate
		// fundingsituation
		// purpose
		// evaluationstatus
		// transferdate
		// revenuetype
		// noofemployees
		// secondaryemail
		// noapprovalcalls
		// noapprovalemails
		// vat_id
		// registration_number_1
		// registration_number_2
		// verification
		// subindustry
		// atenttion
		// leads_relation
		// legal_form
		// sum_time
		// active

		if ($this->RowType == ROWTYPE_VIEW) { // View row

			// leadid
			$this->leadid->ViewValue = $this->leadid->CurrentValue;
			$this->leadid->ViewValue = FormatNumber($this->leadid->ViewValue, 0, -2, -2, -2);
			$this->leadid->ViewCustomAttributes = "";

			// lead_no
			$this->lead_no->ViewValue = $this->lead_no->CurrentValue;
			$this->lead_no->ViewCustomAttributes = "";

			// email
			$this->_email->ViewValue = $this->_email->CurrentValue;
			$this->_email->ViewCustomAttributes = "";

			// interest
			$this->interest->ViewValue = $this->interest->CurrentValue;
			$this->interest->ViewCustomAttributes = "";

			// firstname
			$this->firstname->ViewValue = $this->firstname->CurrentValue;
			$this->firstname->ViewCustomAttributes = "";

			// salutation
			$this->salutation->ViewValue = $this->salutation->CurrentValue;
			$this->salutation->ViewCustomAttributes = "";

			// lastname
			$this->lastname->ViewValue = $this->lastname->CurrentValue;
			$this->lastname->ViewCustomAttributes = "";

			// company
			$this->company->ViewValue = $this->company->CurrentValue;
			$this->company->ViewCustomAttributes = "";

			// annualrevenue
			$this->annualrevenue->ViewValue = $this->annualrevenue->CurrentValue;
			$this->annualrevenue->ViewValue = FormatNumber($this->annualrevenue->ViewValue, 2, -2, -2, -2);
			$this->annualrevenue->ViewCustomAttributes = "";

			// industry
			$this->industry->ViewValue = $this->industry->CurrentValue;
			$this->industry->ViewCustomAttributes = "";

			// campaign
			$this->campaign->ViewValue = $this->campaign->CurrentValue;
			$this->campaign->ViewCustomAttributes = "";

			// leadstatus
			$this->leadstatus->ViewValue = $this->leadstatus->CurrentValue;
			$this->leadstatus->ViewCustomAttributes = "";

			// leadsource
			$this->leadsource->ViewValue = $this->leadsource->CurrentValue;
			$this->leadsource->ViewCustomAttributes = "";

			// converted
			$this->converted->ViewValue = $this->converted->CurrentValue;
			$this->converted->ViewValue = FormatNumber($this->converted->ViewValue, 0, -2, -2, -2);
			$this->converted->ViewCustomAttributes = "";

			// licencekeystatus
			$this->licencekeystatus->ViewValue = $this->licencekeystatus->CurrentValue;
			$this->licencekeystatus->ViewCustomAttributes = "";

			// space
			$this->space->ViewValue = $this->space->CurrentValue;
			$this->space->ViewCustomAttributes = "";

			// comments
			$this->comments->ViewValue = $this->comments->CurrentValue;
			$this->comments->ViewCustomAttributes = "";

			// priority
			$this->priority->ViewValue = $this->priority->CurrentValue;
			$this->priority->ViewCustomAttributes = "";

			// demorequest
			$this->demorequest->ViewValue = $this->demorequest->CurrentValue;
			$this->demorequest->ViewCustomAttributes = "";

			// partnercontact
			$this->partnercontact->ViewValue = $this->partnercontact->CurrentValue;
			$this->partnercontact->ViewCustomAttributes = "";

			// productversion
			$this->productversion->ViewValue = $this->productversion->CurrentValue;
			$this->productversion->ViewCustomAttributes = "";

			// product
			$this->product->ViewValue = $this->product->CurrentValue;
			$this->product->ViewCustomAttributes = "";

			// maildate
			$this->maildate->ViewValue = $this->maildate->CurrentValue;
			$this->maildate->ViewValue = FormatDateTime($this->maildate->ViewValue, 0);
			$this->maildate->ViewCustomAttributes = "";

			// nextstepdate
			$this->nextstepdate->ViewValue = $this->nextstepdate->CurrentValue;
			$this->nextstepdate->ViewValue = FormatDateTime($this->nextstepdate->ViewValue, 0);
			$this->nextstepdate->ViewCustomAttributes = "";

			// fundingsituation
			$this->fundingsituation->ViewValue = $this->fundingsituation->CurrentValue;
			$this->fundingsituation->ViewCustomAttributes = "";

			// purpose
			$this->purpose->ViewValue = $this->purpose->CurrentValue;
			$this->purpose->ViewCustomAttributes = "";

			// evaluationstatus
			$this->evaluationstatus->ViewValue = $this->evaluationstatus->CurrentValue;
			$this->evaluationstatus->ViewCustomAttributes = "";

			// transferdate
			$this->transferdate->ViewValue = $this->transferdate->CurrentValue;
			$this->transferdate->ViewValue = FormatDateTime($this->transferdate->ViewValue, 0);
			$this->transferdate->ViewCustomAttributes = "";

			// revenuetype
			$this->revenuetype->ViewValue = $this->revenuetype->CurrentValue;
			$this->revenuetype->ViewCustomAttributes = "";

			// noofemployees
			$this->noofemployees->ViewValue = $this->noofemployees->CurrentValue;
			$this->noofemployees->ViewValue = FormatNumber($this->noofemployees->ViewValue, 0, -2, -2, -2);
			$this->noofemployees->ViewCustomAttributes = "";

			// secondaryemail
			$this->secondaryemail->ViewValue = $this->secondaryemail->CurrentValue;
			$this->secondaryemail->ViewCustomAttributes = "";

			// noapprovalcalls
			$this->noapprovalcalls->ViewValue = $this->noapprovalcalls->CurrentValue;
			$this->noapprovalcalls->ViewValue = FormatNumber($this->noapprovalcalls->ViewValue, 0, -2, -2, -2);
			$this->noapprovalcalls->ViewCustomAttributes = "";

			// noapprovalemails
			$this->noapprovalemails->ViewValue = $this->noapprovalemails->CurrentValue;
			$this->noapprovalemails->ViewValue = FormatNumber($this->noapprovalemails->ViewValue, 0, -2, -2, -2);
			$this->noapprovalemails->ViewCustomAttributes = "";

			// vat_id
			$this->vat_id->ViewValue = $this->vat_id->CurrentValue;
			$this->vat_id->ViewCustomAttributes = "";

			// registration_number_1
			$this->registration_number_1->ViewValue = $this->registration_number_1->CurrentValue;
			$this->registration_number_1->ViewCustomAttributes = "";

			// registration_number_2
			$this->registration_number_2->ViewValue = $this->registration_number_2->CurrentValue;
			$this->registration_number_2->ViewCustomAttributes = "";

			// verification
			$this->verification->ViewValue = $this->verification->CurrentValue;
			$this->verification->ViewCustomAttributes = "";

			// subindustry
			$this->subindustry->ViewValue = $this->subindustry->CurrentValue;
			$this->subindustry->ViewCustomAttributes = "";

			// atenttion
			$this->atenttion->ViewValue = $this->atenttion->CurrentValue;
			$this->atenttion->ViewCustomAttributes = "";

			// leads_relation
			$this->leads_relation->ViewValue = $this->leads_relation->CurrentValue;
			$this->leads_relation->ViewCustomAttributes = "";

			// legal_form
			$this->legal_form->ViewValue = $this->legal_form->CurrentValue;
			$this->legal_form->ViewCustomAttributes = "";

			// sum_time
			$this->sum_time->ViewValue = $this->sum_time->CurrentValue;
			$this->sum_time->ViewValue = FormatNumber($this->sum_time->ViewValue, 2, -2, -2, -2);
			$this->sum_time->ViewCustomAttributes = "";

			// active
			$this->active->ViewValue = $this->active->CurrentValue;
			$this->active->ViewValue = FormatNumber($this->active->ViewValue, 0, -2, -2, -2);
			$this->active->ViewCustomAttributes = "";

			// leadid
			$this->leadid->LinkCustomAttributes = "";
			$this->leadid->HrefValue = "";
			$this->leadid->TooltipValue = "";

			// lead_no
			$this->lead_no->LinkCustomAttributes = "";
			$this->lead_no->HrefValue = "";
			$this->lead_no->TooltipValue = "";

			// email
			$this->_email->LinkCustomAttributes = "";
			$this->_email->HrefValue = "";
			$this->_email->TooltipValue = "";

			// interest
			$this->interest->LinkCustomAttributes = "";
			$this->interest->HrefValue = "";
			$this->interest->TooltipValue = "";

			// firstname
			$this->firstname->LinkCustomAttributes = "";
			$this->firstname->HrefValue = "";
			$this->firstname->TooltipValue = "";

			// salutation
			$this->salutation->LinkCustomAttributes = "";
			$this->salutation->HrefValue = "";
			$this->salutation->TooltipValue = "";

			// lastname
			$this->lastname->LinkCustomAttributes = "";
			$this->lastname->HrefValue = "";
			$this->lastname->TooltipValue = "";

			// company
			$this->company->LinkCustomAttributes = "";
			$this->company->HrefValue = "";
			$this->company->TooltipValue = "";

			// annualrevenue
			$this->annualrevenue->LinkCustomAttributes = "";
			$this->annualrevenue->HrefValue = "";
			$this->annualrevenue->TooltipValue = "";

			// industry
			$this->industry->LinkCustomAttributes = "";
			$this->industry->HrefValue = "";
			$this->industry->TooltipValue = "";

			// campaign
			$this->campaign->LinkCustomAttributes = "";
			$this->campaign->HrefValue = "";
			$this->campaign->TooltipValue = "";

			// leadstatus
			$this->leadstatus->LinkCustomAttributes = "";
			$this->leadstatus->HrefValue = "";
			$this->leadstatus->TooltipValue = "";

			// leadsource
			$this->leadsource->LinkCustomAttributes = "";
			$this->leadsource->HrefValue = "";
			$this->leadsource->TooltipValue = "";

			// converted
			$this->converted->LinkCustomAttributes = "";
			$this->converted->HrefValue = "";
			$this->converted->TooltipValue = "";

			// licencekeystatus
			$this->licencekeystatus->LinkCustomAttributes = "";
			$this->licencekeystatus->HrefValue = "";
			$this->licencekeystatus->TooltipValue = "";

			// space
			$this->space->LinkCustomAttributes = "";
			$this->space->HrefValue = "";
			$this->space->TooltipValue = "";

			// comments
			$this->comments->LinkCustomAttributes = "";
			$this->comments->HrefValue = "";
			$this->comments->TooltipValue = "";

			// priority
			$this->priority->LinkCustomAttributes = "";
			$this->priority->HrefValue = "";
			$this->priority->TooltipValue = "";

			// demorequest
			$this->demorequest->LinkCustomAttributes = "";
			$this->demorequest->HrefValue = "";
			$this->demorequest->TooltipValue = "";

			// partnercontact
			$this->partnercontact->LinkCustomAttributes = "";
			$this->partnercontact->HrefValue = "";
			$this->partnercontact->TooltipValue = "";

			// productversion
			$this->productversion->LinkCustomAttributes = "";
			$this->productversion->HrefValue = "";
			$this->productversion->TooltipValue = "";

			// product
			$this->product->LinkCustomAttributes = "";
			$this->product->HrefValue = "";
			$this->product->TooltipValue = "";

			// maildate
			$this->maildate->LinkCustomAttributes = "";
			$this->maildate->HrefValue = "";
			$this->maildate->TooltipValue = "";

			// nextstepdate
			$this->nextstepdate->LinkCustomAttributes = "";
			$this->nextstepdate->HrefValue = "";
			$this->nextstepdate->TooltipValue = "";

			// fundingsituation
			$this->fundingsituation->LinkCustomAttributes = "";
			$this->fundingsituation->HrefValue = "";
			$this->fundingsituation->TooltipValue = "";

			// purpose
			$this->purpose->LinkCustomAttributes = "";
			$this->purpose->HrefValue = "";
			$this->purpose->TooltipValue = "";

			// evaluationstatus
			$this->evaluationstatus->LinkCustomAttributes = "";
			$this->evaluationstatus->HrefValue = "";
			$this->evaluationstatus->TooltipValue = "";

			// transferdate
			$this->transferdate->LinkCustomAttributes = "";
			$this->transferdate->HrefValue = "";
			$this->transferdate->TooltipValue = "";

			// revenuetype
			$this->revenuetype->LinkCustomAttributes = "";
			$this->revenuetype->HrefValue = "";
			$this->revenuetype->TooltipValue = "";

			// noofemployees
			$this->noofemployees->LinkCustomAttributes = "";
			$this->noofemployees->HrefValue = "";
			$this->noofemployees->TooltipValue = "";

			// secondaryemail
			$this->secondaryemail->LinkCustomAttributes = "";
			$this->secondaryemail->HrefValue = "";
			$this->secondaryemail->TooltipValue = "";

			// noapprovalcalls
			$this->noapprovalcalls->LinkCustomAttributes = "";
			$this->noapprovalcalls->HrefValue = "";
			$this->noapprovalcalls->TooltipValue = "";

			// noapprovalemails
			$this->noapprovalemails->LinkCustomAttributes = "";
			$this->noapprovalemails->HrefValue = "";
			$this->noapprovalemails->TooltipValue = "";

			// vat_id
			$this->vat_id->LinkCustomAttributes = "";
			$this->vat_id->HrefValue = "";
			$this->vat_id->TooltipValue = "";

			// registration_number_1
			$this->registration_number_1->LinkCustomAttributes = "";
			$this->registration_number_1->HrefValue = "";
			$this->registration_number_1->TooltipValue = "";

			// registration_number_2
			$this->registration_number_2->LinkCustomAttributes = "";
			$this->registration_number_2->HrefValue = "";
			$this->registration_number_2->TooltipValue = "";

			// verification
			$this->verification->LinkCustomAttributes = "";
			$this->verification->HrefValue = "";
			$this->verification->TooltipValue = "";

			// subindustry
			$this->subindustry->LinkCustomAttributes = "";
			$this->subindustry->HrefValue = "";
			$this->subindustry->TooltipValue = "";

			// atenttion
			$this->atenttion->LinkCustomAttributes = "";
			$this->atenttion->HrefValue = "";
			$this->atenttion->TooltipValue = "";

			// leads_relation
			$this->leads_relation->LinkCustomAttributes = "";
			$this->leads_relation->HrefValue = "";
			$this->leads_relation->TooltipValue = "";

			// legal_form
			$this->legal_form->LinkCustomAttributes = "";
			$this->legal_form->HrefValue = "";
			$this->legal_form->TooltipValue = "";

			// sum_time
			$this->sum_time->LinkCustomAttributes = "";
			$this->sum_time->HrefValue = "";
			$this->sum_time->TooltipValue = "";

			// active
			$this->active->LinkCustomAttributes = "";
			$this->active->HrefValue = "";
			$this->active->TooltipValue = "";
		} elseif ($this->RowType == ROWTYPE_ADD) { // Add row

			// leadid
			$this->leadid->EditAttrs["class"] = "form-control";
			$this->leadid->EditCustomAttributes = "";
			$this->leadid->EditValue = HtmlEncode($this->leadid->CurrentValue);
			$this->leadid->PlaceHolder = RemoveHtml($this->leadid->caption());

			// lead_no
			$this->lead_no->EditAttrs["class"] = "form-control";
			$this->lead_no->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->lead_no->CurrentValue = HtmlDecode($this->lead_no->CurrentValue);
			$this->lead_no->EditValue = HtmlEncode($this->lead_no->CurrentValue);
			$this->lead_no->PlaceHolder = RemoveHtml($this->lead_no->caption());

			// email
			$this->_email->EditAttrs["class"] = "form-control";
			$this->_email->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->_email->CurrentValue = HtmlDecode($this->_email->CurrentValue);
			$this->_email->EditValue = HtmlEncode($this->_email->CurrentValue);
			$this->_email->PlaceHolder = RemoveHtml($this->_email->caption());

			// interest
			$this->interest->EditAttrs["class"] = "form-control";
			$this->interest->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->interest->CurrentValue = HtmlDecode($this->interest->CurrentValue);
			$this->interest->EditValue = HtmlEncode($this->interest->CurrentValue);
			$this->interest->PlaceHolder = RemoveHtml($this->interest->caption());

			// firstname
			$this->firstname->EditAttrs["class"] = "form-control";
			$this->firstname->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->firstname->CurrentValue = HtmlDecode($this->firstname->CurrentValue);
			$this->firstname->EditValue = HtmlEncode($this->firstname->CurrentValue);
			$this->firstname->PlaceHolder = RemoveHtml($this->firstname->caption());

			// salutation
			$this->salutation->EditAttrs["class"] = "form-control";
			$this->salutation->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->salutation->CurrentValue = HtmlDecode($this->salutation->CurrentValue);
			$this->salutation->EditValue = HtmlEncode($this->salutation->CurrentValue);
			$this->salutation->PlaceHolder = RemoveHtml($this->salutation->caption());

			// lastname
			$this->lastname->EditAttrs["class"] = "form-control";
			$this->lastname->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->lastname->CurrentValue = HtmlDecode($this->lastname->CurrentValue);
			$this->lastname->EditValue = HtmlEncode($this->lastname->CurrentValue);
			$this->lastname->PlaceHolder = RemoveHtml($this->lastname->caption());

			// company
			$this->company->EditAttrs["class"] = "form-control";
			$this->company->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->company->CurrentValue = HtmlDecode($this->company->CurrentValue);
			$this->company->EditValue = HtmlEncode($this->company->CurrentValue);
			$this->company->PlaceHolder = RemoveHtml($this->company->caption());

			// annualrevenue
			$this->annualrevenue->EditAttrs["class"] = "form-control";
			$this->annualrevenue->EditCustomAttributes = "";
			$this->annualrevenue->EditValue = HtmlEncode($this->annualrevenue->CurrentValue);
			$this->annualrevenue->PlaceHolder = RemoveHtml($this->annualrevenue->caption());
			if (strval($this->annualrevenue->EditValue) <> "" && is_numeric($this->annualrevenue->EditValue))
				$this->annualrevenue->EditValue = FormatNumber($this->annualrevenue->EditValue, -2, -2, -2, -2);

			// industry
			$this->industry->EditAttrs["class"] = "form-control";
			$this->industry->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->industry->CurrentValue = HtmlDecode($this->industry->CurrentValue);
			$this->industry->EditValue = HtmlEncode($this->industry->CurrentValue);
			$this->industry->PlaceHolder = RemoveHtml($this->industry->caption());

			// campaign
			$this->campaign->EditAttrs["class"] = "form-control";
			$this->campaign->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->campaign->CurrentValue = HtmlDecode($this->campaign->CurrentValue);
			$this->campaign->EditValue = HtmlEncode($this->campaign->CurrentValue);
			$this->campaign->PlaceHolder = RemoveHtml($this->campaign->caption());

			// leadstatus
			$this->leadstatus->EditAttrs["class"] = "form-control";
			$this->leadstatus->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->leadstatus->CurrentValue = HtmlDecode($this->leadstatus->CurrentValue);
			$this->leadstatus->EditValue = HtmlEncode($this->leadstatus->CurrentValue);
			$this->leadstatus->PlaceHolder = RemoveHtml($this->leadstatus->caption());

			// leadsource
			$this->leadsource->EditAttrs["class"] = "form-control";
			$this->leadsource->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->leadsource->CurrentValue = HtmlDecode($this->leadsource->CurrentValue);
			$this->leadsource->EditValue = HtmlEncode($this->leadsource->CurrentValue);
			$this->leadsource->PlaceHolder = RemoveHtml($this->leadsource->caption());

			// converted
			$this->converted->EditAttrs["class"] = "form-control";
			$this->converted->EditCustomAttributes = "";
			$this->converted->EditValue = HtmlEncode($this->converted->CurrentValue);
			$this->converted->PlaceHolder = RemoveHtml($this->converted->caption());

			// licencekeystatus
			$this->licencekeystatus->EditAttrs["class"] = "form-control";
			$this->licencekeystatus->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->licencekeystatus->CurrentValue = HtmlDecode($this->licencekeystatus->CurrentValue);
			$this->licencekeystatus->EditValue = HtmlEncode($this->licencekeystatus->CurrentValue);
			$this->licencekeystatus->PlaceHolder = RemoveHtml($this->licencekeystatus->caption());

			// space
			$this->space->EditAttrs["class"] = "form-control";
			$this->space->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->space->CurrentValue = HtmlDecode($this->space->CurrentValue);
			$this->space->EditValue = HtmlEncode($this->space->CurrentValue);
			$this->space->PlaceHolder = RemoveHtml($this->space->caption());

			// comments
			$this->comments->EditAttrs["class"] = "form-control";
			$this->comments->EditCustomAttributes = "";
			$this->comments->EditValue = HtmlEncode($this->comments->CurrentValue);
			$this->comments->PlaceHolder = RemoveHtml($this->comments->caption());

			// priority
			$this->priority->EditAttrs["class"] = "form-control";
			$this->priority->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->priority->CurrentValue = HtmlDecode($this->priority->CurrentValue);
			$this->priority->EditValue = HtmlEncode($this->priority->CurrentValue);
			$this->priority->PlaceHolder = RemoveHtml($this->priority->caption());

			// demorequest
			$this->demorequest->EditAttrs["class"] = "form-control";
			$this->demorequest->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->demorequest->CurrentValue = HtmlDecode($this->demorequest->CurrentValue);
			$this->demorequest->EditValue = HtmlEncode($this->demorequest->CurrentValue);
			$this->demorequest->PlaceHolder = RemoveHtml($this->demorequest->caption());

			// partnercontact
			$this->partnercontact->EditAttrs["class"] = "form-control";
			$this->partnercontact->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->partnercontact->CurrentValue = HtmlDecode($this->partnercontact->CurrentValue);
			$this->partnercontact->EditValue = HtmlEncode($this->partnercontact->CurrentValue);
			$this->partnercontact->PlaceHolder = RemoveHtml($this->partnercontact->caption());

			// productversion
			$this->productversion->EditAttrs["class"] = "form-control";
			$this->productversion->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->productversion->CurrentValue = HtmlDecode($this->productversion->CurrentValue);
			$this->productversion->EditValue = HtmlEncode($this->productversion->CurrentValue);
			$this->productversion->PlaceHolder = RemoveHtml($this->productversion->caption());

			// product
			$this->product->EditAttrs["class"] = "form-control";
			$this->product->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->product->CurrentValue = HtmlDecode($this->product->CurrentValue);
			$this->product->EditValue = HtmlEncode($this->product->CurrentValue);
			$this->product->PlaceHolder = RemoveHtml($this->product->caption());

			// maildate
			$this->maildate->EditAttrs["class"] = "form-control";
			$this->maildate->EditCustomAttributes = "";
			$this->maildate->EditValue = HtmlEncode(FormatDateTime($this->maildate->CurrentValue, 8));
			$this->maildate->PlaceHolder = RemoveHtml($this->maildate->caption());

			// nextstepdate
			$this->nextstepdate->EditAttrs["class"] = "form-control";
			$this->nextstepdate->EditCustomAttributes = "";
			$this->nextstepdate->EditValue = HtmlEncode(FormatDateTime($this->nextstepdate->CurrentValue, 8));
			$this->nextstepdate->PlaceHolder = RemoveHtml($this->nextstepdate->caption());

			// fundingsituation
			$this->fundingsituation->EditAttrs["class"] = "form-control";
			$this->fundingsituation->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->fundingsituation->CurrentValue = HtmlDecode($this->fundingsituation->CurrentValue);
			$this->fundingsituation->EditValue = HtmlEncode($this->fundingsituation->CurrentValue);
			$this->fundingsituation->PlaceHolder = RemoveHtml($this->fundingsituation->caption());

			// purpose
			$this->purpose->EditAttrs["class"] = "form-control";
			$this->purpose->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->purpose->CurrentValue = HtmlDecode($this->purpose->CurrentValue);
			$this->purpose->EditValue = HtmlEncode($this->purpose->CurrentValue);
			$this->purpose->PlaceHolder = RemoveHtml($this->purpose->caption());

			// evaluationstatus
			$this->evaluationstatus->EditAttrs["class"] = "form-control";
			$this->evaluationstatus->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->evaluationstatus->CurrentValue = HtmlDecode($this->evaluationstatus->CurrentValue);
			$this->evaluationstatus->EditValue = HtmlEncode($this->evaluationstatus->CurrentValue);
			$this->evaluationstatus->PlaceHolder = RemoveHtml($this->evaluationstatus->caption());

			// transferdate
			$this->transferdate->EditAttrs["class"] = "form-control";
			$this->transferdate->EditCustomAttributes = "";
			$this->transferdate->EditValue = HtmlEncode(FormatDateTime($this->transferdate->CurrentValue, 8));
			$this->transferdate->PlaceHolder = RemoveHtml($this->transferdate->caption());

			// revenuetype
			$this->revenuetype->EditAttrs["class"] = "form-control";
			$this->revenuetype->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->revenuetype->CurrentValue = HtmlDecode($this->revenuetype->CurrentValue);
			$this->revenuetype->EditValue = HtmlEncode($this->revenuetype->CurrentValue);
			$this->revenuetype->PlaceHolder = RemoveHtml($this->revenuetype->caption());

			// noofemployees
			$this->noofemployees->EditAttrs["class"] = "form-control";
			$this->noofemployees->EditCustomAttributes = "";
			$this->noofemployees->EditValue = HtmlEncode($this->noofemployees->CurrentValue);
			$this->noofemployees->PlaceHolder = RemoveHtml($this->noofemployees->caption());

			// secondaryemail
			$this->secondaryemail->EditAttrs["class"] = "form-control";
			$this->secondaryemail->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->secondaryemail->CurrentValue = HtmlDecode($this->secondaryemail->CurrentValue);
			$this->secondaryemail->EditValue = HtmlEncode($this->secondaryemail->CurrentValue);
			$this->secondaryemail->PlaceHolder = RemoveHtml($this->secondaryemail->caption());

			// noapprovalcalls
			$this->noapprovalcalls->EditAttrs["class"] = "form-control";
			$this->noapprovalcalls->EditCustomAttributes = "";
			$this->noapprovalcalls->EditValue = HtmlEncode($this->noapprovalcalls->CurrentValue);
			$this->noapprovalcalls->PlaceHolder = RemoveHtml($this->noapprovalcalls->caption());

			// noapprovalemails
			$this->noapprovalemails->EditAttrs["class"] = "form-control";
			$this->noapprovalemails->EditCustomAttributes = "";
			$this->noapprovalemails->EditValue = HtmlEncode($this->noapprovalemails->CurrentValue);
			$this->noapprovalemails->PlaceHolder = RemoveHtml($this->noapprovalemails->caption());

			// vat_id
			$this->vat_id->EditAttrs["class"] = "form-control";
			$this->vat_id->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->vat_id->CurrentValue = HtmlDecode($this->vat_id->CurrentValue);
			$this->vat_id->EditValue = HtmlEncode($this->vat_id->CurrentValue);
			$this->vat_id->PlaceHolder = RemoveHtml($this->vat_id->caption());

			// registration_number_1
			$this->registration_number_1->EditAttrs["class"] = "form-control";
			$this->registration_number_1->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->registration_number_1->CurrentValue = HtmlDecode($this->registration_number_1->CurrentValue);
			$this->registration_number_1->EditValue = HtmlEncode($this->registration_number_1->CurrentValue);
			$this->registration_number_1->PlaceHolder = RemoveHtml($this->registration_number_1->caption());

			// registration_number_2
			$this->registration_number_2->EditAttrs["class"] = "form-control";
			$this->registration_number_2->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->registration_number_2->CurrentValue = HtmlDecode($this->registration_number_2->CurrentValue);
			$this->registration_number_2->EditValue = HtmlEncode($this->registration_number_2->CurrentValue);
			$this->registration_number_2->PlaceHolder = RemoveHtml($this->registration_number_2->caption());

			// verification
			$this->verification->EditAttrs["class"] = "form-control";
			$this->verification->EditCustomAttributes = "";
			$this->verification->EditValue = HtmlEncode($this->verification->CurrentValue);
			$this->verification->PlaceHolder = RemoveHtml($this->verification->caption());

			// subindustry
			$this->subindustry->EditAttrs["class"] = "form-control";
			$this->subindustry->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->subindustry->CurrentValue = HtmlDecode($this->subindustry->CurrentValue);
			$this->subindustry->EditValue = HtmlEncode($this->subindustry->CurrentValue);
			$this->subindustry->PlaceHolder = RemoveHtml($this->subindustry->caption());

			// atenttion
			$this->atenttion->EditAttrs["class"] = "form-control";
			$this->atenttion->EditCustomAttributes = "";
			$this->atenttion->EditValue = HtmlEncode($this->atenttion->CurrentValue);
			$this->atenttion->PlaceHolder = RemoveHtml($this->atenttion->caption());

			// leads_relation
			$this->leads_relation->EditAttrs["class"] = "form-control";
			$this->leads_relation->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->leads_relation->CurrentValue = HtmlDecode($this->leads_relation->CurrentValue);
			$this->leads_relation->EditValue = HtmlEncode($this->leads_relation->CurrentValue);
			$this->leads_relation->PlaceHolder = RemoveHtml($this->leads_relation->caption());

			// legal_form
			$this->legal_form->EditAttrs["class"] = "form-control";
			$this->legal_form->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->legal_form->CurrentValue = HtmlDecode($this->legal_form->CurrentValue);
			$this->legal_form->EditValue = HtmlEncode($this->legal_form->CurrentValue);
			$this->legal_form->PlaceHolder = RemoveHtml($this->legal_form->caption());

			// sum_time
			$this->sum_time->EditAttrs["class"] = "form-control";
			$this->sum_time->EditCustomAttributes = "";
			$this->sum_time->EditValue = HtmlEncode($this->sum_time->CurrentValue);
			$this->sum_time->PlaceHolder = RemoveHtml($this->sum_time->caption());
			if (strval($this->sum_time->EditValue) <> "" && is_numeric($this->sum_time->EditValue))
				$this->sum_time->EditValue = FormatNumber($this->sum_time->EditValue, -2, -2, -2, -2);

			// active
			$this->active->EditAttrs["class"] = "form-control";
			$this->active->EditCustomAttributes = "";
			$this->active->EditValue = HtmlEncode($this->active->CurrentValue);
			$this->active->PlaceHolder = RemoveHtml($this->active->caption());

			// Add refer script
			// leadid

			$this->leadid->LinkCustomAttributes = "";
			$this->leadid->HrefValue = "";

			// lead_no
			$this->lead_no->LinkCustomAttributes = "";
			$this->lead_no->HrefValue = "";

			// email
			$this->_email->LinkCustomAttributes = "";
			$this->_email->HrefValue = "";

			// interest
			$this->interest->LinkCustomAttributes = "";
			$this->interest->HrefValue = "";

			// firstname
			$this->firstname->LinkCustomAttributes = "";
			$this->firstname->HrefValue = "";

			// salutation
			$this->salutation->LinkCustomAttributes = "";
			$this->salutation->HrefValue = "";

			// lastname
			$this->lastname->LinkCustomAttributes = "";
			$this->lastname->HrefValue = "";

			// company
			$this->company->LinkCustomAttributes = "";
			$this->company->HrefValue = "";

			// annualrevenue
			$this->annualrevenue->LinkCustomAttributes = "";
			$this->annualrevenue->HrefValue = "";

			// industry
			$this->industry->LinkCustomAttributes = "";
			$this->industry->HrefValue = "";

			// campaign
			$this->campaign->LinkCustomAttributes = "";
			$this->campaign->HrefValue = "";

			// leadstatus
			$this->leadstatus->LinkCustomAttributes = "";
			$this->leadstatus->HrefValue = "";

			// leadsource
			$this->leadsource->LinkCustomAttributes = "";
			$this->leadsource->HrefValue = "";

			// converted
			$this->converted->LinkCustomAttributes = "";
			$this->converted->HrefValue = "";

			// licencekeystatus
			$this->licencekeystatus->LinkCustomAttributes = "";
			$this->licencekeystatus->HrefValue = "";

			// space
			$this->space->LinkCustomAttributes = "";
			$this->space->HrefValue = "";

			// comments
			$this->comments->LinkCustomAttributes = "";
			$this->comments->HrefValue = "";

			// priority
			$this->priority->LinkCustomAttributes = "";
			$this->priority->HrefValue = "";

			// demorequest
			$this->demorequest->LinkCustomAttributes = "";
			$this->demorequest->HrefValue = "";

			// partnercontact
			$this->partnercontact->LinkCustomAttributes = "";
			$this->partnercontact->HrefValue = "";

			// productversion
			$this->productversion->LinkCustomAttributes = "";
			$this->productversion->HrefValue = "";

			// product
			$this->product->LinkCustomAttributes = "";
			$this->product->HrefValue = "";

			// maildate
			$this->maildate->LinkCustomAttributes = "";
			$this->maildate->HrefValue = "";

			// nextstepdate
			$this->nextstepdate->LinkCustomAttributes = "";
			$this->nextstepdate->HrefValue = "";

			// fundingsituation
			$this->fundingsituation->LinkCustomAttributes = "";
			$this->fundingsituation->HrefValue = "";

			// purpose
			$this->purpose->LinkCustomAttributes = "";
			$this->purpose->HrefValue = "";

			// evaluationstatus
			$this->evaluationstatus->LinkCustomAttributes = "";
			$this->evaluationstatus->HrefValue = "";

			// transferdate
			$this->transferdate->LinkCustomAttributes = "";
			$this->transferdate->HrefValue = "";

			// revenuetype
			$this->revenuetype->LinkCustomAttributes = "";
			$this->revenuetype->HrefValue = "";

			// noofemployees
			$this->noofemployees->LinkCustomAttributes = "";
			$this->noofemployees->HrefValue = "";

			// secondaryemail
			$this->secondaryemail->LinkCustomAttributes = "";
			$this->secondaryemail->HrefValue = "";

			// noapprovalcalls
			$this->noapprovalcalls->LinkCustomAttributes = "";
			$this->noapprovalcalls->HrefValue = "";

			// noapprovalemails
			$this->noapprovalemails->LinkCustomAttributes = "";
			$this->noapprovalemails->HrefValue = "";

			// vat_id
			$this->vat_id->LinkCustomAttributes = "";
			$this->vat_id->HrefValue = "";

			// registration_number_1
			$this->registration_number_1->LinkCustomAttributes = "";
			$this->registration_number_1->HrefValue = "";

			// registration_number_2
			$this->registration_number_2->LinkCustomAttributes = "";
			$this->registration_number_2->HrefValue = "";

			// verification
			$this->verification->LinkCustomAttributes = "";
			$this->verification->HrefValue = "";

			// subindustry
			$this->subindustry->LinkCustomAttributes = "";
			$this->subindustry->HrefValue = "";

			// atenttion
			$this->atenttion->LinkCustomAttributes = "";
			$this->atenttion->HrefValue = "";

			// leads_relation
			$this->leads_relation->LinkCustomAttributes = "";
			$this->leads_relation->HrefValue = "";

			// legal_form
			$this->legal_form->LinkCustomAttributes = "";
			$this->legal_form->HrefValue = "";

			// sum_time
			$this->sum_time->LinkCustomAttributes = "";
			$this->sum_time->HrefValue = "";

			// active
			$this->active->LinkCustomAttributes = "";
			$this->active->HrefValue = "";
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
		if ($this->leadid->Required) {
			if (!$this->leadid->IsDetailKey && $this->leadid->FormValue != NULL && $this->leadid->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->leadid->caption(), $this->leadid->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->leadid->FormValue)) {
			AddMessage($FormError, $this->leadid->errorMessage());
		}
		if ($this->lead_no->Required) {
			if (!$this->lead_no->IsDetailKey && $this->lead_no->FormValue != NULL && $this->lead_no->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->lead_no->caption(), $this->lead_no->RequiredErrorMessage));
			}
		}
		if ($this->_email->Required) {
			if (!$this->_email->IsDetailKey && $this->_email->FormValue != NULL && $this->_email->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->_email->caption(), $this->_email->RequiredErrorMessage));
			}
		}
		if ($this->interest->Required) {
			if (!$this->interest->IsDetailKey && $this->interest->FormValue != NULL && $this->interest->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->interest->caption(), $this->interest->RequiredErrorMessage));
			}
		}
		if ($this->firstname->Required) {
			if (!$this->firstname->IsDetailKey && $this->firstname->FormValue != NULL && $this->firstname->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->firstname->caption(), $this->firstname->RequiredErrorMessage));
			}
		}
		if ($this->salutation->Required) {
			if (!$this->salutation->IsDetailKey && $this->salutation->FormValue != NULL && $this->salutation->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->salutation->caption(), $this->salutation->RequiredErrorMessage));
			}
		}
		if ($this->lastname->Required) {
			if (!$this->lastname->IsDetailKey && $this->lastname->FormValue != NULL && $this->lastname->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->lastname->caption(), $this->lastname->RequiredErrorMessage));
			}
		}
		if ($this->company->Required) {
			if (!$this->company->IsDetailKey && $this->company->FormValue != NULL && $this->company->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->company->caption(), $this->company->RequiredErrorMessage));
			}
		}
		if ($this->annualrevenue->Required) {
			if (!$this->annualrevenue->IsDetailKey && $this->annualrevenue->FormValue != NULL && $this->annualrevenue->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->annualrevenue->caption(), $this->annualrevenue->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->annualrevenue->FormValue)) {
			AddMessage($FormError, $this->annualrevenue->errorMessage());
		}
		if ($this->industry->Required) {
			if (!$this->industry->IsDetailKey && $this->industry->FormValue != NULL && $this->industry->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->industry->caption(), $this->industry->RequiredErrorMessage));
			}
		}
		if ($this->campaign->Required) {
			if (!$this->campaign->IsDetailKey && $this->campaign->FormValue != NULL && $this->campaign->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->campaign->caption(), $this->campaign->RequiredErrorMessage));
			}
		}
		if ($this->leadstatus->Required) {
			if (!$this->leadstatus->IsDetailKey && $this->leadstatus->FormValue != NULL && $this->leadstatus->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->leadstatus->caption(), $this->leadstatus->RequiredErrorMessage));
			}
		}
		if ($this->leadsource->Required) {
			if (!$this->leadsource->IsDetailKey && $this->leadsource->FormValue != NULL && $this->leadsource->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->leadsource->caption(), $this->leadsource->RequiredErrorMessage));
			}
		}
		if ($this->converted->Required) {
			if (!$this->converted->IsDetailKey && $this->converted->FormValue != NULL && $this->converted->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->converted->caption(), $this->converted->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->converted->FormValue)) {
			AddMessage($FormError, $this->converted->errorMessage());
		}
		if ($this->licencekeystatus->Required) {
			if (!$this->licencekeystatus->IsDetailKey && $this->licencekeystatus->FormValue != NULL && $this->licencekeystatus->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->licencekeystatus->caption(), $this->licencekeystatus->RequiredErrorMessage));
			}
		}
		if ($this->space->Required) {
			if (!$this->space->IsDetailKey && $this->space->FormValue != NULL && $this->space->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->space->caption(), $this->space->RequiredErrorMessage));
			}
		}
		if ($this->comments->Required) {
			if (!$this->comments->IsDetailKey && $this->comments->FormValue != NULL && $this->comments->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->comments->caption(), $this->comments->RequiredErrorMessage));
			}
		}
		if ($this->priority->Required) {
			if (!$this->priority->IsDetailKey && $this->priority->FormValue != NULL && $this->priority->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->priority->caption(), $this->priority->RequiredErrorMessage));
			}
		}
		if ($this->demorequest->Required) {
			if (!$this->demorequest->IsDetailKey && $this->demorequest->FormValue != NULL && $this->demorequest->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->demorequest->caption(), $this->demorequest->RequiredErrorMessage));
			}
		}
		if ($this->partnercontact->Required) {
			if (!$this->partnercontact->IsDetailKey && $this->partnercontact->FormValue != NULL && $this->partnercontact->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->partnercontact->caption(), $this->partnercontact->RequiredErrorMessage));
			}
		}
		if ($this->productversion->Required) {
			if (!$this->productversion->IsDetailKey && $this->productversion->FormValue != NULL && $this->productversion->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->productversion->caption(), $this->productversion->RequiredErrorMessage));
			}
		}
		if ($this->product->Required) {
			if (!$this->product->IsDetailKey && $this->product->FormValue != NULL && $this->product->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->product->caption(), $this->product->RequiredErrorMessage));
			}
		}
		if ($this->maildate->Required) {
			if (!$this->maildate->IsDetailKey && $this->maildate->FormValue != NULL && $this->maildate->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->maildate->caption(), $this->maildate->RequiredErrorMessage));
			}
		}
		if (!CheckDate($this->maildate->FormValue)) {
			AddMessage($FormError, $this->maildate->errorMessage());
		}
		if ($this->nextstepdate->Required) {
			if (!$this->nextstepdate->IsDetailKey && $this->nextstepdate->FormValue != NULL && $this->nextstepdate->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->nextstepdate->caption(), $this->nextstepdate->RequiredErrorMessage));
			}
		}
		if (!CheckDate($this->nextstepdate->FormValue)) {
			AddMessage($FormError, $this->nextstepdate->errorMessage());
		}
		if ($this->fundingsituation->Required) {
			if (!$this->fundingsituation->IsDetailKey && $this->fundingsituation->FormValue != NULL && $this->fundingsituation->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->fundingsituation->caption(), $this->fundingsituation->RequiredErrorMessage));
			}
		}
		if ($this->purpose->Required) {
			if (!$this->purpose->IsDetailKey && $this->purpose->FormValue != NULL && $this->purpose->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->purpose->caption(), $this->purpose->RequiredErrorMessage));
			}
		}
		if ($this->evaluationstatus->Required) {
			if (!$this->evaluationstatus->IsDetailKey && $this->evaluationstatus->FormValue != NULL && $this->evaluationstatus->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->evaluationstatus->caption(), $this->evaluationstatus->RequiredErrorMessage));
			}
		}
		if ($this->transferdate->Required) {
			if (!$this->transferdate->IsDetailKey && $this->transferdate->FormValue != NULL && $this->transferdate->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->transferdate->caption(), $this->transferdate->RequiredErrorMessage));
			}
		}
		if (!CheckDate($this->transferdate->FormValue)) {
			AddMessage($FormError, $this->transferdate->errorMessage());
		}
		if ($this->revenuetype->Required) {
			if (!$this->revenuetype->IsDetailKey && $this->revenuetype->FormValue != NULL && $this->revenuetype->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->revenuetype->caption(), $this->revenuetype->RequiredErrorMessage));
			}
		}
		if ($this->noofemployees->Required) {
			if (!$this->noofemployees->IsDetailKey && $this->noofemployees->FormValue != NULL && $this->noofemployees->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->noofemployees->caption(), $this->noofemployees->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->noofemployees->FormValue)) {
			AddMessage($FormError, $this->noofemployees->errorMessage());
		}
		if ($this->secondaryemail->Required) {
			if (!$this->secondaryemail->IsDetailKey && $this->secondaryemail->FormValue != NULL && $this->secondaryemail->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->secondaryemail->caption(), $this->secondaryemail->RequiredErrorMessage));
			}
		}
		if ($this->noapprovalcalls->Required) {
			if (!$this->noapprovalcalls->IsDetailKey && $this->noapprovalcalls->FormValue != NULL && $this->noapprovalcalls->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->noapprovalcalls->caption(), $this->noapprovalcalls->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->noapprovalcalls->FormValue)) {
			AddMessage($FormError, $this->noapprovalcalls->errorMessage());
		}
		if ($this->noapprovalemails->Required) {
			if (!$this->noapprovalemails->IsDetailKey && $this->noapprovalemails->FormValue != NULL && $this->noapprovalemails->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->noapprovalemails->caption(), $this->noapprovalemails->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->noapprovalemails->FormValue)) {
			AddMessage($FormError, $this->noapprovalemails->errorMessage());
		}
		if ($this->vat_id->Required) {
			if (!$this->vat_id->IsDetailKey && $this->vat_id->FormValue != NULL && $this->vat_id->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->vat_id->caption(), $this->vat_id->RequiredErrorMessage));
			}
		}
		if ($this->registration_number_1->Required) {
			if (!$this->registration_number_1->IsDetailKey && $this->registration_number_1->FormValue != NULL && $this->registration_number_1->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->registration_number_1->caption(), $this->registration_number_1->RequiredErrorMessage));
			}
		}
		if ($this->registration_number_2->Required) {
			if (!$this->registration_number_2->IsDetailKey && $this->registration_number_2->FormValue != NULL && $this->registration_number_2->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->registration_number_2->caption(), $this->registration_number_2->RequiredErrorMessage));
			}
		}
		if ($this->verification->Required) {
			if (!$this->verification->IsDetailKey && $this->verification->FormValue != NULL && $this->verification->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->verification->caption(), $this->verification->RequiredErrorMessage));
			}
		}
		if ($this->subindustry->Required) {
			if (!$this->subindustry->IsDetailKey && $this->subindustry->FormValue != NULL && $this->subindustry->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->subindustry->caption(), $this->subindustry->RequiredErrorMessage));
			}
		}
		if ($this->atenttion->Required) {
			if (!$this->atenttion->IsDetailKey && $this->atenttion->FormValue != NULL && $this->atenttion->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->atenttion->caption(), $this->atenttion->RequiredErrorMessage));
			}
		}
		if ($this->leads_relation->Required) {
			if (!$this->leads_relation->IsDetailKey && $this->leads_relation->FormValue != NULL && $this->leads_relation->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->leads_relation->caption(), $this->leads_relation->RequiredErrorMessage));
			}
		}
		if ($this->legal_form->Required) {
			if (!$this->legal_form->IsDetailKey && $this->legal_form->FormValue != NULL && $this->legal_form->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->legal_form->caption(), $this->legal_form->RequiredErrorMessage));
			}
		}
		if ($this->sum_time->Required) {
			if (!$this->sum_time->IsDetailKey && $this->sum_time->FormValue != NULL && $this->sum_time->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->sum_time->caption(), $this->sum_time->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->sum_time->FormValue)) {
			AddMessage($FormError, $this->sum_time->errorMessage());
		}
		if ($this->active->Required) {
			if (!$this->active->IsDetailKey && $this->active->FormValue != NULL && $this->active->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->active->caption(), $this->active->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->active->FormValue)) {
			AddMessage($FormError, $this->active->errorMessage());
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

		// leadid
		$this->leadid->setDbValueDef($rsnew, $this->leadid->CurrentValue, 0, FALSE);

		// lead_no
		$this->lead_no->setDbValueDef($rsnew, $this->lead_no->CurrentValue, "", FALSE);

		// email
		$this->_email->setDbValueDef($rsnew, $this->_email->CurrentValue, NULL, FALSE);

		// interest
		$this->interest->setDbValueDef($rsnew, $this->interest->CurrentValue, NULL, FALSE);

		// firstname
		$this->firstname->setDbValueDef($rsnew, $this->firstname->CurrentValue, NULL, FALSE);

		// salutation
		$this->salutation->setDbValueDef($rsnew, $this->salutation->CurrentValue, NULL, FALSE);

		// lastname
		$this->lastname->setDbValueDef($rsnew, $this->lastname->CurrentValue, NULL, FALSE);

		// company
		$this->company->setDbValueDef($rsnew, $this->company->CurrentValue, "", FALSE);

		// annualrevenue
		$this->annualrevenue->setDbValueDef($rsnew, $this->annualrevenue->CurrentValue, NULL, FALSE);

		// industry
		$this->industry->setDbValueDef($rsnew, $this->industry->CurrentValue, NULL, FALSE);

		// campaign
		$this->campaign->setDbValueDef($rsnew, $this->campaign->CurrentValue, NULL, FALSE);

		// leadstatus
		$this->leadstatus->setDbValueDef($rsnew, $this->leadstatus->CurrentValue, NULL, FALSE);

		// leadsource
		$this->leadsource->setDbValueDef($rsnew, $this->leadsource->CurrentValue, NULL, FALSE);

		// converted
		$this->converted->setDbValueDef($rsnew, $this->converted->CurrentValue, 0, strval($this->converted->CurrentValue) == "");

		// licencekeystatus
		$this->licencekeystatus->setDbValueDef($rsnew, $this->licencekeystatus->CurrentValue, NULL, FALSE);

		// space
		$this->space->setDbValueDef($rsnew, $this->space->CurrentValue, NULL, FALSE);

		// comments
		$this->comments->setDbValueDef($rsnew, $this->comments->CurrentValue, NULL, FALSE);

		// priority
		$this->priority->setDbValueDef($rsnew, $this->priority->CurrentValue, NULL, FALSE);

		// demorequest
		$this->demorequest->setDbValueDef($rsnew, $this->demorequest->CurrentValue, NULL, FALSE);

		// partnercontact
		$this->partnercontact->setDbValueDef($rsnew, $this->partnercontact->CurrentValue, NULL, FALSE);

		// productversion
		$this->productversion->setDbValueDef($rsnew, $this->productversion->CurrentValue, NULL, FALSE);

		// product
		$this->product->setDbValueDef($rsnew, $this->product->CurrentValue, NULL, FALSE);

		// maildate
		$this->maildate->setDbValueDef($rsnew, UnFormatDateTime($this->maildate->CurrentValue, 0), NULL, FALSE);

		// nextstepdate
		$this->nextstepdate->setDbValueDef($rsnew, UnFormatDateTime($this->nextstepdate->CurrentValue, 0), NULL, FALSE);

		// fundingsituation
		$this->fundingsituation->setDbValueDef($rsnew, $this->fundingsituation->CurrentValue, NULL, FALSE);

		// purpose
		$this->purpose->setDbValueDef($rsnew, $this->purpose->CurrentValue, NULL, FALSE);

		// evaluationstatus
		$this->evaluationstatus->setDbValueDef($rsnew, $this->evaluationstatus->CurrentValue, NULL, FALSE);

		// transferdate
		$this->transferdate->setDbValueDef($rsnew, UnFormatDateTime($this->transferdate->CurrentValue, 0), NULL, FALSE);

		// revenuetype
		$this->revenuetype->setDbValueDef($rsnew, $this->revenuetype->CurrentValue, NULL, FALSE);

		// noofemployees
		$this->noofemployees->setDbValueDef($rsnew, $this->noofemployees->CurrentValue, NULL, FALSE);

		// secondaryemail
		$this->secondaryemail->setDbValueDef($rsnew, $this->secondaryemail->CurrentValue, NULL, FALSE);

		// noapprovalcalls
		$this->noapprovalcalls->setDbValueDef($rsnew, $this->noapprovalcalls->CurrentValue, NULL, FALSE);

		// noapprovalemails
		$this->noapprovalemails->setDbValueDef($rsnew, $this->noapprovalemails->CurrentValue, NULL, FALSE);

		// vat_id
		$this->vat_id->setDbValueDef($rsnew, $this->vat_id->CurrentValue, NULL, FALSE);

		// registration_number_1
		$this->registration_number_1->setDbValueDef($rsnew, $this->registration_number_1->CurrentValue, NULL, FALSE);

		// registration_number_2
		$this->registration_number_2->setDbValueDef($rsnew, $this->registration_number_2->CurrentValue, NULL, FALSE);

		// verification
		$this->verification->setDbValueDef($rsnew, $this->verification->CurrentValue, NULL, FALSE);

		// subindustry
		$this->subindustry->setDbValueDef($rsnew, $this->subindustry->CurrentValue, NULL, FALSE);

		// atenttion
		$this->atenttion->setDbValueDef($rsnew, $this->atenttion->CurrentValue, NULL, FALSE);

		// leads_relation
		$this->leads_relation->setDbValueDef($rsnew, $this->leads_relation->CurrentValue, NULL, FALSE);

		// legal_form
		$this->legal_form->setDbValueDef($rsnew, $this->legal_form->CurrentValue, NULL, FALSE);

		// sum_time
		$this->sum_time->setDbValueDef($rsnew, $this->sum_time->CurrentValue, NULL, strval($this->sum_time->CurrentValue) == "");

		// active
		$this->active->setDbValueDef($rsnew, $this->active->CurrentValue, NULL, strval($this->active->CurrentValue) == "");

		// Call Row Inserting event
		$rs = ($rsold) ? $rsold->fields : NULL;
		$insertRow = $this->Row_Inserting($rs, $rsnew);

		// Check if key value entered
		if ($insertRow && $this->ValidateKey && strval($rsnew['leadid']) == "") {
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
		$Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("crm_leaddetailslist.php"), "", $this->TableVar, TRUE);
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
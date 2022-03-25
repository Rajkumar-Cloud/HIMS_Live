<?php
namespace PHPMaker2019\HIMS;

/**
 * Page class
 */
class patient_follow_up_add extends patient_follow_up
{

	// Page ID
	public $PageID = "add";

	// Project ID
	public $ProjectID = "{EA4F6D13-AF8F-428D-9EA7-BA88D1107EC3}";

	// Table name
	public $TableName = 'patient_follow_up';

	// Page object name
	public $PageObjName = "patient_follow_up_add";

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

		// Table object (patient_follow_up)
		if (!isset($GLOBALS["patient_follow_up"]) || get_class($GLOBALS["patient_follow_up"]) == PROJECT_NAMESPACE . "patient_follow_up") {
			$GLOBALS["patient_follow_up"] = &$this;
			$GLOBALS["Table"] = &$GLOBALS["patient_follow_up"];
		}
		$this->CancelUrl = $this->pageUrl() . "action=cancel";

		// Table object (user_login)
		if (!isset($GLOBALS['user_login']))
			$GLOBALS['user_login'] = new user_login();

		// Table object (ip_admission)
		if (!isset($GLOBALS['ip_admission']))
			$GLOBALS['ip_admission'] = new ip_admission();

		// Page ID
		if (!defined(PROJECT_NAMESPACE . "PAGE_ID"))
			define(PROJECT_NAMESPACE . "PAGE_ID", 'add');

		// Table name (for backward compatibility)
		if (!defined(PROJECT_NAMESPACE . "TABLE_NAME"))
			define(PROJECT_NAMESPACE . "TABLE_NAME", 'patient_follow_up');

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
		global $EXPORT, $patient_follow_up;
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
				$doc = new $class($patient_follow_up);
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
					if ($pageName == "patient_follow_upview.php")
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
					$this->terminate(GetUrl("patient_follow_uplist.php"));
				else
					$this->terminate(GetUrl("login.php"));
				return;
			}
		}

		// Create form object
		$CurrentForm = new HttpForm();
		$this->CurrentAction = Param("action"); // Set up current action
		$this->id->Visible = FALSE;
		$this->PatID->setVisibility();
		$this->PatientName->setVisibility();
		$this->MobileNumber->setVisibility();
		$this->mrnno->setVisibility();
		$this->BP->setVisibility();
		$this->Pulse->setVisibility();
		$this->Resp->setVisibility();
		$this->SPO2->setVisibility();
		$this->FollowupAdvice->setVisibility();
		$this->NextReviewDate->setVisibility();
		$this->Age->setVisibility();
		$this->Gender->setVisibility();
		$this->profilePic->setVisibility();
		$this->Template->setVisibility();
		$this->courseinhospital->setVisibility();
		$this->procedurenotes->setVisibility();
		$this->conditionatdischarge->setVisibility();
		$this->Template1->setVisibility();
		$this->Template2->setVisibility();
		$this->Template3->setVisibility();
		$this->HospID->setVisibility();
		$this->Reception->setVisibility();
		$this->PatientId->setVisibility();
		$this->PatientSearch->setVisibility();
		$this->DischargeAdviceMedicine->setVisibility();
		$this->DischargeAdviceMedicineTemplate->setVisibility();
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
		$this->setupLookupOptions($this->Template);
		$this->setupLookupOptions($this->Template1);
		$this->setupLookupOptions($this->Template2);
		$this->setupLookupOptions($this->Template3);
		$this->setupLookupOptions($this->PatientSearch);
		$this->setupLookupOptions($this->DischargeAdviceMedicineTemplate);

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

		// Set up master/detail parameters
		// NOTE: must be after loadOldRecord to prevent master key values overwritten

		$this->setupMasterParms();

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
					$this->terminate("patient_follow_uplist.php"); // No matching record, return to list
				}
				break;
			case "insert": // Add new record
				$this->SendEmail = TRUE; // Send email on add success
				if ($this->addRow($this->OldRecordset)) { // Add successful
					if ($this->getSuccessMessage() == "")
						$this->setSuccessMessage($Language->phrase("AddSuccess")); // Set up success message
					$returnUrl = $this->getReturnUrl();
					if (GetPageName($returnUrl) == "patient_follow_uplist.php")
						$returnUrl = $this->addMasterUrl($returnUrl); // List page, return to List page with correct master key if necessary
					elseif (GetPageName($returnUrl) == "patient_follow_upview.php")
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
		$this->PatID->CurrentValue = NULL;
		$this->PatID->OldValue = $this->PatID->CurrentValue;
		$this->PatientName->CurrentValue = NULL;
		$this->PatientName->OldValue = $this->PatientName->CurrentValue;
		$this->MobileNumber->CurrentValue = NULL;
		$this->MobileNumber->OldValue = $this->MobileNumber->CurrentValue;
		$this->mrnno->CurrentValue = NULL;
		$this->mrnno->OldValue = $this->mrnno->CurrentValue;
		$this->BP->CurrentValue = NULL;
		$this->BP->OldValue = $this->BP->CurrentValue;
		$this->Pulse->CurrentValue = NULL;
		$this->Pulse->OldValue = $this->Pulse->CurrentValue;
		$this->Resp->CurrentValue = NULL;
		$this->Resp->OldValue = $this->Resp->CurrentValue;
		$this->SPO2->CurrentValue = NULL;
		$this->SPO2->OldValue = $this->SPO2->CurrentValue;
		$this->FollowupAdvice->CurrentValue = NULL;
		$this->FollowupAdvice->OldValue = $this->FollowupAdvice->CurrentValue;
		$this->NextReviewDate->CurrentValue = NULL;
		$this->NextReviewDate->OldValue = $this->NextReviewDate->CurrentValue;
		$this->Age->CurrentValue = NULL;
		$this->Age->OldValue = $this->Age->CurrentValue;
		$this->Gender->CurrentValue = NULL;
		$this->Gender->OldValue = $this->Gender->CurrentValue;
		$this->profilePic->CurrentValue = NULL;
		$this->profilePic->OldValue = $this->profilePic->CurrentValue;
		$this->Template->CurrentValue = NULL;
		$this->Template->OldValue = $this->Template->CurrentValue;
		$this->courseinhospital->CurrentValue = NULL;
		$this->courseinhospital->OldValue = $this->courseinhospital->CurrentValue;
		$this->procedurenotes->CurrentValue = NULL;
		$this->procedurenotes->OldValue = $this->procedurenotes->CurrentValue;
		$this->conditionatdischarge->CurrentValue = NULL;
		$this->conditionatdischarge->OldValue = $this->conditionatdischarge->CurrentValue;
		$this->Template1->CurrentValue = NULL;
		$this->Template1->OldValue = $this->Template1->CurrentValue;
		$this->Template2->CurrentValue = NULL;
		$this->Template2->OldValue = $this->Template2->CurrentValue;
		$this->Template3->CurrentValue = NULL;
		$this->Template3->OldValue = $this->Template3->CurrentValue;
		$this->HospID->CurrentValue = NULL;
		$this->HospID->OldValue = $this->HospID->CurrentValue;
		$this->Reception->CurrentValue = NULL;
		$this->Reception->OldValue = $this->Reception->CurrentValue;
		$this->PatientId->CurrentValue = NULL;
		$this->PatientId->OldValue = $this->PatientId->CurrentValue;
		$this->PatientSearch->CurrentValue = NULL;
		$this->PatientSearch->OldValue = $this->PatientSearch->CurrentValue;
		$this->DischargeAdviceMedicine->CurrentValue = NULL;
		$this->DischargeAdviceMedicine->OldValue = $this->DischargeAdviceMedicine->CurrentValue;
		$this->DischargeAdviceMedicineTemplate->CurrentValue = NULL;
		$this->DischargeAdviceMedicineTemplate->OldValue = $this->DischargeAdviceMedicineTemplate->CurrentValue;
	}

	// Load form values
	protected function loadFormValues()
	{

		// Load from form
		global $CurrentForm;

		// Check field name 'PatID' first before field var 'x_PatID'
		$val = $CurrentForm->hasValue("PatID") ? $CurrentForm->getValue("PatID") : $CurrentForm->getValue("x_PatID");
		if (!$this->PatID->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->PatID->Visible = FALSE; // Disable update for API request
			else
				$this->PatID->setFormValue($val);
		}

		// Check field name 'PatientName' first before field var 'x_PatientName'
		$val = $CurrentForm->hasValue("PatientName") ? $CurrentForm->getValue("PatientName") : $CurrentForm->getValue("x_PatientName");
		if (!$this->PatientName->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->PatientName->Visible = FALSE; // Disable update for API request
			else
				$this->PatientName->setFormValue($val);
		}

		// Check field name 'MobileNumber' first before field var 'x_MobileNumber'
		$val = $CurrentForm->hasValue("MobileNumber") ? $CurrentForm->getValue("MobileNumber") : $CurrentForm->getValue("x_MobileNumber");
		if (!$this->MobileNumber->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->MobileNumber->Visible = FALSE; // Disable update for API request
			else
				$this->MobileNumber->setFormValue($val);
		}

		// Check field name 'mrnno' first before field var 'x_mrnno'
		$val = $CurrentForm->hasValue("mrnno") ? $CurrentForm->getValue("mrnno") : $CurrentForm->getValue("x_mrnno");
		if (!$this->mrnno->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->mrnno->Visible = FALSE; // Disable update for API request
			else
				$this->mrnno->setFormValue($val);
		}

		// Check field name 'BP' first before field var 'x_BP'
		$val = $CurrentForm->hasValue("BP") ? $CurrentForm->getValue("BP") : $CurrentForm->getValue("x_BP");
		if (!$this->BP->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->BP->Visible = FALSE; // Disable update for API request
			else
				$this->BP->setFormValue($val);
		}

		// Check field name 'Pulse' first before field var 'x_Pulse'
		$val = $CurrentForm->hasValue("Pulse") ? $CurrentForm->getValue("Pulse") : $CurrentForm->getValue("x_Pulse");
		if (!$this->Pulse->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Pulse->Visible = FALSE; // Disable update for API request
			else
				$this->Pulse->setFormValue($val);
		}

		// Check field name 'Resp' first before field var 'x_Resp'
		$val = $CurrentForm->hasValue("Resp") ? $CurrentForm->getValue("Resp") : $CurrentForm->getValue("x_Resp");
		if (!$this->Resp->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Resp->Visible = FALSE; // Disable update for API request
			else
				$this->Resp->setFormValue($val);
		}

		// Check field name 'SPO2' first before field var 'x_SPO2'
		$val = $CurrentForm->hasValue("SPO2") ? $CurrentForm->getValue("SPO2") : $CurrentForm->getValue("x_SPO2");
		if (!$this->SPO2->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->SPO2->Visible = FALSE; // Disable update for API request
			else
				$this->SPO2->setFormValue($val);
		}

		// Check field name 'FollowupAdvice' first before field var 'x_FollowupAdvice'
		$val = $CurrentForm->hasValue("FollowupAdvice") ? $CurrentForm->getValue("FollowupAdvice") : $CurrentForm->getValue("x_FollowupAdvice");
		if (!$this->FollowupAdvice->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->FollowupAdvice->Visible = FALSE; // Disable update for API request
			else
				$this->FollowupAdvice->setFormValue($val);
		}

		// Check field name 'NextReviewDate' first before field var 'x_NextReviewDate'
		$val = $CurrentForm->hasValue("NextReviewDate") ? $CurrentForm->getValue("NextReviewDate") : $CurrentForm->getValue("x_NextReviewDate");
		if (!$this->NextReviewDate->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->NextReviewDate->Visible = FALSE; // Disable update for API request
			else
				$this->NextReviewDate->setFormValue($val);
			$this->NextReviewDate->CurrentValue = UnFormatDateTime($this->NextReviewDate->CurrentValue, 7);
		}

		// Check field name 'Age' first before field var 'x_Age'
		$val = $CurrentForm->hasValue("Age") ? $CurrentForm->getValue("Age") : $CurrentForm->getValue("x_Age");
		if (!$this->Age->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Age->Visible = FALSE; // Disable update for API request
			else
				$this->Age->setFormValue($val);
		}

		// Check field name 'Gender' first before field var 'x_Gender'
		$val = $CurrentForm->hasValue("Gender") ? $CurrentForm->getValue("Gender") : $CurrentForm->getValue("x_Gender");
		if (!$this->Gender->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Gender->Visible = FALSE; // Disable update for API request
			else
				$this->Gender->setFormValue($val);
		}

		// Check field name 'profilePic' first before field var 'x_profilePic'
		$val = $CurrentForm->hasValue("profilePic") ? $CurrentForm->getValue("profilePic") : $CurrentForm->getValue("x_profilePic");
		if (!$this->profilePic->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->profilePic->Visible = FALSE; // Disable update for API request
			else
				$this->profilePic->setFormValue($val);
		}

		// Check field name 'Template' first before field var 'x_Template'
		$val = $CurrentForm->hasValue("Template") ? $CurrentForm->getValue("Template") : $CurrentForm->getValue("x_Template");
		if (!$this->Template->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Template->Visible = FALSE; // Disable update for API request
			else
				$this->Template->setFormValue($val);
		}

		// Check field name 'courseinhospital' first before field var 'x_courseinhospital'
		$val = $CurrentForm->hasValue("courseinhospital") ? $CurrentForm->getValue("courseinhospital") : $CurrentForm->getValue("x_courseinhospital");
		if (!$this->courseinhospital->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->courseinhospital->Visible = FALSE; // Disable update for API request
			else
				$this->courseinhospital->setFormValue($val);
		}

		// Check field name 'procedurenotes' first before field var 'x_procedurenotes'
		$val = $CurrentForm->hasValue("procedurenotes") ? $CurrentForm->getValue("procedurenotes") : $CurrentForm->getValue("x_procedurenotes");
		if (!$this->procedurenotes->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->procedurenotes->Visible = FALSE; // Disable update for API request
			else
				$this->procedurenotes->setFormValue($val);
		}

		// Check field name 'conditionatdischarge' first before field var 'x_conditionatdischarge'
		$val = $CurrentForm->hasValue("conditionatdischarge") ? $CurrentForm->getValue("conditionatdischarge") : $CurrentForm->getValue("x_conditionatdischarge");
		if (!$this->conditionatdischarge->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->conditionatdischarge->Visible = FALSE; // Disable update for API request
			else
				$this->conditionatdischarge->setFormValue($val);
		}

		// Check field name 'Template1' first before field var 'x_Template1'
		$val = $CurrentForm->hasValue("Template1") ? $CurrentForm->getValue("Template1") : $CurrentForm->getValue("x_Template1");
		if (!$this->Template1->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Template1->Visible = FALSE; // Disable update for API request
			else
				$this->Template1->setFormValue($val);
		}

		// Check field name 'Template2' first before field var 'x_Template2'
		$val = $CurrentForm->hasValue("Template2") ? $CurrentForm->getValue("Template2") : $CurrentForm->getValue("x_Template2");
		if (!$this->Template2->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Template2->Visible = FALSE; // Disable update for API request
			else
				$this->Template2->setFormValue($val);
		}

		// Check field name 'Template3' first before field var 'x_Template3'
		$val = $CurrentForm->hasValue("Template3") ? $CurrentForm->getValue("Template3") : $CurrentForm->getValue("x_Template3");
		if (!$this->Template3->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Template3->Visible = FALSE; // Disable update for API request
			else
				$this->Template3->setFormValue($val);
		}

		// Check field name 'HospID' first before field var 'x_HospID'
		$val = $CurrentForm->hasValue("HospID") ? $CurrentForm->getValue("HospID") : $CurrentForm->getValue("x_HospID");
		if (!$this->HospID->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->HospID->Visible = FALSE; // Disable update for API request
			else
				$this->HospID->setFormValue($val);
		}

		// Check field name 'Reception' first before field var 'x_Reception'
		$val = $CurrentForm->hasValue("Reception") ? $CurrentForm->getValue("Reception") : $CurrentForm->getValue("x_Reception");
		if (!$this->Reception->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Reception->Visible = FALSE; // Disable update for API request
			else
				$this->Reception->setFormValue($val);
		}

		// Check field name 'PatientId' first before field var 'x_PatientId'
		$val = $CurrentForm->hasValue("PatientId") ? $CurrentForm->getValue("PatientId") : $CurrentForm->getValue("x_PatientId");
		if (!$this->PatientId->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->PatientId->Visible = FALSE; // Disable update for API request
			else
				$this->PatientId->setFormValue($val);
		}

		// Check field name 'PatientSearch' first before field var 'x_PatientSearch'
		$val = $CurrentForm->hasValue("PatientSearch") ? $CurrentForm->getValue("PatientSearch") : $CurrentForm->getValue("x_PatientSearch");
		if (!$this->PatientSearch->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->PatientSearch->Visible = FALSE; // Disable update for API request
			else
				$this->PatientSearch->setFormValue($val);
		}

		// Check field name 'DischargeAdviceMedicine' first before field var 'x_DischargeAdviceMedicine'
		$val = $CurrentForm->hasValue("DischargeAdviceMedicine") ? $CurrentForm->getValue("DischargeAdviceMedicine") : $CurrentForm->getValue("x_DischargeAdviceMedicine");
		if (!$this->DischargeAdviceMedicine->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->DischargeAdviceMedicine->Visible = FALSE; // Disable update for API request
			else
				$this->DischargeAdviceMedicine->setFormValue($val);
		}

		// Check field name 'DischargeAdviceMedicineTemplate' first before field var 'x_DischargeAdviceMedicineTemplate'
		$val = $CurrentForm->hasValue("DischargeAdviceMedicineTemplate") ? $CurrentForm->getValue("DischargeAdviceMedicineTemplate") : $CurrentForm->getValue("x_DischargeAdviceMedicineTemplate");
		if (!$this->DischargeAdviceMedicineTemplate->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->DischargeAdviceMedicineTemplate->Visible = FALSE; // Disable update for API request
			else
				$this->DischargeAdviceMedicineTemplate->setFormValue($val);
		}

		// Check field name 'id' first before field var 'x_id'
		$val = $CurrentForm->hasValue("id") ? $CurrentForm->getValue("id") : $CurrentForm->getValue("x_id");
	}

	// Restore form values
	public function restoreFormValues()
	{
		global $CurrentForm;
		$this->PatID->CurrentValue = $this->PatID->FormValue;
		$this->PatientName->CurrentValue = $this->PatientName->FormValue;
		$this->MobileNumber->CurrentValue = $this->MobileNumber->FormValue;
		$this->mrnno->CurrentValue = $this->mrnno->FormValue;
		$this->BP->CurrentValue = $this->BP->FormValue;
		$this->Pulse->CurrentValue = $this->Pulse->FormValue;
		$this->Resp->CurrentValue = $this->Resp->FormValue;
		$this->SPO2->CurrentValue = $this->SPO2->FormValue;
		$this->FollowupAdvice->CurrentValue = $this->FollowupAdvice->FormValue;
		$this->NextReviewDate->CurrentValue = $this->NextReviewDate->FormValue;
		$this->NextReviewDate->CurrentValue = UnFormatDateTime($this->NextReviewDate->CurrentValue, 7);
		$this->Age->CurrentValue = $this->Age->FormValue;
		$this->Gender->CurrentValue = $this->Gender->FormValue;
		$this->profilePic->CurrentValue = $this->profilePic->FormValue;
		$this->Template->CurrentValue = $this->Template->FormValue;
		$this->courseinhospital->CurrentValue = $this->courseinhospital->FormValue;
		$this->procedurenotes->CurrentValue = $this->procedurenotes->FormValue;
		$this->conditionatdischarge->CurrentValue = $this->conditionatdischarge->FormValue;
		$this->Template1->CurrentValue = $this->Template1->FormValue;
		$this->Template2->CurrentValue = $this->Template2->FormValue;
		$this->Template3->CurrentValue = $this->Template3->FormValue;
		$this->HospID->CurrentValue = $this->HospID->FormValue;
		$this->Reception->CurrentValue = $this->Reception->FormValue;
		$this->PatientId->CurrentValue = $this->PatientId->FormValue;
		$this->PatientSearch->CurrentValue = $this->PatientSearch->FormValue;
		$this->DischargeAdviceMedicine->CurrentValue = $this->DischargeAdviceMedicine->FormValue;
		$this->DischargeAdviceMedicineTemplate->CurrentValue = $this->DischargeAdviceMedicineTemplate->FormValue;
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
		$this->PatID->setDbValue($row['PatID']);
		$this->PatientName->setDbValue($row['PatientName']);
		$this->MobileNumber->setDbValue($row['MobileNumber']);
		$this->mrnno->setDbValue($row['mrnno']);
		$this->BP->setDbValue($row['BP']);
		$this->Pulse->setDbValue($row['Pulse']);
		$this->Resp->setDbValue($row['Resp']);
		$this->SPO2->setDbValue($row['SPO2']);
		$this->FollowupAdvice->setDbValue($row['FollowupAdvice']);
		$this->NextReviewDate->setDbValue($row['NextReviewDate']);
		$this->Age->setDbValue($row['Age']);
		$this->Gender->setDbValue($row['Gender']);
		$this->profilePic->setDbValue($row['profilePic']);
		$this->Template->setDbValue($row['Template']);
		$this->courseinhospital->setDbValue($row['courseinhospital']);
		$this->procedurenotes->setDbValue($row['procedurenotes']);
		$this->conditionatdischarge->setDbValue($row['conditionatdischarge']);
		$this->Template1->setDbValue($row['Template1']);
		$this->Template2->setDbValue($row['Template2']);
		$this->Template3->setDbValue($row['Template3']);
		$this->HospID->setDbValue($row['HospID']);
		$this->Reception->setDbValue($row['Reception']);
		$this->PatientId->setDbValue($row['PatientId']);
		$this->PatientSearch->setDbValue($row['PatientSearch']);
		$this->DischargeAdviceMedicine->setDbValue($row['DischargeAdviceMedicine']);
		$this->DischargeAdviceMedicineTemplate->setDbValue($row['DischargeAdviceMedicineTemplate']);
	}

	// Return a row with default values
	protected function newRow()
	{
		$this->loadDefaultValues();
		$row = [];
		$row['id'] = $this->id->CurrentValue;
		$row['PatID'] = $this->PatID->CurrentValue;
		$row['PatientName'] = $this->PatientName->CurrentValue;
		$row['MobileNumber'] = $this->MobileNumber->CurrentValue;
		$row['mrnno'] = $this->mrnno->CurrentValue;
		$row['BP'] = $this->BP->CurrentValue;
		$row['Pulse'] = $this->Pulse->CurrentValue;
		$row['Resp'] = $this->Resp->CurrentValue;
		$row['SPO2'] = $this->SPO2->CurrentValue;
		$row['FollowupAdvice'] = $this->FollowupAdvice->CurrentValue;
		$row['NextReviewDate'] = $this->NextReviewDate->CurrentValue;
		$row['Age'] = $this->Age->CurrentValue;
		$row['Gender'] = $this->Gender->CurrentValue;
		$row['profilePic'] = $this->profilePic->CurrentValue;
		$row['Template'] = $this->Template->CurrentValue;
		$row['courseinhospital'] = $this->courseinhospital->CurrentValue;
		$row['procedurenotes'] = $this->procedurenotes->CurrentValue;
		$row['conditionatdischarge'] = $this->conditionatdischarge->CurrentValue;
		$row['Template1'] = $this->Template1->CurrentValue;
		$row['Template2'] = $this->Template2->CurrentValue;
		$row['Template3'] = $this->Template3->CurrentValue;
		$row['HospID'] = $this->HospID->CurrentValue;
		$row['Reception'] = $this->Reception->CurrentValue;
		$row['PatientId'] = $this->PatientId->CurrentValue;
		$row['PatientSearch'] = $this->PatientSearch->CurrentValue;
		$row['DischargeAdviceMedicine'] = $this->DischargeAdviceMedicine->CurrentValue;
		$row['DischargeAdviceMedicineTemplate'] = $this->DischargeAdviceMedicineTemplate->CurrentValue;
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
		// PatID
		// PatientName
		// MobileNumber
		// mrnno
		// BP
		// Pulse
		// Resp
		// SPO2
		// FollowupAdvice
		// NextReviewDate
		// Age
		// Gender
		// profilePic
		// Template
		// courseinhospital
		// procedurenotes
		// conditionatdischarge
		// Template1
		// Template2
		// Template3
		// HospID
		// Reception
		// PatientId
		// PatientSearch
		// DischargeAdviceMedicine
		// DischargeAdviceMedicineTemplate

		if ($this->RowType == ROWTYPE_VIEW) { // View row

			// id
			$this->id->ViewValue = $this->id->CurrentValue;
			$this->id->ViewCustomAttributes = "";

			// PatID
			$this->PatID->ViewValue = $this->PatID->CurrentValue;
			$this->PatID->ViewCustomAttributes = "";

			// PatientName
			$this->PatientName->ViewValue = $this->PatientName->CurrentValue;
			$this->PatientName->ViewCustomAttributes = "";

			// MobileNumber
			$this->MobileNumber->ViewValue = $this->MobileNumber->CurrentValue;
			$this->MobileNumber->ViewCustomAttributes = "";

			// mrnno
			$this->mrnno->ViewValue = $this->mrnno->CurrentValue;
			$this->mrnno->ViewCustomAttributes = "";

			// BP
			$this->BP->ViewValue = $this->BP->CurrentValue;
			$this->BP->ViewCustomAttributes = "";

			// Pulse
			$this->Pulse->ViewValue = $this->Pulse->CurrentValue;
			$this->Pulse->ViewCustomAttributes = "";

			// Resp
			$this->Resp->ViewValue = $this->Resp->CurrentValue;
			$this->Resp->ViewCustomAttributes = "";

			// SPO2
			$this->SPO2->ViewValue = $this->SPO2->CurrentValue;
			$this->SPO2->ViewCustomAttributes = "";

			// FollowupAdvice
			$this->FollowupAdvice->ViewValue = $this->FollowupAdvice->CurrentValue;
			$this->FollowupAdvice->ViewCustomAttributes = "";

			// NextReviewDate
			$this->NextReviewDate->ViewValue = $this->NextReviewDate->CurrentValue;
			$this->NextReviewDate->ViewValue = FormatDateTime($this->NextReviewDate->ViewValue, 7);
			$this->NextReviewDate->ViewCustomAttributes = "";

			// Age
			$this->Age->ViewValue = $this->Age->CurrentValue;
			$this->Age->ViewCustomAttributes = "";

			// Gender
			$this->Gender->ViewValue = $this->Gender->CurrentValue;
			$this->Gender->ViewCustomAttributes = "";

			// profilePic
			$this->profilePic->ViewValue = $this->profilePic->CurrentValue;
			$this->profilePic->ViewCustomAttributes = "";

			// Template
			$curVal = strval($this->Template->CurrentValue);
			if ($curVal <> "") {
				$this->Template->ViewValue = $this->Template->lookupCacheOption($curVal);
				if ($this->Template->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`TemplateName`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$lookupFilter = function() {
						return "`TemplateType`='Follow up Advice'";
					};
					$lookupFilter = $lookupFilter->bindTo($this);
					$sqlWrk = $this->Template->Lookup->getSql(FALSE, $filterWrk, $lookupFilter, $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = $rswrk->fields('df');
						$this->Template->ViewValue = $this->Template->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->Template->ViewValue = $this->Template->CurrentValue;
					}
				}
			} else {
				$this->Template->ViewValue = NULL;
			}
			$this->Template->ViewCustomAttributes = "";

			// courseinhospital
			$this->courseinhospital->ViewValue = $this->courseinhospital->CurrentValue;
			$this->courseinhospital->ViewCustomAttributes = "";

			// procedurenotes
			$this->procedurenotes->ViewValue = $this->procedurenotes->CurrentValue;
			$this->procedurenotes->ViewCustomAttributes = "";

			// conditionatdischarge
			$this->conditionatdischarge->ViewValue = $this->conditionatdischarge->CurrentValue;
			$this->conditionatdischarge->ViewCustomAttributes = "";

			// Template1
			$curVal = strval($this->Template1->CurrentValue);
			if ($curVal <> "") {
				$this->Template1->ViewValue = $this->Template1->lookupCacheOption($curVal);
				if ($this->Template1->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`TemplateName`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$lookupFilter = function() {
						return "`TemplateType`='Course In Hospital'";
					};
					$lookupFilter = $lookupFilter->bindTo($this);
					$sqlWrk = $this->Template1->Lookup->getSql(FALSE, $filterWrk, $lookupFilter, $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = $rswrk->fields('df');
						$this->Template1->ViewValue = $this->Template1->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->Template1->ViewValue = $this->Template1->CurrentValue;
					}
				}
			} else {
				$this->Template1->ViewValue = NULL;
			}
			$this->Template1->ViewCustomAttributes = "";

			// Template2
			$curVal = strval($this->Template2->CurrentValue);
			if ($curVal <> "") {
				$this->Template2->ViewValue = $this->Template2->lookupCacheOption($curVal);
				if ($this->Template2->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`TemplateName`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$lookupFilter = function() {
						return "`TemplateType`='Procedure Notes'";
					};
					$lookupFilter = $lookupFilter->bindTo($this);
					$sqlWrk = $this->Template2->Lookup->getSql(FALSE, $filterWrk, $lookupFilter, $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = $rswrk->fields('df');
						$this->Template2->ViewValue = $this->Template2->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->Template2->ViewValue = $this->Template2->CurrentValue;
					}
				}
			} else {
				$this->Template2->ViewValue = NULL;
			}
			$this->Template2->ViewCustomAttributes = "";

			// Template3
			$curVal = strval($this->Template3->CurrentValue);
			if ($curVal <> "") {
				$this->Template3->ViewValue = $this->Template3->lookupCacheOption($curVal);
				if ($this->Template3->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`TemplateName`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$lookupFilter = function() {
						return "`TemplateType`='Condition at Discharge'";
					};
					$lookupFilter = $lookupFilter->bindTo($this);
					$sqlWrk = $this->Template3->Lookup->getSql(FALSE, $filterWrk, $lookupFilter, $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = $rswrk->fields('df');
						$this->Template3->ViewValue = $this->Template3->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->Template3->ViewValue = $this->Template3->CurrentValue;
					}
				}
			} else {
				$this->Template3->ViewValue = NULL;
			}
			$this->Template3->ViewCustomAttributes = "";

			// HospID
			$this->HospID->ViewValue = $this->HospID->CurrentValue;
			$this->HospID->ViewValue = FormatNumber($this->HospID->ViewValue, 0, -2, -2, -2);
			$this->HospID->ViewCustomAttributes = "";

			// Reception
			$this->Reception->ViewValue = $this->Reception->CurrentValue;
			$this->Reception->ViewCustomAttributes = "";

			// PatientId
			$this->PatientId->ViewValue = $this->PatientId->CurrentValue;
			$this->PatientId->ViewCustomAttributes = "";

			// PatientSearch
			$curVal = strval($this->PatientSearch->CurrentValue);
			if ($curVal <> "") {
				$this->PatientSearch->ViewValue = $this->PatientSearch->lookupCacheOption($curVal);
				if ($this->PatientSearch->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
					$sqlWrk = $this->PatientSearch->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = FormatNumber($rswrk->fields('df'), 0, -2, -2, -2);
						$arwrk[2] = $rswrk->fields('df2');
						$arwrk[3] = $rswrk->fields('df3');
						$arwrk[4] = $rswrk->fields('df4');
						$this->PatientSearch->ViewValue = $this->PatientSearch->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->PatientSearch->ViewValue = $this->PatientSearch->CurrentValue;
					}
				}
			} else {
				$this->PatientSearch->ViewValue = NULL;
			}
			$this->PatientSearch->ViewCustomAttributes = "";

			// DischargeAdviceMedicine
			$this->DischargeAdviceMedicine->ViewValue = $this->DischargeAdviceMedicine->CurrentValue;
			$this->DischargeAdviceMedicine->ViewCustomAttributes = "";

			// DischargeAdviceMedicineTemplate
			$curVal = strval($this->DischargeAdviceMedicineTemplate->CurrentValue);
			if ($curVal <> "") {
				$this->DischargeAdviceMedicineTemplate->ViewValue = $this->DischargeAdviceMedicineTemplate->lookupCacheOption($curVal);
				if ($this->DischargeAdviceMedicineTemplate->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`TemplateName`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$lookupFilter = function() {
						return "`TemplateType`='Discharge Advice Medicine'";
					};
					$lookupFilter = $lookupFilter->bindTo($this);
					$sqlWrk = $this->DischargeAdviceMedicineTemplate->Lookup->getSql(FALSE, $filterWrk, $lookupFilter, $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = $rswrk->fields('df');
						$this->DischargeAdviceMedicineTemplate->ViewValue = $this->DischargeAdviceMedicineTemplate->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->DischargeAdviceMedicineTemplate->ViewValue = $this->DischargeAdviceMedicineTemplate->CurrentValue;
					}
				}
			} else {
				$this->DischargeAdviceMedicineTemplate->ViewValue = NULL;
			}
			$this->DischargeAdviceMedicineTemplate->ViewCustomAttributes = "";

			// PatID
			$this->PatID->LinkCustomAttributes = "";
			$this->PatID->HrefValue = "";
			$this->PatID->TooltipValue = "";

			// PatientName
			$this->PatientName->LinkCustomAttributes = "";
			$this->PatientName->HrefValue = "";
			$this->PatientName->TooltipValue = "";

			// MobileNumber
			$this->MobileNumber->LinkCustomAttributes = "";
			$this->MobileNumber->HrefValue = "";
			$this->MobileNumber->TooltipValue = "";

			// mrnno
			$this->mrnno->LinkCustomAttributes = "";
			$this->mrnno->HrefValue = "";
			$this->mrnno->TooltipValue = "";

			// BP
			$this->BP->LinkCustomAttributes = "";
			$this->BP->HrefValue = "";
			$this->BP->TooltipValue = "";

			// Pulse
			$this->Pulse->LinkCustomAttributes = "";
			$this->Pulse->HrefValue = "";
			$this->Pulse->TooltipValue = "";

			// Resp
			$this->Resp->LinkCustomAttributes = "";
			$this->Resp->HrefValue = "";
			$this->Resp->TooltipValue = "";

			// SPO2
			$this->SPO2->LinkCustomAttributes = "";
			$this->SPO2->HrefValue = "";
			$this->SPO2->TooltipValue = "";

			// FollowupAdvice
			$this->FollowupAdvice->LinkCustomAttributes = "";
			$this->FollowupAdvice->HrefValue = "";
			$this->FollowupAdvice->TooltipValue = "";

			// NextReviewDate
			$this->NextReviewDate->LinkCustomAttributes = "";
			$this->NextReviewDate->HrefValue = "";
			$this->NextReviewDate->TooltipValue = "";

			// Age
			$this->Age->LinkCustomAttributes = "";
			$this->Age->HrefValue = "";
			$this->Age->TooltipValue = "";

			// Gender
			$this->Gender->LinkCustomAttributes = "";
			$this->Gender->HrefValue = "";
			$this->Gender->TooltipValue = "";

			// profilePic
			$this->profilePic->LinkCustomAttributes = "";
			$this->profilePic->HrefValue = "";
			$this->profilePic->TooltipValue = "";

			// Template
			$this->Template->LinkCustomAttributes = "";
			$this->Template->HrefValue = "";
			$this->Template->TooltipValue = "";

			// courseinhospital
			$this->courseinhospital->LinkCustomAttributes = "";
			$this->courseinhospital->HrefValue = "";
			$this->courseinhospital->TooltipValue = "";

			// procedurenotes
			$this->procedurenotes->LinkCustomAttributes = "";
			$this->procedurenotes->HrefValue = "";
			$this->procedurenotes->TooltipValue = "";

			// conditionatdischarge
			$this->conditionatdischarge->LinkCustomAttributes = "";
			$this->conditionatdischarge->HrefValue = "";
			$this->conditionatdischarge->TooltipValue = "";

			// Template1
			$this->Template1->LinkCustomAttributes = "";
			$this->Template1->HrefValue = "";
			$this->Template1->TooltipValue = "";

			// Template2
			$this->Template2->LinkCustomAttributes = "";
			$this->Template2->HrefValue = "";
			$this->Template2->TooltipValue = "";

			// Template3
			$this->Template3->LinkCustomAttributes = "";
			$this->Template3->HrefValue = "";
			$this->Template3->TooltipValue = "";

			// HospID
			$this->HospID->LinkCustomAttributes = "";
			$this->HospID->HrefValue = "";
			$this->HospID->TooltipValue = "";

			// Reception
			$this->Reception->LinkCustomAttributes = "";
			$this->Reception->HrefValue = "";
			$this->Reception->TooltipValue = "";

			// PatientId
			$this->PatientId->LinkCustomAttributes = "";
			$this->PatientId->HrefValue = "";
			$this->PatientId->TooltipValue = "";

			// PatientSearch
			$this->PatientSearch->LinkCustomAttributes = "";
			$this->PatientSearch->HrefValue = "";
			$this->PatientSearch->TooltipValue = "";

			// DischargeAdviceMedicine
			$this->DischargeAdviceMedicine->LinkCustomAttributes = "";
			$this->DischargeAdviceMedicine->HrefValue = "";
			$this->DischargeAdviceMedicine->TooltipValue = "";

			// DischargeAdviceMedicineTemplate
			$this->DischargeAdviceMedicineTemplate->LinkCustomAttributes = "";
			$this->DischargeAdviceMedicineTemplate->HrefValue = "";
			$this->DischargeAdviceMedicineTemplate->TooltipValue = "";
		} elseif ($this->RowType == ROWTYPE_ADD) { // Add row

			// PatID
			$this->PatID->EditAttrs["class"] = "form-control";
			$this->PatID->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->PatID->CurrentValue = HtmlDecode($this->PatID->CurrentValue);
			$this->PatID->EditValue = HtmlEncode($this->PatID->CurrentValue);
			$this->PatID->PlaceHolder = RemoveHtml($this->PatID->caption());

			// PatientName
			$this->PatientName->EditAttrs["class"] = "form-control";
			$this->PatientName->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->PatientName->CurrentValue = HtmlDecode($this->PatientName->CurrentValue);
			$this->PatientName->EditValue = HtmlEncode($this->PatientName->CurrentValue);
			$this->PatientName->PlaceHolder = RemoveHtml($this->PatientName->caption());

			// MobileNumber
			$this->MobileNumber->EditAttrs["class"] = "form-control";
			$this->MobileNumber->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->MobileNumber->CurrentValue = HtmlDecode($this->MobileNumber->CurrentValue);
			$this->MobileNumber->EditValue = HtmlEncode($this->MobileNumber->CurrentValue);
			$this->MobileNumber->PlaceHolder = RemoveHtml($this->MobileNumber->caption());

			// mrnno
			$this->mrnno->EditAttrs["class"] = "form-control";
			$this->mrnno->EditCustomAttributes = "";
			if ($this->mrnno->getSessionValue() <> "") {
				$this->mrnno->CurrentValue = $this->mrnno->getSessionValue();
			$this->mrnno->ViewValue = $this->mrnno->CurrentValue;
			$this->mrnno->ViewCustomAttributes = "";
			} else {
			if (REMOVE_XSS)
				$this->mrnno->CurrentValue = HtmlDecode($this->mrnno->CurrentValue);
			$this->mrnno->EditValue = HtmlEncode($this->mrnno->CurrentValue);
			$this->mrnno->PlaceHolder = RemoveHtml($this->mrnno->caption());
			}

			// BP
			$this->BP->EditAttrs["class"] = "form-control";
			$this->BP->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->BP->CurrentValue = HtmlDecode($this->BP->CurrentValue);
			$this->BP->EditValue = HtmlEncode($this->BP->CurrentValue);
			$this->BP->PlaceHolder = RemoveHtml($this->BP->caption());

			// Pulse
			$this->Pulse->EditAttrs["class"] = "form-control";
			$this->Pulse->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Pulse->CurrentValue = HtmlDecode($this->Pulse->CurrentValue);
			$this->Pulse->EditValue = HtmlEncode($this->Pulse->CurrentValue);
			$this->Pulse->PlaceHolder = RemoveHtml($this->Pulse->caption());

			// Resp
			$this->Resp->EditAttrs["class"] = "form-control";
			$this->Resp->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Resp->CurrentValue = HtmlDecode($this->Resp->CurrentValue);
			$this->Resp->EditValue = HtmlEncode($this->Resp->CurrentValue);
			$this->Resp->PlaceHolder = RemoveHtml($this->Resp->caption());

			// SPO2
			$this->SPO2->EditAttrs["class"] = "form-control";
			$this->SPO2->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->SPO2->CurrentValue = HtmlDecode($this->SPO2->CurrentValue);
			$this->SPO2->EditValue = HtmlEncode($this->SPO2->CurrentValue);
			$this->SPO2->PlaceHolder = RemoveHtml($this->SPO2->caption());

			// FollowupAdvice
			$this->FollowupAdvice->EditAttrs["class"] = "form-control";
			$this->FollowupAdvice->EditCustomAttributes = "";
			$this->FollowupAdvice->EditValue = HtmlEncode($this->FollowupAdvice->CurrentValue);
			$this->FollowupAdvice->PlaceHolder = RemoveHtml($this->FollowupAdvice->caption());

			// NextReviewDate
			$this->NextReviewDate->EditAttrs["class"] = "form-control";
			$this->NextReviewDate->EditCustomAttributes = "";
			$this->NextReviewDate->EditValue = HtmlEncode(FormatDateTime($this->NextReviewDate->CurrentValue, 7));
			$this->NextReviewDate->PlaceHolder = RemoveHtml($this->NextReviewDate->caption());

			// Age
			$this->Age->EditAttrs["class"] = "form-control";
			$this->Age->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Age->CurrentValue = HtmlDecode($this->Age->CurrentValue);
			$this->Age->EditValue = HtmlEncode($this->Age->CurrentValue);
			$this->Age->PlaceHolder = RemoveHtml($this->Age->caption());

			// Gender
			$this->Gender->EditAttrs["class"] = "form-control";
			$this->Gender->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Gender->CurrentValue = HtmlDecode($this->Gender->CurrentValue);
			$this->Gender->EditValue = HtmlEncode($this->Gender->CurrentValue);
			$this->Gender->PlaceHolder = RemoveHtml($this->Gender->caption());

			// profilePic
			$this->profilePic->EditAttrs["class"] = "form-control";
			$this->profilePic->EditCustomAttributes = "";
			$this->profilePic->EditValue = HtmlEncode($this->profilePic->CurrentValue);
			$this->profilePic->PlaceHolder = RemoveHtml($this->profilePic->caption());

			// Template
			$this->Template->EditAttrs["class"] = "form-control";
			$this->Template->EditCustomAttributes = "";
			$curVal = trim(strval($this->Template->CurrentValue));
			if ($curVal <> "")
				$this->Template->ViewValue = $this->Template->lookupCacheOption($curVal);
			else
				$this->Template->ViewValue = $this->Template->Lookup !== NULL && is_array($this->Template->Lookup->Options) ? $curVal : NULL;
			if ($this->Template->ViewValue !== NULL) { // Load from cache
				$this->Template->EditValue = array_values($this->Template->Lookup->Options);
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`TemplateName`" . SearchString("=", $this->Template->CurrentValue, DATATYPE_STRING, "");
				}
				$lookupFilter = function() {
					return "`TemplateType`='Follow up Advice'";
				};
				$lookupFilter = $lookupFilter->bindTo($this);
				$sqlWrk = $this->Template->Lookup->getSql(TRUE, $filterWrk, $lookupFilter, $this);
				$rswrk = Conn()->execute($sqlWrk);
				$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
				if ($rswrk) $rswrk->Close();
				$this->Template->EditValue = $arwrk;
			}

			// courseinhospital
			$this->courseinhospital->EditAttrs["class"] = "form-control";
			$this->courseinhospital->EditCustomAttributes = "";
			$this->courseinhospital->EditValue = HtmlEncode($this->courseinhospital->CurrentValue);
			$this->courseinhospital->PlaceHolder = RemoveHtml($this->courseinhospital->caption());

			// procedurenotes
			$this->procedurenotes->EditAttrs["class"] = "form-control";
			$this->procedurenotes->EditCustomAttributes = "";
			$this->procedurenotes->EditValue = HtmlEncode($this->procedurenotes->CurrentValue);
			$this->procedurenotes->PlaceHolder = RemoveHtml($this->procedurenotes->caption());

			// conditionatdischarge
			$this->conditionatdischarge->EditAttrs["class"] = "form-control";
			$this->conditionatdischarge->EditCustomAttributes = "";
			$this->conditionatdischarge->EditValue = HtmlEncode($this->conditionatdischarge->CurrentValue);
			$this->conditionatdischarge->PlaceHolder = RemoveHtml($this->conditionatdischarge->caption());

			// Template1
			$this->Template1->EditAttrs["class"] = "form-control";
			$this->Template1->EditCustomAttributes = "";
			$curVal = trim(strval($this->Template1->CurrentValue));
			if ($curVal <> "")
				$this->Template1->ViewValue = $this->Template1->lookupCacheOption($curVal);
			else
				$this->Template1->ViewValue = $this->Template1->Lookup !== NULL && is_array($this->Template1->Lookup->Options) ? $curVal : NULL;
			if ($this->Template1->ViewValue !== NULL) { // Load from cache
				$this->Template1->EditValue = array_values($this->Template1->Lookup->Options);
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`TemplateName`" . SearchString("=", $this->Template1->CurrentValue, DATATYPE_STRING, "");
				}
				$lookupFilter = function() {
					return "`TemplateType`='Course In Hospital'";
				};
				$lookupFilter = $lookupFilter->bindTo($this);
				$sqlWrk = $this->Template1->Lookup->getSql(TRUE, $filterWrk, $lookupFilter, $this);
				$rswrk = Conn()->execute($sqlWrk);
				$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
				if ($rswrk) $rswrk->Close();
				$this->Template1->EditValue = $arwrk;
			}

			// Template2
			$this->Template2->EditAttrs["class"] = "form-control";
			$this->Template2->EditCustomAttributes = "";
			$curVal = trim(strval($this->Template2->CurrentValue));
			if ($curVal <> "")
				$this->Template2->ViewValue = $this->Template2->lookupCacheOption($curVal);
			else
				$this->Template2->ViewValue = $this->Template2->Lookup !== NULL && is_array($this->Template2->Lookup->Options) ? $curVal : NULL;
			if ($this->Template2->ViewValue !== NULL) { // Load from cache
				$this->Template2->EditValue = array_values($this->Template2->Lookup->Options);
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`TemplateName`" . SearchString("=", $this->Template2->CurrentValue, DATATYPE_STRING, "");
				}
				$lookupFilter = function() {
					return "`TemplateType`='Procedure Notes'";
				};
				$lookupFilter = $lookupFilter->bindTo($this);
				$sqlWrk = $this->Template2->Lookup->getSql(TRUE, $filterWrk, $lookupFilter, $this);
				$rswrk = Conn()->execute($sqlWrk);
				$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
				if ($rswrk) $rswrk->Close();
				$this->Template2->EditValue = $arwrk;
			}

			// Template3
			$this->Template3->EditAttrs["class"] = "form-control";
			$this->Template3->EditCustomAttributes = "";
			$curVal = trim(strval($this->Template3->CurrentValue));
			if ($curVal <> "")
				$this->Template3->ViewValue = $this->Template3->lookupCacheOption($curVal);
			else
				$this->Template3->ViewValue = $this->Template3->Lookup !== NULL && is_array($this->Template3->Lookup->Options) ? $curVal : NULL;
			if ($this->Template3->ViewValue !== NULL) { // Load from cache
				$this->Template3->EditValue = array_values($this->Template3->Lookup->Options);
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`TemplateName`" . SearchString("=", $this->Template3->CurrentValue, DATATYPE_STRING, "");
				}
				$lookupFilter = function() {
					return "`TemplateType`='Condition at Discharge'";
				};
				$lookupFilter = $lookupFilter->bindTo($this);
				$sqlWrk = $this->Template3->Lookup->getSql(TRUE, $filterWrk, $lookupFilter, $this);
				$rswrk = Conn()->execute($sqlWrk);
				$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
				if ($rswrk) $rswrk->Close();
				$this->Template3->EditValue = $arwrk;
			}

			// HospID
			// Reception

			$this->Reception->EditAttrs["class"] = "form-control";
			$this->Reception->EditCustomAttributes = "";
			if ($this->Reception->getSessionValue() <> "") {
				$this->Reception->CurrentValue = $this->Reception->getSessionValue();
			$this->Reception->ViewValue = $this->Reception->CurrentValue;
			$this->Reception->ViewCustomAttributes = "";
			} else {
			if (REMOVE_XSS)
				$this->Reception->CurrentValue = HtmlDecode($this->Reception->CurrentValue);
			$this->Reception->EditValue = HtmlEncode($this->Reception->CurrentValue);
			$this->Reception->PlaceHolder = RemoveHtml($this->Reception->caption());
			}

			// PatientId
			$this->PatientId->EditAttrs["class"] = "form-control";
			$this->PatientId->EditCustomAttributes = "";
			if ($this->PatientId->getSessionValue() <> "") {
				$this->PatientId->CurrentValue = $this->PatientId->getSessionValue();
			$this->PatientId->ViewValue = $this->PatientId->CurrentValue;
			$this->PatientId->ViewCustomAttributes = "";
			} else {
			if (REMOVE_XSS)
				$this->PatientId->CurrentValue = HtmlDecode($this->PatientId->CurrentValue);
			$this->PatientId->EditValue = HtmlEncode($this->PatientId->CurrentValue);
			$this->PatientId->PlaceHolder = RemoveHtml($this->PatientId->caption());
			}

			// PatientSearch
			$this->PatientSearch->EditCustomAttributes = "";
			$curVal = trim(strval($this->PatientSearch->CurrentValue));
			if ($curVal <> "")
				$this->PatientSearch->ViewValue = $this->PatientSearch->lookupCacheOption($curVal);
			else
				$this->PatientSearch->ViewValue = $this->PatientSearch->Lookup !== NULL && is_array($this->PatientSearch->Lookup->Options) ? $curVal : NULL;
			if ($this->PatientSearch->ViewValue !== NULL) { // Load from cache
				$this->PatientSearch->EditValue = array_values($this->PatientSearch->Lookup->Options);
				if ($this->PatientSearch->ViewValue == "")
					$this->PatientSearch->ViewValue = $Language->phrase("PleaseSelect");
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`id`" . SearchString("=", $this->PatientSearch->CurrentValue, DATATYPE_NUMBER, "");
				}
				$sqlWrk = $this->PatientSearch->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = array();
					$arwrk[1] = HtmlEncode(FormatNumber($rswrk->fields('df'), 0, -2, -2, -2));
					$arwrk[2] = HtmlEncode($rswrk->fields('df2'));
					$arwrk[3] = HtmlEncode($rswrk->fields('df3'));
					$arwrk[4] = HtmlEncode($rswrk->fields('df4'));
					$this->PatientSearch->ViewValue = $this->PatientSearch->displayValue($arwrk);
				} else {
					$this->PatientSearch->ViewValue = $Language->phrase("PleaseSelect");
				}
				$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
				if ($rswrk) $rswrk->Close();
				$rowcnt = count($arwrk);
				for ($i = 0; $i < $rowcnt; $i++) {
					$arwrk[$i][1] = FormatNumber($arwrk[$i][1], 0, -2, -2, -2);
				}
				$this->PatientSearch->EditValue = $arwrk;
			}

			// DischargeAdviceMedicine
			$this->DischargeAdviceMedicine->EditAttrs["class"] = "form-control";
			$this->DischargeAdviceMedicine->EditCustomAttributes = "";
			$this->DischargeAdviceMedicine->EditValue = HtmlEncode($this->DischargeAdviceMedicine->CurrentValue);
			$this->DischargeAdviceMedicine->PlaceHolder = RemoveHtml($this->DischargeAdviceMedicine->caption());

			// DischargeAdviceMedicineTemplate
			$this->DischargeAdviceMedicineTemplate->EditAttrs["class"] = "form-control";
			$this->DischargeAdviceMedicineTemplate->EditCustomAttributes = "";
			$curVal = trim(strval($this->DischargeAdviceMedicineTemplate->CurrentValue));
			if ($curVal <> "")
				$this->DischargeAdviceMedicineTemplate->ViewValue = $this->DischargeAdviceMedicineTemplate->lookupCacheOption($curVal);
			else
				$this->DischargeAdviceMedicineTemplate->ViewValue = $this->DischargeAdviceMedicineTemplate->Lookup !== NULL && is_array($this->DischargeAdviceMedicineTemplate->Lookup->Options) ? $curVal : NULL;
			if ($this->DischargeAdviceMedicineTemplate->ViewValue !== NULL) { // Load from cache
				$this->DischargeAdviceMedicineTemplate->EditValue = array_values($this->DischargeAdviceMedicineTemplate->Lookup->Options);
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`TemplateName`" . SearchString("=", $this->DischargeAdviceMedicineTemplate->CurrentValue, DATATYPE_STRING, "");
				}
				$lookupFilter = function() {
					return "`TemplateType`='Discharge Advice Medicine'";
				};
				$lookupFilter = $lookupFilter->bindTo($this);
				$sqlWrk = $this->DischargeAdviceMedicineTemplate->Lookup->getSql(TRUE, $filterWrk, $lookupFilter, $this);
				$rswrk = Conn()->execute($sqlWrk);
				$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
				if ($rswrk) $rswrk->Close();
				$this->DischargeAdviceMedicineTemplate->EditValue = $arwrk;
			}

			// Add refer script
			// PatID

			$this->PatID->LinkCustomAttributes = "";
			$this->PatID->HrefValue = "";

			// PatientName
			$this->PatientName->LinkCustomAttributes = "";
			$this->PatientName->HrefValue = "";

			// MobileNumber
			$this->MobileNumber->LinkCustomAttributes = "";
			$this->MobileNumber->HrefValue = "";

			// mrnno
			$this->mrnno->LinkCustomAttributes = "";
			$this->mrnno->HrefValue = "";

			// BP
			$this->BP->LinkCustomAttributes = "";
			$this->BP->HrefValue = "";

			// Pulse
			$this->Pulse->LinkCustomAttributes = "";
			$this->Pulse->HrefValue = "";

			// Resp
			$this->Resp->LinkCustomAttributes = "";
			$this->Resp->HrefValue = "";

			// SPO2
			$this->SPO2->LinkCustomAttributes = "";
			$this->SPO2->HrefValue = "";

			// FollowupAdvice
			$this->FollowupAdvice->LinkCustomAttributes = "";
			$this->FollowupAdvice->HrefValue = "";

			// NextReviewDate
			$this->NextReviewDate->LinkCustomAttributes = "";
			$this->NextReviewDate->HrefValue = "";

			// Age
			$this->Age->LinkCustomAttributes = "";
			$this->Age->HrefValue = "";

			// Gender
			$this->Gender->LinkCustomAttributes = "";
			$this->Gender->HrefValue = "";

			// profilePic
			$this->profilePic->LinkCustomAttributes = "";
			$this->profilePic->HrefValue = "";

			// Template
			$this->Template->LinkCustomAttributes = "";
			$this->Template->HrefValue = "";

			// courseinhospital
			$this->courseinhospital->LinkCustomAttributes = "";
			$this->courseinhospital->HrefValue = "";

			// procedurenotes
			$this->procedurenotes->LinkCustomAttributes = "";
			$this->procedurenotes->HrefValue = "";

			// conditionatdischarge
			$this->conditionatdischarge->LinkCustomAttributes = "";
			$this->conditionatdischarge->HrefValue = "";

			// Template1
			$this->Template1->LinkCustomAttributes = "";
			$this->Template1->HrefValue = "";

			// Template2
			$this->Template2->LinkCustomAttributes = "";
			$this->Template2->HrefValue = "";

			// Template3
			$this->Template3->LinkCustomAttributes = "";
			$this->Template3->HrefValue = "";

			// HospID
			$this->HospID->LinkCustomAttributes = "";
			$this->HospID->HrefValue = "";

			// Reception
			$this->Reception->LinkCustomAttributes = "";
			$this->Reception->HrefValue = "";

			// PatientId
			$this->PatientId->LinkCustomAttributes = "";
			$this->PatientId->HrefValue = "";

			// PatientSearch
			$this->PatientSearch->LinkCustomAttributes = "";
			$this->PatientSearch->HrefValue = "";

			// DischargeAdviceMedicine
			$this->DischargeAdviceMedicine->LinkCustomAttributes = "";
			$this->DischargeAdviceMedicine->HrefValue = "";

			// DischargeAdviceMedicineTemplate
			$this->DischargeAdviceMedicineTemplate->LinkCustomAttributes = "";
			$this->DischargeAdviceMedicineTemplate->HrefValue = "";
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
		if ($this->PatID->Required) {
			if (!$this->PatID->IsDetailKey && $this->PatID->FormValue != NULL && $this->PatID->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PatID->caption(), $this->PatID->RequiredErrorMessage));
			}
		}
		if ($this->PatientName->Required) {
			if (!$this->PatientName->IsDetailKey && $this->PatientName->FormValue != NULL && $this->PatientName->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PatientName->caption(), $this->PatientName->RequiredErrorMessage));
			}
		}
		if ($this->MobileNumber->Required) {
			if (!$this->MobileNumber->IsDetailKey && $this->MobileNumber->FormValue != NULL && $this->MobileNumber->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->MobileNumber->caption(), $this->MobileNumber->RequiredErrorMessage));
			}
		}
		if ($this->mrnno->Required) {
			if (!$this->mrnno->IsDetailKey && $this->mrnno->FormValue != NULL && $this->mrnno->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->mrnno->caption(), $this->mrnno->RequiredErrorMessage));
			}
		}
		if ($this->BP->Required) {
			if (!$this->BP->IsDetailKey && $this->BP->FormValue != NULL && $this->BP->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->BP->caption(), $this->BP->RequiredErrorMessage));
			}
		}
		if ($this->Pulse->Required) {
			if (!$this->Pulse->IsDetailKey && $this->Pulse->FormValue != NULL && $this->Pulse->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Pulse->caption(), $this->Pulse->RequiredErrorMessage));
			}
		}
		if ($this->Resp->Required) {
			if (!$this->Resp->IsDetailKey && $this->Resp->FormValue != NULL && $this->Resp->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Resp->caption(), $this->Resp->RequiredErrorMessage));
			}
		}
		if ($this->SPO2->Required) {
			if (!$this->SPO2->IsDetailKey && $this->SPO2->FormValue != NULL && $this->SPO2->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->SPO2->caption(), $this->SPO2->RequiredErrorMessage));
			}
		}
		if ($this->FollowupAdvice->Required) {
			if (!$this->FollowupAdvice->IsDetailKey && $this->FollowupAdvice->FormValue != NULL && $this->FollowupAdvice->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->FollowupAdvice->caption(), $this->FollowupAdvice->RequiredErrorMessage));
			}
		}
		if ($this->NextReviewDate->Required) {
			if (!$this->NextReviewDate->IsDetailKey && $this->NextReviewDate->FormValue != NULL && $this->NextReviewDate->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->NextReviewDate->caption(), $this->NextReviewDate->RequiredErrorMessage));
			}
		}
		if ($this->Age->Required) {
			if (!$this->Age->IsDetailKey && $this->Age->FormValue != NULL && $this->Age->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Age->caption(), $this->Age->RequiredErrorMessage));
			}
		}
		if ($this->Gender->Required) {
			if (!$this->Gender->IsDetailKey && $this->Gender->FormValue != NULL && $this->Gender->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Gender->caption(), $this->Gender->RequiredErrorMessage));
			}
		}
		if ($this->profilePic->Required) {
			if (!$this->profilePic->IsDetailKey && $this->profilePic->FormValue != NULL && $this->profilePic->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->profilePic->caption(), $this->profilePic->RequiredErrorMessage));
			}
		}
		if ($this->Template->Required) {
			if (!$this->Template->IsDetailKey && $this->Template->FormValue != NULL && $this->Template->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Template->caption(), $this->Template->RequiredErrorMessage));
			}
		}
		if ($this->courseinhospital->Required) {
			if (!$this->courseinhospital->IsDetailKey && $this->courseinhospital->FormValue != NULL && $this->courseinhospital->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->courseinhospital->caption(), $this->courseinhospital->RequiredErrorMessage));
			}
		}
		if ($this->procedurenotes->Required) {
			if (!$this->procedurenotes->IsDetailKey && $this->procedurenotes->FormValue != NULL && $this->procedurenotes->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->procedurenotes->caption(), $this->procedurenotes->RequiredErrorMessage));
			}
		}
		if ($this->conditionatdischarge->Required) {
			if (!$this->conditionatdischarge->IsDetailKey && $this->conditionatdischarge->FormValue != NULL && $this->conditionatdischarge->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->conditionatdischarge->caption(), $this->conditionatdischarge->RequiredErrorMessage));
			}
		}
		if ($this->Template1->Required) {
			if (!$this->Template1->IsDetailKey && $this->Template1->FormValue != NULL && $this->Template1->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Template1->caption(), $this->Template1->RequiredErrorMessage));
			}
		}
		if ($this->Template2->Required) {
			if (!$this->Template2->IsDetailKey && $this->Template2->FormValue != NULL && $this->Template2->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Template2->caption(), $this->Template2->RequiredErrorMessage));
			}
		}
		if ($this->Template3->Required) {
			if (!$this->Template3->IsDetailKey && $this->Template3->FormValue != NULL && $this->Template3->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Template3->caption(), $this->Template3->RequiredErrorMessage));
			}
		}
		if ($this->HospID->Required) {
			if (!$this->HospID->IsDetailKey && $this->HospID->FormValue != NULL && $this->HospID->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->HospID->caption(), $this->HospID->RequiredErrorMessage));
			}
		}
		if ($this->Reception->Required) {
			if (!$this->Reception->IsDetailKey && $this->Reception->FormValue != NULL && $this->Reception->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Reception->caption(), $this->Reception->RequiredErrorMessage));
			}
		}
		if ($this->PatientId->Required) {
			if (!$this->PatientId->IsDetailKey && $this->PatientId->FormValue != NULL && $this->PatientId->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PatientId->caption(), $this->PatientId->RequiredErrorMessage));
			}
		}
		if ($this->PatientSearch->Required) {
			if (!$this->PatientSearch->IsDetailKey && $this->PatientSearch->FormValue != NULL && $this->PatientSearch->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PatientSearch->caption(), $this->PatientSearch->RequiredErrorMessage));
			}
		}
		if ($this->DischargeAdviceMedicine->Required) {
			if (!$this->DischargeAdviceMedicine->IsDetailKey && $this->DischargeAdviceMedicine->FormValue != NULL && $this->DischargeAdviceMedicine->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->DischargeAdviceMedicine->caption(), $this->DischargeAdviceMedicine->RequiredErrorMessage));
			}
		}
		if ($this->DischargeAdviceMedicineTemplate->Required) {
			if (!$this->DischargeAdviceMedicineTemplate->IsDetailKey && $this->DischargeAdviceMedicineTemplate->FormValue != NULL && $this->DischargeAdviceMedicineTemplate->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->DischargeAdviceMedicineTemplate->caption(), $this->DischargeAdviceMedicineTemplate->RequiredErrorMessage));
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

		// PatID
		$this->PatID->setDbValueDef($rsnew, $this->PatID->CurrentValue, NULL, FALSE);

		// PatientName
		$this->PatientName->setDbValueDef($rsnew, $this->PatientName->CurrentValue, NULL, FALSE);

		// MobileNumber
		$this->MobileNumber->setDbValueDef($rsnew, $this->MobileNumber->CurrentValue, NULL, FALSE);

		// mrnno
		$this->mrnno->setDbValueDef($rsnew, $this->mrnno->CurrentValue, NULL, FALSE);

		// BP
		$this->BP->setDbValueDef($rsnew, $this->BP->CurrentValue, NULL, FALSE);

		// Pulse
		$this->Pulse->setDbValueDef($rsnew, $this->Pulse->CurrentValue, NULL, FALSE);

		// Resp
		$this->Resp->setDbValueDef($rsnew, $this->Resp->CurrentValue, NULL, FALSE);

		// SPO2
		$this->SPO2->setDbValueDef($rsnew, $this->SPO2->CurrentValue, NULL, FALSE);

		// FollowupAdvice
		$this->FollowupAdvice->setDbValueDef($rsnew, $this->FollowupAdvice->CurrentValue, NULL, FALSE);

		// NextReviewDate
		$this->NextReviewDate->setDbValueDef($rsnew, UnFormatDateTime($this->NextReviewDate->CurrentValue, 7), NULL, FALSE);

		// Age
		$this->Age->setDbValueDef($rsnew, $this->Age->CurrentValue, NULL, FALSE);

		// Gender
		$this->Gender->setDbValueDef($rsnew, $this->Gender->CurrentValue, NULL, FALSE);

		// profilePic
		$this->profilePic->setDbValueDef($rsnew, $this->profilePic->CurrentValue, NULL, FALSE);

		// Template
		$this->Template->setDbValueDef($rsnew, $this->Template->CurrentValue, "", FALSE);

		// courseinhospital
		$this->courseinhospital->setDbValueDef($rsnew, $this->courseinhospital->CurrentValue, NULL, FALSE);

		// procedurenotes
		$this->procedurenotes->setDbValueDef($rsnew, $this->procedurenotes->CurrentValue, NULL, FALSE);

		// conditionatdischarge
		$this->conditionatdischarge->setDbValueDef($rsnew, $this->conditionatdischarge->CurrentValue, NULL, FALSE);

		// Template1
		$this->Template1->setDbValueDef($rsnew, $this->Template1->CurrentValue, "", FALSE);

		// Template2
		$this->Template2->setDbValueDef($rsnew, $this->Template2->CurrentValue, "", FALSE);

		// Template3
		$this->Template3->setDbValueDef($rsnew, $this->Template3->CurrentValue, "", FALSE);

		// HospID
		$this->HospID->setDbValueDef($rsnew, HospitalID(), NULL);
		$rsnew['HospID'] = &$this->HospID->DbValue;

		// Reception
		$this->Reception->setDbValueDef($rsnew, $this->Reception->CurrentValue, NULL, FALSE);

		// PatientId
		$this->PatientId->setDbValueDef($rsnew, $this->PatientId->CurrentValue, NULL, FALSE);

		// PatientSearch
		$this->PatientSearch->setDbValueDef($rsnew, $this->PatientSearch->CurrentValue, "", FALSE);

		// DischargeAdviceMedicine
		$this->DischargeAdviceMedicine->setDbValueDef($rsnew, $this->DischargeAdviceMedicine->CurrentValue, NULL, FALSE);

		// DischargeAdviceMedicineTemplate
		$this->DischargeAdviceMedicineTemplate->setDbValueDef($rsnew, $this->DischargeAdviceMedicineTemplate->CurrentValue, "", FALSE);

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

	// Set up master/detail based on QueryString
	protected function setupMasterParms()
	{
		$validMaster = FALSE;

		// Get the keys for master table
		if (Get(TABLE_SHOW_MASTER) !== NULL) {
			$masterTblVar = Get(TABLE_SHOW_MASTER);
			if ($masterTblVar == "") {
				$validMaster = TRUE;
				$this->DbMasterFilter = "";
				$this->DbDetailFilter = "";
			}
			if ($masterTblVar == "ip_admission") {
				$validMaster = TRUE;
				if (Get("fk_id") !== NULL) {
					$this->Reception->setQueryStringValue(Get("fk_id"));
					$this->Reception->setSessionValue($this->Reception->QueryStringValue);
					if (!is_numeric($this->Reception->QueryStringValue))
						$validMaster = FALSE;
				} else {
					$validMaster = FALSE;
				}
				if (Get("fk_patient_id") !== NULL) {
					$this->PatientId->setQueryStringValue(Get("fk_patient_id"));
					$this->PatientId->setSessionValue($this->PatientId->QueryStringValue);
					if (!is_numeric($this->PatientId->QueryStringValue))
						$validMaster = FALSE;
				} else {
					$validMaster = FALSE;
				}
				if (Get("fk_mrnNo") !== NULL) {
					$this->mrnno->setQueryStringValue(Get("fk_mrnNo"));
					$this->mrnno->setSessionValue($this->mrnno->QueryStringValue);
				} else {
					$validMaster = FALSE;
				}
			}
		} elseif (Post(TABLE_SHOW_MASTER) !== NULL) {
			$masterTblVar = Post(TABLE_SHOW_MASTER);
			if ($masterTblVar == "") {
				$validMaster = TRUE;
				$this->DbMasterFilter = "";
				$this->DbDetailFilter = "";
			}
			if ($masterTblVar == "ip_admission") {
				$validMaster = TRUE;
				if (Post("fk_id") !== NULL) {
					$this->Reception->setFormValue(Post("fk_id"));
					$this->Reception->setSessionValue($this->Reception->FormValue);
					if (!is_numeric($this->Reception->FormValue))
						$validMaster = FALSE;
				} else {
					$validMaster = FALSE;
				}
				if (Post("fk_patient_id") !== NULL) {
					$this->PatientId->setFormValue(Post("fk_patient_id"));
					$this->PatientId->setSessionValue($this->PatientId->FormValue);
					if (!is_numeric($this->PatientId->FormValue))
						$validMaster = FALSE;
				} else {
					$validMaster = FALSE;
				}
				if (Post("fk_mrnNo") !== NULL) {
					$this->mrnno->setFormValue(Post("fk_mrnNo"));
					$this->mrnno->setSessionValue($this->mrnno->FormValue);
				} else {
					$validMaster = FALSE;
				}
			}
		}
		if ($validMaster) {

			// Save current master table
			$this->setCurrentMasterTable($masterTblVar);

			// Reset start record counter (new master key)
			if (!$this->isAddOrEdit()) {
				$this->StartRec = 1;
				$this->setStartRecordNumber($this->StartRec);
			}

			// Clear previous master key from Session
			if ($masterTblVar <> "ip_admission") {
				if ($this->Reception->CurrentValue == "")
					$this->Reception->setSessionValue("");
				if ($this->PatientId->CurrentValue == "")
					$this->PatientId->setSessionValue("");
				if ($this->mrnno->CurrentValue == "")
					$this->mrnno->setSessionValue("");
			}
		}
		$this->DbMasterFilter = $this->getMasterFilter(); // Get master filter
		$this->DbDetailFilter = $this->getDetailFilter(); // Get detail filter
	}

	// Set up Breadcrumb
	protected function setupBreadcrumb()
	{
		global $Breadcrumb, $Language;
		$Breadcrumb = new Breadcrumb();
		$url = substr(CurrentUrl(), strrpos(CurrentUrl(), "/")+1);
		$Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("patient_follow_uplist.php"), "", $this->TableVar, TRUE);
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
				case "x_Template":
					$lookupFilter = function() {
						return "`TemplateType`='Follow up Advice'";
					};
					$lookupFilter = $lookupFilter->bindTo($this);
					break;
				case "x_Template1":
					$lookupFilter = function() {
						return "`TemplateType`='Course In Hospital'";
					};
					$lookupFilter = $lookupFilter->bindTo($this);
					break;
				case "x_Template2":
					$lookupFilter = function() {
						return "`TemplateType`='Procedure Notes'";
					};
					$lookupFilter = $lookupFilter->bindTo($this);
					break;
				case "x_Template3":
					$lookupFilter = function() {
						return "`TemplateType`='Condition at Discharge'";
					};
					$lookupFilter = $lookupFilter->bindTo($this);
					break;
				case "x_DischargeAdviceMedicineTemplate":
					$lookupFilter = function() {
						return "`TemplateType`='Discharge Advice Medicine'";
					};
					$lookupFilter = $lookupFilter->bindTo($this);
					break;
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
						case "x_Template":
							break;
						case "x_Template1":
							break;
						case "x_Template2":
							break;
						case "x_Template3":
							break;
						case "x_PatientSearch":
							$row[1] = FormatNumber($row[1], 0, -2, -2, -2);
							$row['df'] = $row[1];
							break;
						case "x_DischargeAdviceMedicineTemplate":
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

		$dbhelper = &DbHelper();
		$Tid = $_POST["fk_patient_id"] ;
		$Reception = $_POST["fk_id"] ;
		$PatientId = $_POST["fk_patient_id"] ;
		$mrnno = $_POST["fk_mrnNo"] ;
		$sql = "SELECT * FROM ganeshkumar_bjhims.patient_vitals where Reception='".$Reception."' and PatientId='".$PatientId."'  and mrnno='".$mrnno."'  ;";
		$results1 = $dbhelper->ExecuteRows($sql);
		if($results1[0]["id"] == "")
		{
			$vitalsURL = "patient_vitalsadd.php?showmaster=ip_admission&fk_id=".$Reception."&fk_patient_id=".$PatientId."&fk_mrnNo=".$mrnno;
		}else{
			$vitalsURL = "patient_vitalsedit.php?showmaster=ip_admission&fk_id=".$Reception."&fk_patient_id=".$PatientId."&fk_mrnNo=".$mrnno."&id=".$results1[0]["id"];
		}
		$sql = "SELECT * FROM ganeshkumar_bjhims.patient_history where Reception='".$Reception."' and PatientId='".$PatientId."'  and mrnno='".$mrnno."'  ;";
		$results1 = $dbhelper->ExecuteRows($sql);
		if($results1[0]["id"] == "")
		{
			$historyURL = "patient_historyadd.php?showmaster=ip_admission&fk_id=".$Reception."&fk_patient_id=".$PatientId."&fk_mrnNo=".$mrnno;
		}else{
			$historyURL = "patient_historyedit.php?showmaster=ip_admission&fk_id=".$Reception."&fk_patient_id=".$PatientId."&fk_mrnNo=".$mrnno."&id=".$results1[0]["id"];
		}	
		$sql = "SELECT * FROM ganeshkumar_bjhims.patient_provisional_diagnosis where Reception='".$Reception."' and PatientId='".$PatientId."'  and mrnno='".$mrnno."'  ;";
		$results1 = $dbhelper->ExecuteRows($sql);
		if($results1[0]["id"] == "")
		{
			$provisionaldiagnosisURL = "patient_provisional_diagnosisadd.php?showmaster=ip_admission&fk_id=".$Reception."&fk_patient_id=".$PatientId."&fk_mrnNo=".$mrnno;
		}else{
			$provisionaldiagnosisURL = "patient_provisional_diagnosisedit.php?showmaster=ip_admission&fk_id=".$Reception."&fk_patient_id=".$PatientId."&fk_mrnNo=".$mrnno."&id=".$results1[0]["id"];
		}		
		$sql = "SELECT * FROM ganeshkumar_bjhims.patient_prescription where Reception='".$Reception."' and PatientId='".$PatientId."'  and mrnno='".$mrnno."'  ;";
		$results1 = $dbhelper->ExecuteRows($sql);
		if($results1[0]["id"] == "")
		{
			$prescriptionURL = "patient_prescriptionlist.php?action=gridadd&showmaster=ip_admission&fk_id=".$Reception."&fk_patient_id=".$PatientId."&fk_mrnNo=".$mrnno;
		}else{
			$prescriptionURL = "patient_prescriptionlist.php?action=gridedit&showmaster=ip_admission&fk_id=".$Reception."&fk_patient_id=".$PatientId."&fk_mrnNo=".$mrnno."&id=".$results1[0]["id"];
		}	
		$sql = "SELECT * FROM ganeshkumar_bjhims.patient_final_diagnosis where Reception='".$Reception."' and PatientId='".$PatientId."'  and mrnno='".$mrnno."'  ;";
		$results1 = $dbhelper->ExecuteRows($sql);
		if($results1[0]["id"] == "")
		{
			$finaldiagnosisURL = "patient_final_diagnosisadd.php?showmaster=ip_admission&fk_id=".$Reception."&fk_patient_id=".$PatientId."&fk_mrnNo=".$mrnno;
		}else{
			$finaldiagnosisURL = "patient_final_diagnosisedit.php?showmaster=ip_admission&fk_id=".$Reception."&fk_patient_id=".$PatientId."&fk_mrnNo=".$mrnno."&id=".$results1[0]["id"];
		}		
		$sql = "SELECT * FROM ganeshkumar_bjhims.patient_follow_up where Reception='".$Reception."' and PatientId='".$PatientId."'  and mrnno='".$mrnno."'  ;";
		$results1 = $dbhelper->ExecuteRows($sql);
		if($results1[0]["id"] == "")
		{
			$followupURL = "patient_follow_upadd.php?showmaster=ip_admission&fk_id=".$Reception."&fk_patient_id=".$PatientId."&fk_mrnNo=".$mrnno;
		}else{
			$followupURL = "patient_follow_upedit.php?showmaster=ip_admission&fk_id=".$Reception."&fk_patient_id=".$PatientId."&fk_mrnNo=".$mrnno."&id=".$results1[0]["id"];
		}	
		$sql = "SELECT * FROM ganeshkumar_bjhims.patient_ot_delivery_register where Reception='".$Reception."' and PatientId='".$PatientId."'  and mrnno='".$mrnno."'  ;";
		$results1 = $dbhelper->ExecuteRows($sql);
		if($results1[0]["id"] == "")
		{
			$deliveryregisterURL = "patient_ot_delivery_registeradd.php?showmaster=ip_admission&fk_id=".$Reception."&fk_patient_id=".$PatientId."&fk_mrnNo=".$mrnno;
		}else{
			$deliveryregisterURL = "patient_ot_delivery_registeredit.php?showmaster=ip_admission&fk_id=".$Reception."&fk_patient_id=".$PatientId."&fk_mrnNo=".$mrnno."&id=".$results1[0]["id"];
		}	
		$sql = "SELECT * FROM ganeshkumar_bjhims.patient_ot_surgery_register where Reception='".$Reception."' and PatientId='".$PatientId."'  and mrnno='".$mrnno."'  ;";
		$results1 = $dbhelper->ExecuteRows($sql);
		if($results1[0]["id"] == "")
		{
			$surgeryregisterURL = "patient_ot_surgery_registeradd.php?showmaster=ip_admission&fk_id=".$Reception."&fk_patient_id=".$PatientId."&fk_mrnNo=".$mrnno;
		}else{
			$surgeryregisterURL = "patient_ot_surgery_registeredit.php?showmaster=ip_admission&fk_id=".$Reception."&fk_patient_id=".$PatientId."&fk_mrnNo=".$mrnno."&id=".$results1[0]["id"];
		}	
		$PageReDirect = $_POST["Repagehistoryview"];
		if($PageReDirect == "patientvitals")
		{
	   	  $url = $vitalsURL;
		}
		if($PageReDirect == "patienthistory")
		{
	   	  $url = $historyURL;
		}
		if($PageReDirect == "patientprovisionaldiagnosis")
		{
	   	  $url = $provisionaldiagnosisURL;
		}
		 if($PageReDirect == "patientprescription")
		{
	   	  $url = $prescriptionURL;
		} 
		if($PageReDirect == "patientfinaldiagnosis")
		{
	   	  $url = $finaldiagnosisURL;
		}
		if($PageReDirect == "patientfollowup")
		{
	   	  $url = $followupURL;
		}
		if($PageReDirect == "patientotdeliveryregister")
		{
	   	  $url = $deliveryregisterURL;
		}
		if($PageReDirect == "patientotsurgeryregister")
		{
	   	  $url = $surgeryregisterURL;
		}
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
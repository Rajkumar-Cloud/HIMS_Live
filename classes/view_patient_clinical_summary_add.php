<?php
namespace PHPMaker2019\HIMS;

/**
 * Page class
 */
class view_patient_clinical_summary_add extends view_patient_clinical_summary
{

	// Page ID
	public $PageID = "add";

	// Project ID
	public $ProjectID = "{EA4F6D13-AF8F-428D-9EA7-BA88D1107EC3}";

	// Table name
	public $TableName = 'view_patient_clinical_summary';

	// Page object name
	public $PageObjName = "view_patient_clinical_summary_add";

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

		// Table object (view_patient_clinical_summary)
		if (!isset($GLOBALS["view_patient_clinical_summary"]) || get_class($GLOBALS["view_patient_clinical_summary"]) == PROJECT_NAMESPACE . "view_patient_clinical_summary") {
			$GLOBALS["view_patient_clinical_summary"] = &$this;
			$GLOBALS["Table"] = &$GLOBALS["view_patient_clinical_summary"];
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
			define(PROJECT_NAMESPACE . "TABLE_NAME", 'view_patient_clinical_summary');

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
		global $EXPORT, $view_patient_clinical_summary;
		if ($this->CustomExport && $this->CustomExport == $this->Export && array_key_exists($this->CustomExport, $EXPORT)) {
				$content = ob_get_contents();
			if ($ExportFileName == "")
				$ExportFileName = $this->TableVar;
			$class = PROJECT_NAMESPACE . $EXPORT[$this->CustomExport];
			if (class_exists($class)) {
				$doc = new $class($view_patient_clinical_summary);
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
					if ($pageName == "view_patient_clinical_summaryview.php")
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
					$this->terminate(GetUrl("view_patient_clinical_summarylist.php"));
				else
					$this->terminate(GetUrl("login.php"));
				return;
			}
		}

		// Create form object
		$CurrentForm = new HttpForm();
		$this->CurrentAction = Param("action"); // Set up current action
		$this->id->setVisibility();
		$this->PatientID->setVisibility();
		$this->HospID->setVisibility();
		$this->mrnNo->setVisibility();
		$this->patient_id->setVisibility();
		$this->patient_name->setVisibility();
		$this->profilePic->setVisibility();
		$this->gender->setVisibility();
		$this->age->setVisibility();
		$this->physician_id->setVisibility();
		$this->typeRegsisteration->setVisibility();
		$this->PaymentCategory->setVisibility();
		$this->admission_consultant_id->setVisibility();
		$this->leading_consultant_id->setVisibility();
		$this->cause->setVisibility();
		$this->admission_date->setVisibility();
		$this->release_date->setVisibility();
		$this->PaymentStatus->setVisibility();
		$this->status->setVisibility();
		$this->createdby->setVisibility();
		$this->createddatetime->setVisibility();
		$this->modifiedby->setVisibility();
		$this->modifieddatetime->setVisibility();
		$this->provisional_diagnosis->setVisibility();
		$this->Treatments->setVisibility();
		$this->FinalDiagnosis->setVisibility();
		$this->courseinhospital->setVisibility();
		$this->procedurenotes->setVisibility();
		$this->conditionatdischarge->setVisibility();
		$this->BP->setVisibility();
		$this->Pulse->setVisibility();
		$this->Resp->setVisibility();
		$this->SPO2->setVisibility();
		$this->FollowupAdvice->setVisibility();
		$this->NextReviewDate->setVisibility();
		$this->History->setVisibility();
		$this->vitals->setVisibility();
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
					$this->terminate("view_patient_clinical_summarylist.php"); // No matching record, return to list
				}
				break;
			case "insert": // Add new record
				$this->SendEmail = TRUE; // Send email on add success
				if ($this->addRow($this->OldRecordset)) { // Add successful
					if ($this->getSuccessMessage() == "")
						$this->setSuccessMessage($Language->phrase("AddSuccess")); // Set up success message
					$returnUrl = $this->getReturnUrl();
					if (GetPageName($returnUrl) == "view_patient_clinical_summarylist.php")
						$returnUrl = $this->addMasterUrl($returnUrl); // List page, return to List page with correct master key if necessary
					elseif (GetPageName($returnUrl) == "view_patient_clinical_summaryview.php")
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
		$this->id->CurrentValue = 0;
		$this->PatientID->CurrentValue = NULL;
		$this->PatientID->OldValue = $this->PatientID->CurrentValue;
		$this->HospID->CurrentValue = NULL;
		$this->HospID->OldValue = $this->HospID->CurrentValue;
		$this->mrnNo->CurrentValue = NULL;
		$this->mrnNo->OldValue = $this->mrnNo->CurrentValue;
		$this->patient_id->CurrentValue = NULL;
		$this->patient_id->OldValue = $this->patient_id->CurrentValue;
		$this->patient_name->CurrentValue = NULL;
		$this->patient_name->OldValue = $this->patient_name->CurrentValue;
		$this->profilePic->CurrentValue = NULL;
		$this->profilePic->OldValue = $this->profilePic->CurrentValue;
		$this->gender->CurrentValue = NULL;
		$this->gender->OldValue = $this->gender->CurrentValue;
		$this->age->CurrentValue = NULL;
		$this->age->OldValue = $this->age->CurrentValue;
		$this->physician_id->CurrentValue = NULL;
		$this->physician_id->OldValue = $this->physician_id->CurrentValue;
		$this->typeRegsisteration->CurrentValue = NULL;
		$this->typeRegsisteration->OldValue = $this->typeRegsisteration->CurrentValue;
		$this->PaymentCategory->CurrentValue = NULL;
		$this->PaymentCategory->OldValue = $this->PaymentCategory->CurrentValue;
		$this->admission_consultant_id->CurrentValue = NULL;
		$this->admission_consultant_id->OldValue = $this->admission_consultant_id->CurrentValue;
		$this->leading_consultant_id->CurrentValue = NULL;
		$this->leading_consultant_id->OldValue = $this->leading_consultant_id->CurrentValue;
		$this->cause->CurrentValue = NULL;
		$this->cause->OldValue = $this->cause->CurrentValue;
		$this->admission_date->CurrentValue = NULL;
		$this->admission_date->OldValue = $this->admission_date->CurrentValue;
		$this->release_date->CurrentValue = NULL;
		$this->release_date->OldValue = $this->release_date->CurrentValue;
		$this->PaymentStatus->CurrentValue = NULL;
		$this->PaymentStatus->OldValue = $this->PaymentStatus->CurrentValue;
		$this->status->CurrentValue = NULL;
		$this->status->OldValue = $this->status->CurrentValue;
		$this->createdby->CurrentValue = NULL;
		$this->createdby->OldValue = $this->createdby->CurrentValue;
		$this->createddatetime->CurrentValue = NULL;
		$this->createddatetime->OldValue = $this->createddatetime->CurrentValue;
		$this->modifiedby->CurrentValue = NULL;
		$this->modifiedby->OldValue = $this->modifiedby->CurrentValue;
		$this->modifieddatetime->CurrentValue = NULL;
		$this->modifieddatetime->OldValue = $this->modifieddatetime->CurrentValue;
		$this->provisional_diagnosis->CurrentValue = NULL;
		$this->provisional_diagnosis->OldValue = $this->provisional_diagnosis->CurrentValue;
		$this->Treatments->CurrentValue = NULL;
		$this->Treatments->OldValue = $this->Treatments->CurrentValue;
		$this->FinalDiagnosis->CurrentValue = NULL;
		$this->FinalDiagnosis->OldValue = $this->FinalDiagnosis->CurrentValue;
		$this->courseinhospital->CurrentValue = NULL;
		$this->courseinhospital->OldValue = $this->courseinhospital->CurrentValue;
		$this->procedurenotes->CurrentValue = NULL;
		$this->procedurenotes->OldValue = $this->procedurenotes->CurrentValue;
		$this->conditionatdischarge->CurrentValue = NULL;
		$this->conditionatdischarge->OldValue = $this->conditionatdischarge->CurrentValue;
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
		$this->History->CurrentValue = NULL;
		$this->History->OldValue = $this->History->CurrentValue;
		$this->vitals->CurrentValue = NULL;
		$this->vitals->OldValue = $this->vitals->CurrentValue;
	}

	// Load form values
	protected function loadFormValues()
	{

		// Load from form
		global $CurrentForm;

		// Check field name 'id' first before field var 'x_id'
		$val = $CurrentForm->hasValue("id") ? $CurrentForm->getValue("id") : $CurrentForm->getValue("x_id");
		if (!$this->id->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->id->Visible = FALSE; // Disable update for API request
			else
				$this->id->setFormValue($val);
		}

		// Check field name 'PatientID' first before field var 'x_PatientID'
		$val = $CurrentForm->hasValue("PatientID") ? $CurrentForm->getValue("PatientID") : $CurrentForm->getValue("x_PatientID");
		if (!$this->PatientID->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->PatientID->Visible = FALSE; // Disable update for API request
			else
				$this->PatientID->setFormValue($val);
		}

		// Check field name 'HospID' first before field var 'x_HospID'
		$val = $CurrentForm->hasValue("HospID") ? $CurrentForm->getValue("HospID") : $CurrentForm->getValue("x_HospID");
		if (!$this->HospID->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->HospID->Visible = FALSE; // Disable update for API request
			else
				$this->HospID->setFormValue($val);
		}

		// Check field name 'mrnNo' first before field var 'x_mrnNo'
		$val = $CurrentForm->hasValue("mrnNo") ? $CurrentForm->getValue("mrnNo") : $CurrentForm->getValue("x_mrnNo");
		if (!$this->mrnNo->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->mrnNo->Visible = FALSE; // Disable update for API request
			else
				$this->mrnNo->setFormValue($val);
		}

		// Check field name 'patient_id' first before field var 'x_patient_id'
		$val = $CurrentForm->hasValue("patient_id") ? $CurrentForm->getValue("patient_id") : $CurrentForm->getValue("x_patient_id");
		if (!$this->patient_id->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->patient_id->Visible = FALSE; // Disable update for API request
			else
				$this->patient_id->setFormValue($val);
		}

		// Check field name 'patient_name' first before field var 'x_patient_name'
		$val = $CurrentForm->hasValue("patient_name") ? $CurrentForm->getValue("patient_name") : $CurrentForm->getValue("x_patient_name");
		if (!$this->patient_name->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->patient_name->Visible = FALSE; // Disable update for API request
			else
				$this->patient_name->setFormValue($val);
		}

		// Check field name 'profilePic' first before field var 'x_profilePic'
		$val = $CurrentForm->hasValue("profilePic") ? $CurrentForm->getValue("profilePic") : $CurrentForm->getValue("x_profilePic");
		if (!$this->profilePic->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->profilePic->Visible = FALSE; // Disable update for API request
			else
				$this->profilePic->setFormValue($val);
		}

		// Check field name 'gender' first before field var 'x_gender'
		$val = $CurrentForm->hasValue("gender") ? $CurrentForm->getValue("gender") : $CurrentForm->getValue("x_gender");
		if (!$this->gender->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->gender->Visible = FALSE; // Disable update for API request
			else
				$this->gender->setFormValue($val);
		}

		// Check field name 'age' first before field var 'x_age'
		$val = $CurrentForm->hasValue("age") ? $CurrentForm->getValue("age") : $CurrentForm->getValue("x_age");
		if (!$this->age->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->age->Visible = FALSE; // Disable update for API request
			else
				$this->age->setFormValue($val);
		}

		// Check field name 'physician_id' first before field var 'x_physician_id'
		$val = $CurrentForm->hasValue("physician_id") ? $CurrentForm->getValue("physician_id") : $CurrentForm->getValue("x_physician_id");
		if (!$this->physician_id->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->physician_id->Visible = FALSE; // Disable update for API request
			else
				$this->physician_id->setFormValue($val);
		}

		// Check field name 'typeRegsisteration' first before field var 'x_typeRegsisteration'
		$val = $CurrentForm->hasValue("typeRegsisteration") ? $CurrentForm->getValue("typeRegsisteration") : $CurrentForm->getValue("x_typeRegsisteration");
		if (!$this->typeRegsisteration->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->typeRegsisteration->Visible = FALSE; // Disable update for API request
			else
				$this->typeRegsisteration->setFormValue($val);
		}

		// Check field name 'PaymentCategory' first before field var 'x_PaymentCategory'
		$val = $CurrentForm->hasValue("PaymentCategory") ? $CurrentForm->getValue("PaymentCategory") : $CurrentForm->getValue("x_PaymentCategory");
		if (!$this->PaymentCategory->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->PaymentCategory->Visible = FALSE; // Disable update for API request
			else
				$this->PaymentCategory->setFormValue($val);
		}

		// Check field name 'admission_consultant_id' first before field var 'x_admission_consultant_id'
		$val = $CurrentForm->hasValue("admission_consultant_id") ? $CurrentForm->getValue("admission_consultant_id") : $CurrentForm->getValue("x_admission_consultant_id");
		if (!$this->admission_consultant_id->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->admission_consultant_id->Visible = FALSE; // Disable update for API request
			else
				$this->admission_consultant_id->setFormValue($val);
		}

		// Check field name 'leading_consultant_id' first before field var 'x_leading_consultant_id'
		$val = $CurrentForm->hasValue("leading_consultant_id") ? $CurrentForm->getValue("leading_consultant_id") : $CurrentForm->getValue("x_leading_consultant_id");
		if (!$this->leading_consultant_id->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->leading_consultant_id->Visible = FALSE; // Disable update for API request
			else
				$this->leading_consultant_id->setFormValue($val);
		}

		// Check field name 'cause' first before field var 'x_cause'
		$val = $CurrentForm->hasValue("cause") ? $CurrentForm->getValue("cause") : $CurrentForm->getValue("x_cause");
		if (!$this->cause->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->cause->Visible = FALSE; // Disable update for API request
			else
				$this->cause->setFormValue($val);
		}

		// Check field name 'admission_date' first before field var 'x_admission_date'
		$val = $CurrentForm->hasValue("admission_date") ? $CurrentForm->getValue("admission_date") : $CurrentForm->getValue("x_admission_date");
		if (!$this->admission_date->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->admission_date->Visible = FALSE; // Disable update for API request
			else
				$this->admission_date->setFormValue($val);
			$this->admission_date->CurrentValue = UnFormatDateTime($this->admission_date->CurrentValue, 0);
		}

		// Check field name 'release_date' first before field var 'x_release_date'
		$val = $CurrentForm->hasValue("release_date") ? $CurrentForm->getValue("release_date") : $CurrentForm->getValue("x_release_date");
		if (!$this->release_date->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->release_date->Visible = FALSE; // Disable update for API request
			else
				$this->release_date->setFormValue($val);
			$this->release_date->CurrentValue = UnFormatDateTime($this->release_date->CurrentValue, 0);
		}

		// Check field name 'PaymentStatus' first before field var 'x_PaymentStatus'
		$val = $CurrentForm->hasValue("PaymentStatus") ? $CurrentForm->getValue("PaymentStatus") : $CurrentForm->getValue("x_PaymentStatus");
		if (!$this->PaymentStatus->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->PaymentStatus->Visible = FALSE; // Disable update for API request
			else
				$this->PaymentStatus->setFormValue($val);
		}

		// Check field name 'status' first before field var 'x_status'
		$val = $CurrentForm->hasValue("status") ? $CurrentForm->getValue("status") : $CurrentForm->getValue("x_status");
		if (!$this->status->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->status->Visible = FALSE; // Disable update for API request
			else
				$this->status->setFormValue($val);
		}

		// Check field name 'createdby' first before field var 'x_createdby'
		$val = $CurrentForm->hasValue("createdby") ? $CurrentForm->getValue("createdby") : $CurrentForm->getValue("x_createdby");
		if (!$this->createdby->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->createdby->Visible = FALSE; // Disable update for API request
			else
				$this->createdby->setFormValue($val);
		}

		// Check field name 'createddatetime' first before field var 'x_createddatetime'
		$val = $CurrentForm->hasValue("createddatetime") ? $CurrentForm->getValue("createddatetime") : $CurrentForm->getValue("x_createddatetime");
		if (!$this->createddatetime->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->createddatetime->Visible = FALSE; // Disable update for API request
			else
				$this->createddatetime->setFormValue($val);
			$this->createddatetime->CurrentValue = UnFormatDateTime($this->createddatetime->CurrentValue, 0);
		}

		// Check field name 'modifiedby' first before field var 'x_modifiedby'
		$val = $CurrentForm->hasValue("modifiedby") ? $CurrentForm->getValue("modifiedby") : $CurrentForm->getValue("x_modifiedby");
		if (!$this->modifiedby->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->modifiedby->Visible = FALSE; // Disable update for API request
			else
				$this->modifiedby->setFormValue($val);
		}

		// Check field name 'modifieddatetime' first before field var 'x_modifieddatetime'
		$val = $CurrentForm->hasValue("modifieddatetime") ? $CurrentForm->getValue("modifieddatetime") : $CurrentForm->getValue("x_modifieddatetime");
		if (!$this->modifieddatetime->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->modifieddatetime->Visible = FALSE; // Disable update for API request
			else
				$this->modifieddatetime->setFormValue($val);
			$this->modifieddatetime->CurrentValue = UnFormatDateTime($this->modifieddatetime->CurrentValue, 0);
		}

		// Check field name 'provisional_diagnosis' first before field var 'x_provisional_diagnosis'
		$val = $CurrentForm->hasValue("provisional_diagnosis") ? $CurrentForm->getValue("provisional_diagnosis") : $CurrentForm->getValue("x_provisional_diagnosis");
		if (!$this->provisional_diagnosis->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->provisional_diagnosis->Visible = FALSE; // Disable update for API request
			else
				$this->provisional_diagnosis->setFormValue($val);
		}

		// Check field name 'Treatments' first before field var 'x_Treatments'
		$val = $CurrentForm->hasValue("Treatments") ? $CurrentForm->getValue("Treatments") : $CurrentForm->getValue("x_Treatments");
		if (!$this->Treatments->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Treatments->Visible = FALSE; // Disable update for API request
			else
				$this->Treatments->setFormValue($val);
		}

		// Check field name 'FinalDiagnosis' first before field var 'x_FinalDiagnosis'
		$val = $CurrentForm->hasValue("FinalDiagnosis") ? $CurrentForm->getValue("FinalDiagnosis") : $CurrentForm->getValue("x_FinalDiagnosis");
		if (!$this->FinalDiagnosis->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->FinalDiagnosis->Visible = FALSE; // Disable update for API request
			else
				$this->FinalDiagnosis->setFormValue($val);
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
			$this->NextReviewDate->CurrentValue = UnFormatDateTime($this->NextReviewDate->CurrentValue, 0);
		}

		// Check field name 'History' first before field var 'x_History'
		$val = $CurrentForm->hasValue("History") ? $CurrentForm->getValue("History") : $CurrentForm->getValue("x_History");
		if (!$this->History->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->History->Visible = FALSE; // Disable update for API request
			else
				$this->History->setFormValue($val);
		}

		// Check field name 'vitals' first before field var 'x_vitals'
		$val = $CurrentForm->hasValue("vitals") ? $CurrentForm->getValue("vitals") : $CurrentForm->getValue("x_vitals");
		if (!$this->vitals->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->vitals->Visible = FALSE; // Disable update for API request
			else
				$this->vitals->setFormValue($val);
		}
	}

	// Restore form values
	public function restoreFormValues()
	{
		global $CurrentForm;
		$this->id->CurrentValue = $this->id->FormValue;
		$this->PatientID->CurrentValue = $this->PatientID->FormValue;
		$this->HospID->CurrentValue = $this->HospID->FormValue;
		$this->mrnNo->CurrentValue = $this->mrnNo->FormValue;
		$this->patient_id->CurrentValue = $this->patient_id->FormValue;
		$this->patient_name->CurrentValue = $this->patient_name->FormValue;
		$this->profilePic->CurrentValue = $this->profilePic->FormValue;
		$this->gender->CurrentValue = $this->gender->FormValue;
		$this->age->CurrentValue = $this->age->FormValue;
		$this->physician_id->CurrentValue = $this->physician_id->FormValue;
		$this->typeRegsisteration->CurrentValue = $this->typeRegsisteration->FormValue;
		$this->PaymentCategory->CurrentValue = $this->PaymentCategory->FormValue;
		$this->admission_consultant_id->CurrentValue = $this->admission_consultant_id->FormValue;
		$this->leading_consultant_id->CurrentValue = $this->leading_consultant_id->FormValue;
		$this->cause->CurrentValue = $this->cause->FormValue;
		$this->admission_date->CurrentValue = $this->admission_date->FormValue;
		$this->admission_date->CurrentValue = UnFormatDateTime($this->admission_date->CurrentValue, 0);
		$this->release_date->CurrentValue = $this->release_date->FormValue;
		$this->release_date->CurrentValue = UnFormatDateTime($this->release_date->CurrentValue, 0);
		$this->PaymentStatus->CurrentValue = $this->PaymentStatus->FormValue;
		$this->status->CurrentValue = $this->status->FormValue;
		$this->createdby->CurrentValue = $this->createdby->FormValue;
		$this->createddatetime->CurrentValue = $this->createddatetime->FormValue;
		$this->createddatetime->CurrentValue = UnFormatDateTime($this->createddatetime->CurrentValue, 0);
		$this->modifiedby->CurrentValue = $this->modifiedby->FormValue;
		$this->modifieddatetime->CurrentValue = $this->modifieddatetime->FormValue;
		$this->modifieddatetime->CurrentValue = UnFormatDateTime($this->modifieddatetime->CurrentValue, 0);
		$this->provisional_diagnosis->CurrentValue = $this->provisional_diagnosis->FormValue;
		$this->Treatments->CurrentValue = $this->Treatments->FormValue;
		$this->FinalDiagnosis->CurrentValue = $this->FinalDiagnosis->FormValue;
		$this->courseinhospital->CurrentValue = $this->courseinhospital->FormValue;
		$this->procedurenotes->CurrentValue = $this->procedurenotes->FormValue;
		$this->conditionatdischarge->CurrentValue = $this->conditionatdischarge->FormValue;
		$this->BP->CurrentValue = $this->BP->FormValue;
		$this->Pulse->CurrentValue = $this->Pulse->FormValue;
		$this->Resp->CurrentValue = $this->Resp->FormValue;
		$this->SPO2->CurrentValue = $this->SPO2->FormValue;
		$this->FollowupAdvice->CurrentValue = $this->FollowupAdvice->FormValue;
		$this->NextReviewDate->CurrentValue = $this->NextReviewDate->FormValue;
		$this->NextReviewDate->CurrentValue = UnFormatDateTime($this->NextReviewDate->CurrentValue, 0);
		$this->History->CurrentValue = $this->History->FormValue;
		$this->vitals->CurrentValue = $this->vitals->FormValue;
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
		$this->PatientID->setDbValue($row['PatientID']);
		$this->HospID->setDbValue($row['HospID']);
		$this->mrnNo->setDbValue($row['mrnNo']);
		$this->patient_id->setDbValue($row['patient_id']);
		$this->patient_name->setDbValue($row['patient_name']);
		$this->profilePic->setDbValue($row['profilePic']);
		$this->gender->setDbValue($row['gender']);
		$this->age->setDbValue($row['age']);
		$this->physician_id->setDbValue($row['physician_id']);
		$this->typeRegsisteration->setDbValue($row['typeRegsisteration']);
		$this->PaymentCategory->setDbValue($row['PaymentCategory']);
		$this->admission_consultant_id->setDbValue($row['admission_consultant_id']);
		$this->leading_consultant_id->setDbValue($row['leading_consultant_id']);
		$this->cause->setDbValue($row['cause']);
		$this->admission_date->setDbValue($row['admission_date']);
		$this->release_date->setDbValue($row['release_date']);
		$this->PaymentStatus->setDbValue($row['PaymentStatus']);
		$this->status->setDbValue($row['status']);
		$this->createdby->setDbValue($row['createdby']);
		$this->createddatetime->setDbValue($row['createddatetime']);
		$this->modifiedby->setDbValue($row['modifiedby']);
		$this->modifieddatetime->setDbValue($row['modifieddatetime']);
		$this->provisional_diagnosis->setDbValue($row['provisional_diagnosis']);
		$this->Treatments->setDbValue($row['Treatments']);
		$this->FinalDiagnosis->setDbValue($row['FinalDiagnosis']);
		$this->courseinhospital->setDbValue($row['courseinhospital']);
		$this->procedurenotes->setDbValue($row['procedurenotes']);
		$this->conditionatdischarge->setDbValue($row['conditionatdischarge']);
		$this->BP->setDbValue($row['BP']);
		$this->Pulse->setDbValue($row['Pulse']);
		$this->Resp->setDbValue($row['Resp']);
		$this->SPO2->setDbValue($row['SPO2']);
		$this->FollowupAdvice->setDbValue($row['FollowupAdvice']);
		$this->NextReviewDate->setDbValue($row['NextReviewDate']);
		$this->History->setDbValue($row['History']);
		$this->vitals->setDbValue($row['vitals']);
	}

	// Return a row with default values
	protected function newRow()
	{
		$this->loadDefaultValues();
		$row = [];
		$row['id'] = $this->id->CurrentValue;
		$row['PatientID'] = $this->PatientID->CurrentValue;
		$row['HospID'] = $this->HospID->CurrentValue;
		$row['mrnNo'] = $this->mrnNo->CurrentValue;
		$row['patient_id'] = $this->patient_id->CurrentValue;
		$row['patient_name'] = $this->patient_name->CurrentValue;
		$row['profilePic'] = $this->profilePic->CurrentValue;
		$row['gender'] = $this->gender->CurrentValue;
		$row['age'] = $this->age->CurrentValue;
		$row['physician_id'] = $this->physician_id->CurrentValue;
		$row['typeRegsisteration'] = $this->typeRegsisteration->CurrentValue;
		$row['PaymentCategory'] = $this->PaymentCategory->CurrentValue;
		$row['admission_consultant_id'] = $this->admission_consultant_id->CurrentValue;
		$row['leading_consultant_id'] = $this->leading_consultant_id->CurrentValue;
		$row['cause'] = $this->cause->CurrentValue;
		$row['admission_date'] = $this->admission_date->CurrentValue;
		$row['release_date'] = $this->release_date->CurrentValue;
		$row['PaymentStatus'] = $this->PaymentStatus->CurrentValue;
		$row['status'] = $this->status->CurrentValue;
		$row['createdby'] = $this->createdby->CurrentValue;
		$row['createddatetime'] = $this->createddatetime->CurrentValue;
		$row['modifiedby'] = $this->modifiedby->CurrentValue;
		$row['modifieddatetime'] = $this->modifieddatetime->CurrentValue;
		$row['provisional_diagnosis'] = $this->provisional_diagnosis->CurrentValue;
		$row['Treatments'] = $this->Treatments->CurrentValue;
		$row['FinalDiagnosis'] = $this->FinalDiagnosis->CurrentValue;
		$row['courseinhospital'] = $this->courseinhospital->CurrentValue;
		$row['procedurenotes'] = $this->procedurenotes->CurrentValue;
		$row['conditionatdischarge'] = $this->conditionatdischarge->CurrentValue;
		$row['BP'] = $this->BP->CurrentValue;
		$row['Pulse'] = $this->Pulse->CurrentValue;
		$row['Resp'] = $this->Resp->CurrentValue;
		$row['SPO2'] = $this->SPO2->CurrentValue;
		$row['FollowupAdvice'] = $this->FollowupAdvice->CurrentValue;
		$row['NextReviewDate'] = $this->NextReviewDate->CurrentValue;
		$row['History'] = $this->History->CurrentValue;
		$row['vitals'] = $this->vitals->CurrentValue;
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
		// PatientID
		// HospID
		// mrnNo
		// patient_id
		// patient_name
		// profilePic
		// gender
		// age
		// physician_id
		// typeRegsisteration
		// PaymentCategory
		// admission_consultant_id
		// leading_consultant_id
		// cause
		// admission_date
		// release_date
		// PaymentStatus
		// status
		// createdby
		// createddatetime
		// modifiedby
		// modifieddatetime
		// provisional_diagnosis
		// Treatments
		// FinalDiagnosis
		// courseinhospital
		// procedurenotes
		// conditionatdischarge
		// BP
		// Pulse
		// Resp
		// SPO2
		// FollowupAdvice
		// NextReviewDate
		// History
		// vitals

		if ($this->RowType == ROWTYPE_VIEW) { // View row

			// id
			$this->id->ViewValue = $this->id->CurrentValue;
			$this->id->ViewValue = FormatNumber($this->id->ViewValue, 0, -2, -2, -2);
			$this->id->ViewCustomAttributes = "";

			// PatientID
			$this->PatientID->ViewValue = $this->PatientID->CurrentValue;
			$this->PatientID->ViewCustomAttributes = "";

			// HospID
			$this->HospID->ViewValue = $this->HospID->CurrentValue;
			$this->HospID->ViewCustomAttributes = "";

			// mrnNo
			$this->mrnNo->ViewValue = $this->mrnNo->CurrentValue;
			$this->mrnNo->ViewCustomAttributes = "";

			// patient_id
			$this->patient_id->ViewValue = $this->patient_id->CurrentValue;
			$this->patient_id->ViewValue = FormatNumber($this->patient_id->ViewValue, 0, -2, -2, -2);
			$this->patient_id->ViewCustomAttributes = "";

			// patient_name
			$this->patient_name->ViewValue = $this->patient_name->CurrentValue;
			$this->patient_name->ViewCustomAttributes = "";

			// profilePic
			$this->profilePic->ViewValue = $this->profilePic->CurrentValue;
			$this->profilePic->ViewCustomAttributes = "";

			// gender
			$this->gender->ViewValue = $this->gender->CurrentValue;
			$this->gender->ViewCustomAttributes = "";

			// age
			$this->age->ViewValue = $this->age->CurrentValue;
			$this->age->ViewCustomAttributes = "";

			// physician_id
			$this->physician_id->ViewValue = $this->physician_id->CurrentValue;
			$this->physician_id->ViewValue = FormatNumber($this->physician_id->ViewValue, 0, -2, -2, -2);
			$this->physician_id->ViewCustomAttributes = "";

			// typeRegsisteration
			$this->typeRegsisteration->ViewValue = $this->typeRegsisteration->CurrentValue;
			$this->typeRegsisteration->ViewCustomAttributes = "";

			// PaymentCategory
			$this->PaymentCategory->ViewValue = $this->PaymentCategory->CurrentValue;
			$this->PaymentCategory->ViewCustomAttributes = "";

			// admission_consultant_id
			$this->admission_consultant_id->ViewValue = $this->admission_consultant_id->CurrentValue;
			$this->admission_consultant_id->ViewValue = FormatNumber($this->admission_consultant_id->ViewValue, 0, -2, -2, -2);
			$this->admission_consultant_id->ViewCustomAttributes = "";

			// leading_consultant_id
			$this->leading_consultant_id->ViewValue = $this->leading_consultant_id->CurrentValue;
			$this->leading_consultant_id->ViewValue = FormatNumber($this->leading_consultant_id->ViewValue, 0, -2, -2, -2);
			$this->leading_consultant_id->ViewCustomAttributes = "";

			// cause
			$this->cause->ViewValue = $this->cause->CurrentValue;
			$this->cause->ViewCustomAttributes = "";

			// admission_date
			$this->admission_date->ViewValue = $this->admission_date->CurrentValue;
			$this->admission_date->ViewValue = FormatDateTime($this->admission_date->ViewValue, 0);
			$this->admission_date->ViewCustomAttributes = "";

			// release_date
			$this->release_date->ViewValue = $this->release_date->CurrentValue;
			$this->release_date->ViewValue = FormatDateTime($this->release_date->ViewValue, 0);
			$this->release_date->ViewCustomAttributes = "";

			// PaymentStatus
			$this->PaymentStatus->ViewValue = $this->PaymentStatus->CurrentValue;
			$this->PaymentStatus->ViewValue = FormatNumber($this->PaymentStatus->ViewValue, 0, -2, -2, -2);
			$this->PaymentStatus->ViewCustomAttributes = "";

			// status
			$this->status->ViewValue = $this->status->CurrentValue;
			$this->status->ViewValue = FormatNumber($this->status->ViewValue, 0, -2, -2, -2);
			$this->status->ViewCustomAttributes = "";

			// createdby
			$this->createdby->ViewValue = $this->createdby->CurrentValue;
			$this->createdby->ViewValue = FormatNumber($this->createdby->ViewValue, 0, -2, -2, -2);
			$this->createdby->ViewCustomAttributes = "";

			// createddatetime
			$this->createddatetime->ViewValue = $this->createddatetime->CurrentValue;
			$this->createddatetime->ViewValue = FormatDateTime($this->createddatetime->ViewValue, 0);
			$this->createddatetime->ViewCustomAttributes = "";

			// modifiedby
			$this->modifiedby->ViewValue = $this->modifiedby->CurrentValue;
			$this->modifiedby->ViewValue = FormatNumber($this->modifiedby->ViewValue, 0, -2, -2, -2);
			$this->modifiedby->ViewCustomAttributes = "";

			// modifieddatetime
			$this->modifieddatetime->ViewValue = $this->modifieddatetime->CurrentValue;
			$this->modifieddatetime->ViewValue = FormatDateTime($this->modifieddatetime->ViewValue, 0);
			$this->modifieddatetime->ViewCustomAttributes = "";

			// provisional_diagnosis
			$this->provisional_diagnosis->ViewValue = $this->provisional_diagnosis->CurrentValue;
			$this->provisional_diagnosis->ViewCustomAttributes = "";

			// Treatments
			$this->Treatments->ViewValue = $this->Treatments->CurrentValue;
			$this->Treatments->ViewCustomAttributes = "";

			// FinalDiagnosis
			$this->FinalDiagnosis->ViewValue = $this->FinalDiagnosis->CurrentValue;
			$this->FinalDiagnosis->ViewCustomAttributes = "";

			// courseinhospital
			$this->courseinhospital->ViewValue = $this->courseinhospital->CurrentValue;
			$this->courseinhospital->ViewCustomAttributes = "";

			// procedurenotes
			$this->procedurenotes->ViewValue = $this->procedurenotes->CurrentValue;
			$this->procedurenotes->ViewCustomAttributes = "";

			// conditionatdischarge
			$this->conditionatdischarge->ViewValue = $this->conditionatdischarge->CurrentValue;
			$this->conditionatdischarge->ViewCustomAttributes = "";

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
			$this->NextReviewDate->ViewValue = FormatDateTime($this->NextReviewDate->ViewValue, 0);
			$this->NextReviewDate->ViewCustomAttributes = "";

			// History
			$this->History->ViewValue = $this->History->CurrentValue;
			$this->History->ViewCustomAttributes = "";

			// vitals
			$this->vitals->ViewValue = $this->vitals->CurrentValue;
			$this->vitals->ViewCustomAttributes = "";

			// id
			$this->id->LinkCustomAttributes = "";
			$this->id->HrefValue = "";
			$this->id->TooltipValue = "";

			// PatientID
			$this->PatientID->LinkCustomAttributes = "";
			$this->PatientID->HrefValue = "";
			$this->PatientID->TooltipValue = "";

			// HospID
			$this->HospID->LinkCustomAttributes = "";
			$this->HospID->HrefValue = "";
			$this->HospID->TooltipValue = "";

			// mrnNo
			$this->mrnNo->LinkCustomAttributes = "";
			$this->mrnNo->HrefValue = "";
			$this->mrnNo->TooltipValue = "";

			// patient_id
			$this->patient_id->LinkCustomAttributes = "";
			$this->patient_id->HrefValue = "";
			$this->patient_id->TooltipValue = "";

			// patient_name
			$this->patient_name->LinkCustomAttributes = "";
			$this->patient_name->HrefValue = "";
			$this->patient_name->TooltipValue = "";

			// profilePic
			$this->profilePic->LinkCustomAttributes = "";
			$this->profilePic->HrefValue = "";
			$this->profilePic->TooltipValue = "";

			// gender
			$this->gender->LinkCustomAttributes = "";
			$this->gender->HrefValue = "";
			$this->gender->TooltipValue = "";

			// age
			$this->age->LinkCustomAttributes = "";
			$this->age->HrefValue = "";
			$this->age->TooltipValue = "";

			// physician_id
			$this->physician_id->LinkCustomAttributes = "";
			$this->physician_id->HrefValue = "";
			$this->physician_id->TooltipValue = "";

			// typeRegsisteration
			$this->typeRegsisteration->LinkCustomAttributes = "";
			$this->typeRegsisteration->HrefValue = "";
			$this->typeRegsisteration->TooltipValue = "";

			// PaymentCategory
			$this->PaymentCategory->LinkCustomAttributes = "";
			$this->PaymentCategory->HrefValue = "";
			$this->PaymentCategory->TooltipValue = "";

			// admission_consultant_id
			$this->admission_consultant_id->LinkCustomAttributes = "";
			$this->admission_consultant_id->HrefValue = "";
			$this->admission_consultant_id->TooltipValue = "";

			// leading_consultant_id
			$this->leading_consultant_id->LinkCustomAttributes = "";
			$this->leading_consultant_id->HrefValue = "";
			$this->leading_consultant_id->TooltipValue = "";

			// cause
			$this->cause->LinkCustomAttributes = "";
			$this->cause->HrefValue = "";
			$this->cause->TooltipValue = "";

			// admission_date
			$this->admission_date->LinkCustomAttributes = "";
			$this->admission_date->HrefValue = "";
			$this->admission_date->TooltipValue = "";

			// release_date
			$this->release_date->LinkCustomAttributes = "";
			$this->release_date->HrefValue = "";
			$this->release_date->TooltipValue = "";

			// PaymentStatus
			$this->PaymentStatus->LinkCustomAttributes = "";
			$this->PaymentStatus->HrefValue = "";
			$this->PaymentStatus->TooltipValue = "";

			// status
			$this->status->LinkCustomAttributes = "";
			$this->status->HrefValue = "";
			$this->status->TooltipValue = "";

			// createdby
			$this->createdby->LinkCustomAttributes = "";
			$this->createdby->HrefValue = "";
			$this->createdby->TooltipValue = "";

			// createddatetime
			$this->createddatetime->LinkCustomAttributes = "";
			$this->createddatetime->HrefValue = "";
			$this->createddatetime->TooltipValue = "";

			// modifiedby
			$this->modifiedby->LinkCustomAttributes = "";
			$this->modifiedby->HrefValue = "";
			$this->modifiedby->TooltipValue = "";

			// modifieddatetime
			$this->modifieddatetime->LinkCustomAttributes = "";
			$this->modifieddatetime->HrefValue = "";
			$this->modifieddatetime->TooltipValue = "";

			// provisional_diagnosis
			$this->provisional_diagnosis->LinkCustomAttributes = "";
			$this->provisional_diagnosis->HrefValue = "";
			$this->provisional_diagnosis->TooltipValue = "";

			// Treatments
			$this->Treatments->LinkCustomAttributes = "";
			$this->Treatments->HrefValue = "";
			$this->Treatments->TooltipValue = "";

			// FinalDiagnosis
			$this->FinalDiagnosis->LinkCustomAttributes = "";
			$this->FinalDiagnosis->HrefValue = "";
			$this->FinalDiagnosis->TooltipValue = "";

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

			// History
			$this->History->LinkCustomAttributes = "";
			$this->History->HrefValue = "";
			$this->History->TooltipValue = "";

			// vitals
			$this->vitals->LinkCustomAttributes = "";
			$this->vitals->HrefValue = "";
			$this->vitals->TooltipValue = "";
		} elseif ($this->RowType == ROWTYPE_ADD) { // Add row

			// id
			$this->id->EditAttrs["class"] = "form-control";
			$this->id->EditCustomAttributes = "";
			$this->id->EditValue = HtmlEncode($this->id->CurrentValue);
			$this->id->PlaceHolder = RemoveHtml($this->id->caption());

			// PatientID
			$this->PatientID->EditAttrs["class"] = "form-control";
			$this->PatientID->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->PatientID->CurrentValue = HtmlDecode($this->PatientID->CurrentValue);
			$this->PatientID->EditValue = HtmlEncode($this->PatientID->CurrentValue);
			$this->PatientID->PlaceHolder = RemoveHtml($this->PatientID->caption());

			// HospID
			$this->HospID->EditAttrs["class"] = "form-control";
			$this->HospID->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->HospID->CurrentValue = HtmlDecode($this->HospID->CurrentValue);
			$this->HospID->EditValue = HtmlEncode($this->HospID->CurrentValue);
			$this->HospID->PlaceHolder = RemoveHtml($this->HospID->caption());

			// mrnNo
			$this->mrnNo->EditAttrs["class"] = "form-control";
			$this->mrnNo->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->mrnNo->CurrentValue = HtmlDecode($this->mrnNo->CurrentValue);
			$this->mrnNo->EditValue = HtmlEncode($this->mrnNo->CurrentValue);
			$this->mrnNo->PlaceHolder = RemoveHtml($this->mrnNo->caption());

			// patient_id
			$this->patient_id->EditAttrs["class"] = "form-control";
			$this->patient_id->EditCustomAttributes = "";
			$this->patient_id->EditValue = HtmlEncode($this->patient_id->CurrentValue);
			$this->patient_id->PlaceHolder = RemoveHtml($this->patient_id->caption());

			// patient_name
			$this->patient_name->EditAttrs["class"] = "form-control";
			$this->patient_name->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->patient_name->CurrentValue = HtmlDecode($this->patient_name->CurrentValue);
			$this->patient_name->EditValue = HtmlEncode($this->patient_name->CurrentValue);
			$this->patient_name->PlaceHolder = RemoveHtml($this->patient_name->caption());

			// profilePic
			$this->profilePic->EditAttrs["class"] = "form-control";
			$this->profilePic->EditCustomAttributes = "";
			$this->profilePic->EditValue = HtmlEncode($this->profilePic->CurrentValue);
			$this->profilePic->PlaceHolder = RemoveHtml($this->profilePic->caption());

			// gender
			$this->gender->EditAttrs["class"] = "form-control";
			$this->gender->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->gender->CurrentValue = HtmlDecode($this->gender->CurrentValue);
			$this->gender->EditValue = HtmlEncode($this->gender->CurrentValue);
			$this->gender->PlaceHolder = RemoveHtml($this->gender->caption());

			// age
			$this->age->EditAttrs["class"] = "form-control";
			$this->age->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->age->CurrentValue = HtmlDecode($this->age->CurrentValue);
			$this->age->EditValue = HtmlEncode($this->age->CurrentValue);
			$this->age->PlaceHolder = RemoveHtml($this->age->caption());

			// physician_id
			$this->physician_id->EditAttrs["class"] = "form-control";
			$this->physician_id->EditCustomAttributes = "";
			$this->physician_id->EditValue = HtmlEncode($this->physician_id->CurrentValue);
			$this->physician_id->PlaceHolder = RemoveHtml($this->physician_id->caption());

			// typeRegsisteration
			$this->typeRegsisteration->EditAttrs["class"] = "form-control";
			$this->typeRegsisteration->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->typeRegsisteration->CurrentValue = HtmlDecode($this->typeRegsisteration->CurrentValue);
			$this->typeRegsisteration->EditValue = HtmlEncode($this->typeRegsisteration->CurrentValue);
			$this->typeRegsisteration->PlaceHolder = RemoveHtml($this->typeRegsisteration->caption());

			// PaymentCategory
			$this->PaymentCategory->EditAttrs["class"] = "form-control";
			$this->PaymentCategory->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->PaymentCategory->CurrentValue = HtmlDecode($this->PaymentCategory->CurrentValue);
			$this->PaymentCategory->EditValue = HtmlEncode($this->PaymentCategory->CurrentValue);
			$this->PaymentCategory->PlaceHolder = RemoveHtml($this->PaymentCategory->caption());

			// admission_consultant_id
			$this->admission_consultant_id->EditAttrs["class"] = "form-control";
			$this->admission_consultant_id->EditCustomAttributes = "";
			$this->admission_consultant_id->EditValue = HtmlEncode($this->admission_consultant_id->CurrentValue);
			$this->admission_consultant_id->PlaceHolder = RemoveHtml($this->admission_consultant_id->caption());

			// leading_consultant_id
			$this->leading_consultant_id->EditAttrs["class"] = "form-control";
			$this->leading_consultant_id->EditCustomAttributes = "";
			$this->leading_consultant_id->EditValue = HtmlEncode($this->leading_consultant_id->CurrentValue);
			$this->leading_consultant_id->PlaceHolder = RemoveHtml($this->leading_consultant_id->caption());

			// cause
			$this->cause->EditAttrs["class"] = "form-control";
			$this->cause->EditCustomAttributes = "";
			$this->cause->EditValue = HtmlEncode($this->cause->CurrentValue);
			$this->cause->PlaceHolder = RemoveHtml($this->cause->caption());

			// admission_date
			$this->admission_date->EditAttrs["class"] = "form-control";
			$this->admission_date->EditCustomAttributes = "";
			$this->admission_date->EditValue = HtmlEncode(FormatDateTime($this->admission_date->CurrentValue, 8));
			$this->admission_date->PlaceHolder = RemoveHtml($this->admission_date->caption());

			// release_date
			$this->release_date->EditAttrs["class"] = "form-control";
			$this->release_date->EditCustomAttributes = "";
			$this->release_date->EditValue = HtmlEncode(FormatDateTime($this->release_date->CurrentValue, 8));
			$this->release_date->PlaceHolder = RemoveHtml($this->release_date->caption());

			// PaymentStatus
			$this->PaymentStatus->EditAttrs["class"] = "form-control";
			$this->PaymentStatus->EditCustomAttributes = "";
			$this->PaymentStatus->EditValue = HtmlEncode($this->PaymentStatus->CurrentValue);
			$this->PaymentStatus->PlaceHolder = RemoveHtml($this->PaymentStatus->caption());

			// status
			$this->status->EditAttrs["class"] = "form-control";
			$this->status->EditCustomAttributes = "";
			$this->status->EditValue = HtmlEncode($this->status->CurrentValue);
			$this->status->PlaceHolder = RemoveHtml($this->status->caption());

			// createdby
			$this->createdby->EditAttrs["class"] = "form-control";
			$this->createdby->EditCustomAttributes = "";
			$this->createdby->EditValue = HtmlEncode($this->createdby->CurrentValue);
			$this->createdby->PlaceHolder = RemoveHtml($this->createdby->caption());

			// createddatetime
			$this->createddatetime->EditAttrs["class"] = "form-control";
			$this->createddatetime->EditCustomAttributes = "";
			$this->createddatetime->EditValue = HtmlEncode(FormatDateTime($this->createddatetime->CurrentValue, 8));
			$this->createddatetime->PlaceHolder = RemoveHtml($this->createddatetime->caption());

			// modifiedby
			$this->modifiedby->EditAttrs["class"] = "form-control";
			$this->modifiedby->EditCustomAttributes = "";
			$this->modifiedby->EditValue = HtmlEncode($this->modifiedby->CurrentValue);
			$this->modifiedby->PlaceHolder = RemoveHtml($this->modifiedby->caption());

			// modifieddatetime
			$this->modifieddatetime->EditAttrs["class"] = "form-control";
			$this->modifieddatetime->EditCustomAttributes = "";
			$this->modifieddatetime->EditValue = HtmlEncode(FormatDateTime($this->modifieddatetime->CurrentValue, 8));
			$this->modifieddatetime->PlaceHolder = RemoveHtml($this->modifieddatetime->caption());

			// provisional_diagnosis
			$this->provisional_diagnosis->EditAttrs["class"] = "form-control";
			$this->provisional_diagnosis->EditCustomAttributes = "";
			$this->provisional_diagnosis->EditValue = HtmlEncode($this->provisional_diagnosis->CurrentValue);
			$this->provisional_diagnosis->PlaceHolder = RemoveHtml($this->provisional_diagnosis->caption());

			// Treatments
			$this->Treatments->EditAttrs["class"] = "form-control";
			$this->Treatments->EditCustomAttributes = "";
			$this->Treatments->EditValue = HtmlEncode($this->Treatments->CurrentValue);
			$this->Treatments->PlaceHolder = RemoveHtml($this->Treatments->caption());

			// FinalDiagnosis
			$this->FinalDiagnosis->EditAttrs["class"] = "form-control";
			$this->FinalDiagnosis->EditCustomAttributes = "";
			$this->FinalDiagnosis->EditValue = HtmlEncode($this->FinalDiagnosis->CurrentValue);
			$this->FinalDiagnosis->PlaceHolder = RemoveHtml($this->FinalDiagnosis->caption());

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
			$this->NextReviewDate->EditValue = HtmlEncode(FormatDateTime($this->NextReviewDate->CurrentValue, 8));
			$this->NextReviewDate->PlaceHolder = RemoveHtml($this->NextReviewDate->caption());

			// History
			$this->History->EditAttrs["class"] = "form-control";
			$this->History->EditCustomAttributes = "";
			$this->History->EditValue = HtmlEncode($this->History->CurrentValue);
			$this->History->PlaceHolder = RemoveHtml($this->History->caption());

			// vitals
			$this->vitals->EditAttrs["class"] = "form-control";
			$this->vitals->EditCustomAttributes = "";
			$this->vitals->EditValue = HtmlEncode($this->vitals->CurrentValue);
			$this->vitals->PlaceHolder = RemoveHtml($this->vitals->caption());

			// Add refer script
			// id

			$this->id->LinkCustomAttributes = "";
			$this->id->HrefValue = "";

			// PatientID
			$this->PatientID->LinkCustomAttributes = "";
			$this->PatientID->HrefValue = "";

			// HospID
			$this->HospID->LinkCustomAttributes = "";
			$this->HospID->HrefValue = "";

			// mrnNo
			$this->mrnNo->LinkCustomAttributes = "";
			$this->mrnNo->HrefValue = "";

			// patient_id
			$this->patient_id->LinkCustomAttributes = "";
			$this->patient_id->HrefValue = "";

			// patient_name
			$this->patient_name->LinkCustomAttributes = "";
			$this->patient_name->HrefValue = "";

			// profilePic
			$this->profilePic->LinkCustomAttributes = "";
			$this->profilePic->HrefValue = "";

			// gender
			$this->gender->LinkCustomAttributes = "";
			$this->gender->HrefValue = "";

			// age
			$this->age->LinkCustomAttributes = "";
			$this->age->HrefValue = "";

			// physician_id
			$this->physician_id->LinkCustomAttributes = "";
			$this->physician_id->HrefValue = "";

			// typeRegsisteration
			$this->typeRegsisteration->LinkCustomAttributes = "";
			$this->typeRegsisteration->HrefValue = "";

			// PaymentCategory
			$this->PaymentCategory->LinkCustomAttributes = "";
			$this->PaymentCategory->HrefValue = "";

			// admission_consultant_id
			$this->admission_consultant_id->LinkCustomAttributes = "";
			$this->admission_consultant_id->HrefValue = "";

			// leading_consultant_id
			$this->leading_consultant_id->LinkCustomAttributes = "";
			$this->leading_consultant_id->HrefValue = "";

			// cause
			$this->cause->LinkCustomAttributes = "";
			$this->cause->HrefValue = "";

			// admission_date
			$this->admission_date->LinkCustomAttributes = "";
			$this->admission_date->HrefValue = "";

			// release_date
			$this->release_date->LinkCustomAttributes = "";
			$this->release_date->HrefValue = "";

			// PaymentStatus
			$this->PaymentStatus->LinkCustomAttributes = "";
			$this->PaymentStatus->HrefValue = "";

			// status
			$this->status->LinkCustomAttributes = "";
			$this->status->HrefValue = "";

			// createdby
			$this->createdby->LinkCustomAttributes = "";
			$this->createdby->HrefValue = "";

			// createddatetime
			$this->createddatetime->LinkCustomAttributes = "";
			$this->createddatetime->HrefValue = "";

			// modifiedby
			$this->modifiedby->LinkCustomAttributes = "";
			$this->modifiedby->HrefValue = "";

			// modifieddatetime
			$this->modifieddatetime->LinkCustomAttributes = "";
			$this->modifieddatetime->HrefValue = "";

			// provisional_diagnosis
			$this->provisional_diagnosis->LinkCustomAttributes = "";
			$this->provisional_diagnosis->HrefValue = "";

			// Treatments
			$this->Treatments->LinkCustomAttributes = "";
			$this->Treatments->HrefValue = "";

			// FinalDiagnosis
			$this->FinalDiagnosis->LinkCustomAttributes = "";
			$this->FinalDiagnosis->HrefValue = "";

			// courseinhospital
			$this->courseinhospital->LinkCustomAttributes = "";
			$this->courseinhospital->HrefValue = "";

			// procedurenotes
			$this->procedurenotes->LinkCustomAttributes = "";
			$this->procedurenotes->HrefValue = "";

			// conditionatdischarge
			$this->conditionatdischarge->LinkCustomAttributes = "";
			$this->conditionatdischarge->HrefValue = "";

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

			// History
			$this->History->LinkCustomAttributes = "";
			$this->History->HrefValue = "";

			// vitals
			$this->vitals->LinkCustomAttributes = "";
			$this->vitals->HrefValue = "";
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
		if (!CheckInteger($this->id->FormValue)) {
			AddMessage($FormError, $this->id->errorMessage());
		}
		if ($this->PatientID->Required) {
			if (!$this->PatientID->IsDetailKey && $this->PatientID->FormValue != NULL && $this->PatientID->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PatientID->caption(), $this->PatientID->RequiredErrorMessage));
			}
		}
		if ($this->HospID->Required) {
			if (!$this->HospID->IsDetailKey && $this->HospID->FormValue != NULL && $this->HospID->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->HospID->caption(), $this->HospID->RequiredErrorMessage));
			}
		}
		if ($this->mrnNo->Required) {
			if (!$this->mrnNo->IsDetailKey && $this->mrnNo->FormValue != NULL && $this->mrnNo->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->mrnNo->caption(), $this->mrnNo->RequiredErrorMessage));
			}
		}
		if ($this->patient_id->Required) {
			if (!$this->patient_id->IsDetailKey && $this->patient_id->FormValue != NULL && $this->patient_id->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->patient_id->caption(), $this->patient_id->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->patient_id->FormValue)) {
			AddMessage($FormError, $this->patient_id->errorMessage());
		}
		if ($this->patient_name->Required) {
			if (!$this->patient_name->IsDetailKey && $this->patient_name->FormValue != NULL && $this->patient_name->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->patient_name->caption(), $this->patient_name->RequiredErrorMessage));
			}
		}
		if ($this->profilePic->Required) {
			if (!$this->profilePic->IsDetailKey && $this->profilePic->FormValue != NULL && $this->profilePic->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->profilePic->caption(), $this->profilePic->RequiredErrorMessage));
			}
		}
		if ($this->gender->Required) {
			if (!$this->gender->IsDetailKey && $this->gender->FormValue != NULL && $this->gender->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->gender->caption(), $this->gender->RequiredErrorMessage));
			}
		}
		if ($this->age->Required) {
			if (!$this->age->IsDetailKey && $this->age->FormValue != NULL && $this->age->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->age->caption(), $this->age->RequiredErrorMessage));
			}
		}
		if ($this->physician_id->Required) {
			if (!$this->physician_id->IsDetailKey && $this->physician_id->FormValue != NULL && $this->physician_id->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->physician_id->caption(), $this->physician_id->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->physician_id->FormValue)) {
			AddMessage($FormError, $this->physician_id->errorMessage());
		}
		if ($this->typeRegsisteration->Required) {
			if (!$this->typeRegsisteration->IsDetailKey && $this->typeRegsisteration->FormValue != NULL && $this->typeRegsisteration->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->typeRegsisteration->caption(), $this->typeRegsisteration->RequiredErrorMessage));
			}
		}
		if ($this->PaymentCategory->Required) {
			if (!$this->PaymentCategory->IsDetailKey && $this->PaymentCategory->FormValue != NULL && $this->PaymentCategory->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PaymentCategory->caption(), $this->PaymentCategory->RequiredErrorMessage));
			}
		}
		if ($this->admission_consultant_id->Required) {
			if (!$this->admission_consultant_id->IsDetailKey && $this->admission_consultant_id->FormValue != NULL && $this->admission_consultant_id->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->admission_consultant_id->caption(), $this->admission_consultant_id->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->admission_consultant_id->FormValue)) {
			AddMessage($FormError, $this->admission_consultant_id->errorMessage());
		}
		if ($this->leading_consultant_id->Required) {
			if (!$this->leading_consultant_id->IsDetailKey && $this->leading_consultant_id->FormValue != NULL && $this->leading_consultant_id->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->leading_consultant_id->caption(), $this->leading_consultant_id->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->leading_consultant_id->FormValue)) {
			AddMessage($FormError, $this->leading_consultant_id->errorMessage());
		}
		if ($this->cause->Required) {
			if (!$this->cause->IsDetailKey && $this->cause->FormValue != NULL && $this->cause->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->cause->caption(), $this->cause->RequiredErrorMessage));
			}
		}
		if ($this->admission_date->Required) {
			if (!$this->admission_date->IsDetailKey && $this->admission_date->FormValue != NULL && $this->admission_date->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->admission_date->caption(), $this->admission_date->RequiredErrorMessage));
			}
		}
		if (!CheckDate($this->admission_date->FormValue)) {
			AddMessage($FormError, $this->admission_date->errorMessage());
		}
		if ($this->release_date->Required) {
			if (!$this->release_date->IsDetailKey && $this->release_date->FormValue != NULL && $this->release_date->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->release_date->caption(), $this->release_date->RequiredErrorMessage));
			}
		}
		if (!CheckDate($this->release_date->FormValue)) {
			AddMessage($FormError, $this->release_date->errorMessage());
		}
		if ($this->PaymentStatus->Required) {
			if (!$this->PaymentStatus->IsDetailKey && $this->PaymentStatus->FormValue != NULL && $this->PaymentStatus->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PaymentStatus->caption(), $this->PaymentStatus->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->PaymentStatus->FormValue)) {
			AddMessage($FormError, $this->PaymentStatus->errorMessage());
		}
		if ($this->status->Required) {
			if (!$this->status->IsDetailKey && $this->status->FormValue != NULL && $this->status->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->status->caption(), $this->status->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->status->FormValue)) {
			AddMessage($FormError, $this->status->errorMessage());
		}
		if ($this->createdby->Required) {
			if (!$this->createdby->IsDetailKey && $this->createdby->FormValue != NULL && $this->createdby->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->createdby->caption(), $this->createdby->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->createdby->FormValue)) {
			AddMessage($FormError, $this->createdby->errorMessage());
		}
		if ($this->createddatetime->Required) {
			if (!$this->createddatetime->IsDetailKey && $this->createddatetime->FormValue != NULL && $this->createddatetime->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->createddatetime->caption(), $this->createddatetime->RequiredErrorMessage));
			}
		}
		if (!CheckDate($this->createddatetime->FormValue)) {
			AddMessage($FormError, $this->createddatetime->errorMessage());
		}
		if ($this->modifiedby->Required) {
			if (!$this->modifiedby->IsDetailKey && $this->modifiedby->FormValue != NULL && $this->modifiedby->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->modifiedby->caption(), $this->modifiedby->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->modifiedby->FormValue)) {
			AddMessage($FormError, $this->modifiedby->errorMessage());
		}
		if ($this->modifieddatetime->Required) {
			if (!$this->modifieddatetime->IsDetailKey && $this->modifieddatetime->FormValue != NULL && $this->modifieddatetime->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->modifieddatetime->caption(), $this->modifieddatetime->RequiredErrorMessage));
			}
		}
		if (!CheckDate($this->modifieddatetime->FormValue)) {
			AddMessage($FormError, $this->modifieddatetime->errorMessage());
		}
		if ($this->provisional_diagnosis->Required) {
			if (!$this->provisional_diagnosis->IsDetailKey && $this->provisional_diagnosis->FormValue != NULL && $this->provisional_diagnosis->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->provisional_diagnosis->caption(), $this->provisional_diagnosis->RequiredErrorMessage));
			}
		}
		if ($this->Treatments->Required) {
			if (!$this->Treatments->IsDetailKey && $this->Treatments->FormValue != NULL && $this->Treatments->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Treatments->caption(), $this->Treatments->RequiredErrorMessage));
			}
		}
		if ($this->FinalDiagnosis->Required) {
			if (!$this->FinalDiagnosis->IsDetailKey && $this->FinalDiagnosis->FormValue != NULL && $this->FinalDiagnosis->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->FinalDiagnosis->caption(), $this->FinalDiagnosis->RequiredErrorMessage));
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
		if (!CheckDate($this->NextReviewDate->FormValue)) {
			AddMessage($FormError, $this->NextReviewDate->errorMessage());
		}
		if ($this->History->Required) {
			if (!$this->History->IsDetailKey && $this->History->FormValue != NULL && $this->History->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->History->caption(), $this->History->RequiredErrorMessage));
			}
		}
		if ($this->vitals->Required) {
			if (!$this->vitals->IsDetailKey && $this->vitals->FormValue != NULL && $this->vitals->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->vitals->caption(), $this->vitals->RequiredErrorMessage));
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

		// id
		$this->id->setDbValueDef($rsnew, $this->id->CurrentValue, 0, strval($this->id->CurrentValue) == "");

		// PatientID
		$this->PatientID->setDbValueDef($rsnew, $this->PatientID->CurrentValue, NULL, FALSE);

		// HospID
		$this->HospID->setDbValueDef($rsnew, $this->HospID->CurrentValue, NULL, FALSE);

		// mrnNo
		$this->mrnNo->setDbValueDef($rsnew, $this->mrnNo->CurrentValue, "", FALSE);

		// patient_id
		$this->patient_id->setDbValueDef($rsnew, $this->patient_id->CurrentValue, 0, FALSE);

		// patient_name
		$this->patient_name->setDbValueDef($rsnew, $this->patient_name->CurrentValue, NULL, FALSE);

		// profilePic
		$this->profilePic->setDbValueDef($rsnew, $this->profilePic->CurrentValue, NULL, FALSE);

		// gender
		$this->gender->setDbValueDef($rsnew, $this->gender->CurrentValue, NULL, FALSE);

		// age
		$this->age->setDbValueDef($rsnew, $this->age->CurrentValue, NULL, FALSE);

		// physician_id
		$this->physician_id->setDbValueDef($rsnew, $this->physician_id->CurrentValue, NULL, FALSE);

		// typeRegsisteration
		$this->typeRegsisteration->setDbValueDef($rsnew, $this->typeRegsisteration->CurrentValue, NULL, FALSE);

		// PaymentCategory
		$this->PaymentCategory->setDbValueDef($rsnew, $this->PaymentCategory->CurrentValue, NULL, FALSE);

		// admission_consultant_id
		$this->admission_consultant_id->setDbValueDef($rsnew, $this->admission_consultant_id->CurrentValue, NULL, FALSE);

		// leading_consultant_id
		$this->leading_consultant_id->setDbValueDef($rsnew, $this->leading_consultant_id->CurrentValue, NULL, FALSE);

		// cause
		$this->cause->setDbValueDef($rsnew, $this->cause->CurrentValue, NULL, FALSE);

		// admission_date
		$this->admission_date->setDbValueDef($rsnew, UnFormatDateTime($this->admission_date->CurrentValue, 0), NULL, FALSE);

		// release_date
		$this->release_date->setDbValueDef($rsnew, UnFormatDateTime($this->release_date->CurrentValue, 0), NULL, FALSE);

		// PaymentStatus
		$this->PaymentStatus->setDbValueDef($rsnew, $this->PaymentStatus->CurrentValue, NULL, FALSE);

		// status
		$this->status->setDbValueDef($rsnew, $this->status->CurrentValue, NULL, FALSE);

		// createdby
		$this->createdby->setDbValueDef($rsnew, $this->createdby->CurrentValue, NULL, FALSE);

		// createddatetime
		$this->createddatetime->setDbValueDef($rsnew, UnFormatDateTime($this->createddatetime->CurrentValue, 0), NULL, FALSE);

		// modifiedby
		$this->modifiedby->setDbValueDef($rsnew, $this->modifiedby->CurrentValue, NULL, FALSE);

		// modifieddatetime
		$this->modifieddatetime->setDbValueDef($rsnew, UnFormatDateTime($this->modifieddatetime->CurrentValue, 0), NULL, FALSE);

		// provisional_diagnosis
		$this->provisional_diagnosis->setDbValueDef($rsnew, $this->provisional_diagnosis->CurrentValue, NULL, FALSE);

		// Treatments
		$this->Treatments->setDbValueDef($rsnew, $this->Treatments->CurrentValue, NULL, FALSE);

		// FinalDiagnosis
		$this->FinalDiagnosis->setDbValueDef($rsnew, $this->FinalDiagnosis->CurrentValue, NULL, FALSE);

		// courseinhospital
		$this->courseinhospital->setDbValueDef($rsnew, $this->courseinhospital->CurrentValue, NULL, FALSE);

		// procedurenotes
		$this->procedurenotes->setDbValueDef($rsnew, $this->procedurenotes->CurrentValue, NULL, FALSE);

		// conditionatdischarge
		$this->conditionatdischarge->setDbValueDef($rsnew, $this->conditionatdischarge->CurrentValue, NULL, FALSE);

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
		$this->NextReviewDate->setDbValueDef($rsnew, UnFormatDateTime($this->NextReviewDate->CurrentValue, 0), NULL, FALSE);

		// History
		$this->History->setDbValueDef($rsnew, $this->History->CurrentValue, NULL, FALSE);

		// vitals
		$this->vitals->setDbValueDef($rsnew, $this->vitals->CurrentValue, NULL, FALSE);

		// Call Row Inserting event
		$rs = ($rsold) ? $rsold->fields : NULL;
		$insertRow = $this->Row_Inserting($rs, $rsnew);

		// Check if key value entered
		if ($insertRow && $this->ValidateKey && strval($rsnew['id']) == "") {
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
		$Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("view_patient_clinical_summarylist.php"), "", $this->TableVar, TRUE);
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
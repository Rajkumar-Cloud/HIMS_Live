<?php
namespace PHPMaker2019\HIMS;

/**
 * Page class
 */
class view_appointment_scheduler_update extends view_appointment_scheduler
{

	// Page ID
	public $PageID = "update";

	// Project ID
	public $ProjectID = "{EA4F6D13-AF8F-428D-9EA7-BA88D1107EC3}";

	// Table name
	public $TableName = 'view_appointment_scheduler';

	// Page object name
	public $PageObjName = "view_appointment_scheduler_update";

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

		// Table object (view_appointment_scheduler)
		if (!isset($GLOBALS["view_appointment_scheduler"]) || get_class($GLOBALS["view_appointment_scheduler"]) == PROJECT_NAMESPACE . "view_appointment_scheduler") {
			$GLOBALS["view_appointment_scheduler"] = &$this;
			$GLOBALS["Table"] = &$GLOBALS["view_appointment_scheduler"];
		}
		$this->CancelUrl = $this->pageUrl() . "action=cancel";

		// Table object (user_login)
		if (!isset($GLOBALS['user_login']))
			$GLOBALS['user_login'] = new user_login();

		// Page ID
		if (!defined(PROJECT_NAMESPACE . "PAGE_ID"))
			define(PROJECT_NAMESPACE . "PAGE_ID", 'update');

		// Table name (for backward compatibility)
		if (!defined(PROJECT_NAMESPACE . "TABLE_NAME"))
			define(PROJECT_NAMESPACE . "TABLE_NAME", 'view_appointment_scheduler');

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
		global $EXPORT, $view_appointment_scheduler;
		if ($this->CustomExport && $this->CustomExport == $this->Export && array_key_exists($this->CustomExport, $EXPORT)) {
				$content = ob_get_contents();
			if ($ExportFileName == "")
				$ExportFileName = $this->TableVar;
			$class = PROJECT_NAMESPACE . $EXPORT[$this->CustomExport];
			if (class_exists($class)) {
				$doc = new $class($view_appointment_scheduler);
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
					if ($pageName == "view_appointment_schedulerview.php")
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
	public $FormClassName = "ew-horizontal ew-form ew-update-form";
	public $IsModal = FALSE;
	public $IsMobileOrModal = FALSE;
	public $RecKeys;
	public $Disabled;
	public $UpdateCount = 0;

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
					$this->terminate(GetUrl("view_appointment_schedulerlist.php"));
				else
					$this->terminate(GetUrl("login.php"));
				return;
			}
		}

		// Create form object
		$CurrentForm = new HttpForm();
		$this->CurrentAction = Param("action"); // Set up current action
		$this->id->Visible = FALSE;
		$this->patientID->setVisibility();
		$this->patientName->setVisibility();
		$this->MobileNumber->setVisibility();
		$this->Purpose->setVisibility();
		$this->PatientType->setVisibility();
		$this->Referal->setVisibility();
		$this->start_date->setVisibility();
		$this->DoctorName->setVisibility();
		$this->HospID->setVisibility();
		$this->end_date->setVisibility();
		$this->DoctorID->setVisibility();
		$this->DoctorCode->setVisibility();
		$this->Department->setVisibility();
		$this->AppointmentStatus->setVisibility();
		$this->status->setVisibility();
		$this->scheduler_id->setVisibility();
		$this->text->setVisibility();
		$this->appointment_status->setVisibility();
		$this->PId->setVisibility();
		$this->SchEmail->setVisibility();
		$this->appointment_type->setVisibility();
		$this->Notified->setVisibility();
		$this->Notes->setVisibility();
		$this->paymentType->setVisibility();
		$this->WhereDidYouHear->setVisibility();
		$this->createdBy->setVisibility();
		$this->createdDateTime->setVisibility();
		$this->PatientTypee->setVisibility();
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
		$this->setupLookupOptions($this->patientID);
		$this->setupLookupOptions($this->Referal);
		$this->setupLookupOptions($this->DoctorName);
		$this->setupLookupOptions($this->WhereDidYouHear);
		$this->setupLookupOptions($this->PatientTypee);

		// Check modal
		if ($this->IsModal)
			$SkipHeaderFooter = TRUE;
		$this->IsMobileOrModal = IsMobile() || $this->IsModal;
		$this->FormClassName = "ew-form ew-update-form ew-horizontal";

		// Set up Breadcrumb
		$this->setupBreadcrumb();

		// Try to load keys from list form
		$this->RecKeys = $this->getRecordKeys(); // Load record keys
		if (Post("action") !== NULL && Post("action") !== "") {

			// Get action
			$this->CurrentAction = Post("action");
			$this->loadFormValues(); // Get form values

			// Validate form
			if (!$this->validateForm()) {
				$this->CurrentAction = "show"; // Form error, reset action
				$this->setFailureMessage($FormError);
			}
		} else {
			$this->loadMultiUpdateValues(); // Load initial values to form
		}
		if (count($this->RecKeys) <= 0)
			$this->terminate("view_appointment_schedulerlist.php"); // No records selected, return to list
		if ($this->isUpdate()) {
				if ($this->updateRows()) { // Update Records based on key
					if ($this->getSuccessMessage() == "")
						$this->setSuccessMessage($Language->phrase("UpdateSuccess")); // Set up update success message
					$this->terminate($this->getReturnUrl()); // Return to caller
				} else {
					$this->restoreFormValues(); // Restore form values
				}
		}

		// Render row
		$this->RowType = ROWTYPE_EDIT; // Render edit
		$this->resetAttributes();
		$this->renderRow();
	}

	// Load initial values to form if field values are identical in all selected records
	protected function loadMultiUpdateValues()
	{
		$this->CurrentFilter = $this->getFilterFromRecordKeys();

		// Load recordset
		if ($this->Recordset = $this->loadRecordset()) {
			$i = 1;
			while (!$this->Recordset->EOF) {
				if ($i == 1) {
					$this->patientID->setDbValue($this->Recordset->fields('patientID'));
					$this->patientName->setDbValue($this->Recordset->fields('patientName'));
					$this->MobileNumber->setDbValue($this->Recordset->fields('MobileNumber'));
					$this->Purpose->setDbValue($this->Recordset->fields('Purpose'));
					$this->PatientType->setDbValue($this->Recordset->fields('PatientType'));
					$this->Referal->setDbValue($this->Recordset->fields('Referal'));
					$this->start_date->setDbValue($this->Recordset->fields('start_date'));
					$this->DoctorName->setDbValue($this->Recordset->fields('DoctorName'));
					$this->HospID->setDbValue($this->Recordset->fields('HospID'));
					$this->end_date->setDbValue($this->Recordset->fields('end_date'));
					$this->DoctorID->setDbValue($this->Recordset->fields('DoctorID'));
					$this->DoctorCode->setDbValue($this->Recordset->fields('DoctorCode'));
					$this->Department->setDbValue($this->Recordset->fields('Department'));
					$this->AppointmentStatus->setDbValue($this->Recordset->fields('AppointmentStatus'));
					$this->status->setDbValue($this->Recordset->fields('status'));
					$this->scheduler_id->setDbValue($this->Recordset->fields('scheduler_id'));
					$this->text->setDbValue($this->Recordset->fields('text'));
					$this->appointment_status->setDbValue($this->Recordset->fields('appointment_status'));
					$this->PId->setDbValue($this->Recordset->fields('PId'));
					$this->SchEmail->setDbValue($this->Recordset->fields('SchEmail'));
					$this->appointment_type->setDbValue($this->Recordset->fields('appointment_type'));
					$this->Notified->setDbValue($this->Recordset->fields('Notified'));
					$this->Notes->setDbValue($this->Recordset->fields('Notes'));
					$this->paymentType->setDbValue($this->Recordset->fields('paymentType'));
					$this->WhereDidYouHear->setDbValue($this->Recordset->fields('WhereDidYouHear'));
					$this->createdBy->setDbValue($this->Recordset->fields('createdBy'));
					$this->createdDateTime->setDbValue($this->Recordset->fields('createdDateTime'));
					$this->PatientTypee->setDbValue($this->Recordset->fields('PatientTypee'));
				} else {
					if (!CompareValue($this->patientID->DbValue, $this->Recordset->fields('patientID')))
						$this->patientID->CurrentValue = NULL;
					if (!CompareValue($this->patientName->DbValue, $this->Recordset->fields('patientName')))
						$this->patientName->CurrentValue = NULL;
					if (!CompareValue($this->MobileNumber->DbValue, $this->Recordset->fields('MobileNumber')))
						$this->MobileNumber->CurrentValue = NULL;
					if (!CompareValue($this->Purpose->DbValue, $this->Recordset->fields('Purpose')))
						$this->Purpose->CurrentValue = NULL;
					if (!CompareValue($this->PatientType->DbValue, $this->Recordset->fields('PatientType')))
						$this->PatientType->CurrentValue = NULL;
					if (!CompareValue($this->Referal->DbValue, $this->Recordset->fields('Referal')))
						$this->Referal->CurrentValue = NULL;
					if (!CompareValue($this->start_date->DbValue, $this->Recordset->fields('start_date')))
						$this->start_date->CurrentValue = NULL;
					if (!CompareValue($this->DoctorName->DbValue, $this->Recordset->fields('DoctorName')))
						$this->DoctorName->CurrentValue = NULL;
					if (!CompareValue($this->HospID->DbValue, $this->Recordset->fields('HospID')))
						$this->HospID->CurrentValue = NULL;
					if (!CompareValue($this->end_date->DbValue, $this->Recordset->fields('end_date')))
						$this->end_date->CurrentValue = NULL;
					if (!CompareValue($this->DoctorID->DbValue, $this->Recordset->fields('DoctorID')))
						$this->DoctorID->CurrentValue = NULL;
					if (!CompareValue($this->DoctorCode->DbValue, $this->Recordset->fields('DoctorCode')))
						$this->DoctorCode->CurrentValue = NULL;
					if (!CompareValue($this->Department->DbValue, $this->Recordset->fields('Department')))
						$this->Department->CurrentValue = NULL;
					if (!CompareValue($this->AppointmentStatus->DbValue, $this->Recordset->fields('AppointmentStatus')))
						$this->AppointmentStatus->CurrentValue = NULL;
					if (!CompareValue($this->status->DbValue, $this->Recordset->fields('status')))
						$this->status->CurrentValue = NULL;
					if (!CompareValue($this->scheduler_id->DbValue, $this->Recordset->fields('scheduler_id')))
						$this->scheduler_id->CurrentValue = NULL;
					if (!CompareValue($this->text->DbValue, $this->Recordset->fields('text')))
						$this->text->CurrentValue = NULL;
					if (!CompareValue($this->appointment_status->DbValue, $this->Recordset->fields('appointment_status')))
						$this->appointment_status->CurrentValue = NULL;
					if (!CompareValue($this->PId->DbValue, $this->Recordset->fields('PId')))
						$this->PId->CurrentValue = NULL;
					if (!CompareValue($this->SchEmail->DbValue, $this->Recordset->fields('SchEmail')))
						$this->SchEmail->CurrentValue = NULL;
					if (!CompareValue($this->appointment_type->DbValue, $this->Recordset->fields('appointment_type')))
						$this->appointment_type->CurrentValue = NULL;
					if (!CompareValue($this->Notified->DbValue, $this->Recordset->fields('Notified')))
						$this->Notified->CurrentValue = NULL;
					if (!CompareValue($this->Notes->DbValue, $this->Recordset->fields('Notes')))
						$this->Notes->CurrentValue = NULL;
					if (!CompareValue($this->paymentType->DbValue, $this->Recordset->fields('paymentType')))
						$this->paymentType->CurrentValue = NULL;
					if (!CompareValue($this->WhereDidYouHear->DbValue, $this->Recordset->fields('WhereDidYouHear')))
						$this->WhereDidYouHear->CurrentValue = NULL;
					if (!CompareValue($this->createdBy->DbValue, $this->Recordset->fields('createdBy')))
						$this->createdBy->CurrentValue = NULL;
					if (!CompareValue($this->createdDateTime->DbValue, $this->Recordset->fields('createdDateTime')))
						$this->createdDateTime->CurrentValue = NULL;
					if (!CompareValue($this->PatientTypee->DbValue, $this->Recordset->fields('PatientTypee')))
						$this->PatientTypee->CurrentValue = NULL;
				}
				$i++;
				$this->Recordset->moveNext();
			}
			$this->Recordset->close();
		}
	}

	// Set up key value
	protected function setupKeyValues($key)
	{
		$keyFld = $key;
		if (!is_numeric($keyFld))
			return FALSE;
		$this->id->CurrentValue = $keyFld;
		return TRUE;
	}

	// Update all selected rows
	protected function updateRows()
	{
		global $Language;
		$conn = &$this->getConnection();
		$conn->beginTrans();

		// Get old recordset
		$this->CurrentFilter = $this->getFilterFromRecordKeys();
		$sql = $this->getCurrentSql();
		$rsold = $conn->execute($sql);

		// Update all rows
		$key = "";
		foreach ($this->RecKeys as $reckey) {
			if ($this->setupKeyValues($reckey)) {
				$thisKey = $reckey;
				$this->SendEmail = FALSE; // Do not send email on update success
				$this->UpdateCount += 1; // Update record count for records being updated
				$updateRows = $this->editRow(); // Update this row
			} else {
				$updateRows = FALSE;
			}
			if (!$updateRows)
				break; // Update failed
			if ($key <> "")
				$key .= ", ";
			$key .= $thisKey;
		}

		// Check if all rows updated
		if ($updateRows) {
			$conn->commitTrans(); // Commit transaction

			// Get new recordset
			$rsnew = $conn->execute($sql);
		} else {
			$conn->rollbackTrans(); // Rollback transaction
		}
		return $updateRows;
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

		// Check field name 'patientID' first before field var 'x_patientID'
		$val = $CurrentForm->hasValue("patientID") ? $CurrentForm->getValue("patientID") : $CurrentForm->getValue("x_patientID");
		if (!$this->patientID->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->patientID->Visible = FALSE; // Disable update for API request
			else
				$this->patientID->setFormValue($val);
		}
		$this->patientID->MultiUpdate = $CurrentForm->getValue("u_patientID");

		// Check field name 'patientName' first before field var 'x_patientName'
		$val = $CurrentForm->hasValue("patientName") ? $CurrentForm->getValue("patientName") : $CurrentForm->getValue("x_patientName");
		if (!$this->patientName->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->patientName->Visible = FALSE; // Disable update for API request
			else
				$this->patientName->setFormValue($val);
		}
		$this->patientName->MultiUpdate = $CurrentForm->getValue("u_patientName");

		// Check field name 'MobileNumber' first before field var 'x_MobileNumber'
		$val = $CurrentForm->hasValue("MobileNumber") ? $CurrentForm->getValue("MobileNumber") : $CurrentForm->getValue("x_MobileNumber");
		if (!$this->MobileNumber->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->MobileNumber->Visible = FALSE; // Disable update for API request
			else
				$this->MobileNumber->setFormValue($val);
		}
		$this->MobileNumber->MultiUpdate = $CurrentForm->getValue("u_MobileNumber");

		// Check field name 'Purpose' first before field var 'x_Purpose'
		$val = $CurrentForm->hasValue("Purpose") ? $CurrentForm->getValue("Purpose") : $CurrentForm->getValue("x_Purpose");
		if (!$this->Purpose->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Purpose->Visible = FALSE; // Disable update for API request
			else
				$this->Purpose->setFormValue($val);
		}
		$this->Purpose->MultiUpdate = $CurrentForm->getValue("u_Purpose");

		// Check field name 'PatientType' first before field var 'x_PatientType'
		$val = $CurrentForm->hasValue("PatientType") ? $CurrentForm->getValue("PatientType") : $CurrentForm->getValue("x_PatientType");
		if (!$this->PatientType->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->PatientType->Visible = FALSE; // Disable update for API request
			else
				$this->PatientType->setFormValue($val);
		}
		$this->PatientType->MultiUpdate = $CurrentForm->getValue("u_PatientType");

		// Check field name 'Referal' first before field var 'x_Referal'
		$val = $CurrentForm->hasValue("Referal") ? $CurrentForm->getValue("Referal") : $CurrentForm->getValue("x_Referal");
		if (!$this->Referal->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Referal->Visible = FALSE; // Disable update for API request
			else
				$this->Referal->setFormValue($val);
		}
		$this->Referal->MultiUpdate = $CurrentForm->getValue("u_Referal");

		// Check field name 'start_date' first before field var 'x_start_date'
		$val = $CurrentForm->hasValue("start_date") ? $CurrentForm->getValue("start_date") : $CurrentForm->getValue("x_start_date");
		if (!$this->start_date->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->start_date->Visible = FALSE; // Disable update for API request
			else
				$this->start_date->setFormValue($val);
			$this->start_date->CurrentValue = UnFormatDateTime($this->start_date->CurrentValue, 11);
		}
		$this->start_date->MultiUpdate = $CurrentForm->getValue("u_start_date");

		// Check field name 'DoctorName' first before field var 'x_DoctorName'
		$val = $CurrentForm->hasValue("DoctorName") ? $CurrentForm->getValue("DoctorName") : $CurrentForm->getValue("x_DoctorName");
		if (!$this->DoctorName->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->DoctorName->Visible = FALSE; // Disable update for API request
			else
				$this->DoctorName->setFormValue($val);
		}
		$this->DoctorName->MultiUpdate = $CurrentForm->getValue("u_DoctorName");

		// Check field name 'HospID' first before field var 'x_HospID'
		$val = $CurrentForm->hasValue("HospID") ? $CurrentForm->getValue("HospID") : $CurrentForm->getValue("x_HospID");
		if (!$this->HospID->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->HospID->Visible = FALSE; // Disable update for API request
			else
				$this->HospID->setFormValue($val);
		}
		$this->HospID->MultiUpdate = $CurrentForm->getValue("u_HospID");

		// Check field name 'end_date' first before field var 'x_end_date'
		$val = $CurrentForm->hasValue("end_date") ? $CurrentForm->getValue("end_date") : $CurrentForm->getValue("x_end_date");
		if (!$this->end_date->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->end_date->Visible = FALSE; // Disable update for API request
			else
				$this->end_date->setFormValue($val);
			$this->end_date->CurrentValue = UnFormatDateTime($this->end_date->CurrentValue, 11);
		}
		$this->end_date->MultiUpdate = $CurrentForm->getValue("u_end_date");

		// Check field name 'DoctorID' first before field var 'x_DoctorID'
		$val = $CurrentForm->hasValue("DoctorID") ? $CurrentForm->getValue("DoctorID") : $CurrentForm->getValue("x_DoctorID");
		if (!$this->DoctorID->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->DoctorID->Visible = FALSE; // Disable update for API request
			else
				$this->DoctorID->setFormValue($val);
		}
		$this->DoctorID->MultiUpdate = $CurrentForm->getValue("u_DoctorID");

		// Check field name 'DoctorCode' first before field var 'x_DoctorCode'
		$val = $CurrentForm->hasValue("DoctorCode") ? $CurrentForm->getValue("DoctorCode") : $CurrentForm->getValue("x_DoctorCode");
		if (!$this->DoctorCode->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->DoctorCode->Visible = FALSE; // Disable update for API request
			else
				$this->DoctorCode->setFormValue($val);
		}
		$this->DoctorCode->MultiUpdate = $CurrentForm->getValue("u_DoctorCode");

		// Check field name 'Department' first before field var 'x_Department'
		$val = $CurrentForm->hasValue("Department") ? $CurrentForm->getValue("Department") : $CurrentForm->getValue("x_Department");
		if (!$this->Department->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Department->Visible = FALSE; // Disable update for API request
			else
				$this->Department->setFormValue($val);
		}
		$this->Department->MultiUpdate = $CurrentForm->getValue("u_Department");

		// Check field name 'AppointmentStatus' first before field var 'x_AppointmentStatus'
		$val = $CurrentForm->hasValue("AppointmentStatus") ? $CurrentForm->getValue("AppointmentStatus") : $CurrentForm->getValue("x_AppointmentStatus");
		if (!$this->AppointmentStatus->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->AppointmentStatus->Visible = FALSE; // Disable update for API request
			else
				$this->AppointmentStatus->setFormValue($val);
		}
		$this->AppointmentStatus->MultiUpdate = $CurrentForm->getValue("u_AppointmentStatus");

		// Check field name 'status' first before field var 'x_status'
		$val = $CurrentForm->hasValue("status") ? $CurrentForm->getValue("status") : $CurrentForm->getValue("x_status");
		if (!$this->status->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->status->Visible = FALSE; // Disable update for API request
			else
				$this->status->setFormValue($val);
		}
		$this->status->MultiUpdate = $CurrentForm->getValue("u_status");

		// Check field name 'scheduler_id' first before field var 'x_scheduler_id'
		$val = $CurrentForm->hasValue("scheduler_id") ? $CurrentForm->getValue("scheduler_id") : $CurrentForm->getValue("x_scheduler_id");
		if (!$this->scheduler_id->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->scheduler_id->Visible = FALSE; // Disable update for API request
			else
				$this->scheduler_id->setFormValue($val);
		}
		$this->scheduler_id->MultiUpdate = $CurrentForm->getValue("u_scheduler_id");

		// Check field name 'text' first before field var 'x_text'
		$val = $CurrentForm->hasValue("text") ? $CurrentForm->getValue("text") : $CurrentForm->getValue("x_text");
		if (!$this->text->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->text->Visible = FALSE; // Disable update for API request
			else
				$this->text->setFormValue($val);
		}
		$this->text->MultiUpdate = $CurrentForm->getValue("u_text");

		// Check field name 'appointment_status' first before field var 'x_appointment_status'
		$val = $CurrentForm->hasValue("appointment_status") ? $CurrentForm->getValue("appointment_status") : $CurrentForm->getValue("x_appointment_status");
		if (!$this->appointment_status->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->appointment_status->Visible = FALSE; // Disable update for API request
			else
				$this->appointment_status->setFormValue($val);
		}
		$this->appointment_status->MultiUpdate = $CurrentForm->getValue("u_appointment_status");

		// Check field name 'PId' first before field var 'x_PId'
		$val = $CurrentForm->hasValue("PId") ? $CurrentForm->getValue("PId") : $CurrentForm->getValue("x_PId");
		if (!$this->PId->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->PId->Visible = FALSE; // Disable update for API request
			else
				$this->PId->setFormValue($val);
		}
		$this->PId->MultiUpdate = $CurrentForm->getValue("u_PId");

		// Check field name 'SchEmail' first before field var 'x_SchEmail'
		$val = $CurrentForm->hasValue("SchEmail") ? $CurrentForm->getValue("SchEmail") : $CurrentForm->getValue("x_SchEmail");
		if (!$this->SchEmail->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->SchEmail->Visible = FALSE; // Disable update for API request
			else
				$this->SchEmail->setFormValue($val);
		}
		$this->SchEmail->MultiUpdate = $CurrentForm->getValue("u_SchEmail");

		// Check field name 'appointment_type' first before field var 'x_appointment_type'
		$val = $CurrentForm->hasValue("appointment_type") ? $CurrentForm->getValue("appointment_type") : $CurrentForm->getValue("x_appointment_type");
		if (!$this->appointment_type->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->appointment_type->Visible = FALSE; // Disable update for API request
			else
				$this->appointment_type->setFormValue($val);
		}
		$this->appointment_type->MultiUpdate = $CurrentForm->getValue("u_appointment_type");

		// Check field name 'Notified' first before field var 'x_Notified'
		$val = $CurrentForm->hasValue("Notified") ? $CurrentForm->getValue("Notified") : $CurrentForm->getValue("x_Notified");
		if (!$this->Notified->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Notified->Visible = FALSE; // Disable update for API request
			else
				$this->Notified->setFormValue($val);
		}
		$this->Notified->MultiUpdate = $CurrentForm->getValue("u_Notified");

		// Check field name 'Notes' first before field var 'x_Notes'
		$val = $CurrentForm->hasValue("Notes") ? $CurrentForm->getValue("Notes") : $CurrentForm->getValue("x_Notes");
		if (!$this->Notes->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Notes->Visible = FALSE; // Disable update for API request
			else
				$this->Notes->setFormValue($val);
		}
		$this->Notes->MultiUpdate = $CurrentForm->getValue("u_Notes");

		// Check field name 'paymentType' first before field var 'x_paymentType'
		$val = $CurrentForm->hasValue("paymentType") ? $CurrentForm->getValue("paymentType") : $CurrentForm->getValue("x_paymentType");
		if (!$this->paymentType->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->paymentType->Visible = FALSE; // Disable update for API request
			else
				$this->paymentType->setFormValue($val);
		}
		$this->paymentType->MultiUpdate = $CurrentForm->getValue("u_paymentType");

		// Check field name 'WhereDidYouHear' first before field var 'x_WhereDidYouHear'
		$val = $CurrentForm->hasValue("WhereDidYouHear") ? $CurrentForm->getValue("WhereDidYouHear") : $CurrentForm->getValue("x_WhereDidYouHear");
		if (!$this->WhereDidYouHear->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->WhereDidYouHear->Visible = FALSE; // Disable update for API request
			else
				$this->WhereDidYouHear->setFormValue($val);
		}
		$this->WhereDidYouHear->MultiUpdate = $CurrentForm->getValue("u_WhereDidYouHear");

		// Check field name 'createdBy' first before field var 'x_createdBy'
		$val = $CurrentForm->hasValue("createdBy") ? $CurrentForm->getValue("createdBy") : $CurrentForm->getValue("x_createdBy");
		if (!$this->createdBy->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->createdBy->Visible = FALSE; // Disable update for API request
			else
				$this->createdBy->setFormValue($val);
		}
		$this->createdBy->MultiUpdate = $CurrentForm->getValue("u_createdBy");

		// Check field name 'createdDateTime' first before field var 'x_createdDateTime'
		$val = $CurrentForm->hasValue("createdDateTime") ? $CurrentForm->getValue("createdDateTime") : $CurrentForm->getValue("x_createdDateTime");
		if (!$this->createdDateTime->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->createdDateTime->Visible = FALSE; // Disable update for API request
			else
				$this->createdDateTime->setFormValue($val);
			$this->createdDateTime->CurrentValue = UnFormatDateTime($this->createdDateTime->CurrentValue, 0);
		}
		$this->createdDateTime->MultiUpdate = $CurrentForm->getValue("u_createdDateTime");

		// Check field name 'PatientTypee' first before field var 'x_PatientTypee'
		$val = $CurrentForm->hasValue("PatientTypee") ? $CurrentForm->getValue("PatientTypee") : $CurrentForm->getValue("x_PatientTypee");
		if (!$this->PatientTypee->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->PatientTypee->Visible = FALSE; // Disable update for API request
			else
				$this->PatientTypee->setFormValue($val);
		}
		$this->PatientTypee->MultiUpdate = $CurrentForm->getValue("u_PatientTypee");

		// Check field name 'id' first before field var 'x_id'
		$val = $CurrentForm->hasValue("id") ? $CurrentForm->getValue("id") : $CurrentForm->getValue("x_id");
		if (!$this->id->IsDetailKey)
			$this->id->setFormValue($val);
	}

	// Restore form values
	public function restoreFormValues()
	{
		global $CurrentForm;
		$this->id->CurrentValue = $this->id->FormValue;
		$this->patientID->CurrentValue = $this->patientID->FormValue;
		$this->patientName->CurrentValue = $this->patientName->FormValue;
		$this->MobileNumber->CurrentValue = $this->MobileNumber->FormValue;
		$this->Purpose->CurrentValue = $this->Purpose->FormValue;
		$this->PatientType->CurrentValue = $this->PatientType->FormValue;
		$this->Referal->CurrentValue = $this->Referal->FormValue;
		$this->start_date->CurrentValue = $this->start_date->FormValue;
		$this->start_date->CurrentValue = UnFormatDateTime($this->start_date->CurrentValue, 11);
		$this->DoctorName->CurrentValue = $this->DoctorName->FormValue;
		$this->HospID->CurrentValue = $this->HospID->FormValue;
		$this->end_date->CurrentValue = $this->end_date->FormValue;
		$this->end_date->CurrentValue = UnFormatDateTime($this->end_date->CurrentValue, 11);
		$this->DoctorID->CurrentValue = $this->DoctorID->FormValue;
		$this->DoctorCode->CurrentValue = $this->DoctorCode->FormValue;
		$this->Department->CurrentValue = $this->Department->FormValue;
		$this->AppointmentStatus->CurrentValue = $this->AppointmentStatus->FormValue;
		$this->status->CurrentValue = $this->status->FormValue;
		$this->scheduler_id->CurrentValue = $this->scheduler_id->FormValue;
		$this->text->CurrentValue = $this->text->FormValue;
		$this->appointment_status->CurrentValue = $this->appointment_status->FormValue;
		$this->PId->CurrentValue = $this->PId->FormValue;
		$this->SchEmail->CurrentValue = $this->SchEmail->FormValue;
		$this->appointment_type->CurrentValue = $this->appointment_type->FormValue;
		$this->Notified->CurrentValue = $this->Notified->FormValue;
		$this->Notes->CurrentValue = $this->Notes->FormValue;
		$this->paymentType->CurrentValue = $this->paymentType->FormValue;
		$this->WhereDidYouHear->CurrentValue = $this->WhereDidYouHear->FormValue;
		$this->createdBy->CurrentValue = $this->createdBy->FormValue;
		$this->createdDateTime->CurrentValue = $this->createdDateTime->FormValue;
		$this->createdDateTime->CurrentValue = UnFormatDateTime($this->createdDateTime->CurrentValue, 0);
		$this->PatientTypee->CurrentValue = $this->PatientTypee->FormValue;
	}

	// Load recordset
	public function loadRecordset($offset = -1, $rowcnt = -1)
	{

		// Load List page SQL
		$sql = $this->getListSql();
		$conn = &$this->getConnection();

		// Load recordset
		$dbtype = GetConnectionType($this->Dbid);
		if ($this->UseSelectLimit) {
			$conn->raiseErrorFn = $GLOBALS["ERROR_FUNC"];
			if ($dbtype == "MSSQL") {
				$rs = $conn->selectLimit($sql, $rowcnt, $offset, ["_hasOrderBy" => trim($this->getOrderBy()) || trim($this->getSessionOrderByList())]);
			} else {
				$rs = $conn->selectLimit($sql, $rowcnt, $offset);
			}
			$conn->raiseErrorFn = '';
		} else {
			$rs = LoadRecordset($sql, $conn);
		}

		// Call Recordset Selected event
		$this->Recordset_Selected($rs);
		return $rs;
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
		$this->patientID->setDbValue($row['patientID']);
		if (array_key_exists('EV__patientID', $rs->fields)) {
			$this->patientID->VirtualValue = $rs->fields('EV__patientID'); // Set up virtual field value
		} else {
			$this->patientID->VirtualValue = ""; // Clear value
		}
		$this->patientName->setDbValue($row['patientName']);
		$this->MobileNumber->setDbValue($row['MobileNumber']);
		$this->Purpose->setDbValue($row['Purpose']);
		$this->PatientType->setDbValue($row['PatientType']);
		$this->Referal->setDbValue($row['Referal']);
		if (array_key_exists('EV__Referal', $rs->fields)) {
			$this->Referal->VirtualValue = $rs->fields('EV__Referal'); // Set up virtual field value
		} else {
			$this->Referal->VirtualValue = ""; // Clear value
		}
		$this->start_date->setDbValue($row['start_date']);
		$this->DoctorName->setDbValue($row['DoctorName']);
		$this->HospID->setDbValue($row['HospID']);
		$this->end_date->setDbValue($row['end_date']);
		$this->DoctorID->setDbValue($row['DoctorID']);
		$this->DoctorCode->setDbValue($row['DoctorCode']);
		$this->Department->setDbValue($row['Department']);
		$this->AppointmentStatus->setDbValue($row['AppointmentStatus']);
		$this->status->setDbValue($row['status']);
		$this->scheduler_id->setDbValue($row['scheduler_id']);
		$this->text->setDbValue($row['text']);
		$this->appointment_status->setDbValue($row['appointment_status']);
		$this->PId->setDbValue($row['PId']);
		$this->SchEmail->setDbValue($row['SchEmail']);
		$this->appointment_type->setDbValue($row['appointment_type']);
		$this->Notified->setDbValue($row['Notified']);
		$this->Notes->setDbValue($row['Notes']);
		$this->paymentType->setDbValue($row['paymentType']);
		$this->WhereDidYouHear->setDbValue($row['WhereDidYouHear']);
		$this->createdBy->setDbValue($row['createdBy']);
		$this->createdDateTime->setDbValue($row['createdDateTime']);
		$this->PatientTypee->setDbValue($row['PatientTypee']);
	}

	// Return a row with default values
	protected function newRow()
	{
		$row = [];
		$row['id'] = NULL;
		$row['patientID'] = NULL;
		$row['patientName'] = NULL;
		$row['MobileNumber'] = NULL;
		$row['Purpose'] = NULL;
		$row['PatientType'] = NULL;
		$row['Referal'] = NULL;
		$row['start_date'] = NULL;
		$row['DoctorName'] = NULL;
		$row['HospID'] = NULL;
		$row['end_date'] = NULL;
		$row['DoctorID'] = NULL;
		$row['DoctorCode'] = NULL;
		$row['Department'] = NULL;
		$row['AppointmentStatus'] = NULL;
		$row['status'] = NULL;
		$row['scheduler_id'] = NULL;
		$row['text'] = NULL;
		$row['appointment_status'] = NULL;
		$row['PId'] = NULL;
		$row['SchEmail'] = NULL;
		$row['appointment_type'] = NULL;
		$row['Notified'] = NULL;
		$row['Notes'] = NULL;
		$row['paymentType'] = NULL;
		$row['WhereDidYouHear'] = NULL;
		$row['createdBy'] = NULL;
		$row['createdDateTime'] = NULL;
		$row['PatientTypee'] = NULL;
		return $row;
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
		// patientID
		// patientName
		// MobileNumber
		// Purpose
		// PatientType
		// Referal
		// start_date
		// DoctorName
		// HospID
		// end_date
		// DoctorID
		// DoctorCode
		// Department
		// AppointmentStatus
		// status
		// scheduler_id
		// text
		// appointment_status
		// PId
		// SchEmail
		// appointment_type
		// Notified
		// Notes
		// paymentType
		// WhereDidYouHear
		// createdBy
		// createdDateTime
		// PatientTypee

		if ($this->RowType == ROWTYPE_VIEW) { // View row

			// id
			$this->id->ViewValue = $this->id->CurrentValue;
			$this->id->ViewCustomAttributes = "";

			// patientID
			if ($this->patientID->VirtualValue <> "") {
				$this->patientID->ViewValue = $this->patientID->VirtualValue;
			} else {
			$curVal = strval($this->patientID->CurrentValue);
			if ($curVal <> "") {
				$this->patientID->ViewValue = $this->patientID->lookupCacheOption($curVal);
				if ($this->patientID->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`PatientID`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$lookupFilter = function() {
						return "`HospID`='".HospitalID()."'";
					};
					$lookupFilter = $lookupFilter->bindTo($this);
					$sqlWrk = $this->patientID->Lookup->getSql(FALSE, $filterWrk, $lookupFilter, $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = $rswrk->fields('df');
						$arwrk[2] = $rswrk->fields('df2');
						$arwrk[3] = $rswrk->fields('df3');
						$arwrk[4] = $rswrk->fields('df4');
						$this->patientID->ViewValue = $this->patientID->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->patientID->ViewValue = $this->patientID->CurrentValue;
					}
				}
			} else {
				$this->patientID->ViewValue = NULL;
			}
			}
			$this->patientID->ViewCustomAttributes = "";

			// patientName
			$this->patientName->ViewValue = $this->patientName->CurrentValue;
			$this->patientName->ViewCustomAttributes = "";

			// MobileNumber
			$this->MobileNumber->ViewValue = $this->MobileNumber->CurrentValue;
			$this->MobileNumber->ViewCustomAttributes = "";

			// Purpose
			$this->Purpose->ViewValue = $this->Purpose->CurrentValue;
			$this->Purpose->ViewCustomAttributes = "";

			// PatientType
			if (strval($this->PatientType->CurrentValue) <> "") {
				$this->PatientType->ViewValue = $this->PatientType->optionCaption($this->PatientType->CurrentValue);
			} else {
				$this->PatientType->ViewValue = NULL;
			}
			$this->PatientType->ViewCustomAttributes = "";

			// Referal
			if ($this->Referal->VirtualValue <> "") {
				$this->Referal->ViewValue = $this->Referal->VirtualValue;
			} else {
			$curVal = strval($this->Referal->CurrentValue);
			if ($curVal <> "") {
				$this->Referal->ViewValue = $this->Referal->lookupCacheOption($curVal);
				if ($this->Referal->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`reference`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->Referal->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = $rswrk->fields('df');
						$this->Referal->ViewValue = $this->Referal->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->Referal->ViewValue = $this->Referal->CurrentValue;
					}
				}
			} else {
				$this->Referal->ViewValue = NULL;
			}
			}
			$this->Referal->ViewCustomAttributes = "";

			// start_date
			$this->start_date->ViewValue = $this->start_date->CurrentValue;
			$this->start_date->ViewValue = FormatDateTime($this->start_date->ViewValue, 11);
			$this->start_date->ViewCustomAttributes = "";

			// DoctorName
			$curVal = strval($this->DoctorName->CurrentValue);
			if ($curVal <> "") {
				$this->DoctorName->ViewValue = $this->DoctorName->lookupCacheOption($curVal);
				if ($this->DoctorName->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`NAME`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->DoctorName->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = $rswrk->fields('df');
						$this->DoctorName->ViewValue = $this->DoctorName->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->DoctorName->ViewValue = $this->DoctorName->CurrentValue;
					}
				}
			} else {
				$this->DoctorName->ViewValue = NULL;
			}
			$this->DoctorName->ViewCustomAttributes = "";

			// HospID
			$this->HospID->ViewValue = $this->HospID->CurrentValue;
			$this->HospID->ViewValue = FormatNumber($this->HospID->ViewValue, 0, -2, -2, -2);
			$this->HospID->ViewCustomAttributes = "";

			// end_date
			$this->end_date->ViewValue = $this->end_date->CurrentValue;
			$this->end_date->ViewValue = FormatDateTime($this->end_date->ViewValue, 11);
			$this->end_date->ViewCustomAttributes = "";

			// DoctorID
			$this->DoctorID->ViewValue = $this->DoctorID->CurrentValue;
			$this->DoctorID->ViewCustomAttributes = "";

			// DoctorCode
			$this->DoctorCode->ViewValue = $this->DoctorCode->CurrentValue;
			$this->DoctorCode->ViewCustomAttributes = "";

			// Department
			$this->Department->ViewValue = $this->Department->CurrentValue;
			$this->Department->ViewCustomAttributes = "";

			// AppointmentStatus
			$this->AppointmentStatus->ViewValue = $this->AppointmentStatus->CurrentValue;
			$this->AppointmentStatus->ViewCustomAttributes = "";

			// status
			if (strval($this->status->CurrentValue) <> "") {
				$this->status->ViewValue = new OptionValues();
				$arwrk = explode(",", strval($this->status->CurrentValue));
				$cnt = count($arwrk);
				for ($ari = 0; $ari < $cnt; $ari++)
					$this->status->ViewValue->add($this->status->optionCaption(trim($arwrk[$ari])));
			} else {
				$this->status->ViewValue = NULL;
			}
			$this->status->ViewCustomAttributes = "";

			// scheduler_id
			$this->scheduler_id->ViewValue = $this->scheduler_id->CurrentValue;
			$this->scheduler_id->ViewCustomAttributes = "";

			// text
			$this->text->ViewValue = $this->text->CurrentValue;
			$this->text->ViewCustomAttributes = "";

			// appointment_status
			$this->appointment_status->ViewValue = $this->appointment_status->CurrentValue;
			$this->appointment_status->ViewCustomAttributes = "";

			// PId
			$this->PId->ViewValue = $this->PId->CurrentValue;
			$this->PId->ViewValue = FormatNumber($this->PId->ViewValue, 0, -2, -2, -2);
			$this->PId->ViewCustomAttributes = "";

			// SchEmail
			$this->SchEmail->ViewValue = $this->SchEmail->CurrentValue;
			$this->SchEmail->ViewCustomAttributes = "";

			// appointment_type
			if (strval($this->appointment_type->CurrentValue) <> "") {
				$this->appointment_type->ViewValue = $this->appointment_type->optionCaption($this->appointment_type->CurrentValue);
			} else {
				$this->appointment_type->ViewValue = NULL;
			}
			$this->appointment_type->ViewCustomAttributes = "";

			// Notified
			if (strval($this->Notified->CurrentValue) <> "") {
				$this->Notified->ViewValue = new OptionValues();
				$arwrk = explode(",", strval($this->Notified->CurrentValue));
				$cnt = count($arwrk);
				for ($ari = 0; $ari < $cnt; $ari++)
					$this->Notified->ViewValue->add($this->Notified->optionCaption(trim($arwrk[$ari])));
			} else {
				$this->Notified->ViewValue = NULL;
			}
			$this->Notified->ViewCustomAttributes = "";

			// Notes
			$this->Notes->ViewValue = $this->Notes->CurrentValue;
			$this->Notes->ViewCustomAttributes = "";

			// paymentType
			$this->paymentType->ViewValue = $this->paymentType->CurrentValue;
			$this->paymentType->ViewCustomAttributes = "";

			// WhereDidYouHear
			$curVal = strval($this->WhereDidYouHear->CurrentValue);
			if ($curVal <> "") {
				$this->WhereDidYouHear->ViewValue = $this->WhereDidYouHear->lookupCacheOption($curVal);
				if ($this->WhereDidYouHear->ViewValue === NULL) { // Lookup from database
					$arwrk = explode(",", $curVal);
					$filterWrk = "";
					foreach ($arwrk as $wrk) {
						if ($filterWrk <> "")
							$filterWrk .= " OR ";
						$filterWrk .= "`Job`" . SearchString("=", trim($wrk), DATATYPE_STRING, "");
					}
					$sqlWrk = $this->WhereDidYouHear->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$this->WhereDidYouHear->ViewValue = new OptionValues();
						$ari = 0;
						while (!$rswrk->EOF) {
							$arwrk = array();
							$arwrk[1] = $rswrk->fields('df');
							$this->WhereDidYouHear->ViewValue->add($this->WhereDidYouHear->displayValue($arwrk));
							$rswrk->MoveNext();
							$ari++;
						}
						$rswrk->Close();
					} else {
						$this->WhereDidYouHear->ViewValue = $this->WhereDidYouHear->CurrentValue;
					}
				}
			} else {
				$this->WhereDidYouHear->ViewValue = NULL;
			}
			$this->WhereDidYouHear->ViewCustomAttributes = "";

			// createdBy
			$this->createdBy->ViewValue = $this->createdBy->CurrentValue;
			$this->createdBy->ViewCustomAttributes = "";

			// createdDateTime
			$this->createdDateTime->ViewValue = $this->createdDateTime->CurrentValue;
			$this->createdDateTime->ViewValue = FormatDateTime($this->createdDateTime->ViewValue, 0);
			$this->createdDateTime->ViewCustomAttributes = "";

			// PatientTypee
			$curVal = strval($this->PatientTypee->CurrentValue);
			if ($curVal <> "") {
				$this->PatientTypee->ViewValue = $this->PatientTypee->lookupCacheOption($curVal);
				if ($this->PatientTypee->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->PatientTypee->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = $rswrk->fields('df');
						$this->PatientTypee->ViewValue = $this->PatientTypee->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->PatientTypee->ViewValue = $this->PatientTypee->CurrentValue;
					}
				}
			} else {
				$this->PatientTypee->ViewValue = NULL;
			}
			$this->PatientTypee->ViewCustomAttributes = "";

			// patientID
			$this->patientID->LinkCustomAttributes = "";
			$this->patientID->HrefValue = "";
			$this->patientID->TooltipValue = "";

			// patientName
			$this->patientName->LinkCustomAttributes = "";
			$this->patientName->HrefValue = "";
			$this->patientName->TooltipValue = "";

			// MobileNumber
			$this->MobileNumber->LinkCustomAttributes = "";
			$this->MobileNumber->HrefValue = "";
			$this->MobileNumber->TooltipValue = "";

			// Purpose
			$this->Purpose->LinkCustomAttributes = "";
			$this->Purpose->HrefValue = "";
			$this->Purpose->TooltipValue = "";

			// PatientType
			$this->PatientType->LinkCustomAttributes = "";
			$this->PatientType->HrefValue = "";
			$this->PatientType->TooltipValue = "";

			// Referal
			$this->Referal->LinkCustomAttributes = "";
			$this->Referal->HrefValue = "";
			$this->Referal->TooltipValue = "";

			// start_date
			$this->start_date->LinkCustomAttributes = "";
			$this->start_date->HrefValue = "";
			$this->start_date->TooltipValue = "";

			// DoctorName
			$this->DoctorName->LinkCustomAttributes = "";
			$this->DoctorName->HrefValue = "";
			$this->DoctorName->TooltipValue = "";

			// HospID
			$this->HospID->LinkCustomAttributes = "";
			$this->HospID->HrefValue = "";
			$this->HospID->TooltipValue = "";

			// end_date
			$this->end_date->LinkCustomAttributes = "";
			$this->end_date->HrefValue = "";
			$this->end_date->TooltipValue = "";

			// DoctorID
			$this->DoctorID->LinkCustomAttributes = "";
			$this->DoctorID->HrefValue = "";
			$this->DoctorID->TooltipValue = "";

			// DoctorCode
			$this->DoctorCode->LinkCustomAttributes = "";
			$this->DoctorCode->HrefValue = "";
			$this->DoctorCode->TooltipValue = "";

			// Department
			$this->Department->LinkCustomAttributes = "";
			$this->Department->HrefValue = "";
			$this->Department->TooltipValue = "";

			// AppointmentStatus
			$this->AppointmentStatus->LinkCustomAttributes = "";
			$this->AppointmentStatus->HrefValue = "";
			$this->AppointmentStatus->TooltipValue = "";

			// status
			$this->status->LinkCustomAttributes = "";
			$this->status->HrefValue = "";
			$this->status->TooltipValue = "";

			// scheduler_id
			$this->scheduler_id->LinkCustomAttributes = "";
			$this->scheduler_id->HrefValue = "";
			$this->scheduler_id->TooltipValue = "";

			// text
			$this->text->LinkCustomAttributes = "";
			$this->text->HrefValue = "";
			$this->text->TooltipValue = "";

			// appointment_status
			$this->appointment_status->LinkCustomAttributes = "";
			$this->appointment_status->HrefValue = "";
			$this->appointment_status->TooltipValue = "";

			// PId
			$this->PId->LinkCustomAttributes = "";
			$this->PId->HrefValue = "";
			$this->PId->TooltipValue = "";

			// SchEmail
			$this->SchEmail->LinkCustomAttributes = "";
			$this->SchEmail->HrefValue = "";
			$this->SchEmail->TooltipValue = "";

			// appointment_type
			$this->appointment_type->LinkCustomAttributes = "";
			$this->appointment_type->HrefValue = "";
			$this->appointment_type->TooltipValue = "";

			// Notified
			$this->Notified->LinkCustomAttributes = "";
			$this->Notified->HrefValue = "";
			$this->Notified->TooltipValue = "";

			// Notes
			$this->Notes->LinkCustomAttributes = "";
			$this->Notes->HrefValue = "";
			$this->Notes->TooltipValue = "";

			// paymentType
			$this->paymentType->LinkCustomAttributes = "";
			$this->paymentType->HrefValue = "";
			$this->paymentType->TooltipValue = "";

			// WhereDidYouHear
			$this->WhereDidYouHear->LinkCustomAttributes = "";
			$this->WhereDidYouHear->HrefValue = "";
			$this->WhereDidYouHear->TooltipValue = "";

			// createdBy
			$this->createdBy->LinkCustomAttributes = "";
			$this->createdBy->HrefValue = "";
			$this->createdBy->TooltipValue = "";

			// createdDateTime
			$this->createdDateTime->LinkCustomAttributes = "";
			$this->createdDateTime->HrefValue = "";
			$this->createdDateTime->TooltipValue = "";

			// PatientTypee
			$this->PatientTypee->LinkCustomAttributes = "";
			$this->PatientTypee->HrefValue = "";
			$this->PatientTypee->TooltipValue = "";
		} elseif ($this->RowType == ROWTYPE_EDIT) { // Edit row

			// patientID
			$this->patientID->EditCustomAttributes = "";
			$curVal = trim(strval($this->patientID->CurrentValue));
			if ($curVal <> "")
				$this->patientID->ViewValue = $this->patientID->lookupCacheOption($curVal);
			else
				$this->patientID->ViewValue = $this->patientID->Lookup !== NULL && is_array($this->patientID->Lookup->Options) ? $curVal : NULL;
			if ($this->patientID->ViewValue !== NULL) { // Load from cache
				$this->patientID->EditValue = array_values($this->patientID->Lookup->Options);
				if ($this->patientID->ViewValue == "")
					$this->patientID->ViewValue = $Language->phrase("PleaseSelect");
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`PatientID`" . SearchString("=", $this->patientID->CurrentValue, DATATYPE_STRING, "");
				}
				$lookupFilter = function() {
					return "`HospID`='".HospitalID()."'";
				};
				$lookupFilter = $lookupFilter->bindTo($this);
				$sqlWrk = $this->patientID->Lookup->getSql(TRUE, $filterWrk, $lookupFilter, $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = array();
					$arwrk[1] = HtmlEncode($rswrk->fields('df'));
					$arwrk[2] = HtmlEncode($rswrk->fields('df2'));
					$arwrk[3] = HtmlEncode($rswrk->fields('df3'));
					$arwrk[4] = HtmlEncode($rswrk->fields('df4'));
					$this->patientID->ViewValue = $this->patientID->displayValue($arwrk);
				} else {
					$this->patientID->ViewValue = $Language->phrase("PleaseSelect");
				}
				$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
				if ($rswrk) $rswrk->Close();
				$this->patientID->EditValue = $arwrk;
			}

			// patientName
			$this->patientName->EditAttrs["class"] = "form-control";
			$this->patientName->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->patientName->CurrentValue = HtmlDecode($this->patientName->CurrentValue);
			$this->patientName->EditValue = HtmlEncode($this->patientName->CurrentValue);
			$this->patientName->PlaceHolder = RemoveHtml($this->patientName->caption());

			// MobileNumber
			$this->MobileNumber->EditAttrs["class"] = "form-control";
			$this->MobileNumber->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->MobileNumber->CurrentValue = HtmlDecode($this->MobileNumber->CurrentValue);
			$this->MobileNumber->EditValue = HtmlEncode($this->MobileNumber->CurrentValue);
			$this->MobileNumber->PlaceHolder = RemoveHtml($this->MobileNumber->caption());

			// Purpose
			$this->Purpose->EditAttrs["class"] = "form-control";
			$this->Purpose->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Purpose->CurrentValue = HtmlDecode($this->Purpose->CurrentValue);
			$this->Purpose->EditValue = HtmlEncode($this->Purpose->CurrentValue);
			$this->Purpose->PlaceHolder = RemoveHtml($this->Purpose->caption());

			// PatientType
			$this->PatientType->EditCustomAttributes = "";
			$this->PatientType->EditValue = $this->PatientType->options(FALSE);

			// Referal
			$this->Referal->EditCustomAttributes = "";
			$curVal = trim(strval($this->Referal->CurrentValue));
			if ($curVal <> "")
				$this->Referal->ViewValue = $this->Referal->lookupCacheOption($curVal);
			else
				$this->Referal->ViewValue = $this->Referal->Lookup !== NULL && is_array($this->Referal->Lookup->Options) ? $curVal : NULL;
			if ($this->Referal->ViewValue !== NULL) { // Load from cache
				$this->Referal->EditValue = array_values($this->Referal->Lookup->Options);
				if ($this->Referal->ViewValue == "")
					$this->Referal->ViewValue = $Language->phrase("PleaseSelect");
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`reference`" . SearchString("=", $this->Referal->CurrentValue, DATATYPE_STRING, "");
				}
				$sqlWrk = $this->Referal->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = array();
					$arwrk[1] = HtmlEncode($rswrk->fields('df'));
					$this->Referal->ViewValue = $this->Referal->displayValue($arwrk);
				} else {
					$this->Referal->ViewValue = $Language->phrase("PleaseSelect");
				}
				$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
				if ($rswrk) $rswrk->Close();
				$this->Referal->EditValue = $arwrk;
			}

			// start_date
			$this->start_date->EditAttrs["class"] = "form-control";
			$this->start_date->EditCustomAttributes = "";
			$this->start_date->EditValue = HtmlEncode(FormatDateTime($this->start_date->CurrentValue, 11));
			$this->start_date->PlaceHolder = RemoveHtml($this->start_date->caption());

			// DoctorName
			$this->DoctorName->EditCustomAttributes = "";
			$curVal = trim(strval($this->DoctorName->CurrentValue));
			if ($curVal <> "")
				$this->DoctorName->ViewValue = $this->DoctorName->lookupCacheOption($curVal);
			else
				$this->DoctorName->ViewValue = $this->DoctorName->Lookup !== NULL && is_array($this->DoctorName->Lookup->Options) ? $curVal : NULL;
			if ($this->DoctorName->ViewValue !== NULL) { // Load from cache
				$this->DoctorName->EditValue = array_values($this->DoctorName->Lookup->Options);
				if ($this->DoctorName->ViewValue == "")
					$this->DoctorName->ViewValue = $Language->phrase("PleaseSelect");
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`NAME`" . SearchString("=", $this->DoctorName->CurrentValue, DATATYPE_STRING, "");
				}
				$sqlWrk = $this->DoctorName->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = array();
					$arwrk[1] = HtmlEncode($rswrk->fields('df'));
					$this->DoctorName->ViewValue = $this->DoctorName->displayValue($arwrk);
				} else {
					$this->DoctorName->ViewValue = $Language->phrase("PleaseSelect");
				}
				$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
				if ($rswrk) $rswrk->Close();
				$this->DoctorName->EditValue = $arwrk;
			}

			// HospID
			// end_date

			$this->end_date->EditAttrs["class"] = "form-control";
			$this->end_date->EditCustomAttributes = "";
			$this->end_date->EditValue = HtmlEncode(FormatDateTime($this->end_date->CurrentValue, 11));
			$this->end_date->PlaceHolder = RemoveHtml($this->end_date->caption());

			// DoctorID
			$this->DoctorID->EditAttrs["class"] = "form-control";
			$this->DoctorID->EditCustomAttributes = "";
			$this->DoctorID->EditValue = HtmlEncode($this->DoctorID->CurrentValue);
			$this->DoctorID->PlaceHolder = RemoveHtml($this->DoctorID->caption());

			// DoctorCode
			$this->DoctorCode->EditAttrs["class"] = "form-control";
			$this->DoctorCode->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->DoctorCode->CurrentValue = HtmlDecode($this->DoctorCode->CurrentValue);
			$this->DoctorCode->EditValue = HtmlEncode($this->DoctorCode->CurrentValue);
			$this->DoctorCode->PlaceHolder = RemoveHtml($this->DoctorCode->caption());

			// Department
			$this->Department->EditAttrs["class"] = "form-control";
			$this->Department->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Department->CurrentValue = HtmlDecode($this->Department->CurrentValue);
			$this->Department->EditValue = HtmlEncode($this->Department->CurrentValue);
			$this->Department->PlaceHolder = RemoveHtml($this->Department->caption());

			// AppointmentStatus
			$this->AppointmentStatus->EditAttrs["class"] = "form-control";
			$this->AppointmentStatus->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->AppointmentStatus->CurrentValue = HtmlDecode($this->AppointmentStatus->CurrentValue);
			$this->AppointmentStatus->EditValue = HtmlEncode($this->AppointmentStatus->CurrentValue);
			$this->AppointmentStatus->PlaceHolder = RemoveHtml($this->AppointmentStatus->caption());

			// status
			$this->status->EditCustomAttributes = "";
			$this->status->EditValue = $this->status->options(FALSE);

			// scheduler_id
			$this->scheduler_id->EditAttrs["class"] = "form-control";
			$this->scheduler_id->EditCustomAttributes = "";
			$this->scheduler_id->EditValue = $this->scheduler_id->CurrentValue;
			$this->scheduler_id->ViewCustomAttributes = "";

			// text
			$this->text->EditAttrs["class"] = "form-control";
			$this->text->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->text->CurrentValue = HtmlDecode($this->text->CurrentValue);
			$this->text->EditValue = HtmlEncode($this->text->CurrentValue);
			$this->text->PlaceHolder = RemoveHtml($this->text->caption());

			// appointment_status
			$this->appointment_status->EditAttrs["class"] = "form-control";
			$this->appointment_status->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->appointment_status->CurrentValue = HtmlDecode($this->appointment_status->CurrentValue);
			$this->appointment_status->EditValue = HtmlEncode($this->appointment_status->CurrentValue);
			$this->appointment_status->PlaceHolder = RemoveHtml($this->appointment_status->caption());

			// PId
			$this->PId->EditAttrs["class"] = "form-control";
			$this->PId->EditCustomAttributes = "";
			$this->PId->EditValue = HtmlEncode($this->PId->CurrentValue);
			$this->PId->PlaceHolder = RemoveHtml($this->PId->caption());

			// SchEmail
			$this->SchEmail->EditAttrs["class"] = "form-control";
			$this->SchEmail->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->SchEmail->CurrentValue = HtmlDecode($this->SchEmail->CurrentValue);
			$this->SchEmail->EditValue = HtmlEncode($this->SchEmail->CurrentValue);
			$this->SchEmail->PlaceHolder = RemoveHtml($this->SchEmail->caption());

			// appointment_type
			$this->appointment_type->EditCustomAttributes = "";
			$this->appointment_type->EditValue = $this->appointment_type->options(FALSE);

			// Notified
			$this->Notified->EditCustomAttributes = "";
			$this->Notified->EditValue = $this->Notified->options(FALSE);

			// Notes
			$this->Notes->EditAttrs["class"] = "form-control";
			$this->Notes->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Notes->CurrentValue = HtmlDecode($this->Notes->CurrentValue);
			$this->Notes->EditValue = HtmlEncode($this->Notes->CurrentValue);
			$this->Notes->PlaceHolder = RemoveHtml($this->Notes->caption());

			// paymentType
			$this->paymentType->EditAttrs["class"] = "form-control";
			$this->paymentType->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->paymentType->CurrentValue = HtmlDecode($this->paymentType->CurrentValue);
			$this->paymentType->EditValue = HtmlEncode($this->paymentType->CurrentValue);
			$this->paymentType->PlaceHolder = RemoveHtml($this->paymentType->caption());

			// WhereDidYouHear
			$this->WhereDidYouHear->EditCustomAttributes = "";
			$curVal = trim(strval($this->WhereDidYouHear->CurrentValue));
			if ($curVal <> "")
				$this->WhereDidYouHear->ViewValue = $this->WhereDidYouHear->lookupCacheOption($curVal);
			else
				$this->WhereDidYouHear->ViewValue = $this->WhereDidYouHear->Lookup !== NULL && is_array($this->WhereDidYouHear->Lookup->Options) ? $curVal : NULL;
			if ($this->WhereDidYouHear->ViewValue !== NULL) { // Load from cache
				$this->WhereDidYouHear->EditValue = array_values($this->WhereDidYouHear->Lookup->Options);
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$arwrk = explode(",", $curVal);
					$filterWrk = "";
					foreach ($arwrk as $wrk) {
						if ($filterWrk <> "") $filterWrk .= " OR ";
						$filterWrk .= "`Job`" . SearchString("=", trim($wrk), DATATYPE_STRING, "");
					}
				}
				$sqlWrk = $this->WhereDidYouHear->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
				if ($rswrk) $rswrk->Close();
				$this->WhereDidYouHear->EditValue = $arwrk;
			}

			// createdBy
			// createdDateTime
			// PatientTypee

			$this->PatientTypee->EditAttrs["class"] = "form-control";
			$this->PatientTypee->EditCustomAttributes = "";
			$curVal = trim(strval($this->PatientTypee->CurrentValue));
			if ($curVal <> "")
				$this->PatientTypee->ViewValue = $this->PatientTypee->lookupCacheOption($curVal);
			else
				$this->PatientTypee->ViewValue = $this->PatientTypee->Lookup !== NULL && is_array($this->PatientTypee->Lookup->Options) ? $curVal : NULL;
			if ($this->PatientTypee->ViewValue !== NULL) { // Load from cache
				$this->PatientTypee->EditValue = array_values($this->PatientTypee->Lookup->Options);
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`Name`" . SearchString("=", $this->PatientTypee->CurrentValue, DATATYPE_STRING, "");
				}
				$sqlWrk = $this->PatientTypee->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
				if ($rswrk) $rswrk->Close();
				$this->PatientTypee->EditValue = $arwrk;
			}

			// Edit refer script
			// patientID

			$this->patientID->LinkCustomAttributes = "";
			$this->patientID->HrefValue = "";

			// patientName
			$this->patientName->LinkCustomAttributes = "";
			$this->patientName->HrefValue = "";

			// MobileNumber
			$this->MobileNumber->LinkCustomAttributes = "";
			$this->MobileNumber->HrefValue = "";

			// Purpose
			$this->Purpose->LinkCustomAttributes = "";
			$this->Purpose->HrefValue = "";

			// PatientType
			$this->PatientType->LinkCustomAttributes = "";
			$this->PatientType->HrefValue = "";

			// Referal
			$this->Referal->LinkCustomAttributes = "";
			$this->Referal->HrefValue = "";

			// start_date
			$this->start_date->LinkCustomAttributes = "";
			$this->start_date->HrefValue = "";

			// DoctorName
			$this->DoctorName->LinkCustomAttributes = "";
			$this->DoctorName->HrefValue = "";

			// HospID
			$this->HospID->LinkCustomAttributes = "";
			$this->HospID->HrefValue = "";
			$this->HospID->TooltipValue = "";

			// end_date
			$this->end_date->LinkCustomAttributes = "";
			$this->end_date->HrefValue = "";

			// DoctorID
			$this->DoctorID->LinkCustomAttributes = "";
			$this->DoctorID->HrefValue = "";

			// DoctorCode
			$this->DoctorCode->LinkCustomAttributes = "";
			$this->DoctorCode->HrefValue = "";

			// Department
			$this->Department->LinkCustomAttributes = "";
			$this->Department->HrefValue = "";

			// AppointmentStatus
			$this->AppointmentStatus->LinkCustomAttributes = "";
			$this->AppointmentStatus->HrefValue = "";

			// status
			$this->status->LinkCustomAttributes = "";
			$this->status->HrefValue = "";

			// scheduler_id
			$this->scheduler_id->LinkCustomAttributes = "";
			$this->scheduler_id->HrefValue = "";
			$this->scheduler_id->TooltipValue = "";

			// text
			$this->text->LinkCustomAttributes = "";
			$this->text->HrefValue = "";

			// appointment_status
			$this->appointment_status->LinkCustomAttributes = "";
			$this->appointment_status->HrefValue = "";

			// PId
			$this->PId->LinkCustomAttributes = "";
			$this->PId->HrefValue = "";

			// SchEmail
			$this->SchEmail->LinkCustomAttributes = "";
			$this->SchEmail->HrefValue = "";

			// appointment_type
			$this->appointment_type->LinkCustomAttributes = "";
			$this->appointment_type->HrefValue = "";

			// Notified
			$this->Notified->LinkCustomAttributes = "";
			$this->Notified->HrefValue = "";

			// Notes
			$this->Notes->LinkCustomAttributes = "";
			$this->Notes->HrefValue = "";

			// paymentType
			$this->paymentType->LinkCustomAttributes = "";
			$this->paymentType->HrefValue = "";

			// WhereDidYouHear
			$this->WhereDidYouHear->LinkCustomAttributes = "";
			$this->WhereDidYouHear->HrefValue = "";

			// createdBy
			$this->createdBy->LinkCustomAttributes = "";
			$this->createdBy->HrefValue = "";
			$this->createdBy->TooltipValue = "";

			// createdDateTime
			$this->createdDateTime->LinkCustomAttributes = "";
			$this->createdDateTime->HrefValue = "";
			$this->createdDateTime->TooltipValue = "";

			// PatientTypee
			$this->PatientTypee->LinkCustomAttributes = "";
			$this->PatientTypee->HrefValue = "";
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
		$updateCnt = 0;
		if ($this->patientID->MultiUpdate == "1")
			$updateCnt++;
		if ($this->patientName->MultiUpdate == "1")
			$updateCnt++;
		if ($this->MobileNumber->MultiUpdate == "1")
			$updateCnt++;
		if ($this->Purpose->MultiUpdate == "1")
			$updateCnt++;
		if ($this->PatientType->MultiUpdate == "1")
			$updateCnt++;
		if ($this->Referal->MultiUpdate == "1")
			$updateCnt++;
		if ($this->start_date->MultiUpdate == "1")
			$updateCnt++;
		if ($this->DoctorName->MultiUpdate == "1")
			$updateCnt++;
		if ($this->HospID->MultiUpdate == "1")
			$updateCnt++;
		if ($this->end_date->MultiUpdate == "1")
			$updateCnt++;
		if ($this->DoctorID->MultiUpdate == "1")
			$updateCnt++;
		if ($this->DoctorCode->MultiUpdate == "1")
			$updateCnt++;
		if ($this->Department->MultiUpdate == "1")
			$updateCnt++;
		if ($this->AppointmentStatus->MultiUpdate == "1")
			$updateCnt++;
		if ($this->status->MultiUpdate == "1")
			$updateCnt++;
		if ($this->scheduler_id->MultiUpdate == "1")
			$updateCnt++;
		if ($this->text->MultiUpdate == "1")
			$updateCnt++;
		if ($this->appointment_status->MultiUpdate == "1")
			$updateCnt++;
		if ($this->PId->MultiUpdate == "1")
			$updateCnt++;
		if ($this->SchEmail->MultiUpdate == "1")
			$updateCnt++;
		if ($this->appointment_type->MultiUpdate == "1")
			$updateCnt++;
		if ($this->Notified->MultiUpdate == "1")
			$updateCnt++;
		if ($this->Notes->MultiUpdate == "1")
			$updateCnt++;
		if ($this->paymentType->MultiUpdate == "1")
			$updateCnt++;
		if ($this->WhereDidYouHear->MultiUpdate == "1")
			$updateCnt++;
		if ($this->createdBy->MultiUpdate == "1")
			$updateCnt++;
		if ($this->createdDateTime->MultiUpdate == "1")
			$updateCnt++;
		if ($this->PatientTypee->MultiUpdate == "1")
			$updateCnt++;
		if ($updateCnt == 0) {
			$FormError = $Language->phrase("NoFieldSelected");
			return FALSE;
		}

		// Check if validation required
		if (!SERVER_VALIDATE)
			return ($FormError == "");
		if ($this->id->Required) {
			if ($this->id->MultiUpdate <> "" && !$this->id->IsDetailKey && $this->id->FormValue != NULL && $this->id->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->id->caption(), $this->id->RequiredErrorMessage));
			}
		}
		if ($this->patientID->Required) {
			if ($this->patientID->MultiUpdate <> "" && !$this->patientID->IsDetailKey && $this->patientID->FormValue != NULL && $this->patientID->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->patientID->caption(), $this->patientID->RequiredErrorMessage));
			}
		}
		if ($this->patientName->Required) {
			if ($this->patientName->MultiUpdate <> "" && !$this->patientName->IsDetailKey && $this->patientName->FormValue != NULL && $this->patientName->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->patientName->caption(), $this->patientName->RequiredErrorMessage));
			}
		}
		if ($this->MobileNumber->Required) {
			if ($this->MobileNumber->MultiUpdate <> "" && !$this->MobileNumber->IsDetailKey && $this->MobileNumber->FormValue != NULL && $this->MobileNumber->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->MobileNumber->caption(), $this->MobileNumber->RequiredErrorMessage));
			}
		}
		if ($this->Purpose->Required) {
			if ($this->Purpose->MultiUpdate <> "" && !$this->Purpose->IsDetailKey && $this->Purpose->FormValue != NULL && $this->Purpose->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Purpose->caption(), $this->Purpose->RequiredErrorMessage));
			}
		}
		if ($this->PatientType->Required) {
			if ($this->PatientType->MultiUpdate <> "" && $this->PatientType->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PatientType->caption(), $this->PatientType->RequiredErrorMessage));
			}
		}
		if ($this->Referal->Required) {
			if ($this->Referal->MultiUpdate <> "" && !$this->Referal->IsDetailKey && $this->Referal->FormValue != NULL && $this->Referal->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Referal->caption(), $this->Referal->RequiredErrorMessage));
			}
		}
		if ($this->start_date->Required) {
			if ($this->start_date->MultiUpdate <> "" && !$this->start_date->IsDetailKey && $this->start_date->FormValue != NULL && $this->start_date->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->start_date->caption(), $this->start_date->RequiredErrorMessage));
			}
		}
		if ($this->start_date->MultiUpdate <> "") {
			if (!CheckEuroDate($this->start_date->FormValue)) {
				AddMessage($FormError, $this->start_date->errorMessage());
			}
		}
		if ($this->DoctorName->Required) {
			if ($this->DoctorName->MultiUpdate <> "" && !$this->DoctorName->IsDetailKey && $this->DoctorName->FormValue != NULL && $this->DoctorName->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->DoctorName->caption(), $this->DoctorName->RequiredErrorMessage));
			}
		}
		if ($this->HospID->Required) {
			if ($this->HospID->MultiUpdate <> "" && !$this->HospID->IsDetailKey && $this->HospID->FormValue != NULL && $this->HospID->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->HospID->caption(), $this->HospID->RequiredErrorMessage));
			}
		}
		if ($this->end_date->Required) {
			if ($this->end_date->MultiUpdate <> "" && !$this->end_date->IsDetailKey && $this->end_date->FormValue != NULL && $this->end_date->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->end_date->caption(), $this->end_date->RequiredErrorMessage));
			}
		}
		if ($this->end_date->MultiUpdate <> "") {
			if (!CheckEuroDate($this->end_date->FormValue)) {
				AddMessage($FormError, $this->end_date->errorMessage());
			}
		}
		if ($this->DoctorID->Required) {
			if ($this->DoctorID->MultiUpdate <> "" && !$this->DoctorID->IsDetailKey && $this->DoctorID->FormValue != NULL && $this->DoctorID->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->DoctorID->caption(), $this->DoctorID->RequiredErrorMessage));
			}
		}
		if ($this->DoctorCode->Required) {
			if ($this->DoctorCode->MultiUpdate <> "" && !$this->DoctorCode->IsDetailKey && $this->DoctorCode->FormValue != NULL && $this->DoctorCode->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->DoctorCode->caption(), $this->DoctorCode->RequiredErrorMessage));
			}
		}
		if ($this->Department->Required) {
			if ($this->Department->MultiUpdate <> "" && !$this->Department->IsDetailKey && $this->Department->FormValue != NULL && $this->Department->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Department->caption(), $this->Department->RequiredErrorMessage));
			}
		}
		if ($this->AppointmentStatus->Required) {
			if ($this->AppointmentStatus->MultiUpdate <> "" && !$this->AppointmentStatus->IsDetailKey && $this->AppointmentStatus->FormValue != NULL && $this->AppointmentStatus->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->AppointmentStatus->caption(), $this->AppointmentStatus->RequiredErrorMessage));
			}
		}
		if ($this->status->Required) {
			if ($this->status->MultiUpdate <> "" && $this->status->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->status->caption(), $this->status->RequiredErrorMessage));
			}
		}
		if ($this->scheduler_id->Required) {
			if ($this->scheduler_id->MultiUpdate <> "" && !$this->scheduler_id->IsDetailKey && $this->scheduler_id->FormValue != NULL && $this->scheduler_id->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->scheduler_id->caption(), $this->scheduler_id->RequiredErrorMessage));
			}
		}
		if ($this->text->Required) {
			if ($this->text->MultiUpdate <> "" && !$this->text->IsDetailKey && $this->text->FormValue != NULL && $this->text->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->text->caption(), $this->text->RequiredErrorMessage));
			}
		}
		if ($this->appointment_status->Required) {
			if ($this->appointment_status->MultiUpdate <> "" && !$this->appointment_status->IsDetailKey && $this->appointment_status->FormValue != NULL && $this->appointment_status->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->appointment_status->caption(), $this->appointment_status->RequiredErrorMessage));
			}
		}
		if ($this->PId->Required) {
			if ($this->PId->MultiUpdate <> "" && !$this->PId->IsDetailKey && $this->PId->FormValue != NULL && $this->PId->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PId->caption(), $this->PId->RequiredErrorMessage));
			}
		}
		if ($this->PId->MultiUpdate <> "") {
			if (!CheckInteger($this->PId->FormValue)) {
				AddMessage($FormError, $this->PId->errorMessage());
			}
		}
		if ($this->SchEmail->Required) {
			if ($this->SchEmail->MultiUpdate <> "" && !$this->SchEmail->IsDetailKey && $this->SchEmail->FormValue != NULL && $this->SchEmail->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->SchEmail->caption(), $this->SchEmail->RequiredErrorMessage));
			}
		}
		if ($this->appointment_type->Required) {
			if ($this->appointment_type->MultiUpdate <> "" && $this->appointment_type->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->appointment_type->caption(), $this->appointment_type->RequiredErrorMessage));
			}
		}
		if ($this->Notified->Required) {
			if ($this->Notified->MultiUpdate <> "" && $this->Notified->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Notified->caption(), $this->Notified->RequiredErrorMessage));
			}
		}
		if ($this->Notes->Required) {
			if ($this->Notes->MultiUpdate <> "" && !$this->Notes->IsDetailKey && $this->Notes->FormValue != NULL && $this->Notes->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Notes->caption(), $this->Notes->RequiredErrorMessage));
			}
		}
		if ($this->paymentType->Required) {
			if ($this->paymentType->MultiUpdate <> "" && !$this->paymentType->IsDetailKey && $this->paymentType->FormValue != NULL && $this->paymentType->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->paymentType->caption(), $this->paymentType->RequiredErrorMessage));
			}
		}
		if ($this->WhereDidYouHear->Required) {
			if ($this->WhereDidYouHear->MultiUpdate <> "" && $this->WhereDidYouHear->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->WhereDidYouHear->caption(), $this->WhereDidYouHear->RequiredErrorMessage));
			}
		}
		if ($this->createdBy->Required) {
			if ($this->createdBy->MultiUpdate <> "" && !$this->createdBy->IsDetailKey && $this->createdBy->FormValue != NULL && $this->createdBy->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->createdBy->caption(), $this->createdBy->RequiredErrorMessage));
			}
		}
		if ($this->createdDateTime->Required) {
			if ($this->createdDateTime->MultiUpdate <> "" && !$this->createdDateTime->IsDetailKey && $this->createdDateTime->FormValue != NULL && $this->createdDateTime->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->createdDateTime->caption(), $this->createdDateTime->RequiredErrorMessage));
			}
		}
		if ($this->PatientTypee->Required) {
			if ($this->PatientTypee->MultiUpdate <> "" && !$this->PatientTypee->IsDetailKey && $this->PatientTypee->FormValue != NULL && $this->PatientTypee->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PatientTypee->caption(), $this->PatientTypee->RequiredErrorMessage));
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

			// patientID
			$this->patientID->setDbValueDef($rsnew, $this->patientID->CurrentValue, NULL, $this->patientID->ReadOnly || $this->patientID->MultiUpdate <> "1");

			// patientName
			$this->patientName->setDbValueDef($rsnew, $this->patientName->CurrentValue, NULL, $this->patientName->ReadOnly || $this->patientName->MultiUpdate <> "1");

			// MobileNumber
			$this->MobileNumber->setDbValueDef($rsnew, $this->MobileNumber->CurrentValue, NULL, $this->MobileNumber->ReadOnly || $this->MobileNumber->MultiUpdate <> "1");

			// Purpose
			$this->Purpose->setDbValueDef($rsnew, $this->Purpose->CurrentValue, NULL, $this->Purpose->ReadOnly || $this->Purpose->MultiUpdate <> "1");

			// PatientType
			$this->PatientType->setDbValueDef($rsnew, $this->PatientType->CurrentValue, NULL, $this->PatientType->ReadOnly || $this->PatientType->MultiUpdate <> "1");

			// Referal
			$this->Referal->setDbValueDef($rsnew, $this->Referal->CurrentValue, NULL, $this->Referal->ReadOnly || $this->Referal->MultiUpdate <> "1");

			// start_date
			$this->start_date->setDbValueDef($rsnew, UnFormatDateTime($this->start_date->CurrentValue, 11), NULL, $this->start_date->ReadOnly || $this->start_date->MultiUpdate <> "1");

			// DoctorName
			$this->DoctorName->setDbValueDef($rsnew, $this->DoctorName->CurrentValue, NULL, $this->DoctorName->ReadOnly || $this->DoctorName->MultiUpdate <> "1");

			// end_date
			$this->end_date->setDbValueDef($rsnew, UnFormatDateTime($this->end_date->CurrentValue, 11), NULL, $this->end_date->ReadOnly || $this->end_date->MultiUpdate <> "1");

			// DoctorID
			$this->DoctorID->setDbValueDef($rsnew, $this->DoctorID->CurrentValue, NULL, $this->DoctorID->ReadOnly || $this->DoctorID->MultiUpdate <> "1");

			// DoctorCode
			$this->DoctorCode->setDbValueDef($rsnew, $this->DoctorCode->CurrentValue, NULL, $this->DoctorCode->ReadOnly || $this->DoctorCode->MultiUpdate <> "1");

			// Department
			$this->Department->setDbValueDef($rsnew, $this->Department->CurrentValue, NULL, $this->Department->ReadOnly || $this->Department->MultiUpdate <> "1");

			// AppointmentStatus
			$this->AppointmentStatus->setDbValueDef($rsnew, $this->AppointmentStatus->CurrentValue, NULL, $this->AppointmentStatus->ReadOnly || $this->AppointmentStatus->MultiUpdate <> "1");

			// status
			$this->status->setDbValueDef($rsnew, $this->status->CurrentValue, NULL, $this->status->ReadOnly || $this->status->MultiUpdate <> "1");

			// text
			$this->text->setDbValueDef($rsnew, $this->text->CurrentValue, NULL, $this->text->ReadOnly || $this->text->MultiUpdate <> "1");

			// appointment_status
			$this->appointment_status->setDbValueDef($rsnew, $this->appointment_status->CurrentValue, NULL, $this->appointment_status->ReadOnly || $this->appointment_status->MultiUpdate <> "1");

			// PId
			$this->PId->setDbValueDef($rsnew, $this->PId->CurrentValue, NULL, $this->PId->ReadOnly || $this->PId->MultiUpdate <> "1");

			// SchEmail
			$this->SchEmail->setDbValueDef($rsnew, $this->SchEmail->CurrentValue, NULL, $this->SchEmail->ReadOnly || $this->SchEmail->MultiUpdate <> "1");

			// appointment_type
			$this->appointment_type->setDbValueDef($rsnew, $this->appointment_type->CurrentValue, NULL, $this->appointment_type->ReadOnly || $this->appointment_type->MultiUpdate <> "1");

			// Notified
			$this->Notified->setDbValueDef($rsnew, $this->Notified->CurrentValue, NULL, $this->Notified->ReadOnly || $this->Notified->MultiUpdate <> "1");

			// Notes
			$this->Notes->setDbValueDef($rsnew, $this->Notes->CurrentValue, NULL, $this->Notes->ReadOnly || $this->Notes->MultiUpdate <> "1");

			// paymentType
			$this->paymentType->setDbValueDef($rsnew, $this->paymentType->CurrentValue, NULL, $this->paymentType->ReadOnly || $this->paymentType->MultiUpdate <> "1");

			// WhereDidYouHear
			$this->WhereDidYouHear->setDbValueDef($rsnew, $this->WhereDidYouHear->CurrentValue, NULL, $this->WhereDidYouHear->ReadOnly || $this->WhereDidYouHear->MultiUpdate <> "1");

			// PatientTypee
			$this->PatientTypee->setDbValueDef($rsnew, $this->PatientTypee->CurrentValue, NULL, $this->PatientTypee->ReadOnly || $this->PatientTypee->MultiUpdate <> "1");

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
		$Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("view_appointment_schedulerlist.php"), "", $this->TableVar, TRUE);
		$pageId = "update";
		$Breadcrumb->add("update", $pageId, $url);
	}

	// Setup lookup options
	public function setupLookupOptions($fld)
	{
		if ($fld->Lookup !== NULL && $fld->Lookup->Options === NULL) {

			// No need to check any more
			$fld->Lookup->Options = [];

			// Set up lookup SQL
			switch ($fld->FieldVar) {
				case "x_patientID":
					$lookupFilter = function() {
						return "`HospID`='".HospitalID()."'";
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
						case "x_patientID":
							break;
						case "x_Referal":
							break;
						case "x_DoctorName":
							break;
						case "x_WhereDidYouHear":
							break;
						case "x_PatientTypee":
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
<?php
namespace PHPMaker2019\HIMS;

/**
 * Page class
 */
class patient_edit extends patient
{

	// Page ID
	public $PageID = "edit";

	// Project ID
	public $ProjectID = "{EA4F6D13-AF8F-428D-9EA7-BA88D1107EC3}";

	// Table name
	public $TableName = 'patient';

	// Page object name
	public $PageObjName = "patient_edit";

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

		// Table object (patient)
		if (!isset($GLOBALS["patient"]) || get_class($GLOBALS["patient"]) == PROJECT_NAMESPACE . "patient") {
			$GLOBALS["patient"] = &$this;
			$GLOBALS["Table"] = &$GLOBALS["patient"];
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
			define(PROJECT_NAMESPACE . "TABLE_NAME", 'patient');

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
		global $EXPORT, $patient;
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
				$doc = new $class($patient);
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
					if ($pageName == "patientview.php")
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
					$this->terminate(GetUrl("patientlist.php"));
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
		$this->title->setVisibility();
		$this->first_name->setVisibility();
		$this->middle_name->setVisibility();
		$this->last_name->setVisibility();
		$this->gender->setVisibility();
		$this->dob->setVisibility();
		$this->Age->setVisibility();
		$this->blood_group->setVisibility();
		$this->mobile_no->setVisibility();
		$this->description->setVisibility();
		$this->status->setVisibility();
		$this->createdby->Visible = FALSE;
		$this->createddatetime->Visible = FALSE;
		$this->modifiedby->setVisibility();
		$this->modifieddatetime->setVisibility();
		$this->profilePic->setVisibility();
		$this->IdentificationMark->setVisibility();
		$this->Religion->setVisibility();
		$this->Nationality->setVisibility();
		$this->ReferedByDr->setVisibility();
		$this->ReferClinicname->setVisibility();
		$this->ReferCity->setVisibility();
		$this->ReferMobileNo->setVisibility();
		$this->ReferA4TreatingConsultant->setVisibility();
		$this->PurposreReferredfor->setVisibility();
		$this->spouse_title->setVisibility();
		$this->spouse_first_name->setVisibility();
		$this->spouse_middle_name->setVisibility();
		$this->spouse_last_name->setVisibility();
		$this->spouse_gender->setVisibility();
		$this->spouse_dob->setVisibility();
		$this->spouse_Age->setVisibility();
		$this->spouse_blood_group->setVisibility();
		$this->spouse_mobile_no->setVisibility();
		$this->Maritalstatus->setVisibility();
		$this->Business->setVisibility();
		$this->Patient_Language->setVisibility();
		$this->Passport->setVisibility();
		$this->VisaNo->setVisibility();
		$this->ValidityOfVisa->setVisibility();
		$this->WhereDidYouHear->setVisibility();
		$this->HospID->setVisibility();
		$this->street->setVisibility();
		$this->town->setVisibility();
		$this->province->setVisibility();
		$this->country->setVisibility();
		$this->postal_code->setVisibility();
		$this->PEmail->setVisibility();
		$this->PEmergencyContact->setVisibility();
		$this->occupation->setVisibility();
		$this->spouse_occupation->setVisibility();
		$this->WhatsApp->setVisibility();
		$this->CouppleID->setVisibility();
		$this->MaleID->setVisibility();
		$this->FemaleID->setVisibility();
		$this->GroupID->setVisibility();
		$this->Relationship->setVisibility();
		$this->AppointmentSearch->setVisibility();
		$this->FacebookID->setVisibility();
		$this->profilePicImage->setVisibility();
		$this->Clients->setVisibility();
		$this->hideFieldsForAddEdit();
		$this->PatientID->Required = FALSE;

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
		$this->setupLookupOptions($this->title);
		$this->setupLookupOptions($this->gender);
		$this->setupLookupOptions($this->blood_group);
		$this->setupLookupOptions($this->status);
		$this->setupLookupOptions($this->ReferedByDr);
		$this->setupLookupOptions($this->ReferA4TreatingConsultant);
		$this->setupLookupOptions($this->spouse_title);
		$this->setupLookupOptions($this->spouse_gender);
		$this->setupLookupOptions($this->spouse_blood_group);
		$this->setupLookupOptions($this->Maritalstatus);
		$this->setupLookupOptions($this->Business);
		$this->setupLookupOptions($this->Patient_Language);
		$this->setupLookupOptions($this->WhereDidYouHear);
		$this->setupLookupOptions($this->HospID);
		$this->setupLookupOptions($this->AppointmentSearch);

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
					$this->terminate("patientlist.php"); // No matching record, return to list
				}

				// Set up detail parameters
				$this->setupDetailParms();
				break;
			case "update": // Update
				if ($this->getCurrentDetailTable() <> "") // Master/detail edit
					$returnUrl = $this->getViewUrl(TABLE_SHOW_DETAIL . "=" . $this->getCurrentDetailTable()); // Master/Detail view page
				else
					$returnUrl = $this->getReturnUrl();
				if (GetPageName($returnUrl) == "patientlist.php")
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
		$this->profilePic->Upload->Index = $CurrentForm->Index;
		$this->profilePic->Upload->uploadFile();
		$this->profilePic->CurrentValue = $this->profilePic->Upload->FileName;
		$this->profilePicImage->Upload->Index = $CurrentForm->Index;
		$this->profilePicImage->Upload->uploadFile();
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

		// Check field name 'PatientID' first before field var 'x_PatientID'
		$val = $CurrentForm->hasValue("PatientID") ? $CurrentForm->getValue("PatientID") : $CurrentForm->getValue("x_PatientID");
		if (!$this->PatientID->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->PatientID->Visible = FALSE; // Disable update for API request
			else
				$this->PatientID->setFormValue($val);
		}

		// Check field name 'title' first before field var 'x_title'
		$val = $CurrentForm->hasValue("title") ? $CurrentForm->getValue("title") : $CurrentForm->getValue("x_title");
		if (!$this->title->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->title->Visible = FALSE; // Disable update for API request
			else
				$this->title->setFormValue($val);
		}

		// Check field name 'first_name' first before field var 'x_first_name'
		$val = $CurrentForm->hasValue("first_name") ? $CurrentForm->getValue("first_name") : $CurrentForm->getValue("x_first_name");
		if (!$this->first_name->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->first_name->Visible = FALSE; // Disable update for API request
			else
				$this->first_name->setFormValue($val);
		}

		// Check field name 'middle_name' first before field var 'x_middle_name'
		$val = $CurrentForm->hasValue("middle_name") ? $CurrentForm->getValue("middle_name") : $CurrentForm->getValue("x_middle_name");
		if (!$this->middle_name->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->middle_name->Visible = FALSE; // Disable update for API request
			else
				$this->middle_name->setFormValue($val);
		}

		// Check field name 'last_name' first before field var 'x_last_name'
		$val = $CurrentForm->hasValue("last_name") ? $CurrentForm->getValue("last_name") : $CurrentForm->getValue("x_last_name");
		if (!$this->last_name->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->last_name->Visible = FALSE; // Disable update for API request
			else
				$this->last_name->setFormValue($val);
		}

		// Check field name 'gender' first before field var 'x_gender'
		$val = $CurrentForm->hasValue("gender") ? $CurrentForm->getValue("gender") : $CurrentForm->getValue("x_gender");
		if (!$this->gender->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->gender->Visible = FALSE; // Disable update for API request
			else
				$this->gender->setFormValue($val);
		}

		// Check field name 'dob' first before field var 'x_dob'
		$val = $CurrentForm->hasValue("dob") ? $CurrentForm->getValue("dob") : $CurrentForm->getValue("x_dob");
		if (!$this->dob->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->dob->Visible = FALSE; // Disable update for API request
			else
				$this->dob->setFormValue($val);
			$this->dob->CurrentValue = UnFormatDateTime($this->dob->CurrentValue, 7);
		}

		// Check field name 'Age' first before field var 'x_Age'
		$val = $CurrentForm->hasValue("Age") ? $CurrentForm->getValue("Age") : $CurrentForm->getValue("x_Age");
		if (!$this->Age->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Age->Visible = FALSE; // Disable update for API request
			else
				$this->Age->setFormValue($val);
		}

		// Check field name 'blood_group' first before field var 'x_blood_group'
		$val = $CurrentForm->hasValue("blood_group") ? $CurrentForm->getValue("blood_group") : $CurrentForm->getValue("x_blood_group");
		if (!$this->blood_group->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->blood_group->Visible = FALSE; // Disable update for API request
			else
				$this->blood_group->setFormValue($val);
		}

		// Check field name 'mobile_no' first before field var 'x_mobile_no'
		$val = $CurrentForm->hasValue("mobile_no") ? $CurrentForm->getValue("mobile_no") : $CurrentForm->getValue("x_mobile_no");
		if (!$this->mobile_no->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->mobile_no->Visible = FALSE; // Disable update for API request
			else
				$this->mobile_no->setFormValue($val);
		}

		// Check field name 'description' first before field var 'x_description'
		$val = $CurrentForm->hasValue("description") ? $CurrentForm->getValue("description") : $CurrentForm->getValue("x_description");
		if (!$this->description->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->description->Visible = FALSE; // Disable update for API request
			else
				$this->description->setFormValue($val);
		}

		// Check field name 'status' first before field var 'x_status'
		$val = $CurrentForm->hasValue("status") ? $CurrentForm->getValue("status") : $CurrentForm->getValue("x_status");
		if (!$this->status->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->status->Visible = FALSE; // Disable update for API request
			else
				$this->status->setFormValue($val);
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

		// Check field name 'IdentificationMark' first before field var 'x_IdentificationMark'
		$val = $CurrentForm->hasValue("IdentificationMark") ? $CurrentForm->getValue("IdentificationMark") : $CurrentForm->getValue("x_IdentificationMark");
		if (!$this->IdentificationMark->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->IdentificationMark->Visible = FALSE; // Disable update for API request
			else
				$this->IdentificationMark->setFormValue($val);
		}

		// Check field name 'Religion' first before field var 'x_Religion'
		$val = $CurrentForm->hasValue("Religion") ? $CurrentForm->getValue("Religion") : $CurrentForm->getValue("x_Religion");
		if (!$this->Religion->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Religion->Visible = FALSE; // Disable update for API request
			else
				$this->Religion->setFormValue($val);
		}

		// Check field name 'Nationality' first before field var 'x_Nationality'
		$val = $CurrentForm->hasValue("Nationality") ? $CurrentForm->getValue("Nationality") : $CurrentForm->getValue("x_Nationality");
		if (!$this->Nationality->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Nationality->Visible = FALSE; // Disable update for API request
			else
				$this->Nationality->setFormValue($val);
		}

		// Check field name 'ReferedByDr' first before field var 'x_ReferedByDr'
		$val = $CurrentForm->hasValue("ReferedByDr") ? $CurrentForm->getValue("ReferedByDr") : $CurrentForm->getValue("x_ReferedByDr");
		if (!$this->ReferedByDr->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->ReferedByDr->Visible = FALSE; // Disable update for API request
			else
				$this->ReferedByDr->setFormValue($val);
		}

		// Check field name 'ReferClinicname' first before field var 'x_ReferClinicname'
		$val = $CurrentForm->hasValue("ReferClinicname") ? $CurrentForm->getValue("ReferClinicname") : $CurrentForm->getValue("x_ReferClinicname");
		if (!$this->ReferClinicname->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->ReferClinicname->Visible = FALSE; // Disable update for API request
			else
				$this->ReferClinicname->setFormValue($val);
		}

		// Check field name 'ReferCity' first before field var 'x_ReferCity'
		$val = $CurrentForm->hasValue("ReferCity") ? $CurrentForm->getValue("ReferCity") : $CurrentForm->getValue("x_ReferCity");
		if (!$this->ReferCity->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->ReferCity->Visible = FALSE; // Disable update for API request
			else
				$this->ReferCity->setFormValue($val);
		}

		// Check field name 'ReferMobileNo' first before field var 'x_ReferMobileNo'
		$val = $CurrentForm->hasValue("ReferMobileNo") ? $CurrentForm->getValue("ReferMobileNo") : $CurrentForm->getValue("x_ReferMobileNo");
		if (!$this->ReferMobileNo->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->ReferMobileNo->Visible = FALSE; // Disable update for API request
			else
				$this->ReferMobileNo->setFormValue($val);
		}

		// Check field name 'ReferA4TreatingConsultant' first before field var 'x_ReferA4TreatingConsultant'
		$val = $CurrentForm->hasValue("ReferA4TreatingConsultant") ? $CurrentForm->getValue("ReferA4TreatingConsultant") : $CurrentForm->getValue("x_ReferA4TreatingConsultant");
		if (!$this->ReferA4TreatingConsultant->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->ReferA4TreatingConsultant->Visible = FALSE; // Disable update for API request
			else
				$this->ReferA4TreatingConsultant->setFormValue($val);
		}

		// Check field name 'PurposreReferredfor' first before field var 'x_PurposreReferredfor'
		$val = $CurrentForm->hasValue("PurposreReferredfor") ? $CurrentForm->getValue("PurposreReferredfor") : $CurrentForm->getValue("x_PurposreReferredfor");
		if (!$this->PurposreReferredfor->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->PurposreReferredfor->Visible = FALSE; // Disable update for API request
			else
				$this->PurposreReferredfor->setFormValue($val);
		}

		// Check field name 'spouse_title' first before field var 'x_spouse_title'
		$val = $CurrentForm->hasValue("spouse_title") ? $CurrentForm->getValue("spouse_title") : $CurrentForm->getValue("x_spouse_title");
		if (!$this->spouse_title->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->spouse_title->Visible = FALSE; // Disable update for API request
			else
				$this->spouse_title->setFormValue($val);
		}

		// Check field name 'spouse_first_name' first before field var 'x_spouse_first_name'
		$val = $CurrentForm->hasValue("spouse_first_name") ? $CurrentForm->getValue("spouse_first_name") : $CurrentForm->getValue("x_spouse_first_name");
		if (!$this->spouse_first_name->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->spouse_first_name->Visible = FALSE; // Disable update for API request
			else
				$this->spouse_first_name->setFormValue($val);
		}

		// Check field name 'spouse_middle_name' first before field var 'x_spouse_middle_name'
		$val = $CurrentForm->hasValue("spouse_middle_name") ? $CurrentForm->getValue("spouse_middle_name") : $CurrentForm->getValue("x_spouse_middle_name");
		if (!$this->spouse_middle_name->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->spouse_middle_name->Visible = FALSE; // Disable update for API request
			else
				$this->spouse_middle_name->setFormValue($val);
		}

		// Check field name 'spouse_last_name' first before field var 'x_spouse_last_name'
		$val = $CurrentForm->hasValue("spouse_last_name") ? $CurrentForm->getValue("spouse_last_name") : $CurrentForm->getValue("x_spouse_last_name");
		if (!$this->spouse_last_name->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->spouse_last_name->Visible = FALSE; // Disable update for API request
			else
				$this->spouse_last_name->setFormValue($val);
		}

		// Check field name 'spouse_gender' first before field var 'x_spouse_gender'
		$val = $CurrentForm->hasValue("spouse_gender") ? $CurrentForm->getValue("spouse_gender") : $CurrentForm->getValue("x_spouse_gender");
		if (!$this->spouse_gender->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->spouse_gender->Visible = FALSE; // Disable update for API request
			else
				$this->spouse_gender->setFormValue($val);
		}

		// Check field name 'spouse_dob' first before field var 'x_spouse_dob'
		$val = $CurrentForm->hasValue("spouse_dob") ? $CurrentForm->getValue("spouse_dob") : $CurrentForm->getValue("x_spouse_dob");
		if (!$this->spouse_dob->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->spouse_dob->Visible = FALSE; // Disable update for API request
			else
				$this->spouse_dob->setFormValue($val);
			$this->spouse_dob->CurrentValue = UnFormatDateTime($this->spouse_dob->CurrentValue, 7);
		}

		// Check field name 'spouse_Age' first before field var 'x_spouse_Age'
		$val = $CurrentForm->hasValue("spouse_Age") ? $CurrentForm->getValue("spouse_Age") : $CurrentForm->getValue("x_spouse_Age");
		if (!$this->spouse_Age->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->spouse_Age->Visible = FALSE; // Disable update for API request
			else
				$this->spouse_Age->setFormValue($val);
		}

		// Check field name 'spouse_blood_group' first before field var 'x_spouse_blood_group'
		$val = $CurrentForm->hasValue("spouse_blood_group") ? $CurrentForm->getValue("spouse_blood_group") : $CurrentForm->getValue("x_spouse_blood_group");
		if (!$this->spouse_blood_group->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->spouse_blood_group->Visible = FALSE; // Disable update for API request
			else
				$this->spouse_blood_group->setFormValue($val);
		}

		// Check field name 'spouse_mobile_no' first before field var 'x_spouse_mobile_no'
		$val = $CurrentForm->hasValue("spouse_mobile_no") ? $CurrentForm->getValue("spouse_mobile_no") : $CurrentForm->getValue("x_spouse_mobile_no");
		if (!$this->spouse_mobile_no->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->spouse_mobile_no->Visible = FALSE; // Disable update for API request
			else
				$this->spouse_mobile_no->setFormValue($val);
		}

		// Check field name 'Maritalstatus' first before field var 'x_Maritalstatus'
		$val = $CurrentForm->hasValue("Maritalstatus") ? $CurrentForm->getValue("Maritalstatus") : $CurrentForm->getValue("x_Maritalstatus");
		if (!$this->Maritalstatus->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Maritalstatus->Visible = FALSE; // Disable update for API request
			else
				$this->Maritalstatus->setFormValue($val);
		}

		// Check field name 'Business' first before field var 'x_Business'
		$val = $CurrentForm->hasValue("Business") ? $CurrentForm->getValue("Business") : $CurrentForm->getValue("x_Business");
		if (!$this->Business->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Business->Visible = FALSE; // Disable update for API request
			else
				$this->Business->setFormValue($val);
		}

		// Check field name 'Patient_Language' first before field var 'x_Patient_Language'
		$val = $CurrentForm->hasValue("Patient_Language") ? $CurrentForm->getValue("Patient_Language") : $CurrentForm->getValue("x_Patient_Language");
		if (!$this->Patient_Language->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Patient_Language->Visible = FALSE; // Disable update for API request
			else
				$this->Patient_Language->setFormValue($val);
		}

		// Check field name 'Passport' first before field var 'x_Passport'
		$val = $CurrentForm->hasValue("Passport") ? $CurrentForm->getValue("Passport") : $CurrentForm->getValue("x_Passport");
		if (!$this->Passport->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Passport->Visible = FALSE; // Disable update for API request
			else
				$this->Passport->setFormValue($val);
		}

		// Check field name 'VisaNo' first before field var 'x_VisaNo'
		$val = $CurrentForm->hasValue("VisaNo") ? $CurrentForm->getValue("VisaNo") : $CurrentForm->getValue("x_VisaNo");
		if (!$this->VisaNo->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->VisaNo->Visible = FALSE; // Disable update for API request
			else
				$this->VisaNo->setFormValue($val);
		}

		// Check field name 'ValidityOfVisa' first before field var 'x_ValidityOfVisa'
		$val = $CurrentForm->hasValue("ValidityOfVisa") ? $CurrentForm->getValue("ValidityOfVisa") : $CurrentForm->getValue("x_ValidityOfVisa");
		if (!$this->ValidityOfVisa->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->ValidityOfVisa->Visible = FALSE; // Disable update for API request
			else
				$this->ValidityOfVisa->setFormValue($val);
		}

		// Check field name 'WhereDidYouHear' first before field var 'x_WhereDidYouHear'
		$val = $CurrentForm->hasValue("WhereDidYouHear") ? $CurrentForm->getValue("WhereDidYouHear") : $CurrentForm->getValue("x_WhereDidYouHear");
		if (!$this->WhereDidYouHear->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->WhereDidYouHear->Visible = FALSE; // Disable update for API request
			else
				$this->WhereDidYouHear->setFormValue($val);
		}

		// Check field name 'HospID' first before field var 'x_HospID'
		$val = $CurrentForm->hasValue("HospID") ? $CurrentForm->getValue("HospID") : $CurrentForm->getValue("x_HospID");
		if (!$this->HospID->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->HospID->Visible = FALSE; // Disable update for API request
			else
				$this->HospID->setFormValue($val);
		}

		// Check field name 'street' first before field var 'x_street'
		$val = $CurrentForm->hasValue("street") ? $CurrentForm->getValue("street") : $CurrentForm->getValue("x_street");
		if (!$this->street->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->street->Visible = FALSE; // Disable update for API request
			else
				$this->street->setFormValue($val);
		}

		// Check field name 'town' first before field var 'x_town'
		$val = $CurrentForm->hasValue("town") ? $CurrentForm->getValue("town") : $CurrentForm->getValue("x_town");
		if (!$this->town->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->town->Visible = FALSE; // Disable update for API request
			else
				$this->town->setFormValue($val);
		}

		// Check field name 'province' first before field var 'x_province'
		$val = $CurrentForm->hasValue("province") ? $CurrentForm->getValue("province") : $CurrentForm->getValue("x_province");
		if (!$this->province->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->province->Visible = FALSE; // Disable update for API request
			else
				$this->province->setFormValue($val);
		}

		// Check field name 'country' first before field var 'x_country'
		$val = $CurrentForm->hasValue("country") ? $CurrentForm->getValue("country") : $CurrentForm->getValue("x_country");
		if (!$this->country->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->country->Visible = FALSE; // Disable update for API request
			else
				$this->country->setFormValue($val);
		}

		// Check field name 'postal_code' first before field var 'x_postal_code'
		$val = $CurrentForm->hasValue("postal_code") ? $CurrentForm->getValue("postal_code") : $CurrentForm->getValue("x_postal_code");
		if (!$this->postal_code->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->postal_code->Visible = FALSE; // Disable update for API request
			else
				$this->postal_code->setFormValue($val);
		}

		// Check field name 'PEmail' first before field var 'x_PEmail'
		$val = $CurrentForm->hasValue("PEmail") ? $CurrentForm->getValue("PEmail") : $CurrentForm->getValue("x_PEmail");
		if (!$this->PEmail->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->PEmail->Visible = FALSE; // Disable update for API request
			else
				$this->PEmail->setFormValue($val);
		}

		// Check field name 'PEmergencyContact' first before field var 'x_PEmergencyContact'
		$val = $CurrentForm->hasValue("PEmergencyContact") ? $CurrentForm->getValue("PEmergencyContact") : $CurrentForm->getValue("x_PEmergencyContact");
		if (!$this->PEmergencyContact->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->PEmergencyContact->Visible = FALSE; // Disable update for API request
			else
				$this->PEmergencyContact->setFormValue($val);
		}

		// Check field name 'occupation' first before field var 'x_occupation'
		$val = $CurrentForm->hasValue("occupation") ? $CurrentForm->getValue("occupation") : $CurrentForm->getValue("x_occupation");
		if (!$this->occupation->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->occupation->Visible = FALSE; // Disable update for API request
			else
				$this->occupation->setFormValue($val);
		}

		// Check field name 'spouse_occupation' first before field var 'x_spouse_occupation'
		$val = $CurrentForm->hasValue("spouse_occupation") ? $CurrentForm->getValue("spouse_occupation") : $CurrentForm->getValue("x_spouse_occupation");
		if (!$this->spouse_occupation->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->spouse_occupation->Visible = FALSE; // Disable update for API request
			else
				$this->spouse_occupation->setFormValue($val);
		}

		// Check field name 'WhatsApp' first before field var 'x_WhatsApp'
		$val = $CurrentForm->hasValue("WhatsApp") ? $CurrentForm->getValue("WhatsApp") : $CurrentForm->getValue("x_WhatsApp");
		if (!$this->WhatsApp->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->WhatsApp->Visible = FALSE; // Disable update for API request
			else
				$this->WhatsApp->setFormValue($val);
		}

		// Check field name 'CouppleID' first before field var 'x_CouppleID'
		$val = $CurrentForm->hasValue("CouppleID") ? $CurrentForm->getValue("CouppleID") : $CurrentForm->getValue("x_CouppleID");
		if (!$this->CouppleID->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->CouppleID->Visible = FALSE; // Disable update for API request
			else
				$this->CouppleID->setFormValue($val);
		}

		// Check field name 'MaleID' first before field var 'x_MaleID'
		$val = $CurrentForm->hasValue("MaleID") ? $CurrentForm->getValue("MaleID") : $CurrentForm->getValue("x_MaleID");
		if (!$this->MaleID->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->MaleID->Visible = FALSE; // Disable update for API request
			else
				$this->MaleID->setFormValue($val);
		}

		// Check field name 'FemaleID' first before field var 'x_FemaleID'
		$val = $CurrentForm->hasValue("FemaleID") ? $CurrentForm->getValue("FemaleID") : $CurrentForm->getValue("x_FemaleID");
		if (!$this->FemaleID->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->FemaleID->Visible = FALSE; // Disable update for API request
			else
				$this->FemaleID->setFormValue($val);
		}

		// Check field name 'GroupID' first before field var 'x_GroupID'
		$val = $CurrentForm->hasValue("GroupID") ? $CurrentForm->getValue("GroupID") : $CurrentForm->getValue("x_GroupID");
		if (!$this->GroupID->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->GroupID->Visible = FALSE; // Disable update for API request
			else
				$this->GroupID->setFormValue($val);
		}

		// Check field name 'Relationship' first before field var 'x_Relationship'
		$val = $CurrentForm->hasValue("Relationship") ? $CurrentForm->getValue("Relationship") : $CurrentForm->getValue("x_Relationship");
		if (!$this->Relationship->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Relationship->Visible = FALSE; // Disable update for API request
			else
				$this->Relationship->setFormValue($val);
		}

		// Check field name 'AppointmentSearch' first before field var 'x_AppointmentSearch'
		$val = $CurrentForm->hasValue("AppointmentSearch") ? $CurrentForm->getValue("AppointmentSearch") : $CurrentForm->getValue("x_AppointmentSearch");
		if (!$this->AppointmentSearch->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->AppointmentSearch->Visible = FALSE; // Disable update for API request
			else
				$this->AppointmentSearch->setFormValue($val);
		}

		// Check field name 'FacebookID' first before field var 'x_FacebookID'
		$val = $CurrentForm->hasValue("FacebookID") ? $CurrentForm->getValue("FacebookID") : $CurrentForm->getValue("x_FacebookID");
		if (!$this->FacebookID->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->FacebookID->Visible = FALSE; // Disable update for API request
			else
				$this->FacebookID->setFormValue($val);
		}

		// Check field name 'Clients' first before field var 'x_Clients'
		$val = $CurrentForm->hasValue("Clients") ? $CurrentForm->getValue("Clients") : $CurrentForm->getValue("x_Clients");
		if (!$this->Clients->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Clients->Visible = FALSE; // Disable update for API request
			else
				$this->Clients->setFormValue($val);
		}
	}

	// Restore form values
	public function restoreFormValues()
	{
		global $CurrentForm;
		$this->id->CurrentValue = $this->id->FormValue;
		$this->PatientID->CurrentValue = $this->PatientID->FormValue;
		$this->title->CurrentValue = $this->title->FormValue;
		$this->first_name->CurrentValue = $this->first_name->FormValue;
		$this->middle_name->CurrentValue = $this->middle_name->FormValue;
		$this->last_name->CurrentValue = $this->last_name->FormValue;
		$this->gender->CurrentValue = $this->gender->FormValue;
		$this->dob->CurrentValue = $this->dob->FormValue;
		$this->dob->CurrentValue = UnFormatDateTime($this->dob->CurrentValue, 7);
		$this->Age->CurrentValue = $this->Age->FormValue;
		$this->blood_group->CurrentValue = $this->blood_group->FormValue;
		$this->mobile_no->CurrentValue = $this->mobile_no->FormValue;
		$this->description->CurrentValue = $this->description->FormValue;
		$this->status->CurrentValue = $this->status->FormValue;
		$this->modifiedby->CurrentValue = $this->modifiedby->FormValue;
		$this->modifieddatetime->CurrentValue = $this->modifieddatetime->FormValue;
		$this->modifieddatetime->CurrentValue = UnFormatDateTime($this->modifieddatetime->CurrentValue, 0);
		$this->IdentificationMark->CurrentValue = $this->IdentificationMark->FormValue;
		$this->Religion->CurrentValue = $this->Religion->FormValue;
		$this->Nationality->CurrentValue = $this->Nationality->FormValue;
		$this->ReferedByDr->CurrentValue = $this->ReferedByDr->FormValue;
		$this->ReferClinicname->CurrentValue = $this->ReferClinicname->FormValue;
		$this->ReferCity->CurrentValue = $this->ReferCity->FormValue;
		$this->ReferMobileNo->CurrentValue = $this->ReferMobileNo->FormValue;
		$this->ReferA4TreatingConsultant->CurrentValue = $this->ReferA4TreatingConsultant->FormValue;
		$this->PurposreReferredfor->CurrentValue = $this->PurposreReferredfor->FormValue;
		$this->spouse_title->CurrentValue = $this->spouse_title->FormValue;
		$this->spouse_first_name->CurrentValue = $this->spouse_first_name->FormValue;
		$this->spouse_middle_name->CurrentValue = $this->spouse_middle_name->FormValue;
		$this->spouse_last_name->CurrentValue = $this->spouse_last_name->FormValue;
		$this->spouse_gender->CurrentValue = $this->spouse_gender->FormValue;
		$this->spouse_dob->CurrentValue = $this->spouse_dob->FormValue;
		$this->spouse_dob->CurrentValue = UnFormatDateTime($this->spouse_dob->CurrentValue, 7);
		$this->spouse_Age->CurrentValue = $this->spouse_Age->FormValue;
		$this->spouse_blood_group->CurrentValue = $this->spouse_blood_group->FormValue;
		$this->spouse_mobile_no->CurrentValue = $this->spouse_mobile_no->FormValue;
		$this->Maritalstatus->CurrentValue = $this->Maritalstatus->FormValue;
		$this->Business->CurrentValue = $this->Business->FormValue;
		$this->Patient_Language->CurrentValue = $this->Patient_Language->FormValue;
		$this->Passport->CurrentValue = $this->Passport->FormValue;
		$this->VisaNo->CurrentValue = $this->VisaNo->FormValue;
		$this->ValidityOfVisa->CurrentValue = $this->ValidityOfVisa->FormValue;
		$this->WhereDidYouHear->CurrentValue = $this->WhereDidYouHear->FormValue;
		$this->HospID->CurrentValue = $this->HospID->FormValue;
		$this->street->CurrentValue = $this->street->FormValue;
		$this->town->CurrentValue = $this->town->FormValue;
		$this->province->CurrentValue = $this->province->FormValue;
		$this->country->CurrentValue = $this->country->FormValue;
		$this->postal_code->CurrentValue = $this->postal_code->FormValue;
		$this->PEmail->CurrentValue = $this->PEmail->FormValue;
		$this->PEmergencyContact->CurrentValue = $this->PEmergencyContact->FormValue;
		$this->occupation->CurrentValue = $this->occupation->FormValue;
		$this->spouse_occupation->CurrentValue = $this->spouse_occupation->FormValue;
		$this->WhatsApp->CurrentValue = $this->WhatsApp->FormValue;
		$this->CouppleID->CurrentValue = $this->CouppleID->FormValue;
		$this->MaleID->CurrentValue = $this->MaleID->FormValue;
		$this->FemaleID->CurrentValue = $this->FemaleID->FormValue;
		$this->GroupID->CurrentValue = $this->GroupID->FormValue;
		$this->Relationship->CurrentValue = $this->Relationship->FormValue;
		$this->AppointmentSearch->CurrentValue = $this->AppointmentSearch->FormValue;
		$this->FacebookID->CurrentValue = $this->FacebookID->FormValue;
		$this->Clients->CurrentValue = $this->Clients->FormValue;
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
		$this->title->setDbValue($row['title']);
		$this->first_name->setDbValue($row['first_name']);
		$this->middle_name->setDbValue($row['middle_name']);
		$this->last_name->setDbValue($row['last_name']);
		$this->gender->setDbValue($row['gender']);
		$this->dob->setDbValue($row['dob']);
		$this->Age->setDbValue($row['Age']);
		$this->blood_group->setDbValue($row['blood_group']);
		$this->mobile_no->setDbValue($row['mobile_no']);
		$this->description->setDbValue($row['description']);
		$this->status->setDbValue($row['status']);
		$this->createdby->setDbValue($row['createdby']);
		$this->createddatetime->setDbValue($row['createddatetime']);
		$this->modifiedby->setDbValue($row['modifiedby']);
		$this->modifieddatetime->setDbValue($row['modifieddatetime']);
		$this->profilePic->Upload->DbValue = $row['profilePic'];
		$this->profilePic->setDbValue($this->profilePic->Upload->DbValue);
		$this->IdentificationMark->setDbValue($row['IdentificationMark']);
		$this->Religion->setDbValue($row['Religion']);
		$this->Nationality->setDbValue($row['Nationality']);
		$this->ReferedByDr->setDbValue($row['ReferedByDr']);
		if (array_key_exists('EV__ReferedByDr', $rs->fields)) {
			$this->ReferedByDr->VirtualValue = $rs->fields('EV__ReferedByDr'); // Set up virtual field value
		} else {
			$this->ReferedByDr->VirtualValue = ""; // Clear value
		}
		$this->ReferClinicname->setDbValue($row['ReferClinicname']);
		$this->ReferCity->setDbValue($row['ReferCity']);
		$this->ReferMobileNo->setDbValue($row['ReferMobileNo']);
		$this->ReferA4TreatingConsultant->setDbValue($row['ReferA4TreatingConsultant']);
		if (array_key_exists('EV__ReferA4TreatingConsultant', $rs->fields)) {
			$this->ReferA4TreatingConsultant->VirtualValue = $rs->fields('EV__ReferA4TreatingConsultant'); // Set up virtual field value
		} else {
			$this->ReferA4TreatingConsultant->VirtualValue = ""; // Clear value
		}
		$this->PurposreReferredfor->setDbValue($row['PurposreReferredfor']);
		$this->spouse_title->setDbValue($row['spouse_title']);
		$this->spouse_first_name->setDbValue($row['spouse_first_name']);
		$this->spouse_middle_name->setDbValue($row['spouse_middle_name']);
		$this->spouse_last_name->setDbValue($row['spouse_last_name']);
		$this->spouse_gender->setDbValue($row['spouse_gender']);
		$this->spouse_dob->setDbValue($row['spouse_dob']);
		$this->spouse_Age->setDbValue($row['spouse_Age']);
		$this->spouse_blood_group->setDbValue($row['spouse_blood_group']);
		$this->spouse_mobile_no->setDbValue($row['spouse_mobile_no']);
		$this->Maritalstatus->setDbValue($row['Maritalstatus']);
		$this->Business->setDbValue($row['Business']);
		$this->Patient_Language->setDbValue($row['Patient_Language']);
		$this->Passport->setDbValue($row['Passport']);
		$this->VisaNo->setDbValue($row['VisaNo']);
		$this->ValidityOfVisa->setDbValue($row['ValidityOfVisa']);
		$this->WhereDidYouHear->setDbValue($row['WhereDidYouHear']);
		$this->HospID->setDbValue($row['HospID']);
		$this->street->setDbValue($row['street']);
		$this->town->setDbValue($row['town']);
		$this->province->setDbValue($row['province']);
		$this->country->setDbValue($row['country']);
		$this->postal_code->setDbValue($row['postal_code']);
		$this->PEmail->setDbValue($row['PEmail']);
		$this->PEmergencyContact->setDbValue($row['PEmergencyContact']);
		$this->occupation->setDbValue($row['occupation']);
		$this->spouse_occupation->setDbValue($row['spouse_occupation']);
		$this->WhatsApp->setDbValue($row['WhatsApp']);
		$this->CouppleID->setDbValue($row['CouppleID']);
		$this->MaleID->setDbValue($row['MaleID']);
		$this->FemaleID->setDbValue($row['FemaleID']);
		$this->GroupID->setDbValue($row['GroupID']);
		$this->Relationship->setDbValue($row['Relationship']);
		$this->AppointmentSearch->setDbValue($row['AppointmentSearch']);
		$this->FacebookID->setDbValue($row['FacebookID']);
		$this->profilePicImage->Upload->DbValue = $row['profilePicImage'];
		if (is_array($this->profilePicImage->Upload->DbValue) || is_object($this->profilePicImage->Upload->DbValue)) // Byte array
			$this->profilePicImage->Upload->DbValue = BytesToString($this->profilePicImage->Upload->DbValue);
		$this->Clients->setDbValue($row['Clients']);
	}

	// Return a row with default values
	protected function newRow()
	{
		$row = [];
		$row['id'] = NULL;
		$row['PatientID'] = NULL;
		$row['title'] = NULL;
		$row['first_name'] = NULL;
		$row['middle_name'] = NULL;
		$row['last_name'] = NULL;
		$row['gender'] = NULL;
		$row['dob'] = NULL;
		$row['Age'] = NULL;
		$row['blood_group'] = NULL;
		$row['mobile_no'] = NULL;
		$row['description'] = NULL;
		$row['status'] = NULL;
		$row['createdby'] = NULL;
		$row['createddatetime'] = NULL;
		$row['modifiedby'] = NULL;
		$row['modifieddatetime'] = NULL;
		$row['profilePic'] = NULL;
		$row['IdentificationMark'] = NULL;
		$row['Religion'] = NULL;
		$row['Nationality'] = NULL;
		$row['ReferedByDr'] = NULL;
		$row['ReferClinicname'] = NULL;
		$row['ReferCity'] = NULL;
		$row['ReferMobileNo'] = NULL;
		$row['ReferA4TreatingConsultant'] = NULL;
		$row['PurposreReferredfor'] = NULL;
		$row['spouse_title'] = NULL;
		$row['spouse_first_name'] = NULL;
		$row['spouse_middle_name'] = NULL;
		$row['spouse_last_name'] = NULL;
		$row['spouse_gender'] = NULL;
		$row['spouse_dob'] = NULL;
		$row['spouse_Age'] = NULL;
		$row['spouse_blood_group'] = NULL;
		$row['spouse_mobile_no'] = NULL;
		$row['Maritalstatus'] = NULL;
		$row['Business'] = NULL;
		$row['Patient_Language'] = NULL;
		$row['Passport'] = NULL;
		$row['VisaNo'] = NULL;
		$row['ValidityOfVisa'] = NULL;
		$row['WhereDidYouHear'] = NULL;
		$row['HospID'] = NULL;
		$row['street'] = NULL;
		$row['town'] = NULL;
		$row['province'] = NULL;
		$row['country'] = NULL;
		$row['postal_code'] = NULL;
		$row['PEmail'] = NULL;
		$row['PEmergencyContact'] = NULL;
		$row['occupation'] = NULL;
		$row['spouse_occupation'] = NULL;
		$row['WhatsApp'] = NULL;
		$row['CouppleID'] = NULL;
		$row['MaleID'] = NULL;
		$row['FemaleID'] = NULL;
		$row['GroupID'] = NULL;
		$row['Relationship'] = NULL;
		$row['AppointmentSearch'] = NULL;
		$row['FacebookID'] = NULL;
		$row['profilePicImage'] = NULL;
		$row['Clients'] = NULL;
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
		// title
		// first_name
		// middle_name
		// last_name
		// gender
		// dob
		// Age
		// blood_group
		// mobile_no
		// description
		// status
		// createdby
		// createddatetime
		// modifiedby
		// modifieddatetime
		// profilePic
		// IdentificationMark
		// Religion
		// Nationality
		// ReferedByDr
		// ReferClinicname
		// ReferCity
		// ReferMobileNo
		// ReferA4TreatingConsultant
		// PurposreReferredfor
		// spouse_title
		// spouse_first_name
		// spouse_middle_name
		// spouse_last_name
		// spouse_gender
		// spouse_dob
		// spouse_Age
		// spouse_blood_group
		// spouse_mobile_no
		// Maritalstatus
		// Business
		// Patient_Language
		// Passport
		// VisaNo
		// ValidityOfVisa
		// WhereDidYouHear
		// HospID
		// street
		// town
		// province
		// country
		// postal_code
		// PEmail
		// PEmergencyContact
		// occupation
		// spouse_occupation
		// WhatsApp
		// CouppleID
		// MaleID
		// FemaleID
		// GroupID
		// Relationship
		// AppointmentSearch
		// FacebookID
		// profilePicImage
		// Clients

		if ($this->RowType == ROWTYPE_VIEW) { // View row

			// id
			$this->id->ViewValue = $this->id->CurrentValue;
			$this->id->ViewCustomAttributes = "";

			// PatientID
			$this->PatientID->ViewValue = $this->PatientID->CurrentValue;
			$this->PatientID->ViewCustomAttributes = "";

			// title
			$curVal = strval($this->title->CurrentValue);
			if ($curVal <> "") {
				$this->title->ViewValue = $this->title->lookupCacheOption($curVal);
				if ($this->title->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
					$sqlWrk = $this->title->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = $rswrk->fields('df');
						$this->title->ViewValue = $this->title->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->title->ViewValue = $this->title->CurrentValue;
					}
				}
			} else {
				$this->title->ViewValue = NULL;
			}
			$this->title->ViewCustomAttributes = "";

			// first_name
			$this->first_name->ViewValue = $this->first_name->CurrentValue;
			$this->first_name->ViewCustomAttributes = "";

			// middle_name
			$this->middle_name->ViewValue = $this->middle_name->CurrentValue;
			$this->middle_name->ViewCustomAttributes = "";

			// last_name
			$this->last_name->ViewValue = $this->last_name->CurrentValue;
			$this->last_name->ViewCustomAttributes = "";

			// gender
			$curVal = strval($this->gender->CurrentValue);
			if ($curVal <> "") {
				$this->gender->ViewValue = $this->gender->lookupCacheOption($curVal);
				if ($this->gender->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->gender->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = $rswrk->fields('df');
						$this->gender->ViewValue = $this->gender->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->gender->ViewValue = $this->gender->CurrentValue;
					}
				}
			} else {
				$this->gender->ViewValue = NULL;
			}
			$this->gender->ViewCustomAttributes = "";

			// dob
			$this->dob->ViewValue = $this->dob->CurrentValue;
			$this->dob->ViewValue = FormatDateTime($this->dob->ViewValue, 7);
			$this->dob->ViewCustomAttributes = "";

			// Age
			$this->Age->ViewValue = $this->Age->CurrentValue;
			$this->Age->ViewCustomAttributes = "";

			// blood_group
			$curVal = strval($this->blood_group->CurrentValue);
			if ($curVal <> "") {
				$this->blood_group->ViewValue = $this->blood_group->lookupCacheOption($curVal);
				if ($this->blood_group->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`BloodGroup`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->blood_group->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = $rswrk->fields('df');
						$this->blood_group->ViewValue = $this->blood_group->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->blood_group->ViewValue = $this->blood_group->CurrentValue;
					}
				}
			} else {
				$this->blood_group->ViewValue = NULL;
			}
			$this->blood_group->ViewCustomAttributes = "";

			// mobile_no
			$this->mobile_no->ViewValue = $this->mobile_no->CurrentValue;
			$this->mobile_no->ViewCustomAttributes = "";

			// description
			$this->description->ViewValue = $this->description->CurrentValue;
			$this->description->ViewCustomAttributes = "";

			// status
			$curVal = strval($this->status->CurrentValue);
			if ($curVal <> "") {
				$this->status->ViewValue = $this->status->lookupCacheOption($curVal);
				if ($this->status->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
					$sqlWrk = $this->status->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = $rswrk->fields('df');
						$this->status->ViewValue = $this->status->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->status->ViewValue = $this->status->CurrentValue;
					}
				}
			} else {
				$this->status->ViewValue = NULL;
			}
			$this->status->ViewCustomAttributes = "";

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

			// profilePic
			if (!EmptyValue($this->profilePic->Upload->DbValue)) {
				$this->profilePic->ImageWidth = 80;
				$this->profilePic->ImageHeight = 80;
				$this->profilePic->ImageAlt = $this->profilePic->alt();
				$this->profilePic->ViewValue = $this->profilePic->Upload->DbValue;
			} else {
				$this->profilePic->ViewValue = "";
			}
			$this->profilePic->ViewCustomAttributes = "";

			// IdentificationMark
			$this->IdentificationMark->ViewValue = $this->IdentificationMark->CurrentValue;
			$this->IdentificationMark->ViewCustomAttributes = "";

			// Religion
			$this->Religion->ViewValue = $this->Religion->CurrentValue;
			$this->Religion->ViewCustomAttributes = "";

			// Nationality
			$this->Nationality->ViewValue = $this->Nationality->CurrentValue;
			$this->Nationality->ViewCustomAttributes = "";

			// ReferedByDr
			if ($this->ReferedByDr->VirtualValue <> "") {
				$this->ReferedByDr->ViewValue = $this->ReferedByDr->VirtualValue;
			} else {
			$curVal = strval($this->ReferedByDr->CurrentValue);
			if ($curVal <> "") {
				$this->ReferedByDr->ViewValue = $this->ReferedByDr->lookupCacheOption($curVal);
				if ($this->ReferedByDr->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`reference`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->ReferedByDr->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = $rswrk->fields('df');
						$arwrk[2] = $rswrk->fields('df2');
						$arwrk[3] = $rswrk->fields('df3');
						$arwrk[4] = $rswrk->fields('df4');
						$this->ReferedByDr->ViewValue = $this->ReferedByDr->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->ReferedByDr->ViewValue = $this->ReferedByDr->CurrentValue;
					}
				}
			} else {
				$this->ReferedByDr->ViewValue = NULL;
			}
			}
			$this->ReferedByDr->ViewCustomAttributes = "";

			// ReferClinicname
			$this->ReferClinicname->ViewValue = $this->ReferClinicname->CurrentValue;
			$this->ReferClinicname->ViewCustomAttributes = "";

			// ReferCity
			$this->ReferCity->ViewValue = $this->ReferCity->CurrentValue;
			$this->ReferCity->ViewCustomAttributes = "";

			// ReferMobileNo
			$this->ReferMobileNo->ViewValue = $this->ReferMobileNo->CurrentValue;
			$this->ReferMobileNo->ViewCustomAttributes = "";

			// ReferA4TreatingConsultant
			if ($this->ReferA4TreatingConsultant->VirtualValue <> "") {
				$this->ReferA4TreatingConsultant->ViewValue = $this->ReferA4TreatingConsultant->VirtualValue;
			} else {
			$curVal = strval($this->ReferA4TreatingConsultant->CurrentValue);
			if ($curVal <> "") {
				$this->ReferA4TreatingConsultant->ViewValue = $this->ReferA4TreatingConsultant->lookupCacheOption($curVal);
				if ($this->ReferA4TreatingConsultant->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`NAME`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$lookupFilter = function() {
						return "`HospID`='".HospitalID()."'";
					};
					$lookupFilter = $lookupFilter->bindTo($this);
					$sqlWrk = $this->ReferA4TreatingConsultant->Lookup->getSql(FALSE, $filterWrk, $lookupFilter, $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = $rswrk->fields('df');
						$this->ReferA4TreatingConsultant->ViewValue = $this->ReferA4TreatingConsultant->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->ReferA4TreatingConsultant->ViewValue = $this->ReferA4TreatingConsultant->CurrentValue;
					}
				}
			} else {
				$this->ReferA4TreatingConsultant->ViewValue = NULL;
			}
			}
			$this->ReferA4TreatingConsultant->ViewCustomAttributes = "";

			// PurposreReferredfor
			$this->PurposreReferredfor->ViewValue = $this->PurposreReferredfor->CurrentValue;
			$this->PurposreReferredfor->ViewCustomAttributes = "";

			// spouse_title
			$curVal = strval($this->spouse_title->CurrentValue);
			if ($curVal <> "") {
				$this->spouse_title->ViewValue = $this->spouse_title->lookupCacheOption($curVal);
				if ($this->spouse_title->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->spouse_title->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = $rswrk->fields('df');
						$this->spouse_title->ViewValue = $this->spouse_title->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->spouse_title->ViewValue = $this->spouse_title->CurrentValue;
					}
				}
			} else {
				$this->spouse_title->ViewValue = NULL;
			}
			$this->spouse_title->ViewCustomAttributes = "";

			// spouse_first_name
			$this->spouse_first_name->ViewValue = $this->spouse_first_name->CurrentValue;
			$this->spouse_first_name->ViewCustomAttributes = "";

			// spouse_middle_name
			$this->spouse_middle_name->ViewValue = $this->spouse_middle_name->CurrentValue;
			$this->spouse_middle_name->ViewCustomAttributes = "";

			// spouse_last_name
			$this->spouse_last_name->ViewValue = $this->spouse_last_name->CurrentValue;
			$this->spouse_last_name->ViewCustomAttributes = "";

			// spouse_gender
			$curVal = strval($this->spouse_gender->CurrentValue);
			if ($curVal <> "") {
				$this->spouse_gender->ViewValue = $this->spouse_gender->lookupCacheOption($curVal);
				if ($this->spouse_gender->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->spouse_gender->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = $rswrk->fields('df');
						$this->spouse_gender->ViewValue = $this->spouse_gender->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->spouse_gender->ViewValue = $this->spouse_gender->CurrentValue;
					}
				}
			} else {
				$this->spouse_gender->ViewValue = NULL;
			}
			$this->spouse_gender->ViewCustomAttributes = "";

			// spouse_dob
			$this->spouse_dob->ViewValue = $this->spouse_dob->CurrentValue;
			$this->spouse_dob->ViewValue = FormatDateTime($this->spouse_dob->ViewValue, 7);
			$this->spouse_dob->ViewCustomAttributes = "";

			// spouse_Age
			$this->spouse_Age->ViewValue = $this->spouse_Age->CurrentValue;
			$this->spouse_Age->ViewCustomAttributes = "";

			// spouse_blood_group
			$curVal = strval($this->spouse_blood_group->CurrentValue);
			if ($curVal <> "") {
				$this->spouse_blood_group->ViewValue = $this->spouse_blood_group->lookupCacheOption($curVal);
				if ($this->spouse_blood_group->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`BloodGroup`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->spouse_blood_group->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = $rswrk->fields('df');
						$this->spouse_blood_group->ViewValue = $this->spouse_blood_group->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->spouse_blood_group->ViewValue = $this->spouse_blood_group->CurrentValue;
					}
				}
			} else {
				$this->spouse_blood_group->ViewValue = NULL;
			}
			$this->spouse_blood_group->ViewCustomAttributes = "";

			// spouse_mobile_no
			$this->spouse_mobile_no->ViewValue = $this->spouse_mobile_no->CurrentValue;
			$this->spouse_mobile_no->ViewCustomAttributes = "";

			// Maritalstatus
			$curVal = strval($this->Maritalstatus->CurrentValue);
			if ($curVal <> "") {
				$this->Maritalstatus->ViewValue = $this->Maritalstatus->lookupCacheOption($curVal);
				if ($this->Maritalstatus->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`MaritalStatus`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->Maritalstatus->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = $rswrk->fields('df');
						$this->Maritalstatus->ViewValue = $this->Maritalstatus->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->Maritalstatus->ViewValue = $this->Maritalstatus->CurrentValue;
					}
				}
			} else {
				$this->Maritalstatus->ViewValue = NULL;
			}
			$this->Maritalstatus->ViewCustomAttributes = "";

			// Business
			$this->Business->ViewValue = $this->Business->CurrentValue;
			$curVal = strval($this->Business->CurrentValue);
			if ($curVal <> "") {
				$this->Business->ViewValue = $this->Business->lookupCacheOption($curVal);
				if ($this->Business->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Job`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->Business->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = $rswrk->fields('df');
						$this->Business->ViewValue = $this->Business->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->Business->ViewValue = $this->Business->CurrentValue;
					}
				}
			} else {
				$this->Business->ViewValue = NULL;
			}
			$this->Business->ViewCustomAttributes = "";

			// Patient_Language
			$curVal = strval($this->Patient_Language->CurrentValue);
			if ($curVal <> "") {
				$this->Patient_Language->ViewValue = $this->Patient_Language->lookupCacheOption($curVal);
				if ($this->Patient_Language->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Language`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->Patient_Language->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = $rswrk->fields('df');
						$this->Patient_Language->ViewValue = $this->Patient_Language->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->Patient_Language->ViewValue = $this->Patient_Language->CurrentValue;
					}
				}
			} else {
				$this->Patient_Language->ViewValue = NULL;
			}
			$this->Patient_Language->ViewCustomAttributes = "";

			// Passport
			$this->Passport->ViewValue = $this->Passport->CurrentValue;
			$this->Passport->ViewCustomAttributes = "";

			// VisaNo
			$this->VisaNo->ViewValue = $this->VisaNo->CurrentValue;
			$this->VisaNo->ViewCustomAttributes = "";

			// ValidityOfVisa
			$this->ValidityOfVisa->ViewValue = $this->ValidityOfVisa->CurrentValue;
			$this->ValidityOfVisa->ViewCustomAttributes = "";

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

			// HospID
			$curVal = strval($this->HospID->CurrentValue);
			if ($curVal <> "") {
				$this->HospID->ViewValue = $this->HospID->lookupCacheOption($curVal);
				if ($this->HospID->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
					$sqlWrk = $this->HospID->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = $rswrk->fields('df');
						$this->HospID->ViewValue = $this->HospID->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->HospID->ViewValue = $this->HospID->CurrentValue;
					}
				}
			} else {
				$this->HospID->ViewValue = NULL;
			}
			$this->HospID->ViewCustomAttributes = "";

			// street
			$this->street->ViewValue = $this->street->CurrentValue;
			$this->street->ViewCustomAttributes = "";

			// town
			$this->town->ViewValue = $this->town->CurrentValue;
			$this->town->ViewCustomAttributes = "";

			// province
			$this->province->ViewValue = $this->province->CurrentValue;
			$this->province->ViewCustomAttributes = "";

			// country
			$this->country->ViewValue = $this->country->CurrentValue;
			$this->country->ViewCustomAttributes = "";

			// postal_code
			$this->postal_code->ViewValue = $this->postal_code->CurrentValue;
			$this->postal_code->ViewCustomAttributes = "";

			// PEmail
			$this->PEmail->ViewValue = $this->PEmail->CurrentValue;
			$this->PEmail->ViewCustomAttributes = "";

			// PEmergencyContact
			$this->PEmergencyContact->ViewValue = $this->PEmergencyContact->CurrentValue;
			$this->PEmergencyContact->ViewCustomAttributes = "";

			// occupation
			$this->occupation->ViewValue = $this->occupation->CurrentValue;
			$this->occupation->ViewCustomAttributes = "";

			// spouse_occupation
			$this->spouse_occupation->ViewValue = $this->spouse_occupation->CurrentValue;
			$this->spouse_occupation->ViewCustomAttributes = "";

			// WhatsApp
			$this->WhatsApp->ViewValue = $this->WhatsApp->CurrentValue;
			$this->WhatsApp->ViewCustomAttributes = "";

			// CouppleID
			$this->CouppleID->ViewValue = $this->CouppleID->CurrentValue;
			$this->CouppleID->ViewValue = FormatNumber($this->CouppleID->ViewValue, 0, -2, -2, -2);
			$this->CouppleID->ViewCustomAttributes = "";

			// MaleID
			$this->MaleID->ViewValue = $this->MaleID->CurrentValue;
			$this->MaleID->ViewValue = FormatNumber($this->MaleID->ViewValue, 0, -2, -2, -2);
			$this->MaleID->ViewCustomAttributes = "";

			// FemaleID
			$this->FemaleID->ViewValue = $this->FemaleID->CurrentValue;
			$this->FemaleID->ViewValue = FormatNumber($this->FemaleID->ViewValue, 0, -2, -2, -2);
			$this->FemaleID->ViewCustomAttributes = "";

			// GroupID
			$this->GroupID->ViewValue = $this->GroupID->CurrentValue;
			$this->GroupID->ViewValue = FormatNumber($this->GroupID->ViewValue, 0, -2, -2, -2);
			$this->GroupID->ViewCustomAttributes = "";

			// Relationship
			$this->Relationship->ViewValue = $this->Relationship->CurrentValue;
			$this->Relationship->ViewCustomAttributes = "";

			// AppointmentSearch
			$curVal = strval($this->AppointmentSearch->CurrentValue);
			if ($curVal <> "") {
				$this->AppointmentSearch->ViewValue = $this->AppointmentSearch->lookupCacheOption($curVal);
				if ($this->AppointmentSearch->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
					$sqlWrk = $this->AppointmentSearch->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = $rswrk->fields('df');
						$arwrk[2] = $rswrk->fields('df2');
						$arwrk[3] = $rswrk->fields('df3');
						$this->AppointmentSearch->ViewValue = $this->AppointmentSearch->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->AppointmentSearch->ViewValue = $this->AppointmentSearch->CurrentValue;
					}
				}
			} else {
				$this->AppointmentSearch->ViewValue = NULL;
			}
			$this->AppointmentSearch->ViewCustomAttributes = "";

			// FacebookID
			$this->FacebookID->ViewValue = $this->FacebookID->CurrentValue;
			$this->FacebookID->ViewCustomAttributes = "";

			// profilePicImage
			if (!EmptyValue($this->profilePicImage->Upload->DbValue)) {
				$this->profilePicImage->ViewValue = $this->id->CurrentValue;
				$this->profilePicImage->IsBlobImage = IsImageFile(ContentExtension($this->profilePicImage->Upload->DbValue));
			} else {
				$this->profilePicImage->ViewValue = "";
			}
			$this->profilePicImage->ViewCustomAttributes = "";

			// Clients
			$this->Clients->ViewValue = $this->Clients->CurrentValue;
			$this->Clients->ViewCustomAttributes = "";

			// id
			$this->id->LinkCustomAttributes = "";
			$this->id->HrefValue = "";
			$this->id->TooltipValue = "";

			// PatientID
			$this->PatientID->LinkCustomAttributes = "";
			$this->PatientID->HrefValue = "";
			$this->PatientID->TooltipValue = "";

			// title
			$this->title->LinkCustomAttributes = "";
			$this->title->HrefValue = "";
			$this->title->TooltipValue = "";

			// first_name
			$this->first_name->LinkCustomAttributes = "";
			$this->first_name->HrefValue = "";
			$this->first_name->TooltipValue = "";

			// middle_name
			$this->middle_name->LinkCustomAttributes = "";
			$this->middle_name->HrefValue = "";
			$this->middle_name->TooltipValue = "";

			// last_name
			$this->last_name->LinkCustomAttributes = "";
			$this->last_name->HrefValue = "";
			$this->last_name->TooltipValue = "";

			// gender
			$this->gender->LinkCustomAttributes = "";
			$this->gender->HrefValue = "";
			$this->gender->TooltipValue = "";

			// dob
			$this->dob->LinkCustomAttributes = "";
			$this->dob->HrefValue = "";
			$this->dob->TooltipValue = "";

			// Age
			$this->Age->LinkCustomAttributes = "";
			$this->Age->HrefValue = "";
			$this->Age->TooltipValue = "";

			// blood_group
			$this->blood_group->LinkCustomAttributes = "";
			$this->blood_group->HrefValue = "";
			$this->blood_group->TooltipValue = "";

			// mobile_no
			$this->mobile_no->LinkCustomAttributes = "";
			$this->mobile_no->HrefValue = "";
			$this->mobile_no->TooltipValue = "";

			// description
			$this->description->LinkCustomAttributes = "";
			$this->description->HrefValue = "";
			$this->description->TooltipValue = "";

			// status
			$this->status->LinkCustomAttributes = "";
			$this->status->HrefValue = "";
			$this->status->TooltipValue = "";

			// modifiedby
			$this->modifiedby->LinkCustomAttributes = "";
			$this->modifiedby->HrefValue = "";
			$this->modifiedby->TooltipValue = "";

			// modifieddatetime
			$this->modifieddatetime->LinkCustomAttributes = "";
			$this->modifieddatetime->HrefValue = "";
			$this->modifieddatetime->TooltipValue = "";

			// profilePic
			$this->profilePic->LinkCustomAttributes = "";
			if (!EmptyValue($this->profilePic->Upload->DbValue)) {
				$this->profilePic->HrefValue = GetFileUploadUrl($this->profilePic, $this->profilePic->Upload->DbValue); // Add prefix/suffix
				$this->profilePic->LinkAttrs["target"] = ""; // Add target
				if ($this->isExport()) $this->profilePic->HrefValue = FullUrl($this->profilePic->HrefValue, "href");
			} else {
				$this->profilePic->HrefValue = "";
			}
			$this->profilePic->ExportHrefValue = $this->profilePic->UploadPath . $this->profilePic->Upload->DbValue;
			$this->profilePic->TooltipValue = "";
			if ($this->profilePic->UseColorbox) {
				if (EmptyValue($this->profilePic->TooltipValue))
					$this->profilePic->LinkAttrs["title"] = $Language->phrase("ViewImageGallery");
				$this->profilePic->LinkAttrs["data-rel"] = "patient_x_profilePic";
				AppendClass($this->profilePic->LinkAttrs["class"], "ew-lightbox");
			}

			// IdentificationMark
			$this->IdentificationMark->LinkCustomAttributes = "";
			$this->IdentificationMark->HrefValue = "";
			$this->IdentificationMark->TooltipValue = "";

			// Religion
			$this->Religion->LinkCustomAttributes = "";
			$this->Religion->HrefValue = "";
			$this->Religion->TooltipValue = "";

			// Nationality
			$this->Nationality->LinkCustomAttributes = "";
			$this->Nationality->HrefValue = "";
			$this->Nationality->TooltipValue = "";

			// ReferedByDr
			$this->ReferedByDr->LinkCustomAttributes = "";
			$this->ReferedByDr->HrefValue = "";
			$this->ReferedByDr->TooltipValue = "";

			// ReferClinicname
			$this->ReferClinicname->LinkCustomAttributes = "";
			$this->ReferClinicname->HrefValue = "";
			$this->ReferClinicname->TooltipValue = "";

			// ReferCity
			$this->ReferCity->LinkCustomAttributes = "";
			$this->ReferCity->HrefValue = "";
			$this->ReferCity->TooltipValue = "";

			// ReferMobileNo
			$this->ReferMobileNo->LinkCustomAttributes = "";
			$this->ReferMobileNo->HrefValue = "";
			$this->ReferMobileNo->TooltipValue = "";

			// ReferA4TreatingConsultant
			$this->ReferA4TreatingConsultant->LinkCustomAttributes = "";
			$this->ReferA4TreatingConsultant->HrefValue = "";
			$this->ReferA4TreatingConsultant->TooltipValue = "";

			// PurposreReferredfor
			$this->PurposreReferredfor->LinkCustomAttributes = "";
			$this->PurposreReferredfor->HrefValue = "";
			$this->PurposreReferredfor->TooltipValue = "";

			// spouse_title
			$this->spouse_title->LinkCustomAttributes = "";
			$this->spouse_title->HrefValue = "";
			$this->spouse_title->TooltipValue = "";

			// spouse_first_name
			$this->spouse_first_name->LinkCustomAttributes = "";
			$this->spouse_first_name->HrefValue = "";
			$this->spouse_first_name->TooltipValue = "";

			// spouse_middle_name
			$this->spouse_middle_name->LinkCustomAttributes = "";
			$this->spouse_middle_name->HrefValue = "";
			$this->spouse_middle_name->TooltipValue = "";

			// spouse_last_name
			$this->spouse_last_name->LinkCustomAttributes = "";
			$this->spouse_last_name->HrefValue = "";
			$this->spouse_last_name->TooltipValue = "";

			// spouse_gender
			$this->spouse_gender->LinkCustomAttributes = "";
			$this->spouse_gender->HrefValue = "";
			$this->spouse_gender->TooltipValue = "";

			// spouse_dob
			$this->spouse_dob->LinkCustomAttributes = "";
			$this->spouse_dob->HrefValue = "";
			$this->spouse_dob->TooltipValue = "";

			// spouse_Age
			$this->spouse_Age->LinkCustomAttributes = "";
			$this->spouse_Age->HrefValue = "";
			$this->spouse_Age->TooltipValue = "";

			// spouse_blood_group
			$this->spouse_blood_group->LinkCustomAttributes = "";
			$this->spouse_blood_group->HrefValue = "";
			$this->spouse_blood_group->TooltipValue = "";

			// spouse_mobile_no
			$this->spouse_mobile_no->LinkCustomAttributes = "";
			$this->spouse_mobile_no->HrefValue = "";
			$this->spouse_mobile_no->TooltipValue = "";

			// Maritalstatus
			$this->Maritalstatus->LinkCustomAttributes = "";
			$this->Maritalstatus->HrefValue = "";
			$this->Maritalstatus->TooltipValue = "";

			// Business
			$this->Business->LinkCustomAttributes = "";
			$this->Business->HrefValue = "";
			$this->Business->TooltipValue = "";

			// Patient_Language
			$this->Patient_Language->LinkCustomAttributes = "";
			$this->Patient_Language->HrefValue = "";
			$this->Patient_Language->TooltipValue = "";

			// Passport
			$this->Passport->LinkCustomAttributes = "";
			$this->Passport->HrefValue = "";
			$this->Passport->TooltipValue = "";

			// VisaNo
			$this->VisaNo->LinkCustomAttributes = "";
			$this->VisaNo->HrefValue = "";
			$this->VisaNo->TooltipValue = "";

			// ValidityOfVisa
			$this->ValidityOfVisa->LinkCustomAttributes = "";
			$this->ValidityOfVisa->HrefValue = "";
			$this->ValidityOfVisa->TooltipValue = "";

			// WhereDidYouHear
			$this->WhereDidYouHear->LinkCustomAttributes = "";
			$this->WhereDidYouHear->HrefValue = "";
			$this->WhereDidYouHear->TooltipValue = "";

			// HospID
			$this->HospID->LinkCustomAttributes = "";
			$this->HospID->HrefValue = "";
			$this->HospID->TooltipValue = "";

			// street
			$this->street->LinkCustomAttributes = "";
			$this->street->HrefValue = "";
			$this->street->TooltipValue = "";

			// town
			$this->town->LinkCustomAttributes = "";
			$this->town->HrefValue = "";
			$this->town->TooltipValue = "";

			// province
			$this->province->LinkCustomAttributes = "";
			$this->province->HrefValue = "";
			$this->province->TooltipValue = "";

			// country
			$this->country->LinkCustomAttributes = "";
			$this->country->HrefValue = "";
			$this->country->TooltipValue = "";

			// postal_code
			$this->postal_code->LinkCustomAttributes = "";
			$this->postal_code->HrefValue = "";
			$this->postal_code->TooltipValue = "";

			// PEmail
			$this->PEmail->LinkCustomAttributes = "";
			$this->PEmail->HrefValue = "";
			$this->PEmail->TooltipValue = "";

			// PEmergencyContact
			$this->PEmergencyContact->LinkCustomAttributes = "";
			$this->PEmergencyContact->HrefValue = "";
			$this->PEmergencyContact->TooltipValue = "";

			// occupation
			$this->occupation->LinkCustomAttributes = "";
			$this->occupation->HrefValue = "";
			$this->occupation->TooltipValue = "";

			// spouse_occupation
			$this->spouse_occupation->LinkCustomAttributes = "";
			$this->spouse_occupation->HrefValue = "";
			$this->spouse_occupation->TooltipValue = "";

			// WhatsApp
			$this->WhatsApp->LinkCustomAttributes = "";
			$this->WhatsApp->HrefValue = "";
			$this->WhatsApp->TooltipValue = "";

			// CouppleID
			$this->CouppleID->LinkCustomAttributes = "";
			$this->CouppleID->HrefValue = "";
			$this->CouppleID->TooltipValue = "";

			// MaleID
			$this->MaleID->LinkCustomAttributes = "";
			$this->MaleID->HrefValue = "";
			$this->MaleID->TooltipValue = "";

			// FemaleID
			$this->FemaleID->LinkCustomAttributes = "";
			$this->FemaleID->HrefValue = "";
			$this->FemaleID->TooltipValue = "";

			// GroupID
			$this->GroupID->LinkCustomAttributes = "";
			$this->GroupID->HrefValue = "";
			$this->GroupID->TooltipValue = "";

			// Relationship
			$this->Relationship->LinkCustomAttributes = "";
			$this->Relationship->HrefValue = "";
			$this->Relationship->TooltipValue = "";

			// AppointmentSearch
			$this->AppointmentSearch->LinkCustomAttributes = "";
			$this->AppointmentSearch->HrefValue = "";
			$this->AppointmentSearch->TooltipValue = "";

			// FacebookID
			$this->FacebookID->LinkCustomAttributes = "";
			$this->FacebookID->HrefValue = "";
			$this->FacebookID->TooltipValue = "";

			// profilePicImage
			$this->profilePicImage->LinkCustomAttributes = "";
			if (!empty($this->profilePicImage->Upload->DbValue)) {
				$this->profilePicImage->HrefValue = GetFileUploadUrl($this->profilePicImage, $this->id->CurrentValue);
				$this->profilePicImage->LinkAttrs["target"] = "";
				if ($this->profilePicImage->IsBlobImage && empty($this->profilePicImage->LinkAttrs["target"]))
					$this->profilePicImage->LinkAttrs["target"] = "_blank";
				if ($this->isExport())
					$this->profilePicImage->HrefValue = FullUrl($this->profilePicImage->HrefValue, "href");
			} else {
				$this->profilePicImage->HrefValue = "";
			}
			$this->profilePicImage->ExportHrefValue = GetFileUploadUrl($this->profilePicImage, $this->id->CurrentValue);
			$this->profilePicImage->TooltipValue = "";

			// Clients
			$this->Clients->LinkCustomAttributes = "";
			$this->Clients->HrefValue = "";
			$this->Clients->TooltipValue = "";
		} elseif ($this->RowType == ROWTYPE_EDIT) { // Edit row

			// id
			$this->id->EditAttrs["class"] = "form-control";
			$this->id->EditCustomAttributes = "";
			$this->id->EditValue = $this->id->CurrentValue;
			$this->id->ViewCustomAttributes = "";

			// PatientID
			$this->PatientID->EditAttrs["class"] = "form-control";
			$this->PatientID->EditCustomAttributes = "";
			$this->PatientID->EditValue = $this->PatientID->CurrentValue;
			$this->PatientID->ViewCustomAttributes = "";

			// title
			$this->title->EditAttrs["class"] = "form-control";
			$this->title->EditCustomAttributes = "";
			$curVal = trim(strval($this->title->CurrentValue));
			if ($curVal <> "")
				$this->title->ViewValue = $this->title->lookupCacheOption($curVal);
			else
				$this->title->ViewValue = $this->title->Lookup !== NULL && is_array($this->title->Lookup->Options) ? $curVal : NULL;
			if ($this->title->ViewValue !== NULL) { // Load from cache
				$this->title->EditValue = array_values($this->title->Lookup->Options);
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`id`" . SearchString("=", $this->title->CurrentValue, DATATYPE_NUMBER, "");
				}
				$sqlWrk = $this->title->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
				if ($rswrk) $rswrk->Close();
				$this->title->EditValue = $arwrk;
			}

			// first_name
			$this->first_name->EditAttrs["class"] = "form-control";
			$this->first_name->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->first_name->CurrentValue = HtmlDecode($this->first_name->CurrentValue);
			$this->first_name->EditValue = HtmlEncode($this->first_name->CurrentValue);
			$this->first_name->PlaceHolder = RemoveHtml($this->first_name->caption());

			// middle_name
			$this->middle_name->EditAttrs["class"] = "form-control";
			$this->middle_name->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->middle_name->CurrentValue = HtmlDecode($this->middle_name->CurrentValue);
			$this->middle_name->EditValue = HtmlEncode($this->middle_name->CurrentValue);
			$this->middle_name->PlaceHolder = RemoveHtml($this->middle_name->caption());

			// last_name
			$this->last_name->EditAttrs["class"] = "form-control";
			$this->last_name->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->last_name->CurrentValue = HtmlDecode($this->last_name->CurrentValue);
			$this->last_name->EditValue = HtmlEncode($this->last_name->CurrentValue);
			$this->last_name->PlaceHolder = RemoveHtml($this->last_name->caption());

			// gender
			$this->gender->EditAttrs["class"] = "form-control";
			$this->gender->EditCustomAttributes = "";
			$curVal = trim(strval($this->gender->CurrentValue));
			if ($curVal <> "")
				$this->gender->ViewValue = $this->gender->lookupCacheOption($curVal);
			else
				$this->gender->ViewValue = $this->gender->Lookup !== NULL && is_array($this->gender->Lookup->Options) ? $curVal : NULL;
			if ($this->gender->ViewValue !== NULL) { // Load from cache
				$this->gender->EditValue = array_values($this->gender->Lookup->Options);
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`Name`" . SearchString("=", $this->gender->CurrentValue, DATATYPE_STRING, "");
				}
				$sqlWrk = $this->gender->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
				if ($rswrk) $rswrk->Close();
				$this->gender->EditValue = $arwrk;
			}

			// dob
			$this->dob->EditAttrs["class"] = "form-control";
			$this->dob->EditCustomAttributes = "";
			$this->dob->EditValue = HtmlEncode(FormatDateTime($this->dob->CurrentValue, 7));
			$this->dob->PlaceHolder = RemoveHtml($this->dob->caption());

			// Age
			$this->Age->EditAttrs["class"] = "form-control";
			$this->Age->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Age->CurrentValue = HtmlDecode($this->Age->CurrentValue);
			$this->Age->EditValue = HtmlEncode($this->Age->CurrentValue);
			$this->Age->PlaceHolder = RemoveHtml($this->Age->caption());

			// blood_group
			$this->blood_group->EditAttrs["class"] = "form-control";
			$this->blood_group->EditCustomAttributes = "";
			$curVal = trim(strval($this->blood_group->CurrentValue));
			if ($curVal <> "")
				$this->blood_group->ViewValue = $this->blood_group->lookupCacheOption($curVal);
			else
				$this->blood_group->ViewValue = $this->blood_group->Lookup !== NULL && is_array($this->blood_group->Lookup->Options) ? $curVal : NULL;
			if ($this->blood_group->ViewValue !== NULL) { // Load from cache
				$this->blood_group->EditValue = array_values($this->blood_group->Lookup->Options);
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`BloodGroup`" . SearchString("=", $this->blood_group->CurrentValue, DATATYPE_STRING, "");
				}
				$sqlWrk = $this->blood_group->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
				if ($rswrk) $rswrk->Close();
				$this->blood_group->EditValue = $arwrk;
			}

			// mobile_no
			$this->mobile_no->EditAttrs["class"] = "form-control";
			$this->mobile_no->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->mobile_no->CurrentValue = HtmlDecode($this->mobile_no->CurrentValue);
			$this->mobile_no->EditValue = HtmlEncode($this->mobile_no->CurrentValue);
			$this->mobile_no->PlaceHolder = RemoveHtml($this->mobile_no->caption());

			// description
			$this->description->EditAttrs["class"] = "form-control";
			$this->description->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->description->CurrentValue = HtmlDecode($this->description->CurrentValue);
			$this->description->EditValue = HtmlEncode($this->description->CurrentValue);
			$this->description->PlaceHolder = RemoveHtml($this->description->caption());

			// status
			$this->status->EditAttrs["class"] = "form-control";
			$this->status->EditCustomAttributes = "";
			$curVal = trim(strval($this->status->CurrentValue));
			if ($curVal <> "")
				$this->status->ViewValue = $this->status->lookupCacheOption($curVal);
			else
				$this->status->ViewValue = $this->status->Lookup !== NULL && is_array($this->status->Lookup->Options) ? $curVal : NULL;
			if ($this->status->ViewValue !== NULL) { // Load from cache
				$this->status->EditValue = array_values($this->status->Lookup->Options);
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`id`" . SearchString("=", $this->status->CurrentValue, DATATYPE_NUMBER, "");
				}
				$sqlWrk = $this->status->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
				if ($rswrk) $rswrk->Close();
				$this->status->EditValue = $arwrk;
			}

			// modifiedby
			// modifieddatetime
			// profilePic

			$this->profilePic->EditAttrs["class"] = "form-control";
			$this->profilePic->EditCustomAttributes = "";
			if (!EmptyValue($this->profilePic->Upload->DbValue)) {
				$this->profilePic->ImageWidth = 80;
				$this->profilePic->ImageHeight = 80;
				$this->profilePic->ImageAlt = $this->profilePic->alt();
				$this->profilePic->EditValue = $this->profilePic->Upload->DbValue;
			} else {
				$this->profilePic->EditValue = "";
			}
			if (!EmptyValue($this->profilePic->CurrentValue))
					$this->profilePic->Upload->FileName = $this->profilePic->CurrentValue;
			if ($this->isShow() && !$this->EventCancelled)
				RenderUploadField($this->profilePic);

			// IdentificationMark
			$this->IdentificationMark->EditAttrs["class"] = "form-control";
			$this->IdentificationMark->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->IdentificationMark->CurrentValue = HtmlDecode($this->IdentificationMark->CurrentValue);
			$this->IdentificationMark->EditValue = HtmlEncode($this->IdentificationMark->CurrentValue);
			$this->IdentificationMark->PlaceHolder = RemoveHtml($this->IdentificationMark->caption());

			// Religion
			$this->Religion->EditAttrs["class"] = "form-control";
			$this->Religion->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Religion->CurrentValue = HtmlDecode($this->Religion->CurrentValue);
			$this->Religion->EditValue = HtmlEncode($this->Religion->CurrentValue);
			$this->Religion->PlaceHolder = RemoveHtml($this->Religion->caption());

			// Nationality
			$this->Nationality->EditAttrs["class"] = "form-control";
			$this->Nationality->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Nationality->CurrentValue = HtmlDecode($this->Nationality->CurrentValue);
			$this->Nationality->EditValue = HtmlEncode($this->Nationality->CurrentValue);
			$this->Nationality->PlaceHolder = RemoveHtml($this->Nationality->caption());

			// ReferedByDr
			$this->ReferedByDr->EditCustomAttributes = "";
			$curVal = trim(strval($this->ReferedByDr->CurrentValue));
			if ($curVal <> "")
				$this->ReferedByDr->ViewValue = $this->ReferedByDr->lookupCacheOption($curVal);
			else
				$this->ReferedByDr->ViewValue = $this->ReferedByDr->Lookup !== NULL && is_array($this->ReferedByDr->Lookup->Options) ? $curVal : NULL;
			if ($this->ReferedByDr->ViewValue !== NULL) { // Load from cache
				$this->ReferedByDr->EditValue = array_values($this->ReferedByDr->Lookup->Options);
				if ($this->ReferedByDr->ViewValue == "")
					$this->ReferedByDr->ViewValue = $Language->phrase("PleaseSelect");
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`reference`" . SearchString("=", $this->ReferedByDr->CurrentValue, DATATYPE_STRING, "");
				}
				$sqlWrk = $this->ReferedByDr->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = array();
					$arwrk[1] = HtmlEncode($rswrk->fields('df'));
					$arwrk[2] = HtmlEncode($rswrk->fields('df2'));
					$arwrk[3] = HtmlEncode($rswrk->fields('df3'));
					$arwrk[4] = HtmlEncode($rswrk->fields('df4'));
					$this->ReferedByDr->ViewValue = $this->ReferedByDr->displayValue($arwrk);
				} else {
					$this->ReferedByDr->ViewValue = $Language->phrase("PleaseSelect");
				}
				$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
				if ($rswrk) $rswrk->Close();
				$this->ReferedByDr->EditValue = $arwrk;
			}

			// ReferClinicname
			$this->ReferClinicname->EditAttrs["class"] = "form-control";
			$this->ReferClinicname->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->ReferClinicname->CurrentValue = HtmlDecode($this->ReferClinicname->CurrentValue);
			$this->ReferClinicname->EditValue = HtmlEncode($this->ReferClinicname->CurrentValue);
			$this->ReferClinicname->PlaceHolder = RemoveHtml($this->ReferClinicname->caption());

			// ReferCity
			$this->ReferCity->EditAttrs["class"] = "form-control";
			$this->ReferCity->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->ReferCity->CurrentValue = HtmlDecode($this->ReferCity->CurrentValue);
			$this->ReferCity->EditValue = HtmlEncode($this->ReferCity->CurrentValue);
			$this->ReferCity->PlaceHolder = RemoveHtml($this->ReferCity->caption());

			// ReferMobileNo
			$this->ReferMobileNo->EditAttrs["class"] = "form-control";
			$this->ReferMobileNo->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->ReferMobileNo->CurrentValue = HtmlDecode($this->ReferMobileNo->CurrentValue);
			$this->ReferMobileNo->EditValue = HtmlEncode($this->ReferMobileNo->CurrentValue);
			$this->ReferMobileNo->PlaceHolder = RemoveHtml($this->ReferMobileNo->caption());

			// ReferA4TreatingConsultant
			$this->ReferA4TreatingConsultant->EditCustomAttributes = "";
			$curVal = trim(strval($this->ReferA4TreatingConsultant->CurrentValue));
			if ($curVal <> "")
				$this->ReferA4TreatingConsultant->ViewValue = $this->ReferA4TreatingConsultant->lookupCacheOption($curVal);
			else
				$this->ReferA4TreatingConsultant->ViewValue = $this->ReferA4TreatingConsultant->Lookup !== NULL && is_array($this->ReferA4TreatingConsultant->Lookup->Options) ? $curVal : NULL;
			if ($this->ReferA4TreatingConsultant->ViewValue !== NULL) { // Load from cache
				$this->ReferA4TreatingConsultant->EditValue = array_values($this->ReferA4TreatingConsultant->Lookup->Options);
				if ($this->ReferA4TreatingConsultant->ViewValue == "")
					$this->ReferA4TreatingConsultant->ViewValue = $Language->phrase("PleaseSelect");
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`NAME`" . SearchString("=", $this->ReferA4TreatingConsultant->CurrentValue, DATATYPE_STRING, "");
				}
				$lookupFilter = function() {
					return "`HospID`='".HospitalID()."'";
				};
				$lookupFilter = $lookupFilter->bindTo($this);
				$sqlWrk = $this->ReferA4TreatingConsultant->Lookup->getSql(TRUE, $filterWrk, $lookupFilter, $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = array();
					$arwrk[1] = HtmlEncode($rswrk->fields('df'));
					$this->ReferA4TreatingConsultant->ViewValue = $this->ReferA4TreatingConsultant->displayValue($arwrk);
				} else {
					$this->ReferA4TreatingConsultant->ViewValue = $Language->phrase("PleaseSelect");
				}
				$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
				if ($rswrk) $rswrk->Close();
				$this->ReferA4TreatingConsultant->EditValue = $arwrk;
			}

			// PurposreReferredfor
			$this->PurposreReferredfor->EditAttrs["class"] = "form-control";
			$this->PurposreReferredfor->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->PurposreReferredfor->CurrentValue = HtmlDecode($this->PurposreReferredfor->CurrentValue);
			$this->PurposreReferredfor->EditValue = HtmlEncode($this->PurposreReferredfor->CurrentValue);
			$this->PurposreReferredfor->PlaceHolder = RemoveHtml($this->PurposreReferredfor->caption());

			// spouse_title
			$this->spouse_title->EditAttrs["class"] = "form-control";
			$this->spouse_title->EditCustomAttributes = "";
			$curVal = trim(strval($this->spouse_title->CurrentValue));
			if ($curVal <> "")
				$this->spouse_title->ViewValue = $this->spouse_title->lookupCacheOption($curVal);
			else
				$this->spouse_title->ViewValue = $this->spouse_title->Lookup !== NULL && is_array($this->spouse_title->Lookup->Options) ? $curVal : NULL;
			if ($this->spouse_title->ViewValue !== NULL) { // Load from cache
				$this->spouse_title->EditValue = array_values($this->spouse_title->Lookup->Options);
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`Name`" . SearchString("=", $this->spouse_title->CurrentValue, DATATYPE_STRING, "");
				}
				$sqlWrk = $this->spouse_title->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
				if ($rswrk) $rswrk->Close();
				$this->spouse_title->EditValue = $arwrk;
			}

			// spouse_first_name
			$this->spouse_first_name->EditAttrs["class"] = "form-control";
			$this->spouse_first_name->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->spouse_first_name->CurrentValue = HtmlDecode($this->spouse_first_name->CurrentValue);
			$this->spouse_first_name->EditValue = HtmlEncode($this->spouse_first_name->CurrentValue);
			$this->spouse_first_name->PlaceHolder = RemoveHtml($this->spouse_first_name->caption());

			// spouse_middle_name
			$this->spouse_middle_name->EditAttrs["class"] = "form-control";
			$this->spouse_middle_name->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->spouse_middle_name->CurrentValue = HtmlDecode($this->spouse_middle_name->CurrentValue);
			$this->spouse_middle_name->EditValue = HtmlEncode($this->spouse_middle_name->CurrentValue);
			$this->spouse_middle_name->PlaceHolder = RemoveHtml($this->spouse_middle_name->caption());

			// spouse_last_name
			$this->spouse_last_name->EditAttrs["class"] = "form-control";
			$this->spouse_last_name->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->spouse_last_name->CurrentValue = HtmlDecode($this->spouse_last_name->CurrentValue);
			$this->spouse_last_name->EditValue = HtmlEncode($this->spouse_last_name->CurrentValue);
			$this->spouse_last_name->PlaceHolder = RemoveHtml($this->spouse_last_name->caption());

			// spouse_gender
			$this->spouse_gender->EditAttrs["class"] = "form-control";
			$this->spouse_gender->EditCustomAttributes = "";
			$curVal = trim(strval($this->spouse_gender->CurrentValue));
			if ($curVal <> "")
				$this->spouse_gender->ViewValue = $this->spouse_gender->lookupCacheOption($curVal);
			else
				$this->spouse_gender->ViewValue = $this->spouse_gender->Lookup !== NULL && is_array($this->spouse_gender->Lookup->Options) ? $curVal : NULL;
			if ($this->spouse_gender->ViewValue !== NULL) { // Load from cache
				$this->spouse_gender->EditValue = array_values($this->spouse_gender->Lookup->Options);
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`Name`" . SearchString("=", $this->spouse_gender->CurrentValue, DATATYPE_STRING, "");
				}
				$sqlWrk = $this->spouse_gender->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
				if ($rswrk) $rswrk->Close();
				$this->spouse_gender->EditValue = $arwrk;
			}

			// spouse_dob
			$this->spouse_dob->EditAttrs["class"] = "form-control";
			$this->spouse_dob->EditCustomAttributes = "";
			$this->spouse_dob->EditValue = HtmlEncode(FormatDateTime($this->spouse_dob->CurrentValue, 7));
			$this->spouse_dob->PlaceHolder = RemoveHtml($this->spouse_dob->caption());

			// spouse_Age
			$this->spouse_Age->EditAttrs["class"] = "form-control";
			$this->spouse_Age->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->spouse_Age->CurrentValue = HtmlDecode($this->spouse_Age->CurrentValue);
			$this->spouse_Age->EditValue = HtmlEncode($this->spouse_Age->CurrentValue);
			$this->spouse_Age->PlaceHolder = RemoveHtml($this->spouse_Age->caption());

			// spouse_blood_group
			$this->spouse_blood_group->EditAttrs["class"] = "form-control";
			$this->spouse_blood_group->EditCustomAttributes = "";
			$curVal = trim(strval($this->spouse_blood_group->CurrentValue));
			if ($curVal <> "")
				$this->spouse_blood_group->ViewValue = $this->spouse_blood_group->lookupCacheOption($curVal);
			else
				$this->spouse_blood_group->ViewValue = $this->spouse_blood_group->Lookup !== NULL && is_array($this->spouse_blood_group->Lookup->Options) ? $curVal : NULL;
			if ($this->spouse_blood_group->ViewValue !== NULL) { // Load from cache
				$this->spouse_blood_group->EditValue = array_values($this->spouse_blood_group->Lookup->Options);
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`BloodGroup`" . SearchString("=", $this->spouse_blood_group->CurrentValue, DATATYPE_STRING, "");
				}
				$sqlWrk = $this->spouse_blood_group->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
				if ($rswrk) $rswrk->Close();
				$this->spouse_blood_group->EditValue = $arwrk;
			}

			// spouse_mobile_no
			$this->spouse_mobile_no->EditAttrs["class"] = "form-control";
			$this->spouse_mobile_no->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->spouse_mobile_no->CurrentValue = HtmlDecode($this->spouse_mobile_no->CurrentValue);
			$this->spouse_mobile_no->EditValue = HtmlEncode($this->spouse_mobile_no->CurrentValue);
			$this->spouse_mobile_no->PlaceHolder = RemoveHtml($this->spouse_mobile_no->caption());

			// Maritalstatus
			$this->Maritalstatus->EditAttrs["class"] = "form-control";
			$this->Maritalstatus->EditCustomAttributes = "";
			$curVal = trim(strval($this->Maritalstatus->CurrentValue));
			if ($curVal <> "")
				$this->Maritalstatus->ViewValue = $this->Maritalstatus->lookupCacheOption($curVal);
			else
				$this->Maritalstatus->ViewValue = $this->Maritalstatus->Lookup !== NULL && is_array($this->Maritalstatus->Lookup->Options) ? $curVal : NULL;
			if ($this->Maritalstatus->ViewValue !== NULL) { // Load from cache
				$this->Maritalstatus->EditValue = array_values($this->Maritalstatus->Lookup->Options);
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`MaritalStatus`" . SearchString("=", $this->Maritalstatus->CurrentValue, DATATYPE_STRING, "");
				}
				$sqlWrk = $this->Maritalstatus->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
				if ($rswrk) $rswrk->Close();
				$this->Maritalstatus->EditValue = $arwrk;
			}

			// Business
			$this->Business->EditAttrs["class"] = "form-control";
			$this->Business->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Business->CurrentValue = HtmlDecode($this->Business->CurrentValue);
			$this->Business->EditValue = HtmlEncode($this->Business->CurrentValue);
			$curVal = strval($this->Business->CurrentValue);
			if ($curVal <> "") {
				$this->Business->EditValue = $this->Business->lookupCacheOption($curVal);
				if ($this->Business->EditValue === NULL) { // Lookup from database
					$filterWrk = "`Job`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->Business->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = HtmlEncode($rswrk->fields('df'));
						$this->Business->EditValue = $this->Business->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->Business->EditValue = HtmlEncode($this->Business->CurrentValue);
					}
				}
			} else {
				$this->Business->EditValue = NULL;
			}
			$this->Business->PlaceHolder = RemoveHtml($this->Business->caption());

			// Patient_Language
			$this->Patient_Language->EditAttrs["class"] = "form-control";
			$this->Patient_Language->EditCustomAttributes = "";
			$curVal = trim(strval($this->Patient_Language->CurrentValue));
			if ($curVal <> "")
				$this->Patient_Language->ViewValue = $this->Patient_Language->lookupCacheOption($curVal);
			else
				$this->Patient_Language->ViewValue = $this->Patient_Language->Lookup !== NULL && is_array($this->Patient_Language->Lookup->Options) ? $curVal : NULL;
			if ($this->Patient_Language->ViewValue !== NULL) { // Load from cache
				$this->Patient_Language->EditValue = array_values($this->Patient_Language->Lookup->Options);
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`Language`" . SearchString("=", $this->Patient_Language->CurrentValue, DATATYPE_STRING, "");
				}
				$sqlWrk = $this->Patient_Language->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
				if ($rswrk) $rswrk->Close();
				$this->Patient_Language->EditValue = $arwrk;
			}

			// Passport
			$this->Passport->EditAttrs["class"] = "form-control";
			$this->Passport->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Passport->CurrentValue = HtmlDecode($this->Passport->CurrentValue);
			$this->Passport->EditValue = HtmlEncode($this->Passport->CurrentValue);
			$this->Passport->PlaceHolder = RemoveHtml($this->Passport->caption());

			// VisaNo
			$this->VisaNo->EditAttrs["class"] = "form-control";
			$this->VisaNo->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->VisaNo->CurrentValue = HtmlDecode($this->VisaNo->CurrentValue);
			$this->VisaNo->EditValue = HtmlEncode($this->VisaNo->CurrentValue);
			$this->VisaNo->PlaceHolder = RemoveHtml($this->VisaNo->caption());

			// ValidityOfVisa
			$this->ValidityOfVisa->EditAttrs["class"] = "form-control";
			$this->ValidityOfVisa->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->ValidityOfVisa->CurrentValue = HtmlDecode($this->ValidityOfVisa->CurrentValue);
			$this->ValidityOfVisa->EditValue = HtmlEncode($this->ValidityOfVisa->CurrentValue);
			$this->ValidityOfVisa->PlaceHolder = RemoveHtml($this->ValidityOfVisa->caption());

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

			// HospID
			// street

			$this->street->EditAttrs["class"] = "form-control";
			$this->street->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->street->CurrentValue = HtmlDecode($this->street->CurrentValue);
			$this->street->EditValue = HtmlEncode($this->street->CurrentValue);
			$this->street->PlaceHolder = RemoveHtml($this->street->caption());

			// town
			$this->town->EditAttrs["class"] = "form-control";
			$this->town->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->town->CurrentValue = HtmlDecode($this->town->CurrentValue);
			$this->town->EditValue = HtmlEncode($this->town->CurrentValue);
			$this->town->PlaceHolder = RemoveHtml($this->town->caption());

			// province
			$this->province->EditAttrs["class"] = "form-control";
			$this->province->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->province->CurrentValue = HtmlDecode($this->province->CurrentValue);
			$this->province->EditValue = HtmlEncode($this->province->CurrentValue);
			$this->province->PlaceHolder = RemoveHtml($this->province->caption());

			// country
			$this->country->EditAttrs["class"] = "form-control";
			$this->country->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->country->CurrentValue = HtmlDecode($this->country->CurrentValue);
			$this->country->EditValue = HtmlEncode($this->country->CurrentValue);
			$this->country->PlaceHolder = RemoveHtml($this->country->caption());

			// postal_code
			$this->postal_code->EditAttrs["class"] = "form-control";
			$this->postal_code->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->postal_code->CurrentValue = HtmlDecode($this->postal_code->CurrentValue);
			$this->postal_code->EditValue = HtmlEncode($this->postal_code->CurrentValue);
			$this->postal_code->PlaceHolder = RemoveHtml($this->postal_code->caption());

			// PEmail
			$this->PEmail->EditAttrs["class"] = "form-control";
			$this->PEmail->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->PEmail->CurrentValue = HtmlDecode($this->PEmail->CurrentValue);
			$this->PEmail->EditValue = HtmlEncode($this->PEmail->CurrentValue);
			$this->PEmail->PlaceHolder = RemoveHtml($this->PEmail->caption());

			// PEmergencyContact
			$this->PEmergencyContact->EditAttrs["class"] = "form-control";
			$this->PEmergencyContact->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->PEmergencyContact->CurrentValue = HtmlDecode($this->PEmergencyContact->CurrentValue);
			$this->PEmergencyContact->EditValue = HtmlEncode($this->PEmergencyContact->CurrentValue);
			$this->PEmergencyContact->PlaceHolder = RemoveHtml($this->PEmergencyContact->caption());

			// occupation
			$this->occupation->EditAttrs["class"] = "form-control";
			$this->occupation->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->occupation->CurrentValue = HtmlDecode($this->occupation->CurrentValue);
			$this->occupation->EditValue = HtmlEncode($this->occupation->CurrentValue);
			$this->occupation->PlaceHolder = RemoveHtml($this->occupation->caption());

			// spouse_occupation
			$this->spouse_occupation->EditAttrs["class"] = "form-control";
			$this->spouse_occupation->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->spouse_occupation->CurrentValue = HtmlDecode($this->spouse_occupation->CurrentValue);
			$this->spouse_occupation->EditValue = HtmlEncode($this->spouse_occupation->CurrentValue);
			$this->spouse_occupation->PlaceHolder = RemoveHtml($this->spouse_occupation->caption());

			// WhatsApp
			$this->WhatsApp->EditAttrs["class"] = "form-control";
			$this->WhatsApp->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->WhatsApp->CurrentValue = HtmlDecode($this->WhatsApp->CurrentValue);
			$this->WhatsApp->EditValue = HtmlEncode($this->WhatsApp->CurrentValue);
			$this->WhatsApp->PlaceHolder = RemoveHtml($this->WhatsApp->caption());

			// CouppleID
			$this->CouppleID->EditAttrs["class"] = "form-control";
			$this->CouppleID->EditCustomAttributes = "";
			$this->CouppleID->EditValue = HtmlEncode($this->CouppleID->CurrentValue);
			$this->CouppleID->PlaceHolder = RemoveHtml($this->CouppleID->caption());

			// MaleID
			$this->MaleID->EditAttrs["class"] = "form-control";
			$this->MaleID->EditCustomAttributes = "";
			$this->MaleID->EditValue = HtmlEncode($this->MaleID->CurrentValue);
			$this->MaleID->PlaceHolder = RemoveHtml($this->MaleID->caption());

			// FemaleID
			$this->FemaleID->EditAttrs["class"] = "form-control";
			$this->FemaleID->EditCustomAttributes = "";
			$this->FemaleID->EditValue = HtmlEncode($this->FemaleID->CurrentValue);
			$this->FemaleID->PlaceHolder = RemoveHtml($this->FemaleID->caption());

			// GroupID
			$this->GroupID->EditAttrs["class"] = "form-control";
			$this->GroupID->EditCustomAttributes = "";
			$this->GroupID->EditValue = HtmlEncode($this->GroupID->CurrentValue);
			$this->GroupID->PlaceHolder = RemoveHtml($this->GroupID->caption());

			// Relationship
			$this->Relationship->EditAttrs["class"] = "form-control";
			$this->Relationship->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Relationship->CurrentValue = HtmlDecode($this->Relationship->CurrentValue);
			$this->Relationship->EditValue = HtmlEncode($this->Relationship->CurrentValue);
			$this->Relationship->PlaceHolder = RemoveHtml($this->Relationship->caption());

			// AppointmentSearch
			$this->AppointmentSearch->EditCustomAttributes = "";
			$curVal = trim(strval($this->AppointmentSearch->CurrentValue));
			if ($curVal <> "")
				$this->AppointmentSearch->ViewValue = $this->AppointmentSearch->lookupCacheOption($curVal);
			else
				$this->AppointmentSearch->ViewValue = $this->AppointmentSearch->Lookup !== NULL && is_array($this->AppointmentSearch->Lookup->Options) ? $curVal : NULL;
			if ($this->AppointmentSearch->ViewValue !== NULL) { // Load from cache
				$this->AppointmentSearch->EditValue = array_values($this->AppointmentSearch->Lookup->Options);
				if ($this->AppointmentSearch->ViewValue == "")
					$this->AppointmentSearch->ViewValue = $Language->phrase("PleaseSelect");
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`id`" . SearchString("=", $this->AppointmentSearch->CurrentValue, DATATYPE_NUMBER, "");
				}
				$sqlWrk = $this->AppointmentSearch->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = array();
					$arwrk[1] = HtmlEncode($rswrk->fields('df'));
					$arwrk[2] = HtmlEncode($rswrk->fields('df2'));
					$arwrk[3] = HtmlEncode($rswrk->fields('df3'));
					$this->AppointmentSearch->ViewValue = $this->AppointmentSearch->displayValue($arwrk);
				} else {
					$this->AppointmentSearch->ViewValue = $Language->phrase("PleaseSelect");
				}
				$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
				if ($rswrk) $rswrk->Close();
				$this->AppointmentSearch->EditValue = $arwrk;
			}

			// FacebookID
			$this->FacebookID->EditAttrs["class"] = "form-control";
			$this->FacebookID->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->FacebookID->CurrentValue = HtmlDecode($this->FacebookID->CurrentValue);
			$this->FacebookID->EditValue = HtmlEncode($this->FacebookID->CurrentValue);
			$this->FacebookID->PlaceHolder = RemoveHtml($this->FacebookID->caption());

			// profilePicImage
			$this->profilePicImage->EditAttrs["class"] = "form-control";
			$this->profilePicImage->EditCustomAttributes = "";
			if (!EmptyValue($this->profilePicImage->Upload->DbValue)) {
				$this->profilePicImage->EditValue = $this->id->CurrentValue;
				$this->profilePicImage->IsBlobImage = IsImageFile(ContentExtension($this->profilePicImage->Upload->DbValue));
			} else {
				$this->profilePicImage->EditValue = "";
			}
			if ($this->isShow() && !$this->EventCancelled)
				RenderUploadField($this->profilePicImage);

			// Clients
			$this->Clients->EditAttrs["class"] = "form-control";
			$this->Clients->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Clients->CurrentValue = HtmlDecode($this->Clients->CurrentValue);
			$this->Clients->EditValue = HtmlEncode($this->Clients->CurrentValue);
			$this->Clients->PlaceHolder = RemoveHtml($this->Clients->caption());

			// Edit refer script
			// id

			$this->id->LinkCustomAttributes = "";
			$this->id->HrefValue = "";

			// PatientID
			$this->PatientID->LinkCustomAttributes = "";
			$this->PatientID->HrefValue = "";
			$this->PatientID->TooltipValue = "";

			// title
			$this->title->LinkCustomAttributes = "";
			$this->title->HrefValue = "";

			// first_name
			$this->first_name->LinkCustomAttributes = "";
			$this->first_name->HrefValue = "";

			// middle_name
			$this->middle_name->LinkCustomAttributes = "";
			$this->middle_name->HrefValue = "";

			// last_name
			$this->last_name->LinkCustomAttributes = "";
			$this->last_name->HrefValue = "";

			// gender
			$this->gender->LinkCustomAttributes = "";
			$this->gender->HrefValue = "";

			// dob
			$this->dob->LinkCustomAttributes = "";
			$this->dob->HrefValue = "";

			// Age
			$this->Age->LinkCustomAttributes = "";
			$this->Age->HrefValue = "";

			// blood_group
			$this->blood_group->LinkCustomAttributes = "";
			$this->blood_group->HrefValue = "";

			// mobile_no
			$this->mobile_no->LinkCustomAttributes = "";
			$this->mobile_no->HrefValue = "";

			// description
			$this->description->LinkCustomAttributes = "";
			$this->description->HrefValue = "";

			// status
			$this->status->LinkCustomAttributes = "";
			$this->status->HrefValue = "";

			// modifiedby
			$this->modifiedby->LinkCustomAttributes = "";
			$this->modifiedby->HrefValue = "";
			$this->modifiedby->TooltipValue = "";

			// modifieddatetime
			$this->modifieddatetime->LinkCustomAttributes = "";
			$this->modifieddatetime->HrefValue = "";
			$this->modifieddatetime->TooltipValue = "";

			// profilePic
			$this->profilePic->LinkCustomAttributes = "";
			if (!EmptyValue($this->profilePic->Upload->DbValue)) {
				$this->profilePic->HrefValue = GetFileUploadUrl($this->profilePic, $this->profilePic->Upload->DbValue); // Add prefix/suffix
				$this->profilePic->LinkAttrs["target"] = ""; // Add target
				if ($this->isExport()) $this->profilePic->HrefValue = FullUrl($this->profilePic->HrefValue, "href");
			} else {
				$this->profilePic->HrefValue = "";
			}
			$this->profilePic->ExportHrefValue = $this->profilePic->UploadPath . $this->profilePic->Upload->DbValue;

			// IdentificationMark
			$this->IdentificationMark->LinkCustomAttributes = "";
			$this->IdentificationMark->HrefValue = "";

			// Religion
			$this->Religion->LinkCustomAttributes = "";
			$this->Religion->HrefValue = "";

			// Nationality
			$this->Nationality->LinkCustomAttributes = "";
			$this->Nationality->HrefValue = "";

			// ReferedByDr
			$this->ReferedByDr->LinkCustomAttributes = "";
			$this->ReferedByDr->HrefValue = "";

			// ReferClinicname
			$this->ReferClinicname->LinkCustomAttributes = "";
			$this->ReferClinicname->HrefValue = "";

			// ReferCity
			$this->ReferCity->LinkCustomAttributes = "";
			$this->ReferCity->HrefValue = "";

			// ReferMobileNo
			$this->ReferMobileNo->LinkCustomAttributes = "";
			$this->ReferMobileNo->HrefValue = "";

			// ReferA4TreatingConsultant
			$this->ReferA4TreatingConsultant->LinkCustomAttributes = "";
			$this->ReferA4TreatingConsultant->HrefValue = "";

			// PurposreReferredfor
			$this->PurposreReferredfor->LinkCustomAttributes = "";
			$this->PurposreReferredfor->HrefValue = "";

			// spouse_title
			$this->spouse_title->LinkCustomAttributes = "";
			$this->spouse_title->HrefValue = "";

			// spouse_first_name
			$this->spouse_first_name->LinkCustomAttributes = "";
			$this->spouse_first_name->HrefValue = "";

			// spouse_middle_name
			$this->spouse_middle_name->LinkCustomAttributes = "";
			$this->spouse_middle_name->HrefValue = "";

			// spouse_last_name
			$this->spouse_last_name->LinkCustomAttributes = "";
			$this->spouse_last_name->HrefValue = "";

			// spouse_gender
			$this->spouse_gender->LinkCustomAttributes = "";
			$this->spouse_gender->HrefValue = "";

			// spouse_dob
			$this->spouse_dob->LinkCustomAttributes = "";
			$this->spouse_dob->HrefValue = "";

			// spouse_Age
			$this->spouse_Age->LinkCustomAttributes = "";
			$this->spouse_Age->HrefValue = "";

			// spouse_blood_group
			$this->spouse_blood_group->LinkCustomAttributes = "";
			$this->spouse_blood_group->HrefValue = "";

			// spouse_mobile_no
			$this->spouse_mobile_no->LinkCustomAttributes = "";
			$this->spouse_mobile_no->HrefValue = "";

			// Maritalstatus
			$this->Maritalstatus->LinkCustomAttributes = "";
			$this->Maritalstatus->HrefValue = "";

			// Business
			$this->Business->LinkCustomAttributes = "";
			$this->Business->HrefValue = "";

			// Patient_Language
			$this->Patient_Language->LinkCustomAttributes = "";
			$this->Patient_Language->HrefValue = "";

			// Passport
			$this->Passport->LinkCustomAttributes = "";
			$this->Passport->HrefValue = "";

			// VisaNo
			$this->VisaNo->LinkCustomAttributes = "";
			$this->VisaNo->HrefValue = "";

			// ValidityOfVisa
			$this->ValidityOfVisa->LinkCustomAttributes = "";
			$this->ValidityOfVisa->HrefValue = "";

			// WhereDidYouHear
			$this->WhereDidYouHear->LinkCustomAttributes = "";
			$this->WhereDidYouHear->HrefValue = "";

			// HospID
			$this->HospID->LinkCustomAttributes = "";
			$this->HospID->HrefValue = "";
			$this->HospID->TooltipValue = "";

			// street
			$this->street->LinkCustomAttributes = "";
			$this->street->HrefValue = "";

			// town
			$this->town->LinkCustomAttributes = "";
			$this->town->HrefValue = "";

			// province
			$this->province->LinkCustomAttributes = "";
			$this->province->HrefValue = "";

			// country
			$this->country->LinkCustomAttributes = "";
			$this->country->HrefValue = "";

			// postal_code
			$this->postal_code->LinkCustomAttributes = "";
			$this->postal_code->HrefValue = "";

			// PEmail
			$this->PEmail->LinkCustomAttributes = "";
			$this->PEmail->HrefValue = "";

			// PEmergencyContact
			$this->PEmergencyContact->LinkCustomAttributes = "";
			$this->PEmergencyContact->HrefValue = "";

			// occupation
			$this->occupation->LinkCustomAttributes = "";
			$this->occupation->HrefValue = "";

			// spouse_occupation
			$this->spouse_occupation->LinkCustomAttributes = "";
			$this->spouse_occupation->HrefValue = "";

			// WhatsApp
			$this->WhatsApp->LinkCustomAttributes = "";
			$this->WhatsApp->HrefValue = "";

			// CouppleID
			$this->CouppleID->LinkCustomAttributes = "";
			$this->CouppleID->HrefValue = "";

			// MaleID
			$this->MaleID->LinkCustomAttributes = "";
			$this->MaleID->HrefValue = "";

			// FemaleID
			$this->FemaleID->LinkCustomAttributes = "";
			$this->FemaleID->HrefValue = "";

			// GroupID
			$this->GroupID->LinkCustomAttributes = "";
			$this->GroupID->HrefValue = "";

			// Relationship
			$this->Relationship->LinkCustomAttributes = "";
			$this->Relationship->HrefValue = "";

			// AppointmentSearch
			$this->AppointmentSearch->LinkCustomAttributes = "";
			$this->AppointmentSearch->HrefValue = "";

			// FacebookID
			$this->FacebookID->LinkCustomAttributes = "";
			$this->FacebookID->HrefValue = "";

			// profilePicImage
			$this->profilePicImage->LinkCustomAttributes = "";
			if (!empty($this->profilePicImage->Upload->DbValue)) {
				$this->profilePicImage->HrefValue = GetFileUploadUrl($this->profilePicImage, $this->id->CurrentValue);
				$this->profilePicImage->LinkAttrs["target"] = "";
				if ($this->profilePicImage->IsBlobImage && empty($this->profilePicImage->LinkAttrs["target"]))
					$this->profilePicImage->LinkAttrs["target"] = "_blank";
				if ($this->isExport())
					$this->profilePicImage->HrefValue = FullUrl($this->profilePicImage->HrefValue, "href");
			} else {
				$this->profilePicImage->HrefValue = "";
			}
			$this->profilePicImage->ExportHrefValue = GetFileUploadUrl($this->profilePicImage, $this->id->CurrentValue);

			// Clients
			$this->Clients->LinkCustomAttributes = "";
			$this->Clients->HrefValue = "";
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
		if ($this->PatientID->Required) {
			if (!$this->PatientID->IsDetailKey && $this->PatientID->FormValue != NULL && $this->PatientID->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PatientID->caption(), $this->PatientID->RequiredErrorMessage));
			}
		}
		if ($this->title->Required) {
			if (!$this->title->IsDetailKey && $this->title->FormValue != NULL && $this->title->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->title->caption(), $this->title->RequiredErrorMessage));
			}
		}
		if ($this->first_name->Required) {
			if (!$this->first_name->IsDetailKey && $this->first_name->FormValue != NULL && $this->first_name->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->first_name->caption(), $this->first_name->RequiredErrorMessage));
			}
		}
		if ($this->middle_name->Required) {
			if (!$this->middle_name->IsDetailKey && $this->middle_name->FormValue != NULL && $this->middle_name->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->middle_name->caption(), $this->middle_name->RequiredErrorMessage));
			}
		}
		if ($this->last_name->Required) {
			if (!$this->last_name->IsDetailKey && $this->last_name->FormValue != NULL && $this->last_name->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->last_name->caption(), $this->last_name->RequiredErrorMessage));
			}
		}
		if ($this->gender->Required) {
			if (!$this->gender->IsDetailKey && $this->gender->FormValue != NULL && $this->gender->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->gender->caption(), $this->gender->RequiredErrorMessage));
			}
		}
		if ($this->dob->Required) {
			if (!$this->dob->IsDetailKey && $this->dob->FormValue != NULL && $this->dob->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->dob->caption(), $this->dob->RequiredErrorMessage));
			}
		}
		if (!CheckEuroDate($this->dob->FormValue)) {
			AddMessage($FormError, $this->dob->errorMessage());
		}
		if ($this->Age->Required) {
			if (!$this->Age->IsDetailKey && $this->Age->FormValue != NULL && $this->Age->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Age->caption(), $this->Age->RequiredErrorMessage));
			}
		}
		if ($this->blood_group->Required) {
			if (!$this->blood_group->IsDetailKey && $this->blood_group->FormValue != NULL && $this->blood_group->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->blood_group->caption(), $this->blood_group->RequiredErrorMessage));
			}
		}
		if ($this->mobile_no->Required) {
			if (!$this->mobile_no->IsDetailKey && $this->mobile_no->FormValue != NULL && $this->mobile_no->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->mobile_no->caption(), $this->mobile_no->RequiredErrorMessage));
			}
		}
		if ($this->description->Required) {
			if (!$this->description->IsDetailKey && $this->description->FormValue != NULL && $this->description->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->description->caption(), $this->description->RequiredErrorMessage));
			}
		}
		if ($this->status->Required) {
			if (!$this->status->IsDetailKey && $this->status->FormValue != NULL && $this->status->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->status->caption(), $this->status->RequiredErrorMessage));
			}
		}
		if ($this->createdby->Required) {
			if (!$this->createdby->IsDetailKey && $this->createdby->FormValue != NULL && $this->createdby->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->createdby->caption(), $this->createdby->RequiredErrorMessage));
			}
		}
		if ($this->createddatetime->Required) {
			if (!$this->createddatetime->IsDetailKey && $this->createddatetime->FormValue != NULL && $this->createddatetime->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->createddatetime->caption(), $this->createddatetime->RequiredErrorMessage));
			}
		}
		if ($this->modifiedby->Required) {
			if (!$this->modifiedby->IsDetailKey && $this->modifiedby->FormValue != NULL && $this->modifiedby->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->modifiedby->caption(), $this->modifiedby->RequiredErrorMessage));
			}
		}
		if ($this->modifieddatetime->Required) {
			if (!$this->modifieddatetime->IsDetailKey && $this->modifieddatetime->FormValue != NULL && $this->modifieddatetime->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->modifieddatetime->caption(), $this->modifieddatetime->RequiredErrorMessage));
			}
		}
		if ($this->profilePic->Required) {
			if ($this->profilePic->Upload->FileName == "" && !$this->profilePic->Upload->KeepFile) {
				AddMessage($FormError, str_replace("%s", $this->profilePic->caption(), $this->profilePic->RequiredErrorMessage));
			}
		}
		if ($this->IdentificationMark->Required) {
			if (!$this->IdentificationMark->IsDetailKey && $this->IdentificationMark->FormValue != NULL && $this->IdentificationMark->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->IdentificationMark->caption(), $this->IdentificationMark->RequiredErrorMessage));
			}
		}
		if ($this->Religion->Required) {
			if (!$this->Religion->IsDetailKey && $this->Religion->FormValue != NULL && $this->Religion->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Religion->caption(), $this->Religion->RequiredErrorMessage));
			}
		}
		if ($this->Nationality->Required) {
			if (!$this->Nationality->IsDetailKey && $this->Nationality->FormValue != NULL && $this->Nationality->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Nationality->caption(), $this->Nationality->RequiredErrorMessage));
			}
		}
		if ($this->ReferedByDr->Required) {
			if (!$this->ReferedByDr->IsDetailKey && $this->ReferedByDr->FormValue != NULL && $this->ReferedByDr->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->ReferedByDr->caption(), $this->ReferedByDr->RequiredErrorMessage));
			}
		}
		if ($this->ReferClinicname->Required) {
			if (!$this->ReferClinicname->IsDetailKey && $this->ReferClinicname->FormValue != NULL && $this->ReferClinicname->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->ReferClinicname->caption(), $this->ReferClinicname->RequiredErrorMessage));
			}
		}
		if ($this->ReferCity->Required) {
			if (!$this->ReferCity->IsDetailKey && $this->ReferCity->FormValue != NULL && $this->ReferCity->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->ReferCity->caption(), $this->ReferCity->RequiredErrorMessage));
			}
		}
		if ($this->ReferMobileNo->Required) {
			if (!$this->ReferMobileNo->IsDetailKey && $this->ReferMobileNo->FormValue != NULL && $this->ReferMobileNo->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->ReferMobileNo->caption(), $this->ReferMobileNo->RequiredErrorMessage));
			}
		}
		if ($this->ReferA4TreatingConsultant->Required) {
			if (!$this->ReferA4TreatingConsultant->IsDetailKey && $this->ReferA4TreatingConsultant->FormValue != NULL && $this->ReferA4TreatingConsultant->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->ReferA4TreatingConsultant->caption(), $this->ReferA4TreatingConsultant->RequiredErrorMessage));
			}
		}
		if ($this->PurposreReferredfor->Required) {
			if (!$this->PurposreReferredfor->IsDetailKey && $this->PurposreReferredfor->FormValue != NULL && $this->PurposreReferredfor->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PurposreReferredfor->caption(), $this->PurposreReferredfor->RequiredErrorMessage));
			}
		}
		if ($this->spouse_title->Required) {
			if (!$this->spouse_title->IsDetailKey && $this->spouse_title->FormValue != NULL && $this->spouse_title->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->spouse_title->caption(), $this->spouse_title->RequiredErrorMessage));
			}
		}
		if ($this->spouse_first_name->Required) {
			if (!$this->spouse_first_name->IsDetailKey && $this->spouse_first_name->FormValue != NULL && $this->spouse_first_name->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->spouse_first_name->caption(), $this->spouse_first_name->RequiredErrorMessage));
			}
		}
		if ($this->spouse_middle_name->Required) {
			if (!$this->spouse_middle_name->IsDetailKey && $this->spouse_middle_name->FormValue != NULL && $this->spouse_middle_name->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->spouse_middle_name->caption(), $this->spouse_middle_name->RequiredErrorMessage));
			}
		}
		if ($this->spouse_last_name->Required) {
			if (!$this->spouse_last_name->IsDetailKey && $this->spouse_last_name->FormValue != NULL && $this->spouse_last_name->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->spouse_last_name->caption(), $this->spouse_last_name->RequiredErrorMessage));
			}
		}
		if ($this->spouse_gender->Required) {
			if (!$this->spouse_gender->IsDetailKey && $this->spouse_gender->FormValue != NULL && $this->spouse_gender->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->spouse_gender->caption(), $this->spouse_gender->RequiredErrorMessage));
			}
		}
		if ($this->spouse_dob->Required) {
			if (!$this->spouse_dob->IsDetailKey && $this->spouse_dob->FormValue != NULL && $this->spouse_dob->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->spouse_dob->caption(), $this->spouse_dob->RequiredErrorMessage));
			}
		}
		if ($this->spouse_Age->Required) {
			if (!$this->spouse_Age->IsDetailKey && $this->spouse_Age->FormValue != NULL && $this->spouse_Age->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->spouse_Age->caption(), $this->spouse_Age->RequiredErrorMessage));
			}
		}
		if ($this->spouse_blood_group->Required) {
			if (!$this->spouse_blood_group->IsDetailKey && $this->spouse_blood_group->FormValue != NULL && $this->spouse_blood_group->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->spouse_blood_group->caption(), $this->spouse_blood_group->RequiredErrorMessage));
			}
		}
		if ($this->spouse_mobile_no->Required) {
			if (!$this->spouse_mobile_no->IsDetailKey && $this->spouse_mobile_no->FormValue != NULL && $this->spouse_mobile_no->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->spouse_mobile_no->caption(), $this->spouse_mobile_no->RequiredErrorMessage));
			}
		}
		if ($this->Maritalstatus->Required) {
			if (!$this->Maritalstatus->IsDetailKey && $this->Maritalstatus->FormValue != NULL && $this->Maritalstatus->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Maritalstatus->caption(), $this->Maritalstatus->RequiredErrorMessage));
			}
		}
		if ($this->Business->Required) {
			if (!$this->Business->IsDetailKey && $this->Business->FormValue != NULL && $this->Business->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Business->caption(), $this->Business->RequiredErrorMessage));
			}
		}
		if ($this->Patient_Language->Required) {
			if (!$this->Patient_Language->IsDetailKey && $this->Patient_Language->FormValue != NULL && $this->Patient_Language->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Patient_Language->caption(), $this->Patient_Language->RequiredErrorMessage));
			}
		}
		if ($this->Passport->Required) {
			if (!$this->Passport->IsDetailKey && $this->Passport->FormValue != NULL && $this->Passport->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Passport->caption(), $this->Passport->RequiredErrorMessage));
			}
		}
		if ($this->VisaNo->Required) {
			if (!$this->VisaNo->IsDetailKey && $this->VisaNo->FormValue != NULL && $this->VisaNo->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->VisaNo->caption(), $this->VisaNo->RequiredErrorMessage));
			}
		}
		if ($this->ValidityOfVisa->Required) {
			if (!$this->ValidityOfVisa->IsDetailKey && $this->ValidityOfVisa->FormValue != NULL && $this->ValidityOfVisa->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->ValidityOfVisa->caption(), $this->ValidityOfVisa->RequiredErrorMessage));
			}
		}
		if ($this->WhereDidYouHear->Required) {
			if ($this->WhereDidYouHear->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->WhereDidYouHear->caption(), $this->WhereDidYouHear->RequiredErrorMessage));
			}
		}
		if ($this->HospID->Required) {
			if (!$this->HospID->IsDetailKey && $this->HospID->FormValue != NULL && $this->HospID->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->HospID->caption(), $this->HospID->RequiredErrorMessage));
			}
		}
		if ($this->street->Required) {
			if (!$this->street->IsDetailKey && $this->street->FormValue != NULL && $this->street->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->street->caption(), $this->street->RequiredErrorMessage));
			}
		}
		if ($this->town->Required) {
			if (!$this->town->IsDetailKey && $this->town->FormValue != NULL && $this->town->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->town->caption(), $this->town->RequiredErrorMessage));
			}
		}
		if ($this->province->Required) {
			if (!$this->province->IsDetailKey && $this->province->FormValue != NULL && $this->province->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->province->caption(), $this->province->RequiredErrorMessage));
			}
		}
		if ($this->country->Required) {
			if (!$this->country->IsDetailKey && $this->country->FormValue != NULL && $this->country->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->country->caption(), $this->country->RequiredErrorMessage));
			}
		}
		if ($this->postal_code->Required) {
			if (!$this->postal_code->IsDetailKey && $this->postal_code->FormValue != NULL && $this->postal_code->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->postal_code->caption(), $this->postal_code->RequiredErrorMessage));
			}
		}
		if ($this->PEmail->Required) {
			if (!$this->PEmail->IsDetailKey && $this->PEmail->FormValue != NULL && $this->PEmail->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PEmail->caption(), $this->PEmail->RequiredErrorMessage));
			}
		}
		if ($this->PEmergencyContact->Required) {
			if (!$this->PEmergencyContact->IsDetailKey && $this->PEmergencyContact->FormValue != NULL && $this->PEmergencyContact->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PEmergencyContact->caption(), $this->PEmergencyContact->RequiredErrorMessage));
			}
		}
		if ($this->occupation->Required) {
			if (!$this->occupation->IsDetailKey && $this->occupation->FormValue != NULL && $this->occupation->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->occupation->caption(), $this->occupation->RequiredErrorMessage));
			}
		}
		if ($this->spouse_occupation->Required) {
			if (!$this->spouse_occupation->IsDetailKey && $this->spouse_occupation->FormValue != NULL && $this->spouse_occupation->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->spouse_occupation->caption(), $this->spouse_occupation->RequiredErrorMessage));
			}
		}
		if ($this->WhatsApp->Required) {
			if (!$this->WhatsApp->IsDetailKey && $this->WhatsApp->FormValue != NULL && $this->WhatsApp->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->WhatsApp->caption(), $this->WhatsApp->RequiredErrorMessage));
			}
		}
		if ($this->CouppleID->Required) {
			if (!$this->CouppleID->IsDetailKey && $this->CouppleID->FormValue != NULL && $this->CouppleID->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->CouppleID->caption(), $this->CouppleID->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->CouppleID->FormValue)) {
			AddMessage($FormError, $this->CouppleID->errorMessage());
		}
		if ($this->MaleID->Required) {
			if (!$this->MaleID->IsDetailKey && $this->MaleID->FormValue != NULL && $this->MaleID->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->MaleID->caption(), $this->MaleID->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->MaleID->FormValue)) {
			AddMessage($FormError, $this->MaleID->errorMessage());
		}
		if ($this->FemaleID->Required) {
			if (!$this->FemaleID->IsDetailKey && $this->FemaleID->FormValue != NULL && $this->FemaleID->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->FemaleID->caption(), $this->FemaleID->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->FemaleID->FormValue)) {
			AddMessage($FormError, $this->FemaleID->errorMessage());
		}
		if ($this->GroupID->Required) {
			if (!$this->GroupID->IsDetailKey && $this->GroupID->FormValue != NULL && $this->GroupID->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->GroupID->caption(), $this->GroupID->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->GroupID->FormValue)) {
			AddMessage($FormError, $this->GroupID->errorMessage());
		}
		if ($this->Relationship->Required) {
			if (!$this->Relationship->IsDetailKey && $this->Relationship->FormValue != NULL && $this->Relationship->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Relationship->caption(), $this->Relationship->RequiredErrorMessage));
			}
		}
		if ($this->AppointmentSearch->Required) {
			if (!$this->AppointmentSearch->IsDetailKey && $this->AppointmentSearch->FormValue != NULL && $this->AppointmentSearch->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->AppointmentSearch->caption(), $this->AppointmentSearch->RequiredErrorMessage));
			}
		}
		if ($this->FacebookID->Required) {
			if (!$this->FacebookID->IsDetailKey && $this->FacebookID->FormValue != NULL && $this->FacebookID->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->FacebookID->caption(), $this->FacebookID->RequiredErrorMessage));
			}
		}
		if ($this->profilePicImage->Required) {
			if ($this->profilePicImage->Upload->FileName == "" && !$this->profilePicImage->Upload->KeepFile) {
				AddMessage($FormError, str_replace("%s", $this->profilePicImage->caption(), $this->profilePicImage->RequiredErrorMessage));
			}
		}
		if ($this->Clients->Required) {
			if (!$this->Clients->IsDetailKey && $this->Clients->FormValue != NULL && $this->Clients->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Clients->caption(), $this->Clients->RequiredErrorMessage));
			}
		}

		// Validate detail grid
		$detailTblVar = explode(",", $this->getCurrentDetailTable());
		if (in_array("patient_address", $detailTblVar) && $GLOBALS["patient_address"]->DetailEdit) {
			if (!isset($GLOBALS["patient_address_grid"]))
				$GLOBALS["patient_address_grid"] = new patient_address_grid(); // Get detail page object
			$GLOBALS["patient_address_grid"]->validateGridForm();
		}
		if (in_array("patient_email", $detailTblVar) && $GLOBALS["patient_email"]->DetailEdit) {
			if (!isset($GLOBALS["patient_email_grid"]))
				$GLOBALS["patient_email_grid"] = new patient_email_grid(); // Get detail page object
			$GLOBALS["patient_email_grid"]->validateGridForm();
		}
		if (in_array("patient_telephone", $detailTblVar) && $GLOBALS["patient_telephone"]->DetailEdit) {
			if (!isset($GLOBALS["patient_telephone_grid"]))
				$GLOBALS["patient_telephone_grid"] = new patient_telephone_grid(); // Get detail page object
			$GLOBALS["patient_telephone_grid"]->validateGridForm();
		}
		if (in_array("patient_emergency_contact", $detailTblVar) && $GLOBALS["patient_emergency_contact"]->DetailEdit) {
			if (!isset($GLOBALS["patient_emergency_contact_grid"]))
				$GLOBALS["patient_emergency_contact_grid"] = new patient_emergency_contact_grid(); // Get detail page object
			$GLOBALS["patient_emergency_contact_grid"]->validateGridForm();
		}
		if (in_array("patient_document", $detailTblVar) && $GLOBALS["patient_document"]->DetailEdit) {
			if (!isset($GLOBALS["patient_document_grid"]))
				$GLOBALS["patient_document_grid"] = new patient_document_grid(); // Get detail page object
			$GLOBALS["patient_document_grid"]->validateGridForm();
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
		if ($this->PatientID->CurrentValue <> "") { // Check field with unique index
			$filterChk = "(`PatientID` = '" . AdjustSql($this->PatientID->CurrentValue, $this->Dbid) . "')";
			$filterChk .= " AND NOT (" . $filter . ")";
			$this->CurrentFilter = $filterChk;
			$sqlChk = $this->getCurrentSql();
			$conn->raiseErrorFn = $GLOBALS["ERROR_FUNC"];
			$rsChk = $conn->Execute($sqlChk);
			$conn->raiseErrorFn = '';
			if ($rsChk === FALSE) {
				return FALSE;
			} elseif (!$rsChk->EOF) {
				$idxErrMsg = str_replace("%f", $this->PatientID->caption(), $Language->phrase("DupIndex"));
				$idxErrMsg = str_replace("%v", $this->PatientID->CurrentValue, $idxErrMsg);
				$this->setFailureMessage($idxErrMsg);
				$rsChk->close();
				return FALSE;
			}
			$rsChk->close();
		}
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

			// title
			$this->title->setDbValueDef($rsnew, $this->title->CurrentValue, NULL, $this->title->ReadOnly);

			// first_name
			$this->first_name->setDbValueDef($rsnew, $this->first_name->CurrentValue, NULL, $this->first_name->ReadOnly);

			// middle_name
			$this->middle_name->setDbValueDef($rsnew, $this->middle_name->CurrentValue, NULL, $this->middle_name->ReadOnly);

			// last_name
			$this->last_name->setDbValueDef($rsnew, $this->last_name->CurrentValue, NULL, $this->last_name->ReadOnly);

			// gender
			$this->gender->setDbValueDef($rsnew, $this->gender->CurrentValue, NULL, $this->gender->ReadOnly);

			// dob
			$this->dob->setDbValueDef($rsnew, UnFormatDateTime($this->dob->CurrentValue, 7), NULL, $this->dob->ReadOnly);

			// Age
			$this->Age->setDbValueDef($rsnew, $this->Age->CurrentValue, NULL, $this->Age->ReadOnly);

			// blood_group
			$this->blood_group->setDbValueDef($rsnew, $this->blood_group->CurrentValue, NULL, $this->blood_group->ReadOnly);

			// mobile_no
			$this->mobile_no->setDbValueDef($rsnew, $this->mobile_no->CurrentValue, NULL, $this->mobile_no->ReadOnly);

			// description
			$this->description->setDbValueDef($rsnew, $this->description->CurrentValue, NULL, $this->description->ReadOnly);

			// status
			$this->status->setDbValueDef($rsnew, $this->status->CurrentValue, NULL, $this->status->ReadOnly);

			// profilePic
			if ($this->profilePic->Visible && !$this->profilePic->ReadOnly && !$this->profilePic->Upload->KeepFile) {
				$this->profilePic->Upload->DbValue = $rsold['profilePic']; // Get original value
				if ($this->profilePic->Upload->FileName == "") {
					$rsnew['profilePic'] = NULL;
				} else {
					$rsnew['profilePic'] = $this->profilePic->Upload->FileName;
				}
			}

			// IdentificationMark
			$this->IdentificationMark->setDbValueDef($rsnew, $this->IdentificationMark->CurrentValue, NULL, $this->IdentificationMark->ReadOnly);

			// Religion
			$this->Religion->setDbValueDef($rsnew, $this->Religion->CurrentValue, NULL, $this->Religion->ReadOnly);

			// Nationality
			$this->Nationality->setDbValueDef($rsnew, $this->Nationality->CurrentValue, NULL, $this->Nationality->ReadOnly);

			// ReferedByDr
			$this->ReferedByDr->setDbValueDef($rsnew, $this->ReferedByDr->CurrentValue, NULL, $this->ReferedByDr->ReadOnly);

			// ReferClinicname
			$this->ReferClinicname->setDbValueDef($rsnew, $this->ReferClinicname->CurrentValue, NULL, $this->ReferClinicname->ReadOnly);

			// ReferCity
			$this->ReferCity->setDbValueDef($rsnew, $this->ReferCity->CurrentValue, NULL, $this->ReferCity->ReadOnly);

			// ReferMobileNo
			$this->ReferMobileNo->setDbValueDef($rsnew, $this->ReferMobileNo->CurrentValue, NULL, $this->ReferMobileNo->ReadOnly);

			// ReferA4TreatingConsultant
			$this->ReferA4TreatingConsultant->setDbValueDef($rsnew, $this->ReferA4TreatingConsultant->CurrentValue, NULL, $this->ReferA4TreatingConsultant->ReadOnly);

			// PurposreReferredfor
			$this->PurposreReferredfor->setDbValueDef($rsnew, $this->PurposreReferredfor->CurrentValue, NULL, $this->PurposreReferredfor->ReadOnly);

			// spouse_title
			$this->spouse_title->setDbValueDef($rsnew, $this->spouse_title->CurrentValue, NULL, $this->spouse_title->ReadOnly);

			// spouse_first_name
			$this->spouse_first_name->setDbValueDef($rsnew, $this->spouse_first_name->CurrentValue, NULL, $this->spouse_first_name->ReadOnly);

			// spouse_middle_name
			$this->spouse_middle_name->setDbValueDef($rsnew, $this->spouse_middle_name->CurrentValue, NULL, $this->spouse_middle_name->ReadOnly);

			// spouse_last_name
			$this->spouse_last_name->setDbValueDef($rsnew, $this->spouse_last_name->CurrentValue, NULL, $this->spouse_last_name->ReadOnly);

			// spouse_gender
			$this->spouse_gender->setDbValueDef($rsnew, $this->spouse_gender->CurrentValue, NULL, $this->spouse_gender->ReadOnly);

			// spouse_dob
			$this->spouse_dob->setDbValueDef($rsnew, UnFormatDateTime($this->spouse_dob->CurrentValue, 7), NULL, $this->spouse_dob->ReadOnly);

			// spouse_Age
			$this->spouse_Age->setDbValueDef($rsnew, $this->spouse_Age->CurrentValue, NULL, $this->spouse_Age->ReadOnly);

			// spouse_blood_group
			$this->spouse_blood_group->setDbValueDef($rsnew, $this->spouse_blood_group->CurrentValue, NULL, $this->spouse_blood_group->ReadOnly);

			// spouse_mobile_no
			$this->spouse_mobile_no->setDbValueDef($rsnew, $this->spouse_mobile_no->CurrentValue, NULL, $this->spouse_mobile_no->ReadOnly);

			// Maritalstatus
			$this->Maritalstatus->setDbValueDef($rsnew, $this->Maritalstatus->CurrentValue, NULL, $this->Maritalstatus->ReadOnly);

			// Business
			$this->Business->setDbValueDef($rsnew, $this->Business->CurrentValue, NULL, $this->Business->ReadOnly);

			// Patient_Language
			$this->Patient_Language->setDbValueDef($rsnew, $this->Patient_Language->CurrentValue, NULL, $this->Patient_Language->ReadOnly);

			// Passport
			$this->Passport->setDbValueDef($rsnew, $this->Passport->CurrentValue, NULL, $this->Passport->ReadOnly);

			// VisaNo
			$this->VisaNo->setDbValueDef($rsnew, $this->VisaNo->CurrentValue, NULL, $this->VisaNo->ReadOnly);

			// ValidityOfVisa
			$this->ValidityOfVisa->setDbValueDef($rsnew, $this->ValidityOfVisa->CurrentValue, NULL, $this->ValidityOfVisa->ReadOnly);

			// WhereDidYouHear
			$this->WhereDidYouHear->setDbValueDef($rsnew, $this->WhereDidYouHear->CurrentValue, NULL, $this->WhereDidYouHear->ReadOnly);

			// street
			$this->street->setDbValueDef($rsnew, $this->street->CurrentValue, NULL, $this->street->ReadOnly);

			// town
			$this->town->setDbValueDef($rsnew, $this->town->CurrentValue, NULL, $this->town->ReadOnly);

			// province
			$this->province->setDbValueDef($rsnew, $this->province->CurrentValue, NULL, $this->province->ReadOnly);

			// country
			$this->country->setDbValueDef($rsnew, $this->country->CurrentValue, NULL, $this->country->ReadOnly);

			// postal_code
			$this->postal_code->setDbValueDef($rsnew, $this->postal_code->CurrentValue, NULL, $this->postal_code->ReadOnly);

			// PEmail
			$this->PEmail->setDbValueDef($rsnew, $this->PEmail->CurrentValue, NULL, $this->PEmail->ReadOnly);

			// PEmergencyContact
			$this->PEmergencyContact->setDbValueDef($rsnew, $this->PEmergencyContact->CurrentValue, NULL, $this->PEmergencyContact->ReadOnly);

			// occupation
			$this->occupation->setDbValueDef($rsnew, $this->occupation->CurrentValue, NULL, $this->occupation->ReadOnly);

			// spouse_occupation
			$this->spouse_occupation->setDbValueDef($rsnew, $this->spouse_occupation->CurrentValue, NULL, $this->spouse_occupation->ReadOnly);

			// WhatsApp
			$this->WhatsApp->setDbValueDef($rsnew, $this->WhatsApp->CurrentValue, NULL, $this->WhatsApp->ReadOnly);

			// CouppleID
			$this->CouppleID->setDbValueDef($rsnew, $this->CouppleID->CurrentValue, NULL, $this->CouppleID->ReadOnly);

			// MaleID
			$this->MaleID->setDbValueDef($rsnew, $this->MaleID->CurrentValue, NULL, $this->MaleID->ReadOnly);

			// FemaleID
			$this->FemaleID->setDbValueDef($rsnew, $this->FemaleID->CurrentValue, NULL, $this->FemaleID->ReadOnly);

			// GroupID
			$this->GroupID->setDbValueDef($rsnew, $this->GroupID->CurrentValue, NULL, $this->GroupID->ReadOnly);

			// Relationship
			$this->Relationship->setDbValueDef($rsnew, $this->Relationship->CurrentValue, NULL, $this->Relationship->ReadOnly);

			// AppointmentSearch
			$this->AppointmentSearch->setDbValueDef($rsnew, $this->AppointmentSearch->CurrentValue, "", $this->AppointmentSearch->ReadOnly);

			// FacebookID
			$this->FacebookID->setDbValueDef($rsnew, $this->FacebookID->CurrentValue, NULL, $this->FacebookID->ReadOnly);

			// profilePicImage
			if ($this->profilePicImage->Visible && !$this->profilePicImage->ReadOnly && !$this->profilePicImage->Upload->KeepFile) {
				if ($this->profilePicImage->Upload->Value == NULL) {
					$rsnew['profilePicImage'] = NULL;
				} else {
					$rsnew['profilePicImage'] = $this->profilePicImage->Upload->Value;
				}
			}

			// Clients
			$this->Clients->setDbValueDef($rsnew, $this->Clients->CurrentValue, NULL, $this->Clients->ReadOnly);
			if ($this->profilePic->Visible && !$this->profilePic->Upload->KeepFile) {
				$oldFiles = EmptyValue($this->profilePic->Upload->DbValue) ? array() : array($this->profilePic->Upload->DbValue);
				if (!EmptyValue($this->profilePic->Upload->FileName)) {
					$newFiles = array($this->profilePic->Upload->FileName);
					$NewFileCount = count($newFiles);
					for ($i = 0; $i < $NewFileCount; $i++) {
						if ($newFiles[$i] <> "") {
							$file = $newFiles[$i];
							if (file_exists(UploadTempPath($this->profilePic, $this->profilePic->Upload->Index) . $file)) {
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
								$file1 = UniqueFilename($this->profilePic->physicalUploadPath(), $file); // Get new file name
								if ($file1 <> $file) { // Rename temp file
									while (file_exists(UploadTempPath($this->profilePic, $this->profilePic->Upload->Index) . $file1) || file_exists($this->profilePic->physicalUploadPath() . $file1)) // Make sure no file name clash
										$file1 = UniqueFilename($this->profilePic->physicalUploadPath(), $file1, TRUE); // Use indexed name
									rename(UploadTempPath($this->profilePic, $this->profilePic->Upload->Index) . $file, UploadTempPath($this->profilePic, $this->profilePic->Upload->Index) . $file1);
									$newFiles[$i] = $file1;
								}
							}
						}
					}
					$this->profilePic->Upload->DbValue = empty($oldFiles) ? "" : implode(MULTIPLE_UPLOAD_SEPARATOR, $oldFiles);
					$this->profilePic->Upload->FileName = implode(MULTIPLE_UPLOAD_SEPARATOR, $newFiles);
					$this->profilePic->setDbValueDef($rsnew, $this->profilePic->Upload->FileName, NULL, $this->profilePic->ReadOnly);
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
					if ($this->profilePic->Visible && !$this->profilePic->Upload->KeepFile) {
						$oldFiles = EmptyValue($this->profilePic->Upload->DbValue) ? array() : array($this->profilePic->Upload->DbValue);
						if (!EmptyValue($this->profilePic->Upload->FileName)) {
							$newFiles = array($this->profilePic->Upload->FileName);
							$newFiles2 = array($rsnew['profilePic']);
							$newFileCount = count($newFiles);
							for ($i = 0; $i < $newFileCount; $i++) {
								if ($newFiles[$i] <> "") {
									$file = UploadTempPath($this->profilePic, $this->profilePic->Upload->Index) . $newFiles[$i];
									if (file_exists($file)) {
										if (@$newFiles2[$i] <> "") // Use correct file name
											$newFiles[$i] = $newFiles2[$i];
										if (!$this->profilePic->Upload->saveToFile($newFiles[$i], TRUE, $i)) { // Just replace
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
									@unlink($this->profilePic->oldPhysicalUploadPath() . $oldFile);
							}
						}
					}
				}

				// Update detail records
				$detailTblVar = explode(",", $this->getCurrentDetailTable());
				if ($editRow) {
					if (in_array("patient_address", $detailTblVar) && $GLOBALS["patient_address"]->DetailEdit) {
						if (!isset($GLOBALS["patient_address_grid"]))
							$GLOBALS["patient_address_grid"] = new patient_address_grid(); // Get detail page object
						$Security->loadCurrentUserLevel($this->ProjectID . "patient_address"); // Load user level of detail table
						$editRow = $GLOBALS["patient_address_grid"]->gridUpdate();
						$Security->loadCurrentUserLevel($this->ProjectID . $this->TableName); // Restore user level of master table
					}
				}
				if ($editRow) {
					if (in_array("patient_email", $detailTblVar) && $GLOBALS["patient_email"]->DetailEdit) {
						if (!isset($GLOBALS["patient_email_grid"]))
							$GLOBALS["patient_email_grid"] = new patient_email_grid(); // Get detail page object
						$Security->loadCurrentUserLevel($this->ProjectID . "patient_email"); // Load user level of detail table
						$editRow = $GLOBALS["patient_email_grid"]->gridUpdate();
						$Security->loadCurrentUserLevel($this->ProjectID . $this->TableName); // Restore user level of master table
					}
				}
				if ($editRow) {
					if (in_array("patient_telephone", $detailTblVar) && $GLOBALS["patient_telephone"]->DetailEdit) {
						if (!isset($GLOBALS["patient_telephone_grid"]))
							$GLOBALS["patient_telephone_grid"] = new patient_telephone_grid(); // Get detail page object
						$Security->loadCurrentUserLevel($this->ProjectID . "patient_telephone"); // Load user level of detail table
						$editRow = $GLOBALS["patient_telephone_grid"]->gridUpdate();
						$Security->loadCurrentUserLevel($this->ProjectID . $this->TableName); // Restore user level of master table
					}
				}
				if ($editRow) {
					if (in_array("patient_emergency_contact", $detailTblVar) && $GLOBALS["patient_emergency_contact"]->DetailEdit) {
						if (!isset($GLOBALS["patient_emergency_contact_grid"]))
							$GLOBALS["patient_emergency_contact_grid"] = new patient_emergency_contact_grid(); // Get detail page object
						$Security->loadCurrentUserLevel($this->ProjectID . "patient_emergency_contact"); // Load user level of detail table
						$editRow = $GLOBALS["patient_emergency_contact_grid"]->gridUpdate();
						$Security->loadCurrentUserLevel($this->ProjectID . $this->TableName); // Restore user level of master table
					}
				}
				if ($editRow) {
					if (in_array("patient_document", $detailTblVar) && $GLOBALS["patient_document"]->DetailEdit) {
						if (!isset($GLOBALS["patient_document_grid"]))
							$GLOBALS["patient_document_grid"] = new patient_document_grid(); // Get detail page object
						$Security->loadCurrentUserLevel($this->ProjectID . "patient_document"); // Load user level of detail table
						$editRow = $GLOBALS["patient_document_grid"]->gridUpdate();
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

		// profilePic
		if ($this->profilePic->Upload->FileToken <> "")
			CleanUploadTempPath($this->profilePic->Upload->FileToken, $this->profilePic->Upload->Index);
		else
			CleanUploadTempPath($this->profilePic, $this->profilePic->Upload->Index);

		// profilePicImage
		if ($this->profilePicImage->Upload->FileToken <> "")
			CleanUploadTempPath($this->profilePicImage->Upload->FileToken, $this->profilePicImage->Upload->Index);
		else
			CleanUploadTempPath($this->profilePicImage, $this->profilePicImage->Upload->Index);

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
			if (in_array("patient_address", $detailTblVar)) {
				if (!isset($GLOBALS["patient_address_grid"]))
					$GLOBALS["patient_address_grid"] = new patient_address_grid();
				if ($GLOBALS["patient_address_grid"]->DetailEdit) {
					$GLOBALS["patient_address_grid"]->CurrentMode = "edit";
					$GLOBALS["patient_address_grid"]->CurrentAction = "gridedit";

					// Save current master table to detail table
					$GLOBALS["patient_address_grid"]->setCurrentMasterTable($this->TableVar);
					$GLOBALS["patient_address_grid"]->setStartRecordNumber(1);
					$GLOBALS["patient_address_grid"]->patient_id->IsDetailKey = TRUE;
					$GLOBALS["patient_address_grid"]->patient_id->CurrentValue = $this->id->CurrentValue;
					$GLOBALS["patient_address_grid"]->patient_id->setSessionValue($GLOBALS["patient_address_grid"]->patient_id->CurrentValue);
				}
			}
			if (in_array("patient_email", $detailTblVar)) {
				if (!isset($GLOBALS["patient_email_grid"]))
					$GLOBALS["patient_email_grid"] = new patient_email_grid();
				if ($GLOBALS["patient_email_grid"]->DetailEdit) {
					$GLOBALS["patient_email_grid"]->CurrentMode = "edit";
					$GLOBALS["patient_email_grid"]->CurrentAction = "gridedit";

					// Save current master table to detail table
					$GLOBALS["patient_email_grid"]->setCurrentMasterTable($this->TableVar);
					$GLOBALS["patient_email_grid"]->setStartRecordNumber(1);
					$GLOBALS["patient_email_grid"]->patient_id->IsDetailKey = TRUE;
					$GLOBALS["patient_email_grid"]->patient_id->CurrentValue = $this->id->CurrentValue;
					$GLOBALS["patient_email_grid"]->patient_id->setSessionValue($GLOBALS["patient_email_grid"]->patient_id->CurrentValue);
				}
			}
			if (in_array("patient_telephone", $detailTblVar)) {
				if (!isset($GLOBALS["patient_telephone_grid"]))
					$GLOBALS["patient_telephone_grid"] = new patient_telephone_grid();
				if ($GLOBALS["patient_telephone_grid"]->DetailEdit) {
					$GLOBALS["patient_telephone_grid"]->CurrentMode = "edit";
					$GLOBALS["patient_telephone_grid"]->CurrentAction = "gridedit";

					// Save current master table to detail table
					$GLOBALS["patient_telephone_grid"]->setCurrentMasterTable($this->TableVar);
					$GLOBALS["patient_telephone_grid"]->setStartRecordNumber(1);
					$GLOBALS["patient_telephone_grid"]->patient_id->IsDetailKey = TRUE;
					$GLOBALS["patient_telephone_grid"]->patient_id->CurrentValue = $this->id->CurrentValue;
					$GLOBALS["patient_telephone_grid"]->patient_id->setSessionValue($GLOBALS["patient_telephone_grid"]->patient_id->CurrentValue);
				}
			}
			if (in_array("patient_emergency_contact", $detailTblVar)) {
				if (!isset($GLOBALS["patient_emergency_contact_grid"]))
					$GLOBALS["patient_emergency_contact_grid"] = new patient_emergency_contact_grid();
				if ($GLOBALS["patient_emergency_contact_grid"]->DetailEdit) {
					$GLOBALS["patient_emergency_contact_grid"]->CurrentMode = "edit";
					$GLOBALS["patient_emergency_contact_grid"]->CurrentAction = "gridedit";

					// Save current master table to detail table
					$GLOBALS["patient_emergency_contact_grid"]->setCurrentMasterTable($this->TableVar);
					$GLOBALS["patient_emergency_contact_grid"]->setStartRecordNumber(1);
					$GLOBALS["patient_emergency_contact_grid"]->patient_id->IsDetailKey = TRUE;
					$GLOBALS["patient_emergency_contact_grid"]->patient_id->CurrentValue = $this->id->CurrentValue;
					$GLOBALS["patient_emergency_contact_grid"]->patient_id->setSessionValue($GLOBALS["patient_emergency_contact_grid"]->patient_id->CurrentValue);
				}
			}
			if (in_array("patient_document", $detailTblVar)) {
				if (!isset($GLOBALS["patient_document_grid"]))
					$GLOBALS["patient_document_grid"] = new patient_document_grid();
				if ($GLOBALS["patient_document_grid"]->DetailEdit) {
					$GLOBALS["patient_document_grid"]->CurrentMode = "edit";
					$GLOBALS["patient_document_grid"]->CurrentAction = "gridedit";

					// Save current master table to detail table
					$GLOBALS["patient_document_grid"]->setCurrentMasterTable($this->TableVar);
					$GLOBALS["patient_document_grid"]->setStartRecordNumber(1);
					$GLOBALS["patient_document_grid"]->patient_id->IsDetailKey = TRUE;
					$GLOBALS["patient_document_grid"]->patient_id->CurrentValue = $this->id->CurrentValue;
					$GLOBALS["patient_document_grid"]->patient_id->setSessionValue($GLOBALS["patient_document_grid"]->patient_id->CurrentValue);
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
		$Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("patientlist.php"), "", $this->TableVar, TRUE);
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
				case "x_ReferA4TreatingConsultant":
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
						case "x_title":
							break;
						case "x_gender":
							break;
						case "x_blood_group":
							break;
						case "x_status":
							break;
						case "x_ReferedByDr":
							break;
						case "x_ReferA4TreatingConsultant":
							break;
						case "x_spouse_title":
							break;
						case "x_spouse_gender":
							break;
						case "x_spouse_blood_group":
							break;
						case "x_Maritalstatus":
							break;
						case "x_Business":
							break;
						case "x_Patient_Language":
							break;
						case "x_WhereDidYouHear":
							break;
						case "x_HospID":
							break;
						case "x_AppointmentSearch":
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
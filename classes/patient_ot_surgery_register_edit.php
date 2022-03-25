<?php
namespace PHPMaker2019\HIMS;

/**
 * Page class
 */
class patient_ot_surgery_register_edit extends patient_ot_surgery_register
{

	// Page ID
	public $PageID = "edit";

	// Project ID
	public $ProjectID = "{EA4F6D13-AF8F-428D-9EA7-BA88D1107EC3}";

	// Table name
	public $TableName = 'patient_ot_surgery_register';

	// Page object name
	public $PageObjName = "patient_ot_surgery_register_edit";

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

		// Table object (patient_ot_surgery_register)
		if (!isset($GLOBALS["patient_ot_surgery_register"]) || get_class($GLOBALS["patient_ot_surgery_register"]) == PROJECT_NAMESPACE . "patient_ot_surgery_register") {
			$GLOBALS["patient_ot_surgery_register"] = &$this;
			$GLOBALS["Table"] = &$GLOBALS["patient_ot_surgery_register"];
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
			define(PROJECT_NAMESPACE . "PAGE_ID", 'edit');

		// Table name (for backward compatibility)
		if (!defined(PROJECT_NAMESPACE . "TABLE_NAME"))
			define(PROJECT_NAMESPACE . "TABLE_NAME", 'patient_ot_surgery_register');

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
		global $EXPORT, $patient_ot_surgery_register;
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
				$doc = new $class($patient_ot_surgery_register);
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
					if ($pageName == "patient_ot_surgery_registerview.php")
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
					$this->terminate(GetUrl("patient_ot_surgery_registerlist.php"));
				else
					$this->terminate(GetUrl("login.php"));
				return;
			}
		}

		// Create form object
		$CurrentForm = new HttpForm();
		$this->CurrentAction = Param("action"); // Set up current action
		$this->id->setVisibility();
		$this->PatID->setVisibility();
		$this->PatientName->setVisibility();
		$this->mrnno->setVisibility();
		$this->MobileNumber->setVisibility();
		$this->Age->setVisibility();
		$this->Gender->setVisibility();
		$this->profilePic->setVisibility();
		$this->diagnosis->setVisibility();
		$this->proposedSurgery->setVisibility();
		$this->surgeryProcedure->setVisibility();
		$this->typeOfAnaesthesia->setVisibility();
		$this->RecievedTime->setVisibility();
		$this->AnaesthesiaStarted->setVisibility();
		$this->AnaesthesiaEnded->setVisibility();
		$this->surgeryStarted->setVisibility();
		$this->surgeryEnded->setVisibility();
		$this->RecoveryTime->setVisibility();
		$this->ShiftedTime->setVisibility();
		$this->Duration->setVisibility();
		$this->Surgeon->setVisibility();
		$this->Anaesthetist->setVisibility();
		$this->AsstSurgeon1->setVisibility();
		$this->AsstSurgeon2->setVisibility();
		$this->paediatric->setVisibility();
		$this->ScrubNurse1->setVisibility();
		$this->ScrubNurse2->setVisibility();
		$this->FloorNurse->setVisibility();
		$this->Technician->setVisibility();
		$this->HouseKeeping->setVisibility();
		$this->countsCheckedMops->setVisibility();
		$this->gauze->setVisibility();
		$this->needles->setVisibility();
		$this->bloodloss->setVisibility();
		$this->bloodtransfusion->setVisibility();
		$this->implantsUsed->setVisibility();
		$this->MaterialsForHPE->setVisibility();
		$this->status->setVisibility();
		$this->createdby->setVisibility();
		$this->createddatetime->setVisibility();
		$this->modifiedby->setVisibility();
		$this->modifieddatetime->setVisibility();
		$this->HospID->setVisibility();
		$this->PatientSearch->setVisibility();
		$this->Reception->setVisibility();
		$this->PatientID->setVisibility();
		$this->PId->setVisibility();
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
		$this->setupLookupOptions($this->Surgeon);
		$this->setupLookupOptions($this->Anaesthetist);
		$this->setupLookupOptions($this->AsstSurgeon1);
		$this->setupLookupOptions($this->AsstSurgeon2);
		$this->setupLookupOptions($this->paediatric);
		$this->setupLookupOptions($this->PatientSearch);

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

		// Set up master detail parameters
		$this->setupMasterParms();

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
					$this->terminate("patient_ot_surgery_registerlist.php"); // No matching record, return to list
				}
				break;
			case "update": // Update
				$returnUrl = $this->getReturnUrl();
				if (GetPageName($returnUrl) == "patient_ot_surgery_registerlist.php")
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

		// Check field name 'mrnno' first before field var 'x_mrnno'
		$val = $CurrentForm->hasValue("mrnno") ? $CurrentForm->getValue("mrnno") : $CurrentForm->getValue("x_mrnno");
		if (!$this->mrnno->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->mrnno->Visible = FALSE; // Disable update for API request
			else
				$this->mrnno->setFormValue($val);
		}

		// Check field name 'MobileNumber' first before field var 'x_MobileNumber'
		$val = $CurrentForm->hasValue("MobileNumber") ? $CurrentForm->getValue("MobileNumber") : $CurrentForm->getValue("x_MobileNumber");
		if (!$this->MobileNumber->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->MobileNumber->Visible = FALSE; // Disable update for API request
			else
				$this->MobileNumber->setFormValue($val);
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

		// Check field name 'diagnosis' first before field var 'x_diagnosis'
		$val = $CurrentForm->hasValue("diagnosis") ? $CurrentForm->getValue("diagnosis") : $CurrentForm->getValue("x_diagnosis");
		if (!$this->diagnosis->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->diagnosis->Visible = FALSE; // Disable update for API request
			else
				$this->diagnosis->setFormValue($val);
		}

		// Check field name 'proposedSurgery' first before field var 'x_proposedSurgery'
		$val = $CurrentForm->hasValue("proposedSurgery") ? $CurrentForm->getValue("proposedSurgery") : $CurrentForm->getValue("x_proposedSurgery");
		if (!$this->proposedSurgery->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->proposedSurgery->Visible = FALSE; // Disable update for API request
			else
				$this->proposedSurgery->setFormValue($val);
		}

		// Check field name 'surgeryProcedure' first before field var 'x_surgeryProcedure'
		$val = $CurrentForm->hasValue("surgeryProcedure") ? $CurrentForm->getValue("surgeryProcedure") : $CurrentForm->getValue("x_surgeryProcedure");
		if (!$this->surgeryProcedure->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->surgeryProcedure->Visible = FALSE; // Disable update for API request
			else
				$this->surgeryProcedure->setFormValue($val);
		}

		// Check field name 'typeOfAnaesthesia' first before field var 'x_typeOfAnaesthesia'
		$val = $CurrentForm->hasValue("typeOfAnaesthesia") ? $CurrentForm->getValue("typeOfAnaesthesia") : $CurrentForm->getValue("x_typeOfAnaesthesia");
		if (!$this->typeOfAnaesthesia->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->typeOfAnaesthesia->Visible = FALSE; // Disable update for API request
			else
				$this->typeOfAnaesthesia->setFormValue($val);
		}

		// Check field name 'RecievedTime' first before field var 'x_RecievedTime'
		$val = $CurrentForm->hasValue("RecievedTime") ? $CurrentForm->getValue("RecievedTime") : $CurrentForm->getValue("x_RecievedTime");
		if (!$this->RecievedTime->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->RecievedTime->Visible = FALSE; // Disable update for API request
			else
				$this->RecievedTime->setFormValue($val);
			$this->RecievedTime->CurrentValue = UnFormatDateTime($this->RecievedTime->CurrentValue, 11);
		}

		// Check field name 'AnaesthesiaStarted' first before field var 'x_AnaesthesiaStarted'
		$val = $CurrentForm->hasValue("AnaesthesiaStarted") ? $CurrentForm->getValue("AnaesthesiaStarted") : $CurrentForm->getValue("x_AnaesthesiaStarted");
		if (!$this->AnaesthesiaStarted->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->AnaesthesiaStarted->Visible = FALSE; // Disable update for API request
			else
				$this->AnaesthesiaStarted->setFormValue($val);
			$this->AnaesthesiaStarted->CurrentValue = UnFormatDateTime($this->AnaesthesiaStarted->CurrentValue, 11);
		}

		// Check field name 'AnaesthesiaEnded' first before field var 'x_AnaesthesiaEnded'
		$val = $CurrentForm->hasValue("AnaesthesiaEnded") ? $CurrentForm->getValue("AnaesthesiaEnded") : $CurrentForm->getValue("x_AnaesthesiaEnded");
		if (!$this->AnaesthesiaEnded->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->AnaesthesiaEnded->Visible = FALSE; // Disable update for API request
			else
				$this->AnaesthesiaEnded->setFormValue($val);
			$this->AnaesthesiaEnded->CurrentValue = UnFormatDateTime($this->AnaesthesiaEnded->CurrentValue, 11);
		}

		// Check field name 'surgeryStarted' first before field var 'x_surgeryStarted'
		$val = $CurrentForm->hasValue("surgeryStarted") ? $CurrentForm->getValue("surgeryStarted") : $CurrentForm->getValue("x_surgeryStarted");
		if (!$this->surgeryStarted->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->surgeryStarted->Visible = FALSE; // Disable update for API request
			else
				$this->surgeryStarted->setFormValue($val);
			$this->surgeryStarted->CurrentValue = UnFormatDateTime($this->surgeryStarted->CurrentValue, 11);
		}

		// Check field name 'surgeryEnded' first before field var 'x_surgeryEnded'
		$val = $CurrentForm->hasValue("surgeryEnded") ? $CurrentForm->getValue("surgeryEnded") : $CurrentForm->getValue("x_surgeryEnded");
		if (!$this->surgeryEnded->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->surgeryEnded->Visible = FALSE; // Disable update for API request
			else
				$this->surgeryEnded->setFormValue($val);
			$this->surgeryEnded->CurrentValue = UnFormatDateTime($this->surgeryEnded->CurrentValue, 17);
		}

		// Check field name 'RecoveryTime' first before field var 'x_RecoveryTime'
		$val = $CurrentForm->hasValue("RecoveryTime") ? $CurrentForm->getValue("RecoveryTime") : $CurrentForm->getValue("x_RecoveryTime");
		if (!$this->RecoveryTime->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->RecoveryTime->Visible = FALSE; // Disable update for API request
			else
				$this->RecoveryTime->setFormValue($val);
			$this->RecoveryTime->CurrentValue = UnFormatDateTime($this->RecoveryTime->CurrentValue, 11);
		}

		// Check field name 'ShiftedTime' first before field var 'x_ShiftedTime'
		$val = $CurrentForm->hasValue("ShiftedTime") ? $CurrentForm->getValue("ShiftedTime") : $CurrentForm->getValue("x_ShiftedTime");
		if (!$this->ShiftedTime->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->ShiftedTime->Visible = FALSE; // Disable update for API request
			else
				$this->ShiftedTime->setFormValue($val);
			$this->ShiftedTime->CurrentValue = UnFormatDateTime($this->ShiftedTime->CurrentValue, 11);
		}

		// Check field name 'Duration' first before field var 'x_Duration'
		$val = $CurrentForm->hasValue("Duration") ? $CurrentForm->getValue("Duration") : $CurrentForm->getValue("x_Duration");
		if (!$this->Duration->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Duration->Visible = FALSE; // Disable update for API request
			else
				$this->Duration->setFormValue($val);
		}

		// Check field name 'Surgeon' first before field var 'x_Surgeon'
		$val = $CurrentForm->hasValue("Surgeon") ? $CurrentForm->getValue("Surgeon") : $CurrentForm->getValue("x_Surgeon");
		if (!$this->Surgeon->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Surgeon->Visible = FALSE; // Disable update for API request
			else
				$this->Surgeon->setFormValue($val);
		}

		// Check field name 'Anaesthetist' first before field var 'x_Anaesthetist'
		$val = $CurrentForm->hasValue("Anaesthetist") ? $CurrentForm->getValue("Anaesthetist") : $CurrentForm->getValue("x_Anaesthetist");
		if (!$this->Anaesthetist->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Anaesthetist->Visible = FALSE; // Disable update for API request
			else
				$this->Anaesthetist->setFormValue($val);
		}

		// Check field name 'AsstSurgeon1' first before field var 'x_AsstSurgeon1'
		$val = $CurrentForm->hasValue("AsstSurgeon1") ? $CurrentForm->getValue("AsstSurgeon1") : $CurrentForm->getValue("x_AsstSurgeon1");
		if (!$this->AsstSurgeon1->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->AsstSurgeon1->Visible = FALSE; // Disable update for API request
			else
				$this->AsstSurgeon1->setFormValue($val);
		}

		// Check field name 'AsstSurgeon2' first before field var 'x_AsstSurgeon2'
		$val = $CurrentForm->hasValue("AsstSurgeon2") ? $CurrentForm->getValue("AsstSurgeon2") : $CurrentForm->getValue("x_AsstSurgeon2");
		if (!$this->AsstSurgeon2->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->AsstSurgeon2->Visible = FALSE; // Disable update for API request
			else
				$this->AsstSurgeon2->setFormValue($val);
		}

		// Check field name 'paediatric' first before field var 'x_paediatric'
		$val = $CurrentForm->hasValue("paediatric") ? $CurrentForm->getValue("paediatric") : $CurrentForm->getValue("x_paediatric");
		if (!$this->paediatric->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->paediatric->Visible = FALSE; // Disable update for API request
			else
				$this->paediatric->setFormValue($val);
		}

		// Check field name 'ScrubNurse1' first before field var 'x_ScrubNurse1'
		$val = $CurrentForm->hasValue("ScrubNurse1") ? $CurrentForm->getValue("ScrubNurse1") : $CurrentForm->getValue("x_ScrubNurse1");
		if (!$this->ScrubNurse1->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->ScrubNurse1->Visible = FALSE; // Disable update for API request
			else
				$this->ScrubNurse1->setFormValue($val);
		}

		// Check field name 'ScrubNurse2' first before field var 'x_ScrubNurse2'
		$val = $CurrentForm->hasValue("ScrubNurse2") ? $CurrentForm->getValue("ScrubNurse2") : $CurrentForm->getValue("x_ScrubNurse2");
		if (!$this->ScrubNurse2->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->ScrubNurse2->Visible = FALSE; // Disable update for API request
			else
				$this->ScrubNurse2->setFormValue($val);
		}

		// Check field name 'FloorNurse' first before field var 'x_FloorNurse'
		$val = $CurrentForm->hasValue("FloorNurse") ? $CurrentForm->getValue("FloorNurse") : $CurrentForm->getValue("x_FloorNurse");
		if (!$this->FloorNurse->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->FloorNurse->Visible = FALSE; // Disable update for API request
			else
				$this->FloorNurse->setFormValue($val);
		}

		// Check field name 'Technician' first before field var 'x_Technician'
		$val = $CurrentForm->hasValue("Technician") ? $CurrentForm->getValue("Technician") : $CurrentForm->getValue("x_Technician");
		if (!$this->Technician->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Technician->Visible = FALSE; // Disable update for API request
			else
				$this->Technician->setFormValue($val);
		}

		// Check field name 'HouseKeeping' first before field var 'x_HouseKeeping'
		$val = $CurrentForm->hasValue("HouseKeeping") ? $CurrentForm->getValue("HouseKeeping") : $CurrentForm->getValue("x_HouseKeeping");
		if (!$this->HouseKeeping->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->HouseKeeping->Visible = FALSE; // Disable update for API request
			else
				$this->HouseKeeping->setFormValue($val);
		}

		// Check field name 'countsCheckedMops' first before field var 'x_countsCheckedMops'
		$val = $CurrentForm->hasValue("countsCheckedMops") ? $CurrentForm->getValue("countsCheckedMops") : $CurrentForm->getValue("x_countsCheckedMops");
		if (!$this->countsCheckedMops->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->countsCheckedMops->Visible = FALSE; // Disable update for API request
			else
				$this->countsCheckedMops->setFormValue($val);
		}

		// Check field name 'gauze' first before field var 'x_gauze'
		$val = $CurrentForm->hasValue("gauze") ? $CurrentForm->getValue("gauze") : $CurrentForm->getValue("x_gauze");
		if (!$this->gauze->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->gauze->Visible = FALSE; // Disable update for API request
			else
				$this->gauze->setFormValue($val);
		}

		// Check field name 'needles' first before field var 'x_needles'
		$val = $CurrentForm->hasValue("needles") ? $CurrentForm->getValue("needles") : $CurrentForm->getValue("x_needles");
		if (!$this->needles->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->needles->Visible = FALSE; // Disable update for API request
			else
				$this->needles->setFormValue($val);
		}

		// Check field name 'bloodloss' first before field var 'x_bloodloss'
		$val = $CurrentForm->hasValue("bloodloss") ? $CurrentForm->getValue("bloodloss") : $CurrentForm->getValue("x_bloodloss");
		if (!$this->bloodloss->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->bloodloss->Visible = FALSE; // Disable update for API request
			else
				$this->bloodloss->setFormValue($val);
		}

		// Check field name 'bloodtransfusion' first before field var 'x_bloodtransfusion'
		$val = $CurrentForm->hasValue("bloodtransfusion") ? $CurrentForm->getValue("bloodtransfusion") : $CurrentForm->getValue("x_bloodtransfusion");
		if (!$this->bloodtransfusion->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->bloodtransfusion->Visible = FALSE; // Disable update for API request
			else
				$this->bloodtransfusion->setFormValue($val);
		}

		// Check field name 'implantsUsed' first before field var 'x_implantsUsed'
		$val = $CurrentForm->hasValue("implantsUsed") ? $CurrentForm->getValue("implantsUsed") : $CurrentForm->getValue("x_implantsUsed");
		if (!$this->implantsUsed->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->implantsUsed->Visible = FALSE; // Disable update for API request
			else
				$this->implantsUsed->setFormValue($val);
		}

		// Check field name 'MaterialsForHPE' first before field var 'x_MaterialsForHPE'
		$val = $CurrentForm->hasValue("MaterialsForHPE") ? $CurrentForm->getValue("MaterialsForHPE") : $CurrentForm->getValue("x_MaterialsForHPE");
		if (!$this->MaterialsForHPE->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->MaterialsForHPE->Visible = FALSE; // Disable update for API request
			else
				$this->MaterialsForHPE->setFormValue($val);
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

		// Check field name 'HospID' first before field var 'x_HospID'
		$val = $CurrentForm->hasValue("HospID") ? $CurrentForm->getValue("HospID") : $CurrentForm->getValue("x_HospID");
		if (!$this->HospID->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->HospID->Visible = FALSE; // Disable update for API request
			else
				$this->HospID->setFormValue($val);
		}

		// Check field name 'PatientSearch' first before field var 'x_PatientSearch'
		$val = $CurrentForm->hasValue("PatientSearch") ? $CurrentForm->getValue("PatientSearch") : $CurrentForm->getValue("x_PatientSearch");
		if (!$this->PatientSearch->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->PatientSearch->Visible = FALSE; // Disable update for API request
			else
				$this->PatientSearch->setFormValue($val);
		}

		// Check field name 'Reception' first before field var 'x_Reception'
		$val = $CurrentForm->hasValue("Reception") ? $CurrentForm->getValue("Reception") : $CurrentForm->getValue("x_Reception");
		if (!$this->Reception->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Reception->Visible = FALSE; // Disable update for API request
			else
				$this->Reception->setFormValue($val);
		}

		// Check field name 'PatientID' first before field var 'x_PatientID'
		$val = $CurrentForm->hasValue("PatientID") ? $CurrentForm->getValue("PatientID") : $CurrentForm->getValue("x_PatientID");
		if (!$this->PatientID->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->PatientID->Visible = FALSE; // Disable update for API request
			else
				$this->PatientID->setFormValue($val);
		}

		// Check field name 'PId' first before field var 'x_PId'
		$val = $CurrentForm->hasValue("PId") ? $CurrentForm->getValue("PId") : $CurrentForm->getValue("x_PId");
		if (!$this->PId->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->PId->Visible = FALSE; // Disable update for API request
			else
				$this->PId->setFormValue($val);
		}
	}

	// Restore form values
	public function restoreFormValues()
	{
		global $CurrentForm;
		$this->id->CurrentValue = $this->id->FormValue;
		$this->PatID->CurrentValue = $this->PatID->FormValue;
		$this->PatientName->CurrentValue = $this->PatientName->FormValue;
		$this->mrnno->CurrentValue = $this->mrnno->FormValue;
		$this->MobileNumber->CurrentValue = $this->MobileNumber->FormValue;
		$this->Age->CurrentValue = $this->Age->FormValue;
		$this->Gender->CurrentValue = $this->Gender->FormValue;
		$this->profilePic->CurrentValue = $this->profilePic->FormValue;
		$this->diagnosis->CurrentValue = $this->diagnosis->FormValue;
		$this->proposedSurgery->CurrentValue = $this->proposedSurgery->FormValue;
		$this->surgeryProcedure->CurrentValue = $this->surgeryProcedure->FormValue;
		$this->typeOfAnaesthesia->CurrentValue = $this->typeOfAnaesthesia->FormValue;
		$this->RecievedTime->CurrentValue = $this->RecievedTime->FormValue;
		$this->RecievedTime->CurrentValue = UnFormatDateTime($this->RecievedTime->CurrentValue, 11);
		$this->AnaesthesiaStarted->CurrentValue = $this->AnaesthesiaStarted->FormValue;
		$this->AnaesthesiaStarted->CurrentValue = UnFormatDateTime($this->AnaesthesiaStarted->CurrentValue, 11);
		$this->AnaesthesiaEnded->CurrentValue = $this->AnaesthesiaEnded->FormValue;
		$this->AnaesthesiaEnded->CurrentValue = UnFormatDateTime($this->AnaesthesiaEnded->CurrentValue, 11);
		$this->surgeryStarted->CurrentValue = $this->surgeryStarted->FormValue;
		$this->surgeryStarted->CurrentValue = UnFormatDateTime($this->surgeryStarted->CurrentValue, 11);
		$this->surgeryEnded->CurrentValue = $this->surgeryEnded->FormValue;
		$this->surgeryEnded->CurrentValue = UnFormatDateTime($this->surgeryEnded->CurrentValue, 17);
		$this->RecoveryTime->CurrentValue = $this->RecoveryTime->FormValue;
		$this->RecoveryTime->CurrentValue = UnFormatDateTime($this->RecoveryTime->CurrentValue, 11);
		$this->ShiftedTime->CurrentValue = $this->ShiftedTime->FormValue;
		$this->ShiftedTime->CurrentValue = UnFormatDateTime($this->ShiftedTime->CurrentValue, 11);
		$this->Duration->CurrentValue = $this->Duration->FormValue;
		$this->Surgeon->CurrentValue = $this->Surgeon->FormValue;
		$this->Anaesthetist->CurrentValue = $this->Anaesthetist->FormValue;
		$this->AsstSurgeon1->CurrentValue = $this->AsstSurgeon1->FormValue;
		$this->AsstSurgeon2->CurrentValue = $this->AsstSurgeon2->FormValue;
		$this->paediatric->CurrentValue = $this->paediatric->FormValue;
		$this->ScrubNurse1->CurrentValue = $this->ScrubNurse1->FormValue;
		$this->ScrubNurse2->CurrentValue = $this->ScrubNurse2->FormValue;
		$this->FloorNurse->CurrentValue = $this->FloorNurse->FormValue;
		$this->Technician->CurrentValue = $this->Technician->FormValue;
		$this->HouseKeeping->CurrentValue = $this->HouseKeeping->FormValue;
		$this->countsCheckedMops->CurrentValue = $this->countsCheckedMops->FormValue;
		$this->gauze->CurrentValue = $this->gauze->FormValue;
		$this->needles->CurrentValue = $this->needles->FormValue;
		$this->bloodloss->CurrentValue = $this->bloodloss->FormValue;
		$this->bloodtransfusion->CurrentValue = $this->bloodtransfusion->FormValue;
		$this->implantsUsed->CurrentValue = $this->implantsUsed->FormValue;
		$this->MaterialsForHPE->CurrentValue = $this->MaterialsForHPE->FormValue;
		$this->status->CurrentValue = $this->status->FormValue;
		$this->createdby->CurrentValue = $this->createdby->FormValue;
		$this->createddatetime->CurrentValue = $this->createddatetime->FormValue;
		$this->createddatetime->CurrentValue = UnFormatDateTime($this->createddatetime->CurrentValue, 0);
		$this->modifiedby->CurrentValue = $this->modifiedby->FormValue;
		$this->modifieddatetime->CurrentValue = $this->modifieddatetime->FormValue;
		$this->modifieddatetime->CurrentValue = UnFormatDateTime($this->modifieddatetime->CurrentValue, 0);
		$this->HospID->CurrentValue = $this->HospID->FormValue;
		$this->PatientSearch->CurrentValue = $this->PatientSearch->FormValue;
		$this->Reception->CurrentValue = $this->Reception->FormValue;
		$this->PatientID->CurrentValue = $this->PatientID->FormValue;
		$this->PId->CurrentValue = $this->PId->FormValue;
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
		$this->mrnno->setDbValue($row['mrnno']);
		$this->MobileNumber->setDbValue($row['MobileNumber']);
		$this->Age->setDbValue($row['Age']);
		$this->Gender->setDbValue($row['Gender']);
		$this->profilePic->setDbValue($row['profilePic']);
		$this->diagnosis->setDbValue($row['diagnosis']);
		$this->proposedSurgery->setDbValue($row['proposedSurgery']);
		$this->surgeryProcedure->setDbValue($row['surgeryProcedure']);
		$this->typeOfAnaesthesia->setDbValue($row['typeOfAnaesthesia']);
		$this->RecievedTime->setDbValue($row['RecievedTime']);
		$this->AnaesthesiaStarted->setDbValue($row['AnaesthesiaStarted']);
		$this->AnaesthesiaEnded->setDbValue($row['AnaesthesiaEnded']);
		$this->surgeryStarted->setDbValue($row['surgeryStarted']);
		$this->surgeryEnded->setDbValue($row['surgeryEnded']);
		$this->RecoveryTime->setDbValue($row['RecoveryTime']);
		$this->ShiftedTime->setDbValue($row['ShiftedTime']);
		$this->Duration->setDbValue($row['Duration']);
		$this->Surgeon->setDbValue($row['Surgeon']);
		$this->Anaesthetist->setDbValue($row['Anaesthetist']);
		$this->AsstSurgeon1->setDbValue($row['AsstSurgeon1']);
		$this->AsstSurgeon2->setDbValue($row['AsstSurgeon2']);
		$this->paediatric->setDbValue($row['paediatric']);
		$this->ScrubNurse1->setDbValue($row['ScrubNurse1']);
		$this->ScrubNurse2->setDbValue($row['ScrubNurse2']);
		$this->FloorNurse->setDbValue($row['FloorNurse']);
		$this->Technician->setDbValue($row['Technician']);
		$this->HouseKeeping->setDbValue($row['HouseKeeping']);
		$this->countsCheckedMops->setDbValue($row['countsCheckedMops']);
		$this->gauze->setDbValue($row['gauze']);
		$this->needles->setDbValue($row['needles']);
		$this->bloodloss->setDbValue($row['bloodloss']);
		$this->bloodtransfusion->setDbValue($row['bloodtransfusion']);
		$this->implantsUsed->setDbValue($row['implantsUsed']);
		$this->MaterialsForHPE->setDbValue($row['MaterialsForHPE']);
		$this->status->setDbValue($row['status']);
		$this->createdby->setDbValue($row['createdby']);
		$this->createddatetime->setDbValue($row['createddatetime']);
		$this->modifiedby->setDbValue($row['modifiedby']);
		$this->modifieddatetime->setDbValue($row['modifieddatetime']);
		$this->HospID->setDbValue($row['HospID']);
		$this->PatientSearch->setDbValue($row['PatientSearch']);
		$this->Reception->setDbValue($row['Reception']);
		$this->PatientID->setDbValue($row['PatientID']);
		$this->PId->setDbValue($row['PId']);
	}

	// Return a row with default values
	protected function newRow()
	{
		$row = [];
		$row['id'] = NULL;
		$row['PatID'] = NULL;
		$row['PatientName'] = NULL;
		$row['mrnno'] = NULL;
		$row['MobileNumber'] = NULL;
		$row['Age'] = NULL;
		$row['Gender'] = NULL;
		$row['profilePic'] = NULL;
		$row['diagnosis'] = NULL;
		$row['proposedSurgery'] = NULL;
		$row['surgeryProcedure'] = NULL;
		$row['typeOfAnaesthesia'] = NULL;
		$row['RecievedTime'] = NULL;
		$row['AnaesthesiaStarted'] = NULL;
		$row['AnaesthesiaEnded'] = NULL;
		$row['surgeryStarted'] = NULL;
		$row['surgeryEnded'] = NULL;
		$row['RecoveryTime'] = NULL;
		$row['ShiftedTime'] = NULL;
		$row['Duration'] = NULL;
		$row['Surgeon'] = NULL;
		$row['Anaesthetist'] = NULL;
		$row['AsstSurgeon1'] = NULL;
		$row['AsstSurgeon2'] = NULL;
		$row['paediatric'] = NULL;
		$row['ScrubNurse1'] = NULL;
		$row['ScrubNurse2'] = NULL;
		$row['FloorNurse'] = NULL;
		$row['Technician'] = NULL;
		$row['HouseKeeping'] = NULL;
		$row['countsCheckedMops'] = NULL;
		$row['gauze'] = NULL;
		$row['needles'] = NULL;
		$row['bloodloss'] = NULL;
		$row['bloodtransfusion'] = NULL;
		$row['implantsUsed'] = NULL;
		$row['MaterialsForHPE'] = NULL;
		$row['status'] = NULL;
		$row['createdby'] = NULL;
		$row['createddatetime'] = NULL;
		$row['modifiedby'] = NULL;
		$row['modifieddatetime'] = NULL;
		$row['HospID'] = NULL;
		$row['PatientSearch'] = NULL;
		$row['Reception'] = NULL;
		$row['PatientID'] = NULL;
		$row['PId'] = NULL;
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
		// mrnno
		// MobileNumber
		// Age
		// Gender
		// profilePic
		// diagnosis
		// proposedSurgery
		// surgeryProcedure
		// typeOfAnaesthesia
		// RecievedTime
		// AnaesthesiaStarted
		// AnaesthesiaEnded
		// surgeryStarted
		// surgeryEnded
		// RecoveryTime
		// ShiftedTime
		// Duration
		// Surgeon
		// Anaesthetist
		// AsstSurgeon1
		// AsstSurgeon2
		// paediatric
		// ScrubNurse1
		// ScrubNurse2
		// FloorNurse
		// Technician
		// HouseKeeping
		// countsCheckedMops
		// gauze
		// needles
		// bloodloss
		// bloodtransfusion
		// implantsUsed
		// MaterialsForHPE
		// status
		// createdby
		// createddatetime
		// modifiedby
		// modifieddatetime
		// HospID
		// PatientSearch
		// Reception
		// PatientID
		// PId

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

			// mrnno
			$this->mrnno->ViewValue = $this->mrnno->CurrentValue;
			$this->mrnno->ViewCustomAttributes = "";

			// MobileNumber
			$this->MobileNumber->ViewValue = $this->MobileNumber->CurrentValue;
			$this->MobileNumber->ViewCustomAttributes = "";

			// Age
			$this->Age->ViewValue = $this->Age->CurrentValue;
			$this->Age->ViewCustomAttributes = "";

			// Gender
			$this->Gender->ViewValue = $this->Gender->CurrentValue;
			$this->Gender->ViewCustomAttributes = "";

			// profilePic
			$this->profilePic->ViewValue = $this->profilePic->CurrentValue;
			$this->profilePic->ViewCustomAttributes = "";

			// diagnosis
			$this->diagnosis->ViewValue = $this->diagnosis->CurrentValue;
			$this->diagnosis->ViewCustomAttributes = "";

			// proposedSurgery
			$this->proposedSurgery->ViewValue = $this->proposedSurgery->CurrentValue;
			$this->proposedSurgery->ViewCustomAttributes = "";

			// surgeryProcedure
			$this->surgeryProcedure->ViewValue = $this->surgeryProcedure->CurrentValue;
			$this->surgeryProcedure->ViewCustomAttributes = "";

			// typeOfAnaesthesia
			$this->typeOfAnaesthesia->ViewValue = $this->typeOfAnaesthesia->CurrentValue;
			$this->typeOfAnaesthesia->ViewCustomAttributes = "";

			// RecievedTime
			$this->RecievedTime->ViewValue = $this->RecievedTime->CurrentValue;
			$this->RecievedTime->ViewValue = FormatDateTime($this->RecievedTime->ViewValue, 11);
			$this->RecievedTime->ViewCustomAttributes = "";

			// AnaesthesiaStarted
			$this->AnaesthesiaStarted->ViewValue = $this->AnaesthesiaStarted->CurrentValue;
			$this->AnaesthesiaStarted->ViewValue = FormatDateTime($this->AnaesthesiaStarted->ViewValue, 11);
			$this->AnaesthesiaStarted->ViewCustomAttributes = "";

			// AnaesthesiaEnded
			$this->AnaesthesiaEnded->ViewValue = $this->AnaesthesiaEnded->CurrentValue;
			$this->AnaesthesiaEnded->ViewValue = FormatDateTime($this->AnaesthesiaEnded->ViewValue, 11);
			$this->AnaesthesiaEnded->ViewCustomAttributes = "";

			// surgeryStarted
			$this->surgeryStarted->ViewValue = $this->surgeryStarted->CurrentValue;
			$this->surgeryStarted->ViewValue = FormatDateTime($this->surgeryStarted->ViewValue, 11);
			$this->surgeryStarted->ViewCustomAttributes = "";

			// surgeryEnded
			$this->surgeryEnded->ViewValue = $this->surgeryEnded->CurrentValue;
			$this->surgeryEnded->ViewValue = FormatDateTime($this->surgeryEnded->ViewValue, 17);
			$this->surgeryEnded->ViewCustomAttributes = "";

			// RecoveryTime
			$this->RecoveryTime->ViewValue = $this->RecoveryTime->CurrentValue;
			$this->RecoveryTime->ViewValue = FormatDateTime($this->RecoveryTime->ViewValue, 11);
			$this->RecoveryTime->ViewCustomAttributes = "";

			// ShiftedTime
			$this->ShiftedTime->ViewValue = $this->ShiftedTime->CurrentValue;
			$this->ShiftedTime->ViewValue = FormatDateTime($this->ShiftedTime->ViewValue, 11);
			$this->ShiftedTime->ViewCustomAttributes = "";

			// Duration
			$this->Duration->ViewValue = $this->Duration->CurrentValue;
			$this->Duration->ViewCustomAttributes = "";

			// Surgeon
			$curVal = strval($this->Surgeon->CurrentValue);
			if ($curVal <> "") {
				$this->Surgeon->ViewValue = $this->Surgeon->lookupCacheOption($curVal);
				if ($this->Surgeon->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`NAME`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->Surgeon->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = $rswrk->fields('df');
						$this->Surgeon->ViewValue = $this->Surgeon->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->Surgeon->ViewValue = $this->Surgeon->CurrentValue;
					}
				}
			} else {
				$this->Surgeon->ViewValue = NULL;
			}
			$this->Surgeon->ViewCustomAttributes = "";

			// Anaesthetist
			$curVal = strval($this->Anaesthetist->CurrentValue);
			if ($curVal <> "") {
				$this->Anaesthetist->ViewValue = $this->Anaesthetist->lookupCacheOption($curVal);
				if ($this->Anaesthetist->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`NAME`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->Anaesthetist->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = $rswrk->fields('df');
						$this->Anaesthetist->ViewValue = $this->Anaesthetist->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->Anaesthetist->ViewValue = $this->Anaesthetist->CurrentValue;
					}
				}
			} else {
				$this->Anaesthetist->ViewValue = NULL;
			}
			$this->Anaesthetist->ViewCustomAttributes = "";

			// AsstSurgeon1
			$curVal = strval($this->AsstSurgeon1->CurrentValue);
			if ($curVal <> "") {
				$this->AsstSurgeon1->ViewValue = $this->AsstSurgeon1->lookupCacheOption($curVal);
				if ($this->AsstSurgeon1->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`NAME`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->AsstSurgeon1->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = $rswrk->fields('df');
						$this->AsstSurgeon1->ViewValue = $this->AsstSurgeon1->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->AsstSurgeon1->ViewValue = $this->AsstSurgeon1->CurrentValue;
					}
				}
			} else {
				$this->AsstSurgeon1->ViewValue = NULL;
			}
			$this->AsstSurgeon1->ViewCustomAttributes = "";

			// AsstSurgeon2
			$curVal = strval($this->AsstSurgeon2->CurrentValue);
			if ($curVal <> "") {
				$this->AsstSurgeon2->ViewValue = $this->AsstSurgeon2->lookupCacheOption($curVal);
				if ($this->AsstSurgeon2->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`NAME`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->AsstSurgeon2->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = $rswrk->fields('df');
						$this->AsstSurgeon2->ViewValue = $this->AsstSurgeon2->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->AsstSurgeon2->ViewValue = $this->AsstSurgeon2->CurrentValue;
					}
				}
			} else {
				$this->AsstSurgeon2->ViewValue = NULL;
			}
			$this->AsstSurgeon2->ViewCustomAttributes = "";

			// paediatric
			$curVal = strval($this->paediatric->CurrentValue);
			if ($curVal <> "") {
				$this->paediatric->ViewValue = $this->paediatric->lookupCacheOption($curVal);
				if ($this->paediatric->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`NAME`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->paediatric->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = $rswrk->fields('df');
						$this->paediatric->ViewValue = $this->paediatric->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->paediatric->ViewValue = $this->paediatric->CurrentValue;
					}
				}
			} else {
				$this->paediatric->ViewValue = NULL;
			}
			$this->paediatric->ViewCustomAttributes = "";

			// ScrubNurse1
			$this->ScrubNurse1->ViewValue = $this->ScrubNurse1->CurrentValue;
			$this->ScrubNurse1->ViewCustomAttributes = "";

			// ScrubNurse2
			$this->ScrubNurse2->ViewValue = $this->ScrubNurse2->CurrentValue;
			$this->ScrubNurse2->ViewCustomAttributes = "";

			// FloorNurse
			$this->FloorNurse->ViewValue = $this->FloorNurse->CurrentValue;
			$this->FloorNurse->ViewCustomAttributes = "";

			// Technician
			$this->Technician->ViewValue = $this->Technician->CurrentValue;
			$this->Technician->ViewCustomAttributes = "";

			// HouseKeeping
			$this->HouseKeeping->ViewValue = $this->HouseKeeping->CurrentValue;
			$this->HouseKeeping->ViewCustomAttributes = "";

			// countsCheckedMops
			$this->countsCheckedMops->ViewValue = $this->countsCheckedMops->CurrentValue;
			$this->countsCheckedMops->ViewCustomAttributes = "";

			// gauze
			$this->gauze->ViewValue = $this->gauze->CurrentValue;
			$this->gauze->ViewCustomAttributes = "";

			// needles
			$this->needles->ViewValue = $this->needles->CurrentValue;
			$this->needles->ViewCustomAttributes = "";

			// bloodloss
			$this->bloodloss->ViewValue = $this->bloodloss->CurrentValue;
			$this->bloodloss->ViewCustomAttributes = "";

			// bloodtransfusion
			$this->bloodtransfusion->ViewValue = $this->bloodtransfusion->CurrentValue;
			$this->bloodtransfusion->ViewCustomAttributes = "";

			// implantsUsed
			$this->implantsUsed->ViewValue = $this->implantsUsed->CurrentValue;
			$this->implantsUsed->ViewCustomAttributes = "";

			// MaterialsForHPE
			$this->MaterialsForHPE->ViewValue = $this->MaterialsForHPE->CurrentValue;
			$this->MaterialsForHPE->ViewCustomAttributes = "";

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

			// HospID
			$this->HospID->ViewValue = $this->HospID->CurrentValue;
			$this->HospID->ViewCustomAttributes = "";

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
						$arwrk[1] = $rswrk->fields('df');
						$arwrk[2] = $rswrk->fields('df2');
						$arwrk[3] = FormatNumber($rswrk->fields('df3'), 0, -2, -2, -2);
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

			// Reception
			$this->Reception->ViewValue = $this->Reception->CurrentValue;
			$this->Reception->ViewValue = FormatNumber($this->Reception->ViewValue, 0, -2, -2, -2);
			$this->Reception->ViewCustomAttributes = "";

			// PatientID
			$this->PatientID->ViewValue = $this->PatientID->CurrentValue;
			$this->PatientID->ViewCustomAttributes = "";

			// PId
			$this->PId->ViewValue = $this->PId->CurrentValue;
			$this->PId->ViewValue = FormatNumber($this->PId->ViewValue, 0, -2, -2, -2);
			$this->PId->ViewCustomAttributes = "";

			// id
			$this->id->LinkCustomAttributes = "";
			$this->id->HrefValue = "";
			$this->id->TooltipValue = "";

			// PatID
			$this->PatID->LinkCustomAttributes = "";
			$this->PatID->HrefValue = "";
			$this->PatID->TooltipValue = "";

			// PatientName
			$this->PatientName->LinkCustomAttributes = "";
			$this->PatientName->HrefValue = "";
			$this->PatientName->TooltipValue = "";

			// mrnno
			$this->mrnno->LinkCustomAttributes = "";
			$this->mrnno->HrefValue = "";
			$this->mrnno->TooltipValue = "";

			// MobileNumber
			$this->MobileNumber->LinkCustomAttributes = "";
			$this->MobileNumber->HrefValue = "";
			$this->MobileNumber->TooltipValue = "";

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

			// diagnosis
			$this->diagnosis->LinkCustomAttributes = "";
			$this->diagnosis->HrefValue = "";
			$this->diagnosis->TooltipValue = "";

			// proposedSurgery
			$this->proposedSurgery->LinkCustomAttributes = "";
			$this->proposedSurgery->HrefValue = "";
			$this->proposedSurgery->TooltipValue = "";

			// surgeryProcedure
			$this->surgeryProcedure->LinkCustomAttributes = "";
			$this->surgeryProcedure->HrefValue = "";
			$this->surgeryProcedure->TooltipValue = "";

			// typeOfAnaesthesia
			$this->typeOfAnaesthesia->LinkCustomAttributes = "";
			$this->typeOfAnaesthesia->HrefValue = "";
			$this->typeOfAnaesthesia->TooltipValue = "";

			// RecievedTime
			$this->RecievedTime->LinkCustomAttributes = "";
			$this->RecievedTime->HrefValue = "";
			$this->RecievedTime->TooltipValue = "";

			// AnaesthesiaStarted
			$this->AnaesthesiaStarted->LinkCustomAttributes = "";
			$this->AnaesthesiaStarted->HrefValue = "";
			$this->AnaesthesiaStarted->TooltipValue = "";

			// AnaesthesiaEnded
			$this->AnaesthesiaEnded->LinkCustomAttributes = "";
			$this->AnaesthesiaEnded->HrefValue = "";
			$this->AnaesthesiaEnded->TooltipValue = "";

			// surgeryStarted
			$this->surgeryStarted->LinkCustomAttributes = "";
			$this->surgeryStarted->HrefValue = "";
			$this->surgeryStarted->TooltipValue = "";

			// surgeryEnded
			$this->surgeryEnded->LinkCustomAttributes = "";
			$this->surgeryEnded->HrefValue = "";
			$this->surgeryEnded->TooltipValue = "";

			// RecoveryTime
			$this->RecoveryTime->LinkCustomAttributes = "";
			$this->RecoveryTime->HrefValue = "";
			$this->RecoveryTime->TooltipValue = "";

			// ShiftedTime
			$this->ShiftedTime->LinkCustomAttributes = "";
			$this->ShiftedTime->HrefValue = "";
			$this->ShiftedTime->TooltipValue = "";

			// Duration
			$this->Duration->LinkCustomAttributes = "";
			$this->Duration->HrefValue = "";
			$this->Duration->TooltipValue = "";

			// Surgeon
			$this->Surgeon->LinkCustomAttributes = "";
			$this->Surgeon->HrefValue = "";
			$this->Surgeon->TooltipValue = "";

			// Anaesthetist
			$this->Anaesthetist->LinkCustomAttributes = "";
			$this->Anaesthetist->HrefValue = "";
			$this->Anaesthetist->TooltipValue = "";

			// AsstSurgeon1
			$this->AsstSurgeon1->LinkCustomAttributes = "";
			$this->AsstSurgeon1->HrefValue = "";
			$this->AsstSurgeon1->TooltipValue = "";

			// AsstSurgeon2
			$this->AsstSurgeon2->LinkCustomAttributes = "";
			$this->AsstSurgeon2->HrefValue = "";
			$this->AsstSurgeon2->TooltipValue = "";

			// paediatric
			$this->paediatric->LinkCustomAttributes = "";
			$this->paediatric->HrefValue = "";
			$this->paediatric->TooltipValue = "";

			// ScrubNurse1
			$this->ScrubNurse1->LinkCustomAttributes = "";
			$this->ScrubNurse1->HrefValue = "";
			$this->ScrubNurse1->TooltipValue = "";

			// ScrubNurse2
			$this->ScrubNurse2->LinkCustomAttributes = "";
			$this->ScrubNurse2->HrefValue = "";
			$this->ScrubNurse2->TooltipValue = "";

			// FloorNurse
			$this->FloorNurse->LinkCustomAttributes = "";
			$this->FloorNurse->HrefValue = "";
			$this->FloorNurse->TooltipValue = "";

			// Technician
			$this->Technician->LinkCustomAttributes = "";
			$this->Technician->HrefValue = "";
			$this->Technician->TooltipValue = "";

			// HouseKeeping
			$this->HouseKeeping->LinkCustomAttributes = "";
			$this->HouseKeeping->HrefValue = "";
			$this->HouseKeeping->TooltipValue = "";

			// countsCheckedMops
			$this->countsCheckedMops->LinkCustomAttributes = "";
			$this->countsCheckedMops->HrefValue = "";
			$this->countsCheckedMops->TooltipValue = "";

			// gauze
			$this->gauze->LinkCustomAttributes = "";
			$this->gauze->HrefValue = "";
			$this->gauze->TooltipValue = "";

			// needles
			$this->needles->LinkCustomAttributes = "";
			$this->needles->HrefValue = "";
			$this->needles->TooltipValue = "";

			// bloodloss
			$this->bloodloss->LinkCustomAttributes = "";
			$this->bloodloss->HrefValue = "";
			$this->bloodloss->TooltipValue = "";

			// bloodtransfusion
			$this->bloodtransfusion->LinkCustomAttributes = "";
			$this->bloodtransfusion->HrefValue = "";
			$this->bloodtransfusion->TooltipValue = "";

			// implantsUsed
			$this->implantsUsed->LinkCustomAttributes = "";
			$this->implantsUsed->HrefValue = "";
			$this->implantsUsed->TooltipValue = "";

			// MaterialsForHPE
			$this->MaterialsForHPE->LinkCustomAttributes = "";
			$this->MaterialsForHPE->HrefValue = "";
			$this->MaterialsForHPE->TooltipValue = "";

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

			// HospID
			$this->HospID->LinkCustomAttributes = "";
			$this->HospID->HrefValue = "";
			$this->HospID->TooltipValue = "";

			// PatientSearch
			$this->PatientSearch->LinkCustomAttributes = "";
			$this->PatientSearch->HrefValue = "";
			$this->PatientSearch->TooltipValue = "";

			// Reception
			$this->Reception->LinkCustomAttributes = "";
			$this->Reception->HrefValue = "";
			$this->Reception->TooltipValue = "";

			// PatientID
			$this->PatientID->LinkCustomAttributes = "";
			$this->PatientID->HrefValue = "";
			$this->PatientID->TooltipValue = "";

			// PId
			$this->PId->LinkCustomAttributes = "";
			$this->PId->HrefValue = "";
			$this->PId->TooltipValue = "";
		} elseif ($this->RowType == ROWTYPE_EDIT) { // Edit row

			// id
			$this->id->EditAttrs["class"] = "form-control";
			$this->id->EditCustomAttributes = "";
			$this->id->EditValue = $this->id->CurrentValue;
			$this->id->ViewCustomAttributes = "";

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

			// MobileNumber
			$this->MobileNumber->EditAttrs["class"] = "form-control";
			$this->MobileNumber->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->MobileNumber->CurrentValue = HtmlDecode($this->MobileNumber->CurrentValue);
			$this->MobileNumber->EditValue = HtmlEncode($this->MobileNumber->CurrentValue);
			$this->MobileNumber->PlaceHolder = RemoveHtml($this->MobileNumber->caption());

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

			// diagnosis
			$this->diagnosis->EditAttrs["class"] = "form-control";
			$this->diagnosis->EditCustomAttributes = "";
			$this->diagnosis->EditValue = HtmlEncode($this->diagnosis->CurrentValue);
			$this->diagnosis->PlaceHolder = RemoveHtml($this->diagnosis->caption());

			// proposedSurgery
			$this->proposedSurgery->EditAttrs["class"] = "form-control";
			$this->proposedSurgery->EditCustomAttributes = "";
			$this->proposedSurgery->EditValue = HtmlEncode($this->proposedSurgery->CurrentValue);
			$this->proposedSurgery->PlaceHolder = RemoveHtml($this->proposedSurgery->caption());

			// surgeryProcedure
			$this->surgeryProcedure->EditAttrs["class"] = "form-control";
			$this->surgeryProcedure->EditCustomAttributes = "";
			$this->surgeryProcedure->EditValue = HtmlEncode($this->surgeryProcedure->CurrentValue);
			$this->surgeryProcedure->PlaceHolder = RemoveHtml($this->surgeryProcedure->caption());

			// typeOfAnaesthesia
			$this->typeOfAnaesthesia->EditAttrs["class"] = "form-control";
			$this->typeOfAnaesthesia->EditCustomAttributes = "";
			$this->typeOfAnaesthesia->EditValue = HtmlEncode($this->typeOfAnaesthesia->CurrentValue);
			$this->typeOfAnaesthesia->PlaceHolder = RemoveHtml($this->typeOfAnaesthesia->caption());

			// RecievedTime
			$this->RecievedTime->EditAttrs["class"] = "form-control";
			$this->RecievedTime->EditCustomAttributes = "";
			$this->RecievedTime->EditValue = HtmlEncode(FormatDateTime($this->RecievedTime->CurrentValue, 11));
			$this->RecievedTime->PlaceHolder = RemoveHtml($this->RecievedTime->caption());

			// AnaesthesiaStarted
			$this->AnaesthesiaStarted->EditAttrs["class"] = "form-control";
			$this->AnaesthesiaStarted->EditCustomAttributes = "";
			$this->AnaesthesiaStarted->EditValue = HtmlEncode(FormatDateTime($this->AnaesthesiaStarted->CurrentValue, 11));
			$this->AnaesthesiaStarted->PlaceHolder = RemoveHtml($this->AnaesthesiaStarted->caption());

			// AnaesthesiaEnded
			$this->AnaesthesiaEnded->EditAttrs["class"] = "form-control";
			$this->AnaesthesiaEnded->EditCustomAttributes = "";
			$this->AnaesthesiaEnded->EditValue = HtmlEncode(FormatDateTime($this->AnaesthesiaEnded->CurrentValue, 11));
			$this->AnaesthesiaEnded->PlaceHolder = RemoveHtml($this->AnaesthesiaEnded->caption());

			// surgeryStarted
			$this->surgeryStarted->EditAttrs["class"] = "form-control";
			$this->surgeryStarted->EditCustomAttributes = "";
			$this->surgeryStarted->EditValue = HtmlEncode(FormatDateTime($this->surgeryStarted->CurrentValue, 11));
			$this->surgeryStarted->PlaceHolder = RemoveHtml($this->surgeryStarted->caption());

			// surgeryEnded
			$this->surgeryEnded->EditAttrs["class"] = "form-control";
			$this->surgeryEnded->EditCustomAttributes = "";
			$this->surgeryEnded->EditValue = HtmlEncode(FormatDateTime($this->surgeryEnded->CurrentValue, 17));
			$this->surgeryEnded->PlaceHolder = RemoveHtml($this->surgeryEnded->caption());

			// RecoveryTime
			$this->RecoveryTime->EditAttrs["class"] = "form-control";
			$this->RecoveryTime->EditCustomAttributes = "";
			$this->RecoveryTime->EditValue = HtmlEncode(FormatDateTime($this->RecoveryTime->CurrentValue, 11));
			$this->RecoveryTime->PlaceHolder = RemoveHtml($this->RecoveryTime->caption());

			// ShiftedTime
			$this->ShiftedTime->EditAttrs["class"] = "form-control";
			$this->ShiftedTime->EditCustomAttributes = "";
			$this->ShiftedTime->EditValue = HtmlEncode(FormatDateTime($this->ShiftedTime->CurrentValue, 11));
			$this->ShiftedTime->PlaceHolder = RemoveHtml($this->ShiftedTime->caption());

			// Duration
			$this->Duration->EditAttrs["class"] = "form-control";
			$this->Duration->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Duration->CurrentValue = HtmlDecode($this->Duration->CurrentValue);
			$this->Duration->EditValue = HtmlEncode($this->Duration->CurrentValue);
			$this->Duration->PlaceHolder = RemoveHtml($this->Duration->caption());

			// Surgeon
			$this->Surgeon->EditAttrs["class"] = "form-control";
			$this->Surgeon->EditCustomAttributes = "";
			$curVal = trim(strval($this->Surgeon->CurrentValue));
			if ($curVal <> "")
				$this->Surgeon->ViewValue = $this->Surgeon->lookupCacheOption($curVal);
			else
				$this->Surgeon->ViewValue = $this->Surgeon->Lookup !== NULL && is_array($this->Surgeon->Lookup->Options) ? $curVal : NULL;
			if ($this->Surgeon->ViewValue !== NULL) { // Load from cache
				$this->Surgeon->EditValue = array_values($this->Surgeon->Lookup->Options);
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`NAME`" . SearchString("=", $this->Surgeon->CurrentValue, DATATYPE_STRING, "");
				}
				$sqlWrk = $this->Surgeon->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
				if ($rswrk) $rswrk->Close();
				$this->Surgeon->EditValue = $arwrk;
			}

			// Anaesthetist
			$this->Anaesthetist->EditAttrs["class"] = "form-control";
			$this->Anaesthetist->EditCustomAttributes = "";
			$curVal = trim(strval($this->Anaesthetist->CurrentValue));
			if ($curVal <> "")
				$this->Anaesthetist->ViewValue = $this->Anaesthetist->lookupCacheOption($curVal);
			else
				$this->Anaesthetist->ViewValue = $this->Anaesthetist->Lookup !== NULL && is_array($this->Anaesthetist->Lookup->Options) ? $curVal : NULL;
			if ($this->Anaesthetist->ViewValue !== NULL) { // Load from cache
				$this->Anaesthetist->EditValue = array_values($this->Anaesthetist->Lookup->Options);
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`NAME`" . SearchString("=", $this->Anaesthetist->CurrentValue, DATATYPE_STRING, "");
				}
				$sqlWrk = $this->Anaesthetist->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
				if ($rswrk) $rswrk->Close();
				$this->Anaesthetist->EditValue = $arwrk;
			}

			// AsstSurgeon1
			$this->AsstSurgeon1->EditAttrs["class"] = "form-control";
			$this->AsstSurgeon1->EditCustomAttributes = "";
			$curVal = trim(strval($this->AsstSurgeon1->CurrentValue));
			if ($curVal <> "")
				$this->AsstSurgeon1->ViewValue = $this->AsstSurgeon1->lookupCacheOption($curVal);
			else
				$this->AsstSurgeon1->ViewValue = $this->AsstSurgeon1->Lookup !== NULL && is_array($this->AsstSurgeon1->Lookup->Options) ? $curVal : NULL;
			if ($this->AsstSurgeon1->ViewValue !== NULL) { // Load from cache
				$this->AsstSurgeon1->EditValue = array_values($this->AsstSurgeon1->Lookup->Options);
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`NAME`" . SearchString("=", $this->AsstSurgeon1->CurrentValue, DATATYPE_STRING, "");
				}
				$sqlWrk = $this->AsstSurgeon1->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
				if ($rswrk) $rswrk->Close();
				$this->AsstSurgeon1->EditValue = $arwrk;
			}

			// AsstSurgeon2
			$this->AsstSurgeon2->EditAttrs["class"] = "form-control";
			$this->AsstSurgeon2->EditCustomAttributes = "";
			$curVal = trim(strval($this->AsstSurgeon2->CurrentValue));
			if ($curVal <> "")
				$this->AsstSurgeon2->ViewValue = $this->AsstSurgeon2->lookupCacheOption($curVal);
			else
				$this->AsstSurgeon2->ViewValue = $this->AsstSurgeon2->Lookup !== NULL && is_array($this->AsstSurgeon2->Lookup->Options) ? $curVal : NULL;
			if ($this->AsstSurgeon2->ViewValue !== NULL) { // Load from cache
				$this->AsstSurgeon2->EditValue = array_values($this->AsstSurgeon2->Lookup->Options);
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`NAME`" . SearchString("=", $this->AsstSurgeon2->CurrentValue, DATATYPE_STRING, "");
				}
				$sqlWrk = $this->AsstSurgeon2->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
				if ($rswrk) $rswrk->Close();
				$this->AsstSurgeon2->EditValue = $arwrk;
			}

			// paediatric
			$this->paediatric->EditAttrs["class"] = "form-control";
			$this->paediatric->EditCustomAttributes = "";
			$curVal = trim(strval($this->paediatric->CurrentValue));
			if ($curVal <> "")
				$this->paediatric->ViewValue = $this->paediatric->lookupCacheOption($curVal);
			else
				$this->paediatric->ViewValue = $this->paediatric->Lookup !== NULL && is_array($this->paediatric->Lookup->Options) ? $curVal : NULL;
			if ($this->paediatric->ViewValue !== NULL) { // Load from cache
				$this->paediatric->EditValue = array_values($this->paediatric->Lookup->Options);
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`NAME`" . SearchString("=", $this->paediatric->CurrentValue, DATATYPE_STRING, "");
				}
				$sqlWrk = $this->paediatric->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
				if ($rswrk) $rswrk->Close();
				$this->paediatric->EditValue = $arwrk;
			}

			// ScrubNurse1
			$this->ScrubNurse1->EditAttrs["class"] = "form-control";
			$this->ScrubNurse1->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->ScrubNurse1->CurrentValue = HtmlDecode($this->ScrubNurse1->CurrentValue);
			$this->ScrubNurse1->EditValue = HtmlEncode($this->ScrubNurse1->CurrentValue);
			$this->ScrubNurse1->PlaceHolder = RemoveHtml($this->ScrubNurse1->caption());

			// ScrubNurse2
			$this->ScrubNurse2->EditAttrs["class"] = "form-control";
			$this->ScrubNurse2->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->ScrubNurse2->CurrentValue = HtmlDecode($this->ScrubNurse2->CurrentValue);
			$this->ScrubNurse2->EditValue = HtmlEncode($this->ScrubNurse2->CurrentValue);
			$this->ScrubNurse2->PlaceHolder = RemoveHtml($this->ScrubNurse2->caption());

			// FloorNurse
			$this->FloorNurse->EditAttrs["class"] = "form-control";
			$this->FloorNurse->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->FloorNurse->CurrentValue = HtmlDecode($this->FloorNurse->CurrentValue);
			$this->FloorNurse->EditValue = HtmlEncode($this->FloorNurse->CurrentValue);
			$this->FloorNurse->PlaceHolder = RemoveHtml($this->FloorNurse->caption());

			// Technician
			$this->Technician->EditAttrs["class"] = "form-control";
			$this->Technician->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Technician->CurrentValue = HtmlDecode($this->Technician->CurrentValue);
			$this->Technician->EditValue = HtmlEncode($this->Technician->CurrentValue);
			$this->Technician->PlaceHolder = RemoveHtml($this->Technician->caption());

			// HouseKeeping
			$this->HouseKeeping->EditAttrs["class"] = "form-control";
			$this->HouseKeeping->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->HouseKeeping->CurrentValue = HtmlDecode($this->HouseKeeping->CurrentValue);
			$this->HouseKeeping->EditValue = HtmlEncode($this->HouseKeeping->CurrentValue);
			$this->HouseKeeping->PlaceHolder = RemoveHtml($this->HouseKeeping->caption());

			// countsCheckedMops
			$this->countsCheckedMops->EditAttrs["class"] = "form-control";
			$this->countsCheckedMops->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->countsCheckedMops->CurrentValue = HtmlDecode($this->countsCheckedMops->CurrentValue);
			$this->countsCheckedMops->EditValue = HtmlEncode($this->countsCheckedMops->CurrentValue);
			$this->countsCheckedMops->PlaceHolder = RemoveHtml($this->countsCheckedMops->caption());

			// gauze
			$this->gauze->EditAttrs["class"] = "form-control";
			$this->gauze->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->gauze->CurrentValue = HtmlDecode($this->gauze->CurrentValue);
			$this->gauze->EditValue = HtmlEncode($this->gauze->CurrentValue);
			$this->gauze->PlaceHolder = RemoveHtml($this->gauze->caption());

			// needles
			$this->needles->EditAttrs["class"] = "form-control";
			$this->needles->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->needles->CurrentValue = HtmlDecode($this->needles->CurrentValue);
			$this->needles->EditValue = HtmlEncode($this->needles->CurrentValue);
			$this->needles->PlaceHolder = RemoveHtml($this->needles->caption());

			// bloodloss
			$this->bloodloss->EditAttrs["class"] = "form-control";
			$this->bloodloss->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->bloodloss->CurrentValue = HtmlDecode($this->bloodloss->CurrentValue);
			$this->bloodloss->EditValue = HtmlEncode($this->bloodloss->CurrentValue);
			$this->bloodloss->PlaceHolder = RemoveHtml($this->bloodloss->caption());

			// bloodtransfusion
			$this->bloodtransfusion->EditAttrs["class"] = "form-control";
			$this->bloodtransfusion->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->bloodtransfusion->CurrentValue = HtmlDecode($this->bloodtransfusion->CurrentValue);
			$this->bloodtransfusion->EditValue = HtmlEncode($this->bloodtransfusion->CurrentValue);
			$this->bloodtransfusion->PlaceHolder = RemoveHtml($this->bloodtransfusion->caption());

			// implantsUsed
			$this->implantsUsed->EditAttrs["class"] = "form-control";
			$this->implantsUsed->EditCustomAttributes = "";
			$this->implantsUsed->EditValue = HtmlEncode($this->implantsUsed->CurrentValue);
			$this->implantsUsed->PlaceHolder = RemoveHtml($this->implantsUsed->caption());

			// MaterialsForHPE
			$this->MaterialsForHPE->EditAttrs["class"] = "form-control";
			$this->MaterialsForHPE->EditCustomAttributes = "";
			$this->MaterialsForHPE->EditValue = HtmlEncode($this->MaterialsForHPE->CurrentValue);
			$this->MaterialsForHPE->PlaceHolder = RemoveHtml($this->MaterialsForHPE->caption());

			// status
			// createdby
			// createddatetime
			// modifiedby
			// modifieddatetime
			// HospID
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
					$arwrk[1] = HtmlEncode($rswrk->fields('df'));
					$arwrk[2] = HtmlEncode($rswrk->fields('df2'));
					$arwrk[3] = HtmlEncode(FormatNumber($rswrk->fields('df3'), 0, -2, -2, -2));
					$arwrk[4] = HtmlEncode($rswrk->fields('df4'));
					$this->PatientSearch->ViewValue = $this->PatientSearch->displayValue($arwrk);
				} else {
					$this->PatientSearch->ViewValue = $Language->phrase("PleaseSelect");
				}
				$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
				if ($rswrk) $rswrk->Close();
				$rowcnt = count($arwrk);
				for ($i = 0; $i < $rowcnt; $i++) {
					$arwrk[$i][3] = FormatNumber($arwrk[$i][3], 0, -2, -2, -2);
				}
				$this->PatientSearch->EditValue = $arwrk;
			}

			// Reception
			$this->Reception->EditAttrs["class"] = "form-control";
			$this->Reception->EditCustomAttributes = "";
			if ($this->Reception->getSessionValue() <> "") {
				$this->Reception->CurrentValue = $this->Reception->getSessionValue();
			$this->Reception->ViewValue = $this->Reception->CurrentValue;
			$this->Reception->ViewValue = FormatNumber($this->Reception->ViewValue, 0, -2, -2, -2);
			$this->Reception->ViewCustomAttributes = "";
			} else {
			$this->Reception->EditValue = HtmlEncode($this->Reception->CurrentValue);
			$this->Reception->PlaceHolder = RemoveHtml($this->Reception->caption());
			}

			// PatientID
			$this->PatientID->EditAttrs["class"] = "form-control";
			$this->PatientID->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->PatientID->CurrentValue = HtmlDecode($this->PatientID->CurrentValue);
			$this->PatientID->EditValue = HtmlEncode($this->PatientID->CurrentValue);
			$this->PatientID->PlaceHolder = RemoveHtml($this->PatientID->caption());

			// PId
			$this->PId->EditAttrs["class"] = "form-control";
			$this->PId->EditCustomAttributes = "";
			if ($this->PId->getSessionValue() <> "") {
				$this->PId->CurrentValue = $this->PId->getSessionValue();
			$this->PId->ViewValue = $this->PId->CurrentValue;
			$this->PId->ViewValue = FormatNumber($this->PId->ViewValue, 0, -2, -2, -2);
			$this->PId->ViewCustomAttributes = "";
			} else {
			$this->PId->EditValue = HtmlEncode($this->PId->CurrentValue);
			$this->PId->PlaceHolder = RemoveHtml($this->PId->caption());
			}

			// Edit refer script
			// id

			$this->id->LinkCustomAttributes = "";
			$this->id->HrefValue = "";

			// PatID
			$this->PatID->LinkCustomAttributes = "";
			$this->PatID->HrefValue = "";

			// PatientName
			$this->PatientName->LinkCustomAttributes = "";
			$this->PatientName->HrefValue = "";

			// mrnno
			$this->mrnno->LinkCustomAttributes = "";
			$this->mrnno->HrefValue = "";

			// MobileNumber
			$this->MobileNumber->LinkCustomAttributes = "";
			$this->MobileNumber->HrefValue = "";

			// Age
			$this->Age->LinkCustomAttributes = "";
			$this->Age->HrefValue = "";

			// Gender
			$this->Gender->LinkCustomAttributes = "";
			$this->Gender->HrefValue = "";

			// profilePic
			$this->profilePic->LinkCustomAttributes = "";
			$this->profilePic->HrefValue = "";

			// diagnosis
			$this->diagnosis->LinkCustomAttributes = "";
			$this->diagnosis->HrefValue = "";

			// proposedSurgery
			$this->proposedSurgery->LinkCustomAttributes = "";
			$this->proposedSurgery->HrefValue = "";

			// surgeryProcedure
			$this->surgeryProcedure->LinkCustomAttributes = "";
			$this->surgeryProcedure->HrefValue = "";

			// typeOfAnaesthesia
			$this->typeOfAnaesthesia->LinkCustomAttributes = "";
			$this->typeOfAnaesthesia->HrefValue = "";

			// RecievedTime
			$this->RecievedTime->LinkCustomAttributes = "";
			$this->RecievedTime->HrefValue = "";

			// AnaesthesiaStarted
			$this->AnaesthesiaStarted->LinkCustomAttributes = "";
			$this->AnaesthesiaStarted->HrefValue = "";

			// AnaesthesiaEnded
			$this->AnaesthesiaEnded->LinkCustomAttributes = "";
			$this->AnaesthesiaEnded->HrefValue = "";

			// surgeryStarted
			$this->surgeryStarted->LinkCustomAttributes = "";
			$this->surgeryStarted->HrefValue = "";

			// surgeryEnded
			$this->surgeryEnded->LinkCustomAttributes = "";
			$this->surgeryEnded->HrefValue = "";

			// RecoveryTime
			$this->RecoveryTime->LinkCustomAttributes = "";
			$this->RecoveryTime->HrefValue = "";

			// ShiftedTime
			$this->ShiftedTime->LinkCustomAttributes = "";
			$this->ShiftedTime->HrefValue = "";

			// Duration
			$this->Duration->LinkCustomAttributes = "";
			$this->Duration->HrefValue = "";

			// Surgeon
			$this->Surgeon->LinkCustomAttributes = "";
			$this->Surgeon->HrefValue = "";

			// Anaesthetist
			$this->Anaesthetist->LinkCustomAttributes = "";
			$this->Anaesthetist->HrefValue = "";

			// AsstSurgeon1
			$this->AsstSurgeon1->LinkCustomAttributes = "";
			$this->AsstSurgeon1->HrefValue = "";

			// AsstSurgeon2
			$this->AsstSurgeon2->LinkCustomAttributes = "";
			$this->AsstSurgeon2->HrefValue = "";

			// paediatric
			$this->paediatric->LinkCustomAttributes = "";
			$this->paediatric->HrefValue = "";

			// ScrubNurse1
			$this->ScrubNurse1->LinkCustomAttributes = "";
			$this->ScrubNurse1->HrefValue = "";

			// ScrubNurse2
			$this->ScrubNurse2->LinkCustomAttributes = "";
			$this->ScrubNurse2->HrefValue = "";

			// FloorNurse
			$this->FloorNurse->LinkCustomAttributes = "";
			$this->FloorNurse->HrefValue = "";

			// Technician
			$this->Technician->LinkCustomAttributes = "";
			$this->Technician->HrefValue = "";

			// HouseKeeping
			$this->HouseKeeping->LinkCustomAttributes = "";
			$this->HouseKeeping->HrefValue = "";

			// countsCheckedMops
			$this->countsCheckedMops->LinkCustomAttributes = "";
			$this->countsCheckedMops->HrefValue = "";

			// gauze
			$this->gauze->LinkCustomAttributes = "";
			$this->gauze->HrefValue = "";

			// needles
			$this->needles->LinkCustomAttributes = "";
			$this->needles->HrefValue = "";

			// bloodloss
			$this->bloodloss->LinkCustomAttributes = "";
			$this->bloodloss->HrefValue = "";

			// bloodtransfusion
			$this->bloodtransfusion->LinkCustomAttributes = "";
			$this->bloodtransfusion->HrefValue = "";

			// implantsUsed
			$this->implantsUsed->LinkCustomAttributes = "";
			$this->implantsUsed->HrefValue = "";

			// MaterialsForHPE
			$this->MaterialsForHPE->LinkCustomAttributes = "";
			$this->MaterialsForHPE->HrefValue = "";

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

			// HospID
			$this->HospID->LinkCustomAttributes = "";
			$this->HospID->HrefValue = "";

			// PatientSearch
			$this->PatientSearch->LinkCustomAttributes = "";
			$this->PatientSearch->HrefValue = "";

			// Reception
			$this->Reception->LinkCustomAttributes = "";
			$this->Reception->HrefValue = "";

			// PatientID
			$this->PatientID->LinkCustomAttributes = "";
			$this->PatientID->HrefValue = "";

			// PId
			$this->PId->LinkCustomAttributes = "";
			$this->PId->HrefValue = "";
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
		if ($this->mrnno->Required) {
			if (!$this->mrnno->IsDetailKey && $this->mrnno->FormValue != NULL && $this->mrnno->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->mrnno->caption(), $this->mrnno->RequiredErrorMessage));
			}
		}
		if ($this->MobileNumber->Required) {
			if (!$this->MobileNumber->IsDetailKey && $this->MobileNumber->FormValue != NULL && $this->MobileNumber->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->MobileNumber->caption(), $this->MobileNumber->RequiredErrorMessage));
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
		if ($this->diagnosis->Required) {
			if (!$this->diagnosis->IsDetailKey && $this->diagnosis->FormValue != NULL && $this->diagnosis->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->diagnosis->caption(), $this->diagnosis->RequiredErrorMessage));
			}
		}
		if ($this->proposedSurgery->Required) {
			if (!$this->proposedSurgery->IsDetailKey && $this->proposedSurgery->FormValue != NULL && $this->proposedSurgery->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->proposedSurgery->caption(), $this->proposedSurgery->RequiredErrorMessage));
			}
		}
		if ($this->surgeryProcedure->Required) {
			if (!$this->surgeryProcedure->IsDetailKey && $this->surgeryProcedure->FormValue != NULL && $this->surgeryProcedure->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->surgeryProcedure->caption(), $this->surgeryProcedure->RequiredErrorMessage));
			}
		}
		if ($this->typeOfAnaesthesia->Required) {
			if (!$this->typeOfAnaesthesia->IsDetailKey && $this->typeOfAnaesthesia->FormValue != NULL && $this->typeOfAnaesthesia->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->typeOfAnaesthesia->caption(), $this->typeOfAnaesthesia->RequiredErrorMessage));
			}
		}
		if ($this->RecievedTime->Required) {
			if (!$this->RecievedTime->IsDetailKey && $this->RecievedTime->FormValue != NULL && $this->RecievedTime->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->RecievedTime->caption(), $this->RecievedTime->RequiredErrorMessage));
			}
		}
		if (!CheckEuroDate($this->RecievedTime->FormValue)) {
			AddMessage($FormError, $this->RecievedTime->errorMessage());
		}
		if ($this->AnaesthesiaStarted->Required) {
			if (!$this->AnaesthesiaStarted->IsDetailKey && $this->AnaesthesiaStarted->FormValue != NULL && $this->AnaesthesiaStarted->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->AnaesthesiaStarted->caption(), $this->AnaesthesiaStarted->RequiredErrorMessage));
			}
		}
		if (!CheckEuroDate($this->AnaesthesiaStarted->FormValue)) {
			AddMessage($FormError, $this->AnaesthesiaStarted->errorMessage());
		}
		if ($this->AnaesthesiaEnded->Required) {
			if (!$this->AnaesthesiaEnded->IsDetailKey && $this->AnaesthesiaEnded->FormValue != NULL && $this->AnaesthesiaEnded->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->AnaesthesiaEnded->caption(), $this->AnaesthesiaEnded->RequiredErrorMessage));
			}
		}
		if (!CheckEuroDate($this->AnaesthesiaEnded->FormValue)) {
			AddMessage($FormError, $this->AnaesthesiaEnded->errorMessage());
		}
		if ($this->surgeryStarted->Required) {
			if (!$this->surgeryStarted->IsDetailKey && $this->surgeryStarted->FormValue != NULL && $this->surgeryStarted->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->surgeryStarted->caption(), $this->surgeryStarted->RequiredErrorMessage));
			}
		}
		if (!CheckEuroDate($this->surgeryStarted->FormValue)) {
			AddMessage($FormError, $this->surgeryStarted->errorMessage());
		}
		if ($this->surgeryEnded->Required) {
			if (!$this->surgeryEnded->IsDetailKey && $this->surgeryEnded->FormValue != NULL && $this->surgeryEnded->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->surgeryEnded->caption(), $this->surgeryEnded->RequiredErrorMessage));
			}
		}
		if (!CheckShortEuroDate($this->surgeryEnded->FormValue)) {
			AddMessage($FormError, $this->surgeryEnded->errorMessage());
		}
		if ($this->RecoveryTime->Required) {
			if (!$this->RecoveryTime->IsDetailKey && $this->RecoveryTime->FormValue != NULL && $this->RecoveryTime->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->RecoveryTime->caption(), $this->RecoveryTime->RequiredErrorMessage));
			}
		}
		if (!CheckEuroDate($this->RecoveryTime->FormValue)) {
			AddMessage($FormError, $this->RecoveryTime->errorMessage());
		}
		if ($this->ShiftedTime->Required) {
			if (!$this->ShiftedTime->IsDetailKey && $this->ShiftedTime->FormValue != NULL && $this->ShiftedTime->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->ShiftedTime->caption(), $this->ShiftedTime->RequiredErrorMessage));
			}
		}
		if (!CheckEuroDate($this->ShiftedTime->FormValue)) {
			AddMessage($FormError, $this->ShiftedTime->errorMessage());
		}
		if ($this->Duration->Required) {
			if (!$this->Duration->IsDetailKey && $this->Duration->FormValue != NULL && $this->Duration->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Duration->caption(), $this->Duration->RequiredErrorMessage));
			}
		}
		if ($this->Surgeon->Required) {
			if (!$this->Surgeon->IsDetailKey && $this->Surgeon->FormValue != NULL && $this->Surgeon->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Surgeon->caption(), $this->Surgeon->RequiredErrorMessage));
			}
		}
		if ($this->Anaesthetist->Required) {
			if (!$this->Anaesthetist->IsDetailKey && $this->Anaesthetist->FormValue != NULL && $this->Anaesthetist->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Anaesthetist->caption(), $this->Anaesthetist->RequiredErrorMessage));
			}
		}
		if ($this->AsstSurgeon1->Required) {
			if (!$this->AsstSurgeon1->IsDetailKey && $this->AsstSurgeon1->FormValue != NULL && $this->AsstSurgeon1->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->AsstSurgeon1->caption(), $this->AsstSurgeon1->RequiredErrorMessage));
			}
		}
		if ($this->AsstSurgeon2->Required) {
			if (!$this->AsstSurgeon2->IsDetailKey && $this->AsstSurgeon2->FormValue != NULL && $this->AsstSurgeon2->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->AsstSurgeon2->caption(), $this->AsstSurgeon2->RequiredErrorMessage));
			}
		}
		if ($this->paediatric->Required) {
			if (!$this->paediatric->IsDetailKey && $this->paediatric->FormValue != NULL && $this->paediatric->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->paediatric->caption(), $this->paediatric->RequiredErrorMessage));
			}
		}
		if ($this->ScrubNurse1->Required) {
			if (!$this->ScrubNurse1->IsDetailKey && $this->ScrubNurse1->FormValue != NULL && $this->ScrubNurse1->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->ScrubNurse1->caption(), $this->ScrubNurse1->RequiredErrorMessage));
			}
		}
		if ($this->ScrubNurse2->Required) {
			if (!$this->ScrubNurse2->IsDetailKey && $this->ScrubNurse2->FormValue != NULL && $this->ScrubNurse2->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->ScrubNurse2->caption(), $this->ScrubNurse2->RequiredErrorMessage));
			}
		}
		if ($this->FloorNurse->Required) {
			if (!$this->FloorNurse->IsDetailKey && $this->FloorNurse->FormValue != NULL && $this->FloorNurse->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->FloorNurse->caption(), $this->FloorNurse->RequiredErrorMessage));
			}
		}
		if ($this->Technician->Required) {
			if (!$this->Technician->IsDetailKey && $this->Technician->FormValue != NULL && $this->Technician->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Technician->caption(), $this->Technician->RequiredErrorMessage));
			}
		}
		if ($this->HouseKeeping->Required) {
			if (!$this->HouseKeeping->IsDetailKey && $this->HouseKeeping->FormValue != NULL && $this->HouseKeeping->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->HouseKeeping->caption(), $this->HouseKeeping->RequiredErrorMessage));
			}
		}
		if ($this->countsCheckedMops->Required) {
			if (!$this->countsCheckedMops->IsDetailKey && $this->countsCheckedMops->FormValue != NULL && $this->countsCheckedMops->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->countsCheckedMops->caption(), $this->countsCheckedMops->RequiredErrorMessage));
			}
		}
		if ($this->gauze->Required) {
			if (!$this->gauze->IsDetailKey && $this->gauze->FormValue != NULL && $this->gauze->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->gauze->caption(), $this->gauze->RequiredErrorMessage));
			}
		}
		if ($this->needles->Required) {
			if (!$this->needles->IsDetailKey && $this->needles->FormValue != NULL && $this->needles->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->needles->caption(), $this->needles->RequiredErrorMessage));
			}
		}
		if ($this->bloodloss->Required) {
			if (!$this->bloodloss->IsDetailKey && $this->bloodloss->FormValue != NULL && $this->bloodloss->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->bloodloss->caption(), $this->bloodloss->RequiredErrorMessage));
			}
		}
		if ($this->bloodtransfusion->Required) {
			if (!$this->bloodtransfusion->IsDetailKey && $this->bloodtransfusion->FormValue != NULL && $this->bloodtransfusion->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->bloodtransfusion->caption(), $this->bloodtransfusion->RequiredErrorMessage));
			}
		}
		if ($this->implantsUsed->Required) {
			if (!$this->implantsUsed->IsDetailKey && $this->implantsUsed->FormValue != NULL && $this->implantsUsed->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->implantsUsed->caption(), $this->implantsUsed->RequiredErrorMessage));
			}
		}
		if ($this->MaterialsForHPE->Required) {
			if (!$this->MaterialsForHPE->IsDetailKey && $this->MaterialsForHPE->FormValue != NULL && $this->MaterialsForHPE->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->MaterialsForHPE->caption(), $this->MaterialsForHPE->RequiredErrorMessage));
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
		if ($this->HospID->Required) {
			if (!$this->HospID->IsDetailKey && $this->HospID->FormValue != NULL && $this->HospID->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->HospID->caption(), $this->HospID->RequiredErrorMessage));
			}
		}
		if ($this->PatientSearch->Required) {
			if (!$this->PatientSearch->IsDetailKey && $this->PatientSearch->FormValue != NULL && $this->PatientSearch->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PatientSearch->caption(), $this->PatientSearch->RequiredErrorMessage));
			}
		}
		if ($this->Reception->Required) {
			if (!$this->Reception->IsDetailKey && $this->Reception->FormValue != NULL && $this->Reception->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Reception->caption(), $this->Reception->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->Reception->FormValue)) {
			AddMessage($FormError, $this->Reception->errorMessage());
		}
		if ($this->PatientID->Required) {
			if (!$this->PatientID->IsDetailKey && $this->PatientID->FormValue != NULL && $this->PatientID->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PatientID->caption(), $this->PatientID->RequiredErrorMessage));
			}
		}
		if ($this->PId->Required) {
			if (!$this->PId->IsDetailKey && $this->PId->FormValue != NULL && $this->PId->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PId->caption(), $this->PId->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->PId->FormValue)) {
			AddMessage($FormError, $this->PId->errorMessage());
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

			// PatID
			$this->PatID->setDbValueDef($rsnew, $this->PatID->CurrentValue, NULL, $this->PatID->ReadOnly);

			// PatientName
			$this->PatientName->setDbValueDef($rsnew, $this->PatientName->CurrentValue, NULL, $this->PatientName->ReadOnly);

			// mrnno
			$this->mrnno->setDbValueDef($rsnew, $this->mrnno->CurrentValue, NULL, $this->mrnno->ReadOnly);

			// MobileNumber
			$this->MobileNumber->setDbValueDef($rsnew, $this->MobileNumber->CurrentValue, NULL, $this->MobileNumber->ReadOnly);

			// Age
			$this->Age->setDbValueDef($rsnew, $this->Age->CurrentValue, NULL, $this->Age->ReadOnly);

			// Gender
			$this->Gender->setDbValueDef($rsnew, $this->Gender->CurrentValue, NULL, $this->Gender->ReadOnly);

			// profilePic
			$this->profilePic->setDbValueDef($rsnew, $this->profilePic->CurrentValue, NULL, $this->profilePic->ReadOnly);

			// diagnosis
			$this->diagnosis->setDbValueDef($rsnew, $this->diagnosis->CurrentValue, NULL, $this->diagnosis->ReadOnly);

			// proposedSurgery
			$this->proposedSurgery->setDbValueDef($rsnew, $this->proposedSurgery->CurrentValue, NULL, $this->proposedSurgery->ReadOnly);

			// surgeryProcedure
			$this->surgeryProcedure->setDbValueDef($rsnew, $this->surgeryProcedure->CurrentValue, NULL, $this->surgeryProcedure->ReadOnly);

			// typeOfAnaesthesia
			$this->typeOfAnaesthesia->setDbValueDef($rsnew, $this->typeOfAnaesthesia->CurrentValue, NULL, $this->typeOfAnaesthesia->ReadOnly);

			// RecievedTime
			$this->RecievedTime->setDbValueDef($rsnew, UnFormatDateTime($this->RecievedTime->CurrentValue, 11), NULL, $this->RecievedTime->ReadOnly);

			// AnaesthesiaStarted
			$this->AnaesthesiaStarted->setDbValueDef($rsnew, UnFormatDateTime($this->AnaesthesiaStarted->CurrentValue, 11), NULL, $this->AnaesthesiaStarted->ReadOnly);

			// AnaesthesiaEnded
			$this->AnaesthesiaEnded->setDbValueDef($rsnew, UnFormatDateTime($this->AnaesthesiaEnded->CurrentValue, 11), NULL, $this->AnaesthesiaEnded->ReadOnly);

			// surgeryStarted
			$this->surgeryStarted->setDbValueDef($rsnew, UnFormatDateTime($this->surgeryStarted->CurrentValue, 11), NULL, $this->surgeryStarted->ReadOnly);

			// surgeryEnded
			$this->surgeryEnded->setDbValueDef($rsnew, UnFormatDateTime($this->surgeryEnded->CurrentValue, 17), NULL, $this->surgeryEnded->ReadOnly);

			// RecoveryTime
			$this->RecoveryTime->setDbValueDef($rsnew, UnFormatDateTime($this->RecoveryTime->CurrentValue, 11), NULL, $this->RecoveryTime->ReadOnly);

			// ShiftedTime
			$this->ShiftedTime->setDbValueDef($rsnew, UnFormatDateTime($this->ShiftedTime->CurrentValue, 11), NULL, $this->ShiftedTime->ReadOnly);

			// Duration
			$this->Duration->setDbValueDef($rsnew, $this->Duration->CurrentValue, NULL, $this->Duration->ReadOnly);

			// Surgeon
			$this->Surgeon->setDbValueDef($rsnew, $this->Surgeon->CurrentValue, NULL, $this->Surgeon->ReadOnly);

			// Anaesthetist
			$this->Anaesthetist->setDbValueDef($rsnew, $this->Anaesthetist->CurrentValue, NULL, $this->Anaesthetist->ReadOnly);

			// AsstSurgeon1
			$this->AsstSurgeon1->setDbValueDef($rsnew, $this->AsstSurgeon1->CurrentValue, NULL, $this->AsstSurgeon1->ReadOnly);

			// AsstSurgeon2
			$this->AsstSurgeon2->setDbValueDef($rsnew, $this->AsstSurgeon2->CurrentValue, NULL, $this->AsstSurgeon2->ReadOnly);

			// paediatric
			$this->paediatric->setDbValueDef($rsnew, $this->paediatric->CurrentValue, NULL, $this->paediatric->ReadOnly);

			// ScrubNurse1
			$this->ScrubNurse1->setDbValueDef($rsnew, $this->ScrubNurse1->CurrentValue, NULL, $this->ScrubNurse1->ReadOnly);

			// ScrubNurse2
			$this->ScrubNurse2->setDbValueDef($rsnew, $this->ScrubNurse2->CurrentValue, NULL, $this->ScrubNurse2->ReadOnly);

			// FloorNurse
			$this->FloorNurse->setDbValueDef($rsnew, $this->FloorNurse->CurrentValue, NULL, $this->FloorNurse->ReadOnly);

			// Technician
			$this->Technician->setDbValueDef($rsnew, $this->Technician->CurrentValue, NULL, $this->Technician->ReadOnly);

			// HouseKeeping
			$this->HouseKeeping->setDbValueDef($rsnew, $this->HouseKeeping->CurrentValue, NULL, $this->HouseKeeping->ReadOnly);

			// countsCheckedMops
			$this->countsCheckedMops->setDbValueDef($rsnew, $this->countsCheckedMops->CurrentValue, NULL, $this->countsCheckedMops->ReadOnly);

			// gauze
			$this->gauze->setDbValueDef($rsnew, $this->gauze->CurrentValue, NULL, $this->gauze->ReadOnly);

			// needles
			$this->needles->setDbValueDef($rsnew, $this->needles->CurrentValue, NULL, $this->needles->ReadOnly);

			// bloodloss
			$this->bloodloss->setDbValueDef($rsnew, $this->bloodloss->CurrentValue, NULL, $this->bloodloss->ReadOnly);

			// bloodtransfusion
			$this->bloodtransfusion->setDbValueDef($rsnew, $this->bloodtransfusion->CurrentValue, NULL, $this->bloodtransfusion->ReadOnly);

			// implantsUsed
			$this->implantsUsed->setDbValueDef($rsnew, $this->implantsUsed->CurrentValue, NULL, $this->implantsUsed->ReadOnly);

			// MaterialsForHPE
			$this->MaterialsForHPE->setDbValueDef($rsnew, $this->MaterialsForHPE->CurrentValue, NULL, $this->MaterialsForHPE->ReadOnly);

			// status
			$this->status->setDbValueDef($rsnew, ActiveStatusbit(), NULL);
			$rsnew['status'] = &$this->status->DbValue;

			// createdby
			$this->createdby->setDbValueDef($rsnew, CurrentUserName(), NULL);
			$rsnew['createdby'] = &$this->createdby->DbValue;

			// createddatetime
			$this->createddatetime->setDbValueDef($rsnew, CurrentDateTime(), NULL);
			$rsnew['createddatetime'] = &$this->createddatetime->DbValue;

			// modifiedby
			$this->modifiedby->setDbValueDef($rsnew, CurrentUserName(), NULL);
			$rsnew['modifiedby'] = &$this->modifiedby->DbValue;

			// modifieddatetime
			$this->modifieddatetime->setDbValueDef($rsnew, CurrentDateTime(), NULL);
			$rsnew['modifieddatetime'] = &$this->modifieddatetime->DbValue;

			// HospID
			$this->HospID->setDbValueDef($rsnew, HospitalID(), NULL);
			$rsnew['HospID'] = &$this->HospID->DbValue;

			// PatientSearch
			$this->PatientSearch->setDbValueDef($rsnew, $this->PatientSearch->CurrentValue, "", $this->PatientSearch->ReadOnly);

			// Reception
			$this->Reception->setDbValueDef($rsnew, $this->Reception->CurrentValue, NULL, $this->Reception->ReadOnly);

			// PatientID
			$this->PatientID->setDbValueDef($rsnew, $this->PatientID->CurrentValue, NULL, $this->PatientID->ReadOnly);

			// PId
			$this->PId->setDbValueDef($rsnew, $this->PId->CurrentValue, NULL, $this->PId->ReadOnly);

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
				if (Get("fk_mrnNo") !== NULL) {
					$this->mrnno->setQueryStringValue(Get("fk_mrnNo"));
					$this->mrnno->setSessionValue($this->mrnno->QueryStringValue);
				} else {
					$validMaster = FALSE;
				}
				if (Get("fk_patient_id") !== NULL) {
					$this->PId->setQueryStringValue(Get("fk_patient_id"));
					$this->PId->setSessionValue($this->PId->QueryStringValue);
					if (!is_numeric($this->PId->QueryStringValue))
						$validMaster = FALSE;
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
				if (Post("fk_mrnNo") !== NULL) {
					$this->mrnno->setFormValue(Post("fk_mrnNo"));
					$this->mrnno->setSessionValue($this->mrnno->FormValue);
				} else {
					$validMaster = FALSE;
				}
				if (Post("fk_patient_id") !== NULL) {
					$this->PId->setFormValue(Post("fk_patient_id"));
					$this->PId->setSessionValue($this->PId->FormValue);
					if (!is_numeric($this->PId->FormValue))
						$validMaster = FALSE;
				} else {
					$validMaster = FALSE;
				}
			}
		}
		if ($validMaster) {

			// Save current master table
			$this->setCurrentMasterTable($masterTblVar);
			$this->setSessionWhere($this->getDetailFilter());

			// Reset start record counter (new master key)
			if (!$this->isAddOrEdit()) {
				$this->StartRec = 1;
				$this->setStartRecordNumber($this->StartRec);
			}

			// Clear previous master key from Session
			if ($masterTblVar <> "ip_admission") {
				if ($this->Reception->CurrentValue == "")
					$this->Reception->setSessionValue("");
				if ($this->mrnno->CurrentValue == "")
					$this->mrnno->setSessionValue("");
				if ($this->PId->CurrentValue == "")
					$this->PId->setSessionValue("");
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
		$Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("patient_ot_surgery_registerlist.php"), "", $this->TableVar, TRUE);
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
						case "x_Surgeon":
							break;
						case "x_Anaesthetist":
							break;
						case "x_AsstSurgeon1":
							break;
						case "x_AsstSurgeon2":
							break;
						case "x_paediatric":
							break;
						case "x_PatientSearch":
							$row[3] = FormatNumber($row[3], 0, -2, -2, -2);
							$row['df3'] = $row[3];
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
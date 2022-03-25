<?php
namespace PHPMaker2019\HIMS;

/**
 * Page class
 */
class patient_vitals_edit extends patient_vitals
{

	// Page ID
	public $PageID = "edit";

	// Project ID
	public $ProjectID = "{EA4F6D13-AF8F-428D-9EA7-BA88D1107EC3}";

	// Table name
	public $TableName = 'patient_vitals';

	// Page object name
	public $PageObjName = "patient_vitals_edit";

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

		// Table object (patient_vitals)
		if (!isset($GLOBALS["patient_vitals"]) || get_class($GLOBALS["patient_vitals"]) == PROJECT_NAMESPACE . "patient_vitals") {
			$GLOBALS["patient_vitals"] = &$this;
			$GLOBALS["Table"] = &$GLOBALS["patient_vitals"];
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
			define(PROJECT_NAMESPACE . "TABLE_NAME", 'patient_vitals');

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
		global $EXPORT, $patient_vitals;
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
				$doc = new $class($patient_vitals);
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
					if ($pageName == "patient_vitalsview.php")
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
					$this->terminate(GetUrl("patient_vitalslist.php"));
				else
					$this->terminate(GetUrl("login.php"));
				return;
			}
		}

		// Create form object
		$CurrentForm = new HttpForm();
		$this->CurrentAction = Param("action"); // Set up current action
		$this->id->setVisibility();
		$this->mrnno->setVisibility();
		$this->PatientName->setVisibility();
		$this->PatID->setVisibility();
		$this->MobileNumber->setVisibility();
		$this->profilePic->setVisibility();
		$this->HT->setVisibility();
		$this->WT->setVisibility();
		$this->SurfaceArea->setVisibility();
		$this->BodyMassIndex->setVisibility();
		$this->ClinicalFindings->setVisibility();
		$this->ClinicalDiagnosis->setVisibility();
		$this->AnticoagulantifAny->setVisibility();
		$this->FoodAllergies->setVisibility();
		$this->GenericAllergies->setVisibility();
		$this->GroupAllergies->setVisibility();
		$this->Temp->setVisibility();
		$this->Pulse->setVisibility();
		$this->BP->setVisibility();
		$this->PR->setVisibility();
		$this->CNS->setVisibility();
		$this->RSA->setVisibility();
		$this->CVS->setVisibility();
		$this->PA->setVisibility();
		$this->PS->setVisibility();
		$this->PV->setVisibility();
		$this->clinicaldetails->setVisibility();
		$this->status->setVisibility();
		$this->createdby->Visible = FALSE;
		$this->createddatetime->Visible = FALSE;
		$this->modifiedby->setVisibility();
		$this->modifieddatetime->setVisibility();
		$this->Age->setVisibility();
		$this->Gender->setVisibility();
		$this->PatientSearch->setVisibility();
		$this->PatientId->setVisibility();
		$this->Reception->setVisibility();
		$this->HospID->setVisibility();
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
		$this->setupLookupOptions($this->AnticoagulantifAny);
		$this->setupLookupOptions($this->GenericAllergies);
		$this->setupLookupOptions($this->GroupAllergies);
		$this->setupLookupOptions($this->clinicaldetails);
		$this->setupLookupOptions($this->status);
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
					$this->terminate("patient_vitalslist.php"); // No matching record, return to list
				}
				break;
			case "update": // Update
				$returnUrl = $this->getReturnUrl();
				if (GetPageName($returnUrl) == "patient_vitalslist.php")
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

		// Check field name 'mrnno' first before field var 'x_mrnno'
		$val = $CurrentForm->hasValue("mrnno") ? $CurrentForm->getValue("mrnno") : $CurrentForm->getValue("x_mrnno");
		if (!$this->mrnno->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->mrnno->Visible = FALSE; // Disable update for API request
			else
				$this->mrnno->setFormValue($val);
		}

		// Check field name 'PatientName' first before field var 'x_PatientName'
		$val = $CurrentForm->hasValue("PatientName") ? $CurrentForm->getValue("PatientName") : $CurrentForm->getValue("x_PatientName");
		if (!$this->PatientName->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->PatientName->Visible = FALSE; // Disable update for API request
			else
				$this->PatientName->setFormValue($val);
		}

		// Check field name 'PatID' first before field var 'x_PatID'
		$val = $CurrentForm->hasValue("PatID") ? $CurrentForm->getValue("PatID") : $CurrentForm->getValue("x_PatID");
		if (!$this->PatID->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->PatID->Visible = FALSE; // Disable update for API request
			else
				$this->PatID->setFormValue($val);
		}

		// Check field name 'MobileNumber' first before field var 'x_MobileNumber'
		$val = $CurrentForm->hasValue("MobileNumber") ? $CurrentForm->getValue("MobileNumber") : $CurrentForm->getValue("x_MobileNumber");
		if (!$this->MobileNumber->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->MobileNumber->Visible = FALSE; // Disable update for API request
			else
				$this->MobileNumber->setFormValue($val);
		}

		// Check field name 'profilePic' first before field var 'x_profilePic'
		$val = $CurrentForm->hasValue("profilePic") ? $CurrentForm->getValue("profilePic") : $CurrentForm->getValue("x_profilePic");
		if (!$this->profilePic->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->profilePic->Visible = FALSE; // Disable update for API request
			else
				$this->profilePic->setFormValue($val);
		}

		// Check field name 'HT' first before field var 'x_HT'
		$val = $CurrentForm->hasValue("HT") ? $CurrentForm->getValue("HT") : $CurrentForm->getValue("x_HT");
		if (!$this->HT->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->HT->Visible = FALSE; // Disable update for API request
			else
				$this->HT->setFormValue($val);
		}

		// Check field name 'WT' first before field var 'x_WT'
		$val = $CurrentForm->hasValue("WT") ? $CurrentForm->getValue("WT") : $CurrentForm->getValue("x_WT");
		if (!$this->WT->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->WT->Visible = FALSE; // Disable update for API request
			else
				$this->WT->setFormValue($val);
		}

		// Check field name 'SurfaceArea' first before field var 'x_SurfaceArea'
		$val = $CurrentForm->hasValue("SurfaceArea") ? $CurrentForm->getValue("SurfaceArea") : $CurrentForm->getValue("x_SurfaceArea");
		if (!$this->SurfaceArea->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->SurfaceArea->Visible = FALSE; // Disable update for API request
			else
				$this->SurfaceArea->setFormValue($val);
		}

		// Check field name 'BodyMassIndex' first before field var 'x_BodyMassIndex'
		$val = $CurrentForm->hasValue("BodyMassIndex") ? $CurrentForm->getValue("BodyMassIndex") : $CurrentForm->getValue("x_BodyMassIndex");
		if (!$this->BodyMassIndex->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->BodyMassIndex->Visible = FALSE; // Disable update for API request
			else
				$this->BodyMassIndex->setFormValue($val);
		}

		// Check field name 'ClinicalFindings' first before field var 'x_ClinicalFindings'
		$val = $CurrentForm->hasValue("ClinicalFindings") ? $CurrentForm->getValue("ClinicalFindings") : $CurrentForm->getValue("x_ClinicalFindings");
		if (!$this->ClinicalFindings->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->ClinicalFindings->Visible = FALSE; // Disable update for API request
			else
				$this->ClinicalFindings->setFormValue($val);
		}

		// Check field name 'ClinicalDiagnosis' first before field var 'x_ClinicalDiagnosis'
		$val = $CurrentForm->hasValue("ClinicalDiagnosis") ? $CurrentForm->getValue("ClinicalDiagnosis") : $CurrentForm->getValue("x_ClinicalDiagnosis");
		if (!$this->ClinicalDiagnosis->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->ClinicalDiagnosis->Visible = FALSE; // Disable update for API request
			else
				$this->ClinicalDiagnosis->setFormValue($val);
		}

		// Check field name 'AnticoagulantifAny' first before field var 'x_AnticoagulantifAny'
		$val = $CurrentForm->hasValue("AnticoagulantifAny") ? $CurrentForm->getValue("AnticoagulantifAny") : $CurrentForm->getValue("x_AnticoagulantifAny");
		if (!$this->AnticoagulantifAny->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->AnticoagulantifAny->Visible = FALSE; // Disable update for API request
			else
				$this->AnticoagulantifAny->setFormValue($val);
		}

		// Check field name 'FoodAllergies' first before field var 'x_FoodAllergies'
		$val = $CurrentForm->hasValue("FoodAllergies") ? $CurrentForm->getValue("FoodAllergies") : $CurrentForm->getValue("x_FoodAllergies");
		if (!$this->FoodAllergies->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->FoodAllergies->Visible = FALSE; // Disable update for API request
			else
				$this->FoodAllergies->setFormValue($val);
		}

		// Check field name 'GenericAllergies' first before field var 'x_GenericAllergies'
		$val = $CurrentForm->hasValue("GenericAllergies") ? $CurrentForm->getValue("GenericAllergies") : $CurrentForm->getValue("x_GenericAllergies");
		if (!$this->GenericAllergies->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->GenericAllergies->Visible = FALSE; // Disable update for API request
			else
				$this->GenericAllergies->setFormValue($val);
		}

		// Check field name 'GroupAllergies' first before field var 'x_GroupAllergies'
		$val = $CurrentForm->hasValue("GroupAllergies") ? $CurrentForm->getValue("GroupAllergies") : $CurrentForm->getValue("x_GroupAllergies");
		if (!$this->GroupAllergies->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->GroupAllergies->Visible = FALSE; // Disable update for API request
			else
				$this->GroupAllergies->setFormValue($val);
		}

		// Check field name 'Temp' first before field var 'x_Temp'
		$val = $CurrentForm->hasValue("Temp") ? $CurrentForm->getValue("Temp") : $CurrentForm->getValue("x_Temp");
		if (!$this->Temp->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Temp->Visible = FALSE; // Disable update for API request
			else
				$this->Temp->setFormValue($val);
		}

		// Check field name 'Pulse' first before field var 'x_Pulse'
		$val = $CurrentForm->hasValue("Pulse") ? $CurrentForm->getValue("Pulse") : $CurrentForm->getValue("x_Pulse");
		if (!$this->Pulse->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Pulse->Visible = FALSE; // Disable update for API request
			else
				$this->Pulse->setFormValue($val);
		}

		// Check field name 'BP' first before field var 'x_BP'
		$val = $CurrentForm->hasValue("BP") ? $CurrentForm->getValue("BP") : $CurrentForm->getValue("x_BP");
		if (!$this->BP->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->BP->Visible = FALSE; // Disable update for API request
			else
				$this->BP->setFormValue($val);
		}

		// Check field name 'PR' first before field var 'x_PR'
		$val = $CurrentForm->hasValue("PR") ? $CurrentForm->getValue("PR") : $CurrentForm->getValue("x_PR");
		if (!$this->PR->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->PR->Visible = FALSE; // Disable update for API request
			else
				$this->PR->setFormValue($val);
		}

		// Check field name 'CNS' first before field var 'x_CNS'
		$val = $CurrentForm->hasValue("CNS") ? $CurrentForm->getValue("CNS") : $CurrentForm->getValue("x_CNS");
		if (!$this->CNS->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->CNS->Visible = FALSE; // Disable update for API request
			else
				$this->CNS->setFormValue($val);
		}

		// Check field name 'RSA' first before field var 'x_RSA'
		$val = $CurrentForm->hasValue("RSA") ? $CurrentForm->getValue("RSA") : $CurrentForm->getValue("x_RSA");
		if (!$this->RSA->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->RSA->Visible = FALSE; // Disable update for API request
			else
				$this->RSA->setFormValue($val);
		}

		// Check field name 'CVS' first before field var 'x_CVS'
		$val = $CurrentForm->hasValue("CVS") ? $CurrentForm->getValue("CVS") : $CurrentForm->getValue("x_CVS");
		if (!$this->CVS->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->CVS->Visible = FALSE; // Disable update for API request
			else
				$this->CVS->setFormValue($val);
		}

		// Check field name 'PA' first before field var 'x_PA'
		$val = $CurrentForm->hasValue("PA") ? $CurrentForm->getValue("PA") : $CurrentForm->getValue("x_PA");
		if (!$this->PA->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->PA->Visible = FALSE; // Disable update for API request
			else
				$this->PA->setFormValue($val);
		}

		// Check field name 'PS' first before field var 'x_PS'
		$val = $CurrentForm->hasValue("PS") ? $CurrentForm->getValue("PS") : $CurrentForm->getValue("x_PS");
		if (!$this->PS->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->PS->Visible = FALSE; // Disable update for API request
			else
				$this->PS->setFormValue($val);
		}

		// Check field name 'PV' first before field var 'x_PV'
		$val = $CurrentForm->hasValue("PV") ? $CurrentForm->getValue("PV") : $CurrentForm->getValue("x_PV");
		if (!$this->PV->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->PV->Visible = FALSE; // Disable update for API request
			else
				$this->PV->setFormValue($val);
		}

		// Check field name 'clinicaldetails' first before field var 'x_clinicaldetails'
		$val = $CurrentForm->hasValue("clinicaldetails") ? $CurrentForm->getValue("clinicaldetails") : $CurrentForm->getValue("x_clinicaldetails");
		if (!$this->clinicaldetails->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->clinicaldetails->Visible = FALSE; // Disable update for API request
			else
				$this->clinicaldetails->setFormValue($val);
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

		// Check field name 'PatientSearch' first before field var 'x_PatientSearch'
		$val = $CurrentForm->hasValue("PatientSearch") ? $CurrentForm->getValue("PatientSearch") : $CurrentForm->getValue("x_PatientSearch");
		if (!$this->PatientSearch->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->PatientSearch->Visible = FALSE; // Disable update for API request
			else
				$this->PatientSearch->setFormValue($val);
		}

		// Check field name 'PatientId' first before field var 'x_PatientId'
		$val = $CurrentForm->hasValue("PatientId") ? $CurrentForm->getValue("PatientId") : $CurrentForm->getValue("x_PatientId");
		if (!$this->PatientId->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->PatientId->Visible = FALSE; // Disable update for API request
			else
				$this->PatientId->setFormValue($val);
		}

		// Check field name 'Reception' first before field var 'x_Reception'
		$val = $CurrentForm->hasValue("Reception") ? $CurrentForm->getValue("Reception") : $CurrentForm->getValue("x_Reception");
		if (!$this->Reception->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Reception->Visible = FALSE; // Disable update for API request
			else
				$this->Reception->setFormValue($val);
		}

		// Check field name 'HospID' first before field var 'x_HospID'
		$val = $CurrentForm->hasValue("HospID") ? $CurrentForm->getValue("HospID") : $CurrentForm->getValue("x_HospID");
		if (!$this->HospID->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->HospID->Visible = FALSE; // Disable update for API request
			else
				$this->HospID->setFormValue($val);
		}
	}

	// Restore form values
	public function restoreFormValues()
	{
		global $CurrentForm;
		$this->id->CurrentValue = $this->id->FormValue;
		$this->mrnno->CurrentValue = $this->mrnno->FormValue;
		$this->PatientName->CurrentValue = $this->PatientName->FormValue;
		$this->PatID->CurrentValue = $this->PatID->FormValue;
		$this->MobileNumber->CurrentValue = $this->MobileNumber->FormValue;
		$this->profilePic->CurrentValue = $this->profilePic->FormValue;
		$this->HT->CurrentValue = $this->HT->FormValue;
		$this->WT->CurrentValue = $this->WT->FormValue;
		$this->SurfaceArea->CurrentValue = $this->SurfaceArea->FormValue;
		$this->BodyMassIndex->CurrentValue = $this->BodyMassIndex->FormValue;
		$this->ClinicalFindings->CurrentValue = $this->ClinicalFindings->FormValue;
		$this->ClinicalDiagnosis->CurrentValue = $this->ClinicalDiagnosis->FormValue;
		$this->AnticoagulantifAny->CurrentValue = $this->AnticoagulantifAny->FormValue;
		$this->FoodAllergies->CurrentValue = $this->FoodAllergies->FormValue;
		$this->GenericAllergies->CurrentValue = $this->GenericAllergies->FormValue;
		$this->GroupAllergies->CurrentValue = $this->GroupAllergies->FormValue;
		$this->Temp->CurrentValue = $this->Temp->FormValue;
		$this->Pulse->CurrentValue = $this->Pulse->FormValue;
		$this->BP->CurrentValue = $this->BP->FormValue;
		$this->PR->CurrentValue = $this->PR->FormValue;
		$this->CNS->CurrentValue = $this->CNS->FormValue;
		$this->RSA->CurrentValue = $this->RSA->FormValue;
		$this->CVS->CurrentValue = $this->CVS->FormValue;
		$this->PA->CurrentValue = $this->PA->FormValue;
		$this->PS->CurrentValue = $this->PS->FormValue;
		$this->PV->CurrentValue = $this->PV->FormValue;
		$this->clinicaldetails->CurrentValue = $this->clinicaldetails->FormValue;
		$this->status->CurrentValue = $this->status->FormValue;
		$this->modifiedby->CurrentValue = $this->modifiedby->FormValue;
		$this->modifieddatetime->CurrentValue = $this->modifieddatetime->FormValue;
		$this->modifieddatetime->CurrentValue = UnFormatDateTime($this->modifieddatetime->CurrentValue, 0);
		$this->Age->CurrentValue = $this->Age->FormValue;
		$this->Gender->CurrentValue = $this->Gender->FormValue;
		$this->PatientSearch->CurrentValue = $this->PatientSearch->FormValue;
		$this->PatientId->CurrentValue = $this->PatientId->FormValue;
		$this->Reception->CurrentValue = $this->Reception->FormValue;
		$this->HospID->CurrentValue = $this->HospID->FormValue;
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
		$this->mrnno->setDbValue($row['mrnno']);
		$this->PatientName->setDbValue($row['PatientName']);
		$this->PatID->setDbValue($row['PatID']);
		$this->MobileNumber->setDbValue($row['MobileNumber']);
		$this->profilePic->setDbValue($row['profilePic']);
		$this->HT->setDbValue($row['HT']);
		$this->WT->setDbValue($row['WT']);
		$this->SurfaceArea->setDbValue($row['SurfaceArea']);
		$this->BodyMassIndex->setDbValue($row['BodyMassIndex']);
		$this->ClinicalFindings->setDbValue($row['ClinicalFindings']);
		$this->ClinicalDiagnosis->setDbValue($row['ClinicalDiagnosis']);
		$this->AnticoagulantifAny->setDbValue($row['AnticoagulantifAny']);
		$this->FoodAllergies->setDbValue($row['FoodAllergies']);
		$this->GenericAllergies->setDbValue($row['GenericAllergies']);
		$this->GroupAllergies->setDbValue($row['GroupAllergies']);
		if (array_key_exists('EV__GroupAllergies', $rs->fields)) {
			$this->GroupAllergies->VirtualValue = $rs->fields('EV__GroupAllergies'); // Set up virtual field value
		} else {
			$this->GroupAllergies->VirtualValue = ""; // Clear value
		}
		$this->Temp->setDbValue($row['Temp']);
		$this->Pulse->setDbValue($row['Pulse']);
		$this->BP->setDbValue($row['BP']);
		$this->PR->setDbValue($row['PR']);
		$this->CNS->setDbValue($row['CNS']);
		$this->RSA->setDbValue($row['RSA']);
		$this->CVS->setDbValue($row['CVS']);
		$this->PA->setDbValue($row['PA']);
		$this->PS->setDbValue($row['PS']);
		$this->PV->setDbValue($row['PV']);
		$this->clinicaldetails->setDbValue($row['clinicaldetails']);
		$this->status->setDbValue($row['status']);
		$this->createdby->setDbValue($row['createdby']);
		$this->createddatetime->setDbValue($row['createddatetime']);
		$this->modifiedby->setDbValue($row['modifiedby']);
		$this->modifieddatetime->setDbValue($row['modifieddatetime']);
		$this->Age->setDbValue($row['Age']);
		$this->Gender->setDbValue($row['Gender']);
		$this->PatientSearch->setDbValue($row['PatientSearch']);
		$this->PatientId->setDbValue($row['PatientId']);
		$this->Reception->setDbValue($row['Reception']);
		$this->HospID->setDbValue($row['HospID']);
	}

	// Return a row with default values
	protected function newRow()
	{
		$row = [];
		$row['id'] = NULL;
		$row['mrnno'] = NULL;
		$row['PatientName'] = NULL;
		$row['PatID'] = NULL;
		$row['MobileNumber'] = NULL;
		$row['profilePic'] = NULL;
		$row['HT'] = NULL;
		$row['WT'] = NULL;
		$row['SurfaceArea'] = NULL;
		$row['BodyMassIndex'] = NULL;
		$row['ClinicalFindings'] = NULL;
		$row['ClinicalDiagnosis'] = NULL;
		$row['AnticoagulantifAny'] = NULL;
		$row['FoodAllergies'] = NULL;
		$row['GenericAllergies'] = NULL;
		$row['GroupAllergies'] = NULL;
		$row['Temp'] = NULL;
		$row['Pulse'] = NULL;
		$row['BP'] = NULL;
		$row['PR'] = NULL;
		$row['CNS'] = NULL;
		$row['RSA'] = NULL;
		$row['CVS'] = NULL;
		$row['PA'] = NULL;
		$row['PS'] = NULL;
		$row['PV'] = NULL;
		$row['clinicaldetails'] = NULL;
		$row['status'] = NULL;
		$row['createdby'] = NULL;
		$row['createddatetime'] = NULL;
		$row['modifiedby'] = NULL;
		$row['modifieddatetime'] = NULL;
		$row['Age'] = NULL;
		$row['Gender'] = NULL;
		$row['PatientSearch'] = NULL;
		$row['PatientId'] = NULL;
		$row['Reception'] = NULL;
		$row['HospID'] = NULL;
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
		// mrnno
		// PatientName
		// PatID
		// MobileNumber
		// profilePic
		// HT
		// WT
		// SurfaceArea
		// BodyMassIndex
		// ClinicalFindings
		// ClinicalDiagnosis
		// AnticoagulantifAny
		// FoodAllergies
		// GenericAllergies
		// GroupAllergies
		// Temp
		// Pulse
		// BP
		// PR
		// CNS
		// RSA
		// CVS
		// PA
		// PS
		// PV
		// clinicaldetails
		// status
		// createdby
		// createddatetime
		// modifiedby
		// modifieddatetime
		// Age
		// Gender
		// PatientSearch
		// PatientId
		// Reception
		// HospID

		if ($this->RowType == ROWTYPE_VIEW) { // View row

			// id
			$this->id->ViewValue = $this->id->CurrentValue;
			$this->id->ViewCustomAttributes = "";

			// mrnno
			$this->mrnno->ViewValue = $this->mrnno->CurrentValue;
			$this->mrnno->ViewCustomAttributes = "";

			// PatientName
			$this->PatientName->ViewValue = $this->PatientName->CurrentValue;
			$this->PatientName->ViewCustomAttributes = "";

			// PatID
			$this->PatID->ViewValue = $this->PatID->CurrentValue;
			$this->PatID->ViewCustomAttributes = "";

			// MobileNumber
			$this->MobileNumber->ViewValue = $this->MobileNumber->CurrentValue;
			$this->MobileNumber->ViewCustomAttributes = "";

			// profilePic
			$this->profilePic->ViewValue = $this->profilePic->CurrentValue;
			$this->profilePic->CssClass = "font-weight-bold";
			$this->profilePic->ViewCustomAttributes = "";

			// HT
			$this->HT->ViewValue = $this->HT->CurrentValue;
			$this->HT->ViewCustomAttributes = "";

			// WT
			$this->WT->ViewValue = $this->WT->CurrentValue;
			$this->WT->ViewCustomAttributes = "";

			// SurfaceArea
			$this->SurfaceArea->ViewValue = $this->SurfaceArea->CurrentValue;
			$this->SurfaceArea->ViewCustomAttributes = "";

			// BodyMassIndex
			$this->BodyMassIndex->ViewValue = $this->BodyMassIndex->CurrentValue;
			$this->BodyMassIndex->ViewCustomAttributes = "";

			// ClinicalFindings
			$this->ClinicalFindings->ViewValue = $this->ClinicalFindings->CurrentValue;
			$this->ClinicalFindings->ViewCustomAttributes = "";

			// ClinicalDiagnosis
			$this->ClinicalDiagnosis->ViewValue = $this->ClinicalDiagnosis->CurrentValue;
			$this->ClinicalDiagnosis->ViewCustomAttributes = "";

			// AnticoagulantifAny
			$this->AnticoagulantifAny->ViewValue = $this->AnticoagulantifAny->CurrentValue;
			$curVal = strval($this->AnticoagulantifAny->CurrentValue);
			if ($curVal <> "") {
				$this->AnticoagulantifAny->ViewValue = $this->AnticoagulantifAny->lookupCacheOption($curVal);
				if ($this->AnticoagulantifAny->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Genericname`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->AnticoagulantifAny->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = $rswrk->fields('df');
						$this->AnticoagulantifAny->ViewValue = $this->AnticoagulantifAny->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->AnticoagulantifAny->ViewValue = $this->AnticoagulantifAny->CurrentValue;
					}
				}
			} else {
				$this->AnticoagulantifAny->ViewValue = NULL;
			}
			$this->AnticoagulantifAny->ViewCustomAttributes = "";

			// FoodAllergies
			$this->FoodAllergies->ViewValue = $this->FoodAllergies->CurrentValue;
			$this->FoodAllergies->ViewCustomAttributes = "";

			// GenericAllergies
			$curVal = strval($this->GenericAllergies->CurrentValue);
			if ($curVal <> "") {
				$this->GenericAllergies->ViewValue = $this->GenericAllergies->lookupCacheOption($curVal);
				if ($this->GenericAllergies->ViewValue === NULL) { // Lookup from database
					$arwrk = explode(",", $curVal);
					$filterWrk = "";
					foreach ($arwrk as $wrk) {
						if ($filterWrk <> "")
							$filterWrk .= " OR ";
						$filterWrk .= "`Genericname`" . SearchString("=", trim($wrk), DATATYPE_STRING, "");
					}
					$sqlWrk = $this->GenericAllergies->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$this->GenericAllergies->ViewValue = new OptionValues();
						$ari = 0;
						while (!$rswrk->EOF) {
							$arwrk = array();
							$arwrk[1] = $rswrk->fields('df');
							$this->GenericAllergies->ViewValue->add($this->GenericAllergies->displayValue($arwrk));
							$rswrk->MoveNext();
							$ari++;
						}
						$rswrk->Close();
					} else {
						$this->GenericAllergies->ViewValue = $this->GenericAllergies->CurrentValue;
					}
				}
			} else {
				$this->GenericAllergies->ViewValue = NULL;
			}
			$this->GenericAllergies->ViewCustomAttributes = "";

			// GroupAllergies
			if ($this->GroupAllergies->VirtualValue <> "") {
				$this->GroupAllergies->ViewValue = $this->GroupAllergies->VirtualValue;
			} else {
			$curVal = strval($this->GroupAllergies->CurrentValue);
			if ($curVal <> "") {
				$this->GroupAllergies->ViewValue = $this->GroupAllergies->lookupCacheOption($curVal);
				if ($this->GroupAllergies->ViewValue === NULL) { // Lookup from database
					$arwrk = explode(",", $curVal);
					$filterWrk = "";
					foreach ($arwrk as $wrk) {
						if ($filterWrk <> "")
							$filterWrk .= " OR ";
						$filterWrk .= "`CategoryDrug`" . SearchString("=", trim($wrk), DATATYPE_STRING, "");
					}
					$sqlWrk = $this->GroupAllergies->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$this->GroupAllergies->ViewValue = new OptionValues();
						$ari = 0;
						while (!$rswrk->EOF) {
							$arwrk = array();
							$arwrk[1] = $rswrk->fields('df');
							$this->GroupAllergies->ViewValue->add($this->GroupAllergies->displayValue($arwrk));
							$rswrk->MoveNext();
							$ari++;
						}
						$rswrk->Close();
					} else {
						$this->GroupAllergies->ViewValue = $this->GroupAllergies->CurrentValue;
					}
				}
			} else {
				$this->GroupAllergies->ViewValue = NULL;
			}
			}
			$this->GroupAllergies->ViewCustomAttributes = "";

			// Temp
			$this->Temp->ViewValue = $this->Temp->CurrentValue;
			$this->Temp->ViewCustomAttributes = "";

			// Pulse
			$this->Pulse->ViewValue = $this->Pulse->CurrentValue;
			$this->Pulse->ViewCustomAttributes = "";

			// BP
			$this->BP->ViewValue = $this->BP->CurrentValue;
			$this->BP->ViewCustomAttributes = "";

			// PR
			$this->PR->ViewValue = $this->PR->CurrentValue;
			$this->PR->ViewCustomAttributes = "";

			// CNS
			$this->CNS->ViewValue = $this->CNS->CurrentValue;
			$this->CNS->ViewCustomAttributes = "";

			// RSA
			$this->RSA->ViewValue = $this->RSA->CurrentValue;
			$this->RSA->ViewCustomAttributes = "";

			// CVS
			$this->CVS->ViewValue = $this->CVS->CurrentValue;
			$this->CVS->ViewCustomAttributes = "";

			// PA
			$this->PA->ViewValue = $this->PA->CurrentValue;
			$this->PA->ViewCustomAttributes = "";

			// PS
			$this->PS->ViewValue = $this->PS->CurrentValue;
			$this->PS->ViewCustomAttributes = "";

			// PV
			$this->PV->ViewValue = $this->PV->CurrentValue;
			$this->PV->ViewCustomAttributes = "";

			// clinicaldetails
			$curVal = strval($this->clinicaldetails->CurrentValue);
			if ($curVal <> "") {
				$this->clinicaldetails->ViewValue = $this->clinicaldetails->lookupCacheOption($curVal);
				if ($this->clinicaldetails->ViewValue === NULL) { // Lookup from database
					$arwrk = explode(",", $curVal);
					$filterWrk = "";
					foreach ($arwrk as $wrk) {
						if ($filterWrk <> "")
							$filterWrk .= " OR ";
						$filterWrk .= "`ClinicalDetails`" . SearchString("=", trim($wrk), DATATYPE_STRING, "");
					}
					$sqlWrk = $this->clinicaldetails->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$this->clinicaldetails->ViewValue = new OptionValues();
						$ari = 0;
						while (!$rswrk->EOF) {
							$arwrk = array();
							$arwrk[1] = $rswrk->fields('df');
							$this->clinicaldetails->ViewValue->add($this->clinicaldetails->displayValue($arwrk));
							$rswrk->MoveNext();
							$ari++;
						}
						$rswrk->Close();
					} else {
						$this->clinicaldetails->ViewValue = $this->clinicaldetails->CurrentValue;
					}
				}
			} else {
				$this->clinicaldetails->ViewValue = NULL;
			}
			$this->clinicaldetails->ViewCustomAttributes = "";

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

			// createdby
			$this->createdby->ViewValue = $this->createdby->CurrentValue;
			$this->createdby->ViewCustomAttributes = "";

			// createddatetime
			$this->createddatetime->ViewValue = $this->createddatetime->CurrentValue;
			$this->createddatetime->ViewValue = FormatDateTime($this->createddatetime->ViewValue, 0);
			$this->createddatetime->ViewCustomAttributes = "";

			// modifiedby
			$this->modifiedby->ViewValue = $this->modifiedby->CurrentValue;
			$this->modifiedby->ViewCustomAttributes = "";

			// modifieddatetime
			$this->modifieddatetime->ViewValue = $this->modifieddatetime->CurrentValue;
			$this->modifieddatetime->ViewValue = FormatDateTime($this->modifieddatetime->ViewValue, 0);
			$this->modifieddatetime->ViewCustomAttributes = "";

			// Age
			$this->Age->ViewValue = $this->Age->CurrentValue;
			$this->Age->ViewCustomAttributes = "";

			// Gender
			$this->Gender->ViewValue = $this->Gender->CurrentValue;
			$this->Gender->ViewCustomAttributes = "";

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

			// PatientId
			$this->PatientId->ViewValue = $this->PatientId->CurrentValue;
			$this->PatientId->ViewCustomAttributes = "";

			// Reception
			$this->Reception->ViewValue = $this->Reception->CurrentValue;
			$this->Reception->ViewValue = FormatNumber($this->Reception->ViewValue, 0, -2, -2, -2);
			$this->Reception->ViewCustomAttributes = "";

			// HospID
			$this->HospID->ViewValue = $this->HospID->CurrentValue;
			$this->HospID->ViewValue = FormatNumber($this->HospID->ViewValue, 0, -2, -2, -2);
			$this->HospID->ViewCustomAttributes = "";

			// id
			$this->id->LinkCustomAttributes = "";
			$this->id->HrefValue = "";
			$this->id->TooltipValue = "";

			// mrnno
			$this->mrnno->LinkCustomAttributes = "";
			$this->mrnno->HrefValue = "";
			$this->mrnno->TooltipValue = "";

			// PatientName
			$this->PatientName->LinkCustomAttributes = "";
			$this->PatientName->HrefValue = "";
			$this->PatientName->TooltipValue = "";

			// PatID
			$this->PatID->LinkCustomAttributes = "";
			$this->PatID->HrefValue = "";
			$this->PatID->TooltipValue = "";

			// MobileNumber
			$this->MobileNumber->LinkCustomAttributes = "";
			$this->MobileNumber->HrefValue = "";
			$this->MobileNumber->TooltipValue = "";

			// profilePic
			$this->profilePic->LinkCustomAttributes = "";
			$this->profilePic->HrefValue = "";
			$this->profilePic->TooltipValue = "";

			// HT
			$this->HT->LinkCustomAttributes = "";
			$this->HT->HrefValue = "";
			$this->HT->TooltipValue = "";

			// WT
			$this->WT->LinkCustomAttributes = "";
			$this->WT->HrefValue = "";
			$this->WT->TooltipValue = "";

			// SurfaceArea
			$this->SurfaceArea->LinkCustomAttributes = "";
			$this->SurfaceArea->HrefValue = "";
			$this->SurfaceArea->TooltipValue = "";

			// BodyMassIndex
			$this->BodyMassIndex->LinkCustomAttributes = "";
			$this->BodyMassIndex->HrefValue = "";
			$this->BodyMassIndex->TooltipValue = "";

			// ClinicalFindings
			$this->ClinicalFindings->LinkCustomAttributes = "";
			$this->ClinicalFindings->HrefValue = "";
			$this->ClinicalFindings->TooltipValue = "";

			// ClinicalDiagnosis
			$this->ClinicalDiagnosis->LinkCustomAttributes = "";
			$this->ClinicalDiagnosis->HrefValue = "";
			$this->ClinicalDiagnosis->TooltipValue = "";

			// AnticoagulantifAny
			$this->AnticoagulantifAny->LinkCustomAttributes = "";
			$this->AnticoagulantifAny->HrefValue = "";
			$this->AnticoagulantifAny->TooltipValue = "";

			// FoodAllergies
			$this->FoodAllergies->LinkCustomAttributes = "";
			$this->FoodAllergies->HrefValue = "";
			$this->FoodAllergies->TooltipValue = "";

			// GenericAllergies
			$this->GenericAllergies->LinkCustomAttributes = "";
			$this->GenericAllergies->HrefValue = "";
			$this->GenericAllergies->TooltipValue = "";

			// GroupAllergies
			$this->GroupAllergies->LinkCustomAttributes = "";
			$this->GroupAllergies->HrefValue = "";
			$this->GroupAllergies->TooltipValue = "";

			// Temp
			$this->Temp->LinkCustomAttributes = "";
			$this->Temp->HrefValue = "";
			$this->Temp->TooltipValue = "";

			// Pulse
			$this->Pulse->LinkCustomAttributes = "";
			$this->Pulse->HrefValue = "";
			$this->Pulse->TooltipValue = "";

			// BP
			$this->BP->LinkCustomAttributes = "";
			$this->BP->HrefValue = "";
			$this->BP->TooltipValue = "";

			// PR
			$this->PR->LinkCustomAttributes = "";
			$this->PR->HrefValue = "";
			$this->PR->TooltipValue = "";

			// CNS
			$this->CNS->LinkCustomAttributes = "";
			$this->CNS->HrefValue = "";
			$this->CNS->TooltipValue = "";

			// RSA
			$this->RSA->LinkCustomAttributes = "";
			$this->RSA->HrefValue = "";
			$this->RSA->TooltipValue = "";

			// CVS
			$this->CVS->LinkCustomAttributes = "";
			$this->CVS->HrefValue = "";
			$this->CVS->TooltipValue = "";

			// PA
			$this->PA->LinkCustomAttributes = "";
			$this->PA->HrefValue = "";
			$this->PA->TooltipValue = "";

			// PS
			$this->PS->LinkCustomAttributes = "";
			$this->PS->HrefValue = "";
			$this->PS->TooltipValue = "";

			// PV
			$this->PV->LinkCustomAttributes = "";
			$this->PV->HrefValue = "";
			$this->PV->TooltipValue = "";

			// clinicaldetails
			$this->clinicaldetails->LinkCustomAttributes = "";
			$this->clinicaldetails->HrefValue = "";
			$this->clinicaldetails->TooltipValue = "";

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

			// Age
			$this->Age->LinkCustomAttributes = "";
			$this->Age->HrefValue = "";
			$this->Age->TooltipValue = "";

			// Gender
			$this->Gender->LinkCustomAttributes = "";
			$this->Gender->HrefValue = "";
			$this->Gender->TooltipValue = "";

			// PatientSearch
			$this->PatientSearch->LinkCustomAttributes = "";
			$this->PatientSearch->HrefValue = "";
			$this->PatientSearch->TooltipValue = "";

			// PatientId
			$this->PatientId->LinkCustomAttributes = "";
			$this->PatientId->HrefValue = "";
			$this->PatientId->TooltipValue = "";

			// Reception
			$this->Reception->LinkCustomAttributes = "";
			$this->Reception->HrefValue = "";
			$this->Reception->TooltipValue = "";

			// HospID
			$this->HospID->LinkCustomAttributes = "";
			$this->HospID->HrefValue = "";
			$this->HospID->TooltipValue = "";
		} elseif ($this->RowType == ROWTYPE_EDIT) { // Edit row

			// id
			$this->id->EditAttrs["class"] = "form-control";
			$this->id->EditCustomAttributes = "";
			$this->id->EditValue = $this->id->CurrentValue;
			$this->id->ViewCustomAttributes = "";

			// mrnno
			$this->mrnno->EditAttrs["class"] = "form-control";
			$this->mrnno->EditCustomAttributes = "";
			$this->mrnno->EditValue = $this->mrnno->CurrentValue;
			$this->mrnno->ViewCustomAttributes = "";

			// PatientName
			$this->PatientName->EditAttrs["class"] = "form-control";
			$this->PatientName->EditCustomAttributes = "";
			$this->PatientName->EditValue = $this->PatientName->CurrentValue;
			$this->PatientName->ViewCustomAttributes = "";

			// PatID
			$this->PatID->EditAttrs["class"] = "form-control";
			$this->PatID->EditCustomAttributes = "";
			$this->PatID->EditValue = $this->PatID->CurrentValue;
			$this->PatID->ViewCustomAttributes = "";

			// MobileNumber
			$this->MobileNumber->EditAttrs["class"] = "form-control";
			$this->MobileNumber->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->MobileNumber->CurrentValue = HtmlDecode($this->MobileNumber->CurrentValue);
			$this->MobileNumber->EditValue = HtmlEncode($this->MobileNumber->CurrentValue);
			$this->MobileNumber->PlaceHolder = RemoveHtml($this->MobileNumber->caption());

			// profilePic
			$this->profilePic->EditAttrs["class"] = "form-control";
			$this->profilePic->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->profilePic->CurrentValue = HtmlDecode($this->profilePic->CurrentValue);
			$this->profilePic->EditValue = HtmlEncode($this->profilePic->CurrentValue);
			$this->profilePic->PlaceHolder = RemoveHtml($this->profilePic->caption());

			// HT
			$this->HT->EditAttrs["class"] = "form-control";
			$this->HT->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->HT->CurrentValue = HtmlDecode($this->HT->CurrentValue);
			$this->HT->EditValue = HtmlEncode($this->HT->CurrentValue);
			$this->HT->PlaceHolder = RemoveHtml($this->HT->caption());

			// WT
			$this->WT->EditAttrs["class"] = "form-control";
			$this->WT->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->WT->CurrentValue = HtmlDecode($this->WT->CurrentValue);
			$this->WT->EditValue = HtmlEncode($this->WT->CurrentValue);
			$this->WT->PlaceHolder = RemoveHtml($this->WT->caption());

			// SurfaceArea
			$this->SurfaceArea->EditAttrs["class"] = "form-control";
			$this->SurfaceArea->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->SurfaceArea->CurrentValue = HtmlDecode($this->SurfaceArea->CurrentValue);
			$this->SurfaceArea->EditValue = HtmlEncode($this->SurfaceArea->CurrentValue);
			$this->SurfaceArea->PlaceHolder = RemoveHtml($this->SurfaceArea->caption());

			// BodyMassIndex
			$this->BodyMassIndex->EditAttrs["class"] = "form-control";
			$this->BodyMassIndex->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->BodyMassIndex->CurrentValue = HtmlDecode($this->BodyMassIndex->CurrentValue);
			$this->BodyMassIndex->EditValue = HtmlEncode($this->BodyMassIndex->CurrentValue);
			$this->BodyMassIndex->PlaceHolder = RemoveHtml($this->BodyMassIndex->caption());

			// ClinicalFindings
			$this->ClinicalFindings->EditAttrs["class"] = "form-control";
			$this->ClinicalFindings->EditCustomAttributes = "";
			$this->ClinicalFindings->EditValue = HtmlEncode($this->ClinicalFindings->CurrentValue);
			$this->ClinicalFindings->PlaceHolder = RemoveHtml($this->ClinicalFindings->caption());

			// ClinicalDiagnosis
			$this->ClinicalDiagnosis->EditAttrs["class"] = "form-control";
			$this->ClinicalDiagnosis->EditCustomAttributes = "";
			$this->ClinicalDiagnosis->EditValue = HtmlEncode($this->ClinicalDiagnosis->CurrentValue);
			$this->ClinicalDiagnosis->PlaceHolder = RemoveHtml($this->ClinicalDiagnosis->caption());

			// AnticoagulantifAny
			$this->AnticoagulantifAny->EditAttrs["class"] = "form-control";
			$this->AnticoagulantifAny->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->AnticoagulantifAny->CurrentValue = HtmlDecode($this->AnticoagulantifAny->CurrentValue);
			$this->AnticoagulantifAny->EditValue = HtmlEncode($this->AnticoagulantifAny->CurrentValue);
			$curVal = strval($this->AnticoagulantifAny->CurrentValue);
			if ($curVal <> "") {
				$this->AnticoagulantifAny->EditValue = $this->AnticoagulantifAny->lookupCacheOption($curVal);
				if ($this->AnticoagulantifAny->EditValue === NULL) { // Lookup from database
					$filterWrk = "`Genericname`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->AnticoagulantifAny->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = HtmlEncode($rswrk->fields('df'));
						$this->AnticoagulantifAny->EditValue = $this->AnticoagulantifAny->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->AnticoagulantifAny->EditValue = HtmlEncode($this->AnticoagulantifAny->CurrentValue);
					}
				}
			} else {
				$this->AnticoagulantifAny->EditValue = NULL;
			}
			$this->AnticoagulantifAny->PlaceHolder = RemoveHtml($this->AnticoagulantifAny->caption());

			// FoodAllergies
			$this->FoodAllergies->EditAttrs["class"] = "form-control";
			$this->FoodAllergies->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->FoodAllergies->CurrentValue = HtmlDecode($this->FoodAllergies->CurrentValue);
			$this->FoodAllergies->EditValue = HtmlEncode($this->FoodAllergies->CurrentValue);
			$this->FoodAllergies->PlaceHolder = RemoveHtml($this->FoodAllergies->caption());

			// GenericAllergies
			$this->GenericAllergies->EditCustomAttributes = "";
			$curVal = trim(strval($this->GenericAllergies->CurrentValue));
			if ($curVal <> "")
				$this->GenericAllergies->ViewValue = $this->GenericAllergies->lookupCacheOption($curVal);
			else
				$this->GenericAllergies->ViewValue = $this->GenericAllergies->Lookup !== NULL && is_array($this->GenericAllergies->Lookup->Options) ? $curVal : NULL;
			if ($this->GenericAllergies->ViewValue !== NULL) { // Load from cache
				$this->GenericAllergies->EditValue = array_values($this->GenericAllergies->Lookup->Options);
				if ($this->GenericAllergies->ViewValue == "")
					$this->GenericAllergies->ViewValue = $Language->phrase("PleaseSelect");
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$arwrk = explode(",", $curVal);
					$filterWrk = "";
					foreach ($arwrk as $wrk) {
						if ($filterWrk <> "") $filterWrk .= " OR ";
						$filterWrk .= "`Genericname`" . SearchString("=", trim($wrk), DATATYPE_STRING, "");
					}
				}
				$sqlWrk = $this->GenericAllergies->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$this->GenericAllergies->ViewValue = new OptionValues();
					$ari = 0;
					while (!$rswrk->EOF) {
						$arwrk = array();
						$arwrk[1] = HtmlEncode($rswrk->fields('df'));
						$this->GenericAllergies->ViewValue->add($this->GenericAllergies->displayValue($arwrk));
						$rswrk->MoveNext();
						$ari++;
					}
					$rswrk->MoveFirst();
				} else {
					$this->GenericAllergies->ViewValue = $Language->phrase("PleaseSelect");
				}
				$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
				if ($rswrk) $rswrk->Close();
				$this->GenericAllergies->EditValue = $arwrk;
			}

			// GroupAllergies
			$this->GroupAllergies->EditCustomAttributes = "";
			$curVal = trim(strval($this->GroupAllergies->CurrentValue));
			if ($curVal <> "")
				$this->GroupAllergies->ViewValue = $this->GroupAllergies->lookupCacheOption($curVal);
			else
				$this->GroupAllergies->ViewValue = $this->GroupAllergies->Lookup !== NULL && is_array($this->GroupAllergies->Lookup->Options) ? $curVal : NULL;
			if ($this->GroupAllergies->ViewValue !== NULL) { // Load from cache
				$this->GroupAllergies->EditValue = array_values($this->GroupAllergies->Lookup->Options);
				if ($this->GroupAllergies->ViewValue == "")
					$this->GroupAllergies->ViewValue = $Language->phrase("PleaseSelect");
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$arwrk = explode(",", $curVal);
					$filterWrk = "";
					foreach ($arwrk as $wrk) {
						if ($filterWrk <> "") $filterWrk .= " OR ";
						$filterWrk .= "`CategoryDrug`" . SearchString("=", trim($wrk), DATATYPE_STRING, "");
					}
				}
				$sqlWrk = $this->GroupAllergies->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$this->GroupAllergies->ViewValue = new OptionValues();
					$ari = 0;
					while (!$rswrk->EOF) {
						$arwrk = array();
						$arwrk[1] = HtmlEncode($rswrk->fields('df'));
						$this->GroupAllergies->ViewValue->add($this->GroupAllergies->displayValue($arwrk));
						$rswrk->MoveNext();
						$ari++;
					}
					$rswrk->MoveFirst();
				} else {
					$this->GroupAllergies->ViewValue = $Language->phrase("PleaseSelect");
				}
				$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
				if ($rswrk) $rswrk->Close();
				$this->GroupAllergies->EditValue = $arwrk;
			}

			// Temp
			$this->Temp->EditAttrs["class"] = "form-control";
			$this->Temp->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Temp->CurrentValue = HtmlDecode($this->Temp->CurrentValue);
			$this->Temp->EditValue = HtmlEncode($this->Temp->CurrentValue);
			$this->Temp->PlaceHolder = RemoveHtml($this->Temp->caption());

			// Pulse
			$this->Pulse->EditAttrs["class"] = "form-control";
			$this->Pulse->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Pulse->CurrentValue = HtmlDecode($this->Pulse->CurrentValue);
			$this->Pulse->EditValue = HtmlEncode($this->Pulse->CurrentValue);
			$this->Pulse->PlaceHolder = RemoveHtml($this->Pulse->caption());

			// BP
			$this->BP->EditAttrs["class"] = "form-control";
			$this->BP->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->BP->CurrentValue = HtmlDecode($this->BP->CurrentValue);
			$this->BP->EditValue = HtmlEncode($this->BP->CurrentValue);
			$this->BP->PlaceHolder = RemoveHtml($this->BP->caption());

			// PR
			$this->PR->EditAttrs["class"] = "form-control";
			$this->PR->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->PR->CurrentValue = HtmlDecode($this->PR->CurrentValue);
			$this->PR->EditValue = HtmlEncode($this->PR->CurrentValue);
			$this->PR->PlaceHolder = RemoveHtml($this->PR->caption());

			// CNS
			$this->CNS->EditAttrs["class"] = "form-control";
			$this->CNS->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->CNS->CurrentValue = HtmlDecode($this->CNS->CurrentValue);
			$this->CNS->EditValue = HtmlEncode($this->CNS->CurrentValue);
			$this->CNS->PlaceHolder = RemoveHtml($this->CNS->caption());

			// RSA
			$this->RSA->EditAttrs["class"] = "form-control";
			$this->RSA->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->RSA->CurrentValue = HtmlDecode($this->RSA->CurrentValue);
			$this->RSA->EditValue = HtmlEncode($this->RSA->CurrentValue);
			$this->RSA->PlaceHolder = RemoveHtml($this->RSA->caption());

			// CVS
			$this->CVS->EditAttrs["class"] = "form-control";
			$this->CVS->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->CVS->CurrentValue = HtmlDecode($this->CVS->CurrentValue);
			$this->CVS->EditValue = HtmlEncode($this->CVS->CurrentValue);
			$this->CVS->PlaceHolder = RemoveHtml($this->CVS->caption());

			// PA
			$this->PA->EditAttrs["class"] = "form-control";
			$this->PA->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->PA->CurrentValue = HtmlDecode($this->PA->CurrentValue);
			$this->PA->EditValue = HtmlEncode($this->PA->CurrentValue);
			$this->PA->PlaceHolder = RemoveHtml($this->PA->caption());

			// PS
			$this->PS->EditAttrs["class"] = "form-control";
			$this->PS->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->PS->CurrentValue = HtmlDecode($this->PS->CurrentValue);
			$this->PS->EditValue = HtmlEncode($this->PS->CurrentValue);
			$this->PS->PlaceHolder = RemoveHtml($this->PS->caption());

			// PV
			$this->PV->EditAttrs["class"] = "form-control";
			$this->PV->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->PV->CurrentValue = HtmlDecode($this->PV->CurrentValue);
			$this->PV->EditValue = HtmlEncode($this->PV->CurrentValue);
			$this->PV->PlaceHolder = RemoveHtml($this->PV->caption());

			// clinicaldetails
			$this->clinicaldetails->EditCustomAttributes = "";
			$curVal = trim(strval($this->clinicaldetails->CurrentValue));
			if ($curVal <> "")
				$this->clinicaldetails->ViewValue = $this->clinicaldetails->lookupCacheOption($curVal);
			else
				$this->clinicaldetails->ViewValue = $this->clinicaldetails->Lookup !== NULL && is_array($this->clinicaldetails->Lookup->Options) ? $curVal : NULL;
			if ($this->clinicaldetails->ViewValue !== NULL) { // Load from cache
				$this->clinicaldetails->EditValue = array_values($this->clinicaldetails->Lookup->Options);
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$arwrk = explode(",", $curVal);
					$filterWrk = "";
					foreach ($arwrk as $wrk) {
						if ($filterWrk <> "") $filterWrk .= " OR ";
						$filterWrk .= "`ClinicalDetails`" . SearchString("=", trim($wrk), DATATYPE_STRING, "");
					}
				}
				$sqlWrk = $this->clinicaldetails->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
				if ($rswrk) $rswrk->Close();
				$this->clinicaldetails->EditValue = $arwrk;
			}

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
					$arwrk[3] = HtmlEncode($rswrk->fields('df3'));
					$arwrk[4] = HtmlEncode($rswrk->fields('df4'));
					$this->PatientSearch->ViewValue = $this->PatientSearch->displayValue($arwrk);
				} else {
					$this->PatientSearch->ViewValue = $Language->phrase("PleaseSelect");
				}
				$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
				if ($rswrk) $rswrk->Close();
				$this->PatientSearch->EditValue = $arwrk;
			}

			// PatientId
			$this->PatientId->EditAttrs["class"] = "form-control";
			$this->PatientId->EditCustomAttributes = "";
			$this->PatientId->EditValue = $this->PatientId->CurrentValue;
			$this->PatientId->ViewCustomAttributes = "";

			// Reception
			$this->Reception->EditAttrs["class"] = "form-control";
			$this->Reception->EditCustomAttributes = "";
			$this->Reception->EditValue = $this->Reception->CurrentValue;
			$this->Reception->EditValue = FormatNumber($this->Reception->EditValue, 0, -2, -2, -2);
			$this->Reception->ViewCustomAttributes = "";

			// HospID
			// Edit refer script
			// id

			$this->id->LinkCustomAttributes = "";
			$this->id->HrefValue = "";

			// mrnno
			$this->mrnno->LinkCustomAttributes = "";
			$this->mrnno->HrefValue = "";
			$this->mrnno->TooltipValue = "";

			// PatientName
			$this->PatientName->LinkCustomAttributes = "";
			$this->PatientName->HrefValue = "";
			$this->PatientName->TooltipValue = "";

			// PatID
			$this->PatID->LinkCustomAttributes = "";
			$this->PatID->HrefValue = "";
			$this->PatID->TooltipValue = "";

			// MobileNumber
			$this->MobileNumber->LinkCustomAttributes = "";
			$this->MobileNumber->HrefValue = "";

			// profilePic
			$this->profilePic->LinkCustomAttributes = "";
			$this->profilePic->HrefValue = "";

			// HT
			$this->HT->LinkCustomAttributes = "";
			$this->HT->HrefValue = "";

			// WT
			$this->WT->LinkCustomAttributes = "";
			$this->WT->HrefValue = "";

			// SurfaceArea
			$this->SurfaceArea->LinkCustomAttributes = "";
			$this->SurfaceArea->HrefValue = "";

			// BodyMassIndex
			$this->BodyMassIndex->LinkCustomAttributes = "";
			$this->BodyMassIndex->HrefValue = "";

			// ClinicalFindings
			$this->ClinicalFindings->LinkCustomAttributes = "";
			$this->ClinicalFindings->HrefValue = "";

			// ClinicalDiagnosis
			$this->ClinicalDiagnosis->LinkCustomAttributes = "";
			$this->ClinicalDiagnosis->HrefValue = "";

			// AnticoagulantifAny
			$this->AnticoagulantifAny->LinkCustomAttributes = "";
			$this->AnticoagulantifAny->HrefValue = "";

			// FoodAllergies
			$this->FoodAllergies->LinkCustomAttributes = "";
			$this->FoodAllergies->HrefValue = "";

			// GenericAllergies
			$this->GenericAllergies->LinkCustomAttributes = "";
			$this->GenericAllergies->HrefValue = "";

			// GroupAllergies
			$this->GroupAllergies->LinkCustomAttributes = "";
			$this->GroupAllergies->HrefValue = "";

			// Temp
			$this->Temp->LinkCustomAttributes = "";
			$this->Temp->HrefValue = "";

			// Pulse
			$this->Pulse->LinkCustomAttributes = "";
			$this->Pulse->HrefValue = "";

			// BP
			$this->BP->LinkCustomAttributes = "";
			$this->BP->HrefValue = "";

			// PR
			$this->PR->LinkCustomAttributes = "";
			$this->PR->HrefValue = "";

			// CNS
			$this->CNS->LinkCustomAttributes = "";
			$this->CNS->HrefValue = "";

			// RSA
			$this->RSA->LinkCustomAttributes = "";
			$this->RSA->HrefValue = "";

			// CVS
			$this->CVS->LinkCustomAttributes = "";
			$this->CVS->HrefValue = "";

			// PA
			$this->PA->LinkCustomAttributes = "";
			$this->PA->HrefValue = "";

			// PS
			$this->PS->LinkCustomAttributes = "";
			$this->PS->HrefValue = "";

			// PV
			$this->PV->LinkCustomAttributes = "";
			$this->PV->HrefValue = "";

			// clinicaldetails
			$this->clinicaldetails->LinkCustomAttributes = "";
			$this->clinicaldetails->HrefValue = "";

			// status
			$this->status->LinkCustomAttributes = "";
			$this->status->HrefValue = "";

			// modifiedby
			$this->modifiedby->LinkCustomAttributes = "";
			$this->modifiedby->HrefValue = "";

			// modifieddatetime
			$this->modifieddatetime->LinkCustomAttributes = "";
			$this->modifieddatetime->HrefValue = "";

			// Age
			$this->Age->LinkCustomAttributes = "";
			$this->Age->HrefValue = "";

			// Gender
			$this->Gender->LinkCustomAttributes = "";
			$this->Gender->HrefValue = "";

			// PatientSearch
			$this->PatientSearch->LinkCustomAttributes = "";
			$this->PatientSearch->HrefValue = "";

			// PatientId
			$this->PatientId->LinkCustomAttributes = "";
			$this->PatientId->HrefValue = "";
			$this->PatientId->TooltipValue = "";

			// Reception
			$this->Reception->LinkCustomAttributes = "";
			$this->Reception->HrefValue = "";
			$this->Reception->TooltipValue = "";

			// HospID
			$this->HospID->LinkCustomAttributes = "";
			$this->HospID->HrefValue = "";
			$this->HospID->TooltipValue = "";
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
		if ($this->mrnno->Required) {
			if (!$this->mrnno->IsDetailKey && $this->mrnno->FormValue != NULL && $this->mrnno->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->mrnno->caption(), $this->mrnno->RequiredErrorMessage));
			}
		}
		if ($this->PatientName->Required) {
			if (!$this->PatientName->IsDetailKey && $this->PatientName->FormValue != NULL && $this->PatientName->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PatientName->caption(), $this->PatientName->RequiredErrorMessage));
			}
		}
		if ($this->PatID->Required) {
			if (!$this->PatID->IsDetailKey && $this->PatID->FormValue != NULL && $this->PatID->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PatID->caption(), $this->PatID->RequiredErrorMessage));
			}
		}
		if ($this->MobileNumber->Required) {
			if (!$this->MobileNumber->IsDetailKey && $this->MobileNumber->FormValue != NULL && $this->MobileNumber->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->MobileNumber->caption(), $this->MobileNumber->RequiredErrorMessage));
			}
		}
		if ($this->profilePic->Required) {
			if (!$this->profilePic->IsDetailKey && $this->profilePic->FormValue != NULL && $this->profilePic->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->profilePic->caption(), $this->profilePic->RequiredErrorMessage));
			}
		}
		if ($this->HT->Required) {
			if (!$this->HT->IsDetailKey && $this->HT->FormValue != NULL && $this->HT->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->HT->caption(), $this->HT->RequiredErrorMessage));
			}
		}
		if ($this->WT->Required) {
			if (!$this->WT->IsDetailKey && $this->WT->FormValue != NULL && $this->WT->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->WT->caption(), $this->WT->RequiredErrorMessage));
			}
		}
		if ($this->SurfaceArea->Required) {
			if (!$this->SurfaceArea->IsDetailKey && $this->SurfaceArea->FormValue != NULL && $this->SurfaceArea->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->SurfaceArea->caption(), $this->SurfaceArea->RequiredErrorMessage));
			}
		}
		if ($this->BodyMassIndex->Required) {
			if (!$this->BodyMassIndex->IsDetailKey && $this->BodyMassIndex->FormValue != NULL && $this->BodyMassIndex->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->BodyMassIndex->caption(), $this->BodyMassIndex->RequiredErrorMessage));
			}
		}
		if ($this->ClinicalFindings->Required) {
			if (!$this->ClinicalFindings->IsDetailKey && $this->ClinicalFindings->FormValue != NULL && $this->ClinicalFindings->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->ClinicalFindings->caption(), $this->ClinicalFindings->RequiredErrorMessage));
			}
		}
		if ($this->ClinicalDiagnosis->Required) {
			if (!$this->ClinicalDiagnosis->IsDetailKey && $this->ClinicalDiagnosis->FormValue != NULL && $this->ClinicalDiagnosis->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->ClinicalDiagnosis->caption(), $this->ClinicalDiagnosis->RequiredErrorMessage));
			}
		}
		if ($this->AnticoagulantifAny->Required) {
			if (!$this->AnticoagulantifAny->IsDetailKey && $this->AnticoagulantifAny->FormValue != NULL && $this->AnticoagulantifAny->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->AnticoagulantifAny->caption(), $this->AnticoagulantifAny->RequiredErrorMessage));
			}
		}
		if ($this->FoodAllergies->Required) {
			if (!$this->FoodAllergies->IsDetailKey && $this->FoodAllergies->FormValue != NULL && $this->FoodAllergies->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->FoodAllergies->caption(), $this->FoodAllergies->RequiredErrorMessage));
			}
		}
		if ($this->GenericAllergies->Required) {
			if ($this->GenericAllergies->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->GenericAllergies->caption(), $this->GenericAllergies->RequiredErrorMessage));
			}
		}
		if ($this->GroupAllergies->Required) {
			if ($this->GroupAllergies->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->GroupAllergies->caption(), $this->GroupAllergies->RequiredErrorMessage));
			}
		}
		if ($this->Temp->Required) {
			if (!$this->Temp->IsDetailKey && $this->Temp->FormValue != NULL && $this->Temp->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Temp->caption(), $this->Temp->RequiredErrorMessage));
			}
		}
		if ($this->Pulse->Required) {
			if (!$this->Pulse->IsDetailKey && $this->Pulse->FormValue != NULL && $this->Pulse->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Pulse->caption(), $this->Pulse->RequiredErrorMessage));
			}
		}
		if ($this->BP->Required) {
			if (!$this->BP->IsDetailKey && $this->BP->FormValue != NULL && $this->BP->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->BP->caption(), $this->BP->RequiredErrorMessage));
			}
		}
		if ($this->PR->Required) {
			if (!$this->PR->IsDetailKey && $this->PR->FormValue != NULL && $this->PR->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PR->caption(), $this->PR->RequiredErrorMessage));
			}
		}
		if ($this->CNS->Required) {
			if (!$this->CNS->IsDetailKey && $this->CNS->FormValue != NULL && $this->CNS->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->CNS->caption(), $this->CNS->RequiredErrorMessage));
			}
		}
		if ($this->RSA->Required) {
			if (!$this->RSA->IsDetailKey && $this->RSA->FormValue != NULL && $this->RSA->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->RSA->caption(), $this->RSA->RequiredErrorMessage));
			}
		}
		if ($this->CVS->Required) {
			if (!$this->CVS->IsDetailKey && $this->CVS->FormValue != NULL && $this->CVS->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->CVS->caption(), $this->CVS->RequiredErrorMessage));
			}
		}
		if ($this->PA->Required) {
			if (!$this->PA->IsDetailKey && $this->PA->FormValue != NULL && $this->PA->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PA->caption(), $this->PA->RequiredErrorMessage));
			}
		}
		if ($this->PS->Required) {
			if (!$this->PS->IsDetailKey && $this->PS->FormValue != NULL && $this->PS->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PS->caption(), $this->PS->RequiredErrorMessage));
			}
		}
		if ($this->PV->Required) {
			if (!$this->PV->IsDetailKey && $this->PV->FormValue != NULL && $this->PV->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PV->caption(), $this->PV->RequiredErrorMessage));
			}
		}
		if ($this->clinicaldetails->Required) {
			if ($this->clinicaldetails->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->clinicaldetails->caption(), $this->clinicaldetails->RequiredErrorMessage));
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
		if ($this->PatientSearch->Required) {
			if (!$this->PatientSearch->IsDetailKey && $this->PatientSearch->FormValue != NULL && $this->PatientSearch->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PatientSearch->caption(), $this->PatientSearch->RequiredErrorMessage));
			}
		}
		if ($this->PatientId->Required) {
			if (!$this->PatientId->IsDetailKey && $this->PatientId->FormValue != NULL && $this->PatientId->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PatientId->caption(), $this->PatientId->RequiredErrorMessage));
			}
		}
		if ($this->Reception->Required) {
			if (!$this->Reception->IsDetailKey && $this->Reception->FormValue != NULL && $this->Reception->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Reception->caption(), $this->Reception->RequiredErrorMessage));
			}
		}
		if ($this->HospID->Required) {
			if (!$this->HospID->IsDetailKey && $this->HospID->FormValue != NULL && $this->HospID->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->HospID->caption(), $this->HospID->RequiredErrorMessage));
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

			// MobileNumber
			$this->MobileNumber->setDbValueDef($rsnew, $this->MobileNumber->CurrentValue, NULL, $this->MobileNumber->ReadOnly);

			// profilePic
			$this->profilePic->setDbValueDef($rsnew, $this->profilePic->CurrentValue, NULL, $this->profilePic->ReadOnly);

			// HT
			$this->HT->setDbValueDef($rsnew, $this->HT->CurrentValue, NULL, $this->HT->ReadOnly);

			// WT
			$this->WT->setDbValueDef($rsnew, $this->WT->CurrentValue, NULL, $this->WT->ReadOnly);

			// SurfaceArea
			$this->SurfaceArea->setDbValueDef($rsnew, $this->SurfaceArea->CurrentValue, NULL, $this->SurfaceArea->ReadOnly);

			// BodyMassIndex
			$this->BodyMassIndex->setDbValueDef($rsnew, $this->BodyMassIndex->CurrentValue, NULL, $this->BodyMassIndex->ReadOnly);

			// ClinicalFindings
			$this->ClinicalFindings->setDbValueDef($rsnew, $this->ClinicalFindings->CurrentValue, NULL, $this->ClinicalFindings->ReadOnly);

			// ClinicalDiagnosis
			$this->ClinicalDiagnosis->setDbValueDef($rsnew, $this->ClinicalDiagnosis->CurrentValue, NULL, $this->ClinicalDiagnosis->ReadOnly);

			// AnticoagulantifAny
			$this->AnticoagulantifAny->setDbValueDef($rsnew, $this->AnticoagulantifAny->CurrentValue, NULL, $this->AnticoagulantifAny->ReadOnly);

			// FoodAllergies
			$this->FoodAllergies->setDbValueDef($rsnew, $this->FoodAllergies->CurrentValue, NULL, $this->FoodAllergies->ReadOnly);

			// GenericAllergies
			$this->GenericAllergies->setDbValueDef($rsnew, $this->GenericAllergies->CurrentValue, NULL, $this->GenericAllergies->ReadOnly);

			// GroupAllergies
			$this->GroupAllergies->setDbValueDef($rsnew, $this->GroupAllergies->CurrentValue, NULL, $this->GroupAllergies->ReadOnly);

			// Temp
			$this->Temp->setDbValueDef($rsnew, $this->Temp->CurrentValue, NULL, $this->Temp->ReadOnly);

			// Pulse
			$this->Pulse->setDbValueDef($rsnew, $this->Pulse->CurrentValue, NULL, $this->Pulse->ReadOnly);

			// BP
			$this->BP->setDbValueDef($rsnew, $this->BP->CurrentValue, NULL, $this->BP->ReadOnly);

			// PR
			$this->PR->setDbValueDef($rsnew, $this->PR->CurrentValue, NULL, $this->PR->ReadOnly);

			// CNS
			$this->CNS->setDbValueDef($rsnew, $this->CNS->CurrentValue, NULL, $this->CNS->ReadOnly);

			// RSA
			$this->RSA->setDbValueDef($rsnew, $this->RSA->CurrentValue, NULL, $this->RSA->ReadOnly);

			// CVS
			$this->CVS->setDbValueDef($rsnew, $this->CVS->CurrentValue, NULL, $this->CVS->ReadOnly);

			// PA
			$this->PA->setDbValueDef($rsnew, $this->PA->CurrentValue, NULL, $this->PA->ReadOnly);

			// PS
			$this->PS->setDbValueDef($rsnew, $this->PS->CurrentValue, NULL, $this->PS->ReadOnly);

			// PV
			$this->PV->setDbValueDef($rsnew, $this->PV->CurrentValue, NULL, $this->PV->ReadOnly);

			// clinicaldetails
			$this->clinicaldetails->setDbValueDef($rsnew, $this->clinicaldetails->CurrentValue, NULL, $this->clinicaldetails->ReadOnly);

			// status
			$this->status->setDbValueDef($rsnew, $this->status->CurrentValue, NULL, $this->status->ReadOnly);

			// modifiedby
			$this->modifiedby->setDbValueDef($rsnew, CurrentUserName(), NULL);
			$rsnew['modifiedby'] = &$this->modifiedby->DbValue;

			// modifieddatetime
			$this->modifieddatetime->setDbValueDef($rsnew, CurrentDateTime(), NULL);
			$rsnew['modifieddatetime'] = &$this->modifieddatetime->DbValue;

			// Age
			$this->Age->setDbValueDef($rsnew, $this->Age->CurrentValue, NULL, $this->Age->ReadOnly);

			// Gender
			$this->Gender->setDbValueDef($rsnew, $this->Gender->CurrentValue, NULL, $this->Gender->ReadOnly);

			// PatientSearch
			$this->PatientSearch->setDbValueDef($rsnew, $this->PatientSearch->CurrentValue, "", $this->PatientSearch->ReadOnly);

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
		$Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("patient_vitalslist.php"), "", $this->TableVar, TRUE);
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
						case "x_AnticoagulantifAny":
							break;
						case "x_GenericAllergies":
							break;
						case "x_GroupAllergies":
							break;
						case "x_clinicaldetails":
							break;
						case "x_status":
							break;
						case "x_PatientSearch":
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
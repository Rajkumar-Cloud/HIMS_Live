<?php
namespace PHPMaker2019\HIMS;

/**
 * Page class
 */
class patient_investigations_edit extends patient_investigations
{

	// Page ID
	public $PageID = "edit";

	// Project ID
	public $ProjectID = "{EA4F6D13-AF8F-428D-9EA7-BA88D1107EC3}";

	// Table name
	public $TableName = 'patient_investigations';

	// Page object name
	public $PageObjName = "patient_investigations_edit";

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

		// Table object (patient_investigations)
		if (!isset($GLOBALS["patient_investigations"]) || get_class($GLOBALS["patient_investigations"]) == PROJECT_NAMESPACE . "patient_investigations") {
			$GLOBALS["patient_investigations"] = &$this;
			$GLOBALS["Table"] = &$GLOBALS["patient_investigations"];
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
			define(PROJECT_NAMESPACE . "TABLE_NAME", 'patient_investigations');

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
		global $EXPORT, $patient_investigations;
		if ($this->CustomExport && $this->CustomExport == $this->Export && array_key_exists($this->CustomExport, $EXPORT)) {
				$content = ob_get_contents();
			if ($ExportFileName == "")
				$ExportFileName = $this->TableVar;
			$class = PROJECT_NAMESPACE . $EXPORT[$this->CustomExport];
			if (class_exists($class)) {
				$doc = new $class($patient_investigations);
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
					if ($pageName == "patient_investigationsview.php")
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
					$this->terminate(GetUrl("patient_investigationslist.php"));
				else
					$this->terminate(GetUrl("login.php"));
				return;
			}
		}

		// Create form object
		$CurrentForm = new HttpForm();
		$this->CurrentAction = Param("action"); // Set up current action
		$this->id->setVisibility();
		$this->Reception->setVisibility();
		$this->PatientId->setVisibility();
		$this->PatientName->setVisibility();
		$this->Investigation->setVisibility();
		$this->Value->setVisibility();
		$this->NormalRange->setVisibility();
		$this->mrnno->setVisibility();
		$this->Age->setVisibility();
		$this->Gender->setVisibility();
		$this->profilePic->setVisibility();
		$this->SampleCollected->setVisibility();
		$this->SampleCollectedBy->setVisibility();
		$this->ResultedDate->setVisibility();
		$this->ResultedBy->setVisibility();
		$this->Modified->setVisibility();
		$this->ModifiedBy->setVisibility();
		$this->Created->setVisibility();
		$this->CreatedBy->setVisibility();
		$this->GroupHead->setVisibility();
		$this->Cost->setVisibility();
		$this->PaymentStatus->setVisibility();
		$this->PayMode->setVisibility();
		$this->VoucherNo->setVisibility();
		$this->InvestigationMultiselect->setVisibility();
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
					$this->terminate("patient_investigationslist.php"); // No matching record, return to list
				}
				break;
			case "update": // Update
				$returnUrl = $this->getReturnUrl();
				if (GetPageName($returnUrl) == "patient_investigationslist.php")
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

		// Check field name 'PatientName' first before field var 'x_PatientName'
		$val = $CurrentForm->hasValue("PatientName") ? $CurrentForm->getValue("PatientName") : $CurrentForm->getValue("x_PatientName");
		if (!$this->PatientName->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->PatientName->Visible = FALSE; // Disable update for API request
			else
				$this->PatientName->setFormValue($val);
		}

		// Check field name 'Investigation' first before field var 'x_Investigation'
		$val = $CurrentForm->hasValue("Investigation") ? $CurrentForm->getValue("Investigation") : $CurrentForm->getValue("x_Investigation");
		if (!$this->Investigation->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Investigation->Visible = FALSE; // Disable update for API request
			else
				$this->Investigation->setFormValue($val);
		}

		// Check field name 'Value' first before field var 'x_Value'
		$val = $CurrentForm->hasValue("Value") ? $CurrentForm->getValue("Value") : $CurrentForm->getValue("x_Value");
		if (!$this->Value->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Value->Visible = FALSE; // Disable update for API request
			else
				$this->Value->setFormValue($val);
		}

		// Check field name 'NormalRange' first before field var 'x_NormalRange'
		$val = $CurrentForm->hasValue("NormalRange") ? $CurrentForm->getValue("NormalRange") : $CurrentForm->getValue("x_NormalRange");
		if (!$this->NormalRange->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->NormalRange->Visible = FALSE; // Disable update for API request
			else
				$this->NormalRange->setFormValue($val);
		}

		// Check field name 'mrnno' first before field var 'x_mrnno'
		$val = $CurrentForm->hasValue("mrnno") ? $CurrentForm->getValue("mrnno") : $CurrentForm->getValue("x_mrnno");
		if (!$this->mrnno->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->mrnno->Visible = FALSE; // Disable update for API request
			else
				$this->mrnno->setFormValue($val);
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

		// Check field name 'SampleCollected' first before field var 'x_SampleCollected'
		$val = $CurrentForm->hasValue("SampleCollected") ? $CurrentForm->getValue("SampleCollected") : $CurrentForm->getValue("x_SampleCollected");
		if (!$this->SampleCollected->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->SampleCollected->Visible = FALSE; // Disable update for API request
			else
				$this->SampleCollected->setFormValue($val);
			$this->SampleCollected->CurrentValue = UnFormatDateTime($this->SampleCollected->CurrentValue, 0);
		}

		// Check field name 'SampleCollectedBy' first before field var 'x_SampleCollectedBy'
		$val = $CurrentForm->hasValue("SampleCollectedBy") ? $CurrentForm->getValue("SampleCollectedBy") : $CurrentForm->getValue("x_SampleCollectedBy");
		if (!$this->SampleCollectedBy->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->SampleCollectedBy->Visible = FALSE; // Disable update for API request
			else
				$this->SampleCollectedBy->setFormValue($val);
		}

		// Check field name 'ResultedDate' first before field var 'x_ResultedDate'
		$val = $CurrentForm->hasValue("ResultedDate") ? $CurrentForm->getValue("ResultedDate") : $CurrentForm->getValue("x_ResultedDate");
		if (!$this->ResultedDate->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->ResultedDate->Visible = FALSE; // Disable update for API request
			else
				$this->ResultedDate->setFormValue($val);
			$this->ResultedDate->CurrentValue = UnFormatDateTime($this->ResultedDate->CurrentValue, 0);
		}

		// Check field name 'ResultedBy' first before field var 'x_ResultedBy'
		$val = $CurrentForm->hasValue("ResultedBy") ? $CurrentForm->getValue("ResultedBy") : $CurrentForm->getValue("x_ResultedBy");
		if (!$this->ResultedBy->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->ResultedBy->Visible = FALSE; // Disable update for API request
			else
				$this->ResultedBy->setFormValue($val);
		}

		// Check field name 'Modified' first before field var 'x_Modified'
		$val = $CurrentForm->hasValue("Modified") ? $CurrentForm->getValue("Modified") : $CurrentForm->getValue("x_Modified");
		if (!$this->Modified->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Modified->Visible = FALSE; // Disable update for API request
			else
				$this->Modified->setFormValue($val);
			$this->Modified->CurrentValue = UnFormatDateTime($this->Modified->CurrentValue, 0);
		}

		// Check field name 'ModifiedBy' first before field var 'x_ModifiedBy'
		$val = $CurrentForm->hasValue("ModifiedBy") ? $CurrentForm->getValue("ModifiedBy") : $CurrentForm->getValue("x_ModifiedBy");
		if (!$this->ModifiedBy->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->ModifiedBy->Visible = FALSE; // Disable update for API request
			else
				$this->ModifiedBy->setFormValue($val);
		}

		// Check field name 'Created' first before field var 'x_Created'
		$val = $CurrentForm->hasValue("Created") ? $CurrentForm->getValue("Created") : $CurrentForm->getValue("x_Created");
		if (!$this->Created->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Created->Visible = FALSE; // Disable update for API request
			else
				$this->Created->setFormValue($val);
			$this->Created->CurrentValue = UnFormatDateTime($this->Created->CurrentValue, 0);
		}

		// Check field name 'CreatedBy' first before field var 'x_CreatedBy'
		$val = $CurrentForm->hasValue("CreatedBy") ? $CurrentForm->getValue("CreatedBy") : $CurrentForm->getValue("x_CreatedBy");
		if (!$this->CreatedBy->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->CreatedBy->Visible = FALSE; // Disable update for API request
			else
				$this->CreatedBy->setFormValue($val);
		}

		// Check field name 'GroupHead' first before field var 'x_GroupHead'
		$val = $CurrentForm->hasValue("GroupHead") ? $CurrentForm->getValue("GroupHead") : $CurrentForm->getValue("x_GroupHead");
		if (!$this->GroupHead->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->GroupHead->Visible = FALSE; // Disable update for API request
			else
				$this->GroupHead->setFormValue($val);
		}

		// Check field name 'Cost' first before field var 'x_Cost'
		$val = $CurrentForm->hasValue("Cost") ? $CurrentForm->getValue("Cost") : $CurrentForm->getValue("x_Cost");
		if (!$this->Cost->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Cost->Visible = FALSE; // Disable update for API request
			else
				$this->Cost->setFormValue($val);
		}

		// Check field name 'PaymentStatus' first before field var 'x_PaymentStatus'
		$val = $CurrentForm->hasValue("PaymentStatus") ? $CurrentForm->getValue("PaymentStatus") : $CurrentForm->getValue("x_PaymentStatus");
		if (!$this->PaymentStatus->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->PaymentStatus->Visible = FALSE; // Disable update for API request
			else
				$this->PaymentStatus->setFormValue($val);
		}

		// Check field name 'PayMode' first before field var 'x_PayMode'
		$val = $CurrentForm->hasValue("PayMode") ? $CurrentForm->getValue("PayMode") : $CurrentForm->getValue("x_PayMode");
		if (!$this->PayMode->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->PayMode->Visible = FALSE; // Disable update for API request
			else
				$this->PayMode->setFormValue($val);
		}

		// Check field name 'VoucherNo' first before field var 'x_VoucherNo'
		$val = $CurrentForm->hasValue("VoucherNo") ? $CurrentForm->getValue("VoucherNo") : $CurrentForm->getValue("x_VoucherNo");
		if (!$this->VoucherNo->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->VoucherNo->Visible = FALSE; // Disable update for API request
			else
				$this->VoucherNo->setFormValue($val);
		}

		// Check field name 'InvestigationMultiselect' first before field var 'x_InvestigationMultiselect'
		$val = $CurrentForm->hasValue("InvestigationMultiselect") ? $CurrentForm->getValue("InvestigationMultiselect") : $CurrentForm->getValue("x_InvestigationMultiselect");
		if (!$this->InvestigationMultiselect->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->InvestigationMultiselect->Visible = FALSE; // Disable update for API request
			else
				$this->InvestigationMultiselect->setFormValue($val);
		}
	}

	// Restore form values
	public function restoreFormValues()
	{
		global $CurrentForm;
		$this->id->CurrentValue = $this->id->FormValue;
		$this->Reception->CurrentValue = $this->Reception->FormValue;
		$this->PatientId->CurrentValue = $this->PatientId->FormValue;
		$this->PatientName->CurrentValue = $this->PatientName->FormValue;
		$this->Investigation->CurrentValue = $this->Investigation->FormValue;
		$this->Value->CurrentValue = $this->Value->FormValue;
		$this->NormalRange->CurrentValue = $this->NormalRange->FormValue;
		$this->mrnno->CurrentValue = $this->mrnno->FormValue;
		$this->Age->CurrentValue = $this->Age->FormValue;
		$this->Gender->CurrentValue = $this->Gender->FormValue;
		$this->profilePic->CurrentValue = $this->profilePic->FormValue;
		$this->SampleCollected->CurrentValue = $this->SampleCollected->FormValue;
		$this->SampleCollected->CurrentValue = UnFormatDateTime($this->SampleCollected->CurrentValue, 0);
		$this->SampleCollectedBy->CurrentValue = $this->SampleCollectedBy->FormValue;
		$this->ResultedDate->CurrentValue = $this->ResultedDate->FormValue;
		$this->ResultedDate->CurrentValue = UnFormatDateTime($this->ResultedDate->CurrentValue, 0);
		$this->ResultedBy->CurrentValue = $this->ResultedBy->FormValue;
		$this->Modified->CurrentValue = $this->Modified->FormValue;
		$this->Modified->CurrentValue = UnFormatDateTime($this->Modified->CurrentValue, 0);
		$this->ModifiedBy->CurrentValue = $this->ModifiedBy->FormValue;
		$this->Created->CurrentValue = $this->Created->FormValue;
		$this->Created->CurrentValue = UnFormatDateTime($this->Created->CurrentValue, 0);
		$this->CreatedBy->CurrentValue = $this->CreatedBy->FormValue;
		$this->GroupHead->CurrentValue = $this->GroupHead->FormValue;
		$this->Cost->CurrentValue = $this->Cost->FormValue;
		$this->PaymentStatus->CurrentValue = $this->PaymentStatus->FormValue;
		$this->PayMode->CurrentValue = $this->PayMode->FormValue;
		$this->VoucherNo->CurrentValue = $this->VoucherNo->FormValue;
		$this->InvestigationMultiselect->CurrentValue = $this->InvestigationMultiselect->FormValue;
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
		$this->Reception->setDbValue($row['Reception']);
		$this->PatientId->setDbValue($row['PatientId']);
		$this->PatientName->setDbValue($row['PatientName']);
		$this->Investigation->setDbValue($row['Investigation']);
		$this->Value->setDbValue($row['Value']);
		$this->NormalRange->setDbValue($row['NormalRange']);
		$this->mrnno->setDbValue($row['mrnno']);
		$this->Age->setDbValue($row['Age']);
		$this->Gender->setDbValue($row['Gender']);
		$this->profilePic->setDbValue($row['profilePic']);
		$this->SampleCollected->setDbValue($row['SampleCollected']);
		$this->SampleCollectedBy->setDbValue($row['SampleCollectedBy']);
		$this->ResultedDate->setDbValue($row['ResultedDate']);
		$this->ResultedBy->setDbValue($row['ResultedBy']);
		$this->Modified->setDbValue($row['Modified']);
		$this->ModifiedBy->setDbValue($row['ModifiedBy']);
		$this->Created->setDbValue($row['Created']);
		$this->CreatedBy->setDbValue($row['CreatedBy']);
		$this->GroupHead->setDbValue($row['GroupHead']);
		$this->Cost->setDbValue($row['Cost']);
		$this->PaymentStatus->setDbValue($row['PaymentStatus']);
		$this->PayMode->setDbValue($row['PayMode']);
		$this->VoucherNo->setDbValue($row['VoucherNo']);
		$this->InvestigationMultiselect->setDbValue($row['InvestigationMultiselect']);
	}

	// Return a row with default values
	protected function newRow()
	{
		$row = [];
		$row['id'] = NULL;
		$row['Reception'] = NULL;
		$row['PatientId'] = NULL;
		$row['PatientName'] = NULL;
		$row['Investigation'] = NULL;
		$row['Value'] = NULL;
		$row['NormalRange'] = NULL;
		$row['mrnno'] = NULL;
		$row['Age'] = NULL;
		$row['Gender'] = NULL;
		$row['profilePic'] = NULL;
		$row['SampleCollected'] = NULL;
		$row['SampleCollectedBy'] = NULL;
		$row['ResultedDate'] = NULL;
		$row['ResultedBy'] = NULL;
		$row['Modified'] = NULL;
		$row['ModifiedBy'] = NULL;
		$row['Created'] = NULL;
		$row['CreatedBy'] = NULL;
		$row['GroupHead'] = NULL;
		$row['Cost'] = NULL;
		$row['PaymentStatus'] = NULL;
		$row['PayMode'] = NULL;
		$row['VoucherNo'] = NULL;
		$row['InvestigationMultiselect'] = NULL;
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
		// Convert decimal values if posted back

		if ($this->Cost->FormValue == $this->Cost->CurrentValue && is_numeric(ConvertToFloatString($this->Cost->CurrentValue)))
			$this->Cost->CurrentValue = ConvertToFloatString($this->Cost->CurrentValue);

		// Call Row_Rendering event
		$this->Row_Rendering();

		// Common render codes for all row types
		// id
		// Reception
		// PatientId
		// PatientName
		// Investigation
		// Value
		// NormalRange
		// mrnno
		// Age
		// Gender
		// profilePic
		// SampleCollected
		// SampleCollectedBy
		// ResultedDate
		// ResultedBy
		// Modified
		// ModifiedBy
		// Created
		// CreatedBy
		// GroupHead
		// Cost
		// PaymentStatus
		// PayMode
		// VoucherNo
		// InvestigationMultiselect

		if ($this->RowType == ROWTYPE_VIEW) { // View row

			// id
			$this->id->ViewValue = $this->id->CurrentValue;
			$this->id->ViewCustomAttributes = "";

			// Reception
			$this->Reception->ViewValue = $this->Reception->CurrentValue;
			$this->Reception->ViewCustomAttributes = "";

			// PatientId
			$this->PatientId->ViewValue = $this->PatientId->CurrentValue;
			$this->PatientId->ViewCustomAttributes = "";

			// PatientName
			$this->PatientName->ViewValue = $this->PatientName->CurrentValue;
			$this->PatientName->ViewCustomAttributes = "";

			// Investigation
			$this->Investigation->ViewValue = $this->Investigation->CurrentValue;
			$this->Investigation->ViewCustomAttributes = "";

			// Value
			$this->Value->ViewValue = $this->Value->CurrentValue;
			$this->Value->ViewCustomAttributes = "";

			// NormalRange
			$this->NormalRange->ViewValue = $this->NormalRange->CurrentValue;
			$this->NormalRange->ViewCustomAttributes = "";

			// mrnno
			$this->mrnno->ViewValue = $this->mrnno->CurrentValue;
			$this->mrnno->ViewCustomAttributes = "";

			// Age
			$this->Age->ViewValue = $this->Age->CurrentValue;
			$this->Age->ViewCustomAttributes = "";

			// Gender
			$this->Gender->ViewValue = $this->Gender->CurrentValue;
			$this->Gender->ViewCustomAttributes = "";

			// profilePic
			$this->profilePic->ViewValue = $this->profilePic->CurrentValue;
			$this->profilePic->ViewCustomAttributes = "";

			// SampleCollected
			$this->SampleCollected->ViewValue = $this->SampleCollected->CurrentValue;
			$this->SampleCollected->ViewValue = FormatDateTime($this->SampleCollected->ViewValue, 0);
			$this->SampleCollected->ViewCustomAttributes = "";

			// SampleCollectedBy
			$this->SampleCollectedBy->ViewValue = $this->SampleCollectedBy->CurrentValue;
			$this->SampleCollectedBy->ViewCustomAttributes = "";

			// ResultedDate
			$this->ResultedDate->ViewValue = $this->ResultedDate->CurrentValue;
			$this->ResultedDate->ViewValue = FormatDateTime($this->ResultedDate->ViewValue, 0);
			$this->ResultedDate->ViewCustomAttributes = "";

			// ResultedBy
			$this->ResultedBy->ViewValue = $this->ResultedBy->CurrentValue;
			$this->ResultedBy->ViewCustomAttributes = "";

			// Modified
			$this->Modified->ViewValue = $this->Modified->CurrentValue;
			$this->Modified->ViewValue = FormatDateTime($this->Modified->ViewValue, 0);
			$this->Modified->ViewCustomAttributes = "";

			// ModifiedBy
			$this->ModifiedBy->ViewValue = $this->ModifiedBy->CurrentValue;
			$this->ModifiedBy->ViewCustomAttributes = "";

			// Created
			$this->Created->ViewValue = $this->Created->CurrentValue;
			$this->Created->ViewValue = FormatDateTime($this->Created->ViewValue, 0);
			$this->Created->ViewCustomAttributes = "";

			// CreatedBy
			$this->CreatedBy->ViewValue = $this->CreatedBy->CurrentValue;
			$this->CreatedBy->ViewCustomAttributes = "";

			// GroupHead
			$this->GroupHead->ViewValue = $this->GroupHead->CurrentValue;
			$this->GroupHead->ViewCustomAttributes = "";

			// Cost
			$this->Cost->ViewValue = $this->Cost->CurrentValue;
			$this->Cost->ViewValue = FormatNumber($this->Cost->ViewValue, 2, -2, -2, -2);
			$this->Cost->ViewCustomAttributes = "";

			// PaymentStatus
			$this->PaymentStatus->ViewValue = $this->PaymentStatus->CurrentValue;
			$this->PaymentStatus->ViewCustomAttributes = "";

			// PayMode
			$this->PayMode->ViewValue = $this->PayMode->CurrentValue;
			$this->PayMode->ViewCustomAttributes = "";

			// VoucherNo
			$this->VoucherNo->ViewValue = $this->VoucherNo->CurrentValue;
			$this->VoucherNo->ViewCustomAttributes = "";

			// InvestigationMultiselect
			$this->InvestigationMultiselect->ViewValue = $this->InvestigationMultiselect->CurrentValue;
			$this->InvestigationMultiselect->ViewCustomAttributes = "";

			// id
			$this->id->LinkCustomAttributes = "";
			$this->id->HrefValue = "";
			$this->id->TooltipValue = "";

			// Reception
			$this->Reception->LinkCustomAttributes = "";
			$this->Reception->HrefValue = "";
			$this->Reception->TooltipValue = "";

			// PatientId
			$this->PatientId->LinkCustomAttributes = "";
			$this->PatientId->HrefValue = "";
			$this->PatientId->TooltipValue = "";

			// PatientName
			$this->PatientName->LinkCustomAttributes = "";
			$this->PatientName->HrefValue = "";
			$this->PatientName->TooltipValue = "";

			// Investigation
			$this->Investigation->LinkCustomAttributes = "";
			$this->Investigation->HrefValue = "";
			$this->Investigation->TooltipValue = "";

			// Value
			$this->Value->LinkCustomAttributes = "";
			$this->Value->HrefValue = "";
			$this->Value->TooltipValue = "";

			// NormalRange
			$this->NormalRange->LinkCustomAttributes = "";
			$this->NormalRange->HrefValue = "";
			$this->NormalRange->TooltipValue = "";

			// mrnno
			$this->mrnno->LinkCustomAttributes = "";
			$this->mrnno->HrefValue = "";
			$this->mrnno->TooltipValue = "";

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

			// SampleCollected
			$this->SampleCollected->LinkCustomAttributes = "";
			$this->SampleCollected->HrefValue = "";
			$this->SampleCollected->TooltipValue = "";

			// SampleCollectedBy
			$this->SampleCollectedBy->LinkCustomAttributes = "";
			$this->SampleCollectedBy->HrefValue = "";
			$this->SampleCollectedBy->TooltipValue = "";

			// ResultedDate
			$this->ResultedDate->LinkCustomAttributes = "";
			$this->ResultedDate->HrefValue = "";
			$this->ResultedDate->TooltipValue = "";

			// ResultedBy
			$this->ResultedBy->LinkCustomAttributes = "";
			$this->ResultedBy->HrefValue = "";
			$this->ResultedBy->TooltipValue = "";

			// Modified
			$this->Modified->LinkCustomAttributes = "";
			$this->Modified->HrefValue = "";
			$this->Modified->TooltipValue = "";

			// ModifiedBy
			$this->ModifiedBy->LinkCustomAttributes = "";
			$this->ModifiedBy->HrefValue = "";
			$this->ModifiedBy->TooltipValue = "";

			// Created
			$this->Created->LinkCustomAttributes = "";
			$this->Created->HrefValue = "";
			$this->Created->TooltipValue = "";

			// CreatedBy
			$this->CreatedBy->LinkCustomAttributes = "";
			$this->CreatedBy->HrefValue = "";
			$this->CreatedBy->TooltipValue = "";

			// GroupHead
			$this->GroupHead->LinkCustomAttributes = "";
			$this->GroupHead->HrefValue = "";
			$this->GroupHead->TooltipValue = "";

			// Cost
			$this->Cost->LinkCustomAttributes = "";
			$this->Cost->HrefValue = "";
			$this->Cost->TooltipValue = "";

			// PaymentStatus
			$this->PaymentStatus->LinkCustomAttributes = "";
			$this->PaymentStatus->HrefValue = "";
			$this->PaymentStatus->TooltipValue = "";

			// PayMode
			$this->PayMode->LinkCustomAttributes = "";
			$this->PayMode->HrefValue = "";
			$this->PayMode->TooltipValue = "";

			// VoucherNo
			$this->VoucherNo->LinkCustomAttributes = "";
			$this->VoucherNo->HrefValue = "";
			$this->VoucherNo->TooltipValue = "";

			// InvestigationMultiselect
			$this->InvestigationMultiselect->LinkCustomAttributes = "";
			$this->InvestigationMultiselect->HrefValue = "";
			$this->InvestigationMultiselect->TooltipValue = "";
		} elseif ($this->RowType == ROWTYPE_EDIT) { // Edit row

			// id
			$this->id->EditAttrs["class"] = "form-control";
			$this->id->EditCustomAttributes = "";
			$this->id->EditValue = $this->id->CurrentValue;
			$this->id->ViewCustomAttributes = "";

			// Reception
			$this->Reception->EditAttrs["class"] = "form-control";
			$this->Reception->EditCustomAttributes = "";
			$this->Reception->EditValue = $this->Reception->CurrentValue;
			$this->Reception->ViewCustomAttributes = "";

			// PatientId
			$this->PatientId->EditAttrs["class"] = "form-control";
			$this->PatientId->EditCustomAttributes = "";
			$this->PatientId->EditValue = $this->PatientId->CurrentValue;
			$this->PatientId->ViewCustomAttributes = "";

			// PatientName
			$this->PatientName->EditAttrs["class"] = "form-control";
			$this->PatientName->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->PatientName->CurrentValue = HtmlDecode($this->PatientName->CurrentValue);
			$this->PatientName->EditValue = HtmlEncode($this->PatientName->CurrentValue);
			$this->PatientName->PlaceHolder = RemoveHtml($this->PatientName->caption());

			// Investigation
			$this->Investigation->EditAttrs["class"] = "form-control";
			$this->Investigation->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Investigation->CurrentValue = HtmlDecode($this->Investigation->CurrentValue);
			$this->Investigation->EditValue = HtmlEncode($this->Investigation->CurrentValue);
			$this->Investigation->PlaceHolder = RemoveHtml($this->Investigation->caption());

			// Value
			$this->Value->EditAttrs["class"] = "form-control";
			$this->Value->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Value->CurrentValue = HtmlDecode($this->Value->CurrentValue);
			$this->Value->EditValue = HtmlEncode($this->Value->CurrentValue);
			$this->Value->PlaceHolder = RemoveHtml($this->Value->caption());

			// NormalRange
			$this->NormalRange->EditAttrs["class"] = "form-control";
			$this->NormalRange->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->NormalRange->CurrentValue = HtmlDecode($this->NormalRange->CurrentValue);
			$this->NormalRange->EditValue = HtmlEncode($this->NormalRange->CurrentValue);
			$this->NormalRange->PlaceHolder = RemoveHtml($this->NormalRange->caption());

			// mrnno
			$this->mrnno->EditAttrs["class"] = "form-control";
			$this->mrnno->EditCustomAttributes = "";
			$this->mrnno->EditValue = $this->mrnno->CurrentValue;
			$this->mrnno->ViewCustomAttributes = "";

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

			// SampleCollected
			$this->SampleCollected->EditAttrs["class"] = "form-control";
			$this->SampleCollected->EditCustomAttributes = "";
			$this->SampleCollected->EditValue = HtmlEncode(FormatDateTime($this->SampleCollected->CurrentValue, 8));
			$this->SampleCollected->PlaceHolder = RemoveHtml($this->SampleCollected->caption());

			// SampleCollectedBy
			$this->SampleCollectedBy->EditAttrs["class"] = "form-control";
			$this->SampleCollectedBy->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->SampleCollectedBy->CurrentValue = HtmlDecode($this->SampleCollectedBy->CurrentValue);
			$this->SampleCollectedBy->EditValue = HtmlEncode($this->SampleCollectedBy->CurrentValue);
			$this->SampleCollectedBy->PlaceHolder = RemoveHtml($this->SampleCollectedBy->caption());

			// ResultedDate
			$this->ResultedDate->EditAttrs["class"] = "form-control";
			$this->ResultedDate->EditCustomAttributes = "";
			$this->ResultedDate->EditValue = HtmlEncode(FormatDateTime($this->ResultedDate->CurrentValue, 8));
			$this->ResultedDate->PlaceHolder = RemoveHtml($this->ResultedDate->caption());

			// ResultedBy
			$this->ResultedBy->EditAttrs["class"] = "form-control";
			$this->ResultedBy->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->ResultedBy->CurrentValue = HtmlDecode($this->ResultedBy->CurrentValue);
			$this->ResultedBy->EditValue = HtmlEncode($this->ResultedBy->CurrentValue);
			$this->ResultedBy->PlaceHolder = RemoveHtml($this->ResultedBy->caption());

			// Modified
			$this->Modified->EditAttrs["class"] = "form-control";
			$this->Modified->EditCustomAttributes = "";
			$this->Modified->EditValue = HtmlEncode(FormatDateTime($this->Modified->CurrentValue, 8));
			$this->Modified->PlaceHolder = RemoveHtml($this->Modified->caption());

			// ModifiedBy
			$this->ModifiedBy->EditAttrs["class"] = "form-control";
			$this->ModifiedBy->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->ModifiedBy->CurrentValue = HtmlDecode($this->ModifiedBy->CurrentValue);
			$this->ModifiedBy->EditValue = HtmlEncode($this->ModifiedBy->CurrentValue);
			$this->ModifiedBy->PlaceHolder = RemoveHtml($this->ModifiedBy->caption());

			// Created
			$this->Created->EditAttrs["class"] = "form-control";
			$this->Created->EditCustomAttributes = "";
			$this->Created->EditValue = HtmlEncode(FormatDateTime($this->Created->CurrentValue, 8));
			$this->Created->PlaceHolder = RemoveHtml($this->Created->caption());

			// CreatedBy
			$this->CreatedBy->EditAttrs["class"] = "form-control";
			$this->CreatedBy->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->CreatedBy->CurrentValue = HtmlDecode($this->CreatedBy->CurrentValue);
			$this->CreatedBy->EditValue = HtmlEncode($this->CreatedBy->CurrentValue);
			$this->CreatedBy->PlaceHolder = RemoveHtml($this->CreatedBy->caption());

			// GroupHead
			$this->GroupHead->EditAttrs["class"] = "form-control";
			$this->GroupHead->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->GroupHead->CurrentValue = HtmlDecode($this->GroupHead->CurrentValue);
			$this->GroupHead->EditValue = HtmlEncode($this->GroupHead->CurrentValue);
			$this->GroupHead->PlaceHolder = RemoveHtml($this->GroupHead->caption());

			// Cost
			$this->Cost->EditAttrs["class"] = "form-control";
			$this->Cost->EditCustomAttributes = "";
			$this->Cost->EditValue = HtmlEncode($this->Cost->CurrentValue);
			$this->Cost->PlaceHolder = RemoveHtml($this->Cost->caption());
			if (strval($this->Cost->EditValue) <> "" && is_numeric($this->Cost->EditValue))
				$this->Cost->EditValue = FormatNumber($this->Cost->EditValue, -2, -2, -2, -2);

			// PaymentStatus
			$this->PaymentStatus->EditAttrs["class"] = "form-control";
			$this->PaymentStatus->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->PaymentStatus->CurrentValue = HtmlDecode($this->PaymentStatus->CurrentValue);
			$this->PaymentStatus->EditValue = HtmlEncode($this->PaymentStatus->CurrentValue);
			$this->PaymentStatus->PlaceHolder = RemoveHtml($this->PaymentStatus->caption());

			// PayMode
			$this->PayMode->EditAttrs["class"] = "form-control";
			$this->PayMode->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->PayMode->CurrentValue = HtmlDecode($this->PayMode->CurrentValue);
			$this->PayMode->EditValue = HtmlEncode($this->PayMode->CurrentValue);
			$this->PayMode->PlaceHolder = RemoveHtml($this->PayMode->caption());

			// VoucherNo
			$this->VoucherNo->EditAttrs["class"] = "form-control";
			$this->VoucherNo->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->VoucherNo->CurrentValue = HtmlDecode($this->VoucherNo->CurrentValue);
			$this->VoucherNo->EditValue = HtmlEncode($this->VoucherNo->CurrentValue);
			$this->VoucherNo->PlaceHolder = RemoveHtml($this->VoucherNo->caption());

			// InvestigationMultiselect
			$this->InvestigationMultiselect->EditAttrs["class"] = "form-control";
			$this->InvestigationMultiselect->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->InvestigationMultiselect->CurrentValue = HtmlDecode($this->InvestigationMultiselect->CurrentValue);
			$this->InvestigationMultiselect->EditValue = HtmlEncode($this->InvestigationMultiselect->CurrentValue);
			$this->InvestigationMultiselect->PlaceHolder = RemoveHtml($this->InvestigationMultiselect->caption());

			// Edit refer script
			// id

			$this->id->LinkCustomAttributes = "";
			$this->id->HrefValue = "";

			// Reception
			$this->Reception->LinkCustomAttributes = "";
			$this->Reception->HrefValue = "";
			$this->Reception->TooltipValue = "";

			// PatientId
			$this->PatientId->LinkCustomAttributes = "";
			$this->PatientId->HrefValue = "";
			$this->PatientId->TooltipValue = "";

			// PatientName
			$this->PatientName->LinkCustomAttributes = "";
			$this->PatientName->HrefValue = "";

			// Investigation
			$this->Investigation->LinkCustomAttributes = "";
			$this->Investigation->HrefValue = "";

			// Value
			$this->Value->LinkCustomAttributes = "";
			$this->Value->HrefValue = "";

			// NormalRange
			$this->NormalRange->LinkCustomAttributes = "";
			$this->NormalRange->HrefValue = "";

			// mrnno
			$this->mrnno->LinkCustomAttributes = "";
			$this->mrnno->HrefValue = "";
			$this->mrnno->TooltipValue = "";

			// Age
			$this->Age->LinkCustomAttributes = "";
			$this->Age->HrefValue = "";

			// Gender
			$this->Gender->LinkCustomAttributes = "";
			$this->Gender->HrefValue = "";

			// profilePic
			$this->profilePic->LinkCustomAttributes = "";
			$this->profilePic->HrefValue = "";

			// SampleCollected
			$this->SampleCollected->LinkCustomAttributes = "";
			$this->SampleCollected->HrefValue = "";

			// SampleCollectedBy
			$this->SampleCollectedBy->LinkCustomAttributes = "";
			$this->SampleCollectedBy->HrefValue = "";

			// ResultedDate
			$this->ResultedDate->LinkCustomAttributes = "";
			$this->ResultedDate->HrefValue = "";

			// ResultedBy
			$this->ResultedBy->LinkCustomAttributes = "";
			$this->ResultedBy->HrefValue = "";

			// Modified
			$this->Modified->LinkCustomAttributes = "";
			$this->Modified->HrefValue = "";

			// ModifiedBy
			$this->ModifiedBy->LinkCustomAttributes = "";
			$this->ModifiedBy->HrefValue = "";

			// Created
			$this->Created->LinkCustomAttributes = "";
			$this->Created->HrefValue = "";

			// CreatedBy
			$this->CreatedBy->LinkCustomAttributes = "";
			$this->CreatedBy->HrefValue = "";

			// GroupHead
			$this->GroupHead->LinkCustomAttributes = "";
			$this->GroupHead->HrefValue = "";

			// Cost
			$this->Cost->LinkCustomAttributes = "";
			$this->Cost->HrefValue = "";

			// PaymentStatus
			$this->PaymentStatus->LinkCustomAttributes = "";
			$this->PaymentStatus->HrefValue = "";

			// PayMode
			$this->PayMode->LinkCustomAttributes = "";
			$this->PayMode->HrefValue = "";

			// VoucherNo
			$this->VoucherNo->LinkCustomAttributes = "";
			$this->VoucherNo->HrefValue = "";

			// InvestigationMultiselect
			$this->InvestigationMultiselect->LinkCustomAttributes = "";
			$this->InvestigationMultiselect->HrefValue = "";
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
		if ($this->PatientName->Required) {
			if (!$this->PatientName->IsDetailKey && $this->PatientName->FormValue != NULL && $this->PatientName->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PatientName->caption(), $this->PatientName->RequiredErrorMessage));
			}
		}
		if ($this->Investigation->Required) {
			if (!$this->Investigation->IsDetailKey && $this->Investigation->FormValue != NULL && $this->Investigation->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Investigation->caption(), $this->Investigation->RequiredErrorMessage));
			}
		}
		if ($this->Value->Required) {
			if (!$this->Value->IsDetailKey && $this->Value->FormValue != NULL && $this->Value->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Value->caption(), $this->Value->RequiredErrorMessage));
			}
		}
		if ($this->NormalRange->Required) {
			if (!$this->NormalRange->IsDetailKey && $this->NormalRange->FormValue != NULL && $this->NormalRange->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->NormalRange->caption(), $this->NormalRange->RequiredErrorMessage));
			}
		}
		if ($this->mrnno->Required) {
			if (!$this->mrnno->IsDetailKey && $this->mrnno->FormValue != NULL && $this->mrnno->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->mrnno->caption(), $this->mrnno->RequiredErrorMessage));
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
		if ($this->SampleCollected->Required) {
			if (!$this->SampleCollected->IsDetailKey && $this->SampleCollected->FormValue != NULL && $this->SampleCollected->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->SampleCollected->caption(), $this->SampleCollected->RequiredErrorMessage));
			}
		}
		if (!CheckDate($this->SampleCollected->FormValue)) {
			AddMessage($FormError, $this->SampleCollected->errorMessage());
		}
		if ($this->SampleCollectedBy->Required) {
			if (!$this->SampleCollectedBy->IsDetailKey && $this->SampleCollectedBy->FormValue != NULL && $this->SampleCollectedBy->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->SampleCollectedBy->caption(), $this->SampleCollectedBy->RequiredErrorMessage));
			}
		}
		if ($this->ResultedDate->Required) {
			if (!$this->ResultedDate->IsDetailKey && $this->ResultedDate->FormValue != NULL && $this->ResultedDate->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->ResultedDate->caption(), $this->ResultedDate->RequiredErrorMessage));
			}
		}
		if (!CheckDate($this->ResultedDate->FormValue)) {
			AddMessage($FormError, $this->ResultedDate->errorMessage());
		}
		if ($this->ResultedBy->Required) {
			if (!$this->ResultedBy->IsDetailKey && $this->ResultedBy->FormValue != NULL && $this->ResultedBy->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->ResultedBy->caption(), $this->ResultedBy->RequiredErrorMessage));
			}
		}
		if ($this->Modified->Required) {
			if (!$this->Modified->IsDetailKey && $this->Modified->FormValue != NULL && $this->Modified->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Modified->caption(), $this->Modified->RequiredErrorMessage));
			}
		}
		if (!CheckDate($this->Modified->FormValue)) {
			AddMessage($FormError, $this->Modified->errorMessage());
		}
		if ($this->ModifiedBy->Required) {
			if (!$this->ModifiedBy->IsDetailKey && $this->ModifiedBy->FormValue != NULL && $this->ModifiedBy->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->ModifiedBy->caption(), $this->ModifiedBy->RequiredErrorMessage));
			}
		}
		if ($this->Created->Required) {
			if (!$this->Created->IsDetailKey && $this->Created->FormValue != NULL && $this->Created->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Created->caption(), $this->Created->RequiredErrorMessage));
			}
		}
		if (!CheckDate($this->Created->FormValue)) {
			AddMessage($FormError, $this->Created->errorMessage());
		}
		if ($this->CreatedBy->Required) {
			if (!$this->CreatedBy->IsDetailKey && $this->CreatedBy->FormValue != NULL && $this->CreatedBy->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->CreatedBy->caption(), $this->CreatedBy->RequiredErrorMessage));
			}
		}
		if ($this->GroupHead->Required) {
			if (!$this->GroupHead->IsDetailKey && $this->GroupHead->FormValue != NULL && $this->GroupHead->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->GroupHead->caption(), $this->GroupHead->RequiredErrorMessage));
			}
		}
		if ($this->Cost->Required) {
			if (!$this->Cost->IsDetailKey && $this->Cost->FormValue != NULL && $this->Cost->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Cost->caption(), $this->Cost->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->Cost->FormValue)) {
			AddMessage($FormError, $this->Cost->errorMessage());
		}
		if ($this->PaymentStatus->Required) {
			if (!$this->PaymentStatus->IsDetailKey && $this->PaymentStatus->FormValue != NULL && $this->PaymentStatus->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PaymentStatus->caption(), $this->PaymentStatus->RequiredErrorMessage));
			}
		}
		if ($this->PayMode->Required) {
			if (!$this->PayMode->IsDetailKey && $this->PayMode->FormValue != NULL && $this->PayMode->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PayMode->caption(), $this->PayMode->RequiredErrorMessage));
			}
		}
		if ($this->VoucherNo->Required) {
			if (!$this->VoucherNo->IsDetailKey && $this->VoucherNo->FormValue != NULL && $this->VoucherNo->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->VoucherNo->caption(), $this->VoucherNo->RequiredErrorMessage));
			}
		}
		if ($this->InvestigationMultiselect->Required) {
			if (!$this->InvestigationMultiselect->IsDetailKey && $this->InvestigationMultiselect->FormValue != NULL && $this->InvestigationMultiselect->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->InvestigationMultiselect->caption(), $this->InvestigationMultiselect->RequiredErrorMessage));
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

			// PatientName
			$this->PatientName->setDbValueDef($rsnew, $this->PatientName->CurrentValue, NULL, $this->PatientName->ReadOnly);

			// Investigation
			$this->Investigation->setDbValueDef($rsnew, $this->Investigation->CurrentValue, NULL, $this->Investigation->ReadOnly);

			// Value
			$this->Value->setDbValueDef($rsnew, $this->Value->CurrentValue, NULL, $this->Value->ReadOnly);

			// NormalRange
			$this->NormalRange->setDbValueDef($rsnew, $this->NormalRange->CurrentValue, NULL, $this->NormalRange->ReadOnly);

			// Age
			$this->Age->setDbValueDef($rsnew, $this->Age->CurrentValue, NULL, $this->Age->ReadOnly);

			// Gender
			$this->Gender->setDbValueDef($rsnew, $this->Gender->CurrentValue, NULL, $this->Gender->ReadOnly);

			// profilePic
			$this->profilePic->setDbValueDef($rsnew, $this->profilePic->CurrentValue, NULL, $this->profilePic->ReadOnly);

			// SampleCollected
			$this->SampleCollected->setDbValueDef($rsnew, UnFormatDateTime($this->SampleCollected->CurrentValue, 0), NULL, $this->SampleCollected->ReadOnly);

			// SampleCollectedBy
			$this->SampleCollectedBy->setDbValueDef($rsnew, $this->SampleCollectedBy->CurrentValue, NULL, $this->SampleCollectedBy->ReadOnly);

			// ResultedDate
			$this->ResultedDate->setDbValueDef($rsnew, UnFormatDateTime($this->ResultedDate->CurrentValue, 0), NULL, $this->ResultedDate->ReadOnly);

			// ResultedBy
			$this->ResultedBy->setDbValueDef($rsnew, $this->ResultedBy->CurrentValue, NULL, $this->ResultedBy->ReadOnly);

			// Modified
			$this->Modified->setDbValueDef($rsnew, UnFormatDateTime($this->Modified->CurrentValue, 0), NULL, $this->Modified->ReadOnly);

			// ModifiedBy
			$this->ModifiedBy->setDbValueDef($rsnew, $this->ModifiedBy->CurrentValue, NULL, $this->ModifiedBy->ReadOnly);

			// Created
			$this->Created->setDbValueDef($rsnew, UnFormatDateTime($this->Created->CurrentValue, 0), NULL, $this->Created->ReadOnly);

			// CreatedBy
			$this->CreatedBy->setDbValueDef($rsnew, $this->CreatedBy->CurrentValue, NULL, $this->CreatedBy->ReadOnly);

			// GroupHead
			$this->GroupHead->setDbValueDef($rsnew, $this->GroupHead->CurrentValue, NULL, $this->GroupHead->ReadOnly);

			// Cost
			$this->Cost->setDbValueDef($rsnew, $this->Cost->CurrentValue, NULL, $this->Cost->ReadOnly);

			// PaymentStatus
			$this->PaymentStatus->setDbValueDef($rsnew, $this->PaymentStatus->CurrentValue, NULL, $this->PaymentStatus->ReadOnly);

			// PayMode
			$this->PayMode->setDbValueDef($rsnew, $this->PayMode->CurrentValue, NULL, $this->PayMode->ReadOnly);

			// VoucherNo
			$this->VoucherNo->setDbValueDef($rsnew, $this->VoucherNo->CurrentValue, NULL, $this->VoucherNo->ReadOnly);

			// InvestigationMultiselect
			$this->InvestigationMultiselect->setDbValueDef($rsnew, $this->InvestigationMultiselect->CurrentValue, "", $this->InvestigationMultiselect->ReadOnly);

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
		$Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("patient_investigationslist.php"), "", $this->TableVar, TRUE);
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
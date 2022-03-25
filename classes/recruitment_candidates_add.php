<?php
namespace PHPMaker2019\HIMS;

/**
 * Page class
 */
class recruitment_candidates_add extends recruitment_candidates
{

	// Page ID
	public $PageID = "add";

	// Project ID
	public $ProjectID = "{EA4F6D13-AF8F-428D-9EA7-BA88D1107EC3}";

	// Table name
	public $TableName = 'recruitment_candidates';

	// Page object name
	public $PageObjName = "recruitment_candidates_add";

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

		// Table object (recruitment_candidates)
		if (!isset($GLOBALS["recruitment_candidates"]) || get_class($GLOBALS["recruitment_candidates"]) == PROJECT_NAMESPACE . "recruitment_candidates") {
			$GLOBALS["recruitment_candidates"] = &$this;
			$GLOBALS["Table"] = &$GLOBALS["recruitment_candidates"];
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
			define(PROJECT_NAMESPACE . "TABLE_NAME", 'recruitment_candidates');

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
		global $EXPORT, $recruitment_candidates;
		if ($this->CustomExport && $this->CustomExport == $this->Export && array_key_exists($this->CustomExport, $EXPORT)) {
				$content = ob_get_contents();
			if ($ExportFileName == "")
				$ExportFileName = $this->TableVar;
			$class = PROJECT_NAMESPACE . $EXPORT[$this->CustomExport];
			if (class_exists($class)) {
				$doc = new $class($recruitment_candidates);
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
					if ($pageName == "recruitment_candidatesview.php")
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
					$this->terminate(GetUrl("recruitment_candidateslist.php"));
				else
					$this->terminate(GetUrl("login.php"));
				return;
			}
		}

		// Create form object
		$CurrentForm = new HttpForm();
		$this->CurrentAction = Param("action"); // Set up current action
		$this->id->Visible = FALSE;
		$this->first_name->setVisibility();
		$this->last_name->setVisibility();
		$this->nationality->setVisibility();
		$this->birthday->setVisibility();
		$this->gender->setVisibility();
		$this->marital_status->setVisibility();
		$this->address1->setVisibility();
		$this->address2->setVisibility();
		$this->city->setVisibility();
		$this->country->setVisibility();
		$this->province->setVisibility();
		$this->postal_code->setVisibility();
		$this->_email->setVisibility();
		$this->home_phone->setVisibility();
		$this->mobile_phone->setVisibility();
		$this->cv_title->setVisibility();
		$this->cv->setVisibility();
		$this->cvtext->setVisibility();
		$this->industry->setVisibility();
		$this->profileImage->setVisibility();
		$this->head_line->setVisibility();
		$this->objective->setVisibility();
		$this->work_history->setVisibility();
		$this->education->setVisibility();
		$this->skills->setVisibility();
		$this->referees->setVisibility();
		$this->linkedInUrl->setVisibility();
		$this->linkedInData->setVisibility();
		$this->totalYearsOfExperience->setVisibility();
		$this->totalMonthsOfExperience->setVisibility();
		$this->htmlCVData->setVisibility();
		$this->generatedCVFile->setVisibility();
		$this->created->setVisibility();
		$this->updated->setVisibility();
		$this->expectedSalary->setVisibility();
		$this->preferedPositions->setVisibility();
		$this->preferedJobtype->setVisibility();
		$this->preferedCountries->setVisibility();
		$this->tags->setVisibility();
		$this->notes->setVisibility();
		$this->calls->setVisibility();
		$this->age->setVisibility();
		$this->hash->setVisibility();
		$this->linkedInProfileLink->setVisibility();
		$this->linkedInProfileId->setVisibility();
		$this->facebookProfileLink->setVisibility();
		$this->facebookProfileId->setVisibility();
		$this->twitterProfileLink->setVisibility();
		$this->twitterProfileId->setVisibility();
		$this->googleProfileLink->setVisibility();
		$this->googleProfileId->setVisibility();
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
					$this->terminate("recruitment_candidateslist.php"); // No matching record, return to list
				}
				break;
			case "insert": // Add new record
				$this->SendEmail = TRUE; // Send email on add success
				if ($this->addRow($this->OldRecordset)) { // Add successful
					if ($this->getSuccessMessage() == "")
						$this->setSuccessMessage($Language->phrase("AddSuccess")); // Set up success message
					$returnUrl = $this->getReturnUrl();
					if (GetPageName($returnUrl) == "recruitment_candidateslist.php")
						$returnUrl = $this->addMasterUrl($returnUrl); // List page, return to List page with correct master key if necessary
					elseif (GetPageName($returnUrl) == "recruitment_candidatesview.php")
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
		$this->first_name->CurrentValue = NULL;
		$this->first_name->OldValue = $this->first_name->CurrentValue;
		$this->last_name->CurrentValue = NULL;
		$this->last_name->OldValue = $this->last_name->CurrentValue;
		$this->nationality->CurrentValue = NULL;
		$this->nationality->OldValue = $this->nationality->CurrentValue;
		$this->birthday->CurrentValue = NULL;
		$this->birthday->OldValue = $this->birthday->CurrentValue;
		$this->gender->CurrentValue = NULL;
		$this->gender->OldValue = $this->gender->CurrentValue;
		$this->marital_status->CurrentValue = NULL;
		$this->marital_status->OldValue = $this->marital_status->CurrentValue;
		$this->address1->CurrentValue = NULL;
		$this->address1->OldValue = $this->address1->CurrentValue;
		$this->address2->CurrentValue = NULL;
		$this->address2->OldValue = $this->address2->CurrentValue;
		$this->city->CurrentValue = NULL;
		$this->city->OldValue = $this->city->CurrentValue;
		$this->country->CurrentValue = NULL;
		$this->country->OldValue = $this->country->CurrentValue;
		$this->province->CurrentValue = NULL;
		$this->province->OldValue = $this->province->CurrentValue;
		$this->postal_code->CurrentValue = NULL;
		$this->postal_code->OldValue = $this->postal_code->CurrentValue;
		$this->_email->CurrentValue = NULL;
		$this->_email->OldValue = $this->_email->CurrentValue;
		$this->home_phone->CurrentValue = NULL;
		$this->home_phone->OldValue = $this->home_phone->CurrentValue;
		$this->mobile_phone->CurrentValue = NULL;
		$this->mobile_phone->OldValue = $this->mobile_phone->CurrentValue;
		$this->cv_title->CurrentValue = NULL;
		$this->cv_title->OldValue = $this->cv_title->CurrentValue;
		$this->cv->CurrentValue = NULL;
		$this->cv->OldValue = $this->cv->CurrentValue;
		$this->cvtext->CurrentValue = NULL;
		$this->cvtext->OldValue = $this->cvtext->CurrentValue;
		$this->industry->CurrentValue = NULL;
		$this->industry->OldValue = $this->industry->CurrentValue;
		$this->profileImage->CurrentValue = NULL;
		$this->profileImage->OldValue = $this->profileImage->CurrentValue;
		$this->head_line->CurrentValue = NULL;
		$this->head_line->OldValue = $this->head_line->CurrentValue;
		$this->objective->CurrentValue = NULL;
		$this->objective->OldValue = $this->objective->CurrentValue;
		$this->work_history->CurrentValue = NULL;
		$this->work_history->OldValue = $this->work_history->CurrentValue;
		$this->education->CurrentValue = NULL;
		$this->education->OldValue = $this->education->CurrentValue;
		$this->skills->CurrentValue = NULL;
		$this->skills->OldValue = $this->skills->CurrentValue;
		$this->referees->CurrentValue = NULL;
		$this->referees->OldValue = $this->referees->CurrentValue;
		$this->linkedInUrl->CurrentValue = NULL;
		$this->linkedInUrl->OldValue = $this->linkedInUrl->CurrentValue;
		$this->linkedInData->CurrentValue = NULL;
		$this->linkedInData->OldValue = $this->linkedInData->CurrentValue;
		$this->totalYearsOfExperience->CurrentValue = NULL;
		$this->totalYearsOfExperience->OldValue = $this->totalYearsOfExperience->CurrentValue;
		$this->totalMonthsOfExperience->CurrentValue = NULL;
		$this->totalMonthsOfExperience->OldValue = $this->totalMonthsOfExperience->CurrentValue;
		$this->htmlCVData->CurrentValue = NULL;
		$this->htmlCVData->OldValue = $this->htmlCVData->CurrentValue;
		$this->generatedCVFile->CurrentValue = NULL;
		$this->generatedCVFile->OldValue = $this->generatedCVFile->CurrentValue;
		$this->created->CurrentValue = NULL;
		$this->created->OldValue = $this->created->CurrentValue;
		$this->updated->CurrentValue = NULL;
		$this->updated->OldValue = $this->updated->CurrentValue;
		$this->expectedSalary->CurrentValue = NULL;
		$this->expectedSalary->OldValue = $this->expectedSalary->CurrentValue;
		$this->preferedPositions->CurrentValue = NULL;
		$this->preferedPositions->OldValue = $this->preferedPositions->CurrentValue;
		$this->preferedJobtype->CurrentValue = NULL;
		$this->preferedJobtype->OldValue = $this->preferedJobtype->CurrentValue;
		$this->preferedCountries->CurrentValue = NULL;
		$this->preferedCountries->OldValue = $this->preferedCountries->CurrentValue;
		$this->tags->CurrentValue = NULL;
		$this->tags->OldValue = $this->tags->CurrentValue;
		$this->notes->CurrentValue = NULL;
		$this->notes->OldValue = $this->notes->CurrentValue;
		$this->calls->CurrentValue = NULL;
		$this->calls->OldValue = $this->calls->CurrentValue;
		$this->age->CurrentValue = NULL;
		$this->age->OldValue = $this->age->CurrentValue;
		$this->hash->CurrentValue = NULL;
		$this->hash->OldValue = $this->hash->CurrentValue;
		$this->linkedInProfileLink->CurrentValue = NULL;
		$this->linkedInProfileLink->OldValue = $this->linkedInProfileLink->CurrentValue;
		$this->linkedInProfileId->CurrentValue = NULL;
		$this->linkedInProfileId->OldValue = $this->linkedInProfileId->CurrentValue;
		$this->facebookProfileLink->CurrentValue = NULL;
		$this->facebookProfileLink->OldValue = $this->facebookProfileLink->CurrentValue;
		$this->facebookProfileId->CurrentValue = NULL;
		$this->facebookProfileId->OldValue = $this->facebookProfileId->CurrentValue;
		$this->twitterProfileLink->CurrentValue = NULL;
		$this->twitterProfileLink->OldValue = $this->twitterProfileLink->CurrentValue;
		$this->twitterProfileId->CurrentValue = NULL;
		$this->twitterProfileId->OldValue = $this->twitterProfileId->CurrentValue;
		$this->googleProfileLink->CurrentValue = NULL;
		$this->googleProfileLink->OldValue = $this->googleProfileLink->CurrentValue;
		$this->googleProfileId->CurrentValue = NULL;
		$this->googleProfileId->OldValue = $this->googleProfileId->CurrentValue;
	}

	// Load form values
	protected function loadFormValues()
	{

		// Load from form
		global $CurrentForm;

		// Check field name 'first_name' first before field var 'x_first_name'
		$val = $CurrentForm->hasValue("first_name") ? $CurrentForm->getValue("first_name") : $CurrentForm->getValue("x_first_name");
		if (!$this->first_name->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->first_name->Visible = FALSE; // Disable update for API request
			else
				$this->first_name->setFormValue($val);
		}

		// Check field name 'last_name' first before field var 'x_last_name'
		$val = $CurrentForm->hasValue("last_name") ? $CurrentForm->getValue("last_name") : $CurrentForm->getValue("x_last_name");
		if (!$this->last_name->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->last_name->Visible = FALSE; // Disable update for API request
			else
				$this->last_name->setFormValue($val);
		}

		// Check field name 'nationality' first before field var 'x_nationality'
		$val = $CurrentForm->hasValue("nationality") ? $CurrentForm->getValue("nationality") : $CurrentForm->getValue("x_nationality");
		if (!$this->nationality->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->nationality->Visible = FALSE; // Disable update for API request
			else
				$this->nationality->setFormValue($val);
		}

		// Check field name 'birthday' first before field var 'x_birthday'
		$val = $CurrentForm->hasValue("birthday") ? $CurrentForm->getValue("birthday") : $CurrentForm->getValue("x_birthday");
		if (!$this->birthday->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->birthday->Visible = FALSE; // Disable update for API request
			else
				$this->birthday->setFormValue($val);
			$this->birthday->CurrentValue = UnFormatDateTime($this->birthday->CurrentValue, 0);
		}

		// Check field name 'gender' first before field var 'x_gender'
		$val = $CurrentForm->hasValue("gender") ? $CurrentForm->getValue("gender") : $CurrentForm->getValue("x_gender");
		if (!$this->gender->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->gender->Visible = FALSE; // Disable update for API request
			else
				$this->gender->setFormValue($val);
		}

		// Check field name 'marital_status' first before field var 'x_marital_status'
		$val = $CurrentForm->hasValue("marital_status") ? $CurrentForm->getValue("marital_status") : $CurrentForm->getValue("x_marital_status");
		if (!$this->marital_status->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->marital_status->Visible = FALSE; // Disable update for API request
			else
				$this->marital_status->setFormValue($val);
		}

		// Check field name 'address1' first before field var 'x_address1'
		$val = $CurrentForm->hasValue("address1") ? $CurrentForm->getValue("address1") : $CurrentForm->getValue("x_address1");
		if (!$this->address1->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->address1->Visible = FALSE; // Disable update for API request
			else
				$this->address1->setFormValue($val);
		}

		// Check field name 'address2' first before field var 'x_address2'
		$val = $CurrentForm->hasValue("address2") ? $CurrentForm->getValue("address2") : $CurrentForm->getValue("x_address2");
		if (!$this->address2->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->address2->Visible = FALSE; // Disable update for API request
			else
				$this->address2->setFormValue($val);
		}

		// Check field name 'city' first before field var 'x_city'
		$val = $CurrentForm->hasValue("city") ? $CurrentForm->getValue("city") : $CurrentForm->getValue("x_city");
		if (!$this->city->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->city->Visible = FALSE; // Disable update for API request
			else
				$this->city->setFormValue($val);
		}

		// Check field name 'country' first before field var 'x_country'
		$val = $CurrentForm->hasValue("country") ? $CurrentForm->getValue("country") : $CurrentForm->getValue("x_country");
		if (!$this->country->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->country->Visible = FALSE; // Disable update for API request
			else
				$this->country->setFormValue($val);
		}

		// Check field name 'province' first before field var 'x_province'
		$val = $CurrentForm->hasValue("province") ? $CurrentForm->getValue("province") : $CurrentForm->getValue("x_province");
		if (!$this->province->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->province->Visible = FALSE; // Disable update for API request
			else
				$this->province->setFormValue($val);
		}

		// Check field name 'postal_code' first before field var 'x_postal_code'
		$val = $CurrentForm->hasValue("postal_code") ? $CurrentForm->getValue("postal_code") : $CurrentForm->getValue("x_postal_code");
		if (!$this->postal_code->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->postal_code->Visible = FALSE; // Disable update for API request
			else
				$this->postal_code->setFormValue($val);
		}

		// Check field name 'email' first before field var 'x__email'
		$val = $CurrentForm->hasValue("email") ? $CurrentForm->getValue("email") : $CurrentForm->getValue("x__email");
		if (!$this->_email->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->_email->Visible = FALSE; // Disable update for API request
			else
				$this->_email->setFormValue($val);
		}

		// Check field name 'home_phone' first before field var 'x_home_phone'
		$val = $CurrentForm->hasValue("home_phone") ? $CurrentForm->getValue("home_phone") : $CurrentForm->getValue("x_home_phone");
		if (!$this->home_phone->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->home_phone->Visible = FALSE; // Disable update for API request
			else
				$this->home_phone->setFormValue($val);
		}

		// Check field name 'mobile_phone' first before field var 'x_mobile_phone'
		$val = $CurrentForm->hasValue("mobile_phone") ? $CurrentForm->getValue("mobile_phone") : $CurrentForm->getValue("x_mobile_phone");
		if (!$this->mobile_phone->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->mobile_phone->Visible = FALSE; // Disable update for API request
			else
				$this->mobile_phone->setFormValue($val);
		}

		// Check field name 'cv_title' first before field var 'x_cv_title'
		$val = $CurrentForm->hasValue("cv_title") ? $CurrentForm->getValue("cv_title") : $CurrentForm->getValue("x_cv_title");
		if (!$this->cv_title->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->cv_title->Visible = FALSE; // Disable update for API request
			else
				$this->cv_title->setFormValue($val);
		}

		// Check field name 'cv' first before field var 'x_cv'
		$val = $CurrentForm->hasValue("cv") ? $CurrentForm->getValue("cv") : $CurrentForm->getValue("x_cv");
		if (!$this->cv->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->cv->Visible = FALSE; // Disable update for API request
			else
				$this->cv->setFormValue($val);
		}

		// Check field name 'cvtext' first before field var 'x_cvtext'
		$val = $CurrentForm->hasValue("cvtext") ? $CurrentForm->getValue("cvtext") : $CurrentForm->getValue("x_cvtext");
		if (!$this->cvtext->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->cvtext->Visible = FALSE; // Disable update for API request
			else
				$this->cvtext->setFormValue($val);
		}

		// Check field name 'industry' first before field var 'x_industry'
		$val = $CurrentForm->hasValue("industry") ? $CurrentForm->getValue("industry") : $CurrentForm->getValue("x_industry");
		if (!$this->industry->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->industry->Visible = FALSE; // Disable update for API request
			else
				$this->industry->setFormValue($val);
		}

		// Check field name 'profileImage' first before field var 'x_profileImage'
		$val = $CurrentForm->hasValue("profileImage") ? $CurrentForm->getValue("profileImage") : $CurrentForm->getValue("x_profileImage");
		if (!$this->profileImage->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->profileImage->Visible = FALSE; // Disable update for API request
			else
				$this->profileImage->setFormValue($val);
		}

		// Check field name 'head_line' first before field var 'x_head_line'
		$val = $CurrentForm->hasValue("head_line") ? $CurrentForm->getValue("head_line") : $CurrentForm->getValue("x_head_line");
		if (!$this->head_line->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->head_line->Visible = FALSE; // Disable update for API request
			else
				$this->head_line->setFormValue($val);
		}

		// Check field name 'objective' first before field var 'x_objective'
		$val = $CurrentForm->hasValue("objective") ? $CurrentForm->getValue("objective") : $CurrentForm->getValue("x_objective");
		if (!$this->objective->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->objective->Visible = FALSE; // Disable update for API request
			else
				$this->objective->setFormValue($val);
		}

		// Check field name 'work_history' first before field var 'x_work_history'
		$val = $CurrentForm->hasValue("work_history") ? $CurrentForm->getValue("work_history") : $CurrentForm->getValue("x_work_history");
		if (!$this->work_history->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->work_history->Visible = FALSE; // Disable update for API request
			else
				$this->work_history->setFormValue($val);
		}

		// Check field name 'education' first before field var 'x_education'
		$val = $CurrentForm->hasValue("education") ? $CurrentForm->getValue("education") : $CurrentForm->getValue("x_education");
		if (!$this->education->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->education->Visible = FALSE; // Disable update for API request
			else
				$this->education->setFormValue($val);
		}

		// Check field name 'skills' first before field var 'x_skills'
		$val = $CurrentForm->hasValue("skills") ? $CurrentForm->getValue("skills") : $CurrentForm->getValue("x_skills");
		if (!$this->skills->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->skills->Visible = FALSE; // Disable update for API request
			else
				$this->skills->setFormValue($val);
		}

		// Check field name 'referees' first before field var 'x_referees'
		$val = $CurrentForm->hasValue("referees") ? $CurrentForm->getValue("referees") : $CurrentForm->getValue("x_referees");
		if (!$this->referees->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->referees->Visible = FALSE; // Disable update for API request
			else
				$this->referees->setFormValue($val);
		}

		// Check field name 'linkedInUrl' first before field var 'x_linkedInUrl'
		$val = $CurrentForm->hasValue("linkedInUrl") ? $CurrentForm->getValue("linkedInUrl") : $CurrentForm->getValue("x_linkedInUrl");
		if (!$this->linkedInUrl->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->linkedInUrl->Visible = FALSE; // Disable update for API request
			else
				$this->linkedInUrl->setFormValue($val);
		}

		// Check field name 'linkedInData' first before field var 'x_linkedInData'
		$val = $CurrentForm->hasValue("linkedInData") ? $CurrentForm->getValue("linkedInData") : $CurrentForm->getValue("x_linkedInData");
		if (!$this->linkedInData->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->linkedInData->Visible = FALSE; // Disable update for API request
			else
				$this->linkedInData->setFormValue($val);
		}

		// Check field name 'totalYearsOfExperience' first before field var 'x_totalYearsOfExperience'
		$val = $CurrentForm->hasValue("totalYearsOfExperience") ? $CurrentForm->getValue("totalYearsOfExperience") : $CurrentForm->getValue("x_totalYearsOfExperience");
		if (!$this->totalYearsOfExperience->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->totalYearsOfExperience->Visible = FALSE; // Disable update for API request
			else
				$this->totalYearsOfExperience->setFormValue($val);
		}

		// Check field name 'totalMonthsOfExperience' first before field var 'x_totalMonthsOfExperience'
		$val = $CurrentForm->hasValue("totalMonthsOfExperience") ? $CurrentForm->getValue("totalMonthsOfExperience") : $CurrentForm->getValue("x_totalMonthsOfExperience");
		if (!$this->totalMonthsOfExperience->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->totalMonthsOfExperience->Visible = FALSE; // Disable update for API request
			else
				$this->totalMonthsOfExperience->setFormValue($val);
		}

		// Check field name 'htmlCVData' first before field var 'x_htmlCVData'
		$val = $CurrentForm->hasValue("htmlCVData") ? $CurrentForm->getValue("htmlCVData") : $CurrentForm->getValue("x_htmlCVData");
		if (!$this->htmlCVData->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->htmlCVData->Visible = FALSE; // Disable update for API request
			else
				$this->htmlCVData->setFormValue($val);
		}

		// Check field name 'generatedCVFile' first before field var 'x_generatedCVFile'
		$val = $CurrentForm->hasValue("generatedCVFile") ? $CurrentForm->getValue("generatedCVFile") : $CurrentForm->getValue("x_generatedCVFile");
		if (!$this->generatedCVFile->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->generatedCVFile->Visible = FALSE; // Disable update for API request
			else
				$this->generatedCVFile->setFormValue($val);
		}

		// Check field name 'created' first before field var 'x_created'
		$val = $CurrentForm->hasValue("created") ? $CurrentForm->getValue("created") : $CurrentForm->getValue("x_created");
		if (!$this->created->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->created->Visible = FALSE; // Disable update for API request
			else
				$this->created->setFormValue($val);
			$this->created->CurrentValue = UnFormatDateTime($this->created->CurrentValue, 0);
		}

		// Check field name 'updated' first before field var 'x_updated'
		$val = $CurrentForm->hasValue("updated") ? $CurrentForm->getValue("updated") : $CurrentForm->getValue("x_updated");
		if (!$this->updated->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->updated->Visible = FALSE; // Disable update for API request
			else
				$this->updated->setFormValue($val);
			$this->updated->CurrentValue = UnFormatDateTime($this->updated->CurrentValue, 0);
		}

		// Check field name 'expectedSalary' first before field var 'x_expectedSalary'
		$val = $CurrentForm->hasValue("expectedSalary") ? $CurrentForm->getValue("expectedSalary") : $CurrentForm->getValue("x_expectedSalary");
		if (!$this->expectedSalary->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->expectedSalary->Visible = FALSE; // Disable update for API request
			else
				$this->expectedSalary->setFormValue($val);
		}

		// Check field name 'preferedPositions' first before field var 'x_preferedPositions'
		$val = $CurrentForm->hasValue("preferedPositions") ? $CurrentForm->getValue("preferedPositions") : $CurrentForm->getValue("x_preferedPositions");
		if (!$this->preferedPositions->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->preferedPositions->Visible = FALSE; // Disable update for API request
			else
				$this->preferedPositions->setFormValue($val);
		}

		// Check field name 'preferedJobtype' first before field var 'x_preferedJobtype'
		$val = $CurrentForm->hasValue("preferedJobtype") ? $CurrentForm->getValue("preferedJobtype") : $CurrentForm->getValue("x_preferedJobtype");
		if (!$this->preferedJobtype->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->preferedJobtype->Visible = FALSE; // Disable update for API request
			else
				$this->preferedJobtype->setFormValue($val);
		}

		// Check field name 'preferedCountries' first before field var 'x_preferedCountries'
		$val = $CurrentForm->hasValue("preferedCountries") ? $CurrentForm->getValue("preferedCountries") : $CurrentForm->getValue("x_preferedCountries");
		if (!$this->preferedCountries->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->preferedCountries->Visible = FALSE; // Disable update for API request
			else
				$this->preferedCountries->setFormValue($val);
		}

		// Check field name 'tags' first before field var 'x_tags'
		$val = $CurrentForm->hasValue("tags") ? $CurrentForm->getValue("tags") : $CurrentForm->getValue("x_tags");
		if (!$this->tags->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->tags->Visible = FALSE; // Disable update for API request
			else
				$this->tags->setFormValue($val);
		}

		// Check field name 'notes' first before field var 'x_notes'
		$val = $CurrentForm->hasValue("notes") ? $CurrentForm->getValue("notes") : $CurrentForm->getValue("x_notes");
		if (!$this->notes->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->notes->Visible = FALSE; // Disable update for API request
			else
				$this->notes->setFormValue($val);
		}

		// Check field name 'calls' first before field var 'x_calls'
		$val = $CurrentForm->hasValue("calls") ? $CurrentForm->getValue("calls") : $CurrentForm->getValue("x_calls");
		if (!$this->calls->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->calls->Visible = FALSE; // Disable update for API request
			else
				$this->calls->setFormValue($val);
		}

		// Check field name 'age' first before field var 'x_age'
		$val = $CurrentForm->hasValue("age") ? $CurrentForm->getValue("age") : $CurrentForm->getValue("x_age");
		if (!$this->age->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->age->Visible = FALSE; // Disable update for API request
			else
				$this->age->setFormValue($val);
		}

		// Check field name 'hash' first before field var 'x_hash'
		$val = $CurrentForm->hasValue("hash") ? $CurrentForm->getValue("hash") : $CurrentForm->getValue("x_hash");
		if (!$this->hash->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->hash->Visible = FALSE; // Disable update for API request
			else
				$this->hash->setFormValue($val);
		}

		// Check field name 'linkedInProfileLink' first before field var 'x_linkedInProfileLink'
		$val = $CurrentForm->hasValue("linkedInProfileLink") ? $CurrentForm->getValue("linkedInProfileLink") : $CurrentForm->getValue("x_linkedInProfileLink");
		if (!$this->linkedInProfileLink->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->linkedInProfileLink->Visible = FALSE; // Disable update for API request
			else
				$this->linkedInProfileLink->setFormValue($val);
		}

		// Check field name 'linkedInProfileId' first before field var 'x_linkedInProfileId'
		$val = $CurrentForm->hasValue("linkedInProfileId") ? $CurrentForm->getValue("linkedInProfileId") : $CurrentForm->getValue("x_linkedInProfileId");
		if (!$this->linkedInProfileId->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->linkedInProfileId->Visible = FALSE; // Disable update for API request
			else
				$this->linkedInProfileId->setFormValue($val);
		}

		// Check field name 'facebookProfileLink' first before field var 'x_facebookProfileLink'
		$val = $CurrentForm->hasValue("facebookProfileLink") ? $CurrentForm->getValue("facebookProfileLink") : $CurrentForm->getValue("x_facebookProfileLink");
		if (!$this->facebookProfileLink->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->facebookProfileLink->Visible = FALSE; // Disable update for API request
			else
				$this->facebookProfileLink->setFormValue($val);
		}

		// Check field name 'facebookProfileId' first before field var 'x_facebookProfileId'
		$val = $CurrentForm->hasValue("facebookProfileId") ? $CurrentForm->getValue("facebookProfileId") : $CurrentForm->getValue("x_facebookProfileId");
		if (!$this->facebookProfileId->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->facebookProfileId->Visible = FALSE; // Disable update for API request
			else
				$this->facebookProfileId->setFormValue($val);
		}

		// Check field name 'twitterProfileLink' first before field var 'x_twitterProfileLink'
		$val = $CurrentForm->hasValue("twitterProfileLink") ? $CurrentForm->getValue("twitterProfileLink") : $CurrentForm->getValue("x_twitterProfileLink");
		if (!$this->twitterProfileLink->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->twitterProfileLink->Visible = FALSE; // Disable update for API request
			else
				$this->twitterProfileLink->setFormValue($val);
		}

		// Check field name 'twitterProfileId' first before field var 'x_twitterProfileId'
		$val = $CurrentForm->hasValue("twitterProfileId") ? $CurrentForm->getValue("twitterProfileId") : $CurrentForm->getValue("x_twitterProfileId");
		if (!$this->twitterProfileId->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->twitterProfileId->Visible = FALSE; // Disable update for API request
			else
				$this->twitterProfileId->setFormValue($val);
		}

		// Check field name 'googleProfileLink' first before field var 'x_googleProfileLink'
		$val = $CurrentForm->hasValue("googleProfileLink") ? $CurrentForm->getValue("googleProfileLink") : $CurrentForm->getValue("x_googleProfileLink");
		if (!$this->googleProfileLink->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->googleProfileLink->Visible = FALSE; // Disable update for API request
			else
				$this->googleProfileLink->setFormValue($val);
		}

		// Check field name 'googleProfileId' first before field var 'x_googleProfileId'
		$val = $CurrentForm->hasValue("googleProfileId") ? $CurrentForm->getValue("googleProfileId") : $CurrentForm->getValue("x_googleProfileId");
		if (!$this->googleProfileId->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->googleProfileId->Visible = FALSE; // Disable update for API request
			else
				$this->googleProfileId->setFormValue($val);
		}

		// Check field name 'id' first before field var 'x_id'
		$val = $CurrentForm->hasValue("id") ? $CurrentForm->getValue("id") : $CurrentForm->getValue("x_id");
	}

	// Restore form values
	public function restoreFormValues()
	{
		global $CurrentForm;
		$this->first_name->CurrentValue = $this->first_name->FormValue;
		$this->last_name->CurrentValue = $this->last_name->FormValue;
		$this->nationality->CurrentValue = $this->nationality->FormValue;
		$this->birthday->CurrentValue = $this->birthday->FormValue;
		$this->birthday->CurrentValue = UnFormatDateTime($this->birthday->CurrentValue, 0);
		$this->gender->CurrentValue = $this->gender->FormValue;
		$this->marital_status->CurrentValue = $this->marital_status->FormValue;
		$this->address1->CurrentValue = $this->address1->FormValue;
		$this->address2->CurrentValue = $this->address2->FormValue;
		$this->city->CurrentValue = $this->city->FormValue;
		$this->country->CurrentValue = $this->country->FormValue;
		$this->province->CurrentValue = $this->province->FormValue;
		$this->postal_code->CurrentValue = $this->postal_code->FormValue;
		$this->_email->CurrentValue = $this->_email->FormValue;
		$this->home_phone->CurrentValue = $this->home_phone->FormValue;
		$this->mobile_phone->CurrentValue = $this->mobile_phone->FormValue;
		$this->cv_title->CurrentValue = $this->cv_title->FormValue;
		$this->cv->CurrentValue = $this->cv->FormValue;
		$this->cvtext->CurrentValue = $this->cvtext->FormValue;
		$this->industry->CurrentValue = $this->industry->FormValue;
		$this->profileImage->CurrentValue = $this->profileImage->FormValue;
		$this->head_line->CurrentValue = $this->head_line->FormValue;
		$this->objective->CurrentValue = $this->objective->FormValue;
		$this->work_history->CurrentValue = $this->work_history->FormValue;
		$this->education->CurrentValue = $this->education->FormValue;
		$this->skills->CurrentValue = $this->skills->FormValue;
		$this->referees->CurrentValue = $this->referees->FormValue;
		$this->linkedInUrl->CurrentValue = $this->linkedInUrl->FormValue;
		$this->linkedInData->CurrentValue = $this->linkedInData->FormValue;
		$this->totalYearsOfExperience->CurrentValue = $this->totalYearsOfExperience->FormValue;
		$this->totalMonthsOfExperience->CurrentValue = $this->totalMonthsOfExperience->FormValue;
		$this->htmlCVData->CurrentValue = $this->htmlCVData->FormValue;
		$this->generatedCVFile->CurrentValue = $this->generatedCVFile->FormValue;
		$this->created->CurrentValue = $this->created->FormValue;
		$this->created->CurrentValue = UnFormatDateTime($this->created->CurrentValue, 0);
		$this->updated->CurrentValue = $this->updated->FormValue;
		$this->updated->CurrentValue = UnFormatDateTime($this->updated->CurrentValue, 0);
		$this->expectedSalary->CurrentValue = $this->expectedSalary->FormValue;
		$this->preferedPositions->CurrentValue = $this->preferedPositions->FormValue;
		$this->preferedJobtype->CurrentValue = $this->preferedJobtype->FormValue;
		$this->preferedCountries->CurrentValue = $this->preferedCountries->FormValue;
		$this->tags->CurrentValue = $this->tags->FormValue;
		$this->notes->CurrentValue = $this->notes->FormValue;
		$this->calls->CurrentValue = $this->calls->FormValue;
		$this->age->CurrentValue = $this->age->FormValue;
		$this->hash->CurrentValue = $this->hash->FormValue;
		$this->linkedInProfileLink->CurrentValue = $this->linkedInProfileLink->FormValue;
		$this->linkedInProfileId->CurrentValue = $this->linkedInProfileId->FormValue;
		$this->facebookProfileLink->CurrentValue = $this->facebookProfileLink->FormValue;
		$this->facebookProfileId->CurrentValue = $this->facebookProfileId->FormValue;
		$this->twitterProfileLink->CurrentValue = $this->twitterProfileLink->FormValue;
		$this->twitterProfileId->CurrentValue = $this->twitterProfileId->FormValue;
		$this->googleProfileLink->CurrentValue = $this->googleProfileLink->FormValue;
		$this->googleProfileId->CurrentValue = $this->googleProfileId->FormValue;
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
		$this->first_name->setDbValue($row['first_name']);
		$this->last_name->setDbValue($row['last_name']);
		$this->nationality->setDbValue($row['nationality']);
		$this->birthday->setDbValue($row['birthday']);
		$this->gender->setDbValue($row['gender']);
		$this->marital_status->setDbValue($row['marital_status']);
		$this->address1->setDbValue($row['address1']);
		$this->address2->setDbValue($row['address2']);
		$this->city->setDbValue($row['city']);
		$this->country->setDbValue($row['country']);
		$this->province->setDbValue($row['province']);
		$this->postal_code->setDbValue($row['postal_code']);
		$this->_email->setDbValue($row['email']);
		$this->home_phone->setDbValue($row['home_phone']);
		$this->mobile_phone->setDbValue($row['mobile_phone']);
		$this->cv_title->setDbValue($row['cv_title']);
		$this->cv->setDbValue($row['cv']);
		$this->cvtext->setDbValue($row['cvtext']);
		$this->industry->setDbValue($row['industry']);
		$this->profileImage->setDbValue($row['profileImage']);
		$this->head_line->setDbValue($row['head_line']);
		$this->objective->setDbValue($row['objective']);
		$this->work_history->setDbValue($row['work_history']);
		$this->education->setDbValue($row['education']);
		$this->skills->setDbValue($row['skills']);
		$this->referees->setDbValue($row['referees']);
		$this->linkedInUrl->setDbValue($row['linkedInUrl']);
		$this->linkedInData->setDbValue($row['linkedInData']);
		$this->totalYearsOfExperience->setDbValue($row['totalYearsOfExperience']);
		$this->totalMonthsOfExperience->setDbValue($row['totalMonthsOfExperience']);
		$this->htmlCVData->setDbValue($row['htmlCVData']);
		$this->generatedCVFile->setDbValue($row['generatedCVFile']);
		$this->created->setDbValue($row['created']);
		$this->updated->setDbValue($row['updated']);
		$this->expectedSalary->setDbValue($row['expectedSalary']);
		$this->preferedPositions->setDbValue($row['preferedPositions']);
		$this->preferedJobtype->setDbValue($row['preferedJobtype']);
		$this->preferedCountries->setDbValue($row['preferedCountries']);
		$this->tags->setDbValue($row['tags']);
		$this->notes->setDbValue($row['notes']);
		$this->calls->setDbValue($row['calls']);
		$this->age->setDbValue($row['age']);
		$this->hash->setDbValue($row['hash']);
		$this->linkedInProfileLink->setDbValue($row['linkedInProfileLink']);
		$this->linkedInProfileId->setDbValue($row['linkedInProfileId']);
		$this->facebookProfileLink->setDbValue($row['facebookProfileLink']);
		$this->facebookProfileId->setDbValue($row['facebookProfileId']);
		$this->twitterProfileLink->setDbValue($row['twitterProfileLink']);
		$this->twitterProfileId->setDbValue($row['twitterProfileId']);
		$this->googleProfileLink->setDbValue($row['googleProfileLink']);
		$this->googleProfileId->setDbValue($row['googleProfileId']);
	}

	// Return a row with default values
	protected function newRow()
	{
		$this->loadDefaultValues();
		$row = [];
		$row['id'] = $this->id->CurrentValue;
		$row['first_name'] = $this->first_name->CurrentValue;
		$row['last_name'] = $this->last_name->CurrentValue;
		$row['nationality'] = $this->nationality->CurrentValue;
		$row['birthday'] = $this->birthday->CurrentValue;
		$row['gender'] = $this->gender->CurrentValue;
		$row['marital_status'] = $this->marital_status->CurrentValue;
		$row['address1'] = $this->address1->CurrentValue;
		$row['address2'] = $this->address2->CurrentValue;
		$row['city'] = $this->city->CurrentValue;
		$row['country'] = $this->country->CurrentValue;
		$row['province'] = $this->province->CurrentValue;
		$row['postal_code'] = $this->postal_code->CurrentValue;
		$row['email'] = $this->_email->CurrentValue;
		$row['home_phone'] = $this->home_phone->CurrentValue;
		$row['mobile_phone'] = $this->mobile_phone->CurrentValue;
		$row['cv_title'] = $this->cv_title->CurrentValue;
		$row['cv'] = $this->cv->CurrentValue;
		$row['cvtext'] = $this->cvtext->CurrentValue;
		$row['industry'] = $this->industry->CurrentValue;
		$row['profileImage'] = $this->profileImage->CurrentValue;
		$row['head_line'] = $this->head_line->CurrentValue;
		$row['objective'] = $this->objective->CurrentValue;
		$row['work_history'] = $this->work_history->CurrentValue;
		$row['education'] = $this->education->CurrentValue;
		$row['skills'] = $this->skills->CurrentValue;
		$row['referees'] = $this->referees->CurrentValue;
		$row['linkedInUrl'] = $this->linkedInUrl->CurrentValue;
		$row['linkedInData'] = $this->linkedInData->CurrentValue;
		$row['totalYearsOfExperience'] = $this->totalYearsOfExperience->CurrentValue;
		$row['totalMonthsOfExperience'] = $this->totalMonthsOfExperience->CurrentValue;
		$row['htmlCVData'] = $this->htmlCVData->CurrentValue;
		$row['generatedCVFile'] = $this->generatedCVFile->CurrentValue;
		$row['created'] = $this->created->CurrentValue;
		$row['updated'] = $this->updated->CurrentValue;
		$row['expectedSalary'] = $this->expectedSalary->CurrentValue;
		$row['preferedPositions'] = $this->preferedPositions->CurrentValue;
		$row['preferedJobtype'] = $this->preferedJobtype->CurrentValue;
		$row['preferedCountries'] = $this->preferedCountries->CurrentValue;
		$row['tags'] = $this->tags->CurrentValue;
		$row['notes'] = $this->notes->CurrentValue;
		$row['calls'] = $this->calls->CurrentValue;
		$row['age'] = $this->age->CurrentValue;
		$row['hash'] = $this->hash->CurrentValue;
		$row['linkedInProfileLink'] = $this->linkedInProfileLink->CurrentValue;
		$row['linkedInProfileId'] = $this->linkedInProfileId->CurrentValue;
		$row['facebookProfileLink'] = $this->facebookProfileLink->CurrentValue;
		$row['facebookProfileId'] = $this->facebookProfileId->CurrentValue;
		$row['twitterProfileLink'] = $this->twitterProfileLink->CurrentValue;
		$row['twitterProfileId'] = $this->twitterProfileId->CurrentValue;
		$row['googleProfileLink'] = $this->googleProfileLink->CurrentValue;
		$row['googleProfileId'] = $this->googleProfileId->CurrentValue;
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
		// first_name
		// last_name
		// nationality
		// birthday
		// gender
		// marital_status
		// address1
		// address2
		// city
		// country
		// province
		// postal_code
		// email
		// home_phone
		// mobile_phone
		// cv_title
		// cv
		// cvtext
		// industry
		// profileImage
		// head_line
		// objective
		// work_history
		// education
		// skills
		// referees
		// linkedInUrl
		// linkedInData
		// totalYearsOfExperience
		// totalMonthsOfExperience
		// htmlCVData
		// generatedCVFile
		// created
		// updated
		// expectedSalary
		// preferedPositions
		// preferedJobtype
		// preferedCountries
		// tags
		// notes
		// calls
		// age
		// hash
		// linkedInProfileLink
		// linkedInProfileId
		// facebookProfileLink
		// facebookProfileId
		// twitterProfileLink
		// twitterProfileId
		// googleProfileLink
		// googleProfileId

		if ($this->RowType == ROWTYPE_VIEW) { // View row

			// id
			$this->id->ViewValue = $this->id->CurrentValue;
			$this->id->ViewCustomAttributes = "";

			// first_name
			$this->first_name->ViewValue = $this->first_name->CurrentValue;
			$this->first_name->ViewCustomAttributes = "";

			// last_name
			$this->last_name->ViewValue = $this->last_name->CurrentValue;
			$this->last_name->ViewCustomAttributes = "";

			// nationality
			$this->nationality->ViewValue = $this->nationality->CurrentValue;
			$this->nationality->ViewValue = FormatNumber($this->nationality->ViewValue, 0, -2, -2, -2);
			$this->nationality->ViewCustomAttributes = "";

			// birthday
			$this->birthday->ViewValue = $this->birthday->CurrentValue;
			$this->birthday->ViewValue = FormatDateTime($this->birthday->ViewValue, 0);
			$this->birthday->ViewCustomAttributes = "";

			// gender
			if (strval($this->gender->CurrentValue) <> "") {
				$this->gender->ViewValue = $this->gender->optionCaption($this->gender->CurrentValue);
			} else {
				$this->gender->ViewValue = NULL;
			}
			$this->gender->ViewCustomAttributes = "";

			// marital_status
			if (strval($this->marital_status->CurrentValue) <> "") {
				$this->marital_status->ViewValue = $this->marital_status->optionCaption($this->marital_status->CurrentValue);
			} else {
				$this->marital_status->ViewValue = NULL;
			}
			$this->marital_status->ViewCustomAttributes = "";

			// address1
			$this->address1->ViewValue = $this->address1->CurrentValue;
			$this->address1->ViewCustomAttributes = "";

			// address2
			$this->address2->ViewValue = $this->address2->CurrentValue;
			$this->address2->ViewCustomAttributes = "";

			// city
			$this->city->ViewValue = $this->city->CurrentValue;
			$this->city->ViewCustomAttributes = "";

			// country
			$this->country->ViewValue = $this->country->CurrentValue;
			$this->country->ViewCustomAttributes = "";

			// province
			$this->province->ViewValue = $this->province->CurrentValue;
			$this->province->ViewValue = FormatNumber($this->province->ViewValue, 0, -2, -2, -2);
			$this->province->ViewCustomAttributes = "";

			// postal_code
			$this->postal_code->ViewValue = $this->postal_code->CurrentValue;
			$this->postal_code->ViewCustomAttributes = "";

			// email
			$this->_email->ViewValue = $this->_email->CurrentValue;
			$this->_email->ViewCustomAttributes = "";

			// home_phone
			$this->home_phone->ViewValue = $this->home_phone->CurrentValue;
			$this->home_phone->ViewCustomAttributes = "";

			// mobile_phone
			$this->mobile_phone->ViewValue = $this->mobile_phone->CurrentValue;
			$this->mobile_phone->ViewCustomAttributes = "";

			// cv_title
			$this->cv_title->ViewValue = $this->cv_title->CurrentValue;
			$this->cv_title->ViewCustomAttributes = "";

			// cv
			$this->cv->ViewValue = $this->cv->CurrentValue;
			$this->cv->ViewCustomAttributes = "";

			// cvtext
			$this->cvtext->ViewValue = $this->cvtext->CurrentValue;
			$this->cvtext->ViewCustomAttributes = "";

			// industry
			$this->industry->ViewValue = $this->industry->CurrentValue;
			$this->industry->ViewCustomAttributes = "";

			// profileImage
			$this->profileImage->ViewValue = $this->profileImage->CurrentValue;
			$this->profileImage->ViewCustomAttributes = "";

			// head_line
			$this->head_line->ViewValue = $this->head_line->CurrentValue;
			$this->head_line->ViewCustomAttributes = "";

			// objective
			$this->objective->ViewValue = $this->objective->CurrentValue;
			$this->objective->ViewCustomAttributes = "";

			// work_history
			$this->work_history->ViewValue = $this->work_history->CurrentValue;
			$this->work_history->ViewCustomAttributes = "";

			// education
			$this->education->ViewValue = $this->education->CurrentValue;
			$this->education->ViewCustomAttributes = "";

			// skills
			$this->skills->ViewValue = $this->skills->CurrentValue;
			$this->skills->ViewCustomAttributes = "";

			// referees
			$this->referees->ViewValue = $this->referees->CurrentValue;
			$this->referees->ViewCustomAttributes = "";

			// linkedInUrl
			$this->linkedInUrl->ViewValue = $this->linkedInUrl->CurrentValue;
			$this->linkedInUrl->ViewCustomAttributes = "";

			// linkedInData
			$this->linkedInData->ViewValue = $this->linkedInData->CurrentValue;
			$this->linkedInData->ViewCustomAttributes = "";

			// totalYearsOfExperience
			$this->totalYearsOfExperience->ViewValue = $this->totalYearsOfExperience->CurrentValue;
			$this->totalYearsOfExperience->ViewValue = FormatNumber($this->totalYearsOfExperience->ViewValue, 0, -2, -2, -2);
			$this->totalYearsOfExperience->ViewCustomAttributes = "";

			// totalMonthsOfExperience
			$this->totalMonthsOfExperience->ViewValue = $this->totalMonthsOfExperience->CurrentValue;
			$this->totalMonthsOfExperience->ViewValue = FormatNumber($this->totalMonthsOfExperience->ViewValue, 0, -2, -2, -2);
			$this->totalMonthsOfExperience->ViewCustomAttributes = "";

			// htmlCVData
			$this->htmlCVData->ViewValue = $this->htmlCVData->CurrentValue;
			$this->htmlCVData->ViewCustomAttributes = "";

			// generatedCVFile
			$this->generatedCVFile->ViewValue = $this->generatedCVFile->CurrentValue;
			$this->generatedCVFile->ViewCustomAttributes = "";

			// created
			$this->created->ViewValue = $this->created->CurrentValue;
			$this->created->ViewValue = FormatDateTime($this->created->ViewValue, 0);
			$this->created->ViewCustomAttributes = "";

			// updated
			$this->updated->ViewValue = $this->updated->CurrentValue;
			$this->updated->ViewValue = FormatDateTime($this->updated->ViewValue, 0);
			$this->updated->ViewCustomAttributes = "";

			// expectedSalary
			$this->expectedSalary->ViewValue = $this->expectedSalary->CurrentValue;
			$this->expectedSalary->ViewValue = FormatNumber($this->expectedSalary->ViewValue, 0, -2, -2, -2);
			$this->expectedSalary->ViewCustomAttributes = "";

			// preferedPositions
			$this->preferedPositions->ViewValue = $this->preferedPositions->CurrentValue;
			$this->preferedPositions->ViewCustomAttributes = "";

			// preferedJobtype
			$this->preferedJobtype->ViewValue = $this->preferedJobtype->CurrentValue;
			$this->preferedJobtype->ViewCustomAttributes = "";

			// preferedCountries
			$this->preferedCountries->ViewValue = $this->preferedCountries->CurrentValue;
			$this->preferedCountries->ViewCustomAttributes = "";

			// tags
			$this->tags->ViewValue = $this->tags->CurrentValue;
			$this->tags->ViewCustomAttributes = "";

			// notes
			$this->notes->ViewValue = $this->notes->CurrentValue;
			$this->notes->ViewCustomAttributes = "";

			// calls
			$this->calls->ViewValue = $this->calls->CurrentValue;
			$this->calls->ViewCustomAttributes = "";

			// age
			$this->age->ViewValue = $this->age->CurrentValue;
			$this->age->ViewValue = FormatNumber($this->age->ViewValue, 0, -2, -2, -2);
			$this->age->ViewCustomAttributes = "";

			// hash
			$this->hash->ViewValue = $this->hash->CurrentValue;
			$this->hash->ViewCustomAttributes = "";

			// linkedInProfileLink
			$this->linkedInProfileLink->ViewValue = $this->linkedInProfileLink->CurrentValue;
			$this->linkedInProfileLink->ViewCustomAttributes = "";

			// linkedInProfileId
			$this->linkedInProfileId->ViewValue = $this->linkedInProfileId->CurrentValue;
			$this->linkedInProfileId->ViewCustomAttributes = "";

			// facebookProfileLink
			$this->facebookProfileLink->ViewValue = $this->facebookProfileLink->CurrentValue;
			$this->facebookProfileLink->ViewCustomAttributes = "";

			// facebookProfileId
			$this->facebookProfileId->ViewValue = $this->facebookProfileId->CurrentValue;
			$this->facebookProfileId->ViewCustomAttributes = "";

			// twitterProfileLink
			$this->twitterProfileLink->ViewValue = $this->twitterProfileLink->CurrentValue;
			$this->twitterProfileLink->ViewCustomAttributes = "";

			// twitterProfileId
			$this->twitterProfileId->ViewValue = $this->twitterProfileId->CurrentValue;
			$this->twitterProfileId->ViewCustomAttributes = "";

			// googleProfileLink
			$this->googleProfileLink->ViewValue = $this->googleProfileLink->CurrentValue;
			$this->googleProfileLink->ViewCustomAttributes = "";

			// googleProfileId
			$this->googleProfileId->ViewValue = $this->googleProfileId->CurrentValue;
			$this->googleProfileId->ViewCustomAttributes = "";

			// first_name
			$this->first_name->LinkCustomAttributes = "";
			$this->first_name->HrefValue = "";
			$this->first_name->TooltipValue = "";

			// last_name
			$this->last_name->LinkCustomAttributes = "";
			$this->last_name->HrefValue = "";
			$this->last_name->TooltipValue = "";

			// nationality
			$this->nationality->LinkCustomAttributes = "";
			$this->nationality->HrefValue = "";
			$this->nationality->TooltipValue = "";

			// birthday
			$this->birthday->LinkCustomAttributes = "";
			$this->birthday->HrefValue = "";
			$this->birthday->TooltipValue = "";

			// gender
			$this->gender->LinkCustomAttributes = "";
			$this->gender->HrefValue = "";
			$this->gender->TooltipValue = "";

			// marital_status
			$this->marital_status->LinkCustomAttributes = "";
			$this->marital_status->HrefValue = "";
			$this->marital_status->TooltipValue = "";

			// address1
			$this->address1->LinkCustomAttributes = "";
			$this->address1->HrefValue = "";
			$this->address1->TooltipValue = "";

			// address2
			$this->address2->LinkCustomAttributes = "";
			$this->address2->HrefValue = "";
			$this->address2->TooltipValue = "";

			// city
			$this->city->LinkCustomAttributes = "";
			$this->city->HrefValue = "";
			$this->city->TooltipValue = "";

			// country
			$this->country->LinkCustomAttributes = "";
			$this->country->HrefValue = "";
			$this->country->TooltipValue = "";

			// province
			$this->province->LinkCustomAttributes = "";
			$this->province->HrefValue = "";
			$this->province->TooltipValue = "";

			// postal_code
			$this->postal_code->LinkCustomAttributes = "";
			$this->postal_code->HrefValue = "";
			$this->postal_code->TooltipValue = "";

			// email
			$this->_email->LinkCustomAttributes = "";
			$this->_email->HrefValue = "";
			$this->_email->TooltipValue = "";

			// home_phone
			$this->home_phone->LinkCustomAttributes = "";
			$this->home_phone->HrefValue = "";
			$this->home_phone->TooltipValue = "";

			// mobile_phone
			$this->mobile_phone->LinkCustomAttributes = "";
			$this->mobile_phone->HrefValue = "";
			$this->mobile_phone->TooltipValue = "";

			// cv_title
			$this->cv_title->LinkCustomAttributes = "";
			$this->cv_title->HrefValue = "";
			$this->cv_title->TooltipValue = "";

			// cv
			$this->cv->LinkCustomAttributes = "";
			$this->cv->HrefValue = "";
			$this->cv->TooltipValue = "";

			// cvtext
			$this->cvtext->LinkCustomAttributes = "";
			$this->cvtext->HrefValue = "";
			$this->cvtext->TooltipValue = "";

			// industry
			$this->industry->LinkCustomAttributes = "";
			$this->industry->HrefValue = "";
			$this->industry->TooltipValue = "";

			// profileImage
			$this->profileImage->LinkCustomAttributes = "";
			$this->profileImage->HrefValue = "";
			$this->profileImage->TooltipValue = "";

			// head_line
			$this->head_line->LinkCustomAttributes = "";
			$this->head_line->HrefValue = "";
			$this->head_line->TooltipValue = "";

			// objective
			$this->objective->LinkCustomAttributes = "";
			$this->objective->HrefValue = "";
			$this->objective->TooltipValue = "";

			// work_history
			$this->work_history->LinkCustomAttributes = "";
			$this->work_history->HrefValue = "";
			$this->work_history->TooltipValue = "";

			// education
			$this->education->LinkCustomAttributes = "";
			$this->education->HrefValue = "";
			$this->education->TooltipValue = "";

			// skills
			$this->skills->LinkCustomAttributes = "";
			$this->skills->HrefValue = "";
			$this->skills->TooltipValue = "";

			// referees
			$this->referees->LinkCustomAttributes = "";
			$this->referees->HrefValue = "";
			$this->referees->TooltipValue = "";

			// linkedInUrl
			$this->linkedInUrl->LinkCustomAttributes = "";
			$this->linkedInUrl->HrefValue = "";
			$this->linkedInUrl->TooltipValue = "";

			// linkedInData
			$this->linkedInData->LinkCustomAttributes = "";
			$this->linkedInData->HrefValue = "";
			$this->linkedInData->TooltipValue = "";

			// totalYearsOfExperience
			$this->totalYearsOfExperience->LinkCustomAttributes = "";
			$this->totalYearsOfExperience->HrefValue = "";
			$this->totalYearsOfExperience->TooltipValue = "";

			// totalMonthsOfExperience
			$this->totalMonthsOfExperience->LinkCustomAttributes = "";
			$this->totalMonthsOfExperience->HrefValue = "";
			$this->totalMonthsOfExperience->TooltipValue = "";

			// htmlCVData
			$this->htmlCVData->LinkCustomAttributes = "";
			$this->htmlCVData->HrefValue = "";
			$this->htmlCVData->TooltipValue = "";

			// generatedCVFile
			$this->generatedCVFile->LinkCustomAttributes = "";
			$this->generatedCVFile->HrefValue = "";
			$this->generatedCVFile->TooltipValue = "";

			// created
			$this->created->LinkCustomAttributes = "";
			$this->created->HrefValue = "";
			$this->created->TooltipValue = "";

			// updated
			$this->updated->LinkCustomAttributes = "";
			$this->updated->HrefValue = "";
			$this->updated->TooltipValue = "";

			// expectedSalary
			$this->expectedSalary->LinkCustomAttributes = "";
			$this->expectedSalary->HrefValue = "";
			$this->expectedSalary->TooltipValue = "";

			// preferedPositions
			$this->preferedPositions->LinkCustomAttributes = "";
			$this->preferedPositions->HrefValue = "";
			$this->preferedPositions->TooltipValue = "";

			// preferedJobtype
			$this->preferedJobtype->LinkCustomAttributes = "";
			$this->preferedJobtype->HrefValue = "";
			$this->preferedJobtype->TooltipValue = "";

			// preferedCountries
			$this->preferedCountries->LinkCustomAttributes = "";
			$this->preferedCountries->HrefValue = "";
			$this->preferedCountries->TooltipValue = "";

			// tags
			$this->tags->LinkCustomAttributes = "";
			$this->tags->HrefValue = "";
			$this->tags->TooltipValue = "";

			// notes
			$this->notes->LinkCustomAttributes = "";
			$this->notes->HrefValue = "";
			$this->notes->TooltipValue = "";

			// calls
			$this->calls->LinkCustomAttributes = "";
			$this->calls->HrefValue = "";
			$this->calls->TooltipValue = "";

			// age
			$this->age->LinkCustomAttributes = "";
			$this->age->HrefValue = "";
			$this->age->TooltipValue = "";

			// hash
			$this->hash->LinkCustomAttributes = "";
			$this->hash->HrefValue = "";
			$this->hash->TooltipValue = "";

			// linkedInProfileLink
			$this->linkedInProfileLink->LinkCustomAttributes = "";
			$this->linkedInProfileLink->HrefValue = "";
			$this->linkedInProfileLink->TooltipValue = "";

			// linkedInProfileId
			$this->linkedInProfileId->LinkCustomAttributes = "";
			$this->linkedInProfileId->HrefValue = "";
			$this->linkedInProfileId->TooltipValue = "";

			// facebookProfileLink
			$this->facebookProfileLink->LinkCustomAttributes = "";
			$this->facebookProfileLink->HrefValue = "";
			$this->facebookProfileLink->TooltipValue = "";

			// facebookProfileId
			$this->facebookProfileId->LinkCustomAttributes = "";
			$this->facebookProfileId->HrefValue = "";
			$this->facebookProfileId->TooltipValue = "";

			// twitterProfileLink
			$this->twitterProfileLink->LinkCustomAttributes = "";
			$this->twitterProfileLink->HrefValue = "";
			$this->twitterProfileLink->TooltipValue = "";

			// twitterProfileId
			$this->twitterProfileId->LinkCustomAttributes = "";
			$this->twitterProfileId->HrefValue = "";
			$this->twitterProfileId->TooltipValue = "";

			// googleProfileLink
			$this->googleProfileLink->LinkCustomAttributes = "";
			$this->googleProfileLink->HrefValue = "";
			$this->googleProfileLink->TooltipValue = "";

			// googleProfileId
			$this->googleProfileId->LinkCustomAttributes = "";
			$this->googleProfileId->HrefValue = "";
			$this->googleProfileId->TooltipValue = "";
		} elseif ($this->RowType == ROWTYPE_ADD) { // Add row

			// first_name
			$this->first_name->EditAttrs["class"] = "form-control";
			$this->first_name->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->first_name->CurrentValue = HtmlDecode($this->first_name->CurrentValue);
			$this->first_name->EditValue = HtmlEncode($this->first_name->CurrentValue);
			$this->first_name->PlaceHolder = RemoveHtml($this->first_name->caption());

			// last_name
			$this->last_name->EditAttrs["class"] = "form-control";
			$this->last_name->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->last_name->CurrentValue = HtmlDecode($this->last_name->CurrentValue);
			$this->last_name->EditValue = HtmlEncode($this->last_name->CurrentValue);
			$this->last_name->PlaceHolder = RemoveHtml($this->last_name->caption());

			// nationality
			$this->nationality->EditAttrs["class"] = "form-control";
			$this->nationality->EditCustomAttributes = "";
			$this->nationality->EditValue = HtmlEncode($this->nationality->CurrentValue);
			$this->nationality->PlaceHolder = RemoveHtml($this->nationality->caption());

			// birthday
			$this->birthday->EditAttrs["class"] = "form-control";
			$this->birthday->EditCustomAttributes = "";
			$this->birthday->EditValue = HtmlEncode(FormatDateTime($this->birthday->CurrentValue, 8));
			$this->birthday->PlaceHolder = RemoveHtml($this->birthday->caption());

			// gender
			$this->gender->EditCustomAttributes = "";
			$this->gender->EditValue = $this->gender->options(FALSE);

			// marital_status
			$this->marital_status->EditCustomAttributes = "";
			$this->marital_status->EditValue = $this->marital_status->options(FALSE);

			// address1
			$this->address1->EditAttrs["class"] = "form-control";
			$this->address1->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->address1->CurrentValue = HtmlDecode($this->address1->CurrentValue);
			$this->address1->EditValue = HtmlEncode($this->address1->CurrentValue);
			$this->address1->PlaceHolder = RemoveHtml($this->address1->caption());

			// address2
			$this->address2->EditAttrs["class"] = "form-control";
			$this->address2->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->address2->CurrentValue = HtmlDecode($this->address2->CurrentValue);
			$this->address2->EditValue = HtmlEncode($this->address2->CurrentValue);
			$this->address2->PlaceHolder = RemoveHtml($this->address2->caption());

			// city
			$this->city->EditAttrs["class"] = "form-control";
			$this->city->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->city->CurrentValue = HtmlDecode($this->city->CurrentValue);
			$this->city->EditValue = HtmlEncode($this->city->CurrentValue);
			$this->city->PlaceHolder = RemoveHtml($this->city->caption());

			// country
			$this->country->EditAttrs["class"] = "form-control";
			$this->country->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->country->CurrentValue = HtmlDecode($this->country->CurrentValue);
			$this->country->EditValue = HtmlEncode($this->country->CurrentValue);
			$this->country->PlaceHolder = RemoveHtml($this->country->caption());

			// province
			$this->province->EditAttrs["class"] = "form-control";
			$this->province->EditCustomAttributes = "";
			$this->province->EditValue = HtmlEncode($this->province->CurrentValue);
			$this->province->PlaceHolder = RemoveHtml($this->province->caption());

			// postal_code
			$this->postal_code->EditAttrs["class"] = "form-control";
			$this->postal_code->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->postal_code->CurrentValue = HtmlDecode($this->postal_code->CurrentValue);
			$this->postal_code->EditValue = HtmlEncode($this->postal_code->CurrentValue);
			$this->postal_code->PlaceHolder = RemoveHtml($this->postal_code->caption());

			// email
			$this->_email->EditAttrs["class"] = "form-control";
			$this->_email->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->_email->CurrentValue = HtmlDecode($this->_email->CurrentValue);
			$this->_email->EditValue = HtmlEncode($this->_email->CurrentValue);
			$this->_email->PlaceHolder = RemoveHtml($this->_email->caption());

			// home_phone
			$this->home_phone->EditAttrs["class"] = "form-control";
			$this->home_phone->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->home_phone->CurrentValue = HtmlDecode($this->home_phone->CurrentValue);
			$this->home_phone->EditValue = HtmlEncode($this->home_phone->CurrentValue);
			$this->home_phone->PlaceHolder = RemoveHtml($this->home_phone->caption());

			// mobile_phone
			$this->mobile_phone->EditAttrs["class"] = "form-control";
			$this->mobile_phone->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->mobile_phone->CurrentValue = HtmlDecode($this->mobile_phone->CurrentValue);
			$this->mobile_phone->EditValue = HtmlEncode($this->mobile_phone->CurrentValue);
			$this->mobile_phone->PlaceHolder = RemoveHtml($this->mobile_phone->caption());

			// cv_title
			$this->cv_title->EditAttrs["class"] = "form-control";
			$this->cv_title->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->cv_title->CurrentValue = HtmlDecode($this->cv_title->CurrentValue);
			$this->cv_title->EditValue = HtmlEncode($this->cv_title->CurrentValue);
			$this->cv_title->PlaceHolder = RemoveHtml($this->cv_title->caption());

			// cv
			$this->cv->EditAttrs["class"] = "form-control";
			$this->cv->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->cv->CurrentValue = HtmlDecode($this->cv->CurrentValue);
			$this->cv->EditValue = HtmlEncode($this->cv->CurrentValue);
			$this->cv->PlaceHolder = RemoveHtml($this->cv->caption());

			// cvtext
			$this->cvtext->EditAttrs["class"] = "form-control";
			$this->cvtext->EditCustomAttributes = "";
			$this->cvtext->EditValue = HtmlEncode($this->cvtext->CurrentValue);
			$this->cvtext->PlaceHolder = RemoveHtml($this->cvtext->caption());

			// industry
			$this->industry->EditAttrs["class"] = "form-control";
			$this->industry->EditCustomAttributes = "";
			$this->industry->EditValue = HtmlEncode($this->industry->CurrentValue);
			$this->industry->PlaceHolder = RemoveHtml($this->industry->caption());

			// profileImage
			$this->profileImage->EditAttrs["class"] = "form-control";
			$this->profileImage->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->profileImage->CurrentValue = HtmlDecode($this->profileImage->CurrentValue);
			$this->profileImage->EditValue = HtmlEncode($this->profileImage->CurrentValue);
			$this->profileImage->PlaceHolder = RemoveHtml($this->profileImage->caption());

			// head_line
			$this->head_line->EditAttrs["class"] = "form-control";
			$this->head_line->EditCustomAttributes = "";
			$this->head_line->EditValue = HtmlEncode($this->head_line->CurrentValue);
			$this->head_line->PlaceHolder = RemoveHtml($this->head_line->caption());

			// objective
			$this->objective->EditAttrs["class"] = "form-control";
			$this->objective->EditCustomAttributes = "";
			$this->objective->EditValue = HtmlEncode($this->objective->CurrentValue);
			$this->objective->PlaceHolder = RemoveHtml($this->objective->caption());

			// work_history
			$this->work_history->EditAttrs["class"] = "form-control";
			$this->work_history->EditCustomAttributes = "";
			$this->work_history->EditValue = HtmlEncode($this->work_history->CurrentValue);
			$this->work_history->PlaceHolder = RemoveHtml($this->work_history->caption());

			// education
			$this->education->EditAttrs["class"] = "form-control";
			$this->education->EditCustomAttributes = "";
			$this->education->EditValue = HtmlEncode($this->education->CurrentValue);
			$this->education->PlaceHolder = RemoveHtml($this->education->caption());

			// skills
			$this->skills->EditAttrs["class"] = "form-control";
			$this->skills->EditCustomAttributes = "";
			$this->skills->EditValue = HtmlEncode($this->skills->CurrentValue);
			$this->skills->PlaceHolder = RemoveHtml($this->skills->caption());

			// referees
			$this->referees->EditAttrs["class"] = "form-control";
			$this->referees->EditCustomAttributes = "";
			$this->referees->EditValue = HtmlEncode($this->referees->CurrentValue);
			$this->referees->PlaceHolder = RemoveHtml($this->referees->caption());

			// linkedInUrl
			$this->linkedInUrl->EditAttrs["class"] = "form-control";
			$this->linkedInUrl->EditCustomAttributes = "";
			$this->linkedInUrl->EditValue = HtmlEncode($this->linkedInUrl->CurrentValue);
			$this->linkedInUrl->PlaceHolder = RemoveHtml($this->linkedInUrl->caption());

			// linkedInData
			$this->linkedInData->EditAttrs["class"] = "form-control";
			$this->linkedInData->EditCustomAttributes = "";
			$this->linkedInData->EditValue = HtmlEncode($this->linkedInData->CurrentValue);
			$this->linkedInData->PlaceHolder = RemoveHtml($this->linkedInData->caption());

			// totalYearsOfExperience
			$this->totalYearsOfExperience->EditAttrs["class"] = "form-control";
			$this->totalYearsOfExperience->EditCustomAttributes = "";
			$this->totalYearsOfExperience->EditValue = HtmlEncode($this->totalYearsOfExperience->CurrentValue);
			$this->totalYearsOfExperience->PlaceHolder = RemoveHtml($this->totalYearsOfExperience->caption());

			// totalMonthsOfExperience
			$this->totalMonthsOfExperience->EditAttrs["class"] = "form-control";
			$this->totalMonthsOfExperience->EditCustomAttributes = "";
			$this->totalMonthsOfExperience->EditValue = HtmlEncode($this->totalMonthsOfExperience->CurrentValue);
			$this->totalMonthsOfExperience->PlaceHolder = RemoveHtml($this->totalMonthsOfExperience->caption());

			// htmlCVData
			$this->htmlCVData->EditAttrs["class"] = "form-control";
			$this->htmlCVData->EditCustomAttributes = "";
			$this->htmlCVData->EditValue = HtmlEncode($this->htmlCVData->CurrentValue);
			$this->htmlCVData->PlaceHolder = RemoveHtml($this->htmlCVData->caption());

			// generatedCVFile
			$this->generatedCVFile->EditAttrs["class"] = "form-control";
			$this->generatedCVFile->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->generatedCVFile->CurrentValue = HtmlDecode($this->generatedCVFile->CurrentValue);
			$this->generatedCVFile->EditValue = HtmlEncode($this->generatedCVFile->CurrentValue);
			$this->generatedCVFile->PlaceHolder = RemoveHtml($this->generatedCVFile->caption());

			// created
			$this->created->EditAttrs["class"] = "form-control";
			$this->created->EditCustomAttributes = "";
			$this->created->EditValue = HtmlEncode(FormatDateTime($this->created->CurrentValue, 8));
			$this->created->PlaceHolder = RemoveHtml($this->created->caption());

			// updated
			$this->updated->EditAttrs["class"] = "form-control";
			$this->updated->EditCustomAttributes = "";
			$this->updated->EditValue = HtmlEncode(FormatDateTime($this->updated->CurrentValue, 8));
			$this->updated->PlaceHolder = RemoveHtml($this->updated->caption());

			// expectedSalary
			$this->expectedSalary->EditAttrs["class"] = "form-control";
			$this->expectedSalary->EditCustomAttributes = "";
			$this->expectedSalary->EditValue = HtmlEncode($this->expectedSalary->CurrentValue);
			$this->expectedSalary->PlaceHolder = RemoveHtml($this->expectedSalary->caption());

			// preferedPositions
			$this->preferedPositions->EditAttrs["class"] = "form-control";
			$this->preferedPositions->EditCustomAttributes = "";
			$this->preferedPositions->EditValue = HtmlEncode($this->preferedPositions->CurrentValue);
			$this->preferedPositions->PlaceHolder = RemoveHtml($this->preferedPositions->caption());

			// preferedJobtype
			$this->preferedJobtype->EditAttrs["class"] = "form-control";
			$this->preferedJobtype->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->preferedJobtype->CurrentValue = HtmlDecode($this->preferedJobtype->CurrentValue);
			$this->preferedJobtype->EditValue = HtmlEncode($this->preferedJobtype->CurrentValue);
			$this->preferedJobtype->PlaceHolder = RemoveHtml($this->preferedJobtype->caption());

			// preferedCountries
			$this->preferedCountries->EditAttrs["class"] = "form-control";
			$this->preferedCountries->EditCustomAttributes = "";
			$this->preferedCountries->EditValue = HtmlEncode($this->preferedCountries->CurrentValue);
			$this->preferedCountries->PlaceHolder = RemoveHtml($this->preferedCountries->caption());

			// tags
			$this->tags->EditAttrs["class"] = "form-control";
			$this->tags->EditCustomAttributes = "";
			$this->tags->EditValue = HtmlEncode($this->tags->CurrentValue);
			$this->tags->PlaceHolder = RemoveHtml($this->tags->caption());

			// notes
			$this->notes->EditAttrs["class"] = "form-control";
			$this->notes->EditCustomAttributes = "";
			$this->notes->EditValue = HtmlEncode($this->notes->CurrentValue);
			$this->notes->PlaceHolder = RemoveHtml($this->notes->caption());

			// calls
			$this->calls->EditAttrs["class"] = "form-control";
			$this->calls->EditCustomAttributes = "";
			$this->calls->EditValue = HtmlEncode($this->calls->CurrentValue);
			$this->calls->PlaceHolder = RemoveHtml($this->calls->caption());

			// age
			$this->age->EditAttrs["class"] = "form-control";
			$this->age->EditCustomAttributes = "";
			$this->age->EditValue = HtmlEncode($this->age->CurrentValue);
			$this->age->PlaceHolder = RemoveHtml($this->age->caption());

			// hash
			$this->hash->EditAttrs["class"] = "form-control";
			$this->hash->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->hash->CurrentValue = HtmlDecode($this->hash->CurrentValue);
			$this->hash->EditValue = HtmlEncode($this->hash->CurrentValue);
			$this->hash->PlaceHolder = RemoveHtml($this->hash->caption());

			// linkedInProfileLink
			$this->linkedInProfileLink->EditAttrs["class"] = "form-control";
			$this->linkedInProfileLink->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->linkedInProfileLink->CurrentValue = HtmlDecode($this->linkedInProfileLink->CurrentValue);
			$this->linkedInProfileLink->EditValue = HtmlEncode($this->linkedInProfileLink->CurrentValue);
			$this->linkedInProfileLink->PlaceHolder = RemoveHtml($this->linkedInProfileLink->caption());

			// linkedInProfileId
			$this->linkedInProfileId->EditAttrs["class"] = "form-control";
			$this->linkedInProfileId->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->linkedInProfileId->CurrentValue = HtmlDecode($this->linkedInProfileId->CurrentValue);
			$this->linkedInProfileId->EditValue = HtmlEncode($this->linkedInProfileId->CurrentValue);
			$this->linkedInProfileId->PlaceHolder = RemoveHtml($this->linkedInProfileId->caption());

			// facebookProfileLink
			$this->facebookProfileLink->EditAttrs["class"] = "form-control";
			$this->facebookProfileLink->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->facebookProfileLink->CurrentValue = HtmlDecode($this->facebookProfileLink->CurrentValue);
			$this->facebookProfileLink->EditValue = HtmlEncode($this->facebookProfileLink->CurrentValue);
			$this->facebookProfileLink->PlaceHolder = RemoveHtml($this->facebookProfileLink->caption());

			// facebookProfileId
			$this->facebookProfileId->EditAttrs["class"] = "form-control";
			$this->facebookProfileId->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->facebookProfileId->CurrentValue = HtmlDecode($this->facebookProfileId->CurrentValue);
			$this->facebookProfileId->EditValue = HtmlEncode($this->facebookProfileId->CurrentValue);
			$this->facebookProfileId->PlaceHolder = RemoveHtml($this->facebookProfileId->caption());

			// twitterProfileLink
			$this->twitterProfileLink->EditAttrs["class"] = "form-control";
			$this->twitterProfileLink->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->twitterProfileLink->CurrentValue = HtmlDecode($this->twitterProfileLink->CurrentValue);
			$this->twitterProfileLink->EditValue = HtmlEncode($this->twitterProfileLink->CurrentValue);
			$this->twitterProfileLink->PlaceHolder = RemoveHtml($this->twitterProfileLink->caption());

			// twitterProfileId
			$this->twitterProfileId->EditAttrs["class"] = "form-control";
			$this->twitterProfileId->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->twitterProfileId->CurrentValue = HtmlDecode($this->twitterProfileId->CurrentValue);
			$this->twitterProfileId->EditValue = HtmlEncode($this->twitterProfileId->CurrentValue);
			$this->twitterProfileId->PlaceHolder = RemoveHtml($this->twitterProfileId->caption());

			// googleProfileLink
			$this->googleProfileLink->EditAttrs["class"] = "form-control";
			$this->googleProfileLink->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->googleProfileLink->CurrentValue = HtmlDecode($this->googleProfileLink->CurrentValue);
			$this->googleProfileLink->EditValue = HtmlEncode($this->googleProfileLink->CurrentValue);
			$this->googleProfileLink->PlaceHolder = RemoveHtml($this->googleProfileLink->caption());

			// googleProfileId
			$this->googleProfileId->EditAttrs["class"] = "form-control";
			$this->googleProfileId->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->googleProfileId->CurrentValue = HtmlDecode($this->googleProfileId->CurrentValue);
			$this->googleProfileId->EditValue = HtmlEncode($this->googleProfileId->CurrentValue);
			$this->googleProfileId->PlaceHolder = RemoveHtml($this->googleProfileId->caption());

			// Add refer script
			// first_name

			$this->first_name->LinkCustomAttributes = "";
			$this->first_name->HrefValue = "";

			// last_name
			$this->last_name->LinkCustomAttributes = "";
			$this->last_name->HrefValue = "";

			// nationality
			$this->nationality->LinkCustomAttributes = "";
			$this->nationality->HrefValue = "";

			// birthday
			$this->birthday->LinkCustomAttributes = "";
			$this->birthday->HrefValue = "";

			// gender
			$this->gender->LinkCustomAttributes = "";
			$this->gender->HrefValue = "";

			// marital_status
			$this->marital_status->LinkCustomAttributes = "";
			$this->marital_status->HrefValue = "";

			// address1
			$this->address1->LinkCustomAttributes = "";
			$this->address1->HrefValue = "";

			// address2
			$this->address2->LinkCustomAttributes = "";
			$this->address2->HrefValue = "";

			// city
			$this->city->LinkCustomAttributes = "";
			$this->city->HrefValue = "";

			// country
			$this->country->LinkCustomAttributes = "";
			$this->country->HrefValue = "";

			// province
			$this->province->LinkCustomAttributes = "";
			$this->province->HrefValue = "";

			// postal_code
			$this->postal_code->LinkCustomAttributes = "";
			$this->postal_code->HrefValue = "";

			// email
			$this->_email->LinkCustomAttributes = "";
			$this->_email->HrefValue = "";

			// home_phone
			$this->home_phone->LinkCustomAttributes = "";
			$this->home_phone->HrefValue = "";

			// mobile_phone
			$this->mobile_phone->LinkCustomAttributes = "";
			$this->mobile_phone->HrefValue = "";

			// cv_title
			$this->cv_title->LinkCustomAttributes = "";
			$this->cv_title->HrefValue = "";

			// cv
			$this->cv->LinkCustomAttributes = "";
			$this->cv->HrefValue = "";

			// cvtext
			$this->cvtext->LinkCustomAttributes = "";
			$this->cvtext->HrefValue = "";

			// industry
			$this->industry->LinkCustomAttributes = "";
			$this->industry->HrefValue = "";

			// profileImage
			$this->profileImage->LinkCustomAttributes = "";
			$this->profileImage->HrefValue = "";

			// head_line
			$this->head_line->LinkCustomAttributes = "";
			$this->head_line->HrefValue = "";

			// objective
			$this->objective->LinkCustomAttributes = "";
			$this->objective->HrefValue = "";

			// work_history
			$this->work_history->LinkCustomAttributes = "";
			$this->work_history->HrefValue = "";

			// education
			$this->education->LinkCustomAttributes = "";
			$this->education->HrefValue = "";

			// skills
			$this->skills->LinkCustomAttributes = "";
			$this->skills->HrefValue = "";

			// referees
			$this->referees->LinkCustomAttributes = "";
			$this->referees->HrefValue = "";

			// linkedInUrl
			$this->linkedInUrl->LinkCustomAttributes = "";
			$this->linkedInUrl->HrefValue = "";

			// linkedInData
			$this->linkedInData->LinkCustomAttributes = "";
			$this->linkedInData->HrefValue = "";

			// totalYearsOfExperience
			$this->totalYearsOfExperience->LinkCustomAttributes = "";
			$this->totalYearsOfExperience->HrefValue = "";

			// totalMonthsOfExperience
			$this->totalMonthsOfExperience->LinkCustomAttributes = "";
			$this->totalMonthsOfExperience->HrefValue = "";

			// htmlCVData
			$this->htmlCVData->LinkCustomAttributes = "";
			$this->htmlCVData->HrefValue = "";

			// generatedCVFile
			$this->generatedCVFile->LinkCustomAttributes = "";
			$this->generatedCVFile->HrefValue = "";

			// created
			$this->created->LinkCustomAttributes = "";
			$this->created->HrefValue = "";

			// updated
			$this->updated->LinkCustomAttributes = "";
			$this->updated->HrefValue = "";

			// expectedSalary
			$this->expectedSalary->LinkCustomAttributes = "";
			$this->expectedSalary->HrefValue = "";

			// preferedPositions
			$this->preferedPositions->LinkCustomAttributes = "";
			$this->preferedPositions->HrefValue = "";

			// preferedJobtype
			$this->preferedJobtype->LinkCustomAttributes = "";
			$this->preferedJobtype->HrefValue = "";

			// preferedCountries
			$this->preferedCountries->LinkCustomAttributes = "";
			$this->preferedCountries->HrefValue = "";

			// tags
			$this->tags->LinkCustomAttributes = "";
			$this->tags->HrefValue = "";

			// notes
			$this->notes->LinkCustomAttributes = "";
			$this->notes->HrefValue = "";

			// calls
			$this->calls->LinkCustomAttributes = "";
			$this->calls->HrefValue = "";

			// age
			$this->age->LinkCustomAttributes = "";
			$this->age->HrefValue = "";

			// hash
			$this->hash->LinkCustomAttributes = "";
			$this->hash->HrefValue = "";

			// linkedInProfileLink
			$this->linkedInProfileLink->LinkCustomAttributes = "";
			$this->linkedInProfileLink->HrefValue = "";

			// linkedInProfileId
			$this->linkedInProfileId->LinkCustomAttributes = "";
			$this->linkedInProfileId->HrefValue = "";

			// facebookProfileLink
			$this->facebookProfileLink->LinkCustomAttributes = "";
			$this->facebookProfileLink->HrefValue = "";

			// facebookProfileId
			$this->facebookProfileId->LinkCustomAttributes = "";
			$this->facebookProfileId->HrefValue = "";

			// twitterProfileLink
			$this->twitterProfileLink->LinkCustomAttributes = "";
			$this->twitterProfileLink->HrefValue = "";

			// twitterProfileId
			$this->twitterProfileId->LinkCustomAttributes = "";
			$this->twitterProfileId->HrefValue = "";

			// googleProfileLink
			$this->googleProfileLink->LinkCustomAttributes = "";
			$this->googleProfileLink->HrefValue = "";

			// googleProfileId
			$this->googleProfileId->LinkCustomAttributes = "";
			$this->googleProfileId->HrefValue = "";
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
		if ($this->first_name->Required) {
			if (!$this->first_name->IsDetailKey && $this->first_name->FormValue != NULL && $this->first_name->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->first_name->caption(), $this->first_name->RequiredErrorMessage));
			}
		}
		if ($this->last_name->Required) {
			if (!$this->last_name->IsDetailKey && $this->last_name->FormValue != NULL && $this->last_name->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->last_name->caption(), $this->last_name->RequiredErrorMessage));
			}
		}
		if ($this->nationality->Required) {
			if (!$this->nationality->IsDetailKey && $this->nationality->FormValue != NULL && $this->nationality->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->nationality->caption(), $this->nationality->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->nationality->FormValue)) {
			AddMessage($FormError, $this->nationality->errorMessage());
		}
		if ($this->birthday->Required) {
			if (!$this->birthday->IsDetailKey && $this->birthday->FormValue != NULL && $this->birthday->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->birthday->caption(), $this->birthday->RequiredErrorMessage));
			}
		}
		if (!CheckDate($this->birthday->FormValue)) {
			AddMessage($FormError, $this->birthday->errorMessage());
		}
		if ($this->gender->Required) {
			if ($this->gender->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->gender->caption(), $this->gender->RequiredErrorMessage));
			}
		}
		if ($this->marital_status->Required) {
			if ($this->marital_status->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->marital_status->caption(), $this->marital_status->RequiredErrorMessage));
			}
		}
		if ($this->address1->Required) {
			if (!$this->address1->IsDetailKey && $this->address1->FormValue != NULL && $this->address1->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->address1->caption(), $this->address1->RequiredErrorMessage));
			}
		}
		if ($this->address2->Required) {
			if (!$this->address2->IsDetailKey && $this->address2->FormValue != NULL && $this->address2->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->address2->caption(), $this->address2->RequiredErrorMessage));
			}
		}
		if ($this->city->Required) {
			if (!$this->city->IsDetailKey && $this->city->FormValue != NULL && $this->city->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->city->caption(), $this->city->RequiredErrorMessage));
			}
		}
		if ($this->country->Required) {
			if (!$this->country->IsDetailKey && $this->country->FormValue != NULL && $this->country->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->country->caption(), $this->country->RequiredErrorMessage));
			}
		}
		if ($this->province->Required) {
			if (!$this->province->IsDetailKey && $this->province->FormValue != NULL && $this->province->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->province->caption(), $this->province->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->province->FormValue)) {
			AddMessage($FormError, $this->province->errorMessage());
		}
		if ($this->postal_code->Required) {
			if (!$this->postal_code->IsDetailKey && $this->postal_code->FormValue != NULL && $this->postal_code->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->postal_code->caption(), $this->postal_code->RequiredErrorMessage));
			}
		}
		if ($this->_email->Required) {
			if (!$this->_email->IsDetailKey && $this->_email->FormValue != NULL && $this->_email->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->_email->caption(), $this->_email->RequiredErrorMessage));
			}
		}
		if ($this->home_phone->Required) {
			if (!$this->home_phone->IsDetailKey && $this->home_phone->FormValue != NULL && $this->home_phone->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->home_phone->caption(), $this->home_phone->RequiredErrorMessage));
			}
		}
		if ($this->mobile_phone->Required) {
			if (!$this->mobile_phone->IsDetailKey && $this->mobile_phone->FormValue != NULL && $this->mobile_phone->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->mobile_phone->caption(), $this->mobile_phone->RequiredErrorMessage));
			}
		}
		if ($this->cv_title->Required) {
			if (!$this->cv_title->IsDetailKey && $this->cv_title->FormValue != NULL && $this->cv_title->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->cv_title->caption(), $this->cv_title->RequiredErrorMessage));
			}
		}
		if ($this->cv->Required) {
			if (!$this->cv->IsDetailKey && $this->cv->FormValue != NULL && $this->cv->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->cv->caption(), $this->cv->RequiredErrorMessage));
			}
		}
		if ($this->cvtext->Required) {
			if (!$this->cvtext->IsDetailKey && $this->cvtext->FormValue != NULL && $this->cvtext->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->cvtext->caption(), $this->cvtext->RequiredErrorMessage));
			}
		}
		if ($this->industry->Required) {
			if (!$this->industry->IsDetailKey && $this->industry->FormValue != NULL && $this->industry->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->industry->caption(), $this->industry->RequiredErrorMessage));
			}
		}
		if ($this->profileImage->Required) {
			if (!$this->profileImage->IsDetailKey && $this->profileImage->FormValue != NULL && $this->profileImage->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->profileImage->caption(), $this->profileImage->RequiredErrorMessage));
			}
		}
		if ($this->head_line->Required) {
			if (!$this->head_line->IsDetailKey && $this->head_line->FormValue != NULL && $this->head_line->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->head_line->caption(), $this->head_line->RequiredErrorMessage));
			}
		}
		if ($this->objective->Required) {
			if (!$this->objective->IsDetailKey && $this->objective->FormValue != NULL && $this->objective->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->objective->caption(), $this->objective->RequiredErrorMessage));
			}
		}
		if ($this->work_history->Required) {
			if (!$this->work_history->IsDetailKey && $this->work_history->FormValue != NULL && $this->work_history->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->work_history->caption(), $this->work_history->RequiredErrorMessage));
			}
		}
		if ($this->education->Required) {
			if (!$this->education->IsDetailKey && $this->education->FormValue != NULL && $this->education->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->education->caption(), $this->education->RequiredErrorMessage));
			}
		}
		if ($this->skills->Required) {
			if (!$this->skills->IsDetailKey && $this->skills->FormValue != NULL && $this->skills->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->skills->caption(), $this->skills->RequiredErrorMessage));
			}
		}
		if ($this->referees->Required) {
			if (!$this->referees->IsDetailKey && $this->referees->FormValue != NULL && $this->referees->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->referees->caption(), $this->referees->RequiredErrorMessage));
			}
		}
		if ($this->linkedInUrl->Required) {
			if (!$this->linkedInUrl->IsDetailKey && $this->linkedInUrl->FormValue != NULL && $this->linkedInUrl->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->linkedInUrl->caption(), $this->linkedInUrl->RequiredErrorMessage));
			}
		}
		if ($this->linkedInData->Required) {
			if (!$this->linkedInData->IsDetailKey && $this->linkedInData->FormValue != NULL && $this->linkedInData->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->linkedInData->caption(), $this->linkedInData->RequiredErrorMessage));
			}
		}
		if ($this->totalYearsOfExperience->Required) {
			if (!$this->totalYearsOfExperience->IsDetailKey && $this->totalYearsOfExperience->FormValue != NULL && $this->totalYearsOfExperience->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->totalYearsOfExperience->caption(), $this->totalYearsOfExperience->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->totalYearsOfExperience->FormValue)) {
			AddMessage($FormError, $this->totalYearsOfExperience->errorMessage());
		}
		if ($this->totalMonthsOfExperience->Required) {
			if (!$this->totalMonthsOfExperience->IsDetailKey && $this->totalMonthsOfExperience->FormValue != NULL && $this->totalMonthsOfExperience->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->totalMonthsOfExperience->caption(), $this->totalMonthsOfExperience->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->totalMonthsOfExperience->FormValue)) {
			AddMessage($FormError, $this->totalMonthsOfExperience->errorMessage());
		}
		if ($this->htmlCVData->Required) {
			if (!$this->htmlCVData->IsDetailKey && $this->htmlCVData->FormValue != NULL && $this->htmlCVData->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->htmlCVData->caption(), $this->htmlCVData->RequiredErrorMessage));
			}
		}
		if ($this->generatedCVFile->Required) {
			if (!$this->generatedCVFile->IsDetailKey && $this->generatedCVFile->FormValue != NULL && $this->generatedCVFile->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->generatedCVFile->caption(), $this->generatedCVFile->RequiredErrorMessage));
			}
		}
		if ($this->created->Required) {
			if (!$this->created->IsDetailKey && $this->created->FormValue != NULL && $this->created->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->created->caption(), $this->created->RequiredErrorMessage));
			}
		}
		if (!CheckDate($this->created->FormValue)) {
			AddMessage($FormError, $this->created->errorMessage());
		}
		if ($this->updated->Required) {
			if (!$this->updated->IsDetailKey && $this->updated->FormValue != NULL && $this->updated->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->updated->caption(), $this->updated->RequiredErrorMessage));
			}
		}
		if (!CheckDate($this->updated->FormValue)) {
			AddMessage($FormError, $this->updated->errorMessage());
		}
		if ($this->expectedSalary->Required) {
			if (!$this->expectedSalary->IsDetailKey && $this->expectedSalary->FormValue != NULL && $this->expectedSalary->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->expectedSalary->caption(), $this->expectedSalary->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->expectedSalary->FormValue)) {
			AddMessage($FormError, $this->expectedSalary->errorMessage());
		}
		if ($this->preferedPositions->Required) {
			if (!$this->preferedPositions->IsDetailKey && $this->preferedPositions->FormValue != NULL && $this->preferedPositions->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->preferedPositions->caption(), $this->preferedPositions->RequiredErrorMessage));
			}
		}
		if ($this->preferedJobtype->Required) {
			if (!$this->preferedJobtype->IsDetailKey && $this->preferedJobtype->FormValue != NULL && $this->preferedJobtype->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->preferedJobtype->caption(), $this->preferedJobtype->RequiredErrorMessage));
			}
		}
		if ($this->preferedCountries->Required) {
			if (!$this->preferedCountries->IsDetailKey && $this->preferedCountries->FormValue != NULL && $this->preferedCountries->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->preferedCountries->caption(), $this->preferedCountries->RequiredErrorMessage));
			}
		}
		if ($this->tags->Required) {
			if (!$this->tags->IsDetailKey && $this->tags->FormValue != NULL && $this->tags->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->tags->caption(), $this->tags->RequiredErrorMessage));
			}
		}
		if ($this->notes->Required) {
			if (!$this->notes->IsDetailKey && $this->notes->FormValue != NULL && $this->notes->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->notes->caption(), $this->notes->RequiredErrorMessage));
			}
		}
		if ($this->calls->Required) {
			if (!$this->calls->IsDetailKey && $this->calls->FormValue != NULL && $this->calls->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->calls->caption(), $this->calls->RequiredErrorMessage));
			}
		}
		if ($this->age->Required) {
			if (!$this->age->IsDetailKey && $this->age->FormValue != NULL && $this->age->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->age->caption(), $this->age->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->age->FormValue)) {
			AddMessage($FormError, $this->age->errorMessage());
		}
		if ($this->hash->Required) {
			if (!$this->hash->IsDetailKey && $this->hash->FormValue != NULL && $this->hash->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->hash->caption(), $this->hash->RequiredErrorMessage));
			}
		}
		if ($this->linkedInProfileLink->Required) {
			if (!$this->linkedInProfileLink->IsDetailKey && $this->linkedInProfileLink->FormValue != NULL && $this->linkedInProfileLink->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->linkedInProfileLink->caption(), $this->linkedInProfileLink->RequiredErrorMessage));
			}
		}
		if ($this->linkedInProfileId->Required) {
			if (!$this->linkedInProfileId->IsDetailKey && $this->linkedInProfileId->FormValue != NULL && $this->linkedInProfileId->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->linkedInProfileId->caption(), $this->linkedInProfileId->RequiredErrorMessage));
			}
		}
		if ($this->facebookProfileLink->Required) {
			if (!$this->facebookProfileLink->IsDetailKey && $this->facebookProfileLink->FormValue != NULL && $this->facebookProfileLink->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->facebookProfileLink->caption(), $this->facebookProfileLink->RequiredErrorMessage));
			}
		}
		if ($this->facebookProfileId->Required) {
			if (!$this->facebookProfileId->IsDetailKey && $this->facebookProfileId->FormValue != NULL && $this->facebookProfileId->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->facebookProfileId->caption(), $this->facebookProfileId->RequiredErrorMessage));
			}
		}
		if ($this->twitterProfileLink->Required) {
			if (!$this->twitterProfileLink->IsDetailKey && $this->twitterProfileLink->FormValue != NULL && $this->twitterProfileLink->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->twitterProfileLink->caption(), $this->twitterProfileLink->RequiredErrorMessage));
			}
		}
		if ($this->twitterProfileId->Required) {
			if (!$this->twitterProfileId->IsDetailKey && $this->twitterProfileId->FormValue != NULL && $this->twitterProfileId->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->twitterProfileId->caption(), $this->twitterProfileId->RequiredErrorMessage));
			}
		}
		if ($this->googleProfileLink->Required) {
			if (!$this->googleProfileLink->IsDetailKey && $this->googleProfileLink->FormValue != NULL && $this->googleProfileLink->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->googleProfileLink->caption(), $this->googleProfileLink->RequiredErrorMessage));
			}
		}
		if ($this->googleProfileId->Required) {
			if (!$this->googleProfileId->IsDetailKey && $this->googleProfileId->FormValue != NULL && $this->googleProfileId->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->googleProfileId->caption(), $this->googleProfileId->RequiredErrorMessage));
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

		// first_name
		$this->first_name->setDbValueDef($rsnew, $this->first_name->CurrentValue, "", FALSE);

		// last_name
		$this->last_name->setDbValueDef($rsnew, $this->last_name->CurrentValue, "", FALSE);

		// nationality
		$this->nationality->setDbValueDef($rsnew, $this->nationality->CurrentValue, NULL, FALSE);

		// birthday
		$this->birthday->setDbValueDef($rsnew, UnFormatDateTime($this->birthday->CurrentValue, 0), NULL, FALSE);

		// gender
		$this->gender->setDbValueDef($rsnew, $this->gender->CurrentValue, NULL, FALSE);

		// marital_status
		$this->marital_status->setDbValueDef($rsnew, $this->marital_status->CurrentValue, NULL, FALSE);

		// address1
		$this->address1->setDbValueDef($rsnew, $this->address1->CurrentValue, NULL, FALSE);

		// address2
		$this->address2->setDbValueDef($rsnew, $this->address2->CurrentValue, NULL, FALSE);

		// city
		$this->city->setDbValueDef($rsnew, $this->city->CurrentValue, NULL, FALSE);

		// country
		$this->country->setDbValueDef($rsnew, $this->country->CurrentValue, NULL, FALSE);

		// province
		$this->province->setDbValueDef($rsnew, $this->province->CurrentValue, NULL, FALSE);

		// postal_code
		$this->postal_code->setDbValueDef($rsnew, $this->postal_code->CurrentValue, NULL, FALSE);

		// email
		$this->_email->setDbValueDef($rsnew, $this->_email->CurrentValue, NULL, FALSE);

		// home_phone
		$this->home_phone->setDbValueDef($rsnew, $this->home_phone->CurrentValue, NULL, FALSE);

		// mobile_phone
		$this->mobile_phone->setDbValueDef($rsnew, $this->mobile_phone->CurrentValue, NULL, FALSE);

		// cv_title
		$this->cv_title->setDbValueDef($rsnew, $this->cv_title->CurrentValue, "", FALSE);

		// cv
		$this->cv->setDbValueDef($rsnew, $this->cv->CurrentValue, NULL, FALSE);

		// cvtext
		$this->cvtext->setDbValueDef($rsnew, $this->cvtext->CurrentValue, NULL, FALSE);

		// industry
		$this->industry->setDbValueDef($rsnew, $this->industry->CurrentValue, NULL, FALSE);

		// profileImage
		$this->profileImage->setDbValueDef($rsnew, $this->profileImage->CurrentValue, NULL, FALSE);

		// head_line
		$this->head_line->setDbValueDef($rsnew, $this->head_line->CurrentValue, NULL, FALSE);

		// objective
		$this->objective->setDbValueDef($rsnew, $this->objective->CurrentValue, NULL, FALSE);

		// work_history
		$this->work_history->setDbValueDef($rsnew, $this->work_history->CurrentValue, NULL, FALSE);

		// education
		$this->education->setDbValueDef($rsnew, $this->education->CurrentValue, NULL, FALSE);

		// skills
		$this->skills->setDbValueDef($rsnew, $this->skills->CurrentValue, NULL, FALSE);

		// referees
		$this->referees->setDbValueDef($rsnew, $this->referees->CurrentValue, NULL, FALSE);

		// linkedInUrl
		$this->linkedInUrl->setDbValueDef($rsnew, $this->linkedInUrl->CurrentValue, NULL, FALSE);

		// linkedInData
		$this->linkedInData->setDbValueDef($rsnew, $this->linkedInData->CurrentValue, NULL, FALSE);

		// totalYearsOfExperience
		$this->totalYearsOfExperience->setDbValueDef($rsnew, $this->totalYearsOfExperience->CurrentValue, NULL, FALSE);

		// totalMonthsOfExperience
		$this->totalMonthsOfExperience->setDbValueDef($rsnew, $this->totalMonthsOfExperience->CurrentValue, NULL, FALSE);

		// htmlCVData
		$this->htmlCVData->setDbValueDef($rsnew, $this->htmlCVData->CurrentValue, NULL, FALSE);

		// generatedCVFile
		$this->generatedCVFile->setDbValueDef($rsnew, $this->generatedCVFile->CurrentValue, NULL, FALSE);

		// created
		$this->created->setDbValueDef($rsnew, UnFormatDateTime($this->created->CurrentValue, 0), NULL, FALSE);

		// updated
		$this->updated->setDbValueDef($rsnew, UnFormatDateTime($this->updated->CurrentValue, 0), NULL, FALSE);

		// expectedSalary
		$this->expectedSalary->setDbValueDef($rsnew, $this->expectedSalary->CurrentValue, NULL, FALSE);

		// preferedPositions
		$this->preferedPositions->setDbValueDef($rsnew, $this->preferedPositions->CurrentValue, NULL, FALSE);

		// preferedJobtype
		$this->preferedJobtype->setDbValueDef($rsnew, $this->preferedJobtype->CurrentValue, NULL, FALSE);

		// preferedCountries
		$this->preferedCountries->setDbValueDef($rsnew, $this->preferedCountries->CurrentValue, NULL, FALSE);

		// tags
		$this->tags->setDbValueDef($rsnew, $this->tags->CurrentValue, NULL, FALSE);

		// notes
		$this->notes->setDbValueDef($rsnew, $this->notes->CurrentValue, NULL, FALSE);

		// calls
		$this->calls->setDbValueDef($rsnew, $this->calls->CurrentValue, NULL, FALSE);

		// age
		$this->age->setDbValueDef($rsnew, $this->age->CurrentValue, NULL, FALSE);

		// hash
		$this->hash->setDbValueDef($rsnew, $this->hash->CurrentValue, NULL, FALSE);

		// linkedInProfileLink
		$this->linkedInProfileLink->setDbValueDef($rsnew, $this->linkedInProfileLink->CurrentValue, NULL, FALSE);

		// linkedInProfileId
		$this->linkedInProfileId->setDbValueDef($rsnew, $this->linkedInProfileId->CurrentValue, NULL, FALSE);

		// facebookProfileLink
		$this->facebookProfileLink->setDbValueDef($rsnew, $this->facebookProfileLink->CurrentValue, NULL, FALSE);

		// facebookProfileId
		$this->facebookProfileId->setDbValueDef($rsnew, $this->facebookProfileId->CurrentValue, NULL, FALSE);

		// twitterProfileLink
		$this->twitterProfileLink->setDbValueDef($rsnew, $this->twitterProfileLink->CurrentValue, NULL, FALSE);

		// twitterProfileId
		$this->twitterProfileId->setDbValueDef($rsnew, $this->twitterProfileId->CurrentValue, NULL, FALSE);

		// googleProfileLink
		$this->googleProfileLink->setDbValueDef($rsnew, $this->googleProfileLink->CurrentValue, NULL, FALSE);

		// googleProfileId
		$this->googleProfileId->setDbValueDef($rsnew, $this->googleProfileId->CurrentValue, NULL, FALSE);

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

	// Set up Breadcrumb
	protected function setupBreadcrumb()
	{
		global $Breadcrumb, $Language;
		$Breadcrumb = new Breadcrumb();
		$url = substr(CurrentUrl(), strrpos(CurrentUrl(), "/")+1);
		$Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("recruitment_candidateslist.php"), "", $this->TableVar, TRUE);
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
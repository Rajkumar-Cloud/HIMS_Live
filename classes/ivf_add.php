<?php
namespace PHPMaker2019\HIMS;

/**
 * Page class
 */
class ivf_add extends ivf
{

	// Page ID
	public $PageID = "add";

	// Project ID
	public $ProjectID = "{EA4F6D13-AF8F-428D-9EA7-BA88D1107EC3}";

	// Table name
	public $TableName = 'ivf';

	// Page object name
	public $PageObjName = "ivf_add";

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

		// Table object (ivf)
		if (!isset($GLOBALS["ivf"]) || get_class($GLOBALS["ivf"]) == PROJECT_NAMESPACE . "ivf") {
			$GLOBALS["ivf"] = &$this;
			$GLOBALS["Table"] = &$GLOBALS["ivf"];
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
			define(PROJECT_NAMESPACE . "TABLE_NAME", 'ivf');

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
		global $EXPORT, $ivf;
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
				$doc = new $class($ivf);
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
					if ($pageName == "ivfview.php")
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
					$this->terminate(GetUrl("ivflist.php"));
				else
					$this->terminate(GetUrl("login.php"));
				return;
			}
		}

		// Create form object
		$CurrentForm = new HttpForm();
		$this->CurrentAction = Param("action"); // Set up current action
		$this->id->Visible = FALSE;
		$this->Male->setVisibility();
		$this->Female->setVisibility();
		$this->status->setVisibility();
		$this->createdby->setVisibility();
		$this->createddatetime->setVisibility();
		$this->modifiedby->Visible = FALSE;
		$this->modifieddatetime->Visible = FALSE;
		$this->malepropic->setVisibility();
		$this->femalepropic->setVisibility();
		$this->HusbandEducation->setVisibility();
		$this->WifeEducation->setVisibility();
		$this->HusbandWorkHours->setVisibility();
		$this->WifeWorkHours->setVisibility();
		$this->PatientLanguage->setVisibility();
		$this->ReferedBy->setVisibility();
		$this->ReferPhNo->setVisibility();
		$this->WifeCell->setVisibility();
		$this->HusbandCell->setVisibility();
		$this->WifeEmail->setVisibility();
		$this->HusbandEmail->setVisibility();
		$this->ARTCYCLE->setVisibility();
		$this->RESULT->setVisibility();
		$this->malepic->setVisibility();
		$this->femalepic->setVisibility();
		$this->Mgendar->setVisibility();
		$this->Fgendar->setVisibility();
		$this->CoupleID->setVisibility();
		$this->HospID->setVisibility();
		$this->PatientName->setVisibility();
		$this->PatientID->setVisibility();
		$this->PartnerName->setVisibility();
		$this->PartnerID->setVisibility();
		$this->DrID->setVisibility();
		$this->DrDepartment->setVisibility();
		$this->Doctor->setVisibility();
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
		$this->setupLookupOptions($this->Male);
		$this->setupLookupOptions($this->Female);
		$this->setupLookupOptions($this->status);
		$this->setupLookupOptions($this->ReferedBy);
		$this->setupLookupOptions($this->DrID);

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

		// Set up detail parameters
		$this->setupDetailParms();

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
					$this->terminate("ivflist.php"); // No matching record, return to list
				}

				// Set up detail parameters
				$this->setupDetailParms();
				break;
			case "insert": // Add new record
				$this->SendEmail = TRUE; // Send email on add success
				if ($this->addRow($this->OldRecordset)) { // Add successful
					if ($this->getSuccessMessage() == "")
						$this->setSuccessMessage($Language->phrase("AddSuccess")); // Set up success message
					if ($this->getCurrentDetailTable() <> "") // Master/detail add
						$returnUrl = $this->getDetailUrl();
					else
						$returnUrl = $this->getReturnUrl();
					if (GetPageName($returnUrl) == "ivflist.php")
						$returnUrl = $this->addMasterUrl($returnUrl); // List page, return to List page with correct master key if necessary
					elseif (GetPageName($returnUrl) == "ivfview.php")
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

					// Set up detail parameters
					$this->setupDetailParms();
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
		$this->malepropic->Upload->Index = $CurrentForm->Index;
		$this->malepropic->Upload->uploadFile();
		$this->malepropic->CurrentValue = $this->malepropic->Upload->FileName;
		$this->femalepropic->Upload->Index = $CurrentForm->Index;
		$this->femalepropic->Upload->uploadFile();
		$this->femalepropic->CurrentValue = $this->femalepropic->Upload->FileName;
	}

	// Load default values
	protected function loadDefaultValues()
	{
		$this->id->CurrentValue = NULL;
		$this->id->OldValue = $this->id->CurrentValue;
		$this->Male->CurrentValue = NULL;
		$this->Male->OldValue = $this->Male->CurrentValue;
		$this->Female->CurrentValue = NULL;
		$this->Female->OldValue = $this->Female->CurrentValue;
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
		$this->malepropic->Upload->DbValue = NULL;
		$this->malepropic->OldValue = $this->malepropic->Upload->DbValue;
		$this->malepropic->CurrentValue = NULL; // Clear file related field
		$this->femalepropic->Upload->DbValue = NULL;
		$this->femalepropic->OldValue = $this->femalepropic->Upload->DbValue;
		$this->femalepropic->CurrentValue = NULL; // Clear file related field
		$this->HusbandEducation->CurrentValue = NULL;
		$this->HusbandEducation->OldValue = $this->HusbandEducation->CurrentValue;
		$this->WifeEducation->CurrentValue = NULL;
		$this->WifeEducation->OldValue = $this->WifeEducation->CurrentValue;
		$this->HusbandWorkHours->CurrentValue = NULL;
		$this->HusbandWorkHours->OldValue = $this->HusbandWorkHours->CurrentValue;
		$this->WifeWorkHours->CurrentValue = NULL;
		$this->WifeWorkHours->OldValue = $this->WifeWorkHours->CurrentValue;
		$this->PatientLanguage->CurrentValue = NULL;
		$this->PatientLanguage->OldValue = $this->PatientLanguage->CurrentValue;
		$this->ReferedBy->CurrentValue = NULL;
		$this->ReferedBy->OldValue = $this->ReferedBy->CurrentValue;
		$this->ReferPhNo->CurrentValue = NULL;
		$this->ReferPhNo->OldValue = $this->ReferPhNo->CurrentValue;
		$this->WifeCell->CurrentValue = NULL;
		$this->WifeCell->OldValue = $this->WifeCell->CurrentValue;
		$this->HusbandCell->CurrentValue = NULL;
		$this->HusbandCell->OldValue = $this->HusbandCell->CurrentValue;
		$this->WifeEmail->CurrentValue = NULL;
		$this->WifeEmail->OldValue = $this->WifeEmail->CurrentValue;
		$this->HusbandEmail->CurrentValue = NULL;
		$this->HusbandEmail->OldValue = $this->HusbandEmail->CurrentValue;
		$this->ARTCYCLE->CurrentValue = NULL;
		$this->ARTCYCLE->OldValue = $this->ARTCYCLE->CurrentValue;
		$this->RESULT->CurrentValue = NULL;
		$this->RESULT->OldValue = $this->RESULT->CurrentValue;
		$this->malepic->CurrentValue = NULL;
		$this->malepic->OldValue = $this->malepic->CurrentValue;
		$this->femalepic->CurrentValue = NULL;
		$this->femalepic->OldValue = $this->femalepic->CurrentValue;
		$this->Mgendar->CurrentValue = NULL;
		$this->Mgendar->OldValue = $this->Mgendar->CurrentValue;
		$this->Fgendar->CurrentValue = NULL;
		$this->Fgendar->OldValue = $this->Fgendar->CurrentValue;
		$this->CoupleID->CurrentValue = NULL;
		$this->CoupleID->OldValue = $this->CoupleID->CurrentValue;
		$this->HospID->CurrentValue = NULL;
		$this->HospID->OldValue = $this->HospID->CurrentValue;
		$this->PatientName->CurrentValue = NULL;
		$this->PatientName->OldValue = $this->PatientName->CurrentValue;
		$this->PatientID->CurrentValue = NULL;
		$this->PatientID->OldValue = $this->PatientID->CurrentValue;
		$this->PartnerName->CurrentValue = NULL;
		$this->PartnerName->OldValue = $this->PartnerName->CurrentValue;
		$this->PartnerID->CurrentValue = NULL;
		$this->PartnerID->OldValue = $this->PartnerID->CurrentValue;
		$this->DrID->CurrentValue = NULL;
		$this->DrID->OldValue = $this->DrID->CurrentValue;
		$this->DrDepartment->CurrentValue = NULL;
		$this->DrDepartment->OldValue = $this->DrDepartment->CurrentValue;
		$this->Doctor->CurrentValue = NULL;
		$this->Doctor->OldValue = $this->Doctor->CurrentValue;
	}

	// Load form values
	protected function loadFormValues()
	{

		// Load from form
		global $CurrentForm;
		$this->getUploadFiles(); // Get upload files

		// Check field name 'Male' first before field var 'x_Male'
		$val = $CurrentForm->hasValue("Male") ? $CurrentForm->getValue("Male") : $CurrentForm->getValue("x_Male");
		if (!$this->Male->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Male->Visible = FALSE; // Disable update for API request
			else
				$this->Male->setFormValue($val);
		}

		// Check field name 'Female' first before field var 'x_Female'
		$val = $CurrentForm->hasValue("Female") ? $CurrentForm->getValue("Female") : $CurrentForm->getValue("x_Female");
		if (!$this->Female->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Female->Visible = FALSE; // Disable update for API request
			else
				$this->Female->setFormValue($val);
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

		// Check field name 'HusbandEducation' first before field var 'x_HusbandEducation'
		$val = $CurrentForm->hasValue("HusbandEducation") ? $CurrentForm->getValue("HusbandEducation") : $CurrentForm->getValue("x_HusbandEducation");
		if (!$this->HusbandEducation->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->HusbandEducation->Visible = FALSE; // Disable update for API request
			else
				$this->HusbandEducation->setFormValue($val);
		}

		// Check field name 'WifeEducation' first before field var 'x_WifeEducation'
		$val = $CurrentForm->hasValue("WifeEducation") ? $CurrentForm->getValue("WifeEducation") : $CurrentForm->getValue("x_WifeEducation");
		if (!$this->WifeEducation->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->WifeEducation->Visible = FALSE; // Disable update for API request
			else
				$this->WifeEducation->setFormValue($val);
		}

		// Check field name 'HusbandWorkHours' first before field var 'x_HusbandWorkHours'
		$val = $CurrentForm->hasValue("HusbandWorkHours") ? $CurrentForm->getValue("HusbandWorkHours") : $CurrentForm->getValue("x_HusbandWorkHours");
		if (!$this->HusbandWorkHours->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->HusbandWorkHours->Visible = FALSE; // Disable update for API request
			else
				$this->HusbandWorkHours->setFormValue($val);
		}

		// Check field name 'WifeWorkHours' first before field var 'x_WifeWorkHours'
		$val = $CurrentForm->hasValue("WifeWorkHours") ? $CurrentForm->getValue("WifeWorkHours") : $CurrentForm->getValue("x_WifeWorkHours");
		if (!$this->WifeWorkHours->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->WifeWorkHours->Visible = FALSE; // Disable update for API request
			else
				$this->WifeWorkHours->setFormValue($val);
		}

		// Check field name 'PatientLanguage' first before field var 'x_PatientLanguage'
		$val = $CurrentForm->hasValue("PatientLanguage") ? $CurrentForm->getValue("PatientLanguage") : $CurrentForm->getValue("x_PatientLanguage");
		if (!$this->PatientLanguage->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->PatientLanguage->Visible = FALSE; // Disable update for API request
			else
				$this->PatientLanguage->setFormValue($val);
		}

		// Check field name 'ReferedBy' first before field var 'x_ReferedBy'
		$val = $CurrentForm->hasValue("ReferedBy") ? $CurrentForm->getValue("ReferedBy") : $CurrentForm->getValue("x_ReferedBy");
		if (!$this->ReferedBy->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->ReferedBy->Visible = FALSE; // Disable update for API request
			else
				$this->ReferedBy->setFormValue($val);
		}

		// Check field name 'ReferPhNo' first before field var 'x_ReferPhNo'
		$val = $CurrentForm->hasValue("ReferPhNo") ? $CurrentForm->getValue("ReferPhNo") : $CurrentForm->getValue("x_ReferPhNo");
		if (!$this->ReferPhNo->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->ReferPhNo->Visible = FALSE; // Disable update for API request
			else
				$this->ReferPhNo->setFormValue($val);
		}

		// Check field name 'WifeCell' first before field var 'x_WifeCell'
		$val = $CurrentForm->hasValue("WifeCell") ? $CurrentForm->getValue("WifeCell") : $CurrentForm->getValue("x_WifeCell");
		if (!$this->WifeCell->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->WifeCell->Visible = FALSE; // Disable update for API request
			else
				$this->WifeCell->setFormValue($val);
		}

		// Check field name 'HusbandCell' first before field var 'x_HusbandCell'
		$val = $CurrentForm->hasValue("HusbandCell") ? $CurrentForm->getValue("HusbandCell") : $CurrentForm->getValue("x_HusbandCell");
		if (!$this->HusbandCell->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->HusbandCell->Visible = FALSE; // Disable update for API request
			else
				$this->HusbandCell->setFormValue($val);
		}

		// Check field name 'WifeEmail' first before field var 'x_WifeEmail'
		$val = $CurrentForm->hasValue("WifeEmail") ? $CurrentForm->getValue("WifeEmail") : $CurrentForm->getValue("x_WifeEmail");
		if (!$this->WifeEmail->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->WifeEmail->Visible = FALSE; // Disable update for API request
			else
				$this->WifeEmail->setFormValue($val);
		}

		// Check field name 'HusbandEmail' first before field var 'x_HusbandEmail'
		$val = $CurrentForm->hasValue("HusbandEmail") ? $CurrentForm->getValue("HusbandEmail") : $CurrentForm->getValue("x_HusbandEmail");
		if (!$this->HusbandEmail->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->HusbandEmail->Visible = FALSE; // Disable update for API request
			else
				$this->HusbandEmail->setFormValue($val);
		}

		// Check field name 'ARTCYCLE' first before field var 'x_ARTCYCLE'
		$val = $CurrentForm->hasValue("ARTCYCLE") ? $CurrentForm->getValue("ARTCYCLE") : $CurrentForm->getValue("x_ARTCYCLE");
		if (!$this->ARTCYCLE->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->ARTCYCLE->Visible = FALSE; // Disable update for API request
			else
				$this->ARTCYCLE->setFormValue($val);
		}

		// Check field name 'RESULT' first before field var 'x_RESULT'
		$val = $CurrentForm->hasValue("RESULT") ? $CurrentForm->getValue("RESULT") : $CurrentForm->getValue("x_RESULT");
		if (!$this->RESULT->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->RESULT->Visible = FALSE; // Disable update for API request
			else
				$this->RESULT->setFormValue($val);
		}

		// Check field name 'malepic' first before field var 'x_malepic'
		$val = $CurrentForm->hasValue("malepic") ? $CurrentForm->getValue("malepic") : $CurrentForm->getValue("x_malepic");
		if (!$this->malepic->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->malepic->Visible = FALSE; // Disable update for API request
			else
				$this->malepic->setFormValue($val);
		}

		// Check field name 'femalepic' first before field var 'x_femalepic'
		$val = $CurrentForm->hasValue("femalepic") ? $CurrentForm->getValue("femalepic") : $CurrentForm->getValue("x_femalepic");
		if (!$this->femalepic->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->femalepic->Visible = FALSE; // Disable update for API request
			else
				$this->femalepic->setFormValue($val);
		}

		// Check field name 'Mgendar' first before field var 'x_Mgendar'
		$val = $CurrentForm->hasValue("Mgendar") ? $CurrentForm->getValue("Mgendar") : $CurrentForm->getValue("x_Mgendar");
		if (!$this->Mgendar->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Mgendar->Visible = FALSE; // Disable update for API request
			else
				$this->Mgendar->setFormValue($val);
		}

		// Check field name 'Fgendar' first before field var 'x_Fgendar'
		$val = $CurrentForm->hasValue("Fgendar") ? $CurrentForm->getValue("Fgendar") : $CurrentForm->getValue("x_Fgendar");
		if (!$this->Fgendar->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Fgendar->Visible = FALSE; // Disable update for API request
			else
				$this->Fgendar->setFormValue($val);
		}

		// Check field name 'CoupleID' first before field var 'x_CoupleID'
		$val = $CurrentForm->hasValue("CoupleID") ? $CurrentForm->getValue("CoupleID") : $CurrentForm->getValue("x_CoupleID");
		if (!$this->CoupleID->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->CoupleID->Visible = FALSE; // Disable update for API request
			else
				$this->CoupleID->setFormValue($val);
		}

		// Check field name 'HospID' first before field var 'x_HospID'
		$val = $CurrentForm->hasValue("HospID") ? $CurrentForm->getValue("HospID") : $CurrentForm->getValue("x_HospID");
		if (!$this->HospID->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->HospID->Visible = FALSE; // Disable update for API request
			else
				$this->HospID->setFormValue($val);
		}

		// Check field name 'PatientName' first before field var 'x_PatientName'
		$val = $CurrentForm->hasValue("PatientName") ? $CurrentForm->getValue("PatientName") : $CurrentForm->getValue("x_PatientName");
		if (!$this->PatientName->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->PatientName->Visible = FALSE; // Disable update for API request
			else
				$this->PatientName->setFormValue($val);
		}

		// Check field name 'PatientID' first before field var 'x_PatientID'
		$val = $CurrentForm->hasValue("PatientID") ? $CurrentForm->getValue("PatientID") : $CurrentForm->getValue("x_PatientID");
		if (!$this->PatientID->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->PatientID->Visible = FALSE; // Disable update for API request
			else
				$this->PatientID->setFormValue($val);
		}

		// Check field name 'PartnerName' first before field var 'x_PartnerName'
		$val = $CurrentForm->hasValue("PartnerName") ? $CurrentForm->getValue("PartnerName") : $CurrentForm->getValue("x_PartnerName");
		if (!$this->PartnerName->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->PartnerName->Visible = FALSE; // Disable update for API request
			else
				$this->PartnerName->setFormValue($val);
		}

		// Check field name 'PartnerID' first before field var 'x_PartnerID'
		$val = $CurrentForm->hasValue("PartnerID") ? $CurrentForm->getValue("PartnerID") : $CurrentForm->getValue("x_PartnerID");
		if (!$this->PartnerID->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->PartnerID->Visible = FALSE; // Disable update for API request
			else
				$this->PartnerID->setFormValue($val);
		}

		// Check field name 'DrID' first before field var 'x_DrID'
		$val = $CurrentForm->hasValue("DrID") ? $CurrentForm->getValue("DrID") : $CurrentForm->getValue("x_DrID");
		if (!$this->DrID->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->DrID->Visible = FALSE; // Disable update for API request
			else
				$this->DrID->setFormValue($val);
		}

		// Check field name 'DrDepartment' first before field var 'x_DrDepartment'
		$val = $CurrentForm->hasValue("DrDepartment") ? $CurrentForm->getValue("DrDepartment") : $CurrentForm->getValue("x_DrDepartment");
		if (!$this->DrDepartment->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->DrDepartment->Visible = FALSE; // Disable update for API request
			else
				$this->DrDepartment->setFormValue($val);
		}

		// Check field name 'Doctor' first before field var 'x_Doctor'
		$val = $CurrentForm->hasValue("Doctor") ? $CurrentForm->getValue("Doctor") : $CurrentForm->getValue("x_Doctor");
		if (!$this->Doctor->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Doctor->Visible = FALSE; // Disable update for API request
			else
				$this->Doctor->setFormValue($val);
		}

		// Check field name 'id' first before field var 'x_id'
		$val = $CurrentForm->hasValue("id") ? $CurrentForm->getValue("id") : $CurrentForm->getValue("x_id");
	}

	// Restore form values
	public function restoreFormValues()
	{
		global $CurrentForm;
		$this->Male->CurrentValue = $this->Male->FormValue;
		$this->Female->CurrentValue = $this->Female->FormValue;
		$this->status->CurrentValue = $this->status->FormValue;
		$this->createdby->CurrentValue = $this->createdby->FormValue;
		$this->createddatetime->CurrentValue = $this->createddatetime->FormValue;
		$this->createddatetime->CurrentValue = UnFormatDateTime($this->createddatetime->CurrentValue, 0);
		$this->HusbandEducation->CurrentValue = $this->HusbandEducation->FormValue;
		$this->WifeEducation->CurrentValue = $this->WifeEducation->FormValue;
		$this->HusbandWorkHours->CurrentValue = $this->HusbandWorkHours->FormValue;
		$this->WifeWorkHours->CurrentValue = $this->WifeWorkHours->FormValue;
		$this->PatientLanguage->CurrentValue = $this->PatientLanguage->FormValue;
		$this->ReferedBy->CurrentValue = $this->ReferedBy->FormValue;
		$this->ReferPhNo->CurrentValue = $this->ReferPhNo->FormValue;
		$this->WifeCell->CurrentValue = $this->WifeCell->FormValue;
		$this->HusbandCell->CurrentValue = $this->HusbandCell->FormValue;
		$this->WifeEmail->CurrentValue = $this->WifeEmail->FormValue;
		$this->HusbandEmail->CurrentValue = $this->HusbandEmail->FormValue;
		$this->ARTCYCLE->CurrentValue = $this->ARTCYCLE->FormValue;
		$this->RESULT->CurrentValue = $this->RESULT->FormValue;
		$this->malepic->CurrentValue = $this->malepic->FormValue;
		$this->femalepic->CurrentValue = $this->femalepic->FormValue;
		$this->Mgendar->CurrentValue = $this->Mgendar->FormValue;
		$this->Fgendar->CurrentValue = $this->Fgendar->FormValue;
		$this->CoupleID->CurrentValue = $this->CoupleID->FormValue;
		$this->HospID->CurrentValue = $this->HospID->FormValue;
		$this->PatientName->CurrentValue = $this->PatientName->FormValue;
		$this->PatientID->CurrentValue = $this->PatientID->FormValue;
		$this->PartnerName->CurrentValue = $this->PartnerName->FormValue;
		$this->PartnerID->CurrentValue = $this->PartnerID->FormValue;
		$this->DrID->CurrentValue = $this->DrID->FormValue;
		$this->DrDepartment->CurrentValue = $this->DrDepartment->FormValue;
		$this->Doctor->CurrentValue = $this->Doctor->FormValue;
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
		$this->Male->setDbValue($row['Male']);
		if (array_key_exists('EV__Male', $rs->fields)) {
			$this->Male->VirtualValue = $rs->fields('EV__Male'); // Set up virtual field value
		} else {
			$this->Male->VirtualValue = ""; // Clear value
		}
		$this->Female->setDbValue($row['Female']);
		if (array_key_exists('EV__Female', $rs->fields)) {
			$this->Female->VirtualValue = $rs->fields('EV__Female'); // Set up virtual field value
		} else {
			$this->Female->VirtualValue = ""; // Clear value
		}
		$this->status->setDbValue($row['status']);
		$this->createdby->setDbValue($row['createdby']);
		$this->createddatetime->setDbValue($row['createddatetime']);
		$this->modifiedby->setDbValue($row['modifiedby']);
		$this->modifieddatetime->setDbValue($row['modifieddatetime']);
		$this->malepropic->Upload->DbValue = $row['malepropic'];
		$this->malepropic->setDbValue($this->malepropic->Upload->DbValue);
		$this->femalepropic->Upload->DbValue = $row['femalepropic'];
		$this->femalepropic->setDbValue($this->femalepropic->Upload->DbValue);
		$this->HusbandEducation->setDbValue($row['HusbandEducation']);
		$this->WifeEducation->setDbValue($row['WifeEducation']);
		$this->HusbandWorkHours->setDbValue($row['HusbandWorkHours']);
		$this->WifeWorkHours->setDbValue($row['WifeWorkHours']);
		$this->PatientLanguage->setDbValue($row['PatientLanguage']);
		$this->ReferedBy->setDbValue($row['ReferedBy']);
		if (array_key_exists('EV__ReferedBy', $rs->fields)) {
			$this->ReferedBy->VirtualValue = $rs->fields('EV__ReferedBy'); // Set up virtual field value
		} else {
			$this->ReferedBy->VirtualValue = ""; // Clear value
		}
		$this->ReferPhNo->setDbValue($row['ReferPhNo']);
		$this->WifeCell->setDbValue($row['WifeCell']);
		$this->HusbandCell->setDbValue($row['HusbandCell']);
		$this->WifeEmail->setDbValue($row['WifeEmail']);
		$this->HusbandEmail->setDbValue($row['HusbandEmail']);
		$this->ARTCYCLE->setDbValue($row['ARTCYCLE']);
		$this->RESULT->setDbValue($row['RESULT']);
		$this->malepic->setDbValue($row['malepic']);
		$this->femalepic->setDbValue($row['femalepic']);
		$this->Mgendar->setDbValue($row['Mgendar']);
		$this->Fgendar->setDbValue($row['Fgendar']);
		$this->CoupleID->setDbValue($row['CoupleID']);
		$this->HospID->setDbValue($row['HospID']);
		$this->PatientName->setDbValue($row['PatientName']);
		$this->PatientID->setDbValue($row['PatientID']);
		$this->PartnerName->setDbValue($row['PartnerName']);
		$this->PartnerID->setDbValue($row['PartnerID']);
		$this->DrID->setDbValue($row['DrID']);
		$this->DrDepartment->setDbValue($row['DrDepartment']);
		$this->Doctor->setDbValue($row['Doctor']);
	}

	// Return a row with default values
	protected function newRow()
	{
		$this->loadDefaultValues();
		$row = [];
		$row['id'] = $this->id->CurrentValue;
		$row['Male'] = $this->Male->CurrentValue;
		$row['Female'] = $this->Female->CurrentValue;
		$row['status'] = $this->status->CurrentValue;
		$row['createdby'] = $this->createdby->CurrentValue;
		$row['createddatetime'] = $this->createddatetime->CurrentValue;
		$row['modifiedby'] = $this->modifiedby->CurrentValue;
		$row['modifieddatetime'] = $this->modifieddatetime->CurrentValue;
		$row['malepropic'] = $this->malepropic->Upload->DbValue;
		$row['femalepropic'] = $this->femalepropic->Upload->DbValue;
		$row['HusbandEducation'] = $this->HusbandEducation->CurrentValue;
		$row['WifeEducation'] = $this->WifeEducation->CurrentValue;
		$row['HusbandWorkHours'] = $this->HusbandWorkHours->CurrentValue;
		$row['WifeWorkHours'] = $this->WifeWorkHours->CurrentValue;
		$row['PatientLanguage'] = $this->PatientLanguage->CurrentValue;
		$row['ReferedBy'] = $this->ReferedBy->CurrentValue;
		$row['ReferPhNo'] = $this->ReferPhNo->CurrentValue;
		$row['WifeCell'] = $this->WifeCell->CurrentValue;
		$row['HusbandCell'] = $this->HusbandCell->CurrentValue;
		$row['WifeEmail'] = $this->WifeEmail->CurrentValue;
		$row['HusbandEmail'] = $this->HusbandEmail->CurrentValue;
		$row['ARTCYCLE'] = $this->ARTCYCLE->CurrentValue;
		$row['RESULT'] = $this->RESULT->CurrentValue;
		$row['malepic'] = $this->malepic->CurrentValue;
		$row['femalepic'] = $this->femalepic->CurrentValue;
		$row['Mgendar'] = $this->Mgendar->CurrentValue;
		$row['Fgendar'] = $this->Fgendar->CurrentValue;
		$row['CoupleID'] = $this->CoupleID->CurrentValue;
		$row['HospID'] = $this->HospID->CurrentValue;
		$row['PatientName'] = $this->PatientName->CurrentValue;
		$row['PatientID'] = $this->PatientID->CurrentValue;
		$row['PartnerName'] = $this->PartnerName->CurrentValue;
		$row['PartnerID'] = $this->PartnerID->CurrentValue;
		$row['DrID'] = $this->DrID->CurrentValue;
		$row['DrDepartment'] = $this->DrDepartment->CurrentValue;
		$row['Doctor'] = $this->Doctor->CurrentValue;
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
		// Male
		// Female
		// status
		// createdby
		// createddatetime
		// modifiedby
		// modifieddatetime
		// malepropic
		// femalepropic
		// HusbandEducation
		// WifeEducation
		// HusbandWorkHours
		// WifeWorkHours
		// PatientLanguage
		// ReferedBy
		// ReferPhNo
		// WifeCell
		// HusbandCell
		// WifeEmail
		// HusbandEmail
		// ARTCYCLE
		// RESULT
		// malepic
		// femalepic
		// Mgendar
		// Fgendar
		// CoupleID
		// HospID
		// PatientName
		// PatientID
		// PartnerName
		// PartnerID
		// DrID
		// DrDepartment
		// Doctor

		if ($this->RowType == ROWTYPE_VIEW) { // View row

			// id
			$this->id->ViewValue = $this->id->CurrentValue;
			$this->id->ViewCustomAttributes = "";

			// Male
			if ($this->Male->VirtualValue <> "") {
				$this->Male->ViewValue = $this->Male->VirtualValue;
			} else {
			$curVal = strval($this->Male->CurrentValue);
			if ($curVal <> "") {
				$this->Male->ViewValue = $this->Male->lookupCacheOption($curVal);
				if ($this->Male->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
					$sqlWrk = $this->Male->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = $rswrk->fields('df');
						$arwrk[2] = $rswrk->fields('df2');
						$arwrk[3] = $rswrk->fields('df3');
						$this->Male->ViewValue = $this->Male->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->Male->ViewValue = $this->Male->CurrentValue;
					}
				}
			} else {
				$this->Male->ViewValue = NULL;
			}
			}
			$this->Male->ViewCustomAttributes = "";

			// Female
			if ($this->Female->VirtualValue <> "") {
				$this->Female->ViewValue = $this->Female->VirtualValue;
			} else {
			$curVal = strval($this->Female->CurrentValue);
			if ($curVal <> "") {
				$this->Female->ViewValue = $this->Female->lookupCacheOption($curVal);
				if ($this->Female->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
					$sqlWrk = $this->Female->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = $rswrk->fields('df');
						$arwrk[2] = $rswrk->fields('df2');
						$arwrk[3] = $rswrk->fields('df3');
						$this->Female->ViewValue = $this->Female->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->Female->ViewValue = $this->Female->CurrentValue;
					}
				}
			} else {
				$this->Female->ViewValue = NULL;
			}
			}
			$this->Female->ViewCustomAttributes = "";

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
			$this->createdby->ViewValue = FormatNumber($this->createdby->ViewValue, 0, -2, -2, -2);
			$this->createdby->ViewCustomAttributes = "";

			// createddatetime
			$this->createddatetime->ViewValue = $this->createddatetime->CurrentValue;
			$this->createddatetime->ViewValue = FormatDateTime($this->createddatetime->ViewValue, 0);
			$this->createddatetime->ViewCustomAttributes = "";

			// malepropic
			if (!EmptyValue($this->malepropic->Upload->DbValue)) {
				$this->malepropic->ImageWidth = 80;
				$this->malepropic->ImageHeight = 80;
				$this->malepropic->ImageAlt = $this->malepropic->alt();
				$this->malepropic->ViewValue = $this->malepropic->Upload->DbValue;
			} else {
				$this->malepropic->ViewValue = "";
			}
			$this->malepropic->ViewCustomAttributes = "";

			// femalepropic
			if (!EmptyValue($this->femalepropic->Upload->DbValue)) {
				$this->femalepropic->ImageWidth = 80;
				$this->femalepropic->ImageHeight = 80;
				$this->femalepropic->ImageAlt = $this->femalepropic->alt();
				$this->femalepropic->ViewValue = $this->femalepropic->Upload->DbValue;
			} else {
				$this->femalepropic->ViewValue = "";
			}
			$this->femalepropic->ViewCustomAttributes = "";

			// HusbandEducation
			$this->HusbandEducation->ViewValue = $this->HusbandEducation->CurrentValue;
			$this->HusbandEducation->ViewCustomAttributes = "";

			// WifeEducation
			$this->WifeEducation->ViewValue = $this->WifeEducation->CurrentValue;
			$this->WifeEducation->ViewCustomAttributes = "";

			// HusbandWorkHours
			$this->HusbandWorkHours->ViewValue = $this->HusbandWorkHours->CurrentValue;
			$this->HusbandWorkHours->ViewCustomAttributes = "";

			// WifeWorkHours
			$this->WifeWorkHours->ViewValue = $this->WifeWorkHours->CurrentValue;
			$this->WifeWorkHours->ViewCustomAttributes = "";

			// PatientLanguage
			$this->PatientLanguage->ViewValue = $this->PatientLanguage->CurrentValue;
			$this->PatientLanguage->ViewCustomAttributes = "";

			// ReferedBy
			if ($this->ReferedBy->VirtualValue <> "") {
				$this->ReferedBy->ViewValue = $this->ReferedBy->VirtualValue;
			} else {
			$curVal = strval($this->ReferedBy->CurrentValue);
			if ($curVal <> "") {
				$this->ReferedBy->ViewValue = $this->ReferedBy->lookupCacheOption($curVal);
				if ($this->ReferedBy->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`reference`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->ReferedBy->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = $rswrk->fields('df');
						$this->ReferedBy->ViewValue = $this->ReferedBy->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->ReferedBy->ViewValue = $this->ReferedBy->CurrentValue;
					}
				}
			} else {
				$this->ReferedBy->ViewValue = NULL;
			}
			}
			$this->ReferedBy->ViewCustomAttributes = "";

			// ReferPhNo
			$this->ReferPhNo->ViewValue = $this->ReferPhNo->CurrentValue;
			$this->ReferPhNo->ViewCustomAttributes = "";

			// WifeCell
			$this->WifeCell->ViewValue = $this->WifeCell->CurrentValue;
			$this->WifeCell->ViewCustomAttributes = "";

			// HusbandCell
			$this->HusbandCell->ViewValue = $this->HusbandCell->CurrentValue;
			$this->HusbandCell->ViewCustomAttributes = "";

			// WifeEmail
			$this->WifeEmail->ViewValue = $this->WifeEmail->CurrentValue;
			$this->WifeEmail->ViewCustomAttributes = "";

			// HusbandEmail
			$this->HusbandEmail->ViewValue = $this->HusbandEmail->CurrentValue;
			$this->HusbandEmail->ViewCustomAttributes = "";

			// ARTCYCLE
			if (strval($this->ARTCYCLE->CurrentValue) <> "") {
				$this->ARTCYCLE->ViewValue = $this->ARTCYCLE->optionCaption($this->ARTCYCLE->CurrentValue);
			} else {
				$this->ARTCYCLE->ViewValue = NULL;
			}
			$this->ARTCYCLE->ViewCustomAttributes = "";

			// RESULT
			if (strval($this->RESULT->CurrentValue) <> "") {
				$this->RESULT->ViewValue = $this->RESULT->optionCaption($this->RESULT->CurrentValue);
			} else {
				$this->RESULT->ViewValue = NULL;
			}
			$this->RESULT->ViewCustomAttributes = "";

			// malepic
			$this->malepic->ViewValue = $this->malepic->CurrentValue;
			$this->malepic->ViewCustomAttributes = "";

			// femalepic
			$this->femalepic->ViewValue = $this->femalepic->CurrentValue;
			$this->femalepic->ViewCustomAttributes = "";

			// Mgendar
			$this->Mgendar->ViewValue = $this->Mgendar->CurrentValue;
			$this->Mgendar->ViewCustomAttributes = "";

			// Fgendar
			$this->Fgendar->ViewValue = $this->Fgendar->CurrentValue;
			$this->Fgendar->ViewCustomAttributes = "";

			// CoupleID
			$this->CoupleID->ViewValue = $this->CoupleID->CurrentValue;
			$this->CoupleID->ViewCustomAttributes = "";

			// HospID
			$this->HospID->ViewValue = $this->HospID->CurrentValue;
			$this->HospID->ViewValue = FormatNumber($this->HospID->ViewValue, 0, -2, -2, -2);
			$this->HospID->ViewCustomAttributes = "";

			// PatientName
			$this->PatientName->ViewValue = $this->PatientName->CurrentValue;
			$this->PatientName->ViewCustomAttributes = "";

			// PatientID
			$this->PatientID->ViewValue = $this->PatientID->CurrentValue;
			$this->PatientID->ViewCustomAttributes = "";

			// PartnerName
			$this->PartnerName->ViewValue = $this->PartnerName->CurrentValue;
			$this->PartnerName->ViewCustomAttributes = "";

			// PartnerID
			$this->PartnerID->ViewValue = $this->PartnerID->CurrentValue;
			$this->PartnerID->ViewCustomAttributes = "";

			// DrID
			$curVal = strval($this->DrID->CurrentValue);
			if ($curVal <> "") {
				$this->DrID->ViewValue = $this->DrID->lookupCacheOption($curVal);
				if ($this->DrID->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
					$sqlWrk = $this->DrID->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = $rswrk->fields('df');
						$arwrk[2] = $rswrk->fields('df2');
						$this->DrID->ViewValue = $this->DrID->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->DrID->ViewValue = $this->DrID->CurrentValue;
					}
				}
			} else {
				$this->DrID->ViewValue = NULL;
			}
			$this->DrID->ViewCustomAttributes = "";

			// DrDepartment
			$this->DrDepartment->ViewValue = $this->DrDepartment->CurrentValue;
			$this->DrDepartment->ViewCustomAttributes = "";

			// Doctor
			$this->Doctor->ViewValue = $this->Doctor->CurrentValue;
			$this->Doctor->ViewCustomAttributes = "";

			// Male
			$this->Male->LinkCustomAttributes = "";
			$this->Male->HrefValue = "";
			$this->Male->TooltipValue = "";

			// Female
			$this->Female->LinkCustomAttributes = "";
			$this->Female->HrefValue = "";
			$this->Female->TooltipValue = "";

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

			// malepropic
			$this->malepropic->LinkCustomAttributes = "";
			if (!EmptyValue($this->malepropic->Upload->DbValue)) {
				$this->malepropic->HrefValue = GetFileUploadUrl($this->malepropic, $this->malepropic->Upload->DbValue); // Add prefix/suffix
				$this->malepropic->LinkAttrs["target"] = ""; // Add target
				if ($this->isExport()) $this->malepropic->HrefValue = FullUrl($this->malepropic->HrefValue, "href");
			} else {
				$this->malepropic->HrefValue = "";
			}
			$this->malepropic->ExportHrefValue = $this->malepropic->UploadPath . $this->malepropic->Upload->DbValue;
			$this->malepropic->TooltipValue = "";
			if ($this->malepropic->UseColorbox) {
				if (EmptyValue($this->malepropic->TooltipValue))
					$this->malepropic->LinkAttrs["title"] = $Language->phrase("ViewImageGallery");
				$this->malepropic->LinkAttrs["data-rel"] = "ivf_x_malepropic";
				AppendClass($this->malepropic->LinkAttrs["class"], "ew-lightbox");
			}

			// femalepropic
			$this->femalepropic->LinkCustomAttributes = "";
			if (!EmptyValue($this->femalepropic->Upload->DbValue)) {
				$this->femalepropic->HrefValue = GetFileUploadUrl($this->femalepropic, $this->femalepropic->Upload->DbValue); // Add prefix/suffix
				$this->femalepropic->LinkAttrs["target"] = ""; // Add target
				if ($this->isExport()) $this->femalepropic->HrefValue = FullUrl($this->femalepropic->HrefValue, "href");
			} else {
				$this->femalepropic->HrefValue = "";
			}
			$this->femalepropic->ExportHrefValue = $this->femalepropic->UploadPath . $this->femalepropic->Upload->DbValue;
			$this->femalepropic->TooltipValue = "";
			if ($this->femalepropic->UseColorbox) {
				if (EmptyValue($this->femalepropic->TooltipValue))
					$this->femalepropic->LinkAttrs["title"] = $Language->phrase("ViewImageGallery");
				$this->femalepropic->LinkAttrs["data-rel"] = "ivf_x_femalepropic";
				AppendClass($this->femalepropic->LinkAttrs["class"], "ew-lightbox");
			}

			// HusbandEducation
			$this->HusbandEducation->LinkCustomAttributes = "";
			$this->HusbandEducation->HrefValue = "";
			$this->HusbandEducation->TooltipValue = "";

			// WifeEducation
			$this->WifeEducation->LinkCustomAttributes = "";
			$this->WifeEducation->HrefValue = "";
			$this->WifeEducation->TooltipValue = "";

			// HusbandWorkHours
			$this->HusbandWorkHours->LinkCustomAttributes = "";
			$this->HusbandWorkHours->HrefValue = "";
			$this->HusbandWorkHours->TooltipValue = "";

			// WifeWorkHours
			$this->WifeWorkHours->LinkCustomAttributes = "";
			$this->WifeWorkHours->HrefValue = "";
			$this->WifeWorkHours->TooltipValue = "";

			// PatientLanguage
			$this->PatientLanguage->LinkCustomAttributes = "";
			$this->PatientLanguage->HrefValue = "";
			$this->PatientLanguage->TooltipValue = "";

			// ReferedBy
			$this->ReferedBy->LinkCustomAttributes = "";
			$this->ReferedBy->HrefValue = "";
			$this->ReferedBy->TooltipValue = "";

			// ReferPhNo
			$this->ReferPhNo->LinkCustomAttributes = "";
			$this->ReferPhNo->HrefValue = "";
			$this->ReferPhNo->TooltipValue = "";

			// WifeCell
			$this->WifeCell->LinkCustomAttributes = "";
			$this->WifeCell->HrefValue = "";
			$this->WifeCell->TooltipValue = "";

			// HusbandCell
			$this->HusbandCell->LinkCustomAttributes = "";
			$this->HusbandCell->HrefValue = "";
			$this->HusbandCell->TooltipValue = "";

			// WifeEmail
			$this->WifeEmail->LinkCustomAttributes = "";
			$this->WifeEmail->HrefValue = "";
			$this->WifeEmail->TooltipValue = "";

			// HusbandEmail
			$this->HusbandEmail->LinkCustomAttributes = "";
			$this->HusbandEmail->HrefValue = "";
			$this->HusbandEmail->TooltipValue = "";

			// ARTCYCLE
			$this->ARTCYCLE->LinkCustomAttributes = "";
			$this->ARTCYCLE->HrefValue = "";
			$this->ARTCYCLE->TooltipValue = "";

			// RESULT
			$this->RESULT->LinkCustomAttributes = "";
			$this->RESULT->HrefValue = "";
			$this->RESULT->TooltipValue = "";

			// malepic
			$this->malepic->LinkCustomAttributes = "";
			$this->malepic->HrefValue = "";
			$this->malepic->TooltipValue = "";

			// femalepic
			$this->femalepic->LinkCustomAttributes = "";
			$this->femalepic->HrefValue = "";
			$this->femalepic->TooltipValue = "";

			// Mgendar
			$this->Mgendar->LinkCustomAttributes = "";
			$this->Mgendar->HrefValue = "";
			$this->Mgendar->TooltipValue = "";

			// Fgendar
			$this->Fgendar->LinkCustomAttributes = "";
			$this->Fgendar->HrefValue = "";
			$this->Fgendar->TooltipValue = "";

			// CoupleID
			$this->CoupleID->LinkCustomAttributes = "";
			$this->CoupleID->HrefValue = "";
			$this->CoupleID->TooltipValue = "";

			// HospID
			$this->HospID->LinkCustomAttributes = "";
			$this->HospID->HrefValue = "";
			$this->HospID->TooltipValue = "";

			// PatientName
			$this->PatientName->LinkCustomAttributes = "";
			$this->PatientName->HrefValue = "";
			$this->PatientName->TooltipValue = "";

			// PatientID
			$this->PatientID->LinkCustomAttributes = "";
			$this->PatientID->HrefValue = "";
			$this->PatientID->TooltipValue = "";

			// PartnerName
			$this->PartnerName->LinkCustomAttributes = "";
			$this->PartnerName->HrefValue = "";
			$this->PartnerName->TooltipValue = "";

			// PartnerID
			$this->PartnerID->LinkCustomAttributes = "";
			$this->PartnerID->HrefValue = "";
			$this->PartnerID->TooltipValue = "";

			// DrID
			$this->DrID->LinkCustomAttributes = "";
			$this->DrID->HrefValue = "";
			$this->DrID->TooltipValue = "";

			// DrDepartment
			$this->DrDepartment->LinkCustomAttributes = "";
			$this->DrDepartment->HrefValue = "";
			$this->DrDepartment->TooltipValue = "";

			// Doctor
			$this->Doctor->LinkCustomAttributes = "";
			$this->Doctor->HrefValue = "";
			$this->Doctor->TooltipValue = "";
		} elseif ($this->RowType == ROWTYPE_ADD) { // Add row

			// Male
			$this->Male->EditCustomAttributes = "";
			$curVal = trim(strval($this->Male->CurrentValue));
			if ($curVal <> "")
				$this->Male->ViewValue = $this->Male->lookupCacheOption($curVal);
			else
				$this->Male->ViewValue = $this->Male->Lookup !== NULL && is_array($this->Male->Lookup->Options) ? $curVal : NULL;
			if ($this->Male->ViewValue !== NULL) { // Load from cache
				$this->Male->EditValue = array_values($this->Male->Lookup->Options);
				if ($this->Male->ViewValue == "")
					$this->Male->ViewValue = $Language->phrase("PleaseSelect");
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`id`" . SearchString("=", $this->Male->CurrentValue, DATATYPE_NUMBER, "");
				}
				$sqlWrk = $this->Male->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = array();
					$arwrk[1] = HtmlEncode($rswrk->fields('df'));
					$arwrk[2] = HtmlEncode($rswrk->fields('df2'));
					$arwrk[3] = HtmlEncode($rswrk->fields('df3'));
					$this->Male->ViewValue = $this->Male->displayValue($arwrk);
				} else {
					$this->Male->ViewValue = $Language->phrase("PleaseSelect");
				}
				$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
				if ($rswrk) $rswrk->Close();
				$this->Male->EditValue = $arwrk;
			}

			// Female
			$this->Female->EditCustomAttributes = "";
			$curVal = trim(strval($this->Female->CurrentValue));
			if ($curVal <> "")
				$this->Female->ViewValue = $this->Female->lookupCacheOption($curVal);
			else
				$this->Female->ViewValue = $this->Female->Lookup !== NULL && is_array($this->Female->Lookup->Options) ? $curVal : NULL;
			if ($this->Female->ViewValue !== NULL) { // Load from cache
				$this->Female->EditValue = array_values($this->Female->Lookup->Options);
				if ($this->Female->ViewValue == "")
					$this->Female->ViewValue = $Language->phrase("PleaseSelect");
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`id`" . SearchString("=", $this->Female->CurrentValue, DATATYPE_NUMBER, "");
				}
				$sqlWrk = $this->Female->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = array();
					$arwrk[1] = HtmlEncode($rswrk->fields('df'));
					$arwrk[2] = HtmlEncode($rswrk->fields('df2'));
					$arwrk[3] = HtmlEncode($rswrk->fields('df3'));
					$this->Female->ViewValue = $this->Female->displayValue($arwrk);
				} else {
					$this->Female->ViewValue = $Language->phrase("PleaseSelect");
				}
				$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
				if ($rswrk) $rswrk->Close();
				$this->Female->EditValue = $arwrk;
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

			// createdby
			// createddatetime
			// malepropic

			$this->malepropic->EditAttrs["class"] = "form-control";
			$this->malepropic->EditCustomAttributes = "";
			if (!EmptyValue($this->malepropic->Upload->DbValue)) {
				$this->malepropic->ImageWidth = 80;
				$this->malepropic->ImageHeight = 80;
				$this->malepropic->ImageAlt = $this->malepropic->alt();
				$this->malepropic->EditValue = $this->malepropic->Upload->DbValue;
			} else {
				$this->malepropic->EditValue = "";
			}
			if (!EmptyValue($this->malepropic->CurrentValue))
					$this->malepropic->Upload->FileName = $this->malepropic->CurrentValue;
			if (($this->isShow() || $this->isCopy()) && !$this->EventCancelled)
				RenderUploadField($this->malepropic);

			// femalepropic
			$this->femalepropic->EditAttrs["class"] = "form-control";
			$this->femalepropic->EditCustomAttributes = "";
			if (!EmptyValue($this->femalepropic->Upload->DbValue)) {
				$this->femalepropic->ImageWidth = 80;
				$this->femalepropic->ImageHeight = 80;
				$this->femalepropic->ImageAlt = $this->femalepropic->alt();
				$this->femalepropic->EditValue = $this->femalepropic->Upload->DbValue;
			} else {
				$this->femalepropic->EditValue = "";
			}
			if (!EmptyValue($this->femalepropic->CurrentValue))
					$this->femalepropic->Upload->FileName = $this->femalepropic->CurrentValue;
			if (($this->isShow() || $this->isCopy()) && !$this->EventCancelled)
				RenderUploadField($this->femalepropic);

			// HusbandEducation
			$this->HusbandEducation->EditAttrs["class"] = "form-control";
			$this->HusbandEducation->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->HusbandEducation->CurrentValue = HtmlDecode($this->HusbandEducation->CurrentValue);
			$this->HusbandEducation->EditValue = HtmlEncode($this->HusbandEducation->CurrentValue);
			$this->HusbandEducation->PlaceHolder = RemoveHtml($this->HusbandEducation->caption());

			// WifeEducation
			$this->WifeEducation->EditAttrs["class"] = "form-control";
			$this->WifeEducation->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->WifeEducation->CurrentValue = HtmlDecode($this->WifeEducation->CurrentValue);
			$this->WifeEducation->EditValue = HtmlEncode($this->WifeEducation->CurrentValue);
			$this->WifeEducation->PlaceHolder = RemoveHtml($this->WifeEducation->caption());

			// HusbandWorkHours
			$this->HusbandWorkHours->EditAttrs["class"] = "form-control";
			$this->HusbandWorkHours->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->HusbandWorkHours->CurrentValue = HtmlDecode($this->HusbandWorkHours->CurrentValue);
			$this->HusbandWorkHours->EditValue = HtmlEncode($this->HusbandWorkHours->CurrentValue);
			$this->HusbandWorkHours->PlaceHolder = RemoveHtml($this->HusbandWorkHours->caption());

			// WifeWorkHours
			$this->WifeWorkHours->EditAttrs["class"] = "form-control";
			$this->WifeWorkHours->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->WifeWorkHours->CurrentValue = HtmlDecode($this->WifeWorkHours->CurrentValue);
			$this->WifeWorkHours->EditValue = HtmlEncode($this->WifeWorkHours->CurrentValue);
			$this->WifeWorkHours->PlaceHolder = RemoveHtml($this->WifeWorkHours->caption());

			// PatientLanguage
			$this->PatientLanguage->EditAttrs["class"] = "form-control";
			$this->PatientLanguage->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->PatientLanguage->CurrentValue = HtmlDecode($this->PatientLanguage->CurrentValue);
			$this->PatientLanguage->EditValue = HtmlEncode($this->PatientLanguage->CurrentValue);
			$this->PatientLanguage->PlaceHolder = RemoveHtml($this->PatientLanguage->caption());

			// ReferedBy
			$this->ReferedBy->EditCustomAttributes = "";
			$curVal = trim(strval($this->ReferedBy->CurrentValue));
			if ($curVal <> "")
				$this->ReferedBy->ViewValue = $this->ReferedBy->lookupCacheOption($curVal);
			else
				$this->ReferedBy->ViewValue = $this->ReferedBy->Lookup !== NULL && is_array($this->ReferedBy->Lookup->Options) ? $curVal : NULL;
			if ($this->ReferedBy->ViewValue !== NULL) { // Load from cache
				$this->ReferedBy->EditValue = array_values($this->ReferedBy->Lookup->Options);
				if ($this->ReferedBy->ViewValue == "")
					$this->ReferedBy->ViewValue = $Language->phrase("PleaseSelect");
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`reference`" . SearchString("=", $this->ReferedBy->CurrentValue, DATATYPE_STRING, "");
				}
				$sqlWrk = $this->ReferedBy->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = array();
					$arwrk[1] = HtmlEncode($rswrk->fields('df'));
					$this->ReferedBy->ViewValue = $this->ReferedBy->displayValue($arwrk);
				} else {
					$this->ReferedBy->ViewValue = $Language->phrase("PleaseSelect");
				}
				$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
				if ($rswrk) $rswrk->Close();
				$this->ReferedBy->EditValue = $arwrk;
			}

			// ReferPhNo
			$this->ReferPhNo->EditAttrs["class"] = "form-control";
			$this->ReferPhNo->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->ReferPhNo->CurrentValue = HtmlDecode($this->ReferPhNo->CurrentValue);
			$this->ReferPhNo->EditValue = HtmlEncode($this->ReferPhNo->CurrentValue);
			$this->ReferPhNo->PlaceHolder = RemoveHtml($this->ReferPhNo->caption());

			// WifeCell
			$this->WifeCell->EditAttrs["class"] = "form-control";
			$this->WifeCell->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->WifeCell->CurrentValue = HtmlDecode($this->WifeCell->CurrentValue);
			$this->WifeCell->EditValue = HtmlEncode($this->WifeCell->CurrentValue);
			$this->WifeCell->PlaceHolder = RemoveHtml($this->WifeCell->caption());

			// HusbandCell
			$this->HusbandCell->EditAttrs["class"] = "form-control";
			$this->HusbandCell->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->HusbandCell->CurrentValue = HtmlDecode($this->HusbandCell->CurrentValue);
			$this->HusbandCell->EditValue = HtmlEncode($this->HusbandCell->CurrentValue);
			$this->HusbandCell->PlaceHolder = RemoveHtml($this->HusbandCell->caption());

			// WifeEmail
			$this->WifeEmail->EditAttrs["class"] = "form-control";
			$this->WifeEmail->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->WifeEmail->CurrentValue = HtmlDecode($this->WifeEmail->CurrentValue);
			$this->WifeEmail->EditValue = HtmlEncode($this->WifeEmail->CurrentValue);
			$this->WifeEmail->PlaceHolder = RemoveHtml($this->WifeEmail->caption());

			// HusbandEmail
			$this->HusbandEmail->EditAttrs["class"] = "form-control";
			$this->HusbandEmail->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->HusbandEmail->CurrentValue = HtmlDecode($this->HusbandEmail->CurrentValue);
			$this->HusbandEmail->EditValue = HtmlEncode($this->HusbandEmail->CurrentValue);
			$this->HusbandEmail->PlaceHolder = RemoveHtml($this->HusbandEmail->caption());

			// ARTCYCLE
			$this->ARTCYCLE->EditAttrs["class"] = "form-control";
			$this->ARTCYCLE->EditCustomAttributes = "";
			$this->ARTCYCLE->EditValue = $this->ARTCYCLE->options(TRUE);

			// RESULT
			$this->RESULT->EditAttrs["class"] = "form-control";
			$this->RESULT->EditCustomAttributes = "";
			$this->RESULT->EditValue = $this->RESULT->options(TRUE);

			// malepic
			$this->malepic->EditAttrs["class"] = "form-control";
			$this->malepic->EditCustomAttributes = "";
			$this->malepic->EditValue = HtmlEncode($this->malepic->CurrentValue);
			$this->malepic->PlaceHolder = RemoveHtml($this->malepic->caption());

			// femalepic
			$this->femalepic->EditAttrs["class"] = "form-control";
			$this->femalepic->EditCustomAttributes = "";
			$this->femalepic->EditValue = HtmlEncode($this->femalepic->CurrentValue);
			$this->femalepic->PlaceHolder = RemoveHtml($this->femalepic->caption());

			// Mgendar
			$this->Mgendar->EditAttrs["class"] = "form-control";
			$this->Mgendar->EditCustomAttributes = "";
			$this->Mgendar->EditValue = HtmlEncode($this->Mgendar->CurrentValue);
			$this->Mgendar->PlaceHolder = RemoveHtml($this->Mgendar->caption());

			// Fgendar
			$this->Fgendar->EditAttrs["class"] = "form-control";
			$this->Fgendar->EditCustomAttributes = "";
			$this->Fgendar->EditValue = HtmlEncode($this->Fgendar->CurrentValue);
			$this->Fgendar->PlaceHolder = RemoveHtml($this->Fgendar->caption());

			// CoupleID
			$this->CoupleID->EditAttrs["class"] = "form-control";
			$this->CoupleID->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->CoupleID->CurrentValue = HtmlDecode($this->CoupleID->CurrentValue);
			$this->CoupleID->EditValue = HtmlEncode($this->CoupleID->CurrentValue);
			$this->CoupleID->PlaceHolder = RemoveHtml($this->CoupleID->caption());

			// HospID
			// PatientName

			$this->PatientName->EditAttrs["class"] = "form-control";
			$this->PatientName->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->PatientName->CurrentValue = HtmlDecode($this->PatientName->CurrentValue);
			$this->PatientName->EditValue = HtmlEncode($this->PatientName->CurrentValue);
			$this->PatientName->PlaceHolder = RemoveHtml($this->PatientName->caption());

			// PatientID
			$this->PatientID->EditAttrs["class"] = "form-control";
			$this->PatientID->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->PatientID->CurrentValue = HtmlDecode($this->PatientID->CurrentValue);
			$this->PatientID->EditValue = HtmlEncode($this->PatientID->CurrentValue);
			$this->PatientID->PlaceHolder = RemoveHtml($this->PatientID->caption());

			// PartnerName
			$this->PartnerName->EditAttrs["class"] = "form-control";
			$this->PartnerName->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->PartnerName->CurrentValue = HtmlDecode($this->PartnerName->CurrentValue);
			$this->PartnerName->EditValue = HtmlEncode($this->PartnerName->CurrentValue);
			$this->PartnerName->PlaceHolder = RemoveHtml($this->PartnerName->caption());

			// PartnerID
			$this->PartnerID->EditAttrs["class"] = "form-control";
			$this->PartnerID->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->PartnerID->CurrentValue = HtmlDecode($this->PartnerID->CurrentValue);
			$this->PartnerID->EditValue = HtmlEncode($this->PartnerID->CurrentValue);
			$this->PartnerID->PlaceHolder = RemoveHtml($this->PartnerID->caption());

			// DrID
			$this->DrID->EditCustomAttributes = "";
			$curVal = trim(strval($this->DrID->CurrentValue));
			if ($curVal <> "")
				$this->DrID->ViewValue = $this->DrID->lookupCacheOption($curVal);
			else
				$this->DrID->ViewValue = $this->DrID->Lookup !== NULL && is_array($this->DrID->Lookup->Options) ? $curVal : NULL;
			if ($this->DrID->ViewValue !== NULL) { // Load from cache
				$this->DrID->EditValue = array_values($this->DrID->Lookup->Options);
				if ($this->DrID->ViewValue == "")
					$this->DrID->ViewValue = $Language->phrase("PleaseSelect");
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`id`" . SearchString("=", $this->DrID->CurrentValue, DATATYPE_NUMBER, "");
				}
				$sqlWrk = $this->DrID->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = array();
					$arwrk[1] = HtmlEncode($rswrk->fields('df'));
					$arwrk[2] = HtmlEncode($rswrk->fields('df2'));
					$this->DrID->ViewValue = $this->DrID->displayValue($arwrk);
				} else {
					$this->DrID->ViewValue = $Language->phrase("PleaseSelect");
				}
				$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
				if ($rswrk) $rswrk->Close();
				$this->DrID->EditValue = $arwrk;
			}

			// DrDepartment
			$this->DrDepartment->EditAttrs["class"] = "form-control";
			$this->DrDepartment->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->DrDepartment->CurrentValue = HtmlDecode($this->DrDepartment->CurrentValue);
			$this->DrDepartment->EditValue = HtmlEncode($this->DrDepartment->CurrentValue);
			$this->DrDepartment->PlaceHolder = RemoveHtml($this->DrDepartment->caption());

			// Doctor
			$this->Doctor->EditAttrs["class"] = "form-control";
			$this->Doctor->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Doctor->CurrentValue = HtmlDecode($this->Doctor->CurrentValue);
			$this->Doctor->EditValue = HtmlEncode($this->Doctor->CurrentValue);
			$this->Doctor->PlaceHolder = RemoveHtml($this->Doctor->caption());

			// Add refer script
			// Male

			$this->Male->LinkCustomAttributes = "";
			$this->Male->HrefValue = "";

			// Female
			$this->Female->LinkCustomAttributes = "";
			$this->Female->HrefValue = "";

			// status
			$this->status->LinkCustomAttributes = "";
			$this->status->HrefValue = "";

			// createdby
			$this->createdby->LinkCustomAttributes = "";
			$this->createdby->HrefValue = "";

			// createddatetime
			$this->createddatetime->LinkCustomAttributes = "";
			$this->createddatetime->HrefValue = "";

			// malepropic
			$this->malepropic->LinkCustomAttributes = "";
			if (!EmptyValue($this->malepropic->Upload->DbValue)) {
				$this->malepropic->HrefValue = GetFileUploadUrl($this->malepropic, $this->malepropic->Upload->DbValue); // Add prefix/suffix
				$this->malepropic->LinkAttrs["target"] = ""; // Add target
				if ($this->isExport()) $this->malepropic->HrefValue = FullUrl($this->malepropic->HrefValue, "href");
			} else {
				$this->malepropic->HrefValue = "";
			}
			$this->malepropic->ExportHrefValue = $this->malepropic->UploadPath . $this->malepropic->Upload->DbValue;

			// femalepropic
			$this->femalepropic->LinkCustomAttributes = "";
			if (!EmptyValue($this->femalepropic->Upload->DbValue)) {
				$this->femalepropic->HrefValue = GetFileUploadUrl($this->femalepropic, $this->femalepropic->Upload->DbValue); // Add prefix/suffix
				$this->femalepropic->LinkAttrs["target"] = ""; // Add target
				if ($this->isExport()) $this->femalepropic->HrefValue = FullUrl($this->femalepropic->HrefValue, "href");
			} else {
				$this->femalepropic->HrefValue = "";
			}
			$this->femalepropic->ExportHrefValue = $this->femalepropic->UploadPath . $this->femalepropic->Upload->DbValue;

			// HusbandEducation
			$this->HusbandEducation->LinkCustomAttributes = "";
			$this->HusbandEducation->HrefValue = "";

			// WifeEducation
			$this->WifeEducation->LinkCustomAttributes = "";
			$this->WifeEducation->HrefValue = "";

			// HusbandWorkHours
			$this->HusbandWorkHours->LinkCustomAttributes = "";
			$this->HusbandWorkHours->HrefValue = "";

			// WifeWorkHours
			$this->WifeWorkHours->LinkCustomAttributes = "";
			$this->WifeWorkHours->HrefValue = "";

			// PatientLanguage
			$this->PatientLanguage->LinkCustomAttributes = "";
			$this->PatientLanguage->HrefValue = "";

			// ReferedBy
			$this->ReferedBy->LinkCustomAttributes = "";
			$this->ReferedBy->HrefValue = "";

			// ReferPhNo
			$this->ReferPhNo->LinkCustomAttributes = "";
			$this->ReferPhNo->HrefValue = "";

			// WifeCell
			$this->WifeCell->LinkCustomAttributes = "";
			$this->WifeCell->HrefValue = "";

			// HusbandCell
			$this->HusbandCell->LinkCustomAttributes = "";
			$this->HusbandCell->HrefValue = "";

			// WifeEmail
			$this->WifeEmail->LinkCustomAttributes = "";
			$this->WifeEmail->HrefValue = "";

			// HusbandEmail
			$this->HusbandEmail->LinkCustomAttributes = "";
			$this->HusbandEmail->HrefValue = "";

			// ARTCYCLE
			$this->ARTCYCLE->LinkCustomAttributes = "";
			$this->ARTCYCLE->HrefValue = "";

			// RESULT
			$this->RESULT->LinkCustomAttributes = "";
			$this->RESULT->HrefValue = "";

			// malepic
			$this->malepic->LinkCustomAttributes = "";
			$this->malepic->HrefValue = "";

			// femalepic
			$this->femalepic->LinkCustomAttributes = "";
			$this->femalepic->HrefValue = "";

			// Mgendar
			$this->Mgendar->LinkCustomAttributes = "";
			$this->Mgendar->HrefValue = "";

			// Fgendar
			$this->Fgendar->LinkCustomAttributes = "";
			$this->Fgendar->HrefValue = "";

			// CoupleID
			$this->CoupleID->LinkCustomAttributes = "";
			$this->CoupleID->HrefValue = "";

			// HospID
			$this->HospID->LinkCustomAttributes = "";
			$this->HospID->HrefValue = "";

			// PatientName
			$this->PatientName->LinkCustomAttributes = "";
			$this->PatientName->HrefValue = "";

			// PatientID
			$this->PatientID->LinkCustomAttributes = "";
			$this->PatientID->HrefValue = "";

			// PartnerName
			$this->PartnerName->LinkCustomAttributes = "";
			$this->PartnerName->HrefValue = "";

			// PartnerID
			$this->PartnerID->LinkCustomAttributes = "";
			$this->PartnerID->HrefValue = "";

			// DrID
			$this->DrID->LinkCustomAttributes = "";
			$this->DrID->HrefValue = "";

			// DrDepartment
			$this->DrDepartment->LinkCustomAttributes = "";
			$this->DrDepartment->HrefValue = "";

			// Doctor
			$this->Doctor->LinkCustomAttributes = "";
			$this->Doctor->HrefValue = "";
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
		if ($this->Male->Required) {
			if (!$this->Male->IsDetailKey && $this->Male->FormValue != NULL && $this->Male->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Male->caption(), $this->Male->RequiredErrorMessage));
			}
		}
		if ($this->Female->Required) {
			if (!$this->Female->IsDetailKey && $this->Female->FormValue != NULL && $this->Female->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Female->caption(), $this->Female->RequiredErrorMessage));
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
		if ($this->malepropic->Required) {
			if ($this->malepropic->Upload->FileName == "" && !$this->malepropic->Upload->KeepFile) {
				AddMessage($FormError, str_replace("%s", $this->malepropic->caption(), $this->malepropic->RequiredErrorMessage));
			}
		}
		if ($this->femalepropic->Required) {
			if ($this->femalepropic->Upload->FileName == "" && !$this->femalepropic->Upload->KeepFile) {
				AddMessage($FormError, str_replace("%s", $this->femalepropic->caption(), $this->femalepropic->RequiredErrorMessage));
			}
		}
		if ($this->HusbandEducation->Required) {
			if (!$this->HusbandEducation->IsDetailKey && $this->HusbandEducation->FormValue != NULL && $this->HusbandEducation->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->HusbandEducation->caption(), $this->HusbandEducation->RequiredErrorMessage));
			}
		}
		if ($this->WifeEducation->Required) {
			if (!$this->WifeEducation->IsDetailKey && $this->WifeEducation->FormValue != NULL && $this->WifeEducation->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->WifeEducation->caption(), $this->WifeEducation->RequiredErrorMessage));
			}
		}
		if ($this->HusbandWorkHours->Required) {
			if (!$this->HusbandWorkHours->IsDetailKey && $this->HusbandWorkHours->FormValue != NULL && $this->HusbandWorkHours->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->HusbandWorkHours->caption(), $this->HusbandWorkHours->RequiredErrorMessage));
			}
		}
		if ($this->WifeWorkHours->Required) {
			if (!$this->WifeWorkHours->IsDetailKey && $this->WifeWorkHours->FormValue != NULL && $this->WifeWorkHours->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->WifeWorkHours->caption(), $this->WifeWorkHours->RequiredErrorMessage));
			}
		}
		if ($this->PatientLanguage->Required) {
			if (!$this->PatientLanguage->IsDetailKey && $this->PatientLanguage->FormValue != NULL && $this->PatientLanguage->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PatientLanguage->caption(), $this->PatientLanguage->RequiredErrorMessage));
			}
		}
		if ($this->ReferedBy->Required) {
			if (!$this->ReferedBy->IsDetailKey && $this->ReferedBy->FormValue != NULL && $this->ReferedBy->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->ReferedBy->caption(), $this->ReferedBy->RequiredErrorMessage));
			}
		}
		if ($this->ReferPhNo->Required) {
			if (!$this->ReferPhNo->IsDetailKey && $this->ReferPhNo->FormValue != NULL && $this->ReferPhNo->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->ReferPhNo->caption(), $this->ReferPhNo->RequiredErrorMessage));
			}
		}
		if ($this->WifeCell->Required) {
			if (!$this->WifeCell->IsDetailKey && $this->WifeCell->FormValue != NULL && $this->WifeCell->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->WifeCell->caption(), $this->WifeCell->RequiredErrorMessage));
			}
		}
		if ($this->HusbandCell->Required) {
			if (!$this->HusbandCell->IsDetailKey && $this->HusbandCell->FormValue != NULL && $this->HusbandCell->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->HusbandCell->caption(), $this->HusbandCell->RequiredErrorMessage));
			}
		}
		if ($this->WifeEmail->Required) {
			if (!$this->WifeEmail->IsDetailKey && $this->WifeEmail->FormValue != NULL && $this->WifeEmail->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->WifeEmail->caption(), $this->WifeEmail->RequiredErrorMessage));
			}
		}
		if ($this->HusbandEmail->Required) {
			if (!$this->HusbandEmail->IsDetailKey && $this->HusbandEmail->FormValue != NULL && $this->HusbandEmail->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->HusbandEmail->caption(), $this->HusbandEmail->RequiredErrorMessage));
			}
		}
		if ($this->ARTCYCLE->Required) {
			if (!$this->ARTCYCLE->IsDetailKey && $this->ARTCYCLE->FormValue != NULL && $this->ARTCYCLE->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->ARTCYCLE->caption(), $this->ARTCYCLE->RequiredErrorMessage));
			}
		}
		if ($this->RESULT->Required) {
			if (!$this->RESULT->IsDetailKey && $this->RESULT->FormValue != NULL && $this->RESULT->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->RESULT->caption(), $this->RESULT->RequiredErrorMessage));
			}
		}
		if ($this->malepic->Required) {
			if (!$this->malepic->IsDetailKey && $this->malepic->FormValue != NULL && $this->malepic->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->malepic->caption(), $this->malepic->RequiredErrorMessage));
			}
		}
		if ($this->femalepic->Required) {
			if (!$this->femalepic->IsDetailKey && $this->femalepic->FormValue != NULL && $this->femalepic->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->femalepic->caption(), $this->femalepic->RequiredErrorMessage));
			}
		}
		if ($this->Mgendar->Required) {
			if (!$this->Mgendar->IsDetailKey && $this->Mgendar->FormValue != NULL && $this->Mgendar->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Mgendar->caption(), $this->Mgendar->RequiredErrorMessage));
			}
		}
		if ($this->Fgendar->Required) {
			if (!$this->Fgendar->IsDetailKey && $this->Fgendar->FormValue != NULL && $this->Fgendar->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Fgendar->caption(), $this->Fgendar->RequiredErrorMessage));
			}
		}
		if ($this->CoupleID->Required) {
			if (!$this->CoupleID->IsDetailKey && $this->CoupleID->FormValue != NULL && $this->CoupleID->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->CoupleID->caption(), $this->CoupleID->RequiredErrorMessage));
			}
		}
		if ($this->HospID->Required) {
			if (!$this->HospID->IsDetailKey && $this->HospID->FormValue != NULL && $this->HospID->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->HospID->caption(), $this->HospID->RequiredErrorMessage));
			}
		}
		if ($this->PatientName->Required) {
			if (!$this->PatientName->IsDetailKey && $this->PatientName->FormValue != NULL && $this->PatientName->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PatientName->caption(), $this->PatientName->RequiredErrorMessage));
			}
		}
		if ($this->PatientID->Required) {
			if (!$this->PatientID->IsDetailKey && $this->PatientID->FormValue != NULL && $this->PatientID->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PatientID->caption(), $this->PatientID->RequiredErrorMessage));
			}
		}
		if ($this->PartnerName->Required) {
			if (!$this->PartnerName->IsDetailKey && $this->PartnerName->FormValue != NULL && $this->PartnerName->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PartnerName->caption(), $this->PartnerName->RequiredErrorMessage));
			}
		}
		if ($this->PartnerID->Required) {
			if (!$this->PartnerID->IsDetailKey && $this->PartnerID->FormValue != NULL && $this->PartnerID->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PartnerID->caption(), $this->PartnerID->RequiredErrorMessage));
			}
		}
		if ($this->DrID->Required) {
			if (!$this->DrID->IsDetailKey && $this->DrID->FormValue != NULL && $this->DrID->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->DrID->caption(), $this->DrID->RequiredErrorMessage));
			}
		}
		if ($this->DrDepartment->Required) {
			if (!$this->DrDepartment->IsDetailKey && $this->DrDepartment->FormValue != NULL && $this->DrDepartment->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->DrDepartment->caption(), $this->DrDepartment->RequiredErrorMessage));
			}
		}
		if ($this->Doctor->Required) {
			if (!$this->Doctor->IsDetailKey && $this->Doctor->FormValue != NULL && $this->Doctor->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Doctor->caption(), $this->Doctor->RequiredErrorMessage));
			}
		}

		// Validate detail grid
		$detailTblVar = explode(",", $this->getCurrentDetailTable());
		if (in_array("ivf_treatment_plan", $detailTblVar) && $GLOBALS["ivf_treatment_plan"]->DetailAdd) {
			if (!isset($GLOBALS["ivf_treatment_plan_grid"]))
				$GLOBALS["ivf_treatment_plan_grid"] = new ivf_treatment_plan_grid(); // Get detail page object
			$GLOBALS["ivf_treatment_plan_grid"]->validateGridForm();
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
		if ($this->Female->CurrentValue <> "") { // Check field with unique index
			$filter = "(Female = " . AdjustSql($this->Female->CurrentValue, $this->Dbid) . ")";
			$rsChk = $this->loadRs($filter);
			if ($rsChk && !$rsChk->EOF) {
				$idxErrMsg = str_replace("%f", $this->Female->caption(), $Language->phrase("DupIndex"));
				$idxErrMsg = str_replace("%v", $this->Female->CurrentValue, $idxErrMsg);
				$this->setFailureMessage($idxErrMsg);
				$rsChk->close();
				return FALSE;
			}
		}
		$conn = &$this->getConnection();

		// Begin transaction
		if ($this->getCurrentDetailTable() <> "")
			$conn->beginTrans();

		// Load db values from rsold
		$this->loadDbValues($rsold);
		if ($rsold) {
		}
		$rsnew = [];

		// Male
		$this->Male->setDbValueDef($rsnew, $this->Male->CurrentValue, 0, FALSE);

		// Female
		$this->Female->setDbValueDef($rsnew, $this->Female->CurrentValue, 0, FALSE);

		// status
		$this->status->setDbValueDef($rsnew, $this->status->CurrentValue, NULL, FALSE);

		// createdby
		$this->createdby->setDbValueDef($rsnew, CurrentUserID(), NULL);
		$rsnew['createdby'] = &$this->createdby->DbValue;

		// createddatetime
		$this->createddatetime->setDbValueDef($rsnew, CurrentDate(), NULL);
		$rsnew['createddatetime'] = &$this->createddatetime->DbValue;

		// malepropic
		if ($this->malepropic->Visible && !$this->malepropic->Upload->KeepFile) {
			$this->malepropic->Upload->DbValue = ""; // No need to delete old file
			if ($this->malepropic->Upload->FileName == "") {
				$rsnew['malepropic'] = NULL;
			} else {
				$rsnew['malepropic'] = $this->malepropic->Upload->FileName;
			}
		}

		// femalepropic
		if ($this->femalepropic->Visible && !$this->femalepropic->Upload->KeepFile) {
			$this->femalepropic->Upload->DbValue = ""; // No need to delete old file
			if ($this->femalepropic->Upload->FileName == "") {
				$rsnew['femalepropic'] = NULL;
			} else {
				$rsnew['femalepropic'] = $this->femalepropic->Upload->FileName;
			}
		}

		// HusbandEducation
		$this->HusbandEducation->setDbValueDef($rsnew, $this->HusbandEducation->CurrentValue, NULL, FALSE);

		// WifeEducation
		$this->WifeEducation->setDbValueDef($rsnew, $this->WifeEducation->CurrentValue, NULL, FALSE);

		// HusbandWorkHours
		$this->HusbandWorkHours->setDbValueDef($rsnew, $this->HusbandWorkHours->CurrentValue, NULL, FALSE);

		// WifeWorkHours
		$this->WifeWorkHours->setDbValueDef($rsnew, $this->WifeWorkHours->CurrentValue, NULL, FALSE);

		// PatientLanguage
		$this->PatientLanguage->setDbValueDef($rsnew, $this->PatientLanguage->CurrentValue, NULL, FALSE);

		// ReferedBy
		$this->ReferedBy->setDbValueDef($rsnew, $this->ReferedBy->CurrentValue, NULL, FALSE);

		// ReferPhNo
		$this->ReferPhNo->setDbValueDef($rsnew, $this->ReferPhNo->CurrentValue, NULL, FALSE);

		// WifeCell
		$this->WifeCell->setDbValueDef($rsnew, $this->WifeCell->CurrentValue, NULL, FALSE);

		// HusbandCell
		$this->HusbandCell->setDbValueDef($rsnew, $this->HusbandCell->CurrentValue, NULL, FALSE);

		// WifeEmail
		$this->WifeEmail->setDbValueDef($rsnew, $this->WifeEmail->CurrentValue, NULL, FALSE);

		// HusbandEmail
		$this->HusbandEmail->setDbValueDef($rsnew, $this->HusbandEmail->CurrentValue, NULL, FALSE);

		// ARTCYCLE
		$this->ARTCYCLE->setDbValueDef($rsnew, $this->ARTCYCLE->CurrentValue, NULL, FALSE);

		// RESULT
		$this->RESULT->setDbValueDef($rsnew, $this->RESULT->CurrentValue, NULL, FALSE);

		// malepic
		$this->malepic->setDbValueDef($rsnew, $this->malepic->CurrentValue, "", FALSE);

		// femalepic
		$this->femalepic->setDbValueDef($rsnew, $this->femalepic->CurrentValue, "", FALSE);

		// Mgendar
		$this->Mgendar->setDbValueDef($rsnew, $this->Mgendar->CurrentValue, "", FALSE);

		// Fgendar
		$this->Fgendar->setDbValueDef($rsnew, $this->Fgendar->CurrentValue, "", FALSE);

		// CoupleID
		$this->CoupleID->setDbValueDef($rsnew, $this->CoupleID->CurrentValue, NULL, FALSE);

		// HospID
		$this->HospID->setDbValueDef($rsnew, HospitalID(), NULL);
		$rsnew['HospID'] = &$this->HospID->DbValue;

		// PatientName
		$this->PatientName->setDbValueDef($rsnew, $this->PatientName->CurrentValue, NULL, FALSE);

		// PatientID
		$this->PatientID->setDbValueDef($rsnew, $this->PatientID->CurrentValue, NULL, FALSE);

		// PartnerName
		$this->PartnerName->setDbValueDef($rsnew, $this->PartnerName->CurrentValue, NULL, FALSE);

		// PartnerID
		$this->PartnerID->setDbValueDef($rsnew, $this->PartnerID->CurrentValue, NULL, FALSE);

		// DrID
		$this->DrID->setDbValueDef($rsnew, $this->DrID->CurrentValue, NULL, FALSE);

		// DrDepartment
		$this->DrDepartment->setDbValueDef($rsnew, $this->DrDepartment->CurrentValue, NULL, FALSE);

		// Doctor
		$this->Doctor->setDbValueDef($rsnew, $this->Doctor->CurrentValue, NULL, FALSE);
		if ($this->malepropic->Visible && !$this->malepropic->Upload->KeepFile) {
			$oldFiles = EmptyValue($this->malepropic->Upload->DbValue) ? array() : array($this->malepropic->Upload->DbValue);
			if (!EmptyValue($this->malepropic->Upload->FileName)) {
				$newFiles = array($this->malepropic->Upload->FileName);
				$NewFileCount = count($newFiles);
				for ($i = 0; $i < $NewFileCount; $i++) {
					if ($newFiles[$i] <> "") {
						$file = $newFiles[$i];
						if (file_exists(UploadTempPath($this->malepropic, $this->malepropic->Upload->Index) . $file)) {
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
							$file1 = UniqueFilename($this->malepropic->physicalUploadPath(), $file); // Get new file name
							if ($file1 <> $file) { // Rename temp file
								while (file_exists(UploadTempPath($this->malepropic, $this->malepropic->Upload->Index) . $file1) || file_exists($this->malepropic->physicalUploadPath() . $file1)) // Make sure no file name clash
									$file1 = UniqueFilename($this->malepropic->physicalUploadPath(), $file1, TRUE); // Use indexed name
								rename(UploadTempPath($this->malepropic, $this->malepropic->Upload->Index) . $file, UploadTempPath($this->malepropic, $this->malepropic->Upload->Index) . $file1);
								$newFiles[$i] = $file1;
							}
						}
					}
				}
				$this->malepropic->Upload->DbValue = empty($oldFiles) ? "" : implode(MULTIPLE_UPLOAD_SEPARATOR, $oldFiles);
				$this->malepropic->Upload->FileName = implode(MULTIPLE_UPLOAD_SEPARATOR, $newFiles);
				$this->malepropic->setDbValueDef($rsnew, $this->malepropic->Upload->FileName, NULL, FALSE);
			}
		}
		if ($this->femalepropic->Visible && !$this->femalepropic->Upload->KeepFile) {
			$oldFiles = EmptyValue($this->femalepropic->Upload->DbValue) ? array() : array($this->femalepropic->Upload->DbValue);
			if (!EmptyValue($this->femalepropic->Upload->FileName)) {
				$newFiles = array($this->femalepropic->Upload->FileName);
				$NewFileCount = count($newFiles);
				for ($i = 0; $i < $NewFileCount; $i++) {
					if ($newFiles[$i] <> "") {
						$file = $newFiles[$i];
						if (file_exists(UploadTempPath($this->femalepropic, $this->femalepropic->Upload->Index) . $file)) {
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
							$file1 = UniqueFilename($this->femalepropic->physicalUploadPath(), $file); // Get new file name
							if ($file1 <> $file) { // Rename temp file
								while (file_exists(UploadTempPath($this->femalepropic, $this->femalepropic->Upload->Index) . $file1) || file_exists($this->femalepropic->physicalUploadPath() . $file1)) // Make sure no file name clash
									$file1 = UniqueFilename($this->femalepropic->physicalUploadPath(), $file1, TRUE); // Use indexed name
								rename(UploadTempPath($this->femalepropic, $this->femalepropic->Upload->Index) . $file, UploadTempPath($this->femalepropic, $this->femalepropic->Upload->Index) . $file1);
								$newFiles[$i] = $file1;
							}
						}
					}
				}
				$this->femalepropic->Upload->DbValue = empty($oldFiles) ? "" : implode(MULTIPLE_UPLOAD_SEPARATOR, $oldFiles);
				$this->femalepropic->Upload->FileName = implode(MULTIPLE_UPLOAD_SEPARATOR, $newFiles);
				$this->femalepropic->setDbValueDef($rsnew, $this->femalepropic->Upload->FileName, NULL, FALSE);
			}
		}

		// Call Row Inserting event
		$rs = ($rsold) ? $rsold->fields : NULL;
		$insertRow = $this->Row_Inserting($rs, $rsnew);
		if ($insertRow) {
			$conn->raiseErrorFn = $GLOBALS["ERROR_FUNC"];
			$addRow = $this->insert($rsnew);
			$conn->raiseErrorFn = '';
			if ($addRow) {
				if ($this->malepropic->Visible && !$this->malepropic->Upload->KeepFile) {
					$oldFiles = EmptyValue($this->malepropic->Upload->DbValue) ? array() : array($this->malepropic->Upload->DbValue);
					if (!EmptyValue($this->malepropic->Upload->FileName)) {
						$newFiles = array($this->malepropic->Upload->FileName);
						$newFiles2 = array($rsnew['malepropic']);
						$newFileCount = count($newFiles);
						for ($i = 0; $i < $newFileCount; $i++) {
							if ($newFiles[$i] <> "") {
								$file = UploadTempPath($this->malepropic, $this->malepropic->Upload->Index) . $newFiles[$i];
								if (file_exists($file)) {
									if (@$newFiles2[$i] <> "") // Use correct file name
										$newFiles[$i] = $newFiles2[$i];
									if (!$this->malepropic->Upload->saveToFile($newFiles[$i], TRUE, $i)) { // Just replace
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
								@unlink($this->malepropic->oldPhysicalUploadPath() . $oldFile);
						}
					}
				}
				if ($this->femalepropic->Visible && !$this->femalepropic->Upload->KeepFile) {
					$oldFiles = EmptyValue($this->femalepropic->Upload->DbValue) ? array() : array($this->femalepropic->Upload->DbValue);
					if (!EmptyValue($this->femalepropic->Upload->FileName)) {
						$newFiles = array($this->femalepropic->Upload->FileName);
						$newFiles2 = array($rsnew['femalepropic']);
						$newFileCount = count($newFiles);
						for ($i = 0; $i < $newFileCount; $i++) {
							if ($newFiles[$i] <> "") {
								$file = UploadTempPath($this->femalepropic, $this->femalepropic->Upload->Index) . $newFiles[$i];
								if (file_exists($file)) {
									if (@$newFiles2[$i] <> "") // Use correct file name
										$newFiles[$i] = $newFiles2[$i];
									if (!$this->femalepropic->Upload->saveToFile($newFiles[$i], TRUE, $i)) { // Just replace
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
								@unlink($this->femalepropic->oldPhysicalUploadPath() . $oldFile);
						}
					}
				}
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

		// Add detail records
		if ($addRow) {
			$detailTblVar = explode(",", $this->getCurrentDetailTable());
			if (in_array("ivf_treatment_plan", $detailTblVar) && $GLOBALS["ivf_treatment_plan"]->DetailAdd) {
				$GLOBALS["ivf_treatment_plan"]->RIDNO->setSessionValue($this->id->CurrentValue); // Set master key
				$GLOBALS["ivf_treatment_plan"]->Name->setSessionValue($this->Female->CurrentValue); // Set master key
				if (!isset($GLOBALS["ivf_treatment_plan_grid"]))
					$GLOBALS["ivf_treatment_plan_grid"] = new ivf_treatment_plan_grid(); // Get detail page object
				$Security->loadCurrentUserLevel($this->ProjectID . "ivf_treatment_plan"); // Load user level of detail table
				$addRow = $GLOBALS["ivf_treatment_plan_grid"]->gridInsert();
				$Security->loadCurrentUserLevel($this->ProjectID . $this->TableName); // Restore user level of master table
				if (!$addRow)
					$GLOBALS["ivf_treatment_plan"]->Name->setSessionValue(""); // Clear master key if insert failed
			}
		}

		// Commit/Rollback transaction
		if ($this->getCurrentDetailTable() <> "") {
			if ($addRow) {
				$conn->commitTrans(); // Commit transaction
			} else {
				$conn->rollbackTrans(); // Rollback transaction
			}
		}
		if ($addRow) {

			// Call Row Inserted event
			$rs = ($rsold) ? $rsold->fields : NULL;
			$this->Row_Inserted($rs, $rsnew);
		}

		// malepropic
		if ($this->malepropic->Upload->FileToken <> "")
			CleanUploadTempPath($this->malepropic->Upload->FileToken, $this->malepropic->Upload->Index);
		else
			CleanUploadTempPath($this->malepropic, $this->malepropic->Upload->Index);

		// femalepropic
		if ($this->femalepropic->Upload->FileToken <> "")
			CleanUploadTempPath($this->femalepropic->Upload->FileToken, $this->femalepropic->Upload->Index);
		else
			CleanUploadTempPath($this->femalepropic, $this->femalepropic->Upload->Index);

		// Write JSON for API request
		if (IsApi() && $addRow) {
			$row = $this->getRecordsFromRecordset([$rsnew], TRUE);
			WriteJson(["success" => TRUE, $this->TableVar => $row]);
		}
		return $addRow;
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
			if (in_array("ivf_treatment_plan", $detailTblVar)) {
				if (!isset($GLOBALS["ivf_treatment_plan_grid"]))
					$GLOBALS["ivf_treatment_plan_grid"] = new ivf_treatment_plan_grid();
				if ($GLOBALS["ivf_treatment_plan_grid"]->DetailAdd) {
					if ($this->CopyRecord)
						$GLOBALS["ivf_treatment_plan_grid"]->CurrentMode = "copy";
					else
						$GLOBALS["ivf_treatment_plan_grid"]->CurrentMode = "add";
					$GLOBALS["ivf_treatment_plan_grid"]->CurrentAction = "gridadd";

					// Save current master table to detail table
					$GLOBALS["ivf_treatment_plan_grid"]->setCurrentMasterTable($this->TableVar);
					$GLOBALS["ivf_treatment_plan_grid"]->setStartRecordNumber(1);
					$GLOBALS["ivf_treatment_plan_grid"]->RIDNO->IsDetailKey = TRUE;
					$GLOBALS["ivf_treatment_plan_grid"]->RIDNO->CurrentValue = $this->id->CurrentValue;
					$GLOBALS["ivf_treatment_plan_grid"]->RIDNO->setSessionValue($GLOBALS["ivf_treatment_plan_grid"]->RIDNO->CurrentValue);
					$GLOBALS["ivf_treatment_plan_grid"]->Name->IsDetailKey = TRUE;
					$GLOBALS["ivf_treatment_plan_grid"]->Name->CurrentValue = $this->Female->CurrentValue;
					$GLOBALS["ivf_treatment_plan_grid"]->Name->setSessionValue($GLOBALS["ivf_treatment_plan_grid"]->Name->CurrentValue);
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
		$Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("ivflist.php"), "", $this->TableVar, TRUE);
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
						case "x_Male":
							break;
						case "x_Female":
							break;
						case "x_status":
							break;
						case "x_ReferedBy":
							break;
						case "x_DrID":
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
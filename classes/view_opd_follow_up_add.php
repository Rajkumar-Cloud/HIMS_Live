<?php
namespace PHPMaker2019\HIMS;

/**
 * Page class
 */
class view_opd_follow_up_add extends view_opd_follow_up
{

	// Page ID
	public $PageID = "add";

	// Project ID
	public $ProjectID = "{EA4F6D13-AF8F-428D-9EA7-BA88D1107EC3}";

	// Table name
	public $TableName = 'view_opd_follow_up';

	// Page object name
	public $PageObjName = "view_opd_follow_up_add";

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

		// Table object (view_opd_follow_up)
		if (!isset($GLOBALS["view_opd_follow_up"]) || get_class($GLOBALS["view_opd_follow_up"]) == PROJECT_NAMESPACE . "view_opd_follow_up") {
			$GLOBALS["view_opd_follow_up"] = &$this;
			$GLOBALS["Table"] = &$GLOBALS["view_opd_follow_up"];
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
			define(PROJECT_NAMESPACE . "TABLE_NAME", 'view_opd_follow_up');

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
		global $EXPORT, $view_opd_follow_up;
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
				$doc = new $class($view_opd_follow_up);
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
					if ($pageName == "view_opd_follow_upview.php")
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
					$this->terminate(GetUrl("view_opd_follow_uplist.php"));
				else
					$this->terminate(GetUrl("login.php"));
				return;
			}
		}

		// Create form object
		$CurrentForm = new HttpForm();
		$this->CurrentAction = Param("action"); // Set up current action
		$this->id->Visible = FALSE;
		$this->Reception->setVisibility();
		$this->PatientId->setVisibility();
		$this->mrnno->setVisibility();
		$this->PatientName->setVisibility();
		$this->Telephone->setVisibility();
		$this->Age->setVisibility();
		$this->Gender->setVisibility();
		$this->profilePic->setVisibility();
		$this->procedurenotes->setVisibility();
		$this->NextReviewDate->setVisibility();
		$this->ICSIAdvised->setVisibility();
		$this->DeliveryRegistered->setVisibility();
		$this->EDD->setVisibility();
		$this->SerologyPositive->setVisibility();
		$this->Allergy->setVisibility();
		$this->status->setVisibility();
		$this->createdby->setVisibility();
		$this->createddatetime->setVisibility();
		$this->modifiedby->Visible = FALSE;
		$this->modifieddatetime->Visible = FALSE;
		$this->LMP->setVisibility();
		$this->Procedure->setVisibility();
		$this->ProcedureDateTime->setVisibility();
		$this->ICSIDate->setVisibility();
		$this->RIDNo->setVisibility();
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
		$this->setupLookupOptions($this->Allergy);

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
					$this->terminate("view_opd_follow_uplist.php"); // No matching record, return to list
				}
				break;
			case "insert": // Add new record
				$this->SendEmail = TRUE; // Send email on add success
				if ($this->addRow($this->OldRecordset)) { // Add successful
					if ($this->getSuccessMessage() == "")
						$this->setSuccessMessage($Language->phrase("AddSuccess")); // Set up success message
					$returnUrl = $this->getReturnUrl();
					if (GetPageName($returnUrl) == "view_opd_follow_uplist.php")
						$returnUrl = $this->addMasterUrl($returnUrl); // List page, return to List page with correct master key if necessary
					elseif (GetPageName($returnUrl) == "view_opd_follow_upview.php")
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
		$this->Reception->CurrentValue = NULL;
		$this->Reception->OldValue = $this->Reception->CurrentValue;
		$this->PatientId->CurrentValue = NULL;
		$this->PatientId->OldValue = $this->PatientId->CurrentValue;
		$this->mrnno->CurrentValue = NULL;
		$this->mrnno->OldValue = $this->mrnno->CurrentValue;
		$this->PatientName->CurrentValue = NULL;
		$this->PatientName->OldValue = $this->PatientName->CurrentValue;
		$this->Telephone->CurrentValue = NULL;
		$this->Telephone->OldValue = $this->Telephone->CurrentValue;
		$this->Age->CurrentValue = NULL;
		$this->Age->OldValue = $this->Age->CurrentValue;
		$this->Gender->CurrentValue = NULL;
		$this->Gender->OldValue = $this->Gender->CurrentValue;
		$this->profilePic->CurrentValue = NULL;
		$this->profilePic->OldValue = $this->profilePic->CurrentValue;
		$this->procedurenotes->CurrentValue = NULL;
		$this->procedurenotes->OldValue = $this->procedurenotes->CurrentValue;
		$this->NextReviewDate->CurrentValue = NULL;
		$this->NextReviewDate->OldValue = $this->NextReviewDate->CurrentValue;
		$this->ICSIAdvised->CurrentValue = NULL;
		$this->ICSIAdvised->OldValue = $this->ICSIAdvised->CurrentValue;
		$this->DeliveryRegistered->CurrentValue = NULL;
		$this->DeliveryRegistered->OldValue = $this->DeliveryRegistered->CurrentValue;
		$this->EDD->CurrentValue = NULL;
		$this->EDD->OldValue = $this->EDD->CurrentValue;
		$this->SerologyPositive->CurrentValue = NULL;
		$this->SerologyPositive->OldValue = $this->SerologyPositive->CurrentValue;
		$this->Allergy->CurrentValue = NULL;
		$this->Allergy->OldValue = $this->Allergy->CurrentValue;
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
		$this->LMP->CurrentValue = NULL;
		$this->LMP->OldValue = $this->LMP->CurrentValue;
		$this->Procedure->CurrentValue = NULL;
		$this->Procedure->OldValue = $this->Procedure->CurrentValue;
		$this->ProcedureDateTime->CurrentValue = NULL;
		$this->ProcedureDateTime->OldValue = $this->ProcedureDateTime->CurrentValue;
		$this->ICSIDate->CurrentValue = NULL;
		$this->ICSIDate->OldValue = $this->ICSIDate->CurrentValue;
		$this->RIDNo->CurrentValue = NULL;
		$this->RIDNo->OldValue = $this->RIDNo->CurrentValue;
	}

	// Load form values
	protected function loadFormValues()
	{

		// Load from form
		global $CurrentForm;

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

		// Check field name 'Telephone' first before field var 'x_Telephone'
		$val = $CurrentForm->hasValue("Telephone") ? $CurrentForm->getValue("Telephone") : $CurrentForm->getValue("x_Telephone");
		if (!$this->Telephone->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Telephone->Visible = FALSE; // Disable update for API request
			else
				$this->Telephone->setFormValue($val);
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

		// Check field name 'procedurenotes' first before field var 'x_procedurenotes'
		$val = $CurrentForm->hasValue("procedurenotes") ? $CurrentForm->getValue("procedurenotes") : $CurrentForm->getValue("x_procedurenotes");
		if (!$this->procedurenotes->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->procedurenotes->Visible = FALSE; // Disable update for API request
			else
				$this->procedurenotes->setFormValue($val);
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

		// Check field name 'ICSIAdvised' first before field var 'x_ICSIAdvised'
		$val = $CurrentForm->hasValue("ICSIAdvised") ? $CurrentForm->getValue("ICSIAdvised") : $CurrentForm->getValue("x_ICSIAdvised");
		if (!$this->ICSIAdvised->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->ICSIAdvised->Visible = FALSE; // Disable update for API request
			else
				$this->ICSIAdvised->setFormValue($val);
		}

		// Check field name 'DeliveryRegistered' first before field var 'x_DeliveryRegistered'
		$val = $CurrentForm->hasValue("DeliveryRegistered") ? $CurrentForm->getValue("DeliveryRegistered") : $CurrentForm->getValue("x_DeliveryRegistered");
		if (!$this->DeliveryRegistered->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->DeliveryRegistered->Visible = FALSE; // Disable update for API request
			else
				$this->DeliveryRegistered->setFormValue($val);
		}

		// Check field name 'EDD' first before field var 'x_EDD'
		$val = $CurrentForm->hasValue("EDD") ? $CurrentForm->getValue("EDD") : $CurrentForm->getValue("x_EDD");
		if (!$this->EDD->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->EDD->Visible = FALSE; // Disable update for API request
			else
				$this->EDD->setFormValue($val);
			$this->EDD->CurrentValue = UnFormatDateTime($this->EDD->CurrentValue, 0);
		}

		// Check field name 'SerologyPositive' first before field var 'x_SerologyPositive'
		$val = $CurrentForm->hasValue("SerologyPositive") ? $CurrentForm->getValue("SerologyPositive") : $CurrentForm->getValue("x_SerologyPositive");
		if (!$this->SerologyPositive->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->SerologyPositive->Visible = FALSE; // Disable update for API request
			else
				$this->SerologyPositive->setFormValue($val);
		}

		// Check field name 'Allergy' first before field var 'x_Allergy'
		$val = $CurrentForm->hasValue("Allergy") ? $CurrentForm->getValue("Allergy") : $CurrentForm->getValue("x_Allergy");
		if (!$this->Allergy->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Allergy->Visible = FALSE; // Disable update for API request
			else
				$this->Allergy->setFormValue($val);
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

		// Check field name 'LMP' first before field var 'x_LMP'
		$val = $CurrentForm->hasValue("LMP") ? $CurrentForm->getValue("LMP") : $CurrentForm->getValue("x_LMP");
		if (!$this->LMP->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->LMP->Visible = FALSE; // Disable update for API request
			else
				$this->LMP->setFormValue($val);
			$this->LMP->CurrentValue = UnFormatDateTime($this->LMP->CurrentValue, 0);
		}

		// Check field name 'Procedure' first before field var 'x_Procedure'
		$val = $CurrentForm->hasValue("Procedure") ? $CurrentForm->getValue("Procedure") : $CurrentForm->getValue("x_Procedure");
		if (!$this->Procedure->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Procedure->Visible = FALSE; // Disable update for API request
			else
				$this->Procedure->setFormValue($val);
		}

		// Check field name 'ProcedureDateTime' first before field var 'x_ProcedureDateTime'
		$val = $CurrentForm->hasValue("ProcedureDateTime") ? $CurrentForm->getValue("ProcedureDateTime") : $CurrentForm->getValue("x_ProcedureDateTime");
		if (!$this->ProcedureDateTime->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->ProcedureDateTime->Visible = FALSE; // Disable update for API request
			else
				$this->ProcedureDateTime->setFormValue($val);
			$this->ProcedureDateTime->CurrentValue = UnFormatDateTime($this->ProcedureDateTime->CurrentValue, 0);
		}

		// Check field name 'ICSIDate' first before field var 'x_ICSIDate'
		$val = $CurrentForm->hasValue("ICSIDate") ? $CurrentForm->getValue("ICSIDate") : $CurrentForm->getValue("x_ICSIDate");
		if (!$this->ICSIDate->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->ICSIDate->Visible = FALSE; // Disable update for API request
			else
				$this->ICSIDate->setFormValue($val);
			$this->ICSIDate->CurrentValue = UnFormatDateTime($this->ICSIDate->CurrentValue, 0);
		}

		// Check field name 'RIDNo' first before field var 'x_RIDNo'
		$val = $CurrentForm->hasValue("RIDNo") ? $CurrentForm->getValue("RIDNo") : $CurrentForm->getValue("x_RIDNo");
		if (!$this->RIDNo->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->RIDNo->Visible = FALSE; // Disable update for API request
			else
				$this->RIDNo->setFormValue($val);
		}

		// Check field name 'id' first before field var 'x_id'
		$val = $CurrentForm->hasValue("id") ? $CurrentForm->getValue("id") : $CurrentForm->getValue("x_id");
	}

	// Restore form values
	public function restoreFormValues()
	{
		global $CurrentForm;
		$this->Reception->CurrentValue = $this->Reception->FormValue;
		$this->PatientId->CurrentValue = $this->PatientId->FormValue;
		$this->mrnno->CurrentValue = $this->mrnno->FormValue;
		$this->PatientName->CurrentValue = $this->PatientName->FormValue;
		$this->Telephone->CurrentValue = $this->Telephone->FormValue;
		$this->Age->CurrentValue = $this->Age->FormValue;
		$this->Gender->CurrentValue = $this->Gender->FormValue;
		$this->profilePic->CurrentValue = $this->profilePic->FormValue;
		$this->procedurenotes->CurrentValue = $this->procedurenotes->FormValue;
		$this->NextReviewDate->CurrentValue = $this->NextReviewDate->FormValue;
		$this->NextReviewDate->CurrentValue = UnFormatDateTime($this->NextReviewDate->CurrentValue, 0);
		$this->ICSIAdvised->CurrentValue = $this->ICSIAdvised->FormValue;
		$this->DeliveryRegistered->CurrentValue = $this->DeliveryRegistered->FormValue;
		$this->EDD->CurrentValue = $this->EDD->FormValue;
		$this->EDD->CurrentValue = UnFormatDateTime($this->EDD->CurrentValue, 0);
		$this->SerologyPositive->CurrentValue = $this->SerologyPositive->FormValue;
		$this->Allergy->CurrentValue = $this->Allergy->FormValue;
		$this->status->CurrentValue = $this->status->FormValue;
		$this->createdby->CurrentValue = $this->createdby->FormValue;
		$this->createddatetime->CurrentValue = $this->createddatetime->FormValue;
		$this->createddatetime->CurrentValue = UnFormatDateTime($this->createddatetime->CurrentValue, 0);
		$this->LMP->CurrentValue = $this->LMP->FormValue;
		$this->LMP->CurrentValue = UnFormatDateTime($this->LMP->CurrentValue, 0);
		$this->Procedure->CurrentValue = $this->Procedure->FormValue;
		$this->ProcedureDateTime->CurrentValue = $this->ProcedureDateTime->FormValue;
		$this->ProcedureDateTime->CurrentValue = UnFormatDateTime($this->ProcedureDateTime->CurrentValue, 0);
		$this->ICSIDate->CurrentValue = $this->ICSIDate->FormValue;
		$this->ICSIDate->CurrentValue = UnFormatDateTime($this->ICSIDate->CurrentValue, 0);
		$this->RIDNo->CurrentValue = $this->RIDNo->FormValue;
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
		$this->mrnno->setDbValue($row['mrnno']);
		$this->PatientName->setDbValue($row['PatientName']);
		$this->Telephone->setDbValue($row['Telephone']);
		$this->Age->setDbValue($row['Age']);
		$this->Gender->setDbValue($row['Gender']);
		$this->profilePic->setDbValue($row['profilePic']);
		$this->procedurenotes->setDbValue($row['procedurenotes']);
		$this->NextReviewDate->setDbValue($row['NextReviewDate']);
		$this->ICSIAdvised->setDbValue($row['ICSIAdvised']);
		$this->DeliveryRegistered->setDbValue($row['DeliveryRegistered']);
		$this->EDD->setDbValue($row['EDD']);
		$this->SerologyPositive->setDbValue($row['SerologyPositive']);
		$this->Allergy->setDbValue($row['Allergy']);
		$this->status->setDbValue($row['status']);
		$this->createdby->setDbValue($row['createdby']);
		$this->createddatetime->setDbValue($row['createddatetime']);
		$this->modifiedby->setDbValue($row['modifiedby']);
		$this->modifieddatetime->setDbValue($row['modifieddatetime']);
		$this->LMP->setDbValue($row['LMP']);
		$this->Procedure->setDbValue($row['Procedure']);
		$this->ProcedureDateTime->setDbValue($row['ProcedureDateTime']);
		$this->ICSIDate->setDbValue($row['ICSIDate']);
		$this->RIDNo->setDbValue($row['RIDNo']);
	}

	// Return a row with default values
	protected function newRow()
	{
		$this->loadDefaultValues();
		$row = [];
		$row['id'] = $this->id->CurrentValue;
		$row['Reception'] = $this->Reception->CurrentValue;
		$row['PatientId'] = $this->PatientId->CurrentValue;
		$row['mrnno'] = $this->mrnno->CurrentValue;
		$row['PatientName'] = $this->PatientName->CurrentValue;
		$row['Telephone'] = $this->Telephone->CurrentValue;
		$row['Age'] = $this->Age->CurrentValue;
		$row['Gender'] = $this->Gender->CurrentValue;
		$row['profilePic'] = $this->profilePic->CurrentValue;
		$row['procedurenotes'] = $this->procedurenotes->CurrentValue;
		$row['NextReviewDate'] = $this->NextReviewDate->CurrentValue;
		$row['ICSIAdvised'] = $this->ICSIAdvised->CurrentValue;
		$row['DeliveryRegistered'] = $this->DeliveryRegistered->CurrentValue;
		$row['EDD'] = $this->EDD->CurrentValue;
		$row['SerologyPositive'] = $this->SerologyPositive->CurrentValue;
		$row['Allergy'] = $this->Allergy->CurrentValue;
		$row['status'] = $this->status->CurrentValue;
		$row['createdby'] = $this->createdby->CurrentValue;
		$row['createddatetime'] = $this->createddatetime->CurrentValue;
		$row['modifiedby'] = $this->modifiedby->CurrentValue;
		$row['modifieddatetime'] = $this->modifieddatetime->CurrentValue;
		$row['LMP'] = $this->LMP->CurrentValue;
		$row['Procedure'] = $this->Procedure->CurrentValue;
		$row['ProcedureDateTime'] = $this->ProcedureDateTime->CurrentValue;
		$row['ICSIDate'] = $this->ICSIDate->CurrentValue;
		$row['RIDNo'] = $this->RIDNo->CurrentValue;
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
		// Reception
		// PatientId
		// mrnno
		// PatientName
		// Telephone
		// Age
		// Gender
		// profilePic
		// procedurenotes
		// NextReviewDate
		// ICSIAdvised
		// DeliveryRegistered
		// EDD
		// SerologyPositive
		// Allergy
		// status
		// createdby
		// createddatetime
		// modifiedby
		// modifieddatetime
		// LMP
		// Procedure
		// ProcedureDateTime
		// ICSIDate
		// RIDNo

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

			// mrnno
			$this->mrnno->ViewValue = $this->mrnno->CurrentValue;
			$this->mrnno->ViewCustomAttributes = "";

			// PatientName
			$this->PatientName->ViewValue = $this->PatientName->CurrentValue;
			$this->PatientName->ViewCustomAttributes = "";

			// Telephone
			$this->Telephone->ViewValue = $this->Telephone->CurrentValue;
			$this->Telephone->ViewCustomAttributes = "";

			// Age
			$this->Age->ViewValue = $this->Age->CurrentValue;
			$this->Age->ViewCustomAttributes = "";

			// Gender
			$this->Gender->ViewValue = $this->Gender->CurrentValue;
			$this->Gender->ViewCustomAttributes = "";

			// profilePic
			$this->profilePic->ViewValue = $this->profilePic->CurrentValue;
			$this->profilePic->ViewCustomAttributes = "";

			// procedurenotes
			$this->procedurenotes->ViewValue = $this->procedurenotes->CurrentValue;
			$this->procedurenotes->ViewCustomAttributes = "";

			// NextReviewDate
			$this->NextReviewDate->ViewValue = $this->NextReviewDate->CurrentValue;
			$this->NextReviewDate->ViewValue = FormatDateTime($this->NextReviewDate->ViewValue, 0);
			$this->NextReviewDate->ViewCustomAttributes = "";

			// ICSIAdvised
			if (strval($this->ICSIAdvised->CurrentValue) <> "") {
				$this->ICSIAdvised->ViewValue = new OptionValues();
				$arwrk = explode(",", strval($this->ICSIAdvised->CurrentValue));
				$cnt = count($arwrk);
				for ($ari = 0; $ari < $cnt; $ari++)
					$this->ICSIAdvised->ViewValue->add($this->ICSIAdvised->optionCaption(trim($arwrk[$ari])));
			} else {
				$this->ICSIAdvised->ViewValue = NULL;
			}
			$this->ICSIAdvised->ViewCustomAttributes = "";

			// DeliveryRegistered
			if (strval($this->DeliveryRegistered->CurrentValue) <> "") {
				$this->DeliveryRegistered->ViewValue = new OptionValues();
				$arwrk = explode(",", strval($this->DeliveryRegistered->CurrentValue));
				$cnt = count($arwrk);
				for ($ari = 0; $ari < $cnt; $ari++)
					$this->DeliveryRegistered->ViewValue->add($this->DeliveryRegistered->optionCaption(trim($arwrk[$ari])));
			} else {
				$this->DeliveryRegistered->ViewValue = NULL;
			}
			$this->DeliveryRegistered->ViewCustomAttributes = "";

			// EDD
			$this->EDD->ViewValue = $this->EDD->CurrentValue;
			$this->EDD->ViewValue = FormatDateTime($this->EDD->ViewValue, 0);
			$this->EDD->ViewCustomAttributes = "";

			// SerologyPositive
			if (strval($this->SerologyPositive->CurrentValue) <> "") {
				$this->SerologyPositive->ViewValue = new OptionValues();
				$arwrk = explode(",", strval($this->SerologyPositive->CurrentValue));
				$cnt = count($arwrk);
				for ($ari = 0; $ari < $cnt; $ari++)
					$this->SerologyPositive->ViewValue->add($this->SerologyPositive->optionCaption(trim($arwrk[$ari])));
			} else {
				$this->SerologyPositive->ViewValue = NULL;
			}
			$this->SerologyPositive->ViewCustomAttributes = "";

			// Allergy
			$curVal = strval($this->Allergy->CurrentValue);
			if ($curVal <> "") {
				$this->Allergy->ViewValue = $this->Allergy->lookupCacheOption($curVal);
				if ($this->Allergy->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Generic`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->Allergy->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = $rswrk->fields('df');
						$this->Allergy->ViewValue = $this->Allergy->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->Allergy->ViewValue = $this->Allergy->CurrentValue;
					}
				}
			} else {
				$this->Allergy->ViewValue = NULL;
			}
			$this->Allergy->ViewCustomAttributes = "";

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

			// LMP
			$this->LMP->ViewValue = $this->LMP->CurrentValue;
			$this->LMP->ViewValue = FormatDateTime($this->LMP->ViewValue, 0);
			$this->LMP->ViewCustomAttributes = "";

			// Procedure
			$this->Procedure->ViewValue = $this->Procedure->CurrentValue;
			$this->Procedure->ViewCustomAttributes = "";

			// ProcedureDateTime
			$this->ProcedureDateTime->ViewValue = $this->ProcedureDateTime->CurrentValue;
			$this->ProcedureDateTime->ViewValue = FormatDateTime($this->ProcedureDateTime->ViewValue, 0);
			$this->ProcedureDateTime->ViewCustomAttributes = "";

			// ICSIDate
			$this->ICSIDate->ViewValue = $this->ICSIDate->CurrentValue;
			$this->ICSIDate->ViewValue = FormatDateTime($this->ICSIDate->ViewValue, 0);
			$this->ICSIDate->ViewCustomAttributes = "";

			// RIDNo
			$this->RIDNo->ViewValue = $this->RIDNo->CurrentValue;
			$this->RIDNo->ViewCustomAttributes = "";

			// Reception
			$this->Reception->LinkCustomAttributes = "";
			$this->Reception->HrefValue = "";
			$this->Reception->TooltipValue = "";

			// PatientId
			$this->PatientId->LinkCustomAttributes = "";
			$this->PatientId->HrefValue = "";
			$this->PatientId->TooltipValue = "";

			// mrnno
			$this->mrnno->LinkCustomAttributes = "";
			$this->mrnno->HrefValue = "";
			$this->mrnno->TooltipValue = "";

			// PatientName
			$this->PatientName->LinkCustomAttributes = "";
			$this->PatientName->HrefValue = "";
			$this->PatientName->TooltipValue = "";

			// Telephone
			$this->Telephone->LinkCustomAttributes = "";
			$this->Telephone->HrefValue = "";
			$this->Telephone->TooltipValue = "";

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

			// procedurenotes
			$this->procedurenotes->LinkCustomAttributes = "";
			$this->procedurenotes->HrefValue = "";
			$this->procedurenotes->TooltipValue = "";

			// NextReviewDate
			$this->NextReviewDate->LinkCustomAttributes = "";
			$this->NextReviewDate->HrefValue = "";
			$this->NextReviewDate->TooltipValue = "";

			// ICSIAdvised
			$this->ICSIAdvised->LinkCustomAttributes = "";
			$this->ICSIAdvised->HrefValue = "";
			$this->ICSIAdvised->TooltipValue = "";

			// DeliveryRegistered
			$this->DeliveryRegistered->LinkCustomAttributes = "";
			$this->DeliveryRegistered->HrefValue = "";
			$this->DeliveryRegistered->TooltipValue = "";

			// EDD
			$this->EDD->LinkCustomAttributes = "";
			$this->EDD->HrefValue = "";
			$this->EDD->TooltipValue = "";

			// SerologyPositive
			$this->SerologyPositive->LinkCustomAttributes = "";
			$this->SerologyPositive->HrefValue = "";
			$this->SerologyPositive->TooltipValue = "";

			// Allergy
			$this->Allergy->LinkCustomAttributes = "";
			$this->Allergy->HrefValue = "";
			$this->Allergy->TooltipValue = "";

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

			// LMP
			$this->LMP->LinkCustomAttributes = "";
			$this->LMP->HrefValue = "";
			$this->LMP->TooltipValue = "";

			// Procedure
			$this->Procedure->LinkCustomAttributes = "";
			$this->Procedure->HrefValue = "";
			$this->Procedure->TooltipValue = "";

			// ProcedureDateTime
			$this->ProcedureDateTime->LinkCustomAttributes = "";
			$this->ProcedureDateTime->HrefValue = "";
			$this->ProcedureDateTime->TooltipValue = "";

			// ICSIDate
			$this->ICSIDate->LinkCustomAttributes = "";
			$this->ICSIDate->HrefValue = "";
			$this->ICSIDate->TooltipValue = "";

			// RIDNo
			$this->RIDNo->LinkCustomAttributes = "";
			$this->RIDNo->HrefValue = "";
			$this->RIDNo->TooltipValue = "";
		} elseif ($this->RowType == ROWTYPE_ADD) { // Add row

			// Reception
			$this->Reception->EditAttrs["class"] = "form-control";
			$this->Reception->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Reception->CurrentValue = HtmlDecode($this->Reception->CurrentValue);
			$this->Reception->EditValue = HtmlEncode($this->Reception->CurrentValue);
			$this->Reception->PlaceHolder = RemoveHtml($this->Reception->caption());

			// PatientId
			$this->PatientId->EditAttrs["class"] = "form-control";
			$this->PatientId->EditCustomAttributes = "";
			$this->PatientId->EditValue = HtmlEncode($this->PatientId->CurrentValue);
			$this->PatientId->PlaceHolder = RemoveHtml($this->PatientId->caption());

			// mrnno
			$this->mrnno->EditAttrs["class"] = "form-control";
			$this->mrnno->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->mrnno->CurrentValue = HtmlDecode($this->mrnno->CurrentValue);
			$this->mrnno->EditValue = HtmlEncode($this->mrnno->CurrentValue);
			$this->mrnno->PlaceHolder = RemoveHtml($this->mrnno->caption());

			// PatientName
			$this->PatientName->EditAttrs["class"] = "form-control";
			$this->PatientName->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->PatientName->CurrentValue = HtmlDecode($this->PatientName->CurrentValue);
			$this->PatientName->EditValue = HtmlEncode($this->PatientName->CurrentValue);
			$this->PatientName->PlaceHolder = RemoveHtml($this->PatientName->caption());

			// Telephone
			$this->Telephone->EditAttrs["class"] = "form-control";
			$this->Telephone->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Telephone->CurrentValue = HtmlDecode($this->Telephone->CurrentValue);
			$this->Telephone->EditValue = HtmlEncode($this->Telephone->CurrentValue);
			$this->Telephone->PlaceHolder = RemoveHtml($this->Telephone->caption());

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

			// procedurenotes
			$this->procedurenotes->EditAttrs["class"] = "form-control";
			$this->procedurenotes->EditCustomAttributes = "";
			$this->procedurenotes->EditValue = HtmlEncode($this->procedurenotes->CurrentValue);
			$this->procedurenotes->PlaceHolder = RemoveHtml($this->procedurenotes->caption());

			// NextReviewDate
			$this->NextReviewDate->EditAttrs["class"] = "form-control";
			$this->NextReviewDate->EditCustomAttributes = "";
			$this->NextReviewDate->EditValue = HtmlEncode(FormatDateTime($this->NextReviewDate->CurrentValue, 8));
			$this->NextReviewDate->PlaceHolder = RemoveHtml($this->NextReviewDate->caption());

			// ICSIAdvised
			$this->ICSIAdvised->EditCustomAttributes = "";
			$this->ICSIAdvised->EditValue = $this->ICSIAdvised->options(FALSE);

			// DeliveryRegistered
			$this->DeliveryRegistered->EditCustomAttributes = "";
			$this->DeliveryRegistered->EditValue = $this->DeliveryRegistered->options(FALSE);

			// EDD
			$this->EDD->EditAttrs["class"] = "form-control";
			$this->EDD->EditCustomAttributes = "";
			$this->EDD->EditValue = HtmlEncode(FormatDateTime($this->EDD->CurrentValue, 8));
			$this->EDD->PlaceHolder = RemoveHtml($this->EDD->caption());

			// SerologyPositive
			$this->SerologyPositive->EditCustomAttributes = "";
			$this->SerologyPositive->EditValue = $this->SerologyPositive->options(FALSE);

			// Allergy
			$this->Allergy->EditCustomAttributes = "";
			$curVal = trim(strval($this->Allergy->CurrentValue));
			if ($curVal <> "")
				$this->Allergy->ViewValue = $this->Allergy->lookupCacheOption($curVal);
			else
				$this->Allergy->ViewValue = $this->Allergy->Lookup !== NULL && is_array($this->Allergy->Lookup->Options) ? $curVal : NULL;
			if ($this->Allergy->ViewValue !== NULL) { // Load from cache
				$this->Allergy->EditValue = array_values($this->Allergy->Lookup->Options);
				if ($this->Allergy->ViewValue == "")
					$this->Allergy->ViewValue = $Language->phrase("PleaseSelect");
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`Generic`" . SearchString("=", $this->Allergy->CurrentValue, DATATYPE_STRING, "");
				}
				$sqlWrk = $this->Allergy->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = array();
					$arwrk[1] = HtmlEncode($rswrk->fields('df'));
					$this->Allergy->ViewValue = $this->Allergy->displayValue($arwrk);
				} else {
					$this->Allergy->ViewValue = $Language->phrase("PleaseSelect");
				}
				$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
				if ($rswrk) $rswrk->Close();
				$this->Allergy->EditValue = $arwrk;
			}

			// status
			$this->status->EditAttrs["class"] = "form-control";
			$this->status->EditCustomAttributes = "";
			$this->status->EditValue = HtmlEncode($this->status->CurrentValue);
			$this->status->PlaceHolder = RemoveHtml($this->status->caption());

			// createdby
			// createddatetime
			// LMP

			$this->LMP->EditAttrs["class"] = "form-control";
			$this->LMP->EditCustomAttributes = "";
			$this->LMP->EditValue = HtmlEncode(FormatDateTime($this->LMP->CurrentValue, 8));
			$this->LMP->PlaceHolder = RemoveHtml($this->LMP->caption());

			// Procedure
			$this->Procedure->EditAttrs["class"] = "form-control";
			$this->Procedure->EditCustomAttributes = "";
			$this->Procedure->EditValue = HtmlEncode($this->Procedure->CurrentValue);
			$this->Procedure->PlaceHolder = RemoveHtml($this->Procedure->caption());

			// ProcedureDateTime
			$this->ProcedureDateTime->EditAttrs["class"] = "form-control";
			$this->ProcedureDateTime->EditCustomAttributes = "";
			$this->ProcedureDateTime->EditValue = HtmlEncode(FormatDateTime($this->ProcedureDateTime->CurrentValue, 8));
			$this->ProcedureDateTime->PlaceHolder = RemoveHtml($this->ProcedureDateTime->caption());

			// ICSIDate
			$this->ICSIDate->EditAttrs["class"] = "form-control";
			$this->ICSIDate->EditCustomAttributes = "";
			$this->ICSIDate->EditValue = HtmlEncode(FormatDateTime($this->ICSIDate->CurrentValue, 8));
			$this->ICSIDate->PlaceHolder = RemoveHtml($this->ICSIDate->caption());

			// RIDNo
			$this->RIDNo->EditAttrs["class"] = "form-control";
			$this->RIDNo->EditCustomAttributes = "";
			$this->RIDNo->EditValue = HtmlEncode($this->RIDNo->CurrentValue);
			$this->RIDNo->PlaceHolder = RemoveHtml($this->RIDNo->caption());

			// Add refer script
			// Reception

			$this->Reception->LinkCustomAttributes = "";
			$this->Reception->HrefValue = "";

			// PatientId
			$this->PatientId->LinkCustomAttributes = "";
			$this->PatientId->HrefValue = "";

			// mrnno
			$this->mrnno->LinkCustomAttributes = "";
			$this->mrnno->HrefValue = "";

			// PatientName
			$this->PatientName->LinkCustomAttributes = "";
			$this->PatientName->HrefValue = "";

			// Telephone
			$this->Telephone->LinkCustomAttributes = "";
			$this->Telephone->HrefValue = "";

			// Age
			$this->Age->LinkCustomAttributes = "";
			$this->Age->HrefValue = "";

			// Gender
			$this->Gender->LinkCustomAttributes = "";
			$this->Gender->HrefValue = "";

			// profilePic
			$this->profilePic->LinkCustomAttributes = "";
			$this->profilePic->HrefValue = "";

			// procedurenotes
			$this->procedurenotes->LinkCustomAttributes = "";
			$this->procedurenotes->HrefValue = "";

			// NextReviewDate
			$this->NextReviewDate->LinkCustomAttributes = "";
			$this->NextReviewDate->HrefValue = "";

			// ICSIAdvised
			$this->ICSIAdvised->LinkCustomAttributes = "";
			$this->ICSIAdvised->HrefValue = "";

			// DeliveryRegistered
			$this->DeliveryRegistered->LinkCustomAttributes = "";
			$this->DeliveryRegistered->HrefValue = "";

			// EDD
			$this->EDD->LinkCustomAttributes = "";
			$this->EDD->HrefValue = "";

			// SerologyPositive
			$this->SerologyPositive->LinkCustomAttributes = "";
			$this->SerologyPositive->HrefValue = "";

			// Allergy
			$this->Allergy->LinkCustomAttributes = "";
			$this->Allergy->HrefValue = "";

			// status
			$this->status->LinkCustomAttributes = "";
			$this->status->HrefValue = "";

			// createdby
			$this->createdby->LinkCustomAttributes = "";
			$this->createdby->HrefValue = "";

			// createddatetime
			$this->createddatetime->LinkCustomAttributes = "";
			$this->createddatetime->HrefValue = "";

			// LMP
			$this->LMP->LinkCustomAttributes = "";
			$this->LMP->HrefValue = "";

			// Procedure
			$this->Procedure->LinkCustomAttributes = "";
			$this->Procedure->HrefValue = "";

			// ProcedureDateTime
			$this->ProcedureDateTime->LinkCustomAttributes = "";
			$this->ProcedureDateTime->HrefValue = "";

			// ICSIDate
			$this->ICSIDate->LinkCustomAttributes = "";
			$this->ICSIDate->HrefValue = "";

			// RIDNo
			$this->RIDNo->LinkCustomAttributes = "";
			$this->RIDNo->HrefValue = "";
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
		if ($this->Telephone->Required) {
			if (!$this->Telephone->IsDetailKey && $this->Telephone->FormValue != NULL && $this->Telephone->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Telephone->caption(), $this->Telephone->RequiredErrorMessage));
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
		if ($this->procedurenotes->Required) {
			if (!$this->procedurenotes->IsDetailKey && $this->procedurenotes->FormValue != NULL && $this->procedurenotes->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->procedurenotes->caption(), $this->procedurenotes->RequiredErrorMessage));
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
		if ($this->ICSIAdvised->Required) {
			if ($this->ICSIAdvised->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->ICSIAdvised->caption(), $this->ICSIAdvised->RequiredErrorMessage));
			}
		}
		if ($this->DeliveryRegistered->Required) {
			if ($this->DeliveryRegistered->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->DeliveryRegistered->caption(), $this->DeliveryRegistered->RequiredErrorMessage));
			}
		}
		if ($this->EDD->Required) {
			if (!$this->EDD->IsDetailKey && $this->EDD->FormValue != NULL && $this->EDD->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->EDD->caption(), $this->EDD->RequiredErrorMessage));
			}
		}
		if (!CheckDate($this->EDD->FormValue)) {
			AddMessage($FormError, $this->EDD->errorMessage());
		}
		if ($this->SerologyPositive->Required) {
			if ($this->SerologyPositive->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->SerologyPositive->caption(), $this->SerologyPositive->RequiredErrorMessage));
			}
		}
		if ($this->Allergy->Required) {
			if (!$this->Allergy->IsDetailKey && $this->Allergy->FormValue != NULL && $this->Allergy->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Allergy->caption(), $this->Allergy->RequiredErrorMessage));
			}
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
		if ($this->LMP->Required) {
			if (!$this->LMP->IsDetailKey && $this->LMP->FormValue != NULL && $this->LMP->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->LMP->caption(), $this->LMP->RequiredErrorMessage));
			}
		}
		if (!CheckDate($this->LMP->FormValue)) {
			AddMessage($FormError, $this->LMP->errorMessage());
		}
		if ($this->Procedure->Required) {
			if (!$this->Procedure->IsDetailKey && $this->Procedure->FormValue != NULL && $this->Procedure->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Procedure->caption(), $this->Procedure->RequiredErrorMessage));
			}
		}
		if ($this->ProcedureDateTime->Required) {
			if (!$this->ProcedureDateTime->IsDetailKey && $this->ProcedureDateTime->FormValue != NULL && $this->ProcedureDateTime->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->ProcedureDateTime->caption(), $this->ProcedureDateTime->RequiredErrorMessage));
			}
		}
		if (!CheckDate($this->ProcedureDateTime->FormValue)) {
			AddMessage($FormError, $this->ProcedureDateTime->errorMessage());
		}
		if ($this->ICSIDate->Required) {
			if (!$this->ICSIDate->IsDetailKey && $this->ICSIDate->FormValue != NULL && $this->ICSIDate->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->ICSIDate->caption(), $this->ICSIDate->RequiredErrorMessage));
			}
		}
		if (!CheckDate($this->ICSIDate->FormValue)) {
			AddMessage($FormError, $this->ICSIDate->errorMessage());
		}
		if ($this->RIDNo->Required) {
			if (!$this->RIDNo->IsDetailKey && $this->RIDNo->FormValue != NULL && $this->RIDNo->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->RIDNo->caption(), $this->RIDNo->RequiredErrorMessage));
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

		// Reception
		$this->Reception->setDbValueDef($rsnew, $this->Reception->CurrentValue, NULL, FALSE);

		// PatientId
		$this->PatientId->setDbValueDef($rsnew, $this->PatientId->CurrentValue, 0, FALSE);

		// mrnno
		$this->mrnno->setDbValueDef($rsnew, $this->mrnno->CurrentValue, NULL, FALSE);

		// PatientName
		$this->PatientName->setDbValueDef($rsnew, $this->PatientName->CurrentValue, "", FALSE);

		// Telephone
		$this->Telephone->setDbValueDef($rsnew, $this->Telephone->CurrentValue, NULL, FALSE);

		// Age
		$this->Age->setDbValueDef($rsnew, $this->Age->CurrentValue, NULL, FALSE);

		// Gender
		$this->Gender->setDbValueDef($rsnew, $this->Gender->CurrentValue, "", FALSE);

		// profilePic
		$this->profilePic->setDbValueDef($rsnew, $this->profilePic->CurrentValue, NULL, FALSE);

		// procedurenotes
		$this->procedurenotes->setDbValueDef($rsnew, $this->procedurenotes->CurrentValue, NULL, FALSE);

		// NextReviewDate
		$this->NextReviewDate->setDbValueDef($rsnew, UnFormatDateTime($this->NextReviewDate->CurrentValue, 0), NULL, FALSE);

		// ICSIAdvised
		$this->ICSIAdvised->setDbValueDef($rsnew, $this->ICSIAdvised->CurrentValue, NULL, FALSE);

		// DeliveryRegistered
		$this->DeliveryRegistered->setDbValueDef($rsnew, $this->DeliveryRegistered->CurrentValue, NULL, FALSE);

		// EDD
		$this->EDD->setDbValueDef($rsnew, UnFormatDateTime($this->EDD->CurrentValue, 0), NULL, FALSE);

		// SerologyPositive
		$this->SerologyPositive->setDbValueDef($rsnew, $this->SerologyPositive->CurrentValue, NULL, FALSE);

		// Allergy
		$this->Allergy->setDbValueDef($rsnew, $this->Allergy->CurrentValue, NULL, FALSE);

		// status
		$this->status->setDbValueDef($rsnew, $this->status->CurrentValue, 0, FALSE);

		// createdby
		$this->createdby->setDbValueDef($rsnew, CurrentUserName(), NULL);
		$rsnew['createdby'] = &$this->createdby->DbValue;

		// createddatetime
		$this->createddatetime->setDbValueDef($rsnew, CurrentDateTime(), NULL);
		$rsnew['createddatetime'] = &$this->createddatetime->DbValue;

		// LMP
		$this->LMP->setDbValueDef($rsnew, UnFormatDateTime($this->LMP->CurrentValue, 0), NULL, FALSE);

		// Procedure
		$this->Procedure->setDbValueDef($rsnew, $this->Procedure->CurrentValue, NULL, FALSE);

		// ProcedureDateTime
		$this->ProcedureDateTime->setDbValueDef($rsnew, UnFormatDateTime($this->ProcedureDateTime->CurrentValue, 0), NULL, FALSE);

		// ICSIDate
		$this->ICSIDate->setDbValueDef($rsnew, UnFormatDateTime($this->ICSIDate->CurrentValue, 0), NULL, FALSE);

		// RIDNo
		$this->RIDNo->setDbValueDef($rsnew, $this->RIDNo->CurrentValue, "", FALSE);

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
		$Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("view_opd_follow_uplist.php"), "", $this->TableVar, TRUE);
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
						case "x_Allergy":
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
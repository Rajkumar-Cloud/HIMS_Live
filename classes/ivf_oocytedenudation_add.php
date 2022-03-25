<?php
namespace PHPMaker2019\HIMS;

/**
 * Page class
 */
class ivf_oocytedenudation_add extends ivf_oocytedenudation
{

	// Page ID
	public $PageID = "add";

	// Project ID
	public $ProjectID = "{EA4F6D13-AF8F-428D-9EA7-BA88D1107EC3}";

	// Table name
	public $TableName = 'ivf_oocytedenudation';

	// Page object name
	public $PageObjName = "ivf_oocytedenudation_add";

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

		// Table object (ivf_oocytedenudation)
		if (!isset($GLOBALS["ivf_oocytedenudation"]) || get_class($GLOBALS["ivf_oocytedenudation"]) == PROJECT_NAMESPACE . "ivf_oocytedenudation") {
			$GLOBALS["ivf_oocytedenudation"] = &$this;
			$GLOBALS["Table"] = &$GLOBALS["ivf_oocytedenudation"];
		}
		$this->CancelUrl = $this->pageUrl() . "action=cancel";

		// Table object (user_login)
		if (!isset($GLOBALS['user_login']))
			$GLOBALS['user_login'] = new user_login();

		// Table object (view_ivf_treatment)
		if (!isset($GLOBALS['view_ivf_treatment']))
			$GLOBALS['view_ivf_treatment'] = new view_ivf_treatment();

		// Page ID
		if (!defined(PROJECT_NAMESPACE . "PAGE_ID"))
			define(PROJECT_NAMESPACE . "PAGE_ID", 'add');

		// Table name (for backward compatibility)
		if (!defined(PROJECT_NAMESPACE . "TABLE_NAME"))
			define(PROJECT_NAMESPACE . "TABLE_NAME", 'ivf_oocytedenudation');

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
		global $EXPORT, $ivf_oocytedenudation;
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
				$doc = new $class($ivf_oocytedenudation);
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
					if ($pageName == "ivf_oocytedenudationview.php")
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
					$this->terminate(GetUrl("ivf_oocytedenudationlist.php"));
				else
					$this->terminate(GetUrl("login.php"));
				return;
			}
		}

		// Create form object
		$CurrentForm = new HttpForm();
		$this->CurrentAction = Param("action"); // Set up current action
		$this->id->Visible = FALSE;
		$this->RIDNo->setVisibility();
		$this->Name->setVisibility();
		$this->ResultDate->setVisibility();
		$this->Surgeon->setVisibility();
		$this->AsstSurgeon->setVisibility();
		$this->Anaesthetist->setVisibility();
		$this->AnaestheiaType->setVisibility();
		$this->PrimaryEmbryologist->setVisibility();
		$this->SecondaryEmbryologist->setVisibility();
		$this->OPUNotes->setVisibility();
		$this->NoOfFolliclesRight->setVisibility();
		$this->NoOfFolliclesLeft->setVisibility();
		$this->NoOfOocytes->setVisibility();
		$this->RecordOocyteDenudation->setVisibility();
		$this->DateOfDenudation->setVisibility();
		$this->DenudationDoneBy->setVisibility();
		$this->status->setVisibility();
		$this->createdby->setVisibility();
		$this->createddatetime->setVisibility();
		$this->modifiedby->setVisibility();
		$this->modifieddatetime->setVisibility();
		$this->TidNo->setVisibility();
		$this->ExpFollicles->setVisibility();
		$this->SecondaryDenudationDoneBy->setVisibility();
		$this->patient2->setVisibility();
		$this->OocytesDonate1->setVisibility();
		$this->OocytesDonate2->setVisibility();
		$this->ETDonate->setVisibility();
		$this->OocyteOrgin->setVisibility();
		$this->patient1->setVisibility();
		$this->OocyteType->setVisibility();
		$this->MIOocytesDonate1->setVisibility();
		$this->MIOocytesDonate2->setVisibility();
		$this->SelfMI->setVisibility();
		$this->SelfMII->setVisibility();
		$this->patient3->setVisibility();
		$this->patient4->setVisibility();
		$this->OocytesDonate3->setVisibility();
		$this->OocytesDonate4->setVisibility();
		$this->MIOocytesDonate3->setVisibility();
		$this->MIOocytesDonate4->setVisibility();
		$this->SelfOocytesMI->setVisibility();
		$this->SelfOocytesMII->setVisibility();
		$this->donor->setVisibility();
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
		$this->setupLookupOptions($this->patient2);
		$this->setupLookupOptions($this->patient1);
		$this->setupLookupOptions($this->patient3);
		$this->setupLookupOptions($this->patient4);

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
					$this->terminate("ivf_oocytedenudationlist.php"); // No matching record, return to list
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
					if (GetPageName($returnUrl) == "ivf_oocytedenudationlist.php")
						$returnUrl = $this->addMasterUrl($returnUrl); // List page, return to List page with correct master key if necessary
					elseif (GetPageName($returnUrl) == "ivf_oocytedenudationview.php")
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
	}

	// Load default values
	protected function loadDefaultValues()
	{
		$this->id->CurrentValue = NULL;
		$this->id->OldValue = $this->id->CurrentValue;
		$this->RIDNo->CurrentValue = NULL;
		$this->RIDNo->OldValue = $this->RIDNo->CurrentValue;
		$this->Name->CurrentValue = NULL;
		$this->Name->OldValue = $this->Name->CurrentValue;
		$this->ResultDate->CurrentValue = NULL;
		$this->ResultDate->OldValue = $this->ResultDate->CurrentValue;
		$this->Surgeon->CurrentValue = NULL;
		$this->Surgeon->OldValue = $this->Surgeon->CurrentValue;
		$this->AsstSurgeon->CurrentValue = NULL;
		$this->AsstSurgeon->OldValue = $this->AsstSurgeon->CurrentValue;
		$this->Anaesthetist->CurrentValue = NULL;
		$this->Anaesthetist->OldValue = $this->Anaesthetist->CurrentValue;
		$this->AnaestheiaType->CurrentValue = NULL;
		$this->AnaestheiaType->OldValue = $this->AnaestheiaType->CurrentValue;
		$this->PrimaryEmbryologist->CurrentValue = NULL;
		$this->PrimaryEmbryologist->OldValue = $this->PrimaryEmbryologist->CurrentValue;
		$this->SecondaryEmbryologist->CurrentValue = NULL;
		$this->SecondaryEmbryologist->OldValue = $this->SecondaryEmbryologist->CurrentValue;
		$this->OPUNotes->CurrentValue = NULL;
		$this->OPUNotes->OldValue = $this->OPUNotes->CurrentValue;
		$this->NoOfFolliclesRight->CurrentValue = NULL;
		$this->NoOfFolliclesRight->OldValue = $this->NoOfFolliclesRight->CurrentValue;
		$this->NoOfFolliclesLeft->CurrentValue = NULL;
		$this->NoOfFolliclesLeft->OldValue = $this->NoOfFolliclesLeft->CurrentValue;
		$this->NoOfOocytes->CurrentValue = NULL;
		$this->NoOfOocytes->OldValue = $this->NoOfOocytes->CurrentValue;
		$this->RecordOocyteDenudation->CurrentValue = NULL;
		$this->RecordOocyteDenudation->OldValue = $this->RecordOocyteDenudation->CurrentValue;
		$this->DateOfDenudation->CurrentValue = NULL;
		$this->DateOfDenudation->OldValue = $this->DateOfDenudation->CurrentValue;
		$this->DenudationDoneBy->CurrentValue = NULL;
		$this->DenudationDoneBy->OldValue = $this->DenudationDoneBy->CurrentValue;
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
		$this->TidNo->CurrentValue = NULL;
		$this->TidNo->OldValue = $this->TidNo->CurrentValue;
		$this->ExpFollicles->CurrentValue = NULL;
		$this->ExpFollicles->OldValue = $this->ExpFollicles->CurrentValue;
		$this->SecondaryDenudationDoneBy->CurrentValue = NULL;
		$this->SecondaryDenudationDoneBy->OldValue = $this->SecondaryDenudationDoneBy->CurrentValue;
		$this->patient2->CurrentValue = NULL;
		$this->patient2->OldValue = $this->patient2->CurrentValue;
		$this->OocytesDonate1->CurrentValue = NULL;
		$this->OocytesDonate1->OldValue = $this->OocytesDonate1->CurrentValue;
		$this->OocytesDonate2->CurrentValue = NULL;
		$this->OocytesDonate2->OldValue = $this->OocytesDonate2->CurrentValue;
		$this->ETDonate->CurrentValue = NULL;
		$this->ETDonate->OldValue = $this->ETDonate->CurrentValue;
		$this->OocyteOrgin->CurrentValue = NULL;
		$this->OocyteOrgin->OldValue = $this->OocyteOrgin->CurrentValue;
		$this->patient1->CurrentValue = NULL;
		$this->patient1->OldValue = $this->patient1->CurrentValue;
		$this->OocyteType->CurrentValue = NULL;
		$this->OocyteType->OldValue = $this->OocyteType->CurrentValue;
		$this->MIOocytesDonate1->CurrentValue = NULL;
		$this->MIOocytesDonate1->OldValue = $this->MIOocytesDonate1->CurrentValue;
		$this->MIOocytesDonate2->CurrentValue = NULL;
		$this->MIOocytesDonate2->OldValue = $this->MIOocytesDonate2->CurrentValue;
		$this->SelfMI->CurrentValue = NULL;
		$this->SelfMI->OldValue = $this->SelfMI->CurrentValue;
		$this->SelfMII->CurrentValue = NULL;
		$this->SelfMII->OldValue = $this->SelfMII->CurrentValue;
		$this->patient3->CurrentValue = NULL;
		$this->patient3->OldValue = $this->patient3->CurrentValue;
		$this->patient4->CurrentValue = NULL;
		$this->patient4->OldValue = $this->patient4->CurrentValue;
		$this->OocytesDonate3->CurrentValue = NULL;
		$this->OocytesDonate3->OldValue = $this->OocytesDonate3->CurrentValue;
		$this->OocytesDonate4->CurrentValue = NULL;
		$this->OocytesDonate4->OldValue = $this->OocytesDonate4->CurrentValue;
		$this->MIOocytesDonate3->CurrentValue = NULL;
		$this->MIOocytesDonate3->OldValue = $this->MIOocytesDonate3->CurrentValue;
		$this->MIOocytesDonate4->CurrentValue = NULL;
		$this->MIOocytesDonate4->OldValue = $this->MIOocytesDonate4->CurrentValue;
		$this->SelfOocytesMI->CurrentValue = NULL;
		$this->SelfOocytesMI->OldValue = $this->SelfOocytesMI->CurrentValue;
		$this->SelfOocytesMII->CurrentValue = NULL;
		$this->SelfOocytesMII->OldValue = $this->SelfOocytesMII->CurrentValue;
		$this->donor->CurrentValue = NULL;
		$this->donor->OldValue = $this->donor->CurrentValue;
	}

	// Load form values
	protected function loadFormValues()
	{

		// Load from form
		global $CurrentForm;

		// Check field name 'RIDNo' first before field var 'x_RIDNo'
		$val = $CurrentForm->hasValue("RIDNo") ? $CurrentForm->getValue("RIDNo") : $CurrentForm->getValue("x_RIDNo");
		if (!$this->RIDNo->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->RIDNo->Visible = FALSE; // Disable update for API request
			else
				$this->RIDNo->setFormValue($val);
		}

		// Check field name 'Name' first before field var 'x_Name'
		$val = $CurrentForm->hasValue("Name") ? $CurrentForm->getValue("Name") : $CurrentForm->getValue("x_Name");
		if (!$this->Name->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Name->Visible = FALSE; // Disable update for API request
			else
				$this->Name->setFormValue($val);
		}

		// Check field name 'ResultDate' first before field var 'x_ResultDate'
		$val = $CurrentForm->hasValue("ResultDate") ? $CurrentForm->getValue("ResultDate") : $CurrentForm->getValue("x_ResultDate");
		if (!$this->ResultDate->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->ResultDate->Visible = FALSE; // Disable update for API request
			else
				$this->ResultDate->setFormValue($val);
			$this->ResultDate->CurrentValue = UnFormatDateTime($this->ResultDate->CurrentValue, 11);
		}

		// Check field name 'Surgeon' first before field var 'x_Surgeon'
		$val = $CurrentForm->hasValue("Surgeon") ? $CurrentForm->getValue("Surgeon") : $CurrentForm->getValue("x_Surgeon");
		if (!$this->Surgeon->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Surgeon->Visible = FALSE; // Disable update for API request
			else
				$this->Surgeon->setFormValue($val);
		}

		// Check field name 'AsstSurgeon' first before field var 'x_AsstSurgeon'
		$val = $CurrentForm->hasValue("AsstSurgeon") ? $CurrentForm->getValue("AsstSurgeon") : $CurrentForm->getValue("x_AsstSurgeon");
		if (!$this->AsstSurgeon->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->AsstSurgeon->Visible = FALSE; // Disable update for API request
			else
				$this->AsstSurgeon->setFormValue($val);
		}

		// Check field name 'Anaesthetist' first before field var 'x_Anaesthetist'
		$val = $CurrentForm->hasValue("Anaesthetist") ? $CurrentForm->getValue("Anaesthetist") : $CurrentForm->getValue("x_Anaesthetist");
		if (!$this->Anaesthetist->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Anaesthetist->Visible = FALSE; // Disable update for API request
			else
				$this->Anaesthetist->setFormValue($val);
		}

		// Check field name 'AnaestheiaType' first before field var 'x_AnaestheiaType'
		$val = $CurrentForm->hasValue("AnaestheiaType") ? $CurrentForm->getValue("AnaestheiaType") : $CurrentForm->getValue("x_AnaestheiaType");
		if (!$this->AnaestheiaType->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->AnaestheiaType->Visible = FALSE; // Disable update for API request
			else
				$this->AnaestheiaType->setFormValue($val);
		}

		// Check field name 'PrimaryEmbryologist' first before field var 'x_PrimaryEmbryologist'
		$val = $CurrentForm->hasValue("PrimaryEmbryologist") ? $CurrentForm->getValue("PrimaryEmbryologist") : $CurrentForm->getValue("x_PrimaryEmbryologist");
		if (!$this->PrimaryEmbryologist->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->PrimaryEmbryologist->Visible = FALSE; // Disable update for API request
			else
				$this->PrimaryEmbryologist->setFormValue($val);
		}

		// Check field name 'SecondaryEmbryologist' first before field var 'x_SecondaryEmbryologist'
		$val = $CurrentForm->hasValue("SecondaryEmbryologist") ? $CurrentForm->getValue("SecondaryEmbryologist") : $CurrentForm->getValue("x_SecondaryEmbryologist");
		if (!$this->SecondaryEmbryologist->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->SecondaryEmbryologist->Visible = FALSE; // Disable update for API request
			else
				$this->SecondaryEmbryologist->setFormValue($val);
		}

		// Check field name 'OPUNotes' first before field var 'x_OPUNotes'
		$val = $CurrentForm->hasValue("OPUNotes") ? $CurrentForm->getValue("OPUNotes") : $CurrentForm->getValue("x_OPUNotes");
		if (!$this->OPUNotes->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->OPUNotes->Visible = FALSE; // Disable update for API request
			else
				$this->OPUNotes->setFormValue($val);
		}

		// Check field name 'NoOfFolliclesRight' first before field var 'x_NoOfFolliclesRight'
		$val = $CurrentForm->hasValue("NoOfFolliclesRight") ? $CurrentForm->getValue("NoOfFolliclesRight") : $CurrentForm->getValue("x_NoOfFolliclesRight");
		if (!$this->NoOfFolliclesRight->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->NoOfFolliclesRight->Visible = FALSE; // Disable update for API request
			else
				$this->NoOfFolliclesRight->setFormValue($val);
		}

		// Check field name 'NoOfFolliclesLeft' first before field var 'x_NoOfFolliclesLeft'
		$val = $CurrentForm->hasValue("NoOfFolliclesLeft") ? $CurrentForm->getValue("NoOfFolliclesLeft") : $CurrentForm->getValue("x_NoOfFolliclesLeft");
		if (!$this->NoOfFolliclesLeft->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->NoOfFolliclesLeft->Visible = FALSE; // Disable update for API request
			else
				$this->NoOfFolliclesLeft->setFormValue($val);
		}

		// Check field name 'NoOfOocytes' first before field var 'x_NoOfOocytes'
		$val = $CurrentForm->hasValue("NoOfOocytes") ? $CurrentForm->getValue("NoOfOocytes") : $CurrentForm->getValue("x_NoOfOocytes");
		if (!$this->NoOfOocytes->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->NoOfOocytes->Visible = FALSE; // Disable update for API request
			else
				$this->NoOfOocytes->setFormValue($val);
		}

		// Check field name 'RecordOocyteDenudation' first before field var 'x_RecordOocyteDenudation'
		$val = $CurrentForm->hasValue("RecordOocyteDenudation") ? $CurrentForm->getValue("RecordOocyteDenudation") : $CurrentForm->getValue("x_RecordOocyteDenudation");
		if (!$this->RecordOocyteDenudation->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->RecordOocyteDenudation->Visible = FALSE; // Disable update for API request
			else
				$this->RecordOocyteDenudation->setFormValue($val);
		}

		// Check field name 'DateOfDenudation' first before field var 'x_DateOfDenudation'
		$val = $CurrentForm->hasValue("DateOfDenudation") ? $CurrentForm->getValue("DateOfDenudation") : $CurrentForm->getValue("x_DateOfDenudation");
		if (!$this->DateOfDenudation->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->DateOfDenudation->Visible = FALSE; // Disable update for API request
			else
				$this->DateOfDenudation->setFormValue($val);
			$this->DateOfDenudation->CurrentValue = UnFormatDateTime($this->DateOfDenudation->CurrentValue, 11);
		}

		// Check field name 'DenudationDoneBy' first before field var 'x_DenudationDoneBy'
		$val = $CurrentForm->hasValue("DenudationDoneBy") ? $CurrentForm->getValue("DenudationDoneBy") : $CurrentForm->getValue("x_DenudationDoneBy");
		if (!$this->DenudationDoneBy->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->DenudationDoneBy->Visible = FALSE; // Disable update for API request
			else
				$this->DenudationDoneBy->setFormValue($val);
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

		// Check field name 'TidNo' first before field var 'x_TidNo'
		$val = $CurrentForm->hasValue("TidNo") ? $CurrentForm->getValue("TidNo") : $CurrentForm->getValue("x_TidNo");
		if (!$this->TidNo->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->TidNo->Visible = FALSE; // Disable update for API request
			else
				$this->TidNo->setFormValue($val);
		}

		// Check field name 'ExpFollicles' first before field var 'x_ExpFollicles'
		$val = $CurrentForm->hasValue("ExpFollicles") ? $CurrentForm->getValue("ExpFollicles") : $CurrentForm->getValue("x_ExpFollicles");
		if (!$this->ExpFollicles->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->ExpFollicles->Visible = FALSE; // Disable update for API request
			else
				$this->ExpFollicles->setFormValue($val);
		}

		// Check field name 'SecondaryDenudationDoneBy' first before field var 'x_SecondaryDenudationDoneBy'
		$val = $CurrentForm->hasValue("SecondaryDenudationDoneBy") ? $CurrentForm->getValue("SecondaryDenudationDoneBy") : $CurrentForm->getValue("x_SecondaryDenudationDoneBy");
		if (!$this->SecondaryDenudationDoneBy->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->SecondaryDenudationDoneBy->Visible = FALSE; // Disable update for API request
			else
				$this->SecondaryDenudationDoneBy->setFormValue($val);
		}

		// Check field name 'patient2' first before field var 'x_patient2'
		$val = $CurrentForm->hasValue("patient2") ? $CurrentForm->getValue("patient2") : $CurrentForm->getValue("x_patient2");
		if (!$this->patient2->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->patient2->Visible = FALSE; // Disable update for API request
			else
				$this->patient2->setFormValue($val);
		}

		// Check field name 'OocytesDonate1' first before field var 'x_OocytesDonate1'
		$val = $CurrentForm->hasValue("OocytesDonate1") ? $CurrentForm->getValue("OocytesDonate1") : $CurrentForm->getValue("x_OocytesDonate1");
		if (!$this->OocytesDonate1->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->OocytesDonate1->Visible = FALSE; // Disable update for API request
			else
				$this->OocytesDonate1->setFormValue($val);
		}

		// Check field name 'OocytesDonate2' first before field var 'x_OocytesDonate2'
		$val = $CurrentForm->hasValue("OocytesDonate2") ? $CurrentForm->getValue("OocytesDonate2") : $CurrentForm->getValue("x_OocytesDonate2");
		if (!$this->OocytesDonate2->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->OocytesDonate2->Visible = FALSE; // Disable update for API request
			else
				$this->OocytesDonate2->setFormValue($val);
		}

		// Check field name 'ETDonate' first before field var 'x_ETDonate'
		$val = $CurrentForm->hasValue("ETDonate") ? $CurrentForm->getValue("ETDonate") : $CurrentForm->getValue("x_ETDonate");
		if (!$this->ETDonate->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->ETDonate->Visible = FALSE; // Disable update for API request
			else
				$this->ETDonate->setFormValue($val);
		}

		// Check field name 'OocyteOrgin' first before field var 'x_OocyteOrgin'
		$val = $CurrentForm->hasValue("OocyteOrgin") ? $CurrentForm->getValue("OocyteOrgin") : $CurrentForm->getValue("x_OocyteOrgin");
		if (!$this->OocyteOrgin->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->OocyteOrgin->Visible = FALSE; // Disable update for API request
			else
				$this->OocyteOrgin->setFormValue($val);
		}

		// Check field name 'patient1' first before field var 'x_patient1'
		$val = $CurrentForm->hasValue("patient1") ? $CurrentForm->getValue("patient1") : $CurrentForm->getValue("x_patient1");
		if (!$this->patient1->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->patient1->Visible = FALSE; // Disable update for API request
			else
				$this->patient1->setFormValue($val);
		}

		// Check field name 'OocyteType' first before field var 'x_OocyteType'
		$val = $CurrentForm->hasValue("OocyteType") ? $CurrentForm->getValue("OocyteType") : $CurrentForm->getValue("x_OocyteType");
		if (!$this->OocyteType->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->OocyteType->Visible = FALSE; // Disable update for API request
			else
				$this->OocyteType->setFormValue($val);
		}

		// Check field name 'MIOocytesDonate1' first before field var 'x_MIOocytesDonate1'
		$val = $CurrentForm->hasValue("MIOocytesDonate1") ? $CurrentForm->getValue("MIOocytesDonate1") : $CurrentForm->getValue("x_MIOocytesDonate1");
		if (!$this->MIOocytesDonate1->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->MIOocytesDonate1->Visible = FALSE; // Disable update for API request
			else
				$this->MIOocytesDonate1->setFormValue($val);
		}

		// Check field name 'MIOocytesDonate2' first before field var 'x_MIOocytesDonate2'
		$val = $CurrentForm->hasValue("MIOocytesDonate2") ? $CurrentForm->getValue("MIOocytesDonate2") : $CurrentForm->getValue("x_MIOocytesDonate2");
		if (!$this->MIOocytesDonate2->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->MIOocytesDonate2->Visible = FALSE; // Disable update for API request
			else
				$this->MIOocytesDonate2->setFormValue($val);
		}

		// Check field name 'SelfMI' first before field var 'x_SelfMI'
		$val = $CurrentForm->hasValue("SelfMI") ? $CurrentForm->getValue("SelfMI") : $CurrentForm->getValue("x_SelfMI");
		if (!$this->SelfMI->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->SelfMI->Visible = FALSE; // Disable update for API request
			else
				$this->SelfMI->setFormValue($val);
		}

		// Check field name 'SelfMII' first before field var 'x_SelfMII'
		$val = $CurrentForm->hasValue("SelfMII") ? $CurrentForm->getValue("SelfMII") : $CurrentForm->getValue("x_SelfMII");
		if (!$this->SelfMII->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->SelfMII->Visible = FALSE; // Disable update for API request
			else
				$this->SelfMII->setFormValue($val);
		}

		// Check field name 'patient3' first before field var 'x_patient3'
		$val = $CurrentForm->hasValue("patient3") ? $CurrentForm->getValue("patient3") : $CurrentForm->getValue("x_patient3");
		if (!$this->patient3->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->patient3->Visible = FALSE; // Disable update for API request
			else
				$this->patient3->setFormValue($val);
		}

		// Check field name 'patient4' first before field var 'x_patient4'
		$val = $CurrentForm->hasValue("patient4") ? $CurrentForm->getValue("patient4") : $CurrentForm->getValue("x_patient4");
		if (!$this->patient4->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->patient4->Visible = FALSE; // Disable update for API request
			else
				$this->patient4->setFormValue($val);
		}

		// Check field name 'OocytesDonate3' first before field var 'x_OocytesDonate3'
		$val = $CurrentForm->hasValue("OocytesDonate3") ? $CurrentForm->getValue("OocytesDonate3") : $CurrentForm->getValue("x_OocytesDonate3");
		if (!$this->OocytesDonate3->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->OocytesDonate3->Visible = FALSE; // Disable update for API request
			else
				$this->OocytesDonate3->setFormValue($val);
		}

		// Check field name 'OocytesDonate4' first before field var 'x_OocytesDonate4'
		$val = $CurrentForm->hasValue("OocytesDonate4") ? $CurrentForm->getValue("OocytesDonate4") : $CurrentForm->getValue("x_OocytesDonate4");
		if (!$this->OocytesDonate4->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->OocytesDonate4->Visible = FALSE; // Disable update for API request
			else
				$this->OocytesDonate4->setFormValue($val);
		}

		// Check field name 'MIOocytesDonate3' first before field var 'x_MIOocytesDonate3'
		$val = $CurrentForm->hasValue("MIOocytesDonate3") ? $CurrentForm->getValue("MIOocytesDonate3") : $CurrentForm->getValue("x_MIOocytesDonate3");
		if (!$this->MIOocytesDonate3->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->MIOocytesDonate3->Visible = FALSE; // Disable update for API request
			else
				$this->MIOocytesDonate3->setFormValue($val);
		}

		// Check field name 'MIOocytesDonate4' first before field var 'x_MIOocytesDonate4'
		$val = $CurrentForm->hasValue("MIOocytesDonate4") ? $CurrentForm->getValue("MIOocytesDonate4") : $CurrentForm->getValue("x_MIOocytesDonate4");
		if (!$this->MIOocytesDonate4->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->MIOocytesDonate4->Visible = FALSE; // Disable update for API request
			else
				$this->MIOocytesDonate4->setFormValue($val);
		}

		// Check field name 'SelfOocytesMI' first before field var 'x_SelfOocytesMI'
		$val = $CurrentForm->hasValue("SelfOocytesMI") ? $CurrentForm->getValue("SelfOocytesMI") : $CurrentForm->getValue("x_SelfOocytesMI");
		if (!$this->SelfOocytesMI->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->SelfOocytesMI->Visible = FALSE; // Disable update for API request
			else
				$this->SelfOocytesMI->setFormValue($val);
		}

		// Check field name 'SelfOocytesMII' first before field var 'x_SelfOocytesMII'
		$val = $CurrentForm->hasValue("SelfOocytesMII") ? $CurrentForm->getValue("SelfOocytesMII") : $CurrentForm->getValue("x_SelfOocytesMII");
		if (!$this->SelfOocytesMII->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->SelfOocytesMII->Visible = FALSE; // Disable update for API request
			else
				$this->SelfOocytesMII->setFormValue($val);
		}

		// Check field name 'donor' first before field var 'x_donor'
		$val = $CurrentForm->hasValue("donor") ? $CurrentForm->getValue("donor") : $CurrentForm->getValue("x_donor");
		if (!$this->donor->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->donor->Visible = FALSE; // Disable update for API request
			else
				$this->donor->setFormValue($val);
		}

		// Check field name 'id' first before field var 'x_id'
		$val = $CurrentForm->hasValue("id") ? $CurrentForm->getValue("id") : $CurrentForm->getValue("x_id");
	}

	// Restore form values
	public function restoreFormValues()
	{
		global $CurrentForm;
		$this->RIDNo->CurrentValue = $this->RIDNo->FormValue;
		$this->Name->CurrentValue = $this->Name->FormValue;
		$this->ResultDate->CurrentValue = $this->ResultDate->FormValue;
		$this->ResultDate->CurrentValue = UnFormatDateTime($this->ResultDate->CurrentValue, 11);
		$this->Surgeon->CurrentValue = $this->Surgeon->FormValue;
		$this->AsstSurgeon->CurrentValue = $this->AsstSurgeon->FormValue;
		$this->Anaesthetist->CurrentValue = $this->Anaesthetist->FormValue;
		$this->AnaestheiaType->CurrentValue = $this->AnaestheiaType->FormValue;
		$this->PrimaryEmbryologist->CurrentValue = $this->PrimaryEmbryologist->FormValue;
		$this->SecondaryEmbryologist->CurrentValue = $this->SecondaryEmbryologist->FormValue;
		$this->OPUNotes->CurrentValue = $this->OPUNotes->FormValue;
		$this->NoOfFolliclesRight->CurrentValue = $this->NoOfFolliclesRight->FormValue;
		$this->NoOfFolliclesLeft->CurrentValue = $this->NoOfFolliclesLeft->FormValue;
		$this->NoOfOocytes->CurrentValue = $this->NoOfOocytes->FormValue;
		$this->RecordOocyteDenudation->CurrentValue = $this->RecordOocyteDenudation->FormValue;
		$this->DateOfDenudation->CurrentValue = $this->DateOfDenudation->FormValue;
		$this->DateOfDenudation->CurrentValue = UnFormatDateTime($this->DateOfDenudation->CurrentValue, 11);
		$this->DenudationDoneBy->CurrentValue = $this->DenudationDoneBy->FormValue;
		$this->status->CurrentValue = $this->status->FormValue;
		$this->createdby->CurrentValue = $this->createdby->FormValue;
		$this->createddatetime->CurrentValue = $this->createddatetime->FormValue;
		$this->createddatetime->CurrentValue = UnFormatDateTime($this->createddatetime->CurrentValue, 0);
		$this->modifiedby->CurrentValue = $this->modifiedby->FormValue;
		$this->modifieddatetime->CurrentValue = $this->modifieddatetime->FormValue;
		$this->modifieddatetime->CurrentValue = UnFormatDateTime($this->modifieddatetime->CurrentValue, 0);
		$this->TidNo->CurrentValue = $this->TidNo->FormValue;
		$this->ExpFollicles->CurrentValue = $this->ExpFollicles->FormValue;
		$this->SecondaryDenudationDoneBy->CurrentValue = $this->SecondaryDenudationDoneBy->FormValue;
		$this->patient2->CurrentValue = $this->patient2->FormValue;
		$this->OocytesDonate1->CurrentValue = $this->OocytesDonate1->FormValue;
		$this->OocytesDonate2->CurrentValue = $this->OocytesDonate2->FormValue;
		$this->ETDonate->CurrentValue = $this->ETDonate->FormValue;
		$this->OocyteOrgin->CurrentValue = $this->OocyteOrgin->FormValue;
		$this->patient1->CurrentValue = $this->patient1->FormValue;
		$this->OocyteType->CurrentValue = $this->OocyteType->FormValue;
		$this->MIOocytesDonate1->CurrentValue = $this->MIOocytesDonate1->FormValue;
		$this->MIOocytesDonate2->CurrentValue = $this->MIOocytesDonate2->FormValue;
		$this->SelfMI->CurrentValue = $this->SelfMI->FormValue;
		$this->SelfMII->CurrentValue = $this->SelfMII->FormValue;
		$this->patient3->CurrentValue = $this->patient3->FormValue;
		$this->patient4->CurrentValue = $this->patient4->FormValue;
		$this->OocytesDonate3->CurrentValue = $this->OocytesDonate3->FormValue;
		$this->OocytesDonate4->CurrentValue = $this->OocytesDonate4->FormValue;
		$this->MIOocytesDonate3->CurrentValue = $this->MIOocytesDonate3->FormValue;
		$this->MIOocytesDonate4->CurrentValue = $this->MIOocytesDonate4->FormValue;
		$this->SelfOocytesMI->CurrentValue = $this->SelfOocytesMI->FormValue;
		$this->SelfOocytesMII->CurrentValue = $this->SelfOocytesMII->FormValue;
		$this->donor->CurrentValue = $this->donor->FormValue;
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
		$this->RIDNo->setDbValue($row['RIDNo']);
		$this->Name->setDbValue($row['Name']);
		$this->ResultDate->setDbValue($row['ResultDate']);
		$this->Surgeon->setDbValue($row['Surgeon']);
		$this->AsstSurgeon->setDbValue($row['AsstSurgeon']);
		$this->Anaesthetist->setDbValue($row['Anaesthetist']);
		$this->AnaestheiaType->setDbValue($row['AnaestheiaType']);
		$this->PrimaryEmbryologist->setDbValue($row['PrimaryEmbryologist']);
		$this->SecondaryEmbryologist->setDbValue($row['SecondaryEmbryologist']);
		$this->OPUNotes->setDbValue($row['OPUNotes']);
		$this->NoOfFolliclesRight->setDbValue($row['NoOfFolliclesRight']);
		$this->NoOfFolliclesLeft->setDbValue($row['NoOfFolliclesLeft']);
		$this->NoOfOocytes->setDbValue($row['NoOfOocytes']);
		$this->RecordOocyteDenudation->setDbValue($row['RecordOocyteDenudation']);
		$this->DateOfDenudation->setDbValue($row['DateOfDenudation']);
		$this->DenudationDoneBy->setDbValue($row['DenudationDoneBy']);
		$this->status->setDbValue($row['status']);
		$this->createdby->setDbValue($row['createdby']);
		$this->createddatetime->setDbValue($row['createddatetime']);
		$this->modifiedby->setDbValue($row['modifiedby']);
		$this->modifieddatetime->setDbValue($row['modifieddatetime']);
		$this->TidNo->setDbValue($row['TidNo']);
		$this->ExpFollicles->setDbValue($row['ExpFollicles']);
		$this->SecondaryDenudationDoneBy->setDbValue($row['SecondaryDenudationDoneBy']);
		$this->patient2->setDbValue($row['patient2']);
		$this->OocytesDonate1->setDbValue($row['OocytesDonate1']);
		$this->OocytesDonate2->setDbValue($row['OocytesDonate2']);
		$this->ETDonate->setDbValue($row['ETDonate']);
		$this->OocyteOrgin->setDbValue($row['OocyteOrgin']);
		$this->patient1->setDbValue($row['patient1']);
		$this->OocyteType->setDbValue($row['OocyteType']);
		$this->MIOocytesDonate1->setDbValue($row['MIOocytesDonate1']);
		$this->MIOocytesDonate2->setDbValue($row['MIOocytesDonate2']);
		$this->SelfMI->setDbValue($row['SelfMI']);
		$this->SelfMII->setDbValue($row['SelfMII']);
		$this->patient3->setDbValue($row['patient3']);
		$this->patient4->setDbValue($row['patient4']);
		$this->OocytesDonate3->setDbValue($row['OocytesDonate3']);
		$this->OocytesDonate4->setDbValue($row['OocytesDonate4']);
		$this->MIOocytesDonate3->setDbValue($row['MIOocytesDonate3']);
		$this->MIOocytesDonate4->setDbValue($row['MIOocytesDonate4']);
		$this->SelfOocytesMI->setDbValue($row['SelfOocytesMI']);
		$this->SelfOocytesMII->setDbValue($row['SelfOocytesMII']);
		$this->donor->setDbValue($row['donor']);
	}

	// Return a row with default values
	protected function newRow()
	{
		$this->loadDefaultValues();
		$row = [];
		$row['id'] = $this->id->CurrentValue;
		$row['RIDNo'] = $this->RIDNo->CurrentValue;
		$row['Name'] = $this->Name->CurrentValue;
		$row['ResultDate'] = $this->ResultDate->CurrentValue;
		$row['Surgeon'] = $this->Surgeon->CurrentValue;
		$row['AsstSurgeon'] = $this->AsstSurgeon->CurrentValue;
		$row['Anaesthetist'] = $this->Anaesthetist->CurrentValue;
		$row['AnaestheiaType'] = $this->AnaestheiaType->CurrentValue;
		$row['PrimaryEmbryologist'] = $this->PrimaryEmbryologist->CurrentValue;
		$row['SecondaryEmbryologist'] = $this->SecondaryEmbryologist->CurrentValue;
		$row['OPUNotes'] = $this->OPUNotes->CurrentValue;
		$row['NoOfFolliclesRight'] = $this->NoOfFolliclesRight->CurrentValue;
		$row['NoOfFolliclesLeft'] = $this->NoOfFolliclesLeft->CurrentValue;
		$row['NoOfOocytes'] = $this->NoOfOocytes->CurrentValue;
		$row['RecordOocyteDenudation'] = $this->RecordOocyteDenudation->CurrentValue;
		$row['DateOfDenudation'] = $this->DateOfDenudation->CurrentValue;
		$row['DenudationDoneBy'] = $this->DenudationDoneBy->CurrentValue;
		$row['status'] = $this->status->CurrentValue;
		$row['createdby'] = $this->createdby->CurrentValue;
		$row['createddatetime'] = $this->createddatetime->CurrentValue;
		$row['modifiedby'] = $this->modifiedby->CurrentValue;
		$row['modifieddatetime'] = $this->modifieddatetime->CurrentValue;
		$row['TidNo'] = $this->TidNo->CurrentValue;
		$row['ExpFollicles'] = $this->ExpFollicles->CurrentValue;
		$row['SecondaryDenudationDoneBy'] = $this->SecondaryDenudationDoneBy->CurrentValue;
		$row['patient2'] = $this->patient2->CurrentValue;
		$row['OocytesDonate1'] = $this->OocytesDonate1->CurrentValue;
		$row['OocytesDonate2'] = $this->OocytesDonate2->CurrentValue;
		$row['ETDonate'] = $this->ETDonate->CurrentValue;
		$row['OocyteOrgin'] = $this->OocyteOrgin->CurrentValue;
		$row['patient1'] = $this->patient1->CurrentValue;
		$row['OocyteType'] = $this->OocyteType->CurrentValue;
		$row['MIOocytesDonate1'] = $this->MIOocytesDonate1->CurrentValue;
		$row['MIOocytesDonate2'] = $this->MIOocytesDonate2->CurrentValue;
		$row['SelfMI'] = $this->SelfMI->CurrentValue;
		$row['SelfMII'] = $this->SelfMII->CurrentValue;
		$row['patient3'] = $this->patient3->CurrentValue;
		$row['patient4'] = $this->patient4->CurrentValue;
		$row['OocytesDonate3'] = $this->OocytesDonate3->CurrentValue;
		$row['OocytesDonate4'] = $this->OocytesDonate4->CurrentValue;
		$row['MIOocytesDonate3'] = $this->MIOocytesDonate3->CurrentValue;
		$row['MIOocytesDonate4'] = $this->MIOocytesDonate4->CurrentValue;
		$row['SelfOocytesMI'] = $this->SelfOocytesMI->CurrentValue;
		$row['SelfOocytesMII'] = $this->SelfOocytesMII->CurrentValue;
		$row['donor'] = $this->donor->CurrentValue;
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
		// RIDNo
		// Name
		// ResultDate
		// Surgeon
		// AsstSurgeon
		// Anaesthetist
		// AnaestheiaType
		// PrimaryEmbryologist
		// SecondaryEmbryologist
		// OPUNotes
		// NoOfFolliclesRight
		// NoOfFolliclesLeft
		// NoOfOocytes
		// RecordOocyteDenudation
		// DateOfDenudation
		// DenudationDoneBy
		// status
		// createdby
		// createddatetime
		// modifiedby
		// modifieddatetime
		// TidNo
		// ExpFollicles
		// SecondaryDenudationDoneBy
		// patient2
		// OocytesDonate1
		// OocytesDonate2
		// ETDonate
		// OocyteOrgin
		// patient1
		// OocyteType
		// MIOocytesDonate1
		// MIOocytesDonate2
		// SelfMI
		// SelfMII
		// patient3
		// patient4
		// OocytesDonate3
		// OocytesDonate4
		// MIOocytesDonate3
		// MIOocytesDonate4
		// SelfOocytesMI
		// SelfOocytesMII
		// donor

		if ($this->RowType == ROWTYPE_VIEW) { // View row

			// id
			$this->id->ViewValue = $this->id->CurrentValue;
			$this->id->ViewCustomAttributes = "";

			// RIDNo
			$this->RIDNo->ViewValue = $this->RIDNo->CurrentValue;
			$this->RIDNo->ViewValue = FormatNumber($this->RIDNo->ViewValue, 0, -2, -2, -2);
			$this->RIDNo->ViewCustomAttributes = "";

			// Name
			$this->Name->ViewValue = $this->Name->CurrentValue;
			$this->Name->ViewCustomAttributes = "";

			// ResultDate
			$this->ResultDate->ViewValue = $this->ResultDate->CurrentValue;
			$this->ResultDate->ViewValue = FormatDateTime($this->ResultDate->ViewValue, 11);
			$this->ResultDate->ViewCustomAttributes = "";

			// Surgeon
			$this->Surgeon->ViewValue = $this->Surgeon->CurrentValue;
			$this->Surgeon->ViewCustomAttributes = "";

			// AsstSurgeon
			$this->AsstSurgeon->ViewValue = $this->AsstSurgeon->CurrentValue;
			$this->AsstSurgeon->ViewCustomAttributes = "";

			// Anaesthetist
			$this->Anaesthetist->ViewValue = $this->Anaesthetist->CurrentValue;
			$this->Anaesthetist->ViewCustomAttributes = "";

			// AnaestheiaType
			$this->AnaestheiaType->ViewValue = $this->AnaestheiaType->CurrentValue;
			$this->AnaestheiaType->ViewCustomAttributes = "";

			// PrimaryEmbryologist
			$this->PrimaryEmbryologist->ViewValue = $this->PrimaryEmbryologist->CurrentValue;
			$this->PrimaryEmbryologist->ViewCustomAttributes = "";

			// SecondaryEmbryologist
			$this->SecondaryEmbryologist->ViewValue = $this->SecondaryEmbryologist->CurrentValue;
			$this->SecondaryEmbryologist->ViewCustomAttributes = "";

			// OPUNotes
			$this->OPUNotes->ViewValue = $this->OPUNotes->CurrentValue;
			$this->OPUNotes->ViewCustomAttributes = "";

			// NoOfFolliclesRight
			$this->NoOfFolliclesRight->ViewValue = $this->NoOfFolliclesRight->CurrentValue;
			$this->NoOfFolliclesRight->ViewCustomAttributes = "";

			// NoOfFolliclesLeft
			$this->NoOfFolliclesLeft->ViewValue = $this->NoOfFolliclesLeft->CurrentValue;
			$this->NoOfFolliclesLeft->ViewCustomAttributes = "";

			// NoOfOocytes
			$this->NoOfOocytes->ViewValue = $this->NoOfOocytes->CurrentValue;
			$this->NoOfOocytes->ViewCustomAttributes = "";

			// RecordOocyteDenudation
			$this->RecordOocyteDenudation->ViewValue = $this->RecordOocyteDenudation->CurrentValue;
			$this->RecordOocyteDenudation->ViewCustomAttributes = "";

			// DateOfDenudation
			$this->DateOfDenudation->ViewValue = $this->DateOfDenudation->CurrentValue;
			$this->DateOfDenudation->ViewValue = FormatDateTime($this->DateOfDenudation->ViewValue, 11);
			$this->DateOfDenudation->ViewCustomAttributes = "";

			// DenudationDoneBy
			$this->DenudationDoneBy->ViewValue = $this->DenudationDoneBy->CurrentValue;
			$this->DenudationDoneBy->ViewCustomAttributes = "";

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

			// TidNo
			$this->TidNo->ViewValue = $this->TidNo->CurrentValue;
			$this->TidNo->ViewValue = FormatNumber($this->TidNo->ViewValue, 0, -2, -2, -2);
			$this->TidNo->ViewCustomAttributes = "";

			// ExpFollicles
			$this->ExpFollicles->ViewValue = $this->ExpFollicles->CurrentValue;
			$this->ExpFollicles->ViewCustomAttributes = "";

			// SecondaryDenudationDoneBy
			$this->SecondaryDenudationDoneBy->ViewValue = $this->SecondaryDenudationDoneBy->CurrentValue;
			$this->SecondaryDenudationDoneBy->ViewCustomAttributes = "";

			// patient2
			$curVal = strval($this->patient2->CurrentValue);
			if ($curVal <> "") {
				$this->patient2->ViewValue = $this->patient2->lookupCacheOption($curVal);
				if ($this->patient2->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`bid`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
					$sqlWrk = $this->patient2->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = $rswrk->fields('df');
						$arwrk[2] = $rswrk->fields('df2');
						$arwrk[3] = $rswrk->fields('df3');
						$arwrk[4] = $rswrk->fields('df4');
						$this->patient2->ViewValue = $this->patient2->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->patient2->ViewValue = $this->patient2->CurrentValue;
					}
				}
			} else {
				$this->patient2->ViewValue = NULL;
			}
			$this->patient2->ViewCustomAttributes = "";

			// OocytesDonate1
			$this->OocytesDonate1->ViewValue = $this->OocytesDonate1->CurrentValue;
			$this->OocytesDonate1->ViewCustomAttributes = "";

			// OocytesDonate2
			$this->OocytesDonate2->ViewValue = $this->OocytesDonate2->CurrentValue;
			$this->OocytesDonate2->ViewCustomAttributes = "";

			// ETDonate
			$this->ETDonate->ViewValue = $this->ETDonate->CurrentValue;
			$this->ETDonate->ViewCustomAttributes = "";

			// OocyteOrgin
			if (strval($this->OocyteOrgin->CurrentValue) <> "") {
				$this->OocyteOrgin->ViewValue = $this->OocyteOrgin->optionCaption($this->OocyteOrgin->CurrentValue);
			} else {
				$this->OocyteOrgin->ViewValue = NULL;
			}
			$this->OocyteOrgin->ViewCustomAttributes = "";

			// patient1
			$curVal = strval($this->patient1->CurrentValue);
			if ($curVal <> "") {
				$this->patient1->ViewValue = $this->patient1->lookupCacheOption($curVal);
				if ($this->patient1->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`bid`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
					$sqlWrk = $this->patient1->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = $rswrk->fields('df');
						$arwrk[2] = $rswrk->fields('df2');
						$arwrk[3] = $rswrk->fields('df3');
						$arwrk[4] = $rswrk->fields('df4');
						$this->patient1->ViewValue = $this->patient1->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->patient1->ViewValue = $this->patient1->CurrentValue;
					}
				}
			} else {
				$this->patient1->ViewValue = NULL;
			}
			$this->patient1->ViewCustomAttributes = "";

			// OocyteType
			if (strval($this->OocyteType->CurrentValue) <> "") {
				$this->OocyteType->ViewValue = new OptionValues();
				$arwrk = explode(",", strval($this->OocyteType->CurrentValue));
				$cnt = count($arwrk);
				for ($ari = 0; $ari < $cnt; $ari++)
					$this->OocyteType->ViewValue->add($this->OocyteType->optionCaption(trim($arwrk[$ari])));
			} else {
				$this->OocyteType->ViewValue = NULL;
			}
			$this->OocyteType->ViewCustomAttributes = "";

			// MIOocytesDonate1
			$this->MIOocytesDonate1->ViewValue = $this->MIOocytesDonate1->CurrentValue;
			$this->MIOocytesDonate1->ViewCustomAttributes = "";

			// MIOocytesDonate2
			$this->MIOocytesDonate2->ViewValue = $this->MIOocytesDonate2->CurrentValue;
			$this->MIOocytesDonate2->ViewCustomAttributes = "";

			// SelfMI
			$this->SelfMI->ViewValue = $this->SelfMI->CurrentValue;
			$this->SelfMI->ViewCustomAttributes = "";

			// SelfMII
			$this->SelfMII->ViewValue = $this->SelfMII->CurrentValue;
			$this->SelfMII->ViewCustomAttributes = "";

			// patient3
			$curVal = strval($this->patient3->CurrentValue);
			if ($curVal <> "") {
				$this->patient3->ViewValue = $this->patient3->lookupCacheOption($curVal);
				if ($this->patient3->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`bid`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
					$sqlWrk = $this->patient3->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = $rswrk->fields('df');
						$arwrk[2] = $rswrk->fields('df2');
						$arwrk[3] = $rswrk->fields('df3');
						$arwrk[4] = $rswrk->fields('df4');
						$this->patient3->ViewValue = $this->patient3->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->patient3->ViewValue = $this->patient3->CurrentValue;
					}
				}
			} else {
				$this->patient3->ViewValue = NULL;
			}
			$this->patient3->ViewCustomAttributes = "";

			// patient4
			$curVal = strval($this->patient4->CurrentValue);
			if ($curVal <> "") {
				$this->patient4->ViewValue = $this->patient4->lookupCacheOption($curVal);
				if ($this->patient4->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`bid`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
					$sqlWrk = $this->patient4->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = $rswrk->fields('df');
						$arwrk[2] = $rswrk->fields('df2');
						$arwrk[3] = $rswrk->fields('df3');
						$arwrk[4] = $rswrk->fields('df4');
						$this->patient4->ViewValue = $this->patient4->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->patient4->ViewValue = $this->patient4->CurrentValue;
					}
				}
			} else {
				$this->patient4->ViewValue = NULL;
			}
			$this->patient4->ViewCustomAttributes = "";

			// OocytesDonate3
			$this->OocytesDonate3->ViewValue = $this->OocytesDonate3->CurrentValue;
			$this->OocytesDonate3->ViewCustomAttributes = "";

			// OocytesDonate4
			$this->OocytesDonate4->ViewValue = $this->OocytesDonate4->CurrentValue;
			$this->OocytesDonate4->ViewCustomAttributes = "";

			// MIOocytesDonate3
			$this->MIOocytesDonate3->ViewValue = $this->MIOocytesDonate3->CurrentValue;
			$this->MIOocytesDonate3->ViewCustomAttributes = "";

			// MIOocytesDonate4
			$this->MIOocytesDonate4->ViewValue = $this->MIOocytesDonate4->CurrentValue;
			$this->MIOocytesDonate4->ViewCustomAttributes = "";

			// SelfOocytesMI
			$this->SelfOocytesMI->ViewValue = $this->SelfOocytesMI->CurrentValue;
			$this->SelfOocytesMI->ViewCustomAttributes = "";

			// SelfOocytesMII
			$this->SelfOocytesMII->ViewValue = $this->SelfOocytesMII->CurrentValue;
			$this->SelfOocytesMII->ViewCustomAttributes = "";

			// donor
			$this->donor->ViewValue = $this->donor->CurrentValue;
			$this->donor->ViewValue = FormatNumber($this->donor->ViewValue, 0, -2, -2, -2);
			$this->donor->ViewCustomAttributes = "";

			// RIDNo
			$this->RIDNo->LinkCustomAttributes = "";
			$this->RIDNo->HrefValue = "";
			$this->RIDNo->TooltipValue = "";

			// Name
			$this->Name->LinkCustomAttributes = "";
			$this->Name->HrefValue = "";
			$this->Name->TooltipValue = "";

			// ResultDate
			$this->ResultDate->LinkCustomAttributes = "";
			$this->ResultDate->HrefValue = "";
			$this->ResultDate->TooltipValue = "";

			// Surgeon
			$this->Surgeon->LinkCustomAttributes = "";
			$this->Surgeon->HrefValue = "";
			$this->Surgeon->TooltipValue = "";

			// AsstSurgeon
			$this->AsstSurgeon->LinkCustomAttributes = "";
			$this->AsstSurgeon->HrefValue = "";
			$this->AsstSurgeon->TooltipValue = "";

			// Anaesthetist
			$this->Anaesthetist->LinkCustomAttributes = "";
			$this->Anaesthetist->HrefValue = "";
			$this->Anaesthetist->TooltipValue = "";

			// AnaestheiaType
			$this->AnaestheiaType->LinkCustomAttributes = "";
			$this->AnaestheiaType->HrefValue = "";
			$this->AnaestheiaType->TooltipValue = "";

			// PrimaryEmbryologist
			$this->PrimaryEmbryologist->LinkCustomAttributes = "";
			$this->PrimaryEmbryologist->HrefValue = "";
			$this->PrimaryEmbryologist->TooltipValue = "";

			// SecondaryEmbryologist
			$this->SecondaryEmbryologist->LinkCustomAttributes = "";
			$this->SecondaryEmbryologist->HrefValue = "";
			$this->SecondaryEmbryologist->TooltipValue = "";

			// OPUNotes
			$this->OPUNotes->LinkCustomAttributes = "";
			$this->OPUNotes->HrefValue = "";
			$this->OPUNotes->TooltipValue = "";

			// NoOfFolliclesRight
			$this->NoOfFolliclesRight->LinkCustomAttributes = "";
			$this->NoOfFolliclesRight->HrefValue = "";
			$this->NoOfFolliclesRight->TooltipValue = "";

			// NoOfFolliclesLeft
			$this->NoOfFolliclesLeft->LinkCustomAttributes = "";
			$this->NoOfFolliclesLeft->HrefValue = "";
			$this->NoOfFolliclesLeft->TooltipValue = "";

			// NoOfOocytes
			$this->NoOfOocytes->LinkCustomAttributes = "";
			$this->NoOfOocytes->HrefValue = "";
			$this->NoOfOocytes->TooltipValue = "";

			// RecordOocyteDenudation
			$this->RecordOocyteDenudation->LinkCustomAttributes = "";
			$this->RecordOocyteDenudation->HrefValue = "";
			$this->RecordOocyteDenudation->TooltipValue = "";

			// DateOfDenudation
			$this->DateOfDenudation->LinkCustomAttributes = "";
			$this->DateOfDenudation->HrefValue = "";
			$this->DateOfDenudation->TooltipValue = "";

			// DenudationDoneBy
			$this->DenudationDoneBy->LinkCustomAttributes = "";
			$this->DenudationDoneBy->HrefValue = "";
			$this->DenudationDoneBy->TooltipValue = "";

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

			// TidNo
			$this->TidNo->LinkCustomAttributes = "";
			$this->TidNo->HrefValue = "";
			$this->TidNo->TooltipValue = "";

			// ExpFollicles
			$this->ExpFollicles->LinkCustomAttributes = "";
			$this->ExpFollicles->HrefValue = "";
			$this->ExpFollicles->TooltipValue = "";

			// SecondaryDenudationDoneBy
			$this->SecondaryDenudationDoneBy->LinkCustomAttributes = "";
			$this->SecondaryDenudationDoneBy->HrefValue = "";
			$this->SecondaryDenudationDoneBy->TooltipValue = "";

			// patient2
			$this->patient2->LinkCustomAttributes = "";
			$this->patient2->HrefValue = "";
			$this->patient2->TooltipValue = "";

			// OocytesDonate1
			$this->OocytesDonate1->LinkCustomAttributes = "";
			$this->OocytesDonate1->HrefValue = "";
			$this->OocytesDonate1->TooltipValue = "";

			// OocytesDonate2
			$this->OocytesDonate2->LinkCustomAttributes = "";
			$this->OocytesDonate2->HrefValue = "";
			$this->OocytesDonate2->TooltipValue = "";

			// ETDonate
			$this->ETDonate->LinkCustomAttributes = "";
			$this->ETDonate->HrefValue = "";
			$this->ETDonate->TooltipValue = "";

			// OocyteOrgin
			$this->OocyteOrgin->LinkCustomAttributes = "";
			$this->OocyteOrgin->HrefValue = "";
			$this->OocyteOrgin->TooltipValue = "";

			// patient1
			$this->patient1->LinkCustomAttributes = "";
			$this->patient1->HrefValue = "";
			$this->patient1->TooltipValue = "";

			// OocyteType
			$this->OocyteType->LinkCustomAttributes = "";
			$this->OocyteType->HrefValue = "";
			$this->OocyteType->TooltipValue = "";

			// MIOocytesDonate1
			$this->MIOocytesDonate1->LinkCustomAttributes = "";
			$this->MIOocytesDonate1->HrefValue = "";
			$this->MIOocytesDonate1->TooltipValue = "";

			// MIOocytesDonate2
			$this->MIOocytesDonate2->LinkCustomAttributes = "";
			$this->MIOocytesDonate2->HrefValue = "";
			$this->MIOocytesDonate2->TooltipValue = "";

			// SelfMI
			$this->SelfMI->LinkCustomAttributes = "";
			$this->SelfMI->HrefValue = "";
			$this->SelfMI->TooltipValue = "";

			// SelfMII
			$this->SelfMII->LinkCustomAttributes = "";
			$this->SelfMII->HrefValue = "";
			$this->SelfMII->TooltipValue = "";

			// patient3
			$this->patient3->LinkCustomAttributes = "";
			$this->patient3->HrefValue = "";
			$this->patient3->TooltipValue = "";

			// patient4
			$this->patient4->LinkCustomAttributes = "";
			$this->patient4->HrefValue = "";
			$this->patient4->TooltipValue = "";

			// OocytesDonate3
			$this->OocytesDonate3->LinkCustomAttributes = "";
			$this->OocytesDonate3->HrefValue = "";
			$this->OocytesDonate3->TooltipValue = "";

			// OocytesDonate4
			$this->OocytesDonate4->LinkCustomAttributes = "";
			$this->OocytesDonate4->HrefValue = "";
			$this->OocytesDonate4->TooltipValue = "";

			// MIOocytesDonate3
			$this->MIOocytesDonate3->LinkCustomAttributes = "";
			$this->MIOocytesDonate3->HrefValue = "";
			$this->MIOocytesDonate3->TooltipValue = "";

			// MIOocytesDonate4
			$this->MIOocytesDonate4->LinkCustomAttributes = "";
			$this->MIOocytesDonate4->HrefValue = "";
			$this->MIOocytesDonate4->TooltipValue = "";

			// SelfOocytesMI
			$this->SelfOocytesMI->LinkCustomAttributes = "";
			$this->SelfOocytesMI->HrefValue = "";
			$this->SelfOocytesMI->TooltipValue = "";

			// SelfOocytesMII
			$this->SelfOocytesMII->LinkCustomAttributes = "";
			$this->SelfOocytesMII->HrefValue = "";
			$this->SelfOocytesMII->TooltipValue = "";

			// donor
			$this->donor->LinkCustomAttributes = "";
			$this->donor->HrefValue = "";
			$this->donor->TooltipValue = "";
		} elseif ($this->RowType == ROWTYPE_ADD) { // Add row

			// RIDNo
			$this->RIDNo->EditAttrs["class"] = "form-control";
			$this->RIDNo->EditCustomAttributes = "";
			if ($this->RIDNo->getSessionValue() <> "") {
				$this->RIDNo->CurrentValue = $this->RIDNo->getSessionValue();
			$this->RIDNo->ViewValue = $this->RIDNo->CurrentValue;
			$this->RIDNo->ViewValue = FormatNumber($this->RIDNo->ViewValue, 0, -2, -2, -2);
			$this->RIDNo->ViewCustomAttributes = "";
			} else {
			$this->RIDNo->EditValue = HtmlEncode($this->RIDNo->CurrentValue);
			$this->RIDNo->PlaceHolder = RemoveHtml($this->RIDNo->caption());
			}

			// Name
			$this->Name->EditAttrs["class"] = "form-control";
			$this->Name->EditCustomAttributes = "";
			if ($this->Name->getSessionValue() <> "") {
				$this->Name->CurrentValue = $this->Name->getSessionValue();
			$this->Name->ViewValue = $this->Name->CurrentValue;
			$this->Name->ViewCustomAttributes = "";
			} else {
			if (REMOVE_XSS)
				$this->Name->CurrentValue = HtmlDecode($this->Name->CurrentValue);
			$this->Name->EditValue = HtmlEncode($this->Name->CurrentValue);
			$this->Name->PlaceHolder = RemoveHtml($this->Name->caption());
			}

			// ResultDate
			$this->ResultDate->EditAttrs["class"] = "form-control";
			$this->ResultDate->EditCustomAttributes = "";
			$this->ResultDate->EditValue = HtmlEncode(FormatDateTime($this->ResultDate->CurrentValue, 11));
			$this->ResultDate->PlaceHolder = RemoveHtml($this->ResultDate->caption());

			// Surgeon
			$this->Surgeon->EditAttrs["class"] = "form-control";
			$this->Surgeon->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Surgeon->CurrentValue = HtmlDecode($this->Surgeon->CurrentValue);
			$this->Surgeon->EditValue = HtmlEncode($this->Surgeon->CurrentValue);
			$this->Surgeon->PlaceHolder = RemoveHtml($this->Surgeon->caption());

			// AsstSurgeon
			$this->AsstSurgeon->EditAttrs["class"] = "form-control";
			$this->AsstSurgeon->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->AsstSurgeon->CurrentValue = HtmlDecode($this->AsstSurgeon->CurrentValue);
			$this->AsstSurgeon->EditValue = HtmlEncode($this->AsstSurgeon->CurrentValue);
			$this->AsstSurgeon->PlaceHolder = RemoveHtml($this->AsstSurgeon->caption());

			// Anaesthetist
			$this->Anaesthetist->EditAttrs["class"] = "form-control";
			$this->Anaesthetist->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Anaesthetist->CurrentValue = HtmlDecode($this->Anaesthetist->CurrentValue);
			$this->Anaesthetist->EditValue = HtmlEncode($this->Anaesthetist->CurrentValue);
			$this->Anaesthetist->PlaceHolder = RemoveHtml($this->Anaesthetist->caption());

			// AnaestheiaType
			$this->AnaestheiaType->EditAttrs["class"] = "form-control";
			$this->AnaestheiaType->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->AnaestheiaType->CurrentValue = HtmlDecode($this->AnaestheiaType->CurrentValue);
			$this->AnaestheiaType->EditValue = HtmlEncode($this->AnaestheiaType->CurrentValue);
			$this->AnaestheiaType->PlaceHolder = RemoveHtml($this->AnaestheiaType->caption());

			// PrimaryEmbryologist
			$this->PrimaryEmbryologist->EditAttrs["class"] = "form-control";
			$this->PrimaryEmbryologist->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->PrimaryEmbryologist->CurrentValue = HtmlDecode($this->PrimaryEmbryologist->CurrentValue);
			$this->PrimaryEmbryologist->EditValue = HtmlEncode($this->PrimaryEmbryologist->CurrentValue);
			$this->PrimaryEmbryologist->PlaceHolder = RemoveHtml($this->PrimaryEmbryologist->caption());

			// SecondaryEmbryologist
			$this->SecondaryEmbryologist->EditAttrs["class"] = "form-control";
			$this->SecondaryEmbryologist->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->SecondaryEmbryologist->CurrentValue = HtmlDecode($this->SecondaryEmbryologist->CurrentValue);
			$this->SecondaryEmbryologist->EditValue = HtmlEncode($this->SecondaryEmbryologist->CurrentValue);
			$this->SecondaryEmbryologist->PlaceHolder = RemoveHtml($this->SecondaryEmbryologist->caption());

			// OPUNotes
			$this->OPUNotes->EditAttrs["class"] = "form-control";
			$this->OPUNotes->EditCustomAttributes = "";
			$this->OPUNotes->EditValue = HtmlEncode($this->OPUNotes->CurrentValue);
			$this->OPUNotes->PlaceHolder = RemoveHtml($this->OPUNotes->caption());

			// NoOfFolliclesRight
			$this->NoOfFolliclesRight->EditAttrs["class"] = "form-control";
			$this->NoOfFolliclesRight->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->NoOfFolliclesRight->CurrentValue = HtmlDecode($this->NoOfFolliclesRight->CurrentValue);
			$this->NoOfFolliclesRight->EditValue = HtmlEncode($this->NoOfFolliclesRight->CurrentValue);
			$this->NoOfFolliclesRight->PlaceHolder = RemoveHtml($this->NoOfFolliclesRight->caption());

			// NoOfFolliclesLeft
			$this->NoOfFolliclesLeft->EditAttrs["class"] = "form-control";
			$this->NoOfFolliclesLeft->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->NoOfFolliclesLeft->CurrentValue = HtmlDecode($this->NoOfFolliclesLeft->CurrentValue);
			$this->NoOfFolliclesLeft->EditValue = HtmlEncode($this->NoOfFolliclesLeft->CurrentValue);
			$this->NoOfFolliclesLeft->PlaceHolder = RemoveHtml($this->NoOfFolliclesLeft->caption());

			// NoOfOocytes
			$this->NoOfOocytes->EditAttrs["class"] = "form-control";
			$this->NoOfOocytes->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->NoOfOocytes->CurrentValue = HtmlDecode($this->NoOfOocytes->CurrentValue);
			$this->NoOfOocytes->EditValue = HtmlEncode($this->NoOfOocytes->CurrentValue);
			$this->NoOfOocytes->PlaceHolder = RemoveHtml($this->NoOfOocytes->caption());

			// RecordOocyteDenudation
			$this->RecordOocyteDenudation->EditAttrs["class"] = "form-control";
			$this->RecordOocyteDenudation->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->RecordOocyteDenudation->CurrentValue = HtmlDecode($this->RecordOocyteDenudation->CurrentValue);
			$this->RecordOocyteDenudation->EditValue = HtmlEncode($this->RecordOocyteDenudation->CurrentValue);
			$this->RecordOocyteDenudation->PlaceHolder = RemoveHtml($this->RecordOocyteDenudation->caption());

			// DateOfDenudation
			$this->DateOfDenudation->EditAttrs["class"] = "form-control";
			$this->DateOfDenudation->EditCustomAttributes = "";
			$this->DateOfDenudation->EditValue = HtmlEncode(FormatDateTime($this->DateOfDenudation->CurrentValue, 11));
			$this->DateOfDenudation->PlaceHolder = RemoveHtml($this->DateOfDenudation->caption());

			// DenudationDoneBy
			$this->DenudationDoneBy->EditAttrs["class"] = "form-control";
			$this->DenudationDoneBy->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->DenudationDoneBy->CurrentValue = HtmlDecode($this->DenudationDoneBy->CurrentValue);
			$this->DenudationDoneBy->EditValue = HtmlEncode($this->DenudationDoneBy->CurrentValue);
			$this->DenudationDoneBy->PlaceHolder = RemoveHtml($this->DenudationDoneBy->caption());

			// status
			$this->status->EditAttrs["class"] = "form-control";
			$this->status->EditCustomAttributes = "";
			$this->status->EditValue = HtmlEncode($this->status->CurrentValue);
			$this->status->PlaceHolder = RemoveHtml($this->status->caption());

			// createdby
			// createddatetime
			// modifiedby
			// modifieddatetime
			// TidNo

			$this->TidNo->EditAttrs["class"] = "form-control";
			$this->TidNo->EditCustomAttributes = "";
			if ($this->TidNo->getSessionValue() <> "") {
				$this->TidNo->CurrentValue = $this->TidNo->getSessionValue();
			$this->TidNo->ViewValue = $this->TidNo->CurrentValue;
			$this->TidNo->ViewValue = FormatNumber($this->TidNo->ViewValue, 0, -2, -2, -2);
			$this->TidNo->ViewCustomAttributes = "";
			} else {
			$this->TidNo->EditValue = HtmlEncode($this->TidNo->CurrentValue);
			$this->TidNo->PlaceHolder = RemoveHtml($this->TidNo->caption());
			}

			// ExpFollicles
			$this->ExpFollicles->EditAttrs["class"] = "form-control";
			$this->ExpFollicles->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->ExpFollicles->CurrentValue = HtmlDecode($this->ExpFollicles->CurrentValue);
			$this->ExpFollicles->EditValue = HtmlEncode($this->ExpFollicles->CurrentValue);
			$this->ExpFollicles->PlaceHolder = RemoveHtml($this->ExpFollicles->caption());

			// SecondaryDenudationDoneBy
			$this->SecondaryDenudationDoneBy->EditAttrs["class"] = "form-control";
			$this->SecondaryDenudationDoneBy->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->SecondaryDenudationDoneBy->CurrentValue = HtmlDecode($this->SecondaryDenudationDoneBy->CurrentValue);
			$this->SecondaryDenudationDoneBy->EditValue = HtmlEncode($this->SecondaryDenudationDoneBy->CurrentValue);
			$this->SecondaryDenudationDoneBy->PlaceHolder = RemoveHtml($this->SecondaryDenudationDoneBy->caption());

			// patient2
			$this->patient2->EditCustomAttributes = "";
			$curVal = trim(strval($this->patient2->CurrentValue));
			if ($curVal <> "")
				$this->patient2->ViewValue = $this->patient2->lookupCacheOption($curVal);
			else
				$this->patient2->ViewValue = $this->patient2->Lookup !== NULL && is_array($this->patient2->Lookup->Options) ? $curVal : NULL;
			if ($this->patient2->ViewValue !== NULL) { // Load from cache
				$this->patient2->EditValue = array_values($this->patient2->Lookup->Options);
				if ($this->patient2->ViewValue == "")
					$this->patient2->ViewValue = $Language->phrase("PleaseSelect");
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`bid`" . SearchString("=", $this->patient2->CurrentValue, DATATYPE_NUMBER, "");
				}
				$sqlWrk = $this->patient2->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = array();
					$arwrk[1] = HtmlEncode($rswrk->fields('df'));
					$arwrk[2] = HtmlEncode($rswrk->fields('df2'));
					$arwrk[3] = HtmlEncode($rswrk->fields('df3'));
					$arwrk[4] = HtmlEncode($rswrk->fields('df4'));
					$this->patient2->ViewValue = $this->patient2->displayValue($arwrk);
				} else {
					$this->patient2->ViewValue = $Language->phrase("PleaseSelect");
				}
				$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
				if ($rswrk) $rswrk->Close();
				$this->patient2->EditValue = $arwrk;
			}

			// OocytesDonate1
			$this->OocytesDonate1->EditAttrs["class"] = "form-control";
			$this->OocytesDonate1->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->OocytesDonate1->CurrentValue = HtmlDecode($this->OocytesDonate1->CurrentValue);
			$this->OocytesDonate1->EditValue = HtmlEncode($this->OocytesDonate1->CurrentValue);
			$this->OocytesDonate1->PlaceHolder = RemoveHtml($this->OocytesDonate1->caption());

			// OocytesDonate2
			$this->OocytesDonate2->EditAttrs["class"] = "form-control";
			$this->OocytesDonate2->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->OocytesDonate2->CurrentValue = HtmlDecode($this->OocytesDonate2->CurrentValue);
			$this->OocytesDonate2->EditValue = HtmlEncode($this->OocytesDonate2->CurrentValue);
			$this->OocytesDonate2->PlaceHolder = RemoveHtml($this->OocytesDonate2->caption());

			// ETDonate
			$this->ETDonate->EditAttrs["class"] = "form-control";
			$this->ETDonate->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->ETDonate->CurrentValue = HtmlDecode($this->ETDonate->CurrentValue);
			$this->ETDonate->EditValue = HtmlEncode($this->ETDonate->CurrentValue);
			$this->ETDonate->PlaceHolder = RemoveHtml($this->ETDonate->caption());

			// OocyteOrgin
			$this->OocyteOrgin->EditAttrs["class"] = "form-control";
			$this->OocyteOrgin->EditCustomAttributes = "";
			$this->OocyteOrgin->EditValue = $this->OocyteOrgin->options(TRUE);

			// patient1
			$this->patient1->EditCustomAttributes = "";
			$curVal = trim(strval($this->patient1->CurrentValue));
			if ($curVal <> "")
				$this->patient1->ViewValue = $this->patient1->lookupCacheOption($curVal);
			else
				$this->patient1->ViewValue = $this->patient1->Lookup !== NULL && is_array($this->patient1->Lookup->Options) ? $curVal : NULL;
			if ($this->patient1->ViewValue !== NULL) { // Load from cache
				$this->patient1->EditValue = array_values($this->patient1->Lookup->Options);
				if ($this->patient1->ViewValue == "")
					$this->patient1->ViewValue = $Language->phrase("PleaseSelect");
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`bid`" . SearchString("=", $this->patient1->CurrentValue, DATATYPE_NUMBER, "");
				}
				$sqlWrk = $this->patient1->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = array();
					$arwrk[1] = HtmlEncode($rswrk->fields('df'));
					$arwrk[2] = HtmlEncode($rswrk->fields('df2'));
					$arwrk[3] = HtmlEncode($rswrk->fields('df3'));
					$arwrk[4] = HtmlEncode($rswrk->fields('df4'));
					$this->patient1->ViewValue = $this->patient1->displayValue($arwrk);
				} else {
					$this->patient1->ViewValue = $Language->phrase("PleaseSelect");
				}
				$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
				if ($rswrk) $rswrk->Close();
				$this->patient1->EditValue = $arwrk;
			}

			// OocyteType
			$this->OocyteType->EditCustomAttributes = "";
			$this->OocyteType->EditValue = $this->OocyteType->options(FALSE);

			// MIOocytesDonate1
			$this->MIOocytesDonate1->EditAttrs["class"] = "form-control";
			$this->MIOocytesDonate1->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->MIOocytesDonate1->CurrentValue = HtmlDecode($this->MIOocytesDonate1->CurrentValue);
			$this->MIOocytesDonate1->EditValue = HtmlEncode($this->MIOocytesDonate1->CurrentValue);
			$this->MIOocytesDonate1->PlaceHolder = RemoveHtml($this->MIOocytesDonate1->caption());

			// MIOocytesDonate2
			$this->MIOocytesDonate2->EditAttrs["class"] = "form-control";
			$this->MIOocytesDonate2->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->MIOocytesDonate2->CurrentValue = HtmlDecode($this->MIOocytesDonate2->CurrentValue);
			$this->MIOocytesDonate2->EditValue = HtmlEncode($this->MIOocytesDonate2->CurrentValue);
			$this->MIOocytesDonate2->PlaceHolder = RemoveHtml($this->MIOocytesDonate2->caption());

			// SelfMI
			$this->SelfMI->EditAttrs["class"] = "form-control";
			$this->SelfMI->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->SelfMI->CurrentValue = HtmlDecode($this->SelfMI->CurrentValue);
			$this->SelfMI->EditValue = HtmlEncode($this->SelfMI->CurrentValue);
			$this->SelfMI->PlaceHolder = RemoveHtml($this->SelfMI->caption());

			// SelfMII
			$this->SelfMII->EditAttrs["class"] = "form-control";
			$this->SelfMII->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->SelfMII->CurrentValue = HtmlDecode($this->SelfMII->CurrentValue);
			$this->SelfMII->EditValue = HtmlEncode($this->SelfMII->CurrentValue);
			$this->SelfMII->PlaceHolder = RemoveHtml($this->SelfMII->caption());

			// patient3
			$this->patient3->EditCustomAttributes = "";
			$curVal = trim(strval($this->patient3->CurrentValue));
			if ($curVal <> "")
				$this->patient3->ViewValue = $this->patient3->lookupCacheOption($curVal);
			else
				$this->patient3->ViewValue = $this->patient3->Lookup !== NULL && is_array($this->patient3->Lookup->Options) ? $curVal : NULL;
			if ($this->patient3->ViewValue !== NULL) { // Load from cache
				$this->patient3->EditValue = array_values($this->patient3->Lookup->Options);
				if ($this->patient3->ViewValue == "")
					$this->patient3->ViewValue = $Language->phrase("PleaseSelect");
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`bid`" . SearchString("=", $this->patient3->CurrentValue, DATATYPE_NUMBER, "");
				}
				$sqlWrk = $this->patient3->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = array();
					$arwrk[1] = HtmlEncode($rswrk->fields('df'));
					$arwrk[2] = HtmlEncode($rswrk->fields('df2'));
					$arwrk[3] = HtmlEncode($rswrk->fields('df3'));
					$arwrk[4] = HtmlEncode($rswrk->fields('df4'));
					$this->patient3->ViewValue = $this->patient3->displayValue($arwrk);
				} else {
					$this->patient3->ViewValue = $Language->phrase("PleaseSelect");
				}
				$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
				if ($rswrk) $rswrk->Close();
				$this->patient3->EditValue = $arwrk;
			}

			// patient4
			$this->patient4->EditCustomAttributes = "";
			$curVal = trim(strval($this->patient4->CurrentValue));
			if ($curVal <> "")
				$this->patient4->ViewValue = $this->patient4->lookupCacheOption($curVal);
			else
				$this->patient4->ViewValue = $this->patient4->Lookup !== NULL && is_array($this->patient4->Lookup->Options) ? $curVal : NULL;
			if ($this->patient4->ViewValue !== NULL) { // Load from cache
				$this->patient4->EditValue = array_values($this->patient4->Lookup->Options);
				if ($this->patient4->ViewValue == "")
					$this->patient4->ViewValue = $Language->phrase("PleaseSelect");
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`bid`" . SearchString("=", $this->patient4->CurrentValue, DATATYPE_NUMBER, "");
				}
				$sqlWrk = $this->patient4->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = array();
					$arwrk[1] = HtmlEncode($rswrk->fields('df'));
					$arwrk[2] = HtmlEncode($rswrk->fields('df2'));
					$arwrk[3] = HtmlEncode($rswrk->fields('df3'));
					$arwrk[4] = HtmlEncode($rswrk->fields('df4'));
					$this->patient4->ViewValue = $this->patient4->displayValue($arwrk);
				} else {
					$this->patient4->ViewValue = $Language->phrase("PleaseSelect");
				}
				$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
				if ($rswrk) $rswrk->Close();
				$this->patient4->EditValue = $arwrk;
			}

			// OocytesDonate3
			$this->OocytesDonate3->EditAttrs["class"] = "form-control";
			$this->OocytesDonate3->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->OocytesDonate3->CurrentValue = HtmlDecode($this->OocytesDonate3->CurrentValue);
			$this->OocytesDonate3->EditValue = HtmlEncode($this->OocytesDonate3->CurrentValue);
			$this->OocytesDonate3->PlaceHolder = RemoveHtml($this->OocytesDonate3->caption());

			// OocytesDonate4
			$this->OocytesDonate4->EditAttrs["class"] = "form-control";
			$this->OocytesDonate4->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->OocytesDonate4->CurrentValue = HtmlDecode($this->OocytesDonate4->CurrentValue);
			$this->OocytesDonate4->EditValue = HtmlEncode($this->OocytesDonate4->CurrentValue);
			$this->OocytesDonate4->PlaceHolder = RemoveHtml($this->OocytesDonate4->caption());

			// MIOocytesDonate3
			$this->MIOocytesDonate3->EditAttrs["class"] = "form-control";
			$this->MIOocytesDonate3->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->MIOocytesDonate3->CurrentValue = HtmlDecode($this->MIOocytesDonate3->CurrentValue);
			$this->MIOocytesDonate3->EditValue = HtmlEncode($this->MIOocytesDonate3->CurrentValue);
			$this->MIOocytesDonate3->PlaceHolder = RemoveHtml($this->MIOocytesDonate3->caption());

			// MIOocytesDonate4
			$this->MIOocytesDonate4->EditAttrs["class"] = "form-control";
			$this->MIOocytesDonate4->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->MIOocytesDonate4->CurrentValue = HtmlDecode($this->MIOocytesDonate4->CurrentValue);
			$this->MIOocytesDonate4->EditValue = HtmlEncode($this->MIOocytesDonate4->CurrentValue);
			$this->MIOocytesDonate4->PlaceHolder = RemoveHtml($this->MIOocytesDonate4->caption());

			// SelfOocytesMI
			$this->SelfOocytesMI->EditAttrs["class"] = "form-control";
			$this->SelfOocytesMI->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->SelfOocytesMI->CurrentValue = HtmlDecode($this->SelfOocytesMI->CurrentValue);
			$this->SelfOocytesMI->EditValue = HtmlEncode($this->SelfOocytesMI->CurrentValue);
			$this->SelfOocytesMI->PlaceHolder = RemoveHtml($this->SelfOocytesMI->caption());

			// SelfOocytesMII
			$this->SelfOocytesMII->EditAttrs["class"] = "form-control";
			$this->SelfOocytesMII->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->SelfOocytesMII->CurrentValue = HtmlDecode($this->SelfOocytesMII->CurrentValue);
			$this->SelfOocytesMII->EditValue = HtmlEncode($this->SelfOocytesMII->CurrentValue);
			$this->SelfOocytesMII->PlaceHolder = RemoveHtml($this->SelfOocytesMII->caption());

			// donor
			$this->donor->EditAttrs["class"] = "form-control";
			$this->donor->EditCustomAttributes = "";
			$this->donor->EditValue = HtmlEncode($this->donor->CurrentValue);
			$this->donor->PlaceHolder = RemoveHtml($this->donor->caption());

			// Add refer script
			// RIDNo

			$this->RIDNo->LinkCustomAttributes = "";
			$this->RIDNo->HrefValue = "";

			// Name
			$this->Name->LinkCustomAttributes = "";
			$this->Name->HrefValue = "";

			// ResultDate
			$this->ResultDate->LinkCustomAttributes = "";
			$this->ResultDate->HrefValue = "";

			// Surgeon
			$this->Surgeon->LinkCustomAttributes = "";
			$this->Surgeon->HrefValue = "";

			// AsstSurgeon
			$this->AsstSurgeon->LinkCustomAttributes = "";
			$this->AsstSurgeon->HrefValue = "";

			// Anaesthetist
			$this->Anaesthetist->LinkCustomAttributes = "";
			$this->Anaesthetist->HrefValue = "";

			// AnaestheiaType
			$this->AnaestheiaType->LinkCustomAttributes = "";
			$this->AnaestheiaType->HrefValue = "";

			// PrimaryEmbryologist
			$this->PrimaryEmbryologist->LinkCustomAttributes = "";
			$this->PrimaryEmbryologist->HrefValue = "";

			// SecondaryEmbryologist
			$this->SecondaryEmbryologist->LinkCustomAttributes = "";
			$this->SecondaryEmbryologist->HrefValue = "";

			// OPUNotes
			$this->OPUNotes->LinkCustomAttributes = "";
			$this->OPUNotes->HrefValue = "";

			// NoOfFolliclesRight
			$this->NoOfFolliclesRight->LinkCustomAttributes = "";
			$this->NoOfFolliclesRight->HrefValue = "";

			// NoOfFolliclesLeft
			$this->NoOfFolliclesLeft->LinkCustomAttributes = "";
			$this->NoOfFolliclesLeft->HrefValue = "";

			// NoOfOocytes
			$this->NoOfOocytes->LinkCustomAttributes = "";
			$this->NoOfOocytes->HrefValue = "";

			// RecordOocyteDenudation
			$this->RecordOocyteDenudation->LinkCustomAttributes = "";
			$this->RecordOocyteDenudation->HrefValue = "";

			// DateOfDenudation
			$this->DateOfDenudation->LinkCustomAttributes = "";
			$this->DateOfDenudation->HrefValue = "";

			// DenudationDoneBy
			$this->DenudationDoneBy->LinkCustomAttributes = "";
			$this->DenudationDoneBy->HrefValue = "";

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

			// TidNo
			$this->TidNo->LinkCustomAttributes = "";
			$this->TidNo->HrefValue = "";

			// ExpFollicles
			$this->ExpFollicles->LinkCustomAttributes = "";
			$this->ExpFollicles->HrefValue = "";

			// SecondaryDenudationDoneBy
			$this->SecondaryDenudationDoneBy->LinkCustomAttributes = "";
			$this->SecondaryDenudationDoneBy->HrefValue = "";

			// patient2
			$this->patient2->LinkCustomAttributes = "";
			$this->patient2->HrefValue = "";

			// OocytesDonate1
			$this->OocytesDonate1->LinkCustomAttributes = "";
			$this->OocytesDonate1->HrefValue = "";

			// OocytesDonate2
			$this->OocytesDonate2->LinkCustomAttributes = "";
			$this->OocytesDonate2->HrefValue = "";

			// ETDonate
			$this->ETDonate->LinkCustomAttributes = "";
			$this->ETDonate->HrefValue = "";

			// OocyteOrgin
			$this->OocyteOrgin->LinkCustomAttributes = "";
			$this->OocyteOrgin->HrefValue = "";

			// patient1
			$this->patient1->LinkCustomAttributes = "";
			$this->patient1->HrefValue = "";

			// OocyteType
			$this->OocyteType->LinkCustomAttributes = "";
			$this->OocyteType->HrefValue = "";

			// MIOocytesDonate1
			$this->MIOocytesDonate1->LinkCustomAttributes = "";
			$this->MIOocytesDonate1->HrefValue = "";

			// MIOocytesDonate2
			$this->MIOocytesDonate2->LinkCustomAttributes = "";
			$this->MIOocytesDonate2->HrefValue = "";

			// SelfMI
			$this->SelfMI->LinkCustomAttributes = "";
			$this->SelfMI->HrefValue = "";

			// SelfMII
			$this->SelfMII->LinkCustomAttributes = "";
			$this->SelfMII->HrefValue = "";

			// patient3
			$this->patient3->LinkCustomAttributes = "";
			$this->patient3->HrefValue = "";

			// patient4
			$this->patient4->LinkCustomAttributes = "";
			$this->patient4->HrefValue = "";

			// OocytesDonate3
			$this->OocytesDonate3->LinkCustomAttributes = "";
			$this->OocytesDonate3->HrefValue = "";

			// OocytesDonate4
			$this->OocytesDonate4->LinkCustomAttributes = "";
			$this->OocytesDonate4->HrefValue = "";

			// MIOocytesDonate3
			$this->MIOocytesDonate3->LinkCustomAttributes = "";
			$this->MIOocytesDonate3->HrefValue = "";

			// MIOocytesDonate4
			$this->MIOocytesDonate4->LinkCustomAttributes = "";
			$this->MIOocytesDonate4->HrefValue = "";

			// SelfOocytesMI
			$this->SelfOocytesMI->LinkCustomAttributes = "";
			$this->SelfOocytesMI->HrefValue = "";

			// SelfOocytesMII
			$this->SelfOocytesMII->LinkCustomAttributes = "";
			$this->SelfOocytesMII->HrefValue = "";

			// donor
			$this->donor->LinkCustomAttributes = "";
			$this->donor->HrefValue = "";
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
		if ($this->RIDNo->Required) {
			if (!$this->RIDNo->IsDetailKey && $this->RIDNo->FormValue != NULL && $this->RIDNo->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->RIDNo->caption(), $this->RIDNo->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->RIDNo->FormValue)) {
			AddMessage($FormError, $this->RIDNo->errorMessage());
		}
		if ($this->Name->Required) {
			if (!$this->Name->IsDetailKey && $this->Name->FormValue != NULL && $this->Name->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Name->caption(), $this->Name->RequiredErrorMessage));
			}
		}
		if ($this->ResultDate->Required) {
			if (!$this->ResultDate->IsDetailKey && $this->ResultDate->FormValue != NULL && $this->ResultDate->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->ResultDate->caption(), $this->ResultDate->RequiredErrorMessage));
			}
		}
		if (!CheckEuroDate($this->ResultDate->FormValue)) {
			AddMessage($FormError, $this->ResultDate->errorMessage());
		}
		if ($this->Surgeon->Required) {
			if (!$this->Surgeon->IsDetailKey && $this->Surgeon->FormValue != NULL && $this->Surgeon->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Surgeon->caption(), $this->Surgeon->RequiredErrorMessage));
			}
		}
		if ($this->AsstSurgeon->Required) {
			if (!$this->AsstSurgeon->IsDetailKey && $this->AsstSurgeon->FormValue != NULL && $this->AsstSurgeon->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->AsstSurgeon->caption(), $this->AsstSurgeon->RequiredErrorMessage));
			}
		}
		if ($this->Anaesthetist->Required) {
			if (!$this->Anaesthetist->IsDetailKey && $this->Anaesthetist->FormValue != NULL && $this->Anaesthetist->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Anaesthetist->caption(), $this->Anaesthetist->RequiredErrorMessage));
			}
		}
		if ($this->AnaestheiaType->Required) {
			if (!$this->AnaestheiaType->IsDetailKey && $this->AnaestheiaType->FormValue != NULL && $this->AnaestheiaType->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->AnaestheiaType->caption(), $this->AnaestheiaType->RequiredErrorMessage));
			}
		}
		if ($this->PrimaryEmbryologist->Required) {
			if (!$this->PrimaryEmbryologist->IsDetailKey && $this->PrimaryEmbryologist->FormValue != NULL && $this->PrimaryEmbryologist->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PrimaryEmbryologist->caption(), $this->PrimaryEmbryologist->RequiredErrorMessage));
			}
		}
		if ($this->SecondaryEmbryologist->Required) {
			if (!$this->SecondaryEmbryologist->IsDetailKey && $this->SecondaryEmbryologist->FormValue != NULL && $this->SecondaryEmbryologist->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->SecondaryEmbryologist->caption(), $this->SecondaryEmbryologist->RequiredErrorMessage));
			}
		}
		if ($this->OPUNotes->Required) {
			if (!$this->OPUNotes->IsDetailKey && $this->OPUNotes->FormValue != NULL && $this->OPUNotes->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->OPUNotes->caption(), $this->OPUNotes->RequiredErrorMessage));
			}
		}
		if ($this->NoOfFolliclesRight->Required) {
			if (!$this->NoOfFolliclesRight->IsDetailKey && $this->NoOfFolliclesRight->FormValue != NULL && $this->NoOfFolliclesRight->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->NoOfFolliclesRight->caption(), $this->NoOfFolliclesRight->RequiredErrorMessage));
			}
		}
		if ($this->NoOfFolliclesLeft->Required) {
			if (!$this->NoOfFolliclesLeft->IsDetailKey && $this->NoOfFolliclesLeft->FormValue != NULL && $this->NoOfFolliclesLeft->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->NoOfFolliclesLeft->caption(), $this->NoOfFolliclesLeft->RequiredErrorMessage));
			}
		}
		if ($this->NoOfOocytes->Required) {
			if (!$this->NoOfOocytes->IsDetailKey && $this->NoOfOocytes->FormValue != NULL && $this->NoOfOocytes->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->NoOfOocytes->caption(), $this->NoOfOocytes->RequiredErrorMessage));
			}
		}
		if ($this->RecordOocyteDenudation->Required) {
			if (!$this->RecordOocyteDenudation->IsDetailKey && $this->RecordOocyteDenudation->FormValue != NULL && $this->RecordOocyteDenudation->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->RecordOocyteDenudation->caption(), $this->RecordOocyteDenudation->RequiredErrorMessage));
			}
		}
		if ($this->DateOfDenudation->Required) {
			if (!$this->DateOfDenudation->IsDetailKey && $this->DateOfDenudation->FormValue != NULL && $this->DateOfDenudation->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->DateOfDenudation->caption(), $this->DateOfDenudation->RequiredErrorMessage));
			}
		}
		if (!CheckEuroDate($this->DateOfDenudation->FormValue)) {
			AddMessage($FormError, $this->DateOfDenudation->errorMessage());
		}
		if ($this->DenudationDoneBy->Required) {
			if (!$this->DenudationDoneBy->IsDetailKey && $this->DenudationDoneBy->FormValue != NULL && $this->DenudationDoneBy->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->DenudationDoneBy->caption(), $this->DenudationDoneBy->RequiredErrorMessage));
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
		if ($this->TidNo->Required) {
			if (!$this->TidNo->IsDetailKey && $this->TidNo->FormValue != NULL && $this->TidNo->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->TidNo->caption(), $this->TidNo->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->TidNo->FormValue)) {
			AddMessage($FormError, $this->TidNo->errorMessage());
		}
		if ($this->ExpFollicles->Required) {
			if (!$this->ExpFollicles->IsDetailKey && $this->ExpFollicles->FormValue != NULL && $this->ExpFollicles->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->ExpFollicles->caption(), $this->ExpFollicles->RequiredErrorMessage));
			}
		}
		if ($this->SecondaryDenudationDoneBy->Required) {
			if (!$this->SecondaryDenudationDoneBy->IsDetailKey && $this->SecondaryDenudationDoneBy->FormValue != NULL && $this->SecondaryDenudationDoneBy->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->SecondaryDenudationDoneBy->caption(), $this->SecondaryDenudationDoneBy->RequiredErrorMessage));
			}
		}
		if ($this->patient2->Required) {
			if (!$this->patient2->IsDetailKey && $this->patient2->FormValue != NULL && $this->patient2->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->patient2->caption(), $this->patient2->RequiredErrorMessage));
			}
		}
		if ($this->OocytesDonate1->Required) {
			if (!$this->OocytesDonate1->IsDetailKey && $this->OocytesDonate1->FormValue != NULL && $this->OocytesDonate1->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->OocytesDonate1->caption(), $this->OocytesDonate1->RequiredErrorMessage));
			}
		}
		if ($this->OocytesDonate2->Required) {
			if (!$this->OocytesDonate2->IsDetailKey && $this->OocytesDonate2->FormValue != NULL && $this->OocytesDonate2->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->OocytesDonate2->caption(), $this->OocytesDonate2->RequiredErrorMessage));
			}
		}
		if ($this->ETDonate->Required) {
			if (!$this->ETDonate->IsDetailKey && $this->ETDonate->FormValue != NULL && $this->ETDonate->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->ETDonate->caption(), $this->ETDonate->RequiredErrorMessage));
			}
		}
		if ($this->OocyteOrgin->Required) {
			if (!$this->OocyteOrgin->IsDetailKey && $this->OocyteOrgin->FormValue != NULL && $this->OocyteOrgin->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->OocyteOrgin->caption(), $this->OocyteOrgin->RequiredErrorMessage));
			}
		}
		if ($this->patient1->Required) {
			if (!$this->patient1->IsDetailKey && $this->patient1->FormValue != NULL && $this->patient1->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->patient1->caption(), $this->patient1->RequiredErrorMessage));
			}
		}
		if ($this->OocyteType->Required) {
			if ($this->OocyteType->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->OocyteType->caption(), $this->OocyteType->RequiredErrorMessage));
			}
		}
		if ($this->MIOocytesDonate1->Required) {
			if (!$this->MIOocytesDonate1->IsDetailKey && $this->MIOocytesDonate1->FormValue != NULL && $this->MIOocytesDonate1->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->MIOocytesDonate1->caption(), $this->MIOocytesDonate1->RequiredErrorMessage));
			}
		}
		if ($this->MIOocytesDonate2->Required) {
			if (!$this->MIOocytesDonate2->IsDetailKey && $this->MIOocytesDonate2->FormValue != NULL && $this->MIOocytesDonate2->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->MIOocytesDonate2->caption(), $this->MIOocytesDonate2->RequiredErrorMessage));
			}
		}
		if ($this->SelfMI->Required) {
			if (!$this->SelfMI->IsDetailKey && $this->SelfMI->FormValue != NULL && $this->SelfMI->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->SelfMI->caption(), $this->SelfMI->RequiredErrorMessage));
			}
		}
		if ($this->SelfMII->Required) {
			if (!$this->SelfMII->IsDetailKey && $this->SelfMII->FormValue != NULL && $this->SelfMII->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->SelfMII->caption(), $this->SelfMII->RequiredErrorMessage));
			}
		}
		if ($this->patient3->Required) {
			if (!$this->patient3->IsDetailKey && $this->patient3->FormValue != NULL && $this->patient3->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->patient3->caption(), $this->patient3->RequiredErrorMessage));
			}
		}
		if ($this->patient4->Required) {
			if (!$this->patient4->IsDetailKey && $this->patient4->FormValue != NULL && $this->patient4->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->patient4->caption(), $this->patient4->RequiredErrorMessage));
			}
		}
		if ($this->OocytesDonate3->Required) {
			if (!$this->OocytesDonate3->IsDetailKey && $this->OocytesDonate3->FormValue != NULL && $this->OocytesDonate3->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->OocytesDonate3->caption(), $this->OocytesDonate3->RequiredErrorMessage));
			}
		}
		if ($this->OocytesDonate4->Required) {
			if (!$this->OocytesDonate4->IsDetailKey && $this->OocytesDonate4->FormValue != NULL && $this->OocytesDonate4->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->OocytesDonate4->caption(), $this->OocytesDonate4->RequiredErrorMessage));
			}
		}
		if ($this->MIOocytesDonate3->Required) {
			if (!$this->MIOocytesDonate3->IsDetailKey && $this->MIOocytesDonate3->FormValue != NULL && $this->MIOocytesDonate3->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->MIOocytesDonate3->caption(), $this->MIOocytesDonate3->RequiredErrorMessage));
			}
		}
		if ($this->MIOocytesDonate4->Required) {
			if (!$this->MIOocytesDonate4->IsDetailKey && $this->MIOocytesDonate4->FormValue != NULL && $this->MIOocytesDonate4->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->MIOocytesDonate4->caption(), $this->MIOocytesDonate4->RequiredErrorMessage));
			}
		}
		if ($this->SelfOocytesMI->Required) {
			if (!$this->SelfOocytesMI->IsDetailKey && $this->SelfOocytesMI->FormValue != NULL && $this->SelfOocytesMI->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->SelfOocytesMI->caption(), $this->SelfOocytesMI->RequiredErrorMessage));
			}
		}
		if ($this->SelfOocytesMII->Required) {
			if (!$this->SelfOocytesMII->IsDetailKey && $this->SelfOocytesMII->FormValue != NULL && $this->SelfOocytesMII->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->SelfOocytesMII->caption(), $this->SelfOocytesMII->RequiredErrorMessage));
			}
		}
		if ($this->donor->Required) {
			if (!$this->donor->IsDetailKey && $this->donor->FormValue != NULL && $this->donor->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->donor->caption(), $this->donor->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->donor->FormValue)) {
			AddMessage($FormError, $this->donor->errorMessage());
		}

		// Validate detail grid
		$detailTblVar = explode(",", $this->getCurrentDetailTable());
		if (in_array("ivf_embryology_chart", $detailTblVar) && $GLOBALS["ivf_embryology_chart"]->DetailAdd) {
			if (!isset($GLOBALS["ivf_embryology_chart_grid"]))
				$GLOBALS["ivf_embryology_chart_grid"] = new ivf_embryology_chart_grid(); // Get detail page object
			$GLOBALS["ivf_embryology_chart_grid"]->validateGridForm();
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

		// Begin transaction
		if ($this->getCurrentDetailTable() <> "")
			$conn->beginTrans();

		// Load db values from rsold
		$this->loadDbValues($rsold);
		if ($rsold) {
		}
		$rsnew = [];

		// RIDNo
		$this->RIDNo->setDbValueDef($rsnew, $this->RIDNo->CurrentValue, NULL, FALSE);

		// Name
		$this->Name->setDbValueDef($rsnew, $this->Name->CurrentValue, NULL, FALSE);

		// ResultDate
		$this->ResultDate->setDbValueDef($rsnew, UnFormatDateTime($this->ResultDate->CurrentValue, 11), NULL, FALSE);

		// Surgeon
		$this->Surgeon->setDbValueDef($rsnew, $this->Surgeon->CurrentValue, NULL, FALSE);

		// AsstSurgeon
		$this->AsstSurgeon->setDbValueDef($rsnew, $this->AsstSurgeon->CurrentValue, NULL, FALSE);

		// Anaesthetist
		$this->Anaesthetist->setDbValueDef($rsnew, $this->Anaesthetist->CurrentValue, NULL, FALSE);

		// AnaestheiaType
		$this->AnaestheiaType->setDbValueDef($rsnew, $this->AnaestheiaType->CurrentValue, NULL, FALSE);

		// PrimaryEmbryologist
		$this->PrimaryEmbryologist->setDbValueDef($rsnew, $this->PrimaryEmbryologist->CurrentValue, NULL, FALSE);

		// SecondaryEmbryologist
		$this->SecondaryEmbryologist->setDbValueDef($rsnew, $this->SecondaryEmbryologist->CurrentValue, NULL, FALSE);

		// OPUNotes
		$this->OPUNotes->setDbValueDef($rsnew, $this->OPUNotes->CurrentValue, NULL, FALSE);

		// NoOfFolliclesRight
		$this->NoOfFolliclesRight->setDbValueDef($rsnew, $this->NoOfFolliclesRight->CurrentValue, NULL, FALSE);

		// NoOfFolliclesLeft
		$this->NoOfFolliclesLeft->setDbValueDef($rsnew, $this->NoOfFolliclesLeft->CurrentValue, NULL, FALSE);

		// NoOfOocytes
		$this->NoOfOocytes->setDbValueDef($rsnew, $this->NoOfOocytes->CurrentValue, NULL, FALSE);

		// RecordOocyteDenudation
		$this->RecordOocyteDenudation->setDbValueDef($rsnew, $this->RecordOocyteDenudation->CurrentValue, NULL, FALSE);

		// DateOfDenudation
		$this->DateOfDenudation->setDbValueDef($rsnew, UnFormatDateTime($this->DateOfDenudation->CurrentValue, 11), NULL, FALSE);

		// DenudationDoneBy
		$this->DenudationDoneBy->setDbValueDef($rsnew, $this->DenudationDoneBy->CurrentValue, NULL, FALSE);

		// status
		$this->status->setDbValueDef($rsnew, $this->status->CurrentValue, NULL, FALSE);

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

		// TidNo
		$this->TidNo->setDbValueDef($rsnew, $this->TidNo->CurrentValue, NULL, FALSE);

		// ExpFollicles
		$this->ExpFollicles->setDbValueDef($rsnew, $this->ExpFollicles->CurrentValue, NULL, FALSE);

		// SecondaryDenudationDoneBy
		$this->SecondaryDenudationDoneBy->setDbValueDef($rsnew, $this->SecondaryDenudationDoneBy->CurrentValue, NULL, FALSE);

		// patient2
		$this->patient2->setDbValueDef($rsnew, $this->patient2->CurrentValue, NULL, FALSE);

		// OocytesDonate1
		$this->OocytesDonate1->setDbValueDef($rsnew, $this->OocytesDonate1->CurrentValue, NULL, FALSE);

		// OocytesDonate2
		$this->OocytesDonate2->setDbValueDef($rsnew, $this->OocytesDonate2->CurrentValue, NULL, FALSE);

		// ETDonate
		$this->ETDonate->setDbValueDef($rsnew, $this->ETDonate->CurrentValue, NULL, FALSE);

		// OocyteOrgin
		$this->OocyteOrgin->setDbValueDef($rsnew, $this->OocyteOrgin->CurrentValue, NULL, FALSE);

		// patient1
		$this->patient1->setDbValueDef($rsnew, $this->patient1->CurrentValue, NULL, FALSE);

		// OocyteType
		$this->OocyteType->setDbValueDef($rsnew, $this->OocyteType->CurrentValue, NULL, FALSE);

		// MIOocytesDonate1
		$this->MIOocytesDonate1->setDbValueDef($rsnew, $this->MIOocytesDonate1->CurrentValue, NULL, FALSE);

		// MIOocytesDonate2
		$this->MIOocytesDonate2->setDbValueDef($rsnew, $this->MIOocytesDonate2->CurrentValue, NULL, FALSE);

		// SelfMI
		$this->SelfMI->setDbValueDef($rsnew, $this->SelfMI->CurrentValue, NULL, FALSE);

		// SelfMII
		$this->SelfMII->setDbValueDef($rsnew, $this->SelfMII->CurrentValue, NULL, FALSE);

		// patient3
		$this->patient3->setDbValueDef($rsnew, $this->patient3->CurrentValue, NULL, FALSE);

		// patient4
		$this->patient4->setDbValueDef($rsnew, $this->patient4->CurrentValue, NULL, FALSE);

		// OocytesDonate3
		$this->OocytesDonate3->setDbValueDef($rsnew, $this->OocytesDonate3->CurrentValue, NULL, FALSE);

		// OocytesDonate4
		$this->OocytesDonate4->setDbValueDef($rsnew, $this->OocytesDonate4->CurrentValue, NULL, FALSE);

		// MIOocytesDonate3
		$this->MIOocytesDonate3->setDbValueDef($rsnew, $this->MIOocytesDonate3->CurrentValue, NULL, FALSE);

		// MIOocytesDonate4
		$this->MIOocytesDonate4->setDbValueDef($rsnew, $this->MIOocytesDonate4->CurrentValue, NULL, FALSE);

		// SelfOocytesMI
		$this->SelfOocytesMI->setDbValueDef($rsnew, $this->SelfOocytesMI->CurrentValue, NULL, FALSE);

		// SelfOocytesMII
		$this->SelfOocytesMII->setDbValueDef($rsnew, $this->SelfOocytesMII->CurrentValue, NULL, FALSE);

		// donor
		$this->donor->setDbValueDef($rsnew, $this->donor->CurrentValue, NULL, FALSE);

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

		// Add detail records
		if ($addRow) {
			$detailTblVar = explode(",", $this->getCurrentDetailTable());
			if (in_array("ivf_embryology_chart", $detailTblVar) && $GLOBALS["ivf_embryology_chart"]->DetailAdd) {
				$GLOBALS["ivf_embryology_chart"]->DidNO->setSessionValue($this->id->CurrentValue); // Set master key
				if (!isset($GLOBALS["ivf_embryology_chart_grid"]))
					$GLOBALS["ivf_embryology_chart_grid"] = new ivf_embryology_chart_grid(); // Get detail page object
				$Security->loadCurrentUserLevel($this->ProjectID . "ivf_embryology_chart"); // Load user level of detail table
				$addRow = $GLOBALS["ivf_embryology_chart_grid"]->gridInsert();
				$Security->loadCurrentUserLevel($this->ProjectID . $this->TableName); // Restore user level of master table
				if (!$addRow)
					$GLOBALS["ivf_embryology_chart"]->DidNO->setSessionValue(""); // Clear master key if insert failed
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
			if ($masterTblVar == "view_ivf_treatment") {
				$validMaster = TRUE;
				if (Get("fk_id") !== NULL) {
					$this->TidNo->setQueryStringValue(Get("fk_id"));
					$this->TidNo->setSessionValue($this->TidNo->QueryStringValue);
					if (!is_numeric($this->TidNo->QueryStringValue))
						$validMaster = FALSE;
				} else {
					$validMaster = FALSE;
				}
				if (Get("fk_RIDNO") !== NULL) {
					$this->RIDNo->setQueryStringValue(Get("fk_RIDNO"));
					$this->RIDNo->setSessionValue($this->RIDNo->QueryStringValue);
					if (!is_numeric($this->RIDNo->QueryStringValue))
						$validMaster = FALSE;
				} else {
					$validMaster = FALSE;
				}
				if (Get("fk_Name") !== NULL) {
					$this->Name->setQueryStringValue(Get("fk_Name"));
					$this->Name->setSessionValue($this->Name->QueryStringValue);
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
			if ($masterTblVar == "view_ivf_treatment") {
				$validMaster = TRUE;
				if (Post("fk_id") !== NULL) {
					$this->TidNo->setFormValue(Post("fk_id"));
					$this->TidNo->setSessionValue($this->TidNo->FormValue);
					if (!is_numeric($this->TidNo->FormValue))
						$validMaster = FALSE;
				} else {
					$validMaster = FALSE;
				}
				if (Post("fk_RIDNO") !== NULL) {
					$this->RIDNo->setFormValue(Post("fk_RIDNO"));
					$this->RIDNo->setSessionValue($this->RIDNo->FormValue);
					if (!is_numeric($this->RIDNo->FormValue))
						$validMaster = FALSE;
				} else {
					$validMaster = FALSE;
				}
				if (Post("fk_Name") !== NULL) {
					$this->Name->setFormValue(Post("fk_Name"));
					$this->Name->setSessionValue($this->Name->FormValue);
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
			if ($masterTblVar <> "view_ivf_treatment") {
				if ($this->TidNo->CurrentValue == "")
					$this->TidNo->setSessionValue("");
				if ($this->RIDNo->CurrentValue == "")
					$this->RIDNo->setSessionValue("");
				if ($this->Name->CurrentValue == "")
					$this->Name->setSessionValue("");
			}
		}
		$this->DbMasterFilter = $this->getMasterFilter(); // Get master filter
		$this->DbDetailFilter = $this->getDetailFilter(); // Get detail filter
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
			if (in_array("ivf_embryology_chart", $detailTblVar)) {
				if (!isset($GLOBALS["ivf_embryology_chart_grid"]))
					$GLOBALS["ivf_embryology_chart_grid"] = new ivf_embryology_chart_grid();
				if ($GLOBALS["ivf_embryology_chart_grid"]->DetailAdd) {
					if ($this->CopyRecord)
						$GLOBALS["ivf_embryology_chart_grid"]->CurrentMode = "copy";
					else
						$GLOBALS["ivf_embryology_chart_grid"]->CurrentMode = "add";
					$GLOBALS["ivf_embryology_chart_grid"]->CurrentAction = "gridadd";

					// Save current master table to detail table
					$GLOBALS["ivf_embryology_chart_grid"]->setCurrentMasterTable($this->TableVar);
					$GLOBALS["ivf_embryology_chart_grid"]->setStartRecordNumber(1);
					$GLOBALS["ivf_embryology_chart_grid"]->DidNO->IsDetailKey = TRUE;
					$GLOBALS["ivf_embryology_chart_grid"]->DidNO->CurrentValue = $this->id->CurrentValue;
					$GLOBALS["ivf_embryology_chart_grid"]->DidNO->setSessionValue($GLOBALS["ivf_embryology_chart_grid"]->DidNO->CurrentValue);
					$GLOBALS["ivf_embryology_chart_grid"]->RIDNo->setSessionValue(""); // Clear session key
					$GLOBALS["ivf_embryology_chart_grid"]->Name->setSessionValue(""); // Clear session key
					$GLOBALS["ivf_embryology_chart_grid"]->TidNo->setSessionValue(""); // Clear session key
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
		$Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("ivf_oocytedenudationlist.php"), "", $this->TableVar, TRUE);
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
						case "x_patient2":
							break;
						case "x_patient1":
							break;
						case "x_patient3":
							break;
						case "x_patient4":
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
<?php
namespace PHPMaker2019\HIMS;

/**
 * Page class
 */
class patient_opd_follow_up_edit extends patient_opd_follow_up
{

	// Page ID
	public $PageID = "edit";

	// Project ID
	public $ProjectID = "{EA4F6D13-AF8F-428D-9EA7-BA88D1107EC3}";

	// Table name
	public $TableName = 'patient_opd_follow_up';

	// Page object name
	public $PageObjName = "patient_opd_follow_up_edit";

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

		// Table object (patient_opd_follow_up)
		if (!isset($GLOBALS["patient_opd_follow_up"]) || get_class($GLOBALS["patient_opd_follow_up"]) == PROJECT_NAMESPACE . "patient_opd_follow_up") {
			$GLOBALS["patient_opd_follow_up"] = &$this;
			$GLOBALS["Table"] = &$GLOBALS["patient_opd_follow_up"];
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
			define(PROJECT_NAMESPACE . "TABLE_NAME", 'patient_opd_follow_up');

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
		global $EXPORT, $patient_opd_follow_up;
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
				$doc = new $class($patient_opd_follow_up);
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
					if ($pageName == "patient_opd_follow_upview.php")
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
					$this->terminate(GetUrl("patient_opd_follow_uplist.php"));
				else
					$this->terminate(GetUrl("login.php"));
				return;
			}
		}

		// Create form object
		$CurrentForm = new HttpForm();
		$this->CurrentAction = Param("action"); // Set up current action
		$this->id->setVisibility();
		$this->Reception->Visible = FALSE;
		$this->PatID->Visible = FALSE;
		$this->PatientId->Visible = FALSE;
		$this->PatientName->Visible = FALSE;
		$this->MobileNumber->Visible = FALSE;
		$this->Telephone->Visible = FALSE;
		$this->mrnno->Visible = FALSE;
		$this->Age->Visible = FALSE;
		$this->Gender->Visible = FALSE;
		$this->profilePic->Visible = FALSE;
		$this->procedurenotes->setVisibility();
		$this->NextReviewDate->setVisibility();
		$this->ICSIAdvised->setVisibility();
		$this->DeliveryRegistered->setVisibility();
		$this->EDD->setVisibility();
		$this->SerologyPositive->setVisibility();
		$this->Allergy->setVisibility();
		$this->status->setVisibility();
		$this->createdby->Visible = FALSE;
		$this->createddatetime->Visible = FALSE;
		$this->modifiedby->setVisibility();
		$this->modifieddatetime->setVisibility();
		$this->LMP->setVisibility();
		$this->Procedure->setVisibility();
		$this->ProcedureDateTime->setVisibility();
		$this->ICSIDate->setVisibility();
		$this->PatientSearch->setVisibility();
		$this->HospID->Visible = FALSE;
		$this->createdUserName->Visible = FALSE;
		$this->TemplateDrNotes->setVisibility();
		$this->reportheader->setVisibility();
		$this->Purpose->setVisibility();
		$this->DrName->setVisibility();
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
		$this->setupLookupOptions($this->status);
		$this->setupLookupOptions($this->PatientSearch);
		$this->setupLookupOptions($this->TemplateDrNotes);
		$this->setupLookupOptions($this->DrName);

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
					$this->terminate("patient_opd_follow_uplist.php"); // No matching record, return to list
				}

				// Set up detail parameters
				$this->setupDetailParms();
				break;
			case "update": // Update
				if ($this->getCurrentDetailTable() <> "") // Master/detail edit
					$returnUrl = $this->getViewUrl(TABLE_SHOW_DETAIL . "=" . $this->getCurrentDetailTable()); // Master/Detail view page
				else
					$returnUrl = $this->getReturnUrl();
				if (GetPageName($returnUrl) == "patient_opd_follow_uplist.php")
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
			$this->NextReviewDate->CurrentValue = UnFormatDateTime($this->NextReviewDate->CurrentValue, 7);
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
			$this->EDD->CurrentValue = UnFormatDateTime($this->EDD->CurrentValue, 7);
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

		// Check field name 'LMP' first before field var 'x_LMP'
		$val = $CurrentForm->hasValue("LMP") ? $CurrentForm->getValue("LMP") : $CurrentForm->getValue("x_LMP");
		if (!$this->LMP->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->LMP->Visible = FALSE; // Disable update for API request
			else
				$this->LMP->setFormValue($val);
			$this->LMP->CurrentValue = UnFormatDateTime($this->LMP->CurrentValue, 7);
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
			$this->ProcedureDateTime->CurrentValue = UnFormatDateTime($this->ProcedureDateTime->CurrentValue, 11);
		}

		// Check field name 'ICSIDate' first before field var 'x_ICSIDate'
		$val = $CurrentForm->hasValue("ICSIDate") ? $CurrentForm->getValue("ICSIDate") : $CurrentForm->getValue("x_ICSIDate");
		if (!$this->ICSIDate->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->ICSIDate->Visible = FALSE; // Disable update for API request
			else
				$this->ICSIDate->setFormValue($val);
			$this->ICSIDate->CurrentValue = UnFormatDateTime($this->ICSIDate->CurrentValue, 7);
		}

		// Check field name 'PatientSearch' first before field var 'x_PatientSearch'
		$val = $CurrentForm->hasValue("PatientSearch") ? $CurrentForm->getValue("PatientSearch") : $CurrentForm->getValue("x_PatientSearch");
		if (!$this->PatientSearch->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->PatientSearch->Visible = FALSE; // Disable update for API request
			else
				$this->PatientSearch->setFormValue($val);
		}

		// Check field name 'TemplateDrNotes' first before field var 'x_TemplateDrNotes'
		$val = $CurrentForm->hasValue("TemplateDrNotes") ? $CurrentForm->getValue("TemplateDrNotes") : $CurrentForm->getValue("x_TemplateDrNotes");
		if (!$this->TemplateDrNotes->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->TemplateDrNotes->Visible = FALSE; // Disable update for API request
			else
				$this->TemplateDrNotes->setFormValue($val);
		}

		// Check field name 'reportheader' first before field var 'x_reportheader'
		$val = $CurrentForm->hasValue("reportheader") ? $CurrentForm->getValue("reportheader") : $CurrentForm->getValue("x_reportheader");
		if (!$this->reportheader->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->reportheader->Visible = FALSE; // Disable update for API request
			else
				$this->reportheader->setFormValue($val);
		}

		// Check field name 'Purpose' first before field var 'x_Purpose'
		$val = $CurrentForm->hasValue("Purpose") ? $CurrentForm->getValue("Purpose") : $CurrentForm->getValue("x_Purpose");
		if (!$this->Purpose->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Purpose->Visible = FALSE; // Disable update for API request
			else
				$this->Purpose->setFormValue($val);
		}

		// Check field name 'DrName' first before field var 'x_DrName'
		$val = $CurrentForm->hasValue("DrName") ? $CurrentForm->getValue("DrName") : $CurrentForm->getValue("x_DrName");
		if (!$this->DrName->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->DrName->Visible = FALSE; // Disable update for API request
			else
				$this->DrName->setFormValue($val);
		}
	}

	// Restore form values
	public function restoreFormValues()
	{
		global $CurrentForm;
		$this->id->CurrentValue = $this->id->FormValue;
		$this->procedurenotes->CurrentValue = $this->procedurenotes->FormValue;
		$this->NextReviewDate->CurrentValue = $this->NextReviewDate->FormValue;
		$this->NextReviewDate->CurrentValue = UnFormatDateTime($this->NextReviewDate->CurrentValue, 7);
		$this->ICSIAdvised->CurrentValue = $this->ICSIAdvised->FormValue;
		$this->DeliveryRegistered->CurrentValue = $this->DeliveryRegistered->FormValue;
		$this->EDD->CurrentValue = $this->EDD->FormValue;
		$this->EDD->CurrentValue = UnFormatDateTime($this->EDD->CurrentValue, 7);
		$this->SerologyPositive->CurrentValue = $this->SerologyPositive->FormValue;
		$this->Allergy->CurrentValue = $this->Allergy->FormValue;
		$this->status->CurrentValue = $this->status->FormValue;
		$this->modifiedby->CurrentValue = $this->modifiedby->FormValue;
		$this->modifieddatetime->CurrentValue = $this->modifieddatetime->FormValue;
		$this->modifieddatetime->CurrentValue = UnFormatDateTime($this->modifieddatetime->CurrentValue, 0);
		$this->LMP->CurrentValue = $this->LMP->FormValue;
		$this->LMP->CurrentValue = UnFormatDateTime($this->LMP->CurrentValue, 7);
		$this->Procedure->CurrentValue = $this->Procedure->FormValue;
		$this->ProcedureDateTime->CurrentValue = $this->ProcedureDateTime->FormValue;
		$this->ProcedureDateTime->CurrentValue = UnFormatDateTime($this->ProcedureDateTime->CurrentValue, 11);
		$this->ICSIDate->CurrentValue = $this->ICSIDate->FormValue;
		$this->ICSIDate->CurrentValue = UnFormatDateTime($this->ICSIDate->CurrentValue, 7);
		$this->PatientSearch->CurrentValue = $this->PatientSearch->FormValue;
		$this->TemplateDrNotes->CurrentValue = $this->TemplateDrNotes->FormValue;
		$this->reportheader->CurrentValue = $this->reportheader->FormValue;
		$this->Purpose->CurrentValue = $this->Purpose->FormValue;
		$this->DrName->CurrentValue = $this->DrName->FormValue;
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
		$this->PatID->setDbValue($row['PatID']);
		$this->PatientId->setDbValue($row['PatientId']);
		$this->PatientName->setDbValue($row['PatientName']);
		$this->MobileNumber->setDbValue($row['MobileNumber']);
		$this->Telephone->setDbValue($row['Telephone']);
		$this->mrnno->setDbValue($row['mrnno']);
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
		$this->PatientSearch->setDbValue($row['PatientSearch']);
		$this->HospID->setDbValue($row['HospID']);
		$this->createdUserName->setDbValue($row['createdUserName']);
		$this->TemplateDrNotes->setDbValue($row['TemplateDrNotes']);
		$this->reportheader->setDbValue($row['reportheader']);
		$this->Purpose->setDbValue($row['Purpose']);
		$this->DrName->setDbValue($row['DrName']);
	}

	// Return a row with default values
	protected function newRow()
	{
		$row = [];
		$row['id'] = NULL;
		$row['Reception'] = NULL;
		$row['PatID'] = NULL;
		$row['PatientId'] = NULL;
		$row['PatientName'] = NULL;
		$row['MobileNumber'] = NULL;
		$row['Telephone'] = NULL;
		$row['mrnno'] = NULL;
		$row['Age'] = NULL;
		$row['Gender'] = NULL;
		$row['profilePic'] = NULL;
		$row['procedurenotes'] = NULL;
		$row['NextReviewDate'] = NULL;
		$row['ICSIAdvised'] = NULL;
		$row['DeliveryRegistered'] = NULL;
		$row['EDD'] = NULL;
		$row['SerologyPositive'] = NULL;
		$row['Allergy'] = NULL;
		$row['status'] = NULL;
		$row['createdby'] = NULL;
		$row['createddatetime'] = NULL;
		$row['modifiedby'] = NULL;
		$row['modifieddatetime'] = NULL;
		$row['LMP'] = NULL;
		$row['Procedure'] = NULL;
		$row['ProcedureDateTime'] = NULL;
		$row['ICSIDate'] = NULL;
		$row['PatientSearch'] = NULL;
		$row['HospID'] = NULL;
		$row['createdUserName'] = NULL;
		$row['TemplateDrNotes'] = NULL;
		$row['reportheader'] = NULL;
		$row['Purpose'] = NULL;
		$row['DrName'] = NULL;
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
		// PatID
		// PatientId
		// PatientName
		// MobileNumber
		// Telephone
		// mrnno
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
		// PatientSearch
		// HospID
		// createdUserName
		// TemplateDrNotes
		// reportheader
		// Purpose
		// DrName

		if ($this->RowType == ROWTYPE_VIEW) { // View row

			// id
			$this->id->ViewValue = $this->id->CurrentValue;
			$this->id->ViewCustomAttributes = "";

			// Reception
			$this->Reception->ViewValue = $this->Reception->CurrentValue;
			$this->Reception->ViewCustomAttributes = "";

			// PatID
			$this->PatID->ViewValue = $this->PatID->CurrentValue;
			$this->PatID->ViewCustomAttributes = "";

			// PatientId
			$this->PatientId->ViewValue = $this->PatientId->CurrentValue;
			$this->PatientId->ViewCustomAttributes = "";

			// PatientName
			$this->PatientName->ViewValue = $this->PatientName->CurrentValue;
			$this->PatientName->ViewCustomAttributes = "";

			// MobileNumber
			$this->MobileNumber->ViewValue = $this->MobileNumber->CurrentValue;
			$this->MobileNumber->ViewCustomAttributes = "";

			// Telephone
			$this->Telephone->ViewValue = $this->Telephone->CurrentValue;
			$this->Telephone->ViewCustomAttributes = "";

			// mrnno
			$this->mrnno->ViewValue = $this->mrnno->CurrentValue;
			$this->mrnno->ViewCustomAttributes = "";

			// Age
			$this->Age->ViewValue = $this->Age->CurrentValue;
			$this->Age->ViewCustomAttributes = "";

			// Gender
			$this->Gender->ViewValue = $this->Gender->CurrentValue;
			$this->Gender->ViewCustomAttributes = "";

			// procedurenotes
			$this->procedurenotes->ViewValue = $this->procedurenotes->CurrentValue;
			$this->procedurenotes->ViewCustomAttributes = "";

			// NextReviewDate
			$this->NextReviewDate->ViewValue = $this->NextReviewDate->CurrentValue;
			$this->NextReviewDate->ViewValue = FormatDateTime($this->NextReviewDate->ViewValue, 7);
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
			$this->EDD->ViewValue = FormatDateTime($this->EDD->ViewValue, 7);
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
			$this->Allergy->ViewValue = $this->Allergy->CurrentValue;
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
			$this->LMP->ViewValue = FormatDateTime($this->LMP->ViewValue, 7);
			$this->LMP->ViewCustomAttributes = "";

			// Procedure
			$this->Procedure->ViewValue = $this->Procedure->CurrentValue;
			$this->Procedure->ViewCustomAttributes = "";

			// ProcedureDateTime
			$this->ProcedureDateTime->ViewValue = $this->ProcedureDateTime->CurrentValue;
			$this->ProcedureDateTime->ViewValue = FormatDateTime($this->ProcedureDateTime->ViewValue, 11);
			$this->ProcedureDateTime->ViewCustomAttributes = "";

			// ICSIDate
			$this->ICSIDate->ViewValue = $this->ICSIDate->CurrentValue;
			$this->ICSIDate->ViewValue = FormatDateTime($this->ICSIDate->ViewValue, 7);
			$this->ICSIDate->ViewCustomAttributes = "";

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

			// HospID
			$this->HospID->ViewValue = $this->HospID->CurrentValue;
			$this->HospID->ViewCustomAttributes = "";

			// createdUserName
			$this->createdUserName->ViewValue = $this->createdUserName->CurrentValue;
			$this->createdUserName->ViewCustomAttributes = "";

			// TemplateDrNotes
			$curVal = strval($this->TemplateDrNotes->CurrentValue);
			if ($curVal <> "") {
				$this->TemplateDrNotes->ViewValue = $this->TemplateDrNotes->lookupCacheOption($curVal);
				if ($this->TemplateDrNotes->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`TemplateName`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$lookupFilter = function() {
						return "`TemplateType`='Doctor Notes'";
					};
					$lookupFilter = $lookupFilter->bindTo($this);
					$sqlWrk = $this->TemplateDrNotes->Lookup->getSql(FALSE, $filterWrk, $lookupFilter, $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = $rswrk->fields('df');
						$this->TemplateDrNotes->ViewValue = $this->TemplateDrNotes->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->TemplateDrNotes->ViewValue = $this->TemplateDrNotes->CurrentValue;
					}
				}
			} else {
				$this->TemplateDrNotes->ViewValue = NULL;
			}
			$this->TemplateDrNotes->ViewCustomAttributes = "";

			// reportheader
			if (strval($this->reportheader->CurrentValue) <> "") {
				$this->reportheader->ViewValue = new OptionValues();
				$arwrk = explode(",", strval($this->reportheader->CurrentValue));
				$cnt = count($arwrk);
				for ($ari = 0; $ari < $cnt; $ari++)
					$this->reportheader->ViewValue->add($this->reportheader->optionCaption(trim($arwrk[$ari])));
			} else {
				$this->reportheader->ViewValue = NULL;
			}
			$this->reportheader->ViewCustomAttributes = "";

			// Purpose
			$this->Purpose->ViewValue = $this->Purpose->CurrentValue;
			$this->Purpose->ViewCustomAttributes = "";

			// DrName
			$curVal = strval($this->DrName->CurrentValue);
			if ($curVal <> "") {
				$this->DrName->ViewValue = $this->DrName->lookupCacheOption($curVal);
				if ($this->DrName->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`CODE`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->DrName->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = $rswrk->fields('df');
						$this->DrName->ViewValue = $this->DrName->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->DrName->ViewValue = $this->DrName->CurrentValue;
					}
				}
			} else {
				$this->DrName->ViewValue = NULL;
			}
			$this->DrName->ViewCustomAttributes = "";

			// id
			$this->id->LinkCustomAttributes = "";
			$this->id->HrefValue = "";
			$this->id->TooltipValue = "";

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

			// modifiedby
			$this->modifiedby->LinkCustomAttributes = "";
			$this->modifiedby->HrefValue = "";
			$this->modifiedby->TooltipValue = "";

			// modifieddatetime
			$this->modifieddatetime->LinkCustomAttributes = "";
			$this->modifieddatetime->HrefValue = "";
			$this->modifieddatetime->TooltipValue = "";

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

			// PatientSearch
			$this->PatientSearch->LinkCustomAttributes = "";
			$this->PatientSearch->HrefValue = "";
			$this->PatientSearch->TooltipValue = "";

			// TemplateDrNotes
			$this->TemplateDrNotes->LinkCustomAttributes = "";
			$this->TemplateDrNotes->HrefValue = "";
			$this->TemplateDrNotes->TooltipValue = "";

			// reportheader
			$this->reportheader->LinkCustomAttributes = "";
			$this->reportheader->HrefValue = "";
			$this->reportheader->TooltipValue = "";

			// Purpose
			$this->Purpose->LinkCustomAttributes = "";
			$this->Purpose->HrefValue = "";
			$this->Purpose->TooltipValue = "";

			// DrName
			$this->DrName->LinkCustomAttributes = "";
			$this->DrName->HrefValue = "";
			$this->DrName->TooltipValue = "";
		} elseif ($this->RowType == ROWTYPE_EDIT) { // Edit row

			// id
			$this->id->EditAttrs["class"] = "form-control";
			$this->id->EditCustomAttributes = "";
			$this->id->EditValue = $this->id->CurrentValue;
			$this->id->ViewCustomAttributes = "";

			// procedurenotes
			$this->procedurenotes->EditAttrs["class"] = "form-control";
			$this->procedurenotes->EditCustomAttributes = "";
			$this->procedurenotes->EditValue = HtmlEncode($this->procedurenotes->CurrentValue);
			$this->procedurenotes->PlaceHolder = RemoveHtml($this->procedurenotes->caption());

			// NextReviewDate
			$this->NextReviewDate->EditAttrs["class"] = "form-control";
			$this->NextReviewDate->EditCustomAttributes = "";
			$this->NextReviewDate->EditValue = HtmlEncode(FormatDateTime($this->NextReviewDate->CurrentValue, 7));
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
			$this->EDD->EditValue = HtmlEncode(FormatDateTime($this->EDD->CurrentValue, 7));
			$this->EDD->PlaceHolder = RemoveHtml($this->EDD->caption());

			// SerologyPositive
			$this->SerologyPositive->EditCustomAttributes = "";
			$this->SerologyPositive->EditValue = $this->SerologyPositive->options(FALSE);

			// Allergy
			$this->Allergy->EditAttrs["class"] = "form-control";
			$this->Allergy->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Allergy->CurrentValue = HtmlDecode($this->Allergy->CurrentValue);
			$this->Allergy->EditValue = HtmlEncode($this->Allergy->CurrentValue);
			$curVal = strval($this->Allergy->CurrentValue);
			if ($curVal <> "") {
				$this->Allergy->EditValue = $this->Allergy->lookupCacheOption($curVal);
				if ($this->Allergy->EditValue === NULL) { // Lookup from database
					$filterWrk = "`Generic`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->Allergy->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = HtmlEncode($rswrk->fields('df'));
						$this->Allergy->EditValue = $this->Allergy->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->Allergy->EditValue = HtmlEncode($this->Allergy->CurrentValue);
					}
				}
			} else {
				$this->Allergy->EditValue = NULL;
			}
			$this->Allergy->PlaceHolder = RemoveHtml($this->Allergy->caption());

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
			// LMP

			$this->LMP->EditAttrs["class"] = "form-control";
			$this->LMP->EditCustomAttributes = "";
			$this->LMP->EditValue = HtmlEncode(FormatDateTime($this->LMP->CurrentValue, 7));
			$this->LMP->PlaceHolder = RemoveHtml($this->LMP->caption());

			// Procedure
			$this->Procedure->EditAttrs["class"] = "form-control";
			$this->Procedure->EditCustomAttributes = "";
			$this->Procedure->EditValue = HtmlEncode($this->Procedure->CurrentValue);
			$this->Procedure->PlaceHolder = RemoveHtml($this->Procedure->caption());

			// ProcedureDateTime
			$this->ProcedureDateTime->EditAttrs["class"] = "form-control";
			$this->ProcedureDateTime->EditCustomAttributes = "";
			$this->ProcedureDateTime->EditValue = HtmlEncode(FormatDateTime($this->ProcedureDateTime->CurrentValue, 11));
			$this->ProcedureDateTime->PlaceHolder = RemoveHtml($this->ProcedureDateTime->caption());

			// ICSIDate
			$this->ICSIDate->EditAttrs["class"] = "form-control";
			$this->ICSIDate->EditCustomAttributes = "";
			$this->ICSIDate->EditValue = HtmlEncode(FormatDateTime($this->ICSIDate->CurrentValue, 7));
			$this->ICSIDate->PlaceHolder = RemoveHtml($this->ICSIDate->caption());

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
					$this->PatientSearch->ViewValue = $this->PatientSearch->displayValue($arwrk);
				} else {
					$this->PatientSearch->ViewValue = $Language->phrase("PleaseSelect");
				}
				$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
				if ($rswrk) $rswrk->Close();
				$this->PatientSearch->EditValue = $arwrk;
			}

			// TemplateDrNotes
			$this->TemplateDrNotes->EditAttrs["class"] = "form-control";
			$this->TemplateDrNotes->EditCustomAttributes = "";
			$curVal = trim(strval($this->TemplateDrNotes->CurrentValue));
			if ($curVal <> "")
				$this->TemplateDrNotes->ViewValue = $this->TemplateDrNotes->lookupCacheOption($curVal);
			else
				$this->TemplateDrNotes->ViewValue = $this->TemplateDrNotes->Lookup !== NULL && is_array($this->TemplateDrNotes->Lookup->Options) ? $curVal : NULL;
			if ($this->TemplateDrNotes->ViewValue !== NULL) { // Load from cache
				$this->TemplateDrNotes->EditValue = array_values($this->TemplateDrNotes->Lookup->Options);
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`TemplateName`" . SearchString("=", $this->TemplateDrNotes->CurrentValue, DATATYPE_STRING, "");
				}
				$lookupFilter = function() {
					return "`TemplateType`='Doctor Notes'";
				};
				$lookupFilter = $lookupFilter->bindTo($this);
				$sqlWrk = $this->TemplateDrNotes->Lookup->getSql(TRUE, $filterWrk, $lookupFilter, $this);
				$rswrk = Conn()->execute($sqlWrk);
				$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
				if ($rswrk) $rswrk->Close();
				$this->TemplateDrNotes->EditValue = $arwrk;
			}

			// reportheader
			$this->reportheader->EditCustomAttributes = "";
			$this->reportheader->EditValue = $this->reportheader->options(FALSE);

			// Purpose
			$this->Purpose->EditAttrs["class"] = "form-control";
			$this->Purpose->EditCustomAttributes = "";
			$this->Purpose->EditValue = HtmlEncode($this->Purpose->CurrentValue);
			$this->Purpose->PlaceHolder = RemoveHtml($this->Purpose->caption());

			// DrName
			$this->DrName->EditCustomAttributes = "";
			$curVal = trim(strval($this->DrName->CurrentValue));
			if ($curVal <> "")
				$this->DrName->ViewValue = $this->DrName->lookupCacheOption($curVal);
			else
				$this->DrName->ViewValue = $this->DrName->Lookup !== NULL && is_array($this->DrName->Lookup->Options) ? $curVal : NULL;
			if ($this->DrName->ViewValue !== NULL) { // Load from cache
				$this->DrName->EditValue = array_values($this->DrName->Lookup->Options);
				if ($this->DrName->ViewValue == "")
					$this->DrName->ViewValue = $Language->phrase("PleaseSelect");
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`CODE`" . SearchString("=", $this->DrName->CurrentValue, DATATYPE_STRING, "");
				}
				$sqlWrk = $this->DrName->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = array();
					$arwrk[1] = HtmlEncode($rswrk->fields('df'));
					$this->DrName->ViewValue = $this->DrName->displayValue($arwrk);
				} else {
					$this->DrName->ViewValue = $Language->phrase("PleaseSelect");
				}
				$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
				if ($rswrk) $rswrk->Close();
				$this->DrName->EditValue = $arwrk;
			}

			// Edit refer script
			// id

			$this->id->LinkCustomAttributes = "";
			$this->id->HrefValue = "";

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

			// modifiedby
			$this->modifiedby->LinkCustomAttributes = "";
			$this->modifiedby->HrefValue = "";

			// modifieddatetime
			$this->modifieddatetime->LinkCustomAttributes = "";
			$this->modifieddatetime->HrefValue = "";

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

			// PatientSearch
			$this->PatientSearch->LinkCustomAttributes = "";
			$this->PatientSearch->HrefValue = "";

			// TemplateDrNotes
			$this->TemplateDrNotes->LinkCustomAttributes = "";
			$this->TemplateDrNotes->HrefValue = "";

			// reportheader
			$this->reportheader->LinkCustomAttributes = "";
			$this->reportheader->HrefValue = "";

			// Purpose
			$this->Purpose->LinkCustomAttributes = "";
			$this->Purpose->HrefValue = "";

			// DrName
			$this->DrName->LinkCustomAttributes = "";
			$this->DrName->HrefValue = "";
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
		if ($this->PatID->Required) {
			if (!$this->PatID->IsDetailKey && $this->PatID->FormValue != NULL && $this->PatID->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PatID->caption(), $this->PatID->RequiredErrorMessage));
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
		if ($this->MobileNumber->Required) {
			if (!$this->MobileNumber->IsDetailKey && $this->MobileNumber->FormValue != NULL && $this->MobileNumber->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->MobileNumber->caption(), $this->MobileNumber->RequiredErrorMessage));
			}
		}
		if ($this->Telephone->Required) {
			if (!$this->Telephone->IsDetailKey && $this->Telephone->FormValue != NULL && $this->Telephone->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Telephone->caption(), $this->Telephone->RequiredErrorMessage));
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
		if (!CheckEuroDate($this->NextReviewDate->FormValue)) {
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
		if (!CheckEuroDate($this->EDD->FormValue)) {
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
		if (!CheckEuroDate($this->LMP->FormValue)) {
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
		if ($this->ICSIDate->Required) {
			if (!$this->ICSIDate->IsDetailKey && $this->ICSIDate->FormValue != NULL && $this->ICSIDate->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->ICSIDate->caption(), $this->ICSIDate->RequiredErrorMessage));
			}
		}
		if (!CheckEuroDate($this->ICSIDate->FormValue)) {
			AddMessage($FormError, $this->ICSIDate->errorMessage());
		}
		if ($this->PatientSearch->Required) {
			if (!$this->PatientSearch->IsDetailKey && $this->PatientSearch->FormValue != NULL && $this->PatientSearch->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PatientSearch->caption(), $this->PatientSearch->RequiredErrorMessage));
			}
		}
		if ($this->HospID->Required) {
			if (!$this->HospID->IsDetailKey && $this->HospID->FormValue != NULL && $this->HospID->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->HospID->caption(), $this->HospID->RequiredErrorMessage));
			}
		}
		if ($this->createdUserName->Required) {
			if (!$this->createdUserName->IsDetailKey && $this->createdUserName->FormValue != NULL && $this->createdUserName->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->createdUserName->caption(), $this->createdUserName->RequiredErrorMessage));
			}
		}
		if ($this->TemplateDrNotes->Required) {
			if (!$this->TemplateDrNotes->IsDetailKey && $this->TemplateDrNotes->FormValue != NULL && $this->TemplateDrNotes->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->TemplateDrNotes->caption(), $this->TemplateDrNotes->RequiredErrorMessage));
			}
		}
		if ($this->reportheader->Required) {
			if ($this->reportheader->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->reportheader->caption(), $this->reportheader->RequiredErrorMessage));
			}
		}
		if ($this->Purpose->Required) {
			if (!$this->Purpose->IsDetailKey && $this->Purpose->FormValue != NULL && $this->Purpose->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Purpose->caption(), $this->Purpose->RequiredErrorMessage));
			}
		}
		if ($this->DrName->Required) {
			if (!$this->DrName->IsDetailKey && $this->DrName->FormValue != NULL && $this->DrName->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->DrName->caption(), $this->DrName->RequiredErrorMessage));
			}
		}

		// Validate detail grid
		$detailTblVar = explode(",", $this->getCurrentDetailTable());
		if (in_array("patient_an_registration", $detailTblVar) && $GLOBALS["patient_an_registration"]->DetailEdit) {
			if (!isset($GLOBALS["patient_an_registration_grid"]))
				$GLOBALS["patient_an_registration_grid"] = new patient_an_registration_grid(); // Get detail page object
			$GLOBALS["patient_an_registration_grid"]->validateGridForm();
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

			// Begin transaction
			if ($this->getCurrentDetailTable() <> "")
				$conn->beginTrans();

			// Save old values
			$rsold = &$rs->fields;
			$this->loadDbValues($rsold);
			$rsnew = [];

			// procedurenotes
			$this->procedurenotes->setDbValueDef($rsnew, $this->procedurenotes->CurrentValue, NULL, $this->procedurenotes->ReadOnly);

			// NextReviewDate
			$this->NextReviewDate->setDbValueDef($rsnew, UnFormatDateTime($this->NextReviewDate->CurrentValue, 7), NULL, $this->NextReviewDate->ReadOnly);

			// ICSIAdvised
			$this->ICSIAdvised->setDbValueDef($rsnew, $this->ICSIAdvised->CurrentValue, NULL, $this->ICSIAdvised->ReadOnly);

			// DeliveryRegistered
			$this->DeliveryRegistered->setDbValueDef($rsnew, $this->DeliveryRegistered->CurrentValue, NULL, $this->DeliveryRegistered->ReadOnly);

			// EDD
			$this->EDD->setDbValueDef($rsnew, UnFormatDateTime($this->EDD->CurrentValue, 7), NULL, $this->EDD->ReadOnly);

			// SerologyPositive
			$this->SerologyPositive->setDbValueDef($rsnew, $this->SerologyPositive->CurrentValue, NULL, $this->SerologyPositive->ReadOnly);

			// Allergy
			$this->Allergy->setDbValueDef($rsnew, $this->Allergy->CurrentValue, NULL, $this->Allergy->ReadOnly);

			// status
			$this->status->setDbValueDef($rsnew, $this->status->CurrentValue, 0, $this->status->ReadOnly);

			// modifiedby
			$this->modifiedby->setDbValueDef($rsnew, GetUserID(), NULL);
			$rsnew['modifiedby'] = &$this->modifiedby->DbValue;

			// modifieddatetime
			$this->modifieddatetime->setDbValueDef($rsnew, CurrentDateTime(), NULL);
			$rsnew['modifieddatetime'] = &$this->modifieddatetime->DbValue;

			// LMP
			$this->LMP->setDbValueDef($rsnew, UnFormatDateTime($this->LMP->CurrentValue, 7), NULL, $this->LMP->ReadOnly);

			// Procedure
			$this->Procedure->setDbValueDef($rsnew, $this->Procedure->CurrentValue, NULL, $this->Procedure->ReadOnly);

			// ProcedureDateTime
			$this->ProcedureDateTime->setDbValueDef($rsnew, UnFormatDateTime($this->ProcedureDateTime->CurrentValue, 11), NULL, $this->ProcedureDateTime->ReadOnly);

			// ICSIDate
			$this->ICSIDate->setDbValueDef($rsnew, UnFormatDateTime($this->ICSIDate->CurrentValue, 7), NULL, $this->ICSIDate->ReadOnly);

			// PatientSearch
			$this->PatientSearch->setDbValueDef($rsnew, $this->PatientSearch->CurrentValue, NULL, $this->PatientSearch->ReadOnly);

			// TemplateDrNotes
			$this->TemplateDrNotes->setDbValueDef($rsnew, $this->TemplateDrNotes->CurrentValue, "", $this->TemplateDrNotes->ReadOnly);

			// reportheader
			$this->reportheader->setDbValueDef($rsnew, $this->reportheader->CurrentValue, NULL, $this->reportheader->ReadOnly);

			// Purpose
			$this->Purpose->setDbValueDef($rsnew, $this->Purpose->CurrentValue, NULL, $this->Purpose->ReadOnly);

			// DrName
			$this->DrName->setDbValueDef($rsnew, $this->DrName->CurrentValue, NULL, $this->DrName->ReadOnly);

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

				// Update detail records
				$detailTblVar = explode(",", $this->getCurrentDetailTable());
				if ($editRow) {
					if (in_array("patient_an_registration", $detailTblVar) && $GLOBALS["patient_an_registration"]->DetailEdit) {
						if (!isset($GLOBALS["patient_an_registration_grid"]))
							$GLOBALS["patient_an_registration_grid"] = new patient_an_registration_grid(); // Get detail page object
						$Security->loadCurrentUserLevel($this->ProjectID . "patient_an_registration"); // Load user level of detail table
						$editRow = $GLOBALS["patient_an_registration_grid"]->gridUpdate();
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
			if (in_array("patient_an_registration", $detailTblVar)) {
				if (!isset($GLOBALS["patient_an_registration_grid"]))
					$GLOBALS["patient_an_registration_grid"] = new patient_an_registration_grid();
				if ($GLOBALS["patient_an_registration_grid"]->DetailEdit) {
					$GLOBALS["patient_an_registration_grid"]->CurrentMode = "edit";
					$GLOBALS["patient_an_registration_grid"]->CurrentAction = "gridedit";

					// Save current master table to detail table
					$GLOBALS["patient_an_registration_grid"]->setCurrentMasterTable($this->TableVar);
					$GLOBALS["patient_an_registration_grid"]->setStartRecordNumber(1);
					$GLOBALS["patient_an_registration_grid"]->pid->IsDetailKey = TRUE;
					$GLOBALS["patient_an_registration_grid"]->pid->CurrentValue = $this->PatientId->CurrentValue;
					$GLOBALS["patient_an_registration_grid"]->pid->setSessionValue($GLOBALS["patient_an_registration_grid"]->pid->CurrentValue);
					$GLOBALS["patient_an_registration_grid"]->fid->IsDetailKey = TRUE;
					$GLOBALS["patient_an_registration_grid"]->fid->CurrentValue = $this->id->CurrentValue;
					$GLOBALS["patient_an_registration_grid"]->fid->setSessionValue($GLOBALS["patient_an_registration_grid"]->fid->CurrentValue);
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
		$Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("patient_opd_follow_uplist.php"), "", $this->TableVar, TRUE);
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
				case "x_TemplateDrNotes":
					$lookupFilter = function() {
						return "`TemplateType`='Doctor Notes'";
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
						case "x_Allergy":
							break;
						case "x_status":
							break;
						case "x_PatientSearch":
							break;
						case "x_TemplateDrNotes":
							break;
						case "x_DrName":
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
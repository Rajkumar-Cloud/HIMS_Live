<?php
namespace PHPMaker2019\HIMS;

/**
 * Page class
 */
class view_lab_service_sub_edit extends view_lab_service_sub
{

	// Page ID
	public $PageID = "edit";

	// Project ID
	public $ProjectID = "{EA4F6D13-AF8F-428D-9EA7-BA88D1107EC3}";

	// Table name
	public $TableName = 'view_lab_service_sub';

	// Page object name
	public $PageObjName = "view_lab_service_sub_edit";

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

		// Table object (view_lab_service_sub)
		if (!isset($GLOBALS["view_lab_service_sub"]) || get_class($GLOBALS["view_lab_service_sub"]) == PROJECT_NAMESPACE . "view_lab_service_sub") {
			$GLOBALS["view_lab_service_sub"] = &$this;
			$GLOBALS["Table"] = &$GLOBALS["view_lab_service_sub"];
		}
		$this->CancelUrl = $this->pageUrl() . "action=cancel";

		// Table object (user_login)
		if (!isset($GLOBALS['user_login']))
			$GLOBALS['user_login'] = new user_login();

		// Table object (view_lab_service)
		if (!isset($GLOBALS['view_lab_service']))
			$GLOBALS['view_lab_service'] = new view_lab_service();

		// Page ID
		if (!defined(PROJECT_NAMESPACE . "PAGE_ID"))
			define(PROJECT_NAMESPACE . "PAGE_ID", 'edit');

		// Table name (for backward compatibility)
		if (!defined(PROJECT_NAMESPACE . "TABLE_NAME"))
			define(PROJECT_NAMESPACE . "TABLE_NAME", 'view_lab_service_sub');

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
		global $EXPORT, $view_lab_service_sub;
		if ($this->CustomExport && $this->CustomExport == $this->Export && array_key_exists($this->CustomExport, $EXPORT)) {
				$content = ob_get_contents();
			if ($ExportFileName == "")
				$ExportFileName = $this->TableVar;
			$class = PROJECT_NAMESPACE . $EXPORT[$this->CustomExport];
			if (class_exists($class)) {
				$doc = new $class($view_lab_service_sub);
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
					if ($pageName == "view_lab_service_subview.php")
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
			$key .= @$ar['Id'];
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
			$this->Id->Visible = FALSE;
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
					$this->terminate(GetUrl("view_lab_service_sublist.php"));
				else
					$this->terminate(GetUrl("login.php"));
				return;
			}
		}

		// Create form object
		$CurrentForm = new HttpForm();
		$this->CurrentAction = Param("action"); // Set up current action
		$this->Id->setVisibility();
		$this->CODE->setVisibility();
		$this->SERVICE->setVisibility();
		$this->UNITS->setVisibility();
		$this->AMOUNT->setVisibility();
		$this->SERVICE_TYPE->setVisibility();
		$this->DEPARTMENT->setVisibility();
		$this->Created->Visible = FALSE;
		$this->CreatedDateTime->Visible = FALSE;
		$this->Modified->setVisibility();
		$this->ModifiedDateTime->setVisibility();
		$this->mas_services_billingcol->setVisibility();
		$this->DrShareAmount->setVisibility();
		$this->HospShareAmount->setVisibility();
		$this->DrSharePer->setVisibility();
		$this->HospSharePer->setVisibility();
		$this->HospID->setVisibility();
		$this->TestSubCd->setVisibility();
		$this->Method->setVisibility();
		$this->Order->setVisibility();
		$this->Form->setVisibility();
		$this->ResType->setVisibility();
		$this->UnitCD->setVisibility();
		$this->RefValue->setVisibility();
		$this->Sample->setVisibility();
		$this->NoD->setVisibility();
		$this->BillOrder->setVisibility();
		$this->Formula->setVisibility();
		$this->Inactive->setVisibility();
		$this->Outsource->setVisibility();
		$this->CollSample->setVisibility();
		$this->TestType->setVisibility();
		$this->NoHeading->setVisibility();
		$this->ChemicalCode->setVisibility();
		$this->ChemicalName->setVisibility();
		$this->Utilaization->setVisibility();
		$this->Interpretation->setVisibility();
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
		$this->setupLookupOptions($this->UNITS);
		$this->setupLookupOptions($this->SERVICE_TYPE);

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
			if ($CurrentForm->hasValue("x_Id")) {
				$this->Id->setFormValue($CurrentForm->getValue("x_Id"));
			}
		} else {
			$this->CurrentAction = "show"; // Default action is display

			// Load key from QueryString
			$loadByQuery = FALSE;
			if (Get("Id") !== NULL) {
				$this->Id->setQueryStringValue(Get("Id"));
				$loadByQuery = TRUE;
			} else {
				$this->Id->CurrentValue = NULL;
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
					$this->terminate("view_lab_service_sublist.php"); // No matching record, return to list
				}
				break;
			case "update": // Update
				$returnUrl = $this->getReturnUrl();
				if (GetPageName($returnUrl) == "view_lab_service_sublist.php")
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

		// Check field name 'Id' first before field var 'x_Id'
		$val = $CurrentForm->hasValue("Id") ? $CurrentForm->getValue("Id") : $CurrentForm->getValue("x_Id");
		if (!$this->Id->IsDetailKey)
			$this->Id->setFormValue($val);

		// Check field name 'CODE' first before field var 'x_CODE'
		$val = $CurrentForm->hasValue("CODE") ? $CurrentForm->getValue("CODE") : $CurrentForm->getValue("x_CODE");
		if (!$this->CODE->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->CODE->Visible = FALSE; // Disable update for API request
			else
				$this->CODE->setFormValue($val);
		}

		// Check field name 'SERVICE' first before field var 'x_SERVICE'
		$val = $CurrentForm->hasValue("SERVICE") ? $CurrentForm->getValue("SERVICE") : $CurrentForm->getValue("x_SERVICE");
		if (!$this->SERVICE->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->SERVICE->Visible = FALSE; // Disable update for API request
			else
				$this->SERVICE->setFormValue($val);
		}

		// Check field name 'UNITS' first before field var 'x_UNITS'
		$val = $CurrentForm->hasValue("UNITS") ? $CurrentForm->getValue("UNITS") : $CurrentForm->getValue("x_UNITS");
		if (!$this->UNITS->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->UNITS->Visible = FALSE; // Disable update for API request
			else
				$this->UNITS->setFormValue($val);
		}

		// Check field name 'AMOUNT' first before field var 'x_AMOUNT'
		$val = $CurrentForm->hasValue("AMOUNT") ? $CurrentForm->getValue("AMOUNT") : $CurrentForm->getValue("x_AMOUNT");
		if (!$this->AMOUNT->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->AMOUNT->Visible = FALSE; // Disable update for API request
			else
				$this->AMOUNT->setFormValue($val);
		}

		// Check field name 'SERVICE_TYPE' first before field var 'x_SERVICE_TYPE'
		$val = $CurrentForm->hasValue("SERVICE_TYPE") ? $CurrentForm->getValue("SERVICE_TYPE") : $CurrentForm->getValue("x_SERVICE_TYPE");
		if (!$this->SERVICE_TYPE->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->SERVICE_TYPE->Visible = FALSE; // Disable update for API request
			else
				$this->SERVICE_TYPE->setFormValue($val);
		}

		// Check field name 'DEPARTMENT' first before field var 'x_DEPARTMENT'
		$val = $CurrentForm->hasValue("DEPARTMENT") ? $CurrentForm->getValue("DEPARTMENT") : $CurrentForm->getValue("x_DEPARTMENT");
		if (!$this->DEPARTMENT->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->DEPARTMENT->Visible = FALSE; // Disable update for API request
			else
				$this->DEPARTMENT->setFormValue($val);
		}

		// Check field name 'Modified' first before field var 'x_Modified'
		$val = $CurrentForm->hasValue("Modified") ? $CurrentForm->getValue("Modified") : $CurrentForm->getValue("x_Modified");
		if (!$this->Modified->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Modified->Visible = FALSE; // Disable update for API request
			else
				$this->Modified->setFormValue($val);
		}

		// Check field name 'ModifiedDateTime' first before field var 'x_ModifiedDateTime'
		$val = $CurrentForm->hasValue("ModifiedDateTime") ? $CurrentForm->getValue("ModifiedDateTime") : $CurrentForm->getValue("x_ModifiedDateTime");
		if (!$this->ModifiedDateTime->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->ModifiedDateTime->Visible = FALSE; // Disable update for API request
			else
				$this->ModifiedDateTime->setFormValue($val);
			$this->ModifiedDateTime->CurrentValue = UnFormatDateTime($this->ModifiedDateTime->CurrentValue, 0);
		}

		// Check field name 'mas_services_billingcol' first before field var 'x_mas_services_billingcol'
		$val = $CurrentForm->hasValue("mas_services_billingcol") ? $CurrentForm->getValue("mas_services_billingcol") : $CurrentForm->getValue("x_mas_services_billingcol");
		if (!$this->mas_services_billingcol->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->mas_services_billingcol->Visible = FALSE; // Disable update for API request
			else
				$this->mas_services_billingcol->setFormValue($val);
		}

		// Check field name 'DrShareAmount' first before field var 'x_DrShareAmount'
		$val = $CurrentForm->hasValue("DrShareAmount") ? $CurrentForm->getValue("DrShareAmount") : $CurrentForm->getValue("x_DrShareAmount");
		if (!$this->DrShareAmount->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->DrShareAmount->Visible = FALSE; // Disable update for API request
			else
				$this->DrShareAmount->setFormValue($val);
		}

		// Check field name 'HospShareAmount' first before field var 'x_HospShareAmount'
		$val = $CurrentForm->hasValue("HospShareAmount") ? $CurrentForm->getValue("HospShareAmount") : $CurrentForm->getValue("x_HospShareAmount");
		if (!$this->HospShareAmount->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->HospShareAmount->Visible = FALSE; // Disable update for API request
			else
				$this->HospShareAmount->setFormValue($val);
		}

		// Check field name 'DrSharePer' first before field var 'x_DrSharePer'
		$val = $CurrentForm->hasValue("DrSharePer") ? $CurrentForm->getValue("DrSharePer") : $CurrentForm->getValue("x_DrSharePer");
		if (!$this->DrSharePer->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->DrSharePer->Visible = FALSE; // Disable update for API request
			else
				$this->DrSharePer->setFormValue($val);
		}

		// Check field name 'HospSharePer' first before field var 'x_HospSharePer'
		$val = $CurrentForm->hasValue("HospSharePer") ? $CurrentForm->getValue("HospSharePer") : $CurrentForm->getValue("x_HospSharePer");
		if (!$this->HospSharePer->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->HospSharePer->Visible = FALSE; // Disable update for API request
			else
				$this->HospSharePer->setFormValue($val);
		}

		// Check field name 'HospID' first before field var 'x_HospID'
		$val = $CurrentForm->hasValue("HospID") ? $CurrentForm->getValue("HospID") : $CurrentForm->getValue("x_HospID");
		if (!$this->HospID->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->HospID->Visible = FALSE; // Disable update for API request
			else
				$this->HospID->setFormValue($val);
		}

		// Check field name 'TestSubCd' first before field var 'x_TestSubCd'
		$val = $CurrentForm->hasValue("TestSubCd") ? $CurrentForm->getValue("TestSubCd") : $CurrentForm->getValue("x_TestSubCd");
		if (!$this->TestSubCd->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->TestSubCd->Visible = FALSE; // Disable update for API request
			else
				$this->TestSubCd->setFormValue($val);
		}

		// Check field name 'Method' first before field var 'x_Method'
		$val = $CurrentForm->hasValue("Method") ? $CurrentForm->getValue("Method") : $CurrentForm->getValue("x_Method");
		if (!$this->Method->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Method->Visible = FALSE; // Disable update for API request
			else
				$this->Method->setFormValue($val);
		}

		// Check field name 'Order' first before field var 'x_Order'
		$val = $CurrentForm->hasValue("Order") ? $CurrentForm->getValue("Order") : $CurrentForm->getValue("x_Order");
		if (!$this->Order->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Order->Visible = FALSE; // Disable update for API request
			else
				$this->Order->setFormValue($val);
		}

		// Check field name 'Form' first before field var 'x_Form'
		$val = $CurrentForm->hasValue("Form") ? $CurrentForm->getValue("Form") : $CurrentForm->getValue("x_Form");
		if (!$this->Form->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Form->Visible = FALSE; // Disable update for API request
			else
				$this->Form->setFormValue($val);
		}

		// Check field name 'ResType' first before field var 'x_ResType'
		$val = $CurrentForm->hasValue("ResType") ? $CurrentForm->getValue("ResType") : $CurrentForm->getValue("x_ResType");
		if (!$this->ResType->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->ResType->Visible = FALSE; // Disable update for API request
			else
				$this->ResType->setFormValue($val);
		}

		// Check field name 'UnitCD' first before field var 'x_UnitCD'
		$val = $CurrentForm->hasValue("UnitCD") ? $CurrentForm->getValue("UnitCD") : $CurrentForm->getValue("x_UnitCD");
		if (!$this->UnitCD->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->UnitCD->Visible = FALSE; // Disable update for API request
			else
				$this->UnitCD->setFormValue($val);
		}

		// Check field name 'RefValue' first before field var 'x_RefValue'
		$val = $CurrentForm->hasValue("RefValue") ? $CurrentForm->getValue("RefValue") : $CurrentForm->getValue("x_RefValue");
		if (!$this->RefValue->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->RefValue->Visible = FALSE; // Disable update for API request
			else
				$this->RefValue->setFormValue($val);
		}

		// Check field name 'Sample' first before field var 'x_Sample'
		$val = $CurrentForm->hasValue("Sample") ? $CurrentForm->getValue("Sample") : $CurrentForm->getValue("x_Sample");
		if (!$this->Sample->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Sample->Visible = FALSE; // Disable update for API request
			else
				$this->Sample->setFormValue($val);
		}

		// Check field name 'NoD' first before field var 'x_NoD'
		$val = $CurrentForm->hasValue("NoD") ? $CurrentForm->getValue("NoD") : $CurrentForm->getValue("x_NoD");
		if (!$this->NoD->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->NoD->Visible = FALSE; // Disable update for API request
			else
				$this->NoD->setFormValue($val);
		}

		// Check field name 'BillOrder' first before field var 'x_BillOrder'
		$val = $CurrentForm->hasValue("BillOrder") ? $CurrentForm->getValue("BillOrder") : $CurrentForm->getValue("x_BillOrder");
		if (!$this->BillOrder->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->BillOrder->Visible = FALSE; // Disable update for API request
			else
				$this->BillOrder->setFormValue($val);
		}

		// Check field name 'Formula' first before field var 'x_Formula'
		$val = $CurrentForm->hasValue("Formula") ? $CurrentForm->getValue("Formula") : $CurrentForm->getValue("x_Formula");
		if (!$this->Formula->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Formula->Visible = FALSE; // Disable update for API request
			else
				$this->Formula->setFormValue($val);
		}

		// Check field name 'Inactive' first before field var 'x_Inactive'
		$val = $CurrentForm->hasValue("Inactive") ? $CurrentForm->getValue("Inactive") : $CurrentForm->getValue("x_Inactive");
		if (!$this->Inactive->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Inactive->Visible = FALSE; // Disable update for API request
			else
				$this->Inactive->setFormValue($val);
		}

		// Check field name 'Outsource' first before field var 'x_Outsource'
		$val = $CurrentForm->hasValue("Outsource") ? $CurrentForm->getValue("Outsource") : $CurrentForm->getValue("x_Outsource");
		if (!$this->Outsource->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Outsource->Visible = FALSE; // Disable update for API request
			else
				$this->Outsource->setFormValue($val);
		}

		// Check field name 'CollSample' first before field var 'x_CollSample'
		$val = $CurrentForm->hasValue("CollSample") ? $CurrentForm->getValue("CollSample") : $CurrentForm->getValue("x_CollSample");
		if (!$this->CollSample->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->CollSample->Visible = FALSE; // Disable update for API request
			else
				$this->CollSample->setFormValue($val);
		}

		// Check field name 'TestType' first before field var 'x_TestType'
		$val = $CurrentForm->hasValue("TestType") ? $CurrentForm->getValue("TestType") : $CurrentForm->getValue("x_TestType");
		if (!$this->TestType->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->TestType->Visible = FALSE; // Disable update for API request
			else
				$this->TestType->setFormValue($val);
		}

		// Check field name 'NoHeading' first before field var 'x_NoHeading'
		$val = $CurrentForm->hasValue("NoHeading") ? $CurrentForm->getValue("NoHeading") : $CurrentForm->getValue("x_NoHeading");
		if (!$this->NoHeading->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->NoHeading->Visible = FALSE; // Disable update for API request
			else
				$this->NoHeading->setFormValue($val);
		}

		// Check field name 'ChemicalCode' first before field var 'x_ChemicalCode'
		$val = $CurrentForm->hasValue("ChemicalCode") ? $CurrentForm->getValue("ChemicalCode") : $CurrentForm->getValue("x_ChemicalCode");
		if (!$this->ChemicalCode->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->ChemicalCode->Visible = FALSE; // Disable update for API request
			else
				$this->ChemicalCode->setFormValue($val);
		}

		// Check field name 'ChemicalName' first before field var 'x_ChemicalName'
		$val = $CurrentForm->hasValue("ChemicalName") ? $CurrentForm->getValue("ChemicalName") : $CurrentForm->getValue("x_ChemicalName");
		if (!$this->ChemicalName->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->ChemicalName->Visible = FALSE; // Disable update for API request
			else
				$this->ChemicalName->setFormValue($val);
		}

		// Check field name 'Utilaization' first before field var 'x_Utilaization'
		$val = $CurrentForm->hasValue("Utilaization") ? $CurrentForm->getValue("Utilaization") : $CurrentForm->getValue("x_Utilaization");
		if (!$this->Utilaization->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Utilaization->Visible = FALSE; // Disable update for API request
			else
				$this->Utilaization->setFormValue($val);
		}

		// Check field name 'Interpretation' first before field var 'x_Interpretation'
		$val = $CurrentForm->hasValue("Interpretation") ? $CurrentForm->getValue("Interpretation") : $CurrentForm->getValue("x_Interpretation");
		if (!$this->Interpretation->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Interpretation->Visible = FALSE; // Disable update for API request
			else
				$this->Interpretation->setFormValue($val);
		}
	}

	// Restore form values
	public function restoreFormValues()
	{
		global $CurrentForm;
		$this->Id->CurrentValue = $this->Id->FormValue;
		$this->CODE->CurrentValue = $this->CODE->FormValue;
		$this->SERVICE->CurrentValue = $this->SERVICE->FormValue;
		$this->UNITS->CurrentValue = $this->UNITS->FormValue;
		$this->AMOUNT->CurrentValue = $this->AMOUNT->FormValue;
		$this->SERVICE_TYPE->CurrentValue = $this->SERVICE_TYPE->FormValue;
		$this->DEPARTMENT->CurrentValue = $this->DEPARTMENT->FormValue;
		$this->Modified->CurrentValue = $this->Modified->FormValue;
		$this->ModifiedDateTime->CurrentValue = $this->ModifiedDateTime->FormValue;
		$this->ModifiedDateTime->CurrentValue = UnFormatDateTime($this->ModifiedDateTime->CurrentValue, 0);
		$this->mas_services_billingcol->CurrentValue = $this->mas_services_billingcol->FormValue;
		$this->DrShareAmount->CurrentValue = $this->DrShareAmount->FormValue;
		$this->HospShareAmount->CurrentValue = $this->HospShareAmount->FormValue;
		$this->DrSharePer->CurrentValue = $this->DrSharePer->FormValue;
		$this->HospSharePer->CurrentValue = $this->HospSharePer->FormValue;
		$this->HospID->CurrentValue = $this->HospID->FormValue;
		$this->TestSubCd->CurrentValue = $this->TestSubCd->FormValue;
		$this->Method->CurrentValue = $this->Method->FormValue;
		$this->Order->CurrentValue = $this->Order->FormValue;
		$this->Form->CurrentValue = $this->Form->FormValue;
		$this->ResType->CurrentValue = $this->ResType->FormValue;
		$this->UnitCD->CurrentValue = $this->UnitCD->FormValue;
		$this->RefValue->CurrentValue = $this->RefValue->FormValue;
		$this->Sample->CurrentValue = $this->Sample->FormValue;
		$this->NoD->CurrentValue = $this->NoD->FormValue;
		$this->BillOrder->CurrentValue = $this->BillOrder->FormValue;
		$this->Formula->CurrentValue = $this->Formula->FormValue;
		$this->Inactive->CurrentValue = $this->Inactive->FormValue;
		$this->Outsource->CurrentValue = $this->Outsource->FormValue;
		$this->CollSample->CurrentValue = $this->CollSample->FormValue;
		$this->TestType->CurrentValue = $this->TestType->FormValue;
		$this->NoHeading->CurrentValue = $this->NoHeading->FormValue;
		$this->ChemicalCode->CurrentValue = $this->ChemicalCode->FormValue;
		$this->ChemicalName->CurrentValue = $this->ChemicalName->FormValue;
		$this->Utilaization->CurrentValue = $this->Utilaization->FormValue;
		$this->Interpretation->CurrentValue = $this->Interpretation->FormValue;
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
		$this->Id->setDbValue($row['Id']);
		$this->CODE->setDbValue($row['CODE']);
		$this->SERVICE->setDbValue($row['SERVICE']);
		$this->UNITS->setDbValue($row['UNITS']);
		$this->AMOUNT->setDbValue($row['AMOUNT']);
		$this->SERVICE_TYPE->setDbValue($row['SERVICE_TYPE']);
		$this->DEPARTMENT->setDbValue($row['DEPARTMENT']);
		$this->Created->setDbValue($row['Created']);
		$this->CreatedDateTime->setDbValue($row['CreatedDateTime']);
		$this->Modified->setDbValue($row['Modified']);
		$this->ModifiedDateTime->setDbValue($row['ModifiedDateTime']);
		$this->mas_services_billingcol->setDbValue($row['mas_services_billingcol']);
		$this->DrShareAmount->setDbValue($row['DrShareAmount']);
		$this->HospShareAmount->setDbValue($row['HospShareAmount']);
		$this->DrSharePer->setDbValue($row['DrSharePer']);
		$this->HospSharePer->setDbValue($row['HospSharePer']);
		$this->HospID->setDbValue($row['HospID']);
		$this->TestSubCd->setDbValue($row['TestSubCd']);
		$this->Method->setDbValue($row['Method']);
		$this->Order->setDbValue($row['Order']);
		$this->Form->setDbValue($row['Form']);
		$this->ResType->setDbValue($row['ResType']);
		$this->UnitCD->setDbValue($row['UnitCD']);
		$this->RefValue->setDbValue($row['RefValue']);
		$this->Sample->setDbValue($row['Sample']);
		$this->NoD->setDbValue($row['NoD']);
		$this->BillOrder->setDbValue($row['BillOrder']);
		$this->Formula->setDbValue($row['Formula']);
		$this->Inactive->setDbValue($row['Inactive']);
		$this->Outsource->setDbValue($row['Outsource']);
		$this->CollSample->setDbValue($row['CollSample']);
		$this->TestType->setDbValue($row['TestType']);
		$this->NoHeading->setDbValue($row['NoHeading']);
		$this->ChemicalCode->setDbValue($row['ChemicalCode']);
		$this->ChemicalName->setDbValue($row['ChemicalName']);
		$this->Utilaization->setDbValue($row['Utilaization']);
		$this->Interpretation->setDbValue($row['Interpretation']);
	}

	// Return a row with default values
	protected function newRow()
	{
		$row = [];
		$row['Id'] = NULL;
		$row['CODE'] = NULL;
		$row['SERVICE'] = NULL;
		$row['UNITS'] = NULL;
		$row['AMOUNT'] = NULL;
		$row['SERVICE_TYPE'] = NULL;
		$row['DEPARTMENT'] = NULL;
		$row['Created'] = NULL;
		$row['CreatedDateTime'] = NULL;
		$row['Modified'] = NULL;
		$row['ModifiedDateTime'] = NULL;
		$row['mas_services_billingcol'] = NULL;
		$row['DrShareAmount'] = NULL;
		$row['HospShareAmount'] = NULL;
		$row['DrSharePer'] = NULL;
		$row['HospSharePer'] = NULL;
		$row['HospID'] = NULL;
		$row['TestSubCd'] = NULL;
		$row['Method'] = NULL;
		$row['Order'] = NULL;
		$row['Form'] = NULL;
		$row['ResType'] = NULL;
		$row['UnitCD'] = NULL;
		$row['RefValue'] = NULL;
		$row['Sample'] = NULL;
		$row['NoD'] = NULL;
		$row['BillOrder'] = NULL;
		$row['Formula'] = NULL;
		$row['Inactive'] = NULL;
		$row['Outsource'] = NULL;
		$row['CollSample'] = NULL;
		$row['TestType'] = NULL;
		$row['NoHeading'] = NULL;
		$row['ChemicalCode'] = NULL;
		$row['ChemicalName'] = NULL;
		$row['Utilaization'] = NULL;
		$row['Interpretation'] = NULL;
		return $row;
	}

	// Load old record
	protected function loadOldRecord()
	{

		// Load key values from Session
		$validKey = TRUE;
		if (strval($this->getKey("Id")) <> "")
			$this->Id->CurrentValue = $this->getKey("Id"); // Id
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

		if ($this->AMOUNT->FormValue == $this->AMOUNT->CurrentValue && is_numeric(ConvertToFloatString($this->AMOUNT->CurrentValue)))
			$this->AMOUNT->CurrentValue = ConvertToFloatString($this->AMOUNT->CurrentValue);

		// Convert decimal values if posted back
		if ($this->DrShareAmount->FormValue == $this->DrShareAmount->CurrentValue && is_numeric(ConvertToFloatString($this->DrShareAmount->CurrentValue)))
			$this->DrShareAmount->CurrentValue = ConvertToFloatString($this->DrShareAmount->CurrentValue);

		// Convert decimal values if posted back
		if ($this->HospShareAmount->FormValue == $this->HospShareAmount->CurrentValue && is_numeric(ConvertToFloatString($this->HospShareAmount->CurrentValue)))
			$this->HospShareAmount->CurrentValue = ConvertToFloatString($this->HospShareAmount->CurrentValue);

		// Convert decimal values if posted back
		if ($this->Order->FormValue == $this->Order->CurrentValue && is_numeric(ConvertToFloatString($this->Order->CurrentValue)))
			$this->Order->CurrentValue = ConvertToFloatString($this->Order->CurrentValue);

		// Convert decimal values if posted back
		if ($this->NoD->FormValue == $this->NoD->CurrentValue && is_numeric(ConvertToFloatString($this->NoD->CurrentValue)))
			$this->NoD->CurrentValue = ConvertToFloatString($this->NoD->CurrentValue);

		// Convert decimal values if posted back
		if ($this->BillOrder->FormValue == $this->BillOrder->CurrentValue && is_numeric(ConvertToFloatString($this->BillOrder->CurrentValue)))
			$this->BillOrder->CurrentValue = ConvertToFloatString($this->BillOrder->CurrentValue);

		// Call Row_Rendering event
		$this->Row_Rendering();

		// Common render codes for all row types
		// Id
		// CODE
		// SERVICE
		// UNITS
		// AMOUNT
		// SERVICE_TYPE
		// DEPARTMENT
		// Created
		// CreatedDateTime
		// Modified
		// ModifiedDateTime
		// mas_services_billingcol
		// DrShareAmount
		// HospShareAmount
		// DrSharePer
		// HospSharePer
		// HospID
		// TestSubCd
		// Method
		// Order
		// Form
		// ResType
		// UnitCD
		// RefValue
		// Sample
		// NoD
		// BillOrder
		// Formula
		// Inactive
		// Outsource
		// CollSample
		// TestType
		// NoHeading
		// ChemicalCode
		// ChemicalName
		// Utilaization
		// Interpretation

		if ($this->RowType == ROWTYPE_VIEW) { // View row

			// Id
			$this->Id->ViewValue = $this->Id->CurrentValue;
			$this->Id->ViewCustomAttributes = "";

			// CODE
			$this->CODE->ViewValue = $this->CODE->CurrentValue;
			$this->CODE->ViewCustomAttributes = "";

			// SERVICE
			$this->SERVICE->ViewValue = $this->SERVICE->CurrentValue;
			$this->SERVICE->ViewCustomAttributes = "";

			// UNITS
			$curVal = strval($this->UNITS->CurrentValue);
			if ($curVal <> "") {
				$this->UNITS->ViewValue = $this->UNITS->lookupCacheOption($curVal);
				if ($this->UNITS->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
					$sqlWrk = $this->UNITS->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = $rswrk->fields('df');
						$this->UNITS->ViewValue = $this->UNITS->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->UNITS->ViewValue = $this->UNITS->CurrentValue;
					}
				}
			} else {
				$this->UNITS->ViewValue = NULL;
			}
			$this->UNITS->ViewCustomAttributes = "";

			// AMOUNT
			$this->AMOUNT->ViewValue = $this->AMOUNT->CurrentValue;
			$this->AMOUNT->ViewCustomAttributes = "";

			// SERVICE_TYPE
			$curVal = strval($this->SERVICE_TYPE->CurrentValue);
			if ($curVal <> "") {
				$this->SERVICE_TYPE->ViewValue = $this->SERVICE_TYPE->lookupCacheOption($curVal);
				if ($this->SERVICE_TYPE->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->SERVICE_TYPE->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = $rswrk->fields('df');
						$this->SERVICE_TYPE->ViewValue = $this->SERVICE_TYPE->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->SERVICE_TYPE->ViewValue = $this->SERVICE_TYPE->CurrentValue;
					}
				}
			} else {
				$this->SERVICE_TYPE->ViewValue = NULL;
			}
			$this->SERVICE_TYPE->ViewCustomAttributes = "";

			// DEPARTMENT
			if (strval($this->DEPARTMENT->CurrentValue) <> "") {
				$this->DEPARTMENT->ViewValue = $this->DEPARTMENT->optionCaption($this->DEPARTMENT->CurrentValue);
			} else {
				$this->DEPARTMENT->ViewValue = NULL;
			}
			$this->DEPARTMENT->ViewCustomAttributes = "";

			// Modified
			$this->Modified->ViewValue = $this->Modified->CurrentValue;
			$this->Modified->ViewCustomAttributes = "";

			// ModifiedDateTime
			$this->ModifiedDateTime->ViewValue = $this->ModifiedDateTime->CurrentValue;
			$this->ModifiedDateTime->ViewValue = FormatDateTime($this->ModifiedDateTime->ViewValue, 0);
			$this->ModifiedDateTime->ViewCustomAttributes = "";

			// mas_services_billingcol
			$this->mas_services_billingcol->ViewValue = $this->mas_services_billingcol->CurrentValue;
			$this->mas_services_billingcol->ViewCustomAttributes = "";

			// DrShareAmount
			$this->DrShareAmount->ViewValue = $this->DrShareAmount->CurrentValue;
			$this->DrShareAmount->ViewValue = FormatNumber($this->DrShareAmount->ViewValue, 2, -2, -2, -2);
			$this->DrShareAmount->ViewCustomAttributes = "";

			// HospShareAmount
			$this->HospShareAmount->ViewValue = $this->HospShareAmount->CurrentValue;
			$this->HospShareAmount->ViewValue = FormatNumber($this->HospShareAmount->ViewValue, 2, -2, -2, -2);
			$this->HospShareAmount->ViewCustomAttributes = "";

			// DrSharePer
			$this->DrSharePer->ViewValue = $this->DrSharePer->CurrentValue;
			$this->DrSharePer->ViewValue = FormatNumber($this->DrSharePer->ViewValue, 0, -2, -2, -2);
			$this->DrSharePer->ViewCustomAttributes = "";

			// HospSharePer
			$this->HospSharePer->ViewValue = $this->HospSharePer->CurrentValue;
			$this->HospSharePer->ViewValue = FormatNumber($this->HospSharePer->ViewValue, 0, -2, -2, -2);
			$this->HospSharePer->ViewCustomAttributes = "";

			// HospID
			$this->HospID->ViewValue = $this->HospID->CurrentValue;
			$this->HospID->ViewValue = FormatNumber($this->HospID->ViewValue, 0, -2, -2, -2);
			$this->HospID->ViewCustomAttributes = "";

			// TestSubCd
			$this->TestSubCd->ViewValue = $this->TestSubCd->CurrentValue;
			$this->TestSubCd->ViewCustomAttributes = "";

			// Method
			$this->Method->ViewValue = $this->Method->CurrentValue;
			$this->Method->ViewCustomAttributes = "";

			// Order
			$this->Order->ViewValue = $this->Order->CurrentValue;
			$this->Order->ViewValue = FormatNumber($this->Order->ViewValue, 2, -2, -2, -2);
			$this->Order->ViewCustomAttributes = "";

			// Form
			$this->Form->ViewValue = $this->Form->CurrentValue;
			$this->Form->ViewCustomAttributes = "";

			// ResType
			$this->ResType->ViewValue = $this->ResType->CurrentValue;
			$this->ResType->ViewCustomAttributes = "";

			// UnitCD
			$this->UnitCD->ViewValue = $this->UnitCD->CurrentValue;
			$this->UnitCD->ViewCustomAttributes = "";

			// RefValue
			$this->RefValue->ViewValue = $this->RefValue->CurrentValue;
			$this->RefValue->ViewCustomAttributes = "";

			// Sample
			$this->Sample->ViewValue = $this->Sample->CurrentValue;
			$this->Sample->ViewCustomAttributes = "";

			// NoD
			$this->NoD->ViewValue = $this->NoD->CurrentValue;
			$this->NoD->ViewValue = FormatNumber($this->NoD->ViewValue, 2, -2, -2, -2);
			$this->NoD->ViewCustomAttributes = "";

			// BillOrder
			$this->BillOrder->ViewValue = $this->BillOrder->CurrentValue;
			$this->BillOrder->ViewValue = FormatNumber($this->BillOrder->ViewValue, 2, -2, -2, -2);
			$this->BillOrder->ViewCustomAttributes = "";

			// Formula
			$this->Formula->ViewValue = $this->Formula->CurrentValue;
			$this->Formula->ViewCustomAttributes = "";

			// Inactive
			if (strval($this->Inactive->CurrentValue) <> "") {
				$this->Inactive->ViewValue = new OptionValues();
				$arwrk = explode(",", strval($this->Inactive->CurrentValue));
				$cnt = count($arwrk);
				for ($ari = 0; $ari < $cnt; $ari++)
					$this->Inactive->ViewValue->add($this->Inactive->optionCaption(trim($arwrk[$ari])));
			} else {
				$this->Inactive->ViewValue = NULL;
			}
			$this->Inactive->ViewCustomAttributes = "";

			// Outsource
			$this->Outsource->ViewValue = $this->Outsource->CurrentValue;
			$this->Outsource->ViewCustomAttributes = "";

			// CollSample
			$this->CollSample->ViewValue = $this->CollSample->CurrentValue;
			$this->CollSample->ViewCustomAttributes = "";

			// TestType
			if (strval($this->TestType->CurrentValue) <> "") {
				$this->TestType->ViewValue = $this->TestType->optionCaption($this->TestType->CurrentValue);
			} else {
				$this->TestType->ViewValue = NULL;
			}
			$this->TestType->ViewCustomAttributes = "";

			// NoHeading
			$this->NoHeading->ViewValue = $this->NoHeading->CurrentValue;
			$this->NoHeading->ViewCustomAttributes = "";

			// ChemicalCode
			$this->ChemicalCode->ViewValue = $this->ChemicalCode->CurrentValue;
			$this->ChemicalCode->ViewCustomAttributes = "";

			// ChemicalName
			$this->ChemicalName->ViewValue = $this->ChemicalName->CurrentValue;
			$this->ChemicalName->ViewCustomAttributes = "";

			// Utilaization
			$this->Utilaization->ViewValue = $this->Utilaization->CurrentValue;
			$this->Utilaization->ViewCustomAttributes = "";

			// Interpretation
			$this->Interpretation->ViewValue = $this->Interpretation->CurrentValue;
			$this->Interpretation->ViewCustomAttributes = "";

			// Id
			$this->Id->LinkCustomAttributes = "";
			$this->Id->HrefValue = "";
			$this->Id->TooltipValue = "";

			// CODE
			$this->CODE->LinkCustomAttributes = "";
			$this->CODE->HrefValue = "";
			$this->CODE->TooltipValue = "";

			// SERVICE
			$this->SERVICE->LinkCustomAttributes = "";
			$this->SERVICE->HrefValue = "";
			$this->SERVICE->TooltipValue = "";

			// UNITS
			$this->UNITS->LinkCustomAttributes = "";
			$this->UNITS->HrefValue = "";
			$this->UNITS->TooltipValue = "";

			// AMOUNT
			$this->AMOUNT->LinkCustomAttributes = "";
			$this->AMOUNT->HrefValue = "";
			$this->AMOUNT->TooltipValue = "";

			// SERVICE_TYPE
			$this->SERVICE_TYPE->LinkCustomAttributes = "";
			$this->SERVICE_TYPE->HrefValue = "";
			$this->SERVICE_TYPE->TooltipValue = "";

			// DEPARTMENT
			$this->DEPARTMENT->LinkCustomAttributes = "";
			$this->DEPARTMENT->HrefValue = "";
			$this->DEPARTMENT->TooltipValue = "";

			// Modified
			$this->Modified->LinkCustomAttributes = "";
			$this->Modified->HrefValue = "";
			$this->Modified->TooltipValue = "";

			// ModifiedDateTime
			$this->ModifiedDateTime->LinkCustomAttributes = "";
			$this->ModifiedDateTime->HrefValue = "";
			$this->ModifiedDateTime->TooltipValue = "";

			// mas_services_billingcol
			$this->mas_services_billingcol->LinkCustomAttributes = "";
			$this->mas_services_billingcol->HrefValue = "";
			$this->mas_services_billingcol->TooltipValue = "";

			// DrShareAmount
			$this->DrShareAmount->LinkCustomAttributes = "";
			$this->DrShareAmount->HrefValue = "";
			$this->DrShareAmount->TooltipValue = "";

			// HospShareAmount
			$this->HospShareAmount->LinkCustomAttributes = "";
			$this->HospShareAmount->HrefValue = "";
			$this->HospShareAmount->TooltipValue = "";

			// DrSharePer
			$this->DrSharePer->LinkCustomAttributes = "";
			$this->DrSharePer->HrefValue = "";
			$this->DrSharePer->TooltipValue = "";

			// HospSharePer
			$this->HospSharePer->LinkCustomAttributes = "";
			$this->HospSharePer->HrefValue = "";
			$this->HospSharePer->TooltipValue = "";

			// HospID
			$this->HospID->LinkCustomAttributes = "";
			$this->HospID->HrefValue = "";
			$this->HospID->TooltipValue = "";

			// TestSubCd
			$this->TestSubCd->LinkCustomAttributes = "";
			$this->TestSubCd->HrefValue = "";
			$this->TestSubCd->TooltipValue = "";

			// Method
			$this->Method->LinkCustomAttributes = "";
			$this->Method->HrefValue = "";
			$this->Method->TooltipValue = "";

			// Order
			$this->Order->LinkCustomAttributes = "";
			$this->Order->HrefValue = "";
			$this->Order->TooltipValue = "";

			// Form
			$this->Form->LinkCustomAttributes = "";
			$this->Form->HrefValue = "";
			$this->Form->TooltipValue = "";

			// ResType
			$this->ResType->LinkCustomAttributes = "";
			$this->ResType->HrefValue = "";
			$this->ResType->TooltipValue = "";

			// UnitCD
			$this->UnitCD->LinkCustomAttributes = "";
			$this->UnitCD->HrefValue = "";
			$this->UnitCD->TooltipValue = "";

			// RefValue
			$this->RefValue->LinkCustomAttributes = "";
			$this->RefValue->HrefValue = "";
			$this->RefValue->TooltipValue = "";

			// Sample
			$this->Sample->LinkCustomAttributes = "";
			$this->Sample->HrefValue = "";
			$this->Sample->TooltipValue = "";

			// NoD
			$this->NoD->LinkCustomAttributes = "";
			$this->NoD->HrefValue = "";
			$this->NoD->TooltipValue = "";

			// BillOrder
			$this->BillOrder->LinkCustomAttributes = "";
			$this->BillOrder->HrefValue = "";
			$this->BillOrder->TooltipValue = "";

			// Formula
			$this->Formula->LinkCustomAttributes = "";
			$this->Formula->HrefValue = "";
			$this->Formula->TooltipValue = "";

			// Inactive
			$this->Inactive->LinkCustomAttributes = "";
			$this->Inactive->HrefValue = "";
			$this->Inactive->TooltipValue = "";

			// Outsource
			$this->Outsource->LinkCustomAttributes = "";
			$this->Outsource->HrefValue = "";
			$this->Outsource->TooltipValue = "";

			// CollSample
			$this->CollSample->LinkCustomAttributes = "";
			$this->CollSample->HrefValue = "";
			$this->CollSample->TooltipValue = "";

			// TestType
			$this->TestType->LinkCustomAttributes = "";
			$this->TestType->HrefValue = "";
			$this->TestType->TooltipValue = "";

			// NoHeading
			$this->NoHeading->LinkCustomAttributes = "";
			$this->NoHeading->HrefValue = "";
			$this->NoHeading->TooltipValue = "";

			// ChemicalCode
			$this->ChemicalCode->LinkCustomAttributes = "";
			$this->ChemicalCode->HrefValue = "";
			$this->ChemicalCode->TooltipValue = "";

			// ChemicalName
			$this->ChemicalName->LinkCustomAttributes = "";
			$this->ChemicalName->HrefValue = "";
			$this->ChemicalName->TooltipValue = "";

			// Utilaization
			$this->Utilaization->LinkCustomAttributes = "";
			$this->Utilaization->HrefValue = "";
			$this->Utilaization->TooltipValue = "";

			// Interpretation
			$this->Interpretation->LinkCustomAttributes = "";
			$this->Interpretation->HrefValue = "";
			$this->Interpretation->TooltipValue = "";
		} elseif ($this->RowType == ROWTYPE_EDIT) { // Edit row

			// Id
			$this->Id->EditAttrs["class"] = "form-control";
			$this->Id->EditCustomAttributes = "";
			$this->Id->EditValue = $this->Id->CurrentValue;
			$this->Id->ViewCustomAttributes = "";

			// CODE
			$this->CODE->EditAttrs["class"] = "form-control";
			$this->CODE->EditCustomAttributes = "";
			if ($this->CODE->getSessionValue() <> "") {
				$this->CODE->CurrentValue = $this->CODE->getSessionValue();
			$this->CODE->ViewValue = $this->CODE->CurrentValue;
			$this->CODE->ViewCustomAttributes = "";
			} else {
			if (REMOVE_XSS)
				$this->CODE->CurrentValue = HtmlDecode($this->CODE->CurrentValue);
			$this->CODE->EditValue = HtmlEncode($this->CODE->CurrentValue);
			$this->CODE->PlaceHolder = RemoveHtml($this->CODE->caption());
			}

			// SERVICE
			$this->SERVICE->EditAttrs["class"] = "form-control";
			$this->SERVICE->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->SERVICE->CurrentValue = HtmlDecode($this->SERVICE->CurrentValue);
			$this->SERVICE->EditValue = HtmlEncode($this->SERVICE->CurrentValue);
			$this->SERVICE->PlaceHolder = RemoveHtml($this->SERVICE->caption());

			// UNITS
			$this->UNITS->EditCustomAttributes = "";
			$curVal = trim(strval($this->UNITS->CurrentValue));
			if ($curVal <> "")
				$this->UNITS->ViewValue = $this->UNITS->lookupCacheOption($curVal);
			else
				$this->UNITS->ViewValue = $this->UNITS->Lookup !== NULL && is_array($this->UNITS->Lookup->Options) ? $curVal : NULL;
			if ($this->UNITS->ViewValue !== NULL) { // Load from cache
				$this->UNITS->EditValue = array_values($this->UNITS->Lookup->Options);
				if ($this->UNITS->ViewValue == "")
					$this->UNITS->ViewValue = $Language->phrase("PleaseSelect");
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`id`" . SearchString("=", $this->UNITS->CurrentValue, DATATYPE_NUMBER, "");
				}
				$sqlWrk = $this->UNITS->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = array();
					$arwrk[1] = HtmlEncode($rswrk->fields('df'));
					$this->UNITS->ViewValue = $this->UNITS->displayValue($arwrk);
				} else {
					$this->UNITS->ViewValue = $Language->phrase("PleaseSelect");
				}
				$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
				if ($rswrk) $rswrk->Close();
				$this->UNITS->EditValue = $arwrk;
			}

			// AMOUNT
			$this->AMOUNT->EditAttrs["class"] = "form-control";
			$this->AMOUNT->EditCustomAttributes = "";
			$this->AMOUNT->EditValue = HtmlEncode($this->AMOUNT->CurrentValue);
			$this->AMOUNT->PlaceHolder = RemoveHtml($this->AMOUNT->caption());
			if (strval($this->AMOUNT->EditValue) <> "" && is_numeric($this->AMOUNT->EditValue))
				$this->AMOUNT->EditValue = FormatNumber($this->AMOUNT->EditValue, -2, -1, -2, 0);

			// SERVICE_TYPE
			$this->SERVICE_TYPE->EditAttrs["class"] = "form-control";
			$this->SERVICE_TYPE->EditCustomAttributes = "";
			$curVal = trim(strval($this->SERVICE_TYPE->CurrentValue));
			if ($curVal <> "")
				$this->SERVICE_TYPE->ViewValue = $this->SERVICE_TYPE->lookupCacheOption($curVal);
			else
				$this->SERVICE_TYPE->ViewValue = $this->SERVICE_TYPE->Lookup !== NULL && is_array($this->SERVICE_TYPE->Lookup->Options) ? $curVal : NULL;
			if ($this->SERVICE_TYPE->ViewValue !== NULL) { // Load from cache
				$this->SERVICE_TYPE->EditValue = array_values($this->SERVICE_TYPE->Lookup->Options);
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`name`" . SearchString("=", $this->SERVICE_TYPE->CurrentValue, DATATYPE_STRING, "");
				}
				$sqlWrk = $this->SERVICE_TYPE->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
				if ($rswrk) $rswrk->Close();
				$this->SERVICE_TYPE->EditValue = $arwrk;
			}

			// DEPARTMENT
			$this->DEPARTMENT->EditAttrs["class"] = "form-control";
			$this->DEPARTMENT->EditCustomAttributes = "";
			$this->DEPARTMENT->EditValue = $this->DEPARTMENT->options(TRUE);

			// Modified
			// ModifiedDateTime
			// mas_services_billingcol

			$this->mas_services_billingcol->EditAttrs["class"] = "form-control";
			$this->mas_services_billingcol->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->mas_services_billingcol->CurrentValue = HtmlDecode($this->mas_services_billingcol->CurrentValue);
			$this->mas_services_billingcol->EditValue = HtmlEncode($this->mas_services_billingcol->CurrentValue);
			$this->mas_services_billingcol->PlaceHolder = RemoveHtml($this->mas_services_billingcol->caption());

			// DrShareAmount
			$this->DrShareAmount->EditAttrs["class"] = "form-control";
			$this->DrShareAmount->EditCustomAttributes = "";
			$this->DrShareAmount->EditValue = HtmlEncode($this->DrShareAmount->CurrentValue);
			$this->DrShareAmount->PlaceHolder = RemoveHtml($this->DrShareAmount->caption());
			if (strval($this->DrShareAmount->EditValue) <> "" && is_numeric($this->DrShareAmount->EditValue))
				$this->DrShareAmount->EditValue = FormatNumber($this->DrShareAmount->EditValue, -2, -2, -2, -2);

			// HospShareAmount
			$this->HospShareAmount->EditAttrs["class"] = "form-control";
			$this->HospShareAmount->EditCustomAttributes = "";
			$this->HospShareAmount->EditValue = HtmlEncode($this->HospShareAmount->CurrentValue);
			$this->HospShareAmount->PlaceHolder = RemoveHtml($this->HospShareAmount->caption());
			if (strval($this->HospShareAmount->EditValue) <> "" && is_numeric($this->HospShareAmount->EditValue))
				$this->HospShareAmount->EditValue = FormatNumber($this->HospShareAmount->EditValue, -2, -2, -2, -2);

			// DrSharePer
			$this->DrSharePer->EditAttrs["class"] = "form-control";
			$this->DrSharePer->EditCustomAttributes = "";
			$this->DrSharePer->EditValue = HtmlEncode($this->DrSharePer->CurrentValue);
			$this->DrSharePer->PlaceHolder = RemoveHtml($this->DrSharePer->caption());

			// HospSharePer
			$this->HospSharePer->EditAttrs["class"] = "form-control";
			$this->HospSharePer->EditCustomAttributes = "";
			$this->HospSharePer->EditValue = HtmlEncode($this->HospSharePer->CurrentValue);
			$this->HospSharePer->PlaceHolder = RemoveHtml($this->HospSharePer->caption());

			// HospID
			// TestSubCd

			$this->TestSubCd->EditAttrs["class"] = "form-control";
			$this->TestSubCd->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->TestSubCd->CurrentValue = HtmlDecode($this->TestSubCd->CurrentValue);
			$this->TestSubCd->EditValue = HtmlEncode($this->TestSubCd->CurrentValue);
			$this->TestSubCd->PlaceHolder = RemoveHtml($this->TestSubCd->caption());

			// Method
			$this->Method->EditAttrs["class"] = "form-control";
			$this->Method->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Method->CurrentValue = HtmlDecode($this->Method->CurrentValue);
			$this->Method->EditValue = HtmlEncode($this->Method->CurrentValue);
			$this->Method->PlaceHolder = RemoveHtml($this->Method->caption());

			// Order
			$this->Order->EditAttrs["class"] = "form-control";
			$this->Order->EditCustomAttributes = "";
			$this->Order->EditValue = HtmlEncode($this->Order->CurrentValue);
			$this->Order->PlaceHolder = RemoveHtml($this->Order->caption());
			if (strval($this->Order->EditValue) <> "" && is_numeric($this->Order->EditValue))
				$this->Order->EditValue = FormatNumber($this->Order->EditValue, -2, -2, -2, -2);

			// Form
			$this->Form->EditAttrs["class"] = "form-control";
			$this->Form->EditCustomAttributes = "";
			$this->Form->EditValue = HtmlEncode($this->Form->CurrentValue);
			$this->Form->PlaceHolder = RemoveHtml($this->Form->caption());

			// ResType
			$this->ResType->EditAttrs["class"] = "form-control";
			$this->ResType->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->ResType->CurrentValue = HtmlDecode($this->ResType->CurrentValue);
			$this->ResType->EditValue = HtmlEncode($this->ResType->CurrentValue);
			$this->ResType->PlaceHolder = RemoveHtml($this->ResType->caption());

			// UnitCD
			$this->UnitCD->EditAttrs["class"] = "form-control";
			$this->UnitCD->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->UnitCD->CurrentValue = HtmlDecode($this->UnitCD->CurrentValue);
			$this->UnitCD->EditValue = HtmlEncode($this->UnitCD->CurrentValue);
			$this->UnitCD->PlaceHolder = RemoveHtml($this->UnitCD->caption());

			// RefValue
			$this->RefValue->EditAttrs["class"] = "form-control";
			$this->RefValue->EditCustomAttributes = "";
			$this->RefValue->EditValue = HtmlEncode($this->RefValue->CurrentValue);
			$this->RefValue->PlaceHolder = RemoveHtml($this->RefValue->caption());

			// Sample
			$this->Sample->EditAttrs["class"] = "form-control";
			$this->Sample->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Sample->CurrentValue = HtmlDecode($this->Sample->CurrentValue);
			$this->Sample->EditValue = HtmlEncode($this->Sample->CurrentValue);
			$this->Sample->PlaceHolder = RemoveHtml($this->Sample->caption());

			// NoD
			$this->NoD->EditAttrs["class"] = "form-control";
			$this->NoD->EditCustomAttributes = "";
			$this->NoD->EditValue = HtmlEncode($this->NoD->CurrentValue);
			$this->NoD->PlaceHolder = RemoveHtml($this->NoD->caption());
			if (strval($this->NoD->EditValue) <> "" && is_numeric($this->NoD->EditValue))
				$this->NoD->EditValue = FormatNumber($this->NoD->EditValue, -2, -2, -2, -2);

			// BillOrder
			$this->BillOrder->EditAttrs["class"] = "form-control";
			$this->BillOrder->EditCustomAttributes = "";
			$this->BillOrder->EditValue = HtmlEncode($this->BillOrder->CurrentValue);
			$this->BillOrder->PlaceHolder = RemoveHtml($this->BillOrder->caption());
			if (strval($this->BillOrder->EditValue) <> "" && is_numeric($this->BillOrder->EditValue))
				$this->BillOrder->EditValue = FormatNumber($this->BillOrder->EditValue, -2, -2, -2, -2);

			// Formula
			$this->Formula->EditAttrs["class"] = "form-control";
			$this->Formula->EditCustomAttributes = "";
			$this->Formula->EditValue = HtmlEncode($this->Formula->CurrentValue);
			$this->Formula->PlaceHolder = RemoveHtml($this->Formula->caption());

			// Inactive
			$this->Inactive->EditCustomAttributes = "";
			$this->Inactive->EditValue = $this->Inactive->options(FALSE);

			// Outsource
			$this->Outsource->EditAttrs["class"] = "form-control";
			$this->Outsource->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Outsource->CurrentValue = HtmlDecode($this->Outsource->CurrentValue);
			$this->Outsource->EditValue = HtmlEncode($this->Outsource->CurrentValue);
			$this->Outsource->PlaceHolder = RemoveHtml($this->Outsource->caption());

			// CollSample
			$this->CollSample->EditAttrs["class"] = "form-control";
			$this->CollSample->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->CollSample->CurrentValue = HtmlDecode($this->CollSample->CurrentValue);
			$this->CollSample->EditValue = HtmlEncode($this->CollSample->CurrentValue);
			$this->CollSample->PlaceHolder = RemoveHtml($this->CollSample->caption());

			// TestType
			$this->TestType->EditAttrs["class"] = "form-control";
			$this->TestType->EditCustomAttributes = "";
			$this->TestType->EditValue = $this->TestType->options(TRUE);

			// NoHeading
			$this->NoHeading->EditAttrs["class"] = "form-control";
			$this->NoHeading->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->NoHeading->CurrentValue = HtmlDecode($this->NoHeading->CurrentValue);
			$this->NoHeading->EditValue = HtmlEncode($this->NoHeading->CurrentValue);
			$this->NoHeading->PlaceHolder = RemoveHtml($this->NoHeading->caption());

			// ChemicalCode
			$this->ChemicalCode->EditAttrs["class"] = "form-control";
			$this->ChemicalCode->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->ChemicalCode->CurrentValue = HtmlDecode($this->ChemicalCode->CurrentValue);
			$this->ChemicalCode->EditValue = HtmlEncode($this->ChemicalCode->CurrentValue);
			$this->ChemicalCode->PlaceHolder = RemoveHtml($this->ChemicalCode->caption());

			// ChemicalName
			$this->ChemicalName->EditAttrs["class"] = "form-control";
			$this->ChemicalName->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->ChemicalName->CurrentValue = HtmlDecode($this->ChemicalName->CurrentValue);
			$this->ChemicalName->EditValue = HtmlEncode($this->ChemicalName->CurrentValue);
			$this->ChemicalName->PlaceHolder = RemoveHtml($this->ChemicalName->caption());

			// Utilaization
			$this->Utilaization->EditAttrs["class"] = "form-control";
			$this->Utilaization->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Utilaization->CurrentValue = HtmlDecode($this->Utilaization->CurrentValue);
			$this->Utilaization->EditValue = HtmlEncode($this->Utilaization->CurrentValue);
			$this->Utilaization->PlaceHolder = RemoveHtml($this->Utilaization->caption());

			// Interpretation
			$this->Interpretation->EditAttrs["class"] = "form-control";
			$this->Interpretation->EditCustomAttributes = "";
			$this->Interpretation->EditValue = HtmlEncode($this->Interpretation->CurrentValue);
			$this->Interpretation->PlaceHolder = RemoveHtml($this->Interpretation->caption());

			// Edit refer script
			// Id

			$this->Id->LinkCustomAttributes = "";
			$this->Id->HrefValue = "";

			// CODE
			$this->CODE->LinkCustomAttributes = "";
			$this->CODE->HrefValue = "";

			// SERVICE
			$this->SERVICE->LinkCustomAttributes = "";
			$this->SERVICE->HrefValue = "";

			// UNITS
			$this->UNITS->LinkCustomAttributes = "";
			$this->UNITS->HrefValue = "";

			// AMOUNT
			$this->AMOUNT->LinkCustomAttributes = "";
			$this->AMOUNT->HrefValue = "";

			// SERVICE_TYPE
			$this->SERVICE_TYPE->LinkCustomAttributes = "";
			$this->SERVICE_TYPE->HrefValue = "";

			// DEPARTMENT
			$this->DEPARTMENT->LinkCustomAttributes = "";
			$this->DEPARTMENT->HrefValue = "";

			// Modified
			$this->Modified->LinkCustomAttributes = "";
			$this->Modified->HrefValue = "";

			// ModifiedDateTime
			$this->ModifiedDateTime->LinkCustomAttributes = "";
			$this->ModifiedDateTime->HrefValue = "";

			// mas_services_billingcol
			$this->mas_services_billingcol->LinkCustomAttributes = "";
			$this->mas_services_billingcol->HrefValue = "";

			// DrShareAmount
			$this->DrShareAmount->LinkCustomAttributes = "";
			$this->DrShareAmount->HrefValue = "";

			// HospShareAmount
			$this->HospShareAmount->LinkCustomAttributes = "";
			$this->HospShareAmount->HrefValue = "";

			// DrSharePer
			$this->DrSharePer->LinkCustomAttributes = "";
			$this->DrSharePer->HrefValue = "";

			// HospSharePer
			$this->HospSharePer->LinkCustomAttributes = "";
			$this->HospSharePer->HrefValue = "";

			// HospID
			$this->HospID->LinkCustomAttributes = "";
			$this->HospID->HrefValue = "";

			// TestSubCd
			$this->TestSubCd->LinkCustomAttributes = "";
			$this->TestSubCd->HrefValue = "";

			// Method
			$this->Method->LinkCustomAttributes = "";
			$this->Method->HrefValue = "";

			// Order
			$this->Order->LinkCustomAttributes = "";
			$this->Order->HrefValue = "";

			// Form
			$this->Form->LinkCustomAttributes = "";
			$this->Form->HrefValue = "";

			// ResType
			$this->ResType->LinkCustomAttributes = "";
			$this->ResType->HrefValue = "";

			// UnitCD
			$this->UnitCD->LinkCustomAttributes = "";
			$this->UnitCD->HrefValue = "";

			// RefValue
			$this->RefValue->LinkCustomAttributes = "";
			$this->RefValue->HrefValue = "";

			// Sample
			$this->Sample->LinkCustomAttributes = "";
			$this->Sample->HrefValue = "";

			// NoD
			$this->NoD->LinkCustomAttributes = "";
			$this->NoD->HrefValue = "";

			// BillOrder
			$this->BillOrder->LinkCustomAttributes = "";
			$this->BillOrder->HrefValue = "";

			// Formula
			$this->Formula->LinkCustomAttributes = "";
			$this->Formula->HrefValue = "";

			// Inactive
			$this->Inactive->LinkCustomAttributes = "";
			$this->Inactive->HrefValue = "";

			// Outsource
			$this->Outsource->LinkCustomAttributes = "";
			$this->Outsource->HrefValue = "";

			// CollSample
			$this->CollSample->LinkCustomAttributes = "";
			$this->CollSample->HrefValue = "";

			// TestType
			$this->TestType->LinkCustomAttributes = "";
			$this->TestType->HrefValue = "";

			// NoHeading
			$this->NoHeading->LinkCustomAttributes = "";
			$this->NoHeading->HrefValue = "";

			// ChemicalCode
			$this->ChemicalCode->LinkCustomAttributes = "";
			$this->ChemicalCode->HrefValue = "";

			// ChemicalName
			$this->ChemicalName->LinkCustomAttributes = "";
			$this->ChemicalName->HrefValue = "";

			// Utilaization
			$this->Utilaization->LinkCustomAttributes = "";
			$this->Utilaization->HrefValue = "";

			// Interpretation
			$this->Interpretation->LinkCustomAttributes = "";
			$this->Interpretation->HrefValue = "";
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
		if ($this->Id->Required) {
			if (!$this->Id->IsDetailKey && $this->Id->FormValue != NULL && $this->Id->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Id->caption(), $this->Id->RequiredErrorMessage));
			}
		}
		if ($this->CODE->Required) {
			if (!$this->CODE->IsDetailKey && $this->CODE->FormValue != NULL && $this->CODE->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->CODE->caption(), $this->CODE->RequiredErrorMessage));
			}
		}
		if ($this->SERVICE->Required) {
			if (!$this->SERVICE->IsDetailKey && $this->SERVICE->FormValue != NULL && $this->SERVICE->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->SERVICE->caption(), $this->SERVICE->RequiredErrorMessage));
			}
		}
		if ($this->UNITS->Required) {
			if (!$this->UNITS->IsDetailKey && $this->UNITS->FormValue != NULL && $this->UNITS->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->UNITS->caption(), $this->UNITS->RequiredErrorMessage));
			}
		}
		if ($this->AMOUNT->Required) {
			if (!$this->AMOUNT->IsDetailKey && $this->AMOUNT->FormValue != NULL && $this->AMOUNT->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->AMOUNT->caption(), $this->AMOUNT->RequiredErrorMessage));
			}
		}
		if ($this->SERVICE_TYPE->Required) {
			if (!$this->SERVICE_TYPE->IsDetailKey && $this->SERVICE_TYPE->FormValue != NULL && $this->SERVICE_TYPE->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->SERVICE_TYPE->caption(), $this->SERVICE_TYPE->RequiredErrorMessage));
			}
		}
		if ($this->DEPARTMENT->Required) {
			if (!$this->DEPARTMENT->IsDetailKey && $this->DEPARTMENT->FormValue != NULL && $this->DEPARTMENT->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->DEPARTMENT->caption(), $this->DEPARTMENT->RequiredErrorMessage));
			}
		}
		if ($this->Created->Required) {
			if (!$this->Created->IsDetailKey && $this->Created->FormValue != NULL && $this->Created->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Created->caption(), $this->Created->RequiredErrorMessage));
			}
		}
		if ($this->CreatedDateTime->Required) {
			if (!$this->CreatedDateTime->IsDetailKey && $this->CreatedDateTime->FormValue != NULL && $this->CreatedDateTime->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->CreatedDateTime->caption(), $this->CreatedDateTime->RequiredErrorMessage));
			}
		}
		if ($this->Modified->Required) {
			if (!$this->Modified->IsDetailKey && $this->Modified->FormValue != NULL && $this->Modified->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Modified->caption(), $this->Modified->RequiredErrorMessage));
			}
		}
		if ($this->ModifiedDateTime->Required) {
			if (!$this->ModifiedDateTime->IsDetailKey && $this->ModifiedDateTime->FormValue != NULL && $this->ModifiedDateTime->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->ModifiedDateTime->caption(), $this->ModifiedDateTime->RequiredErrorMessage));
			}
		}
		if ($this->mas_services_billingcol->Required) {
			if (!$this->mas_services_billingcol->IsDetailKey && $this->mas_services_billingcol->FormValue != NULL && $this->mas_services_billingcol->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->mas_services_billingcol->caption(), $this->mas_services_billingcol->RequiredErrorMessage));
			}
		}
		if ($this->DrShareAmount->Required) {
			if (!$this->DrShareAmount->IsDetailKey && $this->DrShareAmount->FormValue != NULL && $this->DrShareAmount->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->DrShareAmount->caption(), $this->DrShareAmount->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->DrShareAmount->FormValue)) {
			AddMessage($FormError, $this->DrShareAmount->errorMessage());
		}
		if ($this->HospShareAmount->Required) {
			if (!$this->HospShareAmount->IsDetailKey && $this->HospShareAmount->FormValue != NULL && $this->HospShareAmount->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->HospShareAmount->caption(), $this->HospShareAmount->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->HospShareAmount->FormValue)) {
			AddMessage($FormError, $this->HospShareAmount->errorMessage());
		}
		if ($this->DrSharePer->Required) {
			if (!$this->DrSharePer->IsDetailKey && $this->DrSharePer->FormValue != NULL && $this->DrSharePer->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->DrSharePer->caption(), $this->DrSharePer->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->DrSharePer->FormValue)) {
			AddMessage($FormError, $this->DrSharePer->errorMessage());
		}
		if ($this->HospSharePer->Required) {
			if (!$this->HospSharePer->IsDetailKey && $this->HospSharePer->FormValue != NULL && $this->HospSharePer->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->HospSharePer->caption(), $this->HospSharePer->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->HospSharePer->FormValue)) {
			AddMessage($FormError, $this->HospSharePer->errorMessage());
		}
		if ($this->HospID->Required) {
			if (!$this->HospID->IsDetailKey && $this->HospID->FormValue != NULL && $this->HospID->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->HospID->caption(), $this->HospID->RequiredErrorMessage));
			}
		}
		if ($this->TestSubCd->Required) {
			if (!$this->TestSubCd->IsDetailKey && $this->TestSubCd->FormValue != NULL && $this->TestSubCd->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->TestSubCd->caption(), $this->TestSubCd->RequiredErrorMessage));
			}
		}
		if ($this->Method->Required) {
			if (!$this->Method->IsDetailKey && $this->Method->FormValue != NULL && $this->Method->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Method->caption(), $this->Method->RequiredErrorMessage));
			}
		}
		if ($this->Order->Required) {
			if (!$this->Order->IsDetailKey && $this->Order->FormValue != NULL && $this->Order->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Order->caption(), $this->Order->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->Order->FormValue)) {
			AddMessage($FormError, $this->Order->errorMessage());
		}
		if ($this->Form->Required) {
			if (!$this->Form->IsDetailKey && $this->Form->FormValue != NULL && $this->Form->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Form->caption(), $this->Form->RequiredErrorMessage));
			}
		}
		if ($this->ResType->Required) {
			if (!$this->ResType->IsDetailKey && $this->ResType->FormValue != NULL && $this->ResType->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->ResType->caption(), $this->ResType->RequiredErrorMessage));
			}
		}
		if ($this->UnitCD->Required) {
			if (!$this->UnitCD->IsDetailKey && $this->UnitCD->FormValue != NULL && $this->UnitCD->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->UnitCD->caption(), $this->UnitCD->RequiredErrorMessage));
			}
		}
		if ($this->RefValue->Required) {
			if (!$this->RefValue->IsDetailKey && $this->RefValue->FormValue != NULL && $this->RefValue->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->RefValue->caption(), $this->RefValue->RequiredErrorMessage));
			}
		}
		if ($this->Sample->Required) {
			if (!$this->Sample->IsDetailKey && $this->Sample->FormValue != NULL && $this->Sample->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Sample->caption(), $this->Sample->RequiredErrorMessage));
			}
		}
		if ($this->NoD->Required) {
			if (!$this->NoD->IsDetailKey && $this->NoD->FormValue != NULL && $this->NoD->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->NoD->caption(), $this->NoD->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->NoD->FormValue)) {
			AddMessage($FormError, $this->NoD->errorMessage());
		}
		if ($this->BillOrder->Required) {
			if (!$this->BillOrder->IsDetailKey && $this->BillOrder->FormValue != NULL && $this->BillOrder->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->BillOrder->caption(), $this->BillOrder->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->BillOrder->FormValue)) {
			AddMessage($FormError, $this->BillOrder->errorMessage());
		}
		if ($this->Formula->Required) {
			if (!$this->Formula->IsDetailKey && $this->Formula->FormValue != NULL && $this->Formula->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Formula->caption(), $this->Formula->RequiredErrorMessage));
			}
		}
		if ($this->Inactive->Required) {
			if ($this->Inactive->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Inactive->caption(), $this->Inactive->RequiredErrorMessage));
			}
		}
		if ($this->Outsource->Required) {
			if (!$this->Outsource->IsDetailKey && $this->Outsource->FormValue != NULL && $this->Outsource->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Outsource->caption(), $this->Outsource->RequiredErrorMessage));
			}
		}
		if ($this->CollSample->Required) {
			if (!$this->CollSample->IsDetailKey && $this->CollSample->FormValue != NULL && $this->CollSample->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->CollSample->caption(), $this->CollSample->RequiredErrorMessage));
			}
		}
		if ($this->TestType->Required) {
			if (!$this->TestType->IsDetailKey && $this->TestType->FormValue != NULL && $this->TestType->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->TestType->caption(), $this->TestType->RequiredErrorMessage));
			}
		}
		if ($this->NoHeading->Required) {
			if (!$this->NoHeading->IsDetailKey && $this->NoHeading->FormValue != NULL && $this->NoHeading->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->NoHeading->caption(), $this->NoHeading->RequiredErrorMessage));
			}
		}
		if ($this->ChemicalCode->Required) {
			if (!$this->ChemicalCode->IsDetailKey && $this->ChemicalCode->FormValue != NULL && $this->ChemicalCode->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->ChemicalCode->caption(), $this->ChemicalCode->RequiredErrorMessage));
			}
		}
		if ($this->ChemicalName->Required) {
			if (!$this->ChemicalName->IsDetailKey && $this->ChemicalName->FormValue != NULL && $this->ChemicalName->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->ChemicalName->caption(), $this->ChemicalName->RequiredErrorMessage));
			}
		}
		if ($this->Utilaization->Required) {
			if (!$this->Utilaization->IsDetailKey && $this->Utilaization->FormValue != NULL && $this->Utilaization->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Utilaization->caption(), $this->Utilaization->RequiredErrorMessage));
			}
		}
		if ($this->Interpretation->Required) {
			if (!$this->Interpretation->IsDetailKey && $this->Interpretation->FormValue != NULL && $this->Interpretation->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Interpretation->caption(), $this->Interpretation->RequiredErrorMessage));
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
		if ($this->CODE->CurrentValue <> "") { // Check field with unique index
			$filterChk = "(`CODE` = '" . AdjustSql($this->CODE->CurrentValue, $this->Dbid) . "')";
			$filterChk .= " AND NOT (" . $filter . ")";
			$this->CurrentFilter = $filterChk;
			$sqlChk = $this->getCurrentSql();
			$conn->raiseErrorFn = $GLOBALS["ERROR_FUNC"];
			$rsChk = $conn->Execute($sqlChk);
			$conn->raiseErrorFn = '';
			if ($rsChk === FALSE) {
				return FALSE;
			} elseif (!$rsChk->EOF) {
				$idxErrMsg = str_replace("%f", $this->CODE->caption(), $Language->phrase("DupIndex"));
				$idxErrMsg = str_replace("%v", $this->CODE->CurrentValue, $idxErrMsg);
				$this->setFailureMessage($idxErrMsg);
				$rsChk->close();
				return FALSE;
			}
			$rsChk->close();
		}
		if ($this->SERVICE->CurrentValue <> "") { // Check field with unique index
			$filterChk = "(`SERVICE` = '" . AdjustSql($this->SERVICE->CurrentValue, $this->Dbid) . "')";
			$filterChk .= " AND NOT (" . $filter . ")";
			$this->CurrentFilter = $filterChk;
			$sqlChk = $this->getCurrentSql();
			$conn->raiseErrorFn = $GLOBALS["ERROR_FUNC"];
			$rsChk = $conn->Execute($sqlChk);
			$conn->raiseErrorFn = '';
			if ($rsChk === FALSE) {
				return FALSE;
			} elseif (!$rsChk->EOF) {
				$idxErrMsg = str_replace("%f", $this->SERVICE->caption(), $Language->phrase("DupIndex"));
				$idxErrMsg = str_replace("%v", $this->SERVICE->CurrentValue, $idxErrMsg);
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

			// Save old values
			$rsold = &$rs->fields;
			$this->loadDbValues($rsold);
			$rsnew = [];

			// CODE
			$this->CODE->setDbValueDef($rsnew, $this->CODE->CurrentValue, NULL, $this->CODE->ReadOnly);

			// SERVICE
			$this->SERVICE->setDbValueDef($rsnew, $this->SERVICE->CurrentValue, NULL, $this->SERVICE->ReadOnly);

			// UNITS
			$this->UNITS->setDbValueDef($rsnew, $this->UNITS->CurrentValue, NULL, $this->UNITS->ReadOnly);

			// AMOUNT
			$this->AMOUNT->setDbValueDef($rsnew, $this->AMOUNT->CurrentValue, NULL, $this->AMOUNT->ReadOnly);

			// SERVICE_TYPE
			$this->SERVICE_TYPE->setDbValueDef($rsnew, $this->SERVICE_TYPE->CurrentValue, NULL, $this->SERVICE_TYPE->ReadOnly);

			// DEPARTMENT
			$this->DEPARTMENT->setDbValueDef($rsnew, $this->DEPARTMENT->CurrentValue, NULL, $this->DEPARTMENT->ReadOnly);

			// Modified
			$this->Modified->setDbValueDef($rsnew, CurrentUserName(), NULL);
			$rsnew['Modified'] = &$this->Modified->DbValue;

			// ModifiedDateTime
			$this->ModifiedDateTime->setDbValueDef($rsnew, CurrentDateTime(), NULL);
			$rsnew['ModifiedDateTime'] = &$this->ModifiedDateTime->DbValue;

			// mas_services_billingcol
			$this->mas_services_billingcol->setDbValueDef($rsnew, $this->mas_services_billingcol->CurrentValue, NULL, $this->mas_services_billingcol->ReadOnly);

			// DrShareAmount
			$this->DrShareAmount->setDbValueDef($rsnew, $this->DrShareAmount->CurrentValue, NULL, $this->DrShareAmount->ReadOnly);

			// HospShareAmount
			$this->HospShareAmount->setDbValueDef($rsnew, $this->HospShareAmount->CurrentValue, NULL, $this->HospShareAmount->ReadOnly);

			// DrSharePer
			$this->DrSharePer->setDbValueDef($rsnew, $this->DrSharePer->CurrentValue, NULL, $this->DrSharePer->ReadOnly);

			// HospSharePer
			$this->HospSharePer->setDbValueDef($rsnew, $this->HospSharePer->CurrentValue, NULL, $this->HospSharePer->ReadOnly);

			// HospID
			$this->HospID->setDbValueDef($rsnew, HospitalID(), NULL);
			$rsnew['HospID'] = &$this->HospID->DbValue;

			// TestSubCd
			$this->TestSubCd->setDbValueDef($rsnew, $this->TestSubCd->CurrentValue, NULL, $this->TestSubCd->ReadOnly);

			// Method
			$this->Method->setDbValueDef($rsnew, $this->Method->CurrentValue, NULL, $this->Method->ReadOnly);

			// Order
			$this->Order->setDbValueDef($rsnew, $this->Order->CurrentValue, NULL, $this->Order->ReadOnly);

			// Form
			$this->Form->setDbValueDef($rsnew, $this->Form->CurrentValue, NULL, $this->Form->ReadOnly);

			// ResType
			$this->ResType->setDbValueDef($rsnew, $this->ResType->CurrentValue, NULL, $this->ResType->ReadOnly);

			// UnitCD
			$this->UnitCD->setDbValueDef($rsnew, $this->UnitCD->CurrentValue, NULL, $this->UnitCD->ReadOnly);

			// RefValue
			$this->RefValue->setDbValueDef($rsnew, $this->RefValue->CurrentValue, NULL, $this->RefValue->ReadOnly);

			// Sample
			$this->Sample->setDbValueDef($rsnew, $this->Sample->CurrentValue, NULL, $this->Sample->ReadOnly);

			// NoD
			$this->NoD->setDbValueDef($rsnew, $this->NoD->CurrentValue, NULL, $this->NoD->ReadOnly);

			// BillOrder
			$this->BillOrder->setDbValueDef($rsnew, $this->BillOrder->CurrentValue, NULL, $this->BillOrder->ReadOnly);

			// Formula
			$this->Formula->setDbValueDef($rsnew, $this->Formula->CurrentValue, NULL, $this->Formula->ReadOnly);

			// Inactive
			$this->Inactive->setDbValueDef($rsnew, $this->Inactive->CurrentValue, NULL, $this->Inactive->ReadOnly);

			// Outsource
			$this->Outsource->setDbValueDef($rsnew, $this->Outsource->CurrentValue, NULL, $this->Outsource->ReadOnly);

			// CollSample
			$this->CollSample->setDbValueDef($rsnew, $this->CollSample->CurrentValue, NULL, $this->CollSample->ReadOnly);

			// TestType
			$this->TestType->setDbValueDef($rsnew, $this->TestType->CurrentValue, NULL, $this->TestType->ReadOnly);

			// NoHeading
			$this->NoHeading->setDbValueDef($rsnew, $this->NoHeading->CurrentValue, NULL, $this->NoHeading->ReadOnly);

			// ChemicalCode
			$this->ChemicalCode->setDbValueDef($rsnew, $this->ChemicalCode->CurrentValue, NULL, $this->ChemicalCode->ReadOnly);

			// ChemicalName
			$this->ChemicalName->setDbValueDef($rsnew, $this->ChemicalName->CurrentValue, NULL, $this->ChemicalName->ReadOnly);

			// Utilaization
			$this->Utilaization->setDbValueDef($rsnew, $this->Utilaization->CurrentValue, NULL, $this->Utilaization->ReadOnly);

			// Interpretation
			$this->Interpretation->setDbValueDef($rsnew, $this->Interpretation->CurrentValue, NULL, $this->Interpretation->ReadOnly);

			// Check referential integrity for master table 'view_lab_service'
			$validMasterRecord = TRUE;
			$masterFilter = $this->sqlMasterFilter_view_lab_service();
			$keyValue = isset($rsnew['CODE']) ? $rsnew['CODE'] : $rsold['CODE'];
			if (strval($keyValue) <> "") {
				$masterFilter = str_replace("@CODE@", AdjustSql($keyValue), $masterFilter);
			} else {
				$validMasterRecord = FALSE;
			}
			if ($validMasterRecord) {
				if (!isset($GLOBALS["view_lab_service"]))
					$GLOBALS["view_lab_service"] = new view_lab_service();
				$rsmaster = $GLOBALS["view_lab_service"]->loadRs($masterFilter);
				$validMasterRecord = ($rsmaster && !$rsmaster->EOF);
				$rsmaster->close();
			}
			if (!$validMasterRecord) {
				$relatedRecordMsg = str_replace("%t", "view_lab_service", $Language->phrase("RelatedRecordRequired"));
				$this->setFailureMessage($relatedRecordMsg);
				$rs->close();
				return FALSE;
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
			if ($masterTblVar == "view_lab_service") {
				$validMaster = TRUE;
				if (Get("fk_CODE") !== NULL) {
					$this->CODE->setQueryStringValue(Get("fk_CODE"));
					$this->CODE->setSessionValue($this->CODE->QueryStringValue);
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
			if ($masterTblVar == "view_lab_service") {
				$validMaster = TRUE;
				if (Post("fk_CODE") !== NULL) {
					$this->CODE->setFormValue(Post("fk_CODE"));
					$this->CODE->setSessionValue($this->CODE->FormValue);
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
			if ($masterTblVar <> "view_lab_service") {
				if ($this->CODE->CurrentValue == "")
					$this->CODE->setSessionValue("");
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
		$Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("view_lab_service_sublist.php"), "", $this->TableVar, TRUE);
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
						case "x_UNITS":
							break;
						case "x_SERVICE_TYPE":
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
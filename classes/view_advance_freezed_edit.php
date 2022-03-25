<?php
namespace PHPMaker2019\HIMS;

/**
 * Page class
 */
class view_advance_freezed_edit extends view_advance_freezed
{

	// Page ID
	public $PageID = "edit";

	// Project ID
	public $ProjectID = "{EA4F6D13-AF8F-428D-9EA7-BA88D1107EC3}";

	// Table name
	public $TableName = 'view_advance_freezed';

	// Page object name
	public $PageObjName = "view_advance_freezed_edit";

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

		// Table object (view_advance_freezed)
		if (!isset($GLOBALS["view_advance_freezed"]) || get_class($GLOBALS["view_advance_freezed"]) == PROJECT_NAMESPACE . "view_advance_freezed") {
			$GLOBALS["view_advance_freezed"] = &$this;
			$GLOBALS["Table"] = &$GLOBALS["view_advance_freezed"];
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
			define(PROJECT_NAMESPACE . "TABLE_NAME", 'view_advance_freezed');

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
		global $EXPORT, $view_advance_freezed;
		if ($this->CustomExport && $this->CustomExport == $this->Export && array_key_exists($this->CustomExport, $EXPORT)) {
				$content = ob_get_contents();
			if ($ExportFileName == "")
				$ExportFileName = $this->TableVar;
			$class = PROJECT_NAMESPACE . $EXPORT[$this->CustomExport];
			if (class_exists($class)) {
				$doc = new $class($view_advance_freezed);
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
					if ($pageName == "view_advance_freezedview.php")
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
					$this->terminate(GetUrl("view_advance_freezedlist.php"));
				else
					$this->terminate(GetUrl("login.php"));
				return;
			}
		}

		// Create form object
		$CurrentForm = new HttpForm();
		$this->CurrentAction = Param("action"); // Set up current action
		$this->id->setVisibility();
		$this->freezed->setVisibility();
		$this->PatientID->setVisibility();
		$this->PatientName->setVisibility();
		$this->Name->setVisibility();
		$this->Mobile->setVisibility();
		$this->voucher_type->setVisibility();
		$this->Details->setVisibility();
		$this->ModeofPayment->setVisibility();
		$this->Amount->setVisibility();
		$this->AnyDues->setVisibility();
		$this->createdby->setVisibility();
		$this->createddatetime->setVisibility();
		$this->modifiedby->setVisibility();
		$this->modifieddatetime->setVisibility();
		$this->PatID->setVisibility();
		$this->VisiteType->setVisibility();
		$this->VisitDate->setVisibility();
		$this->AdvanceNo->setVisibility();
		$this->Status->setVisibility();
		$this->Date->setVisibility();
		$this->AdvanceValidityDate->setVisibility();
		$this->TotalRemainingAdvance->setVisibility();
		$this->Remarks->setVisibility();
		$this->SeectPaymentMode->setVisibility();
		$this->PaidAmount->setVisibility();
		$this->Currency->setVisibility();
		$this->CardNumber->setVisibility();
		$this->BankName->setVisibility();
		$this->HospID->setVisibility();
		$this->Reception->setVisibility();
		$this->mrnno->setVisibility();
		$this->GetUserName->setVisibility();
		$this->AdjustmentwithAdvance->setVisibility();
		$this->AdjustmentBillNumber->setVisibility();
		$this->CancelAdvance->setVisibility();
		$this->CancelReasan->setVisibility();
		$this->CancelBy->setVisibility();
		$this->CancelDate->setVisibility();
		$this->CancelDateTime->setVisibility();
		$this->CanceledBy->setVisibility();
		$this->CancelStatus->setVisibility();
		$this->Cash->setVisibility();
		$this->Card->setVisibility();
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
					$this->terminate("view_advance_freezedlist.php"); // No matching record, return to list
				}
				break;
			case "update": // Update
				$returnUrl = $this->getReturnUrl();
				if (GetPageName($returnUrl) == "view_advance_freezedlist.php")
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

		// Check field name 'freezed' first before field var 'x_freezed'
		$val = $CurrentForm->hasValue("freezed") ? $CurrentForm->getValue("freezed") : $CurrentForm->getValue("x_freezed");
		if (!$this->freezed->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->freezed->Visible = FALSE; // Disable update for API request
			else
				$this->freezed->setFormValue($val);
		}

		// Check field name 'PatientID' first before field var 'x_PatientID'
		$val = $CurrentForm->hasValue("PatientID") ? $CurrentForm->getValue("PatientID") : $CurrentForm->getValue("x_PatientID");
		if (!$this->PatientID->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->PatientID->Visible = FALSE; // Disable update for API request
			else
				$this->PatientID->setFormValue($val);
		}

		// Check field name 'PatientName' first before field var 'x_PatientName'
		$val = $CurrentForm->hasValue("PatientName") ? $CurrentForm->getValue("PatientName") : $CurrentForm->getValue("x_PatientName");
		if (!$this->PatientName->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->PatientName->Visible = FALSE; // Disable update for API request
			else
				$this->PatientName->setFormValue($val);
		}

		// Check field name 'Name' first before field var 'x_Name'
		$val = $CurrentForm->hasValue("Name") ? $CurrentForm->getValue("Name") : $CurrentForm->getValue("x_Name");
		if (!$this->Name->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Name->Visible = FALSE; // Disable update for API request
			else
				$this->Name->setFormValue($val);
		}

		// Check field name 'Mobile' first before field var 'x_Mobile'
		$val = $CurrentForm->hasValue("Mobile") ? $CurrentForm->getValue("Mobile") : $CurrentForm->getValue("x_Mobile");
		if (!$this->Mobile->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Mobile->Visible = FALSE; // Disable update for API request
			else
				$this->Mobile->setFormValue($val);
		}

		// Check field name 'voucher_type' first before field var 'x_voucher_type'
		$val = $CurrentForm->hasValue("voucher_type") ? $CurrentForm->getValue("voucher_type") : $CurrentForm->getValue("x_voucher_type");
		if (!$this->voucher_type->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->voucher_type->Visible = FALSE; // Disable update for API request
			else
				$this->voucher_type->setFormValue($val);
		}

		// Check field name 'Details' first before field var 'x_Details'
		$val = $CurrentForm->hasValue("Details") ? $CurrentForm->getValue("Details") : $CurrentForm->getValue("x_Details");
		if (!$this->Details->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Details->Visible = FALSE; // Disable update for API request
			else
				$this->Details->setFormValue($val);
		}

		// Check field name 'ModeofPayment' first before field var 'x_ModeofPayment'
		$val = $CurrentForm->hasValue("ModeofPayment") ? $CurrentForm->getValue("ModeofPayment") : $CurrentForm->getValue("x_ModeofPayment");
		if (!$this->ModeofPayment->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->ModeofPayment->Visible = FALSE; // Disable update for API request
			else
				$this->ModeofPayment->setFormValue($val);
		}

		// Check field name 'Amount' first before field var 'x_Amount'
		$val = $CurrentForm->hasValue("Amount") ? $CurrentForm->getValue("Amount") : $CurrentForm->getValue("x_Amount");
		if (!$this->Amount->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Amount->Visible = FALSE; // Disable update for API request
			else
				$this->Amount->setFormValue($val);
		}

		// Check field name 'AnyDues' first before field var 'x_AnyDues'
		$val = $CurrentForm->hasValue("AnyDues") ? $CurrentForm->getValue("AnyDues") : $CurrentForm->getValue("x_AnyDues");
		if (!$this->AnyDues->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->AnyDues->Visible = FALSE; // Disable update for API request
			else
				$this->AnyDues->setFormValue($val);
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

		// Check field name 'PatID' first before field var 'x_PatID'
		$val = $CurrentForm->hasValue("PatID") ? $CurrentForm->getValue("PatID") : $CurrentForm->getValue("x_PatID");
		if (!$this->PatID->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->PatID->Visible = FALSE; // Disable update for API request
			else
				$this->PatID->setFormValue($val);
		}

		// Check field name 'VisiteType' first before field var 'x_VisiteType'
		$val = $CurrentForm->hasValue("VisiteType") ? $CurrentForm->getValue("VisiteType") : $CurrentForm->getValue("x_VisiteType");
		if (!$this->VisiteType->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->VisiteType->Visible = FALSE; // Disable update for API request
			else
				$this->VisiteType->setFormValue($val);
		}

		// Check field name 'VisitDate' first before field var 'x_VisitDate'
		$val = $CurrentForm->hasValue("VisitDate") ? $CurrentForm->getValue("VisitDate") : $CurrentForm->getValue("x_VisitDate");
		if (!$this->VisitDate->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->VisitDate->Visible = FALSE; // Disable update for API request
			else
				$this->VisitDate->setFormValue($val);
			$this->VisitDate->CurrentValue = UnFormatDateTime($this->VisitDate->CurrentValue, 0);
		}

		// Check field name 'AdvanceNo' first before field var 'x_AdvanceNo'
		$val = $CurrentForm->hasValue("AdvanceNo") ? $CurrentForm->getValue("AdvanceNo") : $CurrentForm->getValue("x_AdvanceNo");
		if (!$this->AdvanceNo->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->AdvanceNo->Visible = FALSE; // Disable update for API request
			else
				$this->AdvanceNo->setFormValue($val);
		}

		// Check field name 'Status' first before field var 'x_Status'
		$val = $CurrentForm->hasValue("Status") ? $CurrentForm->getValue("Status") : $CurrentForm->getValue("x_Status");
		if (!$this->Status->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Status->Visible = FALSE; // Disable update for API request
			else
				$this->Status->setFormValue($val);
		}

		// Check field name 'Date' first before field var 'x_Date'
		$val = $CurrentForm->hasValue("Date") ? $CurrentForm->getValue("Date") : $CurrentForm->getValue("x_Date");
		if (!$this->Date->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Date->Visible = FALSE; // Disable update for API request
			else
				$this->Date->setFormValue($val);
			$this->Date->CurrentValue = UnFormatDateTime($this->Date->CurrentValue, 0);
		}

		// Check field name 'AdvanceValidityDate' first before field var 'x_AdvanceValidityDate'
		$val = $CurrentForm->hasValue("AdvanceValidityDate") ? $CurrentForm->getValue("AdvanceValidityDate") : $CurrentForm->getValue("x_AdvanceValidityDate");
		if (!$this->AdvanceValidityDate->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->AdvanceValidityDate->Visible = FALSE; // Disable update for API request
			else
				$this->AdvanceValidityDate->setFormValue($val);
			$this->AdvanceValidityDate->CurrentValue = UnFormatDateTime($this->AdvanceValidityDate->CurrentValue, 0);
		}

		// Check field name 'TotalRemainingAdvance' first before field var 'x_TotalRemainingAdvance'
		$val = $CurrentForm->hasValue("TotalRemainingAdvance") ? $CurrentForm->getValue("TotalRemainingAdvance") : $CurrentForm->getValue("x_TotalRemainingAdvance");
		if (!$this->TotalRemainingAdvance->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->TotalRemainingAdvance->Visible = FALSE; // Disable update for API request
			else
				$this->TotalRemainingAdvance->setFormValue($val);
		}

		// Check field name 'Remarks' first before field var 'x_Remarks'
		$val = $CurrentForm->hasValue("Remarks") ? $CurrentForm->getValue("Remarks") : $CurrentForm->getValue("x_Remarks");
		if (!$this->Remarks->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Remarks->Visible = FALSE; // Disable update for API request
			else
				$this->Remarks->setFormValue($val);
		}

		// Check field name 'SeectPaymentMode' first before field var 'x_SeectPaymentMode'
		$val = $CurrentForm->hasValue("SeectPaymentMode") ? $CurrentForm->getValue("SeectPaymentMode") : $CurrentForm->getValue("x_SeectPaymentMode");
		if (!$this->SeectPaymentMode->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->SeectPaymentMode->Visible = FALSE; // Disable update for API request
			else
				$this->SeectPaymentMode->setFormValue($val);
		}

		// Check field name 'PaidAmount' first before field var 'x_PaidAmount'
		$val = $CurrentForm->hasValue("PaidAmount") ? $CurrentForm->getValue("PaidAmount") : $CurrentForm->getValue("x_PaidAmount");
		if (!$this->PaidAmount->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->PaidAmount->Visible = FALSE; // Disable update for API request
			else
				$this->PaidAmount->setFormValue($val);
		}

		// Check field name 'Currency' first before field var 'x_Currency'
		$val = $CurrentForm->hasValue("Currency") ? $CurrentForm->getValue("Currency") : $CurrentForm->getValue("x_Currency");
		if (!$this->Currency->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Currency->Visible = FALSE; // Disable update for API request
			else
				$this->Currency->setFormValue($val);
		}

		// Check field name 'CardNumber' first before field var 'x_CardNumber'
		$val = $CurrentForm->hasValue("CardNumber") ? $CurrentForm->getValue("CardNumber") : $CurrentForm->getValue("x_CardNumber");
		if (!$this->CardNumber->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->CardNumber->Visible = FALSE; // Disable update for API request
			else
				$this->CardNumber->setFormValue($val);
		}

		// Check field name 'BankName' first before field var 'x_BankName'
		$val = $CurrentForm->hasValue("BankName") ? $CurrentForm->getValue("BankName") : $CurrentForm->getValue("x_BankName");
		if (!$this->BankName->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->BankName->Visible = FALSE; // Disable update for API request
			else
				$this->BankName->setFormValue($val);
		}

		// Check field name 'HospID' first before field var 'x_HospID'
		$val = $CurrentForm->hasValue("HospID") ? $CurrentForm->getValue("HospID") : $CurrentForm->getValue("x_HospID");
		if (!$this->HospID->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->HospID->Visible = FALSE; // Disable update for API request
			else
				$this->HospID->setFormValue($val);
		}

		// Check field name 'Reception' first before field var 'x_Reception'
		$val = $CurrentForm->hasValue("Reception") ? $CurrentForm->getValue("Reception") : $CurrentForm->getValue("x_Reception");
		if (!$this->Reception->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Reception->Visible = FALSE; // Disable update for API request
			else
				$this->Reception->setFormValue($val);
		}

		// Check field name 'mrnno' first before field var 'x_mrnno'
		$val = $CurrentForm->hasValue("mrnno") ? $CurrentForm->getValue("mrnno") : $CurrentForm->getValue("x_mrnno");
		if (!$this->mrnno->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->mrnno->Visible = FALSE; // Disable update for API request
			else
				$this->mrnno->setFormValue($val);
		}

		// Check field name 'GetUserName' first before field var 'x_GetUserName'
		$val = $CurrentForm->hasValue("GetUserName") ? $CurrentForm->getValue("GetUserName") : $CurrentForm->getValue("x_GetUserName");
		if (!$this->GetUserName->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->GetUserName->Visible = FALSE; // Disable update for API request
			else
				$this->GetUserName->setFormValue($val);
		}

		// Check field name 'AdjustmentwithAdvance' first before field var 'x_AdjustmentwithAdvance'
		$val = $CurrentForm->hasValue("AdjustmentwithAdvance") ? $CurrentForm->getValue("AdjustmentwithAdvance") : $CurrentForm->getValue("x_AdjustmentwithAdvance");
		if (!$this->AdjustmentwithAdvance->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->AdjustmentwithAdvance->Visible = FALSE; // Disable update for API request
			else
				$this->AdjustmentwithAdvance->setFormValue($val);
		}

		// Check field name 'AdjustmentBillNumber' first before field var 'x_AdjustmentBillNumber'
		$val = $CurrentForm->hasValue("AdjustmentBillNumber") ? $CurrentForm->getValue("AdjustmentBillNumber") : $CurrentForm->getValue("x_AdjustmentBillNumber");
		if (!$this->AdjustmentBillNumber->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->AdjustmentBillNumber->Visible = FALSE; // Disable update for API request
			else
				$this->AdjustmentBillNumber->setFormValue($val);
		}

		// Check field name 'CancelAdvance' first before field var 'x_CancelAdvance'
		$val = $CurrentForm->hasValue("CancelAdvance") ? $CurrentForm->getValue("CancelAdvance") : $CurrentForm->getValue("x_CancelAdvance");
		if (!$this->CancelAdvance->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->CancelAdvance->Visible = FALSE; // Disable update for API request
			else
				$this->CancelAdvance->setFormValue($val);
		}

		// Check field name 'CancelReasan' first before field var 'x_CancelReasan'
		$val = $CurrentForm->hasValue("CancelReasan") ? $CurrentForm->getValue("CancelReasan") : $CurrentForm->getValue("x_CancelReasan");
		if (!$this->CancelReasan->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->CancelReasan->Visible = FALSE; // Disable update for API request
			else
				$this->CancelReasan->setFormValue($val);
		}

		// Check field name 'CancelBy' first before field var 'x_CancelBy'
		$val = $CurrentForm->hasValue("CancelBy") ? $CurrentForm->getValue("CancelBy") : $CurrentForm->getValue("x_CancelBy");
		if (!$this->CancelBy->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->CancelBy->Visible = FALSE; // Disable update for API request
			else
				$this->CancelBy->setFormValue($val);
		}

		// Check field name 'CancelDate' first before field var 'x_CancelDate'
		$val = $CurrentForm->hasValue("CancelDate") ? $CurrentForm->getValue("CancelDate") : $CurrentForm->getValue("x_CancelDate");
		if (!$this->CancelDate->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->CancelDate->Visible = FALSE; // Disable update for API request
			else
				$this->CancelDate->setFormValue($val);
			$this->CancelDate->CurrentValue = UnFormatDateTime($this->CancelDate->CurrentValue, 0);
		}

		// Check field name 'CancelDateTime' first before field var 'x_CancelDateTime'
		$val = $CurrentForm->hasValue("CancelDateTime") ? $CurrentForm->getValue("CancelDateTime") : $CurrentForm->getValue("x_CancelDateTime");
		if (!$this->CancelDateTime->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->CancelDateTime->Visible = FALSE; // Disable update for API request
			else
				$this->CancelDateTime->setFormValue($val);
			$this->CancelDateTime->CurrentValue = UnFormatDateTime($this->CancelDateTime->CurrentValue, 0);
		}

		// Check field name 'CanceledBy' first before field var 'x_CanceledBy'
		$val = $CurrentForm->hasValue("CanceledBy") ? $CurrentForm->getValue("CanceledBy") : $CurrentForm->getValue("x_CanceledBy");
		if (!$this->CanceledBy->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->CanceledBy->Visible = FALSE; // Disable update for API request
			else
				$this->CanceledBy->setFormValue($val);
		}

		// Check field name 'CancelStatus' first before field var 'x_CancelStatus'
		$val = $CurrentForm->hasValue("CancelStatus") ? $CurrentForm->getValue("CancelStatus") : $CurrentForm->getValue("x_CancelStatus");
		if (!$this->CancelStatus->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->CancelStatus->Visible = FALSE; // Disable update for API request
			else
				$this->CancelStatus->setFormValue($val);
		}

		// Check field name 'Cash' first before field var 'x_Cash'
		$val = $CurrentForm->hasValue("Cash") ? $CurrentForm->getValue("Cash") : $CurrentForm->getValue("x_Cash");
		if (!$this->Cash->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Cash->Visible = FALSE; // Disable update for API request
			else
				$this->Cash->setFormValue($val);
		}

		// Check field name 'Card' first before field var 'x_Card'
		$val = $CurrentForm->hasValue("Card") ? $CurrentForm->getValue("Card") : $CurrentForm->getValue("x_Card");
		if (!$this->Card->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Card->Visible = FALSE; // Disable update for API request
			else
				$this->Card->setFormValue($val);
		}
	}

	// Restore form values
	public function restoreFormValues()
	{
		global $CurrentForm;
		$this->id->CurrentValue = $this->id->FormValue;
		$this->freezed->CurrentValue = $this->freezed->FormValue;
		$this->PatientID->CurrentValue = $this->PatientID->FormValue;
		$this->PatientName->CurrentValue = $this->PatientName->FormValue;
		$this->Name->CurrentValue = $this->Name->FormValue;
		$this->Mobile->CurrentValue = $this->Mobile->FormValue;
		$this->voucher_type->CurrentValue = $this->voucher_type->FormValue;
		$this->Details->CurrentValue = $this->Details->FormValue;
		$this->ModeofPayment->CurrentValue = $this->ModeofPayment->FormValue;
		$this->Amount->CurrentValue = $this->Amount->FormValue;
		$this->AnyDues->CurrentValue = $this->AnyDues->FormValue;
		$this->createdby->CurrentValue = $this->createdby->FormValue;
		$this->createddatetime->CurrentValue = $this->createddatetime->FormValue;
		$this->createddatetime->CurrentValue = UnFormatDateTime($this->createddatetime->CurrentValue, 0);
		$this->modifiedby->CurrentValue = $this->modifiedby->FormValue;
		$this->modifieddatetime->CurrentValue = $this->modifieddatetime->FormValue;
		$this->modifieddatetime->CurrentValue = UnFormatDateTime($this->modifieddatetime->CurrentValue, 0);
		$this->PatID->CurrentValue = $this->PatID->FormValue;
		$this->VisiteType->CurrentValue = $this->VisiteType->FormValue;
		$this->VisitDate->CurrentValue = $this->VisitDate->FormValue;
		$this->VisitDate->CurrentValue = UnFormatDateTime($this->VisitDate->CurrentValue, 0);
		$this->AdvanceNo->CurrentValue = $this->AdvanceNo->FormValue;
		$this->Status->CurrentValue = $this->Status->FormValue;
		$this->Date->CurrentValue = $this->Date->FormValue;
		$this->Date->CurrentValue = UnFormatDateTime($this->Date->CurrentValue, 0);
		$this->AdvanceValidityDate->CurrentValue = $this->AdvanceValidityDate->FormValue;
		$this->AdvanceValidityDate->CurrentValue = UnFormatDateTime($this->AdvanceValidityDate->CurrentValue, 0);
		$this->TotalRemainingAdvance->CurrentValue = $this->TotalRemainingAdvance->FormValue;
		$this->Remarks->CurrentValue = $this->Remarks->FormValue;
		$this->SeectPaymentMode->CurrentValue = $this->SeectPaymentMode->FormValue;
		$this->PaidAmount->CurrentValue = $this->PaidAmount->FormValue;
		$this->Currency->CurrentValue = $this->Currency->FormValue;
		$this->CardNumber->CurrentValue = $this->CardNumber->FormValue;
		$this->BankName->CurrentValue = $this->BankName->FormValue;
		$this->HospID->CurrentValue = $this->HospID->FormValue;
		$this->Reception->CurrentValue = $this->Reception->FormValue;
		$this->mrnno->CurrentValue = $this->mrnno->FormValue;
		$this->GetUserName->CurrentValue = $this->GetUserName->FormValue;
		$this->AdjustmentwithAdvance->CurrentValue = $this->AdjustmentwithAdvance->FormValue;
		$this->AdjustmentBillNumber->CurrentValue = $this->AdjustmentBillNumber->FormValue;
		$this->CancelAdvance->CurrentValue = $this->CancelAdvance->FormValue;
		$this->CancelReasan->CurrentValue = $this->CancelReasan->FormValue;
		$this->CancelBy->CurrentValue = $this->CancelBy->FormValue;
		$this->CancelDate->CurrentValue = $this->CancelDate->FormValue;
		$this->CancelDate->CurrentValue = UnFormatDateTime($this->CancelDate->CurrentValue, 0);
		$this->CancelDateTime->CurrentValue = $this->CancelDateTime->FormValue;
		$this->CancelDateTime->CurrentValue = UnFormatDateTime($this->CancelDateTime->CurrentValue, 0);
		$this->CanceledBy->CurrentValue = $this->CanceledBy->FormValue;
		$this->CancelStatus->CurrentValue = $this->CancelStatus->FormValue;
		$this->Cash->CurrentValue = $this->Cash->FormValue;
		$this->Card->CurrentValue = $this->Card->FormValue;
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
		$this->freezed->setDbValue($row['freezed']);
		$this->PatientID->setDbValue($row['PatientID']);
		$this->PatientName->setDbValue($row['PatientName']);
		$this->Name->setDbValue($row['Name']);
		$this->Mobile->setDbValue($row['Mobile']);
		$this->voucher_type->setDbValue($row['voucher_type']);
		$this->Details->setDbValue($row['Details']);
		$this->ModeofPayment->setDbValue($row['ModeofPayment']);
		$this->Amount->setDbValue($row['Amount']);
		$this->AnyDues->setDbValue($row['AnyDues']);
		$this->createdby->setDbValue($row['createdby']);
		$this->createddatetime->setDbValue($row['createddatetime']);
		$this->modifiedby->setDbValue($row['modifiedby']);
		$this->modifieddatetime->setDbValue($row['modifieddatetime']);
		$this->PatID->setDbValue($row['PatID']);
		$this->VisiteType->setDbValue($row['VisiteType']);
		$this->VisitDate->setDbValue($row['VisitDate']);
		$this->AdvanceNo->setDbValue($row['AdvanceNo']);
		$this->Status->setDbValue($row['Status']);
		$this->Date->setDbValue($row['Date']);
		$this->AdvanceValidityDate->setDbValue($row['AdvanceValidityDate']);
		$this->TotalRemainingAdvance->setDbValue($row['TotalRemainingAdvance']);
		$this->Remarks->setDbValue($row['Remarks']);
		$this->SeectPaymentMode->setDbValue($row['SeectPaymentMode']);
		$this->PaidAmount->setDbValue($row['PaidAmount']);
		$this->Currency->setDbValue($row['Currency']);
		$this->CardNumber->setDbValue($row['CardNumber']);
		$this->BankName->setDbValue($row['BankName']);
		$this->HospID->setDbValue($row['HospID']);
		$this->Reception->setDbValue($row['Reception']);
		$this->mrnno->setDbValue($row['mrnno']);
		$this->GetUserName->setDbValue($row['GetUserName']);
		$this->AdjustmentwithAdvance->setDbValue($row['AdjustmentwithAdvance']);
		$this->AdjustmentBillNumber->setDbValue($row['AdjustmentBillNumber']);
		$this->CancelAdvance->setDbValue($row['CancelAdvance']);
		$this->CancelReasan->setDbValue($row['CancelReasan']);
		$this->CancelBy->setDbValue($row['CancelBy']);
		$this->CancelDate->setDbValue($row['CancelDate']);
		$this->CancelDateTime->setDbValue($row['CancelDateTime']);
		$this->CanceledBy->setDbValue($row['CanceledBy']);
		$this->CancelStatus->setDbValue($row['CancelStatus']);
		$this->Cash->setDbValue($row['Cash']);
		$this->Card->setDbValue($row['Card']);
	}

	// Return a row with default values
	protected function newRow()
	{
		$row = [];
		$row['id'] = NULL;
		$row['freezed'] = NULL;
		$row['PatientID'] = NULL;
		$row['PatientName'] = NULL;
		$row['Name'] = NULL;
		$row['Mobile'] = NULL;
		$row['voucher_type'] = NULL;
		$row['Details'] = NULL;
		$row['ModeofPayment'] = NULL;
		$row['Amount'] = NULL;
		$row['AnyDues'] = NULL;
		$row['createdby'] = NULL;
		$row['createddatetime'] = NULL;
		$row['modifiedby'] = NULL;
		$row['modifieddatetime'] = NULL;
		$row['PatID'] = NULL;
		$row['VisiteType'] = NULL;
		$row['VisitDate'] = NULL;
		$row['AdvanceNo'] = NULL;
		$row['Status'] = NULL;
		$row['Date'] = NULL;
		$row['AdvanceValidityDate'] = NULL;
		$row['TotalRemainingAdvance'] = NULL;
		$row['Remarks'] = NULL;
		$row['SeectPaymentMode'] = NULL;
		$row['PaidAmount'] = NULL;
		$row['Currency'] = NULL;
		$row['CardNumber'] = NULL;
		$row['BankName'] = NULL;
		$row['HospID'] = NULL;
		$row['Reception'] = NULL;
		$row['mrnno'] = NULL;
		$row['GetUserName'] = NULL;
		$row['AdjustmentwithAdvance'] = NULL;
		$row['AdjustmentBillNumber'] = NULL;
		$row['CancelAdvance'] = NULL;
		$row['CancelReasan'] = NULL;
		$row['CancelBy'] = NULL;
		$row['CancelDate'] = NULL;
		$row['CancelDateTime'] = NULL;
		$row['CanceledBy'] = NULL;
		$row['CancelStatus'] = NULL;
		$row['Cash'] = NULL;
		$row['Card'] = NULL;
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

		if ($this->Amount->FormValue == $this->Amount->CurrentValue && is_numeric(ConvertToFloatString($this->Amount->CurrentValue)))
			$this->Amount->CurrentValue = ConvertToFloatString($this->Amount->CurrentValue);

		// Convert decimal values if posted back
		if ($this->Cash->FormValue == $this->Cash->CurrentValue && is_numeric(ConvertToFloatString($this->Cash->CurrentValue)))
			$this->Cash->CurrentValue = ConvertToFloatString($this->Cash->CurrentValue);

		// Convert decimal values if posted back
		if ($this->Card->FormValue == $this->Card->CurrentValue && is_numeric(ConvertToFloatString($this->Card->CurrentValue)))
			$this->Card->CurrentValue = ConvertToFloatString($this->Card->CurrentValue);

		// Call Row_Rendering event
		$this->Row_Rendering();

		// Common render codes for all row types
		// id
		// freezed
		// PatientID
		// PatientName
		// Name
		// Mobile
		// voucher_type
		// Details
		// ModeofPayment
		// Amount
		// AnyDues
		// createdby
		// createddatetime
		// modifiedby
		// modifieddatetime
		// PatID
		// VisiteType
		// VisitDate
		// AdvanceNo
		// Status
		// Date
		// AdvanceValidityDate
		// TotalRemainingAdvance
		// Remarks
		// SeectPaymentMode
		// PaidAmount
		// Currency
		// CardNumber
		// BankName
		// HospID
		// Reception
		// mrnno
		// GetUserName
		// AdjustmentwithAdvance
		// AdjustmentBillNumber
		// CancelAdvance
		// CancelReasan
		// CancelBy
		// CancelDate
		// CancelDateTime
		// CanceledBy
		// CancelStatus
		// Cash
		// Card

		if ($this->RowType == ROWTYPE_VIEW) { // View row

			// id
			$this->id->ViewValue = $this->id->CurrentValue;
			$this->id->ViewCustomAttributes = "";

			// freezed
			if (strval($this->freezed->CurrentValue) <> "") {
				$this->freezed->ViewValue = $this->freezed->optionCaption($this->freezed->CurrentValue);
			} else {
				$this->freezed->ViewValue = NULL;
			}
			$this->freezed->ViewCustomAttributes = "";

			// PatientID
			$this->PatientID->ViewValue = $this->PatientID->CurrentValue;
			$this->PatientID->ViewCustomAttributes = "";

			// PatientName
			$this->PatientName->ViewValue = $this->PatientName->CurrentValue;
			$this->PatientName->ViewCustomAttributes = "";

			// Name
			$this->Name->ViewValue = $this->Name->CurrentValue;
			$this->Name->ViewCustomAttributes = "";

			// Mobile
			$this->Mobile->ViewValue = $this->Mobile->CurrentValue;
			$this->Mobile->ViewCustomAttributes = "";

			// voucher_type
			$this->voucher_type->ViewValue = $this->voucher_type->CurrentValue;
			$this->voucher_type->ViewCustomAttributes = "";

			// Details
			$this->Details->ViewValue = $this->Details->CurrentValue;
			$this->Details->ViewCustomAttributes = "";

			// ModeofPayment
			$this->ModeofPayment->ViewValue = $this->ModeofPayment->CurrentValue;
			$this->ModeofPayment->ViewCustomAttributes = "";

			// Amount
			$this->Amount->ViewValue = $this->Amount->CurrentValue;
			$this->Amount->ViewValue = FormatNumber($this->Amount->ViewValue, 2, -2, -2, -2);
			$this->Amount->ViewCustomAttributes = "";

			// AnyDues
			$this->AnyDues->ViewValue = $this->AnyDues->CurrentValue;
			$this->AnyDues->ViewCustomAttributes = "";

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

			// PatID
			$this->PatID->ViewValue = $this->PatID->CurrentValue;
			$this->PatID->ViewValue = FormatNumber($this->PatID->ViewValue, 0, -2, -2, -2);
			$this->PatID->ViewCustomAttributes = "";

			// VisiteType
			$this->VisiteType->ViewValue = $this->VisiteType->CurrentValue;
			$this->VisiteType->ViewCustomAttributes = "";

			// VisitDate
			$this->VisitDate->ViewValue = $this->VisitDate->CurrentValue;
			$this->VisitDate->ViewValue = FormatDateTime($this->VisitDate->ViewValue, 0);
			$this->VisitDate->ViewCustomAttributes = "";

			// AdvanceNo
			$this->AdvanceNo->ViewValue = $this->AdvanceNo->CurrentValue;
			$this->AdvanceNo->ViewCustomAttributes = "";

			// Status
			$this->Status->ViewValue = $this->Status->CurrentValue;
			$this->Status->ViewCustomAttributes = "";

			// Date
			$this->Date->ViewValue = $this->Date->CurrentValue;
			$this->Date->ViewValue = FormatDateTime($this->Date->ViewValue, 0);
			$this->Date->ViewCustomAttributes = "";

			// AdvanceValidityDate
			$this->AdvanceValidityDate->ViewValue = $this->AdvanceValidityDate->CurrentValue;
			$this->AdvanceValidityDate->ViewValue = FormatDateTime($this->AdvanceValidityDate->ViewValue, 0);
			$this->AdvanceValidityDate->ViewCustomAttributes = "";

			// TotalRemainingAdvance
			$this->TotalRemainingAdvance->ViewValue = $this->TotalRemainingAdvance->CurrentValue;
			$this->TotalRemainingAdvance->ViewCustomAttributes = "";

			// Remarks
			$this->Remarks->ViewValue = $this->Remarks->CurrentValue;
			$this->Remarks->ViewCustomAttributes = "";

			// SeectPaymentMode
			$this->SeectPaymentMode->ViewValue = $this->SeectPaymentMode->CurrentValue;
			$this->SeectPaymentMode->ViewCustomAttributes = "";

			// PaidAmount
			$this->PaidAmount->ViewValue = $this->PaidAmount->CurrentValue;
			$this->PaidAmount->ViewCustomAttributes = "";

			// Currency
			$this->Currency->ViewValue = $this->Currency->CurrentValue;
			$this->Currency->ViewCustomAttributes = "";

			// CardNumber
			$this->CardNumber->ViewValue = $this->CardNumber->CurrentValue;
			$this->CardNumber->ViewCustomAttributes = "";

			// BankName
			$this->BankName->ViewValue = $this->BankName->CurrentValue;
			$this->BankName->ViewCustomAttributes = "";

			// HospID
			$this->HospID->ViewValue = $this->HospID->CurrentValue;
			$this->HospID->ViewValue = FormatNumber($this->HospID->ViewValue, 0, -2, -2, -2);
			$this->HospID->ViewCustomAttributes = "";

			// Reception
			$this->Reception->ViewValue = $this->Reception->CurrentValue;
			$this->Reception->ViewValue = FormatNumber($this->Reception->ViewValue, 0, -2, -2, -2);
			$this->Reception->ViewCustomAttributes = "";

			// mrnno
			$this->mrnno->ViewValue = $this->mrnno->CurrentValue;
			$this->mrnno->ViewCustomAttributes = "";

			// GetUserName
			$this->GetUserName->ViewValue = $this->GetUserName->CurrentValue;
			$this->GetUserName->ViewCustomAttributes = "";

			// AdjustmentwithAdvance
			$this->AdjustmentwithAdvance->ViewValue = $this->AdjustmentwithAdvance->CurrentValue;
			$this->AdjustmentwithAdvance->ViewCustomAttributes = "";

			// AdjustmentBillNumber
			$this->AdjustmentBillNumber->ViewValue = $this->AdjustmentBillNumber->CurrentValue;
			$this->AdjustmentBillNumber->ViewCustomAttributes = "";

			// CancelAdvance
			$this->CancelAdvance->ViewValue = $this->CancelAdvance->CurrentValue;
			$this->CancelAdvance->ViewCustomAttributes = "";

			// CancelReasan
			$this->CancelReasan->ViewValue = $this->CancelReasan->CurrentValue;
			$this->CancelReasan->ViewCustomAttributes = "";

			// CancelBy
			$this->CancelBy->ViewValue = $this->CancelBy->CurrentValue;
			$this->CancelBy->ViewCustomAttributes = "";

			// CancelDate
			$this->CancelDate->ViewValue = $this->CancelDate->CurrentValue;
			$this->CancelDate->ViewValue = FormatDateTime($this->CancelDate->ViewValue, 0);
			$this->CancelDate->ViewCustomAttributes = "";

			// CancelDateTime
			$this->CancelDateTime->ViewValue = $this->CancelDateTime->CurrentValue;
			$this->CancelDateTime->ViewValue = FormatDateTime($this->CancelDateTime->ViewValue, 0);
			$this->CancelDateTime->ViewCustomAttributes = "";

			// CanceledBy
			$this->CanceledBy->ViewValue = $this->CanceledBy->CurrentValue;
			$this->CanceledBy->ViewCustomAttributes = "";

			// CancelStatus
			$this->CancelStatus->ViewValue = $this->CancelStatus->CurrentValue;
			$this->CancelStatus->ViewCustomAttributes = "";

			// Cash
			$this->Cash->ViewValue = $this->Cash->CurrentValue;
			$this->Cash->ViewValue = FormatNumber($this->Cash->ViewValue, 2, -2, -2, -2);
			$this->Cash->ViewCustomAttributes = "";

			// Card
			$this->Card->ViewValue = $this->Card->CurrentValue;
			$this->Card->ViewValue = FormatNumber($this->Card->ViewValue, 2, -2, -2, -2);
			$this->Card->ViewCustomAttributes = "";

			// id
			$this->id->LinkCustomAttributes = "";
			$this->id->HrefValue = "";
			$this->id->TooltipValue = "";

			// freezed
			$this->freezed->LinkCustomAttributes = "";
			$this->freezed->HrefValue = "";
			$this->freezed->TooltipValue = "";

			// PatientID
			$this->PatientID->LinkCustomAttributes = "";
			$this->PatientID->HrefValue = "";
			$this->PatientID->TooltipValue = "";

			// PatientName
			$this->PatientName->LinkCustomAttributes = "";
			$this->PatientName->HrefValue = "";
			$this->PatientName->TooltipValue = "";

			// Name
			$this->Name->LinkCustomAttributes = "";
			$this->Name->HrefValue = "";
			$this->Name->TooltipValue = "";

			// Mobile
			$this->Mobile->LinkCustomAttributes = "";
			$this->Mobile->HrefValue = "";
			$this->Mobile->TooltipValue = "";

			// voucher_type
			$this->voucher_type->LinkCustomAttributes = "";
			$this->voucher_type->HrefValue = "";
			$this->voucher_type->TooltipValue = "";

			// Details
			$this->Details->LinkCustomAttributes = "";
			$this->Details->HrefValue = "";
			$this->Details->TooltipValue = "";

			// ModeofPayment
			$this->ModeofPayment->LinkCustomAttributes = "";
			$this->ModeofPayment->HrefValue = "";
			$this->ModeofPayment->TooltipValue = "";

			// Amount
			$this->Amount->LinkCustomAttributes = "";
			$this->Amount->HrefValue = "";
			$this->Amount->TooltipValue = "";

			// AnyDues
			$this->AnyDues->LinkCustomAttributes = "";
			$this->AnyDues->HrefValue = "";
			$this->AnyDues->TooltipValue = "";

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

			// PatID
			$this->PatID->LinkCustomAttributes = "";
			$this->PatID->HrefValue = "";
			$this->PatID->TooltipValue = "";

			// VisiteType
			$this->VisiteType->LinkCustomAttributes = "";
			$this->VisiteType->HrefValue = "";
			$this->VisiteType->TooltipValue = "";

			// VisitDate
			$this->VisitDate->LinkCustomAttributes = "";
			$this->VisitDate->HrefValue = "";
			$this->VisitDate->TooltipValue = "";

			// AdvanceNo
			$this->AdvanceNo->LinkCustomAttributes = "";
			$this->AdvanceNo->HrefValue = "";
			$this->AdvanceNo->TooltipValue = "";

			// Status
			$this->Status->LinkCustomAttributes = "";
			$this->Status->HrefValue = "";
			$this->Status->TooltipValue = "";

			// Date
			$this->Date->LinkCustomAttributes = "";
			$this->Date->HrefValue = "";
			$this->Date->TooltipValue = "";

			// AdvanceValidityDate
			$this->AdvanceValidityDate->LinkCustomAttributes = "";
			$this->AdvanceValidityDate->HrefValue = "";
			$this->AdvanceValidityDate->TooltipValue = "";

			// TotalRemainingAdvance
			$this->TotalRemainingAdvance->LinkCustomAttributes = "";
			$this->TotalRemainingAdvance->HrefValue = "";
			$this->TotalRemainingAdvance->TooltipValue = "";

			// Remarks
			$this->Remarks->LinkCustomAttributes = "";
			$this->Remarks->HrefValue = "";
			$this->Remarks->TooltipValue = "";

			// SeectPaymentMode
			$this->SeectPaymentMode->LinkCustomAttributes = "";
			$this->SeectPaymentMode->HrefValue = "";
			$this->SeectPaymentMode->TooltipValue = "";

			// PaidAmount
			$this->PaidAmount->LinkCustomAttributes = "";
			$this->PaidAmount->HrefValue = "";
			$this->PaidAmount->TooltipValue = "";

			// Currency
			$this->Currency->LinkCustomAttributes = "";
			$this->Currency->HrefValue = "";
			$this->Currency->TooltipValue = "";

			// CardNumber
			$this->CardNumber->LinkCustomAttributes = "";
			$this->CardNumber->HrefValue = "";
			$this->CardNumber->TooltipValue = "";

			// BankName
			$this->BankName->LinkCustomAttributes = "";
			$this->BankName->HrefValue = "";
			$this->BankName->TooltipValue = "";

			// HospID
			$this->HospID->LinkCustomAttributes = "";
			$this->HospID->HrefValue = "";
			$this->HospID->TooltipValue = "";

			// Reception
			$this->Reception->LinkCustomAttributes = "";
			$this->Reception->HrefValue = "";
			$this->Reception->TooltipValue = "";

			// mrnno
			$this->mrnno->LinkCustomAttributes = "";
			$this->mrnno->HrefValue = "";
			$this->mrnno->TooltipValue = "";

			// GetUserName
			$this->GetUserName->LinkCustomAttributes = "";
			$this->GetUserName->HrefValue = "";
			$this->GetUserName->TooltipValue = "";

			// AdjustmentwithAdvance
			$this->AdjustmentwithAdvance->LinkCustomAttributes = "";
			$this->AdjustmentwithAdvance->HrefValue = "";
			$this->AdjustmentwithAdvance->TooltipValue = "";

			// AdjustmentBillNumber
			$this->AdjustmentBillNumber->LinkCustomAttributes = "";
			$this->AdjustmentBillNumber->HrefValue = "";
			$this->AdjustmentBillNumber->TooltipValue = "";

			// CancelAdvance
			$this->CancelAdvance->LinkCustomAttributes = "";
			$this->CancelAdvance->HrefValue = "";
			$this->CancelAdvance->TooltipValue = "";

			// CancelReasan
			$this->CancelReasan->LinkCustomAttributes = "";
			$this->CancelReasan->HrefValue = "";
			$this->CancelReasan->TooltipValue = "";

			// CancelBy
			$this->CancelBy->LinkCustomAttributes = "";
			$this->CancelBy->HrefValue = "";
			$this->CancelBy->TooltipValue = "";

			// CancelDate
			$this->CancelDate->LinkCustomAttributes = "";
			$this->CancelDate->HrefValue = "";
			$this->CancelDate->TooltipValue = "";

			// CancelDateTime
			$this->CancelDateTime->LinkCustomAttributes = "";
			$this->CancelDateTime->HrefValue = "";
			$this->CancelDateTime->TooltipValue = "";

			// CanceledBy
			$this->CanceledBy->LinkCustomAttributes = "";
			$this->CanceledBy->HrefValue = "";
			$this->CanceledBy->TooltipValue = "";

			// CancelStatus
			$this->CancelStatus->LinkCustomAttributes = "";
			$this->CancelStatus->HrefValue = "";
			$this->CancelStatus->TooltipValue = "";

			// Cash
			$this->Cash->LinkCustomAttributes = "";
			$this->Cash->HrefValue = "";
			$this->Cash->TooltipValue = "";

			// Card
			$this->Card->LinkCustomAttributes = "";
			$this->Card->HrefValue = "";
			$this->Card->TooltipValue = "";
		} elseif ($this->RowType == ROWTYPE_EDIT) { // Edit row

			// id
			$this->id->EditAttrs["class"] = "form-control";
			$this->id->EditCustomAttributes = "";
			$this->id->EditValue = $this->id->CurrentValue;
			$this->id->ViewCustomAttributes = "";

			// freezed
			$this->freezed->EditCustomAttributes = "";
			$this->freezed->EditValue = $this->freezed->options(FALSE);

			// PatientID
			$this->PatientID->EditAttrs["class"] = "form-control";
			$this->PatientID->EditCustomAttributes = "";
			$this->PatientID->EditValue = $this->PatientID->CurrentValue;
			$this->PatientID->ViewCustomAttributes = "";

			// PatientName
			$this->PatientName->EditAttrs["class"] = "form-control";
			$this->PatientName->EditCustomAttributes = "";
			$this->PatientName->EditValue = $this->PatientName->CurrentValue;
			$this->PatientName->ViewCustomAttributes = "";

			// Name
			$this->Name->EditAttrs["class"] = "form-control";
			$this->Name->EditCustomAttributes = "";
			$this->Name->EditValue = $this->Name->CurrentValue;
			$this->Name->ViewCustomAttributes = "";

			// Mobile
			$this->Mobile->EditAttrs["class"] = "form-control";
			$this->Mobile->EditCustomAttributes = "";
			$this->Mobile->EditValue = $this->Mobile->CurrentValue;
			$this->Mobile->ViewCustomAttributes = "";

			// voucher_type
			$this->voucher_type->EditAttrs["class"] = "form-control";
			$this->voucher_type->EditCustomAttributes = "";
			$this->voucher_type->EditValue = $this->voucher_type->CurrentValue;
			$this->voucher_type->ViewCustomAttributes = "";

			// Details
			$this->Details->EditAttrs["class"] = "form-control";
			$this->Details->EditCustomAttributes = "";
			$this->Details->EditValue = $this->Details->CurrentValue;
			$this->Details->ViewCustomAttributes = "";

			// ModeofPayment
			$this->ModeofPayment->EditAttrs["class"] = "form-control";
			$this->ModeofPayment->EditCustomAttributes = "";
			$this->ModeofPayment->EditValue = $this->ModeofPayment->CurrentValue;
			$this->ModeofPayment->ViewCustomAttributes = "";

			// Amount
			$this->Amount->EditAttrs["class"] = "form-control";
			$this->Amount->EditCustomAttributes = "";
			$this->Amount->EditValue = $this->Amount->CurrentValue;
			$this->Amount->EditValue = FormatNumber($this->Amount->EditValue, 2, -2, -2, -2);
			$this->Amount->ViewCustomAttributes = "";

			// AnyDues
			$this->AnyDues->EditAttrs["class"] = "form-control";
			$this->AnyDues->EditCustomAttributes = "";
			$this->AnyDues->EditValue = $this->AnyDues->CurrentValue;
			$this->AnyDues->ViewCustomAttributes = "";

			// createdby
			$this->createdby->EditAttrs["class"] = "form-control";
			$this->createdby->EditCustomAttributes = "";
			$this->createdby->EditValue = $this->createdby->CurrentValue;
			$this->createdby->ViewCustomAttributes = "";

			// createddatetime
			$this->createddatetime->EditAttrs["class"] = "form-control";
			$this->createddatetime->EditCustomAttributes = "";
			$this->createddatetime->EditValue = $this->createddatetime->CurrentValue;
			$this->createddatetime->EditValue = FormatDateTime($this->createddatetime->EditValue, 0);
			$this->createddatetime->ViewCustomAttributes = "";

			// modifiedby
			$this->modifiedby->EditAttrs["class"] = "form-control";
			$this->modifiedby->EditCustomAttributes = "";
			$this->modifiedby->EditValue = $this->modifiedby->CurrentValue;
			$this->modifiedby->ViewCustomAttributes = "";

			// modifieddatetime
			$this->modifieddatetime->EditAttrs["class"] = "form-control";
			$this->modifieddatetime->EditCustomAttributes = "";
			$this->modifieddatetime->EditValue = $this->modifieddatetime->CurrentValue;
			$this->modifieddatetime->EditValue = FormatDateTime($this->modifieddatetime->EditValue, 0);
			$this->modifieddatetime->ViewCustomAttributes = "";

			// PatID
			$this->PatID->EditAttrs["class"] = "form-control";
			$this->PatID->EditCustomAttributes = "";
			$this->PatID->EditValue = $this->PatID->CurrentValue;
			$this->PatID->EditValue = FormatNumber($this->PatID->EditValue, 0, -2, -2, -2);
			$this->PatID->ViewCustomAttributes = "";

			// VisiteType
			$this->VisiteType->EditAttrs["class"] = "form-control";
			$this->VisiteType->EditCustomAttributes = "";
			$this->VisiteType->EditValue = $this->VisiteType->CurrentValue;
			$this->VisiteType->ViewCustomAttributes = "";

			// VisitDate
			$this->VisitDate->EditAttrs["class"] = "form-control";
			$this->VisitDate->EditCustomAttributes = "";
			$this->VisitDate->EditValue = $this->VisitDate->CurrentValue;
			$this->VisitDate->EditValue = FormatDateTime($this->VisitDate->EditValue, 0);
			$this->VisitDate->ViewCustomAttributes = "";

			// AdvanceNo
			$this->AdvanceNo->EditAttrs["class"] = "form-control";
			$this->AdvanceNo->EditCustomAttributes = "";
			$this->AdvanceNo->EditValue = $this->AdvanceNo->CurrentValue;
			$this->AdvanceNo->ViewCustomAttributes = "";

			// Status
			$this->Status->EditAttrs["class"] = "form-control";
			$this->Status->EditCustomAttributes = "";
			$this->Status->EditValue = $this->Status->CurrentValue;
			$this->Status->ViewCustomAttributes = "";

			// Date
			$this->Date->EditAttrs["class"] = "form-control";
			$this->Date->EditCustomAttributes = "";
			$this->Date->EditValue = $this->Date->CurrentValue;
			$this->Date->EditValue = FormatDateTime($this->Date->EditValue, 0);
			$this->Date->ViewCustomAttributes = "";

			// AdvanceValidityDate
			$this->AdvanceValidityDate->EditAttrs["class"] = "form-control";
			$this->AdvanceValidityDate->EditCustomAttributes = "";
			$this->AdvanceValidityDate->EditValue = $this->AdvanceValidityDate->CurrentValue;
			$this->AdvanceValidityDate->EditValue = FormatDateTime($this->AdvanceValidityDate->EditValue, 0);
			$this->AdvanceValidityDate->ViewCustomAttributes = "";

			// TotalRemainingAdvance
			$this->TotalRemainingAdvance->EditAttrs["class"] = "form-control";
			$this->TotalRemainingAdvance->EditCustomAttributes = "";
			$this->TotalRemainingAdvance->EditValue = $this->TotalRemainingAdvance->CurrentValue;
			$this->TotalRemainingAdvance->ViewCustomAttributes = "";

			// Remarks
			$this->Remarks->EditAttrs["class"] = "form-control";
			$this->Remarks->EditCustomAttributes = "";
			$this->Remarks->EditValue = $this->Remarks->CurrentValue;
			$this->Remarks->ViewCustomAttributes = "";

			// SeectPaymentMode
			$this->SeectPaymentMode->EditAttrs["class"] = "form-control";
			$this->SeectPaymentMode->EditCustomAttributes = "";
			$this->SeectPaymentMode->EditValue = $this->SeectPaymentMode->CurrentValue;
			$this->SeectPaymentMode->ViewCustomAttributes = "";

			// PaidAmount
			$this->PaidAmount->EditAttrs["class"] = "form-control";
			$this->PaidAmount->EditCustomAttributes = "";
			$this->PaidAmount->EditValue = $this->PaidAmount->CurrentValue;
			$this->PaidAmount->ViewCustomAttributes = "";

			// Currency
			$this->Currency->EditAttrs["class"] = "form-control";
			$this->Currency->EditCustomAttributes = "";
			$this->Currency->EditValue = $this->Currency->CurrentValue;
			$this->Currency->ViewCustomAttributes = "";

			// CardNumber
			$this->CardNumber->EditAttrs["class"] = "form-control";
			$this->CardNumber->EditCustomAttributes = "";
			$this->CardNumber->EditValue = $this->CardNumber->CurrentValue;
			$this->CardNumber->ViewCustomAttributes = "";

			// BankName
			$this->BankName->EditAttrs["class"] = "form-control";
			$this->BankName->EditCustomAttributes = "";
			$this->BankName->EditValue = $this->BankName->CurrentValue;
			$this->BankName->ViewCustomAttributes = "";

			// HospID
			$this->HospID->EditAttrs["class"] = "form-control";
			$this->HospID->EditCustomAttributes = "";
			$this->HospID->EditValue = $this->HospID->CurrentValue;
			$this->HospID->EditValue = FormatNumber($this->HospID->EditValue, 0, -2, -2, -2);
			$this->HospID->ViewCustomAttributes = "";

			// Reception
			$this->Reception->EditAttrs["class"] = "form-control";
			$this->Reception->EditCustomAttributes = "";
			$this->Reception->EditValue = $this->Reception->CurrentValue;
			$this->Reception->EditValue = FormatNumber($this->Reception->EditValue, 0, -2, -2, -2);
			$this->Reception->ViewCustomAttributes = "";

			// mrnno
			$this->mrnno->EditAttrs["class"] = "form-control";
			$this->mrnno->EditCustomAttributes = "";
			$this->mrnno->EditValue = $this->mrnno->CurrentValue;
			$this->mrnno->ViewCustomAttributes = "";

			// GetUserName
			$this->GetUserName->EditAttrs["class"] = "form-control";
			$this->GetUserName->EditCustomAttributes = "";
			$this->GetUserName->EditValue = $this->GetUserName->CurrentValue;
			$this->GetUserName->ViewCustomAttributes = "";

			// AdjustmentwithAdvance
			$this->AdjustmentwithAdvance->EditAttrs["class"] = "form-control";
			$this->AdjustmentwithAdvance->EditCustomAttributes = "";
			$this->AdjustmentwithAdvance->EditValue = $this->AdjustmentwithAdvance->CurrentValue;
			$this->AdjustmentwithAdvance->ViewCustomAttributes = "";

			// AdjustmentBillNumber
			$this->AdjustmentBillNumber->EditAttrs["class"] = "form-control";
			$this->AdjustmentBillNumber->EditCustomAttributes = "";
			$this->AdjustmentBillNumber->EditValue = $this->AdjustmentBillNumber->CurrentValue;
			$this->AdjustmentBillNumber->ViewCustomAttributes = "";

			// CancelAdvance
			$this->CancelAdvance->EditAttrs["class"] = "form-control";
			$this->CancelAdvance->EditCustomAttributes = "";
			$this->CancelAdvance->EditValue = $this->CancelAdvance->CurrentValue;
			$this->CancelAdvance->ViewCustomAttributes = "";

			// CancelReasan
			$this->CancelReasan->EditAttrs["class"] = "form-control";
			$this->CancelReasan->EditCustomAttributes = "";
			$this->CancelReasan->EditValue = $this->CancelReasan->CurrentValue;
			$this->CancelReasan->ViewCustomAttributes = "";

			// CancelBy
			$this->CancelBy->EditAttrs["class"] = "form-control";
			$this->CancelBy->EditCustomAttributes = "";
			$this->CancelBy->EditValue = $this->CancelBy->CurrentValue;
			$this->CancelBy->ViewCustomAttributes = "";

			// CancelDate
			$this->CancelDate->EditAttrs["class"] = "form-control";
			$this->CancelDate->EditCustomAttributes = "";
			$this->CancelDate->EditValue = $this->CancelDate->CurrentValue;
			$this->CancelDate->EditValue = FormatDateTime($this->CancelDate->EditValue, 0);
			$this->CancelDate->ViewCustomAttributes = "";

			// CancelDateTime
			$this->CancelDateTime->EditAttrs["class"] = "form-control";
			$this->CancelDateTime->EditCustomAttributes = "";
			$this->CancelDateTime->EditValue = $this->CancelDateTime->CurrentValue;
			$this->CancelDateTime->EditValue = FormatDateTime($this->CancelDateTime->EditValue, 0);
			$this->CancelDateTime->ViewCustomAttributes = "";

			// CanceledBy
			$this->CanceledBy->EditAttrs["class"] = "form-control";
			$this->CanceledBy->EditCustomAttributes = "";
			$this->CanceledBy->EditValue = $this->CanceledBy->CurrentValue;
			$this->CanceledBy->ViewCustomAttributes = "";

			// CancelStatus
			$this->CancelStatus->EditAttrs["class"] = "form-control";
			$this->CancelStatus->EditCustomAttributes = "";
			$this->CancelStatus->EditValue = $this->CancelStatus->CurrentValue;
			$this->CancelStatus->ViewCustomAttributes = "";

			// Cash
			$this->Cash->EditAttrs["class"] = "form-control";
			$this->Cash->EditCustomAttributes = "";
			$this->Cash->EditValue = $this->Cash->CurrentValue;
			$this->Cash->EditValue = FormatNumber($this->Cash->EditValue, 2, -2, -2, -2);
			$this->Cash->ViewCustomAttributes = "";

			// Card
			$this->Card->EditAttrs["class"] = "form-control";
			$this->Card->EditCustomAttributes = "";
			$this->Card->EditValue = $this->Card->CurrentValue;
			$this->Card->EditValue = FormatNumber($this->Card->EditValue, 2, -2, -2, -2);
			$this->Card->ViewCustomAttributes = "";

			// Edit refer script
			// id

			$this->id->LinkCustomAttributes = "";
			$this->id->HrefValue = "";
			$this->id->TooltipValue = "";

			// freezed
			$this->freezed->LinkCustomAttributes = "";
			$this->freezed->HrefValue = "";

			// PatientID
			$this->PatientID->LinkCustomAttributes = "";
			$this->PatientID->HrefValue = "";
			$this->PatientID->TooltipValue = "";

			// PatientName
			$this->PatientName->LinkCustomAttributes = "";
			$this->PatientName->HrefValue = "";
			$this->PatientName->TooltipValue = "";

			// Name
			$this->Name->LinkCustomAttributes = "";
			$this->Name->HrefValue = "";
			$this->Name->TooltipValue = "";

			// Mobile
			$this->Mobile->LinkCustomAttributes = "";
			$this->Mobile->HrefValue = "";
			$this->Mobile->TooltipValue = "";

			// voucher_type
			$this->voucher_type->LinkCustomAttributes = "";
			$this->voucher_type->HrefValue = "";
			$this->voucher_type->TooltipValue = "";

			// Details
			$this->Details->LinkCustomAttributes = "";
			$this->Details->HrefValue = "";
			$this->Details->TooltipValue = "";

			// ModeofPayment
			$this->ModeofPayment->LinkCustomAttributes = "";
			$this->ModeofPayment->HrefValue = "";
			$this->ModeofPayment->TooltipValue = "";

			// Amount
			$this->Amount->LinkCustomAttributes = "";
			$this->Amount->HrefValue = "";
			$this->Amount->TooltipValue = "";

			// AnyDues
			$this->AnyDues->LinkCustomAttributes = "";
			$this->AnyDues->HrefValue = "";
			$this->AnyDues->TooltipValue = "";

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

			// PatID
			$this->PatID->LinkCustomAttributes = "";
			$this->PatID->HrefValue = "";
			$this->PatID->TooltipValue = "";

			// VisiteType
			$this->VisiteType->LinkCustomAttributes = "";
			$this->VisiteType->HrefValue = "";
			$this->VisiteType->TooltipValue = "";

			// VisitDate
			$this->VisitDate->LinkCustomAttributes = "";
			$this->VisitDate->HrefValue = "";
			$this->VisitDate->TooltipValue = "";

			// AdvanceNo
			$this->AdvanceNo->LinkCustomAttributes = "";
			$this->AdvanceNo->HrefValue = "";
			$this->AdvanceNo->TooltipValue = "";

			// Status
			$this->Status->LinkCustomAttributes = "";
			$this->Status->HrefValue = "";
			$this->Status->TooltipValue = "";

			// Date
			$this->Date->LinkCustomAttributes = "";
			$this->Date->HrefValue = "";
			$this->Date->TooltipValue = "";

			// AdvanceValidityDate
			$this->AdvanceValidityDate->LinkCustomAttributes = "";
			$this->AdvanceValidityDate->HrefValue = "";
			$this->AdvanceValidityDate->TooltipValue = "";

			// TotalRemainingAdvance
			$this->TotalRemainingAdvance->LinkCustomAttributes = "";
			$this->TotalRemainingAdvance->HrefValue = "";
			$this->TotalRemainingAdvance->TooltipValue = "";

			// Remarks
			$this->Remarks->LinkCustomAttributes = "";
			$this->Remarks->HrefValue = "";
			$this->Remarks->TooltipValue = "";

			// SeectPaymentMode
			$this->SeectPaymentMode->LinkCustomAttributes = "";
			$this->SeectPaymentMode->HrefValue = "";
			$this->SeectPaymentMode->TooltipValue = "";

			// PaidAmount
			$this->PaidAmount->LinkCustomAttributes = "";
			$this->PaidAmount->HrefValue = "";
			$this->PaidAmount->TooltipValue = "";

			// Currency
			$this->Currency->LinkCustomAttributes = "";
			$this->Currency->HrefValue = "";
			$this->Currency->TooltipValue = "";

			// CardNumber
			$this->CardNumber->LinkCustomAttributes = "";
			$this->CardNumber->HrefValue = "";
			$this->CardNumber->TooltipValue = "";

			// BankName
			$this->BankName->LinkCustomAttributes = "";
			$this->BankName->HrefValue = "";
			$this->BankName->TooltipValue = "";

			// HospID
			$this->HospID->LinkCustomAttributes = "";
			$this->HospID->HrefValue = "";
			$this->HospID->TooltipValue = "";

			// Reception
			$this->Reception->LinkCustomAttributes = "";
			$this->Reception->HrefValue = "";
			$this->Reception->TooltipValue = "";

			// mrnno
			$this->mrnno->LinkCustomAttributes = "";
			$this->mrnno->HrefValue = "";
			$this->mrnno->TooltipValue = "";

			// GetUserName
			$this->GetUserName->LinkCustomAttributes = "";
			$this->GetUserName->HrefValue = "";
			$this->GetUserName->TooltipValue = "";

			// AdjustmentwithAdvance
			$this->AdjustmentwithAdvance->LinkCustomAttributes = "";
			$this->AdjustmentwithAdvance->HrefValue = "";
			$this->AdjustmentwithAdvance->TooltipValue = "";

			// AdjustmentBillNumber
			$this->AdjustmentBillNumber->LinkCustomAttributes = "";
			$this->AdjustmentBillNumber->HrefValue = "";
			$this->AdjustmentBillNumber->TooltipValue = "";

			// CancelAdvance
			$this->CancelAdvance->LinkCustomAttributes = "";
			$this->CancelAdvance->HrefValue = "";
			$this->CancelAdvance->TooltipValue = "";

			// CancelReasan
			$this->CancelReasan->LinkCustomAttributes = "";
			$this->CancelReasan->HrefValue = "";
			$this->CancelReasan->TooltipValue = "";

			// CancelBy
			$this->CancelBy->LinkCustomAttributes = "";
			$this->CancelBy->HrefValue = "";
			$this->CancelBy->TooltipValue = "";

			// CancelDate
			$this->CancelDate->LinkCustomAttributes = "";
			$this->CancelDate->HrefValue = "";
			$this->CancelDate->TooltipValue = "";

			// CancelDateTime
			$this->CancelDateTime->LinkCustomAttributes = "";
			$this->CancelDateTime->HrefValue = "";
			$this->CancelDateTime->TooltipValue = "";

			// CanceledBy
			$this->CanceledBy->LinkCustomAttributes = "";
			$this->CanceledBy->HrefValue = "";
			$this->CanceledBy->TooltipValue = "";

			// CancelStatus
			$this->CancelStatus->LinkCustomAttributes = "";
			$this->CancelStatus->HrefValue = "";
			$this->CancelStatus->TooltipValue = "";

			// Cash
			$this->Cash->LinkCustomAttributes = "";
			$this->Cash->HrefValue = "";
			$this->Cash->TooltipValue = "";

			// Card
			$this->Card->LinkCustomAttributes = "";
			$this->Card->HrefValue = "";
			$this->Card->TooltipValue = "";
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
		if ($this->freezed->Required) {
			if ($this->freezed->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->freezed->caption(), $this->freezed->RequiredErrorMessage));
			}
		}
		if ($this->PatientID->Required) {
			if (!$this->PatientID->IsDetailKey && $this->PatientID->FormValue != NULL && $this->PatientID->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PatientID->caption(), $this->PatientID->RequiredErrorMessage));
			}
		}
		if ($this->PatientName->Required) {
			if (!$this->PatientName->IsDetailKey && $this->PatientName->FormValue != NULL && $this->PatientName->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PatientName->caption(), $this->PatientName->RequiredErrorMessage));
			}
		}
		if ($this->Name->Required) {
			if (!$this->Name->IsDetailKey && $this->Name->FormValue != NULL && $this->Name->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Name->caption(), $this->Name->RequiredErrorMessage));
			}
		}
		if ($this->Mobile->Required) {
			if (!$this->Mobile->IsDetailKey && $this->Mobile->FormValue != NULL && $this->Mobile->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Mobile->caption(), $this->Mobile->RequiredErrorMessage));
			}
		}
		if ($this->voucher_type->Required) {
			if (!$this->voucher_type->IsDetailKey && $this->voucher_type->FormValue != NULL && $this->voucher_type->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->voucher_type->caption(), $this->voucher_type->RequiredErrorMessage));
			}
		}
		if ($this->Details->Required) {
			if (!$this->Details->IsDetailKey && $this->Details->FormValue != NULL && $this->Details->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Details->caption(), $this->Details->RequiredErrorMessage));
			}
		}
		if ($this->ModeofPayment->Required) {
			if (!$this->ModeofPayment->IsDetailKey && $this->ModeofPayment->FormValue != NULL && $this->ModeofPayment->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->ModeofPayment->caption(), $this->ModeofPayment->RequiredErrorMessage));
			}
		}
		if ($this->Amount->Required) {
			if (!$this->Amount->IsDetailKey && $this->Amount->FormValue != NULL && $this->Amount->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Amount->caption(), $this->Amount->RequiredErrorMessage));
			}
		}
		if ($this->AnyDues->Required) {
			if (!$this->AnyDues->IsDetailKey && $this->AnyDues->FormValue != NULL && $this->AnyDues->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->AnyDues->caption(), $this->AnyDues->RequiredErrorMessage));
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
		if ($this->PatID->Required) {
			if (!$this->PatID->IsDetailKey && $this->PatID->FormValue != NULL && $this->PatID->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PatID->caption(), $this->PatID->RequiredErrorMessage));
			}
		}
		if ($this->VisiteType->Required) {
			if (!$this->VisiteType->IsDetailKey && $this->VisiteType->FormValue != NULL && $this->VisiteType->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->VisiteType->caption(), $this->VisiteType->RequiredErrorMessage));
			}
		}
		if ($this->VisitDate->Required) {
			if (!$this->VisitDate->IsDetailKey && $this->VisitDate->FormValue != NULL && $this->VisitDate->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->VisitDate->caption(), $this->VisitDate->RequiredErrorMessage));
			}
		}
		if ($this->AdvanceNo->Required) {
			if (!$this->AdvanceNo->IsDetailKey && $this->AdvanceNo->FormValue != NULL && $this->AdvanceNo->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->AdvanceNo->caption(), $this->AdvanceNo->RequiredErrorMessage));
			}
		}
		if ($this->Status->Required) {
			if (!$this->Status->IsDetailKey && $this->Status->FormValue != NULL && $this->Status->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Status->caption(), $this->Status->RequiredErrorMessage));
			}
		}
		if ($this->Date->Required) {
			if (!$this->Date->IsDetailKey && $this->Date->FormValue != NULL && $this->Date->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Date->caption(), $this->Date->RequiredErrorMessage));
			}
		}
		if ($this->AdvanceValidityDate->Required) {
			if (!$this->AdvanceValidityDate->IsDetailKey && $this->AdvanceValidityDate->FormValue != NULL && $this->AdvanceValidityDate->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->AdvanceValidityDate->caption(), $this->AdvanceValidityDate->RequiredErrorMessage));
			}
		}
		if ($this->TotalRemainingAdvance->Required) {
			if (!$this->TotalRemainingAdvance->IsDetailKey && $this->TotalRemainingAdvance->FormValue != NULL && $this->TotalRemainingAdvance->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->TotalRemainingAdvance->caption(), $this->TotalRemainingAdvance->RequiredErrorMessage));
			}
		}
		if ($this->Remarks->Required) {
			if (!$this->Remarks->IsDetailKey && $this->Remarks->FormValue != NULL && $this->Remarks->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Remarks->caption(), $this->Remarks->RequiredErrorMessage));
			}
		}
		if ($this->SeectPaymentMode->Required) {
			if (!$this->SeectPaymentMode->IsDetailKey && $this->SeectPaymentMode->FormValue != NULL && $this->SeectPaymentMode->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->SeectPaymentMode->caption(), $this->SeectPaymentMode->RequiredErrorMessage));
			}
		}
		if ($this->PaidAmount->Required) {
			if (!$this->PaidAmount->IsDetailKey && $this->PaidAmount->FormValue != NULL && $this->PaidAmount->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PaidAmount->caption(), $this->PaidAmount->RequiredErrorMessage));
			}
		}
		if ($this->Currency->Required) {
			if (!$this->Currency->IsDetailKey && $this->Currency->FormValue != NULL && $this->Currency->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Currency->caption(), $this->Currency->RequiredErrorMessage));
			}
		}
		if ($this->CardNumber->Required) {
			if (!$this->CardNumber->IsDetailKey && $this->CardNumber->FormValue != NULL && $this->CardNumber->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->CardNumber->caption(), $this->CardNumber->RequiredErrorMessage));
			}
		}
		if ($this->BankName->Required) {
			if (!$this->BankName->IsDetailKey && $this->BankName->FormValue != NULL && $this->BankName->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->BankName->caption(), $this->BankName->RequiredErrorMessage));
			}
		}
		if ($this->HospID->Required) {
			if (!$this->HospID->IsDetailKey && $this->HospID->FormValue != NULL && $this->HospID->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->HospID->caption(), $this->HospID->RequiredErrorMessage));
			}
		}
		if ($this->Reception->Required) {
			if (!$this->Reception->IsDetailKey && $this->Reception->FormValue != NULL && $this->Reception->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Reception->caption(), $this->Reception->RequiredErrorMessage));
			}
		}
		if ($this->mrnno->Required) {
			if (!$this->mrnno->IsDetailKey && $this->mrnno->FormValue != NULL && $this->mrnno->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->mrnno->caption(), $this->mrnno->RequiredErrorMessage));
			}
		}
		if ($this->GetUserName->Required) {
			if (!$this->GetUserName->IsDetailKey && $this->GetUserName->FormValue != NULL && $this->GetUserName->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->GetUserName->caption(), $this->GetUserName->RequiredErrorMessage));
			}
		}
		if ($this->AdjustmentwithAdvance->Required) {
			if (!$this->AdjustmentwithAdvance->IsDetailKey && $this->AdjustmentwithAdvance->FormValue != NULL && $this->AdjustmentwithAdvance->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->AdjustmentwithAdvance->caption(), $this->AdjustmentwithAdvance->RequiredErrorMessage));
			}
		}
		if ($this->AdjustmentBillNumber->Required) {
			if (!$this->AdjustmentBillNumber->IsDetailKey && $this->AdjustmentBillNumber->FormValue != NULL && $this->AdjustmentBillNumber->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->AdjustmentBillNumber->caption(), $this->AdjustmentBillNumber->RequiredErrorMessage));
			}
		}
		if ($this->CancelAdvance->Required) {
			if (!$this->CancelAdvance->IsDetailKey && $this->CancelAdvance->FormValue != NULL && $this->CancelAdvance->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->CancelAdvance->caption(), $this->CancelAdvance->RequiredErrorMessage));
			}
		}
		if ($this->CancelReasan->Required) {
			if (!$this->CancelReasan->IsDetailKey && $this->CancelReasan->FormValue != NULL && $this->CancelReasan->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->CancelReasan->caption(), $this->CancelReasan->RequiredErrorMessage));
			}
		}
		if ($this->CancelBy->Required) {
			if (!$this->CancelBy->IsDetailKey && $this->CancelBy->FormValue != NULL && $this->CancelBy->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->CancelBy->caption(), $this->CancelBy->RequiredErrorMessage));
			}
		}
		if ($this->CancelDate->Required) {
			if (!$this->CancelDate->IsDetailKey && $this->CancelDate->FormValue != NULL && $this->CancelDate->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->CancelDate->caption(), $this->CancelDate->RequiredErrorMessage));
			}
		}
		if ($this->CancelDateTime->Required) {
			if (!$this->CancelDateTime->IsDetailKey && $this->CancelDateTime->FormValue != NULL && $this->CancelDateTime->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->CancelDateTime->caption(), $this->CancelDateTime->RequiredErrorMessage));
			}
		}
		if ($this->CanceledBy->Required) {
			if (!$this->CanceledBy->IsDetailKey && $this->CanceledBy->FormValue != NULL && $this->CanceledBy->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->CanceledBy->caption(), $this->CanceledBy->RequiredErrorMessage));
			}
		}
		if ($this->CancelStatus->Required) {
			if (!$this->CancelStatus->IsDetailKey && $this->CancelStatus->FormValue != NULL && $this->CancelStatus->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->CancelStatus->caption(), $this->CancelStatus->RequiredErrorMessage));
			}
		}
		if ($this->Cash->Required) {
			if (!$this->Cash->IsDetailKey && $this->Cash->FormValue != NULL && $this->Cash->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Cash->caption(), $this->Cash->RequiredErrorMessage));
			}
		}
		if ($this->Card->Required) {
			if (!$this->Card->IsDetailKey && $this->Card->FormValue != NULL && $this->Card->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Card->caption(), $this->Card->RequiredErrorMessage));
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

			// freezed
			$this->freezed->setDbValueDef($rsnew, $this->freezed->CurrentValue, NULL, $this->freezed->ReadOnly);

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

	// Set up Breadcrumb
	protected function setupBreadcrumb()
	{
		global $Breadcrumb, $Language;
		$Breadcrumb = new Breadcrumb();
		$url = substr(CurrentUrl(), strrpos(CurrentUrl(), "/")+1);
		$Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("view_advance_freezedlist.php"), "", $this->TableVar, TRUE);
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
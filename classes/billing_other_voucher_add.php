<?php
namespace PHPMaker2019\HIMS;

/**
 * Page class
 */
class billing_other_voucher_add extends billing_other_voucher
{

	// Page ID
	public $PageID = "add";

	// Project ID
	public $ProjectID = "{EA4F6D13-AF8F-428D-9EA7-BA88D1107EC3}";

	// Table name
	public $TableName = 'billing_other_voucher';

	// Page object name
	public $PageObjName = "billing_other_voucher_add";

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

		// Table object (billing_other_voucher)
		if (!isset($GLOBALS["billing_other_voucher"]) || get_class($GLOBALS["billing_other_voucher"]) == PROJECT_NAMESPACE . "billing_other_voucher") {
			$GLOBALS["billing_other_voucher"] = &$this;
			$GLOBALS["Table"] = &$GLOBALS["billing_other_voucher"];
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
			define(PROJECT_NAMESPACE . "TABLE_NAME", 'billing_other_voucher');

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
		global $EXPORT, $billing_other_voucher;
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
				$doc = new $class($billing_other_voucher);
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
					if ($pageName == "billing_other_voucherview.php")
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
					$this->terminate(GetUrl("billing_other_voucherlist.php"));
				else
					$this->terminate(GetUrl("login.php"));
				return;
			}
		}

		// Create form object
		$CurrentForm = new HttpForm();
		$this->CurrentAction = Param("action"); // Set up current action
		$this->id->Visible = FALSE;
		$this->freezed->setVisibility();
		$this->AdvanceNo->setVisibility();
		$this->PatientID->setVisibility();
		$this->PatientName->setVisibility();
		$this->Mobile->setVisibility();
		$this->ModeofPayment->setVisibility();
		$this->Amount->setVisibility();
		$this->CardNumber->setVisibility();
		$this->BankName->setVisibility();
		$this->Name->setVisibility();
		$this->voucher_type->setVisibility();
		$this->Details->setVisibility();
		$this->Date->setVisibility();
		$this->AnyDues->setVisibility();
		$this->createdby->setVisibility();
		$this->createddatetime->setVisibility();
		$this->modifiedby->Visible = FALSE;
		$this->modifieddatetime->Visible = FALSE;
		$this->PatID->setVisibility();
		$this->VisiteType->setVisibility();
		$this->VisitDate->setVisibility();
		$this->Status->setVisibility();
		$this->AdvanceValidityDate->setVisibility();
		$this->TotalRemainingAdvance->setVisibility();
		$this->Remarks->setVisibility();
		$this->SeectPaymentMode->setVisibility();
		$this->PaidAmount->setVisibility();
		$this->Currency->setVisibility();
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
		$this->setupLookupOptions($this->ModeofPayment);
		$this->setupLookupOptions($this->PatID);

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
					$this->terminate("billing_other_voucherlist.php"); // No matching record, return to list
				}
				break;
			case "insert": // Add new record
				$this->SendEmail = TRUE; // Send email on add success
				if ($this->addRow($this->OldRecordset)) { // Add successful
					if ($this->getSuccessMessage() == "")
						$this->setSuccessMessage($Language->phrase("AddSuccess")); // Set up success message
					$returnUrl = $this->GetViewUrl();
					if (GetPageName($returnUrl) == "billing_other_voucherlist.php")
						$returnUrl = $this->addMasterUrl($returnUrl); // List page, return to List page with correct master key if necessary
					elseif (GetPageName($returnUrl) == "billing_other_voucherview.php")
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
		if ($this->isConfirm()) { // Confirm page
			$this->RowType = ROWTYPE_VIEW; // Render view type
		} else {
			$this->RowType = ROWTYPE_ADD; // Render add type
		}

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
		$this->freezed->CurrentValue = NULL;
		$this->freezed->OldValue = $this->freezed->CurrentValue;
		$this->AdvanceNo->CurrentValue = NULL;
		$this->AdvanceNo->OldValue = $this->AdvanceNo->CurrentValue;
		$this->PatientID->CurrentValue = NULL;
		$this->PatientID->OldValue = $this->PatientID->CurrentValue;
		$this->PatientName->CurrentValue = NULL;
		$this->PatientName->OldValue = $this->PatientName->CurrentValue;
		$this->Mobile->CurrentValue = NULL;
		$this->Mobile->OldValue = $this->Mobile->CurrentValue;
		$this->ModeofPayment->CurrentValue = NULL;
		$this->ModeofPayment->OldValue = $this->ModeofPayment->CurrentValue;
		$this->Amount->CurrentValue = NULL;
		$this->Amount->OldValue = $this->Amount->CurrentValue;
		$this->CardNumber->CurrentValue = NULL;
		$this->CardNumber->OldValue = $this->CardNumber->CurrentValue;
		$this->BankName->CurrentValue = NULL;
		$this->BankName->OldValue = $this->BankName->CurrentValue;
		$this->Name->CurrentValue = NULL;
		$this->Name->OldValue = $this->Name->CurrentValue;
		$this->voucher_type->CurrentValue = NULL;
		$this->voucher_type->OldValue = $this->voucher_type->CurrentValue;
		$this->Details->CurrentValue = NULL;
		$this->Details->OldValue = $this->Details->CurrentValue;
		$this->Date->CurrentValue = NULL;
		$this->Date->OldValue = $this->Date->CurrentValue;
		$this->AnyDues->CurrentValue = NULL;
		$this->AnyDues->OldValue = $this->AnyDues->CurrentValue;
		$this->createdby->CurrentValue = NULL;
		$this->createdby->OldValue = $this->createdby->CurrentValue;
		$this->createddatetime->CurrentValue = NULL;
		$this->createddatetime->OldValue = $this->createddatetime->CurrentValue;
		$this->modifiedby->CurrentValue = NULL;
		$this->modifiedby->OldValue = $this->modifiedby->CurrentValue;
		$this->modifieddatetime->CurrentValue = NULL;
		$this->modifieddatetime->OldValue = $this->modifieddatetime->CurrentValue;
		$this->PatID->CurrentValue = NULL;
		$this->PatID->OldValue = $this->PatID->CurrentValue;
		$this->VisiteType->CurrentValue = NULL;
		$this->VisiteType->OldValue = $this->VisiteType->CurrentValue;
		$this->VisitDate->CurrentValue = NULL;
		$this->VisitDate->OldValue = $this->VisitDate->CurrentValue;
		$this->Status->CurrentValue = NULL;
		$this->Status->OldValue = $this->Status->CurrentValue;
		$this->AdvanceValidityDate->CurrentValue = NULL;
		$this->AdvanceValidityDate->OldValue = $this->AdvanceValidityDate->CurrentValue;
		$this->TotalRemainingAdvance->CurrentValue = NULL;
		$this->TotalRemainingAdvance->OldValue = $this->TotalRemainingAdvance->CurrentValue;
		$this->Remarks->CurrentValue = NULL;
		$this->Remarks->OldValue = $this->Remarks->CurrentValue;
		$this->SeectPaymentMode->CurrentValue = NULL;
		$this->SeectPaymentMode->OldValue = $this->SeectPaymentMode->CurrentValue;
		$this->PaidAmount->CurrentValue = NULL;
		$this->PaidAmount->OldValue = $this->PaidAmount->CurrentValue;
		$this->Currency->CurrentValue = NULL;
		$this->Currency->OldValue = $this->Currency->CurrentValue;
		$this->HospID->CurrentValue = NULL;
		$this->HospID->OldValue = $this->HospID->CurrentValue;
		$this->Reception->CurrentValue = NULL;
		$this->Reception->OldValue = $this->Reception->CurrentValue;
		$this->mrnno->CurrentValue = NULL;
		$this->mrnno->OldValue = $this->mrnno->CurrentValue;
		$this->GetUserName->CurrentValue = NULL;
		$this->GetUserName->OldValue = $this->GetUserName->CurrentValue;
		$this->AdjustmentwithAdvance->CurrentValue = NULL;
		$this->AdjustmentwithAdvance->OldValue = $this->AdjustmentwithAdvance->CurrentValue;
		$this->AdjustmentBillNumber->CurrentValue = NULL;
		$this->AdjustmentBillNumber->OldValue = $this->AdjustmentBillNumber->CurrentValue;
		$this->CancelAdvance->CurrentValue = NULL;
		$this->CancelAdvance->OldValue = $this->CancelAdvance->CurrentValue;
		$this->CancelReasan->CurrentValue = NULL;
		$this->CancelReasan->OldValue = $this->CancelReasan->CurrentValue;
		$this->CancelBy->CurrentValue = NULL;
		$this->CancelBy->OldValue = $this->CancelBy->CurrentValue;
		$this->CancelDate->CurrentValue = NULL;
		$this->CancelDate->OldValue = $this->CancelDate->CurrentValue;
		$this->CancelDateTime->CurrentValue = NULL;
		$this->CancelDateTime->OldValue = $this->CancelDateTime->CurrentValue;
		$this->CanceledBy->CurrentValue = NULL;
		$this->CanceledBy->OldValue = $this->CanceledBy->CurrentValue;
		$this->CancelStatus->CurrentValue = NULL;
		$this->CancelStatus->OldValue = $this->CancelStatus->CurrentValue;
		$this->Cash->CurrentValue = NULL;
		$this->Cash->OldValue = $this->Cash->CurrentValue;
		$this->Card->CurrentValue = NULL;
		$this->Card->OldValue = $this->Card->CurrentValue;
	}

	// Load form values
	protected function loadFormValues()
	{

		// Load from form
		global $CurrentForm;

		// Check field name 'freezed' first before field var 'x_freezed'
		$val = $CurrentForm->hasValue("freezed") ? $CurrentForm->getValue("freezed") : $CurrentForm->getValue("x_freezed");
		if (!$this->freezed->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->freezed->Visible = FALSE; // Disable update for API request
			else
				$this->freezed->setFormValue($val);
		}

		// Check field name 'AdvanceNo' first before field var 'x_AdvanceNo'
		$val = $CurrentForm->hasValue("AdvanceNo") ? $CurrentForm->getValue("AdvanceNo") : $CurrentForm->getValue("x_AdvanceNo");
		if (!$this->AdvanceNo->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->AdvanceNo->Visible = FALSE; // Disable update for API request
			else
				$this->AdvanceNo->setFormValue($val);
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

		// Check field name 'Mobile' first before field var 'x_Mobile'
		$val = $CurrentForm->hasValue("Mobile") ? $CurrentForm->getValue("Mobile") : $CurrentForm->getValue("x_Mobile");
		if (!$this->Mobile->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Mobile->Visible = FALSE; // Disable update for API request
			else
				$this->Mobile->setFormValue($val);
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

		// Check field name 'Name' first before field var 'x_Name'
		$val = $CurrentForm->hasValue("Name") ? $CurrentForm->getValue("Name") : $CurrentForm->getValue("x_Name");
		if (!$this->Name->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Name->Visible = FALSE; // Disable update for API request
			else
				$this->Name->setFormValue($val);
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

		// Check field name 'Date' first before field var 'x_Date'
		$val = $CurrentForm->hasValue("Date") ? $CurrentForm->getValue("Date") : $CurrentForm->getValue("x_Date");
		if (!$this->Date->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Date->Visible = FALSE; // Disable update for API request
			else
				$this->Date->setFormValue($val);
			$this->Date->CurrentValue = UnFormatDateTime($this->Date->CurrentValue, 7);
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
			$this->createddatetime->CurrentValue = UnFormatDateTime($this->createddatetime->CurrentValue, 7);
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

		// Check field name 'Status' first before field var 'x_Status'
		$val = $CurrentForm->hasValue("Status") ? $CurrentForm->getValue("Status") : $CurrentForm->getValue("x_Status");
		if (!$this->Status->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Status->Visible = FALSE; // Disable update for API request
			else
				$this->Status->setFormValue($val);
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
			$this->CancelDate->CurrentValue = UnFormatDateTime($this->CancelDate->CurrentValue, 7);
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

		// Check field name 'id' first before field var 'x_id'
		$val = $CurrentForm->hasValue("id") ? $CurrentForm->getValue("id") : $CurrentForm->getValue("x_id");
	}

	// Restore form values
	public function restoreFormValues()
	{
		global $CurrentForm;
		$this->freezed->CurrentValue = $this->freezed->FormValue;
		$this->AdvanceNo->CurrentValue = $this->AdvanceNo->FormValue;
		$this->PatientID->CurrentValue = $this->PatientID->FormValue;
		$this->PatientName->CurrentValue = $this->PatientName->FormValue;
		$this->Mobile->CurrentValue = $this->Mobile->FormValue;
		$this->ModeofPayment->CurrentValue = $this->ModeofPayment->FormValue;
		$this->Amount->CurrentValue = $this->Amount->FormValue;
		$this->CardNumber->CurrentValue = $this->CardNumber->FormValue;
		$this->BankName->CurrentValue = $this->BankName->FormValue;
		$this->Name->CurrentValue = $this->Name->FormValue;
		$this->voucher_type->CurrentValue = $this->voucher_type->FormValue;
		$this->Details->CurrentValue = $this->Details->FormValue;
		$this->Date->CurrentValue = $this->Date->FormValue;
		$this->Date->CurrentValue = UnFormatDateTime($this->Date->CurrentValue, 7);
		$this->AnyDues->CurrentValue = $this->AnyDues->FormValue;
		$this->createdby->CurrentValue = $this->createdby->FormValue;
		$this->createddatetime->CurrentValue = $this->createddatetime->FormValue;
		$this->createddatetime->CurrentValue = UnFormatDateTime($this->createddatetime->CurrentValue, 7);
		$this->PatID->CurrentValue = $this->PatID->FormValue;
		$this->VisiteType->CurrentValue = $this->VisiteType->FormValue;
		$this->VisitDate->CurrentValue = $this->VisitDate->FormValue;
		$this->VisitDate->CurrentValue = UnFormatDateTime($this->VisitDate->CurrentValue, 0);
		$this->Status->CurrentValue = $this->Status->FormValue;
		$this->AdvanceValidityDate->CurrentValue = $this->AdvanceValidityDate->FormValue;
		$this->AdvanceValidityDate->CurrentValue = UnFormatDateTime($this->AdvanceValidityDate->CurrentValue, 0);
		$this->TotalRemainingAdvance->CurrentValue = $this->TotalRemainingAdvance->FormValue;
		$this->Remarks->CurrentValue = $this->Remarks->FormValue;
		$this->SeectPaymentMode->CurrentValue = $this->SeectPaymentMode->FormValue;
		$this->PaidAmount->CurrentValue = $this->PaidAmount->FormValue;
		$this->Currency->CurrentValue = $this->Currency->FormValue;
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
		$this->CancelDate->CurrentValue = UnFormatDateTime($this->CancelDate->CurrentValue, 7);
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
		$this->AdvanceNo->setDbValue($row['AdvanceNo']);
		$this->PatientID->setDbValue($row['PatientID']);
		$this->PatientName->setDbValue($row['PatientName']);
		$this->Mobile->setDbValue($row['Mobile']);
		$this->ModeofPayment->setDbValue($row['ModeofPayment']);
		$this->Amount->setDbValue($row['Amount']);
		$this->CardNumber->setDbValue($row['CardNumber']);
		$this->BankName->setDbValue($row['BankName']);
		$this->Name->setDbValue($row['Name']);
		$this->voucher_type->setDbValue($row['voucher_type']);
		$this->Details->setDbValue($row['Details']);
		$this->Date->setDbValue($row['Date']);
		$this->AnyDues->setDbValue($row['AnyDues']);
		$this->createdby->setDbValue($row['createdby']);
		$this->createddatetime->setDbValue($row['createddatetime']);
		$this->modifiedby->setDbValue($row['modifiedby']);
		$this->modifieddatetime->setDbValue($row['modifieddatetime']);
		$this->PatID->setDbValue($row['PatID']);
		$this->VisiteType->setDbValue($row['VisiteType']);
		$this->VisitDate->setDbValue($row['VisitDate']);
		$this->Status->setDbValue($row['Status']);
		$this->AdvanceValidityDate->setDbValue($row['AdvanceValidityDate']);
		$this->TotalRemainingAdvance->setDbValue($row['TotalRemainingAdvance']);
		$this->Remarks->setDbValue($row['Remarks']);
		$this->SeectPaymentMode->setDbValue($row['SeectPaymentMode']);
		$this->PaidAmount->setDbValue($row['PaidAmount']);
		$this->Currency->setDbValue($row['Currency']);
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
		$this->loadDefaultValues();
		$row = [];
		$row['id'] = $this->id->CurrentValue;
		$row['freezed'] = $this->freezed->CurrentValue;
		$row['AdvanceNo'] = $this->AdvanceNo->CurrentValue;
		$row['PatientID'] = $this->PatientID->CurrentValue;
		$row['PatientName'] = $this->PatientName->CurrentValue;
		$row['Mobile'] = $this->Mobile->CurrentValue;
		$row['ModeofPayment'] = $this->ModeofPayment->CurrentValue;
		$row['Amount'] = $this->Amount->CurrentValue;
		$row['CardNumber'] = $this->CardNumber->CurrentValue;
		$row['BankName'] = $this->BankName->CurrentValue;
		$row['Name'] = $this->Name->CurrentValue;
		$row['voucher_type'] = $this->voucher_type->CurrentValue;
		$row['Details'] = $this->Details->CurrentValue;
		$row['Date'] = $this->Date->CurrentValue;
		$row['AnyDues'] = $this->AnyDues->CurrentValue;
		$row['createdby'] = $this->createdby->CurrentValue;
		$row['createddatetime'] = $this->createddatetime->CurrentValue;
		$row['modifiedby'] = $this->modifiedby->CurrentValue;
		$row['modifieddatetime'] = $this->modifieddatetime->CurrentValue;
		$row['PatID'] = $this->PatID->CurrentValue;
		$row['VisiteType'] = $this->VisiteType->CurrentValue;
		$row['VisitDate'] = $this->VisitDate->CurrentValue;
		$row['Status'] = $this->Status->CurrentValue;
		$row['AdvanceValidityDate'] = $this->AdvanceValidityDate->CurrentValue;
		$row['TotalRemainingAdvance'] = $this->TotalRemainingAdvance->CurrentValue;
		$row['Remarks'] = $this->Remarks->CurrentValue;
		$row['SeectPaymentMode'] = $this->SeectPaymentMode->CurrentValue;
		$row['PaidAmount'] = $this->PaidAmount->CurrentValue;
		$row['Currency'] = $this->Currency->CurrentValue;
		$row['HospID'] = $this->HospID->CurrentValue;
		$row['Reception'] = $this->Reception->CurrentValue;
		$row['mrnno'] = $this->mrnno->CurrentValue;
		$row['GetUserName'] = $this->GetUserName->CurrentValue;
		$row['AdjustmentwithAdvance'] = $this->AdjustmentwithAdvance->CurrentValue;
		$row['AdjustmentBillNumber'] = $this->AdjustmentBillNumber->CurrentValue;
		$row['CancelAdvance'] = $this->CancelAdvance->CurrentValue;
		$row['CancelReasan'] = $this->CancelReasan->CurrentValue;
		$row['CancelBy'] = $this->CancelBy->CurrentValue;
		$row['CancelDate'] = $this->CancelDate->CurrentValue;
		$row['CancelDateTime'] = $this->CancelDateTime->CurrentValue;
		$row['CanceledBy'] = $this->CanceledBy->CurrentValue;
		$row['CancelStatus'] = $this->CancelStatus->CurrentValue;
		$row['Cash'] = $this->Cash->CurrentValue;
		$row['Card'] = $this->Card->CurrentValue;
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
		// AdvanceNo
		// PatientID
		// PatientName
		// Mobile
		// ModeofPayment
		// Amount
		// CardNumber
		// BankName
		// Name
		// voucher_type
		// Details
		// Date
		// AnyDues
		// createdby
		// createddatetime
		// modifiedby
		// modifieddatetime
		// PatID
		// VisiteType
		// VisitDate
		// Status
		// AdvanceValidityDate
		// TotalRemainingAdvance
		// Remarks
		// SeectPaymentMode
		// PaidAmount
		// Currency
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
			$this->freezed->ViewValue = $this->freezed->CurrentValue;
			$this->freezed->ViewCustomAttributes = "";

			// AdvanceNo
			$this->AdvanceNo->ViewValue = $this->AdvanceNo->CurrentValue;
			$this->AdvanceNo->ViewCustomAttributes = "";

			// PatientID
			$this->PatientID->ViewValue = $this->PatientID->CurrentValue;
			$this->PatientID->ViewCustomAttributes = "";

			// PatientName
			$this->PatientName->ViewValue = $this->PatientName->CurrentValue;
			$this->PatientName->ViewCustomAttributes = "";

			// Mobile
			$this->Mobile->ViewValue = $this->Mobile->CurrentValue;
			$this->Mobile->ViewCustomAttributes = "";

			// ModeofPayment
			$curVal = strval($this->ModeofPayment->CurrentValue);
			if ($curVal <> "") {
				$this->ModeofPayment->ViewValue = $this->ModeofPayment->lookupCacheOption($curVal);
				if ($this->ModeofPayment->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Mode`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->ModeofPayment->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = $rswrk->fields('df');
						$this->ModeofPayment->ViewValue = $this->ModeofPayment->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->ModeofPayment->ViewValue = $this->ModeofPayment->CurrentValue;
					}
				}
			} else {
				$this->ModeofPayment->ViewValue = NULL;
			}
			$this->ModeofPayment->ViewCustomAttributes = "";

			// Amount
			$this->Amount->ViewValue = $this->Amount->CurrentValue;
			$this->Amount->ViewValue = FormatNumber($this->Amount->ViewValue, 2, -2, -2, -2);
			$this->Amount->ViewCustomAttributes = "";

			// CardNumber
			$this->CardNumber->ViewValue = $this->CardNumber->CurrentValue;
			$this->CardNumber->ViewCustomAttributes = "";

			// BankName
			$this->BankName->ViewValue = $this->BankName->CurrentValue;
			$this->BankName->ViewCustomAttributes = "";

			// Name
			$this->Name->ViewValue = $this->Name->CurrentValue;
			$this->Name->ViewCustomAttributes = "";

			// voucher_type
			$this->voucher_type->ViewValue = $this->voucher_type->CurrentValue;
			$this->voucher_type->ViewCustomAttributes = "";

			// Details
			$this->Details->ViewValue = $this->Details->CurrentValue;
			$this->Details->ViewCustomAttributes = "";

			// Date
			$this->Date->ViewValue = $this->Date->CurrentValue;
			$this->Date->ViewValue = FormatDateTime($this->Date->ViewValue, 7);
			$this->Date->ViewCustomAttributes = "";

			// AnyDues
			$this->AnyDues->ViewValue = $this->AnyDues->CurrentValue;
			$this->AnyDues->ViewCustomAttributes = "";

			// createdby
			$this->createdby->ViewValue = $this->createdby->CurrentValue;
			$this->createdby->ViewCustomAttributes = "";

			// createddatetime
			$this->createddatetime->ViewValue = $this->createddatetime->CurrentValue;
			$this->createddatetime->ViewValue = FormatDateTime($this->createddatetime->ViewValue, 7);
			$this->createddatetime->ViewCustomAttributes = "";

			// modifiedby
			$this->modifiedby->ViewValue = $this->modifiedby->CurrentValue;
			$this->modifiedby->ViewCustomAttributes = "";

			// modifieddatetime
			$this->modifieddatetime->ViewValue = $this->modifieddatetime->CurrentValue;
			$this->modifieddatetime->ViewValue = FormatDateTime($this->modifieddatetime->ViewValue, 0);
			$this->modifieddatetime->ViewCustomAttributes = "";

			// PatID
			$curVal = strval($this->PatID->CurrentValue);
			if ($curVal <> "") {
				$this->PatID->ViewValue = $this->PatID->lookupCacheOption($curVal);
				if ($this->PatID->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
					$sqlWrk = $this->PatID->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = $rswrk->fields('df');
						$arwrk[2] = $rswrk->fields('df2');
						$arwrk[3] = $rswrk->fields('df3');
						$this->PatID->ViewValue = $this->PatID->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->PatID->ViewValue = $this->PatID->CurrentValue;
					}
				}
			} else {
				$this->PatID->ViewValue = NULL;
			}
			$this->PatID->ViewCustomAttributes = "";

			// VisiteType
			$this->VisiteType->ViewValue = $this->VisiteType->CurrentValue;
			$this->VisiteType->ViewCustomAttributes = "";

			// VisitDate
			$this->VisitDate->ViewValue = $this->VisitDate->CurrentValue;
			$this->VisitDate->ViewCustomAttributes = "";

			// Status
			$this->Status->ViewValue = $this->Status->CurrentValue;
			$this->Status->ViewCustomAttributes = "";

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
			if (strval($this->CancelAdvance->CurrentValue) <> "") {
				$this->CancelAdvance->ViewValue = new OptionValues();
				$arwrk = explode(",", strval($this->CancelAdvance->CurrentValue));
				$cnt = count($arwrk);
				for ($ari = 0; $ari < $cnt; $ari++)
					$this->CancelAdvance->ViewValue->add($this->CancelAdvance->optionCaption(trim($arwrk[$ari])));
			} else {
				$this->CancelAdvance->ViewValue = NULL;
			}
			$this->CancelAdvance->ViewCustomAttributes = "";

			// CancelReasan
			$this->CancelReasan->ViewValue = $this->CancelReasan->CurrentValue;
			$this->CancelReasan->ViewCustomAttributes = "";

			// CancelBy
			$this->CancelBy->ViewValue = $this->CancelBy->CurrentValue;
			$this->CancelBy->ViewCustomAttributes = "";

			// CancelDate
			$this->CancelDate->ViewValue = $this->CancelDate->CurrentValue;
			$this->CancelDate->ViewValue = FormatDateTime($this->CancelDate->ViewValue, 7);
			$this->CancelDate->ViewCustomAttributes = "";

			// CancelDateTime
			$this->CancelDateTime->ViewValue = $this->CancelDateTime->CurrentValue;
			$this->CancelDateTime->ViewValue = FormatDateTime($this->CancelDateTime->ViewValue, 0);
			$this->CancelDateTime->ViewCustomAttributes = "";

			// CanceledBy
			$this->CanceledBy->ViewValue = $this->CanceledBy->CurrentValue;
			$this->CanceledBy->ViewCustomAttributes = "";

			// CancelStatus
			if (strval($this->CancelStatus->CurrentValue) <> "") {
				$this->CancelStatus->ViewValue = $this->CancelStatus->optionCaption($this->CancelStatus->CurrentValue);
			} else {
				$this->CancelStatus->ViewValue = NULL;
			}
			$this->CancelStatus->ViewCustomAttributes = "";

			// Cash
			$this->Cash->ViewValue = $this->Cash->CurrentValue;
			$this->Cash->ViewValue = FormatNumber($this->Cash->ViewValue, 2, -2, -2, -2);
			$this->Cash->ViewCustomAttributes = "";

			// Card
			$this->Card->ViewValue = $this->Card->CurrentValue;
			$this->Card->ViewValue = FormatNumber($this->Card->ViewValue, 2, -2, -2, -2);
			$this->Card->ViewCustomAttributes = "";

			// freezed
			$this->freezed->LinkCustomAttributes = "";
			$this->freezed->HrefValue = "";
			$this->freezed->TooltipValue = "";

			// AdvanceNo
			$this->AdvanceNo->LinkCustomAttributes = "";
			$this->AdvanceNo->HrefValue = "";
			$this->AdvanceNo->TooltipValue = "";

			// PatientID
			$this->PatientID->LinkCustomAttributes = "";
			$this->PatientID->HrefValue = "";
			$this->PatientID->TooltipValue = "";

			// PatientName
			$this->PatientName->LinkCustomAttributes = "";
			$this->PatientName->HrefValue = "";
			$this->PatientName->TooltipValue = "";

			// Mobile
			$this->Mobile->LinkCustomAttributes = "";
			$this->Mobile->HrefValue = "";
			$this->Mobile->TooltipValue = "";

			// ModeofPayment
			$this->ModeofPayment->LinkCustomAttributes = "";
			$this->ModeofPayment->HrefValue = "";
			$this->ModeofPayment->TooltipValue = "";

			// Amount
			$this->Amount->LinkCustomAttributes = "";
			$this->Amount->HrefValue = "";
			$this->Amount->TooltipValue = "";

			// CardNumber
			$this->CardNumber->LinkCustomAttributes = "";
			$this->CardNumber->HrefValue = "";
			$this->CardNumber->TooltipValue = "";

			// BankName
			$this->BankName->LinkCustomAttributes = "";
			$this->BankName->HrefValue = "";
			$this->BankName->TooltipValue = "";

			// Name
			$this->Name->LinkCustomAttributes = "";
			$this->Name->HrefValue = "";
			$this->Name->TooltipValue = "";

			// voucher_type
			$this->voucher_type->LinkCustomAttributes = "";
			$this->voucher_type->HrefValue = "";
			$this->voucher_type->TooltipValue = "";

			// Details
			$this->Details->LinkCustomAttributes = "";
			$this->Details->HrefValue = "";
			$this->Details->TooltipValue = "";

			// Date
			$this->Date->LinkCustomAttributes = "";
			$this->Date->HrefValue = "";
			$this->Date->TooltipValue = "";

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

			// Status
			$this->Status->LinkCustomAttributes = "";
			$this->Status->HrefValue = "";
			$this->Status->TooltipValue = "";

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
		} elseif ($this->RowType == ROWTYPE_ADD) { // Add row

			// freezed
			$this->freezed->EditAttrs["class"] = "form-control";
			$this->freezed->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->freezed->CurrentValue = HtmlDecode($this->freezed->CurrentValue);
			$this->freezed->EditValue = HtmlEncode($this->freezed->CurrentValue);
			$this->freezed->PlaceHolder = RemoveHtml($this->freezed->caption());

			// AdvanceNo
			$this->AdvanceNo->EditAttrs["class"] = "form-control";
			$this->AdvanceNo->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->AdvanceNo->CurrentValue = HtmlDecode($this->AdvanceNo->CurrentValue);
			$this->AdvanceNo->EditValue = HtmlEncode($this->AdvanceNo->CurrentValue);
			$this->AdvanceNo->PlaceHolder = RemoveHtml($this->AdvanceNo->caption());

			// PatientID
			$this->PatientID->EditAttrs["class"] = "form-control";
			$this->PatientID->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->PatientID->CurrentValue = HtmlDecode($this->PatientID->CurrentValue);
			$this->PatientID->EditValue = HtmlEncode($this->PatientID->CurrentValue);
			$this->PatientID->PlaceHolder = RemoveHtml($this->PatientID->caption());

			// PatientName
			$this->PatientName->EditAttrs["class"] = "form-control";
			$this->PatientName->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->PatientName->CurrentValue = HtmlDecode($this->PatientName->CurrentValue);
			$this->PatientName->EditValue = HtmlEncode($this->PatientName->CurrentValue);
			$this->PatientName->PlaceHolder = RemoveHtml($this->PatientName->caption());

			// Mobile
			$this->Mobile->EditAttrs["class"] = "form-control";
			$this->Mobile->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Mobile->CurrentValue = HtmlDecode($this->Mobile->CurrentValue);
			$this->Mobile->EditValue = HtmlEncode($this->Mobile->CurrentValue);
			$this->Mobile->PlaceHolder = RemoveHtml($this->Mobile->caption());

			// ModeofPayment
			$this->ModeofPayment->EditAttrs["class"] = "form-control";
			$this->ModeofPayment->EditCustomAttributes = "";
			$curVal = trim(strval($this->ModeofPayment->CurrentValue));
			if ($curVal <> "")
				$this->ModeofPayment->ViewValue = $this->ModeofPayment->lookupCacheOption($curVal);
			else
				$this->ModeofPayment->ViewValue = $this->ModeofPayment->Lookup !== NULL && is_array($this->ModeofPayment->Lookup->Options) ? $curVal : NULL;
			if ($this->ModeofPayment->ViewValue !== NULL) { // Load from cache
				$this->ModeofPayment->EditValue = array_values($this->ModeofPayment->Lookup->Options);
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`Mode`" . SearchString("=", $this->ModeofPayment->CurrentValue, DATATYPE_STRING, "");
				}
				$sqlWrk = $this->ModeofPayment->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
				if ($rswrk) $rswrk->Close();
				$this->ModeofPayment->EditValue = $arwrk;
			}

			// Amount
			$this->Amount->EditAttrs["class"] = "form-control";
			$this->Amount->EditCustomAttributes = "";
			$this->Amount->EditValue = HtmlEncode($this->Amount->CurrentValue);
			$this->Amount->PlaceHolder = RemoveHtml($this->Amount->caption());
			if (strval($this->Amount->EditValue) <> "" && is_numeric($this->Amount->EditValue))
				$this->Amount->EditValue = FormatNumber($this->Amount->EditValue, -2, -2, -2, -2);

			// CardNumber
			$this->CardNumber->EditAttrs["class"] = "form-control";
			$this->CardNumber->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->CardNumber->CurrentValue = HtmlDecode($this->CardNumber->CurrentValue);
			$this->CardNumber->EditValue = HtmlEncode($this->CardNumber->CurrentValue);
			$this->CardNumber->PlaceHolder = RemoveHtml($this->CardNumber->caption());

			// BankName
			$this->BankName->EditAttrs["class"] = "form-control";
			$this->BankName->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->BankName->CurrentValue = HtmlDecode($this->BankName->CurrentValue);
			$this->BankName->EditValue = HtmlEncode($this->BankName->CurrentValue);
			$this->BankName->PlaceHolder = RemoveHtml($this->BankName->caption());

			// Name
			$this->Name->EditAttrs["class"] = "form-control";
			$this->Name->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Name->CurrentValue = HtmlDecode($this->Name->CurrentValue);
			$this->Name->EditValue = HtmlEncode($this->Name->CurrentValue);
			$this->Name->PlaceHolder = RemoveHtml($this->Name->caption());

			// voucher_type
			$this->voucher_type->EditAttrs["class"] = "form-control";
			$this->voucher_type->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->voucher_type->CurrentValue = HtmlDecode($this->voucher_type->CurrentValue);
			$this->voucher_type->EditValue = HtmlEncode($this->voucher_type->CurrentValue);
			$this->voucher_type->PlaceHolder = RemoveHtml($this->voucher_type->caption());

			// Details
			$this->Details->EditAttrs["class"] = "form-control";
			$this->Details->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Details->CurrentValue = HtmlDecode($this->Details->CurrentValue);
			$this->Details->EditValue = HtmlEncode($this->Details->CurrentValue);
			$this->Details->PlaceHolder = RemoveHtml($this->Details->caption());

			// Date
			$this->Date->EditAttrs["class"] = "form-control";
			$this->Date->EditCustomAttributes = "";
			$this->Date->EditValue = HtmlEncode(FormatDateTime($this->Date->CurrentValue, 7));
			$this->Date->PlaceHolder = RemoveHtml($this->Date->caption());

			// AnyDues
			$this->AnyDues->EditAttrs["class"] = "form-control";
			$this->AnyDues->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->AnyDues->CurrentValue = HtmlDecode($this->AnyDues->CurrentValue);
			$this->AnyDues->EditValue = HtmlEncode($this->AnyDues->CurrentValue);
			$this->AnyDues->PlaceHolder = RemoveHtml($this->AnyDues->caption());

			// createdby
			// createddatetime
			// PatID

			$this->PatID->EditCustomAttributes = "";
			$curVal = trim(strval($this->PatID->CurrentValue));
			if ($curVal <> "")
				$this->PatID->ViewValue = $this->PatID->lookupCacheOption($curVal);
			else
				$this->PatID->ViewValue = $this->PatID->Lookup !== NULL && is_array($this->PatID->Lookup->Options) ? $curVal : NULL;
			if ($this->PatID->ViewValue !== NULL) { // Load from cache
				$this->PatID->EditValue = array_values($this->PatID->Lookup->Options);
				if ($this->PatID->ViewValue == "")
					$this->PatID->ViewValue = $Language->phrase("PleaseSelect");
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`id`" . SearchString("=", $this->PatID->CurrentValue, DATATYPE_NUMBER, "");
				}
				$sqlWrk = $this->PatID->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = array();
					$arwrk[1] = HtmlEncode($rswrk->fields('df'));
					$arwrk[2] = HtmlEncode($rswrk->fields('df2'));
					$arwrk[3] = HtmlEncode($rswrk->fields('df3'));
					$this->PatID->ViewValue = $this->PatID->displayValue($arwrk);
				} else {
					$this->PatID->ViewValue = $Language->phrase("PleaseSelect");
				}
				$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
				if ($rswrk) $rswrk->Close();
				$this->PatID->EditValue = $arwrk;
			}

			// VisiteType
			$this->VisiteType->EditAttrs["class"] = "form-control";
			$this->VisiteType->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->VisiteType->CurrentValue = HtmlDecode($this->VisiteType->CurrentValue);
			$this->VisiteType->EditValue = HtmlEncode($this->VisiteType->CurrentValue);
			$this->VisiteType->PlaceHolder = RemoveHtml($this->VisiteType->caption());

			// VisitDate
			$this->VisitDate->EditAttrs["class"] = "form-control";
			$this->VisitDate->EditCustomAttributes = "";
			$this->VisitDate->EditValue = HtmlEncode($this->VisitDate->CurrentValue);
			$this->VisitDate->PlaceHolder = RemoveHtml($this->VisitDate->caption());

			// Status
			$this->Status->EditAttrs["class"] = "form-control";
			$this->Status->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Status->CurrentValue = HtmlDecode($this->Status->CurrentValue);
			$this->Status->EditValue = HtmlEncode($this->Status->CurrentValue);
			$this->Status->PlaceHolder = RemoveHtml($this->Status->caption());

			// AdvanceValidityDate
			$this->AdvanceValidityDate->EditAttrs["class"] = "form-control";
			$this->AdvanceValidityDate->EditCustomAttributes = "";
			$this->AdvanceValidityDate->EditValue = HtmlEncode(FormatDateTime($this->AdvanceValidityDate->CurrentValue, 8));
			$this->AdvanceValidityDate->PlaceHolder = RemoveHtml($this->AdvanceValidityDate->caption());

			// TotalRemainingAdvance
			$this->TotalRemainingAdvance->EditAttrs["class"] = "form-control";
			$this->TotalRemainingAdvance->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->TotalRemainingAdvance->CurrentValue = HtmlDecode($this->TotalRemainingAdvance->CurrentValue);
			$this->TotalRemainingAdvance->EditValue = HtmlEncode($this->TotalRemainingAdvance->CurrentValue);
			$this->TotalRemainingAdvance->PlaceHolder = RemoveHtml($this->TotalRemainingAdvance->caption());

			// Remarks
			$this->Remarks->EditAttrs["class"] = "form-control";
			$this->Remarks->EditCustomAttributes = "";
			$this->Remarks->EditValue = HtmlEncode($this->Remarks->CurrentValue);
			$this->Remarks->PlaceHolder = RemoveHtml($this->Remarks->caption());

			// SeectPaymentMode
			$this->SeectPaymentMode->EditAttrs["class"] = "form-control";
			$this->SeectPaymentMode->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->SeectPaymentMode->CurrentValue = HtmlDecode($this->SeectPaymentMode->CurrentValue);
			$this->SeectPaymentMode->EditValue = HtmlEncode($this->SeectPaymentMode->CurrentValue);
			$this->SeectPaymentMode->PlaceHolder = RemoveHtml($this->SeectPaymentMode->caption());

			// PaidAmount
			$this->PaidAmount->EditAttrs["class"] = "form-control";
			$this->PaidAmount->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->PaidAmount->CurrentValue = HtmlDecode($this->PaidAmount->CurrentValue);
			$this->PaidAmount->EditValue = HtmlEncode($this->PaidAmount->CurrentValue);
			$this->PaidAmount->PlaceHolder = RemoveHtml($this->PaidAmount->caption());

			// Currency
			$this->Currency->EditAttrs["class"] = "form-control";
			$this->Currency->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Currency->CurrentValue = HtmlDecode($this->Currency->CurrentValue);
			$this->Currency->EditValue = HtmlEncode($this->Currency->CurrentValue);
			$this->Currency->PlaceHolder = RemoveHtml($this->Currency->caption());

			// HospID
			// Reception

			$this->Reception->EditAttrs["class"] = "form-control";
			$this->Reception->EditCustomAttributes = "";
			$this->Reception->EditValue = HtmlEncode($this->Reception->CurrentValue);
			$this->Reception->PlaceHolder = RemoveHtml($this->Reception->caption());

			// mrnno
			$this->mrnno->EditAttrs["class"] = "form-control";
			$this->mrnno->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->mrnno->CurrentValue = HtmlDecode($this->mrnno->CurrentValue);
			$this->mrnno->EditValue = HtmlEncode($this->mrnno->CurrentValue);
			$this->mrnno->PlaceHolder = RemoveHtml($this->mrnno->caption());

			// GetUserName
			// AdjustmentwithAdvance

			$this->AdjustmentwithAdvance->EditAttrs["class"] = "form-control";
			$this->AdjustmentwithAdvance->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->AdjustmentwithAdvance->CurrentValue = HtmlDecode($this->AdjustmentwithAdvance->CurrentValue);
			$this->AdjustmentwithAdvance->EditValue = HtmlEncode($this->AdjustmentwithAdvance->CurrentValue);
			$this->AdjustmentwithAdvance->PlaceHolder = RemoveHtml($this->AdjustmentwithAdvance->caption());

			// AdjustmentBillNumber
			$this->AdjustmentBillNumber->EditAttrs["class"] = "form-control";
			$this->AdjustmentBillNumber->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->AdjustmentBillNumber->CurrentValue = HtmlDecode($this->AdjustmentBillNumber->CurrentValue);
			$this->AdjustmentBillNumber->EditValue = HtmlEncode($this->AdjustmentBillNumber->CurrentValue);
			$this->AdjustmentBillNumber->PlaceHolder = RemoveHtml($this->AdjustmentBillNumber->caption());

			// CancelAdvance
			$this->CancelAdvance->EditCustomAttributes = "";
			$this->CancelAdvance->EditValue = $this->CancelAdvance->options(FALSE);

			// CancelReasan
			$this->CancelReasan->EditAttrs["class"] = "form-control";
			$this->CancelReasan->EditCustomAttributes = "";
			$this->CancelReasan->EditValue = HtmlEncode($this->CancelReasan->CurrentValue);
			$this->CancelReasan->PlaceHolder = RemoveHtml($this->CancelReasan->caption());

			// CancelBy
			$this->CancelBy->EditAttrs["class"] = "form-control";
			$this->CancelBy->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->CancelBy->CurrentValue = HtmlDecode($this->CancelBy->CurrentValue);
			$this->CancelBy->EditValue = HtmlEncode($this->CancelBy->CurrentValue);
			$this->CancelBy->PlaceHolder = RemoveHtml($this->CancelBy->caption());

			// CancelDate
			$this->CancelDate->EditAttrs["class"] = "form-control";
			$this->CancelDate->EditCustomAttributes = "";
			$this->CancelDate->EditValue = HtmlEncode(FormatDateTime($this->CancelDate->CurrentValue, 7));
			$this->CancelDate->PlaceHolder = RemoveHtml($this->CancelDate->caption());

			// CancelDateTime
			$this->CancelDateTime->EditAttrs["class"] = "form-control";
			$this->CancelDateTime->EditCustomAttributes = "";
			$this->CancelDateTime->EditValue = HtmlEncode(FormatDateTime($this->CancelDateTime->CurrentValue, 8));
			$this->CancelDateTime->PlaceHolder = RemoveHtml($this->CancelDateTime->caption());

			// CanceledBy
			$this->CanceledBy->EditAttrs["class"] = "form-control";
			$this->CanceledBy->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->CanceledBy->CurrentValue = HtmlDecode($this->CanceledBy->CurrentValue);
			$this->CanceledBy->EditValue = HtmlEncode($this->CanceledBy->CurrentValue);
			$this->CanceledBy->PlaceHolder = RemoveHtml($this->CanceledBy->caption());

			// CancelStatus
			$this->CancelStatus->EditAttrs["class"] = "form-control";
			$this->CancelStatus->EditCustomAttributes = "";
			$this->CancelStatus->EditValue = $this->CancelStatus->options(TRUE);

			// Cash
			$this->Cash->EditAttrs["class"] = "form-control";
			$this->Cash->EditCustomAttributes = "";
			$this->Cash->EditValue = HtmlEncode($this->Cash->CurrentValue);
			$this->Cash->PlaceHolder = RemoveHtml($this->Cash->caption());
			if (strval($this->Cash->EditValue) <> "" && is_numeric($this->Cash->EditValue))
				$this->Cash->EditValue = FormatNumber($this->Cash->EditValue, -2, -2, -2, -2);

			// Card
			$this->Card->EditAttrs["class"] = "form-control";
			$this->Card->EditCustomAttributes = "";
			$this->Card->EditValue = HtmlEncode($this->Card->CurrentValue);
			$this->Card->PlaceHolder = RemoveHtml($this->Card->caption());
			if (strval($this->Card->EditValue) <> "" && is_numeric($this->Card->EditValue))
				$this->Card->EditValue = FormatNumber($this->Card->EditValue, -2, -2, -2, -2);

			// Add refer script
			// freezed

			$this->freezed->LinkCustomAttributes = "";
			$this->freezed->HrefValue = "";

			// AdvanceNo
			$this->AdvanceNo->LinkCustomAttributes = "";
			$this->AdvanceNo->HrefValue = "";

			// PatientID
			$this->PatientID->LinkCustomAttributes = "";
			$this->PatientID->HrefValue = "";

			// PatientName
			$this->PatientName->LinkCustomAttributes = "";
			$this->PatientName->HrefValue = "";

			// Mobile
			$this->Mobile->LinkCustomAttributes = "";
			$this->Mobile->HrefValue = "";

			// ModeofPayment
			$this->ModeofPayment->LinkCustomAttributes = "";
			$this->ModeofPayment->HrefValue = "";

			// Amount
			$this->Amount->LinkCustomAttributes = "";
			$this->Amount->HrefValue = "";

			// CardNumber
			$this->CardNumber->LinkCustomAttributes = "";
			$this->CardNumber->HrefValue = "";

			// BankName
			$this->BankName->LinkCustomAttributes = "";
			$this->BankName->HrefValue = "";

			// Name
			$this->Name->LinkCustomAttributes = "";
			$this->Name->HrefValue = "";

			// voucher_type
			$this->voucher_type->LinkCustomAttributes = "";
			$this->voucher_type->HrefValue = "";

			// Details
			$this->Details->LinkCustomAttributes = "";
			$this->Details->HrefValue = "";

			// Date
			$this->Date->LinkCustomAttributes = "";
			$this->Date->HrefValue = "";

			// AnyDues
			$this->AnyDues->LinkCustomAttributes = "";
			$this->AnyDues->HrefValue = "";

			// createdby
			$this->createdby->LinkCustomAttributes = "";
			$this->createdby->HrefValue = "";

			// createddatetime
			$this->createddatetime->LinkCustomAttributes = "";
			$this->createddatetime->HrefValue = "";

			// PatID
			$this->PatID->LinkCustomAttributes = "";
			$this->PatID->HrefValue = "";

			// VisiteType
			$this->VisiteType->LinkCustomAttributes = "";
			$this->VisiteType->HrefValue = "";

			// VisitDate
			$this->VisitDate->LinkCustomAttributes = "";
			$this->VisitDate->HrefValue = "";

			// Status
			$this->Status->LinkCustomAttributes = "";
			$this->Status->HrefValue = "";

			// AdvanceValidityDate
			$this->AdvanceValidityDate->LinkCustomAttributes = "";
			$this->AdvanceValidityDate->HrefValue = "";

			// TotalRemainingAdvance
			$this->TotalRemainingAdvance->LinkCustomAttributes = "";
			$this->TotalRemainingAdvance->HrefValue = "";

			// Remarks
			$this->Remarks->LinkCustomAttributes = "";
			$this->Remarks->HrefValue = "";

			// SeectPaymentMode
			$this->SeectPaymentMode->LinkCustomAttributes = "";
			$this->SeectPaymentMode->HrefValue = "";

			// PaidAmount
			$this->PaidAmount->LinkCustomAttributes = "";
			$this->PaidAmount->HrefValue = "";

			// Currency
			$this->Currency->LinkCustomAttributes = "";
			$this->Currency->HrefValue = "";

			// HospID
			$this->HospID->LinkCustomAttributes = "";
			$this->HospID->HrefValue = "";

			// Reception
			$this->Reception->LinkCustomAttributes = "";
			$this->Reception->HrefValue = "";

			// mrnno
			$this->mrnno->LinkCustomAttributes = "";
			$this->mrnno->HrefValue = "";

			// GetUserName
			$this->GetUserName->LinkCustomAttributes = "";
			$this->GetUserName->HrefValue = "";

			// AdjustmentwithAdvance
			$this->AdjustmentwithAdvance->LinkCustomAttributes = "";
			$this->AdjustmentwithAdvance->HrefValue = "";

			// AdjustmentBillNumber
			$this->AdjustmentBillNumber->LinkCustomAttributes = "";
			$this->AdjustmentBillNumber->HrefValue = "";

			// CancelAdvance
			$this->CancelAdvance->LinkCustomAttributes = "";
			$this->CancelAdvance->HrefValue = "";

			// CancelReasan
			$this->CancelReasan->LinkCustomAttributes = "";
			$this->CancelReasan->HrefValue = "";

			// CancelBy
			$this->CancelBy->LinkCustomAttributes = "";
			$this->CancelBy->HrefValue = "";

			// CancelDate
			$this->CancelDate->LinkCustomAttributes = "";
			$this->CancelDate->HrefValue = "";

			// CancelDateTime
			$this->CancelDateTime->LinkCustomAttributes = "";
			$this->CancelDateTime->HrefValue = "";

			// CanceledBy
			$this->CanceledBy->LinkCustomAttributes = "";
			$this->CanceledBy->HrefValue = "";

			// CancelStatus
			$this->CancelStatus->LinkCustomAttributes = "";
			$this->CancelStatus->HrefValue = "";

			// Cash
			$this->Cash->LinkCustomAttributes = "";
			$this->Cash->HrefValue = "";

			// Card
			$this->Card->LinkCustomAttributes = "";
			$this->Card->HrefValue = "";
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
		if ($this->freezed->Required) {
			if (!$this->freezed->IsDetailKey && $this->freezed->FormValue != NULL && $this->freezed->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->freezed->caption(), $this->freezed->RequiredErrorMessage));
			}
		}
		if ($this->AdvanceNo->Required) {
			if (!$this->AdvanceNo->IsDetailKey && $this->AdvanceNo->FormValue != NULL && $this->AdvanceNo->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->AdvanceNo->caption(), $this->AdvanceNo->RequiredErrorMessage));
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
		if ($this->Mobile->Required) {
			if (!$this->Mobile->IsDetailKey && $this->Mobile->FormValue != NULL && $this->Mobile->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Mobile->caption(), $this->Mobile->RequiredErrorMessage));
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
		if (!CheckNumber($this->Amount->FormValue)) {
			AddMessage($FormError, $this->Amount->errorMessage());
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
		if ($this->Name->Required) {
			if (!$this->Name->IsDetailKey && $this->Name->FormValue != NULL && $this->Name->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Name->caption(), $this->Name->RequiredErrorMessage));
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
		if ($this->Date->Required) {
			if (!$this->Date->IsDetailKey && $this->Date->FormValue != NULL && $this->Date->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Date->caption(), $this->Date->RequiredErrorMessage));
			}
		}
		if (!CheckEuroDate($this->Date->FormValue)) {
			AddMessage($FormError, $this->Date->errorMessage());
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
		if ($this->Status->Required) {
			if (!$this->Status->IsDetailKey && $this->Status->FormValue != NULL && $this->Status->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Status->caption(), $this->Status->RequiredErrorMessage));
			}
		}
		if ($this->AdvanceValidityDate->Required) {
			if (!$this->AdvanceValidityDate->IsDetailKey && $this->AdvanceValidityDate->FormValue != NULL && $this->AdvanceValidityDate->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->AdvanceValidityDate->caption(), $this->AdvanceValidityDate->RequiredErrorMessage));
			}
		}
		if (!CheckDate($this->AdvanceValidityDate->FormValue)) {
			AddMessage($FormError, $this->AdvanceValidityDate->errorMessage());
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
		if (!CheckInteger($this->Reception->FormValue)) {
			AddMessage($FormError, $this->Reception->errorMessage());
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
			if ($this->CancelAdvance->FormValue == "") {
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
		if (!CheckEuroDate($this->CancelDate->FormValue)) {
			AddMessage($FormError, $this->CancelDate->errorMessage());
		}
		if ($this->CancelDateTime->Required) {
			if (!$this->CancelDateTime->IsDetailKey && $this->CancelDateTime->FormValue != NULL && $this->CancelDateTime->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->CancelDateTime->caption(), $this->CancelDateTime->RequiredErrorMessage));
			}
		}
		if (!CheckDate($this->CancelDateTime->FormValue)) {
			AddMessage($FormError, $this->CancelDateTime->errorMessage());
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
		if (!CheckNumber($this->Cash->FormValue)) {
			AddMessage($FormError, $this->Cash->errorMessage());
		}
		if ($this->Card->Required) {
			if (!$this->Card->IsDetailKey && $this->Card->FormValue != NULL && $this->Card->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Card->caption(), $this->Card->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->Card->FormValue)) {
			AddMessage($FormError, $this->Card->errorMessage());
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

		// freezed
		$this->freezed->setDbValueDef($rsnew, $this->freezed->CurrentValue, NULL, FALSE);

		// AdvanceNo
		$this->AdvanceNo->setDbValueDef($rsnew, $this->AdvanceNo->CurrentValue, NULL, FALSE);

		// PatientID
		$this->PatientID->setDbValueDef($rsnew, $this->PatientID->CurrentValue, NULL, FALSE);

		// PatientName
		$this->PatientName->setDbValueDef($rsnew, $this->PatientName->CurrentValue, NULL, FALSE);

		// Mobile
		$this->Mobile->setDbValueDef($rsnew, $this->Mobile->CurrentValue, NULL, FALSE);

		// ModeofPayment
		$this->ModeofPayment->setDbValueDef($rsnew, $this->ModeofPayment->CurrentValue, NULL, FALSE);

		// Amount
		$this->Amount->setDbValueDef($rsnew, $this->Amount->CurrentValue, NULL, FALSE);

		// CardNumber
		$this->CardNumber->setDbValueDef($rsnew, $this->CardNumber->CurrentValue, NULL, FALSE);

		// BankName
		$this->BankName->setDbValueDef($rsnew, $this->BankName->CurrentValue, NULL, FALSE);

		// Name
		$this->Name->setDbValueDef($rsnew, $this->Name->CurrentValue, NULL, FALSE);

		// voucher_type
		$this->voucher_type->setDbValueDef($rsnew, $this->voucher_type->CurrentValue, NULL, FALSE);

		// Details
		$this->Details->setDbValueDef($rsnew, $this->Details->CurrentValue, NULL, FALSE);

		// Date
		$this->Date->setDbValueDef($rsnew, UnFormatDateTime($this->Date->CurrentValue, 7), NULL, FALSE);

		// AnyDues
		$this->AnyDues->setDbValueDef($rsnew, $this->AnyDues->CurrentValue, NULL, FALSE);

		// createdby
		$this->createdby->setDbValueDef($rsnew, CurrentUserName(), NULL);
		$rsnew['createdby'] = &$this->createdby->DbValue;

		// createddatetime
		$this->createddatetime->setDbValueDef($rsnew, CurrentDateTime(), NULL);
		$rsnew['createddatetime'] = &$this->createddatetime->DbValue;

		// PatID
		$this->PatID->setDbValueDef($rsnew, $this->PatID->CurrentValue, NULL, FALSE);

		// VisiteType
		$this->VisiteType->setDbValueDef($rsnew, $this->VisiteType->CurrentValue, NULL, FALSE);

		// VisitDate
		$this->VisitDate->setDbValueDef($rsnew, $this->VisitDate->CurrentValue, NULL, FALSE);

		// Status
		$this->Status->setDbValueDef($rsnew, $this->Status->CurrentValue, NULL, FALSE);

		// AdvanceValidityDate
		$this->AdvanceValidityDate->setDbValueDef($rsnew, UnFormatDateTime($this->AdvanceValidityDate->CurrentValue, 0), NULL, FALSE);

		// TotalRemainingAdvance
		$this->TotalRemainingAdvance->setDbValueDef($rsnew, $this->TotalRemainingAdvance->CurrentValue, NULL, FALSE);

		// Remarks
		$this->Remarks->setDbValueDef($rsnew, $this->Remarks->CurrentValue, NULL, FALSE);

		// SeectPaymentMode
		$this->SeectPaymentMode->setDbValueDef($rsnew, $this->SeectPaymentMode->CurrentValue, NULL, FALSE);

		// PaidAmount
		$this->PaidAmount->setDbValueDef($rsnew, $this->PaidAmount->CurrentValue, NULL, FALSE);

		// Currency
		$this->Currency->setDbValueDef($rsnew, $this->Currency->CurrentValue, NULL, FALSE);

		// HospID
		$this->HospID->setDbValueDef($rsnew, HospitalID(), NULL);
		$rsnew['HospID'] = &$this->HospID->DbValue;

		// Reception
		$this->Reception->setDbValueDef($rsnew, $this->Reception->CurrentValue, NULL, FALSE);

		// mrnno
		$this->mrnno->setDbValueDef($rsnew, $this->mrnno->CurrentValue, NULL, FALSE);

		// GetUserName
		$this->GetUserName->setDbValueDef($rsnew, GetUserName(), NULL);
		$rsnew['GetUserName'] = &$this->GetUserName->DbValue;

		// AdjustmentwithAdvance
		$this->AdjustmentwithAdvance->setDbValueDef($rsnew, $this->AdjustmentwithAdvance->CurrentValue, NULL, FALSE);

		// AdjustmentBillNumber
		$this->AdjustmentBillNumber->setDbValueDef($rsnew, $this->AdjustmentBillNumber->CurrentValue, NULL, FALSE);

		// CancelAdvance
		$this->CancelAdvance->setDbValueDef($rsnew, $this->CancelAdvance->CurrentValue, NULL, FALSE);

		// CancelReasan
		$this->CancelReasan->setDbValueDef($rsnew, $this->CancelReasan->CurrentValue, NULL, FALSE);

		// CancelBy
		$this->CancelBy->setDbValueDef($rsnew, $this->CancelBy->CurrentValue, NULL, FALSE);

		// CancelDate
		$this->CancelDate->setDbValueDef($rsnew, UnFormatDateTime($this->CancelDate->CurrentValue, 7), NULL, FALSE);

		// CancelDateTime
		$this->CancelDateTime->setDbValueDef($rsnew, UnFormatDateTime($this->CancelDateTime->CurrentValue, 0), NULL, FALSE);

		// CanceledBy
		$this->CanceledBy->setDbValueDef($rsnew, $this->CanceledBy->CurrentValue, NULL, FALSE);

		// CancelStatus
		$this->CancelStatus->setDbValueDef($rsnew, $this->CancelStatus->CurrentValue, NULL, FALSE);

		// Cash
		$this->Cash->setDbValueDef($rsnew, $this->Cash->CurrentValue, NULL, FALSE);

		// Card
		$this->Card->setDbValueDef($rsnew, $this->Card->CurrentValue, NULL, FALSE);

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
		$Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("billing_other_voucherlist.php"), "", $this->TableVar, TRUE);
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
						case "x_ModeofPayment":
							break;
						case "x_PatID":
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
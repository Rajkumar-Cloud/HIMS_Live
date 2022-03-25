<?php
namespace PHPMaker2019\HIMS;

/**
 * Page class
 */
class billing_voucher_add extends billing_voucher
{

	// Page ID
	public $PageID = "add";

	// Project ID
	public $ProjectID = "{EA4F6D13-AF8F-428D-9EA7-BA88D1107EC3}";

	// Table name
	public $TableName = 'billing_voucher';

	// Page object name
	public $PageObjName = "billing_voucher_add";

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

		// Table object (billing_voucher)
		if (!isset($GLOBALS["billing_voucher"]) || get_class($GLOBALS["billing_voucher"]) == PROJECT_NAMESPACE . "billing_voucher") {
			$GLOBALS["billing_voucher"] = &$this;
			$GLOBALS["Table"] = &$GLOBALS["billing_voucher"];
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
			define(PROJECT_NAMESPACE . "TABLE_NAME", 'billing_voucher');

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
		global $EXPORT, $billing_voucher;
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
				$doc = new $class($billing_voucher);
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
					if ($pageName == "billing_voucherview.php")
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
					$this->terminate(GetUrl("billing_voucherlist.php"));
				else
					$this->terminate(GetUrl("login.php"));
				return;
			}
		}

		// Create form object
		$CurrentForm = new HttpForm();
		$this->CurrentAction = Param("action"); // Set up current action
		$this->id->Visible = FALSE;
		$this->PatId->setVisibility();
		$this->Reception->setVisibility();
		$this->BillNumber->setVisibility();
		$this->PatientId->setVisibility();
		$this->mrnno->setVisibility();
		$this->PatientName->setVisibility();
		$this->Age->setVisibility();
		$this->Gender->setVisibility();
		$this->profilePic->setVisibility();
		$this->Mobile->setVisibility();
		$this->IP_OP->setVisibility();
		$this->Doctor->setVisibility();
		$this->voucher_type->setVisibility();
		$this->Details->setVisibility();
		$this->ModeofPayment->setVisibility();
		$this->Amount->setVisibility();
		$this->AnyDues->setVisibility();
		$this->createdby->setVisibility();
		$this->createddatetime->setVisibility();
		$this->modifiedby->Visible = FALSE;
		$this->modifieddatetime->Visible = FALSE;
		$this->RealizationAmount->setVisibility();
		$this->RealizationStatus->setVisibility();
		$this->RealizationRemarks->setVisibility();
		$this->RealizationBatchNo->setVisibility();
		$this->RealizationDate->setVisibility();
		$this->HospID->setVisibility();
		$this->RIDNO->setVisibility();
		$this->TidNo->setVisibility();
		$this->CId->setVisibility();
		$this->PartnerName->setVisibility();
		$this->PayerType->setVisibility();
		$this->Dob->setVisibility();
		$this->Currency->setVisibility();
		$this->DiscountRemarks->setVisibility();
		$this->Remarks->setVisibility();
		$this->DrDepartment->setVisibility();
		$this->RefferedBy->setVisibility();
		$this->CardNumber->setVisibility();
		$this->BankName->setVisibility();
		$this->DrID->setVisibility();
		$this->BillStatus->setVisibility();
		$this->ReportHeader->setVisibility();
		$this->UserName->setVisibility();
		$this->AdjustmentAdvance->setVisibility();
		$this->billing_vouchercol->setVisibility();
		$this->BillType->setVisibility();
		$this->ProcedureName->setVisibility();
		$this->ProcedureAmount->setVisibility();
		$this->IncludePackage->setVisibility();
		$this->CancelBill->setVisibility();
		$this->CancelReason->setVisibility();
		$this->CancelModeOfPayment->setVisibility();
		$this->CancelAmount->setVisibility();
		$this->CancelBankName->setVisibility();
		$this->CancelTransactionNumber->setVisibility();
		$this->LabTest->setVisibility();
		$this->sid->setVisibility();
		$this->SidNo->setVisibility();
		$this->createdDatettime->setVisibility();
		$this->LabTestReleased->setVisibility();
		$this->GoogleReviewID->setVisibility();
		$this->CardType->setVisibility();
		$this->PharmacyBill->setVisibility();
		$this->DiscountAmount->setVisibility();
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
		$this->setupLookupOptions($this->Reception);
		$this->setupLookupOptions($this->Doctor);
		$this->setupLookupOptions($this->voucher_type);
		$this->setupLookupOptions($this->ModeofPayment);

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
					$this->terminate("billing_voucherlist.php"); // No matching record, return to list
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
					if (GetPageName($returnUrl) == "billing_voucherlist.php")
						$returnUrl = $this->addMasterUrl($returnUrl); // List page, return to List page with correct master key if necessary
					elseif (GetPageName($returnUrl) == "billing_voucherview.php")
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
		$this->PatId->CurrentValue = NULL;
		$this->PatId->OldValue = $this->PatId->CurrentValue;
		$this->Reception->CurrentValue = NULL;
		$this->Reception->OldValue = $this->Reception->CurrentValue;
		$this->BillNumber->CurrentValue = NULL;
		$this->BillNumber->OldValue = $this->BillNumber->CurrentValue;
		$this->PatientId->CurrentValue = NULL;
		$this->PatientId->OldValue = $this->PatientId->CurrentValue;
		$this->mrnno->CurrentValue = NULL;
		$this->mrnno->OldValue = $this->mrnno->CurrentValue;
		$this->PatientName->CurrentValue = NULL;
		$this->PatientName->OldValue = $this->PatientName->CurrentValue;
		$this->Age->CurrentValue = NULL;
		$this->Age->OldValue = $this->Age->CurrentValue;
		$this->Gender->CurrentValue = NULL;
		$this->Gender->OldValue = $this->Gender->CurrentValue;
		$this->profilePic->CurrentValue = NULL;
		$this->profilePic->OldValue = $this->profilePic->CurrentValue;
		$this->Mobile->CurrentValue = NULL;
		$this->Mobile->OldValue = $this->Mobile->CurrentValue;
		$this->IP_OP->CurrentValue = NULL;
		$this->IP_OP->OldValue = $this->IP_OP->CurrentValue;
		$this->Doctor->CurrentValue = NULL;
		$this->Doctor->OldValue = $this->Doctor->CurrentValue;
		$this->voucher_type->CurrentValue = NULL;
		$this->voucher_type->OldValue = $this->voucher_type->CurrentValue;
		$this->Details->CurrentValue = NULL;
		$this->Details->OldValue = $this->Details->CurrentValue;
		$this->ModeofPayment->CurrentValue = NULL;
		$this->ModeofPayment->OldValue = $this->ModeofPayment->CurrentValue;
		$this->Amount->CurrentValue = NULL;
		$this->Amount->OldValue = $this->Amount->CurrentValue;
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
		$this->RealizationAmount->CurrentValue = NULL;
		$this->RealizationAmount->OldValue = $this->RealizationAmount->CurrentValue;
		$this->RealizationStatus->CurrentValue = NULL;
		$this->RealizationStatus->OldValue = $this->RealizationStatus->CurrentValue;
		$this->RealizationRemarks->CurrentValue = NULL;
		$this->RealizationRemarks->OldValue = $this->RealizationRemarks->CurrentValue;
		$this->RealizationBatchNo->CurrentValue = NULL;
		$this->RealizationBatchNo->OldValue = $this->RealizationBatchNo->CurrentValue;
		$this->RealizationDate->CurrentValue = NULL;
		$this->RealizationDate->OldValue = $this->RealizationDate->CurrentValue;
		$this->HospID->CurrentValue = NULL;
		$this->HospID->OldValue = $this->HospID->CurrentValue;
		$this->RIDNO->CurrentValue = NULL;
		$this->RIDNO->OldValue = $this->RIDNO->CurrentValue;
		$this->TidNo->CurrentValue = NULL;
		$this->TidNo->OldValue = $this->TidNo->CurrentValue;
		$this->CId->CurrentValue = NULL;
		$this->CId->OldValue = $this->CId->CurrentValue;
		$this->PartnerName->CurrentValue = NULL;
		$this->PartnerName->OldValue = $this->PartnerName->CurrentValue;
		$this->PayerType->CurrentValue = NULL;
		$this->PayerType->OldValue = $this->PayerType->CurrentValue;
		$this->Dob->CurrentValue = NULL;
		$this->Dob->OldValue = $this->Dob->CurrentValue;
		$this->Currency->CurrentValue = NULL;
		$this->Currency->OldValue = $this->Currency->CurrentValue;
		$this->DiscountRemarks->CurrentValue = NULL;
		$this->DiscountRemarks->OldValue = $this->DiscountRemarks->CurrentValue;
		$this->Remarks->CurrentValue = NULL;
		$this->Remarks->OldValue = $this->Remarks->CurrentValue;
		$this->DrDepartment->CurrentValue = NULL;
		$this->DrDepartment->OldValue = $this->DrDepartment->CurrentValue;
		$this->RefferedBy->CurrentValue = NULL;
		$this->RefferedBy->OldValue = $this->RefferedBy->CurrentValue;
		$this->CardNumber->CurrentValue = NULL;
		$this->CardNumber->OldValue = $this->CardNumber->CurrentValue;
		$this->BankName->CurrentValue = NULL;
		$this->BankName->OldValue = $this->BankName->CurrentValue;
		$this->DrID->CurrentValue = NULL;
		$this->DrID->OldValue = $this->DrID->CurrentValue;
		$this->BillStatus->CurrentValue = 0;
		$this->ReportHeader->CurrentValue = NULL;
		$this->ReportHeader->OldValue = $this->ReportHeader->CurrentValue;
		$this->UserName->CurrentValue = NULL;
		$this->UserName->OldValue = $this->UserName->CurrentValue;
		$this->AdjustmentAdvance->CurrentValue = NULL;
		$this->AdjustmentAdvance->OldValue = $this->AdjustmentAdvance->CurrentValue;
		$this->billing_vouchercol->CurrentValue = NULL;
		$this->billing_vouchercol->OldValue = $this->billing_vouchercol->CurrentValue;
		$this->BillType->CurrentValue = NULL;
		$this->BillType->OldValue = $this->BillType->CurrentValue;
		$this->ProcedureName->CurrentValue = NULL;
		$this->ProcedureName->OldValue = $this->ProcedureName->CurrentValue;
		$this->ProcedureAmount->CurrentValue = NULL;
		$this->ProcedureAmount->OldValue = $this->ProcedureAmount->CurrentValue;
		$this->IncludePackage->CurrentValue = NULL;
		$this->IncludePackage->OldValue = $this->IncludePackage->CurrentValue;
		$this->CancelBill->CurrentValue = NULL;
		$this->CancelBill->OldValue = $this->CancelBill->CurrentValue;
		$this->CancelReason->CurrentValue = NULL;
		$this->CancelReason->OldValue = $this->CancelReason->CurrentValue;
		$this->CancelModeOfPayment->CurrentValue = NULL;
		$this->CancelModeOfPayment->OldValue = $this->CancelModeOfPayment->CurrentValue;
		$this->CancelAmount->CurrentValue = NULL;
		$this->CancelAmount->OldValue = $this->CancelAmount->CurrentValue;
		$this->CancelBankName->CurrentValue = NULL;
		$this->CancelBankName->OldValue = $this->CancelBankName->CurrentValue;
		$this->CancelTransactionNumber->CurrentValue = NULL;
		$this->CancelTransactionNumber->OldValue = $this->CancelTransactionNumber->CurrentValue;
		$this->LabTest->CurrentValue = NULL;
		$this->LabTest->OldValue = $this->LabTest->CurrentValue;
		$this->sid->CurrentValue = NULL;
		$this->sid->OldValue = $this->sid->CurrentValue;
		$this->SidNo->CurrentValue = NULL;
		$this->SidNo->OldValue = $this->SidNo->CurrentValue;
		$this->createdDatettime->CurrentValue = NULL;
		$this->createdDatettime->OldValue = $this->createdDatettime->CurrentValue;
		$this->LabTestReleased->CurrentValue = NULL;
		$this->LabTestReleased->OldValue = $this->LabTestReleased->CurrentValue;
		$this->GoogleReviewID->CurrentValue = NULL;
		$this->GoogleReviewID->OldValue = $this->GoogleReviewID->CurrentValue;
		$this->CardType->CurrentValue = NULL;
		$this->CardType->OldValue = $this->CardType->CurrentValue;
		$this->PharmacyBill->CurrentValue = NULL;
		$this->PharmacyBill->OldValue = $this->PharmacyBill->CurrentValue;
		$this->DiscountAmount->CurrentValue = NULL;
		$this->DiscountAmount->OldValue = $this->DiscountAmount->CurrentValue;
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

		// Check field name 'PatId' first before field var 'x_PatId'
		$val = $CurrentForm->hasValue("PatId") ? $CurrentForm->getValue("PatId") : $CurrentForm->getValue("x_PatId");
		if (!$this->PatId->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->PatId->Visible = FALSE; // Disable update for API request
			else
				$this->PatId->setFormValue($val);
		}

		// Check field name 'Reception' first before field var 'x_Reception'
		$val = $CurrentForm->hasValue("Reception") ? $CurrentForm->getValue("Reception") : $CurrentForm->getValue("x_Reception");
		if (!$this->Reception->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Reception->Visible = FALSE; // Disable update for API request
			else
				$this->Reception->setFormValue($val);
		}

		// Check field name 'BillNumber' first before field var 'x_BillNumber'
		$val = $CurrentForm->hasValue("BillNumber") ? $CurrentForm->getValue("BillNumber") : $CurrentForm->getValue("x_BillNumber");
		if (!$this->BillNumber->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->BillNumber->Visible = FALSE; // Disable update for API request
			else
				$this->BillNumber->setFormValue($val);
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

		// Check field name 'Mobile' first before field var 'x_Mobile'
		$val = $CurrentForm->hasValue("Mobile") ? $CurrentForm->getValue("Mobile") : $CurrentForm->getValue("x_Mobile");
		if (!$this->Mobile->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Mobile->Visible = FALSE; // Disable update for API request
			else
				$this->Mobile->setFormValue($val);
		}

		// Check field name 'IP_OP' first before field var 'x_IP_OP'
		$val = $CurrentForm->hasValue("IP_OP") ? $CurrentForm->getValue("IP_OP") : $CurrentForm->getValue("x_IP_OP");
		if (!$this->IP_OP->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->IP_OP->Visible = FALSE; // Disable update for API request
			else
				$this->IP_OP->setFormValue($val);
		}

		// Check field name 'Doctor' first before field var 'x_Doctor'
		$val = $CurrentForm->hasValue("Doctor") ? $CurrentForm->getValue("Doctor") : $CurrentForm->getValue("x_Doctor");
		if (!$this->Doctor->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Doctor->Visible = FALSE; // Disable update for API request
			else
				$this->Doctor->setFormValue($val);
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
			$this->createddatetime->CurrentValue = UnFormatDateTime($this->createddatetime->CurrentValue, 11);
		}

		// Check field name 'RealizationAmount' first before field var 'x_RealizationAmount'
		$val = $CurrentForm->hasValue("RealizationAmount") ? $CurrentForm->getValue("RealizationAmount") : $CurrentForm->getValue("x_RealizationAmount");
		if (!$this->RealizationAmount->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->RealizationAmount->Visible = FALSE; // Disable update for API request
			else
				$this->RealizationAmount->setFormValue($val);
		}

		// Check field name 'RealizationStatus' first before field var 'x_RealizationStatus'
		$val = $CurrentForm->hasValue("RealizationStatus") ? $CurrentForm->getValue("RealizationStatus") : $CurrentForm->getValue("x_RealizationStatus");
		if (!$this->RealizationStatus->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->RealizationStatus->Visible = FALSE; // Disable update for API request
			else
				$this->RealizationStatus->setFormValue($val);
		}

		// Check field name 'RealizationRemarks' first before field var 'x_RealizationRemarks'
		$val = $CurrentForm->hasValue("RealizationRemarks") ? $CurrentForm->getValue("RealizationRemarks") : $CurrentForm->getValue("x_RealizationRemarks");
		if (!$this->RealizationRemarks->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->RealizationRemarks->Visible = FALSE; // Disable update for API request
			else
				$this->RealizationRemarks->setFormValue($val);
		}

		// Check field name 'RealizationBatchNo' first before field var 'x_RealizationBatchNo'
		$val = $CurrentForm->hasValue("RealizationBatchNo") ? $CurrentForm->getValue("RealizationBatchNo") : $CurrentForm->getValue("x_RealizationBatchNo");
		if (!$this->RealizationBatchNo->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->RealizationBatchNo->Visible = FALSE; // Disable update for API request
			else
				$this->RealizationBatchNo->setFormValue($val);
		}

		// Check field name 'RealizationDate' first before field var 'x_RealizationDate'
		$val = $CurrentForm->hasValue("RealizationDate") ? $CurrentForm->getValue("RealizationDate") : $CurrentForm->getValue("x_RealizationDate");
		if (!$this->RealizationDate->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->RealizationDate->Visible = FALSE; // Disable update for API request
			else
				$this->RealizationDate->setFormValue($val);
		}

		// Check field name 'HospID' first before field var 'x_HospID'
		$val = $CurrentForm->hasValue("HospID") ? $CurrentForm->getValue("HospID") : $CurrentForm->getValue("x_HospID");
		if (!$this->HospID->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->HospID->Visible = FALSE; // Disable update for API request
			else
				$this->HospID->setFormValue($val);
		}

		// Check field name 'RIDNO' first before field var 'x_RIDNO'
		$val = $CurrentForm->hasValue("RIDNO") ? $CurrentForm->getValue("RIDNO") : $CurrentForm->getValue("x_RIDNO");
		if (!$this->RIDNO->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->RIDNO->Visible = FALSE; // Disable update for API request
			else
				$this->RIDNO->setFormValue($val);
		}

		// Check field name 'TidNo' first before field var 'x_TidNo'
		$val = $CurrentForm->hasValue("TidNo") ? $CurrentForm->getValue("TidNo") : $CurrentForm->getValue("x_TidNo");
		if (!$this->TidNo->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->TidNo->Visible = FALSE; // Disable update for API request
			else
				$this->TidNo->setFormValue($val);
		}

		// Check field name 'CId' first before field var 'x_CId'
		$val = $CurrentForm->hasValue("CId") ? $CurrentForm->getValue("CId") : $CurrentForm->getValue("x_CId");
		if (!$this->CId->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->CId->Visible = FALSE; // Disable update for API request
			else
				$this->CId->setFormValue($val);
		}

		// Check field name 'PartnerName' first before field var 'x_PartnerName'
		$val = $CurrentForm->hasValue("PartnerName") ? $CurrentForm->getValue("PartnerName") : $CurrentForm->getValue("x_PartnerName");
		if (!$this->PartnerName->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->PartnerName->Visible = FALSE; // Disable update for API request
			else
				$this->PartnerName->setFormValue($val);
		}

		// Check field name 'PayerType' first before field var 'x_PayerType'
		$val = $CurrentForm->hasValue("PayerType") ? $CurrentForm->getValue("PayerType") : $CurrentForm->getValue("x_PayerType");
		if (!$this->PayerType->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->PayerType->Visible = FALSE; // Disable update for API request
			else
				$this->PayerType->setFormValue($val);
		}

		// Check field name 'Dob' first before field var 'x_Dob'
		$val = $CurrentForm->hasValue("Dob") ? $CurrentForm->getValue("Dob") : $CurrentForm->getValue("x_Dob");
		if (!$this->Dob->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Dob->Visible = FALSE; // Disable update for API request
			else
				$this->Dob->setFormValue($val);
		}

		// Check field name 'Currency' first before field var 'x_Currency'
		$val = $CurrentForm->hasValue("Currency") ? $CurrentForm->getValue("Currency") : $CurrentForm->getValue("x_Currency");
		if (!$this->Currency->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Currency->Visible = FALSE; // Disable update for API request
			else
				$this->Currency->setFormValue($val);
		}

		// Check field name 'DiscountRemarks' first before field var 'x_DiscountRemarks'
		$val = $CurrentForm->hasValue("DiscountRemarks") ? $CurrentForm->getValue("DiscountRemarks") : $CurrentForm->getValue("x_DiscountRemarks");
		if (!$this->DiscountRemarks->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->DiscountRemarks->Visible = FALSE; // Disable update for API request
			else
				$this->DiscountRemarks->setFormValue($val);
		}

		// Check field name 'Remarks' first before field var 'x_Remarks'
		$val = $CurrentForm->hasValue("Remarks") ? $CurrentForm->getValue("Remarks") : $CurrentForm->getValue("x_Remarks");
		if (!$this->Remarks->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Remarks->Visible = FALSE; // Disable update for API request
			else
				$this->Remarks->setFormValue($val);
		}

		// Check field name 'DrDepartment' first before field var 'x_DrDepartment'
		$val = $CurrentForm->hasValue("DrDepartment") ? $CurrentForm->getValue("DrDepartment") : $CurrentForm->getValue("x_DrDepartment");
		if (!$this->DrDepartment->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->DrDepartment->Visible = FALSE; // Disable update for API request
			else
				$this->DrDepartment->setFormValue($val);
		}

		// Check field name 'RefferedBy' first before field var 'x_RefferedBy'
		$val = $CurrentForm->hasValue("RefferedBy") ? $CurrentForm->getValue("RefferedBy") : $CurrentForm->getValue("x_RefferedBy");
		if (!$this->RefferedBy->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->RefferedBy->Visible = FALSE; // Disable update for API request
			else
				$this->RefferedBy->setFormValue($val);
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

		// Check field name 'DrID' first before field var 'x_DrID'
		$val = $CurrentForm->hasValue("DrID") ? $CurrentForm->getValue("DrID") : $CurrentForm->getValue("x_DrID");
		if (!$this->DrID->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->DrID->Visible = FALSE; // Disable update for API request
			else
				$this->DrID->setFormValue($val);
		}

		// Check field name 'BillStatus' first before field var 'x_BillStatus'
		$val = $CurrentForm->hasValue("BillStatus") ? $CurrentForm->getValue("BillStatus") : $CurrentForm->getValue("x_BillStatus");
		if (!$this->BillStatus->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->BillStatus->Visible = FALSE; // Disable update for API request
			else
				$this->BillStatus->setFormValue($val);
		}

		// Check field name 'ReportHeader' first before field var 'x_ReportHeader'
		$val = $CurrentForm->hasValue("ReportHeader") ? $CurrentForm->getValue("ReportHeader") : $CurrentForm->getValue("x_ReportHeader");
		if (!$this->ReportHeader->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->ReportHeader->Visible = FALSE; // Disable update for API request
			else
				$this->ReportHeader->setFormValue($val);
		}

		// Check field name 'UserName' first before field var 'x_UserName'
		$val = $CurrentForm->hasValue("UserName") ? $CurrentForm->getValue("UserName") : $CurrentForm->getValue("x_UserName");
		if (!$this->UserName->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->UserName->Visible = FALSE; // Disable update for API request
			else
				$this->UserName->setFormValue($val);
		}

		// Check field name 'AdjustmentAdvance' first before field var 'x_AdjustmentAdvance'
		$val = $CurrentForm->hasValue("AdjustmentAdvance") ? $CurrentForm->getValue("AdjustmentAdvance") : $CurrentForm->getValue("x_AdjustmentAdvance");
		if (!$this->AdjustmentAdvance->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->AdjustmentAdvance->Visible = FALSE; // Disable update for API request
			else
				$this->AdjustmentAdvance->setFormValue($val);
		}

		// Check field name 'billing_vouchercol' first before field var 'x_billing_vouchercol'
		$val = $CurrentForm->hasValue("billing_vouchercol") ? $CurrentForm->getValue("billing_vouchercol") : $CurrentForm->getValue("x_billing_vouchercol");
		if (!$this->billing_vouchercol->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->billing_vouchercol->Visible = FALSE; // Disable update for API request
			else
				$this->billing_vouchercol->setFormValue($val);
		}

		// Check field name 'BillType' first before field var 'x_BillType'
		$val = $CurrentForm->hasValue("BillType") ? $CurrentForm->getValue("BillType") : $CurrentForm->getValue("x_BillType");
		if (!$this->BillType->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->BillType->Visible = FALSE; // Disable update for API request
			else
				$this->BillType->setFormValue($val);
		}

		// Check field name 'ProcedureName' first before field var 'x_ProcedureName'
		$val = $CurrentForm->hasValue("ProcedureName") ? $CurrentForm->getValue("ProcedureName") : $CurrentForm->getValue("x_ProcedureName");
		if (!$this->ProcedureName->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->ProcedureName->Visible = FALSE; // Disable update for API request
			else
				$this->ProcedureName->setFormValue($val);
		}

		// Check field name 'ProcedureAmount' first before field var 'x_ProcedureAmount'
		$val = $CurrentForm->hasValue("ProcedureAmount") ? $CurrentForm->getValue("ProcedureAmount") : $CurrentForm->getValue("x_ProcedureAmount");
		if (!$this->ProcedureAmount->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->ProcedureAmount->Visible = FALSE; // Disable update for API request
			else
				$this->ProcedureAmount->setFormValue($val);
		}

		// Check field name 'IncludePackage' first before field var 'x_IncludePackage'
		$val = $CurrentForm->hasValue("IncludePackage") ? $CurrentForm->getValue("IncludePackage") : $CurrentForm->getValue("x_IncludePackage");
		if (!$this->IncludePackage->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->IncludePackage->Visible = FALSE; // Disable update for API request
			else
				$this->IncludePackage->setFormValue($val);
		}

		// Check field name 'CancelBill' first before field var 'x_CancelBill'
		$val = $CurrentForm->hasValue("CancelBill") ? $CurrentForm->getValue("CancelBill") : $CurrentForm->getValue("x_CancelBill");
		if (!$this->CancelBill->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->CancelBill->Visible = FALSE; // Disable update for API request
			else
				$this->CancelBill->setFormValue($val);
		}

		// Check field name 'CancelReason' first before field var 'x_CancelReason'
		$val = $CurrentForm->hasValue("CancelReason") ? $CurrentForm->getValue("CancelReason") : $CurrentForm->getValue("x_CancelReason");
		if (!$this->CancelReason->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->CancelReason->Visible = FALSE; // Disable update for API request
			else
				$this->CancelReason->setFormValue($val);
		}

		// Check field name 'CancelModeOfPayment' first before field var 'x_CancelModeOfPayment'
		$val = $CurrentForm->hasValue("CancelModeOfPayment") ? $CurrentForm->getValue("CancelModeOfPayment") : $CurrentForm->getValue("x_CancelModeOfPayment");
		if (!$this->CancelModeOfPayment->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->CancelModeOfPayment->Visible = FALSE; // Disable update for API request
			else
				$this->CancelModeOfPayment->setFormValue($val);
		}

		// Check field name 'CancelAmount' first before field var 'x_CancelAmount'
		$val = $CurrentForm->hasValue("CancelAmount") ? $CurrentForm->getValue("CancelAmount") : $CurrentForm->getValue("x_CancelAmount");
		if (!$this->CancelAmount->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->CancelAmount->Visible = FALSE; // Disable update for API request
			else
				$this->CancelAmount->setFormValue($val);
		}

		// Check field name 'CancelBankName' first before field var 'x_CancelBankName'
		$val = $CurrentForm->hasValue("CancelBankName") ? $CurrentForm->getValue("CancelBankName") : $CurrentForm->getValue("x_CancelBankName");
		if (!$this->CancelBankName->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->CancelBankName->Visible = FALSE; // Disable update for API request
			else
				$this->CancelBankName->setFormValue($val);
		}

		// Check field name 'CancelTransactionNumber' first before field var 'x_CancelTransactionNumber'
		$val = $CurrentForm->hasValue("CancelTransactionNumber") ? $CurrentForm->getValue("CancelTransactionNumber") : $CurrentForm->getValue("x_CancelTransactionNumber");
		if (!$this->CancelTransactionNumber->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->CancelTransactionNumber->Visible = FALSE; // Disable update for API request
			else
				$this->CancelTransactionNumber->setFormValue($val);
		}

		// Check field name 'LabTest' first before field var 'x_LabTest'
		$val = $CurrentForm->hasValue("LabTest") ? $CurrentForm->getValue("LabTest") : $CurrentForm->getValue("x_LabTest");
		if (!$this->LabTest->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->LabTest->Visible = FALSE; // Disable update for API request
			else
				$this->LabTest->setFormValue($val);
		}

		// Check field name 'sid' first before field var 'x_sid'
		$val = $CurrentForm->hasValue("sid") ? $CurrentForm->getValue("sid") : $CurrentForm->getValue("x_sid");
		if (!$this->sid->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->sid->Visible = FALSE; // Disable update for API request
			else
				$this->sid->setFormValue($val);
		}

		// Check field name 'SidNo' first before field var 'x_SidNo'
		$val = $CurrentForm->hasValue("SidNo") ? $CurrentForm->getValue("SidNo") : $CurrentForm->getValue("x_SidNo");
		if (!$this->SidNo->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->SidNo->Visible = FALSE; // Disable update for API request
			else
				$this->SidNo->setFormValue($val);
		}

		// Check field name 'createdDatettime' first before field var 'x_createdDatettime'
		$val = $CurrentForm->hasValue("createdDatettime") ? $CurrentForm->getValue("createdDatettime") : $CurrentForm->getValue("x_createdDatettime");
		if (!$this->createdDatettime->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->createdDatettime->Visible = FALSE; // Disable update for API request
			else
				$this->createdDatettime->setFormValue($val);
			$this->createdDatettime->CurrentValue = UnFormatDateTime($this->createdDatettime->CurrentValue, 0);
		}

		// Check field name 'LabTestReleased' first before field var 'x_LabTestReleased'
		$val = $CurrentForm->hasValue("LabTestReleased") ? $CurrentForm->getValue("LabTestReleased") : $CurrentForm->getValue("x_LabTestReleased");
		if (!$this->LabTestReleased->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->LabTestReleased->Visible = FALSE; // Disable update for API request
			else
				$this->LabTestReleased->setFormValue($val);
		}

		// Check field name 'GoogleReviewID' first before field var 'x_GoogleReviewID'
		$val = $CurrentForm->hasValue("GoogleReviewID") ? $CurrentForm->getValue("GoogleReviewID") : $CurrentForm->getValue("x_GoogleReviewID");
		if (!$this->GoogleReviewID->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->GoogleReviewID->Visible = FALSE; // Disable update for API request
			else
				$this->GoogleReviewID->setFormValue($val);
		}

		// Check field name 'CardType' first before field var 'x_CardType'
		$val = $CurrentForm->hasValue("CardType") ? $CurrentForm->getValue("CardType") : $CurrentForm->getValue("x_CardType");
		if (!$this->CardType->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->CardType->Visible = FALSE; // Disable update for API request
			else
				$this->CardType->setFormValue($val);
		}

		// Check field name 'PharmacyBill' first before field var 'x_PharmacyBill'
		$val = $CurrentForm->hasValue("PharmacyBill") ? $CurrentForm->getValue("PharmacyBill") : $CurrentForm->getValue("x_PharmacyBill");
		if (!$this->PharmacyBill->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->PharmacyBill->Visible = FALSE; // Disable update for API request
			else
				$this->PharmacyBill->setFormValue($val);
		}

		// Check field name 'DiscountAmount' first before field var 'x_DiscountAmount'
		$val = $CurrentForm->hasValue("DiscountAmount") ? $CurrentForm->getValue("DiscountAmount") : $CurrentForm->getValue("x_DiscountAmount");
		if (!$this->DiscountAmount->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->DiscountAmount->Visible = FALSE; // Disable update for API request
			else
				$this->DiscountAmount->setFormValue($val);
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
		$this->PatId->CurrentValue = $this->PatId->FormValue;
		$this->Reception->CurrentValue = $this->Reception->FormValue;
		$this->BillNumber->CurrentValue = $this->BillNumber->FormValue;
		$this->PatientId->CurrentValue = $this->PatientId->FormValue;
		$this->mrnno->CurrentValue = $this->mrnno->FormValue;
		$this->PatientName->CurrentValue = $this->PatientName->FormValue;
		$this->Age->CurrentValue = $this->Age->FormValue;
		$this->Gender->CurrentValue = $this->Gender->FormValue;
		$this->profilePic->CurrentValue = $this->profilePic->FormValue;
		$this->Mobile->CurrentValue = $this->Mobile->FormValue;
		$this->IP_OP->CurrentValue = $this->IP_OP->FormValue;
		$this->Doctor->CurrentValue = $this->Doctor->FormValue;
		$this->voucher_type->CurrentValue = $this->voucher_type->FormValue;
		$this->Details->CurrentValue = $this->Details->FormValue;
		$this->ModeofPayment->CurrentValue = $this->ModeofPayment->FormValue;
		$this->Amount->CurrentValue = $this->Amount->FormValue;
		$this->AnyDues->CurrentValue = $this->AnyDues->FormValue;
		$this->createdby->CurrentValue = $this->createdby->FormValue;
		$this->createddatetime->CurrentValue = $this->createddatetime->FormValue;
		$this->createddatetime->CurrentValue = UnFormatDateTime($this->createddatetime->CurrentValue, 11);
		$this->RealizationAmount->CurrentValue = $this->RealizationAmount->FormValue;
		$this->RealizationStatus->CurrentValue = $this->RealizationStatus->FormValue;
		$this->RealizationRemarks->CurrentValue = $this->RealizationRemarks->FormValue;
		$this->RealizationBatchNo->CurrentValue = $this->RealizationBatchNo->FormValue;
		$this->RealizationDate->CurrentValue = $this->RealizationDate->FormValue;
		$this->HospID->CurrentValue = $this->HospID->FormValue;
		$this->RIDNO->CurrentValue = $this->RIDNO->FormValue;
		$this->TidNo->CurrentValue = $this->TidNo->FormValue;
		$this->CId->CurrentValue = $this->CId->FormValue;
		$this->PartnerName->CurrentValue = $this->PartnerName->FormValue;
		$this->PayerType->CurrentValue = $this->PayerType->FormValue;
		$this->Dob->CurrentValue = $this->Dob->FormValue;
		$this->Currency->CurrentValue = $this->Currency->FormValue;
		$this->DiscountRemarks->CurrentValue = $this->DiscountRemarks->FormValue;
		$this->Remarks->CurrentValue = $this->Remarks->FormValue;
		$this->DrDepartment->CurrentValue = $this->DrDepartment->FormValue;
		$this->RefferedBy->CurrentValue = $this->RefferedBy->FormValue;
		$this->CardNumber->CurrentValue = $this->CardNumber->FormValue;
		$this->BankName->CurrentValue = $this->BankName->FormValue;
		$this->DrID->CurrentValue = $this->DrID->FormValue;
		$this->BillStatus->CurrentValue = $this->BillStatus->FormValue;
		$this->ReportHeader->CurrentValue = $this->ReportHeader->FormValue;
		$this->UserName->CurrentValue = $this->UserName->FormValue;
		$this->AdjustmentAdvance->CurrentValue = $this->AdjustmentAdvance->FormValue;
		$this->billing_vouchercol->CurrentValue = $this->billing_vouchercol->FormValue;
		$this->BillType->CurrentValue = $this->BillType->FormValue;
		$this->ProcedureName->CurrentValue = $this->ProcedureName->FormValue;
		$this->ProcedureAmount->CurrentValue = $this->ProcedureAmount->FormValue;
		$this->IncludePackage->CurrentValue = $this->IncludePackage->FormValue;
		$this->CancelBill->CurrentValue = $this->CancelBill->FormValue;
		$this->CancelReason->CurrentValue = $this->CancelReason->FormValue;
		$this->CancelModeOfPayment->CurrentValue = $this->CancelModeOfPayment->FormValue;
		$this->CancelAmount->CurrentValue = $this->CancelAmount->FormValue;
		$this->CancelBankName->CurrentValue = $this->CancelBankName->FormValue;
		$this->CancelTransactionNumber->CurrentValue = $this->CancelTransactionNumber->FormValue;
		$this->LabTest->CurrentValue = $this->LabTest->FormValue;
		$this->sid->CurrentValue = $this->sid->FormValue;
		$this->SidNo->CurrentValue = $this->SidNo->FormValue;
		$this->createdDatettime->CurrentValue = $this->createdDatettime->FormValue;
		$this->createdDatettime->CurrentValue = UnFormatDateTime($this->createdDatettime->CurrentValue, 0);
		$this->LabTestReleased->CurrentValue = $this->LabTestReleased->FormValue;
		$this->GoogleReviewID->CurrentValue = $this->GoogleReviewID->FormValue;
		$this->CardType->CurrentValue = $this->CardType->FormValue;
		$this->PharmacyBill->CurrentValue = $this->PharmacyBill->FormValue;
		$this->DiscountAmount->CurrentValue = $this->DiscountAmount->FormValue;
		$this->Cash->CurrentValue = $this->Cash->FormValue;
		$this->Card->CurrentValue = $this->Card->FormValue;
		$this->resetDetailParms();
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
		$this->PatId->setDbValue($row['PatId']);
		$this->Reception->setDbValue($row['Reception']);
		$this->BillNumber->setDbValue($row['BillNumber']);
		$this->PatientId->setDbValue($row['PatientId']);
		$this->mrnno->setDbValue($row['mrnno']);
		$this->PatientName->setDbValue($row['PatientName']);
		$this->Age->setDbValue($row['Age']);
		$this->Gender->setDbValue($row['Gender']);
		$this->profilePic->setDbValue($row['profilePic']);
		$this->Mobile->setDbValue($row['Mobile']);
		$this->IP_OP->setDbValue($row['IP_OP']);
		$this->Doctor->setDbValue($row['Doctor']);
		$this->voucher_type->setDbValue($row['voucher_type']);
		$this->Details->setDbValue($row['Details']);
		$this->ModeofPayment->setDbValue($row['ModeofPayment']);
		$this->Amount->setDbValue($row['Amount']);
		$this->AnyDues->setDbValue($row['AnyDues']);
		$this->createdby->setDbValue($row['createdby']);
		$this->createddatetime->setDbValue($row['createddatetime']);
		$this->modifiedby->setDbValue($row['modifiedby']);
		$this->modifieddatetime->setDbValue($row['modifieddatetime']);
		$this->RealizationAmount->setDbValue($row['RealizationAmount']);
		$this->RealizationStatus->setDbValue($row['RealizationStatus']);
		$this->RealizationRemarks->setDbValue($row['RealizationRemarks']);
		$this->RealizationBatchNo->setDbValue($row['RealizationBatchNo']);
		$this->RealizationDate->setDbValue($row['RealizationDate']);
		$this->HospID->setDbValue($row['HospID']);
		$this->RIDNO->setDbValue($row['RIDNO']);
		$this->TidNo->setDbValue($row['TidNo']);
		$this->CId->setDbValue($row['CId']);
		$this->PartnerName->setDbValue($row['PartnerName']);
		$this->PayerType->setDbValue($row['PayerType']);
		$this->Dob->setDbValue($row['Dob']);
		$this->Currency->setDbValue($row['Currency']);
		$this->DiscountRemarks->setDbValue($row['DiscountRemarks']);
		$this->Remarks->setDbValue($row['Remarks']);
		$this->DrDepartment->setDbValue($row['DrDepartment']);
		$this->RefferedBy->setDbValue($row['RefferedBy']);
		$this->CardNumber->setDbValue($row['CardNumber']);
		$this->BankName->setDbValue($row['BankName']);
		$this->DrID->setDbValue($row['DrID']);
		$this->BillStatus->setDbValue($row['BillStatus']);
		$this->ReportHeader->setDbValue($row['ReportHeader']);
		$this->UserName->setDbValue($row['UserName']);
		$this->AdjustmentAdvance->setDbValue($row['AdjustmentAdvance']);
		$this->billing_vouchercol->setDbValue($row['billing_vouchercol']);
		$this->BillType->setDbValue($row['BillType']);
		$this->ProcedureName->setDbValue($row['ProcedureName']);
		$this->ProcedureAmount->setDbValue($row['ProcedureAmount']);
		$this->IncludePackage->setDbValue($row['IncludePackage']);
		$this->CancelBill->setDbValue($row['CancelBill']);
		$this->CancelReason->setDbValue($row['CancelReason']);
		$this->CancelModeOfPayment->setDbValue($row['CancelModeOfPayment']);
		$this->CancelAmount->setDbValue($row['CancelAmount']);
		$this->CancelBankName->setDbValue($row['CancelBankName']);
		$this->CancelTransactionNumber->setDbValue($row['CancelTransactionNumber']);
		$this->LabTest->setDbValue($row['LabTest']);
		$this->sid->setDbValue($row['sid']);
		$this->SidNo->setDbValue($row['SidNo']);
		$this->createdDatettime->setDbValue($row['createdDatettime']);
		$this->LabTestReleased->setDbValue($row['LabTestReleased']);
		$this->GoogleReviewID->setDbValue($row['GoogleReviewID']);
		$this->CardType->setDbValue($row['CardType']);
		$this->PharmacyBill->setDbValue($row['PharmacyBill']);
		$this->DiscountAmount->setDbValue($row['DiscountAmount']);
		$this->Cash->setDbValue($row['Cash']);
		$this->Card->setDbValue($row['Card']);
	}

	// Return a row with default values
	protected function newRow()
	{
		$this->loadDefaultValues();
		$row = [];
		$row['id'] = $this->id->CurrentValue;
		$row['PatId'] = $this->PatId->CurrentValue;
		$row['Reception'] = $this->Reception->CurrentValue;
		$row['BillNumber'] = $this->BillNumber->CurrentValue;
		$row['PatientId'] = $this->PatientId->CurrentValue;
		$row['mrnno'] = $this->mrnno->CurrentValue;
		$row['PatientName'] = $this->PatientName->CurrentValue;
		$row['Age'] = $this->Age->CurrentValue;
		$row['Gender'] = $this->Gender->CurrentValue;
		$row['profilePic'] = $this->profilePic->CurrentValue;
		$row['Mobile'] = $this->Mobile->CurrentValue;
		$row['IP_OP'] = $this->IP_OP->CurrentValue;
		$row['Doctor'] = $this->Doctor->CurrentValue;
		$row['voucher_type'] = $this->voucher_type->CurrentValue;
		$row['Details'] = $this->Details->CurrentValue;
		$row['ModeofPayment'] = $this->ModeofPayment->CurrentValue;
		$row['Amount'] = $this->Amount->CurrentValue;
		$row['AnyDues'] = $this->AnyDues->CurrentValue;
		$row['createdby'] = $this->createdby->CurrentValue;
		$row['createddatetime'] = $this->createddatetime->CurrentValue;
		$row['modifiedby'] = $this->modifiedby->CurrentValue;
		$row['modifieddatetime'] = $this->modifieddatetime->CurrentValue;
		$row['RealizationAmount'] = $this->RealizationAmount->CurrentValue;
		$row['RealizationStatus'] = $this->RealizationStatus->CurrentValue;
		$row['RealizationRemarks'] = $this->RealizationRemarks->CurrentValue;
		$row['RealizationBatchNo'] = $this->RealizationBatchNo->CurrentValue;
		$row['RealizationDate'] = $this->RealizationDate->CurrentValue;
		$row['HospID'] = $this->HospID->CurrentValue;
		$row['RIDNO'] = $this->RIDNO->CurrentValue;
		$row['TidNo'] = $this->TidNo->CurrentValue;
		$row['CId'] = $this->CId->CurrentValue;
		$row['PartnerName'] = $this->PartnerName->CurrentValue;
		$row['PayerType'] = $this->PayerType->CurrentValue;
		$row['Dob'] = $this->Dob->CurrentValue;
		$row['Currency'] = $this->Currency->CurrentValue;
		$row['DiscountRemarks'] = $this->DiscountRemarks->CurrentValue;
		$row['Remarks'] = $this->Remarks->CurrentValue;
		$row['DrDepartment'] = $this->DrDepartment->CurrentValue;
		$row['RefferedBy'] = $this->RefferedBy->CurrentValue;
		$row['CardNumber'] = $this->CardNumber->CurrentValue;
		$row['BankName'] = $this->BankName->CurrentValue;
		$row['DrID'] = $this->DrID->CurrentValue;
		$row['BillStatus'] = $this->BillStatus->CurrentValue;
		$row['ReportHeader'] = $this->ReportHeader->CurrentValue;
		$row['UserName'] = $this->UserName->CurrentValue;
		$row['AdjustmentAdvance'] = $this->AdjustmentAdvance->CurrentValue;
		$row['billing_vouchercol'] = $this->billing_vouchercol->CurrentValue;
		$row['BillType'] = $this->BillType->CurrentValue;
		$row['ProcedureName'] = $this->ProcedureName->CurrentValue;
		$row['ProcedureAmount'] = $this->ProcedureAmount->CurrentValue;
		$row['IncludePackage'] = $this->IncludePackage->CurrentValue;
		$row['CancelBill'] = $this->CancelBill->CurrentValue;
		$row['CancelReason'] = $this->CancelReason->CurrentValue;
		$row['CancelModeOfPayment'] = $this->CancelModeOfPayment->CurrentValue;
		$row['CancelAmount'] = $this->CancelAmount->CurrentValue;
		$row['CancelBankName'] = $this->CancelBankName->CurrentValue;
		$row['CancelTransactionNumber'] = $this->CancelTransactionNumber->CurrentValue;
		$row['LabTest'] = $this->LabTest->CurrentValue;
		$row['sid'] = $this->sid->CurrentValue;
		$row['SidNo'] = $this->SidNo->CurrentValue;
		$row['createdDatettime'] = $this->createdDatettime->CurrentValue;
		$row['LabTestReleased'] = $this->LabTestReleased->CurrentValue;
		$row['GoogleReviewID'] = $this->GoogleReviewID->CurrentValue;
		$row['CardType'] = $this->CardType->CurrentValue;
		$row['PharmacyBill'] = $this->PharmacyBill->CurrentValue;
		$row['DiscountAmount'] = $this->DiscountAmount->CurrentValue;
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
		if ($this->RealizationAmount->FormValue == $this->RealizationAmount->CurrentValue && is_numeric(ConvertToFloatString($this->RealizationAmount->CurrentValue)))
			$this->RealizationAmount->CurrentValue = ConvertToFloatString($this->RealizationAmount->CurrentValue);

		// Convert decimal values if posted back
		if ($this->ProcedureAmount->FormValue == $this->ProcedureAmount->CurrentValue && is_numeric(ConvertToFloatString($this->ProcedureAmount->CurrentValue)))
			$this->ProcedureAmount->CurrentValue = ConvertToFloatString($this->ProcedureAmount->CurrentValue);

		// Convert decimal values if posted back
		if ($this->DiscountAmount->FormValue == $this->DiscountAmount->CurrentValue && is_numeric(ConvertToFloatString($this->DiscountAmount->CurrentValue)))
			$this->DiscountAmount->CurrentValue = ConvertToFloatString($this->DiscountAmount->CurrentValue);

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
		// PatId
		// Reception
		// BillNumber
		// PatientId
		// mrnno
		// PatientName
		// Age
		// Gender
		// profilePic
		// Mobile
		// IP_OP
		// Doctor
		// voucher_type
		// Details
		// ModeofPayment
		// Amount
		// AnyDues
		// createdby
		// createddatetime
		// modifiedby
		// modifieddatetime
		// RealizationAmount
		// RealizationStatus
		// RealizationRemarks
		// RealizationBatchNo
		// RealizationDate
		// HospID
		// RIDNO
		// TidNo
		// CId
		// PartnerName
		// PayerType
		// Dob
		// Currency
		// DiscountRemarks
		// Remarks
		// DrDepartment
		// RefferedBy
		// CardNumber
		// BankName
		// DrID
		// BillStatus
		// ReportHeader
		// UserName
		// AdjustmentAdvance
		// billing_vouchercol
		// BillType
		// ProcedureName
		// ProcedureAmount
		// IncludePackage
		// CancelBill
		// CancelReason
		// CancelModeOfPayment
		// CancelAmount
		// CancelBankName
		// CancelTransactionNumber
		// LabTest
		// sid
		// SidNo
		// createdDatettime
		// LabTestReleased
		// GoogleReviewID
		// CardType
		// PharmacyBill
		// DiscountAmount
		// Cash
		// Card

		if ($this->RowType == ROWTYPE_VIEW) { // View row

			// id
			$this->id->ViewValue = $this->id->CurrentValue;
			$this->id->ViewCustomAttributes = "";

			// PatId
			$this->PatId->ViewValue = $this->PatId->CurrentValue;
			$this->PatId->ViewValue = FormatNumber($this->PatId->ViewValue, 0, -2, -2, -2);
			$this->PatId->ViewCustomAttributes = "";

			// Reception
			$curVal = strval($this->Reception->CurrentValue);
			if ($curVal <> "") {
				$this->Reception->ViewValue = $this->Reception->lookupCacheOption($curVal);
				if ($this->Reception->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
					$sqlWrk = $this->Reception->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = $rswrk->fields('df');
						$arwrk[2] = $rswrk->fields('df2');
						$arwrk[3] = $rswrk->fields('df3');
						$this->Reception->ViewValue = $this->Reception->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->Reception->ViewValue = $this->Reception->CurrentValue;
					}
				}
			} else {
				$this->Reception->ViewValue = NULL;
			}
			$this->Reception->ViewCustomAttributes = "";

			// BillNumber
			$this->BillNumber->ViewValue = $this->BillNumber->CurrentValue;
			$this->BillNumber->ViewCustomAttributes = "";

			// PatientId
			$this->PatientId->ViewValue = $this->PatientId->CurrentValue;
			$this->PatientId->ImageWidth = 180;
			$this->PatientId->ImageHeight = 60;
			$this->PatientId->ImageAlt = $this->PatientId->alt();
			$this->PatientId->ViewCustomAttributes = "";

			// mrnno
			$this->mrnno->ViewValue = $this->mrnno->CurrentValue;
			$this->mrnno->ViewCustomAttributes = "";

			// PatientName
			$this->PatientName->ViewValue = $this->PatientName->CurrentValue;
			$this->PatientName->ViewCustomAttributes = "";

			// Age
			$this->Age->ViewValue = $this->Age->CurrentValue;
			$this->Age->ViewCustomAttributes = "";

			// Gender
			$this->Gender->ViewValue = $this->Gender->CurrentValue;
			$this->Gender->ViewCustomAttributes = "";

			// profilePic
			$this->profilePic->ViewValue = $this->profilePic->CurrentValue;
			$this->profilePic->ViewCustomAttributes = "";

			// Mobile
			$this->Mobile->ViewValue = $this->Mobile->CurrentValue;
			$this->Mobile->ViewCustomAttributes = "";

			// IP_OP
			$this->IP_OP->ViewValue = $this->IP_OP->CurrentValue;
			$this->IP_OP->ViewCustomAttributes = "";

			// Doctor
			$this->Doctor->ViewValue = $this->Doctor->CurrentValue;
			$curVal = strval($this->Doctor->CurrentValue);
			if ($curVal <> "") {
				$this->Doctor->ViewValue = $this->Doctor->lookupCacheOption($curVal);
				if ($this->Doctor->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
					$sqlWrk = $this->Doctor->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = $rswrk->fields('df');
						$this->Doctor->ViewValue = $this->Doctor->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->Doctor->ViewValue = $this->Doctor->CurrentValue;
					}
				}
			} else {
				$this->Doctor->ViewValue = NULL;
			}
			$this->Doctor->ViewCustomAttributes = "";

			// voucher_type
			$curVal = strval($this->voucher_type->CurrentValue);
			if ($curVal <> "") {
				$this->voucher_type->ViewValue = $this->voucher_type->lookupCacheOption($curVal);
				if ($this->voucher_type->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Type`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->voucher_type->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = $rswrk->fields('df');
						$this->voucher_type->ViewValue = $this->voucher_type->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->voucher_type->ViewValue = $this->voucher_type->CurrentValue;
					}
				}
			} else {
				$this->voucher_type->ViewValue = NULL;
			}
			$this->voucher_type->ViewCustomAttributes = "";

			// Details
			$this->Details->ViewValue = $this->Details->CurrentValue;
			$this->Details->ViewCustomAttributes = "";

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

			// AnyDues
			$this->AnyDues->ViewValue = $this->AnyDues->CurrentValue;
			$this->AnyDues->ViewCustomAttributes = "";

			// createdby
			$this->createdby->ViewValue = $this->createdby->CurrentValue;
			$this->createdby->ViewCustomAttributes = "";

			// createddatetime
			$this->createddatetime->ViewValue = $this->createddatetime->CurrentValue;
			$this->createddatetime->ViewValue = FormatDateTime($this->createddatetime->ViewValue, 11);
			$this->createddatetime->ViewCustomAttributes = "";

			// modifiedby
			$this->modifiedby->ViewValue = $this->modifiedby->CurrentValue;
			$this->modifiedby->ViewCustomAttributes = "";

			// modifieddatetime
			$this->modifieddatetime->ViewValue = $this->modifieddatetime->CurrentValue;
			$this->modifieddatetime->ViewValue = FormatDateTime($this->modifieddatetime->ViewValue, 0);
			$this->modifieddatetime->ViewCustomAttributes = "";

			// RealizationAmount
			$this->RealizationAmount->ViewValue = $this->RealizationAmount->CurrentValue;
			$this->RealizationAmount->ViewValue = FormatNumber($this->RealizationAmount->ViewValue, 2, -2, -2, -2);
			$this->RealizationAmount->ViewCustomAttributes = "";

			// RealizationStatus
			$this->RealizationStatus->ViewValue = $this->RealizationStatus->CurrentValue;
			$this->RealizationStatus->ViewCustomAttributes = "";

			// RealizationRemarks
			$this->RealizationRemarks->ViewValue = $this->RealizationRemarks->CurrentValue;
			$this->RealizationRemarks->ViewCustomAttributes = "";

			// RealizationBatchNo
			$this->RealizationBatchNo->ViewValue = $this->RealizationBatchNo->CurrentValue;
			$this->RealizationBatchNo->ViewCustomAttributes = "";

			// RealizationDate
			$this->RealizationDate->ViewValue = $this->RealizationDate->CurrentValue;
			$this->RealizationDate->ViewCustomAttributes = "";

			// HospID
			$this->HospID->ViewValue = $this->HospID->CurrentValue;
			$this->HospID->ViewCustomAttributes = "";

			// RIDNO
			$this->RIDNO->ViewValue = $this->RIDNO->CurrentValue;
			$this->RIDNO->ViewValue = FormatNumber($this->RIDNO->ViewValue, 0, -2, -2, -2);
			$this->RIDNO->ViewCustomAttributes = "";

			// TidNo
			$this->TidNo->ViewValue = $this->TidNo->CurrentValue;
			$this->TidNo->ViewValue = FormatNumber($this->TidNo->ViewValue, 0, -2, -2, -2);
			$this->TidNo->ViewCustomAttributes = "";

			// CId
			$this->CId->ViewValue = $this->CId->CurrentValue;
			$this->CId->ViewValue = FormatNumber($this->CId->ViewValue, 0, -2, -2, -2);
			$this->CId->ViewCustomAttributes = "";

			// PartnerName
			$this->PartnerName->ViewValue = $this->PartnerName->CurrentValue;
			$this->PartnerName->ViewCustomAttributes = "";

			// PayerType
			$this->PayerType->ViewValue = $this->PayerType->CurrentValue;
			$this->PayerType->ViewCustomAttributes = "";

			// Dob
			$this->Dob->ViewValue = $this->Dob->CurrentValue;
			$this->Dob->ViewCustomAttributes = "";

			// Currency
			$this->Currency->ViewValue = $this->Currency->CurrentValue;
			$this->Currency->ViewCustomAttributes = "";

			// DiscountRemarks
			$this->DiscountRemarks->ViewValue = $this->DiscountRemarks->CurrentValue;
			$this->DiscountRemarks->ViewCustomAttributes = "";

			// Remarks
			$this->Remarks->ViewValue = $this->Remarks->CurrentValue;
			$this->Remarks->ViewCustomAttributes = "";

			// DrDepartment
			$this->DrDepartment->ViewValue = $this->DrDepartment->CurrentValue;
			$this->DrDepartment->ViewCustomAttributes = "";

			// RefferedBy
			$this->RefferedBy->ViewValue = $this->RefferedBy->CurrentValue;
			$this->RefferedBy->ViewCustomAttributes = "";

			// CardNumber
			$this->CardNumber->ViewValue = $this->CardNumber->CurrentValue;
			$this->CardNumber->ViewCustomAttributes = "";

			// BankName
			$this->BankName->ViewValue = $this->BankName->CurrentValue;
			$this->BankName->ViewCustomAttributes = "";

			// DrID
			$this->DrID->ViewValue = $this->DrID->CurrentValue;
			$this->DrID->ViewValue = FormatNumber($this->DrID->ViewValue, 0, -2, -2, -2);
			$this->DrID->ViewCustomAttributes = "";

			// BillStatus
			$this->BillStatus->ViewValue = $this->BillStatus->CurrentValue;
			$this->BillStatus->ViewValue = FormatNumber($this->BillStatus->ViewValue, 0, -2, -2, -2);
			$this->BillStatus->ViewCustomAttributes = "";

			// ReportHeader
			$this->ReportHeader->ViewValue = $this->ReportHeader->CurrentValue;
			$this->ReportHeader->ViewCustomAttributes = "";

			// UserName
			$this->UserName->ViewValue = $this->UserName->CurrentValue;
			$this->UserName->ViewCustomAttributes = "";

			// AdjustmentAdvance
			$this->AdjustmentAdvance->ViewValue = $this->AdjustmentAdvance->CurrentValue;
			$this->AdjustmentAdvance->ViewCustomAttributes = "";

			// billing_vouchercol
			$this->billing_vouchercol->ViewValue = $this->billing_vouchercol->CurrentValue;
			$this->billing_vouchercol->ViewCustomAttributes = "";

			// BillType
			$this->BillType->ViewValue = $this->BillType->CurrentValue;
			$this->BillType->ViewCustomAttributes = "";

			// ProcedureName
			$this->ProcedureName->ViewValue = $this->ProcedureName->CurrentValue;
			$this->ProcedureName->ViewCustomAttributes = "";

			// ProcedureAmount
			$this->ProcedureAmount->ViewValue = $this->ProcedureAmount->CurrentValue;
			$this->ProcedureAmount->ViewValue = FormatNumber($this->ProcedureAmount->ViewValue, 2, -2, -2, -2);
			$this->ProcedureAmount->ViewCustomAttributes = "";

			// IncludePackage
			$this->IncludePackage->ViewValue = $this->IncludePackage->CurrentValue;
			$this->IncludePackage->ViewCustomAttributes = "";

			// CancelBill
			$this->CancelBill->ViewValue = $this->CancelBill->CurrentValue;
			$this->CancelBill->ViewCustomAttributes = "";

			// CancelReason
			$this->CancelReason->ViewValue = $this->CancelReason->CurrentValue;
			$this->CancelReason->ViewCustomAttributes = "";

			// CancelModeOfPayment
			$this->CancelModeOfPayment->ViewValue = $this->CancelModeOfPayment->CurrentValue;
			$this->CancelModeOfPayment->ViewCustomAttributes = "";

			// CancelAmount
			$this->CancelAmount->ViewValue = $this->CancelAmount->CurrentValue;
			$this->CancelAmount->ViewCustomAttributes = "";

			// CancelBankName
			$this->CancelBankName->ViewValue = $this->CancelBankName->CurrentValue;
			$this->CancelBankName->ViewCustomAttributes = "";

			// CancelTransactionNumber
			$this->CancelTransactionNumber->ViewValue = $this->CancelTransactionNumber->CurrentValue;
			$this->CancelTransactionNumber->ViewCustomAttributes = "";

			// LabTest
			$this->LabTest->ViewValue = $this->LabTest->CurrentValue;
			$this->LabTest->ViewCustomAttributes = "";

			// sid
			$this->sid->ViewValue = $this->sid->CurrentValue;
			$this->sid->ViewValue = FormatNumber($this->sid->ViewValue, 0, -2, -2, -2);
			$this->sid->ViewCustomAttributes = "";

			// SidNo
			$this->SidNo->ViewValue = $this->SidNo->CurrentValue;
			$this->SidNo->ViewCustomAttributes = "";

			// createdDatettime
			$this->createdDatettime->ViewValue = $this->createdDatettime->CurrentValue;
			$this->createdDatettime->ViewValue = FormatDateTime($this->createdDatettime->ViewValue, 0);
			$this->createdDatettime->ViewCustomAttributes = "";

			// LabTestReleased
			$this->LabTestReleased->ViewValue = $this->LabTestReleased->CurrentValue;
			$this->LabTestReleased->ViewCustomAttributes = "";

			// GoogleReviewID
			$this->GoogleReviewID->ViewValue = $this->GoogleReviewID->CurrentValue;
			$this->GoogleReviewID->ViewCustomAttributes = "";

			// CardType
			$this->CardType->ViewValue = $this->CardType->CurrentValue;
			$this->CardType->ViewCustomAttributes = "";

			// PharmacyBill
			$this->PharmacyBill->ViewValue = $this->PharmacyBill->CurrentValue;
			$this->PharmacyBill->ViewCustomAttributes = "";

			// DiscountAmount
			$this->DiscountAmount->ViewValue = $this->DiscountAmount->CurrentValue;
			$this->DiscountAmount->ViewValue = FormatNumber($this->DiscountAmount->ViewValue, 2, -2, -2, -2);
			$this->DiscountAmount->ViewCustomAttributes = "";

			// Cash
			$this->Cash->ViewValue = $this->Cash->CurrentValue;
			$this->Cash->ViewValue = FormatNumber($this->Cash->ViewValue, 2, -2, -2, -2);
			$this->Cash->ViewCustomAttributes = "";

			// Card
			$this->Card->ViewValue = $this->Card->CurrentValue;
			$this->Card->ViewValue = FormatNumber($this->Card->ViewValue, 2, -2, -2, -2);
			$this->Card->ViewCustomAttributes = "";

			// PatId
			$this->PatId->LinkCustomAttributes = "";
			$this->PatId->HrefValue = "";
			$this->PatId->ExportHrefValue = Barcode()->getHrefValue($this->PatId->CurrentValue, 'QRCODE', 60);
			$this->PatId->TooltipValue = "";

			// Reception
			$this->Reception->LinkCustomAttributes = "";
			$this->Reception->HrefValue = "";
			$this->Reception->ExportHrefValue = Barcode()->getHrefValue($this->Reception->CurrentValue, 'QRCODE', 60);
			$this->Reception->TooltipValue = "";

			// BillNumber
			$this->BillNumber->LinkCustomAttributes = "";
			$this->BillNumber->HrefValue = "";
			$this->BillNumber->TooltipValue = "";

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

			// Mobile
			$this->Mobile->LinkCustomAttributes = "";
			$this->Mobile->HrefValue = "";
			$this->Mobile->TooltipValue = "";

			// IP_OP
			$this->IP_OP->LinkCustomAttributes = "";
			$this->IP_OP->HrefValue = "";
			$this->IP_OP->TooltipValue = "";

			// Doctor
			$this->Doctor->LinkCustomAttributes = "";
			$this->Doctor->HrefValue = "";
			$this->Doctor->TooltipValue = "";

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

			// RealizationAmount
			$this->RealizationAmount->LinkCustomAttributes = "";
			$this->RealizationAmount->HrefValue = "";
			$this->RealizationAmount->TooltipValue = "";

			// RealizationStatus
			$this->RealizationStatus->LinkCustomAttributes = "";
			$this->RealizationStatus->HrefValue = "";
			$this->RealizationStatus->TooltipValue = "";

			// RealizationRemarks
			$this->RealizationRemarks->LinkCustomAttributes = "";
			$this->RealizationRemarks->HrefValue = "";
			$this->RealizationRemarks->TooltipValue = "";

			// RealizationBatchNo
			$this->RealizationBatchNo->LinkCustomAttributes = "";
			$this->RealizationBatchNo->HrefValue = "";
			$this->RealizationBatchNo->TooltipValue = "";

			// RealizationDate
			$this->RealizationDate->LinkCustomAttributes = "";
			$this->RealizationDate->HrefValue = "";
			$this->RealizationDate->TooltipValue = "";

			// HospID
			$this->HospID->LinkCustomAttributes = "";
			$this->HospID->HrefValue = "";
			$this->HospID->TooltipValue = "";

			// RIDNO
			$this->RIDNO->LinkCustomAttributes = "";
			$this->RIDNO->HrefValue = "";
			$this->RIDNO->TooltipValue = "";

			// TidNo
			$this->TidNo->LinkCustomAttributes = "";
			$this->TidNo->HrefValue = "";
			$this->TidNo->TooltipValue = "";

			// CId
			$this->CId->LinkCustomAttributes = "";
			$this->CId->HrefValue = "";
			$this->CId->TooltipValue = "";

			// PartnerName
			$this->PartnerName->LinkCustomAttributes = "";
			$this->PartnerName->HrefValue = "";
			$this->PartnerName->TooltipValue = "";

			// PayerType
			$this->PayerType->LinkCustomAttributes = "";
			$this->PayerType->HrefValue = "";
			$this->PayerType->TooltipValue = "";

			// Dob
			$this->Dob->LinkCustomAttributes = "";
			$this->Dob->HrefValue = "";
			$this->Dob->TooltipValue = "";

			// Currency
			$this->Currency->LinkCustomAttributes = "";
			$this->Currency->HrefValue = "";
			$this->Currency->TooltipValue = "";

			// DiscountRemarks
			$this->DiscountRemarks->LinkCustomAttributes = "";
			$this->DiscountRemarks->HrefValue = "";
			$this->DiscountRemarks->TooltipValue = "";

			// Remarks
			$this->Remarks->LinkCustomAttributes = "";
			$this->Remarks->HrefValue = "";
			$this->Remarks->TooltipValue = "";

			// DrDepartment
			$this->DrDepartment->LinkCustomAttributes = "";
			$this->DrDepartment->HrefValue = "";
			$this->DrDepartment->TooltipValue = "";

			// RefferedBy
			$this->RefferedBy->LinkCustomAttributes = "";
			$this->RefferedBy->HrefValue = "";
			$this->RefferedBy->TooltipValue = "";

			// CardNumber
			$this->CardNumber->LinkCustomAttributes = "";
			$this->CardNumber->HrefValue = "";
			$this->CardNumber->TooltipValue = "";

			// BankName
			$this->BankName->LinkCustomAttributes = "";
			$this->BankName->HrefValue = "";
			$this->BankName->TooltipValue = "";

			// DrID
			$this->DrID->LinkCustomAttributes = "";
			$this->DrID->HrefValue = "";
			$this->DrID->TooltipValue = "";

			// BillStatus
			$this->BillStatus->LinkCustomAttributes = "";
			$this->BillStatus->HrefValue = "";
			$this->BillStatus->TooltipValue = "";

			// ReportHeader
			$this->ReportHeader->LinkCustomAttributes = "";
			$this->ReportHeader->HrefValue = "";
			$this->ReportHeader->TooltipValue = "";

			// UserName
			$this->UserName->LinkCustomAttributes = "";
			$this->UserName->HrefValue = "";
			$this->UserName->TooltipValue = "";

			// AdjustmentAdvance
			$this->AdjustmentAdvance->LinkCustomAttributes = "";
			$this->AdjustmentAdvance->HrefValue = "";
			$this->AdjustmentAdvance->TooltipValue = "";

			// billing_vouchercol
			$this->billing_vouchercol->LinkCustomAttributes = "";
			$this->billing_vouchercol->HrefValue = "";
			$this->billing_vouchercol->TooltipValue = "";

			// BillType
			$this->BillType->LinkCustomAttributes = "";
			$this->BillType->HrefValue = "";
			$this->BillType->TooltipValue = "";

			// ProcedureName
			$this->ProcedureName->LinkCustomAttributes = "";
			$this->ProcedureName->HrefValue = "";
			$this->ProcedureName->TooltipValue = "";

			// ProcedureAmount
			$this->ProcedureAmount->LinkCustomAttributes = "";
			$this->ProcedureAmount->HrefValue = "";
			$this->ProcedureAmount->TooltipValue = "";

			// IncludePackage
			$this->IncludePackage->LinkCustomAttributes = "";
			$this->IncludePackage->HrefValue = "";
			$this->IncludePackage->TooltipValue = "";

			// CancelBill
			$this->CancelBill->LinkCustomAttributes = "";
			$this->CancelBill->HrefValue = "";
			$this->CancelBill->TooltipValue = "";

			// CancelReason
			$this->CancelReason->LinkCustomAttributes = "";
			$this->CancelReason->HrefValue = "";
			$this->CancelReason->TooltipValue = "";

			// CancelModeOfPayment
			$this->CancelModeOfPayment->LinkCustomAttributes = "";
			$this->CancelModeOfPayment->HrefValue = "";
			$this->CancelModeOfPayment->TooltipValue = "";

			// CancelAmount
			$this->CancelAmount->LinkCustomAttributes = "";
			$this->CancelAmount->HrefValue = "";
			$this->CancelAmount->TooltipValue = "";

			// CancelBankName
			$this->CancelBankName->LinkCustomAttributes = "";
			$this->CancelBankName->HrefValue = "";
			$this->CancelBankName->TooltipValue = "";

			// CancelTransactionNumber
			$this->CancelTransactionNumber->LinkCustomAttributes = "";
			$this->CancelTransactionNumber->HrefValue = "";
			$this->CancelTransactionNumber->TooltipValue = "";

			// LabTest
			$this->LabTest->LinkCustomAttributes = "";
			$this->LabTest->HrefValue = "";
			$this->LabTest->TooltipValue = "";

			// sid
			$this->sid->LinkCustomAttributes = "";
			$this->sid->HrefValue = "";
			$this->sid->TooltipValue = "";

			// SidNo
			$this->SidNo->LinkCustomAttributes = "";
			$this->SidNo->HrefValue = "";
			$this->SidNo->TooltipValue = "";

			// createdDatettime
			$this->createdDatettime->LinkCustomAttributes = "";
			$this->createdDatettime->HrefValue = "";
			$this->createdDatettime->TooltipValue = "";

			// LabTestReleased
			$this->LabTestReleased->LinkCustomAttributes = "";
			$this->LabTestReleased->HrefValue = "";
			$this->LabTestReleased->TooltipValue = "";

			// GoogleReviewID
			$this->GoogleReviewID->LinkCustomAttributes = "";
			$this->GoogleReviewID->HrefValue = "";
			$this->GoogleReviewID->TooltipValue = "";

			// CardType
			$this->CardType->LinkCustomAttributes = "";
			$this->CardType->HrefValue = "";
			$this->CardType->TooltipValue = "";

			// PharmacyBill
			$this->PharmacyBill->LinkCustomAttributes = "";
			$this->PharmacyBill->HrefValue = "";
			$this->PharmacyBill->TooltipValue = "";

			// DiscountAmount
			$this->DiscountAmount->LinkCustomAttributes = "";
			$this->DiscountAmount->HrefValue = "";
			$this->DiscountAmount->TooltipValue = "";

			// Cash
			$this->Cash->LinkCustomAttributes = "";
			$this->Cash->HrefValue = "";
			$this->Cash->TooltipValue = "";

			// Card
			$this->Card->LinkCustomAttributes = "";
			$this->Card->HrefValue = "";
			$this->Card->TooltipValue = "";
		} elseif ($this->RowType == ROWTYPE_ADD) { // Add row

			// PatId
			$this->PatId->EditAttrs["class"] = "form-control";
			$this->PatId->EditCustomAttributes = "";
			$this->PatId->EditValue = HtmlEncode($this->PatId->CurrentValue);
			$this->PatId->PlaceHolder = RemoveHtml($this->PatId->caption());

			// Reception
			$this->Reception->EditCustomAttributes = "";
			$curVal = trim(strval($this->Reception->CurrentValue));
			if ($curVal <> "")
				$this->Reception->ViewValue = $this->Reception->lookupCacheOption($curVal);
			else
				$this->Reception->ViewValue = $this->Reception->Lookup !== NULL && is_array($this->Reception->Lookup->Options) ? $curVal : NULL;
			if ($this->Reception->ViewValue !== NULL) { // Load from cache
				$this->Reception->EditValue = array_values($this->Reception->Lookup->Options);
				if ($this->Reception->ViewValue == "")
					$this->Reception->ViewValue = $Language->phrase("PleaseSelect");
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`id`" . SearchString("=", $this->Reception->CurrentValue, DATATYPE_NUMBER, "");
				}
				$sqlWrk = $this->Reception->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = array();
					$arwrk[1] = HtmlEncode($rswrk->fields('df'));
					$arwrk[2] = HtmlEncode($rswrk->fields('df2'));
					$arwrk[3] = HtmlEncode($rswrk->fields('df3'));
					$this->Reception->ViewValue = $this->Reception->displayValue($arwrk);
				} else {
					$this->Reception->ViewValue = $Language->phrase("PleaseSelect");
				}
				$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
				if ($rswrk) $rswrk->Close();
				$this->Reception->EditValue = $arwrk;
			}

			// BillNumber
			$this->BillNumber->EditAttrs["class"] = "form-control";
			$this->BillNumber->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->BillNumber->CurrentValue = HtmlDecode($this->BillNumber->CurrentValue);
			$this->BillNumber->EditValue = HtmlEncode($this->BillNumber->CurrentValue);
			$this->BillNumber->PlaceHolder = RemoveHtml($this->BillNumber->caption());

			// PatientId
			$this->PatientId->EditAttrs["class"] = "form-control";
			$this->PatientId->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->PatientId->CurrentValue = HtmlDecode($this->PatientId->CurrentValue);
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
			if (REMOVE_XSS)
				$this->profilePic->CurrentValue = HtmlDecode($this->profilePic->CurrentValue);
			$this->profilePic->EditValue = HtmlEncode($this->profilePic->CurrentValue);
			$this->profilePic->PlaceHolder = RemoveHtml($this->profilePic->caption());

			// Mobile
			$this->Mobile->EditAttrs["class"] = "form-control";
			$this->Mobile->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Mobile->CurrentValue = HtmlDecode($this->Mobile->CurrentValue);
			$this->Mobile->EditValue = HtmlEncode($this->Mobile->CurrentValue);
			$this->Mobile->PlaceHolder = RemoveHtml($this->Mobile->caption());

			// IP_OP
			$this->IP_OP->EditAttrs["class"] = "form-control";
			$this->IP_OP->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->IP_OP->CurrentValue = HtmlDecode($this->IP_OP->CurrentValue);
			$this->IP_OP->EditValue = HtmlEncode($this->IP_OP->CurrentValue);
			$this->IP_OP->PlaceHolder = RemoveHtml($this->IP_OP->caption());

			// Doctor
			$this->Doctor->EditAttrs["class"] = "form-control";
			$this->Doctor->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Doctor->CurrentValue = HtmlDecode($this->Doctor->CurrentValue);
			$this->Doctor->EditValue = HtmlEncode($this->Doctor->CurrentValue);
			$curVal = strval($this->Doctor->CurrentValue);
			if ($curVal <> "") {
				$this->Doctor->EditValue = $this->Doctor->lookupCacheOption($curVal);
				if ($this->Doctor->EditValue === NULL) { // Lookup from database
					$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
					$sqlWrk = $this->Doctor->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = HtmlEncode($rswrk->fields('df'));
						$this->Doctor->EditValue = $this->Doctor->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->Doctor->EditValue = HtmlEncode($this->Doctor->CurrentValue);
					}
				}
			} else {
				$this->Doctor->EditValue = NULL;
			}
			$this->Doctor->PlaceHolder = RemoveHtml($this->Doctor->caption());

			// voucher_type
			$this->voucher_type->EditAttrs["class"] = "form-control";
			$this->voucher_type->EditCustomAttributes = "";
			$curVal = trim(strval($this->voucher_type->CurrentValue));
			if ($curVal <> "")
				$this->voucher_type->ViewValue = $this->voucher_type->lookupCacheOption($curVal);
			else
				$this->voucher_type->ViewValue = $this->voucher_type->Lookup !== NULL && is_array($this->voucher_type->Lookup->Options) ? $curVal : NULL;
			if ($this->voucher_type->ViewValue !== NULL) { // Load from cache
				$this->voucher_type->EditValue = array_values($this->voucher_type->Lookup->Options);
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`Type`" . SearchString("=", $this->voucher_type->CurrentValue, DATATYPE_STRING, "");
				}
				$sqlWrk = $this->voucher_type->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
				if ($rswrk) $rswrk->Close();
				$this->voucher_type->EditValue = $arwrk;
			}

			// Details
			$this->Details->EditAttrs["class"] = "form-control";
			$this->Details->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Details->CurrentValue = HtmlDecode($this->Details->CurrentValue);
			$this->Details->EditValue = HtmlEncode($this->Details->CurrentValue);
			$this->Details->PlaceHolder = RemoveHtml($this->Details->caption());

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

			// AnyDues
			$this->AnyDues->EditAttrs["class"] = "form-control";
			$this->AnyDues->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->AnyDues->CurrentValue = HtmlDecode($this->AnyDues->CurrentValue);
			$this->AnyDues->EditValue = HtmlEncode($this->AnyDues->CurrentValue);
			$this->AnyDues->PlaceHolder = RemoveHtml($this->AnyDues->caption());

			// createdby
			// createddatetime
			// RealizationAmount

			$this->RealizationAmount->EditAttrs["class"] = "form-control";
			$this->RealizationAmount->EditCustomAttributes = "";
			$this->RealizationAmount->EditValue = HtmlEncode($this->RealizationAmount->CurrentValue);
			$this->RealizationAmount->PlaceHolder = RemoveHtml($this->RealizationAmount->caption());
			if (strval($this->RealizationAmount->EditValue) <> "" && is_numeric($this->RealizationAmount->EditValue))
				$this->RealizationAmount->EditValue = FormatNumber($this->RealizationAmount->EditValue, -2, -2, -2, -2);

			// RealizationStatus
			$this->RealizationStatus->EditAttrs["class"] = "form-control";
			$this->RealizationStatus->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->RealizationStatus->CurrentValue = HtmlDecode($this->RealizationStatus->CurrentValue);
			$this->RealizationStatus->EditValue = HtmlEncode($this->RealizationStatus->CurrentValue);
			$this->RealizationStatus->PlaceHolder = RemoveHtml($this->RealizationStatus->caption());

			// RealizationRemarks
			$this->RealizationRemarks->EditAttrs["class"] = "form-control";
			$this->RealizationRemarks->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->RealizationRemarks->CurrentValue = HtmlDecode($this->RealizationRemarks->CurrentValue);
			$this->RealizationRemarks->EditValue = HtmlEncode($this->RealizationRemarks->CurrentValue);
			$this->RealizationRemarks->PlaceHolder = RemoveHtml($this->RealizationRemarks->caption());

			// RealizationBatchNo
			$this->RealizationBatchNo->EditAttrs["class"] = "form-control";
			$this->RealizationBatchNo->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->RealizationBatchNo->CurrentValue = HtmlDecode($this->RealizationBatchNo->CurrentValue);
			$this->RealizationBatchNo->EditValue = HtmlEncode($this->RealizationBatchNo->CurrentValue);
			$this->RealizationBatchNo->PlaceHolder = RemoveHtml($this->RealizationBatchNo->caption());

			// RealizationDate
			$this->RealizationDate->EditAttrs["class"] = "form-control";
			$this->RealizationDate->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->RealizationDate->CurrentValue = HtmlDecode($this->RealizationDate->CurrentValue);
			$this->RealizationDate->EditValue = HtmlEncode($this->RealizationDate->CurrentValue);
			$this->RealizationDate->PlaceHolder = RemoveHtml($this->RealizationDate->caption());

			// HospID
			// RIDNO

			$this->RIDNO->EditAttrs["class"] = "form-control";
			$this->RIDNO->EditCustomAttributes = "";
			$this->RIDNO->EditValue = HtmlEncode($this->RIDNO->CurrentValue);
			$this->RIDNO->PlaceHolder = RemoveHtml($this->RIDNO->caption());

			// TidNo
			$this->TidNo->EditAttrs["class"] = "form-control";
			$this->TidNo->EditCustomAttributes = "";
			$this->TidNo->EditValue = HtmlEncode($this->TidNo->CurrentValue);
			$this->TidNo->PlaceHolder = RemoveHtml($this->TidNo->caption());

			// CId
			$this->CId->EditAttrs["class"] = "form-control";
			$this->CId->EditCustomAttributes = "";
			$this->CId->EditValue = HtmlEncode($this->CId->CurrentValue);
			$this->CId->PlaceHolder = RemoveHtml($this->CId->caption());

			// PartnerName
			$this->PartnerName->EditAttrs["class"] = "form-control";
			$this->PartnerName->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->PartnerName->CurrentValue = HtmlDecode($this->PartnerName->CurrentValue);
			$this->PartnerName->EditValue = HtmlEncode($this->PartnerName->CurrentValue);
			$this->PartnerName->PlaceHolder = RemoveHtml($this->PartnerName->caption());

			// PayerType
			$this->PayerType->EditAttrs["class"] = "form-control";
			$this->PayerType->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->PayerType->CurrentValue = HtmlDecode($this->PayerType->CurrentValue);
			$this->PayerType->EditValue = HtmlEncode($this->PayerType->CurrentValue);
			$this->PayerType->PlaceHolder = RemoveHtml($this->PayerType->caption());

			// Dob
			$this->Dob->EditAttrs["class"] = "form-control";
			$this->Dob->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Dob->CurrentValue = HtmlDecode($this->Dob->CurrentValue);
			$this->Dob->EditValue = HtmlEncode($this->Dob->CurrentValue);
			$this->Dob->PlaceHolder = RemoveHtml($this->Dob->caption());

			// Currency
			$this->Currency->EditAttrs["class"] = "form-control";
			$this->Currency->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Currency->CurrentValue = HtmlDecode($this->Currency->CurrentValue);
			$this->Currency->EditValue = HtmlEncode($this->Currency->CurrentValue);
			$this->Currency->PlaceHolder = RemoveHtml($this->Currency->caption());

			// DiscountRemarks
			$this->DiscountRemarks->EditAttrs["class"] = "form-control";
			$this->DiscountRemarks->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->DiscountRemarks->CurrentValue = HtmlDecode($this->DiscountRemarks->CurrentValue);
			$this->DiscountRemarks->EditValue = HtmlEncode($this->DiscountRemarks->CurrentValue);
			$this->DiscountRemarks->PlaceHolder = RemoveHtml($this->DiscountRemarks->caption());

			// Remarks
			$this->Remarks->EditAttrs["class"] = "form-control";
			$this->Remarks->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Remarks->CurrentValue = HtmlDecode($this->Remarks->CurrentValue);
			$this->Remarks->EditValue = HtmlEncode($this->Remarks->CurrentValue);
			$this->Remarks->PlaceHolder = RemoveHtml($this->Remarks->caption());

			// DrDepartment
			$this->DrDepartment->EditAttrs["class"] = "form-control";
			$this->DrDepartment->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->DrDepartment->CurrentValue = HtmlDecode($this->DrDepartment->CurrentValue);
			$this->DrDepartment->EditValue = HtmlEncode($this->DrDepartment->CurrentValue);
			$this->DrDepartment->PlaceHolder = RemoveHtml($this->DrDepartment->caption());

			// RefferedBy
			$this->RefferedBy->EditAttrs["class"] = "form-control";
			$this->RefferedBy->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->RefferedBy->CurrentValue = HtmlDecode($this->RefferedBy->CurrentValue);
			$this->RefferedBy->EditValue = HtmlEncode($this->RefferedBy->CurrentValue);
			$this->RefferedBy->PlaceHolder = RemoveHtml($this->RefferedBy->caption());

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

			// DrID
			$this->DrID->EditAttrs["class"] = "form-control";
			$this->DrID->EditCustomAttributes = "";
			$this->DrID->EditValue = HtmlEncode($this->DrID->CurrentValue);
			$this->DrID->PlaceHolder = RemoveHtml($this->DrID->caption());

			// BillStatus
			$this->BillStatus->EditAttrs["class"] = "form-control";
			$this->BillStatus->EditCustomAttributes = "";
			$this->BillStatus->EditValue = HtmlEncode($this->BillStatus->CurrentValue);
			$this->BillStatus->PlaceHolder = RemoveHtml($this->BillStatus->caption());

			// ReportHeader
			$this->ReportHeader->EditAttrs["class"] = "form-control";
			$this->ReportHeader->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->ReportHeader->CurrentValue = HtmlDecode($this->ReportHeader->CurrentValue);
			$this->ReportHeader->EditValue = HtmlEncode($this->ReportHeader->CurrentValue);
			$this->ReportHeader->PlaceHolder = RemoveHtml($this->ReportHeader->caption());

			// UserName
			// AdjustmentAdvance

			$this->AdjustmentAdvance->EditAttrs["class"] = "form-control";
			$this->AdjustmentAdvance->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->AdjustmentAdvance->CurrentValue = HtmlDecode($this->AdjustmentAdvance->CurrentValue);
			$this->AdjustmentAdvance->EditValue = HtmlEncode($this->AdjustmentAdvance->CurrentValue);
			$this->AdjustmentAdvance->PlaceHolder = RemoveHtml($this->AdjustmentAdvance->caption());

			// billing_vouchercol
			$this->billing_vouchercol->EditAttrs["class"] = "form-control";
			$this->billing_vouchercol->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->billing_vouchercol->CurrentValue = HtmlDecode($this->billing_vouchercol->CurrentValue);
			$this->billing_vouchercol->EditValue = HtmlEncode($this->billing_vouchercol->CurrentValue);
			$this->billing_vouchercol->PlaceHolder = RemoveHtml($this->billing_vouchercol->caption());

			// BillType
			$this->BillType->EditAttrs["class"] = "form-control";
			$this->BillType->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->BillType->CurrentValue = HtmlDecode($this->BillType->CurrentValue);
			$this->BillType->EditValue = HtmlEncode($this->BillType->CurrentValue);
			$this->BillType->PlaceHolder = RemoveHtml($this->BillType->caption());

			// ProcedureName
			$this->ProcedureName->EditAttrs["class"] = "form-control";
			$this->ProcedureName->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->ProcedureName->CurrentValue = HtmlDecode($this->ProcedureName->CurrentValue);
			$this->ProcedureName->EditValue = HtmlEncode($this->ProcedureName->CurrentValue);
			$this->ProcedureName->PlaceHolder = RemoveHtml($this->ProcedureName->caption());

			// ProcedureAmount
			$this->ProcedureAmount->EditAttrs["class"] = "form-control";
			$this->ProcedureAmount->EditCustomAttributes = "";
			$this->ProcedureAmount->EditValue = HtmlEncode($this->ProcedureAmount->CurrentValue);
			$this->ProcedureAmount->PlaceHolder = RemoveHtml($this->ProcedureAmount->caption());
			if (strval($this->ProcedureAmount->EditValue) <> "" && is_numeric($this->ProcedureAmount->EditValue))
				$this->ProcedureAmount->EditValue = FormatNumber($this->ProcedureAmount->EditValue, -2, -2, -2, -2);

			// IncludePackage
			$this->IncludePackage->EditAttrs["class"] = "form-control";
			$this->IncludePackage->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->IncludePackage->CurrentValue = HtmlDecode($this->IncludePackage->CurrentValue);
			$this->IncludePackage->EditValue = HtmlEncode($this->IncludePackage->CurrentValue);
			$this->IncludePackage->PlaceHolder = RemoveHtml($this->IncludePackage->caption());

			// CancelBill
			$this->CancelBill->EditAttrs["class"] = "form-control";
			$this->CancelBill->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->CancelBill->CurrentValue = HtmlDecode($this->CancelBill->CurrentValue);
			$this->CancelBill->EditValue = HtmlEncode($this->CancelBill->CurrentValue);
			$this->CancelBill->PlaceHolder = RemoveHtml($this->CancelBill->caption());

			// CancelReason
			$this->CancelReason->EditAttrs["class"] = "form-control";
			$this->CancelReason->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->CancelReason->CurrentValue = HtmlDecode($this->CancelReason->CurrentValue);
			$this->CancelReason->EditValue = HtmlEncode($this->CancelReason->CurrentValue);
			$this->CancelReason->PlaceHolder = RemoveHtml($this->CancelReason->caption());

			// CancelModeOfPayment
			$this->CancelModeOfPayment->EditAttrs["class"] = "form-control";
			$this->CancelModeOfPayment->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->CancelModeOfPayment->CurrentValue = HtmlDecode($this->CancelModeOfPayment->CurrentValue);
			$this->CancelModeOfPayment->EditValue = HtmlEncode($this->CancelModeOfPayment->CurrentValue);
			$this->CancelModeOfPayment->PlaceHolder = RemoveHtml($this->CancelModeOfPayment->caption());

			// CancelAmount
			$this->CancelAmount->EditAttrs["class"] = "form-control";
			$this->CancelAmount->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->CancelAmount->CurrentValue = HtmlDecode($this->CancelAmount->CurrentValue);
			$this->CancelAmount->EditValue = HtmlEncode($this->CancelAmount->CurrentValue);
			$this->CancelAmount->PlaceHolder = RemoveHtml($this->CancelAmount->caption());

			// CancelBankName
			$this->CancelBankName->EditAttrs["class"] = "form-control";
			$this->CancelBankName->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->CancelBankName->CurrentValue = HtmlDecode($this->CancelBankName->CurrentValue);
			$this->CancelBankName->EditValue = HtmlEncode($this->CancelBankName->CurrentValue);
			$this->CancelBankName->PlaceHolder = RemoveHtml($this->CancelBankName->caption());

			// CancelTransactionNumber
			$this->CancelTransactionNumber->EditAttrs["class"] = "form-control";
			$this->CancelTransactionNumber->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->CancelTransactionNumber->CurrentValue = HtmlDecode($this->CancelTransactionNumber->CurrentValue);
			$this->CancelTransactionNumber->EditValue = HtmlEncode($this->CancelTransactionNumber->CurrentValue);
			$this->CancelTransactionNumber->PlaceHolder = RemoveHtml($this->CancelTransactionNumber->caption());

			// LabTest
			$this->LabTest->EditAttrs["class"] = "form-control";
			$this->LabTest->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->LabTest->CurrentValue = HtmlDecode($this->LabTest->CurrentValue);
			$this->LabTest->EditValue = HtmlEncode($this->LabTest->CurrentValue);
			$this->LabTest->PlaceHolder = RemoveHtml($this->LabTest->caption());

			// sid
			$this->sid->EditAttrs["class"] = "form-control";
			$this->sid->EditCustomAttributes = "";
			$this->sid->EditValue = HtmlEncode($this->sid->CurrentValue);
			$this->sid->PlaceHolder = RemoveHtml($this->sid->caption());

			// SidNo
			$this->SidNo->EditAttrs["class"] = "form-control";
			$this->SidNo->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->SidNo->CurrentValue = HtmlDecode($this->SidNo->CurrentValue);
			$this->SidNo->EditValue = HtmlEncode($this->SidNo->CurrentValue);
			$this->SidNo->PlaceHolder = RemoveHtml($this->SidNo->caption());

			// createdDatettime
			// LabTestReleased

			$this->LabTestReleased->EditAttrs["class"] = "form-control";
			$this->LabTestReleased->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->LabTestReleased->CurrentValue = HtmlDecode($this->LabTestReleased->CurrentValue);
			$this->LabTestReleased->EditValue = HtmlEncode($this->LabTestReleased->CurrentValue);
			$this->LabTestReleased->PlaceHolder = RemoveHtml($this->LabTestReleased->caption());

			// GoogleReviewID
			$this->GoogleReviewID->EditAttrs["class"] = "form-control";
			$this->GoogleReviewID->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->GoogleReviewID->CurrentValue = HtmlDecode($this->GoogleReviewID->CurrentValue);
			$this->GoogleReviewID->EditValue = HtmlEncode($this->GoogleReviewID->CurrentValue);
			$this->GoogleReviewID->PlaceHolder = RemoveHtml($this->GoogleReviewID->caption());

			// CardType
			$this->CardType->EditAttrs["class"] = "form-control";
			$this->CardType->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->CardType->CurrentValue = HtmlDecode($this->CardType->CurrentValue);
			$this->CardType->EditValue = HtmlEncode($this->CardType->CurrentValue);
			$this->CardType->PlaceHolder = RemoveHtml($this->CardType->caption());

			// PharmacyBill
			$this->PharmacyBill->EditAttrs["class"] = "form-control";
			$this->PharmacyBill->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->PharmacyBill->CurrentValue = HtmlDecode($this->PharmacyBill->CurrentValue);
			$this->PharmacyBill->EditValue = HtmlEncode($this->PharmacyBill->CurrentValue);
			$this->PharmacyBill->PlaceHolder = RemoveHtml($this->PharmacyBill->caption());

			// DiscountAmount
			$this->DiscountAmount->EditAttrs["class"] = "form-control";
			$this->DiscountAmount->EditCustomAttributes = "";
			$this->DiscountAmount->EditValue = HtmlEncode($this->DiscountAmount->CurrentValue);
			$this->DiscountAmount->PlaceHolder = RemoveHtml($this->DiscountAmount->caption());
			if (strval($this->DiscountAmount->EditValue) <> "" && is_numeric($this->DiscountAmount->EditValue))
				$this->DiscountAmount->EditValue = FormatNumber($this->DiscountAmount->EditValue, -2, -2, -2, -2);

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
			// PatId

			$this->PatId->LinkCustomAttributes = "";
			$this->PatId->HrefValue = "";
			$this->PatId->ExportHrefValue = Barcode()->getHrefValue($this->PatId->CurrentValue, 'QRCODE', 60);

			// Reception
			$this->Reception->LinkCustomAttributes = "";
			$this->Reception->HrefValue = "";
			$this->Reception->ExportHrefValue = Barcode()->getHrefValue($this->Reception->CurrentValue, 'QRCODE', 60);

			// BillNumber
			$this->BillNumber->LinkCustomAttributes = "";
			$this->BillNumber->HrefValue = "";

			// PatientId
			$this->PatientId->LinkCustomAttributes = "";
			$this->PatientId->HrefValue = "";

			// mrnno
			$this->mrnno->LinkCustomAttributes = "";
			$this->mrnno->HrefValue = "";

			// PatientName
			$this->PatientName->LinkCustomAttributes = "";
			$this->PatientName->HrefValue = "";

			// Age
			$this->Age->LinkCustomAttributes = "";
			$this->Age->HrefValue = "";

			// Gender
			$this->Gender->LinkCustomAttributes = "";
			$this->Gender->HrefValue = "";

			// profilePic
			$this->profilePic->LinkCustomAttributes = "";
			$this->profilePic->HrefValue = "";

			// Mobile
			$this->Mobile->LinkCustomAttributes = "";
			$this->Mobile->HrefValue = "";

			// IP_OP
			$this->IP_OP->LinkCustomAttributes = "";
			$this->IP_OP->HrefValue = "";

			// Doctor
			$this->Doctor->LinkCustomAttributes = "";
			$this->Doctor->HrefValue = "";

			// voucher_type
			$this->voucher_type->LinkCustomAttributes = "";
			$this->voucher_type->HrefValue = "";

			// Details
			$this->Details->LinkCustomAttributes = "";
			$this->Details->HrefValue = "";

			// ModeofPayment
			$this->ModeofPayment->LinkCustomAttributes = "";
			$this->ModeofPayment->HrefValue = "";

			// Amount
			$this->Amount->LinkCustomAttributes = "";
			$this->Amount->HrefValue = "";

			// AnyDues
			$this->AnyDues->LinkCustomAttributes = "";
			$this->AnyDues->HrefValue = "";

			// createdby
			$this->createdby->LinkCustomAttributes = "";
			$this->createdby->HrefValue = "";

			// createddatetime
			$this->createddatetime->LinkCustomAttributes = "";
			$this->createddatetime->HrefValue = "";

			// RealizationAmount
			$this->RealizationAmount->LinkCustomAttributes = "";
			$this->RealizationAmount->HrefValue = "";

			// RealizationStatus
			$this->RealizationStatus->LinkCustomAttributes = "";
			$this->RealizationStatus->HrefValue = "";

			// RealizationRemarks
			$this->RealizationRemarks->LinkCustomAttributes = "";
			$this->RealizationRemarks->HrefValue = "";

			// RealizationBatchNo
			$this->RealizationBatchNo->LinkCustomAttributes = "";
			$this->RealizationBatchNo->HrefValue = "";

			// RealizationDate
			$this->RealizationDate->LinkCustomAttributes = "";
			$this->RealizationDate->HrefValue = "";

			// HospID
			$this->HospID->LinkCustomAttributes = "";
			$this->HospID->HrefValue = "";

			// RIDNO
			$this->RIDNO->LinkCustomAttributes = "";
			$this->RIDNO->HrefValue = "";

			// TidNo
			$this->TidNo->LinkCustomAttributes = "";
			$this->TidNo->HrefValue = "";

			// CId
			$this->CId->LinkCustomAttributes = "";
			$this->CId->HrefValue = "";

			// PartnerName
			$this->PartnerName->LinkCustomAttributes = "";
			$this->PartnerName->HrefValue = "";

			// PayerType
			$this->PayerType->LinkCustomAttributes = "";
			$this->PayerType->HrefValue = "";

			// Dob
			$this->Dob->LinkCustomAttributes = "";
			$this->Dob->HrefValue = "";

			// Currency
			$this->Currency->LinkCustomAttributes = "";
			$this->Currency->HrefValue = "";

			// DiscountRemarks
			$this->DiscountRemarks->LinkCustomAttributes = "";
			$this->DiscountRemarks->HrefValue = "";

			// Remarks
			$this->Remarks->LinkCustomAttributes = "";
			$this->Remarks->HrefValue = "";

			// DrDepartment
			$this->DrDepartment->LinkCustomAttributes = "";
			$this->DrDepartment->HrefValue = "";

			// RefferedBy
			$this->RefferedBy->LinkCustomAttributes = "";
			$this->RefferedBy->HrefValue = "";

			// CardNumber
			$this->CardNumber->LinkCustomAttributes = "";
			$this->CardNumber->HrefValue = "";

			// BankName
			$this->BankName->LinkCustomAttributes = "";
			$this->BankName->HrefValue = "";

			// DrID
			$this->DrID->LinkCustomAttributes = "";
			$this->DrID->HrefValue = "";

			// BillStatus
			$this->BillStatus->LinkCustomAttributes = "";
			$this->BillStatus->HrefValue = "";

			// ReportHeader
			$this->ReportHeader->LinkCustomAttributes = "";
			$this->ReportHeader->HrefValue = "";

			// UserName
			$this->UserName->LinkCustomAttributes = "";
			$this->UserName->HrefValue = "";

			// AdjustmentAdvance
			$this->AdjustmentAdvance->LinkCustomAttributes = "";
			$this->AdjustmentAdvance->HrefValue = "";

			// billing_vouchercol
			$this->billing_vouchercol->LinkCustomAttributes = "";
			$this->billing_vouchercol->HrefValue = "";

			// BillType
			$this->BillType->LinkCustomAttributes = "";
			$this->BillType->HrefValue = "";

			// ProcedureName
			$this->ProcedureName->LinkCustomAttributes = "";
			$this->ProcedureName->HrefValue = "";

			// ProcedureAmount
			$this->ProcedureAmount->LinkCustomAttributes = "";
			$this->ProcedureAmount->HrefValue = "";

			// IncludePackage
			$this->IncludePackage->LinkCustomAttributes = "";
			$this->IncludePackage->HrefValue = "";

			// CancelBill
			$this->CancelBill->LinkCustomAttributes = "";
			$this->CancelBill->HrefValue = "";

			// CancelReason
			$this->CancelReason->LinkCustomAttributes = "";
			$this->CancelReason->HrefValue = "";

			// CancelModeOfPayment
			$this->CancelModeOfPayment->LinkCustomAttributes = "";
			$this->CancelModeOfPayment->HrefValue = "";

			// CancelAmount
			$this->CancelAmount->LinkCustomAttributes = "";
			$this->CancelAmount->HrefValue = "";

			// CancelBankName
			$this->CancelBankName->LinkCustomAttributes = "";
			$this->CancelBankName->HrefValue = "";

			// CancelTransactionNumber
			$this->CancelTransactionNumber->LinkCustomAttributes = "";
			$this->CancelTransactionNumber->HrefValue = "";

			// LabTest
			$this->LabTest->LinkCustomAttributes = "";
			$this->LabTest->HrefValue = "";

			// sid
			$this->sid->LinkCustomAttributes = "";
			$this->sid->HrefValue = "";

			// SidNo
			$this->SidNo->LinkCustomAttributes = "";
			$this->SidNo->HrefValue = "";

			// createdDatettime
			$this->createdDatettime->LinkCustomAttributes = "";
			$this->createdDatettime->HrefValue = "";

			// LabTestReleased
			$this->LabTestReleased->LinkCustomAttributes = "";
			$this->LabTestReleased->HrefValue = "";

			// GoogleReviewID
			$this->GoogleReviewID->LinkCustomAttributes = "";
			$this->GoogleReviewID->HrefValue = "";

			// CardType
			$this->CardType->LinkCustomAttributes = "";
			$this->CardType->HrefValue = "";

			// PharmacyBill
			$this->PharmacyBill->LinkCustomAttributes = "";
			$this->PharmacyBill->HrefValue = "";

			// DiscountAmount
			$this->DiscountAmount->LinkCustomAttributes = "";
			$this->DiscountAmount->HrefValue = "";

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
		if ($this->PatId->Required) {
			if (!$this->PatId->IsDetailKey && $this->PatId->FormValue != NULL && $this->PatId->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PatId->caption(), $this->PatId->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->PatId->FormValue)) {
			AddMessage($FormError, $this->PatId->errorMessage());
		}
		if ($this->Reception->Required) {
			if (!$this->Reception->IsDetailKey && $this->Reception->FormValue != NULL && $this->Reception->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Reception->caption(), $this->Reception->RequiredErrorMessage));
			}
		}
		if ($this->BillNumber->Required) {
			if (!$this->BillNumber->IsDetailKey && $this->BillNumber->FormValue != NULL && $this->BillNumber->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->BillNumber->caption(), $this->BillNumber->RequiredErrorMessage));
			}
		}
		if ($this->PatientId->Required) {
			if (!$this->PatientId->IsDetailKey && $this->PatientId->FormValue != NULL && $this->PatientId->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PatientId->caption(), $this->PatientId->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->PatientId->FormValue)) {
			AddMessage($FormError, $this->PatientId->errorMessage());
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
		if ($this->Mobile->Required) {
			if (!$this->Mobile->IsDetailKey && $this->Mobile->FormValue != NULL && $this->Mobile->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Mobile->caption(), $this->Mobile->RequiredErrorMessage));
			}
		}
		if ($this->IP_OP->Required) {
			if (!$this->IP_OP->IsDetailKey && $this->IP_OP->FormValue != NULL && $this->IP_OP->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->IP_OP->caption(), $this->IP_OP->RequiredErrorMessage));
			}
		}
		if ($this->Doctor->Required) {
			if (!$this->Doctor->IsDetailKey && $this->Doctor->FormValue != NULL && $this->Doctor->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Doctor->caption(), $this->Doctor->RequiredErrorMessage));
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
		if (!CheckNumber($this->Amount->FormValue)) {
			AddMessage($FormError, $this->Amount->errorMessage());
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
		if ($this->RealizationAmount->Required) {
			if (!$this->RealizationAmount->IsDetailKey && $this->RealizationAmount->FormValue != NULL && $this->RealizationAmount->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->RealizationAmount->caption(), $this->RealizationAmount->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->RealizationAmount->FormValue)) {
			AddMessage($FormError, $this->RealizationAmount->errorMessage());
		}
		if ($this->RealizationStatus->Required) {
			if (!$this->RealizationStatus->IsDetailKey && $this->RealizationStatus->FormValue != NULL && $this->RealizationStatus->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->RealizationStatus->caption(), $this->RealizationStatus->RequiredErrorMessage));
			}
		}
		if ($this->RealizationRemarks->Required) {
			if (!$this->RealizationRemarks->IsDetailKey && $this->RealizationRemarks->FormValue != NULL && $this->RealizationRemarks->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->RealizationRemarks->caption(), $this->RealizationRemarks->RequiredErrorMessage));
			}
		}
		if ($this->RealizationBatchNo->Required) {
			if (!$this->RealizationBatchNo->IsDetailKey && $this->RealizationBatchNo->FormValue != NULL && $this->RealizationBatchNo->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->RealizationBatchNo->caption(), $this->RealizationBatchNo->RequiredErrorMessage));
			}
		}
		if ($this->RealizationDate->Required) {
			if (!$this->RealizationDate->IsDetailKey && $this->RealizationDate->FormValue != NULL && $this->RealizationDate->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->RealizationDate->caption(), $this->RealizationDate->RequiredErrorMessage));
			}
		}
		if ($this->HospID->Required) {
			if (!$this->HospID->IsDetailKey && $this->HospID->FormValue != NULL && $this->HospID->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->HospID->caption(), $this->HospID->RequiredErrorMessage));
			}
		}
		if ($this->RIDNO->Required) {
			if (!$this->RIDNO->IsDetailKey && $this->RIDNO->FormValue != NULL && $this->RIDNO->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->RIDNO->caption(), $this->RIDNO->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->RIDNO->FormValue)) {
			AddMessage($FormError, $this->RIDNO->errorMessage());
		}
		if ($this->TidNo->Required) {
			if (!$this->TidNo->IsDetailKey && $this->TidNo->FormValue != NULL && $this->TidNo->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->TidNo->caption(), $this->TidNo->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->TidNo->FormValue)) {
			AddMessage($FormError, $this->TidNo->errorMessage());
		}
		if ($this->CId->Required) {
			if (!$this->CId->IsDetailKey && $this->CId->FormValue != NULL && $this->CId->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->CId->caption(), $this->CId->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->CId->FormValue)) {
			AddMessage($FormError, $this->CId->errorMessage());
		}
		if ($this->PartnerName->Required) {
			if (!$this->PartnerName->IsDetailKey && $this->PartnerName->FormValue != NULL && $this->PartnerName->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PartnerName->caption(), $this->PartnerName->RequiredErrorMessage));
			}
		}
		if ($this->PayerType->Required) {
			if (!$this->PayerType->IsDetailKey && $this->PayerType->FormValue != NULL && $this->PayerType->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PayerType->caption(), $this->PayerType->RequiredErrorMessage));
			}
		}
		if ($this->Dob->Required) {
			if (!$this->Dob->IsDetailKey && $this->Dob->FormValue != NULL && $this->Dob->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Dob->caption(), $this->Dob->RequiredErrorMessage));
			}
		}
		if ($this->Currency->Required) {
			if (!$this->Currency->IsDetailKey && $this->Currency->FormValue != NULL && $this->Currency->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Currency->caption(), $this->Currency->RequiredErrorMessage));
			}
		}
		if ($this->DiscountRemarks->Required) {
			if (!$this->DiscountRemarks->IsDetailKey && $this->DiscountRemarks->FormValue != NULL && $this->DiscountRemarks->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->DiscountRemarks->caption(), $this->DiscountRemarks->RequiredErrorMessage));
			}
		}
		if ($this->Remarks->Required) {
			if (!$this->Remarks->IsDetailKey && $this->Remarks->FormValue != NULL && $this->Remarks->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Remarks->caption(), $this->Remarks->RequiredErrorMessage));
			}
		}
		if ($this->DrDepartment->Required) {
			if (!$this->DrDepartment->IsDetailKey && $this->DrDepartment->FormValue != NULL && $this->DrDepartment->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->DrDepartment->caption(), $this->DrDepartment->RequiredErrorMessage));
			}
		}
		if ($this->RefferedBy->Required) {
			if (!$this->RefferedBy->IsDetailKey && $this->RefferedBy->FormValue != NULL && $this->RefferedBy->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->RefferedBy->caption(), $this->RefferedBy->RequiredErrorMessage));
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
		if ($this->DrID->Required) {
			if (!$this->DrID->IsDetailKey && $this->DrID->FormValue != NULL && $this->DrID->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->DrID->caption(), $this->DrID->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->DrID->FormValue)) {
			AddMessage($FormError, $this->DrID->errorMessage());
		}
		if ($this->BillStatus->Required) {
			if (!$this->BillStatus->IsDetailKey && $this->BillStatus->FormValue != NULL && $this->BillStatus->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->BillStatus->caption(), $this->BillStatus->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->BillStatus->FormValue)) {
			AddMessage($FormError, $this->BillStatus->errorMessage());
		}
		if ($this->ReportHeader->Required) {
			if (!$this->ReportHeader->IsDetailKey && $this->ReportHeader->FormValue != NULL && $this->ReportHeader->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->ReportHeader->caption(), $this->ReportHeader->RequiredErrorMessage));
			}
		}
		if ($this->UserName->Required) {
			if (!$this->UserName->IsDetailKey && $this->UserName->FormValue != NULL && $this->UserName->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->UserName->caption(), $this->UserName->RequiredErrorMessage));
			}
		}
		if ($this->AdjustmentAdvance->Required) {
			if (!$this->AdjustmentAdvance->IsDetailKey && $this->AdjustmentAdvance->FormValue != NULL && $this->AdjustmentAdvance->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->AdjustmentAdvance->caption(), $this->AdjustmentAdvance->RequiredErrorMessage));
			}
		}
		if ($this->billing_vouchercol->Required) {
			if (!$this->billing_vouchercol->IsDetailKey && $this->billing_vouchercol->FormValue != NULL && $this->billing_vouchercol->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->billing_vouchercol->caption(), $this->billing_vouchercol->RequiredErrorMessage));
			}
		}
		if ($this->BillType->Required) {
			if (!$this->BillType->IsDetailKey && $this->BillType->FormValue != NULL && $this->BillType->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->BillType->caption(), $this->BillType->RequiredErrorMessage));
			}
		}
		if ($this->ProcedureName->Required) {
			if (!$this->ProcedureName->IsDetailKey && $this->ProcedureName->FormValue != NULL && $this->ProcedureName->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->ProcedureName->caption(), $this->ProcedureName->RequiredErrorMessage));
			}
		}
		if ($this->ProcedureAmount->Required) {
			if (!$this->ProcedureAmount->IsDetailKey && $this->ProcedureAmount->FormValue != NULL && $this->ProcedureAmount->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->ProcedureAmount->caption(), $this->ProcedureAmount->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->ProcedureAmount->FormValue)) {
			AddMessage($FormError, $this->ProcedureAmount->errorMessage());
		}
		if ($this->IncludePackage->Required) {
			if (!$this->IncludePackage->IsDetailKey && $this->IncludePackage->FormValue != NULL && $this->IncludePackage->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->IncludePackage->caption(), $this->IncludePackage->RequiredErrorMessage));
			}
		}
		if ($this->CancelBill->Required) {
			if (!$this->CancelBill->IsDetailKey && $this->CancelBill->FormValue != NULL && $this->CancelBill->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->CancelBill->caption(), $this->CancelBill->RequiredErrorMessage));
			}
		}
		if ($this->CancelReason->Required) {
			if (!$this->CancelReason->IsDetailKey && $this->CancelReason->FormValue != NULL && $this->CancelReason->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->CancelReason->caption(), $this->CancelReason->RequiredErrorMessage));
			}
		}
		if ($this->CancelModeOfPayment->Required) {
			if (!$this->CancelModeOfPayment->IsDetailKey && $this->CancelModeOfPayment->FormValue != NULL && $this->CancelModeOfPayment->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->CancelModeOfPayment->caption(), $this->CancelModeOfPayment->RequiredErrorMessage));
			}
		}
		if ($this->CancelAmount->Required) {
			if (!$this->CancelAmount->IsDetailKey && $this->CancelAmount->FormValue != NULL && $this->CancelAmount->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->CancelAmount->caption(), $this->CancelAmount->RequiredErrorMessage));
			}
		}
		if ($this->CancelBankName->Required) {
			if (!$this->CancelBankName->IsDetailKey && $this->CancelBankName->FormValue != NULL && $this->CancelBankName->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->CancelBankName->caption(), $this->CancelBankName->RequiredErrorMessage));
			}
		}
		if ($this->CancelTransactionNumber->Required) {
			if (!$this->CancelTransactionNumber->IsDetailKey && $this->CancelTransactionNumber->FormValue != NULL && $this->CancelTransactionNumber->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->CancelTransactionNumber->caption(), $this->CancelTransactionNumber->RequiredErrorMessage));
			}
		}
		if ($this->LabTest->Required) {
			if (!$this->LabTest->IsDetailKey && $this->LabTest->FormValue != NULL && $this->LabTest->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->LabTest->caption(), $this->LabTest->RequiredErrorMessage));
			}
		}
		if ($this->sid->Required) {
			if (!$this->sid->IsDetailKey && $this->sid->FormValue != NULL && $this->sid->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->sid->caption(), $this->sid->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->sid->FormValue)) {
			AddMessage($FormError, $this->sid->errorMessage());
		}
		if ($this->SidNo->Required) {
			if (!$this->SidNo->IsDetailKey && $this->SidNo->FormValue != NULL && $this->SidNo->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->SidNo->caption(), $this->SidNo->RequiredErrorMessage));
			}
		}
		if ($this->createdDatettime->Required) {
			if (!$this->createdDatettime->IsDetailKey && $this->createdDatettime->FormValue != NULL && $this->createdDatettime->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->createdDatettime->caption(), $this->createdDatettime->RequiredErrorMessage));
			}
		}
		if ($this->LabTestReleased->Required) {
			if (!$this->LabTestReleased->IsDetailKey && $this->LabTestReleased->FormValue != NULL && $this->LabTestReleased->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->LabTestReleased->caption(), $this->LabTestReleased->RequiredErrorMessage));
			}
		}
		if ($this->GoogleReviewID->Required) {
			if (!$this->GoogleReviewID->IsDetailKey && $this->GoogleReviewID->FormValue != NULL && $this->GoogleReviewID->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->GoogleReviewID->caption(), $this->GoogleReviewID->RequiredErrorMessage));
			}
		}
		if ($this->CardType->Required) {
			if (!$this->CardType->IsDetailKey && $this->CardType->FormValue != NULL && $this->CardType->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->CardType->caption(), $this->CardType->RequiredErrorMessage));
			}
		}
		if ($this->PharmacyBill->Required) {
			if (!$this->PharmacyBill->IsDetailKey && $this->PharmacyBill->FormValue != NULL && $this->PharmacyBill->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PharmacyBill->caption(), $this->PharmacyBill->RequiredErrorMessage));
			}
		}
		if ($this->DiscountAmount->Required) {
			if (!$this->DiscountAmount->IsDetailKey && $this->DiscountAmount->FormValue != NULL && $this->DiscountAmount->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->DiscountAmount->caption(), $this->DiscountAmount->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->DiscountAmount->FormValue)) {
			AddMessage($FormError, $this->DiscountAmount->errorMessage());
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

		// Validate detail grid
		$detailTblVar = explode(",", $this->getCurrentDetailTable());
		if (in_array("patient_services", $detailTblVar) && $GLOBALS["patient_services"]->DetailAdd) {
			if (!isset($GLOBALS["patient_services_grid"]))
				$GLOBALS["patient_services_grid"] = new patient_services_grid(); // Get detail page object
			$GLOBALS["patient_services_grid"]->validateGridForm();
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

		// PatId
		$this->PatId->setDbValueDef($rsnew, $this->PatId->CurrentValue, NULL, FALSE);

		// Reception
		$this->Reception->setDbValueDef($rsnew, $this->Reception->CurrentValue, NULL, FALSE);

		// BillNumber
		$this->BillNumber->setDbValueDef($rsnew, $this->BillNumber->CurrentValue, NULL, FALSE);

		// PatientId
		$this->PatientId->setDbValueDef($rsnew, $this->PatientId->CurrentValue, NULL, FALSE);

		// mrnno
		$this->mrnno->setDbValueDef($rsnew, $this->mrnno->CurrentValue, NULL, FALSE);

		// PatientName
		$this->PatientName->setDbValueDef($rsnew, $this->PatientName->CurrentValue, NULL, FALSE);

		// Age
		$this->Age->setDbValueDef($rsnew, $this->Age->CurrentValue, NULL, FALSE);

		// Gender
		$this->Gender->setDbValueDef($rsnew, $this->Gender->CurrentValue, NULL, FALSE);

		// profilePic
		$this->profilePic->setDbValueDef($rsnew, $this->profilePic->CurrentValue, NULL, FALSE);

		// Mobile
		$this->Mobile->setDbValueDef($rsnew, $this->Mobile->CurrentValue, NULL, FALSE);

		// IP_OP
		$this->IP_OP->setDbValueDef($rsnew, $this->IP_OP->CurrentValue, NULL, FALSE);

		// Doctor
		$this->Doctor->setDbValueDef($rsnew, $this->Doctor->CurrentValue, NULL, FALSE);

		// voucher_type
		$this->voucher_type->setDbValueDef($rsnew, $this->voucher_type->CurrentValue, NULL, FALSE);

		// Details
		$this->Details->setDbValueDef($rsnew, $this->Details->CurrentValue, NULL, FALSE);

		// ModeofPayment
		$this->ModeofPayment->setDbValueDef($rsnew, $this->ModeofPayment->CurrentValue, NULL, FALSE);

		// Amount
		$this->Amount->setDbValueDef($rsnew, $this->Amount->CurrentValue, NULL, FALSE);

		// AnyDues
		$this->AnyDues->setDbValueDef($rsnew, $this->AnyDues->CurrentValue, NULL, FALSE);

		// createdby
		$this->createdby->setDbValueDef($rsnew, CurrentUserName(), NULL);
		$rsnew['createdby'] = &$this->createdby->DbValue;

		// createddatetime
		$this->createddatetime->setDbValueDef($rsnew, CurrentDateTime(), NULL);
		$rsnew['createddatetime'] = &$this->createddatetime->DbValue;

		// RealizationAmount
		$this->RealizationAmount->setDbValueDef($rsnew, $this->RealizationAmount->CurrentValue, NULL, FALSE);

		// RealizationStatus
		$this->RealizationStatus->setDbValueDef($rsnew, $this->RealizationStatus->CurrentValue, NULL, FALSE);

		// RealizationRemarks
		$this->RealizationRemarks->setDbValueDef($rsnew, $this->RealizationRemarks->CurrentValue, NULL, FALSE);

		// RealizationBatchNo
		$this->RealizationBatchNo->setDbValueDef($rsnew, $this->RealizationBatchNo->CurrentValue, NULL, FALSE);

		// RealizationDate
		$this->RealizationDate->setDbValueDef($rsnew, $this->RealizationDate->CurrentValue, NULL, FALSE);

		// HospID
		$this->HospID->setDbValueDef($rsnew, HospitalID(), NULL);
		$rsnew['HospID'] = &$this->HospID->DbValue;

		// RIDNO
		$this->RIDNO->setDbValueDef($rsnew, $this->RIDNO->CurrentValue, NULL, FALSE);

		// TidNo
		$this->TidNo->setDbValueDef($rsnew, $this->TidNo->CurrentValue, NULL, FALSE);

		// CId
		$this->CId->setDbValueDef($rsnew, $this->CId->CurrentValue, NULL, FALSE);

		// PartnerName
		$this->PartnerName->setDbValueDef($rsnew, $this->PartnerName->CurrentValue, NULL, FALSE);

		// PayerType
		$this->PayerType->setDbValueDef($rsnew, $this->PayerType->CurrentValue, NULL, FALSE);

		// Dob
		$this->Dob->setDbValueDef($rsnew, $this->Dob->CurrentValue, NULL, FALSE);

		// Currency
		$this->Currency->setDbValueDef($rsnew, $this->Currency->CurrentValue, NULL, FALSE);

		// DiscountRemarks
		$this->DiscountRemarks->setDbValueDef($rsnew, $this->DiscountRemarks->CurrentValue, NULL, FALSE);

		// Remarks
		$this->Remarks->setDbValueDef($rsnew, $this->Remarks->CurrentValue, NULL, FALSE);

		// DrDepartment
		$this->DrDepartment->setDbValueDef($rsnew, $this->DrDepartment->CurrentValue, NULL, FALSE);

		// RefferedBy
		$this->RefferedBy->setDbValueDef($rsnew, $this->RefferedBy->CurrentValue, NULL, FALSE);

		// CardNumber
		$this->CardNumber->setDbValueDef($rsnew, $this->CardNumber->CurrentValue, NULL, FALSE);

		// BankName
		$this->BankName->setDbValueDef($rsnew, $this->BankName->CurrentValue, NULL, FALSE);

		// DrID
		$this->DrID->setDbValueDef($rsnew, $this->DrID->CurrentValue, NULL, FALSE);

		// BillStatus
		$this->BillStatus->setDbValueDef($rsnew, $this->BillStatus->CurrentValue, NULL, strval($this->BillStatus->CurrentValue) == "");

		// ReportHeader
		$this->ReportHeader->setDbValueDef($rsnew, $this->ReportHeader->CurrentValue, NULL, FALSE);

		// UserName
		$this->UserName->setDbValueDef($rsnew, CurrentUserName(), NULL);
		$rsnew['UserName'] = &$this->UserName->DbValue;

		// AdjustmentAdvance
		$this->AdjustmentAdvance->setDbValueDef($rsnew, $this->AdjustmentAdvance->CurrentValue, NULL, FALSE);

		// billing_vouchercol
		$this->billing_vouchercol->setDbValueDef($rsnew, $this->billing_vouchercol->CurrentValue, NULL, FALSE);

		// BillType
		$this->BillType->setDbValueDef($rsnew, $this->BillType->CurrentValue, NULL, FALSE);

		// ProcedureName
		$this->ProcedureName->setDbValueDef($rsnew, $this->ProcedureName->CurrentValue, NULL, FALSE);

		// ProcedureAmount
		$this->ProcedureAmount->setDbValueDef($rsnew, $this->ProcedureAmount->CurrentValue, NULL, FALSE);

		// IncludePackage
		$this->IncludePackage->setDbValueDef($rsnew, $this->IncludePackage->CurrentValue, NULL, FALSE);

		// CancelBill
		$this->CancelBill->setDbValueDef($rsnew, $this->CancelBill->CurrentValue, NULL, FALSE);

		// CancelReason
		$this->CancelReason->setDbValueDef($rsnew, $this->CancelReason->CurrentValue, NULL, FALSE);

		// CancelModeOfPayment
		$this->CancelModeOfPayment->setDbValueDef($rsnew, $this->CancelModeOfPayment->CurrentValue, NULL, FALSE);

		// CancelAmount
		$this->CancelAmount->setDbValueDef($rsnew, $this->CancelAmount->CurrentValue, NULL, FALSE);

		// CancelBankName
		$this->CancelBankName->setDbValueDef($rsnew, $this->CancelBankName->CurrentValue, NULL, FALSE);

		// CancelTransactionNumber
		$this->CancelTransactionNumber->setDbValueDef($rsnew, $this->CancelTransactionNumber->CurrentValue, NULL, FALSE);

		// LabTest
		$this->LabTest->setDbValueDef($rsnew, $this->LabTest->CurrentValue, NULL, FALSE);

		// sid
		$this->sid->setDbValueDef($rsnew, $this->sid->CurrentValue, NULL, FALSE);

		// SidNo
		$this->SidNo->setDbValueDef($rsnew, $this->SidNo->CurrentValue, NULL, FALSE);

		// createdDatettime
		$this->createdDatettime->setDbValueDef($rsnew, CurrentDateTime(), NULL);
		$rsnew['createdDatettime'] = &$this->createdDatettime->DbValue;

		// LabTestReleased
		$this->LabTestReleased->setDbValueDef($rsnew, $this->LabTestReleased->CurrentValue, NULL, FALSE);

		// GoogleReviewID
		$this->GoogleReviewID->setDbValueDef($rsnew, $this->GoogleReviewID->CurrentValue, NULL, FALSE);

		// CardType
		$this->CardType->setDbValueDef($rsnew, $this->CardType->CurrentValue, NULL, FALSE);

		// PharmacyBill
		$this->PharmacyBill->setDbValueDef($rsnew, $this->PharmacyBill->CurrentValue, NULL, FALSE);

		// DiscountAmount
		$this->DiscountAmount->setDbValueDef($rsnew, $this->DiscountAmount->CurrentValue, NULL, FALSE);

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

		// Add detail records
		if ($addRow) {
			$detailTblVar = explode(",", $this->getCurrentDetailTable());
			if (in_array("patient_services", $detailTblVar) && $GLOBALS["patient_services"]->DetailAdd) {
				$GLOBALS["patient_services"]->Vid->setSessionValue($this->id->CurrentValue); // Set master key
				if (!isset($GLOBALS["patient_services_grid"]))
					$GLOBALS["patient_services_grid"] = new patient_services_grid(); // Get detail page object
				$Security->loadCurrentUserLevel($this->ProjectID . "patient_services"); // Load user level of detail table
				$addRow = $GLOBALS["patient_services_grid"]->gridInsert();
				$Security->loadCurrentUserLevel($this->ProjectID . $this->TableName); // Restore user level of master table
				if (!$addRow)
					$GLOBALS["patient_services"]->Vid->setSessionValue(""); // Clear master key if insert failed
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
			if (in_array("patient_services", $detailTblVar)) {
				if (!isset($GLOBALS["patient_services_grid"]))
					$GLOBALS["patient_services_grid"] = new patient_services_grid();
				if ($GLOBALS["patient_services_grid"]->DetailAdd) {
					if ($this->CopyRecord)
						$GLOBALS["patient_services_grid"]->CurrentMode = "copy";
					else
						$GLOBALS["patient_services_grid"]->CurrentMode = "add";
					if ($this->isConfirm())
						$GLOBALS["patient_services_grid"]->CurrentAction = "confirm";
					else
						$GLOBALS["patient_services_grid"]->CurrentAction = "gridadd";
					if ($this->isCancel())
						$GLOBALS["patient_services_grid"]->EventCancelled = TRUE;

					// Save current master table to detail table
					$GLOBALS["patient_services_grid"]->setCurrentMasterTable($this->TableVar);
					$GLOBALS["patient_services_grid"]->setStartRecordNumber(1);
					$GLOBALS["patient_services_grid"]->Vid->IsDetailKey = TRUE;
					$GLOBALS["patient_services_grid"]->Vid->CurrentValue = $this->id->CurrentValue;
					$GLOBALS["patient_services_grid"]->Vid->setSessionValue($GLOBALS["patient_services_grid"]->Vid->CurrentValue);
					$GLOBALS["patient_services_grid"]->Reception->setSessionValue(""); // Clear session key
					$GLOBALS["patient_services_grid"]->mrnno->setSessionValue(""); // Clear session key
					$GLOBALS["patient_services_grid"]->PatID->setSessionValue(""); // Clear session key
				}
			}
		}
	}

	// Reset detail parms
	protected function resetDetailParms()
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
			if (in_array("patient_services", $detailTblVar)) {
				if (!isset($GLOBALS["patient_services_grid"]))
					$GLOBALS["patient_services_grid"] = new patient_services_grid();
				if ($GLOBALS["patient_services_grid"]->DetailAdd) {
					$GLOBALS["patient_services_grid"]->CurrentAction = "gridadd";
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
		$Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("billing_voucherlist.php"), "", $this->TableVar, TRUE);
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
						case "x_Reception":
							break;
						case "x_Doctor":
							break;
						case "x_voucher_type":
							break;
						case "x_ModeofPayment":
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
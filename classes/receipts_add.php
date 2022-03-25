<?php
namespace PHPMaker2019\HIMS;

/**
 * Page class
 */
class receipts_add extends receipts
{

	// Page ID
	public $PageID = "add";

	// Project ID
	public $ProjectID = "{EA4F6D13-AF8F-428D-9EA7-BA88D1107EC3}";

	// Table name
	public $TableName = 'receipts';

	// Page object name
	public $PageObjName = "receipts_add";

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

		// Table object (receipts)
		if (!isset($GLOBALS["receipts"]) || get_class($GLOBALS["receipts"]) == PROJECT_NAMESPACE . "receipts") {
			$GLOBALS["receipts"] = &$this;
			$GLOBALS["Table"] = &$GLOBALS["receipts"];
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
			define(PROJECT_NAMESPACE . "TABLE_NAME", 'receipts');

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
		global $EXPORT, $receipts;
		if ($this->CustomExport && $this->CustomExport == $this->Export && array_key_exists($this->CustomExport, $EXPORT)) {
				$content = ob_get_contents();
			if ($ExportFileName == "")
				$ExportFileName = $this->TableVar;
			$class = PROJECT_NAMESPACE . $EXPORT[$this->CustomExport];
			if (class_exists($class)) {
				$doc = new $class($receipts);
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
					if ($pageName == "receiptsview.php")
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
					$this->terminate(GetUrl("receiptslist.php"));
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
		$this->Aid->setVisibility();
		$this->Vid->setVisibility();
		$this->patient_id->setVisibility();
		$this->mrnno->setVisibility();
		$this->PatientName->setVisibility();
		$this->amount->setVisibility();
		$this->Discount->setVisibility();
		$this->SubTotal->setVisibility();
		$this->patient_type->setVisibility();
		$this->invoiceId->setVisibility();
		$this->invoiceAmount->setVisibility();
		$this->invoiceStatus->setVisibility();
		$this->modeOfPayment->setVisibility();
		$this->charged_date->setVisibility();
		$this->status->setVisibility();
		$this->createdby->setVisibility();
		$this->createddatetime->setVisibility();
		$this->modifiedby->setVisibility();
		$this->modifieddatetime->setVisibility();
		$this->ChequeCardNo->setVisibility();
		$this->CreditBankName->setVisibility();
		$this->CreditCardHolder->setVisibility();
		$this->CreditCardType->setVisibility();
		$this->CreditCardMachine->setVisibility();
		$this->CreditCardBatchNo->setVisibility();
		$this->CreditCardTax->setVisibility();
		$this->CreditDeductionAmount->setVisibility();
		$this->RealizationAmount->setVisibility();
		$this->RealizationStatus->setVisibility();
		$this->RealizationRemarks->setVisibility();
		$this->RealizationBatchNo->setVisibility();
		$this->RealizationDate->setVisibility();
		$this->BankAccHolderMobileNumber->setVisibility();
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
					$this->terminate("receiptslist.php"); // No matching record, return to list
				}
				break;
			case "insert": // Add new record
				$this->SendEmail = TRUE; // Send email on add success
				if ($this->addRow($this->OldRecordset)) { // Add successful
					if ($this->getSuccessMessage() == "")
						$this->setSuccessMessage($Language->phrase("AddSuccess")); // Set up success message
					$returnUrl = $this->getReturnUrl();
					if (GetPageName($returnUrl) == "receiptslist.php")
						$returnUrl = $this->addMasterUrl($returnUrl); // List page, return to List page with correct master key if necessary
					elseif (GetPageName($returnUrl) == "receiptsview.php")
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
		$this->Aid->CurrentValue = NULL;
		$this->Aid->OldValue = $this->Aid->CurrentValue;
		$this->Vid->CurrentValue = NULL;
		$this->Vid->OldValue = $this->Vid->CurrentValue;
		$this->patient_id->CurrentValue = NULL;
		$this->patient_id->OldValue = $this->patient_id->CurrentValue;
		$this->mrnno->CurrentValue = NULL;
		$this->mrnno->OldValue = $this->mrnno->CurrentValue;
		$this->PatientName->CurrentValue = NULL;
		$this->PatientName->OldValue = $this->PatientName->CurrentValue;
		$this->amount->CurrentValue = NULL;
		$this->amount->OldValue = $this->amount->CurrentValue;
		$this->Discount->CurrentValue = NULL;
		$this->Discount->OldValue = $this->Discount->CurrentValue;
		$this->SubTotal->CurrentValue = NULL;
		$this->SubTotal->OldValue = $this->SubTotal->CurrentValue;
		$this->patient_type->CurrentValue = NULL;
		$this->patient_type->OldValue = $this->patient_type->CurrentValue;
		$this->invoiceId->CurrentValue = NULL;
		$this->invoiceId->OldValue = $this->invoiceId->CurrentValue;
		$this->invoiceAmount->CurrentValue = NULL;
		$this->invoiceAmount->OldValue = $this->invoiceAmount->CurrentValue;
		$this->invoiceStatus->CurrentValue = NULL;
		$this->invoiceStatus->OldValue = $this->invoiceStatus->CurrentValue;
		$this->modeOfPayment->CurrentValue = NULL;
		$this->modeOfPayment->OldValue = $this->modeOfPayment->CurrentValue;
		$this->charged_date->CurrentValue = NULL;
		$this->charged_date->OldValue = $this->charged_date->CurrentValue;
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
		$this->ChequeCardNo->CurrentValue = NULL;
		$this->ChequeCardNo->OldValue = $this->ChequeCardNo->CurrentValue;
		$this->CreditBankName->CurrentValue = NULL;
		$this->CreditBankName->OldValue = $this->CreditBankName->CurrentValue;
		$this->CreditCardHolder->CurrentValue = NULL;
		$this->CreditCardHolder->OldValue = $this->CreditCardHolder->CurrentValue;
		$this->CreditCardType->CurrentValue = NULL;
		$this->CreditCardType->OldValue = $this->CreditCardType->CurrentValue;
		$this->CreditCardMachine->CurrentValue = NULL;
		$this->CreditCardMachine->OldValue = $this->CreditCardMachine->CurrentValue;
		$this->CreditCardBatchNo->CurrentValue = NULL;
		$this->CreditCardBatchNo->OldValue = $this->CreditCardBatchNo->CurrentValue;
		$this->CreditCardTax->CurrentValue = NULL;
		$this->CreditCardTax->OldValue = $this->CreditCardTax->CurrentValue;
		$this->CreditDeductionAmount->CurrentValue = NULL;
		$this->CreditDeductionAmount->OldValue = $this->CreditDeductionAmount->CurrentValue;
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
		$this->BankAccHolderMobileNumber->CurrentValue = NULL;
		$this->BankAccHolderMobileNumber->OldValue = $this->BankAccHolderMobileNumber->CurrentValue;
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

		// Check field name 'Aid' first before field var 'x_Aid'
		$val = $CurrentForm->hasValue("Aid") ? $CurrentForm->getValue("Aid") : $CurrentForm->getValue("x_Aid");
		if (!$this->Aid->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Aid->Visible = FALSE; // Disable update for API request
			else
				$this->Aid->setFormValue($val);
		}

		// Check field name 'Vid' first before field var 'x_Vid'
		$val = $CurrentForm->hasValue("Vid") ? $CurrentForm->getValue("Vid") : $CurrentForm->getValue("x_Vid");
		if (!$this->Vid->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Vid->Visible = FALSE; // Disable update for API request
			else
				$this->Vid->setFormValue($val);
		}

		// Check field name 'patient_id' first before field var 'x_patient_id'
		$val = $CurrentForm->hasValue("patient_id") ? $CurrentForm->getValue("patient_id") : $CurrentForm->getValue("x_patient_id");
		if (!$this->patient_id->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->patient_id->Visible = FALSE; // Disable update for API request
			else
				$this->patient_id->setFormValue($val);
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

		// Check field name 'amount' first before field var 'x_amount'
		$val = $CurrentForm->hasValue("amount") ? $CurrentForm->getValue("amount") : $CurrentForm->getValue("x_amount");
		if (!$this->amount->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->amount->Visible = FALSE; // Disable update for API request
			else
				$this->amount->setFormValue($val);
		}

		// Check field name 'Discount' first before field var 'x_Discount'
		$val = $CurrentForm->hasValue("Discount") ? $CurrentForm->getValue("Discount") : $CurrentForm->getValue("x_Discount");
		if (!$this->Discount->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Discount->Visible = FALSE; // Disable update for API request
			else
				$this->Discount->setFormValue($val);
		}

		// Check field name 'SubTotal' first before field var 'x_SubTotal'
		$val = $CurrentForm->hasValue("SubTotal") ? $CurrentForm->getValue("SubTotal") : $CurrentForm->getValue("x_SubTotal");
		if (!$this->SubTotal->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->SubTotal->Visible = FALSE; // Disable update for API request
			else
				$this->SubTotal->setFormValue($val);
		}

		// Check field name 'patient_type' first before field var 'x_patient_type'
		$val = $CurrentForm->hasValue("patient_type") ? $CurrentForm->getValue("patient_type") : $CurrentForm->getValue("x_patient_type");
		if (!$this->patient_type->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->patient_type->Visible = FALSE; // Disable update for API request
			else
				$this->patient_type->setFormValue($val);
		}

		// Check field name 'invoiceId' first before field var 'x_invoiceId'
		$val = $CurrentForm->hasValue("invoiceId") ? $CurrentForm->getValue("invoiceId") : $CurrentForm->getValue("x_invoiceId");
		if (!$this->invoiceId->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->invoiceId->Visible = FALSE; // Disable update for API request
			else
				$this->invoiceId->setFormValue($val);
		}

		// Check field name 'invoiceAmount' first before field var 'x_invoiceAmount'
		$val = $CurrentForm->hasValue("invoiceAmount") ? $CurrentForm->getValue("invoiceAmount") : $CurrentForm->getValue("x_invoiceAmount");
		if (!$this->invoiceAmount->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->invoiceAmount->Visible = FALSE; // Disable update for API request
			else
				$this->invoiceAmount->setFormValue($val);
		}

		// Check field name 'invoiceStatus' first before field var 'x_invoiceStatus'
		$val = $CurrentForm->hasValue("invoiceStatus") ? $CurrentForm->getValue("invoiceStatus") : $CurrentForm->getValue("x_invoiceStatus");
		if (!$this->invoiceStatus->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->invoiceStatus->Visible = FALSE; // Disable update for API request
			else
				$this->invoiceStatus->setFormValue($val);
		}

		// Check field name 'modeOfPayment' first before field var 'x_modeOfPayment'
		$val = $CurrentForm->hasValue("modeOfPayment") ? $CurrentForm->getValue("modeOfPayment") : $CurrentForm->getValue("x_modeOfPayment");
		if (!$this->modeOfPayment->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->modeOfPayment->Visible = FALSE; // Disable update for API request
			else
				$this->modeOfPayment->setFormValue($val);
		}

		// Check field name 'charged_date' first before field var 'x_charged_date'
		$val = $CurrentForm->hasValue("charged_date") ? $CurrentForm->getValue("charged_date") : $CurrentForm->getValue("x_charged_date");
		if (!$this->charged_date->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->charged_date->Visible = FALSE; // Disable update for API request
			else
				$this->charged_date->setFormValue($val);
			$this->charged_date->CurrentValue = UnFormatDateTime($this->charged_date->CurrentValue, 0);
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

		// Check field name 'ChequeCardNo' first before field var 'x_ChequeCardNo'
		$val = $CurrentForm->hasValue("ChequeCardNo") ? $CurrentForm->getValue("ChequeCardNo") : $CurrentForm->getValue("x_ChequeCardNo");
		if (!$this->ChequeCardNo->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->ChequeCardNo->Visible = FALSE; // Disable update for API request
			else
				$this->ChequeCardNo->setFormValue($val);
		}

		// Check field name 'CreditBankName' first before field var 'x_CreditBankName'
		$val = $CurrentForm->hasValue("CreditBankName") ? $CurrentForm->getValue("CreditBankName") : $CurrentForm->getValue("x_CreditBankName");
		if (!$this->CreditBankName->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->CreditBankName->Visible = FALSE; // Disable update for API request
			else
				$this->CreditBankName->setFormValue($val);
		}

		// Check field name 'CreditCardHolder' first before field var 'x_CreditCardHolder'
		$val = $CurrentForm->hasValue("CreditCardHolder") ? $CurrentForm->getValue("CreditCardHolder") : $CurrentForm->getValue("x_CreditCardHolder");
		if (!$this->CreditCardHolder->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->CreditCardHolder->Visible = FALSE; // Disable update for API request
			else
				$this->CreditCardHolder->setFormValue($val);
		}

		// Check field name 'CreditCardType' first before field var 'x_CreditCardType'
		$val = $CurrentForm->hasValue("CreditCardType") ? $CurrentForm->getValue("CreditCardType") : $CurrentForm->getValue("x_CreditCardType");
		if (!$this->CreditCardType->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->CreditCardType->Visible = FALSE; // Disable update for API request
			else
				$this->CreditCardType->setFormValue($val);
		}

		// Check field name 'CreditCardMachine' first before field var 'x_CreditCardMachine'
		$val = $CurrentForm->hasValue("CreditCardMachine") ? $CurrentForm->getValue("CreditCardMachine") : $CurrentForm->getValue("x_CreditCardMachine");
		if (!$this->CreditCardMachine->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->CreditCardMachine->Visible = FALSE; // Disable update for API request
			else
				$this->CreditCardMachine->setFormValue($val);
		}

		// Check field name 'CreditCardBatchNo' first before field var 'x_CreditCardBatchNo'
		$val = $CurrentForm->hasValue("CreditCardBatchNo") ? $CurrentForm->getValue("CreditCardBatchNo") : $CurrentForm->getValue("x_CreditCardBatchNo");
		if (!$this->CreditCardBatchNo->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->CreditCardBatchNo->Visible = FALSE; // Disable update for API request
			else
				$this->CreditCardBatchNo->setFormValue($val);
		}

		// Check field name 'CreditCardTax' first before field var 'x_CreditCardTax'
		$val = $CurrentForm->hasValue("CreditCardTax") ? $CurrentForm->getValue("CreditCardTax") : $CurrentForm->getValue("x_CreditCardTax");
		if (!$this->CreditCardTax->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->CreditCardTax->Visible = FALSE; // Disable update for API request
			else
				$this->CreditCardTax->setFormValue($val);
		}

		// Check field name 'CreditDeductionAmount' first before field var 'x_CreditDeductionAmount'
		$val = $CurrentForm->hasValue("CreditDeductionAmount") ? $CurrentForm->getValue("CreditDeductionAmount") : $CurrentForm->getValue("x_CreditDeductionAmount");
		if (!$this->CreditDeductionAmount->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->CreditDeductionAmount->Visible = FALSE; // Disable update for API request
			else
				$this->CreditDeductionAmount->setFormValue($val);
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

		// Check field name 'BankAccHolderMobileNumber' first before field var 'x_BankAccHolderMobileNumber'
		$val = $CurrentForm->hasValue("BankAccHolderMobileNumber") ? $CurrentForm->getValue("BankAccHolderMobileNumber") : $CurrentForm->getValue("x_BankAccHolderMobileNumber");
		if (!$this->BankAccHolderMobileNumber->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->BankAccHolderMobileNumber->Visible = FALSE; // Disable update for API request
			else
				$this->BankAccHolderMobileNumber->setFormValue($val);
		}

		// Check field name 'id' first before field var 'x_id'
		$val = $CurrentForm->hasValue("id") ? $CurrentForm->getValue("id") : $CurrentForm->getValue("x_id");
	}

	// Restore form values
	public function restoreFormValues()
	{
		global $CurrentForm;
		$this->Reception->CurrentValue = $this->Reception->FormValue;
		$this->Aid->CurrentValue = $this->Aid->FormValue;
		$this->Vid->CurrentValue = $this->Vid->FormValue;
		$this->patient_id->CurrentValue = $this->patient_id->FormValue;
		$this->mrnno->CurrentValue = $this->mrnno->FormValue;
		$this->PatientName->CurrentValue = $this->PatientName->FormValue;
		$this->amount->CurrentValue = $this->amount->FormValue;
		$this->Discount->CurrentValue = $this->Discount->FormValue;
		$this->SubTotal->CurrentValue = $this->SubTotal->FormValue;
		$this->patient_type->CurrentValue = $this->patient_type->FormValue;
		$this->invoiceId->CurrentValue = $this->invoiceId->FormValue;
		$this->invoiceAmount->CurrentValue = $this->invoiceAmount->FormValue;
		$this->invoiceStatus->CurrentValue = $this->invoiceStatus->FormValue;
		$this->modeOfPayment->CurrentValue = $this->modeOfPayment->FormValue;
		$this->charged_date->CurrentValue = $this->charged_date->FormValue;
		$this->charged_date->CurrentValue = UnFormatDateTime($this->charged_date->CurrentValue, 0);
		$this->status->CurrentValue = $this->status->FormValue;
		$this->createdby->CurrentValue = $this->createdby->FormValue;
		$this->createddatetime->CurrentValue = $this->createddatetime->FormValue;
		$this->createddatetime->CurrentValue = UnFormatDateTime($this->createddatetime->CurrentValue, 0);
		$this->modifiedby->CurrentValue = $this->modifiedby->FormValue;
		$this->modifieddatetime->CurrentValue = $this->modifieddatetime->FormValue;
		$this->modifieddatetime->CurrentValue = UnFormatDateTime($this->modifieddatetime->CurrentValue, 0);
		$this->ChequeCardNo->CurrentValue = $this->ChequeCardNo->FormValue;
		$this->CreditBankName->CurrentValue = $this->CreditBankName->FormValue;
		$this->CreditCardHolder->CurrentValue = $this->CreditCardHolder->FormValue;
		$this->CreditCardType->CurrentValue = $this->CreditCardType->FormValue;
		$this->CreditCardMachine->CurrentValue = $this->CreditCardMachine->FormValue;
		$this->CreditCardBatchNo->CurrentValue = $this->CreditCardBatchNo->FormValue;
		$this->CreditCardTax->CurrentValue = $this->CreditCardTax->FormValue;
		$this->CreditDeductionAmount->CurrentValue = $this->CreditDeductionAmount->FormValue;
		$this->RealizationAmount->CurrentValue = $this->RealizationAmount->FormValue;
		$this->RealizationStatus->CurrentValue = $this->RealizationStatus->FormValue;
		$this->RealizationRemarks->CurrentValue = $this->RealizationRemarks->FormValue;
		$this->RealizationBatchNo->CurrentValue = $this->RealizationBatchNo->FormValue;
		$this->RealizationDate->CurrentValue = $this->RealizationDate->FormValue;
		$this->BankAccHolderMobileNumber->CurrentValue = $this->BankAccHolderMobileNumber->FormValue;
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
		$this->Aid->setDbValue($row['Aid']);
		$this->Vid->setDbValue($row['Vid']);
		$this->patient_id->setDbValue($row['patient_id']);
		$this->mrnno->setDbValue($row['mrnno']);
		$this->PatientName->setDbValue($row['PatientName']);
		$this->amount->setDbValue($row['amount']);
		$this->Discount->setDbValue($row['Discount']);
		$this->SubTotal->setDbValue($row['SubTotal']);
		$this->patient_type->setDbValue($row['patient_type']);
		$this->invoiceId->setDbValue($row['invoiceId']);
		$this->invoiceAmount->setDbValue($row['invoiceAmount']);
		$this->invoiceStatus->setDbValue($row['invoiceStatus']);
		$this->modeOfPayment->setDbValue($row['modeOfPayment']);
		$this->charged_date->setDbValue($row['charged_date']);
		$this->status->setDbValue($row['status']);
		$this->createdby->setDbValue($row['createdby']);
		$this->createddatetime->setDbValue($row['createddatetime']);
		$this->modifiedby->setDbValue($row['modifiedby']);
		$this->modifieddatetime->setDbValue($row['modifieddatetime']);
		$this->ChequeCardNo->setDbValue($row['ChequeCardNo']);
		$this->CreditBankName->setDbValue($row['CreditBankName']);
		$this->CreditCardHolder->setDbValue($row['CreditCardHolder']);
		$this->CreditCardType->setDbValue($row['CreditCardType']);
		$this->CreditCardMachine->setDbValue($row['CreditCardMachine']);
		$this->CreditCardBatchNo->setDbValue($row['CreditCardBatchNo']);
		$this->CreditCardTax->setDbValue($row['CreditCardTax']);
		$this->CreditDeductionAmount->setDbValue($row['CreditDeductionAmount']);
		$this->RealizationAmount->setDbValue($row['RealizationAmount']);
		$this->RealizationStatus->setDbValue($row['RealizationStatus']);
		$this->RealizationRemarks->setDbValue($row['RealizationRemarks']);
		$this->RealizationBatchNo->setDbValue($row['RealizationBatchNo']);
		$this->RealizationDate->setDbValue($row['RealizationDate']);
		$this->BankAccHolderMobileNumber->setDbValue($row['BankAccHolderMobileNumber']);
	}

	// Return a row with default values
	protected function newRow()
	{
		$this->loadDefaultValues();
		$row = [];
		$row['id'] = $this->id->CurrentValue;
		$row['Reception'] = $this->Reception->CurrentValue;
		$row['Aid'] = $this->Aid->CurrentValue;
		$row['Vid'] = $this->Vid->CurrentValue;
		$row['patient_id'] = $this->patient_id->CurrentValue;
		$row['mrnno'] = $this->mrnno->CurrentValue;
		$row['PatientName'] = $this->PatientName->CurrentValue;
		$row['amount'] = $this->amount->CurrentValue;
		$row['Discount'] = $this->Discount->CurrentValue;
		$row['SubTotal'] = $this->SubTotal->CurrentValue;
		$row['patient_type'] = $this->patient_type->CurrentValue;
		$row['invoiceId'] = $this->invoiceId->CurrentValue;
		$row['invoiceAmount'] = $this->invoiceAmount->CurrentValue;
		$row['invoiceStatus'] = $this->invoiceStatus->CurrentValue;
		$row['modeOfPayment'] = $this->modeOfPayment->CurrentValue;
		$row['charged_date'] = $this->charged_date->CurrentValue;
		$row['status'] = $this->status->CurrentValue;
		$row['createdby'] = $this->createdby->CurrentValue;
		$row['createddatetime'] = $this->createddatetime->CurrentValue;
		$row['modifiedby'] = $this->modifiedby->CurrentValue;
		$row['modifieddatetime'] = $this->modifieddatetime->CurrentValue;
		$row['ChequeCardNo'] = $this->ChequeCardNo->CurrentValue;
		$row['CreditBankName'] = $this->CreditBankName->CurrentValue;
		$row['CreditCardHolder'] = $this->CreditCardHolder->CurrentValue;
		$row['CreditCardType'] = $this->CreditCardType->CurrentValue;
		$row['CreditCardMachine'] = $this->CreditCardMachine->CurrentValue;
		$row['CreditCardBatchNo'] = $this->CreditCardBatchNo->CurrentValue;
		$row['CreditCardTax'] = $this->CreditCardTax->CurrentValue;
		$row['CreditDeductionAmount'] = $this->CreditDeductionAmount->CurrentValue;
		$row['RealizationAmount'] = $this->RealizationAmount->CurrentValue;
		$row['RealizationStatus'] = $this->RealizationStatus->CurrentValue;
		$row['RealizationRemarks'] = $this->RealizationRemarks->CurrentValue;
		$row['RealizationBatchNo'] = $this->RealizationBatchNo->CurrentValue;
		$row['RealizationDate'] = $this->RealizationDate->CurrentValue;
		$row['BankAccHolderMobileNumber'] = $this->BankAccHolderMobileNumber->CurrentValue;
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

		if ($this->amount->FormValue == $this->amount->CurrentValue && is_numeric(ConvertToFloatString($this->amount->CurrentValue)))
			$this->amount->CurrentValue = ConvertToFloatString($this->amount->CurrentValue);

		// Convert decimal values if posted back
		if ($this->Discount->FormValue == $this->Discount->CurrentValue && is_numeric(ConvertToFloatString($this->Discount->CurrentValue)))
			$this->Discount->CurrentValue = ConvertToFloatString($this->Discount->CurrentValue);

		// Convert decimal values if posted back
		if ($this->SubTotal->FormValue == $this->SubTotal->CurrentValue && is_numeric(ConvertToFloatString($this->SubTotal->CurrentValue)))
			$this->SubTotal->CurrentValue = ConvertToFloatString($this->SubTotal->CurrentValue);

		// Convert decimal values if posted back
		if ($this->invoiceAmount->FormValue == $this->invoiceAmount->CurrentValue && is_numeric(ConvertToFloatString($this->invoiceAmount->CurrentValue)))
			$this->invoiceAmount->CurrentValue = ConvertToFloatString($this->invoiceAmount->CurrentValue);

		// Call Row_Rendering event
		$this->Row_Rendering();

		// Common render codes for all row types
		// id
		// Reception
		// Aid
		// Vid
		// patient_id
		// mrnno
		// PatientName
		// amount
		// Discount
		// SubTotal
		// patient_type
		// invoiceId
		// invoiceAmount
		// invoiceStatus
		// modeOfPayment
		// charged_date
		// status
		// createdby
		// createddatetime
		// modifiedby
		// modifieddatetime
		// ChequeCardNo
		// CreditBankName
		// CreditCardHolder
		// CreditCardType
		// CreditCardMachine
		// CreditCardBatchNo
		// CreditCardTax
		// CreditDeductionAmount
		// RealizationAmount
		// RealizationStatus
		// RealizationRemarks
		// RealizationBatchNo
		// RealizationDate
		// BankAccHolderMobileNumber

		if ($this->RowType == ROWTYPE_VIEW) { // View row

			// id
			$this->id->ViewValue = $this->id->CurrentValue;
			$this->id->ViewCustomAttributes = "";

			// Reception
			$this->Reception->ViewValue = $this->Reception->CurrentValue;
			$this->Reception->ViewValue = FormatNumber($this->Reception->ViewValue, 0, -2, -2, -2);
			$this->Reception->ViewCustomAttributes = "";

			// Aid
			$this->Aid->ViewValue = $this->Aid->CurrentValue;
			$this->Aid->ViewValue = FormatNumber($this->Aid->ViewValue, 0, -2, -2, -2);
			$this->Aid->ViewCustomAttributes = "";

			// Vid
			$this->Vid->ViewValue = $this->Vid->CurrentValue;
			$this->Vid->ViewValue = FormatNumber($this->Vid->ViewValue, 0, -2, -2, -2);
			$this->Vid->ViewCustomAttributes = "";

			// patient_id
			$this->patient_id->ViewValue = $this->patient_id->CurrentValue;
			$this->patient_id->ViewValue = FormatNumber($this->patient_id->ViewValue, 0, -2, -2, -2);
			$this->patient_id->ViewCustomAttributes = "";

			// mrnno
			$this->mrnno->ViewValue = $this->mrnno->CurrentValue;
			$this->mrnno->ViewCustomAttributes = "";

			// PatientName
			$this->PatientName->ViewValue = $this->PatientName->CurrentValue;
			$this->PatientName->ViewCustomAttributes = "";

			// amount
			$this->amount->ViewValue = $this->amount->CurrentValue;
			$this->amount->ViewValue = FormatNumber($this->amount->ViewValue, 2, -2, -2, -2);
			$this->amount->ViewCustomAttributes = "";

			// Discount
			$this->Discount->ViewValue = $this->Discount->CurrentValue;
			$this->Discount->ViewValue = FormatNumber($this->Discount->ViewValue, 2, -2, -2, -2);
			$this->Discount->ViewCustomAttributes = "";

			// SubTotal
			$this->SubTotal->ViewValue = $this->SubTotal->CurrentValue;
			$this->SubTotal->ViewValue = FormatNumber($this->SubTotal->ViewValue, 2, -2, -2, -2);
			$this->SubTotal->ViewCustomAttributes = "";

			// patient_type
			$this->patient_type->ViewValue = $this->patient_type->CurrentValue;
			$this->patient_type->ViewValue = FormatNumber($this->patient_type->ViewValue, 0, -2, -2, -2);
			$this->patient_type->ViewCustomAttributes = "";

			// invoiceId
			$this->invoiceId->ViewValue = $this->invoiceId->CurrentValue;
			$this->invoiceId->ViewValue = FormatNumber($this->invoiceId->ViewValue, 0, -2, -2, -2);
			$this->invoiceId->ViewCustomAttributes = "";

			// invoiceAmount
			$this->invoiceAmount->ViewValue = $this->invoiceAmount->CurrentValue;
			$this->invoiceAmount->ViewValue = FormatNumber($this->invoiceAmount->ViewValue, 2, -2, -2, -2);
			$this->invoiceAmount->ViewCustomAttributes = "";

			// invoiceStatus
			$this->invoiceStatus->ViewValue = $this->invoiceStatus->CurrentValue;
			$this->invoiceStatus->ViewCustomAttributes = "";

			// modeOfPayment
			$this->modeOfPayment->ViewValue = $this->modeOfPayment->CurrentValue;
			$this->modeOfPayment->ViewCustomAttributes = "";

			// charged_date
			$this->charged_date->ViewValue = $this->charged_date->CurrentValue;
			$this->charged_date->ViewValue = FormatDateTime($this->charged_date->ViewValue, 0);
			$this->charged_date->ViewCustomAttributes = "";

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

			// ChequeCardNo
			$this->ChequeCardNo->ViewValue = $this->ChequeCardNo->CurrentValue;
			$this->ChequeCardNo->ViewCustomAttributes = "";

			// CreditBankName
			$this->CreditBankName->ViewValue = $this->CreditBankName->CurrentValue;
			$this->CreditBankName->ViewCustomAttributes = "";

			// CreditCardHolder
			$this->CreditCardHolder->ViewValue = $this->CreditCardHolder->CurrentValue;
			$this->CreditCardHolder->ViewCustomAttributes = "";

			// CreditCardType
			$this->CreditCardType->ViewValue = $this->CreditCardType->CurrentValue;
			$this->CreditCardType->ViewCustomAttributes = "";

			// CreditCardMachine
			$this->CreditCardMachine->ViewValue = $this->CreditCardMachine->CurrentValue;
			$this->CreditCardMachine->ViewCustomAttributes = "";

			// CreditCardBatchNo
			$this->CreditCardBatchNo->ViewValue = $this->CreditCardBatchNo->CurrentValue;
			$this->CreditCardBatchNo->ViewCustomAttributes = "";

			// CreditCardTax
			$this->CreditCardTax->ViewValue = $this->CreditCardTax->CurrentValue;
			$this->CreditCardTax->ViewCustomAttributes = "";

			// CreditDeductionAmount
			$this->CreditDeductionAmount->ViewValue = $this->CreditDeductionAmount->CurrentValue;
			$this->CreditDeductionAmount->ViewCustomAttributes = "";

			// RealizationAmount
			$this->RealizationAmount->ViewValue = $this->RealizationAmount->CurrentValue;
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

			// BankAccHolderMobileNumber
			$this->BankAccHolderMobileNumber->ViewValue = $this->BankAccHolderMobileNumber->CurrentValue;
			$this->BankAccHolderMobileNumber->ViewCustomAttributes = "";

			// Reception
			$this->Reception->LinkCustomAttributes = "";
			$this->Reception->HrefValue = "";
			$this->Reception->TooltipValue = "";

			// Aid
			$this->Aid->LinkCustomAttributes = "";
			$this->Aid->HrefValue = "";
			$this->Aid->TooltipValue = "";

			// Vid
			$this->Vid->LinkCustomAttributes = "";
			$this->Vid->HrefValue = "";
			$this->Vid->TooltipValue = "";

			// patient_id
			$this->patient_id->LinkCustomAttributes = "";
			$this->patient_id->HrefValue = "";
			$this->patient_id->TooltipValue = "";

			// mrnno
			$this->mrnno->LinkCustomAttributes = "";
			$this->mrnno->HrefValue = "";
			$this->mrnno->TooltipValue = "";

			// PatientName
			$this->PatientName->LinkCustomAttributes = "";
			$this->PatientName->HrefValue = "";
			$this->PatientName->TooltipValue = "";

			// amount
			$this->amount->LinkCustomAttributes = "";
			$this->amount->HrefValue = "";
			$this->amount->TooltipValue = "";

			// Discount
			$this->Discount->LinkCustomAttributes = "";
			$this->Discount->HrefValue = "";
			$this->Discount->TooltipValue = "";

			// SubTotal
			$this->SubTotal->LinkCustomAttributes = "";
			$this->SubTotal->HrefValue = "";
			$this->SubTotal->TooltipValue = "";

			// patient_type
			$this->patient_type->LinkCustomAttributes = "";
			$this->patient_type->HrefValue = "";
			$this->patient_type->TooltipValue = "";

			// invoiceId
			$this->invoiceId->LinkCustomAttributes = "";
			$this->invoiceId->HrefValue = "";
			$this->invoiceId->TooltipValue = "";

			// invoiceAmount
			$this->invoiceAmount->LinkCustomAttributes = "";
			$this->invoiceAmount->HrefValue = "";
			$this->invoiceAmount->TooltipValue = "";

			// invoiceStatus
			$this->invoiceStatus->LinkCustomAttributes = "";
			$this->invoiceStatus->HrefValue = "";
			$this->invoiceStatus->TooltipValue = "";

			// modeOfPayment
			$this->modeOfPayment->LinkCustomAttributes = "";
			$this->modeOfPayment->HrefValue = "";
			$this->modeOfPayment->TooltipValue = "";

			// charged_date
			$this->charged_date->LinkCustomAttributes = "";
			$this->charged_date->HrefValue = "";
			$this->charged_date->TooltipValue = "";

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

			// ChequeCardNo
			$this->ChequeCardNo->LinkCustomAttributes = "";
			$this->ChequeCardNo->HrefValue = "";
			$this->ChequeCardNo->TooltipValue = "";

			// CreditBankName
			$this->CreditBankName->LinkCustomAttributes = "";
			$this->CreditBankName->HrefValue = "";
			$this->CreditBankName->TooltipValue = "";

			// CreditCardHolder
			$this->CreditCardHolder->LinkCustomAttributes = "";
			$this->CreditCardHolder->HrefValue = "";
			$this->CreditCardHolder->TooltipValue = "";

			// CreditCardType
			$this->CreditCardType->LinkCustomAttributes = "";
			$this->CreditCardType->HrefValue = "";
			$this->CreditCardType->TooltipValue = "";

			// CreditCardMachine
			$this->CreditCardMachine->LinkCustomAttributes = "";
			$this->CreditCardMachine->HrefValue = "";
			$this->CreditCardMachine->TooltipValue = "";

			// CreditCardBatchNo
			$this->CreditCardBatchNo->LinkCustomAttributes = "";
			$this->CreditCardBatchNo->HrefValue = "";
			$this->CreditCardBatchNo->TooltipValue = "";

			// CreditCardTax
			$this->CreditCardTax->LinkCustomAttributes = "";
			$this->CreditCardTax->HrefValue = "";
			$this->CreditCardTax->TooltipValue = "";

			// CreditDeductionAmount
			$this->CreditDeductionAmount->LinkCustomAttributes = "";
			$this->CreditDeductionAmount->HrefValue = "";
			$this->CreditDeductionAmount->TooltipValue = "";

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

			// BankAccHolderMobileNumber
			$this->BankAccHolderMobileNumber->LinkCustomAttributes = "";
			$this->BankAccHolderMobileNumber->HrefValue = "";
			$this->BankAccHolderMobileNumber->TooltipValue = "";
		} elseif ($this->RowType == ROWTYPE_ADD) { // Add row

			// Reception
			$this->Reception->EditAttrs["class"] = "form-control";
			$this->Reception->EditCustomAttributes = "";
			$this->Reception->EditValue = HtmlEncode($this->Reception->CurrentValue);
			$this->Reception->PlaceHolder = RemoveHtml($this->Reception->caption());

			// Aid
			$this->Aid->EditAttrs["class"] = "form-control";
			$this->Aid->EditCustomAttributes = "";
			$this->Aid->EditValue = HtmlEncode($this->Aid->CurrentValue);
			$this->Aid->PlaceHolder = RemoveHtml($this->Aid->caption());

			// Vid
			$this->Vid->EditAttrs["class"] = "form-control";
			$this->Vid->EditCustomAttributes = "";
			$this->Vid->EditValue = HtmlEncode($this->Vid->CurrentValue);
			$this->Vid->PlaceHolder = RemoveHtml($this->Vid->caption());

			// patient_id
			$this->patient_id->EditAttrs["class"] = "form-control";
			$this->patient_id->EditCustomAttributes = "";
			$this->patient_id->EditValue = HtmlEncode($this->patient_id->CurrentValue);
			$this->patient_id->PlaceHolder = RemoveHtml($this->patient_id->caption());

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

			// amount
			$this->amount->EditAttrs["class"] = "form-control";
			$this->amount->EditCustomAttributes = "";
			$this->amount->EditValue = HtmlEncode($this->amount->CurrentValue);
			$this->amount->PlaceHolder = RemoveHtml($this->amount->caption());
			if (strval($this->amount->EditValue) <> "" && is_numeric($this->amount->EditValue))
				$this->amount->EditValue = FormatNumber($this->amount->EditValue, -2, -2, -2, -2);

			// Discount
			$this->Discount->EditAttrs["class"] = "form-control";
			$this->Discount->EditCustomAttributes = "";
			$this->Discount->EditValue = HtmlEncode($this->Discount->CurrentValue);
			$this->Discount->PlaceHolder = RemoveHtml($this->Discount->caption());
			if (strval($this->Discount->EditValue) <> "" && is_numeric($this->Discount->EditValue))
				$this->Discount->EditValue = FormatNumber($this->Discount->EditValue, -2, -2, -2, -2);

			// SubTotal
			$this->SubTotal->EditAttrs["class"] = "form-control";
			$this->SubTotal->EditCustomAttributes = "";
			$this->SubTotal->EditValue = HtmlEncode($this->SubTotal->CurrentValue);
			$this->SubTotal->PlaceHolder = RemoveHtml($this->SubTotal->caption());
			if (strval($this->SubTotal->EditValue) <> "" && is_numeric($this->SubTotal->EditValue))
				$this->SubTotal->EditValue = FormatNumber($this->SubTotal->EditValue, -2, -2, -2, -2);

			// patient_type
			$this->patient_type->EditAttrs["class"] = "form-control";
			$this->patient_type->EditCustomAttributes = "";
			$this->patient_type->EditValue = HtmlEncode($this->patient_type->CurrentValue);
			$this->patient_type->PlaceHolder = RemoveHtml($this->patient_type->caption());

			// invoiceId
			$this->invoiceId->EditAttrs["class"] = "form-control";
			$this->invoiceId->EditCustomAttributes = "";
			$this->invoiceId->EditValue = HtmlEncode($this->invoiceId->CurrentValue);
			$this->invoiceId->PlaceHolder = RemoveHtml($this->invoiceId->caption());

			// invoiceAmount
			$this->invoiceAmount->EditAttrs["class"] = "form-control";
			$this->invoiceAmount->EditCustomAttributes = "";
			$this->invoiceAmount->EditValue = HtmlEncode($this->invoiceAmount->CurrentValue);
			$this->invoiceAmount->PlaceHolder = RemoveHtml($this->invoiceAmount->caption());
			if (strval($this->invoiceAmount->EditValue) <> "" && is_numeric($this->invoiceAmount->EditValue))
				$this->invoiceAmount->EditValue = FormatNumber($this->invoiceAmount->EditValue, -2, -2, -2, -2);

			// invoiceStatus
			$this->invoiceStatus->EditAttrs["class"] = "form-control";
			$this->invoiceStatus->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->invoiceStatus->CurrentValue = HtmlDecode($this->invoiceStatus->CurrentValue);
			$this->invoiceStatus->EditValue = HtmlEncode($this->invoiceStatus->CurrentValue);
			$this->invoiceStatus->PlaceHolder = RemoveHtml($this->invoiceStatus->caption());

			// modeOfPayment
			$this->modeOfPayment->EditAttrs["class"] = "form-control";
			$this->modeOfPayment->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->modeOfPayment->CurrentValue = HtmlDecode($this->modeOfPayment->CurrentValue);
			$this->modeOfPayment->EditValue = HtmlEncode($this->modeOfPayment->CurrentValue);
			$this->modeOfPayment->PlaceHolder = RemoveHtml($this->modeOfPayment->caption());

			// charged_date
			$this->charged_date->EditAttrs["class"] = "form-control";
			$this->charged_date->EditCustomAttributes = "";
			$this->charged_date->EditValue = HtmlEncode(FormatDateTime($this->charged_date->CurrentValue, 8));
			$this->charged_date->PlaceHolder = RemoveHtml($this->charged_date->caption());

			// status
			$this->status->EditAttrs["class"] = "form-control";
			$this->status->EditCustomAttributes = "";
			$this->status->EditValue = HtmlEncode($this->status->CurrentValue);
			$this->status->PlaceHolder = RemoveHtml($this->status->caption());

			// createdby
			$this->createdby->EditAttrs["class"] = "form-control";
			$this->createdby->EditCustomAttributes = "";
			$this->createdby->EditValue = HtmlEncode($this->createdby->CurrentValue);
			$this->createdby->PlaceHolder = RemoveHtml($this->createdby->caption());

			// createddatetime
			$this->createddatetime->EditAttrs["class"] = "form-control";
			$this->createddatetime->EditCustomAttributes = "";
			$this->createddatetime->EditValue = HtmlEncode(FormatDateTime($this->createddatetime->CurrentValue, 8));
			$this->createddatetime->PlaceHolder = RemoveHtml($this->createddatetime->caption());

			// modifiedby
			$this->modifiedby->EditAttrs["class"] = "form-control";
			$this->modifiedby->EditCustomAttributes = "";
			$this->modifiedby->EditValue = HtmlEncode($this->modifiedby->CurrentValue);
			$this->modifiedby->PlaceHolder = RemoveHtml($this->modifiedby->caption());

			// modifieddatetime
			$this->modifieddatetime->EditAttrs["class"] = "form-control";
			$this->modifieddatetime->EditCustomAttributes = "";
			$this->modifieddatetime->EditValue = HtmlEncode(FormatDateTime($this->modifieddatetime->CurrentValue, 8));
			$this->modifieddatetime->PlaceHolder = RemoveHtml($this->modifieddatetime->caption());

			// ChequeCardNo
			$this->ChequeCardNo->EditAttrs["class"] = "form-control";
			$this->ChequeCardNo->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->ChequeCardNo->CurrentValue = HtmlDecode($this->ChequeCardNo->CurrentValue);
			$this->ChequeCardNo->EditValue = HtmlEncode($this->ChequeCardNo->CurrentValue);
			$this->ChequeCardNo->PlaceHolder = RemoveHtml($this->ChequeCardNo->caption());

			// CreditBankName
			$this->CreditBankName->EditAttrs["class"] = "form-control";
			$this->CreditBankName->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->CreditBankName->CurrentValue = HtmlDecode($this->CreditBankName->CurrentValue);
			$this->CreditBankName->EditValue = HtmlEncode($this->CreditBankName->CurrentValue);
			$this->CreditBankName->PlaceHolder = RemoveHtml($this->CreditBankName->caption());

			// CreditCardHolder
			$this->CreditCardHolder->EditAttrs["class"] = "form-control";
			$this->CreditCardHolder->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->CreditCardHolder->CurrentValue = HtmlDecode($this->CreditCardHolder->CurrentValue);
			$this->CreditCardHolder->EditValue = HtmlEncode($this->CreditCardHolder->CurrentValue);
			$this->CreditCardHolder->PlaceHolder = RemoveHtml($this->CreditCardHolder->caption());

			// CreditCardType
			$this->CreditCardType->EditAttrs["class"] = "form-control";
			$this->CreditCardType->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->CreditCardType->CurrentValue = HtmlDecode($this->CreditCardType->CurrentValue);
			$this->CreditCardType->EditValue = HtmlEncode($this->CreditCardType->CurrentValue);
			$this->CreditCardType->PlaceHolder = RemoveHtml($this->CreditCardType->caption());

			// CreditCardMachine
			$this->CreditCardMachine->EditAttrs["class"] = "form-control";
			$this->CreditCardMachine->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->CreditCardMachine->CurrentValue = HtmlDecode($this->CreditCardMachine->CurrentValue);
			$this->CreditCardMachine->EditValue = HtmlEncode($this->CreditCardMachine->CurrentValue);
			$this->CreditCardMachine->PlaceHolder = RemoveHtml($this->CreditCardMachine->caption());

			// CreditCardBatchNo
			$this->CreditCardBatchNo->EditAttrs["class"] = "form-control";
			$this->CreditCardBatchNo->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->CreditCardBatchNo->CurrentValue = HtmlDecode($this->CreditCardBatchNo->CurrentValue);
			$this->CreditCardBatchNo->EditValue = HtmlEncode($this->CreditCardBatchNo->CurrentValue);
			$this->CreditCardBatchNo->PlaceHolder = RemoveHtml($this->CreditCardBatchNo->caption());

			// CreditCardTax
			$this->CreditCardTax->EditAttrs["class"] = "form-control";
			$this->CreditCardTax->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->CreditCardTax->CurrentValue = HtmlDecode($this->CreditCardTax->CurrentValue);
			$this->CreditCardTax->EditValue = HtmlEncode($this->CreditCardTax->CurrentValue);
			$this->CreditCardTax->PlaceHolder = RemoveHtml($this->CreditCardTax->caption());

			// CreditDeductionAmount
			$this->CreditDeductionAmount->EditAttrs["class"] = "form-control";
			$this->CreditDeductionAmount->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->CreditDeductionAmount->CurrentValue = HtmlDecode($this->CreditDeductionAmount->CurrentValue);
			$this->CreditDeductionAmount->EditValue = HtmlEncode($this->CreditDeductionAmount->CurrentValue);
			$this->CreditDeductionAmount->PlaceHolder = RemoveHtml($this->CreditDeductionAmount->caption());

			// RealizationAmount
			$this->RealizationAmount->EditAttrs["class"] = "form-control";
			$this->RealizationAmount->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->RealizationAmount->CurrentValue = HtmlDecode($this->RealizationAmount->CurrentValue);
			$this->RealizationAmount->EditValue = HtmlEncode($this->RealizationAmount->CurrentValue);
			$this->RealizationAmount->PlaceHolder = RemoveHtml($this->RealizationAmount->caption());

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

			// BankAccHolderMobileNumber
			$this->BankAccHolderMobileNumber->EditAttrs["class"] = "form-control";
			$this->BankAccHolderMobileNumber->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->BankAccHolderMobileNumber->CurrentValue = HtmlDecode($this->BankAccHolderMobileNumber->CurrentValue);
			$this->BankAccHolderMobileNumber->EditValue = HtmlEncode($this->BankAccHolderMobileNumber->CurrentValue);
			$this->BankAccHolderMobileNumber->PlaceHolder = RemoveHtml($this->BankAccHolderMobileNumber->caption());

			// Add refer script
			// Reception

			$this->Reception->LinkCustomAttributes = "";
			$this->Reception->HrefValue = "";

			// Aid
			$this->Aid->LinkCustomAttributes = "";
			$this->Aid->HrefValue = "";

			// Vid
			$this->Vid->LinkCustomAttributes = "";
			$this->Vid->HrefValue = "";

			// patient_id
			$this->patient_id->LinkCustomAttributes = "";
			$this->patient_id->HrefValue = "";

			// mrnno
			$this->mrnno->LinkCustomAttributes = "";
			$this->mrnno->HrefValue = "";

			// PatientName
			$this->PatientName->LinkCustomAttributes = "";
			$this->PatientName->HrefValue = "";

			// amount
			$this->amount->LinkCustomAttributes = "";
			$this->amount->HrefValue = "";

			// Discount
			$this->Discount->LinkCustomAttributes = "";
			$this->Discount->HrefValue = "";

			// SubTotal
			$this->SubTotal->LinkCustomAttributes = "";
			$this->SubTotal->HrefValue = "";

			// patient_type
			$this->patient_type->LinkCustomAttributes = "";
			$this->patient_type->HrefValue = "";

			// invoiceId
			$this->invoiceId->LinkCustomAttributes = "";
			$this->invoiceId->HrefValue = "";

			// invoiceAmount
			$this->invoiceAmount->LinkCustomAttributes = "";
			$this->invoiceAmount->HrefValue = "";

			// invoiceStatus
			$this->invoiceStatus->LinkCustomAttributes = "";
			$this->invoiceStatus->HrefValue = "";

			// modeOfPayment
			$this->modeOfPayment->LinkCustomAttributes = "";
			$this->modeOfPayment->HrefValue = "";

			// charged_date
			$this->charged_date->LinkCustomAttributes = "";
			$this->charged_date->HrefValue = "";

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

			// ChequeCardNo
			$this->ChequeCardNo->LinkCustomAttributes = "";
			$this->ChequeCardNo->HrefValue = "";

			// CreditBankName
			$this->CreditBankName->LinkCustomAttributes = "";
			$this->CreditBankName->HrefValue = "";

			// CreditCardHolder
			$this->CreditCardHolder->LinkCustomAttributes = "";
			$this->CreditCardHolder->HrefValue = "";

			// CreditCardType
			$this->CreditCardType->LinkCustomAttributes = "";
			$this->CreditCardType->HrefValue = "";

			// CreditCardMachine
			$this->CreditCardMachine->LinkCustomAttributes = "";
			$this->CreditCardMachine->HrefValue = "";

			// CreditCardBatchNo
			$this->CreditCardBatchNo->LinkCustomAttributes = "";
			$this->CreditCardBatchNo->HrefValue = "";

			// CreditCardTax
			$this->CreditCardTax->LinkCustomAttributes = "";
			$this->CreditCardTax->HrefValue = "";

			// CreditDeductionAmount
			$this->CreditDeductionAmount->LinkCustomAttributes = "";
			$this->CreditDeductionAmount->HrefValue = "";

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

			// BankAccHolderMobileNumber
			$this->BankAccHolderMobileNumber->LinkCustomAttributes = "";
			$this->BankAccHolderMobileNumber->HrefValue = "";
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
		if (!CheckInteger($this->Reception->FormValue)) {
			AddMessage($FormError, $this->Reception->errorMessage());
		}
		if ($this->Aid->Required) {
			if (!$this->Aid->IsDetailKey && $this->Aid->FormValue != NULL && $this->Aid->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Aid->caption(), $this->Aid->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->Aid->FormValue)) {
			AddMessage($FormError, $this->Aid->errorMessage());
		}
		if ($this->Vid->Required) {
			if (!$this->Vid->IsDetailKey && $this->Vid->FormValue != NULL && $this->Vid->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Vid->caption(), $this->Vid->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->Vid->FormValue)) {
			AddMessage($FormError, $this->Vid->errorMessage());
		}
		if ($this->patient_id->Required) {
			if (!$this->patient_id->IsDetailKey && $this->patient_id->FormValue != NULL && $this->patient_id->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->patient_id->caption(), $this->patient_id->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->patient_id->FormValue)) {
			AddMessage($FormError, $this->patient_id->errorMessage());
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
		if ($this->amount->Required) {
			if (!$this->amount->IsDetailKey && $this->amount->FormValue != NULL && $this->amount->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->amount->caption(), $this->amount->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->amount->FormValue)) {
			AddMessage($FormError, $this->amount->errorMessage());
		}
		if ($this->Discount->Required) {
			if (!$this->Discount->IsDetailKey && $this->Discount->FormValue != NULL && $this->Discount->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Discount->caption(), $this->Discount->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->Discount->FormValue)) {
			AddMessage($FormError, $this->Discount->errorMessage());
		}
		if ($this->SubTotal->Required) {
			if (!$this->SubTotal->IsDetailKey && $this->SubTotal->FormValue != NULL && $this->SubTotal->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->SubTotal->caption(), $this->SubTotal->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->SubTotal->FormValue)) {
			AddMessage($FormError, $this->SubTotal->errorMessage());
		}
		if ($this->patient_type->Required) {
			if (!$this->patient_type->IsDetailKey && $this->patient_type->FormValue != NULL && $this->patient_type->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->patient_type->caption(), $this->patient_type->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->patient_type->FormValue)) {
			AddMessage($FormError, $this->patient_type->errorMessage());
		}
		if ($this->invoiceId->Required) {
			if (!$this->invoiceId->IsDetailKey && $this->invoiceId->FormValue != NULL && $this->invoiceId->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->invoiceId->caption(), $this->invoiceId->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->invoiceId->FormValue)) {
			AddMessage($FormError, $this->invoiceId->errorMessage());
		}
		if ($this->invoiceAmount->Required) {
			if (!$this->invoiceAmount->IsDetailKey && $this->invoiceAmount->FormValue != NULL && $this->invoiceAmount->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->invoiceAmount->caption(), $this->invoiceAmount->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->invoiceAmount->FormValue)) {
			AddMessage($FormError, $this->invoiceAmount->errorMessage());
		}
		if ($this->invoiceStatus->Required) {
			if (!$this->invoiceStatus->IsDetailKey && $this->invoiceStatus->FormValue != NULL && $this->invoiceStatus->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->invoiceStatus->caption(), $this->invoiceStatus->RequiredErrorMessage));
			}
		}
		if ($this->modeOfPayment->Required) {
			if (!$this->modeOfPayment->IsDetailKey && $this->modeOfPayment->FormValue != NULL && $this->modeOfPayment->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->modeOfPayment->caption(), $this->modeOfPayment->RequiredErrorMessage));
			}
		}
		if ($this->charged_date->Required) {
			if (!$this->charged_date->IsDetailKey && $this->charged_date->FormValue != NULL && $this->charged_date->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->charged_date->caption(), $this->charged_date->RequiredErrorMessage));
			}
		}
		if (!CheckDate($this->charged_date->FormValue)) {
			AddMessage($FormError, $this->charged_date->errorMessage());
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
		if (!CheckInteger($this->createdby->FormValue)) {
			AddMessage($FormError, $this->createdby->errorMessage());
		}
		if ($this->createddatetime->Required) {
			if (!$this->createddatetime->IsDetailKey && $this->createddatetime->FormValue != NULL && $this->createddatetime->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->createddatetime->caption(), $this->createddatetime->RequiredErrorMessage));
			}
		}
		if (!CheckDate($this->createddatetime->FormValue)) {
			AddMessage($FormError, $this->createddatetime->errorMessage());
		}
		if ($this->modifiedby->Required) {
			if (!$this->modifiedby->IsDetailKey && $this->modifiedby->FormValue != NULL && $this->modifiedby->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->modifiedby->caption(), $this->modifiedby->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->modifiedby->FormValue)) {
			AddMessage($FormError, $this->modifiedby->errorMessage());
		}
		if ($this->modifieddatetime->Required) {
			if (!$this->modifieddatetime->IsDetailKey && $this->modifieddatetime->FormValue != NULL && $this->modifieddatetime->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->modifieddatetime->caption(), $this->modifieddatetime->RequiredErrorMessage));
			}
		}
		if (!CheckDate($this->modifieddatetime->FormValue)) {
			AddMessage($FormError, $this->modifieddatetime->errorMessage());
		}
		if ($this->ChequeCardNo->Required) {
			if (!$this->ChequeCardNo->IsDetailKey && $this->ChequeCardNo->FormValue != NULL && $this->ChequeCardNo->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->ChequeCardNo->caption(), $this->ChequeCardNo->RequiredErrorMessage));
			}
		}
		if ($this->CreditBankName->Required) {
			if (!$this->CreditBankName->IsDetailKey && $this->CreditBankName->FormValue != NULL && $this->CreditBankName->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->CreditBankName->caption(), $this->CreditBankName->RequiredErrorMessage));
			}
		}
		if ($this->CreditCardHolder->Required) {
			if (!$this->CreditCardHolder->IsDetailKey && $this->CreditCardHolder->FormValue != NULL && $this->CreditCardHolder->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->CreditCardHolder->caption(), $this->CreditCardHolder->RequiredErrorMessage));
			}
		}
		if ($this->CreditCardType->Required) {
			if (!$this->CreditCardType->IsDetailKey && $this->CreditCardType->FormValue != NULL && $this->CreditCardType->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->CreditCardType->caption(), $this->CreditCardType->RequiredErrorMessage));
			}
		}
		if ($this->CreditCardMachine->Required) {
			if (!$this->CreditCardMachine->IsDetailKey && $this->CreditCardMachine->FormValue != NULL && $this->CreditCardMachine->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->CreditCardMachine->caption(), $this->CreditCardMachine->RequiredErrorMessage));
			}
		}
		if ($this->CreditCardBatchNo->Required) {
			if (!$this->CreditCardBatchNo->IsDetailKey && $this->CreditCardBatchNo->FormValue != NULL && $this->CreditCardBatchNo->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->CreditCardBatchNo->caption(), $this->CreditCardBatchNo->RequiredErrorMessage));
			}
		}
		if ($this->CreditCardTax->Required) {
			if (!$this->CreditCardTax->IsDetailKey && $this->CreditCardTax->FormValue != NULL && $this->CreditCardTax->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->CreditCardTax->caption(), $this->CreditCardTax->RequiredErrorMessage));
			}
		}
		if ($this->CreditDeductionAmount->Required) {
			if (!$this->CreditDeductionAmount->IsDetailKey && $this->CreditDeductionAmount->FormValue != NULL && $this->CreditDeductionAmount->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->CreditDeductionAmount->caption(), $this->CreditDeductionAmount->RequiredErrorMessage));
			}
		}
		if ($this->RealizationAmount->Required) {
			if (!$this->RealizationAmount->IsDetailKey && $this->RealizationAmount->FormValue != NULL && $this->RealizationAmount->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->RealizationAmount->caption(), $this->RealizationAmount->RequiredErrorMessage));
			}
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
		if ($this->BankAccHolderMobileNumber->Required) {
			if (!$this->BankAccHolderMobileNumber->IsDetailKey && $this->BankAccHolderMobileNumber->FormValue != NULL && $this->BankAccHolderMobileNumber->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->BankAccHolderMobileNumber->caption(), $this->BankAccHolderMobileNumber->RequiredErrorMessage));
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
		$this->Reception->setDbValueDef($rsnew, $this->Reception->CurrentValue, 0, FALSE);

		// Aid
		$this->Aid->setDbValueDef($rsnew, $this->Aid->CurrentValue, NULL, FALSE);

		// Vid
		$this->Vid->setDbValueDef($rsnew, $this->Vid->CurrentValue, NULL, FALSE);

		// patient_id
		$this->patient_id->setDbValueDef($rsnew, $this->patient_id->CurrentValue, 0, FALSE);

		// mrnno
		$this->mrnno->setDbValueDef($rsnew, $this->mrnno->CurrentValue, NULL, FALSE);

		// PatientName
		$this->PatientName->setDbValueDef($rsnew, $this->PatientName->CurrentValue, NULL, FALSE);

		// amount
		$this->amount->setDbValueDef($rsnew, $this->amount->CurrentValue, 0, FALSE);

		// Discount
		$this->Discount->setDbValueDef($rsnew, $this->Discount->CurrentValue, NULL, FALSE);

		// SubTotal
		$this->SubTotal->setDbValueDef($rsnew, $this->SubTotal->CurrentValue, NULL, FALSE);

		// patient_type
		$this->patient_type->setDbValueDef($rsnew, $this->patient_type->CurrentValue, 0, FALSE);

		// invoiceId
		$this->invoiceId->setDbValueDef($rsnew, $this->invoiceId->CurrentValue, NULL, FALSE);

		// invoiceAmount
		$this->invoiceAmount->setDbValueDef($rsnew, $this->invoiceAmount->CurrentValue, NULL, FALSE);

		// invoiceStatus
		$this->invoiceStatus->setDbValueDef($rsnew, $this->invoiceStatus->CurrentValue, NULL, FALSE);

		// modeOfPayment
		$this->modeOfPayment->setDbValueDef($rsnew, $this->modeOfPayment->CurrentValue, NULL, FALSE);

		// charged_date
		$this->charged_date->setDbValueDef($rsnew, UnFormatDateTime($this->charged_date->CurrentValue, 0), CurrentDate(), FALSE);

		// status
		$this->status->setDbValueDef($rsnew, $this->status->CurrentValue, 0, FALSE);

		// createdby
		$this->createdby->setDbValueDef($rsnew, $this->createdby->CurrentValue, NULL, FALSE);

		// createddatetime
		$this->createddatetime->setDbValueDef($rsnew, UnFormatDateTime($this->createddatetime->CurrentValue, 0), NULL, FALSE);

		// modifiedby
		$this->modifiedby->setDbValueDef($rsnew, $this->modifiedby->CurrentValue, NULL, FALSE);

		// modifieddatetime
		$this->modifieddatetime->setDbValueDef($rsnew, UnFormatDateTime($this->modifieddatetime->CurrentValue, 0), NULL, FALSE);

		// ChequeCardNo
		$this->ChequeCardNo->setDbValueDef($rsnew, $this->ChequeCardNo->CurrentValue, NULL, FALSE);

		// CreditBankName
		$this->CreditBankName->setDbValueDef($rsnew, $this->CreditBankName->CurrentValue, NULL, FALSE);

		// CreditCardHolder
		$this->CreditCardHolder->setDbValueDef($rsnew, $this->CreditCardHolder->CurrentValue, NULL, FALSE);

		// CreditCardType
		$this->CreditCardType->setDbValueDef($rsnew, $this->CreditCardType->CurrentValue, NULL, FALSE);

		// CreditCardMachine
		$this->CreditCardMachine->setDbValueDef($rsnew, $this->CreditCardMachine->CurrentValue, NULL, FALSE);

		// CreditCardBatchNo
		$this->CreditCardBatchNo->setDbValueDef($rsnew, $this->CreditCardBatchNo->CurrentValue, NULL, FALSE);

		// CreditCardTax
		$this->CreditCardTax->setDbValueDef($rsnew, $this->CreditCardTax->CurrentValue, NULL, FALSE);

		// CreditDeductionAmount
		$this->CreditDeductionAmount->setDbValueDef($rsnew, $this->CreditDeductionAmount->CurrentValue, NULL, FALSE);

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

		// BankAccHolderMobileNumber
		$this->BankAccHolderMobileNumber->setDbValueDef($rsnew, $this->BankAccHolderMobileNumber->CurrentValue, NULL, FALSE);

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
		$Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("receiptslist.php"), "", $this->TableVar, TRUE);
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
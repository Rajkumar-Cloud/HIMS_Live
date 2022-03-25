<?php
namespace PHPMaker2019\HIMS;

/**
 * Page class
 */
class pharmacy_payment_add extends pharmacy_payment
{

	// Page ID
	public $PageID = "add";

	// Project ID
	public $ProjectID = "{EA4F6D13-AF8F-428D-9EA7-BA88D1107EC3}";

	// Table name
	public $TableName = 'pharmacy_payment';

	// Page object name
	public $PageObjName = "pharmacy_payment_add";

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

		// Table object (pharmacy_payment)
		if (!isset($GLOBALS["pharmacy_payment"]) || get_class($GLOBALS["pharmacy_payment"]) == PROJECT_NAMESPACE . "pharmacy_payment") {
			$GLOBALS["pharmacy_payment"] = &$this;
			$GLOBALS["Table"] = &$GLOBALS["pharmacy_payment"];
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
			define(PROJECT_NAMESPACE . "TABLE_NAME", 'pharmacy_payment');

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
		global $EXPORT, $pharmacy_payment;
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
				$doc = new $class($pharmacy_payment);
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
					if ($pageName == "pharmacy_paymentview.php")
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
					$this->terminate(GetUrl("pharmacy_paymentlist.php"));
				else
					$this->terminate(GetUrl("login.php"));
				return;
			}
		}

		// Create form object
		$CurrentForm = new HttpForm();
		$this->CurrentAction = Param("action"); // Set up current action
		$this->id->Visible = FALSE;
		$this->PAYNO->setVisibility();
		$this->DT->setVisibility();
		$this->YM->setVisibility();
		$this->PC->setVisibility();
		$this->Customercode->setVisibility();
		$this->Customername->setVisibility();
		$this->pharmacy_pocol->setVisibility();
		$this->Address1->setVisibility();
		$this->Address2->setVisibility();
		$this->Address3->setVisibility();
		$this->State->setVisibility();
		$this->Pincode->setVisibility();
		$this->Phone->setVisibility();
		$this->Fax->setVisibility();
		$this->EEmail->setVisibility();
		$this->HospID->setVisibility();
		$this->createdby->setVisibility();
		$this->createddatetime->setVisibility();
		$this->modifiedby->Visible = FALSE;
		$this->modifieddatetime->Visible = FALSE;
		$this->PharmacyID->setVisibility();
		$this->BillTotalValue->setVisibility();
		$this->GRNTotalValue->setVisibility();
		$this->BillDiscount->setVisibility();
		$this->BillUpload->setVisibility();
		$this->TransPort->setVisibility();
		$this->AnyOther->setVisibility();
		$this->voucher_type->setVisibility();
		$this->Details->setVisibility();
		$this->ModeofPayment->setVisibility();
		$this->Amount->setVisibility();
		$this->BankName->setVisibility();
		$this->AccountNumber->setVisibility();
		$this->chequeNumber->setVisibility();
		$this->Remarks->setVisibility();
		$this->SeectPaymentMode->setVisibility();
		$this->PaidAmount->setVisibility();
		$this->Currency->setVisibility();
		$this->CardNumber->setVisibility();
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
		$this->setupLookupOptions($this->Customername);
		$this->setupLookupOptions($this->pharmacy_pocol);
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
					$this->terminate("pharmacy_paymentlist.php"); // No matching record, return to list
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
					if (GetPageName($returnUrl) == "pharmacy_paymentlist.php")
						$returnUrl = $this->addMasterUrl($returnUrl); // List page, return to List page with correct master key if necessary
					elseif (GetPageName($returnUrl) == "pharmacy_paymentview.php")
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
		$this->PAYNO->CurrentValue = NULL;
		$this->PAYNO->OldValue = $this->PAYNO->CurrentValue;
		$this->DT->CurrentValue = NULL;
		$this->DT->OldValue = $this->DT->CurrentValue;
		$this->YM->CurrentValue = NULL;
		$this->YM->OldValue = $this->YM->CurrentValue;
		$this->PC->CurrentValue = NULL;
		$this->PC->OldValue = $this->PC->CurrentValue;
		$this->Customercode->CurrentValue = NULL;
		$this->Customercode->OldValue = $this->Customercode->CurrentValue;
		$this->Customername->CurrentValue = NULL;
		$this->Customername->OldValue = $this->Customername->CurrentValue;
		$this->pharmacy_pocol->CurrentValue = NULL;
		$this->pharmacy_pocol->OldValue = $this->pharmacy_pocol->CurrentValue;
		$this->Address1->CurrentValue = NULL;
		$this->Address1->OldValue = $this->Address1->CurrentValue;
		$this->Address2->CurrentValue = NULL;
		$this->Address2->OldValue = $this->Address2->CurrentValue;
		$this->Address3->CurrentValue = NULL;
		$this->Address3->OldValue = $this->Address3->CurrentValue;
		$this->State->CurrentValue = NULL;
		$this->State->OldValue = $this->State->CurrentValue;
		$this->Pincode->CurrentValue = NULL;
		$this->Pincode->OldValue = $this->Pincode->CurrentValue;
		$this->Phone->CurrentValue = NULL;
		$this->Phone->OldValue = $this->Phone->CurrentValue;
		$this->Fax->CurrentValue = NULL;
		$this->Fax->OldValue = $this->Fax->CurrentValue;
		$this->EEmail->CurrentValue = NULL;
		$this->EEmail->OldValue = $this->EEmail->CurrentValue;
		$this->HospID->CurrentValue = NULL;
		$this->HospID->OldValue = $this->HospID->CurrentValue;
		$this->createdby->CurrentValue = NULL;
		$this->createdby->OldValue = $this->createdby->CurrentValue;
		$this->createddatetime->CurrentValue = NULL;
		$this->createddatetime->OldValue = $this->createddatetime->CurrentValue;
		$this->modifiedby->CurrentValue = NULL;
		$this->modifiedby->OldValue = $this->modifiedby->CurrentValue;
		$this->modifieddatetime->CurrentValue = NULL;
		$this->modifieddatetime->OldValue = $this->modifieddatetime->CurrentValue;
		$this->PharmacyID->CurrentValue = NULL;
		$this->PharmacyID->OldValue = $this->PharmacyID->CurrentValue;
		$this->BillTotalValue->CurrentValue = NULL;
		$this->BillTotalValue->OldValue = $this->BillTotalValue->CurrentValue;
		$this->GRNTotalValue->CurrentValue = NULL;
		$this->GRNTotalValue->OldValue = $this->GRNTotalValue->CurrentValue;
		$this->BillDiscount->CurrentValue = NULL;
		$this->BillDiscount->OldValue = $this->BillDiscount->CurrentValue;
		$this->BillUpload->CurrentValue = NULL;
		$this->BillUpload->OldValue = $this->BillUpload->CurrentValue;
		$this->TransPort->CurrentValue = NULL;
		$this->TransPort->OldValue = $this->TransPort->CurrentValue;
		$this->AnyOther->CurrentValue = NULL;
		$this->AnyOther->OldValue = $this->AnyOther->CurrentValue;
		$this->voucher_type->CurrentValue = NULL;
		$this->voucher_type->OldValue = $this->voucher_type->CurrentValue;
		$this->Details->CurrentValue = NULL;
		$this->Details->OldValue = $this->Details->CurrentValue;
		$this->ModeofPayment->CurrentValue = NULL;
		$this->ModeofPayment->OldValue = $this->ModeofPayment->CurrentValue;
		$this->Amount->CurrentValue = NULL;
		$this->Amount->OldValue = $this->Amount->CurrentValue;
		$this->BankName->CurrentValue = NULL;
		$this->BankName->OldValue = $this->BankName->CurrentValue;
		$this->AccountNumber->CurrentValue = NULL;
		$this->AccountNumber->OldValue = $this->AccountNumber->CurrentValue;
		$this->chequeNumber->CurrentValue = NULL;
		$this->chequeNumber->OldValue = $this->chequeNumber->CurrentValue;
		$this->Remarks->CurrentValue = NULL;
		$this->Remarks->OldValue = $this->Remarks->CurrentValue;
		$this->SeectPaymentMode->CurrentValue = NULL;
		$this->SeectPaymentMode->OldValue = $this->SeectPaymentMode->CurrentValue;
		$this->PaidAmount->CurrentValue = NULL;
		$this->PaidAmount->OldValue = $this->PaidAmount->CurrentValue;
		$this->Currency->CurrentValue = NULL;
		$this->Currency->OldValue = $this->Currency->CurrentValue;
		$this->CardNumber->CurrentValue = NULL;
		$this->CardNumber->OldValue = $this->CardNumber->CurrentValue;
	}

	// Load form values
	protected function loadFormValues()
	{

		// Load from form
		global $CurrentForm;

		// Check field name 'PAYNO' first before field var 'x_PAYNO'
		$val = $CurrentForm->hasValue("PAYNO") ? $CurrentForm->getValue("PAYNO") : $CurrentForm->getValue("x_PAYNO");
		if (!$this->PAYNO->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->PAYNO->Visible = FALSE; // Disable update for API request
			else
				$this->PAYNO->setFormValue($val);
		}

		// Check field name 'DT' first before field var 'x_DT'
		$val = $CurrentForm->hasValue("DT") ? $CurrentForm->getValue("DT") : $CurrentForm->getValue("x_DT");
		if (!$this->DT->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->DT->Visible = FALSE; // Disable update for API request
			else
				$this->DT->setFormValue($val);
			$this->DT->CurrentValue = UnFormatDateTime($this->DT->CurrentValue, 7);
		}

		// Check field name 'YM' first before field var 'x_YM'
		$val = $CurrentForm->hasValue("YM") ? $CurrentForm->getValue("YM") : $CurrentForm->getValue("x_YM");
		if (!$this->YM->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->YM->Visible = FALSE; // Disable update for API request
			else
				$this->YM->setFormValue($val);
		}

		// Check field name 'PC' first before field var 'x_PC'
		$val = $CurrentForm->hasValue("PC") ? $CurrentForm->getValue("PC") : $CurrentForm->getValue("x_PC");
		if (!$this->PC->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->PC->Visible = FALSE; // Disable update for API request
			else
				$this->PC->setFormValue($val);
		}

		// Check field name 'Customercode' first before field var 'x_Customercode'
		$val = $CurrentForm->hasValue("Customercode") ? $CurrentForm->getValue("Customercode") : $CurrentForm->getValue("x_Customercode");
		if (!$this->Customercode->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Customercode->Visible = FALSE; // Disable update for API request
			else
				$this->Customercode->setFormValue($val);
		}

		// Check field name 'Customername' first before field var 'x_Customername'
		$val = $CurrentForm->hasValue("Customername") ? $CurrentForm->getValue("Customername") : $CurrentForm->getValue("x_Customername");
		if (!$this->Customername->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Customername->Visible = FALSE; // Disable update for API request
			else
				$this->Customername->setFormValue($val);
		}

		// Check field name 'pharmacy_pocol' first before field var 'x_pharmacy_pocol'
		$val = $CurrentForm->hasValue("pharmacy_pocol") ? $CurrentForm->getValue("pharmacy_pocol") : $CurrentForm->getValue("x_pharmacy_pocol");
		if (!$this->pharmacy_pocol->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->pharmacy_pocol->Visible = FALSE; // Disable update for API request
			else
				$this->pharmacy_pocol->setFormValue($val);
		}

		// Check field name 'Address1' first before field var 'x_Address1'
		$val = $CurrentForm->hasValue("Address1") ? $CurrentForm->getValue("Address1") : $CurrentForm->getValue("x_Address1");
		if (!$this->Address1->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Address1->Visible = FALSE; // Disable update for API request
			else
				$this->Address1->setFormValue($val);
		}

		// Check field name 'Address2' first before field var 'x_Address2'
		$val = $CurrentForm->hasValue("Address2") ? $CurrentForm->getValue("Address2") : $CurrentForm->getValue("x_Address2");
		if (!$this->Address2->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Address2->Visible = FALSE; // Disable update for API request
			else
				$this->Address2->setFormValue($val);
		}

		// Check field name 'Address3' first before field var 'x_Address3'
		$val = $CurrentForm->hasValue("Address3") ? $CurrentForm->getValue("Address3") : $CurrentForm->getValue("x_Address3");
		if (!$this->Address3->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Address3->Visible = FALSE; // Disable update for API request
			else
				$this->Address3->setFormValue($val);
		}

		// Check field name 'State' first before field var 'x_State'
		$val = $CurrentForm->hasValue("State") ? $CurrentForm->getValue("State") : $CurrentForm->getValue("x_State");
		if (!$this->State->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->State->Visible = FALSE; // Disable update for API request
			else
				$this->State->setFormValue($val);
		}

		// Check field name 'Pincode' first before field var 'x_Pincode'
		$val = $CurrentForm->hasValue("Pincode") ? $CurrentForm->getValue("Pincode") : $CurrentForm->getValue("x_Pincode");
		if (!$this->Pincode->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Pincode->Visible = FALSE; // Disable update for API request
			else
				$this->Pincode->setFormValue($val);
		}

		// Check field name 'Phone' first before field var 'x_Phone'
		$val = $CurrentForm->hasValue("Phone") ? $CurrentForm->getValue("Phone") : $CurrentForm->getValue("x_Phone");
		if (!$this->Phone->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Phone->Visible = FALSE; // Disable update for API request
			else
				$this->Phone->setFormValue($val);
		}

		// Check field name 'Fax' first before field var 'x_Fax'
		$val = $CurrentForm->hasValue("Fax") ? $CurrentForm->getValue("Fax") : $CurrentForm->getValue("x_Fax");
		if (!$this->Fax->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Fax->Visible = FALSE; // Disable update for API request
			else
				$this->Fax->setFormValue($val);
		}

		// Check field name 'EEmail' first before field var 'x_EEmail'
		$val = $CurrentForm->hasValue("EEmail") ? $CurrentForm->getValue("EEmail") : $CurrentForm->getValue("x_EEmail");
		if (!$this->EEmail->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->EEmail->Visible = FALSE; // Disable update for API request
			else
				$this->EEmail->setFormValue($val);
		}

		// Check field name 'HospID' first before field var 'x_HospID'
		$val = $CurrentForm->hasValue("HospID") ? $CurrentForm->getValue("HospID") : $CurrentForm->getValue("x_HospID");
		if (!$this->HospID->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->HospID->Visible = FALSE; // Disable update for API request
			else
				$this->HospID->setFormValue($val);
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

		// Check field name 'PharmacyID' first before field var 'x_PharmacyID'
		$val = $CurrentForm->hasValue("PharmacyID") ? $CurrentForm->getValue("PharmacyID") : $CurrentForm->getValue("x_PharmacyID");
		if (!$this->PharmacyID->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->PharmacyID->Visible = FALSE; // Disable update for API request
			else
				$this->PharmacyID->setFormValue($val);
		}

		// Check field name 'BillTotalValue' first before field var 'x_BillTotalValue'
		$val = $CurrentForm->hasValue("BillTotalValue") ? $CurrentForm->getValue("BillTotalValue") : $CurrentForm->getValue("x_BillTotalValue");
		if (!$this->BillTotalValue->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->BillTotalValue->Visible = FALSE; // Disable update for API request
			else
				$this->BillTotalValue->setFormValue($val);
		}

		// Check field name 'GRNTotalValue' first before field var 'x_GRNTotalValue'
		$val = $CurrentForm->hasValue("GRNTotalValue") ? $CurrentForm->getValue("GRNTotalValue") : $CurrentForm->getValue("x_GRNTotalValue");
		if (!$this->GRNTotalValue->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->GRNTotalValue->Visible = FALSE; // Disable update for API request
			else
				$this->GRNTotalValue->setFormValue($val);
		}

		// Check field name 'BillDiscount' first before field var 'x_BillDiscount'
		$val = $CurrentForm->hasValue("BillDiscount") ? $CurrentForm->getValue("BillDiscount") : $CurrentForm->getValue("x_BillDiscount");
		if (!$this->BillDiscount->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->BillDiscount->Visible = FALSE; // Disable update for API request
			else
				$this->BillDiscount->setFormValue($val);
		}

		// Check field name 'BillUpload' first before field var 'x_BillUpload'
		$val = $CurrentForm->hasValue("BillUpload") ? $CurrentForm->getValue("BillUpload") : $CurrentForm->getValue("x_BillUpload");
		if (!$this->BillUpload->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->BillUpload->Visible = FALSE; // Disable update for API request
			else
				$this->BillUpload->setFormValue($val);
		}

		// Check field name 'TransPort' first before field var 'x_TransPort'
		$val = $CurrentForm->hasValue("TransPort") ? $CurrentForm->getValue("TransPort") : $CurrentForm->getValue("x_TransPort");
		if (!$this->TransPort->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->TransPort->Visible = FALSE; // Disable update for API request
			else
				$this->TransPort->setFormValue($val);
		}

		// Check field name 'AnyOther' first before field var 'x_AnyOther'
		$val = $CurrentForm->hasValue("AnyOther") ? $CurrentForm->getValue("AnyOther") : $CurrentForm->getValue("x_AnyOther");
		if (!$this->AnyOther->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->AnyOther->Visible = FALSE; // Disable update for API request
			else
				$this->AnyOther->setFormValue($val);
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

		// Check field name 'BankName' first before field var 'x_BankName'
		$val = $CurrentForm->hasValue("BankName") ? $CurrentForm->getValue("BankName") : $CurrentForm->getValue("x_BankName");
		if (!$this->BankName->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->BankName->Visible = FALSE; // Disable update for API request
			else
				$this->BankName->setFormValue($val);
		}

		// Check field name 'AccountNumber' first before field var 'x_AccountNumber'
		$val = $CurrentForm->hasValue("AccountNumber") ? $CurrentForm->getValue("AccountNumber") : $CurrentForm->getValue("x_AccountNumber");
		if (!$this->AccountNumber->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->AccountNumber->Visible = FALSE; // Disable update for API request
			else
				$this->AccountNumber->setFormValue($val);
		}

		// Check field name 'chequeNumber' first before field var 'x_chequeNumber'
		$val = $CurrentForm->hasValue("chequeNumber") ? $CurrentForm->getValue("chequeNumber") : $CurrentForm->getValue("x_chequeNumber");
		if (!$this->chequeNumber->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->chequeNumber->Visible = FALSE; // Disable update for API request
			else
				$this->chequeNumber->setFormValue($val);
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

		// Check field name 'id' first before field var 'x_id'
		$val = $CurrentForm->hasValue("id") ? $CurrentForm->getValue("id") : $CurrentForm->getValue("x_id");
	}

	// Restore form values
	public function restoreFormValues()
	{
		global $CurrentForm;
		$this->PAYNO->CurrentValue = $this->PAYNO->FormValue;
		$this->DT->CurrentValue = $this->DT->FormValue;
		$this->DT->CurrentValue = UnFormatDateTime($this->DT->CurrentValue, 7);
		$this->YM->CurrentValue = $this->YM->FormValue;
		$this->PC->CurrentValue = $this->PC->FormValue;
		$this->Customercode->CurrentValue = $this->Customercode->FormValue;
		$this->Customername->CurrentValue = $this->Customername->FormValue;
		$this->pharmacy_pocol->CurrentValue = $this->pharmacy_pocol->FormValue;
		$this->Address1->CurrentValue = $this->Address1->FormValue;
		$this->Address2->CurrentValue = $this->Address2->FormValue;
		$this->Address3->CurrentValue = $this->Address3->FormValue;
		$this->State->CurrentValue = $this->State->FormValue;
		$this->Pincode->CurrentValue = $this->Pincode->FormValue;
		$this->Phone->CurrentValue = $this->Phone->FormValue;
		$this->Fax->CurrentValue = $this->Fax->FormValue;
		$this->EEmail->CurrentValue = $this->EEmail->FormValue;
		$this->HospID->CurrentValue = $this->HospID->FormValue;
		$this->createdby->CurrentValue = $this->createdby->FormValue;
		$this->createddatetime->CurrentValue = $this->createddatetime->FormValue;
		$this->createddatetime->CurrentValue = UnFormatDateTime($this->createddatetime->CurrentValue, 0);
		$this->PharmacyID->CurrentValue = $this->PharmacyID->FormValue;
		$this->BillTotalValue->CurrentValue = $this->BillTotalValue->FormValue;
		$this->GRNTotalValue->CurrentValue = $this->GRNTotalValue->FormValue;
		$this->BillDiscount->CurrentValue = $this->BillDiscount->FormValue;
		$this->BillUpload->CurrentValue = $this->BillUpload->FormValue;
		$this->TransPort->CurrentValue = $this->TransPort->FormValue;
		$this->AnyOther->CurrentValue = $this->AnyOther->FormValue;
		$this->voucher_type->CurrentValue = $this->voucher_type->FormValue;
		$this->Details->CurrentValue = $this->Details->FormValue;
		$this->ModeofPayment->CurrentValue = $this->ModeofPayment->FormValue;
		$this->Amount->CurrentValue = $this->Amount->FormValue;
		$this->BankName->CurrentValue = $this->BankName->FormValue;
		$this->AccountNumber->CurrentValue = $this->AccountNumber->FormValue;
		$this->chequeNumber->CurrentValue = $this->chequeNumber->FormValue;
		$this->Remarks->CurrentValue = $this->Remarks->FormValue;
		$this->SeectPaymentMode->CurrentValue = $this->SeectPaymentMode->FormValue;
		$this->PaidAmount->CurrentValue = $this->PaidAmount->FormValue;
		$this->Currency->CurrentValue = $this->Currency->FormValue;
		$this->CardNumber->CurrentValue = $this->CardNumber->FormValue;
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
		$this->PAYNO->setDbValue($row['PAYNO']);
		$this->DT->setDbValue($row['DT']);
		$this->YM->setDbValue($row['YM']);
		$this->PC->setDbValue($row['PC']);
		$this->Customercode->setDbValue($row['Customercode']);
		$this->Customername->setDbValue($row['Customername']);
		$this->pharmacy_pocol->setDbValue($row['pharmacy_pocol']);
		$this->Address1->setDbValue($row['Address1']);
		$this->Address2->setDbValue($row['Address2']);
		$this->Address3->setDbValue($row['Address3']);
		$this->State->setDbValue($row['State']);
		$this->Pincode->setDbValue($row['Pincode']);
		$this->Phone->setDbValue($row['Phone']);
		$this->Fax->setDbValue($row['Fax']);
		$this->EEmail->setDbValue($row['EEmail']);
		$this->HospID->setDbValue($row['HospID']);
		$this->createdby->setDbValue($row['createdby']);
		$this->createddatetime->setDbValue($row['createddatetime']);
		$this->modifiedby->setDbValue($row['modifiedby']);
		$this->modifieddatetime->setDbValue($row['modifieddatetime']);
		$this->PharmacyID->setDbValue($row['PharmacyID']);
		$this->BillTotalValue->setDbValue($row['BillTotalValue']);
		$this->GRNTotalValue->setDbValue($row['GRNTotalValue']);
		$this->BillDiscount->setDbValue($row['BillDiscount']);
		$this->BillUpload->setDbValue($row['BillUpload']);
		$this->TransPort->setDbValue($row['TransPort']);
		$this->AnyOther->setDbValue($row['AnyOther']);
		$this->voucher_type->setDbValue($row['voucher_type']);
		$this->Details->setDbValue($row['Details']);
		$this->ModeofPayment->setDbValue($row['ModeofPayment']);
		$this->Amount->setDbValue($row['Amount']);
		$this->BankName->setDbValue($row['BankName']);
		$this->AccountNumber->setDbValue($row['AccountNumber']);
		$this->chequeNumber->setDbValue($row['chequeNumber']);
		$this->Remarks->setDbValue($row['Remarks']);
		$this->SeectPaymentMode->setDbValue($row['SeectPaymentMode']);
		$this->PaidAmount->setDbValue($row['PaidAmount']);
		$this->Currency->setDbValue($row['Currency']);
		$this->CardNumber->setDbValue($row['CardNumber']);
	}

	// Return a row with default values
	protected function newRow()
	{
		$this->loadDefaultValues();
		$row = [];
		$row['id'] = $this->id->CurrentValue;
		$row['PAYNO'] = $this->PAYNO->CurrentValue;
		$row['DT'] = $this->DT->CurrentValue;
		$row['YM'] = $this->YM->CurrentValue;
		$row['PC'] = $this->PC->CurrentValue;
		$row['Customercode'] = $this->Customercode->CurrentValue;
		$row['Customername'] = $this->Customername->CurrentValue;
		$row['pharmacy_pocol'] = $this->pharmacy_pocol->CurrentValue;
		$row['Address1'] = $this->Address1->CurrentValue;
		$row['Address2'] = $this->Address2->CurrentValue;
		$row['Address3'] = $this->Address3->CurrentValue;
		$row['State'] = $this->State->CurrentValue;
		$row['Pincode'] = $this->Pincode->CurrentValue;
		$row['Phone'] = $this->Phone->CurrentValue;
		$row['Fax'] = $this->Fax->CurrentValue;
		$row['EEmail'] = $this->EEmail->CurrentValue;
		$row['HospID'] = $this->HospID->CurrentValue;
		$row['createdby'] = $this->createdby->CurrentValue;
		$row['createddatetime'] = $this->createddatetime->CurrentValue;
		$row['modifiedby'] = $this->modifiedby->CurrentValue;
		$row['modifieddatetime'] = $this->modifieddatetime->CurrentValue;
		$row['PharmacyID'] = $this->PharmacyID->CurrentValue;
		$row['BillTotalValue'] = $this->BillTotalValue->CurrentValue;
		$row['GRNTotalValue'] = $this->GRNTotalValue->CurrentValue;
		$row['BillDiscount'] = $this->BillDiscount->CurrentValue;
		$row['BillUpload'] = $this->BillUpload->CurrentValue;
		$row['TransPort'] = $this->TransPort->CurrentValue;
		$row['AnyOther'] = $this->AnyOther->CurrentValue;
		$row['voucher_type'] = $this->voucher_type->CurrentValue;
		$row['Details'] = $this->Details->CurrentValue;
		$row['ModeofPayment'] = $this->ModeofPayment->CurrentValue;
		$row['Amount'] = $this->Amount->CurrentValue;
		$row['BankName'] = $this->BankName->CurrentValue;
		$row['AccountNumber'] = $this->AccountNumber->CurrentValue;
		$row['chequeNumber'] = $this->chequeNumber->CurrentValue;
		$row['Remarks'] = $this->Remarks->CurrentValue;
		$row['SeectPaymentMode'] = $this->SeectPaymentMode->CurrentValue;
		$row['PaidAmount'] = $this->PaidAmount->CurrentValue;
		$row['Currency'] = $this->Currency->CurrentValue;
		$row['CardNumber'] = $this->CardNumber->CurrentValue;
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

		if ($this->BillTotalValue->FormValue == $this->BillTotalValue->CurrentValue && is_numeric(ConvertToFloatString($this->BillTotalValue->CurrentValue)))
			$this->BillTotalValue->CurrentValue = ConvertToFloatString($this->BillTotalValue->CurrentValue);

		// Convert decimal values if posted back
		if ($this->GRNTotalValue->FormValue == $this->GRNTotalValue->CurrentValue && is_numeric(ConvertToFloatString($this->GRNTotalValue->CurrentValue)))
			$this->GRNTotalValue->CurrentValue = ConvertToFloatString($this->GRNTotalValue->CurrentValue);

		// Convert decimal values if posted back
		if ($this->BillDiscount->FormValue == $this->BillDiscount->CurrentValue && is_numeric(ConvertToFloatString($this->BillDiscount->CurrentValue)))
			$this->BillDiscount->CurrentValue = ConvertToFloatString($this->BillDiscount->CurrentValue);

		// Convert decimal values if posted back
		if ($this->TransPort->FormValue == $this->TransPort->CurrentValue && is_numeric(ConvertToFloatString($this->TransPort->CurrentValue)))
			$this->TransPort->CurrentValue = ConvertToFloatString($this->TransPort->CurrentValue);

		// Convert decimal values if posted back
		if ($this->AnyOther->FormValue == $this->AnyOther->CurrentValue && is_numeric(ConvertToFloatString($this->AnyOther->CurrentValue)))
			$this->AnyOther->CurrentValue = ConvertToFloatString($this->AnyOther->CurrentValue);

		// Convert decimal values if posted back
		if ($this->Amount->FormValue == $this->Amount->CurrentValue && is_numeric(ConvertToFloatString($this->Amount->CurrentValue)))
			$this->Amount->CurrentValue = ConvertToFloatString($this->Amount->CurrentValue);

		// Call Row_Rendering event
		$this->Row_Rendering();

		// Common render codes for all row types
		// id
		// PAYNO
		// DT
		// YM
		// PC
		// Customercode
		// Customername
		// pharmacy_pocol
		// Address1
		// Address2
		// Address3
		// State
		// Pincode
		// Phone
		// Fax
		// EEmail
		// HospID
		// createdby
		// createddatetime
		// modifiedby
		// modifieddatetime
		// PharmacyID
		// BillTotalValue
		// GRNTotalValue
		// BillDiscount
		// BillUpload
		// TransPort
		// AnyOther
		// voucher_type
		// Details
		// ModeofPayment
		// Amount
		// BankName
		// AccountNumber
		// chequeNumber
		// Remarks
		// SeectPaymentMode
		// PaidAmount
		// Currency
		// CardNumber

		if ($this->RowType == ROWTYPE_VIEW) { // View row

			// id
			$this->id->ViewValue = $this->id->CurrentValue;
			$this->id->ViewCustomAttributes = "";

			// PAYNO
			$this->PAYNO->ViewValue = $this->PAYNO->CurrentValue;
			$this->PAYNO->ViewCustomAttributes = "";

			// DT
			$this->DT->ViewValue = $this->DT->CurrentValue;
			$this->DT->ViewValue = FormatDateTime($this->DT->ViewValue, 7);
			$this->DT->ViewCustomAttributes = "";

			// YM
			$this->YM->ViewValue = $this->YM->CurrentValue;
			$this->YM->ViewCustomAttributes = "";

			// PC
			$this->PC->ViewValue = $this->PC->CurrentValue;
			$this->PC->ViewCustomAttributes = "";

			// Customercode
			$this->Customercode->ViewValue = $this->Customercode->CurrentValue;
			$this->Customercode->ViewCustomAttributes = "";

			// Customername
			$curVal = strval($this->Customername->CurrentValue);
			if ($curVal <> "") {
				$this->Customername->ViewValue = $this->Customername->lookupCacheOption($curVal);
				if ($this->Customername->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Suppliername`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->Customername->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = $rswrk->fields('df');
						$this->Customername->ViewValue = $this->Customername->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->Customername->ViewValue = $this->Customername->CurrentValue;
					}
				}
			} else {
				$this->Customername->ViewValue = NULL;
			}
			$this->Customername->ViewCustomAttributes = "";

			// pharmacy_pocol
			$curVal = strval($this->pharmacy_pocol->CurrentValue);
			if ($curVal <> "") {
				$this->pharmacy_pocol->ViewValue = $this->pharmacy_pocol->lookupCacheOption($curVal);
				if ($this->pharmacy_pocol->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`pharmacy`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$lookupFilter = function() {
						return "`HospId`='".HospitalID()."'";
					};
					$lookupFilter = $lookupFilter->bindTo($this);
					$sqlWrk = $this->pharmacy_pocol->Lookup->getSql(FALSE, $filterWrk, $lookupFilter, $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = $rswrk->fields('df');
						$this->pharmacy_pocol->ViewValue = $this->pharmacy_pocol->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->pharmacy_pocol->ViewValue = $this->pharmacy_pocol->CurrentValue;
					}
				}
			} else {
				$this->pharmacy_pocol->ViewValue = NULL;
			}
			$this->pharmacy_pocol->ViewCustomAttributes = "";

			// Address1
			$this->Address1->ViewValue = $this->Address1->CurrentValue;
			$this->Address1->ViewCustomAttributes = "";

			// Address2
			$this->Address2->ViewValue = $this->Address2->CurrentValue;
			$this->Address2->ViewCustomAttributes = "";

			// Address3
			$this->Address3->ViewValue = $this->Address3->CurrentValue;
			$this->Address3->ViewCustomAttributes = "";

			// State
			$this->State->ViewValue = $this->State->CurrentValue;
			$this->State->ViewCustomAttributes = "";

			// Pincode
			$this->Pincode->ViewValue = $this->Pincode->CurrentValue;
			$this->Pincode->ViewCustomAttributes = "";

			// Phone
			$this->Phone->ViewValue = $this->Phone->CurrentValue;
			$this->Phone->ViewCustomAttributes = "";

			// Fax
			$this->Fax->ViewValue = $this->Fax->CurrentValue;
			$this->Fax->ViewCustomAttributes = "";

			// EEmail
			$this->EEmail->ViewValue = $this->EEmail->CurrentValue;
			$this->EEmail->ViewCustomAttributes = "";

			// HospID
			$this->HospID->ViewValue = $this->HospID->CurrentValue;
			$this->HospID->ViewValue = FormatNumber($this->HospID->ViewValue, 0, -2, -2, -2);
			$this->HospID->ViewCustomAttributes = "";

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

			// PharmacyID
			$this->PharmacyID->ViewValue = $this->PharmacyID->CurrentValue;
			$this->PharmacyID->ViewValue = FormatNumber($this->PharmacyID->ViewValue, 0, -2, -2, -2);
			$this->PharmacyID->ViewCustomAttributes = "";

			// BillTotalValue
			$this->BillTotalValue->ViewValue = $this->BillTotalValue->CurrentValue;
			$this->BillTotalValue->ViewValue = FormatNumber($this->BillTotalValue->ViewValue, 2, -2, -2, -2);
			$this->BillTotalValue->ViewCustomAttributes = "";

			// GRNTotalValue
			$this->GRNTotalValue->ViewValue = $this->GRNTotalValue->CurrentValue;
			$this->GRNTotalValue->ViewValue = FormatNumber($this->GRNTotalValue->ViewValue, 2, -2, -2, -2);
			$this->GRNTotalValue->ViewCustomAttributes = "";

			// BillDiscount
			$this->BillDiscount->ViewValue = $this->BillDiscount->CurrentValue;
			$this->BillDiscount->ViewValue = FormatNumber($this->BillDiscount->ViewValue, 2, -2, -2, -2);
			$this->BillDiscount->ViewCustomAttributes = "";

			// BillUpload
			$this->BillUpload->ViewValue = $this->BillUpload->CurrentValue;
			$this->BillUpload->ViewCustomAttributes = "";

			// TransPort
			$this->TransPort->ViewValue = $this->TransPort->CurrentValue;
			$this->TransPort->ViewValue = FormatNumber($this->TransPort->ViewValue, 2, -2, -2, -2);
			$this->TransPort->ViewCustomAttributes = "";

			// AnyOther
			$this->AnyOther->ViewValue = $this->AnyOther->CurrentValue;
			$this->AnyOther->ViewValue = FormatNumber($this->AnyOther->ViewValue, 2, -2, -2, -2);
			$this->AnyOther->ViewCustomAttributes = "";

			// voucher_type
			$this->voucher_type->ViewValue = $this->voucher_type->CurrentValue;
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

			// BankName
			$this->BankName->ViewValue = $this->BankName->CurrentValue;
			$this->BankName->ViewCustomAttributes = "";

			// AccountNumber
			$this->AccountNumber->ViewValue = $this->AccountNumber->CurrentValue;
			$this->AccountNumber->ViewCustomAttributes = "";

			// chequeNumber
			$this->chequeNumber->ViewValue = $this->chequeNumber->CurrentValue;
			$this->chequeNumber->ViewCustomAttributes = "";

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

			// PAYNO
			$this->PAYNO->LinkCustomAttributes = "";
			$this->PAYNO->HrefValue = "";
			$this->PAYNO->TooltipValue = "";

			// DT
			$this->DT->LinkCustomAttributes = "";
			$this->DT->HrefValue = "";
			$this->DT->TooltipValue = "";

			// YM
			$this->YM->LinkCustomAttributes = "";
			$this->YM->HrefValue = "";
			$this->YM->TooltipValue = "";

			// PC
			$this->PC->LinkCustomAttributes = "";
			$this->PC->HrefValue = "";
			$this->PC->TooltipValue = "";

			// Customercode
			$this->Customercode->LinkCustomAttributes = "";
			$this->Customercode->HrefValue = "";
			$this->Customercode->TooltipValue = "";

			// Customername
			$this->Customername->LinkCustomAttributes = "";
			$this->Customername->HrefValue = "";
			$this->Customername->TooltipValue = "";

			// pharmacy_pocol
			$this->pharmacy_pocol->LinkCustomAttributes = "";
			$this->pharmacy_pocol->HrefValue = "";
			$this->pharmacy_pocol->TooltipValue = "";

			// Address1
			$this->Address1->LinkCustomAttributes = "";
			$this->Address1->HrefValue = "";
			$this->Address1->TooltipValue = "";

			// Address2
			$this->Address2->LinkCustomAttributes = "";
			$this->Address2->HrefValue = "";
			$this->Address2->TooltipValue = "";

			// Address3
			$this->Address3->LinkCustomAttributes = "";
			$this->Address3->HrefValue = "";
			$this->Address3->TooltipValue = "";

			// State
			$this->State->LinkCustomAttributes = "";
			$this->State->HrefValue = "";
			$this->State->TooltipValue = "";

			// Pincode
			$this->Pincode->LinkCustomAttributes = "";
			$this->Pincode->HrefValue = "";
			$this->Pincode->TooltipValue = "";

			// Phone
			$this->Phone->LinkCustomAttributes = "";
			$this->Phone->HrefValue = "";
			$this->Phone->TooltipValue = "";

			// Fax
			$this->Fax->LinkCustomAttributes = "";
			$this->Fax->HrefValue = "";
			$this->Fax->TooltipValue = "";

			// EEmail
			$this->EEmail->LinkCustomAttributes = "";
			$this->EEmail->HrefValue = "";
			$this->EEmail->TooltipValue = "";

			// HospID
			$this->HospID->LinkCustomAttributes = "";
			$this->HospID->HrefValue = "";
			$this->HospID->TooltipValue = "";

			// createdby
			$this->createdby->LinkCustomAttributes = "";
			$this->createdby->HrefValue = "";
			$this->createdby->TooltipValue = "";

			// createddatetime
			$this->createddatetime->LinkCustomAttributes = "";
			$this->createddatetime->HrefValue = "";
			$this->createddatetime->TooltipValue = "";

			// PharmacyID
			$this->PharmacyID->LinkCustomAttributes = "";
			$this->PharmacyID->HrefValue = "";
			$this->PharmacyID->TooltipValue = "";

			// BillTotalValue
			$this->BillTotalValue->LinkCustomAttributes = "";
			$this->BillTotalValue->HrefValue = "";
			$this->BillTotalValue->TooltipValue = "";

			// GRNTotalValue
			$this->GRNTotalValue->LinkCustomAttributes = "";
			$this->GRNTotalValue->HrefValue = "";
			$this->GRNTotalValue->TooltipValue = "";

			// BillDiscount
			$this->BillDiscount->LinkCustomAttributes = "";
			$this->BillDiscount->HrefValue = "";
			$this->BillDiscount->TooltipValue = "";

			// BillUpload
			$this->BillUpload->LinkCustomAttributes = "";
			$this->BillUpload->HrefValue = "";
			$this->BillUpload->TooltipValue = "";

			// TransPort
			$this->TransPort->LinkCustomAttributes = "";
			$this->TransPort->HrefValue = "";
			$this->TransPort->TooltipValue = "";

			// AnyOther
			$this->AnyOther->LinkCustomAttributes = "";
			$this->AnyOther->HrefValue = "";
			$this->AnyOther->TooltipValue = "";

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

			// BankName
			$this->BankName->LinkCustomAttributes = "";
			$this->BankName->HrefValue = "";
			$this->BankName->TooltipValue = "";

			// AccountNumber
			$this->AccountNumber->LinkCustomAttributes = "";
			$this->AccountNumber->HrefValue = "";
			$this->AccountNumber->TooltipValue = "";

			// chequeNumber
			$this->chequeNumber->LinkCustomAttributes = "";
			$this->chequeNumber->HrefValue = "";
			$this->chequeNumber->TooltipValue = "";

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
		} elseif ($this->RowType == ROWTYPE_ADD) { // Add row

			// PAYNO
			$this->PAYNO->EditAttrs["class"] = "form-control";
			$this->PAYNO->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->PAYNO->CurrentValue = HtmlDecode($this->PAYNO->CurrentValue);
			$this->PAYNO->EditValue = HtmlEncode($this->PAYNO->CurrentValue);
			$this->PAYNO->PlaceHolder = RemoveHtml($this->PAYNO->caption());

			// DT
			$this->DT->EditAttrs["class"] = "form-control";
			$this->DT->EditCustomAttributes = "";
			$this->DT->EditValue = HtmlEncode(FormatDateTime($this->DT->CurrentValue, 7));
			$this->DT->PlaceHolder = RemoveHtml($this->DT->caption());

			// YM
			$this->YM->EditAttrs["class"] = "form-control";
			$this->YM->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->YM->CurrentValue = HtmlDecode($this->YM->CurrentValue);
			$this->YM->EditValue = HtmlEncode($this->YM->CurrentValue);
			$this->YM->PlaceHolder = RemoveHtml($this->YM->caption());

			// PC
			$this->PC->EditAttrs["class"] = "form-control";
			$this->PC->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->PC->CurrentValue = HtmlDecode($this->PC->CurrentValue);
			$this->PC->EditValue = HtmlEncode($this->PC->CurrentValue);
			$this->PC->PlaceHolder = RemoveHtml($this->PC->caption());

			// Customercode
			$this->Customercode->EditAttrs["class"] = "form-control";
			$this->Customercode->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Customercode->CurrentValue = HtmlDecode($this->Customercode->CurrentValue);
			$this->Customercode->EditValue = HtmlEncode($this->Customercode->CurrentValue);
			$this->Customercode->PlaceHolder = RemoveHtml($this->Customercode->caption());

			// Customername
			$this->Customername->EditCustomAttributes = "";
			$curVal = trim(strval($this->Customername->CurrentValue));
			if ($curVal <> "")
				$this->Customername->ViewValue = $this->Customername->lookupCacheOption($curVal);
			else
				$this->Customername->ViewValue = $this->Customername->Lookup !== NULL && is_array($this->Customername->Lookup->Options) ? $curVal : NULL;
			if ($this->Customername->ViewValue !== NULL) { // Load from cache
				$this->Customername->EditValue = array_values($this->Customername->Lookup->Options);
				if ($this->Customername->ViewValue == "")
					$this->Customername->ViewValue = $Language->phrase("PleaseSelect");
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`Suppliername`" . SearchString("=", $this->Customername->CurrentValue, DATATYPE_STRING, "");
				}
				$sqlWrk = $this->Customername->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = array();
					$arwrk[1] = HtmlEncode($rswrk->fields('df'));
					$this->Customername->ViewValue = $this->Customername->displayValue($arwrk);
				} else {
					$this->Customername->ViewValue = $Language->phrase("PleaseSelect");
				}
				$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
				if ($rswrk) $rswrk->Close();
				$this->Customername->EditValue = $arwrk;
			}

			// pharmacy_pocol
			$this->pharmacy_pocol->EditAttrs["class"] = "form-control";
			$this->pharmacy_pocol->EditCustomAttributes = "";
			$curVal = trim(strval($this->pharmacy_pocol->CurrentValue));
			if ($curVal <> "")
				$this->pharmacy_pocol->ViewValue = $this->pharmacy_pocol->lookupCacheOption($curVal);
			else
				$this->pharmacy_pocol->ViewValue = $this->pharmacy_pocol->Lookup !== NULL && is_array($this->pharmacy_pocol->Lookup->Options) ? $curVal : NULL;
			if ($this->pharmacy_pocol->ViewValue !== NULL) { // Load from cache
				$this->pharmacy_pocol->EditValue = array_values($this->pharmacy_pocol->Lookup->Options);
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`pharmacy`" . SearchString("=", $this->pharmacy_pocol->CurrentValue, DATATYPE_STRING, "");
				}
				$lookupFilter = function() {
					return "`HospId`='".HospitalID()."'";
				};
				$lookupFilter = $lookupFilter->bindTo($this);
				$sqlWrk = $this->pharmacy_pocol->Lookup->getSql(TRUE, $filterWrk, $lookupFilter, $this);
				$rswrk = Conn()->execute($sqlWrk);
				$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
				if ($rswrk) $rswrk->Close();
				$this->pharmacy_pocol->EditValue = $arwrk;
			}

			// Address1
			$this->Address1->EditAttrs["class"] = "form-control";
			$this->Address1->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Address1->CurrentValue = HtmlDecode($this->Address1->CurrentValue);
			$this->Address1->EditValue = HtmlEncode($this->Address1->CurrentValue);
			$this->Address1->PlaceHolder = RemoveHtml($this->Address1->caption());

			// Address2
			$this->Address2->EditAttrs["class"] = "form-control";
			$this->Address2->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Address2->CurrentValue = HtmlDecode($this->Address2->CurrentValue);
			$this->Address2->EditValue = HtmlEncode($this->Address2->CurrentValue);
			$this->Address2->PlaceHolder = RemoveHtml($this->Address2->caption());

			// Address3
			$this->Address3->EditAttrs["class"] = "form-control";
			$this->Address3->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Address3->CurrentValue = HtmlDecode($this->Address3->CurrentValue);
			$this->Address3->EditValue = HtmlEncode($this->Address3->CurrentValue);
			$this->Address3->PlaceHolder = RemoveHtml($this->Address3->caption());

			// State
			$this->State->EditAttrs["class"] = "form-control";
			$this->State->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->State->CurrentValue = HtmlDecode($this->State->CurrentValue);
			$this->State->EditValue = HtmlEncode($this->State->CurrentValue);
			$this->State->PlaceHolder = RemoveHtml($this->State->caption());

			// Pincode
			$this->Pincode->EditAttrs["class"] = "form-control";
			$this->Pincode->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Pincode->CurrentValue = HtmlDecode($this->Pincode->CurrentValue);
			$this->Pincode->EditValue = HtmlEncode($this->Pincode->CurrentValue);
			$this->Pincode->PlaceHolder = RemoveHtml($this->Pincode->caption());

			// Phone
			$this->Phone->EditAttrs["class"] = "form-control";
			$this->Phone->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Phone->CurrentValue = HtmlDecode($this->Phone->CurrentValue);
			$this->Phone->EditValue = HtmlEncode($this->Phone->CurrentValue);
			$this->Phone->PlaceHolder = RemoveHtml($this->Phone->caption());

			// Fax
			$this->Fax->EditAttrs["class"] = "form-control";
			$this->Fax->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Fax->CurrentValue = HtmlDecode($this->Fax->CurrentValue);
			$this->Fax->EditValue = HtmlEncode($this->Fax->CurrentValue);
			$this->Fax->PlaceHolder = RemoveHtml($this->Fax->caption());

			// EEmail
			$this->EEmail->EditAttrs["class"] = "form-control";
			$this->EEmail->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->EEmail->CurrentValue = HtmlDecode($this->EEmail->CurrentValue);
			$this->EEmail->EditValue = HtmlEncode($this->EEmail->CurrentValue);
			$this->EEmail->PlaceHolder = RemoveHtml($this->EEmail->caption());

			// HospID
			// createdby
			// createddatetime
			// PharmacyID
			// BillTotalValue

			$this->BillTotalValue->EditAttrs["class"] = "form-control";
			$this->BillTotalValue->EditCustomAttributes = "";
			$this->BillTotalValue->EditValue = HtmlEncode($this->BillTotalValue->CurrentValue);
			$this->BillTotalValue->PlaceHolder = RemoveHtml($this->BillTotalValue->caption());
			if (strval($this->BillTotalValue->EditValue) <> "" && is_numeric($this->BillTotalValue->EditValue))
				$this->BillTotalValue->EditValue = FormatNumber($this->BillTotalValue->EditValue, -2, -2, -2, -2);

			// GRNTotalValue
			$this->GRNTotalValue->EditAttrs["class"] = "form-control";
			$this->GRNTotalValue->EditCustomAttributes = "";
			$this->GRNTotalValue->EditValue = HtmlEncode($this->GRNTotalValue->CurrentValue);
			$this->GRNTotalValue->PlaceHolder = RemoveHtml($this->GRNTotalValue->caption());
			if (strval($this->GRNTotalValue->EditValue) <> "" && is_numeric($this->GRNTotalValue->EditValue))
				$this->GRNTotalValue->EditValue = FormatNumber($this->GRNTotalValue->EditValue, -2, -2, -2, -2);

			// BillDiscount
			$this->BillDiscount->EditAttrs["class"] = "form-control";
			$this->BillDiscount->EditCustomAttributes = "";
			$this->BillDiscount->EditValue = HtmlEncode($this->BillDiscount->CurrentValue);
			$this->BillDiscount->PlaceHolder = RemoveHtml($this->BillDiscount->caption());
			if (strval($this->BillDiscount->EditValue) <> "" && is_numeric($this->BillDiscount->EditValue))
				$this->BillDiscount->EditValue = FormatNumber($this->BillDiscount->EditValue, -2, -2, -2, -2);

			// BillUpload
			$this->BillUpload->EditAttrs["class"] = "form-control";
			$this->BillUpload->EditCustomAttributes = "";
			$this->BillUpload->EditValue = HtmlEncode($this->BillUpload->CurrentValue);
			$this->BillUpload->PlaceHolder = RemoveHtml($this->BillUpload->caption());

			// TransPort
			$this->TransPort->EditAttrs["class"] = "form-control";
			$this->TransPort->EditCustomAttributes = "";
			$this->TransPort->EditValue = HtmlEncode($this->TransPort->CurrentValue);
			$this->TransPort->PlaceHolder = RemoveHtml($this->TransPort->caption());
			if (strval($this->TransPort->EditValue) <> "" && is_numeric($this->TransPort->EditValue))
				$this->TransPort->EditValue = FormatNumber($this->TransPort->EditValue, -2, -2, -2, -2);

			// AnyOther
			$this->AnyOther->EditAttrs["class"] = "form-control";
			$this->AnyOther->EditCustomAttributes = "";
			$this->AnyOther->EditValue = HtmlEncode($this->AnyOther->CurrentValue);
			$this->AnyOther->PlaceHolder = RemoveHtml($this->AnyOther->caption());
			if (strval($this->AnyOther->EditValue) <> "" && is_numeric($this->AnyOther->EditValue))
				$this->AnyOther->EditValue = FormatNumber($this->AnyOther->EditValue, -2, -2, -2, -2);

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

			// BankName
			$this->BankName->EditAttrs["class"] = "form-control";
			$this->BankName->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->BankName->CurrentValue = HtmlDecode($this->BankName->CurrentValue);
			$this->BankName->EditValue = HtmlEncode($this->BankName->CurrentValue);
			$this->BankName->PlaceHolder = RemoveHtml($this->BankName->caption());

			// AccountNumber
			$this->AccountNumber->EditAttrs["class"] = "form-control";
			$this->AccountNumber->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->AccountNumber->CurrentValue = HtmlDecode($this->AccountNumber->CurrentValue);
			$this->AccountNumber->EditValue = HtmlEncode($this->AccountNumber->CurrentValue);
			$this->AccountNumber->PlaceHolder = RemoveHtml($this->AccountNumber->caption());

			// chequeNumber
			$this->chequeNumber->EditAttrs["class"] = "form-control";
			$this->chequeNumber->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->chequeNumber->CurrentValue = HtmlDecode($this->chequeNumber->CurrentValue);
			$this->chequeNumber->EditValue = HtmlEncode($this->chequeNumber->CurrentValue);
			$this->chequeNumber->PlaceHolder = RemoveHtml($this->chequeNumber->caption());

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

			// CardNumber
			$this->CardNumber->EditAttrs["class"] = "form-control";
			$this->CardNumber->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->CardNumber->CurrentValue = HtmlDecode($this->CardNumber->CurrentValue);
			$this->CardNumber->EditValue = HtmlEncode($this->CardNumber->CurrentValue);
			$this->CardNumber->PlaceHolder = RemoveHtml($this->CardNumber->caption());

			// Add refer script
			// PAYNO

			$this->PAYNO->LinkCustomAttributes = "";
			$this->PAYNO->HrefValue = "";

			// DT
			$this->DT->LinkCustomAttributes = "";
			$this->DT->HrefValue = "";

			// YM
			$this->YM->LinkCustomAttributes = "";
			$this->YM->HrefValue = "";

			// PC
			$this->PC->LinkCustomAttributes = "";
			$this->PC->HrefValue = "";

			// Customercode
			$this->Customercode->LinkCustomAttributes = "";
			$this->Customercode->HrefValue = "";

			// Customername
			$this->Customername->LinkCustomAttributes = "";
			$this->Customername->HrefValue = "";

			// pharmacy_pocol
			$this->pharmacy_pocol->LinkCustomAttributes = "";
			$this->pharmacy_pocol->HrefValue = "";

			// Address1
			$this->Address1->LinkCustomAttributes = "";
			$this->Address1->HrefValue = "";

			// Address2
			$this->Address2->LinkCustomAttributes = "";
			$this->Address2->HrefValue = "";

			// Address3
			$this->Address3->LinkCustomAttributes = "";
			$this->Address3->HrefValue = "";

			// State
			$this->State->LinkCustomAttributes = "";
			$this->State->HrefValue = "";

			// Pincode
			$this->Pincode->LinkCustomAttributes = "";
			$this->Pincode->HrefValue = "";

			// Phone
			$this->Phone->LinkCustomAttributes = "";
			$this->Phone->HrefValue = "";

			// Fax
			$this->Fax->LinkCustomAttributes = "";
			$this->Fax->HrefValue = "";

			// EEmail
			$this->EEmail->LinkCustomAttributes = "";
			$this->EEmail->HrefValue = "";

			// HospID
			$this->HospID->LinkCustomAttributes = "";
			$this->HospID->HrefValue = "";

			// createdby
			$this->createdby->LinkCustomAttributes = "";
			$this->createdby->HrefValue = "";

			// createddatetime
			$this->createddatetime->LinkCustomAttributes = "";
			$this->createddatetime->HrefValue = "";

			// PharmacyID
			$this->PharmacyID->LinkCustomAttributes = "";
			$this->PharmacyID->HrefValue = "";

			// BillTotalValue
			$this->BillTotalValue->LinkCustomAttributes = "";
			$this->BillTotalValue->HrefValue = "";

			// GRNTotalValue
			$this->GRNTotalValue->LinkCustomAttributes = "";
			$this->GRNTotalValue->HrefValue = "";

			// BillDiscount
			$this->BillDiscount->LinkCustomAttributes = "";
			$this->BillDiscount->HrefValue = "";

			// BillUpload
			$this->BillUpload->LinkCustomAttributes = "";
			$this->BillUpload->HrefValue = "";

			// TransPort
			$this->TransPort->LinkCustomAttributes = "";
			$this->TransPort->HrefValue = "";

			// AnyOther
			$this->AnyOther->LinkCustomAttributes = "";
			$this->AnyOther->HrefValue = "";

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

			// BankName
			$this->BankName->LinkCustomAttributes = "";
			$this->BankName->HrefValue = "";

			// AccountNumber
			$this->AccountNumber->LinkCustomAttributes = "";
			$this->AccountNumber->HrefValue = "";

			// chequeNumber
			$this->chequeNumber->LinkCustomAttributes = "";
			$this->chequeNumber->HrefValue = "";

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

			// CardNumber
			$this->CardNumber->LinkCustomAttributes = "";
			$this->CardNumber->HrefValue = "";
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
		if ($this->PAYNO->Required) {
			if (!$this->PAYNO->IsDetailKey && $this->PAYNO->FormValue != NULL && $this->PAYNO->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PAYNO->caption(), $this->PAYNO->RequiredErrorMessage));
			}
		}
		if ($this->DT->Required) {
			if (!$this->DT->IsDetailKey && $this->DT->FormValue != NULL && $this->DT->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->DT->caption(), $this->DT->RequiredErrorMessage));
			}
		}
		if (!CheckEuroDate($this->DT->FormValue)) {
			AddMessage($FormError, $this->DT->errorMessage());
		}
		if ($this->YM->Required) {
			if (!$this->YM->IsDetailKey && $this->YM->FormValue != NULL && $this->YM->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->YM->caption(), $this->YM->RequiredErrorMessage));
			}
		}
		if ($this->PC->Required) {
			if (!$this->PC->IsDetailKey && $this->PC->FormValue != NULL && $this->PC->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PC->caption(), $this->PC->RequiredErrorMessage));
			}
		}
		if ($this->Customercode->Required) {
			if (!$this->Customercode->IsDetailKey && $this->Customercode->FormValue != NULL && $this->Customercode->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Customercode->caption(), $this->Customercode->RequiredErrorMessage));
			}
		}
		if ($this->Customername->Required) {
			if (!$this->Customername->IsDetailKey && $this->Customername->FormValue != NULL && $this->Customername->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Customername->caption(), $this->Customername->RequiredErrorMessage));
			}
		}
		if ($this->pharmacy_pocol->Required) {
			if (!$this->pharmacy_pocol->IsDetailKey && $this->pharmacy_pocol->FormValue != NULL && $this->pharmacy_pocol->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->pharmacy_pocol->caption(), $this->pharmacy_pocol->RequiredErrorMessage));
			}
		}
		if ($this->Address1->Required) {
			if (!$this->Address1->IsDetailKey && $this->Address1->FormValue != NULL && $this->Address1->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Address1->caption(), $this->Address1->RequiredErrorMessage));
			}
		}
		if ($this->Address2->Required) {
			if (!$this->Address2->IsDetailKey && $this->Address2->FormValue != NULL && $this->Address2->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Address2->caption(), $this->Address2->RequiredErrorMessage));
			}
		}
		if ($this->Address3->Required) {
			if (!$this->Address3->IsDetailKey && $this->Address3->FormValue != NULL && $this->Address3->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Address3->caption(), $this->Address3->RequiredErrorMessage));
			}
		}
		if ($this->State->Required) {
			if (!$this->State->IsDetailKey && $this->State->FormValue != NULL && $this->State->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->State->caption(), $this->State->RequiredErrorMessage));
			}
		}
		if ($this->Pincode->Required) {
			if (!$this->Pincode->IsDetailKey && $this->Pincode->FormValue != NULL && $this->Pincode->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Pincode->caption(), $this->Pincode->RequiredErrorMessage));
			}
		}
		if ($this->Phone->Required) {
			if (!$this->Phone->IsDetailKey && $this->Phone->FormValue != NULL && $this->Phone->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Phone->caption(), $this->Phone->RequiredErrorMessage));
			}
		}
		if ($this->Fax->Required) {
			if (!$this->Fax->IsDetailKey && $this->Fax->FormValue != NULL && $this->Fax->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Fax->caption(), $this->Fax->RequiredErrorMessage));
			}
		}
		if ($this->EEmail->Required) {
			if (!$this->EEmail->IsDetailKey && $this->EEmail->FormValue != NULL && $this->EEmail->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->EEmail->caption(), $this->EEmail->RequiredErrorMessage));
			}
		}
		if ($this->HospID->Required) {
			if (!$this->HospID->IsDetailKey && $this->HospID->FormValue != NULL && $this->HospID->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->HospID->caption(), $this->HospID->RequiredErrorMessage));
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
		if ($this->PharmacyID->Required) {
			if (!$this->PharmacyID->IsDetailKey && $this->PharmacyID->FormValue != NULL && $this->PharmacyID->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PharmacyID->caption(), $this->PharmacyID->RequiredErrorMessage));
			}
		}
		if ($this->BillTotalValue->Required) {
			if (!$this->BillTotalValue->IsDetailKey && $this->BillTotalValue->FormValue != NULL && $this->BillTotalValue->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->BillTotalValue->caption(), $this->BillTotalValue->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->BillTotalValue->FormValue)) {
			AddMessage($FormError, $this->BillTotalValue->errorMessage());
		}
		if ($this->GRNTotalValue->Required) {
			if (!$this->GRNTotalValue->IsDetailKey && $this->GRNTotalValue->FormValue != NULL && $this->GRNTotalValue->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->GRNTotalValue->caption(), $this->GRNTotalValue->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->GRNTotalValue->FormValue)) {
			AddMessage($FormError, $this->GRNTotalValue->errorMessage());
		}
		if ($this->BillDiscount->Required) {
			if (!$this->BillDiscount->IsDetailKey && $this->BillDiscount->FormValue != NULL && $this->BillDiscount->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->BillDiscount->caption(), $this->BillDiscount->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->BillDiscount->FormValue)) {
			AddMessage($FormError, $this->BillDiscount->errorMessage());
		}
		if ($this->BillUpload->Required) {
			if (!$this->BillUpload->IsDetailKey && $this->BillUpload->FormValue != NULL && $this->BillUpload->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->BillUpload->caption(), $this->BillUpload->RequiredErrorMessage));
			}
		}
		if ($this->TransPort->Required) {
			if (!$this->TransPort->IsDetailKey && $this->TransPort->FormValue != NULL && $this->TransPort->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->TransPort->caption(), $this->TransPort->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->TransPort->FormValue)) {
			AddMessage($FormError, $this->TransPort->errorMessage());
		}
		if ($this->AnyOther->Required) {
			if (!$this->AnyOther->IsDetailKey && $this->AnyOther->FormValue != NULL && $this->AnyOther->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->AnyOther->caption(), $this->AnyOther->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->AnyOther->FormValue)) {
			AddMessage($FormError, $this->AnyOther->errorMessage());
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
		if ($this->BankName->Required) {
			if (!$this->BankName->IsDetailKey && $this->BankName->FormValue != NULL && $this->BankName->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->BankName->caption(), $this->BankName->RequiredErrorMessage));
			}
		}
		if ($this->AccountNumber->Required) {
			if (!$this->AccountNumber->IsDetailKey && $this->AccountNumber->FormValue != NULL && $this->AccountNumber->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->AccountNumber->caption(), $this->AccountNumber->RequiredErrorMessage));
			}
		}
		if ($this->chequeNumber->Required) {
			if (!$this->chequeNumber->IsDetailKey && $this->chequeNumber->FormValue != NULL && $this->chequeNumber->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->chequeNumber->caption(), $this->chequeNumber->RequiredErrorMessage));
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

		// Validate detail grid
		$detailTblVar = explode(",", $this->getCurrentDetailTable());
		if (in_array("pharmacy_grn", $detailTblVar) && $GLOBALS["pharmacy_grn"]->DetailAdd) {
			if (!isset($GLOBALS["pharmacy_grn_grid"]))
				$GLOBALS["pharmacy_grn_grid"] = new pharmacy_grn_grid(); // Get detail page object
			$GLOBALS["pharmacy_grn_grid"]->validateGridForm();
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

		// PAYNO
		$this->PAYNO->setDbValueDef($rsnew, $this->PAYNO->CurrentValue, NULL, FALSE);

		// DT
		$this->DT->setDbValueDef($rsnew, UnFormatDateTime($this->DT->CurrentValue, 7), NULL, FALSE);

		// YM
		$this->YM->setDbValueDef($rsnew, $this->YM->CurrentValue, NULL, FALSE);

		// PC
		$this->PC->setDbValueDef($rsnew, $this->PC->CurrentValue, NULL, FALSE);

		// Customercode
		$this->Customercode->setDbValueDef($rsnew, $this->Customercode->CurrentValue, NULL, FALSE);

		// Customername
		$this->Customername->setDbValueDef($rsnew, $this->Customername->CurrentValue, NULL, FALSE);

		// pharmacy_pocol
		$this->pharmacy_pocol->setDbValueDef($rsnew, $this->pharmacy_pocol->CurrentValue, NULL, FALSE);

		// Address1
		$this->Address1->setDbValueDef($rsnew, $this->Address1->CurrentValue, NULL, FALSE);

		// Address2
		$this->Address2->setDbValueDef($rsnew, $this->Address2->CurrentValue, NULL, FALSE);

		// Address3
		$this->Address3->setDbValueDef($rsnew, $this->Address3->CurrentValue, NULL, FALSE);

		// State
		$this->State->setDbValueDef($rsnew, $this->State->CurrentValue, NULL, FALSE);

		// Pincode
		$this->Pincode->setDbValueDef($rsnew, $this->Pincode->CurrentValue, NULL, FALSE);

		// Phone
		$this->Phone->setDbValueDef($rsnew, $this->Phone->CurrentValue, NULL, FALSE);

		// Fax
		$this->Fax->setDbValueDef($rsnew, $this->Fax->CurrentValue, NULL, FALSE);

		// EEmail
		$this->EEmail->setDbValueDef($rsnew, $this->EEmail->CurrentValue, NULL, FALSE);

		// HospID
		$this->HospID->setDbValueDef($rsnew, HospitalID(), NULL);
		$rsnew['HospID'] = &$this->HospID->DbValue;

		// createdby
		$this->createdby->setDbValueDef($rsnew, CurrentUserName(), NULL);
		$rsnew['createdby'] = &$this->createdby->DbValue;

		// createddatetime
		$this->createddatetime->setDbValueDef($rsnew, CurrentDateTime(), NULL);
		$rsnew['createddatetime'] = &$this->createddatetime->DbValue;

		// PharmacyID
		$this->PharmacyID->setDbValueDef($rsnew, PharmacyID(), NULL);
		$rsnew['PharmacyID'] = &$this->PharmacyID->DbValue;

		// BillTotalValue
		$this->BillTotalValue->setDbValueDef($rsnew, $this->BillTotalValue->CurrentValue, NULL, FALSE);

		// GRNTotalValue
		$this->GRNTotalValue->setDbValueDef($rsnew, $this->GRNTotalValue->CurrentValue, NULL, FALSE);

		// BillDiscount
		$this->BillDiscount->setDbValueDef($rsnew, $this->BillDiscount->CurrentValue, NULL, FALSE);

		// BillUpload
		$this->BillUpload->setDbValueDef($rsnew, $this->BillUpload->CurrentValue, NULL, FALSE);

		// TransPort
		$this->TransPort->setDbValueDef($rsnew, $this->TransPort->CurrentValue, NULL, FALSE);

		// AnyOther
		$this->AnyOther->setDbValueDef($rsnew, $this->AnyOther->CurrentValue, NULL, FALSE);

		// voucher_type
		$this->voucher_type->setDbValueDef($rsnew, $this->voucher_type->CurrentValue, NULL, FALSE);

		// Details
		$this->Details->setDbValueDef($rsnew, $this->Details->CurrentValue, NULL, FALSE);

		// ModeofPayment
		$this->ModeofPayment->setDbValueDef($rsnew, $this->ModeofPayment->CurrentValue, NULL, FALSE);

		// Amount
		$this->Amount->setDbValueDef($rsnew, $this->Amount->CurrentValue, NULL, FALSE);

		// BankName
		$this->BankName->setDbValueDef($rsnew, $this->BankName->CurrentValue, NULL, FALSE);

		// AccountNumber
		$this->AccountNumber->setDbValueDef($rsnew, $this->AccountNumber->CurrentValue, NULL, FALSE);

		// chequeNumber
		$this->chequeNumber->setDbValueDef($rsnew, $this->chequeNumber->CurrentValue, NULL, FALSE);

		// Remarks
		$this->Remarks->setDbValueDef($rsnew, $this->Remarks->CurrentValue, NULL, FALSE);

		// SeectPaymentMode
		$this->SeectPaymentMode->setDbValueDef($rsnew, $this->SeectPaymentMode->CurrentValue, NULL, FALSE);

		// PaidAmount
		$this->PaidAmount->setDbValueDef($rsnew, $this->PaidAmount->CurrentValue, NULL, FALSE);

		// Currency
		$this->Currency->setDbValueDef($rsnew, $this->Currency->CurrentValue, NULL, FALSE);

		// CardNumber
		$this->CardNumber->setDbValueDef($rsnew, $this->CardNumber->CurrentValue, NULL, FALSE);

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
			if (in_array("pharmacy_grn", $detailTblVar) && $GLOBALS["pharmacy_grn"]->DetailAdd) {
				$GLOBALS["pharmacy_grn"]->Pid->setSessionValue($this->id->CurrentValue); // Set master key
				if (!isset($GLOBALS["pharmacy_grn_grid"]))
					$GLOBALS["pharmacy_grn_grid"] = new pharmacy_grn_grid(); // Get detail page object
				$Security->loadCurrentUserLevel($this->ProjectID . "pharmacy_grn"); // Load user level of detail table
				$addRow = $GLOBALS["pharmacy_grn_grid"]->gridInsert();
				$Security->loadCurrentUserLevel($this->ProjectID . $this->TableName); // Restore user level of master table
				if (!$addRow)
					$GLOBALS["pharmacy_grn"]->Pid->setSessionValue(""); // Clear master key if insert failed
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
			if (in_array("pharmacy_grn", $detailTblVar)) {
				if (!isset($GLOBALS["pharmacy_grn_grid"]))
					$GLOBALS["pharmacy_grn_grid"] = new pharmacy_grn_grid();
				if ($GLOBALS["pharmacy_grn_grid"]->DetailAdd) {
					if ($this->CopyRecord)
						$GLOBALS["pharmacy_grn_grid"]->CurrentMode = "copy";
					else
						$GLOBALS["pharmacy_grn_grid"]->CurrentMode = "add";
					$GLOBALS["pharmacy_grn_grid"]->CurrentAction = "gridadd";

					// Save current master table to detail table
					$GLOBALS["pharmacy_grn_grid"]->setCurrentMasterTable($this->TableVar);
					$GLOBALS["pharmacy_grn_grid"]->setStartRecordNumber(1);
					$GLOBALS["pharmacy_grn_grid"]->Pid->IsDetailKey = TRUE;
					$GLOBALS["pharmacy_grn_grid"]->Pid->CurrentValue = $this->id->CurrentValue;
					$GLOBALS["pharmacy_grn_grid"]->Pid->setSessionValue($GLOBALS["pharmacy_grn_grid"]->Pid->CurrentValue);
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
		$Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("pharmacy_paymentlist.php"), "", $this->TableVar, TRUE);
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
				case "x_pharmacy_pocol":
					$lookupFilter = function() {
						return "`HospId`='".HospitalID()."'";
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
						case "x_Customername":
							break;
						case "x_pharmacy_pocol":
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
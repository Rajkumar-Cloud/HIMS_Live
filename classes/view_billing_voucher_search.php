<?php
namespace PHPMaker2019\HIMS;

/**
 * Page class
 */
class view_billing_voucher_search extends view_billing_voucher
{

	// Page ID
	public $PageID = "search";

	// Project ID
	public $ProjectID = "{EA4F6D13-AF8F-428D-9EA7-BA88D1107EC3}";

	// Table name
	public $TableName = 'view_billing_voucher';

	// Page object name
	public $PageObjName = "view_billing_voucher_search";

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

		// Table object (view_billing_voucher)
		if (!isset($GLOBALS["view_billing_voucher"]) || get_class($GLOBALS["view_billing_voucher"]) == PROJECT_NAMESPACE . "view_billing_voucher") {
			$GLOBALS["view_billing_voucher"] = &$this;
			$GLOBALS["Table"] = &$GLOBALS["view_billing_voucher"];
		}
		$this->CancelUrl = $this->pageUrl() . "action=cancel";

		// Table object (user_login)
		if (!isset($GLOBALS['user_login']))
			$GLOBALS['user_login'] = new user_login();

		// Page ID
		if (!defined(PROJECT_NAMESPACE . "PAGE_ID"))
			define(PROJECT_NAMESPACE . "PAGE_ID", 'search');

		// Table name (for backward compatibility)
		if (!defined(PROJECT_NAMESPACE . "TABLE_NAME"))
			define(PROJECT_NAMESPACE . "TABLE_NAME", 'view_billing_voucher');

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
		global $EXPORT, $view_billing_voucher;
		if ($this->CustomExport && $this->CustomExport == $this->Export && array_key_exists($this->CustomExport, $EXPORT)) {
				$content = ob_get_contents();
			if ($ExportFileName == "")
				$ExportFileName = $this->TableVar;
			$class = PROJECT_NAMESPACE . $EXPORT[$this->CustomExport];
			if (class_exists($class)) {
				$doc = new $class($view_billing_voucher);
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
					if ($pageName == "view_billing_voucherview.php")
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
	public $FormClassName = "ew-horizontal ew-form ew-search-form";
	public $IsModal = FALSE;
	public $IsMobileOrModal = FALSE;

	//
	// Page run
	//

	public function run()
	{
		global $ExportType, $CustomExportType, $ExportFileName, $UserProfile, $Language, $Security, $RequestSecurity, $CurrentForm,
			$SearchError, $SkipHeaderFooter;

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
			if (!$Security->canSearch()) {
				$Security->saveLastUrl();
				$this->setFailureMessage(DeniedMessage()); // Set no permission
				if ($Security->canList())
					$this->terminate(GetUrl("view_billing_voucherlist.php"));
				else
					$this->terminate(GetUrl("login.php"));
				return;
			}
		}

		// Create form object
		$CurrentForm = new HttpForm();
		$this->CurrentAction = Param("action"); // Set up current action
		$this->id->setVisibility();
		$this->createddatetime->setVisibility();
		$this->BillNumber->setVisibility();
		$this->Reception->setVisibility();
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
		$this->DiscountAmount->setVisibility();
		$this->createdby->setVisibility();
		$this->modifiedby->setVisibility();
		$this->modifieddatetime->setVisibility();
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
		$this->PatId->setVisibility();
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
		$this->BillClosing->setVisibility();
		$this->GoogleReviewID->setVisibility();
		$this->CardType->setVisibility();
		$this->PharmacyBill->setVisibility();
		$this->cash->setVisibility();
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
		$this->setupLookupOptions($this->ModeofPayment);
		$this->setupLookupOptions($this->CId);
		$this->setupLookupOptions($this->PatId);
		$this->setupLookupOptions($this->RefferedBy);
		$this->setupLookupOptions($this->DrID);

		// Set up Breadcrumb
		$this->setupBreadcrumb();

		// Check modal
		if ($this->IsModal)
			$SkipHeaderFooter = TRUE;
		$this->IsMobileOrModal = IsMobile() || $this->IsModal;
		if ($this->isPageRequest()) { // Validate request

			// Get action
			$this->CurrentAction = Post("action");
			if ($this->isSearch()) {

				// Build search string for advanced search, remove blank field
				$this->loadSearchValues(); // Get search values
				if ($this->validateSearch()) {
					$srchStr = $this->buildAdvancedSearch();
				} else {
					$srchStr = "";
					$this->setFailureMessage($SearchError);
				}
				if ($srchStr <> "") {
					$srchStr = $this->getUrlParm($srchStr);
					$srchStr = "view_billing_voucherlist.php" . "?" . $srchStr;
					$this->terminate($srchStr); // Go to list page
				}
			}
		}

		// Restore search settings from Session
		if ($SearchError == "")
			$this->loadAdvancedSearch();

		// Render row for search
		$this->RowType = ROWTYPE_SEARCH;
		$this->resetAttributes();
		$this->renderRow();
	}

	// Build advanced search
	protected function buildAdvancedSearch()
	{
		$srchUrl = "";
		$this->buildSearchUrl($srchUrl, $this->id); // id
		$this->buildSearchUrl($srchUrl, $this->createddatetime); // createddatetime
		$this->buildSearchUrl($srchUrl, $this->BillNumber); // BillNumber
		$this->buildSearchUrl($srchUrl, $this->Reception); // Reception
		$this->buildSearchUrl($srchUrl, $this->PatientId); // PatientId
		$this->buildSearchUrl($srchUrl, $this->mrnno); // mrnno
		$this->buildSearchUrl($srchUrl, $this->PatientName); // PatientName
		$this->buildSearchUrl($srchUrl, $this->Age); // Age
		$this->buildSearchUrl($srchUrl, $this->Gender); // Gender
		$this->buildSearchUrl($srchUrl, $this->profilePic); // profilePic
		$this->buildSearchUrl($srchUrl, $this->Mobile); // Mobile
		$this->buildSearchUrl($srchUrl, $this->IP_OP); // IP_OP
		$this->buildSearchUrl($srchUrl, $this->Doctor); // Doctor
		$this->buildSearchUrl($srchUrl, $this->voucher_type); // voucher_type
		$this->buildSearchUrl($srchUrl, $this->Details); // Details
		$this->buildSearchUrl($srchUrl, $this->ModeofPayment); // ModeofPayment
		$this->buildSearchUrl($srchUrl, $this->Amount); // Amount
		$this->buildSearchUrl($srchUrl, $this->AnyDues); // AnyDues
		$this->buildSearchUrl($srchUrl, $this->DiscountAmount); // DiscountAmount
		$this->buildSearchUrl($srchUrl, $this->createdby); // createdby
		$this->buildSearchUrl($srchUrl, $this->modifiedby); // modifiedby
		$this->buildSearchUrl($srchUrl, $this->modifieddatetime); // modifieddatetime
		$this->buildSearchUrl($srchUrl, $this->RealizationAmount); // RealizationAmount
		$this->buildSearchUrl($srchUrl, $this->RealizationStatus); // RealizationStatus
		$this->buildSearchUrl($srchUrl, $this->RealizationRemarks); // RealizationRemarks
		$this->buildSearchUrl($srchUrl, $this->RealizationBatchNo); // RealizationBatchNo
		$this->buildSearchUrl($srchUrl, $this->RealizationDate); // RealizationDate
		$this->buildSearchUrl($srchUrl, $this->HospID); // HospID
		$this->buildSearchUrl($srchUrl, $this->RIDNO); // RIDNO
		$this->buildSearchUrl($srchUrl, $this->TidNo); // TidNo
		$this->buildSearchUrl($srchUrl, $this->CId); // CId
		$this->buildSearchUrl($srchUrl, $this->PartnerName); // PartnerName
		$this->buildSearchUrl($srchUrl, $this->PayerType); // PayerType
		$this->buildSearchUrl($srchUrl, $this->Dob); // Dob
		$this->buildSearchUrl($srchUrl, $this->Currency); // Currency
		$this->buildSearchUrl($srchUrl, $this->DiscountRemarks); // DiscountRemarks
		$this->buildSearchUrl($srchUrl, $this->Remarks); // Remarks
		$this->buildSearchUrl($srchUrl, $this->PatId); // PatId
		$this->buildSearchUrl($srchUrl, $this->DrDepartment); // DrDepartment
		$this->buildSearchUrl($srchUrl, $this->RefferedBy); // RefferedBy
		$this->buildSearchUrl($srchUrl, $this->CardNumber); // CardNumber
		$this->buildSearchUrl($srchUrl, $this->BankName); // BankName
		$this->buildSearchUrl($srchUrl, $this->DrID); // DrID
		$this->buildSearchUrl($srchUrl, $this->BillStatus); // BillStatus
		$this->buildSearchUrl($srchUrl, $this->ReportHeader); // ReportHeader
		$this->buildSearchUrl($srchUrl, $this->UserName); // UserName
		$this->buildSearchUrl($srchUrl, $this->AdjustmentAdvance); // AdjustmentAdvance
		$this->buildSearchUrl($srchUrl, $this->billing_vouchercol); // billing_vouchercol
		$this->buildSearchUrl($srchUrl, $this->BillType); // BillType
		$this->buildSearchUrl($srchUrl, $this->ProcedureName); // ProcedureName
		$this->buildSearchUrl($srchUrl, $this->ProcedureAmount); // ProcedureAmount
		$this->buildSearchUrl($srchUrl, $this->IncludePackage); // IncludePackage
		$this->buildSearchUrl($srchUrl, $this->CancelBill); // CancelBill
		$this->buildSearchUrl($srchUrl, $this->CancelReason); // CancelReason
		$this->buildSearchUrl($srchUrl, $this->CancelModeOfPayment); // CancelModeOfPayment
		$this->buildSearchUrl($srchUrl, $this->CancelAmount); // CancelAmount
		$this->buildSearchUrl($srchUrl, $this->CancelBankName); // CancelBankName
		$this->buildSearchUrl($srchUrl, $this->CancelTransactionNumber); // CancelTransactionNumber
		$this->buildSearchUrl($srchUrl, $this->LabTest); // LabTest
		$this->buildSearchUrl($srchUrl, $this->sid); // sid
		$this->buildSearchUrl($srchUrl, $this->SidNo); // SidNo
		$this->buildSearchUrl($srchUrl, $this->createdDatettime); // createdDatettime
		$this->buildSearchUrl($srchUrl, $this->BillClosing); // BillClosing
		$this->buildSearchUrl($srchUrl, $this->GoogleReviewID); // GoogleReviewID
		$this->buildSearchUrl($srchUrl, $this->CardType); // CardType
		$this->buildSearchUrl($srchUrl, $this->PharmacyBill); // PharmacyBill
		$this->buildSearchUrl($srchUrl, $this->cash); // cash
		$this->buildSearchUrl($srchUrl, $this->Card); // Card
		if ($srchUrl <> "")
			$srchUrl .= "&";
		$srchUrl .= "cmd=search";
		return $srchUrl;
	}

	// Build search URL
	protected function buildSearchUrl(&$url, &$fld, $oprOnly = FALSE)
	{
		global $CurrentForm;
		$wrk = "";
		$fldParm = $fld->Param;
		$fldVal = $CurrentForm->getValue("x_$fldParm");
		$fldOpr = $CurrentForm->getValue("z_$fldParm");
		$fldCond = $CurrentForm->getValue("v_$fldParm");
		$fldVal2 = $CurrentForm->getValue("y_$fldParm");
		$fldOpr2 = $CurrentForm->getValue("w_$fldParm");
		if (is_array($fldVal))
			$fldVal = implode(",", $fldVal);
		if (is_array($fldVal2))
			$fldVal2 = implode(",", $fldVal2);
		$fldOpr = strtoupper(trim($fldOpr));
		$fldDataType = ($fld->IsVirtual) ? DATATYPE_STRING : $fld->DataType;
		if ($fldOpr == "BETWEEN") {
			$isValidValue = ($fldDataType <> DATATYPE_NUMBER) ||
				($fldDataType == DATATYPE_NUMBER && $this->searchValueIsNumeric($fld, $fldVal) && $this->searchValueIsNumeric($fld, $fldVal2));
			if ($fldVal <> "" && $fldVal2 <> "" && $isValidValue) {
				$wrk = "x_" . $fldParm . "=" . urlencode($fldVal) .
					"&y_" . $fldParm . "=" . urlencode($fldVal2) .
					"&z_" . $fldParm . "=" . urlencode($fldOpr);
			}
		} else {
			$isValidValue = ($fldDataType <> DATATYPE_NUMBER) ||
				($fldDataType == DATATYPE_NUMBER && $this->searchValueIsNumeric($fld, $fldVal));
			if ($fldVal <> "" && $isValidValue && IsValidOpr($fldOpr, $fldDataType)) {
				$wrk = "x_" . $fldParm . "=" . urlencode($fldVal) .
					"&z_" . $fldParm . "=" . urlencode($fldOpr);
			} elseif ($fldOpr == "IS NULL" || $fldOpr == "IS NOT NULL" || ($fldOpr <> "" && $oprOnly && IsValidOpr($fldOpr, $fldDataType))) {
				$wrk = "z_" . $fldParm . "=" . urlencode($fldOpr);
			}
			$isValidValue = ($fldDataType <> DATATYPE_NUMBER) ||
				($fldDataType == DATATYPE_NUMBER && $this->searchValueIsNumeric($fld, $fldVal2));
			if ($fldVal2 <> "" && $isValidValue && IsValidOpr($fldOpr2, $fldDataType)) {
				if ($wrk <> "")
					$wrk .= "&v_" . $fldParm . "=" . urlencode($fldCond) . "&";
				$wrk .= "y_" . $fldParm . "=" . urlencode($fldVal2) .
					"&w_" . $fldParm . "=" . urlencode($fldOpr2);
			} elseif ($fldOpr2 == "IS NULL" || $fldOpr2 == "IS NOT NULL" || ($fldOpr2 <> "" && $oprOnly && IsValidOpr($fldOpr2, $fldDataType))) {
				if ($wrk <> "")
					$wrk .= "&v_" . $fldParm . "=" . urlencode($fldCond) . "&";
				$wrk .= "w_" . $fldParm . "=" . urlencode($fldOpr2);
			}
		}
		if ($wrk <> "") {
			if ($url <> "")
				$url .= "&";
			$url .= $wrk;
		}
	}
	protected function searchValueIsNumeric($fld, $value)
	{
		if (IsFloatFormat($fld->Type))
			$value = ConvertToFloatString($value);
		return is_numeric($value);
	}

	// Load search values for validation
	protected function loadSearchValues()
	{
		global $CurrentForm;

		// Load search values
		// id

		if (!$this->isAddOrEdit())
			$this->id->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_id"));
		$this->id->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_id"));

		// createddatetime
		if (!$this->isAddOrEdit())
			$this->createddatetime->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_createddatetime"));
		$this->createddatetime->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_createddatetime"));
		$this->createddatetime->AdvancedSearch->setSearchCondition($CurrentForm->getValue("v_createddatetime"));
		$this->createddatetime->AdvancedSearch->setSearchValue2($CurrentForm->getValue("y_createddatetime"));
		$this->createddatetime->AdvancedSearch->setSearchOperator2($CurrentForm->getValue("w_createddatetime"));

		// BillNumber
		if (!$this->isAddOrEdit())
			$this->BillNumber->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_BillNumber"));
		$this->BillNumber->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_BillNumber"));

		// Reception
		if (!$this->isAddOrEdit())
			$this->Reception->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_Reception"));
		$this->Reception->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_Reception"));

		// PatientId
		if (!$this->isAddOrEdit())
			$this->PatientId->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_PatientId"));
		$this->PatientId->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_PatientId"));

		// mrnno
		if (!$this->isAddOrEdit())
			$this->mrnno->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_mrnno"));
		$this->mrnno->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_mrnno"));

		// PatientName
		if (!$this->isAddOrEdit())
			$this->PatientName->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_PatientName"));
		$this->PatientName->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_PatientName"));

		// Age
		if (!$this->isAddOrEdit())
			$this->Age->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_Age"));
		$this->Age->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_Age"));

		// Gender
		if (!$this->isAddOrEdit())
			$this->Gender->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_Gender"));
		$this->Gender->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_Gender"));

		// profilePic
		if (!$this->isAddOrEdit())
			$this->profilePic->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_profilePic"));
		$this->profilePic->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_profilePic"));

		// Mobile
		if (!$this->isAddOrEdit())
			$this->Mobile->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_Mobile"));
		$this->Mobile->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_Mobile"));

		// IP_OP
		if (!$this->isAddOrEdit())
			$this->IP_OP->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_IP_OP"));
		$this->IP_OP->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_IP_OP"));

		// Doctor
		if (!$this->isAddOrEdit())
			$this->Doctor->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_Doctor"));
		$this->Doctor->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_Doctor"));

		// voucher_type
		if (!$this->isAddOrEdit())
			$this->voucher_type->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_voucher_type"));
		$this->voucher_type->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_voucher_type"));

		// Details
		if (!$this->isAddOrEdit())
			$this->Details->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_Details"));
		$this->Details->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_Details"));

		// ModeofPayment
		if (!$this->isAddOrEdit())
			$this->ModeofPayment->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_ModeofPayment"));
		$this->ModeofPayment->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_ModeofPayment"));

		// Amount
		if (!$this->isAddOrEdit())
			$this->Amount->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_Amount"));
		$this->Amount->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_Amount"));

		// AnyDues
		if (!$this->isAddOrEdit())
			$this->AnyDues->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_AnyDues"));
		$this->AnyDues->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_AnyDues"));

		// DiscountAmount
		if (!$this->isAddOrEdit())
			$this->DiscountAmount->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_DiscountAmount"));
		$this->DiscountAmount->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_DiscountAmount"));

		// createdby
		if (!$this->isAddOrEdit())
			$this->createdby->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_createdby"));
		$this->createdby->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_createdby"));

		// modifiedby
		if (!$this->isAddOrEdit())
			$this->modifiedby->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_modifiedby"));
		$this->modifiedby->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_modifiedby"));

		// modifieddatetime
		if (!$this->isAddOrEdit())
			$this->modifieddatetime->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_modifieddatetime"));
		$this->modifieddatetime->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_modifieddatetime"));

		// RealizationAmount
		if (!$this->isAddOrEdit())
			$this->RealizationAmount->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_RealizationAmount"));
		$this->RealizationAmount->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_RealizationAmount"));

		// RealizationStatus
		if (!$this->isAddOrEdit())
			$this->RealizationStatus->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_RealizationStatus"));
		$this->RealizationStatus->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_RealizationStatus"));

		// RealizationRemarks
		if (!$this->isAddOrEdit())
			$this->RealizationRemarks->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_RealizationRemarks"));
		$this->RealizationRemarks->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_RealizationRemarks"));

		// RealizationBatchNo
		if (!$this->isAddOrEdit())
			$this->RealizationBatchNo->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_RealizationBatchNo"));
		$this->RealizationBatchNo->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_RealizationBatchNo"));

		// RealizationDate
		if (!$this->isAddOrEdit())
			$this->RealizationDate->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_RealizationDate"));
		$this->RealizationDate->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_RealizationDate"));

		// HospID
		if (!$this->isAddOrEdit())
			$this->HospID->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_HospID"));
		$this->HospID->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_HospID"));

		// RIDNO
		if (!$this->isAddOrEdit())
			$this->RIDNO->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_RIDNO"));
		$this->RIDNO->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_RIDNO"));

		// TidNo
		if (!$this->isAddOrEdit())
			$this->TidNo->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_TidNo"));
		$this->TidNo->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_TidNo"));

		// CId
		if (!$this->isAddOrEdit())
			$this->CId->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_CId"));
		$this->CId->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_CId"));

		// PartnerName
		if (!$this->isAddOrEdit())
			$this->PartnerName->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_PartnerName"));
		$this->PartnerName->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_PartnerName"));

		// PayerType
		if (!$this->isAddOrEdit())
			$this->PayerType->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_PayerType"));
		$this->PayerType->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_PayerType"));

		// Dob
		if (!$this->isAddOrEdit())
			$this->Dob->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_Dob"));
		$this->Dob->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_Dob"));

		// Currency
		if (!$this->isAddOrEdit())
			$this->Currency->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_Currency"));
		$this->Currency->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_Currency"));

		// DiscountRemarks
		if (!$this->isAddOrEdit())
			$this->DiscountRemarks->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_DiscountRemarks"));
		$this->DiscountRemarks->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_DiscountRemarks"));

		// Remarks
		if (!$this->isAddOrEdit())
			$this->Remarks->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_Remarks"));
		$this->Remarks->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_Remarks"));

		// PatId
		if (!$this->isAddOrEdit())
			$this->PatId->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_PatId"));
		$this->PatId->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_PatId"));

		// DrDepartment
		if (!$this->isAddOrEdit())
			$this->DrDepartment->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_DrDepartment"));
		$this->DrDepartment->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_DrDepartment"));

		// RefferedBy
		if (!$this->isAddOrEdit())
			$this->RefferedBy->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_RefferedBy"));
		$this->RefferedBy->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_RefferedBy"));

		// CardNumber
		if (!$this->isAddOrEdit())
			$this->CardNumber->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_CardNumber"));
		$this->CardNumber->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_CardNumber"));

		// BankName
		if (!$this->isAddOrEdit())
			$this->BankName->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_BankName"));
		$this->BankName->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_BankName"));

		// DrID
		if (!$this->isAddOrEdit())
			$this->DrID->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_DrID"));
		$this->DrID->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_DrID"));

		// BillStatus
		if (!$this->isAddOrEdit())
			$this->BillStatus->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_BillStatus"));
		$this->BillStatus->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_BillStatus"));

		// ReportHeader
		if (!$this->isAddOrEdit())
			$this->ReportHeader->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_ReportHeader"));
		$this->ReportHeader->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_ReportHeader"));
		if (is_array($this->ReportHeader->AdvancedSearch->SearchValue))
			$this->ReportHeader->AdvancedSearch->SearchValue = implode(",", $this->ReportHeader->AdvancedSearch->SearchValue);
		if (is_array($this->ReportHeader->AdvancedSearch->SearchValue2))
			$this->ReportHeader->AdvancedSearch->SearchValue2 = implode(",", $this->ReportHeader->AdvancedSearch->SearchValue2);

		// UserName
		if (!$this->isAddOrEdit())
			$this->UserName->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_UserName"));
		$this->UserName->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_UserName"));

		// AdjustmentAdvance
		if (!$this->isAddOrEdit())
			$this->AdjustmentAdvance->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_AdjustmentAdvance"));
		$this->AdjustmentAdvance->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_AdjustmentAdvance"));
		if (is_array($this->AdjustmentAdvance->AdvancedSearch->SearchValue))
			$this->AdjustmentAdvance->AdvancedSearch->SearchValue = implode(",", $this->AdjustmentAdvance->AdvancedSearch->SearchValue);
		if (is_array($this->AdjustmentAdvance->AdvancedSearch->SearchValue2))
			$this->AdjustmentAdvance->AdvancedSearch->SearchValue2 = implode(",", $this->AdjustmentAdvance->AdvancedSearch->SearchValue2);

		// billing_vouchercol
		if (!$this->isAddOrEdit())
			$this->billing_vouchercol->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_billing_vouchercol"));
		$this->billing_vouchercol->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_billing_vouchercol"));

		// BillType
		if (!$this->isAddOrEdit())
			$this->BillType->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_BillType"));
		$this->BillType->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_BillType"));

		// ProcedureName
		if (!$this->isAddOrEdit())
			$this->ProcedureName->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_ProcedureName"));
		$this->ProcedureName->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_ProcedureName"));

		// ProcedureAmount
		if (!$this->isAddOrEdit())
			$this->ProcedureAmount->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_ProcedureAmount"));
		$this->ProcedureAmount->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_ProcedureAmount"));

		// IncludePackage
		if (!$this->isAddOrEdit())
			$this->IncludePackage->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_IncludePackage"));
		$this->IncludePackage->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_IncludePackage"));
		if (is_array($this->IncludePackage->AdvancedSearch->SearchValue))
			$this->IncludePackage->AdvancedSearch->SearchValue = implode(",", $this->IncludePackage->AdvancedSearch->SearchValue);
		if (is_array($this->IncludePackage->AdvancedSearch->SearchValue2))
			$this->IncludePackage->AdvancedSearch->SearchValue2 = implode(",", $this->IncludePackage->AdvancedSearch->SearchValue2);

		// CancelBill
		if (!$this->isAddOrEdit())
			$this->CancelBill->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_CancelBill"));
		$this->CancelBill->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_CancelBill"));

		// CancelReason
		if (!$this->isAddOrEdit())
			$this->CancelReason->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_CancelReason"));
		$this->CancelReason->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_CancelReason"));

		// CancelModeOfPayment
		if (!$this->isAddOrEdit())
			$this->CancelModeOfPayment->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_CancelModeOfPayment"));
		$this->CancelModeOfPayment->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_CancelModeOfPayment"));

		// CancelAmount
		if (!$this->isAddOrEdit())
			$this->CancelAmount->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_CancelAmount"));
		$this->CancelAmount->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_CancelAmount"));

		// CancelBankName
		if (!$this->isAddOrEdit())
			$this->CancelBankName->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_CancelBankName"));
		$this->CancelBankName->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_CancelBankName"));

		// CancelTransactionNumber
		if (!$this->isAddOrEdit())
			$this->CancelTransactionNumber->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_CancelTransactionNumber"));
		$this->CancelTransactionNumber->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_CancelTransactionNumber"));

		// LabTest
		if (!$this->isAddOrEdit())
			$this->LabTest->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_LabTest"));
		$this->LabTest->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_LabTest"));

		// sid
		if (!$this->isAddOrEdit())
			$this->sid->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_sid"));
		$this->sid->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_sid"));

		// SidNo
		if (!$this->isAddOrEdit())
			$this->SidNo->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_SidNo"));
		$this->SidNo->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_SidNo"));

		// createdDatettime
		if (!$this->isAddOrEdit())
			$this->createdDatettime->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_createdDatettime"));
		$this->createdDatettime->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_createdDatettime"));

		// BillClosing
		if (!$this->isAddOrEdit())
			$this->BillClosing->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_BillClosing"));
		$this->BillClosing->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_BillClosing"));
		if (is_array($this->BillClosing->AdvancedSearch->SearchValue))
			$this->BillClosing->AdvancedSearch->SearchValue = implode(",", $this->BillClosing->AdvancedSearch->SearchValue);
		if (is_array($this->BillClosing->AdvancedSearch->SearchValue2))
			$this->BillClosing->AdvancedSearch->SearchValue2 = implode(",", $this->BillClosing->AdvancedSearch->SearchValue2);

		// GoogleReviewID
		if (!$this->isAddOrEdit())
			$this->GoogleReviewID->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_GoogleReviewID"));
		$this->GoogleReviewID->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_GoogleReviewID"));
		if (is_array($this->GoogleReviewID->AdvancedSearch->SearchValue))
			$this->GoogleReviewID->AdvancedSearch->SearchValue = implode(",", $this->GoogleReviewID->AdvancedSearch->SearchValue);
		if (is_array($this->GoogleReviewID->AdvancedSearch->SearchValue2))
			$this->GoogleReviewID->AdvancedSearch->SearchValue2 = implode(",", $this->GoogleReviewID->AdvancedSearch->SearchValue2);

		// CardType
		if (!$this->isAddOrEdit())
			$this->CardType->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_CardType"));
		$this->CardType->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_CardType"));

		// PharmacyBill
		if (!$this->isAddOrEdit())
			$this->PharmacyBill->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_PharmacyBill"));
		$this->PharmacyBill->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_PharmacyBill"));
		if (is_array($this->PharmacyBill->AdvancedSearch->SearchValue))
			$this->PharmacyBill->AdvancedSearch->SearchValue = implode(",", $this->PharmacyBill->AdvancedSearch->SearchValue);
		if (is_array($this->PharmacyBill->AdvancedSearch->SearchValue2))
			$this->PharmacyBill->AdvancedSearch->SearchValue2 = implode(",", $this->PharmacyBill->AdvancedSearch->SearchValue2);

		// cash
		if (!$this->isAddOrEdit())
			$this->cash->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_cash"));
		$this->cash->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_cash"));

		// Card
		if (!$this->isAddOrEdit())
			$this->Card->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_Card"));
		$this->Card->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_Card"));
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
		if ($this->DiscountAmount->FormValue == $this->DiscountAmount->CurrentValue && is_numeric(ConvertToFloatString($this->DiscountAmount->CurrentValue)))
			$this->DiscountAmount->CurrentValue = ConvertToFloatString($this->DiscountAmount->CurrentValue);

		// Convert decimal values if posted back
		if ($this->RealizationAmount->FormValue == $this->RealizationAmount->CurrentValue && is_numeric(ConvertToFloatString($this->RealizationAmount->CurrentValue)))
			$this->RealizationAmount->CurrentValue = ConvertToFloatString($this->RealizationAmount->CurrentValue);

		// Convert decimal values if posted back
		if ($this->ProcedureAmount->FormValue == $this->ProcedureAmount->CurrentValue && is_numeric(ConvertToFloatString($this->ProcedureAmount->CurrentValue)))
			$this->ProcedureAmount->CurrentValue = ConvertToFloatString($this->ProcedureAmount->CurrentValue);

		// Convert decimal values if posted back
		if ($this->cash->FormValue == $this->cash->CurrentValue && is_numeric(ConvertToFloatString($this->cash->CurrentValue)))
			$this->cash->CurrentValue = ConvertToFloatString($this->cash->CurrentValue);

		// Convert decimal values if posted back
		if ($this->Card->FormValue == $this->Card->CurrentValue && is_numeric(ConvertToFloatString($this->Card->CurrentValue)))
			$this->Card->CurrentValue = ConvertToFloatString($this->Card->CurrentValue);

		// Call Row_Rendering event
		$this->Row_Rendering();

		// Common render codes for all row types
		// id
		// createddatetime
		// BillNumber
		// Reception
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
		// DiscountAmount
		// createdby
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
		// PatId
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
		// BillClosing
		// GoogleReviewID
		// CardType
		// PharmacyBill
		// cash
		// Card

		if ($this->RowType == ROWTYPE_VIEW) { // View row

			// id
			$this->id->ViewValue = $this->id->CurrentValue;
			$this->id->ViewCustomAttributes = "";

			// createddatetime
			$this->createddatetime->ViewValue = $this->createddatetime->CurrentValue;
			$this->createddatetime->ViewValue = FormatDateTime($this->createddatetime->ViewValue, 7);
			$this->createddatetime->ViewCustomAttributes = "";

			// BillNumber
			$this->BillNumber->ViewValue = $this->BillNumber->CurrentValue;
			$this->BillNumber->ViewCustomAttributes = "";

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
						$arwrk[1] = FormatNumber($rswrk->fields('df'), 0, -2, -2, -2);
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

			// PatientId
			$this->PatientId->ViewValue = $this->PatientId->CurrentValue;
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
			$this->Doctor->ViewCustomAttributes = "";

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

			// AnyDues
			$this->AnyDues->ViewValue = $this->AnyDues->CurrentValue;
			$this->AnyDues->ViewCustomAttributes = "";

			// DiscountAmount
			$this->DiscountAmount->ViewValue = $this->DiscountAmount->CurrentValue;
			$this->DiscountAmount->ViewValue = FormatNumber($this->DiscountAmount->ViewValue, 2, -2, -2, -2);
			$this->DiscountAmount->ViewCustomAttributes = "";

			// createdby
			$this->createdby->ViewValue = $this->createdby->CurrentValue;
			$this->createdby->ViewCustomAttributes = "";

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
			$this->HospID->ViewValue = FormatNumber($this->HospID->ViewValue, 0, -2, -2, -2);
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
			$curVal = strval($this->CId->CurrentValue);
			if ($curVal <> "") {
				$this->CId->ViewValue = $this->CId->lookupCacheOption($curVal);
				if ($this->CId->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
					$sqlWrk = $this->CId->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = $rswrk->fields('df');
						$arwrk[2] = $rswrk->fields('df2');
						$arwrk[3] = $rswrk->fields('df3');
						$this->CId->ViewValue = $this->CId->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->CId->ViewValue = $this->CId->CurrentValue;
					}
				}
			} else {
				$this->CId->ViewValue = NULL;
			}
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

			// PatId
			$curVal = strval($this->PatId->CurrentValue);
			if ($curVal <> "") {
				$this->PatId->ViewValue = $this->PatId->lookupCacheOption($curVal);
				if ($this->PatId->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
					$sqlWrk = $this->PatId->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = $rswrk->fields('df');
						$arwrk[2] = $rswrk->fields('df2');
						$arwrk[3] = $rswrk->fields('df3');
						$this->PatId->ViewValue = $this->PatId->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->PatId->ViewValue = $this->PatId->CurrentValue;
					}
				}
			} else {
				$this->PatId->ViewValue = NULL;
			}
			$this->PatId->ViewCustomAttributes = "";

			// DrDepartment
			$this->DrDepartment->ViewValue = $this->DrDepartment->CurrentValue;
			$this->DrDepartment->ViewCustomAttributes = "";

			// RefferedBy
			$curVal = strval($this->RefferedBy->CurrentValue);
			if ($curVal <> "") {
				$this->RefferedBy->ViewValue = $this->RefferedBy->lookupCacheOption($curVal);
				if ($this->RefferedBy->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`reference`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->RefferedBy->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = $rswrk->fields('df');
						$arwrk[2] = $rswrk->fields('df2');
						$arwrk[3] = $rswrk->fields('df3');
						$arwrk[4] = $rswrk->fields('df4');
						$this->RefferedBy->ViewValue = $this->RefferedBy->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->RefferedBy->ViewValue = $this->RefferedBy->CurrentValue;
					}
				}
			} else {
				$this->RefferedBy->ViewValue = NULL;
			}
			$this->RefferedBy->ViewCustomAttributes = "";

			// CardNumber
			$this->CardNumber->ViewValue = $this->CardNumber->CurrentValue;
			$this->CardNumber->ViewCustomAttributes = "";

			// BankName
			$this->BankName->ViewValue = $this->BankName->CurrentValue;
			$this->BankName->ViewCustomAttributes = "";

			// DrID
			$curVal = strval($this->DrID->CurrentValue);
			if ($curVal <> "") {
				$this->DrID->ViewValue = $this->DrID->lookupCacheOption($curVal);
				if ($this->DrID->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
					$lookupFilter = function() {
						return "`HospID`='".HospitalID()."'";
					};
					$lookupFilter = $lookupFilter->bindTo($this);
					$sqlWrk = $this->DrID->Lookup->getSql(FALSE, $filterWrk, $lookupFilter, $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = $rswrk->fields('df');
						$arwrk[2] = $rswrk->fields('df2');
						$arwrk[3] = $rswrk->fields('df3');
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

			// BillStatus
			$this->BillStatus->ViewValue = $this->BillStatus->CurrentValue;
			$this->BillStatus->ViewValue = FormatNumber($this->BillStatus->ViewValue, 0, -2, -2, -2);
			$this->BillStatus->ViewCustomAttributes = "";

			// ReportHeader
			if (strval($this->ReportHeader->CurrentValue) <> "") {
				$this->ReportHeader->ViewValue = new OptionValues();
				$arwrk = explode(",", strval($this->ReportHeader->CurrentValue));
				$cnt = count($arwrk);
				for ($ari = 0; $ari < $cnt; $ari++)
					$this->ReportHeader->ViewValue->add($this->ReportHeader->optionCaption(trim($arwrk[$ari])));
			} else {
				$this->ReportHeader->ViewValue = NULL;
			}
			$this->ReportHeader->ViewCustomAttributes = "";

			// UserName
			$this->UserName->ViewValue = $this->UserName->CurrentValue;
			$this->UserName->ViewCustomAttributes = "";

			// AdjustmentAdvance
			if (strval($this->AdjustmentAdvance->CurrentValue) <> "") {
				$this->AdjustmentAdvance->ViewValue = new OptionValues();
				$arwrk = explode(",", strval($this->AdjustmentAdvance->CurrentValue));
				$cnt = count($arwrk);
				for ($ari = 0; $ari < $cnt; $ari++)
					$this->AdjustmentAdvance->ViewValue->add($this->AdjustmentAdvance->optionCaption(trim($arwrk[$ari])));
			} else {
				$this->AdjustmentAdvance->ViewValue = NULL;
			}
			$this->AdjustmentAdvance->ViewCustomAttributes = "";

			// billing_vouchercol
			$this->billing_vouchercol->ViewValue = $this->billing_vouchercol->CurrentValue;
			$this->billing_vouchercol->ViewCustomAttributes = "";

			// BillType
			if (strval($this->BillType->CurrentValue) <> "") {
				$this->BillType->ViewValue = $this->BillType->optionCaption($this->BillType->CurrentValue);
			} else {
				$this->BillType->ViewValue = NULL;
			}
			$this->BillType->ViewCustomAttributes = "";

			// ProcedureName
			$this->ProcedureName->ViewValue = $this->ProcedureName->CurrentValue;
			$this->ProcedureName->ViewCustomAttributes = "";

			// ProcedureAmount
			$this->ProcedureAmount->ViewValue = $this->ProcedureAmount->CurrentValue;
			$this->ProcedureAmount->ViewValue = FormatNumber($this->ProcedureAmount->ViewValue, 2, -2, -2, -2);
			$this->ProcedureAmount->ViewCustomAttributes = "";

			// IncludePackage
			if (strval($this->IncludePackage->CurrentValue) <> "") {
				$this->IncludePackage->ViewValue = new OptionValues();
				$arwrk = explode(",", strval($this->IncludePackage->CurrentValue));
				$cnt = count($arwrk);
				for ($ari = 0; $ari < $cnt; $ari++)
					$this->IncludePackage->ViewValue->add($this->IncludePackage->optionCaption(trim($arwrk[$ari])));
			} else {
				$this->IncludePackage->ViewValue = NULL;
			}
			$this->IncludePackage->ViewCustomAttributes = "";

			// CancelBill
			if (strval($this->CancelBill->CurrentValue) <> "") {
				$this->CancelBill->ViewValue = $this->CancelBill->optionCaption($this->CancelBill->CurrentValue);
			} else {
				$this->CancelBill->ViewValue = NULL;
			}
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

			// BillClosing
			if (strval($this->BillClosing->CurrentValue) <> "") {
				$this->BillClosing->ViewValue = new OptionValues();
				$arwrk = explode(",", strval($this->BillClosing->CurrentValue));
				$cnt = count($arwrk);
				for ($ari = 0; $ari < $cnt; $ari++)
					$this->BillClosing->ViewValue->add($this->BillClosing->optionCaption(trim($arwrk[$ari])));
			} else {
				$this->BillClosing->ViewValue = NULL;
			}
			$this->BillClosing->ViewCustomAttributes = "";

			// GoogleReviewID
			if (strval($this->GoogleReviewID->CurrentValue) <> "") {
				$this->GoogleReviewID->ViewValue = new OptionValues();
				$arwrk = explode(",", strval($this->GoogleReviewID->CurrentValue));
				$cnt = count($arwrk);
				for ($ari = 0; $ari < $cnt; $ari++)
					$this->GoogleReviewID->ViewValue->add($this->GoogleReviewID->optionCaption(trim($arwrk[$ari])));
			} else {
				$this->GoogleReviewID->ViewValue = NULL;
			}
			$this->GoogleReviewID->ViewCustomAttributes = "";

			// CardType
			if (strval($this->CardType->CurrentValue) <> "") {
				$this->CardType->ViewValue = $this->CardType->optionCaption($this->CardType->CurrentValue);
			} else {
				$this->CardType->ViewValue = NULL;
			}
			$this->CardType->ViewCustomAttributes = "";

			// PharmacyBill
			if (strval($this->PharmacyBill->CurrentValue) <> "") {
				$this->PharmacyBill->ViewValue = new OptionValues();
				$arwrk = explode(",", strval($this->PharmacyBill->CurrentValue));
				$cnt = count($arwrk);
				for ($ari = 0; $ari < $cnt; $ari++)
					$this->PharmacyBill->ViewValue->add($this->PharmacyBill->optionCaption(trim($arwrk[$ari])));
			} else {
				$this->PharmacyBill->ViewValue = NULL;
			}
			$this->PharmacyBill->ViewCustomAttributes = "";

			// cash
			$this->cash->ViewValue = $this->cash->CurrentValue;
			$this->cash->ViewValue = FormatNumber($this->cash->ViewValue, 2, -2, -2, -2);
			$this->cash->ViewCustomAttributes = "";

			// Card
			$this->Card->ViewValue = $this->Card->CurrentValue;
			$this->Card->ViewValue = FormatNumber($this->Card->ViewValue, 2, -2, -2, -2);
			$this->Card->ViewCustomAttributes = "";

			// id
			$this->id->LinkCustomAttributes = "";
			$this->id->HrefValue = "";
			$this->id->TooltipValue = "";

			// createddatetime
			$this->createddatetime->LinkCustomAttributes = "";
			$this->createddatetime->HrefValue = "";
			$this->createddatetime->TooltipValue = "";

			// BillNumber
			$this->BillNumber->LinkCustomAttributes = "";
			$this->BillNumber->HrefValue = "";
			$this->BillNumber->TooltipValue = "";

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

			// DiscountAmount
			$this->DiscountAmount->LinkCustomAttributes = "";
			$this->DiscountAmount->HrefValue = "";
			$this->DiscountAmount->TooltipValue = "";

			// createdby
			$this->createdby->LinkCustomAttributes = "";
			$this->createdby->HrefValue = "";
			$this->createdby->TooltipValue = "";

			// modifiedby
			$this->modifiedby->LinkCustomAttributes = "";
			$this->modifiedby->HrefValue = "";
			$this->modifiedby->TooltipValue = "";

			// modifieddatetime
			$this->modifieddatetime->LinkCustomAttributes = "";
			$this->modifieddatetime->HrefValue = "";
			$this->modifieddatetime->TooltipValue = "";

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

			// PatId
			$this->PatId->LinkCustomAttributes = "";
			$this->PatId->HrefValue = "";
			$this->PatId->TooltipValue = "";

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

			// BillClosing
			$this->BillClosing->LinkCustomAttributes = "";
			$this->BillClosing->HrefValue = "";
			$this->BillClosing->TooltipValue = "";

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

			// cash
			$this->cash->LinkCustomAttributes = "";
			$this->cash->HrefValue = "";
			$this->cash->TooltipValue = "";

			// Card
			$this->Card->LinkCustomAttributes = "";
			$this->Card->HrefValue = "";
			$this->Card->TooltipValue = "";
		} elseif ($this->RowType == ROWTYPE_SEARCH) { // Search row

			// id
			$this->id->EditAttrs["class"] = "form-control";
			$this->id->EditCustomAttributes = "";
			$this->id->EditValue = HtmlEncode($this->id->AdvancedSearch->SearchValue);
			$this->id->PlaceHolder = RemoveHtml($this->id->caption());

			// createddatetime
			$this->createddatetime->EditAttrs["class"] = "form-control";
			$this->createddatetime->EditCustomAttributes = "";
			$this->createddatetime->EditValue = HtmlEncode(FormatDateTime(UnFormatDateTime($this->createddatetime->AdvancedSearch->SearchValue, 7), 7));
			$this->createddatetime->PlaceHolder = RemoveHtml($this->createddatetime->caption());
			$this->createddatetime->EditAttrs["class"] = "form-control";
			$this->createddatetime->EditCustomAttributes = "";
			$this->createddatetime->EditValue2 = HtmlEncode(FormatDateTime(UnFormatDateTime($this->createddatetime->AdvancedSearch->SearchValue2, 7), 7));
			$this->createddatetime->PlaceHolder = RemoveHtml($this->createddatetime->caption());

			// BillNumber
			$this->BillNumber->EditAttrs["class"] = "form-control";
			$this->BillNumber->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->BillNumber->AdvancedSearch->SearchValue = HtmlDecode($this->BillNumber->AdvancedSearch->SearchValue);
			$this->BillNumber->EditValue = HtmlEncode($this->BillNumber->AdvancedSearch->SearchValue);
			$this->BillNumber->PlaceHolder = RemoveHtml($this->BillNumber->caption());

			// Reception
			$this->Reception->EditCustomAttributes = "";
			$curVal = trim(strval($this->Reception->AdvancedSearch->SearchValue));
			if ($curVal <> "")
				$this->Reception->AdvancedSearch->ViewValue = $this->Reception->lookupCacheOption($curVal);
			else
				$this->Reception->AdvancedSearch->ViewValue = $this->Reception->Lookup !== NULL && is_array($this->Reception->Lookup->Options) ? $curVal : NULL;
			if ($this->Reception->AdvancedSearch->ViewValue !== NULL) { // Load from cache
				$this->Reception->EditValue = array_values($this->Reception->Lookup->Options);
				if ($this->Reception->AdvancedSearch->ViewValue == "")
					$this->Reception->AdvancedSearch->ViewValue = $Language->phrase("PleaseSelect");
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`id`" . SearchString("=", $this->Reception->AdvancedSearch->SearchValue, DATATYPE_NUMBER, "");
				}
				$sqlWrk = $this->Reception->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = array();
					$arwrk[1] = HtmlEncode(FormatNumber($rswrk->fields('df'), 0, -2, -2, -2));
					$arwrk[2] = HtmlEncode($rswrk->fields('df2'));
					$arwrk[3] = HtmlEncode($rswrk->fields('df3'));
					$this->Reception->AdvancedSearch->ViewValue = $this->Reception->displayValue($arwrk);
				} else {
					$this->Reception->AdvancedSearch->ViewValue = $Language->phrase("PleaseSelect");
				}
				$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
				if ($rswrk) $rswrk->Close();
				$rowcnt = count($arwrk);
				for ($i = 0; $i < $rowcnt; $i++) {
					$arwrk[$i][1] = FormatNumber($arwrk[$i][1], 0, -2, -2, -2);
				}
				$this->Reception->EditValue = $arwrk;
			}

			// PatientId
			$this->PatientId->EditAttrs["class"] = "form-control";
			$this->PatientId->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->PatientId->AdvancedSearch->SearchValue = HtmlDecode($this->PatientId->AdvancedSearch->SearchValue);
			$this->PatientId->EditValue = HtmlEncode($this->PatientId->AdvancedSearch->SearchValue);
			$this->PatientId->PlaceHolder = RemoveHtml($this->PatientId->caption());

			// mrnno
			$this->mrnno->EditAttrs["class"] = "form-control";
			$this->mrnno->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->mrnno->AdvancedSearch->SearchValue = HtmlDecode($this->mrnno->AdvancedSearch->SearchValue);
			$this->mrnno->EditValue = HtmlEncode($this->mrnno->AdvancedSearch->SearchValue);
			$this->mrnno->PlaceHolder = RemoveHtml($this->mrnno->caption());

			// PatientName
			$this->PatientName->EditAttrs["class"] = "form-control";
			$this->PatientName->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->PatientName->AdvancedSearch->SearchValue = HtmlDecode($this->PatientName->AdvancedSearch->SearchValue);
			$this->PatientName->EditValue = HtmlEncode($this->PatientName->AdvancedSearch->SearchValue);
			$this->PatientName->PlaceHolder = RemoveHtml($this->PatientName->caption());

			// Age
			$this->Age->EditAttrs["class"] = "form-control";
			$this->Age->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Age->AdvancedSearch->SearchValue = HtmlDecode($this->Age->AdvancedSearch->SearchValue);
			$this->Age->EditValue = HtmlEncode($this->Age->AdvancedSearch->SearchValue);
			$this->Age->PlaceHolder = RemoveHtml($this->Age->caption());

			// Gender
			$this->Gender->EditAttrs["class"] = "form-control";
			$this->Gender->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Gender->AdvancedSearch->SearchValue = HtmlDecode($this->Gender->AdvancedSearch->SearchValue);
			$this->Gender->EditValue = HtmlEncode($this->Gender->AdvancedSearch->SearchValue);
			$this->Gender->PlaceHolder = RemoveHtml($this->Gender->caption());

			// profilePic
			$this->profilePic->EditAttrs["class"] = "form-control";
			$this->profilePic->EditCustomAttributes = "";
			$this->profilePic->EditValue = HtmlEncode($this->profilePic->AdvancedSearch->SearchValue);
			$this->profilePic->PlaceHolder = RemoveHtml($this->profilePic->caption());

			// Mobile
			$this->Mobile->EditAttrs["class"] = "form-control";
			$this->Mobile->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Mobile->AdvancedSearch->SearchValue = HtmlDecode($this->Mobile->AdvancedSearch->SearchValue);
			$this->Mobile->EditValue = HtmlEncode($this->Mobile->AdvancedSearch->SearchValue);
			$this->Mobile->PlaceHolder = RemoveHtml($this->Mobile->caption());

			// IP_OP
			$this->IP_OP->EditAttrs["class"] = "form-control";
			$this->IP_OP->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->IP_OP->AdvancedSearch->SearchValue = HtmlDecode($this->IP_OP->AdvancedSearch->SearchValue);
			$this->IP_OP->EditValue = HtmlEncode($this->IP_OP->AdvancedSearch->SearchValue);
			$this->IP_OP->PlaceHolder = RemoveHtml($this->IP_OP->caption());

			// Doctor
			$this->Doctor->EditAttrs["class"] = "form-control";
			$this->Doctor->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Doctor->AdvancedSearch->SearchValue = HtmlDecode($this->Doctor->AdvancedSearch->SearchValue);
			$this->Doctor->EditValue = HtmlEncode($this->Doctor->AdvancedSearch->SearchValue);
			$this->Doctor->PlaceHolder = RemoveHtml($this->Doctor->caption());

			// voucher_type
			$this->voucher_type->EditAttrs["class"] = "form-control";
			$this->voucher_type->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->voucher_type->AdvancedSearch->SearchValue = HtmlDecode($this->voucher_type->AdvancedSearch->SearchValue);
			$this->voucher_type->EditValue = HtmlEncode($this->voucher_type->AdvancedSearch->SearchValue);
			$this->voucher_type->PlaceHolder = RemoveHtml($this->voucher_type->caption());

			// Details
			$this->Details->EditAttrs["class"] = "form-control";
			$this->Details->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Details->AdvancedSearch->SearchValue = HtmlDecode($this->Details->AdvancedSearch->SearchValue);
			$this->Details->EditValue = HtmlEncode($this->Details->AdvancedSearch->SearchValue);
			$this->Details->PlaceHolder = RemoveHtml($this->Details->caption());

			// ModeofPayment
			$this->ModeofPayment->EditAttrs["class"] = "form-control";
			$this->ModeofPayment->EditCustomAttributes = "";
			$curVal = trim(strval($this->ModeofPayment->AdvancedSearch->SearchValue));
			if ($curVal <> "")
				$this->ModeofPayment->AdvancedSearch->ViewValue = $this->ModeofPayment->lookupCacheOption($curVal);
			else
				$this->ModeofPayment->AdvancedSearch->ViewValue = $this->ModeofPayment->Lookup !== NULL && is_array($this->ModeofPayment->Lookup->Options) ? $curVal : NULL;
			if ($this->ModeofPayment->AdvancedSearch->ViewValue !== NULL) { // Load from cache
				$this->ModeofPayment->EditValue = array_values($this->ModeofPayment->Lookup->Options);
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`Mode`" . SearchString("=", $this->ModeofPayment->AdvancedSearch->SearchValue, DATATYPE_STRING, "");
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
			$this->Amount->EditValue = HtmlEncode($this->Amount->AdvancedSearch->SearchValue);
			$this->Amount->PlaceHolder = RemoveHtml($this->Amount->caption());

			// AnyDues
			$this->AnyDues->EditAttrs["class"] = "form-control";
			$this->AnyDues->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->AnyDues->AdvancedSearch->SearchValue = HtmlDecode($this->AnyDues->AdvancedSearch->SearchValue);
			$this->AnyDues->EditValue = HtmlEncode($this->AnyDues->AdvancedSearch->SearchValue);
			$this->AnyDues->PlaceHolder = RemoveHtml($this->AnyDues->caption());

			// DiscountAmount
			$this->DiscountAmount->EditAttrs["class"] = "form-control";
			$this->DiscountAmount->EditCustomAttributes = "";
			$this->DiscountAmount->EditValue = HtmlEncode($this->DiscountAmount->AdvancedSearch->SearchValue);
			$this->DiscountAmount->PlaceHolder = RemoveHtml($this->DiscountAmount->caption());

			// createdby
			$this->createdby->EditAttrs["class"] = "form-control";
			$this->createdby->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->createdby->AdvancedSearch->SearchValue = HtmlDecode($this->createdby->AdvancedSearch->SearchValue);
			$this->createdby->EditValue = HtmlEncode($this->createdby->AdvancedSearch->SearchValue);
			$this->createdby->PlaceHolder = RemoveHtml($this->createdby->caption());

			// modifiedby
			$this->modifiedby->EditAttrs["class"] = "form-control";
			$this->modifiedby->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->modifiedby->AdvancedSearch->SearchValue = HtmlDecode($this->modifiedby->AdvancedSearch->SearchValue);
			$this->modifiedby->EditValue = HtmlEncode($this->modifiedby->AdvancedSearch->SearchValue);
			$this->modifiedby->PlaceHolder = RemoveHtml($this->modifiedby->caption());

			// modifieddatetime
			$this->modifieddatetime->EditAttrs["class"] = "form-control";
			$this->modifieddatetime->EditCustomAttributes = "";
			$this->modifieddatetime->EditValue = HtmlEncode(FormatDateTime(UnFormatDateTime($this->modifieddatetime->AdvancedSearch->SearchValue, 0), 8));
			$this->modifieddatetime->PlaceHolder = RemoveHtml($this->modifieddatetime->caption());

			// RealizationAmount
			$this->RealizationAmount->EditAttrs["class"] = "form-control";
			$this->RealizationAmount->EditCustomAttributes = "";
			$this->RealizationAmount->EditValue = HtmlEncode($this->RealizationAmount->AdvancedSearch->SearchValue);
			$this->RealizationAmount->PlaceHolder = RemoveHtml($this->RealizationAmount->caption());

			// RealizationStatus
			$this->RealizationStatus->EditAttrs["class"] = "form-control";
			$this->RealizationStatus->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->RealizationStatus->AdvancedSearch->SearchValue = HtmlDecode($this->RealizationStatus->AdvancedSearch->SearchValue);
			$this->RealizationStatus->EditValue = HtmlEncode($this->RealizationStatus->AdvancedSearch->SearchValue);
			$this->RealizationStatus->PlaceHolder = RemoveHtml($this->RealizationStatus->caption());

			// RealizationRemarks
			$this->RealizationRemarks->EditAttrs["class"] = "form-control";
			$this->RealizationRemarks->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->RealizationRemarks->AdvancedSearch->SearchValue = HtmlDecode($this->RealizationRemarks->AdvancedSearch->SearchValue);
			$this->RealizationRemarks->EditValue = HtmlEncode($this->RealizationRemarks->AdvancedSearch->SearchValue);
			$this->RealizationRemarks->PlaceHolder = RemoveHtml($this->RealizationRemarks->caption());

			// RealizationBatchNo
			$this->RealizationBatchNo->EditAttrs["class"] = "form-control";
			$this->RealizationBatchNo->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->RealizationBatchNo->AdvancedSearch->SearchValue = HtmlDecode($this->RealizationBatchNo->AdvancedSearch->SearchValue);
			$this->RealizationBatchNo->EditValue = HtmlEncode($this->RealizationBatchNo->AdvancedSearch->SearchValue);
			$this->RealizationBatchNo->PlaceHolder = RemoveHtml($this->RealizationBatchNo->caption());

			// RealizationDate
			$this->RealizationDate->EditAttrs["class"] = "form-control";
			$this->RealizationDate->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->RealizationDate->AdvancedSearch->SearchValue = HtmlDecode($this->RealizationDate->AdvancedSearch->SearchValue);
			$this->RealizationDate->EditValue = HtmlEncode($this->RealizationDate->AdvancedSearch->SearchValue);
			$this->RealizationDate->PlaceHolder = RemoveHtml($this->RealizationDate->caption());

			// HospID
			$this->HospID->EditAttrs["class"] = "form-control";
			$this->HospID->EditCustomAttributes = "";
			$this->HospID->EditValue = HtmlEncode($this->HospID->AdvancedSearch->SearchValue);
			$this->HospID->PlaceHolder = RemoveHtml($this->HospID->caption());

			// RIDNO
			$this->RIDNO->EditAttrs["class"] = "form-control";
			$this->RIDNO->EditCustomAttributes = "";
			$this->RIDNO->EditValue = HtmlEncode($this->RIDNO->AdvancedSearch->SearchValue);
			$this->RIDNO->PlaceHolder = RemoveHtml($this->RIDNO->caption());

			// TidNo
			$this->TidNo->EditAttrs["class"] = "form-control";
			$this->TidNo->EditCustomAttributes = "";
			$this->TidNo->EditValue = HtmlEncode($this->TidNo->AdvancedSearch->SearchValue);
			$this->TidNo->PlaceHolder = RemoveHtml($this->TidNo->caption());

			// CId
			$this->CId->EditCustomAttributes = "";
			$curVal = trim(strval($this->CId->AdvancedSearch->SearchValue));
			if ($curVal <> "")
				$this->CId->AdvancedSearch->ViewValue = $this->CId->lookupCacheOption($curVal);
			else
				$this->CId->AdvancedSearch->ViewValue = $this->CId->Lookup !== NULL && is_array($this->CId->Lookup->Options) ? $curVal : NULL;
			if ($this->CId->AdvancedSearch->ViewValue !== NULL) { // Load from cache
				$this->CId->EditValue = array_values($this->CId->Lookup->Options);
				if ($this->CId->AdvancedSearch->ViewValue == "")
					$this->CId->AdvancedSearch->ViewValue = $Language->phrase("PleaseSelect");
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`id`" . SearchString("=", $this->CId->AdvancedSearch->SearchValue, DATATYPE_NUMBER, "");
				}
				$sqlWrk = $this->CId->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = array();
					$arwrk[1] = HtmlEncode($rswrk->fields('df'));
					$arwrk[2] = HtmlEncode($rswrk->fields('df2'));
					$arwrk[3] = HtmlEncode($rswrk->fields('df3'));
					$this->CId->AdvancedSearch->ViewValue = $this->CId->displayValue($arwrk);
				} else {
					$this->CId->AdvancedSearch->ViewValue = $Language->phrase("PleaseSelect");
				}
				$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
				if ($rswrk) $rswrk->Close();
				$this->CId->EditValue = $arwrk;
			}

			// PartnerName
			$this->PartnerName->EditAttrs["class"] = "form-control";
			$this->PartnerName->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->PartnerName->AdvancedSearch->SearchValue = HtmlDecode($this->PartnerName->AdvancedSearch->SearchValue);
			$this->PartnerName->EditValue = HtmlEncode($this->PartnerName->AdvancedSearch->SearchValue);
			$this->PartnerName->PlaceHolder = RemoveHtml($this->PartnerName->caption());

			// PayerType
			$this->PayerType->EditAttrs["class"] = "form-control";
			$this->PayerType->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->PayerType->AdvancedSearch->SearchValue = HtmlDecode($this->PayerType->AdvancedSearch->SearchValue);
			$this->PayerType->EditValue = HtmlEncode($this->PayerType->AdvancedSearch->SearchValue);
			$this->PayerType->PlaceHolder = RemoveHtml($this->PayerType->caption());

			// Dob
			$this->Dob->EditAttrs["class"] = "form-control";
			$this->Dob->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Dob->AdvancedSearch->SearchValue = HtmlDecode($this->Dob->AdvancedSearch->SearchValue);
			$this->Dob->EditValue = HtmlEncode($this->Dob->AdvancedSearch->SearchValue);
			$this->Dob->PlaceHolder = RemoveHtml($this->Dob->caption());

			// Currency
			$this->Currency->EditAttrs["class"] = "form-control";
			$this->Currency->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Currency->AdvancedSearch->SearchValue = HtmlDecode($this->Currency->AdvancedSearch->SearchValue);
			$this->Currency->EditValue = HtmlEncode($this->Currency->AdvancedSearch->SearchValue);
			$this->Currency->PlaceHolder = RemoveHtml($this->Currency->caption());

			// DiscountRemarks
			$this->DiscountRemarks->EditAttrs["class"] = "form-control";
			$this->DiscountRemarks->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->DiscountRemarks->AdvancedSearch->SearchValue = HtmlDecode($this->DiscountRemarks->AdvancedSearch->SearchValue);
			$this->DiscountRemarks->EditValue = HtmlEncode($this->DiscountRemarks->AdvancedSearch->SearchValue);
			$this->DiscountRemarks->PlaceHolder = RemoveHtml($this->DiscountRemarks->caption());

			// Remarks
			$this->Remarks->EditAttrs["class"] = "form-control";
			$this->Remarks->EditCustomAttributes = "";
			$this->Remarks->EditValue = HtmlEncode($this->Remarks->AdvancedSearch->SearchValue);
			$this->Remarks->PlaceHolder = RemoveHtml($this->Remarks->caption());

			// PatId
			$this->PatId->EditCustomAttributes = "";
			$curVal = trim(strval($this->PatId->AdvancedSearch->SearchValue));
			if ($curVal <> "")
				$this->PatId->AdvancedSearch->ViewValue = $this->PatId->lookupCacheOption($curVal);
			else
				$this->PatId->AdvancedSearch->ViewValue = $this->PatId->Lookup !== NULL && is_array($this->PatId->Lookup->Options) ? $curVal : NULL;
			if ($this->PatId->AdvancedSearch->ViewValue !== NULL) { // Load from cache
				$this->PatId->EditValue = array_values($this->PatId->Lookup->Options);
				if ($this->PatId->AdvancedSearch->ViewValue == "")
					$this->PatId->AdvancedSearch->ViewValue = $Language->phrase("PleaseSelect");
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`id`" . SearchString("=", $this->PatId->AdvancedSearch->SearchValue, DATATYPE_NUMBER, "");
				}
				$sqlWrk = $this->PatId->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = array();
					$arwrk[1] = HtmlEncode($rswrk->fields('df'));
					$arwrk[2] = HtmlEncode($rswrk->fields('df2'));
					$arwrk[3] = HtmlEncode($rswrk->fields('df3'));
					$this->PatId->AdvancedSearch->ViewValue = $this->PatId->displayValue($arwrk);
				} else {
					$this->PatId->AdvancedSearch->ViewValue = $Language->phrase("PleaseSelect");
				}
				$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
				if ($rswrk) $rswrk->Close();
				$this->PatId->EditValue = $arwrk;
			}

			// DrDepartment
			$this->DrDepartment->EditAttrs["class"] = "form-control";
			$this->DrDepartment->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->DrDepartment->AdvancedSearch->SearchValue = HtmlDecode($this->DrDepartment->AdvancedSearch->SearchValue);
			$this->DrDepartment->EditValue = HtmlEncode($this->DrDepartment->AdvancedSearch->SearchValue);
			$this->DrDepartment->PlaceHolder = RemoveHtml($this->DrDepartment->caption());

			// RefferedBy
			$this->RefferedBy->EditCustomAttributes = "";
			$curVal = trim(strval($this->RefferedBy->AdvancedSearch->SearchValue));
			if ($curVal <> "")
				$this->RefferedBy->AdvancedSearch->ViewValue = $this->RefferedBy->lookupCacheOption($curVal);
			else
				$this->RefferedBy->AdvancedSearch->ViewValue = $this->RefferedBy->Lookup !== NULL && is_array($this->RefferedBy->Lookup->Options) ? $curVal : NULL;
			if ($this->RefferedBy->AdvancedSearch->ViewValue !== NULL) { // Load from cache
				$this->RefferedBy->EditValue = array_values($this->RefferedBy->Lookup->Options);
				if ($this->RefferedBy->AdvancedSearch->ViewValue == "")
					$this->RefferedBy->AdvancedSearch->ViewValue = $Language->phrase("PleaseSelect");
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`reference`" . SearchString("=", $this->RefferedBy->AdvancedSearch->SearchValue, DATATYPE_STRING, "");
				}
				$sqlWrk = $this->RefferedBy->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = array();
					$arwrk[1] = HtmlEncode($rswrk->fields('df'));
					$arwrk[2] = HtmlEncode($rswrk->fields('df2'));
					$arwrk[3] = HtmlEncode($rswrk->fields('df3'));
					$arwrk[4] = HtmlEncode($rswrk->fields('df4'));
					$this->RefferedBy->AdvancedSearch->ViewValue = $this->RefferedBy->displayValue($arwrk);
				} else {
					$this->RefferedBy->AdvancedSearch->ViewValue = $Language->phrase("PleaseSelect");
				}
				$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
				if ($rswrk) $rswrk->Close();
				$this->RefferedBy->EditValue = $arwrk;
			}

			// CardNumber
			$this->CardNumber->EditAttrs["class"] = "form-control";
			$this->CardNumber->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->CardNumber->AdvancedSearch->SearchValue = HtmlDecode($this->CardNumber->AdvancedSearch->SearchValue);
			$this->CardNumber->EditValue = HtmlEncode($this->CardNumber->AdvancedSearch->SearchValue);
			$this->CardNumber->PlaceHolder = RemoveHtml($this->CardNumber->caption());

			// BankName
			$this->BankName->EditAttrs["class"] = "form-control";
			$this->BankName->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->BankName->AdvancedSearch->SearchValue = HtmlDecode($this->BankName->AdvancedSearch->SearchValue);
			$this->BankName->EditValue = HtmlEncode($this->BankName->AdvancedSearch->SearchValue);
			$this->BankName->PlaceHolder = RemoveHtml($this->BankName->caption());

			// DrID
			$this->DrID->EditCustomAttributes = "";
			$curVal = trim(strval($this->DrID->AdvancedSearch->SearchValue));
			if ($curVal <> "")
				$this->DrID->AdvancedSearch->ViewValue = $this->DrID->lookupCacheOption($curVal);
			else
				$this->DrID->AdvancedSearch->ViewValue = $this->DrID->Lookup !== NULL && is_array($this->DrID->Lookup->Options) ? $curVal : NULL;
			if ($this->DrID->AdvancedSearch->ViewValue !== NULL) { // Load from cache
				$this->DrID->EditValue = array_values($this->DrID->Lookup->Options);
				if ($this->DrID->AdvancedSearch->ViewValue == "")
					$this->DrID->AdvancedSearch->ViewValue = $Language->phrase("PleaseSelect");
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`id`" . SearchString("=", $this->DrID->AdvancedSearch->SearchValue, DATATYPE_NUMBER, "");
				}
				$lookupFilter = function() {
					return "`HospID`='".HospitalID()."'";
				};
				$lookupFilter = $lookupFilter->bindTo($this);
				$sqlWrk = $this->DrID->Lookup->getSql(TRUE, $filterWrk, $lookupFilter, $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = array();
					$arwrk[1] = HtmlEncode($rswrk->fields('df'));
					$arwrk[2] = HtmlEncode($rswrk->fields('df2'));
					$arwrk[3] = HtmlEncode($rswrk->fields('df3'));
					$this->DrID->AdvancedSearch->ViewValue = $this->DrID->displayValue($arwrk);
				} else {
					$this->DrID->AdvancedSearch->ViewValue = $Language->phrase("PleaseSelect");
				}
				$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
				if ($rswrk) $rswrk->Close();
				$this->DrID->EditValue = $arwrk;
			}

			// BillStatus
			$this->BillStatus->EditAttrs["class"] = "form-control";
			$this->BillStatus->EditCustomAttributes = "";
			$this->BillStatus->EditValue = HtmlEncode($this->BillStatus->AdvancedSearch->SearchValue);
			$this->BillStatus->PlaceHolder = RemoveHtml($this->BillStatus->caption());

			// ReportHeader
			$this->ReportHeader->EditCustomAttributes = "";
			$this->ReportHeader->EditValue = $this->ReportHeader->options(FALSE);

			// UserName
			$this->UserName->EditAttrs["class"] = "form-control";
			$this->UserName->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->UserName->AdvancedSearch->SearchValue = HtmlDecode($this->UserName->AdvancedSearch->SearchValue);
			$this->UserName->EditValue = HtmlEncode($this->UserName->AdvancedSearch->SearchValue);
			$this->UserName->PlaceHolder = RemoveHtml($this->UserName->caption());

			// AdjustmentAdvance
			$this->AdjustmentAdvance->EditCustomAttributes = "";
			$this->AdjustmentAdvance->EditValue = $this->AdjustmentAdvance->options(FALSE);

			// billing_vouchercol
			$this->billing_vouchercol->EditAttrs["class"] = "form-control";
			$this->billing_vouchercol->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->billing_vouchercol->AdvancedSearch->SearchValue = HtmlDecode($this->billing_vouchercol->AdvancedSearch->SearchValue);
			$this->billing_vouchercol->EditValue = HtmlEncode($this->billing_vouchercol->AdvancedSearch->SearchValue);
			$this->billing_vouchercol->PlaceHolder = RemoveHtml($this->billing_vouchercol->caption());

			// BillType
			$this->BillType->EditCustomAttributes = "";
			$this->BillType->EditValue = $this->BillType->options(FALSE);

			// ProcedureName
			$this->ProcedureName->EditAttrs["class"] = "form-control";
			$this->ProcedureName->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->ProcedureName->AdvancedSearch->SearchValue = HtmlDecode($this->ProcedureName->AdvancedSearch->SearchValue);
			$this->ProcedureName->EditValue = HtmlEncode($this->ProcedureName->AdvancedSearch->SearchValue);
			$this->ProcedureName->PlaceHolder = RemoveHtml($this->ProcedureName->caption());

			// ProcedureAmount
			$this->ProcedureAmount->EditAttrs["class"] = "form-control";
			$this->ProcedureAmount->EditCustomAttributes = "";
			$this->ProcedureAmount->EditValue = HtmlEncode($this->ProcedureAmount->AdvancedSearch->SearchValue);
			$this->ProcedureAmount->PlaceHolder = RemoveHtml($this->ProcedureAmount->caption());

			// IncludePackage
			$this->IncludePackage->EditCustomAttributes = "";
			$this->IncludePackage->EditValue = $this->IncludePackage->options(FALSE);

			// CancelBill
			$this->CancelBill->EditAttrs["class"] = "form-control";
			$this->CancelBill->EditCustomAttributes = "";
			$this->CancelBill->EditValue = $this->CancelBill->options(TRUE);

			// CancelReason
			$this->CancelReason->EditAttrs["class"] = "form-control";
			$this->CancelReason->EditCustomAttributes = "";
			$this->CancelReason->EditValue = HtmlEncode($this->CancelReason->AdvancedSearch->SearchValue);
			$this->CancelReason->PlaceHolder = RemoveHtml($this->CancelReason->caption());

			// CancelModeOfPayment
			$this->CancelModeOfPayment->EditAttrs["class"] = "form-control";
			$this->CancelModeOfPayment->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->CancelModeOfPayment->AdvancedSearch->SearchValue = HtmlDecode($this->CancelModeOfPayment->AdvancedSearch->SearchValue);
			$this->CancelModeOfPayment->EditValue = HtmlEncode($this->CancelModeOfPayment->AdvancedSearch->SearchValue);
			$this->CancelModeOfPayment->PlaceHolder = RemoveHtml($this->CancelModeOfPayment->caption());

			// CancelAmount
			$this->CancelAmount->EditAttrs["class"] = "form-control";
			$this->CancelAmount->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->CancelAmount->AdvancedSearch->SearchValue = HtmlDecode($this->CancelAmount->AdvancedSearch->SearchValue);
			$this->CancelAmount->EditValue = HtmlEncode($this->CancelAmount->AdvancedSearch->SearchValue);
			$this->CancelAmount->PlaceHolder = RemoveHtml($this->CancelAmount->caption());

			// CancelBankName
			$this->CancelBankName->EditAttrs["class"] = "form-control";
			$this->CancelBankName->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->CancelBankName->AdvancedSearch->SearchValue = HtmlDecode($this->CancelBankName->AdvancedSearch->SearchValue);
			$this->CancelBankName->EditValue = HtmlEncode($this->CancelBankName->AdvancedSearch->SearchValue);
			$this->CancelBankName->PlaceHolder = RemoveHtml($this->CancelBankName->caption());

			// CancelTransactionNumber
			$this->CancelTransactionNumber->EditAttrs["class"] = "form-control";
			$this->CancelTransactionNumber->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->CancelTransactionNumber->AdvancedSearch->SearchValue = HtmlDecode($this->CancelTransactionNumber->AdvancedSearch->SearchValue);
			$this->CancelTransactionNumber->EditValue = HtmlEncode($this->CancelTransactionNumber->AdvancedSearch->SearchValue);
			$this->CancelTransactionNumber->PlaceHolder = RemoveHtml($this->CancelTransactionNumber->caption());

			// LabTest
			$this->LabTest->EditAttrs["class"] = "form-control";
			$this->LabTest->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->LabTest->AdvancedSearch->SearchValue = HtmlDecode($this->LabTest->AdvancedSearch->SearchValue);
			$this->LabTest->EditValue = HtmlEncode($this->LabTest->AdvancedSearch->SearchValue);
			$this->LabTest->PlaceHolder = RemoveHtml($this->LabTest->caption());

			// sid
			$this->sid->EditAttrs["class"] = "form-control";
			$this->sid->EditCustomAttributes = "";
			$this->sid->EditValue = HtmlEncode($this->sid->AdvancedSearch->SearchValue);
			$this->sid->PlaceHolder = RemoveHtml($this->sid->caption());

			// SidNo
			$this->SidNo->EditAttrs["class"] = "form-control";
			$this->SidNo->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->SidNo->AdvancedSearch->SearchValue = HtmlDecode($this->SidNo->AdvancedSearch->SearchValue);
			$this->SidNo->EditValue = HtmlEncode($this->SidNo->AdvancedSearch->SearchValue);
			$this->SidNo->PlaceHolder = RemoveHtml($this->SidNo->caption());

			// createdDatettime
			$this->createdDatettime->EditAttrs["class"] = "form-control";
			$this->createdDatettime->EditCustomAttributes = "";
			$this->createdDatettime->EditValue = HtmlEncode(FormatDateTime(UnFormatDateTime($this->createdDatettime->AdvancedSearch->SearchValue, 0), 8));
			$this->createdDatettime->PlaceHolder = RemoveHtml($this->createdDatettime->caption());

			// BillClosing
			$this->BillClosing->EditCustomAttributes = "";
			$this->BillClosing->EditValue = $this->BillClosing->options(FALSE);

			// GoogleReviewID
			$this->GoogleReviewID->EditCustomAttributes = "";
			$this->GoogleReviewID->EditValue = $this->GoogleReviewID->options(FALSE);

			// CardType
			$this->CardType->EditCustomAttributes = "";
			$this->CardType->EditValue = $this->CardType->options(FALSE);

			// PharmacyBill
			$this->PharmacyBill->EditCustomAttributes = "";
			$this->PharmacyBill->EditValue = $this->PharmacyBill->options(FALSE);

			// cash
			$this->cash->EditAttrs["class"] = "form-control";
			$this->cash->EditCustomAttributes = "";
			$this->cash->EditValue = HtmlEncode($this->cash->AdvancedSearch->SearchValue);
			$this->cash->PlaceHolder = RemoveHtml($this->cash->caption());

			// Card
			$this->Card->EditAttrs["class"] = "form-control";
			$this->Card->EditCustomAttributes = "";
			$this->Card->EditValue = HtmlEncode($this->Card->AdvancedSearch->SearchValue);
			$this->Card->PlaceHolder = RemoveHtml($this->Card->caption());
		}
		if ($this->RowType == ROWTYPE_ADD || $this->RowType == ROWTYPE_EDIT || $this->RowType == ROWTYPE_SEARCH) // Add/Edit/Search row
			$this->setupFieldTitles();

		// Call Row Rendered event
		if ($this->RowType <> ROWTYPE_AGGREGATEINIT)
			$this->Row_Rendered();
	}

	// Validate search
	protected function validateSearch()
	{
		global $SearchError;

		// Initialize
		$SearchError = "";

		// Check if validation required
		if (!SERVER_VALIDATE)
			return TRUE;
		if (!CheckInteger($this->id->AdvancedSearch->SearchValue)) {
			AddMessage($SearchError, $this->id->errorMessage());
		}
		if (!CheckEuroDate($this->createddatetime->AdvancedSearch->SearchValue)) {
			AddMessage($SearchError, $this->createddatetime->errorMessage());
		}
		if (!CheckEuroDate($this->createddatetime->AdvancedSearch->SearchValue2)) {
			AddMessage($SearchError, $this->createddatetime->errorMessage());
		}
		if (!CheckNumber($this->Amount->AdvancedSearch->SearchValue)) {
			AddMessage($SearchError, $this->Amount->errorMessage());
		}
		if (!CheckNumber($this->DiscountAmount->AdvancedSearch->SearchValue)) {
			AddMessage($SearchError, $this->DiscountAmount->errorMessage());
		}
		if (!CheckDate($this->modifieddatetime->AdvancedSearch->SearchValue)) {
			AddMessage($SearchError, $this->modifieddatetime->errorMessage());
		}
		if (!CheckNumber($this->RealizationAmount->AdvancedSearch->SearchValue)) {
			AddMessage($SearchError, $this->RealizationAmount->errorMessage());
		}
		if (!CheckInteger($this->HospID->AdvancedSearch->SearchValue)) {
			AddMessage($SearchError, $this->HospID->errorMessage());
		}
		if (!CheckInteger($this->RIDNO->AdvancedSearch->SearchValue)) {
			AddMessage($SearchError, $this->RIDNO->errorMessage());
		}
		if (!CheckInteger($this->TidNo->AdvancedSearch->SearchValue)) {
			AddMessage($SearchError, $this->TidNo->errorMessage());
		}
		if (!CheckInteger($this->BillStatus->AdvancedSearch->SearchValue)) {
			AddMessage($SearchError, $this->BillStatus->errorMessage());
		}
		if (!CheckNumber($this->ProcedureAmount->AdvancedSearch->SearchValue)) {
			AddMessage($SearchError, $this->ProcedureAmount->errorMessage());
		}
		if (!CheckInteger($this->sid->AdvancedSearch->SearchValue)) {
			AddMessage($SearchError, $this->sid->errorMessage());
		}
		if (!CheckDate($this->createdDatettime->AdvancedSearch->SearchValue)) {
			AddMessage($SearchError, $this->createdDatettime->errorMessage());
		}
		if (!CheckNumber($this->cash->AdvancedSearch->SearchValue)) {
			AddMessage($SearchError, $this->cash->errorMessage());
		}
		if (!CheckNumber($this->Card->AdvancedSearch->SearchValue)) {
			AddMessage($SearchError, $this->Card->errorMessage());
		}

		// Return validate result
		$validateSearch = ($SearchError == "");

		// Call Form_CustomValidate event
		$formCustomError = "";
		$validateSearch = $validateSearch && $this->Form_CustomValidate($formCustomError);
		if ($formCustomError <> "") {
			AddMessage($SearchError, $formCustomError);
		}
		return $validateSearch;
	}

	// Load advanced search
	public function loadAdvancedSearch()
	{
		$this->id->AdvancedSearch->load();
		$this->createddatetime->AdvancedSearch->load();
		$this->BillNumber->AdvancedSearch->load();
		$this->Reception->AdvancedSearch->load();
		$this->PatientId->AdvancedSearch->load();
		$this->mrnno->AdvancedSearch->load();
		$this->PatientName->AdvancedSearch->load();
		$this->Age->AdvancedSearch->load();
		$this->Gender->AdvancedSearch->load();
		$this->profilePic->AdvancedSearch->load();
		$this->Mobile->AdvancedSearch->load();
		$this->IP_OP->AdvancedSearch->load();
		$this->Doctor->AdvancedSearch->load();
		$this->voucher_type->AdvancedSearch->load();
		$this->Details->AdvancedSearch->load();
		$this->ModeofPayment->AdvancedSearch->load();
		$this->Amount->AdvancedSearch->load();
		$this->AnyDues->AdvancedSearch->load();
		$this->DiscountAmount->AdvancedSearch->load();
		$this->createdby->AdvancedSearch->load();
		$this->modifiedby->AdvancedSearch->load();
		$this->modifieddatetime->AdvancedSearch->load();
		$this->RealizationAmount->AdvancedSearch->load();
		$this->RealizationStatus->AdvancedSearch->load();
		$this->RealizationRemarks->AdvancedSearch->load();
		$this->RealizationBatchNo->AdvancedSearch->load();
		$this->RealizationDate->AdvancedSearch->load();
		$this->HospID->AdvancedSearch->load();
		$this->RIDNO->AdvancedSearch->load();
		$this->TidNo->AdvancedSearch->load();
		$this->CId->AdvancedSearch->load();
		$this->PartnerName->AdvancedSearch->load();
		$this->PayerType->AdvancedSearch->load();
		$this->Dob->AdvancedSearch->load();
		$this->Currency->AdvancedSearch->load();
		$this->DiscountRemarks->AdvancedSearch->load();
		$this->Remarks->AdvancedSearch->load();
		$this->PatId->AdvancedSearch->load();
		$this->DrDepartment->AdvancedSearch->load();
		$this->RefferedBy->AdvancedSearch->load();
		$this->CardNumber->AdvancedSearch->load();
		$this->BankName->AdvancedSearch->load();
		$this->DrID->AdvancedSearch->load();
		$this->BillStatus->AdvancedSearch->load();
		$this->ReportHeader->AdvancedSearch->load();
		$this->UserName->AdvancedSearch->load();
		$this->AdjustmentAdvance->AdvancedSearch->load();
		$this->billing_vouchercol->AdvancedSearch->load();
		$this->BillType->AdvancedSearch->load();
		$this->ProcedureName->AdvancedSearch->load();
		$this->ProcedureAmount->AdvancedSearch->load();
		$this->IncludePackage->AdvancedSearch->load();
		$this->CancelBill->AdvancedSearch->load();
		$this->CancelReason->AdvancedSearch->load();
		$this->CancelModeOfPayment->AdvancedSearch->load();
		$this->CancelAmount->AdvancedSearch->load();
		$this->CancelBankName->AdvancedSearch->load();
		$this->CancelTransactionNumber->AdvancedSearch->load();
		$this->LabTest->AdvancedSearch->load();
		$this->sid->AdvancedSearch->load();
		$this->SidNo->AdvancedSearch->load();
		$this->createdDatettime->AdvancedSearch->load();
		$this->BillClosing->AdvancedSearch->load();
		$this->GoogleReviewID->AdvancedSearch->load();
		$this->CardType->AdvancedSearch->load();
		$this->PharmacyBill->AdvancedSearch->load();
		$this->cash->AdvancedSearch->load();
		$this->Card->AdvancedSearch->load();
	}

	// Set up Breadcrumb
	protected function setupBreadcrumb()
	{
		global $Breadcrumb, $Language;
		$Breadcrumb = new Breadcrumb();
		$url = substr(CurrentUrl(), strrpos(CurrentUrl(), "/")+1);
		$Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("view_billing_voucherlist.php"), "", $this->TableVar, TRUE);
		$pageId = "search";
		$Breadcrumb->add("search", $pageId, $url);
	}

	// Setup lookup options
	public function setupLookupOptions($fld)
	{
		if ($fld->Lookup !== NULL && $fld->Lookup->Options === NULL) {

			// No need to check any more
			$fld->Lookup->Options = [];

			// Set up lookup SQL
			switch ($fld->FieldVar) {
				case "x_DrID":
					$lookupFilter = function() {
						return "`HospID`='".HospitalID()."'";
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
						case "x_Reception":
							$row[1] = FormatNumber($row[1], 0, -2, -2, -2);
							$row['df'] = $row[1];
							break;
						case "x_ModeofPayment":
							break;
						case "x_CId":
							break;
						case "x_PatId":
							break;
						case "x_RefferedBy":
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
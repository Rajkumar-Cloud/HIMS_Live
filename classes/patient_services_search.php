<?php
namespace PHPMaker2019\HIMS;

/**
 * Page class
 */
class patient_services_search extends patient_services
{

	// Page ID
	public $PageID = "search";

	// Project ID
	public $ProjectID = "{EA4F6D13-AF8F-428D-9EA7-BA88D1107EC3}";

	// Table name
	public $TableName = 'patient_services';

	// Page object name
	public $PageObjName = "patient_services_search";

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

		// Table object (patient_services)
		if (!isset($GLOBALS["patient_services"]) || get_class($GLOBALS["patient_services"]) == PROJECT_NAMESPACE . "patient_services") {
			$GLOBALS["patient_services"] = &$this;
			$GLOBALS["Table"] = &$GLOBALS["patient_services"];
		}
		$this->CancelUrl = $this->pageUrl() . "action=cancel";

		// Table object (user_login)
		if (!isset($GLOBALS['user_login']))
			$GLOBALS['user_login'] = new user_login();

		// Table object (ip_admission)
		if (!isset($GLOBALS['ip_admission']))
			$GLOBALS['ip_admission'] = new ip_admission();

		// Table object (billing_voucher)
		if (!isset($GLOBALS['billing_voucher']))
			$GLOBALS['billing_voucher'] = new billing_voucher();

		// Page ID
		if (!defined(PROJECT_NAMESPACE . "PAGE_ID"))
			define(PROJECT_NAMESPACE . "PAGE_ID", 'search');

		// Table name (for backward compatibility)
		if (!defined(PROJECT_NAMESPACE . "TABLE_NAME"))
			define(PROJECT_NAMESPACE . "TABLE_NAME", 'patient_services');

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
		global $EXPORT, $patient_services;
		if ($this->CustomExport && $this->CustomExport == $this->Export && array_key_exists($this->CustomExport, $EXPORT)) {
				$content = ob_get_contents();
			if ($ExportFileName == "")
				$ExportFileName = $this->TableVar;
			$class = PROJECT_NAMESPACE . $EXPORT[$this->CustomExport];
			if (class_exists($class)) {
				$doc = new $class($patient_services);
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
					if ($pageName == "patient_servicesview.php")
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
					$this->terminate(GetUrl("patient_serviceslist.php"));
				else
					$this->terminate(GetUrl("login.php"));
				return;
			}
		}

		// Create form object
		$CurrentForm = new HttpForm();
		$this->CurrentAction = Param("action"); // Set up current action
		$this->id->setVisibility();
		$this->Reception->setVisibility();
		$this->Services->setVisibility();
		$this->amount->setVisibility();
		$this->description->setVisibility();
		$this->patient_type->setVisibility();
		$this->charged_date->setVisibility();
		$this->status->setVisibility();
		$this->createdby->setVisibility();
		$this->createddatetime->setVisibility();
		$this->modifiedby->setVisibility();
		$this->modifieddatetime->setVisibility();
		$this->mrnno->setVisibility();
		$this->PatientName->setVisibility();
		$this->Age->setVisibility();
		$this->Gender->setVisibility();
		$this->profilePic->setVisibility();
		$this->Unit->setVisibility();
		$this->Quantity->setVisibility();
		$this->Discount->setVisibility();
		$this->SubTotal->setVisibility();
		$this->ServiceSelect->setVisibility();
		$this->Aid->setVisibility();
		$this->Vid->setVisibility();
		$this->DrID->setVisibility();
		$this->DrCODE->setVisibility();
		$this->DrName->setVisibility();
		$this->Department->setVisibility();
		$this->DrSharePres->setVisibility();
		$this->HospSharePres->setVisibility();
		$this->DrShareAmount->setVisibility();
		$this->HospShareAmount->setVisibility();
		$this->DrShareSettiledAmount->setVisibility();
		$this->DrShareSettledId->setVisibility();
		$this->DrShareSettiledStatus->setVisibility();
		$this->invoiceId->setVisibility();
		$this->invoiceAmount->setVisibility();
		$this->invoiceStatus->setVisibility();
		$this->modeOfPayment->setVisibility();
		$this->HospID->setVisibility();
		$this->RIDNO->setVisibility();
		$this->TidNo->setVisibility();
		$this->DiscountCategory->setVisibility();
		$this->sid->setVisibility();
		$this->ItemCode->setVisibility();
		$this->TestSubCd->setVisibility();
		$this->DEptCd->setVisibility();
		$this->ProfCd->setVisibility();
		$this->LabReport->setVisibility();
		$this->Comments->setVisibility();
		$this->Method->setVisibility();
		$this->Specimen->setVisibility();
		$this->Abnormal->setVisibility();
		$this->RefValue->setVisibility();
		$this->TestUnit->setVisibility();
		$this->LOWHIGH->setVisibility();
		$this->Branch->setVisibility();
		$this->Dispatch->setVisibility();
		$this->Pic1->setVisibility();
		$this->Pic2->setVisibility();
		$this->GraphPath->setVisibility();
		$this->MachineCD->setVisibility();
		$this->TestCancel->setVisibility();
		$this->OutSource->setVisibility();
		$this->Printed->setVisibility();
		$this->PrintBy->setVisibility();
		$this->PrintDate->setVisibility();
		$this->BillingDate->setVisibility();
		$this->BilledBy->setVisibility();
		$this->Resulted->setVisibility();
		$this->ResultDate->setVisibility();
		$this->ResultedBy->setVisibility();
		$this->SampleDate->setVisibility();
		$this->SampleUser->setVisibility();
		$this->Sampled->setVisibility();
		$this->ReceivedDate->setVisibility();
		$this->ReceivedUser->setVisibility();
		$this->Recevied->setVisibility();
		$this->DeptRecvDate->setVisibility();
		$this->DeptRecvUser->setVisibility();
		$this->DeptRecived->setVisibility();
		$this->SAuthDate->setVisibility();
		$this->SAuthBy->setVisibility();
		$this->SAuthendicate->setVisibility();
		$this->AuthDate->setVisibility();
		$this->AuthBy->setVisibility();
		$this->Authencate->setVisibility();
		$this->EditDate->setVisibility();
		$this->EditBy->setVisibility();
		$this->Editted->setVisibility();
		$this->PatID->setVisibility();
		$this->PatientId->setVisibility();
		$this->Mobile->setVisibility();
		$this->CId->setVisibility();
		$this->Order->setVisibility();
		$this->Form->setVisibility();
		$this->ResType->setVisibility();
		$this->Sample->setVisibility();
		$this->NoD->setVisibility();
		$this->BillOrder->setVisibility();
		$this->Formula->setVisibility();
		$this->Inactive->setVisibility();
		$this->CollSample->setVisibility();
		$this->TestType->setVisibility();
		$this->Repeated->setVisibility();
		$this->RepeatedBy->setVisibility();
		$this->RepeatedDate->setVisibility();
		$this->serviceID->setVisibility();
		$this->Service_Type->setVisibility();
		$this->Service_Department->setVisibility();
		$this->RequestNo->setVisibility();
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
		$this->setupLookupOptions($this->Services);
		$this->setupLookupOptions($this->status);

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
					$srchStr = "patient_serviceslist.php" . "?" . $srchStr;
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
		$this->buildSearchUrl($srchUrl, $this->Reception); // Reception
		$this->buildSearchUrl($srchUrl, $this->Services); // Services
		$this->buildSearchUrl($srchUrl, $this->amount); // amount
		$this->buildSearchUrl($srchUrl, $this->description); // description
		$this->buildSearchUrl($srchUrl, $this->patient_type); // patient_type
		$this->buildSearchUrl($srchUrl, $this->charged_date); // charged_date
		$this->buildSearchUrl($srchUrl, $this->status); // status
		$this->buildSearchUrl($srchUrl, $this->createdby); // createdby
		$this->buildSearchUrl($srchUrl, $this->createddatetime); // createddatetime
		$this->buildSearchUrl($srchUrl, $this->modifiedby); // modifiedby
		$this->buildSearchUrl($srchUrl, $this->modifieddatetime); // modifieddatetime
		$this->buildSearchUrl($srchUrl, $this->mrnno); // mrnno
		$this->buildSearchUrl($srchUrl, $this->PatientName); // PatientName
		$this->buildSearchUrl($srchUrl, $this->Age); // Age
		$this->buildSearchUrl($srchUrl, $this->Gender); // Gender
		$this->buildSearchUrl($srchUrl, $this->profilePic); // profilePic
		$this->buildSearchUrl($srchUrl, $this->Unit); // Unit
		$this->buildSearchUrl($srchUrl, $this->Quantity); // Quantity
		$this->buildSearchUrl($srchUrl, $this->Discount); // Discount
		$this->buildSearchUrl($srchUrl, $this->SubTotal); // SubTotal
		$this->buildSearchUrl($srchUrl, $this->ServiceSelect); // ServiceSelect
		$this->buildSearchUrl($srchUrl, $this->Aid); // Aid
		$this->buildSearchUrl($srchUrl, $this->Vid); // Vid
		$this->buildSearchUrl($srchUrl, $this->DrID); // DrID
		$this->buildSearchUrl($srchUrl, $this->DrCODE); // DrCODE
		$this->buildSearchUrl($srchUrl, $this->DrName); // DrName
		$this->buildSearchUrl($srchUrl, $this->Department); // Department
		$this->buildSearchUrl($srchUrl, $this->DrSharePres); // DrSharePres
		$this->buildSearchUrl($srchUrl, $this->HospSharePres); // HospSharePres
		$this->buildSearchUrl($srchUrl, $this->DrShareAmount); // DrShareAmount
		$this->buildSearchUrl($srchUrl, $this->HospShareAmount); // HospShareAmount
		$this->buildSearchUrl($srchUrl, $this->DrShareSettiledAmount); // DrShareSettiledAmount
		$this->buildSearchUrl($srchUrl, $this->DrShareSettledId); // DrShareSettledId
		$this->buildSearchUrl($srchUrl, $this->DrShareSettiledStatus); // DrShareSettiledStatus
		$this->buildSearchUrl($srchUrl, $this->invoiceId); // invoiceId
		$this->buildSearchUrl($srchUrl, $this->invoiceAmount); // invoiceAmount
		$this->buildSearchUrl($srchUrl, $this->invoiceStatus); // invoiceStatus
		$this->buildSearchUrl($srchUrl, $this->modeOfPayment); // modeOfPayment
		$this->buildSearchUrl($srchUrl, $this->HospID); // HospID
		$this->buildSearchUrl($srchUrl, $this->RIDNO); // RIDNO
		$this->buildSearchUrl($srchUrl, $this->TidNo); // TidNo
		$this->buildSearchUrl($srchUrl, $this->DiscountCategory); // DiscountCategory
		$this->buildSearchUrl($srchUrl, $this->sid); // sid
		$this->buildSearchUrl($srchUrl, $this->ItemCode); // ItemCode
		$this->buildSearchUrl($srchUrl, $this->TestSubCd); // TestSubCd
		$this->buildSearchUrl($srchUrl, $this->DEptCd); // DEptCd
		$this->buildSearchUrl($srchUrl, $this->ProfCd); // ProfCd
		$this->buildSearchUrl($srchUrl, $this->LabReport); // LabReport
		$this->buildSearchUrl($srchUrl, $this->Comments); // Comments
		$this->buildSearchUrl($srchUrl, $this->Method); // Method
		$this->buildSearchUrl($srchUrl, $this->Specimen); // Specimen
		$this->buildSearchUrl($srchUrl, $this->Abnormal); // Abnormal
		$this->buildSearchUrl($srchUrl, $this->RefValue); // RefValue
		$this->buildSearchUrl($srchUrl, $this->TestUnit); // TestUnit
		$this->buildSearchUrl($srchUrl, $this->LOWHIGH); // LOWHIGH
		$this->buildSearchUrl($srchUrl, $this->Branch); // Branch
		$this->buildSearchUrl($srchUrl, $this->Dispatch); // Dispatch
		$this->buildSearchUrl($srchUrl, $this->Pic1); // Pic1
		$this->buildSearchUrl($srchUrl, $this->Pic2); // Pic2
		$this->buildSearchUrl($srchUrl, $this->GraphPath); // GraphPath
		$this->buildSearchUrl($srchUrl, $this->MachineCD); // MachineCD
		$this->buildSearchUrl($srchUrl, $this->TestCancel); // TestCancel
		$this->buildSearchUrl($srchUrl, $this->OutSource); // OutSource
		$this->buildSearchUrl($srchUrl, $this->Printed); // Printed
		$this->buildSearchUrl($srchUrl, $this->PrintBy); // PrintBy
		$this->buildSearchUrl($srchUrl, $this->PrintDate); // PrintDate
		$this->buildSearchUrl($srchUrl, $this->BillingDate); // BillingDate
		$this->buildSearchUrl($srchUrl, $this->BilledBy); // BilledBy
		$this->buildSearchUrl($srchUrl, $this->Resulted); // Resulted
		$this->buildSearchUrl($srchUrl, $this->ResultDate); // ResultDate
		$this->buildSearchUrl($srchUrl, $this->ResultedBy); // ResultedBy
		$this->buildSearchUrl($srchUrl, $this->SampleDate); // SampleDate
		$this->buildSearchUrl($srchUrl, $this->SampleUser); // SampleUser
		$this->buildSearchUrl($srchUrl, $this->Sampled); // Sampled
		$this->buildSearchUrl($srchUrl, $this->ReceivedDate); // ReceivedDate
		$this->buildSearchUrl($srchUrl, $this->ReceivedUser); // ReceivedUser
		$this->buildSearchUrl($srchUrl, $this->Recevied); // Recevied
		$this->buildSearchUrl($srchUrl, $this->DeptRecvDate); // DeptRecvDate
		$this->buildSearchUrl($srchUrl, $this->DeptRecvUser); // DeptRecvUser
		$this->buildSearchUrl($srchUrl, $this->DeptRecived); // DeptRecived
		$this->buildSearchUrl($srchUrl, $this->SAuthDate); // SAuthDate
		$this->buildSearchUrl($srchUrl, $this->SAuthBy); // SAuthBy
		$this->buildSearchUrl($srchUrl, $this->SAuthendicate); // SAuthendicate
		$this->buildSearchUrl($srchUrl, $this->AuthDate); // AuthDate
		$this->buildSearchUrl($srchUrl, $this->AuthBy); // AuthBy
		$this->buildSearchUrl($srchUrl, $this->Authencate); // Authencate
		$this->buildSearchUrl($srchUrl, $this->EditDate); // EditDate
		$this->buildSearchUrl($srchUrl, $this->EditBy); // EditBy
		$this->buildSearchUrl($srchUrl, $this->Editted); // Editted
		$this->buildSearchUrl($srchUrl, $this->PatID); // PatID
		$this->buildSearchUrl($srchUrl, $this->PatientId); // PatientId
		$this->buildSearchUrl($srchUrl, $this->Mobile); // Mobile
		$this->buildSearchUrl($srchUrl, $this->CId); // CId
		$this->buildSearchUrl($srchUrl, $this->Order); // Order
		$this->buildSearchUrl($srchUrl, $this->Form); // Form
		$this->buildSearchUrl($srchUrl, $this->ResType); // ResType
		$this->buildSearchUrl($srchUrl, $this->Sample); // Sample
		$this->buildSearchUrl($srchUrl, $this->NoD); // NoD
		$this->buildSearchUrl($srchUrl, $this->BillOrder); // BillOrder
		$this->buildSearchUrl($srchUrl, $this->Formula); // Formula
		$this->buildSearchUrl($srchUrl, $this->Inactive); // Inactive
		$this->buildSearchUrl($srchUrl, $this->CollSample); // CollSample
		$this->buildSearchUrl($srchUrl, $this->TestType); // TestType
		$this->buildSearchUrl($srchUrl, $this->Repeated); // Repeated
		$this->buildSearchUrl($srchUrl, $this->RepeatedBy); // RepeatedBy
		$this->buildSearchUrl($srchUrl, $this->RepeatedDate); // RepeatedDate
		$this->buildSearchUrl($srchUrl, $this->serviceID); // serviceID
		$this->buildSearchUrl($srchUrl, $this->Service_Type); // Service_Type
		$this->buildSearchUrl($srchUrl, $this->Service_Department); // Service_Department
		$this->buildSearchUrl($srchUrl, $this->RequestNo); // RequestNo
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

		// Reception
		if (!$this->isAddOrEdit())
			$this->Reception->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_Reception"));
		$this->Reception->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_Reception"));

		// Services
		if (!$this->isAddOrEdit())
			$this->Services->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_Services"));
		$this->Services->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_Services"));

		// amount
		if (!$this->isAddOrEdit())
			$this->amount->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_amount"));
		$this->amount->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_amount"));

		// description
		if (!$this->isAddOrEdit())
			$this->description->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_description"));
		$this->description->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_description"));

		// patient_type
		if (!$this->isAddOrEdit())
			$this->patient_type->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_patient_type"));
		$this->patient_type->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_patient_type"));

		// charged_date
		if (!$this->isAddOrEdit())
			$this->charged_date->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_charged_date"));
		$this->charged_date->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_charged_date"));

		// status
		if (!$this->isAddOrEdit())
			$this->status->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_status"));
		$this->status->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_status"));

		// createdby
		if (!$this->isAddOrEdit())
			$this->createdby->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_createdby"));
		$this->createdby->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_createdby"));

		// createddatetime
		if (!$this->isAddOrEdit())
			$this->createddatetime->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_createddatetime"));
		$this->createddatetime->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_createddatetime"));

		// modifiedby
		if (!$this->isAddOrEdit())
			$this->modifiedby->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_modifiedby"));
		$this->modifiedby->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_modifiedby"));

		// modifieddatetime
		if (!$this->isAddOrEdit())
			$this->modifieddatetime->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_modifieddatetime"));
		$this->modifieddatetime->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_modifieddatetime"));

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

		// Unit
		if (!$this->isAddOrEdit())
			$this->Unit->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_Unit"));
		$this->Unit->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_Unit"));

		// Quantity
		if (!$this->isAddOrEdit())
			$this->Quantity->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_Quantity"));
		$this->Quantity->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_Quantity"));

		// Discount
		if (!$this->isAddOrEdit())
			$this->Discount->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_Discount"));
		$this->Discount->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_Discount"));

		// SubTotal
		if (!$this->isAddOrEdit())
			$this->SubTotal->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_SubTotal"));
		$this->SubTotal->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_SubTotal"));

		// ServiceSelect
		if (!$this->isAddOrEdit())
			$this->ServiceSelect->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_ServiceSelect"));
		$this->ServiceSelect->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_ServiceSelect"));
		if (is_array($this->ServiceSelect->AdvancedSearch->SearchValue))
			$this->ServiceSelect->AdvancedSearch->SearchValue = implode(",", $this->ServiceSelect->AdvancedSearch->SearchValue);
		if (is_array($this->ServiceSelect->AdvancedSearch->SearchValue2))
			$this->ServiceSelect->AdvancedSearch->SearchValue2 = implode(",", $this->ServiceSelect->AdvancedSearch->SearchValue2);

		// Aid
		if (!$this->isAddOrEdit())
			$this->Aid->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_Aid"));
		$this->Aid->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_Aid"));

		// Vid
		if (!$this->isAddOrEdit())
			$this->Vid->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_Vid"));
		$this->Vid->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_Vid"));

		// DrID
		if (!$this->isAddOrEdit())
			$this->DrID->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_DrID"));
		$this->DrID->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_DrID"));

		// DrCODE
		if (!$this->isAddOrEdit())
			$this->DrCODE->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_DrCODE"));
		$this->DrCODE->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_DrCODE"));

		// DrName
		if (!$this->isAddOrEdit())
			$this->DrName->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_DrName"));
		$this->DrName->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_DrName"));

		// Department
		if (!$this->isAddOrEdit())
			$this->Department->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_Department"));
		$this->Department->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_Department"));

		// DrSharePres
		if (!$this->isAddOrEdit())
			$this->DrSharePres->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_DrSharePres"));
		$this->DrSharePres->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_DrSharePres"));

		// HospSharePres
		if (!$this->isAddOrEdit())
			$this->HospSharePres->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_HospSharePres"));
		$this->HospSharePres->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_HospSharePres"));

		// DrShareAmount
		if (!$this->isAddOrEdit())
			$this->DrShareAmount->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_DrShareAmount"));
		$this->DrShareAmount->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_DrShareAmount"));

		// HospShareAmount
		if (!$this->isAddOrEdit())
			$this->HospShareAmount->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_HospShareAmount"));
		$this->HospShareAmount->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_HospShareAmount"));

		// DrShareSettiledAmount
		if (!$this->isAddOrEdit())
			$this->DrShareSettiledAmount->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_DrShareSettiledAmount"));
		$this->DrShareSettiledAmount->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_DrShareSettiledAmount"));

		// DrShareSettledId
		if (!$this->isAddOrEdit())
			$this->DrShareSettledId->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_DrShareSettledId"));
		$this->DrShareSettledId->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_DrShareSettledId"));

		// DrShareSettiledStatus
		if (!$this->isAddOrEdit())
			$this->DrShareSettiledStatus->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_DrShareSettiledStatus"));
		$this->DrShareSettiledStatus->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_DrShareSettiledStatus"));

		// invoiceId
		if (!$this->isAddOrEdit())
			$this->invoiceId->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_invoiceId"));
		$this->invoiceId->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_invoiceId"));

		// invoiceAmount
		if (!$this->isAddOrEdit())
			$this->invoiceAmount->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_invoiceAmount"));
		$this->invoiceAmount->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_invoiceAmount"));

		// invoiceStatus
		if (!$this->isAddOrEdit())
			$this->invoiceStatus->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_invoiceStatus"));
		$this->invoiceStatus->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_invoiceStatus"));

		// modeOfPayment
		if (!$this->isAddOrEdit())
			$this->modeOfPayment->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_modeOfPayment"));
		$this->modeOfPayment->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_modeOfPayment"));

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

		// DiscountCategory
		if (!$this->isAddOrEdit())
			$this->DiscountCategory->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_DiscountCategory"));
		$this->DiscountCategory->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_DiscountCategory"));

		// sid
		if (!$this->isAddOrEdit())
			$this->sid->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_sid"));
		$this->sid->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_sid"));

		// ItemCode
		if (!$this->isAddOrEdit())
			$this->ItemCode->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_ItemCode"));
		$this->ItemCode->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_ItemCode"));

		// TestSubCd
		if (!$this->isAddOrEdit())
			$this->TestSubCd->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_TestSubCd"));
		$this->TestSubCd->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_TestSubCd"));

		// DEptCd
		if (!$this->isAddOrEdit())
			$this->DEptCd->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_DEptCd"));
		$this->DEptCd->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_DEptCd"));

		// ProfCd
		if (!$this->isAddOrEdit())
			$this->ProfCd->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_ProfCd"));
		$this->ProfCd->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_ProfCd"));

		// LabReport
		if (!$this->isAddOrEdit())
			$this->LabReport->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_LabReport"));
		$this->LabReport->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_LabReport"));

		// Comments
		if (!$this->isAddOrEdit())
			$this->Comments->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_Comments"));
		$this->Comments->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_Comments"));

		// Method
		if (!$this->isAddOrEdit())
			$this->Method->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_Method"));
		$this->Method->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_Method"));

		// Specimen
		if (!$this->isAddOrEdit())
			$this->Specimen->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_Specimen"));
		$this->Specimen->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_Specimen"));

		// Abnormal
		if (!$this->isAddOrEdit())
			$this->Abnormal->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_Abnormal"));
		$this->Abnormal->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_Abnormal"));

		// RefValue
		if (!$this->isAddOrEdit())
			$this->RefValue->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_RefValue"));
		$this->RefValue->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_RefValue"));

		// TestUnit
		if (!$this->isAddOrEdit())
			$this->TestUnit->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_TestUnit"));
		$this->TestUnit->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_TestUnit"));

		// LOWHIGH
		if (!$this->isAddOrEdit())
			$this->LOWHIGH->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_LOWHIGH"));
		$this->LOWHIGH->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_LOWHIGH"));

		// Branch
		if (!$this->isAddOrEdit())
			$this->Branch->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_Branch"));
		$this->Branch->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_Branch"));

		// Dispatch
		if (!$this->isAddOrEdit())
			$this->Dispatch->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_Dispatch"));
		$this->Dispatch->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_Dispatch"));

		// Pic1
		if (!$this->isAddOrEdit())
			$this->Pic1->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_Pic1"));
		$this->Pic1->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_Pic1"));

		// Pic2
		if (!$this->isAddOrEdit())
			$this->Pic2->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_Pic2"));
		$this->Pic2->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_Pic2"));

		// GraphPath
		if (!$this->isAddOrEdit())
			$this->GraphPath->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_GraphPath"));
		$this->GraphPath->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_GraphPath"));

		// MachineCD
		if (!$this->isAddOrEdit())
			$this->MachineCD->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_MachineCD"));
		$this->MachineCD->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_MachineCD"));

		// TestCancel
		if (!$this->isAddOrEdit())
			$this->TestCancel->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_TestCancel"));
		$this->TestCancel->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_TestCancel"));

		// OutSource
		if (!$this->isAddOrEdit())
			$this->OutSource->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_OutSource"));
		$this->OutSource->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_OutSource"));

		// Printed
		if (!$this->isAddOrEdit())
			$this->Printed->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_Printed"));
		$this->Printed->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_Printed"));

		// PrintBy
		if (!$this->isAddOrEdit())
			$this->PrintBy->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_PrintBy"));
		$this->PrintBy->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_PrintBy"));

		// PrintDate
		if (!$this->isAddOrEdit())
			$this->PrintDate->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_PrintDate"));
		$this->PrintDate->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_PrintDate"));

		// BillingDate
		if (!$this->isAddOrEdit())
			$this->BillingDate->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_BillingDate"));
		$this->BillingDate->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_BillingDate"));

		// BilledBy
		if (!$this->isAddOrEdit())
			$this->BilledBy->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_BilledBy"));
		$this->BilledBy->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_BilledBy"));

		// Resulted
		if (!$this->isAddOrEdit())
			$this->Resulted->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_Resulted"));
		$this->Resulted->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_Resulted"));

		// ResultDate
		if (!$this->isAddOrEdit())
			$this->ResultDate->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_ResultDate"));
		$this->ResultDate->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_ResultDate"));

		// ResultedBy
		if (!$this->isAddOrEdit())
			$this->ResultedBy->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_ResultedBy"));
		$this->ResultedBy->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_ResultedBy"));

		// SampleDate
		if (!$this->isAddOrEdit())
			$this->SampleDate->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_SampleDate"));
		$this->SampleDate->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_SampleDate"));

		// SampleUser
		if (!$this->isAddOrEdit())
			$this->SampleUser->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_SampleUser"));
		$this->SampleUser->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_SampleUser"));

		// Sampled
		if (!$this->isAddOrEdit())
			$this->Sampled->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_Sampled"));
		$this->Sampled->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_Sampled"));

		// ReceivedDate
		if (!$this->isAddOrEdit())
			$this->ReceivedDate->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_ReceivedDate"));
		$this->ReceivedDate->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_ReceivedDate"));

		// ReceivedUser
		if (!$this->isAddOrEdit())
			$this->ReceivedUser->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_ReceivedUser"));
		$this->ReceivedUser->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_ReceivedUser"));

		// Recevied
		if (!$this->isAddOrEdit())
			$this->Recevied->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_Recevied"));
		$this->Recevied->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_Recevied"));

		// DeptRecvDate
		if (!$this->isAddOrEdit())
			$this->DeptRecvDate->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_DeptRecvDate"));
		$this->DeptRecvDate->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_DeptRecvDate"));

		// DeptRecvUser
		if (!$this->isAddOrEdit())
			$this->DeptRecvUser->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_DeptRecvUser"));
		$this->DeptRecvUser->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_DeptRecvUser"));

		// DeptRecived
		if (!$this->isAddOrEdit())
			$this->DeptRecived->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_DeptRecived"));
		$this->DeptRecived->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_DeptRecived"));

		// SAuthDate
		if (!$this->isAddOrEdit())
			$this->SAuthDate->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_SAuthDate"));
		$this->SAuthDate->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_SAuthDate"));

		// SAuthBy
		if (!$this->isAddOrEdit())
			$this->SAuthBy->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_SAuthBy"));
		$this->SAuthBy->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_SAuthBy"));

		// SAuthendicate
		if (!$this->isAddOrEdit())
			$this->SAuthendicate->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_SAuthendicate"));
		$this->SAuthendicate->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_SAuthendicate"));

		// AuthDate
		if (!$this->isAddOrEdit())
			$this->AuthDate->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_AuthDate"));
		$this->AuthDate->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_AuthDate"));

		// AuthBy
		if (!$this->isAddOrEdit())
			$this->AuthBy->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_AuthBy"));
		$this->AuthBy->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_AuthBy"));

		// Authencate
		if (!$this->isAddOrEdit())
			$this->Authencate->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_Authencate"));
		$this->Authencate->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_Authencate"));

		// EditDate
		if (!$this->isAddOrEdit())
			$this->EditDate->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_EditDate"));
		$this->EditDate->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_EditDate"));

		// EditBy
		if (!$this->isAddOrEdit())
			$this->EditBy->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_EditBy"));
		$this->EditBy->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_EditBy"));

		// Editted
		if (!$this->isAddOrEdit())
			$this->Editted->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_Editted"));
		$this->Editted->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_Editted"));

		// PatID
		if (!$this->isAddOrEdit())
			$this->PatID->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_PatID"));
		$this->PatID->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_PatID"));

		// PatientId
		if (!$this->isAddOrEdit())
			$this->PatientId->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_PatientId"));
		$this->PatientId->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_PatientId"));

		// Mobile
		if (!$this->isAddOrEdit())
			$this->Mobile->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_Mobile"));
		$this->Mobile->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_Mobile"));

		// CId
		if (!$this->isAddOrEdit())
			$this->CId->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_CId"));
		$this->CId->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_CId"));

		// Order
		if (!$this->isAddOrEdit())
			$this->Order->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_Order"));
		$this->Order->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_Order"));

		// Form
		if (!$this->isAddOrEdit())
			$this->Form->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_Form"));
		$this->Form->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_Form"));

		// ResType
		if (!$this->isAddOrEdit())
			$this->ResType->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_ResType"));
		$this->ResType->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_ResType"));

		// Sample
		if (!$this->isAddOrEdit())
			$this->Sample->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_Sample"));
		$this->Sample->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_Sample"));

		// NoD
		if (!$this->isAddOrEdit())
			$this->NoD->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_NoD"));
		$this->NoD->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_NoD"));

		// BillOrder
		if (!$this->isAddOrEdit())
			$this->BillOrder->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_BillOrder"));
		$this->BillOrder->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_BillOrder"));

		// Formula
		if (!$this->isAddOrEdit())
			$this->Formula->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_Formula"));
		$this->Formula->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_Formula"));

		// Inactive
		if (!$this->isAddOrEdit())
			$this->Inactive->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_Inactive"));
		$this->Inactive->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_Inactive"));

		// CollSample
		if (!$this->isAddOrEdit())
			$this->CollSample->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_CollSample"));
		$this->CollSample->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_CollSample"));

		// TestType
		if (!$this->isAddOrEdit())
			$this->TestType->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_TestType"));
		$this->TestType->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_TestType"));

		// Repeated
		if (!$this->isAddOrEdit())
			$this->Repeated->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_Repeated"));
		$this->Repeated->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_Repeated"));

		// RepeatedBy
		if (!$this->isAddOrEdit())
			$this->RepeatedBy->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_RepeatedBy"));
		$this->RepeatedBy->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_RepeatedBy"));

		// RepeatedDate
		if (!$this->isAddOrEdit())
			$this->RepeatedDate->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_RepeatedDate"));
		$this->RepeatedDate->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_RepeatedDate"));

		// serviceID
		if (!$this->isAddOrEdit())
			$this->serviceID->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_serviceID"));
		$this->serviceID->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_serviceID"));

		// Service_Type
		if (!$this->isAddOrEdit())
			$this->Service_Type->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_Service_Type"));
		$this->Service_Type->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_Service_Type"));

		// Service_Department
		if (!$this->isAddOrEdit())
			$this->Service_Department->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_Service_Department"));
		$this->Service_Department->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_Service_Department"));

		// RequestNo
		if (!$this->isAddOrEdit())
			$this->RequestNo->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_RequestNo"));
		$this->RequestNo->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_RequestNo"));
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
		if ($this->DrSharePres->FormValue == $this->DrSharePres->CurrentValue && is_numeric(ConvertToFloatString($this->DrSharePres->CurrentValue)))
			$this->DrSharePres->CurrentValue = ConvertToFloatString($this->DrSharePres->CurrentValue);

		// Convert decimal values if posted back
		if ($this->HospSharePres->FormValue == $this->HospSharePres->CurrentValue && is_numeric(ConvertToFloatString($this->HospSharePres->CurrentValue)))
			$this->HospSharePres->CurrentValue = ConvertToFloatString($this->HospSharePres->CurrentValue);

		// Convert decimal values if posted back
		if ($this->DrShareAmount->FormValue == $this->DrShareAmount->CurrentValue && is_numeric(ConvertToFloatString($this->DrShareAmount->CurrentValue)))
			$this->DrShareAmount->CurrentValue = ConvertToFloatString($this->DrShareAmount->CurrentValue);

		// Convert decimal values if posted back
		if ($this->HospShareAmount->FormValue == $this->HospShareAmount->CurrentValue && is_numeric(ConvertToFloatString($this->HospShareAmount->CurrentValue)))
			$this->HospShareAmount->CurrentValue = ConvertToFloatString($this->HospShareAmount->CurrentValue);

		// Convert decimal values if posted back
		if ($this->DrShareSettiledAmount->FormValue == $this->DrShareSettiledAmount->CurrentValue && is_numeric(ConvertToFloatString($this->DrShareSettiledAmount->CurrentValue)))
			$this->DrShareSettiledAmount->CurrentValue = ConvertToFloatString($this->DrShareSettiledAmount->CurrentValue);

		// Convert decimal values if posted back
		if ($this->invoiceAmount->FormValue == $this->invoiceAmount->CurrentValue && is_numeric(ConvertToFloatString($this->invoiceAmount->CurrentValue)))
			$this->invoiceAmount->CurrentValue = ConvertToFloatString($this->invoiceAmount->CurrentValue);

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
		// id
		// Reception
		// Services
		// amount
		// description
		// patient_type
		// charged_date
		// status
		// createdby
		// createddatetime
		// modifiedby
		// modifieddatetime
		// mrnno
		// PatientName
		// Age
		// Gender
		// profilePic
		// Unit
		// Quantity
		// Discount
		// SubTotal
		// ServiceSelect
		// Aid
		// Vid
		// DrID
		// DrCODE
		// DrName
		// Department
		// DrSharePres
		// HospSharePres
		// DrShareAmount
		// HospShareAmount
		// DrShareSettiledAmount
		// DrShareSettledId
		// DrShareSettiledStatus
		// invoiceId
		// invoiceAmount
		// invoiceStatus
		// modeOfPayment
		// HospID
		// RIDNO
		// TidNo
		// DiscountCategory
		// sid
		// ItemCode
		// TestSubCd
		// DEptCd
		// ProfCd
		// LabReport
		// Comments
		// Method
		// Specimen
		// Abnormal
		// RefValue
		// TestUnit
		// LOWHIGH
		// Branch
		// Dispatch
		// Pic1
		// Pic2
		// GraphPath
		// MachineCD
		// TestCancel
		// OutSource
		// Printed
		// PrintBy
		// PrintDate
		// BillingDate
		// BilledBy
		// Resulted
		// ResultDate
		// ResultedBy
		// SampleDate
		// SampleUser
		// Sampled
		// ReceivedDate
		// ReceivedUser
		// Recevied
		// DeptRecvDate
		// DeptRecvUser
		// DeptRecived
		// SAuthDate
		// SAuthBy
		// SAuthendicate
		// AuthDate
		// AuthBy
		// Authencate
		// EditDate
		// EditBy
		// Editted
		// PatID
		// PatientId
		// Mobile
		// CId
		// Order
		// Form
		// ResType
		// Sample
		// NoD
		// BillOrder
		// Formula
		// Inactive
		// CollSample
		// TestType
		// Repeated
		// RepeatedBy
		// RepeatedDate
		// serviceID
		// Service_Type
		// Service_Department
		// RequestNo

		if ($this->RowType == ROWTYPE_VIEW) { // View row

			// id
			$this->id->ViewValue = $this->id->CurrentValue;
			$this->id->ViewCustomAttributes = "";

			// Reception
			$this->Reception->ViewValue = $this->Reception->CurrentValue;
			$this->Reception->ViewValue = FormatNumber($this->Reception->ViewValue, 0, -2, -2, -2);
			$this->Reception->ViewCustomAttributes = "";

			// Services
			if ($this->Services->VirtualValue <> "") {
				$this->Services->ViewValue = $this->Services->VirtualValue;
			} else {
				$this->Services->ViewValue = $this->Services->CurrentValue;
			$curVal = strval($this->Services->CurrentValue);
			if ($curVal <> "") {
				$this->Services->ViewValue = $this->Services->lookupCacheOption($curVal);
				if ($this->Services->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`SERVICE`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$lookupFilter = function() {
						return "`Inactive` != 'Y'";
					};
					$lookupFilter = $lookupFilter->bindTo($this);
					$sqlWrk = $this->Services->Lookup->getSql(FALSE, $filterWrk, $lookupFilter, $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = $rswrk->fields('df');
						$this->Services->ViewValue = $this->Services->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->Services->ViewValue = $this->Services->CurrentValue;
					}
				}
			} else {
				$this->Services->ViewValue = NULL;
			}
			}
			$this->Services->ViewCustomAttributes = "";

			// amount
			$this->amount->ViewValue = $this->amount->CurrentValue;
			$this->amount->ViewValue = FormatNumber($this->amount->ViewValue, 2, -2, -2, -2);
			$this->amount->ViewCustomAttributes = "";

			// description
			$this->description->ViewValue = $this->description->CurrentValue;
			$this->description->ViewCustomAttributes = "";

			// patient_type
			$this->patient_type->ViewValue = $this->patient_type->CurrentValue;
			$this->patient_type->ViewValue = FormatNumber($this->patient_type->ViewValue, 0, -2, -2, -2);
			$this->patient_type->ViewCustomAttributes = "";

			// charged_date
			$this->charged_date->ViewValue = $this->charged_date->CurrentValue;
			$this->charged_date->ViewValue = FormatDateTime($this->charged_date->ViewValue, 0);
			$this->charged_date->ViewCustomAttributes = "";

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

			// Unit
			$this->Unit->ViewValue = $this->Unit->CurrentValue;
			$this->Unit->ViewValue = FormatNumber($this->Unit->ViewValue, 0, -2, -2, -2);
			$this->Unit->ViewCustomAttributes = "";

			// Quantity
			$this->Quantity->ViewValue = $this->Quantity->CurrentValue;
			$this->Quantity->ViewValue = FormatNumber($this->Quantity->ViewValue, 0, -2, -2, -2);
			$this->Quantity->ViewCustomAttributes = "";

			// Discount
			$this->Discount->ViewValue = $this->Discount->CurrentValue;
			$this->Discount->ViewValue = FormatNumber($this->Discount->ViewValue, 2, -2, -2, -2);
			$this->Discount->ViewCustomAttributes = "";

			// SubTotal
			$this->SubTotal->ViewValue = $this->SubTotal->CurrentValue;
			$this->SubTotal->ViewValue = FormatNumber($this->SubTotal->ViewValue, 2, -2, -2, -2);
			$this->SubTotal->ViewCustomAttributes = "";

			// ServiceSelect
			if (strval($this->ServiceSelect->CurrentValue) <> "") {
				$this->ServiceSelect->ViewValue = new OptionValues();
				$arwrk = explode(",", strval($this->ServiceSelect->CurrentValue));
				$cnt = count($arwrk);
				for ($ari = 0; $ari < $cnt; $ari++)
					$this->ServiceSelect->ViewValue->add($this->ServiceSelect->optionCaption(trim($arwrk[$ari])));
			} else {
				$this->ServiceSelect->ViewValue = NULL;
			}
			$this->ServiceSelect->ViewCustomAttributes = "";

			// Aid
			$this->Aid->ViewValue = $this->Aid->CurrentValue;
			$this->Aid->ViewValue = FormatNumber($this->Aid->ViewValue, 0, -2, -2, -2);
			$this->Aid->ViewCustomAttributes = "";

			// Vid
			$this->Vid->ViewValue = $this->Vid->CurrentValue;
			$this->Vid->ViewValue = FormatNumber($this->Vid->ViewValue, 0, -2, -2, -2);
			$this->Vid->ViewCustomAttributes = "";

			// DrID
			$this->DrID->ViewValue = $this->DrID->CurrentValue;
			$this->DrID->ViewValue = FormatNumber($this->DrID->ViewValue, 0, -2, -2, -2);
			$this->DrID->ViewCustomAttributes = "";

			// DrCODE
			$this->DrCODE->ViewValue = $this->DrCODE->CurrentValue;
			$this->DrCODE->ViewCustomAttributes = "";

			// DrName
			$this->DrName->ViewValue = $this->DrName->CurrentValue;
			$this->DrName->ViewCustomAttributes = "";

			// Department
			$this->Department->ViewValue = $this->Department->CurrentValue;
			$this->Department->ViewCustomAttributes = "";

			// DrSharePres
			$this->DrSharePres->ViewValue = $this->DrSharePres->CurrentValue;
			$this->DrSharePres->ViewValue = FormatNumber($this->DrSharePres->ViewValue, 2, -2, -2, -2);
			$this->DrSharePres->ViewCustomAttributes = "";

			// HospSharePres
			$this->HospSharePres->ViewValue = $this->HospSharePres->CurrentValue;
			$this->HospSharePres->ViewValue = FormatNumber($this->HospSharePres->ViewValue, 2, -2, -2, -2);
			$this->HospSharePres->ViewCustomAttributes = "";

			// DrShareAmount
			$this->DrShareAmount->ViewValue = $this->DrShareAmount->CurrentValue;
			$this->DrShareAmount->ViewValue = FormatNumber($this->DrShareAmount->ViewValue, 2, -2, -2, -2);
			$this->DrShareAmount->ViewCustomAttributes = "";

			// HospShareAmount
			$this->HospShareAmount->ViewValue = $this->HospShareAmount->CurrentValue;
			$this->HospShareAmount->ViewValue = FormatNumber($this->HospShareAmount->ViewValue, 2, -2, -2, -2);
			$this->HospShareAmount->ViewCustomAttributes = "";

			// DrShareSettiledAmount
			$this->DrShareSettiledAmount->ViewValue = $this->DrShareSettiledAmount->CurrentValue;
			$this->DrShareSettiledAmount->ViewValue = FormatNumber($this->DrShareSettiledAmount->ViewValue, 2, -2, -2, -2);
			$this->DrShareSettiledAmount->ViewCustomAttributes = "";

			// DrShareSettledId
			$this->DrShareSettledId->ViewValue = $this->DrShareSettledId->CurrentValue;
			$this->DrShareSettledId->ViewValue = FormatNumber($this->DrShareSettledId->ViewValue, 0, -2, -2, -2);
			$this->DrShareSettledId->ViewCustomAttributes = "";

			// DrShareSettiledStatus
			$this->DrShareSettiledStatus->ViewValue = $this->DrShareSettiledStatus->CurrentValue;
			$this->DrShareSettiledStatus->ViewValue = FormatNumber($this->DrShareSettiledStatus->ViewValue, 0, -2, -2, -2);
			$this->DrShareSettiledStatus->ViewCustomAttributes = "";

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

			// DiscountCategory
			$this->DiscountCategory->ViewValue = $this->DiscountCategory->CurrentValue;
			$this->DiscountCategory->ViewCustomAttributes = "";

			// sid
			$this->sid->ViewValue = $this->sid->CurrentValue;
			$this->sid->ViewValue = FormatNumber($this->sid->ViewValue, 0, -2, -2, -2);
			$this->sid->ViewCustomAttributes = "";

			// ItemCode
			$this->ItemCode->ViewValue = $this->ItemCode->CurrentValue;
			$this->ItemCode->ViewCustomAttributes = "";

			// TestSubCd
			$this->TestSubCd->ViewValue = $this->TestSubCd->CurrentValue;
			$this->TestSubCd->ViewCustomAttributes = "";

			// DEptCd
			$this->DEptCd->ViewValue = $this->DEptCd->CurrentValue;
			$this->DEptCd->ViewCustomAttributes = "";

			// ProfCd
			$this->ProfCd->ViewValue = $this->ProfCd->CurrentValue;
			$this->ProfCd->ViewCustomAttributes = "";

			// LabReport
			$this->LabReport->ViewValue = $this->LabReport->CurrentValue;
			$this->LabReport->ViewCustomAttributes = "";

			// Comments
			$this->Comments->ViewValue = $this->Comments->CurrentValue;
			$this->Comments->ViewCustomAttributes = "";

			// Method
			$this->Method->ViewValue = $this->Method->CurrentValue;
			$this->Method->ViewCustomAttributes = "";

			// Specimen
			$this->Specimen->ViewValue = $this->Specimen->CurrentValue;
			$this->Specimen->ViewCustomAttributes = "";

			// Abnormal
			$this->Abnormal->ViewValue = $this->Abnormal->CurrentValue;
			$this->Abnormal->ViewCustomAttributes = "";

			// RefValue
			$this->RefValue->ViewValue = $this->RefValue->CurrentValue;
			$this->RefValue->ViewCustomAttributes = "";

			// TestUnit
			$this->TestUnit->ViewValue = $this->TestUnit->CurrentValue;
			$this->TestUnit->ViewCustomAttributes = "";

			// LOWHIGH
			$this->LOWHIGH->ViewValue = $this->LOWHIGH->CurrentValue;
			$this->LOWHIGH->ViewCustomAttributes = "";

			// Branch
			$this->Branch->ViewValue = $this->Branch->CurrentValue;
			$this->Branch->ViewCustomAttributes = "";

			// Dispatch
			$this->Dispatch->ViewValue = $this->Dispatch->CurrentValue;
			$this->Dispatch->ViewCustomAttributes = "";

			// Pic1
			$this->Pic1->ViewValue = $this->Pic1->CurrentValue;
			$this->Pic1->ViewCustomAttributes = "";

			// Pic2
			$this->Pic2->ViewValue = $this->Pic2->CurrentValue;
			$this->Pic2->ViewCustomAttributes = "";

			// GraphPath
			$this->GraphPath->ViewValue = $this->GraphPath->CurrentValue;
			$this->GraphPath->ViewCustomAttributes = "";

			// MachineCD
			$this->MachineCD->ViewValue = $this->MachineCD->CurrentValue;
			$this->MachineCD->ViewCustomAttributes = "";

			// TestCancel
			$this->TestCancel->ViewValue = $this->TestCancel->CurrentValue;
			$this->TestCancel->ViewCustomAttributes = "";

			// OutSource
			$this->OutSource->ViewValue = $this->OutSource->CurrentValue;
			$this->OutSource->ViewCustomAttributes = "";

			// Printed
			$this->Printed->ViewValue = $this->Printed->CurrentValue;
			$this->Printed->ViewCustomAttributes = "";

			// PrintBy
			$this->PrintBy->ViewValue = $this->PrintBy->CurrentValue;
			$this->PrintBy->ViewCustomAttributes = "";

			// PrintDate
			$this->PrintDate->ViewValue = $this->PrintDate->CurrentValue;
			$this->PrintDate->ViewValue = FormatDateTime($this->PrintDate->ViewValue, 0);
			$this->PrintDate->ViewCustomAttributes = "";

			// BillingDate
			$this->BillingDate->ViewValue = $this->BillingDate->CurrentValue;
			$this->BillingDate->ViewValue = FormatDateTime($this->BillingDate->ViewValue, 0);
			$this->BillingDate->ViewCustomAttributes = "";

			// BilledBy
			$this->BilledBy->ViewValue = $this->BilledBy->CurrentValue;
			$this->BilledBy->ViewCustomAttributes = "";

			// Resulted
			$this->Resulted->ViewValue = $this->Resulted->CurrentValue;
			$this->Resulted->ViewCustomAttributes = "";

			// ResultDate
			$this->ResultDate->ViewValue = $this->ResultDate->CurrentValue;
			$this->ResultDate->ViewValue = FormatDateTime($this->ResultDate->ViewValue, 0);
			$this->ResultDate->ViewCustomAttributes = "";

			// ResultedBy
			$this->ResultedBy->ViewValue = $this->ResultedBy->CurrentValue;
			$this->ResultedBy->ViewCustomAttributes = "";

			// SampleDate
			$this->SampleDate->ViewValue = $this->SampleDate->CurrentValue;
			$this->SampleDate->ViewValue = FormatDateTime($this->SampleDate->ViewValue, 0);
			$this->SampleDate->ViewCustomAttributes = "";

			// SampleUser
			$this->SampleUser->ViewValue = $this->SampleUser->CurrentValue;
			$this->SampleUser->ViewCustomAttributes = "";

			// Sampled
			$this->Sampled->ViewValue = $this->Sampled->CurrentValue;
			$this->Sampled->ViewCustomAttributes = "";

			// ReceivedDate
			$this->ReceivedDate->ViewValue = $this->ReceivedDate->CurrentValue;
			$this->ReceivedDate->ViewValue = FormatDateTime($this->ReceivedDate->ViewValue, 0);
			$this->ReceivedDate->ViewCustomAttributes = "";

			// ReceivedUser
			$this->ReceivedUser->ViewValue = $this->ReceivedUser->CurrentValue;
			$this->ReceivedUser->ViewCustomAttributes = "";

			// Recevied
			$this->Recevied->ViewValue = $this->Recevied->CurrentValue;
			$this->Recevied->ViewCustomAttributes = "";

			// DeptRecvDate
			$this->DeptRecvDate->ViewValue = $this->DeptRecvDate->CurrentValue;
			$this->DeptRecvDate->ViewValue = FormatDateTime($this->DeptRecvDate->ViewValue, 0);
			$this->DeptRecvDate->ViewCustomAttributes = "";

			// DeptRecvUser
			$this->DeptRecvUser->ViewValue = $this->DeptRecvUser->CurrentValue;
			$this->DeptRecvUser->ViewCustomAttributes = "";

			// DeptRecived
			$this->DeptRecived->ViewValue = $this->DeptRecived->CurrentValue;
			$this->DeptRecived->ViewCustomAttributes = "";

			// SAuthDate
			$this->SAuthDate->ViewValue = $this->SAuthDate->CurrentValue;
			$this->SAuthDate->ViewValue = FormatDateTime($this->SAuthDate->ViewValue, 0);
			$this->SAuthDate->ViewCustomAttributes = "";

			// SAuthBy
			$this->SAuthBy->ViewValue = $this->SAuthBy->CurrentValue;
			$this->SAuthBy->ViewCustomAttributes = "";

			// SAuthendicate
			$this->SAuthendicate->ViewValue = $this->SAuthendicate->CurrentValue;
			$this->SAuthendicate->ViewCustomAttributes = "";

			// AuthDate
			$this->AuthDate->ViewValue = $this->AuthDate->CurrentValue;
			$this->AuthDate->ViewValue = FormatDateTime($this->AuthDate->ViewValue, 0);
			$this->AuthDate->ViewCustomAttributes = "";

			// AuthBy
			$this->AuthBy->ViewValue = $this->AuthBy->CurrentValue;
			$this->AuthBy->ViewCustomAttributes = "";

			// Authencate
			$this->Authencate->ViewValue = $this->Authencate->CurrentValue;
			$this->Authencate->ViewCustomAttributes = "";

			// EditDate
			$this->EditDate->ViewValue = $this->EditDate->CurrentValue;
			$this->EditDate->ViewValue = FormatDateTime($this->EditDate->ViewValue, 0);
			$this->EditDate->ViewCustomAttributes = "";

			// EditBy
			$this->EditBy->ViewValue = $this->EditBy->CurrentValue;
			$this->EditBy->ViewCustomAttributes = "";

			// Editted
			$this->Editted->ViewValue = $this->Editted->CurrentValue;
			$this->Editted->ViewCustomAttributes = "";

			// PatID
			$this->PatID->ViewValue = $this->PatID->CurrentValue;
			$this->PatID->ViewValue = FormatNumber($this->PatID->ViewValue, 0, -2, -2, -2);
			$this->PatID->ViewCustomAttributes = "";

			// PatientId
			$this->PatientId->ViewValue = $this->PatientId->CurrentValue;
			$this->PatientId->ViewCustomAttributes = "";

			// Mobile
			$this->Mobile->ViewValue = $this->Mobile->CurrentValue;
			$this->Mobile->ViewCustomAttributes = "";

			// CId
			$this->CId->ViewValue = $this->CId->CurrentValue;
			$this->CId->ViewValue = FormatNumber($this->CId->ViewValue, 0, -2, -2, -2);
			$this->CId->ViewCustomAttributes = "";

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
			$this->Inactive->ViewValue = $this->Inactive->CurrentValue;
			$this->Inactive->ViewCustomAttributes = "";

			// CollSample
			$this->CollSample->ViewValue = $this->CollSample->CurrentValue;
			$this->CollSample->ViewCustomAttributes = "";

			// TestType
			$this->TestType->ViewValue = $this->TestType->CurrentValue;
			$this->TestType->ViewCustomAttributes = "";

			// Repeated
			$this->Repeated->ViewValue = $this->Repeated->CurrentValue;
			$this->Repeated->ViewCustomAttributes = "";

			// RepeatedBy
			$this->RepeatedBy->ViewValue = $this->RepeatedBy->CurrentValue;
			$this->RepeatedBy->ViewCustomAttributes = "";

			// RepeatedDate
			$this->RepeatedDate->ViewValue = $this->RepeatedDate->CurrentValue;
			$this->RepeatedDate->ViewValue = FormatDateTime($this->RepeatedDate->ViewValue, 0);
			$this->RepeatedDate->ViewCustomAttributes = "";

			// serviceID
			$this->serviceID->ViewValue = $this->serviceID->CurrentValue;
			$this->serviceID->ViewValue = FormatNumber($this->serviceID->ViewValue, 0, -2, -2, -2);
			$this->serviceID->ViewCustomAttributes = "";

			// Service_Type
			$this->Service_Type->ViewValue = $this->Service_Type->CurrentValue;
			$this->Service_Type->ViewCustomAttributes = "";

			// Service_Department
			$this->Service_Department->ViewValue = $this->Service_Department->CurrentValue;
			$this->Service_Department->ViewCustomAttributes = "";

			// RequestNo
			$this->RequestNo->ViewValue = $this->RequestNo->CurrentValue;
			$this->RequestNo->ViewValue = FormatNumber($this->RequestNo->ViewValue, 0, -2, -2, -2);
			$this->RequestNo->ViewCustomAttributes = "";

			// id
			$this->id->LinkCustomAttributes = "";
			$this->id->HrefValue = "";
			$this->id->TooltipValue = "";

			// Reception
			$this->Reception->LinkCustomAttributes = "";
			$this->Reception->HrefValue = "";
			$this->Reception->TooltipValue = "";

			// Services
			$this->Services->LinkCustomAttributes = "";
			$this->Services->HrefValue = "";
			$this->Services->TooltipValue = "";

			// amount
			$this->amount->LinkCustomAttributes = "";
			$this->amount->HrefValue = "";
			$this->amount->TooltipValue = "";

			// description
			$this->description->LinkCustomAttributes = "";
			$this->description->HrefValue = "";
			$this->description->TooltipValue = "";

			// patient_type
			$this->patient_type->LinkCustomAttributes = "";
			$this->patient_type->HrefValue = "";
			$this->patient_type->TooltipValue = "";

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

			// Unit
			$this->Unit->LinkCustomAttributes = "";
			$this->Unit->HrefValue = "";
			$this->Unit->TooltipValue = "";

			// Quantity
			$this->Quantity->LinkCustomAttributes = "";
			$this->Quantity->HrefValue = "";
			$this->Quantity->TooltipValue = "";

			// Discount
			$this->Discount->LinkCustomAttributes = "";
			$this->Discount->HrefValue = "";
			$this->Discount->TooltipValue = "";

			// SubTotal
			$this->SubTotal->LinkCustomAttributes = "";
			$this->SubTotal->HrefValue = "";
			$this->SubTotal->TooltipValue = "";

			// ServiceSelect
			$this->ServiceSelect->LinkCustomAttributes = "";
			$this->ServiceSelect->HrefValue = "";
			$this->ServiceSelect->TooltipValue = "";

			// Aid
			$this->Aid->LinkCustomAttributes = "";
			$this->Aid->HrefValue = "";
			$this->Aid->TooltipValue = "";

			// Vid
			$this->Vid->LinkCustomAttributes = "";
			$this->Vid->HrefValue = "";
			$this->Vid->TooltipValue = "";

			// DrID
			$this->DrID->LinkCustomAttributes = "";
			$this->DrID->HrefValue = "";
			$this->DrID->TooltipValue = "";

			// DrCODE
			$this->DrCODE->LinkCustomAttributes = "";
			$this->DrCODE->HrefValue = "";
			$this->DrCODE->TooltipValue = "";

			// DrName
			$this->DrName->LinkCustomAttributes = "";
			$this->DrName->HrefValue = "";
			$this->DrName->TooltipValue = "";

			// Department
			$this->Department->LinkCustomAttributes = "";
			$this->Department->HrefValue = "";
			$this->Department->TooltipValue = "";

			// DrSharePres
			$this->DrSharePres->LinkCustomAttributes = "";
			$this->DrSharePres->HrefValue = "";
			$this->DrSharePres->TooltipValue = "";

			// HospSharePres
			$this->HospSharePres->LinkCustomAttributes = "";
			$this->HospSharePres->HrefValue = "";
			$this->HospSharePres->TooltipValue = "";

			// DrShareAmount
			$this->DrShareAmount->LinkCustomAttributes = "";
			$this->DrShareAmount->HrefValue = "";
			$this->DrShareAmount->TooltipValue = "";

			// HospShareAmount
			$this->HospShareAmount->LinkCustomAttributes = "";
			$this->HospShareAmount->HrefValue = "";
			$this->HospShareAmount->TooltipValue = "";

			// DrShareSettiledAmount
			$this->DrShareSettiledAmount->LinkCustomAttributes = "";
			$this->DrShareSettiledAmount->HrefValue = "";
			$this->DrShareSettiledAmount->TooltipValue = "";

			// DrShareSettledId
			$this->DrShareSettledId->LinkCustomAttributes = "";
			$this->DrShareSettledId->HrefValue = "";
			$this->DrShareSettledId->TooltipValue = "";

			// DrShareSettiledStatus
			$this->DrShareSettiledStatus->LinkCustomAttributes = "";
			$this->DrShareSettiledStatus->HrefValue = "";
			$this->DrShareSettiledStatus->TooltipValue = "";

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

			// DiscountCategory
			$this->DiscountCategory->LinkCustomAttributes = "";
			$this->DiscountCategory->HrefValue = "";
			$this->DiscountCategory->TooltipValue = "";

			// sid
			$this->sid->LinkCustomAttributes = "";
			$this->sid->HrefValue = "";
			$this->sid->TooltipValue = "";

			// ItemCode
			$this->ItemCode->LinkCustomAttributes = "";
			$this->ItemCode->HrefValue = "";
			$this->ItemCode->TooltipValue = "";

			// TestSubCd
			$this->TestSubCd->LinkCustomAttributes = "";
			$this->TestSubCd->HrefValue = "";
			$this->TestSubCd->TooltipValue = "";

			// DEptCd
			$this->DEptCd->LinkCustomAttributes = "";
			$this->DEptCd->HrefValue = "";
			$this->DEptCd->TooltipValue = "";

			// ProfCd
			$this->ProfCd->LinkCustomAttributes = "";
			$this->ProfCd->HrefValue = "";
			$this->ProfCd->TooltipValue = "";

			// LabReport
			$this->LabReport->LinkCustomAttributes = "";
			$this->LabReport->HrefValue = "";
			$this->LabReport->TooltipValue = "";

			// Comments
			$this->Comments->LinkCustomAttributes = "";
			$this->Comments->HrefValue = "";
			$this->Comments->TooltipValue = "";

			// Method
			$this->Method->LinkCustomAttributes = "";
			$this->Method->HrefValue = "";
			$this->Method->TooltipValue = "";

			// Specimen
			$this->Specimen->LinkCustomAttributes = "";
			$this->Specimen->HrefValue = "";
			$this->Specimen->TooltipValue = "";

			// Abnormal
			$this->Abnormal->LinkCustomAttributes = "";
			$this->Abnormal->HrefValue = "";
			$this->Abnormal->TooltipValue = "";

			// RefValue
			$this->RefValue->LinkCustomAttributes = "";
			$this->RefValue->HrefValue = "";
			$this->RefValue->TooltipValue = "";

			// TestUnit
			$this->TestUnit->LinkCustomAttributes = "";
			$this->TestUnit->HrefValue = "";
			$this->TestUnit->TooltipValue = "";

			// LOWHIGH
			$this->LOWHIGH->LinkCustomAttributes = "";
			$this->LOWHIGH->HrefValue = "";
			$this->LOWHIGH->TooltipValue = "";

			// Branch
			$this->Branch->LinkCustomAttributes = "";
			$this->Branch->HrefValue = "";
			$this->Branch->TooltipValue = "";

			// Dispatch
			$this->Dispatch->LinkCustomAttributes = "";
			$this->Dispatch->HrefValue = "";
			$this->Dispatch->TooltipValue = "";

			// Pic1
			$this->Pic1->LinkCustomAttributes = "";
			$this->Pic1->HrefValue = "";
			$this->Pic1->TooltipValue = "";

			// Pic2
			$this->Pic2->LinkCustomAttributes = "";
			$this->Pic2->HrefValue = "";
			$this->Pic2->TooltipValue = "";

			// GraphPath
			$this->GraphPath->LinkCustomAttributes = "";
			$this->GraphPath->HrefValue = "";
			$this->GraphPath->TooltipValue = "";

			// MachineCD
			$this->MachineCD->LinkCustomAttributes = "";
			$this->MachineCD->HrefValue = "";
			$this->MachineCD->TooltipValue = "";

			// TestCancel
			$this->TestCancel->LinkCustomAttributes = "";
			$this->TestCancel->HrefValue = "";
			$this->TestCancel->TooltipValue = "";

			// OutSource
			$this->OutSource->LinkCustomAttributes = "";
			$this->OutSource->HrefValue = "";
			$this->OutSource->TooltipValue = "";

			// Printed
			$this->Printed->LinkCustomAttributes = "";
			$this->Printed->HrefValue = "";
			$this->Printed->TooltipValue = "";

			// PrintBy
			$this->PrintBy->LinkCustomAttributes = "";
			$this->PrintBy->HrefValue = "";
			$this->PrintBy->TooltipValue = "";

			// PrintDate
			$this->PrintDate->LinkCustomAttributes = "";
			$this->PrintDate->HrefValue = "";
			$this->PrintDate->TooltipValue = "";

			// BillingDate
			$this->BillingDate->LinkCustomAttributes = "";
			$this->BillingDate->HrefValue = "";
			$this->BillingDate->TooltipValue = "";

			// BilledBy
			$this->BilledBy->LinkCustomAttributes = "";
			$this->BilledBy->HrefValue = "";
			$this->BilledBy->TooltipValue = "";

			// Resulted
			$this->Resulted->LinkCustomAttributes = "";
			$this->Resulted->HrefValue = "";
			$this->Resulted->TooltipValue = "";

			// ResultDate
			$this->ResultDate->LinkCustomAttributes = "";
			$this->ResultDate->HrefValue = "";
			$this->ResultDate->TooltipValue = "";

			// ResultedBy
			$this->ResultedBy->LinkCustomAttributes = "";
			$this->ResultedBy->HrefValue = "";
			$this->ResultedBy->TooltipValue = "";

			// SampleDate
			$this->SampleDate->LinkCustomAttributes = "";
			$this->SampleDate->HrefValue = "";
			$this->SampleDate->TooltipValue = "";

			// SampleUser
			$this->SampleUser->LinkCustomAttributes = "";
			$this->SampleUser->HrefValue = "";
			$this->SampleUser->TooltipValue = "";

			// Sampled
			$this->Sampled->LinkCustomAttributes = "";
			$this->Sampled->HrefValue = "";
			$this->Sampled->TooltipValue = "";

			// ReceivedDate
			$this->ReceivedDate->LinkCustomAttributes = "";
			$this->ReceivedDate->HrefValue = "";
			$this->ReceivedDate->TooltipValue = "";

			// ReceivedUser
			$this->ReceivedUser->LinkCustomAttributes = "";
			$this->ReceivedUser->HrefValue = "";
			$this->ReceivedUser->TooltipValue = "";

			// Recevied
			$this->Recevied->LinkCustomAttributes = "";
			$this->Recevied->HrefValue = "";
			$this->Recevied->TooltipValue = "";

			// DeptRecvDate
			$this->DeptRecvDate->LinkCustomAttributes = "";
			$this->DeptRecvDate->HrefValue = "";
			$this->DeptRecvDate->TooltipValue = "";

			// DeptRecvUser
			$this->DeptRecvUser->LinkCustomAttributes = "";
			$this->DeptRecvUser->HrefValue = "";
			$this->DeptRecvUser->TooltipValue = "";

			// DeptRecived
			$this->DeptRecived->LinkCustomAttributes = "";
			$this->DeptRecived->HrefValue = "";
			$this->DeptRecived->TooltipValue = "";

			// SAuthDate
			$this->SAuthDate->LinkCustomAttributes = "";
			$this->SAuthDate->HrefValue = "";
			$this->SAuthDate->TooltipValue = "";

			// SAuthBy
			$this->SAuthBy->LinkCustomAttributes = "";
			$this->SAuthBy->HrefValue = "";
			$this->SAuthBy->TooltipValue = "";

			// SAuthendicate
			$this->SAuthendicate->LinkCustomAttributes = "";
			$this->SAuthendicate->HrefValue = "";
			$this->SAuthendicate->TooltipValue = "";

			// AuthDate
			$this->AuthDate->LinkCustomAttributes = "";
			$this->AuthDate->HrefValue = "";
			$this->AuthDate->TooltipValue = "";

			// AuthBy
			$this->AuthBy->LinkCustomAttributes = "";
			$this->AuthBy->HrefValue = "";
			$this->AuthBy->TooltipValue = "";

			// Authencate
			$this->Authencate->LinkCustomAttributes = "";
			$this->Authencate->HrefValue = "";
			$this->Authencate->TooltipValue = "";

			// EditDate
			$this->EditDate->LinkCustomAttributes = "";
			$this->EditDate->HrefValue = "";
			$this->EditDate->TooltipValue = "";

			// EditBy
			$this->EditBy->LinkCustomAttributes = "";
			$this->EditBy->HrefValue = "";
			$this->EditBy->TooltipValue = "";

			// Editted
			$this->Editted->LinkCustomAttributes = "";
			$this->Editted->HrefValue = "";
			$this->Editted->TooltipValue = "";

			// PatID
			$this->PatID->LinkCustomAttributes = "";
			$this->PatID->HrefValue = "";
			$this->PatID->TooltipValue = "";

			// PatientId
			$this->PatientId->LinkCustomAttributes = "";
			$this->PatientId->HrefValue = "";
			$this->PatientId->TooltipValue = "";

			// Mobile
			$this->Mobile->LinkCustomAttributes = "";
			$this->Mobile->HrefValue = "";
			$this->Mobile->TooltipValue = "";

			// CId
			$this->CId->LinkCustomAttributes = "";
			$this->CId->HrefValue = "";
			$this->CId->TooltipValue = "";

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

			// CollSample
			$this->CollSample->LinkCustomAttributes = "";
			$this->CollSample->HrefValue = "";
			$this->CollSample->TooltipValue = "";

			// TestType
			$this->TestType->LinkCustomAttributes = "";
			$this->TestType->HrefValue = "";
			$this->TestType->TooltipValue = "";

			// Repeated
			$this->Repeated->LinkCustomAttributes = "";
			$this->Repeated->HrefValue = "";
			$this->Repeated->TooltipValue = "";

			// RepeatedBy
			$this->RepeatedBy->LinkCustomAttributes = "";
			$this->RepeatedBy->HrefValue = "";
			$this->RepeatedBy->TooltipValue = "";

			// RepeatedDate
			$this->RepeatedDate->LinkCustomAttributes = "";
			$this->RepeatedDate->HrefValue = "";
			$this->RepeatedDate->TooltipValue = "";

			// serviceID
			$this->serviceID->LinkCustomAttributes = "";
			$this->serviceID->HrefValue = "";
			$this->serviceID->TooltipValue = "";

			// Service_Type
			$this->Service_Type->LinkCustomAttributes = "";
			$this->Service_Type->HrefValue = "";
			$this->Service_Type->TooltipValue = "";

			// Service_Department
			$this->Service_Department->LinkCustomAttributes = "";
			$this->Service_Department->HrefValue = "";
			$this->Service_Department->TooltipValue = "";

			// RequestNo
			$this->RequestNo->LinkCustomAttributes = "";
			$this->RequestNo->HrefValue = "";
			$this->RequestNo->TooltipValue = "";
		} elseif ($this->RowType == ROWTYPE_SEARCH) { // Search row

			// id
			$this->id->EditAttrs["class"] = "form-control";
			$this->id->EditCustomAttributes = "";
			$this->id->EditValue = HtmlEncode($this->id->AdvancedSearch->SearchValue);
			$this->id->PlaceHolder = RemoveHtml($this->id->caption());

			// Reception
			$this->Reception->EditAttrs["class"] = "form-control";
			$this->Reception->EditCustomAttributes = "";
			$this->Reception->EditValue = HtmlEncode($this->Reception->AdvancedSearch->SearchValue);
			$this->Reception->PlaceHolder = RemoveHtml($this->Reception->caption());

			// Services
			$this->Services->EditAttrs["class"] = "form-control";
			$this->Services->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Services->AdvancedSearch->SearchValue = HtmlDecode($this->Services->AdvancedSearch->SearchValue);
			$this->Services->EditValue = HtmlEncode($this->Services->AdvancedSearch->SearchValue);
			$this->Services->PlaceHolder = RemoveHtml($this->Services->caption());

			// amount
			$this->amount->EditAttrs["class"] = "form-control";
			$this->amount->EditCustomAttributes = "";
			$this->amount->EditValue = HtmlEncode($this->amount->AdvancedSearch->SearchValue);
			$this->amount->PlaceHolder = RemoveHtml($this->amount->caption());

			// description
			$this->description->EditAttrs["class"] = "form-control";
			$this->description->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->description->AdvancedSearch->SearchValue = HtmlDecode($this->description->AdvancedSearch->SearchValue);
			$this->description->EditValue = HtmlEncode($this->description->AdvancedSearch->SearchValue);
			$this->description->PlaceHolder = RemoveHtml($this->description->caption());

			// patient_type
			$this->patient_type->EditAttrs["class"] = "form-control";
			$this->patient_type->EditCustomAttributes = "";
			$this->patient_type->EditValue = HtmlEncode($this->patient_type->AdvancedSearch->SearchValue);
			$this->patient_type->PlaceHolder = RemoveHtml($this->patient_type->caption());

			// charged_date
			$this->charged_date->EditAttrs["class"] = "form-control";
			$this->charged_date->EditCustomAttributes = "";
			$this->charged_date->EditValue = HtmlEncode(FormatDateTime(UnFormatDateTime($this->charged_date->AdvancedSearch->SearchValue, 0), 8));
			$this->charged_date->PlaceHolder = RemoveHtml($this->charged_date->caption());

			// status
			$this->status->EditAttrs["class"] = "form-control";
			$this->status->EditCustomAttributes = "";
			$curVal = trim(strval($this->status->AdvancedSearch->SearchValue));
			if ($curVal <> "")
				$this->status->AdvancedSearch->ViewValue = $this->status->lookupCacheOption($curVal);
			else
				$this->status->AdvancedSearch->ViewValue = $this->status->Lookup !== NULL && is_array($this->status->Lookup->Options) ? $curVal : NULL;
			if ($this->status->AdvancedSearch->ViewValue !== NULL) { // Load from cache
				$this->status->EditValue = array_values($this->status->Lookup->Options);
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`id`" . SearchString("=", $this->status->AdvancedSearch->SearchValue, DATATYPE_NUMBER, "");
				}
				$sqlWrk = $this->status->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
				if ($rswrk) $rswrk->Close();
				$this->status->EditValue = $arwrk;
			}

			// createdby
			$this->createdby->EditAttrs["class"] = "form-control";
			$this->createdby->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->createdby->AdvancedSearch->SearchValue = HtmlDecode($this->createdby->AdvancedSearch->SearchValue);
			$this->createdby->EditValue = HtmlEncode($this->createdby->AdvancedSearch->SearchValue);
			$this->createdby->PlaceHolder = RemoveHtml($this->createdby->caption());

			// createddatetime
			$this->createddatetime->EditAttrs["class"] = "form-control";
			$this->createddatetime->EditCustomAttributes = "";
			$this->createddatetime->EditValue = HtmlEncode(FormatDateTime(UnFormatDateTime($this->createddatetime->AdvancedSearch->SearchValue, 0), 8));
			$this->createddatetime->PlaceHolder = RemoveHtml($this->createddatetime->caption());

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

			// Unit
			$this->Unit->EditAttrs["class"] = "form-control";
			$this->Unit->EditCustomAttributes = "";
			$this->Unit->EditValue = HtmlEncode($this->Unit->AdvancedSearch->SearchValue);
			$this->Unit->PlaceHolder = RemoveHtml($this->Unit->caption());

			// Quantity
			$this->Quantity->EditAttrs["class"] = "form-control";
			$this->Quantity->EditCustomAttributes = "";
			$this->Quantity->EditValue = HtmlEncode($this->Quantity->AdvancedSearch->SearchValue);
			$this->Quantity->PlaceHolder = RemoveHtml($this->Quantity->caption());

			// Discount
			$this->Discount->EditAttrs["class"] = "form-control";
			$this->Discount->EditCustomAttributes = "";
			$this->Discount->EditValue = HtmlEncode($this->Discount->AdvancedSearch->SearchValue);
			$this->Discount->PlaceHolder = RemoveHtml($this->Discount->caption());

			// SubTotal
			$this->SubTotal->EditAttrs["class"] = "form-control";
			$this->SubTotal->EditCustomAttributes = "";
			$this->SubTotal->EditValue = HtmlEncode($this->SubTotal->AdvancedSearch->SearchValue);
			$this->SubTotal->PlaceHolder = RemoveHtml($this->SubTotal->caption());

			// ServiceSelect
			$this->ServiceSelect->EditCustomAttributes = "";
			$this->ServiceSelect->EditValue = $this->ServiceSelect->options(FALSE);

			// Aid
			$this->Aid->EditAttrs["class"] = "form-control";
			$this->Aid->EditCustomAttributes = "";
			$this->Aid->EditValue = HtmlEncode($this->Aid->AdvancedSearch->SearchValue);
			$this->Aid->PlaceHolder = RemoveHtml($this->Aid->caption());

			// Vid
			$this->Vid->EditAttrs["class"] = "form-control";
			$this->Vid->EditCustomAttributes = "";
			$this->Vid->EditValue = HtmlEncode($this->Vid->AdvancedSearch->SearchValue);
			$this->Vid->PlaceHolder = RemoveHtml($this->Vid->caption());

			// DrID
			$this->DrID->EditAttrs["class"] = "form-control";
			$this->DrID->EditCustomAttributes = "";
			$this->DrID->EditValue = HtmlEncode($this->DrID->AdvancedSearch->SearchValue);
			$this->DrID->PlaceHolder = RemoveHtml($this->DrID->caption());

			// DrCODE
			$this->DrCODE->EditAttrs["class"] = "form-control";
			$this->DrCODE->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->DrCODE->AdvancedSearch->SearchValue = HtmlDecode($this->DrCODE->AdvancedSearch->SearchValue);
			$this->DrCODE->EditValue = HtmlEncode($this->DrCODE->AdvancedSearch->SearchValue);
			$this->DrCODE->PlaceHolder = RemoveHtml($this->DrCODE->caption());

			// DrName
			$this->DrName->EditAttrs["class"] = "form-control";
			$this->DrName->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->DrName->AdvancedSearch->SearchValue = HtmlDecode($this->DrName->AdvancedSearch->SearchValue);
			$this->DrName->EditValue = HtmlEncode($this->DrName->AdvancedSearch->SearchValue);
			$this->DrName->PlaceHolder = RemoveHtml($this->DrName->caption());

			// Department
			$this->Department->EditAttrs["class"] = "form-control";
			$this->Department->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Department->AdvancedSearch->SearchValue = HtmlDecode($this->Department->AdvancedSearch->SearchValue);
			$this->Department->EditValue = HtmlEncode($this->Department->AdvancedSearch->SearchValue);
			$this->Department->PlaceHolder = RemoveHtml($this->Department->caption());

			// DrSharePres
			$this->DrSharePres->EditAttrs["class"] = "form-control";
			$this->DrSharePres->EditCustomAttributes = "";
			$this->DrSharePres->EditValue = HtmlEncode($this->DrSharePres->AdvancedSearch->SearchValue);
			$this->DrSharePres->PlaceHolder = RemoveHtml($this->DrSharePres->caption());

			// HospSharePres
			$this->HospSharePres->EditAttrs["class"] = "form-control";
			$this->HospSharePres->EditCustomAttributes = "";
			$this->HospSharePres->EditValue = HtmlEncode($this->HospSharePres->AdvancedSearch->SearchValue);
			$this->HospSharePres->PlaceHolder = RemoveHtml($this->HospSharePres->caption());

			// DrShareAmount
			$this->DrShareAmount->EditAttrs["class"] = "form-control";
			$this->DrShareAmount->EditCustomAttributes = "";
			$this->DrShareAmount->EditValue = HtmlEncode($this->DrShareAmount->AdvancedSearch->SearchValue);
			$this->DrShareAmount->PlaceHolder = RemoveHtml($this->DrShareAmount->caption());

			// HospShareAmount
			$this->HospShareAmount->EditAttrs["class"] = "form-control";
			$this->HospShareAmount->EditCustomAttributes = "";
			$this->HospShareAmount->EditValue = HtmlEncode($this->HospShareAmount->AdvancedSearch->SearchValue);
			$this->HospShareAmount->PlaceHolder = RemoveHtml($this->HospShareAmount->caption());

			// DrShareSettiledAmount
			$this->DrShareSettiledAmount->EditAttrs["class"] = "form-control";
			$this->DrShareSettiledAmount->EditCustomAttributes = "";
			$this->DrShareSettiledAmount->EditValue = HtmlEncode($this->DrShareSettiledAmount->AdvancedSearch->SearchValue);
			$this->DrShareSettiledAmount->PlaceHolder = RemoveHtml($this->DrShareSettiledAmount->caption());

			// DrShareSettledId
			$this->DrShareSettledId->EditAttrs["class"] = "form-control";
			$this->DrShareSettledId->EditCustomAttributes = "";
			$this->DrShareSettledId->EditValue = HtmlEncode($this->DrShareSettledId->AdvancedSearch->SearchValue);
			$this->DrShareSettledId->PlaceHolder = RemoveHtml($this->DrShareSettledId->caption());

			// DrShareSettiledStatus
			$this->DrShareSettiledStatus->EditAttrs["class"] = "form-control";
			$this->DrShareSettiledStatus->EditCustomAttributes = "";
			$this->DrShareSettiledStatus->EditValue = HtmlEncode($this->DrShareSettiledStatus->AdvancedSearch->SearchValue);
			$this->DrShareSettiledStatus->PlaceHolder = RemoveHtml($this->DrShareSettiledStatus->caption());

			// invoiceId
			$this->invoiceId->EditAttrs["class"] = "form-control";
			$this->invoiceId->EditCustomAttributes = "";
			$this->invoiceId->EditValue = HtmlEncode($this->invoiceId->AdvancedSearch->SearchValue);
			$this->invoiceId->PlaceHolder = RemoveHtml($this->invoiceId->caption());

			// invoiceAmount
			$this->invoiceAmount->EditAttrs["class"] = "form-control";
			$this->invoiceAmount->EditCustomAttributes = "";
			$this->invoiceAmount->EditValue = HtmlEncode($this->invoiceAmount->AdvancedSearch->SearchValue);
			$this->invoiceAmount->PlaceHolder = RemoveHtml($this->invoiceAmount->caption());

			// invoiceStatus
			$this->invoiceStatus->EditAttrs["class"] = "form-control";
			$this->invoiceStatus->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->invoiceStatus->AdvancedSearch->SearchValue = HtmlDecode($this->invoiceStatus->AdvancedSearch->SearchValue);
			$this->invoiceStatus->EditValue = HtmlEncode($this->invoiceStatus->AdvancedSearch->SearchValue);
			$this->invoiceStatus->PlaceHolder = RemoveHtml($this->invoiceStatus->caption());

			// modeOfPayment
			$this->modeOfPayment->EditAttrs["class"] = "form-control";
			$this->modeOfPayment->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->modeOfPayment->AdvancedSearch->SearchValue = HtmlDecode($this->modeOfPayment->AdvancedSearch->SearchValue);
			$this->modeOfPayment->EditValue = HtmlEncode($this->modeOfPayment->AdvancedSearch->SearchValue);
			$this->modeOfPayment->PlaceHolder = RemoveHtml($this->modeOfPayment->caption());

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

			// DiscountCategory
			$this->DiscountCategory->EditAttrs["class"] = "form-control";
			$this->DiscountCategory->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->DiscountCategory->AdvancedSearch->SearchValue = HtmlDecode($this->DiscountCategory->AdvancedSearch->SearchValue);
			$this->DiscountCategory->EditValue = HtmlEncode($this->DiscountCategory->AdvancedSearch->SearchValue);
			$this->DiscountCategory->PlaceHolder = RemoveHtml($this->DiscountCategory->caption());

			// sid
			$this->sid->EditAttrs["class"] = "form-control";
			$this->sid->EditCustomAttributes = "";
			$this->sid->EditValue = HtmlEncode($this->sid->AdvancedSearch->SearchValue);
			$this->sid->PlaceHolder = RemoveHtml($this->sid->caption());

			// ItemCode
			$this->ItemCode->EditAttrs["class"] = "form-control";
			$this->ItemCode->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->ItemCode->AdvancedSearch->SearchValue = HtmlDecode($this->ItemCode->AdvancedSearch->SearchValue);
			$this->ItemCode->EditValue = HtmlEncode($this->ItemCode->AdvancedSearch->SearchValue);
			$this->ItemCode->PlaceHolder = RemoveHtml($this->ItemCode->caption());

			// TestSubCd
			$this->TestSubCd->EditAttrs["class"] = "form-control";
			$this->TestSubCd->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->TestSubCd->AdvancedSearch->SearchValue = HtmlDecode($this->TestSubCd->AdvancedSearch->SearchValue);
			$this->TestSubCd->EditValue = HtmlEncode($this->TestSubCd->AdvancedSearch->SearchValue);
			$this->TestSubCd->PlaceHolder = RemoveHtml($this->TestSubCd->caption());

			// DEptCd
			$this->DEptCd->EditAttrs["class"] = "form-control";
			$this->DEptCd->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->DEptCd->AdvancedSearch->SearchValue = HtmlDecode($this->DEptCd->AdvancedSearch->SearchValue);
			$this->DEptCd->EditValue = HtmlEncode($this->DEptCd->AdvancedSearch->SearchValue);
			$this->DEptCd->PlaceHolder = RemoveHtml($this->DEptCd->caption());

			// ProfCd
			$this->ProfCd->EditAttrs["class"] = "form-control";
			$this->ProfCd->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->ProfCd->AdvancedSearch->SearchValue = HtmlDecode($this->ProfCd->AdvancedSearch->SearchValue);
			$this->ProfCd->EditValue = HtmlEncode($this->ProfCd->AdvancedSearch->SearchValue);
			$this->ProfCd->PlaceHolder = RemoveHtml($this->ProfCd->caption());

			// LabReport
			$this->LabReport->EditAttrs["class"] = "form-control";
			$this->LabReport->EditCustomAttributes = "";
			$this->LabReport->EditValue = HtmlEncode($this->LabReport->AdvancedSearch->SearchValue);
			$this->LabReport->PlaceHolder = RemoveHtml($this->LabReport->caption());

			// Comments
			$this->Comments->EditAttrs["class"] = "form-control";
			$this->Comments->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Comments->AdvancedSearch->SearchValue = HtmlDecode($this->Comments->AdvancedSearch->SearchValue);
			$this->Comments->EditValue = HtmlEncode($this->Comments->AdvancedSearch->SearchValue);
			$this->Comments->PlaceHolder = RemoveHtml($this->Comments->caption());

			// Method
			$this->Method->EditAttrs["class"] = "form-control";
			$this->Method->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Method->AdvancedSearch->SearchValue = HtmlDecode($this->Method->AdvancedSearch->SearchValue);
			$this->Method->EditValue = HtmlEncode($this->Method->AdvancedSearch->SearchValue);
			$this->Method->PlaceHolder = RemoveHtml($this->Method->caption());

			// Specimen
			$this->Specimen->EditAttrs["class"] = "form-control";
			$this->Specimen->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Specimen->AdvancedSearch->SearchValue = HtmlDecode($this->Specimen->AdvancedSearch->SearchValue);
			$this->Specimen->EditValue = HtmlEncode($this->Specimen->AdvancedSearch->SearchValue);
			$this->Specimen->PlaceHolder = RemoveHtml($this->Specimen->caption());

			// Abnormal
			$this->Abnormal->EditAttrs["class"] = "form-control";
			$this->Abnormal->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Abnormal->AdvancedSearch->SearchValue = HtmlDecode($this->Abnormal->AdvancedSearch->SearchValue);
			$this->Abnormal->EditValue = HtmlEncode($this->Abnormal->AdvancedSearch->SearchValue);
			$this->Abnormal->PlaceHolder = RemoveHtml($this->Abnormal->caption());

			// RefValue
			$this->RefValue->EditAttrs["class"] = "form-control";
			$this->RefValue->EditCustomAttributes = "";
			$this->RefValue->EditValue = HtmlEncode($this->RefValue->AdvancedSearch->SearchValue);
			$this->RefValue->PlaceHolder = RemoveHtml($this->RefValue->caption());

			// TestUnit
			$this->TestUnit->EditAttrs["class"] = "form-control";
			$this->TestUnit->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->TestUnit->AdvancedSearch->SearchValue = HtmlDecode($this->TestUnit->AdvancedSearch->SearchValue);
			$this->TestUnit->EditValue = HtmlEncode($this->TestUnit->AdvancedSearch->SearchValue);
			$this->TestUnit->PlaceHolder = RemoveHtml($this->TestUnit->caption());

			// LOWHIGH
			$this->LOWHIGH->EditAttrs["class"] = "form-control";
			$this->LOWHIGH->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->LOWHIGH->AdvancedSearch->SearchValue = HtmlDecode($this->LOWHIGH->AdvancedSearch->SearchValue);
			$this->LOWHIGH->EditValue = HtmlEncode($this->LOWHIGH->AdvancedSearch->SearchValue);
			$this->LOWHIGH->PlaceHolder = RemoveHtml($this->LOWHIGH->caption());

			// Branch
			$this->Branch->EditAttrs["class"] = "form-control";
			$this->Branch->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Branch->AdvancedSearch->SearchValue = HtmlDecode($this->Branch->AdvancedSearch->SearchValue);
			$this->Branch->EditValue = HtmlEncode($this->Branch->AdvancedSearch->SearchValue);
			$this->Branch->PlaceHolder = RemoveHtml($this->Branch->caption());

			// Dispatch
			$this->Dispatch->EditAttrs["class"] = "form-control";
			$this->Dispatch->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Dispatch->AdvancedSearch->SearchValue = HtmlDecode($this->Dispatch->AdvancedSearch->SearchValue);
			$this->Dispatch->EditValue = HtmlEncode($this->Dispatch->AdvancedSearch->SearchValue);
			$this->Dispatch->PlaceHolder = RemoveHtml($this->Dispatch->caption());

			// Pic1
			$this->Pic1->EditAttrs["class"] = "form-control";
			$this->Pic1->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Pic1->AdvancedSearch->SearchValue = HtmlDecode($this->Pic1->AdvancedSearch->SearchValue);
			$this->Pic1->EditValue = HtmlEncode($this->Pic1->AdvancedSearch->SearchValue);
			$this->Pic1->PlaceHolder = RemoveHtml($this->Pic1->caption());

			// Pic2
			$this->Pic2->EditAttrs["class"] = "form-control";
			$this->Pic2->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Pic2->AdvancedSearch->SearchValue = HtmlDecode($this->Pic2->AdvancedSearch->SearchValue);
			$this->Pic2->EditValue = HtmlEncode($this->Pic2->AdvancedSearch->SearchValue);
			$this->Pic2->PlaceHolder = RemoveHtml($this->Pic2->caption());

			// GraphPath
			$this->GraphPath->EditAttrs["class"] = "form-control";
			$this->GraphPath->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->GraphPath->AdvancedSearch->SearchValue = HtmlDecode($this->GraphPath->AdvancedSearch->SearchValue);
			$this->GraphPath->EditValue = HtmlEncode($this->GraphPath->AdvancedSearch->SearchValue);
			$this->GraphPath->PlaceHolder = RemoveHtml($this->GraphPath->caption());

			// MachineCD
			$this->MachineCD->EditAttrs["class"] = "form-control";
			$this->MachineCD->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->MachineCD->AdvancedSearch->SearchValue = HtmlDecode($this->MachineCD->AdvancedSearch->SearchValue);
			$this->MachineCD->EditValue = HtmlEncode($this->MachineCD->AdvancedSearch->SearchValue);
			$this->MachineCD->PlaceHolder = RemoveHtml($this->MachineCD->caption());

			// TestCancel
			$this->TestCancel->EditAttrs["class"] = "form-control";
			$this->TestCancel->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->TestCancel->AdvancedSearch->SearchValue = HtmlDecode($this->TestCancel->AdvancedSearch->SearchValue);
			$this->TestCancel->EditValue = HtmlEncode($this->TestCancel->AdvancedSearch->SearchValue);
			$this->TestCancel->PlaceHolder = RemoveHtml($this->TestCancel->caption());

			// OutSource
			$this->OutSource->EditAttrs["class"] = "form-control";
			$this->OutSource->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->OutSource->AdvancedSearch->SearchValue = HtmlDecode($this->OutSource->AdvancedSearch->SearchValue);
			$this->OutSource->EditValue = HtmlEncode($this->OutSource->AdvancedSearch->SearchValue);
			$this->OutSource->PlaceHolder = RemoveHtml($this->OutSource->caption());

			// Printed
			$this->Printed->EditAttrs["class"] = "form-control";
			$this->Printed->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Printed->AdvancedSearch->SearchValue = HtmlDecode($this->Printed->AdvancedSearch->SearchValue);
			$this->Printed->EditValue = HtmlEncode($this->Printed->AdvancedSearch->SearchValue);
			$this->Printed->PlaceHolder = RemoveHtml($this->Printed->caption());

			// PrintBy
			$this->PrintBy->EditAttrs["class"] = "form-control";
			$this->PrintBy->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->PrintBy->AdvancedSearch->SearchValue = HtmlDecode($this->PrintBy->AdvancedSearch->SearchValue);
			$this->PrintBy->EditValue = HtmlEncode($this->PrintBy->AdvancedSearch->SearchValue);
			$this->PrintBy->PlaceHolder = RemoveHtml($this->PrintBy->caption());

			// PrintDate
			$this->PrintDate->EditAttrs["class"] = "form-control";
			$this->PrintDate->EditCustomAttributes = "";
			$this->PrintDate->EditValue = HtmlEncode(FormatDateTime(UnFormatDateTime($this->PrintDate->AdvancedSearch->SearchValue, 0), 8));
			$this->PrintDate->PlaceHolder = RemoveHtml($this->PrintDate->caption());

			// BillingDate
			$this->BillingDate->EditAttrs["class"] = "form-control";
			$this->BillingDate->EditCustomAttributes = "";
			$this->BillingDate->EditValue = HtmlEncode(FormatDateTime(UnFormatDateTime($this->BillingDate->AdvancedSearch->SearchValue, 0), 8));
			$this->BillingDate->PlaceHolder = RemoveHtml($this->BillingDate->caption());

			// BilledBy
			$this->BilledBy->EditAttrs["class"] = "form-control";
			$this->BilledBy->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->BilledBy->AdvancedSearch->SearchValue = HtmlDecode($this->BilledBy->AdvancedSearch->SearchValue);
			$this->BilledBy->EditValue = HtmlEncode($this->BilledBy->AdvancedSearch->SearchValue);
			$this->BilledBy->PlaceHolder = RemoveHtml($this->BilledBy->caption());

			// Resulted
			$this->Resulted->EditAttrs["class"] = "form-control";
			$this->Resulted->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Resulted->AdvancedSearch->SearchValue = HtmlDecode($this->Resulted->AdvancedSearch->SearchValue);
			$this->Resulted->EditValue = HtmlEncode($this->Resulted->AdvancedSearch->SearchValue);
			$this->Resulted->PlaceHolder = RemoveHtml($this->Resulted->caption());

			// ResultDate
			$this->ResultDate->EditAttrs["class"] = "form-control";
			$this->ResultDate->EditCustomAttributes = "";
			$this->ResultDate->EditValue = HtmlEncode(FormatDateTime(UnFormatDateTime($this->ResultDate->AdvancedSearch->SearchValue, 0), 8));
			$this->ResultDate->PlaceHolder = RemoveHtml($this->ResultDate->caption());

			// ResultedBy
			$this->ResultedBy->EditAttrs["class"] = "form-control";
			$this->ResultedBy->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->ResultedBy->AdvancedSearch->SearchValue = HtmlDecode($this->ResultedBy->AdvancedSearch->SearchValue);
			$this->ResultedBy->EditValue = HtmlEncode($this->ResultedBy->AdvancedSearch->SearchValue);
			$this->ResultedBy->PlaceHolder = RemoveHtml($this->ResultedBy->caption());

			// SampleDate
			$this->SampleDate->EditAttrs["class"] = "form-control";
			$this->SampleDate->EditCustomAttributes = "";
			$this->SampleDate->EditValue = HtmlEncode(FormatDateTime(UnFormatDateTime($this->SampleDate->AdvancedSearch->SearchValue, 0), 8));
			$this->SampleDate->PlaceHolder = RemoveHtml($this->SampleDate->caption());

			// SampleUser
			$this->SampleUser->EditAttrs["class"] = "form-control";
			$this->SampleUser->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->SampleUser->AdvancedSearch->SearchValue = HtmlDecode($this->SampleUser->AdvancedSearch->SearchValue);
			$this->SampleUser->EditValue = HtmlEncode($this->SampleUser->AdvancedSearch->SearchValue);
			$this->SampleUser->PlaceHolder = RemoveHtml($this->SampleUser->caption());

			// Sampled
			$this->Sampled->EditAttrs["class"] = "form-control";
			$this->Sampled->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Sampled->AdvancedSearch->SearchValue = HtmlDecode($this->Sampled->AdvancedSearch->SearchValue);
			$this->Sampled->EditValue = HtmlEncode($this->Sampled->AdvancedSearch->SearchValue);
			$this->Sampled->PlaceHolder = RemoveHtml($this->Sampled->caption());

			// ReceivedDate
			$this->ReceivedDate->EditAttrs["class"] = "form-control";
			$this->ReceivedDate->EditCustomAttributes = "";
			$this->ReceivedDate->EditValue = HtmlEncode(FormatDateTime(UnFormatDateTime($this->ReceivedDate->AdvancedSearch->SearchValue, 0), 8));
			$this->ReceivedDate->PlaceHolder = RemoveHtml($this->ReceivedDate->caption());

			// ReceivedUser
			$this->ReceivedUser->EditAttrs["class"] = "form-control";
			$this->ReceivedUser->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->ReceivedUser->AdvancedSearch->SearchValue = HtmlDecode($this->ReceivedUser->AdvancedSearch->SearchValue);
			$this->ReceivedUser->EditValue = HtmlEncode($this->ReceivedUser->AdvancedSearch->SearchValue);
			$this->ReceivedUser->PlaceHolder = RemoveHtml($this->ReceivedUser->caption());

			// Recevied
			$this->Recevied->EditAttrs["class"] = "form-control";
			$this->Recevied->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Recevied->AdvancedSearch->SearchValue = HtmlDecode($this->Recevied->AdvancedSearch->SearchValue);
			$this->Recevied->EditValue = HtmlEncode($this->Recevied->AdvancedSearch->SearchValue);
			$this->Recevied->PlaceHolder = RemoveHtml($this->Recevied->caption());

			// DeptRecvDate
			$this->DeptRecvDate->EditAttrs["class"] = "form-control";
			$this->DeptRecvDate->EditCustomAttributes = "";
			$this->DeptRecvDate->EditValue = HtmlEncode(FormatDateTime(UnFormatDateTime($this->DeptRecvDate->AdvancedSearch->SearchValue, 0), 8));
			$this->DeptRecvDate->PlaceHolder = RemoveHtml($this->DeptRecvDate->caption());

			// DeptRecvUser
			$this->DeptRecvUser->EditAttrs["class"] = "form-control";
			$this->DeptRecvUser->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->DeptRecvUser->AdvancedSearch->SearchValue = HtmlDecode($this->DeptRecvUser->AdvancedSearch->SearchValue);
			$this->DeptRecvUser->EditValue = HtmlEncode($this->DeptRecvUser->AdvancedSearch->SearchValue);
			$this->DeptRecvUser->PlaceHolder = RemoveHtml($this->DeptRecvUser->caption());

			// DeptRecived
			$this->DeptRecived->EditAttrs["class"] = "form-control";
			$this->DeptRecived->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->DeptRecived->AdvancedSearch->SearchValue = HtmlDecode($this->DeptRecived->AdvancedSearch->SearchValue);
			$this->DeptRecived->EditValue = HtmlEncode($this->DeptRecived->AdvancedSearch->SearchValue);
			$this->DeptRecived->PlaceHolder = RemoveHtml($this->DeptRecived->caption());

			// SAuthDate
			$this->SAuthDate->EditAttrs["class"] = "form-control";
			$this->SAuthDate->EditCustomAttributes = "";
			$this->SAuthDate->EditValue = HtmlEncode(FormatDateTime(UnFormatDateTime($this->SAuthDate->AdvancedSearch->SearchValue, 0), 8));
			$this->SAuthDate->PlaceHolder = RemoveHtml($this->SAuthDate->caption());

			// SAuthBy
			$this->SAuthBy->EditAttrs["class"] = "form-control";
			$this->SAuthBy->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->SAuthBy->AdvancedSearch->SearchValue = HtmlDecode($this->SAuthBy->AdvancedSearch->SearchValue);
			$this->SAuthBy->EditValue = HtmlEncode($this->SAuthBy->AdvancedSearch->SearchValue);
			$this->SAuthBy->PlaceHolder = RemoveHtml($this->SAuthBy->caption());

			// SAuthendicate
			$this->SAuthendicate->EditAttrs["class"] = "form-control";
			$this->SAuthendicate->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->SAuthendicate->AdvancedSearch->SearchValue = HtmlDecode($this->SAuthendicate->AdvancedSearch->SearchValue);
			$this->SAuthendicate->EditValue = HtmlEncode($this->SAuthendicate->AdvancedSearch->SearchValue);
			$this->SAuthendicate->PlaceHolder = RemoveHtml($this->SAuthendicate->caption());

			// AuthDate
			$this->AuthDate->EditAttrs["class"] = "form-control";
			$this->AuthDate->EditCustomAttributes = "";
			$this->AuthDate->EditValue = HtmlEncode(FormatDateTime(UnFormatDateTime($this->AuthDate->AdvancedSearch->SearchValue, 0), 8));
			$this->AuthDate->PlaceHolder = RemoveHtml($this->AuthDate->caption());

			// AuthBy
			$this->AuthBy->EditAttrs["class"] = "form-control";
			$this->AuthBy->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->AuthBy->AdvancedSearch->SearchValue = HtmlDecode($this->AuthBy->AdvancedSearch->SearchValue);
			$this->AuthBy->EditValue = HtmlEncode($this->AuthBy->AdvancedSearch->SearchValue);
			$this->AuthBy->PlaceHolder = RemoveHtml($this->AuthBy->caption());

			// Authencate
			$this->Authencate->EditAttrs["class"] = "form-control";
			$this->Authencate->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Authencate->AdvancedSearch->SearchValue = HtmlDecode($this->Authencate->AdvancedSearch->SearchValue);
			$this->Authencate->EditValue = HtmlEncode($this->Authencate->AdvancedSearch->SearchValue);
			$this->Authencate->PlaceHolder = RemoveHtml($this->Authencate->caption());

			// EditDate
			$this->EditDate->EditAttrs["class"] = "form-control";
			$this->EditDate->EditCustomAttributes = "";
			$this->EditDate->EditValue = HtmlEncode(FormatDateTime(UnFormatDateTime($this->EditDate->AdvancedSearch->SearchValue, 0), 8));
			$this->EditDate->PlaceHolder = RemoveHtml($this->EditDate->caption());

			// EditBy
			$this->EditBy->EditAttrs["class"] = "form-control";
			$this->EditBy->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->EditBy->AdvancedSearch->SearchValue = HtmlDecode($this->EditBy->AdvancedSearch->SearchValue);
			$this->EditBy->EditValue = HtmlEncode($this->EditBy->AdvancedSearch->SearchValue);
			$this->EditBy->PlaceHolder = RemoveHtml($this->EditBy->caption());

			// Editted
			$this->Editted->EditAttrs["class"] = "form-control";
			$this->Editted->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Editted->AdvancedSearch->SearchValue = HtmlDecode($this->Editted->AdvancedSearch->SearchValue);
			$this->Editted->EditValue = HtmlEncode($this->Editted->AdvancedSearch->SearchValue);
			$this->Editted->PlaceHolder = RemoveHtml($this->Editted->caption());

			// PatID
			$this->PatID->EditAttrs["class"] = "form-control";
			$this->PatID->EditCustomAttributes = "";
			$this->PatID->EditValue = HtmlEncode($this->PatID->AdvancedSearch->SearchValue);
			$this->PatID->PlaceHolder = RemoveHtml($this->PatID->caption());

			// PatientId
			$this->PatientId->EditAttrs["class"] = "form-control";
			$this->PatientId->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->PatientId->AdvancedSearch->SearchValue = HtmlDecode($this->PatientId->AdvancedSearch->SearchValue);
			$this->PatientId->EditValue = HtmlEncode($this->PatientId->AdvancedSearch->SearchValue);
			$this->PatientId->PlaceHolder = RemoveHtml($this->PatientId->caption());

			// Mobile
			$this->Mobile->EditAttrs["class"] = "form-control";
			$this->Mobile->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Mobile->AdvancedSearch->SearchValue = HtmlDecode($this->Mobile->AdvancedSearch->SearchValue);
			$this->Mobile->EditValue = HtmlEncode($this->Mobile->AdvancedSearch->SearchValue);
			$this->Mobile->PlaceHolder = RemoveHtml($this->Mobile->caption());

			// CId
			$this->CId->EditAttrs["class"] = "form-control";
			$this->CId->EditCustomAttributes = "";
			$this->CId->EditValue = HtmlEncode($this->CId->AdvancedSearch->SearchValue);
			$this->CId->PlaceHolder = RemoveHtml($this->CId->caption());

			// Order
			$this->Order->EditAttrs["class"] = "form-control";
			$this->Order->EditCustomAttributes = "";
			$this->Order->EditValue = HtmlEncode($this->Order->AdvancedSearch->SearchValue);
			$this->Order->PlaceHolder = RemoveHtml($this->Order->caption());

			// Form
			$this->Form->EditAttrs["class"] = "form-control";
			$this->Form->EditCustomAttributes = "";
			$this->Form->EditValue = HtmlEncode($this->Form->AdvancedSearch->SearchValue);
			$this->Form->PlaceHolder = RemoveHtml($this->Form->caption());

			// ResType
			$this->ResType->EditAttrs["class"] = "form-control";
			$this->ResType->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->ResType->AdvancedSearch->SearchValue = HtmlDecode($this->ResType->AdvancedSearch->SearchValue);
			$this->ResType->EditValue = HtmlEncode($this->ResType->AdvancedSearch->SearchValue);
			$this->ResType->PlaceHolder = RemoveHtml($this->ResType->caption());

			// Sample
			$this->Sample->EditAttrs["class"] = "form-control";
			$this->Sample->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Sample->AdvancedSearch->SearchValue = HtmlDecode($this->Sample->AdvancedSearch->SearchValue);
			$this->Sample->EditValue = HtmlEncode($this->Sample->AdvancedSearch->SearchValue);
			$this->Sample->PlaceHolder = RemoveHtml($this->Sample->caption());

			// NoD
			$this->NoD->EditAttrs["class"] = "form-control";
			$this->NoD->EditCustomAttributes = "";
			$this->NoD->EditValue = HtmlEncode($this->NoD->AdvancedSearch->SearchValue);
			$this->NoD->PlaceHolder = RemoveHtml($this->NoD->caption());

			// BillOrder
			$this->BillOrder->EditAttrs["class"] = "form-control";
			$this->BillOrder->EditCustomAttributes = "";
			$this->BillOrder->EditValue = HtmlEncode($this->BillOrder->AdvancedSearch->SearchValue);
			$this->BillOrder->PlaceHolder = RemoveHtml($this->BillOrder->caption());

			// Formula
			$this->Formula->EditAttrs["class"] = "form-control";
			$this->Formula->EditCustomAttributes = "";
			$this->Formula->EditValue = HtmlEncode($this->Formula->AdvancedSearch->SearchValue);
			$this->Formula->PlaceHolder = RemoveHtml($this->Formula->caption());

			// Inactive
			$this->Inactive->EditAttrs["class"] = "form-control";
			$this->Inactive->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Inactive->AdvancedSearch->SearchValue = HtmlDecode($this->Inactive->AdvancedSearch->SearchValue);
			$this->Inactive->EditValue = HtmlEncode($this->Inactive->AdvancedSearch->SearchValue);
			$this->Inactive->PlaceHolder = RemoveHtml($this->Inactive->caption());

			// CollSample
			$this->CollSample->EditAttrs["class"] = "form-control";
			$this->CollSample->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->CollSample->AdvancedSearch->SearchValue = HtmlDecode($this->CollSample->AdvancedSearch->SearchValue);
			$this->CollSample->EditValue = HtmlEncode($this->CollSample->AdvancedSearch->SearchValue);
			$this->CollSample->PlaceHolder = RemoveHtml($this->CollSample->caption());

			// TestType
			$this->TestType->EditAttrs["class"] = "form-control";
			$this->TestType->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->TestType->AdvancedSearch->SearchValue = HtmlDecode($this->TestType->AdvancedSearch->SearchValue);
			$this->TestType->EditValue = HtmlEncode($this->TestType->AdvancedSearch->SearchValue);
			$this->TestType->PlaceHolder = RemoveHtml($this->TestType->caption());

			// Repeated
			$this->Repeated->EditAttrs["class"] = "form-control";
			$this->Repeated->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Repeated->AdvancedSearch->SearchValue = HtmlDecode($this->Repeated->AdvancedSearch->SearchValue);
			$this->Repeated->EditValue = HtmlEncode($this->Repeated->AdvancedSearch->SearchValue);
			$this->Repeated->PlaceHolder = RemoveHtml($this->Repeated->caption());

			// RepeatedBy
			$this->RepeatedBy->EditAttrs["class"] = "form-control";
			$this->RepeatedBy->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->RepeatedBy->AdvancedSearch->SearchValue = HtmlDecode($this->RepeatedBy->AdvancedSearch->SearchValue);
			$this->RepeatedBy->EditValue = HtmlEncode($this->RepeatedBy->AdvancedSearch->SearchValue);
			$this->RepeatedBy->PlaceHolder = RemoveHtml($this->RepeatedBy->caption());

			// RepeatedDate
			$this->RepeatedDate->EditAttrs["class"] = "form-control";
			$this->RepeatedDate->EditCustomAttributes = "";
			$this->RepeatedDate->EditValue = HtmlEncode(FormatDateTime(UnFormatDateTime($this->RepeatedDate->AdvancedSearch->SearchValue, 0), 8));
			$this->RepeatedDate->PlaceHolder = RemoveHtml($this->RepeatedDate->caption());

			// serviceID
			$this->serviceID->EditAttrs["class"] = "form-control";
			$this->serviceID->EditCustomAttributes = "";
			$this->serviceID->EditValue = HtmlEncode($this->serviceID->AdvancedSearch->SearchValue);
			$this->serviceID->PlaceHolder = RemoveHtml($this->serviceID->caption());

			// Service_Type
			$this->Service_Type->EditAttrs["class"] = "form-control";
			$this->Service_Type->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Service_Type->AdvancedSearch->SearchValue = HtmlDecode($this->Service_Type->AdvancedSearch->SearchValue);
			$this->Service_Type->EditValue = HtmlEncode($this->Service_Type->AdvancedSearch->SearchValue);
			$this->Service_Type->PlaceHolder = RemoveHtml($this->Service_Type->caption());

			// Service_Department
			$this->Service_Department->EditAttrs["class"] = "form-control";
			$this->Service_Department->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Service_Department->AdvancedSearch->SearchValue = HtmlDecode($this->Service_Department->AdvancedSearch->SearchValue);
			$this->Service_Department->EditValue = HtmlEncode($this->Service_Department->AdvancedSearch->SearchValue);
			$this->Service_Department->PlaceHolder = RemoveHtml($this->Service_Department->caption());

			// RequestNo
			$this->RequestNo->EditAttrs["class"] = "form-control";
			$this->RequestNo->EditCustomAttributes = "";
			$this->RequestNo->EditValue = HtmlEncode($this->RequestNo->AdvancedSearch->SearchValue);
			$this->RequestNo->PlaceHolder = RemoveHtml($this->RequestNo->caption());
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
		if (!CheckInteger($this->Reception->AdvancedSearch->SearchValue)) {
			AddMessage($SearchError, $this->Reception->errorMessage());
		}
		if (!CheckNumber($this->amount->AdvancedSearch->SearchValue)) {
			AddMessage($SearchError, $this->amount->errorMessage());
		}
		if (!CheckInteger($this->patient_type->AdvancedSearch->SearchValue)) {
			AddMessage($SearchError, $this->patient_type->errorMessage());
		}
		if (!CheckDate($this->charged_date->AdvancedSearch->SearchValue)) {
			AddMessage($SearchError, $this->charged_date->errorMessage());
		}
		if (!CheckInteger($this->createdby->AdvancedSearch->SearchValue)) {
			AddMessage($SearchError, $this->createdby->errorMessage());
		}
		if (!CheckDate($this->createddatetime->AdvancedSearch->SearchValue)) {
			AddMessage($SearchError, $this->createddatetime->errorMessage());
		}
		if (!CheckInteger($this->modifiedby->AdvancedSearch->SearchValue)) {
			AddMessage($SearchError, $this->modifiedby->errorMessage());
		}
		if (!CheckDate($this->modifieddatetime->AdvancedSearch->SearchValue)) {
			AddMessage($SearchError, $this->modifieddatetime->errorMessage());
		}
		if (!CheckInteger($this->Unit->AdvancedSearch->SearchValue)) {
			AddMessage($SearchError, $this->Unit->errorMessage());
		}
		if (!CheckInteger($this->Quantity->AdvancedSearch->SearchValue)) {
			AddMessage($SearchError, $this->Quantity->errorMessage());
		}
		if (!CheckNumber($this->Discount->AdvancedSearch->SearchValue)) {
			AddMessage($SearchError, $this->Discount->errorMessage());
		}
		if (!CheckNumber($this->SubTotal->AdvancedSearch->SearchValue)) {
			AddMessage($SearchError, $this->SubTotal->errorMessage());
		}
		if (!CheckInteger($this->Aid->AdvancedSearch->SearchValue)) {
			AddMessage($SearchError, $this->Aid->errorMessage());
		}
		if (!CheckInteger($this->Vid->AdvancedSearch->SearchValue)) {
			AddMessage($SearchError, $this->Vid->errorMessage());
		}
		if (!CheckInteger($this->DrID->AdvancedSearch->SearchValue)) {
			AddMessage($SearchError, $this->DrID->errorMessage());
		}
		if (!CheckNumber($this->DrSharePres->AdvancedSearch->SearchValue)) {
			AddMessage($SearchError, $this->DrSharePres->errorMessage());
		}
		if (!CheckNumber($this->HospSharePres->AdvancedSearch->SearchValue)) {
			AddMessage($SearchError, $this->HospSharePres->errorMessage());
		}
		if (!CheckNumber($this->DrShareAmount->AdvancedSearch->SearchValue)) {
			AddMessage($SearchError, $this->DrShareAmount->errorMessage());
		}
		if (!CheckNumber($this->HospShareAmount->AdvancedSearch->SearchValue)) {
			AddMessage($SearchError, $this->HospShareAmount->errorMessage());
		}
		if (!CheckNumber($this->DrShareSettiledAmount->AdvancedSearch->SearchValue)) {
			AddMessage($SearchError, $this->DrShareSettiledAmount->errorMessage());
		}
		if (!CheckInteger($this->DrShareSettledId->AdvancedSearch->SearchValue)) {
			AddMessage($SearchError, $this->DrShareSettledId->errorMessage());
		}
		if (!CheckInteger($this->DrShareSettiledStatus->AdvancedSearch->SearchValue)) {
			AddMessage($SearchError, $this->DrShareSettiledStatus->errorMessage());
		}
		if (!CheckInteger($this->invoiceId->AdvancedSearch->SearchValue)) {
			AddMessage($SearchError, $this->invoiceId->errorMessage());
		}
		if (!CheckNumber($this->invoiceAmount->AdvancedSearch->SearchValue)) {
			AddMessage($SearchError, $this->invoiceAmount->errorMessage());
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
		if (!CheckInteger($this->sid->AdvancedSearch->SearchValue)) {
			AddMessage($SearchError, $this->sid->errorMessage());
		}
		if (!CheckDate($this->PrintDate->AdvancedSearch->SearchValue)) {
			AddMessage($SearchError, $this->PrintDate->errorMessage());
		}
		if (!CheckDate($this->BillingDate->AdvancedSearch->SearchValue)) {
			AddMessage($SearchError, $this->BillingDate->errorMessage());
		}
		if (!CheckDate($this->ResultDate->AdvancedSearch->SearchValue)) {
			AddMessage($SearchError, $this->ResultDate->errorMessage());
		}
		if (!CheckDate($this->SampleDate->AdvancedSearch->SearchValue)) {
			AddMessage($SearchError, $this->SampleDate->errorMessage());
		}
		if (!CheckDate($this->ReceivedDate->AdvancedSearch->SearchValue)) {
			AddMessage($SearchError, $this->ReceivedDate->errorMessage());
		}
		if (!CheckDate($this->DeptRecvDate->AdvancedSearch->SearchValue)) {
			AddMessage($SearchError, $this->DeptRecvDate->errorMessage());
		}
		if (!CheckDate($this->SAuthDate->AdvancedSearch->SearchValue)) {
			AddMessage($SearchError, $this->SAuthDate->errorMessage());
		}
		if (!CheckDate($this->AuthDate->AdvancedSearch->SearchValue)) {
			AddMessage($SearchError, $this->AuthDate->errorMessage());
		}
		if (!CheckDate($this->EditDate->AdvancedSearch->SearchValue)) {
			AddMessage($SearchError, $this->EditDate->errorMessage());
		}
		if (!CheckInteger($this->PatID->AdvancedSearch->SearchValue)) {
			AddMessage($SearchError, $this->PatID->errorMessage());
		}
		if (!CheckInteger($this->CId->AdvancedSearch->SearchValue)) {
			AddMessage($SearchError, $this->CId->errorMessage());
		}
		if (!CheckNumber($this->Order->AdvancedSearch->SearchValue)) {
			AddMessage($SearchError, $this->Order->errorMessage());
		}
		if (!CheckNumber($this->NoD->AdvancedSearch->SearchValue)) {
			AddMessage($SearchError, $this->NoD->errorMessage());
		}
		if (!CheckNumber($this->BillOrder->AdvancedSearch->SearchValue)) {
			AddMessage($SearchError, $this->BillOrder->errorMessage());
		}
		if (!CheckDate($this->RepeatedDate->AdvancedSearch->SearchValue)) {
			AddMessage($SearchError, $this->RepeatedDate->errorMessage());
		}
		if (!CheckInteger($this->serviceID->AdvancedSearch->SearchValue)) {
			AddMessage($SearchError, $this->serviceID->errorMessage());
		}
		if (!CheckInteger($this->RequestNo->AdvancedSearch->SearchValue)) {
			AddMessage($SearchError, $this->RequestNo->errorMessage());
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
		$this->Reception->AdvancedSearch->load();
		$this->Services->AdvancedSearch->load();
		$this->amount->AdvancedSearch->load();
		$this->description->AdvancedSearch->load();
		$this->patient_type->AdvancedSearch->load();
		$this->charged_date->AdvancedSearch->load();
		$this->status->AdvancedSearch->load();
		$this->createdby->AdvancedSearch->load();
		$this->createddatetime->AdvancedSearch->load();
		$this->modifiedby->AdvancedSearch->load();
		$this->modifieddatetime->AdvancedSearch->load();
		$this->mrnno->AdvancedSearch->load();
		$this->PatientName->AdvancedSearch->load();
		$this->Age->AdvancedSearch->load();
		$this->Gender->AdvancedSearch->load();
		$this->profilePic->AdvancedSearch->load();
		$this->Unit->AdvancedSearch->load();
		$this->Quantity->AdvancedSearch->load();
		$this->Discount->AdvancedSearch->load();
		$this->SubTotal->AdvancedSearch->load();
		$this->ServiceSelect->AdvancedSearch->load();
		$this->Aid->AdvancedSearch->load();
		$this->Vid->AdvancedSearch->load();
		$this->DrID->AdvancedSearch->load();
		$this->DrCODE->AdvancedSearch->load();
		$this->DrName->AdvancedSearch->load();
		$this->Department->AdvancedSearch->load();
		$this->DrSharePres->AdvancedSearch->load();
		$this->HospSharePres->AdvancedSearch->load();
		$this->DrShareAmount->AdvancedSearch->load();
		$this->HospShareAmount->AdvancedSearch->load();
		$this->DrShareSettiledAmount->AdvancedSearch->load();
		$this->DrShareSettledId->AdvancedSearch->load();
		$this->DrShareSettiledStatus->AdvancedSearch->load();
		$this->invoiceId->AdvancedSearch->load();
		$this->invoiceAmount->AdvancedSearch->load();
		$this->invoiceStatus->AdvancedSearch->load();
		$this->modeOfPayment->AdvancedSearch->load();
		$this->HospID->AdvancedSearch->load();
		$this->RIDNO->AdvancedSearch->load();
		$this->TidNo->AdvancedSearch->load();
		$this->DiscountCategory->AdvancedSearch->load();
		$this->sid->AdvancedSearch->load();
		$this->ItemCode->AdvancedSearch->load();
		$this->TestSubCd->AdvancedSearch->load();
		$this->DEptCd->AdvancedSearch->load();
		$this->ProfCd->AdvancedSearch->load();
		$this->LabReport->AdvancedSearch->load();
		$this->Comments->AdvancedSearch->load();
		$this->Method->AdvancedSearch->load();
		$this->Specimen->AdvancedSearch->load();
		$this->Abnormal->AdvancedSearch->load();
		$this->RefValue->AdvancedSearch->load();
		$this->TestUnit->AdvancedSearch->load();
		$this->LOWHIGH->AdvancedSearch->load();
		$this->Branch->AdvancedSearch->load();
		$this->Dispatch->AdvancedSearch->load();
		$this->Pic1->AdvancedSearch->load();
		$this->Pic2->AdvancedSearch->load();
		$this->GraphPath->AdvancedSearch->load();
		$this->MachineCD->AdvancedSearch->load();
		$this->TestCancel->AdvancedSearch->load();
		$this->OutSource->AdvancedSearch->load();
		$this->Printed->AdvancedSearch->load();
		$this->PrintBy->AdvancedSearch->load();
		$this->PrintDate->AdvancedSearch->load();
		$this->BillingDate->AdvancedSearch->load();
		$this->BilledBy->AdvancedSearch->load();
		$this->Resulted->AdvancedSearch->load();
		$this->ResultDate->AdvancedSearch->load();
		$this->ResultedBy->AdvancedSearch->load();
		$this->SampleDate->AdvancedSearch->load();
		$this->SampleUser->AdvancedSearch->load();
		$this->Sampled->AdvancedSearch->load();
		$this->ReceivedDate->AdvancedSearch->load();
		$this->ReceivedUser->AdvancedSearch->load();
		$this->Recevied->AdvancedSearch->load();
		$this->DeptRecvDate->AdvancedSearch->load();
		$this->DeptRecvUser->AdvancedSearch->load();
		$this->DeptRecived->AdvancedSearch->load();
		$this->SAuthDate->AdvancedSearch->load();
		$this->SAuthBy->AdvancedSearch->load();
		$this->SAuthendicate->AdvancedSearch->load();
		$this->AuthDate->AdvancedSearch->load();
		$this->AuthBy->AdvancedSearch->load();
		$this->Authencate->AdvancedSearch->load();
		$this->EditDate->AdvancedSearch->load();
		$this->EditBy->AdvancedSearch->load();
		$this->Editted->AdvancedSearch->load();
		$this->PatID->AdvancedSearch->load();
		$this->PatientId->AdvancedSearch->load();
		$this->Mobile->AdvancedSearch->load();
		$this->CId->AdvancedSearch->load();
		$this->Order->AdvancedSearch->load();
		$this->Form->AdvancedSearch->load();
		$this->ResType->AdvancedSearch->load();
		$this->Sample->AdvancedSearch->load();
		$this->NoD->AdvancedSearch->load();
		$this->BillOrder->AdvancedSearch->load();
		$this->Formula->AdvancedSearch->load();
		$this->Inactive->AdvancedSearch->load();
		$this->CollSample->AdvancedSearch->load();
		$this->TestType->AdvancedSearch->load();
		$this->Repeated->AdvancedSearch->load();
		$this->RepeatedBy->AdvancedSearch->load();
		$this->RepeatedDate->AdvancedSearch->load();
		$this->serviceID->AdvancedSearch->load();
		$this->Service_Type->AdvancedSearch->load();
		$this->Service_Department->AdvancedSearch->load();
		$this->RequestNo->AdvancedSearch->load();
	}

	// Set up Breadcrumb
	protected function setupBreadcrumb()
	{
		global $Breadcrumb, $Language;
		$Breadcrumb = new Breadcrumb();
		$url = substr(CurrentUrl(), strrpos(CurrentUrl(), "/")+1);
		$Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("patient_serviceslist.php"), "", $this->TableVar, TRUE);
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
				case "x_Services":
					$lookupFilter = function() {
						return "`Inactive` != 'Y'";
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
						case "x_Services":
							break;
						case "x_status":
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
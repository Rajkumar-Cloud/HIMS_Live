<?php
namespace PHPMaker2019\HIMS;

/**
 * Page class
 */
class patient_services_update extends patient_services
{

	// Page ID
	public $PageID = "update";

	// Project ID
	public $ProjectID = "{EA4F6D13-AF8F-428D-9EA7-BA88D1107EC3}";

	// Table name
	public $TableName = 'patient_services';

	// Page object name
	public $PageObjName = "patient_services_update";

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

		// Page ID
		if (!defined(PROJECT_NAMESPACE . "PAGE_ID"))
			define(PROJECT_NAMESPACE . "PAGE_ID", 'update');

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
	public $FormClassName = "ew-horizontal ew-form ew-update-form";
	public $IsModal = FALSE;
	public $IsMobileOrModal = FALSE;
	public $RecKeys;
	public $Disabled;
	public $UpdateCount = 0;

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
					$this->terminate(GetUrl("patient_serviceslist.php"));
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

		// Check modal
		if ($this->IsModal)
			$SkipHeaderFooter = TRUE;
		$this->IsMobileOrModal = IsMobile() || $this->IsModal;
		$this->FormClassName = "ew-form ew-update-form ew-horizontal";

		// Set up Breadcrumb
		$this->setupBreadcrumb();

		// Try to load keys from list form
		$this->RecKeys = $this->getRecordKeys(); // Load record keys
		if (Post("action") !== NULL && Post("action") !== "") {

			// Get action
			$this->CurrentAction = Post("action");
			$this->loadFormValues(); // Get form values

			// Validate form
			if (!$this->validateForm()) {
				$this->CurrentAction = "show"; // Form error, reset action
				$this->setFailureMessage($FormError);
			}
		} else {
			$this->loadMultiUpdateValues(); // Load initial values to form
		}
		if (count($this->RecKeys) <= 0)
			$this->terminate("patient_serviceslist.php"); // No records selected, return to list
		if ($this->isUpdate()) {
				if ($this->updateRows()) { // Update Records based on key
					if ($this->getSuccessMessage() == "")
						$this->setSuccessMessage($Language->phrase("UpdateSuccess")); // Set up update success message
					$this->terminate($this->getReturnUrl()); // Return to caller
				} else {
					$this->restoreFormValues(); // Restore form values
				}
		}

		// Render row
		$this->RowType = ROWTYPE_EDIT; // Render edit
		$this->resetAttributes();
		$this->renderRow();
	}

	// Load initial values to form if field values are identical in all selected records
	protected function loadMultiUpdateValues()
	{
		$this->CurrentFilter = $this->getFilterFromRecordKeys();

		// Load recordset
		if ($this->Recordset = $this->loadRecordset()) {
			$i = 1;
			while (!$this->Recordset->EOF) {
				if ($i == 1) {
					$this->Reception->setDbValue($this->Recordset->fields('Reception'));
					$this->Services->setDbValue($this->Recordset->fields('Services'));
					$this->amount->setDbValue($this->Recordset->fields('amount'));
					$this->description->setDbValue($this->Recordset->fields('description'));
					$this->patient_type->setDbValue($this->Recordset->fields('patient_type'));
					$this->charged_date->setDbValue($this->Recordset->fields('charged_date'));
					$this->status->setDbValue($this->Recordset->fields('status'));
					$this->createdby->setDbValue($this->Recordset->fields('createdby'));
					$this->createddatetime->setDbValue($this->Recordset->fields('createddatetime'));
					$this->modifiedby->setDbValue($this->Recordset->fields('modifiedby'));
					$this->modifieddatetime->setDbValue($this->Recordset->fields('modifieddatetime'));
					$this->mrnno->setDbValue($this->Recordset->fields('mrnno'));
					$this->PatientName->setDbValue($this->Recordset->fields('PatientName'));
					$this->Age->setDbValue($this->Recordset->fields('Age'));
					$this->Gender->setDbValue($this->Recordset->fields('Gender'));
					$this->profilePic->setDbValue($this->Recordset->fields('profilePic'));
					$this->Unit->setDbValue($this->Recordset->fields('Unit'));
					$this->Quantity->setDbValue($this->Recordset->fields('Quantity'));
					$this->Discount->setDbValue($this->Recordset->fields('Discount'));
					$this->SubTotal->setDbValue($this->Recordset->fields('SubTotal'));
					$this->ServiceSelect->setDbValue($this->Recordset->fields('ServiceSelect'));
					$this->Aid->setDbValue($this->Recordset->fields('Aid'));
					$this->Vid->setDbValue($this->Recordset->fields('Vid'));
					$this->DrID->setDbValue($this->Recordset->fields('DrID'));
					$this->DrCODE->setDbValue($this->Recordset->fields('DrCODE'));
					$this->DrName->setDbValue($this->Recordset->fields('DrName'));
					$this->Department->setDbValue($this->Recordset->fields('Department'));
					$this->DrSharePres->setDbValue($this->Recordset->fields('DrSharePres'));
					$this->HospSharePres->setDbValue($this->Recordset->fields('HospSharePres'));
					$this->DrShareAmount->setDbValue($this->Recordset->fields('DrShareAmount'));
					$this->HospShareAmount->setDbValue($this->Recordset->fields('HospShareAmount'));
					$this->DrShareSettiledAmount->setDbValue($this->Recordset->fields('DrShareSettiledAmount'));
					$this->DrShareSettledId->setDbValue($this->Recordset->fields('DrShareSettledId'));
					$this->DrShareSettiledStatus->setDbValue($this->Recordset->fields('DrShareSettiledStatus'));
					$this->invoiceId->setDbValue($this->Recordset->fields('invoiceId'));
					$this->invoiceAmount->setDbValue($this->Recordset->fields('invoiceAmount'));
					$this->invoiceStatus->setDbValue($this->Recordset->fields('invoiceStatus'));
					$this->modeOfPayment->setDbValue($this->Recordset->fields('modeOfPayment'));
					$this->HospID->setDbValue($this->Recordset->fields('HospID'));
					$this->RIDNO->setDbValue($this->Recordset->fields('RIDNO'));
					$this->TidNo->setDbValue($this->Recordset->fields('TidNo'));
					$this->DiscountCategory->setDbValue($this->Recordset->fields('DiscountCategory'));
					$this->sid->setDbValue($this->Recordset->fields('sid'));
					$this->ItemCode->setDbValue($this->Recordset->fields('ItemCode'));
					$this->TestSubCd->setDbValue($this->Recordset->fields('TestSubCd'));
					$this->DEptCd->setDbValue($this->Recordset->fields('DEptCd'));
					$this->ProfCd->setDbValue($this->Recordset->fields('ProfCd'));
					$this->LabReport->setDbValue($this->Recordset->fields('LabReport'));
					$this->Comments->setDbValue($this->Recordset->fields('Comments'));
					$this->Method->setDbValue($this->Recordset->fields('Method'));
					$this->Specimen->setDbValue($this->Recordset->fields('Specimen'));
					$this->Abnormal->setDbValue($this->Recordset->fields('Abnormal'));
					$this->RefValue->setDbValue($this->Recordset->fields('RefValue'));
					$this->TestUnit->setDbValue($this->Recordset->fields('TestUnit'));
					$this->LOWHIGH->setDbValue($this->Recordset->fields('LOWHIGH'));
					$this->Branch->setDbValue($this->Recordset->fields('Branch'));
					$this->Dispatch->setDbValue($this->Recordset->fields('Dispatch'));
					$this->Pic1->setDbValue($this->Recordset->fields('Pic1'));
					$this->Pic2->setDbValue($this->Recordset->fields('Pic2'));
					$this->GraphPath->setDbValue($this->Recordset->fields('GraphPath'));
					$this->MachineCD->setDbValue($this->Recordset->fields('MachineCD'));
					$this->TestCancel->setDbValue($this->Recordset->fields('TestCancel'));
					$this->OutSource->setDbValue($this->Recordset->fields('OutSource'));
					$this->Printed->setDbValue($this->Recordset->fields('Printed'));
					$this->PrintBy->setDbValue($this->Recordset->fields('PrintBy'));
					$this->PrintDate->setDbValue($this->Recordset->fields('PrintDate'));
					$this->BillingDate->setDbValue($this->Recordset->fields('BillingDate'));
					$this->BilledBy->setDbValue($this->Recordset->fields('BilledBy'));
					$this->Resulted->setDbValue($this->Recordset->fields('Resulted'));
					$this->ResultDate->setDbValue($this->Recordset->fields('ResultDate'));
					$this->ResultedBy->setDbValue($this->Recordset->fields('ResultedBy'));
					$this->SampleDate->setDbValue($this->Recordset->fields('SampleDate'));
					$this->SampleUser->setDbValue($this->Recordset->fields('SampleUser'));
					$this->Sampled->setDbValue($this->Recordset->fields('Sampled'));
					$this->ReceivedDate->setDbValue($this->Recordset->fields('ReceivedDate'));
					$this->ReceivedUser->setDbValue($this->Recordset->fields('ReceivedUser'));
					$this->Recevied->setDbValue($this->Recordset->fields('Recevied'));
					$this->DeptRecvDate->setDbValue($this->Recordset->fields('DeptRecvDate'));
					$this->DeptRecvUser->setDbValue($this->Recordset->fields('DeptRecvUser'));
					$this->DeptRecived->setDbValue($this->Recordset->fields('DeptRecived'));
					$this->SAuthDate->setDbValue($this->Recordset->fields('SAuthDate'));
					$this->SAuthBy->setDbValue($this->Recordset->fields('SAuthBy'));
					$this->SAuthendicate->setDbValue($this->Recordset->fields('SAuthendicate'));
					$this->AuthDate->setDbValue($this->Recordset->fields('AuthDate'));
					$this->AuthBy->setDbValue($this->Recordset->fields('AuthBy'));
					$this->Authencate->setDbValue($this->Recordset->fields('Authencate'));
					$this->EditDate->setDbValue($this->Recordset->fields('EditDate'));
					$this->EditBy->setDbValue($this->Recordset->fields('EditBy'));
					$this->Editted->setDbValue($this->Recordset->fields('Editted'));
					$this->PatID->setDbValue($this->Recordset->fields('PatID'));
					$this->PatientId->setDbValue($this->Recordset->fields('PatientId'));
					$this->Mobile->setDbValue($this->Recordset->fields('Mobile'));
					$this->CId->setDbValue($this->Recordset->fields('CId'));
					$this->Order->setDbValue($this->Recordset->fields('Order'));
					$this->Form->setDbValue($this->Recordset->fields('Form'));
					$this->ResType->setDbValue($this->Recordset->fields('ResType'));
					$this->Sample->setDbValue($this->Recordset->fields('Sample'));
					$this->NoD->setDbValue($this->Recordset->fields('NoD'));
					$this->BillOrder->setDbValue($this->Recordset->fields('BillOrder'));
					$this->Formula->setDbValue($this->Recordset->fields('Formula'));
					$this->Inactive->setDbValue($this->Recordset->fields('Inactive'));
					$this->CollSample->setDbValue($this->Recordset->fields('CollSample'));
					$this->TestType->setDbValue($this->Recordset->fields('TestType'));
					$this->Repeated->setDbValue($this->Recordset->fields('Repeated'));
					$this->RepeatedBy->setDbValue($this->Recordset->fields('RepeatedBy'));
					$this->RepeatedDate->setDbValue($this->Recordset->fields('RepeatedDate'));
					$this->serviceID->setDbValue($this->Recordset->fields('serviceID'));
					$this->Service_Type->setDbValue($this->Recordset->fields('Service_Type'));
					$this->Service_Department->setDbValue($this->Recordset->fields('Service_Department'));
					$this->RequestNo->setDbValue($this->Recordset->fields('RequestNo'));
				} else {
					if (!CompareValue($this->Reception->DbValue, $this->Recordset->fields('Reception')))
						$this->Reception->CurrentValue = NULL;
					if (!CompareValue($this->Services->DbValue, $this->Recordset->fields('Services')))
						$this->Services->CurrentValue = NULL;
					if (!CompareValue($this->amount->DbValue, $this->Recordset->fields('amount')))
						$this->amount->CurrentValue = NULL;
					if (!CompareValue($this->description->DbValue, $this->Recordset->fields('description')))
						$this->description->CurrentValue = NULL;
					if (!CompareValue($this->patient_type->DbValue, $this->Recordset->fields('patient_type')))
						$this->patient_type->CurrentValue = NULL;
					if (!CompareValue($this->charged_date->DbValue, $this->Recordset->fields('charged_date')))
						$this->charged_date->CurrentValue = NULL;
					if (!CompareValue($this->status->DbValue, $this->Recordset->fields('status')))
						$this->status->CurrentValue = NULL;
					if (!CompareValue($this->createdby->DbValue, $this->Recordset->fields('createdby')))
						$this->createdby->CurrentValue = NULL;
					if (!CompareValue($this->createddatetime->DbValue, $this->Recordset->fields('createddatetime')))
						$this->createddatetime->CurrentValue = NULL;
					if (!CompareValue($this->modifiedby->DbValue, $this->Recordset->fields('modifiedby')))
						$this->modifiedby->CurrentValue = NULL;
					if (!CompareValue($this->modifieddatetime->DbValue, $this->Recordset->fields('modifieddatetime')))
						$this->modifieddatetime->CurrentValue = NULL;
					if (!CompareValue($this->mrnno->DbValue, $this->Recordset->fields('mrnno')))
						$this->mrnno->CurrentValue = NULL;
					if (!CompareValue($this->PatientName->DbValue, $this->Recordset->fields('PatientName')))
						$this->PatientName->CurrentValue = NULL;
					if (!CompareValue($this->Age->DbValue, $this->Recordset->fields('Age')))
						$this->Age->CurrentValue = NULL;
					if (!CompareValue($this->Gender->DbValue, $this->Recordset->fields('Gender')))
						$this->Gender->CurrentValue = NULL;
					if (!CompareValue($this->profilePic->DbValue, $this->Recordset->fields('profilePic')))
						$this->profilePic->CurrentValue = NULL;
					if (!CompareValue($this->Unit->DbValue, $this->Recordset->fields('Unit')))
						$this->Unit->CurrentValue = NULL;
					if (!CompareValue($this->Quantity->DbValue, $this->Recordset->fields('Quantity')))
						$this->Quantity->CurrentValue = NULL;
					if (!CompareValue($this->Discount->DbValue, $this->Recordset->fields('Discount')))
						$this->Discount->CurrentValue = NULL;
					if (!CompareValue($this->SubTotal->DbValue, $this->Recordset->fields('SubTotal')))
						$this->SubTotal->CurrentValue = NULL;
					if (!CompareValue($this->ServiceSelect->DbValue, $this->Recordset->fields('ServiceSelect')))
						$this->ServiceSelect->CurrentValue = NULL;
					if (!CompareValue($this->Aid->DbValue, $this->Recordset->fields('Aid')))
						$this->Aid->CurrentValue = NULL;
					if (!CompareValue($this->Vid->DbValue, $this->Recordset->fields('Vid')))
						$this->Vid->CurrentValue = NULL;
					if (!CompareValue($this->DrID->DbValue, $this->Recordset->fields('DrID')))
						$this->DrID->CurrentValue = NULL;
					if (!CompareValue($this->DrCODE->DbValue, $this->Recordset->fields('DrCODE')))
						$this->DrCODE->CurrentValue = NULL;
					if (!CompareValue($this->DrName->DbValue, $this->Recordset->fields('DrName')))
						$this->DrName->CurrentValue = NULL;
					if (!CompareValue($this->Department->DbValue, $this->Recordset->fields('Department')))
						$this->Department->CurrentValue = NULL;
					if (!CompareValue($this->DrSharePres->DbValue, $this->Recordset->fields('DrSharePres')))
						$this->DrSharePres->CurrentValue = NULL;
					if (!CompareValue($this->HospSharePres->DbValue, $this->Recordset->fields('HospSharePres')))
						$this->HospSharePres->CurrentValue = NULL;
					if (!CompareValue($this->DrShareAmount->DbValue, $this->Recordset->fields('DrShareAmount')))
						$this->DrShareAmount->CurrentValue = NULL;
					if (!CompareValue($this->HospShareAmount->DbValue, $this->Recordset->fields('HospShareAmount')))
						$this->HospShareAmount->CurrentValue = NULL;
					if (!CompareValue($this->DrShareSettiledAmount->DbValue, $this->Recordset->fields('DrShareSettiledAmount')))
						$this->DrShareSettiledAmount->CurrentValue = NULL;
					if (!CompareValue($this->DrShareSettledId->DbValue, $this->Recordset->fields('DrShareSettledId')))
						$this->DrShareSettledId->CurrentValue = NULL;
					if (!CompareValue($this->DrShareSettiledStatus->DbValue, $this->Recordset->fields('DrShareSettiledStatus')))
						$this->DrShareSettiledStatus->CurrentValue = NULL;
					if (!CompareValue($this->invoiceId->DbValue, $this->Recordset->fields('invoiceId')))
						$this->invoiceId->CurrentValue = NULL;
					if (!CompareValue($this->invoiceAmount->DbValue, $this->Recordset->fields('invoiceAmount')))
						$this->invoiceAmount->CurrentValue = NULL;
					if (!CompareValue($this->invoiceStatus->DbValue, $this->Recordset->fields('invoiceStatus')))
						$this->invoiceStatus->CurrentValue = NULL;
					if (!CompareValue($this->modeOfPayment->DbValue, $this->Recordset->fields('modeOfPayment')))
						$this->modeOfPayment->CurrentValue = NULL;
					if (!CompareValue($this->HospID->DbValue, $this->Recordset->fields('HospID')))
						$this->HospID->CurrentValue = NULL;
					if (!CompareValue($this->RIDNO->DbValue, $this->Recordset->fields('RIDNO')))
						$this->RIDNO->CurrentValue = NULL;
					if (!CompareValue($this->TidNo->DbValue, $this->Recordset->fields('TidNo')))
						$this->TidNo->CurrentValue = NULL;
					if (!CompareValue($this->DiscountCategory->DbValue, $this->Recordset->fields('DiscountCategory')))
						$this->DiscountCategory->CurrentValue = NULL;
					if (!CompareValue($this->sid->DbValue, $this->Recordset->fields('sid')))
						$this->sid->CurrentValue = NULL;
					if (!CompareValue($this->ItemCode->DbValue, $this->Recordset->fields('ItemCode')))
						$this->ItemCode->CurrentValue = NULL;
					if (!CompareValue($this->TestSubCd->DbValue, $this->Recordset->fields('TestSubCd')))
						$this->TestSubCd->CurrentValue = NULL;
					if (!CompareValue($this->DEptCd->DbValue, $this->Recordset->fields('DEptCd')))
						$this->DEptCd->CurrentValue = NULL;
					if (!CompareValue($this->ProfCd->DbValue, $this->Recordset->fields('ProfCd')))
						$this->ProfCd->CurrentValue = NULL;
					if (!CompareValue($this->LabReport->DbValue, $this->Recordset->fields('LabReport')))
						$this->LabReport->CurrentValue = NULL;
					if (!CompareValue($this->Comments->DbValue, $this->Recordset->fields('Comments')))
						$this->Comments->CurrentValue = NULL;
					if (!CompareValue($this->Method->DbValue, $this->Recordset->fields('Method')))
						$this->Method->CurrentValue = NULL;
					if (!CompareValue($this->Specimen->DbValue, $this->Recordset->fields('Specimen')))
						$this->Specimen->CurrentValue = NULL;
					if (!CompareValue($this->Abnormal->DbValue, $this->Recordset->fields('Abnormal')))
						$this->Abnormal->CurrentValue = NULL;
					if (!CompareValue($this->RefValue->DbValue, $this->Recordset->fields('RefValue')))
						$this->RefValue->CurrentValue = NULL;
					if (!CompareValue($this->TestUnit->DbValue, $this->Recordset->fields('TestUnit')))
						$this->TestUnit->CurrentValue = NULL;
					if (!CompareValue($this->LOWHIGH->DbValue, $this->Recordset->fields('LOWHIGH')))
						$this->LOWHIGH->CurrentValue = NULL;
					if (!CompareValue($this->Branch->DbValue, $this->Recordset->fields('Branch')))
						$this->Branch->CurrentValue = NULL;
					if (!CompareValue($this->Dispatch->DbValue, $this->Recordset->fields('Dispatch')))
						$this->Dispatch->CurrentValue = NULL;
					if (!CompareValue($this->Pic1->DbValue, $this->Recordset->fields('Pic1')))
						$this->Pic1->CurrentValue = NULL;
					if (!CompareValue($this->Pic2->DbValue, $this->Recordset->fields('Pic2')))
						$this->Pic2->CurrentValue = NULL;
					if (!CompareValue($this->GraphPath->DbValue, $this->Recordset->fields('GraphPath')))
						$this->GraphPath->CurrentValue = NULL;
					if (!CompareValue($this->MachineCD->DbValue, $this->Recordset->fields('MachineCD')))
						$this->MachineCD->CurrentValue = NULL;
					if (!CompareValue($this->TestCancel->DbValue, $this->Recordset->fields('TestCancel')))
						$this->TestCancel->CurrentValue = NULL;
					if (!CompareValue($this->OutSource->DbValue, $this->Recordset->fields('OutSource')))
						$this->OutSource->CurrentValue = NULL;
					if (!CompareValue($this->Printed->DbValue, $this->Recordset->fields('Printed')))
						$this->Printed->CurrentValue = NULL;
					if (!CompareValue($this->PrintBy->DbValue, $this->Recordset->fields('PrintBy')))
						$this->PrintBy->CurrentValue = NULL;
					if (!CompareValue($this->PrintDate->DbValue, $this->Recordset->fields('PrintDate')))
						$this->PrintDate->CurrentValue = NULL;
					if (!CompareValue($this->BillingDate->DbValue, $this->Recordset->fields('BillingDate')))
						$this->BillingDate->CurrentValue = NULL;
					if (!CompareValue($this->BilledBy->DbValue, $this->Recordset->fields('BilledBy')))
						$this->BilledBy->CurrentValue = NULL;
					if (!CompareValue($this->Resulted->DbValue, $this->Recordset->fields('Resulted')))
						$this->Resulted->CurrentValue = NULL;
					if (!CompareValue($this->ResultDate->DbValue, $this->Recordset->fields('ResultDate')))
						$this->ResultDate->CurrentValue = NULL;
					if (!CompareValue($this->ResultedBy->DbValue, $this->Recordset->fields('ResultedBy')))
						$this->ResultedBy->CurrentValue = NULL;
					if (!CompareValue($this->SampleDate->DbValue, $this->Recordset->fields('SampleDate')))
						$this->SampleDate->CurrentValue = NULL;
					if (!CompareValue($this->SampleUser->DbValue, $this->Recordset->fields('SampleUser')))
						$this->SampleUser->CurrentValue = NULL;
					if (!CompareValue($this->Sampled->DbValue, $this->Recordset->fields('Sampled')))
						$this->Sampled->CurrentValue = NULL;
					if (!CompareValue($this->ReceivedDate->DbValue, $this->Recordset->fields('ReceivedDate')))
						$this->ReceivedDate->CurrentValue = NULL;
					if (!CompareValue($this->ReceivedUser->DbValue, $this->Recordset->fields('ReceivedUser')))
						$this->ReceivedUser->CurrentValue = NULL;
					if (!CompareValue($this->Recevied->DbValue, $this->Recordset->fields('Recevied')))
						$this->Recevied->CurrentValue = NULL;
					if (!CompareValue($this->DeptRecvDate->DbValue, $this->Recordset->fields('DeptRecvDate')))
						$this->DeptRecvDate->CurrentValue = NULL;
					if (!CompareValue($this->DeptRecvUser->DbValue, $this->Recordset->fields('DeptRecvUser')))
						$this->DeptRecvUser->CurrentValue = NULL;
					if (!CompareValue($this->DeptRecived->DbValue, $this->Recordset->fields('DeptRecived')))
						$this->DeptRecived->CurrentValue = NULL;
					if (!CompareValue($this->SAuthDate->DbValue, $this->Recordset->fields('SAuthDate')))
						$this->SAuthDate->CurrentValue = NULL;
					if (!CompareValue($this->SAuthBy->DbValue, $this->Recordset->fields('SAuthBy')))
						$this->SAuthBy->CurrentValue = NULL;
					if (!CompareValue($this->SAuthendicate->DbValue, $this->Recordset->fields('SAuthendicate')))
						$this->SAuthendicate->CurrentValue = NULL;
					if (!CompareValue($this->AuthDate->DbValue, $this->Recordset->fields('AuthDate')))
						$this->AuthDate->CurrentValue = NULL;
					if (!CompareValue($this->AuthBy->DbValue, $this->Recordset->fields('AuthBy')))
						$this->AuthBy->CurrentValue = NULL;
					if (!CompareValue($this->Authencate->DbValue, $this->Recordset->fields('Authencate')))
						$this->Authencate->CurrentValue = NULL;
					if (!CompareValue($this->EditDate->DbValue, $this->Recordset->fields('EditDate')))
						$this->EditDate->CurrentValue = NULL;
					if (!CompareValue($this->EditBy->DbValue, $this->Recordset->fields('EditBy')))
						$this->EditBy->CurrentValue = NULL;
					if (!CompareValue($this->Editted->DbValue, $this->Recordset->fields('Editted')))
						$this->Editted->CurrentValue = NULL;
					if (!CompareValue($this->PatID->DbValue, $this->Recordset->fields('PatID')))
						$this->PatID->CurrentValue = NULL;
					if (!CompareValue($this->PatientId->DbValue, $this->Recordset->fields('PatientId')))
						$this->PatientId->CurrentValue = NULL;
					if (!CompareValue($this->Mobile->DbValue, $this->Recordset->fields('Mobile')))
						$this->Mobile->CurrentValue = NULL;
					if (!CompareValue($this->CId->DbValue, $this->Recordset->fields('CId')))
						$this->CId->CurrentValue = NULL;
					if (!CompareValue($this->Order->DbValue, $this->Recordset->fields('Order')))
						$this->Order->CurrentValue = NULL;
					if (!CompareValue($this->Form->DbValue, $this->Recordset->fields('Form')))
						$this->Form->CurrentValue = NULL;
					if (!CompareValue($this->ResType->DbValue, $this->Recordset->fields('ResType')))
						$this->ResType->CurrentValue = NULL;
					if (!CompareValue($this->Sample->DbValue, $this->Recordset->fields('Sample')))
						$this->Sample->CurrentValue = NULL;
					if (!CompareValue($this->NoD->DbValue, $this->Recordset->fields('NoD')))
						$this->NoD->CurrentValue = NULL;
					if (!CompareValue($this->BillOrder->DbValue, $this->Recordset->fields('BillOrder')))
						$this->BillOrder->CurrentValue = NULL;
					if (!CompareValue($this->Formula->DbValue, $this->Recordset->fields('Formula')))
						$this->Formula->CurrentValue = NULL;
					if (!CompareValue($this->Inactive->DbValue, $this->Recordset->fields('Inactive')))
						$this->Inactive->CurrentValue = NULL;
					if (!CompareValue($this->CollSample->DbValue, $this->Recordset->fields('CollSample')))
						$this->CollSample->CurrentValue = NULL;
					if (!CompareValue($this->TestType->DbValue, $this->Recordset->fields('TestType')))
						$this->TestType->CurrentValue = NULL;
					if (!CompareValue($this->Repeated->DbValue, $this->Recordset->fields('Repeated')))
						$this->Repeated->CurrentValue = NULL;
					if (!CompareValue($this->RepeatedBy->DbValue, $this->Recordset->fields('RepeatedBy')))
						$this->RepeatedBy->CurrentValue = NULL;
					if (!CompareValue($this->RepeatedDate->DbValue, $this->Recordset->fields('RepeatedDate')))
						$this->RepeatedDate->CurrentValue = NULL;
					if (!CompareValue($this->serviceID->DbValue, $this->Recordset->fields('serviceID')))
						$this->serviceID->CurrentValue = NULL;
					if (!CompareValue($this->Service_Type->DbValue, $this->Recordset->fields('Service_Type')))
						$this->Service_Type->CurrentValue = NULL;
					if (!CompareValue($this->Service_Department->DbValue, $this->Recordset->fields('Service_Department')))
						$this->Service_Department->CurrentValue = NULL;
					if (!CompareValue($this->RequestNo->DbValue, $this->Recordset->fields('RequestNo')))
						$this->RequestNo->CurrentValue = NULL;
				}
				$i++;
				$this->Recordset->moveNext();
			}
			$this->Recordset->close();
		}
	}

	// Set up key value
	protected function setupKeyValues($key)
	{
		$keyFld = $key;
		if (!is_numeric($keyFld))
			return FALSE;
		$this->id->CurrentValue = $keyFld;
		return TRUE;
	}

	// Update all selected rows
	protected function updateRows()
	{
		global $Language;
		$conn = &$this->getConnection();
		$conn->beginTrans();

		// Get old recordset
		$this->CurrentFilter = $this->getFilterFromRecordKeys();
		$sql = $this->getCurrentSql();
		$rsold = $conn->execute($sql);

		// Update all rows
		$key = "";
		foreach ($this->RecKeys as $reckey) {
			if ($this->setupKeyValues($reckey)) {
				$thisKey = $reckey;
				$this->SendEmail = FALSE; // Do not send email on update success
				$this->UpdateCount += 1; // Update record count for records being updated
				$updateRows = $this->editRow(); // Update this row
			} else {
				$updateRows = FALSE;
			}
			if (!$updateRows)
				break; // Update failed
			if ($key <> "")
				$key .= ", ";
			$key .= $thisKey;
		}

		// Check if all rows updated
		if ($updateRows) {
			$conn->commitTrans(); // Commit transaction

			// Get new recordset
			$rsnew = $conn->execute($sql);
		} else {
			$conn->rollbackTrans(); // Rollback transaction
		}
		return $updateRows;
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

		// Check field name 'Reception' first before field var 'x_Reception'
		$val = $CurrentForm->hasValue("Reception") ? $CurrentForm->getValue("Reception") : $CurrentForm->getValue("x_Reception");
		if (!$this->Reception->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Reception->Visible = FALSE; // Disable update for API request
			else
				$this->Reception->setFormValue($val);
		}
		$this->Reception->MultiUpdate = $CurrentForm->getValue("u_Reception");

		// Check field name 'Services' first before field var 'x_Services'
		$val = $CurrentForm->hasValue("Services") ? $CurrentForm->getValue("Services") : $CurrentForm->getValue("x_Services");
		if (!$this->Services->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Services->Visible = FALSE; // Disable update for API request
			else
				$this->Services->setFormValue($val);
		}
		$this->Services->MultiUpdate = $CurrentForm->getValue("u_Services");

		// Check field name 'amount' first before field var 'x_amount'
		$val = $CurrentForm->hasValue("amount") ? $CurrentForm->getValue("amount") : $CurrentForm->getValue("x_amount");
		if (!$this->amount->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->amount->Visible = FALSE; // Disable update for API request
			else
				$this->amount->setFormValue($val);
		}
		$this->amount->MultiUpdate = $CurrentForm->getValue("u_amount");

		// Check field name 'description' first before field var 'x_description'
		$val = $CurrentForm->hasValue("description") ? $CurrentForm->getValue("description") : $CurrentForm->getValue("x_description");
		if (!$this->description->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->description->Visible = FALSE; // Disable update for API request
			else
				$this->description->setFormValue($val);
		}
		$this->description->MultiUpdate = $CurrentForm->getValue("u_description");

		// Check field name 'patient_type' first before field var 'x_patient_type'
		$val = $CurrentForm->hasValue("patient_type") ? $CurrentForm->getValue("patient_type") : $CurrentForm->getValue("x_patient_type");
		if (!$this->patient_type->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->patient_type->Visible = FALSE; // Disable update for API request
			else
				$this->patient_type->setFormValue($val);
		}
		$this->patient_type->MultiUpdate = $CurrentForm->getValue("u_patient_type");

		// Check field name 'charged_date' first before field var 'x_charged_date'
		$val = $CurrentForm->hasValue("charged_date") ? $CurrentForm->getValue("charged_date") : $CurrentForm->getValue("x_charged_date");
		if (!$this->charged_date->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->charged_date->Visible = FALSE; // Disable update for API request
			else
				$this->charged_date->setFormValue($val);
			$this->charged_date->CurrentValue = UnFormatDateTime($this->charged_date->CurrentValue, 0);
		}
		$this->charged_date->MultiUpdate = $CurrentForm->getValue("u_charged_date");

		// Check field name 'status' first before field var 'x_status'
		$val = $CurrentForm->hasValue("status") ? $CurrentForm->getValue("status") : $CurrentForm->getValue("x_status");
		if (!$this->status->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->status->Visible = FALSE; // Disable update for API request
			else
				$this->status->setFormValue($val);
		}
		$this->status->MultiUpdate = $CurrentForm->getValue("u_status");

		// Check field name 'createdby' first before field var 'x_createdby'
		$val = $CurrentForm->hasValue("createdby") ? $CurrentForm->getValue("createdby") : $CurrentForm->getValue("x_createdby");
		if (!$this->createdby->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->createdby->Visible = FALSE; // Disable update for API request
			else
				$this->createdby->setFormValue($val);
		}
		$this->createdby->MultiUpdate = $CurrentForm->getValue("u_createdby");

		// Check field name 'createddatetime' first before field var 'x_createddatetime'
		$val = $CurrentForm->hasValue("createddatetime") ? $CurrentForm->getValue("createddatetime") : $CurrentForm->getValue("x_createddatetime");
		if (!$this->createddatetime->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->createddatetime->Visible = FALSE; // Disable update for API request
			else
				$this->createddatetime->setFormValue($val);
			$this->createddatetime->CurrentValue = UnFormatDateTime($this->createddatetime->CurrentValue, 0);
		}
		$this->createddatetime->MultiUpdate = $CurrentForm->getValue("u_createddatetime");

		// Check field name 'modifiedby' first before field var 'x_modifiedby'
		$val = $CurrentForm->hasValue("modifiedby") ? $CurrentForm->getValue("modifiedby") : $CurrentForm->getValue("x_modifiedby");
		if (!$this->modifiedby->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->modifiedby->Visible = FALSE; // Disable update for API request
			else
				$this->modifiedby->setFormValue($val);
		}
		$this->modifiedby->MultiUpdate = $CurrentForm->getValue("u_modifiedby");

		// Check field name 'modifieddatetime' first before field var 'x_modifieddatetime'
		$val = $CurrentForm->hasValue("modifieddatetime") ? $CurrentForm->getValue("modifieddatetime") : $CurrentForm->getValue("x_modifieddatetime");
		if (!$this->modifieddatetime->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->modifieddatetime->Visible = FALSE; // Disable update for API request
			else
				$this->modifieddatetime->setFormValue($val);
			$this->modifieddatetime->CurrentValue = UnFormatDateTime($this->modifieddatetime->CurrentValue, 0);
		}
		$this->modifieddatetime->MultiUpdate = $CurrentForm->getValue("u_modifieddatetime");

		// Check field name 'mrnno' first before field var 'x_mrnno'
		$val = $CurrentForm->hasValue("mrnno") ? $CurrentForm->getValue("mrnno") : $CurrentForm->getValue("x_mrnno");
		if (!$this->mrnno->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->mrnno->Visible = FALSE; // Disable update for API request
			else
				$this->mrnno->setFormValue($val);
		}
		$this->mrnno->MultiUpdate = $CurrentForm->getValue("u_mrnno");

		// Check field name 'PatientName' first before field var 'x_PatientName'
		$val = $CurrentForm->hasValue("PatientName") ? $CurrentForm->getValue("PatientName") : $CurrentForm->getValue("x_PatientName");
		if (!$this->PatientName->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->PatientName->Visible = FALSE; // Disable update for API request
			else
				$this->PatientName->setFormValue($val);
		}
		$this->PatientName->MultiUpdate = $CurrentForm->getValue("u_PatientName");

		// Check field name 'Age' first before field var 'x_Age'
		$val = $CurrentForm->hasValue("Age") ? $CurrentForm->getValue("Age") : $CurrentForm->getValue("x_Age");
		if (!$this->Age->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Age->Visible = FALSE; // Disable update for API request
			else
				$this->Age->setFormValue($val);
		}
		$this->Age->MultiUpdate = $CurrentForm->getValue("u_Age");

		// Check field name 'Gender' first before field var 'x_Gender'
		$val = $CurrentForm->hasValue("Gender") ? $CurrentForm->getValue("Gender") : $CurrentForm->getValue("x_Gender");
		if (!$this->Gender->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Gender->Visible = FALSE; // Disable update for API request
			else
				$this->Gender->setFormValue($val);
		}
		$this->Gender->MultiUpdate = $CurrentForm->getValue("u_Gender");

		// Check field name 'profilePic' first before field var 'x_profilePic'
		$val = $CurrentForm->hasValue("profilePic") ? $CurrentForm->getValue("profilePic") : $CurrentForm->getValue("x_profilePic");
		if (!$this->profilePic->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->profilePic->Visible = FALSE; // Disable update for API request
			else
				$this->profilePic->setFormValue($val);
		}
		$this->profilePic->MultiUpdate = $CurrentForm->getValue("u_profilePic");

		// Check field name 'Unit' first before field var 'x_Unit'
		$val = $CurrentForm->hasValue("Unit") ? $CurrentForm->getValue("Unit") : $CurrentForm->getValue("x_Unit");
		if (!$this->Unit->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Unit->Visible = FALSE; // Disable update for API request
			else
				$this->Unit->setFormValue($val);
		}
		$this->Unit->MultiUpdate = $CurrentForm->getValue("u_Unit");

		// Check field name 'Quantity' first before field var 'x_Quantity'
		$val = $CurrentForm->hasValue("Quantity") ? $CurrentForm->getValue("Quantity") : $CurrentForm->getValue("x_Quantity");
		if (!$this->Quantity->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Quantity->Visible = FALSE; // Disable update for API request
			else
				$this->Quantity->setFormValue($val);
		}
		$this->Quantity->MultiUpdate = $CurrentForm->getValue("u_Quantity");

		// Check field name 'Discount' first before field var 'x_Discount'
		$val = $CurrentForm->hasValue("Discount") ? $CurrentForm->getValue("Discount") : $CurrentForm->getValue("x_Discount");
		if (!$this->Discount->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Discount->Visible = FALSE; // Disable update for API request
			else
				$this->Discount->setFormValue($val);
		}
		$this->Discount->MultiUpdate = $CurrentForm->getValue("u_Discount");

		// Check field name 'SubTotal' first before field var 'x_SubTotal'
		$val = $CurrentForm->hasValue("SubTotal") ? $CurrentForm->getValue("SubTotal") : $CurrentForm->getValue("x_SubTotal");
		if (!$this->SubTotal->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->SubTotal->Visible = FALSE; // Disable update for API request
			else
				$this->SubTotal->setFormValue($val);
		}
		$this->SubTotal->MultiUpdate = $CurrentForm->getValue("u_SubTotal");

		// Check field name 'ServiceSelect' first before field var 'x_ServiceSelect'
		$val = $CurrentForm->hasValue("ServiceSelect") ? $CurrentForm->getValue("ServiceSelect") : $CurrentForm->getValue("x_ServiceSelect");
		if (!$this->ServiceSelect->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->ServiceSelect->Visible = FALSE; // Disable update for API request
			else
				$this->ServiceSelect->setFormValue($val);
		}
		$this->ServiceSelect->MultiUpdate = $CurrentForm->getValue("u_ServiceSelect");

		// Check field name 'Aid' first before field var 'x_Aid'
		$val = $CurrentForm->hasValue("Aid") ? $CurrentForm->getValue("Aid") : $CurrentForm->getValue("x_Aid");
		if (!$this->Aid->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Aid->Visible = FALSE; // Disable update for API request
			else
				$this->Aid->setFormValue($val);
		}
		$this->Aid->MultiUpdate = $CurrentForm->getValue("u_Aid");

		// Check field name 'Vid' first before field var 'x_Vid'
		$val = $CurrentForm->hasValue("Vid") ? $CurrentForm->getValue("Vid") : $CurrentForm->getValue("x_Vid");
		if (!$this->Vid->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Vid->Visible = FALSE; // Disable update for API request
			else
				$this->Vid->setFormValue($val);
		}
		$this->Vid->MultiUpdate = $CurrentForm->getValue("u_Vid");

		// Check field name 'DrID' first before field var 'x_DrID'
		$val = $CurrentForm->hasValue("DrID") ? $CurrentForm->getValue("DrID") : $CurrentForm->getValue("x_DrID");
		if (!$this->DrID->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->DrID->Visible = FALSE; // Disable update for API request
			else
				$this->DrID->setFormValue($val);
		}
		$this->DrID->MultiUpdate = $CurrentForm->getValue("u_DrID");

		// Check field name 'DrCODE' first before field var 'x_DrCODE'
		$val = $CurrentForm->hasValue("DrCODE") ? $CurrentForm->getValue("DrCODE") : $CurrentForm->getValue("x_DrCODE");
		if (!$this->DrCODE->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->DrCODE->Visible = FALSE; // Disable update for API request
			else
				$this->DrCODE->setFormValue($val);
		}
		$this->DrCODE->MultiUpdate = $CurrentForm->getValue("u_DrCODE");

		// Check field name 'DrName' first before field var 'x_DrName'
		$val = $CurrentForm->hasValue("DrName") ? $CurrentForm->getValue("DrName") : $CurrentForm->getValue("x_DrName");
		if (!$this->DrName->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->DrName->Visible = FALSE; // Disable update for API request
			else
				$this->DrName->setFormValue($val);
		}
		$this->DrName->MultiUpdate = $CurrentForm->getValue("u_DrName");

		// Check field name 'Department' first before field var 'x_Department'
		$val = $CurrentForm->hasValue("Department") ? $CurrentForm->getValue("Department") : $CurrentForm->getValue("x_Department");
		if (!$this->Department->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Department->Visible = FALSE; // Disable update for API request
			else
				$this->Department->setFormValue($val);
		}
		$this->Department->MultiUpdate = $CurrentForm->getValue("u_Department");

		// Check field name 'DrSharePres' first before field var 'x_DrSharePres'
		$val = $CurrentForm->hasValue("DrSharePres") ? $CurrentForm->getValue("DrSharePres") : $CurrentForm->getValue("x_DrSharePres");
		if (!$this->DrSharePres->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->DrSharePres->Visible = FALSE; // Disable update for API request
			else
				$this->DrSharePres->setFormValue($val);
		}
		$this->DrSharePres->MultiUpdate = $CurrentForm->getValue("u_DrSharePres");

		// Check field name 'HospSharePres' first before field var 'x_HospSharePres'
		$val = $CurrentForm->hasValue("HospSharePres") ? $CurrentForm->getValue("HospSharePres") : $CurrentForm->getValue("x_HospSharePres");
		if (!$this->HospSharePres->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->HospSharePres->Visible = FALSE; // Disable update for API request
			else
				$this->HospSharePres->setFormValue($val);
		}
		$this->HospSharePres->MultiUpdate = $CurrentForm->getValue("u_HospSharePres");

		// Check field name 'DrShareAmount' first before field var 'x_DrShareAmount'
		$val = $CurrentForm->hasValue("DrShareAmount") ? $CurrentForm->getValue("DrShareAmount") : $CurrentForm->getValue("x_DrShareAmount");
		if (!$this->DrShareAmount->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->DrShareAmount->Visible = FALSE; // Disable update for API request
			else
				$this->DrShareAmount->setFormValue($val);
		}
		$this->DrShareAmount->MultiUpdate = $CurrentForm->getValue("u_DrShareAmount");

		// Check field name 'HospShareAmount' first before field var 'x_HospShareAmount'
		$val = $CurrentForm->hasValue("HospShareAmount") ? $CurrentForm->getValue("HospShareAmount") : $CurrentForm->getValue("x_HospShareAmount");
		if (!$this->HospShareAmount->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->HospShareAmount->Visible = FALSE; // Disable update for API request
			else
				$this->HospShareAmount->setFormValue($val);
		}
		$this->HospShareAmount->MultiUpdate = $CurrentForm->getValue("u_HospShareAmount");

		// Check field name 'DrShareSettiledAmount' first before field var 'x_DrShareSettiledAmount'
		$val = $CurrentForm->hasValue("DrShareSettiledAmount") ? $CurrentForm->getValue("DrShareSettiledAmount") : $CurrentForm->getValue("x_DrShareSettiledAmount");
		if (!$this->DrShareSettiledAmount->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->DrShareSettiledAmount->Visible = FALSE; // Disable update for API request
			else
				$this->DrShareSettiledAmount->setFormValue($val);
		}
		$this->DrShareSettiledAmount->MultiUpdate = $CurrentForm->getValue("u_DrShareSettiledAmount");

		// Check field name 'DrShareSettledId' first before field var 'x_DrShareSettledId'
		$val = $CurrentForm->hasValue("DrShareSettledId") ? $CurrentForm->getValue("DrShareSettledId") : $CurrentForm->getValue("x_DrShareSettledId");
		if (!$this->DrShareSettledId->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->DrShareSettledId->Visible = FALSE; // Disable update for API request
			else
				$this->DrShareSettledId->setFormValue($val);
		}
		$this->DrShareSettledId->MultiUpdate = $CurrentForm->getValue("u_DrShareSettledId");

		// Check field name 'DrShareSettiledStatus' first before field var 'x_DrShareSettiledStatus'
		$val = $CurrentForm->hasValue("DrShareSettiledStatus") ? $CurrentForm->getValue("DrShareSettiledStatus") : $CurrentForm->getValue("x_DrShareSettiledStatus");
		if (!$this->DrShareSettiledStatus->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->DrShareSettiledStatus->Visible = FALSE; // Disable update for API request
			else
				$this->DrShareSettiledStatus->setFormValue($val);
		}
		$this->DrShareSettiledStatus->MultiUpdate = $CurrentForm->getValue("u_DrShareSettiledStatus");

		// Check field name 'invoiceId' first before field var 'x_invoiceId'
		$val = $CurrentForm->hasValue("invoiceId") ? $CurrentForm->getValue("invoiceId") : $CurrentForm->getValue("x_invoiceId");
		if (!$this->invoiceId->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->invoiceId->Visible = FALSE; // Disable update for API request
			else
				$this->invoiceId->setFormValue($val);
		}
		$this->invoiceId->MultiUpdate = $CurrentForm->getValue("u_invoiceId");

		// Check field name 'invoiceAmount' first before field var 'x_invoiceAmount'
		$val = $CurrentForm->hasValue("invoiceAmount") ? $CurrentForm->getValue("invoiceAmount") : $CurrentForm->getValue("x_invoiceAmount");
		if (!$this->invoiceAmount->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->invoiceAmount->Visible = FALSE; // Disable update for API request
			else
				$this->invoiceAmount->setFormValue($val);
		}
		$this->invoiceAmount->MultiUpdate = $CurrentForm->getValue("u_invoiceAmount");

		// Check field name 'invoiceStatus' first before field var 'x_invoiceStatus'
		$val = $CurrentForm->hasValue("invoiceStatus") ? $CurrentForm->getValue("invoiceStatus") : $CurrentForm->getValue("x_invoiceStatus");
		if (!$this->invoiceStatus->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->invoiceStatus->Visible = FALSE; // Disable update for API request
			else
				$this->invoiceStatus->setFormValue($val);
		}
		$this->invoiceStatus->MultiUpdate = $CurrentForm->getValue("u_invoiceStatus");

		// Check field name 'modeOfPayment' first before field var 'x_modeOfPayment'
		$val = $CurrentForm->hasValue("modeOfPayment") ? $CurrentForm->getValue("modeOfPayment") : $CurrentForm->getValue("x_modeOfPayment");
		if (!$this->modeOfPayment->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->modeOfPayment->Visible = FALSE; // Disable update for API request
			else
				$this->modeOfPayment->setFormValue($val);
		}
		$this->modeOfPayment->MultiUpdate = $CurrentForm->getValue("u_modeOfPayment");

		// Check field name 'HospID' first before field var 'x_HospID'
		$val = $CurrentForm->hasValue("HospID") ? $CurrentForm->getValue("HospID") : $CurrentForm->getValue("x_HospID");
		if (!$this->HospID->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->HospID->Visible = FALSE; // Disable update for API request
			else
				$this->HospID->setFormValue($val);
		}
		$this->HospID->MultiUpdate = $CurrentForm->getValue("u_HospID");

		// Check field name 'RIDNO' first before field var 'x_RIDNO'
		$val = $CurrentForm->hasValue("RIDNO") ? $CurrentForm->getValue("RIDNO") : $CurrentForm->getValue("x_RIDNO");
		if (!$this->RIDNO->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->RIDNO->Visible = FALSE; // Disable update for API request
			else
				$this->RIDNO->setFormValue($val);
		}
		$this->RIDNO->MultiUpdate = $CurrentForm->getValue("u_RIDNO");

		// Check field name 'TidNo' first before field var 'x_TidNo'
		$val = $CurrentForm->hasValue("TidNo") ? $CurrentForm->getValue("TidNo") : $CurrentForm->getValue("x_TidNo");
		if (!$this->TidNo->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->TidNo->Visible = FALSE; // Disable update for API request
			else
				$this->TidNo->setFormValue($val);
		}
		$this->TidNo->MultiUpdate = $CurrentForm->getValue("u_TidNo");

		// Check field name 'DiscountCategory' first before field var 'x_DiscountCategory'
		$val = $CurrentForm->hasValue("DiscountCategory") ? $CurrentForm->getValue("DiscountCategory") : $CurrentForm->getValue("x_DiscountCategory");
		if (!$this->DiscountCategory->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->DiscountCategory->Visible = FALSE; // Disable update for API request
			else
				$this->DiscountCategory->setFormValue($val);
		}
		$this->DiscountCategory->MultiUpdate = $CurrentForm->getValue("u_DiscountCategory");

		// Check field name 'sid' first before field var 'x_sid'
		$val = $CurrentForm->hasValue("sid") ? $CurrentForm->getValue("sid") : $CurrentForm->getValue("x_sid");
		if (!$this->sid->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->sid->Visible = FALSE; // Disable update for API request
			else
				$this->sid->setFormValue($val);
		}
		$this->sid->MultiUpdate = $CurrentForm->getValue("u_sid");

		// Check field name 'ItemCode' first before field var 'x_ItemCode'
		$val = $CurrentForm->hasValue("ItemCode") ? $CurrentForm->getValue("ItemCode") : $CurrentForm->getValue("x_ItemCode");
		if (!$this->ItemCode->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->ItemCode->Visible = FALSE; // Disable update for API request
			else
				$this->ItemCode->setFormValue($val);
		}
		$this->ItemCode->MultiUpdate = $CurrentForm->getValue("u_ItemCode");

		// Check field name 'TestSubCd' first before field var 'x_TestSubCd'
		$val = $CurrentForm->hasValue("TestSubCd") ? $CurrentForm->getValue("TestSubCd") : $CurrentForm->getValue("x_TestSubCd");
		if (!$this->TestSubCd->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->TestSubCd->Visible = FALSE; // Disable update for API request
			else
				$this->TestSubCd->setFormValue($val);
		}
		$this->TestSubCd->MultiUpdate = $CurrentForm->getValue("u_TestSubCd");

		// Check field name 'DEptCd' first before field var 'x_DEptCd'
		$val = $CurrentForm->hasValue("DEptCd") ? $CurrentForm->getValue("DEptCd") : $CurrentForm->getValue("x_DEptCd");
		if (!$this->DEptCd->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->DEptCd->Visible = FALSE; // Disable update for API request
			else
				$this->DEptCd->setFormValue($val);
		}
		$this->DEptCd->MultiUpdate = $CurrentForm->getValue("u_DEptCd");

		// Check field name 'ProfCd' first before field var 'x_ProfCd'
		$val = $CurrentForm->hasValue("ProfCd") ? $CurrentForm->getValue("ProfCd") : $CurrentForm->getValue("x_ProfCd");
		if (!$this->ProfCd->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->ProfCd->Visible = FALSE; // Disable update for API request
			else
				$this->ProfCd->setFormValue($val);
		}
		$this->ProfCd->MultiUpdate = $CurrentForm->getValue("u_ProfCd");

		// Check field name 'LabReport' first before field var 'x_LabReport'
		$val = $CurrentForm->hasValue("LabReport") ? $CurrentForm->getValue("LabReport") : $CurrentForm->getValue("x_LabReport");
		if (!$this->LabReport->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->LabReport->Visible = FALSE; // Disable update for API request
			else
				$this->LabReport->setFormValue($val);
		}
		$this->LabReport->MultiUpdate = $CurrentForm->getValue("u_LabReport");

		// Check field name 'Comments' first before field var 'x_Comments'
		$val = $CurrentForm->hasValue("Comments") ? $CurrentForm->getValue("Comments") : $CurrentForm->getValue("x_Comments");
		if (!$this->Comments->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Comments->Visible = FALSE; // Disable update for API request
			else
				$this->Comments->setFormValue($val);
		}
		$this->Comments->MultiUpdate = $CurrentForm->getValue("u_Comments");

		// Check field name 'Method' first before field var 'x_Method'
		$val = $CurrentForm->hasValue("Method") ? $CurrentForm->getValue("Method") : $CurrentForm->getValue("x_Method");
		if (!$this->Method->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Method->Visible = FALSE; // Disable update for API request
			else
				$this->Method->setFormValue($val);
		}
		$this->Method->MultiUpdate = $CurrentForm->getValue("u_Method");

		// Check field name 'Specimen' first before field var 'x_Specimen'
		$val = $CurrentForm->hasValue("Specimen") ? $CurrentForm->getValue("Specimen") : $CurrentForm->getValue("x_Specimen");
		if (!$this->Specimen->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Specimen->Visible = FALSE; // Disable update for API request
			else
				$this->Specimen->setFormValue($val);
		}
		$this->Specimen->MultiUpdate = $CurrentForm->getValue("u_Specimen");

		// Check field name 'Abnormal' first before field var 'x_Abnormal'
		$val = $CurrentForm->hasValue("Abnormal") ? $CurrentForm->getValue("Abnormal") : $CurrentForm->getValue("x_Abnormal");
		if (!$this->Abnormal->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Abnormal->Visible = FALSE; // Disable update for API request
			else
				$this->Abnormal->setFormValue($val);
		}
		$this->Abnormal->MultiUpdate = $CurrentForm->getValue("u_Abnormal");

		// Check field name 'RefValue' first before field var 'x_RefValue'
		$val = $CurrentForm->hasValue("RefValue") ? $CurrentForm->getValue("RefValue") : $CurrentForm->getValue("x_RefValue");
		if (!$this->RefValue->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->RefValue->Visible = FALSE; // Disable update for API request
			else
				$this->RefValue->setFormValue($val);
		}
		$this->RefValue->MultiUpdate = $CurrentForm->getValue("u_RefValue");

		// Check field name 'TestUnit' first before field var 'x_TestUnit'
		$val = $CurrentForm->hasValue("TestUnit") ? $CurrentForm->getValue("TestUnit") : $CurrentForm->getValue("x_TestUnit");
		if (!$this->TestUnit->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->TestUnit->Visible = FALSE; // Disable update for API request
			else
				$this->TestUnit->setFormValue($val);
		}
		$this->TestUnit->MultiUpdate = $CurrentForm->getValue("u_TestUnit");

		// Check field name 'LOWHIGH' first before field var 'x_LOWHIGH'
		$val = $CurrentForm->hasValue("LOWHIGH") ? $CurrentForm->getValue("LOWHIGH") : $CurrentForm->getValue("x_LOWHIGH");
		if (!$this->LOWHIGH->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->LOWHIGH->Visible = FALSE; // Disable update for API request
			else
				$this->LOWHIGH->setFormValue($val);
		}
		$this->LOWHIGH->MultiUpdate = $CurrentForm->getValue("u_LOWHIGH");

		// Check field name 'Branch' first before field var 'x_Branch'
		$val = $CurrentForm->hasValue("Branch") ? $CurrentForm->getValue("Branch") : $CurrentForm->getValue("x_Branch");
		if (!$this->Branch->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Branch->Visible = FALSE; // Disable update for API request
			else
				$this->Branch->setFormValue($val);
		}
		$this->Branch->MultiUpdate = $CurrentForm->getValue("u_Branch");

		// Check field name 'Dispatch' first before field var 'x_Dispatch'
		$val = $CurrentForm->hasValue("Dispatch") ? $CurrentForm->getValue("Dispatch") : $CurrentForm->getValue("x_Dispatch");
		if (!$this->Dispatch->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Dispatch->Visible = FALSE; // Disable update for API request
			else
				$this->Dispatch->setFormValue($val);
		}
		$this->Dispatch->MultiUpdate = $CurrentForm->getValue("u_Dispatch");

		// Check field name 'Pic1' first before field var 'x_Pic1'
		$val = $CurrentForm->hasValue("Pic1") ? $CurrentForm->getValue("Pic1") : $CurrentForm->getValue("x_Pic1");
		if (!$this->Pic1->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Pic1->Visible = FALSE; // Disable update for API request
			else
				$this->Pic1->setFormValue($val);
		}
		$this->Pic1->MultiUpdate = $CurrentForm->getValue("u_Pic1");

		// Check field name 'Pic2' first before field var 'x_Pic2'
		$val = $CurrentForm->hasValue("Pic2") ? $CurrentForm->getValue("Pic2") : $CurrentForm->getValue("x_Pic2");
		if (!$this->Pic2->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Pic2->Visible = FALSE; // Disable update for API request
			else
				$this->Pic2->setFormValue($val);
		}
		$this->Pic2->MultiUpdate = $CurrentForm->getValue("u_Pic2");

		// Check field name 'GraphPath' first before field var 'x_GraphPath'
		$val = $CurrentForm->hasValue("GraphPath") ? $CurrentForm->getValue("GraphPath") : $CurrentForm->getValue("x_GraphPath");
		if (!$this->GraphPath->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->GraphPath->Visible = FALSE; // Disable update for API request
			else
				$this->GraphPath->setFormValue($val);
		}
		$this->GraphPath->MultiUpdate = $CurrentForm->getValue("u_GraphPath");

		// Check field name 'MachineCD' first before field var 'x_MachineCD'
		$val = $CurrentForm->hasValue("MachineCD") ? $CurrentForm->getValue("MachineCD") : $CurrentForm->getValue("x_MachineCD");
		if (!$this->MachineCD->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->MachineCD->Visible = FALSE; // Disable update for API request
			else
				$this->MachineCD->setFormValue($val);
		}
		$this->MachineCD->MultiUpdate = $CurrentForm->getValue("u_MachineCD");

		// Check field name 'TestCancel' first before field var 'x_TestCancel'
		$val = $CurrentForm->hasValue("TestCancel") ? $CurrentForm->getValue("TestCancel") : $CurrentForm->getValue("x_TestCancel");
		if (!$this->TestCancel->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->TestCancel->Visible = FALSE; // Disable update for API request
			else
				$this->TestCancel->setFormValue($val);
		}
		$this->TestCancel->MultiUpdate = $CurrentForm->getValue("u_TestCancel");

		// Check field name 'OutSource' first before field var 'x_OutSource'
		$val = $CurrentForm->hasValue("OutSource") ? $CurrentForm->getValue("OutSource") : $CurrentForm->getValue("x_OutSource");
		if (!$this->OutSource->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->OutSource->Visible = FALSE; // Disable update for API request
			else
				$this->OutSource->setFormValue($val);
		}
		$this->OutSource->MultiUpdate = $CurrentForm->getValue("u_OutSource");

		// Check field name 'Printed' first before field var 'x_Printed'
		$val = $CurrentForm->hasValue("Printed") ? $CurrentForm->getValue("Printed") : $CurrentForm->getValue("x_Printed");
		if (!$this->Printed->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Printed->Visible = FALSE; // Disable update for API request
			else
				$this->Printed->setFormValue($val);
		}
		$this->Printed->MultiUpdate = $CurrentForm->getValue("u_Printed");

		// Check field name 'PrintBy' first before field var 'x_PrintBy'
		$val = $CurrentForm->hasValue("PrintBy") ? $CurrentForm->getValue("PrintBy") : $CurrentForm->getValue("x_PrintBy");
		if (!$this->PrintBy->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->PrintBy->Visible = FALSE; // Disable update for API request
			else
				$this->PrintBy->setFormValue($val);
		}
		$this->PrintBy->MultiUpdate = $CurrentForm->getValue("u_PrintBy");

		// Check field name 'PrintDate' first before field var 'x_PrintDate'
		$val = $CurrentForm->hasValue("PrintDate") ? $CurrentForm->getValue("PrintDate") : $CurrentForm->getValue("x_PrintDate");
		if (!$this->PrintDate->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->PrintDate->Visible = FALSE; // Disable update for API request
			else
				$this->PrintDate->setFormValue($val);
			$this->PrintDate->CurrentValue = UnFormatDateTime($this->PrintDate->CurrentValue, 0);
		}
		$this->PrintDate->MultiUpdate = $CurrentForm->getValue("u_PrintDate");

		// Check field name 'BillingDate' first before field var 'x_BillingDate'
		$val = $CurrentForm->hasValue("BillingDate") ? $CurrentForm->getValue("BillingDate") : $CurrentForm->getValue("x_BillingDate");
		if (!$this->BillingDate->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->BillingDate->Visible = FALSE; // Disable update for API request
			else
				$this->BillingDate->setFormValue($val);
			$this->BillingDate->CurrentValue = UnFormatDateTime($this->BillingDate->CurrentValue, 0);
		}
		$this->BillingDate->MultiUpdate = $CurrentForm->getValue("u_BillingDate");

		// Check field name 'BilledBy' first before field var 'x_BilledBy'
		$val = $CurrentForm->hasValue("BilledBy") ? $CurrentForm->getValue("BilledBy") : $CurrentForm->getValue("x_BilledBy");
		if (!$this->BilledBy->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->BilledBy->Visible = FALSE; // Disable update for API request
			else
				$this->BilledBy->setFormValue($val);
		}
		$this->BilledBy->MultiUpdate = $CurrentForm->getValue("u_BilledBy");

		// Check field name 'Resulted' first before field var 'x_Resulted'
		$val = $CurrentForm->hasValue("Resulted") ? $CurrentForm->getValue("Resulted") : $CurrentForm->getValue("x_Resulted");
		if (!$this->Resulted->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Resulted->Visible = FALSE; // Disable update for API request
			else
				$this->Resulted->setFormValue($val);
		}
		$this->Resulted->MultiUpdate = $CurrentForm->getValue("u_Resulted");

		// Check field name 'ResultDate' first before field var 'x_ResultDate'
		$val = $CurrentForm->hasValue("ResultDate") ? $CurrentForm->getValue("ResultDate") : $CurrentForm->getValue("x_ResultDate");
		if (!$this->ResultDate->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->ResultDate->Visible = FALSE; // Disable update for API request
			else
				$this->ResultDate->setFormValue($val);
			$this->ResultDate->CurrentValue = UnFormatDateTime($this->ResultDate->CurrentValue, 0);
		}
		$this->ResultDate->MultiUpdate = $CurrentForm->getValue("u_ResultDate");

		// Check field name 'ResultedBy' first before field var 'x_ResultedBy'
		$val = $CurrentForm->hasValue("ResultedBy") ? $CurrentForm->getValue("ResultedBy") : $CurrentForm->getValue("x_ResultedBy");
		if (!$this->ResultedBy->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->ResultedBy->Visible = FALSE; // Disable update for API request
			else
				$this->ResultedBy->setFormValue($val);
		}
		$this->ResultedBy->MultiUpdate = $CurrentForm->getValue("u_ResultedBy");

		// Check field name 'SampleDate' first before field var 'x_SampleDate'
		$val = $CurrentForm->hasValue("SampleDate") ? $CurrentForm->getValue("SampleDate") : $CurrentForm->getValue("x_SampleDate");
		if (!$this->SampleDate->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->SampleDate->Visible = FALSE; // Disable update for API request
			else
				$this->SampleDate->setFormValue($val);
			$this->SampleDate->CurrentValue = UnFormatDateTime($this->SampleDate->CurrentValue, 0);
		}
		$this->SampleDate->MultiUpdate = $CurrentForm->getValue("u_SampleDate");

		// Check field name 'SampleUser' first before field var 'x_SampleUser'
		$val = $CurrentForm->hasValue("SampleUser") ? $CurrentForm->getValue("SampleUser") : $CurrentForm->getValue("x_SampleUser");
		if (!$this->SampleUser->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->SampleUser->Visible = FALSE; // Disable update for API request
			else
				$this->SampleUser->setFormValue($val);
		}
		$this->SampleUser->MultiUpdate = $CurrentForm->getValue("u_SampleUser");

		// Check field name 'Sampled' first before field var 'x_Sampled'
		$val = $CurrentForm->hasValue("Sampled") ? $CurrentForm->getValue("Sampled") : $CurrentForm->getValue("x_Sampled");
		if (!$this->Sampled->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Sampled->Visible = FALSE; // Disable update for API request
			else
				$this->Sampled->setFormValue($val);
		}
		$this->Sampled->MultiUpdate = $CurrentForm->getValue("u_Sampled");

		// Check field name 'ReceivedDate' first before field var 'x_ReceivedDate'
		$val = $CurrentForm->hasValue("ReceivedDate") ? $CurrentForm->getValue("ReceivedDate") : $CurrentForm->getValue("x_ReceivedDate");
		if (!$this->ReceivedDate->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->ReceivedDate->Visible = FALSE; // Disable update for API request
			else
				$this->ReceivedDate->setFormValue($val);
			$this->ReceivedDate->CurrentValue = UnFormatDateTime($this->ReceivedDate->CurrentValue, 0);
		}
		$this->ReceivedDate->MultiUpdate = $CurrentForm->getValue("u_ReceivedDate");

		// Check field name 'ReceivedUser' first before field var 'x_ReceivedUser'
		$val = $CurrentForm->hasValue("ReceivedUser") ? $CurrentForm->getValue("ReceivedUser") : $CurrentForm->getValue("x_ReceivedUser");
		if (!$this->ReceivedUser->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->ReceivedUser->Visible = FALSE; // Disable update for API request
			else
				$this->ReceivedUser->setFormValue($val);
		}
		$this->ReceivedUser->MultiUpdate = $CurrentForm->getValue("u_ReceivedUser");

		// Check field name 'Recevied' first before field var 'x_Recevied'
		$val = $CurrentForm->hasValue("Recevied") ? $CurrentForm->getValue("Recevied") : $CurrentForm->getValue("x_Recevied");
		if (!$this->Recevied->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Recevied->Visible = FALSE; // Disable update for API request
			else
				$this->Recevied->setFormValue($val);
		}
		$this->Recevied->MultiUpdate = $CurrentForm->getValue("u_Recevied");

		// Check field name 'DeptRecvDate' first before field var 'x_DeptRecvDate'
		$val = $CurrentForm->hasValue("DeptRecvDate") ? $CurrentForm->getValue("DeptRecvDate") : $CurrentForm->getValue("x_DeptRecvDate");
		if (!$this->DeptRecvDate->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->DeptRecvDate->Visible = FALSE; // Disable update for API request
			else
				$this->DeptRecvDate->setFormValue($val);
			$this->DeptRecvDate->CurrentValue = UnFormatDateTime($this->DeptRecvDate->CurrentValue, 0);
		}
		$this->DeptRecvDate->MultiUpdate = $CurrentForm->getValue("u_DeptRecvDate");

		// Check field name 'DeptRecvUser' first before field var 'x_DeptRecvUser'
		$val = $CurrentForm->hasValue("DeptRecvUser") ? $CurrentForm->getValue("DeptRecvUser") : $CurrentForm->getValue("x_DeptRecvUser");
		if (!$this->DeptRecvUser->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->DeptRecvUser->Visible = FALSE; // Disable update for API request
			else
				$this->DeptRecvUser->setFormValue($val);
		}
		$this->DeptRecvUser->MultiUpdate = $CurrentForm->getValue("u_DeptRecvUser");

		// Check field name 'DeptRecived' first before field var 'x_DeptRecived'
		$val = $CurrentForm->hasValue("DeptRecived") ? $CurrentForm->getValue("DeptRecived") : $CurrentForm->getValue("x_DeptRecived");
		if (!$this->DeptRecived->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->DeptRecived->Visible = FALSE; // Disable update for API request
			else
				$this->DeptRecived->setFormValue($val);
		}
		$this->DeptRecived->MultiUpdate = $CurrentForm->getValue("u_DeptRecived");

		// Check field name 'SAuthDate' first before field var 'x_SAuthDate'
		$val = $CurrentForm->hasValue("SAuthDate") ? $CurrentForm->getValue("SAuthDate") : $CurrentForm->getValue("x_SAuthDate");
		if (!$this->SAuthDate->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->SAuthDate->Visible = FALSE; // Disable update for API request
			else
				$this->SAuthDate->setFormValue($val);
			$this->SAuthDate->CurrentValue = UnFormatDateTime($this->SAuthDate->CurrentValue, 0);
		}
		$this->SAuthDate->MultiUpdate = $CurrentForm->getValue("u_SAuthDate");

		// Check field name 'SAuthBy' first before field var 'x_SAuthBy'
		$val = $CurrentForm->hasValue("SAuthBy") ? $CurrentForm->getValue("SAuthBy") : $CurrentForm->getValue("x_SAuthBy");
		if (!$this->SAuthBy->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->SAuthBy->Visible = FALSE; // Disable update for API request
			else
				$this->SAuthBy->setFormValue($val);
		}
		$this->SAuthBy->MultiUpdate = $CurrentForm->getValue("u_SAuthBy");

		// Check field name 'SAuthendicate' first before field var 'x_SAuthendicate'
		$val = $CurrentForm->hasValue("SAuthendicate") ? $CurrentForm->getValue("SAuthendicate") : $CurrentForm->getValue("x_SAuthendicate");
		if (!$this->SAuthendicate->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->SAuthendicate->Visible = FALSE; // Disable update for API request
			else
				$this->SAuthendicate->setFormValue($val);
		}
		$this->SAuthendicate->MultiUpdate = $CurrentForm->getValue("u_SAuthendicate");

		// Check field name 'AuthDate' first before field var 'x_AuthDate'
		$val = $CurrentForm->hasValue("AuthDate") ? $CurrentForm->getValue("AuthDate") : $CurrentForm->getValue("x_AuthDate");
		if (!$this->AuthDate->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->AuthDate->Visible = FALSE; // Disable update for API request
			else
				$this->AuthDate->setFormValue($val);
			$this->AuthDate->CurrentValue = UnFormatDateTime($this->AuthDate->CurrentValue, 0);
		}
		$this->AuthDate->MultiUpdate = $CurrentForm->getValue("u_AuthDate");

		// Check field name 'AuthBy' first before field var 'x_AuthBy'
		$val = $CurrentForm->hasValue("AuthBy") ? $CurrentForm->getValue("AuthBy") : $CurrentForm->getValue("x_AuthBy");
		if (!$this->AuthBy->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->AuthBy->Visible = FALSE; // Disable update for API request
			else
				$this->AuthBy->setFormValue($val);
		}
		$this->AuthBy->MultiUpdate = $CurrentForm->getValue("u_AuthBy");

		// Check field name 'Authencate' first before field var 'x_Authencate'
		$val = $CurrentForm->hasValue("Authencate") ? $CurrentForm->getValue("Authencate") : $CurrentForm->getValue("x_Authencate");
		if (!$this->Authencate->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Authencate->Visible = FALSE; // Disable update for API request
			else
				$this->Authencate->setFormValue($val);
		}
		$this->Authencate->MultiUpdate = $CurrentForm->getValue("u_Authencate");

		// Check field name 'EditDate' first before field var 'x_EditDate'
		$val = $CurrentForm->hasValue("EditDate") ? $CurrentForm->getValue("EditDate") : $CurrentForm->getValue("x_EditDate");
		if (!$this->EditDate->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->EditDate->Visible = FALSE; // Disable update for API request
			else
				$this->EditDate->setFormValue($val);
			$this->EditDate->CurrentValue = UnFormatDateTime($this->EditDate->CurrentValue, 0);
		}
		$this->EditDate->MultiUpdate = $CurrentForm->getValue("u_EditDate");

		// Check field name 'EditBy' first before field var 'x_EditBy'
		$val = $CurrentForm->hasValue("EditBy") ? $CurrentForm->getValue("EditBy") : $CurrentForm->getValue("x_EditBy");
		if (!$this->EditBy->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->EditBy->Visible = FALSE; // Disable update for API request
			else
				$this->EditBy->setFormValue($val);
		}
		$this->EditBy->MultiUpdate = $CurrentForm->getValue("u_EditBy");

		// Check field name 'Editted' first before field var 'x_Editted'
		$val = $CurrentForm->hasValue("Editted") ? $CurrentForm->getValue("Editted") : $CurrentForm->getValue("x_Editted");
		if (!$this->Editted->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Editted->Visible = FALSE; // Disable update for API request
			else
				$this->Editted->setFormValue($val);
		}
		$this->Editted->MultiUpdate = $CurrentForm->getValue("u_Editted");

		// Check field name 'PatID' first before field var 'x_PatID'
		$val = $CurrentForm->hasValue("PatID") ? $CurrentForm->getValue("PatID") : $CurrentForm->getValue("x_PatID");
		if (!$this->PatID->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->PatID->Visible = FALSE; // Disable update for API request
			else
				$this->PatID->setFormValue($val);
		}
		$this->PatID->MultiUpdate = $CurrentForm->getValue("u_PatID");

		// Check field name 'PatientId' first before field var 'x_PatientId'
		$val = $CurrentForm->hasValue("PatientId") ? $CurrentForm->getValue("PatientId") : $CurrentForm->getValue("x_PatientId");
		if (!$this->PatientId->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->PatientId->Visible = FALSE; // Disable update for API request
			else
				$this->PatientId->setFormValue($val);
		}
		$this->PatientId->MultiUpdate = $CurrentForm->getValue("u_PatientId");

		// Check field name 'Mobile' first before field var 'x_Mobile'
		$val = $CurrentForm->hasValue("Mobile") ? $CurrentForm->getValue("Mobile") : $CurrentForm->getValue("x_Mobile");
		if (!$this->Mobile->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Mobile->Visible = FALSE; // Disable update for API request
			else
				$this->Mobile->setFormValue($val);
		}
		$this->Mobile->MultiUpdate = $CurrentForm->getValue("u_Mobile");

		// Check field name 'CId' first before field var 'x_CId'
		$val = $CurrentForm->hasValue("CId") ? $CurrentForm->getValue("CId") : $CurrentForm->getValue("x_CId");
		if (!$this->CId->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->CId->Visible = FALSE; // Disable update for API request
			else
				$this->CId->setFormValue($val);
		}
		$this->CId->MultiUpdate = $CurrentForm->getValue("u_CId");

		// Check field name 'Order' first before field var 'x_Order'
		$val = $CurrentForm->hasValue("Order") ? $CurrentForm->getValue("Order") : $CurrentForm->getValue("x_Order");
		if (!$this->Order->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Order->Visible = FALSE; // Disable update for API request
			else
				$this->Order->setFormValue($val);
		}
		$this->Order->MultiUpdate = $CurrentForm->getValue("u_Order");

		// Check field name 'Form' first before field var 'x_Form'
		$val = $CurrentForm->hasValue("Form") ? $CurrentForm->getValue("Form") : $CurrentForm->getValue("x_Form");
		if (!$this->Form->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Form->Visible = FALSE; // Disable update for API request
			else
				$this->Form->setFormValue($val);
		}
		$this->Form->MultiUpdate = $CurrentForm->getValue("u_Form");

		// Check field name 'ResType' first before field var 'x_ResType'
		$val = $CurrentForm->hasValue("ResType") ? $CurrentForm->getValue("ResType") : $CurrentForm->getValue("x_ResType");
		if (!$this->ResType->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->ResType->Visible = FALSE; // Disable update for API request
			else
				$this->ResType->setFormValue($val);
		}
		$this->ResType->MultiUpdate = $CurrentForm->getValue("u_ResType");

		// Check field name 'Sample' first before field var 'x_Sample'
		$val = $CurrentForm->hasValue("Sample") ? $CurrentForm->getValue("Sample") : $CurrentForm->getValue("x_Sample");
		if (!$this->Sample->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Sample->Visible = FALSE; // Disable update for API request
			else
				$this->Sample->setFormValue($val);
		}
		$this->Sample->MultiUpdate = $CurrentForm->getValue("u_Sample");

		// Check field name 'NoD' first before field var 'x_NoD'
		$val = $CurrentForm->hasValue("NoD") ? $CurrentForm->getValue("NoD") : $CurrentForm->getValue("x_NoD");
		if (!$this->NoD->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->NoD->Visible = FALSE; // Disable update for API request
			else
				$this->NoD->setFormValue($val);
		}
		$this->NoD->MultiUpdate = $CurrentForm->getValue("u_NoD");

		// Check field name 'BillOrder' first before field var 'x_BillOrder'
		$val = $CurrentForm->hasValue("BillOrder") ? $CurrentForm->getValue("BillOrder") : $CurrentForm->getValue("x_BillOrder");
		if (!$this->BillOrder->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->BillOrder->Visible = FALSE; // Disable update for API request
			else
				$this->BillOrder->setFormValue($val);
		}
		$this->BillOrder->MultiUpdate = $CurrentForm->getValue("u_BillOrder");

		// Check field name 'Formula' first before field var 'x_Formula'
		$val = $CurrentForm->hasValue("Formula") ? $CurrentForm->getValue("Formula") : $CurrentForm->getValue("x_Formula");
		if (!$this->Formula->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Formula->Visible = FALSE; // Disable update for API request
			else
				$this->Formula->setFormValue($val);
		}
		$this->Formula->MultiUpdate = $CurrentForm->getValue("u_Formula");

		// Check field name 'Inactive' first before field var 'x_Inactive'
		$val = $CurrentForm->hasValue("Inactive") ? $CurrentForm->getValue("Inactive") : $CurrentForm->getValue("x_Inactive");
		if (!$this->Inactive->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Inactive->Visible = FALSE; // Disable update for API request
			else
				$this->Inactive->setFormValue($val);
		}
		$this->Inactive->MultiUpdate = $CurrentForm->getValue("u_Inactive");

		// Check field name 'CollSample' first before field var 'x_CollSample'
		$val = $CurrentForm->hasValue("CollSample") ? $CurrentForm->getValue("CollSample") : $CurrentForm->getValue("x_CollSample");
		if (!$this->CollSample->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->CollSample->Visible = FALSE; // Disable update for API request
			else
				$this->CollSample->setFormValue($val);
		}
		$this->CollSample->MultiUpdate = $CurrentForm->getValue("u_CollSample");

		// Check field name 'TestType' first before field var 'x_TestType'
		$val = $CurrentForm->hasValue("TestType") ? $CurrentForm->getValue("TestType") : $CurrentForm->getValue("x_TestType");
		if (!$this->TestType->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->TestType->Visible = FALSE; // Disable update for API request
			else
				$this->TestType->setFormValue($val);
		}
		$this->TestType->MultiUpdate = $CurrentForm->getValue("u_TestType");

		// Check field name 'Repeated' first before field var 'x_Repeated'
		$val = $CurrentForm->hasValue("Repeated") ? $CurrentForm->getValue("Repeated") : $CurrentForm->getValue("x_Repeated");
		if (!$this->Repeated->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Repeated->Visible = FALSE; // Disable update for API request
			else
				$this->Repeated->setFormValue($val);
		}
		$this->Repeated->MultiUpdate = $CurrentForm->getValue("u_Repeated");

		// Check field name 'RepeatedBy' first before field var 'x_RepeatedBy'
		$val = $CurrentForm->hasValue("RepeatedBy") ? $CurrentForm->getValue("RepeatedBy") : $CurrentForm->getValue("x_RepeatedBy");
		if (!$this->RepeatedBy->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->RepeatedBy->Visible = FALSE; // Disable update for API request
			else
				$this->RepeatedBy->setFormValue($val);
		}
		$this->RepeatedBy->MultiUpdate = $CurrentForm->getValue("u_RepeatedBy");

		// Check field name 'RepeatedDate' first before field var 'x_RepeatedDate'
		$val = $CurrentForm->hasValue("RepeatedDate") ? $CurrentForm->getValue("RepeatedDate") : $CurrentForm->getValue("x_RepeatedDate");
		if (!$this->RepeatedDate->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->RepeatedDate->Visible = FALSE; // Disable update for API request
			else
				$this->RepeatedDate->setFormValue($val);
			$this->RepeatedDate->CurrentValue = UnFormatDateTime($this->RepeatedDate->CurrentValue, 0);
		}
		$this->RepeatedDate->MultiUpdate = $CurrentForm->getValue("u_RepeatedDate");

		// Check field name 'serviceID' first before field var 'x_serviceID'
		$val = $CurrentForm->hasValue("serviceID") ? $CurrentForm->getValue("serviceID") : $CurrentForm->getValue("x_serviceID");
		if (!$this->serviceID->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->serviceID->Visible = FALSE; // Disable update for API request
			else
				$this->serviceID->setFormValue($val);
		}
		$this->serviceID->MultiUpdate = $CurrentForm->getValue("u_serviceID");

		// Check field name 'Service_Type' first before field var 'x_Service_Type'
		$val = $CurrentForm->hasValue("Service_Type") ? $CurrentForm->getValue("Service_Type") : $CurrentForm->getValue("x_Service_Type");
		if (!$this->Service_Type->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Service_Type->Visible = FALSE; // Disable update for API request
			else
				$this->Service_Type->setFormValue($val);
		}
		$this->Service_Type->MultiUpdate = $CurrentForm->getValue("u_Service_Type");

		// Check field name 'Service_Department' first before field var 'x_Service_Department'
		$val = $CurrentForm->hasValue("Service_Department") ? $CurrentForm->getValue("Service_Department") : $CurrentForm->getValue("x_Service_Department");
		if (!$this->Service_Department->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Service_Department->Visible = FALSE; // Disable update for API request
			else
				$this->Service_Department->setFormValue($val);
		}
		$this->Service_Department->MultiUpdate = $CurrentForm->getValue("u_Service_Department");

		// Check field name 'RequestNo' first before field var 'x_RequestNo'
		$val = $CurrentForm->hasValue("RequestNo") ? $CurrentForm->getValue("RequestNo") : $CurrentForm->getValue("x_RequestNo");
		if (!$this->RequestNo->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->RequestNo->Visible = FALSE; // Disable update for API request
			else
				$this->RequestNo->setFormValue($val);
		}
		$this->RequestNo->MultiUpdate = $CurrentForm->getValue("u_RequestNo");

		// Check field name 'id' first before field var 'x_id'
		$val = $CurrentForm->hasValue("id") ? $CurrentForm->getValue("id") : $CurrentForm->getValue("x_id");
		if (!$this->id->IsDetailKey)
			$this->id->setFormValue($val);
	}

	// Restore form values
	public function restoreFormValues()
	{
		global $CurrentForm;
		$this->id->CurrentValue = $this->id->FormValue;
		$this->Reception->CurrentValue = $this->Reception->FormValue;
		$this->Services->CurrentValue = $this->Services->FormValue;
		$this->amount->CurrentValue = $this->amount->FormValue;
		$this->description->CurrentValue = $this->description->FormValue;
		$this->patient_type->CurrentValue = $this->patient_type->FormValue;
		$this->charged_date->CurrentValue = $this->charged_date->FormValue;
		$this->charged_date->CurrentValue = UnFormatDateTime($this->charged_date->CurrentValue, 0);
		$this->status->CurrentValue = $this->status->FormValue;
		$this->createdby->CurrentValue = $this->createdby->FormValue;
		$this->createddatetime->CurrentValue = $this->createddatetime->FormValue;
		$this->createddatetime->CurrentValue = UnFormatDateTime($this->createddatetime->CurrentValue, 0);
		$this->modifiedby->CurrentValue = $this->modifiedby->FormValue;
		$this->modifieddatetime->CurrentValue = $this->modifieddatetime->FormValue;
		$this->modifieddatetime->CurrentValue = UnFormatDateTime($this->modifieddatetime->CurrentValue, 0);
		$this->mrnno->CurrentValue = $this->mrnno->FormValue;
		$this->PatientName->CurrentValue = $this->PatientName->FormValue;
		$this->Age->CurrentValue = $this->Age->FormValue;
		$this->Gender->CurrentValue = $this->Gender->FormValue;
		$this->profilePic->CurrentValue = $this->profilePic->FormValue;
		$this->Unit->CurrentValue = $this->Unit->FormValue;
		$this->Quantity->CurrentValue = $this->Quantity->FormValue;
		$this->Discount->CurrentValue = $this->Discount->FormValue;
		$this->SubTotal->CurrentValue = $this->SubTotal->FormValue;
		$this->ServiceSelect->CurrentValue = $this->ServiceSelect->FormValue;
		$this->Aid->CurrentValue = $this->Aid->FormValue;
		$this->Vid->CurrentValue = $this->Vid->FormValue;
		$this->DrID->CurrentValue = $this->DrID->FormValue;
		$this->DrCODE->CurrentValue = $this->DrCODE->FormValue;
		$this->DrName->CurrentValue = $this->DrName->FormValue;
		$this->Department->CurrentValue = $this->Department->FormValue;
		$this->DrSharePres->CurrentValue = $this->DrSharePres->FormValue;
		$this->HospSharePres->CurrentValue = $this->HospSharePres->FormValue;
		$this->DrShareAmount->CurrentValue = $this->DrShareAmount->FormValue;
		$this->HospShareAmount->CurrentValue = $this->HospShareAmount->FormValue;
		$this->DrShareSettiledAmount->CurrentValue = $this->DrShareSettiledAmount->FormValue;
		$this->DrShareSettledId->CurrentValue = $this->DrShareSettledId->FormValue;
		$this->DrShareSettiledStatus->CurrentValue = $this->DrShareSettiledStatus->FormValue;
		$this->invoiceId->CurrentValue = $this->invoiceId->FormValue;
		$this->invoiceAmount->CurrentValue = $this->invoiceAmount->FormValue;
		$this->invoiceStatus->CurrentValue = $this->invoiceStatus->FormValue;
		$this->modeOfPayment->CurrentValue = $this->modeOfPayment->FormValue;
		$this->HospID->CurrentValue = $this->HospID->FormValue;
		$this->RIDNO->CurrentValue = $this->RIDNO->FormValue;
		$this->TidNo->CurrentValue = $this->TidNo->FormValue;
		$this->DiscountCategory->CurrentValue = $this->DiscountCategory->FormValue;
		$this->sid->CurrentValue = $this->sid->FormValue;
		$this->ItemCode->CurrentValue = $this->ItemCode->FormValue;
		$this->TestSubCd->CurrentValue = $this->TestSubCd->FormValue;
		$this->DEptCd->CurrentValue = $this->DEptCd->FormValue;
		$this->ProfCd->CurrentValue = $this->ProfCd->FormValue;
		$this->LabReport->CurrentValue = $this->LabReport->FormValue;
		$this->Comments->CurrentValue = $this->Comments->FormValue;
		$this->Method->CurrentValue = $this->Method->FormValue;
		$this->Specimen->CurrentValue = $this->Specimen->FormValue;
		$this->Abnormal->CurrentValue = $this->Abnormal->FormValue;
		$this->RefValue->CurrentValue = $this->RefValue->FormValue;
		$this->TestUnit->CurrentValue = $this->TestUnit->FormValue;
		$this->LOWHIGH->CurrentValue = $this->LOWHIGH->FormValue;
		$this->Branch->CurrentValue = $this->Branch->FormValue;
		$this->Dispatch->CurrentValue = $this->Dispatch->FormValue;
		$this->Pic1->CurrentValue = $this->Pic1->FormValue;
		$this->Pic2->CurrentValue = $this->Pic2->FormValue;
		$this->GraphPath->CurrentValue = $this->GraphPath->FormValue;
		$this->MachineCD->CurrentValue = $this->MachineCD->FormValue;
		$this->TestCancel->CurrentValue = $this->TestCancel->FormValue;
		$this->OutSource->CurrentValue = $this->OutSource->FormValue;
		$this->Printed->CurrentValue = $this->Printed->FormValue;
		$this->PrintBy->CurrentValue = $this->PrintBy->FormValue;
		$this->PrintDate->CurrentValue = $this->PrintDate->FormValue;
		$this->PrintDate->CurrentValue = UnFormatDateTime($this->PrintDate->CurrentValue, 0);
		$this->BillingDate->CurrentValue = $this->BillingDate->FormValue;
		$this->BillingDate->CurrentValue = UnFormatDateTime($this->BillingDate->CurrentValue, 0);
		$this->BilledBy->CurrentValue = $this->BilledBy->FormValue;
		$this->Resulted->CurrentValue = $this->Resulted->FormValue;
		$this->ResultDate->CurrentValue = $this->ResultDate->FormValue;
		$this->ResultDate->CurrentValue = UnFormatDateTime($this->ResultDate->CurrentValue, 0);
		$this->ResultedBy->CurrentValue = $this->ResultedBy->FormValue;
		$this->SampleDate->CurrentValue = $this->SampleDate->FormValue;
		$this->SampleDate->CurrentValue = UnFormatDateTime($this->SampleDate->CurrentValue, 0);
		$this->SampleUser->CurrentValue = $this->SampleUser->FormValue;
		$this->Sampled->CurrentValue = $this->Sampled->FormValue;
		$this->ReceivedDate->CurrentValue = $this->ReceivedDate->FormValue;
		$this->ReceivedDate->CurrentValue = UnFormatDateTime($this->ReceivedDate->CurrentValue, 0);
		$this->ReceivedUser->CurrentValue = $this->ReceivedUser->FormValue;
		$this->Recevied->CurrentValue = $this->Recevied->FormValue;
		$this->DeptRecvDate->CurrentValue = $this->DeptRecvDate->FormValue;
		$this->DeptRecvDate->CurrentValue = UnFormatDateTime($this->DeptRecvDate->CurrentValue, 0);
		$this->DeptRecvUser->CurrentValue = $this->DeptRecvUser->FormValue;
		$this->DeptRecived->CurrentValue = $this->DeptRecived->FormValue;
		$this->SAuthDate->CurrentValue = $this->SAuthDate->FormValue;
		$this->SAuthDate->CurrentValue = UnFormatDateTime($this->SAuthDate->CurrentValue, 0);
		$this->SAuthBy->CurrentValue = $this->SAuthBy->FormValue;
		$this->SAuthendicate->CurrentValue = $this->SAuthendicate->FormValue;
		$this->AuthDate->CurrentValue = $this->AuthDate->FormValue;
		$this->AuthDate->CurrentValue = UnFormatDateTime($this->AuthDate->CurrentValue, 0);
		$this->AuthBy->CurrentValue = $this->AuthBy->FormValue;
		$this->Authencate->CurrentValue = $this->Authencate->FormValue;
		$this->EditDate->CurrentValue = $this->EditDate->FormValue;
		$this->EditDate->CurrentValue = UnFormatDateTime($this->EditDate->CurrentValue, 0);
		$this->EditBy->CurrentValue = $this->EditBy->FormValue;
		$this->Editted->CurrentValue = $this->Editted->FormValue;
		$this->PatID->CurrentValue = $this->PatID->FormValue;
		$this->PatientId->CurrentValue = $this->PatientId->FormValue;
		$this->Mobile->CurrentValue = $this->Mobile->FormValue;
		$this->CId->CurrentValue = $this->CId->FormValue;
		$this->Order->CurrentValue = $this->Order->FormValue;
		$this->Form->CurrentValue = $this->Form->FormValue;
		$this->ResType->CurrentValue = $this->ResType->FormValue;
		$this->Sample->CurrentValue = $this->Sample->FormValue;
		$this->NoD->CurrentValue = $this->NoD->FormValue;
		$this->BillOrder->CurrentValue = $this->BillOrder->FormValue;
		$this->Formula->CurrentValue = $this->Formula->FormValue;
		$this->Inactive->CurrentValue = $this->Inactive->FormValue;
		$this->CollSample->CurrentValue = $this->CollSample->FormValue;
		$this->TestType->CurrentValue = $this->TestType->FormValue;
		$this->Repeated->CurrentValue = $this->Repeated->FormValue;
		$this->RepeatedBy->CurrentValue = $this->RepeatedBy->FormValue;
		$this->RepeatedDate->CurrentValue = $this->RepeatedDate->FormValue;
		$this->RepeatedDate->CurrentValue = UnFormatDateTime($this->RepeatedDate->CurrentValue, 0);
		$this->serviceID->CurrentValue = $this->serviceID->FormValue;
		$this->Service_Type->CurrentValue = $this->Service_Type->FormValue;
		$this->Service_Department->CurrentValue = $this->Service_Department->FormValue;
		$this->RequestNo->CurrentValue = $this->RequestNo->FormValue;
	}

	// Load recordset
	public function loadRecordset($offset = -1, $rowcnt = -1)
	{

		// Load List page SQL
		$sql = $this->getListSql();
		$conn = &$this->getConnection();

		// Load recordset
		$dbtype = GetConnectionType($this->Dbid);
		if ($this->UseSelectLimit) {
			$conn->raiseErrorFn = $GLOBALS["ERROR_FUNC"];
			if ($dbtype == "MSSQL") {
				$rs = $conn->selectLimit($sql, $rowcnt, $offset, ["_hasOrderBy" => trim($this->getOrderBy()) || trim($this->getSessionOrderByList())]);
			} else {
				$rs = $conn->selectLimit($sql, $rowcnt, $offset);
			}
			$conn->raiseErrorFn = '';
		} else {
			$rs = LoadRecordset($sql, $conn);
		}

		// Call Recordset Selected event
		$this->Recordset_Selected($rs);
		return $rs;
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
		$this->Services->setDbValue($row['Services']);
		if (array_key_exists('EV__Services', $rs->fields)) {
			$this->Services->VirtualValue = $rs->fields('EV__Services'); // Set up virtual field value
		} else {
			$this->Services->VirtualValue = ""; // Clear value
		}
		$this->amount->setDbValue($row['amount']);
		$this->description->setDbValue($row['description']);
		$this->patient_type->setDbValue($row['patient_type']);
		$this->charged_date->setDbValue($row['charged_date']);
		$this->status->setDbValue($row['status']);
		$this->createdby->setDbValue($row['createdby']);
		$this->createddatetime->setDbValue($row['createddatetime']);
		$this->modifiedby->setDbValue($row['modifiedby']);
		$this->modifieddatetime->setDbValue($row['modifieddatetime']);
		$this->mrnno->setDbValue($row['mrnno']);
		$this->PatientName->setDbValue($row['PatientName']);
		$this->Age->setDbValue($row['Age']);
		$this->Gender->setDbValue($row['Gender']);
		$this->profilePic->setDbValue($row['profilePic']);
		$this->Unit->setDbValue($row['Unit']);
		$this->Quantity->setDbValue($row['Quantity']);
		$this->Discount->setDbValue($row['Discount']);
		$this->SubTotal->setDbValue($row['SubTotal']);
		$this->ServiceSelect->setDbValue($row['ServiceSelect']);
		$this->Aid->setDbValue($row['Aid']);
		$this->Vid->setDbValue($row['Vid']);
		$this->DrID->setDbValue($row['DrID']);
		$this->DrCODE->setDbValue($row['DrCODE']);
		$this->DrName->setDbValue($row['DrName']);
		$this->Department->setDbValue($row['Department']);
		$this->DrSharePres->setDbValue($row['DrSharePres']);
		$this->HospSharePres->setDbValue($row['HospSharePres']);
		$this->DrShareAmount->setDbValue($row['DrShareAmount']);
		$this->HospShareAmount->setDbValue($row['HospShareAmount']);
		$this->DrShareSettiledAmount->setDbValue($row['DrShareSettiledAmount']);
		$this->DrShareSettledId->setDbValue($row['DrShareSettledId']);
		$this->DrShareSettiledStatus->setDbValue($row['DrShareSettiledStatus']);
		$this->invoiceId->setDbValue($row['invoiceId']);
		$this->invoiceAmount->setDbValue($row['invoiceAmount']);
		$this->invoiceStatus->setDbValue($row['invoiceStatus']);
		$this->modeOfPayment->setDbValue($row['modeOfPayment']);
		$this->HospID->setDbValue($row['HospID']);
		$this->RIDNO->setDbValue($row['RIDNO']);
		$this->TidNo->setDbValue($row['TidNo']);
		$this->DiscountCategory->setDbValue($row['DiscountCategory']);
		$this->sid->setDbValue($row['sid']);
		$this->ItemCode->setDbValue($row['ItemCode']);
		$this->TestSubCd->setDbValue($row['TestSubCd']);
		$this->DEptCd->setDbValue($row['DEptCd']);
		$this->ProfCd->setDbValue($row['ProfCd']);
		$this->LabReport->setDbValue($row['LabReport']);
		$this->Comments->setDbValue($row['Comments']);
		$this->Method->setDbValue($row['Method']);
		$this->Specimen->setDbValue($row['Specimen']);
		$this->Abnormal->setDbValue($row['Abnormal']);
		$this->RefValue->setDbValue($row['RefValue']);
		$this->TestUnit->setDbValue($row['TestUnit']);
		$this->LOWHIGH->setDbValue($row['LOWHIGH']);
		$this->Branch->setDbValue($row['Branch']);
		$this->Dispatch->setDbValue($row['Dispatch']);
		$this->Pic1->setDbValue($row['Pic1']);
		$this->Pic2->setDbValue($row['Pic2']);
		$this->GraphPath->setDbValue($row['GraphPath']);
		$this->MachineCD->setDbValue($row['MachineCD']);
		$this->TestCancel->setDbValue($row['TestCancel']);
		$this->OutSource->setDbValue($row['OutSource']);
		$this->Printed->setDbValue($row['Printed']);
		$this->PrintBy->setDbValue($row['PrintBy']);
		$this->PrintDate->setDbValue($row['PrintDate']);
		$this->BillingDate->setDbValue($row['BillingDate']);
		$this->BilledBy->setDbValue($row['BilledBy']);
		$this->Resulted->setDbValue($row['Resulted']);
		$this->ResultDate->setDbValue($row['ResultDate']);
		$this->ResultedBy->setDbValue($row['ResultedBy']);
		$this->SampleDate->setDbValue($row['SampleDate']);
		$this->SampleUser->setDbValue($row['SampleUser']);
		$this->Sampled->setDbValue($row['Sampled']);
		$this->ReceivedDate->setDbValue($row['ReceivedDate']);
		$this->ReceivedUser->setDbValue($row['ReceivedUser']);
		$this->Recevied->setDbValue($row['Recevied']);
		$this->DeptRecvDate->setDbValue($row['DeptRecvDate']);
		$this->DeptRecvUser->setDbValue($row['DeptRecvUser']);
		$this->DeptRecived->setDbValue($row['DeptRecived']);
		$this->SAuthDate->setDbValue($row['SAuthDate']);
		$this->SAuthBy->setDbValue($row['SAuthBy']);
		$this->SAuthendicate->setDbValue($row['SAuthendicate']);
		$this->AuthDate->setDbValue($row['AuthDate']);
		$this->AuthBy->setDbValue($row['AuthBy']);
		$this->Authencate->setDbValue($row['Authencate']);
		$this->EditDate->setDbValue($row['EditDate']);
		$this->EditBy->setDbValue($row['EditBy']);
		$this->Editted->setDbValue($row['Editted']);
		$this->PatID->setDbValue($row['PatID']);
		$this->PatientId->setDbValue($row['PatientId']);
		$this->Mobile->setDbValue($row['Mobile']);
		$this->CId->setDbValue($row['CId']);
		$this->Order->setDbValue($row['Order']);
		$this->Form->setDbValue($row['Form']);
		$this->ResType->setDbValue($row['ResType']);
		$this->Sample->setDbValue($row['Sample']);
		$this->NoD->setDbValue($row['NoD']);
		$this->BillOrder->setDbValue($row['BillOrder']);
		$this->Formula->setDbValue($row['Formula']);
		$this->Inactive->setDbValue($row['Inactive']);
		$this->CollSample->setDbValue($row['CollSample']);
		$this->TestType->setDbValue($row['TestType']);
		$this->Repeated->setDbValue($row['Repeated']);
		$this->RepeatedBy->setDbValue($row['RepeatedBy']);
		$this->RepeatedDate->setDbValue($row['RepeatedDate']);
		$this->serviceID->setDbValue($row['serviceID']);
		$this->Service_Type->setDbValue($row['Service_Type']);
		$this->Service_Department->setDbValue($row['Service_Department']);
		$this->RequestNo->setDbValue($row['RequestNo']);
	}

	// Return a row with default values
	protected function newRow()
	{
		$row = [];
		$row['id'] = NULL;
		$row['Reception'] = NULL;
		$row['Services'] = NULL;
		$row['amount'] = NULL;
		$row['description'] = NULL;
		$row['patient_type'] = NULL;
		$row['charged_date'] = NULL;
		$row['status'] = NULL;
		$row['createdby'] = NULL;
		$row['createddatetime'] = NULL;
		$row['modifiedby'] = NULL;
		$row['modifieddatetime'] = NULL;
		$row['mrnno'] = NULL;
		$row['PatientName'] = NULL;
		$row['Age'] = NULL;
		$row['Gender'] = NULL;
		$row['profilePic'] = NULL;
		$row['Unit'] = NULL;
		$row['Quantity'] = NULL;
		$row['Discount'] = NULL;
		$row['SubTotal'] = NULL;
		$row['ServiceSelect'] = NULL;
		$row['Aid'] = NULL;
		$row['Vid'] = NULL;
		$row['DrID'] = NULL;
		$row['DrCODE'] = NULL;
		$row['DrName'] = NULL;
		$row['Department'] = NULL;
		$row['DrSharePres'] = NULL;
		$row['HospSharePres'] = NULL;
		$row['DrShareAmount'] = NULL;
		$row['HospShareAmount'] = NULL;
		$row['DrShareSettiledAmount'] = NULL;
		$row['DrShareSettledId'] = NULL;
		$row['DrShareSettiledStatus'] = NULL;
		$row['invoiceId'] = NULL;
		$row['invoiceAmount'] = NULL;
		$row['invoiceStatus'] = NULL;
		$row['modeOfPayment'] = NULL;
		$row['HospID'] = NULL;
		$row['RIDNO'] = NULL;
		$row['TidNo'] = NULL;
		$row['DiscountCategory'] = NULL;
		$row['sid'] = NULL;
		$row['ItemCode'] = NULL;
		$row['TestSubCd'] = NULL;
		$row['DEptCd'] = NULL;
		$row['ProfCd'] = NULL;
		$row['LabReport'] = NULL;
		$row['Comments'] = NULL;
		$row['Method'] = NULL;
		$row['Specimen'] = NULL;
		$row['Abnormal'] = NULL;
		$row['RefValue'] = NULL;
		$row['TestUnit'] = NULL;
		$row['LOWHIGH'] = NULL;
		$row['Branch'] = NULL;
		$row['Dispatch'] = NULL;
		$row['Pic1'] = NULL;
		$row['Pic2'] = NULL;
		$row['GraphPath'] = NULL;
		$row['MachineCD'] = NULL;
		$row['TestCancel'] = NULL;
		$row['OutSource'] = NULL;
		$row['Printed'] = NULL;
		$row['PrintBy'] = NULL;
		$row['PrintDate'] = NULL;
		$row['BillingDate'] = NULL;
		$row['BilledBy'] = NULL;
		$row['Resulted'] = NULL;
		$row['ResultDate'] = NULL;
		$row['ResultedBy'] = NULL;
		$row['SampleDate'] = NULL;
		$row['SampleUser'] = NULL;
		$row['Sampled'] = NULL;
		$row['ReceivedDate'] = NULL;
		$row['ReceivedUser'] = NULL;
		$row['Recevied'] = NULL;
		$row['DeptRecvDate'] = NULL;
		$row['DeptRecvUser'] = NULL;
		$row['DeptRecived'] = NULL;
		$row['SAuthDate'] = NULL;
		$row['SAuthBy'] = NULL;
		$row['SAuthendicate'] = NULL;
		$row['AuthDate'] = NULL;
		$row['AuthBy'] = NULL;
		$row['Authencate'] = NULL;
		$row['EditDate'] = NULL;
		$row['EditBy'] = NULL;
		$row['Editted'] = NULL;
		$row['PatID'] = NULL;
		$row['PatientId'] = NULL;
		$row['Mobile'] = NULL;
		$row['CId'] = NULL;
		$row['Order'] = NULL;
		$row['Form'] = NULL;
		$row['ResType'] = NULL;
		$row['Sample'] = NULL;
		$row['NoD'] = NULL;
		$row['BillOrder'] = NULL;
		$row['Formula'] = NULL;
		$row['Inactive'] = NULL;
		$row['CollSample'] = NULL;
		$row['TestType'] = NULL;
		$row['Repeated'] = NULL;
		$row['RepeatedBy'] = NULL;
		$row['RepeatedDate'] = NULL;
		$row['serviceID'] = NULL;
		$row['Service_Type'] = NULL;
		$row['Service_Department'] = NULL;
		$row['RequestNo'] = NULL;
		return $row;
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
					$sqlWrk = $this->Services->Lookup->getSql(FALSE, $filterWrk, '', $this);
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
		} elseif ($this->RowType == ROWTYPE_EDIT) { // Edit row

			// Reception
			$this->Reception->EditAttrs["class"] = "form-control";
			$this->Reception->EditCustomAttributes = "";
			$this->Reception->EditValue = $this->Reception->CurrentValue;
			$this->Reception->EditValue = FormatNumber($this->Reception->EditValue, 0, -2, -2, -2);
			$this->Reception->ViewCustomAttributes = "";

			// Services
			$this->Services->EditAttrs["class"] = "form-control";
			$this->Services->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Services->CurrentValue = HtmlDecode($this->Services->CurrentValue);
			$this->Services->EditValue = HtmlEncode($this->Services->CurrentValue);
			$curVal = strval($this->Services->CurrentValue);
			if ($curVal <> "") {
				$this->Services->EditValue = $this->Services->lookupCacheOption($curVal);
				if ($this->Services->EditValue === NULL) { // Lookup from database
					$filterWrk = "`SERVICE`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->Services->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = HtmlEncode($rswrk->fields('df'));
						$this->Services->EditValue = $this->Services->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->Services->EditValue = HtmlEncode($this->Services->CurrentValue);
					}
				}
			} else {
				$this->Services->EditValue = NULL;
			}
			$this->Services->PlaceHolder = RemoveHtml($this->Services->caption());

			// amount
			$this->amount->EditAttrs["class"] = "form-control";
			$this->amount->EditCustomAttributes = "";
			$this->amount->EditValue = HtmlEncode($this->amount->CurrentValue);
			$this->amount->PlaceHolder = RemoveHtml($this->amount->caption());
			if (strval($this->amount->EditValue) <> "" && is_numeric($this->amount->EditValue))
				$this->amount->EditValue = FormatNumber($this->amount->EditValue, -2, -2, -2, -2);

			// description
			$this->description->EditAttrs["class"] = "form-control";
			$this->description->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->description->CurrentValue = HtmlDecode($this->description->CurrentValue);
			$this->description->EditValue = HtmlEncode($this->description->CurrentValue);
			$this->description->PlaceHolder = RemoveHtml($this->description->caption());

			// patient_type
			$this->patient_type->EditAttrs["class"] = "form-control";
			$this->patient_type->EditCustomAttributes = "";
			$this->patient_type->EditValue = HtmlEncode($this->patient_type->CurrentValue);
			$this->patient_type->PlaceHolder = RemoveHtml($this->patient_type->caption());

			// charged_date
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

			// createdby
			// createddatetime
			// modifiedby
			// modifieddatetime
			// mrnno

			$this->mrnno->EditAttrs["class"] = "form-control";
			$this->mrnno->EditCustomAttributes = "";
			$this->mrnno->EditValue = $this->mrnno->CurrentValue;
			$this->mrnno->ViewCustomAttributes = "";

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
			$this->profilePic->EditValue = HtmlEncode($this->profilePic->CurrentValue);
			$this->profilePic->PlaceHolder = RemoveHtml($this->profilePic->caption());

			// Unit
			$this->Unit->EditAttrs["class"] = "form-control";
			$this->Unit->EditCustomAttributes = "";
			$this->Unit->EditValue = HtmlEncode($this->Unit->CurrentValue);
			$this->Unit->PlaceHolder = RemoveHtml($this->Unit->caption());

			// Quantity
			$this->Quantity->EditAttrs["class"] = "form-control";
			$this->Quantity->EditCustomAttributes = "";
			$this->Quantity->EditValue = HtmlEncode($this->Quantity->CurrentValue);
			$this->Quantity->PlaceHolder = RemoveHtml($this->Quantity->caption());

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

			// ServiceSelect
			$this->ServiceSelect->EditCustomAttributes = "";
			$this->ServiceSelect->EditValue = $this->ServiceSelect->options(FALSE);

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

			// DrID
			$this->DrID->EditAttrs["class"] = "form-control";
			$this->DrID->EditCustomAttributes = "";
			$this->DrID->EditValue = HtmlEncode($this->DrID->CurrentValue);
			$this->DrID->PlaceHolder = RemoveHtml($this->DrID->caption());

			// DrCODE
			$this->DrCODE->EditAttrs["class"] = "form-control";
			$this->DrCODE->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->DrCODE->CurrentValue = HtmlDecode($this->DrCODE->CurrentValue);
			$this->DrCODE->EditValue = HtmlEncode($this->DrCODE->CurrentValue);
			$this->DrCODE->PlaceHolder = RemoveHtml($this->DrCODE->caption());

			// DrName
			$this->DrName->EditAttrs["class"] = "form-control";
			$this->DrName->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->DrName->CurrentValue = HtmlDecode($this->DrName->CurrentValue);
			$this->DrName->EditValue = HtmlEncode($this->DrName->CurrentValue);
			$this->DrName->PlaceHolder = RemoveHtml($this->DrName->caption());

			// Department
			$this->Department->EditAttrs["class"] = "form-control";
			$this->Department->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Department->CurrentValue = HtmlDecode($this->Department->CurrentValue);
			$this->Department->EditValue = HtmlEncode($this->Department->CurrentValue);
			$this->Department->PlaceHolder = RemoveHtml($this->Department->caption());

			// DrSharePres
			$this->DrSharePres->EditAttrs["class"] = "form-control";
			$this->DrSharePres->EditCustomAttributes = "";
			$this->DrSharePres->EditValue = HtmlEncode($this->DrSharePres->CurrentValue);
			$this->DrSharePres->PlaceHolder = RemoveHtml($this->DrSharePres->caption());
			if (strval($this->DrSharePres->EditValue) <> "" && is_numeric($this->DrSharePres->EditValue))
				$this->DrSharePres->EditValue = FormatNumber($this->DrSharePres->EditValue, -2, -2, -2, -2);

			// HospSharePres
			$this->HospSharePres->EditAttrs["class"] = "form-control";
			$this->HospSharePres->EditCustomAttributes = "";
			$this->HospSharePres->EditValue = HtmlEncode($this->HospSharePres->CurrentValue);
			$this->HospSharePres->PlaceHolder = RemoveHtml($this->HospSharePres->caption());
			if (strval($this->HospSharePres->EditValue) <> "" && is_numeric($this->HospSharePres->EditValue))
				$this->HospSharePres->EditValue = FormatNumber($this->HospSharePres->EditValue, -2, -2, -2, -2);

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

			// DrShareSettiledAmount
			$this->DrShareSettiledAmount->EditAttrs["class"] = "form-control";
			$this->DrShareSettiledAmount->EditCustomAttributes = "";
			$this->DrShareSettiledAmount->EditValue = HtmlEncode($this->DrShareSettiledAmount->CurrentValue);
			$this->DrShareSettiledAmount->PlaceHolder = RemoveHtml($this->DrShareSettiledAmount->caption());
			if (strval($this->DrShareSettiledAmount->EditValue) <> "" && is_numeric($this->DrShareSettiledAmount->EditValue))
				$this->DrShareSettiledAmount->EditValue = FormatNumber($this->DrShareSettiledAmount->EditValue, -2, -2, -2, -2);

			// DrShareSettledId
			$this->DrShareSettledId->EditAttrs["class"] = "form-control";
			$this->DrShareSettledId->EditCustomAttributes = "";
			$this->DrShareSettledId->EditValue = HtmlEncode($this->DrShareSettledId->CurrentValue);
			$this->DrShareSettledId->PlaceHolder = RemoveHtml($this->DrShareSettledId->caption());

			// DrShareSettiledStatus
			$this->DrShareSettiledStatus->EditAttrs["class"] = "form-control";
			$this->DrShareSettiledStatus->EditCustomAttributes = "";
			$this->DrShareSettiledStatus->EditValue = HtmlEncode($this->DrShareSettiledStatus->CurrentValue);
			$this->DrShareSettiledStatus->PlaceHolder = RemoveHtml($this->DrShareSettiledStatus->caption());

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

			// HospID
			// RIDNO

			$this->RIDNO->EditAttrs["class"] = "form-control";
			$this->RIDNO->EditCustomAttributes = "";
			$this->RIDNO->EditValue = $this->RIDNO->CurrentValue;
			$this->RIDNO->EditValue = FormatNumber($this->RIDNO->EditValue, 0, -2, -2, -2);
			$this->RIDNO->ViewCustomAttributes = "";

			// TidNo
			$this->TidNo->EditAttrs["class"] = "form-control";
			$this->TidNo->EditCustomAttributes = "";
			$this->TidNo->EditValue = $this->TidNo->CurrentValue;
			$this->TidNo->EditValue = FormatNumber($this->TidNo->EditValue, 0, -2, -2, -2);
			$this->TidNo->ViewCustomAttributes = "";

			// DiscountCategory
			$this->DiscountCategory->EditAttrs["class"] = "form-control";
			$this->DiscountCategory->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->DiscountCategory->CurrentValue = HtmlDecode($this->DiscountCategory->CurrentValue);
			$this->DiscountCategory->EditValue = HtmlEncode($this->DiscountCategory->CurrentValue);
			$this->DiscountCategory->PlaceHolder = RemoveHtml($this->DiscountCategory->caption());

			// sid
			$this->sid->EditAttrs["class"] = "form-control";
			$this->sid->EditCustomAttributes = "";
			$this->sid->EditValue = HtmlEncode($this->sid->CurrentValue);
			$this->sid->PlaceHolder = RemoveHtml($this->sid->caption());

			// ItemCode
			$this->ItemCode->EditAttrs["class"] = "form-control";
			$this->ItemCode->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->ItemCode->CurrentValue = HtmlDecode($this->ItemCode->CurrentValue);
			$this->ItemCode->EditValue = HtmlEncode($this->ItemCode->CurrentValue);
			$this->ItemCode->PlaceHolder = RemoveHtml($this->ItemCode->caption());

			// TestSubCd
			$this->TestSubCd->EditAttrs["class"] = "form-control";
			$this->TestSubCd->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->TestSubCd->CurrentValue = HtmlDecode($this->TestSubCd->CurrentValue);
			$this->TestSubCd->EditValue = HtmlEncode($this->TestSubCd->CurrentValue);
			$this->TestSubCd->PlaceHolder = RemoveHtml($this->TestSubCd->caption());

			// DEptCd
			$this->DEptCd->EditAttrs["class"] = "form-control";
			$this->DEptCd->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->DEptCd->CurrentValue = HtmlDecode($this->DEptCd->CurrentValue);
			$this->DEptCd->EditValue = HtmlEncode($this->DEptCd->CurrentValue);
			$this->DEptCd->PlaceHolder = RemoveHtml($this->DEptCd->caption());

			// ProfCd
			$this->ProfCd->EditAttrs["class"] = "form-control";
			$this->ProfCd->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->ProfCd->CurrentValue = HtmlDecode($this->ProfCd->CurrentValue);
			$this->ProfCd->EditValue = HtmlEncode($this->ProfCd->CurrentValue);
			$this->ProfCd->PlaceHolder = RemoveHtml($this->ProfCd->caption());

			// LabReport
			$this->LabReport->EditAttrs["class"] = "form-control";
			$this->LabReport->EditCustomAttributes = "";
			$this->LabReport->EditValue = HtmlEncode($this->LabReport->CurrentValue);
			$this->LabReport->PlaceHolder = RemoveHtml($this->LabReport->caption());

			// Comments
			$this->Comments->EditAttrs["class"] = "form-control";
			$this->Comments->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Comments->CurrentValue = HtmlDecode($this->Comments->CurrentValue);
			$this->Comments->EditValue = HtmlEncode($this->Comments->CurrentValue);
			$this->Comments->PlaceHolder = RemoveHtml($this->Comments->caption());

			// Method
			$this->Method->EditAttrs["class"] = "form-control";
			$this->Method->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Method->CurrentValue = HtmlDecode($this->Method->CurrentValue);
			$this->Method->EditValue = HtmlEncode($this->Method->CurrentValue);
			$this->Method->PlaceHolder = RemoveHtml($this->Method->caption());

			// Specimen
			$this->Specimen->EditAttrs["class"] = "form-control";
			$this->Specimen->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Specimen->CurrentValue = HtmlDecode($this->Specimen->CurrentValue);
			$this->Specimen->EditValue = HtmlEncode($this->Specimen->CurrentValue);
			$this->Specimen->PlaceHolder = RemoveHtml($this->Specimen->caption());

			// Abnormal
			$this->Abnormal->EditAttrs["class"] = "form-control";
			$this->Abnormal->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Abnormal->CurrentValue = HtmlDecode($this->Abnormal->CurrentValue);
			$this->Abnormal->EditValue = HtmlEncode($this->Abnormal->CurrentValue);
			$this->Abnormal->PlaceHolder = RemoveHtml($this->Abnormal->caption());

			// RefValue
			$this->RefValue->EditAttrs["class"] = "form-control";
			$this->RefValue->EditCustomAttributes = "";
			$this->RefValue->EditValue = HtmlEncode($this->RefValue->CurrentValue);
			$this->RefValue->PlaceHolder = RemoveHtml($this->RefValue->caption());

			// TestUnit
			$this->TestUnit->EditAttrs["class"] = "form-control";
			$this->TestUnit->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->TestUnit->CurrentValue = HtmlDecode($this->TestUnit->CurrentValue);
			$this->TestUnit->EditValue = HtmlEncode($this->TestUnit->CurrentValue);
			$this->TestUnit->PlaceHolder = RemoveHtml($this->TestUnit->caption());

			// LOWHIGH
			$this->LOWHIGH->EditAttrs["class"] = "form-control";
			$this->LOWHIGH->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->LOWHIGH->CurrentValue = HtmlDecode($this->LOWHIGH->CurrentValue);
			$this->LOWHIGH->EditValue = HtmlEncode($this->LOWHIGH->CurrentValue);
			$this->LOWHIGH->PlaceHolder = RemoveHtml($this->LOWHIGH->caption());

			// Branch
			$this->Branch->EditAttrs["class"] = "form-control";
			$this->Branch->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Branch->CurrentValue = HtmlDecode($this->Branch->CurrentValue);
			$this->Branch->EditValue = HtmlEncode($this->Branch->CurrentValue);
			$this->Branch->PlaceHolder = RemoveHtml($this->Branch->caption());

			// Dispatch
			$this->Dispatch->EditAttrs["class"] = "form-control";
			$this->Dispatch->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Dispatch->CurrentValue = HtmlDecode($this->Dispatch->CurrentValue);
			$this->Dispatch->EditValue = HtmlEncode($this->Dispatch->CurrentValue);
			$this->Dispatch->PlaceHolder = RemoveHtml($this->Dispatch->caption());

			// Pic1
			$this->Pic1->EditAttrs["class"] = "form-control";
			$this->Pic1->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Pic1->CurrentValue = HtmlDecode($this->Pic1->CurrentValue);
			$this->Pic1->EditValue = HtmlEncode($this->Pic1->CurrentValue);
			$this->Pic1->PlaceHolder = RemoveHtml($this->Pic1->caption());

			// Pic2
			$this->Pic2->EditAttrs["class"] = "form-control";
			$this->Pic2->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Pic2->CurrentValue = HtmlDecode($this->Pic2->CurrentValue);
			$this->Pic2->EditValue = HtmlEncode($this->Pic2->CurrentValue);
			$this->Pic2->PlaceHolder = RemoveHtml($this->Pic2->caption());

			// GraphPath
			$this->GraphPath->EditAttrs["class"] = "form-control";
			$this->GraphPath->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->GraphPath->CurrentValue = HtmlDecode($this->GraphPath->CurrentValue);
			$this->GraphPath->EditValue = HtmlEncode($this->GraphPath->CurrentValue);
			$this->GraphPath->PlaceHolder = RemoveHtml($this->GraphPath->caption());

			// MachineCD
			$this->MachineCD->EditAttrs["class"] = "form-control";
			$this->MachineCD->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->MachineCD->CurrentValue = HtmlDecode($this->MachineCD->CurrentValue);
			$this->MachineCD->EditValue = HtmlEncode($this->MachineCD->CurrentValue);
			$this->MachineCD->PlaceHolder = RemoveHtml($this->MachineCD->caption());

			// TestCancel
			$this->TestCancel->EditAttrs["class"] = "form-control";
			$this->TestCancel->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->TestCancel->CurrentValue = HtmlDecode($this->TestCancel->CurrentValue);
			$this->TestCancel->EditValue = HtmlEncode($this->TestCancel->CurrentValue);
			$this->TestCancel->PlaceHolder = RemoveHtml($this->TestCancel->caption());

			// OutSource
			$this->OutSource->EditAttrs["class"] = "form-control";
			$this->OutSource->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->OutSource->CurrentValue = HtmlDecode($this->OutSource->CurrentValue);
			$this->OutSource->EditValue = HtmlEncode($this->OutSource->CurrentValue);
			$this->OutSource->PlaceHolder = RemoveHtml($this->OutSource->caption());

			// Printed
			$this->Printed->EditAttrs["class"] = "form-control";
			$this->Printed->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Printed->CurrentValue = HtmlDecode($this->Printed->CurrentValue);
			$this->Printed->EditValue = HtmlEncode($this->Printed->CurrentValue);
			$this->Printed->PlaceHolder = RemoveHtml($this->Printed->caption());

			// PrintBy
			$this->PrintBy->EditAttrs["class"] = "form-control";
			$this->PrintBy->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->PrintBy->CurrentValue = HtmlDecode($this->PrintBy->CurrentValue);
			$this->PrintBy->EditValue = HtmlEncode($this->PrintBy->CurrentValue);
			$this->PrintBy->PlaceHolder = RemoveHtml($this->PrintBy->caption());

			// PrintDate
			$this->PrintDate->EditAttrs["class"] = "form-control";
			$this->PrintDate->EditCustomAttributes = "";
			$this->PrintDate->EditValue = HtmlEncode(FormatDateTime($this->PrintDate->CurrentValue, 8));
			$this->PrintDate->PlaceHolder = RemoveHtml($this->PrintDate->caption());

			// BillingDate
			$this->BillingDate->EditAttrs["class"] = "form-control";
			$this->BillingDate->EditCustomAttributes = "";
			$this->BillingDate->EditValue = HtmlEncode(FormatDateTime($this->BillingDate->CurrentValue, 8));
			$this->BillingDate->PlaceHolder = RemoveHtml($this->BillingDate->caption());

			// BilledBy
			$this->BilledBy->EditAttrs["class"] = "form-control";
			$this->BilledBy->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->BilledBy->CurrentValue = HtmlDecode($this->BilledBy->CurrentValue);
			$this->BilledBy->EditValue = HtmlEncode($this->BilledBy->CurrentValue);
			$this->BilledBy->PlaceHolder = RemoveHtml($this->BilledBy->caption());

			// Resulted
			$this->Resulted->EditAttrs["class"] = "form-control";
			$this->Resulted->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Resulted->CurrentValue = HtmlDecode($this->Resulted->CurrentValue);
			$this->Resulted->EditValue = HtmlEncode($this->Resulted->CurrentValue);
			$this->Resulted->PlaceHolder = RemoveHtml($this->Resulted->caption());

			// ResultDate
			$this->ResultDate->EditAttrs["class"] = "form-control";
			$this->ResultDate->EditCustomAttributes = "";
			$this->ResultDate->EditValue = HtmlEncode(FormatDateTime($this->ResultDate->CurrentValue, 8));
			$this->ResultDate->PlaceHolder = RemoveHtml($this->ResultDate->caption());

			// ResultedBy
			$this->ResultedBy->EditAttrs["class"] = "form-control";
			$this->ResultedBy->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->ResultedBy->CurrentValue = HtmlDecode($this->ResultedBy->CurrentValue);
			$this->ResultedBy->EditValue = HtmlEncode($this->ResultedBy->CurrentValue);
			$this->ResultedBy->PlaceHolder = RemoveHtml($this->ResultedBy->caption());

			// SampleDate
			$this->SampleDate->EditAttrs["class"] = "form-control";
			$this->SampleDate->EditCustomAttributes = "";
			$this->SampleDate->EditValue = HtmlEncode(FormatDateTime($this->SampleDate->CurrentValue, 8));
			$this->SampleDate->PlaceHolder = RemoveHtml($this->SampleDate->caption());

			// SampleUser
			$this->SampleUser->EditAttrs["class"] = "form-control";
			$this->SampleUser->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->SampleUser->CurrentValue = HtmlDecode($this->SampleUser->CurrentValue);
			$this->SampleUser->EditValue = HtmlEncode($this->SampleUser->CurrentValue);
			$this->SampleUser->PlaceHolder = RemoveHtml($this->SampleUser->caption());

			// Sampled
			$this->Sampled->EditAttrs["class"] = "form-control";
			$this->Sampled->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Sampled->CurrentValue = HtmlDecode($this->Sampled->CurrentValue);
			$this->Sampled->EditValue = HtmlEncode($this->Sampled->CurrentValue);
			$this->Sampled->PlaceHolder = RemoveHtml($this->Sampled->caption());

			// ReceivedDate
			$this->ReceivedDate->EditAttrs["class"] = "form-control";
			$this->ReceivedDate->EditCustomAttributes = "";
			$this->ReceivedDate->EditValue = HtmlEncode(FormatDateTime($this->ReceivedDate->CurrentValue, 8));
			$this->ReceivedDate->PlaceHolder = RemoveHtml($this->ReceivedDate->caption());

			// ReceivedUser
			$this->ReceivedUser->EditAttrs["class"] = "form-control";
			$this->ReceivedUser->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->ReceivedUser->CurrentValue = HtmlDecode($this->ReceivedUser->CurrentValue);
			$this->ReceivedUser->EditValue = HtmlEncode($this->ReceivedUser->CurrentValue);
			$this->ReceivedUser->PlaceHolder = RemoveHtml($this->ReceivedUser->caption());

			// Recevied
			$this->Recevied->EditAttrs["class"] = "form-control";
			$this->Recevied->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Recevied->CurrentValue = HtmlDecode($this->Recevied->CurrentValue);
			$this->Recevied->EditValue = HtmlEncode($this->Recevied->CurrentValue);
			$this->Recevied->PlaceHolder = RemoveHtml($this->Recevied->caption());

			// DeptRecvDate
			$this->DeptRecvDate->EditAttrs["class"] = "form-control";
			$this->DeptRecvDate->EditCustomAttributes = "";
			$this->DeptRecvDate->EditValue = HtmlEncode(FormatDateTime($this->DeptRecvDate->CurrentValue, 8));
			$this->DeptRecvDate->PlaceHolder = RemoveHtml($this->DeptRecvDate->caption());

			// DeptRecvUser
			$this->DeptRecvUser->EditAttrs["class"] = "form-control";
			$this->DeptRecvUser->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->DeptRecvUser->CurrentValue = HtmlDecode($this->DeptRecvUser->CurrentValue);
			$this->DeptRecvUser->EditValue = HtmlEncode($this->DeptRecvUser->CurrentValue);
			$this->DeptRecvUser->PlaceHolder = RemoveHtml($this->DeptRecvUser->caption());

			// DeptRecived
			$this->DeptRecived->EditAttrs["class"] = "form-control";
			$this->DeptRecived->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->DeptRecived->CurrentValue = HtmlDecode($this->DeptRecived->CurrentValue);
			$this->DeptRecived->EditValue = HtmlEncode($this->DeptRecived->CurrentValue);
			$this->DeptRecived->PlaceHolder = RemoveHtml($this->DeptRecived->caption());

			// SAuthDate
			$this->SAuthDate->EditAttrs["class"] = "form-control";
			$this->SAuthDate->EditCustomAttributes = "";
			$this->SAuthDate->EditValue = HtmlEncode(FormatDateTime($this->SAuthDate->CurrentValue, 8));
			$this->SAuthDate->PlaceHolder = RemoveHtml($this->SAuthDate->caption());

			// SAuthBy
			$this->SAuthBy->EditAttrs["class"] = "form-control";
			$this->SAuthBy->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->SAuthBy->CurrentValue = HtmlDecode($this->SAuthBy->CurrentValue);
			$this->SAuthBy->EditValue = HtmlEncode($this->SAuthBy->CurrentValue);
			$this->SAuthBy->PlaceHolder = RemoveHtml($this->SAuthBy->caption());

			// SAuthendicate
			$this->SAuthendicate->EditAttrs["class"] = "form-control";
			$this->SAuthendicate->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->SAuthendicate->CurrentValue = HtmlDecode($this->SAuthendicate->CurrentValue);
			$this->SAuthendicate->EditValue = HtmlEncode($this->SAuthendicate->CurrentValue);
			$this->SAuthendicate->PlaceHolder = RemoveHtml($this->SAuthendicate->caption());

			// AuthDate
			$this->AuthDate->EditAttrs["class"] = "form-control";
			$this->AuthDate->EditCustomAttributes = "";
			$this->AuthDate->EditValue = HtmlEncode(FormatDateTime($this->AuthDate->CurrentValue, 8));
			$this->AuthDate->PlaceHolder = RemoveHtml($this->AuthDate->caption());

			// AuthBy
			$this->AuthBy->EditAttrs["class"] = "form-control";
			$this->AuthBy->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->AuthBy->CurrentValue = HtmlDecode($this->AuthBy->CurrentValue);
			$this->AuthBy->EditValue = HtmlEncode($this->AuthBy->CurrentValue);
			$this->AuthBy->PlaceHolder = RemoveHtml($this->AuthBy->caption());

			// Authencate
			$this->Authencate->EditAttrs["class"] = "form-control";
			$this->Authencate->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Authencate->CurrentValue = HtmlDecode($this->Authencate->CurrentValue);
			$this->Authencate->EditValue = HtmlEncode($this->Authencate->CurrentValue);
			$this->Authencate->PlaceHolder = RemoveHtml($this->Authencate->caption());

			// EditDate
			$this->EditDate->EditAttrs["class"] = "form-control";
			$this->EditDate->EditCustomAttributes = "";
			$this->EditDate->EditValue = HtmlEncode(FormatDateTime($this->EditDate->CurrentValue, 8));
			$this->EditDate->PlaceHolder = RemoveHtml($this->EditDate->caption());

			// EditBy
			$this->EditBy->EditAttrs["class"] = "form-control";
			$this->EditBy->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->EditBy->CurrentValue = HtmlDecode($this->EditBy->CurrentValue);
			$this->EditBy->EditValue = HtmlEncode($this->EditBy->CurrentValue);
			$this->EditBy->PlaceHolder = RemoveHtml($this->EditBy->caption());

			// Editted
			$this->Editted->EditAttrs["class"] = "form-control";
			$this->Editted->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Editted->CurrentValue = HtmlDecode($this->Editted->CurrentValue);
			$this->Editted->EditValue = HtmlEncode($this->Editted->CurrentValue);
			$this->Editted->PlaceHolder = RemoveHtml($this->Editted->caption());

			// PatID
			$this->PatID->EditAttrs["class"] = "form-control";
			$this->PatID->EditCustomAttributes = "";
			if ($this->PatID->getSessionValue() <> "") {
				$this->PatID->CurrentValue = $this->PatID->getSessionValue();
			$this->PatID->ViewValue = $this->PatID->CurrentValue;
			$this->PatID->ViewValue = FormatNumber($this->PatID->ViewValue, 0, -2, -2, -2);
			$this->PatID->ViewCustomAttributes = "";
			} else {
			$this->PatID->EditValue = HtmlEncode($this->PatID->CurrentValue);
			$this->PatID->PlaceHolder = RemoveHtml($this->PatID->caption());
			}

			// PatientId
			$this->PatientId->EditAttrs["class"] = "form-control";
			$this->PatientId->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->PatientId->CurrentValue = HtmlDecode($this->PatientId->CurrentValue);
			$this->PatientId->EditValue = HtmlEncode($this->PatientId->CurrentValue);
			$this->PatientId->PlaceHolder = RemoveHtml($this->PatientId->caption());

			// Mobile
			$this->Mobile->EditAttrs["class"] = "form-control";
			$this->Mobile->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Mobile->CurrentValue = HtmlDecode($this->Mobile->CurrentValue);
			$this->Mobile->EditValue = HtmlEncode($this->Mobile->CurrentValue);
			$this->Mobile->PlaceHolder = RemoveHtml($this->Mobile->caption());

			// CId
			$this->CId->EditAttrs["class"] = "form-control";
			$this->CId->EditCustomAttributes = "";
			$this->CId->EditValue = HtmlEncode($this->CId->CurrentValue);
			$this->CId->PlaceHolder = RemoveHtml($this->CId->caption());

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
			$this->Inactive->EditAttrs["class"] = "form-control";
			$this->Inactive->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Inactive->CurrentValue = HtmlDecode($this->Inactive->CurrentValue);
			$this->Inactive->EditValue = HtmlEncode($this->Inactive->CurrentValue);
			$this->Inactive->PlaceHolder = RemoveHtml($this->Inactive->caption());

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
			if (REMOVE_XSS)
				$this->TestType->CurrentValue = HtmlDecode($this->TestType->CurrentValue);
			$this->TestType->EditValue = HtmlEncode($this->TestType->CurrentValue);
			$this->TestType->PlaceHolder = RemoveHtml($this->TestType->caption());

			// Repeated
			$this->Repeated->EditAttrs["class"] = "form-control";
			$this->Repeated->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Repeated->CurrentValue = HtmlDecode($this->Repeated->CurrentValue);
			$this->Repeated->EditValue = HtmlEncode($this->Repeated->CurrentValue);
			$this->Repeated->PlaceHolder = RemoveHtml($this->Repeated->caption());

			// RepeatedBy
			$this->RepeatedBy->EditAttrs["class"] = "form-control";
			$this->RepeatedBy->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->RepeatedBy->CurrentValue = HtmlDecode($this->RepeatedBy->CurrentValue);
			$this->RepeatedBy->EditValue = HtmlEncode($this->RepeatedBy->CurrentValue);
			$this->RepeatedBy->PlaceHolder = RemoveHtml($this->RepeatedBy->caption());

			// RepeatedDate
			$this->RepeatedDate->EditAttrs["class"] = "form-control";
			$this->RepeatedDate->EditCustomAttributes = "";
			$this->RepeatedDate->EditValue = HtmlEncode(FormatDateTime($this->RepeatedDate->CurrentValue, 8));
			$this->RepeatedDate->PlaceHolder = RemoveHtml($this->RepeatedDate->caption());

			// serviceID
			$this->serviceID->EditAttrs["class"] = "form-control";
			$this->serviceID->EditCustomAttributes = "";
			$this->serviceID->EditValue = HtmlEncode($this->serviceID->CurrentValue);
			$this->serviceID->PlaceHolder = RemoveHtml($this->serviceID->caption());

			// Service_Type
			$this->Service_Type->EditAttrs["class"] = "form-control";
			$this->Service_Type->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Service_Type->CurrentValue = HtmlDecode($this->Service_Type->CurrentValue);
			$this->Service_Type->EditValue = HtmlEncode($this->Service_Type->CurrentValue);
			$this->Service_Type->PlaceHolder = RemoveHtml($this->Service_Type->caption());

			// Service_Department
			$this->Service_Department->EditAttrs["class"] = "form-control";
			$this->Service_Department->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Service_Department->CurrentValue = HtmlDecode($this->Service_Department->CurrentValue);
			$this->Service_Department->EditValue = HtmlEncode($this->Service_Department->CurrentValue);
			$this->Service_Department->PlaceHolder = RemoveHtml($this->Service_Department->caption());

			// RequestNo
			$this->RequestNo->EditAttrs["class"] = "form-control";
			$this->RequestNo->EditCustomAttributes = "";
			$this->RequestNo->EditValue = HtmlEncode($this->RequestNo->CurrentValue);
			$this->RequestNo->PlaceHolder = RemoveHtml($this->RequestNo->caption());

			// Edit refer script
			// Reception

			$this->Reception->LinkCustomAttributes = "";
			$this->Reception->HrefValue = "";
			$this->Reception->TooltipValue = "";

			// Services
			$this->Services->LinkCustomAttributes = "";
			$this->Services->HrefValue = "";

			// amount
			$this->amount->LinkCustomAttributes = "";
			$this->amount->HrefValue = "";

			// description
			$this->description->LinkCustomAttributes = "";
			$this->description->HrefValue = "";

			// patient_type
			$this->patient_type->LinkCustomAttributes = "";
			$this->patient_type->HrefValue = "";

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

			// Age
			$this->Age->LinkCustomAttributes = "";
			$this->Age->HrefValue = "";

			// Gender
			$this->Gender->LinkCustomAttributes = "";
			$this->Gender->HrefValue = "";

			// profilePic
			$this->profilePic->LinkCustomAttributes = "";
			$this->profilePic->HrefValue = "";

			// Unit
			$this->Unit->LinkCustomAttributes = "";
			$this->Unit->HrefValue = "";

			// Quantity
			$this->Quantity->LinkCustomAttributes = "";
			$this->Quantity->HrefValue = "";

			// Discount
			$this->Discount->LinkCustomAttributes = "";
			$this->Discount->HrefValue = "";

			// SubTotal
			$this->SubTotal->LinkCustomAttributes = "";
			$this->SubTotal->HrefValue = "";

			// ServiceSelect
			$this->ServiceSelect->LinkCustomAttributes = "";
			$this->ServiceSelect->HrefValue = "";

			// Aid
			$this->Aid->LinkCustomAttributes = "";
			$this->Aid->HrefValue = "";

			// Vid
			$this->Vid->LinkCustomAttributes = "";
			$this->Vid->HrefValue = "";

			// DrID
			$this->DrID->LinkCustomAttributes = "";
			$this->DrID->HrefValue = "";

			// DrCODE
			$this->DrCODE->LinkCustomAttributes = "";
			$this->DrCODE->HrefValue = "";

			// DrName
			$this->DrName->LinkCustomAttributes = "";
			$this->DrName->HrefValue = "";

			// Department
			$this->Department->LinkCustomAttributes = "";
			$this->Department->HrefValue = "";

			// DrSharePres
			$this->DrSharePres->LinkCustomAttributes = "";
			$this->DrSharePres->HrefValue = "";

			// HospSharePres
			$this->HospSharePres->LinkCustomAttributes = "";
			$this->HospSharePres->HrefValue = "";

			// DrShareAmount
			$this->DrShareAmount->LinkCustomAttributes = "";
			$this->DrShareAmount->HrefValue = "";

			// HospShareAmount
			$this->HospShareAmount->LinkCustomAttributes = "";
			$this->HospShareAmount->HrefValue = "";

			// DrShareSettiledAmount
			$this->DrShareSettiledAmount->LinkCustomAttributes = "";
			$this->DrShareSettiledAmount->HrefValue = "";

			// DrShareSettledId
			$this->DrShareSettledId->LinkCustomAttributes = "";
			$this->DrShareSettledId->HrefValue = "";

			// DrShareSettiledStatus
			$this->DrShareSettiledStatus->LinkCustomAttributes = "";
			$this->DrShareSettiledStatus->HrefValue = "";

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

			// sid
			$this->sid->LinkCustomAttributes = "";
			$this->sid->HrefValue = "";

			// ItemCode
			$this->ItemCode->LinkCustomAttributes = "";
			$this->ItemCode->HrefValue = "";

			// TestSubCd
			$this->TestSubCd->LinkCustomAttributes = "";
			$this->TestSubCd->HrefValue = "";

			// DEptCd
			$this->DEptCd->LinkCustomAttributes = "";
			$this->DEptCd->HrefValue = "";

			// ProfCd
			$this->ProfCd->LinkCustomAttributes = "";
			$this->ProfCd->HrefValue = "";

			// LabReport
			$this->LabReport->LinkCustomAttributes = "";
			$this->LabReport->HrefValue = "";

			// Comments
			$this->Comments->LinkCustomAttributes = "";
			$this->Comments->HrefValue = "";

			// Method
			$this->Method->LinkCustomAttributes = "";
			$this->Method->HrefValue = "";

			// Specimen
			$this->Specimen->LinkCustomAttributes = "";
			$this->Specimen->HrefValue = "";

			// Abnormal
			$this->Abnormal->LinkCustomAttributes = "";
			$this->Abnormal->HrefValue = "";

			// RefValue
			$this->RefValue->LinkCustomAttributes = "";
			$this->RefValue->HrefValue = "";

			// TestUnit
			$this->TestUnit->LinkCustomAttributes = "";
			$this->TestUnit->HrefValue = "";

			// LOWHIGH
			$this->LOWHIGH->LinkCustomAttributes = "";
			$this->LOWHIGH->HrefValue = "";

			// Branch
			$this->Branch->LinkCustomAttributes = "";
			$this->Branch->HrefValue = "";

			// Dispatch
			$this->Dispatch->LinkCustomAttributes = "";
			$this->Dispatch->HrefValue = "";

			// Pic1
			$this->Pic1->LinkCustomAttributes = "";
			$this->Pic1->HrefValue = "";

			// Pic2
			$this->Pic2->LinkCustomAttributes = "";
			$this->Pic2->HrefValue = "";

			// GraphPath
			$this->GraphPath->LinkCustomAttributes = "";
			$this->GraphPath->HrefValue = "";

			// MachineCD
			$this->MachineCD->LinkCustomAttributes = "";
			$this->MachineCD->HrefValue = "";

			// TestCancel
			$this->TestCancel->LinkCustomAttributes = "";
			$this->TestCancel->HrefValue = "";

			// OutSource
			$this->OutSource->LinkCustomAttributes = "";
			$this->OutSource->HrefValue = "";

			// Printed
			$this->Printed->LinkCustomAttributes = "";
			$this->Printed->HrefValue = "";

			// PrintBy
			$this->PrintBy->LinkCustomAttributes = "";
			$this->PrintBy->HrefValue = "";

			// PrintDate
			$this->PrintDate->LinkCustomAttributes = "";
			$this->PrintDate->HrefValue = "";

			// BillingDate
			$this->BillingDate->LinkCustomAttributes = "";
			$this->BillingDate->HrefValue = "";

			// BilledBy
			$this->BilledBy->LinkCustomAttributes = "";
			$this->BilledBy->HrefValue = "";

			// Resulted
			$this->Resulted->LinkCustomAttributes = "";
			$this->Resulted->HrefValue = "";

			// ResultDate
			$this->ResultDate->LinkCustomAttributes = "";
			$this->ResultDate->HrefValue = "";

			// ResultedBy
			$this->ResultedBy->LinkCustomAttributes = "";
			$this->ResultedBy->HrefValue = "";

			// SampleDate
			$this->SampleDate->LinkCustomAttributes = "";
			$this->SampleDate->HrefValue = "";

			// SampleUser
			$this->SampleUser->LinkCustomAttributes = "";
			$this->SampleUser->HrefValue = "";

			// Sampled
			$this->Sampled->LinkCustomAttributes = "";
			$this->Sampled->HrefValue = "";

			// ReceivedDate
			$this->ReceivedDate->LinkCustomAttributes = "";
			$this->ReceivedDate->HrefValue = "";

			// ReceivedUser
			$this->ReceivedUser->LinkCustomAttributes = "";
			$this->ReceivedUser->HrefValue = "";

			// Recevied
			$this->Recevied->LinkCustomAttributes = "";
			$this->Recevied->HrefValue = "";

			// DeptRecvDate
			$this->DeptRecvDate->LinkCustomAttributes = "";
			$this->DeptRecvDate->HrefValue = "";

			// DeptRecvUser
			$this->DeptRecvUser->LinkCustomAttributes = "";
			$this->DeptRecvUser->HrefValue = "";

			// DeptRecived
			$this->DeptRecived->LinkCustomAttributes = "";
			$this->DeptRecived->HrefValue = "";

			// SAuthDate
			$this->SAuthDate->LinkCustomAttributes = "";
			$this->SAuthDate->HrefValue = "";

			// SAuthBy
			$this->SAuthBy->LinkCustomAttributes = "";
			$this->SAuthBy->HrefValue = "";

			// SAuthendicate
			$this->SAuthendicate->LinkCustomAttributes = "";
			$this->SAuthendicate->HrefValue = "";

			// AuthDate
			$this->AuthDate->LinkCustomAttributes = "";
			$this->AuthDate->HrefValue = "";

			// AuthBy
			$this->AuthBy->LinkCustomAttributes = "";
			$this->AuthBy->HrefValue = "";

			// Authencate
			$this->Authencate->LinkCustomAttributes = "";
			$this->Authencate->HrefValue = "";

			// EditDate
			$this->EditDate->LinkCustomAttributes = "";
			$this->EditDate->HrefValue = "";

			// EditBy
			$this->EditBy->LinkCustomAttributes = "";
			$this->EditBy->HrefValue = "";

			// Editted
			$this->Editted->LinkCustomAttributes = "";
			$this->Editted->HrefValue = "";

			// PatID
			$this->PatID->LinkCustomAttributes = "";
			$this->PatID->HrefValue = "";

			// PatientId
			$this->PatientId->LinkCustomAttributes = "";
			$this->PatientId->HrefValue = "";

			// Mobile
			$this->Mobile->LinkCustomAttributes = "";
			$this->Mobile->HrefValue = "";

			// CId
			$this->CId->LinkCustomAttributes = "";
			$this->CId->HrefValue = "";

			// Order
			$this->Order->LinkCustomAttributes = "";
			$this->Order->HrefValue = "";

			// Form
			$this->Form->LinkCustomAttributes = "";
			$this->Form->HrefValue = "";

			// ResType
			$this->ResType->LinkCustomAttributes = "";
			$this->ResType->HrefValue = "";

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

			// CollSample
			$this->CollSample->LinkCustomAttributes = "";
			$this->CollSample->HrefValue = "";

			// TestType
			$this->TestType->LinkCustomAttributes = "";
			$this->TestType->HrefValue = "";

			// Repeated
			$this->Repeated->LinkCustomAttributes = "";
			$this->Repeated->HrefValue = "";

			// RepeatedBy
			$this->RepeatedBy->LinkCustomAttributes = "";
			$this->RepeatedBy->HrefValue = "";

			// RepeatedDate
			$this->RepeatedDate->LinkCustomAttributes = "";
			$this->RepeatedDate->HrefValue = "";

			// serviceID
			$this->serviceID->LinkCustomAttributes = "";
			$this->serviceID->HrefValue = "";

			// Service_Type
			$this->Service_Type->LinkCustomAttributes = "";
			$this->Service_Type->HrefValue = "";

			// Service_Department
			$this->Service_Department->LinkCustomAttributes = "";
			$this->Service_Department->HrefValue = "";

			// RequestNo
			$this->RequestNo->LinkCustomAttributes = "";
			$this->RequestNo->HrefValue = "";
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
		$updateCnt = 0;
		if ($this->Reception->MultiUpdate == "1")
			$updateCnt++;
		if ($this->Services->MultiUpdate == "1")
			$updateCnt++;
		if ($this->amount->MultiUpdate == "1")
			$updateCnt++;
		if ($this->description->MultiUpdate == "1")
			$updateCnt++;
		if ($this->patient_type->MultiUpdate == "1")
			$updateCnt++;
		if ($this->charged_date->MultiUpdate == "1")
			$updateCnt++;
		if ($this->status->MultiUpdate == "1")
			$updateCnt++;
		if ($this->createdby->MultiUpdate == "1")
			$updateCnt++;
		if ($this->createddatetime->MultiUpdate == "1")
			$updateCnt++;
		if ($this->modifiedby->MultiUpdate == "1")
			$updateCnt++;
		if ($this->modifieddatetime->MultiUpdate == "1")
			$updateCnt++;
		if ($this->mrnno->MultiUpdate == "1")
			$updateCnt++;
		if ($this->PatientName->MultiUpdate == "1")
			$updateCnt++;
		if ($this->Age->MultiUpdate == "1")
			$updateCnt++;
		if ($this->Gender->MultiUpdate == "1")
			$updateCnt++;
		if ($this->profilePic->MultiUpdate == "1")
			$updateCnt++;
		if ($this->Unit->MultiUpdate == "1")
			$updateCnt++;
		if ($this->Quantity->MultiUpdate == "1")
			$updateCnt++;
		if ($this->Discount->MultiUpdate == "1")
			$updateCnt++;
		if ($this->SubTotal->MultiUpdate == "1")
			$updateCnt++;
		if ($this->ServiceSelect->MultiUpdate == "1")
			$updateCnt++;
		if ($this->Aid->MultiUpdate == "1")
			$updateCnt++;
		if ($this->Vid->MultiUpdate == "1")
			$updateCnt++;
		if ($this->DrID->MultiUpdate == "1")
			$updateCnt++;
		if ($this->DrCODE->MultiUpdate == "1")
			$updateCnt++;
		if ($this->DrName->MultiUpdate == "1")
			$updateCnt++;
		if ($this->Department->MultiUpdate == "1")
			$updateCnt++;
		if ($this->DrSharePres->MultiUpdate == "1")
			$updateCnt++;
		if ($this->HospSharePres->MultiUpdate == "1")
			$updateCnt++;
		if ($this->DrShareAmount->MultiUpdate == "1")
			$updateCnt++;
		if ($this->HospShareAmount->MultiUpdate == "1")
			$updateCnt++;
		if ($this->DrShareSettiledAmount->MultiUpdate == "1")
			$updateCnt++;
		if ($this->DrShareSettledId->MultiUpdate == "1")
			$updateCnt++;
		if ($this->DrShareSettiledStatus->MultiUpdate == "1")
			$updateCnt++;
		if ($this->invoiceId->MultiUpdate == "1")
			$updateCnt++;
		if ($this->invoiceAmount->MultiUpdate == "1")
			$updateCnt++;
		if ($this->invoiceStatus->MultiUpdate == "1")
			$updateCnt++;
		if ($this->modeOfPayment->MultiUpdate == "1")
			$updateCnt++;
		if ($this->HospID->MultiUpdate == "1")
			$updateCnt++;
		if ($this->RIDNO->MultiUpdate == "1")
			$updateCnt++;
		if ($this->TidNo->MultiUpdate == "1")
			$updateCnt++;
		if ($this->DiscountCategory->MultiUpdate == "1")
			$updateCnt++;
		if ($this->sid->MultiUpdate == "1")
			$updateCnt++;
		if ($this->ItemCode->MultiUpdate == "1")
			$updateCnt++;
		if ($this->TestSubCd->MultiUpdate == "1")
			$updateCnt++;
		if ($this->DEptCd->MultiUpdate == "1")
			$updateCnt++;
		if ($this->ProfCd->MultiUpdate == "1")
			$updateCnt++;
		if ($this->LabReport->MultiUpdate == "1")
			$updateCnt++;
		if ($this->Comments->MultiUpdate == "1")
			$updateCnt++;
		if ($this->Method->MultiUpdate == "1")
			$updateCnt++;
		if ($this->Specimen->MultiUpdate == "1")
			$updateCnt++;
		if ($this->Abnormal->MultiUpdate == "1")
			$updateCnt++;
		if ($this->RefValue->MultiUpdate == "1")
			$updateCnt++;
		if ($this->TestUnit->MultiUpdate == "1")
			$updateCnt++;
		if ($this->LOWHIGH->MultiUpdate == "1")
			$updateCnt++;
		if ($this->Branch->MultiUpdate == "1")
			$updateCnt++;
		if ($this->Dispatch->MultiUpdate == "1")
			$updateCnt++;
		if ($this->Pic1->MultiUpdate == "1")
			$updateCnt++;
		if ($this->Pic2->MultiUpdate == "1")
			$updateCnt++;
		if ($this->GraphPath->MultiUpdate == "1")
			$updateCnt++;
		if ($this->MachineCD->MultiUpdate == "1")
			$updateCnt++;
		if ($this->TestCancel->MultiUpdate == "1")
			$updateCnt++;
		if ($this->OutSource->MultiUpdate == "1")
			$updateCnt++;
		if ($this->Printed->MultiUpdate == "1")
			$updateCnt++;
		if ($this->PrintBy->MultiUpdate == "1")
			$updateCnt++;
		if ($this->PrintDate->MultiUpdate == "1")
			$updateCnt++;
		if ($this->BillingDate->MultiUpdate == "1")
			$updateCnt++;
		if ($this->BilledBy->MultiUpdate == "1")
			$updateCnt++;
		if ($this->Resulted->MultiUpdate == "1")
			$updateCnt++;
		if ($this->ResultDate->MultiUpdate == "1")
			$updateCnt++;
		if ($this->ResultedBy->MultiUpdate == "1")
			$updateCnt++;
		if ($this->SampleDate->MultiUpdate == "1")
			$updateCnt++;
		if ($this->SampleUser->MultiUpdate == "1")
			$updateCnt++;
		if ($this->Sampled->MultiUpdate == "1")
			$updateCnt++;
		if ($this->ReceivedDate->MultiUpdate == "1")
			$updateCnt++;
		if ($this->ReceivedUser->MultiUpdate == "1")
			$updateCnt++;
		if ($this->Recevied->MultiUpdate == "1")
			$updateCnt++;
		if ($this->DeptRecvDate->MultiUpdate == "1")
			$updateCnt++;
		if ($this->DeptRecvUser->MultiUpdate == "1")
			$updateCnt++;
		if ($this->DeptRecived->MultiUpdate == "1")
			$updateCnt++;
		if ($this->SAuthDate->MultiUpdate == "1")
			$updateCnt++;
		if ($this->SAuthBy->MultiUpdate == "1")
			$updateCnt++;
		if ($this->SAuthendicate->MultiUpdate == "1")
			$updateCnt++;
		if ($this->AuthDate->MultiUpdate == "1")
			$updateCnt++;
		if ($this->AuthBy->MultiUpdate == "1")
			$updateCnt++;
		if ($this->Authencate->MultiUpdate == "1")
			$updateCnt++;
		if ($this->EditDate->MultiUpdate == "1")
			$updateCnt++;
		if ($this->EditBy->MultiUpdate == "1")
			$updateCnt++;
		if ($this->Editted->MultiUpdate == "1")
			$updateCnt++;
		if ($this->PatID->MultiUpdate == "1")
			$updateCnt++;
		if ($this->PatientId->MultiUpdate == "1")
			$updateCnt++;
		if ($this->Mobile->MultiUpdate == "1")
			$updateCnt++;
		if ($this->CId->MultiUpdate == "1")
			$updateCnt++;
		if ($this->Order->MultiUpdate == "1")
			$updateCnt++;
		if ($this->Form->MultiUpdate == "1")
			$updateCnt++;
		if ($this->ResType->MultiUpdate == "1")
			$updateCnt++;
		if ($this->Sample->MultiUpdate == "1")
			$updateCnt++;
		if ($this->NoD->MultiUpdate == "1")
			$updateCnt++;
		if ($this->BillOrder->MultiUpdate == "1")
			$updateCnt++;
		if ($this->Formula->MultiUpdate == "1")
			$updateCnt++;
		if ($this->Inactive->MultiUpdate == "1")
			$updateCnt++;
		if ($this->CollSample->MultiUpdate == "1")
			$updateCnt++;
		if ($this->TestType->MultiUpdate == "1")
			$updateCnt++;
		if ($this->Repeated->MultiUpdate == "1")
			$updateCnt++;
		if ($this->RepeatedBy->MultiUpdate == "1")
			$updateCnt++;
		if ($this->RepeatedDate->MultiUpdate == "1")
			$updateCnt++;
		if ($this->serviceID->MultiUpdate == "1")
			$updateCnt++;
		if ($this->Service_Type->MultiUpdate == "1")
			$updateCnt++;
		if ($this->Service_Department->MultiUpdate == "1")
			$updateCnt++;
		if ($this->RequestNo->MultiUpdate == "1")
			$updateCnt++;
		if ($updateCnt == 0) {
			$FormError = $Language->phrase("NoFieldSelected");
			return FALSE;
		}

		// Check if validation required
		if (!SERVER_VALIDATE)
			return ($FormError == "");
		if ($this->id->Required) {
			if ($this->id->MultiUpdate <> "" && !$this->id->IsDetailKey && $this->id->FormValue != NULL && $this->id->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->id->caption(), $this->id->RequiredErrorMessage));
			}
		}
		if ($this->Reception->Required) {
			if ($this->Reception->MultiUpdate <> "" && !$this->Reception->IsDetailKey && $this->Reception->FormValue != NULL && $this->Reception->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Reception->caption(), $this->Reception->RequiredErrorMessage));
			}
		}
		if ($this->Services->Required) {
			if ($this->Services->MultiUpdate <> "" && !$this->Services->IsDetailKey && $this->Services->FormValue != NULL && $this->Services->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Services->caption(), $this->Services->RequiredErrorMessage));
			}
		}
		if ($this->amount->Required) {
			if ($this->amount->MultiUpdate <> "" && !$this->amount->IsDetailKey && $this->amount->FormValue != NULL && $this->amount->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->amount->caption(), $this->amount->RequiredErrorMessage));
			}
		}
		if ($this->amount->MultiUpdate <> "") {
			if (!CheckNumber($this->amount->FormValue)) {
				AddMessage($FormError, $this->amount->errorMessage());
			}
		}
		if ($this->description->Required) {
			if ($this->description->MultiUpdate <> "" && !$this->description->IsDetailKey && $this->description->FormValue != NULL && $this->description->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->description->caption(), $this->description->RequiredErrorMessage));
			}
		}
		if ($this->patient_type->Required) {
			if ($this->patient_type->MultiUpdate <> "" && !$this->patient_type->IsDetailKey && $this->patient_type->FormValue != NULL && $this->patient_type->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->patient_type->caption(), $this->patient_type->RequiredErrorMessage));
			}
		}
		if ($this->patient_type->MultiUpdate <> "") {
			if (!CheckInteger($this->patient_type->FormValue)) {
				AddMessage($FormError, $this->patient_type->errorMessage());
			}
		}
		if ($this->charged_date->Required) {
			if ($this->charged_date->MultiUpdate <> "" && !$this->charged_date->IsDetailKey && $this->charged_date->FormValue != NULL && $this->charged_date->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->charged_date->caption(), $this->charged_date->RequiredErrorMessage));
			}
		}
		if ($this->status->Required) {
			if ($this->status->MultiUpdate <> "" && !$this->status->IsDetailKey && $this->status->FormValue != NULL && $this->status->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->status->caption(), $this->status->RequiredErrorMessage));
			}
		}
		if ($this->createdby->Required) {
			if ($this->createdby->MultiUpdate <> "" && !$this->createdby->IsDetailKey && $this->createdby->FormValue != NULL && $this->createdby->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->createdby->caption(), $this->createdby->RequiredErrorMessage));
			}
		}
		if ($this->createddatetime->Required) {
			if ($this->createddatetime->MultiUpdate <> "" && !$this->createddatetime->IsDetailKey && $this->createddatetime->FormValue != NULL && $this->createddatetime->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->createddatetime->caption(), $this->createddatetime->RequiredErrorMessage));
			}
		}
		if ($this->modifiedby->Required) {
			if ($this->modifiedby->MultiUpdate <> "" && !$this->modifiedby->IsDetailKey && $this->modifiedby->FormValue != NULL && $this->modifiedby->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->modifiedby->caption(), $this->modifiedby->RequiredErrorMessage));
			}
		}
		if ($this->modifieddatetime->Required) {
			if ($this->modifieddatetime->MultiUpdate <> "" && !$this->modifieddatetime->IsDetailKey && $this->modifieddatetime->FormValue != NULL && $this->modifieddatetime->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->modifieddatetime->caption(), $this->modifieddatetime->RequiredErrorMessage));
			}
		}
		if ($this->mrnno->Required) {
			if ($this->mrnno->MultiUpdate <> "" && !$this->mrnno->IsDetailKey && $this->mrnno->FormValue != NULL && $this->mrnno->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->mrnno->caption(), $this->mrnno->RequiredErrorMessage));
			}
		}
		if ($this->PatientName->Required) {
			if ($this->PatientName->MultiUpdate <> "" && !$this->PatientName->IsDetailKey && $this->PatientName->FormValue != NULL && $this->PatientName->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PatientName->caption(), $this->PatientName->RequiredErrorMessage));
			}
		}
		if ($this->Age->Required) {
			if ($this->Age->MultiUpdate <> "" && !$this->Age->IsDetailKey && $this->Age->FormValue != NULL && $this->Age->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Age->caption(), $this->Age->RequiredErrorMessage));
			}
		}
		if ($this->Gender->Required) {
			if ($this->Gender->MultiUpdate <> "" && !$this->Gender->IsDetailKey && $this->Gender->FormValue != NULL && $this->Gender->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Gender->caption(), $this->Gender->RequiredErrorMessage));
			}
		}
		if ($this->profilePic->Required) {
			if ($this->profilePic->MultiUpdate <> "" && !$this->profilePic->IsDetailKey && $this->profilePic->FormValue != NULL && $this->profilePic->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->profilePic->caption(), $this->profilePic->RequiredErrorMessage));
			}
		}
		if ($this->Unit->Required) {
			if ($this->Unit->MultiUpdate <> "" && !$this->Unit->IsDetailKey && $this->Unit->FormValue != NULL && $this->Unit->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Unit->caption(), $this->Unit->RequiredErrorMessage));
			}
		}
		if ($this->Unit->MultiUpdate <> "") {
			if (!CheckInteger($this->Unit->FormValue)) {
				AddMessage($FormError, $this->Unit->errorMessage());
			}
		}
		if ($this->Quantity->Required) {
			if ($this->Quantity->MultiUpdate <> "" && !$this->Quantity->IsDetailKey && $this->Quantity->FormValue != NULL && $this->Quantity->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Quantity->caption(), $this->Quantity->RequiredErrorMessage));
			}
		}
		if ($this->Quantity->MultiUpdate <> "") {
			if (!CheckInteger($this->Quantity->FormValue)) {
				AddMessage($FormError, $this->Quantity->errorMessage());
			}
		}
		if ($this->Discount->Required) {
			if ($this->Discount->MultiUpdate <> "" && !$this->Discount->IsDetailKey && $this->Discount->FormValue != NULL && $this->Discount->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Discount->caption(), $this->Discount->RequiredErrorMessage));
			}
		}
		if ($this->Discount->MultiUpdate <> "") {
			if (!CheckNumber($this->Discount->FormValue)) {
				AddMessage($FormError, $this->Discount->errorMessage());
			}
		}
		if ($this->SubTotal->Required) {
			if ($this->SubTotal->MultiUpdate <> "" && !$this->SubTotal->IsDetailKey && $this->SubTotal->FormValue != NULL && $this->SubTotal->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->SubTotal->caption(), $this->SubTotal->RequiredErrorMessage));
			}
		}
		if ($this->SubTotal->MultiUpdate <> "") {
			if (!CheckNumber($this->SubTotal->FormValue)) {
				AddMessage($FormError, $this->SubTotal->errorMessage());
			}
		}
		if ($this->ServiceSelect->Required) {
			if ($this->ServiceSelect->MultiUpdate <> "" && $this->ServiceSelect->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->ServiceSelect->caption(), $this->ServiceSelect->RequiredErrorMessage));
			}
		}
		if ($this->Aid->Required) {
			if ($this->Aid->MultiUpdate <> "" && !$this->Aid->IsDetailKey && $this->Aid->FormValue != NULL && $this->Aid->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Aid->caption(), $this->Aid->RequiredErrorMessage));
			}
		}
		if ($this->Aid->MultiUpdate <> "") {
			if (!CheckInteger($this->Aid->FormValue)) {
				AddMessage($FormError, $this->Aid->errorMessage());
			}
		}
		if ($this->Vid->Required) {
			if ($this->Vid->MultiUpdate <> "" && !$this->Vid->IsDetailKey && $this->Vid->FormValue != NULL && $this->Vid->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Vid->caption(), $this->Vid->RequiredErrorMessage));
			}
		}
		if ($this->Vid->MultiUpdate <> "") {
			if (!CheckInteger($this->Vid->FormValue)) {
				AddMessage($FormError, $this->Vid->errorMessage());
			}
		}
		if ($this->DrID->Required) {
			if ($this->DrID->MultiUpdate <> "" && !$this->DrID->IsDetailKey && $this->DrID->FormValue != NULL && $this->DrID->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->DrID->caption(), $this->DrID->RequiredErrorMessage));
			}
		}
		if ($this->DrID->MultiUpdate <> "") {
			if (!CheckInteger($this->DrID->FormValue)) {
				AddMessage($FormError, $this->DrID->errorMessage());
			}
		}
		if ($this->DrCODE->Required) {
			if ($this->DrCODE->MultiUpdate <> "" && !$this->DrCODE->IsDetailKey && $this->DrCODE->FormValue != NULL && $this->DrCODE->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->DrCODE->caption(), $this->DrCODE->RequiredErrorMessage));
			}
		}
		if ($this->DrName->Required) {
			if ($this->DrName->MultiUpdate <> "" && !$this->DrName->IsDetailKey && $this->DrName->FormValue != NULL && $this->DrName->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->DrName->caption(), $this->DrName->RequiredErrorMessage));
			}
		}
		if ($this->Department->Required) {
			if ($this->Department->MultiUpdate <> "" && !$this->Department->IsDetailKey && $this->Department->FormValue != NULL && $this->Department->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Department->caption(), $this->Department->RequiredErrorMessage));
			}
		}
		if ($this->DrSharePres->Required) {
			if ($this->DrSharePres->MultiUpdate <> "" && !$this->DrSharePres->IsDetailKey && $this->DrSharePres->FormValue != NULL && $this->DrSharePres->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->DrSharePres->caption(), $this->DrSharePres->RequiredErrorMessage));
			}
		}
		if ($this->DrSharePres->MultiUpdate <> "") {
			if (!CheckNumber($this->DrSharePres->FormValue)) {
				AddMessage($FormError, $this->DrSharePres->errorMessage());
			}
		}
		if ($this->HospSharePres->Required) {
			if ($this->HospSharePres->MultiUpdate <> "" && !$this->HospSharePres->IsDetailKey && $this->HospSharePres->FormValue != NULL && $this->HospSharePres->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->HospSharePres->caption(), $this->HospSharePres->RequiredErrorMessage));
			}
		}
		if ($this->HospSharePres->MultiUpdate <> "") {
			if (!CheckNumber($this->HospSharePres->FormValue)) {
				AddMessage($FormError, $this->HospSharePres->errorMessage());
			}
		}
		if ($this->DrShareAmount->Required) {
			if ($this->DrShareAmount->MultiUpdate <> "" && !$this->DrShareAmount->IsDetailKey && $this->DrShareAmount->FormValue != NULL && $this->DrShareAmount->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->DrShareAmount->caption(), $this->DrShareAmount->RequiredErrorMessage));
			}
		}
		if ($this->DrShareAmount->MultiUpdate <> "") {
			if (!CheckNumber($this->DrShareAmount->FormValue)) {
				AddMessage($FormError, $this->DrShareAmount->errorMessage());
			}
		}
		if ($this->HospShareAmount->Required) {
			if ($this->HospShareAmount->MultiUpdate <> "" && !$this->HospShareAmount->IsDetailKey && $this->HospShareAmount->FormValue != NULL && $this->HospShareAmount->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->HospShareAmount->caption(), $this->HospShareAmount->RequiredErrorMessage));
			}
		}
		if ($this->HospShareAmount->MultiUpdate <> "") {
			if (!CheckNumber($this->HospShareAmount->FormValue)) {
				AddMessage($FormError, $this->HospShareAmount->errorMessage());
			}
		}
		if ($this->DrShareSettiledAmount->Required) {
			if ($this->DrShareSettiledAmount->MultiUpdate <> "" && !$this->DrShareSettiledAmount->IsDetailKey && $this->DrShareSettiledAmount->FormValue != NULL && $this->DrShareSettiledAmount->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->DrShareSettiledAmount->caption(), $this->DrShareSettiledAmount->RequiredErrorMessage));
			}
		}
		if ($this->DrShareSettiledAmount->MultiUpdate <> "") {
			if (!CheckNumber($this->DrShareSettiledAmount->FormValue)) {
				AddMessage($FormError, $this->DrShareSettiledAmount->errorMessage());
			}
		}
		if ($this->DrShareSettledId->Required) {
			if ($this->DrShareSettledId->MultiUpdate <> "" && !$this->DrShareSettledId->IsDetailKey && $this->DrShareSettledId->FormValue != NULL && $this->DrShareSettledId->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->DrShareSettledId->caption(), $this->DrShareSettledId->RequiredErrorMessage));
			}
		}
		if ($this->DrShareSettledId->MultiUpdate <> "") {
			if (!CheckInteger($this->DrShareSettledId->FormValue)) {
				AddMessage($FormError, $this->DrShareSettledId->errorMessage());
			}
		}
		if ($this->DrShareSettiledStatus->Required) {
			if ($this->DrShareSettiledStatus->MultiUpdate <> "" && !$this->DrShareSettiledStatus->IsDetailKey && $this->DrShareSettiledStatus->FormValue != NULL && $this->DrShareSettiledStatus->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->DrShareSettiledStatus->caption(), $this->DrShareSettiledStatus->RequiredErrorMessage));
			}
		}
		if ($this->DrShareSettiledStatus->MultiUpdate <> "") {
			if (!CheckInteger($this->DrShareSettiledStatus->FormValue)) {
				AddMessage($FormError, $this->DrShareSettiledStatus->errorMessage());
			}
		}
		if ($this->invoiceId->Required) {
			if ($this->invoiceId->MultiUpdate <> "" && !$this->invoiceId->IsDetailKey && $this->invoiceId->FormValue != NULL && $this->invoiceId->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->invoiceId->caption(), $this->invoiceId->RequiredErrorMessage));
			}
		}
		if ($this->invoiceId->MultiUpdate <> "") {
			if (!CheckInteger($this->invoiceId->FormValue)) {
				AddMessage($FormError, $this->invoiceId->errorMessage());
			}
		}
		if ($this->invoiceAmount->Required) {
			if ($this->invoiceAmount->MultiUpdate <> "" && !$this->invoiceAmount->IsDetailKey && $this->invoiceAmount->FormValue != NULL && $this->invoiceAmount->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->invoiceAmount->caption(), $this->invoiceAmount->RequiredErrorMessage));
			}
		}
		if ($this->invoiceAmount->MultiUpdate <> "") {
			if (!CheckNumber($this->invoiceAmount->FormValue)) {
				AddMessage($FormError, $this->invoiceAmount->errorMessage());
			}
		}
		if ($this->invoiceStatus->Required) {
			if ($this->invoiceStatus->MultiUpdate <> "" && !$this->invoiceStatus->IsDetailKey && $this->invoiceStatus->FormValue != NULL && $this->invoiceStatus->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->invoiceStatus->caption(), $this->invoiceStatus->RequiredErrorMessage));
			}
		}
		if ($this->modeOfPayment->Required) {
			if ($this->modeOfPayment->MultiUpdate <> "" && !$this->modeOfPayment->IsDetailKey && $this->modeOfPayment->FormValue != NULL && $this->modeOfPayment->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->modeOfPayment->caption(), $this->modeOfPayment->RequiredErrorMessage));
			}
		}
		if ($this->HospID->Required) {
			if ($this->HospID->MultiUpdate <> "" && !$this->HospID->IsDetailKey && $this->HospID->FormValue != NULL && $this->HospID->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->HospID->caption(), $this->HospID->RequiredErrorMessage));
			}
		}
		if ($this->RIDNO->Required) {
			if ($this->RIDNO->MultiUpdate <> "" && !$this->RIDNO->IsDetailKey && $this->RIDNO->FormValue != NULL && $this->RIDNO->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->RIDNO->caption(), $this->RIDNO->RequiredErrorMessage));
			}
		}
		if ($this->TidNo->Required) {
			if ($this->TidNo->MultiUpdate <> "" && !$this->TidNo->IsDetailKey && $this->TidNo->FormValue != NULL && $this->TidNo->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->TidNo->caption(), $this->TidNo->RequiredErrorMessage));
			}
		}
		if ($this->DiscountCategory->Required) {
			if ($this->DiscountCategory->MultiUpdate <> "" && !$this->DiscountCategory->IsDetailKey && $this->DiscountCategory->FormValue != NULL && $this->DiscountCategory->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->DiscountCategory->caption(), $this->DiscountCategory->RequiredErrorMessage));
			}
		}
		if ($this->sid->Required) {
			if ($this->sid->MultiUpdate <> "" && !$this->sid->IsDetailKey && $this->sid->FormValue != NULL && $this->sid->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->sid->caption(), $this->sid->RequiredErrorMessage));
			}
		}
		if ($this->sid->MultiUpdate <> "") {
			if (!CheckInteger($this->sid->FormValue)) {
				AddMessage($FormError, $this->sid->errorMessage());
			}
		}
		if ($this->ItemCode->Required) {
			if ($this->ItemCode->MultiUpdate <> "" && !$this->ItemCode->IsDetailKey && $this->ItemCode->FormValue != NULL && $this->ItemCode->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->ItemCode->caption(), $this->ItemCode->RequiredErrorMessage));
			}
		}
		if ($this->TestSubCd->Required) {
			if ($this->TestSubCd->MultiUpdate <> "" && !$this->TestSubCd->IsDetailKey && $this->TestSubCd->FormValue != NULL && $this->TestSubCd->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->TestSubCd->caption(), $this->TestSubCd->RequiredErrorMessage));
			}
		}
		if ($this->DEptCd->Required) {
			if ($this->DEptCd->MultiUpdate <> "" && !$this->DEptCd->IsDetailKey && $this->DEptCd->FormValue != NULL && $this->DEptCd->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->DEptCd->caption(), $this->DEptCd->RequiredErrorMessage));
			}
		}
		if ($this->ProfCd->Required) {
			if ($this->ProfCd->MultiUpdate <> "" && !$this->ProfCd->IsDetailKey && $this->ProfCd->FormValue != NULL && $this->ProfCd->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->ProfCd->caption(), $this->ProfCd->RequiredErrorMessage));
			}
		}
		if ($this->LabReport->Required) {
			if ($this->LabReport->MultiUpdate <> "" && !$this->LabReport->IsDetailKey && $this->LabReport->FormValue != NULL && $this->LabReport->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->LabReport->caption(), $this->LabReport->RequiredErrorMessage));
			}
		}
		if ($this->Comments->Required) {
			if ($this->Comments->MultiUpdate <> "" && !$this->Comments->IsDetailKey && $this->Comments->FormValue != NULL && $this->Comments->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Comments->caption(), $this->Comments->RequiredErrorMessage));
			}
		}
		if ($this->Method->Required) {
			if ($this->Method->MultiUpdate <> "" && !$this->Method->IsDetailKey && $this->Method->FormValue != NULL && $this->Method->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Method->caption(), $this->Method->RequiredErrorMessage));
			}
		}
		if ($this->Specimen->Required) {
			if ($this->Specimen->MultiUpdate <> "" && !$this->Specimen->IsDetailKey && $this->Specimen->FormValue != NULL && $this->Specimen->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Specimen->caption(), $this->Specimen->RequiredErrorMessage));
			}
		}
		if ($this->Abnormal->Required) {
			if ($this->Abnormal->MultiUpdate <> "" && !$this->Abnormal->IsDetailKey && $this->Abnormal->FormValue != NULL && $this->Abnormal->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Abnormal->caption(), $this->Abnormal->RequiredErrorMessage));
			}
		}
		if ($this->RefValue->Required) {
			if ($this->RefValue->MultiUpdate <> "" && !$this->RefValue->IsDetailKey && $this->RefValue->FormValue != NULL && $this->RefValue->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->RefValue->caption(), $this->RefValue->RequiredErrorMessage));
			}
		}
		if ($this->TestUnit->Required) {
			if ($this->TestUnit->MultiUpdate <> "" && !$this->TestUnit->IsDetailKey && $this->TestUnit->FormValue != NULL && $this->TestUnit->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->TestUnit->caption(), $this->TestUnit->RequiredErrorMessage));
			}
		}
		if ($this->LOWHIGH->Required) {
			if ($this->LOWHIGH->MultiUpdate <> "" && !$this->LOWHIGH->IsDetailKey && $this->LOWHIGH->FormValue != NULL && $this->LOWHIGH->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->LOWHIGH->caption(), $this->LOWHIGH->RequiredErrorMessage));
			}
		}
		if ($this->Branch->Required) {
			if ($this->Branch->MultiUpdate <> "" && !$this->Branch->IsDetailKey && $this->Branch->FormValue != NULL && $this->Branch->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Branch->caption(), $this->Branch->RequiredErrorMessage));
			}
		}
		if ($this->Dispatch->Required) {
			if ($this->Dispatch->MultiUpdate <> "" && !$this->Dispatch->IsDetailKey && $this->Dispatch->FormValue != NULL && $this->Dispatch->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Dispatch->caption(), $this->Dispatch->RequiredErrorMessage));
			}
		}
		if ($this->Pic1->Required) {
			if ($this->Pic1->MultiUpdate <> "" && !$this->Pic1->IsDetailKey && $this->Pic1->FormValue != NULL && $this->Pic1->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Pic1->caption(), $this->Pic1->RequiredErrorMessage));
			}
		}
		if ($this->Pic2->Required) {
			if ($this->Pic2->MultiUpdate <> "" && !$this->Pic2->IsDetailKey && $this->Pic2->FormValue != NULL && $this->Pic2->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Pic2->caption(), $this->Pic2->RequiredErrorMessage));
			}
		}
		if ($this->GraphPath->Required) {
			if ($this->GraphPath->MultiUpdate <> "" && !$this->GraphPath->IsDetailKey && $this->GraphPath->FormValue != NULL && $this->GraphPath->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->GraphPath->caption(), $this->GraphPath->RequiredErrorMessage));
			}
		}
		if ($this->MachineCD->Required) {
			if ($this->MachineCD->MultiUpdate <> "" && !$this->MachineCD->IsDetailKey && $this->MachineCD->FormValue != NULL && $this->MachineCD->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->MachineCD->caption(), $this->MachineCD->RequiredErrorMessage));
			}
		}
		if ($this->TestCancel->Required) {
			if ($this->TestCancel->MultiUpdate <> "" && !$this->TestCancel->IsDetailKey && $this->TestCancel->FormValue != NULL && $this->TestCancel->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->TestCancel->caption(), $this->TestCancel->RequiredErrorMessage));
			}
		}
		if ($this->OutSource->Required) {
			if ($this->OutSource->MultiUpdate <> "" && !$this->OutSource->IsDetailKey && $this->OutSource->FormValue != NULL && $this->OutSource->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->OutSource->caption(), $this->OutSource->RequiredErrorMessage));
			}
		}
		if ($this->Printed->Required) {
			if ($this->Printed->MultiUpdate <> "" && !$this->Printed->IsDetailKey && $this->Printed->FormValue != NULL && $this->Printed->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Printed->caption(), $this->Printed->RequiredErrorMessage));
			}
		}
		if ($this->PrintBy->Required) {
			if ($this->PrintBy->MultiUpdate <> "" && !$this->PrintBy->IsDetailKey && $this->PrintBy->FormValue != NULL && $this->PrintBy->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PrintBy->caption(), $this->PrintBy->RequiredErrorMessage));
			}
		}
		if ($this->PrintDate->Required) {
			if ($this->PrintDate->MultiUpdate <> "" && !$this->PrintDate->IsDetailKey && $this->PrintDate->FormValue != NULL && $this->PrintDate->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PrintDate->caption(), $this->PrintDate->RequiredErrorMessage));
			}
		}
		if ($this->PrintDate->MultiUpdate <> "") {
			if (!CheckDate($this->PrintDate->FormValue)) {
				AddMessage($FormError, $this->PrintDate->errorMessage());
			}
		}
		if ($this->BillingDate->Required) {
			if ($this->BillingDate->MultiUpdate <> "" && !$this->BillingDate->IsDetailKey && $this->BillingDate->FormValue != NULL && $this->BillingDate->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->BillingDate->caption(), $this->BillingDate->RequiredErrorMessage));
			}
		}
		if ($this->BillingDate->MultiUpdate <> "") {
			if (!CheckDate($this->BillingDate->FormValue)) {
				AddMessage($FormError, $this->BillingDate->errorMessage());
			}
		}
		if ($this->BilledBy->Required) {
			if ($this->BilledBy->MultiUpdate <> "" && !$this->BilledBy->IsDetailKey && $this->BilledBy->FormValue != NULL && $this->BilledBy->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->BilledBy->caption(), $this->BilledBy->RequiredErrorMessage));
			}
		}
		if ($this->Resulted->Required) {
			if ($this->Resulted->MultiUpdate <> "" && !$this->Resulted->IsDetailKey && $this->Resulted->FormValue != NULL && $this->Resulted->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Resulted->caption(), $this->Resulted->RequiredErrorMessage));
			}
		}
		if ($this->ResultDate->Required) {
			if ($this->ResultDate->MultiUpdate <> "" && !$this->ResultDate->IsDetailKey && $this->ResultDate->FormValue != NULL && $this->ResultDate->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->ResultDate->caption(), $this->ResultDate->RequiredErrorMessage));
			}
		}
		if ($this->ResultDate->MultiUpdate <> "") {
			if (!CheckDate($this->ResultDate->FormValue)) {
				AddMessage($FormError, $this->ResultDate->errorMessage());
			}
		}
		if ($this->ResultedBy->Required) {
			if ($this->ResultedBy->MultiUpdate <> "" && !$this->ResultedBy->IsDetailKey && $this->ResultedBy->FormValue != NULL && $this->ResultedBy->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->ResultedBy->caption(), $this->ResultedBy->RequiredErrorMessage));
			}
		}
		if ($this->SampleDate->Required) {
			if ($this->SampleDate->MultiUpdate <> "" && !$this->SampleDate->IsDetailKey && $this->SampleDate->FormValue != NULL && $this->SampleDate->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->SampleDate->caption(), $this->SampleDate->RequiredErrorMessage));
			}
		}
		if ($this->SampleDate->MultiUpdate <> "") {
			if (!CheckDate($this->SampleDate->FormValue)) {
				AddMessage($FormError, $this->SampleDate->errorMessage());
			}
		}
		if ($this->SampleUser->Required) {
			if ($this->SampleUser->MultiUpdate <> "" && !$this->SampleUser->IsDetailKey && $this->SampleUser->FormValue != NULL && $this->SampleUser->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->SampleUser->caption(), $this->SampleUser->RequiredErrorMessage));
			}
		}
		if ($this->Sampled->Required) {
			if ($this->Sampled->MultiUpdate <> "" && !$this->Sampled->IsDetailKey && $this->Sampled->FormValue != NULL && $this->Sampled->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Sampled->caption(), $this->Sampled->RequiredErrorMessage));
			}
		}
		if ($this->ReceivedDate->Required) {
			if ($this->ReceivedDate->MultiUpdate <> "" && !$this->ReceivedDate->IsDetailKey && $this->ReceivedDate->FormValue != NULL && $this->ReceivedDate->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->ReceivedDate->caption(), $this->ReceivedDate->RequiredErrorMessage));
			}
		}
		if ($this->ReceivedDate->MultiUpdate <> "") {
			if (!CheckDate($this->ReceivedDate->FormValue)) {
				AddMessage($FormError, $this->ReceivedDate->errorMessage());
			}
		}
		if ($this->ReceivedUser->Required) {
			if ($this->ReceivedUser->MultiUpdate <> "" && !$this->ReceivedUser->IsDetailKey && $this->ReceivedUser->FormValue != NULL && $this->ReceivedUser->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->ReceivedUser->caption(), $this->ReceivedUser->RequiredErrorMessage));
			}
		}
		if ($this->Recevied->Required) {
			if ($this->Recevied->MultiUpdate <> "" && !$this->Recevied->IsDetailKey && $this->Recevied->FormValue != NULL && $this->Recevied->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Recevied->caption(), $this->Recevied->RequiredErrorMessage));
			}
		}
		if ($this->DeptRecvDate->Required) {
			if ($this->DeptRecvDate->MultiUpdate <> "" && !$this->DeptRecvDate->IsDetailKey && $this->DeptRecvDate->FormValue != NULL && $this->DeptRecvDate->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->DeptRecvDate->caption(), $this->DeptRecvDate->RequiredErrorMessage));
			}
		}
		if ($this->DeptRecvDate->MultiUpdate <> "") {
			if (!CheckDate($this->DeptRecvDate->FormValue)) {
				AddMessage($FormError, $this->DeptRecvDate->errorMessage());
			}
		}
		if ($this->DeptRecvUser->Required) {
			if ($this->DeptRecvUser->MultiUpdate <> "" && !$this->DeptRecvUser->IsDetailKey && $this->DeptRecvUser->FormValue != NULL && $this->DeptRecvUser->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->DeptRecvUser->caption(), $this->DeptRecvUser->RequiredErrorMessage));
			}
		}
		if ($this->DeptRecived->Required) {
			if ($this->DeptRecived->MultiUpdate <> "" && !$this->DeptRecived->IsDetailKey && $this->DeptRecived->FormValue != NULL && $this->DeptRecived->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->DeptRecived->caption(), $this->DeptRecived->RequiredErrorMessage));
			}
		}
		if ($this->SAuthDate->Required) {
			if ($this->SAuthDate->MultiUpdate <> "" && !$this->SAuthDate->IsDetailKey && $this->SAuthDate->FormValue != NULL && $this->SAuthDate->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->SAuthDate->caption(), $this->SAuthDate->RequiredErrorMessage));
			}
		}
		if ($this->SAuthDate->MultiUpdate <> "") {
			if (!CheckDate($this->SAuthDate->FormValue)) {
				AddMessage($FormError, $this->SAuthDate->errorMessage());
			}
		}
		if ($this->SAuthBy->Required) {
			if ($this->SAuthBy->MultiUpdate <> "" && !$this->SAuthBy->IsDetailKey && $this->SAuthBy->FormValue != NULL && $this->SAuthBy->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->SAuthBy->caption(), $this->SAuthBy->RequiredErrorMessage));
			}
		}
		if ($this->SAuthendicate->Required) {
			if ($this->SAuthendicate->MultiUpdate <> "" && !$this->SAuthendicate->IsDetailKey && $this->SAuthendicate->FormValue != NULL && $this->SAuthendicate->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->SAuthendicate->caption(), $this->SAuthendicate->RequiredErrorMessage));
			}
		}
		if ($this->AuthDate->Required) {
			if ($this->AuthDate->MultiUpdate <> "" && !$this->AuthDate->IsDetailKey && $this->AuthDate->FormValue != NULL && $this->AuthDate->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->AuthDate->caption(), $this->AuthDate->RequiredErrorMessage));
			}
		}
		if ($this->AuthDate->MultiUpdate <> "") {
			if (!CheckDate($this->AuthDate->FormValue)) {
				AddMessage($FormError, $this->AuthDate->errorMessage());
			}
		}
		if ($this->AuthBy->Required) {
			if ($this->AuthBy->MultiUpdate <> "" && !$this->AuthBy->IsDetailKey && $this->AuthBy->FormValue != NULL && $this->AuthBy->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->AuthBy->caption(), $this->AuthBy->RequiredErrorMessage));
			}
		}
		if ($this->Authencate->Required) {
			if ($this->Authencate->MultiUpdate <> "" && !$this->Authencate->IsDetailKey && $this->Authencate->FormValue != NULL && $this->Authencate->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Authencate->caption(), $this->Authencate->RequiredErrorMessage));
			}
		}
		if ($this->EditDate->Required) {
			if ($this->EditDate->MultiUpdate <> "" && !$this->EditDate->IsDetailKey && $this->EditDate->FormValue != NULL && $this->EditDate->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->EditDate->caption(), $this->EditDate->RequiredErrorMessage));
			}
		}
		if ($this->EditDate->MultiUpdate <> "") {
			if (!CheckDate($this->EditDate->FormValue)) {
				AddMessage($FormError, $this->EditDate->errorMessage());
			}
		}
		if ($this->EditBy->Required) {
			if ($this->EditBy->MultiUpdate <> "" && !$this->EditBy->IsDetailKey && $this->EditBy->FormValue != NULL && $this->EditBy->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->EditBy->caption(), $this->EditBy->RequiredErrorMessage));
			}
		}
		if ($this->Editted->Required) {
			if ($this->Editted->MultiUpdate <> "" && !$this->Editted->IsDetailKey && $this->Editted->FormValue != NULL && $this->Editted->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Editted->caption(), $this->Editted->RequiredErrorMessage));
			}
		}
		if ($this->PatID->Required) {
			if ($this->PatID->MultiUpdate <> "" && !$this->PatID->IsDetailKey && $this->PatID->FormValue != NULL && $this->PatID->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PatID->caption(), $this->PatID->RequiredErrorMessage));
			}
		}
		if ($this->PatID->MultiUpdate <> "") {
			if (!CheckInteger($this->PatID->FormValue)) {
				AddMessage($FormError, $this->PatID->errorMessage());
			}
		}
		if ($this->PatientId->Required) {
			if ($this->PatientId->MultiUpdate <> "" && !$this->PatientId->IsDetailKey && $this->PatientId->FormValue != NULL && $this->PatientId->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PatientId->caption(), $this->PatientId->RequiredErrorMessage));
			}
		}
		if ($this->Mobile->Required) {
			if ($this->Mobile->MultiUpdate <> "" && !$this->Mobile->IsDetailKey && $this->Mobile->FormValue != NULL && $this->Mobile->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Mobile->caption(), $this->Mobile->RequiredErrorMessage));
			}
		}
		if ($this->CId->Required) {
			if ($this->CId->MultiUpdate <> "" && !$this->CId->IsDetailKey && $this->CId->FormValue != NULL && $this->CId->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->CId->caption(), $this->CId->RequiredErrorMessage));
			}
		}
		if ($this->CId->MultiUpdate <> "") {
			if (!CheckInteger($this->CId->FormValue)) {
				AddMessage($FormError, $this->CId->errorMessage());
			}
		}
		if ($this->Order->Required) {
			if ($this->Order->MultiUpdate <> "" && !$this->Order->IsDetailKey && $this->Order->FormValue != NULL && $this->Order->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Order->caption(), $this->Order->RequiredErrorMessage));
			}
		}
		if ($this->Order->MultiUpdate <> "") {
			if (!CheckNumber($this->Order->FormValue)) {
				AddMessage($FormError, $this->Order->errorMessage());
			}
		}
		if ($this->Form->Required) {
			if ($this->Form->MultiUpdate <> "" && !$this->Form->IsDetailKey && $this->Form->FormValue != NULL && $this->Form->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Form->caption(), $this->Form->RequiredErrorMessage));
			}
		}
		if ($this->ResType->Required) {
			if ($this->ResType->MultiUpdate <> "" && !$this->ResType->IsDetailKey && $this->ResType->FormValue != NULL && $this->ResType->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->ResType->caption(), $this->ResType->RequiredErrorMessage));
			}
		}
		if ($this->Sample->Required) {
			if ($this->Sample->MultiUpdate <> "" && !$this->Sample->IsDetailKey && $this->Sample->FormValue != NULL && $this->Sample->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Sample->caption(), $this->Sample->RequiredErrorMessage));
			}
		}
		if ($this->NoD->Required) {
			if ($this->NoD->MultiUpdate <> "" && !$this->NoD->IsDetailKey && $this->NoD->FormValue != NULL && $this->NoD->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->NoD->caption(), $this->NoD->RequiredErrorMessage));
			}
		}
		if ($this->NoD->MultiUpdate <> "") {
			if (!CheckNumber($this->NoD->FormValue)) {
				AddMessage($FormError, $this->NoD->errorMessage());
			}
		}
		if ($this->BillOrder->Required) {
			if ($this->BillOrder->MultiUpdate <> "" && !$this->BillOrder->IsDetailKey && $this->BillOrder->FormValue != NULL && $this->BillOrder->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->BillOrder->caption(), $this->BillOrder->RequiredErrorMessage));
			}
		}
		if ($this->BillOrder->MultiUpdate <> "") {
			if (!CheckNumber($this->BillOrder->FormValue)) {
				AddMessage($FormError, $this->BillOrder->errorMessage());
			}
		}
		if ($this->Formula->Required) {
			if ($this->Formula->MultiUpdate <> "" && !$this->Formula->IsDetailKey && $this->Formula->FormValue != NULL && $this->Formula->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Formula->caption(), $this->Formula->RequiredErrorMessage));
			}
		}
		if ($this->Inactive->Required) {
			if ($this->Inactive->MultiUpdate <> "" && !$this->Inactive->IsDetailKey && $this->Inactive->FormValue != NULL && $this->Inactive->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Inactive->caption(), $this->Inactive->RequiredErrorMessage));
			}
		}
		if ($this->CollSample->Required) {
			if ($this->CollSample->MultiUpdate <> "" && !$this->CollSample->IsDetailKey && $this->CollSample->FormValue != NULL && $this->CollSample->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->CollSample->caption(), $this->CollSample->RequiredErrorMessage));
			}
		}
		if ($this->TestType->Required) {
			if ($this->TestType->MultiUpdate <> "" && !$this->TestType->IsDetailKey && $this->TestType->FormValue != NULL && $this->TestType->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->TestType->caption(), $this->TestType->RequiredErrorMessage));
			}
		}
		if ($this->Repeated->Required) {
			if ($this->Repeated->MultiUpdate <> "" && !$this->Repeated->IsDetailKey && $this->Repeated->FormValue != NULL && $this->Repeated->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Repeated->caption(), $this->Repeated->RequiredErrorMessage));
			}
		}
		if ($this->RepeatedBy->Required) {
			if ($this->RepeatedBy->MultiUpdate <> "" && !$this->RepeatedBy->IsDetailKey && $this->RepeatedBy->FormValue != NULL && $this->RepeatedBy->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->RepeatedBy->caption(), $this->RepeatedBy->RequiredErrorMessage));
			}
		}
		if ($this->RepeatedDate->Required) {
			if ($this->RepeatedDate->MultiUpdate <> "" && !$this->RepeatedDate->IsDetailKey && $this->RepeatedDate->FormValue != NULL && $this->RepeatedDate->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->RepeatedDate->caption(), $this->RepeatedDate->RequiredErrorMessage));
			}
		}
		if ($this->RepeatedDate->MultiUpdate <> "") {
			if (!CheckDate($this->RepeatedDate->FormValue)) {
				AddMessage($FormError, $this->RepeatedDate->errorMessage());
			}
		}
		if ($this->serviceID->Required) {
			if ($this->serviceID->MultiUpdate <> "" && !$this->serviceID->IsDetailKey && $this->serviceID->FormValue != NULL && $this->serviceID->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->serviceID->caption(), $this->serviceID->RequiredErrorMessage));
			}
		}
		if ($this->serviceID->MultiUpdate <> "") {
			if (!CheckInteger($this->serviceID->FormValue)) {
				AddMessage($FormError, $this->serviceID->errorMessage());
			}
		}
		if ($this->Service_Type->Required) {
			if ($this->Service_Type->MultiUpdate <> "" && !$this->Service_Type->IsDetailKey && $this->Service_Type->FormValue != NULL && $this->Service_Type->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Service_Type->caption(), $this->Service_Type->RequiredErrorMessage));
			}
		}
		if ($this->Service_Department->Required) {
			if ($this->Service_Department->MultiUpdate <> "" && !$this->Service_Department->IsDetailKey && $this->Service_Department->FormValue != NULL && $this->Service_Department->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Service_Department->caption(), $this->Service_Department->RequiredErrorMessage));
			}
		}
		if ($this->RequestNo->Required) {
			if ($this->RequestNo->MultiUpdate <> "" && !$this->RequestNo->IsDetailKey && $this->RequestNo->FormValue != NULL && $this->RequestNo->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->RequestNo->caption(), $this->RequestNo->RequiredErrorMessage));
			}
		}
		if ($this->RequestNo->MultiUpdate <> "") {
			if (!CheckInteger($this->RequestNo->FormValue)) {
				AddMessage($FormError, $this->RequestNo->errorMessage());
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

			// Services
			$this->Services->setDbValueDef($rsnew, $this->Services->CurrentValue, NULL, $this->Services->ReadOnly || $this->Services->MultiUpdate <> "1");

			// amount
			$this->amount->setDbValueDef($rsnew, $this->amount->CurrentValue, NULL, $this->amount->ReadOnly || $this->amount->MultiUpdate <> "1");

			// description
			$this->description->setDbValueDef($rsnew, $this->description->CurrentValue, NULL, $this->description->ReadOnly || $this->description->MultiUpdate <> "1");

			// patient_type
			$this->patient_type->setDbValueDef($rsnew, $this->patient_type->CurrentValue, NULL, $this->patient_type->ReadOnly || $this->patient_type->MultiUpdate <> "1");

			// charged_date
			$this->charged_date->setDbValueDef($rsnew, CurrentDate(), NULL);
			$rsnew['charged_date'] = &$this->charged_date->DbValue;

			// status
			$this->status->setDbValueDef($rsnew, $this->status->CurrentValue, NULL, $this->status->ReadOnly || $this->status->MultiUpdate <> "1");

			// createdby
			$this->createdby->setDbValueDef($rsnew, CurrentUserID(), NULL);
			$rsnew['createdby'] = &$this->createdby->DbValue;

			// createddatetime
			$this->createddatetime->setDbValueDef($rsnew, CurrentDateTime(), NULL);
			$rsnew['createddatetime'] = &$this->createddatetime->DbValue;

			// PatientName
			$this->PatientName->setDbValueDef($rsnew, $this->PatientName->CurrentValue, NULL, $this->PatientName->ReadOnly || $this->PatientName->MultiUpdate <> "1");

			// Age
			$this->Age->setDbValueDef($rsnew, $this->Age->CurrentValue, NULL, $this->Age->ReadOnly || $this->Age->MultiUpdate <> "1");

			// Gender
			$this->Gender->setDbValueDef($rsnew, $this->Gender->CurrentValue, NULL, $this->Gender->ReadOnly || $this->Gender->MultiUpdate <> "1");

			// profilePic
			$this->profilePic->setDbValueDef($rsnew, $this->profilePic->CurrentValue, NULL, $this->profilePic->ReadOnly || $this->profilePic->MultiUpdate <> "1");

			// Unit
			$this->Unit->setDbValueDef($rsnew, $this->Unit->CurrentValue, NULL, $this->Unit->ReadOnly || $this->Unit->MultiUpdate <> "1");

			// Quantity
			$this->Quantity->setDbValueDef($rsnew, $this->Quantity->CurrentValue, NULL, $this->Quantity->ReadOnly || $this->Quantity->MultiUpdate <> "1");

			// Discount
			$this->Discount->setDbValueDef($rsnew, $this->Discount->CurrentValue, NULL, $this->Discount->ReadOnly || $this->Discount->MultiUpdate <> "1");

			// SubTotal
			$this->SubTotal->setDbValueDef($rsnew, $this->SubTotal->CurrentValue, NULL, $this->SubTotal->ReadOnly || $this->SubTotal->MultiUpdate <> "1");

			// ServiceSelect
			$this->ServiceSelect->setDbValueDef($rsnew, $this->ServiceSelect->CurrentValue, "", $this->ServiceSelect->ReadOnly || $this->ServiceSelect->MultiUpdate <> "1");

			// Aid
			$this->Aid->setDbValueDef($rsnew, $this->Aid->CurrentValue, NULL, $this->Aid->ReadOnly || $this->Aid->MultiUpdate <> "1");

			// Vid
			$this->Vid->setDbValueDef($rsnew, $this->Vid->CurrentValue, NULL, $this->Vid->ReadOnly || $this->Vid->MultiUpdate <> "1");

			// DrID
			$this->DrID->setDbValueDef($rsnew, $this->DrID->CurrentValue, NULL, $this->DrID->ReadOnly || $this->DrID->MultiUpdate <> "1");

			// DrCODE
			$this->DrCODE->setDbValueDef($rsnew, $this->DrCODE->CurrentValue, NULL, $this->DrCODE->ReadOnly || $this->DrCODE->MultiUpdate <> "1");

			// DrName
			$this->DrName->setDbValueDef($rsnew, $this->DrName->CurrentValue, NULL, $this->DrName->ReadOnly || $this->DrName->MultiUpdate <> "1");

			// Department
			$this->Department->setDbValueDef($rsnew, $this->Department->CurrentValue, NULL, $this->Department->ReadOnly || $this->Department->MultiUpdate <> "1");

			// DrSharePres
			$this->DrSharePres->setDbValueDef($rsnew, $this->DrSharePres->CurrentValue, NULL, $this->DrSharePres->ReadOnly || $this->DrSharePres->MultiUpdate <> "1");

			// HospSharePres
			$this->HospSharePres->setDbValueDef($rsnew, $this->HospSharePres->CurrentValue, NULL, $this->HospSharePres->ReadOnly || $this->HospSharePres->MultiUpdate <> "1");

			// DrShareAmount
			$this->DrShareAmount->setDbValueDef($rsnew, $this->DrShareAmount->CurrentValue, NULL, $this->DrShareAmount->ReadOnly || $this->DrShareAmount->MultiUpdate <> "1");

			// HospShareAmount
			$this->HospShareAmount->setDbValueDef($rsnew, $this->HospShareAmount->CurrentValue, NULL, $this->HospShareAmount->ReadOnly || $this->HospShareAmount->MultiUpdate <> "1");

			// DrShareSettiledAmount
			$this->DrShareSettiledAmount->setDbValueDef($rsnew, $this->DrShareSettiledAmount->CurrentValue, NULL, $this->DrShareSettiledAmount->ReadOnly || $this->DrShareSettiledAmount->MultiUpdate <> "1");

			// DrShareSettledId
			$this->DrShareSettledId->setDbValueDef($rsnew, $this->DrShareSettledId->CurrentValue, NULL, $this->DrShareSettledId->ReadOnly || $this->DrShareSettledId->MultiUpdate <> "1");

			// DrShareSettiledStatus
			$this->DrShareSettiledStatus->setDbValueDef($rsnew, $this->DrShareSettiledStatus->CurrentValue, NULL, $this->DrShareSettiledStatus->ReadOnly || $this->DrShareSettiledStatus->MultiUpdate <> "1");

			// invoiceId
			$this->invoiceId->setDbValueDef($rsnew, $this->invoiceId->CurrentValue, NULL, $this->invoiceId->ReadOnly || $this->invoiceId->MultiUpdate <> "1");

			// invoiceAmount
			$this->invoiceAmount->setDbValueDef($rsnew, $this->invoiceAmount->CurrentValue, NULL, $this->invoiceAmount->ReadOnly || $this->invoiceAmount->MultiUpdate <> "1");

			// invoiceStatus
			$this->invoiceStatus->setDbValueDef($rsnew, $this->invoiceStatus->CurrentValue, NULL, $this->invoiceStatus->ReadOnly || $this->invoiceStatus->MultiUpdate <> "1");

			// modeOfPayment
			$this->modeOfPayment->setDbValueDef($rsnew, $this->modeOfPayment->CurrentValue, NULL, $this->modeOfPayment->ReadOnly || $this->modeOfPayment->MultiUpdate <> "1");

			// DiscountCategory
			$this->DiscountCategory->setDbValueDef($rsnew, $this->DiscountCategory->CurrentValue, NULL, $this->DiscountCategory->ReadOnly || $this->DiscountCategory->MultiUpdate <> "1");

			// sid
			$this->sid->setDbValueDef($rsnew, $this->sid->CurrentValue, NULL, $this->sid->ReadOnly || $this->sid->MultiUpdate <> "1");

			// ItemCode
			$this->ItemCode->setDbValueDef($rsnew, $this->ItemCode->CurrentValue, NULL, $this->ItemCode->ReadOnly || $this->ItemCode->MultiUpdate <> "1");

			// TestSubCd
			$this->TestSubCd->setDbValueDef($rsnew, $this->TestSubCd->CurrentValue, NULL, $this->TestSubCd->ReadOnly || $this->TestSubCd->MultiUpdate <> "1");

			// DEptCd
			$this->DEptCd->setDbValueDef($rsnew, $this->DEptCd->CurrentValue, NULL, $this->DEptCd->ReadOnly || $this->DEptCd->MultiUpdate <> "1");

			// ProfCd
			$this->ProfCd->setDbValueDef($rsnew, $this->ProfCd->CurrentValue, NULL, $this->ProfCd->ReadOnly || $this->ProfCd->MultiUpdate <> "1");

			// LabReport
			$this->LabReport->setDbValueDef($rsnew, $this->LabReport->CurrentValue, NULL, $this->LabReport->ReadOnly || $this->LabReport->MultiUpdate <> "1");

			// Comments
			$this->Comments->setDbValueDef($rsnew, $this->Comments->CurrentValue, NULL, $this->Comments->ReadOnly || $this->Comments->MultiUpdate <> "1");

			// Method
			$this->Method->setDbValueDef($rsnew, $this->Method->CurrentValue, NULL, $this->Method->ReadOnly || $this->Method->MultiUpdate <> "1");

			// Specimen
			$this->Specimen->setDbValueDef($rsnew, $this->Specimen->CurrentValue, NULL, $this->Specimen->ReadOnly || $this->Specimen->MultiUpdate <> "1");

			// Abnormal
			$this->Abnormal->setDbValueDef($rsnew, $this->Abnormal->CurrentValue, NULL, $this->Abnormal->ReadOnly || $this->Abnormal->MultiUpdate <> "1");

			// RefValue
			$this->RefValue->setDbValueDef($rsnew, $this->RefValue->CurrentValue, NULL, $this->RefValue->ReadOnly || $this->RefValue->MultiUpdate <> "1");

			// TestUnit
			$this->TestUnit->setDbValueDef($rsnew, $this->TestUnit->CurrentValue, NULL, $this->TestUnit->ReadOnly || $this->TestUnit->MultiUpdate <> "1");

			// LOWHIGH
			$this->LOWHIGH->setDbValueDef($rsnew, $this->LOWHIGH->CurrentValue, NULL, $this->LOWHIGH->ReadOnly || $this->LOWHIGH->MultiUpdate <> "1");

			// Branch
			$this->Branch->setDbValueDef($rsnew, $this->Branch->CurrentValue, NULL, $this->Branch->ReadOnly || $this->Branch->MultiUpdate <> "1");

			// Dispatch
			$this->Dispatch->setDbValueDef($rsnew, $this->Dispatch->CurrentValue, NULL, $this->Dispatch->ReadOnly || $this->Dispatch->MultiUpdate <> "1");

			// Pic1
			$this->Pic1->setDbValueDef($rsnew, $this->Pic1->CurrentValue, NULL, $this->Pic1->ReadOnly || $this->Pic1->MultiUpdate <> "1");

			// Pic2
			$this->Pic2->setDbValueDef($rsnew, $this->Pic2->CurrentValue, NULL, $this->Pic2->ReadOnly || $this->Pic2->MultiUpdate <> "1");

			// GraphPath
			$this->GraphPath->setDbValueDef($rsnew, $this->GraphPath->CurrentValue, NULL, $this->GraphPath->ReadOnly || $this->GraphPath->MultiUpdate <> "1");

			// MachineCD
			$this->MachineCD->setDbValueDef($rsnew, $this->MachineCD->CurrentValue, NULL, $this->MachineCD->ReadOnly || $this->MachineCD->MultiUpdate <> "1");

			// TestCancel
			$this->TestCancel->setDbValueDef($rsnew, $this->TestCancel->CurrentValue, NULL, $this->TestCancel->ReadOnly || $this->TestCancel->MultiUpdate <> "1");

			// OutSource
			$this->OutSource->setDbValueDef($rsnew, $this->OutSource->CurrentValue, NULL, $this->OutSource->ReadOnly || $this->OutSource->MultiUpdate <> "1");

			// Printed
			$this->Printed->setDbValueDef($rsnew, $this->Printed->CurrentValue, NULL, $this->Printed->ReadOnly || $this->Printed->MultiUpdate <> "1");

			// PrintBy
			$this->PrintBy->setDbValueDef($rsnew, $this->PrintBy->CurrentValue, NULL, $this->PrintBy->ReadOnly || $this->PrintBy->MultiUpdate <> "1");

			// PrintDate
			$this->PrintDate->setDbValueDef($rsnew, UnFormatDateTime($this->PrintDate->CurrentValue, 0), NULL, $this->PrintDate->ReadOnly || $this->PrintDate->MultiUpdate <> "1");

			// BillingDate
			$this->BillingDate->setDbValueDef($rsnew, UnFormatDateTime($this->BillingDate->CurrentValue, 0), NULL, $this->BillingDate->ReadOnly || $this->BillingDate->MultiUpdate <> "1");

			// BilledBy
			$this->BilledBy->setDbValueDef($rsnew, $this->BilledBy->CurrentValue, NULL, $this->BilledBy->ReadOnly || $this->BilledBy->MultiUpdate <> "1");

			// Resulted
			$this->Resulted->setDbValueDef($rsnew, $this->Resulted->CurrentValue, NULL, $this->Resulted->ReadOnly || $this->Resulted->MultiUpdate <> "1");

			// ResultDate
			$this->ResultDate->setDbValueDef($rsnew, UnFormatDateTime($this->ResultDate->CurrentValue, 0), NULL, $this->ResultDate->ReadOnly || $this->ResultDate->MultiUpdate <> "1");

			// ResultedBy
			$this->ResultedBy->setDbValueDef($rsnew, $this->ResultedBy->CurrentValue, NULL, $this->ResultedBy->ReadOnly || $this->ResultedBy->MultiUpdate <> "1");

			// SampleDate
			$this->SampleDate->setDbValueDef($rsnew, UnFormatDateTime($this->SampleDate->CurrentValue, 0), NULL, $this->SampleDate->ReadOnly || $this->SampleDate->MultiUpdate <> "1");

			// SampleUser
			$this->SampleUser->setDbValueDef($rsnew, $this->SampleUser->CurrentValue, NULL, $this->SampleUser->ReadOnly || $this->SampleUser->MultiUpdate <> "1");

			// Sampled
			$this->Sampled->setDbValueDef($rsnew, $this->Sampled->CurrentValue, NULL, $this->Sampled->ReadOnly || $this->Sampled->MultiUpdate <> "1");

			// ReceivedDate
			$this->ReceivedDate->setDbValueDef($rsnew, UnFormatDateTime($this->ReceivedDate->CurrentValue, 0), NULL, $this->ReceivedDate->ReadOnly || $this->ReceivedDate->MultiUpdate <> "1");

			// ReceivedUser
			$this->ReceivedUser->setDbValueDef($rsnew, $this->ReceivedUser->CurrentValue, NULL, $this->ReceivedUser->ReadOnly || $this->ReceivedUser->MultiUpdate <> "1");

			// Recevied
			$this->Recevied->setDbValueDef($rsnew, $this->Recevied->CurrentValue, NULL, $this->Recevied->ReadOnly || $this->Recevied->MultiUpdate <> "1");

			// DeptRecvDate
			$this->DeptRecvDate->setDbValueDef($rsnew, UnFormatDateTime($this->DeptRecvDate->CurrentValue, 0), NULL, $this->DeptRecvDate->ReadOnly || $this->DeptRecvDate->MultiUpdate <> "1");

			// DeptRecvUser
			$this->DeptRecvUser->setDbValueDef($rsnew, $this->DeptRecvUser->CurrentValue, NULL, $this->DeptRecvUser->ReadOnly || $this->DeptRecvUser->MultiUpdate <> "1");

			// DeptRecived
			$this->DeptRecived->setDbValueDef($rsnew, $this->DeptRecived->CurrentValue, NULL, $this->DeptRecived->ReadOnly || $this->DeptRecived->MultiUpdate <> "1");

			// SAuthDate
			$this->SAuthDate->setDbValueDef($rsnew, UnFormatDateTime($this->SAuthDate->CurrentValue, 0), NULL, $this->SAuthDate->ReadOnly || $this->SAuthDate->MultiUpdate <> "1");

			// SAuthBy
			$this->SAuthBy->setDbValueDef($rsnew, $this->SAuthBy->CurrentValue, NULL, $this->SAuthBy->ReadOnly || $this->SAuthBy->MultiUpdate <> "1");

			// SAuthendicate
			$this->SAuthendicate->setDbValueDef($rsnew, $this->SAuthendicate->CurrentValue, NULL, $this->SAuthendicate->ReadOnly || $this->SAuthendicate->MultiUpdate <> "1");

			// AuthDate
			$this->AuthDate->setDbValueDef($rsnew, UnFormatDateTime($this->AuthDate->CurrentValue, 0), NULL, $this->AuthDate->ReadOnly || $this->AuthDate->MultiUpdate <> "1");

			// AuthBy
			$this->AuthBy->setDbValueDef($rsnew, $this->AuthBy->CurrentValue, NULL, $this->AuthBy->ReadOnly || $this->AuthBy->MultiUpdate <> "1");

			// Authencate
			$this->Authencate->setDbValueDef($rsnew, $this->Authencate->CurrentValue, NULL, $this->Authencate->ReadOnly || $this->Authencate->MultiUpdate <> "1");

			// EditDate
			$this->EditDate->setDbValueDef($rsnew, UnFormatDateTime($this->EditDate->CurrentValue, 0), NULL, $this->EditDate->ReadOnly || $this->EditDate->MultiUpdate <> "1");

			// EditBy
			$this->EditBy->setDbValueDef($rsnew, $this->EditBy->CurrentValue, NULL, $this->EditBy->ReadOnly || $this->EditBy->MultiUpdate <> "1");

			// Editted
			$this->Editted->setDbValueDef($rsnew, $this->Editted->CurrentValue, NULL, $this->Editted->ReadOnly || $this->Editted->MultiUpdate <> "1");

			// PatID
			$this->PatID->setDbValueDef($rsnew, $this->PatID->CurrentValue, NULL, $this->PatID->ReadOnly || $this->PatID->MultiUpdate <> "1");

			// PatientId
			$this->PatientId->setDbValueDef($rsnew, $this->PatientId->CurrentValue, NULL, $this->PatientId->ReadOnly || $this->PatientId->MultiUpdate <> "1");

			// Mobile
			$this->Mobile->setDbValueDef($rsnew, $this->Mobile->CurrentValue, NULL, $this->Mobile->ReadOnly || $this->Mobile->MultiUpdate <> "1");

			// CId
			$this->CId->setDbValueDef($rsnew, $this->CId->CurrentValue, NULL, $this->CId->ReadOnly || $this->CId->MultiUpdate <> "1");

			// Order
			$this->Order->setDbValueDef($rsnew, $this->Order->CurrentValue, NULL, $this->Order->ReadOnly || $this->Order->MultiUpdate <> "1");

			// Form
			$this->Form->setDbValueDef($rsnew, $this->Form->CurrentValue, NULL, $this->Form->ReadOnly || $this->Form->MultiUpdate <> "1");

			// ResType
			$this->ResType->setDbValueDef($rsnew, $this->ResType->CurrentValue, NULL, $this->ResType->ReadOnly || $this->ResType->MultiUpdate <> "1");

			// Sample
			$this->Sample->setDbValueDef($rsnew, $this->Sample->CurrentValue, NULL, $this->Sample->ReadOnly || $this->Sample->MultiUpdate <> "1");

			// NoD
			$this->NoD->setDbValueDef($rsnew, $this->NoD->CurrentValue, NULL, $this->NoD->ReadOnly || $this->NoD->MultiUpdate <> "1");

			// BillOrder
			$this->BillOrder->setDbValueDef($rsnew, $this->BillOrder->CurrentValue, NULL, $this->BillOrder->ReadOnly || $this->BillOrder->MultiUpdate <> "1");

			// Formula
			$this->Formula->setDbValueDef($rsnew, $this->Formula->CurrentValue, NULL, $this->Formula->ReadOnly || $this->Formula->MultiUpdate <> "1");

			// Inactive
			$this->Inactive->setDbValueDef($rsnew, $this->Inactive->CurrentValue, NULL, $this->Inactive->ReadOnly || $this->Inactive->MultiUpdate <> "1");

			// CollSample
			$this->CollSample->setDbValueDef($rsnew, $this->CollSample->CurrentValue, NULL, $this->CollSample->ReadOnly || $this->CollSample->MultiUpdate <> "1");

			// TestType
			$this->TestType->setDbValueDef($rsnew, $this->TestType->CurrentValue, NULL, $this->TestType->ReadOnly || $this->TestType->MultiUpdate <> "1");

			// Repeated
			$this->Repeated->setDbValueDef($rsnew, $this->Repeated->CurrentValue, NULL, $this->Repeated->ReadOnly || $this->Repeated->MultiUpdate <> "1");

			// RepeatedBy
			$this->RepeatedBy->setDbValueDef($rsnew, $this->RepeatedBy->CurrentValue, NULL, $this->RepeatedBy->ReadOnly || $this->RepeatedBy->MultiUpdate <> "1");

			// RepeatedDate
			$this->RepeatedDate->setDbValueDef($rsnew, UnFormatDateTime($this->RepeatedDate->CurrentValue, 0), NULL, $this->RepeatedDate->ReadOnly || $this->RepeatedDate->MultiUpdate <> "1");

			// serviceID
			$this->serviceID->setDbValueDef($rsnew, $this->serviceID->CurrentValue, NULL, $this->serviceID->ReadOnly || $this->serviceID->MultiUpdate <> "1");

			// Service_Type
			$this->Service_Type->setDbValueDef($rsnew, $this->Service_Type->CurrentValue, NULL, $this->Service_Type->ReadOnly || $this->Service_Type->MultiUpdate <> "1");

			// Service_Department
			$this->Service_Department->setDbValueDef($rsnew, $this->Service_Department->CurrentValue, NULL, $this->Service_Department->ReadOnly || $this->Service_Department->MultiUpdate <> "1");

			// RequestNo
			$this->RequestNo->setDbValueDef($rsnew, $this->RequestNo->CurrentValue, NULL, $this->RequestNo->ReadOnly || $this->RequestNo->MultiUpdate <> "1");

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
		$Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("patient_serviceslist.php"), "", $this->TableVar, TRUE);
		$pageId = "update";
		$Breadcrumb->add("update", $pageId, $url);
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
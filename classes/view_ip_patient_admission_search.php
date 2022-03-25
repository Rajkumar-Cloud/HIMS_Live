<?php
namespace PHPMaker2019\HIMS;

/**
 * Page class
 */
class view_ip_patient_admission_search extends view_ip_patient_admission
{

	// Page ID
	public $PageID = "search";

	// Project ID
	public $ProjectID = "{EA4F6D13-AF8F-428D-9EA7-BA88D1107EC3}";

	// Table name
	public $TableName = 'view_ip_patient_admission';

	// Page object name
	public $PageObjName = "view_ip_patient_admission_search";

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

		// Table object (view_ip_patient_admission)
		if (!isset($GLOBALS["view_ip_patient_admission"]) || get_class($GLOBALS["view_ip_patient_admission"]) == PROJECT_NAMESPACE . "view_ip_patient_admission") {
			$GLOBALS["view_ip_patient_admission"] = &$this;
			$GLOBALS["Table"] = &$GLOBALS["view_ip_patient_admission"];
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
			define(PROJECT_NAMESPACE . "TABLE_NAME", 'view_ip_patient_admission');

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
		global $EXPORT, $view_ip_patient_admission;
		if ($this->CustomExport && $this->CustomExport == $this->Export && array_key_exists($this->CustomExport, $EXPORT)) {
				$content = ob_get_contents();
			if ($ExportFileName == "")
				$ExportFileName = $this->TableVar;
			$class = PROJECT_NAMESPACE . $EXPORT[$this->CustomExport];
			if (class_exists($class)) {
				$doc = new $class($view_ip_patient_admission);
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
					if ($pageName == "view_ip_patient_admissionview.php")
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
					$this->terminate(GetUrl("view_ip_patient_admissionlist.php"));
				else
					$this->terminate(GetUrl("login.php"));
				return;
			}
		}

		// Create form object
		$CurrentForm = new HttpForm();
		$this->CurrentAction = Param("action"); // Set up current action
		$this->id->setVisibility();
		$this->mrnNo->setVisibility();
		$this->PatientID->setVisibility();
		$this->patient_name->setVisibility();
		$this->mobileno->setVisibility();
		$this->profilePic->setVisibility();
		$this->gender->setVisibility();
		$this->age->setVisibility();
		$this->Package->setVisibility();
		$this->typeRegsisteration->setVisibility();
		$this->PaymentCategory->setVisibility();
		$this->admission_consultant_id->setVisibility();
		$this->leading_consultant_id->setVisibility();
		$this->cause->setVisibility();
		$this->admission_date->setVisibility();
		$this->release_date->setVisibility();
		$this->PaymentStatus->setVisibility();
		$this->status->setVisibility();
		$this->createdby->setVisibility();
		$this->createddatetime->setVisibility();
		$this->modifiedby->setVisibility();
		$this->modifieddatetime->setVisibility();
		$this->HospID->setVisibility();
		$this->ReferedByDr->setVisibility();
		$this->ReferClinicname->setVisibility();
		$this->ReferCity->setVisibility();
		$this->ReferMobileNo->setVisibility();
		$this->ReferA4TreatingConsultant->setVisibility();
		$this->PurposreReferredfor->setVisibility();
		$this->BillClosing->setVisibility();
		$this->BillClosingDate->setVisibility();
		$this->BillNumber->setVisibility();
		$this->ClosingAmount->setVisibility();
		$this->ClosingType->setVisibility();
		$this->BillAmount->setVisibility();
		$this->billclosedBy->setVisibility();
		$this->bllcloseByDate->setVisibility();
		$this->ReportHeader->setVisibility();
		$this->Procedure->setVisibility();
		$this->Consultant->setVisibility();
		$this->Anesthetist->setVisibility();
		$this->Amound->setVisibility();
		$this->physician_id->setVisibility();
		$this->PartnerID->setVisibility();
		$this->PartnerName->setVisibility();
		$this->PartnerMobile->setVisibility();
		$this->patient_id->setVisibility();
		$this->Cid->setVisibility();
		$this->PartId->setVisibility();
		$this->IDProof->setVisibility();
		$this->DOB->setVisibility();
		$this->AdviceToOtherHospital->setVisibility();
		$this->Reason->setVisibility();
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
		$this->setupLookupOptions($this->typeRegsisteration);
		$this->setupLookupOptions($this->PaymentCategory);
		$this->setupLookupOptions($this->PaymentStatus);
		$this->setupLookupOptions($this->HospID);
		$this->setupLookupOptions($this->ReferedByDr);
		$this->setupLookupOptions($this->Procedure);
		$this->setupLookupOptions($this->Consultant);
		$this->setupLookupOptions($this->Anesthetist);
		$this->setupLookupOptions($this->physician_id);
		$this->setupLookupOptions($this->patient_id);
		$this->setupLookupOptions($this->Cid);

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
					$srchStr = "view_ip_patient_admissionlist.php" . "?" . $srchStr;
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
		$this->buildSearchUrl($srchUrl, $this->mrnNo); // mrnNo
		$this->buildSearchUrl($srchUrl, $this->PatientID); // PatientID
		$this->buildSearchUrl($srchUrl, $this->patient_name); // patient_name
		$this->buildSearchUrl($srchUrl, $this->mobileno); // mobileno
		$this->buildSearchUrl($srchUrl, $this->profilePic); // profilePic
		$this->buildSearchUrl($srchUrl, $this->gender); // gender
		$this->buildSearchUrl($srchUrl, $this->age); // age
		$this->buildSearchUrl($srchUrl, $this->Package); // Package
		$this->buildSearchUrl($srchUrl, $this->typeRegsisteration); // typeRegsisteration
		$this->buildSearchUrl($srchUrl, $this->PaymentCategory); // PaymentCategory
		$this->buildSearchUrl($srchUrl, $this->admission_consultant_id); // admission_consultant_id
		$this->buildSearchUrl($srchUrl, $this->leading_consultant_id); // leading_consultant_id
		$this->buildSearchUrl($srchUrl, $this->cause); // cause
		$this->buildSearchUrl($srchUrl, $this->admission_date); // admission_date
		$this->buildSearchUrl($srchUrl, $this->release_date); // release_date
		$this->buildSearchUrl($srchUrl, $this->PaymentStatus); // PaymentStatus
		$this->buildSearchUrl($srchUrl, $this->status); // status
		$this->buildSearchUrl($srchUrl, $this->createdby); // createdby
		$this->buildSearchUrl($srchUrl, $this->createddatetime); // createddatetime
		$this->buildSearchUrl($srchUrl, $this->modifiedby); // modifiedby
		$this->buildSearchUrl($srchUrl, $this->modifieddatetime); // modifieddatetime
		$this->buildSearchUrl($srchUrl, $this->HospID); // HospID
		$this->buildSearchUrl($srchUrl, $this->ReferedByDr); // ReferedByDr
		$this->buildSearchUrl($srchUrl, $this->ReferClinicname); // ReferClinicname
		$this->buildSearchUrl($srchUrl, $this->ReferCity); // ReferCity
		$this->buildSearchUrl($srchUrl, $this->ReferMobileNo); // ReferMobileNo
		$this->buildSearchUrl($srchUrl, $this->ReferA4TreatingConsultant); // ReferA4TreatingConsultant
		$this->buildSearchUrl($srchUrl, $this->PurposreReferredfor); // PurposreReferredfor
		$this->buildSearchUrl($srchUrl, $this->BillClosing); // BillClosing
		$this->buildSearchUrl($srchUrl, $this->BillClosingDate); // BillClosingDate
		$this->buildSearchUrl($srchUrl, $this->BillNumber); // BillNumber
		$this->buildSearchUrl($srchUrl, $this->ClosingAmount); // ClosingAmount
		$this->buildSearchUrl($srchUrl, $this->ClosingType); // ClosingType
		$this->buildSearchUrl($srchUrl, $this->BillAmount); // BillAmount
		$this->buildSearchUrl($srchUrl, $this->billclosedBy); // billclosedBy
		$this->buildSearchUrl($srchUrl, $this->bllcloseByDate); // bllcloseByDate
		$this->buildSearchUrl($srchUrl, $this->ReportHeader); // ReportHeader
		$this->buildSearchUrl($srchUrl, $this->Procedure); // Procedure
		$this->buildSearchUrl($srchUrl, $this->Consultant); // Consultant
		$this->buildSearchUrl($srchUrl, $this->Anesthetist); // Anesthetist
		$this->buildSearchUrl($srchUrl, $this->Amound); // Amound
		$this->buildSearchUrl($srchUrl, $this->physician_id); // physician_id
		$this->buildSearchUrl($srchUrl, $this->PartnerID); // PartnerID
		$this->buildSearchUrl($srchUrl, $this->PartnerName); // PartnerName
		$this->buildSearchUrl($srchUrl, $this->PartnerMobile); // PartnerMobile
		$this->buildSearchUrl($srchUrl, $this->patient_id); // patient_id
		$this->buildSearchUrl($srchUrl, $this->Cid); // Cid
		$this->buildSearchUrl($srchUrl, $this->PartId); // PartId
		$this->buildSearchUrl($srchUrl, $this->IDProof); // IDProof
		$this->buildSearchUrl($srchUrl, $this->DOB); // DOB
		$this->buildSearchUrl($srchUrl, $this->AdviceToOtherHospital); // AdviceToOtherHospital
		$this->buildSearchUrl($srchUrl, $this->Reason); // Reason
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

		// mrnNo
		if (!$this->isAddOrEdit())
			$this->mrnNo->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_mrnNo"));
		$this->mrnNo->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_mrnNo"));

		// PatientID
		if (!$this->isAddOrEdit())
			$this->PatientID->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_PatientID"));
		$this->PatientID->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_PatientID"));

		// patient_name
		if (!$this->isAddOrEdit())
			$this->patient_name->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_patient_name"));
		$this->patient_name->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_patient_name"));

		// mobileno
		if (!$this->isAddOrEdit())
			$this->mobileno->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_mobileno"));
		$this->mobileno->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_mobileno"));

		// profilePic
		if (!$this->isAddOrEdit())
			$this->profilePic->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_profilePic"));
		$this->profilePic->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_profilePic"));

		// gender
		if (!$this->isAddOrEdit())
			$this->gender->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_gender"));
		$this->gender->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_gender"));

		// age
		if (!$this->isAddOrEdit())
			$this->age->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_age"));
		$this->age->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_age"));

		// Package
		if (!$this->isAddOrEdit())
			$this->Package->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_Package"));
		$this->Package->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_Package"));

		// typeRegsisteration
		if (!$this->isAddOrEdit())
			$this->typeRegsisteration->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_typeRegsisteration"));
		$this->typeRegsisteration->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_typeRegsisteration"));

		// PaymentCategory
		if (!$this->isAddOrEdit())
			$this->PaymentCategory->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_PaymentCategory"));
		$this->PaymentCategory->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_PaymentCategory"));

		// admission_consultant_id
		if (!$this->isAddOrEdit())
			$this->admission_consultant_id->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_admission_consultant_id"));
		$this->admission_consultant_id->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_admission_consultant_id"));

		// leading_consultant_id
		if (!$this->isAddOrEdit())
			$this->leading_consultant_id->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_leading_consultant_id"));
		$this->leading_consultant_id->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_leading_consultant_id"));

		// cause
		if (!$this->isAddOrEdit())
			$this->cause->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_cause"));
		$this->cause->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_cause"));

		// admission_date
		if (!$this->isAddOrEdit())
			$this->admission_date->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_admission_date"));
		$this->admission_date->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_admission_date"));

		// release_date
		if (!$this->isAddOrEdit())
			$this->release_date->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_release_date"));
		$this->release_date->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_release_date"));

		// PaymentStatus
		if (!$this->isAddOrEdit())
			$this->PaymentStatus->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_PaymentStatus"));
		$this->PaymentStatus->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_PaymentStatus"));

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

		// HospID
		if (!$this->isAddOrEdit())
			$this->HospID->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_HospID"));
		$this->HospID->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_HospID"));

		// ReferedByDr
		if (!$this->isAddOrEdit())
			$this->ReferedByDr->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_ReferedByDr"));
		$this->ReferedByDr->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_ReferedByDr"));

		// ReferClinicname
		if (!$this->isAddOrEdit())
			$this->ReferClinicname->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_ReferClinicname"));
		$this->ReferClinicname->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_ReferClinicname"));

		// ReferCity
		if (!$this->isAddOrEdit())
			$this->ReferCity->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_ReferCity"));
		$this->ReferCity->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_ReferCity"));

		// ReferMobileNo
		if (!$this->isAddOrEdit())
			$this->ReferMobileNo->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_ReferMobileNo"));
		$this->ReferMobileNo->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_ReferMobileNo"));

		// ReferA4TreatingConsultant
		if (!$this->isAddOrEdit())
			$this->ReferA4TreatingConsultant->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_ReferA4TreatingConsultant"));
		$this->ReferA4TreatingConsultant->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_ReferA4TreatingConsultant"));

		// PurposreReferredfor
		if (!$this->isAddOrEdit())
			$this->PurposreReferredfor->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_PurposreReferredfor"));
		$this->PurposreReferredfor->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_PurposreReferredfor"));

		// BillClosing
		if (!$this->isAddOrEdit())
			$this->BillClosing->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_BillClosing"));
		$this->BillClosing->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_BillClosing"));
		if (is_array($this->BillClosing->AdvancedSearch->SearchValue))
			$this->BillClosing->AdvancedSearch->SearchValue = implode(",", $this->BillClosing->AdvancedSearch->SearchValue);
		if (is_array($this->BillClosing->AdvancedSearch->SearchValue2))
			$this->BillClosing->AdvancedSearch->SearchValue2 = implode(",", $this->BillClosing->AdvancedSearch->SearchValue2);

		// BillClosingDate
		if (!$this->isAddOrEdit())
			$this->BillClosingDate->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_BillClosingDate"));
		$this->BillClosingDate->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_BillClosingDate"));

		// BillNumber
		if (!$this->isAddOrEdit())
			$this->BillNumber->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_BillNumber"));
		$this->BillNumber->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_BillNumber"));

		// ClosingAmount
		if (!$this->isAddOrEdit())
			$this->ClosingAmount->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_ClosingAmount"));
		$this->ClosingAmount->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_ClosingAmount"));

		// ClosingType
		if (!$this->isAddOrEdit())
			$this->ClosingType->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_ClosingType"));
		$this->ClosingType->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_ClosingType"));

		// BillAmount
		if (!$this->isAddOrEdit())
			$this->BillAmount->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_BillAmount"));
		$this->BillAmount->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_BillAmount"));

		// billclosedBy
		if (!$this->isAddOrEdit())
			$this->billclosedBy->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_billclosedBy"));
		$this->billclosedBy->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_billclosedBy"));

		// bllcloseByDate
		if (!$this->isAddOrEdit())
			$this->bllcloseByDate->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_bllcloseByDate"));
		$this->bllcloseByDate->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_bllcloseByDate"));

		// ReportHeader
		if (!$this->isAddOrEdit())
			$this->ReportHeader->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_ReportHeader"));
		$this->ReportHeader->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_ReportHeader"));
		if (is_array($this->ReportHeader->AdvancedSearch->SearchValue))
			$this->ReportHeader->AdvancedSearch->SearchValue = implode(",", $this->ReportHeader->AdvancedSearch->SearchValue);
		if (is_array($this->ReportHeader->AdvancedSearch->SearchValue2))
			$this->ReportHeader->AdvancedSearch->SearchValue2 = implode(",", $this->ReportHeader->AdvancedSearch->SearchValue2);

		// Procedure
		if (!$this->isAddOrEdit())
			$this->Procedure->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_Procedure"));
		$this->Procedure->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_Procedure"));

		// Consultant
		if (!$this->isAddOrEdit())
			$this->Consultant->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_Consultant"));
		$this->Consultant->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_Consultant"));

		// Anesthetist
		if (!$this->isAddOrEdit())
			$this->Anesthetist->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_Anesthetist"));
		$this->Anesthetist->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_Anesthetist"));

		// Amound
		if (!$this->isAddOrEdit())
			$this->Amound->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_Amound"));
		$this->Amound->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_Amound"));

		// physician_id
		if (!$this->isAddOrEdit())
			$this->physician_id->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_physician_id"));
		$this->physician_id->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_physician_id"));

		// PartnerID
		if (!$this->isAddOrEdit())
			$this->PartnerID->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_PartnerID"));
		$this->PartnerID->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_PartnerID"));

		// PartnerName
		if (!$this->isAddOrEdit())
			$this->PartnerName->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_PartnerName"));
		$this->PartnerName->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_PartnerName"));

		// PartnerMobile
		if (!$this->isAddOrEdit())
			$this->PartnerMobile->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_PartnerMobile"));
		$this->PartnerMobile->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_PartnerMobile"));

		// patient_id
		if (!$this->isAddOrEdit())
			$this->patient_id->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_patient_id"));
		$this->patient_id->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_patient_id"));

		// Cid
		if (!$this->isAddOrEdit())
			$this->Cid->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_Cid"));
		$this->Cid->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_Cid"));

		// PartId
		if (!$this->isAddOrEdit())
			$this->PartId->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_PartId"));
		$this->PartId->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_PartId"));

		// IDProof
		if (!$this->isAddOrEdit())
			$this->IDProof->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_IDProof"));
		$this->IDProof->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_IDProof"));

		// DOB
		if (!$this->isAddOrEdit())
			$this->DOB->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_DOB"));
		$this->DOB->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_DOB"));

		// AdviceToOtherHospital
		if (!$this->isAddOrEdit())
			$this->AdviceToOtherHospital->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_AdviceToOtherHospital"));
		$this->AdviceToOtherHospital->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_AdviceToOtherHospital"));
		if (is_array($this->AdviceToOtherHospital->AdvancedSearch->SearchValue))
			$this->AdviceToOtherHospital->AdvancedSearch->SearchValue = implode(",", $this->AdviceToOtherHospital->AdvancedSearch->SearchValue);
		if (is_array($this->AdviceToOtherHospital->AdvancedSearch->SearchValue2))
			$this->AdviceToOtherHospital->AdvancedSearch->SearchValue2 = implode(",", $this->AdviceToOtherHospital->AdvancedSearch->SearchValue2);

		// Reason
		if (!$this->isAddOrEdit())
			$this->Reason->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_Reason"));
		$this->Reason->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_Reason"));
	}

	// Render row values based on field settings
	public function renderRow()
	{
		global $Security, $Language, $CurrentLanguage;

		// Initialize URLs
		// Convert decimal values if posted back

		if ($this->Amound->FormValue == $this->Amound->CurrentValue && is_numeric(ConvertToFloatString($this->Amound->CurrentValue)))
			$this->Amound->CurrentValue = ConvertToFloatString($this->Amound->CurrentValue);

		// Call Row_Rendering event
		$this->Row_Rendering();

		// Common render codes for all row types
		// id
		// mrnNo
		// PatientID
		// patient_name
		// mobileno
		// profilePic
		// gender
		// age
		// Package
		// typeRegsisteration
		// PaymentCategory
		// admission_consultant_id
		// leading_consultant_id
		// cause
		// admission_date
		// release_date
		// PaymentStatus
		// status
		// createdby
		// createddatetime
		// modifiedby
		// modifieddatetime
		// HospID
		// ReferedByDr
		// ReferClinicname
		// ReferCity
		// ReferMobileNo
		// ReferA4TreatingConsultant
		// PurposreReferredfor
		// BillClosing
		// BillClosingDate
		// BillNumber
		// ClosingAmount
		// ClosingType
		// BillAmount
		// billclosedBy
		// bllcloseByDate
		// ReportHeader
		// Procedure
		// Consultant
		// Anesthetist
		// Amound
		// physician_id
		// PartnerID
		// PartnerName
		// PartnerMobile
		// patient_id
		// Cid
		// PartId
		// IDProof
		// DOB
		// AdviceToOtherHospital
		// Reason

		if ($this->RowType == ROWTYPE_VIEW) { // View row

			// id
			$this->id->ViewValue = $this->id->CurrentValue;
			$this->id->ViewCustomAttributes = "";

			// mrnNo
			$this->mrnNo->ViewValue = $this->mrnNo->CurrentValue;
			$this->mrnNo->ViewCustomAttributes = "";

			// PatientID
			$this->PatientID->ViewValue = $this->PatientID->CurrentValue;
			$this->PatientID->ViewCustomAttributes = "";

			// patient_name
			$this->patient_name->ViewValue = $this->patient_name->CurrentValue;
			$this->patient_name->ViewCustomAttributes = "";

			// mobileno
			$this->mobileno->ViewValue = $this->mobileno->CurrentValue;
			$this->mobileno->ViewCustomAttributes = "";

			// profilePic
			$this->profilePic->ViewValue = $this->profilePic->CurrentValue;
			$this->profilePic->ViewCustomAttributes = "";

			// gender
			$this->gender->ViewValue = $this->gender->CurrentValue;
			$this->gender->ViewCustomAttributes = "";

			// age
			$this->age->ViewValue = $this->age->CurrentValue;
			$this->age->ViewCustomAttributes = "";

			// Package
			$this->Package->ViewValue = $this->Package->CurrentValue;
			$this->Package->ViewCustomAttributes = "";

			// typeRegsisteration
			$curVal = strval($this->typeRegsisteration->CurrentValue);
			if ($curVal <> "") {
				$this->typeRegsisteration->ViewValue = $this->typeRegsisteration->lookupCacheOption($curVal);
				if ($this->typeRegsisteration->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`RegsistrationType`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->typeRegsisteration->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = $rswrk->fields('df');
						$this->typeRegsisteration->ViewValue = $this->typeRegsisteration->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->typeRegsisteration->ViewValue = $this->typeRegsisteration->CurrentValue;
					}
				}
			} else {
				$this->typeRegsisteration->ViewValue = NULL;
			}
			$this->typeRegsisteration->ViewCustomAttributes = "";

			// PaymentCategory
			$curVal = strval($this->PaymentCategory->CurrentValue);
			if ($curVal <> "") {
				$this->PaymentCategory->ViewValue = $this->PaymentCategory->lookupCacheOption($curVal);
				if ($this->PaymentCategory->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`Category`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->PaymentCategory->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = $rswrk->fields('df');
						$this->PaymentCategory->ViewValue = $this->PaymentCategory->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->PaymentCategory->ViewValue = $this->PaymentCategory->CurrentValue;
					}
				}
			} else {
				$this->PaymentCategory->ViewValue = NULL;
			}
			$this->PaymentCategory->ViewCustomAttributes = "";

			// admission_consultant_id
			$this->admission_consultant_id->ViewValue = $this->admission_consultant_id->CurrentValue;
			$this->admission_consultant_id->ViewValue = FormatNumber($this->admission_consultant_id->ViewValue, 0, -2, -2, -2);
			$this->admission_consultant_id->ViewCustomAttributes = "";

			// leading_consultant_id
			$this->leading_consultant_id->ViewValue = $this->leading_consultant_id->CurrentValue;
			$this->leading_consultant_id->ViewValue = FormatNumber($this->leading_consultant_id->ViewValue, 0, -2, -2, -2);
			$this->leading_consultant_id->ViewCustomAttributes = "";

			// cause
			$this->cause->ViewValue = $this->cause->CurrentValue;
			$this->cause->ViewCustomAttributes = "";

			// admission_date
			$this->admission_date->ViewValue = $this->admission_date->CurrentValue;
			$this->admission_date->ViewValue = FormatDateTime($this->admission_date->ViewValue, 11);
			$this->admission_date->ViewCustomAttributes = "";

			// release_date
			$this->release_date->ViewValue = $this->release_date->CurrentValue;
			$this->release_date->ViewValue = FormatDateTime($this->release_date->ViewValue, 11);
			$this->release_date->ViewCustomAttributes = "";

			// PaymentStatus
			$curVal = strval($this->PaymentStatus->CurrentValue);
			if ($curVal <> "") {
				$this->PaymentStatus->ViewValue = $this->PaymentStatus->lookupCacheOption($curVal);
				if ($this->PaymentStatus->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
					$sqlWrk = $this->PaymentStatus->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = $rswrk->fields('df');
						$this->PaymentStatus->ViewValue = $this->PaymentStatus->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->PaymentStatus->ViewValue = $this->PaymentStatus->CurrentValue;
					}
				}
			} else {
				$this->PaymentStatus->ViewValue = NULL;
			}
			$this->PaymentStatus->ViewCustomAttributes = "";

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

			// HospID
			$curVal = strval($this->HospID->CurrentValue);
			if ($curVal <> "") {
				$this->HospID->ViewValue = $this->HospID->lookupCacheOption($curVal);
				if ($this->HospID->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
					$sqlWrk = $this->HospID->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = $rswrk->fields('df');
						$this->HospID->ViewValue = $this->HospID->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->HospID->ViewValue = $this->HospID->CurrentValue;
					}
				}
			} else {
				$this->HospID->ViewValue = NULL;
			}
			$this->HospID->ViewCustomAttributes = "";

			// ReferedByDr
			$curVal = strval($this->ReferedByDr->CurrentValue);
			if ($curVal <> "") {
				$this->ReferedByDr->ViewValue = $this->ReferedByDr->lookupCacheOption($curVal);
				if ($this->ReferedByDr->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`reference`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->ReferedByDr->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = $rswrk->fields('df');
						$this->ReferedByDr->ViewValue = $this->ReferedByDr->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->ReferedByDr->ViewValue = $this->ReferedByDr->CurrentValue;
					}
				}
			} else {
				$this->ReferedByDr->ViewValue = NULL;
			}
			$this->ReferedByDr->ViewCustomAttributes = "";

			// ReferClinicname
			$this->ReferClinicname->ViewValue = $this->ReferClinicname->CurrentValue;
			$this->ReferClinicname->ViewCustomAttributes = "";

			// ReferCity
			$this->ReferCity->ViewValue = $this->ReferCity->CurrentValue;
			$this->ReferCity->ViewCustomAttributes = "";

			// ReferMobileNo
			$this->ReferMobileNo->ViewValue = $this->ReferMobileNo->CurrentValue;
			$this->ReferMobileNo->ViewCustomAttributes = "";

			// ReferA4TreatingConsultant
			$this->ReferA4TreatingConsultant->ViewValue = $this->ReferA4TreatingConsultant->CurrentValue;
			$this->ReferA4TreatingConsultant->ViewCustomAttributes = "";

			// PurposreReferredfor
			$this->PurposreReferredfor->ViewValue = $this->PurposreReferredfor->CurrentValue;
			$this->PurposreReferredfor->ViewCustomAttributes = "";

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

			// BillClosingDate
			$this->BillClosingDate->ViewValue = $this->BillClosingDate->CurrentValue;
			$this->BillClosingDate->ViewValue = FormatDateTime($this->BillClosingDate->ViewValue, 0);
			$this->BillClosingDate->ViewCustomAttributes = "";

			// BillNumber
			$this->BillNumber->ViewValue = $this->BillNumber->CurrentValue;
			$this->BillNumber->ViewCustomAttributes = "";

			// ClosingAmount
			$this->ClosingAmount->ViewValue = $this->ClosingAmount->CurrentValue;
			$this->ClosingAmount->ViewCustomAttributes = "";

			// ClosingType
			$this->ClosingType->ViewValue = $this->ClosingType->CurrentValue;
			$this->ClosingType->ViewCustomAttributes = "";

			// BillAmount
			$this->BillAmount->ViewValue = $this->BillAmount->CurrentValue;
			$this->BillAmount->ViewCustomAttributes = "";

			// billclosedBy
			$this->billclosedBy->ViewValue = $this->billclosedBy->CurrentValue;
			$this->billclosedBy->ViewCustomAttributes = "";

			// bllcloseByDate
			$this->bllcloseByDate->ViewValue = $this->bllcloseByDate->CurrentValue;
			$this->bllcloseByDate->ViewValue = FormatDateTime($this->bllcloseByDate->ViewValue, 0);
			$this->bllcloseByDate->ViewCustomAttributes = "";

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

			// Procedure
			$curVal = strval($this->Procedure->CurrentValue);
			if ($curVal <> "") {
				$this->Procedure->ViewValue = $this->Procedure->lookupCacheOption($curVal);
				if ($this->Procedure->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`SERVICE`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$lookupFilter = function() {
						return "`HospID`='".HospitalID()."'  and `SERVICE_TYPE` in ('IP Procedure','Op Procedure','IP SERVICE')";
					};
					$lookupFilter = $lookupFilter->bindTo($this);
					$sqlWrk = $this->Procedure->Lookup->getSql(FALSE, $filterWrk, $lookupFilter, $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = $rswrk->fields('df');
						$this->Procedure->ViewValue = $this->Procedure->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->Procedure->ViewValue = $this->Procedure->CurrentValue;
					}
				}
			} else {
				$this->Procedure->ViewValue = NULL;
			}
			$this->Procedure->ViewCustomAttributes = "";

			// Consultant
			$curVal = strval($this->Consultant->CurrentValue);
			if ($curVal <> "") {
				$this->Consultant->ViewValue = $this->Consultant->lookupCacheOption($curVal);
				if ($this->Consultant->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`NAME`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$lookupFilter = function() {
						return "`HospID`='".HospitalID()."'";
					};
					$lookupFilter = $lookupFilter->bindTo($this);
					$sqlWrk = $this->Consultant->Lookup->getSql(FALSE, $filterWrk, $lookupFilter, $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = $rswrk->fields('df');
						$this->Consultant->ViewValue = $this->Consultant->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->Consultant->ViewValue = $this->Consultant->CurrentValue;
					}
				}
			} else {
				$this->Consultant->ViewValue = NULL;
			}
			$this->Consultant->ViewCustomAttributes = "";

			// Anesthetist
			$curVal = strval($this->Anesthetist->CurrentValue);
			if ($curVal <> "") {
				$this->Anesthetist->ViewValue = $this->Anesthetist->lookupCacheOption($curVal);
				if ($this->Anesthetist->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`NAME`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$lookupFilter = function() {
						return "`HospID`='".HospitalID()."'";
					};
					$lookupFilter = $lookupFilter->bindTo($this);
					$sqlWrk = $this->Anesthetist->Lookup->getSql(FALSE, $filterWrk, $lookupFilter, $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = $rswrk->fields('df');
						$this->Anesthetist->ViewValue = $this->Anesthetist->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->Anesthetist->ViewValue = $this->Anesthetist->CurrentValue;
					}
				}
			} else {
				$this->Anesthetist->ViewValue = NULL;
			}
			$this->Anesthetist->ViewCustomAttributes = "";

			// Amound
			$this->Amound->ViewValue = $this->Amound->CurrentValue;
			$this->Amound->ViewValue = FormatNumber($this->Amound->ViewValue, 2, -2, -2, -2);
			$this->Amound->ViewCustomAttributes = "";

			// physician_id
			$curVal = strval($this->physician_id->CurrentValue);
			if ($curVal <> "") {
				$this->physician_id->ViewValue = $this->physician_id->lookupCacheOption($curVal);
				if ($this->physician_id->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
					$lookupFilter = function() {
						return "`HospID`='".HospitalID()."'";
					};
					$lookupFilter = $lookupFilter->bindTo($this);
					$sqlWrk = $this->physician_id->Lookup->getSql(FALSE, $filterWrk, $lookupFilter, $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = $rswrk->fields('df');
						$this->physician_id->ViewValue = $this->physician_id->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->physician_id->ViewValue = $this->physician_id->CurrentValue;
					}
				}
			} else {
				$this->physician_id->ViewValue = NULL;
			}
			$this->physician_id->ViewCustomAttributes = "";

			// PartnerID
			$this->PartnerID->ViewValue = $this->PartnerID->CurrentValue;
			$this->PartnerID->ViewCustomAttributes = "";

			// PartnerName
			$this->PartnerName->ViewValue = $this->PartnerName->CurrentValue;
			$this->PartnerName->ViewCustomAttributes = "";

			// PartnerMobile
			$this->PartnerMobile->ViewValue = $this->PartnerMobile->CurrentValue;
			$this->PartnerMobile->ViewCustomAttributes = "";

			// patient_id
			$curVal = strval($this->patient_id->CurrentValue);
			if ($curVal <> "") {
				$this->patient_id->ViewValue = $this->patient_id->lookupCacheOption($curVal);
				if ($this->patient_id->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
					$sqlWrk = $this->patient_id->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = $rswrk->fields('df');
						$arwrk[2] = $rswrk->fields('df2');
						$arwrk[3] = $rswrk->fields('df3');
						$this->patient_id->ViewValue = $this->patient_id->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->patient_id->ViewValue = $this->patient_id->CurrentValue;
					}
				}
			} else {
				$this->patient_id->ViewValue = NULL;
			}
			$this->patient_id->ViewCustomAttributes = "";

			// Cid
			$curVal = strval($this->Cid->CurrentValue);
			if ($curVal <> "") {
				$this->Cid->ViewValue = $this->Cid->lookupCacheOption($curVal);
				if ($this->Cid->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
					$sqlWrk = $this->Cid->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = $rswrk->fields('df');
						$arwrk[2] = $rswrk->fields('df2');
						$arwrk[3] = $rswrk->fields('df3');
						$arwrk[4] = $rswrk->fields('df4');
						$this->Cid->ViewValue = $this->Cid->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->Cid->ViewValue = $this->Cid->CurrentValue;
					}
				}
			} else {
				$this->Cid->ViewValue = NULL;
			}
			$this->Cid->ViewCustomAttributes = "";

			// PartId
			$this->PartId->ViewValue = $this->PartId->CurrentValue;
			$this->PartId->ViewValue = FormatNumber($this->PartId->ViewValue, 0, -2, -2, -2);
			$this->PartId->ViewCustomAttributes = "";

			// IDProof
			$this->IDProof->ViewValue = $this->IDProof->CurrentValue;
			$this->IDProof->ViewCustomAttributes = "";

			// DOB
			$this->DOB->ViewValue = $this->DOB->CurrentValue;
			$this->DOB->ViewCustomAttributes = "";

			// AdviceToOtherHospital
			if (strval($this->AdviceToOtherHospital->CurrentValue) <> "") {
				$this->AdviceToOtherHospital->ViewValue = new OptionValues();
				$arwrk = explode(",", strval($this->AdviceToOtherHospital->CurrentValue));
				$cnt = count($arwrk);
				for ($ari = 0; $ari < $cnt; $ari++)
					$this->AdviceToOtherHospital->ViewValue->add($this->AdviceToOtherHospital->optionCaption(trim($arwrk[$ari])));
			} else {
				$this->AdviceToOtherHospital->ViewValue = NULL;
			}
			$this->AdviceToOtherHospital->ViewCustomAttributes = "";

			// Reason
			$this->Reason->ViewValue = $this->Reason->CurrentValue;
			$this->Reason->ViewCustomAttributes = "";

			// id
			$this->id->LinkCustomAttributes = "";
			$this->id->HrefValue = "";
			$this->id->TooltipValue = "";

			// mrnNo
			$this->mrnNo->LinkCustomAttributes = "";
			$this->mrnNo->HrefValue = "";
			$this->mrnNo->TooltipValue = "";

			// PatientID
			$this->PatientID->LinkCustomAttributes = "";
			$this->PatientID->HrefValue = "";
			$this->PatientID->TooltipValue = "";

			// patient_name
			$this->patient_name->LinkCustomAttributes = "";
			$this->patient_name->HrefValue = "";
			$this->patient_name->TooltipValue = "";

			// mobileno
			$this->mobileno->LinkCustomAttributes = "";
			$this->mobileno->HrefValue = "";
			$this->mobileno->TooltipValue = "";

			// profilePic
			$this->profilePic->LinkCustomAttributes = "";
			$this->profilePic->HrefValue = "";
			$this->profilePic->TooltipValue = "";

			// gender
			$this->gender->LinkCustomAttributes = "";
			$this->gender->HrefValue = "";
			$this->gender->TooltipValue = "";

			// age
			$this->age->LinkCustomAttributes = "";
			$this->age->HrefValue = "";
			$this->age->TooltipValue = "";

			// Package
			$this->Package->LinkCustomAttributes = "";
			$this->Package->HrefValue = "";
			$this->Package->TooltipValue = "";

			// typeRegsisteration
			$this->typeRegsisteration->LinkCustomAttributes = "";
			$this->typeRegsisteration->HrefValue = "";
			$this->typeRegsisteration->TooltipValue = "";

			// PaymentCategory
			$this->PaymentCategory->LinkCustomAttributes = "";
			$this->PaymentCategory->HrefValue = "";
			$this->PaymentCategory->TooltipValue = "";

			// admission_consultant_id
			$this->admission_consultant_id->LinkCustomAttributes = "";
			$this->admission_consultant_id->HrefValue = "";
			$this->admission_consultant_id->TooltipValue = "";

			// leading_consultant_id
			$this->leading_consultant_id->LinkCustomAttributes = "";
			$this->leading_consultant_id->HrefValue = "";
			$this->leading_consultant_id->TooltipValue = "";

			// cause
			$this->cause->LinkCustomAttributes = "";
			$this->cause->HrefValue = "";
			$this->cause->TooltipValue = "";

			// admission_date
			$this->admission_date->LinkCustomAttributes = "";
			$this->admission_date->HrefValue = "";
			$this->admission_date->TooltipValue = "";

			// release_date
			$this->release_date->LinkCustomAttributes = "";
			$this->release_date->HrefValue = "";
			$this->release_date->TooltipValue = "";

			// PaymentStatus
			$this->PaymentStatus->LinkCustomAttributes = "";
			$this->PaymentStatus->HrefValue = "";
			$this->PaymentStatus->TooltipValue = "";

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

			// HospID
			$this->HospID->LinkCustomAttributes = "";
			$this->HospID->HrefValue = "";
			$this->HospID->TooltipValue = "";

			// ReferedByDr
			$this->ReferedByDr->LinkCustomAttributes = "";
			$this->ReferedByDr->HrefValue = "";
			$this->ReferedByDr->TooltipValue = "";

			// ReferClinicname
			$this->ReferClinicname->LinkCustomAttributes = "";
			$this->ReferClinicname->HrefValue = "";
			$this->ReferClinicname->TooltipValue = "";

			// ReferCity
			$this->ReferCity->LinkCustomAttributes = "";
			$this->ReferCity->HrefValue = "";
			$this->ReferCity->TooltipValue = "";

			// ReferMobileNo
			$this->ReferMobileNo->LinkCustomAttributes = "";
			$this->ReferMobileNo->HrefValue = "";
			$this->ReferMobileNo->TooltipValue = "";

			// ReferA4TreatingConsultant
			$this->ReferA4TreatingConsultant->LinkCustomAttributes = "";
			$this->ReferA4TreatingConsultant->HrefValue = "";
			$this->ReferA4TreatingConsultant->TooltipValue = "";

			// PurposreReferredfor
			$this->PurposreReferredfor->LinkCustomAttributes = "";
			$this->PurposreReferredfor->HrefValue = "";
			$this->PurposreReferredfor->TooltipValue = "";

			// BillClosing
			$this->BillClosing->LinkCustomAttributes = "";
			$this->BillClosing->HrefValue = "";
			$this->BillClosing->TooltipValue = "";

			// BillClosingDate
			$this->BillClosingDate->LinkCustomAttributes = "";
			$this->BillClosingDate->HrefValue = "";
			$this->BillClosingDate->TooltipValue = "";

			// BillNumber
			$this->BillNumber->LinkCustomAttributes = "";
			$this->BillNumber->HrefValue = "";
			$this->BillNumber->TooltipValue = "";

			// ClosingAmount
			$this->ClosingAmount->LinkCustomAttributes = "";
			$this->ClosingAmount->HrefValue = "";
			$this->ClosingAmount->TooltipValue = "";

			// ClosingType
			$this->ClosingType->LinkCustomAttributes = "";
			$this->ClosingType->HrefValue = "";
			$this->ClosingType->TooltipValue = "";

			// BillAmount
			$this->BillAmount->LinkCustomAttributes = "";
			$this->BillAmount->HrefValue = "";
			$this->BillAmount->TooltipValue = "";

			// billclosedBy
			$this->billclosedBy->LinkCustomAttributes = "";
			$this->billclosedBy->HrefValue = "";
			$this->billclosedBy->TooltipValue = "";

			// bllcloseByDate
			$this->bllcloseByDate->LinkCustomAttributes = "";
			$this->bllcloseByDate->HrefValue = "";
			$this->bllcloseByDate->TooltipValue = "";

			// ReportHeader
			$this->ReportHeader->LinkCustomAttributes = "";
			$this->ReportHeader->HrefValue = "";
			$this->ReportHeader->TooltipValue = "";

			// Procedure
			$this->Procedure->LinkCustomAttributes = "";
			$this->Procedure->HrefValue = "";
			$this->Procedure->TooltipValue = "";

			// Consultant
			$this->Consultant->LinkCustomAttributes = "";
			$this->Consultant->HrefValue = "";
			$this->Consultant->TooltipValue = "";

			// Anesthetist
			$this->Anesthetist->LinkCustomAttributes = "";
			$this->Anesthetist->HrefValue = "";
			$this->Anesthetist->TooltipValue = "";

			// Amound
			$this->Amound->LinkCustomAttributes = "";
			$this->Amound->HrefValue = "";
			$this->Amound->TooltipValue = "";

			// physician_id
			$this->physician_id->LinkCustomAttributes = "";
			$this->physician_id->HrefValue = "";
			$this->physician_id->TooltipValue = "";

			// PartnerID
			$this->PartnerID->LinkCustomAttributes = "";
			$this->PartnerID->HrefValue = "";
			$this->PartnerID->TooltipValue = "";

			// PartnerName
			$this->PartnerName->LinkCustomAttributes = "";
			$this->PartnerName->HrefValue = "";
			$this->PartnerName->TooltipValue = "";

			// PartnerMobile
			$this->PartnerMobile->LinkCustomAttributes = "";
			$this->PartnerMobile->HrefValue = "";
			$this->PartnerMobile->TooltipValue = "";

			// patient_id
			$this->patient_id->LinkCustomAttributes = "";
			$this->patient_id->HrefValue = "";
			$this->patient_id->TooltipValue = "";

			// Cid
			$this->Cid->LinkCustomAttributes = "";
			$this->Cid->HrefValue = "";
			$this->Cid->TooltipValue = "";

			// PartId
			$this->PartId->LinkCustomAttributes = "";
			$this->PartId->HrefValue = "";
			$this->PartId->TooltipValue = "";

			// IDProof
			$this->IDProof->LinkCustomAttributes = "";
			$this->IDProof->HrefValue = "";
			$this->IDProof->TooltipValue = "";

			// DOB
			$this->DOB->LinkCustomAttributes = "";
			$this->DOB->HrefValue = "";
			$this->DOB->TooltipValue = "";

			// AdviceToOtherHospital
			$this->AdviceToOtherHospital->LinkCustomAttributes = "";
			$this->AdviceToOtherHospital->HrefValue = "";
			$this->AdviceToOtherHospital->TooltipValue = "";

			// Reason
			$this->Reason->LinkCustomAttributes = "";
			$this->Reason->HrefValue = "";
			$this->Reason->TooltipValue = "";
		} elseif ($this->RowType == ROWTYPE_SEARCH) { // Search row

			// id
			$this->id->EditAttrs["class"] = "form-control";
			$this->id->EditCustomAttributes = "";
			$this->id->EditValue = HtmlEncode($this->id->AdvancedSearch->SearchValue);
			$this->id->PlaceHolder = RemoveHtml($this->id->caption());

			// mrnNo
			$this->mrnNo->EditAttrs["class"] = "form-control";
			$this->mrnNo->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->mrnNo->AdvancedSearch->SearchValue = HtmlDecode($this->mrnNo->AdvancedSearch->SearchValue);
			$this->mrnNo->EditValue = HtmlEncode($this->mrnNo->AdvancedSearch->SearchValue);
			$this->mrnNo->PlaceHolder = RemoveHtml($this->mrnNo->caption());

			// PatientID
			$this->PatientID->EditAttrs["class"] = "form-control";
			$this->PatientID->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->PatientID->AdvancedSearch->SearchValue = HtmlDecode($this->PatientID->AdvancedSearch->SearchValue);
			$this->PatientID->EditValue = HtmlEncode($this->PatientID->AdvancedSearch->SearchValue);
			$this->PatientID->PlaceHolder = RemoveHtml($this->PatientID->caption());

			// patient_name
			$this->patient_name->EditAttrs["class"] = "form-control";
			$this->patient_name->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->patient_name->AdvancedSearch->SearchValue = HtmlDecode($this->patient_name->AdvancedSearch->SearchValue);
			$this->patient_name->EditValue = HtmlEncode($this->patient_name->AdvancedSearch->SearchValue);
			$this->patient_name->PlaceHolder = RemoveHtml($this->patient_name->caption());

			// mobileno
			$this->mobileno->EditAttrs["class"] = "form-control";
			$this->mobileno->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->mobileno->AdvancedSearch->SearchValue = HtmlDecode($this->mobileno->AdvancedSearch->SearchValue);
			$this->mobileno->EditValue = HtmlEncode($this->mobileno->AdvancedSearch->SearchValue);
			$this->mobileno->PlaceHolder = RemoveHtml($this->mobileno->caption());

			// profilePic
			$this->profilePic->EditAttrs["class"] = "form-control";
			$this->profilePic->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->profilePic->AdvancedSearch->SearchValue = HtmlDecode($this->profilePic->AdvancedSearch->SearchValue);
			$this->profilePic->EditValue = HtmlEncode($this->profilePic->AdvancedSearch->SearchValue);
			$this->profilePic->PlaceHolder = RemoveHtml($this->profilePic->caption());

			// gender
			$this->gender->EditAttrs["class"] = "form-control";
			$this->gender->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->gender->AdvancedSearch->SearchValue = HtmlDecode($this->gender->AdvancedSearch->SearchValue);
			$this->gender->EditValue = HtmlEncode($this->gender->AdvancedSearch->SearchValue);
			$this->gender->PlaceHolder = RemoveHtml($this->gender->caption());

			// age
			$this->age->EditAttrs["class"] = "form-control";
			$this->age->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->age->AdvancedSearch->SearchValue = HtmlDecode($this->age->AdvancedSearch->SearchValue);
			$this->age->EditValue = HtmlEncode($this->age->AdvancedSearch->SearchValue);
			$this->age->PlaceHolder = RemoveHtml($this->age->caption());

			// Package
			$this->Package->EditAttrs["class"] = "form-control";
			$this->Package->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Package->AdvancedSearch->SearchValue = HtmlDecode($this->Package->AdvancedSearch->SearchValue);
			$this->Package->EditValue = HtmlEncode($this->Package->AdvancedSearch->SearchValue);
			$this->Package->PlaceHolder = RemoveHtml($this->Package->caption());

			// typeRegsisteration
			$this->typeRegsisteration->EditAttrs["class"] = "form-control";
			$this->typeRegsisteration->EditCustomAttributes = "";
			$curVal = trim(strval($this->typeRegsisteration->AdvancedSearch->SearchValue));
			if ($curVal <> "")
				$this->typeRegsisteration->AdvancedSearch->ViewValue = $this->typeRegsisteration->lookupCacheOption($curVal);
			else
				$this->typeRegsisteration->AdvancedSearch->ViewValue = $this->typeRegsisteration->Lookup !== NULL && is_array($this->typeRegsisteration->Lookup->Options) ? $curVal : NULL;
			if ($this->typeRegsisteration->AdvancedSearch->ViewValue !== NULL) { // Load from cache
				$this->typeRegsisteration->EditValue = array_values($this->typeRegsisteration->Lookup->Options);
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`RegsistrationType`" . SearchString("=", $this->typeRegsisteration->AdvancedSearch->SearchValue, DATATYPE_STRING, "");
				}
				$sqlWrk = $this->typeRegsisteration->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
				if ($rswrk) $rswrk->Close();
				$this->typeRegsisteration->EditValue = $arwrk;
			}

			// PaymentCategory
			$this->PaymentCategory->EditAttrs["class"] = "form-control";
			$this->PaymentCategory->EditCustomAttributes = "";
			$curVal = trim(strval($this->PaymentCategory->AdvancedSearch->SearchValue));
			if ($curVal <> "")
				$this->PaymentCategory->AdvancedSearch->ViewValue = $this->PaymentCategory->lookupCacheOption($curVal);
			else
				$this->PaymentCategory->AdvancedSearch->ViewValue = $this->PaymentCategory->Lookup !== NULL && is_array($this->PaymentCategory->Lookup->Options) ? $curVal : NULL;
			if ($this->PaymentCategory->AdvancedSearch->ViewValue !== NULL) { // Load from cache
				$this->PaymentCategory->EditValue = array_values($this->PaymentCategory->Lookup->Options);
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`Category`" . SearchString("=", $this->PaymentCategory->AdvancedSearch->SearchValue, DATATYPE_STRING, "");
				}
				$sqlWrk = $this->PaymentCategory->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
				if ($rswrk) $rswrk->Close();
				$this->PaymentCategory->EditValue = $arwrk;
			}

			// admission_consultant_id
			$this->admission_consultant_id->EditAttrs["class"] = "form-control";
			$this->admission_consultant_id->EditCustomAttributes = "";
			$this->admission_consultant_id->EditValue = HtmlEncode($this->admission_consultant_id->AdvancedSearch->SearchValue);
			$this->admission_consultant_id->PlaceHolder = RemoveHtml($this->admission_consultant_id->caption());

			// leading_consultant_id
			$this->leading_consultant_id->EditAttrs["class"] = "form-control";
			$this->leading_consultant_id->EditCustomAttributes = "";
			$this->leading_consultant_id->EditValue = HtmlEncode($this->leading_consultant_id->AdvancedSearch->SearchValue);
			$this->leading_consultant_id->PlaceHolder = RemoveHtml($this->leading_consultant_id->caption());

			// cause
			$this->cause->EditAttrs["class"] = "form-control";
			$this->cause->EditCustomAttributes = "";
			$this->cause->EditValue = HtmlEncode($this->cause->AdvancedSearch->SearchValue);
			$this->cause->PlaceHolder = RemoveHtml($this->cause->caption());

			// admission_date
			$this->admission_date->EditAttrs["class"] = "form-control";
			$this->admission_date->EditCustomAttributes = "";
			$this->admission_date->EditValue = HtmlEncode(FormatDateTime(UnFormatDateTime($this->admission_date->AdvancedSearch->SearchValue, 11), 11));
			$this->admission_date->PlaceHolder = RemoveHtml($this->admission_date->caption());

			// release_date
			$this->release_date->EditAttrs["class"] = "form-control";
			$this->release_date->EditCustomAttributes = "";
			$this->release_date->EditValue = HtmlEncode(FormatDateTime(UnFormatDateTime($this->release_date->AdvancedSearch->SearchValue, 11), 11));
			$this->release_date->PlaceHolder = RemoveHtml($this->release_date->caption());

			// PaymentStatus
			$this->PaymentStatus->EditAttrs["class"] = "form-control";
			$this->PaymentStatus->EditCustomAttributes = "";
			$curVal = trim(strval($this->PaymentStatus->AdvancedSearch->SearchValue));
			if ($curVal <> "")
				$this->PaymentStatus->AdvancedSearch->ViewValue = $this->PaymentStatus->lookupCacheOption($curVal);
			else
				$this->PaymentStatus->AdvancedSearch->ViewValue = $this->PaymentStatus->Lookup !== NULL && is_array($this->PaymentStatus->Lookup->Options) ? $curVal : NULL;
			if ($this->PaymentStatus->AdvancedSearch->ViewValue !== NULL) { // Load from cache
				$this->PaymentStatus->EditValue = array_values($this->PaymentStatus->Lookup->Options);
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`id`" . SearchString("=", $this->PaymentStatus->AdvancedSearch->SearchValue, DATATYPE_NUMBER, "");
				}
				$sqlWrk = $this->PaymentStatus->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
				if ($rswrk) $rswrk->Close();
				$this->PaymentStatus->EditValue = $arwrk;
			}

			// status
			$this->status->EditAttrs["class"] = "form-control";
			$this->status->EditCustomAttributes = "";
			$this->status->EditValue = HtmlEncode($this->status->AdvancedSearch->SearchValue);
			$this->status->PlaceHolder = RemoveHtml($this->status->caption());

			// createdby
			$this->createdby->EditAttrs["class"] = "form-control";
			$this->createdby->EditCustomAttributes = "";
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
			$this->modifiedby->EditValue = HtmlEncode($this->modifiedby->AdvancedSearch->SearchValue);
			$this->modifiedby->PlaceHolder = RemoveHtml($this->modifiedby->caption());

			// modifieddatetime
			$this->modifieddatetime->EditAttrs["class"] = "form-control";
			$this->modifieddatetime->EditCustomAttributes = "";
			$this->modifieddatetime->EditValue = HtmlEncode(FormatDateTime(UnFormatDateTime($this->modifieddatetime->AdvancedSearch->SearchValue, 0), 8));
			$this->modifieddatetime->PlaceHolder = RemoveHtml($this->modifieddatetime->caption());

			// HospID
			$this->HospID->EditAttrs["class"] = "form-control";
			$this->HospID->EditCustomAttributes = "";
			$curVal = trim(strval($this->HospID->AdvancedSearch->SearchValue));
			if ($curVal <> "")
				$this->HospID->AdvancedSearch->ViewValue = $this->HospID->lookupCacheOption($curVal);
			else
				$this->HospID->AdvancedSearch->ViewValue = $this->HospID->Lookup !== NULL && is_array($this->HospID->Lookup->Options) ? $curVal : NULL;
			if ($this->HospID->AdvancedSearch->ViewValue !== NULL) { // Load from cache
				$this->HospID->EditValue = array_values($this->HospID->Lookup->Options);
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`id`" . SearchString("=", $this->HospID->AdvancedSearch->SearchValue, DATATYPE_NUMBER, "");
				}
				$sqlWrk = $this->HospID->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
				if ($rswrk) $rswrk->Close();
				$this->HospID->EditValue = $arwrk;
			}

			// ReferedByDr
			$this->ReferedByDr->EditCustomAttributes = "";
			$curVal = trim(strval($this->ReferedByDr->AdvancedSearch->SearchValue));
			if ($curVal <> "")
				$this->ReferedByDr->AdvancedSearch->ViewValue = $this->ReferedByDr->lookupCacheOption($curVal);
			else
				$this->ReferedByDr->AdvancedSearch->ViewValue = $this->ReferedByDr->Lookup !== NULL && is_array($this->ReferedByDr->Lookup->Options) ? $curVal : NULL;
			if ($this->ReferedByDr->AdvancedSearch->ViewValue !== NULL) { // Load from cache
				$this->ReferedByDr->EditValue = array_values($this->ReferedByDr->Lookup->Options);
				if ($this->ReferedByDr->AdvancedSearch->ViewValue == "")
					$this->ReferedByDr->AdvancedSearch->ViewValue = $Language->phrase("PleaseSelect");
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`reference`" . SearchString("=", $this->ReferedByDr->AdvancedSearch->SearchValue, DATATYPE_STRING, "");
				}
				$sqlWrk = $this->ReferedByDr->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = array();
					$arwrk[1] = HtmlEncode($rswrk->fields('df'));
					$this->ReferedByDr->AdvancedSearch->ViewValue = $this->ReferedByDr->displayValue($arwrk);
				} else {
					$this->ReferedByDr->AdvancedSearch->ViewValue = $Language->phrase("PleaseSelect");
				}
				$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
				if ($rswrk) $rswrk->Close();
				$this->ReferedByDr->EditValue = $arwrk;
			}

			// ReferClinicname
			$this->ReferClinicname->EditAttrs["class"] = "form-control";
			$this->ReferClinicname->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->ReferClinicname->AdvancedSearch->SearchValue = HtmlDecode($this->ReferClinicname->AdvancedSearch->SearchValue);
			$this->ReferClinicname->EditValue = HtmlEncode($this->ReferClinicname->AdvancedSearch->SearchValue);
			$this->ReferClinicname->PlaceHolder = RemoveHtml($this->ReferClinicname->caption());

			// ReferCity
			$this->ReferCity->EditAttrs["class"] = "form-control";
			$this->ReferCity->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->ReferCity->AdvancedSearch->SearchValue = HtmlDecode($this->ReferCity->AdvancedSearch->SearchValue);
			$this->ReferCity->EditValue = HtmlEncode($this->ReferCity->AdvancedSearch->SearchValue);
			$this->ReferCity->PlaceHolder = RemoveHtml($this->ReferCity->caption());

			// ReferMobileNo
			$this->ReferMobileNo->EditAttrs["class"] = "form-control";
			$this->ReferMobileNo->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->ReferMobileNo->AdvancedSearch->SearchValue = HtmlDecode($this->ReferMobileNo->AdvancedSearch->SearchValue);
			$this->ReferMobileNo->EditValue = HtmlEncode($this->ReferMobileNo->AdvancedSearch->SearchValue);
			$this->ReferMobileNo->PlaceHolder = RemoveHtml($this->ReferMobileNo->caption());

			// ReferA4TreatingConsultant
			$this->ReferA4TreatingConsultant->EditAttrs["class"] = "form-control";
			$this->ReferA4TreatingConsultant->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->ReferA4TreatingConsultant->AdvancedSearch->SearchValue = HtmlDecode($this->ReferA4TreatingConsultant->AdvancedSearch->SearchValue);
			$this->ReferA4TreatingConsultant->EditValue = HtmlEncode($this->ReferA4TreatingConsultant->AdvancedSearch->SearchValue);
			$this->ReferA4TreatingConsultant->PlaceHolder = RemoveHtml($this->ReferA4TreatingConsultant->caption());

			// PurposreReferredfor
			$this->PurposreReferredfor->EditAttrs["class"] = "form-control";
			$this->PurposreReferredfor->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->PurposreReferredfor->AdvancedSearch->SearchValue = HtmlDecode($this->PurposreReferredfor->AdvancedSearch->SearchValue);
			$this->PurposreReferredfor->EditValue = HtmlEncode($this->PurposreReferredfor->AdvancedSearch->SearchValue);
			$this->PurposreReferredfor->PlaceHolder = RemoveHtml($this->PurposreReferredfor->caption());

			// BillClosing
			$this->BillClosing->EditCustomAttributes = "";
			$this->BillClosing->EditValue = $this->BillClosing->options(FALSE);

			// BillClosingDate
			$this->BillClosingDate->EditAttrs["class"] = "form-control";
			$this->BillClosingDate->EditCustomAttributes = "";
			$this->BillClosingDate->EditValue = HtmlEncode(FormatDateTime(UnFormatDateTime($this->BillClosingDate->AdvancedSearch->SearchValue, 0), 8));
			$this->BillClosingDate->PlaceHolder = RemoveHtml($this->BillClosingDate->caption());

			// BillNumber
			$this->BillNumber->EditAttrs["class"] = "form-control";
			$this->BillNumber->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->BillNumber->AdvancedSearch->SearchValue = HtmlDecode($this->BillNumber->AdvancedSearch->SearchValue);
			$this->BillNumber->EditValue = HtmlEncode($this->BillNumber->AdvancedSearch->SearchValue);
			$this->BillNumber->PlaceHolder = RemoveHtml($this->BillNumber->caption());

			// ClosingAmount
			$this->ClosingAmount->EditAttrs["class"] = "form-control";
			$this->ClosingAmount->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->ClosingAmount->AdvancedSearch->SearchValue = HtmlDecode($this->ClosingAmount->AdvancedSearch->SearchValue);
			$this->ClosingAmount->EditValue = HtmlEncode($this->ClosingAmount->AdvancedSearch->SearchValue);
			$this->ClosingAmount->PlaceHolder = RemoveHtml($this->ClosingAmount->caption());

			// ClosingType
			$this->ClosingType->EditAttrs["class"] = "form-control";
			$this->ClosingType->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->ClosingType->AdvancedSearch->SearchValue = HtmlDecode($this->ClosingType->AdvancedSearch->SearchValue);
			$this->ClosingType->EditValue = HtmlEncode($this->ClosingType->AdvancedSearch->SearchValue);
			$this->ClosingType->PlaceHolder = RemoveHtml($this->ClosingType->caption());

			// BillAmount
			$this->BillAmount->EditAttrs["class"] = "form-control";
			$this->BillAmount->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->BillAmount->AdvancedSearch->SearchValue = HtmlDecode($this->BillAmount->AdvancedSearch->SearchValue);
			$this->BillAmount->EditValue = HtmlEncode($this->BillAmount->AdvancedSearch->SearchValue);
			$this->BillAmount->PlaceHolder = RemoveHtml($this->BillAmount->caption());

			// billclosedBy
			$this->billclosedBy->EditAttrs["class"] = "form-control";
			$this->billclosedBy->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->billclosedBy->AdvancedSearch->SearchValue = HtmlDecode($this->billclosedBy->AdvancedSearch->SearchValue);
			$this->billclosedBy->EditValue = HtmlEncode($this->billclosedBy->AdvancedSearch->SearchValue);
			$this->billclosedBy->PlaceHolder = RemoveHtml($this->billclosedBy->caption());

			// bllcloseByDate
			$this->bllcloseByDate->EditAttrs["class"] = "form-control";
			$this->bllcloseByDate->EditCustomAttributes = "";
			$this->bllcloseByDate->EditValue = HtmlEncode(FormatDateTime(UnFormatDateTime($this->bllcloseByDate->AdvancedSearch->SearchValue, 0), 8));
			$this->bllcloseByDate->PlaceHolder = RemoveHtml($this->bllcloseByDate->caption());

			// ReportHeader
			$this->ReportHeader->EditCustomAttributes = "";
			$this->ReportHeader->EditValue = $this->ReportHeader->options(FALSE);

			// Procedure
			$this->Procedure->EditCustomAttributes = "";
			$curVal = trim(strval($this->Procedure->AdvancedSearch->SearchValue));
			if ($curVal <> "")
				$this->Procedure->AdvancedSearch->ViewValue = $this->Procedure->lookupCacheOption($curVal);
			else
				$this->Procedure->AdvancedSearch->ViewValue = $this->Procedure->Lookup !== NULL && is_array($this->Procedure->Lookup->Options) ? $curVal : NULL;
			if ($this->Procedure->AdvancedSearch->ViewValue !== NULL) { // Load from cache
				$this->Procedure->EditValue = array_values($this->Procedure->Lookup->Options);
				if ($this->Procedure->AdvancedSearch->ViewValue == "")
					$this->Procedure->AdvancedSearch->ViewValue = $Language->phrase("PleaseSelect");
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`SERVICE`" . SearchString("=", $this->Procedure->AdvancedSearch->SearchValue, DATATYPE_STRING, "");
				}
				$lookupFilter = function() {
					return "`HospID`='".HospitalID()."'  and `SERVICE_TYPE` in ('IP Procedure','Op Procedure','IP SERVICE')";
				};
				$lookupFilter = $lookupFilter->bindTo($this);
				$sqlWrk = $this->Procedure->Lookup->getSql(TRUE, $filterWrk, $lookupFilter, $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = array();
					$arwrk[1] = HtmlEncode($rswrk->fields('df'));
					$this->Procedure->AdvancedSearch->ViewValue = $this->Procedure->displayValue($arwrk);
				} else {
					$this->Procedure->AdvancedSearch->ViewValue = $Language->phrase("PleaseSelect");
				}
				$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
				if ($rswrk) $rswrk->Close();
				$this->Procedure->EditValue = $arwrk;
			}

			// Consultant
			$this->Consultant->EditAttrs["class"] = "form-control";
			$this->Consultant->EditCustomAttributes = "";
			$curVal = trim(strval($this->Consultant->AdvancedSearch->SearchValue));
			if ($curVal <> "")
				$this->Consultant->AdvancedSearch->ViewValue = $this->Consultant->lookupCacheOption($curVal);
			else
				$this->Consultant->AdvancedSearch->ViewValue = $this->Consultant->Lookup !== NULL && is_array($this->Consultant->Lookup->Options) ? $curVal : NULL;
			if ($this->Consultant->AdvancedSearch->ViewValue !== NULL) { // Load from cache
				$this->Consultant->EditValue = array_values($this->Consultant->Lookup->Options);
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`NAME`" . SearchString("=", $this->Consultant->AdvancedSearch->SearchValue, DATATYPE_STRING, "");
				}
				$lookupFilter = function() {
					return "`HospID`='".HospitalID()."'";
				};
				$lookupFilter = $lookupFilter->bindTo($this);
				$sqlWrk = $this->Consultant->Lookup->getSql(TRUE, $filterWrk, $lookupFilter, $this);
				$rswrk = Conn()->execute($sqlWrk);
				$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
				if ($rswrk) $rswrk->Close();
				$this->Consultant->EditValue = $arwrk;
			}

			// Anesthetist
			$this->Anesthetist->EditAttrs["class"] = "form-control";
			$this->Anesthetist->EditCustomAttributes = "";
			$curVal = trim(strval($this->Anesthetist->AdvancedSearch->SearchValue));
			if ($curVal <> "")
				$this->Anesthetist->AdvancedSearch->ViewValue = $this->Anesthetist->lookupCacheOption($curVal);
			else
				$this->Anesthetist->AdvancedSearch->ViewValue = $this->Anesthetist->Lookup !== NULL && is_array($this->Anesthetist->Lookup->Options) ? $curVal : NULL;
			if ($this->Anesthetist->AdvancedSearch->ViewValue !== NULL) { // Load from cache
				$this->Anesthetist->EditValue = array_values($this->Anesthetist->Lookup->Options);
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`NAME`" . SearchString("=", $this->Anesthetist->AdvancedSearch->SearchValue, DATATYPE_STRING, "");
				}
				$lookupFilter = function() {
					return "`HospID`='".HospitalID()."'";
				};
				$lookupFilter = $lookupFilter->bindTo($this);
				$sqlWrk = $this->Anesthetist->Lookup->getSql(TRUE, $filterWrk, $lookupFilter, $this);
				$rswrk = Conn()->execute($sqlWrk);
				$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
				if ($rswrk) $rswrk->Close();
				$this->Anesthetist->EditValue = $arwrk;
			}

			// Amound
			$this->Amound->EditAttrs["class"] = "form-control";
			$this->Amound->EditCustomAttributes = "";
			$this->Amound->EditValue = HtmlEncode($this->Amound->AdvancedSearch->SearchValue);
			$this->Amound->PlaceHolder = RemoveHtml($this->Amound->caption());

			// physician_id
			$this->physician_id->EditCustomAttributes = "";
			$curVal = trim(strval($this->physician_id->AdvancedSearch->SearchValue));
			if ($curVal <> "")
				$this->physician_id->AdvancedSearch->ViewValue = $this->physician_id->lookupCacheOption($curVal);
			else
				$this->physician_id->AdvancedSearch->ViewValue = $this->physician_id->Lookup !== NULL && is_array($this->physician_id->Lookup->Options) ? $curVal : NULL;
			if ($this->physician_id->AdvancedSearch->ViewValue !== NULL) { // Load from cache
				$this->physician_id->EditValue = array_values($this->physician_id->Lookup->Options);
				if ($this->physician_id->AdvancedSearch->ViewValue == "")
					$this->physician_id->AdvancedSearch->ViewValue = $Language->phrase("PleaseSelect");
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`id`" . SearchString("=", $this->physician_id->AdvancedSearch->SearchValue, DATATYPE_NUMBER, "");
				}
				$lookupFilter = function() {
					return "`HospID`='".HospitalID()."'";
				};
				$lookupFilter = $lookupFilter->bindTo($this);
				$sqlWrk = $this->physician_id->Lookup->getSql(TRUE, $filterWrk, $lookupFilter, $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = array();
					$arwrk[1] = HtmlEncode($rswrk->fields('df'));
					$this->physician_id->AdvancedSearch->ViewValue = $this->physician_id->displayValue($arwrk);
				} else {
					$this->physician_id->AdvancedSearch->ViewValue = $Language->phrase("PleaseSelect");
				}
				$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
				if ($rswrk) $rswrk->Close();
				$this->physician_id->EditValue = $arwrk;
			}

			// PartnerID
			$this->PartnerID->EditAttrs["class"] = "form-control";
			$this->PartnerID->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->PartnerID->AdvancedSearch->SearchValue = HtmlDecode($this->PartnerID->AdvancedSearch->SearchValue);
			$this->PartnerID->EditValue = HtmlEncode($this->PartnerID->AdvancedSearch->SearchValue);
			$this->PartnerID->PlaceHolder = RemoveHtml($this->PartnerID->caption());

			// PartnerName
			$this->PartnerName->EditAttrs["class"] = "form-control";
			$this->PartnerName->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->PartnerName->AdvancedSearch->SearchValue = HtmlDecode($this->PartnerName->AdvancedSearch->SearchValue);
			$this->PartnerName->EditValue = HtmlEncode($this->PartnerName->AdvancedSearch->SearchValue);
			$this->PartnerName->PlaceHolder = RemoveHtml($this->PartnerName->caption());

			// PartnerMobile
			$this->PartnerMobile->EditAttrs["class"] = "form-control";
			$this->PartnerMobile->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->PartnerMobile->AdvancedSearch->SearchValue = HtmlDecode($this->PartnerMobile->AdvancedSearch->SearchValue);
			$this->PartnerMobile->EditValue = HtmlEncode($this->PartnerMobile->AdvancedSearch->SearchValue);
			$this->PartnerMobile->PlaceHolder = RemoveHtml($this->PartnerMobile->caption());

			// patient_id
			$this->patient_id->EditCustomAttributes = "";
			$curVal = trim(strval($this->patient_id->AdvancedSearch->SearchValue));
			if ($curVal <> "")
				$this->patient_id->AdvancedSearch->ViewValue = $this->patient_id->lookupCacheOption($curVal);
			else
				$this->patient_id->AdvancedSearch->ViewValue = $this->patient_id->Lookup !== NULL && is_array($this->patient_id->Lookup->Options) ? $curVal : NULL;
			if ($this->patient_id->AdvancedSearch->ViewValue !== NULL) { // Load from cache
				$this->patient_id->EditValue = array_values($this->patient_id->Lookup->Options);
				if ($this->patient_id->AdvancedSearch->ViewValue == "")
					$this->patient_id->AdvancedSearch->ViewValue = $Language->phrase("PleaseSelect");
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`id`" . SearchString("=", $this->patient_id->AdvancedSearch->SearchValue, DATATYPE_NUMBER, "");
				}
				$sqlWrk = $this->patient_id->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = array();
					$arwrk[1] = HtmlEncode($rswrk->fields('df'));
					$arwrk[2] = HtmlEncode($rswrk->fields('df2'));
					$arwrk[3] = HtmlEncode($rswrk->fields('df3'));
					$this->patient_id->AdvancedSearch->ViewValue = $this->patient_id->displayValue($arwrk);
				} else {
					$this->patient_id->AdvancedSearch->ViewValue = $Language->phrase("PleaseSelect");
				}
				$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
				if ($rswrk) $rswrk->Close();
				$this->patient_id->EditValue = $arwrk;
			}

			// Cid
			$this->Cid->EditCustomAttributes = "";
			$curVal = trim(strval($this->Cid->AdvancedSearch->SearchValue));
			if ($curVal <> "")
				$this->Cid->AdvancedSearch->ViewValue = $this->Cid->lookupCacheOption($curVal);
			else
				$this->Cid->AdvancedSearch->ViewValue = $this->Cid->Lookup !== NULL && is_array($this->Cid->Lookup->Options) ? $curVal : NULL;
			if ($this->Cid->AdvancedSearch->ViewValue !== NULL) { // Load from cache
				$this->Cid->EditValue = array_values($this->Cid->Lookup->Options);
				if ($this->Cid->AdvancedSearch->ViewValue == "")
					$this->Cid->AdvancedSearch->ViewValue = $Language->phrase("PleaseSelect");
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`id`" . SearchString("=", $this->Cid->AdvancedSearch->SearchValue, DATATYPE_NUMBER, "");
				}
				$sqlWrk = $this->Cid->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = array();
					$arwrk[1] = HtmlEncode($rswrk->fields('df'));
					$arwrk[2] = HtmlEncode($rswrk->fields('df2'));
					$arwrk[3] = HtmlEncode($rswrk->fields('df3'));
					$arwrk[4] = HtmlEncode($rswrk->fields('df4'));
					$this->Cid->AdvancedSearch->ViewValue = $this->Cid->displayValue($arwrk);
				} else {
					$this->Cid->AdvancedSearch->ViewValue = $Language->phrase("PleaseSelect");
				}
				$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
				if ($rswrk) $rswrk->Close();
				$this->Cid->EditValue = $arwrk;
			}

			// PartId
			$this->PartId->EditAttrs["class"] = "form-control";
			$this->PartId->EditCustomAttributes = "";
			$this->PartId->EditValue = HtmlEncode($this->PartId->AdvancedSearch->SearchValue);
			$this->PartId->PlaceHolder = RemoveHtml($this->PartId->caption());

			// IDProof
			$this->IDProof->EditAttrs["class"] = "form-control";
			$this->IDProof->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->IDProof->AdvancedSearch->SearchValue = HtmlDecode($this->IDProof->AdvancedSearch->SearchValue);
			$this->IDProof->EditValue = HtmlEncode($this->IDProof->AdvancedSearch->SearchValue);
			$this->IDProof->PlaceHolder = RemoveHtml($this->IDProof->caption());

			// DOB
			$this->DOB->EditAttrs["class"] = "form-control";
			$this->DOB->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->DOB->AdvancedSearch->SearchValue = HtmlDecode($this->DOB->AdvancedSearch->SearchValue);
			$this->DOB->EditValue = HtmlEncode($this->DOB->AdvancedSearch->SearchValue);
			$this->DOB->PlaceHolder = RemoveHtml($this->DOB->caption());

			// AdviceToOtherHospital
			$this->AdviceToOtherHospital->EditCustomAttributes = "";
			$this->AdviceToOtherHospital->EditValue = $this->AdviceToOtherHospital->options(FALSE);

			// Reason
			$this->Reason->EditAttrs["class"] = "form-control";
			$this->Reason->EditCustomAttributes = "";
			$this->Reason->EditValue = HtmlEncode($this->Reason->AdvancedSearch->SearchValue);
			$this->Reason->PlaceHolder = RemoveHtml($this->Reason->caption());
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
		if (!CheckInteger($this->admission_consultant_id->AdvancedSearch->SearchValue)) {
			AddMessage($SearchError, $this->admission_consultant_id->errorMessage());
		}
		if (!CheckInteger($this->leading_consultant_id->AdvancedSearch->SearchValue)) {
			AddMessage($SearchError, $this->leading_consultant_id->errorMessage());
		}
		if (!CheckEuroDate($this->admission_date->AdvancedSearch->SearchValue)) {
			AddMessage($SearchError, $this->admission_date->errorMessage());
		}
		if (!CheckEuroDate($this->release_date->AdvancedSearch->SearchValue)) {
			AddMessage($SearchError, $this->release_date->errorMessage());
		}
		if (!CheckInteger($this->status->AdvancedSearch->SearchValue)) {
			AddMessage($SearchError, $this->status->errorMessage());
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
		if (!CheckDate($this->BillClosingDate->AdvancedSearch->SearchValue)) {
			AddMessage($SearchError, $this->BillClosingDate->errorMessage());
		}
		if (!CheckDate($this->bllcloseByDate->AdvancedSearch->SearchValue)) {
			AddMessage($SearchError, $this->bllcloseByDate->errorMessage());
		}
		if (!CheckNumber($this->Amound->AdvancedSearch->SearchValue)) {
			AddMessage($SearchError, $this->Amound->errorMessage());
		}
		if (!CheckInteger($this->PartId->AdvancedSearch->SearchValue)) {
			AddMessage($SearchError, $this->PartId->errorMessage());
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
		$this->mrnNo->AdvancedSearch->load();
		$this->PatientID->AdvancedSearch->load();
		$this->patient_name->AdvancedSearch->load();
		$this->mobileno->AdvancedSearch->load();
		$this->profilePic->AdvancedSearch->load();
		$this->gender->AdvancedSearch->load();
		$this->age->AdvancedSearch->load();
		$this->Package->AdvancedSearch->load();
		$this->typeRegsisteration->AdvancedSearch->load();
		$this->PaymentCategory->AdvancedSearch->load();
		$this->admission_consultant_id->AdvancedSearch->load();
		$this->leading_consultant_id->AdvancedSearch->load();
		$this->cause->AdvancedSearch->load();
		$this->admission_date->AdvancedSearch->load();
		$this->release_date->AdvancedSearch->load();
		$this->PaymentStatus->AdvancedSearch->load();
		$this->status->AdvancedSearch->load();
		$this->createdby->AdvancedSearch->load();
		$this->createddatetime->AdvancedSearch->load();
		$this->modifiedby->AdvancedSearch->load();
		$this->modifieddatetime->AdvancedSearch->load();
		$this->HospID->AdvancedSearch->load();
		$this->ReferedByDr->AdvancedSearch->load();
		$this->ReferClinicname->AdvancedSearch->load();
		$this->ReferCity->AdvancedSearch->load();
		$this->ReferMobileNo->AdvancedSearch->load();
		$this->ReferA4TreatingConsultant->AdvancedSearch->load();
		$this->PurposreReferredfor->AdvancedSearch->load();
		$this->BillClosing->AdvancedSearch->load();
		$this->BillClosingDate->AdvancedSearch->load();
		$this->BillNumber->AdvancedSearch->load();
		$this->ClosingAmount->AdvancedSearch->load();
		$this->ClosingType->AdvancedSearch->load();
		$this->BillAmount->AdvancedSearch->load();
		$this->billclosedBy->AdvancedSearch->load();
		$this->bllcloseByDate->AdvancedSearch->load();
		$this->ReportHeader->AdvancedSearch->load();
		$this->Procedure->AdvancedSearch->load();
		$this->Consultant->AdvancedSearch->load();
		$this->Anesthetist->AdvancedSearch->load();
		$this->Amound->AdvancedSearch->load();
		$this->physician_id->AdvancedSearch->load();
		$this->PartnerID->AdvancedSearch->load();
		$this->PartnerName->AdvancedSearch->load();
		$this->PartnerMobile->AdvancedSearch->load();
		$this->patient_id->AdvancedSearch->load();
		$this->Cid->AdvancedSearch->load();
		$this->PartId->AdvancedSearch->load();
		$this->IDProof->AdvancedSearch->load();
		$this->DOB->AdvancedSearch->load();
		$this->AdviceToOtherHospital->AdvancedSearch->load();
		$this->Reason->AdvancedSearch->load();
	}

	// Set up Breadcrumb
	protected function setupBreadcrumb()
	{
		global $Breadcrumb, $Language;
		$Breadcrumb = new Breadcrumb();
		$url = substr(CurrentUrl(), strrpos(CurrentUrl(), "/")+1);
		$Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("view_ip_patient_admissionlist.php"), "", $this->TableVar, TRUE);
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
				case "x_Procedure":
					$lookupFilter = function() {
						return "`HospID`='".HospitalID()."'  and `SERVICE_TYPE` in ('IP Procedure','Op Procedure','IP SERVICE')";
					};
					$lookupFilter = $lookupFilter->bindTo($this);
					break;
				case "x_Consultant":
					$lookupFilter = function() {
						return "`HospID`='".HospitalID()."'";
					};
					$lookupFilter = $lookupFilter->bindTo($this);
					break;
				case "x_Anesthetist":
					$lookupFilter = function() {
						return "`HospID`='".HospitalID()."'";
					};
					$lookupFilter = $lookupFilter->bindTo($this);
					break;
				case "x_physician_id":
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
						case "x_typeRegsisteration":
							break;
						case "x_PaymentCategory":
							break;
						case "x_PaymentStatus":
							break;
						case "x_HospID":
							break;
						case "x_ReferedByDr":
							break;
						case "x_Procedure":
							break;
						case "x_Consultant":
							break;
						case "x_Anesthetist":
							break;
						case "x_physician_id":
							break;
						case "x_patient_id":
							break;
						case "x_Cid":
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
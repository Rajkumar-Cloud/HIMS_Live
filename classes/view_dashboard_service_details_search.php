<?php
namespace PHPMaker2019\HIMS;

/**
 * Page class
 */
class view_dashboard_service_details_search extends view_dashboard_service_details
{

	// Page ID
	public $PageID = "search";

	// Project ID
	public $ProjectID = "{EA4F6D13-AF8F-428D-9EA7-BA88D1107EC3}";

	// Table name
	public $TableName = 'view_dashboard_service_details';

	// Page object name
	public $PageObjName = "view_dashboard_service_details_search";

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

		// Table object (view_dashboard_service_details)
		if (!isset($GLOBALS["view_dashboard_service_details"]) || get_class($GLOBALS["view_dashboard_service_details"]) == PROJECT_NAMESPACE . "view_dashboard_service_details") {
			$GLOBALS["view_dashboard_service_details"] = &$this;
			$GLOBALS["Table"] = &$GLOBALS["view_dashboard_service_details"];
		}
		$this->CancelUrl = $this->pageUrl() . "action=cancel";

		// Table object (user_login)
		if (!isset($GLOBALS['user_login']))
			$GLOBALS['user_login'] = new user_login();

		// Table object (view_dashboard_service_servicetype)
		if (!isset($GLOBALS['view_dashboard_service_servicetype']))
			$GLOBALS['view_dashboard_service_servicetype'] = new view_dashboard_service_servicetype();

		// Page ID
		if (!defined(PROJECT_NAMESPACE . "PAGE_ID"))
			define(PROJECT_NAMESPACE . "PAGE_ID", 'search');

		// Table name (for backward compatibility)
		if (!defined(PROJECT_NAMESPACE . "TABLE_NAME"))
			define(PROJECT_NAMESPACE . "TABLE_NAME", 'view_dashboard_service_details');

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
		global $EXPORT, $view_dashboard_service_details;
		if ($this->CustomExport && $this->CustomExport == $this->Export && array_key_exists($this->CustomExport, $EXPORT)) {
				$content = ob_get_contents();
			if ($ExportFileName == "")
				$ExportFileName = $this->TableVar;
			$class = PROJECT_NAMESPACE . $EXPORT[$this->CustomExport];
			if (class_exists($class)) {
				$doc = new $class($view_dashboard_service_details);
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
					if ($pageName == "view_dashboard_service_detailsview.php")
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
			$key .= @$ar['vid'];
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
			$this->vid->Visible = FALSE;
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
					$this->terminate(GetUrl("view_dashboard_service_detailslist.php"));
				else
					$this->terminate(GetUrl("login.php"));
				return;
			}
		}

		// Create form object
		$CurrentForm = new HttpForm();
		$this->CurrentAction = Param("action"); // Set up current action
		$this->PatientId->setVisibility();
		$this->PatientName->setVisibility();
		$this->Services->setVisibility();
		$this->amount->setVisibility();
		$this->SubTotal->setVisibility();
		$this->createdby->setVisibility();
		$this->createddatetime->setVisibility();
		$this->createdDate->setVisibility();
		$this->DrName->setVisibility();
		$this->DRDepartment->setVisibility();
		$this->ItemCode->setVisibility();
		$this->DEptCd->setVisibility();
		$this->CODE->setVisibility();
		$this->SERVICE->setVisibility();
		$this->SERVICE_TYPE->setVisibility();
		$this->DEPARTMENT->setVisibility();
		$this->HospID->setVisibility();
		$this->vid->setVisibility();
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
		$this->setupLookupOptions($this->DrName);
		$this->setupLookupOptions($this->HospID);

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
					$srchStr = "view_dashboard_service_detailslist.php" . "?" . $srchStr;
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
		$this->buildSearchUrl($srchUrl, $this->PatientId); // PatientId
		$this->buildSearchUrl($srchUrl, $this->PatientName); // PatientName
		$this->buildSearchUrl($srchUrl, $this->Services); // Services
		$this->buildSearchUrl($srchUrl, $this->amount); // amount
		$this->buildSearchUrl($srchUrl, $this->SubTotal); // SubTotal
		$this->buildSearchUrl($srchUrl, $this->createdby); // createdby
		$this->buildSearchUrl($srchUrl, $this->createddatetime); // createddatetime
		$this->buildSearchUrl($srchUrl, $this->createdDate); // createdDate
		$this->buildSearchUrl($srchUrl, $this->DrName); // DrName
		$this->buildSearchUrl($srchUrl, $this->DRDepartment); // DRDepartment
		$this->buildSearchUrl($srchUrl, $this->ItemCode); // ItemCode
		$this->buildSearchUrl($srchUrl, $this->DEptCd); // DEptCd
		$this->buildSearchUrl($srchUrl, $this->CODE); // CODE
		$this->buildSearchUrl($srchUrl, $this->SERVICE); // SERVICE
		$this->buildSearchUrl($srchUrl, $this->SERVICE_TYPE); // SERVICE_TYPE
		$this->buildSearchUrl($srchUrl, $this->DEPARTMENT); // DEPARTMENT
		$this->buildSearchUrl($srchUrl, $this->HospID); // HospID
		$this->buildSearchUrl($srchUrl, $this->vid); // vid
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
		// PatientId

		if (!$this->isAddOrEdit())
			$this->PatientId->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_PatientId"));
		$this->PatientId->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_PatientId"));

		// PatientName
		if (!$this->isAddOrEdit())
			$this->PatientName->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_PatientName"));
		$this->PatientName->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_PatientName"));

		// Services
		if (!$this->isAddOrEdit())
			$this->Services->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_Services"));
		$this->Services->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_Services"));

		// amount
		if (!$this->isAddOrEdit())
			$this->amount->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_amount"));
		$this->amount->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_amount"));

		// SubTotal
		if (!$this->isAddOrEdit())
			$this->SubTotal->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_SubTotal"));
		$this->SubTotal->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_SubTotal"));

		// createdby
		if (!$this->isAddOrEdit())
			$this->createdby->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_createdby"));
		$this->createdby->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_createdby"));

		// createddatetime
		if (!$this->isAddOrEdit())
			$this->createddatetime->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_createddatetime"));
		$this->createddatetime->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_createddatetime"));

		// createdDate
		if (!$this->isAddOrEdit())
			$this->createdDate->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_createdDate"));
		$this->createdDate->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_createdDate"));
		$this->createdDate->AdvancedSearch->setSearchCondition($CurrentForm->getValue("v_createdDate"));
		$this->createdDate->AdvancedSearch->setSearchValue2($CurrentForm->getValue("y_createdDate"));
		$this->createdDate->AdvancedSearch->setSearchOperator2($CurrentForm->getValue("w_createdDate"));

		// DrName
		if (!$this->isAddOrEdit())
			$this->DrName->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_DrName"));
		$this->DrName->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_DrName"));

		// DRDepartment
		if (!$this->isAddOrEdit())
			$this->DRDepartment->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_DRDepartment"));
		$this->DRDepartment->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_DRDepartment"));

		// ItemCode
		if (!$this->isAddOrEdit())
			$this->ItemCode->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_ItemCode"));
		$this->ItemCode->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_ItemCode"));

		// DEptCd
		if (!$this->isAddOrEdit())
			$this->DEptCd->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_DEptCd"));
		$this->DEptCd->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_DEptCd"));

		// CODE
		if (!$this->isAddOrEdit())
			$this->CODE->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_CODE"));
		$this->CODE->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_CODE"));

		// SERVICE
		if (!$this->isAddOrEdit())
			$this->SERVICE->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_SERVICE"));
		$this->SERVICE->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_SERVICE"));

		// SERVICE_TYPE
		if (!$this->isAddOrEdit())
			$this->SERVICE_TYPE->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_SERVICE_TYPE"));
		$this->SERVICE_TYPE->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_SERVICE_TYPE"));

		// DEPARTMENT
		if (!$this->isAddOrEdit())
			$this->DEPARTMENT->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_DEPARTMENT"));
		$this->DEPARTMENT->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_DEPARTMENT"));

		// HospID
		if (!$this->isAddOrEdit())
			$this->HospID->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_HospID"));
		$this->HospID->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_HospID"));

		// vid
		if (!$this->isAddOrEdit())
			$this->vid->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_vid"));
		$this->vid->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_vid"));
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
		if ($this->SubTotal->FormValue == $this->SubTotal->CurrentValue && is_numeric(ConvertToFloatString($this->SubTotal->CurrentValue)))
			$this->SubTotal->CurrentValue = ConvertToFloatString($this->SubTotal->CurrentValue);

		// Call Row_Rendering event
		$this->Row_Rendering();

		// Common render codes for all row types
		// PatientId
		// PatientName
		// Services
		// amount
		// SubTotal
		// createdby
		// createddatetime
		// createdDate
		// DrName
		// DRDepartment
		// ItemCode
		// DEptCd
		// CODE
		// SERVICE
		// SERVICE_TYPE
		// DEPARTMENT
		// HospID
		// vid

		if ($this->RowType == ROWTYPE_VIEW) { // View row

			// PatientId
			$this->PatientId->ViewValue = $this->PatientId->CurrentValue;
			$this->PatientId->ViewCustomAttributes = "";

			// PatientName
			$this->PatientName->ViewValue = $this->PatientName->CurrentValue;
			$this->PatientName->ViewCustomAttributes = "";

			// Services
			$this->Services->ViewValue = $this->Services->CurrentValue;
			$this->Services->ViewCustomAttributes = "";

			// amount
			$this->amount->ViewValue = $this->amount->CurrentValue;
			$this->amount->ViewValue = FormatNumber($this->amount->ViewValue, 2, -2, -2, -2);
			$this->amount->ViewCustomAttributes = "";

			// SubTotal
			$this->SubTotal->ViewValue = $this->SubTotal->CurrentValue;
			$this->SubTotal->ViewValue = FormatNumber($this->SubTotal->ViewValue, 2, -2, -2, -2);
			$this->SubTotal->ViewCustomAttributes = "";

			// createdby
			$this->createdby->ViewValue = $this->createdby->CurrentValue;
			$this->createdby->ViewCustomAttributes = "";

			// createddatetime
			$this->createddatetime->ViewValue = $this->createddatetime->CurrentValue;
			$this->createddatetime->ViewValue = FormatDateTime($this->createddatetime->ViewValue, 0);
			$this->createddatetime->ViewCustomAttributes = "";

			// createdDate
			$this->createdDate->ViewValue = $this->createdDate->CurrentValue;
			$this->createdDate->ViewValue = FormatDateTime($this->createdDate->ViewValue, 7);
			$this->createdDate->ViewCustomAttributes = "";

			// DrName
			$curVal = strval($this->DrName->CurrentValue);
			if ($curVal <> "") {
				$this->DrName->ViewValue = $this->DrName->lookupCacheOption($curVal);
				if ($this->DrName->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`NAME`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->DrName->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = $rswrk->fields('df');
						$this->DrName->ViewValue = $this->DrName->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->DrName->ViewValue = $this->DrName->CurrentValue;
					}
				}
			} else {
				$this->DrName->ViewValue = NULL;
			}
			$this->DrName->ViewCustomAttributes = "";

			// DRDepartment
			$this->DRDepartment->ViewValue = $this->DRDepartment->CurrentValue;
			$this->DRDepartment->ViewCustomAttributes = "";

			// ItemCode
			$this->ItemCode->ViewValue = $this->ItemCode->CurrentValue;
			$this->ItemCode->ViewCustomAttributes = "";

			// DEptCd
			$this->DEptCd->ViewValue = $this->DEptCd->CurrentValue;
			$this->DEptCd->ViewCustomAttributes = "";

			// CODE
			$this->CODE->ViewValue = $this->CODE->CurrentValue;
			$this->CODE->ViewCustomAttributes = "";

			// SERVICE
			$this->SERVICE->ViewValue = $this->SERVICE->CurrentValue;
			$this->SERVICE->ViewCustomAttributes = "";

			// SERVICE_TYPE
			$this->SERVICE_TYPE->ViewValue = $this->SERVICE_TYPE->CurrentValue;
			$this->SERVICE_TYPE->ViewCustomAttributes = "";

			// DEPARTMENT
			$this->DEPARTMENT->ViewValue = $this->DEPARTMENT->CurrentValue;
			$this->DEPARTMENT->ViewCustomAttributes = "";

			// HospID
			$this->HospID->ViewValue = $this->HospID->CurrentValue;
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

			// vid
			$this->vid->ViewValue = $this->vid->CurrentValue;
			$this->vid->ViewValue = FormatNumber($this->vid->ViewValue, 0, -2, -2, -2);
			$this->vid->ViewCustomAttributes = "";

			// PatientId
			$this->PatientId->LinkCustomAttributes = "";
			$this->PatientId->HrefValue = "";
			$this->PatientId->TooltipValue = "";

			// PatientName
			$this->PatientName->LinkCustomAttributes = "";
			$this->PatientName->HrefValue = "";
			$this->PatientName->TooltipValue = "";

			// Services
			$this->Services->LinkCustomAttributes = "";
			$this->Services->HrefValue = "";
			$this->Services->TooltipValue = "";

			// amount
			$this->amount->LinkCustomAttributes = "";
			$this->amount->HrefValue = "";
			$this->amount->TooltipValue = "";

			// SubTotal
			$this->SubTotal->LinkCustomAttributes = "";
			$this->SubTotal->HrefValue = "";
			$this->SubTotal->TooltipValue = "";

			// createdby
			$this->createdby->LinkCustomAttributes = "";
			$this->createdby->HrefValue = "";
			$this->createdby->TooltipValue = "";

			// createddatetime
			$this->createddatetime->LinkCustomAttributes = "";
			$this->createddatetime->HrefValue = "";
			$this->createddatetime->TooltipValue = "";

			// createdDate
			$this->createdDate->LinkCustomAttributes = "";
			$this->createdDate->HrefValue = "";
			$this->createdDate->TooltipValue = "";

			// DrName
			$this->DrName->LinkCustomAttributes = "";
			$this->DrName->HrefValue = "";
			$this->DrName->TooltipValue = "";

			// DRDepartment
			$this->DRDepartment->LinkCustomAttributes = "";
			$this->DRDepartment->HrefValue = "";
			$this->DRDepartment->TooltipValue = "";

			// ItemCode
			$this->ItemCode->LinkCustomAttributes = "";
			$this->ItemCode->HrefValue = "";
			$this->ItemCode->TooltipValue = "";

			// DEptCd
			$this->DEptCd->LinkCustomAttributes = "";
			$this->DEptCd->HrefValue = "";
			$this->DEptCd->TooltipValue = "";

			// CODE
			$this->CODE->LinkCustomAttributes = "";
			$this->CODE->HrefValue = "";
			$this->CODE->TooltipValue = "";

			// SERVICE
			$this->SERVICE->LinkCustomAttributes = "";
			$this->SERVICE->HrefValue = "";
			$this->SERVICE->TooltipValue = "";

			// SERVICE_TYPE
			$this->SERVICE_TYPE->LinkCustomAttributes = "";
			$this->SERVICE_TYPE->HrefValue = "";
			$this->SERVICE_TYPE->TooltipValue = "";

			// DEPARTMENT
			$this->DEPARTMENT->LinkCustomAttributes = "";
			$this->DEPARTMENT->HrefValue = "";
			$this->DEPARTMENT->TooltipValue = "";

			// HospID
			$this->HospID->LinkCustomAttributes = "";
			$this->HospID->HrefValue = "";
			$this->HospID->TooltipValue = "";

			// vid
			$this->vid->LinkCustomAttributes = "";
			$this->vid->HrefValue = "";
			$this->vid->TooltipValue = "";
		} elseif ($this->RowType == ROWTYPE_SEARCH) { // Search row

			// PatientId
			$this->PatientId->EditAttrs["class"] = "form-control";
			$this->PatientId->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->PatientId->AdvancedSearch->SearchValue = HtmlDecode($this->PatientId->AdvancedSearch->SearchValue);
			$this->PatientId->EditValue = HtmlEncode($this->PatientId->AdvancedSearch->SearchValue);
			$this->PatientId->PlaceHolder = RemoveHtml($this->PatientId->caption());

			// PatientName
			$this->PatientName->EditAttrs["class"] = "form-control";
			$this->PatientName->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->PatientName->AdvancedSearch->SearchValue = HtmlDecode($this->PatientName->AdvancedSearch->SearchValue);
			$this->PatientName->EditValue = HtmlEncode($this->PatientName->AdvancedSearch->SearchValue);
			$this->PatientName->PlaceHolder = RemoveHtml($this->PatientName->caption());

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

			// SubTotal
			$this->SubTotal->EditAttrs["class"] = "form-control";
			$this->SubTotal->EditCustomAttributes = "";
			$this->SubTotal->EditValue = HtmlEncode($this->SubTotal->AdvancedSearch->SearchValue);
			$this->SubTotal->PlaceHolder = RemoveHtml($this->SubTotal->caption());

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

			// createdDate
			$this->createdDate->EditAttrs["class"] = "form-control";
			$this->createdDate->EditCustomAttributes = "";
			$this->createdDate->EditValue = HtmlEncode(FormatDateTime(UnFormatDateTime($this->createdDate->AdvancedSearch->SearchValue, 7), 7));
			$this->createdDate->PlaceHolder = RemoveHtml($this->createdDate->caption());
			$this->createdDate->EditAttrs["class"] = "form-control";
			$this->createdDate->EditCustomAttributes = "";
			$this->createdDate->EditValue2 = HtmlEncode(FormatDateTime(UnFormatDateTime($this->createdDate->AdvancedSearch->SearchValue2, 7), 7));
			$this->createdDate->PlaceHolder = RemoveHtml($this->createdDate->caption());

			// DrName
			$this->DrName->EditCustomAttributes = "";
			$curVal = trim(strval($this->DrName->AdvancedSearch->SearchValue));
			if ($curVal <> "")
				$this->DrName->AdvancedSearch->ViewValue = $this->DrName->lookupCacheOption($curVal);
			else
				$this->DrName->AdvancedSearch->ViewValue = $this->DrName->Lookup !== NULL && is_array($this->DrName->Lookup->Options) ? $curVal : NULL;
			if ($this->DrName->AdvancedSearch->ViewValue !== NULL) { // Load from cache
				$this->DrName->EditValue = array_values($this->DrName->Lookup->Options);
				if ($this->DrName->AdvancedSearch->ViewValue == "")
					$this->DrName->AdvancedSearch->ViewValue = $Language->phrase("PleaseSelect");
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`NAME`" . SearchString("=", $this->DrName->AdvancedSearch->SearchValue, DATATYPE_STRING, "");
				}
				$sqlWrk = $this->DrName->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = array();
					$arwrk[1] = HtmlEncode($rswrk->fields('df'));
					$this->DrName->AdvancedSearch->ViewValue = $this->DrName->displayValue($arwrk);
				} else {
					$this->DrName->AdvancedSearch->ViewValue = $Language->phrase("PleaseSelect");
				}
				$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
				if ($rswrk) $rswrk->Close();
				$this->DrName->EditValue = $arwrk;
			}

			// DRDepartment
			$this->DRDepartment->EditAttrs["class"] = "form-control";
			$this->DRDepartment->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->DRDepartment->AdvancedSearch->SearchValue = HtmlDecode($this->DRDepartment->AdvancedSearch->SearchValue);
			$this->DRDepartment->EditValue = HtmlEncode($this->DRDepartment->AdvancedSearch->SearchValue);
			$this->DRDepartment->PlaceHolder = RemoveHtml($this->DRDepartment->caption());

			// ItemCode
			$this->ItemCode->EditAttrs["class"] = "form-control";
			$this->ItemCode->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->ItemCode->AdvancedSearch->SearchValue = HtmlDecode($this->ItemCode->AdvancedSearch->SearchValue);
			$this->ItemCode->EditValue = HtmlEncode($this->ItemCode->AdvancedSearch->SearchValue);
			$this->ItemCode->PlaceHolder = RemoveHtml($this->ItemCode->caption());

			// DEptCd
			$this->DEptCd->EditAttrs["class"] = "form-control";
			$this->DEptCd->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->DEptCd->AdvancedSearch->SearchValue = HtmlDecode($this->DEptCd->AdvancedSearch->SearchValue);
			$this->DEptCd->EditValue = HtmlEncode($this->DEptCd->AdvancedSearch->SearchValue);
			$this->DEptCd->PlaceHolder = RemoveHtml($this->DEptCd->caption());

			// CODE
			$this->CODE->EditAttrs["class"] = "form-control";
			$this->CODE->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->CODE->AdvancedSearch->SearchValue = HtmlDecode($this->CODE->AdvancedSearch->SearchValue);
			$this->CODE->EditValue = HtmlEncode($this->CODE->AdvancedSearch->SearchValue);
			$this->CODE->PlaceHolder = RemoveHtml($this->CODE->caption());

			// SERVICE
			$this->SERVICE->EditAttrs["class"] = "form-control";
			$this->SERVICE->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->SERVICE->AdvancedSearch->SearchValue = HtmlDecode($this->SERVICE->AdvancedSearch->SearchValue);
			$this->SERVICE->EditValue = HtmlEncode($this->SERVICE->AdvancedSearch->SearchValue);
			$this->SERVICE->PlaceHolder = RemoveHtml($this->SERVICE->caption());

			// SERVICE_TYPE
			$this->SERVICE_TYPE->EditAttrs["class"] = "form-control";
			$this->SERVICE_TYPE->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->SERVICE_TYPE->AdvancedSearch->SearchValue = HtmlDecode($this->SERVICE_TYPE->AdvancedSearch->SearchValue);
			$this->SERVICE_TYPE->EditValue = HtmlEncode($this->SERVICE_TYPE->AdvancedSearch->SearchValue);
			$this->SERVICE_TYPE->PlaceHolder = RemoveHtml($this->SERVICE_TYPE->caption());

			// DEPARTMENT
			$this->DEPARTMENT->EditAttrs["class"] = "form-control";
			$this->DEPARTMENT->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->DEPARTMENT->AdvancedSearch->SearchValue = HtmlDecode($this->DEPARTMENT->AdvancedSearch->SearchValue);
			$this->DEPARTMENT->EditValue = HtmlEncode($this->DEPARTMENT->AdvancedSearch->SearchValue);
			$this->DEPARTMENT->PlaceHolder = RemoveHtml($this->DEPARTMENT->caption());

			// HospID
			$this->HospID->EditAttrs["class"] = "form-control";
			$this->HospID->EditCustomAttributes = "";
			$this->HospID->EditValue = HtmlEncode($this->HospID->AdvancedSearch->SearchValue);
			$curVal = strval($this->HospID->AdvancedSearch->SearchValue);
			if ($curVal <> "") {
				$this->HospID->EditValue = $this->HospID->lookupCacheOption($curVal);
				if ($this->HospID->EditValue === NULL) { // Lookup from database
					$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
					$sqlWrk = $this->HospID->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = HtmlEncode($rswrk->fields('df'));
						$this->HospID->EditValue = $this->HospID->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->HospID->EditValue = HtmlEncode($this->HospID->AdvancedSearch->SearchValue);
					}
				}
			} else {
				$this->HospID->EditValue = NULL;
			}
			$this->HospID->PlaceHolder = RemoveHtml($this->HospID->caption());

			// vid
			$this->vid->EditAttrs["class"] = "form-control";
			$this->vid->EditCustomAttributes = "";
			$this->vid->EditValue = HtmlEncode($this->vid->AdvancedSearch->SearchValue);
			$this->vid->PlaceHolder = RemoveHtml($this->vid->caption());
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
		if (!CheckNumber($this->amount->AdvancedSearch->SearchValue)) {
			AddMessage($SearchError, $this->amount->errorMessage());
		}
		if (!CheckNumber($this->SubTotal->AdvancedSearch->SearchValue)) {
			AddMessage($SearchError, $this->SubTotal->errorMessage());
		}
		if (!CheckDate($this->createddatetime->AdvancedSearch->SearchValue)) {
			AddMessage($SearchError, $this->createddatetime->errorMessage());
		}
		if (!CheckEuroDate($this->createdDate->AdvancedSearch->SearchValue)) {
			AddMessage($SearchError, $this->createdDate->errorMessage());
		}
		if (!CheckEuroDate($this->createdDate->AdvancedSearch->SearchValue2)) {
			AddMessage($SearchError, $this->createdDate->errorMessage());
		}
		if (!CheckInteger($this->HospID->AdvancedSearch->SearchValue)) {
			AddMessage($SearchError, $this->HospID->errorMessage());
		}
		if (!CheckInteger($this->vid->AdvancedSearch->SearchValue)) {
			AddMessage($SearchError, $this->vid->errorMessage());
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
		$this->PatientId->AdvancedSearch->load();
		$this->PatientName->AdvancedSearch->load();
		$this->Services->AdvancedSearch->load();
		$this->amount->AdvancedSearch->load();
		$this->SubTotal->AdvancedSearch->load();
		$this->createdby->AdvancedSearch->load();
		$this->createddatetime->AdvancedSearch->load();
		$this->createdDate->AdvancedSearch->load();
		$this->DrName->AdvancedSearch->load();
		$this->DRDepartment->AdvancedSearch->load();
		$this->ItemCode->AdvancedSearch->load();
		$this->DEptCd->AdvancedSearch->load();
		$this->CODE->AdvancedSearch->load();
		$this->SERVICE->AdvancedSearch->load();
		$this->SERVICE_TYPE->AdvancedSearch->load();
		$this->DEPARTMENT->AdvancedSearch->load();
		$this->HospID->AdvancedSearch->load();
		$this->vid->AdvancedSearch->load();
	}

	// Set up Breadcrumb
	protected function setupBreadcrumb()
	{
		global $Breadcrumb, $Language;
		$Breadcrumb = new Breadcrumb();
		$url = substr(CurrentUrl(), strrpos(CurrentUrl(), "/")+1);
		$Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("view_dashboard_service_detailslist.php"), "", $this->TableVar, TRUE);
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
						case "x_DrName":
							break;
						case "x_HospID":
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
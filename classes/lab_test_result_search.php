<?php
namespace PHPMaker2019\HIMS;

/**
 * Page class
 */
class lab_test_result_search extends lab_test_result
{

	// Page ID
	public $PageID = "search";

	// Project ID
	public $ProjectID = "{EA4F6D13-AF8F-428D-9EA7-BA88D1107EC3}";

	// Table name
	public $TableName = 'lab_test_result';

	// Page object name
	public $PageObjName = "lab_test_result_search";

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

		// Table object (lab_test_result)
		if (!isset($GLOBALS["lab_test_result"]) || get_class($GLOBALS["lab_test_result"]) == PROJECT_NAMESPACE . "lab_test_result") {
			$GLOBALS["lab_test_result"] = &$this;
			$GLOBALS["Table"] = &$GLOBALS["lab_test_result"];
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
			define(PROJECT_NAMESPACE . "TABLE_NAME", 'lab_test_result');

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
		global $EXPORT, $lab_test_result;
		if ($this->CustomExport && $this->CustomExport == $this->Export && array_key_exists($this->CustomExport, $EXPORT)) {
				$content = ob_get_contents();
			if ($ExportFileName == "")
				$ExportFileName = $this->TableVar;
			$class = PROJECT_NAMESPACE . $EXPORT[$this->CustomExport];
			if (class_exists($class)) {
				$doc = new $class($lab_test_result);
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
					if ($pageName == "lab_test_resultview.php")
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
					$this->terminate(GetUrl("lab_test_resultlist.php"));
				else
					$this->terminate(GetUrl("login.php"));
				return;
			}
		}

		// Create form object
		$CurrentForm = new HttpForm();
		$this->CurrentAction = Param("action"); // Set up current action
		$this->Branch->setVisibility();
		$this->SidNo->setVisibility();
		$this->SidDate->setVisibility();
		$this->TestCd->setVisibility();
		$this->TestSubCd->setVisibility();
		$this->DEptCd->setVisibility();
		$this->ProfCd->setVisibility();
		$this->LabReport->setVisibility();
		$this->ResultDate->setVisibility();
		$this->Comments->setVisibility();
		$this->Method->setVisibility();
		$this->Specimen->setVisibility();
		$this->Amount->setVisibility();
		$this->ResultBy->setVisibility();
		$this->AuthBy->setVisibility();
		$this->AuthDate->setVisibility();
		$this->Abnormal->setVisibility();
		$this->Printed->setVisibility();
		$this->Dispatch->setVisibility();
		$this->LOWHIGH->setVisibility();
		$this->RefValue->setVisibility();
		$this->Unit->setVisibility();
		$this->ResDate->setVisibility();
		$this->Pic1->setVisibility();
		$this->Pic2->setVisibility();
		$this->GraphPath->setVisibility();
		$this->SampleDate->setVisibility();
		$this->SampleUser->setVisibility();
		$this->ReceivedDate->setVisibility();
		$this->ReceivedUser->setVisibility();
		$this->DeptRecvDate->setVisibility();
		$this->DeptRecvUser->setVisibility();
		$this->PrintBy->setVisibility();
		$this->PrintDate->setVisibility();
		$this->MachineCD->setVisibility();
		$this->TestCancel->setVisibility();
		$this->OutSource->setVisibility();
		$this->Tariff->setVisibility();
		$this->EDITDATE->setVisibility();
		$this->UPLOAD->setVisibility();
		$this->SAuthDate->setVisibility();
		$this->SAuthBy->setVisibility();
		$this->NoRC->setVisibility();
		$this->DispDt->setVisibility();
		$this->DispUser->setVisibility();
		$this->DispRemarks->setVisibility();
		$this->DispMode->setVisibility();
		$this->ProductCD->setVisibility();
		$this->Nos->setVisibility();
		$this->WBCPath->setVisibility();
		$this->RBCPath->setVisibility();
		$this->PTPath->setVisibility();
		$this->ActualAmt->setVisibility();
		$this->NoSign->setVisibility();
		$this->_Barcode->setVisibility();
		$this->ReadTime->setVisibility();
		$this->Result->setVisibility();
		$this->VailID->setVisibility();
		$this->ReadMachine->setVisibility();
		$this->LabCD->setVisibility();
		$this->OutLabAmt->setVisibility();
		$this->ProductQty->setVisibility();
		$this->Repeat->setVisibility();
		$this->DeptNo->setVisibility();
		$this->Desc1->setVisibility();
		$this->Desc2->setVisibility();
		$this->RptResult->setVisibility();
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
					$srchStr = "lab_test_resultlist.php" . "?" . $srchStr;
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
		$this->buildSearchUrl($srchUrl, $this->Branch); // Branch
		$this->buildSearchUrl($srchUrl, $this->SidNo); // SidNo
		$this->buildSearchUrl($srchUrl, $this->SidDate); // SidDate
		$this->buildSearchUrl($srchUrl, $this->TestCd); // TestCd
		$this->buildSearchUrl($srchUrl, $this->TestSubCd); // TestSubCd
		$this->buildSearchUrl($srchUrl, $this->DEptCd); // DEptCd
		$this->buildSearchUrl($srchUrl, $this->ProfCd); // ProfCd
		$this->buildSearchUrl($srchUrl, $this->LabReport); // LabReport
		$this->buildSearchUrl($srchUrl, $this->ResultDate); // ResultDate
		$this->buildSearchUrl($srchUrl, $this->Comments); // Comments
		$this->buildSearchUrl($srchUrl, $this->Method); // Method
		$this->buildSearchUrl($srchUrl, $this->Specimen); // Specimen
		$this->buildSearchUrl($srchUrl, $this->Amount); // Amount
		$this->buildSearchUrl($srchUrl, $this->ResultBy); // ResultBy
		$this->buildSearchUrl($srchUrl, $this->AuthBy); // AuthBy
		$this->buildSearchUrl($srchUrl, $this->AuthDate); // AuthDate
		$this->buildSearchUrl($srchUrl, $this->Abnormal); // Abnormal
		$this->buildSearchUrl($srchUrl, $this->Printed); // Printed
		$this->buildSearchUrl($srchUrl, $this->Dispatch); // Dispatch
		$this->buildSearchUrl($srchUrl, $this->LOWHIGH); // LOWHIGH
		$this->buildSearchUrl($srchUrl, $this->RefValue); // RefValue
		$this->buildSearchUrl($srchUrl, $this->Unit); // Unit
		$this->buildSearchUrl($srchUrl, $this->ResDate); // ResDate
		$this->buildSearchUrl($srchUrl, $this->Pic1); // Pic1
		$this->buildSearchUrl($srchUrl, $this->Pic2); // Pic2
		$this->buildSearchUrl($srchUrl, $this->GraphPath); // GraphPath
		$this->buildSearchUrl($srchUrl, $this->SampleDate); // SampleDate
		$this->buildSearchUrl($srchUrl, $this->SampleUser); // SampleUser
		$this->buildSearchUrl($srchUrl, $this->ReceivedDate); // ReceivedDate
		$this->buildSearchUrl($srchUrl, $this->ReceivedUser); // ReceivedUser
		$this->buildSearchUrl($srchUrl, $this->DeptRecvDate); // DeptRecvDate
		$this->buildSearchUrl($srchUrl, $this->DeptRecvUser); // DeptRecvUser
		$this->buildSearchUrl($srchUrl, $this->PrintBy); // PrintBy
		$this->buildSearchUrl($srchUrl, $this->PrintDate); // PrintDate
		$this->buildSearchUrl($srchUrl, $this->MachineCD); // MachineCD
		$this->buildSearchUrl($srchUrl, $this->TestCancel); // TestCancel
		$this->buildSearchUrl($srchUrl, $this->OutSource); // OutSource
		$this->buildSearchUrl($srchUrl, $this->Tariff); // Tariff
		$this->buildSearchUrl($srchUrl, $this->EDITDATE); // EDITDATE
		$this->buildSearchUrl($srchUrl, $this->UPLOAD); // UPLOAD
		$this->buildSearchUrl($srchUrl, $this->SAuthDate); // SAuthDate
		$this->buildSearchUrl($srchUrl, $this->SAuthBy); // SAuthBy
		$this->buildSearchUrl($srchUrl, $this->NoRC); // NoRC
		$this->buildSearchUrl($srchUrl, $this->DispDt); // DispDt
		$this->buildSearchUrl($srchUrl, $this->DispUser); // DispUser
		$this->buildSearchUrl($srchUrl, $this->DispRemarks); // DispRemarks
		$this->buildSearchUrl($srchUrl, $this->DispMode); // DispMode
		$this->buildSearchUrl($srchUrl, $this->ProductCD); // ProductCD
		$this->buildSearchUrl($srchUrl, $this->Nos); // Nos
		$this->buildSearchUrl($srchUrl, $this->WBCPath); // WBCPath
		$this->buildSearchUrl($srchUrl, $this->RBCPath); // RBCPath
		$this->buildSearchUrl($srchUrl, $this->PTPath); // PTPath
		$this->buildSearchUrl($srchUrl, $this->ActualAmt); // ActualAmt
		$this->buildSearchUrl($srchUrl, $this->NoSign); // NoSign
		$this->buildSearchUrl($srchUrl, $this->_Barcode); // Barcode
		$this->buildSearchUrl($srchUrl, $this->ReadTime); // ReadTime
		$this->buildSearchUrl($srchUrl, $this->Result); // Result
		$this->buildSearchUrl($srchUrl, $this->VailID); // VailID
		$this->buildSearchUrl($srchUrl, $this->ReadMachine); // ReadMachine
		$this->buildSearchUrl($srchUrl, $this->LabCD); // LabCD
		$this->buildSearchUrl($srchUrl, $this->OutLabAmt); // OutLabAmt
		$this->buildSearchUrl($srchUrl, $this->ProductQty); // ProductQty
		$this->buildSearchUrl($srchUrl, $this->Repeat); // Repeat
		$this->buildSearchUrl($srchUrl, $this->DeptNo); // DeptNo
		$this->buildSearchUrl($srchUrl, $this->Desc1); // Desc1
		$this->buildSearchUrl($srchUrl, $this->Desc2); // Desc2
		$this->buildSearchUrl($srchUrl, $this->RptResult); // RptResult
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
		// Branch

		if (!$this->isAddOrEdit())
			$this->Branch->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_Branch"));
		$this->Branch->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_Branch"));

		// SidNo
		if (!$this->isAddOrEdit())
			$this->SidNo->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_SidNo"));
		$this->SidNo->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_SidNo"));

		// SidDate
		if (!$this->isAddOrEdit())
			$this->SidDate->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_SidDate"));
		$this->SidDate->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_SidDate"));

		// TestCd
		if (!$this->isAddOrEdit())
			$this->TestCd->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_TestCd"));
		$this->TestCd->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_TestCd"));

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

		// ResultDate
		if (!$this->isAddOrEdit())
			$this->ResultDate->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_ResultDate"));
		$this->ResultDate->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_ResultDate"));

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

		// Amount
		if (!$this->isAddOrEdit())
			$this->Amount->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_Amount"));
		$this->Amount->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_Amount"));

		// ResultBy
		if (!$this->isAddOrEdit())
			$this->ResultBy->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_ResultBy"));
		$this->ResultBy->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_ResultBy"));

		// AuthBy
		if (!$this->isAddOrEdit())
			$this->AuthBy->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_AuthBy"));
		$this->AuthBy->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_AuthBy"));

		// AuthDate
		if (!$this->isAddOrEdit())
			$this->AuthDate->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_AuthDate"));
		$this->AuthDate->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_AuthDate"));

		// Abnormal
		if (!$this->isAddOrEdit())
			$this->Abnormal->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_Abnormal"));
		$this->Abnormal->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_Abnormal"));

		// Printed
		if (!$this->isAddOrEdit())
			$this->Printed->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_Printed"));
		$this->Printed->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_Printed"));

		// Dispatch
		if (!$this->isAddOrEdit())
			$this->Dispatch->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_Dispatch"));
		$this->Dispatch->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_Dispatch"));

		// LOWHIGH
		if (!$this->isAddOrEdit())
			$this->LOWHIGH->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_LOWHIGH"));
		$this->LOWHIGH->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_LOWHIGH"));

		// RefValue
		if (!$this->isAddOrEdit())
			$this->RefValue->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_RefValue"));
		$this->RefValue->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_RefValue"));

		// Unit
		if (!$this->isAddOrEdit())
			$this->Unit->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_Unit"));
		$this->Unit->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_Unit"));

		// ResDate
		if (!$this->isAddOrEdit())
			$this->ResDate->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_ResDate"));
		$this->ResDate->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_ResDate"));

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

		// SampleDate
		if (!$this->isAddOrEdit())
			$this->SampleDate->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_SampleDate"));
		$this->SampleDate->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_SampleDate"));

		// SampleUser
		if (!$this->isAddOrEdit())
			$this->SampleUser->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_SampleUser"));
		$this->SampleUser->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_SampleUser"));

		// ReceivedDate
		if (!$this->isAddOrEdit())
			$this->ReceivedDate->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_ReceivedDate"));
		$this->ReceivedDate->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_ReceivedDate"));

		// ReceivedUser
		if (!$this->isAddOrEdit())
			$this->ReceivedUser->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_ReceivedUser"));
		$this->ReceivedUser->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_ReceivedUser"));

		// DeptRecvDate
		if (!$this->isAddOrEdit())
			$this->DeptRecvDate->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_DeptRecvDate"));
		$this->DeptRecvDate->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_DeptRecvDate"));

		// DeptRecvUser
		if (!$this->isAddOrEdit())
			$this->DeptRecvUser->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_DeptRecvUser"));
		$this->DeptRecvUser->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_DeptRecvUser"));

		// PrintBy
		if (!$this->isAddOrEdit())
			$this->PrintBy->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_PrintBy"));
		$this->PrintBy->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_PrintBy"));

		// PrintDate
		if (!$this->isAddOrEdit())
			$this->PrintDate->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_PrintDate"));
		$this->PrintDate->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_PrintDate"));

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

		// Tariff
		if (!$this->isAddOrEdit())
			$this->Tariff->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_Tariff"));
		$this->Tariff->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_Tariff"));

		// EDITDATE
		if (!$this->isAddOrEdit())
			$this->EDITDATE->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_EDITDATE"));
		$this->EDITDATE->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_EDITDATE"));

		// UPLOAD
		if (!$this->isAddOrEdit())
			$this->UPLOAD->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_UPLOAD"));
		$this->UPLOAD->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_UPLOAD"));

		// SAuthDate
		if (!$this->isAddOrEdit())
			$this->SAuthDate->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_SAuthDate"));
		$this->SAuthDate->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_SAuthDate"));

		// SAuthBy
		if (!$this->isAddOrEdit())
			$this->SAuthBy->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_SAuthBy"));
		$this->SAuthBy->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_SAuthBy"));

		// NoRC
		if (!$this->isAddOrEdit())
			$this->NoRC->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_NoRC"));
		$this->NoRC->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_NoRC"));

		// DispDt
		if (!$this->isAddOrEdit())
			$this->DispDt->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_DispDt"));
		$this->DispDt->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_DispDt"));

		// DispUser
		if (!$this->isAddOrEdit())
			$this->DispUser->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_DispUser"));
		$this->DispUser->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_DispUser"));

		// DispRemarks
		if (!$this->isAddOrEdit())
			$this->DispRemarks->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_DispRemarks"));
		$this->DispRemarks->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_DispRemarks"));

		// DispMode
		if (!$this->isAddOrEdit())
			$this->DispMode->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_DispMode"));
		$this->DispMode->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_DispMode"));

		// ProductCD
		if (!$this->isAddOrEdit())
			$this->ProductCD->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_ProductCD"));
		$this->ProductCD->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_ProductCD"));

		// Nos
		if (!$this->isAddOrEdit())
			$this->Nos->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_Nos"));
		$this->Nos->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_Nos"));

		// WBCPath
		if (!$this->isAddOrEdit())
			$this->WBCPath->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_WBCPath"));
		$this->WBCPath->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_WBCPath"));

		// RBCPath
		if (!$this->isAddOrEdit())
			$this->RBCPath->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_RBCPath"));
		$this->RBCPath->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_RBCPath"));

		// PTPath
		if (!$this->isAddOrEdit())
			$this->PTPath->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_PTPath"));
		$this->PTPath->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_PTPath"));

		// ActualAmt
		if (!$this->isAddOrEdit())
			$this->ActualAmt->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_ActualAmt"));
		$this->ActualAmt->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_ActualAmt"));

		// NoSign
		if (!$this->isAddOrEdit())
			$this->NoSign->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_NoSign"));
		$this->NoSign->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_NoSign"));

		// Barcode
		if (!$this->isAddOrEdit())
			$this->_Barcode->AdvancedSearch->setSearchValue($CurrentForm->getValue("x__Barcode"));
		$this->_Barcode->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z__Barcode"));

		// ReadTime
		if (!$this->isAddOrEdit())
			$this->ReadTime->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_ReadTime"));
		$this->ReadTime->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_ReadTime"));

		// Result
		if (!$this->isAddOrEdit())
			$this->Result->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_Result"));
		$this->Result->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_Result"));

		// VailID
		if (!$this->isAddOrEdit())
			$this->VailID->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_VailID"));
		$this->VailID->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_VailID"));

		// ReadMachine
		if (!$this->isAddOrEdit())
			$this->ReadMachine->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_ReadMachine"));
		$this->ReadMachine->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_ReadMachine"));

		// LabCD
		if (!$this->isAddOrEdit())
			$this->LabCD->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_LabCD"));
		$this->LabCD->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_LabCD"));

		// OutLabAmt
		if (!$this->isAddOrEdit())
			$this->OutLabAmt->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_OutLabAmt"));
		$this->OutLabAmt->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_OutLabAmt"));

		// ProductQty
		if (!$this->isAddOrEdit())
			$this->ProductQty->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_ProductQty"));
		$this->ProductQty->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_ProductQty"));

		// Repeat
		if (!$this->isAddOrEdit())
			$this->Repeat->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_Repeat"));
		$this->Repeat->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_Repeat"));

		// DeptNo
		if (!$this->isAddOrEdit())
			$this->DeptNo->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_DeptNo"));
		$this->DeptNo->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_DeptNo"));

		// Desc1
		if (!$this->isAddOrEdit())
			$this->Desc1->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_Desc1"));
		$this->Desc1->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_Desc1"));

		// Desc2
		if (!$this->isAddOrEdit())
			$this->Desc2->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_Desc2"));
		$this->Desc2->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_Desc2"));

		// RptResult
		if (!$this->isAddOrEdit())
			$this->RptResult->AdvancedSearch->setSearchValue($CurrentForm->getValue("x_RptResult"));
		$this->RptResult->AdvancedSearch->setSearchOperator($CurrentForm->getValue("z_RptResult"));
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
		if ($this->Tariff->FormValue == $this->Tariff->CurrentValue && is_numeric(ConvertToFloatString($this->Tariff->CurrentValue)))
			$this->Tariff->CurrentValue = ConvertToFloatString($this->Tariff->CurrentValue);

		// Convert decimal values if posted back
		if ($this->Nos->FormValue == $this->Nos->CurrentValue && is_numeric(ConvertToFloatString($this->Nos->CurrentValue)))
			$this->Nos->CurrentValue = ConvertToFloatString($this->Nos->CurrentValue);

		// Convert decimal values if posted back
		if ($this->ActualAmt->FormValue == $this->ActualAmt->CurrentValue && is_numeric(ConvertToFloatString($this->ActualAmt->CurrentValue)))
			$this->ActualAmt->CurrentValue = ConvertToFloatString($this->ActualAmt->CurrentValue);

		// Convert decimal values if posted back
		if ($this->OutLabAmt->FormValue == $this->OutLabAmt->CurrentValue && is_numeric(ConvertToFloatString($this->OutLabAmt->CurrentValue)))
			$this->OutLabAmt->CurrentValue = ConvertToFloatString($this->OutLabAmt->CurrentValue);

		// Convert decimal values if posted back
		if ($this->ProductQty->FormValue == $this->ProductQty->CurrentValue && is_numeric(ConvertToFloatString($this->ProductQty->CurrentValue)))
			$this->ProductQty->CurrentValue = ConvertToFloatString($this->ProductQty->CurrentValue);

		// Call Row_Rendering event
		$this->Row_Rendering();

		// Common render codes for all row types
		// Branch
		// SidNo
		// SidDate
		// TestCd
		// TestSubCd
		// DEptCd
		// ProfCd
		// LabReport
		// ResultDate
		// Comments
		// Method
		// Specimen
		// Amount
		// ResultBy
		// AuthBy
		// AuthDate
		// Abnormal
		// Printed
		// Dispatch
		// LOWHIGH
		// RefValue
		// Unit
		// ResDate
		// Pic1
		// Pic2
		// GraphPath
		// SampleDate
		// SampleUser
		// ReceivedDate
		// ReceivedUser
		// DeptRecvDate
		// DeptRecvUser
		// PrintBy
		// PrintDate
		// MachineCD
		// TestCancel
		// OutSource
		// Tariff
		// EDITDATE
		// UPLOAD
		// SAuthDate
		// SAuthBy
		// NoRC
		// DispDt
		// DispUser
		// DispRemarks
		// DispMode
		// ProductCD
		// Nos
		// WBCPath
		// RBCPath
		// PTPath
		// ActualAmt
		// NoSign
		// Barcode
		// ReadTime
		// Result
		// VailID
		// ReadMachine
		// LabCD
		// OutLabAmt
		// ProductQty
		// Repeat
		// DeptNo
		// Desc1
		// Desc2
		// RptResult

		if ($this->RowType == ROWTYPE_VIEW) { // View row

			// Branch
			$this->Branch->ViewValue = $this->Branch->CurrentValue;
			$this->Branch->ViewCustomAttributes = "";

			// SidNo
			$this->SidNo->ViewValue = $this->SidNo->CurrentValue;
			$this->SidNo->ViewCustomAttributes = "";

			// SidDate
			$this->SidDate->ViewValue = $this->SidDate->CurrentValue;
			$this->SidDate->ViewValue = FormatDateTime($this->SidDate->ViewValue, 0);
			$this->SidDate->ViewCustomAttributes = "";

			// TestCd
			$this->TestCd->ViewValue = $this->TestCd->CurrentValue;
			$this->TestCd->ViewCustomAttributes = "";

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

			// ResultDate
			$this->ResultDate->ViewValue = $this->ResultDate->CurrentValue;
			$this->ResultDate->ViewValue = FormatDateTime($this->ResultDate->ViewValue, 0);
			$this->ResultDate->ViewCustomAttributes = "";

			// Comments
			$this->Comments->ViewValue = $this->Comments->CurrentValue;
			$this->Comments->ViewCustomAttributes = "";

			// Method
			$this->Method->ViewValue = $this->Method->CurrentValue;
			$this->Method->ViewCustomAttributes = "";

			// Specimen
			$this->Specimen->ViewValue = $this->Specimen->CurrentValue;
			$this->Specimen->ViewCustomAttributes = "";

			// Amount
			$this->Amount->ViewValue = $this->Amount->CurrentValue;
			$this->Amount->ViewValue = FormatNumber($this->Amount->ViewValue, 2, -2, -2, -2);
			$this->Amount->ViewCustomAttributes = "";

			// ResultBy
			$this->ResultBy->ViewValue = $this->ResultBy->CurrentValue;
			$this->ResultBy->ViewCustomAttributes = "";

			// AuthBy
			$this->AuthBy->ViewValue = $this->AuthBy->CurrentValue;
			$this->AuthBy->ViewCustomAttributes = "";

			// AuthDate
			$this->AuthDate->ViewValue = $this->AuthDate->CurrentValue;
			$this->AuthDate->ViewValue = FormatDateTime($this->AuthDate->ViewValue, 0);
			$this->AuthDate->ViewCustomAttributes = "";

			// Abnormal
			$this->Abnormal->ViewValue = $this->Abnormal->CurrentValue;
			$this->Abnormal->ViewCustomAttributes = "";

			// Printed
			$this->Printed->ViewValue = $this->Printed->CurrentValue;
			$this->Printed->ViewCustomAttributes = "";

			// Dispatch
			$this->Dispatch->ViewValue = $this->Dispatch->CurrentValue;
			$this->Dispatch->ViewCustomAttributes = "";

			// LOWHIGH
			$this->LOWHIGH->ViewValue = $this->LOWHIGH->CurrentValue;
			$this->LOWHIGH->ViewCustomAttributes = "";

			// RefValue
			$this->RefValue->ViewValue = $this->RefValue->CurrentValue;
			$this->RefValue->ViewCustomAttributes = "";

			// Unit
			$this->Unit->ViewValue = $this->Unit->CurrentValue;
			$this->Unit->ViewCustomAttributes = "";

			// ResDate
			$this->ResDate->ViewValue = $this->ResDate->CurrentValue;
			$this->ResDate->ViewValue = FormatDateTime($this->ResDate->ViewValue, 0);
			$this->ResDate->ViewCustomAttributes = "";

			// Pic1
			$this->Pic1->ViewValue = $this->Pic1->CurrentValue;
			$this->Pic1->ViewCustomAttributes = "";

			// Pic2
			$this->Pic2->ViewValue = $this->Pic2->CurrentValue;
			$this->Pic2->ViewCustomAttributes = "";

			// GraphPath
			$this->GraphPath->ViewValue = $this->GraphPath->CurrentValue;
			$this->GraphPath->ViewCustomAttributes = "";

			// SampleDate
			$this->SampleDate->ViewValue = $this->SampleDate->CurrentValue;
			$this->SampleDate->ViewValue = FormatDateTime($this->SampleDate->ViewValue, 0);
			$this->SampleDate->ViewCustomAttributes = "";

			// SampleUser
			$this->SampleUser->ViewValue = $this->SampleUser->CurrentValue;
			$this->SampleUser->ViewCustomAttributes = "";

			// ReceivedDate
			$this->ReceivedDate->ViewValue = $this->ReceivedDate->CurrentValue;
			$this->ReceivedDate->ViewValue = FormatDateTime($this->ReceivedDate->ViewValue, 0);
			$this->ReceivedDate->ViewCustomAttributes = "";

			// ReceivedUser
			$this->ReceivedUser->ViewValue = $this->ReceivedUser->CurrentValue;
			$this->ReceivedUser->ViewCustomAttributes = "";

			// DeptRecvDate
			$this->DeptRecvDate->ViewValue = $this->DeptRecvDate->CurrentValue;
			$this->DeptRecvDate->ViewValue = FormatDateTime($this->DeptRecvDate->ViewValue, 0);
			$this->DeptRecvDate->ViewCustomAttributes = "";

			// DeptRecvUser
			$this->DeptRecvUser->ViewValue = $this->DeptRecvUser->CurrentValue;
			$this->DeptRecvUser->ViewCustomAttributes = "";

			// PrintBy
			$this->PrintBy->ViewValue = $this->PrintBy->CurrentValue;
			$this->PrintBy->ViewCustomAttributes = "";

			// PrintDate
			$this->PrintDate->ViewValue = $this->PrintDate->CurrentValue;
			$this->PrintDate->ViewValue = FormatDateTime($this->PrintDate->ViewValue, 0);
			$this->PrintDate->ViewCustomAttributes = "";

			// MachineCD
			$this->MachineCD->ViewValue = $this->MachineCD->CurrentValue;
			$this->MachineCD->ViewCustomAttributes = "";

			// TestCancel
			$this->TestCancel->ViewValue = $this->TestCancel->CurrentValue;
			$this->TestCancel->ViewCustomAttributes = "";

			// OutSource
			$this->OutSource->ViewValue = $this->OutSource->CurrentValue;
			$this->OutSource->ViewCustomAttributes = "";

			// Tariff
			$this->Tariff->ViewValue = $this->Tariff->CurrentValue;
			$this->Tariff->ViewValue = FormatNumber($this->Tariff->ViewValue, 2, -2, -2, -2);
			$this->Tariff->ViewCustomAttributes = "";

			// EDITDATE
			$this->EDITDATE->ViewValue = $this->EDITDATE->CurrentValue;
			$this->EDITDATE->ViewValue = FormatDateTime($this->EDITDATE->ViewValue, 0);
			$this->EDITDATE->ViewCustomAttributes = "";

			// UPLOAD
			$this->UPLOAD->ViewValue = $this->UPLOAD->CurrentValue;
			$this->UPLOAD->ViewCustomAttributes = "";

			// SAuthDate
			$this->SAuthDate->ViewValue = $this->SAuthDate->CurrentValue;
			$this->SAuthDate->ViewValue = FormatDateTime($this->SAuthDate->ViewValue, 0);
			$this->SAuthDate->ViewCustomAttributes = "";

			// SAuthBy
			$this->SAuthBy->ViewValue = $this->SAuthBy->CurrentValue;
			$this->SAuthBy->ViewCustomAttributes = "";

			// NoRC
			$this->NoRC->ViewValue = $this->NoRC->CurrentValue;
			$this->NoRC->ViewCustomAttributes = "";

			// DispDt
			$this->DispDt->ViewValue = $this->DispDt->CurrentValue;
			$this->DispDt->ViewValue = FormatDateTime($this->DispDt->ViewValue, 0);
			$this->DispDt->ViewCustomAttributes = "";

			// DispUser
			$this->DispUser->ViewValue = $this->DispUser->CurrentValue;
			$this->DispUser->ViewCustomAttributes = "";

			// DispRemarks
			$this->DispRemarks->ViewValue = $this->DispRemarks->CurrentValue;
			$this->DispRemarks->ViewCustomAttributes = "";

			// DispMode
			$this->DispMode->ViewValue = $this->DispMode->CurrentValue;
			$this->DispMode->ViewCustomAttributes = "";

			// ProductCD
			$this->ProductCD->ViewValue = $this->ProductCD->CurrentValue;
			$this->ProductCD->ViewCustomAttributes = "";

			// Nos
			$this->Nos->ViewValue = $this->Nos->CurrentValue;
			$this->Nos->ViewValue = FormatNumber($this->Nos->ViewValue, 2, -2, -2, -2);
			$this->Nos->ViewCustomAttributes = "";

			// WBCPath
			$this->WBCPath->ViewValue = $this->WBCPath->CurrentValue;
			$this->WBCPath->ViewCustomAttributes = "";

			// RBCPath
			$this->RBCPath->ViewValue = $this->RBCPath->CurrentValue;
			$this->RBCPath->ViewCustomAttributes = "";

			// PTPath
			$this->PTPath->ViewValue = $this->PTPath->CurrentValue;
			$this->PTPath->ViewCustomAttributes = "";

			// ActualAmt
			$this->ActualAmt->ViewValue = $this->ActualAmt->CurrentValue;
			$this->ActualAmt->ViewValue = FormatNumber($this->ActualAmt->ViewValue, 2, -2, -2, -2);
			$this->ActualAmt->ViewCustomAttributes = "";

			// NoSign
			$this->NoSign->ViewValue = $this->NoSign->CurrentValue;
			$this->NoSign->ViewCustomAttributes = "";

			// Barcode
			$this->_Barcode->ViewValue = $this->_Barcode->CurrentValue;
			$this->_Barcode->ViewCustomAttributes = "";

			// ReadTime
			$this->ReadTime->ViewValue = $this->ReadTime->CurrentValue;
			$this->ReadTime->ViewValue = FormatDateTime($this->ReadTime->ViewValue, 0);
			$this->ReadTime->ViewCustomAttributes = "";

			// Result
			$this->Result->ViewValue = $this->Result->CurrentValue;
			$this->Result->ViewCustomAttributes = "";

			// VailID
			$this->VailID->ViewValue = $this->VailID->CurrentValue;
			$this->VailID->ViewCustomAttributes = "";

			// ReadMachine
			$this->ReadMachine->ViewValue = $this->ReadMachine->CurrentValue;
			$this->ReadMachine->ViewCustomAttributes = "";

			// LabCD
			$this->LabCD->ViewValue = $this->LabCD->CurrentValue;
			$this->LabCD->ViewCustomAttributes = "";

			// OutLabAmt
			$this->OutLabAmt->ViewValue = $this->OutLabAmt->CurrentValue;
			$this->OutLabAmt->ViewValue = FormatNumber($this->OutLabAmt->ViewValue, 2, -2, -2, -2);
			$this->OutLabAmt->ViewCustomAttributes = "";

			// ProductQty
			$this->ProductQty->ViewValue = $this->ProductQty->CurrentValue;
			$this->ProductQty->ViewValue = FormatNumber($this->ProductQty->ViewValue, 2, -2, -2, -2);
			$this->ProductQty->ViewCustomAttributes = "";

			// Repeat
			$this->Repeat->ViewValue = $this->Repeat->CurrentValue;
			$this->Repeat->ViewCustomAttributes = "";

			// DeptNo
			$this->DeptNo->ViewValue = $this->DeptNo->CurrentValue;
			$this->DeptNo->ViewCustomAttributes = "";

			// Desc1
			$this->Desc1->ViewValue = $this->Desc1->CurrentValue;
			$this->Desc1->ViewCustomAttributes = "";

			// Desc2
			$this->Desc2->ViewValue = $this->Desc2->CurrentValue;
			$this->Desc2->ViewCustomAttributes = "";

			// RptResult
			$this->RptResult->ViewValue = $this->RptResult->CurrentValue;
			$this->RptResult->ViewCustomAttributes = "";

			// Branch
			$this->Branch->LinkCustomAttributes = "";
			$this->Branch->HrefValue = "";
			$this->Branch->TooltipValue = "";

			// SidNo
			$this->SidNo->LinkCustomAttributes = "";
			$this->SidNo->HrefValue = "";
			$this->SidNo->TooltipValue = "";

			// SidDate
			$this->SidDate->LinkCustomAttributes = "";
			$this->SidDate->HrefValue = "";
			$this->SidDate->TooltipValue = "";

			// TestCd
			$this->TestCd->LinkCustomAttributes = "";
			$this->TestCd->HrefValue = "";
			$this->TestCd->TooltipValue = "";

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

			// ResultDate
			$this->ResultDate->LinkCustomAttributes = "";
			$this->ResultDate->HrefValue = "";
			$this->ResultDate->TooltipValue = "";

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

			// Amount
			$this->Amount->LinkCustomAttributes = "";
			$this->Amount->HrefValue = "";
			$this->Amount->TooltipValue = "";

			// ResultBy
			$this->ResultBy->LinkCustomAttributes = "";
			$this->ResultBy->HrefValue = "";
			$this->ResultBy->TooltipValue = "";

			// AuthBy
			$this->AuthBy->LinkCustomAttributes = "";
			$this->AuthBy->HrefValue = "";
			$this->AuthBy->TooltipValue = "";

			// AuthDate
			$this->AuthDate->LinkCustomAttributes = "";
			$this->AuthDate->HrefValue = "";
			$this->AuthDate->TooltipValue = "";

			// Abnormal
			$this->Abnormal->LinkCustomAttributes = "";
			$this->Abnormal->HrefValue = "";
			$this->Abnormal->TooltipValue = "";

			// Printed
			$this->Printed->LinkCustomAttributes = "";
			$this->Printed->HrefValue = "";
			$this->Printed->TooltipValue = "";

			// Dispatch
			$this->Dispatch->LinkCustomAttributes = "";
			$this->Dispatch->HrefValue = "";
			$this->Dispatch->TooltipValue = "";

			// LOWHIGH
			$this->LOWHIGH->LinkCustomAttributes = "";
			$this->LOWHIGH->HrefValue = "";
			$this->LOWHIGH->TooltipValue = "";

			// RefValue
			$this->RefValue->LinkCustomAttributes = "";
			$this->RefValue->HrefValue = "";
			$this->RefValue->TooltipValue = "";

			// Unit
			$this->Unit->LinkCustomAttributes = "";
			$this->Unit->HrefValue = "";
			$this->Unit->TooltipValue = "";

			// ResDate
			$this->ResDate->LinkCustomAttributes = "";
			$this->ResDate->HrefValue = "";
			$this->ResDate->TooltipValue = "";

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

			// SampleDate
			$this->SampleDate->LinkCustomAttributes = "";
			$this->SampleDate->HrefValue = "";
			$this->SampleDate->TooltipValue = "";

			// SampleUser
			$this->SampleUser->LinkCustomAttributes = "";
			$this->SampleUser->HrefValue = "";
			$this->SampleUser->TooltipValue = "";

			// ReceivedDate
			$this->ReceivedDate->LinkCustomAttributes = "";
			$this->ReceivedDate->HrefValue = "";
			$this->ReceivedDate->TooltipValue = "";

			// ReceivedUser
			$this->ReceivedUser->LinkCustomAttributes = "";
			$this->ReceivedUser->HrefValue = "";
			$this->ReceivedUser->TooltipValue = "";

			// DeptRecvDate
			$this->DeptRecvDate->LinkCustomAttributes = "";
			$this->DeptRecvDate->HrefValue = "";
			$this->DeptRecvDate->TooltipValue = "";

			// DeptRecvUser
			$this->DeptRecvUser->LinkCustomAttributes = "";
			$this->DeptRecvUser->HrefValue = "";
			$this->DeptRecvUser->TooltipValue = "";

			// PrintBy
			$this->PrintBy->LinkCustomAttributes = "";
			$this->PrintBy->HrefValue = "";
			$this->PrintBy->TooltipValue = "";

			// PrintDate
			$this->PrintDate->LinkCustomAttributes = "";
			$this->PrintDate->HrefValue = "";
			$this->PrintDate->TooltipValue = "";

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

			// Tariff
			$this->Tariff->LinkCustomAttributes = "";
			$this->Tariff->HrefValue = "";
			$this->Tariff->TooltipValue = "";

			// EDITDATE
			$this->EDITDATE->LinkCustomAttributes = "";
			$this->EDITDATE->HrefValue = "";
			$this->EDITDATE->TooltipValue = "";

			// UPLOAD
			$this->UPLOAD->LinkCustomAttributes = "";
			$this->UPLOAD->HrefValue = "";
			$this->UPLOAD->TooltipValue = "";

			// SAuthDate
			$this->SAuthDate->LinkCustomAttributes = "";
			$this->SAuthDate->HrefValue = "";
			$this->SAuthDate->TooltipValue = "";

			// SAuthBy
			$this->SAuthBy->LinkCustomAttributes = "";
			$this->SAuthBy->HrefValue = "";
			$this->SAuthBy->TooltipValue = "";

			// NoRC
			$this->NoRC->LinkCustomAttributes = "";
			$this->NoRC->HrefValue = "";
			$this->NoRC->TooltipValue = "";

			// DispDt
			$this->DispDt->LinkCustomAttributes = "";
			$this->DispDt->HrefValue = "";
			$this->DispDt->TooltipValue = "";

			// DispUser
			$this->DispUser->LinkCustomAttributes = "";
			$this->DispUser->HrefValue = "";
			$this->DispUser->TooltipValue = "";

			// DispRemarks
			$this->DispRemarks->LinkCustomAttributes = "";
			$this->DispRemarks->HrefValue = "";
			$this->DispRemarks->TooltipValue = "";

			// DispMode
			$this->DispMode->LinkCustomAttributes = "";
			$this->DispMode->HrefValue = "";
			$this->DispMode->TooltipValue = "";

			// ProductCD
			$this->ProductCD->LinkCustomAttributes = "";
			$this->ProductCD->HrefValue = "";
			$this->ProductCD->TooltipValue = "";

			// Nos
			$this->Nos->LinkCustomAttributes = "";
			$this->Nos->HrefValue = "";
			$this->Nos->TooltipValue = "";

			// WBCPath
			$this->WBCPath->LinkCustomAttributes = "";
			$this->WBCPath->HrefValue = "";
			$this->WBCPath->TooltipValue = "";

			// RBCPath
			$this->RBCPath->LinkCustomAttributes = "";
			$this->RBCPath->HrefValue = "";
			$this->RBCPath->TooltipValue = "";

			// PTPath
			$this->PTPath->LinkCustomAttributes = "";
			$this->PTPath->HrefValue = "";
			$this->PTPath->TooltipValue = "";

			// ActualAmt
			$this->ActualAmt->LinkCustomAttributes = "";
			$this->ActualAmt->HrefValue = "";
			$this->ActualAmt->TooltipValue = "";

			// NoSign
			$this->NoSign->LinkCustomAttributes = "";
			$this->NoSign->HrefValue = "";
			$this->NoSign->TooltipValue = "";

			// Barcode
			$this->_Barcode->LinkCustomAttributes = "";
			$this->_Barcode->HrefValue = "";
			$this->_Barcode->TooltipValue = "";

			// ReadTime
			$this->ReadTime->LinkCustomAttributes = "";
			$this->ReadTime->HrefValue = "";
			$this->ReadTime->TooltipValue = "";

			// Result
			$this->Result->LinkCustomAttributes = "";
			$this->Result->HrefValue = "";
			$this->Result->TooltipValue = "";

			// VailID
			$this->VailID->LinkCustomAttributes = "";
			$this->VailID->HrefValue = "";
			$this->VailID->TooltipValue = "";

			// ReadMachine
			$this->ReadMachine->LinkCustomAttributes = "";
			$this->ReadMachine->HrefValue = "";
			$this->ReadMachine->TooltipValue = "";

			// LabCD
			$this->LabCD->LinkCustomAttributes = "";
			$this->LabCD->HrefValue = "";
			$this->LabCD->TooltipValue = "";

			// OutLabAmt
			$this->OutLabAmt->LinkCustomAttributes = "";
			$this->OutLabAmt->HrefValue = "";
			$this->OutLabAmt->TooltipValue = "";

			// ProductQty
			$this->ProductQty->LinkCustomAttributes = "";
			$this->ProductQty->HrefValue = "";
			$this->ProductQty->TooltipValue = "";

			// Repeat
			$this->Repeat->LinkCustomAttributes = "";
			$this->Repeat->HrefValue = "";
			$this->Repeat->TooltipValue = "";

			// DeptNo
			$this->DeptNo->LinkCustomAttributes = "";
			$this->DeptNo->HrefValue = "";
			$this->DeptNo->TooltipValue = "";

			// Desc1
			$this->Desc1->LinkCustomAttributes = "";
			$this->Desc1->HrefValue = "";
			$this->Desc1->TooltipValue = "";

			// Desc2
			$this->Desc2->LinkCustomAttributes = "";
			$this->Desc2->HrefValue = "";
			$this->Desc2->TooltipValue = "";

			// RptResult
			$this->RptResult->LinkCustomAttributes = "";
			$this->RptResult->HrefValue = "";
			$this->RptResult->TooltipValue = "";
		} elseif ($this->RowType == ROWTYPE_SEARCH) { // Search row

			// Branch
			$this->Branch->EditAttrs["class"] = "form-control";
			$this->Branch->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Branch->AdvancedSearch->SearchValue = HtmlDecode($this->Branch->AdvancedSearch->SearchValue);
			$this->Branch->EditValue = HtmlEncode($this->Branch->AdvancedSearch->SearchValue);
			$this->Branch->PlaceHolder = RemoveHtml($this->Branch->caption());

			// SidNo
			$this->SidNo->EditAttrs["class"] = "form-control";
			$this->SidNo->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->SidNo->AdvancedSearch->SearchValue = HtmlDecode($this->SidNo->AdvancedSearch->SearchValue);
			$this->SidNo->EditValue = HtmlEncode($this->SidNo->AdvancedSearch->SearchValue);
			$this->SidNo->PlaceHolder = RemoveHtml($this->SidNo->caption());

			// SidDate
			$this->SidDate->EditAttrs["class"] = "form-control";
			$this->SidDate->EditCustomAttributes = "";
			$this->SidDate->EditValue = HtmlEncode(FormatDateTime(UnFormatDateTime($this->SidDate->AdvancedSearch->SearchValue, 0), 8));
			$this->SidDate->PlaceHolder = RemoveHtml($this->SidDate->caption());

			// TestCd
			$this->TestCd->EditAttrs["class"] = "form-control";
			$this->TestCd->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->TestCd->AdvancedSearch->SearchValue = HtmlDecode($this->TestCd->AdvancedSearch->SearchValue);
			$this->TestCd->EditValue = HtmlEncode($this->TestCd->AdvancedSearch->SearchValue);
			$this->TestCd->PlaceHolder = RemoveHtml($this->TestCd->caption());

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

			// ResultDate
			$this->ResultDate->EditAttrs["class"] = "form-control";
			$this->ResultDate->EditCustomAttributes = "";
			$this->ResultDate->EditValue = HtmlEncode(FormatDateTime(UnFormatDateTime($this->ResultDate->AdvancedSearch->SearchValue, 0), 8));
			$this->ResultDate->PlaceHolder = RemoveHtml($this->ResultDate->caption());

			// Comments
			$this->Comments->EditAttrs["class"] = "form-control";
			$this->Comments->EditCustomAttributes = "";
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

			// Amount
			$this->Amount->EditAttrs["class"] = "form-control";
			$this->Amount->EditCustomAttributes = "";
			$this->Amount->EditValue = HtmlEncode($this->Amount->AdvancedSearch->SearchValue);
			$this->Amount->PlaceHolder = RemoveHtml($this->Amount->caption());

			// ResultBy
			$this->ResultBy->EditAttrs["class"] = "form-control";
			$this->ResultBy->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->ResultBy->AdvancedSearch->SearchValue = HtmlDecode($this->ResultBy->AdvancedSearch->SearchValue);
			$this->ResultBy->EditValue = HtmlEncode($this->ResultBy->AdvancedSearch->SearchValue);
			$this->ResultBy->PlaceHolder = RemoveHtml($this->ResultBy->caption());

			// AuthBy
			$this->AuthBy->EditAttrs["class"] = "form-control";
			$this->AuthBy->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->AuthBy->AdvancedSearch->SearchValue = HtmlDecode($this->AuthBy->AdvancedSearch->SearchValue);
			$this->AuthBy->EditValue = HtmlEncode($this->AuthBy->AdvancedSearch->SearchValue);
			$this->AuthBy->PlaceHolder = RemoveHtml($this->AuthBy->caption());

			// AuthDate
			$this->AuthDate->EditAttrs["class"] = "form-control";
			$this->AuthDate->EditCustomAttributes = "";
			$this->AuthDate->EditValue = HtmlEncode(FormatDateTime(UnFormatDateTime($this->AuthDate->AdvancedSearch->SearchValue, 0), 8));
			$this->AuthDate->PlaceHolder = RemoveHtml($this->AuthDate->caption());

			// Abnormal
			$this->Abnormal->EditAttrs["class"] = "form-control";
			$this->Abnormal->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Abnormal->AdvancedSearch->SearchValue = HtmlDecode($this->Abnormal->AdvancedSearch->SearchValue);
			$this->Abnormal->EditValue = HtmlEncode($this->Abnormal->AdvancedSearch->SearchValue);
			$this->Abnormal->PlaceHolder = RemoveHtml($this->Abnormal->caption());

			// Printed
			$this->Printed->EditAttrs["class"] = "form-control";
			$this->Printed->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Printed->AdvancedSearch->SearchValue = HtmlDecode($this->Printed->AdvancedSearch->SearchValue);
			$this->Printed->EditValue = HtmlEncode($this->Printed->AdvancedSearch->SearchValue);
			$this->Printed->PlaceHolder = RemoveHtml($this->Printed->caption());

			// Dispatch
			$this->Dispatch->EditAttrs["class"] = "form-control";
			$this->Dispatch->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Dispatch->AdvancedSearch->SearchValue = HtmlDecode($this->Dispatch->AdvancedSearch->SearchValue);
			$this->Dispatch->EditValue = HtmlEncode($this->Dispatch->AdvancedSearch->SearchValue);
			$this->Dispatch->PlaceHolder = RemoveHtml($this->Dispatch->caption());

			// LOWHIGH
			$this->LOWHIGH->EditAttrs["class"] = "form-control";
			$this->LOWHIGH->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->LOWHIGH->AdvancedSearch->SearchValue = HtmlDecode($this->LOWHIGH->AdvancedSearch->SearchValue);
			$this->LOWHIGH->EditValue = HtmlEncode($this->LOWHIGH->AdvancedSearch->SearchValue);
			$this->LOWHIGH->PlaceHolder = RemoveHtml($this->LOWHIGH->caption());

			// RefValue
			$this->RefValue->EditAttrs["class"] = "form-control";
			$this->RefValue->EditCustomAttributes = "";
			$this->RefValue->EditValue = HtmlEncode($this->RefValue->AdvancedSearch->SearchValue);
			$this->RefValue->PlaceHolder = RemoveHtml($this->RefValue->caption());

			// Unit
			$this->Unit->EditAttrs["class"] = "form-control";
			$this->Unit->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Unit->AdvancedSearch->SearchValue = HtmlDecode($this->Unit->AdvancedSearch->SearchValue);
			$this->Unit->EditValue = HtmlEncode($this->Unit->AdvancedSearch->SearchValue);
			$this->Unit->PlaceHolder = RemoveHtml($this->Unit->caption());

			// ResDate
			$this->ResDate->EditAttrs["class"] = "form-control";
			$this->ResDate->EditCustomAttributes = "";
			$this->ResDate->EditValue = HtmlEncode(FormatDateTime(UnFormatDateTime($this->ResDate->AdvancedSearch->SearchValue, 0), 8));
			$this->ResDate->PlaceHolder = RemoveHtml($this->ResDate->caption());

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

			// Tariff
			$this->Tariff->EditAttrs["class"] = "form-control";
			$this->Tariff->EditCustomAttributes = "";
			$this->Tariff->EditValue = HtmlEncode($this->Tariff->AdvancedSearch->SearchValue);
			$this->Tariff->PlaceHolder = RemoveHtml($this->Tariff->caption());

			// EDITDATE
			$this->EDITDATE->EditAttrs["class"] = "form-control";
			$this->EDITDATE->EditCustomAttributes = "";
			$this->EDITDATE->EditValue = HtmlEncode(FormatDateTime(UnFormatDateTime($this->EDITDATE->AdvancedSearch->SearchValue, 0), 8));
			$this->EDITDATE->PlaceHolder = RemoveHtml($this->EDITDATE->caption());

			// UPLOAD
			$this->UPLOAD->EditAttrs["class"] = "form-control";
			$this->UPLOAD->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->UPLOAD->AdvancedSearch->SearchValue = HtmlDecode($this->UPLOAD->AdvancedSearch->SearchValue);
			$this->UPLOAD->EditValue = HtmlEncode($this->UPLOAD->AdvancedSearch->SearchValue);
			$this->UPLOAD->PlaceHolder = RemoveHtml($this->UPLOAD->caption());

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

			// NoRC
			$this->NoRC->EditAttrs["class"] = "form-control";
			$this->NoRC->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->NoRC->AdvancedSearch->SearchValue = HtmlDecode($this->NoRC->AdvancedSearch->SearchValue);
			$this->NoRC->EditValue = HtmlEncode($this->NoRC->AdvancedSearch->SearchValue);
			$this->NoRC->PlaceHolder = RemoveHtml($this->NoRC->caption());

			// DispDt
			$this->DispDt->EditAttrs["class"] = "form-control";
			$this->DispDt->EditCustomAttributes = "";
			$this->DispDt->EditValue = HtmlEncode(FormatDateTime(UnFormatDateTime($this->DispDt->AdvancedSearch->SearchValue, 0), 8));
			$this->DispDt->PlaceHolder = RemoveHtml($this->DispDt->caption());

			// DispUser
			$this->DispUser->EditAttrs["class"] = "form-control";
			$this->DispUser->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->DispUser->AdvancedSearch->SearchValue = HtmlDecode($this->DispUser->AdvancedSearch->SearchValue);
			$this->DispUser->EditValue = HtmlEncode($this->DispUser->AdvancedSearch->SearchValue);
			$this->DispUser->PlaceHolder = RemoveHtml($this->DispUser->caption());

			// DispRemarks
			$this->DispRemarks->EditAttrs["class"] = "form-control";
			$this->DispRemarks->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->DispRemarks->AdvancedSearch->SearchValue = HtmlDecode($this->DispRemarks->AdvancedSearch->SearchValue);
			$this->DispRemarks->EditValue = HtmlEncode($this->DispRemarks->AdvancedSearch->SearchValue);
			$this->DispRemarks->PlaceHolder = RemoveHtml($this->DispRemarks->caption());

			// DispMode
			$this->DispMode->EditAttrs["class"] = "form-control";
			$this->DispMode->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->DispMode->AdvancedSearch->SearchValue = HtmlDecode($this->DispMode->AdvancedSearch->SearchValue);
			$this->DispMode->EditValue = HtmlEncode($this->DispMode->AdvancedSearch->SearchValue);
			$this->DispMode->PlaceHolder = RemoveHtml($this->DispMode->caption());

			// ProductCD
			$this->ProductCD->EditAttrs["class"] = "form-control";
			$this->ProductCD->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->ProductCD->AdvancedSearch->SearchValue = HtmlDecode($this->ProductCD->AdvancedSearch->SearchValue);
			$this->ProductCD->EditValue = HtmlEncode($this->ProductCD->AdvancedSearch->SearchValue);
			$this->ProductCD->PlaceHolder = RemoveHtml($this->ProductCD->caption());

			// Nos
			$this->Nos->EditAttrs["class"] = "form-control";
			$this->Nos->EditCustomAttributes = "";
			$this->Nos->EditValue = HtmlEncode($this->Nos->AdvancedSearch->SearchValue);
			$this->Nos->PlaceHolder = RemoveHtml($this->Nos->caption());

			// WBCPath
			$this->WBCPath->EditAttrs["class"] = "form-control";
			$this->WBCPath->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->WBCPath->AdvancedSearch->SearchValue = HtmlDecode($this->WBCPath->AdvancedSearch->SearchValue);
			$this->WBCPath->EditValue = HtmlEncode($this->WBCPath->AdvancedSearch->SearchValue);
			$this->WBCPath->PlaceHolder = RemoveHtml($this->WBCPath->caption());

			// RBCPath
			$this->RBCPath->EditAttrs["class"] = "form-control";
			$this->RBCPath->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->RBCPath->AdvancedSearch->SearchValue = HtmlDecode($this->RBCPath->AdvancedSearch->SearchValue);
			$this->RBCPath->EditValue = HtmlEncode($this->RBCPath->AdvancedSearch->SearchValue);
			$this->RBCPath->PlaceHolder = RemoveHtml($this->RBCPath->caption());

			// PTPath
			$this->PTPath->EditAttrs["class"] = "form-control";
			$this->PTPath->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->PTPath->AdvancedSearch->SearchValue = HtmlDecode($this->PTPath->AdvancedSearch->SearchValue);
			$this->PTPath->EditValue = HtmlEncode($this->PTPath->AdvancedSearch->SearchValue);
			$this->PTPath->PlaceHolder = RemoveHtml($this->PTPath->caption());

			// ActualAmt
			$this->ActualAmt->EditAttrs["class"] = "form-control";
			$this->ActualAmt->EditCustomAttributes = "";
			$this->ActualAmt->EditValue = HtmlEncode($this->ActualAmt->AdvancedSearch->SearchValue);
			$this->ActualAmt->PlaceHolder = RemoveHtml($this->ActualAmt->caption());

			// NoSign
			$this->NoSign->EditAttrs["class"] = "form-control";
			$this->NoSign->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->NoSign->AdvancedSearch->SearchValue = HtmlDecode($this->NoSign->AdvancedSearch->SearchValue);
			$this->NoSign->EditValue = HtmlEncode($this->NoSign->AdvancedSearch->SearchValue);
			$this->NoSign->PlaceHolder = RemoveHtml($this->NoSign->caption());

			// Barcode
			$this->_Barcode->EditAttrs["class"] = "form-control";
			$this->_Barcode->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->_Barcode->AdvancedSearch->SearchValue = HtmlDecode($this->_Barcode->AdvancedSearch->SearchValue);
			$this->_Barcode->EditValue = HtmlEncode($this->_Barcode->AdvancedSearch->SearchValue);
			$this->_Barcode->PlaceHolder = RemoveHtml($this->_Barcode->caption());

			// ReadTime
			$this->ReadTime->EditAttrs["class"] = "form-control";
			$this->ReadTime->EditCustomAttributes = "";
			$this->ReadTime->EditValue = HtmlEncode(FormatDateTime(UnFormatDateTime($this->ReadTime->AdvancedSearch->SearchValue, 0), 8));
			$this->ReadTime->PlaceHolder = RemoveHtml($this->ReadTime->caption());

			// Result
			$this->Result->EditAttrs["class"] = "form-control";
			$this->Result->EditCustomAttributes = "";
			$this->Result->EditValue = HtmlEncode($this->Result->AdvancedSearch->SearchValue);
			$this->Result->PlaceHolder = RemoveHtml($this->Result->caption());

			// VailID
			$this->VailID->EditAttrs["class"] = "form-control";
			$this->VailID->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->VailID->AdvancedSearch->SearchValue = HtmlDecode($this->VailID->AdvancedSearch->SearchValue);
			$this->VailID->EditValue = HtmlEncode($this->VailID->AdvancedSearch->SearchValue);
			$this->VailID->PlaceHolder = RemoveHtml($this->VailID->caption());

			// ReadMachine
			$this->ReadMachine->EditAttrs["class"] = "form-control";
			$this->ReadMachine->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->ReadMachine->AdvancedSearch->SearchValue = HtmlDecode($this->ReadMachine->AdvancedSearch->SearchValue);
			$this->ReadMachine->EditValue = HtmlEncode($this->ReadMachine->AdvancedSearch->SearchValue);
			$this->ReadMachine->PlaceHolder = RemoveHtml($this->ReadMachine->caption());

			// LabCD
			$this->LabCD->EditAttrs["class"] = "form-control";
			$this->LabCD->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->LabCD->AdvancedSearch->SearchValue = HtmlDecode($this->LabCD->AdvancedSearch->SearchValue);
			$this->LabCD->EditValue = HtmlEncode($this->LabCD->AdvancedSearch->SearchValue);
			$this->LabCD->PlaceHolder = RemoveHtml($this->LabCD->caption());

			// OutLabAmt
			$this->OutLabAmt->EditAttrs["class"] = "form-control";
			$this->OutLabAmt->EditCustomAttributes = "";
			$this->OutLabAmt->EditValue = HtmlEncode($this->OutLabAmt->AdvancedSearch->SearchValue);
			$this->OutLabAmt->PlaceHolder = RemoveHtml($this->OutLabAmt->caption());

			// ProductQty
			$this->ProductQty->EditAttrs["class"] = "form-control";
			$this->ProductQty->EditCustomAttributes = "";
			$this->ProductQty->EditValue = HtmlEncode($this->ProductQty->AdvancedSearch->SearchValue);
			$this->ProductQty->PlaceHolder = RemoveHtml($this->ProductQty->caption());

			// Repeat
			$this->Repeat->EditAttrs["class"] = "form-control";
			$this->Repeat->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Repeat->AdvancedSearch->SearchValue = HtmlDecode($this->Repeat->AdvancedSearch->SearchValue);
			$this->Repeat->EditValue = HtmlEncode($this->Repeat->AdvancedSearch->SearchValue);
			$this->Repeat->PlaceHolder = RemoveHtml($this->Repeat->caption());

			// DeptNo
			$this->DeptNo->EditAttrs["class"] = "form-control";
			$this->DeptNo->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->DeptNo->AdvancedSearch->SearchValue = HtmlDecode($this->DeptNo->AdvancedSearch->SearchValue);
			$this->DeptNo->EditValue = HtmlEncode($this->DeptNo->AdvancedSearch->SearchValue);
			$this->DeptNo->PlaceHolder = RemoveHtml($this->DeptNo->caption());

			// Desc1
			$this->Desc1->EditAttrs["class"] = "form-control";
			$this->Desc1->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Desc1->AdvancedSearch->SearchValue = HtmlDecode($this->Desc1->AdvancedSearch->SearchValue);
			$this->Desc1->EditValue = HtmlEncode($this->Desc1->AdvancedSearch->SearchValue);
			$this->Desc1->PlaceHolder = RemoveHtml($this->Desc1->caption());

			// Desc2
			$this->Desc2->EditAttrs["class"] = "form-control";
			$this->Desc2->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Desc2->AdvancedSearch->SearchValue = HtmlDecode($this->Desc2->AdvancedSearch->SearchValue);
			$this->Desc2->EditValue = HtmlEncode($this->Desc2->AdvancedSearch->SearchValue);
			$this->Desc2->PlaceHolder = RemoveHtml($this->Desc2->caption());

			// RptResult
			$this->RptResult->EditAttrs["class"] = "form-control";
			$this->RptResult->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->RptResult->AdvancedSearch->SearchValue = HtmlDecode($this->RptResult->AdvancedSearch->SearchValue);
			$this->RptResult->EditValue = HtmlEncode($this->RptResult->AdvancedSearch->SearchValue);
			$this->RptResult->PlaceHolder = RemoveHtml($this->RptResult->caption());
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
		if (!CheckDate($this->SidDate->AdvancedSearch->SearchValue)) {
			AddMessage($SearchError, $this->SidDate->errorMessage());
		}
		if (!CheckDate($this->ResultDate->AdvancedSearch->SearchValue)) {
			AddMessage($SearchError, $this->ResultDate->errorMessage());
		}
		if (!CheckNumber($this->Amount->AdvancedSearch->SearchValue)) {
			AddMessage($SearchError, $this->Amount->errorMessage());
		}
		if (!CheckDate($this->AuthDate->AdvancedSearch->SearchValue)) {
			AddMessage($SearchError, $this->AuthDate->errorMessage());
		}
		if (!CheckDate($this->ResDate->AdvancedSearch->SearchValue)) {
			AddMessage($SearchError, $this->ResDate->errorMessage());
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
		if (!CheckDate($this->PrintDate->AdvancedSearch->SearchValue)) {
			AddMessage($SearchError, $this->PrintDate->errorMessage());
		}
		if (!CheckNumber($this->Tariff->AdvancedSearch->SearchValue)) {
			AddMessage($SearchError, $this->Tariff->errorMessage());
		}
		if (!CheckDate($this->EDITDATE->AdvancedSearch->SearchValue)) {
			AddMessage($SearchError, $this->EDITDATE->errorMessage());
		}
		if (!CheckDate($this->SAuthDate->AdvancedSearch->SearchValue)) {
			AddMessage($SearchError, $this->SAuthDate->errorMessage());
		}
		if (!CheckDate($this->DispDt->AdvancedSearch->SearchValue)) {
			AddMessage($SearchError, $this->DispDt->errorMessage());
		}
		if (!CheckNumber($this->Nos->AdvancedSearch->SearchValue)) {
			AddMessage($SearchError, $this->Nos->errorMessage());
		}
		if (!CheckNumber($this->ActualAmt->AdvancedSearch->SearchValue)) {
			AddMessage($SearchError, $this->ActualAmt->errorMessage());
		}
		if (!CheckDate($this->ReadTime->AdvancedSearch->SearchValue)) {
			AddMessage($SearchError, $this->ReadTime->errorMessage());
		}
		if (!CheckNumber($this->OutLabAmt->AdvancedSearch->SearchValue)) {
			AddMessage($SearchError, $this->OutLabAmt->errorMessage());
		}
		if (!CheckNumber($this->ProductQty->AdvancedSearch->SearchValue)) {
			AddMessage($SearchError, $this->ProductQty->errorMessage());
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
		$this->Branch->AdvancedSearch->load();
		$this->SidNo->AdvancedSearch->load();
		$this->SidDate->AdvancedSearch->load();
		$this->TestCd->AdvancedSearch->load();
		$this->TestSubCd->AdvancedSearch->load();
		$this->DEptCd->AdvancedSearch->load();
		$this->ProfCd->AdvancedSearch->load();
		$this->LabReport->AdvancedSearch->load();
		$this->ResultDate->AdvancedSearch->load();
		$this->Comments->AdvancedSearch->load();
		$this->Method->AdvancedSearch->load();
		$this->Specimen->AdvancedSearch->load();
		$this->Amount->AdvancedSearch->load();
		$this->ResultBy->AdvancedSearch->load();
		$this->AuthBy->AdvancedSearch->load();
		$this->AuthDate->AdvancedSearch->load();
		$this->Abnormal->AdvancedSearch->load();
		$this->Printed->AdvancedSearch->load();
		$this->Dispatch->AdvancedSearch->load();
		$this->LOWHIGH->AdvancedSearch->load();
		$this->RefValue->AdvancedSearch->load();
		$this->Unit->AdvancedSearch->load();
		$this->ResDate->AdvancedSearch->load();
		$this->Pic1->AdvancedSearch->load();
		$this->Pic2->AdvancedSearch->load();
		$this->GraphPath->AdvancedSearch->load();
		$this->SampleDate->AdvancedSearch->load();
		$this->SampleUser->AdvancedSearch->load();
		$this->ReceivedDate->AdvancedSearch->load();
		$this->ReceivedUser->AdvancedSearch->load();
		$this->DeptRecvDate->AdvancedSearch->load();
		$this->DeptRecvUser->AdvancedSearch->load();
		$this->PrintBy->AdvancedSearch->load();
		$this->PrintDate->AdvancedSearch->load();
		$this->MachineCD->AdvancedSearch->load();
		$this->TestCancel->AdvancedSearch->load();
		$this->OutSource->AdvancedSearch->load();
		$this->Tariff->AdvancedSearch->load();
		$this->EDITDATE->AdvancedSearch->load();
		$this->UPLOAD->AdvancedSearch->load();
		$this->SAuthDate->AdvancedSearch->load();
		$this->SAuthBy->AdvancedSearch->load();
		$this->NoRC->AdvancedSearch->load();
		$this->DispDt->AdvancedSearch->load();
		$this->DispUser->AdvancedSearch->load();
		$this->DispRemarks->AdvancedSearch->load();
		$this->DispMode->AdvancedSearch->load();
		$this->ProductCD->AdvancedSearch->load();
		$this->Nos->AdvancedSearch->load();
		$this->WBCPath->AdvancedSearch->load();
		$this->RBCPath->AdvancedSearch->load();
		$this->PTPath->AdvancedSearch->load();
		$this->ActualAmt->AdvancedSearch->load();
		$this->NoSign->AdvancedSearch->load();
		$this->_Barcode->AdvancedSearch->load();
		$this->ReadTime->AdvancedSearch->load();
		$this->Result->AdvancedSearch->load();
		$this->VailID->AdvancedSearch->load();
		$this->ReadMachine->AdvancedSearch->load();
		$this->LabCD->AdvancedSearch->load();
		$this->OutLabAmt->AdvancedSearch->load();
		$this->ProductQty->AdvancedSearch->load();
		$this->Repeat->AdvancedSearch->load();
		$this->DeptNo->AdvancedSearch->load();
		$this->Desc1->AdvancedSearch->load();
		$this->Desc2->AdvancedSearch->load();
		$this->RptResult->AdvancedSearch->load();
	}

	// Set up Breadcrumb
	protected function setupBreadcrumb()
	{
		global $Breadcrumb, $Language;
		$Breadcrumb = new Breadcrumb();
		$url = substr(CurrentUrl(), strrpos(CurrentUrl(), "/")+1);
		$Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("lab_test_resultlist.php"), "", $this->TableVar, TRUE);
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
<?php
namespace PHPMaker2019\HIMS;

/**
 * Page class
 */
class lab_test_result_add extends lab_test_result
{

	// Page ID
	public $PageID = "add";

	// Project ID
	public $ProjectID = "{EA4F6D13-AF8F-428D-9EA7-BA88D1107EC3}";

	// Table name
	public $TableName = 'lab_test_result';

	// Page object name
	public $PageObjName = "lab_test_result_add";

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
			define(PROJECT_NAMESPACE . "PAGE_ID", 'add');

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
			$this->CopyRecord = FALSE;
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
					$this->terminate("lab_test_resultlist.php"); // No matching record, return to list
				}
				break;
			case "insert": // Add new record
				$this->SendEmail = TRUE; // Send email on add success
				if ($this->addRow($this->OldRecordset)) { // Add successful
					if ($this->getSuccessMessage() == "")
						$this->setSuccessMessage($Language->phrase("AddSuccess")); // Set up success message
					$returnUrl = $this->getReturnUrl();
					if (GetPageName($returnUrl) == "lab_test_resultlist.php")
						$returnUrl = $this->addMasterUrl($returnUrl); // List page, return to List page with correct master key if necessary
					elseif (GetPageName($returnUrl) == "lab_test_resultview.php")
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
		$this->Branch->CurrentValue = NULL;
		$this->Branch->OldValue = $this->Branch->CurrentValue;
		$this->SidNo->CurrentValue = NULL;
		$this->SidNo->OldValue = $this->SidNo->CurrentValue;
		$this->SidDate->CurrentValue = NULL;
		$this->SidDate->OldValue = $this->SidDate->CurrentValue;
		$this->TestCd->CurrentValue = NULL;
		$this->TestCd->OldValue = $this->TestCd->CurrentValue;
		$this->TestSubCd->CurrentValue = NULL;
		$this->TestSubCd->OldValue = $this->TestSubCd->CurrentValue;
		$this->DEptCd->CurrentValue = NULL;
		$this->DEptCd->OldValue = $this->DEptCd->CurrentValue;
		$this->ProfCd->CurrentValue = NULL;
		$this->ProfCd->OldValue = $this->ProfCd->CurrentValue;
		$this->LabReport->CurrentValue = NULL;
		$this->LabReport->OldValue = $this->LabReport->CurrentValue;
		$this->ResultDate->CurrentValue = NULL;
		$this->ResultDate->OldValue = $this->ResultDate->CurrentValue;
		$this->Comments->CurrentValue = NULL;
		$this->Comments->OldValue = $this->Comments->CurrentValue;
		$this->Method->CurrentValue = NULL;
		$this->Method->OldValue = $this->Method->CurrentValue;
		$this->Specimen->CurrentValue = NULL;
		$this->Specimen->OldValue = $this->Specimen->CurrentValue;
		$this->Amount->CurrentValue = NULL;
		$this->Amount->OldValue = $this->Amount->CurrentValue;
		$this->ResultBy->CurrentValue = NULL;
		$this->ResultBy->OldValue = $this->ResultBy->CurrentValue;
		$this->AuthBy->CurrentValue = NULL;
		$this->AuthBy->OldValue = $this->AuthBy->CurrentValue;
		$this->AuthDate->CurrentValue = NULL;
		$this->AuthDate->OldValue = $this->AuthDate->CurrentValue;
		$this->Abnormal->CurrentValue = NULL;
		$this->Abnormal->OldValue = $this->Abnormal->CurrentValue;
		$this->Printed->CurrentValue = NULL;
		$this->Printed->OldValue = $this->Printed->CurrentValue;
		$this->Dispatch->CurrentValue = NULL;
		$this->Dispatch->OldValue = $this->Dispatch->CurrentValue;
		$this->LOWHIGH->CurrentValue = NULL;
		$this->LOWHIGH->OldValue = $this->LOWHIGH->CurrentValue;
		$this->RefValue->CurrentValue = NULL;
		$this->RefValue->OldValue = $this->RefValue->CurrentValue;
		$this->Unit->CurrentValue = NULL;
		$this->Unit->OldValue = $this->Unit->CurrentValue;
		$this->ResDate->CurrentValue = NULL;
		$this->ResDate->OldValue = $this->ResDate->CurrentValue;
		$this->Pic1->CurrentValue = NULL;
		$this->Pic1->OldValue = $this->Pic1->CurrentValue;
		$this->Pic2->CurrentValue = NULL;
		$this->Pic2->OldValue = $this->Pic2->CurrentValue;
		$this->GraphPath->CurrentValue = NULL;
		$this->GraphPath->OldValue = $this->GraphPath->CurrentValue;
		$this->SampleDate->CurrentValue = NULL;
		$this->SampleDate->OldValue = $this->SampleDate->CurrentValue;
		$this->SampleUser->CurrentValue = NULL;
		$this->SampleUser->OldValue = $this->SampleUser->CurrentValue;
		$this->ReceivedDate->CurrentValue = NULL;
		$this->ReceivedDate->OldValue = $this->ReceivedDate->CurrentValue;
		$this->ReceivedUser->CurrentValue = NULL;
		$this->ReceivedUser->OldValue = $this->ReceivedUser->CurrentValue;
		$this->DeptRecvDate->CurrentValue = NULL;
		$this->DeptRecvDate->OldValue = $this->DeptRecvDate->CurrentValue;
		$this->DeptRecvUser->CurrentValue = NULL;
		$this->DeptRecvUser->OldValue = $this->DeptRecvUser->CurrentValue;
		$this->PrintBy->CurrentValue = NULL;
		$this->PrintBy->OldValue = $this->PrintBy->CurrentValue;
		$this->PrintDate->CurrentValue = NULL;
		$this->PrintDate->OldValue = $this->PrintDate->CurrentValue;
		$this->MachineCD->CurrentValue = NULL;
		$this->MachineCD->OldValue = $this->MachineCD->CurrentValue;
		$this->TestCancel->CurrentValue = NULL;
		$this->TestCancel->OldValue = $this->TestCancel->CurrentValue;
		$this->OutSource->CurrentValue = NULL;
		$this->OutSource->OldValue = $this->OutSource->CurrentValue;
		$this->Tariff->CurrentValue = NULL;
		$this->Tariff->OldValue = $this->Tariff->CurrentValue;
		$this->EDITDATE->CurrentValue = NULL;
		$this->EDITDATE->OldValue = $this->EDITDATE->CurrentValue;
		$this->UPLOAD->CurrentValue = NULL;
		$this->UPLOAD->OldValue = $this->UPLOAD->CurrentValue;
		$this->SAuthDate->CurrentValue = NULL;
		$this->SAuthDate->OldValue = $this->SAuthDate->CurrentValue;
		$this->SAuthBy->CurrentValue = NULL;
		$this->SAuthBy->OldValue = $this->SAuthBy->CurrentValue;
		$this->NoRC->CurrentValue = NULL;
		$this->NoRC->OldValue = $this->NoRC->CurrentValue;
		$this->DispDt->CurrentValue = NULL;
		$this->DispDt->OldValue = $this->DispDt->CurrentValue;
		$this->DispUser->CurrentValue = NULL;
		$this->DispUser->OldValue = $this->DispUser->CurrentValue;
		$this->DispRemarks->CurrentValue = NULL;
		$this->DispRemarks->OldValue = $this->DispRemarks->CurrentValue;
		$this->DispMode->CurrentValue = NULL;
		$this->DispMode->OldValue = $this->DispMode->CurrentValue;
		$this->ProductCD->CurrentValue = NULL;
		$this->ProductCD->OldValue = $this->ProductCD->CurrentValue;
		$this->Nos->CurrentValue = NULL;
		$this->Nos->OldValue = $this->Nos->CurrentValue;
		$this->WBCPath->CurrentValue = NULL;
		$this->WBCPath->OldValue = $this->WBCPath->CurrentValue;
		$this->RBCPath->CurrentValue = NULL;
		$this->RBCPath->OldValue = $this->RBCPath->CurrentValue;
		$this->PTPath->CurrentValue = NULL;
		$this->PTPath->OldValue = $this->PTPath->CurrentValue;
		$this->ActualAmt->CurrentValue = NULL;
		$this->ActualAmt->OldValue = $this->ActualAmt->CurrentValue;
		$this->NoSign->CurrentValue = NULL;
		$this->NoSign->OldValue = $this->NoSign->CurrentValue;
		$this->_Barcode->CurrentValue = NULL;
		$this->_Barcode->OldValue = $this->_Barcode->CurrentValue;
		$this->ReadTime->CurrentValue = NULL;
		$this->ReadTime->OldValue = $this->ReadTime->CurrentValue;
		$this->Result->CurrentValue = NULL;
		$this->Result->OldValue = $this->Result->CurrentValue;
		$this->VailID->CurrentValue = NULL;
		$this->VailID->OldValue = $this->VailID->CurrentValue;
		$this->ReadMachine->CurrentValue = NULL;
		$this->ReadMachine->OldValue = $this->ReadMachine->CurrentValue;
		$this->LabCD->CurrentValue = NULL;
		$this->LabCD->OldValue = $this->LabCD->CurrentValue;
		$this->OutLabAmt->CurrentValue = NULL;
		$this->OutLabAmt->OldValue = $this->OutLabAmt->CurrentValue;
		$this->ProductQty->CurrentValue = NULL;
		$this->ProductQty->OldValue = $this->ProductQty->CurrentValue;
		$this->Repeat->CurrentValue = NULL;
		$this->Repeat->OldValue = $this->Repeat->CurrentValue;
		$this->DeptNo->CurrentValue = NULL;
		$this->DeptNo->OldValue = $this->DeptNo->CurrentValue;
		$this->Desc1->CurrentValue = NULL;
		$this->Desc1->OldValue = $this->Desc1->CurrentValue;
		$this->Desc2->CurrentValue = NULL;
		$this->Desc2->OldValue = $this->Desc2->CurrentValue;
		$this->RptResult->CurrentValue = NULL;
		$this->RptResult->OldValue = $this->RptResult->CurrentValue;
	}

	// Load form values
	protected function loadFormValues()
	{

		// Load from form
		global $CurrentForm;

		// Check field name 'Branch' first before field var 'x_Branch'
		$val = $CurrentForm->hasValue("Branch") ? $CurrentForm->getValue("Branch") : $CurrentForm->getValue("x_Branch");
		if (!$this->Branch->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Branch->Visible = FALSE; // Disable update for API request
			else
				$this->Branch->setFormValue($val);
		}

		// Check field name 'SidNo' first before field var 'x_SidNo'
		$val = $CurrentForm->hasValue("SidNo") ? $CurrentForm->getValue("SidNo") : $CurrentForm->getValue("x_SidNo");
		if (!$this->SidNo->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->SidNo->Visible = FALSE; // Disable update for API request
			else
				$this->SidNo->setFormValue($val);
		}

		// Check field name 'SidDate' first before field var 'x_SidDate'
		$val = $CurrentForm->hasValue("SidDate") ? $CurrentForm->getValue("SidDate") : $CurrentForm->getValue("x_SidDate");
		if (!$this->SidDate->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->SidDate->Visible = FALSE; // Disable update for API request
			else
				$this->SidDate->setFormValue($val);
			$this->SidDate->CurrentValue = UnFormatDateTime($this->SidDate->CurrentValue, 0);
		}

		// Check field name 'TestCd' first before field var 'x_TestCd'
		$val = $CurrentForm->hasValue("TestCd") ? $CurrentForm->getValue("TestCd") : $CurrentForm->getValue("x_TestCd");
		if (!$this->TestCd->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->TestCd->Visible = FALSE; // Disable update for API request
			else
				$this->TestCd->setFormValue($val);
		}

		// Check field name 'TestSubCd' first before field var 'x_TestSubCd'
		$val = $CurrentForm->hasValue("TestSubCd") ? $CurrentForm->getValue("TestSubCd") : $CurrentForm->getValue("x_TestSubCd");
		if (!$this->TestSubCd->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->TestSubCd->Visible = FALSE; // Disable update for API request
			else
				$this->TestSubCd->setFormValue($val);
		}

		// Check field name 'DEptCd' first before field var 'x_DEptCd'
		$val = $CurrentForm->hasValue("DEptCd") ? $CurrentForm->getValue("DEptCd") : $CurrentForm->getValue("x_DEptCd");
		if (!$this->DEptCd->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->DEptCd->Visible = FALSE; // Disable update for API request
			else
				$this->DEptCd->setFormValue($val);
		}

		// Check field name 'ProfCd' first before field var 'x_ProfCd'
		$val = $CurrentForm->hasValue("ProfCd") ? $CurrentForm->getValue("ProfCd") : $CurrentForm->getValue("x_ProfCd");
		if (!$this->ProfCd->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->ProfCd->Visible = FALSE; // Disable update for API request
			else
				$this->ProfCd->setFormValue($val);
		}

		// Check field name 'LabReport' first before field var 'x_LabReport'
		$val = $CurrentForm->hasValue("LabReport") ? $CurrentForm->getValue("LabReport") : $CurrentForm->getValue("x_LabReport");
		if (!$this->LabReport->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->LabReport->Visible = FALSE; // Disable update for API request
			else
				$this->LabReport->setFormValue($val);
		}

		// Check field name 'ResultDate' first before field var 'x_ResultDate'
		$val = $CurrentForm->hasValue("ResultDate") ? $CurrentForm->getValue("ResultDate") : $CurrentForm->getValue("x_ResultDate");
		if (!$this->ResultDate->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->ResultDate->Visible = FALSE; // Disable update for API request
			else
				$this->ResultDate->setFormValue($val);
			$this->ResultDate->CurrentValue = UnFormatDateTime($this->ResultDate->CurrentValue, 0);
		}

		// Check field name 'Comments' first before field var 'x_Comments'
		$val = $CurrentForm->hasValue("Comments") ? $CurrentForm->getValue("Comments") : $CurrentForm->getValue("x_Comments");
		if (!$this->Comments->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Comments->Visible = FALSE; // Disable update for API request
			else
				$this->Comments->setFormValue($val);
		}

		// Check field name 'Method' first before field var 'x_Method'
		$val = $CurrentForm->hasValue("Method") ? $CurrentForm->getValue("Method") : $CurrentForm->getValue("x_Method");
		if (!$this->Method->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Method->Visible = FALSE; // Disable update for API request
			else
				$this->Method->setFormValue($val);
		}

		// Check field name 'Specimen' first before field var 'x_Specimen'
		$val = $CurrentForm->hasValue("Specimen") ? $CurrentForm->getValue("Specimen") : $CurrentForm->getValue("x_Specimen");
		if (!$this->Specimen->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Specimen->Visible = FALSE; // Disable update for API request
			else
				$this->Specimen->setFormValue($val);
		}

		// Check field name 'Amount' first before field var 'x_Amount'
		$val = $CurrentForm->hasValue("Amount") ? $CurrentForm->getValue("Amount") : $CurrentForm->getValue("x_Amount");
		if (!$this->Amount->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Amount->Visible = FALSE; // Disable update for API request
			else
				$this->Amount->setFormValue($val);
		}

		// Check field name 'ResultBy' first before field var 'x_ResultBy'
		$val = $CurrentForm->hasValue("ResultBy") ? $CurrentForm->getValue("ResultBy") : $CurrentForm->getValue("x_ResultBy");
		if (!$this->ResultBy->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->ResultBy->Visible = FALSE; // Disable update for API request
			else
				$this->ResultBy->setFormValue($val);
		}

		// Check field name 'AuthBy' first before field var 'x_AuthBy'
		$val = $CurrentForm->hasValue("AuthBy") ? $CurrentForm->getValue("AuthBy") : $CurrentForm->getValue("x_AuthBy");
		if (!$this->AuthBy->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->AuthBy->Visible = FALSE; // Disable update for API request
			else
				$this->AuthBy->setFormValue($val);
		}

		// Check field name 'AuthDate' first before field var 'x_AuthDate'
		$val = $CurrentForm->hasValue("AuthDate") ? $CurrentForm->getValue("AuthDate") : $CurrentForm->getValue("x_AuthDate");
		if (!$this->AuthDate->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->AuthDate->Visible = FALSE; // Disable update for API request
			else
				$this->AuthDate->setFormValue($val);
			$this->AuthDate->CurrentValue = UnFormatDateTime($this->AuthDate->CurrentValue, 0);
		}

		// Check field name 'Abnormal' first before field var 'x_Abnormal'
		$val = $CurrentForm->hasValue("Abnormal") ? $CurrentForm->getValue("Abnormal") : $CurrentForm->getValue("x_Abnormal");
		if (!$this->Abnormal->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Abnormal->Visible = FALSE; // Disable update for API request
			else
				$this->Abnormal->setFormValue($val);
		}

		// Check field name 'Printed' first before field var 'x_Printed'
		$val = $CurrentForm->hasValue("Printed") ? $CurrentForm->getValue("Printed") : $CurrentForm->getValue("x_Printed");
		if (!$this->Printed->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Printed->Visible = FALSE; // Disable update for API request
			else
				$this->Printed->setFormValue($val);
		}

		// Check field name 'Dispatch' first before field var 'x_Dispatch'
		$val = $CurrentForm->hasValue("Dispatch") ? $CurrentForm->getValue("Dispatch") : $CurrentForm->getValue("x_Dispatch");
		if (!$this->Dispatch->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Dispatch->Visible = FALSE; // Disable update for API request
			else
				$this->Dispatch->setFormValue($val);
		}

		// Check field name 'LOWHIGH' first before field var 'x_LOWHIGH'
		$val = $CurrentForm->hasValue("LOWHIGH") ? $CurrentForm->getValue("LOWHIGH") : $CurrentForm->getValue("x_LOWHIGH");
		if (!$this->LOWHIGH->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->LOWHIGH->Visible = FALSE; // Disable update for API request
			else
				$this->LOWHIGH->setFormValue($val);
		}

		// Check field name 'RefValue' first before field var 'x_RefValue'
		$val = $CurrentForm->hasValue("RefValue") ? $CurrentForm->getValue("RefValue") : $CurrentForm->getValue("x_RefValue");
		if (!$this->RefValue->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->RefValue->Visible = FALSE; // Disable update for API request
			else
				$this->RefValue->setFormValue($val);
		}

		// Check field name 'Unit' first before field var 'x_Unit'
		$val = $CurrentForm->hasValue("Unit") ? $CurrentForm->getValue("Unit") : $CurrentForm->getValue("x_Unit");
		if (!$this->Unit->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Unit->Visible = FALSE; // Disable update for API request
			else
				$this->Unit->setFormValue($val);
		}

		// Check field name 'ResDate' first before field var 'x_ResDate'
		$val = $CurrentForm->hasValue("ResDate") ? $CurrentForm->getValue("ResDate") : $CurrentForm->getValue("x_ResDate");
		if (!$this->ResDate->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->ResDate->Visible = FALSE; // Disable update for API request
			else
				$this->ResDate->setFormValue($val);
			$this->ResDate->CurrentValue = UnFormatDateTime($this->ResDate->CurrentValue, 0);
		}

		// Check field name 'Pic1' first before field var 'x_Pic1'
		$val = $CurrentForm->hasValue("Pic1") ? $CurrentForm->getValue("Pic1") : $CurrentForm->getValue("x_Pic1");
		if (!$this->Pic1->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Pic1->Visible = FALSE; // Disable update for API request
			else
				$this->Pic1->setFormValue($val);
		}

		// Check field name 'Pic2' first before field var 'x_Pic2'
		$val = $CurrentForm->hasValue("Pic2") ? $CurrentForm->getValue("Pic2") : $CurrentForm->getValue("x_Pic2");
		if (!$this->Pic2->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Pic2->Visible = FALSE; // Disable update for API request
			else
				$this->Pic2->setFormValue($val);
		}

		// Check field name 'GraphPath' first before field var 'x_GraphPath'
		$val = $CurrentForm->hasValue("GraphPath") ? $CurrentForm->getValue("GraphPath") : $CurrentForm->getValue("x_GraphPath");
		if (!$this->GraphPath->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->GraphPath->Visible = FALSE; // Disable update for API request
			else
				$this->GraphPath->setFormValue($val);
		}

		// Check field name 'SampleDate' first before field var 'x_SampleDate'
		$val = $CurrentForm->hasValue("SampleDate") ? $CurrentForm->getValue("SampleDate") : $CurrentForm->getValue("x_SampleDate");
		if (!$this->SampleDate->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->SampleDate->Visible = FALSE; // Disable update for API request
			else
				$this->SampleDate->setFormValue($val);
			$this->SampleDate->CurrentValue = UnFormatDateTime($this->SampleDate->CurrentValue, 0);
		}

		// Check field name 'SampleUser' first before field var 'x_SampleUser'
		$val = $CurrentForm->hasValue("SampleUser") ? $CurrentForm->getValue("SampleUser") : $CurrentForm->getValue("x_SampleUser");
		if (!$this->SampleUser->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->SampleUser->Visible = FALSE; // Disable update for API request
			else
				$this->SampleUser->setFormValue($val);
		}

		// Check field name 'ReceivedDate' first before field var 'x_ReceivedDate'
		$val = $CurrentForm->hasValue("ReceivedDate") ? $CurrentForm->getValue("ReceivedDate") : $CurrentForm->getValue("x_ReceivedDate");
		if (!$this->ReceivedDate->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->ReceivedDate->Visible = FALSE; // Disable update for API request
			else
				$this->ReceivedDate->setFormValue($val);
			$this->ReceivedDate->CurrentValue = UnFormatDateTime($this->ReceivedDate->CurrentValue, 0);
		}

		// Check field name 'ReceivedUser' first before field var 'x_ReceivedUser'
		$val = $CurrentForm->hasValue("ReceivedUser") ? $CurrentForm->getValue("ReceivedUser") : $CurrentForm->getValue("x_ReceivedUser");
		if (!$this->ReceivedUser->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->ReceivedUser->Visible = FALSE; // Disable update for API request
			else
				$this->ReceivedUser->setFormValue($val);
		}

		// Check field name 'DeptRecvDate' first before field var 'x_DeptRecvDate'
		$val = $CurrentForm->hasValue("DeptRecvDate") ? $CurrentForm->getValue("DeptRecvDate") : $CurrentForm->getValue("x_DeptRecvDate");
		if (!$this->DeptRecvDate->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->DeptRecvDate->Visible = FALSE; // Disable update for API request
			else
				$this->DeptRecvDate->setFormValue($val);
			$this->DeptRecvDate->CurrentValue = UnFormatDateTime($this->DeptRecvDate->CurrentValue, 0);
		}

		// Check field name 'DeptRecvUser' first before field var 'x_DeptRecvUser'
		$val = $CurrentForm->hasValue("DeptRecvUser") ? $CurrentForm->getValue("DeptRecvUser") : $CurrentForm->getValue("x_DeptRecvUser");
		if (!$this->DeptRecvUser->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->DeptRecvUser->Visible = FALSE; // Disable update for API request
			else
				$this->DeptRecvUser->setFormValue($val);
		}

		// Check field name 'PrintBy' first before field var 'x_PrintBy'
		$val = $CurrentForm->hasValue("PrintBy") ? $CurrentForm->getValue("PrintBy") : $CurrentForm->getValue("x_PrintBy");
		if (!$this->PrintBy->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->PrintBy->Visible = FALSE; // Disable update for API request
			else
				$this->PrintBy->setFormValue($val);
		}

		// Check field name 'PrintDate' first before field var 'x_PrintDate'
		$val = $CurrentForm->hasValue("PrintDate") ? $CurrentForm->getValue("PrintDate") : $CurrentForm->getValue("x_PrintDate");
		if (!$this->PrintDate->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->PrintDate->Visible = FALSE; // Disable update for API request
			else
				$this->PrintDate->setFormValue($val);
			$this->PrintDate->CurrentValue = UnFormatDateTime($this->PrintDate->CurrentValue, 0);
		}

		// Check field name 'MachineCD' first before field var 'x_MachineCD'
		$val = $CurrentForm->hasValue("MachineCD") ? $CurrentForm->getValue("MachineCD") : $CurrentForm->getValue("x_MachineCD");
		if (!$this->MachineCD->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->MachineCD->Visible = FALSE; // Disable update for API request
			else
				$this->MachineCD->setFormValue($val);
		}

		// Check field name 'TestCancel' first before field var 'x_TestCancel'
		$val = $CurrentForm->hasValue("TestCancel") ? $CurrentForm->getValue("TestCancel") : $CurrentForm->getValue("x_TestCancel");
		if (!$this->TestCancel->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->TestCancel->Visible = FALSE; // Disable update for API request
			else
				$this->TestCancel->setFormValue($val);
		}

		// Check field name 'OutSource' first before field var 'x_OutSource'
		$val = $CurrentForm->hasValue("OutSource") ? $CurrentForm->getValue("OutSource") : $CurrentForm->getValue("x_OutSource");
		if (!$this->OutSource->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->OutSource->Visible = FALSE; // Disable update for API request
			else
				$this->OutSource->setFormValue($val);
		}

		// Check field name 'Tariff' first before field var 'x_Tariff'
		$val = $CurrentForm->hasValue("Tariff") ? $CurrentForm->getValue("Tariff") : $CurrentForm->getValue("x_Tariff");
		if (!$this->Tariff->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Tariff->Visible = FALSE; // Disable update for API request
			else
				$this->Tariff->setFormValue($val);
		}

		// Check field name 'EDITDATE' first before field var 'x_EDITDATE'
		$val = $CurrentForm->hasValue("EDITDATE") ? $CurrentForm->getValue("EDITDATE") : $CurrentForm->getValue("x_EDITDATE");
		if (!$this->EDITDATE->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->EDITDATE->Visible = FALSE; // Disable update for API request
			else
				$this->EDITDATE->setFormValue($val);
			$this->EDITDATE->CurrentValue = UnFormatDateTime($this->EDITDATE->CurrentValue, 0);
		}

		// Check field name 'UPLOAD' first before field var 'x_UPLOAD'
		$val = $CurrentForm->hasValue("UPLOAD") ? $CurrentForm->getValue("UPLOAD") : $CurrentForm->getValue("x_UPLOAD");
		if (!$this->UPLOAD->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->UPLOAD->Visible = FALSE; // Disable update for API request
			else
				$this->UPLOAD->setFormValue($val);
		}

		// Check field name 'SAuthDate' first before field var 'x_SAuthDate'
		$val = $CurrentForm->hasValue("SAuthDate") ? $CurrentForm->getValue("SAuthDate") : $CurrentForm->getValue("x_SAuthDate");
		if (!$this->SAuthDate->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->SAuthDate->Visible = FALSE; // Disable update for API request
			else
				$this->SAuthDate->setFormValue($val);
			$this->SAuthDate->CurrentValue = UnFormatDateTime($this->SAuthDate->CurrentValue, 0);
		}

		// Check field name 'SAuthBy' first before field var 'x_SAuthBy'
		$val = $CurrentForm->hasValue("SAuthBy") ? $CurrentForm->getValue("SAuthBy") : $CurrentForm->getValue("x_SAuthBy");
		if (!$this->SAuthBy->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->SAuthBy->Visible = FALSE; // Disable update for API request
			else
				$this->SAuthBy->setFormValue($val);
		}

		// Check field name 'NoRC' first before field var 'x_NoRC'
		$val = $CurrentForm->hasValue("NoRC") ? $CurrentForm->getValue("NoRC") : $CurrentForm->getValue("x_NoRC");
		if (!$this->NoRC->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->NoRC->Visible = FALSE; // Disable update for API request
			else
				$this->NoRC->setFormValue($val);
		}

		// Check field name 'DispDt' first before field var 'x_DispDt'
		$val = $CurrentForm->hasValue("DispDt") ? $CurrentForm->getValue("DispDt") : $CurrentForm->getValue("x_DispDt");
		if (!$this->DispDt->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->DispDt->Visible = FALSE; // Disable update for API request
			else
				$this->DispDt->setFormValue($val);
			$this->DispDt->CurrentValue = UnFormatDateTime($this->DispDt->CurrentValue, 0);
		}

		// Check field name 'DispUser' first before field var 'x_DispUser'
		$val = $CurrentForm->hasValue("DispUser") ? $CurrentForm->getValue("DispUser") : $CurrentForm->getValue("x_DispUser");
		if (!$this->DispUser->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->DispUser->Visible = FALSE; // Disable update for API request
			else
				$this->DispUser->setFormValue($val);
		}

		// Check field name 'DispRemarks' first before field var 'x_DispRemarks'
		$val = $CurrentForm->hasValue("DispRemarks") ? $CurrentForm->getValue("DispRemarks") : $CurrentForm->getValue("x_DispRemarks");
		if (!$this->DispRemarks->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->DispRemarks->Visible = FALSE; // Disable update for API request
			else
				$this->DispRemarks->setFormValue($val);
		}

		// Check field name 'DispMode' first before field var 'x_DispMode'
		$val = $CurrentForm->hasValue("DispMode") ? $CurrentForm->getValue("DispMode") : $CurrentForm->getValue("x_DispMode");
		if (!$this->DispMode->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->DispMode->Visible = FALSE; // Disable update for API request
			else
				$this->DispMode->setFormValue($val);
		}

		// Check field name 'ProductCD' first before field var 'x_ProductCD'
		$val = $CurrentForm->hasValue("ProductCD") ? $CurrentForm->getValue("ProductCD") : $CurrentForm->getValue("x_ProductCD");
		if (!$this->ProductCD->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->ProductCD->Visible = FALSE; // Disable update for API request
			else
				$this->ProductCD->setFormValue($val);
		}

		// Check field name 'Nos' first before field var 'x_Nos'
		$val = $CurrentForm->hasValue("Nos") ? $CurrentForm->getValue("Nos") : $CurrentForm->getValue("x_Nos");
		if (!$this->Nos->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Nos->Visible = FALSE; // Disable update for API request
			else
				$this->Nos->setFormValue($val);
		}

		// Check field name 'WBCPath' first before field var 'x_WBCPath'
		$val = $CurrentForm->hasValue("WBCPath") ? $CurrentForm->getValue("WBCPath") : $CurrentForm->getValue("x_WBCPath");
		if (!$this->WBCPath->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->WBCPath->Visible = FALSE; // Disable update for API request
			else
				$this->WBCPath->setFormValue($val);
		}

		// Check field name 'RBCPath' first before field var 'x_RBCPath'
		$val = $CurrentForm->hasValue("RBCPath") ? $CurrentForm->getValue("RBCPath") : $CurrentForm->getValue("x_RBCPath");
		if (!$this->RBCPath->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->RBCPath->Visible = FALSE; // Disable update for API request
			else
				$this->RBCPath->setFormValue($val);
		}

		// Check field name 'PTPath' first before field var 'x_PTPath'
		$val = $CurrentForm->hasValue("PTPath") ? $CurrentForm->getValue("PTPath") : $CurrentForm->getValue("x_PTPath");
		if (!$this->PTPath->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->PTPath->Visible = FALSE; // Disable update for API request
			else
				$this->PTPath->setFormValue($val);
		}

		// Check field name 'ActualAmt' first before field var 'x_ActualAmt'
		$val = $CurrentForm->hasValue("ActualAmt") ? $CurrentForm->getValue("ActualAmt") : $CurrentForm->getValue("x_ActualAmt");
		if (!$this->ActualAmt->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->ActualAmt->Visible = FALSE; // Disable update for API request
			else
				$this->ActualAmt->setFormValue($val);
		}

		// Check field name 'NoSign' first before field var 'x_NoSign'
		$val = $CurrentForm->hasValue("NoSign") ? $CurrentForm->getValue("NoSign") : $CurrentForm->getValue("x_NoSign");
		if (!$this->NoSign->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->NoSign->Visible = FALSE; // Disable update for API request
			else
				$this->NoSign->setFormValue($val);
		}

		// Check field name 'Barcode' first before field var 'x__Barcode'
		$val = $CurrentForm->hasValue("Barcode") ? $CurrentForm->getValue("Barcode") : $CurrentForm->getValue("x__Barcode");
		if (!$this->_Barcode->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->_Barcode->Visible = FALSE; // Disable update for API request
			else
				$this->_Barcode->setFormValue($val);
		}

		// Check field name 'ReadTime' first before field var 'x_ReadTime'
		$val = $CurrentForm->hasValue("ReadTime") ? $CurrentForm->getValue("ReadTime") : $CurrentForm->getValue("x_ReadTime");
		if (!$this->ReadTime->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->ReadTime->Visible = FALSE; // Disable update for API request
			else
				$this->ReadTime->setFormValue($val);
			$this->ReadTime->CurrentValue = UnFormatDateTime($this->ReadTime->CurrentValue, 0);
		}

		// Check field name 'Result' first before field var 'x_Result'
		$val = $CurrentForm->hasValue("Result") ? $CurrentForm->getValue("Result") : $CurrentForm->getValue("x_Result");
		if (!$this->Result->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Result->Visible = FALSE; // Disable update for API request
			else
				$this->Result->setFormValue($val);
		}

		// Check field name 'VailID' first before field var 'x_VailID'
		$val = $CurrentForm->hasValue("VailID") ? $CurrentForm->getValue("VailID") : $CurrentForm->getValue("x_VailID");
		if (!$this->VailID->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->VailID->Visible = FALSE; // Disable update for API request
			else
				$this->VailID->setFormValue($val);
		}

		// Check field name 'ReadMachine' first before field var 'x_ReadMachine'
		$val = $CurrentForm->hasValue("ReadMachine") ? $CurrentForm->getValue("ReadMachine") : $CurrentForm->getValue("x_ReadMachine");
		if (!$this->ReadMachine->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->ReadMachine->Visible = FALSE; // Disable update for API request
			else
				$this->ReadMachine->setFormValue($val);
		}

		// Check field name 'LabCD' first before field var 'x_LabCD'
		$val = $CurrentForm->hasValue("LabCD") ? $CurrentForm->getValue("LabCD") : $CurrentForm->getValue("x_LabCD");
		if (!$this->LabCD->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->LabCD->Visible = FALSE; // Disable update for API request
			else
				$this->LabCD->setFormValue($val);
		}

		// Check field name 'OutLabAmt' first before field var 'x_OutLabAmt'
		$val = $CurrentForm->hasValue("OutLabAmt") ? $CurrentForm->getValue("OutLabAmt") : $CurrentForm->getValue("x_OutLabAmt");
		if (!$this->OutLabAmt->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->OutLabAmt->Visible = FALSE; // Disable update for API request
			else
				$this->OutLabAmt->setFormValue($val);
		}

		// Check field name 'ProductQty' first before field var 'x_ProductQty'
		$val = $CurrentForm->hasValue("ProductQty") ? $CurrentForm->getValue("ProductQty") : $CurrentForm->getValue("x_ProductQty");
		if (!$this->ProductQty->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->ProductQty->Visible = FALSE; // Disable update for API request
			else
				$this->ProductQty->setFormValue($val);
		}

		// Check field name 'Repeat' first before field var 'x_Repeat'
		$val = $CurrentForm->hasValue("Repeat") ? $CurrentForm->getValue("Repeat") : $CurrentForm->getValue("x_Repeat");
		if (!$this->Repeat->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Repeat->Visible = FALSE; // Disable update for API request
			else
				$this->Repeat->setFormValue($val);
		}

		// Check field name 'DeptNo' first before field var 'x_DeptNo'
		$val = $CurrentForm->hasValue("DeptNo") ? $CurrentForm->getValue("DeptNo") : $CurrentForm->getValue("x_DeptNo");
		if (!$this->DeptNo->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->DeptNo->Visible = FALSE; // Disable update for API request
			else
				$this->DeptNo->setFormValue($val);
		}

		// Check field name 'Desc1' first before field var 'x_Desc1'
		$val = $CurrentForm->hasValue("Desc1") ? $CurrentForm->getValue("Desc1") : $CurrentForm->getValue("x_Desc1");
		if (!$this->Desc1->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Desc1->Visible = FALSE; // Disable update for API request
			else
				$this->Desc1->setFormValue($val);
		}

		// Check field name 'Desc2' first before field var 'x_Desc2'
		$val = $CurrentForm->hasValue("Desc2") ? $CurrentForm->getValue("Desc2") : $CurrentForm->getValue("x_Desc2");
		if (!$this->Desc2->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Desc2->Visible = FALSE; // Disable update for API request
			else
				$this->Desc2->setFormValue($val);
		}

		// Check field name 'RptResult' first before field var 'x_RptResult'
		$val = $CurrentForm->hasValue("RptResult") ? $CurrentForm->getValue("RptResult") : $CurrentForm->getValue("x_RptResult");
		if (!$this->RptResult->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->RptResult->Visible = FALSE; // Disable update for API request
			else
				$this->RptResult->setFormValue($val);
		}
	}

	// Restore form values
	public function restoreFormValues()
	{
		global $CurrentForm;
		$this->Branch->CurrentValue = $this->Branch->FormValue;
		$this->SidNo->CurrentValue = $this->SidNo->FormValue;
		$this->SidDate->CurrentValue = $this->SidDate->FormValue;
		$this->SidDate->CurrentValue = UnFormatDateTime($this->SidDate->CurrentValue, 0);
		$this->TestCd->CurrentValue = $this->TestCd->FormValue;
		$this->TestSubCd->CurrentValue = $this->TestSubCd->FormValue;
		$this->DEptCd->CurrentValue = $this->DEptCd->FormValue;
		$this->ProfCd->CurrentValue = $this->ProfCd->FormValue;
		$this->LabReport->CurrentValue = $this->LabReport->FormValue;
		$this->ResultDate->CurrentValue = $this->ResultDate->FormValue;
		$this->ResultDate->CurrentValue = UnFormatDateTime($this->ResultDate->CurrentValue, 0);
		$this->Comments->CurrentValue = $this->Comments->FormValue;
		$this->Method->CurrentValue = $this->Method->FormValue;
		$this->Specimen->CurrentValue = $this->Specimen->FormValue;
		$this->Amount->CurrentValue = $this->Amount->FormValue;
		$this->ResultBy->CurrentValue = $this->ResultBy->FormValue;
		$this->AuthBy->CurrentValue = $this->AuthBy->FormValue;
		$this->AuthDate->CurrentValue = $this->AuthDate->FormValue;
		$this->AuthDate->CurrentValue = UnFormatDateTime($this->AuthDate->CurrentValue, 0);
		$this->Abnormal->CurrentValue = $this->Abnormal->FormValue;
		$this->Printed->CurrentValue = $this->Printed->FormValue;
		$this->Dispatch->CurrentValue = $this->Dispatch->FormValue;
		$this->LOWHIGH->CurrentValue = $this->LOWHIGH->FormValue;
		$this->RefValue->CurrentValue = $this->RefValue->FormValue;
		$this->Unit->CurrentValue = $this->Unit->FormValue;
		$this->ResDate->CurrentValue = $this->ResDate->FormValue;
		$this->ResDate->CurrentValue = UnFormatDateTime($this->ResDate->CurrentValue, 0);
		$this->Pic1->CurrentValue = $this->Pic1->FormValue;
		$this->Pic2->CurrentValue = $this->Pic2->FormValue;
		$this->GraphPath->CurrentValue = $this->GraphPath->FormValue;
		$this->SampleDate->CurrentValue = $this->SampleDate->FormValue;
		$this->SampleDate->CurrentValue = UnFormatDateTime($this->SampleDate->CurrentValue, 0);
		$this->SampleUser->CurrentValue = $this->SampleUser->FormValue;
		$this->ReceivedDate->CurrentValue = $this->ReceivedDate->FormValue;
		$this->ReceivedDate->CurrentValue = UnFormatDateTime($this->ReceivedDate->CurrentValue, 0);
		$this->ReceivedUser->CurrentValue = $this->ReceivedUser->FormValue;
		$this->DeptRecvDate->CurrentValue = $this->DeptRecvDate->FormValue;
		$this->DeptRecvDate->CurrentValue = UnFormatDateTime($this->DeptRecvDate->CurrentValue, 0);
		$this->DeptRecvUser->CurrentValue = $this->DeptRecvUser->FormValue;
		$this->PrintBy->CurrentValue = $this->PrintBy->FormValue;
		$this->PrintDate->CurrentValue = $this->PrintDate->FormValue;
		$this->PrintDate->CurrentValue = UnFormatDateTime($this->PrintDate->CurrentValue, 0);
		$this->MachineCD->CurrentValue = $this->MachineCD->FormValue;
		$this->TestCancel->CurrentValue = $this->TestCancel->FormValue;
		$this->OutSource->CurrentValue = $this->OutSource->FormValue;
		$this->Tariff->CurrentValue = $this->Tariff->FormValue;
		$this->EDITDATE->CurrentValue = $this->EDITDATE->FormValue;
		$this->EDITDATE->CurrentValue = UnFormatDateTime($this->EDITDATE->CurrentValue, 0);
		$this->UPLOAD->CurrentValue = $this->UPLOAD->FormValue;
		$this->SAuthDate->CurrentValue = $this->SAuthDate->FormValue;
		$this->SAuthDate->CurrentValue = UnFormatDateTime($this->SAuthDate->CurrentValue, 0);
		$this->SAuthBy->CurrentValue = $this->SAuthBy->FormValue;
		$this->NoRC->CurrentValue = $this->NoRC->FormValue;
		$this->DispDt->CurrentValue = $this->DispDt->FormValue;
		$this->DispDt->CurrentValue = UnFormatDateTime($this->DispDt->CurrentValue, 0);
		$this->DispUser->CurrentValue = $this->DispUser->FormValue;
		$this->DispRemarks->CurrentValue = $this->DispRemarks->FormValue;
		$this->DispMode->CurrentValue = $this->DispMode->FormValue;
		$this->ProductCD->CurrentValue = $this->ProductCD->FormValue;
		$this->Nos->CurrentValue = $this->Nos->FormValue;
		$this->WBCPath->CurrentValue = $this->WBCPath->FormValue;
		$this->RBCPath->CurrentValue = $this->RBCPath->FormValue;
		$this->PTPath->CurrentValue = $this->PTPath->FormValue;
		$this->ActualAmt->CurrentValue = $this->ActualAmt->FormValue;
		$this->NoSign->CurrentValue = $this->NoSign->FormValue;
		$this->_Barcode->CurrentValue = $this->_Barcode->FormValue;
		$this->ReadTime->CurrentValue = $this->ReadTime->FormValue;
		$this->ReadTime->CurrentValue = UnFormatDateTime($this->ReadTime->CurrentValue, 0);
		$this->Result->CurrentValue = $this->Result->FormValue;
		$this->VailID->CurrentValue = $this->VailID->FormValue;
		$this->ReadMachine->CurrentValue = $this->ReadMachine->FormValue;
		$this->LabCD->CurrentValue = $this->LabCD->FormValue;
		$this->OutLabAmt->CurrentValue = $this->OutLabAmt->FormValue;
		$this->ProductQty->CurrentValue = $this->ProductQty->FormValue;
		$this->Repeat->CurrentValue = $this->Repeat->FormValue;
		$this->DeptNo->CurrentValue = $this->DeptNo->FormValue;
		$this->Desc1->CurrentValue = $this->Desc1->FormValue;
		$this->Desc2->CurrentValue = $this->Desc2->FormValue;
		$this->RptResult->CurrentValue = $this->RptResult->FormValue;
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
		$this->Branch->setDbValue($row['Branch']);
		$this->SidNo->setDbValue($row['SidNo']);
		$this->SidDate->setDbValue($row['SidDate']);
		$this->TestCd->setDbValue($row['TestCd']);
		$this->TestSubCd->setDbValue($row['TestSubCd']);
		$this->DEptCd->setDbValue($row['DEptCd']);
		$this->ProfCd->setDbValue($row['ProfCd']);
		$this->LabReport->setDbValue($row['LabReport']);
		$this->ResultDate->setDbValue($row['ResultDate']);
		$this->Comments->setDbValue($row['Comments']);
		$this->Method->setDbValue($row['Method']);
		$this->Specimen->setDbValue($row['Specimen']);
		$this->Amount->setDbValue($row['Amount']);
		$this->ResultBy->setDbValue($row['ResultBy']);
		$this->AuthBy->setDbValue($row['AuthBy']);
		$this->AuthDate->setDbValue($row['AuthDate']);
		$this->Abnormal->setDbValue($row['Abnormal']);
		$this->Printed->setDbValue($row['Printed']);
		$this->Dispatch->setDbValue($row['Dispatch']);
		$this->LOWHIGH->setDbValue($row['LOWHIGH']);
		$this->RefValue->setDbValue($row['RefValue']);
		$this->Unit->setDbValue($row['Unit']);
		$this->ResDate->setDbValue($row['ResDate']);
		$this->Pic1->setDbValue($row['Pic1']);
		$this->Pic2->setDbValue($row['Pic2']);
		$this->GraphPath->setDbValue($row['GraphPath']);
		$this->SampleDate->setDbValue($row['SampleDate']);
		$this->SampleUser->setDbValue($row['SampleUser']);
		$this->ReceivedDate->setDbValue($row['ReceivedDate']);
		$this->ReceivedUser->setDbValue($row['ReceivedUser']);
		$this->DeptRecvDate->setDbValue($row['DeptRecvDate']);
		$this->DeptRecvUser->setDbValue($row['DeptRecvUser']);
		$this->PrintBy->setDbValue($row['PrintBy']);
		$this->PrintDate->setDbValue($row['PrintDate']);
		$this->MachineCD->setDbValue($row['MachineCD']);
		$this->TestCancel->setDbValue($row['TestCancel']);
		$this->OutSource->setDbValue($row['OutSource']);
		$this->Tariff->setDbValue($row['Tariff']);
		$this->EDITDATE->setDbValue($row['EDITDATE']);
		$this->UPLOAD->setDbValue($row['UPLOAD']);
		$this->SAuthDate->setDbValue($row['SAuthDate']);
		$this->SAuthBy->setDbValue($row['SAuthBy']);
		$this->NoRC->setDbValue($row['NoRC']);
		$this->DispDt->setDbValue($row['DispDt']);
		$this->DispUser->setDbValue($row['DispUser']);
		$this->DispRemarks->setDbValue($row['DispRemarks']);
		$this->DispMode->setDbValue($row['DispMode']);
		$this->ProductCD->setDbValue($row['ProductCD']);
		$this->Nos->setDbValue($row['Nos']);
		$this->WBCPath->setDbValue($row['WBCPath']);
		$this->RBCPath->setDbValue($row['RBCPath']);
		$this->PTPath->setDbValue($row['PTPath']);
		$this->ActualAmt->setDbValue($row['ActualAmt']);
		$this->NoSign->setDbValue($row['NoSign']);
		$this->_Barcode->setDbValue($row['Barcode']);
		$this->ReadTime->setDbValue($row['ReadTime']);
		$this->Result->setDbValue($row['Result']);
		$this->VailID->setDbValue($row['VailID']);
		$this->ReadMachine->setDbValue($row['ReadMachine']);
		$this->LabCD->setDbValue($row['LabCD']);
		$this->OutLabAmt->setDbValue($row['OutLabAmt']);
		$this->ProductQty->setDbValue($row['ProductQty']);
		$this->Repeat->setDbValue($row['Repeat']);
		$this->DeptNo->setDbValue($row['DeptNo']);
		$this->Desc1->setDbValue($row['Desc1']);
		$this->Desc2->setDbValue($row['Desc2']);
		$this->RptResult->setDbValue($row['RptResult']);
	}

	// Return a row with default values
	protected function newRow()
	{
		$this->loadDefaultValues();
		$row = [];
		$row['Branch'] = $this->Branch->CurrentValue;
		$row['SidNo'] = $this->SidNo->CurrentValue;
		$row['SidDate'] = $this->SidDate->CurrentValue;
		$row['TestCd'] = $this->TestCd->CurrentValue;
		$row['TestSubCd'] = $this->TestSubCd->CurrentValue;
		$row['DEptCd'] = $this->DEptCd->CurrentValue;
		$row['ProfCd'] = $this->ProfCd->CurrentValue;
		$row['LabReport'] = $this->LabReport->CurrentValue;
		$row['ResultDate'] = $this->ResultDate->CurrentValue;
		$row['Comments'] = $this->Comments->CurrentValue;
		$row['Method'] = $this->Method->CurrentValue;
		$row['Specimen'] = $this->Specimen->CurrentValue;
		$row['Amount'] = $this->Amount->CurrentValue;
		$row['ResultBy'] = $this->ResultBy->CurrentValue;
		$row['AuthBy'] = $this->AuthBy->CurrentValue;
		$row['AuthDate'] = $this->AuthDate->CurrentValue;
		$row['Abnormal'] = $this->Abnormal->CurrentValue;
		$row['Printed'] = $this->Printed->CurrentValue;
		$row['Dispatch'] = $this->Dispatch->CurrentValue;
		$row['LOWHIGH'] = $this->LOWHIGH->CurrentValue;
		$row['RefValue'] = $this->RefValue->CurrentValue;
		$row['Unit'] = $this->Unit->CurrentValue;
		$row['ResDate'] = $this->ResDate->CurrentValue;
		$row['Pic1'] = $this->Pic1->CurrentValue;
		$row['Pic2'] = $this->Pic2->CurrentValue;
		$row['GraphPath'] = $this->GraphPath->CurrentValue;
		$row['SampleDate'] = $this->SampleDate->CurrentValue;
		$row['SampleUser'] = $this->SampleUser->CurrentValue;
		$row['ReceivedDate'] = $this->ReceivedDate->CurrentValue;
		$row['ReceivedUser'] = $this->ReceivedUser->CurrentValue;
		$row['DeptRecvDate'] = $this->DeptRecvDate->CurrentValue;
		$row['DeptRecvUser'] = $this->DeptRecvUser->CurrentValue;
		$row['PrintBy'] = $this->PrintBy->CurrentValue;
		$row['PrintDate'] = $this->PrintDate->CurrentValue;
		$row['MachineCD'] = $this->MachineCD->CurrentValue;
		$row['TestCancel'] = $this->TestCancel->CurrentValue;
		$row['OutSource'] = $this->OutSource->CurrentValue;
		$row['Tariff'] = $this->Tariff->CurrentValue;
		$row['EDITDATE'] = $this->EDITDATE->CurrentValue;
		$row['UPLOAD'] = $this->UPLOAD->CurrentValue;
		$row['SAuthDate'] = $this->SAuthDate->CurrentValue;
		$row['SAuthBy'] = $this->SAuthBy->CurrentValue;
		$row['NoRC'] = $this->NoRC->CurrentValue;
		$row['DispDt'] = $this->DispDt->CurrentValue;
		$row['DispUser'] = $this->DispUser->CurrentValue;
		$row['DispRemarks'] = $this->DispRemarks->CurrentValue;
		$row['DispMode'] = $this->DispMode->CurrentValue;
		$row['ProductCD'] = $this->ProductCD->CurrentValue;
		$row['Nos'] = $this->Nos->CurrentValue;
		$row['WBCPath'] = $this->WBCPath->CurrentValue;
		$row['RBCPath'] = $this->RBCPath->CurrentValue;
		$row['PTPath'] = $this->PTPath->CurrentValue;
		$row['ActualAmt'] = $this->ActualAmt->CurrentValue;
		$row['NoSign'] = $this->NoSign->CurrentValue;
		$row['Barcode'] = $this->_Barcode->CurrentValue;
		$row['ReadTime'] = $this->ReadTime->CurrentValue;
		$row['Result'] = $this->Result->CurrentValue;
		$row['VailID'] = $this->VailID->CurrentValue;
		$row['ReadMachine'] = $this->ReadMachine->CurrentValue;
		$row['LabCD'] = $this->LabCD->CurrentValue;
		$row['OutLabAmt'] = $this->OutLabAmt->CurrentValue;
		$row['ProductQty'] = $this->ProductQty->CurrentValue;
		$row['Repeat'] = $this->Repeat->CurrentValue;
		$row['DeptNo'] = $this->DeptNo->CurrentValue;
		$row['Desc1'] = $this->Desc1->CurrentValue;
		$row['Desc2'] = $this->Desc2->CurrentValue;
		$row['RptResult'] = $this->RptResult->CurrentValue;
		return $row;
	}

	// Load old record
	protected function loadOldRecord()
	{
		return FALSE;
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
		} elseif ($this->RowType == ROWTYPE_ADD) { // Add row

			// Branch
			$this->Branch->EditAttrs["class"] = "form-control";
			$this->Branch->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Branch->CurrentValue = HtmlDecode($this->Branch->CurrentValue);
			$this->Branch->EditValue = HtmlEncode($this->Branch->CurrentValue);
			$this->Branch->PlaceHolder = RemoveHtml($this->Branch->caption());

			// SidNo
			$this->SidNo->EditAttrs["class"] = "form-control";
			$this->SidNo->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->SidNo->CurrentValue = HtmlDecode($this->SidNo->CurrentValue);
			$this->SidNo->EditValue = HtmlEncode($this->SidNo->CurrentValue);
			$this->SidNo->PlaceHolder = RemoveHtml($this->SidNo->caption());

			// SidDate
			$this->SidDate->EditAttrs["class"] = "form-control";
			$this->SidDate->EditCustomAttributes = "";
			$this->SidDate->EditValue = HtmlEncode(FormatDateTime($this->SidDate->CurrentValue, 8));
			$this->SidDate->PlaceHolder = RemoveHtml($this->SidDate->caption());

			// TestCd
			$this->TestCd->EditAttrs["class"] = "form-control";
			$this->TestCd->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->TestCd->CurrentValue = HtmlDecode($this->TestCd->CurrentValue);
			$this->TestCd->EditValue = HtmlEncode($this->TestCd->CurrentValue);
			$this->TestCd->PlaceHolder = RemoveHtml($this->TestCd->caption());

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

			// ResultDate
			$this->ResultDate->EditAttrs["class"] = "form-control";
			$this->ResultDate->EditCustomAttributes = "";
			$this->ResultDate->EditValue = HtmlEncode(FormatDateTime($this->ResultDate->CurrentValue, 8));
			$this->ResultDate->PlaceHolder = RemoveHtml($this->ResultDate->caption());

			// Comments
			$this->Comments->EditAttrs["class"] = "form-control";
			$this->Comments->EditCustomAttributes = "";
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

			// Amount
			$this->Amount->EditAttrs["class"] = "form-control";
			$this->Amount->EditCustomAttributes = "";
			$this->Amount->EditValue = HtmlEncode($this->Amount->CurrentValue);
			$this->Amount->PlaceHolder = RemoveHtml($this->Amount->caption());
			if (strval($this->Amount->EditValue) <> "" && is_numeric($this->Amount->EditValue))
				$this->Amount->EditValue = FormatNumber($this->Amount->EditValue, -2, -2, -2, -2);

			// ResultBy
			$this->ResultBy->EditAttrs["class"] = "form-control";
			$this->ResultBy->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->ResultBy->CurrentValue = HtmlDecode($this->ResultBy->CurrentValue);
			$this->ResultBy->EditValue = HtmlEncode($this->ResultBy->CurrentValue);
			$this->ResultBy->PlaceHolder = RemoveHtml($this->ResultBy->caption());

			// AuthBy
			$this->AuthBy->EditAttrs["class"] = "form-control";
			$this->AuthBy->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->AuthBy->CurrentValue = HtmlDecode($this->AuthBy->CurrentValue);
			$this->AuthBy->EditValue = HtmlEncode($this->AuthBy->CurrentValue);
			$this->AuthBy->PlaceHolder = RemoveHtml($this->AuthBy->caption());

			// AuthDate
			$this->AuthDate->EditAttrs["class"] = "form-control";
			$this->AuthDate->EditCustomAttributes = "";
			$this->AuthDate->EditValue = HtmlEncode(FormatDateTime($this->AuthDate->CurrentValue, 8));
			$this->AuthDate->PlaceHolder = RemoveHtml($this->AuthDate->caption());

			// Abnormal
			$this->Abnormal->EditAttrs["class"] = "form-control";
			$this->Abnormal->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Abnormal->CurrentValue = HtmlDecode($this->Abnormal->CurrentValue);
			$this->Abnormal->EditValue = HtmlEncode($this->Abnormal->CurrentValue);
			$this->Abnormal->PlaceHolder = RemoveHtml($this->Abnormal->caption());

			// Printed
			$this->Printed->EditAttrs["class"] = "form-control";
			$this->Printed->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Printed->CurrentValue = HtmlDecode($this->Printed->CurrentValue);
			$this->Printed->EditValue = HtmlEncode($this->Printed->CurrentValue);
			$this->Printed->PlaceHolder = RemoveHtml($this->Printed->caption());

			// Dispatch
			$this->Dispatch->EditAttrs["class"] = "form-control";
			$this->Dispatch->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Dispatch->CurrentValue = HtmlDecode($this->Dispatch->CurrentValue);
			$this->Dispatch->EditValue = HtmlEncode($this->Dispatch->CurrentValue);
			$this->Dispatch->PlaceHolder = RemoveHtml($this->Dispatch->caption());

			// LOWHIGH
			$this->LOWHIGH->EditAttrs["class"] = "form-control";
			$this->LOWHIGH->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->LOWHIGH->CurrentValue = HtmlDecode($this->LOWHIGH->CurrentValue);
			$this->LOWHIGH->EditValue = HtmlEncode($this->LOWHIGH->CurrentValue);
			$this->LOWHIGH->PlaceHolder = RemoveHtml($this->LOWHIGH->caption());

			// RefValue
			$this->RefValue->EditAttrs["class"] = "form-control";
			$this->RefValue->EditCustomAttributes = "";
			$this->RefValue->EditValue = HtmlEncode($this->RefValue->CurrentValue);
			$this->RefValue->PlaceHolder = RemoveHtml($this->RefValue->caption());

			// Unit
			$this->Unit->EditAttrs["class"] = "form-control";
			$this->Unit->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Unit->CurrentValue = HtmlDecode($this->Unit->CurrentValue);
			$this->Unit->EditValue = HtmlEncode($this->Unit->CurrentValue);
			$this->Unit->PlaceHolder = RemoveHtml($this->Unit->caption());

			// ResDate
			$this->ResDate->EditAttrs["class"] = "form-control";
			$this->ResDate->EditCustomAttributes = "";
			$this->ResDate->EditValue = HtmlEncode(FormatDateTime($this->ResDate->CurrentValue, 8));
			$this->ResDate->PlaceHolder = RemoveHtml($this->ResDate->caption());

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

			// Tariff
			$this->Tariff->EditAttrs["class"] = "form-control";
			$this->Tariff->EditCustomAttributes = "";
			$this->Tariff->EditValue = HtmlEncode($this->Tariff->CurrentValue);
			$this->Tariff->PlaceHolder = RemoveHtml($this->Tariff->caption());
			if (strval($this->Tariff->EditValue) <> "" && is_numeric($this->Tariff->EditValue))
				$this->Tariff->EditValue = FormatNumber($this->Tariff->EditValue, -2, -2, -2, -2);

			// EDITDATE
			$this->EDITDATE->EditAttrs["class"] = "form-control";
			$this->EDITDATE->EditCustomAttributes = "";
			$this->EDITDATE->EditValue = HtmlEncode(FormatDateTime($this->EDITDATE->CurrentValue, 8));
			$this->EDITDATE->PlaceHolder = RemoveHtml($this->EDITDATE->caption());

			// UPLOAD
			$this->UPLOAD->EditAttrs["class"] = "form-control";
			$this->UPLOAD->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->UPLOAD->CurrentValue = HtmlDecode($this->UPLOAD->CurrentValue);
			$this->UPLOAD->EditValue = HtmlEncode($this->UPLOAD->CurrentValue);
			$this->UPLOAD->PlaceHolder = RemoveHtml($this->UPLOAD->caption());

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

			// NoRC
			$this->NoRC->EditAttrs["class"] = "form-control";
			$this->NoRC->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->NoRC->CurrentValue = HtmlDecode($this->NoRC->CurrentValue);
			$this->NoRC->EditValue = HtmlEncode($this->NoRC->CurrentValue);
			$this->NoRC->PlaceHolder = RemoveHtml($this->NoRC->caption());

			// DispDt
			$this->DispDt->EditAttrs["class"] = "form-control";
			$this->DispDt->EditCustomAttributes = "";
			$this->DispDt->EditValue = HtmlEncode(FormatDateTime($this->DispDt->CurrentValue, 8));
			$this->DispDt->PlaceHolder = RemoveHtml($this->DispDt->caption());

			// DispUser
			$this->DispUser->EditAttrs["class"] = "form-control";
			$this->DispUser->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->DispUser->CurrentValue = HtmlDecode($this->DispUser->CurrentValue);
			$this->DispUser->EditValue = HtmlEncode($this->DispUser->CurrentValue);
			$this->DispUser->PlaceHolder = RemoveHtml($this->DispUser->caption());

			// DispRemarks
			$this->DispRemarks->EditAttrs["class"] = "form-control";
			$this->DispRemarks->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->DispRemarks->CurrentValue = HtmlDecode($this->DispRemarks->CurrentValue);
			$this->DispRemarks->EditValue = HtmlEncode($this->DispRemarks->CurrentValue);
			$this->DispRemarks->PlaceHolder = RemoveHtml($this->DispRemarks->caption());

			// DispMode
			$this->DispMode->EditAttrs["class"] = "form-control";
			$this->DispMode->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->DispMode->CurrentValue = HtmlDecode($this->DispMode->CurrentValue);
			$this->DispMode->EditValue = HtmlEncode($this->DispMode->CurrentValue);
			$this->DispMode->PlaceHolder = RemoveHtml($this->DispMode->caption());

			// ProductCD
			$this->ProductCD->EditAttrs["class"] = "form-control";
			$this->ProductCD->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->ProductCD->CurrentValue = HtmlDecode($this->ProductCD->CurrentValue);
			$this->ProductCD->EditValue = HtmlEncode($this->ProductCD->CurrentValue);
			$this->ProductCD->PlaceHolder = RemoveHtml($this->ProductCD->caption());

			// Nos
			$this->Nos->EditAttrs["class"] = "form-control";
			$this->Nos->EditCustomAttributes = "";
			$this->Nos->EditValue = HtmlEncode($this->Nos->CurrentValue);
			$this->Nos->PlaceHolder = RemoveHtml($this->Nos->caption());
			if (strval($this->Nos->EditValue) <> "" && is_numeric($this->Nos->EditValue))
				$this->Nos->EditValue = FormatNumber($this->Nos->EditValue, -2, -2, -2, -2);

			// WBCPath
			$this->WBCPath->EditAttrs["class"] = "form-control";
			$this->WBCPath->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->WBCPath->CurrentValue = HtmlDecode($this->WBCPath->CurrentValue);
			$this->WBCPath->EditValue = HtmlEncode($this->WBCPath->CurrentValue);
			$this->WBCPath->PlaceHolder = RemoveHtml($this->WBCPath->caption());

			// RBCPath
			$this->RBCPath->EditAttrs["class"] = "form-control";
			$this->RBCPath->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->RBCPath->CurrentValue = HtmlDecode($this->RBCPath->CurrentValue);
			$this->RBCPath->EditValue = HtmlEncode($this->RBCPath->CurrentValue);
			$this->RBCPath->PlaceHolder = RemoveHtml($this->RBCPath->caption());

			// PTPath
			$this->PTPath->EditAttrs["class"] = "form-control";
			$this->PTPath->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->PTPath->CurrentValue = HtmlDecode($this->PTPath->CurrentValue);
			$this->PTPath->EditValue = HtmlEncode($this->PTPath->CurrentValue);
			$this->PTPath->PlaceHolder = RemoveHtml($this->PTPath->caption());

			// ActualAmt
			$this->ActualAmt->EditAttrs["class"] = "form-control";
			$this->ActualAmt->EditCustomAttributes = "";
			$this->ActualAmt->EditValue = HtmlEncode($this->ActualAmt->CurrentValue);
			$this->ActualAmt->PlaceHolder = RemoveHtml($this->ActualAmt->caption());
			if (strval($this->ActualAmt->EditValue) <> "" && is_numeric($this->ActualAmt->EditValue))
				$this->ActualAmt->EditValue = FormatNumber($this->ActualAmt->EditValue, -2, -2, -2, -2);

			// NoSign
			$this->NoSign->EditAttrs["class"] = "form-control";
			$this->NoSign->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->NoSign->CurrentValue = HtmlDecode($this->NoSign->CurrentValue);
			$this->NoSign->EditValue = HtmlEncode($this->NoSign->CurrentValue);
			$this->NoSign->PlaceHolder = RemoveHtml($this->NoSign->caption());

			// Barcode
			$this->_Barcode->EditAttrs["class"] = "form-control";
			$this->_Barcode->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->_Barcode->CurrentValue = HtmlDecode($this->_Barcode->CurrentValue);
			$this->_Barcode->EditValue = HtmlEncode($this->_Barcode->CurrentValue);
			$this->_Barcode->PlaceHolder = RemoveHtml($this->_Barcode->caption());

			// ReadTime
			$this->ReadTime->EditAttrs["class"] = "form-control";
			$this->ReadTime->EditCustomAttributes = "";
			$this->ReadTime->EditValue = HtmlEncode(FormatDateTime($this->ReadTime->CurrentValue, 8));
			$this->ReadTime->PlaceHolder = RemoveHtml($this->ReadTime->caption());

			// Result
			$this->Result->EditAttrs["class"] = "form-control";
			$this->Result->EditCustomAttributes = "";
			$this->Result->EditValue = HtmlEncode($this->Result->CurrentValue);
			$this->Result->PlaceHolder = RemoveHtml($this->Result->caption());

			// VailID
			$this->VailID->EditAttrs["class"] = "form-control";
			$this->VailID->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->VailID->CurrentValue = HtmlDecode($this->VailID->CurrentValue);
			$this->VailID->EditValue = HtmlEncode($this->VailID->CurrentValue);
			$this->VailID->PlaceHolder = RemoveHtml($this->VailID->caption());

			// ReadMachine
			$this->ReadMachine->EditAttrs["class"] = "form-control";
			$this->ReadMachine->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->ReadMachine->CurrentValue = HtmlDecode($this->ReadMachine->CurrentValue);
			$this->ReadMachine->EditValue = HtmlEncode($this->ReadMachine->CurrentValue);
			$this->ReadMachine->PlaceHolder = RemoveHtml($this->ReadMachine->caption());

			// LabCD
			$this->LabCD->EditAttrs["class"] = "form-control";
			$this->LabCD->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->LabCD->CurrentValue = HtmlDecode($this->LabCD->CurrentValue);
			$this->LabCD->EditValue = HtmlEncode($this->LabCD->CurrentValue);
			$this->LabCD->PlaceHolder = RemoveHtml($this->LabCD->caption());

			// OutLabAmt
			$this->OutLabAmt->EditAttrs["class"] = "form-control";
			$this->OutLabAmt->EditCustomAttributes = "";
			$this->OutLabAmt->EditValue = HtmlEncode($this->OutLabAmt->CurrentValue);
			$this->OutLabAmt->PlaceHolder = RemoveHtml($this->OutLabAmt->caption());
			if (strval($this->OutLabAmt->EditValue) <> "" && is_numeric($this->OutLabAmt->EditValue))
				$this->OutLabAmt->EditValue = FormatNumber($this->OutLabAmt->EditValue, -2, -2, -2, -2);

			// ProductQty
			$this->ProductQty->EditAttrs["class"] = "form-control";
			$this->ProductQty->EditCustomAttributes = "";
			$this->ProductQty->EditValue = HtmlEncode($this->ProductQty->CurrentValue);
			$this->ProductQty->PlaceHolder = RemoveHtml($this->ProductQty->caption());
			if (strval($this->ProductQty->EditValue) <> "" && is_numeric($this->ProductQty->EditValue))
				$this->ProductQty->EditValue = FormatNumber($this->ProductQty->EditValue, -2, -2, -2, -2);

			// Repeat
			$this->Repeat->EditAttrs["class"] = "form-control";
			$this->Repeat->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Repeat->CurrentValue = HtmlDecode($this->Repeat->CurrentValue);
			$this->Repeat->EditValue = HtmlEncode($this->Repeat->CurrentValue);
			$this->Repeat->PlaceHolder = RemoveHtml($this->Repeat->caption());

			// DeptNo
			$this->DeptNo->EditAttrs["class"] = "form-control";
			$this->DeptNo->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->DeptNo->CurrentValue = HtmlDecode($this->DeptNo->CurrentValue);
			$this->DeptNo->EditValue = HtmlEncode($this->DeptNo->CurrentValue);
			$this->DeptNo->PlaceHolder = RemoveHtml($this->DeptNo->caption());

			// Desc1
			$this->Desc1->EditAttrs["class"] = "form-control";
			$this->Desc1->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Desc1->CurrentValue = HtmlDecode($this->Desc1->CurrentValue);
			$this->Desc1->EditValue = HtmlEncode($this->Desc1->CurrentValue);
			$this->Desc1->PlaceHolder = RemoveHtml($this->Desc1->caption());

			// Desc2
			$this->Desc2->EditAttrs["class"] = "form-control";
			$this->Desc2->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Desc2->CurrentValue = HtmlDecode($this->Desc2->CurrentValue);
			$this->Desc2->EditValue = HtmlEncode($this->Desc2->CurrentValue);
			$this->Desc2->PlaceHolder = RemoveHtml($this->Desc2->caption());

			// RptResult
			$this->RptResult->EditAttrs["class"] = "form-control";
			$this->RptResult->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->RptResult->CurrentValue = HtmlDecode($this->RptResult->CurrentValue);
			$this->RptResult->EditValue = HtmlEncode($this->RptResult->CurrentValue);
			$this->RptResult->PlaceHolder = RemoveHtml($this->RptResult->caption());

			// Add refer script
			// Branch

			$this->Branch->LinkCustomAttributes = "";
			$this->Branch->HrefValue = "";

			// SidNo
			$this->SidNo->LinkCustomAttributes = "";
			$this->SidNo->HrefValue = "";

			// SidDate
			$this->SidDate->LinkCustomAttributes = "";
			$this->SidDate->HrefValue = "";

			// TestCd
			$this->TestCd->LinkCustomAttributes = "";
			$this->TestCd->HrefValue = "";

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

			// ResultDate
			$this->ResultDate->LinkCustomAttributes = "";
			$this->ResultDate->HrefValue = "";

			// Comments
			$this->Comments->LinkCustomAttributes = "";
			$this->Comments->HrefValue = "";

			// Method
			$this->Method->LinkCustomAttributes = "";
			$this->Method->HrefValue = "";

			// Specimen
			$this->Specimen->LinkCustomAttributes = "";
			$this->Specimen->HrefValue = "";

			// Amount
			$this->Amount->LinkCustomAttributes = "";
			$this->Amount->HrefValue = "";

			// ResultBy
			$this->ResultBy->LinkCustomAttributes = "";
			$this->ResultBy->HrefValue = "";

			// AuthBy
			$this->AuthBy->LinkCustomAttributes = "";
			$this->AuthBy->HrefValue = "";

			// AuthDate
			$this->AuthDate->LinkCustomAttributes = "";
			$this->AuthDate->HrefValue = "";

			// Abnormal
			$this->Abnormal->LinkCustomAttributes = "";
			$this->Abnormal->HrefValue = "";

			// Printed
			$this->Printed->LinkCustomAttributes = "";
			$this->Printed->HrefValue = "";

			// Dispatch
			$this->Dispatch->LinkCustomAttributes = "";
			$this->Dispatch->HrefValue = "";

			// LOWHIGH
			$this->LOWHIGH->LinkCustomAttributes = "";
			$this->LOWHIGH->HrefValue = "";

			// RefValue
			$this->RefValue->LinkCustomAttributes = "";
			$this->RefValue->HrefValue = "";

			// Unit
			$this->Unit->LinkCustomAttributes = "";
			$this->Unit->HrefValue = "";

			// ResDate
			$this->ResDate->LinkCustomAttributes = "";
			$this->ResDate->HrefValue = "";

			// Pic1
			$this->Pic1->LinkCustomAttributes = "";
			$this->Pic1->HrefValue = "";

			// Pic2
			$this->Pic2->LinkCustomAttributes = "";
			$this->Pic2->HrefValue = "";

			// GraphPath
			$this->GraphPath->LinkCustomAttributes = "";
			$this->GraphPath->HrefValue = "";

			// SampleDate
			$this->SampleDate->LinkCustomAttributes = "";
			$this->SampleDate->HrefValue = "";

			// SampleUser
			$this->SampleUser->LinkCustomAttributes = "";
			$this->SampleUser->HrefValue = "";

			// ReceivedDate
			$this->ReceivedDate->LinkCustomAttributes = "";
			$this->ReceivedDate->HrefValue = "";

			// ReceivedUser
			$this->ReceivedUser->LinkCustomAttributes = "";
			$this->ReceivedUser->HrefValue = "";

			// DeptRecvDate
			$this->DeptRecvDate->LinkCustomAttributes = "";
			$this->DeptRecvDate->HrefValue = "";

			// DeptRecvUser
			$this->DeptRecvUser->LinkCustomAttributes = "";
			$this->DeptRecvUser->HrefValue = "";

			// PrintBy
			$this->PrintBy->LinkCustomAttributes = "";
			$this->PrintBy->HrefValue = "";

			// PrintDate
			$this->PrintDate->LinkCustomAttributes = "";
			$this->PrintDate->HrefValue = "";

			// MachineCD
			$this->MachineCD->LinkCustomAttributes = "";
			$this->MachineCD->HrefValue = "";

			// TestCancel
			$this->TestCancel->LinkCustomAttributes = "";
			$this->TestCancel->HrefValue = "";

			// OutSource
			$this->OutSource->LinkCustomAttributes = "";
			$this->OutSource->HrefValue = "";

			// Tariff
			$this->Tariff->LinkCustomAttributes = "";
			$this->Tariff->HrefValue = "";

			// EDITDATE
			$this->EDITDATE->LinkCustomAttributes = "";
			$this->EDITDATE->HrefValue = "";

			// UPLOAD
			$this->UPLOAD->LinkCustomAttributes = "";
			$this->UPLOAD->HrefValue = "";

			// SAuthDate
			$this->SAuthDate->LinkCustomAttributes = "";
			$this->SAuthDate->HrefValue = "";

			// SAuthBy
			$this->SAuthBy->LinkCustomAttributes = "";
			$this->SAuthBy->HrefValue = "";

			// NoRC
			$this->NoRC->LinkCustomAttributes = "";
			$this->NoRC->HrefValue = "";

			// DispDt
			$this->DispDt->LinkCustomAttributes = "";
			$this->DispDt->HrefValue = "";

			// DispUser
			$this->DispUser->LinkCustomAttributes = "";
			$this->DispUser->HrefValue = "";

			// DispRemarks
			$this->DispRemarks->LinkCustomAttributes = "";
			$this->DispRemarks->HrefValue = "";

			// DispMode
			$this->DispMode->LinkCustomAttributes = "";
			$this->DispMode->HrefValue = "";

			// ProductCD
			$this->ProductCD->LinkCustomAttributes = "";
			$this->ProductCD->HrefValue = "";

			// Nos
			$this->Nos->LinkCustomAttributes = "";
			$this->Nos->HrefValue = "";

			// WBCPath
			$this->WBCPath->LinkCustomAttributes = "";
			$this->WBCPath->HrefValue = "";

			// RBCPath
			$this->RBCPath->LinkCustomAttributes = "";
			$this->RBCPath->HrefValue = "";

			// PTPath
			$this->PTPath->LinkCustomAttributes = "";
			$this->PTPath->HrefValue = "";

			// ActualAmt
			$this->ActualAmt->LinkCustomAttributes = "";
			$this->ActualAmt->HrefValue = "";

			// NoSign
			$this->NoSign->LinkCustomAttributes = "";
			$this->NoSign->HrefValue = "";

			// Barcode
			$this->_Barcode->LinkCustomAttributes = "";
			$this->_Barcode->HrefValue = "";

			// ReadTime
			$this->ReadTime->LinkCustomAttributes = "";
			$this->ReadTime->HrefValue = "";

			// Result
			$this->Result->LinkCustomAttributes = "";
			$this->Result->HrefValue = "";

			// VailID
			$this->VailID->LinkCustomAttributes = "";
			$this->VailID->HrefValue = "";

			// ReadMachine
			$this->ReadMachine->LinkCustomAttributes = "";
			$this->ReadMachine->HrefValue = "";

			// LabCD
			$this->LabCD->LinkCustomAttributes = "";
			$this->LabCD->HrefValue = "";

			// OutLabAmt
			$this->OutLabAmt->LinkCustomAttributes = "";
			$this->OutLabAmt->HrefValue = "";

			// ProductQty
			$this->ProductQty->LinkCustomAttributes = "";
			$this->ProductQty->HrefValue = "";

			// Repeat
			$this->Repeat->LinkCustomAttributes = "";
			$this->Repeat->HrefValue = "";

			// DeptNo
			$this->DeptNo->LinkCustomAttributes = "";
			$this->DeptNo->HrefValue = "";

			// Desc1
			$this->Desc1->LinkCustomAttributes = "";
			$this->Desc1->HrefValue = "";

			// Desc2
			$this->Desc2->LinkCustomAttributes = "";
			$this->Desc2->HrefValue = "";

			// RptResult
			$this->RptResult->LinkCustomAttributes = "";
			$this->RptResult->HrefValue = "";
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
		if ($this->Branch->Required) {
			if (!$this->Branch->IsDetailKey && $this->Branch->FormValue != NULL && $this->Branch->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Branch->caption(), $this->Branch->RequiredErrorMessage));
			}
		}
		if ($this->SidNo->Required) {
			if (!$this->SidNo->IsDetailKey && $this->SidNo->FormValue != NULL && $this->SidNo->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->SidNo->caption(), $this->SidNo->RequiredErrorMessage));
			}
		}
		if ($this->SidDate->Required) {
			if (!$this->SidDate->IsDetailKey && $this->SidDate->FormValue != NULL && $this->SidDate->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->SidDate->caption(), $this->SidDate->RequiredErrorMessage));
			}
		}
		if (!CheckDate($this->SidDate->FormValue)) {
			AddMessage($FormError, $this->SidDate->errorMessage());
		}
		if ($this->TestCd->Required) {
			if (!$this->TestCd->IsDetailKey && $this->TestCd->FormValue != NULL && $this->TestCd->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->TestCd->caption(), $this->TestCd->RequiredErrorMessage));
			}
		}
		if ($this->TestSubCd->Required) {
			if (!$this->TestSubCd->IsDetailKey && $this->TestSubCd->FormValue != NULL && $this->TestSubCd->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->TestSubCd->caption(), $this->TestSubCd->RequiredErrorMessage));
			}
		}
		if ($this->DEptCd->Required) {
			if (!$this->DEptCd->IsDetailKey && $this->DEptCd->FormValue != NULL && $this->DEptCd->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->DEptCd->caption(), $this->DEptCd->RequiredErrorMessage));
			}
		}
		if ($this->ProfCd->Required) {
			if (!$this->ProfCd->IsDetailKey && $this->ProfCd->FormValue != NULL && $this->ProfCd->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->ProfCd->caption(), $this->ProfCd->RequiredErrorMessage));
			}
		}
		if ($this->LabReport->Required) {
			if (!$this->LabReport->IsDetailKey && $this->LabReport->FormValue != NULL && $this->LabReport->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->LabReport->caption(), $this->LabReport->RequiredErrorMessage));
			}
		}
		if ($this->ResultDate->Required) {
			if (!$this->ResultDate->IsDetailKey && $this->ResultDate->FormValue != NULL && $this->ResultDate->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->ResultDate->caption(), $this->ResultDate->RequiredErrorMessage));
			}
		}
		if (!CheckDate($this->ResultDate->FormValue)) {
			AddMessage($FormError, $this->ResultDate->errorMessage());
		}
		if ($this->Comments->Required) {
			if (!$this->Comments->IsDetailKey && $this->Comments->FormValue != NULL && $this->Comments->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Comments->caption(), $this->Comments->RequiredErrorMessage));
			}
		}
		if ($this->Method->Required) {
			if (!$this->Method->IsDetailKey && $this->Method->FormValue != NULL && $this->Method->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Method->caption(), $this->Method->RequiredErrorMessage));
			}
		}
		if ($this->Specimen->Required) {
			if (!$this->Specimen->IsDetailKey && $this->Specimen->FormValue != NULL && $this->Specimen->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Specimen->caption(), $this->Specimen->RequiredErrorMessage));
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
		if ($this->ResultBy->Required) {
			if (!$this->ResultBy->IsDetailKey && $this->ResultBy->FormValue != NULL && $this->ResultBy->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->ResultBy->caption(), $this->ResultBy->RequiredErrorMessage));
			}
		}
		if ($this->AuthBy->Required) {
			if (!$this->AuthBy->IsDetailKey && $this->AuthBy->FormValue != NULL && $this->AuthBy->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->AuthBy->caption(), $this->AuthBy->RequiredErrorMessage));
			}
		}
		if ($this->AuthDate->Required) {
			if (!$this->AuthDate->IsDetailKey && $this->AuthDate->FormValue != NULL && $this->AuthDate->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->AuthDate->caption(), $this->AuthDate->RequiredErrorMessage));
			}
		}
		if (!CheckDate($this->AuthDate->FormValue)) {
			AddMessage($FormError, $this->AuthDate->errorMessage());
		}
		if ($this->Abnormal->Required) {
			if (!$this->Abnormal->IsDetailKey && $this->Abnormal->FormValue != NULL && $this->Abnormal->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Abnormal->caption(), $this->Abnormal->RequiredErrorMessage));
			}
		}
		if ($this->Printed->Required) {
			if (!$this->Printed->IsDetailKey && $this->Printed->FormValue != NULL && $this->Printed->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Printed->caption(), $this->Printed->RequiredErrorMessage));
			}
		}
		if ($this->Dispatch->Required) {
			if (!$this->Dispatch->IsDetailKey && $this->Dispatch->FormValue != NULL && $this->Dispatch->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Dispatch->caption(), $this->Dispatch->RequiredErrorMessage));
			}
		}
		if ($this->LOWHIGH->Required) {
			if (!$this->LOWHIGH->IsDetailKey && $this->LOWHIGH->FormValue != NULL && $this->LOWHIGH->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->LOWHIGH->caption(), $this->LOWHIGH->RequiredErrorMessage));
			}
		}
		if ($this->RefValue->Required) {
			if (!$this->RefValue->IsDetailKey && $this->RefValue->FormValue != NULL && $this->RefValue->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->RefValue->caption(), $this->RefValue->RequiredErrorMessage));
			}
		}
		if ($this->Unit->Required) {
			if (!$this->Unit->IsDetailKey && $this->Unit->FormValue != NULL && $this->Unit->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Unit->caption(), $this->Unit->RequiredErrorMessage));
			}
		}
		if ($this->ResDate->Required) {
			if (!$this->ResDate->IsDetailKey && $this->ResDate->FormValue != NULL && $this->ResDate->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->ResDate->caption(), $this->ResDate->RequiredErrorMessage));
			}
		}
		if (!CheckDate($this->ResDate->FormValue)) {
			AddMessage($FormError, $this->ResDate->errorMessage());
		}
		if ($this->Pic1->Required) {
			if (!$this->Pic1->IsDetailKey && $this->Pic1->FormValue != NULL && $this->Pic1->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Pic1->caption(), $this->Pic1->RequiredErrorMessage));
			}
		}
		if ($this->Pic2->Required) {
			if (!$this->Pic2->IsDetailKey && $this->Pic2->FormValue != NULL && $this->Pic2->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Pic2->caption(), $this->Pic2->RequiredErrorMessage));
			}
		}
		if ($this->GraphPath->Required) {
			if (!$this->GraphPath->IsDetailKey && $this->GraphPath->FormValue != NULL && $this->GraphPath->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->GraphPath->caption(), $this->GraphPath->RequiredErrorMessage));
			}
		}
		if ($this->SampleDate->Required) {
			if (!$this->SampleDate->IsDetailKey && $this->SampleDate->FormValue != NULL && $this->SampleDate->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->SampleDate->caption(), $this->SampleDate->RequiredErrorMessage));
			}
		}
		if (!CheckDate($this->SampleDate->FormValue)) {
			AddMessage($FormError, $this->SampleDate->errorMessage());
		}
		if ($this->SampleUser->Required) {
			if (!$this->SampleUser->IsDetailKey && $this->SampleUser->FormValue != NULL && $this->SampleUser->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->SampleUser->caption(), $this->SampleUser->RequiredErrorMessage));
			}
		}
		if ($this->ReceivedDate->Required) {
			if (!$this->ReceivedDate->IsDetailKey && $this->ReceivedDate->FormValue != NULL && $this->ReceivedDate->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->ReceivedDate->caption(), $this->ReceivedDate->RequiredErrorMessage));
			}
		}
		if (!CheckDate($this->ReceivedDate->FormValue)) {
			AddMessage($FormError, $this->ReceivedDate->errorMessage());
		}
		if ($this->ReceivedUser->Required) {
			if (!$this->ReceivedUser->IsDetailKey && $this->ReceivedUser->FormValue != NULL && $this->ReceivedUser->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->ReceivedUser->caption(), $this->ReceivedUser->RequiredErrorMessage));
			}
		}
		if ($this->DeptRecvDate->Required) {
			if (!$this->DeptRecvDate->IsDetailKey && $this->DeptRecvDate->FormValue != NULL && $this->DeptRecvDate->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->DeptRecvDate->caption(), $this->DeptRecvDate->RequiredErrorMessage));
			}
		}
		if (!CheckDate($this->DeptRecvDate->FormValue)) {
			AddMessage($FormError, $this->DeptRecvDate->errorMessage());
		}
		if ($this->DeptRecvUser->Required) {
			if (!$this->DeptRecvUser->IsDetailKey && $this->DeptRecvUser->FormValue != NULL && $this->DeptRecvUser->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->DeptRecvUser->caption(), $this->DeptRecvUser->RequiredErrorMessage));
			}
		}
		if ($this->PrintBy->Required) {
			if (!$this->PrintBy->IsDetailKey && $this->PrintBy->FormValue != NULL && $this->PrintBy->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PrintBy->caption(), $this->PrintBy->RequiredErrorMessage));
			}
		}
		if ($this->PrintDate->Required) {
			if (!$this->PrintDate->IsDetailKey && $this->PrintDate->FormValue != NULL && $this->PrintDate->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PrintDate->caption(), $this->PrintDate->RequiredErrorMessage));
			}
		}
		if (!CheckDate($this->PrintDate->FormValue)) {
			AddMessage($FormError, $this->PrintDate->errorMessage());
		}
		if ($this->MachineCD->Required) {
			if (!$this->MachineCD->IsDetailKey && $this->MachineCD->FormValue != NULL && $this->MachineCD->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->MachineCD->caption(), $this->MachineCD->RequiredErrorMessage));
			}
		}
		if ($this->TestCancel->Required) {
			if (!$this->TestCancel->IsDetailKey && $this->TestCancel->FormValue != NULL && $this->TestCancel->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->TestCancel->caption(), $this->TestCancel->RequiredErrorMessage));
			}
		}
		if ($this->OutSource->Required) {
			if (!$this->OutSource->IsDetailKey && $this->OutSource->FormValue != NULL && $this->OutSource->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->OutSource->caption(), $this->OutSource->RequiredErrorMessage));
			}
		}
		if ($this->Tariff->Required) {
			if (!$this->Tariff->IsDetailKey && $this->Tariff->FormValue != NULL && $this->Tariff->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Tariff->caption(), $this->Tariff->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->Tariff->FormValue)) {
			AddMessage($FormError, $this->Tariff->errorMessage());
		}
		if ($this->EDITDATE->Required) {
			if (!$this->EDITDATE->IsDetailKey && $this->EDITDATE->FormValue != NULL && $this->EDITDATE->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->EDITDATE->caption(), $this->EDITDATE->RequiredErrorMessage));
			}
		}
		if (!CheckDate($this->EDITDATE->FormValue)) {
			AddMessage($FormError, $this->EDITDATE->errorMessage());
		}
		if ($this->UPLOAD->Required) {
			if (!$this->UPLOAD->IsDetailKey && $this->UPLOAD->FormValue != NULL && $this->UPLOAD->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->UPLOAD->caption(), $this->UPLOAD->RequiredErrorMessage));
			}
		}
		if ($this->SAuthDate->Required) {
			if (!$this->SAuthDate->IsDetailKey && $this->SAuthDate->FormValue != NULL && $this->SAuthDate->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->SAuthDate->caption(), $this->SAuthDate->RequiredErrorMessage));
			}
		}
		if (!CheckDate($this->SAuthDate->FormValue)) {
			AddMessage($FormError, $this->SAuthDate->errorMessage());
		}
		if ($this->SAuthBy->Required) {
			if (!$this->SAuthBy->IsDetailKey && $this->SAuthBy->FormValue != NULL && $this->SAuthBy->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->SAuthBy->caption(), $this->SAuthBy->RequiredErrorMessage));
			}
		}
		if ($this->NoRC->Required) {
			if (!$this->NoRC->IsDetailKey && $this->NoRC->FormValue != NULL && $this->NoRC->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->NoRC->caption(), $this->NoRC->RequiredErrorMessage));
			}
		}
		if ($this->DispDt->Required) {
			if (!$this->DispDt->IsDetailKey && $this->DispDt->FormValue != NULL && $this->DispDt->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->DispDt->caption(), $this->DispDt->RequiredErrorMessage));
			}
		}
		if (!CheckDate($this->DispDt->FormValue)) {
			AddMessage($FormError, $this->DispDt->errorMessage());
		}
		if ($this->DispUser->Required) {
			if (!$this->DispUser->IsDetailKey && $this->DispUser->FormValue != NULL && $this->DispUser->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->DispUser->caption(), $this->DispUser->RequiredErrorMessage));
			}
		}
		if ($this->DispRemarks->Required) {
			if (!$this->DispRemarks->IsDetailKey && $this->DispRemarks->FormValue != NULL && $this->DispRemarks->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->DispRemarks->caption(), $this->DispRemarks->RequiredErrorMessage));
			}
		}
		if ($this->DispMode->Required) {
			if (!$this->DispMode->IsDetailKey && $this->DispMode->FormValue != NULL && $this->DispMode->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->DispMode->caption(), $this->DispMode->RequiredErrorMessage));
			}
		}
		if ($this->ProductCD->Required) {
			if (!$this->ProductCD->IsDetailKey && $this->ProductCD->FormValue != NULL && $this->ProductCD->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->ProductCD->caption(), $this->ProductCD->RequiredErrorMessage));
			}
		}
		if ($this->Nos->Required) {
			if (!$this->Nos->IsDetailKey && $this->Nos->FormValue != NULL && $this->Nos->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Nos->caption(), $this->Nos->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->Nos->FormValue)) {
			AddMessage($FormError, $this->Nos->errorMessage());
		}
		if ($this->WBCPath->Required) {
			if (!$this->WBCPath->IsDetailKey && $this->WBCPath->FormValue != NULL && $this->WBCPath->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->WBCPath->caption(), $this->WBCPath->RequiredErrorMessage));
			}
		}
		if ($this->RBCPath->Required) {
			if (!$this->RBCPath->IsDetailKey && $this->RBCPath->FormValue != NULL && $this->RBCPath->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->RBCPath->caption(), $this->RBCPath->RequiredErrorMessage));
			}
		}
		if ($this->PTPath->Required) {
			if (!$this->PTPath->IsDetailKey && $this->PTPath->FormValue != NULL && $this->PTPath->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PTPath->caption(), $this->PTPath->RequiredErrorMessage));
			}
		}
		if ($this->ActualAmt->Required) {
			if (!$this->ActualAmt->IsDetailKey && $this->ActualAmt->FormValue != NULL && $this->ActualAmt->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->ActualAmt->caption(), $this->ActualAmt->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->ActualAmt->FormValue)) {
			AddMessage($FormError, $this->ActualAmt->errorMessage());
		}
		if ($this->NoSign->Required) {
			if (!$this->NoSign->IsDetailKey && $this->NoSign->FormValue != NULL && $this->NoSign->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->NoSign->caption(), $this->NoSign->RequiredErrorMessage));
			}
		}
		if ($this->_Barcode->Required) {
			if (!$this->_Barcode->IsDetailKey && $this->_Barcode->FormValue != NULL && $this->_Barcode->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->_Barcode->caption(), $this->_Barcode->RequiredErrorMessage));
			}
		}
		if ($this->ReadTime->Required) {
			if (!$this->ReadTime->IsDetailKey && $this->ReadTime->FormValue != NULL && $this->ReadTime->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->ReadTime->caption(), $this->ReadTime->RequiredErrorMessage));
			}
		}
		if (!CheckDate($this->ReadTime->FormValue)) {
			AddMessage($FormError, $this->ReadTime->errorMessage());
		}
		if ($this->Result->Required) {
			if (!$this->Result->IsDetailKey && $this->Result->FormValue != NULL && $this->Result->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Result->caption(), $this->Result->RequiredErrorMessage));
			}
		}
		if ($this->VailID->Required) {
			if (!$this->VailID->IsDetailKey && $this->VailID->FormValue != NULL && $this->VailID->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->VailID->caption(), $this->VailID->RequiredErrorMessage));
			}
		}
		if ($this->ReadMachine->Required) {
			if (!$this->ReadMachine->IsDetailKey && $this->ReadMachine->FormValue != NULL && $this->ReadMachine->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->ReadMachine->caption(), $this->ReadMachine->RequiredErrorMessage));
			}
		}
		if ($this->LabCD->Required) {
			if (!$this->LabCD->IsDetailKey && $this->LabCD->FormValue != NULL && $this->LabCD->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->LabCD->caption(), $this->LabCD->RequiredErrorMessage));
			}
		}
		if ($this->OutLabAmt->Required) {
			if (!$this->OutLabAmt->IsDetailKey && $this->OutLabAmt->FormValue != NULL && $this->OutLabAmt->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->OutLabAmt->caption(), $this->OutLabAmt->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->OutLabAmt->FormValue)) {
			AddMessage($FormError, $this->OutLabAmt->errorMessage());
		}
		if ($this->ProductQty->Required) {
			if (!$this->ProductQty->IsDetailKey && $this->ProductQty->FormValue != NULL && $this->ProductQty->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->ProductQty->caption(), $this->ProductQty->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->ProductQty->FormValue)) {
			AddMessage($FormError, $this->ProductQty->errorMessage());
		}
		if ($this->Repeat->Required) {
			if (!$this->Repeat->IsDetailKey && $this->Repeat->FormValue != NULL && $this->Repeat->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Repeat->caption(), $this->Repeat->RequiredErrorMessage));
			}
		}
		if ($this->DeptNo->Required) {
			if (!$this->DeptNo->IsDetailKey && $this->DeptNo->FormValue != NULL && $this->DeptNo->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->DeptNo->caption(), $this->DeptNo->RequiredErrorMessage));
			}
		}
		if ($this->Desc1->Required) {
			if (!$this->Desc1->IsDetailKey && $this->Desc1->FormValue != NULL && $this->Desc1->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Desc1->caption(), $this->Desc1->RequiredErrorMessage));
			}
		}
		if ($this->Desc2->Required) {
			if (!$this->Desc2->IsDetailKey && $this->Desc2->FormValue != NULL && $this->Desc2->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Desc2->caption(), $this->Desc2->RequiredErrorMessage));
			}
		}
		if ($this->RptResult->Required) {
			if (!$this->RptResult->IsDetailKey && $this->RptResult->FormValue != NULL && $this->RptResult->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->RptResult->caption(), $this->RptResult->RequiredErrorMessage));
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

		// Branch
		$this->Branch->setDbValueDef($rsnew, $this->Branch->CurrentValue, "", FALSE);

		// SidNo
		$this->SidNo->setDbValueDef($rsnew, $this->SidNo->CurrentValue, "", FALSE);

		// SidDate
		$this->SidDate->setDbValueDef($rsnew, UnFormatDateTime($this->SidDate->CurrentValue, 0), NULL, FALSE);

		// TestCd
		$this->TestCd->setDbValueDef($rsnew, $this->TestCd->CurrentValue, "", FALSE);

		// TestSubCd
		$this->TestSubCd->setDbValueDef($rsnew, $this->TestSubCd->CurrentValue, "", FALSE);

		// DEptCd
		$this->DEptCd->setDbValueDef($rsnew, $this->DEptCd->CurrentValue, "", FALSE);

		// ProfCd
		$this->ProfCd->setDbValueDef($rsnew, $this->ProfCd->CurrentValue, "", FALSE);

		// LabReport
		$this->LabReport->setDbValueDef($rsnew, $this->LabReport->CurrentValue, "", FALSE);

		// ResultDate
		$this->ResultDate->setDbValueDef($rsnew, UnFormatDateTime($this->ResultDate->CurrentValue, 0), NULL, FALSE);

		// Comments
		$this->Comments->setDbValueDef($rsnew, $this->Comments->CurrentValue, "", FALSE);

		// Method
		$this->Method->setDbValueDef($rsnew, $this->Method->CurrentValue, "", FALSE);

		// Specimen
		$this->Specimen->setDbValueDef($rsnew, $this->Specimen->CurrentValue, "", FALSE);

		// Amount
		$this->Amount->setDbValueDef($rsnew, $this->Amount->CurrentValue, 0, FALSE);

		// ResultBy
		$this->ResultBy->setDbValueDef($rsnew, $this->ResultBy->CurrentValue, "", FALSE);

		// AuthBy
		$this->AuthBy->setDbValueDef($rsnew, $this->AuthBy->CurrentValue, "", FALSE);

		// AuthDate
		$this->AuthDate->setDbValueDef($rsnew, UnFormatDateTime($this->AuthDate->CurrentValue, 0), NULL, FALSE);

		// Abnormal
		$this->Abnormal->setDbValueDef($rsnew, $this->Abnormal->CurrentValue, "", FALSE);

		// Printed
		$this->Printed->setDbValueDef($rsnew, $this->Printed->CurrentValue, "", FALSE);

		// Dispatch
		$this->Dispatch->setDbValueDef($rsnew, $this->Dispatch->CurrentValue, "", FALSE);

		// LOWHIGH
		$this->LOWHIGH->setDbValueDef($rsnew, $this->LOWHIGH->CurrentValue, "", FALSE);

		// RefValue
		$this->RefValue->setDbValueDef($rsnew, $this->RefValue->CurrentValue, "", FALSE);

		// Unit
		$this->Unit->setDbValueDef($rsnew, $this->Unit->CurrentValue, "", FALSE);

		// ResDate
		$this->ResDate->setDbValueDef($rsnew, UnFormatDateTime($this->ResDate->CurrentValue, 0), NULL, FALSE);

		// Pic1
		$this->Pic1->setDbValueDef($rsnew, $this->Pic1->CurrentValue, "", FALSE);

		// Pic2
		$this->Pic2->setDbValueDef($rsnew, $this->Pic2->CurrentValue, "", FALSE);

		// GraphPath
		$this->GraphPath->setDbValueDef($rsnew, $this->GraphPath->CurrentValue, "", FALSE);

		// SampleDate
		$this->SampleDate->setDbValueDef($rsnew, UnFormatDateTime($this->SampleDate->CurrentValue, 0), NULL, FALSE);

		// SampleUser
		$this->SampleUser->setDbValueDef($rsnew, $this->SampleUser->CurrentValue, "", FALSE);

		// ReceivedDate
		$this->ReceivedDate->setDbValueDef($rsnew, UnFormatDateTime($this->ReceivedDate->CurrentValue, 0), NULL, FALSE);

		// ReceivedUser
		$this->ReceivedUser->setDbValueDef($rsnew, $this->ReceivedUser->CurrentValue, "", FALSE);

		// DeptRecvDate
		$this->DeptRecvDate->setDbValueDef($rsnew, UnFormatDateTime($this->DeptRecvDate->CurrentValue, 0), NULL, FALSE);

		// DeptRecvUser
		$this->DeptRecvUser->setDbValueDef($rsnew, $this->DeptRecvUser->CurrentValue, "", FALSE);

		// PrintBy
		$this->PrintBy->setDbValueDef($rsnew, $this->PrintBy->CurrentValue, "", FALSE);

		// PrintDate
		$this->PrintDate->setDbValueDef($rsnew, UnFormatDateTime($this->PrintDate->CurrentValue, 0), NULL, FALSE);

		// MachineCD
		$this->MachineCD->setDbValueDef($rsnew, $this->MachineCD->CurrentValue, "", FALSE);

		// TestCancel
		$this->TestCancel->setDbValueDef($rsnew, $this->TestCancel->CurrentValue, "", FALSE);

		// OutSource
		$this->OutSource->setDbValueDef($rsnew, $this->OutSource->CurrentValue, "", FALSE);

		// Tariff
		$this->Tariff->setDbValueDef($rsnew, $this->Tariff->CurrentValue, 0, FALSE);

		// EDITDATE
		$this->EDITDATE->setDbValueDef($rsnew, UnFormatDateTime($this->EDITDATE->CurrentValue, 0), NULL, FALSE);

		// UPLOAD
		$this->UPLOAD->setDbValueDef($rsnew, $this->UPLOAD->CurrentValue, "", FALSE);

		// SAuthDate
		$this->SAuthDate->setDbValueDef($rsnew, UnFormatDateTime($this->SAuthDate->CurrentValue, 0), NULL, FALSE);

		// SAuthBy
		$this->SAuthBy->setDbValueDef($rsnew, $this->SAuthBy->CurrentValue, "", FALSE);

		// NoRC
		$this->NoRC->setDbValueDef($rsnew, $this->NoRC->CurrentValue, "", FALSE);

		// DispDt
		$this->DispDt->setDbValueDef($rsnew, UnFormatDateTime($this->DispDt->CurrentValue, 0), NULL, FALSE);

		// DispUser
		$this->DispUser->setDbValueDef($rsnew, $this->DispUser->CurrentValue, "", FALSE);

		// DispRemarks
		$this->DispRemarks->setDbValueDef($rsnew, $this->DispRemarks->CurrentValue, "", FALSE);

		// DispMode
		$this->DispMode->setDbValueDef($rsnew, $this->DispMode->CurrentValue, "", FALSE);

		// ProductCD
		$this->ProductCD->setDbValueDef($rsnew, $this->ProductCD->CurrentValue, "", FALSE);

		// Nos
		$this->Nos->setDbValueDef($rsnew, $this->Nos->CurrentValue, NULL, FALSE);

		// WBCPath
		$this->WBCPath->setDbValueDef($rsnew, $this->WBCPath->CurrentValue, "", FALSE);

		// RBCPath
		$this->RBCPath->setDbValueDef($rsnew, $this->RBCPath->CurrentValue, "", FALSE);

		// PTPath
		$this->PTPath->setDbValueDef($rsnew, $this->PTPath->CurrentValue, "", FALSE);

		// ActualAmt
		$this->ActualAmt->setDbValueDef($rsnew, $this->ActualAmt->CurrentValue, 0, FALSE);

		// NoSign
		$this->NoSign->setDbValueDef($rsnew, $this->NoSign->CurrentValue, "", FALSE);

		// Barcode
		$this->_Barcode->setDbValueDef($rsnew, $this->_Barcode->CurrentValue, "", FALSE);

		// ReadTime
		$this->ReadTime->setDbValueDef($rsnew, UnFormatDateTime($this->ReadTime->CurrentValue, 0), NULL, FALSE);

		// Result
		$this->Result->setDbValueDef($rsnew, $this->Result->CurrentValue, "", FALSE);

		// VailID
		$this->VailID->setDbValueDef($rsnew, $this->VailID->CurrentValue, "", FALSE);

		// ReadMachine
		$this->ReadMachine->setDbValueDef($rsnew, $this->ReadMachine->CurrentValue, "", FALSE);

		// LabCD
		$this->LabCD->setDbValueDef($rsnew, $this->LabCD->CurrentValue, "", FALSE);

		// OutLabAmt
		$this->OutLabAmt->setDbValueDef($rsnew, $this->OutLabAmt->CurrentValue, 0, FALSE);

		// ProductQty
		$this->ProductQty->setDbValueDef($rsnew, $this->ProductQty->CurrentValue, 0, FALSE);

		// Repeat
		$this->Repeat->setDbValueDef($rsnew, $this->Repeat->CurrentValue, "", FALSE);

		// DeptNo
		$this->DeptNo->setDbValueDef($rsnew, $this->DeptNo->CurrentValue, "", FALSE);

		// Desc1
		$this->Desc1->setDbValueDef($rsnew, $this->Desc1->CurrentValue, "", FALSE);

		// Desc2
		$this->Desc2->setDbValueDef($rsnew, $this->Desc2->CurrentValue, "", FALSE);

		// RptResult
		$this->RptResult->setDbValueDef($rsnew, $this->RptResult->CurrentValue, "", FALSE);

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
		$Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("lab_test_resultlist.php"), "", $this->TableVar, TRUE);
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
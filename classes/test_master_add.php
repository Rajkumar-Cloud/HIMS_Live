<?php
namespace PHPMaker2019\HIMS;

/**
 * Page class
 */
class test_master_add extends test_master
{

	// Page ID
	public $PageID = "add";

	// Project ID
	public $ProjectID = "{EA4F6D13-AF8F-428D-9EA7-BA88D1107EC3}";

	// Table name
	public $TableName = 'test_master';

	// Page object name
	public $PageObjName = "test_master_add";

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

		// Table object (test_master)
		if (!isset($GLOBALS["test_master"]) || get_class($GLOBALS["test_master"]) == PROJECT_NAMESPACE . "test_master") {
			$GLOBALS["test_master"] = &$this;
			$GLOBALS["Table"] = &$GLOBALS["test_master"];
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
			define(PROJECT_NAMESPACE . "TABLE_NAME", 'test_master');

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
		global $EXPORT, $test_master;
		if ($this->CustomExport && $this->CustomExport == $this->Export && array_key_exists($this->CustomExport, $EXPORT)) {
				$content = ob_get_contents();
			if ($ExportFileName == "")
				$ExportFileName = $this->TableVar;
			$class = PROJECT_NAMESPACE . $EXPORT[$this->CustomExport];
			if (class_exists($class)) {
				$doc = new $class($test_master);
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
					if ($pageName == "test_masterview.php")
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
					$this->terminate(GetUrl("test_masterlist.php"));
				else
					$this->terminate(GetUrl("login.php"));
				return;
			}
		}

		// Create form object
		$CurrentForm = new HttpForm();
		$this->CurrentAction = Param("action"); // Set up current action
		$this->id->Visible = FALSE;
		$this->MainDeptCd->setVisibility();
		$this->DeptCd->setVisibility();
		$this->TestCd->setVisibility();
		$this->TestSubCd->setVisibility();
		$this->TestName->setVisibility();
		$this->XrayPart->setVisibility();
		$this->Method->setVisibility();
		$this->Order->setVisibility();
		$this->Form->setVisibility();
		$this->Amt->setVisibility();
		$this->SplAmt->setVisibility();
		$this->ResType->setVisibility();
		$this->UnitCD->setVisibility();
		$this->RefValue->setVisibility();
		$this->Sample->setVisibility();
		$this->NoD->setVisibility();
		$this->BillOrder->setVisibility();
		$this->Formula->setVisibility();
		$this->Inactive->setVisibility();
		$this->ReagentAmt->setVisibility();
		$this->LabAmt->setVisibility();
		$this->RefAmt->setVisibility();
		$this->CreFrom->setVisibility();
		$this->CreTo->setVisibility();
		$this->Note->setVisibility();
		$this->Sun->setVisibility();
		$this->Mon->setVisibility();
		$this->Tue->setVisibility();
		$this->Wed->setVisibility();
		$this->Thi->setVisibility();
		$this->Fri->setVisibility();
		$this->Sat->setVisibility();
		$this->Days->setVisibility();
		$this->Cutoff->setVisibility();
		$this->FontBold->setVisibility();
		$this->TestHeading->setVisibility();
		$this->Outsource->setVisibility();
		$this->NoResult->setVisibility();
		$this->GraphLow->setVisibility();
		$this->GraphHigh->setVisibility();
		$this->CollSample->setVisibility();
		$this->ProcessTime->setVisibility();
		$this->TamilName->setVisibility();
		$this->ShortName->setVisibility();
		$this->Individual->setVisibility();
		$this->PrevAmt->setVisibility();
		$this->PrevSplAmt->setVisibility();
		$this->Remarks->setVisibility();
		$this->EditDate->setVisibility();
		$this->BillName->setVisibility();
		$this->ActualAmt->setVisibility();
		$this->HISCD->setVisibility();
		$this->PriceList->setVisibility();
		$this->IPAmt->setVisibility();
		$this->InsAmt->setVisibility();
		$this->ManualCD->setVisibility();
		$this->Free->setVisibility();
		$this->AutoAuth->setVisibility();
		$this->ProductCD->setVisibility();
		$this->Inventory->setVisibility();
		$this->IntimateTest->setVisibility();
		$this->Manual->setVisibility();
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
					$this->terminate("test_masterlist.php"); // No matching record, return to list
				}
				break;
			case "insert": // Add new record
				$this->SendEmail = TRUE; // Send email on add success
				if ($this->addRow($this->OldRecordset)) { // Add successful
					if ($this->getSuccessMessage() == "")
						$this->setSuccessMessage($Language->phrase("AddSuccess")); // Set up success message
					$returnUrl = $this->getReturnUrl();
					if (GetPageName($returnUrl) == "test_masterlist.php")
						$returnUrl = $this->addMasterUrl($returnUrl); // List page, return to List page with correct master key if necessary
					elseif (GetPageName($returnUrl) == "test_masterview.php")
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
		$this->MainDeptCd->CurrentValue = NULL;
		$this->MainDeptCd->OldValue = $this->MainDeptCd->CurrentValue;
		$this->DeptCd->CurrentValue = NULL;
		$this->DeptCd->OldValue = $this->DeptCd->CurrentValue;
		$this->TestCd->CurrentValue = NULL;
		$this->TestCd->OldValue = $this->TestCd->CurrentValue;
		$this->TestSubCd->CurrentValue = NULL;
		$this->TestSubCd->OldValue = $this->TestSubCd->CurrentValue;
		$this->TestName->CurrentValue = NULL;
		$this->TestName->OldValue = $this->TestName->CurrentValue;
		$this->XrayPart->CurrentValue = NULL;
		$this->XrayPart->OldValue = $this->XrayPart->CurrentValue;
		$this->Method->CurrentValue = NULL;
		$this->Method->OldValue = $this->Method->CurrentValue;
		$this->Order->CurrentValue = NULL;
		$this->Order->OldValue = $this->Order->CurrentValue;
		$this->Form->CurrentValue = NULL;
		$this->Form->OldValue = $this->Form->CurrentValue;
		$this->Amt->CurrentValue = NULL;
		$this->Amt->OldValue = $this->Amt->CurrentValue;
		$this->SplAmt->CurrentValue = NULL;
		$this->SplAmt->OldValue = $this->SplAmt->CurrentValue;
		$this->ResType->CurrentValue = NULL;
		$this->ResType->OldValue = $this->ResType->CurrentValue;
		$this->UnitCD->CurrentValue = NULL;
		$this->UnitCD->OldValue = $this->UnitCD->CurrentValue;
		$this->RefValue->CurrentValue = NULL;
		$this->RefValue->OldValue = $this->RefValue->CurrentValue;
		$this->Sample->CurrentValue = NULL;
		$this->Sample->OldValue = $this->Sample->CurrentValue;
		$this->NoD->CurrentValue = NULL;
		$this->NoD->OldValue = $this->NoD->CurrentValue;
		$this->BillOrder->CurrentValue = NULL;
		$this->BillOrder->OldValue = $this->BillOrder->CurrentValue;
		$this->Formula->CurrentValue = NULL;
		$this->Formula->OldValue = $this->Formula->CurrentValue;
		$this->Inactive->CurrentValue = NULL;
		$this->Inactive->OldValue = $this->Inactive->CurrentValue;
		$this->ReagentAmt->CurrentValue = NULL;
		$this->ReagentAmt->OldValue = $this->ReagentAmt->CurrentValue;
		$this->LabAmt->CurrentValue = NULL;
		$this->LabAmt->OldValue = $this->LabAmt->CurrentValue;
		$this->RefAmt->CurrentValue = NULL;
		$this->RefAmt->OldValue = $this->RefAmt->CurrentValue;
		$this->CreFrom->CurrentValue = NULL;
		$this->CreFrom->OldValue = $this->CreFrom->CurrentValue;
		$this->CreTo->CurrentValue = NULL;
		$this->CreTo->OldValue = $this->CreTo->CurrentValue;
		$this->Note->CurrentValue = NULL;
		$this->Note->OldValue = $this->Note->CurrentValue;
		$this->Sun->CurrentValue = NULL;
		$this->Sun->OldValue = $this->Sun->CurrentValue;
		$this->Mon->CurrentValue = NULL;
		$this->Mon->OldValue = $this->Mon->CurrentValue;
		$this->Tue->CurrentValue = NULL;
		$this->Tue->OldValue = $this->Tue->CurrentValue;
		$this->Wed->CurrentValue = NULL;
		$this->Wed->OldValue = $this->Wed->CurrentValue;
		$this->Thi->CurrentValue = NULL;
		$this->Thi->OldValue = $this->Thi->CurrentValue;
		$this->Fri->CurrentValue = NULL;
		$this->Fri->OldValue = $this->Fri->CurrentValue;
		$this->Sat->CurrentValue = NULL;
		$this->Sat->OldValue = $this->Sat->CurrentValue;
		$this->Days->CurrentValue = NULL;
		$this->Days->OldValue = $this->Days->CurrentValue;
		$this->Cutoff->CurrentValue = NULL;
		$this->Cutoff->OldValue = $this->Cutoff->CurrentValue;
		$this->FontBold->CurrentValue = NULL;
		$this->FontBold->OldValue = $this->FontBold->CurrentValue;
		$this->TestHeading->CurrentValue = NULL;
		$this->TestHeading->OldValue = $this->TestHeading->CurrentValue;
		$this->Outsource->CurrentValue = NULL;
		$this->Outsource->OldValue = $this->Outsource->CurrentValue;
		$this->NoResult->CurrentValue = NULL;
		$this->NoResult->OldValue = $this->NoResult->CurrentValue;
		$this->GraphLow->CurrentValue = NULL;
		$this->GraphLow->OldValue = $this->GraphLow->CurrentValue;
		$this->GraphHigh->CurrentValue = NULL;
		$this->GraphHigh->OldValue = $this->GraphHigh->CurrentValue;
		$this->CollSample->CurrentValue = NULL;
		$this->CollSample->OldValue = $this->CollSample->CurrentValue;
		$this->ProcessTime->CurrentValue = NULL;
		$this->ProcessTime->OldValue = $this->ProcessTime->CurrentValue;
		$this->TamilName->CurrentValue = NULL;
		$this->TamilName->OldValue = $this->TamilName->CurrentValue;
		$this->ShortName->CurrentValue = NULL;
		$this->ShortName->OldValue = $this->ShortName->CurrentValue;
		$this->Individual->CurrentValue = NULL;
		$this->Individual->OldValue = $this->Individual->CurrentValue;
		$this->PrevAmt->CurrentValue = NULL;
		$this->PrevAmt->OldValue = $this->PrevAmt->CurrentValue;
		$this->PrevSplAmt->CurrentValue = NULL;
		$this->PrevSplAmt->OldValue = $this->PrevSplAmt->CurrentValue;
		$this->Remarks->CurrentValue = NULL;
		$this->Remarks->OldValue = $this->Remarks->CurrentValue;
		$this->EditDate->CurrentValue = NULL;
		$this->EditDate->OldValue = $this->EditDate->CurrentValue;
		$this->BillName->CurrentValue = NULL;
		$this->BillName->OldValue = $this->BillName->CurrentValue;
		$this->ActualAmt->CurrentValue = NULL;
		$this->ActualAmt->OldValue = $this->ActualAmt->CurrentValue;
		$this->HISCD->CurrentValue = NULL;
		$this->HISCD->OldValue = $this->HISCD->CurrentValue;
		$this->PriceList->CurrentValue = NULL;
		$this->PriceList->OldValue = $this->PriceList->CurrentValue;
		$this->IPAmt->CurrentValue = NULL;
		$this->IPAmt->OldValue = $this->IPAmt->CurrentValue;
		$this->InsAmt->CurrentValue = NULL;
		$this->InsAmt->OldValue = $this->InsAmt->CurrentValue;
		$this->ManualCD->CurrentValue = NULL;
		$this->ManualCD->OldValue = $this->ManualCD->CurrentValue;
		$this->Free->CurrentValue = NULL;
		$this->Free->OldValue = $this->Free->CurrentValue;
		$this->AutoAuth->CurrentValue = NULL;
		$this->AutoAuth->OldValue = $this->AutoAuth->CurrentValue;
		$this->ProductCD->CurrentValue = NULL;
		$this->ProductCD->OldValue = $this->ProductCD->CurrentValue;
		$this->Inventory->CurrentValue = NULL;
		$this->Inventory->OldValue = $this->Inventory->CurrentValue;
		$this->IntimateTest->CurrentValue = NULL;
		$this->IntimateTest->OldValue = $this->IntimateTest->CurrentValue;
		$this->Manual->CurrentValue = NULL;
		$this->Manual->OldValue = $this->Manual->CurrentValue;
	}

	// Load form values
	protected function loadFormValues()
	{

		// Load from form
		global $CurrentForm;

		// Check field name 'MainDeptCd' first before field var 'x_MainDeptCd'
		$val = $CurrentForm->hasValue("MainDeptCd") ? $CurrentForm->getValue("MainDeptCd") : $CurrentForm->getValue("x_MainDeptCd");
		if (!$this->MainDeptCd->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->MainDeptCd->Visible = FALSE; // Disable update for API request
			else
				$this->MainDeptCd->setFormValue($val);
		}

		// Check field name 'DeptCd' first before field var 'x_DeptCd'
		$val = $CurrentForm->hasValue("DeptCd") ? $CurrentForm->getValue("DeptCd") : $CurrentForm->getValue("x_DeptCd");
		if (!$this->DeptCd->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->DeptCd->Visible = FALSE; // Disable update for API request
			else
				$this->DeptCd->setFormValue($val);
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

		// Check field name 'TestName' first before field var 'x_TestName'
		$val = $CurrentForm->hasValue("TestName") ? $CurrentForm->getValue("TestName") : $CurrentForm->getValue("x_TestName");
		if (!$this->TestName->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->TestName->Visible = FALSE; // Disable update for API request
			else
				$this->TestName->setFormValue($val);
		}

		// Check field name 'XrayPart' first before field var 'x_XrayPart'
		$val = $CurrentForm->hasValue("XrayPart") ? $CurrentForm->getValue("XrayPart") : $CurrentForm->getValue("x_XrayPart");
		if (!$this->XrayPart->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->XrayPart->Visible = FALSE; // Disable update for API request
			else
				$this->XrayPart->setFormValue($val);
		}

		// Check field name 'Method' first before field var 'x_Method'
		$val = $CurrentForm->hasValue("Method") ? $CurrentForm->getValue("Method") : $CurrentForm->getValue("x_Method");
		if (!$this->Method->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Method->Visible = FALSE; // Disable update for API request
			else
				$this->Method->setFormValue($val);
		}

		// Check field name 'Order' first before field var 'x_Order'
		$val = $CurrentForm->hasValue("Order") ? $CurrentForm->getValue("Order") : $CurrentForm->getValue("x_Order");
		if (!$this->Order->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Order->Visible = FALSE; // Disable update for API request
			else
				$this->Order->setFormValue($val);
		}

		// Check field name 'Form' first before field var 'x_Form'
		$val = $CurrentForm->hasValue("Form") ? $CurrentForm->getValue("Form") : $CurrentForm->getValue("x_Form");
		if (!$this->Form->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Form->Visible = FALSE; // Disable update for API request
			else
				$this->Form->setFormValue($val);
		}

		// Check field name 'Amt' first before field var 'x_Amt'
		$val = $CurrentForm->hasValue("Amt") ? $CurrentForm->getValue("Amt") : $CurrentForm->getValue("x_Amt");
		if (!$this->Amt->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Amt->Visible = FALSE; // Disable update for API request
			else
				$this->Amt->setFormValue($val);
		}

		// Check field name 'SplAmt' first before field var 'x_SplAmt'
		$val = $CurrentForm->hasValue("SplAmt") ? $CurrentForm->getValue("SplAmt") : $CurrentForm->getValue("x_SplAmt");
		if (!$this->SplAmt->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->SplAmt->Visible = FALSE; // Disable update for API request
			else
				$this->SplAmt->setFormValue($val);
		}

		// Check field name 'ResType' first before field var 'x_ResType'
		$val = $CurrentForm->hasValue("ResType") ? $CurrentForm->getValue("ResType") : $CurrentForm->getValue("x_ResType");
		if (!$this->ResType->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->ResType->Visible = FALSE; // Disable update for API request
			else
				$this->ResType->setFormValue($val);
		}

		// Check field name 'UnitCD' first before field var 'x_UnitCD'
		$val = $CurrentForm->hasValue("UnitCD") ? $CurrentForm->getValue("UnitCD") : $CurrentForm->getValue("x_UnitCD");
		if (!$this->UnitCD->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->UnitCD->Visible = FALSE; // Disable update for API request
			else
				$this->UnitCD->setFormValue($val);
		}

		// Check field name 'RefValue' first before field var 'x_RefValue'
		$val = $CurrentForm->hasValue("RefValue") ? $CurrentForm->getValue("RefValue") : $CurrentForm->getValue("x_RefValue");
		if (!$this->RefValue->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->RefValue->Visible = FALSE; // Disable update for API request
			else
				$this->RefValue->setFormValue($val);
		}

		// Check field name 'Sample' first before field var 'x_Sample'
		$val = $CurrentForm->hasValue("Sample") ? $CurrentForm->getValue("Sample") : $CurrentForm->getValue("x_Sample");
		if (!$this->Sample->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Sample->Visible = FALSE; // Disable update for API request
			else
				$this->Sample->setFormValue($val);
		}

		// Check field name 'NoD' first before field var 'x_NoD'
		$val = $CurrentForm->hasValue("NoD") ? $CurrentForm->getValue("NoD") : $CurrentForm->getValue("x_NoD");
		if (!$this->NoD->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->NoD->Visible = FALSE; // Disable update for API request
			else
				$this->NoD->setFormValue($val);
		}

		// Check field name 'BillOrder' first before field var 'x_BillOrder'
		$val = $CurrentForm->hasValue("BillOrder") ? $CurrentForm->getValue("BillOrder") : $CurrentForm->getValue("x_BillOrder");
		if (!$this->BillOrder->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->BillOrder->Visible = FALSE; // Disable update for API request
			else
				$this->BillOrder->setFormValue($val);
		}

		// Check field name 'Formula' first before field var 'x_Formula'
		$val = $CurrentForm->hasValue("Formula") ? $CurrentForm->getValue("Formula") : $CurrentForm->getValue("x_Formula");
		if (!$this->Formula->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Formula->Visible = FALSE; // Disable update for API request
			else
				$this->Formula->setFormValue($val);
		}

		// Check field name 'Inactive' first before field var 'x_Inactive'
		$val = $CurrentForm->hasValue("Inactive") ? $CurrentForm->getValue("Inactive") : $CurrentForm->getValue("x_Inactive");
		if (!$this->Inactive->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Inactive->Visible = FALSE; // Disable update for API request
			else
				$this->Inactive->setFormValue($val);
		}

		// Check field name 'ReagentAmt' first before field var 'x_ReagentAmt'
		$val = $CurrentForm->hasValue("ReagentAmt") ? $CurrentForm->getValue("ReagentAmt") : $CurrentForm->getValue("x_ReagentAmt");
		if (!$this->ReagentAmt->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->ReagentAmt->Visible = FALSE; // Disable update for API request
			else
				$this->ReagentAmt->setFormValue($val);
		}

		// Check field name 'LabAmt' first before field var 'x_LabAmt'
		$val = $CurrentForm->hasValue("LabAmt") ? $CurrentForm->getValue("LabAmt") : $CurrentForm->getValue("x_LabAmt");
		if (!$this->LabAmt->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->LabAmt->Visible = FALSE; // Disable update for API request
			else
				$this->LabAmt->setFormValue($val);
		}

		// Check field name 'RefAmt' first before field var 'x_RefAmt'
		$val = $CurrentForm->hasValue("RefAmt") ? $CurrentForm->getValue("RefAmt") : $CurrentForm->getValue("x_RefAmt");
		if (!$this->RefAmt->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->RefAmt->Visible = FALSE; // Disable update for API request
			else
				$this->RefAmt->setFormValue($val);
		}

		// Check field name 'CreFrom' first before field var 'x_CreFrom'
		$val = $CurrentForm->hasValue("CreFrom") ? $CurrentForm->getValue("CreFrom") : $CurrentForm->getValue("x_CreFrom");
		if (!$this->CreFrom->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->CreFrom->Visible = FALSE; // Disable update for API request
			else
				$this->CreFrom->setFormValue($val);
		}

		// Check field name 'CreTo' first before field var 'x_CreTo'
		$val = $CurrentForm->hasValue("CreTo") ? $CurrentForm->getValue("CreTo") : $CurrentForm->getValue("x_CreTo");
		if (!$this->CreTo->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->CreTo->Visible = FALSE; // Disable update for API request
			else
				$this->CreTo->setFormValue($val);
		}

		// Check field name 'Note' first before field var 'x_Note'
		$val = $CurrentForm->hasValue("Note") ? $CurrentForm->getValue("Note") : $CurrentForm->getValue("x_Note");
		if (!$this->Note->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Note->Visible = FALSE; // Disable update for API request
			else
				$this->Note->setFormValue($val);
		}

		// Check field name 'Sun' first before field var 'x_Sun'
		$val = $CurrentForm->hasValue("Sun") ? $CurrentForm->getValue("Sun") : $CurrentForm->getValue("x_Sun");
		if (!$this->Sun->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Sun->Visible = FALSE; // Disable update for API request
			else
				$this->Sun->setFormValue($val);
		}

		// Check field name 'Mon' first before field var 'x_Mon'
		$val = $CurrentForm->hasValue("Mon") ? $CurrentForm->getValue("Mon") : $CurrentForm->getValue("x_Mon");
		if (!$this->Mon->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Mon->Visible = FALSE; // Disable update for API request
			else
				$this->Mon->setFormValue($val);
		}

		// Check field name 'Tue' first before field var 'x_Tue'
		$val = $CurrentForm->hasValue("Tue") ? $CurrentForm->getValue("Tue") : $CurrentForm->getValue("x_Tue");
		if (!$this->Tue->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Tue->Visible = FALSE; // Disable update for API request
			else
				$this->Tue->setFormValue($val);
		}

		// Check field name 'Wed' first before field var 'x_Wed'
		$val = $CurrentForm->hasValue("Wed") ? $CurrentForm->getValue("Wed") : $CurrentForm->getValue("x_Wed");
		if (!$this->Wed->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Wed->Visible = FALSE; // Disable update for API request
			else
				$this->Wed->setFormValue($val);
		}

		// Check field name 'Thi' first before field var 'x_Thi'
		$val = $CurrentForm->hasValue("Thi") ? $CurrentForm->getValue("Thi") : $CurrentForm->getValue("x_Thi");
		if (!$this->Thi->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Thi->Visible = FALSE; // Disable update for API request
			else
				$this->Thi->setFormValue($val);
		}

		// Check field name 'Fri' first before field var 'x_Fri'
		$val = $CurrentForm->hasValue("Fri") ? $CurrentForm->getValue("Fri") : $CurrentForm->getValue("x_Fri");
		if (!$this->Fri->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Fri->Visible = FALSE; // Disable update for API request
			else
				$this->Fri->setFormValue($val);
		}

		// Check field name 'Sat' first before field var 'x_Sat'
		$val = $CurrentForm->hasValue("Sat") ? $CurrentForm->getValue("Sat") : $CurrentForm->getValue("x_Sat");
		if (!$this->Sat->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Sat->Visible = FALSE; // Disable update for API request
			else
				$this->Sat->setFormValue($val);
		}

		// Check field name 'Days' first before field var 'x_Days'
		$val = $CurrentForm->hasValue("Days") ? $CurrentForm->getValue("Days") : $CurrentForm->getValue("x_Days");
		if (!$this->Days->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Days->Visible = FALSE; // Disable update for API request
			else
				$this->Days->setFormValue($val);
		}

		// Check field name 'Cutoff' first before field var 'x_Cutoff'
		$val = $CurrentForm->hasValue("Cutoff") ? $CurrentForm->getValue("Cutoff") : $CurrentForm->getValue("x_Cutoff");
		if (!$this->Cutoff->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Cutoff->Visible = FALSE; // Disable update for API request
			else
				$this->Cutoff->setFormValue($val);
		}

		// Check field name 'FontBold' first before field var 'x_FontBold'
		$val = $CurrentForm->hasValue("FontBold") ? $CurrentForm->getValue("FontBold") : $CurrentForm->getValue("x_FontBold");
		if (!$this->FontBold->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->FontBold->Visible = FALSE; // Disable update for API request
			else
				$this->FontBold->setFormValue($val);
		}

		// Check field name 'TestHeading' first before field var 'x_TestHeading'
		$val = $CurrentForm->hasValue("TestHeading") ? $CurrentForm->getValue("TestHeading") : $CurrentForm->getValue("x_TestHeading");
		if (!$this->TestHeading->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->TestHeading->Visible = FALSE; // Disable update for API request
			else
				$this->TestHeading->setFormValue($val);
		}

		// Check field name 'Outsource' first before field var 'x_Outsource'
		$val = $CurrentForm->hasValue("Outsource") ? $CurrentForm->getValue("Outsource") : $CurrentForm->getValue("x_Outsource");
		if (!$this->Outsource->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Outsource->Visible = FALSE; // Disable update for API request
			else
				$this->Outsource->setFormValue($val);
		}

		// Check field name 'NoResult' first before field var 'x_NoResult'
		$val = $CurrentForm->hasValue("NoResult") ? $CurrentForm->getValue("NoResult") : $CurrentForm->getValue("x_NoResult");
		if (!$this->NoResult->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->NoResult->Visible = FALSE; // Disable update for API request
			else
				$this->NoResult->setFormValue($val);
		}

		// Check field name 'GraphLow' first before field var 'x_GraphLow'
		$val = $CurrentForm->hasValue("GraphLow") ? $CurrentForm->getValue("GraphLow") : $CurrentForm->getValue("x_GraphLow");
		if (!$this->GraphLow->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->GraphLow->Visible = FALSE; // Disable update for API request
			else
				$this->GraphLow->setFormValue($val);
		}

		// Check field name 'GraphHigh' first before field var 'x_GraphHigh'
		$val = $CurrentForm->hasValue("GraphHigh") ? $CurrentForm->getValue("GraphHigh") : $CurrentForm->getValue("x_GraphHigh");
		if (!$this->GraphHigh->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->GraphHigh->Visible = FALSE; // Disable update for API request
			else
				$this->GraphHigh->setFormValue($val);
		}

		// Check field name 'CollSample' first before field var 'x_CollSample'
		$val = $CurrentForm->hasValue("CollSample") ? $CurrentForm->getValue("CollSample") : $CurrentForm->getValue("x_CollSample");
		if (!$this->CollSample->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->CollSample->Visible = FALSE; // Disable update for API request
			else
				$this->CollSample->setFormValue($val);
		}

		// Check field name 'ProcessTime' first before field var 'x_ProcessTime'
		$val = $CurrentForm->hasValue("ProcessTime") ? $CurrentForm->getValue("ProcessTime") : $CurrentForm->getValue("x_ProcessTime");
		if (!$this->ProcessTime->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->ProcessTime->Visible = FALSE; // Disable update for API request
			else
				$this->ProcessTime->setFormValue($val);
		}

		// Check field name 'TamilName' first before field var 'x_TamilName'
		$val = $CurrentForm->hasValue("TamilName") ? $CurrentForm->getValue("TamilName") : $CurrentForm->getValue("x_TamilName");
		if (!$this->TamilName->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->TamilName->Visible = FALSE; // Disable update for API request
			else
				$this->TamilName->setFormValue($val);
		}

		// Check field name 'ShortName' first before field var 'x_ShortName'
		$val = $CurrentForm->hasValue("ShortName") ? $CurrentForm->getValue("ShortName") : $CurrentForm->getValue("x_ShortName");
		if (!$this->ShortName->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->ShortName->Visible = FALSE; // Disable update for API request
			else
				$this->ShortName->setFormValue($val);
		}

		// Check field name 'Individual' first before field var 'x_Individual'
		$val = $CurrentForm->hasValue("Individual") ? $CurrentForm->getValue("Individual") : $CurrentForm->getValue("x_Individual");
		if (!$this->Individual->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Individual->Visible = FALSE; // Disable update for API request
			else
				$this->Individual->setFormValue($val);
		}

		// Check field name 'PrevAmt' first before field var 'x_PrevAmt'
		$val = $CurrentForm->hasValue("PrevAmt") ? $CurrentForm->getValue("PrevAmt") : $CurrentForm->getValue("x_PrevAmt");
		if (!$this->PrevAmt->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->PrevAmt->Visible = FALSE; // Disable update for API request
			else
				$this->PrevAmt->setFormValue($val);
		}

		// Check field name 'PrevSplAmt' first before field var 'x_PrevSplAmt'
		$val = $CurrentForm->hasValue("PrevSplAmt") ? $CurrentForm->getValue("PrevSplAmt") : $CurrentForm->getValue("x_PrevSplAmt");
		if (!$this->PrevSplAmt->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->PrevSplAmt->Visible = FALSE; // Disable update for API request
			else
				$this->PrevSplAmt->setFormValue($val);
		}

		// Check field name 'Remarks' first before field var 'x_Remarks'
		$val = $CurrentForm->hasValue("Remarks") ? $CurrentForm->getValue("Remarks") : $CurrentForm->getValue("x_Remarks");
		if (!$this->Remarks->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Remarks->Visible = FALSE; // Disable update for API request
			else
				$this->Remarks->setFormValue($val);
		}

		// Check field name 'EditDate' first before field var 'x_EditDate'
		$val = $CurrentForm->hasValue("EditDate") ? $CurrentForm->getValue("EditDate") : $CurrentForm->getValue("x_EditDate");
		if (!$this->EditDate->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->EditDate->Visible = FALSE; // Disable update for API request
			else
				$this->EditDate->setFormValue($val);
			$this->EditDate->CurrentValue = UnFormatDateTime($this->EditDate->CurrentValue, 0);
		}

		// Check field name 'BillName' first before field var 'x_BillName'
		$val = $CurrentForm->hasValue("BillName") ? $CurrentForm->getValue("BillName") : $CurrentForm->getValue("x_BillName");
		if (!$this->BillName->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->BillName->Visible = FALSE; // Disable update for API request
			else
				$this->BillName->setFormValue($val);
		}

		// Check field name 'ActualAmt' first before field var 'x_ActualAmt'
		$val = $CurrentForm->hasValue("ActualAmt") ? $CurrentForm->getValue("ActualAmt") : $CurrentForm->getValue("x_ActualAmt");
		if (!$this->ActualAmt->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->ActualAmt->Visible = FALSE; // Disable update for API request
			else
				$this->ActualAmt->setFormValue($val);
		}

		// Check field name 'HISCD' first before field var 'x_HISCD'
		$val = $CurrentForm->hasValue("HISCD") ? $CurrentForm->getValue("HISCD") : $CurrentForm->getValue("x_HISCD");
		if (!$this->HISCD->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->HISCD->Visible = FALSE; // Disable update for API request
			else
				$this->HISCD->setFormValue($val);
		}

		// Check field name 'PriceList' first before field var 'x_PriceList'
		$val = $CurrentForm->hasValue("PriceList") ? $CurrentForm->getValue("PriceList") : $CurrentForm->getValue("x_PriceList");
		if (!$this->PriceList->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->PriceList->Visible = FALSE; // Disable update for API request
			else
				$this->PriceList->setFormValue($val);
		}

		// Check field name 'IPAmt' first before field var 'x_IPAmt'
		$val = $CurrentForm->hasValue("IPAmt") ? $CurrentForm->getValue("IPAmt") : $CurrentForm->getValue("x_IPAmt");
		if (!$this->IPAmt->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->IPAmt->Visible = FALSE; // Disable update for API request
			else
				$this->IPAmt->setFormValue($val);
		}

		// Check field name 'InsAmt' first before field var 'x_InsAmt'
		$val = $CurrentForm->hasValue("InsAmt") ? $CurrentForm->getValue("InsAmt") : $CurrentForm->getValue("x_InsAmt");
		if (!$this->InsAmt->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->InsAmt->Visible = FALSE; // Disable update for API request
			else
				$this->InsAmt->setFormValue($val);
		}

		// Check field name 'ManualCD' first before field var 'x_ManualCD'
		$val = $CurrentForm->hasValue("ManualCD") ? $CurrentForm->getValue("ManualCD") : $CurrentForm->getValue("x_ManualCD");
		if (!$this->ManualCD->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->ManualCD->Visible = FALSE; // Disable update for API request
			else
				$this->ManualCD->setFormValue($val);
		}

		// Check field name 'Free' first before field var 'x_Free'
		$val = $CurrentForm->hasValue("Free") ? $CurrentForm->getValue("Free") : $CurrentForm->getValue("x_Free");
		if (!$this->Free->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Free->Visible = FALSE; // Disable update for API request
			else
				$this->Free->setFormValue($val);
		}

		// Check field name 'AutoAuth' first before field var 'x_AutoAuth'
		$val = $CurrentForm->hasValue("AutoAuth") ? $CurrentForm->getValue("AutoAuth") : $CurrentForm->getValue("x_AutoAuth");
		if (!$this->AutoAuth->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->AutoAuth->Visible = FALSE; // Disable update for API request
			else
				$this->AutoAuth->setFormValue($val);
		}

		// Check field name 'ProductCD' first before field var 'x_ProductCD'
		$val = $CurrentForm->hasValue("ProductCD") ? $CurrentForm->getValue("ProductCD") : $CurrentForm->getValue("x_ProductCD");
		if (!$this->ProductCD->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->ProductCD->Visible = FALSE; // Disable update for API request
			else
				$this->ProductCD->setFormValue($val);
		}

		// Check field name 'Inventory' first before field var 'x_Inventory'
		$val = $CurrentForm->hasValue("Inventory") ? $CurrentForm->getValue("Inventory") : $CurrentForm->getValue("x_Inventory");
		if (!$this->Inventory->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Inventory->Visible = FALSE; // Disable update for API request
			else
				$this->Inventory->setFormValue($val);
		}

		// Check field name 'IntimateTest' first before field var 'x_IntimateTest'
		$val = $CurrentForm->hasValue("IntimateTest") ? $CurrentForm->getValue("IntimateTest") : $CurrentForm->getValue("x_IntimateTest");
		if (!$this->IntimateTest->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->IntimateTest->Visible = FALSE; // Disable update for API request
			else
				$this->IntimateTest->setFormValue($val);
		}

		// Check field name 'Manual' first before field var 'x_Manual'
		$val = $CurrentForm->hasValue("Manual") ? $CurrentForm->getValue("Manual") : $CurrentForm->getValue("x_Manual");
		if (!$this->Manual->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Manual->Visible = FALSE; // Disable update for API request
			else
				$this->Manual->setFormValue($val);
		}

		// Check field name 'id' first before field var 'x_id'
		$val = $CurrentForm->hasValue("id") ? $CurrentForm->getValue("id") : $CurrentForm->getValue("x_id");
	}

	// Restore form values
	public function restoreFormValues()
	{
		global $CurrentForm;
		$this->MainDeptCd->CurrentValue = $this->MainDeptCd->FormValue;
		$this->DeptCd->CurrentValue = $this->DeptCd->FormValue;
		$this->TestCd->CurrentValue = $this->TestCd->FormValue;
		$this->TestSubCd->CurrentValue = $this->TestSubCd->FormValue;
		$this->TestName->CurrentValue = $this->TestName->FormValue;
		$this->XrayPart->CurrentValue = $this->XrayPart->FormValue;
		$this->Method->CurrentValue = $this->Method->FormValue;
		$this->Order->CurrentValue = $this->Order->FormValue;
		$this->Form->CurrentValue = $this->Form->FormValue;
		$this->Amt->CurrentValue = $this->Amt->FormValue;
		$this->SplAmt->CurrentValue = $this->SplAmt->FormValue;
		$this->ResType->CurrentValue = $this->ResType->FormValue;
		$this->UnitCD->CurrentValue = $this->UnitCD->FormValue;
		$this->RefValue->CurrentValue = $this->RefValue->FormValue;
		$this->Sample->CurrentValue = $this->Sample->FormValue;
		$this->NoD->CurrentValue = $this->NoD->FormValue;
		$this->BillOrder->CurrentValue = $this->BillOrder->FormValue;
		$this->Formula->CurrentValue = $this->Formula->FormValue;
		$this->Inactive->CurrentValue = $this->Inactive->FormValue;
		$this->ReagentAmt->CurrentValue = $this->ReagentAmt->FormValue;
		$this->LabAmt->CurrentValue = $this->LabAmt->FormValue;
		$this->RefAmt->CurrentValue = $this->RefAmt->FormValue;
		$this->CreFrom->CurrentValue = $this->CreFrom->FormValue;
		$this->CreTo->CurrentValue = $this->CreTo->FormValue;
		$this->Note->CurrentValue = $this->Note->FormValue;
		$this->Sun->CurrentValue = $this->Sun->FormValue;
		$this->Mon->CurrentValue = $this->Mon->FormValue;
		$this->Tue->CurrentValue = $this->Tue->FormValue;
		$this->Wed->CurrentValue = $this->Wed->FormValue;
		$this->Thi->CurrentValue = $this->Thi->FormValue;
		$this->Fri->CurrentValue = $this->Fri->FormValue;
		$this->Sat->CurrentValue = $this->Sat->FormValue;
		$this->Days->CurrentValue = $this->Days->FormValue;
		$this->Cutoff->CurrentValue = $this->Cutoff->FormValue;
		$this->FontBold->CurrentValue = $this->FontBold->FormValue;
		$this->TestHeading->CurrentValue = $this->TestHeading->FormValue;
		$this->Outsource->CurrentValue = $this->Outsource->FormValue;
		$this->NoResult->CurrentValue = $this->NoResult->FormValue;
		$this->GraphLow->CurrentValue = $this->GraphLow->FormValue;
		$this->GraphHigh->CurrentValue = $this->GraphHigh->FormValue;
		$this->CollSample->CurrentValue = $this->CollSample->FormValue;
		$this->ProcessTime->CurrentValue = $this->ProcessTime->FormValue;
		$this->TamilName->CurrentValue = $this->TamilName->FormValue;
		$this->ShortName->CurrentValue = $this->ShortName->FormValue;
		$this->Individual->CurrentValue = $this->Individual->FormValue;
		$this->PrevAmt->CurrentValue = $this->PrevAmt->FormValue;
		$this->PrevSplAmt->CurrentValue = $this->PrevSplAmt->FormValue;
		$this->Remarks->CurrentValue = $this->Remarks->FormValue;
		$this->EditDate->CurrentValue = $this->EditDate->FormValue;
		$this->EditDate->CurrentValue = UnFormatDateTime($this->EditDate->CurrentValue, 0);
		$this->BillName->CurrentValue = $this->BillName->FormValue;
		$this->ActualAmt->CurrentValue = $this->ActualAmt->FormValue;
		$this->HISCD->CurrentValue = $this->HISCD->FormValue;
		$this->PriceList->CurrentValue = $this->PriceList->FormValue;
		$this->IPAmt->CurrentValue = $this->IPAmt->FormValue;
		$this->InsAmt->CurrentValue = $this->InsAmt->FormValue;
		$this->ManualCD->CurrentValue = $this->ManualCD->FormValue;
		$this->Free->CurrentValue = $this->Free->FormValue;
		$this->AutoAuth->CurrentValue = $this->AutoAuth->FormValue;
		$this->ProductCD->CurrentValue = $this->ProductCD->FormValue;
		$this->Inventory->CurrentValue = $this->Inventory->FormValue;
		$this->IntimateTest->CurrentValue = $this->IntimateTest->FormValue;
		$this->Manual->CurrentValue = $this->Manual->FormValue;
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
		$this->MainDeptCd->setDbValue($row['MainDeptCd']);
		$this->DeptCd->setDbValue($row['DeptCd']);
		$this->TestCd->setDbValue($row['TestCd']);
		$this->TestSubCd->setDbValue($row['TestSubCd']);
		$this->TestName->setDbValue($row['TestName']);
		$this->XrayPart->setDbValue($row['XrayPart']);
		$this->Method->setDbValue($row['Method']);
		$this->Order->setDbValue($row['Order']);
		$this->Form->setDbValue($row['Form']);
		$this->Amt->setDbValue($row['Amt']);
		$this->SplAmt->setDbValue($row['SplAmt']);
		$this->ResType->setDbValue($row['ResType']);
		$this->UnitCD->setDbValue($row['UnitCD']);
		$this->RefValue->setDbValue($row['RefValue']);
		$this->Sample->setDbValue($row['Sample']);
		$this->NoD->setDbValue($row['NoD']);
		$this->BillOrder->setDbValue($row['BillOrder']);
		$this->Formula->setDbValue($row['Formula']);
		$this->Inactive->setDbValue($row['Inactive']);
		$this->ReagentAmt->setDbValue($row['ReagentAmt']);
		$this->LabAmt->setDbValue($row['LabAmt']);
		$this->RefAmt->setDbValue($row['RefAmt']);
		$this->CreFrom->setDbValue($row['CreFrom']);
		$this->CreTo->setDbValue($row['CreTo']);
		$this->Note->setDbValue($row['Note']);
		$this->Sun->setDbValue($row['Sun']);
		$this->Mon->setDbValue($row['Mon']);
		$this->Tue->setDbValue($row['Tue']);
		$this->Wed->setDbValue($row['Wed']);
		$this->Thi->setDbValue($row['Thi']);
		$this->Fri->setDbValue($row['Fri']);
		$this->Sat->setDbValue($row['Sat']);
		$this->Days->setDbValue($row['Days']);
		$this->Cutoff->setDbValue($row['Cutoff']);
		$this->FontBold->setDbValue($row['FontBold']);
		$this->TestHeading->setDbValue($row['TestHeading']);
		$this->Outsource->setDbValue($row['Outsource']);
		$this->NoResult->setDbValue($row['NoResult']);
		$this->GraphLow->setDbValue($row['GraphLow']);
		$this->GraphHigh->setDbValue($row['GraphHigh']);
		$this->CollSample->setDbValue($row['CollSample']);
		$this->ProcessTime->setDbValue($row['ProcessTime']);
		$this->TamilName->setDbValue($row['TamilName']);
		$this->ShortName->setDbValue($row['ShortName']);
		$this->Individual->setDbValue($row['Individual']);
		$this->PrevAmt->setDbValue($row['PrevAmt']);
		$this->PrevSplAmt->setDbValue($row['PrevSplAmt']);
		$this->Remarks->setDbValue($row['Remarks']);
		$this->EditDate->setDbValue($row['EditDate']);
		$this->BillName->setDbValue($row['BillName']);
		$this->ActualAmt->setDbValue($row['ActualAmt']);
		$this->HISCD->setDbValue($row['HISCD']);
		$this->PriceList->setDbValue($row['PriceList']);
		$this->IPAmt->setDbValue($row['IPAmt']);
		$this->InsAmt->setDbValue($row['InsAmt']);
		$this->ManualCD->setDbValue($row['ManualCD']);
		$this->Free->setDbValue($row['Free']);
		$this->AutoAuth->setDbValue($row['AutoAuth']);
		$this->ProductCD->setDbValue($row['ProductCD']);
		$this->Inventory->setDbValue($row['Inventory']);
		$this->IntimateTest->setDbValue($row['IntimateTest']);
		$this->Manual->setDbValue($row['Manual']);
	}

	// Return a row with default values
	protected function newRow()
	{
		$this->loadDefaultValues();
		$row = [];
		$row['id'] = $this->id->CurrentValue;
		$row['MainDeptCd'] = $this->MainDeptCd->CurrentValue;
		$row['DeptCd'] = $this->DeptCd->CurrentValue;
		$row['TestCd'] = $this->TestCd->CurrentValue;
		$row['TestSubCd'] = $this->TestSubCd->CurrentValue;
		$row['TestName'] = $this->TestName->CurrentValue;
		$row['XrayPart'] = $this->XrayPart->CurrentValue;
		$row['Method'] = $this->Method->CurrentValue;
		$row['Order'] = $this->Order->CurrentValue;
		$row['Form'] = $this->Form->CurrentValue;
		$row['Amt'] = $this->Amt->CurrentValue;
		$row['SplAmt'] = $this->SplAmt->CurrentValue;
		$row['ResType'] = $this->ResType->CurrentValue;
		$row['UnitCD'] = $this->UnitCD->CurrentValue;
		$row['RefValue'] = $this->RefValue->CurrentValue;
		$row['Sample'] = $this->Sample->CurrentValue;
		$row['NoD'] = $this->NoD->CurrentValue;
		$row['BillOrder'] = $this->BillOrder->CurrentValue;
		$row['Formula'] = $this->Formula->CurrentValue;
		$row['Inactive'] = $this->Inactive->CurrentValue;
		$row['ReagentAmt'] = $this->ReagentAmt->CurrentValue;
		$row['LabAmt'] = $this->LabAmt->CurrentValue;
		$row['RefAmt'] = $this->RefAmt->CurrentValue;
		$row['CreFrom'] = $this->CreFrom->CurrentValue;
		$row['CreTo'] = $this->CreTo->CurrentValue;
		$row['Note'] = $this->Note->CurrentValue;
		$row['Sun'] = $this->Sun->CurrentValue;
		$row['Mon'] = $this->Mon->CurrentValue;
		$row['Tue'] = $this->Tue->CurrentValue;
		$row['Wed'] = $this->Wed->CurrentValue;
		$row['Thi'] = $this->Thi->CurrentValue;
		$row['Fri'] = $this->Fri->CurrentValue;
		$row['Sat'] = $this->Sat->CurrentValue;
		$row['Days'] = $this->Days->CurrentValue;
		$row['Cutoff'] = $this->Cutoff->CurrentValue;
		$row['FontBold'] = $this->FontBold->CurrentValue;
		$row['TestHeading'] = $this->TestHeading->CurrentValue;
		$row['Outsource'] = $this->Outsource->CurrentValue;
		$row['NoResult'] = $this->NoResult->CurrentValue;
		$row['GraphLow'] = $this->GraphLow->CurrentValue;
		$row['GraphHigh'] = $this->GraphHigh->CurrentValue;
		$row['CollSample'] = $this->CollSample->CurrentValue;
		$row['ProcessTime'] = $this->ProcessTime->CurrentValue;
		$row['TamilName'] = $this->TamilName->CurrentValue;
		$row['ShortName'] = $this->ShortName->CurrentValue;
		$row['Individual'] = $this->Individual->CurrentValue;
		$row['PrevAmt'] = $this->PrevAmt->CurrentValue;
		$row['PrevSplAmt'] = $this->PrevSplAmt->CurrentValue;
		$row['Remarks'] = $this->Remarks->CurrentValue;
		$row['EditDate'] = $this->EditDate->CurrentValue;
		$row['BillName'] = $this->BillName->CurrentValue;
		$row['ActualAmt'] = $this->ActualAmt->CurrentValue;
		$row['HISCD'] = $this->HISCD->CurrentValue;
		$row['PriceList'] = $this->PriceList->CurrentValue;
		$row['IPAmt'] = $this->IPAmt->CurrentValue;
		$row['InsAmt'] = $this->InsAmt->CurrentValue;
		$row['ManualCD'] = $this->ManualCD->CurrentValue;
		$row['Free'] = $this->Free->CurrentValue;
		$row['AutoAuth'] = $this->AutoAuth->CurrentValue;
		$row['ProductCD'] = $this->ProductCD->CurrentValue;
		$row['Inventory'] = $this->Inventory->CurrentValue;
		$row['IntimateTest'] = $this->IntimateTest->CurrentValue;
		$row['Manual'] = $this->Manual->CurrentValue;
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

		if ($this->Order->FormValue == $this->Order->CurrentValue && is_numeric(ConvertToFloatString($this->Order->CurrentValue)))
			$this->Order->CurrentValue = ConvertToFloatString($this->Order->CurrentValue);

		// Convert decimal values if posted back
		if ($this->Amt->FormValue == $this->Amt->CurrentValue && is_numeric(ConvertToFloatString($this->Amt->CurrentValue)))
			$this->Amt->CurrentValue = ConvertToFloatString($this->Amt->CurrentValue);

		// Convert decimal values if posted back
		if ($this->SplAmt->FormValue == $this->SplAmt->CurrentValue && is_numeric(ConvertToFloatString($this->SplAmt->CurrentValue)))
			$this->SplAmt->CurrentValue = ConvertToFloatString($this->SplAmt->CurrentValue);

		// Convert decimal values if posted back
		if ($this->NoD->FormValue == $this->NoD->CurrentValue && is_numeric(ConvertToFloatString($this->NoD->CurrentValue)))
			$this->NoD->CurrentValue = ConvertToFloatString($this->NoD->CurrentValue);

		// Convert decimal values if posted back
		if ($this->BillOrder->FormValue == $this->BillOrder->CurrentValue && is_numeric(ConvertToFloatString($this->BillOrder->CurrentValue)))
			$this->BillOrder->CurrentValue = ConvertToFloatString($this->BillOrder->CurrentValue);

		// Convert decimal values if posted back
		if ($this->ReagentAmt->FormValue == $this->ReagentAmt->CurrentValue && is_numeric(ConvertToFloatString($this->ReagentAmt->CurrentValue)))
			$this->ReagentAmt->CurrentValue = ConvertToFloatString($this->ReagentAmt->CurrentValue);

		// Convert decimal values if posted back
		if ($this->LabAmt->FormValue == $this->LabAmt->CurrentValue && is_numeric(ConvertToFloatString($this->LabAmt->CurrentValue)))
			$this->LabAmt->CurrentValue = ConvertToFloatString($this->LabAmt->CurrentValue);

		// Convert decimal values if posted back
		if ($this->RefAmt->FormValue == $this->RefAmt->CurrentValue && is_numeric(ConvertToFloatString($this->RefAmt->CurrentValue)))
			$this->RefAmt->CurrentValue = ConvertToFloatString($this->RefAmt->CurrentValue);

		// Convert decimal values if posted back
		if ($this->CreFrom->FormValue == $this->CreFrom->CurrentValue && is_numeric(ConvertToFloatString($this->CreFrom->CurrentValue)))
			$this->CreFrom->CurrentValue = ConvertToFloatString($this->CreFrom->CurrentValue);

		// Convert decimal values if posted back
		if ($this->CreTo->FormValue == $this->CreTo->CurrentValue && is_numeric(ConvertToFloatString($this->CreTo->CurrentValue)))
			$this->CreTo->CurrentValue = ConvertToFloatString($this->CreTo->CurrentValue);

		// Convert decimal values if posted back
		if ($this->Days->FormValue == $this->Days->CurrentValue && is_numeric(ConvertToFloatString($this->Days->CurrentValue)))
			$this->Days->CurrentValue = ConvertToFloatString($this->Days->CurrentValue);

		// Convert decimal values if posted back
		if ($this->GraphLow->FormValue == $this->GraphLow->CurrentValue && is_numeric(ConvertToFloatString($this->GraphLow->CurrentValue)))
			$this->GraphLow->CurrentValue = ConvertToFloatString($this->GraphLow->CurrentValue);

		// Convert decimal values if posted back
		if ($this->GraphHigh->FormValue == $this->GraphHigh->CurrentValue && is_numeric(ConvertToFloatString($this->GraphHigh->CurrentValue)))
			$this->GraphHigh->CurrentValue = ConvertToFloatString($this->GraphHigh->CurrentValue);

		// Convert decimal values if posted back
		if ($this->PrevAmt->FormValue == $this->PrevAmt->CurrentValue && is_numeric(ConvertToFloatString($this->PrevAmt->CurrentValue)))
			$this->PrevAmt->CurrentValue = ConvertToFloatString($this->PrevAmt->CurrentValue);

		// Convert decimal values if posted back
		if ($this->PrevSplAmt->FormValue == $this->PrevSplAmt->CurrentValue && is_numeric(ConvertToFloatString($this->PrevSplAmt->CurrentValue)))
			$this->PrevSplAmt->CurrentValue = ConvertToFloatString($this->PrevSplAmt->CurrentValue);

		// Convert decimal values if posted back
		if ($this->ActualAmt->FormValue == $this->ActualAmt->CurrentValue && is_numeric(ConvertToFloatString($this->ActualAmt->CurrentValue)))
			$this->ActualAmt->CurrentValue = ConvertToFloatString($this->ActualAmt->CurrentValue);

		// Convert decimal values if posted back
		if ($this->IPAmt->FormValue == $this->IPAmt->CurrentValue && is_numeric(ConvertToFloatString($this->IPAmt->CurrentValue)))
			$this->IPAmt->CurrentValue = ConvertToFloatString($this->IPAmt->CurrentValue);

		// Convert decimal values if posted back
		if ($this->InsAmt->FormValue == $this->InsAmt->CurrentValue && is_numeric(ConvertToFloatString($this->InsAmt->CurrentValue)))
			$this->InsAmt->CurrentValue = ConvertToFloatString($this->InsAmt->CurrentValue);

		// Call Row_Rendering event
		$this->Row_Rendering();

		// Common render codes for all row types
		// id
		// MainDeptCd
		// DeptCd
		// TestCd
		// TestSubCd
		// TestName
		// XrayPart
		// Method
		// Order
		// Form
		// Amt
		// SplAmt
		// ResType
		// UnitCD
		// RefValue
		// Sample
		// NoD
		// BillOrder
		// Formula
		// Inactive
		// ReagentAmt
		// LabAmt
		// RefAmt
		// CreFrom
		// CreTo
		// Note
		// Sun
		// Mon
		// Tue
		// Wed
		// Thi
		// Fri
		// Sat
		// Days
		// Cutoff
		// FontBold
		// TestHeading
		// Outsource
		// NoResult
		// GraphLow
		// GraphHigh
		// CollSample
		// ProcessTime
		// TamilName
		// ShortName
		// Individual
		// PrevAmt
		// PrevSplAmt
		// Remarks
		// EditDate
		// BillName
		// ActualAmt
		// HISCD
		// PriceList
		// IPAmt
		// InsAmt
		// ManualCD
		// Free
		// AutoAuth
		// ProductCD
		// Inventory
		// IntimateTest
		// Manual

		if ($this->RowType == ROWTYPE_VIEW) { // View row

			// id
			$this->id->ViewValue = $this->id->CurrentValue;
			$this->id->ViewCustomAttributes = "";

			// MainDeptCd
			$this->MainDeptCd->ViewValue = $this->MainDeptCd->CurrentValue;
			$this->MainDeptCd->ViewCustomAttributes = "";

			// DeptCd
			$this->DeptCd->ViewValue = $this->DeptCd->CurrentValue;
			$this->DeptCd->ViewCustomAttributes = "";

			// TestCd
			$this->TestCd->ViewValue = $this->TestCd->CurrentValue;
			$this->TestCd->ViewCustomAttributes = "";

			// TestSubCd
			$this->TestSubCd->ViewValue = $this->TestSubCd->CurrentValue;
			$this->TestSubCd->ViewCustomAttributes = "";

			// TestName
			$this->TestName->ViewValue = $this->TestName->CurrentValue;
			$this->TestName->ViewCustomAttributes = "";

			// XrayPart
			$this->XrayPart->ViewValue = $this->XrayPart->CurrentValue;
			$this->XrayPart->ViewCustomAttributes = "";

			// Method
			$this->Method->ViewValue = $this->Method->CurrentValue;
			$this->Method->ViewCustomAttributes = "";

			// Order
			$this->Order->ViewValue = $this->Order->CurrentValue;
			$this->Order->ViewValue = FormatNumber($this->Order->ViewValue, 2, -2, -2, -2);
			$this->Order->ViewCustomAttributes = "";

			// Form
			$this->Form->ViewValue = $this->Form->CurrentValue;
			$this->Form->ViewCustomAttributes = "";

			// Amt
			$this->Amt->ViewValue = $this->Amt->CurrentValue;
			$this->Amt->ViewValue = FormatNumber($this->Amt->ViewValue, 2, -2, -2, -2);
			$this->Amt->ViewCustomAttributes = "";

			// SplAmt
			$this->SplAmt->ViewValue = $this->SplAmt->CurrentValue;
			$this->SplAmt->ViewValue = FormatNumber($this->SplAmt->ViewValue, 2, -2, -2, -2);
			$this->SplAmt->ViewCustomAttributes = "";

			// ResType
			$this->ResType->ViewValue = $this->ResType->CurrentValue;
			$this->ResType->ViewCustomAttributes = "";

			// UnitCD
			$this->UnitCD->ViewValue = $this->UnitCD->CurrentValue;
			$this->UnitCD->ViewCustomAttributes = "";

			// RefValue
			$this->RefValue->ViewValue = $this->RefValue->CurrentValue;
			$this->RefValue->ViewCustomAttributes = "";

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

			// ReagentAmt
			$this->ReagentAmt->ViewValue = $this->ReagentAmt->CurrentValue;
			$this->ReagentAmt->ViewValue = FormatNumber($this->ReagentAmt->ViewValue, 2, -2, -2, -2);
			$this->ReagentAmt->ViewCustomAttributes = "";

			// LabAmt
			$this->LabAmt->ViewValue = $this->LabAmt->CurrentValue;
			$this->LabAmt->ViewValue = FormatNumber($this->LabAmt->ViewValue, 2, -2, -2, -2);
			$this->LabAmt->ViewCustomAttributes = "";

			// RefAmt
			$this->RefAmt->ViewValue = $this->RefAmt->CurrentValue;
			$this->RefAmt->ViewValue = FormatNumber($this->RefAmt->ViewValue, 2, -2, -2, -2);
			$this->RefAmt->ViewCustomAttributes = "";

			// CreFrom
			$this->CreFrom->ViewValue = $this->CreFrom->CurrentValue;
			$this->CreFrom->ViewValue = FormatNumber($this->CreFrom->ViewValue, 2, -2, -2, -2);
			$this->CreFrom->ViewCustomAttributes = "";

			// CreTo
			$this->CreTo->ViewValue = $this->CreTo->CurrentValue;
			$this->CreTo->ViewValue = FormatNumber($this->CreTo->ViewValue, 2, -2, -2, -2);
			$this->CreTo->ViewCustomAttributes = "";

			// Note
			$this->Note->ViewValue = $this->Note->CurrentValue;
			$this->Note->ViewCustomAttributes = "";

			// Sun
			$this->Sun->ViewValue = $this->Sun->CurrentValue;
			$this->Sun->ViewCustomAttributes = "";

			// Mon
			$this->Mon->ViewValue = $this->Mon->CurrentValue;
			$this->Mon->ViewCustomAttributes = "";

			// Tue
			$this->Tue->ViewValue = $this->Tue->CurrentValue;
			$this->Tue->ViewCustomAttributes = "";

			// Wed
			$this->Wed->ViewValue = $this->Wed->CurrentValue;
			$this->Wed->ViewCustomAttributes = "";

			// Thi
			$this->Thi->ViewValue = $this->Thi->CurrentValue;
			$this->Thi->ViewCustomAttributes = "";

			// Fri
			$this->Fri->ViewValue = $this->Fri->CurrentValue;
			$this->Fri->ViewCustomAttributes = "";

			// Sat
			$this->Sat->ViewValue = $this->Sat->CurrentValue;
			$this->Sat->ViewCustomAttributes = "";

			// Days
			$this->Days->ViewValue = $this->Days->CurrentValue;
			$this->Days->ViewValue = FormatNumber($this->Days->ViewValue, 2, -2, -2, -2);
			$this->Days->ViewCustomAttributes = "";

			// Cutoff
			$this->Cutoff->ViewValue = $this->Cutoff->CurrentValue;
			$this->Cutoff->ViewCustomAttributes = "";

			// FontBold
			$this->FontBold->ViewValue = $this->FontBold->CurrentValue;
			$this->FontBold->ViewCustomAttributes = "";

			// TestHeading
			$this->TestHeading->ViewValue = $this->TestHeading->CurrentValue;
			$this->TestHeading->ViewCustomAttributes = "";

			// Outsource
			$this->Outsource->ViewValue = $this->Outsource->CurrentValue;
			$this->Outsource->ViewCustomAttributes = "";

			// NoResult
			$this->NoResult->ViewValue = $this->NoResult->CurrentValue;
			$this->NoResult->ViewCustomAttributes = "";

			// GraphLow
			$this->GraphLow->ViewValue = $this->GraphLow->CurrentValue;
			$this->GraphLow->ViewValue = FormatNumber($this->GraphLow->ViewValue, 2, -2, -2, -2);
			$this->GraphLow->ViewCustomAttributes = "";

			// GraphHigh
			$this->GraphHigh->ViewValue = $this->GraphHigh->CurrentValue;
			$this->GraphHigh->ViewValue = FormatNumber($this->GraphHigh->ViewValue, 2, -2, -2, -2);
			$this->GraphHigh->ViewCustomAttributes = "";

			// CollSample
			$this->CollSample->ViewValue = $this->CollSample->CurrentValue;
			$this->CollSample->ViewCustomAttributes = "";

			// ProcessTime
			$this->ProcessTime->ViewValue = $this->ProcessTime->CurrentValue;
			$this->ProcessTime->ViewCustomAttributes = "";

			// TamilName
			$this->TamilName->ViewValue = $this->TamilName->CurrentValue;
			$this->TamilName->ViewCustomAttributes = "";

			// ShortName
			$this->ShortName->ViewValue = $this->ShortName->CurrentValue;
			$this->ShortName->ViewCustomAttributes = "";

			// Individual
			$this->Individual->ViewValue = $this->Individual->CurrentValue;
			$this->Individual->ViewCustomAttributes = "";

			// PrevAmt
			$this->PrevAmt->ViewValue = $this->PrevAmt->CurrentValue;
			$this->PrevAmt->ViewValue = FormatNumber($this->PrevAmt->ViewValue, 2, -2, -2, -2);
			$this->PrevAmt->ViewCustomAttributes = "";

			// PrevSplAmt
			$this->PrevSplAmt->ViewValue = $this->PrevSplAmt->CurrentValue;
			$this->PrevSplAmt->ViewValue = FormatNumber($this->PrevSplAmt->ViewValue, 2, -2, -2, -2);
			$this->PrevSplAmt->ViewCustomAttributes = "";

			// Remarks
			$this->Remarks->ViewValue = $this->Remarks->CurrentValue;
			$this->Remarks->ViewCustomAttributes = "";

			// EditDate
			$this->EditDate->ViewValue = $this->EditDate->CurrentValue;
			$this->EditDate->ViewValue = FormatDateTime($this->EditDate->ViewValue, 0);
			$this->EditDate->ViewCustomAttributes = "";

			// BillName
			$this->BillName->ViewValue = $this->BillName->CurrentValue;
			$this->BillName->ViewCustomAttributes = "";

			// ActualAmt
			$this->ActualAmt->ViewValue = $this->ActualAmt->CurrentValue;
			$this->ActualAmt->ViewValue = FormatNumber($this->ActualAmt->ViewValue, 2, -2, -2, -2);
			$this->ActualAmt->ViewCustomAttributes = "";

			// HISCD
			$this->HISCD->ViewValue = $this->HISCD->CurrentValue;
			$this->HISCD->ViewCustomAttributes = "";

			// PriceList
			$this->PriceList->ViewValue = $this->PriceList->CurrentValue;
			$this->PriceList->ViewCustomAttributes = "";

			// IPAmt
			$this->IPAmt->ViewValue = $this->IPAmt->CurrentValue;
			$this->IPAmt->ViewValue = FormatNumber($this->IPAmt->ViewValue, 2, -2, -2, -2);
			$this->IPAmt->ViewCustomAttributes = "";

			// InsAmt
			$this->InsAmt->ViewValue = $this->InsAmt->CurrentValue;
			$this->InsAmt->ViewValue = FormatNumber($this->InsAmt->ViewValue, 2, -2, -2, -2);
			$this->InsAmt->ViewCustomAttributes = "";

			// ManualCD
			$this->ManualCD->ViewValue = $this->ManualCD->CurrentValue;
			$this->ManualCD->ViewCustomAttributes = "";

			// Free
			$this->Free->ViewValue = $this->Free->CurrentValue;
			$this->Free->ViewCustomAttributes = "";

			// AutoAuth
			$this->AutoAuth->ViewValue = $this->AutoAuth->CurrentValue;
			$this->AutoAuth->ViewCustomAttributes = "";

			// ProductCD
			$this->ProductCD->ViewValue = $this->ProductCD->CurrentValue;
			$this->ProductCD->ViewCustomAttributes = "";

			// Inventory
			$this->Inventory->ViewValue = $this->Inventory->CurrentValue;
			$this->Inventory->ViewCustomAttributes = "";

			// IntimateTest
			$this->IntimateTest->ViewValue = $this->IntimateTest->CurrentValue;
			$this->IntimateTest->ViewCustomAttributes = "";

			// Manual
			$this->Manual->ViewValue = $this->Manual->CurrentValue;
			$this->Manual->ViewCustomAttributes = "";

			// MainDeptCd
			$this->MainDeptCd->LinkCustomAttributes = "";
			$this->MainDeptCd->HrefValue = "";
			$this->MainDeptCd->TooltipValue = "";

			// DeptCd
			$this->DeptCd->LinkCustomAttributes = "";
			$this->DeptCd->HrefValue = "";
			$this->DeptCd->TooltipValue = "";

			// TestCd
			$this->TestCd->LinkCustomAttributes = "";
			$this->TestCd->HrefValue = "";
			$this->TestCd->TooltipValue = "";

			// TestSubCd
			$this->TestSubCd->LinkCustomAttributes = "";
			$this->TestSubCd->HrefValue = "";
			$this->TestSubCd->TooltipValue = "";

			// TestName
			$this->TestName->LinkCustomAttributes = "";
			$this->TestName->HrefValue = "";
			$this->TestName->TooltipValue = "";

			// XrayPart
			$this->XrayPart->LinkCustomAttributes = "";
			$this->XrayPart->HrefValue = "";
			$this->XrayPart->TooltipValue = "";

			// Method
			$this->Method->LinkCustomAttributes = "";
			$this->Method->HrefValue = "";
			$this->Method->TooltipValue = "";

			// Order
			$this->Order->LinkCustomAttributes = "";
			$this->Order->HrefValue = "";
			$this->Order->TooltipValue = "";

			// Form
			$this->Form->LinkCustomAttributes = "";
			$this->Form->HrefValue = "";
			$this->Form->TooltipValue = "";

			// Amt
			$this->Amt->LinkCustomAttributes = "";
			$this->Amt->HrefValue = "";
			$this->Amt->TooltipValue = "";

			// SplAmt
			$this->SplAmt->LinkCustomAttributes = "";
			$this->SplAmt->HrefValue = "";
			$this->SplAmt->TooltipValue = "";

			// ResType
			$this->ResType->LinkCustomAttributes = "";
			$this->ResType->HrefValue = "";
			$this->ResType->TooltipValue = "";

			// UnitCD
			$this->UnitCD->LinkCustomAttributes = "";
			$this->UnitCD->HrefValue = "";
			$this->UnitCD->TooltipValue = "";

			// RefValue
			$this->RefValue->LinkCustomAttributes = "";
			$this->RefValue->HrefValue = "";
			$this->RefValue->TooltipValue = "";

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

			// ReagentAmt
			$this->ReagentAmt->LinkCustomAttributes = "";
			$this->ReagentAmt->HrefValue = "";
			$this->ReagentAmt->TooltipValue = "";

			// LabAmt
			$this->LabAmt->LinkCustomAttributes = "";
			$this->LabAmt->HrefValue = "";
			$this->LabAmt->TooltipValue = "";

			// RefAmt
			$this->RefAmt->LinkCustomAttributes = "";
			$this->RefAmt->HrefValue = "";
			$this->RefAmt->TooltipValue = "";

			// CreFrom
			$this->CreFrom->LinkCustomAttributes = "";
			$this->CreFrom->HrefValue = "";
			$this->CreFrom->TooltipValue = "";

			// CreTo
			$this->CreTo->LinkCustomAttributes = "";
			$this->CreTo->HrefValue = "";
			$this->CreTo->TooltipValue = "";

			// Note
			$this->Note->LinkCustomAttributes = "";
			$this->Note->HrefValue = "";
			$this->Note->TooltipValue = "";

			// Sun
			$this->Sun->LinkCustomAttributes = "";
			$this->Sun->HrefValue = "";
			$this->Sun->TooltipValue = "";

			// Mon
			$this->Mon->LinkCustomAttributes = "";
			$this->Mon->HrefValue = "";
			$this->Mon->TooltipValue = "";

			// Tue
			$this->Tue->LinkCustomAttributes = "";
			$this->Tue->HrefValue = "";
			$this->Tue->TooltipValue = "";

			// Wed
			$this->Wed->LinkCustomAttributes = "";
			$this->Wed->HrefValue = "";
			$this->Wed->TooltipValue = "";

			// Thi
			$this->Thi->LinkCustomAttributes = "";
			$this->Thi->HrefValue = "";
			$this->Thi->TooltipValue = "";

			// Fri
			$this->Fri->LinkCustomAttributes = "";
			$this->Fri->HrefValue = "";
			$this->Fri->TooltipValue = "";

			// Sat
			$this->Sat->LinkCustomAttributes = "";
			$this->Sat->HrefValue = "";
			$this->Sat->TooltipValue = "";

			// Days
			$this->Days->LinkCustomAttributes = "";
			$this->Days->HrefValue = "";
			$this->Days->TooltipValue = "";

			// Cutoff
			$this->Cutoff->LinkCustomAttributes = "";
			$this->Cutoff->HrefValue = "";
			$this->Cutoff->TooltipValue = "";

			// FontBold
			$this->FontBold->LinkCustomAttributes = "";
			$this->FontBold->HrefValue = "";
			$this->FontBold->TooltipValue = "";

			// TestHeading
			$this->TestHeading->LinkCustomAttributes = "";
			$this->TestHeading->HrefValue = "";
			$this->TestHeading->TooltipValue = "";

			// Outsource
			$this->Outsource->LinkCustomAttributes = "";
			$this->Outsource->HrefValue = "";
			$this->Outsource->TooltipValue = "";

			// NoResult
			$this->NoResult->LinkCustomAttributes = "";
			$this->NoResult->HrefValue = "";
			$this->NoResult->TooltipValue = "";

			// GraphLow
			$this->GraphLow->LinkCustomAttributes = "";
			$this->GraphLow->HrefValue = "";
			$this->GraphLow->TooltipValue = "";

			// GraphHigh
			$this->GraphHigh->LinkCustomAttributes = "";
			$this->GraphHigh->HrefValue = "";
			$this->GraphHigh->TooltipValue = "";

			// CollSample
			$this->CollSample->LinkCustomAttributes = "";
			$this->CollSample->HrefValue = "";
			$this->CollSample->TooltipValue = "";

			// ProcessTime
			$this->ProcessTime->LinkCustomAttributes = "";
			$this->ProcessTime->HrefValue = "";
			$this->ProcessTime->TooltipValue = "";

			// TamilName
			$this->TamilName->LinkCustomAttributes = "";
			$this->TamilName->HrefValue = "";
			$this->TamilName->TooltipValue = "";

			// ShortName
			$this->ShortName->LinkCustomAttributes = "";
			$this->ShortName->HrefValue = "";
			$this->ShortName->TooltipValue = "";

			// Individual
			$this->Individual->LinkCustomAttributes = "";
			$this->Individual->HrefValue = "";
			$this->Individual->TooltipValue = "";

			// PrevAmt
			$this->PrevAmt->LinkCustomAttributes = "";
			$this->PrevAmt->HrefValue = "";
			$this->PrevAmt->TooltipValue = "";

			// PrevSplAmt
			$this->PrevSplAmt->LinkCustomAttributes = "";
			$this->PrevSplAmt->HrefValue = "";
			$this->PrevSplAmt->TooltipValue = "";

			// Remarks
			$this->Remarks->LinkCustomAttributes = "";
			$this->Remarks->HrefValue = "";
			$this->Remarks->TooltipValue = "";

			// EditDate
			$this->EditDate->LinkCustomAttributes = "";
			$this->EditDate->HrefValue = "";
			$this->EditDate->TooltipValue = "";

			// BillName
			$this->BillName->LinkCustomAttributes = "";
			$this->BillName->HrefValue = "";
			$this->BillName->TooltipValue = "";

			// ActualAmt
			$this->ActualAmt->LinkCustomAttributes = "";
			$this->ActualAmt->HrefValue = "";
			$this->ActualAmt->TooltipValue = "";

			// HISCD
			$this->HISCD->LinkCustomAttributes = "";
			$this->HISCD->HrefValue = "";
			$this->HISCD->TooltipValue = "";

			// PriceList
			$this->PriceList->LinkCustomAttributes = "";
			$this->PriceList->HrefValue = "";
			$this->PriceList->TooltipValue = "";

			// IPAmt
			$this->IPAmt->LinkCustomAttributes = "";
			$this->IPAmt->HrefValue = "";
			$this->IPAmt->TooltipValue = "";

			// InsAmt
			$this->InsAmt->LinkCustomAttributes = "";
			$this->InsAmt->HrefValue = "";
			$this->InsAmt->TooltipValue = "";

			// ManualCD
			$this->ManualCD->LinkCustomAttributes = "";
			$this->ManualCD->HrefValue = "";
			$this->ManualCD->TooltipValue = "";

			// Free
			$this->Free->LinkCustomAttributes = "";
			$this->Free->HrefValue = "";
			$this->Free->TooltipValue = "";

			// AutoAuth
			$this->AutoAuth->LinkCustomAttributes = "";
			$this->AutoAuth->HrefValue = "";
			$this->AutoAuth->TooltipValue = "";

			// ProductCD
			$this->ProductCD->LinkCustomAttributes = "";
			$this->ProductCD->HrefValue = "";
			$this->ProductCD->TooltipValue = "";

			// Inventory
			$this->Inventory->LinkCustomAttributes = "";
			$this->Inventory->HrefValue = "";
			$this->Inventory->TooltipValue = "";

			// IntimateTest
			$this->IntimateTest->LinkCustomAttributes = "";
			$this->IntimateTest->HrefValue = "";
			$this->IntimateTest->TooltipValue = "";

			// Manual
			$this->Manual->LinkCustomAttributes = "";
			$this->Manual->HrefValue = "";
			$this->Manual->TooltipValue = "";
		} elseif ($this->RowType == ROWTYPE_ADD) { // Add row

			// MainDeptCd
			$this->MainDeptCd->EditAttrs["class"] = "form-control";
			$this->MainDeptCd->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->MainDeptCd->CurrentValue = HtmlDecode($this->MainDeptCd->CurrentValue);
			$this->MainDeptCd->EditValue = HtmlEncode($this->MainDeptCd->CurrentValue);
			$this->MainDeptCd->PlaceHolder = RemoveHtml($this->MainDeptCd->caption());

			// DeptCd
			$this->DeptCd->EditAttrs["class"] = "form-control";
			$this->DeptCd->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->DeptCd->CurrentValue = HtmlDecode($this->DeptCd->CurrentValue);
			$this->DeptCd->EditValue = HtmlEncode($this->DeptCd->CurrentValue);
			$this->DeptCd->PlaceHolder = RemoveHtml($this->DeptCd->caption());

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

			// TestName
			$this->TestName->EditAttrs["class"] = "form-control";
			$this->TestName->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->TestName->CurrentValue = HtmlDecode($this->TestName->CurrentValue);
			$this->TestName->EditValue = HtmlEncode($this->TestName->CurrentValue);
			$this->TestName->PlaceHolder = RemoveHtml($this->TestName->caption());

			// XrayPart
			$this->XrayPart->EditAttrs["class"] = "form-control";
			$this->XrayPart->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->XrayPart->CurrentValue = HtmlDecode($this->XrayPart->CurrentValue);
			$this->XrayPart->EditValue = HtmlEncode($this->XrayPart->CurrentValue);
			$this->XrayPart->PlaceHolder = RemoveHtml($this->XrayPart->caption());

			// Method
			$this->Method->EditAttrs["class"] = "form-control";
			$this->Method->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Method->CurrentValue = HtmlDecode($this->Method->CurrentValue);
			$this->Method->EditValue = HtmlEncode($this->Method->CurrentValue);
			$this->Method->PlaceHolder = RemoveHtml($this->Method->caption());

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
			if (REMOVE_XSS)
				$this->Form->CurrentValue = HtmlDecode($this->Form->CurrentValue);
			$this->Form->EditValue = HtmlEncode($this->Form->CurrentValue);
			$this->Form->PlaceHolder = RemoveHtml($this->Form->caption());

			// Amt
			$this->Amt->EditAttrs["class"] = "form-control";
			$this->Amt->EditCustomAttributes = "";
			$this->Amt->EditValue = HtmlEncode($this->Amt->CurrentValue);
			$this->Amt->PlaceHolder = RemoveHtml($this->Amt->caption());
			if (strval($this->Amt->EditValue) <> "" && is_numeric($this->Amt->EditValue))
				$this->Amt->EditValue = FormatNumber($this->Amt->EditValue, -2, -2, -2, -2);

			// SplAmt
			$this->SplAmt->EditAttrs["class"] = "form-control";
			$this->SplAmt->EditCustomAttributes = "";
			$this->SplAmt->EditValue = HtmlEncode($this->SplAmt->CurrentValue);
			$this->SplAmt->PlaceHolder = RemoveHtml($this->SplAmt->caption());
			if (strval($this->SplAmt->EditValue) <> "" && is_numeric($this->SplAmt->EditValue))
				$this->SplAmt->EditValue = FormatNumber($this->SplAmt->EditValue, -2, -2, -2, -2);

			// ResType
			$this->ResType->EditAttrs["class"] = "form-control";
			$this->ResType->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->ResType->CurrentValue = HtmlDecode($this->ResType->CurrentValue);
			$this->ResType->EditValue = HtmlEncode($this->ResType->CurrentValue);
			$this->ResType->PlaceHolder = RemoveHtml($this->ResType->caption());

			// UnitCD
			$this->UnitCD->EditAttrs["class"] = "form-control";
			$this->UnitCD->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->UnitCD->CurrentValue = HtmlDecode($this->UnitCD->CurrentValue);
			$this->UnitCD->EditValue = HtmlEncode($this->UnitCD->CurrentValue);
			$this->UnitCD->PlaceHolder = RemoveHtml($this->UnitCD->caption());

			// RefValue
			$this->RefValue->EditAttrs["class"] = "form-control";
			$this->RefValue->EditCustomAttributes = "";
			$this->RefValue->EditValue = HtmlEncode($this->RefValue->CurrentValue);
			$this->RefValue->PlaceHolder = RemoveHtml($this->RefValue->caption());

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

			// ReagentAmt
			$this->ReagentAmt->EditAttrs["class"] = "form-control";
			$this->ReagentAmt->EditCustomAttributes = "";
			$this->ReagentAmt->EditValue = HtmlEncode($this->ReagentAmt->CurrentValue);
			$this->ReagentAmt->PlaceHolder = RemoveHtml($this->ReagentAmt->caption());
			if (strval($this->ReagentAmt->EditValue) <> "" && is_numeric($this->ReagentAmt->EditValue))
				$this->ReagentAmt->EditValue = FormatNumber($this->ReagentAmt->EditValue, -2, -2, -2, -2);

			// LabAmt
			$this->LabAmt->EditAttrs["class"] = "form-control";
			$this->LabAmt->EditCustomAttributes = "";
			$this->LabAmt->EditValue = HtmlEncode($this->LabAmt->CurrentValue);
			$this->LabAmt->PlaceHolder = RemoveHtml($this->LabAmt->caption());
			if (strval($this->LabAmt->EditValue) <> "" && is_numeric($this->LabAmt->EditValue))
				$this->LabAmt->EditValue = FormatNumber($this->LabAmt->EditValue, -2, -2, -2, -2);

			// RefAmt
			$this->RefAmt->EditAttrs["class"] = "form-control";
			$this->RefAmt->EditCustomAttributes = "";
			$this->RefAmt->EditValue = HtmlEncode($this->RefAmt->CurrentValue);
			$this->RefAmt->PlaceHolder = RemoveHtml($this->RefAmt->caption());
			if (strval($this->RefAmt->EditValue) <> "" && is_numeric($this->RefAmt->EditValue))
				$this->RefAmt->EditValue = FormatNumber($this->RefAmt->EditValue, -2, -2, -2, -2);

			// CreFrom
			$this->CreFrom->EditAttrs["class"] = "form-control";
			$this->CreFrom->EditCustomAttributes = "";
			$this->CreFrom->EditValue = HtmlEncode($this->CreFrom->CurrentValue);
			$this->CreFrom->PlaceHolder = RemoveHtml($this->CreFrom->caption());
			if (strval($this->CreFrom->EditValue) <> "" && is_numeric($this->CreFrom->EditValue))
				$this->CreFrom->EditValue = FormatNumber($this->CreFrom->EditValue, -2, -2, -2, -2);

			// CreTo
			$this->CreTo->EditAttrs["class"] = "form-control";
			$this->CreTo->EditCustomAttributes = "";
			$this->CreTo->EditValue = HtmlEncode($this->CreTo->CurrentValue);
			$this->CreTo->PlaceHolder = RemoveHtml($this->CreTo->caption());
			if (strval($this->CreTo->EditValue) <> "" && is_numeric($this->CreTo->EditValue))
				$this->CreTo->EditValue = FormatNumber($this->CreTo->EditValue, -2, -2, -2, -2);

			// Note
			$this->Note->EditAttrs["class"] = "form-control";
			$this->Note->EditCustomAttributes = "";
			$this->Note->EditValue = HtmlEncode($this->Note->CurrentValue);
			$this->Note->PlaceHolder = RemoveHtml($this->Note->caption());

			// Sun
			$this->Sun->EditAttrs["class"] = "form-control";
			$this->Sun->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Sun->CurrentValue = HtmlDecode($this->Sun->CurrentValue);
			$this->Sun->EditValue = HtmlEncode($this->Sun->CurrentValue);
			$this->Sun->PlaceHolder = RemoveHtml($this->Sun->caption());

			// Mon
			$this->Mon->EditAttrs["class"] = "form-control";
			$this->Mon->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Mon->CurrentValue = HtmlDecode($this->Mon->CurrentValue);
			$this->Mon->EditValue = HtmlEncode($this->Mon->CurrentValue);
			$this->Mon->PlaceHolder = RemoveHtml($this->Mon->caption());

			// Tue
			$this->Tue->EditAttrs["class"] = "form-control";
			$this->Tue->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Tue->CurrentValue = HtmlDecode($this->Tue->CurrentValue);
			$this->Tue->EditValue = HtmlEncode($this->Tue->CurrentValue);
			$this->Tue->PlaceHolder = RemoveHtml($this->Tue->caption());

			// Wed
			$this->Wed->EditAttrs["class"] = "form-control";
			$this->Wed->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Wed->CurrentValue = HtmlDecode($this->Wed->CurrentValue);
			$this->Wed->EditValue = HtmlEncode($this->Wed->CurrentValue);
			$this->Wed->PlaceHolder = RemoveHtml($this->Wed->caption());

			// Thi
			$this->Thi->EditAttrs["class"] = "form-control";
			$this->Thi->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Thi->CurrentValue = HtmlDecode($this->Thi->CurrentValue);
			$this->Thi->EditValue = HtmlEncode($this->Thi->CurrentValue);
			$this->Thi->PlaceHolder = RemoveHtml($this->Thi->caption());

			// Fri
			$this->Fri->EditAttrs["class"] = "form-control";
			$this->Fri->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Fri->CurrentValue = HtmlDecode($this->Fri->CurrentValue);
			$this->Fri->EditValue = HtmlEncode($this->Fri->CurrentValue);
			$this->Fri->PlaceHolder = RemoveHtml($this->Fri->caption());

			// Sat
			$this->Sat->EditAttrs["class"] = "form-control";
			$this->Sat->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Sat->CurrentValue = HtmlDecode($this->Sat->CurrentValue);
			$this->Sat->EditValue = HtmlEncode($this->Sat->CurrentValue);
			$this->Sat->PlaceHolder = RemoveHtml($this->Sat->caption());

			// Days
			$this->Days->EditAttrs["class"] = "form-control";
			$this->Days->EditCustomAttributes = "";
			$this->Days->EditValue = HtmlEncode($this->Days->CurrentValue);
			$this->Days->PlaceHolder = RemoveHtml($this->Days->caption());
			if (strval($this->Days->EditValue) <> "" && is_numeric($this->Days->EditValue))
				$this->Days->EditValue = FormatNumber($this->Days->EditValue, -2, -2, -2, -2);

			// Cutoff
			$this->Cutoff->EditAttrs["class"] = "form-control";
			$this->Cutoff->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Cutoff->CurrentValue = HtmlDecode($this->Cutoff->CurrentValue);
			$this->Cutoff->EditValue = HtmlEncode($this->Cutoff->CurrentValue);
			$this->Cutoff->PlaceHolder = RemoveHtml($this->Cutoff->caption());

			// FontBold
			$this->FontBold->EditAttrs["class"] = "form-control";
			$this->FontBold->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->FontBold->CurrentValue = HtmlDecode($this->FontBold->CurrentValue);
			$this->FontBold->EditValue = HtmlEncode($this->FontBold->CurrentValue);
			$this->FontBold->PlaceHolder = RemoveHtml($this->FontBold->caption());

			// TestHeading
			$this->TestHeading->EditAttrs["class"] = "form-control";
			$this->TestHeading->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->TestHeading->CurrentValue = HtmlDecode($this->TestHeading->CurrentValue);
			$this->TestHeading->EditValue = HtmlEncode($this->TestHeading->CurrentValue);
			$this->TestHeading->PlaceHolder = RemoveHtml($this->TestHeading->caption());

			// Outsource
			$this->Outsource->EditAttrs["class"] = "form-control";
			$this->Outsource->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Outsource->CurrentValue = HtmlDecode($this->Outsource->CurrentValue);
			$this->Outsource->EditValue = HtmlEncode($this->Outsource->CurrentValue);
			$this->Outsource->PlaceHolder = RemoveHtml($this->Outsource->caption());

			// NoResult
			$this->NoResult->EditAttrs["class"] = "form-control";
			$this->NoResult->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->NoResult->CurrentValue = HtmlDecode($this->NoResult->CurrentValue);
			$this->NoResult->EditValue = HtmlEncode($this->NoResult->CurrentValue);
			$this->NoResult->PlaceHolder = RemoveHtml($this->NoResult->caption());

			// GraphLow
			$this->GraphLow->EditAttrs["class"] = "form-control";
			$this->GraphLow->EditCustomAttributes = "";
			$this->GraphLow->EditValue = HtmlEncode($this->GraphLow->CurrentValue);
			$this->GraphLow->PlaceHolder = RemoveHtml($this->GraphLow->caption());
			if (strval($this->GraphLow->EditValue) <> "" && is_numeric($this->GraphLow->EditValue))
				$this->GraphLow->EditValue = FormatNumber($this->GraphLow->EditValue, -2, -2, -2, -2);

			// GraphHigh
			$this->GraphHigh->EditAttrs["class"] = "form-control";
			$this->GraphHigh->EditCustomAttributes = "";
			$this->GraphHigh->EditValue = HtmlEncode($this->GraphHigh->CurrentValue);
			$this->GraphHigh->PlaceHolder = RemoveHtml($this->GraphHigh->caption());
			if (strval($this->GraphHigh->EditValue) <> "" && is_numeric($this->GraphHigh->EditValue))
				$this->GraphHigh->EditValue = FormatNumber($this->GraphHigh->EditValue, -2, -2, -2, -2);

			// CollSample
			$this->CollSample->EditAttrs["class"] = "form-control";
			$this->CollSample->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->CollSample->CurrentValue = HtmlDecode($this->CollSample->CurrentValue);
			$this->CollSample->EditValue = HtmlEncode($this->CollSample->CurrentValue);
			$this->CollSample->PlaceHolder = RemoveHtml($this->CollSample->caption());

			// ProcessTime
			$this->ProcessTime->EditAttrs["class"] = "form-control";
			$this->ProcessTime->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->ProcessTime->CurrentValue = HtmlDecode($this->ProcessTime->CurrentValue);
			$this->ProcessTime->EditValue = HtmlEncode($this->ProcessTime->CurrentValue);
			$this->ProcessTime->PlaceHolder = RemoveHtml($this->ProcessTime->caption());

			// TamilName
			$this->TamilName->EditAttrs["class"] = "form-control";
			$this->TamilName->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->TamilName->CurrentValue = HtmlDecode($this->TamilName->CurrentValue);
			$this->TamilName->EditValue = HtmlEncode($this->TamilName->CurrentValue);
			$this->TamilName->PlaceHolder = RemoveHtml($this->TamilName->caption());

			// ShortName
			$this->ShortName->EditAttrs["class"] = "form-control";
			$this->ShortName->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->ShortName->CurrentValue = HtmlDecode($this->ShortName->CurrentValue);
			$this->ShortName->EditValue = HtmlEncode($this->ShortName->CurrentValue);
			$this->ShortName->PlaceHolder = RemoveHtml($this->ShortName->caption());

			// Individual
			$this->Individual->EditAttrs["class"] = "form-control";
			$this->Individual->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Individual->CurrentValue = HtmlDecode($this->Individual->CurrentValue);
			$this->Individual->EditValue = HtmlEncode($this->Individual->CurrentValue);
			$this->Individual->PlaceHolder = RemoveHtml($this->Individual->caption());

			// PrevAmt
			$this->PrevAmt->EditAttrs["class"] = "form-control";
			$this->PrevAmt->EditCustomAttributes = "";
			$this->PrevAmt->EditValue = HtmlEncode($this->PrevAmt->CurrentValue);
			$this->PrevAmt->PlaceHolder = RemoveHtml($this->PrevAmt->caption());
			if (strval($this->PrevAmt->EditValue) <> "" && is_numeric($this->PrevAmt->EditValue))
				$this->PrevAmt->EditValue = FormatNumber($this->PrevAmt->EditValue, -2, -2, -2, -2);

			// PrevSplAmt
			$this->PrevSplAmt->EditAttrs["class"] = "form-control";
			$this->PrevSplAmt->EditCustomAttributes = "";
			$this->PrevSplAmt->EditValue = HtmlEncode($this->PrevSplAmt->CurrentValue);
			$this->PrevSplAmt->PlaceHolder = RemoveHtml($this->PrevSplAmt->caption());
			if (strval($this->PrevSplAmt->EditValue) <> "" && is_numeric($this->PrevSplAmt->EditValue))
				$this->PrevSplAmt->EditValue = FormatNumber($this->PrevSplAmt->EditValue, -2, -2, -2, -2);

			// Remarks
			$this->Remarks->EditAttrs["class"] = "form-control";
			$this->Remarks->EditCustomAttributes = "";
			$this->Remarks->EditValue = HtmlEncode($this->Remarks->CurrentValue);
			$this->Remarks->PlaceHolder = RemoveHtml($this->Remarks->caption());

			// EditDate
			$this->EditDate->EditAttrs["class"] = "form-control";
			$this->EditDate->EditCustomAttributes = "";
			$this->EditDate->EditValue = HtmlEncode(FormatDateTime($this->EditDate->CurrentValue, 8));
			$this->EditDate->PlaceHolder = RemoveHtml($this->EditDate->caption());

			// BillName
			$this->BillName->EditAttrs["class"] = "form-control";
			$this->BillName->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->BillName->CurrentValue = HtmlDecode($this->BillName->CurrentValue);
			$this->BillName->EditValue = HtmlEncode($this->BillName->CurrentValue);
			$this->BillName->PlaceHolder = RemoveHtml($this->BillName->caption());

			// ActualAmt
			$this->ActualAmt->EditAttrs["class"] = "form-control";
			$this->ActualAmt->EditCustomAttributes = "";
			$this->ActualAmt->EditValue = HtmlEncode($this->ActualAmt->CurrentValue);
			$this->ActualAmt->PlaceHolder = RemoveHtml($this->ActualAmt->caption());
			if (strval($this->ActualAmt->EditValue) <> "" && is_numeric($this->ActualAmt->EditValue))
				$this->ActualAmt->EditValue = FormatNumber($this->ActualAmt->EditValue, -2, -2, -2, -2);

			// HISCD
			$this->HISCD->EditAttrs["class"] = "form-control";
			$this->HISCD->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->HISCD->CurrentValue = HtmlDecode($this->HISCD->CurrentValue);
			$this->HISCD->EditValue = HtmlEncode($this->HISCD->CurrentValue);
			$this->HISCD->PlaceHolder = RemoveHtml($this->HISCD->caption());

			// PriceList
			$this->PriceList->EditAttrs["class"] = "form-control";
			$this->PriceList->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->PriceList->CurrentValue = HtmlDecode($this->PriceList->CurrentValue);
			$this->PriceList->EditValue = HtmlEncode($this->PriceList->CurrentValue);
			$this->PriceList->PlaceHolder = RemoveHtml($this->PriceList->caption());

			// IPAmt
			$this->IPAmt->EditAttrs["class"] = "form-control";
			$this->IPAmt->EditCustomAttributes = "";
			$this->IPAmt->EditValue = HtmlEncode($this->IPAmt->CurrentValue);
			$this->IPAmt->PlaceHolder = RemoveHtml($this->IPAmt->caption());
			if (strval($this->IPAmt->EditValue) <> "" && is_numeric($this->IPAmt->EditValue))
				$this->IPAmt->EditValue = FormatNumber($this->IPAmt->EditValue, -2, -2, -2, -2);

			// InsAmt
			$this->InsAmt->EditAttrs["class"] = "form-control";
			$this->InsAmt->EditCustomAttributes = "";
			$this->InsAmt->EditValue = HtmlEncode($this->InsAmt->CurrentValue);
			$this->InsAmt->PlaceHolder = RemoveHtml($this->InsAmt->caption());
			if (strval($this->InsAmt->EditValue) <> "" && is_numeric($this->InsAmt->EditValue))
				$this->InsAmt->EditValue = FormatNumber($this->InsAmt->EditValue, -2, -2, -2, -2);

			// ManualCD
			$this->ManualCD->EditAttrs["class"] = "form-control";
			$this->ManualCD->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->ManualCD->CurrentValue = HtmlDecode($this->ManualCD->CurrentValue);
			$this->ManualCD->EditValue = HtmlEncode($this->ManualCD->CurrentValue);
			$this->ManualCD->PlaceHolder = RemoveHtml($this->ManualCD->caption());

			// Free
			$this->Free->EditAttrs["class"] = "form-control";
			$this->Free->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Free->CurrentValue = HtmlDecode($this->Free->CurrentValue);
			$this->Free->EditValue = HtmlEncode($this->Free->CurrentValue);
			$this->Free->PlaceHolder = RemoveHtml($this->Free->caption());

			// AutoAuth
			$this->AutoAuth->EditAttrs["class"] = "form-control";
			$this->AutoAuth->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->AutoAuth->CurrentValue = HtmlDecode($this->AutoAuth->CurrentValue);
			$this->AutoAuth->EditValue = HtmlEncode($this->AutoAuth->CurrentValue);
			$this->AutoAuth->PlaceHolder = RemoveHtml($this->AutoAuth->caption());

			// ProductCD
			$this->ProductCD->EditAttrs["class"] = "form-control";
			$this->ProductCD->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->ProductCD->CurrentValue = HtmlDecode($this->ProductCD->CurrentValue);
			$this->ProductCD->EditValue = HtmlEncode($this->ProductCD->CurrentValue);
			$this->ProductCD->PlaceHolder = RemoveHtml($this->ProductCD->caption());

			// Inventory
			$this->Inventory->EditAttrs["class"] = "form-control";
			$this->Inventory->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Inventory->CurrentValue = HtmlDecode($this->Inventory->CurrentValue);
			$this->Inventory->EditValue = HtmlEncode($this->Inventory->CurrentValue);
			$this->Inventory->PlaceHolder = RemoveHtml($this->Inventory->caption());

			// IntimateTest
			$this->IntimateTest->EditAttrs["class"] = "form-control";
			$this->IntimateTest->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->IntimateTest->CurrentValue = HtmlDecode($this->IntimateTest->CurrentValue);
			$this->IntimateTest->EditValue = HtmlEncode($this->IntimateTest->CurrentValue);
			$this->IntimateTest->PlaceHolder = RemoveHtml($this->IntimateTest->caption());

			// Manual
			$this->Manual->EditAttrs["class"] = "form-control";
			$this->Manual->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Manual->CurrentValue = HtmlDecode($this->Manual->CurrentValue);
			$this->Manual->EditValue = HtmlEncode($this->Manual->CurrentValue);
			$this->Manual->PlaceHolder = RemoveHtml($this->Manual->caption());

			// Add refer script
			// MainDeptCd

			$this->MainDeptCd->LinkCustomAttributes = "";
			$this->MainDeptCd->HrefValue = "";

			// DeptCd
			$this->DeptCd->LinkCustomAttributes = "";
			$this->DeptCd->HrefValue = "";

			// TestCd
			$this->TestCd->LinkCustomAttributes = "";
			$this->TestCd->HrefValue = "";

			// TestSubCd
			$this->TestSubCd->LinkCustomAttributes = "";
			$this->TestSubCd->HrefValue = "";

			// TestName
			$this->TestName->LinkCustomAttributes = "";
			$this->TestName->HrefValue = "";

			// XrayPart
			$this->XrayPart->LinkCustomAttributes = "";
			$this->XrayPart->HrefValue = "";

			// Method
			$this->Method->LinkCustomAttributes = "";
			$this->Method->HrefValue = "";

			// Order
			$this->Order->LinkCustomAttributes = "";
			$this->Order->HrefValue = "";

			// Form
			$this->Form->LinkCustomAttributes = "";
			$this->Form->HrefValue = "";

			// Amt
			$this->Amt->LinkCustomAttributes = "";
			$this->Amt->HrefValue = "";

			// SplAmt
			$this->SplAmt->LinkCustomAttributes = "";
			$this->SplAmt->HrefValue = "";

			// ResType
			$this->ResType->LinkCustomAttributes = "";
			$this->ResType->HrefValue = "";

			// UnitCD
			$this->UnitCD->LinkCustomAttributes = "";
			$this->UnitCD->HrefValue = "";

			// RefValue
			$this->RefValue->LinkCustomAttributes = "";
			$this->RefValue->HrefValue = "";

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

			// ReagentAmt
			$this->ReagentAmt->LinkCustomAttributes = "";
			$this->ReagentAmt->HrefValue = "";

			// LabAmt
			$this->LabAmt->LinkCustomAttributes = "";
			$this->LabAmt->HrefValue = "";

			// RefAmt
			$this->RefAmt->LinkCustomAttributes = "";
			$this->RefAmt->HrefValue = "";

			// CreFrom
			$this->CreFrom->LinkCustomAttributes = "";
			$this->CreFrom->HrefValue = "";

			// CreTo
			$this->CreTo->LinkCustomAttributes = "";
			$this->CreTo->HrefValue = "";

			// Note
			$this->Note->LinkCustomAttributes = "";
			$this->Note->HrefValue = "";

			// Sun
			$this->Sun->LinkCustomAttributes = "";
			$this->Sun->HrefValue = "";

			// Mon
			$this->Mon->LinkCustomAttributes = "";
			$this->Mon->HrefValue = "";

			// Tue
			$this->Tue->LinkCustomAttributes = "";
			$this->Tue->HrefValue = "";

			// Wed
			$this->Wed->LinkCustomAttributes = "";
			$this->Wed->HrefValue = "";

			// Thi
			$this->Thi->LinkCustomAttributes = "";
			$this->Thi->HrefValue = "";

			// Fri
			$this->Fri->LinkCustomAttributes = "";
			$this->Fri->HrefValue = "";

			// Sat
			$this->Sat->LinkCustomAttributes = "";
			$this->Sat->HrefValue = "";

			// Days
			$this->Days->LinkCustomAttributes = "";
			$this->Days->HrefValue = "";

			// Cutoff
			$this->Cutoff->LinkCustomAttributes = "";
			$this->Cutoff->HrefValue = "";

			// FontBold
			$this->FontBold->LinkCustomAttributes = "";
			$this->FontBold->HrefValue = "";

			// TestHeading
			$this->TestHeading->LinkCustomAttributes = "";
			$this->TestHeading->HrefValue = "";

			// Outsource
			$this->Outsource->LinkCustomAttributes = "";
			$this->Outsource->HrefValue = "";

			// NoResult
			$this->NoResult->LinkCustomAttributes = "";
			$this->NoResult->HrefValue = "";

			// GraphLow
			$this->GraphLow->LinkCustomAttributes = "";
			$this->GraphLow->HrefValue = "";

			// GraphHigh
			$this->GraphHigh->LinkCustomAttributes = "";
			$this->GraphHigh->HrefValue = "";

			// CollSample
			$this->CollSample->LinkCustomAttributes = "";
			$this->CollSample->HrefValue = "";

			// ProcessTime
			$this->ProcessTime->LinkCustomAttributes = "";
			$this->ProcessTime->HrefValue = "";

			// TamilName
			$this->TamilName->LinkCustomAttributes = "";
			$this->TamilName->HrefValue = "";

			// ShortName
			$this->ShortName->LinkCustomAttributes = "";
			$this->ShortName->HrefValue = "";

			// Individual
			$this->Individual->LinkCustomAttributes = "";
			$this->Individual->HrefValue = "";

			// PrevAmt
			$this->PrevAmt->LinkCustomAttributes = "";
			$this->PrevAmt->HrefValue = "";

			// PrevSplAmt
			$this->PrevSplAmt->LinkCustomAttributes = "";
			$this->PrevSplAmt->HrefValue = "";

			// Remarks
			$this->Remarks->LinkCustomAttributes = "";
			$this->Remarks->HrefValue = "";

			// EditDate
			$this->EditDate->LinkCustomAttributes = "";
			$this->EditDate->HrefValue = "";

			// BillName
			$this->BillName->LinkCustomAttributes = "";
			$this->BillName->HrefValue = "";

			// ActualAmt
			$this->ActualAmt->LinkCustomAttributes = "";
			$this->ActualAmt->HrefValue = "";

			// HISCD
			$this->HISCD->LinkCustomAttributes = "";
			$this->HISCD->HrefValue = "";

			// PriceList
			$this->PriceList->LinkCustomAttributes = "";
			$this->PriceList->HrefValue = "";

			// IPAmt
			$this->IPAmt->LinkCustomAttributes = "";
			$this->IPAmt->HrefValue = "";

			// InsAmt
			$this->InsAmt->LinkCustomAttributes = "";
			$this->InsAmt->HrefValue = "";

			// ManualCD
			$this->ManualCD->LinkCustomAttributes = "";
			$this->ManualCD->HrefValue = "";

			// Free
			$this->Free->LinkCustomAttributes = "";
			$this->Free->HrefValue = "";

			// AutoAuth
			$this->AutoAuth->LinkCustomAttributes = "";
			$this->AutoAuth->HrefValue = "";

			// ProductCD
			$this->ProductCD->LinkCustomAttributes = "";
			$this->ProductCD->HrefValue = "";

			// Inventory
			$this->Inventory->LinkCustomAttributes = "";
			$this->Inventory->HrefValue = "";

			// IntimateTest
			$this->IntimateTest->LinkCustomAttributes = "";
			$this->IntimateTest->HrefValue = "";

			// Manual
			$this->Manual->LinkCustomAttributes = "";
			$this->Manual->HrefValue = "";
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
		if ($this->MainDeptCd->Required) {
			if (!$this->MainDeptCd->IsDetailKey && $this->MainDeptCd->FormValue != NULL && $this->MainDeptCd->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->MainDeptCd->caption(), $this->MainDeptCd->RequiredErrorMessage));
			}
		}
		if ($this->DeptCd->Required) {
			if (!$this->DeptCd->IsDetailKey && $this->DeptCd->FormValue != NULL && $this->DeptCd->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->DeptCd->caption(), $this->DeptCd->RequiredErrorMessage));
			}
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
		if ($this->TestName->Required) {
			if (!$this->TestName->IsDetailKey && $this->TestName->FormValue != NULL && $this->TestName->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->TestName->caption(), $this->TestName->RequiredErrorMessage));
			}
		}
		if ($this->XrayPart->Required) {
			if (!$this->XrayPart->IsDetailKey && $this->XrayPart->FormValue != NULL && $this->XrayPart->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->XrayPart->caption(), $this->XrayPart->RequiredErrorMessage));
			}
		}
		if ($this->Method->Required) {
			if (!$this->Method->IsDetailKey && $this->Method->FormValue != NULL && $this->Method->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Method->caption(), $this->Method->RequiredErrorMessage));
			}
		}
		if ($this->Order->Required) {
			if (!$this->Order->IsDetailKey && $this->Order->FormValue != NULL && $this->Order->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Order->caption(), $this->Order->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->Order->FormValue)) {
			AddMessage($FormError, $this->Order->errorMessage());
		}
		if ($this->Form->Required) {
			if (!$this->Form->IsDetailKey && $this->Form->FormValue != NULL && $this->Form->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Form->caption(), $this->Form->RequiredErrorMessage));
			}
		}
		if ($this->Amt->Required) {
			if (!$this->Amt->IsDetailKey && $this->Amt->FormValue != NULL && $this->Amt->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Amt->caption(), $this->Amt->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->Amt->FormValue)) {
			AddMessage($FormError, $this->Amt->errorMessage());
		}
		if ($this->SplAmt->Required) {
			if (!$this->SplAmt->IsDetailKey && $this->SplAmt->FormValue != NULL && $this->SplAmt->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->SplAmt->caption(), $this->SplAmt->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->SplAmt->FormValue)) {
			AddMessage($FormError, $this->SplAmt->errorMessage());
		}
		if ($this->ResType->Required) {
			if (!$this->ResType->IsDetailKey && $this->ResType->FormValue != NULL && $this->ResType->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->ResType->caption(), $this->ResType->RequiredErrorMessage));
			}
		}
		if ($this->UnitCD->Required) {
			if (!$this->UnitCD->IsDetailKey && $this->UnitCD->FormValue != NULL && $this->UnitCD->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->UnitCD->caption(), $this->UnitCD->RequiredErrorMessage));
			}
		}
		if ($this->RefValue->Required) {
			if (!$this->RefValue->IsDetailKey && $this->RefValue->FormValue != NULL && $this->RefValue->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->RefValue->caption(), $this->RefValue->RequiredErrorMessage));
			}
		}
		if ($this->Sample->Required) {
			if (!$this->Sample->IsDetailKey && $this->Sample->FormValue != NULL && $this->Sample->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Sample->caption(), $this->Sample->RequiredErrorMessage));
			}
		}
		if ($this->NoD->Required) {
			if (!$this->NoD->IsDetailKey && $this->NoD->FormValue != NULL && $this->NoD->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->NoD->caption(), $this->NoD->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->NoD->FormValue)) {
			AddMessage($FormError, $this->NoD->errorMessage());
		}
		if ($this->BillOrder->Required) {
			if (!$this->BillOrder->IsDetailKey && $this->BillOrder->FormValue != NULL && $this->BillOrder->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->BillOrder->caption(), $this->BillOrder->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->BillOrder->FormValue)) {
			AddMessage($FormError, $this->BillOrder->errorMessage());
		}
		if ($this->Formula->Required) {
			if (!$this->Formula->IsDetailKey && $this->Formula->FormValue != NULL && $this->Formula->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Formula->caption(), $this->Formula->RequiredErrorMessage));
			}
		}
		if ($this->Inactive->Required) {
			if (!$this->Inactive->IsDetailKey && $this->Inactive->FormValue != NULL && $this->Inactive->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Inactive->caption(), $this->Inactive->RequiredErrorMessage));
			}
		}
		if ($this->ReagentAmt->Required) {
			if (!$this->ReagentAmt->IsDetailKey && $this->ReagentAmt->FormValue != NULL && $this->ReagentAmt->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->ReagentAmt->caption(), $this->ReagentAmt->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->ReagentAmt->FormValue)) {
			AddMessage($FormError, $this->ReagentAmt->errorMessage());
		}
		if ($this->LabAmt->Required) {
			if (!$this->LabAmt->IsDetailKey && $this->LabAmt->FormValue != NULL && $this->LabAmt->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->LabAmt->caption(), $this->LabAmt->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->LabAmt->FormValue)) {
			AddMessage($FormError, $this->LabAmt->errorMessage());
		}
		if ($this->RefAmt->Required) {
			if (!$this->RefAmt->IsDetailKey && $this->RefAmt->FormValue != NULL && $this->RefAmt->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->RefAmt->caption(), $this->RefAmt->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->RefAmt->FormValue)) {
			AddMessage($FormError, $this->RefAmt->errorMessage());
		}
		if ($this->CreFrom->Required) {
			if (!$this->CreFrom->IsDetailKey && $this->CreFrom->FormValue != NULL && $this->CreFrom->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->CreFrom->caption(), $this->CreFrom->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->CreFrom->FormValue)) {
			AddMessage($FormError, $this->CreFrom->errorMessage());
		}
		if ($this->CreTo->Required) {
			if (!$this->CreTo->IsDetailKey && $this->CreTo->FormValue != NULL && $this->CreTo->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->CreTo->caption(), $this->CreTo->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->CreTo->FormValue)) {
			AddMessage($FormError, $this->CreTo->errorMessage());
		}
		if ($this->Note->Required) {
			if (!$this->Note->IsDetailKey && $this->Note->FormValue != NULL && $this->Note->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Note->caption(), $this->Note->RequiredErrorMessage));
			}
		}
		if ($this->Sun->Required) {
			if (!$this->Sun->IsDetailKey && $this->Sun->FormValue != NULL && $this->Sun->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Sun->caption(), $this->Sun->RequiredErrorMessage));
			}
		}
		if ($this->Mon->Required) {
			if (!$this->Mon->IsDetailKey && $this->Mon->FormValue != NULL && $this->Mon->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Mon->caption(), $this->Mon->RequiredErrorMessage));
			}
		}
		if ($this->Tue->Required) {
			if (!$this->Tue->IsDetailKey && $this->Tue->FormValue != NULL && $this->Tue->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Tue->caption(), $this->Tue->RequiredErrorMessage));
			}
		}
		if ($this->Wed->Required) {
			if (!$this->Wed->IsDetailKey && $this->Wed->FormValue != NULL && $this->Wed->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Wed->caption(), $this->Wed->RequiredErrorMessage));
			}
		}
		if ($this->Thi->Required) {
			if (!$this->Thi->IsDetailKey && $this->Thi->FormValue != NULL && $this->Thi->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Thi->caption(), $this->Thi->RequiredErrorMessage));
			}
		}
		if ($this->Fri->Required) {
			if (!$this->Fri->IsDetailKey && $this->Fri->FormValue != NULL && $this->Fri->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Fri->caption(), $this->Fri->RequiredErrorMessage));
			}
		}
		if ($this->Sat->Required) {
			if (!$this->Sat->IsDetailKey && $this->Sat->FormValue != NULL && $this->Sat->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Sat->caption(), $this->Sat->RequiredErrorMessage));
			}
		}
		if ($this->Days->Required) {
			if (!$this->Days->IsDetailKey && $this->Days->FormValue != NULL && $this->Days->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Days->caption(), $this->Days->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->Days->FormValue)) {
			AddMessage($FormError, $this->Days->errorMessage());
		}
		if ($this->Cutoff->Required) {
			if (!$this->Cutoff->IsDetailKey && $this->Cutoff->FormValue != NULL && $this->Cutoff->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Cutoff->caption(), $this->Cutoff->RequiredErrorMessage));
			}
		}
		if ($this->FontBold->Required) {
			if (!$this->FontBold->IsDetailKey && $this->FontBold->FormValue != NULL && $this->FontBold->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->FontBold->caption(), $this->FontBold->RequiredErrorMessage));
			}
		}
		if ($this->TestHeading->Required) {
			if (!$this->TestHeading->IsDetailKey && $this->TestHeading->FormValue != NULL && $this->TestHeading->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->TestHeading->caption(), $this->TestHeading->RequiredErrorMessage));
			}
		}
		if ($this->Outsource->Required) {
			if (!$this->Outsource->IsDetailKey && $this->Outsource->FormValue != NULL && $this->Outsource->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Outsource->caption(), $this->Outsource->RequiredErrorMessage));
			}
		}
		if ($this->NoResult->Required) {
			if (!$this->NoResult->IsDetailKey && $this->NoResult->FormValue != NULL && $this->NoResult->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->NoResult->caption(), $this->NoResult->RequiredErrorMessage));
			}
		}
		if ($this->GraphLow->Required) {
			if (!$this->GraphLow->IsDetailKey && $this->GraphLow->FormValue != NULL && $this->GraphLow->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->GraphLow->caption(), $this->GraphLow->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->GraphLow->FormValue)) {
			AddMessage($FormError, $this->GraphLow->errorMessage());
		}
		if ($this->GraphHigh->Required) {
			if (!$this->GraphHigh->IsDetailKey && $this->GraphHigh->FormValue != NULL && $this->GraphHigh->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->GraphHigh->caption(), $this->GraphHigh->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->GraphHigh->FormValue)) {
			AddMessage($FormError, $this->GraphHigh->errorMessage());
		}
		if ($this->CollSample->Required) {
			if (!$this->CollSample->IsDetailKey && $this->CollSample->FormValue != NULL && $this->CollSample->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->CollSample->caption(), $this->CollSample->RequiredErrorMessage));
			}
		}
		if ($this->ProcessTime->Required) {
			if (!$this->ProcessTime->IsDetailKey && $this->ProcessTime->FormValue != NULL && $this->ProcessTime->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->ProcessTime->caption(), $this->ProcessTime->RequiredErrorMessage));
			}
		}
		if ($this->TamilName->Required) {
			if (!$this->TamilName->IsDetailKey && $this->TamilName->FormValue != NULL && $this->TamilName->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->TamilName->caption(), $this->TamilName->RequiredErrorMessage));
			}
		}
		if ($this->ShortName->Required) {
			if (!$this->ShortName->IsDetailKey && $this->ShortName->FormValue != NULL && $this->ShortName->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->ShortName->caption(), $this->ShortName->RequiredErrorMessage));
			}
		}
		if ($this->Individual->Required) {
			if (!$this->Individual->IsDetailKey && $this->Individual->FormValue != NULL && $this->Individual->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Individual->caption(), $this->Individual->RequiredErrorMessage));
			}
		}
		if ($this->PrevAmt->Required) {
			if (!$this->PrevAmt->IsDetailKey && $this->PrevAmt->FormValue != NULL && $this->PrevAmt->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PrevAmt->caption(), $this->PrevAmt->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->PrevAmt->FormValue)) {
			AddMessage($FormError, $this->PrevAmt->errorMessage());
		}
		if ($this->PrevSplAmt->Required) {
			if (!$this->PrevSplAmt->IsDetailKey && $this->PrevSplAmt->FormValue != NULL && $this->PrevSplAmt->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PrevSplAmt->caption(), $this->PrevSplAmt->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->PrevSplAmt->FormValue)) {
			AddMessage($FormError, $this->PrevSplAmt->errorMessage());
		}
		if ($this->Remarks->Required) {
			if (!$this->Remarks->IsDetailKey && $this->Remarks->FormValue != NULL && $this->Remarks->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Remarks->caption(), $this->Remarks->RequiredErrorMessage));
			}
		}
		if ($this->EditDate->Required) {
			if (!$this->EditDate->IsDetailKey && $this->EditDate->FormValue != NULL && $this->EditDate->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->EditDate->caption(), $this->EditDate->RequiredErrorMessage));
			}
		}
		if (!CheckDate($this->EditDate->FormValue)) {
			AddMessage($FormError, $this->EditDate->errorMessage());
		}
		if ($this->BillName->Required) {
			if (!$this->BillName->IsDetailKey && $this->BillName->FormValue != NULL && $this->BillName->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->BillName->caption(), $this->BillName->RequiredErrorMessage));
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
		if ($this->HISCD->Required) {
			if (!$this->HISCD->IsDetailKey && $this->HISCD->FormValue != NULL && $this->HISCD->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->HISCD->caption(), $this->HISCD->RequiredErrorMessage));
			}
		}
		if ($this->PriceList->Required) {
			if (!$this->PriceList->IsDetailKey && $this->PriceList->FormValue != NULL && $this->PriceList->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PriceList->caption(), $this->PriceList->RequiredErrorMessage));
			}
		}
		if ($this->IPAmt->Required) {
			if (!$this->IPAmt->IsDetailKey && $this->IPAmt->FormValue != NULL && $this->IPAmt->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->IPAmt->caption(), $this->IPAmt->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->IPAmt->FormValue)) {
			AddMessage($FormError, $this->IPAmt->errorMessage());
		}
		if ($this->InsAmt->Required) {
			if (!$this->InsAmt->IsDetailKey && $this->InsAmt->FormValue != NULL && $this->InsAmt->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->InsAmt->caption(), $this->InsAmt->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->InsAmt->FormValue)) {
			AddMessage($FormError, $this->InsAmt->errorMessage());
		}
		if ($this->ManualCD->Required) {
			if (!$this->ManualCD->IsDetailKey && $this->ManualCD->FormValue != NULL && $this->ManualCD->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->ManualCD->caption(), $this->ManualCD->RequiredErrorMessage));
			}
		}
		if ($this->Free->Required) {
			if (!$this->Free->IsDetailKey && $this->Free->FormValue != NULL && $this->Free->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Free->caption(), $this->Free->RequiredErrorMessage));
			}
		}
		if ($this->AutoAuth->Required) {
			if (!$this->AutoAuth->IsDetailKey && $this->AutoAuth->FormValue != NULL && $this->AutoAuth->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->AutoAuth->caption(), $this->AutoAuth->RequiredErrorMessage));
			}
		}
		if ($this->ProductCD->Required) {
			if (!$this->ProductCD->IsDetailKey && $this->ProductCD->FormValue != NULL && $this->ProductCD->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->ProductCD->caption(), $this->ProductCD->RequiredErrorMessage));
			}
		}
		if ($this->Inventory->Required) {
			if (!$this->Inventory->IsDetailKey && $this->Inventory->FormValue != NULL && $this->Inventory->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Inventory->caption(), $this->Inventory->RequiredErrorMessage));
			}
		}
		if ($this->IntimateTest->Required) {
			if (!$this->IntimateTest->IsDetailKey && $this->IntimateTest->FormValue != NULL && $this->IntimateTest->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->IntimateTest->caption(), $this->IntimateTest->RequiredErrorMessage));
			}
		}
		if ($this->Manual->Required) {
			if (!$this->Manual->IsDetailKey && $this->Manual->FormValue != NULL && $this->Manual->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Manual->caption(), $this->Manual->RequiredErrorMessage));
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

		// MainDeptCd
		$this->MainDeptCd->setDbValueDef($rsnew, $this->MainDeptCd->CurrentValue, NULL, FALSE);

		// DeptCd
		$this->DeptCd->setDbValueDef($rsnew, $this->DeptCd->CurrentValue, NULL, FALSE);

		// TestCd
		$this->TestCd->setDbValueDef($rsnew, $this->TestCd->CurrentValue, NULL, FALSE);

		// TestSubCd
		$this->TestSubCd->setDbValueDef($rsnew, $this->TestSubCd->CurrentValue, NULL, FALSE);

		// TestName
		$this->TestName->setDbValueDef($rsnew, $this->TestName->CurrentValue, NULL, FALSE);

		// XrayPart
		$this->XrayPart->setDbValueDef($rsnew, $this->XrayPart->CurrentValue, NULL, FALSE);

		// Method
		$this->Method->setDbValueDef($rsnew, $this->Method->CurrentValue, NULL, FALSE);

		// Order
		$this->Order->setDbValueDef($rsnew, $this->Order->CurrentValue, NULL, FALSE);

		// Form
		$this->Form->setDbValueDef($rsnew, $this->Form->CurrentValue, NULL, FALSE);

		// Amt
		$this->Amt->setDbValueDef($rsnew, $this->Amt->CurrentValue, NULL, FALSE);

		// SplAmt
		$this->SplAmt->setDbValueDef($rsnew, $this->SplAmt->CurrentValue, NULL, FALSE);

		// ResType
		$this->ResType->setDbValueDef($rsnew, $this->ResType->CurrentValue, NULL, FALSE);

		// UnitCD
		$this->UnitCD->setDbValueDef($rsnew, $this->UnitCD->CurrentValue, NULL, FALSE);

		// RefValue
		$this->RefValue->setDbValueDef($rsnew, $this->RefValue->CurrentValue, NULL, FALSE);

		// Sample
		$this->Sample->setDbValueDef($rsnew, $this->Sample->CurrentValue, NULL, FALSE);

		// NoD
		$this->NoD->setDbValueDef($rsnew, $this->NoD->CurrentValue, NULL, FALSE);

		// BillOrder
		$this->BillOrder->setDbValueDef($rsnew, $this->BillOrder->CurrentValue, NULL, FALSE);

		// Formula
		$this->Formula->setDbValueDef($rsnew, $this->Formula->CurrentValue, NULL, FALSE);

		// Inactive
		$this->Inactive->setDbValueDef($rsnew, $this->Inactive->CurrentValue, NULL, FALSE);

		// ReagentAmt
		$this->ReagentAmt->setDbValueDef($rsnew, $this->ReagentAmt->CurrentValue, NULL, FALSE);

		// LabAmt
		$this->LabAmt->setDbValueDef($rsnew, $this->LabAmt->CurrentValue, NULL, FALSE);

		// RefAmt
		$this->RefAmt->setDbValueDef($rsnew, $this->RefAmt->CurrentValue, NULL, FALSE);

		// CreFrom
		$this->CreFrom->setDbValueDef($rsnew, $this->CreFrom->CurrentValue, NULL, FALSE);

		// CreTo
		$this->CreTo->setDbValueDef($rsnew, $this->CreTo->CurrentValue, NULL, FALSE);

		// Note
		$this->Note->setDbValueDef($rsnew, $this->Note->CurrentValue, NULL, FALSE);

		// Sun
		$this->Sun->setDbValueDef($rsnew, $this->Sun->CurrentValue, NULL, FALSE);

		// Mon
		$this->Mon->setDbValueDef($rsnew, $this->Mon->CurrentValue, NULL, FALSE);

		// Tue
		$this->Tue->setDbValueDef($rsnew, $this->Tue->CurrentValue, NULL, FALSE);

		// Wed
		$this->Wed->setDbValueDef($rsnew, $this->Wed->CurrentValue, NULL, FALSE);

		// Thi
		$this->Thi->setDbValueDef($rsnew, $this->Thi->CurrentValue, NULL, FALSE);

		// Fri
		$this->Fri->setDbValueDef($rsnew, $this->Fri->CurrentValue, NULL, FALSE);

		// Sat
		$this->Sat->setDbValueDef($rsnew, $this->Sat->CurrentValue, NULL, FALSE);

		// Days
		$this->Days->setDbValueDef($rsnew, $this->Days->CurrentValue, NULL, FALSE);

		// Cutoff
		$this->Cutoff->setDbValueDef($rsnew, $this->Cutoff->CurrentValue, NULL, FALSE);

		// FontBold
		$this->FontBold->setDbValueDef($rsnew, $this->FontBold->CurrentValue, NULL, FALSE);

		// TestHeading
		$this->TestHeading->setDbValueDef($rsnew, $this->TestHeading->CurrentValue, NULL, FALSE);

		// Outsource
		$this->Outsource->setDbValueDef($rsnew, $this->Outsource->CurrentValue, NULL, FALSE);

		// NoResult
		$this->NoResult->setDbValueDef($rsnew, $this->NoResult->CurrentValue, NULL, FALSE);

		// GraphLow
		$this->GraphLow->setDbValueDef($rsnew, $this->GraphLow->CurrentValue, NULL, FALSE);

		// GraphHigh
		$this->GraphHigh->setDbValueDef($rsnew, $this->GraphHigh->CurrentValue, NULL, FALSE);

		// CollSample
		$this->CollSample->setDbValueDef($rsnew, $this->CollSample->CurrentValue, NULL, FALSE);

		// ProcessTime
		$this->ProcessTime->setDbValueDef($rsnew, $this->ProcessTime->CurrentValue, NULL, FALSE);

		// TamilName
		$this->TamilName->setDbValueDef($rsnew, $this->TamilName->CurrentValue, NULL, FALSE);

		// ShortName
		$this->ShortName->setDbValueDef($rsnew, $this->ShortName->CurrentValue, NULL, FALSE);

		// Individual
		$this->Individual->setDbValueDef($rsnew, $this->Individual->CurrentValue, NULL, FALSE);

		// PrevAmt
		$this->PrevAmt->setDbValueDef($rsnew, $this->PrevAmt->CurrentValue, NULL, FALSE);

		// PrevSplAmt
		$this->PrevSplAmt->setDbValueDef($rsnew, $this->PrevSplAmt->CurrentValue, NULL, FALSE);

		// Remarks
		$this->Remarks->setDbValueDef($rsnew, $this->Remarks->CurrentValue, NULL, FALSE);

		// EditDate
		$this->EditDate->setDbValueDef($rsnew, UnFormatDateTime($this->EditDate->CurrentValue, 0), NULL, FALSE);

		// BillName
		$this->BillName->setDbValueDef($rsnew, $this->BillName->CurrentValue, NULL, FALSE);

		// ActualAmt
		$this->ActualAmt->setDbValueDef($rsnew, $this->ActualAmt->CurrentValue, NULL, FALSE);

		// HISCD
		$this->HISCD->setDbValueDef($rsnew, $this->HISCD->CurrentValue, NULL, FALSE);

		// PriceList
		$this->PriceList->setDbValueDef($rsnew, $this->PriceList->CurrentValue, NULL, FALSE);

		// IPAmt
		$this->IPAmt->setDbValueDef($rsnew, $this->IPAmt->CurrentValue, NULL, FALSE);

		// InsAmt
		$this->InsAmt->setDbValueDef($rsnew, $this->InsAmt->CurrentValue, NULL, FALSE);

		// ManualCD
		$this->ManualCD->setDbValueDef($rsnew, $this->ManualCD->CurrentValue, NULL, FALSE);

		// Free
		$this->Free->setDbValueDef($rsnew, $this->Free->CurrentValue, NULL, FALSE);

		// AutoAuth
		$this->AutoAuth->setDbValueDef($rsnew, $this->AutoAuth->CurrentValue, NULL, FALSE);

		// ProductCD
		$this->ProductCD->setDbValueDef($rsnew, $this->ProductCD->CurrentValue, NULL, FALSE);

		// Inventory
		$this->Inventory->setDbValueDef($rsnew, $this->Inventory->CurrentValue, NULL, FALSE);

		// IntimateTest
		$this->IntimateTest->setDbValueDef($rsnew, $this->IntimateTest->CurrentValue, NULL, FALSE);

		// Manual
		$this->Manual->setDbValueDef($rsnew, $this->Manual->CurrentValue, NULL, FALSE);

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
		$Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("test_masterlist.php"), "", $this->TableVar, TRUE);
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
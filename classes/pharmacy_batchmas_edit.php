<?php
namespace PHPMaker2019\HIMS;

/**
 * Page class
 */
class pharmacy_batchmas_edit extends pharmacy_batchmas
{

	// Page ID
	public $PageID = "edit";

	// Project ID
	public $ProjectID = "{EA4F6D13-AF8F-428D-9EA7-BA88D1107EC3}";

	// Table name
	public $TableName = 'pharmacy_batchmas';

	// Page object name
	public $PageObjName = "pharmacy_batchmas_edit";

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

		// Table object (pharmacy_batchmas)
		if (!isset($GLOBALS["pharmacy_batchmas"]) || get_class($GLOBALS["pharmacy_batchmas"]) == PROJECT_NAMESPACE . "pharmacy_batchmas") {
			$GLOBALS["pharmacy_batchmas"] = &$this;
			$GLOBALS["Table"] = &$GLOBALS["pharmacy_batchmas"];
		}
		$this->CancelUrl = $this->pageUrl() . "action=cancel";

		// Table object (user_login)
		if (!isset($GLOBALS['user_login']))
			$GLOBALS['user_login'] = new user_login();

		// Page ID
		if (!defined(PROJECT_NAMESPACE . "PAGE_ID"))
			define(PROJECT_NAMESPACE . "PAGE_ID", 'edit');

		// Table name (for backward compatibility)
		if (!defined(PROJECT_NAMESPACE . "TABLE_NAME"))
			define(PROJECT_NAMESPACE . "TABLE_NAME", 'pharmacy_batchmas');

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
		global $EXPORT, $pharmacy_batchmas;
		if ($this->CustomExport && $this->CustomExport == $this->Export && array_key_exists($this->CustomExport, $EXPORT)) {
				$content = ob_get_contents();
			if ($ExportFileName == "")
				$ExportFileName = $this->TableVar;
			$class = PROJECT_NAMESPACE . $EXPORT[$this->CustomExport];
			if (class_exists($class)) {
				$doc = new $class($pharmacy_batchmas);
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
					if ($pageName == "pharmacy_batchmasview.php")
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
	public $FormClassName = "ew-horizontal ew-form ew-edit-form";
	public $IsModal = FALSE;
	public $IsMobileOrModal = FALSE;
	public $DbMasterFilter;
	public $DbDetailFilter;

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
					$this->terminate(GetUrl("pharmacy_batchmaslist.php"));
				else
					$this->terminate(GetUrl("login.php"));
				return;
			}
		}

		// Create form object
		$CurrentForm = new HttpForm();
		$this->CurrentAction = Param("action"); // Set up current action
		$this->PRC->setVisibility();
		$this->PrName->setVisibility();
		$this->BATCHNO->setVisibility();
		$this->BATCH->setVisibility();
		$this->MFRCODE->setVisibility();
		$this->EXPDT->setVisibility();
		$this->PRCODE->setVisibility();
		$this->OQ->setVisibility();
		$this->RQ->setVisibility();
		$this->FRQ->setVisibility();
		$this->IQ->setVisibility();
		$this->MRQ->setVisibility();
		$this->MRP->setVisibility();
		$this->UR->setVisibility();
		$this->PC->setVisibility();
		$this->OLDRT->setVisibility();
		$this->TEMPMRQ->setVisibility();
		$this->TAXP->setVisibility();
		$this->OLDRATE->setVisibility();
		$this->NEWRATE->setVisibility();
		$this->OTEMPMRA->setVisibility();
		$this->ACTIVESTATUS->setVisibility();
		$this->id->setVisibility();
		$this->PSGST->setVisibility();
		$this->PCGST->setVisibility();
		$this->SSGST->setVisibility();
		$this->SCGST->setVisibility();
		$this->RT->setVisibility();
		$this->BRCODE->setVisibility();
		$this->HospID->setVisibility();
		$this->UM->setVisibility();
		$this->GENNAME->setVisibility();
		$this->BILLDATE->setVisibility();
		$this->PUnit->setVisibility();
		$this->SUnit->setVisibility();
		$this->PurValue->setVisibility();
		$this->PurRate->setVisibility();
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
		$this->setupLookupOptions($this->PrName);
		$this->setupLookupOptions($this->BRCODE);

		// Check modal
		if ($this->IsModal)
			$SkipHeaderFooter = TRUE;
		$this->IsMobileOrModal = IsMobile() || $this->IsModal;
		$this->FormClassName = "ew-form ew-edit-form ew-horizontal";
		$loaded = FALSE;
		$postBack = FALSE;

		// Set up current action and primary key
		if (IsApi()) {
			$this->CurrentAction = "update"; // Update record directly
			$postBack = TRUE;
		} elseif (Post("action") !== NULL) {
			$this->CurrentAction = Post("action"); // Get action code
			if (!$this->isShow()) // Not reload record, handle as postback
				$postBack = TRUE;

			// Load key from Form
			if ($CurrentForm->hasValue("x_id")) {
				$this->id->setFormValue($CurrentForm->getValue("x_id"));
			}
		} else {
			$this->CurrentAction = "show"; // Default action is display

			// Load key from QueryString
			$loadByQuery = FALSE;
			if (Get("id") !== NULL) {
				$this->id->setQueryStringValue(Get("id"));
				$loadByQuery = TRUE;
			} else {
				$this->id->CurrentValue = NULL;
			}
		}

		// Load current record
		$loaded = $this->loadRow();

		// Process form if post back
		if ($postBack) {
			$this->loadFormValues(); // Get form values
		}

		// Validate form if post back
		if ($postBack) {
			if (!$this->validateForm()) {
				$this->setFailureMessage($FormError);
				$this->EventCancelled = TRUE; // Event cancelled
				$this->restoreFormValues();
				if (IsApi()) {
					$this->terminate();
					return;
				} else {
					$this->CurrentAction = ""; // Form error, reset action
				}
			}
		}

		// Perform current action
		switch ($this->CurrentAction) {
			case "show": // Get a record to display
				if (!$loaded) { // Load record based on key
					if ($this->getFailureMessage() == "")
						$this->setFailureMessage($Language->phrase("NoRecord")); // No record found
					$this->terminate("pharmacy_batchmaslist.php"); // No matching record, return to list
				}
				break;
			case "update": // Update
				$returnUrl = $this->getReturnUrl();
				if (GetPageName($returnUrl) == "pharmacy_batchmaslist.php")
					$returnUrl = $this->addMasterUrl($returnUrl); // List page, return to List page with correct master key if necessary
				$this->SendEmail = TRUE; // Send email on update success
				if ($this->editRow()) { // Update record based on key
					if ($this->getSuccessMessage() == "")
						$this->setSuccessMessage($Language->phrase("UpdateSuccess")); // Update success
					if (IsApi()) {
						$this->terminate(TRUE);
						return;
					} else {
						$this->terminate($returnUrl); // Return to caller
					}
				} elseif (IsApi()) { // API request, return
					$this->terminate();
					return;
				} elseif ($this->getFailureMessage() == $Language->phrase("NoRecord")) {
					$this->terminate($returnUrl); // Return to caller
				} else {
					$this->EventCancelled = TRUE; // Event cancelled
					$this->restoreFormValues(); // Restore form values if update failed
				}
		}

		// Set up Breadcrumb
		$this->setupBreadcrumb();

		// Render the record
		$this->RowType = ROWTYPE_EDIT; // Render as Edit
		$this->resetAttributes();
		$this->renderRow();
	}

	// Set up starting record parameters
	public function setupStartRec()
	{
		if ($this->DisplayRecs == 0)
			return;
		if ($this->isPageRequest()) { // Validate request
			if (Get(TABLE_START_REC) !== NULL) { // Check for "start" parameter
				$this->StartRec = Get(TABLE_START_REC);
				$this->setStartRecordNumber($this->StartRec);
			} elseif (Get(TABLE_PAGE_NO) !== NULL) {
				$pageNo = Get(TABLE_PAGE_NO);
				if (is_numeric($pageNo)) {
					$this->StartRec = ($pageNo - 1) * $this->DisplayRecs + 1;
					if ($this->StartRec <= 0) {
						$this->StartRec = 1;
					} elseif ($this->StartRec >= (int)(($this->TotalRecs - 1)/$this->DisplayRecs) * $this->DisplayRecs + 1) {
						$this->StartRec = (int)(($this->TotalRecs - 1)/$this->DisplayRecs) * $this->DisplayRecs + 1;
					}
					$this->setStartRecordNumber($this->StartRec);
				}
			}
		}
		$this->StartRec = $this->getStartRecordNumber();

		// Check if correct start record counter
		if (!is_numeric($this->StartRec) || $this->StartRec == "") { // Avoid invalid start record counter
			$this->StartRec = 1; // Reset start record counter
			$this->setStartRecordNumber($this->StartRec);
		} elseif ($this->StartRec > $this->TotalRecs) { // Avoid starting record > total records
			$this->StartRec = (int)(($this->TotalRecs - 1)/$this->DisplayRecs) * $this->DisplayRecs + 1; // Point to last page first record
			$this->setStartRecordNumber($this->StartRec);
		} elseif (($this->StartRec - 1) % $this->DisplayRecs <> 0) {
			$this->StartRec = (int)(($this->StartRec - 1)/$this->DisplayRecs) * $this->DisplayRecs + 1; // Point to page boundary
			$this->setStartRecordNumber($this->StartRec);
		}
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

		// Check field name 'PRC' first before field var 'x_PRC'
		$val = $CurrentForm->hasValue("PRC") ? $CurrentForm->getValue("PRC") : $CurrentForm->getValue("x_PRC");
		if (!$this->PRC->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->PRC->Visible = FALSE; // Disable update for API request
			else
				$this->PRC->setFormValue($val);
		}

		// Check field name 'PrName' first before field var 'x_PrName'
		$val = $CurrentForm->hasValue("PrName") ? $CurrentForm->getValue("PrName") : $CurrentForm->getValue("x_PrName");
		if (!$this->PrName->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->PrName->Visible = FALSE; // Disable update for API request
			else
				$this->PrName->setFormValue($val);
		}

		// Check field name 'BATCHNO' first before field var 'x_BATCHNO'
		$val = $CurrentForm->hasValue("BATCHNO") ? $CurrentForm->getValue("BATCHNO") : $CurrentForm->getValue("x_BATCHNO");
		if (!$this->BATCHNO->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->BATCHNO->Visible = FALSE; // Disable update for API request
			else
				$this->BATCHNO->setFormValue($val);
		}

		// Check field name 'BATCH' first before field var 'x_BATCH'
		$val = $CurrentForm->hasValue("BATCH") ? $CurrentForm->getValue("BATCH") : $CurrentForm->getValue("x_BATCH");
		if (!$this->BATCH->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->BATCH->Visible = FALSE; // Disable update for API request
			else
				$this->BATCH->setFormValue($val);
		}

		// Check field name 'MFRCODE' first before field var 'x_MFRCODE'
		$val = $CurrentForm->hasValue("MFRCODE") ? $CurrentForm->getValue("MFRCODE") : $CurrentForm->getValue("x_MFRCODE");
		if (!$this->MFRCODE->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->MFRCODE->Visible = FALSE; // Disable update for API request
			else
				$this->MFRCODE->setFormValue($val);
		}

		// Check field name 'EXPDT' first before field var 'x_EXPDT'
		$val = $CurrentForm->hasValue("EXPDT") ? $CurrentForm->getValue("EXPDT") : $CurrentForm->getValue("x_EXPDT");
		if (!$this->EXPDT->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->EXPDT->Visible = FALSE; // Disable update for API request
			else
				$this->EXPDT->setFormValue($val);
			$this->EXPDT->CurrentValue = UnFormatDateTime($this->EXPDT->CurrentValue, 0);
		}

		// Check field name 'PRCODE' first before field var 'x_PRCODE'
		$val = $CurrentForm->hasValue("PRCODE") ? $CurrentForm->getValue("PRCODE") : $CurrentForm->getValue("x_PRCODE");
		if (!$this->PRCODE->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->PRCODE->Visible = FALSE; // Disable update for API request
			else
				$this->PRCODE->setFormValue($val);
		}

		// Check field name 'OQ' first before field var 'x_OQ'
		$val = $CurrentForm->hasValue("OQ") ? $CurrentForm->getValue("OQ") : $CurrentForm->getValue("x_OQ");
		if (!$this->OQ->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->OQ->Visible = FALSE; // Disable update for API request
			else
				$this->OQ->setFormValue($val);
		}

		// Check field name 'RQ' first before field var 'x_RQ'
		$val = $CurrentForm->hasValue("RQ") ? $CurrentForm->getValue("RQ") : $CurrentForm->getValue("x_RQ");
		if (!$this->RQ->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->RQ->Visible = FALSE; // Disable update for API request
			else
				$this->RQ->setFormValue($val);
		}

		// Check field name 'FRQ' first before field var 'x_FRQ'
		$val = $CurrentForm->hasValue("FRQ") ? $CurrentForm->getValue("FRQ") : $CurrentForm->getValue("x_FRQ");
		if (!$this->FRQ->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->FRQ->Visible = FALSE; // Disable update for API request
			else
				$this->FRQ->setFormValue($val);
		}

		// Check field name 'IQ' first before field var 'x_IQ'
		$val = $CurrentForm->hasValue("IQ") ? $CurrentForm->getValue("IQ") : $CurrentForm->getValue("x_IQ");
		if (!$this->IQ->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->IQ->Visible = FALSE; // Disable update for API request
			else
				$this->IQ->setFormValue($val);
		}

		// Check field name 'MRQ' first before field var 'x_MRQ'
		$val = $CurrentForm->hasValue("MRQ") ? $CurrentForm->getValue("MRQ") : $CurrentForm->getValue("x_MRQ");
		if (!$this->MRQ->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->MRQ->Visible = FALSE; // Disable update for API request
			else
				$this->MRQ->setFormValue($val);
		}

		// Check field name 'MRP' first before field var 'x_MRP'
		$val = $CurrentForm->hasValue("MRP") ? $CurrentForm->getValue("MRP") : $CurrentForm->getValue("x_MRP");
		if (!$this->MRP->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->MRP->Visible = FALSE; // Disable update for API request
			else
				$this->MRP->setFormValue($val);
		}

		// Check field name 'UR' first before field var 'x_UR'
		$val = $CurrentForm->hasValue("UR") ? $CurrentForm->getValue("UR") : $CurrentForm->getValue("x_UR");
		if (!$this->UR->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->UR->Visible = FALSE; // Disable update for API request
			else
				$this->UR->setFormValue($val);
		}

		// Check field name 'PC' first before field var 'x_PC'
		$val = $CurrentForm->hasValue("PC") ? $CurrentForm->getValue("PC") : $CurrentForm->getValue("x_PC");
		if (!$this->PC->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->PC->Visible = FALSE; // Disable update for API request
			else
				$this->PC->setFormValue($val);
		}

		// Check field name 'OLDRT' first before field var 'x_OLDRT'
		$val = $CurrentForm->hasValue("OLDRT") ? $CurrentForm->getValue("OLDRT") : $CurrentForm->getValue("x_OLDRT");
		if (!$this->OLDRT->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->OLDRT->Visible = FALSE; // Disable update for API request
			else
				$this->OLDRT->setFormValue($val);
		}

		// Check field name 'TEMPMRQ' first before field var 'x_TEMPMRQ'
		$val = $CurrentForm->hasValue("TEMPMRQ") ? $CurrentForm->getValue("TEMPMRQ") : $CurrentForm->getValue("x_TEMPMRQ");
		if (!$this->TEMPMRQ->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->TEMPMRQ->Visible = FALSE; // Disable update for API request
			else
				$this->TEMPMRQ->setFormValue($val);
		}

		// Check field name 'TAXP' first before field var 'x_TAXP'
		$val = $CurrentForm->hasValue("TAXP") ? $CurrentForm->getValue("TAXP") : $CurrentForm->getValue("x_TAXP");
		if (!$this->TAXP->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->TAXP->Visible = FALSE; // Disable update for API request
			else
				$this->TAXP->setFormValue($val);
		}

		// Check field name 'OLDRATE' first before field var 'x_OLDRATE'
		$val = $CurrentForm->hasValue("OLDRATE") ? $CurrentForm->getValue("OLDRATE") : $CurrentForm->getValue("x_OLDRATE");
		if (!$this->OLDRATE->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->OLDRATE->Visible = FALSE; // Disable update for API request
			else
				$this->OLDRATE->setFormValue($val);
		}

		// Check field name 'NEWRATE' first before field var 'x_NEWRATE'
		$val = $CurrentForm->hasValue("NEWRATE") ? $CurrentForm->getValue("NEWRATE") : $CurrentForm->getValue("x_NEWRATE");
		if (!$this->NEWRATE->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->NEWRATE->Visible = FALSE; // Disable update for API request
			else
				$this->NEWRATE->setFormValue($val);
		}

		// Check field name 'OTEMPMRA' first before field var 'x_OTEMPMRA'
		$val = $CurrentForm->hasValue("OTEMPMRA") ? $CurrentForm->getValue("OTEMPMRA") : $CurrentForm->getValue("x_OTEMPMRA");
		if (!$this->OTEMPMRA->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->OTEMPMRA->Visible = FALSE; // Disable update for API request
			else
				$this->OTEMPMRA->setFormValue($val);
		}

		// Check field name 'ACTIVESTATUS' first before field var 'x_ACTIVESTATUS'
		$val = $CurrentForm->hasValue("ACTIVESTATUS") ? $CurrentForm->getValue("ACTIVESTATUS") : $CurrentForm->getValue("x_ACTIVESTATUS");
		if (!$this->ACTIVESTATUS->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->ACTIVESTATUS->Visible = FALSE; // Disable update for API request
			else
				$this->ACTIVESTATUS->setFormValue($val);
		}

		// Check field name 'id' first before field var 'x_id'
		$val = $CurrentForm->hasValue("id") ? $CurrentForm->getValue("id") : $CurrentForm->getValue("x_id");
		if (!$this->id->IsDetailKey)
			$this->id->setFormValue($val);

		// Check field name 'PSGST' first before field var 'x_PSGST'
		$val = $CurrentForm->hasValue("PSGST") ? $CurrentForm->getValue("PSGST") : $CurrentForm->getValue("x_PSGST");
		if (!$this->PSGST->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->PSGST->Visible = FALSE; // Disable update for API request
			else
				$this->PSGST->setFormValue($val);
		}

		// Check field name 'PCGST' first before field var 'x_PCGST'
		$val = $CurrentForm->hasValue("PCGST") ? $CurrentForm->getValue("PCGST") : $CurrentForm->getValue("x_PCGST");
		if (!$this->PCGST->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->PCGST->Visible = FALSE; // Disable update for API request
			else
				$this->PCGST->setFormValue($val);
		}

		// Check field name 'SSGST' first before field var 'x_SSGST'
		$val = $CurrentForm->hasValue("SSGST") ? $CurrentForm->getValue("SSGST") : $CurrentForm->getValue("x_SSGST");
		if (!$this->SSGST->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->SSGST->Visible = FALSE; // Disable update for API request
			else
				$this->SSGST->setFormValue($val);
		}

		// Check field name 'SCGST' first before field var 'x_SCGST'
		$val = $CurrentForm->hasValue("SCGST") ? $CurrentForm->getValue("SCGST") : $CurrentForm->getValue("x_SCGST");
		if (!$this->SCGST->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->SCGST->Visible = FALSE; // Disable update for API request
			else
				$this->SCGST->setFormValue($val);
		}

		// Check field name 'RT' first before field var 'x_RT'
		$val = $CurrentForm->hasValue("RT") ? $CurrentForm->getValue("RT") : $CurrentForm->getValue("x_RT");
		if (!$this->RT->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->RT->Visible = FALSE; // Disable update for API request
			else
				$this->RT->setFormValue($val);
		}

		// Check field name 'BRCODE' first before field var 'x_BRCODE'
		$val = $CurrentForm->hasValue("BRCODE") ? $CurrentForm->getValue("BRCODE") : $CurrentForm->getValue("x_BRCODE");
		if (!$this->BRCODE->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->BRCODE->Visible = FALSE; // Disable update for API request
			else
				$this->BRCODE->setFormValue($val);
		}

		// Check field name 'HospID' first before field var 'x_HospID'
		$val = $CurrentForm->hasValue("HospID") ? $CurrentForm->getValue("HospID") : $CurrentForm->getValue("x_HospID");
		if (!$this->HospID->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->HospID->Visible = FALSE; // Disable update for API request
			else
				$this->HospID->setFormValue($val);
		}

		// Check field name 'UM' first before field var 'x_UM'
		$val = $CurrentForm->hasValue("UM") ? $CurrentForm->getValue("UM") : $CurrentForm->getValue("x_UM");
		if (!$this->UM->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->UM->Visible = FALSE; // Disable update for API request
			else
				$this->UM->setFormValue($val);
		}

		// Check field name 'GENNAME' first before field var 'x_GENNAME'
		$val = $CurrentForm->hasValue("GENNAME") ? $CurrentForm->getValue("GENNAME") : $CurrentForm->getValue("x_GENNAME");
		if (!$this->GENNAME->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->GENNAME->Visible = FALSE; // Disable update for API request
			else
				$this->GENNAME->setFormValue($val);
		}

		// Check field name 'BILLDATE' first before field var 'x_BILLDATE'
		$val = $CurrentForm->hasValue("BILLDATE") ? $CurrentForm->getValue("BILLDATE") : $CurrentForm->getValue("x_BILLDATE");
		if (!$this->BILLDATE->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->BILLDATE->Visible = FALSE; // Disable update for API request
			else
				$this->BILLDATE->setFormValue($val);
			$this->BILLDATE->CurrentValue = UnFormatDateTime($this->BILLDATE->CurrentValue, 0);
		}

		// Check field name 'PUnit' first before field var 'x_PUnit'
		$val = $CurrentForm->hasValue("PUnit") ? $CurrentForm->getValue("PUnit") : $CurrentForm->getValue("x_PUnit");
		if (!$this->PUnit->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->PUnit->Visible = FALSE; // Disable update for API request
			else
				$this->PUnit->setFormValue($val);
		}

		// Check field name 'SUnit' first before field var 'x_SUnit'
		$val = $CurrentForm->hasValue("SUnit") ? $CurrentForm->getValue("SUnit") : $CurrentForm->getValue("x_SUnit");
		if (!$this->SUnit->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->SUnit->Visible = FALSE; // Disable update for API request
			else
				$this->SUnit->setFormValue($val);
		}

		// Check field name 'PurValue' first before field var 'x_PurValue'
		$val = $CurrentForm->hasValue("PurValue") ? $CurrentForm->getValue("PurValue") : $CurrentForm->getValue("x_PurValue");
		if (!$this->PurValue->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->PurValue->Visible = FALSE; // Disable update for API request
			else
				$this->PurValue->setFormValue($val);
		}

		// Check field name 'PurRate' first before field var 'x_PurRate'
		$val = $CurrentForm->hasValue("PurRate") ? $CurrentForm->getValue("PurRate") : $CurrentForm->getValue("x_PurRate");
		if (!$this->PurRate->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->PurRate->Visible = FALSE; // Disable update for API request
			else
				$this->PurRate->setFormValue($val);
		}
	}

	// Restore form values
	public function restoreFormValues()
	{
		global $CurrentForm;
		$this->PRC->CurrentValue = $this->PRC->FormValue;
		$this->PrName->CurrentValue = $this->PrName->FormValue;
		$this->BATCHNO->CurrentValue = $this->BATCHNO->FormValue;
		$this->BATCH->CurrentValue = $this->BATCH->FormValue;
		$this->MFRCODE->CurrentValue = $this->MFRCODE->FormValue;
		$this->EXPDT->CurrentValue = $this->EXPDT->FormValue;
		$this->EXPDT->CurrentValue = UnFormatDateTime($this->EXPDT->CurrentValue, 0);
		$this->PRCODE->CurrentValue = $this->PRCODE->FormValue;
		$this->OQ->CurrentValue = $this->OQ->FormValue;
		$this->RQ->CurrentValue = $this->RQ->FormValue;
		$this->FRQ->CurrentValue = $this->FRQ->FormValue;
		$this->IQ->CurrentValue = $this->IQ->FormValue;
		$this->MRQ->CurrentValue = $this->MRQ->FormValue;
		$this->MRP->CurrentValue = $this->MRP->FormValue;
		$this->UR->CurrentValue = $this->UR->FormValue;
		$this->PC->CurrentValue = $this->PC->FormValue;
		$this->OLDRT->CurrentValue = $this->OLDRT->FormValue;
		$this->TEMPMRQ->CurrentValue = $this->TEMPMRQ->FormValue;
		$this->TAXP->CurrentValue = $this->TAXP->FormValue;
		$this->OLDRATE->CurrentValue = $this->OLDRATE->FormValue;
		$this->NEWRATE->CurrentValue = $this->NEWRATE->FormValue;
		$this->OTEMPMRA->CurrentValue = $this->OTEMPMRA->FormValue;
		$this->ACTIVESTATUS->CurrentValue = $this->ACTIVESTATUS->FormValue;
		$this->id->CurrentValue = $this->id->FormValue;
		$this->PSGST->CurrentValue = $this->PSGST->FormValue;
		$this->PCGST->CurrentValue = $this->PCGST->FormValue;
		$this->SSGST->CurrentValue = $this->SSGST->FormValue;
		$this->SCGST->CurrentValue = $this->SCGST->FormValue;
		$this->RT->CurrentValue = $this->RT->FormValue;
		$this->BRCODE->CurrentValue = $this->BRCODE->FormValue;
		$this->HospID->CurrentValue = $this->HospID->FormValue;
		$this->UM->CurrentValue = $this->UM->FormValue;
		$this->GENNAME->CurrentValue = $this->GENNAME->FormValue;
		$this->BILLDATE->CurrentValue = $this->BILLDATE->FormValue;
		$this->BILLDATE->CurrentValue = UnFormatDateTime($this->BILLDATE->CurrentValue, 0);
		$this->PUnit->CurrentValue = $this->PUnit->FormValue;
		$this->SUnit->CurrentValue = $this->SUnit->FormValue;
		$this->PurValue->CurrentValue = $this->PurValue->FormValue;
		$this->PurRate->CurrentValue = $this->PurRate->FormValue;
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
		$this->PRC->setDbValue($row['PRC']);
		$this->PrName->setDbValue($row['PrName']);
		$this->BATCHNO->setDbValue($row['BATCHNO']);
		$this->BATCH->setDbValue($row['BATCH']);
		$this->MFRCODE->setDbValue($row['MFRCODE']);
		$this->EXPDT->setDbValue($row['EXPDT']);
		$this->PRCODE->setDbValue($row['PRCODE']);
		$this->OQ->setDbValue($row['OQ']);
		$this->RQ->setDbValue($row['RQ']);
		$this->FRQ->setDbValue($row['FRQ']);
		$this->IQ->setDbValue($row['IQ']);
		$this->MRQ->setDbValue($row['MRQ']);
		$this->MRP->setDbValue($row['MRP']);
		$this->UR->setDbValue($row['UR']);
		$this->PC->setDbValue($row['PC']);
		$this->OLDRT->setDbValue($row['OLDRT']);
		$this->TEMPMRQ->setDbValue($row['TEMPMRQ']);
		$this->TAXP->setDbValue($row['TAXP']);
		$this->OLDRATE->setDbValue($row['OLDRATE']);
		$this->NEWRATE->setDbValue($row['NEWRATE']);
		$this->OTEMPMRA->setDbValue($row['OTEMPMRA']);
		$this->ACTIVESTATUS->setDbValue($row['ACTIVESTATUS']);
		$this->id->setDbValue($row['id']);
		$this->PSGST->setDbValue($row['PSGST']);
		$this->PCGST->setDbValue($row['PCGST']);
		$this->SSGST->setDbValue($row['SSGST']);
		$this->SCGST->setDbValue($row['SCGST']);
		$this->RT->setDbValue($row['RT']);
		$this->BRCODE->setDbValue($row['BRCODE']);
		$this->HospID->setDbValue($row['HospID']);
		$this->UM->setDbValue($row['UM']);
		$this->GENNAME->setDbValue($row['GENNAME']);
		$this->BILLDATE->setDbValue($row['BILLDATE']);
		$this->PUnit->setDbValue($row['PUnit']);
		$this->SUnit->setDbValue($row['SUnit']);
		$this->PurValue->setDbValue($row['PurValue']);
		$this->PurRate->setDbValue($row['PurRate']);
	}

	// Return a row with default values
	protected function newRow()
	{
		$row = [];
		$row['PRC'] = NULL;
		$row['PrName'] = NULL;
		$row['BATCHNO'] = NULL;
		$row['BATCH'] = NULL;
		$row['MFRCODE'] = NULL;
		$row['EXPDT'] = NULL;
		$row['PRCODE'] = NULL;
		$row['OQ'] = NULL;
		$row['RQ'] = NULL;
		$row['FRQ'] = NULL;
		$row['IQ'] = NULL;
		$row['MRQ'] = NULL;
		$row['MRP'] = NULL;
		$row['UR'] = NULL;
		$row['PC'] = NULL;
		$row['OLDRT'] = NULL;
		$row['TEMPMRQ'] = NULL;
		$row['TAXP'] = NULL;
		$row['OLDRATE'] = NULL;
		$row['NEWRATE'] = NULL;
		$row['OTEMPMRA'] = NULL;
		$row['ACTIVESTATUS'] = NULL;
		$row['id'] = NULL;
		$row['PSGST'] = NULL;
		$row['PCGST'] = NULL;
		$row['SSGST'] = NULL;
		$row['SCGST'] = NULL;
		$row['RT'] = NULL;
		$row['BRCODE'] = NULL;
		$row['HospID'] = NULL;
		$row['UM'] = NULL;
		$row['GENNAME'] = NULL;
		$row['BILLDATE'] = NULL;
		$row['PUnit'] = NULL;
		$row['SUnit'] = NULL;
		$row['PurValue'] = NULL;
		$row['PurRate'] = NULL;
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

		if ($this->OQ->FormValue == $this->OQ->CurrentValue && is_numeric(ConvertToFloatString($this->OQ->CurrentValue)))
			$this->OQ->CurrentValue = ConvertToFloatString($this->OQ->CurrentValue);

		// Convert decimal values if posted back
		if ($this->RQ->FormValue == $this->RQ->CurrentValue && is_numeric(ConvertToFloatString($this->RQ->CurrentValue)))
			$this->RQ->CurrentValue = ConvertToFloatString($this->RQ->CurrentValue);

		// Convert decimal values if posted back
		if ($this->FRQ->FormValue == $this->FRQ->CurrentValue && is_numeric(ConvertToFloatString($this->FRQ->CurrentValue)))
			$this->FRQ->CurrentValue = ConvertToFloatString($this->FRQ->CurrentValue);

		// Convert decimal values if posted back
		if ($this->IQ->FormValue == $this->IQ->CurrentValue && is_numeric(ConvertToFloatString($this->IQ->CurrentValue)))
			$this->IQ->CurrentValue = ConvertToFloatString($this->IQ->CurrentValue);

		// Convert decimal values if posted back
		if ($this->MRQ->FormValue == $this->MRQ->CurrentValue && is_numeric(ConvertToFloatString($this->MRQ->CurrentValue)))
			$this->MRQ->CurrentValue = ConvertToFloatString($this->MRQ->CurrentValue);

		// Convert decimal values if posted back
		if ($this->MRP->FormValue == $this->MRP->CurrentValue && is_numeric(ConvertToFloatString($this->MRP->CurrentValue)))
			$this->MRP->CurrentValue = ConvertToFloatString($this->MRP->CurrentValue);

		// Convert decimal values if posted back
		if ($this->UR->FormValue == $this->UR->CurrentValue && is_numeric(ConvertToFloatString($this->UR->CurrentValue)))
			$this->UR->CurrentValue = ConvertToFloatString($this->UR->CurrentValue);

		// Convert decimal values if posted back
		if ($this->OLDRT->FormValue == $this->OLDRT->CurrentValue && is_numeric(ConvertToFloatString($this->OLDRT->CurrentValue)))
			$this->OLDRT->CurrentValue = ConvertToFloatString($this->OLDRT->CurrentValue);

		// Convert decimal values if posted back
		if ($this->TEMPMRQ->FormValue == $this->TEMPMRQ->CurrentValue && is_numeric(ConvertToFloatString($this->TEMPMRQ->CurrentValue)))
			$this->TEMPMRQ->CurrentValue = ConvertToFloatString($this->TEMPMRQ->CurrentValue);

		// Convert decimal values if posted back
		if ($this->TAXP->FormValue == $this->TAXP->CurrentValue && is_numeric(ConvertToFloatString($this->TAXP->CurrentValue)))
			$this->TAXP->CurrentValue = ConvertToFloatString($this->TAXP->CurrentValue);

		// Convert decimal values if posted back
		if ($this->OLDRATE->FormValue == $this->OLDRATE->CurrentValue && is_numeric(ConvertToFloatString($this->OLDRATE->CurrentValue)))
			$this->OLDRATE->CurrentValue = ConvertToFloatString($this->OLDRATE->CurrentValue);

		// Convert decimal values if posted back
		if ($this->NEWRATE->FormValue == $this->NEWRATE->CurrentValue && is_numeric(ConvertToFloatString($this->NEWRATE->CurrentValue)))
			$this->NEWRATE->CurrentValue = ConvertToFloatString($this->NEWRATE->CurrentValue);

		// Convert decimal values if posted back
		if ($this->OTEMPMRA->FormValue == $this->OTEMPMRA->CurrentValue && is_numeric(ConvertToFloatString($this->OTEMPMRA->CurrentValue)))
			$this->OTEMPMRA->CurrentValue = ConvertToFloatString($this->OTEMPMRA->CurrentValue);

		// Convert decimal values if posted back
		if ($this->PSGST->FormValue == $this->PSGST->CurrentValue && is_numeric(ConvertToFloatString($this->PSGST->CurrentValue)))
			$this->PSGST->CurrentValue = ConvertToFloatString($this->PSGST->CurrentValue);

		// Convert decimal values if posted back
		if ($this->PCGST->FormValue == $this->PCGST->CurrentValue && is_numeric(ConvertToFloatString($this->PCGST->CurrentValue)))
			$this->PCGST->CurrentValue = ConvertToFloatString($this->PCGST->CurrentValue);

		// Convert decimal values if posted back
		if ($this->SSGST->FormValue == $this->SSGST->CurrentValue && is_numeric(ConvertToFloatString($this->SSGST->CurrentValue)))
			$this->SSGST->CurrentValue = ConvertToFloatString($this->SSGST->CurrentValue);

		// Convert decimal values if posted back
		if ($this->SCGST->FormValue == $this->SCGST->CurrentValue && is_numeric(ConvertToFloatString($this->SCGST->CurrentValue)))
			$this->SCGST->CurrentValue = ConvertToFloatString($this->SCGST->CurrentValue);

		// Convert decimal values if posted back
		if ($this->RT->FormValue == $this->RT->CurrentValue && is_numeric(ConvertToFloatString($this->RT->CurrentValue)))
			$this->RT->CurrentValue = ConvertToFloatString($this->RT->CurrentValue);

		// Convert decimal values if posted back
		if ($this->PurValue->FormValue == $this->PurValue->CurrentValue && is_numeric(ConvertToFloatString($this->PurValue->CurrentValue)))
			$this->PurValue->CurrentValue = ConvertToFloatString($this->PurValue->CurrentValue);

		// Convert decimal values if posted back
		if ($this->PurRate->FormValue == $this->PurRate->CurrentValue && is_numeric(ConvertToFloatString($this->PurRate->CurrentValue)))
			$this->PurRate->CurrentValue = ConvertToFloatString($this->PurRate->CurrentValue);

		// Call Row_Rendering event
		$this->Row_Rendering();

		// Common render codes for all row types
		// PRC
		// PrName
		// BATCHNO
		// BATCH
		// MFRCODE
		// EXPDT
		// PRCODE
		// OQ
		// RQ
		// FRQ
		// IQ
		// MRQ
		// MRP
		// UR
		// PC
		// OLDRT
		// TEMPMRQ
		// TAXP
		// OLDRATE
		// NEWRATE
		// OTEMPMRA
		// ACTIVESTATUS
		// id
		// PSGST
		// PCGST
		// SSGST
		// SCGST
		// RT
		// BRCODE
		// HospID
		// UM
		// GENNAME
		// BILLDATE
		// PUnit
		// SUnit
		// PurValue
		// PurRate

		if ($this->RowType == ROWTYPE_VIEW) { // View row

			// PRC
			$this->PRC->ViewValue = $this->PRC->CurrentValue;
			$this->PRC->ViewCustomAttributes = "";

			// PrName
			$this->PrName->ViewValue = $this->PrName->CurrentValue;
			$curVal = strval($this->PrName->CurrentValue);
			if ($curVal <> "") {
				$this->PrName->ViewValue = $this->PrName->lookupCacheOption($curVal);
				if ($this->PrName->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`DES`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->PrName->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = $rswrk->fields('df');
						$this->PrName->ViewValue = $this->PrName->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->PrName->ViewValue = $this->PrName->CurrentValue;
					}
				}
			} else {
				$this->PrName->ViewValue = NULL;
			}
			$this->PrName->ViewCustomAttributes = "";

			// BATCHNO
			$this->BATCHNO->ViewValue = $this->BATCHNO->CurrentValue;
			$this->BATCHNO->ViewCustomAttributes = "";

			// BATCH
			$this->BATCH->ViewValue = $this->BATCH->CurrentValue;
			$this->BATCH->ViewCustomAttributes = "";

			// MFRCODE
			$this->MFRCODE->ViewValue = $this->MFRCODE->CurrentValue;
			$this->MFRCODE->ViewCustomAttributes = "";

			// EXPDT
			$this->EXPDT->ViewValue = $this->EXPDT->CurrentValue;
			$this->EXPDT->ViewValue = FormatDateTime($this->EXPDT->ViewValue, 0);
			$this->EXPDT->ViewCustomAttributes = "";

			// PRCODE
			$this->PRCODE->ViewValue = $this->PRCODE->CurrentValue;
			$this->PRCODE->ViewCustomAttributes = "";

			// OQ
			$this->OQ->ViewValue = $this->OQ->CurrentValue;
			$this->OQ->ViewValue = FormatNumber($this->OQ->ViewValue, 2, -2, -2, -2);
			$this->OQ->ViewCustomAttributes = "";

			// RQ
			$this->RQ->ViewValue = $this->RQ->CurrentValue;
			$this->RQ->ViewValue = FormatNumber($this->RQ->ViewValue, 2, -2, -2, -2);
			$this->RQ->ViewCustomAttributes = "";

			// FRQ
			$this->FRQ->ViewValue = $this->FRQ->CurrentValue;
			$this->FRQ->ViewValue = FormatNumber($this->FRQ->ViewValue, 2, -2, -2, -2);
			$this->FRQ->ViewCustomAttributes = "";

			// IQ
			$this->IQ->ViewValue = $this->IQ->CurrentValue;
			$this->IQ->ViewValue = FormatNumber($this->IQ->ViewValue, 2, -2, -2, -2);
			$this->IQ->ViewCustomAttributes = "";

			// MRQ
			$this->MRQ->ViewValue = $this->MRQ->CurrentValue;
			$this->MRQ->ViewValue = FormatNumber($this->MRQ->ViewValue, 2, -2, -2, -2);
			$this->MRQ->ViewCustomAttributes = "";

			// MRP
			$this->MRP->ViewValue = $this->MRP->CurrentValue;
			$this->MRP->ViewValue = FormatNumber($this->MRP->ViewValue, 2, -2, -2, -2);
			$this->MRP->ViewCustomAttributes = "";

			// UR
			$this->UR->ViewValue = $this->UR->CurrentValue;
			$this->UR->ViewValue = FormatNumber($this->UR->ViewValue, 2, -2, -2, -2);
			$this->UR->ViewCustomAttributes = "";

			// PC
			$this->PC->ViewValue = $this->PC->CurrentValue;
			$this->PC->ViewCustomAttributes = "";

			// OLDRT
			$this->OLDRT->ViewValue = $this->OLDRT->CurrentValue;
			$this->OLDRT->ViewValue = FormatNumber($this->OLDRT->ViewValue, 2, -2, -2, -2);
			$this->OLDRT->ViewCustomAttributes = "";

			// TEMPMRQ
			$this->TEMPMRQ->ViewValue = $this->TEMPMRQ->CurrentValue;
			$this->TEMPMRQ->ViewValue = FormatNumber($this->TEMPMRQ->ViewValue, 2, -2, -2, -2);
			$this->TEMPMRQ->ViewCustomAttributes = "";

			// TAXP
			$this->TAXP->ViewValue = $this->TAXP->CurrentValue;
			$this->TAXP->ViewValue = FormatNumber($this->TAXP->ViewValue, 2, -2, -2, -2);
			$this->TAXP->ViewCustomAttributes = "";

			// OLDRATE
			$this->OLDRATE->ViewValue = $this->OLDRATE->CurrentValue;
			$this->OLDRATE->ViewValue = FormatNumber($this->OLDRATE->ViewValue, 2, -2, -2, -2);
			$this->OLDRATE->ViewCustomAttributes = "";

			// NEWRATE
			$this->NEWRATE->ViewValue = $this->NEWRATE->CurrentValue;
			$this->NEWRATE->ViewValue = FormatNumber($this->NEWRATE->ViewValue, 2, -2, -2, -2);
			$this->NEWRATE->ViewCustomAttributes = "";

			// OTEMPMRA
			$this->OTEMPMRA->ViewValue = $this->OTEMPMRA->CurrentValue;
			$this->OTEMPMRA->ViewValue = FormatNumber($this->OTEMPMRA->ViewValue, 2, -2, -2, -2);
			$this->OTEMPMRA->ViewCustomAttributes = "";

			// ACTIVESTATUS
			$this->ACTIVESTATUS->ViewValue = $this->ACTIVESTATUS->CurrentValue;
			$this->ACTIVESTATUS->ViewCustomAttributes = "";

			// id
			$this->id->ViewValue = $this->id->CurrentValue;
			$this->id->ViewCustomAttributes = "";

			// PSGST
			$this->PSGST->ViewValue = $this->PSGST->CurrentValue;
			$this->PSGST->ViewCustomAttributes = "";

			// PCGST
			$this->PCGST->ViewValue = $this->PCGST->CurrentValue;
			$this->PCGST->ViewCustomAttributes = "";

			// SSGST
			$this->SSGST->ViewValue = $this->SSGST->CurrentValue;
			$this->SSGST->ViewCustomAttributes = "";

			// SCGST
			$this->SCGST->ViewValue = $this->SCGST->CurrentValue;
			$this->SCGST->ViewCustomAttributes = "";

			// RT
			$this->RT->ViewValue = $this->RT->CurrentValue;
			$this->RT->ViewValue = FormatNumber($this->RT->ViewValue, 2, -2, -2, -2);
			$this->RT->ViewCustomAttributes = "";

			// BRCODE
			$curVal = strval($this->BRCODE->CurrentValue);
			if ($curVal <> "") {
				$this->BRCODE->ViewValue = $this->BRCODE->lookupCacheOption($curVal);
				if ($this->BRCODE->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
					$sqlWrk = $this->BRCODE->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = $rswrk->fields('df');
						$this->BRCODE->ViewValue = $this->BRCODE->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->BRCODE->ViewValue = $this->BRCODE->CurrentValue;
					}
				}
			} else {
				$this->BRCODE->ViewValue = NULL;
			}
			$this->BRCODE->ViewCustomAttributes = "";

			// HospID
			$this->HospID->ViewValue = $this->HospID->CurrentValue;
			$this->HospID->ViewValue = FormatNumber($this->HospID->ViewValue, 0, -2, -2, -2);
			$this->HospID->ViewCustomAttributes = "";

			// UM
			$this->UM->ViewValue = $this->UM->CurrentValue;
			$this->UM->ViewCustomAttributes = "";

			// GENNAME
			$this->GENNAME->ViewValue = $this->GENNAME->CurrentValue;
			$this->GENNAME->ViewCustomAttributes = "";

			// BILLDATE
			$this->BILLDATE->ViewValue = $this->BILLDATE->CurrentValue;
			$this->BILLDATE->ViewValue = FormatDateTime($this->BILLDATE->ViewValue, 0);
			$this->BILLDATE->ViewCustomAttributes = "";

			// PUnit
			$this->PUnit->ViewValue = $this->PUnit->CurrentValue;
			$this->PUnit->ViewValue = FormatNumber($this->PUnit->ViewValue, 0, -2, -2, -2);
			$this->PUnit->ViewCustomAttributes = "";

			// SUnit
			$this->SUnit->ViewValue = $this->SUnit->CurrentValue;
			$this->SUnit->ViewValue = FormatNumber($this->SUnit->ViewValue, 0, -2, -2, -2);
			$this->SUnit->ViewCustomAttributes = "";

			// PurValue
			$this->PurValue->ViewValue = $this->PurValue->CurrentValue;
			$this->PurValue->ViewValue = FormatNumber($this->PurValue->ViewValue, 2, -2, -2, -2);
			$this->PurValue->ViewCustomAttributes = "";

			// PurRate
			$this->PurRate->ViewValue = $this->PurRate->CurrentValue;
			$this->PurRate->ViewValue = FormatNumber($this->PurRate->ViewValue, 2, -2, -2, -2);
			$this->PurRate->ViewCustomAttributes = "";

			// PRC
			$this->PRC->LinkCustomAttributes = "";
			$this->PRC->HrefValue = "";
			$this->PRC->TooltipValue = "";

			// PrName
			$this->PrName->LinkCustomAttributes = "";
			$this->PrName->HrefValue = "";
			$this->PrName->TooltipValue = "";

			// BATCHNO
			$this->BATCHNO->LinkCustomAttributes = "";
			$this->BATCHNO->HrefValue = "";
			$this->BATCHNO->TooltipValue = "";

			// BATCH
			$this->BATCH->LinkCustomAttributes = "";
			$this->BATCH->HrefValue = "";
			$this->BATCH->TooltipValue = "";

			// MFRCODE
			$this->MFRCODE->LinkCustomAttributes = "";
			$this->MFRCODE->HrefValue = "";
			$this->MFRCODE->TooltipValue = "";

			// EXPDT
			$this->EXPDT->LinkCustomAttributes = "";
			$this->EXPDT->HrefValue = "";
			$this->EXPDT->TooltipValue = "";

			// PRCODE
			$this->PRCODE->LinkCustomAttributes = "";
			$this->PRCODE->HrefValue = "";
			$this->PRCODE->TooltipValue = "";

			// OQ
			$this->OQ->LinkCustomAttributes = "";
			$this->OQ->HrefValue = "";
			$this->OQ->TooltipValue = "";

			// RQ
			$this->RQ->LinkCustomAttributes = "";
			$this->RQ->HrefValue = "";
			$this->RQ->TooltipValue = "";

			// FRQ
			$this->FRQ->LinkCustomAttributes = "";
			$this->FRQ->HrefValue = "";
			$this->FRQ->TooltipValue = "";

			// IQ
			$this->IQ->LinkCustomAttributes = "";
			$this->IQ->HrefValue = "";
			$this->IQ->TooltipValue = "";

			// MRQ
			$this->MRQ->LinkCustomAttributes = "";
			$this->MRQ->HrefValue = "";
			$this->MRQ->TooltipValue = "";

			// MRP
			$this->MRP->LinkCustomAttributes = "";
			$this->MRP->HrefValue = "";
			$this->MRP->TooltipValue = "";

			// UR
			$this->UR->LinkCustomAttributes = "";
			$this->UR->HrefValue = "";
			$this->UR->TooltipValue = "";

			// PC
			$this->PC->LinkCustomAttributes = "";
			$this->PC->HrefValue = "";
			$this->PC->TooltipValue = "";

			// OLDRT
			$this->OLDRT->LinkCustomAttributes = "";
			$this->OLDRT->HrefValue = "";
			$this->OLDRT->TooltipValue = "";

			// TEMPMRQ
			$this->TEMPMRQ->LinkCustomAttributes = "";
			$this->TEMPMRQ->HrefValue = "";
			$this->TEMPMRQ->TooltipValue = "";

			// TAXP
			$this->TAXP->LinkCustomAttributes = "";
			$this->TAXP->HrefValue = "";
			$this->TAXP->TooltipValue = "";

			// OLDRATE
			$this->OLDRATE->LinkCustomAttributes = "";
			$this->OLDRATE->HrefValue = "";
			$this->OLDRATE->TooltipValue = "";

			// NEWRATE
			$this->NEWRATE->LinkCustomAttributes = "";
			$this->NEWRATE->HrefValue = "";
			$this->NEWRATE->TooltipValue = "";

			// OTEMPMRA
			$this->OTEMPMRA->LinkCustomAttributes = "";
			$this->OTEMPMRA->HrefValue = "";
			$this->OTEMPMRA->TooltipValue = "";

			// ACTIVESTATUS
			$this->ACTIVESTATUS->LinkCustomAttributes = "";
			$this->ACTIVESTATUS->HrefValue = "";
			$this->ACTIVESTATUS->TooltipValue = "";

			// id
			$this->id->LinkCustomAttributes = "";
			$this->id->HrefValue = "";
			$this->id->TooltipValue = "";

			// PSGST
			$this->PSGST->LinkCustomAttributes = "";
			$this->PSGST->HrefValue = "";
			$this->PSGST->TooltipValue = "";

			// PCGST
			$this->PCGST->LinkCustomAttributes = "";
			$this->PCGST->HrefValue = "";
			$this->PCGST->TooltipValue = "";

			// SSGST
			$this->SSGST->LinkCustomAttributes = "";
			$this->SSGST->HrefValue = "";
			$this->SSGST->TooltipValue = "";

			// SCGST
			$this->SCGST->LinkCustomAttributes = "";
			$this->SCGST->HrefValue = "";
			$this->SCGST->TooltipValue = "";

			// RT
			$this->RT->LinkCustomAttributes = "";
			$this->RT->HrefValue = "";
			$this->RT->TooltipValue = "";

			// BRCODE
			$this->BRCODE->LinkCustomAttributes = "";
			$this->BRCODE->HrefValue = "";
			$this->BRCODE->TooltipValue = "";

			// HospID
			$this->HospID->LinkCustomAttributes = "";
			$this->HospID->HrefValue = "";
			$this->HospID->TooltipValue = "";

			// UM
			$this->UM->LinkCustomAttributes = "";
			$this->UM->HrefValue = "";
			$this->UM->TooltipValue = "";

			// GENNAME
			$this->GENNAME->LinkCustomAttributes = "";
			$this->GENNAME->HrefValue = "";
			$this->GENNAME->TooltipValue = "";

			// BILLDATE
			$this->BILLDATE->LinkCustomAttributes = "";
			$this->BILLDATE->HrefValue = "";
			$this->BILLDATE->TooltipValue = "";

			// PUnit
			$this->PUnit->LinkCustomAttributes = "";
			$this->PUnit->HrefValue = "";
			$this->PUnit->TooltipValue = "";

			// SUnit
			$this->SUnit->LinkCustomAttributes = "";
			$this->SUnit->HrefValue = "";
			$this->SUnit->TooltipValue = "";

			// PurValue
			$this->PurValue->LinkCustomAttributes = "";
			$this->PurValue->HrefValue = "";
			$this->PurValue->TooltipValue = "";

			// PurRate
			$this->PurRate->LinkCustomAttributes = "";
			$this->PurRate->HrefValue = "";
			$this->PurRate->TooltipValue = "";
		} elseif ($this->RowType == ROWTYPE_EDIT) { // Edit row

			// PRC
			$this->PRC->EditAttrs["class"] = "form-control";
			$this->PRC->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->PRC->CurrentValue = HtmlDecode($this->PRC->CurrentValue);
			$this->PRC->EditValue = HtmlEncode($this->PRC->CurrentValue);
			$this->PRC->PlaceHolder = RemoveHtml($this->PRC->caption());

			// PrName
			$this->PrName->EditAttrs["class"] = "form-control";
			$this->PrName->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->PrName->CurrentValue = HtmlDecode($this->PrName->CurrentValue);
			$this->PrName->EditValue = HtmlEncode($this->PrName->CurrentValue);
			$curVal = strval($this->PrName->CurrentValue);
			if ($curVal <> "") {
				$this->PrName->EditValue = $this->PrName->lookupCacheOption($curVal);
				if ($this->PrName->EditValue === NULL) { // Lookup from database
					$filterWrk = "`DES`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->PrName->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = HtmlEncode($rswrk->fields('df'));
						$this->PrName->EditValue = $this->PrName->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->PrName->EditValue = HtmlEncode($this->PrName->CurrentValue);
					}
				}
			} else {
				$this->PrName->EditValue = NULL;
			}
			$this->PrName->PlaceHolder = RemoveHtml($this->PrName->caption());

			// BATCHNO
			$this->BATCHNO->EditAttrs["class"] = "form-control";
			$this->BATCHNO->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->BATCHNO->CurrentValue = HtmlDecode($this->BATCHNO->CurrentValue);
			$this->BATCHNO->EditValue = HtmlEncode($this->BATCHNO->CurrentValue);
			$this->BATCHNO->PlaceHolder = RemoveHtml($this->BATCHNO->caption());

			// BATCH
			$this->BATCH->EditAttrs["class"] = "form-control";
			$this->BATCH->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->BATCH->CurrentValue = HtmlDecode($this->BATCH->CurrentValue);
			$this->BATCH->EditValue = HtmlEncode($this->BATCH->CurrentValue);
			$this->BATCH->PlaceHolder = RemoveHtml($this->BATCH->caption());

			// MFRCODE
			$this->MFRCODE->EditAttrs["class"] = "form-control";
			$this->MFRCODE->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->MFRCODE->CurrentValue = HtmlDecode($this->MFRCODE->CurrentValue);
			$this->MFRCODE->EditValue = HtmlEncode($this->MFRCODE->CurrentValue);
			$this->MFRCODE->PlaceHolder = RemoveHtml($this->MFRCODE->caption());

			// EXPDT
			$this->EXPDT->EditAttrs["class"] = "form-control";
			$this->EXPDT->EditCustomAttributes = "";
			$this->EXPDT->EditValue = HtmlEncode(FormatDateTime($this->EXPDT->CurrentValue, 8));
			$this->EXPDT->PlaceHolder = RemoveHtml($this->EXPDT->caption());

			// PRCODE
			$this->PRCODE->EditAttrs["class"] = "form-control";
			$this->PRCODE->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->PRCODE->CurrentValue = HtmlDecode($this->PRCODE->CurrentValue);
			$this->PRCODE->EditValue = HtmlEncode($this->PRCODE->CurrentValue);
			$this->PRCODE->PlaceHolder = RemoveHtml($this->PRCODE->caption());

			// OQ
			$this->OQ->EditAttrs["class"] = "form-control";
			$this->OQ->EditCustomAttributes = "";
			$this->OQ->EditValue = HtmlEncode($this->OQ->CurrentValue);
			$this->OQ->PlaceHolder = RemoveHtml($this->OQ->caption());
			if (strval($this->OQ->EditValue) <> "" && is_numeric($this->OQ->EditValue))
				$this->OQ->EditValue = FormatNumber($this->OQ->EditValue, -2, -2, -2, -2);

			// RQ
			$this->RQ->EditAttrs["class"] = "form-control";
			$this->RQ->EditCustomAttributes = "";
			$this->RQ->EditValue = HtmlEncode($this->RQ->CurrentValue);
			$this->RQ->PlaceHolder = RemoveHtml($this->RQ->caption());
			if (strval($this->RQ->EditValue) <> "" && is_numeric($this->RQ->EditValue))
				$this->RQ->EditValue = FormatNumber($this->RQ->EditValue, -2, -2, -2, -2);

			// FRQ
			$this->FRQ->EditAttrs["class"] = "form-control";
			$this->FRQ->EditCustomAttributes = "";
			$this->FRQ->EditValue = HtmlEncode($this->FRQ->CurrentValue);
			$this->FRQ->PlaceHolder = RemoveHtml($this->FRQ->caption());
			if (strval($this->FRQ->EditValue) <> "" && is_numeric($this->FRQ->EditValue))
				$this->FRQ->EditValue = FormatNumber($this->FRQ->EditValue, -2, -2, -2, -2);

			// IQ
			$this->IQ->EditAttrs["class"] = "form-control";
			$this->IQ->EditCustomAttributes = "";
			$this->IQ->EditValue = HtmlEncode($this->IQ->CurrentValue);
			$this->IQ->PlaceHolder = RemoveHtml($this->IQ->caption());
			if (strval($this->IQ->EditValue) <> "" && is_numeric($this->IQ->EditValue))
				$this->IQ->EditValue = FormatNumber($this->IQ->EditValue, -2, -2, -2, -2);

			// MRQ
			$this->MRQ->EditAttrs["class"] = "form-control";
			$this->MRQ->EditCustomAttributes = "";
			$this->MRQ->EditValue = HtmlEncode($this->MRQ->CurrentValue);
			$this->MRQ->PlaceHolder = RemoveHtml($this->MRQ->caption());
			if (strval($this->MRQ->EditValue) <> "" && is_numeric($this->MRQ->EditValue))
				$this->MRQ->EditValue = FormatNumber($this->MRQ->EditValue, -2, -2, -2, -2);

			// MRP
			$this->MRP->EditAttrs["class"] = "form-control";
			$this->MRP->EditCustomAttributes = "";
			$this->MRP->EditValue = HtmlEncode($this->MRP->CurrentValue);
			$this->MRP->PlaceHolder = RemoveHtml($this->MRP->caption());
			if (strval($this->MRP->EditValue) <> "" && is_numeric($this->MRP->EditValue))
				$this->MRP->EditValue = FormatNumber($this->MRP->EditValue, -2, -2, -2, -2);

			// UR
			$this->UR->EditAttrs["class"] = "form-control";
			$this->UR->EditCustomAttributes = "";
			$this->UR->EditValue = HtmlEncode($this->UR->CurrentValue);
			$this->UR->PlaceHolder = RemoveHtml($this->UR->caption());
			if (strval($this->UR->EditValue) <> "" && is_numeric($this->UR->EditValue))
				$this->UR->EditValue = FormatNumber($this->UR->EditValue, -2, -2, -2, -2);

			// PC
			$this->PC->EditAttrs["class"] = "form-control";
			$this->PC->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->PC->CurrentValue = HtmlDecode($this->PC->CurrentValue);
			$this->PC->EditValue = HtmlEncode($this->PC->CurrentValue);
			$this->PC->PlaceHolder = RemoveHtml($this->PC->caption());

			// OLDRT
			$this->OLDRT->EditAttrs["class"] = "form-control";
			$this->OLDRT->EditCustomAttributes = "";
			$this->OLDRT->EditValue = HtmlEncode($this->OLDRT->CurrentValue);
			$this->OLDRT->PlaceHolder = RemoveHtml($this->OLDRT->caption());
			if (strval($this->OLDRT->EditValue) <> "" && is_numeric($this->OLDRT->EditValue))
				$this->OLDRT->EditValue = FormatNumber($this->OLDRT->EditValue, -2, -2, -2, -2);

			// TEMPMRQ
			$this->TEMPMRQ->EditAttrs["class"] = "form-control";
			$this->TEMPMRQ->EditCustomAttributes = "";
			$this->TEMPMRQ->EditValue = HtmlEncode($this->TEMPMRQ->CurrentValue);
			$this->TEMPMRQ->PlaceHolder = RemoveHtml($this->TEMPMRQ->caption());
			if (strval($this->TEMPMRQ->EditValue) <> "" && is_numeric($this->TEMPMRQ->EditValue))
				$this->TEMPMRQ->EditValue = FormatNumber($this->TEMPMRQ->EditValue, -2, -2, -2, -2);

			// TAXP
			$this->TAXP->EditAttrs["class"] = "form-control";
			$this->TAXP->EditCustomAttributes = "";
			$this->TAXP->EditValue = HtmlEncode($this->TAXP->CurrentValue);
			$this->TAXP->PlaceHolder = RemoveHtml($this->TAXP->caption());
			if (strval($this->TAXP->EditValue) <> "" && is_numeric($this->TAXP->EditValue))
				$this->TAXP->EditValue = FormatNumber($this->TAXP->EditValue, -2, -2, -2, -2);

			// OLDRATE
			$this->OLDRATE->EditAttrs["class"] = "form-control";
			$this->OLDRATE->EditCustomAttributes = "";
			$this->OLDRATE->EditValue = HtmlEncode($this->OLDRATE->CurrentValue);
			$this->OLDRATE->PlaceHolder = RemoveHtml($this->OLDRATE->caption());
			if (strval($this->OLDRATE->EditValue) <> "" && is_numeric($this->OLDRATE->EditValue))
				$this->OLDRATE->EditValue = FormatNumber($this->OLDRATE->EditValue, -2, -2, -2, -2);

			// NEWRATE
			$this->NEWRATE->EditAttrs["class"] = "form-control";
			$this->NEWRATE->EditCustomAttributes = "";
			$this->NEWRATE->EditValue = HtmlEncode($this->NEWRATE->CurrentValue);
			$this->NEWRATE->PlaceHolder = RemoveHtml($this->NEWRATE->caption());
			if (strval($this->NEWRATE->EditValue) <> "" && is_numeric($this->NEWRATE->EditValue))
				$this->NEWRATE->EditValue = FormatNumber($this->NEWRATE->EditValue, -2, -2, -2, -2);

			// OTEMPMRA
			$this->OTEMPMRA->EditAttrs["class"] = "form-control";
			$this->OTEMPMRA->EditCustomAttributes = "";
			$this->OTEMPMRA->EditValue = HtmlEncode($this->OTEMPMRA->CurrentValue);
			$this->OTEMPMRA->PlaceHolder = RemoveHtml($this->OTEMPMRA->caption());
			if (strval($this->OTEMPMRA->EditValue) <> "" && is_numeric($this->OTEMPMRA->EditValue))
				$this->OTEMPMRA->EditValue = FormatNumber($this->OTEMPMRA->EditValue, -2, -2, -2, -2);

			// ACTIVESTATUS
			$this->ACTIVESTATUS->EditAttrs["class"] = "form-control";
			$this->ACTIVESTATUS->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->ACTIVESTATUS->CurrentValue = HtmlDecode($this->ACTIVESTATUS->CurrentValue);
			$this->ACTIVESTATUS->EditValue = HtmlEncode($this->ACTIVESTATUS->CurrentValue);
			$this->ACTIVESTATUS->PlaceHolder = RemoveHtml($this->ACTIVESTATUS->caption());

			// id
			$this->id->EditAttrs["class"] = "form-control";
			$this->id->EditCustomAttributes = "";
			$this->id->EditValue = $this->id->CurrentValue;
			$this->id->ViewCustomAttributes = "";

			// PSGST
			$this->PSGST->EditAttrs["class"] = "form-control";
			$this->PSGST->EditCustomAttributes = "";
			$this->PSGST->EditValue = HtmlEncode($this->PSGST->CurrentValue);
			$this->PSGST->PlaceHolder = RemoveHtml($this->PSGST->caption());
			if (strval($this->PSGST->EditValue) <> "" && is_numeric($this->PSGST->EditValue))
				$this->PSGST->EditValue = FormatNumber($this->PSGST->EditValue, -2, -1, -2, 0);

			// PCGST
			$this->PCGST->EditAttrs["class"] = "form-control";
			$this->PCGST->EditCustomAttributes = "";
			$this->PCGST->EditValue = HtmlEncode($this->PCGST->CurrentValue);
			$this->PCGST->PlaceHolder = RemoveHtml($this->PCGST->caption());
			if (strval($this->PCGST->EditValue) <> "" && is_numeric($this->PCGST->EditValue))
				$this->PCGST->EditValue = FormatNumber($this->PCGST->EditValue, -2, -1, -2, 0);

			// SSGST
			$this->SSGST->EditAttrs["class"] = "form-control";
			$this->SSGST->EditCustomAttributes = "";
			$this->SSGST->EditValue = HtmlEncode($this->SSGST->CurrentValue);
			$this->SSGST->PlaceHolder = RemoveHtml($this->SSGST->caption());
			if (strval($this->SSGST->EditValue) <> "" && is_numeric($this->SSGST->EditValue))
				$this->SSGST->EditValue = FormatNumber($this->SSGST->EditValue, -2, -1, -2, 0);

			// SCGST
			$this->SCGST->EditAttrs["class"] = "form-control";
			$this->SCGST->EditCustomAttributes = "";
			$this->SCGST->EditValue = HtmlEncode($this->SCGST->CurrentValue);
			$this->SCGST->PlaceHolder = RemoveHtml($this->SCGST->caption());
			if (strval($this->SCGST->EditValue) <> "" && is_numeric($this->SCGST->EditValue))
				$this->SCGST->EditValue = FormatNumber($this->SCGST->EditValue, -2, -1, -2, 0);

			// RT
			$this->RT->EditAttrs["class"] = "form-control";
			$this->RT->EditCustomAttributes = "";
			$this->RT->EditValue = HtmlEncode($this->RT->CurrentValue);
			$this->RT->PlaceHolder = RemoveHtml($this->RT->caption());
			if (strval($this->RT->EditValue) <> "" && is_numeric($this->RT->EditValue))
				$this->RT->EditValue = FormatNumber($this->RT->EditValue, -2, -2, -2, -2);

			// BRCODE
			$this->BRCODE->EditCustomAttributes = "";
			$curVal = trim(strval($this->BRCODE->CurrentValue));
			if ($curVal <> "")
				$this->BRCODE->ViewValue = $this->BRCODE->lookupCacheOption($curVal);
			else
				$this->BRCODE->ViewValue = $this->BRCODE->Lookup !== NULL && is_array($this->BRCODE->Lookup->Options) ? $curVal : NULL;
			if ($this->BRCODE->ViewValue !== NULL) { // Load from cache
				$this->BRCODE->EditValue = array_values($this->BRCODE->Lookup->Options);
				if ($this->BRCODE->ViewValue == "")
					$this->BRCODE->ViewValue = $Language->phrase("PleaseSelect");
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`id`" . SearchString("=", $this->BRCODE->CurrentValue, DATATYPE_NUMBER, "");
				}
				$sqlWrk = $this->BRCODE->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = array();
					$arwrk[1] = HtmlEncode($rswrk->fields('df'));
					$this->BRCODE->ViewValue = $this->BRCODE->displayValue($arwrk);
				} else {
					$this->BRCODE->ViewValue = $Language->phrase("PleaseSelect");
				}
				$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
				if ($rswrk) $rswrk->Close();
				$this->BRCODE->EditValue = $arwrk;
			}

			// HospID
			$this->HospID->EditAttrs["class"] = "form-control";
			$this->HospID->EditCustomAttributes = "";
			$this->HospID->EditValue = HtmlEncode($this->HospID->CurrentValue);
			$this->HospID->PlaceHolder = RemoveHtml($this->HospID->caption());

			// UM
			$this->UM->EditAttrs["class"] = "form-control";
			$this->UM->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->UM->CurrentValue = HtmlDecode($this->UM->CurrentValue);
			$this->UM->EditValue = HtmlEncode($this->UM->CurrentValue);
			$this->UM->PlaceHolder = RemoveHtml($this->UM->caption());

			// GENNAME
			$this->GENNAME->EditAttrs["class"] = "form-control";
			$this->GENNAME->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->GENNAME->CurrentValue = HtmlDecode($this->GENNAME->CurrentValue);
			$this->GENNAME->EditValue = HtmlEncode($this->GENNAME->CurrentValue);
			$this->GENNAME->PlaceHolder = RemoveHtml($this->GENNAME->caption());

			// BILLDATE
			$this->BILLDATE->EditAttrs["class"] = "form-control";
			$this->BILLDATE->EditCustomAttributes = "";
			$this->BILLDATE->EditValue = HtmlEncode(FormatDateTime($this->BILLDATE->CurrentValue, 8));
			$this->BILLDATE->PlaceHolder = RemoveHtml($this->BILLDATE->caption());

			// PUnit
			$this->PUnit->EditAttrs["class"] = "form-control";
			$this->PUnit->EditCustomAttributes = "";
			$this->PUnit->EditValue = HtmlEncode($this->PUnit->CurrentValue);
			$this->PUnit->PlaceHolder = RemoveHtml($this->PUnit->caption());

			// SUnit
			$this->SUnit->EditAttrs["class"] = "form-control";
			$this->SUnit->EditCustomAttributes = "";
			$this->SUnit->EditValue = HtmlEncode($this->SUnit->CurrentValue);
			$this->SUnit->PlaceHolder = RemoveHtml($this->SUnit->caption());

			// PurValue
			$this->PurValue->EditAttrs["class"] = "form-control";
			$this->PurValue->EditCustomAttributes = "";
			$this->PurValue->EditValue = HtmlEncode($this->PurValue->CurrentValue);
			$this->PurValue->PlaceHolder = RemoveHtml($this->PurValue->caption());
			if (strval($this->PurValue->EditValue) <> "" && is_numeric($this->PurValue->EditValue))
				$this->PurValue->EditValue = FormatNumber($this->PurValue->EditValue, -2, -2, -2, -2);

			// PurRate
			$this->PurRate->EditAttrs["class"] = "form-control";
			$this->PurRate->EditCustomAttributes = "";
			$this->PurRate->EditValue = HtmlEncode($this->PurRate->CurrentValue);
			$this->PurRate->PlaceHolder = RemoveHtml($this->PurRate->caption());
			if (strval($this->PurRate->EditValue) <> "" && is_numeric($this->PurRate->EditValue))
				$this->PurRate->EditValue = FormatNumber($this->PurRate->EditValue, -2, -2, -2, -2);

			// Edit refer script
			// PRC

			$this->PRC->LinkCustomAttributes = "";
			$this->PRC->HrefValue = "";

			// PrName
			$this->PrName->LinkCustomAttributes = "";
			$this->PrName->HrefValue = "";

			// BATCHNO
			$this->BATCHNO->LinkCustomAttributes = "";
			$this->BATCHNO->HrefValue = "";

			// BATCH
			$this->BATCH->LinkCustomAttributes = "";
			$this->BATCH->HrefValue = "";

			// MFRCODE
			$this->MFRCODE->LinkCustomAttributes = "";
			$this->MFRCODE->HrefValue = "";

			// EXPDT
			$this->EXPDT->LinkCustomAttributes = "";
			$this->EXPDT->HrefValue = "";

			// PRCODE
			$this->PRCODE->LinkCustomAttributes = "";
			$this->PRCODE->HrefValue = "";

			// OQ
			$this->OQ->LinkCustomAttributes = "";
			$this->OQ->HrefValue = "";

			// RQ
			$this->RQ->LinkCustomAttributes = "";
			$this->RQ->HrefValue = "";

			// FRQ
			$this->FRQ->LinkCustomAttributes = "";
			$this->FRQ->HrefValue = "";

			// IQ
			$this->IQ->LinkCustomAttributes = "";
			$this->IQ->HrefValue = "";

			// MRQ
			$this->MRQ->LinkCustomAttributes = "";
			$this->MRQ->HrefValue = "";

			// MRP
			$this->MRP->LinkCustomAttributes = "";
			$this->MRP->HrefValue = "";

			// UR
			$this->UR->LinkCustomAttributes = "";
			$this->UR->HrefValue = "";

			// PC
			$this->PC->LinkCustomAttributes = "";
			$this->PC->HrefValue = "";

			// OLDRT
			$this->OLDRT->LinkCustomAttributes = "";
			$this->OLDRT->HrefValue = "";

			// TEMPMRQ
			$this->TEMPMRQ->LinkCustomAttributes = "";
			$this->TEMPMRQ->HrefValue = "";

			// TAXP
			$this->TAXP->LinkCustomAttributes = "";
			$this->TAXP->HrefValue = "";

			// OLDRATE
			$this->OLDRATE->LinkCustomAttributes = "";
			$this->OLDRATE->HrefValue = "";

			// NEWRATE
			$this->NEWRATE->LinkCustomAttributes = "";
			$this->NEWRATE->HrefValue = "";

			// OTEMPMRA
			$this->OTEMPMRA->LinkCustomAttributes = "";
			$this->OTEMPMRA->HrefValue = "";

			// ACTIVESTATUS
			$this->ACTIVESTATUS->LinkCustomAttributes = "";
			$this->ACTIVESTATUS->HrefValue = "";

			// id
			$this->id->LinkCustomAttributes = "";
			$this->id->HrefValue = "";

			// PSGST
			$this->PSGST->LinkCustomAttributes = "";
			$this->PSGST->HrefValue = "";

			// PCGST
			$this->PCGST->LinkCustomAttributes = "";
			$this->PCGST->HrefValue = "";

			// SSGST
			$this->SSGST->LinkCustomAttributes = "";
			$this->SSGST->HrefValue = "";

			// SCGST
			$this->SCGST->LinkCustomAttributes = "";
			$this->SCGST->HrefValue = "";

			// RT
			$this->RT->LinkCustomAttributes = "";
			$this->RT->HrefValue = "";

			// BRCODE
			$this->BRCODE->LinkCustomAttributes = "";
			$this->BRCODE->HrefValue = "";

			// HospID
			$this->HospID->LinkCustomAttributes = "";
			$this->HospID->HrefValue = "";

			// UM
			$this->UM->LinkCustomAttributes = "";
			$this->UM->HrefValue = "";

			// GENNAME
			$this->GENNAME->LinkCustomAttributes = "";
			$this->GENNAME->HrefValue = "";

			// BILLDATE
			$this->BILLDATE->LinkCustomAttributes = "";
			$this->BILLDATE->HrefValue = "";

			// PUnit
			$this->PUnit->LinkCustomAttributes = "";
			$this->PUnit->HrefValue = "";

			// SUnit
			$this->SUnit->LinkCustomAttributes = "";
			$this->SUnit->HrefValue = "";

			// PurValue
			$this->PurValue->LinkCustomAttributes = "";
			$this->PurValue->HrefValue = "";

			// PurRate
			$this->PurRate->LinkCustomAttributes = "";
			$this->PurRate->HrefValue = "";
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
		if ($this->PRC->Required) {
			if (!$this->PRC->IsDetailKey && $this->PRC->FormValue != NULL && $this->PRC->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PRC->caption(), $this->PRC->RequiredErrorMessage));
			}
		}
		if ($this->PrName->Required) {
			if (!$this->PrName->IsDetailKey && $this->PrName->FormValue != NULL && $this->PrName->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PrName->caption(), $this->PrName->RequiredErrorMessage));
			}
		}
		if ($this->BATCHNO->Required) {
			if (!$this->BATCHNO->IsDetailKey && $this->BATCHNO->FormValue != NULL && $this->BATCHNO->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->BATCHNO->caption(), $this->BATCHNO->RequiredErrorMessage));
			}
		}
		if ($this->BATCH->Required) {
			if (!$this->BATCH->IsDetailKey && $this->BATCH->FormValue != NULL && $this->BATCH->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->BATCH->caption(), $this->BATCH->RequiredErrorMessage));
			}
		}
		if ($this->MFRCODE->Required) {
			if (!$this->MFRCODE->IsDetailKey && $this->MFRCODE->FormValue != NULL && $this->MFRCODE->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->MFRCODE->caption(), $this->MFRCODE->RequiredErrorMessage));
			}
		}
		if ($this->EXPDT->Required) {
			if (!$this->EXPDT->IsDetailKey && $this->EXPDT->FormValue != NULL && $this->EXPDT->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->EXPDT->caption(), $this->EXPDT->RequiredErrorMessage));
			}
		}
		if (!CheckDate($this->EXPDT->FormValue)) {
			AddMessage($FormError, $this->EXPDT->errorMessage());
		}
		if ($this->PRCODE->Required) {
			if (!$this->PRCODE->IsDetailKey && $this->PRCODE->FormValue != NULL && $this->PRCODE->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PRCODE->caption(), $this->PRCODE->RequiredErrorMessage));
			}
		}
		if ($this->OQ->Required) {
			if (!$this->OQ->IsDetailKey && $this->OQ->FormValue != NULL && $this->OQ->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->OQ->caption(), $this->OQ->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->OQ->FormValue)) {
			AddMessage($FormError, $this->OQ->errorMessage());
		}
		if ($this->RQ->Required) {
			if (!$this->RQ->IsDetailKey && $this->RQ->FormValue != NULL && $this->RQ->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->RQ->caption(), $this->RQ->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->RQ->FormValue)) {
			AddMessage($FormError, $this->RQ->errorMessage());
		}
		if ($this->FRQ->Required) {
			if (!$this->FRQ->IsDetailKey && $this->FRQ->FormValue != NULL && $this->FRQ->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->FRQ->caption(), $this->FRQ->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->FRQ->FormValue)) {
			AddMessage($FormError, $this->FRQ->errorMessage());
		}
		if ($this->IQ->Required) {
			if (!$this->IQ->IsDetailKey && $this->IQ->FormValue != NULL && $this->IQ->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->IQ->caption(), $this->IQ->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->IQ->FormValue)) {
			AddMessage($FormError, $this->IQ->errorMessage());
		}
		if ($this->MRQ->Required) {
			if (!$this->MRQ->IsDetailKey && $this->MRQ->FormValue != NULL && $this->MRQ->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->MRQ->caption(), $this->MRQ->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->MRQ->FormValue)) {
			AddMessage($FormError, $this->MRQ->errorMessage());
		}
		if ($this->MRP->Required) {
			if (!$this->MRP->IsDetailKey && $this->MRP->FormValue != NULL && $this->MRP->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->MRP->caption(), $this->MRP->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->MRP->FormValue)) {
			AddMessage($FormError, $this->MRP->errorMessage());
		}
		if ($this->UR->Required) {
			if (!$this->UR->IsDetailKey && $this->UR->FormValue != NULL && $this->UR->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->UR->caption(), $this->UR->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->UR->FormValue)) {
			AddMessage($FormError, $this->UR->errorMessage());
		}
		if ($this->PC->Required) {
			if (!$this->PC->IsDetailKey && $this->PC->FormValue != NULL && $this->PC->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PC->caption(), $this->PC->RequiredErrorMessage));
			}
		}
		if ($this->OLDRT->Required) {
			if (!$this->OLDRT->IsDetailKey && $this->OLDRT->FormValue != NULL && $this->OLDRT->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->OLDRT->caption(), $this->OLDRT->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->OLDRT->FormValue)) {
			AddMessage($FormError, $this->OLDRT->errorMessage());
		}
		if ($this->TEMPMRQ->Required) {
			if (!$this->TEMPMRQ->IsDetailKey && $this->TEMPMRQ->FormValue != NULL && $this->TEMPMRQ->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->TEMPMRQ->caption(), $this->TEMPMRQ->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->TEMPMRQ->FormValue)) {
			AddMessage($FormError, $this->TEMPMRQ->errorMessage());
		}
		if ($this->TAXP->Required) {
			if (!$this->TAXP->IsDetailKey && $this->TAXP->FormValue != NULL && $this->TAXP->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->TAXP->caption(), $this->TAXP->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->TAXP->FormValue)) {
			AddMessage($FormError, $this->TAXP->errorMessage());
		}
		if ($this->OLDRATE->Required) {
			if (!$this->OLDRATE->IsDetailKey && $this->OLDRATE->FormValue != NULL && $this->OLDRATE->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->OLDRATE->caption(), $this->OLDRATE->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->OLDRATE->FormValue)) {
			AddMessage($FormError, $this->OLDRATE->errorMessage());
		}
		if ($this->NEWRATE->Required) {
			if (!$this->NEWRATE->IsDetailKey && $this->NEWRATE->FormValue != NULL && $this->NEWRATE->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->NEWRATE->caption(), $this->NEWRATE->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->NEWRATE->FormValue)) {
			AddMessage($FormError, $this->NEWRATE->errorMessage());
		}
		if ($this->OTEMPMRA->Required) {
			if (!$this->OTEMPMRA->IsDetailKey && $this->OTEMPMRA->FormValue != NULL && $this->OTEMPMRA->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->OTEMPMRA->caption(), $this->OTEMPMRA->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->OTEMPMRA->FormValue)) {
			AddMessage($FormError, $this->OTEMPMRA->errorMessage());
		}
		if ($this->ACTIVESTATUS->Required) {
			if (!$this->ACTIVESTATUS->IsDetailKey && $this->ACTIVESTATUS->FormValue != NULL && $this->ACTIVESTATUS->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->ACTIVESTATUS->caption(), $this->ACTIVESTATUS->RequiredErrorMessage));
			}
		}
		if ($this->id->Required) {
			if (!$this->id->IsDetailKey && $this->id->FormValue != NULL && $this->id->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->id->caption(), $this->id->RequiredErrorMessage));
			}
		}
		if ($this->PSGST->Required) {
			if (!$this->PSGST->IsDetailKey && $this->PSGST->FormValue != NULL && $this->PSGST->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PSGST->caption(), $this->PSGST->RequiredErrorMessage));
			}
		}
		if ($this->PCGST->Required) {
			if (!$this->PCGST->IsDetailKey && $this->PCGST->FormValue != NULL && $this->PCGST->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PCGST->caption(), $this->PCGST->RequiredErrorMessage));
			}
		}
		if ($this->SSGST->Required) {
			if (!$this->SSGST->IsDetailKey && $this->SSGST->FormValue != NULL && $this->SSGST->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->SSGST->caption(), $this->SSGST->RequiredErrorMessage));
			}
		}
		if ($this->SCGST->Required) {
			if (!$this->SCGST->IsDetailKey && $this->SCGST->FormValue != NULL && $this->SCGST->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->SCGST->caption(), $this->SCGST->RequiredErrorMessage));
			}
		}
		if ($this->RT->Required) {
			if (!$this->RT->IsDetailKey && $this->RT->FormValue != NULL && $this->RT->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->RT->caption(), $this->RT->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->RT->FormValue)) {
			AddMessage($FormError, $this->RT->errorMessage());
		}
		if ($this->BRCODE->Required) {
			if (!$this->BRCODE->IsDetailKey && $this->BRCODE->FormValue != NULL && $this->BRCODE->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->BRCODE->caption(), $this->BRCODE->RequiredErrorMessage));
			}
		}
		if ($this->HospID->Required) {
			if (!$this->HospID->IsDetailKey && $this->HospID->FormValue != NULL && $this->HospID->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->HospID->caption(), $this->HospID->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->HospID->FormValue)) {
			AddMessage($FormError, $this->HospID->errorMessage());
		}
		if ($this->UM->Required) {
			if (!$this->UM->IsDetailKey && $this->UM->FormValue != NULL && $this->UM->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->UM->caption(), $this->UM->RequiredErrorMessage));
			}
		}
		if ($this->GENNAME->Required) {
			if (!$this->GENNAME->IsDetailKey && $this->GENNAME->FormValue != NULL && $this->GENNAME->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->GENNAME->caption(), $this->GENNAME->RequiredErrorMessage));
			}
		}
		if ($this->BILLDATE->Required) {
			if (!$this->BILLDATE->IsDetailKey && $this->BILLDATE->FormValue != NULL && $this->BILLDATE->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->BILLDATE->caption(), $this->BILLDATE->RequiredErrorMessage));
			}
		}
		if (!CheckDate($this->BILLDATE->FormValue)) {
			AddMessage($FormError, $this->BILLDATE->errorMessage());
		}
		if ($this->PUnit->Required) {
			if (!$this->PUnit->IsDetailKey && $this->PUnit->FormValue != NULL && $this->PUnit->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PUnit->caption(), $this->PUnit->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->PUnit->FormValue)) {
			AddMessage($FormError, $this->PUnit->errorMessage());
		}
		if ($this->SUnit->Required) {
			if (!$this->SUnit->IsDetailKey && $this->SUnit->FormValue != NULL && $this->SUnit->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->SUnit->caption(), $this->SUnit->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->SUnit->FormValue)) {
			AddMessage($FormError, $this->SUnit->errorMessage());
		}
		if ($this->PurValue->Required) {
			if (!$this->PurValue->IsDetailKey && $this->PurValue->FormValue != NULL && $this->PurValue->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PurValue->caption(), $this->PurValue->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->PurValue->FormValue)) {
			AddMessage($FormError, $this->PurValue->errorMessage());
		}
		if ($this->PurRate->Required) {
			if (!$this->PurRate->IsDetailKey && $this->PurRate->FormValue != NULL && $this->PurRate->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PurRate->caption(), $this->PurRate->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->PurRate->FormValue)) {
			AddMessage($FormError, $this->PurRate->errorMessage());
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

			// PRC
			$this->PRC->setDbValueDef($rsnew, $this->PRC->CurrentValue, NULL, $this->PRC->ReadOnly);

			// PrName
			$this->PrName->setDbValueDef($rsnew, $this->PrName->CurrentValue, NULL, $this->PrName->ReadOnly);

			// BATCHNO
			$this->BATCHNO->setDbValueDef($rsnew, $this->BATCHNO->CurrentValue, NULL, $this->BATCHNO->ReadOnly);

			// BATCH
			$this->BATCH->setDbValueDef($rsnew, $this->BATCH->CurrentValue, NULL, $this->BATCH->ReadOnly);

			// MFRCODE
			$this->MFRCODE->setDbValueDef($rsnew, $this->MFRCODE->CurrentValue, NULL, $this->MFRCODE->ReadOnly);

			// EXPDT
			$this->EXPDT->setDbValueDef($rsnew, UnFormatDateTime($this->EXPDT->CurrentValue, 0), NULL, $this->EXPDT->ReadOnly);

			// PRCODE
			$this->PRCODE->setDbValueDef($rsnew, $this->PRCODE->CurrentValue, NULL, $this->PRCODE->ReadOnly);

			// OQ
			$this->OQ->setDbValueDef($rsnew, $this->OQ->CurrentValue, NULL, $this->OQ->ReadOnly);

			// RQ
			$this->RQ->setDbValueDef($rsnew, $this->RQ->CurrentValue, NULL, $this->RQ->ReadOnly);

			// FRQ
			$this->FRQ->setDbValueDef($rsnew, $this->FRQ->CurrentValue, NULL, $this->FRQ->ReadOnly);

			// IQ
			$this->IQ->setDbValueDef($rsnew, $this->IQ->CurrentValue, NULL, $this->IQ->ReadOnly);

			// MRQ
			$this->MRQ->setDbValueDef($rsnew, $this->MRQ->CurrentValue, NULL, $this->MRQ->ReadOnly);

			// MRP
			$this->MRP->setDbValueDef($rsnew, $this->MRP->CurrentValue, NULL, $this->MRP->ReadOnly);

			// UR
			$this->UR->setDbValueDef($rsnew, $this->UR->CurrentValue, NULL, $this->UR->ReadOnly);

			// PC
			$this->PC->setDbValueDef($rsnew, $this->PC->CurrentValue, NULL, $this->PC->ReadOnly);

			// OLDRT
			$this->OLDRT->setDbValueDef($rsnew, $this->OLDRT->CurrentValue, NULL, $this->OLDRT->ReadOnly);

			// TEMPMRQ
			$this->TEMPMRQ->setDbValueDef($rsnew, $this->TEMPMRQ->CurrentValue, NULL, $this->TEMPMRQ->ReadOnly);

			// TAXP
			$this->TAXP->setDbValueDef($rsnew, $this->TAXP->CurrentValue, NULL, $this->TAXP->ReadOnly);

			// OLDRATE
			$this->OLDRATE->setDbValueDef($rsnew, $this->OLDRATE->CurrentValue, NULL, $this->OLDRATE->ReadOnly);

			// NEWRATE
			$this->NEWRATE->setDbValueDef($rsnew, $this->NEWRATE->CurrentValue, NULL, $this->NEWRATE->ReadOnly);

			// OTEMPMRA
			$this->OTEMPMRA->setDbValueDef($rsnew, $this->OTEMPMRA->CurrentValue, NULL, $this->OTEMPMRA->ReadOnly);

			// ACTIVESTATUS
			$this->ACTIVESTATUS->setDbValueDef($rsnew, $this->ACTIVESTATUS->CurrentValue, NULL, $this->ACTIVESTATUS->ReadOnly);

			// PSGST
			$this->PSGST->setDbValueDef($rsnew, $this->PSGST->CurrentValue, NULL, $this->PSGST->ReadOnly);

			// PCGST
			$this->PCGST->setDbValueDef($rsnew, $this->PCGST->CurrentValue, NULL, $this->PCGST->ReadOnly);

			// SSGST
			$this->SSGST->setDbValueDef($rsnew, $this->SSGST->CurrentValue, NULL, $this->SSGST->ReadOnly);

			// SCGST
			$this->SCGST->setDbValueDef($rsnew, $this->SCGST->CurrentValue, NULL, $this->SCGST->ReadOnly);

			// RT
			$this->RT->setDbValueDef($rsnew, $this->RT->CurrentValue, NULL, $this->RT->ReadOnly);

			// BRCODE
			$this->BRCODE->setDbValueDef($rsnew, $this->BRCODE->CurrentValue, NULL, $this->BRCODE->ReadOnly);

			// HospID
			$this->HospID->setDbValueDef($rsnew, $this->HospID->CurrentValue, NULL, $this->HospID->ReadOnly);

			// UM
			$this->UM->setDbValueDef($rsnew, $this->UM->CurrentValue, NULL, $this->UM->ReadOnly);

			// GENNAME
			$this->GENNAME->setDbValueDef($rsnew, $this->GENNAME->CurrentValue, NULL, $this->GENNAME->ReadOnly);

			// BILLDATE
			$this->BILLDATE->setDbValueDef($rsnew, UnFormatDateTime($this->BILLDATE->CurrentValue, 0), NULL, $this->BILLDATE->ReadOnly);

			// PUnit
			$this->PUnit->setDbValueDef($rsnew, $this->PUnit->CurrentValue, NULL, $this->PUnit->ReadOnly);

			// SUnit
			$this->SUnit->setDbValueDef($rsnew, $this->SUnit->CurrentValue, NULL, $this->SUnit->ReadOnly);

			// PurValue
			$this->PurValue->setDbValueDef($rsnew, $this->PurValue->CurrentValue, NULL, $this->PurValue->ReadOnly);

			// PurRate
			$this->PurRate->setDbValueDef($rsnew, $this->PurRate->CurrentValue, NULL, $this->PurRate->ReadOnly);

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
		$Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("pharmacy_batchmaslist.php"), "", $this->TableVar, TRUE);
		$pageId = "edit";
		$Breadcrumb->add("edit", $pageId, $url);
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
						case "x_PrName":
							break;
						case "x_BRCODE":
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
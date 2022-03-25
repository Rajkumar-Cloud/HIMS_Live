<?php
namespace PHPMaker2019\HIMS;

/**
 * Page class
 */
class pharmacy_suppliers_edit extends pharmacy_suppliers
{

	// Page ID
	public $PageID = "edit";

	// Project ID
	public $ProjectID = "{EA4F6D13-AF8F-428D-9EA7-BA88D1107EC3}";

	// Table name
	public $TableName = 'pharmacy_suppliers';

	// Page object name
	public $PageObjName = "pharmacy_suppliers_edit";

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

		// Table object (pharmacy_suppliers)
		if (!isset($GLOBALS["pharmacy_suppliers"]) || get_class($GLOBALS["pharmacy_suppliers"]) == PROJECT_NAMESPACE . "pharmacy_suppliers") {
			$GLOBALS["pharmacy_suppliers"] = &$this;
			$GLOBALS["Table"] = &$GLOBALS["pharmacy_suppliers"];
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
			define(PROJECT_NAMESPACE . "TABLE_NAME", 'pharmacy_suppliers');

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
		global $EXPORT, $pharmacy_suppliers;
		if ($this->CustomExport && $this->CustomExport == $this->Export && array_key_exists($this->CustomExport, $EXPORT)) {
				$content = ob_get_contents();
			if ($ExportFileName == "")
				$ExportFileName = $this->TableVar;
			$class = PROJECT_NAMESPACE . $EXPORT[$this->CustomExport];
			if (class_exists($class)) {
				$doc = new $class($pharmacy_suppliers);
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
					if ($pageName == "pharmacy_suppliersview.php")
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
					$this->terminate(GetUrl("pharmacy_supplierslist.php"));
				else
					$this->terminate(GetUrl("login.php"));
				return;
			}
		}

		// Create form object
		$CurrentForm = new HttpForm();
		$this->CurrentAction = Param("action"); // Set up current action
		$this->Suppliercode->setVisibility();
		$this->Suppliername->setVisibility();
		$this->Abbreviation->setVisibility();
		$this->Creationdate->setVisibility();
		$this->Address1->setVisibility();
		$this->Address2->setVisibility();
		$this->Address3->setVisibility();
		$this->Citycode->setVisibility();
		$this->State->setVisibility();
		$this->Pincode->setVisibility();
		$this->Tngstnumber->setVisibility();
		$this->Phone->setVisibility();
		$this->Fax->setVisibility();
		$this->_Email->setVisibility();
		$this->Paymentmode->setVisibility();
		$this->Contactperson1->setVisibility();
		$this->CP1Address1->setVisibility();
		$this->CP1Address2->setVisibility();
		$this->CP1Address3->setVisibility();
		$this->CP1Citycode->setVisibility();
		$this->CP1State->setVisibility();
		$this->CP1Pincode->setVisibility();
		$this->CP1Designation->setVisibility();
		$this->CP1Phone->setVisibility();
		$this->CP1MobileNo->setVisibility();
		$this->CP1Fax->setVisibility();
		$this->CP1Email->setVisibility();
		$this->Contactperson2->setVisibility();
		$this->CP2Address1->setVisibility();
		$this->CP2Address2->setVisibility();
		$this->CP2Address3->setVisibility();
		$this->CP2Citycode->setVisibility();
		$this->CP2State->setVisibility();
		$this->CP2Pincode->setVisibility();
		$this->CP2Designation->setVisibility();
		$this->CP2Phone->setVisibility();
		$this->CP2MobileNo->setVisibility();
		$this->CP2Fax->setVisibility();
		$this->CP2Email->setVisibility();
		$this->Type->setVisibility();
		$this->Creditterms->setVisibility();
		$this->Remarks->setVisibility();
		$this->Tinnumber->setVisibility();
		$this->Universalsuppliercode->setVisibility();
		$this->Mobilenumber->setVisibility();
		$this->PANNumber->setVisibility();
		$this->SalesRepMobileNo->setVisibility();
		$this->GSTNumber->setVisibility();
		$this->TANNumber->setVisibility();
		$this->id->setVisibility();
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
					$this->terminate("pharmacy_supplierslist.php"); // No matching record, return to list
				}
				break;
			case "update": // Update
				$returnUrl = $this->getReturnUrl();
				if (GetPageName($returnUrl) == "pharmacy_supplierslist.php")
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

		// Check field name 'Suppliercode' first before field var 'x_Suppliercode'
		$val = $CurrentForm->hasValue("Suppliercode") ? $CurrentForm->getValue("Suppliercode") : $CurrentForm->getValue("x_Suppliercode");
		if (!$this->Suppliercode->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Suppliercode->Visible = FALSE; // Disable update for API request
			else
				$this->Suppliercode->setFormValue($val);
		}

		// Check field name 'Suppliername' first before field var 'x_Suppliername'
		$val = $CurrentForm->hasValue("Suppliername") ? $CurrentForm->getValue("Suppliername") : $CurrentForm->getValue("x_Suppliername");
		if (!$this->Suppliername->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Suppliername->Visible = FALSE; // Disable update for API request
			else
				$this->Suppliername->setFormValue($val);
		}

		// Check field name 'Abbreviation' first before field var 'x_Abbreviation'
		$val = $CurrentForm->hasValue("Abbreviation") ? $CurrentForm->getValue("Abbreviation") : $CurrentForm->getValue("x_Abbreviation");
		if (!$this->Abbreviation->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Abbreviation->Visible = FALSE; // Disable update for API request
			else
				$this->Abbreviation->setFormValue($val);
		}

		// Check field name 'Creationdate' first before field var 'x_Creationdate'
		$val = $CurrentForm->hasValue("Creationdate") ? $CurrentForm->getValue("Creationdate") : $CurrentForm->getValue("x_Creationdate");
		if (!$this->Creationdate->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Creationdate->Visible = FALSE; // Disable update for API request
			else
				$this->Creationdate->setFormValue($val);
			$this->Creationdate->CurrentValue = UnFormatDateTime($this->Creationdate->CurrentValue, 0);
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

		// Check field name 'Citycode' first before field var 'x_Citycode'
		$val = $CurrentForm->hasValue("Citycode") ? $CurrentForm->getValue("Citycode") : $CurrentForm->getValue("x_Citycode");
		if (!$this->Citycode->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Citycode->Visible = FALSE; // Disable update for API request
			else
				$this->Citycode->setFormValue($val);
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

		// Check field name 'Tngstnumber' first before field var 'x_Tngstnumber'
		$val = $CurrentForm->hasValue("Tngstnumber") ? $CurrentForm->getValue("Tngstnumber") : $CurrentForm->getValue("x_Tngstnumber");
		if (!$this->Tngstnumber->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Tngstnumber->Visible = FALSE; // Disable update for API request
			else
				$this->Tngstnumber->setFormValue($val);
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

		// Check field name 'Email' first before field var 'x__Email'
		$val = $CurrentForm->hasValue("Email") ? $CurrentForm->getValue("Email") : $CurrentForm->getValue("x__Email");
		if (!$this->_Email->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->_Email->Visible = FALSE; // Disable update for API request
			else
				$this->_Email->setFormValue($val);
		}

		// Check field name 'Paymentmode' first before field var 'x_Paymentmode'
		$val = $CurrentForm->hasValue("Paymentmode") ? $CurrentForm->getValue("Paymentmode") : $CurrentForm->getValue("x_Paymentmode");
		if (!$this->Paymentmode->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Paymentmode->Visible = FALSE; // Disable update for API request
			else
				$this->Paymentmode->setFormValue($val);
		}

		// Check field name 'Contactperson1' first before field var 'x_Contactperson1'
		$val = $CurrentForm->hasValue("Contactperson1") ? $CurrentForm->getValue("Contactperson1") : $CurrentForm->getValue("x_Contactperson1");
		if (!$this->Contactperson1->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Contactperson1->Visible = FALSE; // Disable update for API request
			else
				$this->Contactperson1->setFormValue($val);
		}

		// Check field name 'CP1Address1' first before field var 'x_CP1Address1'
		$val = $CurrentForm->hasValue("CP1Address1") ? $CurrentForm->getValue("CP1Address1") : $CurrentForm->getValue("x_CP1Address1");
		if (!$this->CP1Address1->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->CP1Address1->Visible = FALSE; // Disable update for API request
			else
				$this->CP1Address1->setFormValue($val);
		}

		// Check field name 'CP1Address2' first before field var 'x_CP1Address2'
		$val = $CurrentForm->hasValue("CP1Address2") ? $CurrentForm->getValue("CP1Address2") : $CurrentForm->getValue("x_CP1Address2");
		if (!$this->CP1Address2->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->CP1Address2->Visible = FALSE; // Disable update for API request
			else
				$this->CP1Address2->setFormValue($val);
		}

		// Check field name 'CP1Address3' first before field var 'x_CP1Address3'
		$val = $CurrentForm->hasValue("CP1Address3") ? $CurrentForm->getValue("CP1Address3") : $CurrentForm->getValue("x_CP1Address3");
		if (!$this->CP1Address3->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->CP1Address3->Visible = FALSE; // Disable update for API request
			else
				$this->CP1Address3->setFormValue($val);
		}

		// Check field name 'CP1Citycode' first before field var 'x_CP1Citycode'
		$val = $CurrentForm->hasValue("CP1Citycode") ? $CurrentForm->getValue("CP1Citycode") : $CurrentForm->getValue("x_CP1Citycode");
		if (!$this->CP1Citycode->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->CP1Citycode->Visible = FALSE; // Disable update for API request
			else
				$this->CP1Citycode->setFormValue($val);
		}

		// Check field name 'CP1State' first before field var 'x_CP1State'
		$val = $CurrentForm->hasValue("CP1State") ? $CurrentForm->getValue("CP1State") : $CurrentForm->getValue("x_CP1State");
		if (!$this->CP1State->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->CP1State->Visible = FALSE; // Disable update for API request
			else
				$this->CP1State->setFormValue($val);
		}

		// Check field name 'CP1Pincode' first before field var 'x_CP1Pincode'
		$val = $CurrentForm->hasValue("CP1Pincode") ? $CurrentForm->getValue("CP1Pincode") : $CurrentForm->getValue("x_CP1Pincode");
		if (!$this->CP1Pincode->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->CP1Pincode->Visible = FALSE; // Disable update for API request
			else
				$this->CP1Pincode->setFormValue($val);
		}

		// Check field name 'CP1Designation' first before field var 'x_CP1Designation'
		$val = $CurrentForm->hasValue("CP1Designation") ? $CurrentForm->getValue("CP1Designation") : $CurrentForm->getValue("x_CP1Designation");
		if (!$this->CP1Designation->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->CP1Designation->Visible = FALSE; // Disable update for API request
			else
				$this->CP1Designation->setFormValue($val);
		}

		// Check field name 'CP1Phone' first before field var 'x_CP1Phone'
		$val = $CurrentForm->hasValue("CP1Phone") ? $CurrentForm->getValue("CP1Phone") : $CurrentForm->getValue("x_CP1Phone");
		if (!$this->CP1Phone->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->CP1Phone->Visible = FALSE; // Disable update for API request
			else
				$this->CP1Phone->setFormValue($val);
		}

		// Check field name 'CP1MobileNo' first before field var 'x_CP1MobileNo'
		$val = $CurrentForm->hasValue("CP1MobileNo") ? $CurrentForm->getValue("CP1MobileNo") : $CurrentForm->getValue("x_CP1MobileNo");
		if (!$this->CP1MobileNo->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->CP1MobileNo->Visible = FALSE; // Disable update for API request
			else
				$this->CP1MobileNo->setFormValue($val);
		}

		// Check field name 'CP1Fax' first before field var 'x_CP1Fax'
		$val = $CurrentForm->hasValue("CP1Fax") ? $CurrentForm->getValue("CP1Fax") : $CurrentForm->getValue("x_CP1Fax");
		if (!$this->CP1Fax->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->CP1Fax->Visible = FALSE; // Disable update for API request
			else
				$this->CP1Fax->setFormValue($val);
		}

		// Check field name 'CP1Email' first before field var 'x_CP1Email'
		$val = $CurrentForm->hasValue("CP1Email") ? $CurrentForm->getValue("CP1Email") : $CurrentForm->getValue("x_CP1Email");
		if (!$this->CP1Email->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->CP1Email->Visible = FALSE; // Disable update for API request
			else
				$this->CP1Email->setFormValue($val);
		}

		// Check field name 'Contactperson2' first before field var 'x_Contactperson2'
		$val = $CurrentForm->hasValue("Contactperson2") ? $CurrentForm->getValue("Contactperson2") : $CurrentForm->getValue("x_Contactperson2");
		if (!$this->Contactperson2->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Contactperson2->Visible = FALSE; // Disable update for API request
			else
				$this->Contactperson2->setFormValue($val);
		}

		// Check field name 'CP2Address1' first before field var 'x_CP2Address1'
		$val = $CurrentForm->hasValue("CP2Address1") ? $CurrentForm->getValue("CP2Address1") : $CurrentForm->getValue("x_CP2Address1");
		if (!$this->CP2Address1->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->CP2Address1->Visible = FALSE; // Disable update for API request
			else
				$this->CP2Address1->setFormValue($val);
		}

		// Check field name 'CP2Address2' first before field var 'x_CP2Address2'
		$val = $CurrentForm->hasValue("CP2Address2") ? $CurrentForm->getValue("CP2Address2") : $CurrentForm->getValue("x_CP2Address2");
		if (!$this->CP2Address2->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->CP2Address2->Visible = FALSE; // Disable update for API request
			else
				$this->CP2Address2->setFormValue($val);
		}

		// Check field name 'CP2Address3' first before field var 'x_CP2Address3'
		$val = $CurrentForm->hasValue("CP2Address3") ? $CurrentForm->getValue("CP2Address3") : $CurrentForm->getValue("x_CP2Address3");
		if (!$this->CP2Address3->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->CP2Address3->Visible = FALSE; // Disable update for API request
			else
				$this->CP2Address3->setFormValue($val);
		}

		// Check field name 'CP2Citycode' first before field var 'x_CP2Citycode'
		$val = $CurrentForm->hasValue("CP2Citycode") ? $CurrentForm->getValue("CP2Citycode") : $CurrentForm->getValue("x_CP2Citycode");
		if (!$this->CP2Citycode->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->CP2Citycode->Visible = FALSE; // Disable update for API request
			else
				$this->CP2Citycode->setFormValue($val);
		}

		// Check field name 'CP2State' first before field var 'x_CP2State'
		$val = $CurrentForm->hasValue("CP2State") ? $CurrentForm->getValue("CP2State") : $CurrentForm->getValue("x_CP2State");
		if (!$this->CP2State->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->CP2State->Visible = FALSE; // Disable update for API request
			else
				$this->CP2State->setFormValue($val);
		}

		// Check field name 'CP2Pincode' first before field var 'x_CP2Pincode'
		$val = $CurrentForm->hasValue("CP2Pincode") ? $CurrentForm->getValue("CP2Pincode") : $CurrentForm->getValue("x_CP2Pincode");
		if (!$this->CP2Pincode->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->CP2Pincode->Visible = FALSE; // Disable update for API request
			else
				$this->CP2Pincode->setFormValue($val);
		}

		// Check field name 'CP2Designation' first before field var 'x_CP2Designation'
		$val = $CurrentForm->hasValue("CP2Designation") ? $CurrentForm->getValue("CP2Designation") : $CurrentForm->getValue("x_CP2Designation");
		if (!$this->CP2Designation->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->CP2Designation->Visible = FALSE; // Disable update for API request
			else
				$this->CP2Designation->setFormValue($val);
		}

		// Check field name 'CP2Phone' first before field var 'x_CP2Phone'
		$val = $CurrentForm->hasValue("CP2Phone") ? $CurrentForm->getValue("CP2Phone") : $CurrentForm->getValue("x_CP2Phone");
		if (!$this->CP2Phone->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->CP2Phone->Visible = FALSE; // Disable update for API request
			else
				$this->CP2Phone->setFormValue($val);
		}

		// Check field name 'CP2MobileNo' first before field var 'x_CP2MobileNo'
		$val = $CurrentForm->hasValue("CP2MobileNo") ? $CurrentForm->getValue("CP2MobileNo") : $CurrentForm->getValue("x_CP2MobileNo");
		if (!$this->CP2MobileNo->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->CP2MobileNo->Visible = FALSE; // Disable update for API request
			else
				$this->CP2MobileNo->setFormValue($val);
		}

		// Check field name 'CP2Fax' first before field var 'x_CP2Fax'
		$val = $CurrentForm->hasValue("CP2Fax") ? $CurrentForm->getValue("CP2Fax") : $CurrentForm->getValue("x_CP2Fax");
		if (!$this->CP2Fax->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->CP2Fax->Visible = FALSE; // Disable update for API request
			else
				$this->CP2Fax->setFormValue($val);
		}

		// Check field name 'CP2Email' first before field var 'x_CP2Email'
		$val = $CurrentForm->hasValue("CP2Email") ? $CurrentForm->getValue("CP2Email") : $CurrentForm->getValue("x_CP2Email");
		if (!$this->CP2Email->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->CP2Email->Visible = FALSE; // Disable update for API request
			else
				$this->CP2Email->setFormValue($val);
		}

		// Check field name 'Type' first before field var 'x_Type'
		$val = $CurrentForm->hasValue("Type") ? $CurrentForm->getValue("Type") : $CurrentForm->getValue("x_Type");
		if (!$this->Type->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Type->Visible = FALSE; // Disable update for API request
			else
				$this->Type->setFormValue($val);
		}

		// Check field name 'Creditterms' first before field var 'x_Creditterms'
		$val = $CurrentForm->hasValue("Creditterms") ? $CurrentForm->getValue("Creditterms") : $CurrentForm->getValue("x_Creditterms");
		if (!$this->Creditterms->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Creditterms->Visible = FALSE; // Disable update for API request
			else
				$this->Creditterms->setFormValue($val);
		}

		// Check field name 'Remarks' first before field var 'x_Remarks'
		$val = $CurrentForm->hasValue("Remarks") ? $CurrentForm->getValue("Remarks") : $CurrentForm->getValue("x_Remarks");
		if (!$this->Remarks->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Remarks->Visible = FALSE; // Disable update for API request
			else
				$this->Remarks->setFormValue($val);
		}

		// Check field name 'Tinnumber' first before field var 'x_Tinnumber'
		$val = $CurrentForm->hasValue("Tinnumber") ? $CurrentForm->getValue("Tinnumber") : $CurrentForm->getValue("x_Tinnumber");
		if (!$this->Tinnumber->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Tinnumber->Visible = FALSE; // Disable update for API request
			else
				$this->Tinnumber->setFormValue($val);
		}

		// Check field name 'Universalsuppliercode' first before field var 'x_Universalsuppliercode'
		$val = $CurrentForm->hasValue("Universalsuppliercode") ? $CurrentForm->getValue("Universalsuppliercode") : $CurrentForm->getValue("x_Universalsuppliercode");
		if (!$this->Universalsuppliercode->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Universalsuppliercode->Visible = FALSE; // Disable update for API request
			else
				$this->Universalsuppliercode->setFormValue($val);
		}

		// Check field name 'Mobilenumber' first before field var 'x_Mobilenumber'
		$val = $CurrentForm->hasValue("Mobilenumber") ? $CurrentForm->getValue("Mobilenumber") : $CurrentForm->getValue("x_Mobilenumber");
		if (!$this->Mobilenumber->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Mobilenumber->Visible = FALSE; // Disable update for API request
			else
				$this->Mobilenumber->setFormValue($val);
		}

		// Check field name 'PANNumber' first before field var 'x_PANNumber'
		$val = $CurrentForm->hasValue("PANNumber") ? $CurrentForm->getValue("PANNumber") : $CurrentForm->getValue("x_PANNumber");
		if (!$this->PANNumber->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->PANNumber->Visible = FALSE; // Disable update for API request
			else
				$this->PANNumber->setFormValue($val);
		}

		// Check field name 'SalesRepMobileNo' first before field var 'x_SalesRepMobileNo'
		$val = $CurrentForm->hasValue("SalesRepMobileNo") ? $CurrentForm->getValue("SalesRepMobileNo") : $CurrentForm->getValue("x_SalesRepMobileNo");
		if (!$this->SalesRepMobileNo->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->SalesRepMobileNo->Visible = FALSE; // Disable update for API request
			else
				$this->SalesRepMobileNo->setFormValue($val);
		}

		// Check field name 'GSTNumber' first before field var 'x_GSTNumber'
		$val = $CurrentForm->hasValue("GSTNumber") ? $CurrentForm->getValue("GSTNumber") : $CurrentForm->getValue("x_GSTNumber");
		if (!$this->GSTNumber->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->GSTNumber->Visible = FALSE; // Disable update for API request
			else
				$this->GSTNumber->setFormValue($val);
		}

		// Check field name 'TANNumber' first before field var 'x_TANNumber'
		$val = $CurrentForm->hasValue("TANNumber") ? $CurrentForm->getValue("TANNumber") : $CurrentForm->getValue("x_TANNumber");
		if (!$this->TANNumber->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->TANNumber->Visible = FALSE; // Disable update for API request
			else
				$this->TANNumber->setFormValue($val);
		}

		// Check field name 'id' first before field var 'x_id'
		$val = $CurrentForm->hasValue("id") ? $CurrentForm->getValue("id") : $CurrentForm->getValue("x_id");
		if (!$this->id->IsDetailKey)
			$this->id->setFormValue($val);
	}

	// Restore form values
	public function restoreFormValues()
	{
		global $CurrentForm;
		$this->Suppliercode->CurrentValue = $this->Suppliercode->FormValue;
		$this->Suppliername->CurrentValue = $this->Suppliername->FormValue;
		$this->Abbreviation->CurrentValue = $this->Abbreviation->FormValue;
		$this->Creationdate->CurrentValue = $this->Creationdate->FormValue;
		$this->Creationdate->CurrentValue = UnFormatDateTime($this->Creationdate->CurrentValue, 0);
		$this->Address1->CurrentValue = $this->Address1->FormValue;
		$this->Address2->CurrentValue = $this->Address2->FormValue;
		$this->Address3->CurrentValue = $this->Address3->FormValue;
		$this->Citycode->CurrentValue = $this->Citycode->FormValue;
		$this->State->CurrentValue = $this->State->FormValue;
		$this->Pincode->CurrentValue = $this->Pincode->FormValue;
		$this->Tngstnumber->CurrentValue = $this->Tngstnumber->FormValue;
		$this->Phone->CurrentValue = $this->Phone->FormValue;
		$this->Fax->CurrentValue = $this->Fax->FormValue;
		$this->_Email->CurrentValue = $this->_Email->FormValue;
		$this->Paymentmode->CurrentValue = $this->Paymentmode->FormValue;
		$this->Contactperson1->CurrentValue = $this->Contactperson1->FormValue;
		$this->CP1Address1->CurrentValue = $this->CP1Address1->FormValue;
		$this->CP1Address2->CurrentValue = $this->CP1Address2->FormValue;
		$this->CP1Address3->CurrentValue = $this->CP1Address3->FormValue;
		$this->CP1Citycode->CurrentValue = $this->CP1Citycode->FormValue;
		$this->CP1State->CurrentValue = $this->CP1State->FormValue;
		$this->CP1Pincode->CurrentValue = $this->CP1Pincode->FormValue;
		$this->CP1Designation->CurrentValue = $this->CP1Designation->FormValue;
		$this->CP1Phone->CurrentValue = $this->CP1Phone->FormValue;
		$this->CP1MobileNo->CurrentValue = $this->CP1MobileNo->FormValue;
		$this->CP1Fax->CurrentValue = $this->CP1Fax->FormValue;
		$this->CP1Email->CurrentValue = $this->CP1Email->FormValue;
		$this->Contactperson2->CurrentValue = $this->Contactperson2->FormValue;
		$this->CP2Address1->CurrentValue = $this->CP2Address1->FormValue;
		$this->CP2Address2->CurrentValue = $this->CP2Address2->FormValue;
		$this->CP2Address3->CurrentValue = $this->CP2Address3->FormValue;
		$this->CP2Citycode->CurrentValue = $this->CP2Citycode->FormValue;
		$this->CP2State->CurrentValue = $this->CP2State->FormValue;
		$this->CP2Pincode->CurrentValue = $this->CP2Pincode->FormValue;
		$this->CP2Designation->CurrentValue = $this->CP2Designation->FormValue;
		$this->CP2Phone->CurrentValue = $this->CP2Phone->FormValue;
		$this->CP2MobileNo->CurrentValue = $this->CP2MobileNo->FormValue;
		$this->CP2Fax->CurrentValue = $this->CP2Fax->FormValue;
		$this->CP2Email->CurrentValue = $this->CP2Email->FormValue;
		$this->Type->CurrentValue = $this->Type->FormValue;
		$this->Creditterms->CurrentValue = $this->Creditterms->FormValue;
		$this->Remarks->CurrentValue = $this->Remarks->FormValue;
		$this->Tinnumber->CurrentValue = $this->Tinnumber->FormValue;
		$this->Universalsuppliercode->CurrentValue = $this->Universalsuppliercode->FormValue;
		$this->Mobilenumber->CurrentValue = $this->Mobilenumber->FormValue;
		$this->PANNumber->CurrentValue = $this->PANNumber->FormValue;
		$this->SalesRepMobileNo->CurrentValue = $this->SalesRepMobileNo->FormValue;
		$this->GSTNumber->CurrentValue = $this->GSTNumber->FormValue;
		$this->TANNumber->CurrentValue = $this->TANNumber->FormValue;
		$this->id->CurrentValue = $this->id->FormValue;
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
		$this->Suppliercode->setDbValue($row['Suppliercode']);
		$this->Suppliername->setDbValue($row['Suppliername']);
		$this->Abbreviation->setDbValue($row['Abbreviation']);
		$this->Creationdate->setDbValue($row['Creationdate']);
		$this->Address1->setDbValue($row['Address1']);
		$this->Address2->setDbValue($row['Address2']);
		$this->Address3->setDbValue($row['Address3']);
		$this->Citycode->setDbValue($row['Citycode']);
		$this->State->setDbValue($row['State']);
		$this->Pincode->setDbValue($row['Pincode']);
		$this->Tngstnumber->setDbValue($row['Tngstnumber']);
		$this->Phone->setDbValue($row['Phone']);
		$this->Fax->setDbValue($row['Fax']);
		$this->_Email->setDbValue($row['Email']);
		$this->Paymentmode->setDbValue($row['Paymentmode']);
		$this->Contactperson1->setDbValue($row['Contactperson1']);
		$this->CP1Address1->setDbValue($row['CP1Address1']);
		$this->CP1Address2->setDbValue($row['CP1Address2']);
		$this->CP1Address3->setDbValue($row['CP1Address3']);
		$this->CP1Citycode->setDbValue($row['CP1Citycode']);
		$this->CP1State->setDbValue($row['CP1State']);
		$this->CP1Pincode->setDbValue($row['CP1Pincode']);
		$this->CP1Designation->setDbValue($row['CP1Designation']);
		$this->CP1Phone->setDbValue($row['CP1Phone']);
		$this->CP1MobileNo->setDbValue($row['CP1MobileNo']);
		$this->CP1Fax->setDbValue($row['CP1Fax']);
		$this->CP1Email->setDbValue($row['CP1Email']);
		$this->Contactperson2->setDbValue($row['Contactperson2']);
		$this->CP2Address1->setDbValue($row['CP2Address1']);
		$this->CP2Address2->setDbValue($row['CP2Address2']);
		$this->CP2Address3->setDbValue($row['CP2Address3']);
		$this->CP2Citycode->setDbValue($row['CP2Citycode']);
		$this->CP2State->setDbValue($row['CP2State']);
		$this->CP2Pincode->setDbValue($row['CP2Pincode']);
		$this->CP2Designation->setDbValue($row['CP2Designation']);
		$this->CP2Phone->setDbValue($row['CP2Phone']);
		$this->CP2MobileNo->setDbValue($row['CP2MobileNo']);
		$this->CP2Fax->setDbValue($row['CP2Fax']);
		$this->CP2Email->setDbValue($row['CP2Email']);
		$this->Type->setDbValue($row['Type']);
		$this->Creditterms->setDbValue($row['Creditterms']);
		$this->Remarks->setDbValue($row['Remarks']);
		$this->Tinnumber->setDbValue($row['Tinnumber']);
		$this->Universalsuppliercode->setDbValue($row['Universalsuppliercode']);
		$this->Mobilenumber->setDbValue($row['Mobilenumber']);
		$this->PANNumber->setDbValue($row['PANNumber']);
		$this->SalesRepMobileNo->setDbValue($row['SalesRepMobileNo']);
		$this->GSTNumber->setDbValue($row['GSTNumber']);
		$this->TANNumber->setDbValue($row['TANNumber']);
		$this->id->setDbValue($row['id']);
	}

	// Return a row with default values
	protected function newRow()
	{
		$row = [];
		$row['Suppliercode'] = NULL;
		$row['Suppliername'] = NULL;
		$row['Abbreviation'] = NULL;
		$row['Creationdate'] = NULL;
		$row['Address1'] = NULL;
		$row['Address2'] = NULL;
		$row['Address3'] = NULL;
		$row['Citycode'] = NULL;
		$row['State'] = NULL;
		$row['Pincode'] = NULL;
		$row['Tngstnumber'] = NULL;
		$row['Phone'] = NULL;
		$row['Fax'] = NULL;
		$row['Email'] = NULL;
		$row['Paymentmode'] = NULL;
		$row['Contactperson1'] = NULL;
		$row['CP1Address1'] = NULL;
		$row['CP1Address2'] = NULL;
		$row['CP1Address3'] = NULL;
		$row['CP1Citycode'] = NULL;
		$row['CP1State'] = NULL;
		$row['CP1Pincode'] = NULL;
		$row['CP1Designation'] = NULL;
		$row['CP1Phone'] = NULL;
		$row['CP1MobileNo'] = NULL;
		$row['CP1Fax'] = NULL;
		$row['CP1Email'] = NULL;
		$row['Contactperson2'] = NULL;
		$row['CP2Address1'] = NULL;
		$row['CP2Address2'] = NULL;
		$row['CP2Address3'] = NULL;
		$row['CP2Citycode'] = NULL;
		$row['CP2State'] = NULL;
		$row['CP2Pincode'] = NULL;
		$row['CP2Designation'] = NULL;
		$row['CP2Phone'] = NULL;
		$row['CP2MobileNo'] = NULL;
		$row['CP2Fax'] = NULL;
		$row['CP2Email'] = NULL;
		$row['Type'] = NULL;
		$row['Creditterms'] = NULL;
		$row['Remarks'] = NULL;
		$row['Tinnumber'] = NULL;
		$row['Universalsuppliercode'] = NULL;
		$row['Mobilenumber'] = NULL;
		$row['PANNumber'] = NULL;
		$row['SalesRepMobileNo'] = NULL;
		$row['GSTNumber'] = NULL;
		$row['TANNumber'] = NULL;
		$row['id'] = NULL;
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
		// Call Row_Rendering event

		$this->Row_Rendering();

		// Common render codes for all row types
		// Suppliercode
		// Suppliername
		// Abbreviation
		// Creationdate
		// Address1
		// Address2
		// Address3
		// Citycode
		// State
		// Pincode
		// Tngstnumber
		// Phone
		// Fax
		// Email
		// Paymentmode
		// Contactperson1
		// CP1Address1
		// CP1Address2
		// CP1Address3
		// CP1Citycode
		// CP1State
		// CP1Pincode
		// CP1Designation
		// CP1Phone
		// CP1MobileNo
		// CP1Fax
		// CP1Email
		// Contactperson2
		// CP2Address1
		// CP2Address2
		// CP2Address3
		// CP2Citycode
		// CP2State
		// CP2Pincode
		// CP2Designation
		// CP2Phone
		// CP2MobileNo
		// CP2Fax
		// CP2Email
		// Type
		// Creditterms
		// Remarks
		// Tinnumber
		// Universalsuppliercode
		// Mobilenumber
		// PANNumber
		// SalesRepMobileNo
		// GSTNumber
		// TANNumber
		// id

		if ($this->RowType == ROWTYPE_VIEW) { // View row

			// Suppliercode
			$this->Suppliercode->ViewValue = $this->Suppliercode->CurrentValue;
			$this->Suppliercode->ViewCustomAttributes = "";

			// Suppliername
			$this->Suppliername->ViewValue = $this->Suppliername->CurrentValue;
			$this->Suppliername->ViewCustomAttributes = "";

			// Abbreviation
			$this->Abbreviation->ViewValue = $this->Abbreviation->CurrentValue;
			$this->Abbreviation->ViewCustomAttributes = "";

			// Creationdate
			$this->Creationdate->ViewValue = $this->Creationdate->CurrentValue;
			$this->Creationdate->ViewValue = FormatDateTime($this->Creationdate->ViewValue, 0);
			$this->Creationdate->ViewCustomAttributes = "";

			// Address1
			$this->Address1->ViewValue = $this->Address1->CurrentValue;
			$this->Address1->ViewCustomAttributes = "";

			// Address2
			$this->Address2->ViewValue = $this->Address2->CurrentValue;
			$this->Address2->ViewCustomAttributes = "";

			// Address3
			$this->Address3->ViewValue = $this->Address3->CurrentValue;
			$this->Address3->ViewCustomAttributes = "";

			// Citycode
			$this->Citycode->ViewValue = $this->Citycode->CurrentValue;
			$this->Citycode->ViewValue = FormatNumber($this->Citycode->ViewValue, 0, -2, -2, -2);
			$this->Citycode->ViewCustomAttributes = "";

			// State
			$this->State->ViewValue = $this->State->CurrentValue;
			$this->State->ViewCustomAttributes = "";

			// Pincode
			$this->Pincode->ViewValue = $this->Pincode->CurrentValue;
			$this->Pincode->ViewCustomAttributes = "";

			// Tngstnumber
			$this->Tngstnumber->ViewValue = $this->Tngstnumber->CurrentValue;
			$this->Tngstnumber->ViewCustomAttributes = "";

			// Phone
			$this->Phone->ViewValue = $this->Phone->CurrentValue;
			$this->Phone->ViewCustomAttributes = "";

			// Fax
			$this->Fax->ViewValue = $this->Fax->CurrentValue;
			$this->Fax->ViewCustomAttributes = "";

			// Email
			$this->_Email->ViewValue = $this->_Email->CurrentValue;
			$this->_Email->ViewCustomAttributes = "";

			// Paymentmode
			$this->Paymentmode->ViewValue = $this->Paymentmode->CurrentValue;
			$this->Paymentmode->ViewCustomAttributes = "";

			// Contactperson1
			$this->Contactperson1->ViewValue = $this->Contactperson1->CurrentValue;
			$this->Contactperson1->ViewCustomAttributes = "";

			// CP1Address1
			$this->CP1Address1->ViewValue = $this->CP1Address1->CurrentValue;
			$this->CP1Address1->ViewCustomAttributes = "";

			// CP1Address2
			$this->CP1Address2->ViewValue = $this->CP1Address2->CurrentValue;
			$this->CP1Address2->ViewCustomAttributes = "";

			// CP1Address3
			$this->CP1Address3->ViewValue = $this->CP1Address3->CurrentValue;
			$this->CP1Address3->ViewCustomAttributes = "";

			// CP1Citycode
			$this->CP1Citycode->ViewValue = $this->CP1Citycode->CurrentValue;
			$this->CP1Citycode->ViewValue = FormatNumber($this->CP1Citycode->ViewValue, 0, -2, -2, -2);
			$this->CP1Citycode->ViewCustomAttributes = "";

			// CP1State
			$this->CP1State->ViewValue = $this->CP1State->CurrentValue;
			$this->CP1State->ViewCustomAttributes = "";

			// CP1Pincode
			$this->CP1Pincode->ViewValue = $this->CP1Pincode->CurrentValue;
			$this->CP1Pincode->ViewCustomAttributes = "";

			// CP1Designation
			$this->CP1Designation->ViewValue = $this->CP1Designation->CurrentValue;
			$this->CP1Designation->ViewCustomAttributes = "";

			// CP1Phone
			$this->CP1Phone->ViewValue = $this->CP1Phone->CurrentValue;
			$this->CP1Phone->ViewCustomAttributes = "";

			// CP1MobileNo
			$this->CP1MobileNo->ViewValue = $this->CP1MobileNo->CurrentValue;
			$this->CP1MobileNo->ViewCustomAttributes = "";

			// CP1Fax
			$this->CP1Fax->ViewValue = $this->CP1Fax->CurrentValue;
			$this->CP1Fax->ViewCustomAttributes = "";

			// CP1Email
			$this->CP1Email->ViewValue = $this->CP1Email->CurrentValue;
			$this->CP1Email->ViewCustomAttributes = "";

			// Contactperson2
			$this->Contactperson2->ViewValue = $this->Contactperson2->CurrentValue;
			$this->Contactperson2->ViewCustomAttributes = "";

			// CP2Address1
			$this->CP2Address1->ViewValue = $this->CP2Address1->CurrentValue;
			$this->CP2Address1->ViewCustomAttributes = "";

			// CP2Address2
			$this->CP2Address2->ViewValue = $this->CP2Address2->CurrentValue;
			$this->CP2Address2->ViewCustomAttributes = "";

			// CP2Address3
			$this->CP2Address3->ViewValue = $this->CP2Address3->CurrentValue;
			$this->CP2Address3->ViewCustomAttributes = "";

			// CP2Citycode
			$this->CP2Citycode->ViewValue = $this->CP2Citycode->CurrentValue;
			$this->CP2Citycode->ViewValue = FormatNumber($this->CP2Citycode->ViewValue, 0, -2, -2, -2);
			$this->CP2Citycode->ViewCustomAttributes = "";

			// CP2State
			$this->CP2State->ViewValue = $this->CP2State->CurrentValue;
			$this->CP2State->ViewCustomAttributes = "";

			// CP2Pincode
			$this->CP2Pincode->ViewValue = $this->CP2Pincode->CurrentValue;
			$this->CP2Pincode->ViewCustomAttributes = "";

			// CP2Designation
			$this->CP2Designation->ViewValue = $this->CP2Designation->CurrentValue;
			$this->CP2Designation->ViewCustomAttributes = "";

			// CP2Phone
			$this->CP2Phone->ViewValue = $this->CP2Phone->CurrentValue;
			$this->CP2Phone->ViewCustomAttributes = "";

			// CP2MobileNo
			$this->CP2MobileNo->ViewValue = $this->CP2MobileNo->CurrentValue;
			$this->CP2MobileNo->ViewCustomAttributes = "";

			// CP2Fax
			$this->CP2Fax->ViewValue = $this->CP2Fax->CurrentValue;
			$this->CP2Fax->ViewCustomAttributes = "";

			// CP2Email
			$this->CP2Email->ViewValue = $this->CP2Email->CurrentValue;
			$this->CP2Email->ViewCustomAttributes = "";

			// Type
			$this->Type->ViewValue = $this->Type->CurrentValue;
			$this->Type->ViewCustomAttributes = "";

			// Creditterms
			$this->Creditterms->ViewValue = $this->Creditterms->CurrentValue;
			$this->Creditterms->ViewCustomAttributes = "";

			// Remarks
			$this->Remarks->ViewValue = $this->Remarks->CurrentValue;
			$this->Remarks->ViewCustomAttributes = "";

			// Tinnumber
			$this->Tinnumber->ViewValue = $this->Tinnumber->CurrentValue;
			$this->Tinnumber->ViewCustomAttributes = "";

			// Universalsuppliercode
			$this->Universalsuppliercode->ViewValue = $this->Universalsuppliercode->CurrentValue;
			$this->Universalsuppliercode->ViewCustomAttributes = "";

			// Mobilenumber
			$this->Mobilenumber->ViewValue = $this->Mobilenumber->CurrentValue;
			$this->Mobilenumber->ViewCustomAttributes = "";

			// PANNumber
			$this->PANNumber->ViewValue = $this->PANNumber->CurrentValue;
			$this->PANNumber->ViewCustomAttributes = "";

			// SalesRepMobileNo
			$this->SalesRepMobileNo->ViewValue = $this->SalesRepMobileNo->CurrentValue;
			$this->SalesRepMobileNo->ViewCustomAttributes = "";

			// GSTNumber
			$this->GSTNumber->ViewValue = $this->GSTNumber->CurrentValue;
			$this->GSTNumber->ViewCustomAttributes = "";

			// TANNumber
			$this->TANNumber->ViewValue = $this->TANNumber->CurrentValue;
			$this->TANNumber->ViewCustomAttributes = "";

			// id
			$this->id->ViewValue = $this->id->CurrentValue;
			$this->id->ViewCustomAttributes = "";

			// Suppliercode
			$this->Suppliercode->LinkCustomAttributes = "";
			$this->Suppliercode->HrefValue = "";
			$this->Suppliercode->TooltipValue = "";

			// Suppliername
			$this->Suppliername->LinkCustomAttributes = "";
			$this->Suppliername->HrefValue = "";
			$this->Suppliername->TooltipValue = "";

			// Abbreviation
			$this->Abbreviation->LinkCustomAttributes = "";
			$this->Abbreviation->HrefValue = "";
			$this->Abbreviation->TooltipValue = "";

			// Creationdate
			$this->Creationdate->LinkCustomAttributes = "";
			$this->Creationdate->HrefValue = "";
			$this->Creationdate->TooltipValue = "";

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

			// Citycode
			$this->Citycode->LinkCustomAttributes = "";
			$this->Citycode->HrefValue = "";
			$this->Citycode->TooltipValue = "";

			// State
			$this->State->LinkCustomAttributes = "";
			$this->State->HrefValue = "";
			$this->State->TooltipValue = "";

			// Pincode
			$this->Pincode->LinkCustomAttributes = "";
			$this->Pincode->HrefValue = "";
			$this->Pincode->TooltipValue = "";

			// Tngstnumber
			$this->Tngstnumber->LinkCustomAttributes = "";
			$this->Tngstnumber->HrefValue = "";
			$this->Tngstnumber->TooltipValue = "";

			// Phone
			$this->Phone->LinkCustomAttributes = "";
			$this->Phone->HrefValue = "";
			$this->Phone->TooltipValue = "";

			// Fax
			$this->Fax->LinkCustomAttributes = "";
			$this->Fax->HrefValue = "";
			$this->Fax->TooltipValue = "";

			// Email
			$this->_Email->LinkCustomAttributes = "";
			$this->_Email->HrefValue = "";
			$this->_Email->TooltipValue = "";

			// Paymentmode
			$this->Paymentmode->LinkCustomAttributes = "";
			$this->Paymentmode->HrefValue = "";
			$this->Paymentmode->TooltipValue = "";

			// Contactperson1
			$this->Contactperson1->LinkCustomAttributes = "";
			$this->Contactperson1->HrefValue = "";
			$this->Contactperson1->TooltipValue = "";

			// CP1Address1
			$this->CP1Address1->LinkCustomAttributes = "";
			$this->CP1Address1->HrefValue = "";
			$this->CP1Address1->TooltipValue = "";

			// CP1Address2
			$this->CP1Address2->LinkCustomAttributes = "";
			$this->CP1Address2->HrefValue = "";
			$this->CP1Address2->TooltipValue = "";

			// CP1Address3
			$this->CP1Address3->LinkCustomAttributes = "";
			$this->CP1Address3->HrefValue = "";
			$this->CP1Address3->TooltipValue = "";

			// CP1Citycode
			$this->CP1Citycode->LinkCustomAttributes = "";
			$this->CP1Citycode->HrefValue = "";
			$this->CP1Citycode->TooltipValue = "";

			// CP1State
			$this->CP1State->LinkCustomAttributes = "";
			$this->CP1State->HrefValue = "";
			$this->CP1State->TooltipValue = "";

			// CP1Pincode
			$this->CP1Pincode->LinkCustomAttributes = "";
			$this->CP1Pincode->HrefValue = "";
			$this->CP1Pincode->TooltipValue = "";

			// CP1Designation
			$this->CP1Designation->LinkCustomAttributes = "";
			$this->CP1Designation->HrefValue = "";
			$this->CP1Designation->TooltipValue = "";

			// CP1Phone
			$this->CP1Phone->LinkCustomAttributes = "";
			$this->CP1Phone->HrefValue = "";
			$this->CP1Phone->TooltipValue = "";

			// CP1MobileNo
			$this->CP1MobileNo->LinkCustomAttributes = "";
			$this->CP1MobileNo->HrefValue = "";
			$this->CP1MobileNo->TooltipValue = "";

			// CP1Fax
			$this->CP1Fax->LinkCustomAttributes = "";
			$this->CP1Fax->HrefValue = "";
			$this->CP1Fax->TooltipValue = "";

			// CP1Email
			$this->CP1Email->LinkCustomAttributes = "";
			$this->CP1Email->HrefValue = "";
			$this->CP1Email->TooltipValue = "";

			// Contactperson2
			$this->Contactperson2->LinkCustomAttributes = "";
			$this->Contactperson2->HrefValue = "";
			$this->Contactperson2->TooltipValue = "";

			// CP2Address1
			$this->CP2Address1->LinkCustomAttributes = "";
			$this->CP2Address1->HrefValue = "";
			$this->CP2Address1->TooltipValue = "";

			// CP2Address2
			$this->CP2Address2->LinkCustomAttributes = "";
			$this->CP2Address2->HrefValue = "";
			$this->CP2Address2->TooltipValue = "";

			// CP2Address3
			$this->CP2Address3->LinkCustomAttributes = "";
			$this->CP2Address3->HrefValue = "";
			$this->CP2Address3->TooltipValue = "";

			// CP2Citycode
			$this->CP2Citycode->LinkCustomAttributes = "";
			$this->CP2Citycode->HrefValue = "";
			$this->CP2Citycode->TooltipValue = "";

			// CP2State
			$this->CP2State->LinkCustomAttributes = "";
			$this->CP2State->HrefValue = "";
			$this->CP2State->TooltipValue = "";

			// CP2Pincode
			$this->CP2Pincode->LinkCustomAttributes = "";
			$this->CP2Pincode->HrefValue = "";
			$this->CP2Pincode->TooltipValue = "";

			// CP2Designation
			$this->CP2Designation->LinkCustomAttributes = "";
			$this->CP2Designation->HrefValue = "";
			$this->CP2Designation->TooltipValue = "";

			// CP2Phone
			$this->CP2Phone->LinkCustomAttributes = "";
			$this->CP2Phone->HrefValue = "";
			$this->CP2Phone->TooltipValue = "";

			// CP2MobileNo
			$this->CP2MobileNo->LinkCustomAttributes = "";
			$this->CP2MobileNo->HrefValue = "";
			$this->CP2MobileNo->TooltipValue = "";

			// CP2Fax
			$this->CP2Fax->LinkCustomAttributes = "";
			$this->CP2Fax->HrefValue = "";
			$this->CP2Fax->TooltipValue = "";

			// CP2Email
			$this->CP2Email->LinkCustomAttributes = "";
			$this->CP2Email->HrefValue = "";
			$this->CP2Email->TooltipValue = "";

			// Type
			$this->Type->LinkCustomAttributes = "";
			$this->Type->HrefValue = "";
			$this->Type->TooltipValue = "";

			// Creditterms
			$this->Creditterms->LinkCustomAttributes = "";
			$this->Creditterms->HrefValue = "";
			$this->Creditterms->TooltipValue = "";

			// Remarks
			$this->Remarks->LinkCustomAttributes = "";
			$this->Remarks->HrefValue = "";
			$this->Remarks->TooltipValue = "";

			// Tinnumber
			$this->Tinnumber->LinkCustomAttributes = "";
			$this->Tinnumber->HrefValue = "";
			$this->Tinnumber->TooltipValue = "";

			// Universalsuppliercode
			$this->Universalsuppliercode->LinkCustomAttributes = "";
			$this->Universalsuppliercode->HrefValue = "";
			$this->Universalsuppliercode->TooltipValue = "";

			// Mobilenumber
			$this->Mobilenumber->LinkCustomAttributes = "";
			$this->Mobilenumber->HrefValue = "";
			$this->Mobilenumber->TooltipValue = "";

			// PANNumber
			$this->PANNumber->LinkCustomAttributes = "";
			$this->PANNumber->HrefValue = "";
			$this->PANNumber->TooltipValue = "";

			// SalesRepMobileNo
			$this->SalesRepMobileNo->LinkCustomAttributes = "";
			$this->SalesRepMobileNo->HrefValue = "";
			$this->SalesRepMobileNo->TooltipValue = "";

			// GSTNumber
			$this->GSTNumber->LinkCustomAttributes = "";
			$this->GSTNumber->HrefValue = "";
			$this->GSTNumber->TooltipValue = "";

			// TANNumber
			$this->TANNumber->LinkCustomAttributes = "";
			$this->TANNumber->HrefValue = "";
			$this->TANNumber->TooltipValue = "";

			// id
			$this->id->LinkCustomAttributes = "";
			$this->id->HrefValue = "";
			$this->id->TooltipValue = "";
		} elseif ($this->RowType == ROWTYPE_EDIT) { // Edit row

			// Suppliercode
			$this->Suppliercode->EditAttrs["class"] = "form-control";
			$this->Suppliercode->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Suppliercode->CurrentValue = HtmlDecode($this->Suppliercode->CurrentValue);
			$this->Suppliercode->EditValue = HtmlEncode($this->Suppliercode->CurrentValue);
			$this->Suppliercode->PlaceHolder = RemoveHtml($this->Suppliercode->caption());

			// Suppliername
			$this->Suppliername->EditAttrs["class"] = "form-control";
			$this->Suppliername->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Suppliername->CurrentValue = HtmlDecode($this->Suppliername->CurrentValue);
			$this->Suppliername->EditValue = HtmlEncode($this->Suppliername->CurrentValue);
			$this->Suppliername->PlaceHolder = RemoveHtml($this->Suppliername->caption());

			// Abbreviation
			$this->Abbreviation->EditAttrs["class"] = "form-control";
			$this->Abbreviation->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Abbreviation->CurrentValue = HtmlDecode($this->Abbreviation->CurrentValue);
			$this->Abbreviation->EditValue = HtmlEncode($this->Abbreviation->CurrentValue);
			$this->Abbreviation->PlaceHolder = RemoveHtml($this->Abbreviation->caption());

			// Creationdate
			$this->Creationdate->EditAttrs["class"] = "form-control";
			$this->Creationdate->EditCustomAttributes = "";
			$this->Creationdate->EditValue = HtmlEncode(FormatDateTime($this->Creationdate->CurrentValue, 8));
			$this->Creationdate->PlaceHolder = RemoveHtml($this->Creationdate->caption());

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

			// Citycode
			$this->Citycode->EditAttrs["class"] = "form-control";
			$this->Citycode->EditCustomAttributes = "";
			$this->Citycode->EditValue = HtmlEncode($this->Citycode->CurrentValue);
			$this->Citycode->PlaceHolder = RemoveHtml($this->Citycode->caption());

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

			// Tngstnumber
			$this->Tngstnumber->EditAttrs["class"] = "form-control";
			$this->Tngstnumber->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Tngstnumber->CurrentValue = HtmlDecode($this->Tngstnumber->CurrentValue);
			$this->Tngstnumber->EditValue = HtmlEncode($this->Tngstnumber->CurrentValue);
			$this->Tngstnumber->PlaceHolder = RemoveHtml($this->Tngstnumber->caption());

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

			// Email
			$this->_Email->EditAttrs["class"] = "form-control";
			$this->_Email->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->_Email->CurrentValue = HtmlDecode($this->_Email->CurrentValue);
			$this->_Email->EditValue = HtmlEncode($this->_Email->CurrentValue);
			$this->_Email->PlaceHolder = RemoveHtml($this->_Email->caption());

			// Paymentmode
			$this->Paymentmode->EditAttrs["class"] = "form-control";
			$this->Paymentmode->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Paymentmode->CurrentValue = HtmlDecode($this->Paymentmode->CurrentValue);
			$this->Paymentmode->EditValue = HtmlEncode($this->Paymentmode->CurrentValue);
			$this->Paymentmode->PlaceHolder = RemoveHtml($this->Paymentmode->caption());

			// Contactperson1
			$this->Contactperson1->EditAttrs["class"] = "form-control";
			$this->Contactperson1->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Contactperson1->CurrentValue = HtmlDecode($this->Contactperson1->CurrentValue);
			$this->Contactperson1->EditValue = HtmlEncode($this->Contactperson1->CurrentValue);
			$this->Contactperson1->PlaceHolder = RemoveHtml($this->Contactperson1->caption());

			// CP1Address1
			$this->CP1Address1->EditAttrs["class"] = "form-control";
			$this->CP1Address1->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->CP1Address1->CurrentValue = HtmlDecode($this->CP1Address1->CurrentValue);
			$this->CP1Address1->EditValue = HtmlEncode($this->CP1Address1->CurrentValue);
			$this->CP1Address1->PlaceHolder = RemoveHtml($this->CP1Address1->caption());

			// CP1Address2
			$this->CP1Address2->EditAttrs["class"] = "form-control";
			$this->CP1Address2->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->CP1Address2->CurrentValue = HtmlDecode($this->CP1Address2->CurrentValue);
			$this->CP1Address2->EditValue = HtmlEncode($this->CP1Address2->CurrentValue);
			$this->CP1Address2->PlaceHolder = RemoveHtml($this->CP1Address2->caption());

			// CP1Address3
			$this->CP1Address3->EditAttrs["class"] = "form-control";
			$this->CP1Address3->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->CP1Address3->CurrentValue = HtmlDecode($this->CP1Address3->CurrentValue);
			$this->CP1Address3->EditValue = HtmlEncode($this->CP1Address3->CurrentValue);
			$this->CP1Address3->PlaceHolder = RemoveHtml($this->CP1Address3->caption());

			// CP1Citycode
			$this->CP1Citycode->EditAttrs["class"] = "form-control";
			$this->CP1Citycode->EditCustomAttributes = "";
			$this->CP1Citycode->EditValue = HtmlEncode($this->CP1Citycode->CurrentValue);
			$this->CP1Citycode->PlaceHolder = RemoveHtml($this->CP1Citycode->caption());

			// CP1State
			$this->CP1State->EditAttrs["class"] = "form-control";
			$this->CP1State->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->CP1State->CurrentValue = HtmlDecode($this->CP1State->CurrentValue);
			$this->CP1State->EditValue = HtmlEncode($this->CP1State->CurrentValue);
			$this->CP1State->PlaceHolder = RemoveHtml($this->CP1State->caption());

			// CP1Pincode
			$this->CP1Pincode->EditAttrs["class"] = "form-control";
			$this->CP1Pincode->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->CP1Pincode->CurrentValue = HtmlDecode($this->CP1Pincode->CurrentValue);
			$this->CP1Pincode->EditValue = HtmlEncode($this->CP1Pincode->CurrentValue);
			$this->CP1Pincode->PlaceHolder = RemoveHtml($this->CP1Pincode->caption());

			// CP1Designation
			$this->CP1Designation->EditAttrs["class"] = "form-control";
			$this->CP1Designation->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->CP1Designation->CurrentValue = HtmlDecode($this->CP1Designation->CurrentValue);
			$this->CP1Designation->EditValue = HtmlEncode($this->CP1Designation->CurrentValue);
			$this->CP1Designation->PlaceHolder = RemoveHtml($this->CP1Designation->caption());

			// CP1Phone
			$this->CP1Phone->EditAttrs["class"] = "form-control";
			$this->CP1Phone->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->CP1Phone->CurrentValue = HtmlDecode($this->CP1Phone->CurrentValue);
			$this->CP1Phone->EditValue = HtmlEncode($this->CP1Phone->CurrentValue);
			$this->CP1Phone->PlaceHolder = RemoveHtml($this->CP1Phone->caption());

			// CP1MobileNo
			$this->CP1MobileNo->EditAttrs["class"] = "form-control";
			$this->CP1MobileNo->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->CP1MobileNo->CurrentValue = HtmlDecode($this->CP1MobileNo->CurrentValue);
			$this->CP1MobileNo->EditValue = HtmlEncode($this->CP1MobileNo->CurrentValue);
			$this->CP1MobileNo->PlaceHolder = RemoveHtml($this->CP1MobileNo->caption());

			// CP1Fax
			$this->CP1Fax->EditAttrs["class"] = "form-control";
			$this->CP1Fax->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->CP1Fax->CurrentValue = HtmlDecode($this->CP1Fax->CurrentValue);
			$this->CP1Fax->EditValue = HtmlEncode($this->CP1Fax->CurrentValue);
			$this->CP1Fax->PlaceHolder = RemoveHtml($this->CP1Fax->caption());

			// CP1Email
			$this->CP1Email->EditAttrs["class"] = "form-control";
			$this->CP1Email->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->CP1Email->CurrentValue = HtmlDecode($this->CP1Email->CurrentValue);
			$this->CP1Email->EditValue = HtmlEncode($this->CP1Email->CurrentValue);
			$this->CP1Email->PlaceHolder = RemoveHtml($this->CP1Email->caption());

			// Contactperson2
			$this->Contactperson2->EditAttrs["class"] = "form-control";
			$this->Contactperson2->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Contactperson2->CurrentValue = HtmlDecode($this->Contactperson2->CurrentValue);
			$this->Contactperson2->EditValue = HtmlEncode($this->Contactperson2->CurrentValue);
			$this->Contactperson2->PlaceHolder = RemoveHtml($this->Contactperson2->caption());

			// CP2Address1
			$this->CP2Address1->EditAttrs["class"] = "form-control";
			$this->CP2Address1->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->CP2Address1->CurrentValue = HtmlDecode($this->CP2Address1->CurrentValue);
			$this->CP2Address1->EditValue = HtmlEncode($this->CP2Address1->CurrentValue);
			$this->CP2Address1->PlaceHolder = RemoveHtml($this->CP2Address1->caption());

			// CP2Address2
			$this->CP2Address2->EditAttrs["class"] = "form-control";
			$this->CP2Address2->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->CP2Address2->CurrentValue = HtmlDecode($this->CP2Address2->CurrentValue);
			$this->CP2Address2->EditValue = HtmlEncode($this->CP2Address2->CurrentValue);
			$this->CP2Address2->PlaceHolder = RemoveHtml($this->CP2Address2->caption());

			// CP2Address3
			$this->CP2Address3->EditAttrs["class"] = "form-control";
			$this->CP2Address3->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->CP2Address3->CurrentValue = HtmlDecode($this->CP2Address3->CurrentValue);
			$this->CP2Address3->EditValue = HtmlEncode($this->CP2Address3->CurrentValue);
			$this->CP2Address3->PlaceHolder = RemoveHtml($this->CP2Address3->caption());

			// CP2Citycode
			$this->CP2Citycode->EditAttrs["class"] = "form-control";
			$this->CP2Citycode->EditCustomAttributes = "";
			$this->CP2Citycode->EditValue = HtmlEncode($this->CP2Citycode->CurrentValue);
			$this->CP2Citycode->PlaceHolder = RemoveHtml($this->CP2Citycode->caption());

			// CP2State
			$this->CP2State->EditAttrs["class"] = "form-control";
			$this->CP2State->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->CP2State->CurrentValue = HtmlDecode($this->CP2State->CurrentValue);
			$this->CP2State->EditValue = HtmlEncode($this->CP2State->CurrentValue);
			$this->CP2State->PlaceHolder = RemoveHtml($this->CP2State->caption());

			// CP2Pincode
			$this->CP2Pincode->EditAttrs["class"] = "form-control";
			$this->CP2Pincode->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->CP2Pincode->CurrentValue = HtmlDecode($this->CP2Pincode->CurrentValue);
			$this->CP2Pincode->EditValue = HtmlEncode($this->CP2Pincode->CurrentValue);
			$this->CP2Pincode->PlaceHolder = RemoveHtml($this->CP2Pincode->caption());

			// CP2Designation
			$this->CP2Designation->EditAttrs["class"] = "form-control";
			$this->CP2Designation->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->CP2Designation->CurrentValue = HtmlDecode($this->CP2Designation->CurrentValue);
			$this->CP2Designation->EditValue = HtmlEncode($this->CP2Designation->CurrentValue);
			$this->CP2Designation->PlaceHolder = RemoveHtml($this->CP2Designation->caption());

			// CP2Phone
			$this->CP2Phone->EditAttrs["class"] = "form-control";
			$this->CP2Phone->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->CP2Phone->CurrentValue = HtmlDecode($this->CP2Phone->CurrentValue);
			$this->CP2Phone->EditValue = HtmlEncode($this->CP2Phone->CurrentValue);
			$this->CP2Phone->PlaceHolder = RemoveHtml($this->CP2Phone->caption());

			// CP2MobileNo
			$this->CP2MobileNo->EditAttrs["class"] = "form-control";
			$this->CP2MobileNo->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->CP2MobileNo->CurrentValue = HtmlDecode($this->CP2MobileNo->CurrentValue);
			$this->CP2MobileNo->EditValue = HtmlEncode($this->CP2MobileNo->CurrentValue);
			$this->CP2MobileNo->PlaceHolder = RemoveHtml($this->CP2MobileNo->caption());

			// CP2Fax
			$this->CP2Fax->EditAttrs["class"] = "form-control";
			$this->CP2Fax->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->CP2Fax->CurrentValue = HtmlDecode($this->CP2Fax->CurrentValue);
			$this->CP2Fax->EditValue = HtmlEncode($this->CP2Fax->CurrentValue);
			$this->CP2Fax->PlaceHolder = RemoveHtml($this->CP2Fax->caption());

			// CP2Email
			$this->CP2Email->EditAttrs["class"] = "form-control";
			$this->CP2Email->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->CP2Email->CurrentValue = HtmlDecode($this->CP2Email->CurrentValue);
			$this->CP2Email->EditValue = HtmlEncode($this->CP2Email->CurrentValue);
			$this->CP2Email->PlaceHolder = RemoveHtml($this->CP2Email->caption());

			// Type
			$this->Type->EditAttrs["class"] = "form-control";
			$this->Type->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Type->CurrentValue = HtmlDecode($this->Type->CurrentValue);
			$this->Type->EditValue = HtmlEncode($this->Type->CurrentValue);
			$this->Type->PlaceHolder = RemoveHtml($this->Type->caption());

			// Creditterms
			$this->Creditterms->EditAttrs["class"] = "form-control";
			$this->Creditterms->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Creditterms->CurrentValue = HtmlDecode($this->Creditterms->CurrentValue);
			$this->Creditterms->EditValue = HtmlEncode($this->Creditterms->CurrentValue);
			$this->Creditterms->PlaceHolder = RemoveHtml($this->Creditterms->caption());

			// Remarks
			$this->Remarks->EditAttrs["class"] = "form-control";
			$this->Remarks->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Remarks->CurrentValue = HtmlDecode($this->Remarks->CurrentValue);
			$this->Remarks->EditValue = HtmlEncode($this->Remarks->CurrentValue);
			$this->Remarks->PlaceHolder = RemoveHtml($this->Remarks->caption());

			// Tinnumber
			$this->Tinnumber->EditAttrs["class"] = "form-control";
			$this->Tinnumber->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Tinnumber->CurrentValue = HtmlDecode($this->Tinnumber->CurrentValue);
			$this->Tinnumber->EditValue = HtmlEncode($this->Tinnumber->CurrentValue);
			$this->Tinnumber->PlaceHolder = RemoveHtml($this->Tinnumber->caption());

			// Universalsuppliercode
			$this->Universalsuppliercode->EditAttrs["class"] = "form-control";
			$this->Universalsuppliercode->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Universalsuppliercode->CurrentValue = HtmlDecode($this->Universalsuppliercode->CurrentValue);
			$this->Universalsuppliercode->EditValue = HtmlEncode($this->Universalsuppliercode->CurrentValue);
			$this->Universalsuppliercode->PlaceHolder = RemoveHtml($this->Universalsuppliercode->caption());

			// Mobilenumber
			$this->Mobilenumber->EditAttrs["class"] = "form-control";
			$this->Mobilenumber->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Mobilenumber->CurrentValue = HtmlDecode($this->Mobilenumber->CurrentValue);
			$this->Mobilenumber->EditValue = HtmlEncode($this->Mobilenumber->CurrentValue);
			$this->Mobilenumber->PlaceHolder = RemoveHtml($this->Mobilenumber->caption());

			// PANNumber
			$this->PANNumber->EditAttrs["class"] = "form-control";
			$this->PANNumber->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->PANNumber->CurrentValue = HtmlDecode($this->PANNumber->CurrentValue);
			$this->PANNumber->EditValue = HtmlEncode($this->PANNumber->CurrentValue);
			$this->PANNumber->PlaceHolder = RemoveHtml($this->PANNumber->caption());

			// SalesRepMobileNo
			$this->SalesRepMobileNo->EditAttrs["class"] = "form-control";
			$this->SalesRepMobileNo->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->SalesRepMobileNo->CurrentValue = HtmlDecode($this->SalesRepMobileNo->CurrentValue);
			$this->SalesRepMobileNo->EditValue = HtmlEncode($this->SalesRepMobileNo->CurrentValue);
			$this->SalesRepMobileNo->PlaceHolder = RemoveHtml($this->SalesRepMobileNo->caption());

			// GSTNumber
			$this->GSTNumber->EditAttrs["class"] = "form-control";
			$this->GSTNumber->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->GSTNumber->CurrentValue = HtmlDecode($this->GSTNumber->CurrentValue);
			$this->GSTNumber->EditValue = HtmlEncode($this->GSTNumber->CurrentValue);
			$this->GSTNumber->PlaceHolder = RemoveHtml($this->GSTNumber->caption());

			// TANNumber
			$this->TANNumber->EditAttrs["class"] = "form-control";
			$this->TANNumber->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->TANNumber->CurrentValue = HtmlDecode($this->TANNumber->CurrentValue);
			$this->TANNumber->EditValue = HtmlEncode($this->TANNumber->CurrentValue);
			$this->TANNumber->PlaceHolder = RemoveHtml($this->TANNumber->caption());

			// id
			$this->id->EditAttrs["class"] = "form-control";
			$this->id->EditCustomAttributes = "";
			$this->id->EditValue = $this->id->CurrentValue;
			$this->id->ViewCustomAttributes = "";

			// Edit refer script
			// Suppliercode

			$this->Suppliercode->LinkCustomAttributes = "";
			$this->Suppliercode->HrefValue = "";

			// Suppliername
			$this->Suppliername->LinkCustomAttributes = "";
			$this->Suppliername->HrefValue = "";

			// Abbreviation
			$this->Abbreviation->LinkCustomAttributes = "";
			$this->Abbreviation->HrefValue = "";

			// Creationdate
			$this->Creationdate->LinkCustomAttributes = "";
			$this->Creationdate->HrefValue = "";

			// Address1
			$this->Address1->LinkCustomAttributes = "";
			$this->Address1->HrefValue = "";

			// Address2
			$this->Address2->LinkCustomAttributes = "";
			$this->Address2->HrefValue = "";

			// Address3
			$this->Address3->LinkCustomAttributes = "";
			$this->Address3->HrefValue = "";

			// Citycode
			$this->Citycode->LinkCustomAttributes = "";
			$this->Citycode->HrefValue = "";

			// State
			$this->State->LinkCustomAttributes = "";
			$this->State->HrefValue = "";

			// Pincode
			$this->Pincode->LinkCustomAttributes = "";
			$this->Pincode->HrefValue = "";

			// Tngstnumber
			$this->Tngstnumber->LinkCustomAttributes = "";
			$this->Tngstnumber->HrefValue = "";

			// Phone
			$this->Phone->LinkCustomAttributes = "";
			$this->Phone->HrefValue = "";

			// Fax
			$this->Fax->LinkCustomAttributes = "";
			$this->Fax->HrefValue = "";

			// Email
			$this->_Email->LinkCustomAttributes = "";
			$this->_Email->HrefValue = "";

			// Paymentmode
			$this->Paymentmode->LinkCustomAttributes = "";
			$this->Paymentmode->HrefValue = "";

			// Contactperson1
			$this->Contactperson1->LinkCustomAttributes = "";
			$this->Contactperson1->HrefValue = "";

			// CP1Address1
			$this->CP1Address1->LinkCustomAttributes = "";
			$this->CP1Address1->HrefValue = "";

			// CP1Address2
			$this->CP1Address2->LinkCustomAttributes = "";
			$this->CP1Address2->HrefValue = "";

			// CP1Address3
			$this->CP1Address3->LinkCustomAttributes = "";
			$this->CP1Address3->HrefValue = "";

			// CP1Citycode
			$this->CP1Citycode->LinkCustomAttributes = "";
			$this->CP1Citycode->HrefValue = "";

			// CP1State
			$this->CP1State->LinkCustomAttributes = "";
			$this->CP1State->HrefValue = "";

			// CP1Pincode
			$this->CP1Pincode->LinkCustomAttributes = "";
			$this->CP1Pincode->HrefValue = "";

			// CP1Designation
			$this->CP1Designation->LinkCustomAttributes = "";
			$this->CP1Designation->HrefValue = "";

			// CP1Phone
			$this->CP1Phone->LinkCustomAttributes = "";
			$this->CP1Phone->HrefValue = "";

			// CP1MobileNo
			$this->CP1MobileNo->LinkCustomAttributes = "";
			$this->CP1MobileNo->HrefValue = "";

			// CP1Fax
			$this->CP1Fax->LinkCustomAttributes = "";
			$this->CP1Fax->HrefValue = "";

			// CP1Email
			$this->CP1Email->LinkCustomAttributes = "";
			$this->CP1Email->HrefValue = "";

			// Contactperson2
			$this->Contactperson2->LinkCustomAttributes = "";
			$this->Contactperson2->HrefValue = "";

			// CP2Address1
			$this->CP2Address1->LinkCustomAttributes = "";
			$this->CP2Address1->HrefValue = "";

			// CP2Address2
			$this->CP2Address2->LinkCustomAttributes = "";
			$this->CP2Address2->HrefValue = "";

			// CP2Address3
			$this->CP2Address3->LinkCustomAttributes = "";
			$this->CP2Address3->HrefValue = "";

			// CP2Citycode
			$this->CP2Citycode->LinkCustomAttributes = "";
			$this->CP2Citycode->HrefValue = "";

			// CP2State
			$this->CP2State->LinkCustomAttributes = "";
			$this->CP2State->HrefValue = "";

			// CP2Pincode
			$this->CP2Pincode->LinkCustomAttributes = "";
			$this->CP2Pincode->HrefValue = "";

			// CP2Designation
			$this->CP2Designation->LinkCustomAttributes = "";
			$this->CP2Designation->HrefValue = "";

			// CP2Phone
			$this->CP2Phone->LinkCustomAttributes = "";
			$this->CP2Phone->HrefValue = "";

			// CP2MobileNo
			$this->CP2MobileNo->LinkCustomAttributes = "";
			$this->CP2MobileNo->HrefValue = "";

			// CP2Fax
			$this->CP2Fax->LinkCustomAttributes = "";
			$this->CP2Fax->HrefValue = "";

			// CP2Email
			$this->CP2Email->LinkCustomAttributes = "";
			$this->CP2Email->HrefValue = "";

			// Type
			$this->Type->LinkCustomAttributes = "";
			$this->Type->HrefValue = "";

			// Creditterms
			$this->Creditterms->LinkCustomAttributes = "";
			$this->Creditterms->HrefValue = "";

			// Remarks
			$this->Remarks->LinkCustomAttributes = "";
			$this->Remarks->HrefValue = "";

			// Tinnumber
			$this->Tinnumber->LinkCustomAttributes = "";
			$this->Tinnumber->HrefValue = "";

			// Universalsuppliercode
			$this->Universalsuppliercode->LinkCustomAttributes = "";
			$this->Universalsuppliercode->HrefValue = "";

			// Mobilenumber
			$this->Mobilenumber->LinkCustomAttributes = "";
			$this->Mobilenumber->HrefValue = "";

			// PANNumber
			$this->PANNumber->LinkCustomAttributes = "";
			$this->PANNumber->HrefValue = "";

			// SalesRepMobileNo
			$this->SalesRepMobileNo->LinkCustomAttributes = "";
			$this->SalesRepMobileNo->HrefValue = "";

			// GSTNumber
			$this->GSTNumber->LinkCustomAttributes = "";
			$this->GSTNumber->HrefValue = "";

			// TANNumber
			$this->TANNumber->LinkCustomAttributes = "";
			$this->TANNumber->HrefValue = "";

			// id
			$this->id->LinkCustomAttributes = "";
			$this->id->HrefValue = "";
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
		if ($this->Suppliercode->Required) {
			if (!$this->Suppliercode->IsDetailKey && $this->Suppliercode->FormValue != NULL && $this->Suppliercode->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Suppliercode->caption(), $this->Suppliercode->RequiredErrorMessage));
			}
		}
		if ($this->Suppliername->Required) {
			if (!$this->Suppliername->IsDetailKey && $this->Suppliername->FormValue != NULL && $this->Suppliername->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Suppliername->caption(), $this->Suppliername->RequiredErrorMessage));
			}
		}
		if ($this->Abbreviation->Required) {
			if (!$this->Abbreviation->IsDetailKey && $this->Abbreviation->FormValue != NULL && $this->Abbreviation->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Abbreviation->caption(), $this->Abbreviation->RequiredErrorMessage));
			}
		}
		if ($this->Creationdate->Required) {
			if (!$this->Creationdate->IsDetailKey && $this->Creationdate->FormValue != NULL && $this->Creationdate->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Creationdate->caption(), $this->Creationdate->RequiredErrorMessage));
			}
		}
		if (!CheckDate($this->Creationdate->FormValue)) {
			AddMessage($FormError, $this->Creationdate->errorMessage());
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
		if ($this->Citycode->Required) {
			if (!$this->Citycode->IsDetailKey && $this->Citycode->FormValue != NULL && $this->Citycode->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Citycode->caption(), $this->Citycode->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->Citycode->FormValue)) {
			AddMessage($FormError, $this->Citycode->errorMessage());
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
		if ($this->Tngstnumber->Required) {
			if (!$this->Tngstnumber->IsDetailKey && $this->Tngstnumber->FormValue != NULL && $this->Tngstnumber->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Tngstnumber->caption(), $this->Tngstnumber->RequiredErrorMessage));
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
		if ($this->_Email->Required) {
			if (!$this->_Email->IsDetailKey && $this->_Email->FormValue != NULL && $this->_Email->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->_Email->caption(), $this->_Email->RequiredErrorMessage));
			}
		}
		if ($this->Paymentmode->Required) {
			if (!$this->Paymentmode->IsDetailKey && $this->Paymentmode->FormValue != NULL && $this->Paymentmode->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Paymentmode->caption(), $this->Paymentmode->RequiredErrorMessage));
			}
		}
		if ($this->Contactperson1->Required) {
			if (!$this->Contactperson1->IsDetailKey && $this->Contactperson1->FormValue != NULL && $this->Contactperson1->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Contactperson1->caption(), $this->Contactperson1->RequiredErrorMessage));
			}
		}
		if ($this->CP1Address1->Required) {
			if (!$this->CP1Address1->IsDetailKey && $this->CP1Address1->FormValue != NULL && $this->CP1Address1->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->CP1Address1->caption(), $this->CP1Address1->RequiredErrorMessage));
			}
		}
		if ($this->CP1Address2->Required) {
			if (!$this->CP1Address2->IsDetailKey && $this->CP1Address2->FormValue != NULL && $this->CP1Address2->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->CP1Address2->caption(), $this->CP1Address2->RequiredErrorMessage));
			}
		}
		if ($this->CP1Address3->Required) {
			if (!$this->CP1Address3->IsDetailKey && $this->CP1Address3->FormValue != NULL && $this->CP1Address3->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->CP1Address3->caption(), $this->CP1Address3->RequiredErrorMessage));
			}
		}
		if ($this->CP1Citycode->Required) {
			if (!$this->CP1Citycode->IsDetailKey && $this->CP1Citycode->FormValue != NULL && $this->CP1Citycode->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->CP1Citycode->caption(), $this->CP1Citycode->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->CP1Citycode->FormValue)) {
			AddMessage($FormError, $this->CP1Citycode->errorMessage());
		}
		if ($this->CP1State->Required) {
			if (!$this->CP1State->IsDetailKey && $this->CP1State->FormValue != NULL && $this->CP1State->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->CP1State->caption(), $this->CP1State->RequiredErrorMessage));
			}
		}
		if ($this->CP1Pincode->Required) {
			if (!$this->CP1Pincode->IsDetailKey && $this->CP1Pincode->FormValue != NULL && $this->CP1Pincode->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->CP1Pincode->caption(), $this->CP1Pincode->RequiredErrorMessage));
			}
		}
		if ($this->CP1Designation->Required) {
			if (!$this->CP1Designation->IsDetailKey && $this->CP1Designation->FormValue != NULL && $this->CP1Designation->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->CP1Designation->caption(), $this->CP1Designation->RequiredErrorMessage));
			}
		}
		if ($this->CP1Phone->Required) {
			if (!$this->CP1Phone->IsDetailKey && $this->CP1Phone->FormValue != NULL && $this->CP1Phone->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->CP1Phone->caption(), $this->CP1Phone->RequiredErrorMessage));
			}
		}
		if ($this->CP1MobileNo->Required) {
			if (!$this->CP1MobileNo->IsDetailKey && $this->CP1MobileNo->FormValue != NULL && $this->CP1MobileNo->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->CP1MobileNo->caption(), $this->CP1MobileNo->RequiredErrorMessage));
			}
		}
		if ($this->CP1Fax->Required) {
			if (!$this->CP1Fax->IsDetailKey && $this->CP1Fax->FormValue != NULL && $this->CP1Fax->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->CP1Fax->caption(), $this->CP1Fax->RequiredErrorMessage));
			}
		}
		if ($this->CP1Email->Required) {
			if (!$this->CP1Email->IsDetailKey && $this->CP1Email->FormValue != NULL && $this->CP1Email->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->CP1Email->caption(), $this->CP1Email->RequiredErrorMessage));
			}
		}
		if ($this->Contactperson2->Required) {
			if (!$this->Contactperson2->IsDetailKey && $this->Contactperson2->FormValue != NULL && $this->Contactperson2->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Contactperson2->caption(), $this->Contactperson2->RequiredErrorMessage));
			}
		}
		if ($this->CP2Address1->Required) {
			if (!$this->CP2Address1->IsDetailKey && $this->CP2Address1->FormValue != NULL && $this->CP2Address1->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->CP2Address1->caption(), $this->CP2Address1->RequiredErrorMessage));
			}
		}
		if ($this->CP2Address2->Required) {
			if (!$this->CP2Address2->IsDetailKey && $this->CP2Address2->FormValue != NULL && $this->CP2Address2->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->CP2Address2->caption(), $this->CP2Address2->RequiredErrorMessage));
			}
		}
		if ($this->CP2Address3->Required) {
			if (!$this->CP2Address3->IsDetailKey && $this->CP2Address3->FormValue != NULL && $this->CP2Address3->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->CP2Address3->caption(), $this->CP2Address3->RequiredErrorMessage));
			}
		}
		if ($this->CP2Citycode->Required) {
			if (!$this->CP2Citycode->IsDetailKey && $this->CP2Citycode->FormValue != NULL && $this->CP2Citycode->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->CP2Citycode->caption(), $this->CP2Citycode->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->CP2Citycode->FormValue)) {
			AddMessage($FormError, $this->CP2Citycode->errorMessage());
		}
		if ($this->CP2State->Required) {
			if (!$this->CP2State->IsDetailKey && $this->CP2State->FormValue != NULL && $this->CP2State->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->CP2State->caption(), $this->CP2State->RequiredErrorMessage));
			}
		}
		if ($this->CP2Pincode->Required) {
			if (!$this->CP2Pincode->IsDetailKey && $this->CP2Pincode->FormValue != NULL && $this->CP2Pincode->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->CP2Pincode->caption(), $this->CP2Pincode->RequiredErrorMessage));
			}
		}
		if ($this->CP2Designation->Required) {
			if (!$this->CP2Designation->IsDetailKey && $this->CP2Designation->FormValue != NULL && $this->CP2Designation->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->CP2Designation->caption(), $this->CP2Designation->RequiredErrorMessage));
			}
		}
		if ($this->CP2Phone->Required) {
			if (!$this->CP2Phone->IsDetailKey && $this->CP2Phone->FormValue != NULL && $this->CP2Phone->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->CP2Phone->caption(), $this->CP2Phone->RequiredErrorMessage));
			}
		}
		if ($this->CP2MobileNo->Required) {
			if (!$this->CP2MobileNo->IsDetailKey && $this->CP2MobileNo->FormValue != NULL && $this->CP2MobileNo->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->CP2MobileNo->caption(), $this->CP2MobileNo->RequiredErrorMessage));
			}
		}
		if ($this->CP2Fax->Required) {
			if (!$this->CP2Fax->IsDetailKey && $this->CP2Fax->FormValue != NULL && $this->CP2Fax->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->CP2Fax->caption(), $this->CP2Fax->RequiredErrorMessage));
			}
		}
		if ($this->CP2Email->Required) {
			if (!$this->CP2Email->IsDetailKey && $this->CP2Email->FormValue != NULL && $this->CP2Email->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->CP2Email->caption(), $this->CP2Email->RequiredErrorMessage));
			}
		}
		if ($this->Type->Required) {
			if (!$this->Type->IsDetailKey && $this->Type->FormValue != NULL && $this->Type->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Type->caption(), $this->Type->RequiredErrorMessage));
			}
		}
		if ($this->Creditterms->Required) {
			if (!$this->Creditterms->IsDetailKey && $this->Creditterms->FormValue != NULL && $this->Creditterms->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Creditterms->caption(), $this->Creditterms->RequiredErrorMessage));
			}
		}
		if ($this->Remarks->Required) {
			if (!$this->Remarks->IsDetailKey && $this->Remarks->FormValue != NULL && $this->Remarks->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Remarks->caption(), $this->Remarks->RequiredErrorMessage));
			}
		}
		if ($this->Tinnumber->Required) {
			if (!$this->Tinnumber->IsDetailKey && $this->Tinnumber->FormValue != NULL && $this->Tinnumber->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Tinnumber->caption(), $this->Tinnumber->RequiredErrorMessage));
			}
		}
		if ($this->Universalsuppliercode->Required) {
			if (!$this->Universalsuppliercode->IsDetailKey && $this->Universalsuppliercode->FormValue != NULL && $this->Universalsuppliercode->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Universalsuppliercode->caption(), $this->Universalsuppliercode->RequiredErrorMessage));
			}
		}
		if ($this->Mobilenumber->Required) {
			if (!$this->Mobilenumber->IsDetailKey && $this->Mobilenumber->FormValue != NULL && $this->Mobilenumber->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Mobilenumber->caption(), $this->Mobilenumber->RequiredErrorMessage));
			}
		}
		if ($this->PANNumber->Required) {
			if (!$this->PANNumber->IsDetailKey && $this->PANNumber->FormValue != NULL && $this->PANNumber->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PANNumber->caption(), $this->PANNumber->RequiredErrorMessage));
			}
		}
		if ($this->SalesRepMobileNo->Required) {
			if (!$this->SalesRepMobileNo->IsDetailKey && $this->SalesRepMobileNo->FormValue != NULL && $this->SalesRepMobileNo->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->SalesRepMobileNo->caption(), $this->SalesRepMobileNo->RequiredErrorMessage));
			}
		}
		if ($this->GSTNumber->Required) {
			if (!$this->GSTNumber->IsDetailKey && $this->GSTNumber->FormValue != NULL && $this->GSTNumber->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->GSTNumber->caption(), $this->GSTNumber->RequiredErrorMessage));
			}
		}
		if ($this->TANNumber->Required) {
			if (!$this->TANNumber->IsDetailKey && $this->TANNumber->FormValue != NULL && $this->TANNumber->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->TANNumber->caption(), $this->TANNumber->RequiredErrorMessage));
			}
		}
		if ($this->id->Required) {
			if (!$this->id->IsDetailKey && $this->id->FormValue != NULL && $this->id->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->id->caption(), $this->id->RequiredErrorMessage));
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
		if ($this->Suppliercode->CurrentValue <> "") { // Check field with unique index
			$filterChk = "(`Suppliercode` = '" . AdjustSql($this->Suppliercode->CurrentValue, $this->Dbid) . "')";
			$filterChk .= " AND NOT (" . $filter . ")";
			$this->CurrentFilter = $filterChk;
			$sqlChk = $this->getCurrentSql();
			$conn->raiseErrorFn = $GLOBALS["ERROR_FUNC"];
			$rsChk = $conn->Execute($sqlChk);
			$conn->raiseErrorFn = '';
			if ($rsChk === FALSE) {
				return FALSE;
			} elseif (!$rsChk->EOF) {
				$idxErrMsg = str_replace("%f", $this->Suppliercode->caption(), $Language->phrase("DupIndex"));
				$idxErrMsg = str_replace("%v", $this->Suppliercode->CurrentValue, $idxErrMsg);
				$this->setFailureMessage($idxErrMsg);
				$rsChk->close();
				return FALSE;
			}
			$rsChk->close();
		}
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

			// Suppliercode
			$this->Suppliercode->setDbValueDef($rsnew, $this->Suppliercode->CurrentValue, "", $this->Suppliercode->ReadOnly);

			// Suppliername
			$this->Suppliername->setDbValueDef($rsnew, $this->Suppliername->CurrentValue, "", $this->Suppliername->ReadOnly);

			// Abbreviation
			$this->Abbreviation->setDbValueDef($rsnew, $this->Abbreviation->CurrentValue, NULL, $this->Abbreviation->ReadOnly);

			// Creationdate
			$this->Creationdate->setDbValueDef($rsnew, UnFormatDateTime($this->Creationdate->CurrentValue, 0), NULL, $this->Creationdate->ReadOnly);

			// Address1
			$this->Address1->setDbValueDef($rsnew, $this->Address1->CurrentValue, NULL, $this->Address1->ReadOnly);

			// Address2
			$this->Address2->setDbValueDef($rsnew, $this->Address2->CurrentValue, NULL, $this->Address2->ReadOnly);

			// Address3
			$this->Address3->setDbValueDef($rsnew, $this->Address3->CurrentValue, NULL, $this->Address3->ReadOnly);

			// Citycode
			$this->Citycode->setDbValueDef($rsnew, $this->Citycode->CurrentValue, NULL, $this->Citycode->ReadOnly);

			// State
			$this->State->setDbValueDef($rsnew, $this->State->CurrentValue, NULL, $this->State->ReadOnly);

			// Pincode
			$this->Pincode->setDbValueDef($rsnew, $this->Pincode->CurrentValue, NULL, $this->Pincode->ReadOnly);

			// Tngstnumber
			$this->Tngstnumber->setDbValueDef($rsnew, $this->Tngstnumber->CurrentValue, NULL, $this->Tngstnumber->ReadOnly);

			// Phone
			$this->Phone->setDbValueDef($rsnew, $this->Phone->CurrentValue, NULL, $this->Phone->ReadOnly);

			// Fax
			$this->Fax->setDbValueDef($rsnew, $this->Fax->CurrentValue, NULL, $this->Fax->ReadOnly);

			// Email
			$this->_Email->setDbValueDef($rsnew, $this->_Email->CurrentValue, NULL, $this->_Email->ReadOnly);

			// Paymentmode
			$this->Paymentmode->setDbValueDef($rsnew, $this->Paymentmode->CurrentValue, NULL, $this->Paymentmode->ReadOnly);

			// Contactperson1
			$this->Contactperson1->setDbValueDef($rsnew, $this->Contactperson1->CurrentValue, NULL, $this->Contactperson1->ReadOnly);

			// CP1Address1
			$this->CP1Address1->setDbValueDef($rsnew, $this->CP1Address1->CurrentValue, NULL, $this->CP1Address1->ReadOnly);

			// CP1Address2
			$this->CP1Address2->setDbValueDef($rsnew, $this->CP1Address2->CurrentValue, NULL, $this->CP1Address2->ReadOnly);

			// CP1Address3
			$this->CP1Address3->setDbValueDef($rsnew, $this->CP1Address3->CurrentValue, NULL, $this->CP1Address3->ReadOnly);

			// CP1Citycode
			$this->CP1Citycode->setDbValueDef($rsnew, $this->CP1Citycode->CurrentValue, NULL, $this->CP1Citycode->ReadOnly);

			// CP1State
			$this->CP1State->setDbValueDef($rsnew, $this->CP1State->CurrentValue, NULL, $this->CP1State->ReadOnly);

			// CP1Pincode
			$this->CP1Pincode->setDbValueDef($rsnew, $this->CP1Pincode->CurrentValue, NULL, $this->CP1Pincode->ReadOnly);

			// CP1Designation
			$this->CP1Designation->setDbValueDef($rsnew, $this->CP1Designation->CurrentValue, NULL, $this->CP1Designation->ReadOnly);

			// CP1Phone
			$this->CP1Phone->setDbValueDef($rsnew, $this->CP1Phone->CurrentValue, NULL, $this->CP1Phone->ReadOnly);

			// CP1MobileNo
			$this->CP1MobileNo->setDbValueDef($rsnew, $this->CP1MobileNo->CurrentValue, NULL, $this->CP1MobileNo->ReadOnly);

			// CP1Fax
			$this->CP1Fax->setDbValueDef($rsnew, $this->CP1Fax->CurrentValue, NULL, $this->CP1Fax->ReadOnly);

			// CP1Email
			$this->CP1Email->setDbValueDef($rsnew, $this->CP1Email->CurrentValue, NULL, $this->CP1Email->ReadOnly);

			// Contactperson2
			$this->Contactperson2->setDbValueDef($rsnew, $this->Contactperson2->CurrentValue, NULL, $this->Contactperson2->ReadOnly);

			// CP2Address1
			$this->CP2Address1->setDbValueDef($rsnew, $this->CP2Address1->CurrentValue, NULL, $this->CP2Address1->ReadOnly);

			// CP2Address2
			$this->CP2Address2->setDbValueDef($rsnew, $this->CP2Address2->CurrentValue, NULL, $this->CP2Address2->ReadOnly);

			// CP2Address3
			$this->CP2Address3->setDbValueDef($rsnew, $this->CP2Address3->CurrentValue, NULL, $this->CP2Address3->ReadOnly);

			// CP2Citycode
			$this->CP2Citycode->setDbValueDef($rsnew, $this->CP2Citycode->CurrentValue, NULL, $this->CP2Citycode->ReadOnly);

			// CP2State
			$this->CP2State->setDbValueDef($rsnew, $this->CP2State->CurrentValue, NULL, $this->CP2State->ReadOnly);

			// CP2Pincode
			$this->CP2Pincode->setDbValueDef($rsnew, $this->CP2Pincode->CurrentValue, NULL, $this->CP2Pincode->ReadOnly);

			// CP2Designation
			$this->CP2Designation->setDbValueDef($rsnew, $this->CP2Designation->CurrentValue, NULL, $this->CP2Designation->ReadOnly);

			// CP2Phone
			$this->CP2Phone->setDbValueDef($rsnew, $this->CP2Phone->CurrentValue, NULL, $this->CP2Phone->ReadOnly);

			// CP2MobileNo
			$this->CP2MobileNo->setDbValueDef($rsnew, $this->CP2MobileNo->CurrentValue, NULL, $this->CP2MobileNo->ReadOnly);

			// CP2Fax
			$this->CP2Fax->setDbValueDef($rsnew, $this->CP2Fax->CurrentValue, NULL, $this->CP2Fax->ReadOnly);

			// CP2Email
			$this->CP2Email->setDbValueDef($rsnew, $this->CP2Email->CurrentValue, NULL, $this->CP2Email->ReadOnly);

			// Type
			$this->Type->setDbValueDef($rsnew, $this->Type->CurrentValue, NULL, $this->Type->ReadOnly);

			// Creditterms
			$this->Creditterms->setDbValueDef($rsnew, $this->Creditterms->CurrentValue, NULL, $this->Creditterms->ReadOnly);

			// Remarks
			$this->Remarks->setDbValueDef($rsnew, $this->Remarks->CurrentValue, NULL, $this->Remarks->ReadOnly);

			// Tinnumber
			$this->Tinnumber->setDbValueDef($rsnew, $this->Tinnumber->CurrentValue, NULL, $this->Tinnumber->ReadOnly);

			// Universalsuppliercode
			$this->Universalsuppliercode->setDbValueDef($rsnew, $this->Universalsuppliercode->CurrentValue, NULL, $this->Universalsuppliercode->ReadOnly);

			// Mobilenumber
			$this->Mobilenumber->setDbValueDef($rsnew, $this->Mobilenumber->CurrentValue, NULL, $this->Mobilenumber->ReadOnly);

			// PANNumber
			$this->PANNumber->setDbValueDef($rsnew, $this->PANNumber->CurrentValue, NULL, $this->PANNumber->ReadOnly);

			// SalesRepMobileNo
			$this->SalesRepMobileNo->setDbValueDef($rsnew, $this->SalesRepMobileNo->CurrentValue, NULL, $this->SalesRepMobileNo->ReadOnly);

			// GSTNumber
			$this->GSTNumber->setDbValueDef($rsnew, $this->GSTNumber->CurrentValue, NULL, $this->GSTNumber->ReadOnly);

			// TANNumber
			$this->TANNumber->setDbValueDef($rsnew, $this->TANNumber->CurrentValue, NULL, $this->TANNumber->ReadOnly);

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
		$Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("pharmacy_supplierslist.php"), "", $this->TableVar, TRUE);
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
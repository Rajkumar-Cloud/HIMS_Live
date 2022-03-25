<?php
namespace PHPMaker2019\HIMS;

/**
 * Page class
 */
class pharmacy_grn_edit extends pharmacy_grn
{

	// Page ID
	public $PageID = "edit";

	// Project ID
	public $ProjectID = "{EA4F6D13-AF8F-428D-9EA7-BA88D1107EC3}";

	// Table name
	public $TableName = 'pharmacy_grn';

	// Page object name
	public $PageObjName = "pharmacy_grn_edit";

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

		// Table object (pharmacy_grn)
		if (!isset($GLOBALS["pharmacy_grn"]) || get_class($GLOBALS["pharmacy_grn"]) == PROJECT_NAMESPACE . "pharmacy_grn") {
			$GLOBALS["pharmacy_grn"] = &$this;
			$GLOBALS["Table"] = &$GLOBALS["pharmacy_grn"];
		}
		$this->CancelUrl = $this->pageUrl() . "action=cancel";

		// Table object (user_login)
		if (!isset($GLOBALS['user_login']))
			$GLOBALS['user_login'] = new user_login();

		// Table object (pharmacy_payment)
		if (!isset($GLOBALS['pharmacy_payment']))
			$GLOBALS['pharmacy_payment'] = new pharmacy_payment();

		// Page ID
		if (!defined(PROJECT_NAMESPACE . "PAGE_ID"))
			define(PROJECT_NAMESPACE . "PAGE_ID", 'edit');

		// Table name (for backward compatibility)
		if (!defined(PROJECT_NAMESPACE . "TABLE_NAME"))
			define(PROJECT_NAMESPACE . "TABLE_NAME", 'pharmacy_grn');

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
		if (Post("customexport") === NULL) {

		// Page Unload event
		$this->Page_Unload();

		// Global Page Unloaded event (in userfn*.php)
		Page_Unloaded();
		}

		// Export
		global $EXPORT, $pharmacy_grn;
		if ($this->CustomExport && $this->CustomExport == $this->Export && array_key_exists($this->CustomExport, $EXPORT)) {
			if (is_array(@$_SESSION[SESSION_TEMP_IMAGES])) // Restore temp images
				$TempImages = @$_SESSION[SESSION_TEMP_IMAGES];
			if (Post("data") !== NULL)
				$content = Post("data");
			$ExportFileName = Post("filename", "");
			if ($ExportFileName == "")
				$ExportFileName = $this->TableVar;
			$class = PROJECT_NAMESPACE . $EXPORT[$this->CustomExport];
			if (class_exists($class)) {
				$doc = new $class($pharmacy_grn);
				$doc->Text = @$content;
				if ($this->isExport("email"))
					echo $this->exportEmail($doc->Text);
				else
					$doc->export();
				DeleteTempImages(); // Delete temp images
				exit();
			}
		}
	if ($this->CustomExport) { // Save temp images array for custom export
		if (is_array($TempImages))
			$_SESSION[SESSION_TEMP_IMAGES] = $TempImages;
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
					if ($pageName == "pharmacy_grnview.php")
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
					$this->terminate(GetUrl("pharmacy_grnlist.php"));
				else
					$this->terminate(GetUrl("login.php"));
				return;
			}
		}

		// Create form object
		$CurrentForm = new HttpForm();
		$this->CurrentAction = Param("action"); // Set up current action
		$this->id->setVisibility();
		$this->GRNNO->setVisibility();
		$this->DT->setVisibility();
		$this->YM->setVisibility();
		$this->PC->setVisibility();
		$this->Customercode->setVisibility();
		$this->Customername->setVisibility();
		$this->pharmacy_pocol->setVisibility();
		$this->Address1->setVisibility();
		$this->Address2->setVisibility();
		$this->Address3->setVisibility();
		$this->State->setVisibility();
		$this->Pincode->setVisibility();
		$this->Phone->setVisibility();
		$this->Fax->setVisibility();
		$this->EEmail->setVisibility();
		$this->HospID->setVisibility();
		$this->createdby->Visible = FALSE;
		$this->createddatetime->Visible = FALSE;
		$this->modifiedby->setVisibility();
		$this->modifieddatetime->setVisibility();
		$this->BILLNO->setVisibility();
		$this->BILLDT->setVisibility();
		$this->BRCODE->setVisibility();
		$this->PharmacyID->setVisibility();
		$this->BillTotalValue->setVisibility();
		$this->GRNTotalValue->setVisibility();
		$this->BillDiscount->setVisibility();
		$this->BillUpload->setVisibility();
		$this->TransPort->setVisibility();
		$this->AnyOther->setVisibility();
		$this->Remarks->setVisibility();
		$this->GrnValue->setVisibility();
		$this->Pid->setVisibility();
		$this->PaymentNo->setVisibility();
		$this->PaymentStatus->setVisibility();
		$this->PaidAmount->setVisibility();
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
		$this->setupLookupOptions($this->PC);
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

		// Set up master detail parameters
		$this->setupMasterParms();

		// Load current record
		$loaded = $this->loadRow();

		// Process form if post back
		if ($postBack) {
			$this->loadFormValues(); // Get form values

			// Set up detail parameters
			$this->setupDetailParms();
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
					$this->terminate("pharmacy_grnlist.php"); // No matching record, return to list
				}

				// Set up detail parameters
				$this->setupDetailParms();
				break;
			case "update": // Update
				if ($this->getCurrentDetailTable() <> "") // Master/detail edit
					$returnUrl = $this->getViewUrl(TABLE_SHOW_DETAIL . "=" . $this->getCurrentDetailTable()); // Master/Detail view page
				else
					$returnUrl = $this->getReturnUrl();
				if (GetPageName($returnUrl) == "pharmacy_grnlist.php")
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

					// Set up detail parameters
					$this->setupDetailParms();
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
		$this->BillUpload->Upload->Index = $CurrentForm->Index;
		$this->BillUpload->Upload->uploadFile();
		$this->BillUpload->CurrentValue = $this->BillUpload->Upload->FileName;
	}

	// Load form values
	protected function loadFormValues()
	{

		// Load from form
		global $CurrentForm;
		$this->getUploadFiles(); // Get upload files

		// Check field name 'id' first before field var 'x_id'
		$val = $CurrentForm->hasValue("id") ? $CurrentForm->getValue("id") : $CurrentForm->getValue("x_id");
		if (!$this->id->IsDetailKey)
			$this->id->setFormValue($val);

		// Check field name 'GRNNO' first before field var 'x_GRNNO'
		$val = $CurrentForm->hasValue("GRNNO") ? $CurrentForm->getValue("GRNNO") : $CurrentForm->getValue("x_GRNNO");
		if (!$this->GRNNO->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->GRNNO->Visible = FALSE; // Disable update for API request
			else
				$this->GRNNO->setFormValue($val);
		}

		// Check field name 'DT' first before field var 'x_DT'
		$val = $CurrentForm->hasValue("DT") ? $CurrentForm->getValue("DT") : $CurrentForm->getValue("x_DT");
		if (!$this->DT->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->DT->Visible = FALSE; // Disable update for API request
			else
				$this->DT->setFormValue($val);
			$this->DT->CurrentValue = UnFormatDateTime($this->DT->CurrentValue, 7);
		}

		// Check field name 'YM' first before field var 'x_YM'
		$val = $CurrentForm->hasValue("YM") ? $CurrentForm->getValue("YM") : $CurrentForm->getValue("x_YM");
		if (!$this->YM->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->YM->Visible = FALSE; // Disable update for API request
			else
				$this->YM->setFormValue($val);
		}

		// Check field name 'PC' first before field var 'x_PC'
		$val = $CurrentForm->hasValue("PC") ? $CurrentForm->getValue("PC") : $CurrentForm->getValue("x_PC");
		if (!$this->PC->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->PC->Visible = FALSE; // Disable update for API request
			else
				$this->PC->setFormValue($val);
		}

		// Check field name 'Customercode' first before field var 'x_Customercode'
		$val = $CurrentForm->hasValue("Customercode") ? $CurrentForm->getValue("Customercode") : $CurrentForm->getValue("x_Customercode");
		if (!$this->Customercode->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Customercode->Visible = FALSE; // Disable update for API request
			else
				$this->Customercode->setFormValue($val);
		}

		// Check field name 'Customername' first before field var 'x_Customername'
		$val = $CurrentForm->hasValue("Customername") ? $CurrentForm->getValue("Customername") : $CurrentForm->getValue("x_Customername");
		if (!$this->Customername->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Customername->Visible = FALSE; // Disable update for API request
			else
				$this->Customername->setFormValue($val);
		}

		// Check field name 'pharmacy_pocol' first before field var 'x_pharmacy_pocol'
		$val = $CurrentForm->hasValue("pharmacy_pocol") ? $CurrentForm->getValue("pharmacy_pocol") : $CurrentForm->getValue("x_pharmacy_pocol");
		if (!$this->pharmacy_pocol->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->pharmacy_pocol->Visible = FALSE; // Disable update for API request
			else
				$this->pharmacy_pocol->setFormValue($val);
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

		// Check field name 'EEmail' first before field var 'x_EEmail'
		$val = $CurrentForm->hasValue("EEmail") ? $CurrentForm->getValue("EEmail") : $CurrentForm->getValue("x_EEmail");
		if (!$this->EEmail->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->EEmail->Visible = FALSE; // Disable update for API request
			else
				$this->EEmail->setFormValue($val);
		}

		// Check field name 'HospID' first before field var 'x_HospID'
		$val = $CurrentForm->hasValue("HospID") ? $CurrentForm->getValue("HospID") : $CurrentForm->getValue("x_HospID");
		if (!$this->HospID->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->HospID->Visible = FALSE; // Disable update for API request
			else
				$this->HospID->setFormValue($val);
		}

		// Check field name 'modifiedby' first before field var 'x_modifiedby'
		$val = $CurrentForm->hasValue("modifiedby") ? $CurrentForm->getValue("modifiedby") : $CurrentForm->getValue("x_modifiedby");
		if (!$this->modifiedby->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->modifiedby->Visible = FALSE; // Disable update for API request
			else
				$this->modifiedby->setFormValue($val);
		}

		// Check field name 'modifieddatetime' first before field var 'x_modifieddatetime'
		$val = $CurrentForm->hasValue("modifieddatetime") ? $CurrentForm->getValue("modifieddatetime") : $CurrentForm->getValue("x_modifieddatetime");
		if (!$this->modifieddatetime->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->modifieddatetime->Visible = FALSE; // Disable update for API request
			else
				$this->modifieddatetime->setFormValue($val);
			$this->modifieddatetime->CurrentValue = UnFormatDateTime($this->modifieddatetime->CurrentValue, 0);
		}

		// Check field name 'BILLNO' first before field var 'x_BILLNO'
		$val = $CurrentForm->hasValue("BILLNO") ? $CurrentForm->getValue("BILLNO") : $CurrentForm->getValue("x_BILLNO");
		if (!$this->BILLNO->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->BILLNO->Visible = FALSE; // Disable update for API request
			else
				$this->BILLNO->setFormValue($val);
		}

		// Check field name 'BILLDT' first before field var 'x_BILLDT'
		$val = $CurrentForm->hasValue("BILLDT") ? $CurrentForm->getValue("BILLDT") : $CurrentForm->getValue("x_BILLDT");
		if (!$this->BILLDT->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->BILLDT->Visible = FALSE; // Disable update for API request
			else
				$this->BILLDT->setFormValue($val);
			$this->BILLDT->CurrentValue = UnFormatDateTime($this->BILLDT->CurrentValue, 0);
		}

		// Check field name 'BRCODE' first before field var 'x_BRCODE'
		$val = $CurrentForm->hasValue("BRCODE") ? $CurrentForm->getValue("BRCODE") : $CurrentForm->getValue("x_BRCODE");
		if (!$this->BRCODE->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->BRCODE->Visible = FALSE; // Disable update for API request
			else
				$this->BRCODE->setFormValue($val);
		}

		// Check field name 'PharmacyID' first before field var 'x_PharmacyID'
		$val = $CurrentForm->hasValue("PharmacyID") ? $CurrentForm->getValue("PharmacyID") : $CurrentForm->getValue("x_PharmacyID");
		if (!$this->PharmacyID->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->PharmacyID->Visible = FALSE; // Disable update for API request
			else
				$this->PharmacyID->setFormValue($val);
		}

		// Check field name 'BillTotalValue' first before field var 'x_BillTotalValue'
		$val = $CurrentForm->hasValue("BillTotalValue") ? $CurrentForm->getValue("BillTotalValue") : $CurrentForm->getValue("x_BillTotalValue");
		if (!$this->BillTotalValue->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->BillTotalValue->Visible = FALSE; // Disable update for API request
			else
				$this->BillTotalValue->setFormValue($val);
		}

		// Check field name 'GRNTotalValue' first before field var 'x_GRNTotalValue'
		$val = $CurrentForm->hasValue("GRNTotalValue") ? $CurrentForm->getValue("GRNTotalValue") : $CurrentForm->getValue("x_GRNTotalValue");
		if (!$this->GRNTotalValue->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->GRNTotalValue->Visible = FALSE; // Disable update for API request
			else
				$this->GRNTotalValue->setFormValue($val);
		}

		// Check field name 'BillDiscount' first before field var 'x_BillDiscount'
		$val = $CurrentForm->hasValue("BillDiscount") ? $CurrentForm->getValue("BillDiscount") : $CurrentForm->getValue("x_BillDiscount");
		if (!$this->BillDiscount->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->BillDiscount->Visible = FALSE; // Disable update for API request
			else
				$this->BillDiscount->setFormValue($val);
		}

		// Check field name 'TransPort' first before field var 'x_TransPort'
		$val = $CurrentForm->hasValue("TransPort") ? $CurrentForm->getValue("TransPort") : $CurrentForm->getValue("x_TransPort");
		if (!$this->TransPort->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->TransPort->Visible = FALSE; // Disable update for API request
			else
				$this->TransPort->setFormValue($val);
		}

		// Check field name 'AnyOther' first before field var 'x_AnyOther'
		$val = $CurrentForm->hasValue("AnyOther") ? $CurrentForm->getValue("AnyOther") : $CurrentForm->getValue("x_AnyOther");
		if (!$this->AnyOther->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->AnyOther->Visible = FALSE; // Disable update for API request
			else
				$this->AnyOther->setFormValue($val);
		}

		// Check field name 'Remarks' first before field var 'x_Remarks'
		$val = $CurrentForm->hasValue("Remarks") ? $CurrentForm->getValue("Remarks") : $CurrentForm->getValue("x_Remarks");
		if (!$this->Remarks->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Remarks->Visible = FALSE; // Disable update for API request
			else
				$this->Remarks->setFormValue($val);
		}

		// Check field name 'GrnValue' first before field var 'x_GrnValue'
		$val = $CurrentForm->hasValue("GrnValue") ? $CurrentForm->getValue("GrnValue") : $CurrentForm->getValue("x_GrnValue");
		if (!$this->GrnValue->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->GrnValue->Visible = FALSE; // Disable update for API request
			else
				$this->GrnValue->setFormValue($val);
		}

		// Check field name 'Pid' first before field var 'x_Pid'
		$val = $CurrentForm->hasValue("Pid") ? $CurrentForm->getValue("Pid") : $CurrentForm->getValue("x_Pid");
		if (!$this->Pid->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Pid->Visible = FALSE; // Disable update for API request
			else
				$this->Pid->setFormValue($val);
		}

		// Check field name 'PaymentNo' first before field var 'x_PaymentNo'
		$val = $CurrentForm->hasValue("PaymentNo") ? $CurrentForm->getValue("PaymentNo") : $CurrentForm->getValue("x_PaymentNo");
		if (!$this->PaymentNo->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->PaymentNo->Visible = FALSE; // Disable update for API request
			else
				$this->PaymentNo->setFormValue($val);
		}

		// Check field name 'PaymentStatus' first before field var 'x_PaymentStatus'
		$val = $CurrentForm->hasValue("PaymentStatus") ? $CurrentForm->getValue("PaymentStatus") : $CurrentForm->getValue("x_PaymentStatus");
		if (!$this->PaymentStatus->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->PaymentStatus->Visible = FALSE; // Disable update for API request
			else
				$this->PaymentStatus->setFormValue($val);
		}

		// Check field name 'PaidAmount' first before field var 'x_PaidAmount'
		$val = $CurrentForm->hasValue("PaidAmount") ? $CurrentForm->getValue("PaidAmount") : $CurrentForm->getValue("x_PaidAmount");
		if (!$this->PaidAmount->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->PaidAmount->Visible = FALSE; // Disable update for API request
			else
				$this->PaidAmount->setFormValue($val);
		}
	}

	// Restore form values
	public function restoreFormValues()
	{
		global $CurrentForm;
		$this->id->CurrentValue = $this->id->FormValue;
		$this->GRNNO->CurrentValue = $this->GRNNO->FormValue;
		$this->DT->CurrentValue = $this->DT->FormValue;
		$this->DT->CurrentValue = UnFormatDateTime($this->DT->CurrentValue, 7);
		$this->YM->CurrentValue = $this->YM->FormValue;
		$this->PC->CurrentValue = $this->PC->FormValue;
		$this->Customercode->CurrentValue = $this->Customercode->FormValue;
		$this->Customername->CurrentValue = $this->Customername->FormValue;
		$this->pharmacy_pocol->CurrentValue = $this->pharmacy_pocol->FormValue;
		$this->Address1->CurrentValue = $this->Address1->FormValue;
		$this->Address2->CurrentValue = $this->Address2->FormValue;
		$this->Address3->CurrentValue = $this->Address3->FormValue;
		$this->State->CurrentValue = $this->State->FormValue;
		$this->Pincode->CurrentValue = $this->Pincode->FormValue;
		$this->Phone->CurrentValue = $this->Phone->FormValue;
		$this->Fax->CurrentValue = $this->Fax->FormValue;
		$this->EEmail->CurrentValue = $this->EEmail->FormValue;
		$this->HospID->CurrentValue = $this->HospID->FormValue;
		$this->modifiedby->CurrentValue = $this->modifiedby->FormValue;
		$this->modifieddatetime->CurrentValue = $this->modifieddatetime->FormValue;
		$this->modifieddatetime->CurrentValue = UnFormatDateTime($this->modifieddatetime->CurrentValue, 0);
		$this->BILLNO->CurrentValue = $this->BILLNO->FormValue;
		$this->BILLDT->CurrentValue = $this->BILLDT->FormValue;
		$this->BILLDT->CurrentValue = UnFormatDateTime($this->BILLDT->CurrentValue, 0);
		$this->BRCODE->CurrentValue = $this->BRCODE->FormValue;
		$this->PharmacyID->CurrentValue = $this->PharmacyID->FormValue;
		$this->BillTotalValue->CurrentValue = $this->BillTotalValue->FormValue;
		$this->GRNTotalValue->CurrentValue = $this->GRNTotalValue->FormValue;
		$this->BillDiscount->CurrentValue = $this->BillDiscount->FormValue;
		$this->TransPort->CurrentValue = $this->TransPort->FormValue;
		$this->AnyOther->CurrentValue = $this->AnyOther->FormValue;
		$this->Remarks->CurrentValue = $this->Remarks->FormValue;
		$this->GrnValue->CurrentValue = $this->GrnValue->FormValue;
		$this->Pid->CurrentValue = $this->Pid->FormValue;
		$this->PaymentNo->CurrentValue = $this->PaymentNo->FormValue;
		$this->PaymentStatus->CurrentValue = $this->PaymentStatus->FormValue;
		$this->PaidAmount->CurrentValue = $this->PaidAmount->FormValue;
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
		$this->GRNNO->setDbValue($row['GRNNO']);
		$this->DT->setDbValue($row['DT']);
		$this->YM->setDbValue($row['YM']);
		$this->PC->setDbValue($row['PC']);
		$this->Customercode->setDbValue($row['Customercode']);
		$this->Customername->setDbValue($row['Customername']);
		$this->pharmacy_pocol->setDbValue($row['pharmacy_pocol']);
		$this->Address1->setDbValue($row['Address1']);
		$this->Address2->setDbValue($row['Address2']);
		$this->Address3->setDbValue($row['Address3']);
		$this->State->setDbValue($row['State']);
		$this->Pincode->setDbValue($row['Pincode']);
		$this->Phone->setDbValue($row['Phone']);
		$this->Fax->setDbValue($row['Fax']);
		$this->EEmail->setDbValue($row['EEmail']);
		$this->HospID->setDbValue($row['HospID']);
		$this->createdby->setDbValue($row['createdby']);
		$this->createddatetime->setDbValue($row['createddatetime']);
		$this->modifiedby->setDbValue($row['modifiedby']);
		$this->modifieddatetime->setDbValue($row['modifieddatetime']);
		$this->BILLNO->setDbValue($row['BILLNO']);
		$this->BILLDT->setDbValue($row['BILLDT']);
		$this->BRCODE->setDbValue($row['BRCODE']);
		$this->PharmacyID->setDbValue($row['PharmacyID']);
		$this->BillTotalValue->setDbValue($row['BillTotalValue']);
		$this->GRNTotalValue->setDbValue($row['GRNTotalValue']);
		$this->BillDiscount->setDbValue($row['BillDiscount']);
		$this->BillUpload->Upload->DbValue = $row['BillUpload'];
		$this->BillUpload->setDbValue($this->BillUpload->Upload->DbValue);
		$this->TransPort->setDbValue($row['TransPort']);
		$this->AnyOther->setDbValue($row['AnyOther']);
		$this->Remarks->setDbValue($row['Remarks']);
		$this->GrnValue->setDbValue($row['GrnValue']);
		$this->Pid->setDbValue($row['Pid']);
		$this->PaymentNo->setDbValue($row['PaymentNo']);
		$this->PaymentStatus->setDbValue($row['PaymentStatus']);
		$this->PaidAmount->setDbValue($row['PaidAmount']);
	}

	// Return a row with default values
	protected function newRow()
	{
		$row = [];
		$row['id'] = NULL;
		$row['GRNNO'] = NULL;
		$row['DT'] = NULL;
		$row['YM'] = NULL;
		$row['PC'] = NULL;
		$row['Customercode'] = NULL;
		$row['Customername'] = NULL;
		$row['pharmacy_pocol'] = NULL;
		$row['Address1'] = NULL;
		$row['Address2'] = NULL;
		$row['Address3'] = NULL;
		$row['State'] = NULL;
		$row['Pincode'] = NULL;
		$row['Phone'] = NULL;
		$row['Fax'] = NULL;
		$row['EEmail'] = NULL;
		$row['HospID'] = NULL;
		$row['createdby'] = NULL;
		$row['createddatetime'] = NULL;
		$row['modifiedby'] = NULL;
		$row['modifieddatetime'] = NULL;
		$row['BILLNO'] = NULL;
		$row['BILLDT'] = NULL;
		$row['BRCODE'] = NULL;
		$row['PharmacyID'] = NULL;
		$row['BillTotalValue'] = NULL;
		$row['GRNTotalValue'] = NULL;
		$row['BillDiscount'] = NULL;
		$row['BillUpload'] = NULL;
		$row['TransPort'] = NULL;
		$row['AnyOther'] = NULL;
		$row['Remarks'] = NULL;
		$row['GrnValue'] = NULL;
		$row['Pid'] = NULL;
		$row['PaymentNo'] = NULL;
		$row['PaymentStatus'] = NULL;
		$row['PaidAmount'] = NULL;
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

		if ($this->BillTotalValue->FormValue == $this->BillTotalValue->CurrentValue && is_numeric(ConvertToFloatString($this->BillTotalValue->CurrentValue)))
			$this->BillTotalValue->CurrentValue = ConvertToFloatString($this->BillTotalValue->CurrentValue);

		// Convert decimal values if posted back
		if ($this->GRNTotalValue->FormValue == $this->GRNTotalValue->CurrentValue && is_numeric(ConvertToFloatString($this->GRNTotalValue->CurrentValue)))
			$this->GRNTotalValue->CurrentValue = ConvertToFloatString($this->GRNTotalValue->CurrentValue);

		// Convert decimal values if posted back
		if ($this->BillDiscount->FormValue == $this->BillDiscount->CurrentValue && is_numeric(ConvertToFloatString($this->BillDiscount->CurrentValue)))
			$this->BillDiscount->CurrentValue = ConvertToFloatString($this->BillDiscount->CurrentValue);

		// Convert decimal values if posted back
		if ($this->TransPort->FormValue == $this->TransPort->CurrentValue && is_numeric(ConvertToFloatString($this->TransPort->CurrentValue)))
			$this->TransPort->CurrentValue = ConvertToFloatString($this->TransPort->CurrentValue);

		// Convert decimal values if posted back
		if ($this->AnyOther->FormValue == $this->AnyOther->CurrentValue && is_numeric(ConvertToFloatString($this->AnyOther->CurrentValue)))
			$this->AnyOther->CurrentValue = ConvertToFloatString($this->AnyOther->CurrentValue);

		// Convert decimal values if posted back
		if ($this->GrnValue->FormValue == $this->GrnValue->CurrentValue && is_numeric(ConvertToFloatString($this->GrnValue->CurrentValue)))
			$this->GrnValue->CurrentValue = ConvertToFloatString($this->GrnValue->CurrentValue);

		// Convert decimal values if posted back
		if ($this->PaidAmount->FormValue == $this->PaidAmount->CurrentValue && is_numeric(ConvertToFloatString($this->PaidAmount->CurrentValue)))
			$this->PaidAmount->CurrentValue = ConvertToFloatString($this->PaidAmount->CurrentValue);

		// Call Row_Rendering event
		$this->Row_Rendering();

		// Common render codes for all row types
		// id
		// GRNNO
		// DT
		// YM
		// PC
		// Customercode
		// Customername
		// pharmacy_pocol
		// Address1
		// Address2
		// Address3
		// State
		// Pincode
		// Phone
		// Fax
		// EEmail
		// HospID
		// createdby
		// createddatetime
		// modifiedby
		// modifieddatetime
		// BILLNO
		// BILLDT
		// BRCODE
		// PharmacyID
		// BillTotalValue
		// GRNTotalValue
		// BillDiscount
		// BillUpload
		// TransPort
		// AnyOther
		// Remarks
		// GrnValue
		// Pid
		// PaymentNo
		// PaymentStatus
		// PaidAmount

		if ($this->RowType == ROWTYPE_VIEW) { // View row

			// id
			$this->id->ViewValue = $this->id->CurrentValue;
			$this->id->ViewCustomAttributes = "";

			// GRNNO
			$this->GRNNO->ViewValue = $this->GRNNO->CurrentValue;
			$this->GRNNO->ViewCustomAttributes = "";

			// DT
			$this->DT->ViewValue = $this->DT->CurrentValue;
			$this->DT->ViewValue = FormatDateTime($this->DT->ViewValue, 7);
			$this->DT->ViewCustomAttributes = "";

			// YM
			$this->YM->ViewValue = $this->YM->CurrentValue;
			$this->YM->ViewCustomAttributes = "";

			// PC
			$curVal = strval($this->PC->CurrentValue);
			if ($curVal <> "") {
				$this->PC->ViewValue = $this->PC->lookupCacheOption($curVal);
				if ($this->PC->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
					$sqlWrk = $this->PC->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = $rswrk->fields('df');
						$arwrk[2] = $rswrk->fields('df2');
						$this->PC->ViewValue = $this->PC->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->PC->ViewValue = $this->PC->CurrentValue;
					}
				}
			} else {
				$this->PC->ViewValue = NULL;
			}
			$this->PC->ViewCustomAttributes = "";

			// Customercode
			$this->Customercode->ViewValue = $this->Customercode->CurrentValue;
			$this->Customercode->ViewCustomAttributes = "";

			// Customername
			$this->Customername->ViewValue = $this->Customername->CurrentValue;
			$this->Customername->ViewCustomAttributes = "";

			// pharmacy_pocol
			$this->pharmacy_pocol->ViewValue = $this->pharmacy_pocol->CurrentValue;
			$this->pharmacy_pocol->ViewCustomAttributes = "";

			// Address1
			$this->Address1->ViewValue = $this->Address1->CurrentValue;
			$this->Address1->ViewCustomAttributes = "";

			// Address2
			$this->Address2->ViewValue = $this->Address2->CurrentValue;
			$this->Address2->ViewCustomAttributes = "";

			// Address3
			$this->Address3->ViewValue = $this->Address3->CurrentValue;
			$this->Address3->ViewCustomAttributes = "";

			// State
			$this->State->ViewValue = $this->State->CurrentValue;
			$this->State->ViewCustomAttributes = "";

			// Pincode
			$this->Pincode->ViewValue = $this->Pincode->CurrentValue;
			$this->Pincode->ViewCustomAttributes = "";

			// Phone
			$this->Phone->ViewValue = $this->Phone->CurrentValue;
			$this->Phone->ViewCustomAttributes = "";

			// Fax
			$this->Fax->ViewValue = $this->Fax->CurrentValue;
			$this->Fax->ViewCustomAttributes = "";

			// EEmail
			$this->EEmail->ViewValue = $this->EEmail->CurrentValue;
			$this->EEmail->ViewCustomAttributes = "";

			// HospID
			$this->HospID->ViewValue = $this->HospID->CurrentValue;
			$this->HospID->ViewValue = FormatNumber($this->HospID->ViewValue, 0, -2, -2, -2);
			$this->HospID->ViewCustomAttributes = "";

			// createdby
			$this->createdby->ViewValue = $this->createdby->CurrentValue;
			$this->createdby->ViewCustomAttributes = "";

			// createddatetime
			$this->createddatetime->ViewValue = $this->createddatetime->CurrentValue;
			$this->createddatetime->ViewValue = FormatDateTime($this->createddatetime->ViewValue, 7);
			$this->createddatetime->ViewCustomAttributes = "";

			// modifiedby
			$this->modifiedby->ViewValue = $this->modifiedby->CurrentValue;
			$this->modifiedby->ViewCustomAttributes = "";

			// modifieddatetime
			$this->modifieddatetime->ViewValue = $this->modifieddatetime->CurrentValue;
			$this->modifieddatetime->ViewValue = FormatDateTime($this->modifieddatetime->ViewValue, 0);
			$this->modifieddatetime->ViewCustomAttributes = "";

			// BILLNO
			$this->BILLNO->ViewValue = $this->BILLNO->CurrentValue;
			$this->BILLNO->ViewCustomAttributes = "";

			// BILLDT
			$this->BILLDT->ViewValue = $this->BILLDT->CurrentValue;
			$this->BILLDT->ViewValue = FormatDateTime($this->BILLDT->ViewValue, 0);
			$this->BILLDT->ViewCustomAttributes = "";

			// BRCODE
			$curVal = strval($this->BRCODE->CurrentValue);
			if ($curVal <> "") {
				$this->BRCODE->ViewValue = $this->BRCODE->lookupCacheOption($curVal);
				if ($this->BRCODE->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
					$lookupFilter = function() {
						return "`id`='".PharmacyID()."'";
					};
					$lookupFilter = $lookupFilter->bindTo($this);
					$sqlWrk = $this->BRCODE->Lookup->getSql(FALSE, $filterWrk, $lookupFilter, $this);
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

			// PharmacyID
			$this->PharmacyID->ViewValue = $this->PharmacyID->CurrentValue;
			$this->PharmacyID->ViewValue = FormatNumber($this->PharmacyID->ViewValue, 0, -2, -2, -2);
			$this->PharmacyID->ViewCustomAttributes = "";

			// BillTotalValue
			$this->BillTotalValue->ViewValue = $this->BillTotalValue->CurrentValue;
			$this->BillTotalValue->ViewValue = FormatNumber($this->BillTotalValue->ViewValue, 2, -2, -2, -2);
			$this->BillTotalValue->ViewCustomAttributes = "";

			// GRNTotalValue
			$this->GRNTotalValue->ViewValue = $this->GRNTotalValue->CurrentValue;
			$this->GRNTotalValue->ViewValue = FormatNumber($this->GRNTotalValue->ViewValue, 2, -2, -2, -2);
			$this->GRNTotalValue->ViewCustomAttributes = "";

			// BillDiscount
			$this->BillDiscount->ViewValue = $this->BillDiscount->CurrentValue;
			$this->BillDiscount->ViewValue = FormatNumber($this->BillDiscount->ViewValue, 2, -2, -2, -2);
			$this->BillDiscount->ViewCustomAttributes = "";

			// BillUpload
			if (!EmptyValue($this->BillUpload->Upload->DbValue)) {
				$this->BillUpload->ImageAlt = $this->BillUpload->alt();
				$this->BillUpload->ViewValue = $this->BillUpload->Upload->DbValue;
			} else {
				$this->BillUpload->ViewValue = "";
			}
			$this->BillUpload->ViewCustomAttributes = "";

			// TransPort
			$this->TransPort->ViewValue = $this->TransPort->CurrentValue;
			$this->TransPort->ViewValue = FormatNumber($this->TransPort->ViewValue, 2, -2, -2, -2);
			$this->TransPort->ViewCustomAttributes = "";

			// AnyOther
			$this->AnyOther->ViewValue = $this->AnyOther->CurrentValue;
			$this->AnyOther->ViewValue = FormatNumber($this->AnyOther->ViewValue, 2, -2, -2, -2);
			$this->AnyOther->ViewCustomAttributes = "";

			// Remarks
			$this->Remarks->ViewValue = $this->Remarks->CurrentValue;
			$this->Remarks->ViewCustomAttributes = "";

			// GrnValue
			$this->GrnValue->ViewValue = $this->GrnValue->CurrentValue;
			$this->GrnValue->ViewValue = FormatNumber($this->GrnValue->ViewValue, 2, -2, -2, -2);
			$this->GrnValue->ViewCustomAttributes = "";

			// Pid
			$this->Pid->ViewValue = $this->Pid->CurrentValue;
			$this->Pid->ViewValue = FormatNumber($this->Pid->ViewValue, 0, -2, -2, -2);
			$this->Pid->ViewCustomAttributes = "";

			// PaymentNo
			$this->PaymentNo->ViewValue = $this->PaymentNo->CurrentValue;
			$this->PaymentNo->ViewCustomAttributes = "";

			// PaymentStatus
			$this->PaymentStatus->ViewValue = $this->PaymentStatus->CurrentValue;
			$this->PaymentStatus->ViewCustomAttributes = "";

			// PaidAmount
			$this->PaidAmount->ViewValue = $this->PaidAmount->CurrentValue;
			$this->PaidAmount->ViewValue = FormatNumber($this->PaidAmount->ViewValue, 2, -2, -2, -2);
			$this->PaidAmount->ViewCustomAttributes = "";

			// id
			$this->id->LinkCustomAttributes = "";
			$this->id->HrefValue = "";
			$this->id->TooltipValue = "";

			// GRNNO
			$this->GRNNO->LinkCustomAttributes = "";
			$this->GRNNO->HrefValue = "";
			$this->GRNNO->TooltipValue = "";

			// DT
			$this->DT->LinkCustomAttributes = "";
			$this->DT->HrefValue = "";
			$this->DT->TooltipValue = "";

			// YM
			$this->YM->LinkCustomAttributes = "";
			$this->YM->HrefValue = "";
			$this->YM->TooltipValue = "";

			// PC
			$this->PC->LinkCustomAttributes = "";
			$this->PC->HrefValue = "";
			$this->PC->TooltipValue = "";

			// Customercode
			$this->Customercode->LinkCustomAttributes = "";
			$this->Customercode->HrefValue = "";
			$this->Customercode->TooltipValue = "";

			// Customername
			$this->Customername->LinkCustomAttributes = "";
			$this->Customername->HrefValue = "";
			$this->Customername->TooltipValue = "";

			// pharmacy_pocol
			$this->pharmacy_pocol->LinkCustomAttributes = "";
			$this->pharmacy_pocol->HrefValue = "";
			$this->pharmacy_pocol->TooltipValue = "";

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

			// State
			$this->State->LinkCustomAttributes = "";
			$this->State->HrefValue = "";
			$this->State->TooltipValue = "";

			// Pincode
			$this->Pincode->LinkCustomAttributes = "";
			$this->Pincode->HrefValue = "";
			$this->Pincode->TooltipValue = "";

			// Phone
			$this->Phone->LinkCustomAttributes = "";
			$this->Phone->HrefValue = "";
			$this->Phone->TooltipValue = "";

			// Fax
			$this->Fax->LinkCustomAttributes = "";
			$this->Fax->HrefValue = "";
			$this->Fax->TooltipValue = "";

			// EEmail
			$this->EEmail->LinkCustomAttributes = "";
			$this->EEmail->HrefValue = "";
			$this->EEmail->TooltipValue = "";

			// HospID
			$this->HospID->LinkCustomAttributes = "";
			$this->HospID->HrefValue = "";
			$this->HospID->TooltipValue = "";

			// modifiedby
			$this->modifiedby->LinkCustomAttributes = "";
			$this->modifiedby->HrefValue = "";
			$this->modifiedby->TooltipValue = "";

			// modifieddatetime
			$this->modifieddatetime->LinkCustomAttributes = "";
			$this->modifieddatetime->HrefValue = "";
			$this->modifieddatetime->TooltipValue = "";

			// BILLNO
			$this->BILLNO->LinkCustomAttributes = "";
			$this->BILLNO->HrefValue = "";
			$this->BILLNO->TooltipValue = "";

			// BILLDT
			$this->BILLDT->LinkCustomAttributes = "";
			$this->BILLDT->HrefValue = "";
			$this->BILLDT->TooltipValue = "";

			// BRCODE
			$this->BRCODE->LinkCustomAttributes = "";
			$this->BRCODE->HrefValue = "";
			$this->BRCODE->TooltipValue = "";

			// PharmacyID
			$this->PharmacyID->LinkCustomAttributes = "";
			$this->PharmacyID->HrefValue = "";
			$this->PharmacyID->TooltipValue = "";

			// BillTotalValue
			$this->BillTotalValue->LinkCustomAttributes = "";
			$this->BillTotalValue->HrefValue = "";
			$this->BillTotalValue->TooltipValue = "";

			// GRNTotalValue
			$this->GRNTotalValue->LinkCustomAttributes = "";
			$this->GRNTotalValue->HrefValue = "";
			$this->GRNTotalValue->TooltipValue = "";

			// BillDiscount
			$this->BillDiscount->LinkCustomAttributes = "";
			$this->BillDiscount->HrefValue = "";
			$this->BillDiscount->TooltipValue = "";

			// BillUpload
			$this->BillUpload->LinkCustomAttributes = "";
			if (!EmptyValue($this->BillUpload->Upload->DbValue)) {
				$this->BillUpload->HrefValue = GetFileUploadUrl($this->BillUpload, $this->BillUpload->Upload->DbValue); // Add prefix/suffix
				$this->BillUpload->LinkAttrs["target"] = ""; // Add target
				if ($this->isExport()) $this->BillUpload->HrefValue = FullUrl($this->BillUpload->HrefValue, "href");
			} else {
				$this->BillUpload->HrefValue = "";
			}
			$this->BillUpload->ExportHrefValue = $this->BillUpload->UploadPath . $this->BillUpload->Upload->DbValue;
			$this->BillUpload->TooltipValue = "";
			if ($this->BillUpload->UseColorbox) {
				if (EmptyValue($this->BillUpload->TooltipValue))
					$this->BillUpload->LinkAttrs["title"] = $Language->phrase("ViewImageGallery");
				$this->BillUpload->LinkAttrs["data-rel"] = "pharmacy_grn_x_BillUpload";
				AppendClass($this->BillUpload->LinkAttrs["class"], "ew-lightbox");
			}

			// TransPort
			$this->TransPort->LinkCustomAttributes = "";
			$this->TransPort->HrefValue = "";
			$this->TransPort->TooltipValue = "";

			// AnyOther
			$this->AnyOther->LinkCustomAttributes = "";
			$this->AnyOther->HrefValue = "";
			$this->AnyOther->TooltipValue = "";

			// Remarks
			$this->Remarks->LinkCustomAttributes = "";
			$this->Remarks->HrefValue = "";
			$this->Remarks->TooltipValue = "";

			// GrnValue
			$this->GrnValue->LinkCustomAttributes = "";
			$this->GrnValue->HrefValue = "";
			$this->GrnValue->TooltipValue = "";

			// Pid
			$this->Pid->LinkCustomAttributes = "";
			$this->Pid->HrefValue = "";
			$this->Pid->TooltipValue = "";

			// PaymentNo
			$this->PaymentNo->LinkCustomAttributes = "";
			$this->PaymentNo->HrefValue = "";
			$this->PaymentNo->TooltipValue = "";

			// PaymentStatus
			$this->PaymentStatus->LinkCustomAttributes = "";
			$this->PaymentStatus->HrefValue = "";
			$this->PaymentStatus->TooltipValue = "";

			// PaidAmount
			$this->PaidAmount->LinkCustomAttributes = "";
			$this->PaidAmount->HrefValue = "";
			$this->PaidAmount->TooltipValue = "";
		} elseif ($this->RowType == ROWTYPE_EDIT) { // Edit row

			// id
			$this->id->EditAttrs["class"] = "form-control";
			$this->id->EditCustomAttributes = "";
			$this->id->EditValue = $this->id->CurrentValue;
			$this->id->ViewCustomAttributes = "";

			// GRNNO
			$this->GRNNO->EditAttrs["class"] = "form-control";
			$this->GRNNO->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->GRNNO->CurrentValue = HtmlDecode($this->GRNNO->CurrentValue);
			$this->GRNNO->EditValue = HtmlEncode($this->GRNNO->CurrentValue);
			$this->GRNNO->PlaceHolder = RemoveHtml($this->GRNNO->caption());

			// DT
			$this->DT->EditAttrs["class"] = "form-control";
			$this->DT->EditCustomAttributes = "";
			$this->DT->EditValue = HtmlEncode(FormatDateTime($this->DT->CurrentValue, 7));
			$this->DT->PlaceHolder = RemoveHtml($this->DT->caption());

			// YM
			$this->YM->EditAttrs["class"] = "form-control";
			$this->YM->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->YM->CurrentValue = HtmlDecode($this->YM->CurrentValue);
			$this->YM->EditValue = HtmlEncode($this->YM->CurrentValue);
			$this->YM->PlaceHolder = RemoveHtml($this->YM->caption());

			// PC
			$this->PC->EditCustomAttributes = "";
			$curVal = trim(strval($this->PC->CurrentValue));
			if ($curVal <> "")
				$this->PC->ViewValue = $this->PC->lookupCacheOption($curVal);
			else
				$this->PC->ViewValue = $this->PC->Lookup !== NULL && is_array($this->PC->Lookup->Options) ? $curVal : NULL;
			if ($this->PC->ViewValue !== NULL) { // Load from cache
				$this->PC->EditValue = array_values($this->PC->Lookup->Options);
				if ($this->PC->ViewValue == "")
					$this->PC->ViewValue = $Language->phrase("PleaseSelect");
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`id`" . SearchString("=", $this->PC->CurrentValue, DATATYPE_NUMBER, "");
				}
				$sqlWrk = $this->PC->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = array();
					$arwrk[1] = HtmlEncode($rswrk->fields('df'));
					$arwrk[2] = HtmlEncode($rswrk->fields('df2'));
					$this->PC->ViewValue = $this->PC->displayValue($arwrk);
				} else {
					$this->PC->ViewValue = $Language->phrase("PleaseSelect");
				}
				$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
				if ($rswrk) $rswrk->Close();
				$this->PC->EditValue = $arwrk;
			}

			// Customercode
			$this->Customercode->EditAttrs["class"] = "form-control";
			$this->Customercode->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Customercode->CurrentValue = HtmlDecode($this->Customercode->CurrentValue);
			$this->Customercode->EditValue = HtmlEncode($this->Customercode->CurrentValue);
			$this->Customercode->PlaceHolder = RemoveHtml($this->Customercode->caption());

			// Customername
			$this->Customername->EditAttrs["class"] = "form-control";
			$this->Customername->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Customername->CurrentValue = HtmlDecode($this->Customername->CurrentValue);
			$this->Customername->EditValue = HtmlEncode($this->Customername->CurrentValue);
			$this->Customername->PlaceHolder = RemoveHtml($this->Customername->caption());

			// pharmacy_pocol
			$this->pharmacy_pocol->EditAttrs["class"] = "form-control";
			$this->pharmacy_pocol->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->pharmacy_pocol->CurrentValue = HtmlDecode($this->pharmacy_pocol->CurrentValue);
			$this->pharmacy_pocol->EditValue = HtmlEncode($this->pharmacy_pocol->CurrentValue);
			$this->pharmacy_pocol->PlaceHolder = RemoveHtml($this->pharmacy_pocol->caption());

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

			// EEmail
			$this->EEmail->EditAttrs["class"] = "form-control";
			$this->EEmail->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->EEmail->CurrentValue = HtmlDecode($this->EEmail->CurrentValue);
			$this->EEmail->EditValue = HtmlEncode($this->EEmail->CurrentValue);
			$this->EEmail->PlaceHolder = RemoveHtml($this->EEmail->caption());

			// HospID
			// modifiedby
			// modifieddatetime
			// BILLNO

			$this->BILLNO->EditAttrs["class"] = "form-control";
			$this->BILLNO->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->BILLNO->CurrentValue = HtmlDecode($this->BILLNO->CurrentValue);
			$this->BILLNO->EditValue = HtmlEncode($this->BILLNO->CurrentValue);
			$this->BILLNO->PlaceHolder = RemoveHtml($this->BILLNO->caption());

			// BILLDT
			$this->BILLDT->EditAttrs["class"] = "form-control";
			$this->BILLDT->EditCustomAttributes = "";
			$this->BILLDT->EditValue = HtmlEncode(FormatDateTime($this->BILLDT->CurrentValue, 8));
			$this->BILLDT->PlaceHolder = RemoveHtml($this->BILLDT->caption());

			// BRCODE
			$this->BRCODE->EditAttrs["class"] = "form-control";
			$this->BRCODE->EditCustomAttributes = "";
			$curVal = trim(strval($this->BRCODE->CurrentValue));
			if ($curVal <> "")
				$this->BRCODE->ViewValue = $this->BRCODE->lookupCacheOption($curVal);
			else
				$this->BRCODE->ViewValue = $this->BRCODE->Lookup !== NULL && is_array($this->BRCODE->Lookup->Options) ? $curVal : NULL;
			if ($this->BRCODE->ViewValue !== NULL) { // Load from cache
				$this->BRCODE->EditValue = array_values($this->BRCODE->Lookup->Options);
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`id`" . SearchString("=", $this->BRCODE->CurrentValue, DATATYPE_NUMBER, "");
				}
				$lookupFilter = function() {
					return "`id`='".PharmacyID()."'";
				};
				$lookupFilter = $lookupFilter->bindTo($this);
				$sqlWrk = $this->BRCODE->Lookup->getSql(TRUE, $filterWrk, $lookupFilter, $this);
				$rswrk = Conn()->execute($sqlWrk);
				$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
				if ($rswrk) $rswrk->Close();
				$this->BRCODE->EditValue = $arwrk;
			}

			// PharmacyID
			// BillTotalValue

			$this->BillTotalValue->EditAttrs["class"] = "form-control";
			$this->BillTotalValue->EditCustomAttributes = "";
			$this->BillTotalValue->EditValue = HtmlEncode($this->BillTotalValue->CurrentValue);
			$this->BillTotalValue->PlaceHolder = RemoveHtml($this->BillTotalValue->caption());
			if (strval($this->BillTotalValue->EditValue) <> "" && is_numeric($this->BillTotalValue->EditValue))
				$this->BillTotalValue->EditValue = FormatNumber($this->BillTotalValue->EditValue, -2, -2, -2, -2);

			// GRNTotalValue
			$this->GRNTotalValue->EditAttrs["class"] = "form-control";
			$this->GRNTotalValue->EditCustomAttributes = "";
			$this->GRNTotalValue->EditValue = HtmlEncode($this->GRNTotalValue->CurrentValue);
			$this->GRNTotalValue->PlaceHolder = RemoveHtml($this->GRNTotalValue->caption());
			if (strval($this->GRNTotalValue->EditValue) <> "" && is_numeric($this->GRNTotalValue->EditValue))
				$this->GRNTotalValue->EditValue = FormatNumber($this->GRNTotalValue->EditValue, -2, -2, -2, -2);

			// BillDiscount
			$this->BillDiscount->EditAttrs["class"] = "form-control";
			$this->BillDiscount->EditCustomAttributes = "";
			$this->BillDiscount->EditValue = HtmlEncode($this->BillDiscount->CurrentValue);
			$this->BillDiscount->PlaceHolder = RemoveHtml($this->BillDiscount->caption());
			if (strval($this->BillDiscount->EditValue) <> "" && is_numeric($this->BillDiscount->EditValue))
				$this->BillDiscount->EditValue = FormatNumber($this->BillDiscount->EditValue, -2, -2, -2, -2);

			// BillUpload
			$this->BillUpload->EditAttrs["class"] = "form-control";
			$this->BillUpload->EditCustomAttributes = "";
			if (!EmptyValue($this->BillUpload->Upload->DbValue)) {
				$this->BillUpload->ImageAlt = $this->BillUpload->alt();
				$this->BillUpload->EditValue = $this->BillUpload->Upload->DbValue;
			} else {
				$this->BillUpload->EditValue = "";
			}
			if (!EmptyValue($this->BillUpload->CurrentValue))
					$this->BillUpload->Upload->FileName = $this->BillUpload->CurrentValue;
			if ($this->isShow() && !$this->EventCancelled)
				RenderUploadField($this->BillUpload);

			// TransPort
			$this->TransPort->EditAttrs["class"] = "form-control";
			$this->TransPort->EditCustomAttributes = "";
			$this->TransPort->EditValue = HtmlEncode($this->TransPort->CurrentValue);
			$this->TransPort->PlaceHolder = RemoveHtml($this->TransPort->caption());
			if (strval($this->TransPort->EditValue) <> "" && is_numeric($this->TransPort->EditValue))
				$this->TransPort->EditValue = FormatNumber($this->TransPort->EditValue, -2, -2, -2, -2);

			// AnyOther
			$this->AnyOther->EditAttrs["class"] = "form-control";
			$this->AnyOther->EditCustomAttributes = "";
			$this->AnyOther->EditValue = HtmlEncode($this->AnyOther->CurrentValue);
			$this->AnyOther->PlaceHolder = RemoveHtml($this->AnyOther->caption());
			if (strval($this->AnyOther->EditValue) <> "" && is_numeric($this->AnyOther->EditValue))
				$this->AnyOther->EditValue = FormatNumber($this->AnyOther->EditValue, -2, -2, -2, -2);

			// Remarks
			$this->Remarks->EditAttrs["class"] = "form-control";
			$this->Remarks->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Remarks->CurrentValue = HtmlDecode($this->Remarks->CurrentValue);
			$this->Remarks->EditValue = HtmlEncode($this->Remarks->CurrentValue);
			$this->Remarks->PlaceHolder = RemoveHtml($this->Remarks->caption());

			// GrnValue
			$this->GrnValue->EditAttrs["class"] = "form-control";
			$this->GrnValue->EditCustomAttributes = "";
			$this->GrnValue->EditValue = HtmlEncode($this->GrnValue->CurrentValue);
			$this->GrnValue->PlaceHolder = RemoveHtml($this->GrnValue->caption());
			if (strval($this->GrnValue->EditValue) <> "" && is_numeric($this->GrnValue->EditValue))
				$this->GrnValue->EditValue = FormatNumber($this->GrnValue->EditValue, -2, -2, -2, -2);

			// Pid
			$this->Pid->EditAttrs["class"] = "form-control";
			$this->Pid->EditCustomAttributes = "";
			if ($this->Pid->getSessionValue() <> "") {
				$this->Pid->CurrentValue = $this->Pid->getSessionValue();
			$this->Pid->ViewValue = $this->Pid->CurrentValue;
			$this->Pid->ViewValue = FormatNumber($this->Pid->ViewValue, 0, -2, -2, -2);
			$this->Pid->ViewCustomAttributes = "";
			} else {
			$this->Pid->EditValue = HtmlEncode($this->Pid->CurrentValue);
			$this->Pid->PlaceHolder = RemoveHtml($this->Pid->caption());
			}

			// PaymentNo
			$this->PaymentNo->EditAttrs["class"] = "form-control";
			$this->PaymentNo->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->PaymentNo->CurrentValue = HtmlDecode($this->PaymentNo->CurrentValue);
			$this->PaymentNo->EditValue = HtmlEncode($this->PaymentNo->CurrentValue);
			$this->PaymentNo->PlaceHolder = RemoveHtml($this->PaymentNo->caption());

			// PaymentStatus
			$this->PaymentStatus->EditAttrs["class"] = "form-control";
			$this->PaymentStatus->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->PaymentStatus->CurrentValue = HtmlDecode($this->PaymentStatus->CurrentValue);
			$this->PaymentStatus->EditValue = HtmlEncode($this->PaymentStatus->CurrentValue);
			$this->PaymentStatus->PlaceHolder = RemoveHtml($this->PaymentStatus->caption());

			// PaidAmount
			$this->PaidAmount->EditAttrs["class"] = "form-control";
			$this->PaidAmount->EditCustomAttributes = "";
			$this->PaidAmount->EditValue = HtmlEncode($this->PaidAmount->CurrentValue);
			$this->PaidAmount->PlaceHolder = RemoveHtml($this->PaidAmount->caption());
			if (strval($this->PaidAmount->EditValue) <> "" && is_numeric($this->PaidAmount->EditValue))
				$this->PaidAmount->EditValue = FormatNumber($this->PaidAmount->EditValue, -2, -2, -2, -2);

			// Edit refer script
			// id

			$this->id->LinkCustomAttributes = "";
			$this->id->HrefValue = "";

			// GRNNO
			$this->GRNNO->LinkCustomAttributes = "";
			$this->GRNNO->HrefValue = "";

			// DT
			$this->DT->LinkCustomAttributes = "";
			$this->DT->HrefValue = "";

			// YM
			$this->YM->LinkCustomAttributes = "";
			$this->YM->HrefValue = "";

			// PC
			$this->PC->LinkCustomAttributes = "";
			$this->PC->HrefValue = "";

			// Customercode
			$this->Customercode->LinkCustomAttributes = "";
			$this->Customercode->HrefValue = "";

			// Customername
			$this->Customername->LinkCustomAttributes = "";
			$this->Customername->HrefValue = "";

			// pharmacy_pocol
			$this->pharmacy_pocol->LinkCustomAttributes = "";
			$this->pharmacy_pocol->HrefValue = "";

			// Address1
			$this->Address1->LinkCustomAttributes = "";
			$this->Address1->HrefValue = "";

			// Address2
			$this->Address2->LinkCustomAttributes = "";
			$this->Address2->HrefValue = "";

			// Address3
			$this->Address3->LinkCustomAttributes = "";
			$this->Address3->HrefValue = "";

			// State
			$this->State->LinkCustomAttributes = "";
			$this->State->HrefValue = "";

			// Pincode
			$this->Pincode->LinkCustomAttributes = "";
			$this->Pincode->HrefValue = "";

			// Phone
			$this->Phone->LinkCustomAttributes = "";
			$this->Phone->HrefValue = "";

			// Fax
			$this->Fax->LinkCustomAttributes = "";
			$this->Fax->HrefValue = "";

			// EEmail
			$this->EEmail->LinkCustomAttributes = "";
			$this->EEmail->HrefValue = "";

			// HospID
			$this->HospID->LinkCustomAttributes = "";
			$this->HospID->HrefValue = "";

			// modifiedby
			$this->modifiedby->LinkCustomAttributes = "";
			$this->modifiedby->HrefValue = "";

			// modifieddatetime
			$this->modifieddatetime->LinkCustomAttributes = "";
			$this->modifieddatetime->HrefValue = "";

			// BILLNO
			$this->BILLNO->LinkCustomAttributes = "";
			$this->BILLNO->HrefValue = "";

			// BILLDT
			$this->BILLDT->LinkCustomAttributes = "";
			$this->BILLDT->HrefValue = "";

			// BRCODE
			$this->BRCODE->LinkCustomAttributes = "";
			$this->BRCODE->HrefValue = "";

			// PharmacyID
			$this->PharmacyID->LinkCustomAttributes = "";
			$this->PharmacyID->HrefValue = "";

			// BillTotalValue
			$this->BillTotalValue->LinkCustomAttributes = "";
			$this->BillTotalValue->HrefValue = "";

			// GRNTotalValue
			$this->GRNTotalValue->LinkCustomAttributes = "";
			$this->GRNTotalValue->HrefValue = "";

			// BillDiscount
			$this->BillDiscount->LinkCustomAttributes = "";
			$this->BillDiscount->HrefValue = "";

			// BillUpload
			$this->BillUpload->LinkCustomAttributes = "";
			if (!EmptyValue($this->BillUpload->Upload->DbValue)) {
				$this->BillUpload->HrefValue = GetFileUploadUrl($this->BillUpload, $this->BillUpload->Upload->DbValue); // Add prefix/suffix
				$this->BillUpload->LinkAttrs["target"] = ""; // Add target
				if ($this->isExport()) $this->BillUpload->HrefValue = FullUrl($this->BillUpload->HrefValue, "href");
			} else {
				$this->BillUpload->HrefValue = "";
			}
			$this->BillUpload->ExportHrefValue = $this->BillUpload->UploadPath . $this->BillUpload->Upload->DbValue;

			// TransPort
			$this->TransPort->LinkCustomAttributes = "";
			$this->TransPort->HrefValue = "";

			// AnyOther
			$this->AnyOther->LinkCustomAttributes = "";
			$this->AnyOther->HrefValue = "";

			// Remarks
			$this->Remarks->LinkCustomAttributes = "";
			$this->Remarks->HrefValue = "";

			// GrnValue
			$this->GrnValue->LinkCustomAttributes = "";
			$this->GrnValue->HrefValue = "";

			// Pid
			$this->Pid->LinkCustomAttributes = "";
			$this->Pid->HrefValue = "";

			// PaymentNo
			$this->PaymentNo->LinkCustomAttributes = "";
			$this->PaymentNo->HrefValue = "";

			// PaymentStatus
			$this->PaymentStatus->LinkCustomAttributes = "";
			$this->PaymentStatus->HrefValue = "";

			// PaidAmount
			$this->PaidAmount->LinkCustomAttributes = "";
			$this->PaidAmount->HrefValue = "";
		}
		if ($this->RowType == ROWTYPE_ADD || $this->RowType == ROWTYPE_EDIT || $this->RowType == ROWTYPE_SEARCH) // Add/Edit/Search row
			$this->setupFieldTitles();

		// Call Row Rendered event
		if ($this->RowType <> ROWTYPE_AGGREGATEINIT)
			$this->Row_Rendered();

		// Save data for Custom Template
		if ($this->RowType == ROWTYPE_VIEW || $this->RowType == ROWTYPE_EDIT || $this->RowType == ROWTYPE_ADD)
			$this->Rows[] = $this->customTemplateFieldValues();
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
		if ($this->GRNNO->Required) {
			if (!$this->GRNNO->IsDetailKey && $this->GRNNO->FormValue != NULL && $this->GRNNO->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->GRNNO->caption(), $this->GRNNO->RequiredErrorMessage));
			}
		}
		if ($this->DT->Required) {
			if (!$this->DT->IsDetailKey && $this->DT->FormValue != NULL && $this->DT->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->DT->caption(), $this->DT->RequiredErrorMessage));
			}
		}
		if (!CheckEuroDate($this->DT->FormValue)) {
			AddMessage($FormError, $this->DT->errorMessage());
		}
		if ($this->YM->Required) {
			if (!$this->YM->IsDetailKey && $this->YM->FormValue != NULL && $this->YM->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->YM->caption(), $this->YM->RequiredErrorMessage));
			}
		}
		if ($this->PC->Required) {
			if (!$this->PC->IsDetailKey && $this->PC->FormValue != NULL && $this->PC->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PC->caption(), $this->PC->RequiredErrorMessage));
			}
		}
		if ($this->Customercode->Required) {
			if (!$this->Customercode->IsDetailKey && $this->Customercode->FormValue != NULL && $this->Customercode->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Customercode->caption(), $this->Customercode->RequiredErrorMessage));
			}
		}
		if ($this->Customername->Required) {
			if (!$this->Customername->IsDetailKey && $this->Customername->FormValue != NULL && $this->Customername->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Customername->caption(), $this->Customername->RequiredErrorMessage));
			}
		}
		if ($this->pharmacy_pocol->Required) {
			if (!$this->pharmacy_pocol->IsDetailKey && $this->pharmacy_pocol->FormValue != NULL && $this->pharmacy_pocol->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->pharmacy_pocol->caption(), $this->pharmacy_pocol->RequiredErrorMessage));
			}
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
		if ($this->EEmail->Required) {
			if (!$this->EEmail->IsDetailKey && $this->EEmail->FormValue != NULL && $this->EEmail->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->EEmail->caption(), $this->EEmail->RequiredErrorMessage));
			}
		}
		if ($this->HospID->Required) {
			if (!$this->HospID->IsDetailKey && $this->HospID->FormValue != NULL && $this->HospID->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->HospID->caption(), $this->HospID->RequiredErrorMessage));
			}
		}
		if ($this->createdby->Required) {
			if (!$this->createdby->IsDetailKey && $this->createdby->FormValue != NULL && $this->createdby->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->createdby->caption(), $this->createdby->RequiredErrorMessage));
			}
		}
		if ($this->createddatetime->Required) {
			if (!$this->createddatetime->IsDetailKey && $this->createddatetime->FormValue != NULL && $this->createddatetime->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->createddatetime->caption(), $this->createddatetime->RequiredErrorMessage));
			}
		}
		if ($this->modifiedby->Required) {
			if (!$this->modifiedby->IsDetailKey && $this->modifiedby->FormValue != NULL && $this->modifiedby->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->modifiedby->caption(), $this->modifiedby->RequiredErrorMessage));
			}
		}
		if ($this->modifieddatetime->Required) {
			if (!$this->modifieddatetime->IsDetailKey && $this->modifieddatetime->FormValue != NULL && $this->modifieddatetime->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->modifieddatetime->caption(), $this->modifieddatetime->RequiredErrorMessage));
			}
		}
		if ($this->BILLNO->Required) {
			if (!$this->BILLNO->IsDetailKey && $this->BILLNO->FormValue != NULL && $this->BILLNO->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->BILLNO->caption(), $this->BILLNO->RequiredErrorMessage));
			}
		}
		if ($this->BILLDT->Required) {
			if (!$this->BILLDT->IsDetailKey && $this->BILLDT->FormValue != NULL && $this->BILLDT->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->BILLDT->caption(), $this->BILLDT->RequiredErrorMessage));
			}
		}
		if (!CheckDate($this->BILLDT->FormValue)) {
			AddMessage($FormError, $this->BILLDT->errorMessage());
		}
		if ($this->BRCODE->Required) {
			if (!$this->BRCODE->IsDetailKey && $this->BRCODE->FormValue != NULL && $this->BRCODE->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->BRCODE->caption(), $this->BRCODE->RequiredErrorMessage));
			}
		}
		if ($this->PharmacyID->Required) {
			if (!$this->PharmacyID->IsDetailKey && $this->PharmacyID->FormValue != NULL && $this->PharmacyID->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PharmacyID->caption(), $this->PharmacyID->RequiredErrorMessage));
			}
		}
		if ($this->BillTotalValue->Required) {
			if (!$this->BillTotalValue->IsDetailKey && $this->BillTotalValue->FormValue != NULL && $this->BillTotalValue->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->BillTotalValue->caption(), $this->BillTotalValue->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->BillTotalValue->FormValue)) {
			AddMessage($FormError, $this->BillTotalValue->errorMessage());
		}
		if ($this->GRNTotalValue->Required) {
			if (!$this->GRNTotalValue->IsDetailKey && $this->GRNTotalValue->FormValue != NULL && $this->GRNTotalValue->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->GRNTotalValue->caption(), $this->GRNTotalValue->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->GRNTotalValue->FormValue)) {
			AddMessage($FormError, $this->GRNTotalValue->errorMessage());
		}
		if ($this->BillDiscount->Required) {
			if (!$this->BillDiscount->IsDetailKey && $this->BillDiscount->FormValue != NULL && $this->BillDiscount->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->BillDiscount->caption(), $this->BillDiscount->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->BillDiscount->FormValue)) {
			AddMessage($FormError, $this->BillDiscount->errorMessage());
		}
		if ($this->BillUpload->Required) {
			if ($this->BillUpload->Upload->FileName == "" && !$this->BillUpload->Upload->KeepFile) {
				AddMessage($FormError, str_replace("%s", $this->BillUpload->caption(), $this->BillUpload->RequiredErrorMessage));
			}
		}
		if ($this->TransPort->Required) {
			if (!$this->TransPort->IsDetailKey && $this->TransPort->FormValue != NULL && $this->TransPort->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->TransPort->caption(), $this->TransPort->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->TransPort->FormValue)) {
			AddMessage($FormError, $this->TransPort->errorMessage());
		}
		if ($this->AnyOther->Required) {
			if (!$this->AnyOther->IsDetailKey && $this->AnyOther->FormValue != NULL && $this->AnyOther->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->AnyOther->caption(), $this->AnyOther->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->AnyOther->FormValue)) {
			AddMessage($FormError, $this->AnyOther->errorMessage());
		}
		if ($this->Remarks->Required) {
			if (!$this->Remarks->IsDetailKey && $this->Remarks->FormValue != NULL && $this->Remarks->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Remarks->caption(), $this->Remarks->RequiredErrorMessage));
			}
		}
		if ($this->GrnValue->Required) {
			if (!$this->GrnValue->IsDetailKey && $this->GrnValue->FormValue != NULL && $this->GrnValue->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->GrnValue->caption(), $this->GrnValue->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->GrnValue->FormValue)) {
			AddMessage($FormError, $this->GrnValue->errorMessage());
		}
		if ($this->Pid->Required) {
			if (!$this->Pid->IsDetailKey && $this->Pid->FormValue != NULL && $this->Pid->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Pid->caption(), $this->Pid->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->Pid->FormValue)) {
			AddMessage($FormError, $this->Pid->errorMessage());
		}
		if ($this->PaymentNo->Required) {
			if (!$this->PaymentNo->IsDetailKey && $this->PaymentNo->FormValue != NULL && $this->PaymentNo->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PaymentNo->caption(), $this->PaymentNo->RequiredErrorMessage));
			}
		}
		if ($this->PaymentStatus->Required) {
			if (!$this->PaymentStatus->IsDetailKey && $this->PaymentStatus->FormValue != NULL && $this->PaymentStatus->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PaymentStatus->caption(), $this->PaymentStatus->RequiredErrorMessage));
			}
		}
		if ($this->PaidAmount->Required) {
			if (!$this->PaidAmount->IsDetailKey && $this->PaidAmount->FormValue != NULL && $this->PaidAmount->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PaidAmount->caption(), $this->PaidAmount->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->PaidAmount->FormValue)) {
			AddMessage($FormError, $this->PaidAmount->errorMessage());
		}

		// Validate detail grid
		$detailTblVar = explode(",", $this->getCurrentDetailTable());
		if (in_array("view_pharmacygrn", $detailTblVar) && $GLOBALS["view_pharmacygrn"]->DetailEdit) {
			if (!isset($GLOBALS["view_pharmacygrn_grid"]))
				$GLOBALS["view_pharmacygrn_grid"] = new view_pharmacygrn_grid(); // Get detail page object
			$GLOBALS["view_pharmacygrn_grid"]->validateGridForm();
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
		if ($this->BILLNO->CurrentValue <> "") { // Check field with unique index
			$filterChk = "(`BILLNO` = '" . AdjustSql($this->BILLNO->CurrentValue, $this->Dbid) . "')";
			$filterChk .= " AND NOT (" . $filter . ")";
			$this->CurrentFilter = $filterChk;
			$sqlChk = $this->getCurrentSql();
			$conn->raiseErrorFn = $GLOBALS["ERROR_FUNC"];
			$rsChk = $conn->Execute($sqlChk);
			$conn->raiseErrorFn = '';
			if ($rsChk === FALSE) {
				return FALSE;
			} elseif (!$rsChk->EOF) {
				$idxErrMsg = str_replace("%f", $this->BILLNO->caption(), $Language->phrase("DupIndex"));
				$idxErrMsg = str_replace("%v", $this->BILLNO->CurrentValue, $idxErrMsg);
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

			// Begin transaction
			if ($this->getCurrentDetailTable() <> "")
				$conn->beginTrans();

			// Save old values
			$rsold = &$rs->fields;
			$this->loadDbValues($rsold);
			$rsnew = [];

			// GRNNO
			$this->GRNNO->setDbValueDef($rsnew, $this->GRNNO->CurrentValue, NULL, $this->GRNNO->ReadOnly);

			// DT
			$this->DT->setDbValueDef($rsnew, UnFormatDateTime($this->DT->CurrentValue, 7), NULL, $this->DT->ReadOnly);

			// YM
			$this->YM->setDbValueDef($rsnew, $this->YM->CurrentValue, NULL, $this->YM->ReadOnly);

			// PC
			$this->PC->setDbValueDef($rsnew, $this->PC->CurrentValue, NULL, $this->PC->ReadOnly);

			// Customercode
			$this->Customercode->setDbValueDef($rsnew, $this->Customercode->CurrentValue, NULL, $this->Customercode->ReadOnly);

			// Customername
			$this->Customername->setDbValueDef($rsnew, $this->Customername->CurrentValue, NULL, $this->Customername->ReadOnly);

			// pharmacy_pocol
			$this->pharmacy_pocol->setDbValueDef($rsnew, $this->pharmacy_pocol->CurrentValue, NULL, $this->pharmacy_pocol->ReadOnly);

			// Address1
			$this->Address1->setDbValueDef($rsnew, $this->Address1->CurrentValue, NULL, $this->Address1->ReadOnly);

			// Address2
			$this->Address2->setDbValueDef($rsnew, $this->Address2->CurrentValue, NULL, $this->Address2->ReadOnly);

			// Address3
			$this->Address3->setDbValueDef($rsnew, $this->Address3->CurrentValue, NULL, $this->Address3->ReadOnly);

			// State
			$this->State->setDbValueDef($rsnew, $this->State->CurrentValue, NULL, $this->State->ReadOnly);

			// Pincode
			$this->Pincode->setDbValueDef($rsnew, $this->Pincode->CurrentValue, NULL, $this->Pincode->ReadOnly);

			// Phone
			$this->Phone->setDbValueDef($rsnew, $this->Phone->CurrentValue, NULL, $this->Phone->ReadOnly);

			// Fax
			$this->Fax->setDbValueDef($rsnew, $this->Fax->CurrentValue, NULL, $this->Fax->ReadOnly);

			// EEmail
			$this->EEmail->setDbValueDef($rsnew, $this->EEmail->CurrentValue, NULL, $this->EEmail->ReadOnly);

			// HospID
			$this->HospID->setDbValueDef($rsnew, HospitalID(), NULL);
			$rsnew['HospID'] = &$this->HospID->DbValue;

			// modifiedby
			$this->modifiedby->setDbValueDef($rsnew, CurrentUserName(), NULL);
			$rsnew['modifiedby'] = &$this->modifiedby->DbValue;

			// modifieddatetime
			$this->modifieddatetime->setDbValueDef($rsnew, CurrentDateTime(), NULL);
			$rsnew['modifieddatetime'] = &$this->modifieddatetime->DbValue;

			// BILLNO
			$this->BILLNO->setDbValueDef($rsnew, $this->BILLNO->CurrentValue, NULL, $this->BILLNO->ReadOnly);

			// BILLDT
			$this->BILLDT->setDbValueDef($rsnew, UnFormatDateTime($this->BILLDT->CurrentValue, 0), NULL, $this->BILLDT->ReadOnly);

			// BRCODE
			$this->BRCODE->setDbValueDef($rsnew, $this->BRCODE->CurrentValue, NULL, $this->BRCODE->ReadOnly);

			// PharmacyID
			$this->PharmacyID->setDbValueDef($rsnew, PharmacyID(), NULL);
			$rsnew['PharmacyID'] = &$this->PharmacyID->DbValue;

			// BillTotalValue
			$this->BillTotalValue->setDbValueDef($rsnew, $this->BillTotalValue->CurrentValue, NULL, $this->BillTotalValue->ReadOnly);

			// GRNTotalValue
			$this->GRNTotalValue->setDbValueDef($rsnew, $this->GRNTotalValue->CurrentValue, NULL, $this->GRNTotalValue->ReadOnly);

			// BillDiscount
			$this->BillDiscount->setDbValueDef($rsnew, $this->BillDiscount->CurrentValue, NULL, $this->BillDiscount->ReadOnly);

			// BillUpload
			if ($this->BillUpload->Visible && !$this->BillUpload->ReadOnly && !$this->BillUpload->Upload->KeepFile) {
				$this->BillUpload->Upload->DbValue = $rsold['BillUpload']; // Get original value
				if ($this->BillUpload->Upload->FileName == "") {
					$rsnew['BillUpload'] = NULL;
				} else {
					$rsnew['BillUpload'] = $this->BillUpload->Upload->FileName;
				}
			}

			// TransPort
			$this->TransPort->setDbValueDef($rsnew, $this->TransPort->CurrentValue, NULL, $this->TransPort->ReadOnly);

			// AnyOther
			$this->AnyOther->setDbValueDef($rsnew, $this->AnyOther->CurrentValue, NULL, $this->AnyOther->ReadOnly);

			// Remarks
			$this->Remarks->setDbValueDef($rsnew, $this->Remarks->CurrentValue, NULL, $this->Remarks->ReadOnly);

			// GrnValue
			$this->GrnValue->setDbValueDef($rsnew, $this->GrnValue->CurrentValue, NULL, $this->GrnValue->ReadOnly);

			// Pid
			$this->Pid->setDbValueDef($rsnew, $this->Pid->CurrentValue, NULL, $this->Pid->ReadOnly);

			// PaymentNo
			$this->PaymentNo->setDbValueDef($rsnew, $this->PaymentNo->CurrentValue, NULL, $this->PaymentNo->ReadOnly);

			// PaymentStatus
			$this->PaymentStatus->setDbValueDef($rsnew, $this->PaymentStatus->CurrentValue, NULL, $this->PaymentStatus->ReadOnly);

			// PaidAmount
			$this->PaidAmount->setDbValueDef($rsnew, $this->PaidAmount->CurrentValue, NULL, $this->PaidAmount->ReadOnly);
			if ($this->BillUpload->Visible && !$this->BillUpload->Upload->KeepFile) {
				$oldFiles = EmptyValue($this->BillUpload->Upload->DbValue) ? array() : array($this->BillUpload->Upload->DbValue);
				if (!EmptyValue($this->BillUpload->Upload->FileName)) {
					$newFiles = array($this->BillUpload->Upload->FileName);
					$NewFileCount = count($newFiles);
					for ($i = 0; $i < $NewFileCount; $i++) {
						if ($newFiles[$i] <> "") {
							$file = $newFiles[$i];
							if (file_exists(UploadTempPath($this->BillUpload, $this->BillUpload->Upload->Index) . $file)) {
								if (DELETE_UPLOADED_FILES) {
									$oldFileFound = FALSE;
									$oldFileCount = count($oldFiles);
									for ($j = 0; $j < $oldFileCount; $j++) {
										$oldFile = $oldFiles[$j];
										if ($oldFile == $file) { // Old file found, no need to delete anymore
											unset($oldFiles[$j]);
											$oldFileFound = TRUE;
											break;
										}
									}
									if ($oldFileFound) // No need to check if file exists further
										continue;
								}
								$file1 = UniqueFilename($this->BillUpload->physicalUploadPath(), $file); // Get new file name
								if ($file1 <> $file) { // Rename temp file
									while (file_exists(UploadTempPath($this->BillUpload, $this->BillUpload->Upload->Index) . $file1) || file_exists($this->BillUpload->physicalUploadPath() . $file1)) // Make sure no file name clash
										$file1 = UniqueFilename($this->BillUpload->physicalUploadPath(), $file1, TRUE); // Use indexed name
									rename(UploadTempPath($this->BillUpload, $this->BillUpload->Upload->Index) . $file, UploadTempPath($this->BillUpload, $this->BillUpload->Upload->Index) . $file1);
									$newFiles[$i] = $file1;
								}
							}
						}
					}
					$this->BillUpload->Upload->DbValue = empty($oldFiles) ? "" : implode(MULTIPLE_UPLOAD_SEPARATOR, $oldFiles);
					$this->BillUpload->Upload->FileName = implode(MULTIPLE_UPLOAD_SEPARATOR, $newFiles);
					$this->BillUpload->setDbValueDef($rsnew, $this->BillUpload->Upload->FileName, NULL, $this->BillUpload->ReadOnly);
				}
			}

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
					if ($this->BillUpload->Visible && !$this->BillUpload->Upload->KeepFile) {
						$oldFiles = EmptyValue($this->BillUpload->Upload->DbValue) ? array() : array($this->BillUpload->Upload->DbValue);
						if (!EmptyValue($this->BillUpload->Upload->FileName)) {
							$newFiles = array($this->BillUpload->Upload->FileName);
							$newFiles2 = array($rsnew['BillUpload']);
							$newFileCount = count($newFiles);
							for ($i = 0; $i < $newFileCount; $i++) {
								if ($newFiles[$i] <> "") {
									$file = UploadTempPath($this->BillUpload, $this->BillUpload->Upload->Index) . $newFiles[$i];
									if (file_exists($file)) {
										if (@$newFiles2[$i] <> "") // Use correct file name
											$newFiles[$i] = $newFiles2[$i];
										if (!$this->BillUpload->Upload->saveToFile($newFiles[$i], TRUE, $i)) { // Just replace
											$this->setFailureMessage($Language->phrase("UploadErrMsg7"));
											return FALSE;
										}
									}
								}
							}
						} else {
							$newFiles = array();
						}
						if (DELETE_UPLOADED_FILES) {
							foreach ($oldFiles as $oldFile) {
								if ($oldFile <> "" && !in_array($oldFile, $newFiles))
									@unlink($this->BillUpload->oldPhysicalUploadPath() . $oldFile);
							}
						}
					}
				}

				// Update detail records
				$detailTblVar = explode(",", $this->getCurrentDetailTable());
				if ($editRow) {
					if (in_array("view_pharmacygrn", $detailTblVar) && $GLOBALS["view_pharmacygrn"]->DetailEdit) {
						if (!isset($GLOBALS["view_pharmacygrn_grid"]))
							$GLOBALS["view_pharmacygrn_grid"] = new view_pharmacygrn_grid(); // Get detail page object
						$Security->loadCurrentUserLevel($this->ProjectID . "view_pharmacygrn"); // Load user level of detail table
						$editRow = $GLOBALS["view_pharmacygrn_grid"]->gridUpdate();
						$Security->loadCurrentUserLevel($this->ProjectID . $this->TableName); // Restore user level of master table
					}
				}

				// Commit/Rollback transaction
				if ($this->getCurrentDetailTable() <> "") {
					if ($editRow) {
						$conn->commitTrans(); // Commit transaction
					} else {
						$conn->rollbackTrans(); // Rollback transaction
					}
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

		// BillUpload
		if ($this->BillUpload->Upload->FileToken <> "")
			CleanUploadTempPath($this->BillUpload->Upload->FileToken, $this->BillUpload->Upload->Index);
		else
			CleanUploadTempPath($this->BillUpload, $this->BillUpload->Upload->Index);

		// Write JSON for API request
		if (IsApi() && $editRow) {
			$row = $this->getRecordsFromRecordset([$rsnew], TRUE);
			WriteJson(["success" => TRUE, $this->TableVar => $row]);
		}
		return $editRow;
	}

	// Set up master/detail based on QueryString
	protected function setupMasterParms()
	{
		$validMaster = FALSE;

		// Get the keys for master table
		if (Get(TABLE_SHOW_MASTER) !== NULL) {
			$masterTblVar = Get(TABLE_SHOW_MASTER);
			if ($masterTblVar == "") {
				$validMaster = TRUE;
				$this->DbMasterFilter = "";
				$this->DbDetailFilter = "";
			}
			if ($masterTblVar == "pharmacy_payment") {
				$validMaster = TRUE;
				if (Get("fk_id") !== NULL) {
					$this->Pid->setQueryStringValue(Get("fk_id"));
					$this->Pid->setSessionValue($this->Pid->QueryStringValue);
					if (!is_numeric($this->Pid->QueryStringValue))
						$validMaster = FALSE;
				} else {
					$validMaster = FALSE;
				}
			}
		} elseif (Post(TABLE_SHOW_MASTER) !== NULL) {
			$masterTblVar = Post(TABLE_SHOW_MASTER);
			if ($masterTblVar == "") {
				$validMaster = TRUE;
				$this->DbMasterFilter = "";
				$this->DbDetailFilter = "";
			}
			if ($masterTblVar == "pharmacy_payment") {
				$validMaster = TRUE;
				if (Post("fk_id") !== NULL) {
					$this->Pid->setFormValue(Post("fk_id"));
					$this->Pid->setSessionValue($this->Pid->FormValue);
					if (!is_numeric($this->Pid->FormValue))
						$validMaster = FALSE;
				} else {
					$validMaster = FALSE;
				}
			}
		}
		if ($validMaster) {

			// Save current master table
			$this->setCurrentMasterTable($masterTblVar);
			$this->setSessionWhere($this->getDetailFilter());

			// Reset start record counter (new master key)
			if (!$this->isAddOrEdit()) {
				$this->StartRec = 1;
				$this->setStartRecordNumber($this->StartRec);
			}

			// Clear previous master key from Session
			if ($masterTblVar <> "pharmacy_payment") {
				if ($this->Pid->CurrentValue == "")
					$this->Pid->setSessionValue("");
			}
		}
		$this->DbMasterFilter = $this->getMasterFilter(); // Get master filter
		$this->DbDetailFilter = $this->getDetailFilter(); // Get detail filter
	}

	// Set up detail parms based on QueryString
	protected function setupDetailParms()
	{

		// Get the keys for master table
		if (Get(TABLE_SHOW_DETAIL) !== NULL) {
			$detailTblVar = Get(TABLE_SHOW_DETAIL);
			$this->setCurrentDetailTable($detailTblVar);
		} else {
			$detailTblVar = $this->getCurrentDetailTable();
		}
		if ($detailTblVar <> "") {
			$detailTblVar = explode(",", $detailTblVar);
			if (in_array("view_pharmacygrn", $detailTblVar)) {
				if (!isset($GLOBALS["view_pharmacygrn_grid"]))
					$GLOBALS["view_pharmacygrn_grid"] = new view_pharmacygrn_grid();
				if ($GLOBALS["view_pharmacygrn_grid"]->DetailEdit) {
					$GLOBALS["view_pharmacygrn_grid"]->CurrentMode = "edit";
					$GLOBALS["view_pharmacygrn_grid"]->CurrentAction = "gridedit";

					// Save current master table to detail table
					$GLOBALS["view_pharmacygrn_grid"]->setCurrentMasterTable($this->TableVar);
					$GLOBALS["view_pharmacygrn_grid"]->setStartRecordNumber(1);
					$GLOBALS["view_pharmacygrn_grid"]->grnid->IsDetailKey = TRUE;
					$GLOBALS["view_pharmacygrn_grid"]->grnid->CurrentValue = $this->id->CurrentValue;
					$GLOBALS["view_pharmacygrn_grid"]->grnid->setSessionValue($GLOBALS["view_pharmacygrn_grid"]->grnid->CurrentValue);
				}
			}
		}
	}

	// Set up Breadcrumb
	protected function setupBreadcrumb()
	{
		global $Breadcrumb, $Language;
		$Breadcrumb = new Breadcrumb();
		$url = substr(CurrentUrl(), strrpos(CurrentUrl(), "/")+1);
		$Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("pharmacy_grnlist.php"), "", $this->TableVar, TRUE);
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
				case "x_BRCODE":
					$lookupFilter = function() {
						return "`id`='".PharmacyID()."'";
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
						case "x_PC":
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
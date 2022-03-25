<?php
namespace PHPMaker2019\HIMS;

/**
 * Page class
 */
class view_pharmacygrn_add extends view_pharmacygrn
{

	// Page ID
	public $PageID = "add";

	// Project ID
	public $ProjectID = "{EA4F6D13-AF8F-428D-9EA7-BA88D1107EC3}";

	// Table name
	public $TableName = 'view_pharmacygrn';

	// Page object name
	public $PageObjName = "view_pharmacygrn_add";

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

		// Table object (view_pharmacygrn)
		if (!isset($GLOBALS["view_pharmacygrn"]) || get_class($GLOBALS["view_pharmacygrn"]) == PROJECT_NAMESPACE . "view_pharmacygrn") {
			$GLOBALS["view_pharmacygrn"] = &$this;
			$GLOBALS["Table"] = &$GLOBALS["view_pharmacygrn"];
		}
		$this->CancelUrl = $this->pageUrl() . "action=cancel";

		// Table object (user_login)
		if (!isset($GLOBALS['user_login']))
			$GLOBALS['user_login'] = new user_login();

		// Table object (pharmacy_grn)
		if (!isset($GLOBALS['pharmacy_grn']))
			$GLOBALS['pharmacy_grn'] = new pharmacy_grn();

		// Page ID
		if (!defined(PROJECT_NAMESPACE . "PAGE_ID"))
			define(PROJECT_NAMESPACE . "PAGE_ID", 'add');

		// Table name (for backward compatibility)
		if (!defined(PROJECT_NAMESPACE . "TABLE_NAME"))
			define(PROJECT_NAMESPACE . "TABLE_NAME", 'view_pharmacygrn');

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
		global $EXPORT, $view_pharmacygrn;
		if ($this->CustomExport && $this->CustomExport == $this->Export && array_key_exists($this->CustomExport, $EXPORT)) {
				$content = ob_get_contents();
			if ($ExportFileName == "")
				$ExportFileName = $this->TableVar;
			$class = PROJECT_NAMESPACE . $EXPORT[$this->CustomExport];
			if (class_exists($class)) {
				$doc = new $class($view_pharmacygrn);
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
					if ($pageName == "view_pharmacygrnview.php")
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
					$this->terminate(GetUrl("view_pharmacygrnlist.php"));
				else
					$this->terminate(GetUrl("login.php"));
				return;
			}
		}

		// Create form object
		$CurrentForm = new HttpForm();
		$this->CurrentAction = Param("action"); // Set up current action
		$this->ORDNO->setVisibility();
		$this->PRC->setVisibility();
		$this->QTY->setVisibility();
		$this->DT->setVisibility();
		$this->PC->setVisibility();
		$this->YM->setVisibility();
		$this->Stock->setVisibility();
		$this->LastMonthSale->setVisibility();
		$this->Printcheck->setVisibility();
		$this->id->Visible = FALSE;
		$this->poid->setVisibility();
		$this->PrName->setVisibility();
		$this->grnid->setVisibility();
		$this->GrnQuantity->setVisibility();
		$this->Quantity->setVisibility();
		$this->FreeQty->setVisibility();
		$this->FreeQtyyy->setVisibility();
		$this->BatchNo->setVisibility();
		$this->ExpDate->setVisibility();
		$this->HSN->setVisibility();
		$this->MFRCODE->setVisibility();
		$this->PUnit->setVisibility();
		$this->SUnit->setVisibility();
		$this->Pack->setVisibility();
		$this->GrnMRP->setVisibility();
		$this->MRP->setVisibility();
		$this->PurValue->setVisibility();
		$this->GRNPer->setVisibility();
		$this->Disc->setVisibility();
		$this->PSGST->setVisibility();
		$this->PCGST->setVisibility();
		$this->PTax->setVisibility();
		$this->ItemValue->setVisibility();
		$this->SalTax->setVisibility();
		$this->PurRate->setVisibility();
		$this->SalRate->setVisibility();
		$this->Discount->setVisibility();
		$this->SSGST->setVisibility();
		$this->SCGST->setVisibility();
		$this->BRCODE->setVisibility();
		$this->trid->setVisibility();
		$this->HospID->setVisibility();
		$this->CreatedBy->setVisibility();
		$this->CreatedDateTime->setVisibility();
		$this->ModifiedBy->setVisibility();
		$this->ModifiedDateTime->setVisibility();
		$this->grncreatedby->setVisibility();
		$this->grncreatedDateTime->setVisibility();
		$this->grnModifiedby->setVisibility();
		$this->grnModifiedDateTime->setVisibility();
		$this->Received->setVisibility();
		$this->BillDate->setVisibility();
		$this->grndate->setVisibility();
		$this->grndatetime->setVisibility();
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

		// Set up master/detail parameters
		// NOTE: must be after loadOldRecord to prevent master key values overwritten

		$this->setupMasterParms();

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
					$this->terminate("view_pharmacygrnlist.php"); // No matching record, return to list
				}
				break;
			case "insert": // Add new record
				$this->SendEmail = TRUE; // Send email on add success
				if ($this->addRow($this->OldRecordset)) { // Add successful
					if ($this->getSuccessMessage() == "")
						$this->setSuccessMessage($Language->phrase("AddSuccess")); // Set up success message
					$returnUrl = $this->getReturnUrl();
					if (GetPageName($returnUrl) == "view_pharmacygrnlist.php")
						$returnUrl = $this->addMasterUrl($returnUrl); // List page, return to List page with correct master key if necessary
					elseif (GetPageName($returnUrl) == "view_pharmacygrnview.php")
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
		$this->ORDNO->CurrentValue = NULL;
		$this->ORDNO->OldValue = $this->ORDNO->CurrentValue;
		$this->PRC->CurrentValue = NULL;
		$this->PRC->OldValue = $this->PRC->CurrentValue;
		$this->QTY->CurrentValue = NULL;
		$this->QTY->OldValue = $this->QTY->CurrentValue;
		$this->DT->CurrentValue = NULL;
		$this->DT->OldValue = $this->DT->CurrentValue;
		$this->PC->CurrentValue = NULL;
		$this->PC->OldValue = $this->PC->CurrentValue;
		$this->YM->CurrentValue = NULL;
		$this->YM->OldValue = $this->YM->CurrentValue;
		$this->Stock->CurrentValue = NULL;
		$this->Stock->OldValue = $this->Stock->CurrentValue;
		$this->LastMonthSale->CurrentValue = NULL;
		$this->LastMonthSale->OldValue = $this->LastMonthSale->CurrentValue;
		$this->Printcheck->CurrentValue = NULL;
		$this->Printcheck->OldValue = $this->Printcheck->CurrentValue;
		$this->id->CurrentValue = NULL;
		$this->id->OldValue = $this->id->CurrentValue;
		$this->poid->CurrentValue = NULL;
		$this->poid->OldValue = $this->poid->CurrentValue;
		$this->PrName->CurrentValue = NULL;
		$this->PrName->OldValue = $this->PrName->CurrentValue;
		$this->grnid->CurrentValue = NULL;
		$this->grnid->OldValue = $this->grnid->CurrentValue;
		$this->GrnQuantity->CurrentValue = 1;
		$this->Quantity->CurrentValue = 1;
		$this->FreeQty->CurrentValue = 0;
		$this->FreeQtyyy->CurrentValue = 0;
		$this->BatchNo->CurrentValue = NULL;
		$this->BatchNo->OldValue = $this->BatchNo->CurrentValue;
		$this->ExpDate->CurrentValue = NULL;
		$this->ExpDate->OldValue = $this->ExpDate->CurrentValue;
		$this->HSN->CurrentValue = NULL;
		$this->HSN->OldValue = $this->HSN->CurrentValue;
		$this->MFRCODE->CurrentValue = NULL;
		$this->MFRCODE->OldValue = $this->MFRCODE->CurrentValue;
		$this->PUnit->CurrentValue = 1;
		$this->SUnit->CurrentValue = 1;
		$this->Pack->CurrentValue = NULL;
		$this->Pack->OldValue = $this->Pack->CurrentValue;
		$this->GrnMRP->CurrentValue = NULL;
		$this->GrnMRP->OldValue = $this->GrnMRP->CurrentValue;
		$this->MRP->CurrentValue = 0;
		$this->PurValue->CurrentValue = 0;
		$this->GRNPer->CurrentValue = NULL;
		$this->GRNPer->OldValue = $this->GRNPer->CurrentValue;
		$this->Disc->CurrentValue = 0;
		$this->PSGST->CurrentValue = 0;
		$this->PCGST->CurrentValue = 0;
		$this->PTax->CurrentValue = NULL;
		$this->PTax->OldValue = $this->PTax->CurrentValue;
		$this->ItemValue->CurrentValue = NULL;
		$this->ItemValue->OldValue = $this->ItemValue->CurrentValue;
		$this->SalTax->CurrentValue = NULL;
		$this->SalTax->OldValue = $this->SalTax->CurrentValue;
		$this->PurRate->CurrentValue = NULL;
		$this->PurRate->OldValue = $this->PurRate->CurrentValue;
		$this->SalRate->CurrentValue = 0;
		$this->Discount->CurrentValue = NULL;
		$this->Discount->OldValue = $this->Discount->CurrentValue;
		$this->SSGST->CurrentValue = 0;
		$this->SCGST->CurrentValue = 0;
		$this->BRCODE->CurrentValue = NULL;
		$this->BRCODE->OldValue = $this->BRCODE->CurrentValue;
		$this->trid->CurrentValue = NULL;
		$this->trid->OldValue = $this->trid->CurrentValue;
		$this->HospID->CurrentValue = NULL;
		$this->HospID->OldValue = $this->HospID->CurrentValue;
		$this->CreatedBy->CurrentValue = NULL;
		$this->CreatedBy->OldValue = $this->CreatedBy->CurrentValue;
		$this->CreatedDateTime->CurrentValue = NULL;
		$this->CreatedDateTime->OldValue = $this->CreatedDateTime->CurrentValue;
		$this->ModifiedBy->CurrentValue = NULL;
		$this->ModifiedBy->OldValue = $this->ModifiedBy->CurrentValue;
		$this->ModifiedDateTime->CurrentValue = NULL;
		$this->ModifiedDateTime->OldValue = $this->ModifiedDateTime->CurrentValue;
		$this->grncreatedby->CurrentValue = NULL;
		$this->grncreatedby->OldValue = $this->grncreatedby->CurrentValue;
		$this->grncreatedDateTime->CurrentValue = NULL;
		$this->grncreatedDateTime->OldValue = $this->grncreatedDateTime->CurrentValue;
		$this->grnModifiedby->CurrentValue = NULL;
		$this->grnModifiedby->OldValue = $this->grnModifiedby->CurrentValue;
		$this->grnModifiedDateTime->CurrentValue = NULL;
		$this->grnModifiedDateTime->OldValue = $this->grnModifiedDateTime->CurrentValue;
		$this->Received->CurrentValue = NULL;
		$this->Received->OldValue = $this->Received->CurrentValue;
		$this->BillDate->CurrentValue = NULL;
		$this->BillDate->OldValue = $this->BillDate->CurrentValue;
		$this->grndate->CurrentValue = NULL;
		$this->grndate->OldValue = $this->grndate->CurrentValue;
		$this->grndatetime->CurrentValue = NULL;
		$this->grndatetime->OldValue = $this->grndatetime->CurrentValue;
	}

	// Load form values
	protected function loadFormValues()
	{

		// Load from form
		global $CurrentForm;

		// Check field name 'ORDNO' first before field var 'x_ORDNO'
		$val = $CurrentForm->hasValue("ORDNO") ? $CurrentForm->getValue("ORDNO") : $CurrentForm->getValue("x_ORDNO");
		if (!$this->ORDNO->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->ORDNO->Visible = FALSE; // Disable update for API request
			else
				$this->ORDNO->setFormValue($val);
		}

		// Check field name 'PRC' first before field var 'x_PRC'
		$val = $CurrentForm->hasValue("PRC") ? $CurrentForm->getValue("PRC") : $CurrentForm->getValue("x_PRC");
		if (!$this->PRC->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->PRC->Visible = FALSE; // Disable update for API request
			else
				$this->PRC->setFormValue($val);
		}

		// Check field name 'QTY' first before field var 'x_QTY'
		$val = $CurrentForm->hasValue("QTY") ? $CurrentForm->getValue("QTY") : $CurrentForm->getValue("x_QTY");
		if (!$this->QTY->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->QTY->Visible = FALSE; // Disable update for API request
			else
				$this->QTY->setFormValue($val);
		}

		// Check field name 'DT' first before field var 'x_DT'
		$val = $CurrentForm->hasValue("DT") ? $CurrentForm->getValue("DT") : $CurrentForm->getValue("x_DT");
		if (!$this->DT->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->DT->Visible = FALSE; // Disable update for API request
			else
				$this->DT->setFormValue($val);
			$this->DT->CurrentValue = UnFormatDateTime($this->DT->CurrentValue, 0);
		}

		// Check field name 'PC' first before field var 'x_PC'
		$val = $CurrentForm->hasValue("PC") ? $CurrentForm->getValue("PC") : $CurrentForm->getValue("x_PC");
		if (!$this->PC->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->PC->Visible = FALSE; // Disable update for API request
			else
				$this->PC->setFormValue($val);
		}

		// Check field name 'YM' first before field var 'x_YM'
		$val = $CurrentForm->hasValue("YM") ? $CurrentForm->getValue("YM") : $CurrentForm->getValue("x_YM");
		if (!$this->YM->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->YM->Visible = FALSE; // Disable update for API request
			else
				$this->YM->setFormValue($val);
		}

		// Check field name 'Stock' first before field var 'x_Stock'
		$val = $CurrentForm->hasValue("Stock") ? $CurrentForm->getValue("Stock") : $CurrentForm->getValue("x_Stock");
		if (!$this->Stock->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Stock->Visible = FALSE; // Disable update for API request
			else
				$this->Stock->setFormValue($val);
		}

		// Check field name 'LastMonthSale' first before field var 'x_LastMonthSale'
		$val = $CurrentForm->hasValue("LastMonthSale") ? $CurrentForm->getValue("LastMonthSale") : $CurrentForm->getValue("x_LastMonthSale");
		if (!$this->LastMonthSale->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->LastMonthSale->Visible = FALSE; // Disable update for API request
			else
				$this->LastMonthSale->setFormValue($val);
		}

		// Check field name 'Printcheck' first before field var 'x_Printcheck'
		$val = $CurrentForm->hasValue("Printcheck") ? $CurrentForm->getValue("Printcheck") : $CurrentForm->getValue("x_Printcheck");
		if (!$this->Printcheck->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Printcheck->Visible = FALSE; // Disable update for API request
			else
				$this->Printcheck->setFormValue($val);
		}

		// Check field name 'poid' first before field var 'x_poid'
		$val = $CurrentForm->hasValue("poid") ? $CurrentForm->getValue("poid") : $CurrentForm->getValue("x_poid");
		if (!$this->poid->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->poid->Visible = FALSE; // Disable update for API request
			else
				$this->poid->setFormValue($val);
		}

		// Check field name 'PrName' first before field var 'x_PrName'
		$val = $CurrentForm->hasValue("PrName") ? $CurrentForm->getValue("PrName") : $CurrentForm->getValue("x_PrName");
		if (!$this->PrName->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->PrName->Visible = FALSE; // Disable update for API request
			else
				$this->PrName->setFormValue($val);
		}

		// Check field name 'grnid' first before field var 'x_grnid'
		$val = $CurrentForm->hasValue("grnid") ? $CurrentForm->getValue("grnid") : $CurrentForm->getValue("x_grnid");
		if (!$this->grnid->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->grnid->Visible = FALSE; // Disable update for API request
			else
				$this->grnid->setFormValue($val);
		}

		// Check field name 'GrnQuantity' first before field var 'x_GrnQuantity'
		$val = $CurrentForm->hasValue("GrnQuantity") ? $CurrentForm->getValue("GrnQuantity") : $CurrentForm->getValue("x_GrnQuantity");
		if (!$this->GrnQuantity->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->GrnQuantity->Visible = FALSE; // Disable update for API request
			else
				$this->GrnQuantity->setFormValue($val);
		}

		// Check field name 'Quantity' first before field var 'x_Quantity'
		$val = $CurrentForm->hasValue("Quantity") ? $CurrentForm->getValue("Quantity") : $CurrentForm->getValue("x_Quantity");
		if (!$this->Quantity->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Quantity->Visible = FALSE; // Disable update for API request
			else
				$this->Quantity->setFormValue($val);
		}

		// Check field name 'FreeQty' first before field var 'x_FreeQty'
		$val = $CurrentForm->hasValue("FreeQty") ? $CurrentForm->getValue("FreeQty") : $CurrentForm->getValue("x_FreeQty");
		if (!$this->FreeQty->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->FreeQty->Visible = FALSE; // Disable update for API request
			else
				$this->FreeQty->setFormValue($val);
		}

		// Check field name 'FreeQtyyy' first before field var 'x_FreeQtyyy'
		$val = $CurrentForm->hasValue("FreeQtyyy") ? $CurrentForm->getValue("FreeQtyyy") : $CurrentForm->getValue("x_FreeQtyyy");
		if (!$this->FreeQtyyy->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->FreeQtyyy->Visible = FALSE; // Disable update for API request
			else
				$this->FreeQtyyy->setFormValue($val);
		}

		// Check field name 'BatchNo' first before field var 'x_BatchNo'
		$val = $CurrentForm->hasValue("BatchNo") ? $CurrentForm->getValue("BatchNo") : $CurrentForm->getValue("x_BatchNo");
		if (!$this->BatchNo->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->BatchNo->Visible = FALSE; // Disable update for API request
			else
				$this->BatchNo->setFormValue($val);
		}

		// Check field name 'ExpDate' first before field var 'x_ExpDate'
		$val = $CurrentForm->hasValue("ExpDate") ? $CurrentForm->getValue("ExpDate") : $CurrentForm->getValue("x_ExpDate");
		if (!$this->ExpDate->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->ExpDate->Visible = FALSE; // Disable update for API request
			else
				$this->ExpDate->setFormValue($val);
			$this->ExpDate->CurrentValue = UnFormatDateTime($this->ExpDate->CurrentValue, 7);
		}

		// Check field name 'HSN' first before field var 'x_HSN'
		$val = $CurrentForm->hasValue("HSN") ? $CurrentForm->getValue("HSN") : $CurrentForm->getValue("x_HSN");
		if (!$this->HSN->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->HSN->Visible = FALSE; // Disable update for API request
			else
				$this->HSN->setFormValue($val);
		}

		// Check field name 'MFRCODE' first before field var 'x_MFRCODE'
		$val = $CurrentForm->hasValue("MFRCODE") ? $CurrentForm->getValue("MFRCODE") : $CurrentForm->getValue("x_MFRCODE");
		if (!$this->MFRCODE->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->MFRCODE->Visible = FALSE; // Disable update for API request
			else
				$this->MFRCODE->setFormValue($val);
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

		// Check field name 'Pack' first before field var 'x_Pack'
		$val = $CurrentForm->hasValue("Pack") ? $CurrentForm->getValue("Pack") : $CurrentForm->getValue("x_Pack");
		if (!$this->Pack->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Pack->Visible = FALSE; // Disable update for API request
			else
				$this->Pack->setFormValue($val);
		}

		// Check field name 'GrnMRP' first before field var 'x_GrnMRP'
		$val = $CurrentForm->hasValue("GrnMRP") ? $CurrentForm->getValue("GrnMRP") : $CurrentForm->getValue("x_GrnMRP");
		if (!$this->GrnMRP->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->GrnMRP->Visible = FALSE; // Disable update for API request
			else
				$this->GrnMRP->setFormValue($val);
		}

		// Check field name 'MRP' first before field var 'x_MRP'
		$val = $CurrentForm->hasValue("MRP") ? $CurrentForm->getValue("MRP") : $CurrentForm->getValue("x_MRP");
		if (!$this->MRP->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->MRP->Visible = FALSE; // Disable update for API request
			else
				$this->MRP->setFormValue($val);
		}

		// Check field name 'PurValue' first before field var 'x_PurValue'
		$val = $CurrentForm->hasValue("PurValue") ? $CurrentForm->getValue("PurValue") : $CurrentForm->getValue("x_PurValue");
		if (!$this->PurValue->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->PurValue->Visible = FALSE; // Disable update for API request
			else
				$this->PurValue->setFormValue($val);
		}

		// Check field name 'GRNPer' first before field var 'x_GRNPer'
		$val = $CurrentForm->hasValue("GRNPer") ? $CurrentForm->getValue("GRNPer") : $CurrentForm->getValue("x_GRNPer");
		if (!$this->GRNPer->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->GRNPer->Visible = FALSE; // Disable update for API request
			else
				$this->GRNPer->setFormValue($val);
		}

		// Check field name 'Disc' first before field var 'x_Disc'
		$val = $CurrentForm->hasValue("Disc") ? $CurrentForm->getValue("Disc") : $CurrentForm->getValue("x_Disc");
		if (!$this->Disc->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Disc->Visible = FALSE; // Disable update for API request
			else
				$this->Disc->setFormValue($val);
		}

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

		// Check field name 'PTax' first before field var 'x_PTax'
		$val = $CurrentForm->hasValue("PTax") ? $CurrentForm->getValue("PTax") : $CurrentForm->getValue("x_PTax");
		if (!$this->PTax->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->PTax->Visible = FALSE; // Disable update for API request
			else
				$this->PTax->setFormValue($val);
		}

		// Check field name 'ItemValue' first before field var 'x_ItemValue'
		$val = $CurrentForm->hasValue("ItemValue") ? $CurrentForm->getValue("ItemValue") : $CurrentForm->getValue("x_ItemValue");
		if (!$this->ItemValue->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->ItemValue->Visible = FALSE; // Disable update for API request
			else
				$this->ItemValue->setFormValue($val);
		}

		// Check field name 'SalTax' first before field var 'x_SalTax'
		$val = $CurrentForm->hasValue("SalTax") ? $CurrentForm->getValue("SalTax") : $CurrentForm->getValue("x_SalTax");
		if (!$this->SalTax->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->SalTax->Visible = FALSE; // Disable update for API request
			else
				$this->SalTax->setFormValue($val);
		}

		// Check field name 'PurRate' first before field var 'x_PurRate'
		$val = $CurrentForm->hasValue("PurRate") ? $CurrentForm->getValue("PurRate") : $CurrentForm->getValue("x_PurRate");
		if (!$this->PurRate->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->PurRate->Visible = FALSE; // Disable update for API request
			else
				$this->PurRate->setFormValue($val);
		}

		// Check field name 'SalRate' first before field var 'x_SalRate'
		$val = $CurrentForm->hasValue("SalRate") ? $CurrentForm->getValue("SalRate") : $CurrentForm->getValue("x_SalRate");
		if (!$this->SalRate->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->SalRate->Visible = FALSE; // Disable update for API request
			else
				$this->SalRate->setFormValue($val);
		}

		// Check field name 'Discount' first before field var 'x_Discount'
		$val = $CurrentForm->hasValue("Discount") ? $CurrentForm->getValue("Discount") : $CurrentForm->getValue("x_Discount");
		if (!$this->Discount->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Discount->Visible = FALSE; // Disable update for API request
			else
				$this->Discount->setFormValue($val);
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

		// Check field name 'BRCODE' first before field var 'x_BRCODE'
		$val = $CurrentForm->hasValue("BRCODE") ? $CurrentForm->getValue("BRCODE") : $CurrentForm->getValue("x_BRCODE");
		if (!$this->BRCODE->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->BRCODE->Visible = FALSE; // Disable update for API request
			else
				$this->BRCODE->setFormValue($val);
		}

		// Check field name 'trid' first before field var 'x_trid'
		$val = $CurrentForm->hasValue("trid") ? $CurrentForm->getValue("trid") : $CurrentForm->getValue("x_trid");
		if (!$this->trid->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->trid->Visible = FALSE; // Disable update for API request
			else
				$this->trid->setFormValue($val);
		}

		// Check field name 'HospID' first before field var 'x_HospID'
		$val = $CurrentForm->hasValue("HospID") ? $CurrentForm->getValue("HospID") : $CurrentForm->getValue("x_HospID");
		if (!$this->HospID->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->HospID->Visible = FALSE; // Disable update for API request
			else
				$this->HospID->setFormValue($val);
		}

		// Check field name 'CreatedBy' first before field var 'x_CreatedBy'
		$val = $CurrentForm->hasValue("CreatedBy") ? $CurrentForm->getValue("CreatedBy") : $CurrentForm->getValue("x_CreatedBy");
		if (!$this->CreatedBy->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->CreatedBy->Visible = FALSE; // Disable update for API request
			else
				$this->CreatedBy->setFormValue($val);
		}

		// Check field name 'CreatedDateTime' first before field var 'x_CreatedDateTime'
		$val = $CurrentForm->hasValue("CreatedDateTime") ? $CurrentForm->getValue("CreatedDateTime") : $CurrentForm->getValue("x_CreatedDateTime");
		if (!$this->CreatedDateTime->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->CreatedDateTime->Visible = FALSE; // Disable update for API request
			else
				$this->CreatedDateTime->setFormValue($val);
			$this->CreatedDateTime->CurrentValue = UnFormatDateTime($this->CreatedDateTime->CurrentValue, 0);
		}

		// Check field name 'ModifiedBy' first before field var 'x_ModifiedBy'
		$val = $CurrentForm->hasValue("ModifiedBy") ? $CurrentForm->getValue("ModifiedBy") : $CurrentForm->getValue("x_ModifiedBy");
		if (!$this->ModifiedBy->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->ModifiedBy->Visible = FALSE; // Disable update for API request
			else
				$this->ModifiedBy->setFormValue($val);
		}

		// Check field name 'ModifiedDateTime' first before field var 'x_ModifiedDateTime'
		$val = $CurrentForm->hasValue("ModifiedDateTime") ? $CurrentForm->getValue("ModifiedDateTime") : $CurrentForm->getValue("x_ModifiedDateTime");
		if (!$this->ModifiedDateTime->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->ModifiedDateTime->Visible = FALSE; // Disable update for API request
			else
				$this->ModifiedDateTime->setFormValue($val);
			$this->ModifiedDateTime->CurrentValue = UnFormatDateTime($this->ModifiedDateTime->CurrentValue, 0);
		}

		// Check field name 'grncreatedby' first before field var 'x_grncreatedby'
		$val = $CurrentForm->hasValue("grncreatedby") ? $CurrentForm->getValue("grncreatedby") : $CurrentForm->getValue("x_grncreatedby");
		if (!$this->grncreatedby->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->grncreatedby->Visible = FALSE; // Disable update for API request
			else
				$this->grncreatedby->setFormValue($val);
		}

		// Check field name 'grncreatedDateTime' first before field var 'x_grncreatedDateTime'
		$val = $CurrentForm->hasValue("grncreatedDateTime") ? $CurrentForm->getValue("grncreatedDateTime") : $CurrentForm->getValue("x_grncreatedDateTime");
		if (!$this->grncreatedDateTime->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->grncreatedDateTime->Visible = FALSE; // Disable update for API request
			else
				$this->grncreatedDateTime->setFormValue($val);
			$this->grncreatedDateTime->CurrentValue = UnFormatDateTime($this->grncreatedDateTime->CurrentValue, 0);
		}

		// Check field name 'grnModifiedby' first before field var 'x_grnModifiedby'
		$val = $CurrentForm->hasValue("grnModifiedby") ? $CurrentForm->getValue("grnModifiedby") : $CurrentForm->getValue("x_grnModifiedby");
		if (!$this->grnModifiedby->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->grnModifiedby->Visible = FALSE; // Disable update for API request
			else
				$this->grnModifiedby->setFormValue($val);
		}

		// Check field name 'grnModifiedDateTime' first before field var 'x_grnModifiedDateTime'
		$val = $CurrentForm->hasValue("grnModifiedDateTime") ? $CurrentForm->getValue("grnModifiedDateTime") : $CurrentForm->getValue("x_grnModifiedDateTime");
		if (!$this->grnModifiedDateTime->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->grnModifiedDateTime->Visible = FALSE; // Disable update for API request
			else
				$this->grnModifiedDateTime->setFormValue($val);
			$this->grnModifiedDateTime->CurrentValue = UnFormatDateTime($this->grnModifiedDateTime->CurrentValue, 0);
		}

		// Check field name 'Received' first before field var 'x_Received'
		$val = $CurrentForm->hasValue("Received") ? $CurrentForm->getValue("Received") : $CurrentForm->getValue("x_Received");
		if (!$this->Received->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Received->Visible = FALSE; // Disable update for API request
			else
				$this->Received->setFormValue($val);
		}

		// Check field name 'BillDate' first before field var 'x_BillDate'
		$val = $CurrentForm->hasValue("BillDate") ? $CurrentForm->getValue("BillDate") : $CurrentForm->getValue("x_BillDate");
		if (!$this->BillDate->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->BillDate->Visible = FALSE; // Disable update for API request
			else
				$this->BillDate->setFormValue($val);
			$this->BillDate->CurrentValue = UnFormatDateTime($this->BillDate->CurrentValue, 0);
		}

		// Check field name 'grndate' first before field var 'x_grndate'
		$val = $CurrentForm->hasValue("grndate") ? $CurrentForm->getValue("grndate") : $CurrentForm->getValue("x_grndate");
		if (!$this->grndate->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->grndate->Visible = FALSE; // Disable update for API request
			else
				$this->grndate->setFormValue($val);
			$this->grndate->CurrentValue = UnFormatDateTime($this->grndate->CurrentValue, 0);
		}

		// Check field name 'grndatetime' first before field var 'x_grndatetime'
		$val = $CurrentForm->hasValue("grndatetime") ? $CurrentForm->getValue("grndatetime") : $CurrentForm->getValue("x_grndatetime");
		if (!$this->grndatetime->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->grndatetime->Visible = FALSE; // Disable update for API request
			else
				$this->grndatetime->setFormValue($val);
			$this->grndatetime->CurrentValue = UnFormatDateTime($this->grndatetime->CurrentValue, 0);
		}

		// Check field name 'id' first before field var 'x_id'
		$val = $CurrentForm->hasValue("id") ? $CurrentForm->getValue("id") : $CurrentForm->getValue("x_id");
	}

	// Restore form values
	public function restoreFormValues()
	{
		global $CurrentForm;
		$this->ORDNO->CurrentValue = $this->ORDNO->FormValue;
		$this->PRC->CurrentValue = $this->PRC->FormValue;
		$this->QTY->CurrentValue = $this->QTY->FormValue;
		$this->DT->CurrentValue = $this->DT->FormValue;
		$this->DT->CurrentValue = UnFormatDateTime($this->DT->CurrentValue, 0);
		$this->PC->CurrentValue = $this->PC->FormValue;
		$this->YM->CurrentValue = $this->YM->FormValue;
		$this->Stock->CurrentValue = $this->Stock->FormValue;
		$this->LastMonthSale->CurrentValue = $this->LastMonthSale->FormValue;
		$this->Printcheck->CurrentValue = $this->Printcheck->FormValue;
		$this->poid->CurrentValue = $this->poid->FormValue;
		$this->PrName->CurrentValue = $this->PrName->FormValue;
		$this->grnid->CurrentValue = $this->grnid->FormValue;
		$this->GrnQuantity->CurrentValue = $this->GrnQuantity->FormValue;
		$this->Quantity->CurrentValue = $this->Quantity->FormValue;
		$this->FreeQty->CurrentValue = $this->FreeQty->FormValue;
		$this->FreeQtyyy->CurrentValue = $this->FreeQtyyy->FormValue;
		$this->BatchNo->CurrentValue = $this->BatchNo->FormValue;
		$this->ExpDate->CurrentValue = $this->ExpDate->FormValue;
		$this->ExpDate->CurrentValue = UnFormatDateTime($this->ExpDate->CurrentValue, 7);
		$this->HSN->CurrentValue = $this->HSN->FormValue;
		$this->MFRCODE->CurrentValue = $this->MFRCODE->FormValue;
		$this->PUnit->CurrentValue = $this->PUnit->FormValue;
		$this->SUnit->CurrentValue = $this->SUnit->FormValue;
		$this->Pack->CurrentValue = $this->Pack->FormValue;
		$this->GrnMRP->CurrentValue = $this->GrnMRP->FormValue;
		$this->MRP->CurrentValue = $this->MRP->FormValue;
		$this->PurValue->CurrentValue = $this->PurValue->FormValue;
		$this->GRNPer->CurrentValue = $this->GRNPer->FormValue;
		$this->Disc->CurrentValue = $this->Disc->FormValue;
		$this->PSGST->CurrentValue = $this->PSGST->FormValue;
		$this->PCGST->CurrentValue = $this->PCGST->FormValue;
		$this->PTax->CurrentValue = $this->PTax->FormValue;
		$this->ItemValue->CurrentValue = $this->ItemValue->FormValue;
		$this->SalTax->CurrentValue = $this->SalTax->FormValue;
		$this->PurRate->CurrentValue = $this->PurRate->FormValue;
		$this->SalRate->CurrentValue = $this->SalRate->FormValue;
		$this->Discount->CurrentValue = $this->Discount->FormValue;
		$this->SSGST->CurrentValue = $this->SSGST->FormValue;
		$this->SCGST->CurrentValue = $this->SCGST->FormValue;
		$this->BRCODE->CurrentValue = $this->BRCODE->FormValue;
		$this->trid->CurrentValue = $this->trid->FormValue;
		$this->HospID->CurrentValue = $this->HospID->FormValue;
		$this->CreatedBy->CurrentValue = $this->CreatedBy->FormValue;
		$this->CreatedDateTime->CurrentValue = $this->CreatedDateTime->FormValue;
		$this->CreatedDateTime->CurrentValue = UnFormatDateTime($this->CreatedDateTime->CurrentValue, 0);
		$this->ModifiedBy->CurrentValue = $this->ModifiedBy->FormValue;
		$this->ModifiedDateTime->CurrentValue = $this->ModifiedDateTime->FormValue;
		$this->ModifiedDateTime->CurrentValue = UnFormatDateTime($this->ModifiedDateTime->CurrentValue, 0);
		$this->grncreatedby->CurrentValue = $this->grncreatedby->FormValue;
		$this->grncreatedDateTime->CurrentValue = $this->grncreatedDateTime->FormValue;
		$this->grncreatedDateTime->CurrentValue = UnFormatDateTime($this->grncreatedDateTime->CurrentValue, 0);
		$this->grnModifiedby->CurrentValue = $this->grnModifiedby->FormValue;
		$this->grnModifiedDateTime->CurrentValue = $this->grnModifiedDateTime->FormValue;
		$this->grnModifiedDateTime->CurrentValue = UnFormatDateTime($this->grnModifiedDateTime->CurrentValue, 0);
		$this->Received->CurrentValue = $this->Received->FormValue;
		$this->BillDate->CurrentValue = $this->BillDate->FormValue;
		$this->BillDate->CurrentValue = UnFormatDateTime($this->BillDate->CurrentValue, 0);
		$this->grndate->CurrentValue = $this->grndate->FormValue;
		$this->grndate->CurrentValue = UnFormatDateTime($this->grndate->CurrentValue, 0);
		$this->grndatetime->CurrentValue = $this->grndatetime->FormValue;
		$this->grndatetime->CurrentValue = UnFormatDateTime($this->grndatetime->CurrentValue, 0);
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
		$this->ORDNO->setDbValue($row['ORDNO']);
		$this->PRC->setDbValue($row['PRC']);
		$this->QTY->setDbValue($row['QTY']);
		$this->DT->setDbValue($row['DT']);
		$this->PC->setDbValue($row['PC']);
		$this->YM->setDbValue($row['YM']);
		$this->Stock->setDbValue($row['Stock']);
		$this->LastMonthSale->setDbValue($row['LastMonthSale']);
		$this->Printcheck->setDbValue($row['Printcheck']);
		$this->id->setDbValue($row['id']);
		$this->poid->setDbValue($row['poid']);
		$this->PrName->setDbValue($row['PrName']);
		if (array_key_exists('EV__PrName', $rs->fields)) {
			$this->PrName->VirtualValue = $rs->fields('EV__PrName'); // Set up virtual field value
		} else {
			$this->PrName->VirtualValue = ""; // Clear value
		}
		$this->grnid->setDbValue($row['grnid']);
		$this->GrnQuantity->setDbValue($row['GrnQuantity']);
		$this->Quantity->setDbValue($row['Quantity']);
		$this->FreeQty->setDbValue($row['FreeQty']);
		$this->FreeQtyyy->setDbValue($row['FreeQtyyy']);
		$this->BatchNo->setDbValue($row['BatchNo']);
		$this->ExpDate->setDbValue($row['ExpDate']);
		$this->HSN->setDbValue($row['HSN']);
		$this->MFRCODE->setDbValue($row['MFRCODE']);
		$this->PUnit->setDbValue($row['PUnit']);
		$this->SUnit->setDbValue($row['SUnit']);
		$this->Pack->setDbValue($row['Pack']);
		$this->GrnMRP->setDbValue($row['GrnMRP']);
		$this->MRP->setDbValue($row['MRP']);
		$this->PurValue->setDbValue($row['PurValue']);
		$this->GRNPer->setDbValue($row['GRNPer']);
		$this->Disc->setDbValue($row['Disc']);
		$this->PSGST->setDbValue($row['PSGST']);
		$this->PCGST->setDbValue($row['PCGST']);
		$this->PTax->setDbValue($row['PTax']);
		$this->ItemValue->setDbValue($row['ItemValue']);
		$this->SalTax->setDbValue($row['SalTax']);
		$this->PurRate->setDbValue($row['PurRate']);
		$this->SalRate->setDbValue($row['SalRate']);
		$this->Discount->setDbValue($row['Discount']);
		$this->SSGST->setDbValue($row['SSGST']);
		$this->SCGST->setDbValue($row['SCGST']);
		$this->BRCODE->setDbValue($row['BRCODE']);
		$this->trid->setDbValue($row['trid']);
		$this->HospID->setDbValue($row['HospID']);
		$this->CreatedBy->setDbValue($row['CreatedBy']);
		$this->CreatedDateTime->setDbValue($row['CreatedDateTime']);
		$this->ModifiedBy->setDbValue($row['ModifiedBy']);
		$this->ModifiedDateTime->setDbValue($row['ModifiedDateTime']);
		$this->grncreatedby->setDbValue($row['grncreatedby']);
		$this->grncreatedDateTime->setDbValue($row['grncreatedDateTime']);
		$this->grnModifiedby->setDbValue($row['grnModifiedby']);
		$this->grnModifiedDateTime->setDbValue($row['grnModifiedDateTime']);
		$this->Received->setDbValue($row['Received']);
		$this->BillDate->setDbValue($row['BillDate']);
		$this->grndate->setDbValue($row['grndate']);
		$this->grndatetime->setDbValue($row['grndatetime']);
	}

	// Return a row with default values
	protected function newRow()
	{
		$this->loadDefaultValues();
		$row = [];
		$row['ORDNO'] = $this->ORDNO->CurrentValue;
		$row['PRC'] = $this->PRC->CurrentValue;
		$row['QTY'] = $this->QTY->CurrentValue;
		$row['DT'] = $this->DT->CurrentValue;
		$row['PC'] = $this->PC->CurrentValue;
		$row['YM'] = $this->YM->CurrentValue;
		$row['Stock'] = $this->Stock->CurrentValue;
		$row['LastMonthSale'] = $this->LastMonthSale->CurrentValue;
		$row['Printcheck'] = $this->Printcheck->CurrentValue;
		$row['id'] = $this->id->CurrentValue;
		$row['poid'] = $this->poid->CurrentValue;
		$row['PrName'] = $this->PrName->CurrentValue;
		$row['grnid'] = $this->grnid->CurrentValue;
		$row['GrnQuantity'] = $this->GrnQuantity->CurrentValue;
		$row['Quantity'] = $this->Quantity->CurrentValue;
		$row['FreeQty'] = $this->FreeQty->CurrentValue;
		$row['FreeQtyyy'] = $this->FreeQtyyy->CurrentValue;
		$row['BatchNo'] = $this->BatchNo->CurrentValue;
		$row['ExpDate'] = $this->ExpDate->CurrentValue;
		$row['HSN'] = $this->HSN->CurrentValue;
		$row['MFRCODE'] = $this->MFRCODE->CurrentValue;
		$row['PUnit'] = $this->PUnit->CurrentValue;
		$row['SUnit'] = $this->SUnit->CurrentValue;
		$row['Pack'] = $this->Pack->CurrentValue;
		$row['GrnMRP'] = $this->GrnMRP->CurrentValue;
		$row['MRP'] = $this->MRP->CurrentValue;
		$row['PurValue'] = $this->PurValue->CurrentValue;
		$row['GRNPer'] = $this->GRNPer->CurrentValue;
		$row['Disc'] = $this->Disc->CurrentValue;
		$row['PSGST'] = $this->PSGST->CurrentValue;
		$row['PCGST'] = $this->PCGST->CurrentValue;
		$row['PTax'] = $this->PTax->CurrentValue;
		$row['ItemValue'] = $this->ItemValue->CurrentValue;
		$row['SalTax'] = $this->SalTax->CurrentValue;
		$row['PurRate'] = $this->PurRate->CurrentValue;
		$row['SalRate'] = $this->SalRate->CurrentValue;
		$row['Discount'] = $this->Discount->CurrentValue;
		$row['SSGST'] = $this->SSGST->CurrentValue;
		$row['SCGST'] = $this->SCGST->CurrentValue;
		$row['BRCODE'] = $this->BRCODE->CurrentValue;
		$row['trid'] = $this->trid->CurrentValue;
		$row['HospID'] = $this->HospID->CurrentValue;
		$row['CreatedBy'] = $this->CreatedBy->CurrentValue;
		$row['CreatedDateTime'] = $this->CreatedDateTime->CurrentValue;
		$row['ModifiedBy'] = $this->ModifiedBy->CurrentValue;
		$row['ModifiedDateTime'] = $this->ModifiedDateTime->CurrentValue;
		$row['grncreatedby'] = $this->grncreatedby->CurrentValue;
		$row['grncreatedDateTime'] = $this->grncreatedDateTime->CurrentValue;
		$row['grnModifiedby'] = $this->grnModifiedby->CurrentValue;
		$row['grnModifiedDateTime'] = $this->grnModifiedDateTime->CurrentValue;
		$row['Received'] = $this->Received->CurrentValue;
		$row['BillDate'] = $this->BillDate->CurrentValue;
		$row['grndate'] = $this->grndate->CurrentValue;
		$row['grndatetime'] = $this->grndatetime->CurrentValue;
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

		if ($this->GrnMRP->FormValue == $this->GrnMRP->CurrentValue && is_numeric(ConvertToFloatString($this->GrnMRP->CurrentValue)))
			$this->GrnMRP->CurrentValue = ConvertToFloatString($this->GrnMRP->CurrentValue);

		// Convert decimal values if posted back
		if ($this->MRP->FormValue == $this->MRP->CurrentValue && is_numeric(ConvertToFloatString($this->MRP->CurrentValue)))
			$this->MRP->CurrentValue = ConvertToFloatString($this->MRP->CurrentValue);

		// Convert decimal values if posted back
		if ($this->PurValue->FormValue == $this->PurValue->CurrentValue && is_numeric(ConvertToFloatString($this->PurValue->CurrentValue)))
			$this->PurValue->CurrentValue = ConvertToFloatString($this->PurValue->CurrentValue);

		// Convert decimal values if posted back
		if ($this->GRNPer->FormValue == $this->GRNPer->CurrentValue && is_numeric(ConvertToFloatString($this->GRNPer->CurrentValue)))
			$this->GRNPer->CurrentValue = ConvertToFloatString($this->GRNPer->CurrentValue);

		// Convert decimal values if posted back
		if ($this->PSGST->FormValue == $this->PSGST->CurrentValue && is_numeric(ConvertToFloatString($this->PSGST->CurrentValue)))
			$this->PSGST->CurrentValue = ConvertToFloatString($this->PSGST->CurrentValue);

		// Convert decimal values if posted back
		if ($this->PCGST->FormValue == $this->PCGST->CurrentValue && is_numeric(ConvertToFloatString($this->PCGST->CurrentValue)))
			$this->PCGST->CurrentValue = ConvertToFloatString($this->PCGST->CurrentValue);

		// Convert decimal values if posted back
		if ($this->PTax->FormValue == $this->PTax->CurrentValue && is_numeric(ConvertToFloatString($this->PTax->CurrentValue)))
			$this->PTax->CurrentValue = ConvertToFloatString($this->PTax->CurrentValue);

		// Convert decimal values if posted back
		if ($this->ItemValue->FormValue == $this->ItemValue->CurrentValue && is_numeric(ConvertToFloatString($this->ItemValue->CurrentValue)))
			$this->ItemValue->CurrentValue = ConvertToFloatString($this->ItemValue->CurrentValue);

		// Convert decimal values if posted back
		if ($this->SalTax->FormValue == $this->SalTax->CurrentValue && is_numeric(ConvertToFloatString($this->SalTax->CurrentValue)))
			$this->SalTax->CurrentValue = ConvertToFloatString($this->SalTax->CurrentValue);

		// Convert decimal values if posted back
		if ($this->PurRate->FormValue == $this->PurRate->CurrentValue && is_numeric(ConvertToFloatString($this->PurRate->CurrentValue)))
			$this->PurRate->CurrentValue = ConvertToFloatString($this->PurRate->CurrentValue);

		// Convert decimal values if posted back
		if ($this->SalRate->FormValue == $this->SalRate->CurrentValue && is_numeric(ConvertToFloatString($this->SalRate->CurrentValue)))
			$this->SalRate->CurrentValue = ConvertToFloatString($this->SalRate->CurrentValue);

		// Convert decimal values if posted back
		if ($this->Discount->FormValue == $this->Discount->CurrentValue && is_numeric(ConvertToFloatString($this->Discount->CurrentValue)))
			$this->Discount->CurrentValue = ConvertToFloatString($this->Discount->CurrentValue);

		// Convert decimal values if posted back
		if ($this->SSGST->FormValue == $this->SSGST->CurrentValue && is_numeric(ConvertToFloatString($this->SSGST->CurrentValue)))
			$this->SSGST->CurrentValue = ConvertToFloatString($this->SSGST->CurrentValue);

		// Convert decimal values if posted back
		if ($this->SCGST->FormValue == $this->SCGST->CurrentValue && is_numeric(ConvertToFloatString($this->SCGST->CurrentValue)))
			$this->SCGST->CurrentValue = ConvertToFloatString($this->SCGST->CurrentValue);

		// Call Row_Rendering event
		$this->Row_Rendering();

		// Common render codes for all row types
		// ORDNO
		// PRC
		// QTY
		// DT
		// PC
		// YM
		// Stock
		// LastMonthSale
		// Printcheck
		// id
		// poid
		// PrName
		// grnid
		// GrnQuantity
		// Quantity
		// FreeQty
		// FreeQtyyy
		// BatchNo
		// ExpDate
		// HSN
		// MFRCODE
		// PUnit
		// SUnit
		// Pack
		// GrnMRP
		// MRP
		// PurValue
		// GRNPer
		// Disc
		// PSGST
		// PCGST
		// PTax
		// ItemValue
		// SalTax
		// PurRate
		// SalRate
		// Discount
		// SSGST
		// SCGST
		// BRCODE
		// trid
		// HospID
		// CreatedBy
		// CreatedDateTime
		// ModifiedBy
		// ModifiedDateTime
		// grncreatedby
		// grncreatedDateTime
		// grnModifiedby
		// grnModifiedDateTime
		// Received
		// BillDate
		// grndate
		// grndatetime

		if ($this->RowType == ROWTYPE_VIEW) { // View row

			// ORDNO
			$this->ORDNO->ViewValue = $this->ORDNO->CurrentValue;
			$this->ORDNO->ViewCustomAttributes = "";

			// PRC
			$this->PRC->ViewValue = $this->PRC->CurrentValue;
			$this->PRC->ViewCustomAttributes = "";

			// QTY
			$this->QTY->ViewValue = $this->QTY->CurrentValue;
			$this->QTY->ViewValue = FormatNumber($this->QTY->ViewValue, 0, -2, -2, -2);
			$this->QTY->ViewCustomAttributes = "";

			// DT
			$this->DT->ViewValue = $this->DT->CurrentValue;
			$this->DT->ViewValue = FormatDateTime($this->DT->ViewValue, 0);
			$this->DT->ViewCustomAttributes = "";

			// PC
			$this->PC->ViewValue = $this->PC->CurrentValue;
			$this->PC->ViewCustomAttributes = "";

			// YM
			$this->YM->ViewValue = $this->YM->CurrentValue;
			$this->YM->ViewCustomAttributes = "";

			// Stock
			$this->Stock->ViewValue = $this->Stock->CurrentValue;
			$this->Stock->ViewValue = FormatNumber($this->Stock->ViewValue, 0, -2, -2, -2);
			$this->Stock->ViewCustomAttributes = "";

			// LastMonthSale
			$this->LastMonthSale->ViewValue = $this->LastMonthSale->CurrentValue;
			$this->LastMonthSale->ViewValue = FormatNumber($this->LastMonthSale->ViewValue, 0, -2, -2, -2);
			$this->LastMonthSale->ViewCustomAttributes = "";

			// Printcheck
			$this->Printcheck->ViewValue = $this->Printcheck->CurrentValue;
			$this->Printcheck->ViewCustomAttributes = "";

			// id
			$this->id->ViewValue = $this->id->CurrentValue;
			$this->id->ViewCustomAttributes = "";

			// poid
			$this->poid->ViewValue = $this->poid->CurrentValue;
			$this->poid->ViewValue = FormatNumber($this->poid->ViewValue, 0, -2, -2, -2);
			$this->poid->ViewCustomAttributes = "";

			// PrName
			if ($this->PrName->VirtualValue <> "") {
				$this->PrName->ViewValue = $this->PrName->VirtualValue;
			} else {
				$this->PrName->ViewValue = $this->PrName->CurrentValue;
			$curVal = strval($this->PrName->CurrentValue);
			if ($curVal <> "") {
				$this->PrName->ViewValue = $this->PrName->lookupCacheOption($curVal);
				if ($this->PrName->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`DES`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$lookupFilter = function() {
						return "`BRCODE`='".PharmacyID()."'  and  `HospID` = '".HospitalID()."'";
					};
					$lookupFilter = $lookupFilter->bindTo($this);
					$sqlWrk = $this->PrName->Lookup->getSql(FALSE, $filterWrk, $lookupFilter, $this);
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
			}
			$this->PrName->ViewCustomAttributes = "";

			// grnid
			$this->grnid->ViewValue = $this->grnid->CurrentValue;
			$this->grnid->ViewValue = FormatNumber($this->grnid->ViewValue, 0, -2, -2, -2);
			$this->grnid->ViewCustomAttributes = "";

			// GrnQuantity
			$this->GrnQuantity->ViewValue = $this->GrnQuantity->CurrentValue;
			$this->GrnQuantity->ViewValue = FormatNumber($this->GrnQuantity->ViewValue, 0, -2, -2, -2);
			$this->GrnQuantity->ViewCustomAttributes = "";

			// Quantity
			$this->Quantity->ViewValue = $this->Quantity->CurrentValue;
			$this->Quantity->ViewValue = FormatNumber($this->Quantity->ViewValue, 0, -2, -2, -2);
			$this->Quantity->ViewCustomAttributes = "";

			// FreeQty
			$this->FreeQty->ViewValue = $this->FreeQty->CurrentValue;
			$this->FreeQty->ViewValue = FormatNumber($this->FreeQty->ViewValue, 0, -2, -2, -2);
			$this->FreeQty->ViewCustomAttributes = "";

			// FreeQtyyy
			$this->FreeQtyyy->ViewValue = $this->FreeQtyyy->CurrentValue;
			$this->FreeQtyyy->ViewValue = FormatNumber($this->FreeQtyyy->ViewValue, 0, -2, -2, -2);
			$this->FreeQtyyy->ViewCustomAttributes = "";

			// BatchNo
			$this->BatchNo->ViewValue = $this->BatchNo->CurrentValue;
			$this->BatchNo->ViewCustomAttributes = "";

			// ExpDate
			$this->ExpDate->ViewValue = $this->ExpDate->CurrentValue;
			$this->ExpDate->ViewValue = FormatDateTime($this->ExpDate->ViewValue, 7);
			$this->ExpDate->ViewCustomAttributes = "";

			// HSN
			$this->HSN->ViewValue = $this->HSN->CurrentValue;
			$this->HSN->ViewCustomAttributes = "";

			// MFRCODE
			$this->MFRCODE->ViewValue = $this->MFRCODE->CurrentValue;
			$this->MFRCODE->ViewCustomAttributes = "";

			// PUnit
			$this->PUnit->ViewValue = $this->PUnit->CurrentValue;
			$this->PUnit->ViewValue = FormatNumber($this->PUnit->ViewValue, 0, -2, -2, -2);
			$this->PUnit->ViewCustomAttributes = "";

			// SUnit
			$this->SUnit->ViewValue = $this->SUnit->CurrentValue;
			$this->SUnit->ViewValue = FormatNumber($this->SUnit->ViewValue, 0, -2, -2, -2);
			$this->SUnit->ViewCustomAttributes = "";

			// Pack
			$this->Pack->ViewValue = $this->Pack->CurrentValue;
			$this->Pack->ViewCustomAttributes = "";

			// GrnMRP
			$this->GrnMRP->ViewValue = $this->GrnMRP->CurrentValue;
			$this->GrnMRP->ViewValue = FormatNumber($this->GrnMRP->ViewValue, 2, -2, -2, -2);
			$this->GrnMRP->ViewCustomAttributes = "";

			// MRP
			$this->MRP->ViewValue = $this->MRP->CurrentValue;
			$this->MRP->ViewValue = FormatNumber($this->MRP->ViewValue, 2, -2, -2, -2);
			$this->MRP->ViewCustomAttributes = "";

			// PurValue
			$this->PurValue->ViewValue = $this->PurValue->CurrentValue;
			$this->PurValue->ViewValue = FormatNumber($this->PurValue->ViewValue, 2, -2, -2, -2);
			$this->PurValue->ViewCustomAttributes = "";

			// GRNPer
			$this->GRNPer->ViewValue = $this->GRNPer->CurrentValue;
			$this->GRNPer->ViewValue = FormatNumber($this->GRNPer->ViewValue, 2, -2, -2, -2);
			$this->GRNPer->ViewCustomAttributes = "";

			// Disc
			$this->Disc->ViewValue = $this->Disc->CurrentValue;
			$this->Disc->ViewCustomAttributes = "";

			// PSGST
			$this->PSGST->ViewValue = $this->PSGST->CurrentValue;
			$this->PSGST->ViewCustomAttributes = "";

			// PCGST
			$this->PCGST->ViewValue = $this->PCGST->CurrentValue;
			$this->PCGST->ViewCustomAttributes = "";

			// PTax
			$this->PTax->ViewValue = $this->PTax->CurrentValue;
			$this->PTax->ViewValue = FormatNumber($this->PTax->ViewValue, 2, -2, -2, -2);
			$this->PTax->ViewCustomAttributes = "";

			// ItemValue
			$this->ItemValue->ViewValue = $this->ItemValue->CurrentValue;
			$this->ItemValue->ViewValue = FormatNumber($this->ItemValue->ViewValue, 2, -2, -2, -2);
			$this->ItemValue->ViewCustomAttributes = "";

			// SalTax
			$this->SalTax->ViewValue = $this->SalTax->CurrentValue;
			$this->SalTax->ViewValue = FormatNumber($this->SalTax->ViewValue, 2, -2, -2, -2);
			$this->SalTax->ViewCustomAttributes = "";

			// PurRate
			$this->PurRate->ViewValue = $this->PurRate->CurrentValue;
			$this->PurRate->ViewValue = FormatNumber($this->PurRate->ViewValue, 2, -2, -2, -2);
			$this->PurRate->ViewCustomAttributes = "";

			// SalRate
			$this->SalRate->ViewValue = $this->SalRate->CurrentValue;
			$this->SalRate->ViewValue = FormatNumber($this->SalRate->ViewValue, 2, -2, -2, -2);
			$this->SalRate->ViewCustomAttributes = "";

			// Discount
			$this->Discount->ViewValue = $this->Discount->CurrentValue;
			$this->Discount->ViewValue = FormatNumber($this->Discount->ViewValue, 2, -2, -2, -2);
			$this->Discount->ViewCustomAttributes = "";

			// SSGST
			$this->SSGST->ViewValue = $this->SSGST->CurrentValue;
			$this->SSGST->ViewCustomAttributes = "";

			// SCGST
			$this->SCGST->ViewValue = $this->SCGST->CurrentValue;
			$this->SCGST->ViewCustomAttributes = "";

			// BRCODE
			$this->BRCODE->ViewValue = $this->BRCODE->CurrentValue;
			$this->BRCODE->ViewValue = FormatNumber($this->BRCODE->ViewValue, 0, -2, -2, -2);
			$this->BRCODE->ViewCustomAttributes = "";

			// trid
			$this->trid->ViewValue = $this->trid->CurrentValue;
			$this->trid->ViewValue = FormatNumber($this->trid->ViewValue, 0, -2, -2, -2);
			$this->trid->ViewCustomAttributes = "";

			// HospID
			$this->HospID->ViewValue = $this->HospID->CurrentValue;
			$this->HospID->ViewValue = FormatNumber($this->HospID->ViewValue, 0, -2, -2, -2);
			$this->HospID->ViewCustomAttributes = "";

			// CreatedBy
			$this->CreatedBy->ViewValue = $this->CreatedBy->CurrentValue;
			$this->CreatedBy->ViewValue = FormatNumber($this->CreatedBy->ViewValue, 0, -2, -2, -2);
			$this->CreatedBy->ViewCustomAttributes = "";

			// CreatedDateTime
			$this->CreatedDateTime->ViewValue = $this->CreatedDateTime->CurrentValue;
			$this->CreatedDateTime->ViewValue = FormatDateTime($this->CreatedDateTime->ViewValue, 0);
			$this->CreatedDateTime->ViewCustomAttributes = "";

			// ModifiedBy
			$this->ModifiedBy->ViewValue = $this->ModifiedBy->CurrentValue;
			$this->ModifiedBy->ViewValue = FormatNumber($this->ModifiedBy->ViewValue, 0, -2, -2, -2);
			$this->ModifiedBy->ViewCustomAttributes = "";

			// ModifiedDateTime
			$this->ModifiedDateTime->ViewValue = $this->ModifiedDateTime->CurrentValue;
			$this->ModifiedDateTime->ViewValue = FormatDateTime($this->ModifiedDateTime->ViewValue, 0);
			$this->ModifiedDateTime->ViewCustomAttributes = "";

			// grncreatedby
			$this->grncreatedby->ViewValue = $this->grncreatedby->CurrentValue;
			$this->grncreatedby->ViewValue = FormatNumber($this->grncreatedby->ViewValue, 0, -2, -2, -2);
			$this->grncreatedby->ViewCustomAttributes = "";

			// grncreatedDateTime
			$this->grncreatedDateTime->ViewValue = $this->grncreatedDateTime->CurrentValue;
			$this->grncreatedDateTime->ViewValue = FormatDateTime($this->grncreatedDateTime->ViewValue, 0);
			$this->grncreatedDateTime->ViewCustomAttributes = "";

			// grnModifiedby
			$this->grnModifiedby->ViewValue = $this->grnModifiedby->CurrentValue;
			$this->grnModifiedby->ViewValue = FormatNumber($this->grnModifiedby->ViewValue, 0, -2, -2, -2);
			$this->grnModifiedby->ViewCustomAttributes = "";

			// grnModifiedDateTime
			$this->grnModifiedDateTime->ViewValue = $this->grnModifiedDateTime->CurrentValue;
			$this->grnModifiedDateTime->ViewValue = FormatDateTime($this->grnModifiedDateTime->ViewValue, 0);
			$this->grnModifiedDateTime->ViewCustomAttributes = "";

			// Received
			$this->Received->ViewValue = $this->Received->CurrentValue;
			$this->Received->ViewCustomAttributes = "";

			// BillDate
			$this->BillDate->ViewValue = $this->BillDate->CurrentValue;
			$this->BillDate->ViewValue = FormatDateTime($this->BillDate->ViewValue, 0);
			$this->BillDate->ViewCustomAttributes = "";

			// grndate
			$this->grndate->ViewValue = $this->grndate->CurrentValue;
			$this->grndate->ViewValue = FormatDateTime($this->grndate->ViewValue, 0);
			$this->grndate->ViewCustomAttributes = "";

			// grndatetime
			$this->grndatetime->ViewValue = $this->grndatetime->CurrentValue;
			$this->grndatetime->ViewValue = FormatDateTime($this->grndatetime->ViewValue, 0);
			$this->grndatetime->ViewCustomAttributes = "";

			// ORDNO
			$this->ORDNO->LinkCustomAttributes = "";
			$this->ORDNO->HrefValue = "";
			$this->ORDNO->TooltipValue = "";

			// PRC
			$this->PRC->LinkCustomAttributes = "";
			$this->PRC->HrefValue = "";
			$this->PRC->TooltipValue = "";

			// QTY
			$this->QTY->LinkCustomAttributes = "";
			$this->QTY->HrefValue = "";
			$this->QTY->TooltipValue = "";

			// DT
			$this->DT->LinkCustomAttributes = "";
			$this->DT->HrefValue = "";
			$this->DT->TooltipValue = "";

			// PC
			$this->PC->LinkCustomAttributes = "";
			$this->PC->HrefValue = "";
			$this->PC->TooltipValue = "";

			// YM
			$this->YM->LinkCustomAttributes = "";
			$this->YM->HrefValue = "";
			$this->YM->TooltipValue = "";

			// Stock
			$this->Stock->LinkCustomAttributes = "";
			$this->Stock->HrefValue = "";
			$this->Stock->TooltipValue = "";

			// LastMonthSale
			$this->LastMonthSale->LinkCustomAttributes = "";
			$this->LastMonthSale->HrefValue = "";
			$this->LastMonthSale->TooltipValue = "";

			// Printcheck
			$this->Printcheck->LinkCustomAttributes = "";
			$this->Printcheck->HrefValue = "";
			$this->Printcheck->TooltipValue = "";

			// poid
			$this->poid->LinkCustomAttributes = "";
			$this->poid->HrefValue = "";
			$this->poid->TooltipValue = "";

			// PrName
			$this->PrName->LinkCustomAttributes = "";
			$this->PrName->HrefValue = "";
			$this->PrName->TooltipValue = "";

			// grnid
			$this->grnid->LinkCustomAttributes = "";
			$this->grnid->HrefValue = "";
			$this->grnid->TooltipValue = "";

			// GrnQuantity
			$this->GrnQuantity->LinkCustomAttributes = "";
			$this->GrnQuantity->HrefValue = "";
			$this->GrnQuantity->TooltipValue = "";

			// Quantity
			$this->Quantity->LinkCustomAttributes = "";
			$this->Quantity->HrefValue = "";
			$this->Quantity->TooltipValue = "";

			// FreeQty
			$this->FreeQty->LinkCustomAttributes = "";
			$this->FreeQty->HrefValue = "";
			$this->FreeQty->TooltipValue = "";

			// FreeQtyyy
			$this->FreeQtyyy->LinkCustomAttributes = "";
			$this->FreeQtyyy->HrefValue = "";
			$this->FreeQtyyy->TooltipValue = "";

			// BatchNo
			$this->BatchNo->LinkCustomAttributes = "";
			$this->BatchNo->HrefValue = "";
			$this->BatchNo->TooltipValue = "";

			// ExpDate
			$this->ExpDate->LinkCustomAttributes = "";
			$this->ExpDate->HrefValue = "";
			$this->ExpDate->TooltipValue = "";

			// HSN
			$this->HSN->LinkCustomAttributes = "";
			$this->HSN->HrefValue = "";
			$this->HSN->TooltipValue = "";

			// MFRCODE
			$this->MFRCODE->LinkCustomAttributes = "";
			$this->MFRCODE->HrefValue = "";
			$this->MFRCODE->TooltipValue = "";

			// PUnit
			$this->PUnit->LinkCustomAttributes = "";
			$this->PUnit->HrefValue = "";
			$this->PUnit->TooltipValue = "";

			// SUnit
			$this->SUnit->LinkCustomAttributes = "";
			$this->SUnit->HrefValue = "";
			$this->SUnit->TooltipValue = "";

			// Pack
			$this->Pack->LinkCustomAttributes = "";
			$this->Pack->HrefValue = "";
			$this->Pack->TooltipValue = "";

			// GrnMRP
			$this->GrnMRP->LinkCustomAttributes = "";
			$this->GrnMRP->HrefValue = "";
			$this->GrnMRP->TooltipValue = "";

			// MRP
			$this->MRP->LinkCustomAttributes = "";
			$this->MRP->HrefValue = "";
			$this->MRP->TooltipValue = "";

			// PurValue
			$this->PurValue->LinkCustomAttributes = "";
			$this->PurValue->HrefValue = "";
			$this->PurValue->TooltipValue = "";

			// GRNPer
			$this->GRNPer->LinkCustomAttributes = "";
			$this->GRNPer->HrefValue = "";
			$this->GRNPer->TooltipValue = "";

			// Disc
			$this->Disc->LinkCustomAttributes = "";
			$this->Disc->HrefValue = "";
			$this->Disc->TooltipValue = "";

			// PSGST
			$this->PSGST->LinkCustomAttributes = "";
			$this->PSGST->HrefValue = "";
			$this->PSGST->TooltipValue = "";

			// PCGST
			$this->PCGST->LinkCustomAttributes = "";
			$this->PCGST->HrefValue = "";
			$this->PCGST->TooltipValue = "";

			// PTax
			$this->PTax->LinkCustomAttributes = "";
			$this->PTax->HrefValue = "";
			$this->PTax->TooltipValue = "";

			// ItemValue
			$this->ItemValue->LinkCustomAttributes = "";
			$this->ItemValue->HrefValue = "";
			$this->ItemValue->TooltipValue = "";

			// SalTax
			$this->SalTax->LinkCustomAttributes = "";
			$this->SalTax->HrefValue = "";
			$this->SalTax->TooltipValue = "";

			// PurRate
			$this->PurRate->LinkCustomAttributes = "";
			$this->PurRate->HrefValue = "";
			$this->PurRate->TooltipValue = "";

			// SalRate
			$this->SalRate->LinkCustomAttributes = "";
			$this->SalRate->HrefValue = "";
			$this->SalRate->TooltipValue = "";

			// Discount
			$this->Discount->LinkCustomAttributes = "";
			$this->Discount->HrefValue = "";
			$this->Discount->TooltipValue = "";

			// SSGST
			$this->SSGST->LinkCustomAttributes = "";
			$this->SSGST->HrefValue = "";
			$this->SSGST->TooltipValue = "";

			// SCGST
			$this->SCGST->LinkCustomAttributes = "";
			$this->SCGST->HrefValue = "";
			$this->SCGST->TooltipValue = "";

			// BRCODE
			$this->BRCODE->LinkCustomAttributes = "";
			$this->BRCODE->HrefValue = "";
			$this->BRCODE->TooltipValue = "";

			// trid
			$this->trid->LinkCustomAttributes = "";
			$this->trid->HrefValue = "";
			$this->trid->TooltipValue = "";

			// HospID
			$this->HospID->LinkCustomAttributes = "";
			$this->HospID->HrefValue = "";
			$this->HospID->TooltipValue = "";

			// CreatedBy
			$this->CreatedBy->LinkCustomAttributes = "";
			$this->CreatedBy->HrefValue = "";
			$this->CreatedBy->TooltipValue = "";

			// CreatedDateTime
			$this->CreatedDateTime->LinkCustomAttributes = "";
			$this->CreatedDateTime->HrefValue = "";
			$this->CreatedDateTime->TooltipValue = "";

			// ModifiedBy
			$this->ModifiedBy->LinkCustomAttributes = "";
			$this->ModifiedBy->HrefValue = "";
			$this->ModifiedBy->TooltipValue = "";

			// ModifiedDateTime
			$this->ModifiedDateTime->LinkCustomAttributes = "";
			$this->ModifiedDateTime->HrefValue = "";
			$this->ModifiedDateTime->TooltipValue = "";

			// grncreatedby
			$this->grncreatedby->LinkCustomAttributes = "";
			$this->grncreatedby->HrefValue = "";
			$this->grncreatedby->TooltipValue = "";

			// grncreatedDateTime
			$this->grncreatedDateTime->LinkCustomAttributes = "";
			$this->grncreatedDateTime->HrefValue = "";
			$this->grncreatedDateTime->TooltipValue = "";

			// grnModifiedby
			$this->grnModifiedby->LinkCustomAttributes = "";
			$this->grnModifiedby->HrefValue = "";
			$this->grnModifiedby->TooltipValue = "";

			// grnModifiedDateTime
			$this->grnModifiedDateTime->LinkCustomAttributes = "";
			$this->grnModifiedDateTime->HrefValue = "";
			$this->grnModifiedDateTime->TooltipValue = "";

			// Received
			$this->Received->LinkCustomAttributes = "";
			$this->Received->HrefValue = "";
			$this->Received->TooltipValue = "";

			// BillDate
			$this->BillDate->LinkCustomAttributes = "";
			$this->BillDate->HrefValue = "";
			$this->BillDate->TooltipValue = "";

			// grndate
			$this->grndate->LinkCustomAttributes = "";
			$this->grndate->HrefValue = "";
			$this->grndate->TooltipValue = "";

			// grndatetime
			$this->grndatetime->LinkCustomAttributes = "";
			$this->grndatetime->HrefValue = "";
			$this->grndatetime->TooltipValue = "";
		} elseif ($this->RowType == ROWTYPE_ADD) { // Add row

			// ORDNO
			$this->ORDNO->EditAttrs["class"] = "form-control";
			$this->ORDNO->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->ORDNO->CurrentValue = HtmlDecode($this->ORDNO->CurrentValue);
			$this->ORDNO->EditValue = HtmlEncode($this->ORDNO->CurrentValue);
			$this->ORDNO->PlaceHolder = RemoveHtml($this->ORDNO->caption());

			// PRC
			$this->PRC->EditAttrs["class"] = "form-control";
			$this->PRC->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->PRC->CurrentValue = HtmlDecode($this->PRC->CurrentValue);
			$this->PRC->EditValue = HtmlEncode($this->PRC->CurrentValue);
			$this->PRC->PlaceHolder = RemoveHtml($this->PRC->caption());

			// QTY
			$this->QTY->EditAttrs["class"] = "form-control";
			$this->QTY->EditCustomAttributes = "";
			$this->QTY->EditValue = HtmlEncode($this->QTY->CurrentValue);
			$this->QTY->PlaceHolder = RemoveHtml($this->QTY->caption());

			// DT
			$this->DT->EditAttrs["class"] = "form-control";
			$this->DT->EditCustomAttributes = "";
			$this->DT->EditValue = HtmlEncode(FormatDateTime($this->DT->CurrentValue, 8));
			$this->DT->PlaceHolder = RemoveHtml($this->DT->caption());

			// PC
			$this->PC->EditAttrs["class"] = "form-control";
			$this->PC->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->PC->CurrentValue = HtmlDecode($this->PC->CurrentValue);
			$this->PC->EditValue = HtmlEncode($this->PC->CurrentValue);
			$this->PC->PlaceHolder = RemoveHtml($this->PC->caption());

			// YM
			$this->YM->EditAttrs["class"] = "form-control";
			$this->YM->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->YM->CurrentValue = HtmlDecode($this->YM->CurrentValue);
			$this->YM->EditValue = HtmlEncode($this->YM->CurrentValue);
			$this->YM->PlaceHolder = RemoveHtml($this->YM->caption());

			// Stock
			$this->Stock->EditAttrs["class"] = "form-control";
			$this->Stock->EditCustomAttributes = "";
			$this->Stock->EditValue = HtmlEncode($this->Stock->CurrentValue);
			$this->Stock->PlaceHolder = RemoveHtml($this->Stock->caption());

			// LastMonthSale
			$this->LastMonthSale->EditAttrs["class"] = "form-control";
			$this->LastMonthSale->EditCustomAttributes = "";
			$this->LastMonthSale->EditValue = HtmlEncode($this->LastMonthSale->CurrentValue);
			$this->LastMonthSale->PlaceHolder = RemoveHtml($this->LastMonthSale->caption());

			// Printcheck
			$this->Printcheck->EditAttrs["class"] = "form-control";
			$this->Printcheck->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Printcheck->CurrentValue = HtmlDecode($this->Printcheck->CurrentValue);
			$this->Printcheck->EditValue = HtmlEncode($this->Printcheck->CurrentValue);
			$this->Printcheck->PlaceHolder = RemoveHtml($this->Printcheck->caption());

			// poid
			$this->poid->EditAttrs["class"] = "form-control";
			$this->poid->EditCustomAttributes = "";
			$this->poid->EditValue = HtmlEncode($this->poid->CurrentValue);
			$this->poid->PlaceHolder = RemoveHtml($this->poid->caption());

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
					$lookupFilter = function() {
						return "`BRCODE`='".PharmacyID()."'  and  `HospID` = '".HospitalID()."'";
					};
					$lookupFilter = $lookupFilter->bindTo($this);
					$sqlWrk = $this->PrName->Lookup->getSql(FALSE, $filterWrk, $lookupFilter, $this);
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

			// grnid
			$this->grnid->EditAttrs["class"] = "form-control";
			$this->grnid->EditCustomAttributes = "";
			if ($this->grnid->getSessionValue() <> "") {
				$this->grnid->CurrentValue = $this->grnid->getSessionValue();
			$this->grnid->ViewValue = $this->grnid->CurrentValue;
			$this->grnid->ViewValue = FormatNumber($this->grnid->ViewValue, 0, -2, -2, -2);
			$this->grnid->ViewCustomAttributes = "";
			} else {
			$this->grnid->EditValue = HtmlEncode($this->grnid->CurrentValue);
			$this->grnid->PlaceHolder = RemoveHtml($this->grnid->caption());
			}

			// GrnQuantity
			$this->GrnQuantity->EditAttrs["class"] = "form-control";
			$this->GrnQuantity->EditCustomAttributes = "";
			$this->GrnQuantity->EditValue = HtmlEncode($this->GrnQuantity->CurrentValue);
			$this->GrnQuantity->PlaceHolder = RemoveHtml($this->GrnQuantity->caption());

			// Quantity
			$this->Quantity->EditAttrs["class"] = "form-control";
			$this->Quantity->EditCustomAttributes = "";
			$this->Quantity->EditValue = HtmlEncode($this->Quantity->CurrentValue);
			$this->Quantity->PlaceHolder = RemoveHtml($this->Quantity->caption());

			// FreeQty
			$this->FreeQty->EditAttrs["class"] = "form-control";
			$this->FreeQty->EditCustomAttributes = "";
			$this->FreeQty->EditValue = HtmlEncode($this->FreeQty->CurrentValue);
			$this->FreeQty->PlaceHolder = RemoveHtml($this->FreeQty->caption());

			// FreeQtyyy
			$this->FreeQtyyy->EditAttrs["class"] = "form-control";
			$this->FreeQtyyy->EditCustomAttributes = "";
			$this->FreeQtyyy->EditValue = HtmlEncode($this->FreeQtyyy->CurrentValue);
			$this->FreeQtyyy->PlaceHolder = RemoveHtml($this->FreeQtyyy->caption());

			// BatchNo
			$this->BatchNo->EditAttrs["class"] = "form-control";
			$this->BatchNo->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->BatchNo->CurrentValue = HtmlDecode($this->BatchNo->CurrentValue);
			$this->BatchNo->EditValue = HtmlEncode($this->BatchNo->CurrentValue);
			$this->BatchNo->PlaceHolder = RemoveHtml($this->BatchNo->caption());

			// ExpDate
			$this->ExpDate->EditAttrs["class"] = "form-control";
			$this->ExpDate->EditCustomAttributes = "";
			$this->ExpDate->EditValue = HtmlEncode(FormatDateTime($this->ExpDate->CurrentValue, 7));
			$this->ExpDate->PlaceHolder = RemoveHtml($this->ExpDate->caption());

			// HSN
			$this->HSN->EditAttrs["class"] = "form-control";
			$this->HSN->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->HSN->CurrentValue = HtmlDecode($this->HSN->CurrentValue);
			$this->HSN->EditValue = HtmlEncode($this->HSN->CurrentValue);
			$this->HSN->PlaceHolder = RemoveHtml($this->HSN->caption());

			// MFRCODE
			$this->MFRCODE->EditAttrs["class"] = "form-control";
			$this->MFRCODE->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->MFRCODE->CurrentValue = HtmlDecode($this->MFRCODE->CurrentValue);
			$this->MFRCODE->EditValue = HtmlEncode($this->MFRCODE->CurrentValue);
			$this->MFRCODE->PlaceHolder = RemoveHtml($this->MFRCODE->caption());

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

			// Pack
			$this->Pack->EditAttrs["class"] = "form-control";
			$this->Pack->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Pack->CurrentValue = HtmlDecode($this->Pack->CurrentValue);
			$this->Pack->EditValue = HtmlEncode($this->Pack->CurrentValue);
			$this->Pack->PlaceHolder = RemoveHtml($this->Pack->caption());

			// GrnMRP
			$this->GrnMRP->EditAttrs["class"] = "form-control";
			$this->GrnMRP->EditCustomAttributes = "";
			$this->GrnMRP->EditValue = HtmlEncode($this->GrnMRP->CurrentValue);
			$this->GrnMRP->PlaceHolder = RemoveHtml($this->GrnMRP->caption());
			if (strval($this->GrnMRP->EditValue) <> "" && is_numeric($this->GrnMRP->EditValue))
				$this->GrnMRP->EditValue = FormatNumber($this->GrnMRP->EditValue, -2, -2, -2, -2);

			// MRP
			$this->MRP->EditAttrs["class"] = "form-control";
			$this->MRP->EditCustomAttributes = "";
			$this->MRP->EditValue = HtmlEncode($this->MRP->CurrentValue);
			$this->MRP->PlaceHolder = RemoveHtml($this->MRP->caption());
			if (strval($this->MRP->EditValue) <> "" && is_numeric($this->MRP->EditValue))
				$this->MRP->EditValue = FormatNumber($this->MRP->EditValue, -2, -2, -2, -2);

			// PurValue
			$this->PurValue->EditAttrs["class"] = "form-control";
			$this->PurValue->EditCustomAttributes = "";
			$this->PurValue->EditValue = HtmlEncode($this->PurValue->CurrentValue);
			$this->PurValue->PlaceHolder = RemoveHtml($this->PurValue->caption());
			if (strval($this->PurValue->EditValue) <> "" && is_numeric($this->PurValue->EditValue))
				$this->PurValue->EditValue = FormatNumber($this->PurValue->EditValue, -2, -2, -2, -2);

			// GRNPer
			$this->GRNPer->EditAttrs["class"] = "form-control";
			$this->GRNPer->EditCustomAttributes = "";
			$this->GRNPer->EditValue = HtmlEncode($this->GRNPer->CurrentValue);
			$this->GRNPer->PlaceHolder = RemoveHtml($this->GRNPer->caption());
			if (strval($this->GRNPer->EditValue) <> "" && is_numeric($this->GRNPer->EditValue))
				$this->GRNPer->EditValue = FormatNumber($this->GRNPer->EditValue, -2, -2, -2, -2);

			// Disc
			$this->Disc->EditAttrs["class"] = "form-control";
			$this->Disc->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Disc->CurrentValue = HtmlDecode($this->Disc->CurrentValue);
			$this->Disc->EditValue = HtmlEncode($this->Disc->CurrentValue);
			$this->Disc->PlaceHolder = RemoveHtml($this->Disc->caption());

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

			// PTax
			$this->PTax->EditAttrs["class"] = "form-control";
			$this->PTax->EditCustomAttributes = "";
			$this->PTax->EditValue = HtmlEncode($this->PTax->CurrentValue);
			$this->PTax->PlaceHolder = RemoveHtml($this->PTax->caption());
			if (strval($this->PTax->EditValue) <> "" && is_numeric($this->PTax->EditValue))
				$this->PTax->EditValue = FormatNumber($this->PTax->EditValue, -2, -2, -2, -2);

			// ItemValue
			$this->ItemValue->EditAttrs["class"] = "form-control";
			$this->ItemValue->EditCustomAttributes = "";
			$this->ItemValue->EditValue = HtmlEncode($this->ItemValue->CurrentValue);
			$this->ItemValue->PlaceHolder = RemoveHtml($this->ItemValue->caption());
			if (strval($this->ItemValue->EditValue) <> "" && is_numeric($this->ItemValue->EditValue))
				$this->ItemValue->EditValue = FormatNumber($this->ItemValue->EditValue, -2, -2, -2, -2);

			// SalTax
			$this->SalTax->EditAttrs["class"] = "form-control";
			$this->SalTax->EditCustomAttributes = "";
			$this->SalTax->EditValue = HtmlEncode($this->SalTax->CurrentValue);
			$this->SalTax->PlaceHolder = RemoveHtml($this->SalTax->caption());
			if (strval($this->SalTax->EditValue) <> "" && is_numeric($this->SalTax->EditValue))
				$this->SalTax->EditValue = FormatNumber($this->SalTax->EditValue, -2, -2, -2, -2);

			// PurRate
			$this->PurRate->EditAttrs["class"] = "form-control";
			$this->PurRate->EditCustomAttributes = "";
			$this->PurRate->EditValue = HtmlEncode($this->PurRate->CurrentValue);
			$this->PurRate->PlaceHolder = RemoveHtml($this->PurRate->caption());
			if (strval($this->PurRate->EditValue) <> "" && is_numeric($this->PurRate->EditValue))
				$this->PurRate->EditValue = FormatNumber($this->PurRate->EditValue, -2, -2, -2, -2);

			// SalRate
			$this->SalRate->EditAttrs["class"] = "form-control";
			$this->SalRate->EditCustomAttributes = "";
			$this->SalRate->EditValue = HtmlEncode($this->SalRate->CurrentValue);
			$this->SalRate->PlaceHolder = RemoveHtml($this->SalRate->caption());
			if (strval($this->SalRate->EditValue) <> "" && is_numeric($this->SalRate->EditValue))
				$this->SalRate->EditValue = FormatNumber($this->SalRate->EditValue, -2, -2, -2, -2);

			// Discount
			$this->Discount->EditAttrs["class"] = "form-control";
			$this->Discount->EditCustomAttributes = "";
			$this->Discount->EditValue = HtmlEncode($this->Discount->CurrentValue);
			$this->Discount->PlaceHolder = RemoveHtml($this->Discount->caption());
			if (strval($this->Discount->EditValue) <> "" && is_numeric($this->Discount->EditValue))
				$this->Discount->EditValue = FormatNumber($this->Discount->EditValue, -2, -2, -2, -2);

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

			// BRCODE
			// trid

			$this->trid->EditAttrs["class"] = "form-control";
			$this->trid->EditCustomAttributes = "";
			$this->trid->EditValue = HtmlEncode($this->trid->CurrentValue);
			$this->trid->PlaceHolder = RemoveHtml($this->trid->caption());

			// HospID
			// CreatedBy

			$this->CreatedBy->EditAttrs["class"] = "form-control";
			$this->CreatedBy->EditCustomAttributes = "";
			$this->CreatedBy->EditValue = HtmlEncode($this->CreatedBy->CurrentValue);
			$this->CreatedBy->PlaceHolder = RemoveHtml($this->CreatedBy->caption());

			// CreatedDateTime
			$this->CreatedDateTime->EditAttrs["class"] = "form-control";
			$this->CreatedDateTime->EditCustomAttributes = "";
			$this->CreatedDateTime->EditValue = HtmlEncode(FormatDateTime($this->CreatedDateTime->CurrentValue, 8));
			$this->CreatedDateTime->PlaceHolder = RemoveHtml($this->CreatedDateTime->caption());

			// ModifiedBy
			$this->ModifiedBy->EditAttrs["class"] = "form-control";
			$this->ModifiedBy->EditCustomAttributes = "";
			$this->ModifiedBy->EditValue = HtmlEncode($this->ModifiedBy->CurrentValue);
			$this->ModifiedBy->PlaceHolder = RemoveHtml($this->ModifiedBy->caption());

			// ModifiedDateTime
			$this->ModifiedDateTime->EditAttrs["class"] = "form-control";
			$this->ModifiedDateTime->EditCustomAttributes = "";
			$this->ModifiedDateTime->EditValue = HtmlEncode(FormatDateTime($this->ModifiedDateTime->CurrentValue, 8));
			$this->ModifiedDateTime->PlaceHolder = RemoveHtml($this->ModifiedDateTime->caption());

			// grncreatedby
			// grncreatedDateTime
			// grnModifiedby
			// grnModifiedDateTime
			// Received

			$this->Received->EditAttrs["class"] = "form-control";
			$this->Received->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->Received->CurrentValue = HtmlDecode($this->Received->CurrentValue);
			$this->Received->EditValue = HtmlEncode($this->Received->CurrentValue);
			$this->Received->PlaceHolder = RemoveHtml($this->Received->caption());

			// BillDate
			$this->BillDate->EditAttrs["class"] = "form-control";
			$this->BillDate->EditCustomAttributes = "";
			$this->BillDate->EditValue = HtmlEncode(FormatDateTime($this->BillDate->CurrentValue, 8));
			$this->BillDate->PlaceHolder = RemoveHtml($this->BillDate->caption());

			// grndate
			// grndatetime
			// Add refer script
			// ORDNO

			$this->ORDNO->LinkCustomAttributes = "";
			$this->ORDNO->HrefValue = "";

			// PRC
			$this->PRC->LinkCustomAttributes = "";
			$this->PRC->HrefValue = "";

			// QTY
			$this->QTY->LinkCustomAttributes = "";
			$this->QTY->HrefValue = "";

			// DT
			$this->DT->LinkCustomAttributes = "";
			$this->DT->HrefValue = "";

			// PC
			$this->PC->LinkCustomAttributes = "";
			$this->PC->HrefValue = "";

			// YM
			$this->YM->LinkCustomAttributes = "";
			$this->YM->HrefValue = "";

			// Stock
			$this->Stock->LinkCustomAttributes = "";
			$this->Stock->HrefValue = "";

			// LastMonthSale
			$this->LastMonthSale->LinkCustomAttributes = "";
			$this->LastMonthSale->HrefValue = "";

			// Printcheck
			$this->Printcheck->LinkCustomAttributes = "";
			$this->Printcheck->HrefValue = "";

			// poid
			$this->poid->LinkCustomAttributes = "";
			$this->poid->HrefValue = "";

			// PrName
			$this->PrName->LinkCustomAttributes = "";
			$this->PrName->HrefValue = "";

			// grnid
			$this->grnid->LinkCustomAttributes = "";
			$this->grnid->HrefValue = "";

			// GrnQuantity
			$this->GrnQuantity->LinkCustomAttributes = "";
			$this->GrnQuantity->HrefValue = "";

			// Quantity
			$this->Quantity->LinkCustomAttributes = "";
			$this->Quantity->HrefValue = "";

			// FreeQty
			$this->FreeQty->LinkCustomAttributes = "";
			$this->FreeQty->HrefValue = "";

			// FreeQtyyy
			$this->FreeQtyyy->LinkCustomAttributes = "";
			$this->FreeQtyyy->HrefValue = "";

			// BatchNo
			$this->BatchNo->LinkCustomAttributes = "";
			$this->BatchNo->HrefValue = "";

			// ExpDate
			$this->ExpDate->LinkCustomAttributes = "";
			$this->ExpDate->HrefValue = "";

			// HSN
			$this->HSN->LinkCustomAttributes = "";
			$this->HSN->HrefValue = "";

			// MFRCODE
			$this->MFRCODE->LinkCustomAttributes = "";
			$this->MFRCODE->HrefValue = "";

			// PUnit
			$this->PUnit->LinkCustomAttributes = "";
			$this->PUnit->HrefValue = "";

			// SUnit
			$this->SUnit->LinkCustomAttributes = "";
			$this->SUnit->HrefValue = "";

			// Pack
			$this->Pack->LinkCustomAttributes = "";
			$this->Pack->HrefValue = "";

			// GrnMRP
			$this->GrnMRP->LinkCustomAttributes = "";
			$this->GrnMRP->HrefValue = "";

			// MRP
			$this->MRP->LinkCustomAttributes = "";
			$this->MRP->HrefValue = "";

			// PurValue
			$this->PurValue->LinkCustomAttributes = "";
			$this->PurValue->HrefValue = "";

			// GRNPer
			$this->GRNPer->LinkCustomAttributes = "";
			$this->GRNPer->HrefValue = "";

			// Disc
			$this->Disc->LinkCustomAttributes = "";
			$this->Disc->HrefValue = "";

			// PSGST
			$this->PSGST->LinkCustomAttributes = "";
			$this->PSGST->HrefValue = "";

			// PCGST
			$this->PCGST->LinkCustomAttributes = "";
			$this->PCGST->HrefValue = "";

			// PTax
			$this->PTax->LinkCustomAttributes = "";
			$this->PTax->HrefValue = "";

			// ItemValue
			$this->ItemValue->LinkCustomAttributes = "";
			$this->ItemValue->HrefValue = "";

			// SalTax
			$this->SalTax->LinkCustomAttributes = "";
			$this->SalTax->HrefValue = "";

			// PurRate
			$this->PurRate->LinkCustomAttributes = "";
			$this->PurRate->HrefValue = "";

			// SalRate
			$this->SalRate->LinkCustomAttributes = "";
			$this->SalRate->HrefValue = "";

			// Discount
			$this->Discount->LinkCustomAttributes = "";
			$this->Discount->HrefValue = "";

			// SSGST
			$this->SSGST->LinkCustomAttributes = "";
			$this->SSGST->HrefValue = "";

			// SCGST
			$this->SCGST->LinkCustomAttributes = "";
			$this->SCGST->HrefValue = "";

			// BRCODE
			$this->BRCODE->LinkCustomAttributes = "";
			$this->BRCODE->HrefValue = "";

			// trid
			$this->trid->LinkCustomAttributes = "";
			$this->trid->HrefValue = "";

			// HospID
			$this->HospID->LinkCustomAttributes = "";
			$this->HospID->HrefValue = "";

			// CreatedBy
			$this->CreatedBy->LinkCustomAttributes = "";
			$this->CreatedBy->HrefValue = "";

			// CreatedDateTime
			$this->CreatedDateTime->LinkCustomAttributes = "";
			$this->CreatedDateTime->HrefValue = "";

			// ModifiedBy
			$this->ModifiedBy->LinkCustomAttributes = "";
			$this->ModifiedBy->HrefValue = "";

			// ModifiedDateTime
			$this->ModifiedDateTime->LinkCustomAttributes = "";
			$this->ModifiedDateTime->HrefValue = "";

			// grncreatedby
			$this->grncreatedby->LinkCustomAttributes = "";
			$this->grncreatedby->HrefValue = "";

			// grncreatedDateTime
			$this->grncreatedDateTime->LinkCustomAttributes = "";
			$this->grncreatedDateTime->HrefValue = "";

			// grnModifiedby
			$this->grnModifiedby->LinkCustomAttributes = "";
			$this->grnModifiedby->HrefValue = "";

			// grnModifiedDateTime
			$this->grnModifiedDateTime->LinkCustomAttributes = "";
			$this->grnModifiedDateTime->HrefValue = "";

			// Received
			$this->Received->LinkCustomAttributes = "";
			$this->Received->HrefValue = "";

			// BillDate
			$this->BillDate->LinkCustomAttributes = "";
			$this->BillDate->HrefValue = "";

			// grndate
			$this->grndate->LinkCustomAttributes = "";
			$this->grndate->HrefValue = "";

			// grndatetime
			$this->grndatetime->LinkCustomAttributes = "";
			$this->grndatetime->HrefValue = "";
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
		if ($this->ORDNO->Required) {
			if (!$this->ORDNO->IsDetailKey && $this->ORDNO->FormValue != NULL && $this->ORDNO->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->ORDNO->caption(), $this->ORDNO->RequiredErrorMessage));
			}
		}
		if ($this->PRC->Required) {
			if (!$this->PRC->IsDetailKey && $this->PRC->FormValue != NULL && $this->PRC->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PRC->caption(), $this->PRC->RequiredErrorMessage));
			}
		}
		if ($this->QTY->Required) {
			if (!$this->QTY->IsDetailKey && $this->QTY->FormValue != NULL && $this->QTY->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->QTY->caption(), $this->QTY->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->QTY->FormValue)) {
			AddMessage($FormError, $this->QTY->errorMessage());
		}
		if ($this->DT->Required) {
			if (!$this->DT->IsDetailKey && $this->DT->FormValue != NULL && $this->DT->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->DT->caption(), $this->DT->RequiredErrorMessage));
			}
		}
		if (!CheckDate($this->DT->FormValue)) {
			AddMessage($FormError, $this->DT->errorMessage());
		}
		if ($this->PC->Required) {
			if (!$this->PC->IsDetailKey && $this->PC->FormValue != NULL && $this->PC->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PC->caption(), $this->PC->RequiredErrorMessage));
			}
		}
		if ($this->YM->Required) {
			if (!$this->YM->IsDetailKey && $this->YM->FormValue != NULL && $this->YM->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->YM->caption(), $this->YM->RequiredErrorMessage));
			}
		}
		if ($this->Stock->Required) {
			if (!$this->Stock->IsDetailKey && $this->Stock->FormValue != NULL && $this->Stock->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Stock->caption(), $this->Stock->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->Stock->FormValue)) {
			AddMessage($FormError, $this->Stock->errorMessage());
		}
		if ($this->LastMonthSale->Required) {
			if (!$this->LastMonthSale->IsDetailKey && $this->LastMonthSale->FormValue != NULL && $this->LastMonthSale->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->LastMonthSale->caption(), $this->LastMonthSale->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->LastMonthSale->FormValue)) {
			AddMessage($FormError, $this->LastMonthSale->errorMessage());
		}
		if ($this->Printcheck->Required) {
			if (!$this->Printcheck->IsDetailKey && $this->Printcheck->FormValue != NULL && $this->Printcheck->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Printcheck->caption(), $this->Printcheck->RequiredErrorMessage));
			}
		}
		if ($this->id->Required) {
			if (!$this->id->IsDetailKey && $this->id->FormValue != NULL && $this->id->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->id->caption(), $this->id->RequiredErrorMessage));
			}
		}
		if ($this->poid->Required) {
			if (!$this->poid->IsDetailKey && $this->poid->FormValue != NULL && $this->poid->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->poid->caption(), $this->poid->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->poid->FormValue)) {
			AddMessage($FormError, $this->poid->errorMessage());
		}
		if ($this->PrName->Required) {
			if (!$this->PrName->IsDetailKey && $this->PrName->FormValue != NULL && $this->PrName->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PrName->caption(), $this->PrName->RequiredErrorMessage));
			}
		}
		if ($this->grnid->Required) {
			if (!$this->grnid->IsDetailKey && $this->grnid->FormValue != NULL && $this->grnid->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->grnid->caption(), $this->grnid->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->grnid->FormValue)) {
			AddMessage($FormError, $this->grnid->errorMessage());
		}
		if ($this->GrnQuantity->Required) {
			if (!$this->GrnQuantity->IsDetailKey && $this->GrnQuantity->FormValue != NULL && $this->GrnQuantity->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->GrnQuantity->caption(), $this->GrnQuantity->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->GrnQuantity->FormValue)) {
			AddMessage($FormError, $this->GrnQuantity->errorMessage());
		}
		if ($this->Quantity->Required) {
			if (!$this->Quantity->IsDetailKey && $this->Quantity->FormValue != NULL && $this->Quantity->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Quantity->caption(), $this->Quantity->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->Quantity->FormValue)) {
			AddMessage($FormError, $this->Quantity->errorMessage());
		}
		if ($this->FreeQty->Required) {
			if (!$this->FreeQty->IsDetailKey && $this->FreeQty->FormValue != NULL && $this->FreeQty->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->FreeQty->caption(), $this->FreeQty->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->FreeQty->FormValue)) {
			AddMessage($FormError, $this->FreeQty->errorMessage());
		}
		if ($this->FreeQtyyy->Required) {
			if (!$this->FreeQtyyy->IsDetailKey && $this->FreeQtyyy->FormValue != NULL && $this->FreeQtyyy->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->FreeQtyyy->caption(), $this->FreeQtyyy->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->FreeQtyyy->FormValue)) {
			AddMessage($FormError, $this->FreeQtyyy->errorMessage());
		}
		if ($this->BatchNo->Required) {
			if (!$this->BatchNo->IsDetailKey && $this->BatchNo->FormValue != NULL && $this->BatchNo->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->BatchNo->caption(), $this->BatchNo->RequiredErrorMessage));
			}
		}
		if ($this->ExpDate->Required) {
			if (!$this->ExpDate->IsDetailKey && $this->ExpDate->FormValue != NULL && $this->ExpDate->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->ExpDate->caption(), $this->ExpDate->RequiredErrorMessage));
			}
		}
		if (!CheckEuroDate($this->ExpDate->FormValue)) {
			AddMessage($FormError, $this->ExpDate->errorMessage());
		}
		if ($this->HSN->Required) {
			if (!$this->HSN->IsDetailKey && $this->HSN->FormValue != NULL && $this->HSN->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->HSN->caption(), $this->HSN->RequiredErrorMessage));
			}
		}
		if ($this->MFRCODE->Required) {
			if (!$this->MFRCODE->IsDetailKey && $this->MFRCODE->FormValue != NULL && $this->MFRCODE->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->MFRCODE->caption(), $this->MFRCODE->RequiredErrorMessage));
			}
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
		if ($this->Pack->Required) {
			if (!$this->Pack->IsDetailKey && $this->Pack->FormValue != NULL && $this->Pack->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Pack->caption(), $this->Pack->RequiredErrorMessage));
			}
		}
		if ($this->GrnMRP->Required) {
			if (!$this->GrnMRP->IsDetailKey && $this->GrnMRP->FormValue != NULL && $this->GrnMRP->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->GrnMRP->caption(), $this->GrnMRP->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->GrnMRP->FormValue)) {
			AddMessage($FormError, $this->GrnMRP->errorMessage());
		}
		if ($this->MRP->Required) {
			if (!$this->MRP->IsDetailKey && $this->MRP->FormValue != NULL && $this->MRP->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->MRP->caption(), $this->MRP->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->MRP->FormValue)) {
			AddMessage($FormError, $this->MRP->errorMessage());
		}
		if ($this->PurValue->Required) {
			if (!$this->PurValue->IsDetailKey && $this->PurValue->FormValue != NULL && $this->PurValue->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PurValue->caption(), $this->PurValue->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->PurValue->FormValue)) {
			AddMessage($FormError, $this->PurValue->errorMessage());
		}
		if ($this->GRNPer->Required) {
			if (!$this->GRNPer->IsDetailKey && $this->GRNPer->FormValue != NULL && $this->GRNPer->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->GRNPer->caption(), $this->GRNPer->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->GRNPer->FormValue)) {
			AddMessage($FormError, $this->GRNPer->errorMessage());
		}
		if ($this->Disc->Required) {
			if (!$this->Disc->IsDetailKey && $this->Disc->FormValue != NULL && $this->Disc->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Disc->caption(), $this->Disc->RequiredErrorMessage));
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
		if ($this->PTax->Required) {
			if (!$this->PTax->IsDetailKey && $this->PTax->FormValue != NULL && $this->PTax->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PTax->caption(), $this->PTax->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->PTax->FormValue)) {
			AddMessage($FormError, $this->PTax->errorMessage());
		}
		if ($this->ItemValue->Required) {
			if (!$this->ItemValue->IsDetailKey && $this->ItemValue->FormValue != NULL && $this->ItemValue->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->ItemValue->caption(), $this->ItemValue->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->ItemValue->FormValue)) {
			AddMessage($FormError, $this->ItemValue->errorMessage());
		}
		if ($this->SalTax->Required) {
			if (!$this->SalTax->IsDetailKey && $this->SalTax->FormValue != NULL && $this->SalTax->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->SalTax->caption(), $this->SalTax->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->SalTax->FormValue)) {
			AddMessage($FormError, $this->SalTax->errorMessage());
		}
		if ($this->PurRate->Required) {
			if (!$this->PurRate->IsDetailKey && $this->PurRate->FormValue != NULL && $this->PurRate->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PurRate->caption(), $this->PurRate->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->PurRate->FormValue)) {
			AddMessage($FormError, $this->PurRate->errorMessage());
		}
		if ($this->SalRate->Required) {
			if (!$this->SalRate->IsDetailKey && $this->SalRate->FormValue != NULL && $this->SalRate->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->SalRate->caption(), $this->SalRate->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->SalRate->FormValue)) {
			AddMessage($FormError, $this->SalRate->errorMessage());
		}
		if ($this->Discount->Required) {
			if (!$this->Discount->IsDetailKey && $this->Discount->FormValue != NULL && $this->Discount->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Discount->caption(), $this->Discount->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->Discount->FormValue)) {
			AddMessage($FormError, $this->Discount->errorMessage());
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
		if ($this->BRCODE->Required) {
			if (!$this->BRCODE->IsDetailKey && $this->BRCODE->FormValue != NULL && $this->BRCODE->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->BRCODE->caption(), $this->BRCODE->RequiredErrorMessage));
			}
		}
		if ($this->trid->Required) {
			if (!$this->trid->IsDetailKey && $this->trid->FormValue != NULL && $this->trid->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->trid->caption(), $this->trid->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->trid->FormValue)) {
			AddMessage($FormError, $this->trid->errorMessage());
		}
		if ($this->HospID->Required) {
			if (!$this->HospID->IsDetailKey && $this->HospID->FormValue != NULL && $this->HospID->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->HospID->caption(), $this->HospID->RequiredErrorMessage));
			}
		}
		if ($this->CreatedBy->Required) {
			if (!$this->CreatedBy->IsDetailKey && $this->CreatedBy->FormValue != NULL && $this->CreatedBy->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->CreatedBy->caption(), $this->CreatedBy->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->CreatedBy->FormValue)) {
			AddMessage($FormError, $this->CreatedBy->errorMessage());
		}
		if ($this->CreatedDateTime->Required) {
			if (!$this->CreatedDateTime->IsDetailKey && $this->CreatedDateTime->FormValue != NULL && $this->CreatedDateTime->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->CreatedDateTime->caption(), $this->CreatedDateTime->RequiredErrorMessage));
			}
		}
		if (!CheckDate($this->CreatedDateTime->FormValue)) {
			AddMessage($FormError, $this->CreatedDateTime->errorMessage());
		}
		if ($this->ModifiedBy->Required) {
			if (!$this->ModifiedBy->IsDetailKey && $this->ModifiedBy->FormValue != NULL && $this->ModifiedBy->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->ModifiedBy->caption(), $this->ModifiedBy->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->ModifiedBy->FormValue)) {
			AddMessage($FormError, $this->ModifiedBy->errorMessage());
		}
		if ($this->ModifiedDateTime->Required) {
			if (!$this->ModifiedDateTime->IsDetailKey && $this->ModifiedDateTime->FormValue != NULL && $this->ModifiedDateTime->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->ModifiedDateTime->caption(), $this->ModifiedDateTime->RequiredErrorMessage));
			}
		}
		if (!CheckDate($this->ModifiedDateTime->FormValue)) {
			AddMessage($FormError, $this->ModifiedDateTime->errorMessage());
		}
		if ($this->grncreatedby->Required) {
			if (!$this->grncreatedby->IsDetailKey && $this->grncreatedby->FormValue != NULL && $this->grncreatedby->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->grncreatedby->caption(), $this->grncreatedby->RequiredErrorMessage));
			}
		}
		if ($this->grncreatedDateTime->Required) {
			if (!$this->grncreatedDateTime->IsDetailKey && $this->grncreatedDateTime->FormValue != NULL && $this->grncreatedDateTime->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->grncreatedDateTime->caption(), $this->grncreatedDateTime->RequiredErrorMessage));
			}
		}
		if ($this->grnModifiedby->Required) {
			if (!$this->grnModifiedby->IsDetailKey && $this->grnModifiedby->FormValue != NULL && $this->grnModifiedby->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->grnModifiedby->caption(), $this->grnModifiedby->RequiredErrorMessage));
			}
		}
		if ($this->grnModifiedDateTime->Required) {
			if (!$this->grnModifiedDateTime->IsDetailKey && $this->grnModifiedDateTime->FormValue != NULL && $this->grnModifiedDateTime->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->grnModifiedDateTime->caption(), $this->grnModifiedDateTime->RequiredErrorMessage));
			}
		}
		if ($this->Received->Required) {
			if (!$this->Received->IsDetailKey && $this->Received->FormValue != NULL && $this->Received->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Received->caption(), $this->Received->RequiredErrorMessage));
			}
		}
		if ($this->BillDate->Required) {
			if (!$this->BillDate->IsDetailKey && $this->BillDate->FormValue != NULL && $this->BillDate->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->BillDate->caption(), $this->BillDate->RequiredErrorMessage));
			}
		}
		if (!CheckDate($this->BillDate->FormValue)) {
			AddMessage($FormError, $this->BillDate->errorMessage());
		}
		if ($this->grndate->Required) {
			if (!$this->grndate->IsDetailKey && $this->grndate->FormValue != NULL && $this->grndate->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->grndate->caption(), $this->grndate->RequiredErrorMessage));
			}
		}
		if ($this->grndatetime->Required) {
			if (!$this->grndatetime->IsDetailKey && $this->grndatetime->FormValue != NULL && $this->grndatetime->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->grndatetime->caption(), $this->grndatetime->RequiredErrorMessage));
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

		// ORDNO
		$this->ORDNO->setDbValueDef($rsnew, $this->ORDNO->CurrentValue, NULL, FALSE);

		// PRC
		$this->PRC->setDbValueDef($rsnew, $this->PRC->CurrentValue, NULL, FALSE);

		// QTY
		$this->QTY->setDbValueDef($rsnew, $this->QTY->CurrentValue, NULL, FALSE);

		// DT
		$this->DT->setDbValueDef($rsnew, UnFormatDateTime($this->DT->CurrentValue, 0), NULL, FALSE);

		// PC
		$this->PC->setDbValueDef($rsnew, $this->PC->CurrentValue, NULL, FALSE);

		// YM
		$this->YM->setDbValueDef($rsnew, $this->YM->CurrentValue, NULL, FALSE);

		// Stock
		$this->Stock->setDbValueDef($rsnew, $this->Stock->CurrentValue, NULL, FALSE);

		// LastMonthSale
		$this->LastMonthSale->setDbValueDef($rsnew, $this->LastMonthSale->CurrentValue, NULL, FALSE);

		// Printcheck
		$this->Printcheck->setDbValueDef($rsnew, $this->Printcheck->CurrentValue, NULL, FALSE);

		// poid
		$this->poid->setDbValueDef($rsnew, $this->poid->CurrentValue, NULL, FALSE);

		// PrName
		$this->PrName->setDbValueDef($rsnew, $this->PrName->CurrentValue, NULL, FALSE);

		// grnid
		$this->grnid->setDbValueDef($rsnew, $this->grnid->CurrentValue, NULL, FALSE);

		// GrnQuantity
		$this->GrnQuantity->setDbValueDef($rsnew, $this->GrnQuantity->CurrentValue, NULL, FALSE);

		// Quantity
		$this->Quantity->setDbValueDef($rsnew, $this->Quantity->CurrentValue, NULL, FALSE);

		// FreeQty
		$this->FreeQty->setDbValueDef($rsnew, $this->FreeQty->CurrentValue, NULL, FALSE);

		// FreeQtyyy
		$this->FreeQtyyy->setDbValueDef($rsnew, $this->FreeQtyyy->CurrentValue, NULL, FALSE);

		// BatchNo
		$this->BatchNo->setDbValueDef($rsnew, $this->BatchNo->CurrentValue, NULL, FALSE);

		// ExpDate
		$this->ExpDate->setDbValueDef($rsnew, UnFormatDateTime($this->ExpDate->CurrentValue, 7), NULL, FALSE);

		// HSN
		$this->HSN->setDbValueDef($rsnew, $this->HSN->CurrentValue, NULL, FALSE);

		// MFRCODE
		$this->MFRCODE->setDbValueDef($rsnew, $this->MFRCODE->CurrentValue, NULL, FALSE);

		// PUnit
		$this->PUnit->setDbValueDef($rsnew, $this->PUnit->CurrentValue, NULL, strval($this->PUnit->CurrentValue) == "");

		// SUnit
		$this->SUnit->setDbValueDef($rsnew, $this->SUnit->CurrentValue, NULL, strval($this->SUnit->CurrentValue) == "");

		// Pack
		$this->Pack->setDbValueDef($rsnew, $this->Pack->CurrentValue, NULL, FALSE);

		// GrnMRP
		$this->GrnMRP->setDbValueDef($rsnew, $this->GrnMRP->CurrentValue, NULL, FALSE);

		// MRP
		$this->MRP->setDbValueDef($rsnew, $this->MRP->CurrentValue, NULL, FALSE);

		// PurValue
		$this->PurValue->setDbValueDef($rsnew, $this->PurValue->CurrentValue, NULL, FALSE);

		// GRNPer
		$this->GRNPer->setDbValueDef($rsnew, $this->GRNPer->CurrentValue, NULL, FALSE);

		// Disc
		$this->Disc->setDbValueDef($rsnew, $this->Disc->CurrentValue, NULL, FALSE);

		// PSGST
		$this->PSGST->setDbValueDef($rsnew, $this->PSGST->CurrentValue, NULL, FALSE);

		// PCGST
		$this->PCGST->setDbValueDef($rsnew, $this->PCGST->CurrentValue, NULL, FALSE);

		// PTax
		$this->PTax->setDbValueDef($rsnew, $this->PTax->CurrentValue, NULL, FALSE);

		// ItemValue
		$this->ItemValue->setDbValueDef($rsnew, $this->ItemValue->CurrentValue, NULL, FALSE);

		// SalTax
		$this->SalTax->setDbValueDef($rsnew, $this->SalTax->CurrentValue, NULL, FALSE);

		// PurRate
		$this->PurRate->setDbValueDef($rsnew, $this->PurRate->CurrentValue, NULL, FALSE);

		// SalRate
		$this->SalRate->setDbValueDef($rsnew, $this->SalRate->CurrentValue, NULL, FALSE);

		// Discount
		$this->Discount->setDbValueDef($rsnew, $this->Discount->CurrentValue, NULL, FALSE);

		// SSGST
		$this->SSGST->setDbValueDef($rsnew, $this->SSGST->CurrentValue, NULL, FALSE);

		// SCGST
		$this->SCGST->setDbValueDef($rsnew, $this->SCGST->CurrentValue, NULL, FALSE);

		// BRCODE
		$this->BRCODE->setDbValueDef($rsnew, PharmacyID(), NULL);
		$rsnew['BRCODE'] = &$this->BRCODE->DbValue;

		// trid
		$this->trid->setDbValueDef($rsnew, $this->trid->CurrentValue, NULL, FALSE);

		// HospID
		$this->HospID->setDbValueDef($rsnew, HospitalID(), NULL);
		$rsnew['HospID'] = &$this->HospID->DbValue;

		// CreatedBy
		$this->CreatedBy->setDbValueDef($rsnew, $this->CreatedBy->CurrentValue, NULL, FALSE);

		// CreatedDateTime
		$this->CreatedDateTime->setDbValueDef($rsnew, UnFormatDateTime($this->CreatedDateTime->CurrentValue, 0), NULL, FALSE);

		// ModifiedBy
		$this->ModifiedBy->setDbValueDef($rsnew, $this->ModifiedBy->CurrentValue, NULL, FALSE);

		// ModifiedDateTime
		$this->ModifiedDateTime->setDbValueDef($rsnew, UnFormatDateTime($this->ModifiedDateTime->CurrentValue, 0), NULL, FALSE);

		// grncreatedby
		$this->grncreatedby->setDbValueDef($rsnew, CurrentUserID(), NULL);
		$rsnew['grncreatedby'] = &$this->grncreatedby->DbValue;

		// grncreatedDateTime
		$this->grncreatedDateTime->setDbValueDef($rsnew, CurrentDateTime(), NULL);
		$rsnew['grncreatedDateTime'] = &$this->grncreatedDateTime->DbValue;

		// grnModifiedby
		$this->grnModifiedby->setDbValueDef($rsnew, CurrentUserID(), NULL);
		$rsnew['grnModifiedby'] = &$this->grnModifiedby->DbValue;

		// grnModifiedDateTime
		$this->grnModifiedDateTime->setDbValueDef($rsnew, CurrentDateTime(), NULL);
		$rsnew['grnModifiedDateTime'] = &$this->grnModifiedDateTime->DbValue;

		// Received
		$this->Received->setDbValueDef($rsnew, $this->Received->CurrentValue, NULL, FALSE);

		// BillDate
		$this->BillDate->setDbValueDef($rsnew, UnFormatDateTime($this->BillDate->CurrentValue, 0), NULL, FALSE);

		// grndate
		$this->grndate->setDbValueDef($rsnew, CurrentDate(), NULL);
		$rsnew['grndate'] = &$this->grndate->DbValue;

		// grndatetime
		$this->grndatetime->setDbValueDef($rsnew, CurrentDateTime(), NULL);
		$rsnew['grndatetime'] = &$this->grndatetime->DbValue;

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
			if ($masterTblVar == "pharmacy_grn") {
				$validMaster = TRUE;
				if (Get("fk_id") !== NULL) {
					$this->grnid->setQueryStringValue(Get("fk_id"));
					$this->grnid->setSessionValue($this->grnid->QueryStringValue);
					if (!is_numeric($this->grnid->QueryStringValue))
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
			if ($masterTblVar == "pharmacy_grn") {
				$validMaster = TRUE;
				if (Post("fk_id") !== NULL) {
					$this->grnid->setFormValue(Post("fk_id"));
					$this->grnid->setSessionValue($this->grnid->FormValue);
					if (!is_numeric($this->grnid->FormValue))
						$validMaster = FALSE;
				} else {
					$validMaster = FALSE;
				}
			}
		}
		if ($validMaster) {

			// Save current master table
			$this->setCurrentMasterTable($masterTblVar);

			// Reset start record counter (new master key)
			if (!$this->isAddOrEdit()) {
				$this->StartRec = 1;
				$this->setStartRecordNumber($this->StartRec);
			}

			// Clear previous master key from Session
			if ($masterTblVar <> "pharmacy_grn") {
				if ($this->grnid->CurrentValue == "")
					$this->grnid->setSessionValue("");
			}
		}
		$this->DbMasterFilter = $this->getMasterFilter(); // Get master filter
		$this->DbDetailFilter = $this->getDetailFilter(); // Get detail filter
	}

	// Set up Breadcrumb
	protected function setupBreadcrumb()
	{
		global $Breadcrumb, $Language;
		$Breadcrumb = new Breadcrumb();
		$url = substr(CurrentUrl(), strrpos(CurrentUrl(), "/")+1);
		$Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("view_pharmacygrnlist.php"), "", $this->TableVar, TRUE);
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
				case "x_PrName":
					$lookupFilter = function() {
						return "`BRCODE`='".PharmacyID()."'  and  `HospID` = '".HospitalID()."'";
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
						case "x_PrName":
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
<?php
namespace PHPMaker2019\HIMS;

/**
 * Page class
 */
class pharmacy_stock_movement_edit extends pharmacy_stock_movement
{

	// Page ID
	public $PageID = "edit";

	// Project ID
	public $ProjectID = "{EA4F6D13-AF8F-428D-9EA7-BA88D1107EC3}";

	// Table name
	public $TableName = 'pharmacy_stock_movement';

	// Page object name
	public $PageObjName = "pharmacy_stock_movement_edit";

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

		// Table object (pharmacy_stock_movement)
		if (!isset($GLOBALS["pharmacy_stock_movement"]) || get_class($GLOBALS["pharmacy_stock_movement"]) == PROJECT_NAMESPACE . "pharmacy_stock_movement") {
			$GLOBALS["pharmacy_stock_movement"] = &$this;
			$GLOBALS["Table"] = &$GLOBALS["pharmacy_stock_movement"];
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
			define(PROJECT_NAMESPACE . "TABLE_NAME", 'pharmacy_stock_movement');

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
		global $EXPORT, $pharmacy_stock_movement;
		if ($this->CustomExport && $this->CustomExport == $this->Export && array_key_exists($this->CustomExport, $EXPORT)) {
				$content = ob_get_contents();
			if ($ExportFileName == "")
				$ExportFileName = $this->TableVar;
			$class = PROJECT_NAMESPACE . $EXPORT[$this->CustomExport];
			if (class_exists($class)) {
				$doc = new $class($pharmacy_stock_movement);
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
					if ($pageName == "pharmacy_stock_movementview.php")
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
					$this->terminate(GetUrl("pharmacy_stock_movementlist.php"));
				else
					$this->terminate(GetUrl("login.php"));
				return;
			}
		}

		// Create form object
		$CurrentForm = new HttpForm();
		$this->CurrentAction = Param("action"); // Set up current action
		$this->id->setVisibility();
		$this->PRC->setVisibility();
		$this->PrName->setVisibility();
		$this->BATCHNO->setVisibility();
		$this->OpeningStk->setVisibility();
		$this->PurchaseQty->setVisibility();
		$this->SalesQty->setVisibility();
		$this->ClosingStk->setVisibility();
		$this->PurchasefreeQty->setVisibility();
		$this->TransferingQty->setVisibility();
		$this->UnitPurchaseRate->setVisibility();
		$this->UnitSaleRate->setVisibility();
		$this->CreatedDate->setVisibility();
		$this->OQ->setVisibility();
		$this->RQ->setVisibility();
		$this->MRQ->setVisibility();
		$this->IQ->setVisibility();
		$this->MRP->setVisibility();
		$this->EXPDT->setVisibility();
		$this->UR->setVisibility();
		$this->RT->setVisibility();
		$this->PRCODE->setVisibility();
		$this->BATCH->setVisibility();
		$this->PC->setVisibility();
		$this->OLDRT->setVisibility();
		$this->TEMPMRQ->setVisibility();
		$this->TAXP->setVisibility();
		$this->OLDRATE->setVisibility();
		$this->NEWRATE->setVisibility();
		$this->OTEMPMRA->setVisibility();
		$this->ACTIVESTATUS->setVisibility();
		$this->PSGST->setVisibility();
		$this->PCGST->setVisibility();
		$this->SSGST->setVisibility();
		$this->SCGST->setVisibility();
		$this->MFRCODE->setVisibility();
		$this->BRCODE->setVisibility();
		$this->FRQ->setVisibility();
		$this->HospID->setVisibility();
		$this->UM->setVisibility();
		$this->GENNAME->setVisibility();
		$this->BILLDATE->setVisibility();
		$this->CreatedDateTime->setVisibility();
		$this->baid->setVisibility();
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
					$this->terminate("pharmacy_stock_movementlist.php"); // No matching record, return to list
				}
				break;
			case "update": // Update
				$returnUrl = $this->getReturnUrl();
				if (GetPageName($returnUrl) == "pharmacy_stock_movementlist.php")
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

		// Check field name 'id' first before field var 'x_id'
		$val = $CurrentForm->hasValue("id") ? $CurrentForm->getValue("id") : $CurrentForm->getValue("x_id");
		if (!$this->id->IsDetailKey)
			$this->id->setFormValue($val);

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

		// Check field name 'OpeningStk' first before field var 'x_OpeningStk'
		$val = $CurrentForm->hasValue("OpeningStk") ? $CurrentForm->getValue("OpeningStk") : $CurrentForm->getValue("x_OpeningStk");
		if (!$this->OpeningStk->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->OpeningStk->Visible = FALSE; // Disable update for API request
			else
				$this->OpeningStk->setFormValue($val);
		}

		// Check field name 'PurchaseQty' first before field var 'x_PurchaseQty'
		$val = $CurrentForm->hasValue("PurchaseQty") ? $CurrentForm->getValue("PurchaseQty") : $CurrentForm->getValue("x_PurchaseQty");
		if (!$this->PurchaseQty->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->PurchaseQty->Visible = FALSE; // Disable update for API request
			else
				$this->PurchaseQty->setFormValue($val);
		}

		// Check field name 'SalesQty' first before field var 'x_SalesQty'
		$val = $CurrentForm->hasValue("SalesQty") ? $CurrentForm->getValue("SalesQty") : $CurrentForm->getValue("x_SalesQty");
		if (!$this->SalesQty->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->SalesQty->Visible = FALSE; // Disable update for API request
			else
				$this->SalesQty->setFormValue($val);
		}

		// Check field name 'ClosingStk' first before field var 'x_ClosingStk'
		$val = $CurrentForm->hasValue("ClosingStk") ? $CurrentForm->getValue("ClosingStk") : $CurrentForm->getValue("x_ClosingStk");
		if (!$this->ClosingStk->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->ClosingStk->Visible = FALSE; // Disable update for API request
			else
				$this->ClosingStk->setFormValue($val);
		}

		// Check field name 'PurchasefreeQty' first before field var 'x_PurchasefreeQty'
		$val = $CurrentForm->hasValue("PurchasefreeQty") ? $CurrentForm->getValue("PurchasefreeQty") : $CurrentForm->getValue("x_PurchasefreeQty");
		if (!$this->PurchasefreeQty->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->PurchasefreeQty->Visible = FALSE; // Disable update for API request
			else
				$this->PurchasefreeQty->setFormValue($val);
		}

		// Check field name 'TransferingQty' first before field var 'x_TransferingQty'
		$val = $CurrentForm->hasValue("TransferingQty") ? $CurrentForm->getValue("TransferingQty") : $CurrentForm->getValue("x_TransferingQty");
		if (!$this->TransferingQty->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->TransferingQty->Visible = FALSE; // Disable update for API request
			else
				$this->TransferingQty->setFormValue($val);
		}

		// Check field name 'UnitPurchaseRate' first before field var 'x_UnitPurchaseRate'
		$val = $CurrentForm->hasValue("UnitPurchaseRate") ? $CurrentForm->getValue("UnitPurchaseRate") : $CurrentForm->getValue("x_UnitPurchaseRate");
		if (!$this->UnitPurchaseRate->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->UnitPurchaseRate->Visible = FALSE; // Disable update for API request
			else
				$this->UnitPurchaseRate->setFormValue($val);
		}

		// Check field name 'UnitSaleRate' first before field var 'x_UnitSaleRate'
		$val = $CurrentForm->hasValue("UnitSaleRate") ? $CurrentForm->getValue("UnitSaleRate") : $CurrentForm->getValue("x_UnitSaleRate");
		if (!$this->UnitSaleRate->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->UnitSaleRate->Visible = FALSE; // Disable update for API request
			else
				$this->UnitSaleRate->setFormValue($val);
		}

		// Check field name 'CreatedDate' first before field var 'x_CreatedDate'
		$val = $CurrentForm->hasValue("CreatedDate") ? $CurrentForm->getValue("CreatedDate") : $CurrentForm->getValue("x_CreatedDate");
		if (!$this->CreatedDate->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->CreatedDate->Visible = FALSE; // Disable update for API request
			else
				$this->CreatedDate->setFormValue($val);
			$this->CreatedDate->CurrentValue = UnFormatDateTime($this->CreatedDate->CurrentValue, 0);
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

		// Check field name 'MRQ' first before field var 'x_MRQ'
		$val = $CurrentForm->hasValue("MRQ") ? $CurrentForm->getValue("MRQ") : $CurrentForm->getValue("x_MRQ");
		if (!$this->MRQ->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->MRQ->Visible = FALSE; // Disable update for API request
			else
				$this->MRQ->setFormValue($val);
		}

		// Check field name 'IQ' first before field var 'x_IQ'
		$val = $CurrentForm->hasValue("IQ") ? $CurrentForm->getValue("IQ") : $CurrentForm->getValue("x_IQ");
		if (!$this->IQ->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->IQ->Visible = FALSE; // Disable update for API request
			else
				$this->IQ->setFormValue($val);
		}

		// Check field name 'MRP' first before field var 'x_MRP'
		$val = $CurrentForm->hasValue("MRP") ? $CurrentForm->getValue("MRP") : $CurrentForm->getValue("x_MRP");
		if (!$this->MRP->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->MRP->Visible = FALSE; // Disable update for API request
			else
				$this->MRP->setFormValue($val);
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

		// Check field name 'UR' first before field var 'x_UR'
		$val = $CurrentForm->hasValue("UR") ? $CurrentForm->getValue("UR") : $CurrentForm->getValue("x_UR");
		if (!$this->UR->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->UR->Visible = FALSE; // Disable update for API request
			else
				$this->UR->setFormValue($val);
		}

		// Check field name 'RT' first before field var 'x_RT'
		$val = $CurrentForm->hasValue("RT") ? $CurrentForm->getValue("RT") : $CurrentForm->getValue("x_RT");
		if (!$this->RT->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->RT->Visible = FALSE; // Disable update for API request
			else
				$this->RT->setFormValue($val);
		}

		// Check field name 'PRCODE' first before field var 'x_PRCODE'
		$val = $CurrentForm->hasValue("PRCODE") ? $CurrentForm->getValue("PRCODE") : $CurrentForm->getValue("x_PRCODE");
		if (!$this->PRCODE->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->PRCODE->Visible = FALSE; // Disable update for API request
			else
				$this->PRCODE->setFormValue($val);
		}

		// Check field name 'BATCH' first before field var 'x_BATCH'
		$val = $CurrentForm->hasValue("BATCH") ? $CurrentForm->getValue("BATCH") : $CurrentForm->getValue("x_BATCH");
		if (!$this->BATCH->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->BATCH->Visible = FALSE; // Disable update for API request
			else
				$this->BATCH->setFormValue($val);
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

		// Check field name 'MFRCODE' first before field var 'x_MFRCODE'
		$val = $CurrentForm->hasValue("MFRCODE") ? $CurrentForm->getValue("MFRCODE") : $CurrentForm->getValue("x_MFRCODE");
		if (!$this->MFRCODE->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->MFRCODE->Visible = FALSE; // Disable update for API request
			else
				$this->MFRCODE->setFormValue($val);
		}

		// Check field name 'BRCODE' first before field var 'x_BRCODE'
		$val = $CurrentForm->hasValue("BRCODE") ? $CurrentForm->getValue("BRCODE") : $CurrentForm->getValue("x_BRCODE");
		if (!$this->BRCODE->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->BRCODE->Visible = FALSE; // Disable update for API request
			else
				$this->BRCODE->setFormValue($val);
		}

		// Check field name 'FRQ' first before field var 'x_FRQ'
		$val = $CurrentForm->hasValue("FRQ") ? $CurrentForm->getValue("FRQ") : $CurrentForm->getValue("x_FRQ");
		if (!$this->FRQ->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->FRQ->Visible = FALSE; // Disable update for API request
			else
				$this->FRQ->setFormValue($val);
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

		// Check field name 'CreatedDateTime' first before field var 'x_CreatedDateTime'
		$val = $CurrentForm->hasValue("CreatedDateTime") ? $CurrentForm->getValue("CreatedDateTime") : $CurrentForm->getValue("x_CreatedDateTime");
		if (!$this->CreatedDateTime->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->CreatedDateTime->Visible = FALSE; // Disable update for API request
			else
				$this->CreatedDateTime->setFormValue($val);
			$this->CreatedDateTime->CurrentValue = UnFormatDateTime($this->CreatedDateTime->CurrentValue, 0);
		}

		// Check field name 'baid' first before field var 'x_baid'
		$val = $CurrentForm->hasValue("baid") ? $CurrentForm->getValue("baid") : $CurrentForm->getValue("x_baid");
		if (!$this->baid->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->baid->Visible = FALSE; // Disable update for API request
			else
				$this->baid->setFormValue($val);
		}
	}

	// Restore form values
	public function restoreFormValues()
	{
		global $CurrentForm;
		$this->id->CurrentValue = $this->id->FormValue;
		$this->PRC->CurrentValue = $this->PRC->FormValue;
		$this->PrName->CurrentValue = $this->PrName->FormValue;
		$this->BATCHNO->CurrentValue = $this->BATCHNO->FormValue;
		$this->OpeningStk->CurrentValue = $this->OpeningStk->FormValue;
		$this->PurchaseQty->CurrentValue = $this->PurchaseQty->FormValue;
		$this->SalesQty->CurrentValue = $this->SalesQty->FormValue;
		$this->ClosingStk->CurrentValue = $this->ClosingStk->FormValue;
		$this->PurchasefreeQty->CurrentValue = $this->PurchasefreeQty->FormValue;
		$this->TransferingQty->CurrentValue = $this->TransferingQty->FormValue;
		$this->UnitPurchaseRate->CurrentValue = $this->UnitPurchaseRate->FormValue;
		$this->UnitSaleRate->CurrentValue = $this->UnitSaleRate->FormValue;
		$this->CreatedDate->CurrentValue = $this->CreatedDate->FormValue;
		$this->CreatedDate->CurrentValue = UnFormatDateTime($this->CreatedDate->CurrentValue, 0);
		$this->OQ->CurrentValue = $this->OQ->FormValue;
		$this->RQ->CurrentValue = $this->RQ->FormValue;
		$this->MRQ->CurrentValue = $this->MRQ->FormValue;
		$this->IQ->CurrentValue = $this->IQ->FormValue;
		$this->MRP->CurrentValue = $this->MRP->FormValue;
		$this->EXPDT->CurrentValue = $this->EXPDT->FormValue;
		$this->EXPDT->CurrentValue = UnFormatDateTime($this->EXPDT->CurrentValue, 0);
		$this->UR->CurrentValue = $this->UR->FormValue;
		$this->RT->CurrentValue = $this->RT->FormValue;
		$this->PRCODE->CurrentValue = $this->PRCODE->FormValue;
		$this->BATCH->CurrentValue = $this->BATCH->FormValue;
		$this->PC->CurrentValue = $this->PC->FormValue;
		$this->OLDRT->CurrentValue = $this->OLDRT->FormValue;
		$this->TEMPMRQ->CurrentValue = $this->TEMPMRQ->FormValue;
		$this->TAXP->CurrentValue = $this->TAXP->FormValue;
		$this->OLDRATE->CurrentValue = $this->OLDRATE->FormValue;
		$this->NEWRATE->CurrentValue = $this->NEWRATE->FormValue;
		$this->OTEMPMRA->CurrentValue = $this->OTEMPMRA->FormValue;
		$this->ACTIVESTATUS->CurrentValue = $this->ACTIVESTATUS->FormValue;
		$this->PSGST->CurrentValue = $this->PSGST->FormValue;
		$this->PCGST->CurrentValue = $this->PCGST->FormValue;
		$this->SSGST->CurrentValue = $this->SSGST->FormValue;
		$this->SCGST->CurrentValue = $this->SCGST->FormValue;
		$this->MFRCODE->CurrentValue = $this->MFRCODE->FormValue;
		$this->BRCODE->CurrentValue = $this->BRCODE->FormValue;
		$this->FRQ->CurrentValue = $this->FRQ->FormValue;
		$this->HospID->CurrentValue = $this->HospID->FormValue;
		$this->UM->CurrentValue = $this->UM->FormValue;
		$this->GENNAME->CurrentValue = $this->GENNAME->FormValue;
		$this->BILLDATE->CurrentValue = $this->BILLDATE->FormValue;
		$this->BILLDATE->CurrentValue = UnFormatDateTime($this->BILLDATE->CurrentValue, 0);
		$this->CreatedDateTime->CurrentValue = $this->CreatedDateTime->FormValue;
		$this->CreatedDateTime->CurrentValue = UnFormatDateTime($this->CreatedDateTime->CurrentValue, 0);
		$this->baid->CurrentValue = $this->baid->FormValue;
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
		$this->PRC->setDbValue($row['PRC']);
		$this->PrName->setDbValue($row['PrName']);
		$this->BATCHNO->setDbValue($row['BATCHNO']);
		$this->OpeningStk->setDbValue($row['OpeningStk']);
		$this->PurchaseQty->setDbValue($row['PurchaseQty']);
		$this->SalesQty->setDbValue($row['SalesQty']);
		$this->ClosingStk->setDbValue($row['ClosingStk']);
		$this->PurchasefreeQty->setDbValue($row['PurchasefreeQty']);
		$this->TransferingQty->setDbValue($row['TransferingQty']);
		$this->UnitPurchaseRate->setDbValue($row['UnitPurchaseRate']);
		$this->UnitSaleRate->setDbValue($row['UnitSaleRate']);
		$this->CreatedDate->setDbValue($row['CreatedDate']);
		$this->OQ->setDbValue($row['OQ']);
		$this->RQ->setDbValue($row['RQ']);
		$this->MRQ->setDbValue($row['MRQ']);
		$this->IQ->setDbValue($row['IQ']);
		$this->MRP->setDbValue($row['MRP']);
		$this->EXPDT->setDbValue($row['EXPDT']);
		$this->UR->setDbValue($row['UR']);
		$this->RT->setDbValue($row['RT']);
		$this->PRCODE->setDbValue($row['PRCODE']);
		$this->BATCH->setDbValue($row['BATCH']);
		$this->PC->setDbValue($row['PC']);
		$this->OLDRT->setDbValue($row['OLDRT']);
		$this->TEMPMRQ->setDbValue($row['TEMPMRQ']);
		$this->TAXP->setDbValue($row['TAXP']);
		$this->OLDRATE->setDbValue($row['OLDRATE']);
		$this->NEWRATE->setDbValue($row['NEWRATE']);
		$this->OTEMPMRA->setDbValue($row['OTEMPMRA']);
		$this->ACTIVESTATUS->setDbValue($row['ACTIVESTATUS']);
		$this->PSGST->setDbValue($row['PSGST']);
		$this->PCGST->setDbValue($row['PCGST']);
		$this->SSGST->setDbValue($row['SSGST']);
		$this->SCGST->setDbValue($row['SCGST']);
		$this->MFRCODE->setDbValue($row['MFRCODE']);
		$this->BRCODE->setDbValue($row['BRCODE']);
		$this->FRQ->setDbValue($row['FRQ']);
		$this->HospID->setDbValue($row['HospID']);
		$this->UM->setDbValue($row['UM']);
		$this->GENNAME->setDbValue($row['GENNAME']);
		$this->BILLDATE->setDbValue($row['BILLDATE']);
		$this->CreatedDateTime->setDbValue($row['CreatedDateTime']);
		$this->baid->setDbValue($row['baid']);
	}

	// Return a row with default values
	protected function newRow()
	{
		$row = [];
		$row['id'] = NULL;
		$row['PRC'] = NULL;
		$row['PrName'] = NULL;
		$row['BATCHNO'] = NULL;
		$row['OpeningStk'] = NULL;
		$row['PurchaseQty'] = NULL;
		$row['SalesQty'] = NULL;
		$row['ClosingStk'] = NULL;
		$row['PurchasefreeQty'] = NULL;
		$row['TransferingQty'] = NULL;
		$row['UnitPurchaseRate'] = NULL;
		$row['UnitSaleRate'] = NULL;
		$row['CreatedDate'] = NULL;
		$row['OQ'] = NULL;
		$row['RQ'] = NULL;
		$row['MRQ'] = NULL;
		$row['IQ'] = NULL;
		$row['MRP'] = NULL;
		$row['EXPDT'] = NULL;
		$row['UR'] = NULL;
		$row['RT'] = NULL;
		$row['PRCODE'] = NULL;
		$row['BATCH'] = NULL;
		$row['PC'] = NULL;
		$row['OLDRT'] = NULL;
		$row['TEMPMRQ'] = NULL;
		$row['TAXP'] = NULL;
		$row['OLDRATE'] = NULL;
		$row['NEWRATE'] = NULL;
		$row['OTEMPMRA'] = NULL;
		$row['ACTIVESTATUS'] = NULL;
		$row['PSGST'] = NULL;
		$row['PCGST'] = NULL;
		$row['SSGST'] = NULL;
		$row['SCGST'] = NULL;
		$row['MFRCODE'] = NULL;
		$row['BRCODE'] = NULL;
		$row['FRQ'] = NULL;
		$row['HospID'] = NULL;
		$row['UM'] = NULL;
		$row['GENNAME'] = NULL;
		$row['BILLDATE'] = NULL;
		$row['CreatedDateTime'] = NULL;
		$row['baid'] = NULL;
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

		if ($this->OpeningStk->FormValue == $this->OpeningStk->CurrentValue && is_numeric(ConvertToFloatString($this->OpeningStk->CurrentValue)))
			$this->OpeningStk->CurrentValue = ConvertToFloatString($this->OpeningStk->CurrentValue);

		// Convert decimal values if posted back
		if ($this->PurchaseQty->FormValue == $this->PurchaseQty->CurrentValue && is_numeric(ConvertToFloatString($this->PurchaseQty->CurrentValue)))
			$this->PurchaseQty->CurrentValue = ConvertToFloatString($this->PurchaseQty->CurrentValue);

		// Convert decimal values if posted back
		if ($this->SalesQty->FormValue == $this->SalesQty->CurrentValue && is_numeric(ConvertToFloatString($this->SalesQty->CurrentValue)))
			$this->SalesQty->CurrentValue = ConvertToFloatString($this->SalesQty->CurrentValue);

		// Convert decimal values if posted back
		if ($this->ClosingStk->FormValue == $this->ClosingStk->CurrentValue && is_numeric(ConvertToFloatString($this->ClosingStk->CurrentValue)))
			$this->ClosingStk->CurrentValue = ConvertToFloatString($this->ClosingStk->CurrentValue);

		// Convert decimal values if posted back
		if ($this->PurchasefreeQty->FormValue == $this->PurchasefreeQty->CurrentValue && is_numeric(ConvertToFloatString($this->PurchasefreeQty->CurrentValue)))
			$this->PurchasefreeQty->CurrentValue = ConvertToFloatString($this->PurchasefreeQty->CurrentValue);

		// Convert decimal values if posted back
		if ($this->TransferingQty->FormValue == $this->TransferingQty->CurrentValue && is_numeric(ConvertToFloatString($this->TransferingQty->CurrentValue)))
			$this->TransferingQty->CurrentValue = ConvertToFloatString($this->TransferingQty->CurrentValue);

		// Convert decimal values if posted back
		if ($this->UnitPurchaseRate->FormValue == $this->UnitPurchaseRate->CurrentValue && is_numeric(ConvertToFloatString($this->UnitPurchaseRate->CurrentValue)))
			$this->UnitPurchaseRate->CurrentValue = ConvertToFloatString($this->UnitPurchaseRate->CurrentValue);

		// Convert decimal values if posted back
		if ($this->UnitSaleRate->FormValue == $this->UnitSaleRate->CurrentValue && is_numeric(ConvertToFloatString($this->UnitSaleRate->CurrentValue)))
			$this->UnitSaleRate->CurrentValue = ConvertToFloatString($this->UnitSaleRate->CurrentValue);

		// Convert decimal values if posted back
		if ($this->OQ->FormValue == $this->OQ->CurrentValue && is_numeric(ConvertToFloatString($this->OQ->CurrentValue)))
			$this->OQ->CurrentValue = ConvertToFloatString($this->OQ->CurrentValue);

		// Convert decimal values if posted back
		if ($this->RQ->FormValue == $this->RQ->CurrentValue && is_numeric(ConvertToFloatString($this->RQ->CurrentValue)))
			$this->RQ->CurrentValue = ConvertToFloatString($this->RQ->CurrentValue);

		// Convert decimal values if posted back
		if ($this->MRQ->FormValue == $this->MRQ->CurrentValue && is_numeric(ConvertToFloatString($this->MRQ->CurrentValue)))
			$this->MRQ->CurrentValue = ConvertToFloatString($this->MRQ->CurrentValue);

		// Convert decimal values if posted back
		if ($this->IQ->FormValue == $this->IQ->CurrentValue && is_numeric(ConvertToFloatString($this->IQ->CurrentValue)))
			$this->IQ->CurrentValue = ConvertToFloatString($this->IQ->CurrentValue);

		// Convert decimal values if posted back
		if ($this->MRP->FormValue == $this->MRP->CurrentValue && is_numeric(ConvertToFloatString($this->MRP->CurrentValue)))
			$this->MRP->CurrentValue = ConvertToFloatString($this->MRP->CurrentValue);

		// Convert decimal values if posted back
		if ($this->UR->FormValue == $this->UR->CurrentValue && is_numeric(ConvertToFloatString($this->UR->CurrentValue)))
			$this->UR->CurrentValue = ConvertToFloatString($this->UR->CurrentValue);

		// Convert decimal values if posted back
		if ($this->RT->FormValue == $this->RT->CurrentValue && is_numeric(ConvertToFloatString($this->RT->CurrentValue)))
			$this->RT->CurrentValue = ConvertToFloatString($this->RT->CurrentValue);

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
		if ($this->FRQ->FormValue == $this->FRQ->CurrentValue && is_numeric(ConvertToFloatString($this->FRQ->CurrentValue)))
			$this->FRQ->CurrentValue = ConvertToFloatString($this->FRQ->CurrentValue);

		// Call Row_Rendering event
		$this->Row_Rendering();

		// Common render codes for all row types
		// id
		// PRC
		// PrName
		// BATCHNO
		// OpeningStk
		// PurchaseQty
		// SalesQty
		// ClosingStk
		// PurchasefreeQty
		// TransferingQty
		// UnitPurchaseRate
		// UnitSaleRate
		// CreatedDate
		// OQ
		// RQ
		// MRQ
		// IQ
		// MRP
		// EXPDT
		// UR
		// RT
		// PRCODE
		// BATCH
		// PC
		// OLDRT
		// TEMPMRQ
		// TAXP
		// OLDRATE
		// NEWRATE
		// OTEMPMRA
		// ACTIVESTATUS
		// PSGST
		// PCGST
		// SSGST
		// SCGST
		// MFRCODE
		// BRCODE
		// FRQ
		// HospID
		// UM
		// GENNAME
		// BILLDATE
		// CreatedDateTime
		// baid

		if ($this->RowType == ROWTYPE_VIEW) { // View row

			// id
			$this->id->ViewValue = $this->id->CurrentValue;
			$this->id->ViewCustomAttributes = "";

			// PRC
			$this->PRC->ViewValue = $this->PRC->CurrentValue;
			$this->PRC->ViewCustomAttributes = "";

			// PrName
			$this->PrName->ViewValue = $this->PrName->CurrentValue;
			$this->PrName->ViewCustomAttributes = "";

			// BATCHNO
			$this->BATCHNO->ViewValue = $this->BATCHNO->CurrentValue;
			$this->BATCHNO->ViewCustomAttributes = "";

			// OpeningStk
			$this->OpeningStk->ViewValue = $this->OpeningStk->CurrentValue;
			$this->OpeningStk->ViewValue = FormatNumber($this->OpeningStk->ViewValue, 2, -2, -2, -2);
			$this->OpeningStk->ViewCustomAttributes = "";

			// PurchaseQty
			$this->PurchaseQty->ViewValue = $this->PurchaseQty->CurrentValue;
			$this->PurchaseQty->ViewValue = FormatNumber($this->PurchaseQty->ViewValue, 2, -2, -2, -2);
			$this->PurchaseQty->ViewCustomAttributes = "";

			// SalesQty
			$this->SalesQty->ViewValue = $this->SalesQty->CurrentValue;
			$this->SalesQty->ViewValue = FormatNumber($this->SalesQty->ViewValue, 2, -2, -2, -2);
			$this->SalesQty->ViewCustomAttributes = "";

			// ClosingStk
			$this->ClosingStk->ViewValue = $this->ClosingStk->CurrentValue;
			$this->ClosingStk->ViewValue = FormatNumber($this->ClosingStk->ViewValue, 2, -2, -2, -2);
			$this->ClosingStk->ViewCustomAttributes = "";

			// PurchasefreeQty
			$this->PurchasefreeQty->ViewValue = $this->PurchasefreeQty->CurrentValue;
			$this->PurchasefreeQty->ViewValue = FormatNumber($this->PurchasefreeQty->ViewValue, 2, -2, -2, -2);
			$this->PurchasefreeQty->ViewCustomAttributes = "";

			// TransferingQty
			$this->TransferingQty->ViewValue = $this->TransferingQty->CurrentValue;
			$this->TransferingQty->ViewValue = FormatNumber($this->TransferingQty->ViewValue, 2, -2, -2, -2);
			$this->TransferingQty->ViewCustomAttributes = "";

			// UnitPurchaseRate
			$this->UnitPurchaseRate->ViewValue = $this->UnitPurchaseRate->CurrentValue;
			$this->UnitPurchaseRate->ViewValue = FormatNumber($this->UnitPurchaseRate->ViewValue, 2, -2, -2, -2);
			$this->UnitPurchaseRate->ViewCustomAttributes = "";

			// UnitSaleRate
			$this->UnitSaleRate->ViewValue = $this->UnitSaleRate->CurrentValue;
			$this->UnitSaleRate->ViewValue = FormatNumber($this->UnitSaleRate->ViewValue, 2, -2, -2, -2);
			$this->UnitSaleRate->ViewCustomAttributes = "";

			// CreatedDate
			$this->CreatedDate->ViewValue = $this->CreatedDate->CurrentValue;
			$this->CreatedDate->ViewValue = FormatDateTime($this->CreatedDate->ViewValue, 0);
			$this->CreatedDate->ViewCustomAttributes = "";

			// OQ
			$this->OQ->ViewValue = $this->OQ->CurrentValue;
			$this->OQ->ViewValue = FormatNumber($this->OQ->ViewValue, 2, -2, -2, -2);
			$this->OQ->ViewCustomAttributes = "";

			// RQ
			$this->RQ->ViewValue = $this->RQ->CurrentValue;
			$this->RQ->ViewValue = FormatNumber($this->RQ->ViewValue, 2, -2, -2, -2);
			$this->RQ->ViewCustomAttributes = "";

			// MRQ
			$this->MRQ->ViewValue = $this->MRQ->CurrentValue;
			$this->MRQ->ViewValue = FormatNumber($this->MRQ->ViewValue, 2, -2, -2, -2);
			$this->MRQ->ViewCustomAttributes = "";

			// IQ
			$this->IQ->ViewValue = $this->IQ->CurrentValue;
			$this->IQ->ViewValue = FormatNumber($this->IQ->ViewValue, 2, -2, -2, -2);
			$this->IQ->ViewCustomAttributes = "";

			// MRP
			$this->MRP->ViewValue = $this->MRP->CurrentValue;
			$this->MRP->ViewValue = FormatNumber($this->MRP->ViewValue, 2, -2, -2, -2);
			$this->MRP->ViewCustomAttributes = "";

			// EXPDT
			$this->EXPDT->ViewValue = $this->EXPDT->CurrentValue;
			$this->EXPDT->ViewValue = FormatDateTime($this->EXPDT->ViewValue, 0);
			$this->EXPDT->ViewCustomAttributes = "";

			// UR
			$this->UR->ViewValue = $this->UR->CurrentValue;
			$this->UR->ViewValue = FormatNumber($this->UR->ViewValue, 2, -2, -2, -2);
			$this->UR->ViewCustomAttributes = "";

			// RT
			$this->RT->ViewValue = $this->RT->CurrentValue;
			$this->RT->ViewValue = FormatNumber($this->RT->ViewValue, 2, -2, -2, -2);
			$this->RT->ViewCustomAttributes = "";

			// PRCODE
			$this->PRCODE->ViewValue = $this->PRCODE->CurrentValue;
			$this->PRCODE->ViewCustomAttributes = "";

			// BATCH
			$this->BATCH->ViewValue = $this->BATCH->CurrentValue;
			$this->BATCH->ViewCustomAttributes = "";

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

			// PSGST
			$this->PSGST->ViewValue = $this->PSGST->CurrentValue;
			$this->PSGST->ViewValue = FormatNumber($this->PSGST->ViewValue, 2, -2, -2, -2);
			$this->PSGST->ViewCustomAttributes = "";

			// PCGST
			$this->PCGST->ViewValue = $this->PCGST->CurrentValue;
			$this->PCGST->ViewValue = FormatNumber($this->PCGST->ViewValue, 2, -2, -2, -2);
			$this->PCGST->ViewCustomAttributes = "";

			// SSGST
			$this->SSGST->ViewValue = $this->SSGST->CurrentValue;
			$this->SSGST->ViewValue = FormatNumber($this->SSGST->ViewValue, 2, -2, -2, -2);
			$this->SSGST->ViewCustomAttributes = "";

			// SCGST
			$this->SCGST->ViewValue = $this->SCGST->CurrentValue;
			$this->SCGST->ViewValue = FormatNumber($this->SCGST->ViewValue, 2, -2, -2, -2);
			$this->SCGST->ViewCustomAttributes = "";

			// MFRCODE
			$this->MFRCODE->ViewValue = $this->MFRCODE->CurrentValue;
			$this->MFRCODE->ViewCustomAttributes = "";

			// BRCODE
			$this->BRCODE->ViewValue = $this->BRCODE->CurrentValue;
			$this->BRCODE->ViewValue = FormatNumber($this->BRCODE->ViewValue, 0, -2, -2, -2);
			$this->BRCODE->ViewCustomAttributes = "";

			// FRQ
			$this->FRQ->ViewValue = $this->FRQ->CurrentValue;
			$this->FRQ->ViewValue = FormatNumber($this->FRQ->ViewValue, 2, -2, -2, -2);
			$this->FRQ->ViewCustomAttributes = "";

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

			// CreatedDateTime
			$this->CreatedDateTime->ViewValue = $this->CreatedDateTime->CurrentValue;
			$this->CreatedDateTime->ViewValue = FormatDateTime($this->CreatedDateTime->ViewValue, 0);
			$this->CreatedDateTime->ViewCustomAttributes = "";

			// baid
			$this->baid->ViewValue = $this->baid->CurrentValue;
			$this->baid->ViewValue = FormatNumber($this->baid->ViewValue, 0, -2, -2, -2);
			$this->baid->ViewCustomAttributes = "";

			// id
			$this->id->LinkCustomAttributes = "";
			$this->id->HrefValue = "";
			$this->id->TooltipValue = "";

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

			// OpeningStk
			$this->OpeningStk->LinkCustomAttributes = "";
			$this->OpeningStk->HrefValue = "";
			$this->OpeningStk->TooltipValue = "";

			// PurchaseQty
			$this->PurchaseQty->LinkCustomAttributes = "";
			$this->PurchaseQty->HrefValue = "";
			$this->PurchaseQty->TooltipValue = "";

			// SalesQty
			$this->SalesQty->LinkCustomAttributes = "";
			$this->SalesQty->HrefValue = "";
			$this->SalesQty->TooltipValue = "";

			// ClosingStk
			$this->ClosingStk->LinkCustomAttributes = "";
			$this->ClosingStk->HrefValue = "";
			$this->ClosingStk->TooltipValue = "";

			// PurchasefreeQty
			$this->PurchasefreeQty->LinkCustomAttributes = "";
			$this->PurchasefreeQty->HrefValue = "";
			$this->PurchasefreeQty->TooltipValue = "";

			// TransferingQty
			$this->TransferingQty->LinkCustomAttributes = "";
			$this->TransferingQty->HrefValue = "";
			$this->TransferingQty->TooltipValue = "";

			// UnitPurchaseRate
			$this->UnitPurchaseRate->LinkCustomAttributes = "";
			$this->UnitPurchaseRate->HrefValue = "";
			$this->UnitPurchaseRate->TooltipValue = "";

			// UnitSaleRate
			$this->UnitSaleRate->LinkCustomAttributes = "";
			$this->UnitSaleRate->HrefValue = "";
			$this->UnitSaleRate->TooltipValue = "";

			// CreatedDate
			$this->CreatedDate->LinkCustomAttributes = "";
			$this->CreatedDate->HrefValue = "";
			$this->CreatedDate->TooltipValue = "";

			// OQ
			$this->OQ->LinkCustomAttributes = "";
			$this->OQ->HrefValue = "";
			$this->OQ->TooltipValue = "";

			// RQ
			$this->RQ->LinkCustomAttributes = "";
			$this->RQ->HrefValue = "";
			$this->RQ->TooltipValue = "";

			// MRQ
			$this->MRQ->LinkCustomAttributes = "";
			$this->MRQ->HrefValue = "";
			$this->MRQ->TooltipValue = "";

			// IQ
			$this->IQ->LinkCustomAttributes = "";
			$this->IQ->HrefValue = "";
			$this->IQ->TooltipValue = "";

			// MRP
			$this->MRP->LinkCustomAttributes = "";
			$this->MRP->HrefValue = "";
			$this->MRP->TooltipValue = "";

			// EXPDT
			$this->EXPDT->LinkCustomAttributes = "";
			$this->EXPDT->HrefValue = "";
			$this->EXPDT->TooltipValue = "";

			// UR
			$this->UR->LinkCustomAttributes = "";
			$this->UR->HrefValue = "";
			$this->UR->TooltipValue = "";

			// RT
			$this->RT->LinkCustomAttributes = "";
			$this->RT->HrefValue = "";
			$this->RT->TooltipValue = "";

			// PRCODE
			$this->PRCODE->LinkCustomAttributes = "";
			$this->PRCODE->HrefValue = "";
			$this->PRCODE->TooltipValue = "";

			// BATCH
			$this->BATCH->LinkCustomAttributes = "";
			$this->BATCH->HrefValue = "";
			$this->BATCH->TooltipValue = "";

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

			// MFRCODE
			$this->MFRCODE->LinkCustomAttributes = "";
			$this->MFRCODE->HrefValue = "";
			$this->MFRCODE->TooltipValue = "";

			// BRCODE
			$this->BRCODE->LinkCustomAttributes = "";
			$this->BRCODE->HrefValue = "";
			$this->BRCODE->TooltipValue = "";

			// FRQ
			$this->FRQ->LinkCustomAttributes = "";
			$this->FRQ->HrefValue = "";
			$this->FRQ->TooltipValue = "";

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

			// CreatedDateTime
			$this->CreatedDateTime->LinkCustomAttributes = "";
			$this->CreatedDateTime->HrefValue = "";
			$this->CreatedDateTime->TooltipValue = "";

			// baid
			$this->baid->LinkCustomAttributes = "";
			$this->baid->HrefValue = "";
			$this->baid->TooltipValue = "";
		} elseif ($this->RowType == ROWTYPE_EDIT) { // Edit row

			// id
			$this->id->EditAttrs["class"] = "form-control";
			$this->id->EditCustomAttributes = "";
			$this->id->EditValue = $this->id->CurrentValue;
			$this->id->ViewCustomAttributes = "";

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
			$this->PrName->PlaceHolder = RemoveHtml($this->PrName->caption());

			// BATCHNO
			$this->BATCHNO->EditAttrs["class"] = "form-control";
			$this->BATCHNO->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->BATCHNO->CurrentValue = HtmlDecode($this->BATCHNO->CurrentValue);
			$this->BATCHNO->EditValue = HtmlEncode($this->BATCHNO->CurrentValue);
			$this->BATCHNO->PlaceHolder = RemoveHtml($this->BATCHNO->caption());

			// OpeningStk
			$this->OpeningStk->EditAttrs["class"] = "form-control";
			$this->OpeningStk->EditCustomAttributes = "";
			$this->OpeningStk->EditValue = HtmlEncode($this->OpeningStk->CurrentValue);
			$this->OpeningStk->PlaceHolder = RemoveHtml($this->OpeningStk->caption());
			if (strval($this->OpeningStk->EditValue) <> "" && is_numeric($this->OpeningStk->EditValue))
				$this->OpeningStk->EditValue = FormatNumber($this->OpeningStk->EditValue, -2, -2, -2, -2);

			// PurchaseQty
			$this->PurchaseQty->EditAttrs["class"] = "form-control";
			$this->PurchaseQty->EditCustomAttributes = "";
			$this->PurchaseQty->EditValue = HtmlEncode($this->PurchaseQty->CurrentValue);
			$this->PurchaseQty->PlaceHolder = RemoveHtml($this->PurchaseQty->caption());
			if (strval($this->PurchaseQty->EditValue) <> "" && is_numeric($this->PurchaseQty->EditValue))
				$this->PurchaseQty->EditValue = FormatNumber($this->PurchaseQty->EditValue, -2, -2, -2, -2);

			// SalesQty
			$this->SalesQty->EditAttrs["class"] = "form-control";
			$this->SalesQty->EditCustomAttributes = "";
			$this->SalesQty->EditValue = HtmlEncode($this->SalesQty->CurrentValue);
			$this->SalesQty->PlaceHolder = RemoveHtml($this->SalesQty->caption());
			if (strval($this->SalesQty->EditValue) <> "" && is_numeric($this->SalesQty->EditValue))
				$this->SalesQty->EditValue = FormatNumber($this->SalesQty->EditValue, -2, -2, -2, -2);

			// ClosingStk
			$this->ClosingStk->EditAttrs["class"] = "form-control";
			$this->ClosingStk->EditCustomAttributes = "";
			$this->ClosingStk->EditValue = HtmlEncode($this->ClosingStk->CurrentValue);
			$this->ClosingStk->PlaceHolder = RemoveHtml($this->ClosingStk->caption());
			if (strval($this->ClosingStk->EditValue) <> "" && is_numeric($this->ClosingStk->EditValue))
				$this->ClosingStk->EditValue = FormatNumber($this->ClosingStk->EditValue, -2, -2, -2, -2);

			// PurchasefreeQty
			$this->PurchasefreeQty->EditAttrs["class"] = "form-control";
			$this->PurchasefreeQty->EditCustomAttributes = "";
			$this->PurchasefreeQty->EditValue = HtmlEncode($this->PurchasefreeQty->CurrentValue);
			$this->PurchasefreeQty->PlaceHolder = RemoveHtml($this->PurchasefreeQty->caption());
			if (strval($this->PurchasefreeQty->EditValue) <> "" && is_numeric($this->PurchasefreeQty->EditValue))
				$this->PurchasefreeQty->EditValue = FormatNumber($this->PurchasefreeQty->EditValue, -2, -2, -2, -2);

			// TransferingQty
			$this->TransferingQty->EditAttrs["class"] = "form-control";
			$this->TransferingQty->EditCustomAttributes = "";
			$this->TransferingQty->EditValue = HtmlEncode($this->TransferingQty->CurrentValue);
			$this->TransferingQty->PlaceHolder = RemoveHtml($this->TransferingQty->caption());
			if (strval($this->TransferingQty->EditValue) <> "" && is_numeric($this->TransferingQty->EditValue))
				$this->TransferingQty->EditValue = FormatNumber($this->TransferingQty->EditValue, -2, -2, -2, -2);

			// UnitPurchaseRate
			$this->UnitPurchaseRate->EditAttrs["class"] = "form-control";
			$this->UnitPurchaseRate->EditCustomAttributes = "";
			$this->UnitPurchaseRate->EditValue = HtmlEncode($this->UnitPurchaseRate->CurrentValue);
			$this->UnitPurchaseRate->PlaceHolder = RemoveHtml($this->UnitPurchaseRate->caption());
			if (strval($this->UnitPurchaseRate->EditValue) <> "" && is_numeric($this->UnitPurchaseRate->EditValue))
				$this->UnitPurchaseRate->EditValue = FormatNumber($this->UnitPurchaseRate->EditValue, -2, -2, -2, -2);

			// UnitSaleRate
			$this->UnitSaleRate->EditAttrs["class"] = "form-control";
			$this->UnitSaleRate->EditCustomAttributes = "";
			$this->UnitSaleRate->EditValue = HtmlEncode($this->UnitSaleRate->CurrentValue);
			$this->UnitSaleRate->PlaceHolder = RemoveHtml($this->UnitSaleRate->caption());
			if (strval($this->UnitSaleRate->EditValue) <> "" && is_numeric($this->UnitSaleRate->EditValue))
				$this->UnitSaleRate->EditValue = FormatNumber($this->UnitSaleRate->EditValue, -2, -2, -2, -2);

			// CreatedDate
			$this->CreatedDate->EditAttrs["class"] = "form-control";
			$this->CreatedDate->EditCustomAttributes = "";
			$this->CreatedDate->EditValue = HtmlEncode(FormatDateTime($this->CreatedDate->CurrentValue, 8));
			$this->CreatedDate->PlaceHolder = RemoveHtml($this->CreatedDate->caption());

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

			// MRQ
			$this->MRQ->EditAttrs["class"] = "form-control";
			$this->MRQ->EditCustomAttributes = "";
			$this->MRQ->EditValue = HtmlEncode($this->MRQ->CurrentValue);
			$this->MRQ->PlaceHolder = RemoveHtml($this->MRQ->caption());
			if (strval($this->MRQ->EditValue) <> "" && is_numeric($this->MRQ->EditValue))
				$this->MRQ->EditValue = FormatNumber($this->MRQ->EditValue, -2, -2, -2, -2);

			// IQ
			$this->IQ->EditAttrs["class"] = "form-control";
			$this->IQ->EditCustomAttributes = "";
			$this->IQ->EditValue = HtmlEncode($this->IQ->CurrentValue);
			$this->IQ->PlaceHolder = RemoveHtml($this->IQ->caption());
			if (strval($this->IQ->EditValue) <> "" && is_numeric($this->IQ->EditValue))
				$this->IQ->EditValue = FormatNumber($this->IQ->EditValue, -2, -2, -2, -2);

			// MRP
			$this->MRP->EditAttrs["class"] = "form-control";
			$this->MRP->EditCustomAttributes = "";
			$this->MRP->EditValue = HtmlEncode($this->MRP->CurrentValue);
			$this->MRP->PlaceHolder = RemoveHtml($this->MRP->caption());
			if (strval($this->MRP->EditValue) <> "" && is_numeric($this->MRP->EditValue))
				$this->MRP->EditValue = FormatNumber($this->MRP->EditValue, -2, -2, -2, -2);

			// EXPDT
			$this->EXPDT->EditAttrs["class"] = "form-control";
			$this->EXPDT->EditCustomAttributes = "";
			$this->EXPDT->EditValue = HtmlEncode(FormatDateTime($this->EXPDT->CurrentValue, 8));
			$this->EXPDT->PlaceHolder = RemoveHtml($this->EXPDT->caption());

			// UR
			$this->UR->EditAttrs["class"] = "form-control";
			$this->UR->EditCustomAttributes = "";
			$this->UR->EditValue = HtmlEncode($this->UR->CurrentValue);
			$this->UR->PlaceHolder = RemoveHtml($this->UR->caption());
			if (strval($this->UR->EditValue) <> "" && is_numeric($this->UR->EditValue))
				$this->UR->EditValue = FormatNumber($this->UR->EditValue, -2, -2, -2, -2);

			// RT
			$this->RT->EditAttrs["class"] = "form-control";
			$this->RT->EditCustomAttributes = "";
			$this->RT->EditValue = HtmlEncode($this->RT->CurrentValue);
			$this->RT->PlaceHolder = RemoveHtml($this->RT->caption());
			if (strval($this->RT->EditValue) <> "" && is_numeric($this->RT->EditValue))
				$this->RT->EditValue = FormatNumber($this->RT->EditValue, -2, -2, -2, -2);

			// PRCODE
			$this->PRCODE->EditAttrs["class"] = "form-control";
			$this->PRCODE->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->PRCODE->CurrentValue = HtmlDecode($this->PRCODE->CurrentValue);
			$this->PRCODE->EditValue = HtmlEncode($this->PRCODE->CurrentValue);
			$this->PRCODE->PlaceHolder = RemoveHtml($this->PRCODE->caption());

			// BATCH
			$this->BATCH->EditAttrs["class"] = "form-control";
			$this->BATCH->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->BATCH->CurrentValue = HtmlDecode($this->BATCH->CurrentValue);
			$this->BATCH->EditValue = HtmlEncode($this->BATCH->CurrentValue);
			$this->BATCH->PlaceHolder = RemoveHtml($this->BATCH->caption());

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

			// PSGST
			$this->PSGST->EditAttrs["class"] = "form-control";
			$this->PSGST->EditCustomAttributes = "";
			$this->PSGST->EditValue = HtmlEncode($this->PSGST->CurrentValue);
			$this->PSGST->PlaceHolder = RemoveHtml($this->PSGST->caption());
			if (strval($this->PSGST->EditValue) <> "" && is_numeric($this->PSGST->EditValue))
				$this->PSGST->EditValue = FormatNumber($this->PSGST->EditValue, -2, -2, -2, -2);

			// PCGST
			$this->PCGST->EditAttrs["class"] = "form-control";
			$this->PCGST->EditCustomAttributes = "";
			$this->PCGST->EditValue = HtmlEncode($this->PCGST->CurrentValue);
			$this->PCGST->PlaceHolder = RemoveHtml($this->PCGST->caption());
			if (strval($this->PCGST->EditValue) <> "" && is_numeric($this->PCGST->EditValue))
				$this->PCGST->EditValue = FormatNumber($this->PCGST->EditValue, -2, -2, -2, -2);

			// SSGST
			$this->SSGST->EditAttrs["class"] = "form-control";
			$this->SSGST->EditCustomAttributes = "";
			$this->SSGST->EditValue = HtmlEncode($this->SSGST->CurrentValue);
			$this->SSGST->PlaceHolder = RemoveHtml($this->SSGST->caption());
			if (strval($this->SSGST->EditValue) <> "" && is_numeric($this->SSGST->EditValue))
				$this->SSGST->EditValue = FormatNumber($this->SSGST->EditValue, -2, -2, -2, -2);

			// SCGST
			$this->SCGST->EditAttrs["class"] = "form-control";
			$this->SCGST->EditCustomAttributes = "";
			$this->SCGST->EditValue = HtmlEncode($this->SCGST->CurrentValue);
			$this->SCGST->PlaceHolder = RemoveHtml($this->SCGST->caption());
			if (strval($this->SCGST->EditValue) <> "" && is_numeric($this->SCGST->EditValue))
				$this->SCGST->EditValue = FormatNumber($this->SCGST->EditValue, -2, -2, -2, -2);

			// MFRCODE
			$this->MFRCODE->EditAttrs["class"] = "form-control";
			$this->MFRCODE->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->MFRCODE->CurrentValue = HtmlDecode($this->MFRCODE->CurrentValue);
			$this->MFRCODE->EditValue = HtmlEncode($this->MFRCODE->CurrentValue);
			$this->MFRCODE->PlaceHolder = RemoveHtml($this->MFRCODE->caption());

			// BRCODE
			$this->BRCODE->EditAttrs["class"] = "form-control";
			$this->BRCODE->EditCustomAttributes = "";
			$this->BRCODE->EditValue = HtmlEncode($this->BRCODE->CurrentValue);
			$this->BRCODE->PlaceHolder = RemoveHtml($this->BRCODE->caption());

			// FRQ
			$this->FRQ->EditAttrs["class"] = "form-control";
			$this->FRQ->EditCustomAttributes = "";
			$this->FRQ->EditValue = HtmlEncode($this->FRQ->CurrentValue);
			$this->FRQ->PlaceHolder = RemoveHtml($this->FRQ->caption());
			if (strval($this->FRQ->EditValue) <> "" && is_numeric($this->FRQ->EditValue))
				$this->FRQ->EditValue = FormatNumber($this->FRQ->EditValue, -2, -2, -2, -2);

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

			// CreatedDateTime
			$this->CreatedDateTime->EditAttrs["class"] = "form-control";
			$this->CreatedDateTime->EditCustomAttributes = "";
			$this->CreatedDateTime->EditValue = HtmlEncode(FormatDateTime($this->CreatedDateTime->CurrentValue, 8));
			$this->CreatedDateTime->PlaceHolder = RemoveHtml($this->CreatedDateTime->caption());

			// baid
			$this->baid->EditAttrs["class"] = "form-control";
			$this->baid->EditCustomAttributes = "";
			$this->baid->EditValue = HtmlEncode($this->baid->CurrentValue);
			$this->baid->PlaceHolder = RemoveHtml($this->baid->caption());

			// Edit refer script
			// id

			$this->id->LinkCustomAttributes = "";
			$this->id->HrefValue = "";

			// PRC
			$this->PRC->LinkCustomAttributes = "";
			$this->PRC->HrefValue = "";

			// PrName
			$this->PrName->LinkCustomAttributes = "";
			$this->PrName->HrefValue = "";

			// BATCHNO
			$this->BATCHNO->LinkCustomAttributes = "";
			$this->BATCHNO->HrefValue = "";

			// OpeningStk
			$this->OpeningStk->LinkCustomAttributes = "";
			$this->OpeningStk->HrefValue = "";

			// PurchaseQty
			$this->PurchaseQty->LinkCustomAttributes = "";
			$this->PurchaseQty->HrefValue = "";

			// SalesQty
			$this->SalesQty->LinkCustomAttributes = "";
			$this->SalesQty->HrefValue = "";

			// ClosingStk
			$this->ClosingStk->LinkCustomAttributes = "";
			$this->ClosingStk->HrefValue = "";

			// PurchasefreeQty
			$this->PurchasefreeQty->LinkCustomAttributes = "";
			$this->PurchasefreeQty->HrefValue = "";

			// TransferingQty
			$this->TransferingQty->LinkCustomAttributes = "";
			$this->TransferingQty->HrefValue = "";

			// UnitPurchaseRate
			$this->UnitPurchaseRate->LinkCustomAttributes = "";
			$this->UnitPurchaseRate->HrefValue = "";

			// UnitSaleRate
			$this->UnitSaleRate->LinkCustomAttributes = "";
			$this->UnitSaleRate->HrefValue = "";

			// CreatedDate
			$this->CreatedDate->LinkCustomAttributes = "";
			$this->CreatedDate->HrefValue = "";

			// OQ
			$this->OQ->LinkCustomAttributes = "";
			$this->OQ->HrefValue = "";

			// RQ
			$this->RQ->LinkCustomAttributes = "";
			$this->RQ->HrefValue = "";

			// MRQ
			$this->MRQ->LinkCustomAttributes = "";
			$this->MRQ->HrefValue = "";

			// IQ
			$this->IQ->LinkCustomAttributes = "";
			$this->IQ->HrefValue = "";

			// MRP
			$this->MRP->LinkCustomAttributes = "";
			$this->MRP->HrefValue = "";

			// EXPDT
			$this->EXPDT->LinkCustomAttributes = "";
			$this->EXPDT->HrefValue = "";

			// UR
			$this->UR->LinkCustomAttributes = "";
			$this->UR->HrefValue = "";

			// RT
			$this->RT->LinkCustomAttributes = "";
			$this->RT->HrefValue = "";

			// PRCODE
			$this->PRCODE->LinkCustomAttributes = "";
			$this->PRCODE->HrefValue = "";

			// BATCH
			$this->BATCH->LinkCustomAttributes = "";
			$this->BATCH->HrefValue = "";

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

			// MFRCODE
			$this->MFRCODE->LinkCustomAttributes = "";
			$this->MFRCODE->HrefValue = "";

			// BRCODE
			$this->BRCODE->LinkCustomAttributes = "";
			$this->BRCODE->HrefValue = "";

			// FRQ
			$this->FRQ->LinkCustomAttributes = "";
			$this->FRQ->HrefValue = "";

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

			// CreatedDateTime
			$this->CreatedDateTime->LinkCustomAttributes = "";
			$this->CreatedDateTime->HrefValue = "";

			// baid
			$this->baid->LinkCustomAttributes = "";
			$this->baid->HrefValue = "";
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
		if ($this->OpeningStk->Required) {
			if (!$this->OpeningStk->IsDetailKey && $this->OpeningStk->FormValue != NULL && $this->OpeningStk->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->OpeningStk->caption(), $this->OpeningStk->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->OpeningStk->FormValue)) {
			AddMessage($FormError, $this->OpeningStk->errorMessage());
		}
		if ($this->PurchaseQty->Required) {
			if (!$this->PurchaseQty->IsDetailKey && $this->PurchaseQty->FormValue != NULL && $this->PurchaseQty->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PurchaseQty->caption(), $this->PurchaseQty->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->PurchaseQty->FormValue)) {
			AddMessage($FormError, $this->PurchaseQty->errorMessage());
		}
		if ($this->SalesQty->Required) {
			if (!$this->SalesQty->IsDetailKey && $this->SalesQty->FormValue != NULL && $this->SalesQty->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->SalesQty->caption(), $this->SalesQty->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->SalesQty->FormValue)) {
			AddMessage($FormError, $this->SalesQty->errorMessage());
		}
		if ($this->ClosingStk->Required) {
			if (!$this->ClosingStk->IsDetailKey && $this->ClosingStk->FormValue != NULL && $this->ClosingStk->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->ClosingStk->caption(), $this->ClosingStk->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->ClosingStk->FormValue)) {
			AddMessage($FormError, $this->ClosingStk->errorMessage());
		}
		if ($this->PurchasefreeQty->Required) {
			if (!$this->PurchasefreeQty->IsDetailKey && $this->PurchasefreeQty->FormValue != NULL && $this->PurchasefreeQty->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PurchasefreeQty->caption(), $this->PurchasefreeQty->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->PurchasefreeQty->FormValue)) {
			AddMessage($FormError, $this->PurchasefreeQty->errorMessage());
		}
		if ($this->TransferingQty->Required) {
			if (!$this->TransferingQty->IsDetailKey && $this->TransferingQty->FormValue != NULL && $this->TransferingQty->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->TransferingQty->caption(), $this->TransferingQty->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->TransferingQty->FormValue)) {
			AddMessage($FormError, $this->TransferingQty->errorMessage());
		}
		if ($this->UnitPurchaseRate->Required) {
			if (!$this->UnitPurchaseRate->IsDetailKey && $this->UnitPurchaseRate->FormValue != NULL && $this->UnitPurchaseRate->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->UnitPurchaseRate->caption(), $this->UnitPurchaseRate->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->UnitPurchaseRate->FormValue)) {
			AddMessage($FormError, $this->UnitPurchaseRate->errorMessage());
		}
		if ($this->UnitSaleRate->Required) {
			if (!$this->UnitSaleRate->IsDetailKey && $this->UnitSaleRate->FormValue != NULL && $this->UnitSaleRate->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->UnitSaleRate->caption(), $this->UnitSaleRate->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->UnitSaleRate->FormValue)) {
			AddMessage($FormError, $this->UnitSaleRate->errorMessage());
		}
		if ($this->CreatedDate->Required) {
			if (!$this->CreatedDate->IsDetailKey && $this->CreatedDate->FormValue != NULL && $this->CreatedDate->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->CreatedDate->caption(), $this->CreatedDate->RequiredErrorMessage));
			}
		}
		if (!CheckDate($this->CreatedDate->FormValue)) {
			AddMessage($FormError, $this->CreatedDate->errorMessage());
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
		if ($this->MRQ->Required) {
			if (!$this->MRQ->IsDetailKey && $this->MRQ->FormValue != NULL && $this->MRQ->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->MRQ->caption(), $this->MRQ->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->MRQ->FormValue)) {
			AddMessage($FormError, $this->MRQ->errorMessage());
		}
		if ($this->IQ->Required) {
			if (!$this->IQ->IsDetailKey && $this->IQ->FormValue != NULL && $this->IQ->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->IQ->caption(), $this->IQ->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->IQ->FormValue)) {
			AddMessage($FormError, $this->IQ->errorMessage());
		}
		if ($this->MRP->Required) {
			if (!$this->MRP->IsDetailKey && $this->MRP->FormValue != NULL && $this->MRP->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->MRP->caption(), $this->MRP->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->MRP->FormValue)) {
			AddMessage($FormError, $this->MRP->errorMessage());
		}
		if ($this->EXPDT->Required) {
			if (!$this->EXPDT->IsDetailKey && $this->EXPDT->FormValue != NULL && $this->EXPDT->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->EXPDT->caption(), $this->EXPDT->RequiredErrorMessage));
			}
		}
		if (!CheckDate($this->EXPDT->FormValue)) {
			AddMessage($FormError, $this->EXPDT->errorMessage());
		}
		if ($this->UR->Required) {
			if (!$this->UR->IsDetailKey && $this->UR->FormValue != NULL && $this->UR->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->UR->caption(), $this->UR->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->UR->FormValue)) {
			AddMessage($FormError, $this->UR->errorMessage());
		}
		if ($this->RT->Required) {
			if (!$this->RT->IsDetailKey && $this->RT->FormValue != NULL && $this->RT->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->RT->caption(), $this->RT->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->RT->FormValue)) {
			AddMessage($FormError, $this->RT->errorMessage());
		}
		if ($this->PRCODE->Required) {
			if (!$this->PRCODE->IsDetailKey && $this->PRCODE->FormValue != NULL && $this->PRCODE->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PRCODE->caption(), $this->PRCODE->RequiredErrorMessage));
			}
		}
		if ($this->BATCH->Required) {
			if (!$this->BATCH->IsDetailKey && $this->BATCH->FormValue != NULL && $this->BATCH->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->BATCH->caption(), $this->BATCH->RequiredErrorMessage));
			}
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
		if ($this->PSGST->Required) {
			if (!$this->PSGST->IsDetailKey && $this->PSGST->FormValue != NULL && $this->PSGST->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PSGST->caption(), $this->PSGST->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->PSGST->FormValue)) {
			AddMessage($FormError, $this->PSGST->errorMessage());
		}
		if ($this->PCGST->Required) {
			if (!$this->PCGST->IsDetailKey && $this->PCGST->FormValue != NULL && $this->PCGST->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PCGST->caption(), $this->PCGST->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->PCGST->FormValue)) {
			AddMessage($FormError, $this->PCGST->errorMessage());
		}
		if ($this->SSGST->Required) {
			if (!$this->SSGST->IsDetailKey && $this->SSGST->FormValue != NULL && $this->SSGST->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->SSGST->caption(), $this->SSGST->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->SSGST->FormValue)) {
			AddMessage($FormError, $this->SSGST->errorMessage());
		}
		if ($this->SCGST->Required) {
			if (!$this->SCGST->IsDetailKey && $this->SCGST->FormValue != NULL && $this->SCGST->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->SCGST->caption(), $this->SCGST->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->SCGST->FormValue)) {
			AddMessage($FormError, $this->SCGST->errorMessage());
		}
		if ($this->MFRCODE->Required) {
			if (!$this->MFRCODE->IsDetailKey && $this->MFRCODE->FormValue != NULL && $this->MFRCODE->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->MFRCODE->caption(), $this->MFRCODE->RequiredErrorMessage));
			}
		}
		if ($this->BRCODE->Required) {
			if (!$this->BRCODE->IsDetailKey && $this->BRCODE->FormValue != NULL && $this->BRCODE->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->BRCODE->caption(), $this->BRCODE->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->BRCODE->FormValue)) {
			AddMessage($FormError, $this->BRCODE->errorMessage());
		}
		if ($this->FRQ->Required) {
			if (!$this->FRQ->IsDetailKey && $this->FRQ->FormValue != NULL && $this->FRQ->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->FRQ->caption(), $this->FRQ->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->FRQ->FormValue)) {
			AddMessage($FormError, $this->FRQ->errorMessage());
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
		if ($this->CreatedDateTime->Required) {
			if (!$this->CreatedDateTime->IsDetailKey && $this->CreatedDateTime->FormValue != NULL && $this->CreatedDateTime->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->CreatedDateTime->caption(), $this->CreatedDateTime->RequiredErrorMessage));
			}
		}
		if (!CheckDate($this->CreatedDateTime->FormValue)) {
			AddMessage($FormError, $this->CreatedDateTime->errorMessage());
		}
		if ($this->baid->Required) {
			if (!$this->baid->IsDetailKey && $this->baid->FormValue != NULL && $this->baid->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->baid->caption(), $this->baid->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->baid->FormValue)) {
			AddMessage($FormError, $this->baid->errorMessage());
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

			// OpeningStk
			$this->OpeningStk->setDbValueDef($rsnew, $this->OpeningStk->CurrentValue, NULL, $this->OpeningStk->ReadOnly);

			// PurchaseQty
			$this->PurchaseQty->setDbValueDef($rsnew, $this->PurchaseQty->CurrentValue, NULL, $this->PurchaseQty->ReadOnly);

			// SalesQty
			$this->SalesQty->setDbValueDef($rsnew, $this->SalesQty->CurrentValue, NULL, $this->SalesQty->ReadOnly);

			// ClosingStk
			$this->ClosingStk->setDbValueDef($rsnew, $this->ClosingStk->CurrentValue, NULL, $this->ClosingStk->ReadOnly);

			// PurchasefreeQty
			$this->PurchasefreeQty->setDbValueDef($rsnew, $this->PurchasefreeQty->CurrentValue, NULL, $this->PurchasefreeQty->ReadOnly);

			// TransferingQty
			$this->TransferingQty->setDbValueDef($rsnew, $this->TransferingQty->CurrentValue, NULL, $this->TransferingQty->ReadOnly);

			// UnitPurchaseRate
			$this->UnitPurchaseRate->setDbValueDef($rsnew, $this->UnitPurchaseRate->CurrentValue, NULL, $this->UnitPurchaseRate->ReadOnly);

			// UnitSaleRate
			$this->UnitSaleRate->setDbValueDef($rsnew, $this->UnitSaleRate->CurrentValue, NULL, $this->UnitSaleRate->ReadOnly);

			// CreatedDate
			$this->CreatedDate->setDbValueDef($rsnew, UnFormatDateTime($this->CreatedDate->CurrentValue, 0), NULL, $this->CreatedDate->ReadOnly);

			// OQ
			$this->OQ->setDbValueDef($rsnew, $this->OQ->CurrentValue, NULL, $this->OQ->ReadOnly);

			// RQ
			$this->RQ->setDbValueDef($rsnew, $this->RQ->CurrentValue, NULL, $this->RQ->ReadOnly);

			// MRQ
			$this->MRQ->setDbValueDef($rsnew, $this->MRQ->CurrentValue, NULL, $this->MRQ->ReadOnly);

			// IQ
			$this->IQ->setDbValueDef($rsnew, $this->IQ->CurrentValue, NULL, $this->IQ->ReadOnly);

			// MRP
			$this->MRP->setDbValueDef($rsnew, $this->MRP->CurrentValue, NULL, $this->MRP->ReadOnly);

			// EXPDT
			$this->EXPDT->setDbValueDef($rsnew, UnFormatDateTime($this->EXPDT->CurrentValue, 0), NULL, $this->EXPDT->ReadOnly);

			// UR
			$this->UR->setDbValueDef($rsnew, $this->UR->CurrentValue, NULL, $this->UR->ReadOnly);

			// RT
			$this->RT->setDbValueDef($rsnew, $this->RT->CurrentValue, NULL, $this->RT->ReadOnly);

			// PRCODE
			$this->PRCODE->setDbValueDef($rsnew, $this->PRCODE->CurrentValue, NULL, $this->PRCODE->ReadOnly);

			// BATCH
			$this->BATCH->setDbValueDef($rsnew, $this->BATCH->CurrentValue, NULL, $this->BATCH->ReadOnly);

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

			// MFRCODE
			$this->MFRCODE->setDbValueDef($rsnew, $this->MFRCODE->CurrentValue, NULL, $this->MFRCODE->ReadOnly);

			// BRCODE
			$this->BRCODE->setDbValueDef($rsnew, $this->BRCODE->CurrentValue, NULL, $this->BRCODE->ReadOnly);

			// FRQ
			$this->FRQ->setDbValueDef($rsnew, $this->FRQ->CurrentValue, NULL, $this->FRQ->ReadOnly);

			// HospID
			$this->HospID->setDbValueDef($rsnew, $this->HospID->CurrentValue, NULL, $this->HospID->ReadOnly);

			// UM
			$this->UM->setDbValueDef($rsnew, $this->UM->CurrentValue, NULL, $this->UM->ReadOnly);

			// GENNAME
			$this->GENNAME->setDbValueDef($rsnew, $this->GENNAME->CurrentValue, NULL, $this->GENNAME->ReadOnly);

			// BILLDATE
			$this->BILLDATE->setDbValueDef($rsnew, UnFormatDateTime($this->BILLDATE->CurrentValue, 0), NULL, $this->BILLDATE->ReadOnly);

			// CreatedDateTime
			$this->CreatedDateTime->setDbValueDef($rsnew, UnFormatDateTime($this->CreatedDateTime->CurrentValue, 0), NULL, $this->CreatedDateTime->ReadOnly);

			// baid
			$this->baid->setDbValueDef($rsnew, $this->baid->CurrentValue, NULL, $this->baid->ReadOnly);

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
		$Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("pharmacy_stock_movementlist.php"), "", $this->TableVar, TRUE);
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